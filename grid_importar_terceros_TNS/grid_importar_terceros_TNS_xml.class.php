<?php

class grid_importar_terceros_TNS_xml
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $Arquivo;
   var $Arquivo_view;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();
   var $count_ger;

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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['embutida'])
      {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Xml_f);
              $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
              $Temp = ob_get_clean();
              if ($Temp !== false && trim($Temp) != "")
              {
                  $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
              }
              $oJson = new Services_JSON();
              echo $oJson->encode($this->Arr_result);
              exit;
          }
          else
          {
              $this->progress_bar_end();
          }
      }
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['opcao'] = "";
      }
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      if (isset($GLOBALS['nmgp_parms']) && !empty($GLOBALS['nmgp_parms'])) 
      { 
          $GLOBALS['nmgp_parms'] = str_replace("@aspass@", "'", $GLOBALS['nmgp_parms']);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $GLOBALS["nmgp_parms"]);
          $todo  = explode("?@?", $todox);
          foreach ($todo as $param)
          {
               $cadapar = explode("?#?", $param);
               if (1 < sizeof($cadapar))
               {
                   if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                   {
                       $cadapar[0] = substr($cadapar[0], 11);
                       $cadapar[1] = $_SESSION[$cadapar[1]];
                   }
                   if (isset($GLOBALS['sc_conv_var'][$cadapar[0]]))
                   {
                       $cadapar[0] = $GLOBALS['sc_conv_var'][$cadapar[0]];
                   }
                   elseif (isset($GLOBALS['sc_conv_var'][strtolower($cadapar[0])]))
                   {
                       $cadapar[0] = $GLOBALS['sc_conv_var'][strtolower($cadapar[0])];
                   }
                   nm_limpa_str_grid_importar_terceros_TNS($cadapar[1]);
                   nm_protect_num_grid_importar_terceros_TNS($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_importar_terceros_TNS']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->New_Format  = true;
      $this->Xml_tag_label = false;
      $this->Tem_xml_res = false;
      $this->Xml_password = "";
      if (isset($_REQUEST['nm_xml_tag']) && !empty($_REQUEST['nm_xml_tag']))
      {
          $this->New_Format = ($_REQUEST['nm_xml_tag'] == "tag") ? true : false;
      }
      if (isset($_REQUEST['nm_xml_label']) && !empty($_REQUEST['nm_xml_label']))
      {
          $this->Xml_tag_label = ($_REQUEST['nm_xml_label'] == "S") ? true : false;
      }
      $this->Tem_xml_res  = true;
      if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
      { 
          $this->Tem_xml_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false) ? true : false;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['SC_Ind_Groupby'] == "sc_free_total")
      {
          $this->Tem_xml_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['SC_Gb_Free_cmp']))
      {
          $this->Tem_xml_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "grid_importar_terceros_TNS/grid_importar_terceros_TNS_res_xml.class.php"))
      {
          $this->Tem_xml_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_label']))
      {
          $this->Xml_tag_label = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_label'];
          $this->New_Format    = true;
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_importar_terceros_TNS_total.class.php"); 
      $this->Tot      = new grid_importar_terceros_TNS_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['tot_geral'][1];
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_importar_terceros_TNS']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_return']);
          if ($this->Tem_xml_res) {
              $PB_plus = intval ($this->count_ger * 0.04);
              $PB_plus = ($PB_plus < 2) ? 2 : $PB_plus;
          }
          else {
              $PB_plus = intval ($this->count_ger * 0.02);
              $PB_plus = ($PB_plus < 1) ? 1 : $PB_plus;
          }
          $PB_tot = $this->count_ger + $PB_plus;
          $this->PB_dif = $PB_tot - $this->count_ger;
          $this->pb->setTotalSteps($PB_tot);
      }
      $this->nm_data    = new nm_data("es");
      $this->Arquivo      = "sc_xml";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arq_zip      = $this->Arquivo . "_grid_importar_terceros_TNS.zip";
      $this->Arquivo     .= "_grid_importar_terceros_TNS";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_importar_terceros_TNS.xml";
      $this->Tit_zip      = "grid_importar_terceros_TNS.zip";
      $this->Grava_view   = false;
      if (strtolower($_SESSION['scriptcase']['charset']) != strtolower($_SESSION['scriptcase']['charset_html']))
      {
          $this->Grava_view = true;
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
      global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_importar_terceros_TNS']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_importar_terceros_TNS']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_importar_terceros_TNS']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->terid = $Busca_temp['terid']; 
          $tmp_pos = strpos($this->terid, "##@@");
          if ($tmp_pos !== false && !is_array($this->terid))
          {
              $this->terid = substr($this->terid, 0, $tmp_pos);
          }
          $this->terid_2 = $Busca_temp['terid_input_2']; 
          $this->nit = $Busca_temp['nit']; 
          $tmp_pos = strpos($this->nit, "##@@");
          if ($tmp_pos !== false && !is_array($this->nit))
          {
              $this->nit = substr($this->nit, 0, $tmp_pos);
          }
          $this->tipodociden = $Busca_temp['tipodociden']; 
          $tmp_pos = strpos($this->tipodociden, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipodociden))
          {
              $this->tipodociden = substr($this->tipodociden, 0, $tmp_pos);
          }
          $this->nittri = $Busca_temp['nittri']; 
          $tmp_pos = strpos($this->nittri, "##@@");
          if ($tmp_pos !== false && !is_array($this->nittri))
          {
              $this->nittri = substr($this->nittri, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_name'] .= ".xml";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['embutida'])
      { 
          $xml_charset = $_SESSION['scriptcase']['charset'];
          $this->Xml_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          $xml_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
          fwrite($xml_f, "<?xml version=\"1.0\" encoding=\"$xml_charset\" ?>\r\n");
          fwrite($xml_f, "<root>\r\n");
          if ($this->Grava_view)
          {
              $xml_charset_v = $_SESSION['scriptcase']['charset_html'];
              $xml_v         = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view, "w");
              fwrite($xml_v, "<?xml version=\"1.0\" encoding=\"$xml_charset_v\" ?>\r\n");
              fwrite($xml_v, "<root>\r\n");
          }
      }
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT      TERID,     NIT,     TIPODOCIDEN,     NITTRI,     CIUDADREXP,     NOMBRE,     DIRECC1,     DIRECC2,     ZONA1,     ZONA2,     CIUDAD,     TELEF1,     TELEF2,     REPLEG,     CLIENTE,     PROVEED,     VENDED,     COBRA,     OBSERV,     EMAIL,     BEEPER,     EMPBEEPER,     CELULAR,     EMPCELULAR,     FECHCREAC,     FECHACT,     FECHULTCOM,     VRULTCOM,     NROULTCOM,     FECHULTVEN,     VRULTVEN,     NROULTVEN,     CLASIFICAID,     MAXCREDCXP,     MAXCREDCXC,     PORRETEN,     CTACLI,     CTAPRO,     CTARETCLI,     CTARETPRO,     CTARETSCLI,     CTARETSPRO,     FECNACI,     CODRECIP,     PORCRECIP,     CONDUCTOR,     TOMADOR,     PROPIETARIO,     EMPLEADO,     INMPROPIETARIO,     INMINQUILINO,     CIUDANEID,     CIUDADEXP,     FIADOR,     INACTIVO,     NOMREGTRI,     TARJETAPUNTOS,     PORCRETVEN,     NOMBRE1,     NOMBRE2,     APELLIDO1,     APELLIDO2,     OTRO,     MOTIVODEVID,     FECHINACTIVO,     MAXCREDDIAS,     NITTRIOFI,     ACTECONOMICAID,     MESA,     MOSTRADOR,     PORCRIVAC,     PORCRIVAV,     PORCRICAC,     PORCRICAV,     NATJURIDICA,     BARRIOINID,     FECAFILIA,     PORCRCREEV,     PORCRCREEC,     TIPOCREEV,     TIPOCREEC,     NUMCUE,     TIPCUE,     ACTCOMERID,     FECULTENVIO,     CONSECTERWS,     FECLEGAL,     EMAILEMP,     PAGWEB,     ETERRITORIAL,     LISTAPRECIOID,     EXTLOCAL,     '' AS PEP,     '' AS  NOMEMPRESA,     '' AS FECHAEXP,     '' AS OCUPID,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTACLI) AS PUC_DEUDORES,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTARETCLI) AS PUC_RETCLI,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTAPRO) AS PUC_PROVEEDORES,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTARETPRO) AS PUC_RETPRO FROM      TERCEROS) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT NIT, NITTRI, NOMBRE, CLIENTE, PROVEED, EMPLEADO, OTRO, PUC_DEUDORES, PUC_RETCLI, PUC_PROVEEDORES, PUC_RETPRO, INACTIVO, TERID, TIPODOCIDEN, CIUDADREXP, DIRECC1, DIRECC2, ZONA1, ZONA2, CIUDAD, TELEF1, TELEF2, REPLEG, VENDED, COBRA, OBSERV, EMAIL, BEEPER, EMPBEEPER, CELULAR, EMPCELULAR, FECHCREAC, FECHACT, FECHULTCOM, VRULTCOM, NROULTCOM, FECHULTVEN, VRULTVEN, NROULTVEN, CLASIFICAID, MAXCREDCXP, MAXCREDCXC, PORRETEN, CTACLI, CTAPRO, CTARETCLI, CTARETPRO, CTARETSCLI, CTARETSPRO, FECNACI, CODRECIP, PORCRECIP, CONDUCTOR, TOMADOR, PROPIETARIO, INMPROPIETARIO, INMINQUILINO, CIUDANEID, CIUDADEXP, FIADOR, NOMREGTRI, TARJETAPUNTOS, PORCRETVEN, NOMBRE1, NOMBRE2, APELLIDO1, APELLIDO2, MOTIVODEVID, FECHINACTIVO, MAXCREDDIAS, NITTRIOFI, ACTECONOMICAID, MESA, MOSTRADOR, PORCRIVAC, PORCRIVAV, PORCRICAC, PORCRICAV, NATJURIDICA, BARRIOINID, FECAFILIA, PORCRCREEV, PORCRCREEC, TIPOCREEV, TIPOCREEC, NUMCUE, TIPCUE, ACTCOMERID, FECULTENVIO, CONSECTERWS, FECLEGAL, EMAILEMP, PAGWEB, ETERRITORIAL, LISTAPRECIOID, EXTLOCAL, PEP, NOMEMPRESA, FECHAEXP, OCUPID from (SELECT      TERID,     NIT,     TIPODOCIDEN,     NITTRI,     CIUDADREXP,     NOMBRE,     DIRECC1,     DIRECC2,     ZONA1,     ZONA2,     CIUDAD,     TELEF1,     TELEF2,     REPLEG,     CLIENTE,     PROVEED,     VENDED,     COBRA,     OBSERV,     EMAIL,     BEEPER,     EMPBEEPER,     CELULAR,     EMPCELULAR,     FECHCREAC,     FECHACT,     FECHULTCOM,     VRULTCOM,     NROULTCOM,     FECHULTVEN,     VRULTVEN,     NROULTVEN,     CLASIFICAID,     MAXCREDCXP,     MAXCREDCXC,     PORRETEN,     CTACLI,     CTAPRO,     CTARETCLI,     CTARETPRO,     CTARETSCLI,     CTARETSPRO,     FECNACI,     CODRECIP,     PORCRECIP,     CONDUCTOR,     TOMADOR,     PROPIETARIO,     EMPLEADO,     INMPROPIETARIO,     INMINQUILINO,     CIUDANEID,     CIUDADEXP,     FIADOR,     INACTIVO,     NOMREGTRI,     TARJETAPUNTOS,     PORCRETVEN,     NOMBRE1,     NOMBRE2,     APELLIDO1,     APELLIDO2,     OTRO,     MOTIVODEVID,     FECHINACTIVO,     MAXCREDDIAS,     NITTRIOFI,     ACTECONOMICAID,     MESA,     MOSTRADOR,     PORCRIVAC,     PORCRIVAV,     PORCRICAC,     PORCRICAV,     NATJURIDICA,     BARRIOINID,     FECAFILIA,     PORCRCREEV,     PORCRCREEC,     TIPOCREEV,     TIPOCREEC,     NUMCUE,     TIPCUE,     ACTCOMERID,     FECULTENVIO,     CONSECTERWS,     FECLEGAL,     EMAILEMP,     PAGWEB,     ETERRITORIAL,     LISTAPRECIOID,     EXTLOCAL,     '' AS PEP,     '' AS  NOMEMPRESA,     '' AS FECHAEXP,     '' AS OCUPID,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTACLI) AS PUC_DEUDORES,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTARETCLI) AS PUC_RETCLI,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTAPRO) AS PUC_PROVEEDORES,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTARETPRO) AS PUC_RETPRO FROM      TERCEROS) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT NIT, NITTRI, NOMBRE, CLIENTE, PROVEED, EMPLEADO, OTRO, PUC_DEUDORES, PUC_RETCLI, PUC_PROVEEDORES, PUC_RETPRO, INACTIVO, TERID, TIPODOCIDEN, CIUDADREXP, DIRECC1, DIRECC2, ZONA1, ZONA2, CIUDAD, TELEF1, TELEF2, REPLEG, VENDED, COBRA, OBSERV, EMAIL, BEEPER, EMPBEEPER, CELULAR, EMPCELULAR, FECHCREAC, FECHACT, FECHULTCOM, VRULTCOM, NROULTCOM, FECHULTVEN, VRULTVEN, NROULTVEN, CLASIFICAID, MAXCREDCXP, MAXCREDCXC, PORRETEN, CTACLI, CTAPRO, CTARETCLI, CTARETPRO, CTARETSCLI, CTARETSPRO, FECNACI, CODRECIP, PORCRECIP, CONDUCTOR, TOMADOR, PROPIETARIO, INMPROPIETARIO, INMINQUILINO, CIUDANEID, CIUDADEXP, FIADOR, NOMREGTRI, TARJETAPUNTOS, PORCRETVEN, NOMBRE1, NOMBRE2, APELLIDO1, APELLIDO2, MOTIVODEVID, FECHINACTIVO, MAXCREDDIAS, NITTRIOFI, ACTECONOMICAID, MESA, MOSTRADOR, PORCRIVAC, PORCRIVAV, PORCRICAC, PORCRICAV, NATJURIDICA, BARRIOINID, FECAFILIA, PORCRCREEV, PORCRCREEC, TIPOCREEV, TIPOCREEC, NUMCUE, TIPCUE, ACTCOMERID, FECULTENVIO, CONSECTERWS, FECLEGAL, EMAILEMP, PAGWEB, ETERRITORIAL, LISTAPRECIOID, EXTLOCAL, PEP, NOMEMPRESA, FECHAEXP, OCUPID from (SELECT      TERID,     NIT,     TIPODOCIDEN,     NITTRI,     CIUDADREXP,     NOMBRE,     DIRECC1,     DIRECC2,     ZONA1,     ZONA2,     CIUDAD,     TELEF1,     TELEF2,     REPLEG,     CLIENTE,     PROVEED,     VENDED,     COBRA,     OBSERV,     EMAIL,     BEEPER,     EMPBEEPER,     CELULAR,     EMPCELULAR,     FECHCREAC,     FECHACT,     FECHULTCOM,     VRULTCOM,     NROULTCOM,     FECHULTVEN,     VRULTVEN,     NROULTVEN,     CLASIFICAID,     MAXCREDCXP,     MAXCREDCXC,     PORRETEN,     CTACLI,     CTAPRO,     CTARETCLI,     CTARETPRO,     CTARETSCLI,     CTARETSPRO,     FECNACI,     CODRECIP,     PORCRECIP,     CONDUCTOR,     TOMADOR,     PROPIETARIO,     EMPLEADO,     INMPROPIETARIO,     INMINQUILINO,     CIUDANEID,     CIUDADEXP,     FIADOR,     INACTIVO,     NOMREGTRI,     TARJETAPUNTOS,     PORCRETVEN,     NOMBRE1,     NOMBRE2,     APELLIDO1,     APELLIDO2,     OTRO,     MOTIVODEVID,     FECHINACTIVO,     MAXCREDDIAS,     NITTRIOFI,     ACTECONOMICAID,     MESA,     MOSTRADOR,     PORCRIVAC,     PORCRIVAV,     PORCRICAC,     PORCRICAV,     NATJURIDICA,     BARRIOINID,     FECAFILIA,     PORCRCREEV,     PORCRCREEC,     TIPOCREEV,     TIPOCREEC,     NUMCUE,     TIPCUE,     ACTCOMERID,     FECULTENVIO,     CONSECTERWS,     FECLEGAL,     EMAILEMP,     PAGWEB,     ETERRITORIAL,     LISTAPRECIOID,     EXTLOCAL,     '' AS PEP,     '' AS  NOMEMPRESA,     '' AS FECHAEXP,     '' AS OCUPID,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTACLI) AS PUC_DEUDORES,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTARETCLI) AS PUC_RETCLI,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTAPRO) AS PUC_PROVEEDORES,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTARETPRO) AS PUC_RETPRO FROM      TERCEROS) nm_sel_esp"; 
      } 
      else 
      { 
          $nmgp_select = "SELECT NIT, NITTRI, NOMBRE, CLIENTE, PROVEED, EMPLEADO, OTRO, PUC_DEUDORES, PUC_RETCLI, PUC_PROVEEDORES, PUC_RETPRO, INACTIVO, TERID, TIPODOCIDEN, CIUDADREXP, DIRECC1, DIRECC2, ZONA1, ZONA2, CIUDAD, TELEF1, TELEF2, REPLEG, VENDED, COBRA, OBSERV, EMAIL, BEEPER, EMPBEEPER, CELULAR, EMPCELULAR, FECHCREAC, FECHACT, FECHULTCOM, VRULTCOM, NROULTCOM, FECHULTVEN, VRULTVEN, NROULTVEN, CLASIFICAID, MAXCREDCXP, MAXCREDCXC, PORRETEN, CTACLI, CTAPRO, CTARETCLI, CTARETPRO, CTARETSCLI, CTARETSPRO, FECNACI, CODRECIP, PORCRECIP, CONDUCTOR, TOMADOR, PROPIETARIO, INMPROPIETARIO, INMINQUILINO, CIUDANEID, CIUDADEXP, FIADOR, NOMREGTRI, TARJETAPUNTOS, PORCRETVEN, NOMBRE1, NOMBRE2, APELLIDO1, APELLIDO2, MOTIVODEVID, FECHINACTIVO, MAXCREDDIAS, NITTRIOFI, ACTECONOMICAID, MESA, MOSTRADOR, PORCRIVAC, PORCRIVAV, PORCRICAC, PORCRICAV, NATJURIDICA, BARRIOINID, FECAFILIA, PORCRCREEV, PORCRCREEC, TIPOCREEV, TIPOCREEC, NUMCUE, TIPCUE, ACTCOMERID, FECULTENVIO, CONSECTERWS, FECLEGAL, EMAILEMP, PAGWEB, ETERRITORIAL, LISTAPRECIOID, EXTLOCAL, PEP, NOMEMPRESA, FECHAEXP, OCUPID from (SELECT      TERID,     NIT,     TIPODOCIDEN,     NITTRI,     CIUDADREXP,     NOMBRE,     DIRECC1,     DIRECC2,     ZONA1,     ZONA2,     CIUDAD,     TELEF1,     TELEF2,     REPLEG,     CLIENTE,     PROVEED,     VENDED,     COBRA,     OBSERV,     EMAIL,     BEEPER,     EMPBEEPER,     CELULAR,     EMPCELULAR,     FECHCREAC,     FECHACT,     FECHULTCOM,     VRULTCOM,     NROULTCOM,     FECHULTVEN,     VRULTVEN,     NROULTVEN,     CLASIFICAID,     MAXCREDCXP,     MAXCREDCXC,     PORRETEN,     CTACLI,     CTAPRO,     CTARETCLI,     CTARETPRO,     CTARETSCLI,     CTARETSPRO,     FECNACI,     CODRECIP,     PORCRECIP,     CONDUCTOR,     TOMADOR,     PROPIETARIO,     EMPLEADO,     INMPROPIETARIO,     INMINQUILINO,     CIUDANEID,     CIUDADEXP,     FIADOR,     INACTIVO,     NOMREGTRI,     TARJETAPUNTOS,     PORCRETVEN,     NOMBRE1,     NOMBRE2,     APELLIDO1,     APELLIDO2,     OTRO,     MOTIVODEVID,     FECHINACTIVO,     MAXCREDDIAS,     NITTRIOFI,     ACTECONOMICAID,     MESA,     MOSTRADOR,     PORCRIVAC,     PORCRIVAV,     PORCRICAC,     PORCRICAV,     NATJURIDICA,     BARRIOINID,     FECAFILIA,     PORCRCREEV,     PORCRCREEC,     TIPOCREEV,     TIPOCREEC,     NUMCUE,     TIPCUE,     ACTCOMERID,     FECULTENVIO,     CONSECTERWS,     FECLEGAL,     EMAILEMP,     PAGWEB,     ETERRITORIAL,     LISTAPRECIOID,     EXTLOCAL,     '' AS PEP,     '' AS  NOMEMPRESA,     '' AS FECHAEXP,     '' AS OCUPID,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTACLI) AS PUC_DEUDORES,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTARETCLI) AS PUC_RETCLI,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTAPRO) AS PUC_PROVEEDORES,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTARETPRO) AS PUC_RETPRO FROM      TERCEROS) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select_count;
      $rt = $this->Db->Execute($nmgp_select_count);
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->count_ger = $rt->fields[0];
      $rt->Close();
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $this->xml_registro = "";
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['embutida'])
         { 
             $this->xml_registro .= "<" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro = "<grid_importar_terceros_TNS>\r\n";
         }
         else
         {
             $this->xml_registro = "<grid_importar_terceros_TNS";
         }
         $this->nit = $rs->fields[0] ;  
         $this->nittri = $rs->fields[1] ;  
         $this->nombre = $rs->fields[2] ;  
         $this->cliente = $rs->fields[3] ;  
         $this->proveed = $rs->fields[4] ;  
         $this->empleado = $rs->fields[5] ;  
         $this->otro = $rs->fields[6] ;  
         $this->puc_deudores = $rs->fields[7] ;  
         $this->puc_retcli = $rs->fields[8] ;  
         $this->puc_proveedores = $rs->fields[9] ;  
         $this->puc_retpro = $rs->fields[10] ;  
         $this->inactivo = $rs->fields[11] ;  
         $this->terid = $rs->fields[12] ;  
         $this->terid = (string)$this->terid;
         $this->tipodociden = $rs->fields[13] ;  
         $this->ciudadrexp = $rs->fields[14] ;  
         $this->direcc1 = $rs->fields[15] ;  
         $this->direcc2 = $rs->fields[16] ;  
         $this->zona1 = $rs->fields[17] ;  
         $this->zona1 = (string)$this->zona1;
         $this->zona2 = $rs->fields[18] ;  
         $this->zona2 = (string)$this->zona2;
         $this->ciudad = $rs->fields[19] ;  
         $this->telef1 = $rs->fields[20] ;  
         $this->telef2 = $rs->fields[21] ;  
         $this->repleg = $rs->fields[22] ;  
         $this->vended = $rs->fields[23] ;  
         $this->cobra = $rs->fields[24] ;  
         $this->observ = $rs->fields[25] ;  
         $this->email = $rs->fields[26] ;  
         $this->beeper = $rs->fields[27] ;  
         $this->empbeeper = $rs->fields[28] ;  
         $this->empbeeper = (string)$this->empbeeper;
         $this->celular = $rs->fields[29] ;  
         $this->empcelular = $rs->fields[30] ;  
         $this->empcelular = (string)$this->empcelular;
         $this->fechcreac = $rs->fields[31] ;  
         $this->fechact = $rs->fields[32] ;  
         $this->fechultcom = $rs->fields[33] ;  
         $this->vrultcom = $rs->fields[34] ;  
         $this->vrultcom =  str_replace(",", ".", $this->vrultcom);
         $this->vrultcom = (string)$this->vrultcom;
         $this->nroultcom = $rs->fields[35] ;  
         $this->fechultven = $rs->fields[36] ;  
         $this->vrultven = $rs->fields[37] ;  
         $this->vrultven =  str_replace(",", ".", $this->vrultven);
         $this->vrultven = (string)$this->vrultven;
         $this->nroultven = $rs->fields[38] ;  
         $this->clasificaid = $rs->fields[39] ;  
         $this->clasificaid = (string)$this->clasificaid;
         $this->maxcredcxp = $rs->fields[40] ;  
         $this->maxcredcxp =  str_replace(",", ".", $this->maxcredcxp);
         $this->maxcredcxp = (string)$this->maxcredcxp;
         $this->maxcredcxc = $rs->fields[41] ;  
         $this->maxcredcxc =  str_replace(",", ".", $this->maxcredcxc);
         $this->maxcredcxc = (string)$this->maxcredcxc;
         $this->porreten = $rs->fields[42] ;  
         $this->ctacli = $rs->fields[43] ;  
         $this->ctacli = (string)$this->ctacli;
         $this->ctapro = $rs->fields[44] ;  
         $this->ctapro = (string)$this->ctapro;
         $this->ctaretcli = $rs->fields[45] ;  
         $this->ctaretcli = (string)$this->ctaretcli;
         $this->ctaretpro = $rs->fields[46] ;  
         $this->ctaretpro = (string)$this->ctaretpro;
         $this->ctaretscli = $rs->fields[47] ;  
         $this->ctaretscli = (string)$this->ctaretscli;
         $this->ctaretspro = $rs->fields[48] ;  
         $this->ctaretspro = (string)$this->ctaretspro;
         $this->fecnaci = $rs->fields[49] ;  
         $this->codrecip = $rs->fields[50] ;  
         $this->porcrecip = $rs->fields[51] ;  
         $this->porcrecip =  str_replace(",", ".", $this->porcrecip);
         $this->porcrecip = (string)$this->porcrecip;
         $this->conductor = $rs->fields[52] ;  
         $this->tomador = $rs->fields[53] ;  
         $this->propietario = $rs->fields[54] ;  
         $this->inmpropietario = $rs->fields[55] ;  
         $this->inminquilino = $rs->fields[56] ;  
         $this->ciudaneid = $rs->fields[57] ;  
         $this->ciudaneid = (string)$this->ciudaneid;
         $this->ciudadexp = $rs->fields[58] ;  
         $this->ciudadexp = (string)$this->ciudadexp;
         $this->fiador = $rs->fields[59] ;  
         $this->nomregtri = $rs->fields[60] ;  
         $this->tarjetapuntos = $rs->fields[61] ;  
         $this->porcretven = $rs->fields[62] ;  
         $this->porcretven =  str_replace(",", ".", $this->porcretven);
         $this->porcretven = (string)$this->porcretven;
         $this->nombre1 = $rs->fields[63] ;  
         $this->nombre2 = $rs->fields[64] ;  
         $this->apellido1 = $rs->fields[65] ;  
         $this->apellido2 = $rs->fields[66] ;  
         $this->motivodevid = $rs->fields[67] ;  
         $this->motivodevid = (string)$this->motivodevid;
         $this->fechinactivo = $rs->fields[68] ;  
         $this->maxcreddias = $rs->fields[69] ;  
         $this->maxcreddias = (string)$this->maxcreddias;
         $this->nittriofi = $rs->fields[70] ;  
         $this->acteconomicaid = $rs->fields[71] ;  
         $this->acteconomicaid = (string)$this->acteconomicaid;
         $this->mesa = $rs->fields[72] ;  
         $this->mostrador = $rs->fields[73] ;  
         $this->porcrivac = $rs->fields[74] ;  
         $this->porcrivac =  str_replace(",", ".", $this->porcrivac);
         $this->porcrivac = (string)$this->porcrivac;
         $this->porcrivav = $rs->fields[75] ;  
         $this->porcrivav =  str_replace(",", ".", $this->porcrivav);
         $this->porcrivav = (string)$this->porcrivav;
         $this->porcricac = $rs->fields[76] ;  
         $this->porcricac = (string)$this->porcricac;
         $this->porcricav = $rs->fields[77] ;  
         $this->porcricav = (string)$this->porcricav;
         $this->natjuridica = $rs->fields[78] ;  
         $this->barrioinid = $rs->fields[79] ;  
         $this->barrioinid = (string)$this->barrioinid;
         $this->fecafilia = $rs->fields[80] ;  
         $this->porcrcreev = $rs->fields[81] ;  
         $this->porcrcreev =  str_replace(",", ".", $this->porcrcreev);
         $this->porcrcreev = (string)$this->porcrcreev;
         $this->porcrcreec = $rs->fields[82] ;  
         $this->porcrcreec =  str_replace(",", ".", $this->porcrcreec);
         $this->porcrcreec = (string)$this->porcrcreec;
         $this->tipocreev = $rs->fields[83] ;  
         $this->tipocreev = (string)$this->tipocreev;
         $this->tipocreec = $rs->fields[84] ;  
         $this->tipocreec = (string)$this->tipocreec;
         $this->numcue = $rs->fields[85] ;  
         $this->tipcue = $rs->fields[86] ;  
         $this->actcomerid = $rs->fields[87] ;  
         $this->actcomerid = (string)$this->actcomerid;
         $this->fecultenvio = $rs->fields[88] ;  
         $this->consecterws = $rs->fields[89] ;  
         $this->feclegal = $rs->fields[90] ;  
         $this->emailemp = $rs->fields[91] ;  
         $this->pagweb = $rs->fields[92] ;  
         $this->eterritorial = $rs->fields[93] ;  
         $this->listaprecioid = $rs->fields[94] ;  
         $this->listaprecioid = (string)$this->listaprecioid;
         $this->extlocal = $rs->fields[95] ;  
         $this->extlocal =  str_replace(",", ".", $this->extlocal);
         $this->extlocal = (string)$this->extlocal;
         $this->pep = $rs->fields[96] ;  
         $this->nomempresa = $rs->fields[97] ;  
         $this->fechaexp = $rs->fields[98] ;  
         $this->ocupid = $rs->fields[99] ;  
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_importar_terceros_TNS']['contr_erro'] = 'on';
 $buscadigito = strpos($this->nittri , "-");
$digito      = "";
$vnit        = $this->nittri ;
	
if ($buscadigito === false) {
		
} 
else 
{
	$cadena = trim($this->nittri );
	$digito = substr($cadena,-1);
	$vnit   = substr($cadena,0,-2);
}

 
      $nm_select = "select documento from terceros where documento='".$vnit."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiExiste = array();
      $this->vsiexiste = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiExiste[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsiexiste[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiExiste = false;
          $this->vSiExiste_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $this->vsiexiste = false;
          $this->vsiexiste_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

if(isset($this->vsiexiste[0][0]))
{
	
	$this->estado  = "Importado";
	$this->NM_field_style["estado"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
else
{
	$this->estado  = "";
}
$_SESSION['scriptcase']['grid_importar_terceros_TNS']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['embutida'])
         { 
             $this->xml_registro .= "</" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro .= "</grid_importar_terceros_TNS>\r\n";
         }
         else
         {
             $this->xml_registro .= " />\r\n";
         }
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['embutida'])
         { 
             fwrite($xml_f, $this->xml_registro);
             if ($this->Grava_view)
             {
                fwrite($xml_v, $this->xml_registro);
             }
         }
         $rs->MoveNext();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['embutida'])
      { 
          if (!$this->New_Format)
          {
              $this->xml_registro = "";
          }
          $_SESSION['scriptcase']['export_return'] = $this->xml_registro;
      }
      else
      { 
          fwrite($xml_f, "</root>");
          fclose($xml_f);
          if ($this->Grava_view)
          {
             fwrite($xml_v, "</root>");
             fclose($xml_v);
          }
          if ($this->Tem_xml_res)
          { 
              if (!$this->Ini->sc_export_ajax) {
                  $this->PB_dif = intval ($this->PB_dif / 2);
                  $Mens_bar  = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
                  $Mens_smry = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_smry_titl']);
                  $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
                  $this->pb->addSteps($this->PB_dif);
              }
              require_once($this->Ini->path_aplicacao . "grid_importar_terceros_TNS_res_xml.class.php");
              $this->Res = new grid_importar_terceros_TNS_res_xml();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_res_grid'] = true;
              $this->Res->monta_xml();
          } 
          if (!$this->Ini->sc_export_ajax) {
              $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_btns_export_finished']);
              $this->pb->setProgressbarMessage($Mens_bar);
              $this->pb->addSteps($this->PB_dif);
          }
          if ($this->Xml_password != "" || $this->Tem_xml_res)
          { 
              $str_zip    = "";
              $Parm_pass  = ($this->Xml_password != "") ? " -p" : "";
              $Zip_f      = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
              $Arq_input  = (FALSE !== strpos($this->Xml_f, ' ')) ? " \"" . $this->Xml_f . "\"" :  $this->Xml_f;
              if (is_file($Zip_f)) {
                  unlink($Zip_f);
              }
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  chdir($this->Ini->path_third . "/zip/windows");
                  $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
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
                  $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  chdir($this->Ini->path_third . "/zip/mac/bin");
                  $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
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
              if ($this->Tem_xml_res)
              { 
                  $str_zip   = "";
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_res_file']['xml'];
                  $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  if (!empty($str_zip)) {
                      exec($str_zip);
                  }
                  // ----- ZIP log
                  $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
                  if ($fp)
                  {
                      @fwrite($fp, $str_zip . "\r\n\r\n");
                      @fclose($fp);
                  }
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_res_file']['xml']);
              }
              if ($this->Grava_view)
              {
                  $str_zip    = "";
                  $xml_view_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view;
                  $zip_view_f = str_replace(".zip", "_view.zip", $this->Zip_f);
                  $zip_arq_v  = str_replace(".zip", "_view.zip", $this->Arq_zip);
                  $Zip_f      = (FALSE !== strpos($zip_view_f, ' ')) ? " \"" . $zip_view_f . "\"" :  $zip_view_f;
                  $Arq_input  = (FALSE !== strpos($xml_view_ff, ' ')) ? " \"" . $xml_view_f . "\"" :  $xml_view_f;
                  if (is_file($Zip_f)) {
                      unlink($Zip_f);
                  }
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      chdir($this->Ini->path_third . "/zip/windows");
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
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
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      chdir($this->Ini->path_third . "/zip/mac/bin");
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  if (!empty($str_zip)) {
                      exec($str_zip);
                  }
                  // ----- ZIP log
                  $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
                  if ($fp)
                  {
                      @fwrite($fp, $str_zip . "\r\n\r\n");
                      @fclose($fp);
                  }
                  unlink($Arq_input);
                  $this->Arquivo_view = $zip_arq_v;
                  if ($this->Tem_xml_res)
                  { 
                      $str_zip   = "";
                      $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_res_file']['view'];
                      $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                      if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                      {
                          $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
                      }
                      elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                      {
                          $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                      }
                      elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                      {
                          $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                      }
                      if (!empty($str_zip)) {
                          exec($str_zip);
                      }
                      // ----- ZIP log
                      $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
                      if ($fp)
                      {
                          @fwrite($fp, $str_zip . "\r\n\r\n");
                          @fclose($fp);
                      }
                      unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_res_file']['view']);
                  }
              } 
              else 
              {
                  $this->Arquivo_view = $this->Arq_zip;
              } 
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- nit
   function NM_export_nit()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nit))
         {
             $this->nit = sc_convert_encoding($this->nit, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['nit'])) ? $this->New_label['nit'] : "CODIGO"; 
          }
          else
          {
              $SC_Label = "nit"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->nit) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->nit) . "\"";
         }
   }
   //----- nittri
   function NM_export_nittri()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nittri))
         {
             $this->nittri = sc_convert_encoding($this->nittri, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['nittri'])) ? $this->New_label['nittri'] : "CC/NIT"; 
          }
          else
          {
              $SC_Label = "nittri"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->nittri) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->nittri) . "\"";
         }
   }
   //----- nombre
   function NM_export_nombre()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nombre))
         {
             $this->nombre = sc_convert_encoding($this->nombre, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['nombre'])) ? $this->New_label['nombre'] : "NOMBRE"; 
          }
          else
          {
              $SC_Label = "nombre"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->nombre) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->nombre) . "\"";
         }
   }
   //----- cliente
   function NM_export_cliente()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cliente))
         {
             $this->cliente = sc_convert_encoding($this->cliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['cliente'])) ? $this->New_label['cliente'] : "CLIENTE"; 
          }
          else
          {
              $SC_Label = "cliente"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->cliente) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->cliente) . "\"";
         }
   }
   //----- proveed
   function NM_export_proveed()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->proveed))
         {
             $this->proveed = sc_convert_encoding($this->proveed, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['proveed'])) ? $this->New_label['proveed'] : "PROVEED"; 
          }
          else
          {
              $SC_Label = "proveed"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->proveed) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->proveed) . "\"";
         }
   }
   //----- empleado
   function NM_export_empleado()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->empleado))
         {
             $this->empleado = sc_convert_encoding($this->empleado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['empleado'])) ? $this->New_label['empleado'] : "EMPLEADO"; 
          }
          else
          {
              $SC_Label = "empleado"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->empleado) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->empleado) . "\"";
         }
   }
   //----- otro
   function NM_export_otro()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->otro))
         {
             $this->otro = sc_convert_encoding($this->otro, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['otro'])) ? $this->New_label['otro'] : "OTRO"; 
          }
          else
          {
              $SC_Label = "otro"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->otro) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->otro) . "\"";
         }
   }
   //----- puc_deudores
   function NM_export_puc_deudores()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->puc_deudores))
         {
             $this->puc_deudores = sc_convert_encoding($this->puc_deudores, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['puc_deudores'])) ? $this->New_label['puc_deudores'] : "PUC DEUDORES"; 
          }
          else
          {
              $SC_Label = "puc_deudores"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->puc_deudores) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->puc_deudores) . "\"";
         }
   }
   //----- puc_retcli
   function NM_export_puc_retcli()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->puc_retcli))
         {
             $this->puc_retcli = sc_convert_encoding($this->puc_retcli, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['puc_retcli'])) ? $this->New_label['puc_retcli'] : "PUC RETCLI"; 
          }
          else
          {
              $SC_Label = "puc_retcli"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->puc_retcli) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->puc_retcli) . "\"";
         }
   }
   //----- puc_proveedores
   function NM_export_puc_proveedores()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->puc_proveedores))
         {
             $this->puc_proveedores = sc_convert_encoding($this->puc_proveedores, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['puc_proveedores'])) ? $this->New_label['puc_proveedores'] : "PUC PROVEEDORES"; 
          }
          else
          {
              $SC_Label = "puc_proveedores"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->puc_proveedores) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->puc_proveedores) . "\"";
         }
   }
   //----- puc_retpro
   function NM_export_puc_retpro()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->puc_retpro))
         {
             $this->puc_retpro = sc_convert_encoding($this->puc_retpro, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['puc_retpro'])) ? $this->New_label['puc_retpro'] : "PUC RETPRO"; 
          }
          else
          {
              $SC_Label = "puc_retpro"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->puc_retpro) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->puc_retpro) . "\"";
         }
   }
   //----- inactivo
   function NM_export_inactivo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->inactivo))
         {
             $this->inactivo = sc_convert_encoding($this->inactivo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['inactivo'])) ? $this->New_label['inactivo'] : "INACTIVO"; 
          }
          else
          {
              $SC_Label = "inactivo"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->inactivo) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->inactivo) . "\"";
         }
   }
   //----- estado
   function NM_export_estado()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->estado))
         {
             $this->estado = sc_convert_encoding($this->estado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['estado'])) ? $this->New_label['estado'] : "ESTADO"; 
          }
          else
          {
              $SC_Label = "estado"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->estado) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->estado) . "\"";
         }
   }
   //----- terid
   function NM_export_terid()
   {
             nmgp_Form_Num_Val($this->terid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['terid'])) ? $this->New_label['terid'] : "TERID"; 
          }
          else
          {
              $SC_Label = "terid"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->terid) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->terid) . "\"";
         }
   }
   //----- tipodociden
   function NM_export_tipodociden()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tipodociden))
         {
             $this->tipodociden = sc_convert_encoding($this->tipodociden, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['tipodociden'])) ? $this->New_label['tipodociden'] : "TIPODOCIDEN"; 
          }
          else
          {
              $SC_Label = "tipodociden"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->tipodociden) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->tipodociden) . "\"";
         }
   }
   //----- ciudadrexp
   function NM_export_ciudadrexp()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ciudadrexp))
         {
             $this->ciudadrexp = sc_convert_encoding($this->ciudadrexp, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['ciudadrexp'])) ? $this->New_label['ciudadrexp'] : "CIUDADREXP"; 
          }
          else
          {
              $SC_Label = "ciudadrexp"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->ciudadrexp) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->ciudadrexp) . "\"";
         }
   }
   //----- direcc1
   function NM_export_direcc1()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->direcc1))
         {
             $this->direcc1 = sc_convert_encoding($this->direcc1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['direcc1'])) ? $this->New_label['direcc1'] : "DIRECC1"; 
          }
          else
          {
              $SC_Label = "direcc1"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->direcc1) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->direcc1) . "\"";
         }
   }
   //----- direcc2
   function NM_export_direcc2()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->direcc2))
         {
             $this->direcc2 = sc_convert_encoding($this->direcc2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['direcc2'])) ? $this->New_label['direcc2'] : "DIRECC2"; 
          }
          else
          {
              $SC_Label = "direcc2"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->direcc2) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->direcc2) . "\"";
         }
   }
   //----- zona1
   function NM_export_zona1()
   {
             nmgp_Form_Num_Val($this->zona1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['zona1'])) ? $this->New_label['zona1'] : "ZONA1"; 
          }
          else
          {
              $SC_Label = "zona1"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->zona1) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->zona1) . "\"";
         }
   }
   //----- zona2
   function NM_export_zona2()
   {
             nmgp_Form_Num_Val($this->zona2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['zona2'])) ? $this->New_label['zona2'] : "ZONA2"; 
          }
          else
          {
              $SC_Label = "zona2"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->zona2) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->zona2) . "\"";
         }
   }
   //----- ciudad
   function NM_export_ciudad()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ciudad))
         {
             $this->ciudad = sc_convert_encoding($this->ciudad, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['ciudad'])) ? $this->New_label['ciudad'] : "CIUDAD"; 
          }
          else
          {
              $SC_Label = "ciudad"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->ciudad) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->ciudad) . "\"";
         }
   }
   //----- telef1
   function NM_export_telef1()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->telef1))
         {
             $this->telef1 = sc_convert_encoding($this->telef1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['telef1'])) ? $this->New_label['telef1'] : "TELEF1"; 
          }
          else
          {
              $SC_Label = "telef1"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->telef1) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->telef1) . "\"";
         }
   }
   //----- telef2
   function NM_export_telef2()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->telef2))
         {
             $this->telef2 = sc_convert_encoding($this->telef2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['telef2'])) ? $this->New_label['telef2'] : "TELEF2"; 
          }
          else
          {
              $SC_Label = "telef2"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->telef2) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->telef2) . "\"";
         }
   }
   //----- repleg
   function NM_export_repleg()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->repleg))
         {
             $this->repleg = sc_convert_encoding($this->repleg, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['repleg'])) ? $this->New_label['repleg'] : "REPLEG"; 
          }
          else
          {
              $SC_Label = "repleg"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->repleg) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->repleg) . "\"";
         }
   }
   //----- vended
   function NM_export_vended()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->vended))
         {
             $this->vended = sc_convert_encoding($this->vended, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['vended'])) ? $this->New_label['vended'] : "VENDED"; 
          }
          else
          {
              $SC_Label = "vended"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->vended) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->vended) . "\"";
         }
   }
   //----- cobra
   function NM_export_cobra()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->cobra))
         {
             $this->cobra = sc_convert_encoding($this->cobra, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['cobra'])) ? $this->New_label['cobra'] : "COBRA"; 
          }
          else
          {
              $SC_Label = "cobra"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->cobra) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->cobra) . "\"";
         }
   }
   //----- observ
   function NM_export_observ()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->observ))
         {
             $this->observ = sc_convert_encoding($this->observ, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['observ'])) ? $this->New_label['observ'] : "OBSERV"; 
          }
          else
          {
              $SC_Label = "observ"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->observ) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->observ) . "\"";
         }
   }
   //----- email
   function NM_export_email()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->email))
         {
             $this->email = sc_convert_encoding($this->email, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['email'])) ? $this->New_label['email'] : "EMAIL"; 
          }
          else
          {
              $SC_Label = "email"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->email) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->email) . "\"";
         }
   }
   //----- beeper
   function NM_export_beeper()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->beeper))
         {
             $this->beeper = sc_convert_encoding($this->beeper, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['beeper'])) ? $this->New_label['beeper'] : "BEEPER"; 
          }
          else
          {
              $SC_Label = "beeper"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->beeper) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->beeper) . "\"";
         }
   }
   //----- empbeeper
   function NM_export_empbeeper()
   {
             nmgp_Form_Num_Val($this->empbeeper, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['empbeeper'])) ? $this->New_label['empbeeper'] : "EMPBEEPER"; 
          }
          else
          {
              $SC_Label = "empbeeper"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->empbeeper) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->empbeeper) . "\"";
         }
   }
   //----- celular
   function NM_export_celular()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->celular))
         {
             $this->celular = sc_convert_encoding($this->celular, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['celular'])) ? $this->New_label['celular'] : "CELULAR"; 
          }
          else
          {
              $SC_Label = "celular"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->celular) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->celular) . "\"";
         }
   }
   //----- empcelular
   function NM_export_empcelular()
   {
             nmgp_Form_Num_Val($this->empcelular, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['empcelular'])) ? $this->New_label['empcelular'] : "EMPCELULAR"; 
          }
          else
          {
              $SC_Label = "empcelular"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->empcelular) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->empcelular) . "\"";
         }
   }
   //----- fechcreac
   function NM_export_fechcreac()
   {
             if (substr($this->fechcreac, 10, 1) == "-") 
             { 
                 $this->fechcreac = substr($this->fechcreac, 0, 10) . " " . substr($this->fechcreac, 11);
             } 
             if (substr($this->fechcreac, 13, 1) == ".") 
             { 
                $this->fechcreac = substr($this->fechcreac, 0, 13) . ":" . substr($this->fechcreac, 14, 2) . ":" . substr($this->fechcreac, 17);
             } 
             $conteudo_x =  $this->fechcreac;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechcreac, "YYYY-MM-DD HH:II:SS  ");
                 $this->fechcreac = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->fechcreac))
         {
             $this->fechcreac = sc_convert_encoding($this->fechcreac, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['fechcreac'])) ? $this->New_label['fechcreac'] : "FECHCREAC"; 
          }
          else
          {
              $SC_Label = "fechcreac"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fechcreac) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fechcreac) . "\"";
         }
   }
   //----- fechact
   function NM_export_fechact()
   {
             if (substr($this->fechact, 10, 1) == "-") 
             { 
                 $this->fechact = substr($this->fechact, 0, 10) . " " . substr($this->fechact, 11);
             } 
             if (substr($this->fechact, 13, 1) == ".") 
             { 
                $this->fechact = substr($this->fechact, 0, 13) . ":" . substr($this->fechact, 14, 2) . ":" . substr($this->fechact, 17);
             } 
             $conteudo_x =  $this->fechact;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechact, "YYYY-MM-DD HH:II:SS  ");
                 $this->fechact = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->fechact))
         {
             $this->fechact = sc_convert_encoding($this->fechact, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['fechact'])) ? $this->New_label['fechact'] : "FECHACT"; 
          }
          else
          {
              $SC_Label = "fechact"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fechact) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fechact) . "\"";
         }
   }
   //----- fechultcom
   function NM_export_fechultcom()
   {
             if (substr($this->fechultcom, 10, 1) == "-") 
             { 
                 $this->fechultcom = substr($this->fechultcom, 0, 10) . " " . substr($this->fechultcom, 11);
             } 
             if (substr($this->fechultcom, 13, 1) == ".") 
             { 
                $this->fechultcom = substr($this->fechultcom, 0, 13) . ":" . substr($this->fechultcom, 14, 2) . ":" . substr($this->fechultcom, 17);
             } 
             $conteudo_x =  $this->fechultcom;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechultcom, "YYYY-MM-DD HH:II:SS  ");
                 $this->fechultcom = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->fechultcom))
         {
             $this->fechultcom = sc_convert_encoding($this->fechultcom, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['fechultcom'])) ? $this->New_label['fechultcom'] : "FECHULTCOM"; 
          }
          else
          {
              $SC_Label = "fechultcom"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fechultcom) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fechultcom) . "\"";
         }
   }
   //----- vrultcom
   function NM_export_vrultcom()
   {
             nmgp_Form_Num_Val($this->vrultcom, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['vrultcom'])) ? $this->New_label['vrultcom'] : "VRULTCOM"; 
          }
          else
          {
              $SC_Label = "vrultcom"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->vrultcom) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->vrultcom) . "\"";
         }
   }
   //----- nroultcom
   function NM_export_nroultcom()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nroultcom))
         {
             $this->nroultcom = sc_convert_encoding($this->nroultcom, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['nroultcom'])) ? $this->New_label['nroultcom'] : "NROULTCOM"; 
          }
          else
          {
              $SC_Label = "nroultcom"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->nroultcom) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->nroultcom) . "\"";
         }
   }
   //----- fechultven
   function NM_export_fechultven()
   {
             if (substr($this->fechultven, 10, 1) == "-") 
             { 
                 $this->fechultven = substr($this->fechultven, 0, 10) . " " . substr($this->fechultven, 11);
             } 
             if (substr($this->fechultven, 13, 1) == ".") 
             { 
                $this->fechultven = substr($this->fechultven, 0, 13) . ":" . substr($this->fechultven, 14, 2) . ":" . substr($this->fechultven, 17);
             } 
             $conteudo_x =  $this->fechultven;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechultven, "YYYY-MM-DD HH:II:SS  ");
                 $this->fechultven = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->fechultven))
         {
             $this->fechultven = sc_convert_encoding($this->fechultven, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['fechultven'])) ? $this->New_label['fechultven'] : "FECHULTVEN"; 
          }
          else
          {
              $SC_Label = "fechultven"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fechultven) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fechultven) . "\"";
         }
   }
   //----- vrultven
   function NM_export_vrultven()
   {
             nmgp_Form_Num_Val($this->vrultven, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['vrultven'])) ? $this->New_label['vrultven'] : "VRULTVEN"; 
          }
          else
          {
              $SC_Label = "vrultven"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->vrultven) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->vrultven) . "\"";
         }
   }
   //----- nroultven
   function NM_export_nroultven()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nroultven))
         {
             $this->nroultven = sc_convert_encoding($this->nroultven, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['nroultven'])) ? $this->New_label['nroultven'] : "NROULTVEN"; 
          }
          else
          {
              $SC_Label = "nroultven"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->nroultven) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->nroultven) . "\"";
         }
   }
   //----- clasificaid
   function NM_export_clasificaid()
   {
             nmgp_Form_Num_Val($this->clasificaid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['clasificaid'])) ? $this->New_label['clasificaid'] : "CLASIFICAID"; 
          }
          else
          {
              $SC_Label = "clasificaid"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->clasificaid) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->clasificaid) . "\"";
         }
   }
   //----- maxcredcxp
   function NM_export_maxcredcxp()
   {
             nmgp_Form_Num_Val($this->maxcredcxp, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['maxcredcxp'])) ? $this->New_label['maxcredcxp'] : "MAXCREDCXP"; 
          }
          else
          {
              $SC_Label = "maxcredcxp"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->maxcredcxp) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->maxcredcxp) . "\"";
         }
   }
   //----- maxcredcxc
   function NM_export_maxcredcxc()
   {
             nmgp_Form_Num_Val($this->maxcredcxc, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['maxcredcxc'])) ? $this->New_label['maxcredcxc'] : "MAXCREDCXC"; 
          }
          else
          {
              $SC_Label = "maxcredcxc"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->maxcredcxc) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->maxcredcxc) . "\"";
         }
   }
   //----- porreten
   function NM_export_porreten()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->porreten))
         {
             $this->porreten = sc_convert_encoding($this->porreten, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['porreten'])) ? $this->New_label['porreten'] : "PORRETEN"; 
          }
          else
          {
              $SC_Label = "porreten"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->porreten) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->porreten) . "\"";
         }
   }
   //----- ctacli
   function NM_export_ctacli()
   {
             nmgp_Form_Num_Val($this->ctacli, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['ctacli'])) ? $this->New_label['ctacli'] : "CTACLI"; 
          }
          else
          {
              $SC_Label = "ctacli"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->ctacli) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->ctacli) . "\"";
         }
   }
   //----- ctapro
   function NM_export_ctapro()
   {
             nmgp_Form_Num_Val($this->ctapro, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['ctapro'])) ? $this->New_label['ctapro'] : "CTAPRO"; 
          }
          else
          {
              $SC_Label = "ctapro"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->ctapro) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->ctapro) . "\"";
         }
   }
   //----- ctaretcli
   function NM_export_ctaretcli()
   {
             nmgp_Form_Num_Val($this->ctaretcli, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['ctaretcli'])) ? $this->New_label['ctaretcli'] : "CTARETCLI"; 
          }
          else
          {
              $SC_Label = "ctaretcli"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->ctaretcli) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->ctaretcli) . "\"";
         }
   }
   //----- ctaretpro
   function NM_export_ctaretpro()
   {
             nmgp_Form_Num_Val($this->ctaretpro, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['ctaretpro'])) ? $this->New_label['ctaretpro'] : "CTARETPRO"; 
          }
          else
          {
              $SC_Label = "ctaretpro"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->ctaretpro) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->ctaretpro) . "\"";
         }
   }
   //----- ctaretscli
   function NM_export_ctaretscli()
   {
             nmgp_Form_Num_Val($this->ctaretscli, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['ctaretscli'])) ? $this->New_label['ctaretscli'] : "CTARETSCLI"; 
          }
          else
          {
              $SC_Label = "ctaretscli"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->ctaretscli) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->ctaretscli) . "\"";
         }
   }
   //----- ctaretspro
   function NM_export_ctaretspro()
   {
             nmgp_Form_Num_Val($this->ctaretspro, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['ctaretspro'])) ? $this->New_label['ctaretspro'] : "CTARETSPRO"; 
          }
          else
          {
              $SC_Label = "ctaretspro"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->ctaretspro) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->ctaretspro) . "\"";
         }
   }
   //----- fecnaci
   function NM_export_fecnaci()
   {
             if (substr($this->fecnaci, 10, 1) == "-") 
             { 
                 $this->fecnaci = substr($this->fecnaci, 0, 10) . " " . substr($this->fecnaci, 11);
             } 
             if (substr($this->fecnaci, 13, 1) == ".") 
             { 
                $this->fecnaci = substr($this->fecnaci, 0, 13) . ":" . substr($this->fecnaci, 14, 2) . ":" . substr($this->fecnaci, 17);
             } 
             $conteudo_x =  $this->fecnaci;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecnaci, "YYYY-MM-DD HH:II:SS  ");
                 $this->fecnaci = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->fecnaci))
         {
             $this->fecnaci = sc_convert_encoding($this->fecnaci, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['fecnaci'])) ? $this->New_label['fecnaci'] : "FECNACI"; 
          }
          else
          {
              $SC_Label = "fecnaci"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fecnaci) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fecnaci) . "\"";
         }
   }
   //----- codrecip
   function NM_export_codrecip()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->codrecip))
         {
             $this->codrecip = sc_convert_encoding($this->codrecip, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['codrecip'])) ? $this->New_label['codrecip'] : "CODRECIP"; 
          }
          else
          {
              $SC_Label = "codrecip"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->codrecip) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->codrecip) . "\"";
         }
   }
   //----- porcrecip
   function NM_export_porcrecip()
   {
             nmgp_Form_Num_Val($this->porcrecip, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "4", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['porcrecip'])) ? $this->New_label['porcrecip'] : "PORCRECIP"; 
          }
          else
          {
              $SC_Label = "porcrecip"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->porcrecip) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->porcrecip) . "\"";
         }
   }
   //----- conductor
   function NM_export_conductor()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->conductor))
         {
             $this->conductor = sc_convert_encoding($this->conductor, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['conductor'])) ? $this->New_label['conductor'] : "CONDUCTOR"; 
          }
          else
          {
              $SC_Label = "conductor"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->conductor) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->conductor) . "\"";
         }
   }
   //----- tomador
   function NM_export_tomador()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tomador))
         {
             $this->tomador = sc_convert_encoding($this->tomador, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['tomador'])) ? $this->New_label['tomador'] : "TOMADOR"; 
          }
          else
          {
              $SC_Label = "tomador"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->tomador) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->tomador) . "\"";
         }
   }
   //----- propietario
   function NM_export_propietario()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->propietario))
         {
             $this->propietario = sc_convert_encoding($this->propietario, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['propietario'])) ? $this->New_label['propietario'] : "PROPIETARIO"; 
          }
          else
          {
              $SC_Label = "propietario"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->propietario) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->propietario) . "\"";
         }
   }
   //----- inmpropietario
   function NM_export_inmpropietario()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->inmpropietario))
         {
             $this->inmpropietario = sc_convert_encoding($this->inmpropietario, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['inmpropietario'])) ? $this->New_label['inmpropietario'] : "INMPROPIETARIO"; 
          }
          else
          {
              $SC_Label = "inmpropietario"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->inmpropietario) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->inmpropietario) . "\"";
         }
   }
   //----- inminquilino
   function NM_export_inminquilino()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->inminquilino))
         {
             $this->inminquilino = sc_convert_encoding($this->inminquilino, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['inminquilino'])) ? $this->New_label['inminquilino'] : "INMINQUILINO"; 
          }
          else
          {
              $SC_Label = "inminquilino"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->inminquilino) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->inminquilino) . "\"";
         }
   }
   //----- ciudaneid
   function NM_export_ciudaneid()
   {
             nmgp_Form_Num_Val($this->ciudaneid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['ciudaneid'])) ? $this->New_label['ciudaneid'] : "CIUDANEID"; 
          }
          else
          {
              $SC_Label = "ciudaneid"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->ciudaneid) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->ciudaneid) . "\"";
         }
   }
   //----- ciudadexp
   function NM_export_ciudadexp()
   {
             nmgp_Form_Num_Val($this->ciudadexp, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['ciudadexp'])) ? $this->New_label['ciudadexp'] : "CIUDADEXP"; 
          }
          else
          {
              $SC_Label = "ciudadexp"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->ciudadexp) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->ciudadexp) . "\"";
         }
   }
   //----- fiador
   function NM_export_fiador()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->fiador))
         {
             $this->fiador = sc_convert_encoding($this->fiador, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['fiador'])) ? $this->New_label['fiador'] : "FIADOR"; 
          }
          else
          {
              $SC_Label = "fiador"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fiador) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fiador) . "\"";
         }
   }
   //----- nomregtri
   function NM_export_nomregtri()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nomregtri))
         {
             $this->nomregtri = sc_convert_encoding($this->nomregtri, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['nomregtri'])) ? $this->New_label['nomregtri'] : "NOMREGTRI"; 
          }
          else
          {
              $SC_Label = "nomregtri"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->nomregtri) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->nomregtri) . "\"";
         }
   }
   //----- tarjetapuntos
   function NM_export_tarjetapuntos()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tarjetapuntos))
         {
             $this->tarjetapuntos = sc_convert_encoding($this->tarjetapuntos, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['tarjetapuntos'])) ? $this->New_label['tarjetapuntos'] : "TARJETAPUNTOS"; 
          }
          else
          {
              $SC_Label = "tarjetapuntos"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->tarjetapuntos) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->tarjetapuntos) . "\"";
         }
   }
   //----- porcretven
   function NM_export_porcretven()
   {
             nmgp_Form_Num_Val($this->porcretven, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "4", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['porcretven'])) ? $this->New_label['porcretven'] : "PORCRETVEN"; 
          }
          else
          {
              $SC_Label = "porcretven"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->porcretven) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->porcretven) . "\"";
         }
   }
   //----- nombre1
   function NM_export_nombre1()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nombre1))
         {
             $this->nombre1 = sc_convert_encoding($this->nombre1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['nombre1'])) ? $this->New_label['nombre1'] : "NOMBRE1"; 
          }
          else
          {
              $SC_Label = "nombre1"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->nombre1) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->nombre1) . "\"";
         }
   }
   //----- nombre2
   function NM_export_nombre2()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nombre2))
         {
             $this->nombre2 = sc_convert_encoding($this->nombre2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['nombre2'])) ? $this->New_label['nombre2'] : "NOMBRE2"; 
          }
          else
          {
              $SC_Label = "nombre2"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->nombre2) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->nombre2) . "\"";
         }
   }
   //----- apellido1
   function NM_export_apellido1()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->apellido1))
         {
             $this->apellido1 = sc_convert_encoding($this->apellido1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['apellido1'])) ? $this->New_label['apellido1'] : "APELLIDO1"; 
          }
          else
          {
              $SC_Label = "apellido1"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->apellido1) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->apellido1) . "\"";
         }
   }
   //----- apellido2
   function NM_export_apellido2()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->apellido2))
         {
             $this->apellido2 = sc_convert_encoding($this->apellido2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['apellido2'])) ? $this->New_label['apellido2'] : "APELLIDO2"; 
          }
          else
          {
              $SC_Label = "apellido2"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->apellido2) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->apellido2) . "\"";
         }
   }
   //----- motivodevid
   function NM_export_motivodevid()
   {
             nmgp_Form_Num_Val($this->motivodevid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['motivodevid'])) ? $this->New_label['motivodevid'] : "MOTIVODEVID"; 
          }
          else
          {
              $SC_Label = "motivodevid"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->motivodevid) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->motivodevid) . "\"";
         }
   }
   //----- fechinactivo
   function NM_export_fechinactivo()
   {
             if (substr($this->fechinactivo, 10, 1) == "-") 
             { 
                 $this->fechinactivo = substr($this->fechinactivo, 0, 10) . " " . substr($this->fechinactivo, 11);
             } 
             if (substr($this->fechinactivo, 13, 1) == ".") 
             { 
                $this->fechinactivo = substr($this->fechinactivo, 0, 13) . ":" . substr($this->fechinactivo, 14, 2) . ":" . substr($this->fechinactivo, 17);
             } 
             $conteudo_x =  $this->fechinactivo;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechinactivo, "YYYY-MM-DD HH:II:SS  ");
                 $this->fechinactivo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->fechinactivo))
         {
             $this->fechinactivo = sc_convert_encoding($this->fechinactivo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['fechinactivo'])) ? $this->New_label['fechinactivo'] : "FECHINACTIVO"; 
          }
          else
          {
              $SC_Label = "fechinactivo"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fechinactivo) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fechinactivo) . "\"";
         }
   }
   //----- maxcreddias
   function NM_export_maxcreddias()
   {
             nmgp_Form_Num_Val($this->maxcreddias, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['maxcreddias'])) ? $this->New_label['maxcreddias'] : "MAXCREDDIAS"; 
          }
          else
          {
              $SC_Label = "maxcreddias"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->maxcreddias) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->maxcreddias) . "\"";
         }
   }
   //----- nittriofi
   function NM_export_nittriofi()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nittriofi))
         {
             $this->nittriofi = sc_convert_encoding($this->nittriofi, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['nittriofi'])) ? $this->New_label['nittriofi'] : "NITTRIOFI"; 
          }
          else
          {
              $SC_Label = "nittriofi"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->nittriofi) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->nittriofi) . "\"";
         }
   }
   //----- acteconomicaid
   function NM_export_acteconomicaid()
   {
             nmgp_Form_Num_Val($this->acteconomicaid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['acteconomicaid'])) ? $this->New_label['acteconomicaid'] : "ACTECONOMICAID"; 
          }
          else
          {
              $SC_Label = "acteconomicaid"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->acteconomicaid) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->acteconomicaid) . "\"";
         }
   }
   //----- mesa
   function NM_export_mesa()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->mesa))
         {
             $this->mesa = sc_convert_encoding($this->mesa, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['mesa'])) ? $this->New_label['mesa'] : "MESA"; 
          }
          else
          {
              $SC_Label = "mesa"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->mesa) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->mesa) . "\"";
         }
   }
   //----- mostrador
   function NM_export_mostrador()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->mostrador))
         {
             $this->mostrador = sc_convert_encoding($this->mostrador, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['mostrador'])) ? $this->New_label['mostrador'] : "MOSTRADOR"; 
          }
          else
          {
              $SC_Label = "mostrador"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->mostrador) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->mostrador) . "\"";
         }
   }
   //----- porcrivac
   function NM_export_porcrivac()
   {
             nmgp_Form_Num_Val($this->porcrivac, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "4", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['porcrivac'])) ? $this->New_label['porcrivac'] : "PORCRIVAC"; 
          }
          else
          {
              $SC_Label = "porcrivac"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->porcrivac) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->porcrivac) . "\"";
         }
   }
   //----- porcrivav
   function NM_export_porcrivav()
   {
             nmgp_Form_Num_Val($this->porcrivav, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "4", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['porcrivav'])) ? $this->New_label['porcrivav'] : "PORCRIVAV"; 
          }
          else
          {
              $SC_Label = "porcrivav"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->porcrivav) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->porcrivav) . "\"";
         }
   }
   //----- porcricac
   function NM_export_porcricac()
   {
             nmgp_Form_Num_Val($this->porcricac, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['porcricac'])) ? $this->New_label['porcricac'] : "PORCRICAC"; 
          }
          else
          {
              $SC_Label = "porcricac"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->porcricac) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->porcricac) . "\"";
         }
   }
   //----- porcricav
   function NM_export_porcricav()
   {
             nmgp_Form_Num_Val($this->porcricav, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['porcricav'])) ? $this->New_label['porcricav'] : "PORCRICAV"; 
          }
          else
          {
              $SC_Label = "porcricav"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->porcricav) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->porcricav) . "\"";
         }
   }
   //----- natjuridica
   function NM_export_natjuridica()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->natjuridica))
         {
             $this->natjuridica = sc_convert_encoding($this->natjuridica, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['natjuridica'])) ? $this->New_label['natjuridica'] : "NATJURIDICA"; 
          }
          else
          {
              $SC_Label = "natjuridica"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->natjuridica) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->natjuridica) . "\"";
         }
   }
   //----- barrioinid
   function NM_export_barrioinid()
   {
             nmgp_Form_Num_Val($this->barrioinid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['barrioinid'])) ? $this->New_label['barrioinid'] : "BARRIOINID"; 
          }
          else
          {
              $SC_Label = "barrioinid"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->barrioinid) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->barrioinid) . "\"";
         }
   }
   //----- fecafilia
   function NM_export_fecafilia()
   {
             if (substr($this->fecafilia, 10, 1) == "-") 
             { 
                 $this->fecafilia = substr($this->fecafilia, 0, 10) . " " . substr($this->fecafilia, 11);
             } 
             if (substr($this->fecafilia, 13, 1) == ".") 
             { 
                $this->fecafilia = substr($this->fecafilia, 0, 13) . ":" . substr($this->fecafilia, 14, 2) . ":" . substr($this->fecafilia, 17);
             } 
             $conteudo_x =  $this->fecafilia;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecafilia, "YYYY-MM-DD HH:II:SS  ");
                 $this->fecafilia = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->fecafilia))
         {
             $this->fecafilia = sc_convert_encoding($this->fecafilia, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['fecafilia'])) ? $this->New_label['fecafilia'] : "FECAFILIA"; 
          }
          else
          {
              $SC_Label = "fecafilia"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fecafilia) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fecafilia) . "\"";
         }
   }
   //----- porcrcreev
   function NM_export_porcrcreev()
   {
             nmgp_Form_Num_Val($this->porcrcreev, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "3", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['porcrcreev'])) ? $this->New_label['porcrcreev'] : "PORCRCREEV"; 
          }
          else
          {
              $SC_Label = "porcrcreev"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->porcrcreev) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->porcrcreev) . "\"";
         }
   }
   //----- porcrcreec
   function NM_export_porcrcreec()
   {
             nmgp_Form_Num_Val($this->porcrcreec, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "3", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['porcrcreec'])) ? $this->New_label['porcrcreec'] : "PORCRCREEC"; 
          }
          else
          {
              $SC_Label = "porcrcreec"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->porcrcreec) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->porcrcreec) . "\"";
         }
   }
   //----- tipocreev
   function NM_export_tipocreev()
   {
             nmgp_Form_Num_Val($this->tipocreev, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['tipocreev'])) ? $this->New_label['tipocreev'] : "TIPOCREEV"; 
          }
          else
          {
              $SC_Label = "tipocreev"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->tipocreev) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->tipocreev) . "\"";
         }
   }
   //----- tipocreec
   function NM_export_tipocreec()
   {
             nmgp_Form_Num_Val($this->tipocreec, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['tipocreec'])) ? $this->New_label['tipocreec'] : "TIPOCREEC"; 
          }
          else
          {
              $SC_Label = "tipocreec"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->tipocreec) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->tipocreec) . "\"";
         }
   }
   //----- numcue
   function NM_export_numcue()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->numcue))
         {
             $this->numcue = sc_convert_encoding($this->numcue, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['numcue'])) ? $this->New_label['numcue'] : "NUMCUE"; 
          }
          else
          {
              $SC_Label = "numcue"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->numcue) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->numcue) . "\"";
         }
   }
   //----- tipcue
   function NM_export_tipcue()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->tipcue))
         {
             $this->tipcue = sc_convert_encoding($this->tipcue, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['tipcue'])) ? $this->New_label['tipcue'] : "TIPCUE"; 
          }
          else
          {
              $SC_Label = "tipcue"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->tipcue) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->tipcue) . "\"";
         }
   }
   //----- actcomerid
   function NM_export_actcomerid()
   {
             nmgp_Form_Num_Val($this->actcomerid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['actcomerid'])) ? $this->New_label['actcomerid'] : "ACTCOMERID"; 
          }
          else
          {
              $SC_Label = "actcomerid"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->actcomerid) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->actcomerid) . "\"";
         }
   }
   //----- fecultenvio
   function NM_export_fecultenvio()
   {
             if (substr($this->fecultenvio, 10, 1) == "-") 
             { 
                 $this->fecultenvio = substr($this->fecultenvio, 0, 10) . " " . substr($this->fecultenvio, 11);
             } 
             if (substr($this->fecultenvio, 13, 1) == ".") 
             { 
                $this->fecultenvio = substr($this->fecultenvio, 0, 13) . ":" . substr($this->fecultenvio, 14, 2) . ":" . substr($this->fecultenvio, 17);
             } 
             $conteudo_x =  $this->fecultenvio;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecultenvio, "YYYY-MM-DD HH:II:SS  ");
                 $this->fecultenvio = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->fecultenvio))
         {
             $this->fecultenvio = sc_convert_encoding($this->fecultenvio, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['fecultenvio'])) ? $this->New_label['fecultenvio'] : "FECULTENVIO"; 
          }
          else
          {
              $SC_Label = "fecultenvio"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fecultenvio) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fecultenvio) . "\"";
         }
   }
   //----- consecterws
   function NM_export_consecterws()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->consecterws))
         {
             $this->consecterws = sc_convert_encoding($this->consecterws, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['consecterws'])) ? $this->New_label['consecterws'] : "CONSECTERWS"; 
          }
          else
          {
              $SC_Label = "consecterws"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->consecterws) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->consecterws) . "\"";
         }
   }
   //----- feclegal
   function NM_export_feclegal()
   {
             if (substr($this->feclegal, 10, 1) == "-") 
             { 
                 $this->feclegal = substr($this->feclegal, 0, 10) . " " . substr($this->feclegal, 11);
             } 
             if (substr($this->feclegal, 13, 1) == ".") 
             { 
                $this->feclegal = substr($this->feclegal, 0, 13) . ":" . substr($this->feclegal, 14, 2) . ":" . substr($this->feclegal, 17);
             } 
             $conteudo_x =  $this->feclegal;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->feclegal, "YYYY-MM-DD HH:II:SS  ");
                 $this->feclegal = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->feclegal))
         {
             $this->feclegal = sc_convert_encoding($this->feclegal, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['feclegal'])) ? $this->New_label['feclegal'] : "FECLEGAL"; 
          }
          else
          {
              $SC_Label = "feclegal"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->feclegal) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->feclegal) . "\"";
         }
   }
   //----- emailemp
   function NM_export_emailemp()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->emailemp))
         {
             $this->emailemp = sc_convert_encoding($this->emailemp, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['emailemp'])) ? $this->New_label['emailemp'] : "EMAILEMP"; 
          }
          else
          {
              $SC_Label = "emailemp"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->emailemp) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->emailemp) . "\"";
         }
   }
   //----- pagweb
   function NM_export_pagweb()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->pagweb))
         {
             $this->pagweb = sc_convert_encoding($this->pagweb, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['pagweb'])) ? $this->New_label['pagweb'] : "PAGWEB"; 
          }
          else
          {
              $SC_Label = "pagweb"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->pagweb) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->pagweb) . "\"";
         }
   }
   //----- eterritorial
   function NM_export_eterritorial()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->eterritorial))
         {
             $this->eterritorial = sc_convert_encoding($this->eterritorial, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['eterritorial'])) ? $this->New_label['eterritorial'] : "ETERRITORIAL"; 
          }
          else
          {
              $SC_Label = "eterritorial"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->eterritorial) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->eterritorial) . "\"";
         }
   }
   //----- listaprecioid
   function NM_export_listaprecioid()
   {
             nmgp_Form_Num_Val($this->listaprecioid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['listaprecioid'])) ? $this->New_label['listaprecioid'] : "LISTAPRECIOID"; 
          }
          else
          {
              $SC_Label = "listaprecioid"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->listaprecioid) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->listaprecioid) . "\"";
         }
   }
   //----- extlocal
   function NM_export_extlocal()
   {
             nmgp_Form_Num_Val($this->extlocal, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['extlocal'])) ? $this->New_label['extlocal'] : "EXTLOCAL"; 
          }
          else
          {
              $SC_Label = "extlocal"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->extlocal) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->extlocal) . "\"";
         }
   }
   //----- pep
   function NM_export_pep()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->pep))
         {
             $this->pep = sc_convert_encoding($this->pep, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['pep'])) ? $this->New_label['pep'] : "PEP"; 
          }
          else
          {
              $SC_Label = "pep"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->pep) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->pep) . "\"";
         }
   }
   //----- nomempresa
   function NM_export_nomempresa()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->nomempresa))
         {
             $this->nomempresa = sc_convert_encoding($this->nomempresa, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['nomempresa'])) ? $this->New_label['nomempresa'] : "NOMEMPRESA"; 
          }
          else
          {
              $SC_Label = "nomempresa"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->nomempresa) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->nomempresa) . "\"";
         }
   }
   //----- fechaexp
   function NM_export_fechaexp()
   {
             $conteudo_x =  $this->fechaexp;
             nm_conv_limpa_dado($conteudo_x, "");
             if (is_numeric($conteudo_x) && $conteudo_x > 0) 
             { 
                 $this->nm_data->SetaData($this->fechaexp, "");
                 $this->fechaexp = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->fechaexp))
         {
             $this->fechaexp = sc_convert_encoding($this->fechaexp, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['fechaexp'])) ? $this->New_label['fechaexp'] : "FECHAEXP"; 
          }
          else
          {
              $SC_Label = "fechaexp"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fechaexp) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fechaexp) . "\"";
         }
   }
   //----- ocupid
   function NM_export_ocupid()
   {
             nmgp_Form_Num_Val($this->ocupid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->ocupid))
         {
             $this->ocupid = sc_convert_encoding($this->ocupid, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['ocupid'])) ? $this->New_label['ocupid'] : "OCUPID"; 
          }
          else
          {
              $SC_Label = "ocupid"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->ocupid) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->ocupid) . "\"";
         }
   }

   //----- 
   function trata_dados($conteudo)
   {
      $str_temp =  $conteudo;
      $str_temp =  str_replace("<br />", "",  $str_temp);
      $str_temp =  str_replace("&", "&amp;",  $str_temp);
      $str_temp =  str_replace("<", "&lt;",   $str_temp);
      $str_temp =  str_replace(">", "&gt;",   $str_temp);
      $str_temp =  str_replace("'", "&apos;", $str_temp);
      $str_temp =  str_replace('"', "&quot;",  $str_temp);
      $str_temp =  str_replace('(', "_",  $str_temp);
      $str_temp =  str_replace(')', "",  $str_temp);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS'][$path_doc_md5][1] = $this->Tit_doc;
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
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Importar Terceros de TNS :: XML</TITLE>
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
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
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
<form name="Fdown" method="get" action="grid_importar_terceros_TNS_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_importar_terceros_TNS"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['xml_return']); ?>"> 
</FORM> 
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
}

?>
