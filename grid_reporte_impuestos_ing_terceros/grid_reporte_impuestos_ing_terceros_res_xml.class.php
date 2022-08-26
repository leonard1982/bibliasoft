<?php

class grid_reporte_impuestos_ing_terceros_res_xml
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $array_titulos;
   var $array_linhas;
   var $campo_titulo;

   var $Arquivo;
   var $Arquivo_view;
   var $Tit_doc;
   var $sc_proc_grid; 

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("es");
   }

   //---- 
   function monta_xml()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['xml_res_grid']))
      {
          return;
      }
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Xml_f);
          $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
          $Temp = ob_get_clean();
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      else
      {
          $this->progress_bar_end();
      }
   }

   //----- 
   function inicializa_vars()
   {
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->New_Format  = true;
      $this->Xml_password  = "";
      if (isset($_REQUEST['nm_xml_tag']) && !empty($_REQUEST['nm_xml_tag']))
      {
          $this->New_Format = ($_REQUEST['nm_xml_tag'] == "tag") ? true : false;
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
      $this->array_titulos = array();
      $this->array_linhas  = array();
      $this->campo_titulo  = array();
      $this->nm_data       = new nm_data("es");
      $this->Arquivo       = "sc_xml";
      $this->Arquivo      .= "_" . date('YmdHis') . "_" . rand(0, 1000);
      $this->Arq_zip       = $this->Arquivo . "_grid_reporte_impuestos_ing_terceros.zip";
      $this->Arquivo      .= "_grid_reporte_impuestos_ing_terceros";
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['xml_res_grid']))
      {
          $this->Arquivo      .= "_" . $this->Ini->Nm_lang['lang_othr_smry_titl'];
      }
      $this->Arquivo_view  = $this->Arquivo . "_view.xml";
      $this->Arquivo      .= ".xml";
      $this->Tit_doc       = "grid_reporte_impuestos_ing_terceros.xml";
      $this->Tit_zip       = "grid_reporte_impuestos_ing_terceros.zip";
      $this->Grava_view   = false;
      if (strtolower($_SESSION['scriptcase']['charset']) != strtolower($_SESSION['scriptcase']['charset_html']))
      {
          $this->Grava_view = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['xml_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['xml_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['xml_name'] .= ".xml";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['xml_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['xml_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['xml_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['xml_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      $this->Res       = new grid_reporte_impuestos_ing_terceros_resumo("out");
      $this->prep_modulos("Res");
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['xml_res_grid']) && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['xml_return']);
          $this->pb->setTotalSteps(100);
          $Mens_bar  = $this->Ini->Nm_lang['lang_othr_prcs'];
          $Mens_smry = $this->Ini->Nm_lang['lang_othr_smry_titl'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
              $Mens_bar  = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
              $Mens_smry = sc_convert_encoding($Mens_smry, "UTF-8", $_SESSION['scriptcase']['charset']);
          }
          $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
          $this->pb->addSteps(50);
      }
   }

   //---- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }

   //----- 
   function grava_arquivo()
   {
      $xml_charset = $_SESSION['scriptcase']['charset'];
      $this->Xml_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
      $xml_f       = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      fwrite($xml_f, "<?xml version=\"1.0\" encoding=\"$xml_charset\" ?>\r\n");
      fwrite($xml_f, "<root>\r\n");
      if ($this->New_Format)
      {
          fwrite($xml_f, "<grid_reporte_impuestos_ing_terceros>\r\n");
      }
      if ($this->Grava_view)
      {
          $xml_charset_v = $_SESSION['scriptcase']['charset_html'];
          $xml_v         = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view, "w");
          fwrite($xml_v, "<?xml version=\"1.0\" encoding=\"$xml_charset_v\" ?>\r\n");
          fwrite($xml_v, "<root>\r\n");
          if ($this->New_Format)
          {
              fwrite($xml_v, "<grid_reporte_impuestos_ing_terceros>\r\n");
          }
      }
      $this->Res->resumo_export();
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['xml_res_grid']) && !$this->Ini->sc_export_ajax) {
          $Mens_bar  = $this->Ini->Nm_lang['lang_othr_prcs'];
          $Mens_smry = $this->Ini->Nm_lang['lang_othr_smry_titl'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
              $Mens_bar  = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
              $Mens_smry = sc_convert_encoding($Mens_smry, "UTF-8", $_SESSION['scriptcase']['charset']);
          }
          $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
          $this->pb->addSteps(30);
      }
      $label_index = 'label';
      if (isset($_REQUEST['nm_xml_label']) && 'N' == $_REQUEST['nm_xml_label']) {
          $label_index = 'field_name';
      }
      $this->array_titulos = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['arr_export']['label'];
      $this->array_linhas  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['arr_export']['data'];
      $contr_rowspan = array();
      $tit_rowspan   = array();
      foreach ($this->array_titulos as $lines)
      {
           $col = 0;
           foreach ($lines as $columns)
           {
               $col_ok = false;
               $colspan = (isset($columns['colspan']) && 1 < $columns['colspan']) ? $columns['colspan'] : 1;
               while (!$col_ok)
               {
                   if (isset($contr_rowspan[$col]) && 1 < $contr_rowspan[$col])
                   {
                       if (isset($this->campo_titulo[$col]))   
                       {
                          $this->campo_titulo[$col] .= "_";
                       }
                       $this->campo_titulo[$col] .= $tit_rowspan[$col];
                       $contr_rowspan[$col]--;
                       $col++;
                   }
                   else
                   {
                       $col_ok = true;
                   }
               }
               $col_t = $col;
               if (isset($columns['rowspan']) && 1 < $columns['rowspan'])
               {
                   $contr_rowspan[$col] = $columns['rowspan'];
                   for ($x = 0; $x < $colspan; $x++)
                   {
                        if (isset($tit_rowspan[$col_t]))   
                        {
                            $tit_rowspan[$col_t] .= "_";
                        }
                        $tit_rowspan[$col_t] .= $columns[$label_index];
                       $col_t++;
                   }
               }
               for ($x = 0; $x < $colspan; $x++)
               {
                    if (isset($this->campo_titulo[$col]))   
                    {
                       $this->campo_titulo[$col] .= "_";
                    }
                    $this->campo_titulo[$col] .= $columns[$label_index];
                   $col++;
               }
           }
           foreach ($contr_rowspan as $col_t => $row)
           {
               if ($col_t >= $col && $row > 1)
               {
                   $contr_rowspan[$col]--;
               }
           }
      }
      foreach ($this->campo_titulo as $col => $titulo)
      {
          if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->campo_titulo[$col]))
          {
              $this->campo_titulo[$col] = sc_convert_encoding($this->campo_titulo[$col], "UTF-8", $_SESSION['scriptcase']['charset']);
          }
      }
      $this->grava_linha($xml_f);
      if ($this->New_Format)
      {
          fwrite($xml_f, "</grid_reporte_impuestos_ing_terceros>\r\n");
      }
      fwrite($xml_f, "</root>");
      fclose($xml_f);
      if ($this->Grava_view)
      {
          $this->grava_linha($xml_v);
          if ($this->New_Format)
          {
              fwrite($xml_v, "</grid_reporte_impuestos_ing_terceros>\r\n");
          }
          fwrite($xml_v, "</root>");
          fclose($xml_v);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['xml_res_grid']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['xml_res_file']['xml'] = $this->Xml_f;
          if ($this->Grava_view)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['xml_res_file']['view'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view;
          }
      }
      elseif ($this->Xml_password != "")
      { 
          $str_zip = "";
          $Zip_f = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
          $Arq_input  = (FALSE !== strpos($this->Xml_f, ' ')) ? " \"" . $this->Xml_f . "\"" :  $this->Xml_f;
          if (is_file($Zip_f)) {
              unlink($Zip_f);
          }
          if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
          {
              chdir($this->Ini->path_third . "/zip/windows");
              $str_zip = "zip.exe -P -j " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
          }
          elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
          {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                }
                else
                {
                    chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                }
              $str_zip = "./7za -p" . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
          }
          elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
          {
              chdir($this->Ini->path_third . "/zip/mac/bin");
              $str_zip = "./7za -p" . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
          }
          if (!empty($str_zip)) {
              exec($str_zip);
          }
          // ----- ZIP log
          $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
          if ($fp)
          {
              @fwrite($fp, $str_zip . "\r\n\r\n");
              @fclose($fp);
          }
          unlink($Arq_input);
          $this->Arquivo = $this->Arq_zip;
          $this->Xml_f   = $this->Zip_f;
          $this->Tit_doc = $this->Tit_zip;
          if ($this->Grava_view)
          {
              $str_zip = "";
              $xml_view_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view;
              $zip_view_f = str_replace(".zip", "_view.zip", $this->Zip_f);
              $zip_arq_v  = str_replace(".zip", "_view.zip", $this->Arq_zip);
              $Zip_f      = (FALSE !== strpos(\zip_view_f, ' ')) ? " \"" . \zip_view_f . "\"" :  \zip_view_f;
              $Arq_input  = (FALSE !== strpos($xml_view_f, ' ')) ? " \"" . $xml_view_f . "\"" :  $xml_view_f;
              if (is_file($Zip_f)) {
                  unlink($Zip_f);
              }
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  chdir($this->Ini->path_third . "/zip/windows");
                  $str_zip = "zip.exe -P -j " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
              {
                 if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                 {
                     chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                 }
                 else
                 {
                     chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                 }
                 $str_zip = "./7za -p" . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  chdir($this->Ini->path_third . "/zip/mac/bin");
                 $str_zip = "./7za -p" . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
              }
              if (!empty($str_zip)) {
                  exec($str_zip);
              }
              unlink($Arq_input);
              $this->Arquivo_view = $zip_arq_v;
              // ----- ZIP log
              $fp = @fopen(str_replace(".zip", ".log", $Zip_f), 'a');
              if ($fp)
              {
                  @fwrite($fp, $str_zip . "\r\n\r\n");
                  @fclose($fp);
              }
          } 
          else 
          {
              $this->Arquivo_view = $this->Arq_zip;
          } 
      } 
   }

   //----- 
   function grava_linha($xml_f)
   {
      $contr_rowspan = "";
      $tit_rowspan   = "";
      foreach ($this->array_linhas as $lines)
      {
          $col           = 0;
          $lab           = "";
          $cmp           = false;
          $xml_registro  = "";
          if (!$this->New_Format)
          {
              $xml_registro = "<grid_reporte_impuestos_ing_terceros";
          }
          foreach ($lines as $columns)
          {
              if (0 <= $columns['level'])
              {
                  $cada_dado = $columns['label'];
                  $cada_dado = str_replace("&nbsp;", "", $cada_dado);
                  if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($cada_dado))
                  {
                      $cada_dado = sc_convert_encoding($cada_dado, "UTF-8", $_SESSION['scriptcase']['charset']);
                  }
                  if (isset($columns['rowspan']) && $columns['rowspan'] > 1)
                  {
                      $contr_rowspan = $columns['rowspan'];
                      $tit_rowspan   = (!empty($tit_rowspan)) ? "_" . $cada_dado : $cada_dado;
                  }
                  else
                  {
                     $lab .= (empty($lab)) ? $cada_dado : "_" . $cada_dado;
                  }
              }
              else
              {
                  if (!$cmp)
                  {
                      if (!empty($contr_rowspan) && $contr_rowspan > 0)
                      {
                          $lab = $tit_rowspan . "_" . $lab;
                          $contr_rowspan--;
                      }
                      $this->clear_tag($lab);
                      if ($this->New_Format)
                      {
                          $xml_registro .= "<" . $lab . ">\r\n";
                      }
                      else
                      {
                          $xml_registro .= " Campo=\"" . $lab . "\"";
                      }
                      $cmp = true;
                  }
                  $cada_dado = $columns['value'];
                  $cada_tit  = $this->trata_dados($this->campo_titulo[$col]);
                  $this->clear_tag($cada_tit);
                  if ($this->New_Format)
                  {
                      $xml_registro .= " <" . $cada_tit . ">" . $cada_dado . "</" . $cada_tit . ">\r\n";
                  }
                  else
                  {
                      $xml_registro .= " " . $cada_tit . "=\"" . $cada_dado . "\"";
                  }
                  $col++;
              }
          }
          if ($this->New_Format && $cmp)
          {
              $xml_registro .= "</" . $lab . ">\r\n";
          }
          if (!$this->New_Format)
          {
              $xml_registro .= " />\r\n";
          }
          fwrite($xml_f, $xml_registro);
      }
   }

   //----- 
   function trata_dados($conteudo)
   {
      $str_temp = $conteudo;
      $str_temp = str_replace("<br />", "",  $str_temp);
      $str_temp = str_replace("&", "&amp;",  $str_temp);
      $str_temp = str_replace("<", "&lt;",   $str_temp);
      $str_temp = str_replace(">", "&gt;",   $str_temp);
      $str_temp = str_replace("'", "&apos;", $str_temp);
      $str_temp = str_replace('"', "&quot;",  $str_temp);
      $str_temp = str_replace('(', "_",  $str_temp);
      $str_temp = str_replace(')', "",  $str_temp);
      return ($str_temp);
   }

   function clear_tag(&$conteudo)
   {
      $out = (is_numeric(substr($conteudo, 0, 1)) || substr($conteudo, 0, 1) == "") ? "_" : "";
      $str_temp = "abcdefghijklmnopqrstuvwxyz0123456789";
      for ($i = 0; $i < strlen($conteudo); $i++)
      {
          $char = substr($conteudo, $i, 1);
          $ok = false;
          for ($z = 0; $z < strlen($str_temp); $z++)
          {
              if (strtolower($char) == substr($str_temp, $z, 1))
              {
                  $ok = true;
                  break;
              }
          }
          $out .= ($ok) ? $char : "_";
      }
      $conteudo = $out;
   }

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out);
           return $dt_out;
       }
   }
   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Facturas de venta contrato :: XML</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->str_google_fonts ?>" />
 <?php
 }
 ?>
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">XML</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo_view ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_reporte_impuestos_ing_terceros_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_reporte_impuestos_ing_terceros"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_impuestos_ing_terceros']['xml_return']); ?>"> 
</FORM> 
</td></tr></table>
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $str_highlight_ini = "";
      $str_highlight_fim = "";
      if(substr($nm_campo, 0, 23) == '<div class="highlight">' && substr($nm_campo, -6) == '</div>')
      {
           $str_highlight_ini = substr($nm_campo, 0, 23);
           $str_highlight_fim = substr($nm_campo, -6);

           $trab_campo = substr($nm_campo, 23, -6);
           $tam_campo  = strlen($trab_campo);
      }      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
   } 
function fActualizarTotalFactura($idfac)
{
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'on';
  
if(!empty($idfac))
{
	$vsqltotal = "update 
		  facturaven 
		  set 
		  total=(select coalesce(sum(d.tneto),0) from detalleventa d where d.numfac='".$idfac."'),
		  saldo=(select coalesce(sum(d.tneto),0) from detalleventa d where d.numfac='".$idfac."'),
		  valoriva=round((select coalesce(sum(d.iva),0) from detalleventa d where d.numfac='".$idfac."')), 
		  subtotal=round((select coalesce(sum(d.tbase),0) from detalleventa d where d.numfac='".$idfac."')) 
		  where 
		  idfacven='".$idfac."'
		  ";

	
     $nm_select = $vsqltotal; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
}
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'off';
}
function fAlinearTexto($texto, $titulo, $retorno, $distancia, $alineacion='izquierda')
{
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'on';
  
if(!empty($texto) or !empty($titulo))
{	
	if($alineacion=="centro")
	{	
		$distancia = (42-strlen($texto))/2;
	}
	
	$linea  = str_pad($titulo,$distancia," ").$texto;
	
	if(!empty($retornos) and $retornos > 0)
	{
		for($i=1;$i<=$retornos;$i++)
		{
			$linea .= "\n";
		}
	}
	
	return $linea;
}
else
{
	echo "NO SE RECIBIO PARAMETRO.";	
}


$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'off';
}
function fGestionaStock($iddet, $tipo=2)
{
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'on';
  
if(!empty($iddet))
{	
	$vsqldetalle = "select 
					cantidad,
					idpro,
					costop,
					valorpar,
					idbod,
					numfac,
					unidadmayor,
					factor
					from 
					detalleventa 
					where 
					iddet='".$iddet."'
					";
	
	 
      $nm_select = $vsqldetalle; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDatosDetalle = array();
      $vdatosdetalle = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDatosDetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdatosdetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDatosDetalle = false;
          $vDatosDetalle_erro = $this->Db->ErrorMsg();
          $vdatosdetalle = false;
          $vdatosdetalle_erro = $this->Db->ErrorMsg();
      } 
;
	
	if(isset($vdatosdetalle[0][0]))
	{
		$vcantidad = $vdatosdetalle[0][0];
		$vidpro    = $vdatosdetalle[0][1];
		$vcosto    = $vdatosdetalle[0][2];
		$vvalorpar = $vdatosdetalle[0][3];
		$vidbod    = $vdatosdetalle[0][4];
		$vnumfac   = $vdatosdetalle[0][5];
		$vtipo     = $tipo;
		$vdetalle  = "Venta";
		$vidmov    = 1;
		$vfecha    = date("Y-m-d");
		$vunidadmayor = $vdatosdetalle[0][6];
		$vfactor   = $vdatosdetalle[0][7];
		
		if($vunidadmayor!="SI" and $vfactor > 0)
		{
			$vcantidad = $vcantidad/$vfactor;
		}
	}
	
	
	if($tipo==2)
	{
		$vsqlinv = "INSERT 
			  inventario 
			  SET 
			  fecha		   ='".$vfecha."', 
			  cantidad	   =(".$vcantidad."*-1), 
			  idpro		   ='".$vidpro."', 
			  costo		   ='".$vcosto."',
			  valorparcial ='".$vvalorpar."', 
			  idbod        ='".$vidbod."', 
			  tipo		   ='".$vtipo."', 
			  detalle	   ='".$vdetalle."', 
			  idmov		   ='".$vidmov."',
			  nufacvta	   ='".$vnumfac."', 
			  iddetalle	   ='".$iddet."'
			  ";

		
     $nm_select = $vsqlinv; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

		$vsqlstock="UPDATE 
			   productos 
			   SET 
			   stockmen = stockmen-$vcantidad
			   WHERE 
			   idprod='".$vidpro."'
			   ";

		
     $nm_select = $vsqlstock; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
		
		 
      $nm_select = "select escombo from productos where idprod='".$vidpro."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSiEsCombo = array();
      $vsiescombo = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSiEsCombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsiescombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSiEsCombo = false;
          $vSiEsCombo_erro = $this->Db->ErrorMsg();
          $vsiescombo = false;
          $vsiescombo_erro = $this->Db->ErrorMsg();
      } 
;
		
		if(isset($vsiescombo[0][0]))
		{
			$vescombo = $vsiescombo[0][0];
			
			if($vescombo=='SI')
			{
				 
      $nm_select = "select idproducto,cantidad,precio from detallecombos where idcombo='".$vidpro."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vItemsCombo = array();
      $vitemscombo = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vItemsCombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vitemscombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vItemsCombo = false;
          $vItemsCombo_erro = $this->Db->ErrorMsg();
          $vitemscombo = false;
          $vitemscombo_erro = $this->Db->ErrorMsg();
      } 
;
				if(isset($vitemscombo[0][0]))
				{
					for($i=0;$i<count($vitemscombo );$i++)
					{
						$vidpro2    = $vitemscombo[$i][0];
						$vcantidad2 = $vitemscombo[$i][1];
						$vprecio2   = $vitemscombo[$i][2];
						
						$vsqlinv2 = "INSERT 
							  inventario 
							  SET 
							  fecha		   ='".$vfecha."', 
							  cantidad	   =(($vcantidad2*$vcantidad)*-1), 
							  idpro		   ='".$vidpro2."', 
							  costo		   ='".$vprecio2."',
							  valorparcial =($vprecio2*($vcantidad2*$vcantidad)), 
							  idbod        ='".$vidbod."', 
							  tipo		   ='".$vtipo."', 
							  detalle	   ='".$vdetalle."', 
							  idmov		   ='".$vidmov."',
							  nufacvta	   ='".$vnumfac."', 
							  iddetalle	   ='".$iddet."',
							  idcombo      ='".$vidpro."'
							  ";

						
     $nm_select = $vsqlinv2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

						$vsqlstock2="UPDATE 
							   productos 
							   SET 
							   stockmen = stockmen-($vcantidad2*$vcantidad)
							   WHERE 
							   idprod='".$vidpro2."'
							   ";

						
     $nm_select = $vsqlstock2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
					}
				}
			}
		}
	}
	
	if($tipo==1)
	{
		 
      $nm_select = "select escombo from productos where idprod='".$vidpro."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSiEsCombo = array();
      $vsiescombo = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSiEsCombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsiescombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSiEsCombo = false;
          $vSiEsCombo_erro = $this->Db->ErrorMsg();
          $vsiescombo = false;
          $vsiescombo_erro = $this->Db->ErrorMsg();
      } 
;
		
		if(isset($vsiescombo[0][0]))
		{
			$vescombo = $vsiescombo[0][0];
			
			if($vescombo=='SI')
			{
				 
      $nm_select = "select idproducto,cantidad,precio from detallecombos where idcombo='".$vidpro."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vItemsCombo = array();
      $vitemscombo = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vItemsCombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vitemscombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vItemsCombo = false;
          $vItemsCombo_erro = $this->Db->ErrorMsg();
          $vitemscombo = false;
          $vitemscombo_erro = $this->Db->ErrorMsg();
      } 
;
				if(isset($vitemscombo[0][0]))
				{
					for($i=0;$i<count($vitemscombo );$i++)
					{
						$vidpro2    = $vitemscombo[$i][0];
						$vcantidad2 = $vitemscombo[$i][1];
						$vprecio2   = $vitemscombo[$i][2];
						
						$vsqlinv2="delete 
								  from 
								  inventario 
								  where 
									  idpro='".$vidpro2."' 
								  and nufacvta='".$vnumfac."' 
								  and detalle like '%Venta%' 
								  and iddetalle='".$iddet."'
								  and idcombo='".$vidpro."'
								  ";

						
     $nm_select = $vsqlinv2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

						$vsqlstock2="UPDATE 
							   productos 
							   SET 
							   stockmen = stockmen+($vcantidad*$vcantidad2) 
							   WHERE 
							   idprod='".$vidpro2."'
							   ";

						
     $nm_select = $vsqlstock2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
					}
				}
			}
		}
		
		
		$vsqlinv="delete 
				  from 
				  inventario 
				  where 
				      idpro='".$vidpro."' 
				  and nufacvta='".$vnumfac."' 
				  and detalle like '%Venta%' 
				  and iddetalle='".$iddet."'
				  ";
		
		
     $nm_select = $vsqlinv; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
		
		$vsqlstock="UPDATE 
			   productos 
			   SET 
			   stockmen = stockmen+$vcantidad 
			   WHERE 
			   idprod='".$vidpro."'
			   ";

		
     $nm_select = $vsqlstock; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
	}
}
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'off';
}
function fPagarFacVen($idfactura,$formapago=1,$retorno=true,$vidrecibo=0,$sipropina="NO")
{
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'on';
  
	$estado     = 1;
	$tot        = "";
	$resolucion = "";
	$numero     = "";
	$vfecha      = "";
	$res        = "";
	$vvendedor  = "";
	$vbanco     = 1;
	$vporcentaje_propina_tercero = 0;

	if(!empty($idfactura))
	{
		 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select f.total, f.resolucion, f.numfacven, f.vendedor, f.banco, str_replace (convert(char(10),f.fechaven,102), '.', '-') + ' ' + convert(char(8),f.fechaven,20), str_replace (convert(char(10),coalesce(f.creado,NOW()),102), '.', '-') + ' ' + convert(char(8),coalesce(f.creado,NOW()),20) as sc_alias_0, f.tipo, r.prefijo, f.idcli, t.porcentaje_propina_sugerida, f.pedido from facturaven f inner join resdian r on f.resolucion=r.Idres inner join terceros t on f.idcli=t.idtercero where f.idfacven='".$idfactura."'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select f.total, f.resolucion, f.numfacven, f.vendedor, f.banco, convert(char(23),f.fechaven,121), convert(char(23),coalesce(f.creado,NOW()),121) as sc_alias_0, f.tipo, r.prefijo, f.idcli, t.porcentaje_propina_sugerida, f.pedido from facturaven f inner join resdian r on f.resolucion=r.Idres inner join terceros t on f.idcli=t.idtercero where f.idfacven='".$idfactura."'"; 
      }
      else
      { 
          $nm_select = "select f.total,f.resolucion,f.numfacven,f.vendedor,f.banco,f.fechaven,coalesce(f.creado,NOW()),f.tipo,r.prefijo,f.idcli,t.porcentaje_propina_sugerida,f.pedido from facturaven f inner join resdian r on f.resolucion=r.Idres inner join terceros t on f.idcli=t.idtercero where f.idfacven='".$idfactura."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDatos = array();
      $vdatos = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[9] = str_replace(',', '.', $SCrx->fields[9]);
                 $SCrx->fields[10] = str_replace(',', '.', $SCrx->fields[10]);
                 $SCrx->fields[11] = str_replace(',', '.', $SCrx->fields[11]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 $SCrx->fields[4] = (strpos(strtolower($SCrx->fields[4]), "e")) ? (float)$SCrx->fields[4] : $SCrx->fields[4];
                 $SCrx->fields[4] = (string)$SCrx->fields[4];
                 $SCrx->fields[9] = (strpos(strtolower($SCrx->fields[9]), "e")) ? (float)$SCrx->fields[9] : $SCrx->fields[9];
                 $SCrx->fields[9] = (string)$SCrx->fields[9];
                 $SCrx->fields[10] = (strpos(strtolower($SCrx->fields[10]), "e")) ? (float)$SCrx->fields[10] : $SCrx->fields[10];
                 $SCrx->fields[10] = (string)$SCrx->fields[10];
                 $SCrx->fields[11] = (strpos(strtolower($SCrx->fields[11]), "e")) ? (float)$SCrx->fields[11] : $SCrx->fields[11];
                 $SCrx->fields[11] = (string)$SCrx->fields[11];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDatos = false;
          $vDatos_erro = $this->Db->ErrorMsg();
          $vdatos = false;
          $vdatos_erro = $this->Db->ErrorMsg();
      } 
;

		if(isset($vdatos[0][0]))
		{

			$vfecha      = $vdatos[0][5]; 
			$tot        = round($vdatos[0][0]);
			$resolucion = $vdatos[0][1];
			$res        = $vdatos[0][1];
			$numero     = $vdatos[0][2];
			$vvendedor  = $vdatos[0][3];
			$vbanco     = $vdatos[0][4];
			$vcreado    = $vdatos[0][6];
			$vtipo      = $vdatos[0][7];
			$vpj        = $vdatos[0][8];
			$vidcli     = $vdatos[0][9];
			$vporcentaje_propina_tercero = $vdatos[0][10];
			$vidpedido  = $vdatos[0][11];
			$vinsertarencaja = true;
			
			$vdoc       = $vpj."/".$numero;
			$vsql1      = "";
			$vsql2      = "";

			switch($formapago)
			{
				case 	2:
				
					$vdetalle = "FAC. CONTADO";
					$vnota    = "VENTA";
					$vsqlrc   = "";
				
					if($vidrecibo>0)
					{
						$vdetalle = "R. CAJA";
						$vnota    = "FACTURA VENTA CONTADO";
						$vsqlrc   = " ,idrc='".$vidrecibo."'";
					}

					if($vidpedido>0)
					{
						$vsql = "select total, saldo from pedidos where idpedido='".$vidpedido."'";
						 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDatosPedido = array();
      $vdatospedido = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDatosPedido[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdatospedido[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDatosPedido = false;
          $vDatosPedido_erro = $this->Db->ErrorMsg();
          $vdatospedido = false;
          $vdatospedido_erro = $this->Db->ErrorMsg();
      } 
;
						if(isset($vdatospedido[0][0]))
						{
							$vtp = $vdatospedido[0][0];
							$vsp = $vdatospedido[0][1];
							
							if(intval($vtp)>0 and intval($vsp)==0)
							{
								$vinsertarencaja = false;
							}
						}
					}
					
					if($vinsertarencaja)
					{
						$vsql1 = "insert into caja  set fecha='".$vfecha."', detalle='".$vdetalle."',  nota='".$vnota."', documento='".$numero."', cantidad='".$tot."',  cierredia='NO', resolucion='".$res."', banco='".$vbanco."',creado='".$vcreado."', usuario='".$vvendedor."',tipodoc='".$vtipo."',doc='".$vdoc."',id_tercero='".$vidcli."' ".$vsqlrc;

						
     $nm_select = $vsql1; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
					}
					
					$vsql2 = "update facturaven set pagada='SI', saldo='0',valor_propina='0',porcentaje_propina_sugerida='0',aplica_propina='NO' where idfacven='".$idfactura."'";
					
					$vporcentaje_propina_sugerida = 0;
					
					if($sipropina=="SI")
					{

						 
      $nm_select = "SELECT valor_propina_sugerida FROM configuraciones order by idconfiguraciones desc limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vConfiguraciones = array();
      $vconfiguraciones = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vConfiguraciones[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vconfiguraciones[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vConfiguraciones = false;
          $vConfiguraciones_erro = $this->Db->ErrorMsg();
          $vconfiguraciones = false;
          $vconfiguraciones_erro = $this->Db->ErrorMsg();
      } 
;

						if(isset($vconfiguraciones[0][0]))
						{
							$vporcentaje_propina_sugerida = $vconfiguraciones[0][0];
							
							if($vporcentaje_propina_tercero>0)
							{
								$vporcentaje_propina_sugerida = $vporcentaje_propina_tercero;
							}
							
							if($vporcentaje_propina_sugerida>0)
							{
								$vvalor_propina = $tot * ($vporcentaje_propina_sugerida/100);
								$vvalor_propina = $vvalor_propina/100;
								$vvalor_propina = ceil($vvalor_propina);
								$vvalor_propina = $vvalor_propina*100;
								
								$vsql2 = "update facturaven set pagada='SI', saldo='0',valor_propina='".$vvalor_propina."',porcentaje_propina_sugerida='".$vporcentaje_propina_sugerida."',aplica_propina='SI'	where idfacven='".$idfactura."'";
							}
						}
					}
					
					
     $nm_select = $vsql2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
				
					$estado = 2; 
						
				break;

				case 1:
				
					$estado = 2;

				break;

			}
		}
	}
	
	if($retorno)
	{
		echo  json_encode(
			
			array(
				
				"funcion"=>"fPagarFacVen",
				"estado"=>$estado,
				"idfactura"=>$idfactura,
				"formapago"=>$formapago,
				"numerofac"=>$numero,
				"fecha"=>$vfecha,
				"resolucion"=>$resolucion,
				"total"=>$tot,
				"vsql1"=>$vsql1,
				"vsql2"=>$vsql2,
				"vendedor"=>$vvendedor,
				"banco"=>$vbanco
			)
		);
	}
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'off';
}
function fAsentar($idfactura,$asentar="NO",$pagado=0,$vueltos=0,$retorno=true,$retorno_mensajes=false)
{
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'on';
  
	$tot        = "";
	$vfecha      = "";
	$idtercero  = "";
	$estado     = 1;
	$vsql1      = "";
	$vsql2      = "";
	$vsql3      = "";
	$resolucion = "";
	$res        = "";
	
	$vtotal     = 0;
	$vidcli     = "";
	$vfechaven  = "";
	$vestado    = 1;
	$vcupo      = 0;
	$vsaldo     = 0;
	$vdias_credito = 0;
	$vsaldo_disponible = 0;
	$vcredito   = "";
	$vasentada  = "";
	$vsicomprobante = "NO";
	$vpucdeudores = "";
	$vpucbanco    = "";
	$vmensajes    = "";
	$sipucdetalle = true;
	$vnomcli = "";
	$vnumfac = "";
	
	 
      $nm_select = "select habilitar_comprobantes from configuraciones order by idconfiguraciones desc limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSiGenerarComprobante = array();
      $vsigenerarcomprobante = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSiGenerarComprobante[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsigenerarcomprobante[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSiGenerarComprobante = false;
          $vSiGenerarComprobante_erro = $this->Db->ErrorMsg();
          $vsigenerarcomprobante = false;
          $vsigenerarcomprobante_erro = $this->Db->ErrorMsg();
      } 
;
	
	if(isset($vsigenerarcomprobante[0][0]))
	{
		$vsicomprobante = $vsigenerarcomprobante[0][0];
		
		if($vsicomprobante=="SI")
		{
			 
      $nm_select = "select p.codigobar,p.nompro,gc.puc_ingresos from productos p left join grupos_contables gc on p.cod_cuenta=gc.codigo left join detalleventa d on d.idpro=p.idprod where d.numfac='".$idfactura."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSiPUCProducto = array();
      $vsipucproducto = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSiPUCProducto[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsipucproducto[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSiPUCProducto = false;
          $vSiPUCProducto_erro = $this->Db->ErrorMsg();
          $vsipucproducto = false;
          $vsipucproducto_erro = $this->Db->ErrorMsg();
      } 
;
			
			if(isset($vsipucproducto[0][0]))
			{
				for($i=0;$i<count($vsipucproducto );$i++)
				{
					if(empty(trim($vsipucproducto[$i][2])))
					{
						$vmensajes .= "Debe parametrizar la cuenta contable del producto: ".$vsipucproducto[$i][0]." - ".$vsipucproducto[$i][1]."<br>";
						
						$sipucdetalle = false;
					}
				}
			}
		}
	}
	
	
	 
      $nm_select = "select f.total,f.fechaven,f.idcli,f.numfacven,f.resolucion,f.credito,f.asentada,f.observaciones,(select t.puc_auxiliar_deudores from terceros t where t.idtercero=f.idcli) as puc_auxiliar_deudores,(select b.puc from bancos b where b.idcaja_vta=f.banco) as puc_caja,(select t.nombres from terceros t where t.idtercero=f.idcli) as nomcli,concat(f.tipo,'/',(select r.prefijo from resdian r where r.Idres=f.resolucion),'/',f.numfacven) as numf  from facturaven f where f.idfacven='".$idfactura."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDatos = array();
      $vdatos = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDatos = false;
          $vDatos_erro = $this->Db->ErrorMsg();
          $vdatos = false;
          $vdatos_erro = $this->Db->ErrorMsg();
      } 
;

	if(isset($vdatos[0][0]))
	{
		$tot        = $vdatos[0][0];
		$vfecha      = $vdatos[0][1];
		$idtercero  = $vdatos[0][2];
		$numero     = $vdatos[0][3];
		$resolucion = $vdatos[0][4];
		$res        = $vdatos[0][4];
		$vcredito   = $vdatos[0][5];
		$vasentada  = $vdatos[0][6];
		$vobserv    = $vdatos[0][7];
		$vpucdeudores = $vdatos[0][8];
		$vpucbanco    = $vdatos[0][9];
		$vnomcli = $vdatos[0][10];
		$vnumfac = $vdatos[0][11];
		
	
		
		if($asentar=="SI" and $vasentada==0)
		{
			if($vcredito==2)
			{
				if($vsicomprobante=="SI")
				{
					if(!empty($vpucbanco) and $sipucdetalle)
					{
						$vsql1 = "update facturaven set asentada='1', adicional2='".$pagado."',	adicional3='".$vueltos."' where idfacven='".$idfactura."'";
						
						if($pagado==0)
						{
							$vsql1 = "update facturaven set asentada='1', adicional2=total,	adicional3='".$vueltos."' where idfacven='".$idfactura."'";
						}

						
     $nm_select = $vsql1; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

						if($vobserv=="TEMPORAL")
						{
						
     $nm_select = "update facturaven set observaciones=null where idfacven='".$idfactura."'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
						}


						$vsql2 = "update terceros set fechultcomp='".$vfecha."' where idtercero='".$idtercero."'";

						
     $nm_select = $vsql2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

						$estado = 2;
					}
					else
					{
						$vmensajes .= "Debe configurar la cuenta de caja.<br>";
					}
				}
				else
				{
					$vsql1 = "update facturaven set asentada='1', adicional2='".$pagado."',	adicional3='".$vueltos."' where idfacven='".$idfactura."'";
					
					if($pagado==0)
					{
						$vsql1 = "update facturaven set asentada='1', adicional2=total,	adicional3='".$vueltos."' where idfacven='".$idfactura."'";
					}
					
					
     $nm_select = $vsql1; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

					if($vobserv=="TEMPORAL")
					{
						
     $nm_select = "update facturaven set observaciones=null where idfacven='".$idfactura."'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
					}
					$vsql2 = "update terceros set fechultcomp='".$vfecha."' where idtercero='".$idtercero."'";
					
     $nm_select = $vsql2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
					$estado = 2;
				}
			}
			
			if($vcredito==1) 
			{
				if($vsicomprobante=="SI")
				{
					if(!empty($vpucdeudores)  and $sipucdetalle)
					{

						 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select total,idcli,str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20) from facturaven where idfacven='".$idfactura."'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select total,idcli,convert(char(23),fechaven,121) from facturaven where idfacven='".$idfactura."'"; 
      }
      else
      { 
          $nm_select = "select total,idcli,fechaven from facturaven where idfacven='".$idfactura."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSaldoCliente = array();
      $vsaldocliente = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSaldoCliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsaldocliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSaldoCliente = false;
          $vSaldoCliente_erro = $this->Db->ErrorMsg();
          $vsaldocliente = false;
          $vsaldocliente_erro = $this->Db->ErrorMsg();
      } 
;

						if(isset($vsaldocliente[0][0]))
						{
							$vtotal    = $vsaldocliente[0][0];
							$vidcli    = $vsaldocliente[0][1];
							$vfechaven = $vsaldocliente[0][2];

							 
      $nm_select = "select cupo,saldo,dias_credito,credito from terceros where idtercero='".$vidcli."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDatosCliente = array();
      $vdatoscliente = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDatosCliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdatoscliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDatosCliente = false;
          $vDatosCliente_erro = $this->Db->ErrorMsg();
          $vdatoscliente = false;
          $vdatoscliente_erro = $this->Db->ErrorMsg();
      } 
;

							if(isset($vdatoscliente[0][0]))
							{
								$vcupo  = $vdatoscliente[0][0];
								$vsaldo = $vdatoscliente[0][1];
								$vdias_credito = $vdatoscliente[0][2];
								$vcredito = $vdatoscliente[0][3];

								if($vcredito == "SI")
								{
									if($vcupo > 0)
									{
										$vsaldo_disponible = $vcupo - $vsaldo;

										if($vsaldo_disponible < $vtotal)
										{
											$vestado = 3; 
											$vmensajes .= "El cliente: $vnomcli no tiene cupo disponible, documento: $vnumfac.<br>";
										}
										else
										{
											
     $nm_select = "UPDATE terceros set saldo=(saldo+$vtotal),fechultcomp='".$vfechaven."' where idtercero=$vidcli"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
											
     $nm_select = "UPDATE facturaven set asentada=1 where idfacven=$idfactura"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
										}
									}
									else 
									{
										
     $nm_select = "UPDATE terceros set saldo=(saldo+$vtotal),fechultcomp='".$vfechaven."' where idtercero=$vidcli"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
										
     $nm_select = "UPDATE facturaven set asentada=1 where idfacven=$idfactura"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
									}
								}
								else
								{
									$vestado = 2;
									$vmensajes .= "El cliente: $vnomcli no tiene crédito configurado, documento: $vnumfac.<br>";
								}
							}
						}
					}
					else
					{
						$vmensajes .= "Debe configurar la cuenta del tercero/cliente: $vnomcli.<br>";
					}
				}
				else
				{
					 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select total,idcli,str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20) from facturaven where idfacven='".$idfactura."'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select total,idcli,convert(char(23),fechaven,121) from facturaven where idfacven='".$idfactura."'"; 
      }
      else
      { 
          $nm_select = "select total,idcli,fechaven from facturaven where idfacven='".$idfactura."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSaldoCliente = array();
      $vsaldocliente = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSaldoCliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsaldocliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSaldoCliente = false;
          $vSaldoCliente_erro = $this->Db->ErrorMsg();
          $vsaldocliente = false;
          $vsaldocliente_erro = $this->Db->ErrorMsg();
      } 
;

					if(isset($vsaldocliente[0][0]))
					{
						$vtotal    = $vsaldocliente[0][0];
						$vidcli    = $vsaldocliente[0][1];
						$vfechaven = $vsaldocliente[0][2];

						 
      $nm_select = "select cupo,saldo,dias_credito,credito from terceros where idtercero='".$vidcli."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDatosCliente = array();
      $vdatoscliente = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDatosCliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdatoscliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDatosCliente = false;
          $vDatosCliente_erro = $this->Db->ErrorMsg();
          $vdatoscliente = false;
          $vdatoscliente_erro = $this->Db->ErrorMsg();
      } 
;

						if(isset($vdatoscliente[0][0]))
						{
							$vcupo  = $vdatoscliente[0][0];
							$vsaldo = $vdatoscliente[0][1];
							$vdias_credito = $vdatoscliente[0][2];
							$vcredito = $vdatoscliente[0][3];

							if($vcredito == "SI")
							{
								if($vcupo > 0)
								{
									$vsaldo_disponible = $vcupo - $vsaldo;

									if($vsaldo_disponible < $vtotal)
									{
										$vestado = 3; 
										$vmensajes .= "El cliente: $vnomcli no tiene cupo disponible, documento: $vnumfac.<br>";
									}
									else
									{
										
     $nm_select = "UPDATE terceros set saldo=(saldo+$vtotal),fechultcomp='".$vfechaven."' where idtercero=$vidcli"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
										
     $nm_select = "UPDATE facturaven set asentada=1 where idfacven=$idfactura"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
									}
								}
								else 
								{
									
     $nm_select = "UPDATE terceros set saldo=(saldo+$vtotal),fechultcomp='".$vfechaven."' where idtercero=$vidcli"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
									
     $nm_select = "UPDATE facturaven set asentada=1 where idfacven=$idfactura"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
								}
							}
							else
							{
								$vestado = 2;
								$vmensajes .= "El cliente: $vnomcli no tiene crédito configurado, documento: $vnumfac.<br>";
							}
						}
					}
				}
			}

		}
		else if($asentar=="NO" and $vasentada==1)
		{

			if($vcredito==2)
			{
				$vsql1 = "update 
						facturaven 
						set 
						asentada='0', 
						adicional2='".$pagado."',
						adicional3='".$vueltos."',
						pagada='NO', 
						saldo=total
						where 
						idfacven='".$idfactura."'";

				
     $nm_select = $vsql1; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

				$vsql3 = "delete from caja where resolucion=".$res." and documento='".$numero."'";
				
     $nm_select = $vsql3; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

				$vsql2 = "update 
						  terceros 
						  set 
						  fechultcomp=(select f.fechaven from facturaven f where f.idcli='".$idtercero."' order by f.idfacven desc limit 1)  
						  where idtercero='".$idtercero."'";

				
     $nm_select = $vsql2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

				$estado = 2;
			}
			else
			{
				$vsql1 = "update 
						facturaven 
						set 
						asentada='0'
						where 
						idfacven='".$idfactura."'";

				
     $nm_select = $vsql1; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

				$vsql2 = "update 
						  terceros 
						  set 
						  fechultcomp=(select f.fechaven from facturaven f where f.idcli='".$idtercero."' order by f.idfacven desc limit 1),
						  saldo = (saldo+$tot)
						  where idtercero='".$idtercero."'";

				
     $nm_select = $vsql2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

				$estado = 2;
			}
		}
	}
	
	if($retorno_mensajes)
	{
		echo $vmensajes;
	}
	
	
	if($retorno)
	{
		echo json_encode(
			
			array(
				
				"funcion"=>"fAsentar",
				"estado"=>$estado,
				"idfactura"=>$idfactura,
				"asentar"=>$asentar,
				"pagado"=>$pagado,
				"vueltos"=>$vueltos,
				"total"=>$tot,
				"fecha"=>$vfecha,
				"idtercero"=>$idtercero,
				"numerofac"=>$numero,
				"resolucion"=>$resolucion,
				"vsql1"=>$vsql1,
				"vsql2"=>$vsql2,
				"vsql3"=>$vsql3,
				"total"=>$vtotal,
				"idcli"=>$vidcli,
				"fechaven"=>$vfechaven,
				"estado"=>$estado,
				"descrip_estado"=>"1 ok, 2 no tiene configurado credito, 3 no tiene cupo disponible.",
				"cupo"=>$vcupo,
				"saldo"=>$vsaldo,
				"dias_credito"=>$vdias_credito,
				"saldo_disponible"=>number_format($vsaldo_disponible),
				"credito"=>$vcredito,
				"mensajes"=>$vmensajes
			)
		);
	}
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'off';
}
function fAsentarContratos($idfactura,$asentar="NO",$pagado=0,$vueltos=0,$retorno=true,$retorno_mensajes=false)
{
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'on';
  
	$tot        = "";
	$vfecha      = "";
	$idtercero  = "";
	$estado     = 1;
	$vsql1      = "";
	$vsql2      = "";
	$vsql3      = "";
	$resolucion = "";
	$res        = "";
	
	$vtotal     = 0;
	$vidcli     = "";
	$vfechaven  = "";
	$vestado    = 1;
	$vcupo      = 0;
	$vsaldo     = 0;
	$vdias_credito = 0;
	$vsaldo_disponible = 0;
	$vcredito   = "";
	$vasentada  = "";
	$vsicomprobante = "NO";
	$vpucdeudores = "";
	$vpucbanco    = "";
	$vmensajes    = "";
	$sipucdetalle = true;
	$vnomcli = "";
	$vnumfac = "";
	
	 
      $nm_select = "select habilitar_comprobantes from configuraciones order by idconfiguraciones desc limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSiGenerarComprobante = array();
      $vsigenerarcomprobante = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSiGenerarComprobante[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsigenerarcomprobante[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSiGenerarComprobante = false;
          $vSiGenerarComprobante_erro = $this->Db->ErrorMsg();
          $vsigenerarcomprobante = false;
          $vsigenerarcomprobante_erro = $this->Db->ErrorMsg();
      } 
;
	
	if(isset($vsigenerarcomprobante[0][0]))
	{
		$vsicomprobante = $vsigenerarcomprobante[0][0];
		
		if($vsicomprobante=="SI")
		{
			 
      $nm_select = "select p.codigobar,p.nompro,gc.puc_ingresos from productos p left join grupos_contables gc on p.cod_cuenta=gc.codigo left join detalleventa d on d.idpro=p.idprod where d.numfac='".$idfactura."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSiPUCProducto = array();
      $vsipucproducto = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSiPUCProducto[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsipucproducto[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSiPUCProducto = false;
          $vSiPUCProducto_erro = $this->Db->ErrorMsg();
          $vsipucproducto = false;
          $vsipucproducto_erro = $this->Db->ErrorMsg();
      } 
;
			
			if(isset($vsipucproducto[0][0]))
			{
				for($i=0;$i<count($vsipucproducto );$i++)
				{
					if(empty(trim($vsipucproducto[$i][2])))
					{
						$vmensajes .= "Debe parametrizar la cuenta contable del producto: ".$vsipucproducto[$i][0]." - ".$vsipucproducto[$i][1]."<br>";
						
						$sipucdetalle = false;
					}
				}
			}
		}
	}
	
	
	 
      $nm_select = "select f.total,f.fechaven,f.idcli,f.numfacven,f.resolucion,f.credito,f.asentada,f.observaciones,(select t.puc_auxiliar_deudores from terceros t where t.idtercero=f.idcli) as puc_auxiliar_deudores,(select b.puc from bancos b where b.idcaja_vta=f.banco) as puc_caja,(select t.nombres from terceros t where t.idtercero=f.idcli) as nomcli,concat(f.tipo,'/',(select r.prefijo from resdian r where r.Idres=f.resolucion),'/',f.numfacven) as numf  from facturaven_contratos f where f.idfacven='".$idfactura."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDatos = array();
      $vdatos = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDatos = false;
          $vDatos_erro = $this->Db->ErrorMsg();
          $vdatos = false;
          $vdatos_erro = $this->Db->ErrorMsg();
      } 
;

	if(isset($vdatos[0][0]))
	{
		$tot        = $vdatos[0][0];
		$vfecha      = $vdatos[0][1];
		$idtercero  = $vdatos[0][2];
		$numero     = $vdatos[0][3];
		$resolucion = $vdatos[0][4];
		$res        = $vdatos[0][4];
		$vcredito   = $vdatos[0][5];
		$vasentada  = $vdatos[0][6];
		$vobserv    = $vdatos[0][7];
		$vpucdeudores = $vdatos[0][8];
		$vpucbanco    = $vdatos[0][9];
		$vnomcli = $vdatos[0][10];
		$vnumfac = $vdatos[0][11];
		
	
		
		if($asentar=="SI" and $vasentada==0)
		{
			if($vcredito==2)
			{
				if($vsicomprobante=="SI")
				{
					if(!empty($vpucbanco) and $sipucdetalle)
					{
						$vsql1 = "update facturaven_contratos set asentada='1', adicional2='".$pagado."',	adicional3='".$vueltos."' where idfacven='".$idfactura."'";
						
						if($pagado==0)
						{
							$vsql1 = "update facturaven_contratos set asentada='1', adicional2=total,	adicional3='".$vueltos."' where idfacven='".$idfactura."'";
						}

						
     $nm_select = $vsql1; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

						if($vobserv=="TEMPORAL")
						{
						
     $nm_select = "update facturaven_contratos set observaciones=null where idfacven='".$idfactura."'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
						}


						$vsql2 = "update terceros set fechultcomp='".$vfecha."' where idtercero='".$idtercero."'";

						
     $nm_select = $vsql2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

						$estado = 2;
					}
					else
					{
						$vmensajes .= "Debe configurar la cuenta de caja.<br>";
					}
				}
				else
				{
					$vsql1 = "update facturaven_contratos set asentada='1', adicional2='".$pagado."',	adicional3='".$vueltos."' where idfacven='".$idfactura."'";
					
					if($pagado==0)
					{
						$vsql1 = "update facturaven_contratos set asentada='1', adicional2=total,	adicional3='".$vueltos."' where idfacven='".$idfactura."'";
					}
					
					
     $nm_select = $vsql1; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

					if($vobserv=="TEMPORAL")
					{
						
     $nm_select = "update facturaven_contratos set observaciones=null where idfacven='".$idfactura."'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
					}
					$vsql2 = "update terceros set fechultcomp='".$vfecha."' where idtercero='".$idtercero."'";
					
     $nm_select = $vsql2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
					$estado = 2;
				}
			}
			
			if($vcredito==1) 
			{
				if($vsicomprobante=="SI")
				{
					if(!empty($vpucdeudores)  and $sipucdetalle)
					{

						 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select total,idcli,str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20) from facturaven_contratos where idfacven='".$idfactura."'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select total,idcli,convert(char(23),fechaven,121) from facturaven_contratos where idfacven='".$idfactura."'"; 
      }
      else
      { 
          $nm_select = "select total,idcli,fechaven from facturaven_contratos where idfacven='".$idfactura."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSaldoCliente = array();
      $vsaldocliente = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSaldoCliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsaldocliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSaldoCliente = false;
          $vSaldoCliente_erro = $this->Db->ErrorMsg();
          $vsaldocliente = false;
          $vsaldocliente_erro = $this->Db->ErrorMsg();
      } 
;

						if(isset($vsaldocliente[0][0]))
						{
							$vtotal    = $vsaldocliente[0][0];
							$vidcli    = $vsaldocliente[0][1];
							$vfechaven = $vsaldocliente[0][2];

							 
      $nm_select = "select cupo,saldo,dias_credito,credito from terceros where idtercero='".$vidcli."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDatosCliente = array();
      $vdatoscliente = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDatosCliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdatoscliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDatosCliente = false;
          $vDatosCliente_erro = $this->Db->ErrorMsg();
          $vdatoscliente = false;
          $vdatoscliente_erro = $this->Db->ErrorMsg();
      } 
;

							if(isset($vdatoscliente[0][0]))
							{
								$vcupo  = $vdatoscliente[0][0];
								$vsaldo = $vdatoscliente[0][1];
								$vdias_credito = $vdatoscliente[0][2];
								$vcredito = $vdatoscliente[0][3];

								if($vcredito == "SI")
								{
									if($vcupo > 0)
									{
										$vsaldo_disponible = $vcupo - $vsaldo;

										if($vsaldo_disponible < $vtotal)
										{
											$vestado = 3; 
											$vmensajes .= "El cliente: $vnomcli no tiene cupo disponible, documento: $vnumfac.<br>";
										}
										else
										{
											
     $nm_select = "UPDATE terceros set saldo=(saldo+$vtotal),fechultcomp='".$vfechaven."' where idtercero=$vidcli"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
											
     $nm_select = "UPDATE facturaven_contratos set asentada=1 where idfacven=$idfactura"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
										}
									}
									else 
									{
										
     $nm_select = "UPDATE terceros set saldo=(saldo+$vtotal),fechultcomp='".$vfechaven."' where idtercero=$vidcli"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
										
     $nm_select = "UPDATE facturaven_contratos set asentada=1 where idfacven=$idfactura"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
									}
								}
								else
								{
									$vestado = 2;
									$vmensajes .= "El cliente: $vnomcli no tiene crédito configurado, documento: $vnumfac.<br>";
								}
							}
						}
					}
					else
					{
						$vmensajes .= "Debe configurar la cuenta del tercero/cliente: $vnomcli.<br>";
					}
				}
				else
				{
					 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select total,idcli,str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20) from facturaven_contratos where idfacven='".$idfactura."'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select total,idcli,convert(char(23),fechaven,121) from facturaven_contratos where idfacven='".$idfactura."'"; 
      }
      else
      { 
          $nm_select = "select total,idcli,fechaven from facturaven_contratos where idfacven='".$idfactura."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vSaldoCliente = array();
      $vsaldocliente = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vSaldoCliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vsaldocliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vSaldoCliente = false;
          $vSaldoCliente_erro = $this->Db->ErrorMsg();
          $vsaldocliente = false;
          $vsaldocliente_erro = $this->Db->ErrorMsg();
      } 
;

					if(isset($vsaldocliente[0][0]))
					{
						$vtotal    = $vsaldocliente[0][0];
						$vidcli    = $vsaldocliente[0][1];
						$vfechaven = $vsaldocliente[0][2];

						 
      $nm_select = "select cupo,saldo,dias_credito,credito from terceros where idtercero='".$vidcli."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDatosCliente = array();
      $vdatoscliente = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDatosCliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdatoscliente[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDatosCliente = false;
          $vDatosCliente_erro = $this->Db->ErrorMsg();
          $vdatoscliente = false;
          $vdatoscliente_erro = $this->Db->ErrorMsg();
      } 
;

						if(isset($vdatoscliente[0][0]))
						{
							$vcupo  = $vdatoscliente[0][0];
							$vsaldo = $vdatoscliente[0][1];
							$vdias_credito = $vdatoscliente[0][2];
							$vcredito = $vdatoscliente[0][3];

							if($vcredito == "SI")
							{
								if($vcupo > 0)
								{
									$vsaldo_disponible = $vcupo - $vsaldo;

									if($vsaldo_disponible < $vtotal)
									{
										$vestado = 3; 
										$vmensajes .= "El cliente: $vnomcli no tiene cupo disponible, documento: $vnumfac.<br>";
									}
									else
									{
										
     $nm_select = "UPDATE terceros set saldo=(saldo+$vtotal),fechultcomp='".$vfechaven."' where idtercero=$vidcli"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
										
     $nm_select = "UPDATE facturaven_contratos set asentada=1 where idfacven=$idfactura"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
									}
								}
								else 
								{
									
     $nm_select = "UPDATE terceros set saldo=(saldo+$vtotal),fechultcomp='".$vfechaven."' where idtercero=$vidcli"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
									
     $nm_select = "UPDATE facturaven_contratos set asentada=1 where idfacven=$idfactura"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
								}
							}
							else
							{
								$vestado = 2;
								$vmensajes .= "El cliente: $vnomcli no tiene crédito configurado, documento: $vnumfac.<br>";
							}
						}
					}
				}
			}

		}
		else if($asentar=="NO" and $vasentada==1)
		{

			if($vcredito==2)
			{
				$vsql1 = "update 
						facturaven_contratos 
						set 
						asentada='0', 
						adicional2='".$pagado."',
						adicional3='".$vueltos."',
						pagada='NO', 
						saldo=total
						where 
						idfacven='".$idfactura."'";

				
     $nm_select = $vsql1; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

				$vsql3 = "delete from caja where resolucion=".$res." and documento='".$numero."'";
				
     $nm_select = $vsql3; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

				$vsql2 = "update 
						  terceros 
						  set 
						  fechultcomp=(select f.fechaven from facturaven_contratos f where f.idcli='".$idtercero."' order by f.idfacven desc limit 1)  
						  where idtercero='".$idtercero."'";

				
     $nm_select = $vsql2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

				$estado = 2;
			}
			else
			{
				$vsql1 = "update 
						facturaven_contratos 
						set 
						asentada='0'
						where 
						idfacven='".$idfactura."'";

				
     $nm_select = $vsql1; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

				$vsql2 = "update 
						  terceros 
						  set 
						  fechultcomp=(select f.fechaven from facturaven f where f.idcli='".$idtercero."' order by f.idfacven desc limit 1),
						  saldo = (saldo+$tot)
						  where idtercero='".$idtercero."'";

				
     $nm_select = $vsql2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

				$estado = 2;
			}
		}
	}
	
	if($retorno_mensajes)
	{
		echo $vmensajes;
	}
	
	
	if($retorno)
	{
		echo json_encode(
			
			array(
				
				"funcion"=>"fAsentar",
				"estado"=>$estado,
				"idfactura"=>$idfactura,
				"asentar"=>$asentar,
				"pagado"=>$pagado,
				"vueltos"=>$vueltos,
				"total"=>$tot,
				"fecha"=>$vfecha,
				"idtercero"=>$idtercero,
				"numerofac"=>$numero,
				"resolucion"=>$resolucion,
				"vsql1"=>$vsql1,
				"vsql2"=>$vsql2,
				"vsql3"=>$vsql3,
				"total"=>$vtotal,
				"idcli"=>$vidcli,
				"fechaven"=>$vfechaven,
				"estado"=>$estado,
				"descrip_estado"=>"1 ok, 2 no tiene configurado credito, 3 no tiene cupo disponible.",
				"cupo"=>$vcupo,
				"saldo"=>$vsaldo,
				"dias_credito"=>$vdias_credito,
				"saldo_disponible"=>number_format($vsaldo_disponible),
				"credito"=>$vcredito,
				"mensajes"=>$vmensajes
			)
		);
	}
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'off';
}
function fPagarPedido($id,$formapago=1,$retorno=true)
{
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'on';
  
	$estado     = 1;
	$tot        = "";
	$resolucion = "";
	$numero     = "";
	$vfecha      = "";
	$res        = "";

	if(!empty($id))
	{
		 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select p.total,p.prefijo_ped,p.numpedido,str_replace (convert(char(10),p.fechaven,102), '.', '-') + ' ' + convert(char(8),p.fechaven,20),p.fechadocu,r.prefijo,p.idcli from pedidos p inner join resdian r on  p.prefijo_ped=r.Idres where p.idpedido='".$id."'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select p.total,p.prefijo_ped,p.numpedido,convert(char(23),p.fechaven,121),p.fechadocu,r.prefijo,p.idcli from pedidos p inner join resdian r on  p.prefijo_ped=r.Idres where p.idpedido='".$id."'"; 
      }
      else
      { 
          $nm_select = "select p.total,p.prefijo_ped,p.numpedido,p.fechaven,p.fechadocu,r.prefijo,p.idcli from pedidos p inner join resdian r on  p.prefijo_ped=r.Idres where p.idpedido='".$id."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDatos = array();
      $vdatos = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[6] = str_replace(',', '.', $SCrx->fields[6]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[6] = (strpos(strtolower($SCrx->fields[6]), "e")) ? (float)$SCrx->fields[6] : $SCrx->fields[6];
                 $SCrx->fields[6] = (string)$SCrx->fields[6];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDatos = false;
          $vDatos_erro = $this->Db->ErrorMsg();
          $vdatos = false;
          $vdatos_erro = $this->Db->ErrorMsg();
      } 
;

		if(isset($vdatos[0][0]))
		{

			$vfecha      = $vdatos[0][3]; 
			$tot        = $vdatos[0][0];
			$resolucion = $vdatos[0][1];
			$res        = $vdatos[0][1];
			$numero     = $vdatos[0][2];
			$vcreado    = $vdatos[0][4];
			$vdoc       = $vdatos[0][5];
			$vidcli     = $vdatos[0][6];
			$vdoc       = $vdoc."/".$numero;
			$vsql1      = "";
			$vsql2      = "";

			switch($formapago)
			{
				case 	2:

					$vsql1 = "insert into caja 
							  set 
							  fecha='".$vfecha."',
							  detalle='FAC. CONTADO',
							  nota='VENTA',
							  cantidad='".$tot."',
							  cierredia='NO',
							  resolucion='".$res."',
							  idpedido='".$id."',
							  creado='".$vcreado."',
							  tipodoc='PV',
							  doc='".$vdoc."',
							  id_tercero='".$vidcli."'
							  ";

					
     $nm_select = $vsql1; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
				
					$vsql2 = "update 
							pedidos
							set 
							saldo='0'
							where 
							idpedido='".$id."'";

					
     $nm_select = $vsql2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
				
					$estado = 2; 
						
				break;

				case 1:
				
					$estado = 2;

				break;

			}
		}
	}
	
	if($retorno)
	{
		echo  json_encode(
			
			array(
				
				"funcion"=>"fPagarPedido",
				"estado"=>$estado,
				"idpedido"=>$id,
				"formapago"=>$formapago,
				"numerofac"=>$numero,
				"fecha"=>$vfecha,
				"resolucion"=>$resolucion,
				"total"=>$tot,
				"vsql1"=>$vsql1,
				"vsql2"=>$vsql2
			)
		);
	}
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'off';
}
function fAsentarPedido($idfactura,$asentar="NO",$pagado=0,$vueltos=0,$retorno=true)
{
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'on';
  
	
	$tot        = "";
	$vfecha      = "";
	$idtercero  = "";
	$estado     = 1;
	$vsql1      = "";
	$vsql2      = "";
	$vsql3      = "";
	$resolucion = "";
	$res        = "";
	
	 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select total,str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20),idcli,numpedido,prefijo_ped from pedidos where idpedido='".$idfactura."'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select total,convert(char(23),fechaven,121),idcli,numpedido,prefijo_ped from pedidos where idpedido='".$idfactura."'"; 
      }
      else
      { 
          $nm_select = "select total,fechaven,idcli,numpedido,prefijo_ped from pedidos where idpedido='".$idfactura."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDatos = array();
      $vdatos = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 $SCrx->fields[4] = (strpos(strtolower($SCrx->fields[4]), "e")) ? (float)$SCrx->fields[4] : $SCrx->fields[4];
                 $SCrx->fields[4] = (string)$SCrx->fields[4];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDatos = false;
          $vDatos_erro = $this->Db->ErrorMsg();
          $vdatos = false;
          $vdatos_erro = $this->Db->ErrorMsg();
      } 
;

	if(isset($vdatos[0][0]))
	{
		$tot        = $vdatos[0][0];
		$vfecha      = $vdatos[0][1];
		$idtercero  = $vdatos[0][2];
		$numero     = $vdatos[0][3];
		$resolucion = $vdatos[0][4];
		$res        = $vdatos[0][4];
		
		if($asentar=="SI")
		{

			$vsql1 = "update 
					pedidos 
					set 
					asentada='1', 
					adicional2='".$pagado."',
					adicional3='".$vueltos."'
					where 
					idpedido='".$idfactura."'";

			
     $nm_select = $vsql1; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

			$vsql2 = "update 
					  terceros 
					  set 
					  fechultcomp='".$vfecha."' 
					  where idtercero='".$idtercero."'";

			
     $nm_select = $vsql2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

			$estado = 2;

		}
		else
		{

			$vsql1 = "update 
					pedidos
					set 
					asentada='0', 
					adicional2='".$pagado."',
					adicional3='".$vueltos."',
					saldo=total
					where 
					idfacven='".$idfactura."'";

			
     $nm_select = $vsql1; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

			$vsql3 = "delete from caja where resolucion=".$res." and idpedido='".$idfactura."'";
			
     $nm_select = $vsql3; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

			$vsql2 = "update 
					  terceros 
					  set 
					  fechultcomp=(select f.fechaven from facturaven f where f.idcli='".$idtercero."' order by f.idfacven desc limit 1)  
					  where idtercero='".$idtercero."'";

			
     $nm_select = $vsql2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

			$estado = 2;
		}
	}
	
	if($retorno)
	{
		echo json_encode(
			
			array(
				
				"funcion"=>"fAsentar",
				"estado"=>$estado,
				"idpedido"=>$idfactura,
				"asentar"=>$asentar,
				"pagado"=>$pagado,
				"vueltos"=>$vueltos,
				"total"=>$tot,
				"fecha"=>$vfecha,
				"idtercero"=>$idtercero,
				"numerofac"=>$numero,
				"resolucion"=>$resolucion,
				"vsql1"=>$vsql1,
				"vsql2"=>$vsql2,
				"vsql3"=>$vsql3
			)
		);
	}
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'off';
}
function fEnviarFV($vidfacven)
{
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'on';
  
	$vmensaje = "";
	$vcufe	  = "";	
	$vconsecutivo = "";
	$vTotf    = 0;
	$vfechaven= "";
	$vcredito = "";
	$vfechavenc= "";
	$idmu='828';

	$Nciudad="CUCUTA";
	$cdep='54';
	$cmun='001';
	$cdepmun=$cdep.$cmun;
	$Ndep='NORTE DE SANTANDER';
	$dir ='';
	$vnumerocontrato = "";
	$vresolucion = "";
	$vidcli = "";
	$vobserv= "";

	$vsql = "select coalesce(fc.cufe,''), numfacven, fc.total, fc.fechaven, fc.credito, fc.fechavenc, fc.direccion,fc.numcontrato, fc.codigo_mun, fc.codigo_dep, fc.enviada, fc.periodo, fc.anio, (select d.departamento from departamento d where d.codigo=fc.codigo_dep limit 1) as depart, (select m.municipio from municipio m where m.codigo_mu=fc.codigo_mun and m.codigo_dep=fc.codigo_dep limit 1) as munic, fc.resolucion,fc.idcli,fc.observaciones from facturaven_contratos fc where fc.idfacven='".$vidfacven."'";

	 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDFV = array();
      $vdfv = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDFV[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdfv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDFV = false;
          $vDFV_erro = $this->Db->ErrorMsg();
          $vdfv = false;
          $vdfv_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($vdfv[0][0]))
	{

		$vcufe	  = $vdfv[0][0];	
		$vconsecutivo = $vdfv[0][1];
		$vTotf    = $vdfv[0][2];
		$vfechaven= $vdfv[0][3];
		$vcredito = $vdfv[0][4];
		$vfechavenc= $vdfv[0][5];

		$Nciudad   = $vdfv[0][14];
		$cdep      = $vdfv[0][9];
		$cmun      = $vdfv[0][8];
		$cdepmun   = $cdep.$cmun;
		$Ndep      = $vdfv[0][13];
		$dir       = $vdfv[0][6];
		$vnumerocontrato = $vdfv[0][7];
		$vresolucion = $vdfv[0][15];
		$vidcli   = $vdfv[0][16];
		$vobserv  = $vdfv[0][17];

		if(!empty($vcufe))
		{
		}
		else
		{
			$TokenEnterprise = '';
			$TokenAutorizacion = '';
			$vServidor='';
			$vPFe= '';

			$vrango="F4NN-1"; 

			$vcorreo = "easeing@outlook.com.com";
			$vaccion = "Enviar";

			$ciuu="";
			$vcorreo="";
			$nitodoc="";
			$tel="";
			$codImp="";
			$zonpos="";
			$nomcomerc="";
			$nombr="";
			$vdv="";
			$tipodoc="";
			$obligac="";
			$ti_per="";

			$cant	="";
			$codbp	="";
			$desc	="";
			$codest	="";
			$base	="";
			$codImp	="";
			$Timp	="";
			$Timp	="";
			$eliva	="";
			$tot	="";
			$tot	="";
			$valun	="";
			$valun	="";
			$sec	="";

			$max    = "";

			$decoded = '';
			$vestado = '';
			$vavisos = '';
			$eldesc	 = 0;
			$t		 = 0;
			$elmonto = 0;
			$bas_br	 = 0;

			$t_reg	 ='';
			$vEsfac	 ='NO';

			$lafechadevencimiento = '';

			$a=0;
			$b=1;
			$c=0;
			$d=0;
			$vtotalingresosparaterceros = 0;
			$vobs = new strings();

			$vprimerfac=1;

			 
      $nm_select = "SELECT prefijo, prefijo_fe, pref_factura, primerfactura FROM resdian WHERE Idres = $vresolucion"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $ds_res = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $ds_res[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $ds_res = false;
          $ds_res_erro = $this->Db->ErrorMsg();
      } 
;
			if(isset($ds_res[0][1]))
			{
				$vPref	=$ds_res[0][0];
				$vPFe	=$ds_res[0][1];
				$vEsfac	=$ds_res[0][2];
				$vprimerfac = $ds_res[0][3];
				$vrango = $vPref."-"."$vprimerfac";
			}

			if($vPFe=='FE' and $vEsfac=='SI')
			{
				 
      $nm_select = "select servidor1, servidor2, tokenempresa, tokenpassword from webservicefe order by idwebservicefe desc limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $ds_fv = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $ds_fv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $ds_fv = false;
          $ds_fv_erro = $this->Db->ErrorMsg();
      } 
;
				if(isset($ds_fv[0][0]) and (isset($ds_fv[0][1])) and (isset($ds_fv[0][2])) and (isset($ds_fv[0][3])))
				{
					if(!empty(($ds_fv[0][0])) and (!empty($ds_fv[0][1])) and (!empty($ds_fv[0][2])) and (!empty($ds_fv[0][3])))
					{


						error_reporting(E_ERROR);
						$WebService = new WebService();
						$factura = new FacturaGeneral();
						$cliente= new Cliente();
						$destinatario = new Destinatario();
						$direccion = new Direccion();
						$det_tributario = new Tributos();
						$emaildest = new Strings();
						$vServidor=$ds_fv[0][0];

						$options = array('exceptions' => true, 'trace' => true);

						$params;
						$TokenEnterprise = $ds_fv[0][2];
						$TokenAutorizacion = $ds_fv[0][3];



						$enviarAdjunto = false;

						$sql_fe="select coalesce((select codigo_ciiu from ciiu_tercero where id_tercero=$vidcli),'0010') as ciiu, t.urlmail, t.documento, t.tel_cel, coalesce((select cod_det_trib from det_trib_x_tercero where id_tercero=$vidcli),'ZY') as det_tri,  t.idmuni, t.direccion, t.codigo_postal, t.nombre_comercil, t.nombres, t.dv, t.tipo_documento,coalesce((select codigo_rt from resp_trib_x_tercero where id_tercero=$vidcli order by id_resp_tr_ter ASC LIMIT 1),'R-99-PN') as obligacion, (if(t.tipo='NAT',2,1)) as tipo_per, (if(t.regimen='SIM', 49, 48)) as regimen_ter from terceros t where t.idtercero=$vidcli ";
						 
      $nm_select = $sql_fe; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $ds_fe = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $ds_fe[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $ds_fe = false;
          $ds_fe_erro = $this->Db->ErrorMsg();
      } 
;	

						if(isset($ds_fe[0][1]) and !empty($ds_fe[0][1]))
						{
							$a=1;
							if(isset($ds_fe[0][0]) and !empty($ds_fe[0][0]))
							{
								$b=1;
							}
							if(isset($ds_fe[0][4]) and !empty($ds_fe[0][4]))
							{
								$c=1;
							}
							if(isset($ds_fe[0][12]) and !empty($ds_fe[0][12]))
							{
								$d=1;
							}	
							if($b==1 and $c==1 and $d==1)
							{
								if(!isset($ds_fe[0][8]) or empty($ds_fe[0][8]))
								{
									$nomcomerc	= $ds_fe[0][9];
								}
								else
								{
									$nomcomerc	=$ds_fe[0][8];
								}
								$ciuu		=$ds_fe[0][0];
								$vcorreo	=$ds_fe[0][1];
								$nitodoc	=$ds_fe[0][2];
								$tel		=$ds_fe[0][3];
								$codImp		=$ds_fe[0][4];
								$idmu		=$ds_fe[0][5];
								$zonpos		=$ds_fe[0][7];

								$nombr		=$ds_fe[0][9];
								$vdv		=$ds_fe[0][10];
								$tipodoc	=$ds_fe[0][11];
								$obligac	=$ds_fe[0][12];
								$ti_per		=$ds_fe[0][13];
								$t_reg		=$ds_fe[0][14];
							}
							else
							{
								echo "Datos incompletos del Cliente!","<br>";
								if($b==0)
								{
								}
								if($c==0)
								{
								}
								if($d==0)
								{
								}

								if(!isset($ds_fe[0][8]) or empty($ds_fe[0][8]))
								{
									$nomcomerc	= $ds_fe[0][9];
								}
								else
								{
									$nomcomerc	=$ds_fe[0][8];
								}

								$ciuu		=$ds_fe[0][0];
								$vcorreo	=$ds_fe[0][1];
								$nitodoc	=$ds_fe[0][2];
								$tel		=$ds_fe[0][3];
								$codImp		=$ds_fe[0][4];
								$idmu		=$ds_fe[0][5];
								$zonpos		=$ds_fe[0][7];

								$nombr		=$ds_fe[0][9];
								$vdv		=$ds_fe[0][10];
								$tipodoc	=$ds_fe[0][11];
								$obligac	=$ds_fe[0][12];
								$ti_per		=$ds_fe[0][13];
								$t_reg		=$ds_fe[0][14];
							}

						}
						else
						{
							if(isset($ds_fe[0][0]) and !empty($ds_fe[0][0]))
							{
								$b=1;
							}
							if(isset($ds_fe[0][4]) and !empty($ds_fe[0][4]))
							{
								$c=1;
							}
							if(isset($ds_fe[0][12]) and !empty($ds_fe[0][12]))
							{
								$d=1;
							}

							$vmensaje .= "No configurado el email\n";
							
							if($c==0)
							{
							}
							if($d==0)
							{
							}


							goto error_DC;

						}




						if($vaccion=="Enviar"){

							$factura = new FacturaGeneral();
							$factura->cliente = new Cliente();
							$factura->cantidadDecimales = "2";
							$destinatarios = new Destinatario();	
							$destinatarios->canalDeEntrega = "0";

							$correodestinatario = new strings();	 
							$correodestinatario->string = $vcorreo;

							$destinatarios->email = $correodestinatario;
							$destinatarios->nitProveedorReceptor = $nitodoc;
							$destinatarios->telefono = $tel;	

							$factura->cliente->destinatario[0] = $destinatarios;

							$tributos1 = new Tributos();	
							$tributos1->codigoImpuesto = $codImp;

							$extensible1 = new Extensibles();
							$extensible1->controlInterno1 = "";
							$extensible1->controlInterno2 = "";
							$extensible1->nombre = "";
							$extensible1->valor = "";

							$tributos1->extras[0] = $extensible1;

							$factura->cliente->detallesTributarios[0] = $tributos1;

							$DireccionFiscal[0] = new Direccion();	
							$DireccionFiscal[0]->aCuidadoDe = "";
							$DireccionFiscal[0]->aLaAtencionDe = "";
							$DireccionFiscal[0]->bloque = "";
							$DireccionFiscal[0]->buzon = "";
							$DireccionFiscal[0]->calle = "";
							$DireccionFiscal[0]->calleAdicional = "";
							$DireccionFiscal[0]->ciudad = $Nciudad;
							$DireccionFiscal[0]->codigoDepartamento = $cdep;
							$DireccionFiscal[0]->correccionHusoHorario = "";
							$DireccionFiscal[0]->departamento = $Ndep;
							$DireccionFiscal[0]->departamentoOrg = "";
							$DireccionFiscal[0]->habitacion = "";
							$DireccionFiscal[0]->distrito = "";
							$DireccionFiscal[0]->lenguaje = "es";
							$DireccionFiscal[0]->municipio = $cdepmun;
							$DireccionFiscal[0]->nombreEdificio = "";
							$DireccionFiscal[0]->numeroParcela = "";
							$DireccionFiscal[0]->pais = "CO";
							$DireccionFiscal[0]->piso = "";
							$DireccionFiscal[0]->region = "";
							$DireccionFiscal[0]->subDivision = "";
							$DireccionFiscal[0]->ubicacion = "";
							$DireccionFiscal[0]->zonaPostal = $zonpos;	
							$DireccionFiscal[0]->direccion  = $dir;

							$DireccionFiscal[1] = new Direccion();	
							$DireccionFiscal[1]->aCuidadoDe = "";
							$DireccionFiscal[1]->aLaAtencionDe = "";
							$DireccionFiscal[1]->bloque = "";
							$DireccionFiscal[1]->buzon = "";
							$DireccionFiscal[1]->calle = "";
							$DireccionFiscal[1]->calleAdicional = "";
							$DireccionFiscal[1]->ciudad = $Nciudad;
							$DireccionFiscal[1]->codigoDepartamento = $cdep;
							$DireccionFiscal[1]->correccionHusoHorario = "";
							$DireccionFiscal[1]->departamento = $Ndep;
							$DireccionFiscal[1]->departamentoOrg = "";
							$DireccionFiscal[1]->habitacion = "";
							$DireccionFiscal[1]->distrito = "";
							$DireccionFiscal[1]->lenguaje = "es";
							$DireccionFiscal[1]->municipio = $cdepmun;
							$DireccionFiscal[1]->nombreEdificio = "";
							$DireccionFiscal[1]->numeroParcela = "";
							$DireccionFiscal[1]->pais = "CO";
							$DireccionFiscal[1]->piso = "";
							$DireccionFiscal[1]->region = "";
							$DireccionFiscal[1]->subDivision = "";
							$DireccionFiscal[1]->ubicacion = "";
							$DireccionFiscal[1]->zonaPostal = $zonpos;	
							$DireccionFiscal[1]->direccion  = $dir;

							$factura->cliente->direccionFiscal  = $DireccionFiscal[0];
							$factura->cliente->direccionCliente = $DireccionFiscal[1];
							$factura->cliente->telefono = $tel;
							$factura->cliente->email = $vcorreo;


							$InfoLegalCliente = new InformacionLegalCliente();
							$InfoLegalCliente->codigoEstablecimiento = "00001";
							$InfoLegalCliente->nombreRegistroRUT = $nombr;
							$InfoLegalCliente->numeroIdentificacion = $nitodoc;
							$InfoLegalCliente->numeroIdentificacionDV = $vdv;
							$InfoLegalCliente->tipoIdentificacion = $tipodoc;	

							$factura->cliente->informacionLegalCliente = $InfoLegalCliente;


							$factura->cliente->nombreRazonSocial  = $nombr;
							$factura->cliente->notificar = "SI";
							$factura->cliente->numeroDocumento = $nitodoc;
							$factura->cliente->numeroIdentificacionDV = $vdv;

							$obligacionesCliente = new Obligaciones();
							$obligacionesCliente->obligaciones = $obligac;
							$obligacionesCliente->regimen = $t_reg;

							$factura->cliente->responsabilidadesRut[0] = $obligacionesCliente;

							$factura->cliente->tipoIdentificacion = $tipodoc;
							$factura->cliente->tipoPersona = $ti_per;


							$factura->consecutivoDocumento = $vconsecutivo;
							


							 
      $nm_select = "select round(d.cantidad,2) as cantidad, p.codigobar, d.descr, p.codigoprod, (d.valorpar-(d.descuento+d.iva)) as base, (if(iv.tipo_impuesto='CONSUMO','02','01')) as codigoimpuesto, d.adicional as porciva, d.iva, d.adicional1 as porcdesc, (d.valorpar/((d.adicional/100)+1)) as bas_br,p.idprod FROM detalleventa d inner join productos p on d.idpro=p.idprod inner join iva iv on p.idiva=iv.idiva where d.numfac='".$vidfacven."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vDetalle = array();
      $vdetalle = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[6] = str_replace(',', '.', $SCrx->fields[6]);
                 $SCrx->fields[7] = str_replace(',', '.', $SCrx->fields[7]);
                 $SCrx->fields[8] = str_replace(',', '.', $SCrx->fields[8]);
                 $SCrx->fields[9] = str_replace(',', '.', $SCrx->fields[9]);
                 $SCrx->fields[10] = str_replace(',', '.', $SCrx->fields[10]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[4] = (strpos(strtolower($SCrx->fields[4]), "e")) ? (float)$SCrx->fields[4] : $SCrx->fields[4];
                 $SCrx->fields[4] = (string)$SCrx->fields[4];
                 $SCrx->fields[6] = (strpos(strtolower($SCrx->fields[6]), "e")) ? (float)$SCrx->fields[6] : $SCrx->fields[6];
                 $SCrx->fields[6] = (string)$SCrx->fields[6];
                 $SCrx->fields[7] = (strpos(strtolower($SCrx->fields[7]), "e")) ? (float)$SCrx->fields[7] : $SCrx->fields[7];
                 $SCrx->fields[7] = (string)$SCrx->fields[7];
                 $SCrx->fields[8] = (strpos(strtolower($SCrx->fields[8]), "e")) ? (float)$SCrx->fields[8] : $SCrx->fields[8];
                 $SCrx->fields[8] = (string)$SCrx->fields[8];
                 $SCrx->fields[9] = (strpos(strtolower($SCrx->fields[9]), "e")) ? (float)$SCrx->fields[9] : $SCrx->fields[9];
                 $SCrx->fields[9] = (string)$SCrx->fields[9];
                 $SCrx->fields[10] = (strpos(strtolower($SCrx->fields[10]), "e")) ? (float)$SCrx->fields[10] : $SCrx->fields[10];
                 $SCrx->fields[10] = (string)$SCrx->fields[10];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vDetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vdetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vDetalle = false;
          $vDetalle_erro = $this->Db->ErrorMsg();
          $vdetalle = false;
          $vdetalle_erro = $this->Db->ErrorMsg();
      } 
;

							if(isset($vdetalle[0][0]))
							{	


								for($i=0;$i<count($vdetalle );$i++)
								{
									$cant	=$vdetalle[$i][0];
									$codbp	=$vdetalle[$i][1];
									$desc	=$vdetalle[$i][2];
									$codest	=$vdetalle[$i][3];
									$base	=$vdetalle[$i][4];
									$codImp	=$vdetalle[$i][5];
									$Timp	=$vdetalle[$i][6];
									$Timp	=$Timp.".00";
									$eliva	=$vdetalle[$i][7];
									$eldesc	=$vdetalle[$i][8];
									$bas_br	=$vdetalle[$i][9];
									$vidprod=$vdetalle[$i][10]; 
									$tot	=$base+$eliva;
									$tot	=strval ($tot);
									$valun	=round(($base/$cant), 2);
									$sec=$i+1;
									$sec=strval($sec);


									$factDetalle[$i] = new FacturaDetalle();
									$factDetalle[$i]->cantidadPorEmpaque = "1";
									$factDetalle[$i]->cantidadReal = $cant;
									$factDetalle[$i]->cantidadRealUnidadMedida = "WSD"; 
									$factDetalle[$i]->cantidadUnidades = $cant;
									$factDetalle[$i]->codigoProducto = $codbp;
									$factDetalle[$i]->descripcion = $desc;
									$factDetalle[$i]->descripcionTecnica = $desc;
									$factDetalle[$i]->estandarCodigo = "999";
									$factDetalle[$i]->estandarCodigoProducto = $codest;


									if($eldesc>0)
									{
										$elmonto	= round($bas_br*(round(($eldesc/100), 2)), 2);
										$eldesc		= round($eldesc+0, 2);

										$descuentos[$t] = new cargosDescuentos();
										$descuentos[$t]->descripcion = "DESCUENTO COMERCIAL";
										$descuentos[$t]->indicador = 0;
										$descuentos[$t]->monto = $elmonto;
										$descuentos[$t]->montoBase = round($bas_br, 2);
										$descuentos[$t]->porcentaje = $eldesc;
										$descuentos[$t]->secuencia = $t+1;

										$factDetalle[$i]->cargosDescuentos[0] = $descuentos[$t];
										$t=$t+1;
									}

									 
      $nm_select = "select t.documento,t.dv,t.tipo_documento from productos p inner join terceros t on p.idpro1=t.idtercero where p.idprod='".$vidprod."' and p.tipo_producto='RE'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vCodMan = array();
      $vcodman = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vCodMan[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vcodman[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vCodMan = false;
          $vCodMan_erro = $this->Db->ErrorMsg();
          $vcodman = false;
          $vcodman_erro = $this->Db->ErrorMsg();
      } 
;

									if(isset($vcodman[0][0]))
									{
										$vid_mandatorio = $vcodman[0][0];
										$vdv_mandatorio = $vcodman[0][1];
										$vid_tipo       = $vcodman[0][2];

										$factDetalle[$i]->mandatorioNumeroIdentificacion   = $vid_mandatorio;
										$factDetalle[$i]->mandatorioNumeroIdentificacionDV = $vdv_mandatorio;
										$factDetalle[$i]->mandatorioTipoIdentificacion     = $vid_tipo;

										$vtotalingresosparaterceros += $tot;
									}

									$impdet[$i] = new FacturaImpuestos;
									$impdet[$i]->baseImponibleTOTALImp = $base;
									$impdet[$i]->codigoTOTALImp = $codImp;
									$impdet[$i]->controlInterno = "";
									$impdet[$i]->porcentajeTOTALImp = $Timp;
									$impdet[$i]->unidadMedida = "";
									$impdet[$i]->unidadMedidaTributo = "";
									$impdet[$i]->valorTOTALImp = $eliva;
									$impdet[$i]->valorTributoUnidad = "";

									$factDetalle[$i]->impuestosDetalles[0] = $impdet[$i];


									$impTot[$i] = new ImpuestosTotales;
									$impTot[$i]->codigoTOTALImp = $codImp;
									$impTot[$i]->montoTotal = $eliva;

									$factDetalle[$i]->impuestosTotales[0] = $impTot[$i];

									$factDetalle[$i]->marca = "HKA";
									$factDetalle[$i]->muestraGratis = "0";
									$factDetalle[$i]->precioTotal = $tot;
									$factDetalle[$i]->precioTotalSinImpuestos = $base;
									$factDetalle[$i]->precioVentaUnitario = $valun;
									$factDetalle[$i]->secuencia = $sec;
									$factDetalle[$i]->unidadMedida = "WSD";		

									$factura->detalleDeFactura [$i] = $factDetalle[$i]; 

								}
							}

							$vfechaemision     = $vfechaven.date(' H:i:s');
							$vfechaemision     = date_create($vfechaemision);
							$vfechaemision     = date_format($vfechaemision,'Y-m-d H:i:s');	

							$factura->fechaEmision = $vfechaemision;

							if($vcredito==1)
							{
								$lafechadevencimiento	 = $vfechavenc;
								$lafechadevencimiento	 = date_create($lafechadevencimiento);
								$lafechadevencimiento	 = date_format($lafechadevencimiento, 'Y-m-d');

								$factura->fechaVencimiento = $lafechadevencimiento;
							}





							 
      $nm_select = "select sum(valorpar-(descuento+iva)) as base, (if(iv.tipo_impuesto='CONSUMO','02','01')) as codigoimpuesto, iv.trifa as porcentaje, sum(iva) as iva from detalleventa d inner join productos p on d.idpro=p.idprod inner join iva iv on p.idiva=iv.idiva where numfac='".$vidfacven."' group by iv.tipo_impuesto,iv.trifa"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $dt_impfac = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $dt_impfac[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $dt_impfac = false;
          $dt_impfac_erro = $this->Db->ErrorMsg();
      } 
;

							if(isset($dt_impfac[0][0]))
							{

								for($t=0;$t<count($dt_impfac );$t++)
								{

									$base		=$dt_impfac[$t][0];
									$base		=strval($base);
									$codImp		=$dt_impfac[$t][1];
									$codImp		=strval($codImp);
									$Timp		=$dt_impfac[$t][2];
									$Timp		=$Timp.".00";
									$eliva		=$dt_impfac[$t][3];

									$objImpGen[$t] = new FacturaImpuestos;

									$objImpGen[$t]->baseImponibleTOTALImp = $base;
									$objImpGen[$t]->codigoTOTALImp = $codImp;
									$objImpGen[$t]->controlInterno = "";
									$objImpGen[$t]->porcentajeTOTALImp = $Timp;
									$objImpGen[$t]->unidadMedida = "";
									$objImpGen[$t]->unidadMedidaTributo = "";
									$objImpGen[$t]->valorTOTALImp = $eliva;
									$objImpGen[$t]->valorTributoUnidad = "0.00";

									$factura->impuestosGenerales[$t] = $objImpGen[$t];

								}
							}

							 
      $nm_select = "select (if(iv.tipo_impuesto='CONSUMO','02','01')) as codigoimpuesto, sum(iva) as iva, sum(valorpar-(descuento+iva)) as base from detalleventa d inner join productos p on d.idpro=p.idprod inner join iva iv on p.idiva=iv.idiva where numfac='".$vidfacven."' group by iv.tipo_impuesto"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $dt_impTfac = array();
      $dt_imptfac = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $dt_impTfac[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $dt_imptfac[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $dt_impTfac = false;
          $dt_impTfac_erro = $this->Db->ErrorMsg();
          $dt_imptfac = false;
          $dt_imptfac_erro = $this->Db->ErrorMsg();
      } 
;

							if(isset($dt_imptfac[0][0]))
							{
								$codImp		=$dt_imptfac[0][0];
								$codImp		=strval($codImp);
								$eliva		=$dt_imptfac[0][1];
								$base		=$dt_imptfac[0][2];
								$tot		=$base+$eliva;


								$impTot[$i] = new ImpuestosTotales;
								$impTot[$i]->codigoTOTALImp = $codImp;
								$impTot[$i]->montoTotal = $eliva;
							}


							 
      $nm_select = "SELECT count(*) from detalleventa where numfac='".$vidfacven."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $ds_cont = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $ds_cont[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $ds_cont = false;
          $ds_cont_erro = $this->Db->ErrorMsg();
      } 
;
							if(isset($ds_cont[0][0]))
							{
								$totalitems=$ds_cont[0][0];
							}
							else
							{
								$totalitems='1';
							}


							$factura->impuestosTotales[0] = $impTot[$i];

							$vultimopago    = "";
							$vnumeroatrasos = 0;
							$vsaldoatrasos  = 0;
							$vtotalapagar   = 0;
							$vidcontra      = 0;
							$vfechacorte    = "";
							$vfechalimite   = "";

							$vsql = "select id_contrato from terceros_contratos_factura where factura='".$vidfacven."' limit 1";
							 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vIdContrato = array();
      $vidcontrato = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vIdContrato[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vidcontrato[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vIdContrato = false;
          $vIdContrato_erro = $this->Db->ErrorMsg();
          $vidcontrato = false;
          $vidcontrato_erro = $this->Db->ErrorMsg();
      } 
;
							if(isset($vidcontrato[0][0]))
							{
								$vidcontra = $vidcontrato[0][0];
							}

							if($vidcontra>0)
							{
								$vsql = "select fecha_ultimopago from terceros_contratos where id_ter_cont='".$vidcontra."'";
								 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vFechUlt = array();
      $vfechult = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vFechUlt[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vfechult[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vFechUlt = false;
          $vFechUlt_erro = $this->Db->ErrorMsg();
          $vfechult = false;
          $vfechult_erro = $this->Db->ErrorMsg();
      } 
;
								if(isset($vfechult[0][0]))
								{
									$vultimopago = $vfechult[0][0];
								}

								$vsql = "select count(*) from terceros_contratos_factura where id_contrato='".$vidcontra."' and deperiodo='SI' and saldo>0 and factura<>'".$vidfacven."'";
								 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vAtrasos = array();
      $vatrasos = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vAtrasos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vatrasos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vAtrasos = false;
          $vAtrasos_erro = $this->Db->ErrorMsg();
          $vatrasos = false;
          $vatrasos_erro = $this->Db->ErrorMsg();
      } 
;
								if(isset($vatrasos[0][0]))
								{
									$vnumeroatrasos = $vatrasos[0][0];
								}

								$vsql = "select sum(saldo) from terceros_contratos_factura where id_contrato='".$vidcontra."' and deperiodo='SI' and saldo>0 and factura<>'".$vidfacven."'";
								 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vAtrasosSal = array();
      $vatrasossal = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vAtrasosSal[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vatrasossal[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vAtrasosSal = false;
          $vAtrasosSal_erro = $this->Db->ErrorMsg();
          $vatrasossal = false;
          $vatrasossal_erro = $this->Db->ErrorMsg();
      } 
;
								if(isset($vatrasossal[0][0]))
								{
									$vsaldoatrasos  = $vatrasossal[0][0];
								}
								
								$vsql = "select fecha_limitepago, fecha_corte from terceros_contratos where id_ter_cont='".$vidcontra."'";
								 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vFinicioFcorte = array();
      $vfiniciofcorte = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vFinicioFcorte[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $vfiniciofcorte[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vFinicioFcorte = false;
          $vFinicioFcorte_erro = $this->Db->ErrorMsg();
          $vfiniciofcorte = false;
          $vfiniciofcorte_erro = $this->Db->ErrorMsg();
      } 
;
								if(isset($vfiniciofcorte[0][0]))
								{
									$vfechalimite = $vfiniciofcorte[0][0];
									$vfechalimite = date_create($vfechalimite);
									$vfechalimite = date_format($vfechalimite,"d-m-Y");
									
									$vfechacorte  = $vfiniciofcorte[0][1];
									$vfechacorte  = date_create($vfechacorte);
									$vfechacorte  = date_format($vfechacorte,"d-m-Y");
								}
							}

							$vtotalapagar   = $vsaldoatrasos + $tot;

							if(!empty($vobserv))
							{
								$vobs->string[0] = $vobserv;
								if($vtotalingresosparaterceros>0)
								{
									$vobs->string[1] = "Total ingresos para terceros: $".number_format($vtotalingresosparaterceros);
									$vobs->string[2] = "Último pago: ".$vultimopago;
									$vobs->string[3] = "Número de atrasos: ".$vnumeroatrasos;
									$vobs->string[4] = "Saldo atrasos: $".number_format($vsaldoatrasos);
									$vobs->string[5] = "<b>TOTAL A PAGAR: $".number_format($vtotalapagar)."</b>";
									$vobs->string[6] = "Número usuario: ".$vnumerocontrato;
									$vobs->string[7] = "Fecha límite de pago: ".$vfechalimite." - fecha corte: ".$vfechacorte;
								}
								else
								{
									$vobs->string[1] = "Último pago: ".$vultimopago;
									$vobs->string[2] = "Número de atrasos: ".$vnumeroatrasos;
									$vobs->string[3] = "Saldo atrasos: $".number_format($vsaldoatrasos);
									$vobs->string[4] = "<b>TOTAL A PAGAR: $".number_format($vtotalapagar)."</b>";
									$vobs->string[5] = "Número usuario: ".$vnumerocontrato;
									$vobs->string[6] = "Fecha límite de pago: ".$vfechalimite." - fecha corte: ".$vfechacorte;
								}
							}
							else
							{
								if($vtotalingresosparaterceros>0)
								{
									$vobs->string[0] = "Total ingresos para terceros: $".number_format($vtotalingresosparaterceros);
									$vobs->string[1] = "Último pago: ".$vultimopago;
									$vobs->string[2] = "Número de atrasos: ".$vnumeroatrasos;
									$vobs->string[3] = "Saldo atrasos: $".number_format($vsaldoatrasos);
									$vobs->string[4] = "<b>TOTAL A PAGAR: $".number_format($vtotalapagar)."</b>";
									$vobs->string[5] = "Número usuario: ".$vnumerocontrato;
									$vobs->string[6] = "Fecha límite de pago: ".$vfechalimite." - fecha corte: ".$vfechacorte;
								}
								else
								{
									$vobs->string[0] = "Último pago: ".$vultimopago;
									$vobs->string[1] = "Número de atrasos: ".$vnumeroatrasos;
									$vobs->string[2] = "Saldo atrasos: $".number_format($vsaldoatrasos);
									$vobs->string[3] = "<b>TOTAL A PAGAR: $".number_format($vtotalapagar)."</b>";
									$vobs->string[4] = "Número usuario: ".$vnumerocontrato;
									$vobs->string[5] = "Fecha límite de pago: ".$vfechalimite." - fecha corte: ".$vfechacorte;
								}
							}

							if(isset($vobs->string[0]))
							{
								$factura->informacionAdicional = $vobs;
							}

							if($vcredito==1)
							{
								$pagos = new MediosDePago();
								$pagos->medioPago = "ZZZ";
								$pagos->metodoDePago = "2";
								$pagos->numeroDeReferencia = "01";
								$pagos->fechaDeVencimiento = $lafechadevencimiento;
							}
							else
							{
								$pagos = new MediosDePago();
								$pagos->medioPago = "ZZZ";
								$pagos->metodoDePago = "1";
								$pagos->numeroDeReferencia = "01";	
							}

							$factura->mediosDePago[0] = $pagos;

							$factura->moneda = "COP";
							$factura->redondeoAplicado = "0.00"	;
							$factura->rangoNumeracion = $vrango;

							$factura->tipoOperacion = "10";
							$factura->totalBaseImponible = $base;
							$factura->totalBrutoConImpuesto = $tot;
							$factura->totalMonto =$tot;
							$factura->totalProductos=$totalitems;
							$factura->totalSinImpuestos=$base;


							$factura->tipoDocumento="01";

							if ($enviarAdjunto == "TRUE")
							{
								$adjuntos="1";
							}
							else
							{
								$adjuntos="0";
							}


							$params = array(
								'tokenEmpresa' =>  $TokenEnterprise,
								'tokenPassword' =>$TokenAutorizacion,
								'factura' => $factura ,
								'adjuntos' => $adjuntos);


							$resultado = $WebService->enviar($vServidor,$options,$params);

							$vmensaje .= "Resultado de la Emisión\n";
							if($resultado["codigo"]==200 or $resultado["codigo"]==201)
							{
								$vmensaje .=  "La factura: ".$vPref."-".$vconsecutivo." se ha enviado con éxito!\n";

								error_reporting(E_ERROR);
								$WebService2 = new WebService();
								$options2 = array('exceptions' => true, 'trace' => true);

								$params2 = array (
									'tokenEmpresa'	=>$TokenEnterprise,
									'tokenPassword'	=>$TokenAutorizacion,
									'documento'		=>$vPref.$vconsecutivo);

								$descargas = $WebService2->Descargas($vServidor,$options2,$params2,'pdf');

								if($descargas["codigo"]==200 or $descargas["codigo"]==201)
								{
									$decoded 	= $descargas["documento"];
									$decoded	= strval($decoded);
									$vcufe		= $resultado["cufe"];
									$vcufe		=  strval($vcufe);
									$vestado	= $resultado["codigo"];
									$vestado	=  strval($vestado);
									$vavisos	=  implode(";", $resultado);
									$vqr        = strval($resultado["qr"]);
									$vfechavalidacion = $resultado["fechaRespuesta"];
									$vfechavalidacion = substr($vfechavalidacion, 0, 18);

									$sql="UPDATE facturaven_contratos SET cufe = '".$vcufe."', enlacepdf='".$decoded."', estado='".$vestado."', avisos='".$vavisos."',qr_base64='".$vqr."',fecha_validacion='".$vfechavalidacion."',enviada='SI',periodo=MONTH(fechaven),anio=YEAR(fechaven) WHERE idfacven='".$vidfacven."'";
									
     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
								}
							}
							else
							{
								$vavisos =  implode(";", $resultado);
								$sql="UPDATE facturaven_contratos SET avisos='".$vavisos."', enviada='PT' WHERE idfacven='".$vidfacven."'";
								
     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

								if($resultado["codigo"]==101)
								{
									$vmensaje .= "La factura: ".$vPref."-".$vconsecutivo." no se puede enviar porque ya ha sido enviada.\n";

								}
								else
								{
									print_r("Código: " .$resultado["codigo"] ."</br>Mensaje:  " .$resultado["mensaje"] ."</br>Fecha de Respuesta:  " .$resultado["fechaRespuesta"] ."</br>Mensaje Validación:  " );
									for($i = 0; $i < $max;$i++)
									{
										print_r("</br>" .$resultado["mensajesValidacion"]->string[$i]  );
									}

									echo "<br><br>";
									print_r($resultado);
								}
							}
						}

						error_DC:
						;
					}
				}
			}
			else
			{
				$vmensaje .=  "EL DOCUMENTO NO ES FACTURA DE FACTURACIÓN ELECTRÓNICA!\n";
			}
		}
	}
	echo $vmensaje;
$_SESSION['scriptcase']['grid_reporte_impuestos_ing_terceros']['contr_erro'] = 'off';
}
}

?>
