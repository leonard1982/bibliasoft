<?php
//
class form_recibos_ing_caja_apl
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
   var $id_recibo;
   var $numero_rc;
   var $fecha_rc;
   var $contrato;
   var $tercero;
   var $monto_rc;
   var $observacion;
   var $creado;
   var $creado_hora;
   var $editado;
   var $editado_hora;
   var $id_banco;
   var $id_banco_1;
   var $asentado;
   var $asentado_1;
   var $detalle1;
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
          if (isset($this->NM_ajax_info['param']['asentado']))
          {
              $this->asentado = $this->NM_ajax_info['param']['asentado'];
          }
          if (isset($this->NM_ajax_info['param']['contrato']))
          {
              $this->contrato = $this->NM_ajax_info['param']['contrato'];
          }
          if (isset($this->NM_ajax_info['param']['creado']))
          {
              $this->creado = $this->NM_ajax_info['param']['creado'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['detalle1']))
          {
              $this->detalle1 = $this->NM_ajax_info['param']['detalle1'];
          }
          if (isset($this->NM_ajax_info['param']['editado']))
          {
              $this->editado = $this->NM_ajax_info['param']['editado'];
          }
          if (isset($this->NM_ajax_info['param']['fecha_rc']))
          {
              $this->fecha_rc = $this->NM_ajax_info['param']['fecha_rc'];
          }
          if (isset($this->NM_ajax_info['param']['id_banco']))
          {
              $this->id_banco = $this->NM_ajax_info['param']['id_banco'];
          }
          if (isset($this->NM_ajax_info['param']['id_recibo']))
          {
              $this->id_recibo = $this->NM_ajax_info['param']['id_recibo'];
          }
          if (isset($this->NM_ajax_info['param']['monto_rc']))
          {
              $this->monto_rc = $this->NM_ajax_info['param']['monto_rc'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['numero_rc']))
          {
              $this->numero_rc = $this->NM_ajax_info['param']['numero_rc'];
          }
          if (isset($this->NM_ajax_info['param']['observacion']))
          {
              $this->observacion = $this->NM_ajax_info['param']['observacion'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['tercero']))
          {
              $this->tercero = $this->NM_ajax_info['param']['tercero'];
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
      if (isset($this->gElContrato) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gElContrato'] = $this->gElContrato;
      }
      if (isset($_POST["gElContrato"]) && isset($this->gElContrato)) 
      {
          $_SESSION['gElContrato'] = $this->gElContrato;
      }
      if (!isset($_POST["gElContrato"]) && isset($_POST["gelcontrato"])) 
      {
          $_SESSION['gElContrato'] = $_POST["gelcontrato"];
      }
      if (isset($_GET["gElContrato"]) && isset($this->gElContrato)) 
      {
          $_SESSION['gElContrato'] = $this->gElContrato;
      }
      if (!isset($_GET["gElContrato"]) && isset($_GET["gelcontrato"])) 
      {
          $_SESSION['gElContrato'] = $_GET["gelcontrato"];
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['embutida_parms']);
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
                 nm_limpa_str_form_recibos_ing_caja($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (!isset($this->gElContrato) && isset($this->gelcontrato)) 
          {
              $this->gElContrato = $this->gelcontrato;
          }
          if (isset($this->gElContrato)) 
          {
              $_SESSION['gElContrato'] = $this->gElContrato;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['total']);
          }
          if (!isset($_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['total']))
          {
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['form_recibos_ingcaja_detalle_script_case_init'] ]['form_recibos_ingcaja_detalle']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['form_recibos_ingcaja_detalle_script_case_init'] ]['form_recibos_ingcaja_detalle']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (!isset($this->gElContrato) && isset($this->gelcontrato)) 
          {
              $this->gElContrato = $this->gelcontrato;
          }
          if (isset($this->gElContrato)) 
          {
              $_SESSION['gElContrato'] = $this->gElContrato;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['nm_run_menu'] = 1;
      } 
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->creado);
          $this->creado      = $aDtParts[0];
          $this->creado_hora = $aDtParts[1];
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->editado);
          $this->editado      = $aDtParts[0];
          $this->editado_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_recibos_ing_caja_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_recibos_ing_caja']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_recibos_ing_caja']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_recibos_ing_caja'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_recibos_ing_caja']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_recibos_ing_caja']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_recibos_ing_caja') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_recibos_ing_caja']['label'] = "Recibos de Ingreso a caja";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_recibos_ing_caja")
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



      $_SESSION['scriptcase']['error_icon']['form_recibos_ing_caja']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Lemon__NM__nm_scriptcase9_Lemon_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_recibos_ing_caja'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['goto']      = 'on';
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_recibos_ing_caja']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_recibos_ing_caja'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_recibos_ing_caja'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_recibos_ing_caja", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_recibos_ing_caja/form_recibos_ing_caja_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_recibos_ing_caja_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_recibos_ing_caja_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_recibos_ing_caja_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_recibos_ing_caja/form_recibos_ing_caja_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_recibos_ing_caja_erro.class.php"); 
      }
      $this->Erro      = new form_recibos_ing_caja_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['opcao']))
         { 
             if ($this->id_recibo != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_recibos_ing_caja']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['dados_form'];
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
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['form_recibos_ingcaja_detalle_script_case_init'] ]['form_recibos_ingcaja_detalle']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['form_recibos_ingcaja_detalle_script_case_init'] ]['form_recibos_ingcaja_detalle']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['form_recibos_ingcaja_detalle_script_case_init'] ]['form_recibos_ingcaja_detalle']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['form_recibos_ingcaja_detalle_script_case_init'] ]['form_recibos_ingcaja_detalle']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_recibos_ingcaja_detalle') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_recibos_ingcaja_detalle') . "/form_recibos_ingcaja_detalle_apl.php");
          $this->form_recibos_ingcaja_detalle = new form_recibos_ingcaja_detalle_apl;
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

            $out1_img_cache = $_SESSION['scriptcase']['form_recibos_ing_caja']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['form_recibos_ing_caja']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
            }            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
      if (isset($this->id_recibo)) { $this->nm_limpa_alfa($this->id_recibo); }
      if (isset($this->numero_rc)) { $this->nm_limpa_alfa($this->numero_rc); }
      if (isset($this->contrato)) { $this->nm_limpa_alfa($this->contrato); }
      if (isset($this->tercero)) { $this->nm_limpa_alfa($this->tercero); }
      if (isset($this->monto_rc)) { $this->nm_limpa_alfa($this->monto_rc); }
      if (isset($this->observacion)) { $this->nm_limpa_alfa($this->observacion); }
      if (isset($this->id_banco)) { $this->nm_limpa_alfa($this->id_banco); }
      if (isset($this->asentado)) { $this->nm_limpa_alfa($this->asentado); }
      if (isset($this->detalle1)) { $this->nm_limpa_alfa($this->detalle1); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- id_recibo
      $this->field_config['id_recibo']               = array();
      $this->field_config['id_recibo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_recibo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_recibo']['symbol_dec'] = '';
      $this->field_config['id_recibo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_recibo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- numero_rc
      $this->field_config['numero_rc']               = array();
      $this->field_config['numero_rc']['symbol_grp'] = '';
      $this->field_config['numero_rc']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['numero_rc']['symbol_dec'] = '';
      $this->field_config['numero_rc']['symbol_neg'] = '-';
      $this->field_config['numero_rc']['format_neg'] = '4';
      //-- fecha_rc
      $this->field_config['fecha_rc']                 = array();
      $this->field_config['fecha_rc']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fecha_rc']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha_rc']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fecha_rc');
      //-- contrato
      $this->field_config['contrato']               = array();
      $this->field_config['contrato']['symbol_grp'] = '';
      $this->field_config['contrato']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['contrato']['symbol_dec'] = '';
      $this->field_config['contrato']['symbol_neg'] = '';
      $this->field_config['contrato']['format_neg'] = '4';
      //-- monto_rc
      $this->field_config['monto_rc']               = array();
      $this->field_config['monto_rc']['symbol_grp'] = '.';
      $this->field_config['monto_rc']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['monto_rc']['symbol_dec'] = ',';
      $this->field_config['monto_rc']['symbol_mon'] = '$';
      $this->field_config['monto_rc']['format_pos'] = '3';
      $this->field_config['monto_rc']['format_neg'] = '4';
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
          if ('validate_id_recibo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_recibo');
          }
          if ('validate_numero_rc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numero_rc');
          }
          if ('validate_fecha_rc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecha_rc');
          }
          if ('validate_contrato' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'contrato');
          }
          if ('validate_tercero' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tercero');
          }
          if ('validate_monto_rc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'monto_rc');
          }
          if ('validate_id_banco' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_banco');
          }
          if ('validate_asentado' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'asentado');
          }
          if ('validate_observacion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'observacion');
          }
          if ('validate_creado' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'creado');
          }
          if ('validate_editado' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'editado');
          }
          if ('validate_detalle1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'detalle1');
          }
          form_recibos_ing_caja_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_asentado_onchange' == $this->NM_ajax_opcao)
          {
              $this->asentado_onChange();
          }
          if ('event_contrato_onchange' == $this->NM_ajax_opcao)
          {
              $this->contrato_onChange();
          }
          form_recibos_ing_caja_pack_ajax_response();
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_tercero']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_tercero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_tercero']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_tercero'] = array(); 
    }

   $old_value_id_recibo = $this->id_recibo;
   $old_value_numero_rc = $this->numero_rc;
   $old_value_fecha_rc = $this->fecha_rc;
   $old_value_contrato = $this->contrato;
   $old_value_monto_rc = $this->monto_rc;
   $old_value_creado = $this->creado;
   $old_value_creado_hora = $this->creado_hora;
   $old_value_editado = $this->editado;
   $old_value_editado_hora = $this->editado_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_recibo = $this->id_recibo;
   $unformatted_value_numero_rc = $this->numero_rc;
   $unformatted_value_fecha_rc = $this->fecha_rc;
   $unformatted_value_contrato = $this->contrato;
   $unformatted_value_monto_rc = $this->monto_rc;
   $unformatted_value_creado = $this->creado;
   $unformatted_value_creado_hora = $this->creado_hora;
   $unformatted_value_editado = $this->editado;
   $unformatted_value_editado_hora = $this->editado_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT documento, documento + ' - ' + nombres FROM terceros WHERE documento + ' - ' + nombres LIKE '%" . substr($this->Db->qstr($this->tercero), 1, -1) . "%' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT documento, concat(documento,' - ' ,nombres) FROM terceros WHERE concat(documento,' - ' ,nombres) LIKE '%" . substr($this->Db->qstr($this->tercero), 1, -1) . "%' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT documento, documento&' - '&nombres FROM terceros WHERE documento&' - '&nombres LIKE '%" . substr($this->Db->qstr($this->tercero), 1, -1) . "%' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT documento, documento||' - '||nombres FROM terceros WHERE documento||' - '||nombres LIKE '%" . substr($this->Db->qstr($this->tercero), 1, -1) . "%' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT documento, documento + ' - ' + nombres FROM terceros WHERE documento + ' - ' + nombres LIKE '%" . substr($this->Db->qstr($this->tercero), 1, -1) . "%' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT documento, documento||' - '||nombres FROM terceros WHERE documento||' - '||nombres LIKE '%" . substr($this->Db->qstr($this->tercero), 1, -1) . "%' ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT documento, documento||' - '||nombres FROM terceros WHERE documento||' - '||nombres LIKE '%" . substr($this->Db->qstr($this->tercero), 1, -1) . "%' ORDER BY documento, nombres";
   }

   $this->id_recibo = $old_value_id_recibo;
   $this->numero_rc = $old_value_numero_rc;
   $this->fecha_rc = $old_value_fecha_rc;
   $this->contrato = $old_value_contrato;
   $this->monto_rc = $old_value_monto_rc;
   $this->creado = $old_value_creado;
   $this->creado_hora = $old_value_creado_hora;
   $this->editado = $old_value_editado;
   $this->editado_hora = $old_value_editado_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_recibos_ing_caja_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_recibos_ing_caja_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_tercero'][] = $rs->fields[0];
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
          form_recibos_ing_caja_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['inline_form_seq'] = $this->sc_seq_row;
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
              form_recibos_ing_caja_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_recibos_ing_caja']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_recibos_ing_caja_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['sc_redir_atualiz'] == "ok")
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
          form_recibos_ing_caja_pack_ajax_response();
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
          form_recibos_ing_caja_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_recibos_ing_caja.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Recibos de Ingreso a caja") ?></TITLE>
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
<form name="Fdown" method="get" action="form_recibos_ing_caja_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_recibos_ing_caja"> 
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
           case 'id_recibo':
               return "Id Recibo";
               break;
           case 'numero_rc':
               return "Numero";
               break;
           case 'fecha_rc':
               return "Fecha";
               break;
           case 'contrato':
               return "Contrato";
               break;
           case 'tercero':
               return "Tercero";
               break;
           case 'monto_rc':
               return "Monto Rc";
               break;
           case 'id_banco':
               return "Caja N°";
               break;
           case 'asentado':
               return "Asentado";
               break;
           case 'observacion':
               return "Observaciones:";
               break;
           case 'creado':
               return "Creado";
               break;
           case 'editado':
               return "Editado";
               break;
           case 'detalle1':
               return "detalle1";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_recibos_ing_caja']) || !is_array($this->NM_ajax_info['errList']['geral_form_recibos_ing_caja']))
              {
                  $this->NM_ajax_info['errList']['geral_form_recibos_ing_caja'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_recibos_ing_caja'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'id_recibo' == $filtro)) || (is_array($filtro) && in_array('id_recibo', $filtro)))
        $this->ValidateField_id_recibo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'numero_rc' == $filtro)) || (is_array($filtro) && in_array('numero_rc', $filtro)))
        $this->ValidateField_numero_rc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fecha_rc' == $filtro)) || (is_array($filtro) && in_array('fecha_rc', $filtro)))
        $this->ValidateField_fecha_rc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'contrato' == $filtro)) || (is_array($filtro) && in_array('contrato', $filtro)))
        $this->ValidateField_contrato($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tercero' == $filtro)) || (is_array($filtro) && in_array('tercero', $filtro)))
        $this->ValidateField_tercero($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'monto_rc' == $filtro)) || (is_array($filtro) && in_array('monto_rc', $filtro)))
        $this->ValidateField_monto_rc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_banco' == $filtro)) || (is_array($filtro) && in_array('id_banco', $filtro)))
        $this->ValidateField_id_banco($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'asentado' == $filtro)) || (is_array($filtro) && in_array('asentado', $filtro)))
        $this->ValidateField_asentado($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'observacion' == $filtro)) || (is_array($filtro) && in_array('observacion', $filtro)))
        $this->ValidateField_observacion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'creado' == $filtro)) || (is_array($filtro) && in_array('creado', $filtro)))
        $this->ValidateField_creado($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'editado' == $filtro)) || (is_array($filtro) && in_array('editado', $filtro)))
        $this->ValidateField_editado($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'detalle1' == $filtro)) || (is_array($filtro) && in_array('detalle1', $filtro)))
        $this->ValidateField_detalle1($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_id_recibo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->id_recibo === "" || is_null($this->id_recibo))  
      { 
          $this->id_recibo = 0;
      } 
      nm_limpa_numero($this->id_recibo, $this->field_config['id_recibo']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->id_recibo != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->id_recibo) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Id Recibo: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id_recibo']))
                  {
                      $Campos_Erros['id_recibo'] = array();
                  }
                  $Campos_Erros['id_recibo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id_recibo']) || !is_array($this->NM_ajax_info['errList']['id_recibo']))
                  {
                      $this->NM_ajax_info['errList']['id_recibo'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_recibo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id_recibo, 20, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Id Recibo; " ; 
                  if (!isset($Campos_Erros['id_recibo']))
                  {
                      $Campos_Erros['id_recibo'] = array();
                  }
                  $Campos_Erros['id_recibo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id_recibo']) || !is_array($this->NM_ajax_info['errList']['id_recibo']))
                  {
                      $this->NM_ajax_info['errList']['id_recibo'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_recibo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_recibo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_recibo

    function ValidateField_numero_rc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->numero_rc === "" || is_null($this->numero_rc))  
      { 
          $this->numero_rc = 0;
          $this->sc_force_zero[] = 'numero_rc';
      } 
      nm_limpa_numero($this->numero_rc, $this->field_config['numero_rc']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->numero_rc != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->numero_rc) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Numero: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['numero_rc']))
                  {
                      $Campos_Erros['numero_rc'] = array();
                  }
                  $Campos_Erros['numero_rc'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['numero_rc']) || !is_array($this->NM_ajax_info['errList']['numero_rc']))
                  {
                      $this->NM_ajax_info['errList']['numero_rc'] = array();
                  }
                  $this->NM_ajax_info['errList']['numero_rc'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->numero_rc, 20, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Numero; " ; 
                  if (!isset($Campos_Erros['numero_rc']))
                  {
                      $Campos_Erros['numero_rc'] = array();
                  }
                  $Campos_Erros['numero_rc'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['numero_rc']) || !is_array($this->NM_ajax_info['errList']['numero_rc']))
                  {
                      $this->NM_ajax_info['errList']['numero_rc'] = array();
                  }
                  $this->NM_ajax_info['errList']['numero_rc'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'numero_rc';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_numero_rc

    function ValidateField_fecha_rc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fecha_rc, $this->field_config['fecha_rc']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fecha_rc']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fecha_rc']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fecha_rc']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fecha_rc']['date_sep']) ; 
          if (trim($this->fecha_rc) != "")  
          { 
              if ($teste_validade->Data($this->fecha_rc, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecha; " ; 
                  if (!isset($Campos_Erros['fecha_rc']))
                  {
                      $Campos_Erros['fecha_rc'] = array();
                  }
                  $Campos_Erros['fecha_rc'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecha_rc']) || !is_array($this->NM_ajax_info['errList']['fecha_rc']))
                  {
                      $this->NM_ajax_info['errList']['fecha_rc'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecha_rc'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fecha_rc']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecha_rc';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fecha_rc

    function ValidateField_contrato(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->contrato === "" || is_null($this->contrato))  
      { 
          $this->contrato = 0;
          $this->sc_force_zero[] = 'contrato';
      } 
      nm_limpa_numero($this->contrato, $this->field_config['contrato']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->contrato != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->contrato) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Contrato: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['contrato']))
                  {
                      $Campos_Erros['contrato'] = array();
                  }
                  $Campos_Erros['contrato'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['contrato']) || !is_array($this->NM_ajax_info['errList']['contrato']))
                  {
                      $this->NM_ajax_info['errList']['contrato'] = array();
                  }
                  $this->NM_ajax_info['errList']['contrato'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->contrato, 12, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Contrato; " ; 
                  if (!isset($Campos_Erros['contrato']))
                  {
                      $Campos_Erros['contrato'] = array();
                  }
                  $Campos_Erros['contrato'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['contrato']) || !is_array($this->NM_ajax_info['errList']['contrato']))
                  {
                      $this->NM_ajax_info['errList']['contrato'] = array();
                  }
                  $this->NM_ajax_info['errList']['contrato'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'contrato';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_contrato

    function ValidateField_tercero(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['php_cmp_required']['tercero']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['php_cmp_required']['tercero'] == "on")) 
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
          if (NM_utf8_strlen($this->tercero) > 14) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tercero " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 14 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tercero']))
              {
                  $Campos_Erros['tercero'] = array();
              }
              $Campos_Erros['tercero'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 14 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tercero']) || !is_array($this->NM_ajax_info['errList']['tercero']))
              {
                  $this->NM_ajax_info['errList']['tercero'] = array();
              }
              $this->NM_ajax_info['errList']['tercero'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 14 " . $this->Ini->Nm_lang['lang_errm_nchr'];
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

    function ValidateField_monto_rc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->monto_rc === "" || is_null($this->monto_rc))  
      { 
          $this->monto_rc = 0;
          $this->sc_force_zero[] = 'monto_rc';
      } 
      }
      if (!empty($this->field_config['monto_rc']['symbol_dec']))
      {
          $this->sc_remove_currency($this->monto_rc, $this->field_config['monto_rc']['symbol_dec'], $this->field_config['monto_rc']['symbol_grp'], $this->field_config['monto_rc']['symbol_mon']); 
          nm_limpa_valor($this->monto_rc, $this->field_config['monto_rc']['symbol_dec'], $this->field_config['monto_rc']['symbol_grp']) ; 
          if ('.' == substr($this->monto_rc, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->monto_rc, 1)))
              {
                  $this->monto_rc = '';
              }
              else
              {
                  $this->monto_rc = '0' . $this->monto_rc;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->monto_rc != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->monto_rc) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Monto Rc: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['monto_rc']))
                  {
                      $Campos_Erros['monto_rc'] = array();
                  }
                  $Campos_Erros['monto_rc'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['monto_rc']) || !is_array($this->NM_ajax_info['errList']['monto_rc']))
                  {
                      $this->NM_ajax_info['errList']['monto_rc'] = array();
                  }
                  $this->NM_ajax_info['errList']['monto_rc'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->monto_rc, 10, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Monto Rc; " ; 
                  if (!isset($Campos_Erros['monto_rc']))
                  {
                      $Campos_Erros['monto_rc'] = array();
                  }
                  $Campos_Erros['monto_rc'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['monto_rc']) || !is_array($this->NM_ajax_info['errList']['monto_rc']))
                  {
                      $this->NM_ajax_info['errList']['monto_rc'] = array();
                  }
                  $this->NM_ajax_info['errList']['monto_rc'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'monto_rc';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_monto_rc

    function ValidateField_id_banco(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->id_banco) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_id_banco']) && !in_array($this->id_banco, $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_id_banco']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_banco']))
                   {
                       $Campos_Erros['id_banco'] = array();
                   }
                   $Campos_Erros['id_banco'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_banco']) || !is_array($this->NM_ajax_info['errList']['id_banco']))
                   {
                       $this->NM_ajax_info['errList']['id_banco'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_banco'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_banco';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_banco

    function ValidateField_asentado(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->asentado == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'asentado';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_asentado

    function ValidateField_observacion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->observacion) > 200) 
          { 
              $hasError = true;
              $Campos_Crit .= "Observaciones: " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['observacion']))
              {
                  $Campos_Erros['observacion'] = array();
              }
              $Campos_Erros['observacion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['observacion']) || !is_array($this->NM_ajax_info['errList']['observacion']))
              {
                  $this->NM_ajax_info['errList']['observacion'] = array();
              }
              $this->NM_ajax_info['errList']['observacion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'observacion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_observacion

    function ValidateField_creado(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->creado, $this->field_config['creado']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao == "incluir")
      { 
          $guarda_datahora = $this->field_config['creado']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['creado']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['creado']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['creado']['date_sep']) ; 
          if (trim($this->creado) != "")  
          { 
              if ($teste_validade->Data($this->creado, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Creado; " ; 
                  if (!isset($Campos_Erros['creado']))
                  {
                      $Campos_Erros['creado'] = array();
                  }
                  $Campos_Erros['creado'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['creado']) || !is_array($this->NM_ajax_info['errList']['creado']))
                  {
                      $this->NM_ajax_info['errList']['creado'] = array();
                  }
                  $this->NM_ajax_info['errList']['creado'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['creado']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'creado';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->creado_hora, $this->field_config['creado_hora']['time_sep']) ; 
      if ($this->nmgp_opcao == "incluir")
      {
          $Format_Hora = $this->field_config['creado_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['creado_hora']['time_sep']) ; 
          if (trim($this->creado_hora) != "")  
          { 
              if ($teste_validade->Hora($this->creado_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Creado; " ; 
                  if (!isset($Campos_Erros['creado_hora']))
                  {
                      $Campos_Erros['creado_hora'] = array();
                  }
                  $Campos_Erros['creado_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['creado']) || !is_array($this->NM_ajax_info['errList']['creado']))
                  {
                      $this->NM_ajax_info['errList']['creado'] = array();
                  }
                  $this->NM_ajax_info['errList']['creado'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['creado']) && isset($Campos_Erros['creado_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['creado'], $Campos_Erros['creado_hora']);
          if (empty($Campos_Erros['creado_hora']))
          {
              unset($Campos_Erros['creado_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['creado']))
          {
              $this->NM_ajax_info['errList']['creado'] = array_unique($this->NM_ajax_info['errList']['creado']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'creado_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_creado_hora

    function ValidateField_editado(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->editado, $this->field_config['editado']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['editado']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['editado']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['editado']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['editado']['date_sep']) ; 
          if (trim($this->editado) != "")  
          { 
              if ($teste_validade->Data($this->editado, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Editado; " ; 
                  if (!isset($Campos_Erros['editado']))
                  {
                      $Campos_Erros['editado'] = array();
                  }
                  $Campos_Erros['editado'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['editado']) || !is_array($this->NM_ajax_info['errList']['editado']))
                  {
                      $this->NM_ajax_info['errList']['editado'] = array();
                  }
                  $this->NM_ajax_info['errList']['editado'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['editado']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'editado';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->editado_hora, $this->field_config['editado_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['editado_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['editado_hora']['time_sep']) ; 
          if (trim($this->editado_hora) != "")  
          { 
              if ($teste_validade->Hora($this->editado_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Editado; " ; 
                  if (!isset($Campos_Erros['editado_hora']))
                  {
                      $Campos_Erros['editado_hora'] = array();
                  }
                  $Campos_Erros['editado_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['editado']) || !is_array($this->NM_ajax_info['errList']['editado']))
                  {
                      $this->NM_ajax_info['errList']['editado'] = array();
                  }
                  $this->NM_ajax_info['errList']['editado'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['editado']) && isset($Campos_Erros['editado_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['editado'], $Campos_Erros['editado_hora']);
          if (empty($Campos_Erros['editado_hora']))
          {
              unset($Campos_Erros['editado_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['editado']))
          {
              $this->NM_ajax_info['errList']['editado'] = array_unique($this->NM_ajax_info['errList']['editado']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'editado_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_editado_hora

    function ValidateField_detalle1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->detalle1) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'detalle1';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_detalle1

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
    $this->nmgp_dados_form['id_recibo'] = $this->id_recibo;
    $this->nmgp_dados_form['numero_rc'] = $this->numero_rc;
    $this->nmgp_dados_form['fecha_rc'] = (strlen(trim($this->fecha_rc)) > 19) ? str_replace(".", ":", $this->fecha_rc) : trim($this->fecha_rc);
    $this->nmgp_dados_form['contrato'] = $this->contrato;
    $this->nmgp_dados_form['tercero'] = $this->tercero;
    $this->nmgp_dados_form['monto_rc'] = $this->monto_rc;
    $this->nmgp_dados_form['id_banco'] = $this->id_banco;
    $this->nmgp_dados_form['asentado'] = $this->asentado;
    $this->nmgp_dados_form['observacion'] = $this->observacion;
    $this->nmgp_dados_form['creado'] = (strlen(trim($this->creado)) > 19) ? str_replace(".", ":", $this->creado) : trim($this->creado);
    $this->nmgp_dados_form['editado'] = (strlen(trim($this->editado)) > 19) ? str_replace(".", ":", $this->editado) : trim($this->editado);
    $this->nmgp_dados_form['detalle1'] = $this->detalle1;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['id_recibo'] = $this->id_recibo;
      nm_limpa_numero($this->id_recibo, $this->field_config['id_recibo']['symbol_grp']) ; 
      $this->Before_unformat['numero_rc'] = $this->numero_rc;
      nm_limpa_numero($this->numero_rc, $this->field_config['numero_rc']['symbol_grp']) ; 
      $this->Before_unformat['fecha_rc'] = $this->fecha_rc;
      nm_limpa_data($this->fecha_rc, $this->field_config['fecha_rc']['date_sep']) ; 
      $this->Before_unformat['contrato'] = $this->contrato;
      nm_limpa_numero($this->contrato, $this->field_config['contrato']['symbol_grp']) ; 
      $this->Before_unformat['monto_rc'] = $this->monto_rc;
      if (!empty($this->field_config['monto_rc']['symbol_dec']))
      {
         $this->sc_remove_currency($this->monto_rc, $this->field_config['monto_rc']['symbol_dec'], $this->field_config['monto_rc']['symbol_grp'], $this->field_config['monto_rc']['symbol_mon']);
         nm_limpa_valor($this->monto_rc, $this->field_config['monto_rc']['symbol_dec'], $this->field_config['monto_rc']['symbol_grp']);
      }
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
      if ($Nome_Campo == "id_recibo")
      {
          nm_limpa_numero($this->id_recibo, $this->field_config['id_recibo']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "numero_rc")
      {
          nm_limpa_numero($this->numero_rc, $this->field_config['numero_rc']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "contrato")
      {
          nm_limpa_numero($this->contrato, $this->field_config['contrato']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "monto_rc")
      {
          if (!empty($this->field_config['monto_rc']['symbol_dec']))
          {
             $this->sc_remove_currency($this->monto_rc, $this->field_config['monto_rc']['symbol_dec'], $this->field_config['monto_rc']['symbol_grp'], $this->field_config['monto_rc']['symbol_mon']);
             nm_limpa_valor($this->monto_rc, $this->field_config['monto_rc']['symbol_dec'], $this->field_config['monto_rc']['symbol_grp']);
          }
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
      if ('' !== $this->id_recibo || (!empty($format_fields) && isset($format_fields['id_recibo'])))
      {
          nmgp_Form_Num_Val($this->id_recibo, $this->field_config['id_recibo']['symbol_grp'], $this->field_config['id_recibo']['symbol_dec'], "0", "S", $this->field_config['id_recibo']['format_neg'], "", "", "-", $this->field_config['id_recibo']['symbol_fmt']) ; 
      }
      if ('' !== $this->numero_rc || (!empty($format_fields) && isset($format_fields['numero_rc'])))
      {
          nmgp_Form_Num_Val($this->numero_rc, $this->field_config['numero_rc']['symbol_grp'], $this->field_config['numero_rc']['symbol_dec'], "0", "S", $this->field_config['numero_rc']['format_neg'], "", "", "-", $this->field_config['numero_rc']['symbol_fmt']) ; 
      }
      if ((!empty($this->fecha_rc) && 'null' != $this->fecha_rc) || (!empty($format_fields) && isset($format_fields['fecha_rc'])))
      {
          nm_volta_data($this->fecha_rc, $this->field_config['fecha_rc']['date_format']) ; 
          nmgp_Form_Datas($this->fecha_rc, $this->field_config['fecha_rc']['date_format'], $this->field_config['fecha_rc']['date_sep']) ;  
      }
      elseif ('null' == $this->fecha_rc || '' == $this->fecha_rc)
      {
          $this->fecha_rc = '';
      }
      if ('' !== $this->contrato || (!empty($format_fields) && isset($format_fields['contrato'])))
      {
          nmgp_Form_Num_Val($this->contrato, $this->field_config['contrato']['symbol_grp'], $this->field_config['contrato']['symbol_dec'], "0", "S", $this->field_config['contrato']['format_neg'], "", "", "-", $this->field_config['contrato']['symbol_fmt']) ; 
      }
      if ('' !== $this->monto_rc || (!empty($format_fields) && isset($format_fields['monto_rc'])))
      {
          nmgp_Form_Num_Val($this->monto_rc, $this->field_config['monto_rc']['symbol_grp'], $this->field_config['monto_rc']['symbol_dec'], "2", "S", $this->field_config['monto_rc']['format_neg'], "", "", "-", $this->field_config['monto_rc']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['monto_rc']['symbol_mon'];
          $this->sc_add_currency($this->monto_rc, $sMonSymb, $this->field_config['monto_rc']['format_pos']); 
      }
      if ((!empty($this->creado) && 'null' != $this->creado) || (!empty($format_fields) && isset($format_fields['creado'])))
      {
          $nm_separa_data = strpos($this->field_config['creado']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['creado']['date_format'];
          $this->field_config['creado']['date_format'] = substr($this->field_config['creado']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->creado, " ") ; 
          $this->creado_hora = substr($this->creado, $separador + 1) ; 
          $this->creado = substr($this->creado, 0, $separador) ; 
          nm_volta_data($this->creado, $this->field_config['creado']['date_format']) ; 
          nmgp_Form_Datas($this->creado, $this->field_config['creado']['date_format'], $this->field_config['creado']['date_sep']) ;  
          $this->field_config['creado']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->creado_hora, $this->field_config['creado']['date_format']) ; 
          nmgp_Form_Hora($this->creado_hora, $this->field_config['creado']['date_format'], $this->field_config['creado']['time_sep']) ;  
          $this->field_config['creado']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->creado || '' == $this->creado)
      {
          $this->creado_hora = '';
          $this->creado = '';
      }
      if ((!empty($this->editado) && 'null' != $this->editado) || (!empty($format_fields) && isset($format_fields['editado'])))
      {
          $nm_separa_data = strpos($this->field_config['editado']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['editado']['date_format'];
          $this->field_config['editado']['date_format'] = substr($this->field_config['editado']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->editado, " ") ; 
          $this->editado_hora = substr($this->editado, $separador + 1) ; 
          $this->editado = substr($this->editado, 0, $separador) ; 
          nm_volta_data($this->editado, $this->field_config['editado']['date_format']) ; 
          nmgp_Form_Datas($this->editado, $this->field_config['editado']['date_format'], $this->field_config['editado']['date_sep']) ;  
          $this->field_config['editado']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->editado_hora, $this->field_config['editado']['date_format']) ; 
          nmgp_Form_Hora($this->editado_hora, $this->field_config['editado']['date_format'], $this->field_config['editado']['time_sep']) ;  
          $this->field_config['editado']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->editado || '' == $this->editado)
      {
          $this->editado_hora = '';
          $this->editado = '';
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
      $guarda_format_hora = $this->field_config['fecha_rc']['date_format'];
      if ($this->fecha_rc != "")  
      { 
          nm_conv_data($this->fecha_rc, $this->field_config['fecha_rc']['date_format']) ; 
          $this->fecha_rc_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fecha_rc_hora = substr($this->fecha_rc_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fecha_rc_hora = substr($this->fecha_rc_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fecha_rc_hora = substr($this->fecha_rc_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fecha_rc_hora = substr($this->fecha_rc_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fecha_rc_hora = substr($this->fecha_rc_hora, 0, -4);
          }
      } 
      if ($this->fecha_rc == "" && $use_null)  
      { 
          $this->fecha_rc = "null" ; 
      } 
      $this->field_config['fecha_rc']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['creado']['date_format'];
      if ($this->creado != "")  
      { 
          $nm_separa_data = strpos($this->field_config['creado']['date_format'], ";") ;
          $this->field_config['creado']['date_format'] = substr($this->field_config['creado']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->creado, $this->field_config['creado']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->creado = str_replace('-', '', $this->creado);
          }
          $this->field_config['creado']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->creado_hora, $this->field_config['creado']['date_format']) ; 
          if ($this->creado_hora == "" )  
          { 
              $this->creado_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->creado_hora = substr($this->creado_hora, 0, -4) . "." . substr($this->creado_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->creado_hora = substr($this->creado_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->creado_hora = substr($this->creado_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->creado_hora = substr($this->creado_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->creado_hora = substr($this->creado_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->creado_hora = substr($this->creado_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->creado_hora = substr($this->creado_hora, 0, -4);
          }
          if ($this->creado != "")  
          { 
              $this->creado .= " " . $this->creado_hora ; 
          }
      } 
      if ($this->creado == "" && $use_null)  
      { 
          $this->creado = "null" ; 
      } 
      $this->field_config['creado']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['editado']['date_format'];
      if ($this->editado != "")  
      { 
          $nm_separa_data = strpos($this->field_config['editado']['date_format'], ";") ;
          $this->field_config['editado']['date_format'] = substr($this->field_config['editado']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->editado, $this->field_config['editado']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->editado = str_replace('-', '', $this->editado);
          }
          $this->field_config['editado']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->editado_hora, $this->field_config['editado']['date_format']) ; 
          if ($this->editado_hora == "" )  
          { 
              $this->editado_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->editado_hora = substr($this->editado_hora, 0, -4) . "." . substr($this->editado_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->editado_hora = substr($this->editado_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->editado_hora = substr($this->editado_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->editado_hora = substr($this->editado_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->editado_hora = substr($this->editado_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->editado_hora = substr($this->editado_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->editado_hora = substr($this->editado_hora, 0, -4);
          }
          if ($this->editado != "")  
          { 
              $this->editado .= " " . $this->editado_hora ; 
          }
      } 
      if ($this->editado == "" && $use_null)  
      { 
          $this->editado = "null" ; 
      } 
      $this->field_config['editado']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_id_recibo();
          $this->ajax_return_values_numero_rc();
          $this->ajax_return_values_fecha_rc();
          $this->ajax_return_values_contrato();
          $this->ajax_return_values_tercero();
          $this->ajax_return_values_monto_rc();
          $this->ajax_return_values_id_banco();
          $this->ajax_return_values_asentado();
          $this->ajax_return_values_observacion();
          $this->ajax_return_values_creado();
          $this->ajax_return_values_editado();
          $this->ajax_return_values_detalle1();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id_recibo']['keyVal'] = form_recibos_ing_caja_pack_protect_string($this->nmgp_dados_form['id_recibo']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['form_recibos_ingcaja_detalle_script_case_init'] ]['form_recibos_ingcaja_detalle']['foreign_key']['id_recibo'] = $this->nmgp_dados_form['id_recibo'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['form_recibos_ingcaja_detalle_script_case_init'] ]['form_recibos_ingcaja_detalle']['where_filter'] = "id_recibo = " . $this->nmgp_dados_form['id_recibo'] . "";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['form_recibos_ingcaja_detalle_script_case_init'] ]['form_recibos_ingcaja_detalle']['where_detal']  = "id_recibo = " . $this->nmgp_dados_form['id_recibo'] . "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['form_recibos_ingcaja_detalle_script_case_init'] ]['form_recibos_ingcaja_detalle']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['form_recibos_ingcaja_detalle_script_case_init'] ]['form_recibos_ingcaja_detalle']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['form_recibos_ingcaja_detalle_script_case_init'] ]['form_recibos_ingcaja_detalle']['total']);
          }
   } // ajax_return_values

          //----- id_recibo
   function ajax_return_values_id_recibo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_recibo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_recibo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_recibo'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("id_recibo", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- numero_rc
   function ajax_return_values_numero_rc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numero_rc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numero_rc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numero_rc'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fecha_rc
   function ajax_return_values_fecha_rc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecha_rc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecha_rc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fecha_rc'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- contrato
   function ajax_return_values_contrato($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("contrato", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->contrato);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['contrato'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_tercero']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_tercero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_tercero']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_tercero'] = array(); 
    }

   $old_value_id_recibo = $this->id_recibo;
   $old_value_numero_rc = $this->numero_rc;
   $old_value_fecha_rc = $this->fecha_rc;
   $old_value_contrato = $this->contrato;
   $old_value_monto_rc = $this->monto_rc;
   $old_value_creado = $this->creado;
   $old_value_creado_hora = $this->creado_hora;
   $old_value_editado = $this->editado;
   $old_value_editado_hora = $this->editado_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_recibo = $this->id_recibo;
   $unformatted_value_numero_rc = $this->numero_rc;
   $unformatted_value_fecha_rc = $this->fecha_rc;
   $unformatted_value_contrato = $this->contrato;
   $unformatted_value_monto_rc = $this->monto_rc;
   $unformatted_value_creado = $this->creado;
   $unformatted_value_creado_hora = $this->creado_hora;
   $unformatted_value_editado = $this->editado;
   $unformatted_value_editado_hora = $this->editado_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT documento, documento + ' - ' + nombres FROM terceros WHERE documento = '" . substr($this->Db->qstr($this->tercero), 1, -1) . "' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT documento, concat(documento,' - ' ,nombres) FROM terceros WHERE documento = '" . substr($this->Db->qstr($this->tercero), 1, -1) . "' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT documento, documento&' - '&nombres FROM terceros WHERE documento = '" . substr($this->Db->qstr($this->tercero), 1, -1) . "' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT documento, documento||' - '||nombres FROM terceros WHERE documento = '" . substr($this->Db->qstr($this->tercero), 1, -1) . "' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT documento, documento + ' - ' + nombres FROM terceros WHERE documento = '" . substr($this->Db->qstr($this->tercero), 1, -1) . "' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT documento, documento||' - '||nombres FROM terceros WHERE documento = '" . substr($this->Db->qstr($this->tercero), 1, -1) . "' ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT documento, documento||' - '||nombres FROM terceros WHERE documento = '" . substr($this->Db->qstr($this->tercero), 1, -1) . "' ORDER BY documento, nombres";
   }

   $this->id_recibo = $old_value_id_recibo;
   $this->numero_rc = $old_value_numero_rc;
   $this->fecha_rc = $old_value_fecha_rc;
   $this->contrato = $old_value_contrato;
   $this->monto_rc = $old_value_monto_rc;
   $this->creado = $old_value_creado;
   $this->creado_hora = $old_value_creado_hora;
   $this->editado = $old_value_editado;
   $this->editado_hora = $old_value_editado_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_recibos_ing_caja_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_recibos_ing_caja_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_tercero'][] = $rs->fields[0];
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
          $val_output = isset($aLookup[0][form_recibos_ing_caja_pack_protect_string(NM_charset_to_utf8($this->tercero))]) ? $aLookup[0][form_recibos_ing_caja_pack_protect_string(NM_charset_to_utf8($this->tercero))] : "";
          $this->NM_ajax_info['fldList']['tercero_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

          //----- monto_rc
   function ajax_return_values_monto_rc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("monto_rc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->monto_rc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['monto_rc'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- id_banco
   function ajax_return_values_id_banco($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_banco", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_banco);
              $aLookup = array();
              $this->_tmp_lookup_id_banco = $this->id_banco;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_id_banco']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_id_banco'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_id_banco']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_id_banco'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id_recibo = $this->id_recibo;
   $old_value_numero_rc = $this->numero_rc;
   $old_value_fecha_rc = $this->fecha_rc;
   $old_value_contrato = $this->contrato;
   $old_value_monto_rc = $this->monto_rc;
   $old_value_creado = $this->creado;
   $old_value_creado_hora = $this->creado_hora;
   $old_value_editado = $this->editado;
   $old_value_editado_hora = $this->editado_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_recibo = $this->id_recibo;
   $unformatted_value_numero_rc = $this->numero_rc;
   $unformatted_value_fecha_rc = $this->fecha_rc;
   $unformatted_value_contrato = $this->contrato;
   $unformatted_value_monto_rc = $this->monto_rc;
   $unformatted_value_creado = $this->creado;
   $unformatted_value_creado_hora = $this->creado_hora;
   $unformatted_value_editado = $this->editado;
   $unformatted_value_editado_hora = $this->editado_hora;

   $nm_comando = "SELECT idcaja_vta, codigo_banco  FROM bancos  ORDER BY codigo_banco";

   $this->id_recibo = $old_value_id_recibo;
   $this->numero_rc = $old_value_numero_rc;
   $this->fecha_rc = $old_value_fecha_rc;
   $this->contrato = $old_value_contrato;
   $this->monto_rc = $old_value_monto_rc;
   $this->creado = $old_value_creado;
   $this->creado_hora = $old_value_creado_hora;
   $this->editado = $old_value_editado;
   $this->editado_hora = $old_value_editado_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_recibos_ing_caja_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_recibos_ing_caja_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_id_banco'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_banco\"";
          if (isset($this->NM_ajax_info['select_html']['id_banco']) && !empty($this->NM_ajax_info['select_html']['id_banco']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_banco']);
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

                  if ($this->id_banco == $sValue)
                  {
                      $this->_tmp_lookup_id_banco = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_banco'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_banco']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_banco']['valList'][$i] = form_recibos_ing_caja_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_banco']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_banco']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_banco']['labList'] = $aLabel;
          }
   }

          //----- asentado
   function ajax_return_values_asentado($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("asentado", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->asentado);
              $aLookup = array();
              $this->_tmp_lookup_asentado = $this->asentado;

$aLookup[] = array(form_recibos_ing_caja_pack_protect_string('NO') => str_replace('<', '&lt;',form_recibos_ing_caja_pack_protect_string("NO")));
$aLookup[] = array(form_recibos_ing_caja_pack_protect_string('SI') => str_replace('<', '&lt;',form_recibos_ing_caja_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_asentado'][] = 'NO';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_asentado'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"asentado\"";
          if (isset($this->NM_ajax_info['select_html']['asentado']) && !empty($this->NM_ajax_info['select_html']['asentado']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['asentado']);
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

                  if ($this->asentado == $sValue)
                  {
                      $this->_tmp_lookup_asentado = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['asentado'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['asentado']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['asentado']['valList'][$i] = form_recibos_ing_caja_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['asentado']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['asentado']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['asentado']['labList'] = $aLabel;
          }
   }

          //----- observacion
   function ajax_return_values_observacion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("observacion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->observacion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['observacion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- creado
   function ajax_return_values_creado($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("creado", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->creado);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['creado'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->creado . ' ' . $this->creado_hora),
              );
          }
   }

          //----- editado
   function ajax_return_values_editado($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("editado", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->editado);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['editado'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->editado . ' ' . $this->editado_hora),
              );
          }
   }

          //----- detalle1
   function ajax_return_values_detalle1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("detalle1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->detalle1);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['detalle1'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['upload_dir'][$fieldName][] = $newName;
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
      if ($this->sc_evento == "novo" || $this->sc_evento == "incluir" || ($this->nmgp_opcao == "nada" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['opc_ant']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['opc_ant'] == "novo") || (isset($GLOBALS['erro_incl']) && 1 == $GLOBALS['erro_incl']))
      {
          if (!isset($this->nmgp_cmp_hidden["editado"]))
          {
              $this->nmgp_cmp_hidden["editado"] = "off"; $this->NM_ajax_info['fieldDisplay']['editado'] = 'off';
          }
      }
      else
      {
          if (!isset($this->nmgp_cmp_hidden["creado"]))
          {
              $this->nmgp_cmp_hidden["creado"] = "off"; $this->NM_ajax_info['fieldDisplay']['creado'] = 'off';
          }
      }
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_recibos_ing_caja']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_asentado = $this->asentado;
    $original_contrato = $this->contrato;
    $original_fecha_rc = $this->fecha_rc;
    $original_id_banco = $this->id_banco;
    $original_monto_rc = $this->monto_rc;
    $original_tercero = $this->tercero;
}
if (!isset($this->sc_temp_gElContrato)) {$this->sc_temp_gElContrato = (isset($_SESSION['gElContrato'])) ? $_SESSION['gElContrato'] : "";}
  $this->sc_temp_gElContrato = 0;
if($this->contrato >0)
	{
	$sql_1  = "select id_ter_cont from terceros_contratos where numero_contrato='".$this->contrato ."'";
	 
      $nm_select = $sql_1; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
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
	if(isset($this->dt[0][0]))
		{
		if($this->dt[0][0]>0)
			{
			$this->sc_temp_gElContrato = $this->dt[0][0];
			}
		else
			{
			$this->sc_temp_gElContrato = 0;
			}
		}
	else
		{
		$this->sc_temp_gElContrato = 0;
		}
	}
if($this->asentado =='SI')
	{
	
		$this->sc_field_readonly("fecha_rc", 'on');
		$this->sc_field_readonly("contrato", 'on');
		$this->sc_field_readonly("tercero", 'on');
		$this->sc_field_readonly("monto_rc", 'on');
		$this->sc_field_readonly("id_banco", 'on');
		$this->Ini->nm_hidden_blocos[2] = "off"; $this->NM_ajax_info['blockDisplay']['2'] = 'off';
		;
		
	}
else
	{
	
		$this->sc_field_readonly("fecha_rc", 'off');
		$this->sc_field_readonly("contrato", 'off');
		$this->sc_field_readonly("tercero", 'off');
		$this->sc_field_readonly("monto_rc", 'off');
		$this->sc_field_readonly("id_banco", 'off');
		$this->Ini->nm_hidden_blocos[2] = "on"; $this->NM_ajax_info['blockDisplay']['2'] = 'on';
		;
	}
if (isset($this->sc_temp_gElContrato)) { $_SESSION['gElContrato'] = $this->sc_temp_gElContrato;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_asentado != $this->asentado || (isset($bFlagRead_asentado) && $bFlagRead_asentado)))
    {
        $this->ajax_return_values_asentado(true);
    }
    if (($original_contrato != $this->contrato || (isset($bFlagRead_contrato) && $bFlagRead_contrato)))
    {
        $this->ajax_return_values_contrato(true);
    }
    if (($original_fecha_rc != $this->fecha_rc || (isset($bFlagRead_fecha_rc) && $bFlagRead_fecha_rc)))
    {
        $this->ajax_return_values_fecha_rc(true);
    }
    if (($original_id_banco != $this->id_banco || (isset($bFlagRead_id_banco) && $bFlagRead_id_banco)))
    {
        $this->ajax_return_values_id_banco(true);
    }
    if (($original_monto_rc != $this->monto_rc || (isset($bFlagRead_monto_rc) && $bFlagRead_monto_rc)))
    {
        $this->ajax_return_values_monto_rc(true);
    }
    if (($original_tercero != $this->tercero || (isset($bFlagRead_tercero) && $bFlagRead_tercero)))
    {
        $this->ajax_return_values_tercero(true);
    }
}
$_SESSION['scriptcase']['form_recibos_ing_caja']['contr_erro'] = 'off'; 
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
      $this->monto_rc = str_replace($sc_parm1, $sc_parm2, $this->monto_rc); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->monto_rc = "'" . $this->monto_rc . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->monto_rc = str_replace("'", "", $this->monto_rc); 
   } 
//----------- 

   function return_after_insert()
   {
      global $sc_where;
      $sc_where_pos = " WHERE ((id_recibo < $this->id_recibo))";
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
      if ('' != $this->id_recibo)
      {
          $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count;
          $rsc = $this->Db->Execute($nmgp_sel_count);
          if ($rsc === false && !$rsc->EOF)
          {
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
              exit;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start'] = $rsc->fields[0];
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
    if ("alterar" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_recibos_ing_caja']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_asentado = $this->asentado;
}
  if($this->asentado =='SI')
	{
		$this->Ini->nm_hidden_blocos[2] = "off"; $this->NM_ajax_info['blockDisplay']['2'] = 'off';
		;
	}
else
	{
		$this->Ini->nm_hidden_blocos[2] = "on"; $this->NM_ajax_info['blockDisplay']['2'] = 'on';
		;
	}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_asentado != $this->asentado || (isset($bFlagRead_asentado) && $bFlagRead_asentado)))
    {
        $this->ajax_return_values_asentado(true);
    }
}
$_SESSION['scriptcase']['form_recibos_ing_caja']['contr_erro'] = 'off'; 
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
      $NM_val_form['id_recibo'] = $this->id_recibo;
      $NM_val_form['numero_rc'] = $this->numero_rc;
      $NM_val_form['fecha_rc'] = $this->fecha_rc;
      $NM_val_form['contrato'] = $this->contrato;
      $NM_val_form['tercero'] = $this->tercero;
      $NM_val_form['monto_rc'] = $this->monto_rc;
      $NM_val_form['id_banco'] = $this->id_banco;
      $NM_val_form['asentado'] = $this->asentado;
      $NM_val_form['observacion'] = $this->observacion;
      $NM_val_form['creado'] = $this->creado;
      $NM_val_form['editado'] = $this->editado;
      $NM_val_form['detalle1'] = $this->detalle1;
      if ($this->id_recibo === "" || is_null($this->id_recibo))  
      { 
          $this->id_recibo = 0;
      } 
      if ($this->numero_rc === "" || is_null($this->numero_rc))  
      { 
          $this->numero_rc = 0;
          $this->sc_force_zero[] = 'numero_rc';
      } 
      if ($this->contrato === "" || is_null($this->contrato))  
      { 
          $this->contrato = 0;
          $this->sc_force_zero[] = 'contrato';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->monto_rc === "" || is_null($this->monto_rc))  
      { 
          $this->monto_rc = 0;
          $this->sc_force_zero[] = 'monto_rc';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->id_banco === "" || is_null($this->id_banco))  
      { 
          $this->id_banco = 0;
          $this->sc_force_zero[] = 'id_banco';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          if ($this->fecha_rc == "")  
          { 
              $this->fecha_rc = "null"; 
              $NM_val_null[] = "fecha_rc";
          } 
          $this->tercero_before_qstr = $this->tercero;
          $this->tercero = substr($this->Db->qstr($this->tercero), 1, -1); 
          if ($this->tercero == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tercero = "null"; 
              $NM_val_null[] = "tercero";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->observacion_before_qstr = $this->observacion;
          $this->observacion = substr($this->Db->qstr($this->observacion), 1, -1); 
          if ($this->observacion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->observacion = "null"; 
              $NM_val_null[] = "observacion";
          } 
          if ($this->creado == "")  
          { 
              $this->creado = "null"; 
              $NM_val_null[] = "creado";
          } 
          if ($this->editado == "")  
          { 
              $this->editado = "null"; 
              $NM_val_null[] = "editado";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->asentado_before_qstr = $this->asentado;
          $this->asentado = substr($this->Db->qstr($this->asentado), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->asentado == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->asentado = "null"; 
                  $NM_val_null[] = "asentado";
              } 
          }
          $this->detalle1_before_qstr = $this->detalle1;
          $this->detalle1 = substr($this->Db->qstr($this->detalle1), 1, -1); 
          if ($this->detalle1 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->detalle1 = "null"; 
              $NM_val_null[] = "detalle1";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_recibos_ing_caja_pack_ajax_response();
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
              $this->editado =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->editado_hora =  date('H') . ":" . date('i') . ":" . date('s');
              $NM_val_form['editado'] = $this->editado;
              $this->NM_ajax_changed['editado'] = true;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numero_rc = $this->numero_rc, fecha_rc = #$this->fecha_rc#, contrato = $this->contrato, tercero = '$this->tercero', monto_rc = $this->monto_rc, observacion = '$this->observacion', editado = #$this->editado#, id_banco = $this->id_banco, asentado = '$this->asentado'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numero_rc = $this->numero_rc, fecha_rc = " . $this->Ini->date_delim . $this->fecha_rc . $this->Ini->date_delim1 . ", contrato = $this->contrato, tercero = '$this->tercero', monto_rc = $this->monto_rc, observacion = '$this->observacion', editado = " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . ", id_banco = $this->id_banco, asentado = '$this->asentado'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numero_rc = $this->numero_rc, fecha_rc = " . $this->Ini->date_delim . $this->fecha_rc . $this->Ini->date_delim1 . ", contrato = $this->contrato, tercero = '$this->tercero', monto_rc = $this->monto_rc, observacion = '$this->observacion', editado = " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . ", id_banco = $this->id_banco, asentado = '$this->asentado'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numero_rc = $this->numero_rc, fecha_rc = EXTEND('$this->fecha_rc', YEAR TO DAY), contrato = $this->contrato, tercero = '$this->tercero', monto_rc = $this->monto_rc, observacion = '$this->observacion', editado = EXTEND('$this->editado', YEAR TO FRACTION), id_banco = $this->id_banco, asentado = '$this->asentado'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numero_rc = $this->numero_rc, fecha_rc = " . $this->Ini->date_delim . $this->fecha_rc . $this->Ini->date_delim1 . ", contrato = $this->contrato, tercero = '$this->tercero', monto_rc = $this->monto_rc, observacion = '$this->observacion', editado = " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . ", id_banco = $this->id_banco, asentado = '$this->asentado'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numero_rc = $this->numero_rc, fecha_rc = " . $this->Ini->date_delim . $this->fecha_rc . $this->Ini->date_delim1 . ", contrato = $this->contrato, tercero = '$this->tercero', monto_rc = $this->monto_rc, observacion = '$this->observacion', editado = " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . ", id_banco = $this->id_banco, asentado = '$this->asentado'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numero_rc = $this->numero_rc, fecha_rc = " . $this->Ini->date_delim . $this->fecha_rc . $this->Ini->date_delim1 . ", contrato = $this->contrato, tercero = '$this->tercero', monto_rc = $this->monto_rc, observacion = '$this->observacion', editado = " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . ", id_banco = $this->id_banco, asentado = '$this->asentado'"; 
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
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE id_recibo = $this->id_recibo ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE id_recibo = $this->id_recibo ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE id_recibo = $this->id_recibo ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE id_recibo = $this->id_recibo ";  
              }  
              else  
              {
                  $comando .= " WHERE id_recibo = $this->id_recibo ";  
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
                                  form_recibos_ing_caja_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->tercero = $this->tercero_before_qstr;
              $this->observacion = $this->observacion_before_qstr;
              $this->asentado = $this->asentado_before_qstr;
              $this->detalle1 = $this->detalle1_before_qstr;
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['id_recibo'])) { $this->id_recibo = $NM_val_form['id_recibo']; }
              elseif (isset($this->id_recibo)) { $this->nm_limpa_alfa($this->id_recibo); }
              if     (isset($NM_val_form) && isset($NM_val_form['numero_rc'])) { $this->numero_rc = $NM_val_form['numero_rc']; }
              elseif (isset($this->numero_rc)) { $this->nm_limpa_alfa($this->numero_rc); }
              if     (isset($NM_val_form) && isset($NM_val_form['contrato'])) { $this->contrato = $NM_val_form['contrato']; }
              elseif (isset($this->contrato)) { $this->nm_limpa_alfa($this->contrato); }
              if     (isset($NM_val_form) && isset($NM_val_form['tercero'])) { $this->tercero = $NM_val_form['tercero']; }
              elseif (isset($this->tercero)) { $this->nm_limpa_alfa($this->tercero); }
              if     (isset($NM_val_form) && isset($NM_val_form['monto_rc'])) { $this->monto_rc = $NM_val_form['monto_rc']; }
              elseif (isset($this->monto_rc)) { $this->nm_limpa_alfa($this->monto_rc); }
              if     (isset($NM_val_form) && isset($NM_val_form['observacion'])) { $this->observacion = $NM_val_form['observacion']; }
              elseif (isset($this->observacion)) { $this->nm_limpa_alfa($this->observacion); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_banco'])) { $this->id_banco = $NM_val_form['id_banco']; }
              elseif (isset($this->id_banco)) { $this->nm_limpa_alfa($this->id_banco); }
              if     (isset($NM_val_form) && isset($NM_val_form['asentado'])) { $this->asentado = $NM_val_form['asentado']; }
              elseif (isset($this->asentado)) { $this->nm_limpa_alfa($this->asentado); }
              if     (isset($NM_val_form) && isset($NM_val_form['detalle1'])) { $this->detalle1 = $NM_val_form['detalle1']; }
              elseif (isset($this->detalle1)) { $this->nm_limpa_alfa($this->detalle1); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('id_recibo', 'numero_rc', 'fecha_rc', 'contrato', 'tercero', 'monto_rc', 'id_banco', 'asentado', 'observacion', 'creado', 'editado', 'detalle1'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "id_recibo, ";
          } 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(numero_rc) from " . $this->Ini->nm_tabela; 
          $comando = "select max(numero_rc) from " . $this->Ini->nm_tabela; 
          $rs = $this->Db->Execute($comando); 
          if ($rs === false && !$rs->EOF)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
              $this->NM_rollback_db(); 
              if ($this->NM_ajax_flag)
              {
                  form_recibos_ing_caja_pack_ajax_response();
              }
              exit; 
          }  
          $this->numero_rc = $rs->fields[0] + 1;
          $rs->Close(); 
              $this->creado =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->creado_hora =  date('H') . ":" . date('i') . ":" . date('s');
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_recibos_ing_caja_pack_ajax_response();
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
                  if ($this->monto_rc != "")
                  { 
                       $compl_insert     .= ", monto_rc";
                       $compl_insert_val .= ", $this->monto_rc";
                  } 
                  if ($this->id_banco != "")
                  { 
                       $compl_insert     .= ", id_banco";
                       $compl_insert_val .= ", $this->id_banco";
                  } 
                  if ($this->asentado != "")
                  { 
                       $compl_insert     .= ", asentado";
                       $compl_insert_val .= ", '$this->asentado'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (numero_rc, fecha_rc, contrato, tercero, observacion, creado, editado $compl_insert) VALUES ($this->numero_rc, #$this->fecha_rc#, $this->contrato, '$this->tercero', '$this->observacion', #$this->creado#, #$this->editado# $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->monto_rc != "")
                  { 
                       $compl_insert     .= ", monto_rc";
                       $compl_insert_val .= ", $this->monto_rc";
                  } 
                  if ($this->id_banco != "")
                  { 
                       $compl_insert     .= ", id_banco";
                       $compl_insert_val .= ", $this->id_banco";
                  } 
                  if ($this->asentado != "")
                  { 
                       $compl_insert     .= ", asentado";
                       $compl_insert_val .= ", '$this->asentado'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numero_rc, fecha_rc, contrato, tercero, observacion, creado, editado $compl_insert) VALUES (" . $NM_seq_auto . "$this->numero_rc, " . $this->Ini->date_delim . $this->fecha_rc . $this->Ini->date_delim1 . ", $this->contrato, '$this->tercero', '$this->observacion', " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . " $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->monto_rc != "")
                  { 
                       $compl_insert     .= ", monto_rc";
                       $compl_insert_val .= ", $this->monto_rc";
                  } 
                  if ($this->id_banco != "")
                  { 
                       $compl_insert     .= ", id_banco";
                       $compl_insert_val .= ", $this->id_banco";
                  } 
                  if ($this->asentado != "")
                  { 
                       $compl_insert     .= ", asentado";
                       $compl_insert_val .= ", '$this->asentado'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numero_rc, fecha_rc, contrato, tercero, observacion, creado, editado $compl_insert) VALUES (" . $NM_seq_auto . "$this->numero_rc, " . $this->Ini->date_delim . $this->fecha_rc . $this->Ini->date_delim1 . ", $this->contrato, '$this->tercero', '$this->observacion', " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . " $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->monto_rc != "")
                  { 
                       $compl_insert     .= ", monto_rc";
                       $compl_insert_val .= ", $this->monto_rc";
                  } 
                  if ($this->id_banco != "")
                  { 
                       $compl_insert     .= ", id_banco";
                       $compl_insert_val .= ", $this->id_banco";
                  } 
                  if ($this->asentado != "")
                  { 
                       $compl_insert     .= ", asentado";
                       $compl_insert_val .= ", '$this->asentado'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numero_rc, fecha_rc, contrato, tercero, observacion, creado, editado $compl_insert) VALUES (" . $NM_seq_auto . "$this->numero_rc, " . $this->Ini->date_delim . $this->fecha_rc . $this->Ini->date_delim1 . ", $this->contrato, '$this->tercero', '$this->observacion', " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . " $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->monto_rc != "")
                  { 
                       $compl_insert     .= ", monto_rc";
                       $compl_insert_val .= ", $this->monto_rc";
                  } 
                  if ($this->id_banco != "")
                  { 
                       $compl_insert     .= ", id_banco";
                       $compl_insert_val .= ", $this->id_banco";
                  } 
                  if ($this->asentado != "")
                  { 
                       $compl_insert     .= ", asentado";
                       $compl_insert_val .= ", '$this->asentado'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numero_rc, fecha_rc, contrato, tercero, observacion, creado, editado $compl_insert) VALUES (" . $NM_seq_auto . "$this->numero_rc, EXTEND('$this->fecha_rc', YEAR TO DAY), $this->contrato, '$this->tercero', '$this->observacion', EXTEND('$this->creado', YEAR TO FRACTION), EXTEND('$this->editado', YEAR TO FRACTION) $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->monto_rc != "")
                  { 
                       $compl_insert     .= ", monto_rc";
                       $compl_insert_val .= ", $this->monto_rc";
                  } 
                  if ($this->id_banco != "")
                  { 
                       $compl_insert     .= ", id_banco";
                       $compl_insert_val .= ", $this->id_banco";
                  } 
                  if ($this->asentado != "")
                  { 
                       $compl_insert     .= ", asentado";
                       $compl_insert_val .= ", '$this->asentado'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numero_rc, fecha_rc, contrato, tercero, observacion, creado, editado $compl_insert) VALUES (" . $NM_seq_auto . "$this->numero_rc, " . $this->Ini->date_delim . $this->fecha_rc . $this->Ini->date_delim1 . ", $this->contrato, '$this->tercero', '$this->observacion', " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . " $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->monto_rc != "")
                  { 
                       $compl_insert     .= ", monto_rc";
                       $compl_insert_val .= ", $this->monto_rc";
                  } 
                  if ($this->id_banco != "")
                  { 
                       $compl_insert     .= ", id_banco";
                       $compl_insert_val .= ", $this->id_banco";
                  } 
                  if ($this->asentado != "")
                  { 
                       $compl_insert     .= ", asentado";
                       $compl_insert_val .= ", '$this->asentado'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numero_rc, fecha_rc, contrato, tercero, observacion, creado, editado $compl_insert) VALUES (" . $NM_seq_auto . "$this->numero_rc, " . $this->Ini->date_delim . $this->fecha_rc . $this->Ini->date_delim1 . ", $this->contrato, '$this->tercero', '$this->observacion', " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . " $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->monto_rc != "")
                  { 
                       $compl_insert     .= ", monto_rc";
                       $compl_insert_val .= ", $this->monto_rc";
                  } 
                  if ($this->id_banco != "")
                  { 
                       $compl_insert     .= ", id_banco";
                       $compl_insert_val .= ", $this->id_banco";
                  } 
                  if ($this->asentado != "")
                  { 
                       $compl_insert     .= ", asentado";
                       $compl_insert_val .= ", '$this->asentado'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numero_rc, fecha_rc, contrato, tercero, observacion, creado, editado $compl_insert) VALUES (" . $NM_seq_auto . "$this->numero_rc, " . $this->Ini->date_delim . $this->fecha_rc . $this->Ini->date_delim1 . ", $this->contrato, '$this->tercero', '$this->observacion', " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . " $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->monto_rc != "")
                  { 
                       $compl_insert     .= ", monto_rc";
                       $compl_insert_val .= ", $this->monto_rc";
                  } 
                  if ($this->id_banco != "")
                  { 
                       $compl_insert     .= ", id_banco";
                       $compl_insert_val .= ", $this->id_banco";
                  } 
                  if ($this->asentado != "")
                  { 
                       $compl_insert     .= ", asentado";
                       $compl_insert_val .= ", '$this->asentado'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numero_rc, fecha_rc, contrato, tercero, observacion, creado, editado $compl_insert) VALUES (" . $NM_seq_auto . "$this->numero_rc, " . $this->Ini->date_delim . $this->fecha_rc . $this->Ini->date_delim1 . ", $this->contrato, '$this->tercero', '$this->observacion', " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . " $compl_insert_val)"; 
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
                              form_recibos_ing_caja_pack_ajax_response();
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
                          form_recibos_ing_caja_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->id_recibo =  $rsy->fields[0];
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
                  $this->id_recibo = $rsy->fields[0];
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
                  $this->id_recibo = $rsy->fields[0];
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
                  $this->id_recibo = $rsy->fields[0];
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
                  $this->id_recibo = $rsy->fields[0];
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
                  $this->id_recibo = $rsy->fields[0];
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
                  $this->id_recibo = $rsy->fields[0];
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
                  $this->id_recibo = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->tercero = $this->tercero_before_qstr;
              $this->observacion = $this->observacion_before_qstr;
              $this->asentado = $this->asentado_before_qstr;
              $this->detalle1 = $this->detalle1_before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->tercero = $this->tercero_before_qstr;
              $this->observacion = $this->observacion_before_qstr;
              $this->asentado = $this->asentado_before_qstr;
              $this->detalle1 = $this->detalle1_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['sc_redir_insert'] != "S"))
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id_recibo = substr($this->Db->qstr($this->id_recibo), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';
          if ($bDelecaoOk)
          {
              $sDetailWhere = "id_recibo = " . $this->id_recibo . "";
              $this->form_recibos_ingcaja_detalle->ini_controle();
              if ($this->form_recibos_ingcaja_detalle->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_recibo = $this->id_recibo "); 
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
                          form_recibos_ing_caja_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['total']);
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['decimal_db'] == ",")
        {
            $this->nm_troca_decimal(",", ".");
        }
        $_SESSION['scriptcase']['form_recibos_ing_caja']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_contrato = $this->contrato;
}
if (!isset($this->sc_temp_gElContrato)) {$this->sc_temp_gElContrato = (isset($_SESSION['gElContrato'])) ? $_SESSION['gElContrato'] : "";}
  $sql_1  = "select id_ter_cont from terceros_contratos where numero_contrato='".$this->contrato ."'";
 
      $nm_select = $sql_1; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
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
if(isset($this->dt[0][0]))
	{
	if($this->dt[0][0]>0)
		{
		$this->sc_temp_gElContrato = $this->dt[0][0];
		}
	else
		{
		$this->sc_temp_gElContrato = 0;
		}
	}
else
	{
	$this->sc_temp_gElContrato = 0;
	}
if (isset($this->sc_temp_gElContrato)) { $_SESSION['gElContrato'] = $this->sc_temp_gElContrato;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_contrato != $this->contrato || (isset($bFlagRead_contrato) && $bFlagRead_contrato)))
    {
        $this->ajax_return_values_contrato(true);
    }
}
$_SESSION['scriptcase']['form_recibos_ing_caja']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['scriptcase']['form_recibos_ing_caja']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_asentado = $this->asentado;
}
  if($this->asentado =='SI')
	{
		$this->Ini->nm_hidden_blocos[2] = "off"; $this->NM_ajax_info['blockDisplay']['2'] = 'off';
		;
	}
else
	{
		$this->Ini->nm_hidden_blocos[2] = "on"; $this->NM_ajax_info['blockDisplay']['2'] = 'on';
		;
	}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_asentado != $this->asentado || (isset($bFlagRead_asentado) && $bFlagRead_asentado)))
    {
        $this->ajax_return_values_asentado(true);
    }
}
$_SESSION['scriptcase']['form_recibos_ing_caja']['contr_erro'] = 'off'; 
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['decimal_db'] == ",")
   {
       $this->nm_troca_decimal(".", ",");
   }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['parms'] = "id_recibo?#?$this->id_recibo?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id_recibo = null === $this->id_recibo ? null : substr($this->Db->qstr($this->id_recibo), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['run_iframe'] == "R")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->id_recibo)) 
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
      if ($this->nmgp_opcao != "nada" && (trim($this->id_recibo) == "")) 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['run_iframe'] == "F" && $this->sc_evento == "insert")
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_recibos_ing_caja = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['total'] = $qt_geral_reg_form_recibos_ing_caja;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->id_recibo))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "id_recibo < $this->id_recibo "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "id_recibo < $this->id_recibo "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "id_recibo < $this->id_recibo "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "id_recibo < $this->id_recibo "; 
              }
              else  
              {
                  $Key_Where = "id_recibo < $this->id_recibo "; 
              }
              $Where_Start = (empty($sc_where)) ? " where " . $Key_Where :  $sc_where . " and (" . $Key_Where . ")";
              $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $Where_Start; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_recibos_ing_caja = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start'] > $qt_geral_reg_form_recibos_ing_caja)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start'] = $qt_geral_reg_form_recibos_ing_caja; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start'] = $qt_geral_reg_form_recibos_ing_caja; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['total'] + 1; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT id_recibo, numero_rc, str_replace (convert(char(10),fecha_rc,102), '.', '-') + ' ' + convert(char(8),fecha_rc,20), contrato, tercero, monto_rc, observacion, str_replace (convert(char(10),creado,102), '.', '-') + ' ' + convert(char(8),creado,20), str_replace (convert(char(10),editado,102), '.', '-') + ' ' + convert(char(8),editado,20), id_banco, asentado from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT id_recibo, numero_rc, convert(char(23),fecha_rc,121), contrato, tercero, monto_rc, observacion, convert(char(23),creado,121), convert(char(23),editado,121), id_banco, asentado from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT id_recibo, numero_rc, fecha_rc, contrato, tercero, monto_rc, observacion, creado, editado, id_banco, asentado from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT id_recibo, numero_rc, EXTEND(fecha_rc, YEAR TO DAY), contrato, tercero, monto_rc, observacion, EXTEND(creado, YEAR TO FRACTION), EXTEND(editado, YEAR TO FRACTION), id_banco, asentado from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT id_recibo, numero_rc, fecha_rc, contrato, tercero, monto_rc, observacion, creado, editado, id_banco, asentado from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "id_recibo = $this->id_recibo"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "id_recibo = $this->id_recibo"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "id_recibo = $this->id_recibo"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "id_recibo = $this->id_recibo"; 
              }  
              else  
              {
                  $aWhere[] = "id_recibo = $this->id_recibo"; 
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
          $sc_order_by = "id_recibo";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "insert" || $this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['empty_filter'] = true;
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
              $this->id_recibo = $rs->fields[0] ; 
              $this->nmgp_dados_select['id_recibo'] = $this->id_recibo;
              $this->numero_rc = $rs->fields[1] ; 
              $this->nmgp_dados_select['numero_rc'] = $this->numero_rc;
              $this->fecha_rc = $rs->fields[2] ; 
              $this->nmgp_dados_select['fecha_rc'] = $this->fecha_rc;
              $this->contrato = $rs->fields[3] ; 
              $this->nmgp_dados_select['contrato'] = $this->contrato;
              $this->tercero = $rs->fields[4] ; 
              $this->nmgp_dados_select['tercero'] = $this->tercero;
              $this->monto_rc = trim($rs->fields[5]) ; 
              $this->nmgp_dados_select['monto_rc'] = $this->monto_rc;
              $this->observacion = $rs->fields[6] ; 
              $this->nmgp_dados_select['observacion'] = $this->observacion;
              $this->creado = $rs->fields[7] ; 
              if (substr($this->creado, 10, 1) == "-") 
              { 
                 $this->creado = substr($this->creado, 0, 10) . " " . substr($this->creado, 11);
              } 
              if (substr($this->creado, 13, 1) == ".") 
              { 
                 $this->creado = substr($this->creado, 0, 13) . ":" . substr($this->creado, 14, 2) . ":" . substr($this->creado, 17);
              } 
              $this->nmgp_dados_select['creado'] = $this->creado;
              $this->editado = $rs->fields[8] ; 
              if (substr($this->editado, 10, 1) == "-") 
              { 
                 $this->editado = substr($this->editado, 0, 10) . " " . substr($this->editado, 11);
              } 
              if (substr($this->editado, 13, 1) == ".") 
              { 
                 $this->editado = substr($this->editado, 0, 13) . ":" . substr($this->editado, 14, 2) . ":" . substr($this->editado, 17);
              } 
              $this->nmgp_dados_select['editado'] = $this->editado;
              $this->id_banco = $rs->fields[9] ; 
              $this->nmgp_dados_select['id_banco'] = $this->id_banco;
              $this->asentado = $rs->fields[10] ; 
              $this->nmgp_dados_select['asentado'] = $this->asentado;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->id_recibo = (string)$this->id_recibo; 
              $this->numero_rc = (string)$this->numero_rc; 
              $this->contrato = (string)$this->contrato; 
              $this->monto_rc = (strpos(strtolower($this->monto_rc), "e")) ? (float)$this->monto_rc : $this->monto_rc; 
              $this->monto_rc = (string)$this->monto_rc; 
              $this->id_banco = (string)$this->id_banco; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['parms'] = "id_recibo?#?$this->id_recibo?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['reg_start'] < $qt_geral_reg_form_recibos_ing_caja;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['opcao']   = '';
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
              $this->id_recibo = "";  
              $this->nmgp_dados_form["id_recibo"] = $this->id_recibo;
              $this->numero_rc = "";  
              $this->nmgp_dados_form["numero_rc"] = $this->numero_rc;
              $this->fecha_rc =  date('Y') . "-" . date('m')  . "-" . date('d');
              $this->nmgp_dados_form["fecha_rc"] = $this->fecha_rc;
              $this->contrato = "";  
              $this->nmgp_dados_form["contrato"] = $this->contrato;
              $this->tercero = "";  
              $this->nmgp_dados_form["tercero"] = $this->tercero;
              $this->monto_rc = "";  
              $this->nmgp_dados_form["monto_rc"] = $this->monto_rc;
              $this->observacion = "";  
              $this->nmgp_dados_form["observacion"] = $this->observacion;
              $this->creado = "";  
              $this->creado_hora = "" ;  
              $this->nmgp_dados_form["creado"] = $this->creado;
              $this->editado = "";  
              $this->editado_hora = "" ;  
              $this->nmgp_dados_form["editado"] = $this->editado;
              $this->id_banco = "";  
              $this->nmgp_dados_form["id_banco"] = $this->id_banco;
              $this->asentado = "";  
              $this->nmgp_dados_form["asentado"] = $this->asentado;
              $this->detalle1 = "";  
              $this->nmgp_dados_form["detalle1"] = $this->detalle1;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['foreign_key'] as $sFKName => $sFKValue)
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ingcaja_detalle']['embutida_parms'] = "SC_glo_par_gelcontrato*scingElContrato*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinS*scout";
  }
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id_recibo) from " . $this->Ini->nm_tabela . " where id_recibo < $this->id_recibo" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id_recibo) from " . $this->Ini->nm_tabela . " where id_recibo < $this->id_recibo" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id_recibo) from " . $this->Ini->nm_tabela . " where id_recibo < $this->id_recibo" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id_recibo) from " . $this->Ini->nm_tabela . " where id_recibo < $this->id_recibo" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id_recibo) from " . $this->Ini->nm_tabela . " where id_recibo < $this->id_recibo" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id_recibo) from " . $this->Ini->nm_tabela . " where id_recibo < $this->id_recibo" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id_recibo) from " . $this->Ini->nm_tabela . " where id_recibo < $this->id_recibo" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id_recibo) from " . $this->Ini->nm_tabela . " where id_recibo < $this->id_recibo" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id_recibo) from " . $this->Ini->nm_tabela . " where id_recibo < $this->id_recibo" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id_recibo) from " . $this->Ini->nm_tabela . " where id_recibo < $this->id_recibo" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->id_recibo = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id_recibo) from " . $this->Ini->nm_tabela . " where id_recibo > $this->id_recibo" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id_recibo) from " . $this->Ini->nm_tabela . " where id_recibo > $this->id_recibo" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id_recibo) from " . $this->Ini->nm_tabela . " where id_recibo > $this->id_recibo" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id_recibo) from " . $this->Ini->nm_tabela . " where id_recibo > $this->id_recibo" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id_recibo) from " . $this->Ini->nm_tabela . " where id_recibo > $this->id_recibo" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id_recibo) from " . $this->Ini->nm_tabela . " where id_recibo > $this->id_recibo" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id_recibo) from " . $this->Ini->nm_tabela . " where id_recibo > $this->id_recibo" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id_recibo) from " . $this->Ini->nm_tabela . " where id_recibo > $this->id_recibo" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id_recibo) from " . $this->Ini->nm_tabela . " where id_recibo > $this->id_recibo" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id_recibo) from " . $this->Ini->nm_tabela . " where id_recibo > $this->id_recibo" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->id_recibo = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id_recibo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id_recibo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id_recibo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id_recibo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id_recibo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id_recibo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id_recibo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id_recibo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id_recibo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id_recibo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_filter']))
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
     $this->id_recibo = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id_recibo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id_recibo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id_recibo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id_recibo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id_recibo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id_recibo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id_recibo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id_recibo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id_recibo) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id_recibo) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
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
     $this->id_recibo = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function asentado_onChange()
{
$_SESSION['scriptcase']['form_recibos_ing_caja']['contr_erro'] = 'on';
  
$original_asentado = $this->asentado;
$original_monto_rc = $this->monto_rc;
$original_id_recibo = $this->id_recibo;
$original_contrato = $this->contrato;
$original_fecha_rc = $this->fecha_rc;
$original_tercero = $this->tercero;
$original_id_banco = $this->id_banco;

if($this->asentado =='SI')
	{
	if($this->monto_rc <=0)
		{
		$this->asentado  = 'NO';
		$this->sc_ajax_message("No ha relacionado pago!!<br> el Recibo no se puede asentar");
		}
	else
		{
		$sql_valida = "SELECT SUM(rc.valor_pagado) as total FROM recibos_ingcaja_detalle rc WHERE rc.id_recibo = '".$this->id_recibo ."' AND (SELECT deperiodo FROM terceros_contratos_factura WHERE id = rc.factura) = 'SI'";
		 
      $nm_select = $sql_valida; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_val = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dt_val[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_val = false;
          $this->dt_val_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->dt_val[0][0]) and $this->dt_val[0][0]>0)
			{
			$sql1= "SELECT saldoactual FROM terceros_contratos WHERE numero_contrato = '".$this->contrato ."'";
			 
      $nm_select = $sql1; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
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
;
			$vSaldoAc = 0;
			$vSaldoAn = 0;
			if(isset($this->dset[0][0]))
				{
				$vSaldoAn = $this->dset[0][0];
				$vSaldoAc = $this->dset[0][0] - $this->monto_rc ;
				}
			else
				{
				$vSaldoAc = 0;
				$vSaldoAn = 0;
				}
			$sql = "UPDATE recibos_ing_caja SET asentado = 'SI' where id_recibo = '".$this->id_recibo ."'";
			
     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_recibos_ing_caja_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

			$sql2= "UPDATE terceros_contratos SET fecha_ultimopago = '".$this->fecha_rc ."', valorpagado = '".$this->monto_rc ."', saldoanterior = $vSaldoAn, saldoactual = $vSaldoAc WHERE numero_contrato = '".$this->contrato ."'";
			
     $nm_select = $sql2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_recibos_ing_caja_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

			$this->sc_field_readonly("fecha_rc", 'on');
			$this->sc_field_readonly("contrato", 'on');
			$this->sc_field_readonly("tercero", 'on');
			$this->sc_field_readonly("monto_rc", 'on');
			$this->sc_field_readonly("id_banco", 'on');
			}
		else
			{
			$this->sc_field_readonly("fecha_rc", 'on');
			$this->sc_field_readonly("contrato", 'on');
			$this->sc_field_readonly("tercero", 'on');
			$this->sc_field_readonly("monto_rc", 'on');
			$this->sc_field_readonly("id_banco", 'on');
			$sql = "UPDATE recibos_ing_caja SET asentado = 'SI' where id_recibo = '".$this->id_recibo ."'";
			
     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_recibos_ing_caja_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			}
		}
	}
else
	{
	$sql_valida = "SELECT SUM(rc.valor_pagado) as total FROM recibos_ingcaja_detalle rc WHERE rc.id_recibo = '".$this->id_recibo ."' AND (SELECT deperiodo FROM terceros_contratos_factura WHERE id = rc.factura) = 'SI'";
	 
      $nm_select = $sql_valida; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_val = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dt_val[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_val = false;
          $this->dt_val_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->dt_val[0][0]) and $this->dt_val[0][0]>0)
		{
		$sql1= "SELECT saldoactual, saldoanterior FROM terceros_contratos WHERE numero_contrato = '".$this->contrato ."'";
			 
      $nm_select = $sql1; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dset = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
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
;
			$vSaldoAc = 0;
			$vSaldoAn = 0;
			if(isset($this->dset[0][0]))
				{
				$vSaldoAn = $this->dset[0][1];
				$vSaldoAc = $this->dset[0][0] + $this->monto_rc ;
				}
			else
				{
				$vSaldoAc = 0;
				$vSaldoAn = 0;
				}
		$sql2= "UPDATE terceros_contratos SET fecha_ultimopago = '".$this->fecha_rc ."', valorpagado = 0, saldoanterior = $vSaldoAn, saldoactual = $vSaldoAc WHERE numero_contrato = '".$this->contrato ."'";
			
     $nm_select = $sql2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_recibos_ing_caja_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

			$sql = "UPDATE recibos_ing_caja SET asentado = 'NO' where id_recibo = '".$this->id_recibo ."'";
			
     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_recibos_ing_caja_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

			$this->sc_field_readonly("fecha_rc", 'off');
			$this->sc_field_readonly("contrato", 'off');
			$this->sc_field_readonly("tercero", 'off');
			$this->sc_field_readonly("monto_rc", 'off');
			$this->sc_field_readonly("id_banco", 'off');
		}
	else
		{
		$this->sc_field_readonly("fecha_rc", 'off');
		$this->sc_field_readonly("contrato", 'off');
		$this->sc_field_readonly("tercero", 'off');
		$this->sc_field_readonly("monto_rc", 'off');
		$this->sc_field_readonly("id_banco", 'off');
		$sql = "UPDATE recibos_ing_caja SET asentado = 'NO' where id_recibo = '".$this->id_recibo ."'";
		
     $nm_select = $sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_recibos_ing_caja_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		}
	}


$modificado_asentado = $this->asentado;
$modificado_monto_rc = $this->monto_rc;
$modificado_id_recibo = $this->id_recibo;
$modificado_contrato = $this->contrato;
$modificado_fecha_rc = $this->fecha_rc;
$modificado_tercero = $this->tercero;
$modificado_id_banco = $this->id_banco;
$this->nm_formatar_campos('asentado', 'monto_rc', 'id_recibo', 'contrato', 'fecha_rc', 'tercero', 'id_banco');
if ($original_asentado !== $modificado_asentado || isset($this->nmgp_cmp_readonly['asentado']) || (isset($bFlagRead_asentado) && $bFlagRead_asentado))
{
    $this->ajax_return_values_asentado(true);
}
if ($original_monto_rc !== $modificado_monto_rc || isset($this->nmgp_cmp_readonly['monto_rc']) || (isset($bFlagRead_monto_rc) && $bFlagRead_monto_rc))
{
    $this->ajax_return_values_monto_rc(true);
}
if ($original_id_recibo !== $modificado_id_recibo || isset($this->nmgp_cmp_readonly['id_recibo']) || (isset($bFlagRead_id_recibo) && $bFlagRead_id_recibo))
{
    $this->ajax_return_values_id_recibo(true);
}
if ($original_contrato !== $modificado_contrato || isset($this->nmgp_cmp_readonly['contrato']) || (isset($bFlagRead_contrato) && $bFlagRead_contrato))
{
    $this->ajax_return_values_contrato(true);
}
if ($original_fecha_rc !== $modificado_fecha_rc || isset($this->nmgp_cmp_readonly['fecha_rc']) || (isset($bFlagRead_fecha_rc) && $bFlagRead_fecha_rc))
{
    $this->ajax_return_values_fecha_rc(true);
}
if ($original_tercero !== $modificado_tercero || isset($this->nmgp_cmp_readonly['tercero']) || (isset($bFlagRead_tercero) && $bFlagRead_tercero))
{
    $this->ajax_return_values_tercero(true);
}
if ($original_id_banco !== $modificado_id_banco || isset($this->nmgp_cmp_readonly['id_banco']) || (isset($bFlagRead_id_banco) && $bFlagRead_id_banco))
{
    $this->ajax_return_values_id_banco(true);
}
$this->NM_ajax_info['event_field'] = 'asentado';
form_recibos_ing_caja_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_recibos_ing_caja']['contr_erro'] = 'off';
}
function contrato_onChange()
{
$_SESSION['scriptcase']['form_recibos_ing_caja']['contr_erro'] = 'on';
  
$original_contrato = $this->contrato;
$original_tercero = $this->tercero;

$vElCont = $this->contrato ;
$sql_t = "select cliente from terceros_contratos where numero_contrato='".$vElCont."'";
 
      $nm_select = $sql_t; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_t = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds_t[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_t = false;
          $this->ds_t_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->ds_t[0][0]))
	{
	$vCC = $this->ds_t[0][0];
	$this->tercero  = "$vCC";
	}
else
	{
	
	}

$modificado_contrato = $this->contrato;
$modificado_tercero = $this->tercero;
$this->nm_formatar_campos('contrato', 'tercero');
if ($original_contrato !== $modificado_contrato || isset($this->nmgp_cmp_readonly['contrato']) || (isset($bFlagRead_contrato) && $bFlagRead_contrato))
{
    $this->ajax_return_values_contrato(true);
}
if ($original_tercero !== $modificado_tercero || isset($this->nmgp_cmp_readonly['tercero']) || (isset($bFlagRead_tercero) && $bFlagRead_tercero))
{
    $this->ajax_return_values_tercero(true);
}
$this->NM_ajax_info['event_field'] = 'contrato';
form_recibos_ing_caja_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_recibos_ing_caja']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_recibos_ing_caja_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_recibos_ing_caja_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("id_recibo", "numero_rc", "fecha_rc", "contrato", "tercero", "monto_rc", "observacion", "creado", "editado", "id_banco", "asentado"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['csrf_token'];
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

   function Form_lookup_id_banco()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_id_banco']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_id_banco'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_id_banco']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_id_banco'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_id_banco']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_id_banco'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_id_banco']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_id_banco'] = array(); 
    }

   $old_value_id_recibo = $this->id_recibo;
   $old_value_numero_rc = $this->numero_rc;
   $old_value_fecha_rc = $this->fecha_rc;
   $old_value_contrato = $this->contrato;
   $old_value_monto_rc = $this->monto_rc;
   $old_value_creado = $this->creado;
   $old_value_creado_hora = $this->creado_hora;
   $old_value_editado = $this->editado;
   $old_value_editado_hora = $this->editado_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_recibo = $this->id_recibo;
   $unformatted_value_numero_rc = $this->numero_rc;
   $unformatted_value_fecha_rc = $this->fecha_rc;
   $unformatted_value_contrato = $this->contrato;
   $unformatted_value_monto_rc = $this->monto_rc;
   $unformatted_value_creado = $this->creado;
   $unformatted_value_creado_hora = $this->creado_hora;
   $unformatted_value_editado = $this->editado;
   $unformatted_value_editado_hora = $this->editado_hora;

   $nm_comando = "SELECT idcaja_vta, codigo_banco  FROM bancos  ORDER BY codigo_banco";

   $this->id_recibo = $old_value_id_recibo;
   $this->numero_rc = $old_value_numero_rc;
   $this->fecha_rc = $old_value_fecha_rc;
   $this->contrato = $old_value_contrato;
   $this->monto_rc = $old_value_monto_rc;
   $this->creado = $old_value_creado;
   $this->creado_hora = $old_value_creado_hora;
   $this->editado = $old_value_editado;
   $this->editado_hora = $old_value_editado_hora;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['Lookup_id_banco'][] = $rs->fields[0];
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
   function Form_lookup_asentado()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "NO?#?NO?#?S?@?";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_recibos_ing_caja_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "id_recibo", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "numero_rc", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecha_rc", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "contrato", $arg_search, str_replace(",", ".", $data_search));
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
              $this->SC_monta_condicao($comando, "monto_rc", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "observacion", $arg_search, $data_search);
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
              $data_lookup = $this->SC_lookup_id_banco($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "id_banco", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_asentado($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "asentado", $arg_search, $data_lookup);
              }
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_recibos_ing_caja = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['total'] = $qt_geral_reg_form_recibos_ing_caja;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_recibos_ing_caja_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_recibos_ing_caja_pack_ajax_response();
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
      $nm_numeric[] = "id_recibo";$nm_numeric[] = "numero_rc";$nm_numeric[] = "contrato";$nm_numeric[] = "monto_rc";$nm_numeric[] = "id_banco";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['decimal_db'] == ".")
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
      $Nm_datas['fecha_rc'] = "date";$Nm_datas['creado'] = "datetime";$Nm_datas['editado'] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['SC_sep_date1'];
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
   function SC_lookup_tercero($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT documento + ' - ' + nombres, documento FROM terceros WHERE (documento + ' - ' + nombres LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(documento,' - ',nombres), documento FROM terceros WHERE (concat(documento,' - ',nombres) LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT documento&' - '&nombres, documento FROM terceros WHERE (documento&' - '&nombres LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT documento||' - '||nombres, documento FROM terceros WHERE (documento||' - '||nombres LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT documento + ' - ' + nombres, documento FROM terceros WHERE (documento + ' - ' + nombres LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT documento||' - '||nombres, documento FROM terceros WHERE (documento||' - '||nombres LIKE '%$campo%')" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT documento||' - '||nombres, documento FROM terceros WHERE (documento||' - '||nombres LIKE '%$campo%')" ; 
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
   function SC_lookup_id_banco($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT codigo_banco, idcaja_vta FROM bancos WHERE (codigo_banco LIKE '%$campo%')" ; 
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
   function SC_lookup_asentado($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['NO'] = "NO";
       $data_look['SI'] = "SI";
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
       $nmgp_saida_form = "form_recibos_ing_caja_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_recibos_ing_caja_fim.php";
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
       form_recibos_ing_caja_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_recibos_ing_caja']['masterValue']);
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
        if ('editado' == $sField)
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
    function getButtonIds($buttonName) {
        switch ($buttonName) {
            case "new":
                return array("sc_b_new_t.sc-unique-btn-1");
                break;
            case "insert":
                return array("sc_b_ins_t.sc-unique-btn-2");
                break;
            case "bcancelar":
                return array("sc_b_sai_t.sc-unique-btn-3");
                break;
            case "update":
                return array("sc_b_upd_t.sc-unique-btn-4");
                break;
            case "delete":
                return array("sc_b_del_t.sc-unique-btn-5");
                break;
            case "help":
                return array("sc_b_hlp_t");
                break;
            case "exit":
                return array("sc_b_sai_t.sc-unique-btn-6", "sc_b_sai_t.sc-unique-btn-7", "sc_b_sai_t.sc-unique-btn-9", "sc_b_sai_t.sc-unique-btn-8", "sc_b_sai_t.sc-unique-btn-10");
                break;
            case "last":
                return array("sc_b_fim_b.sc-unique-btn-11");
                break;
        }

        return array($buttonName);
    } // getButtonIds

}
?>
