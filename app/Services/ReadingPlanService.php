<?php

namespace App\Services;

class ReadingPlanService
{
    private $bibleRepository;
    private $userDataRepository;
    private $catalog;

    public function __construct(BibleRepository $bibleRepository, UserDataRepository $userDataRepository)
    {
        $this->bibleRepository = $bibleRepository;
        $this->userDataRepository = $userDataRepository;
        $this->catalog = [
            ['days' => 30, 'name' => 'Plan intensivo (30 días)'],
            ['days' => 90, 'name' => 'Plan trimestral (90 días)'],
            ['days' => 180, 'name' => 'Plan semestral (180 días)'],
            ['days' => 365, 'name' => 'Plan anual (365 días)'],
        ];
    }

    public function status($date = null)
    {
        $date = $this->normalizeDate($date);
        $prefs = $this->userDataRepository->getUserPrefs();
        $weeklyGoalDays = $this->resolveWeeklyGoalDays($prefs['weekly_goal_days'] ?? 5);

        $active = $this->userDataRepository->getActiveReadingPlan();
        if (!$active) {
            return [
                'active' => false,
                'today' => $date,
                'catalog' => $this->catalog,
                'weekly_goal_days' => $weeklyGoalDays,
                'current_streak' => 0,
                'streak_current' => 0,
                'longest_streak' => 0,
                'weekly' => $this->buildWeeklySummaryWithoutPlan($date, $weeklyGoalDays),
            ];
        }

        $planId = (int) $active['id'];
        $totalDays = max(1, (int) $active['total_days']);
        $startDate = $this->normalizeDate($active['start_date'] ?? '');
        $todayIndex = $this->dayIndex($startDate, $date);
        $todayIndex = max(1, min($totalDays, $todayIndex));

        $allChapters = $this->bibleRepository->getAllChaptersOrdered();
        $completedByDay = $this->userDataRepository->getReadingPlanChapterProgressByDay($planId);
        $this->migrateLegacyCompletedDays($planId, $allChapters, $totalDays, $date, $completedByDay);

        $todayAssignment = $this->assignmentForDay($allChapters, $totalDays, $todayIndex);
        $todayCompletedMap = isset($completedByDay[$todayIndex]) && is_array($completedByDay[$todayIndex]) ? $completedByDay[$todayIndex] : [];
        $todayChapters = $this->decorateAssignedChapters($todayAssignment, $todayCompletedMap);
        $todayTotalCount = count($todayChapters);
        $todayCompletedCount = $this->countCompletedInAssignment($todayChapters);

        $completedDaySet = $this->buildCompletedDaySet($allChapters, $totalDays, $completedByDay);
        $completedDays = count($completedDaySet);
        $todayDone = isset($completedDaySet[$todayIndex]);
        $currentStreak = $this->currentStreak($completedDaySet, $todayIndex, $todayDone);
        $longestStreak = $this->longestStreak($completedDaySet);
        $weekly = $this->buildWeeklySummary($date, $startDate, $totalDays, $completedDaySet, $weeklyGoalDays);

        return [
            'active' => true,
            'today' => $date,
            'catalog' => $this->catalog,
            'weekly_goal_days' => $weeklyGoalDays,
            'plan' => [
                'id' => $planId,
                'name' => (string) $active['name'],
                'total_days' => $totalDays,
                'start_date' => $startDate,
                'today_index' => $todayIndex,
                'completed_days' => $completedDays,
                'progress_percent' => (int) round(($completedDays / $totalDays) * 100),
                'is_finished' => $completedDays >= $totalDays,
                'today_done' => $todayDone,
                'today_completed_count' => $todayCompletedCount,
                'today_total_count' => $todayTotalCount,
                'today_completion_percent' => $todayTotalCount > 0 ? (int) round(($todayCompletedCount / $todayTotalCount) * 100) : 0,
                'current_streak' => $currentStreak,
                'longest_streak' => $longestStreak,
                'weekly' => $weekly,
                'completed_day_indexes' => array_map('intval', array_keys($completedDaySet)),
                'today_assignment' => [
                    'start_label' => !empty($todayChapters) ? (string) $todayChapters[0]['label'] : '',
                    'end_label' => !empty($todayChapters) ? (string) $todayChapters[count($todayChapters) - 1]['label'] : '',
                    'count' => $todayTotalCount,
                    'chapters' => $todayChapters,
                ],
            ],
        ];
    }

    public function start($days, $date = null)
    {
        $days = (int) $days;
        $selected = null;
        foreach ($this->catalog as $item) {
            if ((int) $item['days'] === $days) {
                $selected = $item;
                break;
            }
        }
        if (!$selected) {
            throw new \InvalidArgumentException('Plan no permitido.');
        }

        $date = $this->normalizeDate($date);
        $this->userDataRepository->startReadingPlan($selected['name'], $days, $date);
        return $this->status($date);
    }

    public function markToday($completed, $date = null)
    {
        $date = $this->normalizeDate($date);
        $status = $this->status($date);
        if (empty($status['active'])) {
            throw new \RuntimeException('No hay plan activo.');
        }

        $plan = $status['plan'];
        $chapters = isset($plan['today_assignment']['chapters']) && is_array($plan['today_assignment']['chapters'])
            ? $plan['today_assignment']['chapters']
            : [];
        if (empty($chapters)) {
            return $status;
        }

        $planId = (int) $plan['id'];
        $dayIndex = (int) $plan['today_index'];

        if (!$completed) {
            $this->userDataRepository->clearReadingPlanDayChapters($planId, $dayIndex);
            return $this->status($date);
        }

        foreach ($chapters as $row) {
            $this->userDataRepository->setReadingPlanChapterCompletion(
                $planId,
                $dayIndex,
                $date,
                (int) ($row['book'] ?? 0),
                (int) ($row['chapter'] ?? 0),
                true
            );
        }

        return $this->status($date);
    }

    public function markChapter($book, $chapter, $completed, $date = null)
    {
        $book = (int) $book;
        $chapter = (int) $chapter;
        $date = $this->normalizeDate($date);

        if ($book < 1 || $chapter < 1) {
            throw new \InvalidArgumentException('Parámetros inválidos.');
        }

        $status = $this->status($date);
        if (empty($status['active'])) {
            throw new \RuntimeException('No hay plan activo.');
        }

        $plan = $status['plan'];
        $chapters = isset($plan['today_assignment']['chapters']) && is_array($plan['today_assignment']['chapters'])
            ? $plan['today_assignment']['chapters']
            : [];

        $isAssigned = false;
        foreach ($chapters as $row) {
            if ((int) ($row['book'] ?? 0) === $book && (int) ($row['chapter'] ?? 0) === $chapter) {
                $isAssigned = true;
                break;
            }
        }
        if (!$isAssigned) {
            throw new \RuntimeException('Ese capítulo no corresponde al plan de hoy.');
        }

        $this->userDataRepository->setReadingPlanChapterCompletion(
            (int) $plan['id'],
            (int) $plan['today_index'],
            $date,
            $book,
            $chapter,
            (bool) $completed
        );

        return $this->status($date);
    }

    private function migrateLegacyCompletedDays($planId, array $allChapters, $totalDays, $fallbackDate, array &$completedByDay)
    {
        $legacyByDay = $this->userDataRepository->getReadingPlanProgressMap($planId);
        if (empty($legacyByDay)) {
            return;
        }

        foreach ($legacyByDay as $legacyDay => $legacyRow) {
            $legacyDay = (int) $legacyDay;
            if ($legacyDay < 1 || isset($completedByDay[$legacyDay])) {
                continue;
            }

            $assignment = $this->assignmentForDay($allChapters, $totalDays, $legacyDay);
            if (empty($assignment)) {
                continue;
            }

            $legacyDate = $this->normalizeDate($legacyRow['date'] ?? $fallbackDate);
            foreach ($assignment as $item) {
                $book = (int) ($item['book'] ?? 0);
                $chapter = (int) ($item['chapter'] ?? 0);
                if ($book < 1 || $chapter < 1) {
                    continue;
                }
                $this->userDataRepository->setReadingPlanChapterCompletion(
                    (int) $planId,
                    $legacyDay,
                    $legacyDate,
                    $book,
                    $chapter,
                    true
                );
                if (!isset($completedByDay[$legacyDay])) {
                    $completedByDay[$legacyDay] = [];
                }
                $completedByDay[$legacyDay][$this->chapterKey($book, $chapter)] = true;
            }
        }
    }

    private function assignmentForDay(array $allChapters, $totalDays, $dayIndex)
    {
        $window = $this->buildDayWindow(count($allChapters), (int) $totalDays, (int) $dayIndex);
        if ($window['count'] < 1) {
            return [];
        }
        return array_slice($allChapters, $window['start'], $window['count']);
    }

    private function decorateAssignedChapters(array $assigned, array $completedMap)
    {
        $rows = [];
        foreach ($assigned as $row) {
            $book = (int) ($row['book'] ?? 0);
            $chapter = (int) ($row['chapter'] ?? 0);
            if ($book < 1 || $chapter < 1) {
                continue;
            }
            $key = $this->chapterKey($book, $chapter);
            $rows[] = [
                'book' => $book,
                'chapter' => $chapter,
                'key' => $key,
                'label' => $this->chapterLabel(['book' => $book, 'chapter' => $chapter]),
                'completed' => isset($completedMap[$key]),
            ];
        }
        return $rows;
    }

    private function buildCompletedDaySet(array $allChapters, $totalDays, array $completedByDay)
    {
        $totalDays = max(1, (int) $totalDays);
        $set = [];

        for ($day = 1; $day <= $totalDays; $day++) {
            $assignment = $this->assignmentForDay($allChapters, $totalDays, $day);
            if (empty($assignment)) {
                continue;
            }

            $completedMap = isset($completedByDay[$day]) && is_array($completedByDay[$day]) ? $completedByDay[$day] : [];
            $allCompleted = true;
            foreach ($assignment as $row) {
                $key = $this->chapterKey((int) ($row['book'] ?? 0), (int) ($row['chapter'] ?? 0));
                if (!isset($completedMap[$key])) {
                    $allCompleted = false;
                    break;
                }
            }
            if ($allCompleted) {
                $set[$day] = true;
            }
        }

        return $set;
    }

    private function countCompletedInAssignment(array $assigned)
    {
        $count = 0;
        foreach ($assigned as $row) {
            if (!empty($row['completed'])) {
                $count++;
            }
        }
        return $count;
    }

    private function currentStreak(array $completedDaySet, $todayIndex, $todayCompleted)
    {
        $todayIndex = (int) $todayIndex;
        $cursor = $todayCompleted ? $todayIndex : ($todayIndex - 1);
        if ($cursor < 1) {
            return 0;
        }

        $streak = 0;
        for ($day = $cursor; $day >= 1; $day--) {
            if (!isset($completedDaySet[$day])) {
                break;
            }
            $streak++;
        }
        return $streak;
    }

    private function longestStreak(array $completedDaySet)
    {
        if (empty($completedDaySet)) {
            return 0;
        }

        $longest = 0;
        $run = 0;
        $lastDay = null;
        foreach (array_keys($completedDaySet) as $day) {
            $day = (int) $day;
            if ($lastDay !== null && $day === ($lastDay + 1)) {
                $run++;
            } else {
                $run = 1;
            }
            if ($run > $longest) {
                $longest = $run;
            }
            $lastDay = $day;
        }

        return $longest;
    }

    private function buildWeeklySummaryWithoutPlan($date, $goalDays)
    {
        $range = $this->weekRange($date);
        $days = [];
        for ($i = 0; $i < 7; $i++) {
            $dayDate = $range['start']->modify('+' . $i . ' day');
            $dayIso = $dayDate->format('Y-m-d');
            $days[] = [
                'date' => $dayIso,
                'label' => $this->weekdayLabel($dayDate),
                'has_assignment' => false,
                'completed' => false,
                'is_today' => $dayIso === $date,
            ];
        }

        return [
            'goal_days' => $goalDays,
            'completed_days' => 0,
            'assignable_days' => 0,
            'progress_percent' => 0,
            'goal_met' => false,
            'week_start' => $range['start']->format('Y-m-d'),
            'week_end' => $range['end']->format('Y-m-d'),
            'days' => $days,
        ];
    }

    private function buildWeeklySummary($date, $startDate, $totalDays, array $completedDaySet, $goalDays)
    {
        $range = $this->weekRange($date);
        $completed = 0;
        $assignable = 0;
        $days = [];

        for ($i = 0; $i < 7; $i++) {
            $dayDate = $range['start']->modify('+' . $i . ' day');
            $dayIso = $dayDate->format('Y-m-d');
            $idx = $this->dayIndex($startDate, $dayIso);
            $hasAssignment = $idx >= 1 && $idx <= (int) $totalDays;
            $done = $hasAssignment && isset($completedDaySet[$idx]);
            if ($hasAssignment) {
                $assignable++;
            }
            if ($done) {
                $completed++;
            }
            $days[] = [
                'date' => $dayIso,
                'label' => $this->weekdayLabel($dayDate),
                'has_assignment' => $hasAssignment,
                'completed' => $done,
                'is_today' => $dayIso === $date,
            ];
        }

        $progress = $goalDays > 0 ? (int) round((min($completed, $goalDays) / $goalDays) * 100) : 0;

        return [
            'goal_days' => $goalDays,
            'completed_days' => $completed,
            'assignable_days' => $assignable,
            'progress_percent' => $progress,
            'goal_met' => $completed >= $goalDays,
            'week_start' => $range['start']->format('Y-m-d'),
            'week_end' => $range['end']->format('Y-m-d'),
            'days' => $days,
        ];
    }

    private function weekRange($date)
    {
        try {
            $target = new \DateTimeImmutable($date);
        } catch (\Throwable $e) {
            $target = new \DateTimeImmutable(date('Y-m-d'));
        }

        $dayNumber = (int) $target->format('N');
        $start = $target->modify('-' . ($dayNumber - 1) . ' day');
        $end = $start->modify('+6 day');

        return [
            'start' => $start,
            'end' => $end,
        ];
    }

    private function weekdayLabel(\DateTimeImmutable $date)
    {
        $labels = [
            1 => 'Lun',
            2 => 'Mar',
            3 => 'Mie',
            4 => 'Jue',
            5 => 'Vie',
            6 => 'Sab',
            7 => 'Dom',
        ];
        $n = (int) $date->format('N');
        return isset($labels[$n]) ? $labels[$n] : '';
    }

    private function resolveWeeklyGoalDays($value)
    {
        $goal = (int) $value;
        if ($goal < 1) {
            $goal = 1;
        } elseif ($goal > 7) {
            $goal = 7;
        }
        return $goal;
    }

    private function buildDayWindow($totalChapters, $totalDays, $dayIndex)
    {
        if ($totalChapters < 1) {
            return ['start' => 0, 'count' => 0];
        }

        $base = intdiv($totalChapters, $totalDays);
        $extra = $totalChapters % $totalDays;

        $start = ($dayIndex - 1) * $base + min($dayIndex - 1, $extra);
        $count = $base + ($dayIndex <= $extra ? 1 : 0);

        if ($count < 1) {
            $count = 1;
        }
        if ($start >= $totalChapters) {
            $start = $totalChapters - 1;
            $count = 1;
        }
        if (($start + $count) > $totalChapters) {
            $count = $totalChapters - $start;
        }

        return [
            'start' => $start,
            'count' => max(0, $count),
        ];
    }

    private function chapterLabel(array $row)
    {
        return $this->bibleRepository->getBookName((int) $row['book']) . ' ' . (int) $row['chapter'];
    }

    private function chapterKey($book, $chapter)
    {
        return (int) $book . ':' . (int) $chapter;
    }

    private function dayIndex($startDate, $date)
    {
        try {
            $start = new \DateTimeImmutable($startDate);
            $target = new \DateTimeImmutable($date);
            $diff = (int) $start->diff($target)->format('%r%a');
            return $diff + 1;
        } catch (\Throwable $e) {
            return 1;
        }
    }

    private function normalizeDate($date)
    {
        $raw = trim((string) $date);
        if ($raw === '') {
            return date('Y-m-d');
        }
        $ts = strtotime($raw);
        if ($ts === false) {
            return date('Y-m-d');
        }
        return date('Y-m-d', $ts);
    }
}
