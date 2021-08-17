<?php

class grid_ventas_por_vendedor_gantt
{
    var $Db;
    var $Erro;
    var $Ini;
    var $Lookup;
    var $nm_data;
    var $chart_data;
    var $chart_only;
    var $output;
    var $interval;
    var $categories;
    var $output_formatted;
    var $output_unformatted;

    function grid_ventas_por_vendedor_gantt()
    {
        $this->nm_data    = new nm_data("es");
        $this->output     = 'html5';
        $this->chart_only = false;
        $this->setOutputFormat();
    }

    function monta_gantt()
    {
        $this->getChartData();
        $this->displayChart();
    }

    function prep_modulos($modulo)
    {
        $this->$modulo->Ini    = $this->Ini;
        $this->$modulo->Db     = $this->Db;
        $this->$modulo->Erro   = $this->Erro;
        $this->$modulo->Lookup = $this->Lookup;
    }

    function setOutputFormat()
    {
        $aTempFormat = array();
        $sTempFormat = $_SESSION['scriptcase']['reg_conf']['date_format'];
        $sTempFormat = str_replace(array('a', '/'), array('y', ''), $sTempFormat);
        for ($i = 0; $i < strlen($sTempFormat); $i++)
        {
            $sChar = substr($sTempFormat, $i, 1);
            if (!in_array($sChar, $aTempFormat))
            {
                $aTempFormat[] = $sChar;
            }
        }
        $this->output_formatted   = str_replace(array('d', 'm', 'y'), array('dd', 'mm', 'yyyy'), implode('/', $aTempFormat));
        $this->output_unformatted = str_replace(array('d', 'm', 'y'), array('dd', 'mm', 'yyyy'), implode('', $aTempFormat));
    }

    function getChartData()
    {
        $this->chart_data = array();

        $sSelect  = "SELECT t.nombres, f.fechaven,  FROM " . $this->Ini->nm_tabela;
        $sSelect .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ventas_por_vendedor']['where_pesq'];
        $sSelect .= " ORDER BY f.fechaven, ";

        $_SESSION['scriptcase']['sc_sql_ult_comando'] = $sSelect;

        $rs_gantt = $this->Db->Execute($sSelect);

        if ($rs_gantt === false && !$rs_gantt->EOF && $GLOBALS['NM_ERRO_IBASE'] != 1)
        {
            $this->Erro->mensagem(__FILE__, __LINE__, 'banco', $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
            exit;
        }

        while (!$rs_gantt->EOF)
        {
            $cliente = $rs_gantt->fields[0];
            $fecha = $rs_gantt->fields[1];
            $ = $rs_gantt->fields[2];
            $_sc_gantt_data_complete = 100;
            $_sc_gantt_data_resource = '';

            $this->chart_data[] = array(
                'label'    => $cliente,
                'start'    => $fecha,
                'end'      => $,
                'complete' => $_sc_gantt_data_complete,
                'resource' => $_sc_gantt_data_resource,
            );

            $rs_gantt->MoveNext();
        }
    }

    function displayChart()
    {
        global $nm_saida;

        if (!$this->chart_only)
        {
            $nm_saida->saida("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\r\n");
            $nm_saida->saida("            \"http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd\">\r\n");
            $nm_saida->saida("<html" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\r\n");
            $nm_saida->saida("<head>\r\n");
            $nm_saida->saida(" <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\" />\r\n");
            $nm_saida->saida(" <meta http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\" />\r\n");
            $nm_saida->saida(" <meta http-equiv=\"Last-Modified\" content=\"" . gmdate("D, d M Y H:i:s") . " GMT\" />\r\n");
            $nm_saida->saida(" <meta http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\" />\r\n");
            $nm_saida->saida(" <meta http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\" />\r\n");
            $nm_saida->saida(" <meta http-equiv=\"Pragma\" content=\"no-cache\">\r\n");
            $nm_saida->saida(" <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n");
            if ($_SESSION['scriptcase']['proc_mobile'])
            {
            $nm_saida->saida(" <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\" />\r\n");
            }
            $nm_saida->saida(" <title>grid_ventas_por_vendedor</title>\r\n");
            $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid.css\" />\r\n");
            $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/css/" . $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" />\r\n");
            if ('html' == $this->output)
            {
                $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "_lib/lib/js/jsgantt.css\" />\r\n");
                $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_link . "_lib/lib/js/jsgantt.js\"></script>\r\n");
            }
            elseif ($_SESSION['scriptcase']['fusioncharts_new'])
            {
                $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/oem_fs/FusionCharts/js/fusioncharts.js\"></script>\r\n");
            }
            else
            {
                $nm_saida->saida(" <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/fusioncharts_xt_ol/FusionCharts/js/fusioncharts.js\"></script>\r\n");
            }
            $nm_saida->saida("</head>\r\n");
            $nm_saida->saida("<body class=\"scGridPage\">\r\n");
        }

        $nm_saida->saida("<div id=\"GanttChartDIV\"></div>\r\n");
        $nm_saida->saida("<script>\r\n");

        if ('html' == $this->output)
        {
            $nm_saida->saida(" var g = new JSGantt.GanttChart('g', document.getElementById('GanttChartDIV'), 'day');\r\n");
            $nm_saida->saida(" g.setShowDur(1);\r\n");
            $nm_saida->saida(" g.setCaptionType('Resource');\r\n");
            $nm_saida->saida(" g.setShowStartDate(1);\r\n");
            $nm_saida->saida(" g.setShowEndDate(1);\r\n");
            $nm_saida->saida(" g.setDateInputFormat('yyyy/mm/dd');\r\n");
            $nm_saida->saida(" g.setDateDisplayFormat('" . $this->output_formatted . "');\r\n");
            $nm_saida->saida(" if (g) {\r\n");

            foreach ($this->chart_data as $iRecIdx => $aRecData)
            {
                $nm_saida->saida("  g.AddTaskItem(new JSGantt.TaskItem($iRecIdx, \"" . $aRecData['label'] . "\", \"" . $this->formatStartInputDate($aRecData['start']) . "\", \"" . $this->formatEndInputDate($aRecData['end']) . "\", \"0088CC\", \"\", 0, \"" . $aRecData['resource'] . "\", " . $this->formatComplete($aRecData['complete']) . ", 0, 0, 1));\r\n");
            }

            $nm_saida->saida("  g.Draw();        \r\n");
            $nm_saida->saida("  g.DrawDependencies();\r\n");
            $nm_saida->saida(" }\r\n");
        }
        else
        {
            $sTempXml = $this->Ini->path_imag_temp . '/' . 'sc_gantt_' . md5(microtime()) . '.xml';
            $rTempXml = @fopen($this->Ini->root . $sTempXml, 'w');
            @fwrite($rTempXml, "<chart dateFormat='" . $this->output_formatted . "' caption='grid_ventas_por_vendedor' ganttPaneDuration='12' ganttPaneDurationUnit='m'>\n");
            @fwrite($rTempXml, " <processes fontSize='12' isBold='1' align='right'>\n");

            foreach ($this->chart_data as $iRecIdx => $aRecData)
            {
                @fwrite($rTempXml, "  <process label='" . $aRecData['label'] . "' />\n");
            }

            @fwrite($rTempXml, " </processes>\n");
            @fwrite($rTempXml, " <tasks>\n");

            foreach ($this->chart_data as $iRecIdx => $aRecData)
            {
                @fwrite($rTempXml, "  <task start='" . $this->formatStartInputDate($aRecData['start']) . "' end='" . $this->formatEndInputDate($aRecData['end']) . "' percentComplete='" . $this->formatComplete($aRecData['complete']) . "' />\n");
            }

            @fwrite($rTempXml, " </tasks>\n");
            $this->createCategories();
            foreach ($this->categories as $aCategory)
            {
                @fwrite($rTempXml, " <categories>\n");

                foreach ($aCategory as $aCategoryData)
                {
                    @fwrite($rTempXml, "  <category start='" . $this->formatIntervalDate($aCategoryData['start']) . "' end='" . $this->formatIntervalDate($aCategoryData['end']) . "' label='" . $aCategoryData['label'] . "' />\n");
                }

                @fwrite($rTempXml, " </categories>\n");
            }
            @fwrite($rTempXml, "</chart>");
            @fclose($rTempXml);
            if ($_SESSION['scriptcase']['fusioncharts_new'])
            {
            $nm_saida->saida(" FusionCharts.ready(function() {\r\n");
            $nm_saida->saida("  var myChart = new FusionCharts({\r\n");
            $nm_saida->saida("   \"type\": \"gantt\",\r\n");
            $nm_saida->saida("   \"renderAt\": \"GanttChartDIV\",\r\n");
            $nm_saida->saida("   \"width\": \"600\",\r\n");
            $nm_saida->saida("   \"height\": \"450\",\r\n");
            $nm_saida->saida("   \"dataFormat\": \"xmlurl\",\r\n");
            $nm_saida->saida("   \"dataSource\": \"" . $sTempXml . "\"\r\n");
            $nm_saida->saida("  }).render();\r\n");
            $nm_saida->saida(" });\r\n");
            }
            else
            {
            $nm_saida->saida(" var myChart = new FusionCharts(\"" . $this->Ini->path_prod . "/third/fusioncharts/FusionWidgets/Gantt.swf\", \"myChartId\", \"600\", \"450\", \"0\", \"1\");\r\n");
            $nm_saida->saida(" myChart.setXMLUrl(\"" . $sTempXml . "\");\r\n");
            $nm_saida->saida(" myChart.render(\"GanttChartDIV\");\r\n");
            }
        }

        $nm_saida->saida("</script>\r\n");

        if (!$this->chart_only)
        {
            $nm_saida->saida("</body>\r\n");
            $nm_saida->saida("</html>\r\n");
        }
    }

    function formatStartInputDate($sDate)
    {
        $sTempDate = $sDate;
        nm_conv_limpa_dado($sTempDate, "YYYY-MM-DD");
        if (is_numeric($sTempDate) && $sTempDate > 0)
        {
            $this->nm_data->SetaData($sDate, "YYYY-MM-DD");
            $sOutput = 'html' == $this->output ? $this->nm_data->FormatRegion("DT", "aaaammdd") : $this->formatOutputDate($this->output_unformatted);
            $sDate   = $this->nm_data->FormataSaida($sOutput);
            $this->storeDateInfo($this->nm_data->mAno, $this->nm_data->mMes);
        }
        return ('-' == $sSep) ? str_replace('/', '-', $sDate) : $sDate;
    }

    function formatEndInputDate($sDate)
    {
        return $sDate;
    }

    function formatIntervalDate($sDate)
    {
        return $sDate;
    }

    function formatComplete($iComplete)
    {
        if ('' == $iComplete)
        {
            $iComplete = 0;
        }
        return $iComplete;
    }

    function formatOutputDate($sFormat, $sType="")
    {
        $sFormat = str_replace(array('/', '-', ':', ',', ' ', 'a', 'y', 'h'), array('', '', '', '', '', 'Y', 'Y', 'H'), $sFormat);
        $aChars  = array();
        for ($i = 0; $i < strlen($sFormat); $i++)
        {
            $sChar = substr($sFormat, $i, 1);
            if (!in_array($sChar, $aChars))
            {
                $aChars[] = $sChar;
            }
        }
        $sNewFormat = implode('/', $aChars);
        if ('html' == $sType)
        {
            return str_replace(array('d', 'm', 'Y'), array('dd', 'mm', 'yyyy'), $sNewFormat);
        }
        else
        {
            return $sNewFormat;
        }
    }

    function storeDateInfo($iYear, $iMonth)
    {
        if (!isset($this->interval[$iYear]))
        {
            $this->interval[$iYear] = array();
        }
        if (!in_array($iMonth, $this->interval[$iYear]))
        {
            $this->interval[$iYear][] = $iMonth;
        }
    }

    function createCategories()
    {
        ksort($this->interval);
        foreach ($this->interval as $iYear => $aMonths)
        {
            asort($aMonths);
            $this->interval[$iYear] = $aMonths;
        }

        $this->categories = array();

        foreach ($this->interval as $iYear => $aMonths)
        {
            $aEntry          = array('label' => $iYear);
            $aEntry['start'] = $iYear . '/' . $aMonths[0] . '/01';
            $iLastMonth      = $aMonths[ sizeof($aMonths) - 1 ];
            $this->addMonth($iYear, $iLastMonth);
            $aEntry['end']              = $iYear . '/' . $iLastMonth . '/01';
            $this->categories['year'][] = $aEntry;
        }

        reset($this->interval);
        $iFirstYear = key($this->interval);
        end($this->interval);
        $iLastYear   = key($this->interval);
        $iFirstMonth = $this->interval[$iFirstYear][0];
        $iLastMonth  = $this->interval[$iLastYear][ sizeof($this->interval[$iLastYear]) - 1 ];

        for ($i = $iFirstYear; $i <= $iLastYear; $i++)
        {
            if ($i == $iFirstYear && $i == $iLastYear)
            {
                for ($j = $iFirstMonth; $j <= $iLastMonth; $j++)
                {
                    $iYear           = $i;
                    $iMonth          = $j;
                    $aEntry          = array('label' => $this->monthLabel($iMonth));
                    $aEntry['start'] = $iYear . '/' . $iMonth . '/01';
                    $this->addMonth($iYear, $iMonth);
                    $aEntry['end']               = $iYear . '/' . $iMonth . '/01';
                    $this->categories['month'][] = $aEntry;
                }
            }
            elseif ($i == $iFirstYear)
            {
                for ($j = $iFirstMonth; $j <= 12; $j++)
                {
                    $iYear           = $i;
                    $iMonth          = $j;
                    $aEntry          = array('label' => $this->monthLabel($iMonth));
                    $aEntry['start'] = $iYear . '/' . $iMonth . '/01';
                    $this->addMonth($iYear, $iMonth);
                    $aEntry['end']               = $iYear . '/' . $iMonth . '/01';
                    $this->categories['month'][] = $aEntry;
                }
            }
            elseif ($i == $iLastYear)
            {
                for ($j = 1; $j <= $iLastMonth; $j++)
                {
                    $iYear           = $i;
                    $iMonth          = $j;
                    $aEntry          = array('label' => $this->monthLabel($iMonth));
                    $aEntry['start'] = $iYear . '/' . $iMonth . '/01';
                    $this->addMonth($iYear, $iMonth);
                    $aEntry['end']               = $iYear . '/' . $iMonth . '/01';
                    $this->categories['month'][] = $aEntry;
                }
            }
            else
            {
                for ($j = 1; $j <= 12; $j++)
                {
                    $iYear           = $i;
                    $iMonth          = $j;
                    $aEntry          = array('label' => $this->monthLabel($iMonth));
                    $aEntry['start'] = $iYear . '/' . $iMonth . '/01';
                    $this->addMonth($iYear, $iMonth);
                    $aEntry['end']               = $iYear . '/' . $iMonth . '/01';
                    $this->categories['month'][] = $aEntry;
                }
            }
        }
    }

    function addMonth(&$iYear, &$iMonth)
    {
        if ('12' == $iMonth)
        {
            $iMonth = '01';
            $iYear++;
        }
        else
        {
            $iMonth++;
            if (10 > $iMonth)
            {
                $iMonth = '0' . $iMonth;
            }
        }
    }
    function monthLabel($iMonth)
    {
        if (1 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_janu'];
        }
        elseif (2 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_febr'];
        }
        elseif (3 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_marc'];
        }
        elseif (4 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_apri'];
        }
        elseif (5 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_mayy'];
        }
        elseif (6 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_june'];
        }
        elseif (7 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_july'];
        }
        elseif (8 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_augu'];
        }
        elseif (9 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_sept'];
        }
        elseif (10 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_octo'];
        }
        elseif (11 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_nove'];
        }
        elseif (12 == $iMonth)
        {
            return $this->Ini->Nm_lang['lang_shrt_mnth_dece'];
        }
        return $iMonth;
    }

}

?>