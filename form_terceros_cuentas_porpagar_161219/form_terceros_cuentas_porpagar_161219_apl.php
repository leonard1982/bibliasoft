<?php
//
class form_terceros_cuentas_porpagar_161219_apl
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
   var $idtercero_cuenta;
   var $prefijo;
   var $prefijo_1;
   var $numero;
   var $fecha;
   var $tercero;
   var $ie;
   var $ie_1;
   var $tipo;
   var $tipo_1;
   var $numero_documento;
   var $valor_total;
   var $saldo;
   var $observaciones;
   var $abonos;
   var $usuario;
   var $usuario_1;
   var $ultimo_abono;
   var $fecha_uabono;
   var $creado;
   var $creado_hora;
   var $editado;
   var $editado_hora;
   var $automatico;
   var $cod_cuenta;
   var $pagada;
   var $concepto;
   var $concepto_1;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
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
          if (isset($this->NM_ajax_info['param']['automatico']))
          {
              $this->automatico = $this->NM_ajax_info['param']['automatico'];
          }
          if (isset($this->NM_ajax_info['param']['cod_cuenta']))
          {
              $this->cod_cuenta = $this->NM_ajax_info['param']['cod_cuenta'];
          }
          if (isset($this->NM_ajax_info['param']['concepto']))
          {
              $this->concepto = $this->NM_ajax_info['param']['concepto'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['fecha']))
          {
              $this->fecha = $this->NM_ajax_info['param']['fecha'];
          }
          if (isset($this->NM_ajax_info['param']['idtercero_cuenta']))
          {
              $this->idtercero_cuenta = $this->NM_ajax_info['param']['idtercero_cuenta'];
          }
          if (isset($this->NM_ajax_info['param']['ie']))
          {
              $this->ie = $this->NM_ajax_info['param']['ie'];
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
          if (isset($this->NM_ajax_info['param']['numero']))
          {
              $this->numero = $this->NM_ajax_info['param']['numero'];
          }
          if (isset($this->NM_ajax_info['param']['numero_documento']))
          {
              $this->numero_documento = $this->NM_ajax_info['param']['numero_documento'];
          }
          if (isset($this->NM_ajax_info['param']['observaciones']))
          {
              $this->observaciones = $this->NM_ajax_info['param']['observaciones'];
          }
          if (isset($this->NM_ajax_info['param']['pagada']))
          {
              $this->pagada = $this->NM_ajax_info['param']['pagada'];
          }
          if (isset($this->NM_ajax_info['param']['prefijo']))
          {
              $this->prefijo = $this->NM_ajax_info['param']['prefijo'];
          }
          if (isset($this->NM_ajax_info['param']['saldo']))
          {
              $this->saldo = $this->NM_ajax_info['param']['saldo'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['tercero']))
          {
              $this->tercero = $this->NM_ajax_info['param']['tercero'];
          }
          if (isset($this->NM_ajax_info['param']['tipo']))
          {
              $this->tipo = $this->NM_ajax_info['param']['tipo'];
          }
          if (isset($this->NM_ajax_info['param']['usuario']))
          {
              $this->usuario = $this->NM_ajax_info['param']['usuario'];
          }
          if (isset($this->NM_ajax_info['param']['valor_total']))
          {
              $this->valor_total = $this->NM_ajax_info['param']['valor_total'];
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
      if (isset($this->gidtercero) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gidtercero'] = $this->gidtercero;
      }
      if (isset($_POST["gidtercero"]) && isset($this->gidtercero)) 
      {
          $_SESSION['gidtercero'] = $this->gidtercero;
      }
      if (isset($_GET["gidtercero"]) && isset($this->gidtercero)) 
      {
          $_SESSION['gidtercero'] = $this->gidtercero;
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_terceros_cuentas_porpagar_161219']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_terceros_cuentas_porpagar_161219']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_terceros_cuentas_porpagar_161219']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_terceros_cuentas_porpagar_161219']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_terceros_cuentas_porpagar_161219']['embutida_parms']);
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
                 nm_limpa_str_form_terceros_cuentas_porpagar_161219($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->gidtercero)) 
          {
              $_SESSION['gidtercero'] = $this->gidtercero;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_terceros_cuentas_porpagar_161219']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_terceros_cuentas_porpagar_161219']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_terceros_cuentas_porpagar_161219']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_terceros_cuentas_porpagar_161219']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->gidtercero)) 
          {
              $_SESSION['gidtercero'] = $this->gidtercero;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_terceros_cuentas_porpagar_161219']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_terceros_cuentas_porpagar_161219']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_terceros_cuentas_porpagar_161219']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_terceros_cuentas_porpagar_161219']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_terceros_cuentas_porpagar_161219']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_terceros_cuentas_porpagar_161219']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_terceros_cuentas_porpagar_161219']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_terceros_cuentas_porpagar_161219']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_terceros_cuentas_porpagar_161219']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_terceros_cuentas_porpagar_161219']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_terceros_cuentas_porpagar_161219_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_terceros_cuentas_porpagar_161219']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_terceros_cuentas_porpagar_161219']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_terceros_cuentas_porpagar_161219'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_terceros_cuentas_porpagar_161219']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_terceros_cuentas_porpagar_161219']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_terceros_cuentas_porpagar_161219') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_terceros_cuentas_porpagar_161219']['label'] = "Documento Tesoreria";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_terceros_cuentas_porpagar_161219")
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



      $_SESSION['scriptcase']['error_icon']['form_terceros_cuentas_porpagar_161219']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Lemon__NM__nm_scriptcase9_Lemon_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_terceros_cuentas_porpagar_161219'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "off";
      $this->nmgp_botoes['back'] = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last'] = "off";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_cuentas_porpagar_161219']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_terceros_cuentas_porpagar_161219'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_terceros_cuentas_porpagar_161219'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['dados_form'];
          if (!isset($this->abonos)){$this->abonos = $this->nmgp_dados_form['abonos'];} 
          if (!isset($this->ultimo_abono)){$this->ultimo_abono = $this->nmgp_dados_form['ultimo_abono'];} 
          if (!isset($this->fecha_uabono)){$this->fecha_uabono = $this->nmgp_dados_form['fecha_uabono'];} 
          if (!isset($this->creado)){$this->creado = $this->nmgp_dados_form['creado'];} 
          if (!isset($this->editado)){$this->editado = $this->nmgp_dados_form['editado'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_terceros_cuentas_porpagar_161219", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_terceros_cuentas_porpagar_161219/form_terceros_cuentas_porpagar_161219_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_terceros_cuentas_porpagar_161219_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_terceros_cuentas_porpagar_161219_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_terceros_cuentas_porpagar_161219_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_terceros_cuentas_porpagar_161219/form_terceros_cuentas_porpagar_161219_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_terceros_cuentas_porpagar_161219_erro.class.php"); 
      }
      $this->Erro      = new form_terceros_cuentas_porpagar_161219_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['opcao']))
         { 
             if ($this->idtercero_cuenta != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_cuentas_porpagar_161219']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['form_terceros_cuentas_porpagar_161219']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['form_terceros_cuentas_porpagar_161219']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
      if (isset($this->idtercero_cuenta)) { $this->nm_limpa_alfa($this->idtercero_cuenta); }
      if (isset($this->prefijo)) { $this->nm_limpa_alfa($this->prefijo); }
      if (isset($this->numero)) { $this->nm_limpa_alfa($this->numero); }
      if (isset($this->tercero)) { $this->nm_limpa_alfa($this->tercero); }
      if (isset($this->ie)) { $this->nm_limpa_alfa($this->ie); }
      if (isset($this->tipo)) { $this->nm_limpa_alfa($this->tipo); }
      if (isset($this->numero_documento)) { $this->nm_limpa_alfa($this->numero_documento); }
      if (isset($this->valor_total)) { $this->nm_limpa_alfa($this->valor_total); }
      if (isset($this->saldo)) { $this->nm_limpa_alfa($this->saldo); }
      if (isset($this->observaciones)) { $this->nm_limpa_alfa($this->observaciones); }
      if (isset($this->usuario)) { $this->nm_limpa_alfa($this->usuario); }
      if (isset($this->automatico)) { $this->nm_limpa_alfa($this->automatico); }
      if (isset($this->cod_cuenta)) { $this->nm_limpa_alfa($this->cod_cuenta); }
      if (isset($this->pagada)) { $this->nm_limpa_alfa($this->pagada); }
      if (isset($this->concepto)) { $this->nm_limpa_alfa($this->concepto); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- numero
      $this->field_config['numero']               = array();
      $this->field_config['numero']['symbol_grp'] = '';
      $this->field_config['numero']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['numero']['symbol_dec'] = '';
      $this->field_config['numero']['symbol_neg'] = '-';
      $this->field_config['numero']['format_neg'] = '4';
      //-- fecha
      $this->field_config['fecha']                 = array();
      $this->field_config['fecha']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fecha']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fecha');
      //-- valor_total
      $this->field_config['valor_total']               = array();
      $this->field_config['valor_total']['symbol_grp'] = ',';
      $this->field_config['valor_total']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valor_total']['symbol_dec'] = '.';
      $this->field_config['valor_total']['symbol_mon'] = '$';
      $this->field_config['valor_total']['format_pos'] = '3';
      $this->field_config['valor_total']['format_neg'] = '4';
      //-- saldo
      $this->field_config['saldo']               = array();
      $this->field_config['saldo']['symbol_grp'] = ',';
      $this->field_config['saldo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['saldo']['symbol_dec'] = '.';
      $this->field_config['saldo']['symbol_mon'] = '$';
      $this->field_config['saldo']['format_pos'] = '3';
      $this->field_config['saldo']['format_neg'] = '4';
      //-- idtercero_cuenta
      $this->field_config['idtercero_cuenta']               = array();
      $this->field_config['idtercero_cuenta']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idtercero_cuenta']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idtercero_cuenta']['symbol_dec'] = '';
      $this->field_config['idtercero_cuenta']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idtercero_cuenta']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- abonos
      $this->field_config['abonos']               = array();
      $this->field_config['abonos']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['abonos']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['abonos']['symbol_dec'] = '';
      $this->field_config['abonos']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['abonos']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fecha_uabono
      $this->field_config['fecha_uabono']                 = array();
      $this->field_config['fecha_uabono']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fecha_uabono']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha_uabono']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fecha_uabono');
      //-- creado
      $this->field_config['creado']                 = array();
      $this->field_config['creado']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['creado']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['creado']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['creado']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'creado');
      //-- editado
      $this->field_config['editado']                 = array();
      $this->field_config['editado']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['editado']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['editado']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['editado']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'editado');
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
          if ('validate_prefijo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'prefijo');
          }
          if ('validate_numero' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numero');
          }
          if ('validate_fecha' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecha');
          }
          if ('validate_cod_cuenta' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cod_cuenta');
          }
          if ('validate_tipo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo');
          }
          if ('validate_tercero' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tercero');
          }
          if ('validate_numero_documento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numero_documento');
          }
          if ('validate_valor_total' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valor_total');
          }
          if ('validate_saldo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'saldo');
          }
          if ('validate_concepto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'concepto');
          }
          if ('validate_observaciones' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'observaciones');
          }
          if ('validate_usuario' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'usuario');
          }
          if ('validate_automatico' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'automatico');
          }
          if ('validate_pagada' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pagada');
          }
          if ('validate_idtercero_cuenta' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idtercero_cuenta');
          }
          if ('validate_ie' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ie');
          }
          form_terceros_cuentas_porpagar_161219_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_cod_cuenta_onchange' == $this->NM_ajax_opcao)
          {
              $this->cod_cuenta_onChange();
          }
          if ('event_prefijo_onchange' == $this->NM_ajax_opcao)
          {
              $this->prefijo_onChange();
          }
          form_terceros_cuentas_porpagar_161219_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('autocomp_tercero' == $this->NM_ajax_opcao)
          {
              if (isset($_GET['term'])) {
                  $this->tercero = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->tercero = '';
              }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tercero']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tercero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tercero']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tercero'] = array(); 
    }

   $old_value_numero = $this->numero;
   $old_value_fecha = $this->fecha;
   $old_value_valor_total = $this->valor_total;
   $old_value_saldo = $this->saldo;
   $old_value_idtercero_cuenta = $this->idtercero_cuenta;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero = $this->numero;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_valor_total = $this->valor_total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idtercero_cuenta = $this->idtercero_cuenta;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + ' - ' + nombres FROM terceros WHERE documento + ' - ' + nombres LIKE '%" . substr($this->Db->qstr($this->tercero), 1, -1) . "%' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento,' - ',nombres) FROM terceros WHERE concat(documento,' - ',nombres) LIKE '%" . substr($this->Db->qstr($this->tercero), 1, -1) . "%' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&' - '&nombres FROM terceros WHERE documento&' - '&nombres LIKE '%" . substr($this->Db->qstr($this->tercero), 1, -1) . "%' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||' - '||nombres FROM terceros WHERE documento||' - '||nombres LIKE '%" . substr($this->Db->qstr($this->tercero), 1, -1) . "%' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + ' - ' + nombres FROM terceros WHERE documento + ' - ' + nombres LIKE '%" . substr($this->Db->qstr($this->tercero), 1, -1) . "%' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||' - '||nombres FROM terceros WHERE documento||' - '||nombres LIKE '%" . substr($this->Db->qstr($this->tercero), 1, -1) . "%' ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||' - '||nombres FROM terceros WHERE documento||' - '||nombres LIKE '%" . substr($this->Db->qstr($this->tercero), 1, -1) . "%' ORDER BY documento, nombres";
   }

   $this->numero = $old_value_numero;
   $this->fecha = $old_value_fecha;
   $this->valor_total = $old_value_valor_total;
   $this->saldo = $old_value_saldo;
   $this->idtercero_cuenta = $old_value_idtercero_cuenta;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_terceros_cuentas_porpagar_161219_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_terceros_cuentas_porpagar_161219_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tercero'][] = $rs->fields[0];
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
              $AjaxLim = 0;
              $aResponse = array();
              foreach ($aLookup as $sLkpIndex => $aLkpList)
              {
                  $AjaxLim++;
                  if ($AjaxLim > 10)
                  {
                      break;
                  }
                  foreach ($aLkpList as $sLkpIndex => $sLkpValue)
                  {
                      $sLkpIndex = str_replace(array("\r", "\n"), array('', '<br />'), $sLkpIndex);
                      $sLkpValue = str_replace(array("\r", "\n"), array('', '<br />'), $sLkpValue);
                      $aResponse[] = array('text' => $sLkpValue, 'id' => $sLkpIndex);
                  }
              }
              $oJson = new Services_JSON();
              echo $oJson->encode(array('results' => $aResponse));
              exit;
          }
          form_terceros_cuentas_porpagar_161219_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_terceros_cuentas_porpagar_161219_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_terceros_cuentas_porpagar_161219']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_terceros_cuentas_porpagar_161219_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['sc_redir_atualiz'] == "ok")
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
          form_terceros_cuentas_porpagar_161219_pack_ajax_response();
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
          form_terceros_cuentas_porpagar_161219_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_terceros_cuentas_porpagar_161219.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Documento Tesoreria") ?></TITLE>
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
<form name="Fdown" method="get" action="form_terceros_cuentas_porpagar_161219_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_terceros_cuentas_porpagar_161219"> 
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
           case 'prefijo':
               return "Prefijo";
               break;
           case 'numero':
               return "Numero";
               break;
           case 'fecha':
               return "Fecha";
               break;
           case 'cod_cuenta':
               return "Cuenta";
               break;
           case 'tipo':
               return "Tipo";
               break;
           case 'tercero':
               return "Tercero";
               break;
           case 'numero_documento':
               return "No Documento";
               break;
           case 'valor_total':
               return "Valor Total";
               break;
           case 'saldo':
               return "Saldo";
               break;
           case 'concepto':
               return "Concepto";
               break;
           case 'observaciones':
               return "Observaciones";
               break;
           case 'usuario':
               return "Usuario/Asesor";
               break;
           case 'automatico':
               return "Automatico";
               break;
           case 'pagada':
               return "Pagada";
               break;
           case 'idtercero_cuenta':
               return "Idtercero Cuenta";
               break;
           case 'ie':
               return "Cuenta";
               break;
           case 'abonos':
               return "Abonos";
               break;
           case 'ultimo_abono':
               return "Ultimo Abono";
               break;
           case 'fecha_uabono':
               return "Fecha Uabono";
               break;
           case 'creado':
               return "Creado";
               break;
           case 'editado':
               return "Editado";
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
     if (is_array($filtro) && empty($filtro)) {
         $filtro = '';
     }
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if (!is_array($filtro) && '' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_terceros_cuentas_porpagar_161219']) || !is_array($this->NM_ajax_info['errList']['geral_form_terceros_cuentas_porpagar_161219']))
              {
                  $this->NM_ajax_info['errList']['geral_form_terceros_cuentas_porpagar_161219'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_terceros_cuentas_porpagar_161219'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'prefijo' == $filtro)) || (is_array($filtro) && in_array('prefijo', $filtro)))
        $this->ValidateField_prefijo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'numero' == $filtro)) || (is_array($filtro) && in_array('numero', $filtro)))
        $this->ValidateField_numero($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fecha' == $filtro)) || (is_array($filtro) && in_array('fecha', $filtro)))
        $this->ValidateField_fecha($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cod_cuenta' == $filtro)) || (is_array($filtro) && in_array('cod_cuenta', $filtro)))
        $this->ValidateField_cod_cuenta($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipo' == $filtro)) || (is_array($filtro) && in_array('tipo', $filtro)))
        $this->ValidateField_tipo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tercero' == $filtro)) || (is_array($filtro) && in_array('tercero', $filtro)))
        $this->ValidateField_tercero($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'numero_documento' == $filtro)) || (is_array($filtro) && in_array('numero_documento', $filtro)))
        $this->ValidateField_numero_documento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'valor_total' == $filtro)) || (is_array($filtro) && in_array('valor_total', $filtro)))
        $this->ValidateField_valor_total($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'saldo' == $filtro)) || (is_array($filtro) && in_array('saldo', $filtro)))
        $this->ValidateField_saldo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'concepto' == $filtro)) || (is_array($filtro) && in_array('concepto', $filtro)))
        $this->ValidateField_concepto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'observaciones' == $filtro)) || (is_array($filtro) && in_array('observaciones', $filtro)))
        $this->ValidateField_observaciones($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'usuario' == $filtro)) || (is_array($filtro) && in_array('usuario', $filtro)))
        $this->ValidateField_usuario($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'automatico' == $filtro)) || (is_array($filtro) && in_array('automatico', $filtro)))
        $this->ValidateField_automatico($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'pagada' == $filtro)) || (is_array($filtro) && in_array('pagada', $filtro)))
        $this->ValidateField_pagada($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'idtercero_cuenta' == $filtro)) || (is_array($filtro) && in_array('idtercero_cuenta', $filtro)))
        $this->ValidateField_idtercero_cuenta($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ie' == $filtro)) || (is_array($filtro) && in_array('ie', $filtro)))
        $this->ValidateField_ie($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---
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

    function ValidateField_prefijo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->prefijo == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['php_cmp_required']['prefijo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['php_cmp_required']['prefijo'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Prefijo" ; 
          if (!isset($Campos_Erros['prefijo']))
          {
              $Campos_Erros['prefijo'] = array();
          }
          $Campos_Erros['prefijo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['prefijo']) || !is_array($this->NM_ajax_info['errList']['prefijo']))
          {
              $this->NM_ajax_info['errList']['prefijo'] = array();
          }
          $this->NM_ajax_info['errList']['prefijo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->prefijo) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_prefijo']) && !in_array($this->prefijo, $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_prefijo']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['prefijo']))
              {
                  $Campos_Erros['prefijo'] = array();
              }
              $Campos_Erros['prefijo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['prefijo']) || !is_array($this->NM_ajax_info['errList']['prefijo']))
              {
                  $this->NM_ajax_info['errList']['prefijo'] = array();
              }
              $this->NM_ajax_info['errList']['prefijo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'prefijo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_prefijo

    function ValidateField_numero(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->numero, $this->field_config['numero']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->numero != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->numero) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Numero: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['numero']))
                  {
                      $Campos_Erros['numero'] = array();
                  }
                  $Campos_Erros['numero'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['numero']) || !is_array($this->NM_ajax_info['errList']['numero']))
                  {
                      $this->NM_ajax_info['errList']['numero'] = array();
                  }
                  $this->NM_ajax_info['errList']['numero'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->numero, 10, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Numero; " ; 
                  if (!isset($Campos_Erros['numero']))
                  {
                      $Campos_Erros['numero'] = array();
                  }
                  $Campos_Erros['numero'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['numero']) || !is_array($this->NM_ajax_info['errList']['numero']))
                  {
                      $this->NM_ajax_info['errList']['numero'] = array();
                  }
                  $this->NM_ajax_info['errList']['numero'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['php_cmp_required']['numero']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['php_cmp_required']['numero'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Numero" ; 
              if (!isset($Campos_Erros['numero']))
              {
                  $Campos_Erros['numero'] = array();
              }
              $Campos_Erros['numero'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['numero']) || !is_array($this->NM_ajax_info['errList']['numero']))
                  {
                      $this->NM_ajax_info['errList']['numero'] = array();
                  }
                  $this->NM_ajax_info['errList']['numero'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
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

    function ValidateField_fecha(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fecha, $this->field_config['fecha']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fecha']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fecha']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fecha']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fecha']['date_sep']) ; 
          if (trim($this->fecha) != "")  
          { 
              if ($teste_validade->Data($this->fecha, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecha; " ; 
                  if (!isset($Campos_Erros['fecha']))
                  {
                      $Campos_Erros['fecha'] = array();
                  }
                  $Campos_Erros['fecha'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecha']) || !is_array($this->NM_ajax_info['errList']['fecha']))
                  {
                      $this->NM_ajax_info['errList']['fecha'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecha'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fecha']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecha';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fecha

    function ValidateField_cod_cuenta(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->cod_cuenta = sc_strtoupper($this->cod_cuenta); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cod_cuenta) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cuenta " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
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
      $Teste_trab = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789/";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->cod_cuenta ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->cod_cuenta, $_SESSION['scriptcase']['charset']); $x++) 
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
              $Campos_Crit .= "Cuenta " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['cod_cuenta']))
              {
                  $Campos_Erros['cod_cuenta'] = array();
              }
              $Campos_Erros['cod_cuenta'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['cod_cuenta']) || !is_array($this->NM_ajax_info['errList']['cod_cuenta']))
              {
                  $this->NM_ajax_info['errList']['cod_cuenta'] = array();
              }
              $this->NM_ajax_info['errList']['cod_cuenta'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
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

    function ValidateField_tipo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tipo == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['php_cmp_required']['tipo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['php_cmp_required']['tipo'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Tipo" ; 
          if (!isset($Campos_Erros['tipo']))
          {
              $Campos_Erros['tipo'] = array();
          }
          $Campos_Erros['tipo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['tipo']) || !is_array($this->NM_ajax_info['errList']['tipo']))
          {
              $this->NM_ajax_info['errList']['tipo'] = array();
          }
          $this->NM_ajax_info['errList']['tipo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->tipo) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tipo']) && !in_array($this->tipo, $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tipo']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['tipo']))
              {
                  $Campos_Erros['tipo'] = array();
              }
              $Campos_Erros['tipo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['tipo']) || !is_array($this->NM_ajax_info['errList']['tipo']))
              {
                  $this->NM_ajax_info['errList']['tipo'] = array();
              }
              $this->NM_ajax_info['errList']['tipo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipo

    function ValidateField_tercero(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->tercero = sc_strtoupper($this->tercero); 
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['php_cmp_required']['tercero']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['php_cmp_required']['tercero'] == "on")) 
      { 
          if ($this->tercero == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Tercero" ; 
              if (!isset($Campos_Erros['tercero']))
              {
                  $Campos_Erros['tercero'] = array();
              }
              $Campos_Erros['tercero'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['tercero']) || !is_array($this->NM_ajax_info['errList']['tercero']))
                  {
                      $this->NM_ajax_info['errList']['tercero'] = array();
                  }
                  $this->NM_ajax_info['errList']['tercero'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tercero) > 11) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tercero " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tercero']))
              {
                  $Campos_Erros['tercero'] = array();
              }
              $Campos_Erros['tercero'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tercero']) || !is_array($this->NM_ajax_info['errList']['tercero']))
              {
                  $this->NM_ajax_info['errList']['tercero'] = array();
              }
              $this->NM_ajax_info['errList']['tercero'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tercero';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tercero

    function ValidateField_numero_documento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->numero_documento = sc_strtoupper($this->numero_documento); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->numero_documento) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "No Documento " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['numero_documento']))
              {
                  $Campos_Erros['numero_documento'] = array();
              }
              $Campos_Erros['numero_documento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['numero_documento']) || !is_array($this->NM_ajax_info['errList']['numero_documento']))
              {
                  $this->NM_ajax_info['errList']['numero_documento'] = array();
              }
              $this->NM_ajax_info['errList']['numero_documento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'numero_documento';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_numero_documento

    function ValidateField_valor_total(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if (!empty($this->field_config['valor_total']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valor_total, $this->field_config['valor_total']['symbol_dec'], $this->field_config['valor_total']['symbol_grp'], $this->field_config['valor_total']['symbol_mon']); 
          nm_limpa_valor($this->valor_total, $this->field_config['valor_total']['symbol_dec'], $this->field_config['valor_total']['symbol_grp']) ; 
          if ('.' == substr($this->valor_total, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->valor_total, 1)))
              {
                  $this->valor_total = '';
              }
              else
              {
                  $this->valor_total = '0' . $this->valor_total;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->valor_total != '')  
          { 
              $iTestSize = 16;
              if ('-' == substr($this->valor_total, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->valor_total, -1))
              {
                  $iTestSize++;
                  $this->valor_total = '-' . substr($this->valor_total, 0, -1);
              }
              if (strlen($this->valor_total) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valor Total: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valor_total']))
                  {
                      $Campos_Erros['valor_total'] = array();
                  }
                  $Campos_Erros['valor_total'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valor_total']) || !is_array($this->NM_ajax_info['errList']['valor_total']))
                  {
                      $this->NM_ajax_info['errList']['valor_total'] = array();
                  }
                  $this->NM_ajax_info['errList']['valor_total'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valor_total, 15, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valor Total; " ; 
                  if (!isset($Campos_Erros['valor_total']))
                  {
                      $Campos_Erros['valor_total'] = array();
                  }
                  $Campos_Erros['valor_total'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valor_total']) || !is_array($this->NM_ajax_info['errList']['valor_total']))
                  {
                      $this->NM_ajax_info['errList']['valor_total'] = array();
                  }
                  $this->NM_ajax_info['errList']['valor_total'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['php_cmp_required']['valor_total']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['php_cmp_required']['valor_total'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Valor Total" ; 
              if (!isset($Campos_Erros['valor_total']))
              {
                  $Campos_Erros['valor_total'] = array();
              }
              $Campos_Erros['valor_total'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['valor_total']) || !is_array($this->NM_ajax_info['errList']['valor_total']))
                  {
                      $this->NM_ajax_info['errList']['valor_total'] = array();
                  }
                  $this->NM_ajax_info['errList']['valor_total'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valor_total';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valor_total

    function ValidateField_saldo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->saldo === "" || is_null($this->saldo))  
      { 
          $this->saldo = 0;
          $this->sc_force_zero[] = 'saldo';
      } 
      }
      if (!empty($this->field_config['saldo']['symbol_dec']))
      {
          $this->sc_remove_currency($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp'], $this->field_config['saldo']['symbol_mon']); 
          nm_limpa_valor($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp']) ; 
          if ('.' == substr($this->saldo, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->saldo, 1)))
              {
                  $this->saldo = '';
              }
              else
              {
                  $this->saldo = '0' . $this->saldo;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->saldo != '')  
          { 
              $iTestSize = 16;
              if ('-' == substr($this->saldo, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->saldo, -1))
              {
                  $iTestSize++;
                  $this->saldo = '-' . substr($this->saldo, 0, -1);
              }
              if (strlen($this->saldo) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Saldo: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['saldo']))
                  {
                      $Campos_Erros['saldo'] = array();
                  }
                  $Campos_Erros['saldo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['saldo']) || !is_array($this->NM_ajax_info['errList']['saldo']))
                  {
                      $this->NM_ajax_info['errList']['saldo'] = array();
                  }
                  $this->NM_ajax_info['errList']['saldo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->saldo, 15, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Saldo; " ; 
                  if (!isset($Campos_Erros['saldo']))
                  {
                      $Campos_Erros['saldo'] = array();
                  }
                  $Campos_Erros['saldo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['saldo']) || !is_array($this->NM_ajax_info['errList']['saldo']))
                  {
                      $this->NM_ajax_info['errList']['saldo'] = array();
                  }
                  $this->NM_ajax_info['errList']['saldo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'saldo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_saldo

    function ValidateField_concepto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->concepto) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_concepto']) && !in_array($this->concepto, $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_concepto']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['concepto']))
                   {
                       $Campos_Erros['concepto'] = array();
                   }
                   $Campos_Erros['concepto'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['concepto']) || !is_array($this->NM_ajax_info['errList']['concepto']))
                   {
                       $this->NM_ajax_info['errList']['concepto'] = array();
                   }
                   $this->NM_ajax_info['errList']['concepto'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'concepto';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_concepto

    function ValidateField_observaciones(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->observaciones = sc_strtoupper($this->observaciones); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->observaciones) > 32767) 
          { 
              $hasError = true;
              $Campos_Crit .= "Observaciones " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['observaciones']))
              {
                  $Campos_Erros['observaciones'] = array();
              }
              $Campos_Erros['observaciones'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['observaciones']) || !is_array($this->NM_ajax_info['errList']['observaciones']))
              {
                  $this->NM_ajax_info['errList']['observaciones'] = array();
              }
              $this->NM_ajax_info['errList']['observaciones'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'observaciones';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_observaciones

    function ValidateField_usuario(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->usuario) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_usuario']) && !in_array($this->usuario, $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_usuario']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['usuario']))
                   {
                       $Campos_Erros['usuario'] = array();
                   }
                   $Campos_Erros['usuario'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['usuario']) || !is_array($this->NM_ajax_info['errList']['usuario']))
                   {
                       $this->NM_ajax_info['errList']['usuario'] = array();
                   }
                   $this->NM_ajax_info['errList']['usuario'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'usuario';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_usuario

    function ValidateField_automatico(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->automatico) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Automatico " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['automatico']))
              {
                  $Campos_Erros['automatico'] = array();
              }
              $Campos_Erros['automatico'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['automatico']) || !is_array($this->NM_ajax_info['errList']['automatico']))
              {
                  $this->NM_ajax_info['errList']['automatico'] = array();
              }
              $this->NM_ajax_info['errList']['automatico'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'automatico';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_automatico

    function ValidateField_pagada(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->pagada) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Pagada " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['pagada']))
              {
                  $Campos_Erros['pagada'] = array();
              }
              $Campos_Erros['pagada'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['pagada']) || !is_array($this->NM_ajax_info['errList']['pagada']))
              {
                  $this->NM_ajax_info['errList']['pagada'] = array();
              }
              $this->NM_ajax_info['errList']['pagada'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pagada';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pagada

    function ValidateField_idtercero_cuenta(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idtercero_cuenta === "" || is_null($this->idtercero_cuenta))  
      { 
          $this->idtercero_cuenta = 0;
      } 
      nm_limpa_numero($this->idtercero_cuenta, $this->field_config['idtercero_cuenta']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->idtercero_cuenta != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->idtercero_cuenta) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Idtercero Cuenta: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['idtercero_cuenta']))
                  {
                      $Campos_Erros['idtercero_cuenta'] = array();
                  }
                  $Campos_Erros['idtercero_cuenta'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['idtercero_cuenta']) || !is_array($this->NM_ajax_info['errList']['idtercero_cuenta']))
                  {
                      $this->NM_ajax_info['errList']['idtercero_cuenta'] = array();
                  }
                  $this->NM_ajax_info['errList']['idtercero_cuenta'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->idtercero_cuenta, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Idtercero Cuenta; " ; 
                  if (!isset($Campos_Erros['idtercero_cuenta']))
                  {
                      $Campos_Erros['idtercero_cuenta'] = array();
                  }
                  $Campos_Erros['idtercero_cuenta'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['idtercero_cuenta']) || !is_array($this->NM_ajax_info['errList']['idtercero_cuenta']))
                  {
                      $this->NM_ajax_info['errList']['idtercero_cuenta'] = array();
                  }
                  $this->NM_ajax_info['errList']['idtercero_cuenta'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idtercero_cuenta';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idtercero_cuenta

    function ValidateField_ie(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ie == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['php_cmp_required']['ie']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['php_cmp_required']['ie'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Cuenta" ;
          if (!isset($Campos_Erros['ie']))
          {
              $Campos_Erros['ie'] = array();
          }
          $Campos_Erros['ie'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['ie']) || !is_array($this->NM_ajax_info['errList']['ie']))
                  {
                      $this->NM_ajax_info['errList']['ie'] = array();
                  }
                  $this->NM_ajax_info['errList']['ie'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ie';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ie

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
    $this->nmgp_dados_form['prefijo'] = $this->prefijo;
    $this->nmgp_dados_form['numero'] = $this->numero;
    $this->nmgp_dados_form['fecha'] = (strlen(trim($this->fecha)) > 19) ? str_replace(".", ":", $this->fecha) : trim($this->fecha);
    $this->nmgp_dados_form['cod_cuenta'] = $this->cod_cuenta;
    $this->nmgp_dados_form['tipo'] = $this->tipo;
    $this->nmgp_dados_form['tercero'] = $this->tercero;
    $this->nmgp_dados_form['numero_documento'] = $this->numero_documento;
    $this->nmgp_dados_form['valor_total'] = $this->valor_total;
    $this->nmgp_dados_form['saldo'] = $this->saldo;
    $this->nmgp_dados_form['concepto'] = $this->concepto;
    $this->nmgp_dados_form['observaciones'] = $this->observaciones;
    $this->nmgp_dados_form['usuario'] = $this->usuario;
    $this->nmgp_dados_form['automatico'] = $this->automatico;
    $this->nmgp_dados_form['pagada'] = $this->pagada;
    $this->nmgp_dados_form['idtercero_cuenta'] = $this->idtercero_cuenta;
    $this->nmgp_dados_form['ie'] = $this->ie;
    $this->nmgp_dados_form['abonos'] = $this->abonos;
    $this->nmgp_dados_form['ultimo_abono'] = $this->ultimo_abono;
    $this->nmgp_dados_form['fecha_uabono'] = $this->fecha_uabono;
    $this->nmgp_dados_form['creado'] = $this->creado;
    $this->nmgp_dados_form['editado'] = $this->editado;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['numero'] = $this->numero;
      nm_limpa_numero($this->numero, $this->field_config['numero']['symbol_grp']) ; 
      $this->Before_unformat['fecha'] = $this->fecha;
      nm_limpa_data($this->fecha, $this->field_config['fecha']['date_sep']) ; 
      $this->Before_unformat['valor_total'] = $this->valor_total;
      if (!empty($this->field_config['valor_total']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valor_total, $this->field_config['valor_total']['symbol_dec'], $this->field_config['valor_total']['symbol_grp'], $this->field_config['valor_total']['symbol_mon']);
         nm_limpa_valor($this->valor_total, $this->field_config['valor_total']['symbol_dec'], $this->field_config['valor_total']['symbol_grp']);
      }
      $this->Before_unformat['saldo'] = $this->saldo;
      if (!empty($this->field_config['saldo']['symbol_dec']))
      {
         $this->sc_remove_currency($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp'], $this->field_config['saldo']['symbol_mon']);
         nm_limpa_valor($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp']);
      }
      $this->Before_unformat['idtercero_cuenta'] = $this->idtercero_cuenta;
      nm_limpa_numero($this->idtercero_cuenta, $this->field_config['idtercero_cuenta']['symbol_grp']) ; 
      $this->Before_unformat['abonos'] = $this->abonos;
      nm_limpa_numero($this->abonos, $this->field_config['abonos']['symbol_grp']) ; 
      $this->Before_unformat['fecha_uabono'] = $this->fecha_uabono;
      nm_limpa_data($this->fecha_uabono, $this->field_config['fecha_uabono']['date_sep']) ; 
      $this->Before_unformat['creado'] = $this->creado;
      $this->Before_unformat['creado_hora'] = $this->creado_hora;
      nm_limpa_data($this->creado, $this->field_config['creado']['date_sep']) ; 
      nm_limpa_hora($this->creado_hora, $this->field_config['creado']['time_sep']) ; 
      $this->Before_unformat['editado'] = $this->editado;
      $this->Before_unformat['editado_hora'] = $this->editado_hora;
      nm_limpa_data($this->editado, $this->field_config['editado']['date_sep']) ; 
      nm_limpa_hora($this->editado_hora, $this->field_config['editado']['time_sep']) ; 
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
      if ($Nome_Campo == "numero")
      {
          nm_limpa_numero($this->numero, $this->field_config['numero']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "valor_total")
      {
          if (!empty($this->field_config['valor_total']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valor_total, $this->field_config['valor_total']['symbol_dec'], $this->field_config['valor_total']['symbol_grp'], $this->field_config['valor_total']['symbol_mon']);
             nm_limpa_valor($this->valor_total, $this->field_config['valor_total']['symbol_dec'], $this->field_config['valor_total']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "saldo")
      {
          if (!empty($this->field_config['saldo']['symbol_dec']))
          {
             $this->sc_remove_currency($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp'], $this->field_config['saldo']['symbol_mon']);
             nm_limpa_valor($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "idtercero_cuenta")
      {
          nm_limpa_numero($this->idtercero_cuenta, $this->field_config['idtercero_cuenta']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "abonos")
      {
          nm_limpa_numero($this->abonos, $this->field_config['abonos']['symbol_grp']) ; 
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
      if ('' !== $this->numero || (!empty($format_fields) && isset($format_fields['numero'])))
      {
          nmgp_Form_Num_Val($this->numero, $this->field_config['numero']['symbol_grp'], $this->field_config['numero']['symbol_dec'], "0", "S", $this->field_config['numero']['format_neg'], "", "", "-", $this->field_config['numero']['symbol_fmt']) ; 
      }
      if ((!empty($this->fecha) && 'null' != $this->fecha) || (!empty($format_fields) && isset($format_fields['fecha'])))
      {
          nm_volta_data($this->fecha, $this->field_config['fecha']['date_format']) ; 
          nmgp_Form_Datas($this->fecha, $this->field_config['fecha']['date_format'], $this->field_config['fecha']['date_sep']) ;  
      }
      elseif ('null' == $this->fecha || '' == $this->fecha)
      {
          $this->fecha = '';
      }
      if ('' !== $this->valor_total || (!empty($format_fields) && isset($format_fields['valor_total'])))
      {
          nmgp_Form_Num_Val($this->valor_total, $this->field_config['valor_total']['symbol_grp'], $this->field_config['valor_total']['symbol_dec'], "0", "S", $this->field_config['valor_total']['format_neg'], "", "", "-", $this->field_config['valor_total']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['valor_total']['symbol_mon'];
          $this->sc_add_currency($this->valor_total, $sMonSymb, $this->field_config['valor_total']['format_pos']); 
      }
      if ('' !== $this->saldo || (!empty($format_fields) && isset($format_fields['saldo'])))
      {
          nmgp_Form_Num_Val($this->saldo, $this->field_config['saldo']['symbol_grp'], $this->field_config['saldo']['symbol_dec'], "0", "S", $this->field_config['saldo']['format_neg'], "", "", "-", $this->field_config['saldo']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['saldo']['symbol_mon'];
          $this->sc_add_currency($this->saldo, $sMonSymb, $this->field_config['saldo']['format_pos']); 
      }
      if ('' !== $this->idtercero_cuenta || (!empty($format_fields) && isset($format_fields['idtercero_cuenta'])))
      {
          nmgp_Form_Num_Val($this->idtercero_cuenta, $this->field_config['idtercero_cuenta']['symbol_grp'], $this->field_config['idtercero_cuenta']['symbol_dec'], "0", "S", $this->field_config['idtercero_cuenta']['format_neg'], "", "", "-", $this->field_config['idtercero_cuenta']['symbol_fmt']) ; 
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
      $guarda_format_hora = $this->field_config['fecha']['date_format'];
      if ($this->fecha != "")  
      { 
          nm_conv_data($this->fecha, $this->field_config['fecha']['date_format']) ; 
          $this->fecha_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fecha_hora = substr($this->fecha_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fecha_hora = substr($this->fecha_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fecha_hora = substr($this->fecha_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fecha_hora = substr($this->fecha_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fecha_hora = substr($this->fecha_hora, 0, -4);
          }
      } 
      if ($this->fecha == "" && $use_null)  
      { 
          $this->fecha = "null" ; 
      } 
      $this->field_config['fecha']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_prefijo();
          $this->ajax_return_values_numero();
          $this->ajax_return_values_fecha();
          $this->ajax_return_values_cod_cuenta();
          $this->ajax_return_values_tipo();
          $this->ajax_return_values_tercero();
          $this->ajax_return_values_numero_documento();
          $this->ajax_return_values_valor_total();
          $this->ajax_return_values_saldo();
          $this->ajax_return_values_concepto();
          $this->ajax_return_values_observaciones();
          $this->ajax_return_values_usuario();
          $this->ajax_return_values_automatico();
          $this->ajax_return_values_pagada();
          $this->ajax_return_values_idtercero_cuenta();
          $this->ajax_return_values_ie();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idtercero_cuenta']['keyVal'] = form_terceros_cuentas_porpagar_161219_pack_protect_string($this->nmgp_dados_form['idtercero_cuenta']);
          }
   } // ajax_return_values

          //----- prefijo
   function ajax_return_values_prefijo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("prefijo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->prefijo);
              $aLookup = array();
              $this->_tmp_lookup_prefijo = $this->prefijo;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_prefijo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_prefijo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_prefijo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_prefijo'] = array(); 
}
$aLookup[] = array(form_terceros_cuentas_porpagar_161219_pack_protect_string('00') => str_replace('<', '&lt;',form_terceros_cuentas_porpagar_161219_pack_protect_string('00')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_prefijo'][] = '00';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_numero = $this->numero;
   $old_value_fecha = $this->fecha;
   $old_value_valor_total = $this->valor_total;
   $old_value_saldo = $this->saldo;
   $old_value_idtercero_cuenta = $this->idtercero_cuenta;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero = $this->numero;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_valor_total = $this->valor_total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idtercero_cuenta = $this->idtercero_cuenta;

   $nm_comando = "SELECT Idres, prefijo  FROM resdian  ORDER BY prefijo";

   $this->numero = $old_value_numero;
   $this->fecha = $old_value_fecha;
   $this->valor_total = $old_value_valor_total;
   $this->saldo = $old_value_saldo;
   $this->idtercero_cuenta = $old_value_idtercero_cuenta;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_terceros_cuentas_porpagar_161219_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_terceros_cuentas_porpagar_161219_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_prefijo'][] = $rs->fields[0];
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
          $sSelComp = "name=\"prefijo\"";
          if (isset($this->NM_ajax_info['select_html']['prefijo']) && !empty($this->NM_ajax_info['select_html']['prefijo']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['prefijo']);
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

                  if ($this->prefijo == $sValue)
                  {
                      $this->_tmp_lookup_prefijo = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['prefijo'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['prefijo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['prefijo']['valList'][$i] = form_terceros_cuentas_porpagar_161219_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['prefijo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['prefijo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['prefijo']['labList'] = $aLabel;
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
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fecha
   function ajax_return_values_fecha($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecha", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecha);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fecha'] = array(
                       'row'    => '',
               'type'    => 'text',
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

          //----- tipo
   function ajax_return_values_tipo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo);
              $aLookup = array();
              $this->_tmp_lookup_tipo = $this->tipo;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tipo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tipo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tipo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tipo'] = array(); 
}
$aLookup[] = array(form_terceros_cuentas_porpagar_161219_pack_protect_string('') => str_replace('<', '&lt;',form_terceros_cuentas_porpagar_161219_pack_protect_string('SELECCIONE')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tipo'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_numero = $this->numero;
   $old_value_fecha = $this->fecha;
   $old_value_valor_total = $this->valor_total;
   $old_value_saldo = $this->saldo;
   $old_value_idtercero_cuenta = $this->idtercero_cuenta;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero = $this->numero;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_valor_total = $this->valor_total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idtercero_cuenta = $this->idtercero_cuenta;

   $nm_comando = "SELECT codigo, concepto  FROM conceptos_documentos  WHERE tipo='EGRESO' ORDER BY concepto";

   $this->numero = $old_value_numero;
   $this->fecha = $old_value_fecha;
   $this->valor_total = $old_value_valor_total;
   $this->saldo = $old_value_saldo;
   $this->idtercero_cuenta = $old_value_idtercero_cuenta;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_terceros_cuentas_porpagar_161219_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_terceros_cuentas_porpagar_161219_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tipo'][] = $rs->fields[0];
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
          $sSelComp = "name=\"tipo\"";
          if (isset($this->NM_ajax_info['select_html']['tipo']) && !empty($this->NM_ajax_info['select_html']['tipo']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['tipo']);
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

                  if ($this->tipo == $sValue)
                  {
                      $this->_tmp_lookup_tipo = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tipo'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipo']['valList'][$i] = form_terceros_cuentas_porpagar_161219_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipo']['labList'] = $aLabel;
          }
   }

          //----- tercero
   function ajax_return_values_tercero($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tercero", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tercero);
              $aLookup = array();
              $this->_tmp_lookup_tercero = $this->tercero;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tercero']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tercero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tercero']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tercero'] = array(); 
    }

   $old_value_numero = $this->numero;
   $old_value_fecha = $this->fecha;
   $old_value_valor_total = $this->valor_total;
   $old_value_saldo = $this->saldo;
   $old_value_idtercero_cuenta = $this->idtercero_cuenta;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero = $this->numero;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_valor_total = $this->valor_total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idtercero_cuenta = $this->idtercero_cuenta;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + ' - ' + nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->tercero), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento,' - ',nombres) FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->tercero), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&' - '&nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->tercero), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||' - '||nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->tercero), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + ' - ' + nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->tercero), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||' - '||nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->tercero), 1, -1) . " ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||' - '||nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->tercero), 1, -1) . " ORDER BY documento, nombres";
   }

   $this->numero = $old_value_numero;
   $this->fecha = $old_value_fecha;
   $this->valor_total = $old_value_valor_total;
   $this->saldo = $old_value_saldo;
   $this->idtercero_cuenta = $old_value_idtercero_cuenta;

   if ('' != $this->tercero && '' != $this->tercero && '' != $this->tercero && '' != $this->tercero && '' != $this->tercero && '' != $this->tercero && '' != $this->tercero)
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_terceros_cuentas_porpagar_161219_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_terceros_cuentas_porpagar_161219_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tercero'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   }
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tercero'] = array(
                       'row'    => '',
               'type'    => 'select2_ac',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tercero']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tercero']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tercero']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][form_terceros_cuentas_porpagar_161219_pack_protect_string(NM_charset_to_utf8($this->tercero))]) ? $aLookup[0][form_terceros_cuentas_porpagar_161219_pack_protect_string(NM_charset_to_utf8($this->tercero))] : "";
          $this->NM_ajax_info['fldList']['tercero_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

          //----- numero_documento
   function ajax_return_values_numero_documento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numero_documento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numero_documento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numero_documento'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- valor_total
   function ajax_return_values_valor_total($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valor_total", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valor_total);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valor_total'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- saldo
   function ajax_return_values_saldo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("saldo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->saldo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['saldo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- concepto
   function ajax_return_values_concepto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("concepto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->concepto);
              $aLookup = array();
              $this->_tmp_lookup_concepto = $this->concepto;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_concepto']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_concepto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_concepto']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_concepto'] = array(); 
}
$aLookup[] = array(form_terceros_cuentas_porpagar_161219_pack_protect_string('0') => str_replace('<', '&lt;',form_terceros_cuentas_porpagar_161219_pack_protect_string('SELECCIONE')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_concepto'][] = '0';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_numero = $this->numero;
   $old_value_fecha = $this->fecha;
   $old_value_valor_total = $this->valor_total;
   $old_value_saldo = $this->saldo;
   $old_value_idtercero_cuenta = $this->idtercero_cuenta;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero = $this->numero;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_valor_total = $this->valor_total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idtercero_cuenta = $this->idtercero_cuenta;

   $nm_comando = "SELECT idpagos_conceptos, descripcion  FROM pagos_conceptos  WHERE tipodoc = 'CE' ORDER BY descripcion";

   $this->numero = $old_value_numero;
   $this->fecha = $old_value_fecha;
   $this->valor_total = $old_value_valor_total;
   $this->saldo = $old_value_saldo;
   $this->idtercero_cuenta = $old_value_idtercero_cuenta;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_terceros_cuentas_porpagar_161219_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_terceros_cuentas_porpagar_161219_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_concepto'][] = $rs->fields[0];
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
          $sSelComp = "name=\"concepto\"";
          if (isset($this->NM_ajax_info['select_html']['concepto']) && !empty($this->NM_ajax_info['select_html']['concepto']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['concepto']);
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

                  if ($this->concepto == $sValue)
                  {
                      $this->_tmp_lookup_concepto = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['concepto'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['concepto']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['concepto']['valList'][$i] = form_terceros_cuentas_porpagar_161219_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['concepto']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['concepto']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['concepto']['labList'] = $aLabel;
          }
   }

          //----- observaciones
   function ajax_return_values_observaciones($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("observaciones", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->observaciones);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['observaciones'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- usuario
   function ajax_return_values_usuario($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("usuario", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->usuario);
              $aLookup = array();
              $this->_tmp_lookup_usuario = $this->usuario;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_usuario']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_usuario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_usuario']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_usuario'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_numero = $this->numero;
   $old_value_fecha = $this->fecha;
   $old_value_valor_total = $this->valor_total;
   $old_value_saldo = $this->saldo;
   $old_value_idtercero_cuenta = $this->idtercero_cuenta;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero = $this->numero;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_valor_total = $this->valor_total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idtercero_cuenta = $this->idtercero_cuenta;

   $nm_comando = "SELECT idtercero, nombres  FROM terceros  WHERE empleado='SI' or documento='0000000' ORDER BY nombres";

   $this->numero = $old_value_numero;
   $this->fecha = $old_value_fecha;
   $this->valor_total = $old_value_valor_total;
   $this->saldo = $old_value_saldo;
   $this->idtercero_cuenta = $old_value_idtercero_cuenta;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_terceros_cuentas_porpagar_161219_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_terceros_cuentas_porpagar_161219_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_usuario'][] = $rs->fields[0];
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
          $sSelComp = "name=\"usuario\"";
          if (isset($this->NM_ajax_info['select_html']['usuario']) && !empty($this->NM_ajax_info['select_html']['usuario']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['usuario']);
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

                  if ($this->usuario == $sValue)
                  {
                      $this->_tmp_lookup_usuario = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['usuario'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['usuario']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['usuario']['valList'][$i] = form_terceros_cuentas_porpagar_161219_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['usuario']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['usuario']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['usuario']['labList'] = $aLabel;
          }
   }

          //----- automatico
   function ajax_return_values_automatico($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("automatico", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->automatico);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['automatico'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- pagada
   function ajax_return_values_pagada($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pagada", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pagada);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pagada'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- idtercero_cuenta
   function ajax_return_values_idtercero_cuenta($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idtercero_cuenta", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idtercero_cuenta);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idtercero_cuenta'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("idtercero_cuenta", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- ie
   function ajax_return_values_ie($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ie", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ie);
              $aLookup = array();
              $this->_tmp_lookup_ie = $this->ie;

$aLookup[] = array(form_terceros_cuentas_porpagar_161219_pack_protect_string('EGRESO') => str_replace('<', '&lt;',form_terceros_cuentas_porpagar_161219_pack_protect_string("EGRESO")));
$aLookup[] = array(form_terceros_cuentas_porpagar_161219_pack_protect_string('INGRESO') => str_replace('<', '&lt;',form_terceros_cuentas_porpagar_161219_pack_protect_string("INGRESO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_ie'][] = 'EGRESO';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_ie'][] = 'INGRESO';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"ie\"";
          if (isset($this->NM_ajax_info['select_html']['ie']) && !empty($this->NM_ajax_info['select_html']['ie']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ie']);
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

                  if ($this->ie == $sValue)
                  {
                      $this->_tmp_lookup_ie = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['ie'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ie']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ie']['valList'][$i] = form_terceros_cuentas_porpagar_161219_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ie']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ie']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ie']['labList'] = $aLabel;
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['upload_dir'][$fieldName][] = $newName;
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
      $_SESSION['scriptcase']['form_terceros_cuentas_porpagar_161219']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_automatico = $this->automatico;
    $original_idtercero_cuenta = $this->idtercero_cuenta;
    $original_numero = $this->numero;
}
  if($this->automatico =='SI')
{
   $this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;
   $this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
}
else
{
   $this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "on";;
   $this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "on";;
}

if(empty($this->idtercero_cuenta ))
{
 
      $nm_select = "select coalesce(max(numero),0)+1 from terceros_cuentas where prefijo='00'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vConsecutivo = array();
      $this->vconsecutivo = array();
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
                      $this->vConsecutivo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vconsecutivo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vConsecutivo = false;
          $this->vConsecutivo_erro = $this->Db->ErrorMsg();
          $this->vconsecutivo = false;
          $this->vconsecutivo_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vconsecutivo[0][0]))
{
$this->numero  = $this->vconsecutivo[0][0];
}
else
{
$this->numero  = 1;
}
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_automatico != $this->automatico || (isset($bFlagRead_automatico) && $bFlagRead_automatico)))
    {
        $this->ajax_return_values_automatico(true);
    }
    if (($original_idtercero_cuenta != $this->idtercero_cuenta || (isset($bFlagRead_idtercero_cuenta) && $bFlagRead_idtercero_cuenta)))
    {
        $this->ajax_return_values_idtercero_cuenta(true);
    }
    if (($original_numero != $this->numero || (isset($bFlagRead_numero) && $bFlagRead_numero)))
    {
        $this->ajax_return_values_numero(true);
    }
}
$_SESSION['scriptcase']['form_terceros_cuentas_porpagar_161219']['contr_erro'] = 'off'; 
      }
      if (empty($this->creado))
      {
          $this->creado_hora = $this->creado;
      }
      if (empty($this->editado))
      {
          $this->editado_hora = $this->editado;
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
      $this->valor_total = str_replace($sc_parm1, $sc_parm2, $this->valor_total); 
      $this->saldo = str_replace($sc_parm1, $sc_parm2, $this->saldo); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->valor_total = "'" . $this->valor_total . "'";
      $this->saldo = "'" . $this->saldo . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->valor_total = str_replace("'", "", $this->valor_total); 
      $this->saldo = str_replace("'", "", $this->saldo); 
   } 
//----------- 

   function return_after_insert()
   {
      global $sc_where;
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_where_pos = " WHERE ((fecha > #$this->fecha#) OR (fecha = #$this->fecha# AND numero > $this->numero) OR (fecha = #$this->fecha# AND numero = $this->numero AND idtercero_cuenta < $this->idtercero_cuenta))";
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_where_pos = " WHERE ((fecha > '" . substr($this->Db->qstr($this->fecha), 1, -1) . "') OR (fecha = '" . substr($this->Db->qstr($this->fecha), 1, -1) . "' AND numero > $this->numero) OR (fecha = '" . substr($this->Db->qstr($this->fecha), 1, -1) . "' AND numero = $this->numero AND idtercero_cuenta < $this->idtercero_cuenta))";
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_where_pos = " WHERE ((fecha > '" . substr($this->Db->qstr($this->fecha), 1, -1) . "') OR (fecha = '" . substr($this->Db->qstr($this->fecha), 1, -1) . "' AND numero > $this->numero) OR (fecha = '" . substr($this->Db->qstr($this->fecha), 1, -1) . "' AND numero = $this->numero AND idtercero_cuenta < $this->idtercero_cuenta))";
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_where_pos = " WHERE ((fecha > '" . substr($this->Db->qstr($this->fecha), 1, -1) . "') OR (fecha = '" . substr($this->Db->qstr($this->fecha), 1, -1) . "' AND numero > $this->numero) OR (fecha = '" . substr($this->Db->qstr($this->fecha), 1, -1) . "' AND numero = $this->numero AND idtercero_cuenta < $this->idtercero_cuenta))";
      }
      else
      {
          $sc_where_pos = " WHERE ((fecha > '" . substr($this->Db->qstr($this->fecha), 1, -1) . "') OR (fecha = '" . substr($this->Db->qstr($this->fecha), 1, -1) . "' AND numero > $this->numero) OR (fecha = '" . substr($this->Db->qstr($this->fecha), 1, -1) . "' AND numero = $this->numero AND idtercero_cuenta < $this->idtercero_cuenta))";
      }
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
      if ('' != $this->numero && '' != $this->idtercero_cuenta)
      {
          $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count;
          $rsc = $this->Db->Execute($nmgp_sel_count);
          if ($rsc === false && !$rsc->EOF)
          {
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
              exit;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['reg_start'] = $rsc->fields[0];
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
      $_SESSION['scriptcase']['form_terceros_cuentas_porpagar_161219']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_automatico = $this->automatico;
    $original_cod_cuenta = $this->cod_cuenta;
    $original_numero = $this->numero;
    $original_prefijo = $this->prefijo;
    $original_saldo = $this->saldo;
    $original_tipo = $this->tipo;
    $original_valor_total = $this->valor_total;
}
  if($this->automatico =='SI')
{
   
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "No se puede editar una cuenta de tercero que ha sido generada automaticamente por FACILWEB.";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_form_terceros_cuentas_porpagar_161219';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_terceros_cuentas_porpagar_161219';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "No se puede editar una cuenta de tercero que ha sido generada automaticamente por FACILWEB.";
 }
;
   $this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;
   $this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
}
else
{
   $this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "on";;
   $this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "on";;
}

 
      $nm_select = "select np from conceptos_documentos where codigo='".$this->tipo ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vNP = array();
      $this->vnp = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vNP[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vnp[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vNP = false;
          $this->vNP_erro = $this->Db->ErrorMsg();
          $this->vnp = false;
          $this->vnp_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vnp[0][0]))
{
	$vt = $this->vnp[0][0];
	if($vt=='-')
	{
		if($this->saldo >0)
		{
			$this->saldo  = $this->saldo *($vt.'1');
		}
		if($this->valor_total >0)
		{
			$this->valor_total  = $this->valor_total *($vt.'1');
		}
	}
	else
	{
		if($this->saldo <0)
		{
			$this->saldo  = $this->saldo *($vt.'1');
		}
	
		if($this->valor_total <0)
		{	
			$this->valor_total  = $this->valor_total *($vt.'1');
		}
	}
}

if(empty($this->saldo ))
{
	$this->saldo  = $this->valor_total ;
}

if(empty($this->cod_cuenta ))
{
	$this->cod_cuenta  = $this->prefijo ."/".$this->numero ;
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_automatico != $this->automatico || (isset($bFlagRead_automatico) && $bFlagRead_automatico)))
    {
        $this->ajax_return_values_automatico(true);
    }
    if (($original_cod_cuenta != $this->cod_cuenta || (isset($bFlagRead_cod_cuenta) && $bFlagRead_cod_cuenta)))
    {
        $this->ajax_return_values_cod_cuenta(true);
    }
    if (($original_numero != $this->numero || (isset($bFlagRead_numero) && $bFlagRead_numero)))
    {
        $this->ajax_return_values_numero(true);
    }
    if (($original_prefijo != $this->prefijo || (isset($bFlagRead_prefijo) && $bFlagRead_prefijo)))
    {
        $this->ajax_return_values_prefijo(true);
    }
    if (($original_saldo != $this->saldo || (isset($bFlagRead_saldo) && $bFlagRead_saldo)))
    {
        $this->ajax_return_values_saldo(true);
    }
    if (($original_tipo != $this->tipo || (isset($bFlagRead_tipo) && $bFlagRead_tipo)))
    {
        $this->ajax_return_values_tipo(true);
    }
    if (($original_valor_total != $this->valor_total || (isset($bFlagRead_valor_total) && $bFlagRead_valor_total)))
    {
        $this->ajax_return_values_valor_total(true);
    }
}
$_SESSION['scriptcase']['form_terceros_cuentas_porpagar_161219']['contr_erro'] = 'off'; 
    }
    if ("alterar" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_terceros_cuentas_porpagar_161219']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cod_cuenta = $this->cod_cuenta;
    $original_numero = $this->numero;
    $original_prefijo = $this->prefijo;
    $original_saldo = $this->saldo;
    $original_tipo = $this->tipo;
    $original_valor_total = $this->valor_total;
}
   
      $nm_select = "select np from conceptos_documentos where codigo='".$this->tipo ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vNP = array();
      $this->vnp = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vNP[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vnp[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vNP = false;
          $this->vNP_erro = $this->Db->ErrorMsg();
          $this->vnp = false;
          $this->vnp_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vnp[0][0]))
{
	$vt = $this->vnp[0][0];
	if($vt=='-')
	{
		if($this->saldo >0)
		{
			$this->saldo  = $this->saldo *($vt.'1');
		}
		if($this->valor_total >0)
		{
			$this->valor_total  = $this->valor_total *($vt.'1');
		}
	}
	else
	{
		if($this->saldo <0)
		{
			$this->saldo  = $this->saldo *($vt.'1');
		}
	
		if($this->valor_total <0)
		{	
			$this->valor_total  = $this->valor_total *($vt.'1');
		}
	}
}

if(empty($this->saldo ))
{
	$this->saldo  = $this->valor_total ;
}

if(empty($this->cod_cuenta ))
{
	$this->cod_cuenta  = $this->prefijo ."/".$this->numero ;
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cod_cuenta != $this->cod_cuenta || (isset($bFlagRead_cod_cuenta) && $bFlagRead_cod_cuenta)))
    {
        $this->ajax_return_values_cod_cuenta(true);
    }
    if (($original_numero != $this->numero || (isset($bFlagRead_numero) && $bFlagRead_numero)))
    {
        $this->ajax_return_values_numero(true);
    }
    if (($original_prefijo != $this->prefijo || (isset($bFlagRead_prefijo) && $bFlagRead_prefijo)))
    {
        $this->ajax_return_values_prefijo(true);
    }
    if (($original_saldo != $this->saldo || (isset($bFlagRead_saldo) && $bFlagRead_saldo)))
    {
        $this->ajax_return_values_saldo(true);
    }
    if (($original_tipo != $this->tipo || (isset($bFlagRead_tipo) && $bFlagRead_tipo)))
    {
        $this->ajax_return_values_tipo(true);
    }
    if (($original_valor_total != $this->valor_total || (isset($bFlagRead_valor_total) && $bFlagRead_valor_total)))
    {
        $this->ajax_return_values_valor_total(true);
    }
}
$_SESSION['scriptcase']['form_terceros_cuentas_porpagar_161219']['contr_erro'] = 'off'; 
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
      if ('incluir' == $this->nmgp_opcao && empty($this->usuario)) {$this->usuario = "" . $_SESSION['gidtercero'] . ""; $NM_val_null[] = "usuario";}  
      if ('incluir' == $this->nmgp_opcao && empty($this->automatico)) {$this->automatico = "NO"; $NM_val_null[] = "automatico";}  
      if ('incluir' == $this->nmgp_opcao && empty($this->pagada)) {$this->pagada = "NO"; $NM_val_null[] = "pagada";}  
      $NM_val_form['prefijo'] = $this->prefijo;
      $NM_val_form['numero'] = $this->numero;
      $NM_val_form['fecha'] = $this->fecha;
      $NM_val_form['cod_cuenta'] = $this->cod_cuenta;
      $NM_val_form['tipo'] = $this->tipo;
      $NM_val_form['tercero'] = $this->tercero;
      $NM_val_form['numero_documento'] = $this->numero_documento;
      $NM_val_form['valor_total'] = $this->valor_total;
      $NM_val_form['saldo'] = $this->saldo;
      $NM_val_form['concepto'] = $this->concepto;
      $NM_val_form['observaciones'] = $this->observaciones;
      $NM_val_form['usuario'] = $this->usuario;
      $NM_val_form['automatico'] = $this->automatico;
      $NM_val_form['pagada'] = $this->pagada;
      $NM_val_form['idtercero_cuenta'] = $this->idtercero_cuenta;
      $NM_val_form['ie'] = $this->ie;
      $NM_val_form['abonos'] = $this->abonos;
      $NM_val_form['ultimo_abono'] = $this->ultimo_abono;
      $NM_val_form['fecha_uabono'] = $this->fecha_uabono;
      $NM_val_form['creado'] = $this->creado;
      $NM_val_form['editado'] = $this->editado;
      if ($this->idtercero_cuenta === "" || is_null($this->idtercero_cuenta))  
      { 
          $this->idtercero_cuenta = 0;
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->numero === "" || is_null($this->numero))  
      { 
          $this->numero = 0;
          $this->sc_force_zero[] = 'numero';
      } 
      if ($this->tercero === "" || is_null($this->tercero))  
      { 
          $this->tercero = 0;
          $this->sc_force_zero[] = 'tercero';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->valor_total === "" || is_null($this->valor_total))  
      { 
          $this->valor_total = 0;
          $this->sc_force_zero[] = 'valor_total';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->saldo === "" || is_null($this->saldo))  
      { 
          $this->saldo = 0;
          $this->sc_force_zero[] = 'saldo';
      } 
      }
      if ($this->abonos === "" || is_null($this->abonos))  
      { 
          $this->abonos = 0;
          $this->sc_force_zero[] = 'abonos';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->concepto === "" || is_null($this->concepto))  
      { 
          $this->concepto = 0;
          $this->sc_force_zero[] = 'concepto';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->prefijo_before_qstr = $this->prefijo;
          $this->prefijo = substr($this->Db->qstr($this->prefijo), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->prefijo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->prefijo = "null"; 
                  $NM_val_null[] = "prefijo";
              } 
          }
          if ($this->fecha == "")  
          { 
              $this->fecha = "null"; 
              $NM_val_null[] = "fecha";
          } 
          $this->ie_before_qstr = $this->ie;
          $this->ie = substr($this->Db->qstr($this->ie), 1, -1); 
          if ($this->ie == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ie = "null"; 
              $NM_val_null[] = "ie";
          } 
          $this->tipo_before_qstr = $this->tipo;
          $this->tipo = substr($this->Db->qstr($this->tipo), 1, -1); 
          if ($this->tipo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo = "null"; 
              $NM_val_null[] = "tipo";
          } 
          $this->numero_documento_before_qstr = $this->numero_documento;
          $this->numero_documento = substr($this->Db->qstr($this->numero_documento), 1, -1); 
          if ($this->numero_documento == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->numero_documento = "null"; 
              $NM_val_null[] = "numero_documento";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->observaciones_before_qstr = $this->observaciones;
          $this->observaciones = substr($this->Db->qstr($this->observaciones), 1, -1); 
          if ($this->observaciones == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->observaciones = "null"; 
              $NM_val_null[] = "observaciones";
          } 
          $this->usuario_before_qstr = $this->usuario;
          $this->usuario = substr($this->Db->qstr($this->usuario), 1, -1); 
          if ($this->usuario == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->usuario = "null"; 
              $NM_val_null[] = "usuario";
          } 
          $this->ultimo_abono_before_qstr = $this->ultimo_abono;
          $this->ultimo_abono = substr($this->Db->qstr($this->ultimo_abono), 1, -1); 
          if ($this->ultimo_abono == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ultimo_abono = "null"; 
              $NM_val_null[] = "ultimo_abono";
          } 
          if ($this->fecha_uabono == "")  
          { 
              $this->fecha_uabono = "null"; 
              $NM_val_null[] = "fecha_uabono";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->creado == "")  
              { 
                  $this->creado = "null"; 
                  $NM_val_null[] = "creado";
              } 
              if ($this->creado == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->creado = "null"; 
                  $NM_val_null[] = "creado";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->editado == "")  
              { 
                  $this->editado = "null"; 
                  $NM_val_null[] = "editado";
              } 
              if ($this->editado == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->editado = "null"; 
                  $NM_val_null[] = "editado";
              } 
          }
          $this->automatico_before_qstr = $this->automatico;
          $this->automatico = substr($this->Db->qstr($this->automatico), 1, -1); 
          if ($this->automatico == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->automatico = "null"; 
              $NM_val_null[] = "automatico";
          } 
          $this->cod_cuenta_before_qstr = $this->cod_cuenta;
          $this->cod_cuenta = substr($this->Db->qstr($this->cod_cuenta), 1, -1); 
          if ($this->cod_cuenta == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cod_cuenta = "null"; 
              $NM_val_null[] = "cod_cuenta";
          } 
          $this->pagada_before_qstr = $this->pagada;
          $this->pagada = substr($this->Db->qstr($this->pagada), 1, -1); 
          if ($this->pagada == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->pagada = "null"; 
              $NM_val_null[] = "pagada";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_terceros_cuentas_porpagar_161219_pack_ajax_response();
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
                  $SC_fields_update[] = "prefijo = '$this->prefijo', numero = $this->numero, fecha = #$this->fecha#, tercero = $this->tercero, ie = '$this->ie', tipo = '$this->tipo', numero_documento = '$this->numero_documento', valor_total = $this->valor_total, saldo = $this->saldo, observaciones = '$this->observaciones', usuario = '$this->usuario', automatico = '$this->automatico', cod_cuenta = '$this->cod_cuenta', pagada = '$this->pagada', concepto = $this->concepto"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "prefijo = '$this->prefijo', numero = $this->numero, fecha = " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", tercero = $this->tercero, ie = '$this->ie', tipo = '$this->tipo', numero_documento = '$this->numero_documento', valor_total = $this->valor_total, saldo = $this->saldo, observaciones = '$this->observaciones', usuario = '$this->usuario', automatico = '$this->automatico', cod_cuenta = '$this->cod_cuenta', pagada = '$this->pagada', concepto = $this->concepto"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "prefijo = '$this->prefijo', numero = $this->numero, fecha = " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", tercero = $this->tercero, ie = '$this->ie', tipo = '$this->tipo', numero_documento = '$this->numero_documento', valor_total = $this->valor_total, saldo = $this->saldo, observaciones = '$this->observaciones', usuario = '$this->usuario', automatico = '$this->automatico', cod_cuenta = '$this->cod_cuenta', pagada = '$this->pagada', concepto = $this->concepto"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "prefijo = '$this->prefijo', numero = $this->numero, fecha = EXTEND('$this->fecha', YEAR TO DAY), tercero = $this->tercero, ie = '$this->ie', tipo = '$this->tipo', numero_documento = '$this->numero_documento', valor_total = $this->valor_total, saldo = $this->saldo, observaciones = '$this->observaciones', usuario = '$this->usuario', automatico = '$this->automatico', cod_cuenta = '$this->cod_cuenta', pagada = '$this->pagada', concepto = $this->concepto"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "prefijo = '$this->prefijo', numero = $this->numero, fecha = " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", tercero = $this->tercero, ie = '$this->ie', tipo = '$this->tipo', numero_documento = '$this->numero_documento', valor_total = $this->valor_total, saldo = $this->saldo, observaciones = '$this->observaciones', usuario = '$this->usuario', automatico = '$this->automatico', cod_cuenta = '$this->cod_cuenta', pagada = '$this->pagada', concepto = $this->concepto"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "prefijo = '$this->prefijo', numero = $this->numero, fecha = " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", tercero = $this->tercero, ie = '$this->ie', tipo = '$this->tipo', numero_documento = '$this->numero_documento', valor_total = $this->valor_total, saldo = $this->saldo, observaciones = '$this->observaciones', usuario = '$this->usuario', automatico = '$this->automatico', cod_cuenta = '$this->cod_cuenta', pagada = '$this->pagada', concepto = $this->concepto"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "prefijo = '$this->prefijo', numero = $this->numero, fecha = " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", tercero = $this->tercero, ie = '$this->ie', tipo = '$this->tipo', numero_documento = '$this->numero_documento', valor_total = $this->valor_total, saldo = $this->saldo, observaciones = '$this->observaciones', usuario = '$this->usuario', automatico = '$this->automatico', cod_cuenta = '$this->cod_cuenta', pagada = '$this->pagada', concepto = $this->concepto"; 
              } 
              if (isset($NM_val_form['abonos']) && $NM_val_form['abonos'] != $this->nmgp_dados_select['abonos']) 
              { 
                  $SC_fields_update[] = "abonos = $this->abonos"; 
              } 
              if (isset($NM_val_form['ultimo_abono']) && $NM_val_form['ultimo_abono'] != $this->nmgp_dados_select['ultimo_abono']) 
              { 
                  $SC_fields_update[] = "ultimo_abono = '$this->ultimo_abono'"; 
              } 
              if (isset($NM_val_form['fecha_uabono']) && $NM_val_form['fecha_uabono'] != $this->nmgp_dados_select['fecha_uabono']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "fecha_uabono = #$this->fecha_uabono#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "fecha_uabono = EXTEND('" . $this->fecha_uabono . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fecha_uabono = " . $this->Ini->date_delim . $this->fecha_uabono . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['creado']) && $NM_val_form['creado'] != $this->nmgp_dados_select['creado']) 
              { 
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  { 
                      $SC_fields_update[] = "creado = TO_DATE('$this->creado', 'yyyy-mm-dd hh24:mi:ss')"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "creado = '$this->creado'"; 
                  } 
              } 
              if (isset($NM_val_form['editado']) && $NM_val_form['editado'] != $this->nmgp_dados_select['editado']) 
              { 
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  { 
                      $SC_fields_update[] = "editado = TO_DATE('$this->editado', 'yyyy-mm-dd hh24:mi:ss')"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "editado = '$this->editado'"; 
                  } 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE idtercero_cuenta = $this->idtercero_cuenta ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE idtercero_cuenta = $this->idtercero_cuenta ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE idtercero_cuenta = $this->idtercero_cuenta ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE idtercero_cuenta = $this->idtercero_cuenta ";  
              }  
              else  
              {
                  $comando .= " WHERE idtercero_cuenta = $this->idtercero_cuenta ";  
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
                                  form_terceros_cuentas_porpagar_161219_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->prefijo = $this->prefijo_before_qstr;
              $this->ie = $this->ie_before_qstr;
              $this->tipo = $this->tipo_before_qstr;
              $this->numero_documento = $this->numero_documento_before_qstr;
              $this->observaciones = $this->observaciones_before_qstr;
              $this->usuario = $this->usuario_before_qstr;
              $this->ultimo_abono = $this->ultimo_abono_before_qstr;
              $this->automatico = $this->automatico_before_qstr;
              $this->cod_cuenta = $this->cod_cuenta_before_qstr;
              $this->pagada = $this->pagada_before_qstr;
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['idtercero_cuenta'])) { $this->idtercero_cuenta = $NM_val_form['idtercero_cuenta']; }
              elseif (isset($this->idtercero_cuenta)) { $this->nm_limpa_alfa($this->idtercero_cuenta); }
              if     (isset($NM_val_form) && isset($NM_val_form['prefijo'])) { $this->prefijo = $NM_val_form['prefijo']; }
              elseif (isset($this->prefijo)) { $this->nm_limpa_alfa($this->prefijo); }
              if     (isset($NM_val_form) && isset($NM_val_form['numero'])) { $this->numero = $NM_val_form['numero']; }
              elseif (isset($this->numero)) { $this->nm_limpa_alfa($this->numero); }
              if     (isset($NM_val_form) && isset($NM_val_form['tercero'])) { $this->tercero = $NM_val_form['tercero']; }
              elseif (isset($this->tercero)) { $this->nm_limpa_alfa($this->tercero); }
              if     (isset($NM_val_form) && isset($NM_val_form['ie'])) { $this->ie = $NM_val_form['ie']; }
              elseif (isset($this->ie)) { $this->nm_limpa_alfa($this->ie); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo'])) { $this->tipo = $NM_val_form['tipo']; }
              elseif (isset($this->tipo)) { $this->nm_limpa_alfa($this->tipo); }
              if     (isset($NM_val_form) && isset($NM_val_form['numero_documento'])) { $this->numero_documento = $NM_val_form['numero_documento']; }
              elseif (isset($this->numero_documento)) { $this->nm_limpa_alfa($this->numero_documento); }
              if     (isset($NM_val_form) && isset($NM_val_form['valor_total'])) { $this->valor_total = $NM_val_form['valor_total']; }
              elseif (isset($this->valor_total)) { $this->nm_limpa_alfa($this->valor_total); }
              if     (isset($NM_val_form) && isset($NM_val_form['saldo'])) { $this->saldo = $NM_val_form['saldo']; }
              elseif (isset($this->saldo)) { $this->nm_limpa_alfa($this->saldo); }
              if     (isset($NM_val_form) && isset($NM_val_form['observaciones'])) { $this->observaciones = $NM_val_form['observaciones']; }
              elseif (isset($this->observaciones)) { $this->nm_limpa_alfa($this->observaciones); }
              if     (isset($NM_val_form) && isset($NM_val_form['usuario'])) { $this->usuario = $NM_val_form['usuario']; }
              elseif (isset($this->usuario)) { $this->nm_limpa_alfa($this->usuario); }
              if     (isset($NM_val_form) && isset($NM_val_form['automatico'])) { $this->automatico = $NM_val_form['automatico']; }
              elseif (isset($this->automatico)) { $this->nm_limpa_alfa($this->automatico); }
              if     (isset($NM_val_form) && isset($NM_val_form['cod_cuenta'])) { $this->cod_cuenta = $NM_val_form['cod_cuenta']; }
              elseif (isset($this->cod_cuenta)) { $this->nm_limpa_alfa($this->cod_cuenta); }
              if     (isset($NM_val_form) && isset($NM_val_form['pagada'])) { $this->pagada = $NM_val_form['pagada']; }
              elseif (isset($this->pagada)) { $this->nm_limpa_alfa($this->pagada); }
              if     (isset($NM_val_form) && isset($NM_val_form['concepto'])) { $this->concepto = $NM_val_form['concepto']; }
              elseif (isset($this->concepto)) { $this->nm_limpa_alfa($this->concepto); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('prefijo', 'numero', 'fecha', 'cod_cuenta', 'tipo', 'tercero', 'numero_documento', 'valor_total', 'saldo', 'concepto', 'observaciones', 'usuario', 'automatico', 'pagada', 'idtercero_cuenta', 'ie'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "idtercero_cuenta, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_terceros_cuentas_porpagar_161219_pack_ajax_response();
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
                  if ($this->prefijo != "")
                  { 
                       $compl_insert     .= ", prefijo";
                       $compl_insert_val .= ", '$this->prefijo'";
                  } 
                  if ($this->valor_total != "")
                  { 
                       $compl_insert     .= ", valor_total";
                       $compl_insert_val .= ", $this->valor_total";
                  } 
                  if ($this->saldo != "")
                  { 
                       $compl_insert     .= ", saldo";
                       $compl_insert_val .= ", $this->saldo";
                  } 
                  if ($this->creado != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", '$this->creado'";
                  } 
                  if ($this->editado != "")
                  { 
                       $compl_insert     .= ", editado";
                       $compl_insert_val .= ", '$this->editado'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (numero, fecha, tercero, ie, tipo, numero_documento, observaciones, abonos, usuario, ultimo_abono, fecha_uabono, automatico, cod_cuenta, pagada, concepto $compl_insert) VALUES ($this->numero, #$this->fecha#, $this->tercero, '$this->ie', '$this->tipo', '$this->numero_documento', '$this->observaciones', $this->abonos, '$this->usuario', '$this->ultimo_abono', #$this->fecha_uabono#, '$this->automatico', '$this->cod_cuenta', '$this->pagada', $this->concepto $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->prefijo != "")
                  { 
                       $compl_insert     .= ", prefijo";
                       $compl_insert_val .= ", '$this->prefijo'";
                  } 
                  if ($this->valor_total != "")
                  { 
                       $compl_insert     .= ", valor_total";
                       $compl_insert_val .= ", $this->valor_total";
                  } 
                  if ($this->saldo != "")
                  { 
                       $compl_insert     .= ", saldo";
                       $compl_insert_val .= ", $this->saldo";
                  } 
                  if ($this->creado != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", '$this->creado'";
                  } 
                  if ($this->editado != "")
                  { 
                       $compl_insert     .= ", editado";
                       $compl_insert_val .= ", '$this->editado'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numero, fecha, tercero, ie, tipo, numero_documento, observaciones, abonos, usuario, ultimo_abono, fecha_uabono, automatico, cod_cuenta, pagada, concepto $compl_insert) VALUES (" . $NM_seq_auto . "$this->numero, " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", $this->tercero, '$this->ie', '$this->tipo', '$this->numero_documento', '$this->observaciones', $this->abonos, '$this->usuario', '$this->ultimo_abono', " . $this->Ini->date_delim . $this->fecha_uabono . $this->Ini->date_delim1 . ", '$this->automatico', '$this->cod_cuenta', '$this->pagada', $this->concepto $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->prefijo != "")
                  { 
                       $compl_insert     .= ", prefijo";
                       $compl_insert_val .= ", '$this->prefijo'";
                  } 
                  if ($this->valor_total != "")
                  { 
                       $compl_insert     .= ", valor_total";
                       $compl_insert_val .= ", $this->valor_total";
                  } 
                  if ($this->saldo != "")
                  { 
                       $compl_insert     .= ", saldo";
                       $compl_insert_val .= ", $this->saldo";
                  } 
                  if ($this->creado != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", '$this->creado'";
                  } 
                  if ($this->editado != "")
                  { 
                       $compl_insert     .= ", editado";
                       $compl_insert_val .= ", '$this->editado'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numero, fecha, tercero, ie, tipo, numero_documento, observaciones, abonos, usuario, ultimo_abono, fecha_uabono, automatico, cod_cuenta, pagada, concepto $compl_insert) VALUES (" . $NM_seq_auto . "$this->numero, " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", $this->tercero, '$this->ie', '$this->tipo', '$this->numero_documento', '$this->observaciones', $this->abonos, '$this->usuario', '$this->ultimo_abono', " . $this->Ini->date_delim . $this->fecha_uabono . $this->Ini->date_delim1 . ", '$this->automatico', '$this->cod_cuenta', '$this->pagada', $this->concepto $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->prefijo != "")
                  { 
                       $compl_insert     .= ", prefijo";
                       $compl_insert_val .= ", '$this->prefijo'";
                  } 
                  if ($this->valor_total != "")
                  { 
                       $compl_insert     .= ", valor_total";
                       $compl_insert_val .= ", $this->valor_total";
                  } 
                  if ($this->saldo != "")
                  { 
                       $compl_insert     .= ", saldo";
                       $compl_insert_val .= ", $this->saldo";
                  } 
                  if ($this->creado != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", TO_DATE('$this->creado', 'yyyy-mm-dd hh24:mi:ss')";
                  } 
                  if ($this->editado != "")
                  { 
                       $compl_insert     .= ", editado";
                       $compl_insert_val .= ", TO_DATE('$this->editado', 'yyyy-mm-dd hh24:mi:ss')";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numero, fecha, tercero, ie, tipo, numero_documento, observaciones, abonos, usuario, ultimo_abono, fecha_uabono, automatico, cod_cuenta, pagada, concepto $compl_insert) VALUES (" . $NM_seq_auto . "$this->numero, " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", $this->tercero, '$this->ie', '$this->tipo', '$this->numero_documento', '$this->observaciones', $this->abonos, '$this->usuario', '$this->ultimo_abono', " . $this->Ini->date_delim . $this->fecha_uabono . $this->Ini->date_delim1 . ", '$this->automatico', '$this->cod_cuenta', '$this->pagada', $this->concepto $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->prefijo != "")
                  { 
                       $compl_insert     .= ", prefijo";
                       $compl_insert_val .= ", '$this->prefijo'";
                  } 
                  if ($this->valor_total != "")
                  { 
                       $compl_insert     .= ", valor_total";
                       $compl_insert_val .= ", $this->valor_total";
                  } 
                  if ($this->saldo != "")
                  { 
                       $compl_insert     .= ", saldo";
                       $compl_insert_val .= ", $this->saldo";
                  } 
                  if ($this->creado != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", '$this->creado'";
                  } 
                  if ($this->editado != "")
                  { 
                       $compl_insert     .= ", editado";
                       $compl_insert_val .= ", '$this->editado'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numero, fecha, tercero, ie, tipo, numero_documento, observaciones, abonos, usuario, ultimo_abono, fecha_uabono, automatico, cod_cuenta, pagada, concepto $compl_insert) VALUES (" . $NM_seq_auto . "$this->numero, EXTEND('$this->fecha', YEAR TO DAY), $this->tercero, '$this->ie', '$this->tipo', '$this->numero_documento', '$this->observaciones', $this->abonos, '$this->usuario', '$this->ultimo_abono', EXTEND('$this->fecha_uabono', YEAR TO DAY), '$this->automatico', '$this->cod_cuenta', '$this->pagada', $this->concepto $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->prefijo != "")
                  { 
                       $compl_insert     .= ", prefijo";
                       $compl_insert_val .= ", '$this->prefijo'";
                  } 
                  if ($this->valor_total != "")
                  { 
                       $compl_insert     .= ", valor_total";
                       $compl_insert_val .= ", $this->valor_total";
                  } 
                  if ($this->saldo != "")
                  { 
                       $compl_insert     .= ", saldo";
                       $compl_insert_val .= ", $this->saldo";
                  } 
                  if ($this->creado != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", '$this->creado'";
                  } 
                  if ($this->editado != "")
                  { 
                       $compl_insert     .= ", editado";
                       $compl_insert_val .= ", '$this->editado'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numero, fecha, tercero, ie, tipo, numero_documento, observaciones, abonos, usuario, ultimo_abono, fecha_uabono, automatico, cod_cuenta, pagada, concepto $compl_insert) VALUES (" . $NM_seq_auto . "$this->numero, " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", $this->tercero, '$this->ie', '$this->tipo', '$this->numero_documento', '$this->observaciones', $this->abonos, '$this->usuario', '$this->ultimo_abono', " . $this->Ini->date_delim . $this->fecha_uabono . $this->Ini->date_delim1 . ", '$this->automatico', '$this->cod_cuenta', '$this->pagada', $this->concepto $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->prefijo != "")
                  { 
                       $compl_insert     .= ", prefijo";
                       $compl_insert_val .= ", '$this->prefijo'";
                  } 
                  if ($this->valor_total != "")
                  { 
                       $compl_insert     .= ", valor_total";
                       $compl_insert_val .= ", $this->valor_total";
                  } 
                  if ($this->saldo != "")
                  { 
                       $compl_insert     .= ", saldo";
                       $compl_insert_val .= ", $this->saldo";
                  } 
                  if ($this->creado != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", '$this->creado'";
                  } 
                  if ($this->editado != "")
                  { 
                       $compl_insert     .= ", editado";
                       $compl_insert_val .= ", '$this->editado'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numero, fecha, tercero, ie, tipo, numero_documento, observaciones, abonos, usuario, ultimo_abono, fecha_uabono, automatico, cod_cuenta, pagada, concepto $compl_insert) VALUES (" . $NM_seq_auto . "$this->numero, " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", $this->tercero, '$this->ie', '$this->tipo', '$this->numero_documento', '$this->observaciones', $this->abonos, '$this->usuario', '$this->ultimo_abono', " . $this->Ini->date_delim . $this->fecha_uabono . $this->Ini->date_delim1 . ", '$this->automatico', '$this->cod_cuenta', '$this->pagada', $this->concepto $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->prefijo != "")
                  { 
                       $compl_insert     .= ", prefijo";
                       $compl_insert_val .= ", '$this->prefijo'";
                  } 
                  if ($this->valor_total != "")
                  { 
                       $compl_insert     .= ", valor_total";
                       $compl_insert_val .= ", $this->valor_total";
                  } 
                  if ($this->saldo != "")
                  { 
                       $compl_insert     .= ", saldo";
                       $compl_insert_val .= ", $this->saldo";
                  } 
                  if ($this->creado != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", TO_DATE('$this->creado', 'yyyy-mm-dd hh24:mi:ss')";
                  } 
                  if ($this->editado != "")
                  { 
                       $compl_insert     .= ", editado";
                       $compl_insert_val .= ", TO_DATE('$this->editado', 'yyyy-mm-dd hh24:mi:ss')";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numero, fecha, tercero, ie, tipo, numero_documento, observaciones, abonos, usuario, ultimo_abono, fecha_uabono, automatico, cod_cuenta, pagada, concepto $compl_insert) VALUES (" . $NM_seq_auto . "$this->numero, " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", $this->tercero, '$this->ie', '$this->tipo', '$this->numero_documento', '$this->observaciones', $this->abonos, '$this->usuario', '$this->ultimo_abono', " . $this->Ini->date_delim . $this->fecha_uabono . $this->Ini->date_delim1 . ", '$this->automatico', '$this->cod_cuenta', '$this->pagada', $this->concepto $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->prefijo != "")
                  { 
                       $compl_insert     .= ", prefijo";
                       $compl_insert_val .= ", '$this->prefijo'";
                  } 
                  if ($this->valor_total != "")
                  { 
                       $compl_insert     .= ", valor_total";
                       $compl_insert_val .= ", $this->valor_total";
                  } 
                  if ($this->saldo != "")
                  { 
                       $compl_insert     .= ", saldo";
                       $compl_insert_val .= ", $this->saldo";
                  } 
                  if ($this->creado != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", '$this->creado'";
                  } 
                  if ($this->editado != "")
                  { 
                       $compl_insert     .= ", editado";
                       $compl_insert_val .= ", '$this->editado'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numero, fecha, tercero, ie, tipo, numero_documento, observaciones, abonos, usuario, ultimo_abono, fecha_uabono, automatico, cod_cuenta, pagada, concepto $compl_insert) VALUES (" . $NM_seq_auto . "$this->numero, " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", $this->tercero, '$this->ie', '$this->tipo', '$this->numero_documento', '$this->observaciones', $this->abonos, '$this->usuario', '$this->ultimo_abono', " . $this->Ini->date_delim . $this->fecha_uabono . $this->Ini->date_delim1 . ", '$this->automatico', '$this->cod_cuenta', '$this->pagada', $this->concepto $compl_insert_val)"; 
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
                              form_terceros_cuentas_porpagar_161219_pack_ajax_response();
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
                          form_terceros_cuentas_porpagar_161219_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->idtercero_cuenta =  $rsy->fields[0];
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
                  $this->idtercero_cuenta = $rsy->fields[0];
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
                  $this->idtercero_cuenta = $rsy->fields[0];
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
                  $this->idtercero_cuenta = $rsy->fields[0];
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
                  $this->idtercero_cuenta = $rsy->fields[0];
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
                  $this->idtercero_cuenta = $rsy->fields[0];
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
                  $this->idtercero_cuenta = $rsy->fields[0];
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
                  $this->idtercero_cuenta = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->prefijo = $this->prefijo_before_qstr;
              $this->ie = $this->ie_before_qstr;
              $this->tipo = $this->tipo_before_qstr;
              $this->numero_documento = $this->numero_documento_before_qstr;
              $this->observaciones = $this->observaciones_before_qstr;
              $this->usuario = $this->usuario_before_qstr;
              $this->ultimo_abono = $this->ultimo_abono_before_qstr;
              $this->automatico = $this->automatico_before_qstr;
              $this->cod_cuenta = $this->cod_cuenta_before_qstr;
              $this->pagada = $this->pagada_before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->prefijo = $this->prefijo_before_qstr;
              $this->ie = $this->ie_before_qstr;
              $this->tipo = $this->tipo_before_qstr;
              $this->numero_documento = $this->numero_documento_before_qstr;
              $this->observaciones = $this->observaciones_before_qstr;
              $this->usuario = $this->usuario_before_qstr;
              $this->ultimo_abono = $this->ultimo_abono_before_qstr;
              $this->automatico = $this->automatico_before_qstr;
              $this->cod_cuenta = $this->cod_cuenta_before_qstr;
              $this->pagada = $this->pagada_before_qstr;
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['sc_redir_insert'] != "S"))
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->idtercero_cuenta = substr($this->Db->qstr($this->idtercero_cuenta), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idtercero_cuenta = $this->idtercero_cuenta "); 
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
                          form_terceros_cuentas_porpagar_161219_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['total']);
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['decimal_db'] == ",")
        {
            $this->nm_troca_decimal(",", ".");
        }
        $_SESSION['scriptcase']['form_terceros_cuentas_porpagar_161219']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cod_cuenta = $this->cod_cuenta;
}
  if(!empty($this->cod_cuenta ))
{
	 
      $nm_select = "select sum(valor_total) from terceros_cuentas where cod_cuenta='".$this->cod_cuenta ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vTotalizar = array();
      $this->vtotalizar = array();
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
                      $this->vTotalizar[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vtotalizar[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vTotalizar = false;
          $this->vTotalizar_erro = $this->Db->ErrorMsg();
          $this->vtotalizar = false;
          $this->vtotalizar_erro = $this->Db->ErrorMsg();
      } 
;

	if(isset($this->vtotalizar[0][0]))
	{
		$vto = $this->vtotalizar[0][0];

		if(intval($vto)==0)
		{
			
     $nm_select ="update terceros_cuentas set pagada='SI',saldo='0' where cod_cuenta='".$this->cod_cuenta ."'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_terceros_cuentas_porpagar_161219_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		}
		else
		{
			
     $nm_select ="update terceros_cuentas set saldo='".$vto."' where cod_cuenta='".$this->cod_cuenta ."'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_terceros_cuentas_porpagar_161219_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		}
	}
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cod_cuenta != $this->cod_cuenta || (isset($bFlagRead_cod_cuenta) && $bFlagRead_cod_cuenta)))
    {
        $this->ajax_return_values_cod_cuenta(true);
    }
}
$_SESSION['scriptcase']['form_terceros_cuentas_porpagar_161219']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['scriptcase']['form_terceros_cuentas_porpagar_161219']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cod_cuenta = $this->cod_cuenta;
}
  if(!empty($this->cod_cuenta ))
{
	 
      $nm_select = "select sum(valor_total) from terceros_cuentas where cod_cuenta='".$this->cod_cuenta ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vTotalizar = array();
      $this->vtotalizar = array();
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
                      $this->vTotalizar[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vtotalizar[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vTotalizar = false;
          $this->vTotalizar_erro = $this->Db->ErrorMsg();
          $this->vtotalizar = false;
          $this->vtotalizar_erro = $this->Db->ErrorMsg();
      } 
;

	if(isset($this->vtotalizar[0][0]))
	{
		$vto = $this->vtotalizar[0][0];

		if(intval($vto)==0)
		{
			
     $nm_select ="update terceros_cuentas set pagada='SI',saldo='0' where cod_cuenta='".$this->cod_cuenta ."'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_terceros_cuentas_porpagar_161219_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		}
		else
		{
			
     $nm_select ="update terceros_cuentas set saldo='".$vto."' where cod_cuenta='".$this->cod_cuenta ."'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_terceros_cuentas_porpagar_161219_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		}
	}
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cod_cuenta != $this->cod_cuenta || (isset($bFlagRead_cod_cuenta) && $bFlagRead_cod_cuenta)))
    {
        $this->ajax_return_values_cod_cuenta(true);
    }
}
$_SESSION['scriptcase']['form_terceros_cuentas_porpagar_161219']['contr_erro'] = 'off'; 
    }
    if ("delete" == $this->sc_evento && $this->nmgp_opcao != "nada") {
      $_SESSION['scriptcase']['form_terceros_cuentas_porpagar_161219']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cod_cuenta = $this->cod_cuenta;
}
  if(!empty($this->cod_cuenta ))
{
	 
      $nm_select = "select sum(valor_total) from terceros_cuentas where cod_cuenta='".$this->cod_cuenta ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vTotalizar = array();
      $this->vtotalizar = array();
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
                      $this->vTotalizar[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vtotalizar[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vTotalizar = false;
          $this->vTotalizar_erro = $this->Db->ErrorMsg();
          $this->vtotalizar = false;
          $this->vtotalizar_erro = $this->Db->ErrorMsg();
      } 
;

	if(isset($this->vtotalizar[0][0]))
	{
		$vto = $this->vtotalizar[0][0];

		if(intval($vto)==0)
		{
			
     $nm_select ="update terceros_cuentas set pagada='SI',saldo='0' where cod_cuenta='".$this->cod_cuenta ."'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_terceros_cuentas_porpagar_161219_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		}
		else
		{
			
     $nm_select ="update terceros_cuentas set pagada='NO',saldo='".$vto."' where cod_cuenta='".$this->cod_cuenta ."'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_terceros_cuentas_porpagar_161219_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		}
	}
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cod_cuenta != $this->cod_cuenta || (isset($bFlagRead_cod_cuenta) && $bFlagRead_cod_cuenta)))
    {
        $this->ajax_return_values_cod_cuenta(true);
    }
}
$_SESSION['scriptcase']['form_terceros_cuentas_porpagar_161219']['contr_erro'] = 'off'; 
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['decimal_db'] == ",")
   {
       $this->nm_troca_decimal(".", ",");
   }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['parms'] = "idtercero_cuenta?#?$this->idtercero_cuenta?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idtercero_cuenta = null === $this->idtercero_cuenta ? null : substr($this->Db->qstr($this->idtercero_cuenta), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_filter'] . ")";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT idtercero_cuenta, prefijo, numero, str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), tercero, ie, tipo, numero_documento, valor_total, saldo, observaciones, abonos, usuario, ultimo_abono, str_replace (convert(char(10),fecha_uabono,102), '.', '-') + ' ' + convert(char(8),fecha_uabono,20), creado, editado, automatico, cod_cuenta, pagada, concepto from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT idtercero_cuenta, prefijo, numero, convert(char(23),fecha,121), tercero, ie, tipo, numero_documento, valor_total, saldo, observaciones, abonos, usuario, ultimo_abono, convert(char(23),fecha_uabono,121), creado, editado, automatico, cod_cuenta, pagada, concepto from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT idtercero_cuenta, prefijo, numero, fecha, tercero, ie, tipo, numero_documento, valor_total, saldo, observaciones, abonos, usuario, ultimo_abono, fecha_uabono, TO_DATE(TO_CHAR(creado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), TO_DATE(TO_CHAR(editado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), automatico, cod_cuenta, pagada, concepto from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT idtercero_cuenta, prefijo, numero, EXTEND(fecha, YEAR TO DAY), tercero, ie, tipo, numero_documento, valor_total, saldo, observaciones, abonos, usuario, ultimo_abono, EXTEND(fecha_uabono, YEAR TO DAY), creado, editado, automatico, cod_cuenta, pagada, concepto from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT idtercero_cuenta, prefijo, numero, fecha, tercero, ie, tipo, numero_documento, valor_total, saldo, observaciones, abonos, usuario, ultimo_abono, fecha_uabono, creado, editado, automatico, cod_cuenta, pagada, concepto from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "idtercero_cuenta = $this->idtercero_cuenta"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "idtercero_cuenta = $this->idtercero_cuenta"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "idtercero_cuenta = $this->idtercero_cuenta"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "idtercero_cuenta = $this->idtercero_cuenta"; 
              }  
              else  
              {
                  $aWhere[] = "idtercero_cuenta = $this->idtercero_cuenta"; 
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
          $sc_order_by = "fecha desc,numero desc";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "insert" || $this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['empty_filter'] = true;
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
              $this->idtercero_cuenta = $rs->fields[0] ; 
              $this->nmgp_dados_select['idtercero_cuenta'] = $this->idtercero_cuenta;
              $this->prefijo = $rs->fields[1] ; 
              $this->nmgp_dados_select['prefijo'] = $this->prefijo;
              $this->numero = $rs->fields[2] ; 
              $this->nmgp_dados_select['numero'] = $this->numero;
              $this->fecha = $rs->fields[3] ; 
              $this->nmgp_dados_select['fecha'] = $this->fecha;
              $this->tercero = $rs->fields[4] ; 
              $this->nmgp_dados_select['tercero'] = $this->tercero;
              $this->ie = $rs->fields[5] ; 
              $this->nmgp_dados_select['ie'] = $this->ie;
              $this->tipo = $rs->fields[6] ; 
              $this->nmgp_dados_select['tipo'] = $this->tipo;
              $this->numero_documento = $rs->fields[7] ; 
              $this->nmgp_dados_select['numero_documento'] = $this->numero_documento;
              $this->valor_total = trim($rs->fields[8]) ; 
              $this->nmgp_dados_select['valor_total'] = $this->valor_total;
              $this->saldo = trim($rs->fields[9]) ; 
              $this->nmgp_dados_select['saldo'] = $this->saldo;
              $this->observaciones = $rs->fields[10] ; 
              $this->nmgp_dados_select['observaciones'] = $this->observaciones;
              $this->abonos = $rs->fields[11] ; 
              $this->nmgp_dados_select['abonos'] = $this->abonos;
              $this->usuario = $rs->fields[12] ; 
              $this->nmgp_dados_select['usuario'] = $this->usuario;
              $this->ultimo_abono = $rs->fields[13] ; 
              $this->nmgp_dados_select['ultimo_abono'] = $this->ultimo_abono;
              $this->fecha_uabono = $rs->fields[14] ; 
              $this->nmgp_dados_select['fecha_uabono'] = $this->fecha_uabono;
              $this->creado = $rs->fields[15] ; 
              if (substr($this->creado, 10, 1) == "-") 
              { 
                 $this->creado = substr($this->creado, 0, 10) . " " . substr($this->creado, 11);
              } 
              if (substr($this->creado, 13, 1) == ".") 
              { 
                 $this->creado = substr($this->creado, 0, 13) . ":" . substr($this->creado, 14, 2) . ":" . substr($this->creado, 17);
              } 
              $this->nmgp_dados_select['creado'] = $this->creado;
              $this->editado = $rs->fields[16] ; 
              if (substr($this->editado, 10, 1) == "-") 
              { 
                 $this->editado = substr($this->editado, 0, 10) . " " . substr($this->editado, 11);
              } 
              if (substr($this->editado, 13, 1) == ".") 
              { 
                 $this->editado = substr($this->editado, 0, 13) . ":" . substr($this->editado, 14, 2) . ":" . substr($this->editado, 17);
              } 
              $this->nmgp_dados_select['editado'] = $this->editado;
              $this->automatico = $rs->fields[17] ; 
              $this->nmgp_dados_select['automatico'] = $this->automatico;
              $this->cod_cuenta = $rs->fields[18] ; 
              $this->nmgp_dados_select['cod_cuenta'] = $this->cod_cuenta;
              $this->pagada = $rs->fields[19] ; 
              $this->nmgp_dados_select['pagada'] = $this->pagada;
              $this->concepto = $rs->fields[20] ; 
              $this->nmgp_dados_select['concepto'] = $this->concepto;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->idtercero_cuenta = (string)$this->idtercero_cuenta; 
              $this->numero = (string)$this->numero; 
              $this->tercero = (string)$this->tercero; 
              $this->valor_total = (strpos(strtolower($this->valor_total), "e")) ? (float)$this->valor_total : $this->valor_total; 
              $this->valor_total = (string)$this->valor_total; 
              $this->saldo = (strpos(strtolower($this->saldo), "e")) ? (float)$this->saldo : $this->saldo; 
              $this->saldo = (string)$this->saldo; 
              $this->abonos = (string)$this->abonos; 
              $this->concepto = (string)$this->concepto; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['parms'] = "idtercero_cuenta?#?$this->idtercero_cuenta?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['reg_start'] < $qt_geral_reg_form_terceros_cuentas_porpagar_161219;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['opcao']   = '';
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
              $this->idtercero_cuenta = "";  
              $this->nmgp_dados_form["idtercero_cuenta"] = $this->idtercero_cuenta;
              $this->prefijo = "";  
              $this->nmgp_dados_form["prefijo"] = $this->prefijo;
              $this->numero = "";  
              $this->nmgp_dados_form["numero"] = $this->numero;
              $this->fecha =  date('Y') . "-" . date('m')  . "-" . date('d');
              $this->nmgp_dados_form["fecha"] = $this->fecha;
              $this->tercero = "";  
              $this->nmgp_dados_form["tercero"] = $this->tercero;
              $this->ie = "EGRESO";  
              $this->nmgp_dados_form["ie"] = $this->ie;
              $this->tipo = "";  
              $this->nmgp_dados_form["tipo"] = $this->tipo;
              $this->numero_documento = "";  
              $this->nmgp_dados_form["numero_documento"] = $this->numero_documento;
              $this->valor_total = "";  
              $this->nmgp_dados_form["valor_total"] = $this->valor_total;
              $this->saldo = "";  
              $this->nmgp_dados_form["saldo"] = $this->saldo;
              $this->observaciones = "";  
              $this->nmgp_dados_form["observaciones"] = $this->observaciones;
              $this->abonos = "";  
              $this->nmgp_dados_form["abonos"] = $this->abonos;
              $this->usuario = "" . $_SESSION['gidtercero'] . "";  
              $this->nmgp_dados_form["usuario"] = $this->usuario;
              $this->ultimo_abono = "";  
              $this->nmgp_dados_form["ultimo_abono"] = $this->ultimo_abono;
              $this->fecha_uabono = "";  
              $this->fecha_uabono_hora = "" ;  
              $this->nmgp_dados_form["fecha_uabono"] = $this->fecha_uabono;
              $this->creado = "";  
              $this->creado_hora = "" ;  
              $this->nmgp_dados_form["creado"] = $this->creado;
              $this->editado = "";  
              $this->editado_hora = "" ;  
              $this->nmgp_dados_form["editado"] = $this->editado;
              $this->automatico = "";  
              $this->nmgp_dados_form["automatico"] = $this->automatico;
              $this->cod_cuenta = "";  
              $this->nmgp_dados_form["cod_cuenta"] = $this->cod_cuenta;
              $this->pagada = "";  
              $this->nmgp_dados_form["pagada"] = $this->pagada;
              $this->concepto = "0";  
              $this->nmgp_dados_form["concepto"] = $this->concepto;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['foreign_key'] as $sFKName => $sFKValue)
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function cod_cuenta_onChange()
{
$_SESSION['scriptcase']['form_terceros_cuentas_porpagar_161219']['contr_erro'] = 'on';
  
$original_cod_cuenta = $this->cod_cuenta;
$original_tercero = $this->tercero;
$original_valor_total = $this->valor_total;
$original_saldo = $this->saldo;
$original_numero_documento = $this->numero_documento;
$original_tipo = $this->tipo;

if(!empty($this->cod_cuenta ))
{
	$vsql = "select  tercero,saldo,numero_documento,tipo from terceros_cuentas where concat(prefijo,'/',numero)='".$this->cod_cuenta ."'";
	 
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
		$vclien   = $this->vdatos[0][0];
		$vs       = $this->vdatos[0][1];
		if($vs<0)
		{
			$vs = $vs*-1;
		}
		$this->tercero  = $vclien;
		$this->valor_total  = $vs;
		$this->saldo    = $vs;
		$this->numero_documento  = $this->vdatos[0][2];
	}
}
else
{
	$this->tercero  = "";
	$this->tipo     = "";
	$this->valor_total  = "";
	$this->saldo    = "";
	$this->numero_documento  = "";
}

$modificado_cod_cuenta = $this->cod_cuenta;
$modificado_tercero = $this->tercero;
$modificado_valor_total = $this->valor_total;
$modificado_saldo = $this->saldo;
$modificado_numero_documento = $this->numero_documento;
$modificado_tipo = $this->tipo;
$this->nm_formatar_campos('cod_cuenta', 'tercero', 'valor_total', 'saldo', 'numero_documento', 'tipo');
if ($original_cod_cuenta !== $modificado_cod_cuenta || isset($this->nmgp_cmp_readonly['cod_cuenta']) || (isset($bFlagRead_cod_cuenta) && $bFlagRead_cod_cuenta))
{
    $this->ajax_return_values_cod_cuenta(true);
}
if ($original_tercero !== $modificado_tercero || isset($this->nmgp_cmp_readonly['tercero']) || (isset($bFlagRead_tercero) && $bFlagRead_tercero))
{
    $this->ajax_return_values_tercero(true);
}
if ($original_valor_total !== $modificado_valor_total || isset($this->nmgp_cmp_readonly['valor_total']) || (isset($bFlagRead_valor_total) && $bFlagRead_valor_total))
{
    $this->ajax_return_values_valor_total(true);
}
if ($original_saldo !== $modificado_saldo || isset($this->nmgp_cmp_readonly['saldo']) || (isset($bFlagRead_saldo) && $bFlagRead_saldo))
{
    $this->ajax_return_values_saldo(true);
}
if ($original_numero_documento !== $modificado_numero_documento || isset($this->nmgp_cmp_readonly['numero_documento']) || (isset($bFlagRead_numero_documento) && $bFlagRead_numero_documento))
{
    $this->ajax_return_values_numero_documento(true);
}
if ($original_tipo !== $modificado_tipo || isset($this->nmgp_cmp_readonly['tipo']) || (isset($bFlagRead_tipo) && $bFlagRead_tipo))
{
    $this->ajax_return_values_tipo(true);
}
$this->NM_ajax_info['event_field'] = 'cod';
form_terceros_cuentas_porpagar_161219_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_terceros_cuentas_porpagar_161219']['contr_erro'] = 'off';
}
function prefijo_onChange()
{
$_SESSION['scriptcase']['form_terceros_cuentas_porpagar_161219']['contr_erro'] = 'on';
  
$original_idtercero_cuenta = $this->idtercero_cuenta;
$original_prefijo = $this->prefijo;
$original_numero = $this->numero;

if(empty($this->idtercero_cuenta ))
{
 
      $nm_select = "select coalesce(max(numero),0)+1 from terceros_cuentas where prefijo='".$this->prefijo ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vConsecutivo = array();
      $this->vconsecutivo = array();
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
                      $this->vConsecutivo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vconsecutivo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vConsecutivo = false;
          $this->vConsecutivo_erro = $this->Db->ErrorMsg();
          $this->vconsecutivo = false;
          $this->vconsecutivo_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vconsecutivo[0][0]))
{
$this->numero  = $this->vconsecutivo[0][0];
}
else
{
$this->numero  = 1;
}
}

$modificado_idtercero_cuenta = $this->idtercero_cuenta;
$modificado_prefijo = $this->prefijo;
$modificado_numero = $this->numero;
$this->nm_formatar_campos('idtercero_cuenta', 'prefijo', 'numero');
if ($original_idtercero_cuenta !== $modificado_idtercero_cuenta || isset($this->nmgp_cmp_readonly['idtercero_cuenta']) || (isset($bFlagRead_idtercero_cuenta) && $bFlagRead_idtercero_cuenta))
{
    $this->ajax_return_values_idtercero_cuenta(true);
}
if ($original_prefijo !== $modificado_prefijo || isset($this->nmgp_cmp_readonly['prefijo']) || (isset($bFlagRead_prefijo) && $bFlagRead_prefijo))
{
    $this->ajax_return_values_prefijo(true);
}
if ($original_numero !== $modificado_numero || isset($this->nmgp_cmp_readonly['numero']) || (isset($bFlagRead_numero) && $bFlagRead_numero))
{
    $this->ajax_return_values_numero(true);
}
$this->NM_ajax_info['event_field'] = 'prefijo';
form_terceros_cuentas_porpagar_161219_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_terceros_cuentas_porpagar_161219']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_terceros_cuentas_porpagar_161219_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_terceros_cuentas_porpagar_161219_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("idtercero_cuenta", "prefijo", "numero", "fecha", "tercero", "ie", "tipo", "numero_documento", "valor_total", "saldo", "observaciones", "abonos", "usuario", "ultimo_abono", "fecha_uabono", "creado", "editado", "automatico"))) {
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
            $keywords = preg_quote($this->nmgp_arg_fast_search, '/');
            $result = preg_replace('/'. $keywords .'/i', $htmlIni . '$0' . $htmlFim, $result);
        } elseif ('eq' == $this->nmgp_cond_fast_search) {
            if (strcasecmp($this->nmgp_arg_fast_search, $value) == 0) {
                $result = $htmlIni. $result .$htmlFim;
            }
        }
    }


    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['csrf_token'];
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

   function Form_lookup_prefijo()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_prefijo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_prefijo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_prefijo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_prefijo'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_prefijo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_prefijo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_prefijo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_prefijo'] = array(); 
    }

   $old_value_numero = $this->numero;
   $old_value_fecha = $this->fecha;
   $old_value_valor_total = $this->valor_total;
   $old_value_saldo = $this->saldo;
   $old_value_idtercero_cuenta = $this->idtercero_cuenta;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero = $this->numero;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_valor_total = $this->valor_total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idtercero_cuenta = $this->idtercero_cuenta;

   $nm_comando = "SELECT Idres, prefijo  FROM resdian  ORDER BY prefijo";

   $this->numero = $old_value_numero;
   $this->fecha = $old_value_fecha;
   $this->valor_total = $old_value_valor_total;
   $this->saldo = $old_value_saldo;
   $this->idtercero_cuenta = $old_value_idtercero_cuenta;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_prefijo'][] = $rs->fields[0];
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
   function Form_lookup_tipo()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tipo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tipo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tipo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tipo'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tipo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tipo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tipo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tipo'] = array(); 
    }

   $old_value_numero = $this->numero;
   $old_value_fecha = $this->fecha;
   $old_value_valor_total = $this->valor_total;
   $old_value_saldo = $this->saldo;
   $old_value_idtercero_cuenta = $this->idtercero_cuenta;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero = $this->numero;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_valor_total = $this->valor_total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idtercero_cuenta = $this->idtercero_cuenta;

   $nm_comando = "SELECT codigo, concepto  FROM conceptos_documentos  WHERE tipo='EGRESO' ORDER BY concepto";

   $this->numero = $old_value_numero;
   $this->fecha = $old_value_fecha;
   $this->valor_total = $old_value_valor_total;
   $this->saldo = $old_value_saldo;
   $this->idtercero_cuenta = $old_value_idtercero_cuenta;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_tipo'][] = $rs->fields[0];
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
   function Form_lookup_concepto()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_concepto']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_concepto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_concepto']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_concepto'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_concepto']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_concepto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_concepto']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_concepto'] = array(); 
    }

   $old_value_numero = $this->numero;
   $old_value_fecha = $this->fecha;
   $old_value_valor_total = $this->valor_total;
   $old_value_saldo = $this->saldo;
   $old_value_idtercero_cuenta = $this->idtercero_cuenta;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero = $this->numero;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_valor_total = $this->valor_total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idtercero_cuenta = $this->idtercero_cuenta;

   $nm_comando = "SELECT idpagos_conceptos, descripcion  FROM pagos_conceptos  WHERE tipodoc = 'CE' ORDER BY descripcion";

   $this->numero = $old_value_numero;
   $this->fecha = $old_value_fecha;
   $this->valor_total = $old_value_valor_total;
   $this->saldo = $old_value_saldo;
   $this->idtercero_cuenta = $old_value_idtercero_cuenta;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_concepto'][] = $rs->fields[0];
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
   function Form_lookup_usuario()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_usuario']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_usuario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_usuario']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_usuario'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_usuario']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_usuario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_usuario']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_usuario'] = array(); 
    }

   $old_value_numero = $this->numero;
   $old_value_fecha = $this->fecha;
   $old_value_valor_total = $this->valor_total;
   $old_value_saldo = $this->saldo;
   $old_value_idtercero_cuenta = $this->idtercero_cuenta;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero = $this->numero;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_valor_total = $this->valor_total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idtercero_cuenta = $this->idtercero_cuenta;

   $nm_comando = "SELECT idtercero, nombres  FROM terceros  WHERE empleado='SI' or documento='0000000' ORDER BY nombres";

   $this->numero = $old_value_numero;
   $this->fecha = $old_value_fecha;
   $this->valor_total = $old_value_valor_total;
   $this->saldo = $old_value_saldo;
   $this->idtercero_cuenta = $old_value_idtercero_cuenta;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['Lookup_usuario'][] = $rs->fields[0];
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
   function Form_lookup_ie()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "EGRESO?#?EGRESO?#?N?@?";
       $nmgp_def_dados .= "INGRESO?#?INGRESO?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_terceros_cuentas_porpagar_161219_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "idtercero_cuenta", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_prefijo($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "prefijo", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "numero", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecha", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_tercero($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "tercero", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_ie($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "ie", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_tipo($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "tipo", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "numero_documento", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "valor_total", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "saldo", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "observaciones", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "abonos", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_usuario($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "usuario", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ultimo_abono", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecha_uabono", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "creado", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "editado", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "automatico", $arg_search, $data_search);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_terceros_cuentas_porpagar_161219 = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['total'] = $qt_geral_reg_form_terceros_cuentas_porpagar_161219;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_terceros_cuentas_porpagar_161219_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_terceros_cuentas_porpagar_161219_pack_ajax_response();
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
      $nm_numeric[] = "idtercero_cuenta";$nm_numeric[] = "numero";$nm_numeric[] = "tercero";$nm_numeric[] = "valor_total";$nm_numeric[] = "saldo";$nm_numeric[] = "abonos";$nm_numeric[] = "concepto";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['decimal_db'] == ".")
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
      $Nm_datas['fecha'] = "date";$Nm_datas['fecha_uabono'] = "date";$Nm_datas['creado'] = "timestamp";$Nm_datas['editado'] = "timestamp";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['SC_sep_date1'];
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
   function SC_lookup_prefijo($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT prefijo, Idres FROM resdian WHERE (prefijo LIKE '%$campo%')" ; 
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
   function SC_lookup_tercero($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT documento + ' - ' + nombres, idtercero FROM terceros WHERE (documento + ' - ' + nombres LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(documento,' - ',nombres), idtercero FROM terceros WHERE (concat(documento,' - ',nombres) LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT documento&' - '&nombres, idtercero FROM terceros WHERE (documento&' - '&nombres LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT documento||' - '||nombres, idtercero FROM terceros WHERE (documento||' - '||nombres LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT documento + ' - ' + nombres, idtercero FROM terceros WHERE (documento + ' - ' + nombres LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT documento||' - '||nombres, idtercero FROM terceros WHERE (documento||' - '||nombres LIKE '%$campo%')" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT documento||' - '||nombres, idtercero FROM terceros WHERE (documento||' - '||nombres LIKE '%$campo%')" ; 
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
   function SC_lookup_ie($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['EGRESO'] = "EGRESO";
       $data_look['INGRESO'] = "INGRESO";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
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
          
       }
       return $result;
   }
   function SC_lookup_tipo($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT concepto, codigo FROM conceptos_documentos WHERE (concepto LIKE '%$campo%') AND (tipo='EGRESO')" ; 
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
   function SC_lookup_usuario($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT nombres, idtercero FROM terceros WHERE (CAST (idtercero AS TEXT) LIKE '%$campo%') AND (empleado='SI') AND (documento='0000000')" ; 
       }
       else
       {
           $nm_comando = "SELECT nombres, idtercero FROM terceros WHERE (nombres LIKE '%$campo%') AND (empleado='SI') AND (documento='0000000')" ; 
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
       $nmgp_saida_form = "form_terceros_cuentas_porpagar_161219_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_terceros_cuentas_porpagar_161219_fim.php";
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
       form_terceros_cuentas_porpagar_161219_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_cuentas_porpagar_161219']['masterValue']);
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
    function getButtonIds($buttonName) {
        switch ($buttonName) {
            case "new":
                return array("sc_b_new_t.sc-unique-btn-1");
                break;
            case "insert":
                return array("sc_b_ins_t.sc-unique-btn-2");
                break;
            case "update":
                return array("sc_b_upd_t.sc-unique-btn-3");
                break;
            case "delete":
                return array("sc_b_del_t.sc-unique-btn-4");
                break;
            case "help":
                return array("sc_b_hlp_t");
                break;
            case "exit":
                return array("sc_b_sai_t.sc-unique-btn-5", "sc_b_sai_t.sc-unique-btn-7", "sc_b_sai_t.sc-unique-btn-6");
                break;
        }

        return array($buttonName);
    } // getButtonIds

}
?>
