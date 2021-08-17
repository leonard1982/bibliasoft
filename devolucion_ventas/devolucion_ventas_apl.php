<?php
//
class devolucion_ventas_apl
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
   var $numerodev;
   var $fecha;
   var $resolucion;
   var $resolucion_1;
   var $numfacven;
   var $numfacven_1;
   var $fechafactura;
   var $vdesc;
   var $vparc;
   var $viva;
   var $vunit;
   var $observa;
   var $confirma;
   var $confirma_1;
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
          if (isset($this->NM_ajax_info['param']['confirma']))
          {
              $this->confirma = $this->NM_ajax_info['param']['confirma'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['fecha']))
          {
              $this->fecha = $this->NM_ajax_info['param']['fecha'];
          }
          if (isset($this->NM_ajax_info['param']['fechafactura']))
          {
              $this->fechafactura = $this->NM_ajax_info['param']['fechafactura'];
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
          if (isset($this->NM_ajax_info['param']['numerodev']))
          {
              $this->numerodev = $this->NM_ajax_info['param']['numerodev'];
          }
          if (isset($this->NM_ajax_info['param']['numfacven']))
          {
              $this->numfacven = $this->NM_ajax_info['param']['numfacven'];
          }
          if (isset($this->NM_ajax_info['param']['observa']))
          {
              $this->observa = $this->NM_ajax_info['param']['observa'];
          }
          if (isset($this->NM_ajax_info['param']['resolucion']))
          {
              $this->resolucion = $this->NM_ajax_info['param']['resolucion'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['vdesc']))
          {
              $this->vdesc = $this->NM_ajax_info['param']['vdesc'];
          }
          if (isset($this->NM_ajax_info['param']['viva']))
          {
              $this->viva = $this->NM_ajax_info['param']['viva'];
          }
          if (isset($this->NM_ajax_info['param']['vparc']))
          {
              $this->vparc = $this->NM_ajax_info['param']['vparc'];
          }
          if (isset($this->NM_ajax_info['param']['vunit']))
          {
              $this->vunit = $this->NM_ajax_info['param']['vunit'];
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
      if (isset($this->par_numfacventa) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_numfacventa'] = $this->par_numfacventa;
      }
      if (isset($this->idpref) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['idpref'] = $this->idpref;
      }
      if (isset($_POST["par_numfacventa"]) && isset($this->par_numfacventa)) 
      {
          $_SESSION['par_numfacventa'] = $this->par_numfacventa;
      }
      if (isset($_POST["idpref"]) && isset($this->idpref)) 
      {
          $_SESSION['idpref'] = $this->idpref;
      }
      if (isset($_GET["par_numfacventa"]) && isset($this->par_numfacventa)) 
      {
          $_SESSION['par_numfacventa'] = $this->par_numfacventa;
      }
      if (isset($_GET["idpref"]) && isset($this->idpref)) 
      {
          $_SESSION['idpref'] = $this->idpref;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['devolucion_ventas']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['devolucion_ventas']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['devolucion_ventas']['embutida_parms']);
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
                 nm_limpa_str_devolucion_ventas($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->par_numfacventa)) 
          {
              $_SESSION['par_numfacventa'] = $this->par_numfacventa;
          }
          if (isset($this->idpref)) 
          {
              $_SESSION['idpref'] = $this->idpref;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['devolucion_ventas']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['devolucion_ventas']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['devolucion_ventas']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['devolucion_ventas']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->par_numfacventa)) 
          {
              $_SESSION['par_numfacventa'] = $this->par_numfacventa;
          }
          if (isset($this->idpref)) 
          {
              $_SESSION['idpref'] = $this->idpref;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['devolucion_ventas']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['devolucion_ventas']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['devolucion_ventas']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['devolucion_ventas']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['devolucion_ventas']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['devolucion_ventas']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['devolucion_ventas']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['devolucion_ventas']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['devolucion_ventas']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['devolucion_ventas']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new devolucion_ventas_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['initialize'])
          {
              $_SESSION['scriptcase']['devolucion_ventas']['contr_erro'] = 'on';
if (!isset($this->sc_temp_idpref)) {$this->sc_temp_idpref = (isset($_SESSION['idpref'])) ? $_SESSION['idpref'] : "";}
if (!isset($this->sc_temp_par_numfacventa)) {$this->sc_temp_par_numfacventa = (isset($_SESSION['par_numfacventa'])) ? $_SESSION['par_numfacventa'] : "";}
  $_SESSION['scriptcase']['sc_apl_conf']['control_prueba']['start'] = 'new';
$this->sc_temp_par_numfacventa=0;
$this->sc_temp_idpref=0;
if (isset($this->sc_temp_par_numfacventa)) { $_SESSION['par_numfacventa'] = $this->sc_temp_par_numfacventa;}
if (isset($this->sc_temp_idpref)) { $_SESSION['idpref'] = $this->sc_temp_idpref;}
$_SESSION['scriptcase']['devolucion_ventas']['contr_erro'] = 'off';
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['devolucion_ventas']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['devolucion_ventas']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['devolucion_ventas'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['devolucion_ventas']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['devolucion_ventas']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('devolucion_ventas') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['devolucion_ventas']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "devolucion_ventas")
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



      $_SESSION['scriptcase']['error_icon']['devolucion_ventas']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Lemon__NM__nm_scriptcase9_Lemon_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['devolucion_ventas'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['ok'] = "on";
      $this->nmgp_botoes['facebook'] = "off";
      $this->nmgp_botoes['google'] = "off";
      $this->nmgp_botoes['twitter'] = "off";
      $this->nmgp_botoes['paypal'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['devolucion_ventas']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['devolucion_ventas'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['devolucion_ventas'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("devolucion_ventas", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'devolucion_ventas_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'devolucion_ventas_help.txt');
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
          require_once($this->Ini->path_embutida . 'devolucion_ventas/devolucion_ventas_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "devolucion_ventas_erro.class.php"); 
      }
      $this->Erro      = new devolucion_ventas_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['devolucion_ventas']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      if (!isset($this->NM_ajax_flag) || ('validate_' != substr($this->NM_ajax_opcao, 0, 9) && 'add_new_line' != $this->NM_ajax_opcao && 'autocomp_' != substr($this->NM_ajax_opcao, 0, 9)))
      {
      $_SESSION['scriptcase']['devolucion_ventas']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_confirma = $this->confirma;
}
  $_SESSION['scriptcase']['sc_apl_conf']['form_devolucionenventa']['start'] = 'new';
$this->nmgp_cmp_hidden["confirma"] = "off"; $this->NM_ajax_info['fieldDisplay']['confirma'] = 'off';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_confirma != $this->confirma || (isset($bFlagRead_confirma) && $bFlagRead_confirma)))
    {
        $this->ajax_return_values_confirma(true);
    }
}
$_SESSION['scriptcase']['devolucion_ventas']['contr_erro'] = 'off'; 
      }
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['devolucion_ventas']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['devolucion_ventas']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- numerodev
      $this->field_config['numerodev']               = array();
      $this->field_config['numerodev']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['numerodev']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['numerodev']['symbol_dec'] = '';
      $this->field_config['numerodev']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['numerodev']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fecha
      $this->field_config['fecha']                 = array();
      $this->field_config['fecha']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fecha']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fecha');
      //-- fechafactura
      $this->field_config['fechafactura']                 = array();
      $this->field_config['fechafactura']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fechafactura']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechafactura']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fechafactura');
      //-- vdesc
      $this->field_config['vdesc']               = array();
      $this->field_config['vdesc']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['vdesc']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['vdesc']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['vdesc']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['vdesc']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['vdesc']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- vparc
      $this->field_config['vparc']               = array();
      $this->field_config['vparc']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['vparc']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['vparc']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['vparc']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['vparc']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['vparc']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- viva
      $this->field_config['viva']               = array();
      $this->field_config['viva']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['viva']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['viva']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['viva']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['viva']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['viva']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- vunit
      $this->field_config['vunit']               = array();
      $this->field_config['vunit']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['vunit']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['vunit']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['vunit']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['vunit']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['vunit']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
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
          if ('validate_numerodev' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numerodev');
          }
          if ('validate_fecha' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecha');
          }
          if ('validate_resolucion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'resolucion');
          }
          if ('validate_numfacven' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numfacven');
          }
          if ('validate_fechafactura' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fechafactura');
          }
          if ('validate_confirma' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'confirma');
          }
          if ('validate_vdesc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'vdesc');
          }
          if ('validate_vparc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'vparc');
          }
          if ('validate_viva' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'viva');
          }
          if ('validate_vunit' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'vunit');
          }
          if ('validate_observa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'observa');
          }
          devolucion_ventas_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_confirma_onclick' == $this->NM_ajax_opcao)
          {
              $this->confirma_onClick();
          }
          if ('event_numfacven_onchange' == $this->NM_ajax_opcao)
          {
              $this->numfacven_onChange();
          }
          if ('event_resolucion_onchange' == $this->NM_ajax_opcao)
          {
              $this->resolucion_onChange();
          }
          devolucion_ventas_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->confirma))
          {
              $x = 0; 
              $this->confirma_1 = $this->confirma;
              $this->confirma = ""; 
              if ($this->confirma_1 != "") 
              { 
                  foreach ($this->confirma_1 as $dados_confirma_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->confirma .= ";";
                      } 
                      $this->confirma .= $dados_confirma_1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['dados_select']['resolucion']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->resolucion = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['dados_select']['resolucion'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['dados_select']['numfacven']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->numfacven = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['dados_select']['numfacven'];
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              devolucion_ventas_pack_ajax_response();
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
          $_SESSION['scriptcase']['devolucion_ventas']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  devolucion_ventas_pack_ajax_response();
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
          $_SESSION['scriptcase']['devolucion_ventas']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  devolucion_ventas_pack_ajax_response();
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
          $this->numerodev = "" ;  
              $this->fecha =  date('Y') . "-" . date('m')  . "-" . date('d');
              nm_conv_form_data($this->fecha, "aaaa-mm-dd", "AAAAMMDD", array($this->field_config['fecha']['date_sep'])) ;  
          $this->resolucion = "" ;  
          $this->numfacven = "" ;  
          $this->fechafactura = "" ;  
          $this->vdesc = "" ;  
          $this->vparc = "" ;  
          $this->viva = "" ;  
          $this->vunit = "" ;  
          $this->observa = "" ;  
          $this->confirma = "" ;  
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['dados_form']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['dados_form']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['dados_form'] as $NM_campo => $NM_valor)
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['recarga'] = $this->nmgp_opcao;
      }
      if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "" || $campos_erro != "" || !isset($this->bok) || $this->bok != "OK" || $this->nmgp_opcao == "recarga")
      {
          if ($Campos_Crit == "" && empty($Campos_Falta) && $this->Campos_Mens_erro == "" && !isset($this->bok) && $this->nmgp_opcao != "recarga")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos']))
              { 
                  $numerodev = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'][0]; 
                  $fecha = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'][1]; 
                  $resolucion = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'][2]; 
                  $numfacven = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'][3]; 
                  $fechafactura = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'][4]; 
                  $confirma = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'][5]; 
                  $vdesc = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'][6]; 
                  $vparc = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'][7]; 
                  $viva = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'][8]; 
                  $vunit = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'][9]; 
                  $observa = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'][10]; 
              } 
          }
          $this->nm_gera_html();
          $this->NM_close_db(); 
      }
      elseif (isset($this->bok) && $this->bok == "OK")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'] = array(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'][0] = $this->numerodev; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'][1] = $this->fecha; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'][2] = $this->resolucion; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'][3] = $this->numfacven; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'][4] = $this->fechafactura; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'][5] = $this->confirma; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'][6] = $this->vdesc; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'][7] = $this->vparc; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'][8] = $this->viva; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'][9] = $this->vunit; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['campos'][10] = $this->observa; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['redir'] == "redir")
          {
              $this->nmgp_redireciona(); 
          }
          else
          {
              $contr_menu = "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['iframe_menu'])
              {
                  $contr_menu = "glo_menu";
              }
              if (isset($_SESSION['scriptcase']['sc_ult_apl_menu']) && in_array("devolucion_ventas", $_SESSION['scriptcase']['sc_ult_apl_menu']))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona_form("devolucion_ventas_fim.php", $this->nm_location, $contr_menu); 
              }
              else
              {
                  $this->nm_gera_html();
                  if (!$_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['embutida_proc'])
                  { 
                      $this->NM_close_db(); 
                  } 
              }
          }
          $this->NM_close_db(); 
          if ($this->NM_ajax_flag)
          {
              devolucion_ventas_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "devolucion_ventas.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . "") ?></TITLE>
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
<form name="Fdown" method="get" action="devolucion_ventas_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="devolucion_ventas"> 
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
           case 'numerodev':
               return "Número de Devolución";
               break;
           case 'fecha':
               return "Fecha de la Devolución";
               break;
           case 'resolucion':
               return "Resolución";
               break;
           case 'numfacven':
               return "Factura";
               break;
           case 'fechafactura':
               return "Fecha de la Factura";
               break;
           case 'confirma':
               return "";
               break;
           case 'vdesc':
               return "Descuento";
               break;
           case 'vparc':
               return "Subtotal";
               break;
           case 'viva':
               return "IVA";
               break;
           case 'vunit':
               return "Valor total devolución";
               break;
           case 'observa':
               return "Observaciones";
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
              if (!isset($this->NM_ajax_info['errList']['geral_devolucion_ventas']) || !is_array($this->NM_ajax_info['errList']['geral_devolucion_ventas']))
              {
                  $this->NM_ajax_info['errList']['geral_devolucion_ventas'] = array();
              }
              $this->NM_ajax_info['errList']['geral_devolucion_ventas'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'numerodev' == $filtro)
        $this->ValidateField_numerodev($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fecha' == $filtro)
        $this->ValidateField_fecha($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'resolucion' == $filtro)
        $this->ValidateField_resolucion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'numfacven' == $filtro)
        $this->ValidateField_numfacven($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fechafactura' == $filtro)
        $this->ValidateField_fechafactura($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'confirma' == $filtro)
        $this->ValidateField_confirma($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'vdesc' == $filtro)
        $this->ValidateField_vdesc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'vparc' == $filtro)
        $this->ValidateField_vparc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'viva' == $filtro)
        $this->ValidateField_viva($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'vunit' == $filtro)
        $this->ValidateField_vunit($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'observa' == $filtro)
        $this->ValidateField_observa($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---

      if (empty($Campos_Crit) && empty($Campos_Falta))
      {
      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['devolucion_ventas']['contr_erro'] = 'on';
if (!isset($this->sc_temp_par_numfacventa)) {$this->sc_temp_par_numfacventa = (isset($_SESSION['par_numfacventa'])) ? $_SESSION['par_numfacventa'] : "";}
  	$id="";
	$idfac="";
	$idproducto="";
	$unimay="";
	$fac="";
	$bod="";
	$costo="";
	$cantidad="";
	$vuni="";
	$vparcial="";
	$iva="";
	$desc="";
	$tiva="";
	$tdes="";
	$dev="";
	$col="";
	$tall="";
	$sab="";
 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select * from detalleventa where numfac=$this->sc_temp_par_numfacventa"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select * from detalleventa where numfac=$this->sc_temp_par_numfacventa"; 
      }
      else
      { 
          $nm_select = "select * from detalleventa where numfac=$this->sc_temp_par_numfacventa"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[5] = str_replace(',', '.', $SCrx->fields[5]);
                 $SCrx->fields[6] = str_replace(',', '.', $SCrx->fields[6]);
                 $SCrx->fields[7] = str_replace(',', '.', $SCrx->fields[7]);
                 $SCrx->fields[8] = str_replace(',', '.', $SCrx->fields[8]);
                 $SCrx->fields[9] = str_replace(',', '.', $SCrx->fields[9]);
                 $SCrx->fields[10] = str_replace(',', '.', $SCrx->fields[10]);
                 $SCrx->fields[11] = str_replace(',', '.', $SCrx->fields[11]);
                 $SCrx->fields[12] = str_replace(',', '.', $SCrx->fields[12]);
                 $SCrx->fields[13] = str_replace(',', '.', $SCrx->fields[13]);
                 $SCrx->fields[14] = str_replace(',', '.', $SCrx->fields[14]);
                 $SCrx->fields[15] = str_replace(',', '.', $SCrx->fields[15]);
                 $SCrx->fields[16] = str_replace(',', '.', $SCrx->fields[16]);
                 $SCrx->fields[17] = str_replace(',', '.', $SCrx->fields[17]);
                 $SCrx->fields[18] = str_replace(',', '.', $SCrx->fields[18]);
                 $SCrx->fields[19] = str_replace(',', '.', $SCrx->fields[19]);
                 $SCrx->fields[20] = str_replace(',', '.', $SCrx->fields[20]);
                 $SCrx->fields[29] = str_replace(',', '.', $SCrx->fields[29]);
                 $SCrx->fields[30] = str_replace(',', '.', $SCrx->fields[30]);
                 $SCrx->fields[31] = str_replace(',', '.', $SCrx->fields[31]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 $SCrx->fields[5] = (strpos(strtolower($SCrx->fields[5]), "e")) ? (float)$SCrx->fields[5] : $SCrx->fields[5];
                 $SCrx->fields[5] = (string)$SCrx->fields[5];
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
                 $SCrx->fields[11] = (strpos(strtolower($SCrx->fields[11]), "e")) ? (float)$SCrx->fields[11] : $SCrx->fields[11];
                 $SCrx->fields[11] = (string)$SCrx->fields[11];
                 $SCrx->fields[12] = (strpos(strtolower($SCrx->fields[12]), "e")) ? (float)$SCrx->fields[12] : $SCrx->fields[12];
                 $SCrx->fields[12] = (string)$SCrx->fields[12];
                 $SCrx->fields[13] = (strpos(strtolower($SCrx->fields[13]), "e")) ? (float)$SCrx->fields[13] : $SCrx->fields[13];
                 $SCrx->fields[13] = (string)$SCrx->fields[13];
                 $SCrx->fields[14] = (strpos(strtolower($SCrx->fields[14]), "e")) ? (float)$SCrx->fields[14] : $SCrx->fields[14];
                 $SCrx->fields[14] = (string)$SCrx->fields[14];
                 $SCrx->fields[15] = (strpos(strtolower($SCrx->fields[15]), "e")) ? (float)$SCrx->fields[15] : $SCrx->fields[15];
                 $SCrx->fields[15] = (string)$SCrx->fields[15];
                 $SCrx->fields[16] = (strpos(strtolower($SCrx->fields[16]), "e")) ? (float)$SCrx->fields[16] : $SCrx->fields[16];
                 $SCrx->fields[16] = (string)$SCrx->fields[16];
                 $SCrx->fields[17] = (strpos(strtolower($SCrx->fields[17]), "e")) ? (float)$SCrx->fields[17] : $SCrx->fields[17];
                 $SCrx->fields[17] = (string)$SCrx->fields[17];
                 $SCrx->fields[18] = (strpos(strtolower($SCrx->fields[18]), "e")) ? (float)$SCrx->fields[18] : $SCrx->fields[18];
                 $SCrx->fields[18] = (string)$SCrx->fields[18];
                 $SCrx->fields[19] = (strpos(strtolower($SCrx->fields[19]), "e")) ? (float)$SCrx->fields[19] : $SCrx->fields[19];
                 $SCrx->fields[19] = (string)$SCrx->fields[19];
                 $SCrx->fields[20] = (strpos(strtolower($SCrx->fields[20]), "e")) ? (float)$SCrx->fields[20] : $SCrx->fields[20];
                 $SCrx->fields[20] = (string)$SCrx->fields[20];
                 $SCrx->fields[29] = (strpos(strtolower($SCrx->fields[29]), "e")) ? (float)$SCrx->fields[29] : $SCrx->fields[29];
                 $SCrx->fields[29] = (string)$SCrx->fields[29];
                 $SCrx->fields[30] = (strpos(strtolower($SCrx->fields[30]), "e")) ? (float)$SCrx->fields[30] : $SCrx->fields[30];
                 $SCrx->fields[30] = (string)$SCrx->fields[30];
                 $SCrx->fields[31] = (strpos(strtolower($SCrx->fields[31]), "e")) ? (float)$SCrx->fields[31] : $SCrx->fields[31];
                 $SCrx->fields[31] = (string)$SCrx->fields[31];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
;
if(!empty($this->ds[0][0]))
	   { 
		$i=0;
		  foreach($this->ds  as $ads)
			{
			  $i=$i+1;
			  	 $id.=$ads[0];
				 $idfac.=$ads[1];
				 $idproducto.=$ads[3];
				 $unimay.=$ads[4];
				 $fac.=$ads[5];
				 $bod.=$ads[6];
				 $costo.=$ads[7];
				 $cantidad.=$ads[8];
				 $vuni.=$ads[9];
				 $vparcial.=$ads[10];
				 $iva.=$ads[11];
				 $desc.=$ads[12];
				 $tiva.=$ads[13];
				 $tdes.=$ads[14];
			  	 $dev.=$ads[15];
			 	$col.=$ads[16];
			  	$tall.=$ads[17];			  
			   	$sab.=$ads[18];
		
	if($col>0)
		{
		if($tall>0)
		   {
			if($sab>0)
			   {
				
     $nm_select ="insert detalleventaself set iddet=$id, numfac=$idfac, remision='Null', idpro=$idproducto, unidadmayor='$unimay', factor=$fac, idbod=$bod, costop=$costo, cantidad=$cantidad, valorunit=$vuni, valorpar=$vparcial, iva=$iva, descuento=$desc, adicional=$tiva, adicional1=$tdes, devuelto=$dev, colores=$col, tallas=$tall, sabor=$sab"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                devolucion_ventas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
				}
			 else
			   {
				 
     $nm_select ="insert detalleventaself set iddet=$id, numfac=$idfac, remision='Null', idpro=$idproducto, unidadmayor='$unimay', factor=$fac, idbod=$bod, costop=$costo, cantidad=$cantidad, valorunit=$vuni, valorpar=$vparcial, iva=$iva, descuento=$desc, adicional=$tiva, adicional1=$tdes, devuelto=$dev, colores=$col, tallas=$tall"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                devolucion_ventas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;  
				}
			}
		else
			   {
				
     $nm_select ="insert detalleventaself set iddet=$id, numfac=$idfac, remision='Null', idpro=$idproducto, unidadmayor='$unimay', factor=$fac, idbod=$bod, costop=$costo, cantidad=$cantidad, valorunit=$vuni, valorpar=$vparcial, iva=$iva, descuento=$desc, adicional=$tiva, adicional1=$tdes, devuelto=$dev, colores=$col"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                devolucion_ventas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
				}
		}
	else
		{
		
     $nm_select ="insert detalleventaself set iddet=$id, numfac=$idfac, remision='Null', idpro=$idproducto, unidadmayor='$unimay', factor=$fac, idbod=$bod, costop=$costo, cantidad=$cantidad, valorunit=$vuni, valorpar=$vparcial, iva=$iva, descuento=$desc, adicional=$tiva, adicional1=$tdes, devuelto=$dev"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                devolucion_ventas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		}

		 
	$id=0;
	$idfac=0;
	$idproducto=0;
	$unimay="";
	$fac=0;
	$bod=0;
	$costo=0;
	$cantidad=0;
	$vuni=0;
	$vparcial=0;
	$iva=0;
	$desc=0;
	$tiva=0;
	$tdes=0;
	$dev=0;
	$col="";
	$tall="";
	$sab="";
				}
			
	}
if (isset($this->sc_temp_par_numfacventa)) { $_SESSION['par_numfacventa'] = $this->sc_temp_par_numfacventa;}
$_SESSION['scriptcase']['devolucion_ventas']['contr_erro'] = 'off'; 
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

      if (empty($Campos_Crit) && empty($Campos_Falta) && empty($this->Campos_Mens_erro))
      {
          if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
          {
              $_SESSION['scriptcase']['devolucion_ventas']['contr_erro'] = 'on';
  $this->sc_ajax_javascript('nm_field_disabled', array("resolucion=disabled", ""));
;
$this->sc_ajax_javascript('nm_field_disabled', array("numfacven=disabled", ""));
;

 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_devventa') . "/", $this->nm_location, "_self?#?" . NM_encode_input("") . "?@?", "_self", "ret_self", 440, 630);
 };
$_SESSION['scriptcase']['devolucion_ventas']['contr_erro'] = 'off'; 
          }
      }
   }

    function ValidateField_numerodev(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->numerodev) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'numerodev';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_numerodev

    function ValidateField_fecha(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->fecha) != "")  
          { 
          } 
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

    function ValidateField_resolucion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->resolucion == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['php_cmp_required']['resolucion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['php_cmp_required']['resolucion'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Resolución" ; 
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
          if (!empty($this->resolucion) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_resolucion']) && !in_array($this->resolucion, $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_resolucion']))
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

    function ValidateField_numfacven(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->numfacven == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['php_cmp_required']['numfacven']) || $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['php_cmp_required']['numfacven'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Factura" ; 
          if (!isset($Campos_Erros['numfacven']))
          {
              $Campos_Erros['numfacven'] = array();
          }
          $Campos_Erros['numfacven'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['numfacven']) || !is_array($this->NM_ajax_info['errList']['numfacven']))
          {
              $this->NM_ajax_info['errList']['numfacven'] = array();
          }
          $this->NM_ajax_info['errList']['numfacven'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->numfacven) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_numfacven']) && !in_array($this->numfacven, $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_numfacven']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['numfacven']))
              {
                  $Campos_Erros['numfacven'] = array();
              }
              $Campos_Erros['numfacven'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['numfacven']) || !is_array($this->NM_ajax_info['errList']['numfacven']))
              {
                  $this->NM_ajax_info['errList']['numfacven'] = array();
              }
              $this->NM_ajax_info['errList']['numfacven'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'numfacven';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_numfacven

    function ValidateField_fechafactura(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->fechafactura) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fechafactura';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fechafactura

    function ValidateField_confirma(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->confirma == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->confirma))
          {
              $x = 0; 
              $this->confirma_1 = array(); 
              foreach ($this->confirma as $ind => $dados_confirma_1 ) 
              {
                  if ($dados_confirma_1 != "") 
                  {
                      $this->confirma_1[] = $dados_confirma_1;
                  } 
              } 
              $this->confirma = ""; 
              foreach ($this->confirma_1 as $dados_confirma_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->confirma .= ";";
                   } 
                   $this->confirma .= $dados_confirma_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'confirma';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_confirma

    function ValidateField_vdesc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->vdesc === "" || is_null($this->vdesc))  
      { 
          $this->vdesc = 0;
          $this->sc_force_zero[] = 'vdesc';
      } 
      if (!empty($this->field_config['vdesc']['symbol_dec']))
      {
          $this->sc_remove_currency($this->vdesc, $this->field_config['vdesc']['symbol_dec'], $this->field_config['vdesc']['symbol_grp'], $this->field_config['vdesc']['symbol_mon']); 
          nm_limpa_valor($this->vdesc, $this->field_config['vdesc']['symbol_dec'], $this->field_config['vdesc']['symbol_grp']) ; 
          if ('.' == substr($this->vdesc, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->vdesc, 1)))
              {
                  $this->vdesc = '';
              }
              else
              {
                  $this->vdesc = '0' . $this->vdesc;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->vdesc != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->vdesc, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->vdesc, -1))
              {
                  $iTestSize++;
                  $this->vdesc = '-' . substr($this->vdesc, 0, -1);
              }
              if (strlen($this->vdesc) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Descuento: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['vdesc']))
                  {
                      $Campos_Erros['vdesc'] = array();
                  }
                  $Campos_Erros['vdesc'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['vdesc']) || !is_array($this->NM_ajax_info['errList']['vdesc']))
                  {
                      $this->NM_ajax_info['errList']['vdesc'] = array();
                  }
                  $this->NM_ajax_info['errList']['vdesc'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->vdesc, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Descuento; " ; 
                  if (!isset($Campos_Erros['vdesc']))
                  {
                      $Campos_Erros['vdesc'] = array();
                  }
                  $Campos_Erros['vdesc'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['vdesc']) || !is_array($this->NM_ajax_info['errList']['vdesc']))
                  {
                      $this->NM_ajax_info['errList']['vdesc'] = array();
                  }
                  $this->NM_ajax_info['errList']['vdesc'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'vdesc';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_vdesc

    function ValidateField_vparc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->vparc === "" || is_null($this->vparc))  
      { 
          $this->vparc = 0;
          $this->sc_force_zero[] = 'vparc';
      } 
      if (!empty($this->field_config['vparc']['symbol_dec']))
      {
          $this->sc_remove_currency($this->vparc, $this->field_config['vparc']['symbol_dec'], $this->field_config['vparc']['symbol_grp'], $this->field_config['vparc']['symbol_mon']); 
          nm_limpa_valor($this->vparc, $this->field_config['vparc']['symbol_dec'], $this->field_config['vparc']['symbol_grp']) ; 
          if ('.' == substr($this->vparc, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->vparc, 1)))
              {
                  $this->vparc = '';
              }
              else
              {
                  $this->vparc = '0' . $this->vparc;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->vparc != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->vparc, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->vparc, -1))
              {
                  $iTestSize++;
                  $this->vparc = '-' . substr($this->vparc, 0, -1);
              }
              if (strlen($this->vparc) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Subtotal: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['vparc']))
                  {
                      $Campos_Erros['vparc'] = array();
                  }
                  $Campos_Erros['vparc'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['vparc']) || !is_array($this->NM_ajax_info['errList']['vparc']))
                  {
                      $this->NM_ajax_info['errList']['vparc'] = array();
                  }
                  $this->NM_ajax_info['errList']['vparc'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->vparc, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Subtotal; " ; 
                  if (!isset($Campos_Erros['vparc']))
                  {
                      $Campos_Erros['vparc'] = array();
                  }
                  $Campos_Erros['vparc'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['vparc']) || !is_array($this->NM_ajax_info['errList']['vparc']))
                  {
                      $this->NM_ajax_info['errList']['vparc'] = array();
                  }
                  $this->NM_ajax_info['errList']['vparc'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'vparc';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_vparc

    function ValidateField_viva(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->viva === "" || is_null($this->viva))  
      { 
          $this->viva = 0;
          $this->sc_force_zero[] = 'viva';
      } 
      if (!empty($this->field_config['viva']['symbol_dec']))
      {
          $this->sc_remove_currency($this->viva, $this->field_config['viva']['symbol_dec'], $this->field_config['viva']['symbol_grp'], $this->field_config['viva']['symbol_mon']); 
          nm_limpa_valor($this->viva, $this->field_config['viva']['symbol_dec'], $this->field_config['viva']['symbol_grp']) ; 
          if ('.' == substr($this->viva, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->viva, 1)))
              {
                  $this->viva = '';
              }
              else
              {
                  $this->viva = '0' . $this->viva;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->viva != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->viva, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->viva, -1))
              {
                  $iTestSize++;
                  $this->viva = '-' . substr($this->viva, 0, -1);
              }
              if (strlen($this->viva) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "IVA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['viva']))
                  {
                      $Campos_Erros['viva'] = array();
                  }
                  $Campos_Erros['viva'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['viva']) || !is_array($this->NM_ajax_info['errList']['viva']))
                  {
                      $this->NM_ajax_info['errList']['viva'] = array();
                  }
                  $this->NM_ajax_info['errList']['viva'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->viva, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "IVA; " ; 
                  if (!isset($Campos_Erros['viva']))
                  {
                      $Campos_Erros['viva'] = array();
                  }
                  $Campos_Erros['viva'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['viva']) || !is_array($this->NM_ajax_info['errList']['viva']))
                  {
                      $this->NM_ajax_info['errList']['viva'] = array();
                  }
                  $this->NM_ajax_info['errList']['viva'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'viva';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_viva

    function ValidateField_vunit(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->vunit === "" || is_null($this->vunit))  
      { 
          $this->vunit = 0;
          $this->sc_force_zero[] = 'vunit';
      } 
      if (!empty($this->field_config['vunit']['symbol_dec']))
      {
          $this->sc_remove_currency($this->vunit, $this->field_config['vunit']['symbol_dec'], $this->field_config['vunit']['symbol_grp'], $this->field_config['vunit']['symbol_mon']); 
          nm_limpa_valor($this->vunit, $this->field_config['vunit']['symbol_dec'], $this->field_config['vunit']['symbol_grp']) ; 
          if ('.' == substr($this->vunit, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->vunit, 1)))
              {
                  $this->vunit = '';
              }
              else
              {
                  $this->vunit = '0' . $this->vunit;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->vunit != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->vunit, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->vunit, -1))
              {
                  $iTestSize++;
                  $this->vunit = '-' . substr($this->vunit, 0, -1);
              }
              if (strlen($this->vunit) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valor total devolución: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['vunit']))
                  {
                      $Campos_Erros['vunit'] = array();
                  }
                  $Campos_Erros['vunit'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['vunit']) || !is_array($this->NM_ajax_info['errList']['vunit']))
                  {
                      $this->NM_ajax_info['errList']['vunit'] = array();
                  }
                  $this->NM_ajax_info['errList']['vunit'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->vunit, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valor total devolución; " ; 
                  if (!isset($Campos_Erros['vunit']))
                  {
                      $Campos_Erros['vunit'] = array();
                  }
                  $Campos_Erros['vunit'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['vunit']) || !is_array($this->NM_ajax_info['errList']['vunit']))
                  {
                      $this->NM_ajax_info['errList']['vunit'] = array();
                  }
                  $this->NM_ajax_info['errList']['vunit'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'vunit';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_vunit

    function ValidateField_observa(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->observa) > 200) 
          { 
              $hasError = true;
              $Campos_Crit .= "Observaciones " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['observa']))
              {
                  $Campos_Erros['observa'] = array();
              }
              $Campos_Erros['observa'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['observa']) || !is_array($this->NM_ajax_info['errList']['observa']))
              {
                  $this->NM_ajax_info['errList']['observa'] = array();
              }
              $this->NM_ajax_info['errList']['observa'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'observa';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_observa

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
    $this->nmgp_dados_form['numerodev'] = $this->numerodev;
    $this->nmgp_dados_form['fecha'] = (strlen(trim($this->fecha)) > 19) ? str_replace(".", ":", $this->fecha) : trim($this->fecha);
    $this->nmgp_dados_form['resolucion'] = $this->resolucion;
    $this->nmgp_dados_form['numfacven'] = $this->numfacven;
    $this->nmgp_dados_form['fechafactura'] = (strlen(trim($this->fechafactura)) > 19) ? str_replace(".", ":", $this->fechafactura) : trim($this->fechafactura);
    $this->nmgp_dados_form['confirma'] = $this->confirma;
    $this->nmgp_dados_form['vdesc'] = $this->vdesc;
    $this->nmgp_dados_form['vparc'] = $this->vparc;
    $this->nmgp_dados_form['viva'] = $this->viva;
    $this->nmgp_dados_form['vunit'] = $this->vunit;
    $this->nmgp_dados_form['observa'] = $this->observa;
    $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['numerodev'] = $this->numerodev;
      nm_limpa_numero($this->numerodev, $this->field_config['numerodev']['symbol_grp']) ; 
      $this->Before_unformat['fecha'] = $this->fecha;
      nm_limpa_data($this->fecha, $this->field_config['fecha']['date_sep']) ; 
      $this->Before_unformat['fechafactura'] = $this->fechafactura;
      nm_limpa_data($this->fechafactura, $this->field_config['fechafactura']['date_sep']) ; 
      $this->Before_unformat['vdesc'] = $this->vdesc;
      if (!empty($this->field_config['vdesc']['symbol_dec']))
      {
         $this->sc_remove_currency($this->vdesc, $this->field_config['vdesc']['symbol_dec'], $this->field_config['vdesc']['symbol_grp'], $this->field_config['vdesc']['symbol_mon']);
         nm_limpa_valor($this->vdesc, $this->field_config['vdesc']['symbol_dec'], $this->field_config['vdesc']['symbol_grp']);
      }
      $this->Before_unformat['vparc'] = $this->vparc;
      if (!empty($this->field_config['vparc']['symbol_dec']))
      {
         $this->sc_remove_currency($this->vparc, $this->field_config['vparc']['symbol_dec'], $this->field_config['vparc']['symbol_grp'], $this->field_config['vparc']['symbol_mon']);
         nm_limpa_valor($this->vparc, $this->field_config['vparc']['symbol_dec'], $this->field_config['vparc']['symbol_grp']);
      }
      $this->Before_unformat['viva'] = $this->viva;
      if (!empty($this->field_config['viva']['symbol_dec']))
      {
         $this->sc_remove_currency($this->viva, $this->field_config['viva']['symbol_dec'], $this->field_config['viva']['symbol_grp'], $this->field_config['viva']['symbol_mon']);
         nm_limpa_valor($this->viva, $this->field_config['viva']['symbol_dec'], $this->field_config['viva']['symbol_grp']);
      }
      $this->Before_unformat['vunit'] = $this->vunit;
      if (!empty($this->field_config['vunit']['symbol_dec']))
      {
         $this->sc_remove_currency($this->vunit, $this->field_config['vunit']['symbol_dec'], $this->field_config['vunit']['symbol_grp'], $this->field_config['vunit']['symbol_mon']);
         nm_limpa_valor($this->vunit, $this->field_config['vunit']['symbol_dec'], $this->field_config['vunit']['symbol_grp']);
      }
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
      if ($Nome_Campo == "numerodev")
      {
          nm_limpa_numero($this->numerodev, $this->field_config['numerodev']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "vdesc")
      {
          if (!empty($this->field_config['vdesc']['symbol_dec']))
          {
             $this->sc_remove_currency($this->vdesc, $this->field_config['vdesc']['symbol_dec'], $this->field_config['vdesc']['symbol_grp'], $this->field_config['vdesc']['symbol_mon']);
             nm_limpa_valor($this->vdesc, $this->field_config['vdesc']['symbol_dec'], $this->field_config['vdesc']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "vparc")
      {
          if (!empty($this->field_config['vparc']['symbol_dec']))
          {
             $this->sc_remove_currency($this->vparc, $this->field_config['vparc']['symbol_dec'], $this->field_config['vparc']['symbol_grp'], $this->field_config['vparc']['symbol_mon']);
             nm_limpa_valor($this->vparc, $this->field_config['vparc']['symbol_dec'], $this->field_config['vparc']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "viva")
      {
          if (!empty($this->field_config['viva']['symbol_dec']))
          {
             $this->sc_remove_currency($this->viva, $this->field_config['viva']['symbol_dec'], $this->field_config['viva']['symbol_grp'], $this->field_config['viva']['symbol_mon']);
             nm_limpa_valor($this->viva, $this->field_config['viva']['symbol_dec'], $this->field_config['viva']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "vunit")
      {
          if (!empty($this->field_config['vunit']['symbol_dec']))
          {
             $this->sc_remove_currency($this->vunit, $this->field_config['vunit']['symbol_dec'], $this->field_config['vunit']['symbol_grp'], $this->field_config['vunit']['symbol_mon']);
             nm_limpa_valor($this->vunit, $this->field_config['vunit']['symbol_dec'], $this->field_config['vunit']['symbol_grp']);
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
      if ('' !== $this->numerodev || (!empty($format_fields) && isset($format_fields['numerodev'])))
      {
          nmgp_Form_Num_Val($this->numerodev, $this->field_config['numerodev']['symbol_grp'], $this->field_config['numerodev']['symbol_dec'], "0", "S", $this->field_config['numerodev']['format_neg'], "", "", "-", $this->field_config['numerodev']['symbol_fmt']) ; 
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
      if ((!empty($this->fechafactura) && 'null' != $this->fechafactura) || (!empty($format_fields) && isset($format_fields['fechafactura'])))
      {
          nm_volta_data($this->fechafactura, $this->field_config['fechafactura']['date_format']) ; 
          nmgp_Form_Datas($this->fechafactura, $this->field_config['fechafactura']['date_format'], $this->field_config['fechafactura']['date_sep']) ;  
      }
      elseif ('null' == $this->fechafactura || '' == $this->fechafactura)
      {
          $this->fechafactura = '';
      }
      if ('' !== $this->vdesc || (!empty($format_fields) && isset($format_fields['vdesc'])))
      {
          nmgp_Form_Num_Val($this->vdesc, $this->field_config['vdesc']['symbol_grp'], $this->field_config['vdesc']['symbol_dec'], "0", "S", $this->field_config['vdesc']['format_neg'], "", "", "-", $this->field_config['vdesc']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['vdesc']['symbol_mon'];
          $this->sc_add_currency($this->vdesc, $sMonSymb, $this->field_config['vdesc']['format_pos']); 
      }
      if ('' !== $this->vparc || (!empty($format_fields) && isset($format_fields['vparc'])))
      {
          nmgp_Form_Num_Val($this->vparc, $this->field_config['vparc']['symbol_grp'], $this->field_config['vparc']['symbol_dec'], "0", "S", $this->field_config['vparc']['format_neg'], "", "", "-", $this->field_config['vparc']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['vparc']['symbol_mon'];
          $this->sc_add_currency($this->vparc, $sMonSymb, $this->field_config['vparc']['format_pos']); 
      }
      if ('' !== $this->viva || (!empty($format_fields) && isset($format_fields['viva'])))
      {
          nmgp_Form_Num_Val($this->viva, $this->field_config['viva']['symbol_grp'], $this->field_config['viva']['symbol_dec'], "0", "S", $this->field_config['viva']['format_neg'], "", "", "-", $this->field_config['viva']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['viva']['symbol_mon'];
          $this->sc_add_currency($this->viva, $sMonSymb, $this->field_config['viva']['format_pos']); 
      }
      if ('' !== $this->vunit || (!empty($format_fields) && isset($format_fields['vunit'])))
      {
          nmgp_Form_Num_Val($this->vunit, $this->field_config['vunit']['symbol_grp'], $this->field_config['vunit']['symbol_dec'], "0", "S", $this->field_config['vunit']['format_neg'], "", "", "-", $this->field_config['vunit']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['vunit']['symbol_mon'];
          $this->sc_add_currency($this->vunit, $sMonSymb, $this->field_config['vunit']['format_pos']); 
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
      if ($this->fecha != "")  
      {
     nm_conv_form_data($this->fecha, $this->field_config['fecha']['date_format'], "AAAAMMDD", array($this->field_config['fecha']['date_sep'])) ;  
      }
      if ($this->fechafactura != "")  
      {
     nm_conv_form_data($this->fechafactura, $this->field_config['fechafactura']['date_format'], "AAAAMMDD", array($this->field_config['fechafactura']['date_sep'])) ;  
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
          $this->ajax_return_values_numerodev();
          $this->ajax_return_values_fecha();
          $this->ajax_return_values_resolucion();
          $this->ajax_return_values_numfacven();
          $this->ajax_return_values_fechafactura();
          $this->ajax_return_values_confirma();
          $this->ajax_return_values_vdesc();
          $this->ajax_return_values_vparc();
          $this->ajax_return_values_viva();
          $this->ajax_return_values_vunit();
          $this->ajax_return_values_observa();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          }
   } // ajax_return_values

          //----- numerodev
   function ajax_return_values_numerodev($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numerodev", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numerodev);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numerodev'] = array(
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
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_resolucion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_resolucion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_resolucion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_resolucion'] = array(); 
}
$aLookup[] = array(devolucion_ventas_pack_protect_string('') => str_replace('<', '&lt;',devolucion_ventas_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_resolucion'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_numerodev = $this->numerodev;
   $old_value_fecha = $this->fecha;
   $old_value_fechafactura = $this->fechafactura;
   $old_value_vdesc = $this->vdesc;
   $old_value_vparc = $this->vparc;
   $old_value_viva = $this->viva;
   $old_value_vunit = $this->vunit;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numerodev = $this->numerodev;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_fechafactura = $this->fechafactura;
   $unformatted_value_vdesc = $this->vdesc;
   $unformatted_value_vparc = $this->vparc;
   $unformatted_value_viva = $this->viva;
   $unformatted_value_vunit = $this->vunit;

   $confirma_val_str = "''";
   if (!empty($this->confirma))
   {
       if (is_array($this->confirma))
       {
           $Tmp_array = $this->confirma;
       }
       else
       {
           $Tmp_array = explode(";", $this->confirma);
       }
       $confirma_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $confirma_val_str)
          {
             $confirma_val_str .= ", ";
          }
          $confirma_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT Idres, prefijo  FROM resdian  ORDER BY Idres";

   $this->numerodev = $old_value_numerodev;
   $this->fecha = $old_value_fecha;
   $this->fechafactura = $old_value_fechafactura;
   $this->vdesc = $old_value_vdesc;
   $this->vparc = $old_value_vparc;
   $this->viva = $old_value_viva;
   $this->vunit = $old_value_vunit;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(devolucion_ventas_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', devolucion_ventas_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_resolucion'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['resolucion']['valList'][$i] = devolucion_ventas_pack_protect_string($v);
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

          //----- numfacven
   function ajax_return_values_numfacven($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numfacven", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numfacven);
              $aLookup = array();
              $this->_tmp_lookup_numfacven = $this->numfacven;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_numfacven']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_numfacven'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_numfacven']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_numfacven'] = array(); 
}
$aLookup[] = array(devolucion_ventas_pack_protect_string('') => str_replace('<', '&lt;',devolucion_ventas_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_numfacven'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_numerodev = $this->numerodev;
   $old_value_fecha = $this->fecha;
   $old_value_fechafactura = $this->fechafactura;
   $old_value_vdesc = $this->vdesc;
   $old_value_vparc = $this->vparc;
   $old_value_viva = $this->viva;
   $old_value_vunit = $this->vunit;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numerodev = $this->numerodev;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_fechafactura = $this->fechafactura;
   $unformatted_value_vdesc = $this->vdesc;
   $unformatted_value_vparc = $this->vparc;
   $unformatted_value_viva = $this->viva;
   $unformatted_value_vunit = $this->vunit;

   $nm_comando = "SELECT idfacven, numfacven  FROM facturaven  WHERE resolucion=$this->resolucion ORDER BY numfacven desc";

   $this->numerodev = $old_value_numerodev;
   $this->fecha = $old_value_fecha;
   $this->fechafactura = $old_value_fechafactura;
   $this->vdesc = $old_value_vdesc;
   $this->vparc = $old_value_vparc;
   $this->viva = $old_value_viva;
   $this->vunit = $old_value_vunit;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[1] = str_replace(',', '.', $rs->fields[1]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $rs->fields[1] = (strpos(strtolower($rs->fields[1]), "e")) ? (float)$rs->fields[1] : $rs->fields[1];
              $rs->fields[1] = (string)$rs->fields[1];
              $aLookup[] = array(devolucion_ventas_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', devolucion_ventas_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_numfacven'][] = $rs->fields[0];
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
          $sSelComp = "name=\"numfacven\"";
          if (isset($this->NM_ajax_info['select_html']['numfacven']) && !empty($this->NM_ajax_info['select_html']['numfacven']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['numfacven']);
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

                  if ($this->numfacven == $sValue)
                  {
                      $this->_tmp_lookup_numfacven = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['numfacven'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['numfacven']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['numfacven']['valList'][$i] = devolucion_ventas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['numfacven']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['numfacven']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['numfacven']['labList'] = $aLabel;
          }
   }

          //----- fechafactura
   function ajax_return_values_fechafactura($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fechafactura", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fechafactura);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fechafactura'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- confirma
   function ajax_return_values_confirma($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("confirma", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->confirma);
              $aLookup = array();
              $this->_tmp_lookup_confirma = $this->confirma;

$aLookup[] = array(devolucion_ventas_pack_protect_string(' ') => str_replace('<', '&lt;',devolucion_ventas_pack_protect_string("Validar Factura")));
$_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_confirma'][] = ' ';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['confirma']) && !empty($this->NM_ajax_info['select_html']['confirma']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['confirma']);
          }
          $this->NM_ajax_info['fldList']['confirma'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-confirma',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['confirma']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['confirma']['valList'][$i] = devolucion_ventas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['confirma']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['confirma']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['confirma']['labList'] = $aLabel;
          }
   }

          //----- vdesc
   function ajax_return_values_vdesc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("vdesc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->vdesc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['vdesc'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- vparc
   function ajax_return_values_vparc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("vparc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->vparc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['vparc'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- viva
   function ajax_return_values_viva($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("viva", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->viva);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['viva'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- vunit
   function ajax_return_values_vunit($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("vunit", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->vunit);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['vunit'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- observa
   function ajax_return_values_observa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("observa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->observa);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['observa'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['upload_dir'][$fieldName][] = $newName;
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
function confirma_onClick()
{
$_SESSION['scriptcase']['devolucion_ventas']['contr_erro'] = 'on';
  
$original_numerodev = $this->numerodev;
$original_fecha = $this->fecha;
$original_resolucion = $this->resolucion;
$original_numfacven = $this->numfacven;
$original_fechafactura = $this->fechafactura;
$original_vdesc = $this->vdesc;
$original_vparc = $this->vparc;
$original_viva = $this->viva;
$original_vunit = $this->vunit;
$original_observa = $this->observa;

$this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes["exit"] = "off";;
 
      $nm_select = "select numerodev from devventa order by iddevol desc limit 1"; 
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
if(!empty($this->dt[0][0]))
	{
	$this->numerodev =$this->dt[0][0]+1;
	}
else
	{
	$this->numerodev =1;
	}

     $nm_select ="Insert into devventa (numerodev, fecha, resolucion, numfacven, fechafactura, vdesc, vparc, viva, vunit, observa) values ($this->numerodev ,'$this->fecha', $this->resolucion , $this->numfacven , '$this->fechafactura', $this->vdesc , $this->vparc , $this->viva , $this->vunit , '$this->observa')"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                devolucion_ventas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;



$modificado_numerodev = $this->numerodev;
$modificado_fecha = $this->fecha;
$modificado_resolucion = $this->resolucion;
$modificado_numfacven = $this->numfacven;
$modificado_fechafactura = $this->fechafactura;
$modificado_vdesc = $this->vdesc;
$modificado_vparc = $this->vparc;
$modificado_viva = $this->viva;
$modificado_vunit = $this->vunit;
$modificado_observa = $this->observa;
$this->nm_formatar_campos('numerodev', 'fecha', 'resolucion', 'numfacven', 'fechafactura', 'vdesc', 'vparc', 'viva', 'vunit', 'observa');
if ($original_numerodev !== $modificado_numerodev || isset($this->nmgp_cmp_readonly['numerodev']) || (isset($bFlagRead_numerodev) && $bFlagRead_numerodev))
{
    $this->ajax_return_values_numerodev(true);
}
if ($original_fecha !== $modificado_fecha || isset($this->nmgp_cmp_readonly['fecha']) || (isset($bFlagRead_fecha) && $bFlagRead_fecha))
{
    $this->ajax_return_values_fecha(true);
}
if ($original_resolucion !== $modificado_resolucion || isset($this->nmgp_cmp_readonly['resolucion']) || (isset($bFlagRead_resolucion) && $bFlagRead_resolucion))
{
    $this->ajax_return_values_resolucion(true);
}
if ($original_numfacven !== $modificado_numfacven || isset($this->nmgp_cmp_readonly['numfacven']) || (isset($bFlagRead_numfacven) && $bFlagRead_numfacven))
{
    $this->ajax_return_values_numfacven(true);
}
if ($original_fechafactura !== $modificado_fechafactura || isset($this->nmgp_cmp_readonly['fechafactura']) || (isset($bFlagRead_fechafactura) && $bFlagRead_fechafactura))
{
    $this->ajax_return_values_fechafactura(true);
}
if ($original_vdesc !== $modificado_vdesc || isset($this->nmgp_cmp_readonly['vdesc']) || (isset($bFlagRead_vdesc) && $bFlagRead_vdesc))
{
    $this->ajax_return_values_vdesc(true);
}
if ($original_vparc !== $modificado_vparc || isset($this->nmgp_cmp_readonly['vparc']) || (isset($bFlagRead_vparc) && $bFlagRead_vparc))
{
    $this->ajax_return_values_vparc(true);
}
if ($original_viva !== $modificado_viva || isset($this->nmgp_cmp_readonly['viva']) || (isset($bFlagRead_viva) && $bFlagRead_viva))
{
    $this->ajax_return_values_viva(true);
}
if ($original_vunit !== $modificado_vunit || isset($this->nmgp_cmp_readonly['vunit']) || (isset($bFlagRead_vunit) && $bFlagRead_vunit))
{
    $this->ajax_return_values_vunit(true);
}
if ($original_observa !== $modificado_observa || isset($this->nmgp_cmp_readonly['observa']) || (isset($bFlagRead_observa) && $bFlagRead_observa))
{
    $this->ajax_return_values_observa(true);
}
$this->NM_ajax_info['event_field'] = 'confirma';
devolucion_ventas_pack_ajax_response();
exit;
$_SESSION['scriptcase']['devolucion_ventas']['contr_erro'] = 'off';
}
function numfacven_onChange()
{
$_SESSION['scriptcase']['devolucion_ventas']['contr_erro'] = 'on';
if (!isset($this->sc_temp_par_numfacventa)) {$this->sc_temp_par_numfacventa = (isset($_SESSION['par_numfacventa'])) ? $_SESSION['par_numfacventa'] : "";}
  
$original_numfacven = $this->numfacven;
$original_resolucion = $this->resolucion;
$original_confirma = $this->confirma;
$original_vparc = $this->vparc;
$original_viva = $this->viva;
$original_vunit = $this->vunit;
$original_vdesc = $this->vdesc;
$original_fechafactura = $this->fechafactura;

$this->sc_temp_par_numfacventa=$this->numfacven ;
$this->nmgp_cmp_hidden["confirma"] = "on"; $this->NM_ajax_info['fieldDisplay']['confirma'] = 'on';
$fac=$this->numfacven ; 
 
      $nm_select = "select subtotal, valoriva, total, asentada, adicional from facturaven where idfacven=$fac"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->des = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 $SCrx->fields[4] = (strpos(strtolower($SCrx->fields[4]), "e")) ? (float)$SCrx->fields[4] : $SCrx->fields[4];
                 $SCrx->fields[4] = (string)$SCrx->fields[4];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->des[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->des = false;
          $this->des_erro = $this->Db->ErrorMsg();
      } 
;
if(!empty($this->des[0][0]))
	{
	$this->vparc =$this->des[0][0];
	$this->viva =$this->des[0][1];
	$this->vunit =$this->des[0][2];
	$this->vdesc =$this->des[0][4];
	if($this->des[0][3]==0)
		{
		$this->nm_mens_alert[] = '¡FACTURA NO ESTÁ ASENTADA, NO SE PUEDE PROCEDER!...                 EDITE LA FACTURA'; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert('¡FACTURA NO ESTÁ ASENTADA, NO SE PUEDE PROCEDER!...                 EDITE LA FACTURA'); }$numfacvent =0;
		$this->sc_temp_par_numfacventa=0;
		$this->vparc =0;
		$this->viva =0;
		$this->vunit =0;
		$this->vdesc =0;
		$this->nmgp_cmp_hidden["confirma"] = "off"; $this->NM_ajax_info['fieldDisplay']['confirma'] = 'off';
		$this->sc_set_focus('numfacvent');
		}
	}
$this->trae_fecha();




if (isset($this->sc_temp_par_numfacventa)) { $_SESSION['par_numfacventa'] = $this->sc_temp_par_numfacventa;}
$_SESSION['scriptcase']['devolucion_ventas']['contr_erro'] = 'off';
$modificado_numfacven = $this->numfacven;
$modificado_resolucion = $this->resolucion;
$modificado_confirma = $this->confirma;
$modificado_vparc = $this->vparc;
$modificado_viva = $this->viva;
$modificado_vunit = $this->vunit;
$modificado_vdesc = $this->vdesc;
$modificado_fechafactura = $this->fechafactura;
$this->nm_formatar_campos('numfacven', 'resolucion', 'confirma', 'vparc', 'viva', 'vunit', 'vdesc', 'fechafactura');
if ($original_numfacven !== $modificado_numfacven || isset($this->nmgp_cmp_readonly['numfacven']) || (isset($bFlagRead_numfacven) && $bFlagRead_numfacven))
{
    $this->ajax_return_values_numfacven(true);
}
if ($original_resolucion !== $modificado_resolucion || isset($this->nmgp_cmp_readonly['resolucion']) || (isset($bFlagRead_resolucion) && $bFlagRead_resolucion))
{
    $this->ajax_return_values_resolucion(true);
}
if ($original_confirma !== $modificado_confirma || isset($this->nmgp_cmp_readonly['confirma']) || (isset($bFlagRead_confirma) && $bFlagRead_confirma))
{
    $this->ajax_return_values_confirma(true);
}
if ($original_vparc !== $modificado_vparc || isset($this->nmgp_cmp_readonly['vparc']) || (isset($bFlagRead_vparc) && $bFlagRead_vparc))
{
    $this->ajax_return_values_vparc(true);
}
if ($original_viva !== $modificado_viva || isset($this->nmgp_cmp_readonly['viva']) || (isset($bFlagRead_viva) && $bFlagRead_viva))
{
    $this->ajax_return_values_viva(true);
}
if ($original_vunit !== $modificado_vunit || isset($this->nmgp_cmp_readonly['vunit']) || (isset($bFlagRead_vunit) && $bFlagRead_vunit))
{
    $this->ajax_return_values_vunit(true);
}
if ($original_vdesc !== $modificado_vdesc || isset($this->nmgp_cmp_readonly['vdesc']) || (isset($bFlagRead_vdesc) && $bFlagRead_vdesc))
{
    $this->ajax_return_values_vdesc(true);
}
if ($original_fechafactura !== $modificado_fechafactura || isset($this->nmgp_cmp_readonly['fechafactura']) || (isset($bFlagRead_fechafactura) && $bFlagRead_fechafactura))
{
    $this->ajax_return_values_fechafactura(true);
}
$this->NM_ajax_info['event_field'] = 'numfacven';
devolucion_ventas_pack_ajax_response();
exit;
}
function resolucion_onChange()
{
$_SESSION['scriptcase']['devolucion_ventas']['contr_erro'] = 'on';
if (!isset($this->sc_temp_idpref)) {$this->sc_temp_idpref = (isset($_SESSION['idpref'])) ? $_SESSION['idpref'] : "";}
  
$original_resolucion = $this->resolucion;

$this->sc_temp_idpref=$this->resolucion ;
$this->sc_set_focus('numfacven');


if (isset($this->sc_temp_idpref)) { $_SESSION['idpref'] = $this->sc_temp_idpref;}
$_SESSION['scriptcase']['devolucion_ventas']['contr_erro'] = 'off';
$modificado_resolucion = $this->resolucion;
$this->nm_formatar_campos('resolucion');
if ($original_resolucion !== $modificado_resolucion || isset($this->nmgp_cmp_readonly['resolucion']) || (isset($bFlagRead_resolucion) && $bFlagRead_resolucion))
{
    $this->ajax_return_values_resolucion(true);
}
$this->NM_ajax_info['event_field'] = 'resolucion';
devolucion_ventas_pack_ajax_response();
exit;
}
function trae_fecha()
{
$_SESSION['scriptcase']['devolucion_ventas']['contr_erro'] = 'on';
  
$id=$this->numfacven ; 
 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20) from facturaven where idfacven=$id"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select convert(char(19),fechaven,121) from facturaven where idfacven=$id"; 
      }
      else
      { 
          $nm_select = "select fechaven from facturaven where idfacven=$id"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->des = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->des[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->des = false;
          $this->des_erro = $this->Db->ErrorMsg();
      } 
;
$this->fechafactura =$this->des[0][0];
$_SESSION['scriptcase']['devolucion_ventas']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              devolucion_ventas_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['retorno_edit'] . "';";
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
    $this->fecha_Dt_min = date('Ymd'); 
    $this->fecha_Dt_max = date('Ymd'); 
    $this->fechafactura_Dt_min = date('Ymd'); 
    $this->fechafactura_Dt_max = date('Ymd'); 
    if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
    $_SESSION['scriptcase']['devolucion_ventas']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_confirma = $this->confirma;
    $original_numfacven = $this->numfacven;
    $original_resolucion = $this->resolucion;
}
if (!isset($this->sc_temp_idpref)) {$this->sc_temp_idpref = (isset($_SESSION['idpref'])) ? $_SESSION['idpref'] : "";}
if (!isset($this->sc_temp_par_numfacventa)) {$this->sc_temp_par_numfacventa = (isset($_SESSION['par_numfacventa'])) ? $_SESSION['par_numfacventa'] : "";}
  $this->numfacven =$this->sc_temp_par_numfacventa;
$this->resolucion =$this->sc_temp_idpref;
if($this->sc_temp_par_numfacventa>0){
$sql="select pagada, asentada, saldo from facturaven where idfacven=$this->sc_temp_par_numfacventa";
 
      $nm_select = $sql;; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
;
if(!empty($this->ds[0][0]))
	{
	if($this->ds[0][1]==1)
		{
		
			$this->sc_set_focus('idpro');
			
		}
	else
		{
		$this->nm_mens_alert[] = '¡FACTURA NO ESTÁ ASENTADA, NO SE PUEDE PROCEDER!...                 EDITE LA FACTURA'; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert('¡FACTURA NO ESTÁ ASENTADA, NO SE PUEDE PROCEDER!...                 EDITE LA FACTURA'); }$numfacvent =0;
		$this->sc_temp_par_numfacventa=0;
		$this->sc_set_focus('numfacvent');
		}
	}
}
$this->nmgp_cmp_hidden["confirma"] = "off"; $this->NM_ajax_info['fieldDisplay']['confirma'] = 'off';
if (isset($this->sc_temp_par_numfacventa)) { $_SESSION['par_numfacventa'] = $this->sc_temp_par_numfacventa;}
if (isset($this->sc_temp_idpref)) { $_SESSION['idpref'] = $this->sc_temp_idpref;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_confirma != $this->confirma || (isset($bFlagRead_confirma) && $bFlagRead_confirma)))
    {
        $this->ajax_return_values_confirma(true);
    }
    if (($original_numfacven != $this->numfacven || (isset($bFlagRead_numfacven) && $bFlagRead_numfacven)))
    {
        $this->ajax_return_values_numfacven(true);
    }
    if (($original_resolucion != $this->resolucion || (isset($bFlagRead_resolucion) && $bFlagRead_resolucion)))
    {
        $this->ajax_return_values_resolucion(true);
    }
}
$_SESSION['scriptcase']['devolucion_ventas']['contr_erro'] = 'off'; 
    }
    if (!empty($this->Campos_Mens_erro)) 
    {
        $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
    }
    $this->nm_guardar_campos();
    $this->nm_formatar_campos();
        $this->initFormPages();
    include_once("devolucion_ventas_form0.php");
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
            $result = preg_replace('/'. $this->nmgp_arg_fast_search .'/i', $htmlIni . '$0' . $htmlFim, $result);
        } elseif ('eq' == $this->nmgp_cond_fast_search) {
            if (strcasecmp($this->nmgp_arg_fast_search, $value) == 0) {
                $result = $htmlIni. $result .$htmlFim;
            }
        }
    }


    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['csrf_token'];
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

   function Form_lookup_resolucion()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_resolucion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_resolucion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_resolucion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_resolucion'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_resolucion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_resolucion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_resolucion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_resolucion'] = array(); 
    }

   $old_value_numerodev = $this->numerodev;
   $old_value_fecha = $this->fecha;
   $old_value_fechafactura = $this->fechafactura;
   $old_value_vdesc = $this->vdesc;
   $old_value_vparc = $this->vparc;
   $old_value_viva = $this->viva;
   $old_value_vunit = $this->vunit;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numerodev = $this->numerodev;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_fechafactura = $this->fechafactura;
   $unformatted_value_vdesc = $this->vdesc;
   $unformatted_value_vparc = $this->vparc;
   $unformatted_value_viva = $this->viva;
   $unformatted_value_vunit = $this->vunit;

   $confirma_val_str = "''";
   if (!empty($this->confirma))
   {
       if (is_array($this->confirma))
       {
           $Tmp_array = $this->confirma;
       }
       else
       {
           $Tmp_array = explode(";", $this->confirma);
       }
       $confirma_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $confirma_val_str)
          {
             $confirma_val_str .= ", ";
          }
          $confirma_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT Idres, prefijo  FROM resdian  ORDER BY Idres";

   $this->numerodev = $old_value_numerodev;
   $this->fecha = $old_value_fecha;
   $this->fechafactura = $old_value_fechafactura;
   $this->vdesc = $old_value_vdesc;
   $this->vparc = $old_value_vparc;
   $this->viva = $old_value_viva;
   $this->vunit = $old_value_vunit;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_resolucion'][] = $rs->fields[0];
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
   function Form_lookup_numfacven()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_numfacven']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_numfacven'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_numfacven']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_numfacven'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_numfacven']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_numfacven'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_numfacven']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_numfacven'] = array(); 
    }

   $old_value_numerodev = $this->numerodev;
   $old_value_fecha = $this->fecha;
   $old_value_fechafactura = $this->fechafactura;
   $old_value_vdesc = $this->vdesc;
   $old_value_vparc = $this->vparc;
   $old_value_viva = $this->viva;
   $old_value_vunit = $this->vunit;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numerodev = $this->numerodev;
   $unformatted_value_fecha = $this->fecha;
   $unformatted_value_fechafactura = $this->fechafactura;
   $unformatted_value_vdesc = $this->vdesc;
   $unformatted_value_vparc = $this->vparc;
   $unformatted_value_viva = $this->viva;
   $unformatted_value_vunit = $this->vunit;

   $nm_comando = "SELECT idfacven, numfacven  FROM facturaven  WHERE resolucion=$this->resolucion ORDER BY numfacven desc";

   $this->numerodev = $old_value_numerodev;
   $this->fecha = $old_value_fecha;
   $this->fechafactura = $old_value_fechafactura;
   $this->vdesc = $old_value_vdesc;
   $this->vparc = $old_value_vparc;
   $this->viva = $old_value_viva;
   $this->vunit = $old_value_vunit;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[1] = str_replace(',', '.', $rs->fields[1]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $rs->fields[1] = (strpos(strtolower($rs->fields[1]), "e")) ? (float)$rs->fields[1] : $rs->fields[1];
              $rs->fields[1] = (string)$rs->fields[1];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['Lookup_numfacven'][] = $rs->fields[0];
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
   function Form_lookup_confirma()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Validar Factura?#? ?#?N?@?";
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
       $nmgp_saida_form = "devolucion_ventas_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['nm_run_menu'] = 2;
       $nmgp_saida_form = "devolucion_ventas_fim.php";
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
       devolucion_ventas_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['masterValue']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['opc_ant'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['devolucion_ventas']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           devolucion_ventas_pack_ajax_response();
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
       devolucion_ventas_pack_ajax_response();
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
                        'numerodev' => 'numerodev',
                        'fecha' => 'fecha',
                        'resolucion' => 'resolucion',
                        'numfacven' => 'numfacven',
                        'fechafactura' => 'fechafactura',
                        'confirma' => 'confirma',
                        'vdesc' => 'vdesc',
                        'vparc' => 'vparc',
                        'viva' => 'viva',
                        'vunit' => 'vunit',
                        'observa' => 'observa',
                       );
        if (isset($aFocus[$sFieldName]))
        {
            $this->NM_ajax_info['focus'] = $aFocus[$sFieldName];
        }
    } // sc_set_focus
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
}
?>
