<?php
//
class nota_credito_apl
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
   var $prefijo;
   var $prefijo_1;
   var $numero;
   var $factura;
   var $fecha_nota;
   var $obs;
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
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['factura']))
          {
              $this->factura = $this->NM_ajax_info['param']['factura'];
          }
          if (isset($this->NM_ajax_info['param']['fecha_nota']))
          {
              $this->fecha_nota = $this->NM_ajax_info['param']['fecha_nota'];
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
          if (isset($this->NM_ajax_info['param']['numero']))
          {
              $this->numero = $this->NM_ajax_info['param']['numero'];
          }
          if (isset($this->NM_ajax_info['param']['obs']))
          {
              $this->obs = $this->NM_ajax_info['param']['obs'];
          }
          if (isset($this->NM_ajax_info['param']['prefijo']))
          {
              $this->prefijo = $this->NM_ajax_info['param']['prefijo'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
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
      if (isset($this->gIdfac) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gIdfac'] = $this->gIdfac;
      }
      if (isset($_POST["gIdfac"]) && isset($this->gIdfac)) 
      {
          $_SESSION['gIdfac'] = $this->gIdfac;
      }
      if (!isset($_POST["gIdfac"]) && isset($_POST["gidfac"])) 
      {
          $_SESSION['gIdfac'] = $_POST["gidfac"];
      }
      if (isset($_GET["gIdfac"]) && isset($this->gIdfac)) 
      {
          $_SESSION['gIdfac'] = $this->gIdfac;
      }
      if (!isset($_GET["gIdfac"]) && isset($_GET["gidfac"])) 
      {
          $_SESSION['gIdfac'] = $_GET["gidfac"];
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['nota_credito']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['nota_credito']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['nota_credito']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['nota_credito']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['nota_credito']['embutida_parms']);
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
                 nm_limpa_str_nota_credito($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (!isset($this->gIdfac) && isset($this->gidfac)) 
          {
              $this->gIdfac = $this->gidfac;
          }
          if (isset($this->gIdfac)) 
          {
              $_SESSION['gIdfac'] = $this->gIdfac;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['nota_credito']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['nota_credito']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['nota_credito']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['nota_credito']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (!isset($this->gIdfac) && isset($this->gidfac)) 
          {
              $this->gIdfac = $this->gidfac;
          }
          if (isset($this->gIdfac)) 
          {
              $_SESSION['gIdfac'] = $this->gIdfac;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['nota_credito']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['nota_credito']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['nota_credito']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['nota_credito']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['nota_credito']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['nota_credito']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['nota_credito']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['nota_credito']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['nota_credito']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['nota_credito']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new nota_credito_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['nota_credito']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['nota_credito']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['nota_credito'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['nota_credito']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['nota_credito']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('nota_credito') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['nota_credito']['label'] = "GENERAR NOTA CRÉDITO";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "nota_credito")
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
      $this->Ini->Str_btn_form = (isset($_SESSION['scriptcase']['str_button_all'])) ? $_SESSION['scriptcase']['str_button_all'] : "scriptcase8_BlueWood";
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


      $this->arr_buttons['btn_volver']['hint']             = "Volver";
      $this->arr_buttons['btn_volver']['type']             = "button";
      $this->arr_buttons['btn_volver']['value']            = "Volver";
      $this->arr_buttons['btn_volver']['display']          = "only_text";
      $this->arr_buttons['btn_volver']['display_position'] = "text_right";
      $this->arr_buttons['btn_volver']['style']            = "default";
      $this->arr_buttons['btn_volver']['image']            = "";


      $_SESSION['scriptcase']['error_icon']['nota_credito']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Lemon__NM__nm_scriptcase9_Lemon_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['nota_credito'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['ok'] = "on";
      $this->nmgp_botoes['facebook'] = "off";
      $this->nmgp_botoes['google'] = "off";
      $this->nmgp_botoes['twitter'] = "off";
      $this->nmgp_botoes['paypal'] = "off";
      $this->nmgp_botoes['btn_volver'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['nota_credito']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['nota_credito'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['nota_credito'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("nota_credito", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      if ($this->Embutida_proc)
      { 
          include_once($this->Ini->path_embutida . 'nota_credito/webservice_receptor2.php');
      }
      else
      { 
          include_once($this->Ini->path_aplicacao . 'webservice_receptor2.php');
      }
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

      if (is_file($this->Ini->path_aplicacao . 'nota_credito_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'nota_credito_help.txt');
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
          require_once($this->Ini->path_embutida . 'nota_credito/nota_credito_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "nota_credito_erro.class.php"); 
      }
      $this->Erro      = new nota_credito_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['nota_credito']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['btn_volver'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['btn_volver'] = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['botoes']['btn_volver'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['dados_form'];
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

            $out1_img_cache = $_SESSION['scriptcase']['nota_credito']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['nota_credito']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['dados_select'];
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
      $this->field_config['numero']['format_neg'] = '2';
      //-- fecha_nota
      $this->field_config['fecha_nota']                 = array();
      $this->field_config['fecha_nota']['date_format']  = "dd/mm/aaaa";
      $this->field_config['fecha_nota']['date_sep']     = "/";
      $this->field_config['fecha_nota']['date_display'] = "dd/mm/aaaa";
      $this->new_date_format('DT', 'fecha_nota');
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
          if ('validate_prefijo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'prefijo');
          }
          if ('validate_numero' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numero');
          }
          if ('validate_factura' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'factura');
          }
          if ('validate_fecha_nota' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecha_nota');
          }
          if ('validate_obs' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'obs');
          }
          nota_credito_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_prefijo_onchange' == $this->NM_ajax_opcao)
          {
              $this->prefijo_onChange();
          }
          nota_credito_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              nota_credito_pack_ajax_response();
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
          $_SESSION['scriptcase']['nota_credito']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  nota_credito_pack_ajax_response();
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
          $_SESSION['scriptcase']['nota_credito']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  nota_credito_pack_ajax_response();
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
          $this->prefijo = "" ;  
          $this->numero = "" ;  
          $this->factura = "" ;  
              $this->fecha_nota =  date('Y') . "-" . date('m')  . "-" . date('d');
              nm_conv_form_data($this->fecha_nota, "aaaa-mm-dd", "AAAAMMDD", array($this->field_config['fecha_nota']['date_sep'])) ;  
          $this->obs = "" ;  
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['dados_form']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['dados_form']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['dados_form'] as $NM_campo => $NM_valor)
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['recarga'] = $this->nmgp_opcao;
      }
      if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "" || $campos_erro != "" || !isset($this->bok) || $this->bok != "OK" || $this->nmgp_opcao == "recarga")
      {
          if ($Campos_Crit == "" && empty($Campos_Falta) && $this->Campos_Mens_erro == "" && !isset($this->bok) && $this->nmgp_opcao != "recarga")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['campos']))
              { 
                  $prefijo = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['campos'][0]; 
                  $numero = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['campos'][1]; 
                  $factura = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['campos'][2]; 
                  $fecha_nota = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['campos'][3]; 
                  $obs = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['campos'][4]; 
              } 
          }
          $this->nm_gera_html();
          $this->NM_close_db(); 
      }
      elseif (isset($this->bok) && $this->bok == "OK")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['campos'] = array(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['campos'][0] = $this->prefijo; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['campos'][1] = $this->numero; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['campos'][2] = $this->factura; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['campos'][3] = $this->fecha_nota; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['campos'][4] = $this->obs; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['redir'] == "redir")
          {
              $this->nmgp_redireciona(); 
          }
          else
          {
              $contr_menu = "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['iframe_menu'])
              {
                  $contr_menu = "glo_menu";
              }
              if (isset($_SESSION['scriptcase']['sc_ult_apl_menu']) && in_array("nota_credito", $_SESSION['scriptcase']['sc_ult_apl_menu']))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona_form("nota_credito_fim.php", $this->nm_location, $contr_menu); 
              }
              else
              {
                  $this->nm_gera_html();
                  if (!$_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['embutida_proc'])
                  { 
                      $this->NM_close_db(); 
                  } 
              }
          }
          $this->NM_close_db(); 
          if ($this->NM_ajax_flag)
          {
              nota_credito_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "nota_credito.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("GENERAR NOTA CRÉDITO") ?></TITLE>
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
<form name="Fdown" method="get" action="nota_credito_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="nota_credito"> 
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
               return "Prefijo NC:";
               break;
           case 'numero':
               return "Nota número:";
               break;
           case 'factura':
               return "Factura para anular:";
               break;
           case 'fecha_nota':
               return "Fecha:";
               break;
           case 'obs':
               return "";
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
              if (!isset($this->NM_ajax_info['errList']['geral_nota_credito']) || !is_array($this->NM_ajax_info['errList']['geral_nota_credito']))
              {
                  $this->NM_ajax_info['errList']['geral_nota_credito'] = array();
              }
              $this->NM_ajax_info['errList']['geral_nota_credito'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'prefijo' == $filtro)) || (is_array($filtro) && in_array('prefijo', $filtro)))
        $this->ValidateField_prefijo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'numero' == $filtro)) || (is_array($filtro) && in_array('numero', $filtro)))
        $this->ValidateField_numero($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'factura' == $filtro)) || (is_array($filtro) && in_array('factura', $filtro)))
        $this->ValidateField_factura($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fecha_nota' == $filtro)) || (is_array($filtro) && in_array('fecha_nota', $filtro)))
        $this->ValidateField_fecha_nota($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'obs' == $filtro)) || (is_array($filtro) && in_array('obs', $filtro)))
        $this->ValidateField_obs($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---

      if (empty($Campos_Crit) && empty($Campos_Falta))
      {
      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['nota_credito']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_numero = $this->numero;
    $original_obs = $this->obs;
    $original_prefijo = $this->prefijo;
}
if (!isset($this->sc_temp_gIdfac)) {$this->sc_temp_gIdfac = (isset($_SESSION['gIdfac'])) ? $_SESSION['gIdfac'] : "";}
  if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco)
{
    $this->Ini->sc_tem_trans_banco = $this->Db->BeginTrans();
}


	$vaccion = "EnviarNC";
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
	$vidfacven = $this->sc_temp_gIdfac;

	$vNumCont	= 0;
	$vValFact	= 0;

	$vsql = "select coalesce(fc.cufe,''), numfacven, fc.total, fc.fechaven, fc.credito, fc.fechavenc, fc.direccion,fc.numcontrato, fc.codigo_mun, fc.codigo_dep, fc.enviada, fc.periodo, fc.anio, (select d.departamento from departamento d where d.codigo=fc.codigo_dep limit 1) as depart, (select m.municipio from municipio m where m.codigo_mu=fc.codigo_mun and m.codigo_dep=fc.codigo_dep limit 1) as munic, fc.resolucion,fc.idcli,fc.observaciones from facturaven_contratos fc where fc.idfacven='".$vidfacven."'";

	 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDFV = array();
      $this->vdfv = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vDFV[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vdfv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDFV = false;
          $this->vDFV_erro = $this->Db->ErrorMsg();
          $this->vdfv = false;
          $this->vdfv_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->vdfv[0][0]))
	{

		$vcufe	  = $this->vdfv[0][0];	
		$vconsecutivo = $this->numero ;
		$vTotf    = $this->vdfv[0][2];
		$vfechaven= $this->vdfv[0][3];
		$vcredito = $this->vdfv[0][4];
		$vfechavenc= $this->vdfv[0][5];

		$Nciudad   = $this->vdfv[0][14];
		$cdep      = $this->vdfv[0][9];
		$cmun      = $this->vdfv[0][8];
		$cdepmun   = $cdep.$cmun;
		$Ndep      = $this->vdfv[0][13];
		$dir       = $this->vdfv[0][6];
		$vnumerocontrato = $this->vdfv[0][7];
		$vresolucion = $this->vdfv[0][15];
		$vidcli   = $this->vdfv[0][16];
		$vobserv  = $this->vdfv[0][17];

		if(empty($vcufe))
		{
			$vmensaje .= "LA FACTURA NO HA SIDO ENVIADA, NO SE PUEDE GENERAR NC.\n";
		}
		else
		{
			$TokenEnterprise = '';
			$TokenAutorizacion = '';
			$vServidor='';
			$vPFe= '';

			$vrango="C4NN-1"; 

			$vcorreo = "easeing@outlook.com.com";
			$vaccion = "EnviarNC";

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
			$vcufe   = '';
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

			$vsql_res = "SELECT prefijo, prefijo_fe, pref_ncr FROM resdian WHERE Idres = '".$this->prefijo ."'";
			 
      $nm_select = $vsql_res; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_res = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds_res[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_res = false;
          $this->ds_res_erro = $this->Db->ErrorMsg();
      } 
;
			if(isset($this->ds_res[0][1]))
				{
				$vPref=$this->ds_res[0][0];
				$vPFe=$this->ds_res[0][1];
				$vrango = $vPref."-1";
				$vPnCR=$this->ds_res[0][2];
				}

			if($vPFe=='FE' and $vPnCR=='SI')
			{
				 
      $nm_select = "select servidor1, servidor2, tokenempresa, tokenpassword from webservicefe order by idwebservicefe desc limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fv = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds_fv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fv = false;
          $this->ds_fv_erro = $this->Db->ErrorMsg();
      } 
;
				if(isset($this->ds_fv[0][0]) and (isset($this->ds_fv[0][1])) and (isset($this->ds_fv[0][2])) and (isset($this->ds_fv[0][3])))
				{
					if(!empty(($this->ds_fv[0][0])) and (!empty($this->ds_fv[0][1])) and (!empty($this->ds_fv[0][2])) and (!empty($this->ds_fv[0][3])))
					{


						error_reporting(E_ERROR);
						$WebService = new WebService();
						$this->factura = new FacturaGeneral();
						$cliente= new Cliente();
						$destinatario = new Destinatario();
						$direccion = new Direccion();
						$det_tributario = new Tributos();
						$emaildest = new Strings();
						$vServidor=$this->ds_fv[0][0];

						$options = array('exceptions' => true, 'trace' => true);

						$params;
						$TokenEnterprise = $this->ds_fv[0][2];
						$TokenAutorizacion = $this->ds_fv[0][3];



						$enviarAdjunto = false;

						$sql_fe="select coalesce((select codigo_ciiu from ciiu_tercero where id_tercero=$vidcli),'0010') as ciiu, t.urlmail, t.documento, t.tel_cel, coalesce((select cod_det_trib from det_trib_x_tercero where id_tercero=$vidcli),'ZY') as det_tri,  t.idmuni, t.direccion, t.codigo_postal, t.nombre_comercil, t.nombres, t.dv, t.tipo_documento,coalesce((select codigo_rt from resp_trib_x_tercero where id_tercero=$vidcli order by id_resp_tr_ter ASC LIMIT 1),'R-99-PN') as obligacion, (if(t.tipo='NAT',2,1)) as tipo_per, (if(t.regimen='SIM', 49, 48)) as regimen_ter from terceros t where t.idtercero=$vidcli ";
						 
      $nm_select = $sql_fe; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fe = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds_fe[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fe = false;
          $this->ds_fe_erro = $this->Db->ErrorMsg();
      } 
;	

						if(isset($this->ds_fe[0][1]) and !empty($this->ds_fe[0][1]))
							{
							if(!isset($this->ds_fe[0][8]) or empty($this->ds_fe[0][8]))
								{
									$nomcomerc	= $this->ds_fe[0][9];
								}
								else
								{
									$nomcomerc	=$this->ds_fe[0][8];
								}
								$ciuu		=$this->ds_fe[0][0];
								$vcorreo	=$this->ds_fe[0][1];
								$nitodoc	=$this->ds_fe[0][2];
								$tel		=$this->ds_fe[0][3];
								$codImp		=$this->ds_fe[0][4];
								$idmu		=$this->ds_fe[0][5];
								$zonpos		=$this->ds_fe[0][7];

								$nombr		=$this->ds_fe[0][9];
								$vdv		=$this->ds_fe[0][10];
								$tipodoc	=$this->ds_fe[0][11];
								$obligac	=$this->ds_fe[0][12];
								$ti_per		=$this->ds_fe[0][13];
								$t_reg		=$this->ds_fe[0][14];
							}
						else
							{
								echo "Datos incompletos del Cliente!","<br>";
								goto error_DC;
							}



						if($vaccion=="EnviarNC"){

							$this->factura = new FacturaGeneral();
							$this->factura->cliente = new Cliente();
							$this->factura->cantidadDecimales = "2";
							$destinatarios = new Destinatario();	
							$destinatarios->canalDeEntrega = "0";

							$correodestinatario = new strings();	 
							$correodestinatario->string = $vcorreo;

							$destinatarios->email = $correodestinatario;
							$destinatarios->nitProveedorReceptor = $nitodoc;
							$destinatarios->telefono = $tel;	

							$this->factura->cliente->destinatario[0] = $destinatarios;

							$tributos1 = new Tributos();	
							$tributos1->codigoImpuesto = $codImp;

							$extensible1 = new Extensibles();
							$extensible1->controlInterno1 = "";
							$extensible1->controlInterno2 = "";
							$extensible1->nombre = "";
							$extensible1->valor = "";

							$tributos1->extras[0] = $extensible1;

							$this->factura->cliente->detallesTributarios[0] = $tributos1;

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

							$this->factura->cliente->direccionFiscal  = $DireccionFiscal[0];
							$this->factura->cliente->direccionCliente = $DireccionFiscal[1];
							$this->factura->cliente->telefono = $tel;
							$this->factura->cliente->email = $vcorreo;


							$InfoLegalCliente = new InformacionLegalCliente();
							$InfoLegalCliente->codigoEstablecimiento = "00001";
							$InfoLegalCliente->nombreRegistroRUT = $nombr;
							$InfoLegalCliente->numeroIdentificacion = $nitodoc;
							$InfoLegalCliente->numeroIdentificacionDV = $vdv;
							$InfoLegalCliente->tipoIdentificacion = $tipodoc;	

							$this->factura->cliente->informacionLegalCliente = $InfoLegalCliente;


							$this->factura->cliente->nombreRazonSocial  = $nombr;
							$this->factura->cliente->notificar = "SI";
							$this->factura->cliente->numeroDocumento = $nitodoc;
							$this->factura->cliente->numeroIdentificacionDV = $vdv;

							$obligacionesCliente = new Obligaciones();
							$obligacionesCliente->obligaciones = $obligac;
							$obligacionesCliente->regimen = $t_reg;

							$this->factura->cliente->responsabilidadesRut[0] = $obligacionesCliente;

							$this->factura->cliente->tipoIdentificacion = $tipodoc;
							$this->factura->cliente->tipoPersona = $ti_per;


							$this->factura->consecutivoDocumento = $vconsecutivo;
							


							 
      $nm_select = "select round(d.cantidad,2) as cantidad, p.codigobar, d.descr, p.codigoprod, (d.valorpar-(d.descuento+d.iva)) as base, (if(iv.tipo_impuesto='CONSUMO','02','01')) as codigoimpuesto, d.adicional as porciva, d.iva, d.adicional1 as porcdesc, (d.valorpar/((d.adicional/100)+1)) as bas_br,p.idprod FROM detalleventa d inner join productos p on d.idpro=p.idprod inner join iva iv on p.idiva=iv.idiva where d.numfac='".$vidfacven."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDetalle = array();
      $this->vdetalle = array();
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
                      $this->vDetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vdetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDetalle = false;
          $this->vDetalle_erro = $this->Db->ErrorMsg();
          $this->vdetalle = false;
          $this->vdetalle_erro = $this->Db->ErrorMsg();
      } 
;

							if(isset($this->vdetalle[0][0]))
							{	


								for($i=0;$i<count($this->vdetalle );$i++)
								{
									$cant	=$this->vdetalle[$i][0];
									$codbp	=$this->vdetalle[$i][1];
									$desc	=$this->vdetalle[$i][2];
									$codest	=$this->vdetalle[$i][3];
									$base	=$this->vdetalle[$i][4];
									$codImp	=$this->vdetalle[$i][5];
									$Timp	=$this->vdetalle[$i][6];
									$Timp	=$Timp.".00";
									$eliva	=$this->vdetalle[$i][7];
									$eldesc	=$this->vdetalle[$i][8];
									$bas_br	=$this->vdetalle[$i][9];
									$vidprod=$this->vdetalle[$i][10]; 
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
      $this->vCodMan = array();
      $this->vcodman = array();
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
                      $this->vCodMan[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vcodman[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vCodMan = false;
          $this->vCodMan_erro = $this->Db->ErrorMsg();
          $this->vcodman = false;
          $this->vcodman_erro = $this->Db->ErrorMsg();
      } 
;

									if(isset($this->vcodman[0][0]))
									{
										$vid_mandatorio = $this->vcodman[0][0];
										$vdv_mandatorio = $this->vcodman[0][1];
										$vid_tipo       = $this->vcodman[0][2];

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

									$this->factura->detalleDeFactura [$i] = $factDetalle[$i]; 

								}
							}

							$vfechaemision     = $vfechaven.date(' H:i:s');
							$vfechaemision     = date_create($vfechaemision);
							$vfechaemision     = date_format($vfechaemision,'Y-m-d H:i:s');	

							$this->factura->fechaEmision = $vfechaemision;

							if($vcredito==1)
							{
								$lafechadevencimiento	 = $vfechavenc;
								$lafechadevencimiento	 = date_create($lafechadevencimiento);
								$lafechadevencimiento	 = date_format($lafechadevencimiento, 'Y-m-d');

								$this->factura->fechaVencimiento = $lafechadevencimiento;
							}





							 
      $nm_select = "select sum(valorpar-(descuento+iva)) as base, (if(iv.tipo_impuesto='CONSUMO','02','01')) as codigoimpuesto, iv.trifa as porcentaje, sum(iva) as iva from detalleventa d inner join productos p on d.idpro=p.idprod inner join iva iv on p.idiva=iv.idiva where numfac='".$vidfacven."' group by iv.tipo_impuesto,iv.trifa"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_impfac = array();
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
                      $this->dt_impfac[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_impfac = false;
          $this->dt_impfac_erro = $this->Db->ErrorMsg();
      } 
;

							if(isset($this->dt_impfac[0][0]))
							{

								for($t=0;$t<count($this->dt_impfac );$t++)
								{

									$base		=$this->dt_impfac[$t][0];
									$base		=strval($base);
									$codImp		=$this->dt_impfac[$t][1];
									$codImp		=strval($codImp);
									$Timp		=$this->dt_impfac[$t][2];
									$Timp		=$Timp.".00";
									$eliva		=$this->dt_impfac[$t][3];

									$objImpGen[$t] = new FacturaImpuestos;

									$objImpGen[$t]->baseImponibleTOTALImp = $base;
									$objImpGen[$t]->codigoTOTALImp = $codImp;
									$objImpGen[$t]->controlInterno = "";
									$objImpGen[$t]->porcentajeTOTALImp = $Timp;
									$objImpGen[$t]->unidadMedida = "";
									$objImpGen[$t]->unidadMedidaTributo = "";
									$objImpGen[$t]->valorTOTALImp = $eliva;
									$objImpGen[$t]->valorTributoUnidad = "0.00";

									$this->factura->impuestosGenerales[$t] = $objImpGen[$t];

								}
							}

							 
      $nm_select = "select (if(iv.tipo_impuesto='CONSUMO','02','01')) as codigoimpuesto, sum(iva) as iva, sum(valorpar-(descuento+iva)) as base from detalleventa d inner join productos p on d.idpro=p.idprod inner join iva iv on p.idiva=iv.idiva where numfac='".$vidfacven."' group by iv.tipo_impuesto"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_impTfac = array();
      $this->dt_imptfac = array();
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
                      $this->dt_impTfac[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->dt_imptfac[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_impTfac = false;
          $this->dt_impTfac_erro = $this->Db->ErrorMsg();
          $this->dt_imptfac = false;
          $this->dt_imptfac_erro = $this->Db->ErrorMsg();
      } 
;

							if(isset($this->dt_imptfac[0][0]))
							{
								$codImp		=$this->dt_imptfac[0][0];
								$codImp		=strval($codImp);
								$eliva		=$this->dt_imptfac[0][1];
								$base		=$this->dt_imptfac[0][2];
								$tot		=$base+$eliva;


								$impTot[$i] = new ImpuestosTotales;
								$impTot[$i]->codigoTOTALImp = $codImp;
								$impTot[$i]->montoTotal = $eliva;
							}


							 
      $nm_select = "SELECT count(*) from detalleventa where numfac='".$vidfacven."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_cont = array();
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
                      $this->ds_cont[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_cont = false;
          $this->ds_cont_erro = $this->Db->ErrorMsg();
      } 
;
							if(isset($this->ds_cont[0][0]))
							{
								$totalitems=$this->ds_cont[0][0];
							}
							else
							{
								$totalitems='1';
							}


							$this->factura->impuestosTotales[0] = $impTot[$i];

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

							$this->factura->mediosDePago[0] = $pagos;

							$this->factura->moneda = "COP";
							$this->factura->redondeoAplicado = "0.00"	;
							$this->factura->rangoNumeracion = $vrango;

							$this->factura->tipoOperacion = "10";
							$this->factura->totalBaseImponible = $base;
							$this->factura->totalBrutoConImpuesto = $tot;
							$this->factura->totalMonto =$tot;
							$this->factura->totalProductos=$totalitems;
							$this->factura->totalSinImpuestos=$base;


							$this->factura->tipoDocumento="91";

							if ($enviarAdjunto == "TRUE")
							{
								$adjuntos="1";
							}
							else
							{
								$adjuntos="0";
							}

							$vMotNota	= 2;
							 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select cufe, estado, str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20), numfacven, resolucion, numcontrato, total from facturaven_contratos where idfacven='".$vidfacven."'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select cufe, estado, convert(char(19),fechaven,121), numfacven, resolucion, numcontrato, total from facturaven_contratos where idfacven='".$vidfacven."'"; 
      }
      else
      { 
          $nm_select = "select cufe, estado, fechaven, numfacven, resolucion, numcontrato, total from facturaven_contratos where idfacven='".$vidfacven."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->d_fv = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[5] = str_replace(',', '.', $SCrx->fields[5]);
                 $SCrx->fields[6] = str_replace(',', '.', $SCrx->fields[6]);
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
                      $this->d_fv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->d_fv = false;
          $this->d_fv_erro = $this->Db->ErrorMsg();
      } 
;
						if(isset($this->d_fv[0][0]) and (($this->d_fv[0][1]=='200') or ($this->d_fv[0][1]=='201')))
							{
							$vcufe				= $this->d_fv[0][0];
							$vestado			= $this->d_fv[0][1];
							$vfechaemisionfac 	= date_create($this->d_fv[0][2]);
							$vfechaemisionfac 	= date_format($vfechaemisionfac,'Y-m-d');
							$vFafectada			= $this->d_fv[0][3];
							$vlareso			= $this->d_fv[0][4];
							$vNumCont			= $this->d_fv[0][5];
							$vValFact			= $this->d_fv[0][6];
							 
      $nm_select = "SELECT prefijo FROM resdian WHERE Idres = $vlareso"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->d_res = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->d_res[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->d_res = false;
          $this->d_res_erro = $this->Db->ErrorMsg();
      } 
;
							if(isset($this->d_res[0][0]))
								{
								$vlareso = $this->d_res[0][0];
								}
							else
								{
								echo "<br>, FACTURA NO SE HA ENVIADO O HUBO ERROR EN EL PROCESO, ESTADO FACTURA: ",$vestado;
								goto error_DC;
								}
							}
						else
							{
							echo "<br>, FACTURA NO SE HA ENVIADO O HUBO ERROR EN EL PROCESO, ESTADO FACTURA: ",$vestado;
							goto error_DC;
							}
							$DocRef = new DocumentoReferenciado();

							$DocRef->codigoEstatusDocumento = $vMotNota;
							$DocRef->codigoInterno = '4';
							$DocRef->cufeDocReferenciado = $vcufe; 
							$DocRef->numeroDocumento=$vFafectada;

						$this->factura->documentosReferenciados[0] =$DocRef;

						$DocRef1 = new DocumentoReferenciado();

							$DocRef1->codigoInterno = '5';
							$DocRef1->cufeDocReferenciado = $vcufe;
							$DocRef1->fecha = $vfechaemisionfac;
							$DocRef1->numeroDocumento= $vFafectada;

						$this->factura->documentosReferenciados[1] =$DocRef1;
							
							$params = array(
								'tokenEmpresa' =>  $TokenEnterprise,
								'tokenPassword' =>$TokenAutorizacion,
								'factura' => $this->factura ,
								'adjuntos' => $adjuntos);


							$resultado = $WebService->enviar($vServidor,$options,$params);

							$vmensaje .= "Resultado de la Emisión\n";
							if($resultado["codigo"]==200 or $resultado["codigo"]==201)
							{
								$vmensaje .=  "La Nota: ".$vPref."-".$vconsecutivo." se ha enviado con éxito!\n";

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

									$sql="UPDATE facturaven_contratos SET idres_nota = '".$this->prefijo ."', numero_nota = '".$this->numero ."', fecha_nota = '".$vfechavalidacion."' , cude_nota = '".$vcufe."', estado_nota='".$vestado."',  aviso_nota='".$vavisos."', saldo = 0 WHERE idfacven='".$vidfacven."'";
									
									
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
                nota_credito_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
									
									$sql_tcf = "UPDATE terceros_contratos_factura SET saldo = 0, deperiodo = 'NO' WHERE factura = '".$vidfacven."'";
									
     $nm_select = $sql_tcf; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                nota_credito_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
									
									$sql_con = "UPDATE terceros_contratos SET saldoactual = (saldoactual - $vValFact) WHERE numero_contrato = '".$vNumCont."'";
									
     $nm_select = $sql_con; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                nota_credito_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
									$this->NM_ajax_info['buttonDisplay']['Ok'] = $this->nmgp_botoes["Ok"] = "off";;
									$this->obs  = 'NOTA GENERADA CON EXITO, FACTURA ANULADA';
									
									if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

									
								}
							}
							else
							{
								$vavisos =  implode(";", $resultado);
								$sql="UPDATE facturaven_contratos SET aviso_nota='".$vavisos."' WHERE idfacven='".$vidfacven."'";
								
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
                nota_credito_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

								if($resultado["codigo"]==101)
								{
									$vmensaje .= "La Nota Crédito: ".$vPref."-".$vconsecutivo." no se puede enviar porque ya ha sido enviada.\n";
									$this->NM_ajax_info['buttonDisplay']['ok'] = $this->nmgp_botoes["ok"] = "off";;
								}
								else if($resultado["codigo"]==114)
								{
									$vmensaje .= "La Nota Crédito: ".$vPref."-".$vconsecutivo." no se puede enviar porque ya ha sido enviada.\n";
									$this->NM_ajax_info['buttonDisplay']['ok'] = $this->nmgp_botoes["ok"] = "off";;
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
									$this->NM_ajax_info['buttonDisplay']['Ok'] = $this->nmgp_botoes["Ok"] = "off";;
								}
								$this->NM_ajax_info['buttonDisplay']['Ok'] = $this->nmgp_botoes["Ok"] = "off";;
							}
						}

						error_DC:
						;
						}
					}
				}
			}
			
		}
	$this->obs  = $vmensaje;
	echo $vmensaje;
if (isset($this->sc_temp_gIdfac)) { $_SESSION['gIdfac'] = $this->sc_temp_gIdfac;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_numero != $this->numero || (isset($bFlagRead_numero) && $bFlagRead_numero)))
    {
        $this->ajax_return_values_numero(true);
    }
    if (($original_obs != $this->obs || (isset($bFlagRead_obs) && $bFlagRead_obs)))
    {
        $this->ajax_return_values_obs(true);
    }
    if (($original_prefijo != $this->prefijo || (isset($bFlagRead_prefijo) && $bFlagRead_prefijo)))
    {
        $this->ajax_return_values_prefijo(true);
    }
}
$_SESSION['scriptcase']['nota_credito']['contr_erro'] = 'off'; 
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

    function ValidateField_prefijo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->prefijo == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['php_cmp_required']['prefijo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['php_cmp_required']['prefijo'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Prefijo NC:" ; 
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
          if (!empty($this->prefijo) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['Lookup_prefijo']) && !in_array($this->prefijo, $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['Lookup_prefijo']))
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
              $iTestSize = 20;
              if ('-' == substr($this->numero, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->numero, -1))
              {
                  $iTestSize++;
                  $this->numero = '-' . substr($this->numero, 0, -1);
              }
              if (strlen($this->numero) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Nota número:: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->numero, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Nota número:; " ; 
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
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['php_cmp_required']['numero']) || $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['php_cmp_required']['numero'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Nota número:" ; 
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

    function ValidateField_factura(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->factura) != "")  
          { 
          } 
          elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['php_cmp_required']['factura']) || $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['php_cmp_required']['factura'] == "on") 
          { 
              $hasError = true;
              $Campos_Falta[] = "Factura para anular:" ; 
              if (!isset($Campos_Erros['factura']))
              {
                  $Campos_Erros['factura'] = array();
              }
              $Campos_Erros['factura'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['factura']) || !is_array($this->NM_ajax_info['errList']['factura']))
                  {
                      $this->NM_ajax_info['errList']['factura'] = array();
                  }
                  $this->NM_ajax_info['errList']['factura'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'factura';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_factura

    function ValidateField_fecha_nota(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->fecha_nota) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecha_nota';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fecha_nota

    function ValidateField_obs(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->obs) != "")  
          { 
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
    $this->nmgp_dados_form['factura'] = $this->factura;
    $this->nmgp_dados_form['fecha_nota'] = (strlen(trim($this->fecha_nota)) > 19) ? str_replace(".", ":", $this->fecha_nota) : trim($this->fecha_nota);
    $this->nmgp_dados_form['obs'] = $this->obs;
    $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['numero'] = $this->numero;
      nm_limpa_numero($this->numero, $this->field_config['numero']['symbol_grp']) ; 
      $this->Before_unformat['fecha_nota'] = $this->fecha_nota;
      nm_limpa_data($this->fecha_nota, $this->field_config['fecha_nota']['date_sep']) ; 
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
      if ((!empty($this->fecha_nota) && 'null' != $this->fecha_nota) || (!empty($format_fields) && isset($format_fields['fecha_nota'])))
      {
          nm_volta_data($this->fecha_nota, $this->field_config['fecha_nota']['date_format']) ; 
          nmgp_Form_Datas($this->fecha_nota, $this->field_config['fecha_nota']['date_format'], $this->field_config['fecha_nota']['date_sep']) ;  
      }
      elseif ('null' == $this->fecha_nota || '' == $this->fecha_nota)
      {
          $this->fecha_nota = '';
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
      if ($this->fecha_nota != "")  
      {
     nm_conv_form_data($this->fecha_nota, $this->field_config['fecha_nota']['date_format'], "AAAAMMDD", array($this->field_config['fecha_nota']['date_sep'])) ;  
      }
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

   function ajax_return_values()
   {
          $this->ajax_return_values_prefijo();
          $this->ajax_return_values_numero();
          $this->ajax_return_values_factura();
          $this->ajax_return_values_fecha_nota();
          $this->ajax_return_values_obs();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['Lookup_prefijo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['Lookup_prefijo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['Lookup_prefijo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['Lookup_prefijo'] = array(); 
}
$aLookup[] = array(nota_credito_pack_protect_string('') => str_replace('<', '&lt;',nota_credito_pack_protect_string('SELECCIONE')));
$_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['Lookup_prefijo'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_numero = $this->numero;
   $old_value_fecha_nota = $this->fecha_nota;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero = $this->numero;
   $unformatted_value_fecha_nota = $this->fecha_nota;

   $nm_comando = "SELECT Idres, prefijo  FROM resdian  WHERE pref_ncr = 'SI' ORDER BY prefijo";

   $this->numero = $old_value_numero;
   $this->fecha_nota = $old_value_fecha_nota;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(nota_credito_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', nota_credito_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['Lookup_prefijo'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['prefijo']['valList'][$i] = nota_credito_pack_protect_string($v);
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
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- factura
   function ajax_return_values_factura($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("factura", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->factura);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['factura'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- fecha_nota
   function ajax_return_values_fecha_nota($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecha_nota", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecha_nota);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fecha_nota'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
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
               'type'    => 'label',
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['upload_dir'][$fieldName][] = $newName;
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
function prefijo_onChange()
{
$_SESSION['scriptcase']['nota_credito']['contr_erro'] = 'on';
  
$original_prefijo = $this->prefijo;
$original_numero = $this->numero;

if(!empty($this->prefijo ))
	{
	$sql1 = "SELECT numero_nota FROM facturaven_contratos WHERE idres_nota = '".$this->prefijo ."'  ORDER BY numero_nota DESC LIMIT 1";
	 
      $nm_select = $sql1; 
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
		$this->numero  = $this->dt[0][0]+1;
		}
	else
		{
		$sql2 = "SELECT primerfactura FROM resdian WHERE Idres = '".$this->prefijo ."'";
		 
      $nm_select = $sql2; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->det = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->det[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->det = false;
          $this->det_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->det[0][0]))
			{
			$this->numero  = $this->det[0][0];
			}
		else
			{
			$this->numero  = 1;
			}
		}
	}
else
	{
	$this->numero  = 100;
	}

$modificado_prefijo = $this->prefijo;
$modificado_numero = $this->numero;
$this->nm_formatar_campos('prefijo', 'numero');
if ($original_prefijo !== $modificado_prefijo || isset($this->nmgp_cmp_readonly['prefijo']) || (isset($bFlagRead_prefijo) && $bFlagRead_prefijo))
{
    $this->ajax_return_values_prefijo(true);
}
if ($original_numero !== $modificado_numero || isset($this->nmgp_cmp_readonly['numero']) || (isset($bFlagRead_numero) && $bFlagRead_numero))
{
    $this->ajax_return_values_numero(true);
}
$this->NM_ajax_info['event_field'] = 'prefijo';
nota_credito_pack_ajax_response();
exit;
$_SESSION['scriptcase']['nota_credito']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              nota_credito_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['retorno_edit'] . "';";
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
    if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
    $_SESSION['scriptcase']['nota_credito']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_factura = $this->factura;
    $original_numero = $this->numero;
    $original_prefijo = $this->prefijo;
}
if (!isset($this->sc_temp_gIdfac)) {$this->sc_temp_gIdfac = (isset($_SESSION['gIdfac'])) ? $_SESSION['gIdfac'] : "";}
  $this->NM_ajax_info['buttonDisplay']['ok'] = $this->nmgp_botoes["ok"] = "on";;
$sql_2 = "SELECT idres_nota, numero_nota FROM facturaven_contratos WHERE idfacven = '".$this->sc_temp_gIdfac."'";
 
      $nm_select = $sql_2; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->at = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->at[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->at = false;
          $this->at_erro = $this->Db->ErrorMsg();
      } 
;
if($this->at[0][0]==0 and $this->at[0][1]==0)
	{
	
	if(!empty($this->prefijo ))
		{
		$sql1 = "SELECT numero_nota FROM facturaven_contratos WHERE idres_nota = '".$this->prefijo ."'  ORDER BY numero_nota DESC LIMIT 1";
		 
      $nm_select = $sql1; 
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
			$this->numero  = $this->dt[0][0]+1;
			}
		else
			{
			$sql2 = "SELECT primerfactura FROM resdian WHERE Idres = '".$this->prefijo ."'";
			 
      $nm_select = $sql2; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->det = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->det[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->det = false;
          $this->det_erro = $this->Db->ErrorMsg();
      } 
;
			if(isset($this->det[0][0]))
				{
				$this->numero  = $this->det[0][0];
				}
			else
				{
				$this->numero  = 100;
				}
			}
		}

	$sql  = "SELECT concat((select prefijo from resdian WHERE Idres = f.resolucion),'-', f.numfacven) from facturaven_contratos f where f.idfacven = '".$this->sc_temp_gIdfac."'";
	 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dat = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dat[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dat = false;
          $this->dat_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->dat[0][0]))
		{
		$this->factura  = $this->dat[0][0];
		}
	else
		{
		$this->nm_mens_alert[] = "Factura NO registrada!!!"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("Factura NO registrada!!!"); }}
	}
else
	{
	$this->nmgp_cmp_hidden["prefijo"] = "off"; $this->NM_ajax_info['fieldDisplay']['prefijo'] = 'off';
	$this->nmgp_cmp_hidden["numero"] = "off"; $this->NM_ajax_info['fieldDisplay']['numero'] = 'off';
	$this->NM_ajax_info['buttonDisplay']['ok'] = $this->nmgp_botoes["ok"] = "off";;
	$this->nm_mens_alert[] = "LA FACTURA HA SIDO ANULADA!!!"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("LA FACTURA HA SIDO ANULADA!!!"); }}
if (isset($this->sc_temp_gIdfac)) { $_SESSION['gIdfac'] = $this->sc_temp_gIdfac;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_factura != $this->factura || (isset($bFlagRead_factura) && $bFlagRead_factura)))
    {
        $this->ajax_return_values_factura(true);
    }
    if (($original_numero != $this->numero || (isset($bFlagRead_numero) && $bFlagRead_numero)))
    {
        $this->ajax_return_values_numero(true);
    }
    if (($original_prefijo != $this->prefijo || (isset($bFlagRead_prefijo) && $bFlagRead_prefijo)))
    {
        $this->ajax_return_values_prefijo(true);
    }
}
$_SESSION['scriptcase']['nota_credito']['contr_erro'] = 'off'; 
    }
    if (!empty($this->Campos_Mens_erro)) 
    {
        $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
    }
    $this->nm_guardar_campos();
    $this->nm_formatar_campos();
        $this->initFormPages();
    include_once("nota_credito_form0.php");
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['csrf_token'];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['Lookup_prefijo']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['Lookup_prefijo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['Lookup_prefijo']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['Lookup_prefijo'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['Lookup_prefijo']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['Lookup_prefijo'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['Lookup_prefijo']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['Lookup_prefijo'] = array(); 
    }

   $old_value_numero = $this->numero;
   $old_value_fecha_nota = $this->fecha_nota;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numero = $this->numero;
   $unformatted_value_fecha_nota = $this->fecha_nota;

   $nm_comando = "SELECT Idres, prefijo  FROM resdian  WHERE pref_ncr = 'SI' ORDER BY prefijo";

   $this->numero = $old_value_numero;
   $this->fecha_nota = $old_value_fecha_nota;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['Lookup_prefijo'][] = $rs->fields[0];
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
       $nmgp_saida_form = "nota_credito_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['nm_run_menu'] = 2;
       $nmgp_saida_form = "nota_credito_fim.php";
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
       nota_credito_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['masterValue']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['opc_ant'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['nota_credito']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           nota_credito_pack_ajax_response();
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
       nota_credito_pack_ajax_response();
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
    function getButtonIds($buttonName) {
        switch ($buttonName) {
            case "help":
                return array("sc_b_hlp_b");
                break;
            case "exit":
                return array("Bsair_b.sc-unique-btn-1", "Bsair_b.sc-unique-btn-2");
                break;
            case "0":
                return array("sys_separator.sc-unique-btn-3");
                break;
            case "ok":
                return array("sub_form_b.sc-unique-btn-4");
                break;
        }

        return array($buttonName);
    } // getButtonIds

}
?>
