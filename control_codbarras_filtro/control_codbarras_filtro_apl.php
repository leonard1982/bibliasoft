<?php
//
class control_codbarras_filtro_apl
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
   var $familia;
   var $familia_1;
   var $codigo;
   var $descripcion;
   var $tamanio;
   var $tipoletra;
   var $tipoletra_1;
   var $numerocolumnas;
   var $tipocodbarras;
   var $tipocodbarras_1;
   var $tipoimagen;
   var $tipoimagen_1;
   var $titulopersonalizado;
   var $vercodigo;
   var $vercodigo_1;
   var $verdescripcion;
   var $verdescripcion_1;
   var $verprecio;
   var $verprecio_1;
   var $altura;
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
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['altura']))
          {
              $this->altura = $this->NM_ajax_info['param']['altura'];
          }
          if (isset($this->NM_ajax_info['param']['codigo']))
          {
              $this->codigo = $this->NM_ajax_info['param']['codigo'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['descripcion']))
          {
              $this->descripcion = $this->NM_ajax_info['param']['descripcion'];
          }
          if (isset($this->NM_ajax_info['param']['familia']))
          {
              $this->familia = $this->NM_ajax_info['param']['familia'];
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
          if (isset($this->NM_ajax_info['param']['numerocolumnas']))
          {
              $this->numerocolumnas = $this->NM_ajax_info['param']['numerocolumnas'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['tamanio']))
          {
              $this->tamanio = $this->NM_ajax_info['param']['tamanio'];
          }
          if (isset($this->NM_ajax_info['param']['tipocodbarras']))
          {
              $this->tipocodbarras = $this->NM_ajax_info['param']['tipocodbarras'];
          }
          if (isset($this->NM_ajax_info['param']['tipoimagen']))
          {
              $this->tipoimagen = $this->NM_ajax_info['param']['tipoimagen'];
          }
          if (isset($this->NM_ajax_info['param']['tipoletra']))
          {
              $this->tipoletra = $this->NM_ajax_info['param']['tipoletra'];
          }
          if (isset($this->NM_ajax_info['param']['titulopersonalizado']))
          {
              $this->titulopersonalizado = $this->NM_ajax_info['param']['titulopersonalizado'];
          }
          if (isset($this->NM_ajax_info['param']['vercodigo']))
          {
              $this->vercodigo = $this->NM_ajax_info['param']['vercodigo'];
          }
          if (isset($this->NM_ajax_info['param']['verdescripcion']))
          {
              $this->verdescripcion = $this->NM_ajax_info['param']['verdescripcion'];
          }
          if (isset($this->NM_ajax_info['param']['verprecio']))
          {
              $this->verprecio = $this->NM_ajax_info['param']['verprecio'];
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
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['control_codbarras_filtro']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['control_codbarras_filtro']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['control_codbarras_filtro']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['control_codbarras_filtro']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['control_codbarras_filtro']['embutida_parms']);
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
                 nm_limpa_str_control_codbarras_filtro($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['control_codbarras_filtro']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['control_codbarras_filtro']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['control_codbarras_filtro']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['control_codbarras_filtro']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['control_codbarras_filtro']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['control_codbarras_filtro']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['control_codbarras_filtro']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['control_codbarras_filtro']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['control_codbarras_filtro']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['control_codbarras_filtro']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['control_codbarras_filtro']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['control_codbarras_filtro']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['control_codbarras_filtro']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['control_codbarras_filtro']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new control_codbarras_filtro_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['control_codbarras_filtro']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['control_codbarras_filtro']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['control_codbarras_filtro'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['control_codbarras_filtro']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['control_codbarras_filtro']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('control_codbarras_filtro') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['control_codbarras_filtro']['label'] = "Impresión de Etiquetas";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "control_codbarras_filtro")
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


      $this->arr_buttons['resetar']['hint']             = "";
      $this->arr_buttons['resetar']['type']             = "button";
      $this->arr_buttons['resetar']['value']            = "Limpiar";
      $this->arr_buttons['resetar']['display']          = "only_text";
      $this->arr_buttons['resetar']['display_position'] = "text_right";
      $this->arr_buttons['resetar']['style']            = "default";
      $this->arr_buttons['resetar']['image']            = "";


      $_SESSION['scriptcase']['error_icon']['control_codbarras_filtro']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Lemon__NM__nm_scriptcase9_Lemon_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['control_codbarras_filtro'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['ok'] = "on";
      $this->nmgp_botoes['facebook'] = "off";
      $this->nmgp_botoes['google'] = "off";
      $this->nmgp_botoes['twitter'] = "off";
      $this->nmgp_botoes['paypal'] = "off";
      $this->nmgp_botoes['resetar'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['control_codbarras_filtro']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['control_codbarras_filtro'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['control_codbarras_filtro'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("control_codbarras_filtro", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'control_codbarras_filtro_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'control_codbarras_filtro_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('contr:' == substr($str_link_webhelp, 0, 6))
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
          require_once($this->Ini->path_embutida . 'control_codbarras_filtro/control_codbarras_filtro_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "control_codbarras_filtro_erro.class.php"); 
      }
      $this->Erro      = new control_codbarras_filtro_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['control_codbarras_filtro']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['resetar'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['resetar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['botoes']['resetar'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['dados_form'];
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

            $out1_img_cache = $_SESSION['scriptcase']['control_codbarras_filtro']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['control_codbarras_filtro']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- tamanio
      $this->field_config['tamanio']               = array();
      $this->field_config['tamanio']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['tamanio']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['tamanio']['symbol_dec'] = '';
      $this->field_config['tamanio']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['tamanio']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- numerocolumnas
      $this->field_config['numerocolumnas']               = array();
      $this->field_config['numerocolumnas']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['numerocolumnas']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['numerocolumnas']['symbol_dec'] = '';
      $this->field_config['numerocolumnas']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['numerocolumnas']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- altura
      $this->field_config['altura']               = array();
      $this->field_config['altura']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['altura']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['altura']['symbol_dec'] = '';
      $this->field_config['altura']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['altura']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


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
          if ('validate_familia' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'familia');
          }
          if ('validate_codigo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'codigo');
          }
          if ('validate_descripcion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'descripcion');
          }
          if ('validate_tamanio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tamanio');
          }
          if ('validate_tipoletra' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipoletra');
          }
          if ('validate_numerocolumnas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numerocolumnas');
          }
          if ('validate_tipocodbarras' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipocodbarras');
          }
          if ('validate_tipoimagen' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipoimagen');
          }
          if ('validate_altura' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'altura');
          }
          if ('validate_vercodigo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'vercodigo');
          }
          if ('validate_verdescripcion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'verdescripcion');
          }
          if ('validate_verprecio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'verprecio');
          }
          if ('validate_titulopersonalizado' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'titulopersonalizado');
          }
          control_codbarras_filtro_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->vercodigo))
          {
              $x = 0; 
              $this->vercodigo_1 = $this->vercodigo;
              $this->vercodigo = ""; 
              if ($this->vercodigo_1 != "") 
              { 
                  foreach ($this->vercodigo_1 as $dados_vercodigo_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->vercodigo .= ";";
                      } 
                      $this->vercodigo .= $dados_vercodigo_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->verdescripcion))
          {
              $x = 0; 
              $this->verdescripcion_1 = $this->verdescripcion;
              $this->verdescripcion = ""; 
              if ($this->verdescripcion_1 != "") 
              { 
                  foreach ($this->verdescripcion_1 as $dados_verdescripcion_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->verdescripcion .= ";";
                      } 
                      $this->verdescripcion .= $dados_verdescripcion_1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              control_codbarras_filtro_pack_ajax_response();
              exit;
          }
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['control_codbarras_filtro']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  control_codbarras_filtro_pack_ajax_response();
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
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['control_codbarras_filtro']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  control_codbarras_filtro_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
//
      if (!isset($nm_form_submit) && $this->nmgp_opcao != "nada")
      {
          $this->familia = "" ;  
          $this->codigo = "" ;  
          $this->descripcion = "" ;  
          $this->tamanio = "9" ;  
          $this->tipoletra = "" ;  
          $this->numerocolumnas = "4" ;  
          $this->tipocodbarras = "" ;  
          $this->tipoimagen = "" ;  
          $this->titulopersonalizado = "" ;  
          $this->vercodigo = "SI" ;  
          $this->verdescripcion = "SI" ;  
          $this->verprecio = "" ;  
          $this->altura = "50" ;  
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['dados_form']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['dados_form']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['dados_form'] as $NM_campo => $NM_valor)
              {
                  $$NM_campo = $NM_valor;
              }
          }
      }
      else
      {
           if ($this->nmgp_opcao != "nada")
           {
           }
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['recarga'] = $this->nmgp_opcao;
      }
      if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "" || $campos_erro != "" || !isset($this->bok) || $this->bok != "OK" || $this->nmgp_opcao == "recarga")
      {
          if ($Campos_Crit == "" && empty($Campos_Falta) && $this->Campos_Mens_erro == "" && !isset($this->bok) && $this->nmgp_opcao != "recarga")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos']))
              { 
                  $familia = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][0]; 
                  $codigo = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][1]; 
                  $descripcion = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][2]; 
                  $tamanio = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][3]; 
                  $tipoletra = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][4]; 
                  $numerocolumnas = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][5]; 
                  $tipocodbarras = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][6]; 
                  $tipoimagen = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][7]; 
                  $altura = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][8]; 
                  $vercodigo = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][9]; 
                  $verdescripcion = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][10]; 
                  $verprecio = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][11]; 
                  $titulopersonalizado = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][12]; 
              } 
          }
          $this->nm_gera_html();
          $this->NM_close_db(); 
      }
      elseif (isset($this->bok) && $this->bok == "OK")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'] = array(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][0] = $this->familia; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][1] = $this->codigo; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][2] = $this->descripcion; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][3] = $this->tamanio; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][4] = $this->tipoletra; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][5] = $this->numerocolumnas; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][6] = $this->tipocodbarras; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][7] = $this->tipoimagen; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][8] = $this->altura; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][9] = $this->vercodigo; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][10] = $this->verdescripcion; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][11] = $this->verprecio; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['campos'][12] = $this->titulopersonalizado; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['redir'] == "redir")
          {
              $this->nmgp_redireciona(); 
          }
          else
          {
              $contr_menu = "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['iframe_menu'])
              {
                  $contr_menu = "glo_menu";
              }
              if (isset($_SESSION['scriptcase']['sc_ult_apl_menu']) && in_array("control_codbarras_filtro", $_SESSION['scriptcase']['sc_ult_apl_menu']))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona_form("control_codbarras_filtro_fim.php", $this->nm_location, $contr_menu); 
              }
              else
              {
                  $this->nm_gera_html();
                  if (!$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['embutida_proc'])
                  { 
                      $this->NM_close_db(); 
                  } 
              }
          }
          $this->NM_close_db(); 
          if ($this->NM_ajax_flag)
          {
              control_codbarras_filtro_pack_ajax_response();
              exit;
          }
      }
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "control_codbarras_filtro.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Impresión de Etiquetas") ?></TITLE>
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
<form name="Fdown" method="get" action="control_codbarras_filtro_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="control_codbarras_filtro"> 
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
           case 'familia':
               return "Grupo/Familia";
               break;
           case 'codigo':
               return "Código";
               break;
           case 'descripcion':
               return "Descripción";
               break;
           case 'tamanio':
               return "Tamaño Letra";
               break;
           case 'tipoletra':
               return "Tipo Letra";
               break;
           case 'numerocolumnas':
               return "Columnas  por Hoja";
               break;
           case 'tipocodbarras':
               return "Tipo";
               break;
           case 'tipoimagen':
               return "Tipo Imagen";
               break;
           case 'altura':
               return "Altura";
               break;
           case 'vercodigo':
               return "Ver Código";
               break;
           case 'verdescripcion':
               return "Ver Descripción";
               break;
           case 'verprecio':
               return " Ver Precio";
               break;
           case 'titulopersonalizado':
               return "Titulo Reporte";
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
              if (!isset($this->NM_ajax_info['errList']['geral_control_codbarras_filtro']) || !is_array($this->NM_ajax_info['errList']['geral_control_codbarras_filtro']))
              {
                  $this->NM_ajax_info['errList']['geral_control_codbarras_filtro'] = array();
              }
              $this->NM_ajax_info['errList']['geral_control_codbarras_filtro'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'familia' == $filtro)) || (is_array($filtro) && in_array('familia', $filtro)))
        $this->ValidateField_familia($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'codigo' == $filtro)) || (is_array($filtro) && in_array('codigo', $filtro)))
        $this->ValidateField_codigo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'descripcion' == $filtro)) || (is_array($filtro) && in_array('descripcion', $filtro)))
        $this->ValidateField_descripcion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tamanio' == $filtro)) || (is_array($filtro) && in_array('tamanio', $filtro)))
        $this->ValidateField_tamanio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipoletra' == $filtro)) || (is_array($filtro) && in_array('tipoletra', $filtro)))
        $this->ValidateField_tipoletra($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'numerocolumnas' == $filtro)) || (is_array($filtro) && in_array('numerocolumnas', $filtro)))
        $this->ValidateField_numerocolumnas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipocodbarras' == $filtro)) || (is_array($filtro) && in_array('tipocodbarras', $filtro)))
        $this->ValidateField_tipocodbarras($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipoimagen' == $filtro)) || (is_array($filtro) && in_array('tipoimagen', $filtro)))
        $this->ValidateField_tipoimagen($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'altura' == $filtro)) || (is_array($filtro) && in_array('altura', $filtro)))
        $this->ValidateField_altura($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'vercodigo' == $filtro)) || (is_array($filtro) && in_array('vercodigo', $filtro)))
        $this->ValidateField_vercodigo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'verdescripcion' == $filtro)) || (is_array($filtro) && in_array('verdescripcion', $filtro)))
        $this->ValidateField_verdescripcion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'verprecio' == $filtro)) || (is_array($filtro) && in_array('verprecio', $filtro)))
        $this->ValidateField_verprecio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'titulopersonalizado' == $filtro)) || (is_array($filtro) && in_array('titulopersonalizado', $filtro)))
        $this->ValidateField_titulopersonalizado($Campos_Crit, $Campos_Falta, $Campos_Erros);

      if (empty($Campos_Crit) && empty($Campos_Falta))
      {
      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['control_codbarras_filtro']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_altura = $this->altura;
    $original_codigo = $this->codigo;
    $original_descripcion = $this->descripcion;
    $original_familia = $this->familia;
    $original_numerocolumnas = $this->numerocolumnas;
    $original_tamanio = $this->tamanio;
    $original_tipocodbarras = $this->tipocodbarras;
    $original_tipoimagen = $this->tipoimagen;
    $original_tipoletra = $this->tipoletra;
    $original_titulopersonalizado = $this->titulopersonalizado;
    $original_vercodigo = $this->vercodigo;
    $original_verdescripcion = $this->verdescripcion;
    $original_verprecio = $this->verprecio;
}
 $vfamilia  = $this->familia ;
$vcodigo   = $this->codigo ;
$vdesc     = $this->descripcion ;
$vtamanio  = $this->tamanio ;
$vletra    = $this->tipoletra ;
$vcolumnas = $this->numerocolumnas ; 
$vtipo	   = $this->tipocodbarras ;
$vtipoimg  = $this->tipoimagen ;
$valtura   = $this->altura ;
$vvercod   = $this->vercodigo ;
$vverdesc  = $this->verdescripcion ;
$vverprecio= $this->verprecio ;
$vtitulop  = $this->titulopersonalizado ;

$parametros['familia']    = $vfamilia; 
$parametros['codigo']     = $vcodigo; 
$parametros['descripcion']= $vdesc; 
$parametros['tamanio']    = $vtamanio;
$parametros['letra']      = $vletra; 
$parametros['columnas']   = $vcolumnas; 
$parametros['tipo']       = $vtipo; 
$parametros['tipoimg']    = $vtipoimg; 
$parametros['altura']     = $valtura;
$parametros['vercodigo']  = $vvercod;
$parametros['verdescrip'] = $vverdesc;
$parametros['verprecio']  = $vverprecio;
$parametros['titulo']     = $vtitulop;

$vurl = "../blank_codbarras/?parametros=".urlencode(serialize($parametros));

 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($vurl, $this->nm_location, "", "_blank", "ret_self", 440, 630);
 };
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_altura != $this->altura || (isset($bFlagRead_altura) && $bFlagRead_altura)))
    {
        $this->ajax_return_values_altura(true);
    }
    if (($original_codigo != $this->codigo || (isset($bFlagRead_codigo) && $bFlagRead_codigo)))
    {
        $this->ajax_return_values_codigo(true);
    }
    if (($original_descripcion != $this->descripcion || (isset($bFlagRead_descripcion) && $bFlagRead_descripcion)))
    {
        $this->ajax_return_values_descripcion(true);
    }
    if (($original_familia != $this->familia || (isset($bFlagRead_familia) && $bFlagRead_familia)))
    {
        $this->ajax_return_values_familia(true);
    }
    if (($original_numerocolumnas != $this->numerocolumnas || (isset($bFlagRead_numerocolumnas) && $bFlagRead_numerocolumnas)))
    {
        $this->ajax_return_values_numerocolumnas(true);
    }
    if (($original_tamanio != $this->tamanio || (isset($bFlagRead_tamanio) && $bFlagRead_tamanio)))
    {
        $this->ajax_return_values_tamanio(true);
    }
    if (($original_tipocodbarras != $this->tipocodbarras || (isset($bFlagRead_tipocodbarras) && $bFlagRead_tipocodbarras)))
    {
        $this->ajax_return_values_tipocodbarras(true);
    }
    if (($original_tipoimagen != $this->tipoimagen || (isset($bFlagRead_tipoimagen) && $bFlagRead_tipoimagen)))
    {
        $this->ajax_return_values_tipoimagen(true);
    }
    if (($original_tipoletra != $this->tipoletra || (isset($bFlagRead_tipoletra) && $bFlagRead_tipoletra)))
    {
        $this->ajax_return_values_tipoletra(true);
    }
    if (($original_titulopersonalizado != $this->titulopersonalizado || (isset($bFlagRead_titulopersonalizado) && $bFlagRead_titulopersonalizado)))
    {
        $this->ajax_return_values_titulopersonalizado(true);
    }
    if (($original_vercodigo != $this->vercodigo || (isset($bFlagRead_vercodigo) && $bFlagRead_vercodigo)))
    {
        $this->ajax_return_values_vercodigo(true);
    }
    if (($original_verdescripcion != $this->verdescripcion || (isset($bFlagRead_verdescripcion) && $bFlagRead_verdescripcion)))
    {
        $this->ajax_return_values_verdescripcion(true);
    }
    if (($original_verprecio != $this->verprecio || (isset($bFlagRead_verprecio) && $bFlagRead_verprecio)))
    {
        $this->ajax_return_values_verprecio(true);
    }
}
$_SESSION['scriptcase']['control_codbarras_filtro']['contr_erro'] = 'off'; 
      }
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

    function ValidateField_familia(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->familia) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_familia']) && !in_array($this->familia, $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_familia']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['familia']))
                   {
                       $Campos_Erros['familia'] = array();
                   }
                   $Campos_Erros['familia'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['familia']) || !is_array($this->NM_ajax_info['errList']['familia']))
                   {
                       $this->NM_ajax_info['errList']['familia'] = array();
                   }
                   $this->NM_ajax_info['errList']['familia'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'familia';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_familia

    function ValidateField_codigo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->codigo = sc_strtoupper($this->codigo); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->codigo) > 60) 
          { 
              $hasError = true;
              $Campos_Crit .= "Código " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['codigo']))
              {
                  $Campos_Erros['codigo'] = array();
              }
              $Campos_Erros['codigo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['codigo']) || !is_array($this->NM_ajax_info['errList']['codigo']))
              {
                  $this->NM_ajax_info['errList']['codigo'] = array();
              }
              $this->NM_ajax_info['errList']['codigo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'codigo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_codigo

    function ValidateField_descripcion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->descripcion = sc_strtoupper($this->descripcion); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->descripcion) > 60) 
          { 
              $hasError = true;
              $Campos_Crit .= "Descripción " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['descripcion']))
              {
                  $Campos_Erros['descripcion'] = array();
              }
              $Campos_Erros['descripcion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['descripcion']) || !is_array($this->NM_ajax_info['errList']['descripcion']))
              {
                  $this->NM_ajax_info['errList']['descripcion'] = array();
              }
              $this->NM_ajax_info['errList']['descripcion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'descripcion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_descripcion

    function ValidateField_tamanio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tamanio === "" || is_null($this->tamanio))  
      { 
          $this->tamanio = 0;
          $this->sc_force_zero[] = 'tamanio';
      } 
      nm_limpa_numero($this->tamanio, $this->field_config['tamanio']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->tamanio != '')  
          { 
              $iTestSize = 20;
              if ('-' == substr($this->tamanio, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->tamanio, -1))
              {
                  $iTestSize++;
                  $this->tamanio = '-' . substr($this->tamanio, 0, -1);
              }
              if (strlen($this->tamanio) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tamaño Letra: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['tamanio']))
                  {
                      $Campos_Erros['tamanio'] = array();
                  }
                  $Campos_Erros['tamanio'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['tamanio']) || !is_array($this->NM_ajax_info['errList']['tamanio']))
                  {
                      $this->NM_ajax_info['errList']['tamanio'] = array();
                  }
                  $this->NM_ajax_info['errList']['tamanio'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->tamanio, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tamaño Letra; " ; 
                  if (!isset($Campos_Erros['tamanio']))
                  {
                      $Campos_Erros['tamanio'] = array();
                  }
                  $Campos_Erros['tamanio'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['tamanio']) || !is_array($this->NM_ajax_info['errList']['tamanio']))
                  {
                      $this->NM_ajax_info['errList']['tamanio'] = array();
                  }
                  $this->NM_ajax_info['errList']['tamanio'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tamanio';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tamanio

    function ValidateField_tipoletra(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tipoletra == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipoletra';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipoletra

    function ValidateField_numerocolumnas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->numerocolumnas === "" || is_null($this->numerocolumnas))  
      { 
          $this->numerocolumnas = 0;
          $this->sc_force_zero[] = 'numerocolumnas';
      } 
      nm_limpa_numero($this->numerocolumnas, $this->field_config['numerocolumnas']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->numerocolumnas != '')  
          { 
              $iTestSize = 20;
              if ('-' == substr($this->numerocolumnas, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->numerocolumnas, -1))
              {
                  $iTestSize++;
                  $this->numerocolumnas = '-' . substr($this->numerocolumnas, 0, -1);
              }
              if (strlen($this->numerocolumnas) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Columnas  por Hoja: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['numerocolumnas']))
                  {
                      $Campos_Erros['numerocolumnas'] = array();
                  }
                  $Campos_Erros['numerocolumnas'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['numerocolumnas']) || !is_array($this->NM_ajax_info['errList']['numerocolumnas']))
                  {
                      $this->NM_ajax_info['errList']['numerocolumnas'] = array();
                  }
                  $this->NM_ajax_info['errList']['numerocolumnas'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->numerocolumnas, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Columnas  por Hoja; " ; 
                  if (!isset($Campos_Erros['numerocolumnas']))
                  {
                      $Campos_Erros['numerocolumnas'] = array();
                  }
                  $Campos_Erros['numerocolumnas'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['numerocolumnas']) || !is_array($this->NM_ajax_info['errList']['numerocolumnas']))
                  {
                      $this->NM_ajax_info['errList']['numerocolumnas'] = array();
                  }
                  $this->NM_ajax_info['errList']['numerocolumnas'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'numerocolumnas';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_numerocolumnas

    function ValidateField_tipocodbarras(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tipocodbarras == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipocodbarras';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipocodbarras

    function ValidateField_tipoimagen(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tipoimagen == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipoimagen';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipoimagen

    function ValidateField_altura(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->altura === "" || is_null($this->altura))  
      { 
          $this->altura = 0;
          $this->sc_force_zero[] = 'altura';
      } 
      nm_limpa_numero($this->altura, $this->field_config['altura']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->altura != '')  
          { 
              $iTestSize = 20;
              if ('-' == substr($this->altura, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->altura, -1))
              {
                  $iTestSize++;
                  $this->altura = '-' . substr($this->altura, 0, -1);
              }
              if (strlen($this->altura) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Altura: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['altura']))
                  {
                      $Campos_Erros['altura'] = array();
                  }
                  $Campos_Erros['altura'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['altura']) || !is_array($this->NM_ajax_info['errList']['altura']))
                  {
                      $this->NM_ajax_info['errList']['altura'] = array();
                  }
                  $this->NM_ajax_info['errList']['altura'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->altura, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Altura; " ; 
                  if (!isset($Campos_Erros['altura']))
                  {
                      $Campos_Erros['altura'] = array();
                  }
                  $Campos_Erros['altura'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['altura']) || !is_array($this->NM_ajax_info['errList']['altura']))
                  {
                      $this->NM_ajax_info['errList']['altura'] = array();
                  }
                  $this->NM_ajax_info['errList']['altura'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'altura';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_altura

    function ValidateField_vercodigo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->vercodigo == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->vercodigo = "NO";
      } 
      else 
      { 
          if (is_array($this->vercodigo))
          {
              $x = 0; 
              $this->vercodigo_1 = array(); 
              foreach ($this->vercodigo as $ind => $dados_vercodigo_1 ) 
              {
                  if ($dados_vercodigo_1 != "") 
                  {
                      $this->vercodigo_1[] = $dados_vercodigo_1;
                  } 
              } 
              $this->vercodigo = ""; 
              foreach ($this->vercodigo_1 as $dados_vercodigo_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->vercodigo .= ";";
                   } 
                   $this->vercodigo .= $dados_vercodigo_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'vercodigo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_vercodigo

    function ValidateField_verdescripcion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->verdescripcion == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->verdescripcion = "NO";
      } 
      else 
      { 
          if (is_array($this->verdescripcion))
          {
              $x = 0; 
              $this->verdescripcion_1 = array(); 
              foreach ($this->verdescripcion as $ind => $dados_verdescripcion_1 ) 
              {
                  if ($dados_verdescripcion_1 != "") 
                  {
                      $this->verdescripcion_1[] = $dados_verdescripcion_1;
                  } 
              } 
              $this->verdescripcion = ""; 
              foreach ($this->verdescripcion_1 as $dados_verdescripcion_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->verdescripcion .= ";";
                   } 
                   $this->verdescripcion .= $dados_verdescripcion_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'verdescripcion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_verdescripcion

    function ValidateField_verprecio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->verprecio == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'verprecio';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_verprecio

    function ValidateField_titulopersonalizado(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->titulopersonalizado = sc_strtoupper($this->titulopersonalizado); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->titulopersonalizado) > 60) 
          { 
              $hasError = true;
              $Campos_Crit .= "Titulo Reporte " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['titulopersonalizado']))
              {
                  $Campos_Erros['titulopersonalizado'] = array();
              }
              $Campos_Erros['titulopersonalizado'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['titulopersonalizado']) || !is_array($this->NM_ajax_info['errList']['titulopersonalizado']))
              {
                  $this->NM_ajax_info['errList']['titulopersonalizado'] = array();
              }
              $this->NM_ajax_info['errList']['titulopersonalizado'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'titulopersonalizado';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_titulopersonalizado

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
    $this->nmgp_dados_form['familia'] = $this->familia;
    $this->nmgp_dados_form['codigo'] = $this->codigo;
    $this->nmgp_dados_form['descripcion'] = $this->descripcion;
    $this->nmgp_dados_form['tamanio'] = $this->tamanio;
    $this->nmgp_dados_form['tipoletra'] = $this->tipoletra;
    $this->nmgp_dados_form['numerocolumnas'] = $this->numerocolumnas;
    $this->nmgp_dados_form['tipocodbarras'] = $this->tipocodbarras;
    $this->nmgp_dados_form['tipoimagen'] = $this->tipoimagen;
    $this->nmgp_dados_form['altura'] = $this->altura;
    $this->nmgp_dados_form['vercodigo'] = $this->vercodigo;
    $this->nmgp_dados_form['verdescripcion'] = $this->verdescripcion;
    $this->nmgp_dados_form['verprecio'] = $this->verprecio;
    $this->nmgp_dados_form['titulopersonalizado'] = $this->titulopersonalizado;
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['tamanio'] = $this->tamanio;
      nm_limpa_numero($this->tamanio, $this->field_config['tamanio']['symbol_grp']) ; 
      $this->Before_unformat['numerocolumnas'] = $this->numerocolumnas;
      nm_limpa_numero($this->numerocolumnas, $this->field_config['numerocolumnas']['symbol_grp']) ; 
      $this->Before_unformat['altura'] = $this->altura;
      nm_limpa_numero($this->altura, $this->field_config['altura']['symbol_grp']) ; 
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
      if ($Nome_Campo == "tamanio")
      {
          nm_limpa_numero($this->tamanio, $this->field_config['tamanio']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "numerocolumnas")
      {
          nm_limpa_numero($this->numerocolumnas, $this->field_config['numerocolumnas']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "altura")
      {
          nm_limpa_numero($this->altura, $this->field_config['altura']['symbol_grp']) ; 
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
      if ('' !== $this->tamanio || (!empty($format_fields) && isset($format_fields['tamanio'])))
      {
          nmgp_Form_Num_Val($this->tamanio, $this->field_config['tamanio']['symbol_grp'], $this->field_config['tamanio']['symbol_dec'], "0", "S", $this->field_config['tamanio']['format_neg'], "", "", "-", $this->field_config['tamanio']['symbol_fmt']) ; 
      }
      if ('' !== $this->numerocolumnas || (!empty($format_fields) && isset($format_fields['numerocolumnas'])))
      {
          nmgp_Form_Num_Val($this->numerocolumnas, $this->field_config['numerocolumnas']['symbol_grp'], $this->field_config['numerocolumnas']['symbol_dec'], "0", "S", $this->field_config['numerocolumnas']['format_neg'], "", "", "-", $this->field_config['numerocolumnas']['symbol_fmt']) ; 
      }
      if ('' !== $this->altura || (!empty($format_fields) && isset($format_fields['altura'])))
      {
          nmgp_Form_Num_Val($this->altura, $this->field_config['altura']['symbol_grp'], $this->field_config['altura']['symbol_dec'], "0", "S", $this->field_config['altura']['format_neg'], "", "", "-", $this->field_config['altura']['symbol_fmt']) ; 
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

   function ajax_return_values()
   {
          $this->ajax_return_values_familia();
          $this->ajax_return_values_codigo();
          $this->ajax_return_values_descripcion();
          $this->ajax_return_values_tamanio();
          $this->ajax_return_values_tipoletra();
          $this->ajax_return_values_numerocolumnas();
          $this->ajax_return_values_tipocodbarras();
          $this->ajax_return_values_tipoimagen();
          $this->ajax_return_values_altura();
          $this->ajax_return_values_vercodigo();
          $this->ajax_return_values_verdescripcion();
          $this->ajax_return_values_verprecio();
          $this->ajax_return_values_titulopersonalizado();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          }
   } // ajax_return_values

          //----- familia
   function ajax_return_values_familia($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("familia", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->familia);
              $aLookup = array();
              $this->_tmp_lookup_familia = $this->familia;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_familia']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_familia'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_familia']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_familia'] = array(); 
}
$aLookup[] = array(control_codbarras_filtro_pack_protect_string('') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string('SELECCIONE')));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_familia'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_tamanio = $this->tamanio;
   $old_value_numerocolumnas = $this->numerocolumnas;
   $old_value_altura = $this->altura;
   $this->nm_tira_formatacao();


   $unformatted_value_tamanio = $this->tamanio;
   $unformatted_value_numerocolumnas = $this->numerocolumnas;
   $unformatted_value_altura = $this->altura;

   $vercodigo_val_str = "''";
   if (!empty($this->vercodigo))
   {
       if (is_array($this->vercodigo))
       {
           $Tmp_array = $this->vercodigo;
       }
       else
       {
           $Tmp_array = explode(";", $this->vercodigo);
       }
       $vercodigo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $vercodigo_val_str)
          {
             $vercodigo_val_str .= ", ";
          }
          $vercodigo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $verdescripcion_val_str = "''";
   if (!empty($this->verdescripcion))
   {
       if (is_array($this->verdescripcion))
       {
           $Tmp_array = $this->verdescripcion;
       }
       else
       {
           $Tmp_array = explode(";", $this->verdescripcion);
       }
       $verdescripcion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $verdescripcion_val_str)
          {
             $verdescripcion_val_str .= ", ";
          }
          $verdescripcion_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idgrupo, nomgrupo  FROM grupo  ORDER BY nomgrupo";

   $this->tamanio = $old_value_tamanio;
   $this->numerocolumnas = $old_value_numerocolumnas;
   $this->altura = $old_value_altura;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(control_codbarras_filtro_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', control_codbarras_filtro_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_familia'][] = $rs->fields[0];
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
          $sSelComp = "name=\"familia\"";
          if (isset($this->NM_ajax_info['select_html']['familia']) && !empty($this->NM_ajax_info['select_html']['familia']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['familia']);
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

                  if ($this->familia == $sValue)
                  {
                      $this->_tmp_lookup_familia = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['familia'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['familia']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['familia']['valList'][$i] = control_codbarras_filtro_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['familia']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['familia']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['familia']['labList'] = $aLabel;
          }
   }

          //----- codigo
   function ajax_return_values_codigo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("codigo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->codigo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['codigo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- descripcion
   function ajax_return_values_descripcion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("descripcion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->descripcion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['descripcion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tamanio
   function ajax_return_values_tamanio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tamanio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tamanio);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tamanio'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- tipoletra
   function ajax_return_values_tipoletra($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipoletra", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipoletra);
              $aLookup = array();
              $this->_tmp_lookup_tipoletra = $this->tipoletra;

$aLookup[] = array(control_codbarras_filtro_pack_protect_string('Arial') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("Arial")));
$aLookup[] = array(control_codbarras_filtro_pack_protect_string('Helvetica') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("Helvetica")));
$aLookup[] = array(control_codbarras_filtro_pack_protect_string('sans') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("sans-serif")));
$aLookup[] = array(control_codbarras_filtro_pack_protect_string('Tahoma') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("Tahoma")));
$aLookup[] = array(control_codbarras_filtro_pack_protect_string('Georgia') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("Georgia")));
$aLookup[] = array(control_codbarras_filtro_pack_protect_string('Verdana') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("Verdana")));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_tipoletra'][] = 'Arial';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_tipoletra'][] = 'Helvetica';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_tipoletra'][] = 'sans';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_tipoletra'][] = 'Tahoma';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_tipoletra'][] = 'Georgia';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_tipoletra'][] = 'Verdana';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tipoletra\"";
          if (isset($this->NM_ajax_info['select_html']['tipoletra']) && !empty($this->NM_ajax_info['select_html']['tipoletra']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['tipoletra']);
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

                  if ($this->tipoletra == $sValue)
                  {
                      $this->_tmp_lookup_tipoletra = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tipoletra'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipoletra']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipoletra']['valList'][$i] = control_codbarras_filtro_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipoletra']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipoletra']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipoletra']['labList'] = $aLabel;
          }
   }

          //----- numerocolumnas
   function ajax_return_values_numerocolumnas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numerocolumnas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numerocolumnas);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numerocolumnas'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- tipocodbarras
   function ajax_return_values_tipocodbarras($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipocodbarras", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipocodbarras);
              $aLookup = array();
              $this->_tmp_lookup_tipocodbarras = $this->tipocodbarras;

$aLookup[] = array(control_codbarras_filtro_pack_protect_string('TYPE_EAN_13') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("TYPE_EAN_13")));
$aLookup[] = array(control_codbarras_filtro_pack_protect_string('TYPE_EAN_8') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("TYPE_EAN_8")));
$aLookup[] = array(control_codbarras_filtro_pack_protect_string('TYPE_EAN_5') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("TYPE_EAN_5")));
$aLookup[] = array(control_codbarras_filtro_pack_protect_string('TYPE_CODE_39') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("TYPE_CODE_39")));
$aLookup[] = array(control_codbarras_filtro_pack_protect_string('TYPE_CODE_128') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("TYPE_CODE_128")));
$aLookup[] = array(control_codbarras_filtro_pack_protect_string('TYPE_CODE_11') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("TYPE_CODE_11")));
$aLookup[] = array(control_codbarras_filtro_pack_protect_string('TYPE_PHARMA_CODE') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("TYPE_PHARMA_CODE")));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_tipocodbarras'][] = 'TYPE_EAN_13';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_tipocodbarras'][] = 'TYPE_EAN_8';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_tipocodbarras'][] = 'TYPE_EAN_5';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_tipocodbarras'][] = 'TYPE_CODE_39';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_tipocodbarras'][] = 'TYPE_CODE_128';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_tipocodbarras'][] = 'TYPE_CODE_11';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_tipocodbarras'][] = 'TYPE_PHARMA_CODE';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tipocodbarras\"";
          if (isset($this->NM_ajax_info['select_html']['tipocodbarras']) && !empty($this->NM_ajax_info['select_html']['tipocodbarras']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['tipocodbarras']);
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

                  if ($this->tipocodbarras == $sValue)
                  {
                      $this->_tmp_lookup_tipocodbarras = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tipocodbarras'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipocodbarras']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipocodbarras']['valList'][$i] = control_codbarras_filtro_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipocodbarras']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipocodbarras']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipocodbarras']['labList'] = $aLabel;
          }
   }

          //----- tipoimagen
   function ajax_return_values_tipoimagen($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipoimagen", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipoimagen);
              $aLookup = array();
              $this->_tmp_lookup_tipoimagen = $this->tipoimagen;

$aLookup[] = array(control_codbarras_filtro_pack_protect_string('BarcodeGeneratorPNG') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("PNG")));
$aLookup[] = array(control_codbarras_filtro_pack_protect_string('BarcodeGeneratorSVG') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("SVG")));
$aLookup[] = array(control_codbarras_filtro_pack_protect_string('BarcodeGeneratorJPG') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("JPG")));
$aLookup[] = array(control_codbarras_filtro_pack_protect_string('BarcodeGeneratorHTML') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("HTML")));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_tipoimagen'][] = 'BarcodeGeneratorPNG';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_tipoimagen'][] = 'BarcodeGeneratorSVG';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_tipoimagen'][] = 'BarcodeGeneratorJPG';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_tipoimagen'][] = 'BarcodeGeneratorHTML';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tipoimagen\"";
          if (isset($this->NM_ajax_info['select_html']['tipoimagen']) && !empty($this->NM_ajax_info['select_html']['tipoimagen']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['tipoimagen']);
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

                  if ($this->tipoimagen == $sValue)
                  {
                      $this->_tmp_lookup_tipoimagen = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tipoimagen'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipoimagen']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipoimagen']['valList'][$i] = control_codbarras_filtro_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipoimagen']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipoimagen']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipoimagen']['labList'] = $aLabel;
          }
   }

          //----- altura
   function ajax_return_values_altura($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("altura", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->altura);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['altura'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- vercodigo
   function ajax_return_values_vercodigo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("vercodigo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->vercodigo);
              $aLookup = array();
              $this->_tmp_lookup_vercodigo = $this->vercodigo;

$aLookup[] = array(control_codbarras_filtro_pack_protect_string('SI') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_vercodigo'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['vercodigo']) && !empty($this->NM_ajax_info['select_html']['vercodigo']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['vercodigo']);
          }
          $this->NM_ajax_info['fldList']['vercodigo'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-vercodigo',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['vercodigo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['vercodigo']['valList'][$i] = control_codbarras_filtro_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['vercodigo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['vercodigo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['vercodigo']['labList'] = $aLabel;
          }
   }

          //----- verdescripcion
   function ajax_return_values_verdescripcion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("verdescripcion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->verdescripcion);
              $aLookup = array();
              $this->_tmp_lookup_verdescripcion = $this->verdescripcion;

$aLookup[] = array(control_codbarras_filtro_pack_protect_string('SI') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_verdescripcion'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['verdescripcion']) && !empty($this->NM_ajax_info['select_html']['verdescripcion']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['verdescripcion']);
          }
          $this->NM_ajax_info['fldList']['verdescripcion'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-verdescripcion',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['verdescripcion']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['verdescripcion']['valList'][$i] = control_codbarras_filtro_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['verdescripcion']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['verdescripcion']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['verdescripcion']['labList'] = $aLabel;
          }
   }

          //----- verprecio
   function ajax_return_values_verprecio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("verprecio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->verprecio);
              $aLookup = array();
              $this->_tmp_lookup_verprecio = $this->verprecio;

$aLookup[] = array(control_codbarras_filtro_pack_protect_string('preciomen') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("PRECIO1")));
$aLookup[] = array(control_codbarras_filtro_pack_protect_string('preciomen2') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("PRECIO2")));
$aLookup[] = array(control_codbarras_filtro_pack_protect_string('preciomen3') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("PRECIO3")));
$aLookup[] = array(control_codbarras_filtro_pack_protect_string('preciofull') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("PRECIOM1")));
$aLookup[] = array(control_codbarras_filtro_pack_protect_string('precio2') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("PRECIOM2")));
$aLookup[] = array(control_codbarras_filtro_pack_protect_string('preciomay') => str_replace('<', '&lt;',control_codbarras_filtro_pack_protect_string("PRECIOM3")));
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_verprecio'][] = 'preciomen';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_verprecio'][] = 'preciomen2';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_verprecio'][] = 'preciomen3';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_verprecio'][] = 'preciofull';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_verprecio'][] = 'precio2';
$_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_verprecio'][] = 'preciomay';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"verprecio\"";
          if (isset($this->NM_ajax_info['select_html']['verprecio']) && !empty($this->NM_ajax_info['select_html']['verprecio']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['verprecio']);
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

                  if ($this->verprecio == $sValue)
                  {
                      $this->_tmp_lookup_verprecio = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['verprecio'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['verprecio']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['verprecio']['valList'][$i] = control_codbarras_filtro_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['verprecio']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['verprecio']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['verprecio']['labList'] = $aLabel;
          }
   }

          //----- titulopersonalizado
   function ajax_return_values_titulopersonalizado($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("titulopersonalizado", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->titulopersonalizado);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['titulopersonalizado'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['upload_dir'][$fieldName][] = $newName;
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              control_codbarras_filtro_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1) 
      { 
          $nm_saida_global = $_SESSION['scriptcase']['nm_sc_retorno']; 
      } 
    $this->nm_formatar_campos();
        $this->initFormPages();
    include_once("control_codbarras_filtro_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array(""))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['csrf_token'];
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

   function Form_lookup_familia()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_familia']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_familia'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_familia']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_familia'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_familia']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_familia'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_familia']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_familia'] = array(); 
    }

   $old_value_tamanio = $this->tamanio;
   $old_value_numerocolumnas = $this->numerocolumnas;
   $old_value_altura = $this->altura;
   $this->nm_tira_formatacao();


   $unformatted_value_tamanio = $this->tamanio;
   $unformatted_value_numerocolumnas = $this->numerocolumnas;
   $unformatted_value_altura = $this->altura;

   $vercodigo_val_str = "''";
   if (!empty($this->vercodigo))
   {
       if (is_array($this->vercodigo))
       {
           $Tmp_array = $this->vercodigo;
       }
       else
       {
           $Tmp_array = explode(";", $this->vercodigo);
       }
       $vercodigo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $vercodigo_val_str)
          {
             $vercodigo_val_str .= ", ";
          }
          $vercodigo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $verdescripcion_val_str = "''";
   if (!empty($this->verdescripcion))
   {
       if (is_array($this->verdescripcion))
       {
           $Tmp_array = $this->verdescripcion;
       }
       else
       {
           $Tmp_array = explode(";", $this->verdescripcion);
       }
       $verdescripcion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $verdescripcion_val_str)
          {
             $verdescripcion_val_str .= ", ";
          }
          $verdescripcion_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idgrupo, nomgrupo  FROM grupo  ORDER BY nomgrupo";

   $this->tamanio = $old_value_tamanio;
   $this->numerocolumnas = $old_value_numerocolumnas;
   $this->altura = $old_value_altura;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['Lookup_familia'][] = $rs->fields[0];
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
   function Form_lookup_tipoletra()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Arial?#?Arial?#?S?@?";
       $nmgp_def_dados .= "Helvetica?#?Helvetica?#?N?@?";
       $nmgp_def_dados .= "sans-serif?#?sans?#?N?@?";
       $nmgp_def_dados .= "Tahoma?#?Tahoma?#?N?@?";
       $nmgp_def_dados .= "Georgia?#?Georgia?#?N?@?";
       $nmgp_def_dados .= "Verdana?#?Verdana?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_tipocodbarras()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "TYPE_EAN_13?#?TYPE_EAN_13?#?N?@?";
       $nmgp_def_dados .= "TYPE_EAN_8?#?TYPE_EAN_8?#?N?@?";
       $nmgp_def_dados .= "TYPE_EAN_5?#?TYPE_EAN_5?#?N?@?";
       $nmgp_def_dados .= "TYPE_CODE_39?#?TYPE_CODE_39?#?N?@?";
       $nmgp_def_dados .= "TYPE_CODE_128?#?TYPE_CODE_128?#?N?@?";
       $nmgp_def_dados .= "TYPE_CODE_11?#?TYPE_CODE_11?#?N?@?";
       $nmgp_def_dados .= "TYPE_PHARMA_CODE?#?TYPE_PHARMA_CODE?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_tipoimagen()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "PNG?#?BarcodeGeneratorPNG?#?S?@?";
       $nmgp_def_dados .= "SVG?#?BarcodeGeneratorSVG?#?N?@?";
       $nmgp_def_dados .= "JPG?#?BarcodeGeneratorJPG?#?N?@?";
       $nmgp_def_dados .= "HTML?#?BarcodeGeneratorHTML?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_vercodigo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_verdescripcion()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_verprecio()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "PRECIO1?#?preciomen?#?N?@?";
       $nmgp_def_dados .= "PRECIO2?#?preciomen2?#?N?@?";
       $nmgp_def_dados .= "PRECIO3?#?preciomen3?#?N?@?";
       $nmgp_def_dados .= "PRECIOM1?#?preciofull?#?N?@?";
       $nmgp_def_dados .= "PRECIOM2?#?precio2?#?N?@?";
       $nmgp_def_dados .= "PRECIOM3?#?preciomay?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

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
       $nmgp_saida_form = "control_codbarras_filtro_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['nm_run_menu'] = 2;
       $nmgp_saida_form = "control_codbarras_filtro_fim.php";
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
       control_codbarras_filtro_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['masterValue']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['opc_ant'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['control_codbarras_filtro']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           control_codbarras_filtro_pack_ajax_response();
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
       control_codbarras_filtro_pack_ajax_response();
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
    function getButtonIds($buttonName) {
        switch ($buttonName) {
            case "help":
                return array("sc_b_hlp_b");
                break;
            case "exit":
                return array("Bsair_b.sc-unique-btn-1", "Bsair_b.sc-unique-btn-2");
                break;
            case "resetar":
                return array("sc_resetar_bot");
                break;
            case "ok":
                return array("sub_form_b.sc-unique-btn-3");
                break;
        }

        return array($buttonName);
    } // getButtonIds

}
?>
