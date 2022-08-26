<?php

class grid_empresas_res_xml
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['xml_res_grid']))
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
      $this->Arq_zip       = $this->Arquivo . "_grid_empresas.zip";
      $this->Arquivo      .= "_grid_empresas";
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['xml_res_grid']))
      {
          $this->Arquivo      .= "_" . $this->Ini->Nm_lang['lang_othr_smry_titl'];
      }
      $this->Arquivo_view  = $this->Arquivo . "_view.xml";
      $this->Arquivo      .= ".xml";
      $this->Tit_doc       = "grid_empresas.xml";
      $this->Tit_zip       = "grid_empresas.zip";
      $this->Grava_view   = false;
      if (strtolower($_SESSION['scriptcase']['charset']) != strtolower($_SESSION['scriptcase']['charset_html']))
      {
          $this->Grava_view = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['xml_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['xml_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['xml_name'] .= ".xml";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['xml_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['xml_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['xml_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['xml_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      $this->Res       = new grid_empresas_resumo("out");
      $this->prep_modulos("Res");
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['xml_res_grid']) && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_empresas']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['xml_return']);
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
          fwrite($xml_f, "<grid_empresas>\r\n");
      }
      if ($this->Grava_view)
      {
          $xml_charset_v = $_SESSION['scriptcase']['charset_html'];
          $xml_v         = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view, "w");
          fwrite($xml_v, "<?xml version=\"1.0\" encoding=\"$xml_charset_v\" ?>\r\n");
          fwrite($xml_v, "<root>\r\n");
          if ($this->New_Format)
          {
              fwrite($xml_v, "<grid_empresas>\r\n");
          }
      }
      $this->Res->resumo_export();
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['xml_res_grid']) && !$this->Ini->sc_export_ajax) {
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
      $this->array_titulos = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['arr_export']['label'];
      $this->array_linhas  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['arr_export']['data'];
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
          fwrite($xml_f, "</grid_empresas>\r\n");
      }
      fwrite($xml_f, "</root>");
      fclose($xml_f);
      if ($this->Grava_view)
      {
          $this->grava_linha($xml_v);
          if ($this->New_Format)
          {
              fwrite($xml_v, "</grid_empresas>\r\n");
          }
          fwrite($xml_v, "</root>");
          fclose($xml_v);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['xml_res_grid']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['xml_res_file']['xml'] = $this->Xml_f;
          if ($this->Grava_view)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['xml_res_file']['view'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view;
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
              $xml_registro = "<grid_empresas";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Lista de Empresas :: XML</TITLE>
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
<form name="Fdown" method="get" action="grid_empresas_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_empresas"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_empresas']['xml_return']); ?>"> 
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
function fGestionarFTP($rutaarchivo,$host,$port,$user,$password,$carpeta)
{
$_SESSION['scriptcase']['grid_empresas']['contr_erro'] = 'on';
  	
	$mensaje = "";
	
	try
	{
		if(is_readable($rutaarchivo))
		{
			$nombrearchivo = trim(basename($rutaarchivo).PHP_EOL);

			# Realizamos la conexion con el servidor
			$conn_id=@ftp_connect($host,$port);

			if($conn_id)
			{
				# Realizamos el login con nuestro usuario y contraseña
				if(@ftp_login($conn_id,$user,$password))
				{
					if (ftp_mkdir($conn_id, $carpeta)) 
					{
					} 
					else 
					{
					}
					
					# Cambiamos al directorio especificado
					if(@ftp_chdir($conn_id,$carpeta))
					{

						# Subimos el fichero
						if(@ftp_put($conn_id,$nombrearchivo,$rutaarchivo,FTP_ASCII))
						{
							$mensaje = "Fichero subido correctamente";
						}
						else
						{
							$mensaje = "No ha sido posible subir el fichero";
						}
						
					}
					else
					{
						$mensaje = "No existe el directorio especificado";
					}
				}
				else
				{
					$mensaje = "El usuario o la contraseña son incorrectos";
				}

				# Cerramos la conexion ftp
				ftp_close($conn_id);

			}
			else
			{
				$mensaje = "No ha sido posible conectar con el servidor";
			}
		}
		else
		{
		   $mensaje = "No existe o no es legible el archivo";
		}
		
		echo $mensaje." -- Cerre la ventana.";
		
		echo "<script>";
		echo "console.log('fGestionarFTP: ".$mensaje."');";
		echo "</script>";
		
	} catch (Exception $e) {
		
		echo "<script>";
		echo "console.log('fGestionarFTP: Excepción capturada: ".$e->getMessage()."');";
		echo "</script>";
	}

$_SESSION['scriptcase']['grid_empresas']['contr_erro'] = 'off';
}
function ConectarFTP()
{
$_SESSION['scriptcase']['grid_empresas']['contr_erro'] = 'on';
  
	define("SERVER","ftp.solucionesnavarro.com"); 
	define("PORT",21); 
	define("USER","p@gestionftpfacilweb.solucionesnavarro.com"); 
	define("PASSWORD",".facilweb2020"); 
	define("PASV",true); 
	
	$id_ftp=ftp_connect(SERVER,PORT); 
	ftp_login($id_ftp,USER,PASSWORD); 
	ftp_pasv($id_ftp,PASV); 
	return $id_ftp; 

$_SESSION['scriptcase']['grid_empresas']['contr_erro'] = 'off';
}
function SubirArchivo($archivo_local,$carpeta){
$_SESSION['scriptcase']['grid_empresas']['contr_erro'] = 'on';
  
	
	$id_ftp=$this->ConectarFTP();
	
	$nombrearchivo = trim(basename($archivo_local).PHP_EOL);
	
	$directorios = ftp_nlist($id_ftp, ".");
	
	if(!in_array($carpeta,$directorios))
	{
		if (ftp_mkdir($id_ftp, $carpeta)) 
		{
			echo "Creado con exito ".$carpeta."<br>";
		} 
	}
	
	ftp_chdir($id_ftp,$carpeta);
	ftp_put($id_ftp,$nombrearchivo,$archivo_local,FTP_BINARY);
	ftp_quit($id_ftp); 
	
	echo "Copia subida con éxito a la carpeta remota: ".$carpeta."<br>";

$_SESSION['scriptcase']['grid_empresas']['contr_erro'] = 'off';
}
function ObtenerRuta(){
$_SESSION['scriptcase']['grid_empresas']['contr_erro'] = 'on';
  
	
	$id_ftp=$this->ConectarFTP(); 
	$Directorio=ftp_pwd($id_ftp); 
	ftp_quit($id_ftp); 
	return $Directorio; 

$_SESSION['scriptcase']['grid_empresas']['contr_erro'] = 'off';
}
function fCopiasBD($nomempresa,$ruta,$tipo,$retorno=false,$sinmovimiento="NO",$ubicacion_archivo="NO",$vpuerto=3311)
{
$_SESSION['scriptcase']['grid_empresas']['contr_erro'] = 'on';
if (!isset($_SESSION['gOS'])) {$_SESSION['gOS'] = "";}
if (!isset($this->sc_temp_gOS)) {$this->sc_temp_gOS = (isset($_SESSION['gOS'])) ? $_SESSION['gOS'] : "";}
  
	try {
		
		if($this->sc_temp_gOS!="WIN")
		{
			 if (isset($this->sc_temp_gOS)) {$_SESSION['gOS'] = $this->sc_temp_gOS;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('blank_copia_php') . "/", $this->nm_location, "","_self", 440, 630, "ret_self");
 };
		}
		
		$vruta = getcwd();
		
		if (!file_exists($vruta.'/menu'))
		{
			chdir('../');
			$vruta = getcwd();
		}
		
		if(empty($ruta))
		{
			$ruta = $vruta.'/copias/'.$nomempresa;
		}
		
		if (!file_exists($ruta))
		{
			mkdir($ruta, 0777, true);
		}
		
		 $carpeta_tmp = '../tmp';

		 if (!file_exists($carpeta_tmp))
		 {
			 mkdir($carpeta_tmp, 0777, true);
		 }
		
		$gvnit = "";
		 
      $nm_select = "select concat(nit,'-',dv) from $nomempresa.datosemp"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $vnit = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $vnit[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $vnit = false;
          $vnit_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
		if(isset($vnit[0][0]))
		{
			$gvnit = $vnit[0][0];
			$gvnit = $gvnit.'_';
		}
		
		$varchivocopia = $ruta.'/'.$tipo.'_'.$gvnit.$nomempresa.'_fecha_'.date('Y-m-d').'_hora_'.date('H-i-s').'.sql';
		
		if($sinmovimiento=="NO")
		{
			$vcmd = '"'.$vruta.'\mysql\bin\mysqldump.exe" -h localhost --port='.$vpuerto.' --user=copia --password=copia --no-create-info --skip-triggers --extended-insert=true --complete-insert '.$nomempresa.' > "'.$varchivocopia.'"';
			
			
		}
		else
		{
			$vcmd = '"'.$vruta.'\mysql\bin\mysqldump.exe" -h localhost --port='.$vpuerto.' --user=copia --password=copia --no-create-info --skip-triggers --extended-insert=true --complete-insert '.$nomempresa.' aplicaciones_menu aplicaciones_permisos bodegas c_costos caja_ventas colores colorxproducto configuraciones datosemp departamento detallecombos detallekardexcombos direccion formadepago formatosimpresion formatosimpresion_prefijos grupo impuestos iva municipio paises permisos productos resdian saborxproducto tallas tallaxproducto terceros tipoautoretencion tipoica tiporetefuente tipotransfe usuarios usuarios_grupos vencimiento_lote version webservicefe  > "'.$varchivocopia.'"';
		}
		
		shell_exec($vcmd);
		
		echo "<script>";
		echo "console.log('fCopiasBD: Copia realizada.');";
		echo "</script>";
		
		include_once($this->Ini->path_third . "/zipfile/zipfile.php");
$sc_Zip_files = new zipfile();
$sc_Zip_files->set_file( $varchivocopia.'.zip');
if (is_array($varchivocopia))
{
    foreach ($varchivocopia as $SC_cada_zip)
    {
        $sc_Zip_files->sc_zip_all($SC_cada_zip);
    }
}
else
{
    $sc_Zip_files->sc_zip_all($varchivocopia);
}
$sc_Zip_files->file();
;
		
		unlink($varchivocopia);
		
		if($retorno)
		{
			return addslashes($varchivocopia);
		}
		
		if($ubicacion_archivo=="SI")
		{
			return addslashes($varchivocopia.'.zip');
		}
		
	} catch (Exception $e) {
		
		echo "<script>";
		echo "console.log('fCopiasBD: Excepción capturada: ".$e->getMessage()."');";
		echo "</script>";
	}
if (isset($this->sc_temp_gOS)) {$_SESSION['gOS'] = $this->sc_temp_gOS;}
$_SESSION['scriptcase']['grid_empresas']['contr_erro'] = 'off';
}
}

?>
