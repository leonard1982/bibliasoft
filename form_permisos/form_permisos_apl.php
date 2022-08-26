<?php
//
class form_permisos_apl
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
   var $idpermisos_;
   var $usuario_;
   var $usuario__1;
   var $terceros_lista_;
   var $terceros_lista__1;
   var $terceros_frm_;
   var $terceros_frm__1;
   var $productos_lista_;
   var $productos_lista__1;
   var $productos_frm_;
   var $productos_frm__1;
   var $grupos_lista_;
   var $grupos_lista__1;
   var $grupos_frm_;
   var $grupos_frm__1;
   var $usuarios_lista_;
   var $usuarios_lista__1;
   var $usuarios_frm_;
   var $usuarios_frm__1;
   var $compras_lista_;
   var $compras_lista__1;
   var $compras_frm_;
   var $compras_frm__1;
   var $ventas_lista_;
   var $ventas_lista__1;
   var $ventas_frm_;
   var $ventas_frm__1;
   var $cartera_lista_;
   var $cartera_lista__1;
   var $cartera_frm_;
   var $cartera_frm__1;
   var $caja_lista_;
   var $caja_lista__1;
   var $caja_frm_;
   var $caja_frm__1;
   var $mantenimiento_;
   var $mantenimiento__1;
   var $empresa_;
   var $empresa__1;
   var $inventario_;
   var $inventario__1;
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
   var $sc_teve_incl = false;
   var $sc_teve_excl = false;
   var $sc_teve_alt  = false;
   var $sc_after_all_insert = false;
   var $sc_after_all_update = false;
   var $sc_after_all_delete = false;
   var $sc_max_reg = 5; 
   var $sc_max_reg_incl = 5; 
   var $form_vert_form_permisos = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = true;
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
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['caja_frm_']))
          {
              $this->caja_frm_ = $this->NM_ajax_info['param']['caja_frm_'];
          }
          if (isset($this->NM_ajax_info['param']['caja_lista_']))
          {
              $this->caja_lista_ = $this->NM_ajax_info['param']['caja_lista_'];
          }
          if (isset($this->NM_ajax_info['param']['cartera_frm_']))
          {
              $this->cartera_frm_ = $this->NM_ajax_info['param']['cartera_frm_'];
          }
          if (isset($this->NM_ajax_info['param']['cartera_lista_']))
          {
              $this->cartera_lista_ = $this->NM_ajax_info['param']['cartera_lista_'];
          }
          if (isset($this->NM_ajax_info['param']['compras_frm_']))
          {
              $this->compras_frm_ = $this->NM_ajax_info['param']['compras_frm_'];
          }
          if (isset($this->NM_ajax_info['param']['compras_lista_']))
          {
              $this->compras_lista_ = $this->NM_ajax_info['param']['compras_lista_'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['empresa_']))
          {
              $this->empresa_ = $this->NM_ajax_info['param']['empresa_'];
          }
          if (isset($this->NM_ajax_info['param']['grupos_frm_']))
          {
              $this->grupos_frm_ = $this->NM_ajax_info['param']['grupos_frm_'];
          }
          if (isset($this->NM_ajax_info['param']['grupos_lista_']))
          {
              $this->grupos_lista_ = $this->NM_ajax_info['param']['grupos_lista_'];
          }
          if (isset($this->NM_ajax_info['param']['idpermisos_']))
          {
              $this->idpermisos_ = $this->NM_ajax_info['param']['idpermisos_'];
          }
          if (isset($this->NM_ajax_info['param']['inventario_']))
          {
              $this->inventario_ = $this->NM_ajax_info['param']['inventario_'];
          }
          if (isset($this->NM_ajax_info['param']['mantenimiento_']))
          {
              $this->mantenimiento_ = $this->NM_ajax_info['param']['mantenimiento_'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_row']))
          {
              $this->nmgp_refresh_row = $this->NM_ajax_info['param']['nmgp_refresh_row'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['productos_frm_']))
          {
              $this->productos_frm_ = $this->NM_ajax_info['param']['productos_frm_'];
          }
          if (isset($this->NM_ajax_info['param']['productos_lista_']))
          {
              $this->productos_lista_ = $this->NM_ajax_info['param']['productos_lista_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_clone']))
          {
              $this->sc_clone = $this->NM_ajax_info['param']['sc_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_clone']))
          {
              $this->sc_seq_clone = $this->NM_ajax_info['param']['sc_seq_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_vert']))
          {
              $this->sc_seq_vert = $this->NM_ajax_info['param']['sc_seq_vert'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['terceros_frm_']))
          {
              $this->terceros_frm_ = $this->NM_ajax_info['param']['terceros_frm_'];
          }
          if (isset($this->NM_ajax_info['param']['terceros_lista_']))
          {
              $this->terceros_lista_ = $this->NM_ajax_info['param']['terceros_lista_'];
          }
          if (isset($this->NM_ajax_info['param']['usuario_']))
          {
              $this->usuario_ = $this->NM_ajax_info['param']['usuario_'];
          }
          if (isset($this->NM_ajax_info['param']['usuarios_frm_']))
          {
              $this->usuarios_frm_ = $this->NM_ajax_info['param']['usuarios_frm_'];
          }
          if (isset($this->NM_ajax_info['param']['usuarios_lista_']))
          {
              $this->usuarios_lista_ = $this->NM_ajax_info['param']['usuarios_lista_'];
          }
          if (isset($this->NM_ajax_info['param']['ventas_frm_']))
          {
              $this->ventas_frm_ = $this->NM_ajax_info['param']['ventas_frm_'];
          }
          if (isset($this->NM_ajax_info['param']['ventas_lista_']))
          {
              $this->ventas_lista_ = $this->NM_ajax_info['param']['ventas_lista_'];
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
      $this->sc_conv_var['idpermisos'] = "idpermisos_";
      $this->sc_conv_var['usuario'] = "usuario_";
      $this->sc_conv_var['terceros_lista'] = "terceros_lista_";
      $this->sc_conv_var['terceros_frm'] = "terceros_frm_";
      $this->sc_conv_var['productos_lista'] = "productos_lista_";
      $this->sc_conv_var['productos_frm'] = "productos_frm_";
      $this->sc_conv_var['grupos_lista'] = "grupos_lista_";
      $this->sc_conv_var['grupos_frm'] = "grupos_frm_";
      $this->sc_conv_var['usuarios_lista'] = "usuarios_lista_";
      $this->sc_conv_var['usuarios_frm'] = "usuarios_frm_";
      $this->sc_conv_var['compras_lista'] = "compras_lista_";
      $this->sc_conv_var['compras_frm'] = "compras_frm_";
      $this->sc_conv_var['ventas_lista'] = "ventas_lista_";
      $this->sc_conv_var['ventas_frm'] = "ventas_frm_";
      $this->sc_conv_var['cartera_lista'] = "cartera_lista_";
      $this->sc_conv_var['cartera_frm'] = "cartera_frm_";
      $this->sc_conv_var['caja_lista'] = "caja_lista_";
      $this->sc_conv_var['caja_frm'] = "caja_frm_";
      $this->sc_conv_var['mantenimiento'] = "mantenimiento_";
      $this->sc_conv_var['empresa'] = "empresa_";
      $this->sc_conv_var['inventario'] = "inventario_";
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
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_permisos']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_permisos']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_permisos']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_permisos']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_permisos']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $this->NM_where_filter = "";
          $tem_where_parms       = false;
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
                 nm_limpa_str_form_permisos($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 if ($cadapar[0] == "idpermisos_")
                 {
                     $this->NM_where_filter .= (empty($this->NM_where_filter)) ? "(" : " and ";
                     $this->NM_where_filter .= "idpermisos = " . $this->idpermisos_;
                     $this->has_where_params = true;
                     $tem_where_parms        = true;
                 }
                 elseif ($cadapar[0] == "NM_where_filter")
                 {
                     $this->has_where_params = false;
                     $tem_where_parms        = false;
                 }
             }
             $ix++;
          }
          if ($tem_where_parms)
          {
              $this->NM_where_filter .= ")";
          }
          elseif (empty($this->NM_where_filter))
          {
              unset($this->NM_where_filter);
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_permisos']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_permisos']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_permisos']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_permisos']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_permisos']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_permisos']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_permisos']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_permisos']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_permisos']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_permisos']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_permisos']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_permisos']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_permisos']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_permisos']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_permisos_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['initialize'])
          {
              $_SESSION['scriptcase']['form_permisos']['contr_erro'] = 'on';
 ?>
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'pos', 'jquery-ui.css'); ?>">
<script src="<?php echo sc_url_library('prj', 'pos', 'jquery-1.11.1.js'); ?>"></script>
<script src="<?php echo sc_url_library('prj', 'pos', 'jquery-ui.js'); ?>"></script>
<script src="<?php echo sc_url_library('prj', 'pos', 'alertify.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'pos', 'css/alertify.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'pos', 'css/themes/default.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'pos', 'css/themes/semantic.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'pos', 'css/themes/bootstrap.min.css'); ?>">
<?php
$_SESSION['scriptcase']['form_permisos']['contr_erro'] = 'off';
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_permisos']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_permisos']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_permisos'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_permisos']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_permisos']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_permisos') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_permisos']['label'] = "Permisos";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_permisos")
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
      $this->Ini->Img_status_ok       = "" == trim($str_img_status_ok_mult)   ? ""     : $str_img_status_ok_mult;
      $this->Ini->Img_status_err      = "" == trim($str_img_status_err_mult)  ? ""     : $str_img_status_err_mult;
      $this->Ini->Css_status          = "scFormInputErrorMult";
      $this->Ini->Css_status_pwd_box  = "scFormInputErrorMultPwdBox";
      $this->Ini->Css_status_pwd_text = "scFormInputErrorMultPwdText";
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



      $_SESSION['scriptcase']['error_icon']['form_permisos']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_permisos'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['goto']      = 'on';
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
      if ('total' == $this->form_paginacao)
      {
          $this->nmgp_botoes['first']   = "off";
          $this->nmgp_botoes['back']    = "off";
          $this->nmgp_botoes['forward'] = "off";
          $this->nmgp_botoes['last']    = "off";
          $this->nmgp_botoes['navpage'] = "off";
          $this->nmgp_botoes['goto']    = "off";
          $this->nmgp_botoes['qtline']  = "off";
          $this->nmgp_botoes['summary'] = "on";
      }
      else
      {
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "on";
      $this->nmgp_botoes['reload'] = "off";
      }
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_permisos']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_permisos'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_permisos'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field . "_"] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field . "_"] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_permisos", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'form_permisos_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_permisos_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_permisos/form_permisos_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_permisos_erro.class.php"); 
      }
      $this->Erro      = new form_permisos_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_max_reg']) && strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_max_reg']) == "all")
      {
          $this->form_paginacao = "total";
      }
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['opcao']))
         { 
             if ($this->idpermisos_ != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
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

            $out1_img_cache = $_SESSION['scriptcase']['form_permisos']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['form_permisos']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- idpermisos_
      $this->field_config['idpermisos_']               = array();
      $this->field_config['idpermisos_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idpermisos_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idpermisos_']['symbol_dec'] = '';
      $this->field_config['idpermisos_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idpermisos_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($this->nmgp_opcao == "change_qtd_line")
      {
          $this->NM_btn_navega = "N";
          if (strtolower($this->nmgp_max_line) == "all")
          {
              $this->nmgp_opcao = "inicio";
              $this->form_paginacao = "total";
          }
          else
          {
              $this->nmgp_opcao = "igual";
              $this->form_paginacao = "parcial";
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_max_reg'] = $this->nmgp_max_line;
      }
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

      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['opc_edit'] = true;  
      $sc_contr_vert = (isset($GLOBALS["sc_contr_vert"])) ? $GLOBALS["sc_contr_vert"] : "";
      $sc_seq_vert   = 1; 
      $sc_opc_salva  = $this->nmgp_opcao; 
      $sc_todas_Crit = "";
      $sc_check_excl = array(); 
      $sc_check_incl = array(); 
      if (isset($GLOBALS["sc_check_vert"]) && is_array($GLOBALS["sc_check_vert"])) 
      { 
          if ($this->nmgp_opcao == "incluir" || ($this->nmgp_opcao == "recarga" && $this->nmgp_opc_ant == "novo"))
          {
              $sc_check_incl = $GLOBALS["sc_check_vert"]; 
          }
          elseif ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir" || $this->nmgp_opcao == "recarga")
          {
              $sc_check_excl = $GLOBALS["sc_check_vert"]; 
          }
      } 
      elseif ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $sc_check_incl = array($_POST['upload_file_row']);
      }
      if (empty($this->nmgp_opcao)) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "novo";
         $this->nm_select_banco();
         $this->nm_gera_html();
         $this->NM_ajax_info['newline'] = NM_utf8_urldecode($this->New_Line);
         $this->NM_close_db();
         form_permisos_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'backup_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "igual";
         $this->nm_tira_formatacao();
         $this->nm_select_banco();
         $this->ajax_return_values();
         $this->NM_close_db();
         form_permisos_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'submit_form' == $this->NM_ajax_opcao)
      {
         if (isset($this->usuario_)) { $this->nm_limpa_alfa($this->usuario_); }
         if (isset($this->terceros_lista_)) { $this->nm_limpa_alfa($this->terceros_lista_); }
         if (isset($this->terceros_frm_)) { $this->nm_limpa_alfa($this->terceros_frm_); }
         if (isset($this->productos_lista_)) { $this->nm_limpa_alfa($this->productos_lista_); }
         if (isset($this->productos_frm_)) { $this->nm_limpa_alfa($this->productos_frm_); }
         if (isset($this->grupos_lista_)) { $this->nm_limpa_alfa($this->grupos_lista_); }
         if (isset($this->grupos_frm_)) { $this->nm_limpa_alfa($this->grupos_frm_); }
         if (isset($this->usuarios_lista_)) { $this->nm_limpa_alfa($this->usuarios_lista_); }
         if (isset($this->usuarios_frm_)) { $this->nm_limpa_alfa($this->usuarios_frm_); }
         if (isset($this->compras_lista_)) { $this->nm_limpa_alfa($this->compras_lista_); }
         if (isset($this->compras_frm_)) { $this->nm_limpa_alfa($this->compras_frm_); }
         if (isset($this->ventas_lista_)) { $this->nm_limpa_alfa($this->ventas_lista_); }
         if (isset($this->ventas_frm_)) { $this->nm_limpa_alfa($this->ventas_frm_); }
         if (isset($this->cartera_lista_)) { $this->nm_limpa_alfa($this->cartera_lista_); }
         if (isset($this->cartera_frm_)) { $this->nm_limpa_alfa($this->cartera_frm_); }
         if (isset($this->caja_lista_)) { $this->nm_limpa_alfa($this->caja_lista_); }
         if (isset($this->caja_frm_)) { $this->nm_limpa_alfa($this->caja_frm_); }
         if (isset($this->mantenimiento_)) { $this->nm_limpa_alfa($this->mantenimiento_); }
         if (isset($this->empresa_)) { $this->nm_limpa_alfa($this->empresa_); }
         if (isset($this->inventario_)) { $this->nm_limpa_alfa($this->inventario_); }
         if (isset($this->Sc_num_lin_alt) && $this->Sc_num_lin_alt > 0) 
         {
             $sc_seq_vert = $this->Sc_num_lin_alt;
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_form'][$sc_seq_vert];
             $this->idpermisos_ = $this->nmgp_dados_form['idpermisos_']; 
         }
         $this->controle_form_vert();
         if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
         {
             $this->NM_rollback_db();
              if ($this->NM_ajax_flag)
              {
                  if (!isset($this->NM_ajax_info['errList']['geral_form_permisos']) || !is_array($this->NM_ajax_info['errList']['geral_form_permisos']))
                  {
                      $this->NM_ajax_info['errList']['geral_form_permisos'] = array();
                  }
                  if ($Campos_Crit != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_permisos'][] = $Campos_Crit;
                  }
                  if (!empty($Campos_Falta))
                  {
                      $this->NM_ajax_info['errList']['geral_form_permisos'][] = $this->Formata_Campos_Falta($Campos_Falta);
                  }
                  if ($this->Campos_Mens_erro != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_permisos'][] = $this->Campos_Mens_erro;
                  }
                  $this->NM_gera_nav_page(); 
                  $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              }
         }
         else
         {
             $this->NM_commit_db();
         }
         if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
         }
         $this->NM_close_db();
		if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'] && 'ERROR' != $this->NM_ajax_info['result']) {
			$this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
		}
		if ('incluir' == $this->NM_ajax_info['param']['nmgp_opcao'] && 'ERROR' != $this->NM_ajax_info['result']) {
			$this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmi']);
		}
		if ('excluir' == $this->NM_ajax_info['param']['nmgp_opcao'] && 'ERROR' != $this->NM_ajax_info['result']) {
			$this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmd']);
		}
         form_permisos_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
          if ('validate_usuario_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'usuario_');
          }
          if ('validate_terceros_lista_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'terceros_lista_');
          }
          if ('validate_terceros_frm_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'terceros_frm_');
          }
          if ('validate_productos_lista_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'productos_lista_');
          }
          if ('validate_productos_frm_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'productos_frm_');
          }
          if ('validate_grupos_lista_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'grupos_lista_');
          }
          if ('validate_grupos_frm_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'grupos_frm_');
          }
          if ('validate_usuarios_lista_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'usuarios_lista_');
          }
          if ('validate_usuarios_frm_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'usuarios_frm_');
          }
          if ('validate_compras_lista_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'compras_lista_');
          }
          if ('validate_compras_frm_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'compras_frm_');
          }
          if ('validate_ventas_lista_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ventas_lista_');
          }
          if ('validate_ventas_frm_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ventas_frm_');
          }
          if ('validate_cartera_lista_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cartera_lista_');
          }
          if ('validate_cartera_frm_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cartera_frm_');
          }
          if ('validate_caja_lista_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'caja_lista_');
          }
          if ('validate_caja_frm_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'caja_frm_');
          }
          if ('validate_mantenimiento_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'mantenimiento_');
          }
          if ('validate_empresa_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'empresa_');
          }
          if ('validate_inventario_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'inventario_');
          }
          form_permisos_pack_ajax_response();
          exit;
      }
      while ($sc_contr_vert > $sc_seq_vert) 
      { 
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
         $this->usuario_ = $GLOBALS["usuario_" . $sc_seq_vert]; 
         $this->terceros_lista_ = $GLOBALS["terceros_lista_" . $sc_seq_vert]; 
         $this->terceros_frm_ = $GLOBALS["terceros_frm_" . $sc_seq_vert]; 
         $this->productos_lista_ = $GLOBALS["productos_lista_" . $sc_seq_vert]; 
         $this->productos_frm_ = $GLOBALS["productos_frm_" . $sc_seq_vert]; 
         $this->grupos_lista_ = $GLOBALS["grupos_lista_" . $sc_seq_vert]; 
         $this->grupos_frm_ = $GLOBALS["grupos_frm_" . $sc_seq_vert]; 
         $this->usuarios_lista_ = $GLOBALS["usuarios_lista_" . $sc_seq_vert]; 
         $this->usuarios_frm_ = $GLOBALS["usuarios_frm_" . $sc_seq_vert]; 
         $this->compras_lista_ = $GLOBALS["compras_lista_" . $sc_seq_vert]; 
         $this->compras_frm_ = $GLOBALS["compras_frm_" . $sc_seq_vert]; 
         $this->ventas_lista_ = $GLOBALS["ventas_lista_" . $sc_seq_vert]; 
         $this->ventas_frm_ = $GLOBALS["ventas_frm_" . $sc_seq_vert]; 
         $this->cartera_lista_ = $GLOBALS["cartera_lista_" . $sc_seq_vert]; 
         $this->cartera_frm_ = $GLOBALS["cartera_frm_" . $sc_seq_vert]; 
         $this->caja_lista_ = $GLOBALS["caja_lista_" . $sc_seq_vert]; 
         $this->caja_frm_ = $GLOBALS["caja_frm_" . $sc_seq_vert]; 
         $this->mantenimiento_ = $GLOBALS["mantenimiento_" . $sc_seq_vert]; 
         $this->empresa_ = $GLOBALS["empresa_" . $sc_seq_vert]; 
         $this->inventario_ = $GLOBALS["inventario_" . $sc_seq_vert]; 
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_form'][$sc_seq_vert];
             $this->idpermisos_ = $this->nmgp_dados_form['idpermisos_']; 
         }
         if (isset($this->usuario_)) { $this->nm_limpa_alfa($this->usuario_); }
         if (isset($this->terceros_lista_)) { $this->nm_limpa_alfa($this->terceros_lista_); }
         if (isset($this->terceros_frm_)) { $this->nm_limpa_alfa($this->terceros_frm_); }
         if (isset($this->productos_lista_)) { $this->nm_limpa_alfa($this->productos_lista_); }
         if (isset($this->productos_frm_)) { $this->nm_limpa_alfa($this->productos_frm_); }
         if (isset($this->grupos_lista_)) { $this->nm_limpa_alfa($this->grupos_lista_); }
         if (isset($this->grupos_frm_)) { $this->nm_limpa_alfa($this->grupos_frm_); }
         if (isset($this->usuarios_lista_)) { $this->nm_limpa_alfa($this->usuarios_lista_); }
         if (isset($this->usuarios_frm_)) { $this->nm_limpa_alfa($this->usuarios_frm_); }
         if (isset($this->compras_lista_)) { $this->nm_limpa_alfa($this->compras_lista_); }
         if (isset($this->compras_frm_)) { $this->nm_limpa_alfa($this->compras_frm_); }
         if (isset($this->ventas_lista_)) { $this->nm_limpa_alfa($this->ventas_lista_); }
         if (isset($this->ventas_frm_)) { $this->nm_limpa_alfa($this->ventas_frm_); }
         if (isset($this->cartera_lista_)) { $this->nm_limpa_alfa($this->cartera_lista_); }
         if (isset($this->cartera_frm_)) { $this->nm_limpa_alfa($this->cartera_frm_); }
         if (isset($this->caja_lista_)) { $this->nm_limpa_alfa($this->caja_lista_); }
         if (isset($this->caja_frm_)) { $this->nm_limpa_alfa($this->caja_frm_); }
         if (isset($this->mantenimiento_)) { $this->nm_limpa_alfa($this->mantenimiento_); }
         if (isset($this->empresa_)) { $this->nm_limpa_alfa($this->empresa_); }
         if (isset($this->inventario_)) { $this->nm_limpa_alfa($this->inventario_); }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_form'])) 
         {
            $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_form'][$sc_seq_vert];
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'])) 
         {
            $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert];
         }
         if ($this->nmgp_opcao != "recarga" && in_array($sc_seq_vert, $sc_check_excl))
         {
             $this->nmgp_opcao = "excluir";
         }
         if ($this->nmgp_opcao == "incluir" && !in_array($sc_seq_vert, $sc_check_incl))
         { }
         else
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_disabled'] = array();
             $this->controle_form_vert(); 
             $this->nmgp_opcao = $sc_opc_salva; 
             if ($this->nmgp_opcao != "recarga"  && $this->nmgp_opcao != "muda_form" && ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != ""))
             {
                 $sc_todas_Crit .= (!empty($sc_todas_Crit)) ? "<br>" : ""; 
                 $sc_todas_Crit .= "<B>" . $this->Ini->Nm_lang['lang_errm_line'] . $sc_seq_vert . "</B>: "; 
                 $sc_todas_Crit .= $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
                 $this->Campos_Mens_erro = ""; 
             }
             if ($this->nmgp_opcao != "recarga") 
             {
                $this->nm_guardar_campos();
                $this->nm_formatar_campos();
             }
             $this->form_vert_form_permisos[$sc_seq_vert]['usuario_'] =  $this->usuario_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['terceros_lista_'] =  $this->terceros_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['terceros_frm_'] =  $this->terceros_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['productos_lista_'] =  $this->productos_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['productos_frm_'] =  $this->productos_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['grupos_lista_'] =  $this->grupos_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['grupos_frm_'] =  $this->grupos_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['usuarios_lista_'] =  $this->usuarios_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['usuarios_frm_'] =  $this->usuarios_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['compras_lista_'] =  $this->compras_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['compras_frm_'] =  $this->compras_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['ventas_lista_'] =  $this->ventas_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['ventas_frm_'] =  $this->ventas_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['cartera_lista_'] =  $this->cartera_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['cartera_frm_'] =  $this->cartera_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['caja_lista_'] =  $this->caja_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['caja_frm_'] =  $this->caja_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['mantenimiento_'] =  $this->mantenimiento_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['empresa_'] =  $this->empresa_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['inventario_'] =  $this->inventario_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['idpermisos_'] =  $this->idpermisos_; 
         }
         $sc_seq_vert++; 
      } 
      if (!empty($sc_todas_Crit)) 
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sc_todas_Crit); 
          if ($this->nmgp_opcao == "incluir")
          { 
              $this->nmgp_opcao = "novo"; 
          }
      } 
      elseif ($this->nmgp_opcao == "incluir")
      { 
          $this->nmgp_opcao = "novo"; 
      }
      if ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $this->nmgp_opcao = 'igual';
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form") 
      { 
          if ($this->sc_teve_incl) 
          { 
              $this->sc_after_all_insert = true;
          }
          if ($this->sc_teve_alt) 
          { 
              $this->sc_after_all_update = true;
          }
          if ($this->sc_teve_excl) 
          { 
              $this->sc_after_all_delete = true;
          }
          if (empty($sc_todas_Crit)) 
          { 
              $this->NM_commit_db(); 
              $this->nm_select_banco();
              $sc_check_excl = array(); 
          } 
          else
          { 
              $this->NM_rollback_db(); 
          } 
      } 
      if ($this->nmgp_opcao == "recarga") 
      { 
          $this->NM_gera_nav_page(); 
      } 
      if ($this->NM_ajax_flag && ('navigate_form' == $this->NM_ajax_opcao || !empty($this->nmgp_refresh_fields)))
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          $this->NM_close_db();
          form_permisos_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
      {
          $this->nm_gera_html();
          $this->NM_ajax_info['tableRefresh'] = NM_charset_to_utf8($this->Table_refresh . $this->New_Line) . '</table>';
          $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
          $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_form_permisos);
          $this->NM_ajax_info['fldList']['idpermisos_']['keyVal'] = sc_htmlentities($this->nmgp_dados_form['idpermisos_']);
          $this->NM_close_db();
          form_permisos_pack_ajax_response();
          exit;
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      $this->nm_todas_criticas = $sc_todas_Crit;
      $this->nm_gera_html();
      $this->NM_close_db(); 
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
   function controle_form_vert()
   {
     global $nm_opc_lookup,$Campos_Crit, $Campos_Falta, $Campos_Erros, 
            $glo_senha_protect, $nm_apl_dependente, $nm_form_submit;

//
//-----> 
//
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->terceros_lista_))
          {
              $x = 0; 
              $this->terceros_lista__1 = $this->terceros_lista_;
              $this->terceros_lista_ = ""; 
              if ($this->terceros_lista__1 != "") 
              { 
                  foreach ($this->terceros_lista__1 as $dados_terceros_lista__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->terceros_lista_ .= ";";
                      } 
                      $this->terceros_lista_ .= $dados_terceros_lista__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->terceros_frm_))
          {
              $x = 0; 
              $this->terceros_frm__1 = $this->terceros_frm_;
              $this->terceros_frm_ = ""; 
              if ($this->terceros_frm__1 != "") 
              { 
                  foreach ($this->terceros_frm__1 as $dados_terceros_frm__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->terceros_frm_ .= ";";
                      } 
                      $this->terceros_frm_ .= $dados_terceros_frm__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->productos_lista_))
          {
              $x = 0; 
              $this->productos_lista__1 = $this->productos_lista_;
              $this->productos_lista_ = ""; 
              if ($this->productos_lista__1 != "") 
              { 
                  foreach ($this->productos_lista__1 as $dados_productos_lista__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->productos_lista_ .= ";";
                      } 
                      $this->productos_lista_ .= $dados_productos_lista__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->productos_frm_))
          {
              $x = 0; 
              $this->productos_frm__1 = $this->productos_frm_;
              $this->productos_frm_ = ""; 
              if ($this->productos_frm__1 != "") 
              { 
                  foreach ($this->productos_frm__1 as $dados_productos_frm__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->productos_frm_ .= ";";
                      } 
                      $this->productos_frm_ .= $dados_productos_frm__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->grupos_lista_))
          {
              $x = 0; 
              $this->grupos_lista__1 = $this->grupos_lista_;
              $this->grupos_lista_ = ""; 
              if ($this->grupos_lista__1 != "") 
              { 
                  foreach ($this->grupos_lista__1 as $dados_grupos_lista__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->grupos_lista_ .= ";";
                      } 
                      $this->grupos_lista_ .= $dados_grupos_lista__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->grupos_frm_))
          {
              $x = 0; 
              $this->grupos_frm__1 = $this->grupos_frm_;
              $this->grupos_frm_ = ""; 
              if ($this->grupos_frm__1 != "") 
              { 
                  foreach ($this->grupos_frm__1 as $dados_grupos_frm__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->grupos_frm_ .= ";";
                      } 
                      $this->grupos_frm_ .= $dados_grupos_frm__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->usuarios_lista_))
          {
              $x = 0; 
              $this->usuarios_lista__1 = $this->usuarios_lista_;
              $this->usuarios_lista_ = ""; 
              if ($this->usuarios_lista__1 != "") 
              { 
                  foreach ($this->usuarios_lista__1 as $dados_usuarios_lista__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->usuarios_lista_ .= ";";
                      } 
                      $this->usuarios_lista_ .= $dados_usuarios_lista__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->usuarios_frm_))
          {
              $x = 0; 
              $this->usuarios_frm__1 = $this->usuarios_frm_;
              $this->usuarios_frm_ = ""; 
              if ($this->usuarios_frm__1 != "") 
              { 
                  foreach ($this->usuarios_frm__1 as $dados_usuarios_frm__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->usuarios_frm_ .= ";";
                      } 
                      $this->usuarios_frm_ .= $dados_usuarios_frm__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->compras_lista_))
          {
              $x = 0; 
              $this->compras_lista__1 = $this->compras_lista_;
              $this->compras_lista_ = ""; 
              if ($this->compras_lista__1 != "") 
              { 
                  foreach ($this->compras_lista__1 as $dados_compras_lista__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->compras_lista_ .= ";";
                      } 
                      $this->compras_lista_ .= $dados_compras_lista__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->compras_frm_))
          {
              $x = 0; 
              $this->compras_frm__1 = $this->compras_frm_;
              $this->compras_frm_ = ""; 
              if ($this->compras_frm__1 != "") 
              { 
                  foreach ($this->compras_frm__1 as $dados_compras_frm__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->compras_frm_ .= ";";
                      } 
                      $this->compras_frm_ .= $dados_compras_frm__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->ventas_lista_))
          {
              $x = 0; 
              $this->ventas_lista__1 = $this->ventas_lista_;
              $this->ventas_lista_ = ""; 
              if ($this->ventas_lista__1 != "") 
              { 
                  foreach ($this->ventas_lista__1 as $dados_ventas_lista__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->ventas_lista_ .= ";";
                      } 
                      $this->ventas_lista_ .= $dados_ventas_lista__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->ventas_frm_))
          {
              $x = 0; 
              $this->ventas_frm__1 = $this->ventas_frm_;
              $this->ventas_frm_ = ""; 
              if ($this->ventas_frm__1 != "") 
              { 
                  foreach ($this->ventas_frm__1 as $dados_ventas_frm__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->ventas_frm_ .= ";";
                      } 
                      $this->ventas_frm_ .= $dados_ventas_frm__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->cartera_lista_))
          {
              $x = 0; 
              $this->cartera_lista__1 = $this->cartera_lista_;
              $this->cartera_lista_ = ""; 
              if ($this->cartera_lista__1 != "") 
              { 
                  foreach ($this->cartera_lista__1 as $dados_cartera_lista__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->cartera_lista_ .= ";";
                      } 
                      $this->cartera_lista_ .= $dados_cartera_lista__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->cartera_frm_))
          {
              $x = 0; 
              $this->cartera_frm__1 = $this->cartera_frm_;
              $this->cartera_frm_ = ""; 
              if ($this->cartera_frm__1 != "") 
              { 
                  foreach ($this->cartera_frm__1 as $dados_cartera_frm__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->cartera_frm_ .= ";";
                      } 
                      $this->cartera_frm_ .= $dados_cartera_frm__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->caja_lista_))
          {
              $x = 0; 
              $this->caja_lista__1 = $this->caja_lista_;
              $this->caja_lista_ = ""; 
              if ($this->caja_lista__1 != "") 
              { 
                  foreach ($this->caja_lista__1 as $dados_caja_lista__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->caja_lista_ .= ";";
                      } 
                      $this->caja_lista_ .= $dados_caja_lista__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->caja_frm_))
          {
              $x = 0; 
              $this->caja_frm__1 = $this->caja_frm_;
              $this->caja_frm_ = ""; 
              if ($this->caja_frm__1 != "") 
              { 
                  foreach ($this->caja_frm__1 as $dados_caja_frm__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->caja_frm_ .= ";";
                      } 
                      $this->caja_frm_ .= $dados_caja_frm__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->mantenimiento_))
          {
              $x = 0; 
              $this->mantenimiento__1 = $this->mantenimiento_;
              $this->mantenimiento_ = ""; 
              if ($this->mantenimiento__1 != "") 
              { 
                  foreach ($this->mantenimiento__1 as $dados_mantenimiento__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->mantenimiento_ .= ";";
                      } 
                      $this->mantenimiento_ .= $dados_mantenimiento__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->empresa_))
          {
              $x = 0; 
              $this->empresa__1 = $this->empresa_;
              $this->empresa_ = ""; 
              if ($this->empresa__1 != "") 
              { 
                  foreach ($this->empresa__1 as $dados_empresa__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->empresa_ .= ";";
                      } 
                      $this->empresa_ .= $dados_empresa__1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->inventario_))
          {
              $x = 0; 
              $this->inventario__1 = $this->inventario_;
              $this->inventario_ = ""; 
              if ($this->inventario__1 != "") 
              { 
                  foreach ($this->inventario__1 as $dados_inventario__1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->inventario_ .= ";";
                      } 
                      $this->inventario_ .= $dados_inventario__1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_permisos_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          return; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_permisos']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
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
   }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_permisos.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Permisos") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" /> 
  <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
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
<form name="Fdown" method="get" action="form_permisos_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_permisos"> 
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
           case 'usuario_':
               return "Usuario";
               break;
           case 'terceros_lista_':
               return "Lista";
               break;
           case 'terceros_frm_':
               return "Frm";
               break;
           case 'productos_lista_':
               return "Lista";
               break;
           case 'productos_frm_':
               return "Frm";
               break;
           case 'grupos_lista_':
               return "Lista";
               break;
           case 'grupos_frm_':
               return "Frm";
               break;
           case 'usuarios_lista_':
               return "Lista";
               break;
           case 'usuarios_frm_':
               return "Frm";
               break;
           case 'compras_lista_':
               return "Lista";
               break;
           case 'compras_frm_':
               return "Frm";
               break;
           case 'ventas_lista_':
               return "Lista";
               break;
           case 'ventas_frm_':
               return "Frm";
               break;
           case 'cartera_lista_':
               return "Lista";
               break;
           case 'cartera_frm_':
               return "Frm";
               break;
           case 'caja_lista_':
               return "Lista";
               break;
           case 'caja_frm_':
               return "Frm";
               break;
           case 'mantenimiento_':
               return "Mantenimiento";
               break;
           case 'empresa_':
               return "Empresa";
               break;
           case 'inventario_':
               return "Inventario";
               break;
           case 'idpermisos_':
               return "Idpermisos";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_permisos']) || !is_array($this->NM_ajax_info['errList']['geral_form_permisos']))
              {
                  $this->NM_ajax_info['errList']['geral_form_permisos'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_permisos'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'usuario_' == $filtro)) || (is_array($filtro) && in_array('usuario_', $filtro)))
        $this->ValidateField_usuario_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'terceros_lista_' == $filtro)) || (is_array($filtro) && in_array('terceros_lista_', $filtro)))
        $this->ValidateField_terceros_lista_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'terceros_frm_' == $filtro)) || (is_array($filtro) && in_array('terceros_frm_', $filtro)))
        $this->ValidateField_terceros_frm_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'productos_lista_' == $filtro)) || (is_array($filtro) && in_array('productos_lista_', $filtro)))
        $this->ValidateField_productos_lista_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'productos_frm_' == $filtro)) || (is_array($filtro) && in_array('productos_frm_', $filtro)))
        $this->ValidateField_productos_frm_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'grupos_lista_' == $filtro)) || (is_array($filtro) && in_array('grupos_lista_', $filtro)))
        $this->ValidateField_grupos_lista_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'grupos_frm_' == $filtro)) || (is_array($filtro) && in_array('grupos_frm_', $filtro)))
        $this->ValidateField_grupos_frm_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'usuarios_lista_' == $filtro)) || (is_array($filtro) && in_array('usuarios_lista_', $filtro)))
        $this->ValidateField_usuarios_lista_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'usuarios_frm_' == $filtro)) || (is_array($filtro) && in_array('usuarios_frm_', $filtro)))
        $this->ValidateField_usuarios_frm_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'compras_lista_' == $filtro)) || (is_array($filtro) && in_array('compras_lista_', $filtro)))
        $this->ValidateField_compras_lista_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'compras_frm_' == $filtro)) || (is_array($filtro) && in_array('compras_frm_', $filtro)))
        $this->ValidateField_compras_frm_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ventas_lista_' == $filtro)) || (is_array($filtro) && in_array('ventas_lista_', $filtro)))
        $this->ValidateField_ventas_lista_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ventas_frm_' == $filtro)) || (is_array($filtro) && in_array('ventas_frm_', $filtro)))
        $this->ValidateField_ventas_frm_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cartera_lista_' == $filtro)) || (is_array($filtro) && in_array('cartera_lista_', $filtro)))
        $this->ValidateField_cartera_lista_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cartera_frm_' == $filtro)) || (is_array($filtro) && in_array('cartera_frm_', $filtro)))
        $this->ValidateField_cartera_frm_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'caja_lista_' == $filtro)) || (is_array($filtro) && in_array('caja_lista_', $filtro)))
        $this->ValidateField_caja_lista_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'caja_frm_' == $filtro)) || (is_array($filtro) && in_array('caja_frm_', $filtro)))
        $this->ValidateField_caja_frm_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'mantenimiento_' == $filtro)) || (is_array($filtro) && in_array('mantenimiento_', $filtro)))
        $this->ValidateField_mantenimiento_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'empresa_' == $filtro)) || (is_array($filtro) && in_array('empresa_', $filtro)))
        $this->ValidateField_empresa_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'inventario_' == $filtro)) || (is_array($filtro) && in_array('inventario_', $filtro)))
        $this->ValidateField_inventario_($Campos_Crit, $Campos_Falta, $Campos_Erros);

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['form_permisos']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_usuario_ = $this->usuario_;
}
 if ($this->sc_evento == "incluir" || $this->sc_evento == "insert")
{
	if(empty($this->usuario_ )){
		$this->sc_ajax_javascript('fMensaje', array("Advertencia","Por favor seleccione un usuario antes de guardar. El formuario será recargado.","form_permisos"));
		;
	}
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_usuario_ != $this->usuario_ || (isset($bFlagRead_usuario_) && $bFlagRead_usuario_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['usuario_' . $this->nmgp_refresh_row]['type']    = 'select';
        $this->NM_ajax_info['fldList']['usuario_' . $this->nmgp_refresh_row]['valList'] = array($this->usuario_);
        $this->NM_ajax_changed['usuario_'] = true;
    }
}
$_SESSION['scriptcase']['form_permisos']['contr_erro'] = 'off'; 
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

    function ValidateField_usuario_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->usuario_) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_']) && !in_array($this->usuario_, $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['usuario_']))
                   {
                       $Campos_Erros['usuario_'] = array();
                   }
                   $Campos_Erros['usuario_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['usuario_']) || !is_array($this->NM_ajax_info['errList']['usuario_']))
                   {
                       $this->NM_ajax_info['errList']['usuario_'] = array();
                   }
                   $this->NM_ajax_info['errList']['usuario_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'usuario_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_usuario_

    function ValidateField_terceros_lista_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->terceros_lista_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->terceros_lista_ = "N";
      } 
      else 
      { 
          if (is_array($this->terceros_lista_))
          {
              $x = 0; 
              $this->terceros_lista__1 = array(); 
              foreach ($this->terceros_lista_ as $ind => $dados_terceros_lista__1 ) 
              {
                  if ($dados_terceros_lista__1 != "") 
                  {
                      $this->terceros_lista__1[] = $dados_terceros_lista__1;
                  } 
              } 
              $this->terceros_lista_ = ""; 
              foreach ($this->terceros_lista__1 as $dados_terceros_lista__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->terceros_lista_ .= ";";
                   } 
                   $this->terceros_lista_ .= $dados_terceros_lista__1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'terceros_lista_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_terceros_lista_

    function ValidateField_terceros_frm_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->terceros_frm_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->terceros_frm_ = "N";
      } 
      else 
      { 
          if (is_array($this->terceros_frm_))
          {
              $x = 0; 
              $this->terceros_frm__1 = array(); 
              foreach ($this->terceros_frm_ as $ind => $dados_terceros_frm__1 ) 
              {
                  if ($dados_terceros_frm__1 != "") 
                  {
                      $this->terceros_frm__1[] = $dados_terceros_frm__1;
                  } 
              } 
              $this->terceros_frm_ = ""; 
              foreach ($this->terceros_frm__1 as $dados_terceros_frm__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->terceros_frm_ .= ";";
                   } 
                   $this->terceros_frm_ .= $dados_terceros_frm__1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'terceros_frm_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_terceros_frm_

    function ValidateField_productos_lista_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->productos_lista_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->productos_lista_ = "N";
      } 
      else 
      { 
          if (is_array($this->productos_lista_))
          {
              $x = 0; 
              $this->productos_lista__1 = array(); 
              foreach ($this->productos_lista_ as $ind => $dados_productos_lista__1 ) 
              {
                  if ($dados_productos_lista__1 != "") 
                  {
                      $this->productos_lista__1[] = $dados_productos_lista__1;
                  } 
              } 
              $this->productos_lista_ = ""; 
              foreach ($this->productos_lista__1 as $dados_productos_lista__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->productos_lista_ .= ";";
                   } 
                   $this->productos_lista_ .= $dados_productos_lista__1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'productos_lista_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_productos_lista_

    function ValidateField_productos_frm_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->productos_frm_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->productos_frm_ = "N";
      } 
      else 
      { 
          if (is_array($this->productos_frm_))
          {
              $x = 0; 
              $this->productos_frm__1 = array(); 
              foreach ($this->productos_frm_ as $ind => $dados_productos_frm__1 ) 
              {
                  if ($dados_productos_frm__1 != "") 
                  {
                      $this->productos_frm__1[] = $dados_productos_frm__1;
                  } 
              } 
              $this->productos_frm_ = ""; 
              foreach ($this->productos_frm__1 as $dados_productos_frm__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->productos_frm_ .= ";";
                   } 
                   $this->productos_frm_ .= $dados_productos_frm__1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'productos_frm_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_productos_frm_

    function ValidateField_grupos_lista_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->grupos_lista_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->grupos_lista_ = "N";
      } 
      else 
      { 
          if (is_array($this->grupos_lista_))
          {
              $x = 0; 
              $this->grupos_lista__1 = array(); 
              foreach ($this->grupos_lista_ as $ind => $dados_grupos_lista__1 ) 
              {
                  if ($dados_grupos_lista__1 != "") 
                  {
                      $this->grupos_lista__1[] = $dados_grupos_lista__1;
                  } 
              } 
              $this->grupos_lista_ = ""; 
              foreach ($this->grupos_lista__1 as $dados_grupos_lista__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->grupos_lista_ .= ";";
                   } 
                   $this->grupos_lista_ .= $dados_grupos_lista__1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'grupos_lista_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_grupos_lista_

    function ValidateField_grupos_frm_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->grupos_frm_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->grupos_frm_ = "N";
      } 
      else 
      { 
          if (is_array($this->grupos_frm_))
          {
              $x = 0; 
              $this->grupos_frm__1 = array(); 
              foreach ($this->grupos_frm_ as $ind => $dados_grupos_frm__1 ) 
              {
                  if ($dados_grupos_frm__1 != "") 
                  {
                      $this->grupos_frm__1[] = $dados_grupos_frm__1;
                  } 
              } 
              $this->grupos_frm_ = ""; 
              foreach ($this->grupos_frm__1 as $dados_grupos_frm__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->grupos_frm_ .= ";";
                   } 
                   $this->grupos_frm_ .= $dados_grupos_frm__1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'grupos_frm_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_grupos_frm_

    function ValidateField_usuarios_lista_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->usuarios_lista_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->usuarios_lista_ = "N";
      } 
      else 
      { 
          if (is_array($this->usuarios_lista_))
          {
              $x = 0; 
              $this->usuarios_lista__1 = array(); 
              foreach ($this->usuarios_lista_ as $ind => $dados_usuarios_lista__1 ) 
              {
                  if ($dados_usuarios_lista__1 != "") 
                  {
                      $this->usuarios_lista__1[] = $dados_usuarios_lista__1;
                  } 
              } 
              $this->usuarios_lista_ = ""; 
              foreach ($this->usuarios_lista__1 as $dados_usuarios_lista__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->usuarios_lista_ .= ";";
                   } 
                   $this->usuarios_lista_ .= $dados_usuarios_lista__1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'usuarios_lista_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_usuarios_lista_

    function ValidateField_usuarios_frm_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->usuarios_frm_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->usuarios_frm_ = "N";
      } 
      else 
      { 
          if (is_array($this->usuarios_frm_))
          {
              $x = 0; 
              $this->usuarios_frm__1 = array(); 
              foreach ($this->usuarios_frm_ as $ind => $dados_usuarios_frm__1 ) 
              {
                  if ($dados_usuarios_frm__1 != "") 
                  {
                      $this->usuarios_frm__1[] = $dados_usuarios_frm__1;
                  } 
              } 
              $this->usuarios_frm_ = ""; 
              foreach ($this->usuarios_frm__1 as $dados_usuarios_frm__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->usuarios_frm_ .= ";";
                   } 
                   $this->usuarios_frm_ .= $dados_usuarios_frm__1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'usuarios_frm_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_usuarios_frm_

    function ValidateField_compras_lista_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->compras_lista_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->compras_lista_ = "N";
      } 
      else 
      { 
          if (is_array($this->compras_lista_))
          {
              $x = 0; 
              $this->compras_lista__1 = array(); 
              foreach ($this->compras_lista_ as $ind => $dados_compras_lista__1 ) 
              {
                  if ($dados_compras_lista__1 != "") 
                  {
                      $this->compras_lista__1[] = $dados_compras_lista__1;
                  } 
              } 
              $this->compras_lista_ = ""; 
              foreach ($this->compras_lista__1 as $dados_compras_lista__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->compras_lista_ .= ";";
                   } 
                   $this->compras_lista_ .= $dados_compras_lista__1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'compras_lista_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_compras_lista_

    function ValidateField_compras_frm_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->compras_frm_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->compras_frm_ = "N";
      } 
      else 
      { 
          if (is_array($this->compras_frm_))
          {
              $x = 0; 
              $this->compras_frm__1 = array(); 
              foreach ($this->compras_frm_ as $ind => $dados_compras_frm__1 ) 
              {
                  if ($dados_compras_frm__1 != "") 
                  {
                      $this->compras_frm__1[] = $dados_compras_frm__1;
                  } 
              } 
              $this->compras_frm_ = ""; 
              foreach ($this->compras_frm__1 as $dados_compras_frm__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->compras_frm_ .= ";";
                   } 
                   $this->compras_frm_ .= $dados_compras_frm__1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'compras_frm_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_compras_frm_

    function ValidateField_ventas_lista_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ventas_lista_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->ventas_lista_ = "N";
      } 
      else 
      { 
          if (is_array($this->ventas_lista_))
          {
              $x = 0; 
              $this->ventas_lista__1 = array(); 
              foreach ($this->ventas_lista_ as $ind => $dados_ventas_lista__1 ) 
              {
                  if ($dados_ventas_lista__1 != "") 
                  {
                      $this->ventas_lista__1[] = $dados_ventas_lista__1;
                  } 
              } 
              $this->ventas_lista_ = ""; 
              foreach ($this->ventas_lista__1 as $dados_ventas_lista__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->ventas_lista_ .= ";";
                   } 
                   $this->ventas_lista_ .= $dados_ventas_lista__1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ventas_lista_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ventas_lista_

    function ValidateField_ventas_frm_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ventas_frm_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->ventas_frm_ = "N";
      } 
      else 
      { 
          if (is_array($this->ventas_frm_))
          {
              $x = 0; 
              $this->ventas_frm__1 = array(); 
              foreach ($this->ventas_frm_ as $ind => $dados_ventas_frm__1 ) 
              {
                  if ($dados_ventas_frm__1 != "") 
                  {
                      $this->ventas_frm__1[] = $dados_ventas_frm__1;
                  } 
              } 
              $this->ventas_frm_ = ""; 
              foreach ($this->ventas_frm__1 as $dados_ventas_frm__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->ventas_frm_ .= ";";
                   } 
                   $this->ventas_frm_ .= $dados_ventas_frm__1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ventas_frm_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ventas_frm_

    function ValidateField_cartera_lista_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cartera_lista_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->cartera_lista_ = "N";
      } 
      else 
      { 
          if (is_array($this->cartera_lista_))
          {
              $x = 0; 
              $this->cartera_lista__1 = array(); 
              foreach ($this->cartera_lista_ as $ind => $dados_cartera_lista__1 ) 
              {
                  if ($dados_cartera_lista__1 != "") 
                  {
                      $this->cartera_lista__1[] = $dados_cartera_lista__1;
                  } 
              } 
              $this->cartera_lista_ = ""; 
              foreach ($this->cartera_lista__1 as $dados_cartera_lista__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->cartera_lista_ .= ";";
                   } 
                   $this->cartera_lista_ .= $dados_cartera_lista__1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cartera_lista_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cartera_lista_

    function ValidateField_cartera_frm_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cartera_frm_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->cartera_frm_ = "N";
      } 
      else 
      { 
          if (is_array($this->cartera_frm_))
          {
              $x = 0; 
              $this->cartera_frm__1 = array(); 
              foreach ($this->cartera_frm_ as $ind => $dados_cartera_frm__1 ) 
              {
                  if ($dados_cartera_frm__1 != "") 
                  {
                      $this->cartera_frm__1[] = $dados_cartera_frm__1;
                  } 
              } 
              $this->cartera_frm_ = ""; 
              foreach ($this->cartera_frm__1 as $dados_cartera_frm__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->cartera_frm_ .= ";";
                   } 
                   $this->cartera_frm_ .= $dados_cartera_frm__1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cartera_frm_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cartera_frm_

    function ValidateField_caja_lista_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->caja_lista_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->caja_lista_ = "N";
      } 
      else 
      { 
          if (is_array($this->caja_lista_))
          {
              $x = 0; 
              $this->caja_lista__1 = array(); 
              foreach ($this->caja_lista_ as $ind => $dados_caja_lista__1 ) 
              {
                  if ($dados_caja_lista__1 != "") 
                  {
                      $this->caja_lista__1[] = $dados_caja_lista__1;
                  } 
              } 
              $this->caja_lista_ = ""; 
              foreach ($this->caja_lista__1 as $dados_caja_lista__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->caja_lista_ .= ";";
                   } 
                   $this->caja_lista_ .= $dados_caja_lista__1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'caja_lista_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_caja_lista_

    function ValidateField_caja_frm_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->caja_frm_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->caja_frm_ = "N";
      } 
      else 
      { 
          if (is_array($this->caja_frm_))
          {
              $x = 0; 
              $this->caja_frm__1 = array(); 
              foreach ($this->caja_frm_ as $ind => $dados_caja_frm__1 ) 
              {
                  if ($dados_caja_frm__1 != "") 
                  {
                      $this->caja_frm__1[] = $dados_caja_frm__1;
                  } 
              } 
              $this->caja_frm_ = ""; 
              foreach ($this->caja_frm__1 as $dados_caja_frm__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->caja_frm_ .= ";";
                   } 
                   $this->caja_frm_ .= $dados_caja_frm__1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'caja_frm_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_caja_frm_

    function ValidateField_mantenimiento_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->mantenimiento_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->mantenimiento_ = "N";
      } 
      else 
      { 
          if (is_array($this->mantenimiento_))
          {
              $x = 0; 
              $this->mantenimiento__1 = array(); 
              foreach ($this->mantenimiento_ as $ind => $dados_mantenimiento__1 ) 
              {
                  if ($dados_mantenimiento__1 != "") 
                  {
                      $this->mantenimiento__1[] = $dados_mantenimiento__1;
                  } 
              } 
              $this->mantenimiento_ = ""; 
              foreach ($this->mantenimiento__1 as $dados_mantenimiento__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->mantenimiento_ .= ";";
                   } 
                   $this->mantenimiento_ .= $dados_mantenimiento__1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'mantenimiento_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_mantenimiento_

    function ValidateField_empresa_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->empresa_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->empresa_ = "N";
      } 
      else 
      { 
          if (is_array($this->empresa_))
          {
              $x = 0; 
              $this->empresa__1 = array(); 
              foreach ($this->empresa_ as $ind => $dados_empresa__1 ) 
              {
                  if ($dados_empresa__1 != "") 
                  {
                      $this->empresa__1[] = $dados_empresa__1;
                  } 
              } 
              $this->empresa_ = ""; 
              foreach ($this->empresa__1 as $dados_empresa__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->empresa_ .= ";";
                   } 
                   $this->empresa_ .= $dados_empresa__1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'empresa_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_empresa_

    function ValidateField_inventario_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->inventario_ == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->inventario_ = "N";
      } 
      else 
      { 
          if (is_array($this->inventario_))
          {
              $x = 0; 
              $this->inventario__1 = array(); 
              foreach ($this->inventario_ as $ind => $dados_inventario__1 ) 
              {
                  if ($dados_inventario__1 != "") 
                  {
                      $this->inventario__1[] = $dados_inventario__1;
                  } 
              } 
              $this->inventario_ = ""; 
              foreach ($this->inventario__1 as $dados_inventario__1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->inventario_ .= ";";
                   } 
                   $this->inventario_ .= $dados_inventario__1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'inventario_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_inventario_

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
    $this->nmgp_dados_form['usuario_'] = $this->usuario_;
    $this->nmgp_dados_form['terceros_lista_'] = $this->terceros_lista_;
    $this->nmgp_dados_form['terceros_frm_'] = $this->terceros_frm_;
    $this->nmgp_dados_form['productos_lista_'] = $this->productos_lista_;
    $this->nmgp_dados_form['productos_frm_'] = $this->productos_frm_;
    $this->nmgp_dados_form['grupos_lista_'] = $this->grupos_lista_;
    $this->nmgp_dados_form['grupos_frm_'] = $this->grupos_frm_;
    $this->nmgp_dados_form['usuarios_lista_'] = $this->usuarios_lista_;
    $this->nmgp_dados_form['usuarios_frm_'] = $this->usuarios_frm_;
    $this->nmgp_dados_form['compras_lista_'] = $this->compras_lista_;
    $this->nmgp_dados_form['compras_frm_'] = $this->compras_frm_;
    $this->nmgp_dados_form['ventas_lista_'] = $this->ventas_lista_;
    $this->nmgp_dados_form['ventas_frm_'] = $this->ventas_frm_;
    $this->nmgp_dados_form['cartera_lista_'] = $this->cartera_lista_;
    $this->nmgp_dados_form['cartera_frm_'] = $this->cartera_frm_;
    $this->nmgp_dados_form['caja_lista_'] = $this->caja_lista_;
    $this->nmgp_dados_form['caja_frm_'] = $this->caja_frm_;
    $this->nmgp_dados_form['mantenimiento_'] = $this->mantenimiento_;
    $this->nmgp_dados_form['empresa_'] = $this->empresa_;
    $this->nmgp_dados_form['inventario_'] = $this->inventario_;
    $this->nmgp_dados_form['idpermisos_'] = $this->idpermisos_;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_form'][$sc_seq_vert] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['idpermisos_'] = $this->idpermisos_;
      nm_limpa_numero($this->idpermisos_, $this->field_config['idpermisos_']['symbol_grp']) ; 
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
      if ($Nome_Campo == "idpermisos_")
      {
          nm_limpa_numero($this->idpermisos_, $this->field_config['idpermisos_']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
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
          $this->ajax_return_values_all_vert();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idpermisos_']['keyVal'] = form_permisos_pack_protect_string($this->nmgp_dados_form['idpermisos_']);
          }
   } // ajax_return_values
   function ajax_return_values_all_vert()
   {
          if (isset($this->nmgp_refresh_fields) && isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_permisos[$this->nmgp_refresh_row] = $this->NM_ajax_info['param'];
              if ((isset($this->Embutida_ronly) && $this->Embutida_ronly) || $this->NM_ajax_force_values)
              {
                  if (isset($this->NM_ajax_changed['usuario_']) && $this->NM_ajax_changed['usuario_'])
                  {
                      $this->form_vert_form_permisos[$this->nmgp_refresh_row]['usuario_'] = $this->usuario_;
                  }
                  if (isset($this->NM_ajax_changed['terceros_lista_']) && $this->NM_ajax_changed['terceros_lista_'])
                  {
                      $this->form_vert_form_permisos[$this->nmgp_refresh_row]['terceros_lista_'] = $this->terceros_lista_;
                  }
                  if (isset($this->NM_ajax_changed['terceros_frm_']) && $this->NM_ajax_changed['terceros_frm_'])
                  {
                      $this->form_vert_form_permisos[$this->nmgp_refresh_row]['terceros_frm_'] = $this->terceros_frm_;
                  }
                  if (isset($this->NM_ajax_changed['productos_lista_']) && $this->NM_ajax_changed['productos_lista_'])
                  {
                      $this->form_vert_form_permisos[$this->nmgp_refresh_row]['productos_lista_'] = $this->productos_lista_;
                  }
                  if (isset($this->NM_ajax_changed['productos_frm_']) && $this->NM_ajax_changed['productos_frm_'])
                  {
                      $this->form_vert_form_permisos[$this->nmgp_refresh_row]['productos_frm_'] = $this->productos_frm_;
                  }
                  if (isset($this->NM_ajax_changed['grupos_lista_']) && $this->NM_ajax_changed['grupos_lista_'])
                  {
                      $this->form_vert_form_permisos[$this->nmgp_refresh_row]['grupos_lista_'] = $this->grupos_lista_;
                  }
                  if (isset($this->NM_ajax_changed['grupos_frm_']) && $this->NM_ajax_changed['grupos_frm_'])
                  {
                      $this->form_vert_form_permisos[$this->nmgp_refresh_row]['grupos_frm_'] = $this->grupos_frm_;
                  }
                  if (isset($this->NM_ajax_changed['usuarios_lista_']) && $this->NM_ajax_changed['usuarios_lista_'])
                  {
                      $this->form_vert_form_permisos[$this->nmgp_refresh_row]['usuarios_lista_'] = $this->usuarios_lista_;
                  }
                  if (isset($this->NM_ajax_changed['usuarios_frm_']) && $this->NM_ajax_changed['usuarios_frm_'])
                  {
                      $this->form_vert_form_permisos[$this->nmgp_refresh_row]['usuarios_frm_'] = $this->usuarios_frm_;
                  }
                  if (isset($this->NM_ajax_changed['compras_lista_']) && $this->NM_ajax_changed['compras_lista_'])
                  {
                      $this->form_vert_form_permisos[$this->nmgp_refresh_row]['compras_lista_'] = $this->compras_lista_;
                  }
                  if (isset($this->NM_ajax_changed['compras_frm_']) && $this->NM_ajax_changed['compras_frm_'])
                  {
                      $this->form_vert_form_permisos[$this->nmgp_refresh_row]['compras_frm_'] = $this->compras_frm_;
                  }
                  if (isset($this->NM_ajax_changed['ventas_lista_']) && $this->NM_ajax_changed['ventas_lista_'])
                  {
                      $this->form_vert_form_permisos[$this->nmgp_refresh_row]['ventas_lista_'] = $this->ventas_lista_;
                  }
                  if (isset($this->NM_ajax_changed['ventas_frm_']) && $this->NM_ajax_changed['ventas_frm_'])
                  {
                      $this->form_vert_form_permisos[$this->nmgp_refresh_row]['ventas_frm_'] = $this->ventas_frm_;
                  }
                  if (isset($this->NM_ajax_changed['cartera_lista_']) && $this->NM_ajax_changed['cartera_lista_'])
                  {
                      $this->form_vert_form_permisos[$this->nmgp_refresh_row]['cartera_lista_'] = $this->cartera_lista_;
                  }
                  if (isset($this->NM_ajax_changed['cartera_frm_']) && $this->NM_ajax_changed['cartera_frm_'])
                  {
                      $this->form_vert_form_permisos[$this->nmgp_refresh_row]['cartera_frm_'] = $this->cartera_frm_;
                  }
                  if (isset($this->NM_ajax_changed['caja_lista_']) && $this->NM_ajax_changed['caja_lista_'])
                  {
                      $this->form_vert_form_permisos[$this->nmgp_refresh_row]['caja_lista_'] = $this->caja_lista_;
                  }
                  if (isset($this->NM_ajax_changed['caja_frm_']) && $this->NM_ajax_changed['caja_frm_'])
                  {
                      $this->form_vert_form_permisos[$this->nmgp_refresh_row]['caja_frm_'] = $this->caja_frm_;
                  }
                  if (isset($this->NM_ajax_changed['mantenimiento_']) && $this->NM_ajax_changed['mantenimiento_'])
                  {
                      $this->form_vert_form_permisos[$this->nmgp_refresh_row]['mantenimiento_'] = $this->mantenimiento_;
                  }
                  if (isset($this->NM_ajax_changed['empresa_']) && $this->NM_ajax_changed['empresa_'])
                  {
                      $this->form_vert_form_permisos[$this->nmgp_refresh_row]['empresa_'] = $this->empresa_;
                  }
                  if (isset($this->NM_ajax_changed['inventario_']) && $this->NM_ajax_changed['inventario_'])
                  {
                      $this->form_vert_form_permisos[$this->nmgp_refresh_row]['inventario_'] = $this->inventario_;
                  }
              }
          }
          if (isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_permisos[$this->nmgp_refresh_row]['terceros_lista_'] = $this->terceros_lista_;
              $this->form_vert_form_permisos[$this->nmgp_refresh_row]['terceros_frm_'] = $this->terceros_frm_;
              $this->form_vert_form_permisos[$this->nmgp_refresh_row]['productos_lista_'] = $this->productos_lista_;
              $this->form_vert_form_permisos[$this->nmgp_refresh_row]['productos_frm_'] = $this->productos_frm_;
              $this->form_vert_form_permisos[$this->nmgp_refresh_row]['grupos_lista_'] = $this->grupos_lista_;
              $this->form_vert_form_permisos[$this->nmgp_refresh_row]['grupos_frm_'] = $this->grupos_frm_;
              $this->form_vert_form_permisos[$this->nmgp_refresh_row]['usuarios_lista_'] = $this->usuarios_lista_;
              $this->form_vert_form_permisos[$this->nmgp_refresh_row]['usuarios_frm_'] = $this->usuarios_frm_;
              $this->form_vert_form_permisos[$this->nmgp_refresh_row]['compras_lista_'] = $this->compras_lista_;
              $this->form_vert_form_permisos[$this->nmgp_refresh_row]['compras_frm_'] = $this->compras_frm_;
              $this->form_vert_form_permisos[$this->nmgp_refresh_row]['ventas_lista_'] = $this->ventas_lista_;
              $this->form_vert_form_permisos[$this->nmgp_refresh_row]['ventas_frm_'] = $this->ventas_frm_;
              $this->form_vert_form_permisos[$this->nmgp_refresh_row]['cartera_lista_'] = $this->cartera_lista_;
              $this->form_vert_form_permisos[$this->nmgp_refresh_row]['cartera_frm_'] = $this->cartera_frm_;
              $this->form_vert_form_permisos[$this->nmgp_refresh_row]['caja_lista_'] = $this->caja_lista_;
              $this->form_vert_form_permisos[$this->nmgp_refresh_row]['caja_frm_'] = $this->caja_frm_;
              $this->form_vert_form_permisos[$this->nmgp_refresh_row]['mantenimiento_'] = $this->mantenimiento_;
              $this->form_vert_form_permisos[$this->nmgp_refresh_row]['empresa_'] = $this->empresa_;
              $this->form_vert_form_permisos[$this->nmgp_refresh_row]['inventario_'] = $this->inventario_;
          }
          $this->NM_ajax_info['rsSize']            = sizeof($this->form_vert_form_permisos);
          $this->NM_ajax_info['buttonDisplayVert'] = array();
          foreach($this->form_vert_form_permisos as $sc_seq_vert => $aRecData)
          {
              $this->loadRecordState($sc_seq_vert);
              if ('navigate_form' == $this->NM_ajax_opcao) {
                  $this->NM_ajax_info['buttonDisplayVert'][] = array(
                      'seq'      => $sc_seq_vert,
                      'gridView' => false,
                      'delete'   => $this->nmgp_botoes['delete'],
                      'update'   => $this->nmgp_botoes['update'],
                  );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("usuario_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['usuario_']);
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_'] = array(); 
}
$aLookup[] = array(form_permisos_pack_protect_string('') => str_replace('<', '&lt;',form_permisos_pack_protect_string('SELECCIONE')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   $nm_comando = "SELECT idusuarios, usuario  FROM usuarios  WHERE idusuarios != 1 ORDER BY usuario";
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_permisos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_permisos_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_'][] = $rs->fields[0];
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
          $sSelComp = "name=\"usuario_\"";
          if (isset($this->NM_ajax_info['select_html']['usuario_']) && !empty($this->NM_ajax_info['select_html']['usuario_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['usuario_']) . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $this->NM_ajax_info['fldList']['usuario_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
               'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['usuario_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['usuario_' . $sc_seq_vert]['valList'][$i] = form_permisos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['usuario_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['usuario_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['usuario_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("terceros_lista_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['terceros_lista_']);
                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_terceros_lista_'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['terceros_lista_']) && !empty($this->NM_ajax_info['select_html']['terceros_lista_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['terceros_lista_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['terceros_lista_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'switch'  => false,
                       'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-terceros_lista_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['terceros_lista_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['terceros_lista_' . $sc_seq_vert]['valList'][$i] = form_permisos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['terceros_lista_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['terceros_lista_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['terceros_lista_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("terceros_frm_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['terceros_frm_']);
                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_terceros_frm_'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['terceros_frm_']) && !empty($this->NM_ajax_info['select_html']['terceros_frm_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['terceros_frm_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['terceros_frm_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'switch'  => false,
                       'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-terceros_frm_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['terceros_frm_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['terceros_frm_' . $sc_seq_vert]['valList'][$i] = form_permisos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['terceros_frm_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['terceros_frm_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['terceros_frm_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("productos_lista_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['productos_lista_']);
                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_productos_lista_'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['productos_lista_']) && !empty($this->NM_ajax_info['select_html']['productos_lista_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['productos_lista_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['productos_lista_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'switch'  => false,
                       'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-productos_lista_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['productos_lista_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['productos_lista_' . $sc_seq_vert]['valList'][$i] = form_permisos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['productos_lista_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['productos_lista_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['productos_lista_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("productos_frm_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['productos_frm_']);
                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_productos_frm_'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['productos_frm_']) && !empty($this->NM_ajax_info['select_html']['productos_frm_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['productos_frm_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['productos_frm_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'switch'  => false,
                       'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-productos_frm_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['productos_frm_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['productos_frm_' . $sc_seq_vert]['valList'][$i] = form_permisos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['productos_frm_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['productos_frm_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['productos_frm_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("grupos_lista_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['grupos_lista_']);
                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_grupos_lista_'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['grupos_lista_']) && !empty($this->NM_ajax_info['select_html']['grupos_lista_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['grupos_lista_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['grupos_lista_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'switch'  => false,
                       'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-grupos_lista_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['grupos_lista_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['grupos_lista_' . $sc_seq_vert]['valList'][$i] = form_permisos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['grupos_lista_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['grupos_lista_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['grupos_lista_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("grupos_frm_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['grupos_frm_']);
                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_grupos_frm_'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['grupos_frm_']) && !empty($this->NM_ajax_info['select_html']['grupos_frm_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['grupos_frm_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['grupos_frm_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'switch'  => false,
                       'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-grupos_frm_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['grupos_frm_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['grupos_frm_' . $sc_seq_vert]['valList'][$i] = form_permisos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['grupos_frm_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['grupos_frm_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['grupos_frm_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("usuarios_lista_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['usuarios_lista_']);
                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuarios_lista_'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['usuarios_lista_']) && !empty($this->NM_ajax_info['select_html']['usuarios_lista_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['usuarios_lista_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['usuarios_lista_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'switch'  => false,
                       'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-usuarios_lista_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['usuarios_lista_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['usuarios_lista_' . $sc_seq_vert]['valList'][$i] = form_permisos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['usuarios_lista_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['usuarios_lista_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['usuarios_lista_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("usuarios_frm_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['usuarios_frm_']);
                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuarios_frm_'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['usuarios_frm_']) && !empty($this->NM_ajax_info['select_html']['usuarios_frm_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['usuarios_frm_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['usuarios_frm_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'switch'  => false,
                       'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-usuarios_frm_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['usuarios_frm_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['usuarios_frm_' . $sc_seq_vert]['valList'][$i] = form_permisos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['usuarios_frm_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['usuarios_frm_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['usuarios_frm_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("compras_lista_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['compras_lista_']);
                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_compras_lista_'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['compras_lista_']) && !empty($this->NM_ajax_info['select_html']['compras_lista_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['compras_lista_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['compras_lista_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'switch'  => false,
                       'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-compras_lista_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['compras_lista_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['compras_lista_' . $sc_seq_vert]['valList'][$i] = form_permisos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['compras_lista_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['compras_lista_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['compras_lista_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("compras_frm_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['compras_frm_']);
                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_compras_frm_'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['compras_frm_']) && !empty($this->NM_ajax_info['select_html']['compras_frm_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['compras_frm_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['compras_frm_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'switch'  => false,
                       'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-compras_frm_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['compras_frm_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['compras_frm_' . $sc_seq_vert]['valList'][$i] = form_permisos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['compras_frm_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['compras_frm_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['compras_frm_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ventas_lista_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['ventas_lista_']);
                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_ventas_lista_'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ventas_lista_']) && !empty($this->NM_ajax_info['select_html']['ventas_lista_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ventas_lista_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['ventas_lista_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'switch'  => false,
                       'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-ventas_lista_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ventas_lista_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ventas_lista_' . $sc_seq_vert]['valList'][$i] = form_permisos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ventas_lista_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ventas_lista_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ventas_lista_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ventas_frm_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['ventas_frm_']);
                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_ventas_frm_'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ventas_frm_']) && !empty($this->NM_ajax_info['select_html']['ventas_frm_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ventas_frm_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['ventas_frm_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'switch'  => false,
                       'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-ventas_frm_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ventas_frm_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ventas_frm_' . $sc_seq_vert]['valList'][$i] = form_permisos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ventas_frm_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ventas_frm_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ventas_frm_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cartera_lista_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['cartera_lista_']);
                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_cartera_lista_'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['cartera_lista_']) && !empty($this->NM_ajax_info['select_html']['cartera_lista_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['cartera_lista_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['cartera_lista_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'switch'  => false,
                       'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-cartera_lista_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['cartera_lista_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['cartera_lista_' . $sc_seq_vert]['valList'][$i] = form_permisos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['cartera_lista_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['cartera_lista_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['cartera_lista_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cartera_frm_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['cartera_frm_']);
                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_cartera_frm_'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['cartera_frm_']) && !empty($this->NM_ajax_info['select_html']['cartera_frm_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['cartera_frm_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['cartera_frm_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'switch'  => false,
                       'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-cartera_frm_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['cartera_frm_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['cartera_frm_' . $sc_seq_vert]['valList'][$i] = form_permisos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['cartera_frm_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['cartera_frm_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['cartera_frm_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("caja_lista_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['caja_lista_']);
                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_caja_lista_'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['caja_lista_']) && !empty($this->NM_ajax_info['select_html']['caja_lista_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['caja_lista_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['caja_lista_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'switch'  => false,
                       'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-caja_lista_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['caja_lista_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['caja_lista_' . $sc_seq_vert]['valList'][$i] = form_permisos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['caja_lista_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['caja_lista_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['caja_lista_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("caja_frm_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['caja_frm_']);
                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_caja_frm_'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['caja_frm_']) && !empty($this->NM_ajax_info['select_html']['caja_frm_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['caja_frm_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['caja_frm_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'switch'  => false,
                       'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-caja_frm_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['caja_frm_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['caja_frm_' . $sc_seq_vert]['valList'][$i] = form_permisos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['caja_frm_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['caja_frm_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['caja_frm_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("mantenimiento_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['mantenimiento_']);
                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_mantenimiento_'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['mantenimiento_']) && !empty($this->NM_ajax_info['select_html']['mantenimiento_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['mantenimiento_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['mantenimiento_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'switch'  => false,
                       'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-mantenimiento_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['mantenimiento_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['mantenimiento_' . $sc_seq_vert]['valList'][$i] = form_permisos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['mantenimiento_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['mantenimiento_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['mantenimiento_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("empresa_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['empresa_']);
                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_empresa_'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['empresa_']) && !empty($this->NM_ajax_info['select_html']['empresa_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['empresa_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['empresa_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'switch'  => false,
                       'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-empresa_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['empresa_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['empresa_' . $sc_seq_vert]['valList'][$i] = form_permisos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['empresa_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['empresa_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['empresa_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("inventario_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['inventario_']);
                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_inventario_'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['inventario_']) && !empty($this->NM_ajax_info['select_html']['inventario_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['inventario_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['inventario_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'checkbox',
                       'switch'  => false,
                       'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-inventario_',
               'optMulti' => $sc_seq_vert,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['inventario_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['inventario_' . $sc_seq_vert]['valList'][$i] = form_permisos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['inventario_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['inventario_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['inventario_' . $sc_seq_vert]['labList'] = $aLabel;
              }
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['upload_dir'][$fieldName][] = $newName;
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
  function nm_proc_onload_record($sc_seq_vert=0)
  {
  }
  function nm_proc_onload($bFormat = true)
  {
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
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
      global $sc_seq_vert,  $nm_form_submit, $teste_validade, $sc_where;
 
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
      if ($this->nmgp_opcao == "alterar")
      {
          $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert];
          if ($this->nmgp_dados_select['usuario_'] == $this->usuario_ &&
              $this->nmgp_dados_select['terceros_lista_'] == $this->terceros_lista_ &&
              $this->nmgp_dados_select['terceros_frm_'] == $this->terceros_frm_ &&
              $this->nmgp_dados_select['productos_lista_'] == $this->productos_lista_ &&
              $this->nmgp_dados_select['productos_frm_'] == $this->productos_frm_ &&
              $this->nmgp_dados_select['grupos_lista_'] == $this->grupos_lista_ &&
              $this->nmgp_dados_select['grupos_frm_'] == $this->grupos_frm_ &&
              $this->nmgp_dados_select['usuarios_lista_'] == $this->usuarios_lista_ &&
              $this->nmgp_dados_select['usuarios_frm_'] == $this->usuarios_frm_ &&
              $this->nmgp_dados_select['compras_lista_'] == $this->compras_lista_ &&
              $this->nmgp_dados_select['compras_frm_'] == $this->compras_frm_ &&
              $this->nmgp_dados_select['ventas_lista_'] == $this->ventas_lista_ &&
              $this->nmgp_dados_select['ventas_frm_'] == $this->ventas_frm_ &&
              $this->nmgp_dados_select['cartera_lista_'] == $this->cartera_lista_ &&
              $this->nmgp_dados_select['cartera_frm_'] == $this->cartera_frm_ &&
              $this->nmgp_dados_select['caja_lista_'] == $this->caja_lista_ &&
              $this->nmgp_dados_select['caja_frm_'] == $this->caja_frm_ &&
              $this->nmgp_dados_select['mantenimiento_'] == $this->mantenimiento_ &&
              $this->nmgp_dados_select['empresa_'] == $this->empresa_ &&
              $this->nmgp_dados_select['inventario_'] == $this->inventario_)
          { }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['usuario_'] = $this->usuario_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['terceros_lista_'] = $this->terceros_lista_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['terceros_frm_'] = $this->terceros_frm_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['productos_lista_'] = $this->productos_lista_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['productos_frm_'] = $this->productos_frm_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['grupos_lista_'] = $this->grupos_lista_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['grupos_frm_'] = $this->grupos_frm_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['usuarios_lista_'] = $this->usuarios_lista_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['usuarios_frm_'] = $this->usuarios_frm_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['compras_lista_'] = $this->compras_lista_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['compras_frm_'] = $this->compras_frm_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['ventas_lista_'] = $this->ventas_lista_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['ventas_frm_'] = $this->ventas_frm_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['cartera_lista_'] = $this->cartera_lista_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['cartera_frm_'] = $this->cartera_frm_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['caja_lista_'] = $this->caja_lista_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['caja_frm_'] = $this->caja_frm_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['mantenimiento_'] = $this->mantenimiento_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['empresa_'] = $this->empresa_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['inventario_'] = $this->inventario_;
          }
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
      if ('incluir' == $this->nmgp_opcao && $this->usuario_ == ""){$this->usuario_ = "null"; $NM_val_null[] = "usuario_";}  
      $NM_val_form['usuario_'] = $this->usuario_;
      $NM_val_form['terceros_lista_'] = $this->terceros_lista_;
      $NM_val_form['terceros_frm_'] = $this->terceros_frm_;
      $NM_val_form['productos_lista_'] = $this->productos_lista_;
      $NM_val_form['productos_frm_'] = $this->productos_frm_;
      $NM_val_form['grupos_lista_'] = $this->grupos_lista_;
      $NM_val_form['grupos_frm_'] = $this->grupos_frm_;
      $NM_val_form['usuarios_lista_'] = $this->usuarios_lista_;
      $NM_val_form['usuarios_frm_'] = $this->usuarios_frm_;
      $NM_val_form['compras_lista_'] = $this->compras_lista_;
      $NM_val_form['compras_frm_'] = $this->compras_frm_;
      $NM_val_form['ventas_lista_'] = $this->ventas_lista_;
      $NM_val_form['ventas_frm_'] = $this->ventas_frm_;
      $NM_val_form['cartera_lista_'] = $this->cartera_lista_;
      $NM_val_form['cartera_frm_'] = $this->cartera_frm_;
      $NM_val_form['caja_lista_'] = $this->caja_lista_;
      $NM_val_form['caja_frm_'] = $this->caja_frm_;
      $NM_val_form['mantenimiento_'] = $this->mantenimiento_;
      $NM_val_form['empresa_'] = $this->empresa_;
      $NM_val_form['inventario_'] = $this->inventario_;
      $NM_val_form['idpermisos_'] = $this->idpermisos_;
      if ($this->idpermisos_ === "" || is_null($this->idpermisos_))  
      { 
          $this->idpermisos_ = 0;
      } 
      if ($this->usuario_ === "" || is_null($this->usuario_))  
      { 
          $this->usuario_ = 0;
          $this->sc_force_zero[] = 'usuario_';
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
      if ($this->nmgp_opcao == "alterar")
      {
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
      if ($this->nmgp_opcao == "alterar")
      {
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
      if ($this->nmgp_opcao == "alterar")
      {
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
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->terceros_lista__before_qstr = $this->terceros_lista_;
          $this->terceros_lista_ = substr($this->Db->qstr($this->terceros_lista_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->terceros_lista_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->terceros_lista_ = "null"; 
                  $NM_val_null[] = "terceros_lista_";
              } 
          }
          $this->terceros_frm__before_qstr = $this->terceros_frm_;
          $this->terceros_frm_ = substr($this->Db->qstr($this->terceros_frm_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->terceros_frm_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->terceros_frm_ = "null"; 
                  $NM_val_null[] = "terceros_frm_";
              } 
          }
          $this->productos_lista__before_qstr = $this->productos_lista_;
          $this->productos_lista_ = substr($this->Db->qstr($this->productos_lista_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->productos_lista_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->productos_lista_ = "null"; 
                  $NM_val_null[] = "productos_lista_";
              } 
          }
          $this->productos_frm__before_qstr = $this->productos_frm_;
          $this->productos_frm_ = substr($this->Db->qstr($this->productos_frm_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->productos_frm_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->productos_frm_ = "null"; 
                  $NM_val_null[] = "productos_frm_";
              } 
          }
          $this->grupos_lista__before_qstr = $this->grupos_lista_;
          $this->grupos_lista_ = substr($this->Db->qstr($this->grupos_lista_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->grupos_lista_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->grupos_lista_ = "null"; 
                  $NM_val_null[] = "grupos_lista_";
              } 
          }
          $this->grupos_frm__before_qstr = $this->grupos_frm_;
          $this->grupos_frm_ = substr($this->Db->qstr($this->grupos_frm_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->grupos_frm_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->grupos_frm_ = "null"; 
                  $NM_val_null[] = "grupos_frm_";
              } 
          }
          $this->usuarios_lista__before_qstr = $this->usuarios_lista_;
          $this->usuarios_lista_ = substr($this->Db->qstr($this->usuarios_lista_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->usuarios_lista_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->usuarios_lista_ = "null"; 
                  $NM_val_null[] = "usuarios_lista_";
              } 
          }
          $this->usuarios_frm__before_qstr = $this->usuarios_frm_;
          $this->usuarios_frm_ = substr($this->Db->qstr($this->usuarios_frm_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->usuarios_frm_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->usuarios_frm_ = "null"; 
                  $NM_val_null[] = "usuarios_frm_";
              } 
          }
          $this->compras_lista__before_qstr = $this->compras_lista_;
          $this->compras_lista_ = substr($this->Db->qstr($this->compras_lista_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->compras_lista_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->compras_lista_ = "null"; 
                  $NM_val_null[] = "compras_lista_";
              } 
          }
          $this->compras_frm__before_qstr = $this->compras_frm_;
          $this->compras_frm_ = substr($this->Db->qstr($this->compras_frm_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->compras_frm_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->compras_frm_ = "null"; 
                  $NM_val_null[] = "compras_frm_";
              } 
          }
          $this->ventas_lista__before_qstr = $this->ventas_lista_;
          $this->ventas_lista_ = substr($this->Db->qstr($this->ventas_lista_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->ventas_lista_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->ventas_lista_ = "null"; 
                  $NM_val_null[] = "ventas_lista_";
              } 
          }
          $this->ventas_frm__before_qstr = $this->ventas_frm_;
          $this->ventas_frm_ = substr($this->Db->qstr($this->ventas_frm_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->ventas_frm_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->ventas_frm_ = "null"; 
                  $NM_val_null[] = "ventas_frm_";
              } 
          }
          $this->cartera_lista__before_qstr = $this->cartera_lista_;
          $this->cartera_lista_ = substr($this->Db->qstr($this->cartera_lista_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->cartera_lista_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->cartera_lista_ = "null"; 
                  $NM_val_null[] = "cartera_lista_";
              } 
          }
          $this->cartera_frm__before_qstr = $this->cartera_frm_;
          $this->cartera_frm_ = substr($this->Db->qstr($this->cartera_frm_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->cartera_frm_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->cartera_frm_ = "null"; 
                  $NM_val_null[] = "cartera_frm_";
              } 
          }
          $this->caja_lista__before_qstr = $this->caja_lista_;
          $this->caja_lista_ = substr($this->Db->qstr($this->caja_lista_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->caja_lista_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->caja_lista_ = "null"; 
                  $NM_val_null[] = "caja_lista_";
              } 
          }
          $this->caja_frm__before_qstr = $this->caja_frm_;
          $this->caja_frm_ = substr($this->Db->qstr($this->caja_frm_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->caja_frm_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->caja_frm_ = "null"; 
                  $NM_val_null[] = "caja_frm_";
              } 
          }
          $this->mantenimiento__before_qstr = $this->mantenimiento_;
          $this->mantenimiento_ = substr($this->Db->qstr($this->mantenimiento_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->mantenimiento_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->mantenimiento_ = "null"; 
                  $NM_val_null[] = "mantenimiento_";
              } 
          }
          $this->empresa__before_qstr = $this->empresa_;
          $this->empresa_ = substr($this->Db->qstr($this->empresa_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->empresa_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->empresa_ = "null"; 
                  $NM_val_null[] = "empresa_";
              } 
          }
          $this->inventario__before_qstr = $this->inventario_;
          $this->inventario_ = substr($this->Db->qstr($this->inventario_), 1, -1); 
          if ($this->inventario_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->inventario_ = "null"; 
              $NM_val_null[] = "inventario_";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['foreign_key'] as $sFKName => $sFKValue)
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
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_permisos_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_nfnd']; 
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
                  $SC_fields_update[] = "usuario = $this->usuario_, terceros_lista = '$this->terceros_lista_', terceros_frm = '$this->terceros_frm_', productos_lista = '$this->productos_lista_', productos_frm = '$this->productos_frm_', grupos_lista = '$this->grupos_lista_', grupos_frm = '$this->grupos_frm_', usuarios_lista = '$this->usuarios_lista_', usuarios_frm = '$this->usuarios_frm_', compras_lista = '$this->compras_lista_', compras_frm = '$this->compras_frm_', ventas_lista = '$this->ventas_lista_', ventas_frm = '$this->ventas_frm_', cartera_lista = '$this->cartera_lista_', cartera_frm = '$this->cartera_frm_', caja_lista = '$this->caja_lista_', caja_frm = '$this->caja_frm_', mantenimiento = '$this->mantenimiento_', empresa = '$this->empresa_', inventario = '$this->inventario_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "usuario = $this->usuario_, terceros_lista = '$this->terceros_lista_', terceros_frm = '$this->terceros_frm_', productos_lista = '$this->productos_lista_', productos_frm = '$this->productos_frm_', grupos_lista = '$this->grupos_lista_', grupos_frm = '$this->grupos_frm_', usuarios_lista = '$this->usuarios_lista_', usuarios_frm = '$this->usuarios_frm_', compras_lista = '$this->compras_lista_', compras_frm = '$this->compras_frm_', ventas_lista = '$this->ventas_lista_', ventas_frm = '$this->ventas_frm_', cartera_lista = '$this->cartera_lista_', cartera_frm = '$this->cartera_frm_', caja_lista = '$this->caja_lista_', caja_frm = '$this->caja_frm_', mantenimiento = '$this->mantenimiento_', empresa = '$this->empresa_', inventario = '$this->inventario_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "usuario = $this->usuario_, terceros_lista = '$this->terceros_lista_', terceros_frm = '$this->terceros_frm_', productos_lista = '$this->productos_lista_', productos_frm = '$this->productos_frm_', grupos_lista = '$this->grupos_lista_', grupos_frm = '$this->grupos_frm_', usuarios_lista = '$this->usuarios_lista_', usuarios_frm = '$this->usuarios_frm_', compras_lista = '$this->compras_lista_', compras_frm = '$this->compras_frm_', ventas_lista = '$this->ventas_lista_', ventas_frm = '$this->ventas_frm_', cartera_lista = '$this->cartera_lista_', cartera_frm = '$this->cartera_frm_', caja_lista = '$this->caja_lista_', caja_frm = '$this->caja_frm_', mantenimiento = '$this->mantenimiento_', empresa = '$this->empresa_', inventario = '$this->inventario_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "usuario = $this->usuario_, terceros_lista = '$this->terceros_lista_', terceros_frm = '$this->terceros_frm_', productos_lista = '$this->productos_lista_', productos_frm = '$this->productos_frm_', grupos_lista = '$this->grupos_lista_', grupos_frm = '$this->grupos_frm_', usuarios_lista = '$this->usuarios_lista_', usuarios_frm = '$this->usuarios_frm_', compras_lista = '$this->compras_lista_', compras_frm = '$this->compras_frm_', ventas_lista = '$this->ventas_lista_', ventas_frm = '$this->ventas_frm_', cartera_lista = '$this->cartera_lista_', cartera_frm = '$this->cartera_frm_', caja_lista = '$this->caja_lista_', caja_frm = '$this->caja_frm_', mantenimiento = '$this->mantenimiento_', empresa = '$this->empresa_', inventario = '$this->inventario_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "usuario = $this->usuario_, terceros_lista = '$this->terceros_lista_', terceros_frm = '$this->terceros_frm_', productos_lista = '$this->productos_lista_', productos_frm = '$this->productos_frm_', grupos_lista = '$this->grupos_lista_', grupos_frm = '$this->grupos_frm_', usuarios_lista = '$this->usuarios_lista_', usuarios_frm = '$this->usuarios_frm_', compras_lista = '$this->compras_lista_', compras_frm = '$this->compras_frm_', ventas_lista = '$this->ventas_lista_', ventas_frm = '$this->ventas_frm_', cartera_lista = '$this->cartera_lista_', cartera_frm = '$this->cartera_frm_', caja_lista = '$this->caja_lista_', caja_frm = '$this->caja_frm_', mantenimiento = '$this->mantenimiento_', empresa = '$this->empresa_', inventario = '$this->inventario_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "usuario = $this->usuario_, terceros_lista = '$this->terceros_lista_', terceros_frm = '$this->terceros_frm_', productos_lista = '$this->productos_lista_', productos_frm = '$this->productos_frm_', grupos_lista = '$this->grupos_lista_', grupos_frm = '$this->grupos_frm_', usuarios_lista = '$this->usuarios_lista_', usuarios_frm = '$this->usuarios_frm_', compras_lista = '$this->compras_lista_', compras_frm = '$this->compras_frm_', ventas_lista = '$this->ventas_lista_', ventas_frm = '$this->ventas_frm_', cartera_lista = '$this->cartera_lista_', cartera_frm = '$this->cartera_frm_', caja_lista = '$this->caja_lista_', caja_frm = '$this->caja_frm_', mantenimiento = '$this->mantenimiento_', empresa = '$this->empresa_', inventario = '$this->inventario_'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "usuario = $this->usuario_, terceros_lista = '$this->terceros_lista_', terceros_frm = '$this->terceros_frm_', productos_lista = '$this->productos_lista_', productos_frm = '$this->productos_frm_', grupos_lista = '$this->grupos_lista_', grupos_frm = '$this->grupos_frm_', usuarios_lista = '$this->usuarios_lista_', usuarios_frm = '$this->usuarios_frm_', compras_lista = '$this->compras_lista_', compras_frm = '$this->compras_frm_', ventas_lista = '$this->ventas_lista_', ventas_frm = '$this->ventas_frm_', cartera_lista = '$this->cartera_lista_', cartera_frm = '$this->cartera_frm_', caja_lista = '$this->caja_lista_', caja_frm = '$this->caja_frm_', mantenimiento = '$this->mantenimiento_', empresa = '$this->empresa_', inventario = '$this->inventario_'"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE idpermisos = $this->idpermisos_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE idpermisos = $this->idpermisos_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE idpermisos = $this->idpermisos_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE idpermisos = $this->idpermisos_ ";  
              }  
              else  
              {
                  $comando .= " WHERE idpermisos = $this->idpermisos_ ";  
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
                                  form_permisos_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->terceros_lista_ = $this->terceros_lista__before_qstr;
              $this->terceros_frm_ = $this->terceros_frm__before_qstr;
              $this->productos_lista_ = $this->productos_lista__before_qstr;
              $this->productos_frm_ = $this->productos_frm__before_qstr;
              $this->grupos_lista_ = $this->grupos_lista__before_qstr;
              $this->grupos_frm_ = $this->grupos_frm__before_qstr;
              $this->usuarios_lista_ = $this->usuarios_lista__before_qstr;
              $this->usuarios_frm_ = $this->usuarios_frm__before_qstr;
              $this->compras_lista_ = $this->compras_lista__before_qstr;
              $this->compras_frm_ = $this->compras_frm__before_qstr;
              $this->ventas_lista_ = $this->ventas_lista__before_qstr;
              $this->ventas_frm_ = $this->ventas_frm__before_qstr;
              $this->cartera_lista_ = $this->cartera_lista__before_qstr;
              $this->cartera_frm_ = $this->cartera_frm__before_qstr;
              $this->caja_lista_ = $this->caja_lista__before_qstr;
              $this->caja_frm_ = $this->caja_frm__before_qstr;
              $this->mantenimiento_ = $this->mantenimiento__before_qstr;
              $this->empresa_ = $this->empresa__before_qstr;
              $this->inventario_ = $this->inventario__before_qstr;
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
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }

              $this->sc_teve_alt = true; 
              if     (isset($NM_val_form) && isset($NM_val_form['usuario_'])) { $this->usuario_ = $NM_val_form['usuario_']; }
              elseif (isset($this->usuario_)) { $this->nm_limpa_alfa($this->usuario_); }
              if     (isset($NM_val_form) && isset($NM_val_form['terceros_lista_'])) { $this->terceros_lista_ = $NM_val_form['terceros_lista_']; }
              elseif (isset($this->terceros_lista_)) { $this->nm_limpa_alfa($this->terceros_lista_); }
              if     (isset($NM_val_form) && isset($NM_val_form['terceros_frm_'])) { $this->terceros_frm_ = $NM_val_form['terceros_frm_']; }
              elseif (isset($this->terceros_frm_)) { $this->nm_limpa_alfa($this->terceros_frm_); }
              if     (isset($NM_val_form) && isset($NM_val_form['productos_lista_'])) { $this->productos_lista_ = $NM_val_form['productos_lista_']; }
              elseif (isset($this->productos_lista_)) { $this->nm_limpa_alfa($this->productos_lista_); }
              if     (isset($NM_val_form) && isset($NM_val_form['productos_frm_'])) { $this->productos_frm_ = $NM_val_form['productos_frm_']; }
              elseif (isset($this->productos_frm_)) { $this->nm_limpa_alfa($this->productos_frm_); }
              if     (isset($NM_val_form) && isset($NM_val_form['grupos_lista_'])) { $this->grupos_lista_ = $NM_val_form['grupos_lista_']; }
              elseif (isset($this->grupos_lista_)) { $this->nm_limpa_alfa($this->grupos_lista_); }
              if     (isset($NM_val_form) && isset($NM_val_form['grupos_frm_'])) { $this->grupos_frm_ = $NM_val_form['grupos_frm_']; }
              elseif (isset($this->grupos_frm_)) { $this->nm_limpa_alfa($this->grupos_frm_); }
              if     (isset($NM_val_form) && isset($NM_val_form['usuarios_lista_'])) { $this->usuarios_lista_ = $NM_val_form['usuarios_lista_']; }
              elseif (isset($this->usuarios_lista_)) { $this->nm_limpa_alfa($this->usuarios_lista_); }
              if     (isset($NM_val_form) && isset($NM_val_form['usuarios_frm_'])) { $this->usuarios_frm_ = $NM_val_form['usuarios_frm_']; }
              elseif (isset($this->usuarios_frm_)) { $this->nm_limpa_alfa($this->usuarios_frm_); }
              if     (isset($NM_val_form) && isset($NM_val_form['compras_lista_'])) { $this->compras_lista_ = $NM_val_form['compras_lista_']; }
              elseif (isset($this->compras_lista_)) { $this->nm_limpa_alfa($this->compras_lista_); }
              if     (isset($NM_val_form) && isset($NM_val_form['compras_frm_'])) { $this->compras_frm_ = $NM_val_form['compras_frm_']; }
              elseif (isset($this->compras_frm_)) { $this->nm_limpa_alfa($this->compras_frm_); }
              if     (isset($NM_val_form) && isset($NM_val_form['ventas_lista_'])) { $this->ventas_lista_ = $NM_val_form['ventas_lista_']; }
              elseif (isset($this->ventas_lista_)) { $this->nm_limpa_alfa($this->ventas_lista_); }
              if     (isset($NM_val_form) && isset($NM_val_form['ventas_frm_'])) { $this->ventas_frm_ = $NM_val_form['ventas_frm_']; }
              elseif (isset($this->ventas_frm_)) { $this->nm_limpa_alfa($this->ventas_frm_); }
              if     (isset($NM_val_form) && isset($NM_val_form['cartera_lista_'])) { $this->cartera_lista_ = $NM_val_form['cartera_lista_']; }
              elseif (isset($this->cartera_lista_)) { $this->nm_limpa_alfa($this->cartera_lista_); }
              if     (isset($NM_val_form) && isset($NM_val_form['cartera_frm_'])) { $this->cartera_frm_ = $NM_val_form['cartera_frm_']; }
              elseif (isset($this->cartera_frm_)) { $this->nm_limpa_alfa($this->cartera_frm_); }
              if     (isset($NM_val_form) && isset($NM_val_form['caja_lista_'])) { $this->caja_lista_ = $NM_val_form['caja_lista_']; }
              elseif (isset($this->caja_lista_)) { $this->nm_limpa_alfa($this->caja_lista_); }
              if     (isset($NM_val_form) && isset($NM_val_form['caja_frm_'])) { $this->caja_frm_ = $NM_val_form['caja_frm_']; }
              elseif (isset($this->caja_frm_)) { $this->nm_limpa_alfa($this->caja_frm_); }
              if     (isset($NM_val_form) && isset($NM_val_form['mantenimiento_'])) { $this->mantenimiento_ = $NM_val_form['mantenimiento_']; }
              elseif (isset($this->mantenimiento_)) { $this->nm_limpa_alfa($this->mantenimiento_); }
              if     (isset($NM_val_form) && isset($NM_val_form['empresa_'])) { $this->empresa_ = $NM_val_form['empresa_']; }
              elseif (isset($this->empresa_)) { $this->nm_limpa_alfa($this->empresa_); }
              if     (isset($NM_val_form) && isset($NM_val_form['inventario_'])) { $this->inventario_ = $NM_val_form['inventario_']; }
              elseif (isset($this->inventario_)) { $this->nm_limpa_alfa($this->inventario_); }
              $this->nm_proc_onload_record($this->nmgp_refresh_row);

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('usuario_', 'terceros_lista_', 'terceros_frm_', 'productos_lista_', 'productos_frm_', 'grupos_lista_', 'grupos_frm_', 'usuarios_lista_', 'usuarios_frm_', 'compras_lista_', 'compras_frm_', 'ventas_lista_', 'ventas_frm_', 'cartera_lista_', 'cartera_frm_', 'caja_lista_', 'caja_frm_', 'mantenimiento_', 'empresa_', 'inventario_'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
              {

                  $this->NM_ajax_info['readOnly']['usuario_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['terceros_lista_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['terceros_frm_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['productos_lista_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['productos_frm_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['grupos_lista_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['grupos_frm_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['usuarios_lista_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['usuarios_frm_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['compras_lista_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['compras_frm_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['ventas_lista_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['ventas_frm_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['cartera_lista_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['cartera_frm_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['caja_lista_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['caja_frm_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['mantenimiento_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['empresa_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['inventario_' . $this->nmgp_refresh_row] = 'on';


                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['foreign_key'] as $sFKName => $sFKValue)
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
              $NM_cmp_auto = "idpermisos, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->terceros_lista_ != "")
                  { 
                       $compl_insert     .= ", terceros_lista";
                       $compl_insert_val .= ", '$this->terceros_lista_'";
                  } 
                  if ($this->terceros_frm_ != "")
                  { 
                       $compl_insert     .= ", terceros_frm";
                       $compl_insert_val .= ", '$this->terceros_frm_'";
                  } 
                  if ($this->productos_lista_ != "")
                  { 
                       $compl_insert     .= ", productos_lista";
                       $compl_insert_val .= ", '$this->productos_lista_'";
                  } 
                  if ($this->productos_frm_ != "")
                  { 
                       $compl_insert     .= ", productos_frm";
                       $compl_insert_val .= ", '$this->productos_frm_'";
                  } 
                  if ($this->grupos_lista_ != "")
                  { 
                       $compl_insert     .= ", grupos_lista";
                       $compl_insert_val .= ", '$this->grupos_lista_'";
                  } 
                  if ($this->grupos_frm_ != "")
                  { 
                       $compl_insert     .= ", grupos_frm";
                       $compl_insert_val .= ", '$this->grupos_frm_'";
                  } 
                  if ($this->usuarios_lista_ != "")
                  { 
                       $compl_insert     .= ", usuarios_lista";
                       $compl_insert_val .= ", '$this->usuarios_lista_'";
                  } 
                  if ($this->usuarios_frm_ != "")
                  { 
                       $compl_insert     .= ", usuarios_frm";
                       $compl_insert_val .= ", '$this->usuarios_frm_'";
                  } 
                  if ($this->compras_lista_ != "")
                  { 
                       $compl_insert     .= ", compras_lista";
                       $compl_insert_val .= ", '$this->compras_lista_'";
                  } 
                  if ($this->compras_frm_ != "")
                  { 
                       $compl_insert     .= ", compras_frm";
                       $compl_insert_val .= ", '$this->compras_frm_'";
                  } 
                  if ($this->ventas_lista_ != "")
                  { 
                       $compl_insert     .= ", ventas_lista";
                       $compl_insert_val .= ", '$this->ventas_lista_'";
                  } 
                  if ($this->ventas_frm_ != "")
                  { 
                       $compl_insert     .= ", ventas_frm";
                       $compl_insert_val .= ", '$this->ventas_frm_'";
                  } 
                  if ($this->cartera_lista_ != "")
                  { 
                       $compl_insert     .= ", cartera_lista";
                       $compl_insert_val .= ", '$this->cartera_lista_'";
                  } 
                  if ($this->cartera_frm_ != "")
                  { 
                       $compl_insert     .= ", cartera_frm";
                       $compl_insert_val .= ", '$this->cartera_frm_'";
                  } 
                  if ($this->caja_lista_ != "")
                  { 
                       $compl_insert     .= ", caja_lista";
                       $compl_insert_val .= ", '$this->caja_lista_'";
                  } 
                  if ($this->caja_frm_ != "")
                  { 
                       $compl_insert     .= ", caja_frm";
                       $compl_insert_val .= ", '$this->caja_frm_'";
                  } 
                  if ($this->mantenimiento_ != "")
                  { 
                       $compl_insert     .= ", mantenimiento";
                       $compl_insert_val .= ", '$this->mantenimiento_'";
                  } 
                  if ($this->empresa_ != "")
                  { 
                       $compl_insert     .= ", empresa";
                       $compl_insert_val .= ", '$this->empresa_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (usuario, inventario $compl_insert) VALUES ($this->usuario_, '$this->inventario_' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->terceros_lista_ != "")
                  { 
                       $compl_insert     .= ", terceros_lista";
                       $compl_insert_val .= ", '$this->terceros_lista_'";
                  } 
                  if ($this->terceros_frm_ != "")
                  { 
                       $compl_insert     .= ", terceros_frm";
                       $compl_insert_val .= ", '$this->terceros_frm_'";
                  } 
                  if ($this->productos_lista_ != "")
                  { 
                       $compl_insert     .= ", productos_lista";
                       $compl_insert_val .= ", '$this->productos_lista_'";
                  } 
                  if ($this->productos_frm_ != "")
                  { 
                       $compl_insert     .= ", productos_frm";
                       $compl_insert_val .= ", '$this->productos_frm_'";
                  } 
                  if ($this->grupos_lista_ != "")
                  { 
                       $compl_insert     .= ", grupos_lista";
                       $compl_insert_val .= ", '$this->grupos_lista_'";
                  } 
                  if ($this->grupos_frm_ != "")
                  { 
                       $compl_insert     .= ", grupos_frm";
                       $compl_insert_val .= ", '$this->grupos_frm_'";
                  } 
                  if ($this->usuarios_lista_ != "")
                  { 
                       $compl_insert     .= ", usuarios_lista";
                       $compl_insert_val .= ", '$this->usuarios_lista_'";
                  } 
                  if ($this->usuarios_frm_ != "")
                  { 
                       $compl_insert     .= ", usuarios_frm";
                       $compl_insert_val .= ", '$this->usuarios_frm_'";
                  } 
                  if ($this->compras_lista_ != "")
                  { 
                       $compl_insert     .= ", compras_lista";
                       $compl_insert_val .= ", '$this->compras_lista_'";
                  } 
                  if ($this->compras_frm_ != "")
                  { 
                       $compl_insert     .= ", compras_frm";
                       $compl_insert_val .= ", '$this->compras_frm_'";
                  } 
                  if ($this->ventas_lista_ != "")
                  { 
                       $compl_insert     .= ", ventas_lista";
                       $compl_insert_val .= ", '$this->ventas_lista_'";
                  } 
                  if ($this->ventas_frm_ != "")
                  { 
                       $compl_insert     .= ", ventas_frm";
                       $compl_insert_val .= ", '$this->ventas_frm_'";
                  } 
                  if ($this->cartera_lista_ != "")
                  { 
                       $compl_insert     .= ", cartera_lista";
                       $compl_insert_val .= ", '$this->cartera_lista_'";
                  } 
                  if ($this->cartera_frm_ != "")
                  { 
                       $compl_insert     .= ", cartera_frm";
                       $compl_insert_val .= ", '$this->cartera_frm_'";
                  } 
                  if ($this->caja_lista_ != "")
                  { 
                       $compl_insert     .= ", caja_lista";
                       $compl_insert_val .= ", '$this->caja_lista_'";
                  } 
                  if ($this->caja_frm_ != "")
                  { 
                       $compl_insert     .= ", caja_frm";
                       $compl_insert_val .= ", '$this->caja_frm_'";
                  } 
                  if ($this->mantenimiento_ != "")
                  { 
                       $compl_insert     .= ", mantenimiento";
                       $compl_insert_val .= ", '$this->mantenimiento_'";
                  } 
                  if ($this->empresa_ != "")
                  { 
                       $compl_insert     .= ", empresa";
                       $compl_insert_val .= ", '$this->empresa_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "usuario, inventario $compl_insert) VALUES (" . $NM_seq_auto . "$this->usuario_, '$this->inventario_' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->terceros_lista_ != "")
                  { 
                       $compl_insert     .= ", terceros_lista";
                       $compl_insert_val .= ", '$this->terceros_lista_'";
                  } 
                  if ($this->terceros_frm_ != "")
                  { 
                       $compl_insert     .= ", terceros_frm";
                       $compl_insert_val .= ", '$this->terceros_frm_'";
                  } 
                  if ($this->productos_lista_ != "")
                  { 
                       $compl_insert     .= ", productos_lista";
                       $compl_insert_val .= ", '$this->productos_lista_'";
                  } 
                  if ($this->productos_frm_ != "")
                  { 
                       $compl_insert     .= ", productos_frm";
                       $compl_insert_val .= ", '$this->productos_frm_'";
                  } 
                  if ($this->grupos_lista_ != "")
                  { 
                       $compl_insert     .= ", grupos_lista";
                       $compl_insert_val .= ", '$this->grupos_lista_'";
                  } 
                  if ($this->grupos_frm_ != "")
                  { 
                       $compl_insert     .= ", grupos_frm";
                       $compl_insert_val .= ", '$this->grupos_frm_'";
                  } 
                  if ($this->usuarios_lista_ != "")
                  { 
                       $compl_insert     .= ", usuarios_lista";
                       $compl_insert_val .= ", '$this->usuarios_lista_'";
                  } 
                  if ($this->usuarios_frm_ != "")
                  { 
                       $compl_insert     .= ", usuarios_frm";
                       $compl_insert_val .= ", '$this->usuarios_frm_'";
                  } 
                  if ($this->compras_lista_ != "")
                  { 
                       $compl_insert     .= ", compras_lista";
                       $compl_insert_val .= ", '$this->compras_lista_'";
                  } 
                  if ($this->compras_frm_ != "")
                  { 
                       $compl_insert     .= ", compras_frm";
                       $compl_insert_val .= ", '$this->compras_frm_'";
                  } 
                  if ($this->ventas_lista_ != "")
                  { 
                       $compl_insert     .= ", ventas_lista";
                       $compl_insert_val .= ", '$this->ventas_lista_'";
                  } 
                  if ($this->ventas_frm_ != "")
                  { 
                       $compl_insert     .= ", ventas_frm";
                       $compl_insert_val .= ", '$this->ventas_frm_'";
                  } 
                  if ($this->cartera_lista_ != "")
                  { 
                       $compl_insert     .= ", cartera_lista";
                       $compl_insert_val .= ", '$this->cartera_lista_'";
                  } 
                  if ($this->cartera_frm_ != "")
                  { 
                       $compl_insert     .= ", cartera_frm";
                       $compl_insert_val .= ", '$this->cartera_frm_'";
                  } 
                  if ($this->caja_lista_ != "")
                  { 
                       $compl_insert     .= ", caja_lista";
                       $compl_insert_val .= ", '$this->caja_lista_'";
                  } 
                  if ($this->caja_frm_ != "")
                  { 
                       $compl_insert     .= ", caja_frm";
                       $compl_insert_val .= ", '$this->caja_frm_'";
                  } 
                  if ($this->mantenimiento_ != "")
                  { 
                       $compl_insert     .= ", mantenimiento";
                       $compl_insert_val .= ", '$this->mantenimiento_'";
                  } 
                  if ($this->empresa_ != "")
                  { 
                       $compl_insert     .= ", empresa";
                       $compl_insert_val .= ", '$this->empresa_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "usuario, inventario $compl_insert) VALUES (" . $NM_seq_auto . "$this->usuario_, '$this->inventario_' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->terceros_lista_ != "")
                  { 
                       $compl_insert     .= ", terceros_lista";
                       $compl_insert_val .= ", '$this->terceros_lista_'";
                  } 
                  if ($this->terceros_frm_ != "")
                  { 
                       $compl_insert     .= ", terceros_frm";
                       $compl_insert_val .= ", '$this->terceros_frm_'";
                  } 
                  if ($this->productos_lista_ != "")
                  { 
                       $compl_insert     .= ", productos_lista";
                       $compl_insert_val .= ", '$this->productos_lista_'";
                  } 
                  if ($this->productos_frm_ != "")
                  { 
                       $compl_insert     .= ", productos_frm";
                       $compl_insert_val .= ", '$this->productos_frm_'";
                  } 
                  if ($this->grupos_lista_ != "")
                  { 
                       $compl_insert     .= ", grupos_lista";
                       $compl_insert_val .= ", '$this->grupos_lista_'";
                  } 
                  if ($this->grupos_frm_ != "")
                  { 
                       $compl_insert     .= ", grupos_frm";
                       $compl_insert_val .= ", '$this->grupos_frm_'";
                  } 
                  if ($this->usuarios_lista_ != "")
                  { 
                       $compl_insert     .= ", usuarios_lista";
                       $compl_insert_val .= ", '$this->usuarios_lista_'";
                  } 
                  if ($this->usuarios_frm_ != "")
                  { 
                       $compl_insert     .= ", usuarios_frm";
                       $compl_insert_val .= ", '$this->usuarios_frm_'";
                  } 
                  if ($this->compras_lista_ != "")
                  { 
                       $compl_insert     .= ", compras_lista";
                       $compl_insert_val .= ", '$this->compras_lista_'";
                  } 
                  if ($this->compras_frm_ != "")
                  { 
                       $compl_insert     .= ", compras_frm";
                       $compl_insert_val .= ", '$this->compras_frm_'";
                  } 
                  if ($this->ventas_lista_ != "")
                  { 
                       $compl_insert     .= ", ventas_lista";
                       $compl_insert_val .= ", '$this->ventas_lista_'";
                  } 
                  if ($this->ventas_frm_ != "")
                  { 
                       $compl_insert     .= ", ventas_frm";
                       $compl_insert_val .= ", '$this->ventas_frm_'";
                  } 
                  if ($this->cartera_lista_ != "")
                  { 
                       $compl_insert     .= ", cartera_lista";
                       $compl_insert_val .= ", '$this->cartera_lista_'";
                  } 
                  if ($this->cartera_frm_ != "")
                  { 
                       $compl_insert     .= ", cartera_frm";
                       $compl_insert_val .= ", '$this->cartera_frm_'";
                  } 
                  if ($this->caja_lista_ != "")
                  { 
                       $compl_insert     .= ", caja_lista";
                       $compl_insert_val .= ", '$this->caja_lista_'";
                  } 
                  if ($this->caja_frm_ != "")
                  { 
                       $compl_insert     .= ", caja_frm";
                       $compl_insert_val .= ", '$this->caja_frm_'";
                  } 
                  if ($this->mantenimiento_ != "")
                  { 
                       $compl_insert     .= ", mantenimiento";
                       $compl_insert_val .= ", '$this->mantenimiento_'";
                  } 
                  if ($this->empresa_ != "")
                  { 
                       $compl_insert     .= ", empresa";
                       $compl_insert_val .= ", '$this->empresa_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "usuario, inventario $compl_insert) VALUES (" . $NM_seq_auto . "$this->usuario_, '$this->inventario_' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->terceros_lista_ != "")
                  { 
                       $compl_insert     .= ", terceros_lista";
                       $compl_insert_val .= ", '$this->terceros_lista_'";
                  } 
                  if ($this->terceros_frm_ != "")
                  { 
                       $compl_insert     .= ", terceros_frm";
                       $compl_insert_val .= ", '$this->terceros_frm_'";
                  } 
                  if ($this->productos_lista_ != "")
                  { 
                       $compl_insert     .= ", productos_lista";
                       $compl_insert_val .= ", '$this->productos_lista_'";
                  } 
                  if ($this->productos_frm_ != "")
                  { 
                       $compl_insert     .= ", productos_frm";
                       $compl_insert_val .= ", '$this->productos_frm_'";
                  } 
                  if ($this->grupos_lista_ != "")
                  { 
                       $compl_insert     .= ", grupos_lista";
                       $compl_insert_val .= ", '$this->grupos_lista_'";
                  } 
                  if ($this->grupos_frm_ != "")
                  { 
                       $compl_insert     .= ", grupos_frm";
                       $compl_insert_val .= ", '$this->grupos_frm_'";
                  } 
                  if ($this->usuarios_lista_ != "")
                  { 
                       $compl_insert     .= ", usuarios_lista";
                       $compl_insert_val .= ", '$this->usuarios_lista_'";
                  } 
                  if ($this->usuarios_frm_ != "")
                  { 
                       $compl_insert     .= ", usuarios_frm";
                       $compl_insert_val .= ", '$this->usuarios_frm_'";
                  } 
                  if ($this->compras_lista_ != "")
                  { 
                       $compl_insert     .= ", compras_lista";
                       $compl_insert_val .= ", '$this->compras_lista_'";
                  } 
                  if ($this->compras_frm_ != "")
                  { 
                       $compl_insert     .= ", compras_frm";
                       $compl_insert_val .= ", '$this->compras_frm_'";
                  } 
                  if ($this->ventas_lista_ != "")
                  { 
                       $compl_insert     .= ", ventas_lista";
                       $compl_insert_val .= ", '$this->ventas_lista_'";
                  } 
                  if ($this->ventas_frm_ != "")
                  { 
                       $compl_insert     .= ", ventas_frm";
                       $compl_insert_val .= ", '$this->ventas_frm_'";
                  } 
                  if ($this->cartera_lista_ != "")
                  { 
                       $compl_insert     .= ", cartera_lista";
                       $compl_insert_val .= ", '$this->cartera_lista_'";
                  } 
                  if ($this->cartera_frm_ != "")
                  { 
                       $compl_insert     .= ", cartera_frm";
                       $compl_insert_val .= ", '$this->cartera_frm_'";
                  } 
                  if ($this->caja_lista_ != "")
                  { 
                       $compl_insert     .= ", caja_lista";
                       $compl_insert_val .= ", '$this->caja_lista_'";
                  } 
                  if ($this->caja_frm_ != "")
                  { 
                       $compl_insert     .= ", caja_frm";
                       $compl_insert_val .= ", '$this->caja_frm_'";
                  } 
                  if ($this->mantenimiento_ != "")
                  { 
                       $compl_insert     .= ", mantenimiento";
                       $compl_insert_val .= ", '$this->mantenimiento_'";
                  } 
                  if ($this->empresa_ != "")
                  { 
                       $compl_insert     .= ", empresa";
                       $compl_insert_val .= ", '$this->empresa_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "usuario, inventario $compl_insert) VALUES (" . $NM_seq_auto . "$this->usuario_, '$this->inventario_' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->terceros_lista_ != "")
                  { 
                       $compl_insert     .= ", terceros_lista";
                       $compl_insert_val .= ", '$this->terceros_lista_'";
                  } 
                  if ($this->terceros_frm_ != "")
                  { 
                       $compl_insert     .= ", terceros_frm";
                       $compl_insert_val .= ", '$this->terceros_frm_'";
                  } 
                  if ($this->productos_lista_ != "")
                  { 
                       $compl_insert     .= ", productos_lista";
                       $compl_insert_val .= ", '$this->productos_lista_'";
                  } 
                  if ($this->productos_frm_ != "")
                  { 
                       $compl_insert     .= ", productos_frm";
                       $compl_insert_val .= ", '$this->productos_frm_'";
                  } 
                  if ($this->grupos_lista_ != "")
                  { 
                       $compl_insert     .= ", grupos_lista";
                       $compl_insert_val .= ", '$this->grupos_lista_'";
                  } 
                  if ($this->grupos_frm_ != "")
                  { 
                       $compl_insert     .= ", grupos_frm";
                       $compl_insert_val .= ", '$this->grupos_frm_'";
                  } 
                  if ($this->usuarios_lista_ != "")
                  { 
                       $compl_insert     .= ", usuarios_lista";
                       $compl_insert_val .= ", '$this->usuarios_lista_'";
                  } 
                  if ($this->usuarios_frm_ != "")
                  { 
                       $compl_insert     .= ", usuarios_frm";
                       $compl_insert_val .= ", '$this->usuarios_frm_'";
                  } 
                  if ($this->compras_lista_ != "")
                  { 
                       $compl_insert     .= ", compras_lista";
                       $compl_insert_val .= ", '$this->compras_lista_'";
                  } 
                  if ($this->compras_frm_ != "")
                  { 
                       $compl_insert     .= ", compras_frm";
                       $compl_insert_val .= ", '$this->compras_frm_'";
                  } 
                  if ($this->ventas_lista_ != "")
                  { 
                       $compl_insert     .= ", ventas_lista";
                       $compl_insert_val .= ", '$this->ventas_lista_'";
                  } 
                  if ($this->ventas_frm_ != "")
                  { 
                       $compl_insert     .= ", ventas_frm";
                       $compl_insert_val .= ", '$this->ventas_frm_'";
                  } 
                  if ($this->cartera_lista_ != "")
                  { 
                       $compl_insert     .= ", cartera_lista";
                       $compl_insert_val .= ", '$this->cartera_lista_'";
                  } 
                  if ($this->cartera_frm_ != "")
                  { 
                       $compl_insert     .= ", cartera_frm";
                       $compl_insert_val .= ", '$this->cartera_frm_'";
                  } 
                  if ($this->caja_lista_ != "")
                  { 
                       $compl_insert     .= ", caja_lista";
                       $compl_insert_val .= ", '$this->caja_lista_'";
                  } 
                  if ($this->caja_frm_ != "")
                  { 
                       $compl_insert     .= ", caja_frm";
                       $compl_insert_val .= ", '$this->caja_frm_'";
                  } 
                  if ($this->mantenimiento_ != "")
                  { 
                       $compl_insert     .= ", mantenimiento";
                       $compl_insert_val .= ", '$this->mantenimiento_'";
                  } 
                  if ($this->empresa_ != "")
                  { 
                       $compl_insert     .= ", empresa";
                       $compl_insert_val .= ", '$this->empresa_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "usuario, inventario $compl_insert) VALUES (" . $NM_seq_auto . "$this->usuario_, '$this->inventario_' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->terceros_lista_ != "")
                  { 
                       $compl_insert     .= ", terceros_lista";
                       $compl_insert_val .= ", '$this->terceros_lista_'";
                  } 
                  if ($this->terceros_frm_ != "")
                  { 
                       $compl_insert     .= ", terceros_frm";
                       $compl_insert_val .= ", '$this->terceros_frm_'";
                  } 
                  if ($this->productos_lista_ != "")
                  { 
                       $compl_insert     .= ", productos_lista";
                       $compl_insert_val .= ", '$this->productos_lista_'";
                  } 
                  if ($this->productos_frm_ != "")
                  { 
                       $compl_insert     .= ", productos_frm";
                       $compl_insert_val .= ", '$this->productos_frm_'";
                  } 
                  if ($this->grupos_lista_ != "")
                  { 
                       $compl_insert     .= ", grupos_lista";
                       $compl_insert_val .= ", '$this->grupos_lista_'";
                  } 
                  if ($this->grupos_frm_ != "")
                  { 
                       $compl_insert     .= ", grupos_frm";
                       $compl_insert_val .= ", '$this->grupos_frm_'";
                  } 
                  if ($this->usuarios_lista_ != "")
                  { 
                       $compl_insert     .= ", usuarios_lista";
                       $compl_insert_val .= ", '$this->usuarios_lista_'";
                  } 
                  if ($this->usuarios_frm_ != "")
                  { 
                       $compl_insert     .= ", usuarios_frm";
                       $compl_insert_val .= ", '$this->usuarios_frm_'";
                  } 
                  if ($this->compras_lista_ != "")
                  { 
                       $compl_insert     .= ", compras_lista";
                       $compl_insert_val .= ", '$this->compras_lista_'";
                  } 
                  if ($this->compras_frm_ != "")
                  { 
                       $compl_insert     .= ", compras_frm";
                       $compl_insert_val .= ", '$this->compras_frm_'";
                  } 
                  if ($this->ventas_lista_ != "")
                  { 
                       $compl_insert     .= ", ventas_lista";
                       $compl_insert_val .= ", '$this->ventas_lista_'";
                  } 
                  if ($this->ventas_frm_ != "")
                  { 
                       $compl_insert     .= ", ventas_frm";
                       $compl_insert_val .= ", '$this->ventas_frm_'";
                  } 
                  if ($this->cartera_lista_ != "")
                  { 
                       $compl_insert     .= ", cartera_lista";
                       $compl_insert_val .= ", '$this->cartera_lista_'";
                  } 
                  if ($this->cartera_frm_ != "")
                  { 
                       $compl_insert     .= ", cartera_frm";
                       $compl_insert_val .= ", '$this->cartera_frm_'";
                  } 
                  if ($this->caja_lista_ != "")
                  { 
                       $compl_insert     .= ", caja_lista";
                       $compl_insert_val .= ", '$this->caja_lista_'";
                  } 
                  if ($this->caja_frm_ != "")
                  { 
                       $compl_insert     .= ", caja_frm";
                       $compl_insert_val .= ", '$this->caja_frm_'";
                  } 
                  if ($this->mantenimiento_ != "")
                  { 
                       $compl_insert     .= ", mantenimiento";
                       $compl_insert_val .= ", '$this->mantenimiento_'";
                  } 
                  if ($this->empresa_ != "")
                  { 
                       $compl_insert     .= ", empresa";
                       $compl_insert_val .= ", '$this->empresa_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "usuario, inventario $compl_insert) VALUES (" . $NM_seq_auto . "$this->usuario_, '$this->inventario_' $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->terceros_lista_ != "")
                  { 
                       $compl_insert     .= ", terceros_lista";
                       $compl_insert_val .= ", '$this->terceros_lista_'";
                  } 
                  if ($this->terceros_frm_ != "")
                  { 
                       $compl_insert     .= ", terceros_frm";
                       $compl_insert_val .= ", '$this->terceros_frm_'";
                  } 
                  if ($this->productos_lista_ != "")
                  { 
                       $compl_insert     .= ", productos_lista";
                       $compl_insert_val .= ", '$this->productos_lista_'";
                  } 
                  if ($this->productos_frm_ != "")
                  { 
                       $compl_insert     .= ", productos_frm";
                       $compl_insert_val .= ", '$this->productos_frm_'";
                  } 
                  if ($this->grupos_lista_ != "")
                  { 
                       $compl_insert     .= ", grupos_lista";
                       $compl_insert_val .= ", '$this->grupos_lista_'";
                  } 
                  if ($this->grupos_frm_ != "")
                  { 
                       $compl_insert     .= ", grupos_frm";
                       $compl_insert_val .= ", '$this->grupos_frm_'";
                  } 
                  if ($this->usuarios_lista_ != "")
                  { 
                       $compl_insert     .= ", usuarios_lista";
                       $compl_insert_val .= ", '$this->usuarios_lista_'";
                  } 
                  if ($this->usuarios_frm_ != "")
                  { 
                       $compl_insert     .= ", usuarios_frm";
                       $compl_insert_val .= ", '$this->usuarios_frm_'";
                  } 
                  if ($this->compras_lista_ != "")
                  { 
                       $compl_insert     .= ", compras_lista";
                       $compl_insert_val .= ", '$this->compras_lista_'";
                  } 
                  if ($this->compras_frm_ != "")
                  { 
                       $compl_insert     .= ", compras_frm";
                       $compl_insert_val .= ", '$this->compras_frm_'";
                  } 
                  if ($this->ventas_lista_ != "")
                  { 
                       $compl_insert     .= ", ventas_lista";
                       $compl_insert_val .= ", '$this->ventas_lista_'";
                  } 
                  if ($this->ventas_frm_ != "")
                  { 
                       $compl_insert     .= ", ventas_frm";
                       $compl_insert_val .= ", '$this->ventas_frm_'";
                  } 
                  if ($this->cartera_lista_ != "")
                  { 
                       $compl_insert     .= ", cartera_lista";
                       $compl_insert_val .= ", '$this->cartera_lista_'";
                  } 
                  if ($this->cartera_frm_ != "")
                  { 
                       $compl_insert     .= ", cartera_frm";
                       $compl_insert_val .= ", '$this->cartera_frm_'";
                  } 
                  if ($this->caja_lista_ != "")
                  { 
                       $compl_insert     .= ", caja_lista";
                       $compl_insert_val .= ", '$this->caja_lista_'";
                  } 
                  if ($this->caja_frm_ != "")
                  { 
                       $compl_insert     .= ", caja_frm";
                       $compl_insert_val .= ", '$this->caja_frm_'";
                  } 
                  if ($this->mantenimiento_ != "")
                  { 
                       $compl_insert     .= ", mantenimiento";
                       $compl_insert_val .= ", '$this->mantenimiento_'";
                  } 
                  if ($this->empresa_ != "")
                  { 
                       $compl_insert     .= ", empresa";
                       $compl_insert_val .= ", '$this->empresa_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "usuario, inventario $compl_insert) VALUES (" . $NM_seq_auto . "$this->usuario_, '$this->inventario_' $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->terceros_lista_ != "")
                  { 
                       $compl_insert     .= ", terceros_lista";
                       $compl_insert_val .= ", '$this->terceros_lista_'";
                  } 
                  if ($this->terceros_frm_ != "")
                  { 
                       $compl_insert     .= ", terceros_frm";
                       $compl_insert_val .= ", '$this->terceros_frm_'";
                  } 
                  if ($this->productos_lista_ != "")
                  { 
                       $compl_insert     .= ", productos_lista";
                       $compl_insert_val .= ", '$this->productos_lista_'";
                  } 
                  if ($this->productos_frm_ != "")
                  { 
                       $compl_insert     .= ", productos_frm";
                       $compl_insert_val .= ", '$this->productos_frm_'";
                  } 
                  if ($this->grupos_lista_ != "")
                  { 
                       $compl_insert     .= ", grupos_lista";
                       $compl_insert_val .= ", '$this->grupos_lista_'";
                  } 
                  if ($this->grupos_frm_ != "")
                  { 
                       $compl_insert     .= ", grupos_frm";
                       $compl_insert_val .= ", '$this->grupos_frm_'";
                  } 
                  if ($this->usuarios_lista_ != "")
                  { 
                       $compl_insert     .= ", usuarios_lista";
                       $compl_insert_val .= ", '$this->usuarios_lista_'";
                  } 
                  if ($this->usuarios_frm_ != "")
                  { 
                       $compl_insert     .= ", usuarios_frm";
                       $compl_insert_val .= ", '$this->usuarios_frm_'";
                  } 
                  if ($this->compras_lista_ != "")
                  { 
                       $compl_insert     .= ", compras_lista";
                       $compl_insert_val .= ", '$this->compras_lista_'";
                  } 
                  if ($this->compras_frm_ != "")
                  { 
                       $compl_insert     .= ", compras_frm";
                       $compl_insert_val .= ", '$this->compras_frm_'";
                  } 
                  if ($this->ventas_lista_ != "")
                  { 
                       $compl_insert     .= ", ventas_lista";
                       $compl_insert_val .= ", '$this->ventas_lista_'";
                  } 
                  if ($this->ventas_frm_ != "")
                  { 
                       $compl_insert     .= ", ventas_frm";
                       $compl_insert_val .= ", '$this->ventas_frm_'";
                  } 
                  if ($this->cartera_lista_ != "")
                  { 
                       $compl_insert     .= ", cartera_lista";
                       $compl_insert_val .= ", '$this->cartera_lista_'";
                  } 
                  if ($this->cartera_frm_ != "")
                  { 
                       $compl_insert     .= ", cartera_frm";
                       $compl_insert_val .= ", '$this->cartera_frm_'";
                  } 
                  if ($this->caja_lista_ != "")
                  { 
                       $compl_insert     .= ", caja_lista";
                       $compl_insert_val .= ", '$this->caja_lista_'";
                  } 
                  if ($this->caja_frm_ != "")
                  { 
                       $compl_insert     .= ", caja_frm";
                       $compl_insert_val .= ", '$this->caja_frm_'";
                  } 
                  if ($this->mantenimiento_ != "")
                  { 
                       $compl_insert     .= ", mantenimiento";
                       $compl_insert_val .= ", '$this->mantenimiento_'";
                  } 
                  if ($this->empresa_ != "")
                  { 
                       $compl_insert     .= ", empresa";
                       $compl_insert_val .= ", '$this->empresa_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "usuario, inventario $compl_insert) VALUES (" . $NM_seq_auto . "$this->usuario_, '$this->inventario_' $compl_insert_val)"; 
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
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $dbErrorMessage, false);
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
                      { 
                          $this->sc_erro_insert = $dbErrorMessage;
                          $this->nmgp_opcao     = 'refresh_insert';
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
                          form_permisos_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->idpermisos_ =  $rsy->fields[0];
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
                  $this->idpermisos_ = $rsy->fields[0];
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
                  $this->idpermisos_ = $rsy->fields[0];
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
                  $this->idpermisos_ = $rsy->fields[0];
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
                  $this->idpermisos_ = $rsy->fields[0];
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
                  $this->idpermisos_ = $rsy->fields[0];
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
                  $this->idpermisos_ = $rsy->fields[0];
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
                  $this->idpermisos_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->terceros_lista_ = $this->terceros_lista__before_qstr;
              $this->terceros_frm_ = $this->terceros_frm__before_qstr;
              $this->productos_lista_ = $this->productos_lista__before_qstr;
              $this->productos_frm_ = $this->productos_frm__before_qstr;
              $this->grupos_lista_ = $this->grupos_lista__before_qstr;
              $this->grupos_frm_ = $this->grupos_frm__before_qstr;
              $this->usuarios_lista_ = $this->usuarios_lista__before_qstr;
              $this->usuarios_frm_ = $this->usuarios_frm__before_qstr;
              $this->compras_lista_ = $this->compras_lista__before_qstr;
              $this->compras_frm_ = $this->compras_frm__before_qstr;
              $this->ventas_lista_ = $this->ventas_lista__before_qstr;
              $this->ventas_frm_ = $this->ventas_frm__before_qstr;
              $this->cartera_lista_ = $this->cartera_lista__before_qstr;
              $this->cartera_frm_ = $this->cartera_frm__before_qstr;
              $this->caja_lista_ = $this->caja_lista__before_qstr;
              $this->caja_frm_ = $this->caja_frm__before_qstr;
              $this->mantenimiento_ = $this->mantenimiento__before_qstr;
              $this->empresa_ = $this->empresa__before_qstr;
              $this->inventario_ = $this->inventario__before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['db_changed'] = true;

              $this->sc_evento = "insert"; 
              $this->terceros_lista_ = $this->terceros_lista__before_qstr;
              $this->terceros_frm_ = $this->terceros_frm__before_qstr;
              $this->productos_lista_ = $this->productos_lista__before_qstr;
              $this->productos_frm_ = $this->productos_frm__before_qstr;
              $this->grupos_lista_ = $this->grupos_lista__before_qstr;
              $this->grupos_frm_ = $this->grupos_frm__before_qstr;
              $this->usuarios_lista_ = $this->usuarios_lista__before_qstr;
              $this->usuarios_frm_ = $this->usuarios_frm__before_qstr;
              $this->compras_lista_ = $this->compras_lista__before_qstr;
              $this->compras_frm_ = $this->compras_frm__before_qstr;
              $this->ventas_lista_ = $this->ventas_lista__before_qstr;
              $this->ventas_frm_ = $this->ventas_frm__before_qstr;
              $this->cartera_lista_ = $this->cartera_lista__before_qstr;
              $this->cartera_frm_ = $this->cartera_frm__before_qstr;
              $this->caja_lista_ = $this->caja_lista__before_qstr;
              $this->caja_frm_ = $this->caja_frm__before_qstr;
              $this->mantenimiento_ = $this->mantenimiento__before_qstr;
              $this->empresa_ = $this->empresa__before_qstr;
              $this->inventario_ = $this->inventario__before_qstr;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['total']++; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_qtd']++; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_I_E']++; 
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['total'] + 1; 
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              $this->sc_teve_incl = true; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['usuario_'] = $this->usuario_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['terceros_lista_'] = $this->terceros_lista_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['terceros_frm_'] = $this->terceros_frm_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['productos_lista_'] = $this->productos_lista_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['productos_frm_'] = $this->productos_frm_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['grupos_lista_'] = $this->grupos_lista_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['grupos_frm_'] = $this->grupos_frm_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['usuarios_lista_'] = $this->usuarios_lista_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['usuarios_frm_'] = $this->usuarios_frm_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['compras_lista_'] = $this->compras_lista_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['compras_frm_'] = $this->compras_frm_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['ventas_lista_'] = $this->ventas_lista_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['ventas_frm_'] = $this->ventas_frm_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['cartera_lista_'] = $this->cartera_lista_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['cartera_frm_'] = $this->cartera_frm_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['caja_lista_'] = $this->caja_lista_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['caja_frm_'] = $this->caja_frm_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['mantenimiento_'] = $this->mantenimiento_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['empresa_'] = $this->empresa_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert]['inventario_'] = $this->inventario_;
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
              if (isset($this->usuario_)) { $this->nm_limpa_alfa($this->usuario_); }
              if (isset($this->terceros_lista_)) { $this->nm_limpa_alfa($this->terceros_lista_); }
              if (isset($this->terceros_frm_)) { $this->nm_limpa_alfa($this->terceros_frm_); }
              if (isset($this->productos_lista_)) { $this->nm_limpa_alfa($this->productos_lista_); }
              if (isset($this->productos_frm_)) { $this->nm_limpa_alfa($this->productos_frm_); }
              if (isset($this->grupos_lista_)) { $this->nm_limpa_alfa($this->grupos_lista_); }
              if (isset($this->grupos_frm_)) { $this->nm_limpa_alfa($this->grupos_frm_); }
              if (isset($this->usuarios_lista_)) { $this->nm_limpa_alfa($this->usuarios_lista_); }
              if (isset($this->usuarios_frm_)) { $this->nm_limpa_alfa($this->usuarios_frm_); }
              if (isset($this->compras_lista_)) { $this->nm_limpa_alfa($this->compras_lista_); }
              if (isset($this->compras_frm_)) { $this->nm_limpa_alfa($this->compras_frm_); }
              if (isset($this->ventas_lista_)) { $this->nm_limpa_alfa($this->ventas_lista_); }
              if (isset($this->ventas_frm_)) { $this->nm_limpa_alfa($this->ventas_frm_); }
              if (isset($this->cartera_lista_)) { $this->nm_limpa_alfa($this->cartera_lista_); }
              if (isset($this->cartera_frm_)) { $this->nm_limpa_alfa($this->cartera_frm_); }
              if (isset($this->caja_lista_)) { $this->nm_limpa_alfa($this->caja_lista_); }
              if (isset($this->caja_frm_)) { $this->nm_limpa_alfa($this->caja_frm_); }
              if (isset($this->mantenimiento_)) { $this->nm_limpa_alfa($this->mantenimiento_); }
              if (isset($this->empresa_)) { $this->nm_limpa_alfa($this->empresa_); }
              if (isset($this->inventario_)) { $this->nm_limpa_alfa($this->inventario_); }
              if (isset($this->Embutida_form) && $this->Embutida_form)
              {
                  $this->nm_guardar_campos();
                  $this->nm_proc_onload_record($this->nmgp_refresh_row);
                  $this->nm_formatar_campos();

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   $nm_comando = "SELECT idusuarios, usuario  FROM usuarios  WHERE idusuarios != 1 ORDER BY usuario";
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_permisos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_permisos_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_'][] = $rs->fields[0];
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
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == form_permisos_pack_protect_string(NM_charset_to_utf8($this->usuario_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_usuario_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['usuario_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['usuario_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->usuario_)));
                  $this->NM_ajax_info['fldList']['usuario_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_usuario_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['usuario_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['usuario_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['usuario_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['usuario_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_terceros_lista_'][] = 'S';
          $sLabelTemp = '';
          $aTemp_terceros_lista_ = explode(';', $this->terceros_lista_);
          foreach ($aTemp_terceros_lista_ as $i => $v)
          {
              $aTemp_terceros_lista_[$i] = form_permisos_pack_protect_string(NM_charset_to_utf8($v));
          }
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_terceros_lista_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_terceros_lista_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['terceros_lista_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['terceros_lista_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->terceros_lista_)));
                  $this->NM_ajax_info['fldList']['terceros_lista_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_terceros_lista_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['terceros_lista_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['terceros_lista_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['terceros_lista_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['terceros_lista_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_terceros_frm_'][] = 'S';
          $sLabelTemp = '';
          $aTemp_terceros_frm_ = explode(';', $this->terceros_frm_);
          foreach ($aTemp_terceros_frm_ as $i => $v)
          {
              $aTemp_terceros_frm_[$i] = form_permisos_pack_protect_string(NM_charset_to_utf8($v));
          }
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_terceros_frm_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_terceros_frm_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['terceros_frm_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['terceros_frm_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->terceros_frm_)));
                  $this->NM_ajax_info['fldList']['terceros_frm_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_terceros_frm_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['terceros_frm_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['terceros_frm_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['terceros_frm_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['terceros_frm_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_productos_lista_'][] = 'S';
          $sLabelTemp = '';
          $aTemp_productos_lista_ = explode(';', $this->productos_lista_);
          foreach ($aTemp_productos_lista_ as $i => $v)
          {
              $aTemp_productos_lista_[$i] = form_permisos_pack_protect_string(NM_charset_to_utf8($v));
          }
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_productos_lista_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_productos_lista_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['productos_lista_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['productos_lista_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->productos_lista_)));
                  $this->NM_ajax_info['fldList']['productos_lista_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_productos_lista_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['productos_lista_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['productos_lista_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['productos_lista_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['productos_lista_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_productos_frm_'][] = 'S';
          $sLabelTemp = '';
          $aTemp_productos_frm_ = explode(';', $this->productos_frm_);
          foreach ($aTemp_productos_frm_ as $i => $v)
          {
              $aTemp_productos_frm_[$i] = form_permisos_pack_protect_string(NM_charset_to_utf8($v));
          }
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_productos_frm_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_productos_frm_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['productos_frm_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['productos_frm_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->productos_frm_)));
                  $this->NM_ajax_info['fldList']['productos_frm_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_productos_frm_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['productos_frm_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['productos_frm_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['productos_frm_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['productos_frm_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_grupos_lista_'][] = 'S';
          $sLabelTemp = '';
          $aTemp_grupos_lista_ = explode(';', $this->grupos_lista_);
          foreach ($aTemp_grupos_lista_ as $i => $v)
          {
              $aTemp_grupos_lista_[$i] = form_permisos_pack_protect_string(NM_charset_to_utf8($v));
          }
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_grupos_lista_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_grupos_lista_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['grupos_lista_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['grupos_lista_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->grupos_lista_)));
                  $this->NM_ajax_info['fldList']['grupos_lista_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_grupos_lista_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['grupos_lista_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['grupos_lista_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['grupos_lista_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['grupos_lista_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_grupos_frm_'][] = 'S';
          $sLabelTemp = '';
          $aTemp_grupos_frm_ = explode(';', $this->grupos_frm_);
          foreach ($aTemp_grupos_frm_ as $i => $v)
          {
              $aTemp_grupos_frm_[$i] = form_permisos_pack_protect_string(NM_charset_to_utf8($v));
          }
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_grupos_frm_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_grupos_frm_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['grupos_frm_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['grupos_frm_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->grupos_frm_)));
                  $this->NM_ajax_info['fldList']['grupos_frm_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_grupos_frm_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['grupos_frm_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['grupos_frm_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['grupos_frm_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['grupos_frm_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuarios_lista_'][] = 'S';
          $sLabelTemp = '';
          $aTemp_usuarios_lista_ = explode(';', $this->usuarios_lista_);
          foreach ($aTemp_usuarios_lista_ as $i => $v)
          {
              $aTemp_usuarios_lista_[$i] = form_permisos_pack_protect_string(NM_charset_to_utf8($v));
          }
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_usuarios_lista_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_usuarios_lista_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['usuarios_lista_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['usuarios_lista_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->usuarios_lista_)));
                  $this->NM_ajax_info['fldList']['usuarios_lista_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_usuarios_lista_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['usuarios_lista_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['usuarios_lista_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['usuarios_lista_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['usuarios_lista_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuarios_frm_'][] = 'S';
          $sLabelTemp = '';
          $aTemp_usuarios_frm_ = explode(';', $this->usuarios_frm_);
          foreach ($aTemp_usuarios_frm_ as $i => $v)
          {
              $aTemp_usuarios_frm_[$i] = form_permisos_pack_protect_string(NM_charset_to_utf8($v));
          }
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_usuarios_frm_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_usuarios_frm_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['usuarios_frm_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['usuarios_frm_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->usuarios_frm_)));
                  $this->NM_ajax_info['fldList']['usuarios_frm_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_usuarios_frm_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['usuarios_frm_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['usuarios_frm_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['usuarios_frm_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['usuarios_frm_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_compras_lista_'][] = 'S';
          $sLabelTemp = '';
          $aTemp_compras_lista_ = explode(';', $this->compras_lista_);
          foreach ($aTemp_compras_lista_ as $i => $v)
          {
              $aTemp_compras_lista_[$i] = form_permisos_pack_protect_string(NM_charset_to_utf8($v));
          }
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_compras_lista_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_compras_lista_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['compras_lista_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['compras_lista_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->compras_lista_)));
                  $this->NM_ajax_info['fldList']['compras_lista_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_compras_lista_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['compras_lista_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['compras_lista_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['compras_lista_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['compras_lista_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_compras_frm_'][] = 'S';
          $sLabelTemp = '';
          $aTemp_compras_frm_ = explode(';', $this->compras_frm_);
          foreach ($aTemp_compras_frm_ as $i => $v)
          {
              $aTemp_compras_frm_[$i] = form_permisos_pack_protect_string(NM_charset_to_utf8($v));
          }
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_compras_frm_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_compras_frm_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['compras_frm_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['compras_frm_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->compras_frm_)));
                  $this->NM_ajax_info['fldList']['compras_frm_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_compras_frm_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['compras_frm_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['compras_frm_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['compras_frm_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['compras_frm_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_ventas_lista_'][] = 'S';
          $sLabelTemp = '';
          $aTemp_ventas_lista_ = explode(';', $this->ventas_lista_);
          foreach ($aTemp_ventas_lista_ as $i => $v)
          {
              $aTemp_ventas_lista_[$i] = form_permisos_pack_protect_string(NM_charset_to_utf8($v));
          }
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_ventas_lista_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_ventas_lista_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['ventas_lista_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['ventas_lista_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->ventas_lista_)));
                  $this->NM_ajax_info['fldList']['ventas_lista_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_ventas_lista_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['ventas_lista_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['ventas_lista_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['ventas_lista_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['ventas_lista_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_ventas_frm_'][] = 'S';
          $sLabelTemp = '';
          $aTemp_ventas_frm_ = explode(';', $this->ventas_frm_);
          foreach ($aTemp_ventas_frm_ as $i => $v)
          {
              $aTemp_ventas_frm_[$i] = form_permisos_pack_protect_string(NM_charset_to_utf8($v));
          }
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_ventas_frm_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_ventas_frm_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['ventas_frm_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['ventas_frm_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->ventas_frm_)));
                  $this->NM_ajax_info['fldList']['ventas_frm_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_ventas_frm_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['ventas_frm_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['ventas_frm_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['ventas_frm_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['ventas_frm_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_cartera_lista_'][] = 'S';
          $sLabelTemp = '';
          $aTemp_cartera_lista_ = explode(';', $this->cartera_lista_);
          foreach ($aTemp_cartera_lista_ as $i => $v)
          {
              $aTemp_cartera_lista_[$i] = form_permisos_pack_protect_string(NM_charset_to_utf8($v));
          }
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_cartera_lista_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_cartera_lista_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['cartera_lista_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['cartera_lista_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->cartera_lista_)));
                  $this->NM_ajax_info['fldList']['cartera_lista_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_cartera_lista_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cartera_lista_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cartera_lista_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cartera_lista_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cartera_lista_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_cartera_frm_'][] = 'S';
          $sLabelTemp = '';
          $aTemp_cartera_frm_ = explode(';', $this->cartera_frm_);
          foreach ($aTemp_cartera_frm_ as $i => $v)
          {
              $aTemp_cartera_frm_[$i] = form_permisos_pack_protect_string(NM_charset_to_utf8($v));
          }
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_cartera_frm_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_cartera_frm_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['cartera_frm_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['cartera_frm_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->cartera_frm_)));
                  $this->NM_ajax_info['fldList']['cartera_frm_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_cartera_frm_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cartera_frm_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cartera_frm_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cartera_frm_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cartera_frm_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_caja_lista_'][] = 'S';
          $sLabelTemp = '';
          $aTemp_caja_lista_ = explode(';', $this->caja_lista_);
          foreach ($aTemp_caja_lista_ as $i => $v)
          {
              $aTemp_caja_lista_[$i] = form_permisos_pack_protect_string(NM_charset_to_utf8($v));
          }
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_caja_lista_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_caja_lista_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['caja_lista_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['caja_lista_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->caja_lista_)));
                  $this->NM_ajax_info['fldList']['caja_lista_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_caja_lista_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['caja_lista_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['caja_lista_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['caja_lista_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['caja_lista_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_caja_frm_'][] = 'S';
          $sLabelTemp = '';
          $aTemp_caja_frm_ = explode(';', $this->caja_frm_);
          foreach ($aTemp_caja_frm_ as $i => $v)
          {
              $aTemp_caja_frm_[$i] = form_permisos_pack_protect_string(NM_charset_to_utf8($v));
          }
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_caja_frm_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_caja_frm_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['caja_frm_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['caja_frm_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->caja_frm_)));
                  $this->NM_ajax_info['fldList']['caja_frm_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_caja_frm_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['caja_frm_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['caja_frm_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['caja_frm_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['caja_frm_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_mantenimiento_'][] = 'S';
          $sLabelTemp = '';
          $aTemp_mantenimiento_ = explode(';', $this->mantenimiento_);
          foreach ($aTemp_mantenimiento_ as $i => $v)
          {
              $aTemp_mantenimiento_[$i] = form_permisos_pack_protect_string(NM_charset_to_utf8($v));
          }
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_mantenimiento_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_mantenimiento_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['mantenimiento_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['mantenimiento_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->mantenimiento_)));
                  $this->NM_ajax_info['fldList']['mantenimiento_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_mantenimiento_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['mantenimiento_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['mantenimiento_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['mantenimiento_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['mantenimiento_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_empresa_'][] = 'S';
          $sLabelTemp = '';
          $aTemp_empresa_ = explode(';', $this->empresa_);
          foreach ($aTemp_empresa_ as $i => $v)
          {
              $aTemp_empresa_[$i] = form_permisos_pack_protect_string(NM_charset_to_utf8($v));
          }
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_empresa_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_empresa_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['empresa_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['empresa_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->empresa_)));
                  $this->NM_ajax_info['fldList']['empresa_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_empresa_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['empresa_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['empresa_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['empresa_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['empresa_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(form_permisos_pack_protect_string('S') => str_replace('<', '&lt;',form_permisos_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_inventario_'][] = 'S';
          $sLabelTemp = '';
          $aTemp_inventario_ = explode(';', $this->inventario_);
          foreach ($aTemp_inventario_ as $i => $v)
          {
              $aTemp_inventario_[$i] = form_permisos_pack_protect_string(NM_charset_to_utf8($v));
          }
          foreach ($aLookup as $aValData)
          {
              if (in_array(key($aValData), $aTemp_inventario_))
              {
                  if ('' != $sLabelTemp)
                  {
                      $sLabelTemp .= '<br />';
                  }
                  $sLabelTemp .= current($aValData);
              }
          }
          $tmpLabel_inventario_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['inventario_' . $this->nmgp_refresh_row]['type']    = 'checkbox';
                  $this->NM_ajax_info['fldList']['inventario_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->inventario_)));
                  $this->NM_ajax_info['fldList']['inventario_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_inventario_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['inventario_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['inventario_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['inventario_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['inventario_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $tmpLabel_idpermisos_ = $this->idpermisos_;
                  $this->NM_ajax_info['fldList']['idpermisos_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['idpermisos_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->idpermisos_)));
                  $this->NM_ajax_info['fldList']['idpermisos_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_idpermisos_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['idpermisos_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['idpermisos_' . $this->nmgp_refresh_row] = "on";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['idpermisos_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['idpermisos_' . $this->nmgp_refresh_row] = "on";
                      }
                  }


                  $this->nm_tira_formatacao();

                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['return_edit'] = "new";
              } 
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
          $this->idpermisos_ = substr($this->Db->qstr($this->idpermisos_), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ "); 
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
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_dele_nfnd']; 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idpermisos = $this->idpermisos_ "); 
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
                          form_permisos_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nm_proc_onload_record($sc_seq_vert);
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['db_changed'] = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_qtd']--; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['total']--; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_I_E']--; 
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['total'] + 1; 
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              $this->sc_teve_excl = true; 
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['parms'] = "idpermisos_?#?$this->idpermisos_?@?"; 
      }
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idpermisos_ = null === $this->idpermisos_ ? null : substr($this->Db->qstr($this->idpermisos_), 1, -1); 
      } 
   }
//---------- 
   function nm_select_banco() 
   { 
      global $nm_form_submit, $sc_seq_vert, $sc_check_incl, $teste_validade, $sc_where;
 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['rows']))
      {
          $this->sc_max_reg = $_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['rows'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['rows_ins']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['rows_ins']))
      {
          $this->sc_max_reg_incl = $_SESSION['scriptcase']['sc_apl_conf']['form_permisos']['rows_ins'];
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_qtd_reg']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_qtd_reg'])
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_liga_qtd_reg'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_max_reg']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_max_reg'] > 0 || strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_max_reg']) == "all"))
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_max_reg'];
      } 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
      $this->form_vert_form_permisos = array();
      if ($this->nmgp_opcao != "novo") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['parms'] = ""; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($this->sc_teve_excl)
      {
          $this->nmgp_opcao = "avanca";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] -= $this->sc_max_reg;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] = 0;
      }
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_filter'] . ")";
          }
      }
      $sc_where = "";
      if ('' != $sc_where_filter)
      {
          $sc_where = (isset($sc_where) && '' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (((isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao) || (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)) && !$this->has_where_params && 'novo' != $this->nmgp_opcao)
      {
          $aNewWhereCond = array();
          if (null != $this->idpermisos_)
          {
              $aNewWhereCond[] = "idpermisos = " . $this->idpermisos_;
          }
          if (!$this->NM_ajax_flag)
          {
              $this->NM_btn_navega = "S";
          }
          elseif (!empty($aNewWhereCond))
          {
              if ('' == $sc_where)
              {
                  $sc_where = " where (";
              }
              else
              {
                  $sc_where .= " and (";
              }
              $sc_where .= implode(" and ", $aNewWhereCond) . ")";
          }
      }
      if ('total' != $this->form_paginacao)
      {
          if ($this->app_is_initializing || $this->sc_teve_excl || $this->sc_teve_incl || (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['total']))
          {
              $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where;
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
              $rt = $this->Db->Execute($nmgp_select);
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit;
              }
              $qt_geral_reg_form_permisos = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['total'] = $qt_geral_reg_form_permisos;
              $rt->Close();
          }
      if ((isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['total']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_I_E'] = 0; 
          if (!$this->sc_teve_excl && !$this->sc_teve_incl) 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] = 0; 
          } 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->idpermisos_))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "idpermisos < $this->idpermisos_ "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "idpermisos < $this->idpermisos_ "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "idpermisos < $this->idpermisos_ "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "idpermisos < $this->idpermisos_ "; 
              }
              else  
              {
                  $Key_Where = "idpermisos < $this->idpermisos_ "; 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_permisos = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['total'];
      } 
      if ($this->nmgp_opcao == "inicio" || $this->nmgp_opcao == "ordem") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_permisos) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] += ($this->sc_max_reg + $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_I_E']); 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] > $qt_geral_reg_form_permisos)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] = $qt_geral_reg_form_permisos - $this->sc_max_reg; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] = 0; 
              }
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] -= $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] = ($qt_geral_reg_form_permisos + 1) - $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] = 0; 
          }
      } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_I_E'] = 0; 
      }
      $Cmps_ord_def = array();
      $sc_order_by  = "";
      $sc_order_by = "idpermisos";
      $sc_order_by = str_replace("order by ", "", $sc_order_by);
      $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
      if (!empty($sc_order_by))
      {
          $sc_order_by = " order by $sc_order_by "; 
      }
      if ($this->nmgp_opcao == "ordem" && in_array($this->nmgp_ordem, $Cmps_ord_def)) 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['ordem_cmp'] != $this->nmgp_ordem)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['ordem_cmp'] = $this->nmgp_ordem; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['ordem_ord'] = ' asc'; 
          }
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['ordem_ord'] == ' asc')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['ordem_ord'] = ' desc'; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['ordem_ord'] = ' asc'; 
          }
      } 
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['ordem_cmp'])) 
      { 
          $sc_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['ordem_cmp'] . $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['ordem_ord']; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT idpermisos, usuario, terceros_lista, terceros_frm, productos_lista, productos_frm, grupos_lista, grupos_frm, usuarios_lista, usuarios_frm, compras_lista, compras_frm, ventas_lista, ventas_frm, cartera_lista, cartera_frm, caja_lista, caja_frm, mantenimiento, empresa, inventario from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT idpermisos, usuario, terceros_lista, terceros_frm, productos_lista, productos_frm, grupos_lista, grupos_frm, usuarios_lista, usuarios_frm, compras_lista, compras_frm, ventas_lista, ventas_frm, cartera_lista, cartera_frm, caja_lista, caja_frm, mantenimiento, empresa, inventario from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT idpermisos, usuario, terceros_lista, terceros_frm, productos_lista, productos_frm, grupos_lista, grupos_frm, usuarios_lista, usuarios_frm, compras_lista, compras_frm, ventas_lista, ventas_frm, cartera_lista, cartera_frm, caja_lista, caja_frm, mantenimiento, empresa, inventario from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT idpermisos, usuario, terceros_lista, terceros_frm, productos_lista, productos_frm, grupos_lista, grupos_frm, usuarios_lista, usuarios_frm, compras_lista, compras_frm, ventas_lista, ventas_frm, cartera_lista, cartera_frm, caja_lista, caja_frm, mantenimiento, empresa, inventario from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      else 
      { 
          $nmgp_select = "SELECT idpermisos, usuario, terceros_lista, terceros_frm, productos_lista, productos_frm, grupos_lista, grupos_frm, usuarios_lista, usuarios_frm, compras_lista, compras_frm, ventas_lista, ventas_frm, cartera_lista, cartera_frm, caja_lista, caja_frm, mantenimiento, empresa, inventario from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      if ($this->nmgp_opcao != "novo") 
      { 
      if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
          $rs = $this->Db->Execute($nmgp_select) ;
      }
      elseif ('total' == $this->form_paginacao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
      }
      else
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] == "R")
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          else 
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start']) ; 
              } 
              else  
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
                  $rs = $this->Db->Execute($nmgp_select) ; 
                  if (!$rs === false && !$rs->EOF) 
                  { 
                      $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start']) ;  
                  } 
              } 
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
          if ($rs->EOF && !$this->proc_fast_search && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['empty_filter']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['empty_filter'])) 
          { 
              $this->nm_flag_saida_novo = "S"; 
              $this->nmgp_opcao = "novo"; 
              $this->sc_evento  = "novo"; 
              if ($this->aba_iframe)
              {
                  $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs->EOF && $this->nmgp_botoes['new'] != "on" && !$this->proc_fast_search)
          {
              $this->nmgp_form_empty = true;
          }
          if ($rs->EOF)
          {
              $sc_seq_vert = 0; 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_filter']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['empty_filter'] = true;
              }
          }
          else
          {
              $sc_seq_vert = 1; 
          }
          if ('total' == $this->form_paginacao)
          {
              $bPagTest = true;
              $this->sc_max_reg = 0;
          }
          else
          {
              $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
          }
          while (!$rs->EOF && $bPagTest)
          { 
              if ('total' == $this->form_paginacao)
              {
                  $this->sc_max_reg++;
              }
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $guard_seq_vert = $sc_seq_vert;
                  $sc_seq_vert    = $this->nmgp_refresh_row;
              }
              if ('total' != $this->form_paginacao)
              {
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] == "R")
              { 
                  $this->sc_max_reg++;
              } 
              }
              $this->idpermisos_ = $rs->fields[0] ; 
              $this->nmgp_dados_select['idpermisos_'] = $this->idpermisos_;
              $this->usuario_ = $rs->fields[1] ; 
              $this->nmgp_dados_select['usuario_'] = $this->usuario_;
              $this->terceros_lista_ = $rs->fields[2] ; 
              $this->nmgp_dados_select['terceros_lista_'] = $this->terceros_lista_;
              $this->terceros_frm_ = $rs->fields[3] ; 
              $this->nmgp_dados_select['terceros_frm_'] = $this->terceros_frm_;
              $this->productos_lista_ = $rs->fields[4] ; 
              $this->nmgp_dados_select['productos_lista_'] = $this->productos_lista_;
              $this->productos_frm_ = $rs->fields[5] ; 
              $this->nmgp_dados_select['productos_frm_'] = $this->productos_frm_;
              $this->grupos_lista_ = $rs->fields[6] ; 
              $this->nmgp_dados_select['grupos_lista_'] = $this->grupos_lista_;
              $this->grupos_frm_ = $rs->fields[7] ; 
              $this->nmgp_dados_select['grupos_frm_'] = $this->grupos_frm_;
              $this->usuarios_lista_ = $rs->fields[8] ; 
              $this->nmgp_dados_select['usuarios_lista_'] = $this->usuarios_lista_;
              $this->usuarios_frm_ = $rs->fields[9] ; 
              $this->nmgp_dados_select['usuarios_frm_'] = $this->usuarios_frm_;
              $this->compras_lista_ = $rs->fields[10] ; 
              $this->nmgp_dados_select['compras_lista_'] = $this->compras_lista_;
              $this->compras_frm_ = $rs->fields[11] ; 
              $this->nmgp_dados_select['compras_frm_'] = $this->compras_frm_;
              $this->ventas_lista_ = $rs->fields[12] ; 
              $this->nmgp_dados_select['ventas_lista_'] = $this->ventas_lista_;
              $this->ventas_frm_ = $rs->fields[13] ; 
              $this->nmgp_dados_select['ventas_frm_'] = $this->ventas_frm_;
              $this->cartera_lista_ = $rs->fields[14] ; 
              $this->nmgp_dados_select['cartera_lista_'] = $this->cartera_lista_;
              $this->cartera_frm_ = $rs->fields[15] ; 
              $this->nmgp_dados_select['cartera_frm_'] = $this->cartera_frm_;
              $this->caja_lista_ = $rs->fields[16] ; 
              $this->nmgp_dados_select['caja_lista_'] = $this->caja_lista_;
              $this->caja_frm_ = $rs->fields[17] ; 
              $this->nmgp_dados_select['caja_frm_'] = $this->caja_frm_;
              $this->mantenimiento_ = $rs->fields[18] ; 
              $this->nmgp_dados_select['mantenimiento_'] = $this->mantenimiento_;
              $this->empresa_ = $rs->fields[19] ; 
              $this->nmgp_dados_select['empresa_'] = $this->empresa_;
              $this->inventario_ = $rs->fields[20] ; 
              $this->nmgp_dados_select['inventario_'] = $this->inventario_;
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->idpermisos_ = (string)$this->idpermisos_; 
              $this->usuario_ = (string)$this->usuario_; 
              if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['parms'])) 
              { 
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['parms'] = "idpermisos_?#?$this->idpermisos_?@?";
              } 
              $this->nm_proc_onload_record($sc_seq_vert);
              $this->storeRecordState($sc_seq_vert);
//
//-- 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dados_select'][$sc_seq_vert] = $this->nmgp_dados_select;
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_form_permisos[$sc_seq_vert]['usuario_'] =  $this->usuario_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['terceros_lista_'] =  $this->terceros_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['terceros_frm_'] =  $this->terceros_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['productos_lista_'] =  $this->productos_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['productos_frm_'] =  $this->productos_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['grupos_lista_'] =  $this->grupos_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['grupos_frm_'] =  $this->grupos_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['usuarios_lista_'] =  $this->usuarios_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['usuarios_frm_'] =  $this->usuarios_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['compras_lista_'] =  $this->compras_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['compras_frm_'] =  $this->compras_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['ventas_lista_'] =  $this->ventas_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['ventas_frm_'] =  $this->ventas_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['cartera_lista_'] =  $this->cartera_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['cartera_frm_'] =  $this->cartera_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['caja_lista_'] =  $this->caja_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['caja_frm_'] =  $this->caja_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['mantenimiento_'] =  $this->mantenimiento_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['empresa_'] =  $this->empresa_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['inventario_'] =  $this->inventario_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['idpermisos_'] =  $this->idpermisos_; 
              $sc_seq_vert++; 
              $rs->MoveNext() ; 
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $sc_seq_vert = $guard_seq_vert;
              }
              if ('total' != $this->form_paginacao)
              {
                  $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
              }
          } 
          ksort ($this->form_vert_form_permisos); 
          $rs->Close(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_qtd'] = $sc_seq_vert + $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] - 1;
          if ('total' == $this->form_paginacao)
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $this->sc_max_reg; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $this->sc_max_reg; 
          }
          else
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['total'] + 1; 
          }
          if ($this->form_paginacao == "total")
          {
              $this->SC_nav_page = "";
          }
          else
          {
              $this->NM_gera_nav_page(); 
          }
          $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] < (($qt_geral_reg_form_permisos + 1) - $this->sc_max_reg);
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['opcao'] = '';
          }
      } 
      if ($this->nmgp_opcao == "novo") 
      { 
          $sc_seq_vert = 1; 
          $sc_check_incl = array(); 
          if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao) 
          { 
              $sc_seq_vert = $this->sc_seq_vert; 
              $this->sc_evento = "novo"; 
              $this->sc_max_reg_incl = $this->sc_seq_vert; 
          } 
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['embutida_multi']) 
          { 
          } 
          else 
          { 
              $this->sc_max_reg_incl = 0; 
          } 
          while ($sc_seq_vert <= $this->sc_max_reg_incl) 
          { 
              $this->usuario_ = "";  
              $this->terceros_lista_ = htmlentities("S");  
              $this->terceros_frm_ = htmlentities("S");  
              $this->productos_lista_ = htmlentities("S");  
              $this->productos_frm_ = htmlentities("S");  
              $this->grupos_lista_ = htmlentities("S");  
              $this->grupos_frm_ = htmlentities("S");  
              $this->usuarios_lista_ = htmlentities("S");  
              $this->usuarios_frm_ = htmlentities("S");  
              $this->compras_lista_ = htmlentities("S");  
              $this->compras_frm_ = htmlentities("S");  
              $this->ventas_lista_ = htmlentities("S");  
              $this->ventas_frm_ = htmlentities("S");  
              $this->cartera_lista_ = htmlentities("S");  
              $this->cartera_frm_ = htmlentities("S");  
              $this->caja_lista_ = htmlentities("S");  
              $this->caja_frm_ = htmlentities("S");  
              $this->mantenimiento_ = htmlentities("S");  
              $this->empresa_ = htmlentities("S");  
              $this->inventario_ = htmlentities("S");  
              $this->nm_proc_onload_record($sc_seq_vert);
              if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['foreign_key']))
              {
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['foreign_key'] as $sFKName => $sFKValue)
                  {
                      if (isset($this->sc_conv_var[$sFKName]))
                      {
                          $sFKName = $this->sc_conv_var[$sFKName];
                      }
                      eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
                  }
              }
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_form_permisos[$sc_seq_vert]['usuario_'] =  $this->usuario_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['terceros_lista_'] =  $this->terceros_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['terceros_frm_'] =  $this->terceros_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['productos_lista_'] =  $this->productos_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['productos_frm_'] =  $this->productos_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['grupos_lista_'] =  $this->grupos_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['grupos_frm_'] =  $this->grupos_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['usuarios_lista_'] =  $this->usuarios_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['usuarios_frm_'] =  $this->usuarios_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['compras_lista_'] =  $this->compras_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['compras_frm_'] =  $this->compras_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['ventas_lista_'] =  $this->ventas_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['ventas_frm_'] =  $this->ventas_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['cartera_lista_'] =  $this->cartera_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['cartera_frm_'] =  $this->cartera_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['caja_lista_'] =  $this->caja_lista_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['caja_frm_'] =  $this->caja_frm_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['mantenimiento_'] =  $this->mantenimiento_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['empresa_'] =  $this->empresa_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['inventario_'] =  $this->inventario_; 
             $this->form_vert_form_permisos[$sc_seq_vert]['idpermisos_'] =  $this->idpermisos_; 
              $sc_seq_vert++; 
          } 
      }  
  }
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = $this->sc_max_reg;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['reg_start'] + $this->sc_max_reg;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['record_state'][$sc_seq_vert]['buttons']['update'];
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_permisos_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
   if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
   {
        $this->Form_Corpo(true);
   }
   elseif ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
   {
        $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['table_refresh'] = true;
        $this->Form_Table(true);
        $this->Form_Corpo(false, true);
   }
   else
   {
        $this->Form_Init();
        $this->Form_Table();
        $this->Form_Corpo();
        $this->Form_Fim();
   }
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("usuario_"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['csrf_token'];
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

   function Form_lookup_usuario_()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_'] = array(); 
    }
   $nm_comando = "SELECT idusuarios, usuario  FROM usuarios  WHERE idusuarios != 1 ORDER BY usuario";
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['Lookup_usuario_'][] = $rs->fields[0];
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
   function Form_lookup_terceros_lista_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_terceros_frm_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_productos_lista_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_productos_frm_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_grupos_lista_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_grupos_frm_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_usuarios_lista_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_usuarios_frm_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_compras_lista_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_compras_frm_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_ventas_lista_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_ventas_frm_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_cartera_lista_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_cartera_frm_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_caja_lista_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_caja_frm_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_mantenimiento_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_empresa_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_inventario_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_permisos_pack_ajax_response();
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
              $data_lookup = $this->SC_lookup_usuario_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "usuario", $arg_search, $data_lookup);
              }
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_permisos = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['total'] = $qt_geral_reg_form_permisos;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_permisos_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_permisos_pack_ajax_response();
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
      $nm_numeric[] = "idpermisos";$nm_numeric[] = "usuario";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['decimal_db'] == ".")
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
   function SC_lookup_usuario_($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT usuario, idusuarios FROM usuarios WHERE (CAST (idusuarios AS TEXT) LIKE '%$campo%') AND (idusuarios != 1)" ; 
       }
       else
       {
           $nm_comando = "SELECT usuario, idusuarios FROM usuarios WHERE (usuario LIKE '%$campo%') AND (idusuarios != 1)" ; 
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
       $nmgp_saida_form = "form_permisos_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_permisos_fim.php";
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
       form_permisos_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
    <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_permisos']['masterValue']);
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
                return array("sc_b_new_t.sc-unique-btn-1", "sc_b_new_t.sc-unique-btn-2");
                break;
            case "insert":
                return array("sc_b_ins_t.sc-unique-btn-3");
                break;
            case "bcancelar":
                return array("sc_b_sai_t.sc-unique-btn-4");
                break;
            case "update":
                return array("sc_b_upd_t.sc-unique-btn-5");
                break;
            case "0":
                return array("sys_separator.sc-unique-btn-6");
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
