<?php
//
class form_usuarios_apl
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
   var $idusuarios;
   var $creacion;
   var $creacion_hora;
   var $usuario;
   var $password;
   var $nombre;
   var $correo;
   var $telefono;
   var $tercero;
   var $tercero_1;
   var $resolucion;
   var $resolucion_1;
   var $grupo;
   var $grupo_1;
   var $activo;
   var $activo_1;
   var $ultima_actualizacion;
   var $ultima_actualizacion_hora;
   var $grupocomanda;
   var $grupocomanda_1;
   var $nombre_pc;
   var $nombre_impre;
   var $sesion_id;
   var $acceso_inventario;
   var $acceso_inventario_1;
   var $acceso_gerencial;
   var $acceso_gerencial_1;
   var $acceso_restaurante;
   var $acceso_restaurante_1;
   var $sesion_id_movil;
   var $banco_movil;
   var $banco_movil_1;
   var $ubicacion;
   var $n_equipo;
   var $serial;
   var $idbod;
   var $idbod_1;
   var $ocultar_bod;
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
          if (isset($this->NM_ajax_info['param']['acceso_gerencial']))
          {
              $this->acceso_gerencial = $this->NM_ajax_info['param']['acceso_gerencial'];
          }
          if (isset($this->NM_ajax_info['param']['acceso_inventario']))
          {
              $this->acceso_inventario = $this->NM_ajax_info['param']['acceso_inventario'];
          }
          if (isset($this->NM_ajax_info['param']['acceso_restaurante']))
          {
              $this->acceso_restaurante = $this->NM_ajax_info['param']['acceso_restaurante'];
          }
          if (isset($this->NM_ajax_info['param']['activo']))
          {
              $this->activo = $this->NM_ajax_info['param']['activo'];
          }
          if (isset($this->NM_ajax_info['param']['banco_movil']))
          {
              $this->banco_movil = $this->NM_ajax_info['param']['banco_movil'];
          }
          if (isset($this->NM_ajax_info['param']['correo']))
          {
              $this->correo = $this->NM_ajax_info['param']['correo'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['grupo']))
          {
              $this->grupo = $this->NM_ajax_info['param']['grupo'];
          }
          if (isset($this->NM_ajax_info['param']['grupocomanda']))
          {
              $this->grupocomanda = $this->NM_ajax_info['param']['grupocomanda'];
          }
          if (isset($this->NM_ajax_info['param']['idbod']))
          {
              $this->idbod = $this->NM_ajax_info['param']['idbod'];
          }
          if (isset($this->NM_ajax_info['param']['idusuarios']))
          {
              $this->idusuarios = $this->NM_ajax_info['param']['idusuarios'];
          }
          if (isset($this->NM_ajax_info['param']['n_equipo']))
          {
              $this->n_equipo = $this->NM_ajax_info['param']['n_equipo'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_fields']))
          {
              $this->nmgp_refresh_fields = $this->NM_ajax_info['param']['nmgp_refresh_fields'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['nombre']))
          {
              $this->nombre = $this->NM_ajax_info['param']['nombre'];
          }
          if (isset($this->NM_ajax_info['param']['nombre_impre']))
          {
              $this->nombre_impre = $this->NM_ajax_info['param']['nombre_impre'];
          }
          if (isset($this->NM_ajax_info['param']['nombre_pc']))
          {
              $this->nombre_pc = $this->NM_ajax_info['param']['nombre_pc'];
          }
          if (isset($this->NM_ajax_info['param']['ocultar_bod']))
          {
              $this->ocultar_bod = $this->NM_ajax_info['param']['ocultar_bod'];
          }
          if (isset($this->NM_ajax_info['param']['password']))
          {
              $this->password = $this->NM_ajax_info['param']['password'];
          }
          if (isset($this->NM_ajax_info['param']['resolucion']))
          {
              $this->resolucion = $this->NM_ajax_info['param']['resolucion'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['serial']))
          {
              $this->serial = $this->NM_ajax_info['param']['serial'];
          }
          if (isset($this->NM_ajax_info['param']['telefono']))
          {
              $this->telefono = $this->NM_ajax_info['param']['telefono'];
          }
          if (isset($this->NM_ajax_info['param']['tercero']))
          {
              $this->tercero = $this->NM_ajax_info['param']['tercero'];
          }
          if (isset($this->NM_ajax_info['param']['ubicacion']))
          {
              $this->ubicacion = $this->NM_ajax_info['param']['ubicacion'];
          }
          if (isset($this->NM_ajax_info['param']['usuario']))
          {
              $this->usuario = $this->NM_ajax_info['param']['usuario'];
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
      if (isset($this->gidresolucion) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gidresolucion'] = $this->gidresolucion;
      }
      if (isset($_POST["gidresolucion"]) && isset($this->gidresolucion)) 
      {
          $_SESSION['gidresolucion'] = $this->gidresolucion;
      }
      if (isset($_GET["gidresolucion"]) && isset($this->gidresolucion)) 
      {
          $_SESSION['gidresolucion'] = $this->gidresolucion;
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_usuarios']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_usuarios']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_usuarios']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_usuarios']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_usuarios']['embutida_parms']);
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
                 nm_limpa_str_form_usuarios($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->gidresolucion)) 
          {
              $_SESSION['gidresolucion'] = $this->gidresolucion;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_usuarios']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_usuarios']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_usuarios']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_usuarios']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->gidresolucion)) 
          {
              $_SESSION['gidresolucion'] = $this->gidresolucion;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_usuarios']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_usuarios']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_usuarios']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_usuarios']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_usuarios']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_usuarios']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_usuarios']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_usuarios']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_usuarios']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_usuarios']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_usuarios_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_usuarios']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_usuarios']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_usuarios'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_usuarios']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_usuarios']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_usuarios') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_usuarios']['label'] = "Usuario";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_usuarios")
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
      $this->Ini->Str_btn_form = (isset($_SESSION['scriptcase']['str_button_all'])) ? $_SESSION['scriptcase']['str_button_all'] : "scriptcase9_BlueBerry";
      $_SESSION['scriptcase']['str_button_all'] = $this->Ini->Str_btn_form;
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


      $this->arr_buttons['permisos']['hint']             = "";
      $this->arr_buttons['permisos']['type']             = "button";
      $this->arr_buttons['permisos']['value']            = "Permisos de Usuario";
      $this->arr_buttons['permisos']['display']          = "text_fontawesomeicon";
      $this->arr_buttons['permisos']['display_position'] = "text_right";
      $this->arr_buttons['permisos']['style']            = "paypal";
      $this->arr_buttons['permisos']['image']            = "";
      $this->arr_buttons['permisos']['has_fa']            = "true";
      $this->arr_buttons['permisos']['fontawesomeicon']            = "fas fa-user-lock";


      $_SESSION['scriptcase']['error_icon']['form_usuarios']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_usuarios'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "on";
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
      $this->nmgp_botoes['permisos'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_usuarios']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_form_insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_usuarios'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_usuarios'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dados_form'];
          if (!isset($this->creacion)){$this->creacion = $this->nmgp_dados_form['creacion'];} 
          if (!isset($this->ultima_actualizacion)){$this->ultima_actualizacion = $this->nmgp_dados_form['ultima_actualizacion'];} 
          if (!isset($this->sesion_id)){$this->sesion_id = $this->nmgp_dados_form['sesion_id'];} 
          if (!isset($this->sesion_id_movil)){$this->sesion_id_movil = $this->nmgp_dados_form['sesion_id_movil'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_usuarios", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'form_usuarios_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_usuarios_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_usuarios/form_usuarios_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_usuarios_erro.class.php"); 
      }
      $this->Erro      = new form_usuarios_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['opcao']))
         { 
             if ($this->idusuarios != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_usuarios']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['permisos'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['permisos'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['botoes']['permisos'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dados_form'];
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

            $out1_img_cache = $_SESSION['scriptcase']['form_usuarios']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['form_usuarios']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
      if (isset($this->idusuarios)) { $this->nm_limpa_alfa($this->idusuarios); }
      if (isset($this->usuario)) { $this->nm_limpa_alfa($this->usuario); }
      if (isset($this->password)) { $this->nm_limpa_alfa($this->password); }
      if (isset($this->nombre)) { $this->nm_limpa_alfa($this->nombre); }
      if (isset($this->correo)) { $this->nm_limpa_alfa($this->correo); }
      if (isset($this->telefono)) { $this->nm_limpa_alfa($this->telefono); }
      if (isset($this->tercero)) { $this->nm_limpa_alfa($this->tercero); }
      if (isset($this->resolucion)) { $this->nm_limpa_alfa($this->resolucion); }
      if (isset($this->grupo)) { $this->nm_limpa_alfa($this->grupo); }
      if (isset($this->activo)) { $this->nm_limpa_alfa($this->activo); }
      if (isset($this->grupocomanda)) { $this->nm_limpa_alfa($this->grupocomanda); }
      if (isset($this->nombre_pc)) { $this->nm_limpa_alfa($this->nombre_pc); }
      if (isset($this->nombre_impre)) { $this->nm_limpa_alfa($this->nombre_impre); }
      if (isset($this->banco_movil)) { $this->nm_limpa_alfa($this->banco_movil); }
      if (isset($this->ubicacion)) { $this->nm_limpa_alfa($this->ubicacion); }
      if (isset($this->n_equipo)) { $this->nm_limpa_alfa($this->n_equipo); }
      if (isset($this->serial)) { $this->nm_limpa_alfa($this->serial); }
      if (isset($this->idbod)) { $this->nm_limpa_alfa($this->idbod); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- idusuarios
      $this->field_config['idusuarios']               = array();
      $this->field_config['idusuarios']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idusuarios']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idusuarios']['symbol_dec'] = '';
      $this->field_config['idusuarios']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idusuarios']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- creacion
      $this->field_config['creacion']                 = array();
      $this->field_config['creacion']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['creacion']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['creacion']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['creacion']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'creacion');
      //-- ultima_actualizacion
      $this->field_config['ultima_actualizacion']                 = array();
      $this->field_config['ultima_actualizacion']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['ultima_actualizacion']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['ultima_actualizacion']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['ultima_actualizacion']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'ultima_actualizacion');
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
          if ('validate_idusuarios' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idusuarios');
          }
          if ('validate_usuario' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'usuario');
          }
          if ('validate_password' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'password');
          }
          if ('validate_nombre' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nombre');
          }
          if ('validate_correo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'correo');
          }
          if ('validate_telefono' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'telefono');
          }
          if ('validate_tercero' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tercero');
          }
          if ('validate_resolucion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'resolucion');
          }
          if ('validate_grupo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'grupo');
          }
          if ('validate_activo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'activo');
          }
          if ('validate_grupocomanda' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'grupocomanda');
          }
          if ('validate_banco_movil' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'banco_movil');
          }
          if ('validate_idbod' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idbod');
          }
          if ('validate_ocultar_bod' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ocultar_bod');
          }
          if ('validate_acceso_inventario' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'acceso_inventario');
          }
          if ('validate_acceso_gerencial' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'acceso_gerencial');
          }
          if ('validate_acceso_restaurante' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'acceso_restaurante');
          }
          if ('validate_nombre_pc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nombre_pc');
          }
          if ('validate_nombre_impre' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nombre_impre');
          }
          if ('validate_ubicacion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ubicacion');
          }
          if ('validate_n_equipo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'n_equipo');
          }
          if ('validate_serial' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'serial');
          }
          form_usuarios_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          if ('event_grupo_onchange' == $this->NM_ajax_opcao)
          {
              $this->grupo_onChange();
          }
          if ('event_tercero_onchange' == $this->NM_ajax_opcao)
          {
              $this->tercero_onChange();
          }
          form_usuarios_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->activo))
          {
              $x = 0; 
              $this->activo_1 = $this->activo;
              $this->activo = ""; 
              if ($this->activo_1 != "") 
              { 
                  foreach ($this->activo_1 as $dados_activo_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->activo .= ";";
                      } 
                      $this->activo .= $dados_activo_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->acceso_inventario))
          {
              $x = 0; 
              $this->acceso_inventario_1 = $this->acceso_inventario;
              $this->acceso_inventario = ""; 
              if ($this->acceso_inventario_1 != "") 
              { 
                  foreach ($this->acceso_inventario_1 as $dados_acceso_inventario_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->acceso_inventario .= ";";
                      } 
                      $this->acceso_inventario .= $dados_acceso_inventario_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->acceso_gerencial))
          {
              $x = 0; 
              $this->acceso_gerencial_1 = $this->acceso_gerencial;
              $this->acceso_gerencial = ""; 
              if ($this->acceso_gerencial_1 != "") 
              { 
                  foreach ($this->acceso_gerencial_1 as $dados_acceso_gerencial_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->acceso_gerencial .= ";";
                      } 
                      $this->acceso_gerencial .= $dados_acceso_gerencial_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->acceso_restaurante))
          {
              $x = 0; 
              $this->acceso_restaurante_1 = $this->acceso_restaurante;
              $this->acceso_restaurante = ""; 
              if ($this->acceso_restaurante_1 != "") 
              { 
                  foreach ($this->acceso_restaurante_1 as $dados_acceso_restaurante_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->acceso_restaurante .= ";";
                      } 
                      $this->acceso_restaurante .= $dados_acceso_restaurante_1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->nm_tira_formatacao();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dados_select']['grupo']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->grupo = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dados_select']['grupo'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dados_select']['usuario']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->usuario = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dados_select']['usuario'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dados_select']['activo']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->activo = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dados_select']['activo'];
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_usuarios_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_usuarios']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_usuarios_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['sc_redir_atualiz'] == "ok")
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
          form_usuarios_pack_ajax_response();
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
          form_usuarios_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_usuarios.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Usuario") ?></TITLE>
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
<form name="Fdown" method="get" action="form_usuarios_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_usuarios"> 
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
           case 'idusuarios':
               return "Idusuarios";
               break;
           case 'usuario':
               return "Usuario";
               break;
           case 'password':
               return "Password";
               break;
           case 'nombre':
               return "Nombre";
               break;
           case 'correo':
               return "Correo";
               break;
           case 'telefono':
               return "Telefono";
               break;
           case 'tercero':
               return "Tercero";
               break;
           case 'resolucion':
               return "Prefijo";
               break;
           case 'grupo':
               return "Grupo";
               break;
           case 'activo':
               return "Activo";
               break;
           case 'grupocomanda':
               return "Grupo Comanda";
               break;
           case 'banco_movil':
               return "Caja Predeterminada";
               break;
           case 'idbod':
               return "Bodega";
               break;
           case 'ocultar_bod':
               return "Ver Bodegas";
               break;
           case 'acceso_inventario':
               return "Acceso Inventario";
               break;
           case 'acceso_gerencial':
               return "Acceso Gerencial";
               break;
           case 'acceso_restaurante':
               return "Acceso Restaurante";
               break;
           case 'nombre_pc':
               return "Nombre Pc de Red";
               break;
           case 'nombre_impre':
               return "Nombre Impresora de Red";
               break;
           case 'ubicacion':
               return "Ubicación del PC";
               break;
           case 'n_equipo':
               return "Nombre del PC";
               break;
           case 'serial':
               return "Serial";
               break;
           case 'creacion':
               return "Creacion";
               break;
           case 'ultima_actualizacion':
               return "Ultima Actualizacion";
               break;
           case 'sesion_id':
               return "Sesion Id";
               break;
           case 'sesion_id_movil':
               return "Sesion Id Movil";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_usuarios']) || !is_array($this->NM_ajax_info['errList']['geral_form_usuarios']))
              {
                  $this->NM_ajax_info['errList']['geral_form_usuarios'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_usuarios'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'idusuarios' == $filtro)) || (is_array($filtro) && in_array('idusuarios', $filtro)))
        $this->ValidateField_idusuarios($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'usuario' == $filtro)) || (is_array($filtro) && in_array('usuario', $filtro)))
        $this->ValidateField_usuario($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'password' == $filtro)) || (is_array($filtro) && in_array('password', $filtro)))
        $this->ValidateField_password($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nombre' == $filtro)) || (is_array($filtro) && in_array('nombre', $filtro)))
        $this->ValidateField_nombre($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'correo' == $filtro)) || (is_array($filtro) && in_array('correo', $filtro)))
        $this->ValidateField_correo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'telefono' == $filtro)) || (is_array($filtro) && in_array('telefono', $filtro)))
        $this->ValidateField_telefono($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tercero' == $filtro)) || (is_array($filtro) && in_array('tercero', $filtro)))
        $this->ValidateField_tercero($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'resolucion' == $filtro)) || (is_array($filtro) && in_array('resolucion', $filtro)))
        $this->ValidateField_resolucion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'grupo' == $filtro)) || (is_array($filtro) && in_array('grupo', $filtro)))
        $this->ValidateField_grupo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'activo' == $filtro)) || (is_array($filtro) && in_array('activo', $filtro)))
        $this->ValidateField_activo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'grupocomanda' == $filtro)) || (is_array($filtro) && in_array('grupocomanda', $filtro)))
        $this->ValidateField_grupocomanda($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'banco_movil' == $filtro)) || (is_array($filtro) && in_array('banco_movil', $filtro)))
        $this->ValidateField_banco_movil($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'idbod' == $filtro)) || (is_array($filtro) && in_array('idbod', $filtro)))
        $this->ValidateField_idbod($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ocultar_bod' == $filtro)) || (is_array($filtro) && in_array('ocultar_bod', $filtro)))
        $this->ValidateField_ocultar_bod($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'acceso_inventario' == $filtro)) || (is_array($filtro) && in_array('acceso_inventario', $filtro)))
        $this->ValidateField_acceso_inventario($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'acceso_gerencial' == $filtro)) || (is_array($filtro) && in_array('acceso_gerencial', $filtro)))
        $this->ValidateField_acceso_gerencial($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'acceso_restaurante' == $filtro)) || (is_array($filtro) && in_array('acceso_restaurante', $filtro)))
        $this->ValidateField_acceso_restaurante($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nombre_pc' == $filtro)) || (is_array($filtro) && in_array('nombre_pc', $filtro)))
        $this->ValidateField_nombre_pc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nombre_impre' == $filtro)) || (is_array($filtro) && in_array('nombre_impre', $filtro)))
        $this->ValidateField_nombre_impre($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ubicacion' == $filtro)) || (is_array($filtro) && in_array('ubicacion', $filtro)))
        $this->ValidateField_ubicacion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'n_equipo' == $filtro)) || (is_array($filtro) && in_array('n_equipo', $filtro)))
        $this->ValidateField_n_equipo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'serial' == $filtro)) || (is_array($filtro) && in_array('serial', $filtro)))
        $this->ValidateField_serial($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_idusuarios(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idusuarios === "" || is_null($this->idusuarios))  
      { 
          $this->idusuarios = 0;
      } 
      nm_limpa_numero($this->idusuarios, $this->field_config['idusuarios']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->idusuarios != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->idusuarios) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Idusuarios: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['idusuarios']))
                  {
                      $Campos_Erros['idusuarios'] = array();
                  }
                  $Campos_Erros['idusuarios'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['idusuarios']) || !is_array($this->NM_ajax_info['errList']['idusuarios']))
                  {
                      $this->NM_ajax_info['errList']['idusuarios'] = array();
                  }
                  $this->NM_ajax_info['errList']['idusuarios'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->idusuarios, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Idusuarios; " ; 
                  if (!isset($Campos_Erros['idusuarios']))
                  {
                      $Campos_Erros['idusuarios'] = array();
                  }
                  $Campos_Erros['idusuarios'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['idusuarios']) || !is_array($this->NM_ajax_info['errList']['idusuarios']))
                  {
                      $this->NM_ajax_info['errList']['idusuarios'] = array();
                  }
                  $this->NM_ajax_info['errList']['idusuarios'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idusuarios';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idusuarios

    function ValidateField_usuario(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['usuario']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['usuario'] == "on")) 
      { 
          if ($this->usuario == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Usuario" ; 
              if (!isset($Campos_Erros['usuario']))
              {
                  $Campos_Erros['usuario'] = array();
              }
              $Campos_Erros['usuario'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['usuario']) || !is_array($this->NM_ajax_info['errList']['usuario']))
                  {
                      $this->NM_ajax_info['errList']['usuario'] = array();
                  }
                  $this->NM_ajax_info['errList']['usuario'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->usuario) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Usuario " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['usuario']))
              {
                  $Campos_Erros['usuario'] = array();
              }
              $Campos_Erros['usuario'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['usuario']) || !is_array($this->NM_ajax_info['errList']['usuario']))
              {
                  $this->NM_ajax_info['errList']['usuario'] = array();
              }
              $this->NM_ajax_info['errList']['usuario'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
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

    function ValidateField_password(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['password']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['password'] == "on")) 
      { 
          if ($this->password == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Password" ; 
              if (!isset($Campos_Erros['password']))
              {
                  $Campos_Erros['password'] = array();
              }
              $Campos_Erros['password'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['password']) || !is_array($this->NM_ajax_info['errList']['password']))
                  {
                      $this->NM_ajax_info['errList']['password'] = array();
                  }
                  $this->NM_ajax_info['errList']['password'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->password) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Password " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['password']))
              {
                  $Campos_Erros['password'] = array();
              }
              $Campos_Erros['password'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['password']) || !is_array($this->NM_ajax_info['errList']['password']))
              {
                  $this->NM_ajax_info['errList']['password'] = array();
              }
              $this->NM_ajax_info['errList']['password'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'password';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_password

    function ValidateField_nombre(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->nombre = sc_strtoupper($this->nombre); 
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['nombre']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['nombre'] == "on")) 
      { 
          if ($this->nombre == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Nombre" ; 
              if (!isset($Campos_Erros['nombre']))
              {
                  $Campos_Erros['nombre'] = array();
              }
              $Campos_Erros['nombre'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['nombre']) || !is_array($this->NM_ajax_info['errList']['nombre']))
                  {
                      $this->NM_ajax_info['errList']['nombre'] = array();
                  }
                  $this->NM_ajax_info['errList']['nombre'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nombre) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nombre " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombre']))
              {
                  $Campos_Erros['nombre'] = array();
              }
              $Campos_Erros['nombre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombre']) || !is_array($this->NM_ajax_info['errList']['nombre']))
              {
                  $this->NM_ajax_info['errList']['nombre'] = array();
              }
              $this->NM_ajax_info['errList']['nombre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nombre';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nombre

    function ValidateField_correo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->correo = sc_strtolower($this->correo); 
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['correo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['correo'] == "on")) 
      { 
          if ($this->correo == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Correo" ; 
              if (!isset($Campos_Erros['correo']))
              {
                  $Campos_Erros['correo'] = array();
              }
              $Campos_Erros['correo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['correo']) || !is_array($this->NM_ajax_info['errList']['correo']))
                  {
                      $this->NM_ajax_info['errList']['correo'] = array();
                  }
                  $this->NM_ajax_info['errList']['correo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->correo) > 80) 
          { 
              $hasError = true;
              $Campos_Crit .= "Correo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 80 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['correo']))
              {
                  $Campos_Erros['correo'] = array();
              }
              $Campos_Erros['correo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 80 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['correo']) || !is_array($this->NM_ajax_info['errList']['correo']))
              {
                  $this->NM_ajax_info['errList']['correo'] = array();
              }
              $this->NM_ajax_info['errList']['correo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 80 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'correo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_correo

    function ValidateField_telefono(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->telefono = sc_strtoupper($this->telefono); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->telefono) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Telefono " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['telefono']))
              {
                  $Campos_Erros['telefono'] = array();
              }
              $Campos_Erros['telefono'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['telefono']) || !is_array($this->NM_ajax_info['errList']['telefono']))
              {
                  $this->NM_ajax_info['errList']['telefono'] = array();
              }
              $this->NM_ajax_info['errList']['telefono'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "0123456789Ç-";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->telefono ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->telefono, $_SESSION['scriptcase']['charset']); $x++) 
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
              $Campos_Crit .= "Telefono " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['telefono']))
              {
                  $Campos_Erros['telefono'] = array();
              }
              $Campos_Erros['telefono'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['telefono']) || !is_array($this->NM_ajax_info['errList']['telefono']))
              {
                  $this->NM_ajax_info['errList']['telefono'] = array();
              }
              $this->NM_ajax_info['errList']['telefono'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'telefono';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_telefono

    function ValidateField_tercero(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tercero == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['tercero']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['tercero'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Tercero" ; 
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
          if (!empty($this->tercero) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero']) && !in_array($this->tercero, $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['tercero']))
              {
                  $Campos_Erros['tercero'] = array();
              }
              $Campos_Erros['tercero'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['tercero']) || !is_array($this->NM_ajax_info['errList']['tercero']))
              {
                  $this->NM_ajax_info['errList']['tercero'] = array();
              }
              $this->NM_ajax_info['errList']['tercero'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
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

    function ValidateField_resolucion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->resolucion == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['resolucion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['resolucion'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Prefijo" ; 
          if (!isset($Campos_Erros['resolucion']))
          {
              $Campos_Erros['resolucion'] = array();
          }
          $Campos_Erros['resolucion'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['resolucion']) || !is_array($this->NM_ajax_info['errList']['resolucion']))
          {
              $this->NM_ajax_info['errList']['resolucion'] = array();
          }
          $this->NM_ajax_info['errList']['resolucion'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->resolucion) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion']) && !in_array($this->resolucion, $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['resolucion']))
              {
                  $Campos_Erros['resolucion'] = array();
              }
              $Campos_Erros['resolucion'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['resolucion']) || !is_array($this->NM_ajax_info['errList']['resolucion']))
              {
                  $this->NM_ajax_info['errList']['resolucion'] = array();
              }
              $this->NM_ajax_info['errList']['resolucion'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'resolucion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_resolucion

    function ValidateField_grupo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->grupo == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['grupo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['php_cmp_required']['grupo'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Grupo" ; 
          if (!isset($Campos_Erros['grupo']))
          {
              $Campos_Erros['grupo'] = array();
          }
          $Campos_Erros['grupo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['grupo']) || !is_array($this->NM_ajax_info['errList']['grupo']))
          {
              $this->NM_ajax_info['errList']['grupo'] = array();
          }
          $this->NM_ajax_info['errList']['grupo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->grupo) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo']) && !in_array($this->grupo, $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['grupo']))
              {
                  $Campos_Erros['grupo'] = array();
              }
              $Campos_Erros['grupo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['grupo']) || !is_array($this->NM_ajax_info['errList']['grupo']))
              {
                  $this->NM_ajax_info['errList']['grupo'] = array();
              }
              $this->NM_ajax_info['errList']['grupo'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'grupo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_grupo

    function ValidateField_activo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->activo == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->activo = "N";
      } 
      else 
      { 
          if (is_array($this->activo))
          {
              $x = 0; 
              $this->activo_1 = array(); 
              foreach ($this->activo as $ind => $dados_activo_1 ) 
              {
                  if ($dados_activo_1 != "") 
                  {
                      $this->activo_1[] = $dados_activo_1;
                  } 
              } 
              $this->activo = ""; 
              foreach ($this->activo_1 as $dados_activo_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->activo .= ";";
                   } 
                   $this->activo .= $dados_activo_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'activo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_activo

    function ValidateField_grupocomanda(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->grupocomanda) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda']) && !in_array($this->grupocomanda, $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['grupocomanda']))
                   {
                       $Campos_Erros['grupocomanda'] = array();
                   }
                   $Campos_Erros['grupocomanda'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['grupocomanda']) || !is_array($this->NM_ajax_info['errList']['grupocomanda']))
                   {
                       $this->NM_ajax_info['errList']['grupocomanda'] = array();
                   }
                   $this->NM_ajax_info['errList']['grupocomanda'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'grupocomanda';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_grupocomanda

    function ValidateField_banco_movil(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->banco_movil) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil']) && !in_array($this->banco_movil, $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['banco_movil']))
                   {
                       $Campos_Erros['banco_movil'] = array();
                   }
                   $Campos_Erros['banco_movil'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['banco_movil']) || !is_array($this->NM_ajax_info['errList']['banco_movil']))
                   {
                       $this->NM_ajax_info['errList']['banco_movil'] = array();
                   }
                   $this->NM_ajax_info['errList']['banco_movil'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'banco_movil';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_banco_movil

    function ValidateField_idbod(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->idbod) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod']) && !in_array($this->idbod, $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['idbod']))
                   {
                       $Campos_Erros['idbod'] = array();
                   }
                   $Campos_Erros['idbod'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['idbod']) || !is_array($this->NM_ajax_info['errList']['idbod']))
                   {
                       $this->NM_ajax_info['errList']['idbod'] = array();
                   }
                   $this->NM_ajax_info['errList']['idbod'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idbod';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idbod

    function ValidateField_ocultar_bod(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ocultar_bod == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->ocultar_bod != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_ocultar_bod']) && !in_array($this->ocultar_bod, $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_ocultar_bod']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['ocultar_bod']))
              {
                  $Campos_Erros['ocultar_bod'] = array();
              }
              $Campos_Erros['ocultar_bod'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['ocultar_bod']) || !is_array($this->NM_ajax_info['errList']['ocultar_bod']))
              {
                  $this->NM_ajax_info['errList']['ocultar_bod'] = array();
              }
              $this->NM_ajax_info['errList']['ocultar_bod'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ocultar_bod';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ocultar_bod

    function ValidateField_acceso_inventario(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->acceso_inventario == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->acceso_inventario = "NO";
      } 
      else 
      { 
          if (is_array($this->acceso_inventario))
          {
              $x = 0; 
              $this->acceso_inventario_1 = array(); 
              foreach ($this->acceso_inventario as $ind => $dados_acceso_inventario_1 ) 
              {
                  if ($dados_acceso_inventario_1 != "") 
                  {
                      $this->acceso_inventario_1[] = $dados_acceso_inventario_1;
                  } 
              } 
              $this->acceso_inventario = ""; 
              foreach ($this->acceso_inventario_1 as $dados_acceso_inventario_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->acceso_inventario .= ";";
                   } 
                   $this->acceso_inventario .= $dados_acceso_inventario_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'acceso_inventario';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_acceso_inventario

    function ValidateField_acceso_gerencial(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->acceso_gerencial == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->acceso_gerencial = "NO";
      } 
      else 
      { 
          if (is_array($this->acceso_gerencial))
          {
              $x = 0; 
              $this->acceso_gerencial_1 = array(); 
              foreach ($this->acceso_gerencial as $ind => $dados_acceso_gerencial_1 ) 
              {
                  if ($dados_acceso_gerencial_1 != "") 
                  {
                      $this->acceso_gerencial_1[] = $dados_acceso_gerencial_1;
                  } 
              } 
              $this->acceso_gerencial = ""; 
              foreach ($this->acceso_gerencial_1 as $dados_acceso_gerencial_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->acceso_gerencial .= ";";
                   } 
                   $this->acceso_gerencial .= $dados_acceso_gerencial_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'acceso_gerencial';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_acceso_gerencial

    function ValidateField_acceso_restaurante(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->acceso_restaurante == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->acceso_restaurante = "NO";
      } 
      else 
      { 
          if (is_array($this->acceso_restaurante))
          {
              $x = 0; 
              $this->acceso_restaurante_1 = array(); 
              foreach ($this->acceso_restaurante as $ind => $dados_acceso_restaurante_1 ) 
              {
                  if ($dados_acceso_restaurante_1 != "") 
                  {
                      $this->acceso_restaurante_1[] = $dados_acceso_restaurante_1;
                  } 
              } 
              $this->acceso_restaurante = ""; 
              foreach ($this->acceso_restaurante_1 as $dados_acceso_restaurante_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->acceso_restaurante .= ";";
                   } 
                   $this->acceso_restaurante .= $dados_acceso_restaurante_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'acceso_restaurante';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_acceso_restaurante

    function ValidateField_nombre_pc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nombre_pc) > 32) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nombre Pc de Red " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombre_pc']))
              {
                  $Campos_Erros['nombre_pc'] = array();
              }
              $Campos_Erros['nombre_pc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombre_pc']) || !is_array($this->NM_ajax_info['errList']['nombre_pc']))
              {
                  $this->NM_ajax_info['errList']['nombre_pc'] = array();
              }
              $this->NM_ajax_info['errList']['nombre_pc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nombre_pc';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nombre_pc

    function ValidateField_nombre_impre(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nombre_impre) > 32) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nombre Impresora de Red " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombre_impre']))
              {
                  $Campos_Erros['nombre_impre'] = array();
              }
              $Campos_Erros['nombre_impre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombre_impre']) || !is_array($this->NM_ajax_info['errList']['nombre_impre']))
              {
                  $this->NM_ajax_info['errList']['nombre_impre'] = array();
              }
              $this->NM_ajax_info['errList']['nombre_impre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nombre_impre';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nombre_impre

    function ValidateField_ubicacion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->ubicacion) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Ubicación del PC " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ubicacion']))
              {
                  $Campos_Erros['ubicacion'] = array();
              }
              $Campos_Erros['ubicacion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ubicacion']) || !is_array($this->NM_ajax_info['errList']['ubicacion']))
              {
                  $this->NM_ajax_info['errList']['ubicacion'] = array();
              }
              $this->NM_ajax_info['errList']['ubicacion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ubicacion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ubicacion

    function ValidateField_n_equipo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->n_equipo) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nombre del PC " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['n_equipo']))
              {
                  $Campos_Erros['n_equipo'] = array();
              }
              $Campos_Erros['n_equipo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['n_equipo']) || !is_array($this->NM_ajax_info['errList']['n_equipo']))
              {
                  $this->NM_ajax_info['errList']['n_equipo'] = array();
              }
              $this->NM_ajax_info['errList']['n_equipo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'n_equipo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_n_equipo

    function ValidateField_serial(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->serial) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Serial " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['serial']))
              {
                  $Campos_Erros['serial'] = array();
              }
              $Campos_Erros['serial'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['serial']) || !is_array($this->NM_ajax_info['errList']['serial']))
              {
                  $this->NM_ajax_info['errList']['serial'] = array();
              }
              $this->NM_ajax_info['errList']['serial'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "abcdefghijklmnopqrstuvwxyz0123456789 .ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789 .";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->serial ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->serial, $_SESSION['scriptcase']['charset']); $x++) 
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
              $Campos_Crit .= "Serial " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['serial']))
              {
                  $Campos_Erros['serial'] = array();
              }
              $Campos_Erros['serial'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['serial']) || !is_array($this->NM_ajax_info['errList']['serial']))
              {
                  $this->NM_ajax_info['errList']['serial'] = array();
              }
              $this->NM_ajax_info['errList']['serial'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'serial';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_serial

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
    $this->nmgp_dados_form['idusuarios'] = $this->idusuarios;
    $this->nmgp_dados_form['usuario'] = $this->usuario;
    $this->nmgp_dados_form['password'] = $this->password;
    $this->nmgp_dados_form['nombre'] = $this->nombre;
    $this->nmgp_dados_form['correo'] = $this->correo;
    $this->nmgp_dados_form['telefono'] = $this->telefono;
    $this->nmgp_dados_form['tercero'] = $this->tercero;
    $this->nmgp_dados_form['resolucion'] = $this->resolucion;
    $this->nmgp_dados_form['grupo'] = $this->grupo;
    $this->nmgp_dados_form['activo'] = $this->activo;
    $this->nmgp_dados_form['grupocomanda'] = $this->grupocomanda;
    $this->nmgp_dados_form['banco_movil'] = $this->banco_movil;
    $this->nmgp_dados_form['idbod'] = $this->idbod;
    $this->nmgp_dados_form['ocultar_bod'] = $this->ocultar_bod;
    $this->nmgp_dados_form['acceso_inventario'] = $this->acceso_inventario;
    $this->nmgp_dados_form['acceso_gerencial'] = $this->acceso_gerencial;
    $this->nmgp_dados_form['acceso_restaurante'] = $this->acceso_restaurante;
    $this->nmgp_dados_form['nombre_pc'] = $this->nombre_pc;
    $this->nmgp_dados_form['nombre_impre'] = $this->nombre_impre;
    $this->nmgp_dados_form['ubicacion'] = $this->ubicacion;
    $this->nmgp_dados_form['n_equipo'] = $this->n_equipo;
    $this->nmgp_dados_form['serial'] = $this->serial;
    $this->nmgp_dados_form['creacion'] = $this->creacion;
    $this->nmgp_dados_form['ultima_actualizacion'] = $this->ultima_actualizacion;
    $this->nmgp_dados_form['sesion_id'] = $this->sesion_id;
    $this->nmgp_dados_form['sesion_id_movil'] = $this->sesion_id_movil;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['idusuarios'] = $this->idusuarios;
      nm_limpa_numero($this->idusuarios, $this->field_config['idusuarios']['symbol_grp']) ; 
      $this->Before_unformat['creacion'] = $this->creacion;
      $this->Before_unformat['creacion_hora'] = $this->creacion_hora;
      nm_limpa_data($this->creacion, $this->field_config['creacion']['date_sep']) ; 
      nm_limpa_hora($this->creacion_hora, $this->field_config['creacion']['time_sep']) ; 
      $this->Before_unformat['ultima_actualizacion'] = $this->ultima_actualizacion;
      $this->Before_unformat['ultima_actualizacion_hora'] = $this->ultima_actualizacion_hora;
      nm_limpa_data($this->ultima_actualizacion, $this->field_config['ultima_actualizacion']['date_sep']) ; 
      nm_limpa_hora($this->ultima_actualizacion_hora, $this->field_config['ultima_actualizacion']['time_sep']) ; 
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
      if ($Nome_Campo == "idusuarios")
      {
          nm_limpa_numero($this->idusuarios, $this->field_config['idusuarios']['symbol_grp']) ; 
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
      if ('' !== $this->idusuarios || (!empty($format_fields) && isset($format_fields['idusuarios'])))
      {
          nmgp_Form_Num_Val($this->idusuarios, $this->field_config['idusuarios']['symbol_grp'], $this->field_config['idusuarios']['symbol_dec'], "0", "S", $this->field_config['idusuarios']['format_neg'], "", "", "-", $this->field_config['idusuarios']['symbol_fmt']) ; 
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
          $this->ajax_return_values_idusuarios();
          $this->ajax_return_values_usuario();
          $this->ajax_return_values_password();
          $this->ajax_return_values_nombre();
          $this->ajax_return_values_correo();
          $this->ajax_return_values_telefono();
          $this->ajax_return_values_tercero();
          $this->ajax_return_values_resolucion();
          $this->ajax_return_values_grupo();
          $this->ajax_return_values_activo();
          $this->ajax_return_values_grupocomanda();
          $this->ajax_return_values_banco_movil();
          $this->ajax_return_values_idbod();
          $this->ajax_return_values_ocultar_bod();
          $this->ajax_return_values_acceso_inventario();
          $this->ajax_return_values_acceso_gerencial();
          $this->ajax_return_values_acceso_restaurante();
          $this->ajax_return_values_nombre_pc();
          $this->ajax_return_values_nombre_impre();
          $this->ajax_return_values_ubicacion();
          $this->ajax_return_values_n_equipo();
          $this->ajax_return_values_serial();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idusuarios']['keyVal'] = form_usuarios_pack_protect_string($this->nmgp_dados_form['idusuarios']);
          }
   } // ajax_return_values

          //----- idusuarios
   function ajax_return_values_idusuarios($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idusuarios", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idusuarios);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idusuarios'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("idusuarios", $this->form_encode_input($sTmpValue))),
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
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['usuario'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- password
   function ajax_return_values_password($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("password", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->password);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['password'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nombre
   function ajax_return_values_nombre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nombre);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nombre'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- correo
   function ajax_return_values_correo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("correo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->correo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['correo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- telefono
   function ajax_return_values_telefono($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("telefono", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->telefono);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['telefono'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
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

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero'] = array(); 
}
$aLookup[] = array(form_usuarios_pack_protect_string('') => str_replace('<', '&lt;',form_usuarios_pack_protect_string('SELECCIONE')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_idusuarios = $this->idusuarios;
   $this->nm_tira_formatacao();


   $unformatted_value_idusuarios = $this->idusuarios;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + ' --  ' + nombres  FROM terceros  WHERE empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento,' --  ' ,nombres)  FROM terceros  WHERE empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&' --  '&nombres  FROM terceros  WHERE empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||' --  '||nombres  FROM terceros  WHERE empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + ' --  ' + nombres  FROM terceros  WHERE empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||' --  '||nombres  FROM terceros  WHERE empleado='SI' ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||' --  '||nombres  FROM terceros  WHERE empleado='SI' ORDER BY documento, nombres";
   }

   $this->idusuarios = $old_value_idusuarios;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_usuarios_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_usuarios_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero'][] = $rs->fields[0];
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
          $sSelComp = "name=\"tercero\"";
          if (isset($this->NM_ajax_info['select_html']['tercero']) && !empty($this->NM_ajax_info['select_html']['tercero']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['tercero']);
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

                  if ($this->tercero == $sValue)
                  {
                      $this->_tmp_lookup_tercero = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tercero'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tercero']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tercero']['valList'][$i] = form_usuarios_pack_protect_string($v);
          }
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
          }
   }

          //----- resolucion
   function ajax_return_values_resolucion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("resolucion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->resolucion);
              $aLookup = array();
              $this->_tmp_lookup_resolucion = $this->resolucion;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_idusuarios = $this->idusuarios;
   $this->nm_tira_formatacao();


   $unformatted_value_idusuarios = $this->idusuarios;

   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_inventario_val_str = "''";
   if (!empty($this->acceso_inventario))
   {
       if (is_array($this->acceso_inventario))
       {
           $Tmp_array = $this->acceso_inventario;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_inventario);
       }
       $acceso_inventario_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_inventario_val_str)
          {
             $acceso_inventario_val_str .= ", ";
          }
          $acceso_inventario_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_gerencial_val_str = "''";
   if (!empty($this->acceso_gerencial))
   {
       if (is_array($this->acceso_gerencial))
       {
           $Tmp_array = $this->acceso_gerencial;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_gerencial);
       }
       $acceso_gerencial_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_gerencial_val_str)
          {
             $acceso_gerencial_val_str .= ", ";
          }
          $acceso_gerencial_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_restaurante_val_str = "''";
   if (!empty($this->acceso_restaurante))
   {
       if (is_array($this->acceso_restaurante))
       {
           $Tmp_array = $this->acceso_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_restaurante);
       }
       $acceso_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_restaurante_val_str)
          {
             $acceso_restaurante_val_str .= ", ";
          }
          $acceso_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT Idres, prefijo  FROM resdian  ORDER BY prefijo";

   $this->idusuarios = $old_value_idusuarios;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_usuarios_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_usuarios_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion'][] = $rs->fields[0];
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
          $sSelComp = "name=\"resolucion\"";
          if (isset($this->NM_ajax_info['select_html']['resolucion']) && !empty($this->NM_ajax_info['select_html']['resolucion']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['resolucion']);
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

                  if ($this->resolucion == $sValue)
                  {
                      $this->_tmp_lookup_resolucion = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['resolucion'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['resolucion']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['resolucion']['valList'][$i] = form_usuarios_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['resolucion']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['resolucion']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['resolucion']['labList'] = $aLabel;
          }
   }

          //----- grupo
   function ajax_return_values_grupo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("grupo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->grupo);
              $aLookup = array();
              $this->_tmp_lookup_grupo = $this->grupo;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo'] = array(); 
}
$aLookup[] = array(form_usuarios_pack_protect_string('') => str_replace('<', '&lt;',form_usuarios_pack_protect_string('SELECCIONE')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_idusuarios = $this->idusuarios;
   $this->nm_tira_formatacao();


   $unformatted_value_idusuarios = $this->idusuarios;

   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_inventario_val_str = "''";
   if (!empty($this->acceso_inventario))
   {
       if (is_array($this->acceso_inventario))
       {
           $Tmp_array = $this->acceso_inventario;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_inventario);
       }
       $acceso_inventario_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_inventario_val_str)
          {
             $acceso_inventario_val_str .= ", ";
          }
          $acceso_inventario_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_gerencial_val_str = "''";
   if (!empty($this->acceso_gerencial))
   {
       if (is_array($this->acceso_gerencial))
       {
           $Tmp_array = $this->acceso_gerencial;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_gerencial);
       }
       $acceso_gerencial_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_gerencial_val_str)
          {
             $acceso_gerencial_val_str .= ", ";
          }
          $acceso_gerencial_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_restaurante_val_str = "''";
   if (!empty($this->acceso_restaurante))
   {
       if (is_array($this->acceso_restaurante))
       {
           $Tmp_array = $this->acceso_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_restaurante);
       }
       $acceso_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_restaurante_val_str)
          {
             $acceso_restaurante_val_str .= ", ";
          }
          $acceso_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idusuarios_grupos, descripcion  FROM usuarios_grupos  ORDER BY descripcion";

   $this->idusuarios = $old_value_idusuarios;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_usuarios_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_usuarios_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo'][] = $rs->fields[0];
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
          $sSelComp = "name=\"grupo\"";
          if (isset($this->NM_ajax_info['select_html']['grupo']) && !empty($this->NM_ajax_info['select_html']['grupo']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['grupo']);
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

                  if ($this->grupo == $sValue)
                  {
                      $this->_tmp_lookup_grupo = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['grupo'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['grupo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['grupo']['valList'][$i] = form_usuarios_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['grupo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['grupo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['grupo']['labList'] = $aLabel;
          }
   }

          //----- activo
   function ajax_return_values_activo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("activo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->activo);
              $aLookup = array();
              $this->_tmp_lookup_activo = $this->activo;

$aLookup[] = array(form_usuarios_pack_protect_string('S') => str_replace('<', '&lt;',form_usuarios_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_activo'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['activo']) && !empty($this->NM_ajax_info['select_html']['activo']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['activo']);
          }
          $this->NM_ajax_info['fldList']['activo'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-activo',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['activo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['activo']['valList'][$i] = form_usuarios_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['activo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['activo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['activo']['labList'] = $aLabel;
          }
   }

          //----- grupocomanda
   function ajax_return_values_grupocomanda($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("grupocomanda", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->grupocomanda);
              $aLookup = array();
              $this->_tmp_lookup_grupocomanda = $this->grupocomanda;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda'] = array(); 
}
$aLookup[] = array(form_usuarios_pack_protect_string('') => str_replace('<', '&lt;',form_usuarios_pack_protect_string('SELECCIONE')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_idusuarios = $this->idusuarios;
   $this->nm_tira_formatacao();


   $unformatted_value_idusuarios = $this->idusuarios;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idgrupo, codigogru + ' -- ' + nomgrupo  FROM grupo  WHERE  idgrupo <> 1 ORDER BY codigogru, nomgrupo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idgrupo, concat(codigogru,' -- ',nomgrupo)  FROM grupo  WHERE  idgrupo <> 1 ORDER BY codigogru, nomgrupo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idgrupo, codigogru&' -- '&nomgrupo  FROM grupo  WHERE  idgrupo <> 1 ORDER BY codigogru, nomgrupo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idgrupo, codigogru||' -- '||nomgrupo  FROM grupo  WHERE  idgrupo <> 1 ORDER BY codigogru, nomgrupo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idgrupo, codigogru + ' -- ' + nomgrupo  FROM grupo  WHERE  idgrupo <> 1 ORDER BY codigogru, nomgrupo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idgrupo, codigogru||' -- '||nomgrupo  FROM grupo  WHERE  idgrupo <> 1 ORDER BY codigogru, nomgrupo";
   }
   else
   {
       $nm_comando = "SELECT idgrupo, codigogru||' -- '||nomgrupo  FROM grupo  WHERE  idgrupo <> 1 ORDER BY codigogru, nomgrupo";
   }

   $this->idusuarios = $old_value_idusuarios;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_usuarios_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_usuarios_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda'][] = $rs->fields[0];
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
          $sSelComp = "name=\"grupocomanda\"";
          if (isset($this->NM_ajax_info['select_html']['grupocomanda']) && !empty($this->NM_ajax_info['select_html']['grupocomanda']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['grupocomanda']);
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

                  if ($this->grupocomanda == $sValue)
                  {
                      $this->_tmp_lookup_grupocomanda = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['grupocomanda'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['grupocomanda']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['grupocomanda']['valList'][$i] = form_usuarios_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['grupocomanda']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['grupocomanda']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['grupocomanda']['labList'] = $aLabel;
          }
   }

          //----- banco_movil
   function ajax_return_values_banco_movil($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("banco_movil", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->banco_movil);
              $aLookup = array();
              $this->_tmp_lookup_banco_movil = $this->banco_movil;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_idusuarios = $this->idusuarios;
   $this->nm_tira_formatacao();


   $unformatted_value_idusuarios = $this->idusuarios;

   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_inventario_val_str = "''";
   if (!empty($this->acceso_inventario))
   {
       if (is_array($this->acceso_inventario))
       {
           $Tmp_array = $this->acceso_inventario;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_inventario);
       }
       $acceso_inventario_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_inventario_val_str)
          {
             $acceso_inventario_val_str .= ", ";
          }
          $acceso_inventario_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_gerencial_val_str = "''";
   if (!empty($this->acceso_gerencial))
   {
       if (is_array($this->acceso_gerencial))
       {
           $Tmp_array = $this->acceso_gerencial;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_gerencial);
       }
       $acceso_gerencial_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_gerencial_val_str)
          {
             $acceso_gerencial_val_str .= ", ";
          }
          $acceso_gerencial_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_restaurante_val_str = "''";
   if (!empty($this->acceso_restaurante))
   {
       if (is_array($this->acceso_restaurante))
       {
           $Tmp_array = $this->acceso_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_restaurante);
       }
       $acceso_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_restaurante_val_str)
          {
             $acceso_restaurante_val_str .= ", ";
          }
          $acceso_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idcaja_vta, codigo_banco  FROM bancos  ORDER BY codigo_banco";

   $this->idusuarios = $old_value_idusuarios;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_usuarios_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_usuarios_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil'][] = $rs->fields[0];
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
          $sSelComp = "name=\"banco_movil\"";
          if (isset($this->NM_ajax_info['select_html']['banco_movil']) && !empty($this->NM_ajax_info['select_html']['banco_movil']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['banco_movil']);
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

                  if ($this->banco_movil == $sValue)
                  {
                      $this->_tmp_lookup_banco_movil = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['banco_movil'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['banco_movil']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['banco_movil']['valList'][$i] = form_usuarios_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['banco_movil']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['banco_movil']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['banco_movil']['labList'] = $aLabel;
          }
   }

          //----- idbod
   function ajax_return_values_idbod($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idbod", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idbod);
              $aLookup = array();
              $this->_tmp_lookup_idbod = $this->idbod;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod'] = array(); 
}
$aLookup[] = array(form_usuarios_pack_protect_string('0') => str_replace('<', '&lt;',form_usuarios_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod'][] = '0';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_idusuarios = $this->idusuarios;
   $this->nm_tira_formatacao();


   $unformatted_value_idusuarios = $this->idusuarios;

   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_inventario_val_str = "''";
   if (!empty($this->acceso_inventario))
   {
       if (is_array($this->acceso_inventario))
       {
           $Tmp_array = $this->acceso_inventario;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_inventario);
       }
       $acceso_inventario_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_inventario_val_str)
          {
             $acceso_inventario_val_str .= ", ";
          }
          $acceso_inventario_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_gerencial_val_str = "''";
   if (!empty($this->acceso_gerencial))
   {
       if (is_array($this->acceso_gerencial))
       {
           $Tmp_array = $this->acceso_gerencial;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_gerencial);
       }
       $acceso_gerencial_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_gerencial_val_str)
          {
             $acceso_gerencial_val_str .= ", ";
          }
          $acceso_gerencial_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_restaurante_val_str = "''";
   if (!empty($this->acceso_restaurante))
   {
       if (is_array($this->acceso_restaurante))
       {
           $Tmp_array = $this->acceso_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_restaurante);
       }
       $acceso_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_restaurante_val_str)
          {
             $acceso_restaurante_val_str .= ", ";
          }
          $acceso_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idbodega, bodega  FROM bodegas  ORDER BY bodega";

   $this->idusuarios = $old_value_idusuarios;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_usuarios_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_usuarios_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod'][] = $rs->fields[0];
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
          $sSelComp = "name=\"idbod\"";
          if (isset($this->NM_ajax_info['select_html']['idbod']) && !empty($this->NM_ajax_info['select_html']['idbod']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['idbod']);
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

                  if ($this->idbod == $sValue)
                  {
                      $this->_tmp_lookup_idbod = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['idbod'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idbod']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idbod']['valList'][$i] = form_usuarios_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idbod']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idbod']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idbod']['labList'] = $aLabel;
          }
   }

          //----- ocultar_bod
   function ajax_return_values_ocultar_bod($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ocultar_bod", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ocultar_bod);
              $aLookup = array();
              $this->_tmp_lookup_ocultar_bod = $this->ocultar_bod;

$aLookup[] = array(form_usuarios_pack_protect_string('SI') => str_replace('<', '&lt;',form_usuarios_pack_protect_string("MOSTRAR")));
$aLookup[] = array(form_usuarios_pack_protect_string('NO') => str_replace('<', '&lt;',form_usuarios_pack_protect_string("NO MOSTRAR")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_ocultar_bod'][] = 'SI';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_ocultar_bod'][] = 'NO';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ocultar_bod']) && !empty($this->NM_ajax_info['select_html']['ocultar_bod']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ocultar_bod']);
          }
          $this->NM_ajax_info['fldList']['ocultar_bod'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ocultar_bod']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ocultar_bod']['valList'][$i] = form_usuarios_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ocultar_bod']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ocultar_bod']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ocultar_bod']['labList'] = $aLabel;
          }
   }

          //----- acceso_inventario
   function ajax_return_values_acceso_inventario($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("acceso_inventario", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->acceso_inventario);
              $aLookup = array();
              $this->_tmp_lookup_acceso_inventario = $this->acceso_inventario;

$aLookup[] = array(form_usuarios_pack_protect_string('SI') => str_replace('<', '&lt;',form_usuarios_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_acceso_inventario'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['acceso_inventario']) && !empty($this->NM_ajax_info['select_html']['acceso_inventario']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['acceso_inventario']);
          }
          $this->NM_ajax_info['fldList']['acceso_inventario'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-acceso_inventario',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['acceso_inventario']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['acceso_inventario']['valList'][$i] = form_usuarios_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['acceso_inventario']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['acceso_inventario']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['acceso_inventario']['labList'] = $aLabel;
          }
   }

          //----- acceso_gerencial
   function ajax_return_values_acceso_gerencial($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("acceso_gerencial", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->acceso_gerencial);
              $aLookup = array();
              $this->_tmp_lookup_acceso_gerencial = $this->acceso_gerencial;

$aLookup[] = array(form_usuarios_pack_protect_string('SI') => str_replace('<', '&lt;',form_usuarios_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_acceso_gerencial'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['acceso_gerencial']) && !empty($this->NM_ajax_info['select_html']['acceso_gerencial']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['acceso_gerencial']);
          }
          $this->NM_ajax_info['fldList']['acceso_gerencial'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-acceso_gerencial',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['acceso_gerencial']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['acceso_gerencial']['valList'][$i] = form_usuarios_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['acceso_gerencial']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['acceso_gerencial']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['acceso_gerencial']['labList'] = $aLabel;
          }
   }

          //----- acceso_restaurante
   function ajax_return_values_acceso_restaurante($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("acceso_restaurante", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->acceso_restaurante);
              $aLookup = array();
              $this->_tmp_lookup_acceso_restaurante = $this->acceso_restaurante;

$aLookup[] = array(form_usuarios_pack_protect_string('SI') => str_replace('<', '&lt;',form_usuarios_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_acceso_restaurante'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['acceso_restaurante']) && !empty($this->NM_ajax_info['select_html']['acceso_restaurante']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['acceso_restaurante']);
          }
          $this->NM_ajax_info['fldList']['acceso_restaurante'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-acceso_restaurante',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['acceso_restaurante']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['acceso_restaurante']['valList'][$i] = form_usuarios_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['acceso_restaurante']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['acceso_restaurante']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['acceso_restaurante']['labList'] = $aLabel;
          }
   }

          //----- nombre_pc
   function ajax_return_values_nombre_pc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombre_pc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nombre_pc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nombre_pc'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nombre_impre
   function ajax_return_values_nombre_impre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombre_impre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nombre_impre);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nombre_impre'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- ubicacion
   function ajax_return_values_ubicacion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ubicacion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ubicacion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ubicacion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- n_equipo
   function ajax_return_values_n_equipo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("n_equipo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->n_equipo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['n_equipo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- serial
   function ajax_return_values_serial($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("serial", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->serial);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['serial'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['upload_dir'][$fieldName][] = $newName;
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
      $_SESSION['scriptcase']['form_usuarios']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_usuario = $this->usuario;
}
  if($this->usuario =="admin"){
	
	$this->sc_ajax_javascript('nm_field_disabled', array("grupo=disabled", ""));
;
	
	$this->sc_ajax_javascript('nm_field_disabled', array("usuario=disabled", ""));
;
	
	$this->sc_ajax_javascript('nm_field_disabled', array("activo=disabled", ""));
;
	
	$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_usuario != $this->usuario || (isset($bFlagRead_usuario) && $bFlagRead_usuario)))
    {
        $this->ajax_return_values_usuario(true);
    }
}
$_SESSION['scriptcase']['form_usuarios']['contr_erro'] = 'off'; 
      }
      if (empty($this->creacion))
      {
          $this->creacion_hora = $this->creacion;
      }
      if (empty($this->ultima_actualizacion))
      {
          $this->ultima_actualizacion_hora = $this->ultima_actualizacion;
      }
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//----------- 

   function return_after_insert()
   {
      global $sc_where;
      $sc_where_pos = " WHERE ((idusuarios < $this->idusuarios))";
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
      if ('' != $this->idusuarios)
      {
          $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count;
          $rsc = $this->Db->Execute($nmgp_sel_count);
          if ($rsc === false && !$rsc->EOF)
          {
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
              exit;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start'] = $rsc->fields[0];
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
      $_SESSION['scriptcase']['form_usuarios']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_usuario = $this->usuario;
}
  $vusu1 = $this->usuario ;
$vusu2 = strtoupper($vusu1);
 
      $nm_select = "select usuario from usuarios where usuario='".$vusu1."' or usuario='".$vusu2."'"; 
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
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Nombre de usuario ya existente!!!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_form_usuarios';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_usuarios';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "Nombre de usuario ya existente!!!";
 }
;
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_usuario != $this->usuario || (isset($bFlagRead_usuario) && $bFlagRead_usuario)))
    {
        $this->ajax_return_values_usuario(true);
    }
}
$_SESSION['scriptcase']['form_usuarios']['contr_erro'] = 'off'; 
    }
    if ("alterar" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_usuarios']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_idusuarios = $this->idusuarios;
    $original_usuario = $this->usuario;
}
  $vusu1  = $this->usuario ;
$vusu2  = strtoupper($vusu1);
$vidusu = $this->idusuarios ;

 
      $nm_select = "select usuario from usuarios where (usuario='".$vusu1."' or usuario='".$vusu2."') and idusuarios <> '".$vidusu."'"; 
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
	 
      $nm_select = "select usuario from usuarios where idusuarios='".$vidusu."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vN = array();
      $this->vn = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vN[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vn[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vN = false;
          $this->vN_erro = $this->Db->ErrorMsg();
          $this->vn = false;
          $this->vn_erro = $this->Db->ErrorMsg();
      } 
;
	
	if(isset($this->vn[0][0]))
	{
		$this->usuario  = $this->vn[0][0];
		
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Nombre de usuario: $vusu2 ya existente!!!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_form_usuarios';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_usuarios';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "Nombre de usuario: $vusu2 ya existente!!!";
 }
;
	}
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_idusuarios != $this->idusuarios || (isset($bFlagRead_idusuarios) && $bFlagRead_idusuarios)))
    {
        $this->ajax_return_values_idusuarios(true);
    }
    if (($original_usuario != $this->usuario || (isset($bFlagRead_usuario) && $bFlagRead_usuario)))
    {
        $this->ajax_return_values_usuario(true);
    }
}
$_SESSION['scriptcase']['form_usuarios']['contr_erro'] = 'off'; 
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
      $NM_val_form['idusuarios'] = $this->idusuarios;
      $NM_val_form['usuario'] = $this->usuario;
      $NM_val_form['password'] = $this->password;
      $NM_val_form['nombre'] = $this->nombre;
      $NM_val_form['correo'] = $this->correo;
      $NM_val_form['telefono'] = $this->telefono;
      $NM_val_form['tercero'] = $this->tercero;
      $NM_val_form['resolucion'] = $this->resolucion;
      $NM_val_form['grupo'] = $this->grupo;
      $NM_val_form['activo'] = $this->activo;
      $NM_val_form['grupocomanda'] = $this->grupocomanda;
      $NM_val_form['banco_movil'] = $this->banco_movil;
      $NM_val_form['idbod'] = $this->idbod;
      $NM_val_form['ocultar_bod'] = $this->ocultar_bod;
      $NM_val_form['acceso_inventario'] = $this->acceso_inventario;
      $NM_val_form['acceso_gerencial'] = $this->acceso_gerencial;
      $NM_val_form['acceso_restaurante'] = $this->acceso_restaurante;
      $NM_val_form['nombre_pc'] = $this->nombre_pc;
      $NM_val_form['nombre_impre'] = $this->nombre_impre;
      $NM_val_form['ubicacion'] = $this->ubicacion;
      $NM_val_form['n_equipo'] = $this->n_equipo;
      $NM_val_form['serial'] = $this->serial;
      $NM_val_form['creacion'] = $this->creacion;
      $NM_val_form['ultima_actualizacion'] = $this->ultima_actualizacion;
      $NM_val_form['sesion_id'] = $this->sesion_id;
      $NM_val_form['sesion_id_movil'] = $this->sesion_id_movil;
      if ($this->idusuarios === "" || is_null($this->idusuarios))  
      { 
          $this->idusuarios = 0;
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->tercero === "" || is_null($this->tercero))  
      { 
          $this->tercero = 0;
          $this->sc_force_zero[] = 'tercero';
      } 
      if ($this->resolucion === "" || is_null($this->resolucion))  
      { 
          $this->resolucion = 0;
          $this->sc_force_zero[] = 'resolucion';
      } 
      if ($this->grupo === "" || is_null($this->grupo))  
      { 
          $this->grupo = 0;
          $this->sc_force_zero[] = 'grupo';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->grupocomanda === "" || is_null($this->grupocomanda))  
      { 
          $this->grupocomanda = 0;
          $this->sc_force_zero[] = 'grupocomanda';
      } 
      if ($this->banco_movil === "" || is_null($this->banco_movil))  
      { 
          $this->banco_movil = 0;
          $this->sc_force_zero[] = 'banco_movil';
      } 
      if ($this->idbod === "" || is_null($this->idbod))  
      { 
          $this->idbod = 0;
          $this->sc_force_zero[] = 'idbod';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->creacion == "")  
              { 
                  $this->creacion = "null"; 
                  $NM_val_null[] = "creacion";
              } 
              if ($this->creacion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->creacion = "null"; 
                  $NM_val_null[] = "creacion";
              } 
          }
          $this->usuario_before_qstr = $this->usuario;
          $this->usuario = substr($this->Db->qstr($this->usuario), 1, -1); 
          if ($this->usuario == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->usuario = "null"; 
              $NM_val_null[] = "usuario";
          } 
          $this->password_before_qstr = $this->password;
          $this->password = substr($this->Db->qstr($this->password), 1, -1); 
          if ($this->password == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->password = "null"; 
              $NM_val_null[] = "password";
          } 
          $this->nombre_before_qstr = $this->nombre;
          $this->nombre = substr($this->Db->qstr($this->nombre), 1, -1); 
          if ($this->nombre == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombre = "null"; 
              $NM_val_null[] = "nombre";
          } 
          $this->correo_before_qstr = $this->correo;
          $this->correo = substr($this->Db->qstr($this->correo), 1, -1); 
          if ($this->correo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->correo = "null"; 
              $NM_val_null[] = "correo";
          } 
          $this->telefono_before_qstr = $this->telefono;
          $this->telefono = substr($this->Db->qstr($this->telefono), 1, -1); 
          if ($this->telefono == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->telefono = "null"; 
              $NM_val_null[] = "telefono";
          } 
          $this->activo_before_qstr = $this->activo;
          $this->activo = substr($this->Db->qstr($this->activo), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->activo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->activo = "null"; 
                  $NM_val_null[] = "activo";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->ultima_actualizacion == "")  
              { 
                  $this->ultima_actualizacion = "null"; 
                  $NM_val_null[] = "ultima_actualizacion";
              } 
              if ($this->ultima_actualizacion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->ultima_actualizacion = "null"; 
                  $NM_val_null[] = "ultima_actualizacion";
              } 
          }
          $this->nombre_pc_before_qstr = $this->nombre_pc;
          $this->nombre_pc = substr($this->Db->qstr($this->nombre_pc), 1, -1); 
          if ($this->nombre_pc == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombre_pc = "null"; 
              $NM_val_null[] = "nombre_pc";
          } 
          $this->nombre_impre_before_qstr = $this->nombre_impre;
          $this->nombre_impre = substr($this->Db->qstr($this->nombre_impre), 1, -1); 
          if ($this->nombre_impre == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombre_impre = "null"; 
              $NM_val_null[] = "nombre_impre";
          } 
          $this->sesion_id_before_qstr = $this->sesion_id;
          $this->sesion_id = substr($this->Db->qstr($this->sesion_id), 1, -1); 
          if ($this->sesion_id == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sesion_id = "null"; 
              $NM_val_null[] = "sesion_id";
          } 
          if ($this->acceso_inventario == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->acceso_inventario = "null"; 
              $NM_val_null[] = "acceso_inventario";
          } 
          if ($this->acceso_gerencial == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->acceso_gerencial = "null"; 
              $NM_val_null[] = "acceso_gerencial";
          } 
          if ($this->acceso_restaurante == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->acceso_restaurante = "null"; 
              $NM_val_null[] = "acceso_restaurante";
          } 
          $this->sesion_id_movil_before_qstr = $this->sesion_id_movil;
          $this->sesion_id_movil = substr($this->Db->qstr($this->sesion_id_movil), 1, -1); 
          if ($this->sesion_id_movil == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sesion_id_movil = "null"; 
              $NM_val_null[] = "sesion_id_movil";
          } 
          $this->ubicacion_before_qstr = $this->ubicacion;
          $this->ubicacion = substr($this->Db->qstr($this->ubicacion), 1, -1); 
          if ($this->ubicacion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ubicacion = "null"; 
              $NM_val_null[] = "ubicacion";
          } 
          $this->n_equipo_before_qstr = $this->n_equipo;
          $this->n_equipo = substr($this->Db->qstr($this->n_equipo), 1, -1); 
          if ($this->n_equipo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->n_equipo = "null"; 
              $NM_val_null[] = "n_equipo";
          } 
          $this->serial_before_qstr = $this->serial;
          $this->serial = substr($this->Db->qstr($this->serial), 1, -1); 
          if ($this->serial == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->serial = "null"; 
              $NM_val_null[] = "serial";
          } 
          if ($this->ocultar_bod == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ocultar_bod = "null"; 
              $NM_val_null[] = "ocultar_bod";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_usuarios_pack_ajax_response();
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
                  $SC_fields_update[] = "usuario = '$this->usuario', password = '$this->password', nombre = '$this->nombre', correo = '$this->correo', telefono = '$this->telefono', tercero = $this->tercero, resolucion = $this->resolucion, grupo = $this->grupo, activo = '$this->activo', grupocomanda = $this->grupocomanda, nombre_pc = '$this->nombre_pc', nombre_impre = '$this->nombre_impre', acceso_inventario = '$this->acceso_inventario', acceso_gerencial = '$this->acceso_gerencial', acceso_restaurante = '$this->acceso_restaurante', banco_movil = $this->banco_movil, ubicacion = '$this->ubicacion', n_equipo = '$this->n_equipo', serial = '$this->serial', idbod = $this->idbod, ocultar_bod = '$this->ocultar_bod'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "usuario = '$this->usuario', password = '$this->password', nombre = '$this->nombre', correo = '$this->correo', telefono = '$this->telefono', tercero = $this->tercero, resolucion = $this->resolucion, grupo = $this->grupo, activo = '$this->activo', grupocomanda = $this->grupocomanda, nombre_pc = '$this->nombre_pc', nombre_impre = '$this->nombre_impre', acceso_inventario = '$this->acceso_inventario', acceso_gerencial = '$this->acceso_gerencial', acceso_restaurante = '$this->acceso_restaurante', banco_movil = $this->banco_movil, ubicacion = '$this->ubicacion', n_equipo = '$this->n_equipo', serial = '$this->serial', idbod = $this->idbod, ocultar_bod = '$this->ocultar_bod'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "usuario = '$this->usuario', password = '$this->password', nombre = '$this->nombre', correo = '$this->correo', telefono = '$this->telefono', tercero = $this->tercero, resolucion = $this->resolucion, grupo = $this->grupo, activo = '$this->activo', grupocomanda = $this->grupocomanda, nombre_pc = '$this->nombre_pc', nombre_impre = '$this->nombre_impre', acceso_inventario = '$this->acceso_inventario', acceso_gerencial = '$this->acceso_gerencial', acceso_restaurante = '$this->acceso_restaurante', banco_movil = $this->banco_movil, ubicacion = '$this->ubicacion', n_equipo = '$this->n_equipo', serial = '$this->serial', idbod = $this->idbod, ocultar_bod = '$this->ocultar_bod'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "usuario = '$this->usuario', password = '$this->password', nombre = '$this->nombre', correo = '$this->correo', telefono = '$this->telefono', tercero = $this->tercero, resolucion = $this->resolucion, grupo = $this->grupo, activo = '$this->activo', grupocomanda = $this->grupocomanda, nombre_pc = '$this->nombre_pc', nombre_impre = '$this->nombre_impre', acceso_inventario = '$this->acceso_inventario', acceso_gerencial = '$this->acceso_gerencial', acceso_restaurante = '$this->acceso_restaurante', banco_movil = $this->banco_movil, ubicacion = '$this->ubicacion', n_equipo = '$this->n_equipo', serial = '$this->serial', idbod = $this->idbod, ocultar_bod = '$this->ocultar_bod'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "usuario = '$this->usuario', password = '$this->password', nombre = '$this->nombre', correo = '$this->correo', telefono = '$this->telefono', tercero = $this->tercero, resolucion = $this->resolucion, grupo = $this->grupo, activo = '$this->activo', grupocomanda = $this->grupocomanda, nombre_pc = '$this->nombre_pc', nombre_impre = '$this->nombre_impre', acceso_inventario = '$this->acceso_inventario', acceso_gerencial = '$this->acceso_gerencial', acceso_restaurante = '$this->acceso_restaurante', banco_movil = $this->banco_movil, ubicacion = '$this->ubicacion', n_equipo = '$this->n_equipo', serial = '$this->serial', idbod = $this->idbod, ocultar_bod = '$this->ocultar_bod'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "usuario = '$this->usuario', password = '$this->password', nombre = '$this->nombre', correo = '$this->correo', telefono = '$this->telefono', tercero = $this->tercero, resolucion = $this->resolucion, grupo = $this->grupo, activo = '$this->activo', grupocomanda = $this->grupocomanda, nombre_pc = '$this->nombre_pc', nombre_impre = '$this->nombre_impre', acceso_inventario = '$this->acceso_inventario', acceso_gerencial = '$this->acceso_gerencial', acceso_restaurante = '$this->acceso_restaurante', banco_movil = $this->banco_movil, ubicacion = '$this->ubicacion', n_equipo = '$this->n_equipo', serial = '$this->serial', idbod = $this->idbod, ocultar_bod = '$this->ocultar_bod'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "usuario = '$this->usuario', password = '$this->password', nombre = '$this->nombre', correo = '$this->correo', telefono = '$this->telefono', tercero = $this->tercero, resolucion = $this->resolucion, grupo = $this->grupo, activo = '$this->activo', grupocomanda = $this->grupocomanda, nombre_pc = '$this->nombre_pc', nombre_impre = '$this->nombre_impre', acceso_inventario = '$this->acceso_inventario', acceso_gerencial = '$this->acceso_gerencial', acceso_restaurante = '$this->acceso_restaurante', banco_movil = $this->banco_movil, ubicacion = '$this->ubicacion', n_equipo = '$this->n_equipo', serial = '$this->serial', idbod = $this->idbod, ocultar_bod = '$this->ocultar_bod'"; 
              } 
              if (isset($NM_val_form['creacion']) && $NM_val_form['creacion'] != $this->nmgp_dados_select['creacion']) 
              { 
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  { 
                      $SC_fields_update[] = "creacion = TO_DATE('$this->creacion', 'yyyy-mm-dd hh24:mi:ss')"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "creacion = '$this->creacion'"; 
                  } 
              } 
              if (isset($NM_val_form['ultima_actualizacion']) && $NM_val_form['ultima_actualizacion'] != $this->nmgp_dados_select['ultima_actualizacion']) 
              { 
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  { 
                      $SC_fields_update[] = "ultima_actualizacion = TO_DATE('$this->ultima_actualizacion', 'yyyy-mm-dd hh24:mi:ss')"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "ultima_actualizacion = '$this->ultima_actualizacion'"; 
                  } 
              } 
              if (isset($NM_val_form['sesion_id']) && $NM_val_form['sesion_id'] != $this->nmgp_dados_select['sesion_id']) 
              { 
                  $SC_fields_update[] = "sesion_id = '$this->sesion_id'"; 
              } 
              if (isset($NM_val_form['sesion_id_movil']) && $NM_val_form['sesion_id_movil'] != $this->nmgp_dados_select['sesion_id_movil']) 
              { 
                  $SC_fields_update[] = "sesion_id_movil = '$this->sesion_id_movil'"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE idusuarios = $this->idusuarios ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE idusuarios = $this->idusuarios ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE idusuarios = $this->idusuarios ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE idusuarios = $this->idusuarios ";  
              }  
              else  
              {
                  $comando .= " WHERE idusuarios = $this->idusuarios ";  
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
                                  form_usuarios_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->usuario = $this->usuario_before_qstr;
              $this->password = $this->password_before_qstr;
              $this->nombre = $this->nombre_before_qstr;
              $this->correo = $this->correo_before_qstr;
              $this->telefono = $this->telefono_before_qstr;
              $this->activo = $this->activo_before_qstr;
              $this->nombre_pc = $this->nombre_pc_before_qstr;
              $this->nombre_impre = $this->nombre_impre_before_qstr;
              $this->sesion_id = $this->sesion_id_before_qstr;
              $this->sesion_id_movil = $this->sesion_id_movil_before_qstr;
              $this->ubicacion = $this->ubicacion_before_qstr;
              $this->n_equipo = $this->n_equipo_before_qstr;
              $this->serial = $this->serial_before_qstr;
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['idusuarios'])) { $this->idusuarios = $NM_val_form['idusuarios']; }
              elseif (isset($this->idusuarios)) { $this->nm_limpa_alfa($this->idusuarios); }
              if     (isset($NM_val_form) && isset($NM_val_form['usuario'])) { $this->usuario = $NM_val_form['usuario']; }
              elseif (isset($this->usuario)) { $this->nm_limpa_alfa($this->usuario); }
              if     (isset($NM_val_form) && isset($NM_val_form['password'])) { $this->password = $NM_val_form['password']; }
              elseif (isset($this->password)) { $this->nm_limpa_alfa($this->password); }
              if     (isset($NM_val_form) && isset($NM_val_form['nombre'])) { $this->nombre = $NM_val_form['nombre']; }
              elseif (isset($this->nombre)) { $this->nm_limpa_alfa($this->nombre); }
              if     (isset($NM_val_form) && isset($NM_val_form['correo'])) { $this->correo = $NM_val_form['correo']; }
              elseif (isset($this->correo)) { $this->nm_limpa_alfa($this->correo); }
              if     (isset($NM_val_form) && isset($NM_val_form['telefono'])) { $this->telefono = $NM_val_form['telefono']; }
              elseif (isset($this->telefono)) { $this->nm_limpa_alfa($this->telefono); }
              if     (isset($NM_val_form) && isset($NM_val_form['tercero'])) { $this->tercero = $NM_val_form['tercero']; }
              elseif (isset($this->tercero)) { $this->nm_limpa_alfa($this->tercero); }
              if     (isset($NM_val_form) && isset($NM_val_form['resolucion'])) { $this->resolucion = $NM_val_form['resolucion']; }
              elseif (isset($this->resolucion)) { $this->nm_limpa_alfa($this->resolucion); }
              if     (isset($NM_val_form) && isset($NM_val_form['grupo'])) { $this->grupo = $NM_val_form['grupo']; }
              elseif (isset($this->grupo)) { $this->nm_limpa_alfa($this->grupo); }
              if     (isset($NM_val_form) && isset($NM_val_form['activo'])) { $this->activo = $NM_val_form['activo']; }
              elseif (isset($this->activo)) { $this->nm_limpa_alfa($this->activo); }
              if     (isset($NM_val_form) && isset($NM_val_form['grupocomanda'])) { $this->grupocomanda = $NM_val_form['grupocomanda']; }
              elseif (isset($this->grupocomanda)) { $this->nm_limpa_alfa($this->grupocomanda); }
              if     (isset($NM_val_form) && isset($NM_val_form['nombre_pc'])) { $this->nombre_pc = $NM_val_form['nombre_pc']; }
              elseif (isset($this->nombre_pc)) { $this->nm_limpa_alfa($this->nombre_pc); }
              if     (isset($NM_val_form) && isset($NM_val_form['nombre_impre'])) { $this->nombre_impre = $NM_val_form['nombre_impre']; }
              elseif (isset($this->nombre_impre)) { $this->nm_limpa_alfa($this->nombre_impre); }
              if     (isset($NM_val_form) && isset($NM_val_form['banco_movil'])) { $this->banco_movil = $NM_val_form['banco_movil']; }
              elseif (isset($this->banco_movil)) { $this->nm_limpa_alfa($this->banco_movil); }
              if     (isset($NM_val_form) && isset($NM_val_form['ubicacion'])) { $this->ubicacion = $NM_val_form['ubicacion']; }
              elseif (isset($this->ubicacion)) { $this->nm_limpa_alfa($this->ubicacion); }
              if     (isset($NM_val_form) && isset($NM_val_form['n_equipo'])) { $this->n_equipo = $NM_val_form['n_equipo']; }
              elseif (isset($this->n_equipo)) { $this->nm_limpa_alfa($this->n_equipo); }
              if     (isset($NM_val_form) && isset($NM_val_form['serial'])) { $this->serial = $NM_val_form['serial']; }
              elseif (isset($this->serial)) { $this->nm_limpa_alfa($this->serial); }
              if     (isset($NM_val_form) && isset($NM_val_form['idbod'])) { $this->idbod = $NM_val_form['idbod']; }
              elseif (isset($this->idbod)) { $this->nm_limpa_alfa($this->idbod); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('idusuarios', 'usuario', 'password', 'nombre', 'correo', 'telefono', 'tercero', 'resolucion', 'grupo', 'activo', 'grupocomanda', 'banco_movil', 'idbod', 'ocultar_bod', 'acceso_inventario', 'acceso_gerencial', 'acceso_restaurante', 'nombre_pc', 'nombre_impre', 'ubicacion', 'n_equipo', 'serial'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "idusuarios, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_usuarios_pack_ajax_response();
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
                  if ($this->creacion != "")
                  { 
                       $compl_insert     .= ", creacion";
                       $compl_insert_val .= ", '$this->creacion'";
                  } 
                  if ($this->activo != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo'";
                  } 
                  if ($this->ultima_actualizacion != "")
                  { 
                       $compl_insert     .= ", ultima_actualizacion";
                       $compl_insert_val .= ", '$this->ultima_actualizacion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (usuario, password, nombre, correo, telefono, tercero, resolucion, grupo, grupocomanda, nombre_pc, nombre_impre, sesion_id, acceso_inventario, acceso_gerencial, acceso_restaurante, sesion_id_movil, banco_movil, ubicacion, n_equipo, serial, idbod, ocultar_bod $compl_insert) VALUES ('$this->usuario', '$this->password', '$this->nombre', '$this->correo', '$this->telefono', $this->tercero, $this->resolucion, $this->grupo, $this->grupocomanda, '$this->nombre_pc', '$this->nombre_impre', '$this->sesion_id', '$this->acceso_inventario', '$this->acceso_gerencial', '$this->acceso_restaurante', '$this->sesion_id_movil', $this->banco_movil, '$this->ubicacion', '$this->n_equipo', '$this->serial', $this->idbod, '$this->ocultar_bod' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->creacion != "")
                  { 
                       $compl_insert     .= ", creacion";
                       $compl_insert_val .= ", '$this->creacion'";
                  } 
                  if ($this->activo != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo'";
                  } 
                  if ($this->ultima_actualizacion != "")
                  { 
                       $compl_insert     .= ", ultima_actualizacion";
                       $compl_insert_val .= ", '$this->ultima_actualizacion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "usuario, password, nombre, correo, telefono, tercero, resolucion, grupo, grupocomanda, nombre_pc, nombre_impre, sesion_id, acceso_inventario, acceso_gerencial, acceso_restaurante, sesion_id_movil, banco_movil, ubicacion, n_equipo, serial, idbod, ocultar_bod $compl_insert) VALUES (" . $NM_seq_auto . "'$this->usuario', '$this->password', '$this->nombre', '$this->correo', '$this->telefono', $this->tercero, $this->resolucion, $this->grupo, $this->grupocomanda, '$this->nombre_pc', '$this->nombre_impre', '$this->sesion_id', '$this->acceso_inventario', '$this->acceso_gerencial', '$this->acceso_restaurante', '$this->sesion_id_movil', $this->banco_movil, '$this->ubicacion', '$this->n_equipo', '$this->serial', $this->idbod, '$this->ocultar_bod' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->creacion != "")
                  { 
                       $compl_insert     .= ", creacion";
                       $compl_insert_val .= ", '$this->creacion'";
                  } 
                  if ($this->activo != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo'";
                  } 
                  if ($this->ultima_actualizacion != "")
                  { 
                       $compl_insert     .= ", ultima_actualizacion";
                       $compl_insert_val .= ", '$this->ultima_actualizacion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "usuario, password, nombre, correo, telefono, tercero, resolucion, grupo, grupocomanda, nombre_pc, nombre_impre, sesion_id, acceso_inventario, acceso_gerencial, acceso_restaurante, sesion_id_movil, banco_movil, ubicacion, n_equipo, serial, idbod, ocultar_bod $compl_insert) VALUES (" . $NM_seq_auto . "'$this->usuario', '$this->password', '$this->nombre', '$this->correo', '$this->telefono', $this->tercero, $this->resolucion, $this->grupo, $this->grupocomanda, '$this->nombre_pc', '$this->nombre_impre', '$this->sesion_id', '$this->acceso_inventario', '$this->acceso_gerencial', '$this->acceso_restaurante', '$this->sesion_id_movil', $this->banco_movil, '$this->ubicacion', '$this->n_equipo', '$this->serial', $this->idbod, '$this->ocultar_bod' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->creacion != "")
                  { 
                       $compl_insert     .= ", creacion";
                       $compl_insert_val .= ", TO_DATE('$this->creacion', 'yyyy-mm-dd hh24:mi:ss')";
                  } 
                  if ($this->activo != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo'";
                  } 
                  if ($this->ultima_actualizacion != "")
                  { 
                       $compl_insert     .= ", ultima_actualizacion";
                       $compl_insert_val .= ", TO_DATE('$this->ultima_actualizacion', 'yyyy-mm-dd hh24:mi:ss')";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "usuario, password, nombre, correo, telefono, tercero, resolucion, grupo, grupocomanda, nombre_pc, nombre_impre, sesion_id, acceso_inventario, acceso_gerencial, acceso_restaurante, sesion_id_movil, banco_movil, ubicacion, n_equipo, serial, idbod, ocultar_bod $compl_insert) VALUES (" . $NM_seq_auto . "'$this->usuario', '$this->password', '$this->nombre', '$this->correo', '$this->telefono', $this->tercero, $this->resolucion, $this->grupo, $this->grupocomanda, '$this->nombre_pc', '$this->nombre_impre', '$this->sesion_id', '$this->acceso_inventario', '$this->acceso_gerencial', '$this->acceso_restaurante', '$this->sesion_id_movil', $this->banco_movil, '$this->ubicacion', '$this->n_equipo', '$this->serial', $this->idbod, '$this->ocultar_bod' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->creacion != "")
                  { 
                       $compl_insert     .= ", creacion";
                       $compl_insert_val .= ", '$this->creacion'";
                  } 
                  if ($this->activo != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo'";
                  } 
                  if ($this->ultima_actualizacion != "")
                  { 
                       $compl_insert     .= ", ultima_actualizacion";
                       $compl_insert_val .= ", '$this->ultima_actualizacion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "usuario, password, nombre, correo, telefono, tercero, resolucion, grupo, grupocomanda, nombre_pc, nombre_impre, sesion_id, acceso_inventario, acceso_gerencial, acceso_restaurante, sesion_id_movil, banco_movil, ubicacion, n_equipo, serial, idbod, ocultar_bod $compl_insert) VALUES (" . $NM_seq_auto . "'$this->usuario', '$this->password', '$this->nombre', '$this->correo', '$this->telefono', $this->tercero, $this->resolucion, $this->grupo, $this->grupocomanda, '$this->nombre_pc', '$this->nombre_impre', '$this->sesion_id', '$this->acceso_inventario', '$this->acceso_gerencial', '$this->acceso_restaurante', '$this->sesion_id_movil', $this->banco_movil, '$this->ubicacion', '$this->n_equipo', '$this->serial', $this->idbod, '$this->ocultar_bod' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->creacion != "")
                  { 
                       $compl_insert     .= ", creacion";
                       $compl_insert_val .= ", '$this->creacion'";
                  } 
                  if ($this->activo != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo'";
                  } 
                  if ($this->ultima_actualizacion != "")
                  { 
                       $compl_insert     .= ", ultima_actualizacion";
                       $compl_insert_val .= ", '$this->ultima_actualizacion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "usuario, password, nombre, correo, telefono, tercero, resolucion, grupo, grupocomanda, nombre_pc, nombre_impre, sesion_id, acceso_inventario, acceso_gerencial, acceso_restaurante, sesion_id_movil, banco_movil, ubicacion, n_equipo, serial, idbod, ocultar_bod $compl_insert) VALUES (" . $NM_seq_auto . "'$this->usuario', '$this->password', '$this->nombre', '$this->correo', '$this->telefono', $this->tercero, $this->resolucion, $this->grupo, $this->grupocomanda, '$this->nombre_pc', '$this->nombre_impre', '$this->sesion_id', '$this->acceso_inventario', '$this->acceso_gerencial', '$this->acceso_restaurante', '$this->sesion_id_movil', $this->banco_movil, '$this->ubicacion', '$this->n_equipo', '$this->serial', $this->idbod, '$this->ocultar_bod' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->creacion != "")
                  { 
                       $compl_insert     .= ", creacion";
                       $compl_insert_val .= ", '$this->creacion'";
                  } 
                  if ($this->activo != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo'";
                  } 
                  if ($this->ultima_actualizacion != "")
                  { 
                       $compl_insert     .= ", ultima_actualizacion";
                       $compl_insert_val .= ", '$this->ultima_actualizacion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "usuario, password, nombre, correo, telefono, tercero, resolucion, grupo, grupocomanda, nombre_pc, nombre_impre, sesion_id, acceso_inventario, acceso_gerencial, acceso_restaurante, sesion_id_movil, banco_movil, ubicacion, n_equipo, serial, idbod, ocultar_bod $compl_insert) VALUES (" . $NM_seq_auto . "'$this->usuario', '$this->password', '$this->nombre', '$this->correo', '$this->telefono', $this->tercero, $this->resolucion, $this->grupo, $this->grupocomanda, '$this->nombre_pc', '$this->nombre_impre', '$this->sesion_id', '$this->acceso_inventario', '$this->acceso_gerencial', '$this->acceso_restaurante', '$this->sesion_id_movil', $this->banco_movil, '$this->ubicacion', '$this->n_equipo', '$this->serial', $this->idbod, '$this->ocultar_bod' $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->creacion != "")
                  { 
                       $compl_insert     .= ", creacion";
                       $compl_insert_val .= ", TO_DATE('$this->creacion', 'yyyy-mm-dd hh24:mi:ss')";
                  } 
                  if ($this->activo != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo'";
                  } 
                  if ($this->ultima_actualizacion != "")
                  { 
                       $compl_insert     .= ", ultima_actualizacion";
                       $compl_insert_val .= ", TO_DATE('$this->ultima_actualizacion', 'yyyy-mm-dd hh24:mi:ss')";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "usuario, password, nombre, correo, telefono, tercero, resolucion, grupo, grupocomanda, nombre_pc, nombre_impre, sesion_id, acceso_inventario, acceso_gerencial, acceso_restaurante, sesion_id_movil, banco_movil, ubicacion, n_equipo, serial, idbod, ocultar_bod $compl_insert) VALUES (" . $NM_seq_auto . "'$this->usuario', '$this->password', '$this->nombre', '$this->correo', '$this->telefono', $this->tercero, $this->resolucion, $this->grupo, $this->grupocomanda, '$this->nombre_pc', '$this->nombre_impre', '$this->sesion_id', '$this->acceso_inventario', '$this->acceso_gerencial', '$this->acceso_restaurante', '$this->sesion_id_movil', $this->banco_movil, '$this->ubicacion', '$this->n_equipo', '$this->serial', $this->idbod, '$this->ocultar_bod' $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->creacion != "")
                  { 
                       $compl_insert     .= ", creacion";
                       $compl_insert_val .= ", '$this->creacion'";
                  } 
                  if ($this->activo != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo'";
                  } 
                  if ($this->ultima_actualizacion != "")
                  { 
                       $compl_insert     .= ", ultima_actualizacion";
                       $compl_insert_val .= ", '$this->ultima_actualizacion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "usuario, password, nombre, correo, telefono, tercero, resolucion, grupo, grupocomanda, nombre_pc, nombre_impre, sesion_id, acceso_inventario, acceso_gerencial, acceso_restaurante, sesion_id_movil, banco_movil, ubicacion, n_equipo, serial, idbod, ocultar_bod $compl_insert) VALUES (" . $NM_seq_auto . "'$this->usuario', '$this->password', '$this->nombre', '$this->correo', '$this->telefono', $this->tercero, $this->resolucion, $this->grupo, $this->grupocomanda, '$this->nombre_pc', '$this->nombre_impre', '$this->sesion_id', '$this->acceso_inventario', '$this->acceso_gerencial', '$this->acceso_restaurante', '$this->sesion_id_movil', $this->banco_movil, '$this->ubicacion', '$this->n_equipo', '$this->serial', $this->idbod, '$this->ocultar_bod' $compl_insert_val)"; 
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
                              form_usuarios_pack_ajax_response();
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
                          form_usuarios_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->idusuarios =  $rsy->fields[0];
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
                  $this->idusuarios = $rsy->fields[0];
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
                  $this->idusuarios = $rsy->fields[0];
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
                  $this->idusuarios = $rsy->fields[0];
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
                  $this->idusuarios = $rsy->fields[0];
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
                  $this->idusuarios = $rsy->fields[0];
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
                  $this->idusuarios = $rsy->fields[0];
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
                  $this->idusuarios = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->usuario = $this->usuario_before_qstr;
              $this->password = $this->password_before_qstr;
              $this->nombre = $this->nombre_before_qstr;
              $this->correo = $this->correo_before_qstr;
              $this->telefono = $this->telefono_before_qstr;
              $this->activo = $this->activo_before_qstr;
              $this->nombre_pc = $this->nombre_pc_before_qstr;
              $this->nombre_impre = $this->nombre_impre_before_qstr;
              $this->sesion_id = $this->sesion_id_before_qstr;
              $this->sesion_id_movil = $this->sesion_id_movil_before_qstr;
              $this->ubicacion = $this->ubicacion_before_qstr;
              $this->n_equipo = $this->n_equipo_before_qstr;
              $this->serial = $this->serial_before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->usuario = $this->usuario_before_qstr;
              $this->password = $this->password_before_qstr;
              $this->nombre = $this->nombre_before_qstr;
              $this->correo = $this->correo_before_qstr;
              $this->telefono = $this->telefono_before_qstr;
              $this->activo = $this->activo_before_qstr;
              $this->nombre_pc = $this->nombre_pc_before_qstr;
              $this->nombre_impre = $this->nombre_impre_before_qstr;
              $this->sesion_id = $this->sesion_id_before_qstr;
              $this->sesion_id_movil = $this->sesion_id_movil_before_qstr;
              $this->ubicacion = $this->ubicacion_before_qstr;
              $this->n_equipo = $this->n_equipo_before_qstr;
              $this->serial = $this->serial_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              $this->nmgp_botoes['permisos'] = "on";
              $this->return_after_insert();
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->idusuarios = substr($this->Db->qstr($this->idusuarios), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idusuarios = $this->idusuarios "); 
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
                          form_usuarios_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['total']);
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
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['scriptcase']['form_usuarios']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_resolucion = $this->resolucion;
}
if (!isset($this->sc_temp_gidresolucion)) {$this->sc_temp_gidresolucion = (isset($_SESSION['gidresolucion'])) ? $_SESSION['gidresolucion'] : "";}
  $this->sc_temp_gidresolucion = $this->resolucion ;
if (isset($this->sc_temp_gidresolucion)) { $_SESSION['gidresolucion'] = $this->sc_temp_gidresolucion;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_resolucion != $this->resolucion || (isset($bFlagRead_resolucion) && $bFlagRead_resolucion)))
    {
        $this->ajax_return_values_resolucion(true);
    }
}
$_SESSION['scriptcase']['form_usuarios']['contr_erro'] = 'off'; 
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
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['parms'] = "idusuarios?#?$this->idusuarios?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idusuarios = null === $this->idusuarios ? null : substr($this->Db->qstr($this->idusuarios), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] == "R")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->idusuarios)) 
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
      if ($this->nmgp_opcao != "nada" && (trim($this->idusuarios) == "")) 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] == "F" && $this->sc_evento == "insert")
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_usuarios = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['total'] = $qt_geral_reg_form_usuarios;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->idusuarios))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "idusuarios < $this->idusuarios "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "idusuarios < $this->idusuarios "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "idusuarios < $this->idusuarios "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "idusuarios < $this->idusuarios "; 
              }
              else  
              {
                  $Key_Where = "idusuarios < $this->idusuarios "; 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_usuarios = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start'] > $qt_geral_reg_form_usuarios)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start'] = $qt_geral_reg_form_usuarios; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start'] = $qt_geral_reg_form_usuarios; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_usuarios) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT idusuarios, creacion, usuario, password, nombre, correo, telefono, tercero, resolucion, grupo, activo, ultima_actualizacion, grupocomanda, nombre_pc, nombre_impre, sesion_id, acceso_inventario, acceso_gerencial, acceso_restaurante, sesion_id_movil, banco_movil, ubicacion, n_equipo, serial, idbod, ocultar_bod from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT idusuarios, creacion, usuario, password, nombre, correo, telefono, tercero, resolucion, grupo, activo, ultima_actualizacion, grupocomanda, nombre_pc, nombre_impre, sesion_id, acceso_inventario, acceso_gerencial, acceso_restaurante, sesion_id_movil, banco_movil, ubicacion, n_equipo, serial, idbod, ocultar_bod from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT idusuarios, TO_DATE(TO_CHAR(creacion, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), usuario, password, nombre, correo, telefono, tercero, resolucion, grupo, activo, TO_DATE(TO_CHAR(ultima_actualizacion, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), grupocomanda, nombre_pc, nombre_impre, sesion_id, acceso_inventario, acceso_gerencial, acceso_restaurante, sesion_id_movil, banco_movil, ubicacion, n_equipo, serial, idbod, ocultar_bod from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT idusuarios, creacion, usuario, password, nombre, correo, telefono, tercero, resolucion, grupo, activo, ultima_actualizacion, grupocomanda, nombre_pc, nombre_impre, sesion_id, acceso_inventario, acceso_gerencial, acceso_restaurante, sesion_id_movil, banco_movil, ubicacion, n_equipo, serial, idbod, ocultar_bod from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT idusuarios, creacion, usuario, password, nombre, correo, telefono, tercero, resolucion, grupo, activo, ultima_actualizacion, grupocomanda, nombre_pc, nombre_impre, sesion_id, acceso_inventario, acceso_gerencial, acceso_restaurante, sesion_id_movil, banco_movil, ubicacion, n_equipo, serial, idbod, ocultar_bod from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "idusuarios = $this->idusuarios"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "idusuarios = $this->idusuarios"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "idusuarios = $this->idusuarios"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "idusuarios = $this->idusuarios"; 
              }  
              else  
              {
                  $aWhere[] = "idusuarios = $this->idusuarios"; 
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
          $sc_order_by = "idusuarios";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "insert" || $this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['permisos'] = $this->nmgp_botoes['permisos'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['empty_filter'] = true;
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
              $this->NM_ajax_info['buttonDisplay']['permisos'] = $this->nmgp_botoes['permisos'] = "off";
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
              $this->idusuarios = $rs->fields[0] ; 
              $this->nmgp_dados_select['idusuarios'] = $this->idusuarios;
              $this->creacion = $rs->fields[1] ; 
              if (substr($this->creacion, 10, 1) == "-") 
              { 
                 $this->creacion = substr($this->creacion, 0, 10) . " " . substr($this->creacion, 11);
              } 
              if (substr($this->creacion, 13, 1) == ".") 
              { 
                 $this->creacion = substr($this->creacion, 0, 13) . ":" . substr($this->creacion, 14, 2) . ":" . substr($this->creacion, 17);
              } 
              $this->nmgp_dados_select['creacion'] = $this->creacion;
              $this->usuario = $rs->fields[2] ; 
              $this->nmgp_dados_select['usuario'] = $this->usuario;
              $this->password = $rs->fields[3] ; 
              $this->nmgp_dados_select['password'] = $this->password;
              $this->nombre = $rs->fields[4] ; 
              $this->nmgp_dados_select['nombre'] = $this->nombre;
              $this->correo = $rs->fields[5] ; 
              $this->nmgp_dados_select['correo'] = $this->correo;
              $this->telefono = $rs->fields[6] ; 
              $this->nmgp_dados_select['telefono'] = $this->telefono;
              $this->tercero = $rs->fields[7] ; 
              $this->nmgp_dados_select['tercero'] = $this->tercero;
              $this->resolucion = $rs->fields[8] ; 
              $this->nmgp_dados_select['resolucion'] = $this->resolucion;
              $this->grupo = $rs->fields[9] ; 
              $this->nmgp_dados_select['grupo'] = $this->grupo;
              $this->activo = $rs->fields[10] ; 
              $this->nmgp_dados_select['activo'] = $this->activo;
              $this->ultima_actualizacion = $rs->fields[11] ; 
              if (substr($this->ultima_actualizacion, 10, 1) == "-") 
              { 
                 $this->ultima_actualizacion = substr($this->ultima_actualizacion, 0, 10) . " " . substr($this->ultima_actualizacion, 11);
              } 
              if (substr($this->ultima_actualizacion, 13, 1) == ".") 
              { 
                 $this->ultima_actualizacion = substr($this->ultima_actualizacion, 0, 13) . ":" . substr($this->ultima_actualizacion, 14, 2) . ":" . substr($this->ultima_actualizacion, 17);
              } 
              $this->nmgp_dados_select['ultima_actualizacion'] = $this->ultima_actualizacion;
              $this->grupocomanda = $rs->fields[12] ; 
              $this->nmgp_dados_select['grupocomanda'] = $this->grupocomanda;
              $this->nombre_pc = $rs->fields[13] ; 
              $this->nmgp_dados_select['nombre_pc'] = $this->nombre_pc;
              $this->nombre_impre = $rs->fields[14] ; 
              $this->nmgp_dados_select['nombre_impre'] = $this->nombre_impre;
              $this->sesion_id = $rs->fields[15] ; 
              $this->nmgp_dados_select['sesion_id'] = $this->sesion_id;
              $this->acceso_inventario = $rs->fields[16] ; 
              $this->nmgp_dados_select['acceso_inventario'] = $this->acceso_inventario;
              $this->acceso_gerencial = $rs->fields[17] ; 
              $this->nmgp_dados_select['acceso_gerencial'] = $this->acceso_gerencial;
              $this->acceso_restaurante = $rs->fields[18] ; 
              $this->nmgp_dados_select['acceso_restaurante'] = $this->acceso_restaurante;
              $this->sesion_id_movil = $rs->fields[19] ; 
              $this->nmgp_dados_select['sesion_id_movil'] = $this->sesion_id_movil;
              $this->banco_movil = $rs->fields[20] ; 
              $this->nmgp_dados_select['banco_movil'] = $this->banco_movil;
              $this->ubicacion = $rs->fields[21] ; 
              $this->nmgp_dados_select['ubicacion'] = $this->ubicacion;
              $this->n_equipo = $rs->fields[22] ; 
              $this->nmgp_dados_select['n_equipo'] = $this->n_equipo;
              $this->serial = $rs->fields[23] ; 
              $this->nmgp_dados_select['serial'] = $this->serial;
              $this->idbod = $rs->fields[24] ; 
              $this->nmgp_dados_select['idbod'] = $this->idbod;
              $this->ocultar_bod = $rs->fields[25] ; 
              $this->nmgp_dados_select['ocultar_bod'] = $this->ocultar_bod;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->idusuarios = (string)$this->idusuarios; 
              $this->tercero = (string)$this->tercero; 
              $this->resolucion = (string)$this->resolucion; 
              $this->grupo = (string)$this->grupo; 
              $this->grupocomanda = (string)$this->grupocomanda; 
              $this->banco_movil = (string)$this->banco_movil; 
              $this->idbod = (string)$this->idbod; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['parms'] = "idusuarios?#?$this->idusuarios?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start'] < $qt_geral_reg_form_usuarios;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['opcao']   = '';
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
              $this->idusuarios = "";  
              $this->nmgp_dados_form["idusuarios"] = $this->idusuarios;
              $this->creacion = "";  
              $this->creacion_hora = "" ;  
              $this->nmgp_dados_form["creacion"] = $this->creacion;
              $this->usuario = "";  
              $this->nmgp_dados_form["usuario"] = $this->usuario;
              $this->password = "";  
              $this->nmgp_dados_form["password"] = $this->password;
              $this->nombre = "";  
              $this->nmgp_dados_form["nombre"] = $this->nombre;
              $this->correo = "";  
              $this->nmgp_dados_form["correo"] = $this->correo;
              $this->telefono = "";  
              $this->nmgp_dados_form["telefono"] = $this->telefono;
              $this->tercero = "";  
              $this->nmgp_dados_form["tercero"] = $this->tercero;
              $this->resolucion = "";  
              $this->nmgp_dados_form["resolucion"] = $this->resolucion;
              $this->grupo = "";  
              $this->nmgp_dados_form["grupo"] = $this->grupo;
              $this->activo = "S";  
              $this->nmgp_dados_form["activo"] = $this->activo;
              $this->ultima_actualizacion = "";  
              $this->ultima_actualizacion_hora = "" ;  
              $this->nmgp_dados_form["ultima_actualizacion"] = $this->ultima_actualizacion;
              $this->grupocomanda = "";  
              $this->nmgp_dados_form["grupocomanda"] = $this->grupocomanda;
              $this->nombre_pc = "";  
              $this->nmgp_dados_form["nombre_pc"] = $this->nombre_pc;
              $this->nombre_impre = "";  
              $this->nmgp_dados_form["nombre_impre"] = $this->nombre_impre;
              $this->sesion_id = "";  
              $this->nmgp_dados_form["sesion_id"] = $this->sesion_id;
              $this->acceso_inventario = "";  
              $this->nmgp_dados_form["acceso_inventario"] = $this->acceso_inventario;
              $this->acceso_gerencial = "";  
              $this->nmgp_dados_form["acceso_gerencial"] = $this->acceso_gerencial;
              $this->acceso_restaurante = "";  
              $this->nmgp_dados_form["acceso_restaurante"] = $this->acceso_restaurante;
              $this->sesion_id_movil = "";  
              $this->nmgp_dados_form["sesion_id_movil"] = $this->sesion_id_movil;
              $this->banco_movil = "";  
              $this->nmgp_dados_form["banco_movil"] = $this->banco_movil;
              $this->ubicacion = "";  
              $this->nmgp_dados_form["ubicacion"] = $this->ubicacion;
              $this->n_equipo = "";  
              $this->nmgp_dados_form["n_equipo"] = $this->n_equipo;
              $this->serial = "";  
              $this->nmgp_dados_form["serial"] = $this->serial;
              $this->idbod = "";  
              $this->nmgp_dados_form["idbod"] = $this->idbod;
              $this->ocultar_bod = "";  
              $this->nmgp_dados_form["ocultar_bod"] = $this->ocultar_bod;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
              if ($this->nmgp_clone != "S")
              {
              }
              if ($this->nmgp_clone == "S" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dados_select']))
              {
                  $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dados_select'];
                  $this->creacion = $this->nmgp_dados_select['creacion'];  
                  $this->usuario = $this->nmgp_dados_select['usuario'];  
                  $this->password = $this->nmgp_dados_select['password'];  
                  $this->nombre = $this->nmgp_dados_select['nombre'];  
                  $this->correo = $this->nmgp_dados_select['correo'];  
                  $this->telefono = $this->nmgp_dados_select['telefono'];  
                  $this->tercero = $this->nmgp_dados_select['tercero'];  
                  $this->resolucion = $this->nmgp_dados_select['resolucion'];  
                  $this->grupo = $this->nmgp_dados_select['grupo'];  
                  $this->activo = $this->nmgp_dados_select['activo'];  
                  $this->ultima_actualizacion = $this->nmgp_dados_select['ultima_actualizacion'];  
                  $this->grupocomanda = $this->nmgp_dados_select['grupocomanda'];  
                  $this->nombre_pc = $this->nmgp_dados_select['nombre_pc'];  
                  $this->nombre_impre = $this->nmgp_dados_select['nombre_impre'];  
                  $this->sesion_id = $this->nmgp_dados_select['sesion_id'];  
                  $this->acceso_inventario = $this->nmgp_dados_select['acceso_inventario'];  
                  $this->acceso_gerencial = $this->nmgp_dados_select['acceso_gerencial'];  
                  $this->acceso_restaurante = $this->nmgp_dados_select['acceso_restaurante'];  
                  $this->sesion_id_movil = $this->nmgp_dados_select['sesion_id_movil'];  
                  $this->banco_movil = $this->nmgp_dados_select['banco_movil'];  
                  $this->ubicacion = $this->nmgp_dados_select['ubicacion'];  
                  $this->n_equipo = $this->nmgp_dados_select['n_equipo'];  
                  $this->serial = $this->nmgp_dados_select['serial'];  
                  $this->idbod = $this->nmgp_dados_select['idbod'];  
                  $this->ocultar_bod = $this->nmgp_dados_select['ocultar_bod'];  
              }
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['foreign_key'] as $sFKName => $sFKValue)
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
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idusuarios) from " . $this->Ini->nm_tabela . " where idusuarios < $this->idusuarios" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idusuarios) from " . $this->Ini->nm_tabela . " where idusuarios < $this->idusuarios" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idusuarios) from " . $this->Ini->nm_tabela . " where idusuarios < $this->idusuarios" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idusuarios) from " . $this->Ini->nm_tabela . " where idusuarios < $this->idusuarios" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idusuarios) from " . $this->Ini->nm_tabela . " where idusuarios < $this->idusuarios" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idusuarios) from " . $this->Ini->nm_tabela . " where idusuarios < $this->idusuarios" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idusuarios) from " . $this->Ini->nm_tabela . " where idusuarios < $this->idusuarios" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idusuarios) from " . $this->Ini->nm_tabela . " where idusuarios < $this->idusuarios" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idusuarios) from " . $this->Ini->nm_tabela . " where idusuarios < $this->idusuarios" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idusuarios) from " . $this->Ini->nm_tabela . " where idusuarios < $this->idusuarios" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idusuarios = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idusuarios) from " . $this->Ini->nm_tabela . " where idusuarios > $this->idusuarios" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idusuarios) from " . $this->Ini->nm_tabela . " where idusuarios > $this->idusuarios" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idusuarios) from " . $this->Ini->nm_tabela . " where idusuarios > $this->idusuarios" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idusuarios) from " . $this->Ini->nm_tabela . " where idusuarios > $this->idusuarios" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idusuarios) from " . $this->Ini->nm_tabela . " where idusuarios > $this->idusuarios" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idusuarios) from " . $this->Ini->nm_tabela . " where idusuarios > $this->idusuarios" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idusuarios) from " . $this->Ini->nm_tabela . " where idusuarios > $this->idusuarios" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idusuarios) from " . $this->Ini->nm_tabela . " where idusuarios > $this->idusuarios" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idusuarios) from " . $this->Ini->nm_tabela . " where idusuarios > $this->idusuarios" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idusuarios) from " . $this->Ini->nm_tabela . " where idusuarios > $this->idusuarios" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idusuarios = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idusuarios) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idusuarios) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idusuarios) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idusuarios) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idusuarios) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idusuarios) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idusuarios) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idusuarios) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idusuarios) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idusuarios) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_filter']))
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
     $this->idusuarios = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idusuarios) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idusuarios) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idusuarios) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idusuarios) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idusuarios) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idusuarios) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idusuarios) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idusuarios) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idusuarios) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idusuarios) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
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
     $this->idusuarios = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['reg_start'] + 1;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function grupo_onChange()
{
$_SESSION['scriptcase']['form_usuarios']['contr_erro'] = 'on';
  
$original_grupo = $this->grupo;
$original_grupo = $this->grupo;




$modificado_grupo = $this->grupo;
$modificado_grupo = $this->grupo;
$this->nm_formatar_campos('grupo');
if ($original_grupo !== $modificado_grupo || isset($this->nmgp_cmp_readonly['grupo']) || (isset($bFlagRead_grupo) && $bFlagRead_grupo))
{
    $this->ajax_return_values_grupo(true);
}
if ($original_grupo !== $modificado_grupo || isset($this->nmgp_cmp_readonly['grupo']) || (isset($bFlagRead_grupo) && $bFlagRead_grupo))
{
    $this->ajax_return_values_grupo(true);
}
$this->NM_ajax_info['event_field'] = 'grupo';
form_usuarios_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_usuarios']['contr_erro'] = 'off';
}
function tercero_onChange()
{
$_SESSION['scriptcase']['form_usuarios']['contr_erro'] = 'on';
  
$original_idusuarios = $this->idusuarios;
$original_tercero = $this->tercero;
$original_tercero = $this->tercero;

 
      $nm_select = "select tercero from usuarios where idusuarios='".$this->idusuarios ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiYaExiste = array();
      $this->vsiyaexiste = array();
     if ($this->idusuarios != "")
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
                      $this->vSiYaExiste[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vsiyaexiste[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiYaExiste = false;
          $this->vSiYaExiste_erro = $this->Db->ErrorMsg();
          $this->vsiyaexiste = false;
          $this->vsiyaexiste_erro = $this->Db->ErrorMsg();
      } 
     } 
;
if(isset($this->vsiyaexiste[0][0]))
{
	if($this->vsiyaexiste[0][0]!=$this->tercero )
	{
		 
      $nm_select = "select tercero from usuarios where tercero='".$this->tercero ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiYaExiste2 = array();
      $this->vsiyaexiste2 = array();
     if ($this->tercero != "")
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
                      $this->vSiYaExiste2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vsiyaexiste2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiYaExiste2 = false;
          $this->vSiYaExiste2_erro = $this->Db->ErrorMsg();
          $this->vsiyaexiste2 = false;
          $this->vsiyaexiste2_erro = $this->Db->ErrorMsg();
      } 
     } 
;
		
		if(isset($this->vsiyaexiste2[0][0]))
		{
			$this->tercero  = "";
			$this->nm_mens_alert[] = "Ese tercero ya ha sido asignado a otro usuario, por favor seleccione un tercero diferente."; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("Ese tercero ya ha sido asignado a otro usuario, por favor seleccione un tercero diferente."); }}
	}
}


$modificado_idusuarios = $this->idusuarios;
$modificado_tercero = $this->tercero;
$modificado_tercero = $this->tercero;
$this->nm_formatar_campos('idusuarios', 'tercero');
if ($original_idusuarios !== $modificado_idusuarios || isset($this->nmgp_cmp_readonly['idusuarios']) || (isset($bFlagRead_idusuarios) && $bFlagRead_idusuarios))
{
    $this->ajax_return_values_idusuarios(true);
}
if ($original_tercero !== $modificado_tercero || isset($this->nmgp_cmp_readonly['tercero']) || (isset($bFlagRead_tercero) && $bFlagRead_tercero))
{
    $this->ajax_return_values_tercero(true);
}
if ($original_tercero !== $modificado_tercero || isset($this->nmgp_cmp_readonly['tercero']) || (isset($bFlagRead_tercero) && $bFlagRead_tercero))
{
    $this->ajax_return_values_tercero(true);
}
$this->NM_ajax_info['event_field'] = 'tercero';
form_usuarios_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_usuarios']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_usuarios_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
        include_once("form_usuarios_form0.php");
        include_once("form_usuarios_form1.php");
        include_once("form_usuarios_form2.php");
        include_once("form_usuarios_form3.php");
        $this->hideFormPages();
 }

        function initFormPages() {
                $this->Ini->nm_page_names = array(
                        'Pag1' => '0',
                        'Pag2' => '1',
                        'Pag3' => '2',
                        'Pag4' => '3',
                );

                $this->Ini->nm_page_blocks = array(
                        'Pag1' => array(
                                0 => 'on',
                        ),
                        'Pag2' => array(
                                1 => 'on',
                        ),
                        'Pag3' => array(
                                2 => 'on',
                        ),
                        'Pag4' => array(
                                3 => 'on',
                        ),
                );

                $this->Ini->nm_block_page = array(
                        0 => 'Pag1',
                        1 => 'Pag2',
                        2 => 'Pag3',
                        3 => 'Pag4',
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("usuario", "nombre", "correo", "telefono"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['csrf_token'];
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

   function Form_lookup_tercero()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero'] = array(); 
    }

   $old_value_idusuarios = $this->idusuarios;
   $this->nm_tira_formatacao();


   $unformatted_value_idusuarios = $this->idusuarios;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + ' --  ' + nombres  FROM terceros  WHERE empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento,' --  ' ,nombres)  FROM terceros  WHERE empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&' --  '&nombres  FROM terceros  WHERE empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||' --  '||nombres  FROM terceros  WHERE empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + ' --  ' + nombres  FROM terceros  WHERE empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||' --  '||nombres  FROM terceros  WHERE empleado='SI' ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||' --  '||nombres  FROM terceros  WHERE empleado='SI' ORDER BY documento, nombres";
   }

   $this->idusuarios = $old_value_idusuarios;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_tercero'][] = $rs->fields[0];
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
   function Form_lookup_resolucion()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion'] = array(); 
    }

   $old_value_idusuarios = $this->idusuarios;
   $this->nm_tira_formatacao();


   $unformatted_value_idusuarios = $this->idusuarios;

   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_inventario_val_str = "''";
   if (!empty($this->acceso_inventario))
   {
       if (is_array($this->acceso_inventario))
       {
           $Tmp_array = $this->acceso_inventario;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_inventario);
       }
       $acceso_inventario_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_inventario_val_str)
          {
             $acceso_inventario_val_str .= ", ";
          }
          $acceso_inventario_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_gerencial_val_str = "''";
   if (!empty($this->acceso_gerencial))
   {
       if (is_array($this->acceso_gerencial))
       {
           $Tmp_array = $this->acceso_gerencial;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_gerencial);
       }
       $acceso_gerencial_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_gerencial_val_str)
          {
             $acceso_gerencial_val_str .= ", ";
          }
          $acceso_gerencial_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_restaurante_val_str = "''";
   if (!empty($this->acceso_restaurante))
   {
       if (is_array($this->acceso_restaurante))
       {
           $Tmp_array = $this->acceso_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_restaurante);
       }
       $acceso_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_restaurante_val_str)
          {
             $acceso_restaurante_val_str .= ", ";
          }
          $acceso_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT Idres, prefijo  FROM resdian  ORDER BY prefijo";

   $this->idusuarios = $old_value_idusuarios;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_resolucion'][] = $rs->fields[0];
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
   function Form_lookup_grupo()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo'] = array(); 
    }

   $old_value_idusuarios = $this->idusuarios;
   $this->nm_tira_formatacao();


   $unformatted_value_idusuarios = $this->idusuarios;

   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_inventario_val_str = "''";
   if (!empty($this->acceso_inventario))
   {
       if (is_array($this->acceso_inventario))
       {
           $Tmp_array = $this->acceso_inventario;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_inventario);
       }
       $acceso_inventario_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_inventario_val_str)
          {
             $acceso_inventario_val_str .= ", ";
          }
          $acceso_inventario_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_gerencial_val_str = "''";
   if (!empty($this->acceso_gerencial))
   {
       if (is_array($this->acceso_gerencial))
       {
           $Tmp_array = $this->acceso_gerencial;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_gerencial);
       }
       $acceso_gerencial_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_gerencial_val_str)
          {
             $acceso_gerencial_val_str .= ", ";
          }
          $acceso_gerencial_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_restaurante_val_str = "''";
   if (!empty($this->acceso_restaurante))
   {
       if (is_array($this->acceso_restaurante))
       {
           $Tmp_array = $this->acceso_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_restaurante);
       }
       $acceso_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_restaurante_val_str)
          {
             $acceso_restaurante_val_str .= ", ";
          }
          $acceso_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idusuarios_grupos, descripcion  FROM usuarios_grupos  ORDER BY descripcion";

   $this->idusuarios = $old_value_idusuarios;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupo'][] = $rs->fields[0];
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
   function Form_lookup_activo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?S?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_grupocomanda()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda'] = array(); 
    }

   $old_value_idusuarios = $this->idusuarios;
   $this->nm_tira_formatacao();


   $unformatted_value_idusuarios = $this->idusuarios;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idgrupo, codigogru + ' -- ' + nomgrupo  FROM grupo  WHERE  idgrupo <> 1 ORDER BY codigogru, nomgrupo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idgrupo, concat(codigogru,' -- ',nomgrupo)  FROM grupo  WHERE  idgrupo <> 1 ORDER BY codigogru, nomgrupo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idgrupo, codigogru&' -- '&nomgrupo  FROM grupo  WHERE  idgrupo <> 1 ORDER BY codigogru, nomgrupo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idgrupo, codigogru||' -- '||nomgrupo  FROM grupo  WHERE  idgrupo <> 1 ORDER BY codigogru, nomgrupo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idgrupo, codigogru + ' -- ' + nomgrupo  FROM grupo  WHERE  idgrupo <> 1 ORDER BY codigogru, nomgrupo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idgrupo, codigogru||' -- '||nomgrupo  FROM grupo  WHERE  idgrupo <> 1 ORDER BY codigogru, nomgrupo";
   }
   else
   {
       $nm_comando = "SELECT idgrupo, codigogru||' -- '||nomgrupo  FROM grupo  WHERE  idgrupo <> 1 ORDER BY codigogru, nomgrupo";
   }

   $this->idusuarios = $old_value_idusuarios;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_grupocomanda'][] = $rs->fields[0];
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
   function Form_lookup_banco_movil()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil'] = array(); 
    }

   $old_value_idusuarios = $this->idusuarios;
   $this->nm_tira_formatacao();


   $unformatted_value_idusuarios = $this->idusuarios;

   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_inventario_val_str = "''";
   if (!empty($this->acceso_inventario))
   {
       if (is_array($this->acceso_inventario))
       {
           $Tmp_array = $this->acceso_inventario;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_inventario);
       }
       $acceso_inventario_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_inventario_val_str)
          {
             $acceso_inventario_val_str .= ", ";
          }
          $acceso_inventario_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_gerencial_val_str = "''";
   if (!empty($this->acceso_gerencial))
   {
       if (is_array($this->acceso_gerencial))
       {
           $Tmp_array = $this->acceso_gerencial;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_gerencial);
       }
       $acceso_gerencial_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_gerencial_val_str)
          {
             $acceso_gerencial_val_str .= ", ";
          }
          $acceso_gerencial_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_restaurante_val_str = "''";
   if (!empty($this->acceso_restaurante))
   {
       if (is_array($this->acceso_restaurante))
       {
           $Tmp_array = $this->acceso_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_restaurante);
       }
       $acceso_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_restaurante_val_str)
          {
             $acceso_restaurante_val_str .= ", ";
          }
          $acceso_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idcaja_vta, codigo_banco  FROM bancos  ORDER BY codigo_banco";

   $this->idusuarios = $old_value_idusuarios;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_banco_movil'][] = $rs->fields[0];
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
   function Form_lookup_idbod()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod'] = array(); 
    }

   $old_value_idusuarios = $this->idusuarios;
   $this->nm_tira_formatacao();


   $unformatted_value_idusuarios = $this->idusuarios;

   $activo_val_str = "''";
   if (!empty($this->activo))
   {
       if (is_array($this->activo))
       {
           $Tmp_array = $this->activo;
       }
       else
       {
           $Tmp_array = explode(";", $this->activo);
       }
       $activo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $activo_val_str)
          {
             $activo_val_str .= ", ";
          }
          $activo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_inventario_val_str = "''";
   if (!empty($this->acceso_inventario))
   {
       if (is_array($this->acceso_inventario))
       {
           $Tmp_array = $this->acceso_inventario;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_inventario);
       }
       $acceso_inventario_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_inventario_val_str)
          {
             $acceso_inventario_val_str .= ", ";
          }
          $acceso_inventario_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_gerencial_val_str = "''";
   if (!empty($this->acceso_gerencial))
   {
       if (is_array($this->acceso_gerencial))
       {
           $Tmp_array = $this->acceso_gerencial;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_gerencial);
       }
       $acceso_gerencial_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_gerencial_val_str)
          {
             $acceso_gerencial_val_str .= ", ";
          }
          $acceso_gerencial_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $acceso_restaurante_val_str = "''";
   if (!empty($this->acceso_restaurante))
   {
       if (is_array($this->acceso_restaurante))
       {
           $Tmp_array = $this->acceso_restaurante;
       }
       else
       {
           $Tmp_array = explode(";", $this->acceso_restaurante);
       }
       $acceso_restaurante_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $acceso_restaurante_val_str)
          {
             $acceso_restaurante_val_str .= ", ";
          }
          $acceso_restaurante_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idbodega, bodega  FROM bodegas  ORDER BY bodega";

   $this->idusuarios = $old_value_idusuarios;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['Lookup_idbod'][] = $rs->fields[0];
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
   function Form_lookup_ocultar_bod()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "MOSTRAR?#?SI?#?S?@?";
       $nmgp_def_dados .= "NO MOSTRAR?#?NO?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_acceso_inventario()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_acceso_gerencial()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_acceso_restaurante()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_usuarios_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "usuario", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nombre", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "correo", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "telefono", $arg_search, $data_search);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_usuarios = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['total'] = $qt_geral_reg_form_usuarios;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_usuarios_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_usuarios_pack_ajax_response();
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
      $nm_numeric[] = "idusuarios";$nm_numeric[] = "tercero";$nm_numeric[] = "resolucion";$nm_numeric[] = "grupo";$nm_numeric[] = "grupocomanda";$nm_numeric[] = "banco_movil";$nm_numeric[] = "idbod";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['decimal_db'] == ".")
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
      $Nm_datas['creacion'] = "timestamp";$Nm_datas['ultima_actualizacion'] = "timestamp";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['SC_sep_date1'];
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
       $nmgp_saida_form = "form_usuarios_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_usuarios_fim.php";
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
       form_usuarios_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_usuarios']['masterValue']);
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
    function sc_ajax_alert($sMessage, $params = array())
    {
        if ($this->NM_ajax_flag)
        {
            $this->NM_ajax_info['ajaxAlert']['message'] = NM_charset_to_utf8($sMessage);
            $this->NM_ajax_info['ajaxAlert']['params']  = $this->sc_ajax_alert_params($params);
        }
    } // sc_ajax_alert

    function sc_ajax_alert_params($params)
    {
        $paramList = array();
        foreach ($params as $paramName => $paramValue)
        {
            if (in_array($paramName, array('title', 'timer', 'confirmButtonText', 'confirmButtonFA', 'confirmButtonFAPos', 'cancelButtonText', 'cancelButtonFA', 'cancelButtonFAPos', 'footer', 'width', 'padding', 'position')))
            {
                $paramList[$paramName] = NM_charset_to_utf8($paramValue);
            }
            elseif (in_array($paramName, array('showConfirmButton', 'showCancelButton', 'toast')) && in_array($paramValue, array(true, false)))
            {
                $paramList[$paramName] = NM_charset_to_utf8($paramValue);
            }
            elseif ('position' == $paramName && in_array($paramValue, array('top', 'top-start', 'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', 'bottom-end')))
            {
                $paramList[$paramName] = NM_charset_to_utf8($paramValue);
            }
            elseif ('type' == $paramName && in_array($paramValue, array('warning', 'error', 'success', 'info', 'question')))
            {
                $paramList[$paramName] = NM_charset_to_utf8($paramValue);
            }
            elseif ('background' == $paramName)
            {
                $paramList[$paramName] = $this->sc_ajax_alert_image(NM_charset_to_utf8($paramValue));
            }
        }
        return $paramList;
    } // sc_ajax_alert_params

    function sc_ajax_alert_image($background)
    {
        $image_param = $background;
        preg_match_all('/url\(([\s])?(["|\'])?(.*?)(["|\'])?([\s])?\)/i', $background, $matches, PREG_PATTERN_ORDER);
        if (isset($matches[3])) {
            foreach ($matches[3] as $match) {
                if ('http:' != substr($match, 0, 5) && 'https:' != substr($match, 0, 6) && '/' != substr($match, 0, 1)) {
                    $image_param = str_replace($match, "{$this->Ini->path_img_global}/{$match}", $image_param);
                }
            }
        }
        return $image_param;
    } // sc_ajax_alert_image
    function sc_ajax_javascript($sJsFunc, $aParam = array())
    {
        if ($this->NM_ajax_flag)
        {
            foreach ($aParam as $i => $v)
            {
                $aParam[$i] = NM_charset_to_utf8($v);
            }
            $this->NM_ajax_info['ajaxJavascript'][] = array(NM_charset_to_utf8($sJsFunc), $aParam);
        }
        else
        {
            foreach ($aParam as $i => $v)
            {
                $aParam[$i] = '"' . str_replace('"', '\"', $v) . '"';
            }
            $this->NM_non_ajax_info['ajaxJavascript'][] = array($sJsFunc, $aParam);
        }
    } // sc_ajax_javascript
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
            case "permisos":
                return array("sc_permisos_top");
                break;
            case "copy":
                return array("sc_b_clone_t.sc-unique-btn-6");
                break;
            case "help":
                return array("sc_b_hlp_t");
                break;
            case "exit":
                return array("sc_b_sai_t.sc-unique-btn-7", "sc_b_sai_t.sc-unique-btn-8", "sc_b_sai_t.sc-unique-btn-10", "sc_b_sai_t.sc-unique-btn-9", "sc_b_sai_t.sc-unique-btn-11");
                break;
            case "birpara":
                return array("brec_b");
                break;
            case "first":
                return array("sc_b_ini_b.sc-unique-btn-12");
                break;
            case "back":
                return array("sc_b_ret_b.sc-unique-btn-13");
                break;
            case "forward":
                return array("sc_b_avc_b.sc-unique-btn-14");
                break;
            case "last":
                return array("sc_b_fim_b.sc-unique-btn-15");
                break;
        }

        return array($buttonName);
    } // getButtonIds

}
?>
