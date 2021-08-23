<?php
//
class form_KARDEX_mob_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $formatado = false;
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
   var $kardexid;
   var $codcomp;
   var $codprefijo;
   var $numero;
   var $fecha;
   var $fecha_hora;
   var $fecasentad;
   var $fecasentad_hora;
   var $observ;
   var $periodo;
   var $cenid;
   var $cenid_1;
   var $areadid;
   var $areadid_1;
   var $sucid;
   var $sucid_1;
   var $cliente;
   var $cliente_1;
   var $vendedor;
   var $vendedor_1;
   var $formapago;
   var $plazodias;
   var $bcoid;
   var $bcoid_1;
   var $tipodoc;
   var $documento;
   var $concepto;
   var $concepto_1;
   var $fecvence;
   var $fecvence_hora;
   var $retiva;
   var $retica;
   var $retfte;
   var $ajustebase;
   var $ajusteiva;
   var $ajusteivaexc;
   var $ajusteneto;
   var $vrbase;
   var $vriva;
   var $vriconsumo;
   var $vrrfte;
   var $vrrica;
   var $vrriva;
   var $total;
   var $docuid;
   var $docuid_1;
   var $fpcontado;
   var $fpcredito;
   var $despachar_a;
   var $despachar_a_1;
   var $usuario;
   var $hora;
   var $factorconv;
   var $nrofacprov;
   var $vehiculoid;
   var $vehiculoid_1;
   var $fecanulado;
   var $fecanulado_hora;
   var $desxcambio;
   var $devolxcambio;
   var $tipoica2id;
   var $tipoica2id_1;
   var $moneda;
   var $nrocontrol;
   var $prontopago;
   var $motivodevid;
   var $motivodevid_1;
   var $impresa;
   var $horacrea;
   var $punxven;
   var $exportacion;
   var $anticipo;
   var $importado;
   var $horacomanda;
   var $fecemi;
   var $fecemi_hora;
   var $anticipoadic;
   var $reciboid;
   var $impnotent;
   var $motivocierre;
   var $motivocierre_1;
   var $contrato;
   var $vrivaexc;
   var $propina;
   var $contratoinmid;
   var $contratoinmid_1;
   var $cantclientes;
   var $periodofact;
   var $anofact;
   var $contratoid;
   var $apartado;
   var $fechaent;
   var $fechaent_hora;
   var $horaent;
   var $asentando;
   var $retcree;
   var $vrrcree;
   var $tipocreeid;
   var $tipocreeid_1;
   var $nrocomven;
   var $nrofacteq;
   var $porcutiaiu;
   var $comexp;
   var $fecreclamo;
   var $fecreclamo_hora;
   var $motreclamo;
   var $motreclamo_1;
   var $chequeado;
   var $factrempost;
   var $cambiodespachar_a;
   var $fechacorte;
   var $fechacorte_hora;
   var $descuento_total;
   var $sn_estado;
   var $sn_festado;
   var $sn_festado_hora;
   var $sn_tienecot;
   var $sn_saldo;
   var $sn_npago;
   var $sn_ticket;
   var $sn_cufe;
   var $sn_pjfe;
   var $sn_rutaqr;
   var $sn_consecutivo;
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
          if (isset($this->NM_ajax_info['param']['codcomp']))
          {
              $this->codcomp = $this->NM_ajax_info['param']['codcomp'];
          }
          if (isset($this->NM_ajax_info['param']['codprefijo']))
          {
              $this->codprefijo = $this->NM_ajax_info['param']['codprefijo'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['kardexid']))
          {
              $this->kardexid = $this->NM_ajax_info['param']['kardexid'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_arg_fast_search']))
          {
              $this->nmgp_arg_fast_search = $this->NM_ajax_info['param']['nmgp_arg_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_cond_fast_search']))
          {
              $this->nmgp_cond_fast_search = $this->NM_ajax_info['param']['nmgp_cond_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_fast_search']))
          {
              $this->nmgp_fast_search = $this->NM_ajax_info['param']['nmgp_fast_search'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['numero']))
          {
              $this->numero = $this->NM_ajax_info['param']['numero'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['sn_cufe']))
          {
              $this->sn_cufe = $this->NM_ajax_info['param']['sn_cufe'];
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
      if (isset($_SESSION['sc_session'][$script_case_init]['form_KARDEX_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_KARDEX_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_KARDEX_mob']['embutida_parms']);
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
                 nm_limpa_str_form_KARDEX_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_KARDEX_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_KARDEX_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_KARDEX_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_KARDEX_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_KARDEX_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_KARDEX_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_KARDEX_mob']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_KARDEX_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_KARDEX_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_KARDEX_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_KARDEX_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_KARDEX_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_KARDEX_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_KARDEX_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_KARDEX_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_KARDEX_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_KARDEX_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_KARDEX_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_KARDEX_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_KARDEX_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_KARDEX_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_KARDEX_mob']['label'] = "Cambiar Número";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_KARDEX_mob")
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
      if ($this->NM_ajax_flag && (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'] || 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9)))
      {
      $this->Db->debug = false;
      }
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


      $this->arr_buttons['group_group_2']= array(
          'value'            => "" . $this->Ini->Nm_lang['lang_btns_options'] . "",
          'hint'             => "" . $this->Ini->Nm_lang['lang_btns_options'] . "",
          'type'             => "button",
          'display'          => "text_img",
          'display_position' => "text_right",
          'image'            => "scriptcase__NM__gear.png",
          'fontawesomeicon'  => "",
          'has_fa'           => true,
          'content_icons'    => false,
          'style'            => "default",
      );


      $_SESSION['scriptcase']['error_icon']['form_KARDEX_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_KARDEX_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
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
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_KARDEX_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_KARDEX_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_KARDEX_mob'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['dados_form'];
          if (!isset($this->fecha)){$this->fecha = $this->nmgp_dados_form['fecha'];} 
          if (!isset($this->fecasentad)){$this->fecasentad = $this->nmgp_dados_form['fecasentad'];} 
          if (!isset($this->observ)){$this->observ = $this->nmgp_dados_form['observ'];} 
          if (!isset($this->periodo)){$this->periodo = $this->nmgp_dados_form['periodo'];} 
          if (!isset($this->cenid)){$this->cenid = $this->nmgp_dados_form['cenid'];} 
          if (!isset($this->areadid)){$this->areadid = $this->nmgp_dados_form['areadid'];} 
          if (!isset($this->sucid)){$this->sucid = $this->nmgp_dados_form['sucid'];} 
          if (!isset($this->cliente)){$this->cliente = $this->nmgp_dados_form['cliente'];} 
          if (!isset($this->vendedor)){$this->vendedor = $this->nmgp_dados_form['vendedor'];} 
          if (!isset($this->formapago)){$this->formapago = $this->nmgp_dados_form['formapago'];} 
          if (!isset($this->plazodias)){$this->plazodias = $this->nmgp_dados_form['plazodias'];} 
          if (!isset($this->bcoid)){$this->bcoid = $this->nmgp_dados_form['bcoid'];} 
          if (!isset($this->tipodoc)){$this->tipodoc = $this->nmgp_dados_form['tipodoc'];} 
          if (!isset($this->documento)){$this->documento = $this->nmgp_dados_form['documento'];} 
          if (!isset($this->concepto)){$this->concepto = $this->nmgp_dados_form['concepto'];} 
          if (!isset($this->fecvence)){$this->fecvence = $this->nmgp_dados_form['fecvence'];} 
          if (!isset($this->retiva)){$this->retiva = $this->nmgp_dados_form['retiva'];} 
          if (!isset($this->retica)){$this->retica = $this->nmgp_dados_form['retica'];} 
          if (!isset($this->retfte)){$this->retfte = $this->nmgp_dados_form['retfte'];} 
          if (!isset($this->ajustebase)){$this->ajustebase = $this->nmgp_dados_form['ajustebase'];} 
          if (!isset($this->ajusteiva)){$this->ajusteiva = $this->nmgp_dados_form['ajusteiva'];} 
          if (!isset($this->ajusteivaexc)){$this->ajusteivaexc = $this->nmgp_dados_form['ajusteivaexc'];} 
          if (!isset($this->ajusteneto)){$this->ajusteneto = $this->nmgp_dados_form['ajusteneto'];} 
          if (!isset($this->vrbase)){$this->vrbase = $this->nmgp_dados_form['vrbase'];} 
          if (!isset($this->vriva)){$this->vriva = $this->nmgp_dados_form['vriva'];} 
          if (!isset($this->vriconsumo)){$this->vriconsumo = $this->nmgp_dados_form['vriconsumo'];} 
          if (!isset($this->vrrfte)){$this->vrrfte = $this->nmgp_dados_form['vrrfte'];} 
          if (!isset($this->vrrica)){$this->vrrica = $this->nmgp_dados_form['vrrica'];} 
          if (!isset($this->vrriva)){$this->vrriva = $this->nmgp_dados_form['vrriva'];} 
          if (!isset($this->total)){$this->total = $this->nmgp_dados_form['total'];} 
          if (!isset($this->docuid)){$this->docuid = $this->nmgp_dados_form['docuid'];} 
          if (!isset($this->fpcontado)){$this->fpcontado = $this->nmgp_dados_form['fpcontado'];} 
          if (!isset($this->fpcredito)){$this->fpcredito = $this->nmgp_dados_form['fpcredito'];} 
          if (!isset($this->despachar_a)){$this->despachar_a = $this->nmgp_dados_form['despachar_a'];} 
          if (!isset($this->usuario)){$this->usuario = $this->nmgp_dados_form['usuario'];} 
          if (!isset($this->hora)){$this->hora = $this->nmgp_dados_form['hora'];} 
          if (!isset($this->factorconv)){$this->factorconv = $this->nmgp_dados_form['factorconv'];} 
          if (!isset($this->nrofacprov)){$this->nrofacprov = $this->nmgp_dados_form['nrofacprov'];} 
          if (!isset($this->vehiculoid)){$this->vehiculoid = $this->nmgp_dados_form['vehiculoid'];} 
          if (!isset($this->fecanulado)){$this->fecanulado = $this->nmgp_dados_form['fecanulado'];} 
          if (!isset($this->desxcambio)){$this->desxcambio = $this->nmgp_dados_form['desxcambio'];} 
          if (!isset($this->devolxcambio)){$this->devolxcambio = $this->nmgp_dados_form['devolxcambio'];} 
          if (!isset($this->tipoica2id)){$this->tipoica2id = $this->nmgp_dados_form['tipoica2id'];} 
          if (!isset($this->moneda)){$this->moneda = $this->nmgp_dados_form['moneda'];} 
          if (!isset($this->nrocontrol)){$this->nrocontrol = $this->nmgp_dados_form['nrocontrol'];} 
          if (!isset($this->prontopago)){$this->prontopago = $this->nmgp_dados_form['prontopago'];} 
          if (!isset($this->motivodevid)){$this->motivodevid = $this->nmgp_dados_form['motivodevid'];} 
          if (!isset($this->impresa)){$this->impresa = $this->nmgp_dados_form['impresa'];} 
          if (!isset($this->horacrea)){$this->horacrea = $this->nmgp_dados_form['horacrea'];} 
          if (!isset($this->punxven)){$this->punxven = $this->nmgp_dados_form['punxven'];} 
          if (!isset($this->exportacion)){$this->exportacion = $this->nmgp_dados_form['exportacion'];} 
          if (!isset($this->anticipo)){$this->anticipo = $this->nmgp_dados_form['anticipo'];} 
          if (!isset($this->importado)){$this->importado = $this->nmgp_dados_form['importado'];} 
          if (!isset($this->horacomanda)){$this->horacomanda = $this->nmgp_dados_form['horacomanda'];} 
          if (!isset($this->fecemi)){$this->fecemi = $this->nmgp_dados_form['fecemi'];} 
          if (!isset($this->anticipoadic)){$this->anticipoadic = $this->nmgp_dados_form['anticipoadic'];} 
          if (!isset($this->reciboid)){$this->reciboid = $this->nmgp_dados_form['reciboid'];} 
          if (!isset($this->impnotent)){$this->impnotent = $this->nmgp_dados_form['impnotent'];} 
          if (!isset($this->motivocierre)){$this->motivocierre = $this->nmgp_dados_form['motivocierre'];} 
          if (!isset($this->contrato)){$this->contrato = $this->nmgp_dados_form['contrato'];} 
          if (!isset($this->vrivaexc)){$this->vrivaexc = $this->nmgp_dados_form['vrivaexc'];} 
          if (!isset($this->propina)){$this->propina = $this->nmgp_dados_form['propina'];} 
          if (!isset($this->contratoinmid)){$this->contratoinmid = $this->nmgp_dados_form['contratoinmid'];} 
          if (!isset($this->cantclientes)){$this->cantclientes = $this->nmgp_dados_form['cantclientes'];} 
          if (!isset($this->periodofact)){$this->periodofact = $this->nmgp_dados_form['periodofact'];} 
          if (!isset($this->anofact)){$this->anofact = $this->nmgp_dados_form['anofact'];} 
          if (!isset($this->contratoid)){$this->contratoid = $this->nmgp_dados_form['contratoid'];} 
          if (!isset($this->apartado)){$this->apartado = $this->nmgp_dados_form['apartado'];} 
          if (!isset($this->fechaent)){$this->fechaent = $this->nmgp_dados_form['fechaent'];} 
          if (!isset($this->horaent)){$this->horaent = $this->nmgp_dados_form['horaent'];} 
          if (!isset($this->asentando)){$this->asentando = $this->nmgp_dados_form['asentando'];} 
          if (!isset($this->retcree)){$this->retcree = $this->nmgp_dados_form['retcree'];} 
          if (!isset($this->vrrcree)){$this->vrrcree = $this->nmgp_dados_form['vrrcree'];} 
          if (!isset($this->tipocreeid)){$this->tipocreeid = $this->nmgp_dados_form['tipocreeid'];} 
          if (!isset($this->nrocomven)){$this->nrocomven = $this->nmgp_dados_form['nrocomven'];} 
          if (!isset($this->nrofacteq)){$this->nrofacteq = $this->nmgp_dados_form['nrofacteq'];} 
          if (!isset($this->porcutiaiu)){$this->porcutiaiu = $this->nmgp_dados_form['porcutiaiu'];} 
          if (!isset($this->comexp)){$this->comexp = $this->nmgp_dados_form['comexp'];} 
          if (!isset($this->fecreclamo)){$this->fecreclamo = $this->nmgp_dados_form['fecreclamo'];} 
          if (!isset($this->motreclamo)){$this->motreclamo = $this->nmgp_dados_form['motreclamo'];} 
          if (!isset($this->chequeado)){$this->chequeado = $this->nmgp_dados_form['chequeado'];} 
          if (!isset($this->factrempost)){$this->factrempost = $this->nmgp_dados_form['factrempost'];} 
          if (!isset($this->cambiodespachar_a)){$this->cambiodespachar_a = $this->nmgp_dados_form['cambiodespachar_a'];} 
          if (!isset($this->fechacorte)){$this->fechacorte = $this->nmgp_dados_form['fechacorte'];} 
          if (!isset($this->descuento_total)){$this->descuento_total = $this->nmgp_dados_form['descuento_total'];} 
          if (!isset($this->sn_estado)){$this->sn_estado = $this->nmgp_dados_form['sn_estado'];} 
          if (!isset($this->sn_festado)){$this->sn_festado = $this->nmgp_dados_form['sn_festado'];} 
          if (!isset($this->sn_tienecot)){$this->sn_tienecot = $this->nmgp_dados_form['sn_tienecot'];} 
          if (!isset($this->sn_saldo)){$this->sn_saldo = $this->nmgp_dados_form['sn_saldo'];} 
          if (!isset($this->sn_npago)){$this->sn_npago = $this->nmgp_dados_form['sn_npago'];} 
          if (!isset($this->sn_ticket)){$this->sn_ticket = $this->nmgp_dados_form['sn_ticket'];} 
          if (!isset($this->sn_pjfe)){$this->sn_pjfe = $this->nmgp_dados_form['sn_pjfe'];} 
          if (!isset($this->sn_rutaqr)){$this->sn_rutaqr = $this->nmgp_dados_form['sn_rutaqr'];} 
          if (!isset($this->sn_consecutivo)){$this->sn_consecutivo = $this->nmgp_dados_form['sn_consecutivo'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_KARDEX_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'form_KARDEX_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_KARDEX_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_KARDEX/form_KARDEX_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_KARDEX_mob_erro.class.php"); 
      }
      $this->Erro      = new form_KARDEX_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['opcao']))
         { 
             if ($this->kardexid != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_KARDEX_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
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

            $out1_img_cache = $_SESSION['scriptcase']['form_KARDEX_mob']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['form_KARDEX_mob']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
      if (isset($this->kardexid)) { $this->nm_limpa_alfa($this->kardexid); }
      if (isset($this->codcomp)) { $this->nm_limpa_alfa($this->codcomp); }
      if (isset($this->codprefijo)) { $this->nm_limpa_alfa($this->codprefijo); }
      if (isset($this->numero)) { $this->nm_limpa_alfa($this->numero); }
      if (isset($this->sn_cufe)) { $this->nm_limpa_alfa($this->sn_cufe); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- kardexid
      $this->field_config['kardexid']               = array();
      $this->field_config['kardexid']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['kardexid']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['kardexid']['symbol_dec'] = '';
      $this->field_config['kardexid']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['kardexid']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fecha
      $this->field_config['fecha']                 = array();
      $this->field_config['fecha']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecha']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecha']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecha');
      //-- fecasentad
      $this->field_config['fecasentad']                 = array();
      $this->field_config['fecasentad']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecasentad']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecasentad']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecasentad']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecasentad');
      //-- plazodias
      $this->field_config['plazodias']               = array();
      $this->field_config['plazodias']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['plazodias']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['plazodias']['symbol_dec'] = '';
      $this->field_config['plazodias']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['plazodias']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fecvence
      $this->field_config['fecvence']                 = array();
      $this->field_config['fecvence']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecvence']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecvence']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecvence']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecvence');
      //-- retiva
      $this->field_config['retiva']               = array();
      $this->field_config['retiva']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['retiva']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['retiva']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['retiva']['symbol_mon'] = '';
      $this->field_config['retiva']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['retiva']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- retica
      $this->field_config['retica']               = array();
      $this->field_config['retica']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['retica']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['retica']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['retica']['symbol_mon'] = '';
      $this->field_config['retica']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['retica']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- retfte
      $this->field_config['retfte']               = array();
      $this->field_config['retfte']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['retfte']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['retfte']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['retfte']['symbol_mon'] = '';
      $this->field_config['retfte']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['retfte']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- ajustebase
      $this->field_config['ajustebase']               = array();
      $this->field_config['ajustebase']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['ajustebase']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['ajustebase']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['ajustebase']['symbol_mon'] = '';
      $this->field_config['ajustebase']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['ajustebase']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- ajusteiva
      $this->field_config['ajusteiva']               = array();
      $this->field_config['ajusteiva']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['ajusteiva']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['ajusteiva']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['ajusteiva']['symbol_mon'] = '';
      $this->field_config['ajusteiva']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['ajusteiva']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- ajusteivaexc
      $this->field_config['ajusteivaexc']               = array();
      $this->field_config['ajusteivaexc']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['ajusteivaexc']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['ajusteivaexc']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['ajusteivaexc']['symbol_mon'] = '';
      $this->field_config['ajusteivaexc']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['ajusteivaexc']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- ajusteneto
      $this->field_config['ajusteneto']               = array();
      $this->field_config['ajusteneto']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['ajusteneto']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['ajusteneto']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['ajusteneto']['symbol_mon'] = '';
      $this->field_config['ajusteneto']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['ajusteneto']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- vrbase
      $this->field_config['vrbase']               = array();
      $this->field_config['vrbase']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['vrbase']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['vrbase']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['vrbase']['symbol_mon'] = '';
      $this->field_config['vrbase']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['vrbase']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- vriva
      $this->field_config['vriva']               = array();
      $this->field_config['vriva']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['vriva']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['vriva']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['vriva']['symbol_mon'] = '';
      $this->field_config['vriva']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['vriva']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- vriconsumo
      $this->field_config['vriconsumo']               = array();
      $this->field_config['vriconsumo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['vriconsumo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['vriconsumo']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['vriconsumo']['symbol_mon'] = '';
      $this->field_config['vriconsumo']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['vriconsumo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- vrrfte
      $this->field_config['vrrfte']               = array();
      $this->field_config['vrrfte']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['vrrfte']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['vrrfte']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['vrrfte']['symbol_mon'] = '';
      $this->field_config['vrrfte']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['vrrfte']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- vrrica
      $this->field_config['vrrica']               = array();
      $this->field_config['vrrica']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['vrrica']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['vrrica']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['vrrica']['symbol_mon'] = '';
      $this->field_config['vrrica']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['vrrica']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- vrriva
      $this->field_config['vrriva']               = array();
      $this->field_config['vrriva']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['vrriva']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['vrriva']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['vrriva']['symbol_mon'] = '';
      $this->field_config['vrriva']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['vrriva']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- total
      $this->field_config['total']               = array();
      $this->field_config['total']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['total']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['total']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['total']['symbol_mon'] = '';
      $this->field_config['total']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['total']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- fpcontado
      $this->field_config['fpcontado']               = array();
      $this->field_config['fpcontado']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['fpcontado']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['fpcontado']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['fpcontado']['symbol_mon'] = '';
      $this->field_config['fpcontado']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['fpcontado']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- fpcredito
      $this->field_config['fpcredito']               = array();
      $this->field_config['fpcredito']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['fpcredito']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['fpcredito']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['fpcredito']['symbol_mon'] = '';
      $this->field_config['fpcredito']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['fpcredito']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- factorconv
      $this->field_config['factorconv']               = array();
      $this->field_config['factorconv']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['factorconv']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['factorconv']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['factorconv']['symbol_mon'] = '';
      $this->field_config['factorconv']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['factorconv']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- fecanulado
      $this->field_config['fecanulado']                 = array();
      $this->field_config['fecanulado']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecanulado']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecanulado']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecanulado']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecanulado');
      //-- desxcambio
      $this->field_config['desxcambio']               = array();
      $this->field_config['desxcambio']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['desxcambio']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['desxcambio']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['desxcambio']['symbol_mon'] = '';
      $this->field_config['desxcambio']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['desxcambio']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- devolxcambio
      $this->field_config['devolxcambio']               = array();
      $this->field_config['devolxcambio']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['devolxcambio']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['devolxcambio']['symbol_dec'] = '';
      $this->field_config['devolxcambio']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['devolxcambio']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- punxven
      $this->field_config['punxven']               = array();
      $this->field_config['punxven']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['punxven']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['punxven']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['punxven']['symbol_mon'] = '';
      $this->field_config['punxven']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['punxven']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- anticipo
      $this->field_config['anticipo']               = array();
      $this->field_config['anticipo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['anticipo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['anticipo']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['anticipo']['symbol_mon'] = '';
      $this->field_config['anticipo']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['anticipo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- fecemi
      $this->field_config['fecemi']                 = array();
      $this->field_config['fecemi']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecemi']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecemi']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecemi']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecemi');
      //-- anticipoadic
      $this->field_config['anticipoadic']               = array();
      $this->field_config['anticipoadic']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['anticipoadic']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['anticipoadic']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['anticipoadic']['symbol_mon'] = '';
      $this->field_config['anticipoadic']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['anticipoadic']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- reciboid
      $this->field_config['reciboid']               = array();
      $this->field_config['reciboid']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['reciboid']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['reciboid']['symbol_dec'] = '';
      $this->field_config['reciboid']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['reciboid']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- vrivaexc
      $this->field_config['vrivaexc']               = array();
      $this->field_config['vrivaexc']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['vrivaexc']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['vrivaexc']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['vrivaexc']['symbol_mon'] = '';
      $this->field_config['vrivaexc']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['vrivaexc']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- propina
      $this->field_config['propina']               = array();
      $this->field_config['propina']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['propina']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['propina']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['propina']['symbol_mon'] = '';
      $this->field_config['propina']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['propina']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- cantclientes
      $this->field_config['cantclientes']               = array();
      $this->field_config['cantclientes']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cantclientes']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cantclientes']['symbol_dec'] = '';
      $this->field_config['cantclientes']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cantclientes']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- contratoid
      $this->field_config['contratoid']               = array();
      $this->field_config['contratoid']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['contratoid']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['contratoid']['symbol_dec'] = '';
      $this->field_config['contratoid']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['contratoid']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fechaent
      $this->field_config['fechaent']                 = array();
      $this->field_config['fechaent']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fechaent']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechaent']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fechaent']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fechaent');
      //-- retcree
      $this->field_config['retcree']               = array();
      $this->field_config['retcree']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['retcree']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['retcree']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['retcree']['symbol_mon'] = '';
      $this->field_config['retcree']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['retcree']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- vrrcree
      $this->field_config['vrrcree']               = array();
      $this->field_config['vrrcree']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['vrrcree']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['vrrcree']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['vrrcree']['symbol_mon'] = '';
      $this->field_config['vrrcree']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['vrrcree']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- porcutiaiu
      $this->field_config['porcutiaiu']               = array();
      $this->field_config['porcutiaiu']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['porcutiaiu']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['porcutiaiu']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['porcutiaiu']['symbol_mon'] = '';
      $this->field_config['porcutiaiu']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['porcutiaiu']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- fecreclamo
      $this->field_config['fecreclamo']                 = array();
      $this->field_config['fecreclamo']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecreclamo']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecreclamo']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecreclamo']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecreclamo');
      //-- fechacorte
      $this->field_config['fechacorte']                 = array();
      $this->field_config['fechacorte']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fechacorte']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechacorte']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fechacorte']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fechacorte');
      //-- sn_festado
      $this->field_config['sn_festado']                 = array();
      $this->field_config['sn_festado']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['sn_festado']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['sn_festado']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['sn_festado']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'sn_festado');
      //-- sn_saldo
      $this->field_config['sn_saldo']               = array();
      $this->field_config['sn_saldo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['sn_saldo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['sn_saldo']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['sn_saldo']['symbol_mon'] = '';
      $this->field_config['sn_saldo']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['sn_saldo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- sn_ticket
      $this->field_config['sn_ticket']               = array();
      $this->field_config['sn_ticket']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['sn_ticket']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['sn_ticket']['symbol_dec'] = '';
      $this->field_config['sn_ticket']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['sn_ticket']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- sn_consecutivo
      $this->field_config['sn_consecutivo']               = array();
      $this->field_config['sn_consecutivo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['sn_consecutivo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['sn_consecutivo']['symbol_dec'] = '';
      $this->field_config['sn_consecutivo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['sn_consecutivo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
          if ('validate_kardexid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'kardexid');
          }
          if ('validate_codcomp' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'codcomp');
          }
          if ('validate_codprefijo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'codprefijo');
          }
          if ('validate_numero' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numero');
          }
          if ('validate_sn_cufe' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sn_cufe');
          }
          form_KARDEX_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_KARDEX_mob_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_KARDEX_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_KARDEX_mob_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_KARDEX_mob_pack_ajax_response();
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
          form_KARDEX_mob_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_KARDEX_mob.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Cambiar Número") ?></TITLE>
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
<form name="Fdown" method="get" action="form_KARDEX_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_KARDEX_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="form_KARDEX_mob.php" target="_self" style="display: none"> 
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
           case 'kardexid':
               return "KARDEXID";
               break;
           case 'codcomp':
               return "TIPO";
               break;
           case 'codprefijo':
               return "PJ";
               break;
           case 'numero':
               return "NUMERO";
               break;
           case 'sn_cufe':
               return "SN CUFE";
               break;
           case 'fecha':
               return "FECHA";
               break;
           case 'fecasentad':
               return "FECASENTAD";
               break;
           case 'observ':
               return "OBSERV";
               break;
           case 'periodo':
               return "PERIODO";
               break;
           case 'cenid':
               return "CENID";
               break;
           case 'areadid':
               return "AREADID";
               break;
           case 'sucid':
               return "SUCID";
               break;
           case 'cliente':
               return "CLIENTE";
               break;
           case 'vendedor':
               return "VENDEDOR";
               break;
           case 'formapago':
               return "FORMAPAGO";
               break;
           case 'plazodias':
               return "PLAZODIAS";
               break;
           case 'bcoid':
               return "BCOID";
               break;
           case 'tipodoc':
               return "TIPODOC";
               break;
           case 'documento':
               return "DOCUMENTO";
               break;
           case 'concepto':
               return "CONCEPTO";
               break;
           case 'fecvence':
               return "FECVENCE";
               break;
           case 'retiva':
               return "RETIVA";
               break;
           case 'retica':
               return "RETICA";
               break;
           case 'retfte':
               return "RETFTE";
               break;
           case 'ajustebase':
               return "AJUSTEBASE";
               break;
           case 'ajusteiva':
               return "AJUSTEIVA";
               break;
           case 'ajusteivaexc':
               return "AJUSTEIVAEXC";
               break;
           case 'ajusteneto':
               return "AJUSTENETO";
               break;
           case 'vrbase':
               return "VRBASE";
               break;
           case 'vriva':
               return "VRIVA";
               break;
           case 'vriconsumo':
               return "VRICONSUMO";
               break;
           case 'vrrfte':
               return "VRRFTE";
               break;
           case 'vrrica':
               return "VRRICA";
               break;
           case 'vrriva':
               return "VRRIVA";
               break;
           case 'total':
               return "TOTAL";
               break;
           case 'docuid':
               return "DOCUID";
               break;
           case 'fpcontado':
               return "FPCONTADO";
               break;
           case 'fpcredito':
               return "FPCREDITO";
               break;
           case 'despachar_a':
               return "DESPACHAR A";
               break;
           case 'usuario':
               return "USUARIO";
               break;
           case 'hora':
               return "HORA";
               break;
           case 'factorconv':
               return "FACTORCONV";
               break;
           case 'nrofacprov':
               return "NROFACPROV";
               break;
           case 'vehiculoid':
               return "VEHICULOID";
               break;
           case 'fecanulado':
               return "FECANULADO";
               break;
           case 'desxcambio':
               return "DESXCAMBIO";
               break;
           case 'devolxcambio':
               return "DEVOLXCAMBIO";
               break;
           case 'tipoica2id':
               return "TIPOICA2ID";
               break;
           case 'moneda':
               return "MONEDA";
               break;
           case 'nrocontrol':
               return "NROCONTROL";
               break;
           case 'prontopago':
               return "PRONTOPAGO";
               break;
           case 'motivodevid':
               return "MOTIVODEVID";
               break;
           case 'impresa':
               return "IMPRESA";
               break;
           case 'horacrea':
               return "HORACREA";
               break;
           case 'punxven':
               return "PUNXVEN";
               break;
           case 'exportacion':
               return "EXPORTACION";
               break;
           case 'anticipo':
               return "ANTICIPO";
               break;
           case 'importado':
               return "IMPORTADO";
               break;
           case 'horacomanda':
               return "HORACOMANDA";
               break;
           case 'fecemi':
               return "FECEMI";
               break;
           case 'anticipoadic':
               return "ANTICIPOADIC";
               break;
           case 'reciboid':
               return "RECIBOID";
               break;
           case 'impnotent':
               return "IMPNOTENT";
               break;
           case 'motivocierre':
               return "MOTIVOCIERRE";
               break;
           case 'contrato':
               return "CONTRATO";
               break;
           case 'vrivaexc':
               return "VRIVAEXC";
               break;
           case 'propina':
               return "PROPINA";
               break;
           case 'contratoinmid':
               return "CONTRATOINMID";
               break;
           case 'cantclientes':
               return "CANTCLIENTES";
               break;
           case 'periodofact':
               return "PERIODOFACT";
               break;
           case 'anofact':
               return "ANOFACT";
               break;
           case 'contratoid':
               return "CONTRATOID";
               break;
           case 'apartado':
               return "APARTADO";
               break;
           case 'fechaent':
               return "FECHAENT";
               break;
           case 'horaent':
               return "HORAENT";
               break;
           case 'asentando':
               return "ASENTANDO";
               break;
           case 'retcree':
               return "RETCREE";
               break;
           case 'vrrcree':
               return "VRRCREE";
               break;
           case 'tipocreeid':
               return "TIPOCREEID";
               break;
           case 'nrocomven':
               return "NROCOMVEN";
               break;
           case 'nrofacteq':
               return "NROFACTEQ";
               break;
           case 'porcutiaiu':
               return "PORCUTIAIU";
               break;
           case 'comexp':
               return "COMEXP";
               break;
           case 'fecreclamo':
               return "FECRECLAMO";
               break;
           case 'motreclamo':
               return "MOTRECLAMO";
               break;
           case 'chequeado':
               return "CHEQUEADO";
               break;
           case 'factrempost':
               return "FACTREMPOST";
               break;
           case 'cambiodespachar_a':
               return "CAMBIODESPACHAR A";
               break;
           case 'fechacorte':
               return "FECHACORTE";
               break;
           case 'descuento_total':
               return "DESCUENTO TOTAL";
               break;
           case 'sn_estado':
               return "SN ESTADO";
               break;
           case 'sn_festado':
               return "SN FESTADO";
               break;
           case 'sn_tienecot':
               return "SN TIENECOT";
               break;
           case 'sn_saldo':
               return "SN SALDO";
               break;
           case 'sn_npago':
               return "SN NPAGO";
               break;
           case 'sn_ticket':
               return "SN TICKET";
               break;
           case 'sn_pjfe':
               return "SN PJFE";
               break;
           case 'sn_rutaqr':
               return "SN RUTAQR";
               break;
           case 'sn_consecutivo':
               return "SN CONSECUTIVO";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_KARDEX_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_KARDEX_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_KARDEX_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_KARDEX_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'kardexid' == $filtro)
        $this->ValidateField_kardexid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'codcomp' == $filtro)
        $this->ValidateField_codcomp($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'codprefijo' == $filtro)
        $this->ValidateField_codprefijo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'numero' == $filtro)
        $this->ValidateField_numero($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sn_cufe' == $filtro)
        $this->ValidateField_sn_cufe($Campos_Crit, $Campos_Falta, $Campos_Erros);

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['form_KARDEX_mob']['contr_erro'] = 'on';
 $vsql1 = "select numero from kardex where codcomp='".$this->codcomp ."' and codprefijo='".$this->codprefijo ."' and numero='".$this->numero ."'";
 
      $nm_select = $vsql1; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiExiste = array();
      $this->vsiexiste = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
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
          $this->vSiExiste_erro = $this->Db->ErrorMsg();
          $this->vsiexiste = false;
          $this->vsiexiste_erro = $this->Db->ErrorMsg();
      } 
;

if(isset($this->vsiexiste[0][0]))
{
	$vsql2 = "select numero from kardex where kardexid='".$this->kardexid ."'";
	 
      $nm_select = $vsql2; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vNum = array();
      $this->vnum = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vNum[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vnum[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vNum = false;
          $this->vNum_erro = $this->Db->ErrorMsg();
          $this->vnum = false;
          $this->vnum_erro = $this->Db->ErrorMsg();
      } 
;
	
	if(isset($this->vnum[0][0]))
	{
		$this->numero  = $this->vnum[0][0];
		
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Ese numero ya existe!!!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_KARDEX_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "Ese numero ya existe!!!";
 }
;
	}
}
$_SESSION['scriptcase']['form_KARDEX_mob']['contr_erro'] = 'off'; 
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

    function ValidateField_kardexid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->kardexid === "" || is_null($this->kardexid))  
      { 
          $this->kardexid = 0;
      } 
      nm_limpa_numero($this->kardexid, $this->field_config['kardexid']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->kardexid != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->kardexid) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "KARDEXID: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['kardexid']))
                  {
                      $Campos_Erros['kardexid'] = array();
                  }
                  $Campos_Erros['kardexid'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['kardexid']) || !is_array($this->NM_ajax_info['errList']['kardexid']))
                  {
                      $this->NM_ajax_info['errList']['kardexid'] = array();
                  }
                  $this->NM_ajax_info['errList']['kardexid'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->kardexid, 10, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "KARDEXID; " ; 
                  if (!isset($Campos_Erros['kardexid']))
                  {
                      $Campos_Erros['kardexid'] = array();
                  }
                  $Campos_Erros['kardexid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['kardexid']) || !is_array($this->NM_ajax_info['errList']['kardexid']))
                  {
                      $this->NM_ajax_info['errList']['kardexid'] = array();
                  }
                  $this->NM_ajax_info['errList']['kardexid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'kardexid';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_kardexid

    function ValidateField_codcomp(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->codcomp) > 2) 
          { 
              $hasError = true;
              $Campos_Crit .= "TIPO " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['codcomp']))
              {
                  $Campos_Erros['codcomp'] = array();
              }
              $Campos_Erros['codcomp'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['codcomp']) || !is_array($this->NM_ajax_info['errList']['codcomp']))
              {
                  $this->NM_ajax_info['errList']['codcomp'] = array();
              }
              $this->NM_ajax_info['errList']['codcomp'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'codcomp';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_codcomp

    function ValidateField_codprefijo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->codprefijo) > 2) 
          { 
              $hasError = true;
              $Campos_Crit .= "PJ " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['codprefijo']))
              {
                  $Campos_Erros['codprefijo'] = array();
              }
              $Campos_Erros['codprefijo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['codprefijo']) || !is_array($this->NM_ajax_info['errList']['codprefijo']))
              {
                  $this->NM_ajax_info['errList']['codprefijo'] = array();
              }
              $this->NM_ajax_info['errList']['codprefijo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'codprefijo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_codprefijo

    function ValidateField_numero(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->numero) > 8) 
          { 
              $hasError = true;
              $Campos_Crit .= "NUMERO " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['numero']))
              {
                  $Campos_Erros['numero'] = array();
              }
              $Campos_Erros['numero'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['numero']) || !is_array($this->NM_ajax_info['errList']['numero']))
              {
                  $this->NM_ajax_info['errList']['numero'] = array();
              }
              $this->NM_ajax_info['errList']['numero'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "01234567890123456789";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->numero ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->numero, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "NUMERO " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['numero']))
              {
                  $Campos_Erros['numero'] = array();
              }
              $Campos_Erros['numero'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['numero']) || !is_array($this->NM_ajax_info['errList']['numero']))
              {
                  $this->NM_ajax_info['errList']['numero'] = array();
              }
              $this->NM_ajax_info['errList']['numero'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'numero';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_numero

    function ValidateField_sn_cufe(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->sn_cufe) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "SN CUFE " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sn_cufe']))
              {
                  $Campos_Erros['sn_cufe'] = array();
              }
              $Campos_Erros['sn_cufe'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sn_cufe']) || !is_array($this->NM_ajax_info['errList']['sn_cufe']))
              {
                  $this->NM_ajax_info['errList']['sn_cufe'] = array();
              }
              $this->NM_ajax_info['errList']['sn_cufe'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sn_cufe';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sn_cufe

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
    $this->nmgp_dados_form['kardexid'] = $this->kardexid;
    $this->nmgp_dados_form['codcomp'] = $this->codcomp;
    $this->nmgp_dados_form['codprefijo'] = $this->codprefijo;
    $this->nmgp_dados_form['numero'] = $this->numero;
    $this->nmgp_dados_form['sn_cufe'] = $this->sn_cufe;
    $this->nmgp_dados_form['fecha'] = $this->fecha;
    $this->nmgp_dados_form['fecasentad'] = $this->fecasentad;
    $this->nmgp_dados_form['observ'] = $this->observ;
    $this->nmgp_dados_form['periodo'] = $this->periodo;
    $this->nmgp_dados_form['cenid'] = $this->cenid;
    $this->nmgp_dados_form['areadid'] = $this->areadid;
    $this->nmgp_dados_form['sucid'] = $this->sucid;
    $this->nmgp_dados_form['cliente'] = $this->cliente;
    $this->nmgp_dados_form['vendedor'] = $this->vendedor;
    $this->nmgp_dados_form['formapago'] = $this->formapago;
    $this->nmgp_dados_form['plazodias'] = $this->plazodias;
    $this->nmgp_dados_form['bcoid'] = $this->bcoid;
    $this->nmgp_dados_form['tipodoc'] = $this->tipodoc;
    $this->nmgp_dados_form['documento'] = $this->documento;
    $this->nmgp_dados_form['concepto'] = $this->concepto;
    $this->nmgp_dados_form['fecvence'] = $this->fecvence;
    $this->nmgp_dados_form['retiva'] = $this->retiva;
    $this->nmgp_dados_form['retica'] = $this->retica;
    $this->nmgp_dados_form['retfte'] = $this->retfte;
    $this->nmgp_dados_form['ajustebase'] = $this->ajustebase;
    $this->nmgp_dados_form['ajusteiva'] = $this->ajusteiva;
    $this->nmgp_dados_form['ajusteivaexc'] = $this->ajusteivaexc;
    $this->nmgp_dados_form['ajusteneto'] = $this->ajusteneto;
    $this->nmgp_dados_form['vrbase'] = $this->vrbase;
    $this->nmgp_dados_form['vriva'] = $this->vriva;
    $this->nmgp_dados_form['vriconsumo'] = $this->vriconsumo;
    $this->nmgp_dados_form['vrrfte'] = $this->vrrfte;
    $this->nmgp_dados_form['vrrica'] = $this->vrrica;
    $this->nmgp_dados_form['vrriva'] = $this->vrriva;
    $this->nmgp_dados_form['total'] = $this->total;
    $this->nmgp_dados_form['docuid'] = $this->docuid;
    $this->nmgp_dados_form['fpcontado'] = $this->fpcontado;
    $this->nmgp_dados_form['fpcredito'] = $this->fpcredito;
    $this->nmgp_dados_form['despachar_a'] = $this->despachar_a;
    $this->nmgp_dados_form['usuario'] = $this->usuario;
    $this->nmgp_dados_form['hora'] = $this->hora;
    $this->nmgp_dados_form['factorconv'] = $this->factorconv;
    $this->nmgp_dados_form['nrofacprov'] = $this->nrofacprov;
    $this->nmgp_dados_form['vehiculoid'] = $this->vehiculoid;
    $this->nmgp_dados_form['fecanulado'] = $this->fecanulado;
    $this->nmgp_dados_form['desxcambio'] = $this->desxcambio;
    $this->nmgp_dados_form['devolxcambio'] = $this->devolxcambio;
    $this->nmgp_dados_form['tipoica2id'] = $this->tipoica2id;
    $this->nmgp_dados_form['moneda'] = $this->moneda;
    $this->nmgp_dados_form['nrocontrol'] = $this->nrocontrol;
    $this->nmgp_dados_form['prontopago'] = $this->prontopago;
    $this->nmgp_dados_form['motivodevid'] = $this->motivodevid;
    $this->nmgp_dados_form['impresa'] = $this->impresa;
    $this->nmgp_dados_form['horacrea'] = $this->horacrea;
    $this->nmgp_dados_form['punxven'] = $this->punxven;
    $this->nmgp_dados_form['exportacion'] = $this->exportacion;
    $this->nmgp_dados_form['anticipo'] = $this->anticipo;
    $this->nmgp_dados_form['importado'] = $this->importado;
    $this->nmgp_dados_form['horacomanda'] = $this->horacomanda;
    $this->nmgp_dados_form['fecemi'] = $this->fecemi;
    $this->nmgp_dados_form['anticipoadic'] = $this->anticipoadic;
    $this->nmgp_dados_form['reciboid'] = $this->reciboid;
    $this->nmgp_dados_form['impnotent'] = $this->impnotent;
    $this->nmgp_dados_form['motivocierre'] = $this->motivocierre;
    $this->nmgp_dados_form['contrato'] = $this->contrato;
    $this->nmgp_dados_form['vrivaexc'] = $this->vrivaexc;
    $this->nmgp_dados_form['propina'] = $this->propina;
    $this->nmgp_dados_form['contratoinmid'] = $this->contratoinmid;
    $this->nmgp_dados_form['cantclientes'] = $this->cantclientes;
    $this->nmgp_dados_form['periodofact'] = $this->periodofact;
    $this->nmgp_dados_form['anofact'] = $this->anofact;
    $this->nmgp_dados_form['contratoid'] = $this->contratoid;
    $this->nmgp_dados_form['apartado'] = $this->apartado;
    $this->nmgp_dados_form['fechaent'] = $this->fechaent;
    $this->nmgp_dados_form['horaent'] = $this->horaent;
    $this->nmgp_dados_form['asentando'] = $this->asentando;
    $this->nmgp_dados_form['retcree'] = $this->retcree;
    $this->nmgp_dados_form['vrrcree'] = $this->vrrcree;
    $this->nmgp_dados_form['tipocreeid'] = $this->tipocreeid;
    $this->nmgp_dados_form['nrocomven'] = $this->nrocomven;
    $this->nmgp_dados_form['nrofacteq'] = $this->nrofacteq;
    $this->nmgp_dados_form['porcutiaiu'] = $this->porcutiaiu;
    $this->nmgp_dados_form['comexp'] = $this->comexp;
    $this->nmgp_dados_form['fecreclamo'] = $this->fecreclamo;
    $this->nmgp_dados_form['motreclamo'] = $this->motreclamo;
    $this->nmgp_dados_form['chequeado'] = $this->chequeado;
    $this->nmgp_dados_form['factrempost'] = $this->factrempost;
    $this->nmgp_dados_form['cambiodespachar_a'] = $this->cambiodespachar_a;
    $this->nmgp_dados_form['fechacorte'] = $this->fechacorte;
    $this->nmgp_dados_form['descuento_total'] = $this->descuento_total;
    $this->nmgp_dados_form['sn_estado'] = $this->sn_estado;
    $this->nmgp_dados_form['sn_festado'] = $this->sn_festado;
    $this->nmgp_dados_form['sn_tienecot'] = $this->sn_tienecot;
    $this->nmgp_dados_form['sn_saldo'] = $this->sn_saldo;
    $this->nmgp_dados_form['sn_npago'] = $this->sn_npago;
    $this->nmgp_dados_form['sn_ticket'] = $this->sn_ticket;
    $this->nmgp_dados_form['sn_pjfe'] = $this->sn_pjfe;
    $this->nmgp_dados_form['sn_rutaqr'] = $this->sn_rutaqr;
    $this->nmgp_dados_form['sn_consecutivo'] = $this->sn_consecutivo;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['kardexid'] = $this->kardexid;
      nm_limpa_numero($this->kardexid, $this->field_config['kardexid']['symbol_grp']) ; 
      $this->Before_unformat['fecha'] = $this->fecha;
      nm_limpa_data($this->fecha, $this->field_config['fecha']['date_sep']) ; 
      nm_limpa_hora($this->fecha_hora, $this->field_config['fecha']['time_sep']) ; 
      $this->Before_unformat['fecasentad'] = $this->fecasentad;
      nm_limpa_data($this->fecasentad, $this->field_config['fecasentad']['date_sep']) ; 
      nm_limpa_hora($this->fecasentad_hora, $this->field_config['fecasentad']['time_sep']) ; 
      $this->Before_unformat['plazodias'] = $this->plazodias;
      nm_limpa_numero($this->plazodias, $this->field_config['plazodias']['symbol_grp']) ; 
      $this->Before_unformat['fecvence'] = $this->fecvence;
      nm_limpa_data($this->fecvence, $this->field_config['fecvence']['date_sep']) ; 
      nm_limpa_hora($this->fecvence_hora, $this->field_config['fecvence']['time_sep']) ; 
      $this->Before_unformat['retiva'] = $this->retiva;
      if (!empty($this->field_config['retiva']['symbol_dec']))
      {
         $this->sc_remove_currency($this->retiva, $this->field_config['retiva']['symbol_dec'], $this->field_config['retiva']['symbol_grp'], $this->field_config['retiva']['symbol_mon']);
         nm_limpa_valor($this->retiva, $this->field_config['retiva']['symbol_dec'], $this->field_config['retiva']['symbol_grp']);
      }
      $this->Before_unformat['retica'] = $this->retica;
      if (!empty($this->field_config['retica']['symbol_dec']))
      {
         $this->sc_remove_currency($this->retica, $this->field_config['retica']['symbol_dec'], $this->field_config['retica']['symbol_grp'], $this->field_config['retica']['symbol_mon']);
         nm_limpa_valor($this->retica, $this->field_config['retica']['symbol_dec'], $this->field_config['retica']['symbol_grp']);
      }
      $this->Before_unformat['retfte'] = $this->retfte;
      if (!empty($this->field_config['retfte']['symbol_dec']))
      {
         $this->sc_remove_currency($this->retfte, $this->field_config['retfte']['symbol_dec'], $this->field_config['retfte']['symbol_grp'], $this->field_config['retfte']['symbol_mon']);
         nm_limpa_valor($this->retfte, $this->field_config['retfte']['symbol_dec'], $this->field_config['retfte']['symbol_grp']);
      }
      $this->Before_unformat['ajustebase'] = $this->ajustebase;
      if (!empty($this->field_config['ajustebase']['symbol_dec']))
      {
         $this->sc_remove_currency($this->ajustebase, $this->field_config['ajustebase']['symbol_dec'], $this->field_config['ajustebase']['symbol_grp'], $this->field_config['ajustebase']['symbol_mon']);
         nm_limpa_valor($this->ajustebase, $this->field_config['ajustebase']['symbol_dec'], $this->field_config['ajustebase']['symbol_grp']);
      }
      $this->Before_unformat['ajusteiva'] = $this->ajusteiva;
      if (!empty($this->field_config['ajusteiva']['symbol_dec']))
      {
         $this->sc_remove_currency($this->ajusteiva, $this->field_config['ajusteiva']['symbol_dec'], $this->field_config['ajusteiva']['symbol_grp'], $this->field_config['ajusteiva']['symbol_mon']);
         nm_limpa_valor($this->ajusteiva, $this->field_config['ajusteiva']['symbol_dec'], $this->field_config['ajusteiva']['symbol_grp']);
      }
      $this->Before_unformat['ajusteivaexc'] = $this->ajusteivaexc;
      if (!empty($this->field_config['ajusteivaexc']['symbol_dec']))
      {
         $this->sc_remove_currency($this->ajusteivaexc, $this->field_config['ajusteivaexc']['symbol_dec'], $this->field_config['ajusteivaexc']['symbol_grp'], $this->field_config['ajusteivaexc']['symbol_mon']);
         nm_limpa_valor($this->ajusteivaexc, $this->field_config['ajusteivaexc']['symbol_dec'], $this->field_config['ajusteivaexc']['symbol_grp']);
      }
      $this->Before_unformat['ajusteneto'] = $this->ajusteneto;
      if (!empty($this->field_config['ajusteneto']['symbol_dec']))
      {
         $this->sc_remove_currency($this->ajusteneto, $this->field_config['ajusteneto']['symbol_dec'], $this->field_config['ajusteneto']['symbol_grp'], $this->field_config['ajusteneto']['symbol_mon']);
         nm_limpa_valor($this->ajusteneto, $this->field_config['ajusteneto']['symbol_dec'], $this->field_config['ajusteneto']['symbol_grp']);
      }
      $this->Before_unformat['vrbase'] = $this->vrbase;
      if (!empty($this->field_config['vrbase']['symbol_dec']))
      {
         $this->sc_remove_currency($this->vrbase, $this->field_config['vrbase']['symbol_dec'], $this->field_config['vrbase']['symbol_grp'], $this->field_config['vrbase']['symbol_mon']);
         nm_limpa_valor($this->vrbase, $this->field_config['vrbase']['symbol_dec'], $this->field_config['vrbase']['symbol_grp']);
      }
      $this->Before_unformat['vriva'] = $this->vriva;
      if (!empty($this->field_config['vriva']['symbol_dec']))
      {
         $this->sc_remove_currency($this->vriva, $this->field_config['vriva']['symbol_dec'], $this->field_config['vriva']['symbol_grp'], $this->field_config['vriva']['symbol_mon']);
         nm_limpa_valor($this->vriva, $this->field_config['vriva']['symbol_dec'], $this->field_config['vriva']['symbol_grp']);
      }
      $this->Before_unformat['vriconsumo'] = $this->vriconsumo;
      if (!empty($this->field_config['vriconsumo']['symbol_dec']))
      {
         $this->sc_remove_currency($this->vriconsumo, $this->field_config['vriconsumo']['symbol_dec'], $this->field_config['vriconsumo']['symbol_grp'], $this->field_config['vriconsumo']['symbol_mon']);
         nm_limpa_valor($this->vriconsumo, $this->field_config['vriconsumo']['symbol_dec'], $this->field_config['vriconsumo']['symbol_grp']);
      }
      $this->Before_unformat['vrrfte'] = $this->vrrfte;
      if (!empty($this->field_config['vrrfte']['symbol_dec']))
      {
         $this->sc_remove_currency($this->vrrfte, $this->field_config['vrrfte']['symbol_dec'], $this->field_config['vrrfte']['symbol_grp'], $this->field_config['vrrfte']['symbol_mon']);
         nm_limpa_valor($this->vrrfte, $this->field_config['vrrfte']['symbol_dec'], $this->field_config['vrrfte']['symbol_grp']);
      }
      $this->Before_unformat['vrrica'] = $this->vrrica;
      if (!empty($this->field_config['vrrica']['symbol_dec']))
      {
         $this->sc_remove_currency($this->vrrica, $this->field_config['vrrica']['symbol_dec'], $this->field_config['vrrica']['symbol_grp'], $this->field_config['vrrica']['symbol_mon']);
         nm_limpa_valor($this->vrrica, $this->field_config['vrrica']['symbol_dec'], $this->field_config['vrrica']['symbol_grp']);
      }
      $this->Before_unformat['vrriva'] = $this->vrriva;
      if (!empty($this->field_config['vrriva']['symbol_dec']))
      {
         $this->sc_remove_currency($this->vrriva, $this->field_config['vrriva']['symbol_dec'], $this->field_config['vrriva']['symbol_grp'], $this->field_config['vrriva']['symbol_mon']);
         nm_limpa_valor($this->vrriva, $this->field_config['vrriva']['symbol_dec'], $this->field_config['vrriva']['symbol_grp']);
      }
      $this->Before_unformat['total'] = $this->total;
      if (!empty($this->field_config['total']['symbol_dec']))
      {
         $this->sc_remove_currency($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp'], $this->field_config['total']['symbol_mon']);
         nm_limpa_valor($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp']);
      }
      $this->Before_unformat['fpcontado'] = $this->fpcontado;
      if (!empty($this->field_config['fpcontado']['symbol_dec']))
      {
         $this->sc_remove_currency($this->fpcontado, $this->field_config['fpcontado']['symbol_dec'], $this->field_config['fpcontado']['symbol_grp'], $this->field_config['fpcontado']['symbol_mon']);
         nm_limpa_valor($this->fpcontado, $this->field_config['fpcontado']['symbol_dec'], $this->field_config['fpcontado']['symbol_grp']);
      }
      $this->Before_unformat['fpcredito'] = $this->fpcredito;
      if (!empty($this->field_config['fpcredito']['symbol_dec']))
      {
         $this->sc_remove_currency($this->fpcredito, $this->field_config['fpcredito']['symbol_dec'], $this->field_config['fpcredito']['symbol_grp'], $this->field_config['fpcredito']['symbol_mon']);
         nm_limpa_valor($this->fpcredito, $this->field_config['fpcredito']['symbol_dec'], $this->field_config['fpcredito']['symbol_grp']);
      }
      $this->Before_unformat['factorconv'] = $this->factorconv;
      if (!empty($this->field_config['factorconv']['symbol_dec']))
      {
         $this->sc_remove_currency($this->factorconv, $this->field_config['factorconv']['symbol_dec'], $this->field_config['factorconv']['symbol_grp'], $this->field_config['factorconv']['symbol_mon']);
         nm_limpa_valor($this->factorconv, $this->field_config['factorconv']['symbol_dec'], $this->field_config['factorconv']['symbol_grp']);
      }
      $this->Before_unformat['fecanulado'] = $this->fecanulado;
      nm_limpa_data($this->fecanulado, $this->field_config['fecanulado']['date_sep']) ; 
      nm_limpa_hora($this->fecanulado_hora, $this->field_config['fecanulado']['time_sep']) ; 
      $this->Before_unformat['desxcambio'] = $this->desxcambio;
      if (!empty($this->field_config['desxcambio']['symbol_dec']))
      {
         $this->sc_remove_currency($this->desxcambio, $this->field_config['desxcambio']['symbol_dec'], $this->field_config['desxcambio']['symbol_grp'], $this->field_config['desxcambio']['symbol_mon']);
         nm_limpa_valor($this->desxcambio, $this->field_config['desxcambio']['symbol_dec'], $this->field_config['desxcambio']['symbol_grp']);
      }
      $this->Before_unformat['devolxcambio'] = $this->devolxcambio;
      nm_limpa_numero($this->devolxcambio, $this->field_config['devolxcambio']['symbol_grp']) ; 
      $this->Before_unformat['punxven'] = $this->punxven;
      if (!empty($this->field_config['punxven']['symbol_dec']))
      {
         $this->sc_remove_currency($this->punxven, $this->field_config['punxven']['symbol_dec'], $this->field_config['punxven']['symbol_grp'], $this->field_config['punxven']['symbol_mon']);
         nm_limpa_valor($this->punxven, $this->field_config['punxven']['symbol_dec'], $this->field_config['punxven']['symbol_grp']);
      }
      $this->Before_unformat['anticipo'] = $this->anticipo;
      if (!empty($this->field_config['anticipo']['symbol_dec']))
      {
         $this->sc_remove_currency($this->anticipo, $this->field_config['anticipo']['symbol_dec'], $this->field_config['anticipo']['symbol_grp'], $this->field_config['anticipo']['symbol_mon']);
         nm_limpa_valor($this->anticipo, $this->field_config['anticipo']['symbol_dec'], $this->field_config['anticipo']['symbol_grp']);
      }
      $this->Before_unformat['fecemi'] = $this->fecemi;
      nm_limpa_data($this->fecemi, $this->field_config['fecemi']['date_sep']) ; 
      nm_limpa_hora($this->fecemi_hora, $this->field_config['fecemi']['time_sep']) ; 
      $this->Before_unformat['anticipoadic'] = $this->anticipoadic;
      if (!empty($this->field_config['anticipoadic']['symbol_dec']))
      {
         $this->sc_remove_currency($this->anticipoadic, $this->field_config['anticipoadic']['symbol_dec'], $this->field_config['anticipoadic']['symbol_grp'], $this->field_config['anticipoadic']['symbol_mon']);
         nm_limpa_valor($this->anticipoadic, $this->field_config['anticipoadic']['symbol_dec'], $this->field_config['anticipoadic']['symbol_grp']);
      }
      $this->Before_unformat['reciboid'] = $this->reciboid;
      nm_limpa_numero($this->reciboid, $this->field_config['reciboid']['symbol_grp']) ; 
      $this->Before_unformat['vrivaexc'] = $this->vrivaexc;
      if (!empty($this->field_config['vrivaexc']['symbol_dec']))
      {
         $this->sc_remove_currency($this->vrivaexc, $this->field_config['vrivaexc']['symbol_dec'], $this->field_config['vrivaexc']['symbol_grp'], $this->field_config['vrivaexc']['symbol_mon']);
         nm_limpa_valor($this->vrivaexc, $this->field_config['vrivaexc']['symbol_dec'], $this->field_config['vrivaexc']['symbol_grp']);
      }
      $this->Before_unformat['propina'] = $this->propina;
      if (!empty($this->field_config['propina']['symbol_dec']))
      {
         $this->sc_remove_currency($this->propina, $this->field_config['propina']['symbol_dec'], $this->field_config['propina']['symbol_grp'], $this->field_config['propina']['symbol_mon']);
         nm_limpa_valor($this->propina, $this->field_config['propina']['symbol_dec'], $this->field_config['propina']['symbol_grp']);
      }
      $this->Before_unformat['cantclientes'] = $this->cantclientes;
      nm_limpa_numero($this->cantclientes, $this->field_config['cantclientes']['symbol_grp']) ; 
      $this->Before_unformat['contratoid'] = $this->contratoid;
      nm_limpa_numero($this->contratoid, $this->field_config['contratoid']['symbol_grp']) ; 
      $this->Before_unformat['fechaent'] = $this->fechaent;
      nm_limpa_data($this->fechaent, $this->field_config['fechaent']['date_sep']) ; 
      nm_limpa_hora($this->fechaent_hora, $this->field_config['fechaent']['time_sep']) ; 
      $this->Before_unformat['retcree'] = $this->retcree;
      if (!empty($this->field_config['retcree']['symbol_dec']))
      {
         $this->sc_remove_currency($this->retcree, $this->field_config['retcree']['symbol_dec'], $this->field_config['retcree']['symbol_grp'], $this->field_config['retcree']['symbol_mon']);
         nm_limpa_valor($this->retcree, $this->field_config['retcree']['symbol_dec'], $this->field_config['retcree']['symbol_grp']);
      }
      $this->Before_unformat['vrrcree'] = $this->vrrcree;
      if (!empty($this->field_config['vrrcree']['symbol_dec']))
      {
         $this->sc_remove_currency($this->vrrcree, $this->field_config['vrrcree']['symbol_dec'], $this->field_config['vrrcree']['symbol_grp'], $this->field_config['vrrcree']['symbol_mon']);
         nm_limpa_valor($this->vrrcree, $this->field_config['vrrcree']['symbol_dec'], $this->field_config['vrrcree']['symbol_grp']);
      }
      $this->Before_unformat['porcutiaiu'] = $this->porcutiaiu;
      if (!empty($this->field_config['porcutiaiu']['symbol_dec']))
      {
         $this->sc_remove_currency($this->porcutiaiu, $this->field_config['porcutiaiu']['symbol_dec'], $this->field_config['porcutiaiu']['symbol_grp'], $this->field_config['porcutiaiu']['symbol_mon']);
         nm_limpa_valor($this->porcutiaiu, $this->field_config['porcutiaiu']['symbol_dec'], $this->field_config['porcutiaiu']['symbol_grp']);
      }
      $this->Before_unformat['fecreclamo'] = $this->fecreclamo;
      nm_limpa_data($this->fecreclamo, $this->field_config['fecreclamo']['date_sep']) ; 
      nm_limpa_hora($this->fecreclamo_hora, $this->field_config['fecreclamo']['time_sep']) ; 
      $this->Before_unformat['fechacorte'] = $this->fechacorte;
      nm_limpa_data($this->fechacorte, $this->field_config['fechacorte']['date_sep']) ; 
      nm_limpa_hora($this->fechacorte_hora, $this->field_config['fechacorte']['time_sep']) ; 
      $this->Before_unformat['sn_festado'] = $this->sn_festado;
      nm_limpa_data($this->sn_festado, $this->field_config['sn_festado']['date_sep']) ; 
      nm_limpa_hora($this->sn_festado_hora, $this->field_config['sn_festado']['time_sep']) ; 
      $this->Before_unformat['sn_saldo'] = $this->sn_saldo;
      if (!empty($this->field_config['sn_saldo']['symbol_dec']))
      {
         $this->sc_remove_currency($this->sn_saldo, $this->field_config['sn_saldo']['symbol_dec'], $this->field_config['sn_saldo']['symbol_grp'], $this->field_config['sn_saldo']['symbol_mon']);
         nm_limpa_valor($this->sn_saldo, $this->field_config['sn_saldo']['symbol_dec'], $this->field_config['sn_saldo']['symbol_grp']);
      }
      $this->Before_unformat['sn_ticket'] = $this->sn_ticket;
      nm_limpa_numero($this->sn_ticket, $this->field_config['sn_ticket']['symbol_grp']) ; 
      $this->Before_unformat['sn_consecutivo'] = $this->sn_consecutivo;
      nm_limpa_numero($this->sn_consecutivo, $this->field_config['sn_consecutivo']['symbol_grp']) ; 
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
      if ($Nome_Campo == "kardexid")
      {
          nm_limpa_numero($this->kardexid, $this->field_config['kardexid']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "plazodias")
      {
          nm_limpa_numero($this->plazodias, $this->field_config['plazodias']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "retiva")
      {
          if (!empty($this->field_config['retiva']['symbol_dec']))
          {
             $this->sc_remove_currency($this->retiva, $this->field_config['retiva']['symbol_dec'], $this->field_config['retiva']['symbol_grp'], $this->field_config['retiva']['symbol_mon']);
             nm_limpa_valor($this->retiva, $this->field_config['retiva']['symbol_dec'], $this->field_config['retiva']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "retica")
      {
          if (!empty($this->field_config['retica']['symbol_dec']))
          {
             $this->sc_remove_currency($this->retica, $this->field_config['retica']['symbol_dec'], $this->field_config['retica']['symbol_grp'], $this->field_config['retica']['symbol_mon']);
             nm_limpa_valor($this->retica, $this->field_config['retica']['symbol_dec'], $this->field_config['retica']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "retfte")
      {
          if (!empty($this->field_config['retfte']['symbol_dec']))
          {
             $this->sc_remove_currency($this->retfte, $this->field_config['retfte']['symbol_dec'], $this->field_config['retfte']['symbol_grp'], $this->field_config['retfte']['symbol_mon']);
             nm_limpa_valor($this->retfte, $this->field_config['retfte']['symbol_dec'], $this->field_config['retfte']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ajustebase")
      {
          if (!empty($this->field_config['ajustebase']['symbol_dec']))
          {
             $this->sc_remove_currency($this->ajustebase, $this->field_config['ajustebase']['symbol_dec'], $this->field_config['ajustebase']['symbol_grp'], $this->field_config['ajustebase']['symbol_mon']);
             nm_limpa_valor($this->ajustebase, $this->field_config['ajustebase']['symbol_dec'], $this->field_config['ajustebase']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ajusteiva")
      {
          if (!empty($this->field_config['ajusteiva']['symbol_dec']))
          {
             $this->sc_remove_currency($this->ajusteiva, $this->field_config['ajusteiva']['symbol_dec'], $this->field_config['ajusteiva']['symbol_grp'], $this->field_config['ajusteiva']['symbol_mon']);
             nm_limpa_valor($this->ajusteiva, $this->field_config['ajusteiva']['symbol_dec'], $this->field_config['ajusteiva']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ajusteivaexc")
      {
          if (!empty($this->field_config['ajusteivaexc']['symbol_dec']))
          {
             $this->sc_remove_currency($this->ajusteivaexc, $this->field_config['ajusteivaexc']['symbol_dec'], $this->field_config['ajusteivaexc']['symbol_grp'], $this->field_config['ajusteivaexc']['symbol_mon']);
             nm_limpa_valor($this->ajusteivaexc, $this->field_config['ajusteivaexc']['symbol_dec'], $this->field_config['ajusteivaexc']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ajusteneto")
      {
          if (!empty($this->field_config['ajusteneto']['symbol_dec']))
          {
             $this->sc_remove_currency($this->ajusteneto, $this->field_config['ajusteneto']['symbol_dec'], $this->field_config['ajusteneto']['symbol_grp'], $this->field_config['ajusteneto']['symbol_mon']);
             nm_limpa_valor($this->ajusteneto, $this->field_config['ajusteneto']['symbol_dec'], $this->field_config['ajusteneto']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "vrbase")
      {
          if (!empty($this->field_config['vrbase']['symbol_dec']))
          {
             $this->sc_remove_currency($this->vrbase, $this->field_config['vrbase']['symbol_dec'], $this->field_config['vrbase']['symbol_grp'], $this->field_config['vrbase']['symbol_mon']);
             nm_limpa_valor($this->vrbase, $this->field_config['vrbase']['symbol_dec'], $this->field_config['vrbase']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "vriva")
      {
          if (!empty($this->field_config['vriva']['symbol_dec']))
          {
             $this->sc_remove_currency($this->vriva, $this->field_config['vriva']['symbol_dec'], $this->field_config['vriva']['symbol_grp'], $this->field_config['vriva']['symbol_mon']);
             nm_limpa_valor($this->vriva, $this->field_config['vriva']['symbol_dec'], $this->field_config['vriva']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "vriconsumo")
      {
          if (!empty($this->field_config['vriconsumo']['symbol_dec']))
          {
             $this->sc_remove_currency($this->vriconsumo, $this->field_config['vriconsumo']['symbol_dec'], $this->field_config['vriconsumo']['symbol_grp'], $this->field_config['vriconsumo']['symbol_mon']);
             nm_limpa_valor($this->vriconsumo, $this->field_config['vriconsumo']['symbol_dec'], $this->field_config['vriconsumo']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "vrrfte")
      {
          if (!empty($this->field_config['vrrfte']['symbol_dec']))
          {
             $this->sc_remove_currency($this->vrrfte, $this->field_config['vrrfte']['symbol_dec'], $this->field_config['vrrfte']['symbol_grp'], $this->field_config['vrrfte']['symbol_mon']);
             nm_limpa_valor($this->vrrfte, $this->field_config['vrrfte']['symbol_dec'], $this->field_config['vrrfte']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "vrrica")
      {
          if (!empty($this->field_config['vrrica']['symbol_dec']))
          {
             $this->sc_remove_currency($this->vrrica, $this->field_config['vrrica']['symbol_dec'], $this->field_config['vrrica']['symbol_grp'], $this->field_config['vrrica']['symbol_mon']);
             nm_limpa_valor($this->vrrica, $this->field_config['vrrica']['symbol_dec'], $this->field_config['vrrica']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "vrriva")
      {
          if (!empty($this->field_config['vrriva']['symbol_dec']))
          {
             $this->sc_remove_currency($this->vrriva, $this->field_config['vrriva']['symbol_dec'], $this->field_config['vrriva']['symbol_grp'], $this->field_config['vrriva']['symbol_mon']);
             nm_limpa_valor($this->vrriva, $this->field_config['vrriva']['symbol_dec'], $this->field_config['vrriva']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "total")
      {
          if (!empty($this->field_config['total']['symbol_dec']))
          {
             $this->sc_remove_currency($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp'], $this->field_config['total']['symbol_mon']);
             nm_limpa_valor($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "fpcontado")
      {
          if (!empty($this->field_config['fpcontado']['symbol_dec']))
          {
             $this->sc_remove_currency($this->fpcontado, $this->field_config['fpcontado']['symbol_dec'], $this->field_config['fpcontado']['symbol_grp'], $this->field_config['fpcontado']['symbol_mon']);
             nm_limpa_valor($this->fpcontado, $this->field_config['fpcontado']['symbol_dec'], $this->field_config['fpcontado']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "fpcredito")
      {
          if (!empty($this->field_config['fpcredito']['symbol_dec']))
          {
             $this->sc_remove_currency($this->fpcredito, $this->field_config['fpcredito']['symbol_dec'], $this->field_config['fpcredito']['symbol_grp'], $this->field_config['fpcredito']['symbol_mon']);
             nm_limpa_valor($this->fpcredito, $this->field_config['fpcredito']['symbol_dec'], $this->field_config['fpcredito']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "factorconv")
      {
          if (!empty($this->field_config['factorconv']['symbol_dec']))
          {
             $this->sc_remove_currency($this->factorconv, $this->field_config['factorconv']['symbol_dec'], $this->field_config['factorconv']['symbol_grp'], $this->field_config['factorconv']['symbol_mon']);
             nm_limpa_valor($this->factorconv, $this->field_config['factorconv']['symbol_dec'], $this->field_config['factorconv']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "desxcambio")
      {
          if (!empty($this->field_config['desxcambio']['symbol_dec']))
          {
             $this->sc_remove_currency($this->desxcambio, $this->field_config['desxcambio']['symbol_dec'], $this->field_config['desxcambio']['symbol_grp'], $this->field_config['desxcambio']['symbol_mon']);
             nm_limpa_valor($this->desxcambio, $this->field_config['desxcambio']['symbol_dec'], $this->field_config['desxcambio']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "devolxcambio")
      {
          nm_limpa_numero($this->devolxcambio, $this->field_config['devolxcambio']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "punxven")
      {
          if (!empty($this->field_config['punxven']['symbol_dec']))
          {
             $this->sc_remove_currency($this->punxven, $this->field_config['punxven']['symbol_dec'], $this->field_config['punxven']['symbol_grp'], $this->field_config['punxven']['symbol_mon']);
             nm_limpa_valor($this->punxven, $this->field_config['punxven']['symbol_dec'], $this->field_config['punxven']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "anticipo")
      {
          if (!empty($this->field_config['anticipo']['symbol_dec']))
          {
             $this->sc_remove_currency($this->anticipo, $this->field_config['anticipo']['symbol_dec'], $this->field_config['anticipo']['symbol_grp'], $this->field_config['anticipo']['symbol_mon']);
             nm_limpa_valor($this->anticipo, $this->field_config['anticipo']['symbol_dec'], $this->field_config['anticipo']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "anticipoadic")
      {
          if (!empty($this->field_config['anticipoadic']['symbol_dec']))
          {
             $this->sc_remove_currency($this->anticipoadic, $this->field_config['anticipoadic']['symbol_dec'], $this->field_config['anticipoadic']['symbol_grp'], $this->field_config['anticipoadic']['symbol_mon']);
             nm_limpa_valor($this->anticipoadic, $this->field_config['anticipoadic']['symbol_dec'], $this->field_config['anticipoadic']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "reciboid")
      {
          nm_limpa_numero($this->reciboid, $this->field_config['reciboid']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "vrivaexc")
      {
          if (!empty($this->field_config['vrivaexc']['symbol_dec']))
          {
             $this->sc_remove_currency($this->vrivaexc, $this->field_config['vrivaexc']['symbol_dec'], $this->field_config['vrivaexc']['symbol_grp'], $this->field_config['vrivaexc']['symbol_mon']);
             nm_limpa_valor($this->vrivaexc, $this->field_config['vrivaexc']['symbol_dec'], $this->field_config['vrivaexc']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "propina")
      {
          if (!empty($this->field_config['propina']['symbol_dec']))
          {
             $this->sc_remove_currency($this->propina, $this->field_config['propina']['symbol_dec'], $this->field_config['propina']['symbol_grp'], $this->field_config['propina']['symbol_mon']);
             nm_limpa_valor($this->propina, $this->field_config['propina']['symbol_dec'], $this->field_config['propina']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "cantclientes")
      {
          nm_limpa_numero($this->cantclientes, $this->field_config['cantclientes']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "contratoid")
      {
          nm_limpa_numero($this->contratoid, $this->field_config['contratoid']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "retcree")
      {
          if (!empty($this->field_config['retcree']['symbol_dec']))
          {
             $this->sc_remove_currency($this->retcree, $this->field_config['retcree']['symbol_dec'], $this->field_config['retcree']['symbol_grp'], $this->field_config['retcree']['symbol_mon']);
             nm_limpa_valor($this->retcree, $this->field_config['retcree']['symbol_dec'], $this->field_config['retcree']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "vrrcree")
      {
          if (!empty($this->field_config['vrrcree']['symbol_dec']))
          {
             $this->sc_remove_currency($this->vrrcree, $this->field_config['vrrcree']['symbol_dec'], $this->field_config['vrrcree']['symbol_grp'], $this->field_config['vrrcree']['symbol_mon']);
             nm_limpa_valor($this->vrrcree, $this->field_config['vrrcree']['symbol_dec'], $this->field_config['vrrcree']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "porcutiaiu")
      {
          if (!empty($this->field_config['porcutiaiu']['symbol_dec']))
          {
             $this->sc_remove_currency($this->porcutiaiu, $this->field_config['porcutiaiu']['symbol_dec'], $this->field_config['porcutiaiu']['symbol_grp'], $this->field_config['porcutiaiu']['symbol_mon']);
             nm_limpa_valor($this->porcutiaiu, $this->field_config['porcutiaiu']['symbol_dec'], $this->field_config['porcutiaiu']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "sn_saldo")
      {
          if (!empty($this->field_config['sn_saldo']['symbol_dec']))
          {
             $this->sc_remove_currency($this->sn_saldo, $this->field_config['sn_saldo']['symbol_dec'], $this->field_config['sn_saldo']['symbol_grp'], $this->field_config['sn_saldo']['symbol_mon']);
             nm_limpa_valor($this->sn_saldo, $this->field_config['sn_saldo']['symbol_dec'], $this->field_config['sn_saldo']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "sn_ticket")
      {
          nm_limpa_numero($this->sn_ticket, $this->field_config['sn_ticket']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "sn_consecutivo")
      {
          nm_limpa_numero($this->sn_consecutivo, $this->field_config['sn_consecutivo']['symbol_grp']) ; 
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
      if ('' !== $this->kardexid || (!empty($format_fields) && isset($format_fields['kardexid'])))
      {
          nmgp_Form_Num_Val($this->kardexid, $this->field_config['kardexid']['symbol_grp'], $this->field_config['kardexid']['symbol_dec'], "0", "S", $this->field_config['kardexid']['format_neg'], "", "", "-", $this->field_config['kardexid']['symbol_fmt']) ; 
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
          $this->ajax_return_values_kardexid();
          $this->ajax_return_values_codcomp();
          $this->ajax_return_values_codprefijo();
          $this->ajax_return_values_numero();
          $this->ajax_return_values_sn_cufe();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['kardexid']['keyVal'] = form_KARDEX_mob_pack_protect_string($this->nmgp_dados_form['kardexid']);
          }
   } // ajax_return_values

          //----- kardexid
   function ajax_return_values_kardexid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("kardexid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->kardexid);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['kardexid'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("kardexid", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- codcomp
   function ajax_return_values_codcomp($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("codcomp", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->codcomp);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['codcomp'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- codprefijo
   function ajax_return_values_codprefijo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("codprefijo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->codprefijo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['codprefijo'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- numero
   function ajax_return_values_numero($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numero", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numero);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numero'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- sn_cufe
   function ajax_return_values_sn_cufe($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sn_cufe", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sn_cufe);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['sn_cufe'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['upload_dir'][$fieldName][] = $newName;
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
      $this->retiva = str_replace($sc_parm1, $sc_parm2, $this->retiva); 
      $this->retica = str_replace($sc_parm1, $sc_parm2, $this->retica); 
      $this->retfte = str_replace($sc_parm1, $sc_parm2, $this->retfte); 
      $this->ajustebase = str_replace($sc_parm1, $sc_parm2, $this->ajustebase); 
      $this->ajusteiva = str_replace($sc_parm1, $sc_parm2, $this->ajusteiva); 
      $this->ajusteivaexc = str_replace($sc_parm1, $sc_parm2, $this->ajusteivaexc); 
      $this->ajusteneto = str_replace($sc_parm1, $sc_parm2, $this->ajusteneto); 
      $this->vrbase = str_replace($sc_parm1, $sc_parm2, $this->vrbase); 
      $this->vriva = str_replace($sc_parm1, $sc_parm2, $this->vriva); 
      $this->vriconsumo = str_replace($sc_parm1, $sc_parm2, $this->vriconsumo); 
      $this->vrrfte = str_replace($sc_parm1, $sc_parm2, $this->vrrfte); 
      $this->vrrica = str_replace($sc_parm1, $sc_parm2, $this->vrrica); 
      $this->vrriva = str_replace($sc_parm1, $sc_parm2, $this->vrriva); 
      $this->total = str_replace($sc_parm1, $sc_parm2, $this->total); 
      $this->fpcontado = str_replace($sc_parm1, $sc_parm2, $this->fpcontado); 
      $this->fpcredito = str_replace($sc_parm1, $sc_parm2, $this->fpcredito); 
      $this->factorconv = str_replace($sc_parm1, $sc_parm2, $this->factorconv); 
      $this->desxcambio = str_replace($sc_parm1, $sc_parm2, $this->desxcambio); 
      $this->punxven = str_replace($sc_parm1, $sc_parm2, $this->punxven); 
      $this->anticipo = str_replace($sc_parm1, $sc_parm2, $this->anticipo); 
      $this->anticipoadic = str_replace($sc_parm1, $sc_parm2, $this->anticipoadic); 
      $this->vrivaexc = str_replace($sc_parm1, $sc_parm2, $this->vrivaexc); 
      $this->propina = str_replace($sc_parm1, $sc_parm2, $this->propina); 
      $this->retcree = str_replace($sc_parm1, $sc_parm2, $this->retcree); 
      $this->vrrcree = str_replace($sc_parm1, $sc_parm2, $this->vrrcree); 
      $this->porcutiaiu = str_replace($sc_parm1, $sc_parm2, $this->porcutiaiu); 
      $this->sn_saldo = str_replace($sc_parm1, $sc_parm2, $this->sn_saldo); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->retiva = "'" . $this->retiva . "'";
      $this->retica = "'" . $this->retica . "'";
      $this->retfte = "'" . $this->retfte . "'";
      $this->ajustebase = "'" . $this->ajustebase . "'";
      $this->ajusteiva = "'" . $this->ajusteiva . "'";
      $this->ajusteivaexc = "'" . $this->ajusteivaexc . "'";
      $this->ajusteneto = "'" . $this->ajusteneto . "'";
      $this->vrbase = "'" . $this->vrbase . "'";
      $this->vriva = "'" . $this->vriva . "'";
      $this->vriconsumo = "'" . $this->vriconsumo . "'";
      $this->vrrfte = "'" . $this->vrrfte . "'";
      $this->vrrica = "'" . $this->vrrica . "'";
      $this->vrriva = "'" . $this->vrriva . "'";
      $this->total = "'" . $this->total . "'";
      $this->fpcontado = "'" . $this->fpcontado . "'";
      $this->fpcredito = "'" . $this->fpcredito . "'";
      $this->factorconv = "'" . $this->factorconv . "'";
      $this->desxcambio = "'" . $this->desxcambio . "'";
      $this->punxven = "'" . $this->punxven . "'";
      $this->anticipo = "'" . $this->anticipo . "'";
      $this->anticipoadic = "'" . $this->anticipoadic . "'";
      $this->vrivaexc = "'" . $this->vrivaexc . "'";
      $this->propina = "'" . $this->propina . "'";
      $this->retcree = "'" . $this->retcree . "'";
      $this->vrrcree = "'" . $this->vrrcree . "'";
      $this->porcutiaiu = "'" . $this->porcutiaiu . "'";
      $this->sn_saldo = "'" . $this->sn_saldo . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->retiva = str_replace("'", "", $this->retiva); 
      $this->retica = str_replace("'", "", $this->retica); 
      $this->retfte = str_replace("'", "", $this->retfte); 
      $this->ajustebase = str_replace("'", "", $this->ajustebase); 
      $this->ajusteiva = str_replace("'", "", $this->ajusteiva); 
      $this->ajusteivaexc = str_replace("'", "", $this->ajusteivaexc); 
      $this->ajusteneto = str_replace("'", "", $this->ajusteneto); 
      $this->vrbase = str_replace("'", "", $this->vrbase); 
      $this->vriva = str_replace("'", "", $this->vriva); 
      $this->vriconsumo = str_replace("'", "", $this->vriconsumo); 
      $this->vrrfte = str_replace("'", "", $this->vrrfte); 
      $this->vrrica = str_replace("'", "", $this->vrrica); 
      $this->vrriva = str_replace("'", "", $this->vrriva); 
      $this->total = str_replace("'", "", $this->total); 
      $this->fpcontado = str_replace("'", "", $this->fpcontado); 
      $this->fpcredito = str_replace("'", "", $this->fpcredito); 
      $this->factorconv = str_replace("'", "", $this->factorconv); 
      $this->desxcambio = str_replace("'", "", $this->desxcambio); 
      $this->punxven = str_replace("'", "", $this->punxven); 
      $this->anticipo = str_replace("'", "", $this->anticipo); 
      $this->anticipoadic = str_replace("'", "", $this->anticipoadic); 
      $this->vrivaexc = str_replace("'", "", $this->vrivaexc); 
      $this->propina = str_replace("'", "", $this->propina); 
      $this->retcree = str_replace("'", "", $this->retcree); 
      $this->vrrcree = str_replace("'", "", $this->vrrcree); 
      $this->porcutiaiu = str_replace("'", "", $this->porcutiaiu); 
      $this->sn_saldo = str_replace("'", "", $this->sn_saldo); 
   } 
//----------- 


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
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_KARDEX_mob']['contr_erro'] = 'on';
             /* KARDEXSELF */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM KARDEXSELF WHERE KARDEXID = " . $this->kardexid ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM KARDEXSELF WHERE KARDEXID = " . $this->kardexid ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_KARDEXSELF = array();
      $this->dataset_kardexself = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dataset_KARDEXSELF[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->dataset_kardexself[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_KARDEXSELF = false;
          $this->dataset_KARDEXSELF_erro = $this->Db->ErrorMsg();
          $this->dataset_kardexself = false;
          $this->dataset_kardexself_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_KARDEXSELF[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_KARDEX_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }

            /* DEKARDEX */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM DEKARDEX WHERE KARDEXID = " . $this->kardexid ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM DEKARDEX WHERE KARDEXID = " . $this->kardexid ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_DEKARDEX = array();
      $this->dataset_dekardex = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dataset_DEKARDEX[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->dataset_dekardex[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_DEKARDEX = false;
          $this->dataset_DEKARDEX_erro = $this->Db->ErrorMsg();
          $this->dataset_dekardex = false;
          $this->dataset_dekardex_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_DEKARDEX[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_KARDEX_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }

            /* KARDEXLINEA */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM KARDEXLINEA WHERE KARDEXID = " . $this->kardexid ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM KARDEXLINEA WHERE KARDEXID = " . $this->kardexid ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_KARDEXLINEA = array();
      $this->dataset_kardexlinea = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dataset_KARDEXLINEA[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->dataset_kardexlinea[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_KARDEXLINEA = false;
          $this->dataset_KARDEXLINEA_erro = $this->Db->ErrorMsg();
          $this->dataset_kardexlinea = false;
          $this->dataset_kardexlinea_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_KARDEXLINEA[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_KARDEX_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }

            /* KARDEXALM */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM KARDEXALM WHERE KARDEXID = " . $this->kardexid ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM KARDEXALM WHERE KARDEXID = " . $this->kardexid ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_KARDEXALM = array();
      $this->dataset_kardexalm = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dataset_KARDEXALM[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->dataset_kardexalm[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_KARDEXALM = false;
          $this->dataset_KARDEXALM_erro = $this->Db->ErrorMsg();
          $this->dataset_kardexalm = false;
          $this->dataset_kardexalm_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_KARDEXALM[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_KARDEX_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }

            /* DEKARDEXDTO */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM DEKARDEXDTO WHERE KARDEXID = " . $this->kardexid ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM DEKARDEXDTO WHERE KARDEXID = " . $this->kardexid ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_DEKARDEXDTO = array();
      $this->dataset_dekardexdto = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dataset_DEKARDEXDTO[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->dataset_dekardexdto[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_DEKARDEXDTO = false;
          $this->dataset_DEKARDEXDTO_erro = $this->Db->ErrorMsg();
          $this->dataset_dekardexdto = false;
          $this->dataset_dekardexdto_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_DEKARDEXDTO[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_KARDEX_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }

            /* DEKARDEXFP */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM DEKARDEXFP WHERE KARDEXID = " . $this->kardexid ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM DEKARDEXFP WHERE KARDEXID = " . $this->kardexid ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_DEKARDEXFP = array();
      $this->dataset_dekardexfp = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dataset_DEKARDEXFP[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->dataset_dekardexfp[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_DEKARDEXFP = false;
          $this->dataset_DEKARDEXFP_erro = $this->Db->ErrorMsg();
          $this->dataset_dekardexfp = false;
          $this->dataset_dekardexfp_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_DEKARDEXFP[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_KARDEX_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }

            /* KARDEXCOM */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM KARDEXCOM WHERE KARDEXID = " . $this->kardexid ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM KARDEXCOM WHERE KARDEXID = " . $this->kardexid ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_KARDEXCOM = array();
      $this->dataset_kardexcom = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dataset_KARDEXCOM[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->dataset_kardexcom[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_KARDEXCOM = false;
          $this->dataset_KARDEXCOM_erro = $this->Db->ErrorMsg();
          $this->dataset_kardexcom = false;
          $this->dataset_kardexcom_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_KARDEXCOM[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_KARDEX_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }

            /* CAJAMENOR */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM CAJAMENOR WHERE KARDEXID = " . $this->kardexid ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM CAJAMENOR WHERE KARDEXID = " . $this->kardexid ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_CAJAMENOR = array();
      $this->dataset_cajamenor = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dataset_CAJAMENOR[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->dataset_cajamenor[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_CAJAMENOR = false;
          $this->dataset_CAJAMENOR_erro = $this->Db->ErrorMsg();
          $this->dataset_cajamenor = false;
          $this->dataset_cajamenor_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_CAJAMENOR[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_KARDEX_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }

            /* DOCUMENTOSELF */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM DOCUMENTOSELF WHERE KDXCOSTAD = " . $this->kardexid ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM DOCUMENTOSELF WHERE KDXCOSTAD = " . $this->kardexid ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_DOCUMENTOSELF = array();
      $this->dataset_documentoself = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dataset_DOCUMENTOSELF[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->dataset_documentoself[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_DOCUMENTOSELF = false;
          $this->dataset_DOCUMENTOSELF_erro = $this->Db->ErrorMsg();
          $this->dataset_documentoself = false;
          $this->dataset_documentoself_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_DOCUMENTOSELF[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_KARDEX_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }
$_SESSION['scriptcase']['form_KARDEX_mob']['contr_erro'] = 'off'; 
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
      $NM_val_form['kardexid'] = $this->kardexid;
      $NM_val_form['codcomp'] = $this->codcomp;
      $NM_val_form['codprefijo'] = $this->codprefijo;
      $NM_val_form['numero'] = $this->numero;
      $NM_val_form['sn_cufe'] = $this->sn_cufe;
      $NM_val_form['fecha'] = $this->fecha;
      $NM_val_form['fecasentad'] = $this->fecasentad;
      $NM_val_form['observ'] = $this->observ;
      $NM_val_form['periodo'] = $this->periodo;
      $NM_val_form['cenid'] = $this->cenid;
      $NM_val_form['areadid'] = $this->areadid;
      $NM_val_form['sucid'] = $this->sucid;
      $NM_val_form['cliente'] = $this->cliente;
      $NM_val_form['vendedor'] = $this->vendedor;
      $NM_val_form['formapago'] = $this->formapago;
      $NM_val_form['plazodias'] = $this->plazodias;
      $NM_val_form['bcoid'] = $this->bcoid;
      $NM_val_form['tipodoc'] = $this->tipodoc;
      $NM_val_form['documento'] = $this->documento;
      $NM_val_form['concepto'] = $this->concepto;
      $NM_val_form['fecvence'] = $this->fecvence;
      $NM_val_form['retiva'] = $this->retiva;
      $NM_val_form['retica'] = $this->retica;
      $NM_val_form['retfte'] = $this->retfte;
      $NM_val_form['ajustebase'] = $this->ajustebase;
      $NM_val_form['ajusteiva'] = $this->ajusteiva;
      $NM_val_form['ajusteivaexc'] = $this->ajusteivaexc;
      $NM_val_form['ajusteneto'] = $this->ajusteneto;
      $NM_val_form['vrbase'] = $this->vrbase;
      $NM_val_form['vriva'] = $this->vriva;
      $NM_val_form['vriconsumo'] = $this->vriconsumo;
      $NM_val_form['vrrfte'] = $this->vrrfte;
      $NM_val_form['vrrica'] = $this->vrrica;
      $NM_val_form['vrriva'] = $this->vrriva;
      $NM_val_form['total'] = $this->total;
      $NM_val_form['docuid'] = $this->docuid;
      $NM_val_form['fpcontado'] = $this->fpcontado;
      $NM_val_form['fpcredito'] = $this->fpcredito;
      $NM_val_form['despachar_a'] = $this->despachar_a;
      $NM_val_form['usuario'] = $this->usuario;
      $NM_val_form['hora'] = $this->hora;
      $NM_val_form['factorconv'] = $this->factorconv;
      $NM_val_form['nrofacprov'] = $this->nrofacprov;
      $NM_val_form['vehiculoid'] = $this->vehiculoid;
      $NM_val_form['fecanulado'] = $this->fecanulado;
      $NM_val_form['desxcambio'] = $this->desxcambio;
      $NM_val_form['devolxcambio'] = $this->devolxcambio;
      $NM_val_form['tipoica2id'] = $this->tipoica2id;
      $NM_val_form['moneda'] = $this->moneda;
      $NM_val_form['nrocontrol'] = $this->nrocontrol;
      $NM_val_form['prontopago'] = $this->prontopago;
      $NM_val_form['motivodevid'] = $this->motivodevid;
      $NM_val_form['impresa'] = $this->impresa;
      $NM_val_form['horacrea'] = $this->horacrea;
      $NM_val_form['punxven'] = $this->punxven;
      $NM_val_form['exportacion'] = $this->exportacion;
      $NM_val_form['anticipo'] = $this->anticipo;
      $NM_val_form['importado'] = $this->importado;
      $NM_val_form['horacomanda'] = $this->horacomanda;
      $NM_val_form['fecemi'] = $this->fecemi;
      $NM_val_form['anticipoadic'] = $this->anticipoadic;
      $NM_val_form['reciboid'] = $this->reciboid;
      $NM_val_form['impnotent'] = $this->impnotent;
      $NM_val_form['motivocierre'] = $this->motivocierre;
      $NM_val_form['contrato'] = $this->contrato;
      $NM_val_form['vrivaexc'] = $this->vrivaexc;
      $NM_val_form['propina'] = $this->propina;
      $NM_val_form['contratoinmid'] = $this->contratoinmid;
      $NM_val_form['cantclientes'] = $this->cantclientes;
      $NM_val_form['periodofact'] = $this->periodofact;
      $NM_val_form['anofact'] = $this->anofact;
      $NM_val_form['contratoid'] = $this->contratoid;
      $NM_val_form['apartado'] = $this->apartado;
      $NM_val_form['fechaent'] = $this->fechaent;
      $NM_val_form['horaent'] = $this->horaent;
      $NM_val_form['asentando'] = $this->asentando;
      $NM_val_form['retcree'] = $this->retcree;
      $NM_val_form['vrrcree'] = $this->vrrcree;
      $NM_val_form['tipocreeid'] = $this->tipocreeid;
      $NM_val_form['nrocomven'] = $this->nrocomven;
      $NM_val_form['nrofacteq'] = $this->nrofacteq;
      $NM_val_form['porcutiaiu'] = $this->porcutiaiu;
      $NM_val_form['comexp'] = $this->comexp;
      $NM_val_form['fecreclamo'] = $this->fecreclamo;
      $NM_val_form['motreclamo'] = $this->motreclamo;
      $NM_val_form['chequeado'] = $this->chequeado;
      $NM_val_form['factrempost'] = $this->factrempost;
      $NM_val_form['cambiodespachar_a'] = $this->cambiodespachar_a;
      $NM_val_form['fechacorte'] = $this->fechacorte;
      $NM_val_form['descuento_total'] = $this->descuento_total;
      $NM_val_form['sn_estado'] = $this->sn_estado;
      $NM_val_form['sn_festado'] = $this->sn_festado;
      $NM_val_form['sn_tienecot'] = $this->sn_tienecot;
      $NM_val_form['sn_saldo'] = $this->sn_saldo;
      $NM_val_form['sn_npago'] = $this->sn_npago;
      $NM_val_form['sn_ticket'] = $this->sn_ticket;
      $NM_val_form['sn_pjfe'] = $this->sn_pjfe;
      $NM_val_form['sn_rutaqr'] = $this->sn_rutaqr;
      $NM_val_form['sn_consecutivo'] = $this->sn_consecutivo;
      if ($this->kardexid === "" || is_null($this->kardexid))  
      { 
          $this->kardexid = 0;
      } 
      if ($this->cenid === "" || is_null($this->cenid))  
      { 
          $this->cenid = 0;
          $this->sc_force_zero[] = 'cenid';
      } 
      if ($this->areadid === "" || is_null($this->areadid))  
      { 
          $this->areadid = 0;
          $this->sc_force_zero[] = 'areadid';
      } 
      if ($this->sucid === "" || is_null($this->sucid))  
      { 
          $this->sucid = 0;
          $this->sc_force_zero[] = 'sucid';
      } 
      if ($this->cliente === "" || is_null($this->cliente))  
      { 
          $this->cliente = 0;
          $this->sc_force_zero[] = 'cliente';
      } 
      if ($this->vendedor === "" || is_null($this->vendedor))  
      { 
          $this->vendedor = 0;
          $this->sc_force_zero[] = 'vendedor';
      } 
      if ($this->plazodias === "" || is_null($this->plazodias))  
      { 
          $this->plazodias = 0;
          $this->sc_force_zero[] = 'plazodias';
      } 
      if ($this->bcoid === "" || is_null($this->bcoid))  
      { 
          $this->bcoid = 0;
          $this->sc_force_zero[] = 'bcoid';
      } 
      if ($this->concepto === "" || is_null($this->concepto))  
      { 
          $this->concepto = 0;
          $this->sc_force_zero[] = 'concepto';
      } 
      if ($this->retiva === "" || is_null($this->retiva))  
      { 
          $this->retiva = 0;
          $this->sc_force_zero[] = 'retiva';
      } 
      if ($this->retica === "" || is_null($this->retica))  
      { 
          $this->retica = 0;
          $this->sc_force_zero[] = 'retica';
      } 
      if ($this->retfte === "" || is_null($this->retfte))  
      { 
          $this->retfte = 0;
          $this->sc_force_zero[] = 'retfte';
      } 
      if ($this->ajustebase === "" || is_null($this->ajustebase))  
      { 
          $this->ajustebase = 0;
          $this->sc_force_zero[] = 'ajustebase';
      } 
      if ($this->ajusteiva === "" || is_null($this->ajusteiva))  
      { 
          $this->ajusteiva = 0;
          $this->sc_force_zero[] = 'ajusteiva';
      } 
      if ($this->ajusteivaexc === "" || is_null($this->ajusteivaexc))  
      { 
          $this->ajusteivaexc = 0;
          $this->sc_force_zero[] = 'ajusteivaexc';
      } 
      if ($this->ajusteneto === "" || is_null($this->ajusteneto))  
      { 
          $this->ajusteneto = 0;
          $this->sc_force_zero[] = 'ajusteneto';
      } 
      if ($this->vrbase === "" || is_null($this->vrbase))  
      { 
          $this->vrbase = 0;
          $this->sc_force_zero[] = 'vrbase';
      } 
      if ($this->vriva === "" || is_null($this->vriva))  
      { 
          $this->vriva = 0;
          $this->sc_force_zero[] = 'vriva';
      } 
      if ($this->vriconsumo === "" || is_null($this->vriconsumo))  
      { 
          $this->vriconsumo = 0;
          $this->sc_force_zero[] = 'vriconsumo';
      } 
      if ($this->vrrfte === "" || is_null($this->vrrfte))  
      { 
          $this->vrrfte = 0;
          $this->sc_force_zero[] = 'vrrfte';
      } 
      if ($this->vrrica === "" || is_null($this->vrrica))  
      { 
          $this->vrrica = 0;
          $this->sc_force_zero[] = 'vrrica';
      } 
      if ($this->vrriva === "" || is_null($this->vrriva))  
      { 
          $this->vrriva = 0;
          $this->sc_force_zero[] = 'vrriva';
      } 
      if ($this->total === "" || is_null($this->total))  
      { 
          $this->total = 0;
          $this->sc_force_zero[] = 'total';
      } 
      if ($this->docuid === "" || is_null($this->docuid))  
      { 
          $this->docuid = 0;
          $this->sc_force_zero[] = 'docuid';
      } 
      if ($this->fpcontado === "" || is_null($this->fpcontado))  
      { 
          $this->fpcontado = 0;
          $this->sc_force_zero[] = 'fpcontado';
      } 
      if ($this->fpcredito === "" || is_null($this->fpcredito))  
      { 
          $this->fpcredito = 0;
          $this->sc_force_zero[] = 'fpcredito';
      } 
      if ($this->despachar_a === "" || is_null($this->despachar_a))  
      { 
          $this->despachar_a = 0;
          $this->sc_force_zero[] = 'despachar_a';
      } 
      if ($this->factorconv === "" || is_null($this->factorconv))  
      { 
          $this->factorconv = 0;
          $this->sc_force_zero[] = 'factorconv';
      } 
      if ($this->vehiculoid === "" || is_null($this->vehiculoid))  
      { 
          $this->vehiculoid = 0;
          $this->sc_force_zero[] = 'vehiculoid';
      } 
      if ($this->desxcambio === "" || is_null($this->desxcambio))  
      { 
          $this->desxcambio = 0;
          $this->sc_force_zero[] = 'desxcambio';
      } 
      if ($this->devolxcambio === "" || is_null($this->devolxcambio))  
      { 
          $this->devolxcambio = 0;
          $this->sc_force_zero[] = 'devolxcambio';
      } 
      if ($this->tipoica2id === "" || is_null($this->tipoica2id))  
      { 
          $this->tipoica2id = 0;
          $this->sc_force_zero[] = 'tipoica2id';
      } 
      if ($this->motivodevid === "" || is_null($this->motivodevid))  
      { 
          $this->motivodevid = 0;
          $this->sc_force_zero[] = 'motivodevid';
      } 
      if ($this->punxven === "" || is_null($this->punxven))  
      { 
          $this->punxven = 0;
          $this->sc_force_zero[] = 'punxven';
      } 
      if ($this->anticipo === "" || is_null($this->anticipo))  
      { 
          $this->anticipo = 0;
          $this->sc_force_zero[] = 'anticipo';
      } 
      if ($this->anticipoadic === "" || is_null($this->anticipoadic))  
      { 
          $this->anticipoadic = 0;
          $this->sc_force_zero[] = 'anticipoadic';
      } 
      if ($this->reciboid === "" || is_null($this->reciboid))  
      { 
          $this->reciboid = 0;
          $this->sc_force_zero[] = 'reciboid';
      } 
      if ($this->motivocierre === "" || is_null($this->motivocierre))  
      { 
          $this->motivocierre = 0;
          $this->sc_force_zero[] = 'motivocierre';
      } 
      if ($this->vrivaexc === "" || is_null($this->vrivaexc))  
      { 
          $this->vrivaexc = 0;
          $this->sc_force_zero[] = 'vrivaexc';
      } 
      if ($this->propina === "" || is_null($this->propina))  
      { 
          $this->propina = 0;
          $this->sc_force_zero[] = 'propina';
      } 
      if ($this->contratoinmid === "" || is_null($this->contratoinmid))  
      { 
          $this->contratoinmid = 0;
          $this->sc_force_zero[] = 'contratoinmid';
      } 
      if ($this->cantclientes === "" || is_null($this->cantclientes))  
      { 
          $this->cantclientes = 0;
          $this->sc_force_zero[] = 'cantclientes';
      } 
      if ($this->contratoid === "" || is_null($this->contratoid))  
      { 
          $this->contratoid = 0;
          $this->sc_force_zero[] = 'contratoid';
      } 
      if ($this->retcree === "" || is_null($this->retcree))  
      { 
          $this->retcree = 0;
          $this->sc_force_zero[] = 'retcree';
      } 
      if ($this->vrrcree === "" || is_null($this->vrrcree))  
      { 
          $this->vrrcree = 0;
          $this->sc_force_zero[] = 'vrrcree';
      } 
      if ($this->tipocreeid === "" || is_null($this->tipocreeid))  
      { 
          $this->tipocreeid = 0;
          $this->sc_force_zero[] = 'tipocreeid';
      } 
      if ($this->porcutiaiu === "" || is_null($this->porcutiaiu))  
      { 
          $this->porcutiaiu = 0;
          $this->sc_force_zero[] = 'porcutiaiu';
      } 
      if ($this->motreclamo === "" || is_null($this->motreclamo))  
      { 
          $this->motreclamo = 0;
          $this->sc_force_zero[] = 'motreclamo';
      } 
      if ($this->sn_saldo === "" || is_null($this->sn_saldo))  
      { 
          $this->sn_saldo = 0;
          $this->sc_force_zero[] = 'sn_saldo';
      } 
      if ($this->sn_ticket === "" || is_null($this->sn_ticket))  
      { 
          $this->sn_ticket = 0;
          $this->sc_force_zero[] = 'sn_ticket';
      } 
      if ($this->sn_consecutivo === "" || is_null($this->sn_consecutivo))  
      { 
          $this->sn_consecutivo = 0;
          $this->sc_force_zero[] = 'sn_consecutivo';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_ibase, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite);
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->codcomp_before_qstr = $this->codcomp;
          $this->codcomp = substr($this->Db->qstr($this->codcomp), 1, -1); 
          if ($this->codcomp == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codcomp = "null"; 
              $NM_val_null[] = "codcomp";
          } 
          $this->codprefijo_before_qstr = $this->codprefijo;
          $this->codprefijo = substr($this->Db->qstr($this->codprefijo), 1, -1); 
          if ($this->codprefijo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codprefijo = "null"; 
              $NM_val_null[] = "codprefijo";
          } 
          $this->numero_before_qstr = $this->numero;
          $this->numero = substr($this->Db->qstr($this->numero), 1, -1); 
          if ($this->numero == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->numero = "null"; 
              $NM_val_null[] = "numero";
          } 
          if ($this->fecha == "")  
          { 
              $this->fecha = "null"; 
              $NM_val_null[] = "fecha";
          } 
          if ($this->fecasentad == "")  
          { 
              $this->fecasentad = "null"; 
              $NM_val_null[] = "fecasentad";
          } 
          $this->observ_before_qstr = $this->observ;
          $this->observ = substr($this->Db->qstr($this->observ), 1, -1); 
          if ($this->observ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->observ = "null"; 
              $NM_val_null[] = "observ";
          } 
          $this->periodo_before_qstr = $this->periodo;
          $this->periodo = substr($this->Db->qstr($this->periodo), 1, -1); 
          if ($this->periodo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->periodo = "null"; 
              $NM_val_null[] = "periodo";
          } 
          $this->formapago_before_qstr = $this->formapago;
          $this->formapago = substr($this->Db->qstr($this->formapago), 1, -1); 
          if ($this->formapago == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->formapago = "null"; 
              $NM_val_null[] = "formapago";
          } 
          $this->tipodoc_before_qstr = $this->tipodoc;
          $this->tipodoc = substr($this->Db->qstr($this->tipodoc), 1, -1); 
          if ($this->tipodoc == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipodoc = "null"; 
              $NM_val_null[] = "tipodoc";
          } 
          $this->documento_before_qstr = $this->documento;
          $this->documento = substr($this->Db->qstr($this->documento), 1, -1); 
          if ($this->documento == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->documento = "null"; 
              $NM_val_null[] = "documento";
          } 
          if ($this->fecvence == "")  
          { 
              $this->fecvence = "null"; 
              $NM_val_null[] = "fecvence";
          } 
          $this->usuario_before_qstr = $this->usuario;
          $this->usuario = substr($this->Db->qstr($this->usuario), 1, -1); 
          if ($this->usuario == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->usuario = "null"; 
              $NM_val_null[] = "usuario";
          } 
          $this->hora_before_qstr = $this->hora;
          $this->hora = substr($this->Db->qstr($this->hora), 1, -1); 
          if ($this->hora == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->hora = "null"; 
              $NM_val_null[] = "hora";
          } 
          $this->nrofacprov_before_qstr = $this->nrofacprov;
          $this->nrofacprov = substr($this->Db->qstr($this->nrofacprov), 1, -1); 
          if ($this->nrofacprov == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nrofacprov = "null"; 
              $NM_val_null[] = "nrofacprov";
          } 
          if ($this->fecanulado == "")  
          { 
              $this->fecanulado = "null"; 
              $NM_val_null[] = "fecanulado";
          } 
          $this->moneda_before_qstr = $this->moneda;
          $this->moneda = substr($this->Db->qstr($this->moneda), 1, -1); 
          if ($this->moneda == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->moneda = "null"; 
              $NM_val_null[] = "moneda";
          } 
          $this->nrocontrol_before_qstr = $this->nrocontrol;
          $this->nrocontrol = substr($this->Db->qstr($this->nrocontrol), 1, -1); 
          if ($this->nrocontrol == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nrocontrol = "null"; 
              $NM_val_null[] = "nrocontrol";
          } 
          $this->prontopago_before_qstr = $this->prontopago;
          $this->prontopago = substr($this->Db->qstr($this->prontopago), 1, -1); 
          if ($this->prontopago == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->prontopago = "null"; 
              $NM_val_null[] = "prontopago";
          } 
          $this->impresa_before_qstr = $this->impresa;
          $this->impresa = substr($this->Db->qstr($this->impresa), 1, -1); 
          if ($this->impresa == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->impresa = "null"; 
              $NM_val_null[] = "impresa";
          } 
          $this->horacrea_before_qstr = $this->horacrea;
          $this->horacrea = substr($this->Db->qstr($this->horacrea), 1, -1); 
          if ($this->horacrea == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->horacrea = "null"; 
              $NM_val_null[] = "horacrea";
          } 
          $this->exportacion_before_qstr = $this->exportacion;
          $this->exportacion = substr($this->Db->qstr($this->exportacion), 1, -1); 
          if ($this->exportacion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->exportacion = "null"; 
              $NM_val_null[] = "exportacion";
          } 
          $this->importado_before_qstr = $this->importado;
          $this->importado = substr($this->Db->qstr($this->importado), 1, -1); 
          if ($this->importado == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->importado = "null"; 
              $NM_val_null[] = "importado";
          } 
          $this->horacomanda_before_qstr = $this->horacomanda;
          $this->horacomanda = substr($this->Db->qstr($this->horacomanda), 1, -1); 
          if ($this->horacomanda == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->horacomanda = "null"; 
              $NM_val_null[] = "horacomanda";
          } 
          if ($this->fecemi == "")  
          { 
              $this->fecemi = "null"; 
              $NM_val_null[] = "fecemi";
          } 
          $this->impnotent_before_qstr = $this->impnotent;
          $this->impnotent = substr($this->Db->qstr($this->impnotent), 1, -1); 
          if ($this->impnotent == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->impnotent = "null"; 
              $NM_val_null[] = "impnotent";
          } 
          $this->contrato_before_qstr = $this->contrato;
          $this->contrato = substr($this->Db->qstr($this->contrato), 1, -1); 
          if ($this->contrato == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->contrato = "null"; 
              $NM_val_null[] = "contrato";
          } 
          $this->periodofact_before_qstr = $this->periodofact;
          $this->periodofact = substr($this->Db->qstr($this->periodofact), 1, -1); 
          if ($this->periodofact == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->periodofact = "null"; 
              $NM_val_null[] = "periodofact";
          } 
          $this->anofact_before_qstr = $this->anofact;
          $this->anofact = substr($this->Db->qstr($this->anofact), 1, -1); 
          if ($this->anofact == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->anofact = "null"; 
              $NM_val_null[] = "anofact";
          } 
          $this->apartado_before_qstr = $this->apartado;
          $this->apartado = substr($this->Db->qstr($this->apartado), 1, -1); 
          if ($this->apartado == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->apartado = "null"; 
              $NM_val_null[] = "apartado";
          } 
          if ($this->fechaent == "")  
          { 
              $this->fechaent = "null"; 
              $NM_val_null[] = "fechaent";
          } 
          $this->horaent_before_qstr = $this->horaent;
          $this->horaent = substr($this->Db->qstr($this->horaent), 1, -1); 
          if ($this->horaent == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->horaent = "null"; 
              $NM_val_null[] = "horaent";
          } 
          $this->asentando_before_qstr = $this->asentando;
          $this->asentando = substr($this->Db->qstr($this->asentando), 1, -1); 
          if ($this->asentando == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->asentando = "null"; 
              $NM_val_null[] = "asentando";
          } 
          $this->nrocomven_before_qstr = $this->nrocomven;
          $this->nrocomven = substr($this->Db->qstr($this->nrocomven), 1, -1); 
          if ($this->nrocomven == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nrocomven = "null"; 
              $NM_val_null[] = "nrocomven";
          } 
          $this->nrofacteq_before_qstr = $this->nrofacteq;
          $this->nrofacteq = substr($this->Db->qstr($this->nrofacteq), 1, -1); 
          if ($this->nrofacteq == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nrofacteq = "null"; 
              $NM_val_null[] = "nrofacteq";
          } 
          $this->comexp_before_qstr = $this->comexp;
          $this->comexp = substr($this->Db->qstr($this->comexp), 1, -1); 
          if ($this->comexp == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->comexp = "null"; 
              $NM_val_null[] = "comexp";
          } 
          if ($this->fecreclamo == "")  
          { 
              $this->fecreclamo = "null"; 
              $NM_val_null[] = "fecreclamo";
          } 
          $this->chequeado_before_qstr = $this->chequeado;
          $this->chequeado = substr($this->Db->qstr($this->chequeado), 1, -1); 
          if ($this->chequeado == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->chequeado = "null"; 
              $NM_val_null[] = "chequeado";
          } 
          $this->factrempost_before_qstr = $this->factrempost;
          $this->factrempost = substr($this->Db->qstr($this->factrempost), 1, -1); 
          if ($this->factrempost == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->factrempost = "null"; 
              $NM_val_null[] = "factrempost";
          } 
          $this->cambiodespachar_a_before_qstr = $this->cambiodespachar_a;
          $this->cambiodespachar_a = substr($this->Db->qstr($this->cambiodespachar_a), 1, -1); 
          if ($this->cambiodespachar_a == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cambiodespachar_a = "null"; 
              $NM_val_null[] = "cambiodespachar_a";
          } 
          if ($this->fechacorte == "")  
          { 
              $this->fechacorte = "null"; 
              $NM_val_null[] = "fechacorte";
          } 
          $this->descuento_total_before_qstr = $this->descuento_total;
          $this->descuento_total = substr($this->Db->qstr($this->descuento_total), 1, -1); 
          if ($this->descuento_total == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->descuento_total = "null"; 
              $NM_val_null[] = "descuento_total";
          } 
          $this->sn_estado_before_qstr = $this->sn_estado;
          $this->sn_estado = substr($this->Db->qstr($this->sn_estado), 1, -1); 
          if ($this->sn_estado == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sn_estado = "null"; 
              $NM_val_null[] = "sn_estado";
          } 
          if ($this->sn_festado == "")  
          { 
              $this->sn_festado = "null"; 
              $NM_val_null[] = "sn_festado";
          } 
          $this->sn_tienecot_before_qstr = $this->sn_tienecot;
          $this->sn_tienecot = substr($this->Db->qstr($this->sn_tienecot), 1, -1); 
          if ($this->sn_tienecot == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sn_tienecot = "null"; 
              $NM_val_null[] = "sn_tienecot";
          } 
          $this->sn_npago_before_qstr = $this->sn_npago;
          $this->sn_npago = substr($this->Db->qstr($this->sn_npago), 1, -1); 
          if ($this->sn_npago == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sn_npago = "null"; 
              $NM_val_null[] = "sn_npago";
          } 
          $this->sn_cufe_before_qstr = $this->sn_cufe;
          $this->sn_cufe = substr($this->Db->qstr($this->sn_cufe), 1, -1); 
          if ($this->sn_cufe == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sn_cufe = "null"; 
              $NM_val_null[] = "sn_cufe";
          } 
          $this->sn_pjfe_before_qstr = $this->sn_pjfe;
          $this->sn_pjfe = substr($this->Db->qstr($this->sn_pjfe), 1, -1); 
          if ($this->sn_pjfe == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sn_pjfe = "null"; 
              $NM_val_null[] = "sn_pjfe";
          } 
          $this->sn_rutaqr_before_qstr = $this->sn_rutaqr;
          $this->sn_rutaqr = substr($this->Db->qstr($this->sn_rutaqr), 1, -1); 
          if ($this->sn_rutaqr == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sn_rutaqr = "null"; 
              $NM_val_null[] = "sn_rutaqr";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where KARDEXID = $this->kardexid ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where KARDEXID = $this->kardexid "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where KARDEXID = $this->kardexid ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where KARDEXID = $this->kardexid "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_KARDEX_mob_pack_ajax_response();
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
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "CODCOMP = '$this->codcomp', CODPREFIJO = '$this->codprefijo', NUMERO = '$this->numero', SN_CUFE = '$this->sn_cufe'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "CODCOMP = '$this->codcomp', CODPREFIJO = '$this->codprefijo', NUMERO = '$this->numero', SN_CUFE = '$this->sn_cufe'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "CODCOMP = '$this->codcomp', CODPREFIJO = '$this->codprefijo', NUMERO = '$this->numero', SN_CUFE = '$this->sn_cufe'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "CODCOMP = '$this->codcomp', CODPREFIJO = '$this->codprefijo', NUMERO = '$this->numero', SN_CUFE = '$this->sn_cufe'"; 
              } 
              if (isset($NM_val_form['fecha']) && $NM_val_form['fecha'] != $this->nmgp_dados_select['fecha']) 
              { 
                  $SC_fields_update[] = "FECHA = '$this->fecha'"; 
              } 
              if (isset($NM_val_form['fecasentad']) && $NM_val_form['fecasentad'] != $this->nmgp_dados_select['fecasentad']) 
              { 
                  $SC_fields_update[] = "FECASENTAD = '$this->fecasentad'"; 
              } 
              if (isset($NM_val_form['observ']) && $NM_val_form['observ'] != $this->nmgp_dados_select['observ']) 
              { 
                  $SC_fields_update[] = "OBSERV = '$this->observ'"; 
              } 
              if (isset($NM_val_form['periodo']) && $NM_val_form['periodo'] != $this->nmgp_dados_select['periodo']) 
              { 
                  $SC_fields_update[] = "PERIODO = '$this->periodo'"; 
              } 
              if (isset($NM_val_form['cenid']) && $NM_val_form['cenid'] != $this->nmgp_dados_select['cenid']) 
              { 
                  $SC_fields_update[] = "CENID = $this->cenid"; 
              } 
              if (isset($NM_val_form['areadid']) && $NM_val_form['areadid'] != $this->nmgp_dados_select['areadid']) 
              { 
                  $SC_fields_update[] = "AREADID = $this->areadid"; 
              } 
              if (isset($NM_val_form['sucid']) && $NM_val_form['sucid'] != $this->nmgp_dados_select['sucid']) 
              { 
                  $SC_fields_update[] = "SUCID = $this->sucid"; 
              } 
              if (isset($NM_val_form['cliente']) && $NM_val_form['cliente'] != $this->nmgp_dados_select['cliente']) 
              { 
                  $SC_fields_update[] = "CLIENTE = $this->cliente"; 
              } 
              if (isset($NM_val_form['vendedor']) && $NM_val_form['vendedor'] != $this->nmgp_dados_select['vendedor']) 
              { 
                  $SC_fields_update[] = "VENDEDOR = $this->vendedor"; 
              } 
              if (isset($NM_val_form['formapago']) && $NM_val_form['formapago'] != $this->nmgp_dados_select['formapago']) 
              { 
                  $SC_fields_update[] = "FORMAPAGO = '$this->formapago'"; 
              } 
              if (isset($NM_val_form['plazodias']) && $NM_val_form['plazodias'] != $this->nmgp_dados_select['plazodias']) 
              { 
                  $SC_fields_update[] = "PLAZODIAS = $this->plazodias"; 
              } 
              if (isset($NM_val_form['bcoid']) && $NM_val_form['bcoid'] != $this->nmgp_dados_select['bcoid']) 
              { 
                  $SC_fields_update[] = "BCOID = $this->bcoid"; 
              } 
              if (isset($NM_val_form['tipodoc']) && $NM_val_form['tipodoc'] != $this->nmgp_dados_select['tipodoc']) 
              { 
                  $SC_fields_update[] = "TIPODOC = '$this->tipodoc'"; 
              } 
              if (isset($NM_val_form['documento']) && $NM_val_form['documento'] != $this->nmgp_dados_select['documento']) 
              { 
                  $SC_fields_update[] = "DOCUMENTO = '$this->documento'"; 
              } 
              if (isset($NM_val_form['concepto']) && $NM_val_form['concepto'] != $this->nmgp_dados_select['concepto']) 
              { 
                  $SC_fields_update[] = "CONCEPTO = $this->concepto"; 
              } 
              if (isset($NM_val_form['fecvence']) && $NM_val_form['fecvence'] != $this->nmgp_dados_select['fecvence']) 
              { 
                  $SC_fields_update[] = "FECVENCE = '$this->fecvence'"; 
              } 
              if (isset($NM_val_form['retiva']) && $NM_val_form['retiva'] != $this->nmgp_dados_select['retiva']) 
              { 
                  $SC_fields_update[] = "RETIVA = $this->retiva"; 
              } 
              if (isset($NM_val_form['retica']) && $NM_val_form['retica'] != $this->nmgp_dados_select['retica']) 
              { 
                  $SC_fields_update[] = "RETICA = $this->retica"; 
              } 
              if (isset($NM_val_form['retfte']) && $NM_val_form['retfte'] != $this->nmgp_dados_select['retfte']) 
              { 
                  $SC_fields_update[] = "RETFTE = $this->retfte"; 
              } 
              if (isset($NM_val_form['ajustebase']) && $NM_val_form['ajustebase'] != $this->nmgp_dados_select['ajustebase']) 
              { 
                  $SC_fields_update[] = "AJUSTEBASE = $this->ajustebase"; 
              } 
              if (isset($NM_val_form['ajusteiva']) && $NM_val_form['ajusteiva'] != $this->nmgp_dados_select['ajusteiva']) 
              { 
                  $SC_fields_update[] = "AJUSTEIVA = $this->ajusteiva"; 
              } 
              if (isset($NM_val_form['ajusteivaexc']) && $NM_val_form['ajusteivaexc'] != $this->nmgp_dados_select['ajusteivaexc']) 
              { 
                  $SC_fields_update[] = "AJUSTEIVAEXC = $this->ajusteivaexc"; 
              } 
              if (isset($NM_val_form['ajusteneto']) && $NM_val_form['ajusteneto'] != $this->nmgp_dados_select['ajusteneto']) 
              { 
                  $SC_fields_update[] = "AJUSTENETO = $this->ajusteneto"; 
              } 
              if (isset($NM_val_form['vrbase']) && $NM_val_form['vrbase'] != $this->nmgp_dados_select['vrbase']) 
              { 
                  $SC_fields_update[] = "VRBASE = $this->vrbase"; 
              } 
              if (isset($NM_val_form['vriva']) && $NM_val_form['vriva'] != $this->nmgp_dados_select['vriva']) 
              { 
                  $SC_fields_update[] = "VRIVA = $this->vriva"; 
              } 
              if (isset($NM_val_form['vriconsumo']) && $NM_val_form['vriconsumo'] != $this->nmgp_dados_select['vriconsumo']) 
              { 
                  $SC_fields_update[] = "VRICONSUMO = $this->vriconsumo"; 
              } 
              if (isset($NM_val_form['vrrfte']) && $NM_val_form['vrrfte'] != $this->nmgp_dados_select['vrrfte']) 
              { 
                  $SC_fields_update[] = "VRRFTE = $this->vrrfte"; 
              } 
              if (isset($NM_val_form['vrrica']) && $NM_val_form['vrrica'] != $this->nmgp_dados_select['vrrica']) 
              { 
                  $SC_fields_update[] = "VRRICA = $this->vrrica"; 
              } 
              if (isset($NM_val_form['vrriva']) && $NM_val_form['vrriva'] != $this->nmgp_dados_select['vrriva']) 
              { 
                  $SC_fields_update[] = "VRRIVA = $this->vrriva"; 
              } 
              if (isset($NM_val_form['total']) && $NM_val_form['total'] != $this->nmgp_dados_select['total']) 
              { 
                  $SC_fields_update[] = "TOTAL = $this->total"; 
              } 
              if (isset($NM_val_form['docuid']) && $NM_val_form['docuid'] != $this->nmgp_dados_select['docuid']) 
              { 
                  $SC_fields_update[] = "DOCUID = $this->docuid"; 
              } 
              if (isset($NM_val_form['fpcontado']) && $NM_val_form['fpcontado'] != $this->nmgp_dados_select['fpcontado']) 
              { 
                  $SC_fields_update[] = "FPCONTADO = $this->fpcontado"; 
              } 
              if (isset($NM_val_form['fpcredito']) && $NM_val_form['fpcredito'] != $this->nmgp_dados_select['fpcredito']) 
              { 
                  $SC_fields_update[] = "FPCREDITO = $this->fpcredito"; 
              } 
              if (isset($NM_val_form['despachar_a']) && $NM_val_form['despachar_a'] != $this->nmgp_dados_select['despachar_a']) 
              { 
                  $SC_fields_update[] = "DESPACHAR_A = $this->despachar_a"; 
              } 
              if (isset($NM_val_form['usuario']) && $NM_val_form['usuario'] != $this->nmgp_dados_select['usuario']) 
              { 
                  $SC_fields_update[] = "USUARIO = '$this->usuario'"; 
              } 
              if (isset($NM_val_form['hora']) && $NM_val_form['hora'] != $this->nmgp_dados_select['hora']) 
              { 
                  $SC_fields_update[] = "HORA = '$this->hora'"; 
              } 
              if (isset($NM_val_form['factorconv']) && $NM_val_form['factorconv'] != $this->nmgp_dados_select['factorconv']) 
              { 
                  $SC_fields_update[] = "FACTORCONV = $this->factorconv"; 
              } 
              if (isset($NM_val_form['nrofacprov']) && $NM_val_form['nrofacprov'] != $this->nmgp_dados_select['nrofacprov']) 
              { 
                  $SC_fields_update[] = "NROFACPROV = '$this->nrofacprov'"; 
              } 
              if (isset($NM_val_form['vehiculoid']) && $NM_val_form['vehiculoid'] != $this->nmgp_dados_select['vehiculoid']) 
              { 
                  $SC_fields_update[] = "VEHICULOID = $this->vehiculoid"; 
              } 
              if (isset($NM_val_form['fecanulado']) && $NM_val_form['fecanulado'] != $this->nmgp_dados_select['fecanulado']) 
              { 
                  $SC_fields_update[] = "FECANULADO = '$this->fecanulado'"; 
              } 
              if (isset($NM_val_form['desxcambio']) && $NM_val_form['desxcambio'] != $this->nmgp_dados_select['desxcambio']) 
              { 
                  $SC_fields_update[] = "DESXCAMBIO = $this->desxcambio"; 
              } 
              if (isset($NM_val_form['devolxcambio']) && $NM_val_form['devolxcambio'] != $this->nmgp_dados_select['devolxcambio']) 
              { 
                  $SC_fields_update[] = "DEVOLXCAMBIO = $this->devolxcambio"; 
              } 
              if (isset($NM_val_form['tipoica2id']) && $NM_val_form['tipoica2id'] != $this->nmgp_dados_select['tipoica2id']) 
              { 
                  $SC_fields_update[] = "TIPOICA2ID = $this->tipoica2id"; 
              } 
              if (isset($NM_val_form['moneda']) && $NM_val_form['moneda'] != $this->nmgp_dados_select['moneda']) 
              { 
                  $SC_fields_update[] = "MONEDA = '$this->moneda'"; 
              } 
              if (isset($NM_val_form['nrocontrol']) && $NM_val_form['nrocontrol'] != $this->nmgp_dados_select['nrocontrol']) 
              { 
                  $SC_fields_update[] = "NROCONTROL = '$this->nrocontrol'"; 
              } 
              if (isset($NM_val_form['prontopago']) && $NM_val_form['prontopago'] != $this->nmgp_dados_select['prontopago']) 
              { 
                  $SC_fields_update[] = "PRONTOPAGO = '$this->prontopago'"; 
              } 
              if (isset($NM_val_form['motivodevid']) && $NM_val_form['motivodevid'] != $this->nmgp_dados_select['motivodevid']) 
              { 
                  $SC_fields_update[] = "MOTIVODEVID = $this->motivodevid"; 
              } 
              if (isset($NM_val_form['impresa']) && $NM_val_form['impresa'] != $this->nmgp_dados_select['impresa']) 
              { 
                  $SC_fields_update[] = "IMPRESA = '$this->impresa'"; 
              } 
              if (isset($NM_val_form['horacrea']) && $NM_val_form['horacrea'] != $this->nmgp_dados_select['horacrea']) 
              { 
                  $SC_fields_update[] = "HORACREA = '$this->horacrea'"; 
              } 
              if (isset($NM_val_form['punxven']) && $NM_val_form['punxven'] != $this->nmgp_dados_select['punxven']) 
              { 
                  $SC_fields_update[] = "PUNXVEN = $this->punxven"; 
              } 
              if (isset($NM_val_form['exportacion']) && $NM_val_form['exportacion'] != $this->nmgp_dados_select['exportacion']) 
              { 
                  $SC_fields_update[] = "EXPORTACION = '$this->exportacion'"; 
              } 
              if (isset($NM_val_form['anticipo']) && $NM_val_form['anticipo'] != $this->nmgp_dados_select['anticipo']) 
              { 
                  $SC_fields_update[] = "ANTICIPO = $this->anticipo"; 
              } 
              if (isset($NM_val_form['importado']) && $NM_val_form['importado'] != $this->nmgp_dados_select['importado']) 
              { 
                  $SC_fields_update[] = "IMPORTADO = '$this->importado'"; 
              } 
              if (isset($NM_val_form['horacomanda']) && $NM_val_form['horacomanda'] != $this->nmgp_dados_select['horacomanda']) 
              { 
                  $SC_fields_update[] = "HORACOMANDA = '$this->horacomanda'"; 
              } 
              if (isset($NM_val_form['fecemi']) && $NM_val_form['fecemi'] != $this->nmgp_dados_select['fecemi']) 
              { 
                  $SC_fields_update[] = "FECEMI = '$this->fecemi'"; 
              } 
              if (isset($NM_val_form['anticipoadic']) && $NM_val_form['anticipoadic'] != $this->nmgp_dados_select['anticipoadic']) 
              { 
                  $SC_fields_update[] = "ANTICIPOADIC = $this->anticipoadic"; 
              } 
              if (isset($NM_val_form['reciboid']) && $NM_val_form['reciboid'] != $this->nmgp_dados_select['reciboid']) 
              { 
                  $SC_fields_update[] = "RECIBOID = $this->reciboid"; 
              } 
              if (isset($NM_val_form['impnotent']) && $NM_val_form['impnotent'] != $this->nmgp_dados_select['impnotent']) 
              { 
                  $SC_fields_update[] = "IMPNOTENT = '$this->impnotent'"; 
              } 
              if (isset($NM_val_form['motivocierre']) && $NM_val_form['motivocierre'] != $this->nmgp_dados_select['motivocierre']) 
              { 
                  $SC_fields_update[] = "MOTIVOCIERRE = $this->motivocierre"; 
              } 
              if (isset($NM_val_form['contrato']) && $NM_val_form['contrato'] != $this->nmgp_dados_select['contrato']) 
              { 
                  $SC_fields_update[] = "CONTRATO = '$this->contrato'"; 
              } 
              if (isset($NM_val_form['vrivaexc']) && $NM_val_form['vrivaexc'] != $this->nmgp_dados_select['vrivaexc']) 
              { 
                  $SC_fields_update[] = "VRIVAEXC = $this->vrivaexc"; 
              } 
              if (isset($NM_val_form['propina']) && $NM_val_form['propina'] != $this->nmgp_dados_select['propina']) 
              { 
                  $SC_fields_update[] = "PROPINA = $this->propina"; 
              } 
              if (isset($NM_val_form['contratoinmid']) && $NM_val_form['contratoinmid'] != $this->nmgp_dados_select['contratoinmid']) 
              { 
                  $SC_fields_update[] = "CONTRATOINMID = $this->contratoinmid"; 
              } 
              if (isset($NM_val_form['cantclientes']) && $NM_val_form['cantclientes'] != $this->nmgp_dados_select['cantclientes']) 
              { 
                  $SC_fields_update[] = "CANTCLIENTES = $this->cantclientes"; 
              } 
              if (isset($NM_val_form['periodofact']) && $NM_val_form['periodofact'] != $this->nmgp_dados_select['periodofact']) 
              { 
                  $SC_fields_update[] = "PERIODOFACT = '$this->periodofact'"; 
              } 
              if (isset($NM_val_form['anofact']) && $NM_val_form['anofact'] != $this->nmgp_dados_select['anofact']) 
              { 
                  $SC_fields_update[] = "ANOFACT = '$this->anofact'"; 
              } 
              if (isset($NM_val_form['contratoid']) && $NM_val_form['contratoid'] != $this->nmgp_dados_select['contratoid']) 
              { 
                  $SC_fields_update[] = "CONTRATOID = $this->contratoid"; 
              } 
              if (isset($NM_val_form['apartado']) && $NM_val_form['apartado'] != $this->nmgp_dados_select['apartado']) 
              { 
                  $SC_fields_update[] = "APARTADO = '$this->apartado'"; 
              } 
              if (isset($NM_val_form['fechaent']) && $NM_val_form['fechaent'] != $this->nmgp_dados_select['fechaent']) 
              { 
                  $SC_fields_update[] = "FECHAENT = '$this->fechaent'"; 
              } 
              if (isset($NM_val_form['horaent']) && $NM_val_form['horaent'] != $this->nmgp_dados_select['horaent']) 
              { 
                  $SC_fields_update[] = "HORAENT = '$this->horaent'"; 
              } 
              if (isset($NM_val_form['asentando']) && $NM_val_form['asentando'] != $this->nmgp_dados_select['asentando']) 
              { 
                  $SC_fields_update[] = "ASENTANDO = '$this->asentando'"; 
              } 
              if (isset($NM_val_form['retcree']) && $NM_val_form['retcree'] != $this->nmgp_dados_select['retcree']) 
              { 
                  $SC_fields_update[] = "RETCREE = $this->retcree"; 
              } 
              if (isset($NM_val_form['vrrcree']) && $NM_val_form['vrrcree'] != $this->nmgp_dados_select['vrrcree']) 
              { 
                  $SC_fields_update[] = "VRRCREE = $this->vrrcree"; 
              } 
              if (isset($NM_val_form['tipocreeid']) && $NM_val_form['tipocreeid'] != $this->nmgp_dados_select['tipocreeid']) 
              { 
                  $SC_fields_update[] = "TIPOCREEID = $this->tipocreeid"; 
              } 
              if (isset($NM_val_form['nrocomven']) && $NM_val_form['nrocomven'] != $this->nmgp_dados_select['nrocomven']) 
              { 
                  $SC_fields_update[] = "NROCOMVEN = '$this->nrocomven'"; 
              } 
              if (isset($NM_val_form['nrofacteq']) && $NM_val_form['nrofacteq'] != $this->nmgp_dados_select['nrofacteq']) 
              { 
                  $SC_fields_update[] = "NROFACTEQ = '$this->nrofacteq'"; 
              } 
              if (isset($NM_val_form['porcutiaiu']) && $NM_val_form['porcutiaiu'] != $this->nmgp_dados_select['porcutiaiu']) 
              { 
                  $SC_fields_update[] = "PORCUTIAIU = $this->porcutiaiu"; 
              } 
              if (isset($NM_val_form['comexp']) && $NM_val_form['comexp'] != $this->nmgp_dados_select['comexp']) 
              { 
                  $SC_fields_update[] = "COMEXP = '$this->comexp'"; 
              } 
              if (isset($NM_val_form['fecreclamo']) && $NM_val_form['fecreclamo'] != $this->nmgp_dados_select['fecreclamo']) 
              { 
                  $SC_fields_update[] = "FECRECLAMO = '$this->fecreclamo'"; 
              } 
              if (isset($NM_val_form['motreclamo']) && $NM_val_form['motreclamo'] != $this->nmgp_dados_select['motreclamo']) 
              { 
                  $SC_fields_update[] = "MOTRECLAMO = $this->motreclamo"; 
              } 
              if (isset($NM_val_form['chequeado']) && $NM_val_form['chequeado'] != $this->nmgp_dados_select['chequeado']) 
              { 
                  $SC_fields_update[] = "CHEQUEADO = '$this->chequeado'"; 
              } 
              if (isset($NM_val_form['factrempost']) && $NM_val_form['factrempost'] != $this->nmgp_dados_select['factrempost']) 
              { 
                  $SC_fields_update[] = "FACTREMPOST = '$this->factrempost'"; 
              } 
              if (isset($NM_val_form['cambiodespachar_a']) && $NM_val_form['cambiodespachar_a'] != $this->nmgp_dados_select['cambiodespachar_a']) 
              { 
                  $SC_fields_update[] = "CAMBIODESPACHAR_A = '$this->cambiodespachar_a'"; 
              } 
              if (isset($NM_val_form['fechacorte']) && $NM_val_form['fechacorte'] != $this->nmgp_dados_select['fechacorte']) 
              { 
                  $SC_fields_update[] = "FECHACORTE = '$this->fechacorte'"; 
              } 
              if (isset($NM_val_form['descuento_total']) && $NM_val_form['descuento_total'] != $this->nmgp_dados_select['descuento_total']) 
              { 
                  $SC_fields_update[] = "DESCUENTO_TOTAL = '$this->descuento_total'"; 
              } 
              if (isset($NM_val_form['sn_estado']) && $NM_val_form['sn_estado'] != $this->nmgp_dados_select['sn_estado']) 
              { 
                  $SC_fields_update[] = "SN_ESTADO = '$this->sn_estado'"; 
              } 
              if (isset($NM_val_form['sn_festado']) && $NM_val_form['sn_festado'] != $this->nmgp_dados_select['sn_festado']) 
              { 
                  $SC_fields_update[] = "SN_FESTADO = '$this->sn_festado'"; 
              } 
              if (isset($NM_val_form['sn_tienecot']) && $NM_val_form['sn_tienecot'] != $this->nmgp_dados_select['sn_tienecot']) 
              { 
                  $SC_fields_update[] = "SN_TIENECOT = '$this->sn_tienecot'"; 
              } 
              if (isset($NM_val_form['sn_saldo']) && $NM_val_form['sn_saldo'] != $this->nmgp_dados_select['sn_saldo']) 
              { 
                  $SC_fields_update[] = "SN_SALDO = $this->sn_saldo"; 
              } 
              if (isset($NM_val_form['sn_npago']) && $NM_val_form['sn_npago'] != $this->nmgp_dados_select['sn_npago']) 
              { 
                  $SC_fields_update[] = "SN_NPAGO = '$this->sn_npago'"; 
              } 
              if (isset($NM_val_form['sn_ticket']) && $NM_val_form['sn_ticket'] != $this->nmgp_dados_select['sn_ticket']) 
              { 
                  $SC_fields_update[] = "SN_TICKET = $this->sn_ticket"; 
              } 
              if (isset($NM_val_form['sn_pjfe']) && $NM_val_form['sn_pjfe'] != $this->nmgp_dados_select['sn_pjfe']) 
              { 
                  $SC_fields_update[] = "SN_PJFE = '$this->sn_pjfe'"; 
              } 
              if (isset($NM_val_form['sn_rutaqr']) && $NM_val_form['sn_rutaqr'] != $this->nmgp_dados_select['sn_rutaqr']) 
              { 
                  $SC_fields_update[] = "SN_RUTAQR = '$this->sn_rutaqr'"; 
              } 
              if (isset($NM_val_form['sn_consecutivo']) && $NM_val_form['sn_consecutivo'] != $this->nmgp_dados_select['sn_consecutivo']) 
              { 
                  $SC_fields_update[] = "SN_CONSECUTIVO = $this->sn_consecutivo"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE KARDEXID = $this->kardexid ";  
              }  
              else  
              {
                  $comando .= " WHERE KARDEXID = $this->kardexid ";  
              }  
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
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
                                  form_KARDEX_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->codcomp = $this->codcomp_before_qstr;
              $this->codprefijo = $this->codprefijo_before_qstr;
              $this->numero = $this->numero_before_qstr;
              $this->observ = $this->observ_before_qstr;
              $this->periodo = $this->periodo_before_qstr;
              $this->formapago = $this->formapago_before_qstr;
              $this->tipodoc = $this->tipodoc_before_qstr;
              $this->documento = $this->documento_before_qstr;
              $this->usuario = $this->usuario_before_qstr;
              $this->hora = $this->hora_before_qstr;
              $this->nrofacprov = $this->nrofacprov_before_qstr;
              $this->moneda = $this->moneda_before_qstr;
              $this->nrocontrol = $this->nrocontrol_before_qstr;
              $this->prontopago = $this->prontopago_before_qstr;
              $this->impresa = $this->impresa_before_qstr;
              $this->horacrea = $this->horacrea_before_qstr;
              $this->exportacion = $this->exportacion_before_qstr;
              $this->importado = $this->importado_before_qstr;
              $this->horacomanda = $this->horacomanda_before_qstr;
              $this->impnotent = $this->impnotent_before_qstr;
              $this->contrato = $this->contrato_before_qstr;
              $this->periodofact = $this->periodofact_before_qstr;
              $this->anofact = $this->anofact_before_qstr;
              $this->apartado = $this->apartado_before_qstr;
              $this->horaent = $this->horaent_before_qstr;
              $this->asentando = $this->asentando_before_qstr;
              $this->nrocomven = $this->nrocomven_before_qstr;
              $this->nrofacteq = $this->nrofacteq_before_qstr;
              $this->comexp = $this->comexp_before_qstr;
              $this->chequeado = $this->chequeado_before_qstr;
              $this->factrempost = $this->factrempost_before_qstr;
              $this->cambiodespachar_a = $this->cambiodespachar_a_before_qstr;
              $this->descuento_total = $this->descuento_total_before_qstr;
              $this->sn_estado = $this->sn_estado_before_qstr;
              $this->sn_tienecot = $this->sn_tienecot_before_qstr;
              $this->sn_npago = $this->sn_npago_before_qstr;
              $this->sn_cufe = $this->sn_cufe_before_qstr;
              $this->sn_pjfe = $this->sn_pjfe_before_qstr;
              $this->sn_rutaqr = $this->sn_rutaqr_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['kardexid'])) { $this->kardexid = $NM_val_form['kardexid']; }
              elseif (isset($this->kardexid)) { $this->nm_limpa_alfa($this->kardexid); }
              if     (isset($NM_val_form) && isset($NM_val_form['codcomp'])) { $this->codcomp = $NM_val_form['codcomp']; }
              elseif (isset($this->codcomp)) { $this->nm_limpa_alfa($this->codcomp); }
              if     (isset($NM_val_form) && isset($NM_val_form['codprefijo'])) { $this->codprefijo = $NM_val_form['codprefijo']; }
              elseif (isset($this->codprefijo)) { $this->nm_limpa_alfa($this->codprefijo); }
              if     (isset($NM_val_form) && isset($NM_val_form['numero'])) { $this->numero = $NM_val_form['numero']; }
              elseif (isset($this->numero)) { $this->nm_limpa_alfa($this->numero); }
              if     (isset($NM_val_form) && isset($NM_val_form['sn_cufe'])) { $this->sn_cufe = $NM_val_form['sn_cufe']; }
              elseif (isset($this->sn_cufe)) { $this->nm_limpa_alfa($this->sn_cufe); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('kardexid', 'codcomp', 'codprefijo', 'numero', 'sn_cufe'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          { 
              $NM_seq_auto = "nextval('KARDEXID_GEN'), ";
              $NM_cmp_auto = "KARDEXID, ";
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $NM_seq_auto = "gen_id(KARDEXID_GEN, 1), ";
              $NM_cmp_auto = "KARDEXID, ";
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "KARDEXID, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_KARDEX_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (CODCOMP, CODPREFIJO, NUMERO, FECHA, FECASENTAD, OBSERV, PERIODO, CENID, AREADID, SUCID, CLIENTE, VENDEDOR, FORMAPAGO, PLAZODIAS, BCOID, TIPODOC, DOCUMENTO, CONCEPTO, FECVENCE, RETIVA, RETICA, RETFTE, AJUSTEBASE, AJUSTEIVA, AJUSTEIVAEXC, AJUSTENETO, VRBASE, VRIVA, VRICONSUMO, VRRFTE, VRRICA, VRRIVA, TOTAL, DOCUID, FPCONTADO, FPCREDITO, DESPACHAR_A, USUARIO, HORA, FACTORCONV, NROFACPROV, VEHICULOID, FECANULADO, DESXCAMBIO, DEVOLXCAMBIO, TIPOICA2ID, MONEDA, NROCONTROL, PRONTOPAGO, MOTIVODEVID, IMPRESA, HORACREA, PUNXVEN, EXPORTACION, ANTICIPO, IMPORTADO, HORACOMANDA, FECEMI, ANTICIPOADIC, RECIBOID, IMPNOTENT, MOTIVOCIERRE, CONTRATO, VRIVAEXC, PROPINA, CONTRATOINMID, CANTCLIENTES, PERIODOFACT, ANOFACT, CONTRATOID, APARTADO, FECHAENT, HORAENT, ASENTANDO, RETCREE, VRRCREE, TIPOCREEID, NROCOMVEN, NROFACTEQ, PORCUTIAIU, COMEXP, FECRECLAMO, MOTRECLAMO, CHEQUEADO, FACTREMPOST, CAMBIODESPACHAR_A, FECHACORTE, DESCUENTO_TOTAL, SN_ESTADO, SN_FESTADO, SN_TIENECOT, SN_SALDO, SN_NPAGO, SN_TICKET, SN_CUFE, SN_PJFE, SN_RUTAQR, SN_CONSECUTIVO) VALUES ('$this->codcomp', '$this->codprefijo', '$this->numero', '$this->fecha', '$this->fecasentad', '$this->observ', '$this->periodo', $this->cenid, $this->areadid, $this->sucid, $this->cliente, $this->vendedor, '$this->formapago', $this->plazodias, $this->bcoid, '$this->tipodoc', '$this->documento', $this->concepto, '$this->fecvence', $this->retiva, $this->retica, $this->retfte, $this->ajustebase, $this->ajusteiva, $this->ajusteivaexc, $this->ajusteneto, $this->vrbase, $this->vriva, $this->vriconsumo, $this->vrrfte, $this->vrrica, $this->vrriva, $this->total, $this->docuid, $this->fpcontado, $this->fpcredito, $this->despachar_a, '$this->usuario', '$this->hora', $this->factorconv, '$this->nrofacprov', $this->vehiculoid, '$this->fecanulado', $this->desxcambio, $this->devolxcambio, $this->tipoica2id, '$this->moneda', '$this->nrocontrol', '$this->prontopago', $this->motivodevid, '$this->impresa', '$this->horacrea', $this->punxven, '$this->exportacion', $this->anticipo, '$this->importado', '$this->horacomanda', '$this->fecemi', $this->anticipoadic, $this->reciboid, '$this->impnotent', $this->motivocierre, '$this->contrato', $this->vrivaexc, $this->propina, $this->contratoinmid, $this->cantclientes, '$this->periodofact', '$this->anofact', $this->contratoid, '$this->apartado', '$this->fechaent', '$this->horaent', '$this->asentando', $this->retcree, $this->vrrcree, $this->tipocreeid, '$this->nrocomven', '$this->nrofacteq', $this->porcutiaiu, '$this->comexp', '$this->fecreclamo', $this->motreclamo, '$this->chequeado', '$this->factrempost', '$this->cambiodespachar_a', '$this->fechacorte', '$this->descuento_total', '$this->sn_estado', '$this->sn_festado', '$this->sn_tienecot', $this->sn_saldo, '$this->sn_npago', $this->sn_ticket, '$this->sn_cufe', '$this->sn_pjfe', '$this->sn_rutaqr', $this->sn_consecutivo)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "CODCOMP, CODPREFIJO, NUMERO, FECHA, FECASENTAD, OBSERV, PERIODO, CENID, AREADID, SUCID, CLIENTE, VENDEDOR, FORMAPAGO, PLAZODIAS, BCOID, TIPODOC, DOCUMENTO, CONCEPTO, FECVENCE, RETIVA, RETICA, RETFTE, AJUSTEBASE, AJUSTEIVA, AJUSTEIVAEXC, AJUSTENETO, VRBASE, VRIVA, VRICONSUMO, VRRFTE, VRRICA, VRRIVA, TOTAL, DOCUID, FPCONTADO, FPCREDITO, DESPACHAR_A, USUARIO, HORA, FACTORCONV, NROFACPROV, VEHICULOID, FECANULADO, DESXCAMBIO, DEVOLXCAMBIO, TIPOICA2ID, MONEDA, NROCONTROL, PRONTOPAGO, MOTIVODEVID, IMPRESA, HORACREA, PUNXVEN, EXPORTACION, ANTICIPO, IMPORTADO, HORACOMANDA, FECEMI, ANTICIPOADIC, RECIBOID, IMPNOTENT, MOTIVOCIERRE, CONTRATO, VRIVAEXC, PROPINA, CONTRATOINMID, CANTCLIENTES, PERIODOFACT, ANOFACT, CONTRATOID, APARTADO, FECHAENT, HORAENT, ASENTANDO, RETCREE, VRRCREE, TIPOCREEID, NROCOMVEN, NROFACTEQ, PORCUTIAIU, COMEXP, FECRECLAMO, MOTRECLAMO, CHEQUEADO, FACTREMPOST, CAMBIODESPACHAR_A, FECHACORTE, DESCUENTO_TOTAL, SN_ESTADO, SN_FESTADO, SN_TIENECOT, SN_SALDO, SN_NPAGO, SN_TICKET, SN_CUFE, SN_PJFE, SN_RUTAQR, SN_CONSECUTIVO) VALUES (" . $NM_seq_auto . "'$this->codcomp', '$this->codprefijo', '$this->numero', '$this->fecha', '$this->fecasentad', '$this->observ', '$this->periodo', $this->cenid, $this->areadid, $this->sucid, $this->cliente, $this->vendedor, '$this->formapago', $this->plazodias, $this->bcoid, '$this->tipodoc', '$this->documento', $this->concepto, '$this->fecvence', $this->retiva, $this->retica, $this->retfte, $this->ajustebase, $this->ajusteiva, $this->ajusteivaexc, $this->ajusteneto, $this->vrbase, $this->vriva, $this->vriconsumo, $this->vrrfte, $this->vrrica, $this->vrriva, $this->total, $this->docuid, $this->fpcontado, $this->fpcredito, $this->despachar_a, '$this->usuario', '$this->hora', $this->factorconv, '$this->nrofacprov', $this->vehiculoid, '$this->fecanulado', $this->desxcambio, $this->devolxcambio, $this->tipoica2id, '$this->moneda', '$this->nrocontrol', '$this->prontopago', $this->motivodevid, '$this->impresa', '$this->horacrea', $this->punxven, '$this->exportacion', $this->anticipo, '$this->importado', '$this->horacomanda', '$this->fecemi', $this->anticipoadic, $this->reciboid, '$this->impnotent', $this->motivocierre, '$this->contrato', $this->vrivaexc, $this->propina, $this->contratoinmid, $this->cantclientes, '$this->periodofact', '$this->anofact', $this->contratoid, '$this->apartado', '$this->fechaent', '$this->horaent', '$this->asentando', $this->retcree, $this->vrrcree, $this->tipocreeid, '$this->nrocomven', '$this->nrofacteq', $this->porcutiaiu, '$this->comexp', '$this->fecreclamo', $this->motreclamo, '$this->chequeado', '$this->factrempost', '$this->cambiodespachar_a', '$this->fechacorte', '$this->descuento_total', '$this->sn_estado', '$this->sn_festado', '$this->sn_tienecot', $this->sn_saldo, '$this->sn_npago', $this->sn_ticket, '$this->sn_cufe', '$this->sn_pjfe', '$this->sn_rutaqr', $this->sn_consecutivo)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "CODCOMP, CODPREFIJO, NUMERO, FECHA, FECASENTAD, OBSERV, PERIODO, CENID, AREADID, SUCID, CLIENTE, VENDEDOR, FORMAPAGO, PLAZODIAS, BCOID, TIPODOC, DOCUMENTO, CONCEPTO, FECVENCE, RETIVA, RETICA, RETFTE, AJUSTEBASE, AJUSTEIVA, AJUSTEIVAEXC, AJUSTENETO, VRBASE, VRIVA, VRICONSUMO, VRRFTE, VRRICA, VRRIVA, TOTAL, DOCUID, FPCONTADO, FPCREDITO, DESPACHAR_A, USUARIO, HORA, FACTORCONV, NROFACPROV, VEHICULOID, FECANULADO, DESXCAMBIO, DEVOLXCAMBIO, TIPOICA2ID, MONEDA, NROCONTROL, PRONTOPAGO, MOTIVODEVID, IMPRESA, HORACREA, PUNXVEN, EXPORTACION, ANTICIPO, IMPORTADO, HORACOMANDA, FECEMI, ANTICIPOADIC, RECIBOID, IMPNOTENT, MOTIVOCIERRE, CONTRATO, VRIVAEXC, PROPINA, CONTRATOINMID, CANTCLIENTES, PERIODOFACT, ANOFACT, CONTRATOID, APARTADO, FECHAENT, HORAENT, ASENTANDO, RETCREE, VRRCREE, TIPOCREEID, NROCOMVEN, NROFACTEQ, PORCUTIAIU, COMEXP, FECRECLAMO, MOTRECLAMO, CHEQUEADO, FACTREMPOST, CAMBIODESPACHAR_A, FECHACORTE, DESCUENTO_TOTAL, SN_ESTADO, SN_FESTADO, SN_TIENECOT, SN_SALDO, SN_NPAGO, SN_TICKET, SN_CUFE, SN_PJFE, SN_RUTAQR, SN_CONSECUTIVO) VALUES (" . $NM_seq_auto . "'$this->codcomp', '$this->codprefijo', '$this->numero', '$this->fecha', '$this->fecasentad', '$this->observ', '$this->periodo', $this->cenid, $this->areadid, $this->sucid, $this->cliente, $this->vendedor, '$this->formapago', $this->plazodias, $this->bcoid, '$this->tipodoc', '$this->documento', $this->concepto, '$this->fecvence', $this->retiva, $this->retica, $this->retfte, $this->ajustebase, $this->ajusteiva, $this->ajusteivaexc, $this->ajusteneto, $this->vrbase, $this->vriva, $this->vriconsumo, $this->vrrfte, $this->vrrica, $this->vrriva, $this->total, $this->docuid, $this->fpcontado, $this->fpcredito, $this->despachar_a, '$this->usuario', '$this->hora', $this->factorconv, '$this->nrofacprov', $this->vehiculoid, '$this->fecanulado', $this->desxcambio, $this->devolxcambio, $this->tipoica2id, '$this->moneda', '$this->nrocontrol', '$this->prontopago', $this->motivodevid, '$this->impresa', '$this->horacrea', $this->punxven, '$this->exportacion', $this->anticipo, '$this->importado', '$this->horacomanda', '$this->fecemi', $this->anticipoadic, $this->reciboid, '$this->impnotent', $this->motivocierre, '$this->contrato', $this->vrivaexc, $this->propina, $this->contratoinmid, $this->cantclientes, '$this->periodofact', '$this->anofact', $this->contratoid, '$this->apartado', '$this->fechaent', '$this->horaent', '$this->asentando', $this->retcree, $this->vrrcree, $this->tipocreeid, '$this->nrocomven', '$this->nrofacteq', $this->porcutiaiu, '$this->comexp', '$this->fecreclamo', $this->motreclamo, '$this->chequeado', '$this->factrempost', '$this->cambiodespachar_a', '$this->fechacorte', '$this->descuento_total', '$this->sn_estado', '$this->sn_festado', '$this->sn_tienecot', $this->sn_saldo, '$this->sn_npago', $this->sn_ticket, '$this->sn_cufe', '$this->sn_pjfe', '$this->sn_rutaqr', $this->sn_consecutivo)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "CODCOMP, CODPREFIJO, NUMERO, FECHA, FECASENTAD, OBSERV, PERIODO, CENID, AREADID, SUCID, CLIENTE, VENDEDOR, FORMAPAGO, PLAZODIAS, BCOID, TIPODOC, DOCUMENTO, CONCEPTO, FECVENCE, RETIVA, RETICA, RETFTE, AJUSTEBASE, AJUSTEIVA, AJUSTEIVAEXC, AJUSTENETO, VRBASE, VRIVA, VRICONSUMO, VRRFTE, VRRICA, VRRIVA, TOTAL, DOCUID, FPCONTADO, FPCREDITO, DESPACHAR_A, USUARIO, HORA, FACTORCONV, NROFACPROV, VEHICULOID, FECANULADO, DESXCAMBIO, DEVOLXCAMBIO, TIPOICA2ID, MONEDA, NROCONTROL, PRONTOPAGO, MOTIVODEVID, IMPRESA, HORACREA, PUNXVEN, EXPORTACION, ANTICIPO, IMPORTADO, HORACOMANDA, FECEMI, ANTICIPOADIC, RECIBOID, IMPNOTENT, MOTIVOCIERRE, CONTRATO, VRIVAEXC, PROPINA, CONTRATOINMID, CANTCLIENTES, PERIODOFACT, ANOFACT, CONTRATOID, APARTADO, FECHAENT, HORAENT, ASENTANDO, RETCREE, VRRCREE, TIPOCREEID, NROCOMVEN, NROFACTEQ, PORCUTIAIU, COMEXP, FECRECLAMO, MOTRECLAMO, CHEQUEADO, FACTREMPOST, CAMBIODESPACHAR_A, FECHACORTE, DESCUENTO_TOTAL, SN_ESTADO, SN_FESTADO, SN_TIENECOT, SN_SALDO, SN_NPAGO, SN_TICKET, SN_CUFE, SN_PJFE, SN_RUTAQR, SN_CONSECUTIVO) VALUES (" . $NM_seq_auto . "'$this->codcomp', '$this->codprefijo', '$this->numero', '$this->fecha', '$this->fecasentad', '$this->observ', '$this->periodo', $this->cenid, $this->areadid, $this->sucid, $this->cliente, $this->vendedor, '$this->formapago', $this->plazodias, $this->bcoid, '$this->tipodoc', '$this->documento', $this->concepto, '$this->fecvence', $this->retiva, $this->retica, $this->retfte, $this->ajustebase, $this->ajusteiva, $this->ajusteivaexc, $this->ajusteneto, $this->vrbase, $this->vriva, $this->vriconsumo, $this->vrrfte, $this->vrrica, $this->vrriva, $this->total, $this->docuid, $this->fpcontado, $this->fpcredito, $this->despachar_a, '$this->usuario', '$this->hora', $this->factorconv, '$this->nrofacprov', $this->vehiculoid, '$this->fecanulado', $this->desxcambio, $this->devolxcambio, $this->tipoica2id, '$this->moneda', '$this->nrocontrol', '$this->prontopago', $this->motivodevid, '$this->impresa', '$this->horacrea', $this->punxven, '$this->exportacion', $this->anticipo, '$this->importado', '$this->horacomanda', '$this->fecemi', $this->anticipoadic, $this->reciboid, '$this->impnotent', $this->motivocierre, '$this->contrato', $this->vrivaexc, $this->propina, $this->contratoinmid, $this->cantclientes, '$this->periodofact', '$this->anofact', $this->contratoid, '$this->apartado', '$this->fechaent', '$this->horaent', '$this->asentando', $this->retcree, $this->vrrcree, $this->tipocreeid, '$this->nrocomven', '$this->nrofacteq', $this->porcutiaiu, '$this->comexp', '$this->fecreclamo', $this->motreclamo, '$this->chequeado', '$this->factrempost', '$this->cambiodespachar_a', '$this->fechacorte', '$this->descuento_total', '$this->sn_estado', '$this->sn_festado', '$this->sn_tienecot', $this->sn_saldo, '$this->sn_npago', $this->sn_ticket, '$this->sn_cufe', '$this->sn_pjfe', '$this->sn_rutaqr', $this->sn_consecutivo)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "CODCOMP, CODPREFIJO, NUMERO, FECHA, FECASENTAD, OBSERV, PERIODO, CENID, AREADID, SUCID, CLIENTE, VENDEDOR, FORMAPAGO, PLAZODIAS, BCOID, TIPODOC, DOCUMENTO, CONCEPTO, FECVENCE, RETIVA, RETICA, RETFTE, AJUSTEBASE, AJUSTEIVA, AJUSTEIVAEXC, AJUSTENETO, VRBASE, VRIVA, VRICONSUMO, VRRFTE, VRRICA, VRRIVA, TOTAL, DOCUID, FPCONTADO, FPCREDITO, DESPACHAR_A, USUARIO, HORA, FACTORCONV, NROFACPROV, VEHICULOID, FECANULADO, DESXCAMBIO, DEVOLXCAMBIO, TIPOICA2ID, MONEDA, NROCONTROL, PRONTOPAGO, MOTIVODEVID, IMPRESA, HORACREA, PUNXVEN, EXPORTACION, ANTICIPO, IMPORTADO, HORACOMANDA, FECEMI, ANTICIPOADIC, RECIBOID, IMPNOTENT, MOTIVOCIERRE, CONTRATO, VRIVAEXC, PROPINA, CONTRATOINMID, CANTCLIENTES, PERIODOFACT, ANOFACT, CONTRATOID, APARTADO, FECHAENT, HORAENT, ASENTANDO, RETCREE, VRRCREE, TIPOCREEID, NROCOMVEN, NROFACTEQ, PORCUTIAIU, COMEXP, FECRECLAMO, MOTRECLAMO, CHEQUEADO, FACTREMPOST, CAMBIODESPACHAR_A, FECHACORTE, DESCUENTO_TOTAL, SN_ESTADO, SN_FESTADO, SN_TIENECOT, SN_SALDO, SN_NPAGO, SN_TICKET, SN_CUFE, SN_PJFE, SN_RUTAQR, SN_CONSECUTIVO) VALUES (" . $NM_seq_auto . "'$this->codcomp', '$this->codprefijo', '$this->numero', '$this->fecha', '$this->fecasentad', '$this->observ', '$this->periodo', $this->cenid, $this->areadid, $this->sucid, $this->cliente, $this->vendedor, '$this->formapago', $this->plazodias, $this->bcoid, '$this->tipodoc', '$this->documento', $this->concepto, '$this->fecvence', $this->retiva, $this->retica, $this->retfte, $this->ajustebase, $this->ajusteiva, $this->ajusteivaexc, $this->ajusteneto, $this->vrbase, $this->vriva, $this->vriconsumo, $this->vrrfte, $this->vrrica, $this->vrriva, $this->total, $this->docuid, $this->fpcontado, $this->fpcredito, $this->despachar_a, '$this->usuario', '$this->hora', $this->factorconv, '$this->nrofacprov', $this->vehiculoid, '$this->fecanulado', $this->desxcambio, $this->devolxcambio, $this->tipoica2id, '$this->moneda', '$this->nrocontrol', '$this->prontopago', $this->motivodevid, '$this->impresa', '$this->horacrea', $this->punxven, '$this->exportacion', $this->anticipo, '$this->importado', '$this->horacomanda', '$this->fecemi', $this->anticipoadic, $this->reciboid, '$this->impnotent', $this->motivocierre, '$this->contrato', $this->vrivaexc, $this->propina, $this->contratoinmid, $this->cantclientes, '$this->periodofact', '$this->anofact', $this->contratoid, '$this->apartado', '$this->fechaent', '$this->horaent', '$this->asentando', $this->retcree, $this->vrrcree, $this->tipocreeid, '$this->nrocomven', '$this->nrofacteq', $this->porcutiaiu, '$this->comexp', '$this->fecreclamo', $this->motreclamo, '$this->chequeado', '$this->factrempost', '$this->cambiodespachar_a', '$this->fechacorte', '$this->descuento_total', '$this->sn_estado', '$this->sn_festado', '$this->sn_tienecot', $this->sn_saldo, '$this->sn_npago', $this->sn_ticket, '$this->sn_cufe', '$this->sn_pjfe', '$this->sn_rutaqr', $this->sn_consecutivo)"; 
              }
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
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
                              form_KARDEX_mob_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select @@identity"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_KARDEX_mob_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->kardexid =  $rsy->fields[0];
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
                  $this->kardexid = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select CURRVAL('KARDEXID_GEN')"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->kardexid = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select gen_id(KARDEXID_GEN, 0) from " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->kardexid = $rsy->fields[0];
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
                  $this->kardexid = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->codcomp = $this->codcomp_before_qstr;
              $this->codprefijo = $this->codprefijo_before_qstr;
              $this->numero = $this->numero_before_qstr;
              $this->observ = $this->observ_before_qstr;
              $this->periodo = $this->periodo_before_qstr;
              $this->formapago = $this->formapago_before_qstr;
              $this->tipodoc = $this->tipodoc_before_qstr;
              $this->documento = $this->documento_before_qstr;
              $this->usuario = $this->usuario_before_qstr;
              $this->hora = $this->hora_before_qstr;
              $this->nrofacprov = $this->nrofacprov_before_qstr;
              $this->moneda = $this->moneda_before_qstr;
              $this->nrocontrol = $this->nrocontrol_before_qstr;
              $this->prontopago = $this->prontopago_before_qstr;
              $this->impresa = $this->impresa_before_qstr;
              $this->horacrea = $this->horacrea_before_qstr;
              $this->exportacion = $this->exportacion_before_qstr;
              $this->importado = $this->importado_before_qstr;
              $this->horacomanda = $this->horacomanda_before_qstr;
              $this->impnotent = $this->impnotent_before_qstr;
              $this->contrato = $this->contrato_before_qstr;
              $this->periodofact = $this->periodofact_before_qstr;
              $this->anofact = $this->anofact_before_qstr;
              $this->apartado = $this->apartado_before_qstr;
              $this->horaent = $this->horaent_before_qstr;
              $this->asentando = $this->asentando_before_qstr;
              $this->nrocomven = $this->nrocomven_before_qstr;
              $this->nrofacteq = $this->nrofacteq_before_qstr;
              $this->comexp = $this->comexp_before_qstr;
              $this->chequeado = $this->chequeado_before_qstr;
              $this->factrempost = $this->factrempost_before_qstr;
              $this->cambiodespachar_a = $this->cambiodespachar_a_before_qstr;
              $this->descuento_total = $this->descuento_total_before_qstr;
              $this->sn_estado = $this->sn_estado_before_qstr;
              $this->sn_tienecot = $this->sn_tienecot_before_qstr;
              $this->sn_npago = $this->sn_npago_before_qstr;
              $this->sn_cufe = $this->sn_cufe_before_qstr;
              $this->sn_pjfe = $this->sn_pjfe_before_qstr;
              $this->sn_rutaqr = $this->sn_rutaqr_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->kardexid = substr($this->Db->qstr($this->kardexid), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where KARDEXID = $this->kardexid"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where KARDEXID = $this->kardexid "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where KARDEXID = $this->kardexid"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where KARDEXID = $this->kardexid "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where KARDEXID = $this->kardexid "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where KARDEXID = $this->kardexid "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where KARDEXID = $this->kardexid "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where KARDEXID = $this->kardexid "); 
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
                          form_KARDEX_mob_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['total']);
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
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['parms'] = "kardexid?#?$this->kardexid?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->kardexid = null === $this->kardexid ? null : substr($this->Db->qstr($this->kardexid), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_filter'] . ")";
          }
      }
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "inicio")
      { 
          $this->nmgp_opcao = "igual"; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT KARDEXID, CODCOMP, CODPREFIJO, NUMERO, FECHA, FECASENTAD, OBSERV, PERIODO, CENID, AREADID, SUCID, CLIENTE, VENDEDOR, FORMAPAGO, PLAZODIAS, BCOID, TIPODOC, DOCUMENTO, CONCEPTO, FECVENCE, RETIVA, RETICA, RETFTE, AJUSTEBASE, AJUSTEIVA, AJUSTEIVAEXC, AJUSTENETO, VRBASE, VRIVA, VRICONSUMO, VRRFTE, VRRICA, VRRIVA, TOTAL, DOCUID, FPCONTADO, FPCREDITO, DESPACHAR_A, USUARIO, HORA, FACTORCONV, NROFACPROV, VEHICULOID, FECANULADO, DESXCAMBIO, DEVOLXCAMBIO, TIPOICA2ID, MONEDA, NROCONTROL, PRONTOPAGO, MOTIVODEVID, IMPRESA, HORACREA, PUNXVEN, EXPORTACION, ANTICIPO, IMPORTADO, HORACOMANDA, FECEMI, ANTICIPOADIC, RECIBOID, IMPNOTENT, MOTIVOCIERRE, CONTRATO, VRIVAEXC, PROPINA, CONTRATOINMID, CANTCLIENTES, PERIODOFACT, ANOFACT, CONTRATOID, APARTADO, FECHAENT, HORAENT, ASENTANDO, RETCREE, VRRCREE, TIPOCREEID, NROCOMVEN, NROFACTEQ, PORCUTIAIU, COMEXP, FECRECLAMO, MOTRECLAMO, CHEQUEADO, FACTREMPOST, CAMBIODESPACHAR_A, FECHACORTE, DESCUENTO_TOTAL, SN_ESTADO, SN_FESTADO, SN_TIENECOT, SN_SALDO, SN_NPAGO, SN_TICKET, SN_CUFE, SN_PJFE, SN_RUTAQR, SN_CONSECUTIVO from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT KARDEXID, CODCOMP, CODPREFIJO, NUMERO, FECHA, FECASENTAD, OBSERV, PERIODO, CENID, AREADID, SUCID, CLIENTE, VENDEDOR, FORMAPAGO, PLAZODIAS, BCOID, TIPODOC, DOCUMENTO, CONCEPTO, FECVENCE, RETIVA, RETICA, RETFTE, AJUSTEBASE, AJUSTEIVA, AJUSTEIVAEXC, AJUSTENETO, VRBASE, VRIVA, VRICONSUMO, VRRFTE, VRRICA, VRRIVA, TOTAL, DOCUID, FPCONTADO, FPCREDITO, DESPACHAR_A, USUARIO, HORA, FACTORCONV, NROFACPROV, VEHICULOID, FECANULADO, DESXCAMBIO, DEVOLXCAMBIO, TIPOICA2ID, MONEDA, NROCONTROL, PRONTOPAGO, MOTIVODEVID, IMPRESA, HORACREA, PUNXVEN, EXPORTACION, ANTICIPO, IMPORTADO, HORACOMANDA, FECEMI, ANTICIPOADIC, RECIBOID, IMPNOTENT, MOTIVOCIERRE, CONTRATO, VRIVAEXC, PROPINA, CONTRATOINMID, CANTCLIENTES, PERIODOFACT, ANOFACT, CONTRATOID, APARTADO, FECHAENT, HORAENT, ASENTANDO, RETCREE, VRRCREE, TIPOCREEID, NROCOMVEN, NROFACTEQ, PORCUTIAIU, COMEXP, FECRECLAMO, MOTRECLAMO, CHEQUEADO, FACTREMPOST, CAMBIODESPACHAR_A, FECHACORTE, DESCUENTO_TOTAL, SN_ESTADO, SN_FESTADO, SN_TIENECOT, SN_SALDO, SN_NPAGO, SN_TICKET, SN_CUFE, SN_PJFE, SN_RUTAQR, SN_CONSECUTIVO from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "KARDEXID = $this->kardexid"; 
              }  
              else  
              {
                  $aWhere[] = "KARDEXID = $this->kardexid"; 
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
          $sc_order_by = "KARDEXID";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['empty_filter'] = true;
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
              $this->kardexid = $rs->fields[0] ; 
              $this->nmgp_dados_select['kardexid'] = $this->kardexid;
              $this->codcomp = $rs->fields[1] ; 
              $this->nmgp_dados_select['codcomp'] = $this->codcomp;
              $this->codprefijo = $rs->fields[2] ; 
              $this->nmgp_dados_select['codprefijo'] = $this->codprefijo;
              $this->numero = $rs->fields[3] ; 
              $this->nmgp_dados_select['numero'] = $this->numero;
              $this->fecha = $rs->fields[4] ; 
              if (substr($this->fecha, 10, 1) == "-") 
              { 
                 $this->fecha = substr($this->fecha, 0, 10) . " " . substr($this->fecha, 11);
              } 
              if (substr($this->fecha, 13, 1) == ".") 
              { 
                 $this->fecha = substr($this->fecha, 0, 13) . ":" . substr($this->fecha, 14, 2) . ":" . substr($this->fecha, 17);
              } 
              $this->nmgp_dados_select['fecha'] = $this->fecha;
              $this->fecasentad = $rs->fields[5] ; 
              if (substr($this->fecasentad, 10, 1) == "-") 
              { 
                 $this->fecasentad = substr($this->fecasentad, 0, 10) . " " . substr($this->fecasentad, 11);
              } 
              if (substr($this->fecasentad, 13, 1) == ".") 
              { 
                 $this->fecasentad = substr($this->fecasentad, 0, 13) . ":" . substr($this->fecasentad, 14, 2) . ":" . substr($this->fecasentad, 17);
              } 
              $this->nmgp_dados_select['fecasentad'] = $this->fecasentad;
              $this->observ = $rs->fields[6] ; 
              $this->nmgp_dados_select['observ'] = $this->observ;
              $this->periodo = $rs->fields[7] ; 
              $this->nmgp_dados_select['periodo'] = $this->periodo;
              $this->cenid = $rs->fields[8] ; 
              $this->nmgp_dados_select['cenid'] = $this->cenid;
              $this->areadid = $rs->fields[9] ; 
              $this->nmgp_dados_select['areadid'] = $this->areadid;
              $this->sucid = $rs->fields[10] ; 
              $this->nmgp_dados_select['sucid'] = $this->sucid;
              $this->cliente = $rs->fields[11] ; 
              $this->nmgp_dados_select['cliente'] = $this->cliente;
              $this->vendedor = $rs->fields[12] ; 
              $this->nmgp_dados_select['vendedor'] = $this->vendedor;
              $this->formapago = $rs->fields[13] ; 
              $this->nmgp_dados_select['formapago'] = $this->formapago;
              $this->plazodias = $rs->fields[14] ; 
              $this->nmgp_dados_select['plazodias'] = $this->plazodias;
              $this->bcoid = $rs->fields[15] ; 
              $this->nmgp_dados_select['bcoid'] = $this->bcoid;
              $this->tipodoc = $rs->fields[16] ; 
              $this->nmgp_dados_select['tipodoc'] = $this->tipodoc;
              $this->documento = $rs->fields[17] ; 
              $this->nmgp_dados_select['documento'] = $this->documento;
              $this->concepto = $rs->fields[18] ; 
              $this->nmgp_dados_select['concepto'] = $this->concepto;
              $this->fecvence = $rs->fields[19] ; 
              if (substr($this->fecvence, 10, 1) == "-") 
              { 
                 $this->fecvence = substr($this->fecvence, 0, 10) . " " . substr($this->fecvence, 11);
              } 
              if (substr($this->fecvence, 13, 1) == ".") 
              { 
                 $this->fecvence = substr($this->fecvence, 0, 13) . ":" . substr($this->fecvence, 14, 2) . ":" . substr($this->fecvence, 17);
              } 
              $this->nmgp_dados_select['fecvence'] = $this->fecvence;
              $this->retiva = $rs->fields[20] ; 
              $this->nmgp_dados_select['retiva'] = $this->retiva;
              $this->retica = $rs->fields[21] ; 
              $this->nmgp_dados_select['retica'] = $this->retica;
              $this->retfte = $rs->fields[22] ; 
              $this->nmgp_dados_select['retfte'] = $this->retfte;
              $this->ajustebase = $rs->fields[23] ; 
              $this->nmgp_dados_select['ajustebase'] = $this->ajustebase;
              $this->ajusteiva = $rs->fields[24] ; 
              $this->nmgp_dados_select['ajusteiva'] = $this->ajusteiva;
              $this->ajusteivaexc = $rs->fields[25] ; 
              $this->nmgp_dados_select['ajusteivaexc'] = $this->ajusteivaexc;
              $this->ajusteneto = $rs->fields[26] ; 
              $this->nmgp_dados_select['ajusteneto'] = $this->ajusteneto;
              $this->vrbase = $rs->fields[27] ; 
              $this->nmgp_dados_select['vrbase'] = $this->vrbase;
              $this->vriva = $rs->fields[28] ; 
              $this->nmgp_dados_select['vriva'] = $this->vriva;
              $this->vriconsumo = $rs->fields[29] ; 
              $this->nmgp_dados_select['vriconsumo'] = $this->vriconsumo;
              $this->vrrfte = $rs->fields[30] ; 
              $this->nmgp_dados_select['vrrfte'] = $this->vrrfte;
              $this->vrrica = $rs->fields[31] ; 
              $this->nmgp_dados_select['vrrica'] = $this->vrrica;
              $this->vrriva = $rs->fields[32] ; 
              $this->nmgp_dados_select['vrriva'] = $this->vrriva;
              $this->total = $rs->fields[33] ; 
              $this->nmgp_dados_select['total'] = $this->total;
              $this->docuid = $rs->fields[34] ; 
              $this->nmgp_dados_select['docuid'] = $this->docuid;
              $this->fpcontado = $rs->fields[35] ; 
              $this->nmgp_dados_select['fpcontado'] = $this->fpcontado;
              $this->fpcredito = $rs->fields[36] ; 
              $this->nmgp_dados_select['fpcredito'] = $this->fpcredito;
              $this->despachar_a = $rs->fields[37] ; 
              $this->nmgp_dados_select['despachar_a'] = $this->despachar_a;
              $this->usuario = $rs->fields[38] ; 
              $this->nmgp_dados_select['usuario'] = $this->usuario;
              $this->hora = $rs->fields[39] ; 
              $this->nmgp_dados_select['hora'] = $this->hora;
              $this->factorconv = $rs->fields[40] ; 
              $this->nmgp_dados_select['factorconv'] = $this->factorconv;
              $this->nrofacprov = $rs->fields[41] ; 
              $this->nmgp_dados_select['nrofacprov'] = $this->nrofacprov;
              $this->vehiculoid = $rs->fields[42] ; 
              $this->nmgp_dados_select['vehiculoid'] = $this->vehiculoid;
              $this->fecanulado = $rs->fields[43] ; 
              if (substr($this->fecanulado, 10, 1) == "-") 
              { 
                 $this->fecanulado = substr($this->fecanulado, 0, 10) . " " . substr($this->fecanulado, 11);
              } 
              if (substr($this->fecanulado, 13, 1) == ".") 
              { 
                 $this->fecanulado = substr($this->fecanulado, 0, 13) . ":" . substr($this->fecanulado, 14, 2) . ":" . substr($this->fecanulado, 17);
              } 
              $this->nmgp_dados_select['fecanulado'] = $this->fecanulado;
              $this->desxcambio = $rs->fields[44] ; 
              $this->nmgp_dados_select['desxcambio'] = $this->desxcambio;
              $this->devolxcambio = $rs->fields[45] ; 
              $this->nmgp_dados_select['devolxcambio'] = $this->devolxcambio;
              $this->tipoica2id = $rs->fields[46] ; 
              $this->nmgp_dados_select['tipoica2id'] = $this->tipoica2id;
              $this->moneda = $rs->fields[47] ; 
              $this->nmgp_dados_select['moneda'] = $this->moneda;
              $this->nrocontrol = $rs->fields[48] ; 
              $this->nmgp_dados_select['nrocontrol'] = $this->nrocontrol;
              $this->prontopago = $rs->fields[49] ; 
              $this->nmgp_dados_select['prontopago'] = $this->prontopago;
              $this->motivodevid = $rs->fields[50] ; 
              $this->nmgp_dados_select['motivodevid'] = $this->motivodevid;
              $this->impresa = $rs->fields[51] ; 
              $this->nmgp_dados_select['impresa'] = $this->impresa;
              $this->horacrea = $rs->fields[52] ; 
              $this->nmgp_dados_select['horacrea'] = $this->horacrea;
              $this->punxven = $rs->fields[53] ; 
              $this->nmgp_dados_select['punxven'] = $this->punxven;
              $this->exportacion = $rs->fields[54] ; 
              $this->nmgp_dados_select['exportacion'] = $this->exportacion;
              $this->anticipo = $rs->fields[55] ; 
              $this->nmgp_dados_select['anticipo'] = $this->anticipo;
              $this->importado = $rs->fields[56] ; 
              $this->nmgp_dados_select['importado'] = $this->importado;
              $this->horacomanda = $rs->fields[57] ; 
              $this->nmgp_dados_select['horacomanda'] = $this->horacomanda;
              $this->fecemi = $rs->fields[58] ; 
              if (substr($this->fecemi, 10, 1) == "-") 
              { 
                 $this->fecemi = substr($this->fecemi, 0, 10) . " " . substr($this->fecemi, 11);
              } 
              if (substr($this->fecemi, 13, 1) == ".") 
              { 
                 $this->fecemi = substr($this->fecemi, 0, 13) . ":" . substr($this->fecemi, 14, 2) . ":" . substr($this->fecemi, 17);
              } 
              $this->nmgp_dados_select['fecemi'] = $this->fecemi;
              $this->anticipoadic = $rs->fields[59] ; 
              $this->nmgp_dados_select['anticipoadic'] = $this->anticipoadic;
              $this->reciboid = $rs->fields[60] ; 
              $this->nmgp_dados_select['reciboid'] = $this->reciboid;
              $this->impnotent = $rs->fields[61] ; 
              $this->nmgp_dados_select['impnotent'] = $this->impnotent;
              $this->motivocierre = $rs->fields[62] ; 
              $this->nmgp_dados_select['motivocierre'] = $this->motivocierre;
              $this->contrato = $rs->fields[63] ; 
              $this->nmgp_dados_select['contrato'] = $this->contrato;
              $this->vrivaexc = $rs->fields[64] ; 
              $this->nmgp_dados_select['vrivaexc'] = $this->vrivaexc;
              $this->propina = $rs->fields[65] ; 
              $this->nmgp_dados_select['propina'] = $this->propina;
              $this->contratoinmid = $rs->fields[66] ; 
              $this->nmgp_dados_select['contratoinmid'] = $this->contratoinmid;
              $this->cantclientes = $rs->fields[67] ; 
              $this->nmgp_dados_select['cantclientes'] = $this->cantclientes;
              $this->periodofact = $rs->fields[68] ; 
              $this->nmgp_dados_select['periodofact'] = $this->periodofact;
              $this->anofact = $rs->fields[69] ; 
              $this->nmgp_dados_select['anofact'] = $this->anofact;
              $this->contratoid = $rs->fields[70] ; 
              $this->nmgp_dados_select['contratoid'] = $this->contratoid;
              $this->apartado = $rs->fields[71] ; 
              $this->nmgp_dados_select['apartado'] = $this->apartado;
              $this->fechaent = $rs->fields[72] ; 
              if (substr($this->fechaent, 10, 1) == "-") 
              { 
                 $this->fechaent = substr($this->fechaent, 0, 10) . " " . substr($this->fechaent, 11);
              } 
              if (substr($this->fechaent, 13, 1) == ".") 
              { 
                 $this->fechaent = substr($this->fechaent, 0, 13) . ":" . substr($this->fechaent, 14, 2) . ":" . substr($this->fechaent, 17);
              } 
              $this->nmgp_dados_select['fechaent'] = $this->fechaent;
              $this->horaent = $rs->fields[73] ; 
              $this->nmgp_dados_select['horaent'] = $this->horaent;
              $this->asentando = $rs->fields[74] ; 
              $this->nmgp_dados_select['asentando'] = $this->asentando;
              $this->retcree = $rs->fields[75] ; 
              $this->nmgp_dados_select['retcree'] = $this->retcree;
              $this->vrrcree = $rs->fields[76] ; 
              $this->nmgp_dados_select['vrrcree'] = $this->vrrcree;
              $this->tipocreeid = $rs->fields[77] ; 
              $this->nmgp_dados_select['tipocreeid'] = $this->tipocreeid;
              $this->nrocomven = $rs->fields[78] ; 
              $this->nmgp_dados_select['nrocomven'] = $this->nrocomven;
              $this->nrofacteq = $rs->fields[79] ; 
              $this->nmgp_dados_select['nrofacteq'] = $this->nrofacteq;
              $this->porcutiaiu = $rs->fields[80] ; 
              $this->nmgp_dados_select['porcutiaiu'] = $this->porcutiaiu;
              $this->comexp = $rs->fields[81] ; 
              $this->nmgp_dados_select['comexp'] = $this->comexp;
              $this->fecreclamo = $rs->fields[82] ; 
              if (substr($this->fecreclamo, 10, 1) == "-") 
              { 
                 $this->fecreclamo = substr($this->fecreclamo, 0, 10) . " " . substr($this->fecreclamo, 11);
              } 
              if (substr($this->fecreclamo, 13, 1) == ".") 
              { 
                 $this->fecreclamo = substr($this->fecreclamo, 0, 13) . ":" . substr($this->fecreclamo, 14, 2) . ":" . substr($this->fecreclamo, 17);
              } 
              $this->nmgp_dados_select['fecreclamo'] = $this->fecreclamo;
              $this->motreclamo = $rs->fields[83] ; 
              $this->nmgp_dados_select['motreclamo'] = $this->motreclamo;
              $this->chequeado = $rs->fields[84] ; 
              $this->nmgp_dados_select['chequeado'] = $this->chequeado;
              $this->factrempost = $rs->fields[85] ; 
              $this->nmgp_dados_select['factrempost'] = $this->factrempost;
              $this->cambiodespachar_a = $rs->fields[86] ; 
              $this->nmgp_dados_select['cambiodespachar_a'] = $this->cambiodespachar_a;
              $this->fechacorte = $rs->fields[87] ; 
              if (substr($this->fechacorte, 10, 1) == "-") 
              { 
                 $this->fechacorte = substr($this->fechacorte, 0, 10) . " " . substr($this->fechacorte, 11);
              } 
              if (substr($this->fechacorte, 13, 1) == ".") 
              { 
                 $this->fechacorte = substr($this->fechacorte, 0, 13) . ":" . substr($this->fechacorte, 14, 2) . ":" . substr($this->fechacorte, 17);
              } 
              $this->nmgp_dados_select['fechacorte'] = $this->fechacorte;
              $this->descuento_total = $rs->fields[88] ; 
              $this->nmgp_dados_select['descuento_total'] = $this->descuento_total;
              $this->sn_estado = $rs->fields[89] ; 
              $this->nmgp_dados_select['sn_estado'] = $this->sn_estado;
              $this->sn_festado = $rs->fields[90] ; 
              if (substr($this->sn_festado, 10, 1) == "-") 
              { 
                 $this->sn_festado = substr($this->sn_festado, 0, 10) . " " . substr($this->sn_festado, 11);
              } 
              if (substr($this->sn_festado, 13, 1) == ".") 
              { 
                 $this->sn_festado = substr($this->sn_festado, 0, 13) . ":" . substr($this->sn_festado, 14, 2) . ":" . substr($this->sn_festado, 17);
              } 
              $this->nmgp_dados_select['sn_festado'] = $this->sn_festado;
              $this->sn_tienecot = $rs->fields[91] ; 
              $this->nmgp_dados_select['sn_tienecot'] = $this->sn_tienecot;
              $this->sn_saldo = $rs->fields[92] ; 
              $this->nmgp_dados_select['sn_saldo'] = $this->sn_saldo;
              $this->sn_npago = $rs->fields[93] ; 
              $this->nmgp_dados_select['sn_npago'] = $this->sn_npago;
              $this->sn_ticket = $rs->fields[94] ; 
              $this->nmgp_dados_select['sn_ticket'] = $this->sn_ticket;
              $this->sn_cufe = $rs->fields[95] ; 
              $this->nmgp_dados_select['sn_cufe'] = $this->sn_cufe;
              $this->sn_pjfe = $rs->fields[96] ; 
              $this->nmgp_dados_select['sn_pjfe'] = $this->sn_pjfe;
              $this->sn_rutaqr = $rs->fields[97] ; 
              $this->nmgp_dados_select['sn_rutaqr'] = $this->sn_rutaqr;
              $this->sn_consecutivo = $rs->fields[98] ; 
              $this->nmgp_dados_select['sn_consecutivo'] = $this->sn_consecutivo;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->kardexid = (string)$this->kardexid; 
              $this->cenid = (string)$this->cenid; 
              $this->areadid = (string)$this->areadid; 
              $this->sucid = (string)$this->sucid; 
              $this->cliente = (string)$this->cliente; 
              $this->vendedor = (string)$this->vendedor; 
              $this->plazodias = (string)$this->plazodias; 
              $this->bcoid = (string)$this->bcoid; 
              $this->concepto = (string)$this->concepto; 
              $this->retiva = (string)$this->retiva; 
              $this->retica = (string)$this->retica; 
              $this->retfte = (string)$this->retfte; 
              $this->ajustebase = (string)$this->ajustebase; 
              $this->ajusteiva = (string)$this->ajusteiva; 
              $this->ajusteivaexc = (string)$this->ajusteivaexc; 
              $this->ajusteneto = (string)$this->ajusteneto; 
              $this->vrbase = (string)$this->vrbase; 
              $this->vriva = (string)$this->vriva; 
              $this->vriconsumo = (string)$this->vriconsumo; 
              $this->vrrfte = (string)$this->vrrfte; 
              $this->vrrica = (string)$this->vrrica; 
              $this->vrriva = (string)$this->vrriva; 
              $this->total = (string)$this->total; 
              $this->docuid = (string)$this->docuid; 
              $this->fpcontado = (string)$this->fpcontado; 
              $this->fpcredito = (string)$this->fpcredito; 
              $this->despachar_a = (string)$this->despachar_a; 
              $this->factorconv = (string)$this->factorconv; 
              $this->vehiculoid = (string)$this->vehiculoid; 
              $this->desxcambio = (string)$this->desxcambio; 
              $this->devolxcambio = (string)$this->devolxcambio; 
              $this->tipoica2id = (string)$this->tipoica2id; 
              $this->motivodevid = (string)$this->motivodevid; 
              $this->punxven = (strpos(strtolower($this->punxven), "e")) ? (float)$this->punxven : $this->punxven; 
              $this->punxven = (string)$this->punxven; 
              $this->anticipo = (string)$this->anticipo; 
              $this->anticipoadic = (string)$this->anticipoadic; 
              $this->reciboid = (string)$this->reciboid; 
              $this->motivocierre = (string)$this->motivocierre; 
              $this->vrivaexc = (string)$this->vrivaexc; 
              $this->propina = (string)$this->propina; 
              $this->contratoinmid = (string)$this->contratoinmid; 
              $this->cantclientes = (string)$this->cantclientes; 
              $this->contratoid = (string)$this->contratoid; 
              $this->retcree = (string)$this->retcree; 
              $this->vrrcree = (string)$this->vrrcree; 
              $this->tipocreeid = (string)$this->tipocreeid; 
              $this->porcutiaiu = (string)$this->porcutiaiu; 
              $this->motreclamo = (string)$this->motreclamo; 
              $this->sn_saldo = (string)$this->sn_saldo; 
              $this->sn_ticket = (string)$this->sn_ticket; 
              $this->sn_consecutivo = (string)$this->sn_consecutivo; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['parms'] = "kardexid?#?$this->kardexid?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['reg_start'] < $qt_geral_reg_form_KARDEX_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['opcao']   = '';
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
              $this->kardexid = "";  
              $this->nmgp_dados_form["kardexid"] = $this->kardexid;
              $this->codcomp = "";  
              $this->nmgp_dados_form["codcomp"] = $this->codcomp;
              $this->codprefijo = "";  
              $this->nmgp_dados_form["codprefijo"] = $this->codprefijo;
              $this->numero = "";  
              $this->nmgp_dados_form["numero"] = $this->numero;
              $this->fecha = "";  
              $this->fecha_hora = "" ;  
              $this->nmgp_dados_form["fecha"] = $this->fecha;
              $this->fecasentad = "";  
              $this->fecasentad_hora = "" ;  
              $this->nmgp_dados_form["fecasentad"] = $this->fecasentad;
              $this->observ = "";  
              $this->nmgp_dados_form["observ"] = $this->observ;
              $this->periodo = "";  
              $this->nmgp_dados_form["periodo"] = $this->periodo;
              $this->cenid = "";  
              $this->nmgp_dados_form["cenid"] = $this->cenid;
              $this->areadid = "";  
              $this->nmgp_dados_form["areadid"] = $this->areadid;
              $this->sucid = "";  
              $this->nmgp_dados_form["sucid"] = $this->sucid;
              $this->cliente = "";  
              $this->nmgp_dados_form["cliente"] = $this->cliente;
              $this->vendedor = "";  
              $this->nmgp_dados_form["vendedor"] = $this->vendedor;
              $this->formapago = "";  
              $this->nmgp_dados_form["formapago"] = $this->formapago;
              $this->plazodias = "";  
              $this->nmgp_dados_form["plazodias"] = $this->plazodias;
              $this->bcoid = "";  
              $this->nmgp_dados_form["bcoid"] = $this->bcoid;
              $this->tipodoc = "";  
              $this->nmgp_dados_form["tipodoc"] = $this->tipodoc;
              $this->documento = "";  
              $this->nmgp_dados_form["documento"] = $this->documento;
              $this->concepto = "";  
              $this->nmgp_dados_form["concepto"] = $this->concepto;
              $this->fecvence = "";  
              $this->fecvence_hora = "" ;  
              $this->nmgp_dados_form["fecvence"] = $this->fecvence;
              $this->retiva = "";  
              $this->nmgp_dados_form["retiva"] = $this->retiva;
              $this->retica = "";  
              $this->nmgp_dados_form["retica"] = $this->retica;
              $this->retfte = "";  
              $this->nmgp_dados_form["retfte"] = $this->retfte;
              $this->ajustebase = "";  
              $this->nmgp_dados_form["ajustebase"] = $this->ajustebase;
              $this->ajusteiva = "";  
              $this->nmgp_dados_form["ajusteiva"] = $this->ajusteiva;
              $this->ajusteivaexc = "";  
              $this->nmgp_dados_form["ajusteivaexc"] = $this->ajusteivaexc;
              $this->ajusteneto = "";  
              $this->nmgp_dados_form["ajusteneto"] = $this->ajusteneto;
              $this->vrbase = "";  
              $this->nmgp_dados_form["vrbase"] = $this->vrbase;
              $this->vriva = "";  
              $this->nmgp_dados_form["vriva"] = $this->vriva;
              $this->vriconsumo = "";  
              $this->nmgp_dados_form["vriconsumo"] = $this->vriconsumo;
              $this->vrrfte = "";  
              $this->nmgp_dados_form["vrrfte"] = $this->vrrfte;
              $this->vrrica = "";  
              $this->nmgp_dados_form["vrrica"] = $this->vrrica;
              $this->vrriva = "";  
              $this->nmgp_dados_form["vrriva"] = $this->vrriva;
              $this->total = "";  
              $this->nmgp_dados_form["total"] = $this->total;
              $this->docuid = "";  
              $this->nmgp_dados_form["docuid"] = $this->docuid;
              $this->fpcontado = "";  
              $this->nmgp_dados_form["fpcontado"] = $this->fpcontado;
              $this->fpcredito = "";  
              $this->nmgp_dados_form["fpcredito"] = $this->fpcredito;
              $this->despachar_a = "";  
              $this->nmgp_dados_form["despachar_a"] = $this->despachar_a;
              $this->usuario = "";  
              $this->nmgp_dados_form["usuario"] = $this->usuario;
              $this->hora = "";  
              $this->nmgp_dados_form["hora"] = $this->hora;
              $this->factorconv = "";  
              $this->nmgp_dados_form["factorconv"] = $this->factorconv;
              $this->nrofacprov = "";  
              $this->nmgp_dados_form["nrofacprov"] = $this->nrofacprov;
              $this->vehiculoid = "";  
              $this->nmgp_dados_form["vehiculoid"] = $this->vehiculoid;
              $this->fecanulado = "";  
              $this->fecanulado_hora = "" ;  
              $this->nmgp_dados_form["fecanulado"] = $this->fecanulado;
              $this->desxcambio = "";  
              $this->nmgp_dados_form["desxcambio"] = $this->desxcambio;
              $this->devolxcambio = "";  
              $this->nmgp_dados_form["devolxcambio"] = $this->devolxcambio;
              $this->tipoica2id = "";  
              $this->nmgp_dados_form["tipoica2id"] = $this->tipoica2id;
              $this->moneda = "";  
              $this->nmgp_dados_form["moneda"] = $this->moneda;
              $this->nrocontrol = "";  
              $this->nmgp_dados_form["nrocontrol"] = $this->nrocontrol;
              $this->prontopago = "";  
              $this->nmgp_dados_form["prontopago"] = $this->prontopago;
              $this->motivodevid = "";  
              $this->nmgp_dados_form["motivodevid"] = $this->motivodevid;
              $this->impresa = "";  
              $this->nmgp_dados_form["impresa"] = $this->impresa;
              $this->horacrea = "";  
              $this->nmgp_dados_form["horacrea"] = $this->horacrea;
              $this->punxven = "";  
              $this->nmgp_dados_form["punxven"] = $this->punxven;
              $this->exportacion = "";  
              $this->nmgp_dados_form["exportacion"] = $this->exportacion;
              $this->anticipo = "";  
              $this->nmgp_dados_form["anticipo"] = $this->anticipo;
              $this->importado = "";  
              $this->nmgp_dados_form["importado"] = $this->importado;
              $this->horacomanda = "";  
              $this->nmgp_dados_form["horacomanda"] = $this->horacomanda;
              $this->fecemi = "";  
              $this->fecemi_hora = "" ;  
              $this->nmgp_dados_form["fecemi"] = $this->fecemi;
              $this->anticipoadic = "";  
              $this->nmgp_dados_form["anticipoadic"] = $this->anticipoadic;
              $this->reciboid = "";  
              $this->nmgp_dados_form["reciboid"] = $this->reciboid;
              $this->impnotent = "";  
              $this->nmgp_dados_form["impnotent"] = $this->impnotent;
              $this->motivocierre = "";  
              $this->nmgp_dados_form["motivocierre"] = $this->motivocierre;
              $this->contrato = "";  
              $this->nmgp_dados_form["contrato"] = $this->contrato;
              $this->vrivaexc = "";  
              $this->nmgp_dados_form["vrivaexc"] = $this->vrivaexc;
              $this->propina = "";  
              $this->nmgp_dados_form["propina"] = $this->propina;
              $this->contratoinmid = "";  
              $this->nmgp_dados_form["contratoinmid"] = $this->contratoinmid;
              $this->cantclientes = "";  
              $this->nmgp_dados_form["cantclientes"] = $this->cantclientes;
              $this->periodofact = "";  
              $this->nmgp_dados_form["periodofact"] = $this->periodofact;
              $this->anofact = "";  
              $this->nmgp_dados_form["anofact"] = $this->anofact;
              $this->contratoid = "";  
              $this->nmgp_dados_form["contratoid"] = $this->contratoid;
              $this->apartado = "";  
              $this->nmgp_dados_form["apartado"] = $this->apartado;
              $this->fechaent = "";  
              $this->fechaent_hora = "" ;  
              $this->nmgp_dados_form["fechaent"] = $this->fechaent;
              $this->horaent = "";  
              $this->nmgp_dados_form["horaent"] = $this->horaent;
              $this->asentando = "";  
              $this->nmgp_dados_form["asentando"] = $this->asentando;
              $this->retcree = "";  
              $this->nmgp_dados_form["retcree"] = $this->retcree;
              $this->vrrcree = "";  
              $this->nmgp_dados_form["vrrcree"] = $this->vrrcree;
              $this->tipocreeid = "";  
              $this->nmgp_dados_form["tipocreeid"] = $this->tipocreeid;
              $this->nrocomven = "";  
              $this->nmgp_dados_form["nrocomven"] = $this->nrocomven;
              $this->nrofacteq = "";  
              $this->nmgp_dados_form["nrofacteq"] = $this->nrofacteq;
              $this->porcutiaiu = "";  
              $this->nmgp_dados_form["porcutiaiu"] = $this->porcutiaiu;
              $this->comexp = "";  
              $this->nmgp_dados_form["comexp"] = $this->comexp;
              $this->fecreclamo = "";  
              $this->fecreclamo_hora = "" ;  
              $this->nmgp_dados_form["fecreclamo"] = $this->fecreclamo;
              $this->motreclamo = "";  
              $this->nmgp_dados_form["motreclamo"] = $this->motreclamo;
              $this->chequeado = "";  
              $this->nmgp_dados_form["chequeado"] = $this->chequeado;
              $this->factrempost = "";  
              $this->nmgp_dados_form["factrempost"] = $this->factrempost;
              $this->cambiodespachar_a = "";  
              $this->nmgp_dados_form["cambiodespachar_a"] = $this->cambiodespachar_a;
              $this->fechacorte = "";  
              $this->fechacorte_hora = "" ;  
              $this->nmgp_dados_form["fechacorte"] = $this->fechacorte;
              $this->descuento_total = "";  
              $this->nmgp_dados_form["descuento_total"] = $this->descuento_total;
              $this->sn_estado = "";  
              $this->nmgp_dados_form["sn_estado"] = $this->sn_estado;
              $this->sn_festado = "";  
              $this->sn_festado_hora = "" ;  
              $this->nmgp_dados_form["sn_festado"] = $this->sn_festado;
              $this->sn_tienecot = "";  
              $this->nmgp_dados_form["sn_tienecot"] = $this->sn_tienecot;
              $this->sn_saldo = "";  
              $this->nmgp_dados_form["sn_saldo"] = $this->sn_saldo;
              $this->sn_npago = "";  
              $this->nmgp_dados_form["sn_npago"] = $this->sn_npago;
              $this->sn_ticket = "";  
              $this->nmgp_dados_form["sn_ticket"] = $this->sn_ticket;
              $this->sn_cufe = "";  
              $this->nmgp_dados_form["sn_cufe"] = $this->sn_cufe;
              $this->sn_pjfe = "";  
              $this->nmgp_dados_form["sn_pjfe"] = $this->sn_pjfe;
              $this->sn_rutaqr = "";  
              $this->nmgp_dados_form["sn_rutaqr"] = $this->sn_rutaqr;
              $this->sn_consecutivo = "";  
              $this->nmgp_dados_form["sn_consecutivo"] = $this->sn_consecutivo;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
              if ($this->nmgp_clone != "S")
              {
              }
              if ($this->nmgp_clone == "S" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['dados_select']))
              {
                  $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['dados_select'];
                  $this->codcomp = $this->nmgp_dados_select['codcomp'];  
                  $this->codprefijo = $this->nmgp_dados_select['codprefijo'];  
                  $this->numero = $this->nmgp_dados_select['numero'];  
                  $this->fecha = $this->nmgp_dados_select['fecha'];  
                  $this->fecasentad = $this->nmgp_dados_select['fecasentad'];  
                  $this->observ = $this->nmgp_dados_select['observ'];  
                  $this->periodo = $this->nmgp_dados_select['periodo'];  
                  $this->cenid = $this->nmgp_dados_select['cenid'];  
                  $this->areadid = $this->nmgp_dados_select['areadid'];  
                  $this->sucid = $this->nmgp_dados_select['sucid'];  
                  $this->cliente = $this->nmgp_dados_select['cliente'];  
                  $this->vendedor = $this->nmgp_dados_select['vendedor'];  
                  $this->formapago = $this->nmgp_dados_select['formapago'];  
                  $this->plazodias = $this->nmgp_dados_select['plazodias'];  
                  $this->bcoid = $this->nmgp_dados_select['bcoid'];  
                  $this->tipodoc = $this->nmgp_dados_select['tipodoc'];  
                  $this->documento = $this->nmgp_dados_select['documento'];  
                  $this->concepto = $this->nmgp_dados_select['concepto'];  
                  $this->fecvence = $this->nmgp_dados_select['fecvence'];  
                  $this->retiva = $this->nmgp_dados_select['retiva'];  
                  $this->retica = $this->nmgp_dados_select['retica'];  
                  $this->retfte = $this->nmgp_dados_select['retfte'];  
                  $this->ajustebase = $this->nmgp_dados_select['ajustebase'];  
                  $this->ajusteiva = $this->nmgp_dados_select['ajusteiva'];  
                  $this->ajusteivaexc = $this->nmgp_dados_select['ajusteivaexc'];  
                  $this->ajusteneto = $this->nmgp_dados_select['ajusteneto'];  
                  $this->vrbase = $this->nmgp_dados_select['vrbase'];  
                  $this->vriva = $this->nmgp_dados_select['vriva'];  
                  $this->vriconsumo = $this->nmgp_dados_select['vriconsumo'];  
                  $this->vrrfte = $this->nmgp_dados_select['vrrfte'];  
                  $this->vrrica = $this->nmgp_dados_select['vrrica'];  
                  $this->vrriva = $this->nmgp_dados_select['vrriva'];  
                  $this->total = $this->nmgp_dados_select['total'];  
                  $this->docuid = $this->nmgp_dados_select['docuid'];  
                  $this->fpcontado = $this->nmgp_dados_select['fpcontado'];  
                  $this->fpcredito = $this->nmgp_dados_select['fpcredito'];  
                  $this->despachar_a = $this->nmgp_dados_select['despachar_a'];  
                  $this->usuario = $this->nmgp_dados_select['usuario'];  
                  $this->hora = $this->nmgp_dados_select['hora'];  
                  $this->factorconv = $this->nmgp_dados_select['factorconv'];  
                  $this->nrofacprov = $this->nmgp_dados_select['nrofacprov'];  
                  $this->vehiculoid = $this->nmgp_dados_select['vehiculoid'];  
                  $this->fecanulado = $this->nmgp_dados_select['fecanulado'];  
                  $this->desxcambio = $this->nmgp_dados_select['desxcambio'];  
                  $this->devolxcambio = $this->nmgp_dados_select['devolxcambio'];  
                  $this->tipoica2id = $this->nmgp_dados_select['tipoica2id'];  
                  $this->moneda = $this->nmgp_dados_select['moneda'];  
                  $this->nrocontrol = $this->nmgp_dados_select['nrocontrol'];  
                  $this->prontopago = $this->nmgp_dados_select['prontopago'];  
                  $this->motivodevid = $this->nmgp_dados_select['motivodevid'];  
                  $this->impresa = $this->nmgp_dados_select['impresa'];  
                  $this->horacrea = $this->nmgp_dados_select['horacrea'];  
                  $this->punxven = $this->nmgp_dados_select['punxven'];  
                  $this->exportacion = $this->nmgp_dados_select['exportacion'];  
                  $this->anticipo = $this->nmgp_dados_select['anticipo'];  
                  $this->importado = $this->nmgp_dados_select['importado'];  
                  $this->horacomanda = $this->nmgp_dados_select['horacomanda'];  
                  $this->fecemi = $this->nmgp_dados_select['fecemi'];  
                  $this->anticipoadic = $this->nmgp_dados_select['anticipoadic'];  
                  $this->reciboid = $this->nmgp_dados_select['reciboid'];  
                  $this->impnotent = $this->nmgp_dados_select['impnotent'];  
                  $this->motivocierre = $this->nmgp_dados_select['motivocierre'];  
                  $this->contrato = $this->nmgp_dados_select['contrato'];  
                  $this->vrivaexc = $this->nmgp_dados_select['vrivaexc'];  
                  $this->propina = $this->nmgp_dados_select['propina'];  
                  $this->contratoinmid = $this->nmgp_dados_select['contratoinmid'];  
                  $this->cantclientes = $this->nmgp_dados_select['cantclientes'];  
                  $this->periodofact = $this->nmgp_dados_select['periodofact'];  
                  $this->anofact = $this->nmgp_dados_select['anofact'];  
                  $this->contratoid = $this->nmgp_dados_select['contratoid'];  
                  $this->apartado = $this->nmgp_dados_select['apartado'];  
                  $this->fechaent = $this->nmgp_dados_select['fechaent'];  
                  $this->horaent = $this->nmgp_dados_select['horaent'];  
                  $this->asentando = $this->nmgp_dados_select['asentando'];  
                  $this->retcree = $this->nmgp_dados_select['retcree'];  
                  $this->vrrcree = $this->nmgp_dados_select['vrrcree'];  
                  $this->tipocreeid = $this->nmgp_dados_select['tipocreeid'];  
                  $this->nrocomven = $this->nmgp_dados_select['nrocomven'];  
                  $this->nrofacteq = $this->nmgp_dados_select['nrofacteq'];  
                  $this->porcutiaiu = $this->nmgp_dados_select['porcutiaiu'];  
                  $this->comexp = $this->nmgp_dados_select['comexp'];  
                  $this->fecreclamo = $this->nmgp_dados_select['fecreclamo'];  
                  $this->motreclamo = $this->nmgp_dados_select['motreclamo'];  
                  $this->chequeado = $this->nmgp_dados_select['chequeado'];  
                  $this->factrempost = $this->nmgp_dados_select['factrempost'];  
                  $this->cambiodespachar_a = $this->nmgp_dados_select['cambiodespachar_a'];  
                  $this->fechacorte = $this->nmgp_dados_select['fechacorte'];  
                  $this->descuento_total = $this->nmgp_dados_select['descuento_total'];  
                  $this->sn_estado = $this->nmgp_dados_select['sn_estado'];  
                  $this->sn_festado = $this->nmgp_dados_select['sn_festado'];  
                  $this->sn_tienecot = $this->nmgp_dados_select['sn_tienecot'];  
                  $this->sn_saldo = $this->nmgp_dados_select['sn_saldo'];  
                  $this->sn_npago = $this->nmgp_dados_select['sn_npago'];  
                  $this->sn_ticket = $this->nmgp_dados_select['sn_ticket'];  
                  $this->sn_cufe = $this->nmgp_dados_select['sn_cufe'];  
                  $this->sn_pjfe = $this->nmgp_dados_select['sn_pjfe'];  
                  $this->sn_rutaqr = $this->nmgp_dados_select['sn_rutaqr'];  
                  $this->sn_consecutivo = $this->nmgp_dados_select['sn_consecutivo'];  
              }
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['foreign_key'] as $sFKName => $sFKValue)
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
  }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_KARDEX_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_KARDEX_mob_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("kardexid", "codcomp", "codprefijo", "numero", "observ", "periodo", "cenid", "areadid", "sucid", "cliente", "vendedor", "formapago", "plazodias", "bcoid", "tipodoc", "documento", "concepto", "retiva", "retica", "retfte", "ajustebase", "ajusteiva", "ajusteivaexc", "ajusteneto", "vrbase", "vriva", "vriconsumo", "vrrfte", "vrrica", "vrriva", "total", "docuid", "fpcontado", "fpcredito", "despachar_a", "usuario", "hora", "factorconv", "nrofacprov", "vehiculoid", "desxcambio", "devolxcambio", "tipoica2id", "moneda", "nrocontrol", "prontopago", "motivodevid", "impresa", "horacrea", "punxven", "exportacion", "anticipo", "importado", "horacomanda", "anticipoadic", "reciboid", "impnotent", "motivocierre", "contrato", "vrivaexc", "propina", "contratoinmid", "cantclientes", "periodofact", "anofact", "contratoid", "apartado", "horaent", "asentando", "retcree", "vrrcree", "tipocreeid", "nrocomven", "nrofacteq", "porcutiaiu", "comexp", "motreclamo", "chequeado", "factrempost", "cambiodespachar_a", "descuento_total", "sn_estado", "sn_tienecot", "sn_saldo", "sn_npago", "sn_ticket", "sn_cufe", "sn_pjfe", "sn_rutaqr", "sn_consecutivo"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['csrf_token'];
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

   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_KARDEX_mob_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "KARDEXID", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CODCOMP", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CODPREFIJO", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NUMERO", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "OBSERV", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "PERIODO", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_cenid($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "CENID", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_areadid($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "AREADID", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_sucid($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "SUCID", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_cliente($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "CLIENTE", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_vendedor($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "VENDEDOR", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "FORMAPAGO", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "PLAZODIAS", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_bcoid($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "BCOID", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "TIPODOC", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "DOCUMENTO", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_concepto($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "CONCEPTO", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "RETIVA", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "RETICA", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "RETFTE", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "AJUSTEBASE", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "AJUSTEIVA", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "AJUSTEIVAEXC", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "AJUSTENETO", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VRBASE", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VRIVA", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VRICONSUMO", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VRRFTE", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VRRICA", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VRRIVA", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "TOTAL", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_docuid($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "DOCUID", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "FPCONTADO", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "FPCREDITO", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_despachar_a($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "DESPACHAR_A", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "USUARIO", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "HORA", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "FACTORCONV", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NROFACPROV", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_vehiculoid($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "VEHICULOID", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "DESXCAMBIO", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "DEVOLXCAMBIO", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_tipoica2id($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "TIPOICA2ID", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "MONEDA", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NROCONTROL", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "PRONTOPAGO", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_motivodevid($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "MOTIVODEVID", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "IMPRESA", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "HORACREA", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "PUNXVEN", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "EXPORTACION", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ANTICIPO", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "IMPORTADO", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "HORACOMANDA", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ANTICIPOADIC", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "RECIBOID", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "IMPNOTENT", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_motivocierre($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "MOTIVOCIERRE", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CONTRATO", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VRIVAEXC", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "PROPINA", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_contratoinmid($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "CONTRATOINMID", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CANTCLIENTES", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "PERIODOFACT", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ANOFACT", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CONTRATOID", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "APARTADO", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "HORAENT", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ASENTANDO", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "RETCREE", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "VRRCREE", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_tipocreeid($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "TIPOCREEID", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NROCOMVEN", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "NROFACTEQ", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "PORCUTIAIU", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "COMEXP", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_motreclamo($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "MOTRECLAMO", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CHEQUEADO", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "FACTREMPOST", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "CAMBIODESPACHAR_A", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "DESCUENTO_TOTAL", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "SN_ESTADO", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "SN_TIENECOT", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "SN_SALDO", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "SN_NPAGO", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "SN_TICKET", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "SN_CUFE", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "SN_PJFE", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "SN_RUTAQR", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "SN_CONSECUTIVO", $arg_search, str_replace(",", ".", $data_search));
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_KARDEX_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['total'] = $qt_geral_reg_form_KARDEX_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_KARDEX_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_KARDEX_mob_pack_ajax_response();
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
      $nm_numeric[] = "kardexid";$nm_numeric[] = "cenid";$nm_numeric[] = "areadid";$nm_numeric[] = "sucid";$nm_numeric[] = "cliente";$nm_numeric[] = "vendedor";$nm_numeric[] = "plazodias";$nm_numeric[] = "bcoid";$nm_numeric[] = "concepto";$nm_numeric[] = "retiva";$nm_numeric[] = "retica";$nm_numeric[] = "retfte";$nm_numeric[] = "ajustebase";$nm_numeric[] = "ajusteiva";$nm_numeric[] = "ajusteivaexc";$nm_numeric[] = "ajusteneto";$nm_numeric[] = "vrbase";$nm_numeric[] = "vriva";$nm_numeric[] = "vriconsumo";$nm_numeric[] = "vrrfte";$nm_numeric[] = "vrrica";$nm_numeric[] = "vrriva";$nm_numeric[] = "total";$nm_numeric[] = "docuid";$nm_numeric[] = "fpcontado";$nm_numeric[] = "fpcredito";$nm_numeric[] = "despachar_a";$nm_numeric[] = "factorconv";$nm_numeric[] = "vehiculoid";$nm_numeric[] = "desxcambio";$nm_numeric[] = "devolxcambio";$nm_numeric[] = "tipoica2id";$nm_numeric[] = "motivodevid";$nm_numeric[] = "punxven";$nm_numeric[] = "anticipo";$nm_numeric[] = "anticipoadic";$nm_numeric[] = "reciboid";$nm_numeric[] = "motivocierre";$nm_numeric[] = "vrivaexc";$nm_numeric[] = "propina";$nm_numeric[] = "contratoinmid";$nm_numeric[] = "cantclientes";$nm_numeric[] = "contratoid";$nm_numeric[] = "retcree";$nm_numeric[] = "vrrcree";$nm_numeric[] = "tipocreeid";$nm_numeric[] = "porcutiaiu";$nm_numeric[] = "motreclamo";$nm_numeric[] = "sn_saldo";$nm_numeric[] = "sn_ticket";$nm_numeric[] = "sn_consecutivo";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['decimal_db'] == ".")
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
      $Nm_datas['fecha'] = "timestamp";$Nm_datas['fecasentad'] = "timestamp";$Nm_datas['fecvence'] = "timestamp";$Nm_datas['fecanulado'] = "timestamp";$Nm_datas['fecemi'] = "timestamp";$Nm_datas['fechaent'] = "timestamp";$Nm_datas['fecreclamo'] = "timestamp";$Nm_datas['fechacorte'] = "timestamp";$Nm_datas['sn_festado'] = "timestamp";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['SC_sep_date1'];
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
   function SC_lookup_cenid($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT CENID, CENID FROM CENTROS WHERE (CAST (CENID AS TEXT) LIKE '%$campo%')" ; 
       }
       else
       {
           $nm_comando = "SELECT CENID, CENID FROM CENTROS WHERE (CENID LIKE '%$campo%')" ; 
       }
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
   function SC_lookup_areadid($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT AREADID, AREADID FROM AREAD WHERE (CAST (AREADID AS TEXT) LIKE '%$campo%')" ; 
       }
       else
       {
           $nm_comando = "SELECT AREADID, AREADID FROM AREAD WHERE (AREADID LIKE '%$campo%')" ; 
       }
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
   function SC_lookup_sucid($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT SUCID, SUCID FROM SUCURSAL WHERE (CAST (SUCID AS TEXT) LIKE '%$campo%')" ; 
       }
       else
       {
           $nm_comando = "SELECT SUCID, SUCID FROM SUCURSAL WHERE (SUCID LIKE '%$campo%')" ; 
       }
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
   function SC_lookup_cliente($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT TERID, TERID FROM TERCEROS WHERE (CAST (TERID AS TEXT) LIKE '%$campo%')" ; 
       }
       else
       {
           $nm_comando = "SELECT TERID, TERID FROM TERCEROS WHERE (TERID LIKE '%$campo%')" ; 
       }
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
   function SC_lookup_vendedor($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT TERID, TERID FROM TERCEROS WHERE (CAST (TERID AS TEXT) LIKE '%$campo%')" ; 
       }
       else
       {
           $nm_comando = "SELECT TERID, TERID FROM TERCEROS WHERE (TERID LIKE '%$campo%')" ; 
       }
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
   function SC_lookup_bcoid($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT BCOID, BCOID FROM BANCO WHERE (CAST (BCOID AS TEXT) LIKE '%$campo%')" ; 
       }
       else
       {
           $nm_comando = "SELECT BCOID, BCOID FROM BANCO WHERE (BCOID LIKE '%$campo%')" ; 
       }
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
   function SC_lookup_concepto($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT CONCID, CONCID FROM CONCEPTO WHERE (CAST (CONCID AS TEXT) LIKE '%$campo%')" ; 
       }
       else
       {
           $nm_comando = "SELECT CONCID, CONCID FROM CONCEPTO WHERE (CONCID LIKE '%$campo%')" ; 
       }
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
   function SC_lookup_docuid($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT DOCUID, DOCUID FROM DOCUMENTO WHERE (CAST (DOCUID AS TEXT) LIKE '%$campo%')" ; 
       }
       else
       {
           $nm_comando = "SELECT DOCUID, DOCUID FROM DOCUMENTO WHERE (DOCUID LIKE '%$campo%')" ; 
       }
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
   function SC_lookup_despachar_a($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT TERID, TERID FROM TERCEROS WHERE (CAST (TERID AS TEXT) LIKE '%$campo%')" ; 
       }
       else
       {
           $nm_comando = "SELECT TERID, TERID FROM TERCEROS WHERE (TERID LIKE '%$campo%')" ; 
       }
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
   function SC_lookup_vehiculoid($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT VEHICULOID, VEHICULOID FROM VEHICULO WHERE (CAST (VEHICULOID AS TEXT) LIKE '%$campo%')" ; 
       }
       else
       {
           $nm_comando = "SELECT VEHICULOID, VEHICULOID FROM VEHICULO WHERE (VEHICULOID LIKE '%$campo%')" ; 
       }
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
   function SC_lookup_tipoica2id($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT TIPOICA2ID, TIPOICA2ID FROM TIPOICA2 WHERE (CAST (TIPOICA2ID AS TEXT) LIKE '%$campo%')" ; 
       }
       else
       {
           $nm_comando = "SELECT TIPOICA2ID, TIPOICA2ID FROM TIPOICA2 WHERE (TIPOICA2ID LIKE '%$campo%')" ; 
       }
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
   function SC_lookup_motivodevid($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT MOTIVODEVID, MOTIVODEVID FROM MOTIVODEV WHERE (CAST (MOTIVODEVID AS TEXT) LIKE '%$campo%')" ; 
       }
       else
       {
           $nm_comando = "SELECT MOTIVODEVID, MOTIVODEVID FROM MOTIVODEV WHERE (MOTIVODEVID LIKE '%$campo%')" ; 
       }
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
   function SC_lookup_motivocierre($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT MOTIVODEVID, MOTIVODEVID FROM MOTIVODEV WHERE (CAST (MOTIVODEVID AS TEXT) LIKE '%$campo%')" ; 
       }
       else
       {
           $nm_comando = "SELECT MOTIVODEVID, MOTIVODEVID FROM MOTIVODEV WHERE (MOTIVODEVID LIKE '%$campo%')" ; 
       }
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
   function SC_lookup_contratoinmid($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT CONTRATOINMID, CONTRATOINMID FROM CONTRATOINM WHERE (CAST (CONTRATOINMID AS TEXT) LIKE '%$campo%')" ; 
       }
       else
       {
           $nm_comando = "SELECT CONTRATOINMID, CONTRATOINMID FROM CONTRATOINM WHERE (CONTRATOINMID LIKE '%$campo%')" ; 
       }
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
   function SC_lookup_tipocreeid($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT TIPOCREEID, TIPOCREEID FROM TIPOCREE WHERE (CAST (TIPOCREEID AS TEXT) LIKE '%$campo%')" ; 
       }
       else
       {
           $nm_comando = "SELECT TIPOCREEID, TIPOCREEID FROM TIPOCREE WHERE (TIPOCREEID LIKE '%$campo%')" ; 
       }
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
   function SC_lookup_motreclamo($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT MOTIVODEVID, MOTIVODEVID FROM MOTIVODEV WHERE (CAST (MOTIVODEVID AS TEXT) LIKE '%$campo%')" ; 
       }
       else
       {
           $nm_comando = "SELECT MOTIVODEVID, MOTIVODEVID FROM MOTIVODEV WHERE (MOTIVODEVID LIKE '%$campo%')" ; 
       }
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
       $nmgp_saida_form = "form_KARDEX_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_KARDEX_mob_fim.php";
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
       form_KARDEX_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_KARDEX_mob']['masterValue']);
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
}
?>
