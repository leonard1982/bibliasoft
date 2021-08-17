<?php
//
class form_hacerpagos_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $formatado = false;
   var $use_100perc_fields = false;
   var $classes_100perc_fields = array();
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'            => '',
                                'param'             => array(),
                                'autoComp'          => '',
                                'rsSize'            => '',
                                'msgDisplay'        => '',
                                'errList'           => array(),
                                'fldList'           => array(),
                                'varList'           => array(),
                                'focus'             => '',
                                'navStatus'         => array(),
                                'navSummary'        => array(),
                                'navPage'           => array(),
                                'redir'             => array(),
                                'blockDisplay'      => array(),
                                'fieldDisplay'      => array(),
                                'fieldLabel'        => array(),
                                'readOnly'          => array(),
                                'btnVars'           => array(),
                                'ajaxAlert'         => array(),
                                'ajaxMessage'       => array(),
                                'ajaxJavascript'    => array(),
                                'buttonDisplay'     => array(),
                                'buttonDisplayVert' => array(),
                                'calendarReload'    => false,
                                'quickSearchRes'    => false,
                                'displayMsg'        => false,
                                'displayMsgTxt'     => '',
                                'dyn_search'        => array(),
                                'empty_filter'      => '',
                                'event_field'       => '',
                                'fieldsWithErrors'  => array(),
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $idpago;
   var $numpago;
   var $client;
   var $client_1;
   var $fecpago;
   var $montocan;
   var $ret;
   var $descuent;
   var $docapagar;
   var $iddocapagar;
   var $saldodocumento;
   var $conc;
   var $obs;
   var $asent;
   var $asent_1;
   var $porc_ret;
   var $porc_ret_1;
   var $val_ica;
   var $porc_ica;
   var $porc_ica_1;
   var $porc_reteiva;
   var $val_reteiva;
   var $banco;
   var $banco_1;
   var $usuario;
   var $id_concepto;
   var $id_concepto_1;
   var $ncuenta_tercero;
   var $creado;
   var $creado_hora;
   var $actualizado;
   var $actualizado_hora;
   var $cod_cuenta;
   var $detallepagos;
   var $titulo;
   var $total_cuenta;
   var $valor_base;
   var $valor_iva;
   var $valpagar;
   var $archivos;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $sc_insert_on;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
   var $record_insert_ok = false;
   var $record_delete_ok = false;
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['archivos']))
          {
              $this->archivos = $this->NM_ajax_info['param']['archivos'];
          }
          if (isset($this->NM_ajax_info['param']['asent']))
          {
              $this->asent = $this->NM_ajax_info['param']['asent'];
          }
          if (isset($this->NM_ajax_info['param']['banco']))
          {
              $this->banco = $this->NM_ajax_info['param']['banco'];
          }
          if (isset($this->NM_ajax_info['param']['client']))
          {
              $this->client = $this->NM_ajax_info['param']['client'];
          }
          if (isset($this->NM_ajax_info['param']['cod_cuenta']))
          {
              $this->cod_cuenta = $this->NM_ajax_info['param']['cod_cuenta'];
          }
          if (isset($this->NM_ajax_info['param']['conc']))
          {
              $this->conc = $this->NM_ajax_info['param']['conc'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['descuent']))
          {
              $this->descuent = $this->NM_ajax_info['param']['descuent'];
          }
          if (isset($this->NM_ajax_info['param']['detallepagos']))
          {
              $this->detallepagos = $this->NM_ajax_info['param']['detallepagos'];
          }
          if (isset($this->NM_ajax_info['param']['docapagar']))
          {
              $this->docapagar = $this->NM_ajax_info['param']['docapagar'];
          }
          if (isset($this->NM_ajax_info['param']['fecpago']))
          {
              $this->fecpago = $this->NM_ajax_info['param']['fecpago'];
          }
          if (isset($this->NM_ajax_info['param']['id_concepto']))
          {
              $this->id_concepto = $this->NM_ajax_info['param']['id_concepto'];
          }
          if (isset($this->NM_ajax_info['param']['iddocapagar']))
          {
              $this->iddocapagar = $this->NM_ajax_info['param']['iddocapagar'];
          }
          if (isset($this->NM_ajax_info['param']['idpago']))
          {
              $this->idpago = $this->NM_ajax_info['param']['idpago'];
          }
          if (isset($this->NM_ajax_info['param']['montocan']))
          {
              $this->montocan = $this->NM_ajax_info['param']['montocan'];
          }
          if (isset($this->NM_ajax_info['param']['ncuenta_tercero']))
          {
              $this->ncuenta_tercero = $this->NM_ajax_info['param']['ncuenta_tercero'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_fields']))
          {
              $this->nmgp_refresh_fields = $this->NM_ajax_info['param']['nmgp_refresh_fields'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['numpago']))
          {
              $this->numpago = $this->NM_ajax_info['param']['numpago'];
          }
          if (isset($this->NM_ajax_info['param']['obs']))
          {
              $this->obs = $this->NM_ajax_info['param']['obs'];
          }
          if (isset($this->NM_ajax_info['param']['porc_ica']))
          {
              $this->porc_ica = $this->NM_ajax_info['param']['porc_ica'];
          }
          if (isset($this->NM_ajax_info['param']['porc_ret']))
          {
              $this->porc_ret = $this->NM_ajax_info['param']['porc_ret'];
          }
          if (isset($this->NM_ajax_info['param']['porc_reteiva']))
          {
              $this->porc_reteiva = $this->NM_ajax_info['param']['porc_reteiva'];
          }
          if (isset($this->NM_ajax_info['param']['ret']))
          {
              $this->ret = $this->NM_ajax_info['param']['ret'];
          }
          if (isset($this->NM_ajax_info['param']['saldodocumento']))
          {
              $this->saldodocumento = $this->NM_ajax_info['param']['saldodocumento'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['titulo']))
          {
              $this->titulo = $this->NM_ajax_info['param']['titulo'];
          }
          if (isset($this->NM_ajax_info['param']['total_cuenta']))
          {
              $this->total_cuenta = $this->NM_ajax_info['param']['total_cuenta'];
          }
          if (isset($this->NM_ajax_info['param']['val_ica']))
          {
              $this->val_ica = $this->NM_ajax_info['param']['val_ica'];
          }
          if (isset($this->NM_ajax_info['param']['val_reteiva']))
          {
              $this->val_reteiva = $this->NM_ajax_info['param']['val_reteiva'];
          }
          if (isset($this->NM_ajax_info['param']['valor_base']))
          {
              $this->valor_base = $this->NM_ajax_info['param']['valor_base'];
          }
          if (isset($this->NM_ajax_info['param']['valor_iva']))
          {
              $this->valor_iva = $this->NM_ajax_info['param']['valor_iva'];
          }
          if (isset($this->NM_ajax_info['param']['valpagar']))
          {
              $this->valpagar = $this->NM_ajax_info['param']['valpagar'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($this->par_comegreso) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_comegreso'] = $this->par_comegreso;
      }
      if (isset($this->gDesc) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gDesc'] = $this->gDesc;
      }
      if (isset($this->gCanc) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gCanc'] = $this->gCanc;
      }
      if (isset($this->gmensaje_ce) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gmensaje_ce'] = $this->gmensaje_ce;
      }
      if (isset($this->gSw) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gSw'] = $this->gSw;
      }
      if (isset($this->gnumeroce) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gnumeroce'] = $this->gnumeroce;
      }
      if (isset($this->gidtercero) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gidtercero'] = $this->gidtercero;
      }
      if (isset($this->gsiescajero) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gsiescajero'] = $this->gsiescajero;
      }
      if (isset($this->gidbanco) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gidbanco'] = $this->gidbanco;
      }
      if (isset($_POST["par_comegreso"]) && isset($this->par_comegreso)) 
      {
          $_SESSION['par_comegreso'] = $this->par_comegreso;
      }
      if (isset($_POST["gDesc"]) && isset($this->gDesc)) 
      {
          $_SESSION['gDesc'] = $this->gDesc;
      }
      if (!isset($_POST["gDesc"]) && isset($_POST["gdesc"])) 
      {
          $_SESSION['gDesc'] = $_POST["gdesc"];
      }
      if (isset($_POST["gCanc"]) && isset($this->gCanc)) 
      {
          $_SESSION['gCanc'] = $this->gCanc;
      }
      if (!isset($_POST["gCanc"]) && isset($_POST["gcanc"])) 
      {
          $_SESSION['gCanc'] = $_POST["gcanc"];
      }
      if (isset($_POST["gmensaje_ce"]) && isset($this->gmensaje_ce)) 
      {
          $_SESSION['gmensaje_ce'] = $this->gmensaje_ce;
      }
      if (isset($_POST["gSw"]) && isset($this->gSw)) 
      {
          $_SESSION['gSw'] = $this->gSw;
      }
      if (!isset($_POST["gSw"]) && isset($_POST["gsw"])) 
      {
          $_SESSION['gSw'] = $_POST["gsw"];
      }
      if (isset($_POST["gnumeroce"]) && isset($this->gnumeroce)) 
      {
          $_SESSION['gnumeroce'] = $this->gnumeroce;
      }
      if (isset($_POST["gidtercero"]) && isset($this->gidtercero)) 
      {
          $_SESSION['gidtercero'] = $this->gidtercero;
      }
      if (isset($_POST["gsiescajero"]) && isset($this->gsiescajero)) 
      {
          $_SESSION['gsiescajero'] = $this->gsiescajero;
      }
      if (isset($_POST["gidbanco"]) && isset($this->gidbanco)) 
      {
          $_SESSION['gidbanco'] = $this->gidbanco;
      }
      if (isset($_GET["par_comegreso"]) && isset($this->par_comegreso)) 
      {
          $_SESSION['par_comegreso'] = $this->par_comegreso;
      }
      if (isset($_GET["gDesc"]) && isset($this->gDesc)) 
      {
          $_SESSION['gDesc'] = $this->gDesc;
      }
      if (!isset($_GET["gDesc"]) && isset($_GET["gdesc"])) 
      {
          $_SESSION['gDesc'] = $_GET["gdesc"];
      }
      if (isset($_GET["gCanc"]) && isset($this->gCanc)) 
      {
          $_SESSION['gCanc'] = $this->gCanc;
      }
      if (!isset($_GET["gCanc"]) && isset($_GET["gcanc"])) 
      {
          $_SESSION['gCanc'] = $_GET["gcanc"];
      }
      if (isset($_GET["gmensaje_ce"]) && isset($this->gmensaje_ce)) 
      {
          $_SESSION['gmensaje_ce'] = $this->gmensaje_ce;
      }
      if (isset($_GET["gSw"]) && isset($this->gSw)) 
      {
          $_SESSION['gSw'] = $this->gSw;
      }
      if (!isset($_GET["gSw"]) && isset($_GET["gsw"])) 
      {
          $_SESSION['gSw'] = $_GET["gsw"];
      }
      if (isset($_GET["gnumeroce"]) && isset($this->gnumeroce)) 
      {
          $_SESSION['gnumeroce'] = $this->gnumeroce;
      }
      if (isset($_GET["gidtercero"]) && isset($this->gidtercero)) 
      {
          $_SESSION['gidtercero'] = $this->gidtercero;
      }
      if (isset($_GET["gsiescajero"]) && isset($this->gsiescajero)) 
      {
          $_SESSION['gsiescajero'] = $this->gsiescajero;
      }
      if (isset($_GET["gidbanco"]) && isset($this->gidbanco)) 
      {
          $_SESSION['gidbanco'] = $this->gidbanco;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_hacerpagos']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_hacerpagos']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_hacerpagos']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_hacerpagos($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->par_comegreso)) 
          {
              $_SESSION['par_comegreso'] = $this->par_comegreso;
          }
          if (!isset($this->gDesc) && isset($this->gdesc)) 
          {
              $this->gDesc = $this->gdesc;
          }
          if (isset($this->gDesc)) 
          {
              $_SESSION['gDesc'] = $this->gDesc;
          }
          if (!isset($this->gCanc) && isset($this->gcanc)) 
          {
              $this->gCanc = $this->gcanc;
          }
          if (isset($this->gCanc)) 
          {
              $_SESSION['gCanc'] = $this->gCanc;
          }
          if (isset($this->gmensaje_ce)) 
          {
              $_SESSION['gmensaje_ce'] = $this->gmensaje_ce;
          }
          if (!isset($this->gSw) && isset($this->gsw)) 
          {
              $this->gSw = $this->gsw;
          }
          if (isset($this->gSw)) 
          {
              $_SESSION['gSw'] = $this->gSw;
          }
          if (isset($this->gnumeroce)) 
          {
              $_SESSION['gnumeroce'] = $this->gnumeroce;
          }
          if (isset($this->gidtercero)) 
          {
              $_SESSION['gidtercero'] = $this->gidtercero;
          }
          if (isset($this->gsiescajero)) 
          {
              $_SESSION['gsiescajero'] = $this->gsiescajero;
          }
          if (isset($this->gidbanco)) 
          {
              $_SESSION['gidbanco'] = $this->gidbanco;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_hacerpagos']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_hacerpagos']['total']);
          }
          if (!isset($_SESSION['sc_session'][$script_case_init]['form_hacerpagos']['total']))
          {
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_hacerpagos']['form_detallepagos_terceros_script_case_init'] ]['form_detallepagos_terceros']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_hacerpagos']['form_detallepagos_terceros_script_case_init'] ]['form_detallepagos_terceros']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_hacerpagos']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_hacerpagos']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->par_comegreso)) 
          {
              $_SESSION['par_comegreso'] = $this->par_comegreso;
          }
          if (!isset($this->gDesc) && isset($this->gdesc)) 
          {
              $this->gDesc = $this->gdesc;
          }
          if (isset($this->gDesc)) 
          {
              $_SESSION['gDesc'] = $this->gDesc;
          }
          if (!isset($this->gCanc) && isset($this->gcanc)) 
          {
              $this->gCanc = $this->gcanc;
          }
          if (isset($this->gCanc)) 
          {
              $_SESSION['gCanc'] = $this->gCanc;
          }
          if (isset($this->gmensaje_ce)) 
          {
              $_SESSION['gmensaje_ce'] = $this->gmensaje_ce;
          }
          if (!isset($this->gSw) && isset($this->gsw)) 
          {
              $this->gSw = $this->gsw;
          }
          if (isset($this->gSw)) 
          {
              $_SESSION['gSw'] = $this->gSw;
          }
          if (isset($this->gnumeroce)) 
          {
              $_SESSION['gnumeroce'] = $this->gnumeroce;
          }
          if (isset($this->gidtercero)) 
          {
              $_SESSION['gidtercero'] = $this->gidtercero;
          }
          if (isset($this->gsiescajero)) 
          {
              $_SESSION['gsiescajero'] = $this->gsiescajero;
          }
          if (isset($this->gidbanco)) 
          {
              $_SESSION['gidbanco'] = $this->gidbanco;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_hacerpagos']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_hacerpagos']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_hacerpagos']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_hacerpagos']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_hacerpagos']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_hacerpagos']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_hacerpagos']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_hacerpagos']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_hacerpagos']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_hacerpagos']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_hacerpagos_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['initialize'])
          {
              $_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gnumeroce)) {$this->sc_temp_gnumeroce = (isset($_SESSION['gnumeroce'])) ? $_SESSION['gnumeroce'] : "";}
if (!isset($this->sc_temp_gmensaje_ce)) {$this->sc_temp_gmensaje_ce = (isset($_SESSION['gmensaje_ce'])) ? $_SESSION['gmensaje_ce'] : "";}
  $this->sc_temp_gmensaje_ce = '';
$this->sc_temp_gnumeroce   = '';
if (isset($this->sc_temp_gmensaje_ce)) { $_SESSION['gmensaje_ce'] = $this->sc_temp_gmensaje_ce;}
if (isset($this->sc_temp_gnumeroce)) { $_SESSION['gnumeroce'] = $this->sc_temp_gnumeroce;}
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_hacerpagos']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_hacerpagos']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_hacerpagos'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_hacerpagos']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_hacerpagos']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_hacerpagos') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_hacerpagos']['label'] = "Pagos a terceros";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_hacerpagos")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $_SESSION['scriptcase']['css_form_help'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form.css";
      $_SESSION['scriptcase']['css_form_help_dir'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->Db = $this->Ini->Db; 
      $this->Ini->str_google_fonts = isset($str_google_fonts)?$str_google_fonts:'';
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok       = "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err      = "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status          = "scFormInputError";
      $this->Ini->Css_status_pwd_box  = "scFormInputErrorPwdBox";
      $this->Ini->Css_status_pwd_text = "scFormInputErrorPwdText";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);
      $this->Ini->form_table_width     = isset($str_form_table_width) && '' != trim($str_form_table_width) ? $str_form_table_width : '';

        $this->classes_100perc_fields['table'] = '';
        $this->classes_100perc_fields['input'] = '';
        $this->classes_100perc_fields['span_input'] = '';
        $this->classes_100perc_fields['span_select'] = '';
        $this->classes_100perc_fields['style_category'] = '';
        $this->classes_100perc_fields['keep_field_size'] = true;



      $_SESSION['scriptcase']['error_icon']['form_hacerpagos']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Lemon__NM__nm_scriptcase9_Lemon_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_hacerpagos'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_hacerpagos']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_hacerpagos'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_hacerpagos'];

              $this->nmgp_botoes['update']     = $tmpDashboardButtons['form_update']    ? 'on' : 'off';
              $this->nmgp_botoes['new']        = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['insert']     = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['delete']     = $tmpDashboardButtons['form_delete']    ? 'on' : 'off';
              $this->nmgp_botoes['copy']       = $tmpDashboardButtons['form_copy']      ? 'on' : 'off';
              $this->nmgp_botoes['first']      = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['back']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['last']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['forward']    = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['navpage']    = $tmpDashboardButtons['form_navpage']   ? 'on' : 'off';
              $this->nmgp_botoes['goto']       = $tmpDashboardButtons['form_goto']      ? 'on' : 'off';
              $this->nmgp_botoes['qtline']     = $tmpDashboardButtons['form_lineqty']   ? 'on' : 'off';
              $this->nmgp_botoes['summary']    = $tmpDashboardButtons['form_summary']   ? 'on' : 'off';
              $this->nmgp_botoes['qsearch']    = $tmpDashboardButtons['form_qsearch']   ? 'on' : 'off';
              $this->nmgp_botoes['dynsearch']  = $tmpDashboardButtons['form_dynsearch'] ? 'on' : 'off';
              $this->nmgp_botoes['reload']     = $tmpDashboardButtons['form_reload']    ? 'on' : 'off';
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['dados_form'];
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['asent'] != "null"){$this->asent = $this->nmgp_dados_form['asent'];} 
          if (!isset($this->usuario)){$this->usuario = $this->nmgp_dados_form['usuario'];} 
          if (!isset($this->creado)){$this->creado = $this->nmgp_dados_form['creado'];} 
          if (!isset($this->actualizado)){$this->actualizado = $this->nmgp_dados_form['actualizado'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_hacerpagos", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'form_hacerpagos/form_hacerpagos_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_hacerpagos_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_hacerpagos_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_hacerpagos_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_hacerpagos/form_hacerpagos_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_hacerpagos_erro.class.php"); 
      }
      $this->Erro      = new form_hacerpagos_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['opcao']))
         { 
             if ($this->idpago != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_hacerpagos']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      if ($this->nmgp_opcao == "excluir")
      {
          $GLOBALS['script_case_init'] = $this->Ini->sc_page;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['form_detallepagos_terceros_script_case_init'] ]['form_detallepagos_terceros']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['form_detallepagos_terceros_script_case_init'] ]['form_detallepagos_terceros']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['form_detallepagos_terceros_script_case_init'] ]['form_detallepagos_terceros']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['form_detallepagos_terceros_script_case_init'] ]['form_detallepagos_terceros']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_detallepagos_terceros') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_detallepagos_terceros') . "/form_detallepagos_terceros_apl.php");
          $this->form_detallepagos_terceros = new form_detallepagos_terceros_apl;
      }
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['form_hacerpagos']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['form_hacerpagos']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$orig_img);
            echo $orig_img . '_@@NM@@_';

            if(file_exists($out1_img_cache)){
                echo $out1_img_cache;
                exit;
            }
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            $sc_obj_img = new nm_trata_img($_SERVER['DOCUMENT_ROOT'].$out1_img_cache, true);

            if(!empty($img_width) && !empty($img_height)){
                $sc_obj_img->setWidth($img_width);
                $sc_obj_img->setHeight($img_height);
            }
                $sc_obj_img->setManterAspecto(true);
            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
      if (isset($this->idpago)) { $this->nm_limpa_alfa($this->idpago); }
      if (isset($this->numpago)) { $this->nm_limpa_alfa($this->numpago); }
      if (isset($this->client)) { $this->nm_limpa_alfa($this->client); }
      if (isset($this->montocan)) { $this->nm_limpa_alfa($this->montocan); }
      if (isset($this->ret)) { $this->nm_limpa_alfa($this->ret); }
      if (isset($this->descuent)) { $this->nm_limpa_alfa($this->descuent); }
      if (isset($this->docapagar)) { $this->nm_limpa_alfa($this->docapagar); }
      if (isset($this->iddocapagar)) { $this->nm_limpa_alfa($this->iddocapagar); }
      if (isset($this->saldodocumento)) { $this->nm_limpa_alfa($this->saldodocumento); }
      if (isset($this->conc)) { $this->nm_limpa_alfa($this->conc); }
      if (isset($this->obs)) { $this->nm_limpa_alfa($this->obs); }
      if (isset($this->asent)) { $this->nm_limpa_alfa($this->asent); }
      if (isset($this->porc_ret)) { $this->nm_limpa_alfa($this->porc_ret); }
      if (isset($this->val_ica)) { $this->nm_limpa_alfa($this->val_ica); }
      if (isset($this->porc_ica)) { $this->nm_limpa_alfa($this->porc_ica); }
      if (isset($this->porc_reteiva)) { $this->nm_limpa_alfa($this->porc_reteiva); }
      if (isset($this->val_reteiva)) { $this->nm_limpa_alfa($this->val_reteiva); }
      if (isset($this->banco)) { $this->nm_limpa_alfa($this->banco); }
      if (isset($this->id_concepto)) { $this->nm_limpa_alfa($this->id_concepto); }
      if (isset($this->ncuenta_tercero)) { $this->nm_limpa_alfa($this->ncuenta_tercero); }
      if (isset($this->cod_cuenta)) { $this->nm_limpa_alfa($this->cod_cuenta); }
      if (isset($this->detallepagos)) { $this->nm_limpa_alfa($this->detallepagos); }
      if (isset($this->archivos)) { $this->nm_limpa_alfa($this->archivos); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- numpago
      $this->field_config['numpago']               = array();
      $this->field_config['numpago']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['numpago']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['numpago']['symbol_dec'] = '';
      $this->field_config['numpago']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['numpago']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fecpago
      $this->field_config['fecpago']                 = array();
      $this->field_config['fecpago']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fecpago']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecpago']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fecpago');
      //-- valor_base
      $this->field_config['valor_base']               = array();
      $this->field_config['valor_base']['symbol_grp'] = ',';
      $this->field_config['valor_base']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valor_base']['symbol_dec'] = '.';
      $this->field_config['valor_base']['symbol_mon'] = '$';
      $this->field_config['valor_base']['format_pos'] = '3';
      $this->field_config['valor_base']['format_neg'] = '2';
      //-- valor_iva
      $this->field_config['valor_iva']               = array();
      $this->field_config['valor_iva']['symbol_grp'] = ',';
      $this->field_config['valor_iva']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valor_iva']['symbol_dec'] = '.';
      $this->field_config['valor_iva']['symbol_mon'] = '$';
      $this->field_config['valor_iva']['format_pos'] = '3';
      $this->field_config['valor_iva']['format_neg'] = '2';
      //-- montocan
      $this->field_config['montocan']               = array();
      $this->field_config['montocan']['symbol_grp'] = ',';
      $this->field_config['montocan']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['montocan']['symbol_dec'] = '.';
      $this->field_config['montocan']['symbol_mon'] = '$';
      $this->field_config['montocan']['format_pos'] = '3';
      $this->field_config['montocan']['format_neg'] = '4';
      //-- saldodocumento
      $this->field_config['saldodocumento']               = array();
      $this->field_config['saldodocumento']['symbol_grp'] = ',';
      $this->field_config['saldodocumento']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['saldodocumento']['symbol_dec'] = '.';
      $this->field_config['saldodocumento']['symbol_mon'] = '$';
      $this->field_config['saldodocumento']['format_pos'] = '3';
      $this->field_config['saldodocumento']['format_neg'] = '4';
      //-- valpagar
      $this->field_config['valpagar']               = array();
      $this->field_config['valpagar']['symbol_grp'] = ',';
      $this->field_config['valpagar']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valpagar']['symbol_dec'] = '.';
      $this->field_config['valpagar']['symbol_mon'] = '$';
      $this->field_config['valpagar']['format_pos'] = '3';
      $this->field_config['valpagar']['format_neg'] = '2';
      //-- ret
      $this->field_config['ret']               = array();
      $this->field_config['ret']['symbol_grp'] = ',';
      $this->field_config['ret']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['ret']['symbol_dec'] = '.';
      $this->field_config['ret']['symbol_mon'] = '$';
      $this->field_config['ret']['format_pos'] = '3';
      $this->field_config['ret']['format_neg'] = '4';
      //-- val_ica
      $this->field_config['val_ica']               = array();
      $this->field_config['val_ica']['symbol_grp'] = ',';
      $this->field_config['val_ica']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['val_ica']['symbol_dec'] = '.';
      $this->field_config['val_ica']['symbol_mon'] = '$';
      $this->field_config['val_ica']['format_pos'] = '3';
      $this->field_config['val_ica']['format_neg'] = '4';
      //-- porc_reteiva
      $this->field_config['porc_reteiva']               = array();
      $this->field_config['porc_reteiva']['symbol_grp'] = ',';
      $this->field_config['porc_reteiva']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['porc_reteiva']['symbol_dec'] = '.';
      $this->field_config['porc_reteiva']['symbol_neg'] = '-';
      $this->field_config['porc_reteiva']['format_neg'] = '2';
      //-- val_reteiva
      $this->field_config['val_reteiva']               = array();
      $this->field_config['val_reteiva']['symbol_grp'] = ',';
      $this->field_config['val_reteiva']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['val_reteiva']['symbol_dec'] = '.';
      $this->field_config['val_reteiva']['symbol_mon'] = '$';
      $this->field_config['val_reteiva']['format_pos'] = '3';
      $this->field_config['val_reteiva']['format_neg'] = '4';
      //-- descuent
      $this->field_config['descuent']               = array();
      $this->field_config['descuent']['symbol_grp'] = ',';
      $this->field_config['descuent']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['descuent']['symbol_dec'] = '.';
      $this->field_config['descuent']['symbol_mon'] = '$';
      $this->field_config['descuent']['format_pos'] = '3';
      $this->field_config['descuent']['format_neg'] = '4';
      //-- total_cuenta
      $this->field_config['total_cuenta']               = array();
      $this->field_config['total_cuenta']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['total_cuenta']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['total_cuenta']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['total_cuenta']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['total_cuenta']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['total_cuenta']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- idpago
      $this->field_config['idpago']               = array();
      $this->field_config['idpago']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idpago']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idpago']['symbol_dec'] = '';
      $this->field_config['idpago']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idpago']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- usuario
      $this->field_config['usuario']               = array();
      $this->field_config['usuario']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['usuario']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['usuario']['symbol_dec'] = '';
      $this->field_config['usuario']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['usuario']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- creado
      $this->field_config['creado']                 = array();
      $this->field_config['creado']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['creado']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['creado']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['creado']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'creado');
      //-- actualizado
      $this->field_config['actualizado']                 = array();
      $this->field_config['actualizado']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['actualizado']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['actualizado']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['actualizado']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'actualizado');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_numpago' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numpago');
          }
          if ('validate_titulo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'titulo');
          }
          if ('validate_cod_cuenta' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cod_cuenta');
          }
          if ('validate_ncuenta_tercero' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ncuenta_tercero');
          }
          if ('validate_docapagar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'docapagar');
          }
          if ('validate_fecpago' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecpago');
          }
          if ('validate_client' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'client');
          }
          if ('validate_banco' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'banco');
          }
          if ('validate_asent' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'asent');
          }
          if ('validate_valor_base' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valor_base');
          }
          if ('validate_valor_iva' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valor_iva');
          }
          if ('validate_montocan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'montocan');
          }
          if ('validate_saldodocumento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'saldodocumento');
          }
          if ('validate_valpagar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valpagar');
          }
          if ('validate_porc_ret' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'porc_ret');
          }
          if ('validate_ret' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ret');
          }
          if ('validate_porc_ica' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'porc_ica');
          }
          if ('validate_val_ica' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'val_ica');
          }
          if ('validate_porc_reteiva' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'porc_reteiva');
          }
          if ('validate_val_reteiva' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'val_reteiva');
          }
          if ('validate_descuent' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'descuent');
          }
          if ('validate_iddocapagar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'iddocapagar');
          }
          if ('validate_total_cuenta' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'total_cuenta');
          }
          if ('validate_id_concepto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_concepto');
          }
          if ('validate_obs' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'obs');
          }
          if ('validate_conc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'conc');
          }
          if ('validate_detallepagos' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'detallepagos');
          }
          if ('validate_idpago' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idpago');
          }
          if ('validate_archivos' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'archivos');
          }
          form_hacerpagos_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_asent_onchange' == $this->NM_ajax_opcao)
          {
              $this->asent_onChange();
          }
          if ('event_client_onchange' == $this->NM_ajax_opcao)
          {
              $this->client_onChange();
          }
          if ('event_descuent_onchange' == $this->NM_ajax_opcao)
          {
              $this->descuent_onChange();
          }
          if ('event_descuent_onclick' == $this->NM_ajax_opcao)
          {
              $this->descuent_onClick();
          }
          if ('event_docapagar_onchange' == $this->NM_ajax_opcao)
          {
              $this->docapagar_onChange();
          }
          if ('event_id_concepto_onchange' == $this->NM_ajax_opcao)
          {
              $this->id_concepto_onChange();
          }
          if ('event_iddocapagar_onchange' == $this->NM_ajax_opcao)
          {
              $this->iddocapagar_onChange();
          }
          if ('event_ncuenta_tercero_onchange' == $this->NM_ajax_opcao)
          {
              $this->ncuenta_tercero_onChange();
          }
          if ('event_porc_ica_onchange' == $this->NM_ajax_opcao)
          {
              $this->porc_ica_onChange();
          }
          if ('event_porc_ica_onclick' == $this->NM_ajax_opcao)
          {
              $this->porc_ica_onClick();
          }
          if ('event_porc_ret_onchange' == $this->NM_ajax_opcao)
          {
              $this->porc_ret_onChange();
          }
          if ('event_porc_ret_onclick' == $this->NM_ajax_opcao)
          {
              $this->porc_ret_onClick();
          }
          if ('event_porc_reteiva_onchange' == $this->NM_ajax_opcao)
          {
              $this->porc_reteiva_onChange();
          }
          if ('event_porc_reteiva_onclick' == $this->NM_ajax_opcao)
          {
              $this->porc_reteiva_onClick();
          }
          if ('event_ret_onchange' == $this->NM_ajax_opcao)
          {
              $this->ret_onChange();
          }
          if ('event_ret_onclick' == $this->NM_ajax_opcao)
          {
              $this->ret_onClick();
          }
          if ('event_val_ica_onchange' == $this->NM_ajax_opcao)
          {
              $this->val_ica_onChange();
          }
          if ('event_val_ica_onclick' == $this->NM_ajax_opcao)
          {
              $this->val_ica_onClick();
          }
          if ('event_val_reteiva_onchange' == $this->NM_ajax_opcao)
          {
              $this->val_reteiva_onChange();
          }
          if ('event_val_reteiva_onclick' == $this->NM_ajax_opcao)
          {
              $this->val_reteiva_onClick();
          }
          form_hacerpagos_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['dados_select']['asent']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->asent = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['dados_select']['asent'];
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_hacerpagos_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_hacerpagos_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, 4);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_evento == "update")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_evento == "delete")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_hacerpagos_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          form_hacerpagos_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_hacerpagos.zip";
          $Arq_htm = $this->Ini->path_imag_temp . "/" . $Zip_name;
          $Arq_zip = $this->Ini->root . $Arq_htm;
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($Arq_base, ' ')) ? " \"" . $Arq_base . "\"" :  $Arq_base;
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Html_password . " " . $Zip_f . " " . $Arq_input;
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
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
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
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
               $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
               if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
               {
                   $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Html_password . " " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
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
           }
           if (is_file($Arq_zip)) {
               unlink($Arq_base);
           } 
          $path_doc_md5 = md5($Arq_htm);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Pagos a terceros") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" /> 
  <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
</HEAD>
<BODY class="scExportPage">
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: top">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PRINT</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
   <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo  $this->form_encode_input($Arq_htm) ?>" target="_self" style="display: none"> 
</form>
<form name="Fdown" method="get" action="form_hacerpagos_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_hacerpagos"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="./" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nmgp_opcao" value="<?php echo $this->nmgp_opcao ?>"> 
</form> 
         </BODY>
         </HTML>
<?php
          exit;
  }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;

           case 4:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros_SweetAlert($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros_SweetAlert($Campos_Erros) 
   {
       $sError  = '';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= $this->Recupera_Nome_Campo($campo) . ': ' . implode('<br />', array_unique($erros)) . '<br />';
       }

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'numpago':
               return "COMPROBANTE EGRESO:";
               break;
           case 'titulo':
               return "";
               break;
           case 'cod_cuenta':
               return "Cod Cuenta";
               break;
           case 'ncuenta_tercero':
               return "Cuenta a pagar";
               break;
           case 'docapagar':
               return "Factura de Compra";
               break;
           case 'fecpago':
               return "Fecha";
               break;
           case 'client':
               return "Tercero";
               break;
           case 'banco':
               return "Caja N°";
               break;
           case 'asent':
               return "Asentar";
               break;
           case 'valor_base':
               return "Base";
               break;
           case 'valor_iva':
               return "IVA";
               break;
           case 'montocan':
               return "Valor Pagado";
               break;
           case 'saldodocumento':
               return "Saldo documento";
               break;
           case 'valpagar':
               return "Valor a Pagar";
               break;
           case 'porc_ret':
               return "Retención %";
               break;
           case 'ret':
               return "Valor Retención";
               break;
           case 'porc_ica':
               return "ICA %";
               break;
           case 'val_ica':
               return "Valor retención ICA";
               break;
           case 'porc_reteiva':
               return "Rete IVA %";
               break;
           case 'val_reteiva':
               return "Valor Rete IVA";
               break;
           case 'descuent':
               return "Descuento";
               break;
           case 'iddocapagar':
               return "Selec documento";
               break;
           case 'total_cuenta':
               return "Total Cuenta";
               break;
           case 'id_concepto':
               return "Código Concepto";
               break;
           case 'obs':
               return "Observación";
               break;
           case 'conc':
               return "Concepto";
               break;
           case 'detallepagos':
               return "";
               break;
           case 'idpago':
               return "Idpago";
               break;
           case 'archivos':
               return "";
               break;
           case 'usuario':
               return "Usuario";
               break;
           case 'creado':
               return "Creado";
               break;
           case 'actualizado':
               return "Actualizado";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_hacerpagos']) || !is_array($this->NM_ajax_info['errList']['geral_form_hacerpagos']))
              {
                  $this->NM_ajax_info['errList']['geral_form_hacerpagos'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_hacerpagos'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'numpago' == $filtro)
        $this->ValidateField_numpago($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'titulo' == $filtro)
        $this->ValidateField_titulo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cod_cuenta' == $filtro)
        $this->ValidateField_cod_cuenta($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ncuenta_tercero' == $filtro)
        $this->ValidateField_ncuenta_tercero($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'docapagar' == $filtro)
        $this->ValidateField_docapagar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fecpago' == $filtro)
        $this->ValidateField_fecpago($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'client' == $filtro)
        $this->ValidateField_client($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'banco' == $filtro)
        $this->ValidateField_banco($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'asent' == $filtro)
        $this->ValidateField_asent($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valor_base' == $filtro)
        $this->ValidateField_valor_base($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valor_iva' == $filtro)
        $this->ValidateField_valor_iva($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'montocan' == $filtro)
        $this->ValidateField_montocan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'saldodocumento' == $filtro)
        $this->ValidateField_saldodocumento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valpagar' == $filtro)
        $this->ValidateField_valpagar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'porc_ret' == $filtro)
        $this->ValidateField_porc_ret($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ret' == $filtro)
        $this->ValidateField_ret($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'porc_ica' == $filtro)
        $this->ValidateField_porc_ica($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'val_ica' == $filtro)
        $this->ValidateField_val_ica($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'porc_reteiva' == $filtro)
        $this->ValidateField_porc_reteiva($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'val_reteiva' == $filtro)
        $this->ValidateField_val_reteiva($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'descuent' == $filtro)
        $this->ValidateField_descuent($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'iddocapagar' == $filtro)
        $this->ValidateField_iddocapagar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'total_cuenta' == $filtro)
        $this->ValidateField_total_cuenta($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_concepto' == $filtro)
        $this->ValidateField_id_concepto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'obs' == $filtro)
        $this->ValidateField_obs($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'conc' == $filtro)
        $this->ValidateField_conc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'detallepagos' == $filtro)
        $this->ValidateField_detallepagos($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idpago' == $filtro)
        $this->ValidateField_idpago($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'archivos' == $filtro)
        $this->ValidateField_archivos($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_asent = $this->asent;
    $original_idpago = $this->idpago;
}
  if ($this->sc_evento == "excluir" || $this->sc_evento == "delete")
	{
	if($this->asent =='NO')
		{
		 
      $nm_select = "select sum(monto) as monto from detallepagos where id_pago=$this->idpago "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dset = array();
     if ($this->idpago != "")
     { 
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
                      $this->dset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dset = false;
          $this->dset_erro = $this->Db->ErrorMsg();
      } 
     } 
;
		if(isset($this->dset[0][0]))
			{
			if(($this->dset[0][0])>0)
				{
				
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "¡Egreso tiene detalle, elimine primero el detalle!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_hacerpagos' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "¡Egreso tiene detalle, elimine primero el detalle!";
 }
;

				}

			}
		}
	else
		{
		
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "¡Recibo está asentado, No se puede proceder!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_hacerpagos' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "¡Recibo está asentado, No se puede proceder!";
 }
;
		}
	
	}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_asent != $this->asent || (isset($bFlagRead_asent) && $bFlagRead_asent)))
    {
        $this->ajax_return_values_asent(true);
    }
    if (($original_idpago != $this->idpago || (isset($bFlagRead_idpago) && $bFlagRead_idpago)))
    {
        $this->ajax_return_values_idpago(true);
    }
}
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off'; 
      }
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_numpago(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->numpago === "" || is_null($this->numpago))  
      { 
          $this->numpago = 0;
          $this->sc_force_zero[] = 'numpago';
      } 
      nm_limpa_numero($this->numpago, $this->field_config['numpago']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->numpago != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->numpago) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "COMPROBANTE EGRESO:: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['numpago']))
                  {
                      $Campos_Erros['numpago'] = array();
                  }
                  $Campos_Erros['numpago'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['numpago']) || !is_array($this->NM_ajax_info['errList']['numpago']))
                  {
                      $this->NM_ajax_info['errList']['numpago'] = array();
                  }
                  $this->NM_ajax_info['errList']['numpago'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->numpago, 20, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "COMPROBANTE EGRESO:; " ; 
                  if (!isset($Campos_Erros['numpago']))
                  {
                      $Campos_Erros['numpago'] = array();
                  }
                  $Campos_Erros['numpago'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['numpago']) || !is_array($this->NM_ajax_info['errList']['numpago']))
                  {
                      $this->NM_ajax_info['errList']['numpago'] = array();
                  }
                  $this->NM_ajax_info['errList']['numpago'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'numpago';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_numpago

    function ValidateField_titulo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->titulo) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'titulo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_titulo

    function ValidateField_cod_cuenta(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cod_cuenta) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cod Cuenta " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cod_cuenta']))
              {
                  $Campos_Erros['cod_cuenta'] = array();
              }
              $Campos_Erros['cod_cuenta'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cod_cuenta']) || !is_array($this->NM_ajax_info['errList']['cod_cuenta']))
              {
                  $this->NM_ajax_info['errList']['cod_cuenta'] = array();
              }
              $this->NM_ajax_info['errList']['cod_cuenta'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cod_cuenta';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cod_cuenta

    function ValidateField_ncuenta_tercero(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->ncuenta_tercero) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cuenta a pagar " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ncuenta_tercero']))
              {
                  $Campos_Erros['ncuenta_tercero'] = array();
              }
              $Campos_Erros['ncuenta_tercero'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ncuenta_tercero']) || !is_array($this->NM_ajax_info['errList']['ncuenta_tercero']))
              {
                  $this->NM_ajax_info['errList']['ncuenta_tercero'] = array();
              }
              $this->NM_ajax_info['errList']['ncuenta_tercero'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ncuenta_tercero';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ncuenta_tercero

    function ValidateField_docapagar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->docapagar) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Factura de Compra " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['docapagar']))
              {
                  $Campos_Erros['docapagar'] = array();
              }
              $Campos_Erros['docapagar'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['docapagar']) || !is_array($this->NM_ajax_info['errList']['docapagar']))
              {
                  $this->NM_ajax_info['errList']['docapagar'] = array();
              }
              $this->NM_ajax_info['errList']['docapagar'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'docapagar';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_docapagar

    function ValidateField_fecpago(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fecpago, $this->field_config['fecpago']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fecpago']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fecpago']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fecpago']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fecpago']['date_sep']) ; 
          if (trim($this->fecpago) != "")  
          { 
              if ($teste_validade->Data($this->fecpago, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecha; " ; 
                  if (!isset($Campos_Erros['fecpago']))
                  {
                      $Campos_Erros['fecpago'] = array();
                  }
                  $Campos_Erros['fecpago'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecpago']) || !is_array($this->NM_ajax_info['errList']['fecpago']))
                  {
                      $this->NM_ajax_info['errList']['fecpago'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecpago'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['php_cmp_required']['fecpago']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['php_cmp_required']['fecpago'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Fecha" ; 
              if (!isset($Campos_Erros['fecpago']))
              {
                  $Campos_Erros['fecpago'] = array();
              }
              $Campos_Erros['fecpago'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['fecpago']) || !is_array($this->NM_ajax_info['errList']['fecpago']))
                  {
                      $this->NM_ajax_info['errList']['fecpago'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecpago'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['fecpago']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecpago';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fecpago

    function ValidateField_client(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->client == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['php_cmp_required']['client']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['php_cmp_required']['client'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Tercero" ; 
          if (!isset($Campos_Erros['client']))
          {
              $Campos_Erros['client'] = array();
          }
          $Campos_Erros['client'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['client']) || !is_array($this->NM_ajax_info['errList']['client']))
          {
              $this->NM_ajax_info['errList']['client'] = array();
          }
          $this->NM_ajax_info['errList']['client'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->client) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_client']) && !in_array($this->client, $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_client']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['client']))
              {
                  $Campos_Erros['client'] = array();
              }
              $Campos_Erros['client'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['client']) || !is_array($this->NM_ajax_info['errList']['client']))
              {
                  $this->NM_ajax_info['errList']['client'] = array();
              }
              $this->NM_ajax_info['errList']['client'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'client';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_client

    function ValidateField_banco(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->banco) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_banco']) && !in_array($this->banco, $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_banco']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['banco']))
                   {
                       $Campos_Erros['banco'] = array();
                   }
                   $Campos_Erros['banco'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['banco']) || !is_array($this->NM_ajax_info['errList']['banco']))
                   {
                       $this->NM_ajax_info['errList']['banco'] = array();
                   }
                   $this->NM_ajax_info['errList']['banco'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'banco';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_banco

    function ValidateField_asent(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->asent == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'asent';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_asent

    function ValidateField_valor_base(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->valor_base === "" || is_null($this->valor_base))  
      { 
          $this->valor_base = 0;
          $this->sc_force_zero[] = 'valor_base';
      } 
      if (!empty($this->field_config['valor_base']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valor_base, $this->field_config['valor_base']['symbol_dec'], $this->field_config['valor_base']['symbol_grp'], $this->field_config['valor_base']['symbol_mon']); 
          nm_limpa_valor($this->valor_base, $this->field_config['valor_base']['symbol_dec'], $this->field_config['valor_base']['symbol_grp']) ; 
          if ('.' == substr($this->valor_base, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->valor_base, 1)))
              {
                  $this->valor_base = '';
              }
              else
              {
                  $this->valor_base = '0' . $this->valor_base;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->valor_base != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->valor_base, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->valor_base, -1))
              {
                  $iTestSize++;
                  $this->valor_base = '-' . substr($this->valor_base, 0, -1);
              }
              if (strlen($this->valor_base) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Base: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valor_base']))
                  {
                      $Campos_Erros['valor_base'] = array();
                  }
                  $Campos_Erros['valor_base'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valor_base']) || !is_array($this->NM_ajax_info['errList']['valor_base']))
                  {
                      $this->NM_ajax_info['errList']['valor_base'] = array();
                  }
                  $this->NM_ajax_info['errList']['valor_base'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valor_base, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Base; " ; 
                  if (!isset($Campos_Erros['valor_base']))
                  {
                      $Campos_Erros['valor_base'] = array();
                  }
                  $Campos_Erros['valor_base'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valor_base']) || !is_array($this->NM_ajax_info['errList']['valor_base']))
                  {
                      $this->NM_ajax_info['errList']['valor_base'] = array();
                  }
                  $this->NM_ajax_info['errList']['valor_base'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valor_base';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valor_base

    function ValidateField_valor_iva(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->valor_iva === "" || is_null($this->valor_iva))  
      { 
          $this->valor_iva = 0;
          $this->sc_force_zero[] = 'valor_iva';
      } 
      if (!empty($this->field_config['valor_iva']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valor_iva, $this->field_config['valor_iva']['symbol_dec'], $this->field_config['valor_iva']['symbol_grp'], $this->field_config['valor_iva']['symbol_mon']); 
          nm_limpa_valor($this->valor_iva, $this->field_config['valor_iva']['symbol_dec'], $this->field_config['valor_iva']['symbol_grp']) ; 
          if ('.' == substr($this->valor_iva, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->valor_iva, 1)))
              {
                  $this->valor_iva = '';
              }
              else
              {
                  $this->valor_iva = '0' . $this->valor_iva;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->valor_iva != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->valor_iva, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->valor_iva, -1))
              {
                  $iTestSize++;
                  $this->valor_iva = '-' . substr($this->valor_iva, 0, -1);
              }
              if (strlen($this->valor_iva) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "IVA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valor_iva']))
                  {
                      $Campos_Erros['valor_iva'] = array();
                  }
                  $Campos_Erros['valor_iva'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valor_iva']) || !is_array($this->NM_ajax_info['errList']['valor_iva']))
                  {
                      $this->NM_ajax_info['errList']['valor_iva'] = array();
                  }
                  $this->NM_ajax_info['errList']['valor_iva'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valor_iva, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "IVA; " ; 
                  if (!isset($Campos_Erros['valor_iva']))
                  {
                      $Campos_Erros['valor_iva'] = array();
                  }
                  $Campos_Erros['valor_iva'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valor_iva']) || !is_array($this->NM_ajax_info['errList']['valor_iva']))
                  {
                      $this->NM_ajax_info['errList']['valor_iva'] = array();
                  }
                  $this->NM_ajax_info['errList']['valor_iva'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valor_iva';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valor_iva

    function ValidateField_montocan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if (!empty($this->field_config['montocan']['symbol_dec']))
      {
          $this->sc_remove_currency($this->montocan, $this->field_config['montocan']['symbol_dec'], $this->field_config['montocan']['symbol_grp'], $this->field_config['montocan']['symbol_mon']); 
          nm_limpa_valor($this->montocan, $this->field_config['montocan']['symbol_dec'], $this->field_config['montocan']['symbol_grp']) ; 
          if ('.' == substr($this->montocan, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->montocan, 1)))
              {
                  $this->montocan = '';
              }
              else
              {
                  $this->montocan = '0' . $this->montocan;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->montocan != '')  
          { 
              $iTestSize = 13;
              if ('-' == substr($this->montocan, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->montocan, -1))
              {
                  $iTestSize++;
                  $this->montocan = '-' . substr($this->montocan, 0, -1);
              }
              if (strlen($this->montocan) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valor Pagado: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['montocan']))
                  {
                      $Campos_Erros['montocan'] = array();
                  }
                  $Campos_Erros['montocan'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['montocan']) || !is_array($this->NM_ajax_info['errList']['montocan']))
                  {
                      $this->NM_ajax_info['errList']['montocan'] = array();
                  }
                  $this->NM_ajax_info['errList']['montocan'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->montocan, 12, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valor Pagado; " ; 
                  if (!isset($Campos_Erros['montocan']))
                  {
                      $Campos_Erros['montocan'] = array();
                  }
                  $Campos_Erros['montocan'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['montocan']) || !is_array($this->NM_ajax_info['errList']['montocan']))
                  {
                      $this->NM_ajax_info['errList']['montocan'] = array();
                  }
                  $this->NM_ajax_info['errList']['montocan'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['php_cmp_required']['montocan']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['php_cmp_required']['montocan'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Valor Pagado" ; 
              if (!isset($Campos_Erros['montocan']))
              {
                  $Campos_Erros['montocan'] = array();
              }
              $Campos_Erros['montocan'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['montocan']) || !is_array($this->NM_ajax_info['errList']['montocan']))
                  {
                      $this->NM_ajax_info['errList']['montocan'] = array();
                  }
                  $this->NM_ajax_info['errList']['montocan'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'montocan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_montocan

    function ValidateField_saldodocumento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->saldodocumento === "" || is_null($this->saldodocumento))  
      { 
          $this->saldodocumento = 0;
          $this->sc_force_zero[] = 'saldodocumento';
      } 
      }
      if (!empty($this->field_config['saldodocumento']['symbol_dec']))
      {
          $this->sc_remove_currency($this->saldodocumento, $this->field_config['saldodocumento']['symbol_dec'], $this->field_config['saldodocumento']['symbol_grp'], $this->field_config['saldodocumento']['symbol_mon']); 
          nm_limpa_valor($this->saldodocumento, $this->field_config['saldodocumento']['symbol_dec'], $this->field_config['saldodocumento']['symbol_grp']) ; 
          if ('.' == substr($this->saldodocumento, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->saldodocumento, 1)))
              {
                  $this->saldodocumento = '';
              }
              else
              {
                  $this->saldodocumento = '0' . $this->saldodocumento;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->saldodocumento != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->saldodocumento) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Saldo documento: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['saldodocumento']))
                  {
                      $Campos_Erros['saldodocumento'] = array();
                  }
                  $Campos_Erros['saldodocumento'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['saldodocumento']) || !is_array($this->NM_ajax_info['errList']['saldodocumento']))
                  {
                      $this->NM_ajax_info['errList']['saldodocumento'] = array();
                  }
                  $this->NM_ajax_info['errList']['saldodocumento'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->saldodocumento, 12, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Saldo documento; " ; 
                  if (!isset($Campos_Erros['saldodocumento']))
                  {
                      $Campos_Erros['saldodocumento'] = array();
                  }
                  $Campos_Erros['saldodocumento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['saldodocumento']) || !is_array($this->NM_ajax_info['errList']['saldodocumento']))
                  {
                      $this->NM_ajax_info['errList']['saldodocumento'] = array();
                  }
                  $this->NM_ajax_info['errList']['saldodocumento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'saldodocumento';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_saldodocumento

    function ValidateField_valpagar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->valpagar === "" || is_null($this->valpagar))  
      { 
          $this->valpagar = 0;
          $this->sc_force_zero[] = 'valpagar';
      } 
      if (!empty($this->field_config['valpagar']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valpagar, $this->field_config['valpagar']['symbol_dec'], $this->field_config['valpagar']['symbol_grp'], $this->field_config['valpagar']['symbol_mon']); 
          nm_limpa_valor($this->valpagar, $this->field_config['valpagar']['symbol_dec'], $this->field_config['valpagar']['symbol_grp']) ; 
          if ('.' == substr($this->valpagar, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->valpagar, 1)))
              {
                  $this->valpagar = '';
              }
              else
              {
                  $this->valpagar = '0' . $this->valpagar;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->valpagar != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->valpagar, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->valpagar, -1))
              {
                  $iTestSize++;
                  $this->valpagar = '-' . substr($this->valpagar, 0, -1);
              }
              if (strlen($this->valpagar) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valor a Pagar: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valpagar']))
                  {
                      $Campos_Erros['valpagar'] = array();
                  }
                  $Campos_Erros['valpagar'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valpagar']) || !is_array($this->NM_ajax_info['errList']['valpagar']))
                  {
                      $this->NM_ajax_info['errList']['valpagar'] = array();
                  }
                  $this->NM_ajax_info['errList']['valpagar'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valpagar, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valor a Pagar; " ; 
                  if (!isset($Campos_Erros['valpagar']))
                  {
                      $Campos_Erros['valpagar'] = array();
                  }
                  $Campos_Erros['valpagar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valpagar']) || !is_array($this->NM_ajax_info['errList']['valpagar']))
                  {
                      $this->NM_ajax_info['errList']['valpagar'] = array();
                  }
                  $this->NM_ajax_info['errList']['valpagar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valpagar';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valpagar

    function ValidateField_porc_ret(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->porc_ret) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ret']) && !in_array($this->porc_ret, $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ret']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['porc_ret']))
                   {
                       $Campos_Erros['porc_ret'] = array();
                   }
                   $Campos_Erros['porc_ret'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['porc_ret']) || !is_array($this->NM_ajax_info['errList']['porc_ret']))
                   {
                       $this->NM_ajax_info['errList']['porc_ret'] = array();
                   }
                   $this->NM_ajax_info['errList']['porc_ret'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'porc_ret';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_porc_ret

    function ValidateField_ret(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->ret === "" || is_null($this->ret))  
      { 
          $this->ret = 0;
          $this->sc_force_zero[] = 'ret';
      } 
      }
      if (!empty($this->field_config['ret']['symbol_dec']))
      {
          $this->sc_remove_currency($this->ret, $this->field_config['ret']['symbol_dec'], $this->field_config['ret']['symbol_grp'], $this->field_config['ret']['symbol_mon']); 
          nm_limpa_valor($this->ret, $this->field_config['ret']['symbol_dec'], $this->field_config['ret']['symbol_grp']) ; 
          if ('.' == substr($this->ret, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->ret, 1)))
              {
                  $this->ret = '';
              }
              else
              {
                  $this->ret = '0' . $this->ret;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->ret != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->ret) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valor Retención: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['ret']))
                  {
                      $Campos_Erros['ret'] = array();
                  }
                  $Campos_Erros['ret'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['ret']) || !is_array($this->NM_ajax_info['errList']['ret']))
                  {
                      $this->NM_ajax_info['errList']['ret'] = array();
                  }
                  $this->NM_ajax_info['errList']['ret'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->ret, 10, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valor Retención; " ; 
                  if (!isset($Campos_Erros['ret']))
                  {
                      $Campos_Erros['ret'] = array();
                  }
                  $Campos_Erros['ret'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['ret']) || !is_array($this->NM_ajax_info['errList']['ret']))
                  {
                      $this->NM_ajax_info['errList']['ret'] = array();
                  }
                  $this->NM_ajax_info['errList']['ret'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ret';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ret

    function ValidateField_porc_ica(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->porc_ica) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ica']) && !in_array($this->porc_ica, $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ica']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['porc_ica']))
                   {
                       $Campos_Erros['porc_ica'] = array();
                   }
                   $Campos_Erros['porc_ica'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['porc_ica']) || !is_array($this->NM_ajax_info['errList']['porc_ica']))
                   {
                       $this->NM_ajax_info['errList']['porc_ica'] = array();
                   }
                   $this->NM_ajax_info['errList']['porc_ica'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'porc_ica';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_porc_ica

    function ValidateField_val_ica(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->val_ica === "" || is_null($this->val_ica))  
      { 
          $this->val_ica = 0;
          $this->sc_force_zero[] = 'val_ica';
      } 
      if (!empty($this->field_config['val_ica']['symbol_dec']))
      {
          $this->sc_remove_currency($this->val_ica, $this->field_config['val_ica']['symbol_dec'], $this->field_config['val_ica']['symbol_grp'], $this->field_config['val_ica']['symbol_mon']); 
          nm_limpa_valor($this->val_ica, $this->field_config['val_ica']['symbol_dec'], $this->field_config['val_ica']['symbol_grp']) ; 
          if ('.' == substr($this->val_ica, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->val_ica, 1)))
              {
                  $this->val_ica = '';
              }
              else
              {
                  $this->val_ica = '0' . $this->val_ica;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->val_ica != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->val_ica) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valor retención ICA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['val_ica']))
                  {
                      $Campos_Erros['val_ica'] = array();
                  }
                  $Campos_Erros['val_ica'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['val_ica']) || !is_array($this->NM_ajax_info['errList']['val_ica']))
                  {
                      $this->NM_ajax_info['errList']['val_ica'] = array();
                  }
                  $this->NM_ajax_info['errList']['val_ica'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->val_ica, 10, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valor retención ICA; " ; 
                  if (!isset($Campos_Erros['val_ica']))
                  {
                      $Campos_Erros['val_ica'] = array();
                  }
                  $Campos_Erros['val_ica'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['val_ica']) || !is_array($this->NM_ajax_info['errList']['val_ica']))
                  {
                      $this->NM_ajax_info['errList']['val_ica'] = array();
                  }
                  $this->NM_ajax_info['errList']['val_ica'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'val_ica';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_val_ica

    function ValidateField_porc_reteiva(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->porc_reteiva === "" || is_null($this->porc_reteiva))  
      { 
          $this->porc_reteiva = 0;
          $this->sc_force_zero[] = 'porc_reteiva';
      } 
      if (!empty($this->field_config['porc_reteiva']['symbol_dec']))
      {
          nm_limpa_valor($this->porc_reteiva, $this->field_config['porc_reteiva']['symbol_dec'], $this->field_config['porc_reteiva']['symbol_grp']) ; 
          if ('.' == substr($this->porc_reteiva, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->porc_reteiva, 1)))
              {
                  $this->porc_reteiva = '';
              }
              else
              {
                  $this->porc_reteiva = '0' . $this->porc_reteiva;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->porc_reteiva != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->porc_reteiva) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Rete IVA %: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['porc_reteiva']))
                  {
                      $Campos_Erros['porc_reteiva'] = array();
                  }
                  $Campos_Erros['porc_reteiva'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['porc_reteiva']) || !is_array($this->NM_ajax_info['errList']['porc_reteiva']))
                  {
                      $this->NM_ajax_info['errList']['porc_reteiva'] = array();
                  }
                  $this->NM_ajax_info['errList']['porc_reteiva'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->porc_reteiva, 7, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Rete IVA %; " ; 
                  if (!isset($Campos_Erros['porc_reteiva']))
                  {
                      $Campos_Erros['porc_reteiva'] = array();
                  }
                  $Campos_Erros['porc_reteiva'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['porc_reteiva']) || !is_array($this->NM_ajax_info['errList']['porc_reteiva']))
                  {
                      $this->NM_ajax_info['errList']['porc_reteiva'] = array();
                  }
                  $this->NM_ajax_info['errList']['porc_reteiva'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'porc_reteiva';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_porc_reteiva

    function ValidateField_val_reteiva(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->val_reteiva === "" || is_null($this->val_reteiva))  
      { 
          $this->val_reteiva = 0;
          $this->sc_force_zero[] = 'val_reteiva';
      } 
      if (!empty($this->field_config['val_reteiva']['symbol_dec']))
      {
          $this->sc_remove_currency($this->val_reteiva, $this->field_config['val_reteiva']['symbol_dec'], $this->field_config['val_reteiva']['symbol_grp'], $this->field_config['val_reteiva']['symbol_mon']); 
          nm_limpa_valor($this->val_reteiva, $this->field_config['val_reteiva']['symbol_dec'], $this->field_config['val_reteiva']['symbol_grp']) ; 
          if ('.' == substr($this->val_reteiva, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->val_reteiva, 1)))
              {
                  $this->val_reteiva = '';
              }
              else
              {
                  $this->val_reteiva = '0' . $this->val_reteiva;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->val_reteiva != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->val_reteiva) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valor Rete IVA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['val_reteiva']))
                  {
                      $Campos_Erros['val_reteiva'] = array();
                  }
                  $Campos_Erros['val_reteiva'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['val_reteiva']) || !is_array($this->NM_ajax_info['errList']['val_reteiva']))
                  {
                      $this->NM_ajax_info['errList']['val_reteiva'] = array();
                  }
                  $this->NM_ajax_info['errList']['val_reteiva'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->val_reteiva, 10, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valor Rete IVA; " ; 
                  if (!isset($Campos_Erros['val_reteiva']))
                  {
                      $Campos_Erros['val_reteiva'] = array();
                  }
                  $Campos_Erros['val_reteiva'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['val_reteiva']) || !is_array($this->NM_ajax_info['errList']['val_reteiva']))
                  {
                      $this->NM_ajax_info['errList']['val_reteiva'] = array();
                  }
                  $this->NM_ajax_info['errList']['val_reteiva'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'val_reteiva';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_val_reteiva

    function ValidateField_descuent(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->descuent === "" || is_null($this->descuent))  
      { 
          $this->descuent = 0;
          $this->sc_force_zero[] = 'descuent';
      } 
      }
      if (!empty($this->field_config['descuent']['symbol_dec']))
      {
          $this->sc_remove_currency($this->descuent, $this->field_config['descuent']['symbol_dec'], $this->field_config['descuent']['symbol_grp'], $this->field_config['descuent']['symbol_mon']); 
          nm_limpa_valor($this->descuent, $this->field_config['descuent']['symbol_dec'], $this->field_config['descuent']['symbol_grp']) ; 
          if ('.' == substr($this->descuent, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->descuent, 1)))
              {
                  $this->descuent = '';
              }
              else
              {
                  $this->descuent = '0' . $this->descuent;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->descuent != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->descuent) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Descuento: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['descuent']))
                  {
                      $Campos_Erros['descuent'] = array();
                  }
                  $Campos_Erros['descuent'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['descuent']) || !is_array($this->NM_ajax_info['errList']['descuent']))
                  {
                      $this->NM_ajax_info['errList']['descuent'] = array();
                  }
                  $this->NM_ajax_info['errList']['descuent'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->descuent, 10, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Descuento; " ; 
                  if (!isset($Campos_Erros['descuent']))
                  {
                      $Campos_Erros['descuent'] = array();
                  }
                  $Campos_Erros['descuent'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['descuent']) || !is_array($this->NM_ajax_info['errList']['descuent']))
                  {
                      $this->NM_ajax_info['errList']['descuent'] = array();
                  }
                  $this->NM_ajax_info['errList']['descuent'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'descuent';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_descuent

    function ValidateField_iddocapagar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->iddocapagar) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Selec documento " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['iddocapagar']))
              {
                  $Campos_Erros['iddocapagar'] = array();
              }
              $Campos_Erros['iddocapagar'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['iddocapagar']) || !is_array($this->NM_ajax_info['errList']['iddocapagar']))
              {
                  $this->NM_ajax_info['errList']['iddocapagar'] = array();
              }
              $this->NM_ajax_info['errList']['iddocapagar'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'iddocapagar';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_iddocapagar

    function ValidateField_total_cuenta(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->total_cuenta === "" || is_null($this->total_cuenta))  
      { 
          $this->total_cuenta = 0;
          $this->sc_force_zero[] = 'total_cuenta';
      } 
      if (!empty($this->field_config['total_cuenta']['symbol_dec']))
      {
          $this->sc_remove_currency($this->total_cuenta, $this->field_config['total_cuenta']['symbol_dec'], $this->field_config['total_cuenta']['symbol_grp'], $this->field_config['total_cuenta']['symbol_mon']); 
          nm_limpa_valor($this->total_cuenta, $this->field_config['total_cuenta']['symbol_dec'], $this->field_config['total_cuenta']['symbol_grp']) ; 
          if ('.' == substr($this->total_cuenta, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->total_cuenta, 1)))
              {
                  $this->total_cuenta = '';
              }
              else
              {
                  $this->total_cuenta = '0' . $this->total_cuenta;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->total_cuenta != '')  
          { 
              $iTestSize = 21;
              if (strlen($this->total_cuenta) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Total Cuenta: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['total_cuenta']))
                  {
                      $Campos_Erros['total_cuenta'] = array();
                  }
                  $Campos_Erros['total_cuenta'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['total_cuenta']) || !is_array($this->NM_ajax_info['errList']['total_cuenta']))
                  {
                      $this->NM_ajax_info['errList']['total_cuenta'] = array();
                  }
                  $this->NM_ajax_info['errList']['total_cuenta'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->total_cuenta, 20, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Total Cuenta; " ; 
                  if (!isset($Campos_Erros['total_cuenta']))
                  {
                      $Campos_Erros['total_cuenta'] = array();
                  }
                  $Campos_Erros['total_cuenta'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['total_cuenta']) || !is_array($this->NM_ajax_info['errList']['total_cuenta']))
                  {
                      $this->NM_ajax_info['errList']['total_cuenta'] = array();
                  }
                  $this->NM_ajax_info['errList']['total_cuenta'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'total_cuenta';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_total_cuenta

    function ValidateField_id_concepto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->id_concepto == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['php_cmp_required']['id_concepto']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['php_cmp_required']['id_concepto'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Código Concepto" ; 
          if (!isset($Campos_Erros['id_concepto']))
          {
              $Campos_Erros['id_concepto'] = array();
          }
          $Campos_Erros['id_concepto'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['id_concepto']) || !is_array($this->NM_ajax_info['errList']['id_concepto']))
          {
              $this->NM_ajax_info['errList']['id_concepto'] = array();
          }
          $this->NM_ajax_info['errList']['id_concepto'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->id_concepto) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_id_concepto']) && !in_array($this->id_concepto, $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_id_concepto']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['id_concepto']))
              {
                  $Campos_Erros['id_concepto'] = array();
              }
              $Campos_Erros['id_concepto'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['id_concepto']) || !is_array($this->NM_ajax_info['errList']['id_concepto']))
              {
                  $this->NM_ajax_info['errList']['id_concepto'] = array();
              }
              $this->NM_ajax_info['errList']['id_concepto'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_concepto';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_concepto

    function ValidateField_obs(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->obs = sc_strtoupper($this->obs); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->obs) > 10000) 
          { 
              $hasError = true;
              $Campos_Crit .= "Observación " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10000 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['obs']))
              {
                  $Campos_Erros['obs'] = array();
              }
              $Campos_Erros['obs'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10000 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['obs']) || !is_array($this->NM_ajax_info['errList']['obs']))
              {
                  $this->NM_ajax_info['errList']['obs'] = array();
              }
              $this->NM_ajax_info['errList']['obs'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10000 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'obs';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_obs

    function ValidateField_conc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->conc = sc_strtoupper($this->conc); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->conc) > 120) 
          { 
              $hasError = true;
              $Campos_Crit .= "Concepto " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['conc']))
              {
                  $Campos_Erros['conc'] = array();
              }
              $Campos_Erros['conc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['conc']) || !is_array($this->NM_ajax_info['errList']['conc']))
              {
                  $this->NM_ajax_info['errList']['conc'] = array();
              }
              $this->NM_ajax_info['errList']['conc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'conc';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_conc

    function ValidateField_detallepagos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->detallepagos) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'detallepagos';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_detallepagos

    function ValidateField_idpago(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idpago === "" || is_null($this->idpago))  
      { 
          $this->idpago = 0;
      } 
      nm_limpa_numero($this->idpago, $this->field_config['idpago']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->idpago != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->idpago) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Idpago: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['idpago']))
                  {
                      $Campos_Erros['idpago'] = array();
                  }
                  $Campos_Erros['idpago'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['idpago']) || !is_array($this->NM_ajax_info['errList']['idpago']))
                  {
                      $this->NM_ajax_info['errList']['idpago'] = array();
                  }
                  $this->NM_ajax_info['errList']['idpago'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->idpago, 20, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Idpago; " ; 
                  if (!isset($Campos_Erros['idpago']))
                  {
                      $Campos_Erros['idpago'] = array();
                  }
                  $Campos_Erros['idpago'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['idpago']) || !is_array($this->NM_ajax_info['errList']['idpago']))
                  {
                      $this->NM_ajax_info['errList']['idpago'] = array();
                  }
                  $this->NM_ajax_info['errList']['idpago'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idpago';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idpago

    function ValidateField_archivos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->archivos) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'archivos';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_archivos

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['numpago'] = $this->numpago;
    $this->nmgp_dados_form['titulo'] = $this->titulo;
    $this->nmgp_dados_form['cod_cuenta'] = $this->cod_cuenta;
    $this->nmgp_dados_form['ncuenta_tercero'] = $this->ncuenta_tercero;
    $this->nmgp_dados_form['docapagar'] = $this->docapagar;
    $this->nmgp_dados_form['fecpago'] = (strlen(trim($this->fecpago)) > 19) ? str_replace(".", ":", $this->fecpago) : trim($this->fecpago);
    $this->nmgp_dados_form['client'] = $this->client;
    $this->nmgp_dados_form['banco'] = $this->banco;
    $this->nmgp_dados_form['asent'] = $this->asent;
    $this->nmgp_dados_form['valor_base'] = $this->valor_base;
    $this->nmgp_dados_form['valor_iva'] = $this->valor_iva;
    $this->nmgp_dados_form['montocan'] = $this->montocan;
    $this->nmgp_dados_form['saldodocumento'] = $this->saldodocumento;
    $this->nmgp_dados_form['valpagar'] = $this->valpagar;
    $this->nmgp_dados_form['porc_ret'] = $this->porc_ret;
    $this->nmgp_dados_form['ret'] = $this->ret;
    $this->nmgp_dados_form['porc_ica'] = $this->porc_ica;
    $this->nmgp_dados_form['val_ica'] = $this->val_ica;
    $this->nmgp_dados_form['porc_reteiva'] = $this->porc_reteiva;
    $this->nmgp_dados_form['val_reteiva'] = $this->val_reteiva;
    $this->nmgp_dados_form['descuent'] = $this->descuent;
    $this->nmgp_dados_form['iddocapagar'] = $this->iddocapagar;
    $this->nmgp_dados_form['total_cuenta'] = $this->total_cuenta;
    $this->nmgp_dados_form['id_concepto'] = $this->id_concepto;
    $this->nmgp_dados_form['obs'] = $this->obs;
    $this->nmgp_dados_form['conc'] = $this->conc;
    $this->nmgp_dados_form['detallepagos'] = $this->detallepagos;
    $this->nmgp_dados_form['idpago'] = $this->idpago;
    $this->nmgp_dados_form['archivos'] = $this->archivos;
    $this->nmgp_dados_form['usuario'] = $this->usuario;
    $this->nmgp_dados_form['creado'] = $this->creado;
    $this->nmgp_dados_form['actualizado'] = $this->actualizado;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['numpago'] = $this->numpago;
      nm_limpa_numero($this->numpago, $this->field_config['numpago']['symbol_grp']) ; 
      $this->Before_unformat['fecpago'] = $this->fecpago;
      nm_limpa_data($this->fecpago, $this->field_config['fecpago']['date_sep']) ; 
      $this->Before_unformat['valor_base'] = $this->valor_base;
      if (!empty($this->field_config['valor_base']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valor_base, $this->field_config['valor_base']['symbol_dec'], $this->field_config['valor_base']['symbol_grp'], $this->field_config['valor_base']['symbol_mon']);
         nm_limpa_valor($this->valor_base, $this->field_config['valor_base']['symbol_dec'], $this->field_config['valor_base']['symbol_grp']);
      }
      $this->Before_unformat['valor_iva'] = $this->valor_iva;
      if (!empty($this->field_config['valor_iva']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valor_iva, $this->field_config['valor_iva']['symbol_dec'], $this->field_config['valor_iva']['symbol_grp'], $this->field_config['valor_iva']['symbol_mon']);
         nm_limpa_valor($this->valor_iva, $this->field_config['valor_iva']['symbol_dec'], $this->field_config['valor_iva']['symbol_grp']);
      }
      $this->Before_unformat['montocan'] = $this->montocan;
      if (!empty($this->field_config['montocan']['symbol_dec']))
      {
         $this->sc_remove_currency($this->montocan, $this->field_config['montocan']['symbol_dec'], $this->field_config['montocan']['symbol_grp'], $this->field_config['montocan']['symbol_mon']);
         nm_limpa_valor($this->montocan, $this->field_config['montocan']['symbol_dec'], $this->field_config['montocan']['symbol_grp']);
      }
      $this->Before_unformat['saldodocumento'] = $this->saldodocumento;
      if (!empty($this->field_config['saldodocumento']['symbol_dec']))
      {
         $this->sc_remove_currency($this->saldodocumento, $this->field_config['saldodocumento']['symbol_dec'], $this->field_config['saldodocumento']['symbol_grp'], $this->field_config['saldodocumento']['symbol_mon']);
         nm_limpa_valor($this->saldodocumento, $this->field_config['saldodocumento']['symbol_dec'], $this->field_config['saldodocumento']['symbol_grp']);
      }
      $this->Before_unformat['valpagar'] = $this->valpagar;
      if (!empty($this->field_config['valpagar']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valpagar, $this->field_config['valpagar']['symbol_dec'], $this->field_config['valpagar']['symbol_grp'], $this->field_config['valpagar']['symbol_mon']);
         nm_limpa_valor($this->valpagar, $this->field_config['valpagar']['symbol_dec'], $this->field_config['valpagar']['symbol_grp']);
      }
      $this->Before_unformat['ret'] = $this->ret;
      if (!empty($this->field_config['ret']['symbol_dec']))
      {
         $this->sc_remove_currency($this->ret, $this->field_config['ret']['symbol_dec'], $this->field_config['ret']['symbol_grp'], $this->field_config['ret']['symbol_mon']);
         nm_limpa_valor($this->ret, $this->field_config['ret']['symbol_dec'], $this->field_config['ret']['symbol_grp']);
      }
      $this->Before_unformat['val_ica'] = $this->val_ica;
      if (!empty($this->field_config['val_ica']['symbol_dec']))
      {
         $this->sc_remove_currency($this->val_ica, $this->field_config['val_ica']['symbol_dec'], $this->field_config['val_ica']['symbol_grp'], $this->field_config['val_ica']['symbol_mon']);
         nm_limpa_valor($this->val_ica, $this->field_config['val_ica']['symbol_dec'], $this->field_config['val_ica']['symbol_grp']);
      }
      $this->Before_unformat['porc_reteiva'] = $this->porc_reteiva;
      if (!empty($this->field_config['porc_reteiva']['symbol_dec']))
      {
         nm_limpa_valor($this->porc_reteiva, $this->field_config['porc_reteiva']['symbol_dec'], $this->field_config['porc_reteiva']['symbol_grp']);
      }
      $this->Before_unformat['val_reteiva'] = $this->val_reteiva;
      if (!empty($this->field_config['val_reteiva']['symbol_dec']))
      {
         $this->sc_remove_currency($this->val_reteiva, $this->field_config['val_reteiva']['symbol_dec'], $this->field_config['val_reteiva']['symbol_grp'], $this->field_config['val_reteiva']['symbol_mon']);
         nm_limpa_valor($this->val_reteiva, $this->field_config['val_reteiva']['symbol_dec'], $this->field_config['val_reteiva']['symbol_grp']);
      }
      $this->Before_unformat['descuent'] = $this->descuent;
      if (!empty($this->field_config['descuent']['symbol_dec']))
      {
         $this->sc_remove_currency($this->descuent, $this->field_config['descuent']['symbol_dec'], $this->field_config['descuent']['symbol_grp'], $this->field_config['descuent']['symbol_mon']);
         nm_limpa_valor($this->descuent, $this->field_config['descuent']['symbol_dec'], $this->field_config['descuent']['symbol_grp']);
      }
      $this->Before_unformat['total_cuenta'] = $this->total_cuenta;
      if (!empty($this->field_config['total_cuenta']['symbol_dec']))
      {
         $this->sc_remove_currency($this->total_cuenta, $this->field_config['total_cuenta']['symbol_dec'], $this->field_config['total_cuenta']['symbol_grp'], $this->field_config['total_cuenta']['symbol_mon']);
         nm_limpa_valor($this->total_cuenta, $this->field_config['total_cuenta']['symbol_dec'], $this->field_config['total_cuenta']['symbol_grp']);
      }
      $this->Before_unformat['idpago'] = $this->idpago;
      nm_limpa_numero($this->idpago, $this->field_config['idpago']['symbol_grp']) ; 
      $this->Before_unformat['usuario'] = $this->usuario;
      nm_limpa_numero($this->usuario, $this->field_config['usuario']['symbol_grp']) ; 
      $this->Before_unformat['creado'] = $this->creado;
      $this->Before_unformat['creado_hora'] = $this->creado_hora;
      nm_limpa_data($this->creado, $this->field_config['creado']['date_sep']) ; 
      nm_limpa_hora($this->creado_hora, $this->field_config['creado']['time_sep']) ; 
      $this->Before_unformat['actualizado'] = $this->actualizado;
      $this->Before_unformat['actualizado_hora'] = $this->actualizado_hora;
      nm_limpa_data($this->actualizado, $this->field_config['actualizado']['date_sep']) ; 
      nm_limpa_hora($this->actualizado_hora, $this->field_config['actualizado']['time_sep']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~i', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "numpago")
      {
          nm_limpa_numero($this->numpago, $this->field_config['numpago']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "valor_base")
      {
          if (!empty($this->field_config['valor_base']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valor_base, $this->field_config['valor_base']['symbol_dec'], $this->field_config['valor_base']['symbol_grp'], $this->field_config['valor_base']['symbol_mon']);
             nm_limpa_valor($this->valor_base, $this->field_config['valor_base']['symbol_dec'], $this->field_config['valor_base']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "valor_iva")
      {
          if (!empty($this->field_config['valor_iva']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valor_iva, $this->field_config['valor_iva']['symbol_dec'], $this->field_config['valor_iva']['symbol_grp'], $this->field_config['valor_iva']['symbol_mon']);
             nm_limpa_valor($this->valor_iva, $this->field_config['valor_iva']['symbol_dec'], $this->field_config['valor_iva']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "montocan")
      {
          if (!empty($this->field_config['montocan']['symbol_dec']))
          {
             $this->sc_remove_currency($this->montocan, $this->field_config['montocan']['symbol_dec'], $this->field_config['montocan']['symbol_grp'], $this->field_config['montocan']['symbol_mon']);
             nm_limpa_valor($this->montocan, $this->field_config['montocan']['symbol_dec'], $this->field_config['montocan']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "saldodocumento")
      {
          if (!empty($this->field_config['saldodocumento']['symbol_dec']))
          {
             $this->sc_remove_currency($this->saldodocumento, $this->field_config['saldodocumento']['symbol_dec'], $this->field_config['saldodocumento']['symbol_grp'], $this->field_config['saldodocumento']['symbol_mon']);
             nm_limpa_valor($this->saldodocumento, $this->field_config['saldodocumento']['symbol_dec'], $this->field_config['saldodocumento']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "valpagar")
      {
          if (!empty($this->field_config['valpagar']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valpagar, $this->field_config['valpagar']['symbol_dec'], $this->field_config['valpagar']['symbol_grp'], $this->field_config['valpagar']['symbol_mon']);
             nm_limpa_valor($this->valpagar, $this->field_config['valpagar']['symbol_dec'], $this->field_config['valpagar']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ret")
      {
          if (!empty($this->field_config['ret']['symbol_dec']))
          {
             $this->sc_remove_currency($this->ret, $this->field_config['ret']['symbol_dec'], $this->field_config['ret']['symbol_grp'], $this->field_config['ret']['symbol_mon']);
             nm_limpa_valor($this->ret, $this->field_config['ret']['symbol_dec'], $this->field_config['ret']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "val_ica")
      {
          if (!empty($this->field_config['val_ica']['symbol_dec']))
          {
             $this->sc_remove_currency($this->val_ica, $this->field_config['val_ica']['symbol_dec'], $this->field_config['val_ica']['symbol_grp'], $this->field_config['val_ica']['symbol_mon']);
             nm_limpa_valor($this->val_ica, $this->field_config['val_ica']['symbol_dec'], $this->field_config['val_ica']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "porc_reteiva")
      {
          if (!empty($this->field_config['porc_reteiva']['symbol_dec']))
          {
             nm_limpa_valor($this->porc_reteiva, $this->field_config['porc_reteiva']['symbol_dec'], $this->field_config['porc_reteiva']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "val_reteiva")
      {
          if (!empty($this->field_config['val_reteiva']['symbol_dec']))
          {
             $this->sc_remove_currency($this->val_reteiva, $this->field_config['val_reteiva']['symbol_dec'], $this->field_config['val_reteiva']['symbol_grp'], $this->field_config['val_reteiva']['symbol_mon']);
             nm_limpa_valor($this->val_reteiva, $this->field_config['val_reteiva']['symbol_dec'], $this->field_config['val_reteiva']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "descuent")
      {
          if (!empty($this->field_config['descuent']['symbol_dec']))
          {
             $this->sc_remove_currency($this->descuent, $this->field_config['descuent']['symbol_dec'], $this->field_config['descuent']['symbol_grp'], $this->field_config['descuent']['symbol_mon']);
             nm_limpa_valor($this->descuent, $this->field_config['descuent']['symbol_dec'], $this->field_config['descuent']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "total_cuenta")
      {
          if (!empty($this->field_config['total_cuenta']['symbol_dec']))
          {
             $this->sc_remove_currency($this->total_cuenta, $this->field_config['total_cuenta']['symbol_dec'], $this->field_config['total_cuenta']['symbol_grp'], $this->field_config['total_cuenta']['symbol_mon']);
             nm_limpa_valor($this->total_cuenta, $this->field_config['total_cuenta']['symbol_dec'], $this->field_config['total_cuenta']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "idpago")
      {
          nm_limpa_numero($this->idpago, $this->field_config['idpago']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "usuario")
      {
          nm_limpa_numero($this->usuario, $this->field_config['usuario']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if ('' !== $this->numpago || (!empty($format_fields) && isset($format_fields['numpago'])))
      {
          nmgp_Form_Num_Val($this->numpago, $this->field_config['numpago']['symbol_grp'], $this->field_config['numpago']['symbol_dec'], "0", "S", $this->field_config['numpago']['format_neg'], "", "", "-", $this->field_config['numpago']['symbol_fmt']) ; 
      }
      if ((!empty($this->fecpago) && 'null' != $this->fecpago) || (!empty($format_fields) && isset($format_fields['fecpago'])))
      {
          nm_volta_data($this->fecpago, $this->field_config['fecpago']['date_format']) ; 
          nmgp_Form_Datas($this->fecpago, $this->field_config['fecpago']['date_format'], $this->field_config['fecpago']['date_sep']) ;  
      }
      elseif ('null' == $this->fecpago || '' == $this->fecpago)
      {
          $this->fecpago = '';
      }
      if ('' !== $this->valor_base || (!empty($format_fields) && isset($format_fields['valor_base'])))
      {
          nmgp_Form_Num_Val($this->valor_base, $this->field_config['valor_base']['symbol_grp'], $this->field_config['valor_base']['symbol_dec'], "0", "S", $this->field_config['valor_base']['format_neg'], "", "", "-", $this->field_config['valor_base']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['valor_base']['symbol_mon'];
          $this->sc_add_currency($this->valor_base, $sMonSymb, $this->field_config['valor_base']['format_pos']); 
      }
      if ('' !== $this->valor_iva || (!empty($format_fields) && isset($format_fields['valor_iva'])))
      {
          nmgp_Form_Num_Val($this->valor_iva, $this->field_config['valor_iva']['symbol_grp'], $this->field_config['valor_iva']['symbol_dec'], "0", "S", $this->field_config['valor_iva']['format_neg'], "", "", "-", $this->field_config['valor_iva']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['valor_iva']['symbol_mon'];
          $this->sc_add_currency($this->valor_iva, $sMonSymb, $this->field_config['valor_iva']['format_pos']); 
      }
      if ('' !== $this->montocan || (!empty($format_fields) && isset($format_fields['montocan'])))
      {
          nmgp_Form_Num_Val($this->montocan, $this->field_config['montocan']['symbol_grp'], $this->field_config['montocan']['symbol_dec'], "0", "S", $this->field_config['montocan']['format_neg'], "", "", "-", $this->field_config['montocan']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['montocan']['symbol_mon'];
          $this->sc_add_currency($this->montocan, $sMonSymb, $this->field_config['montocan']['format_pos']); 
      }
      if ('' !== $this->saldodocumento || (!empty($format_fields) && isset($format_fields['saldodocumento'])))
      {
          nmgp_Form_Num_Val($this->saldodocumento, $this->field_config['saldodocumento']['symbol_grp'], $this->field_config['saldodocumento']['symbol_dec'], "0", "S", $this->field_config['saldodocumento']['format_neg'], "", "", "-", $this->field_config['saldodocumento']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['saldodocumento']['symbol_mon'];
          $this->sc_add_currency($this->saldodocumento, $sMonSymb, $this->field_config['saldodocumento']['format_pos']); 
      }
      if ('' !== $this->valpagar || (!empty($format_fields) && isset($format_fields['valpagar'])))
      {
          nmgp_Form_Num_Val($this->valpagar, $this->field_config['valpagar']['symbol_grp'], $this->field_config['valpagar']['symbol_dec'], "0", "S", $this->field_config['valpagar']['format_neg'], "", "", "-", $this->field_config['valpagar']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['valpagar']['symbol_mon'];
          $this->sc_add_currency($this->valpagar, $sMonSymb, $this->field_config['valpagar']['format_pos']); 
      }
      if ('' !== $this->ret || (!empty($format_fields) && isset($format_fields['ret'])))
      {
          nmgp_Form_Num_Val($this->ret, $this->field_config['ret']['symbol_grp'], $this->field_config['ret']['symbol_dec'], "2", "S", $this->field_config['ret']['format_neg'], "", "", "-", $this->field_config['ret']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['ret']['symbol_mon'];
          $this->sc_add_currency($this->ret, $sMonSymb, $this->field_config['ret']['format_pos']); 
      }
      if ('' !== $this->val_ica || (!empty($format_fields) && isset($format_fields['val_ica'])))
      {
          nmgp_Form_Num_Val($this->val_ica, $this->field_config['val_ica']['symbol_grp'], $this->field_config['val_ica']['symbol_dec'], "2", "S", $this->field_config['val_ica']['format_neg'], "", "", "-", $this->field_config['val_ica']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['val_ica']['symbol_mon'];
          $this->sc_add_currency($this->val_ica, $sMonSymb, $this->field_config['val_ica']['format_pos']); 
      }
      if ('' !== $this->porc_reteiva || (!empty($format_fields) && isset($format_fields['porc_reteiva'])))
      {
          nmgp_Form_Num_Val($this->porc_reteiva, $this->field_config['porc_reteiva']['symbol_grp'], $this->field_config['porc_reteiva']['symbol_dec'], "2", "S", $this->field_config['porc_reteiva']['format_neg'], "", "", "-", $this->field_config['porc_reteiva']['symbol_fmt']) ; 
      }
      if ('' !== $this->val_reteiva || (!empty($format_fields) && isset($format_fields['val_reteiva'])))
      {
          nmgp_Form_Num_Val($this->val_reteiva, $this->field_config['val_reteiva']['symbol_grp'], $this->field_config['val_reteiva']['symbol_dec'], "2", "S", $this->field_config['val_reteiva']['format_neg'], "", "", "-", $this->field_config['val_reteiva']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['val_reteiva']['symbol_mon'];
          $this->sc_add_currency($this->val_reteiva, $sMonSymb, $this->field_config['val_reteiva']['format_pos']); 
      }
      if ('' !== $this->descuent || (!empty($format_fields) && isset($format_fields['descuent'])))
      {
          nmgp_Form_Num_Val($this->descuent, $this->field_config['descuent']['symbol_grp'], $this->field_config['descuent']['symbol_dec'], "2", "S", $this->field_config['descuent']['format_neg'], "", "", "-", $this->field_config['descuent']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['descuent']['symbol_mon'];
          $this->sc_add_currency($this->descuent, $sMonSymb, $this->field_config['descuent']['format_pos']); 
      }
      if ('' !== $this->total_cuenta || (!empty($format_fields) && isset($format_fields['total_cuenta'])))
      {
          nmgp_Form_Num_Val($this->total_cuenta, $this->field_config['total_cuenta']['symbol_grp'], $this->field_config['total_cuenta']['symbol_dec'], "0", "S", $this->field_config['total_cuenta']['format_neg'], "", "", "-", $this->field_config['total_cuenta']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['total_cuenta']['symbol_mon'];
          $this->sc_add_currency($this->total_cuenta, $sMonSymb, $this->field_config['total_cuenta']['format_pos']); 
      }
      if ('' !== $this->idpago || (!empty($format_fields) && isset($format_fields['idpago'])))
      {
          nmgp_Form_Num_Val($this->idpago, $this->field_config['idpago']['symbol_grp'], $this->field_config['idpago']['symbol_dec'], "0", "S", $this->field_config['idpago']['format_neg'], "", "", "-", $this->field_config['idpago']['symbol_fmt']) ; 
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
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
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
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
          $nm_campo = $trab_saida;
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
      $nm_campo = $trab_saida;
   } 
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
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
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['fecpago']['date_format'];
      if ($this->fecpago != "")  
      { 
          nm_conv_data($this->fecpago, $this->field_config['fecpago']['date_format']) ; 
          $this->fecpago_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fecpago_hora = substr($this->fecpago_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fecpago_hora = substr($this->fecpago_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fecpago_hora = substr($this->fecpago_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fecpago_hora = substr($this->fecpago_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fecpago_hora = substr($this->fecpago_hora, 0, -4);
          }
      } 
      if ($this->fecpago == "" && $use_null)  
      { 
          $this->fecpago = "null" ; 
      } 
      $this->field_config['fecpago']['date_format'] = $guarda_format_hora;
   }
//
   function nm_prep_date_change($cmp_date, $format_dt)
   {
       $vl_return  = "";
       if ($cmp_date != 'null') {
           $vl_return .= (strpos($format_dt, "yy") !== false) ? substr($cmp_date,  0, 4) : "";
           $vl_return .= (strpos($format_dt, "mm") !== false) ? substr($cmp_date,  5, 2) : "";
           $vl_return .= (strpos($format_dt, "dd") !== false) ? substr($cmp_date,  8, 2) : "";
           $vl_return .= (strpos($format_dt, "hh") !== false) ? substr($cmp_date, 11, 2) : "";
           $vl_return .= (strpos($format_dt, "ii") !== false) ? substr($cmp_date, 14, 2) : "";
           $vl_return .= (strpos($format_dt, "ss") !== false) ? substr($cmp_date, 17, 2) : "";
       }
       return $vl_return;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
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
           nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
           return $dt_out;
       }
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_numpago();
          $this->ajax_return_values_titulo();
          $this->ajax_return_values_cod_cuenta();
          $this->ajax_return_values_ncuenta_tercero();
          $this->ajax_return_values_docapagar();
          $this->ajax_return_values_fecpago();
          $this->ajax_return_values_client();
          $this->ajax_return_values_banco();
          $this->ajax_return_values_asent();
          $this->ajax_return_values_valor_base();
          $this->ajax_return_values_valor_iva();
          $this->ajax_return_values_montocan();
          $this->ajax_return_values_saldodocumento();
          $this->ajax_return_values_valpagar();
          $this->ajax_return_values_porc_ret();
          $this->ajax_return_values_ret();
          $this->ajax_return_values_porc_ica();
          $this->ajax_return_values_val_ica();
          $this->ajax_return_values_porc_reteiva();
          $this->ajax_return_values_val_reteiva();
          $this->ajax_return_values_descuent();
          $this->ajax_return_values_iddocapagar();
          $this->ajax_return_values_total_cuenta();
          $this->ajax_return_values_id_concepto();
          $this->ajax_return_values_obs();
          $this->ajax_return_values_conc();
          $this->ajax_return_values_detallepagos();
          $this->ajax_return_values_idpago();
          $this->ajax_return_values_archivos();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idpago']['keyVal'] = form_hacerpagos_pack_protect_string($this->nmgp_dados_form['idpago']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['form_detallepagos_terceros_script_case_init'] ]['form_detallepagos_terceros']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['form_detallepagos_terceros_script_case_init'] ]['form_detallepagos_terceros']['total']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['grid_gestor_archivos_ce_script_case_init'] ]['grid_gestor_archivos_ce']['embutida_form_full'] = true;
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['grid_gestor_archivos_ce_script_case_init'] ]['grid_gestor_archivos_ce']['embutida_form']       = true;
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['grid_gestor_archivos_ce_script_case_init'] ]['grid_gestor_archivos_ce']['embutida_pai']        = "form_hacerpagos";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['grid_gestor_archivos_ce_script_case_init'] ]['grid_gestor_archivos_ce']['embutida_form_parms'] = "SC_glo_par_gnumeroce*scingnumeroce*scoutNMSC_inicial*scininicio*scoutNMSC_cab*scinN*scoutNMSC_nav*scinN*scout";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['grid_gestor_archivos_ce_script_case_init'] ]['grid_gestor_archivos_ce']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['grid_gestor_archivos_ce_script_case_init'] ]['grid_gestor_archivos_ce']['total']);
          }
   } // ajax_return_values

          //----- numpago
   function ajax_return_values_numpago($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numpago", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numpago);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numpago'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- titulo
   function ajax_return_values_titulo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("titulo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->titulo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['titulo'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cod_cuenta
   function ajax_return_values_cod_cuenta($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cod_cuenta", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cod_cuenta);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cod_cuenta'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- ncuenta_tercero
   function ajax_return_values_ncuenta_tercero($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ncuenta_tercero", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ncuenta_tercero);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ncuenta_tercero'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- docapagar
   function ajax_return_values_docapagar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("docapagar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->docapagar);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['docapagar'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fecpago
   function ajax_return_values_fecpago($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecpago", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecpago);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fecpago'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- client
   function ajax_return_values_client($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("client", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->client);
              $aLookup = array();
              $this->_tmp_lookup_client = $this->client;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_client']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_client'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_client']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_client'] = array(); 
}
$aLookup[] = array(form_hacerpagos_pack_protect_string('0') => str_replace('<', '&lt;',form_hacerpagos_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_client'][] = '0';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_numpago = $this->numpago;
   $old_value_fecpago = $this->fecpago;
   $old_value_valor_base = $this->valor_base;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_montocan = $this->montocan;
   $old_value_saldodocumento = $this->saldodocumento;
   $old_value_valpagar = $this->valpagar;
   $old_value_ret = $this->ret;
   $old_value_val_ica = $this->val_ica;
   $old_value_porc_reteiva = $this->porc_reteiva;
   $old_value_val_reteiva = $this->val_reteiva;
   $old_value_descuent = $this->descuent;
   $old_value_total_cuenta = $this->total_cuenta;
   $old_value_idpago = $this->idpago;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numpago = $this->numpago;
   $unformatted_value_fecpago = $this->fecpago;
   $unformatted_value_valor_base = $this->valor_base;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_montocan = $this->montocan;
   $unformatted_value_saldodocumento = $this->saldodocumento;
   $unformatted_value_valpagar = $this->valpagar;
   $unformatted_value_ret = $this->ret;
   $unformatted_value_val_ica = $this->val_ica;
   $unformatted_value_porc_reteiva = $this->porc_reteiva;
   $unformatted_value_val_reteiva = $this->val_reteiva;
   $unformatted_value_descuent = $this->descuent;
   $unformatted_value_total_cuenta = $this->total_cuenta;
   $unformatted_value_idpago = $this->idpago;

   $nm_comando = "SELECT idtercero, concat(documento, ' - ',nombres)  FROM terceros  ORDER BY nombres, documento";

   $this->numpago = $old_value_numpago;
   $this->fecpago = $old_value_fecpago;
   $this->valor_base = $old_value_valor_base;
   $this->valor_iva = $old_value_valor_iva;
   $this->montocan = $old_value_montocan;
   $this->saldodocumento = $old_value_saldodocumento;
   $this->valpagar = $old_value_valpagar;
   $this->ret = $old_value_ret;
   $this->val_ica = $old_value_val_ica;
   $this->porc_reteiva = $old_value_porc_reteiva;
   $this->val_reteiva = $old_value_val_reteiva;
   $this->descuent = $old_value_descuent;
   $this->total_cuenta = $old_value_total_cuenta;
   $this->idpago = $old_value_idpago;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_hacerpagos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_hacerpagos_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_client'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"client\"";
          if (isset($this->NM_ajax_info['select_html']['client']) && !empty($this->NM_ajax_info['select_html']['client']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['client']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->client == $sValue)
                  {
                      $this->_tmp_lookup_client = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['client'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['client']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['client']['valList'][$i] = form_hacerpagos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['client']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['client']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['client']['labList'] = $aLabel;
          }
   }

          //----- banco
   function ajax_return_values_banco($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("banco", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->banco);
              $aLookup = array();
              $this->_tmp_lookup_banco = $this->banco;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_banco']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_banco'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_banco']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_banco'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_numpago = $this->numpago;
   $old_value_fecpago = $this->fecpago;
   $old_value_valor_base = $this->valor_base;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_montocan = $this->montocan;
   $old_value_saldodocumento = $this->saldodocumento;
   $old_value_valpagar = $this->valpagar;
   $old_value_ret = $this->ret;
   $old_value_val_ica = $this->val_ica;
   $old_value_porc_reteiva = $this->porc_reteiva;
   $old_value_val_reteiva = $this->val_reteiva;
   $old_value_descuent = $this->descuent;
   $old_value_total_cuenta = $this->total_cuenta;
   $old_value_idpago = $this->idpago;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numpago = $this->numpago;
   $unformatted_value_fecpago = $this->fecpago;
   $unformatted_value_valor_base = $this->valor_base;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_montocan = $this->montocan;
   $unformatted_value_saldodocumento = $this->saldodocumento;
   $unformatted_value_valpagar = $this->valpagar;
   $unformatted_value_ret = $this->ret;
   $unformatted_value_val_ica = $this->val_ica;
   $unformatted_value_porc_reteiva = $this->porc_reteiva;
   $unformatted_value_val_reteiva = $this->val_reteiva;
   $unformatted_value_descuent = $this->descuent;
   $unformatted_value_total_cuenta = $this->total_cuenta;
   $unformatted_value_idpago = $this->idpago;

   $nm_comando = "SELECT idcaja_vta, codigo_banco  FROM bancos  ORDER BY codigo_banco";

   $this->numpago = $old_value_numpago;
   $this->fecpago = $old_value_fecpago;
   $this->valor_base = $old_value_valor_base;
   $this->valor_iva = $old_value_valor_iva;
   $this->montocan = $old_value_montocan;
   $this->saldodocumento = $old_value_saldodocumento;
   $this->valpagar = $old_value_valpagar;
   $this->ret = $old_value_ret;
   $this->val_ica = $old_value_val_ica;
   $this->porc_reteiva = $old_value_porc_reteiva;
   $this->val_reteiva = $old_value_val_reteiva;
   $this->descuent = $old_value_descuent;
   $this->total_cuenta = $old_value_total_cuenta;
   $this->idpago = $old_value_idpago;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_hacerpagos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_hacerpagos_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_banco'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"banco\"";
          if (isset($this->NM_ajax_info['select_html']['banco']) && !empty($this->NM_ajax_info['select_html']['banco']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['banco']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->banco == $sValue)
                  {
                      $this->_tmp_lookup_banco = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['banco'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['banco']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['banco']['valList'][$i] = form_hacerpagos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['banco']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['banco']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['banco']['labList'] = $aLabel;
          }
   }

          //----- asent
   function ajax_return_values_asent($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("asent", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->asent);
              $aLookup = array();
              $this->_tmp_lookup_asent = $this->asent;

$aLookup[] = array(form_hacerpagos_pack_protect_string('NO') => str_replace('<', '&lt;',form_hacerpagos_pack_protect_string("NO")));
$aLookup[] = array(form_hacerpagos_pack_protect_string('SI') => str_replace('<', '&lt;',form_hacerpagos_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_asent'][] = 'NO';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_asent'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"asent\"";
          if (isset($this->NM_ajax_info['select_html']['asent']) && !empty($this->NM_ajax_info['select_html']['asent']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['asent']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->asent == $sValue)
                  {
                      $this->_tmp_lookup_asent = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['asent'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['asent']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['asent']['valList'][$i] = form_hacerpagos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['asent']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['asent']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['asent']['labList'] = $aLabel;
          }
   }

          //----- valor_base
   function ajax_return_values_valor_base($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valor_base", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valor_base);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valor_base'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- valor_iva
   function ajax_return_values_valor_iva($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valor_iva", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valor_iva);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valor_iva'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- montocan
   function ajax_return_values_montocan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("montocan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->montocan);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['montocan'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- saldodocumento
   function ajax_return_values_saldodocumento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("saldodocumento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->saldodocumento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['saldodocumento'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- valpagar
   function ajax_return_values_valpagar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valpagar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valpagar);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valpagar'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- porc_ret
   function ajax_return_values_porc_ret($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("porc_ret", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->porc_ret);
              $aLookup = array();
              $this->_tmp_lookup_porc_ret = $this->porc_ret;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ret']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ret'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ret']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ret'] = array(); 
}
$aLookup[] = array(form_hacerpagos_pack_protect_string('0.000') => str_replace('<', '&lt;',form_hacerpagos_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ret'][] = '0.000';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_numpago = $this->numpago;
   $old_value_fecpago = $this->fecpago;
   $old_value_valor_base = $this->valor_base;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_montocan = $this->montocan;
   $old_value_saldodocumento = $this->saldodocumento;
   $old_value_valpagar = $this->valpagar;
   $old_value_ret = $this->ret;
   $old_value_val_ica = $this->val_ica;
   $old_value_porc_reteiva = $this->porc_reteiva;
   $old_value_val_reteiva = $this->val_reteiva;
   $old_value_descuent = $this->descuent;
   $old_value_total_cuenta = $this->total_cuenta;
   $old_value_idpago = $this->idpago;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numpago = $this->numpago;
   $unformatted_value_fecpago = $this->fecpago;
   $unformatted_value_valor_base = $this->valor_base;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_montocan = $this->montocan;
   $unformatted_value_saldodocumento = $this->saldodocumento;
   $unformatted_value_valpagar = $this->valpagar;
   $unformatted_value_ret = $this->ret;
   $unformatted_value_val_ica = $this->val_ica;
   $unformatted_value_porc_reteiva = $this->porc_reteiva;
   $unformatted_value_val_reteiva = $this->val_reteiva;
   $unformatted_value_descuent = $this->descuent;
   $unformatted_value_total_cuenta = $this->total_cuenta;
   $unformatted_value_idpago = $this->idpago;

   $nm_comando = "SELECT porrete FROM tiporetefuente  ORDER BY  id_tiporetefuente desc";

   $this->numpago = $old_value_numpago;
   $this->fecpago = $old_value_fecpago;
   $this->valor_base = $old_value_valor_base;
   $this->valor_iva = $old_value_valor_iva;
   $this->montocan = $old_value_montocan;
   $this->saldodocumento = $old_value_saldodocumento;
   $this->valpagar = $old_value_valpagar;
   $this->ret = $old_value_ret;
   $this->val_ica = $old_value_val_ica;
   $this->porc_reteiva = $old_value_porc_reteiva;
   $this->val_reteiva = $old_value_val_reteiva;
   $this->descuent = $old_value_descuent;
   $this->total_cuenta = $old_value_total_cuenta;
   $this->idpago = $old_value_idpago;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_hacerpagos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_hacerpagos_pack_protect_string(NM_charset_to_utf8($rs->fields[0]))));
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ret'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"porc_ret\"";
          if (isset($this->NM_ajax_info['select_html']['porc_ret']) && !empty($this->NM_ajax_info['select_html']['porc_ret']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['porc_ret']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->porc_ret == $sValue)
                  {
                      $this->_tmp_lookup_porc_ret = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['porc_ret'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['porc_ret']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['porc_ret']['valList'][$i] = form_hacerpagos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['porc_ret']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['porc_ret']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['porc_ret']['labList'] = $aLabel;
          }
   }

          //----- ret
   function ajax_return_values_ret($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ret", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ret);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ret'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- porc_ica
   function ajax_return_values_porc_ica($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("porc_ica", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->porc_ica);
              $aLookup = array();
              $this->_tmp_lookup_porc_ica = $this->porc_ica;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ica']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ica'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ica']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ica'] = array(); 
}
$aLookup[] = array(form_hacerpagos_pack_protect_string('0.000') => str_replace('<', '&lt;',form_hacerpagos_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ica'][] = '0.000';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_numpago = $this->numpago;
   $old_value_fecpago = $this->fecpago;
   $old_value_valor_base = $this->valor_base;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_montocan = $this->montocan;
   $old_value_saldodocumento = $this->saldodocumento;
   $old_value_valpagar = $this->valpagar;
   $old_value_ret = $this->ret;
   $old_value_val_ica = $this->val_ica;
   $old_value_porc_reteiva = $this->porc_reteiva;
   $old_value_val_reteiva = $this->val_reteiva;
   $old_value_descuent = $this->descuent;
   $old_value_total_cuenta = $this->total_cuenta;
   $old_value_idpago = $this->idpago;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numpago = $this->numpago;
   $unformatted_value_fecpago = $this->fecpago;
   $unformatted_value_valor_base = $this->valor_base;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_montocan = $this->montocan;
   $unformatted_value_saldodocumento = $this->saldodocumento;
   $unformatted_value_valpagar = $this->valpagar;
   $unformatted_value_ret = $this->ret;
   $unformatted_value_val_ica = $this->val_ica;
   $unformatted_value_porc_reteiva = $this->porc_reteiva;
   $unformatted_value_val_reteiva = $this->val_reteiva;
   $unformatted_value_descuent = $this->descuent;
   $unformatted_value_total_cuenta = $this->total_cuenta;
   $unformatted_value_idpago = $this->idpago;

   $nm_comando = "SELECT porcica  FROM tipoica  ORDER BY  id_ica desc";

   $this->numpago = $old_value_numpago;
   $this->fecpago = $old_value_fecpago;
   $this->valor_base = $old_value_valor_base;
   $this->valor_iva = $old_value_valor_iva;
   $this->montocan = $old_value_montocan;
   $this->saldodocumento = $old_value_saldodocumento;
   $this->valpagar = $old_value_valpagar;
   $this->ret = $old_value_ret;
   $this->val_ica = $old_value_val_ica;
   $this->porc_reteiva = $old_value_porc_reteiva;
   $this->val_reteiva = $old_value_val_reteiva;
   $this->descuent = $old_value_descuent;
   $this->total_cuenta = $old_value_total_cuenta;
   $this->idpago = $old_value_idpago;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_hacerpagos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_hacerpagos_pack_protect_string(NM_charset_to_utf8($rs->fields[0]))));
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ica'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"porc_ica\"";
          if (isset($this->NM_ajax_info['select_html']['porc_ica']) && !empty($this->NM_ajax_info['select_html']['porc_ica']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['porc_ica']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->porc_ica == $sValue)
                  {
                      $this->_tmp_lookup_porc_ica = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['porc_ica'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['porc_ica']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['porc_ica']['valList'][$i] = form_hacerpagos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['porc_ica']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['porc_ica']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['porc_ica']['labList'] = $aLabel;
          }
   }

          //----- val_ica
   function ajax_return_values_val_ica($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("val_ica", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->val_ica);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['val_ica'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- porc_reteiva
   function ajax_return_values_porc_reteiva($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("porc_reteiva", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->porc_reteiva);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['porc_reteiva'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- val_reteiva
   function ajax_return_values_val_reteiva($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("val_reteiva", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->val_reteiva);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['val_reteiva'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- descuent
   function ajax_return_values_descuent($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("descuent", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->descuent);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['descuent'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- iddocapagar
   function ajax_return_values_iddocapagar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("iddocapagar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->iddocapagar);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['iddocapagar'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- total_cuenta
   function ajax_return_values_total_cuenta($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("total_cuenta", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->total_cuenta);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['total_cuenta'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- id_concepto
   function ajax_return_values_id_concepto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_concepto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_concepto);
              $aLookup = array();
              $this->_tmp_lookup_id_concepto = $this->id_concepto;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_id_concepto']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_id_concepto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_id_concepto']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_id_concepto'] = array(); 
}
$aLookup[] = array(form_hacerpagos_pack_protect_string('') => str_replace('<', '&lt;',form_hacerpagos_pack_protect_string('SELECCIONE')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_id_concepto'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_numpago = $this->numpago;
   $old_value_fecpago = $this->fecpago;
   $old_value_valor_base = $this->valor_base;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_montocan = $this->montocan;
   $old_value_saldodocumento = $this->saldodocumento;
   $old_value_valpagar = $this->valpagar;
   $old_value_ret = $this->ret;
   $old_value_val_ica = $this->val_ica;
   $old_value_porc_reteiva = $this->porc_reteiva;
   $old_value_val_reteiva = $this->val_reteiva;
   $old_value_descuent = $this->descuent;
   $old_value_total_cuenta = $this->total_cuenta;
   $old_value_idpago = $this->idpago;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numpago = $this->numpago;
   $unformatted_value_fecpago = $this->fecpago;
   $unformatted_value_valor_base = $this->valor_base;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_montocan = $this->montocan;
   $unformatted_value_saldodocumento = $this->saldodocumento;
   $unformatted_value_valpagar = $this->valpagar;
   $unformatted_value_ret = $this->ret;
   $unformatted_value_val_ica = $this->val_ica;
   $unformatted_value_porc_reteiva = $this->porc_reteiva;
   $unformatted_value_val_reteiva = $this->val_reteiva;
   $unformatted_value_descuent = $this->descuent;
   $unformatted_value_total_cuenta = $this->total_cuenta;
   $unformatted_value_idpago = $this->idpago;

   $nm_comando = "SELECT idpagos_conceptos, concat(codigo,'/',descripcion)  FROM pagos_conceptos where tipodoc like 'CE' ORDER BY codigo";

   $this->numpago = $old_value_numpago;
   $this->fecpago = $old_value_fecpago;
   $this->valor_base = $old_value_valor_base;
   $this->valor_iva = $old_value_valor_iva;
   $this->montocan = $old_value_montocan;
   $this->saldodocumento = $old_value_saldodocumento;
   $this->valpagar = $old_value_valpagar;
   $this->ret = $old_value_ret;
   $this->val_ica = $old_value_val_ica;
   $this->porc_reteiva = $old_value_porc_reteiva;
   $this->val_reteiva = $old_value_val_reteiva;
   $this->descuent = $old_value_descuent;
   $this->total_cuenta = $old_value_total_cuenta;
   $this->idpago = $old_value_idpago;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_hacerpagos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_hacerpagos_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_id_concepto'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"id_concepto\"";
          if (isset($this->NM_ajax_info['select_html']['id_concepto']) && !empty($this->NM_ajax_info['select_html']['id_concepto']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_concepto']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->id_concepto == $sValue)
                  {
                      $this->_tmp_lookup_id_concepto = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_concepto'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_concepto']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_concepto']['valList'][$i] = form_hacerpagos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_concepto']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_concepto']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_concepto']['labList'] = $aLabel;
          }
   }

          //----- obs
   function ajax_return_values_obs($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("obs", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->obs);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['obs'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- conc
   function ajax_return_values_conc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("conc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->conc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['conc'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- detallepagos
   function ajax_return_values_detallepagos($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("detallepagos", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->detallepagos);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['detallepagos'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- idpago
   function ajax_return_values_idpago($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idpago", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idpago);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idpago'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("idpago", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- archivos
   function ajax_return_values_archivos($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("archivos", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->archivos);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['archivos'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_asent = $this->asent;
    $original_banco = $this->banco;
    $original_descuent = $this->descuent;
    $original_docapagar = $this->docapagar;
    $original_fecpago = $this->fecpago;
    $original_iddocapagar = $this->iddocapagar;
    $original_idpago = $this->idpago;
    $original_ncuenta_tercero = $this->ncuenta_tercero;
    $original_numpago = $this->numpago;
    $original_porc_ica = $this->porc_ica;
    $original_porc_ret = $this->porc_ret;
    $original_porc_reteiva = $this->porc_reteiva;
    $original_ret = $this->ret;
    $original_saldodocumento = $this->saldodocumento;
    $original_titulo = $this->titulo;
    $original_val_ica = $this->val_ica;
    $original_val_reteiva = $this->val_reteiva;
    $original_valor_base = $this->valor_base;
    $original_valor_iva = $this->valor_iva;
    $original_valpagar = $this->valpagar;
}
if (!isset($this->sc_temp_gSw)) {$this->sc_temp_gSw = (isset($_SESSION['gSw'])) ? $_SESSION['gSw'] : "";}
if (!isset($this->sc_temp_gidbanco)) {$this->sc_temp_gidbanco = (isset($_SESSION['gidbanco'])) ? $_SESSION['gidbanco'] : "";}
if (!isset($this->sc_temp_gsiescajero)) {$this->sc_temp_gsiescajero = (isset($_SESSION['gsiescajero'])) ? $_SESSION['gsiescajero'] : "";}
if (!isset($this->sc_temp_gmensaje_ce)) {$this->sc_temp_gmensaje_ce = (isset($_SESSION['gmensaje_ce'])) ? $_SESSION['gmensaje_ce'] : "";}
if (!isset($this->sc_temp_gnumeroce)) {$this->sc_temp_gnumeroce = (isset($_SESSION['gnumeroce'])) ? $_SESSION['gnumeroce'] : "";}
  $this->sc_temp_gnumeroce   = $this->fecpago .'_CE_00_'.$this->idpago ;

if(!empty($this->ncuenta_tercero ))
{
	$this->sc_temp_gmensaje_ce = '';
	$this->sc_temp_gmensaje_ce = 'Cuenta: '.$this->ncuenta_tercero ;
	$this->sc_field_readonly("docapagar", 'on');
}
else
{
	$this->sc_field_readonly("docapagar", 'off');
}

if(!empty($this->docapagar ))
{
	$vpos  = strpos($this->sc_temp_gmensaje_ce, "Documento");
			
	if($vpos === false)
	{
		if(!empty($this->sc_temp_gmensaje_ce))
		{
			$this->sc_temp_gmensaje_ce .= ' -- Documento: 00/'.$this->docapagar ;		
		}
		else
		{
			$this->sc_temp_gmensaje_ce .= ' Documento: 00/'.$this->docapagar ;	
		}
	}
}
$this->titulo  = $this->sc_temp_gmensaje_ce;

if(empty($this->idpago ))
{
	if($this->sc_temp_gsiescajero=='SI')
	{
		if(!empty($this->sc_temp_gidbanco))
		{
			$this->banco  = $this->sc_temp_gidbanco;
		}
	}
}

if ($this->numpago >0)
	{
	$sql_traeBI="select total, valoriva, saldo from facturacom where idfaccom=$this->iddocapagar ";
	 
      $nm_select = $sql_traeBI; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_ValBI = array();
      $this->dt_valbi = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dt_ValBI[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->dt_valbi[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_ValBI = false;
          $this->dt_ValBI_erro = $this->Db->ErrorMsg();
          $this->dt_valbi = false;
          $this->dt_valbi_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->dt_valbi[0][0]))
		{
		$this->valor_base =$this->dt_valbi[0][0]-$this->dt_valbi[0][1];
		$this->valor_iva =$this->dt_valbi[0][1];
		$this->valpagar =$this->dt_valbi[0][2]-($this->ret +$this->val_ica +$this->val_reteiva +$this->descuent );
		if($this->valpagar <0)
			{
			$this->valpagar =0;
			}
		}
	
	else
		{
		$this->valor_base =0.00;
		$this->valor_iva =0.00;
		}
	
	
	
	if ($this->asent =='SI')
	{
	$this->Ini->nm_hidden_blocos[6] = "off"; $this->NM_ajax_info['blockDisplay']['6'] = 'off';
	$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;
	$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
	}
else
	{
	$this->Ini->nm_hidden_blocos[6] = "on"; $this->NM_ajax_info['blockDisplay']['6'] = 'on';
	}
	
	$this->sc_temp_gSw=$this->fSiAsentada();
	$this->fDescuento();
	
	 
      $nm_select = "select sum(monto) as monto from detallepagos where id_pago=$this->idpago "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dset = array();
     if ($this->idpago != "")
     { 
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
                      $this->dset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dset = false;
          $this->dset_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if($this->dset[0][0]>0)
		{
		$this->sc_field_readonly("ret", 'on');
		$this->sc_field_readonly("descuent", 'on');
		$this->sc_field_readonly("iddocapagar", 'on');
		$this->sc_field_readonly("porc_ret", 'on');
		$this->sc_field_readonly("porc_ica", 'on');
		$this->sc_field_readonly("val_ica", 'on');
		$this->sc_field_readonly("porc_reteiva", 'on');
		$this->sc_field_readonly("val_reteiva", 'on');
		$this->sc_field_readonly("fecpago", 'on');
		$this->sc_field_readonly("banco", 'on');
		$this->sc_field_readonly("ncuenta_tercero", 'on');
		$this->Ini->nm_hidden_blocos[1] = "off"; $this->NM_ajax_info['blockDisplay']['1'] = 'off';
		}
	else
		{
		$this->sc_field_readonly("ret", 'off');
		$this->sc_field_readonly("descuent", 'off');
		$this->sc_field_readonly("iddocapagar", 'off');
		$this->sc_field_readonly("porc_ret", 'off');
		$this->sc_field_readonly("porc_ica", 'off');
		$this->sc_field_readonly("val_ica", 'off');
		$this->sc_field_readonly("porc_reteiva", 'off');
		$this->sc_field_readonly("val_reteiva", 'off');
		$this->sc_field_readonly("fecpago", 'off');
		$this->sc_field_readonly("banco", 'off');
		$this->sc_field_readonly("ncuenta_tercero", 'off');
		$this->Ini->nm_hidden_blocos[1] = "on"; $this->NM_ajax_info['blockDisplay']['1'] = 'on';
		}
	}
if (isset($this->sc_temp_gnumeroce)) { $_SESSION['gnumeroce'] = $this->sc_temp_gnumeroce;}
if (isset($this->sc_temp_gmensaje_ce)) { $_SESSION['gmensaje_ce'] = $this->sc_temp_gmensaje_ce;}
if (isset($this->sc_temp_gsiescajero)) { $_SESSION['gsiescajero'] = $this->sc_temp_gsiescajero;}
if (isset($this->sc_temp_gidbanco)) { $_SESSION['gidbanco'] = $this->sc_temp_gidbanco;}
if (isset($this->sc_temp_gSw)) { $_SESSION['gSw'] = $this->sc_temp_gSw;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_asent != $this->asent || (isset($bFlagRead_asent) && $bFlagRead_asent)))
    {
        $this->ajax_return_values_asent(true);
    }
    if (($original_banco != $this->banco || (isset($bFlagRead_banco) && $bFlagRead_banco)))
    {
        $this->ajax_return_values_banco(true);
    }
    if (($original_descuent != $this->descuent || (isset($bFlagRead_descuent) && $bFlagRead_descuent)))
    {
        $this->ajax_return_values_descuent(true);
    }
    if (($original_docapagar != $this->docapagar || (isset($bFlagRead_docapagar) && $bFlagRead_docapagar)))
    {
        $this->ajax_return_values_docapagar(true);
    }
    if (($original_fecpago != $this->fecpago || (isset($bFlagRead_fecpago) && $bFlagRead_fecpago)))
    {
        $this->ajax_return_values_fecpago(true);
    }
    if (($original_iddocapagar != $this->iddocapagar || (isset($bFlagRead_iddocapagar) && $bFlagRead_iddocapagar)))
    {
        $this->ajax_return_values_iddocapagar(true);
    }
    if (($original_idpago != $this->idpago || (isset($bFlagRead_idpago) && $bFlagRead_idpago)))
    {
        $this->ajax_return_values_idpago(true);
    }
    if (($original_ncuenta_tercero != $this->ncuenta_tercero || (isset($bFlagRead_ncuenta_tercero) && $bFlagRead_ncuenta_tercero)))
    {
        $this->ajax_return_values_ncuenta_tercero(true);
    }
    if (($original_numpago != $this->numpago || (isset($bFlagRead_numpago) && $bFlagRead_numpago)))
    {
        $this->ajax_return_values_numpago(true);
    }
    if (($original_porc_ica != $this->porc_ica || (isset($bFlagRead_porc_ica) && $bFlagRead_porc_ica)))
    {
        $this->ajax_return_values_porc_ica(true);
    }
    if (($original_porc_ret != $this->porc_ret || (isset($bFlagRead_porc_ret) && $bFlagRead_porc_ret)))
    {
        $this->ajax_return_values_porc_ret(true);
    }
    if (($original_porc_reteiva != $this->porc_reteiva || (isset($bFlagRead_porc_reteiva) && $bFlagRead_porc_reteiva)))
    {
        $this->ajax_return_values_porc_reteiva(true);
    }
    if (($original_ret != $this->ret || (isset($bFlagRead_ret) && $bFlagRead_ret)))
    {
        $this->ajax_return_values_ret(true);
    }
    if (($original_saldodocumento != $this->saldodocumento || (isset($bFlagRead_saldodocumento) && $bFlagRead_saldodocumento)))
    {
        $this->ajax_return_values_saldodocumento(true);
    }
    if (($original_titulo != $this->titulo || (isset($bFlagRead_titulo) && $bFlagRead_titulo)))
    {
        $this->ajax_return_values_titulo(true);
    }
    if (($original_val_ica != $this->val_ica || (isset($bFlagRead_val_ica) && $bFlagRead_val_ica)))
    {
        $this->ajax_return_values_val_ica(true);
    }
    if (($original_val_reteiva != $this->val_reteiva || (isset($bFlagRead_val_reteiva) && $bFlagRead_val_reteiva)))
    {
        $this->ajax_return_values_val_reteiva(true);
    }
    if (($original_valor_base != $this->valor_base || (isset($bFlagRead_valor_base) && $bFlagRead_valor_base)))
    {
        $this->ajax_return_values_valor_base(true);
    }
    if (($original_valor_iva != $this->valor_iva || (isset($bFlagRead_valor_iva) && $bFlagRead_valor_iva)))
    {
        $this->ajax_return_values_valor_iva(true);
    }
    if (($original_valpagar != $this->valpagar || (isset($bFlagRead_valpagar) && $bFlagRead_valpagar)))
    {
        $this->ajax_return_values_valpagar(true);
    }
}
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off'; 
      }
      if (empty($this->creado))
      {
          $this->creado_hora = $this->creado;
      }
      if (empty($this->actualizado))
      {
          $this->actualizado_hora = $this->actualizado;
      }
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//
   function nm_troca_decimal($sc_parm1, $sc_parm2) 
   { 
      $this->valor_base = str_replace($sc_parm1, $sc_parm2, $this->valor_base); 
      $this->valor_iva = str_replace($sc_parm1, $sc_parm2, $this->valor_iva); 
      $this->montocan = str_replace($sc_parm1, $sc_parm2, $this->montocan); 
      $this->saldodocumento = str_replace($sc_parm1, $sc_parm2, $this->saldodocumento); 
      $this->valpagar = str_replace($sc_parm1, $sc_parm2, $this->valpagar); 
      $this->ret = str_replace($sc_parm1, $sc_parm2, $this->ret); 
      $this->val_ica = str_replace($sc_parm1, $sc_parm2, $this->val_ica); 
      $this->porc_reteiva = str_replace($sc_parm1, $sc_parm2, $this->porc_reteiva); 
      $this->val_reteiva = str_replace($sc_parm1, $sc_parm2, $this->val_reteiva); 
      $this->descuent = str_replace($sc_parm1, $sc_parm2, $this->descuent); 
      $this->total_cuenta = str_replace($sc_parm1, $sc_parm2, $this->total_cuenta); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->valor_base = "'" . $this->valor_base . "'";
      $this->valor_iva = "'" . $this->valor_iva . "'";
      $this->montocan = "'" . $this->montocan . "'";
      $this->saldodocumento = "'" . $this->saldodocumento . "'";
      $this->valpagar = "'" . $this->valpagar . "'";
      $this->ret = "'" . $this->ret . "'";
      $this->val_ica = "'" . $this->val_ica . "'";
      $this->porc_reteiva = "'" . $this->porc_reteiva . "'";
      $this->val_reteiva = "'" . $this->val_reteiva . "'";
      $this->descuent = "'" . $this->descuent . "'";
      $this->total_cuenta = "'" . $this->total_cuenta . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->valor_base = str_replace("'", "", $this->valor_base); 
      $this->valor_iva = str_replace("'", "", $this->valor_iva); 
      $this->montocan = str_replace("'", "", $this->montocan); 
      $this->saldodocumento = str_replace("'", "", $this->saldodocumento); 
      $this->valpagar = str_replace("'", "", $this->valpagar); 
      $this->ret = str_replace("'", "", $this->ret); 
      $this->val_ica = str_replace("'", "", $this->val_ica); 
      $this->porc_reteiva = str_replace("'", "", $this->porc_reteiva); 
      $this->val_reteiva = str_replace("'", "", $this->val_reteiva); 
      $this->descuent = str_replace("'", "", $this->descuent); 
      $this->total_cuenta = str_replace("'", "", $this->total_cuenta); 
   } 
//----------- 

   function return_after_insert()
   {
      global $sc_where;
      $sc_where_pos = " WHERE ((idpago > $this->idpago))";
      if ('' != $sc_where)
      {
          if ('where ' == strtolower(substr(trim($sc_where), 0, 6)))
          {
              $sc_where = substr(trim($sc_where), 6);
          }
          if ('and ' == strtolower(substr(trim($sc_where), 0, 4)))
          {
              $sc_where = substr(trim($sc_where), 4);
          }
          $sc_where_pos .= ' AND (' . $sc_where . ')';
          $sc_where = ' WHERE ' . $sc_where;
      }
      if ('' != $this->idpago)
      {
          $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count;
          $rsc = $this->Db->Execute($nmgp_sel_count);
          if ($rsc === false && !$rsc->EOF)
          {
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
              exit;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start'] = $rsc->fields[0];
          $rsc->Close();
      }
   }

   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros
    function handleDbErrorMessage(&$dbErrorMessage, $dbErrorCode)
    {
        if (1267 == $dbErrorCode) {
            $dbErrorMessage = $this->Ini->Nm_lang['lang_errm_db_invalid_collation'];
        }
    }


   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
    if ("incluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
  $this->usuario =$this->sc_temp_gidtercero;
if (isset($this->sc_temp_gidtercero)) { $_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off'; 
    }
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_idpago = $this->idpago;
}
  $vAsent="";
$hoy= date('d-m-Y');
$fecha_del=date("Y-m-d", strtotime($hoy));
$vAsent=$this->fSiAsentada();
if($vAsent==1)
	{
	
	
     $nm_select ="delete from caja where idrp='".$this->idpago ."'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_hacerpagos_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_idpago != $this->idpago || (isset($bFlagRead_idpago) && $bFlagRead_idpago)))
    {
        $this->ajax_return_values_idpago(true);
    }
}
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $this->nmgp_opcao ; 
          if ($this->nmgp_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          else
          { 
              $this->sc_evento = ""; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->NM_rollback_db(); 
          $this->Campos_Mens_erro = ""; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Ini->sc_tem_trans_banco = $this->Db->BeginTrans(); 
      } 
      $NM_val_form['numpago'] = $this->numpago;
      $NM_val_form['titulo'] = $this->titulo;
      $NM_val_form['cod_cuenta'] = $this->cod_cuenta;
      $NM_val_form['ncuenta_tercero'] = $this->ncuenta_tercero;
      $NM_val_form['docapagar'] = $this->docapagar;
      $NM_val_form['fecpago'] = $this->fecpago;
      $NM_val_form['client'] = $this->client;
      $NM_val_form['banco'] = $this->banco;
      $NM_val_form['asent'] = $this->asent;
      $NM_val_form['valor_base'] = $this->valor_base;
      $NM_val_form['valor_iva'] = $this->valor_iva;
      $NM_val_form['montocan'] = $this->montocan;
      $NM_val_form['saldodocumento'] = $this->saldodocumento;
      $NM_val_form['valpagar'] = $this->valpagar;
      $NM_val_form['porc_ret'] = $this->porc_ret;
      $NM_val_form['ret'] = $this->ret;
      $NM_val_form['porc_ica'] = $this->porc_ica;
      $NM_val_form['val_ica'] = $this->val_ica;
      $NM_val_form['porc_reteiva'] = $this->porc_reteiva;
      $NM_val_form['val_reteiva'] = $this->val_reteiva;
      $NM_val_form['descuent'] = $this->descuent;
      $NM_val_form['iddocapagar'] = $this->iddocapagar;
      $NM_val_form['total_cuenta'] = $this->total_cuenta;
      $NM_val_form['id_concepto'] = $this->id_concepto;
      $NM_val_form['obs'] = $this->obs;
      $NM_val_form['conc'] = $this->conc;
      $NM_val_form['detallepagos'] = $this->detallepagos;
      $NM_val_form['idpago'] = $this->idpago;
      $NM_val_form['archivos'] = $this->archivos;
      $NM_val_form['usuario'] = $this->usuario;
      $NM_val_form['creado'] = $this->creado;
      $NM_val_form['actualizado'] = $this->actualizado;
      if ($this->idpago === "" || is_null($this->idpago))  
      { 
          $this->idpago = 0;
      } 
      if ($this->numpago === "" || is_null($this->numpago))  
      { 
          $this->numpago = 0;
          $this->sc_force_zero[] = 'numpago';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->client === "" || is_null($this->client))  
      { 
          $this->client = 0;
          $this->sc_force_zero[] = 'client';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->montocan === "" || is_null($this->montocan))  
      { 
          $this->montocan = 0;
          $this->sc_force_zero[] = 'montocan';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->ret === "" || is_null($this->ret))  
      { 
          $this->ret = 0;
          $this->sc_force_zero[] = 'ret';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->descuent === "" || is_null($this->descuent))  
      { 
          $this->descuent = 0;
          $this->sc_force_zero[] = 'descuent';
      } 
      }
      if ($this->iddocapagar === "" || is_null($this->iddocapagar))  
      { 
          $this->iddocapagar = 0;
          $this->sc_force_zero[] = 'iddocapagar';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->saldodocumento === "" || is_null($this->saldodocumento))  
      { 
          $this->saldodocumento = 0;
          $this->sc_force_zero[] = 'saldodocumento';
      } 
      }
      if ($this->porc_ret === "" || is_null($this->porc_ret))  
      { 
          $this->porc_ret = 0;
          $this->sc_force_zero[] = 'porc_ret';
      } 
      if ($this->val_ica === "" || is_null($this->val_ica))  
      { 
          $this->val_ica = 0;
          $this->sc_force_zero[] = 'val_ica';
      } 
      if ($this->porc_ica === "" || is_null($this->porc_ica))  
      { 
          $this->porc_ica = 0;
          $this->sc_force_zero[] = 'porc_ica';
      } 
      if ($this->porc_reteiva === "" || is_null($this->porc_reteiva))  
      { 
          $this->porc_reteiva = 0;
          $this->sc_force_zero[] = 'porc_reteiva';
      } 
      if ($this->val_reteiva === "" || is_null($this->val_reteiva))  
      { 
          $this->val_reteiva = 0;
          $this->sc_force_zero[] = 'val_reteiva';
      } 
      if ($this->banco === "" || is_null($this->banco))  
      { 
          $this->banco = 0;
          $this->sc_force_zero[] = 'banco';
      } 
      if ($this->usuario === "" || is_null($this->usuario))  
      { 
          $this->usuario = 0;
          $this->sc_force_zero[] = 'usuario';
      } 
      if ($this->id_concepto === "" || is_null($this->id_concepto))  
      { 
          $this->id_concepto = 0;
          $this->sc_force_zero[] = 'id_concepto';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->fecpago == "")  
          { 
              $this->fecpago = "null"; 
              $NM_val_null[] = "fecpago";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->docapagar_before_qstr = $this->docapagar;
          $this->docapagar = substr($this->Db->qstr($this->docapagar), 1, -1); 
          if ($this->docapagar == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->docapagar = "null"; 
              $NM_val_null[] = "docapagar";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->conc_before_qstr = $this->conc;
          $this->conc = substr($this->Db->qstr($this->conc), 1, -1); 
          if ($this->conc == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->conc = "null"; 
              $NM_val_null[] = "conc";
          } 
          $this->obs_before_qstr = $this->obs;
          $this->obs = substr($this->Db->qstr($this->obs), 1, -1); 
          if ($this->obs == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->obs = "null"; 
              $NM_val_null[] = "obs";
          } 
          $this->asent_before_qstr = $this->asent;
          $this->asent = substr($this->Db->qstr($this->asent), 1, -1); 
          if ($this->asent == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->asent = "null"; 
              $NM_val_null[] = "asent";
          } 
          $this->ncuenta_tercero_before_qstr = $this->ncuenta_tercero;
          $this->ncuenta_tercero = substr($this->Db->qstr($this->ncuenta_tercero), 1, -1); 
          if ($this->ncuenta_tercero == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ncuenta_tercero = "null"; 
              $NM_val_null[] = "ncuenta_tercero";
          } 
          if ($this->creado == "")  
          { 
              $this->creado = "null"; 
              $NM_val_null[] = "creado";
          } 
          if ($this->actualizado == "")  
          { 
              $this->actualizado = "null"; 
              $NM_val_null[] = "actualizado";
          } 
          $this->cod_cuenta_before_qstr = $this->cod_cuenta;
          $this->cod_cuenta = substr($this->Db->qstr($this->cod_cuenta), 1, -1); 
          if ($this->cod_cuenta == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cod_cuenta = "null"; 
              $NM_val_null[] = "cod_cuenta";
          } 
          $this->detallepagos_before_qstr = $this->detallepagos;
          $this->detallepagos = substr($this->Db->qstr($this->detallepagos), 1, -1); 
          if ($this->detallepagos == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->detallepagos = "null"; 
              $NM_val_null[] = "detallepagos";
          } 
          $this->archivos_before_qstr = $this->archivos;
          $this->archivos = substr($this->Db->qstr($this->archivos), 1, -1); 
          if ($this->archivos == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->archivos = "null"; 
              $NM_val_null[] = "archivos";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpago = $this->idpago ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpago = $this->idpago "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpago = $this->idpago ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpago = $this->idpago "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpago = $this->idpago ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpago = $this->idpago "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpago = $this->idpago ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpago = $this->idpago "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpago = $this->idpago ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpago = $this->idpago "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_hacerpagos_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $this->actualizado =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->actualizado_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $NM_val_form['actualizado'] = $this->actualizado;
              $this->NM_ajax_changed['actualizado'] = true;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numpago = $this->numpago, client = $this->client, fecpago = #$this->fecpago#, montocan = $this->montocan, ret = $this->ret, descuent = $this->descuent, docapagar = '$this->docapagar', iddocapagar = $this->iddocapagar, saldodocumento = $this->saldodocumento, conc = '$this->conc', obs = '$this->obs', porc_ret = $this->porc_ret, val_ica = $this->val_ica, porc_ica = $this->porc_ica, porc_reteiva = $this->porc_reteiva, val_reteiva = $this->val_reteiva, banco = $this->banco, id_concepto = $this->id_concepto, ncuenta_tercero = '$this->ncuenta_tercero', cod_cuenta = '$this->cod_cuenta'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numpago = $this->numpago, client = $this->client, fecpago = " . $this->Ini->date_delim . $this->fecpago . $this->Ini->date_delim1 . ", montocan = $this->montocan, ret = $this->ret, descuent = $this->descuent, docapagar = '$this->docapagar', iddocapagar = $this->iddocapagar, saldodocumento = $this->saldodocumento, conc = '$this->conc', obs = '$this->obs', porc_ret = $this->porc_ret, val_ica = $this->val_ica, porc_ica = $this->porc_ica, porc_reteiva = $this->porc_reteiva, val_reteiva = $this->val_reteiva, banco = $this->banco, id_concepto = $this->id_concepto, ncuenta_tercero = '$this->ncuenta_tercero', cod_cuenta = '$this->cod_cuenta'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numpago = $this->numpago, client = $this->client, fecpago = " . $this->Ini->date_delim . $this->fecpago . $this->Ini->date_delim1 . ", montocan = $this->montocan, ret = $this->ret, descuent = $this->descuent, docapagar = '$this->docapagar', iddocapagar = $this->iddocapagar, saldodocumento = $this->saldodocumento, conc = '$this->conc', obs = '$this->obs', porc_ret = $this->porc_ret, val_ica = $this->val_ica, porc_ica = $this->porc_ica, porc_reteiva = $this->porc_reteiva, val_reteiva = $this->val_reteiva, banco = $this->banco, id_concepto = $this->id_concepto, ncuenta_tercero = '$this->ncuenta_tercero', cod_cuenta = '$this->cod_cuenta'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numpago = $this->numpago, client = $this->client, fecpago = EXTEND('$this->fecpago', YEAR TO DAY), montocan = $this->montocan, ret = $this->ret, descuent = $this->descuent, docapagar = '$this->docapagar', iddocapagar = $this->iddocapagar, saldodocumento = $this->saldodocumento, conc = '$this->conc', obs = '$this->obs', porc_ret = $this->porc_ret, val_ica = $this->val_ica, porc_ica = $this->porc_ica, porc_reteiva = $this->porc_reteiva, val_reteiva = $this->val_reteiva, banco = $this->banco, id_concepto = $this->id_concepto, ncuenta_tercero = '$this->ncuenta_tercero', cod_cuenta = '$this->cod_cuenta'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numpago = $this->numpago, client = $this->client, fecpago = " . $this->Ini->date_delim . $this->fecpago . $this->Ini->date_delim1 . ", montocan = $this->montocan, ret = $this->ret, descuent = $this->descuent, docapagar = '$this->docapagar', iddocapagar = $this->iddocapagar, saldodocumento = $this->saldodocumento, conc = '$this->conc', obs = '$this->obs', porc_ret = $this->porc_ret, val_ica = $this->val_ica, porc_ica = $this->porc_ica, porc_reteiva = $this->porc_reteiva, val_reteiva = $this->val_reteiva, banco = $this->banco, id_concepto = $this->id_concepto, ncuenta_tercero = '$this->ncuenta_tercero', cod_cuenta = '$this->cod_cuenta'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numpago = $this->numpago, client = $this->client, fecpago = " . $this->Ini->date_delim . $this->fecpago . $this->Ini->date_delim1 . ", montocan = $this->montocan, ret = $this->ret, descuent = $this->descuent, docapagar = '$this->docapagar', iddocapagar = $this->iddocapagar, saldodocumento = $this->saldodocumento, conc = '$this->conc', obs = '$this->obs', porc_ret = $this->porc_ret, val_ica = $this->val_ica, porc_ica = $this->porc_ica, porc_reteiva = $this->porc_reteiva, val_reteiva = $this->val_reteiva, banco = $this->banco, id_concepto = $this->id_concepto, ncuenta_tercero = '$this->ncuenta_tercero', cod_cuenta = '$this->cod_cuenta'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numpago = $this->numpago, client = $this->client, fecpago = " . $this->Ini->date_delim . $this->fecpago . $this->Ini->date_delim1 . ", montocan = $this->montocan, ret = $this->ret, descuent = $this->descuent, docapagar = '$this->docapagar', iddocapagar = $this->iddocapagar, saldodocumento = $this->saldodocumento, conc = '$this->conc', obs = '$this->obs', porc_ret = $this->porc_ret, val_ica = $this->val_ica, porc_ica = $this->porc_ica, porc_reteiva = $this->porc_reteiva, val_reteiva = $this->val_reteiva, banco = $this->banco, id_concepto = $this->id_concepto, ncuenta_tercero = '$this->ncuenta_tercero', cod_cuenta = '$this->cod_cuenta'"; 
              } 
              if (isset($NM_val_form['usuario']) && $NM_val_form['usuario'] != $this->nmgp_dados_select['usuario']) 
              { 
                  $SC_fields_update[] = "usuario = $this->usuario"; 
              } 
              if (isset($NM_val_form['creado']) && $NM_val_form['creado'] != $this->nmgp_dados_select['creado']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "creado = #$this->creado#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "creado = EXTEND('" . $this->creado . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "creado = " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['actualizado']) && $NM_val_form['actualizado'] != $this->nmgp_dados_select['actualizado']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "actualizado = #$this->actualizado#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "actualizado = EXTEND('" . $this->actualizado . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "actualizado = " . $this->Ini->date_delim . $this->actualizado . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE idpago = $this->idpago ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE idpago = $this->idpago ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE idpago = $this->idpago ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE idpago = $this->idpago ";  
              }  
              else  
              {
                  $comando .= " WHERE idpago = $this->idpago ";  
              }  
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $useUpdateProcedure = false;
              if (!empty($SC_fields_update) || $useUpdateProcedure)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $dbErrorMessage = $this->Db->ErrorMsg();
                          $dbErrorCode = $this->Db->ErrorNo();
                          $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $dbErrorMessage, true);
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $dbErrorMessage;
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_hacerpagos_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->docapagar = $this->docapagar_before_qstr;
              $this->conc = $this->conc_before_qstr;
              $this->obs = $this->obs_before_qstr;
              $this->asent = $this->asent_before_qstr;
              $this->ncuenta_tercero = $this->ncuenta_tercero_before_qstr;
              $this->cod_cuenta = $this->cod_cuenta_before_qstr;
              $this->detallepagos = $this->detallepagos_before_qstr;
              $this->archivos = $this->archivos_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['idpago'])) { $this->idpago = $NM_val_form['idpago']; }
              elseif (isset($this->idpago)) { $this->nm_limpa_alfa($this->idpago); }
              if     (isset($NM_val_form) && isset($NM_val_form['numpago'])) { $this->numpago = $NM_val_form['numpago']; }
              elseif (isset($this->numpago)) { $this->nm_limpa_alfa($this->numpago); }
              if     (isset($NM_val_form) && isset($NM_val_form['client'])) { $this->client = $NM_val_form['client']; }
              elseif (isset($this->client)) { $this->nm_limpa_alfa($this->client); }
              if     (isset($NM_val_form) && isset($NM_val_form['montocan'])) { $this->montocan = $NM_val_form['montocan']; }
              elseif (isset($this->montocan)) { $this->nm_limpa_alfa($this->montocan); }
              if     (isset($NM_val_form) && isset($NM_val_form['ret'])) { $this->ret = $NM_val_form['ret']; }
              elseif (isset($this->ret)) { $this->nm_limpa_alfa($this->ret); }
              if     (isset($NM_val_form) && isset($NM_val_form['descuent'])) { $this->descuent = $NM_val_form['descuent']; }
              elseif (isset($this->descuent)) { $this->nm_limpa_alfa($this->descuent); }
              if     (isset($NM_val_form) && isset($NM_val_form['docapagar'])) { $this->docapagar = $NM_val_form['docapagar']; }
              elseif (isset($this->docapagar)) { $this->nm_limpa_alfa($this->docapagar); }
              if     (isset($NM_val_form) && isset($NM_val_form['iddocapagar'])) { $this->iddocapagar = $NM_val_form['iddocapagar']; }
              elseif (isset($this->iddocapagar)) { $this->nm_limpa_alfa($this->iddocapagar); }
              if     (isset($NM_val_form) && isset($NM_val_form['saldodocumento'])) { $this->saldodocumento = $NM_val_form['saldodocumento']; }
              elseif (isset($this->saldodocumento)) { $this->nm_limpa_alfa($this->saldodocumento); }
              if     (isset($NM_val_form) && isset($NM_val_form['conc'])) { $this->conc = $NM_val_form['conc']; }
              elseif (isset($this->conc)) { $this->nm_limpa_alfa($this->conc); }
              if     (isset($NM_val_form) && isset($NM_val_form['obs'])) { $this->obs = $NM_val_form['obs']; }
              elseif (isset($this->obs)) { $this->nm_limpa_alfa($this->obs); }
              if     (isset($NM_val_form) && isset($NM_val_form['asent'])) { $this->asent = $NM_val_form['asent']; }
              elseif (isset($this->asent)) { $this->nm_limpa_alfa($this->asent); }
              if     (isset($NM_val_form) && isset($NM_val_form['porc_ret'])) { $this->porc_ret = $NM_val_form['porc_ret']; }
              elseif (isset($this->porc_ret)) { $this->nm_limpa_alfa($this->porc_ret); }
              if     (isset($NM_val_form) && isset($NM_val_form['val_ica'])) { $this->val_ica = $NM_val_form['val_ica']; }
              elseif (isset($this->val_ica)) { $this->nm_limpa_alfa($this->val_ica); }
              if     (isset($NM_val_form) && isset($NM_val_form['porc_ica'])) { $this->porc_ica = $NM_val_form['porc_ica']; }
              elseif (isset($this->porc_ica)) { $this->nm_limpa_alfa($this->porc_ica); }
              if     (isset($NM_val_form) && isset($NM_val_form['porc_reteiva'])) { $this->porc_reteiva = $NM_val_form['porc_reteiva']; }
              elseif (isset($this->porc_reteiva)) { $this->nm_limpa_alfa($this->porc_reteiva); }
              if     (isset($NM_val_form) && isset($NM_val_form['val_reteiva'])) { $this->val_reteiva = $NM_val_form['val_reteiva']; }
              elseif (isset($this->val_reteiva)) { $this->nm_limpa_alfa($this->val_reteiva); }
              if     (isset($NM_val_form) && isset($NM_val_form['banco'])) { $this->banco = $NM_val_form['banco']; }
              elseif (isset($this->banco)) { $this->nm_limpa_alfa($this->banco); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_concepto'])) { $this->id_concepto = $NM_val_form['id_concepto']; }
              elseif (isset($this->id_concepto)) { $this->nm_limpa_alfa($this->id_concepto); }
              if     (isset($NM_val_form) && isset($NM_val_form['ncuenta_tercero'])) { $this->ncuenta_tercero = $NM_val_form['ncuenta_tercero']; }
              elseif (isset($this->ncuenta_tercero)) { $this->nm_limpa_alfa($this->ncuenta_tercero); }
              if     (isset($NM_val_form) && isset($NM_val_form['cod_cuenta'])) { $this->cod_cuenta = $NM_val_form['cod_cuenta']; }
              elseif (isset($this->cod_cuenta)) { $this->nm_limpa_alfa($this->cod_cuenta); }
              if     (isset($NM_val_form) && isset($NM_val_form['detallepagos'])) { $this->detallepagos = $NM_val_form['detallepagos']; }
              elseif (isset($this->detallepagos)) { $this->nm_limpa_alfa($this->detallepagos); }
              if     (isset($NM_val_form) && isset($NM_val_form['archivos'])) { $this->archivos = $NM_val_form['archivos']; }
              elseif (isset($this->archivos)) { $this->nm_limpa_alfa($this->archivos); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('numpago', 'titulo', 'cod_cuenta', 'ncuenta_tercero', 'docapagar', 'fecpago', 'client', 'banco', 'asent', 'valor_base', 'valor_iva', 'montocan', 'saldodocumento', 'valpagar', 'porc_ret', 'ret', 'porc_ica', 'val_ica', 'porc_reteiva', 'val_reteiva', 'descuent', 'iddocapagar', 'total_cuenta', 'id_concepto', 'obs', 'conc', 'detallepagos', 'idpago', 'archivos'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "idpago, ";
          } 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(numpago) from " . $this->Ini->nm_tabela; 
          $comando = "select max(numpago) from " . $this->Ini->nm_tabela; 
          $rs = $this->Db->Execute($comando); 
          if ($rs === false && !$rs->EOF)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
              $this->NM_rollback_db(); 
              if ($this->NM_ajax_flag)
              {
                  form_hacerpagos_pack_ajax_response();
              }
              exit; 
          }  
          $this->numpago = $rs->fields[0] + 1;
          $rs->Close(); 
              $this->creado =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->creado_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->actualizado =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->actualizado_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_hacerpagos_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->client != "")
                  { 
                       $compl_insert     .= ", client";
                       $compl_insert_val .= ", $this->client";
                  } 
                  if ($this->montocan != "")
                  { 
                       $compl_insert     .= ", montocan";
                       $compl_insert_val .= ", $this->montocan";
                  } 
                  if ($this->ret != "")
                  { 
                       $compl_insert     .= ", ret";
                       $compl_insert_val .= ", $this->ret";
                  } 
                  if ($this->descuent != "")
                  { 
                       $compl_insert     .= ", descuent";
                       $compl_insert_val .= ", $this->descuent";
                  } 
                  if ($this->saldodocumento != "")
                  { 
                       $compl_insert     .= ", saldodocumento";
                       $compl_insert_val .= ", $this->saldodocumento";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (numpago, fecpago, docapagar, iddocapagar, conc, obs, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva, banco, usuario, id_concepto, ncuenta_tercero, creado, actualizado, cod_cuenta $compl_insert) VALUES ($this->numpago, #$this->fecpago#, '$this->docapagar', $this->iddocapagar, '$this->conc', '$this->obs', $this->porc_ret, $this->val_ica, $this->porc_ica, $this->porc_reteiva, $this->val_reteiva, $this->banco, $this->usuario, $this->id_concepto, '$this->ncuenta_tercero', #$this->creado#, #$this->actualizado#, '$this->cod_cuenta' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->client != "")
                  { 
                       $compl_insert     .= ", client";
                       $compl_insert_val .= ", $this->client";
                  } 
                  if ($this->montocan != "")
                  { 
                       $compl_insert     .= ", montocan";
                       $compl_insert_val .= ", $this->montocan";
                  } 
                  if ($this->ret != "")
                  { 
                       $compl_insert     .= ", ret";
                       $compl_insert_val .= ", $this->ret";
                  } 
                  if ($this->descuent != "")
                  { 
                       $compl_insert     .= ", descuent";
                       $compl_insert_val .= ", $this->descuent";
                  } 
                  if ($this->saldodocumento != "")
                  { 
                       $compl_insert     .= ", saldodocumento";
                       $compl_insert_val .= ", $this->saldodocumento";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numpago, fecpago, docapagar, iddocapagar, conc, obs, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva, banco, usuario, id_concepto, ncuenta_tercero, creado, actualizado, cod_cuenta $compl_insert) VALUES (" . $NM_seq_auto . "$this->numpago, " . $this->Ini->date_delim . $this->fecpago . $this->Ini->date_delim1 . ", '$this->docapagar', $this->iddocapagar, '$this->conc', '$this->obs', $this->porc_ret, $this->val_ica, $this->porc_ica, $this->porc_reteiva, $this->val_reteiva, $this->banco, $this->usuario, $this->id_concepto, '$this->ncuenta_tercero', " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->actualizado . $this->Ini->date_delim1 . ", '$this->cod_cuenta' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->client != "")
                  { 
                       $compl_insert     .= ", client";
                       $compl_insert_val .= ", $this->client";
                  } 
                  if ($this->montocan != "")
                  { 
                       $compl_insert     .= ", montocan";
                       $compl_insert_val .= ", $this->montocan";
                  } 
                  if ($this->ret != "")
                  { 
                       $compl_insert     .= ", ret";
                       $compl_insert_val .= ", $this->ret";
                  } 
                  if ($this->descuent != "")
                  { 
                       $compl_insert     .= ", descuent";
                       $compl_insert_val .= ", $this->descuent";
                  } 
                  if ($this->saldodocumento != "")
                  { 
                       $compl_insert     .= ", saldodocumento";
                       $compl_insert_val .= ", $this->saldodocumento";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numpago, fecpago, docapagar, iddocapagar, conc, obs, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva, banco, usuario, id_concepto, ncuenta_tercero, creado, actualizado, cod_cuenta $compl_insert) VALUES (" . $NM_seq_auto . "$this->numpago, " . $this->Ini->date_delim . $this->fecpago . $this->Ini->date_delim1 . ", '$this->docapagar', $this->iddocapagar, '$this->conc', '$this->obs', $this->porc_ret, $this->val_ica, $this->porc_ica, $this->porc_reteiva, $this->val_reteiva, $this->banco, $this->usuario, $this->id_concepto, '$this->ncuenta_tercero', " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->actualizado . $this->Ini->date_delim1 . ", '$this->cod_cuenta' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->client != "")
                  { 
                       $compl_insert     .= ", client";
                       $compl_insert_val .= ", $this->client";
                  } 
                  if ($this->montocan != "")
                  { 
                       $compl_insert     .= ", montocan";
                       $compl_insert_val .= ", $this->montocan";
                  } 
                  if ($this->ret != "")
                  { 
                       $compl_insert     .= ", ret";
                       $compl_insert_val .= ", $this->ret";
                  } 
                  if ($this->descuent != "")
                  { 
                       $compl_insert     .= ", descuent";
                       $compl_insert_val .= ", $this->descuent";
                  } 
                  if ($this->saldodocumento != "")
                  { 
                       $compl_insert     .= ", saldodocumento";
                       $compl_insert_val .= ", $this->saldodocumento";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numpago, fecpago, docapagar, iddocapagar, conc, obs, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva, banco, usuario, id_concepto, ncuenta_tercero, creado, actualizado, cod_cuenta $compl_insert) VALUES (" . $NM_seq_auto . "$this->numpago, " . $this->Ini->date_delim . $this->fecpago . $this->Ini->date_delim1 . ", '$this->docapagar', $this->iddocapagar, '$this->conc', '$this->obs', $this->porc_ret, $this->val_ica, $this->porc_ica, $this->porc_reteiva, $this->val_reteiva, $this->banco, $this->usuario, $this->id_concepto, '$this->ncuenta_tercero', " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->actualizado . $this->Ini->date_delim1 . ", '$this->cod_cuenta' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->client != "")
                  { 
                       $compl_insert     .= ", client";
                       $compl_insert_val .= ", $this->client";
                  } 
                  if ($this->montocan != "")
                  { 
                       $compl_insert     .= ", montocan";
                       $compl_insert_val .= ", $this->montocan";
                  } 
                  if ($this->ret != "")
                  { 
                       $compl_insert     .= ", ret";
                       $compl_insert_val .= ", $this->ret";
                  } 
                  if ($this->descuent != "")
                  { 
                       $compl_insert     .= ", descuent";
                       $compl_insert_val .= ", $this->descuent";
                  } 
                  if ($this->saldodocumento != "")
                  { 
                       $compl_insert     .= ", saldodocumento";
                       $compl_insert_val .= ", $this->saldodocumento";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numpago, fecpago, docapagar, iddocapagar, conc, obs, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva, banco, usuario, id_concepto, ncuenta_tercero, creado, actualizado, cod_cuenta $compl_insert) VALUES (" . $NM_seq_auto . "$this->numpago, EXTEND('$this->fecpago', YEAR TO DAY), '$this->docapagar', $this->iddocapagar, '$this->conc', '$this->obs', $this->porc_ret, $this->val_ica, $this->porc_ica, $this->porc_reteiva, $this->val_reteiva, $this->banco, $this->usuario, $this->id_concepto, '$this->ncuenta_tercero', EXTEND('$this->creado', YEAR TO FRACTION), EXTEND('$this->actualizado', YEAR TO FRACTION), '$this->cod_cuenta' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->client != "")
                  { 
                       $compl_insert     .= ", client";
                       $compl_insert_val .= ", $this->client";
                  } 
                  if ($this->montocan != "")
                  { 
                       $compl_insert     .= ", montocan";
                       $compl_insert_val .= ", $this->montocan";
                  } 
                  if ($this->ret != "")
                  { 
                       $compl_insert     .= ", ret";
                       $compl_insert_val .= ", $this->ret";
                  } 
                  if ($this->descuent != "")
                  { 
                       $compl_insert     .= ", descuent";
                       $compl_insert_val .= ", $this->descuent";
                  } 
                  if ($this->saldodocumento != "")
                  { 
                       $compl_insert     .= ", saldodocumento";
                       $compl_insert_val .= ", $this->saldodocumento";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numpago, fecpago, docapagar, iddocapagar, conc, obs, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva, banco, usuario, id_concepto, ncuenta_tercero, creado, actualizado, cod_cuenta $compl_insert) VALUES (" . $NM_seq_auto . "$this->numpago, " . $this->Ini->date_delim . $this->fecpago . $this->Ini->date_delim1 . ", '$this->docapagar', $this->iddocapagar, '$this->conc', '$this->obs', $this->porc_ret, $this->val_ica, $this->porc_ica, $this->porc_reteiva, $this->val_reteiva, $this->banco, $this->usuario, $this->id_concepto, '$this->ncuenta_tercero', " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->actualizado . $this->Ini->date_delim1 . ", '$this->cod_cuenta' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->client != "")
                  { 
                       $compl_insert     .= ", client";
                       $compl_insert_val .= ", $this->client";
                  } 
                  if ($this->montocan != "")
                  { 
                       $compl_insert     .= ", montocan";
                       $compl_insert_val .= ", $this->montocan";
                  } 
                  if ($this->ret != "")
                  { 
                       $compl_insert     .= ", ret";
                       $compl_insert_val .= ", $this->ret";
                  } 
                  if ($this->descuent != "")
                  { 
                       $compl_insert     .= ", descuent";
                       $compl_insert_val .= ", $this->descuent";
                  } 
                  if ($this->saldodocumento != "")
                  { 
                       $compl_insert     .= ", saldodocumento";
                       $compl_insert_val .= ", $this->saldodocumento";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numpago, fecpago, docapagar, iddocapagar, conc, obs, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva, banco, usuario, id_concepto, ncuenta_tercero, creado, actualizado, cod_cuenta $compl_insert) VALUES (" . $NM_seq_auto . "$this->numpago, " . $this->Ini->date_delim . $this->fecpago . $this->Ini->date_delim1 . ", '$this->docapagar', $this->iddocapagar, '$this->conc', '$this->obs', $this->porc_ret, $this->val_ica, $this->porc_ica, $this->porc_reteiva, $this->val_reteiva, $this->banco, $this->usuario, $this->id_concepto, '$this->ncuenta_tercero', " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->actualizado . $this->Ini->date_delim1 . ", '$this->cod_cuenta' $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->client != "")
                  { 
                       $compl_insert     .= ", client";
                       $compl_insert_val .= ", $this->client";
                  } 
                  if ($this->montocan != "")
                  { 
                       $compl_insert     .= ", montocan";
                       $compl_insert_val .= ", $this->montocan";
                  } 
                  if ($this->ret != "")
                  { 
                       $compl_insert     .= ", ret";
                       $compl_insert_val .= ", $this->ret";
                  } 
                  if ($this->descuent != "")
                  { 
                       $compl_insert     .= ", descuent";
                       $compl_insert_val .= ", $this->descuent";
                  } 
                  if ($this->saldodocumento != "")
                  { 
                       $compl_insert     .= ", saldodocumento";
                       $compl_insert_val .= ", $this->saldodocumento";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numpago, fecpago, docapagar, iddocapagar, conc, obs, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva, banco, usuario, id_concepto, ncuenta_tercero, creado, actualizado, cod_cuenta $compl_insert) VALUES (" . $NM_seq_auto . "$this->numpago, " . $this->Ini->date_delim . $this->fecpago . $this->Ini->date_delim1 . ", '$this->docapagar', $this->iddocapagar, '$this->conc', '$this->obs', $this->porc_ret, $this->val_ica, $this->porc_ica, $this->porc_reteiva, $this->val_reteiva, $this->banco, $this->usuario, $this->id_concepto, '$this->ncuenta_tercero', " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->actualizado . $this->Ini->date_delim1 . ", '$this->cod_cuenta' $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->client != "")
                  { 
                       $compl_insert     .= ", client";
                       $compl_insert_val .= ", $this->client";
                  } 
                  if ($this->montocan != "")
                  { 
                       $compl_insert     .= ", montocan";
                       $compl_insert_val .= ", $this->montocan";
                  } 
                  if ($this->ret != "")
                  { 
                       $compl_insert     .= ", ret";
                       $compl_insert_val .= ", $this->ret";
                  } 
                  if ($this->descuent != "")
                  { 
                       $compl_insert     .= ", descuent";
                       $compl_insert_val .= ", $this->descuent";
                  } 
                  if ($this->saldodocumento != "")
                  { 
                       $compl_insert     .= ", saldodocumento";
                       $compl_insert_val .= ", $this->saldodocumento";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numpago, fecpago, docapagar, iddocapagar, conc, obs, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva, banco, usuario, id_concepto, ncuenta_tercero, creado, actualizado, cod_cuenta $compl_insert) VALUES (" . $NM_seq_auto . "$this->numpago, " . $this->Ini->date_delim . $this->fecpago . $this->Ini->date_delim1 . ", '$this->docapagar', $this->iddocapagar, '$this->conc', '$this->obs', $this->porc_ret, $this->val_ica, $this->porc_ica, $this->porc_reteiva, $this->val_reteiva, $this->banco, $this->usuario, $this->id_concepto, '$this->ncuenta_tercero', " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->actualizado . $this->Ini->date_delim1 . ", '$this->cod_cuenta' $compl_insert_val)"; 
              }
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $dbErrorMessage = $this->Db->ErrorMsg();
                      $dbErrorCode = $this->Db->ErrorNo();
                      $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $dbErrorMessage, true);
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
                      { 
                          $this->sc_erro_insert = $dbErrorMessage;
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_hacerpagos_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select @@identity"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_hacerpagos_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->idpago =  $rsy->fields[0];
                 $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idpago = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT dbinfo('sqlca.sqlerrd1') FROM " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idpago = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select .currval from dual"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idpago = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $str_tabela = "SYSIBM.SYSDUMMY1"; 
                  if($this->Ini->nm_con_use_schema == "N") 
                  { 
                          $str_tabela = "SYSDUMMY1"; 
                  } 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT IDENTITY_VAL_LOCAL() FROM " . $str_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idpago = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select CURRVAL('')"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idpago = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select gen_id(, 0) from " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idpago = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idpago = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->docapagar = $this->docapagar_before_qstr;
              $this->conc = $this->conc_before_qstr;
              $this->obs = $this->obs_before_qstr;
              $this->asent = $this->asent_before_qstr;
              $this->ncuenta_tercero = $this->ncuenta_tercero_before_qstr;
              $this->cod_cuenta = $this->cod_cuenta_before_qstr;
              $this->detallepagos = $this->detallepagos_before_qstr;
              $this->archivos = $this->archivos_before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->docapagar = $this->docapagar_before_qstr;
              $this->conc = $this->conc_before_qstr;
              $this->obs = $this->obs_before_qstr;
              $this->asent = $this->asent_before_qstr;
              $this->ncuenta_tercero = $this->ncuenta_tercero_before_qstr;
              $this->cod_cuenta = $this->cod_cuenta_before_qstr;
              $this->detallepagos = $this->detallepagos_before_qstr;
              $this->archivos = $this->archivos_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              $this->return_after_insert();
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->idpago = substr($this->Db->qstr($this->idpago), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpago = $this->idpago"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpago = $this->idpago "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpago = $this->idpago"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpago = $this->idpago "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpago = $this->idpago"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpago = $this->idpago "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpago = $this->idpago"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpago = $this->idpago "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpago = $this->idpago"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpago = $this->idpago "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idpago = $this->idpago "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idpago = $this->idpago "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idpago = $this->idpago "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idpago = $this->idpago "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idpago = $this->idpago "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idpago = $this->idpago "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idpago = $this->idpago "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idpago = $this->idpago "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idpago = $this->idpago "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idpago = $this->idpago "); 
              }  
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_hacerpagos_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              if (empty($this->sc_erro_delete)) {
                  $this->record_delete_ok = true;
              }
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['total']);
              }

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
    if ("insert" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['decimal_db'] == ",")
        {
            $this->nm_troca_decimal(",", ".");
        }
        $_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_client = $this->client;
    $original_docapagar = $this->docapagar;
    $original_iddocapagar = $this->iddocapagar;
    $original_porc_ica = $this->porc_ica;
    $original_porc_ret = $this->porc_ret;
    $original_porc_reteiva = $this->porc_reteiva;
}
if (!isset($this->sc_temp_gSw)) {$this->sc_temp_gSw = (isset($_SESSION['gSw'])) ? $_SESSION['gSw'] : "";}
  $this->sc_temp_gSw=0;
if($this->iddocapagar >0)
	{

     $nm_select ="update facturacom set retencion=$this->porc_ret , reteiva=$this->porc_reteiva , reteica=$this->porc_ica  where numfacom='$this->docapagar' and idprov=$this->client "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_hacerpagos_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	}
if (isset($this->sc_temp_gSw)) { $_SESSION['gSw'] = $this->sc_temp_gSw;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_client != $this->client || (isset($bFlagRead_client) && $bFlagRead_client)))
    {
        $this->ajax_return_values_client(true);
    }
    if (($original_docapagar != $this->docapagar || (isset($bFlagRead_docapagar) && $bFlagRead_docapagar)))
    {
        $this->ajax_return_values_docapagar(true);
    }
    if (($original_iddocapagar != $this->iddocapagar || (isset($bFlagRead_iddocapagar) && $bFlagRead_iddocapagar)))
    {
        $this->ajax_return_values_iddocapagar(true);
    }
    if (($original_porc_ica != $this->porc_ica || (isset($bFlagRead_porc_ica) && $bFlagRead_porc_ica)))
    {
        $this->ajax_return_values_porc_ica(true);
    }
    if (($original_porc_ret != $this->porc_ret || (isset($bFlagRead_porc_ret) && $bFlagRead_porc_ret)))
    {
        $this->ajax_return_values_porc_ret(true);
    }
    if (($original_porc_reteiva != $this->porc_reteiva || (isset($bFlagRead_porc_reteiva) && $bFlagRead_porc_reteiva)))
    {
        $this->ajax_return_values_porc_reteiva(true);
    }
}
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_client = $this->client;
    $original_docapagar = $this->docapagar;
    $original_iddocapagar = $this->iddocapagar;
    $original_porc_ica = $this->porc_ica;
    $original_porc_ret = $this->porc_ret;
    $original_porc_reteiva = $this->porc_reteiva;
}
  if($this->iddocapagar >0)
	{

     $nm_select ="update facturacom set retencion=$this->porc_ret , reteiva=$this->porc_reteiva , reteica=$this->porc_ica  where numfacom='$this->docapagar' and idprov=$this->client "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_hacerpagos_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_client != $this->client || (isset($bFlagRead_client) && $bFlagRead_client)))
    {
        $this->ajax_return_values_client(true);
    }
    if (($original_docapagar != $this->docapagar || (isset($bFlagRead_docapagar) && $bFlagRead_docapagar)))
    {
        $this->ajax_return_values_docapagar(true);
    }
    if (($original_iddocapagar != $this->iddocapagar || (isset($bFlagRead_iddocapagar) && $bFlagRead_iddocapagar)))
    {
        $this->ajax_return_values_iddocapagar(true);
    }
    if (($original_porc_ica != $this->porc_ica || (isset($bFlagRead_porc_ica) && $bFlagRead_porc_ica)))
    {
        $this->ajax_return_values_porc_ica(true);
    }
    if (($original_porc_ret != $this->porc_ret || (isset($bFlagRead_porc_ret) && $bFlagRead_porc_ret)))
    {
        $this->ajax_return_values_porc_ret(true);
    }
    if (($original_porc_reteiva != $this->porc_reteiva || (isset($bFlagRead_porc_reteiva) && $bFlagRead_porc_reteiva)))
    {
        $this->ajax_return_values_porc_reteiva(true);
    }
}
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off'; 
    }
    if ("delete" == $this->sc_evento && $this->nmgp_opcao != "nada") {
      $_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  ?>
<script src="<?php echo sc_url_library('prj', 'js', 'jquery-1.11.1.js'); ?>"></script>
<script src="<?php echo sc_url_library('prj', 'js', 'alertify.js'); ?>"></script>

<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'css/alertify.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'css/themes/default.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'css/themes/semantic.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'css/themes/bootstrap.min.css'); ?>">
<?php

echo "<script>alertify.alert('Alerta', '¡Recibo de egreso eliminado con éxito!', function(){ window.location.href='../grid_pagos'; });</script>";
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $salva_opcao ; 
          if ($salva_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->sc_evento = ""; 
          $this->NM_rollback_db(); 
          return; 
      }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['decimal_db'] == ",")
   {
       $this->nm_troca_decimal(".", ",");
   }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['parms'] = "idpago?#?$this->idpago?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idpago = null === $this->idpago ? null : substr($this->Db->qstr($this->idpago), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['run_iframe'] == "R")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->idpago)) 
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
          else 
          { 
              $this->nmgp_opcao = "igual"; 
          } 
      } 
      if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->nmgp_opcao != "nada" && (trim($this->idpago) == "")) 
      { 
          if ($this->nmgp_opcao == "avanca")  
          { 
              $this->nmgp_opcao = "final"; 
          } 
          elseif ($this->nmgp_opcao != "novo")
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['run_iframe'] == "F" && $this->sc_evento == "insert")
      {
          $this->nmgp_opcao = "final";
      }
      $sc_where = trim("");
      if (substr(strtolower($sc_where), 0, 5) == "where")
      {
          $sc_where  = substr($sc_where , 5);
      }
      if (!empty($sc_where))
      {
          $sc_where = " where " . $sc_where . " ";
      }
      if ('' != $sc_where_filter)
      {
          $sc_where = ('' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_hacerpagos = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['total'] = $qt_geral_reg_form_hacerpagos;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->idpago))
          {
              $Reg_OK      = false;
              $Count_start = -1;
              $sc_order_by = "";
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Sel_Chave = "idpago"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Sel_Chave = "idpago"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Sel_Chave = "idpago"; 
              }
              else  
              {
                  $Sel_Chave = "idpago"; 
              }
              $nmgp_select = "SELECT " . $Sel_Chave . " from " . $this->Ini->nm_tabela . $sc_where; 
              $sc_order_by = "idpago DESC";
              $sc_order_by = str_replace("order by ", "", $sc_order_by);
              $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
              if (!empty($sc_order_by))
              {
                  $nmgp_select .= " order by $sc_order_by "; 
              }
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              while (!$rt->EOF && !$Reg_OK)
              { 
                  if ($rt->fields[0] == $this->idpago)
                  { 
                      $Reg_OK = true;
                  }  
                  $Count_start++;
                  $rt->MoveNext();
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start'] = $Count_start;
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_hacerpagos = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start'] > $qt_geral_reg_form_hacerpagos)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start'] = $qt_geral_reg_form_hacerpagos; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start'] = $qt_geral_reg_form_hacerpagos; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_hacerpagos) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT idpago, numpago, client, str_replace (convert(char(10),fecpago,102), '.', '-') + ' ' + convert(char(8),fecpago,20), montocan, ret, descuent, docapagar, iddocapagar, saldodocumento, conc, obs, asent, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva, banco, usuario, id_concepto, ncuenta_tercero, str_replace (convert(char(10),creado,102), '.', '-') + ' ' + convert(char(8),creado,20), str_replace (convert(char(10),actualizado,102), '.', '-') + ' ' + convert(char(8),actualizado,20), cod_cuenta from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT idpago, numpago, client, convert(char(23),fecpago,121), montocan, ret, descuent, docapagar, iddocapagar, saldodocumento, conc, obs, asent, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva, banco, usuario, id_concepto, ncuenta_tercero, convert(char(23),creado,121), convert(char(23),actualizado,121), cod_cuenta from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT idpago, numpago, client, fecpago, montocan, ret, descuent, docapagar, iddocapagar, saldodocumento, conc, obs, asent, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva, banco, usuario, id_concepto, ncuenta_tercero, creado, actualizado, cod_cuenta from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT idpago, numpago, client, EXTEND(fecpago, YEAR TO DAY), montocan, ret, descuent, docapagar, iddocapagar, saldodocumento, conc, obs, asent, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva, banco, usuario, id_concepto, ncuenta_tercero, EXTEND(creado, YEAR TO FRACTION), EXTEND(actualizado, YEAR TO FRACTION), cod_cuenta from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT idpago, numpago, client, fecpago, montocan, ret, descuent, docapagar, iddocapagar, saldodocumento, conc, obs, asent, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva, banco, usuario, id_concepto, ncuenta_tercero, creado, actualizado, cod_cuenta from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "idpago = $this->idpago"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "idpago = $this->idpago"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "idpago = $this->idpago"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "idpago = $this->idpago"; 
              }  
              else  
              {
                  $aWhere[] = "idpago = $this->idpago"; 
              }  
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "idpago DESC";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "insert" || $this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start']) ;  
              } 
          } 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              if ($this->aba_iframe)
              {
                  $this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->idpago = $rs->fields[0] ; 
              $this->nmgp_dados_select['idpago'] = $this->idpago;
              $this->numpago = $rs->fields[1] ; 
              $this->nmgp_dados_select['numpago'] = $this->numpago;
              $this->client = $rs->fields[2] ; 
              $this->nmgp_dados_select['client'] = $this->client;
              $this->fecpago = $rs->fields[3] ; 
              $this->nmgp_dados_select['fecpago'] = $this->fecpago;
              $this->montocan = trim($rs->fields[4]) ; 
              $this->nmgp_dados_select['montocan'] = $this->montocan;
              $this->ret = trim($rs->fields[5]) ; 
              $this->nmgp_dados_select['ret'] = $this->ret;
              $this->descuent = trim($rs->fields[6]) ; 
              $this->nmgp_dados_select['descuent'] = $this->descuent;
              $this->docapagar = $rs->fields[7] ; 
              $this->nmgp_dados_select['docapagar'] = $this->docapagar;
              $this->iddocapagar = $rs->fields[8] ; 
              $this->nmgp_dados_select['iddocapagar'] = $this->iddocapagar;
              $this->saldodocumento = trim($rs->fields[9]) ; 
              $this->nmgp_dados_select['saldodocumento'] = $this->saldodocumento;
              $this->conc = $rs->fields[10] ; 
              $this->nmgp_dados_select['conc'] = $this->conc;
              $this->obs = $rs->fields[11] ; 
              $this->nmgp_dados_select['obs'] = $this->obs;
              $this->asent = $rs->fields[12] ; 
              $this->nmgp_dados_select['asent'] = $this->asent;
              $this->porc_ret = trim($rs->fields[13]) ; 
              $this->nmgp_dados_select['porc_ret'] = $this->porc_ret;
              $this->val_ica = trim($rs->fields[14]) ; 
              $this->nmgp_dados_select['val_ica'] = $this->val_ica;
              $this->porc_ica = trim($rs->fields[15]) ; 
              $this->nmgp_dados_select['porc_ica'] = $this->porc_ica;
              $this->porc_reteiva = trim($rs->fields[16]) ; 
              $this->nmgp_dados_select['porc_reteiva'] = $this->porc_reteiva;
              $this->val_reteiva = trim($rs->fields[17]) ; 
              $this->nmgp_dados_select['val_reteiva'] = $this->val_reteiva;
              $this->banco = $rs->fields[18] ; 
              $this->nmgp_dados_select['banco'] = $this->banco;
              $this->usuario = $rs->fields[19] ; 
              $this->nmgp_dados_select['usuario'] = $this->usuario;
              $this->id_concepto = $rs->fields[20] ; 
              $this->nmgp_dados_select['id_concepto'] = $this->id_concepto;
              $this->ncuenta_tercero = $rs->fields[21] ; 
              $this->nmgp_dados_select['ncuenta_tercero'] = $this->ncuenta_tercero;
              $this->creado = $rs->fields[22] ; 
              if (substr($this->creado, 10, 1) == "-") 
              { 
                 $this->creado = substr($this->creado, 0, 10) . " " . substr($this->creado, 11);
              } 
              if (substr($this->creado, 13, 1) == ".") 
              { 
                 $this->creado = substr($this->creado, 0, 13) . ":" . substr($this->creado, 14, 2) . ":" . substr($this->creado, 17);
              } 
              $this->nmgp_dados_select['creado'] = $this->creado;
              $this->actualizado = $rs->fields[23] ; 
              if (substr($this->actualizado, 10, 1) == "-") 
              { 
                 $this->actualizado = substr($this->actualizado, 0, 10) . " " . substr($this->actualizado, 11);
              } 
              if (substr($this->actualizado, 13, 1) == ".") 
              { 
                 $this->actualizado = substr($this->actualizado, 0, 13) . ":" . substr($this->actualizado, 14, 2) . ":" . substr($this->actualizado, 17);
              } 
              $this->nmgp_dados_select['actualizado'] = $this->actualizado;
              $this->cod_cuenta = $rs->fields[24] ; 
              $this->nmgp_dados_select['cod_cuenta'] = $this->cod_cuenta;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->idpago = (string)$this->idpago; 
              $this->numpago = (string)$this->numpago; 
              $this->client = (string)$this->client; 
              $this->montocan = (strpos(strtolower($this->montocan), "e")) ? (float)$this->montocan : $this->montocan; 
              $this->montocan = (string)$this->montocan; 
              $this->ret = (strpos(strtolower($this->ret), "e")) ? (float)$this->ret : $this->ret; 
              $this->ret = (string)$this->ret; 
              $this->descuent = (strpos(strtolower($this->descuent), "e")) ? (float)$this->descuent : $this->descuent; 
              $this->descuent = (string)$this->descuent; 
              $this->iddocapagar = (string)$this->iddocapagar; 
              $this->saldodocumento = (strpos(strtolower($this->saldodocumento), "e")) ? (float)$this->saldodocumento : $this->saldodocumento; 
              $this->saldodocumento = (string)$this->saldodocumento; 
              $this->porc_ret = (strpos(strtolower($this->porc_ret), "e")) ? (float)$this->porc_ret : $this->porc_ret; 
              $this->porc_ret = (string)$this->porc_ret; 
              $this->val_ica = (strpos(strtolower($this->val_ica), "e")) ? (float)$this->val_ica : $this->val_ica; 
              $this->val_ica = (string)$this->val_ica; 
              $this->porc_ica = (strpos(strtolower($this->porc_ica), "e")) ? (float)$this->porc_ica : $this->porc_ica; 
              $this->porc_ica = (string)$this->porc_ica; 
              $this->porc_reteiva = (strpos(strtolower($this->porc_reteiva), "e")) ? (float)$this->porc_reteiva : $this->porc_reteiva; 
              $this->porc_reteiva = (string)$this->porc_reteiva; 
              $this->val_reteiva = (strpos(strtolower($this->val_reteiva), "e")) ? (float)$this->val_reteiva : $this->val_reteiva; 
              $this->val_reteiva = (string)$this->val_reteiva; 
              $this->banco = (string)$this->banco; 
              $this->usuario = (string)$this->usuario; 
              $this->id_concepto = (string)$this->id_concepto; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['parms'] = "idpago?#?$this->idpago?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start'] < $qt_geral_reg_form_hacerpagos;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['opcao']   = '';
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->idpago = "";  
              $this->nmgp_dados_form["idpago"] = $this->idpago;
              $this->numpago = "";  
              $this->nmgp_dados_form["numpago"] = $this->numpago;
              $this->client = "";  
              $this->nmgp_dados_form["client"] = $this->client;
              $this->fecpago =  date('Y') . "-" . date('m')  . "-" . date('d');
              $this->nmgp_dados_form["fecpago"] = $this->fecpago;
              $this->montocan = "0";  
              $this->nmgp_dados_form["montocan"] = $this->montocan;
              $this->ret = "0";  
              $this->nmgp_dados_form["ret"] = $this->ret;
              $this->descuent = "0";  
              $this->nmgp_dados_form["descuent"] = $this->descuent;
              $this->docapagar = "";  
              $this->nmgp_dados_form["docapagar"] = $this->docapagar;
              $this->iddocapagar = "";  
              $this->nmgp_dados_form["iddocapagar"] = $this->iddocapagar;
              $this->saldodocumento = "";  
              $this->nmgp_dados_form["saldodocumento"] = $this->saldodocumento;
              $this->conc = "";  
              $this->nmgp_dados_form["conc"] = $this->conc;
              $this->obs = "";  
              $this->nmgp_dados_form["obs"] = $this->obs;
              $this->asent = "";  
              $this->nmgp_dados_form["asent"] = $this->asent;
              $this->porc_ret = "";  
              $this->nmgp_dados_form["porc_ret"] = $this->porc_ret;
              $this->val_ica = "";  
              $this->nmgp_dados_form["val_ica"] = $this->val_ica;
              $this->porc_ica = "";  
              $this->nmgp_dados_form["porc_ica"] = $this->porc_ica;
              $this->porc_reteiva = "";  
              $this->nmgp_dados_form["porc_reteiva"] = $this->porc_reteiva;
              $this->val_reteiva = "";  
              $this->nmgp_dados_form["val_reteiva"] = $this->val_reteiva;
              $this->banco = "";  
              $this->nmgp_dados_form["banco"] = $this->banco;
              $this->usuario = "";  
              $this->nmgp_dados_form["usuario"] = $this->usuario;
              $this->id_concepto = "";  
              $this->nmgp_dados_form["id_concepto"] = $this->id_concepto;
              $this->ncuenta_tercero = "";  
              $this->nmgp_dados_form["ncuenta_tercero"] = $this->ncuenta_tercero;
              $this->creado = "";  
              $this->creado_hora = "" ;  
              $this->nmgp_dados_form["creado"] = $this->creado;
              $this->actualizado = "";  
              $this->actualizado_hora = "" ;  
              $this->nmgp_dados_form["actualizado"] = $this->actualizado;
              $this->cod_cuenta = "";  
              $this->nmgp_dados_form["cod_cuenta"] = $this->cod_cuenta;
              $this->detallepagos = "";  
              $this->nmgp_dados_form["detallepagos"] = $this->detallepagos;
              $this->titulo = "";  
              $this->nmgp_dados_form["titulo"] = $this->titulo;
              $this->total_cuenta = "";  
              $this->nmgp_dados_form["total_cuenta"] = $this->total_cuenta;
              $this->valor_base = "";  
              $this->nmgp_dados_form["valor_base"] = $this->valor_base;
              $this->valor_iva = "";  
              $this->nmgp_dados_form["valor_iva"] = $this->valor_iva;
              $this->valpagar = "";  
              $this->nmgp_dados_form["valpagar"] = $this->valpagar;
              $this->archivos = "";  
              $this->nmgp_dados_form["archivos"] = $this->archivos;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      if (!isset($this->nmgp_refresh_fields)) 
      { 
          $this->nm_proc_onload();
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_terceros']['embutida_parms'] = "gtotalpagado*scin0*scoutpar_idpago*scin" . $this->nmgp_dados_form['idpago'] . "*scoutgmonto*scin0*scoutgdesc*scin0*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_gestor_archivos_ce']['embutida_parms'] = "SC_glo_par_gnumeroce*scingnumeroce*scoutNMSC_inicial*scininicio*scoutNMSC_cab*scinN*scoutNMSC_nav*scinN*scout";
  }
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idpago) from " . $this->Ini->nm_tabela . " where idpago < $this->idpago" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idpago) from " . $this->Ini->nm_tabela . " where idpago < $this->idpago" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idpago) from " . $this->Ini->nm_tabela . " where idpago < $this->idpago" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idpago) from " . $this->Ini->nm_tabela . " where idpago < $this->idpago" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idpago) from " . $this->Ini->nm_tabela . " where idpago < $this->idpago" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idpago) from " . $this->Ini->nm_tabela . " where idpago < $this->idpago" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idpago) from " . $this->Ini->nm_tabela . " where idpago < $this->idpago" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idpago) from " . $this->Ini->nm_tabela . " where idpago < $this->idpago" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idpago) from " . $this->Ini->nm_tabela . " where idpago < $this->idpago" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idpago) from " . $this->Ini->nm_tabela . " where idpago < $this->idpago" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idpago = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "inicio";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_avanca($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idpago) from " . $this->Ini->nm_tabela . " where idpago > $this->idpago" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idpago) from " . $this->Ini->nm_tabela . " where idpago > $this->idpago" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idpago) from " . $this->Ini->nm_tabela . " where idpago > $this->idpago" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idpago) from " . $this->Ini->nm_tabela . " where idpago > $this->idpago" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idpago) from " . $this->Ini->nm_tabela . " where idpago > $this->idpago" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idpago) from " . $this->Ini->nm_tabela . " where idpago > $this->idpago" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idpago) from " . $this->Ini->nm_tabela . " where idpago > $this->idpago" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idpago) from " . $this->Ini->nm_tabela . " where idpago > $this->idpago" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idpago) from " . $this->Ini->nm_tabela . " where idpago > $this->idpago" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idpago) from " . $this->Ini->nm_tabela . " where idpago > $this->idpago" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idpago = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "final";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_inicio($str_where_param = '') 
   {   
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela; 
     $rs = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela);
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if ($rs->fields[0] == 0) 
     { 
         $this->nmgp_opcao = "novo"; 
         $this->nm_flag_saida_novo = "S"; 
         $rs->Close(); 
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return;
     }
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idpago) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idpago) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idpago) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idpago) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idpago) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idpago) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idpago) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idpago) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idpago) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idpago) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_filter']))
         { 
             $rs->Close();  
             return ; 
         } 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->idpago = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
// 
//-- 
   function nm_db_final($str_where_param = '') 
   { 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idpago) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idpago) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idpago) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idpago) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idpago) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idpago) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idpago) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idpago) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idpago) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idpago) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->idpago = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = 1;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['reg_start'] + 1;
       $rec_fim    = ($rec_fim > $rec_tot) ? $rec_tot : $rec_fim;
       if ($rec_tot == 0)
       {
           return;
       }
       $Qtd_Pages  = ceil($rec_tot / $Reg_Page);
       $Page_Atu   = ceil($rec_fim / $Reg_Page);
       $Link_ini   = 1;
       if ($Page_Atu > $Max_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       elseif ($Page_Atu > $Mid_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       if (($Qtd_Pages - $Link_ini) < $Max_link)
       {
           $Link_ini = ($Qtd_Pages - $Max_link) + 1;
       }
       if ($Link_ini < 1)
       {
           $Link_ini = 1;
       }
       for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
       {
           $rec = (($Link_ini - 1) * $Reg_Page) + 1;
           if ($Link_ini == $Page_Atu)
           {
               $Arr_result[$Ind_result] = '<span class="scFormToolbarNavOpen" style="vertical-align: middle;">' . $Link_ini . '</span>';
           }
           else
           {
               $Arr_result[$Ind_result] = '<a class="scFormToolbarNav" style="vertical-align: middle;" href="javascript: nm_navpage(' . $rec . ')">' . $Link_ini . '</a>';
           }
           $Link_ini++;
           $Ind_result++;
           if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
           {
               $Arr_result[$Ind_result] = '<img src="' . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . '" align="absmiddle" style="vertical-align: middle;">';
               $Ind_result++;
           }
       }
       if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
       {
           krsort($Arr_result);
       }
       foreach ($Arr_result as $Ind_result => $Lin_result)
       {
           $this->SC_nav_page .= $Lin_result;
       }
   }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function asent_onChange()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
if (!isset($this->sc_temp_par_comegreso)) {$this->sc_temp_par_comegreso = (isset($_SESSION['par_comegreso'])) ? $_SESSION['par_comegreso'] : "";}
  
$original_idpago = $this->idpago;
$original_asent = $this->asent;
$original_saldodocumento = $this->saldodocumento;
$original_client = $this->client;
$original_montocan = $this->montocan;
$original_ret = $this->ret;
$original_descuent = $this->descuent;
$original_val_ica = $this->val_ica;
$original_val_reteiva = $this->val_reteiva;
$original_iddocapagar = $this->iddocapagar;
$original_fecpago = $this->fecpago;
$original_docapagar = $this->docapagar;
$original_banco = $this->banco;
$original_porc_ret = $this->porc_ret;
$original_porc_ica = $this->porc_ica;
$original_porc_reteiva = $this->porc_reteiva;
$original_ncuenta_tercero = $this->ncuenta_tercero;

if($this->idpago >0)
	{
		 
      $nm_select = "select sum(monto) as monto from detallepagos where id_pago=$this->idpago "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dset = array();
     if ($this->idpago != "")
     { 
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
                      $this->dset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dset = false;
          $this->dset_erro = $this->Db->ErrorMsg();
      } 
     } 
;
		if(($this->dset[0][0]<1 or $this->dset[0][0]==0) and $this->asent =='SI')
			{		
			$this->sc_ajax_message("RECIBO NO TIENE DETALLE, NO SE PUEDE ASENTAR", "Mensaje", "", "");
			goto err;			
			}
		

if($this->asent =='SI')
	{
	if($this->saldodocumento >0)
		{
		$cli=$this->client ;
		$tpagar=$this->saldodocumento ;
		$elpago=$this->montocan +$this->ret +$this->descuent +$this->val_ica +$this->val_reteiva ;
		if($elpago==$tpagar)
			{
			
     $nm_select ="update facturacom set pagada='SI', saldo=0 where idfaccom=$this->iddocapagar "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_hacerpagos_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			}
		else if($elpago<$tpagar)
			{
			
     $nm_select ="update facturacom set pagada='AB', saldo=$tpagar-$elpago where idfaccom=$this->iddocapagar "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_hacerpagos_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			}
		 
      $nm_select = "select saldoapagar from terceros where idtercero=$cli"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
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
                      $this->dt[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt = false;
          $this->dt_erro = $this->Db->ErrorMsg();
      } 
;
		$sald=$this->dt[0][0];
		$nsalc=$sald-$elpago; 
		
     $nm_select ="update terceros set saldoapagar=$nsalc where idtercero=$cli"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_hacerpagos_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			
		}
	$this->Ini->nm_hidden_blocos[6] = "off"; $this->NM_ajax_info['blockDisplay']['6'] = 'off';
	
     $nm_select ="update pagos set asent='SI' where idpago=$this->idpago "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_hacerpagos_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	$vAsent=$this->fSiAsentada();
		if($vAsent==0)
			{
		
     $nm_select ="insert caja set fecha='$this->fecpago', detalle='OTROS PAGOS', nota='PAGO A TERCEROS', documento='$this->docapagar',  cantidad=-$this->montocan , cierredia='NO', idrp=$this->idpago , banco=$this->banco , usuario=$this->usuario "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_hacerpagos_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			}
		else
			{
			
     $nm_select ="update caja set cantidad=-$this->montocan  where idrp=$this->idpago "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_hacerpagos_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			}
		$this->sc_temp_par_comegreso=$this->idpago ;
	
	 
      $nm_select = "select sum(monto) as monto from detallepagos where id_pago=$this->idpago "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dset = array();
     if ($this->idpago != "")
     { 
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
                      $this->dset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dset = false;
          $this->dset_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if($this->dset[0][0]>0)
		{
		$this->sc_field_readonly("ret", 'on');
		$this->sc_field_readonly("descuent", 'on');
		$this->sc_field_readonly("iddocapagar", 'on');
		$this->sc_field_readonly("porc_ret", 'on');
		$this->sc_field_readonly("porc_ica", 'on');
		$this->sc_field_readonly("val_ica", 'on');
		$this->sc_field_readonly("porc_reteiva", 'on');
		$this->sc_field_readonly("val_reteiva", 'on');
		$this->sc_field_readonly("fecpago", 'on');
		$this->sc_field_readonly("banco", 'on');
		$this->sc_field_readonly("ncuenta_tercero", 'on');
		$this->Ini->nm_hidden_blocos[1] = "off"; $this->NM_ajax_info['blockDisplay']['1'] = 'off';
		$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;
		$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
		}
		 if (isset($this->sc_temp_par_comegreso)) { $_SESSION['par_comegreso'] = $this->sc_temp_par_comegreso;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('pdfreport_compregreso') . "/", $this->nm_location, $this->sc_temp_par_comegreso, "_blank", "ret_self", 440, 630);
 };
	}
else
	{
	if($this->saldodocumento >0)
		{
		$cli=$this->client ;
		 
      $nm_select = "select saldoapagar from terceros where idtercero=$cli"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
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
                      $this->dt[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt = false;
          $this->dt_erro = $this->Db->ErrorMsg();
      } 
;
		$sald=$this->dt[0][0];
		$elpago=$this->montocan +$this->ret +$this->descuent +$this->val_ica +$this->val_reteiva ;
		$nsalc=$sald+$elpago;
		
     $nm_select ="update terceros set saldoapagar=$nsalc where idtercero=$cli"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_hacerpagos_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		
		 
      $nm_select = "select iddocapagar from pagos where idpago=$this->idpago "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->datt = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->datt = false;
          $this->datt_erro = $this->Db->ErrorMsg();
      } 
;
		$iddelpago=substr($this->datt , 11);
		
		$saldf=$this->fTsaldofac();
		
     $nm_select ="update facturacom set pagada='NO', saldo=$saldf+$elpago where idfaccom=$iddelpago"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_hacerpagos_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		}
	$this->Ini->nm_hidden_blocos[6] = "on"; $this->NM_ajax_info['blockDisplay']['6'] = 'on';
	
     $nm_select ="update pagos set asent='NO' where idpago=$this->idpago "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_hacerpagos_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	
		$this->sc_field_readonly("ret", 'off');
		$this->sc_field_readonly("descuent", 'off');
		$this->sc_field_readonly("iddocapagar", 'off');
		$this->sc_field_readonly("porc_ret", 'off');
		$this->sc_field_readonly("porc_ica", 'off');
		$this->sc_field_readonly("val_ica", 'off');
		$this->sc_field_readonly("porc_reteiva", 'off');
		$this->sc_field_readonly("val_reteiva", 'off');
		$this->sc_field_readonly("fecpago", 'off');
		$this->sc_field_readonly("banco", 'off');
		$this->sc_field_readonly("ncuenta_tercero", 'off');
		$this->Ini->nm_hidden_blocos[1] = "on"; $this->NM_ajax_info['blockDisplay']['1'] = 'on';
		$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "on";;
		$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "on";;
	}
	}
goto err2;
err:;
$this->asent ='NO';
err2:;



if (isset($this->sc_temp_par_comegreso)) { $_SESSION['par_comegreso'] = $this->sc_temp_par_comegreso;}
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
$modificado_idpago = $this->idpago;
$modificado_asent = $this->asent;
$modificado_saldodocumento = $this->saldodocumento;
$modificado_client = $this->client;
$modificado_montocan = $this->montocan;
$modificado_ret = $this->ret;
$modificado_descuent = $this->descuent;
$modificado_val_ica = $this->val_ica;
$modificado_val_reteiva = $this->val_reteiva;
$modificado_iddocapagar = $this->iddocapagar;
$modificado_fecpago = $this->fecpago;
$modificado_docapagar = $this->docapagar;
$modificado_banco = $this->banco;
$modificado_porc_ret = $this->porc_ret;
$modificado_porc_ica = $this->porc_ica;
$modificado_porc_reteiva = $this->porc_reteiva;
$modificado_ncuenta_tercero = $this->ncuenta_tercero;
$this->nm_formatar_campos('idpago', 'asent', 'saldodocumento', 'client', 'montocan', 'ret', 'descuent', 'val_ica', 'val_reteiva', 'iddocapagar', 'fecpago', 'docapagar', 'banco', 'porc_ret', 'porc_ica', 'porc_reteiva', 'ncuenta_tercero');
if ($original_idpago !== $modificado_idpago || isset($this->nmgp_cmp_readonly['idpago']) || (isset($bFlagRead_idpago) && $bFlagRead_idpago))
{
    $this->ajax_return_values_idpago(true);
}
if ($original_asent !== $modificado_asent || isset($this->nmgp_cmp_readonly['asent']) || (isset($bFlagRead_asent) && $bFlagRead_asent))
{
    $this->ajax_return_values_asent(true);
}
if ($original_saldodocumento !== $modificado_saldodocumento || isset($this->nmgp_cmp_readonly['saldodocumento']) || (isset($bFlagRead_saldodocumento) && $bFlagRead_saldodocumento))
{
    $this->ajax_return_values_saldodocumento(true);
}
if ($original_client !== $modificado_client || isset($this->nmgp_cmp_readonly['client']) || (isset($bFlagRead_client) && $bFlagRead_client))
{
    $this->ajax_return_values_client(true);
}
if ($original_montocan !== $modificado_montocan || isset($this->nmgp_cmp_readonly['montocan']) || (isset($bFlagRead_montocan) && $bFlagRead_montocan))
{
    $this->ajax_return_values_montocan(true);
}
if ($original_ret !== $modificado_ret || isset($this->nmgp_cmp_readonly['ret']) || (isset($bFlagRead_ret) && $bFlagRead_ret))
{
    $this->ajax_return_values_ret(true);
}
if ($original_descuent !== $modificado_descuent || isset($this->nmgp_cmp_readonly['descuent']) || (isset($bFlagRead_descuent) && $bFlagRead_descuent))
{
    $this->ajax_return_values_descuent(true);
}
if ($original_val_ica !== $modificado_val_ica || isset($this->nmgp_cmp_readonly['val_ica']) || (isset($bFlagRead_val_ica) && $bFlagRead_val_ica))
{
    $this->ajax_return_values_val_ica(true);
}
if ($original_val_reteiva !== $modificado_val_reteiva || isset($this->nmgp_cmp_readonly['val_reteiva']) || (isset($bFlagRead_val_reteiva) && $bFlagRead_val_reteiva))
{
    $this->ajax_return_values_val_reteiva(true);
}
if ($original_iddocapagar !== $modificado_iddocapagar || isset($this->nmgp_cmp_readonly['iddocapagar']) || (isset($bFlagRead_iddocapagar) && $bFlagRead_iddocapagar))
{
    $this->ajax_return_values_iddocapagar(true);
}
if ($original_fecpago !== $modificado_fecpago || isset($this->nmgp_cmp_readonly['fecpago']) || (isset($bFlagRead_fecpago) && $bFlagRead_fecpago))
{
    $this->ajax_return_values_fecpago(true);
}
if ($original_docapagar !== $modificado_docapagar || isset($this->nmgp_cmp_readonly['docapagar']) || (isset($bFlagRead_docapagar) && $bFlagRead_docapagar))
{
    $this->ajax_return_values_docapagar(true);
}
if ($original_banco !== $modificado_banco || isset($this->nmgp_cmp_readonly['banco']) || (isset($bFlagRead_banco) && $bFlagRead_banco))
{
    $this->ajax_return_values_banco(true);
}
if ($original_porc_ret !== $modificado_porc_ret || isset($this->nmgp_cmp_readonly['porc_ret']) || (isset($bFlagRead_porc_ret) && $bFlagRead_porc_ret))
{
    $this->ajax_return_values_porc_ret(true);
}
if ($original_porc_ica !== $modificado_porc_ica || isset($this->nmgp_cmp_readonly['porc_ica']) || (isset($bFlagRead_porc_ica) && $bFlagRead_porc_ica))
{
    $this->ajax_return_values_porc_ica(true);
}
if ($original_porc_reteiva !== $modificado_porc_reteiva || isset($this->nmgp_cmp_readonly['porc_reteiva']) || (isset($bFlagRead_porc_reteiva) && $bFlagRead_porc_reteiva))
{
    $this->ajax_return_values_porc_reteiva(true);
}
if ($original_ncuenta_tercero !== $modificado_ncuenta_tercero || isset($this->nmgp_cmp_readonly['ncuenta_tercero']) || (isset($bFlagRead_ncuenta_tercero) && $bFlagRead_ncuenta_tercero))
{
    $this->ajax_return_values_ncuenta_tercero(true);
}
$this->NM_ajax_info['event_field'] = 'asent';
form_hacerpagos_pack_ajax_response();
exit;
}
function client_onChange()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  
$original_ncuenta_tercero = $this->ncuenta_tercero;
$original_idpago = $this->idpago;
$original_saldodocumento = $this->saldodocumento;
$original_montocan = $this->montocan;
$original_valor_base = $this->valor_base;
$original_valor_iva = $this->valor_iva;
$original_porc_ret = $this->porc_ret;
$original_ret = $this->ret;
$original_porc_ica = $this->porc_ica;
$original_val_ica = $this->val_ica;
$original_porc_reteiva = $this->porc_reteiva;
$original_val_reteiva = $this->val_reteiva;
$original_docapagar = $this->docapagar;
$original_valpagar = $this->valpagar;

$vAsent=$this->fSiAsentada();
if($vAsent==0)
	{
	if(empty($this->ncuenta_tercero ))
		{
		
		if($this->idpago >0)
			{
			 
      $nm_select = "select sum(monto) as monto from detallepagos where id_pago=$this->idpago "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dset = array();
     if ($this->idpago != "")
     { 
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
                      $this->dset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dset = false;
          $this->dset_erro = $this->Db->ErrorMsg();
      } 
     } 
;
			if($this->dset[0][0]>1 or $this->dset[0][0]==1)
				{

					$this->sc_ajax_message("RECIBO YA FUE ASENTADO, NO SE PUEDE MODIFICAR EL TERCERO", "Advertencia", "modal=N&button=Y&button_label=Ok&redir=../grid_pagos&show_close=N", "");
					if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

				}
			else
				{
				$this->saldodocumento =0;
				$this->montocan =0;
				$this->valor_base =0;
				$this->valor_iva =0;
				$this->porc_ret =0;
				$this->ret =0;
				$this->porc_ica =0;
				$this->val_ica =0;
				$this->porc_reteiva =0;
				$this->val_reteiva =0;
				$this->docapagar ='';
				$descuento =0;
				$this->valpagar =0;
				}

			}
		else
			{
			$this->saldodocumento =0;
			$this->montocan =0;
			$this->valor_base =0;
			$this->valor_iva =0;
			$this->porc_ret =0;
			$this->ret =0;
			$this->porc_ica =0;
			$this->val_ica =0;
			$this->porc_reteiva =0;
			$this->val_reteiva =0;
			$this->docapagar ='';
			$descuento =0;
			$this->valpagar =0;
			}
		}
	}
else
	{
	$this->sc_ajax_message("RECIBO YA FUE ASENTADO, NO SE PUEDE MODIFICAR EL TERCERO", "Advertencia", "modal=N&button=Y&button_label=Ok&redir=../grid_pagos&show_close=N", "");
	if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

	}


$modificado_ncuenta_tercero = $this->ncuenta_tercero;
$modificado_idpago = $this->idpago;
$modificado_saldodocumento = $this->saldodocumento;
$modificado_montocan = $this->montocan;
$modificado_valor_base = $this->valor_base;
$modificado_valor_iva = $this->valor_iva;
$modificado_porc_ret = $this->porc_ret;
$modificado_ret = $this->ret;
$modificado_porc_ica = $this->porc_ica;
$modificado_val_ica = $this->val_ica;
$modificado_porc_reteiva = $this->porc_reteiva;
$modificado_val_reteiva = $this->val_reteiva;
$modificado_docapagar = $this->docapagar;
$modificado_valpagar = $this->valpagar;
$this->nm_formatar_campos('ncuenta_tercero', 'idpago', 'saldodocumento', 'montocan', 'valor_base', 'valor_iva', 'porc_ret', 'ret', 'porc_ica', 'val_ica', 'porc_reteiva', 'val_reteiva', 'docapagar', 'valpagar');
if ($original_ncuenta_tercero !== $modificado_ncuenta_tercero || isset($this->nmgp_cmp_readonly['ncuenta_tercero']) || (isset($bFlagRead_ncuenta_tercero) && $bFlagRead_ncuenta_tercero))
{
    $this->ajax_return_values_ncuenta_tercero(true);
}
if ($original_idpago !== $modificado_idpago || isset($this->nmgp_cmp_readonly['idpago']) || (isset($bFlagRead_idpago) && $bFlagRead_idpago))
{
    $this->ajax_return_values_idpago(true);
}
if ($original_saldodocumento !== $modificado_saldodocumento || isset($this->nmgp_cmp_readonly['saldodocumento']) || (isset($bFlagRead_saldodocumento) && $bFlagRead_saldodocumento))
{
    $this->ajax_return_values_saldodocumento(true);
}
if ($original_montocan !== $modificado_montocan || isset($this->nmgp_cmp_readonly['montocan']) || (isset($bFlagRead_montocan) && $bFlagRead_montocan))
{
    $this->ajax_return_values_montocan(true);
}
if ($original_valor_base !== $modificado_valor_base || isset($this->nmgp_cmp_readonly['valor_base']) || (isset($bFlagRead_valor_base) && $bFlagRead_valor_base))
{
    $this->ajax_return_values_valor_base(true);
}
if ($original_valor_iva !== $modificado_valor_iva || isset($this->nmgp_cmp_readonly['valor_iva']) || (isset($bFlagRead_valor_iva) && $bFlagRead_valor_iva))
{
    $this->ajax_return_values_valor_iva(true);
}
if ($original_porc_ret !== $modificado_porc_ret || isset($this->nmgp_cmp_readonly['porc_ret']) || (isset($bFlagRead_porc_ret) && $bFlagRead_porc_ret))
{
    $this->ajax_return_values_porc_ret(true);
}
if ($original_ret !== $modificado_ret || isset($this->nmgp_cmp_readonly['ret']) || (isset($bFlagRead_ret) && $bFlagRead_ret))
{
    $this->ajax_return_values_ret(true);
}
if ($original_porc_ica !== $modificado_porc_ica || isset($this->nmgp_cmp_readonly['porc_ica']) || (isset($bFlagRead_porc_ica) && $bFlagRead_porc_ica))
{
    $this->ajax_return_values_porc_ica(true);
}
if ($original_val_ica !== $modificado_val_ica || isset($this->nmgp_cmp_readonly['val_ica']) || (isset($bFlagRead_val_ica) && $bFlagRead_val_ica))
{
    $this->ajax_return_values_val_ica(true);
}
if ($original_porc_reteiva !== $modificado_porc_reteiva || isset($this->nmgp_cmp_readonly['porc_reteiva']) || (isset($bFlagRead_porc_reteiva) && $bFlagRead_porc_reteiva))
{
    $this->ajax_return_values_porc_reteiva(true);
}
if ($original_val_reteiva !== $modificado_val_reteiva || isset($this->nmgp_cmp_readonly['val_reteiva']) || (isset($bFlagRead_val_reteiva) && $bFlagRead_val_reteiva))
{
    $this->ajax_return_values_val_reteiva(true);
}
if ($original_docapagar !== $modificado_docapagar || isset($this->nmgp_cmp_readonly['docapagar']) || (isset($bFlagRead_docapagar) && $bFlagRead_docapagar))
{
    $this->ajax_return_values_docapagar(true);
}
if ($original_valpagar !== $modificado_valpagar || isset($this->nmgp_cmp_readonly['valpagar']) || (isset($bFlagRead_valpagar) && $bFlagRead_valpagar))
{
    $this->ajax_return_values_valpagar(true);
}
$this->NM_ajax_info['event_field'] = 'client';
form_hacerpagos_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
function descuent_onChange()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  
$original_iddocapagar = $this->iddocapagar;
$original_valpagar = $this->valpagar;
$original_ret = $this->ret;
$original_val_ica = $this->val_ica;
$original_val_reteiva = $this->val_reteiva;
$original_descuent = $this->descuent;
$original_saldodocumento = $this->saldodocumento;

$this->fDescuento();
 
      $nm_select = "select valoriva, total, saldo from facturacom where idfaccom=$this->iddocapagar "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_ret = array();
     if ($this->iddocapagar != "")
     { 
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
                      $this->dt_ret[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_ret = false;
          $this->dt_ret_erro = $this->Db->ErrorMsg();
      } 
     } 
;
$this->valpagar =$this->dt_ret[0][2]-($this->ret +$this->val_ica +$this->val_reteiva +$this->descuent );
if($this->valpagar <0)
	{
	$this->valpagar =0;
	}

$modificado_iddocapagar = $this->iddocapagar;
$modificado_valpagar = $this->valpagar;
$modificado_ret = $this->ret;
$modificado_val_ica = $this->val_ica;
$modificado_val_reteiva = $this->val_reteiva;
$modificado_descuent = $this->descuent;
$modificado_saldodocumento = $this->saldodocumento;
$this->nm_formatar_campos('iddocapagar', 'valpagar', 'ret', 'val_ica', 'val_reteiva', 'descuent', 'saldodocumento');
if ($original_iddocapagar !== $modificado_iddocapagar || isset($this->nmgp_cmp_readonly['iddocapagar']) || (isset($bFlagRead_iddocapagar) && $bFlagRead_iddocapagar))
{
    $this->ajax_return_values_iddocapagar(true);
}
if ($original_valpagar !== $modificado_valpagar || isset($this->nmgp_cmp_readonly['valpagar']) || (isset($bFlagRead_valpagar) && $bFlagRead_valpagar))
{
    $this->ajax_return_values_valpagar(true);
}
if ($original_ret !== $modificado_ret || isset($this->nmgp_cmp_readonly['ret']) || (isset($bFlagRead_ret) && $bFlagRead_ret))
{
    $this->ajax_return_values_ret(true);
}
if ($original_val_ica !== $modificado_val_ica || isset($this->nmgp_cmp_readonly['val_ica']) || (isset($bFlagRead_val_ica) && $bFlagRead_val_ica))
{
    $this->ajax_return_values_val_ica(true);
}
if ($original_val_reteiva !== $modificado_val_reteiva || isset($this->nmgp_cmp_readonly['val_reteiva']) || (isset($bFlagRead_val_reteiva) && $bFlagRead_val_reteiva))
{
    $this->ajax_return_values_val_reteiva(true);
}
if ($original_descuent !== $modificado_descuent || isset($this->nmgp_cmp_readonly['descuent']) || (isset($bFlagRead_descuent) && $bFlagRead_descuent))
{
    $this->ajax_return_values_descuent(true);
}
if ($original_saldodocumento !== $modificado_saldodocumento || isset($this->nmgp_cmp_readonly['saldodocumento']) || (isset($bFlagRead_saldodocumento) && $bFlagRead_saldodocumento))
{
    $this->ajax_return_values_saldodocumento(true);
}
$this->NM_ajax_info['event_field'] = 'descuent';
form_hacerpagos_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
function descuent_onClick()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  
$original_idpago = $this->idpago;
$original_ret = $this->ret;
$original_descuent = $this->descuent;
$original_iddocapagar = $this->iddocapagar;
$original_porc_ret = $this->porc_ret;
$original_porc_ica = $this->porc_ica;
$original_val_ica = $this->val_ica;
$original_porc_reteiva = $this->porc_reteiva;
$original_val_reteiva = $this->val_reteiva;

$this->fDesactiva_campos();

$modificado_idpago = $this->idpago;
$modificado_ret = $this->ret;
$modificado_descuent = $this->descuent;
$modificado_iddocapagar = $this->iddocapagar;
$modificado_porc_ret = $this->porc_ret;
$modificado_porc_ica = $this->porc_ica;
$modificado_val_ica = $this->val_ica;
$modificado_porc_reteiva = $this->porc_reteiva;
$modificado_val_reteiva = $this->val_reteiva;
$this->nm_formatar_campos('idpago', 'ret', 'descuent', 'iddocapagar', 'porc_ret', 'porc_ica', 'val_ica', 'porc_reteiva', 'val_reteiva');
if ($original_idpago !== $modificado_idpago || isset($this->nmgp_cmp_readonly['idpago']) || (isset($bFlagRead_idpago) && $bFlagRead_idpago))
{
    $this->ajax_return_values_idpago(true);
}
if ($original_ret !== $modificado_ret || isset($this->nmgp_cmp_readonly['ret']) || (isset($bFlagRead_ret) && $bFlagRead_ret))
{
    $this->ajax_return_values_ret(true);
}
if ($original_descuent !== $modificado_descuent || isset($this->nmgp_cmp_readonly['descuent']) || (isset($bFlagRead_descuent) && $bFlagRead_descuent))
{
    $this->ajax_return_values_descuent(true);
}
if ($original_iddocapagar !== $modificado_iddocapagar || isset($this->nmgp_cmp_readonly['iddocapagar']) || (isset($bFlagRead_iddocapagar) && $bFlagRead_iddocapagar))
{
    $this->ajax_return_values_iddocapagar(true);
}
if ($original_porc_ret !== $modificado_porc_ret || isset($this->nmgp_cmp_readonly['porc_ret']) || (isset($bFlagRead_porc_ret) && $bFlagRead_porc_ret))
{
    $this->ajax_return_values_porc_ret(true);
}
if ($original_porc_ica !== $modificado_porc_ica || isset($this->nmgp_cmp_readonly['porc_ica']) || (isset($bFlagRead_porc_ica) && $bFlagRead_porc_ica))
{
    $this->ajax_return_values_porc_ica(true);
}
if ($original_val_ica !== $modificado_val_ica || isset($this->nmgp_cmp_readonly['val_ica']) || (isset($bFlagRead_val_ica) && $bFlagRead_val_ica))
{
    $this->ajax_return_values_val_ica(true);
}
if ($original_porc_reteiva !== $modificado_porc_reteiva || isset($this->nmgp_cmp_readonly['porc_reteiva']) || (isset($bFlagRead_porc_reteiva) && $bFlagRead_porc_reteiva))
{
    $this->ajax_return_values_porc_reteiva(true);
}
if ($original_val_reteiva !== $modificado_val_reteiva || isset($this->nmgp_cmp_readonly['val_reteiva']) || (isset($bFlagRead_val_reteiva) && $bFlagRead_val_reteiva))
{
    $this->ajax_return_values_val_reteiva(true);
}
$this->NM_ajax_info['event_field'] = 'descuent';
form_hacerpagos_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
function docapagar_onChange()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  
$original_docapagar = $this->docapagar;
$original_ncuenta_tercero = $this->ncuenta_tercero;
$original_iddocapagar = $this->iddocapagar;
$original_client = $this->client;
$original_idpago = $this->idpago;
$original_descuent = $this->descuent;
$original_saldodocumento = $this->saldodocumento;
$original_valor_base = $this->valor_base;
$original_valor_iva = $this->valor_iva;
$original_porc_ret = $this->porc_ret;
$original_ret = $this->ret;
$original_porc_ica = $this->porc_ica;
$original_val_ica = $this->val_ica;
$original_porc_reteiva = $this->porc_reteiva;
$original_val_reteiva = $this->val_reteiva;
$original_valpagar = $this->valpagar;
$original_montocan = $this->montocan;

if(!empty($this->docapagar ) and empty($this->ncuenta_tercero ))
{
	 
      $nm_select = "select idfaccom,numfacom,idprov from facturacom where concat(idprov,'/',numfacom)='".$this->docapagar ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vidfaccom = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vidfaccom[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vidfaccom = false;
          $this->vidfaccom_erro = $this->Db->ErrorMsg();
      } 
;
	
	if(isset($this->vidfaccom[0][0]))
	{
		$this->iddocapagar  = $this->vidfaccom[0][0];
		$this->docapagar    = $this->vidfaccom[0][1];
		$this->client       = $this->vidfaccom[0][2];
		
		$vAsent='';
		$vAsent=$this->fSiAsentada();
		if($vAsent==0)
			{
			if($this->idpago >0)
				{
				 
      $nm_select = "select sum(monto) as monto from detallepagos where id_pago=$this->idpago "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dset = array();
     if ($this->idpago != "")
     { 
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
                      $this->dset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dset = false;
          $this->dset_erro = $this->Db->ErrorMsg();
      } 
     } 
;
				if($this->dset[0][0]>1 or $this->dset[0][0]==1)
					{		
					if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

					$this->sc_ajax_message("RECIBO TIENE DETALLE, NO SE PUEDE MODIFICAR LA FACTURA", "Advertencia", "modal=N&button=Y&button_label=Ok&redir=../grid_pagos&show_close=N", "");
					}
				else
					{
					goto eti;
					}
				}

			else{eti:;
			$this->descuent =0;
			$this->saldodocumento =0;
			$this->docapagar ="";
			 
      $nm_select = "select numfacom, valoriva, total, saldo, retencion, reteica, reteiva from facturacom where idfaccom=$this->iddocapagar "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
     if ($this->iddocapagar != "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[5] = str_replace(',', '.', $SCrx->fields[5]);
                 $SCrx->fields[6] = str_replace(',', '.', $SCrx->fields[6]);
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 $SCrx->fields[4] = (strpos(strtolower($SCrx->fields[4]), "e")) ? (float)$SCrx->fields[4] : $SCrx->fields[4];
                 $SCrx->fields[4] = (string)$SCrx->fields[4];
                 $SCrx->fields[5] = (strpos(strtolower($SCrx->fields[5]), "e")) ? (float)$SCrx->fields[5] : $SCrx->fields[5];
                 $SCrx->fields[5] = (string)$SCrx->fields[5];
                 $SCrx->fields[6] = (strpos(strtolower($SCrx->fields[6]), "e")) ? (float)$SCrx->fields[6] : $SCrx->fields[6];
                 $SCrx->fields[6] = (string)$SCrx->fields[6];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dt[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt = false;
          $this->dt_erro = $this->Db->ErrorMsg();
      } 
     } 
;
			if(isset($this->dt[0][0]))
				{
				$this->docapagar =$this->dt[0][0];
				$this->saldodocumento =$this->dt[0][3];

				$vBaseRet=($this->dt[0][2]-$this->dt[0][1]);
				$this->valor_base =$vBaseRet;
				$this->valor_iva =$this->dt[0][1];

				if($this->dt[0][4]>0)
					{
					$vTasaRet=round(($this->dt[0][4]/100), 3);
					$this->porc_ret =$this->dt[0][4];
					$this->ret =round(($vBaseRet*$vTasaRet), 0);
					}
				else
					{
					$this->porc_ret =0.000;
					$this->ret =0.00;
					}

				if($this->dt[0][5]>0)
					{
					$vTasaIca=$this->dt[0][5];
					$this->porc_ica =$this->dt[0][5];
					$this->val_ica =round((($vBaseRet*$vTasaIca)/1000), 0);
					}
				else
					{
					$this->porc_ica =0.000;
					$this->val_ica =0.00;
					}

				if($this->dt[0][6]>0)
					{
					$vTasaRiva=round(($this->dt[0][6]/100), 3);
					$this->porc_reteiva =$this->dt[0][6];
					$this->val_reteiva =round(($this->dt[0][1]*$vTasaRiva), 0);
					}
				else
					{
					$this->porc_reteiva =0.000;
					$this->val_reteiva =0.00;
					}

				$this->valpagar =$this->dt[0][3]-($this->ret +$this->val_ica +$this->val_reteiva +$this->descuent );
				if($this->valpagar <0)
					{
					$this->valpagar =0;
					}

				$this->sc_set_focus('descuent');
				}
			else
				{
				echo "No se encuentra el documento";
				}
				}
			}
		else
			{
			$this->sc_ajax_message("RECIBO YA FUE ASENTADO, NO SE PUEDE MODIFICAR LA FACTURA", "Advertencia", "modal=N&button=Y&button_label=Ok&redir=../grid_pagos&show_close=N", "");
			if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

			}
	}
	else
	{
		$this->saldodocumento =0;
		$this->montocan =0;
		$this->valor_base =0;
		$this->valor_iva =0;
		$this->porc_ret =0;
		$this->ret =0;
		$this->porc_ica =0;
		$this->val_ica =0;
		$this->porc_reteiva =0;
		$this->val_reteiva =0;
		$this->docapagar ='';
		$descuento =0;
		$this->valpagar =0;
		$this->client ="";
		
		$this->sc_ajax_message("La factura no existe, por favor seleccionela desde la lista de factura dando click en la lupa.", "Mensaje", "", "");	
	}
}



$modificado_docapagar = $this->docapagar;
$modificado_ncuenta_tercero = $this->ncuenta_tercero;
$modificado_iddocapagar = $this->iddocapagar;
$modificado_client = $this->client;
$modificado_idpago = $this->idpago;
$modificado_descuent = $this->descuent;
$modificado_saldodocumento = $this->saldodocumento;
$modificado_valor_base = $this->valor_base;
$modificado_valor_iva = $this->valor_iva;
$modificado_porc_ret = $this->porc_ret;
$modificado_ret = $this->ret;
$modificado_porc_ica = $this->porc_ica;
$modificado_val_ica = $this->val_ica;
$modificado_porc_reteiva = $this->porc_reteiva;
$modificado_val_reteiva = $this->val_reteiva;
$modificado_valpagar = $this->valpagar;
$modificado_montocan = $this->montocan;
$this->nm_formatar_campos('docapagar', 'ncuenta_tercero', 'iddocapagar', 'client', 'idpago', 'descuent', 'saldodocumento', 'valor_base', 'valor_iva', 'porc_ret', 'ret', 'porc_ica', 'val_ica', 'porc_reteiva', 'val_reteiva', 'valpagar', 'montocan');
if ($original_docapagar !== $modificado_docapagar || isset($this->nmgp_cmp_readonly['docapagar']) || (isset($bFlagRead_docapagar) && $bFlagRead_docapagar))
{
    $this->ajax_return_values_docapagar(true);
}
if ($original_ncuenta_tercero !== $modificado_ncuenta_tercero || isset($this->nmgp_cmp_readonly['ncuenta_tercero']) || (isset($bFlagRead_ncuenta_tercero) && $bFlagRead_ncuenta_tercero))
{
    $this->ajax_return_values_ncuenta_tercero(true);
}
if ($original_iddocapagar !== $modificado_iddocapagar || isset($this->nmgp_cmp_readonly['iddocapagar']) || (isset($bFlagRead_iddocapagar) && $bFlagRead_iddocapagar))
{
    $this->ajax_return_values_iddocapagar(true);
}
if ($original_client !== $modificado_client || isset($this->nmgp_cmp_readonly['client']) || (isset($bFlagRead_client) && $bFlagRead_client))
{
    $this->ajax_return_values_client(true);
}
if ($original_idpago !== $modificado_idpago || isset($this->nmgp_cmp_readonly['idpago']) || (isset($bFlagRead_idpago) && $bFlagRead_idpago))
{
    $this->ajax_return_values_idpago(true);
}
if ($original_descuent !== $modificado_descuent || isset($this->nmgp_cmp_readonly['descuent']) || (isset($bFlagRead_descuent) && $bFlagRead_descuent))
{
    $this->ajax_return_values_descuent(true);
}
if ($original_saldodocumento !== $modificado_saldodocumento || isset($this->nmgp_cmp_readonly['saldodocumento']) || (isset($bFlagRead_saldodocumento) && $bFlagRead_saldodocumento))
{
    $this->ajax_return_values_saldodocumento(true);
}
if ($original_valor_base !== $modificado_valor_base || isset($this->nmgp_cmp_readonly['valor_base']) || (isset($bFlagRead_valor_base) && $bFlagRead_valor_base))
{
    $this->ajax_return_values_valor_base(true);
}
if ($original_valor_iva !== $modificado_valor_iva || isset($this->nmgp_cmp_readonly['valor_iva']) || (isset($bFlagRead_valor_iva) && $bFlagRead_valor_iva))
{
    $this->ajax_return_values_valor_iva(true);
}
if ($original_porc_ret !== $modificado_porc_ret || isset($this->nmgp_cmp_readonly['porc_ret']) || (isset($bFlagRead_porc_ret) && $bFlagRead_porc_ret))
{
    $this->ajax_return_values_porc_ret(true);
}
if ($original_ret !== $modificado_ret || isset($this->nmgp_cmp_readonly['ret']) || (isset($bFlagRead_ret) && $bFlagRead_ret))
{
    $this->ajax_return_values_ret(true);
}
if ($original_porc_ica !== $modificado_porc_ica || isset($this->nmgp_cmp_readonly['porc_ica']) || (isset($bFlagRead_porc_ica) && $bFlagRead_porc_ica))
{
    $this->ajax_return_values_porc_ica(true);
}
if ($original_val_ica !== $modificado_val_ica || isset($this->nmgp_cmp_readonly['val_ica']) || (isset($bFlagRead_val_ica) && $bFlagRead_val_ica))
{
    $this->ajax_return_values_val_ica(true);
}
if ($original_porc_reteiva !== $modificado_porc_reteiva || isset($this->nmgp_cmp_readonly['porc_reteiva']) || (isset($bFlagRead_porc_reteiva) && $bFlagRead_porc_reteiva))
{
    $this->ajax_return_values_porc_reteiva(true);
}
if ($original_val_reteiva !== $modificado_val_reteiva || isset($this->nmgp_cmp_readonly['val_reteiva']) || (isset($bFlagRead_val_reteiva) && $bFlagRead_val_reteiva))
{
    $this->ajax_return_values_val_reteiva(true);
}
if ($original_valpagar !== $modificado_valpagar || isset($this->nmgp_cmp_readonly['valpagar']) || (isset($bFlagRead_valpagar) && $bFlagRead_valpagar))
{
    $this->ajax_return_values_valpagar(true);
}
if ($original_montocan !== $modificado_montocan || isset($this->nmgp_cmp_readonly['montocan']) || (isset($bFlagRead_montocan) && $bFlagRead_montocan))
{
    $this->ajax_return_values_montocan(true);
}
$this->NM_ajax_info['event_field'] = 'docapagar';
form_hacerpagos_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
function fActualizaSaldo()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  
if($this->saldodocumento >0)
	{
	 
      $nm_select = "select saldoapagar from terceros where idtercero=$this->client "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
     if ($this->client != "")
     { 
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
                      $this->dt[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt = false;
          $this->dt_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	$salterc=$this->dt[0][0];
	
	}
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
function fDesactiva_campos()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  
if($this->idpago >0)
	{
 
      $nm_select = "select sum(monto) as monto from detallepagos where id_pago=$this->idpago "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dset = array();
     if ($this->idpago != "")
     { 
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
                      $this->dset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dset = false;
          $this->dset_erro = $this->Db->ErrorMsg();
      } 
     } 
;
if(isset($this->dset[0][0]))
	{
	if($this->dset[0][0]>1 or $this->dset[0][0]==1)
		{
		$this->sc_field_readonly("ret", 'on');
		$this->sc_field_readonly("descuent", 'on');
		$this->sc_field_readonly("iddocapagar", 'on');
		$this->sc_field_readonly("porc_ret", 'on');
		$this->sc_field_readonly("porc_ica", 'on');
		$this->sc_field_readonly("val_ica", 'on');
		$this->sc_field_readonly("porc_reteiva", 'on');
		$this->sc_field_readonly("val_reteiva", 'on');
		}
	else
		{
		$this->sc_field_readonly("ret", 'off');
		$this->sc_field_readonly("descuent", 'off');
		$this->sc_field_readonly("iddocapagar", 'off');
		$this->sc_field_readonly("porc_ret", 'off');
		$this->sc_field_readonly("porc_ica", 'off');
		$this->sc_field_readonly("val_ica", 'off');
		$this->sc_field_readonly("porc_reteiva", 'off');
		$this->sc_field_readonly("val_reteiva", 'off');
		}
	}
	}
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
function fDescuento()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gCanc)) {$this->sc_temp_gCanc = (isset($_SESSION['gCanc'])) ? $_SESSION['gCanc'] : "";}
if (!isset($this->sc_temp_gDesc)) {$this->sc_temp_gDesc = (isset($_SESSION['gDesc'])) ? $_SESSION['gDesc'] : "";}
  
$this->sc_temp_gDesc=$this->descuent +$this->ret ;
$this->sc_temp_gCanc=$this->saldodocumento -$this->sc_temp_gDesc;


if (isset($this->sc_temp_gDesc)) { $_SESSION['gDesc'] = $this->sc_temp_gDesc;}
if (isset($this->sc_temp_gCanc)) { $_SESSION['gCanc'] = $this->sc_temp_gCanc;}
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
function fSiAsentada()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  
if($this->idpago >0)
	{
	 
      $nm_select = "select idcaja from caja where idrp=$this->idpago "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dse = array();
     if ($this->idpago != "")
     { 
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
                      $this->dse[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dse = false;
          $this->dse_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if(isset($this->dse[0][0]))
		{
		$as=1;
		}
	else
		{
		$as=0;
		}
	
	}
else
	{
	$as=0;
	}
return $as;
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
function fTsaldofac()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  
 
      $nm_select = "select saldo from facturacom where idfaccom=$this->iddocapagar "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->data = array();
     if ($this->iddocapagar != "")
     { 
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
                      $this->data[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->data = false;
          $this->data_erro = $this->Db->ErrorMsg();
      } 
     } 
;
if(isset($this->data[0][0]))
	{
	$sf=$this->data[0][0];
	}
else
	{
	$sf=0;
	}
return $sf;
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
function id_concepto_onChange()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  
$original_id_concepto = $this->id_concepto;
$original_conc = $this->conc;

 
      $nm_select = "select descripcion from pagos_conceptos where idpagos_conceptos=$this->id_concepto "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_conceptos = array();
     if ($this->id_concepto != "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dt_conceptos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_conceptos = false;
          $this->dt_conceptos_erro = $this->Db->ErrorMsg();
      } 
     } 
;
$this->conc =$this->dt_conceptos[0][0];
$this->sc_set_focus('concepto');

$modificado_id_concepto = $this->id_concepto;
$modificado_conc = $this->conc;
$this->nm_formatar_campos('id_concepto', 'conc');
if ($original_id_concepto !== $modificado_id_concepto || isset($this->nmgp_cmp_readonly['id_concepto']) || (isset($bFlagRead_id_concepto) && $bFlagRead_id_concepto))
{
    $this->ajax_return_values_id_concepto(true);
}
if ($original_conc !== $modificado_conc || isset($this->nmgp_cmp_readonly['conc']) || (isset($bFlagRead_conc) && $bFlagRead_conc))
{
    $this->ajax_return_values_conc(true);
}
$this->NM_ajax_info['event_field'] = 'id';
form_hacerpagos_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
function iddocapagar_onChange()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  



$this->nm_formatar_campos();
$this->NM_ajax_info['event_field'] = 'iddocapagar';
form_hacerpagos_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
function ncuenta_tercero_onChange()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gmensaje_ce)) {$this->sc_temp_gmensaje_ce = (isset($_SESSION['gmensaje_ce'])) ? $_SESSION['gmensaje_ce'] : "";}
  
$original_client = $this->client;
$original_total_cuenta = $this->total_cuenta;
$original_docapagar = $this->docapagar;
$original_saldodocumento = $this->saldodocumento;
$original_montocan = $this->montocan;
$original_valor_base = $this->valor_base;
$original_valor_iva = $this->valor_iva;
$original_porc_ret = $this->porc_ret;
$original_ret = $this->ret;
$original_porc_ica = $this->porc_ica;
$original_val_ica = $this->val_ica;
$original_porc_reteiva = $this->porc_reteiva;
$original_val_reteiva = $this->val_reteiva;
$original_iddocapagar = $this->iddocapagar;
$original_valpagar = $this->valpagar;
$original_idpago = $this->idpago;
$original_ncuenta_tercero = $this->ncuenta_tercero;
$original_descuent = $this->descuent;
$original_titulo = $this->titulo;

$this->client      = "";
$this->total_cuenta  = 0;
$this->docapagar   = "";
$this->saldodocumento =0;
$this->montocan =0;
$this->valor_base =0;
$this->valor_iva =0;
$this->porc_ret =0;
$this->ret =0;
$this->porc_ica =0;
$this->val_ica =0;
$this->porc_reteiva =0;
$this->val_reteiva =0;
$this->iddocapagar ='';
$descuento =0;
$this->valpagar =0;
$vndoc = "";
$vdocapagar = "";
$vclien     = "";

if($this->idpago >0)
{
	 
      $nm_select = "select sum(monto) from detallepagos where idfp='".$this->idpago ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_et = array();
     if ($this->idpago != "")
     { 
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
                      $this->ds_et[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_et = false;
          $this->ds_et_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if(isset($this->ds_et[0][0]))
	{
		$this->montocan  = $this->ds_et[0][0];
	}
	else
	{
		$this->montocan  = 0;
	}
}

if(!empty($this->ncuenta_tercero ))
{
	$this->sc_field_readonly("docapagar", 'on');
	
	
	$vsql = "select  tercero, saldo,numero_documento from terceros_cuentas where concat(prefijo,'/',numero)='".$this->ncuenta_tercero ."' and ie='EGRESO'";
	 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDatos = array();
      $this->vdatos = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vDatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vdatos[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDatos = false;
          $this->vDatos_erro = $this->Db->ErrorMsg();
          $this->vdatos = false;
          $this->vdatos_erro = $this->Db->ErrorMsg();
      } 
;

	if(isset($this->vdatos[0][0]))
	{
		$vclien = $this->vdatos[0][0];
		$this->total_cuenta  = $this->vdatos[0][1];
		$this->saldodocumento  = $this->vdatos[0][1];
		$this->valpagar  = $this->vdatos[0][1];
		$this->montocan  = 0;
		
		if(!empty($this->vdatos[0][2]))
		{
			$vpos  = strpos($this->vdatos[0][2], "/");
			
			if($vpos === false)
			{
				
			}
			else
			{
				 
      $nm_select = "select idfaccom,numfacom from facturacom where concat('00/',numfacom)='".$this->vdatos[0][2] ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDatos2 = array();
      $this->vdatos2 = array();
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
                      $this->vDatos2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vdatos2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDatos2 = false;
          $this->vDatos2_erro = $this->Db->ErrorMsg();
          $this->vdatos2 = false;
          $this->vdatos2_erro = $this->Db->ErrorMsg();
      } 
;
				
				if(isset($this->vdatos2[0][0]))
				{	
					
					$this->iddocapagar  = $this->vdatos2[0][0];
					$vdocapagar   = $this->vdatos2[0][1];
					
					$vAsent='';
					$vAsent=$this->fSiAsentada();
					if($vAsent==0)
					{
						if($this->idpago >0)
						{
							 
      $nm_select = "select sum(monto) as monto from detallepagos where id_pago=$this->idpago "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dset = array();
     if ($this->idpago != "")
     { 
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
                      $this->dset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dset = false;
          $this->dset_erro = $this->Db->ErrorMsg();
      } 
     } 
;
							if($this->dset[0][0]>1 or $this->dset[0][0]==1)
							{		
								$this->sc_ajax_message("RECIBO TIENE DETALLE, NO SE PUEDE MODIFICAR LA FACTURA", "Advertencia", "modal=N&button=Y&button_label=Ok&redir=../grid_pagos&show_close=N", "");
								if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

							}
							else
							{
								goto eti;
							}
						}
						else
						{
							eti:;
							$this->descuent =0;
							$this->saldodocumento =0;
							$this->docapagar ="";
							 
      $nm_select = "select numfacom, valoriva, total, saldo, retencion, reteica, reteiva from facturacom where idfaccom=$this->iddocapagar "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
     if ($this->iddocapagar != "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[5] = str_replace(',', '.', $SCrx->fields[5]);
                 $SCrx->fields[6] = str_replace(',', '.', $SCrx->fields[6]);
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 $SCrx->fields[4] = (strpos(strtolower($SCrx->fields[4]), "e")) ? (float)$SCrx->fields[4] : $SCrx->fields[4];
                 $SCrx->fields[4] = (string)$SCrx->fields[4];
                 $SCrx->fields[5] = (strpos(strtolower($SCrx->fields[5]), "e")) ? (float)$SCrx->fields[5] : $SCrx->fields[5];
                 $SCrx->fields[5] = (string)$SCrx->fields[5];
                 $SCrx->fields[6] = (strpos(strtolower($SCrx->fields[6]), "e")) ? (float)$SCrx->fields[6] : $SCrx->fields[6];
                 $SCrx->fields[6] = (string)$SCrx->fields[6];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dt[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt = false;
          $this->dt_erro = $this->Db->ErrorMsg();
      } 
     } 
;
							
							if(isset($this->dt[0][0]))
							{
								$this->docapagar =$this->dt[0][0];
								$this->saldodocumento =$this->dt[0][3];

								$vBaseRet=($this->dt[0][2]-$this->dt[0][1]);
								$this->valor_base =$vBaseRet;
								$this->valor_iva =$this->dt[0][1];

								if($this->dt[0][4]>0)
									{
									$vTasaRet=round(($this->dt[0][4]/100), 3);
									$this->porc_ret =$this->dt[0][4];
									$this->ret =round(($vBaseRet*$vTasaRet), 0);
									}
								else
									{
									$this->porc_ret =0.000;
									$this->ret =0.00;
									}

								if($this->dt[0][5]>0)
									{
									$vTasaIca=$this->dt[0][5];
									$this->porc_ica =$this->dt[0][5];
									$this->val_ica =round((($vBaseRet*$vTasaIca)/1000), 0);
									}
								else
									{
									$this->porc_ica =0.000;
									$this->val_ica =0.00;
									}

								if($this->dt[0][6]>0)
									{
									$vTasaRiva=round(($this->dt[0][6]/100), 3);
									$this->porc_reteiva =$this->dt[0][6];
									$this->val_reteiva =round(($this->dt[0][1]*$vTasaRiva), 0);
									}
								else
									{
									$this->porc_reteiva =0.000;
									$this->val_reteiva =0.00;
									}

								$this->valpagar =$this->dt[0][3]-($this->ret +$this->val_ica +$this->val_reteiva +$this->descuent );
								if($this->valpagar <0)
									{
									$this->valpagar =0;
									}

								$this->sc_set_focus('descuent');
							}
							else
							{
								echo "No se encuentra el documento";
							}
						}
					}
					else
					{
						$this->sc_ajax_message("RECIBO YA FUE ASENTADO, NO SE PUEDE MODIFICAR LA FACTURA", "Advertencia", "modal=N&button=Y&button_label=Ok&redir=../grid_pagos&show_close=N", "");
						if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

					}
				}
			}
		}
	}
	else
	{
		$this->client        = "";
		$this->total_cuenta  = 0;
		$this->docapagar     = "";
	}
}
else
{
	$this->sc_field_readonly("docapagar", 'off');
	$this->client       = "";
	$this->total_cuenta  = 0;
	$this->docapagar         = "";
	$this->saldodocumento =0;
	$this->montocan =0;
	$this->valor_base =0;
	$this->valor_iva =0;
	$this->porc_ret =0;
	$this->ret =0;
	$this->porc_ica =0;
	$this->val_ica =0;
	$this->porc_reteiva =0;
	$this->val_reteiva =0;
	$this->iddocapagar ='';
	$descuento =0;
	$this->valpagar =0;
}
$this->client  = $vclien;

if(!empty($this->ncuenta_tercero ))
{
	$this->sc_temp_gmensaje_ce = '';
	$this->sc_temp_gmensaje_ce = 'Cuenta: '.$this->ncuenta_tercero ;
}
if(!empty($vdocapagar))
{
	$this->sc_temp_gmensaje_ce .= ' -- Documento: 00/'.$vdocapagar;
	$this->docapagar  = $vdocapagar;
	$this->sc_field_readonly("client", 'on');
}
else
{
	$this->sc_field_readonly("client", 'off');
	$this->sc_temp_gmensaje_ce = "";
}

$this->titulo  = $this->sc_temp_gmensaje_ce;



if (isset($this->sc_temp_gmensaje_ce)) { $_SESSION['gmensaje_ce'] = $this->sc_temp_gmensaje_ce;}
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
$modificado_client = $this->client;
$modificado_total_cuenta = $this->total_cuenta;
$modificado_docapagar = $this->docapagar;
$modificado_saldodocumento = $this->saldodocumento;
$modificado_montocan = $this->montocan;
$modificado_valor_base = $this->valor_base;
$modificado_valor_iva = $this->valor_iva;
$modificado_porc_ret = $this->porc_ret;
$modificado_ret = $this->ret;
$modificado_porc_ica = $this->porc_ica;
$modificado_val_ica = $this->val_ica;
$modificado_porc_reteiva = $this->porc_reteiva;
$modificado_val_reteiva = $this->val_reteiva;
$modificado_iddocapagar = $this->iddocapagar;
$modificado_valpagar = $this->valpagar;
$modificado_idpago = $this->idpago;
$modificado_ncuenta_tercero = $this->ncuenta_tercero;
$modificado_descuent = $this->descuent;
$modificado_titulo = $this->titulo;
$this->nm_formatar_campos('client', 'total_cuenta', 'docapagar', 'saldodocumento', 'montocan', 'valor_base', 'valor_iva', 'porc_ret', 'ret', 'porc_ica', 'val_ica', 'porc_reteiva', 'val_reteiva', 'iddocapagar', 'valpagar', 'idpago', 'ncuenta_tercero', 'descuent', 'titulo');
if ($original_client !== $modificado_client || isset($this->nmgp_cmp_readonly['client']) || (isset($bFlagRead_client) && $bFlagRead_client))
{
    $this->ajax_return_values_client(true);
}
if ($original_total_cuenta !== $modificado_total_cuenta || isset($this->nmgp_cmp_readonly['total_cuenta']) || (isset($bFlagRead_total_cuenta) && $bFlagRead_total_cuenta))
{
    $this->ajax_return_values_total_cuenta(true);
}
if ($original_docapagar !== $modificado_docapagar || isset($this->nmgp_cmp_readonly['docapagar']) || (isset($bFlagRead_docapagar) && $bFlagRead_docapagar))
{
    $this->ajax_return_values_docapagar(true);
}
if ($original_saldodocumento !== $modificado_saldodocumento || isset($this->nmgp_cmp_readonly['saldodocumento']) || (isset($bFlagRead_saldodocumento) && $bFlagRead_saldodocumento))
{
    $this->ajax_return_values_saldodocumento(true);
}
if ($original_montocan !== $modificado_montocan || isset($this->nmgp_cmp_readonly['montocan']) || (isset($bFlagRead_montocan) && $bFlagRead_montocan))
{
    $this->ajax_return_values_montocan(true);
}
if ($original_valor_base !== $modificado_valor_base || isset($this->nmgp_cmp_readonly['valor_base']) || (isset($bFlagRead_valor_base) && $bFlagRead_valor_base))
{
    $this->ajax_return_values_valor_base(true);
}
if ($original_valor_iva !== $modificado_valor_iva || isset($this->nmgp_cmp_readonly['valor_iva']) || (isset($bFlagRead_valor_iva) && $bFlagRead_valor_iva))
{
    $this->ajax_return_values_valor_iva(true);
}
if ($original_porc_ret !== $modificado_porc_ret || isset($this->nmgp_cmp_readonly['porc_ret']) || (isset($bFlagRead_porc_ret) && $bFlagRead_porc_ret))
{
    $this->ajax_return_values_porc_ret(true);
}
if ($original_ret !== $modificado_ret || isset($this->nmgp_cmp_readonly['ret']) || (isset($bFlagRead_ret) && $bFlagRead_ret))
{
    $this->ajax_return_values_ret(true);
}
if ($original_porc_ica !== $modificado_porc_ica || isset($this->nmgp_cmp_readonly['porc_ica']) || (isset($bFlagRead_porc_ica) && $bFlagRead_porc_ica))
{
    $this->ajax_return_values_porc_ica(true);
}
if ($original_val_ica !== $modificado_val_ica || isset($this->nmgp_cmp_readonly['val_ica']) || (isset($bFlagRead_val_ica) && $bFlagRead_val_ica))
{
    $this->ajax_return_values_val_ica(true);
}
if ($original_porc_reteiva !== $modificado_porc_reteiva || isset($this->nmgp_cmp_readonly['porc_reteiva']) || (isset($bFlagRead_porc_reteiva) && $bFlagRead_porc_reteiva))
{
    $this->ajax_return_values_porc_reteiva(true);
}
if ($original_val_reteiva !== $modificado_val_reteiva || isset($this->nmgp_cmp_readonly['val_reteiva']) || (isset($bFlagRead_val_reteiva) && $bFlagRead_val_reteiva))
{
    $this->ajax_return_values_val_reteiva(true);
}
if ($original_iddocapagar !== $modificado_iddocapagar || isset($this->nmgp_cmp_readonly['iddocapagar']) || (isset($bFlagRead_iddocapagar) && $bFlagRead_iddocapagar))
{
    $this->ajax_return_values_iddocapagar(true);
}
if ($original_valpagar !== $modificado_valpagar || isset($this->nmgp_cmp_readonly['valpagar']) || (isset($bFlagRead_valpagar) && $bFlagRead_valpagar))
{
    $this->ajax_return_values_valpagar(true);
}
if ($original_idpago !== $modificado_idpago || isset($this->nmgp_cmp_readonly['idpago']) || (isset($bFlagRead_idpago) && $bFlagRead_idpago))
{
    $this->ajax_return_values_idpago(true);
}
if ($original_ncuenta_tercero !== $modificado_ncuenta_tercero || isset($this->nmgp_cmp_readonly['ncuenta_tercero']) || (isset($bFlagRead_ncuenta_tercero) && $bFlagRead_ncuenta_tercero))
{
    $this->ajax_return_values_ncuenta_tercero(true);
}
if ($original_descuent !== $modificado_descuent || isset($this->nmgp_cmp_readonly['descuent']) || (isset($bFlagRead_descuent) && $bFlagRead_descuent))
{
    $this->ajax_return_values_descuent(true);
}
if ($original_titulo !== $modificado_titulo || isset($this->nmgp_cmp_readonly['titulo']) || (isset($bFlagRead_titulo) && $bFlagRead_titulo))
{
    $this->ajax_return_values_titulo(true);
}
$this->NM_ajax_info['event_field'] = 'ncuenta';
form_hacerpagos_pack_ajax_response();
exit;
}
function porc_ica_onChange()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  
$original_iddocapagar = $this->iddocapagar;
$original_porc_ica = $this->porc_ica;
$original_val_ica = $this->val_ica;
$original_valpagar = $this->valpagar;
$original_ret = $this->ret;
$original_val_reteiva = $this->val_reteiva;
$original_descuent = $this->descuent;

 
      $nm_select = "select valoriva, total, saldo from facturacom where idfaccom=$this->iddocapagar "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_ret = array();
     if ($this->iddocapagar != "")
     { 
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
                      $this->dt_ret[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_ret = false;
          $this->dt_ret_erro = $this->Db->ErrorMsg();
      } 
     } 
;
			
if($this->dt_ret[0][1]>0)
	{
	$BasFac=$this->dt_ret[0][1]-$this->dt_ret[0][0];
	$TasIca=$this->porc_ica ;
	$this->val_ica =round(($BasFac*$TasIca)/1000, 0);
	
	$this->valpagar =$this->dt_ret[0][2]-($this->ret +$this->val_ica +$this->val_reteiva +$this->descuent );
	if($this->valpagar <0)
		{
		$this->valpagar =0;
		}
	}

		


$modificado_iddocapagar = $this->iddocapagar;
$modificado_porc_ica = $this->porc_ica;
$modificado_val_ica = $this->val_ica;
$modificado_valpagar = $this->valpagar;
$modificado_ret = $this->ret;
$modificado_val_reteiva = $this->val_reteiva;
$modificado_descuent = $this->descuent;
$this->nm_formatar_campos('iddocapagar', 'porc_ica', 'val_ica', 'valpagar', 'ret', 'val_reteiva', 'descuent');
if ($original_iddocapagar !== $modificado_iddocapagar || isset($this->nmgp_cmp_readonly['iddocapagar']) || (isset($bFlagRead_iddocapagar) && $bFlagRead_iddocapagar))
{
    $this->ajax_return_values_iddocapagar(true);
}
if ($original_porc_ica !== $modificado_porc_ica || isset($this->nmgp_cmp_readonly['porc_ica']) || (isset($bFlagRead_porc_ica) && $bFlagRead_porc_ica))
{
    $this->ajax_return_values_porc_ica(true);
}
if ($original_val_ica !== $modificado_val_ica || isset($this->nmgp_cmp_readonly['val_ica']) || (isset($bFlagRead_val_ica) && $bFlagRead_val_ica))
{
    $this->ajax_return_values_val_ica(true);
}
if ($original_valpagar !== $modificado_valpagar || isset($this->nmgp_cmp_readonly['valpagar']) || (isset($bFlagRead_valpagar) && $bFlagRead_valpagar))
{
    $this->ajax_return_values_valpagar(true);
}
if ($original_ret !== $modificado_ret || isset($this->nmgp_cmp_readonly['ret']) || (isset($bFlagRead_ret) && $bFlagRead_ret))
{
    $this->ajax_return_values_ret(true);
}
if ($original_val_reteiva !== $modificado_val_reteiva || isset($this->nmgp_cmp_readonly['val_reteiva']) || (isset($bFlagRead_val_reteiva) && $bFlagRead_val_reteiva))
{
    $this->ajax_return_values_val_reteiva(true);
}
if ($original_descuent !== $modificado_descuent || isset($this->nmgp_cmp_readonly['descuent']) || (isset($bFlagRead_descuent) && $bFlagRead_descuent))
{
    $this->ajax_return_values_descuent(true);
}
$this->NM_ajax_info['event_field'] = 'porc';
form_hacerpagos_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
function porc_ica_onClick()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  
$original_idpago = $this->idpago;
$original_ret = $this->ret;
$original_descuent = $this->descuent;
$original_iddocapagar = $this->iddocapagar;
$original_porc_ret = $this->porc_ret;
$original_porc_ica = $this->porc_ica;
$original_val_ica = $this->val_ica;
$original_porc_reteiva = $this->porc_reteiva;
$original_val_reteiva = $this->val_reteiva;

$this->fDesactiva_campos();

$modificado_idpago = $this->idpago;
$modificado_ret = $this->ret;
$modificado_descuent = $this->descuent;
$modificado_iddocapagar = $this->iddocapagar;
$modificado_porc_ret = $this->porc_ret;
$modificado_porc_ica = $this->porc_ica;
$modificado_val_ica = $this->val_ica;
$modificado_porc_reteiva = $this->porc_reteiva;
$modificado_val_reteiva = $this->val_reteiva;
$this->nm_formatar_campos('idpago', 'ret', 'descuent', 'iddocapagar', 'porc_ret', 'porc_ica', 'val_ica', 'porc_reteiva', 'val_reteiva');
if ($original_idpago !== $modificado_idpago || isset($this->nmgp_cmp_readonly['idpago']) || (isset($bFlagRead_idpago) && $bFlagRead_idpago))
{
    $this->ajax_return_values_idpago(true);
}
if ($original_ret !== $modificado_ret || isset($this->nmgp_cmp_readonly['ret']) || (isset($bFlagRead_ret) && $bFlagRead_ret))
{
    $this->ajax_return_values_ret(true);
}
if ($original_descuent !== $modificado_descuent || isset($this->nmgp_cmp_readonly['descuent']) || (isset($bFlagRead_descuent) && $bFlagRead_descuent))
{
    $this->ajax_return_values_descuent(true);
}
if ($original_iddocapagar !== $modificado_iddocapagar || isset($this->nmgp_cmp_readonly['iddocapagar']) || (isset($bFlagRead_iddocapagar) && $bFlagRead_iddocapagar))
{
    $this->ajax_return_values_iddocapagar(true);
}
if ($original_porc_ret !== $modificado_porc_ret || isset($this->nmgp_cmp_readonly['porc_ret']) || (isset($bFlagRead_porc_ret) && $bFlagRead_porc_ret))
{
    $this->ajax_return_values_porc_ret(true);
}
if ($original_porc_ica !== $modificado_porc_ica || isset($this->nmgp_cmp_readonly['porc_ica']) || (isset($bFlagRead_porc_ica) && $bFlagRead_porc_ica))
{
    $this->ajax_return_values_porc_ica(true);
}
if ($original_val_ica !== $modificado_val_ica || isset($this->nmgp_cmp_readonly['val_ica']) || (isset($bFlagRead_val_ica) && $bFlagRead_val_ica))
{
    $this->ajax_return_values_val_ica(true);
}
if ($original_porc_reteiva !== $modificado_porc_reteiva || isset($this->nmgp_cmp_readonly['porc_reteiva']) || (isset($bFlagRead_porc_reteiva) && $bFlagRead_porc_reteiva))
{
    $this->ajax_return_values_porc_reteiva(true);
}
if ($original_val_reteiva !== $modificado_val_reteiva || isset($this->nmgp_cmp_readonly['val_reteiva']) || (isset($bFlagRead_val_reteiva) && $bFlagRead_val_reteiva))
{
    $this->ajax_return_values_val_reteiva(true);
}
$this->NM_ajax_info['event_field'] = 'porc';
form_hacerpagos_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
function porc_ret_onChange()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  
$original_iddocapagar = $this->iddocapagar;
$original_porc_ret = $this->porc_ret;
$original_ret = $this->ret;
$original_valpagar = $this->valpagar;
$original_val_ica = $this->val_ica;
$original_val_reteiva = $this->val_reteiva;
$original_descuent = $this->descuent;

 
      $nm_select = "select valoriva, total, saldo from facturacom where idfaccom=$this->iddocapagar "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_ret = array();
     if ($this->iddocapagar != "")
     { 
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
                      $this->dt_ret[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_ret = false;
          $this->dt_ret_erro = $this->Db->ErrorMsg();
      } 
     } 
;
			
if($this->dt_ret[0][1]>0)
	{
	$vBaseRet=($this->dt_ret[0][1]-$this->dt_ret[0][0]);
	$vTasaRet=round(($this->porc_ret /100), 3);
	$this->ret =round(($vBaseRet*$vTasaRet), 0);
	
	$this->valpagar =$this->dt_ret[0][2]-($this->ret +$this->val_ica +$this->val_reteiva +$this->descuent );
	if($this->valpagar <0)
		{
		$this->valpagar =0;
		}
	}
	


$modificado_iddocapagar = $this->iddocapagar;
$modificado_porc_ret = $this->porc_ret;
$modificado_ret = $this->ret;
$modificado_valpagar = $this->valpagar;
$modificado_val_ica = $this->val_ica;
$modificado_val_reteiva = $this->val_reteiva;
$modificado_descuent = $this->descuent;
$this->nm_formatar_campos('iddocapagar', 'porc_ret', 'ret', 'valpagar', 'val_ica', 'val_reteiva', 'descuent');
if ($original_iddocapagar !== $modificado_iddocapagar || isset($this->nmgp_cmp_readonly['iddocapagar']) || (isset($bFlagRead_iddocapagar) && $bFlagRead_iddocapagar))
{
    $this->ajax_return_values_iddocapagar(true);
}
if ($original_porc_ret !== $modificado_porc_ret || isset($this->nmgp_cmp_readonly['porc_ret']) || (isset($bFlagRead_porc_ret) && $bFlagRead_porc_ret))
{
    $this->ajax_return_values_porc_ret(true);
}
if ($original_ret !== $modificado_ret || isset($this->nmgp_cmp_readonly['ret']) || (isset($bFlagRead_ret) && $bFlagRead_ret))
{
    $this->ajax_return_values_ret(true);
}
if ($original_valpagar !== $modificado_valpagar || isset($this->nmgp_cmp_readonly['valpagar']) || (isset($bFlagRead_valpagar) && $bFlagRead_valpagar))
{
    $this->ajax_return_values_valpagar(true);
}
if ($original_val_ica !== $modificado_val_ica || isset($this->nmgp_cmp_readonly['val_ica']) || (isset($bFlagRead_val_ica) && $bFlagRead_val_ica))
{
    $this->ajax_return_values_val_ica(true);
}
if ($original_val_reteiva !== $modificado_val_reteiva || isset($this->nmgp_cmp_readonly['val_reteiva']) || (isset($bFlagRead_val_reteiva) && $bFlagRead_val_reteiva))
{
    $this->ajax_return_values_val_reteiva(true);
}
if ($original_descuent !== $modificado_descuent || isset($this->nmgp_cmp_readonly['descuent']) || (isset($bFlagRead_descuent) && $bFlagRead_descuent))
{
    $this->ajax_return_values_descuent(true);
}
$this->NM_ajax_info['event_field'] = 'porc';
form_hacerpagos_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
function porc_ret_onClick()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  
$original_idpago = $this->idpago;
$original_ret = $this->ret;
$original_descuent = $this->descuent;
$original_iddocapagar = $this->iddocapagar;
$original_porc_ret = $this->porc_ret;
$original_porc_ica = $this->porc_ica;
$original_val_ica = $this->val_ica;
$original_porc_reteiva = $this->porc_reteiva;
$original_val_reteiva = $this->val_reteiva;

$this->fDesactiva_campos();

$modificado_idpago = $this->idpago;
$modificado_ret = $this->ret;
$modificado_descuent = $this->descuent;
$modificado_iddocapagar = $this->iddocapagar;
$modificado_porc_ret = $this->porc_ret;
$modificado_porc_ica = $this->porc_ica;
$modificado_val_ica = $this->val_ica;
$modificado_porc_reteiva = $this->porc_reteiva;
$modificado_val_reteiva = $this->val_reteiva;
$this->nm_formatar_campos('idpago', 'ret', 'descuent', 'iddocapagar', 'porc_ret', 'porc_ica', 'val_ica', 'porc_reteiva', 'val_reteiva');
if ($original_idpago !== $modificado_idpago || isset($this->nmgp_cmp_readonly['idpago']) || (isset($bFlagRead_idpago) && $bFlagRead_idpago))
{
    $this->ajax_return_values_idpago(true);
}
if ($original_ret !== $modificado_ret || isset($this->nmgp_cmp_readonly['ret']) || (isset($bFlagRead_ret) && $bFlagRead_ret))
{
    $this->ajax_return_values_ret(true);
}
if ($original_descuent !== $modificado_descuent || isset($this->nmgp_cmp_readonly['descuent']) || (isset($bFlagRead_descuent) && $bFlagRead_descuent))
{
    $this->ajax_return_values_descuent(true);
}
if ($original_iddocapagar !== $modificado_iddocapagar || isset($this->nmgp_cmp_readonly['iddocapagar']) || (isset($bFlagRead_iddocapagar) && $bFlagRead_iddocapagar))
{
    $this->ajax_return_values_iddocapagar(true);
}
if ($original_porc_ret !== $modificado_porc_ret || isset($this->nmgp_cmp_readonly['porc_ret']) || (isset($bFlagRead_porc_ret) && $bFlagRead_porc_ret))
{
    $this->ajax_return_values_porc_ret(true);
}
if ($original_porc_ica !== $modificado_porc_ica || isset($this->nmgp_cmp_readonly['porc_ica']) || (isset($bFlagRead_porc_ica) && $bFlagRead_porc_ica))
{
    $this->ajax_return_values_porc_ica(true);
}
if ($original_val_ica !== $modificado_val_ica || isset($this->nmgp_cmp_readonly['val_ica']) || (isset($bFlagRead_val_ica) && $bFlagRead_val_ica))
{
    $this->ajax_return_values_val_ica(true);
}
if ($original_porc_reteiva !== $modificado_porc_reteiva || isset($this->nmgp_cmp_readonly['porc_reteiva']) || (isset($bFlagRead_porc_reteiva) && $bFlagRead_porc_reteiva))
{
    $this->ajax_return_values_porc_reteiva(true);
}
if ($original_val_reteiva !== $modificado_val_reteiva || isset($this->nmgp_cmp_readonly['val_reteiva']) || (isset($bFlagRead_val_reteiva) && $bFlagRead_val_reteiva))
{
    $this->ajax_return_values_val_reteiva(true);
}
$this->NM_ajax_info['event_field'] = 'porc';
form_hacerpagos_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
function porc_reteiva_onChange()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  
$original_iddocapagar = $this->iddocapagar;
$original_porc_reteiva = $this->porc_reteiva;
$original_val_reteiva = $this->val_reteiva;
$original_valpagar = $this->valpagar;
$original_ret = $this->ret;
$original_val_ica = $this->val_ica;
$original_descuent = $this->descuent;

 
      $nm_select = "select valoriva, total, saldo from facturacom where idfaccom=$this->iddocapagar "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_ret = array();
     if ($this->iddocapagar != "")
     { 
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
                      $this->dt_ret[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_ret = false;
          $this->dt_ret_erro = $this->Db->ErrorMsg();
      } 
     } 
;
			
if($this->dt_ret[0][1]>0)
	{
	$vIVA=$this->dt_ret[0][0];
	$vTasaRetiva=round(($this->porc_reteiva /100), 3);
	$this->val_reteiva =round(($vIVA*$vTasaRetiva), 0);
	$this->valpagar =$this->dt_ret[0][2]-($this->ret +$this->val_ica +$this->val_reteiva +$this->descuent );
	if($this->valpagar <0)
		{
		$this->valpagar =0;
		}
	}
	


$modificado_iddocapagar = $this->iddocapagar;
$modificado_porc_reteiva = $this->porc_reteiva;
$modificado_val_reteiva = $this->val_reteiva;
$modificado_valpagar = $this->valpagar;
$modificado_ret = $this->ret;
$modificado_val_ica = $this->val_ica;
$modificado_descuent = $this->descuent;
$this->nm_formatar_campos('iddocapagar', 'porc_reteiva', 'val_reteiva', 'valpagar', 'ret', 'val_ica', 'descuent');
if ($original_iddocapagar !== $modificado_iddocapagar || isset($this->nmgp_cmp_readonly['iddocapagar']) || (isset($bFlagRead_iddocapagar) && $bFlagRead_iddocapagar))
{
    $this->ajax_return_values_iddocapagar(true);
}
if ($original_porc_reteiva !== $modificado_porc_reteiva || isset($this->nmgp_cmp_readonly['porc_reteiva']) || (isset($bFlagRead_porc_reteiva) && $bFlagRead_porc_reteiva))
{
    $this->ajax_return_values_porc_reteiva(true);
}
if ($original_val_reteiva !== $modificado_val_reteiva || isset($this->nmgp_cmp_readonly['val_reteiva']) || (isset($bFlagRead_val_reteiva) && $bFlagRead_val_reteiva))
{
    $this->ajax_return_values_val_reteiva(true);
}
if ($original_valpagar !== $modificado_valpagar || isset($this->nmgp_cmp_readonly['valpagar']) || (isset($bFlagRead_valpagar) && $bFlagRead_valpagar))
{
    $this->ajax_return_values_valpagar(true);
}
if ($original_ret !== $modificado_ret || isset($this->nmgp_cmp_readonly['ret']) || (isset($bFlagRead_ret) && $bFlagRead_ret))
{
    $this->ajax_return_values_ret(true);
}
if ($original_val_ica !== $modificado_val_ica || isset($this->nmgp_cmp_readonly['val_ica']) || (isset($bFlagRead_val_ica) && $bFlagRead_val_ica))
{
    $this->ajax_return_values_val_ica(true);
}
if ($original_descuent !== $modificado_descuent || isset($this->nmgp_cmp_readonly['descuent']) || (isset($bFlagRead_descuent) && $bFlagRead_descuent))
{
    $this->ajax_return_values_descuent(true);
}
$this->NM_ajax_info['event_field'] = 'porc';
form_hacerpagos_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
function porc_reteiva_onClick()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  
$original_idpago = $this->idpago;
$original_ret = $this->ret;
$original_descuent = $this->descuent;
$original_iddocapagar = $this->iddocapagar;
$original_porc_ret = $this->porc_ret;
$original_porc_ica = $this->porc_ica;
$original_val_ica = $this->val_ica;
$original_porc_reteiva = $this->porc_reteiva;
$original_val_reteiva = $this->val_reteiva;

$this->fDesactiva_campos();

$modificado_idpago = $this->idpago;
$modificado_ret = $this->ret;
$modificado_descuent = $this->descuent;
$modificado_iddocapagar = $this->iddocapagar;
$modificado_porc_ret = $this->porc_ret;
$modificado_porc_ica = $this->porc_ica;
$modificado_val_ica = $this->val_ica;
$modificado_porc_reteiva = $this->porc_reteiva;
$modificado_val_reteiva = $this->val_reteiva;
$this->nm_formatar_campos('idpago', 'ret', 'descuent', 'iddocapagar', 'porc_ret', 'porc_ica', 'val_ica', 'porc_reteiva', 'val_reteiva');
if ($original_idpago !== $modificado_idpago || isset($this->nmgp_cmp_readonly['idpago']) || (isset($bFlagRead_idpago) && $bFlagRead_idpago))
{
    $this->ajax_return_values_idpago(true);
}
if ($original_ret !== $modificado_ret || isset($this->nmgp_cmp_readonly['ret']) || (isset($bFlagRead_ret) && $bFlagRead_ret))
{
    $this->ajax_return_values_ret(true);
}
if ($original_descuent !== $modificado_descuent || isset($this->nmgp_cmp_readonly['descuent']) || (isset($bFlagRead_descuent) && $bFlagRead_descuent))
{
    $this->ajax_return_values_descuent(true);
}
if ($original_iddocapagar !== $modificado_iddocapagar || isset($this->nmgp_cmp_readonly['iddocapagar']) || (isset($bFlagRead_iddocapagar) && $bFlagRead_iddocapagar))
{
    $this->ajax_return_values_iddocapagar(true);
}
if ($original_porc_ret !== $modificado_porc_ret || isset($this->nmgp_cmp_readonly['porc_ret']) || (isset($bFlagRead_porc_ret) && $bFlagRead_porc_ret))
{
    $this->ajax_return_values_porc_ret(true);
}
if ($original_porc_ica !== $modificado_porc_ica || isset($this->nmgp_cmp_readonly['porc_ica']) || (isset($bFlagRead_porc_ica) && $bFlagRead_porc_ica))
{
    $this->ajax_return_values_porc_ica(true);
}
if ($original_val_ica !== $modificado_val_ica || isset($this->nmgp_cmp_readonly['val_ica']) || (isset($bFlagRead_val_ica) && $bFlagRead_val_ica))
{
    $this->ajax_return_values_val_ica(true);
}
if ($original_porc_reteiva !== $modificado_porc_reteiva || isset($this->nmgp_cmp_readonly['porc_reteiva']) || (isset($bFlagRead_porc_reteiva) && $bFlagRead_porc_reteiva))
{
    $this->ajax_return_values_porc_reteiva(true);
}
if ($original_val_reteiva !== $modificado_val_reteiva || isset($this->nmgp_cmp_readonly['val_reteiva']) || (isset($bFlagRead_val_reteiva) && $bFlagRead_val_reteiva))
{
    $this->ajax_return_values_val_reteiva(true);
}
$this->NM_ajax_info['event_field'] = 'porc';
form_hacerpagos_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
function ret_onChange()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  
$original_iddocapagar = $this->iddocapagar;
$original_valpagar = $this->valpagar;
$original_ret = $this->ret;
$original_val_ica = $this->val_ica;
$original_val_reteiva = $this->val_reteiva;
$original_descuent = $this->descuent;
$original_saldodocumento = $this->saldodocumento;
$original_ret = $this->ret;

$this->fDescuento();
 
      $nm_select = "select valoriva, total, saldo from facturacom where idfaccom=$this->iddocapagar "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_ret = array();
     if ($this->iddocapagar != "")
     { 
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
                      $this->dt_ret[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_ret = false;
          $this->dt_ret_erro = $this->Db->ErrorMsg();
      } 
     } 
;
$this->valpagar =$this->dt_ret[0][2]-($this->ret +$this->val_ica +$this->val_reteiva +$this->descuent );
if($this->valpagar <0)
	{
	$this->valpagar =0;
	}

$modificado_iddocapagar = $this->iddocapagar;
$modificado_valpagar = $this->valpagar;
$modificado_ret = $this->ret;
$modificado_val_ica = $this->val_ica;
$modificado_val_reteiva = $this->val_reteiva;
$modificado_descuent = $this->descuent;
$modificado_saldodocumento = $this->saldodocumento;
$modificado_ret = $this->ret;
$this->nm_formatar_campos('iddocapagar', 'valpagar', 'ret', 'val_ica', 'val_reteiva', 'descuent', 'saldodocumento');
if ($original_iddocapagar !== $modificado_iddocapagar || isset($this->nmgp_cmp_readonly['iddocapagar']) || (isset($bFlagRead_iddocapagar) && $bFlagRead_iddocapagar))
{
    $this->ajax_return_values_iddocapagar(true);
}
if ($original_valpagar !== $modificado_valpagar || isset($this->nmgp_cmp_readonly['valpagar']) || (isset($bFlagRead_valpagar) && $bFlagRead_valpagar))
{
    $this->ajax_return_values_valpagar(true);
}
if ($original_ret !== $modificado_ret || isset($this->nmgp_cmp_readonly['ret']) || (isset($bFlagRead_ret) && $bFlagRead_ret))
{
    $this->ajax_return_values_ret(true);
}
if ($original_val_ica !== $modificado_val_ica || isset($this->nmgp_cmp_readonly['val_ica']) || (isset($bFlagRead_val_ica) && $bFlagRead_val_ica))
{
    $this->ajax_return_values_val_ica(true);
}
if ($original_val_reteiva !== $modificado_val_reteiva || isset($this->nmgp_cmp_readonly['val_reteiva']) || (isset($bFlagRead_val_reteiva) && $bFlagRead_val_reteiva))
{
    $this->ajax_return_values_val_reteiva(true);
}
if ($original_descuent !== $modificado_descuent || isset($this->nmgp_cmp_readonly['descuent']) || (isset($bFlagRead_descuent) && $bFlagRead_descuent))
{
    $this->ajax_return_values_descuent(true);
}
if ($original_saldodocumento !== $modificado_saldodocumento || isset($this->nmgp_cmp_readonly['saldodocumento']) || (isset($bFlagRead_saldodocumento) && $bFlagRead_saldodocumento))
{
    $this->ajax_return_values_saldodocumento(true);
}
if ($original_ret !== $modificado_ret || isset($this->nmgp_cmp_readonly['ret']) || (isset($bFlagRead_ret) && $bFlagRead_ret))
{
    $this->ajax_return_values_ret(true);
}
$this->NM_ajax_info['event_field'] = 'ret';
form_hacerpagos_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
function ret_onClick()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  
$original_iddocapagar = $this->iddocapagar;
$original_valpagar = $this->valpagar;
$original_ret = $this->ret;
$original_val_ica = $this->val_ica;
$original_val_reteiva = $this->val_reteiva;
$original_descuent = $this->descuent;
$original_idpago = $this->idpago;
$original_porc_ret = $this->porc_ret;
$original_porc_ica = $this->porc_ica;
$original_porc_reteiva = $this->porc_reteiva;

$this->fDesactiva_campos();
 
      $nm_select = "select valoriva, total, saldo from facturacom where idfaccom=$this->iddocapagar "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_ret = array();
     if ($this->iddocapagar != "")
     { 
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
                      $this->dt_ret[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_ret = false;
          $this->dt_ret_erro = $this->Db->ErrorMsg();
      } 
     } 
;
$this->valpagar =$this->dt_ret[0][2]-($this->ret +$this->val_ica +$this->val_reteiva +$this->descuent );
if($this->valpagar <0)
	{
	$this->valpagar =0;
	}

$modificado_iddocapagar = $this->iddocapagar;
$modificado_valpagar = $this->valpagar;
$modificado_ret = $this->ret;
$modificado_val_ica = $this->val_ica;
$modificado_val_reteiva = $this->val_reteiva;
$modificado_descuent = $this->descuent;
$modificado_idpago = $this->idpago;
$modificado_porc_ret = $this->porc_ret;
$modificado_porc_ica = $this->porc_ica;
$modificado_porc_reteiva = $this->porc_reteiva;
$this->nm_formatar_campos('iddocapagar', 'valpagar', 'ret', 'val_ica', 'val_reteiva', 'descuent', 'idpago', 'porc_ret', 'porc_ica', 'porc_reteiva');
if ($original_iddocapagar !== $modificado_iddocapagar || isset($this->nmgp_cmp_readonly['iddocapagar']) || (isset($bFlagRead_iddocapagar) && $bFlagRead_iddocapagar))
{
    $this->ajax_return_values_iddocapagar(true);
}
if ($original_valpagar !== $modificado_valpagar || isset($this->nmgp_cmp_readonly['valpagar']) || (isset($bFlagRead_valpagar) && $bFlagRead_valpagar))
{
    $this->ajax_return_values_valpagar(true);
}
if ($original_ret !== $modificado_ret || isset($this->nmgp_cmp_readonly['ret']) || (isset($bFlagRead_ret) && $bFlagRead_ret))
{
    $this->ajax_return_values_ret(true);
}
if ($original_val_ica !== $modificado_val_ica || isset($this->nmgp_cmp_readonly['val_ica']) || (isset($bFlagRead_val_ica) && $bFlagRead_val_ica))
{
    $this->ajax_return_values_val_ica(true);
}
if ($original_val_reteiva !== $modificado_val_reteiva || isset($this->nmgp_cmp_readonly['val_reteiva']) || (isset($bFlagRead_val_reteiva) && $bFlagRead_val_reteiva))
{
    $this->ajax_return_values_val_reteiva(true);
}
if ($original_descuent !== $modificado_descuent || isset($this->nmgp_cmp_readonly['descuent']) || (isset($bFlagRead_descuent) && $bFlagRead_descuent))
{
    $this->ajax_return_values_descuent(true);
}
if ($original_idpago !== $modificado_idpago || isset($this->nmgp_cmp_readonly['idpago']) || (isset($bFlagRead_idpago) && $bFlagRead_idpago))
{
    $this->ajax_return_values_idpago(true);
}
if ($original_porc_ret !== $modificado_porc_ret || isset($this->nmgp_cmp_readonly['porc_ret']) || (isset($bFlagRead_porc_ret) && $bFlagRead_porc_ret))
{
    $this->ajax_return_values_porc_ret(true);
}
if ($original_porc_ica !== $modificado_porc_ica || isset($this->nmgp_cmp_readonly['porc_ica']) || (isset($bFlagRead_porc_ica) && $bFlagRead_porc_ica))
{
    $this->ajax_return_values_porc_ica(true);
}
if ($original_porc_reteiva !== $modificado_porc_reteiva || isset($this->nmgp_cmp_readonly['porc_reteiva']) || (isset($bFlagRead_porc_reteiva) && $bFlagRead_porc_reteiva))
{
    $this->ajax_return_values_porc_reteiva(true);
}
$this->NM_ajax_info['event_field'] = 'ret';
form_hacerpagos_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
function val_ica_onChange()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  
$original_iddocapagar = $this->iddocapagar;
$original_valpagar = $this->valpagar;
$original_ret = $this->ret;
$original_val_ica = $this->val_ica;
$original_val_reteiva = $this->val_reteiva;
$original_descuent = $this->descuent;

 
      $nm_select = "select valoriva, total, saldo from facturacom where idfaccom=$this->iddocapagar "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_ret = array();
     if ($this->iddocapagar != "")
     { 
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
                      $this->dt_ret[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_ret = false;
          $this->dt_ret_erro = $this->Db->ErrorMsg();
      } 
     } 
;
$this->valpagar =$this->dt_ret[0][2]-($this->ret +$this->val_ica +$this->val_reteiva +$this->descuent );
if($this->valpagar <0)
	{
	$this->valpagar =0;
	}

$modificado_iddocapagar = $this->iddocapagar;
$modificado_valpagar = $this->valpagar;
$modificado_ret = $this->ret;
$modificado_val_ica = $this->val_ica;
$modificado_val_reteiva = $this->val_reteiva;
$modificado_descuent = $this->descuent;
$this->nm_formatar_campos('iddocapagar', 'valpagar', 'ret', 'val_ica', 'val_reteiva', 'descuent');
if ($original_iddocapagar !== $modificado_iddocapagar || isset($this->nmgp_cmp_readonly['iddocapagar']) || (isset($bFlagRead_iddocapagar) && $bFlagRead_iddocapagar))
{
    $this->ajax_return_values_iddocapagar(true);
}
if ($original_valpagar !== $modificado_valpagar || isset($this->nmgp_cmp_readonly['valpagar']) || (isset($bFlagRead_valpagar) && $bFlagRead_valpagar))
{
    $this->ajax_return_values_valpagar(true);
}
if ($original_ret !== $modificado_ret || isset($this->nmgp_cmp_readonly['ret']) || (isset($bFlagRead_ret) && $bFlagRead_ret))
{
    $this->ajax_return_values_ret(true);
}
if ($original_val_ica !== $modificado_val_ica || isset($this->nmgp_cmp_readonly['val_ica']) || (isset($bFlagRead_val_ica) && $bFlagRead_val_ica))
{
    $this->ajax_return_values_val_ica(true);
}
if ($original_val_reteiva !== $modificado_val_reteiva || isset($this->nmgp_cmp_readonly['val_reteiva']) || (isset($bFlagRead_val_reteiva) && $bFlagRead_val_reteiva))
{
    $this->ajax_return_values_val_reteiva(true);
}
if ($original_descuent !== $modificado_descuent || isset($this->nmgp_cmp_readonly['descuent']) || (isset($bFlagRead_descuent) && $bFlagRead_descuent))
{
    $this->ajax_return_values_descuent(true);
}
$this->NM_ajax_info['event_field'] = 'val';
form_hacerpagos_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
function val_ica_onClick()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  
$original_idpago = $this->idpago;
$original_ret = $this->ret;
$original_descuent = $this->descuent;
$original_iddocapagar = $this->iddocapagar;
$original_porc_ret = $this->porc_ret;
$original_porc_ica = $this->porc_ica;
$original_val_ica = $this->val_ica;
$original_porc_reteiva = $this->porc_reteiva;
$original_val_reteiva = $this->val_reteiva;

$this->fDesactiva_campos();

$modificado_idpago = $this->idpago;
$modificado_ret = $this->ret;
$modificado_descuent = $this->descuent;
$modificado_iddocapagar = $this->iddocapagar;
$modificado_porc_ret = $this->porc_ret;
$modificado_porc_ica = $this->porc_ica;
$modificado_val_ica = $this->val_ica;
$modificado_porc_reteiva = $this->porc_reteiva;
$modificado_val_reteiva = $this->val_reteiva;
$this->nm_formatar_campos('idpago', 'ret', 'descuent', 'iddocapagar', 'porc_ret', 'porc_ica', 'val_ica', 'porc_reteiva', 'val_reteiva');
if ($original_idpago !== $modificado_idpago || isset($this->nmgp_cmp_readonly['idpago']) || (isset($bFlagRead_idpago) && $bFlagRead_idpago))
{
    $this->ajax_return_values_idpago(true);
}
if ($original_ret !== $modificado_ret || isset($this->nmgp_cmp_readonly['ret']) || (isset($bFlagRead_ret) && $bFlagRead_ret))
{
    $this->ajax_return_values_ret(true);
}
if ($original_descuent !== $modificado_descuent || isset($this->nmgp_cmp_readonly['descuent']) || (isset($bFlagRead_descuent) && $bFlagRead_descuent))
{
    $this->ajax_return_values_descuent(true);
}
if ($original_iddocapagar !== $modificado_iddocapagar || isset($this->nmgp_cmp_readonly['iddocapagar']) || (isset($bFlagRead_iddocapagar) && $bFlagRead_iddocapagar))
{
    $this->ajax_return_values_iddocapagar(true);
}
if ($original_porc_ret !== $modificado_porc_ret || isset($this->nmgp_cmp_readonly['porc_ret']) || (isset($bFlagRead_porc_ret) && $bFlagRead_porc_ret))
{
    $this->ajax_return_values_porc_ret(true);
}
if ($original_porc_ica !== $modificado_porc_ica || isset($this->nmgp_cmp_readonly['porc_ica']) || (isset($bFlagRead_porc_ica) && $bFlagRead_porc_ica))
{
    $this->ajax_return_values_porc_ica(true);
}
if ($original_val_ica !== $modificado_val_ica || isset($this->nmgp_cmp_readonly['val_ica']) || (isset($bFlagRead_val_ica) && $bFlagRead_val_ica))
{
    $this->ajax_return_values_val_ica(true);
}
if ($original_porc_reteiva !== $modificado_porc_reteiva || isset($this->nmgp_cmp_readonly['porc_reteiva']) || (isset($bFlagRead_porc_reteiva) && $bFlagRead_porc_reteiva))
{
    $this->ajax_return_values_porc_reteiva(true);
}
if ($original_val_reteiva !== $modificado_val_reteiva || isset($this->nmgp_cmp_readonly['val_reteiva']) || (isset($bFlagRead_val_reteiva) && $bFlagRead_val_reteiva))
{
    $this->ajax_return_values_val_reteiva(true);
}
$this->NM_ajax_info['event_field'] = 'val';
form_hacerpagos_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
function val_reteiva_onChange()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  
$original_iddocapagar = $this->iddocapagar;
$original_valpagar = $this->valpagar;
$original_ret = $this->ret;
$original_val_ica = $this->val_ica;
$original_val_reteiva = $this->val_reteiva;
$original_descuent = $this->descuent;

 
      $nm_select = "select valoriva, total, saldo from facturacom where idfaccom=$this->iddocapagar "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_ret = array();
     if ($this->iddocapagar != "")
     { 
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
                      $this->dt_ret[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_ret = false;
          $this->dt_ret_erro = $this->Db->ErrorMsg();
      } 
     } 
;
$this->valpagar =$this->dt_ret[0][2]-($this->ret +$this->val_ica +$this->val_reteiva +$this->descuent );
if($this->valpagar <0)
	{
	$this->valpagar =0;
	}

$modificado_iddocapagar = $this->iddocapagar;
$modificado_valpagar = $this->valpagar;
$modificado_ret = $this->ret;
$modificado_val_ica = $this->val_ica;
$modificado_val_reteiva = $this->val_reteiva;
$modificado_descuent = $this->descuent;
$this->nm_formatar_campos('iddocapagar', 'valpagar', 'ret', 'val_ica', 'val_reteiva', 'descuent');
if ($original_iddocapagar !== $modificado_iddocapagar || isset($this->nmgp_cmp_readonly['iddocapagar']) || (isset($bFlagRead_iddocapagar) && $bFlagRead_iddocapagar))
{
    $this->ajax_return_values_iddocapagar(true);
}
if ($original_valpagar !== $modificado_valpagar || isset($this->nmgp_cmp_readonly['valpagar']) || (isset($bFlagRead_valpagar) && $bFlagRead_valpagar))
{
    $this->ajax_return_values_valpagar(true);
}
if ($original_ret !== $modificado_ret || isset($this->nmgp_cmp_readonly['ret']) || (isset($bFlagRead_ret) && $bFlagRead_ret))
{
    $this->ajax_return_values_ret(true);
}
if ($original_val_ica !== $modificado_val_ica || isset($this->nmgp_cmp_readonly['val_ica']) || (isset($bFlagRead_val_ica) && $bFlagRead_val_ica))
{
    $this->ajax_return_values_val_ica(true);
}
if ($original_val_reteiva !== $modificado_val_reteiva || isset($this->nmgp_cmp_readonly['val_reteiva']) || (isset($bFlagRead_val_reteiva) && $bFlagRead_val_reteiva))
{
    $this->ajax_return_values_val_reteiva(true);
}
if ($original_descuent !== $modificado_descuent || isset($this->nmgp_cmp_readonly['descuent']) || (isset($bFlagRead_descuent) && $bFlagRead_descuent))
{
    $this->ajax_return_values_descuent(true);
}
$this->NM_ajax_info['event_field'] = 'val';
form_hacerpagos_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
function val_reteiva_onClick()
{
$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'on';
  
$original_idpago = $this->idpago;
$original_ret = $this->ret;
$original_descuent = $this->descuent;
$original_iddocapagar = $this->iddocapagar;
$original_porc_ret = $this->porc_ret;
$original_porc_ica = $this->porc_ica;
$original_val_ica = $this->val_ica;
$original_porc_reteiva = $this->porc_reteiva;
$original_val_reteiva = $this->val_reteiva;

$this->fDesactiva_campos();

$modificado_idpago = $this->idpago;
$modificado_ret = $this->ret;
$modificado_descuent = $this->descuent;
$modificado_iddocapagar = $this->iddocapagar;
$modificado_porc_ret = $this->porc_ret;
$modificado_porc_ica = $this->porc_ica;
$modificado_val_ica = $this->val_ica;
$modificado_porc_reteiva = $this->porc_reteiva;
$modificado_val_reteiva = $this->val_reteiva;
$this->nm_formatar_campos('idpago', 'ret', 'descuent', 'iddocapagar', 'porc_ret', 'porc_ica', 'val_ica', 'porc_reteiva', 'val_reteiva');
if ($original_idpago !== $modificado_idpago || isset($this->nmgp_cmp_readonly['idpago']) || (isset($bFlagRead_idpago) && $bFlagRead_idpago))
{
    $this->ajax_return_values_idpago(true);
}
if ($original_ret !== $modificado_ret || isset($this->nmgp_cmp_readonly['ret']) || (isset($bFlagRead_ret) && $bFlagRead_ret))
{
    $this->ajax_return_values_ret(true);
}
if ($original_descuent !== $modificado_descuent || isset($this->nmgp_cmp_readonly['descuent']) || (isset($bFlagRead_descuent) && $bFlagRead_descuent))
{
    $this->ajax_return_values_descuent(true);
}
if ($original_iddocapagar !== $modificado_iddocapagar || isset($this->nmgp_cmp_readonly['iddocapagar']) || (isset($bFlagRead_iddocapagar) && $bFlagRead_iddocapagar))
{
    $this->ajax_return_values_iddocapagar(true);
}
if ($original_porc_ret !== $modificado_porc_ret || isset($this->nmgp_cmp_readonly['porc_ret']) || (isset($bFlagRead_porc_ret) && $bFlagRead_porc_ret))
{
    $this->ajax_return_values_porc_ret(true);
}
if ($original_porc_ica !== $modificado_porc_ica || isset($this->nmgp_cmp_readonly['porc_ica']) || (isset($bFlagRead_porc_ica) && $bFlagRead_porc_ica))
{
    $this->ajax_return_values_porc_ica(true);
}
if ($original_val_ica !== $modificado_val_ica || isset($this->nmgp_cmp_readonly['val_ica']) || (isset($bFlagRead_val_ica) && $bFlagRead_val_ica))
{
    $this->ajax_return_values_val_ica(true);
}
if ($original_porc_reteiva !== $modificado_porc_reteiva || isset($this->nmgp_cmp_readonly['porc_reteiva']) || (isset($bFlagRead_porc_reteiva) && $bFlagRead_porc_reteiva))
{
    $this->ajax_return_values_porc_reteiva(true);
}
if ($original_val_reteiva !== $modificado_val_reteiva || isset($this->nmgp_cmp_readonly['val_reteiva']) || (isset($bFlagRead_val_reteiva) && $bFlagRead_val_reteiva))
{
    $this->ajax_return_values_val_reteiva(true);
}
$this->NM_ajax_info['event_field'] = 'val';
form_hacerpagos_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_hacerpagos']['contr_erro'] = 'off';
}
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_hacerpagos_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
        include_once("form_hacerpagos_form0.php");
        include_once("form_hacerpagos_form1.php");
        $this->hideFormPages();
 }

        function initFormPages() {
                $this->Ini->nm_page_names = array(
                        'Datos' => '0',
                        'Archivos' => '1',
                );

                $this->Ini->nm_page_blocks = array(
                        'Datos' => array(
                                0 => 'on',
                                1 => 'on',
                                2 => 'on',
                                3 => 'on',
                                4 => 'on',
                                5 => 'on',
                                6 => 'on',
                        ),
                        'Archivos' => array(
                                7 => 'on',
                        ),
                );

                $this->Ini->nm_block_page = array(
                        0 => 'Datos',
                        1 => 'Datos',
                        2 => 'Datos',
                        3 => 'Datos',
                        4 => 'Datos',
                        5 => 'Datos',
                        6 => 'Datos',
                        7 => 'Archivos',
                );

                if (!empty($this->Ini->nm_hidden_blocos)) {
                        foreach ($this->Ini->nm_hidden_blocos as $blockNo => $blockStatus) {
                                if ('off' == $blockStatus) {
                                        $this->Ini->nm_page_blocks[ $this->Ini->nm_block_page[$blockNo] ][$blockNo] = 'off';
                                }
                        }
                }

                foreach ($this->Ini->nm_page_blocks as $pageName => $pageBlocks) {
                        $hasDisplayedBlock = false;

                        foreach ($pageBlocks as $blockNo => $blockStatus) {
                                if ('on' == $blockStatus) {
                                        $hasDisplayedBlock = true;
                                }
                        }

                        if (!$hasDisplayedBlock) {
                                $this->Ini->nm_hidden_pages[$pageName] = 'off';
                        }
                }
        } // initFormPages

        function hideFormPages() {
                if (!empty($this->Ini->nm_hidden_pages)) {
?>
<script type="text/javascript">
$(function() {
        scResetPagesDisplay();
<?php
                        foreach ($this->Ini->nm_hidden_pages as $pageName => $pageStatus) {
                                if ('off' == $pageStatus) {
?>
        scHidePage("<?php echo $this->Ini->nm_page_names[$pageName]; ?>");
<?php
                                }
                        }
?>
        scCheckNoPageSelected();
});
</script>
<?php
                }
        } // hideFormPages

    function form_format_readonly($field, $value)
    {
        $result = $value;

        $this->form_highlight_search($result, $field, $value);

        return $result;
    }

    function form_highlight_search(&$result, $field, $value)
    {
        if ($this->proc_fast_search) {
            $this->form_highlight_search_quicksearch($result, $field, $value);
        }
    }

    function form_highlight_search_quicksearch(&$result, $field, $value)
    {
        $searchOk = false;
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("idpago", "numpago", "client", "fecpago", "montocan", "ret", "descuent", "docapagar", "iddocapagar", "saldodocumento"))) {
            $searchOk = true;
        }
        elseif ($field == $this->nmgp_fast_search && in_array($field, array(""))) {
            $searchOk = true;
        }

        if (!$searchOk || '' == $this->nmgp_arg_fast_search) {
            return;
        }

        $htmlIni = '<div class="highlight" style="background-color: #fafaca; display: inline-block">';
        $htmlFim = '</div>';

        if ('qp' == $this->nmgp_cond_fast_search) {
            $result = preg_replace('/'. $this->nmgp_arg_fast_search .'/i', $htmlIni . '$0' . $htmlFim, $result);
        } elseif ('eq' == $this->nmgp_cond_fast_search) {
            if (strcasecmp($this->nmgp_arg_fast_search, $value) == 0) {
                $result = $htmlIni. $result .$htmlFim;
            }
        }
    }


    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
   } // jqueryCalendarTimeStart

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function jqueryIconFile($sModule)
   {
       $sImage = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalendario']['display'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalculadora']['display'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return '' == $sImage ? '' : $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile

   function jqueryFAFile($sModule)
   {
       $sFA = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
           {
               $sFA = $this->arr_buttons['bcalendario']['fontawesomeicon'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
           {
               $sFA = $this->arr_buttons['bcalculadora']['fontawesomeicon'];
           }
       }

       return '' == $sFA ? '' : "<span class='scButton_fontawesome " . $sFA . "'></span>";
   } // jqueryFAFile

   function jqueryButtonText($sModule)
   {
       $sClass = '';
       $sText  = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalendario']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalendario']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalendario']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i>";
                   }
               }
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalculadora']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalculadora']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalculadora']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> ";
                   }
               }
           }
       }

       return '' == $sText ? array('', '') : array($sText, $sClass);
   } // jqueryButtonText


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

        function addUrlParam($url, $param, $value) {
                $urlParts  = explode('?', $url);
                $urlParams = isset($urlParts[1]) ? explode('&', $urlParts[1]) : array();
                $objParams = array();
                foreach ($urlParams as $paramInfo) {
                        $paramParts = explode('=', $paramInfo);
                        $objParams[ $paramParts[0] ] = isset($paramParts[1]) ? $paramParts[1] : '';
                }
                $objParams[$param] = $value;
                $urlParams = array();
                foreach ($objParams as $paramName => $paramValue) {
                        $urlParams[] = $paramName . '=' . $paramValue;
                }
                return $urlParts[0] . '?' . implode('&', $urlParams);
        }
 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

function sc_file_size($file, $format = false)
{
    if ('' == $file) {
        return '';
    }
    if (!@is_file($file)) {
        return '';
    }
    $fileSize = @filesize($file);
    if ($format) {
        $suffix = '';
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' KB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' MB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' GB';
        }
        $fileSize = $fileSize . $suffix;
    }
    return $fileSize;
}


 function new_date_format($type, $field)
 {
     $new_date_format_out = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format_out .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format_out .= $time_sep;
         }
         else
         {
             $new_date_format_out .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format_out;
     if ('DH' == $type)
     {
         $new_date_format_out                                  = explode(';', $new_date_format_out);
         $this->field_config[$field]['date_format_js']        = $new_date_format_out[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format_out[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function Form_lookup_client()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_client']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_client'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_client']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_client'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_client']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_client'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_client']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_client'] = array(); 
    }

   $old_value_numpago = $this->numpago;
   $old_value_fecpago = $this->fecpago;
   $old_value_valor_base = $this->valor_base;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_montocan = $this->montocan;
   $old_value_saldodocumento = $this->saldodocumento;
   $old_value_valpagar = $this->valpagar;
   $old_value_ret = $this->ret;
   $old_value_val_ica = $this->val_ica;
   $old_value_porc_reteiva = $this->porc_reteiva;
   $old_value_val_reteiva = $this->val_reteiva;
   $old_value_descuent = $this->descuent;
   $old_value_total_cuenta = $this->total_cuenta;
   $old_value_idpago = $this->idpago;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numpago = $this->numpago;
   $unformatted_value_fecpago = $this->fecpago;
   $unformatted_value_valor_base = $this->valor_base;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_montocan = $this->montocan;
   $unformatted_value_saldodocumento = $this->saldodocumento;
   $unformatted_value_valpagar = $this->valpagar;
   $unformatted_value_ret = $this->ret;
   $unformatted_value_val_ica = $this->val_ica;
   $unformatted_value_porc_reteiva = $this->porc_reteiva;
   $unformatted_value_val_reteiva = $this->val_reteiva;
   $unformatted_value_descuent = $this->descuent;
   $unformatted_value_total_cuenta = $this->total_cuenta;
   $unformatted_value_idpago = $this->idpago;

   $nm_comando = "SELECT idtercero, concat(documento, ' - ',nombres)  FROM terceros  ORDER BY nombres, documento";

   $this->numpago = $old_value_numpago;
   $this->fecpago = $old_value_fecpago;
   $this->valor_base = $old_value_valor_base;
   $this->valor_iva = $old_value_valor_iva;
   $this->montocan = $old_value_montocan;
   $this->saldodocumento = $old_value_saldodocumento;
   $this->valpagar = $old_value_valpagar;
   $this->ret = $old_value_ret;
   $this->val_ica = $old_value_val_ica;
   $this->porc_reteiva = $old_value_porc_reteiva;
   $this->val_reteiva = $old_value_val_reteiva;
   $this->descuent = $old_value_descuent;
   $this->total_cuenta = $old_value_total_cuenta;
   $this->idpago = $old_value_idpago;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_client'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_banco()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_banco']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_banco'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_banco']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_banco'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_banco']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_banco'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_banco']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_banco'] = array(); 
    }

   $old_value_numpago = $this->numpago;
   $old_value_fecpago = $this->fecpago;
   $old_value_valor_base = $this->valor_base;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_montocan = $this->montocan;
   $old_value_saldodocumento = $this->saldodocumento;
   $old_value_valpagar = $this->valpagar;
   $old_value_ret = $this->ret;
   $old_value_val_ica = $this->val_ica;
   $old_value_porc_reteiva = $this->porc_reteiva;
   $old_value_val_reteiva = $this->val_reteiva;
   $old_value_descuent = $this->descuent;
   $old_value_total_cuenta = $this->total_cuenta;
   $old_value_idpago = $this->idpago;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numpago = $this->numpago;
   $unformatted_value_fecpago = $this->fecpago;
   $unformatted_value_valor_base = $this->valor_base;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_montocan = $this->montocan;
   $unformatted_value_saldodocumento = $this->saldodocumento;
   $unformatted_value_valpagar = $this->valpagar;
   $unformatted_value_ret = $this->ret;
   $unformatted_value_val_ica = $this->val_ica;
   $unformatted_value_porc_reteiva = $this->porc_reteiva;
   $unformatted_value_val_reteiva = $this->val_reteiva;
   $unformatted_value_descuent = $this->descuent;
   $unformatted_value_total_cuenta = $this->total_cuenta;
   $unformatted_value_idpago = $this->idpago;

   $nm_comando = "SELECT idcaja_vta, codigo_banco  FROM bancos  ORDER BY codigo_banco";

   $this->numpago = $old_value_numpago;
   $this->fecpago = $old_value_fecpago;
   $this->valor_base = $old_value_valor_base;
   $this->valor_iva = $old_value_valor_iva;
   $this->montocan = $old_value_montocan;
   $this->saldodocumento = $old_value_saldodocumento;
   $this->valpagar = $old_value_valpagar;
   $this->ret = $old_value_ret;
   $this->val_ica = $old_value_val_ica;
   $this->porc_reteiva = $old_value_porc_reteiva;
   $this->val_reteiva = $old_value_val_reteiva;
   $this->descuent = $old_value_descuent;
   $this->total_cuenta = $old_value_total_cuenta;
   $this->idpago = $old_value_idpago;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_banco'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_asent()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "NO?#?NO?#?S?@?";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_porc_ret()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ret']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ret'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ret']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ret'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ret']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ret'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ret']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ret'] = array(); 
    }

   $old_value_numpago = $this->numpago;
   $old_value_fecpago = $this->fecpago;
   $old_value_valor_base = $this->valor_base;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_montocan = $this->montocan;
   $old_value_saldodocumento = $this->saldodocumento;
   $old_value_valpagar = $this->valpagar;
   $old_value_ret = $this->ret;
   $old_value_val_ica = $this->val_ica;
   $old_value_porc_reteiva = $this->porc_reteiva;
   $old_value_val_reteiva = $this->val_reteiva;
   $old_value_descuent = $this->descuent;
   $old_value_total_cuenta = $this->total_cuenta;
   $old_value_idpago = $this->idpago;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numpago = $this->numpago;
   $unformatted_value_fecpago = $this->fecpago;
   $unformatted_value_valor_base = $this->valor_base;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_montocan = $this->montocan;
   $unformatted_value_saldodocumento = $this->saldodocumento;
   $unformatted_value_valpagar = $this->valpagar;
   $unformatted_value_ret = $this->ret;
   $unformatted_value_val_ica = $this->val_ica;
   $unformatted_value_porc_reteiva = $this->porc_reteiva;
   $unformatted_value_val_reteiva = $this->val_reteiva;
   $unformatted_value_descuent = $this->descuent;
   $unformatted_value_total_cuenta = $this->total_cuenta;
   $unformatted_value_idpago = $this->idpago;

   $nm_comando = "SELECT porrete FROM tiporetefuente  ORDER BY  id_tiporetefuente desc";

   $this->numpago = $old_value_numpago;
   $this->fecpago = $old_value_fecpago;
   $this->valor_base = $old_value_valor_base;
   $this->valor_iva = $old_value_valor_iva;
   $this->montocan = $old_value_montocan;
   $this->saldodocumento = $old_value_saldodocumento;
   $this->valpagar = $old_value_valpagar;
   $this->ret = $old_value_ret;
   $this->val_ica = $old_value_val_ica;
   $this->porc_reteiva = $old_value_porc_reteiva;
   $this->val_reteiva = $old_value_val_reteiva;
   $this->descuent = $old_value_descuent;
   $this->total_cuenta = $old_value_total_cuenta;
   $this->idpago = $old_value_idpago;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ret'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_porc_ica()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ica']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ica'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ica']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ica'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ica']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ica'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ica']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ica'] = array(); 
    }

   $old_value_numpago = $this->numpago;
   $old_value_fecpago = $this->fecpago;
   $old_value_valor_base = $this->valor_base;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_montocan = $this->montocan;
   $old_value_saldodocumento = $this->saldodocumento;
   $old_value_valpagar = $this->valpagar;
   $old_value_ret = $this->ret;
   $old_value_val_ica = $this->val_ica;
   $old_value_porc_reteiva = $this->porc_reteiva;
   $old_value_val_reteiva = $this->val_reteiva;
   $old_value_descuent = $this->descuent;
   $old_value_total_cuenta = $this->total_cuenta;
   $old_value_idpago = $this->idpago;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numpago = $this->numpago;
   $unformatted_value_fecpago = $this->fecpago;
   $unformatted_value_valor_base = $this->valor_base;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_montocan = $this->montocan;
   $unformatted_value_saldodocumento = $this->saldodocumento;
   $unformatted_value_valpagar = $this->valpagar;
   $unformatted_value_ret = $this->ret;
   $unformatted_value_val_ica = $this->val_ica;
   $unformatted_value_porc_reteiva = $this->porc_reteiva;
   $unformatted_value_val_reteiva = $this->val_reteiva;
   $unformatted_value_descuent = $this->descuent;
   $unformatted_value_total_cuenta = $this->total_cuenta;
   $unformatted_value_idpago = $this->idpago;

   $nm_comando = "SELECT porcica  FROM tipoica  ORDER BY  id_ica desc";

   $this->numpago = $old_value_numpago;
   $this->fecpago = $old_value_fecpago;
   $this->valor_base = $old_value_valor_base;
   $this->valor_iva = $old_value_valor_iva;
   $this->montocan = $old_value_montocan;
   $this->saldodocumento = $old_value_saldodocumento;
   $this->valpagar = $old_value_valpagar;
   $this->ret = $old_value_ret;
   $this->val_ica = $old_value_val_ica;
   $this->porc_reteiva = $old_value_porc_reteiva;
   $this->val_reteiva = $old_value_val_reteiva;
   $this->descuent = $old_value_descuent;
   $this->total_cuenta = $old_value_total_cuenta;
   $this->idpago = $old_value_idpago;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_porc_ica'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_id_concepto()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_id_concepto']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_id_concepto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_id_concepto']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_id_concepto'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_id_concepto']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_id_concepto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_id_concepto']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_id_concepto'] = array(); 
    }

   $old_value_numpago = $this->numpago;
   $old_value_fecpago = $this->fecpago;
   $old_value_valor_base = $this->valor_base;
   $old_value_valor_iva = $this->valor_iva;
   $old_value_montocan = $this->montocan;
   $old_value_saldodocumento = $this->saldodocumento;
   $old_value_valpagar = $this->valpagar;
   $old_value_ret = $this->ret;
   $old_value_val_ica = $this->val_ica;
   $old_value_porc_reteiva = $this->porc_reteiva;
   $old_value_val_reteiva = $this->val_reteiva;
   $old_value_descuent = $this->descuent;
   $old_value_total_cuenta = $this->total_cuenta;
   $old_value_idpago = $this->idpago;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numpago = $this->numpago;
   $unformatted_value_fecpago = $this->fecpago;
   $unformatted_value_valor_base = $this->valor_base;
   $unformatted_value_valor_iva = $this->valor_iva;
   $unformatted_value_montocan = $this->montocan;
   $unformatted_value_saldodocumento = $this->saldodocumento;
   $unformatted_value_valpagar = $this->valpagar;
   $unformatted_value_ret = $this->ret;
   $unformatted_value_val_ica = $this->val_ica;
   $unformatted_value_porc_reteiva = $this->porc_reteiva;
   $unformatted_value_val_reteiva = $this->val_reteiva;
   $unformatted_value_descuent = $this->descuent;
   $unformatted_value_total_cuenta = $this->total_cuenta;
   $unformatted_value_idpago = $this->idpago;

   $nm_comando = "SELECT idpagos_conceptos, concat(codigo,'/',descripcion)  FROM pagos_conceptos where tipodoc like 'CE' ORDER BY codigo";

   $this->numpago = $old_value_numpago;
   $this->fecpago = $old_value_fecpago;
   $this->valor_base = $old_value_valor_base;
   $this->valor_iva = $old_value_valor_iva;
   $this->montocan = $old_value_montocan;
   $this->saldodocumento = $old_value_saldodocumento;
   $this->valpagar = $old_value_valpagar;
   $this->ret = $old_value_ret;
   $this->val_ica = $old_value_val_ica;
   $this->porc_reteiva = $old_value_porc_reteiva;
   $this->val_reteiva = $old_value_val_reteiva;
   $this->descuent = $old_value_descuent;
   $this->total_cuenta = $old_value_total_cuenta;
   $this->idpago = $old_value_idpago;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['Lookup_id_concepto'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_hacerpagos_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      foreach ($fields as $field) {
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "idpago", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "numpago", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_client($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "client", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecpago", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "montocan", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ret", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "descuent", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "docapagar", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "iddocapagar", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "saldodocumento", $arg_search, str_replace(",", ".", $data_search));
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_hacerpagos = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['total'] = $qt_geral_reg_form_hacerpagos;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_hacerpagos_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_hacerpagos_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $nm_esp_postgres = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "idpago";$nm_numeric[] = "numpago";$nm_numeric[] = "client";$nm_numeric[] = "montocan";$nm_numeric[] = "ret";$nm_numeric[] = "descuent";$nm_numeric[] = "iddocapagar";$nm_numeric[] = "saldodocumento";$nm_numeric[] = "porc_ret";$nm_numeric[] = "val_ica";$nm_numeric[] = "porc_ica";$nm_numeric[] = "porc_reteiva";$nm_numeric[] = "val_reteiva";$nm_numeric[] = "banco";$nm_numeric[] = "usuario";$nm_numeric[] = "id_concepto";$nm_numeric[] = "";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
      $Nm_datas['fecpago'] = "date";$Nm_datas['creado'] = "datetime";$Nm_datas['actualizado'] = "datetime";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
          if (isset($Nm_datas[$campo_join]))
          {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
          if (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
          elseif ($Nm_datas[$campo_join] == "time" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(10)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(19)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "times" || $Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $nome  = "TO_DATE(TO_CHAR(" . $nome . ", 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "datetime" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO FRACTION)";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO DAY)";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_ini_lower . $nm_aspas . $Cmp . $nm_aspas1 . $nm_fim_lower;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $cond_tst = strtoupper($condicao);
         if ($cond_tst == "II" || $cond_tst == "QP" || $cond_tst == "NP")
         {
             if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
             {
                 $op_like      = " ilike ";
                 $nm_ini_lower = "";
                 $nm_fim_lower = "";
             }
             else
             {
                 $op_like = " like ";
             }
         }
         switch ($cond_tst)
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_like . $nm_ini_lower . "'" . $campo . "%'" . $nm_fim_lower;
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_like . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " not" . $op_like . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " > " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " >= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " < " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
         }
   }
   function SC_lookup_client($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT concat(documento,' - ',nombres), idtercero FROM terceros WHERE (concat(documento,' - ',nombres) LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2)
   {
       $nmgp_saida_form = "form_hacerpagos_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_hacerpagos_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $sTarget = '_self';
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_hacerpagos_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
<?php
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['masterValue']);
?>
}
<?php
    }
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $opc="", $alt_modal=430, $larg_modal=630)
{
   if (isset($this->NM_is_redirected) && $this->NM_is_redirected)
   {
       return;
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_terceros']['reg_start'] = "";
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepagos_terceros']['total']);
   if (is_array($nm_apl_parms))
   {
       $tmp_parms = "";
       foreach ($nm_apl_parms as $par => $val)
       {
           $par = trim($par);
           $val = trim($val);
           $tmp_parms .= str_replace(".", "_", $par) . "?#?";
           if (substr($val, 0, 1) == "$")
           {
               $tmp_parms .= $$val;
           }
           elseif (substr($val, 0, 1) == "{")
           {
               $val        = substr($val, 1, -1);
               $tmp_parms .= $this->$val;
           }
           elseif (substr($val, 0, 1) == "[")
           {
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos'][substr($val, 1, -1)];
           }
           else
           {
               $tmp_parms .= $val;
           }
           $tmp_parms .= "?@?";
       }
       $nm_apl_parms = $tmp_parms;
   }
   if (empty($opc))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['opc_ant'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_hacerpagos']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_hacerpagos_pack_ajax_response();
           exit;
       }
       echo "<SCRIPT language=\"javascript\">";
       if (strtolower($nm_target) == "_blank")
       {
           echo "window.open ('" . $nm_apl_dest . "');";
           echo "</SCRIPT>";
           return;
       }
       else
       {
           echo "window.location='" . $nm_apl_dest . "';";
           echo "</SCRIPT>";
           $this->NM_close_db();
           exit;
       }
   }
   $dir = explode("/", $nm_apl_dest);
   if (count($dir) == 1)
   {
       $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
       $nm_apl_dest = $this->Ini->path_link . SC_dir_app_name($nm_apl_dest) . "/" . $nm_apl_dest . ".php";
   }
   if ($this->NM_ajax_flag)
   {
       $nm_apl_parms = str_replace("?#?", "*scin", NM_charset_to_utf8($nm_apl_parms));
       $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
       $this->NM_ajax_info['redir']['metodo']     = 'post';
       $this->NM_ajax_info['redir']['action']     = $nm_apl_dest;
       $this->NM_ajax_info['redir']['nmgp_parms'] = $nm_apl_parms;
       $this->NM_ajax_info['redir']['target']     = $nm_target_form;
       $this->NM_ajax_info['redir']['h_modal']    = $alt_modal;
       $this->NM_ajax_info['redir']['w_modal']    = $larg_modal;
       if ($nm_target_form == "_blank")
       {
           $this->NM_ajax_info['redir']['nmgp_outra_jan'] = 'true';
       }
       else
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida']      = $nm_apl_retorno;
           $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       }
       form_hacerpagos_pack_ajax_response();
       exit;
   }
   if ($nm_target == "modal")
   {
       if (!empty($nm_apl_parms))
       {
           $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
           $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
           $nm_apl_parms = "nmgp_parms=" . $nm_apl_parms . "&";
       }
       $par_modal = "?script_case_init=" . $this->Ini->sc_page . "&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&";
       $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
       $this->NM_is_redirected = true;
       return;
   }
   if ($nm_target == "_blank")
   {
?>
<form name="Fredir" method="post" target="_blank" action="<?php echo $nm_apl_dest; ?>">
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
</form>
<script type="text/javascript">
setTimeout(function() { document.Fredir.submit(); }, 250);
</script>
<?php
    return;
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
    <SCRIPT type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></SCRIPT>
   </HEAD>
   <BODY>
<?php
   }
?>
<form name="Fredir" method="post" 
                  target="_self"> 
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
<?php
   if ($nm_target_form == "_blank")
   {
?>
  <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
  <input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nm_apl_retorno) ?>">
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
<?php
   }
?>
</form> 
   <SCRIPT type="text/javascript">
<?php
   if ($nm_target_form == "modal")
   {
?>
       $(document).ready(function(){
           tb_show('', '<?php echo $nm_apl_dest ?>?script_case_init=<?php echo $this->Ini->sc_page; ?>&nmgp_url_saida=modal&nmgp_parms=<?php echo $this->form_encode_input($nm_apl_parms); ?>&nmgp_outra_jan=true&TB_iframe=true&height=<?php echo $alt_modal; ?>&width=<?php echo $larg_modal; ?>&modal=true', '');
       });
<?php
   }
   else
   {
?>
    $(function() {
       document.Fredir.target = "<?php echo $nm_target_form ?>"; 
       document.Fredir.action = "<?php echo $nm_apl_dest ?>";
       document.Fredir.submit();
    });
<?php
   }
?>
   </SCRIPT>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
?>
   </BODY>
   </HTML>
<?php
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
       $this->NM_close_db();
       exit;
   }
}
    function sc_set_focus($sFieldName)
    {
        $sFieldName = strtolower($sFieldName);
        $aFocus = array(
                        'numpago' => 'numpago',
                        'titulo' => 'titulo',
                        'cod_cuenta' => 'cod_cuenta',
                        'ncuenta_tercero' => 'ncuenta_tercero',
                        'docapagar' => 'docapagar',
                        'fecpago' => 'fecpago',
                        'client' => 'client',
                        'banco' => 'banco',
                        'asent' => 'asent',
                        'valor_base' => 'valor_base',
                        'valor_iva' => 'valor_iva',
                        'montocan' => 'montocan',
                        'saldodocumento' => 'saldodocumento',
                        'valpagar' => 'valpagar',
                        'porc_ret' => 'porc_ret',
                        'ret' => 'ret',
                        'porc_ica' => 'porc_ica',
                        'val_ica' => 'val_ica',
                        'porc_reteiva' => 'porc_reteiva',
                        'val_reteiva' => 'val_reteiva',
                        'descuent' => 'descuent',
                        'iddocapagar' => 'iddocapagar',
                        'total_cuenta' => 'total_cuenta',
                        'id_concepto' => 'id_concepto',
                        'obs' => 'obs',
                        'conc' => 'conc',
                        'detallepagos' => 'detallepagos',
                        'idpago' => 'idpago',
                        'archivos' => 'archivos',
                       );
        if (isset($aFocus[$sFieldName]))
        {
            $this->NM_ajax_info['focus'] = $aFocus[$sFieldName];
        }
    } // sc_set_focus
    function sc_ajax_message($sMessage, $sTitle = '', $sParam = '', $sRedirPar = '')
    {
        if ($this->NM_ajax_flag)
        {
            $this->NM_ajax_info['ajaxMessage'] = array();
            if ('' != $sParam)
            {
                $aParamList = explode('&', $sParam);
                foreach ($aParamList as $sParamItem)
                {
                    $aParamData = explode('=', $sParamItem);
                    if (2 == sizeof($aParamData) &&
                        in_array($aParamData[0], array('modal', 'timeout', 'button', 'button_label', 'top', 'left', 'width', 'height', 'redir', 'redir_target', 'show_close', 'body_icon', 'toast', 'toast_pos', 'type')))
                    {
                        $this->NM_ajax_info['ajaxMessage'][$aParamData[0]] = NM_charset_to_utf8($aParamData[1]);
                    }
                }
            }
            if (isset($this->NM_ajax_info['ajaxMessage']['redir']) && '' != $this->NM_ajax_info['ajaxMessage']['redir'] && '.php' == substr($this->NM_ajax_info['ajaxMessage']['redir'], -4) && 'http' != substr($this->NM_ajax_info['ajaxMessage']['redir'], 0, 4))
            {
                $this->NM_ajax_info['ajaxMessage']['redir'] = $this->Ini->path_link . SC_dir_app_name(substr($this->NM_ajax_info['ajaxMessage']['redir'], 0, -4)) . '/' . $this->NM_ajax_info['ajaxMessage']['redir'];
            }
            if ('' != $sRedirPar)
            {
                $this->NM_ajax_info['ajaxMessage']['redir_par'] = str_replace('=', '?#?', str_replace(';', '?@?', $sRedirPar));
            }
            else
            {
                $this->NM_ajax_info['ajaxMessage']['redir_par'] = '';
            }
            $this->NM_ajax_info['ajaxMessage']['message'] = NM_charset_to_utf8($sMessage);
            $this->NM_ajax_info['ajaxMessage']['title']   = NM_charset_to_utf8($sTitle);
            if (!isset($this->NM_ajax_info['ajaxMessage']['button']))
            {
                $this->NM_ajax_info['ajaxMessage']['button'] = 'Y';
            }
        }
    } // sc_ajax_message
    function sc_field_readonly($sField, $sStatus, $iSeq = '')
    {
        if ('on' != $sStatus && 'off' != $sStatus)
        {
            return;
        }

        $sFieldDateTime = '';
        if ('creado' == $sField)
        {
            $sFieldDateTime = $sField . '_hora';
        }
        if ('actualizado' == $sField)
        {
            $sFieldDateTime = $sField . '_hora';
        }

        $sFlagVar        = 'bFlagRead_' . $sField;
        $this->$sFlagVar = 'on' == $sStatus;

        $this->nmgp_cmp_readonly[$sField]                = $sStatus;
        $this->NM_ajax_info['readOnly'][$sField . $iSeq] = $sStatus;
        if ('' != $sFieldDateTime)
        {
            $this->NM_ajax_info['readOnly'][$sFieldDateTime . $iSeq] = $sStatus;
        }
    } // sc_field_readonly
}
?>
