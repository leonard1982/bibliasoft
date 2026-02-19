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
        $active = $this->userDataRepository->getActiveReadingPlan();
        if (!$active) {
            return [
                'active' => false,
                'today' => $date,
                'catalog' => $this->catalog,
            ];
        }

        $planId = (int) $active['id'];
        $totalDays = max(1, (int) $active['total_days']);
        $startDate = $this->normalizeDate($active['start_date'] ?? '');
        $todayIndex = $this->dayIndex($startDate, $date);
        $todayIndex = max(1, min($totalDays, $todayIndex));

        $chapters = $this->bibleRepository->getAllChaptersOrdered();
        $totalChapters = count($chapters);
        $window = $this->buildDayWindow($totalChapters, $totalDays, $todayIndex);

        $todayChapters = [];
        if ($window['count'] > 0) {
            $todayChapters = array_slice($chapters, $window['start'], $window['count']);
        }

        $progressMap = $this->userDataRepository->getReadingPlanProgressMap($planId);
        $completedDays = $this->userDataRepository->countReadingPlanCompletedDays($planId);
        $todayDone = isset($progressMap[$todayIndex]);

        return [
            'active' => true,
            'today' => $date,
            'catalog' => $this->catalog,
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
                'today_assignment' => [
                    'start_label' => !empty($todayChapters) ? $this->chapterLabel($todayChapters[0]) : '',
                    'end_label' => !empty($todayChapters) ? $this->chapterLabel($todayChapters[count($todayChapters) - 1]) : '',
                    'count' => count($todayChapters),
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
        $chapters = $plan['today_assignment']['chapters'];
        if (empty($chapters)) {
            return $status;
        }

        $first = $chapters[0];
        $this->userDataRepository->setReadingPlanDayCompletion(
            (int) $plan['id'],
            (int) $plan['today_index'],
            $date,
            (int) $first['book'],
            (int) $first['chapter'],
            (bool) $completed
        );

        return $this->status($date);
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
