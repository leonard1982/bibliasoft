<?php
//
class detallecompra_mob_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'         => '',
                                'param'          => array(),
                                'autoComp'       => '',
                                'rsSize'         => '',
                                'msgDisplay'     => '',
                                'errList'        => array(),
                                'fldList'        => array(),
                                'focus'          => '',
                                'navStatus'      => array(),
                                'navSummary'     => array(),
                                'redir'          => array(),
                                'blockDisplay'   => array(),
                                'fieldDisplay'   => array(),
                                'fieldLabel'     => array(),
                                'readOnly'       => array(),
                                'btnVars'        => array(),
                                'ajaxAlert'      => '',
                                'ajaxMessage'    => '',
                                'ajaxJavascript' => array(),
                                'buttonDisplay'  => array(),
                                'calendarReload' => false,
                                'quickSearchRes' => false,
                                'displayMsg'     => false,
                                'displayMsgTxt'  => '',
                                'dyn_search'     => array(),
                                'empty_filter'   => '',
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $iddet;
   var $idfaccom;
   var $idpro;
   var $idbod;
   var $idbod_1;
   var $cantidad;
   var $valorunit;
   var $valorpar;
   var $iva;
   var $descuento;
   var $tasaiva;
   var $tasadesc;
   var $devuelto;
   var $colores;
   var $colores_1;
   var $tallas;
   var $tallas_1;
   var $sabor;
   var $sabor_1;
   var $vencimiento;
   var $lote;
   var $presentacion;
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
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['cantidad']))
          {
              $this->cantidad = $this->NM_ajax_info['param']['cantidad'];
          }
          if (isset($this->NM_ajax_info['param']['colores']))
          {
              $this->colores = $this->NM_ajax_info['param']['colores'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['descuento']))
          {
              $this->descuento = $this->NM_ajax_info['param']['descuento'];
          }
          if (isset($this->NM_ajax_info['param']['devuelto']))
          {
              $this->devuelto = $this->NM_ajax_info['param']['devuelto'];
          }
          if (isset($this->NM_ajax_info['param']['idbod']))
          {
              $this->idbod = $this->NM_ajax_info['param']['idbod'];
          }
          if (isset($this->NM_ajax_info['param']['iddet']))
          {
              $this->iddet = $this->NM_ajax_info['param']['iddet'];
          }
          if (isset($this->NM_ajax_info['param']['idfaccom']))
          {
              $this->idfaccom = $this->NM_ajax_info['param']['idfaccom'];
          }
          if (isset($this->NM_ajax_info['param']['idpro']))
          {
              $this->idpro = $this->NM_ajax_info['param']['idpro'];
          }
          if (isset($this->NM_ajax_info['param']['iva']))
          {
              $this->iva = $this->NM_ajax_info['param']['iva'];
          }
          if (isset($this->NM_ajax_info['param']['lote']))
          {
              $this->lote = $this->NM_ajax_info['param']['lote'];
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
          if (isset($this->NM_ajax_info['param']['presentacion']))
          {
              $this->presentacion = $this->NM_ajax_info['param']['presentacion'];
          }
          if (isset($this->NM_ajax_info['param']['sabor']))
          {
              $this->sabor = $this->NM_ajax_info['param']['sabor'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['tallas']))
          {
              $this->tallas = $this->NM_ajax_info['param']['tallas'];
          }
          if (isset($this->NM_ajax_info['param']['tasadesc']))
          {
              $this->tasadesc = $this->NM_ajax_info['param']['tasadesc'];
          }
          if (isset($this->NM_ajax_info['param']['tasaiva']))
          {
              $this->tasaiva = $this->NM_ajax_info['param']['tasaiva'];
          }
          if (isset($this->NM_ajax_info['param']['valorpar']))
          {
              $this->valorpar = $this->NM_ajax_info['param']['valorpar'];
          }
          if (isset($this->NM_ajax_info['param']['valorunit']))
          {
              $this->valorunit = $this->NM_ajax_info['param']['valorunit'];
          }
          if (isset($this->NM_ajax_info['param']['vencimiento']))
          {
              $this->vencimiento = $this->NM_ajax_info['param']['vencimiento'];
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
      if (isset($this->par_idfaccom) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_idfaccom'] = $this->par_idfaccom;
      }
      if (isset($this->valorpar) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['valorpar'] = $this->valorpar;
      }
      if (isset($this->edit_cantidad) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['edit_cantidad'] = $this->edit_cantidad;
      }
      if (isset($this->cost_ant) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['cost_ant'] = $this->cost_ant;
      }
      if (isset($this->regimen_emp) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['regimen_emp'] = $this->regimen_emp;
      }
      if (isset($this->sw) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['sw'] = $this->sw;
      }
      if (isset($_POST["par_idfaccom"])) 
      {
          $_SESSION['par_idfaccom'] = $this->par_idfaccom;
      }
      if (isset($_POST["valorpar"])) 
      {
          $_SESSION['valorpar'] = $this->valorpar;
      }
      if (isset($_POST["edit_cantidad"])) 
      {
          $_SESSION['edit_cantidad'] = $this->edit_cantidad;
      }
      if (isset($_POST["cost_ant"])) 
      {
          $_SESSION['cost_ant'] = $this->cost_ant;
      }
      if (isset($_POST["regimen_emp"])) 
      {
          $_SESSION['regimen_emp'] = $this->regimen_emp;
      }
      if (isset($_POST["sw"])) 
      {
          $_SESSION['sw'] = $this->sw;
      }
      if (isset($_GET["par_idfaccom"])) 
      {
          $_SESSION['par_idfaccom'] = $this->par_idfaccom;
      }
      if (isset($_GET["valorpar"])) 
      {
          $_SESSION['valorpar'] = $this->valorpar;
      }
      if (isset($_GET["edit_cantidad"])) 
      {
          $_SESSION['edit_cantidad'] = $this->edit_cantidad;
      }
      if (isset($_GET["cost_ant"])) 
      {
          $_SESSION['cost_ant'] = $this->cost_ant;
      }
      if (isset($_GET["regimen_emp"])) 
      {
          $_SESSION['regimen_emp'] = $this->regimen_emp;
      }
      if (isset($_GET["sw"])) 
      {
          $_SESSION['sw'] = $this->sw;
      }
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['detallecompra_mob']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$script_case_init]['detallecompra']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['detallecompra']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['detallecompra']['embutida_parms']);
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
                 nm_limpa_str_detallecompra_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $this->$cadapar[0] = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->par_idfaccom)) 
          {
              $_SESSION['par_idfaccom'] = $this->par_idfaccom;
          }
          if (isset($this->valorpar)) 
          {
              $_SESSION['valorpar'] = $this->valorpar;
          }
          if (isset($this->edit_cantidad)) 
          {
              $_SESSION['edit_cantidad'] = $this->edit_cantidad;
          }
          if (isset($this->cost_ant)) 
          {
              $_SESSION['cost_ant'] = $this->cost_ant;
          }
          if (isset($this->regimen_emp)) 
          {
              $_SESSION['regimen_emp'] = $this->regimen_emp;
          }
          if (isset($this->sw)) 
          {
              $_SESSION['sw'] = $this->sw;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['detallecompra_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['detallecompra_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['detallecompra_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['detallecompra_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->par_idfaccom)) 
          {
              $_SESSION['par_idfaccom'] = $this->par_idfaccom;
          }
          if (isset($this->valorpar)) 
          {
              $_SESSION['valorpar'] = $this->valorpar;
          }
          if (isset($this->edit_cantidad)) 
          {
              $_SESSION['edit_cantidad'] = $this->edit_cantidad;
          }
          if (isset($this->cost_ant)) 
          {
              $_SESSION['cost_ant'] = $this->cost_ant;
          }
          if (isset($this->regimen_emp)) 
          {
              $_SESSION['regimen_emp'] = $this->regimen_emp;
          }
          if (isset($this->sw)) 
          {
              $_SESSION['sw'] = $this->sw;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['detallecompra_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['detallecompra_mob']['parms']);
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
                 $this->$cadapar[0] = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['detallecompra_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['detallecompra_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['detallecompra_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['detallecompra_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['detallecompra_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['detallecompra_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['detallecompra_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new detallecompra_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['initialize'])
          {
              $_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_iva = $this->iva;
    $original_tasaiva = $this->tasaiva;
}
if (!isset($this->sc_temp_regimen_emp)) {$this->sc_temp_regimen_emp = (isset($_SESSION['regimen_emp'])) ? $_SESSION['regimen_emp'] : "";}
                         $sql1="select regimen from datosemp where iddatos=1";
 
      $nm_select = $sql1; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->ds = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
;
$this->sc_temp_regimen_emp=substr($this->ds , 7);
if($this->sc_temp_regimen_emp==0)
	{
	$this->iva =0;
	$this->tasaiva =0;
	$this->nmgp_cmp_hidden["iva"] = "off"; $this->NM_ajax_info['fieldDisplay']['iva'] = 'off';
	}
if (isset($this->sc_temp_regimen_emp)) { $_SESSION['regimen_emp'] = $this->sc_temp_regimen_emp;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_iva != $this->iva || (isset($bFlagRead_iva) && $bFlagRead_iva)))
    {
        $this->ajax_return_values_iva(true);
    }
    if (($original_tasaiva != $this->tasaiva || (isset($bFlagRead_tasaiva) && $bFlagRead_tasaiva)))
    {
        $this->ajax_return_values_tasaiva(true);
    }
}
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'off';
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['detallecompra'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob'][$I_conf]  = $Conf_opt;
              }
          }
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['detallecompra_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['detallecompra_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['detallecompra_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['detallecompra_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['detallecompra_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('detallecompra_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['detallecompra_mob']['label'] = "Editar Item Compra";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "detallecompra_mob")
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
      $this->Db = $this->Ini->Db; 
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
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status      = "scFormInputError";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);


      $this->arr_buttons['tallacolor']['hint']             = "";
      $this->arr_buttons['tallacolor']['type']             = "button";
      $this->arr_buttons['tallacolor']['value']            = "Activar Talla/Color";
      $this->arr_buttons['tallacolor']['display']          = "only_text";
      $this->arr_buttons['tallacolor']['display_position'] = "text_right";
      $this->arr_buttons['tallacolor']['style']            = "default";
      $this->arr_buttons['tallacolor']['image']            = "";

      $this->arr_buttons['group_group_2']= array(
          'value'            => "" . $this->Ini->Nm_lang['lang_btns_options'] . "",
          'hint'             => "" . $this->Ini->Nm_lang['lang_btns_options'] . "",
          'type'             => "button",
          'display'          => "text_img",
          'display_position' => "text_right",
          'image'            => "scriptcase__NM__gear.png",
          'style'            => "default",
      );


      $_SESSION['scriptcase']['error_icon']['detallecompra_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__icnMensagemAlerta.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['detallecompra_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['goto']      = 'on';
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
      $this->nmgp_botoes['tallacolor'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['where_orig'] = " where idfaccom=" . $_SESSION['par_idfaccom'] . "
and cantidad >0";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['where_pesq'] = " where idfaccom=" . $_SESSION['par_idfaccom'] . "
and cantidad >0";
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['dados_form'];
          if (!isset($this->iddet)){$this->iddet = $this->nmgp_dados_form['iddet'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("detallecompra_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'detallecompra/detallecompra_mob_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'detallecompra_mob_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'detallecompra_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'detallecompra_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'detallecompra/detallecompra_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "detallecompra_mob_erro.class.php"); 
      }
      $this->Erro      = new detallecompra_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['opcao']))
         { 
             if ($this->iddet != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['tallacolor'] = "on";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['tallacolor'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['botoes']['tallacolor'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
      if (isset($this->idfaccom)) { $this->nm_limpa_alfa($this->idfaccom); }
      if (isset($this->idpro)) { $this->nm_limpa_alfa($this->idpro); }
      if (isset($this->idbod)) { $this->nm_limpa_alfa($this->idbod); }
      if (isset($this->cantidad)) { $this->nm_limpa_alfa($this->cantidad); }
      if (isset($this->valorunit)) { $this->nm_limpa_alfa($this->valorunit); }
      if (isset($this->valorpar)) { $this->nm_limpa_alfa($this->valorpar); }
      if (isset($this->iva)) { $this->nm_limpa_alfa($this->iva); }
      if (isset($this->descuento)) { $this->nm_limpa_alfa($this->descuento); }
      if (isset($this->tasaiva)) { $this->nm_limpa_alfa($this->tasaiva); }
      if (isset($this->tasadesc)) { $this->nm_limpa_alfa($this->tasadesc); }
      if (isset($this->devuelto)) { $this->nm_limpa_alfa($this->devuelto); }
      if (isset($this->colores)) { $this->nm_limpa_alfa($this->colores); }
      if (isset($this->tallas)) { $this->nm_limpa_alfa($this->tallas); }
      if (isset($this->sabor)) { $this->nm_limpa_alfa($this->sabor); }
      if (isset($this->lote)) { $this->nm_limpa_alfa($this->lote); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- idfaccom
      $this->field_config['idfaccom']               = array();
      $this->field_config['idfaccom']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idfaccom']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idfaccom']['symbol_dec'] = '';
      $this->field_config['idfaccom']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idfaccom']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- cantidad
      $this->field_config['cantidad']               = array();
      $this->field_config['cantidad']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cantidad']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cantidad']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['cantidad']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cantidad']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- valorunit
      $this->field_config['valorunit']               = array();
      $this->field_config['valorunit']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['valorunit']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valorunit']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['valorunit']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['valorunit']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['valorunit']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- valorpar
      $this->field_config['valorpar']               = array();
      $this->field_config['valorpar']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['valorpar']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valorpar']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['valorpar']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['valorpar']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['valorpar']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- iva
      $this->field_config['iva']               = array();
      $this->field_config['iva']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['iva']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['iva']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['iva']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['iva']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['iva']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- descuento
      $this->field_config['descuento']               = array();
      $this->field_config['descuento']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['descuento']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['descuento']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['descuento']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['descuento']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['descuento']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- tasaiva
      $this->field_config['tasaiva']               = array();
      $this->field_config['tasaiva']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['tasaiva']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['tasaiva']['symbol_dec'] = '';
      $this->field_config['tasaiva']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['tasaiva']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- tasadesc
      $this->field_config['tasadesc']               = array();
      $this->field_config['tasadesc']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['tasadesc']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['tasadesc']['symbol_dec'] = '';
      $this->field_config['tasadesc']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['tasadesc']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- devuelto
      $this->field_config['devuelto']               = array();
      $this->field_config['devuelto']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['devuelto']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['devuelto']['symbol_dec'] = '';
      $this->field_config['devuelto']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['devuelto']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- vencimiento
      $this->field_config['vencimiento']                 = array();
      $this->field_config['vencimiento']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['vencimiento']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['vencimiento']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'vencimiento');
      //-- iddet
      $this->field_config['iddet']               = array();
      $this->field_config['iddet']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['iddet']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['iddet']['symbol_dec'] = '';
      $this->field_config['iddet']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['iddet']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
          if ('validate_idfaccom' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idfaccom');
          }
          if ('validate_idpro' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idpro');
          }
          if ('validate_colores' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'colores');
          }
          if ('validate_tallas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tallas');
          }
          if ('validate_sabor' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sabor');
          }
          if ('validate_cantidad' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cantidad');
          }
          if ('validate_presentacion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'presentacion');
          }
          if ('validate_valorunit' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valorunit');
          }
          if ('validate_valorpar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valorpar');
          }
          if ('validate_iva' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'iva');
          }
          if ('validate_idbod' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idbod');
          }
          if ('validate_descuento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'descuento');
          }
          if ('validate_tasaiva' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tasaiva');
          }
          if ('validate_tasadesc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tasadesc');
          }
          if ('validate_devuelto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'devuelto');
          }
          if ('validate_vencimiento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'vencimiento');
          }
          if ('validate_lote' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'lote');
          }
          detallecompra_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_cantidad_onchange' == $this->NM_ajax_opcao)
          {
              $this->cantidad_onChange();
          }
          if ('event_cantidad_onfocus' == $this->NM_ajax_opcao)
          {
              $this->cantidad_onFocus();
          }
          if ('event_colores_onchange' == $this->NM_ajax_opcao)
          {
              $this->colores_onChange();
          }
          if ('event_idpro_onchange' == $this->NM_ajax_opcao)
          {
              $this->idpro_onChange();
          }
          if ('event_sabor_onchange' == $this->NM_ajax_opcao)
          {
              $this->sabor_onChange();
          }
          if ('event_tallas_onchange' == $this->NM_ajax_opcao)
          {
              $this->tallas_onChange();
          }
          if ('event_valorunit_onchange' == $this->NM_ajax_opcao)
          {
              $this->valorunit_onChange();
          }
          detallecompra_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('autocomp_idpro' == $this->NM_ajax_opcao)
          {
              $this->idpro = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_idpro']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_idpro'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_idpro']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_idpro'] = array(); 
    }

   $old_value_idfaccom = $this->idfaccom;
   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_valorpar = $this->valorpar;
   $old_value_iva = $this->iva;
   $old_value_descuento = $this->descuento;
   $old_value_tasaiva = $this->tasaiva;
   $old_value_tasadesc = $this->tasadesc;
   $old_value_devuelto = $this->devuelto;
   $old_value_vencimiento = $this->vencimiento;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_tasaiva = $this->tasaiva;
   $unformatted_value_tasadesc = $this->tasadesc;
   $unformatted_value_devuelto = $this->devuelto;
   $unformatted_value_vencimiento = $this->vencimiento;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro FROM productos WHERE codigobar + \" - \" + nompro LIKE '%" . substr($this->Db->qstr($this->idpro), 1, -1) . "%' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idprod, concat(codigobar, \" - \",nompro) FROM productos WHERE concat(codigobar, \" - \",nompro) LIKE '%" . substr($this->Db->qstr($this->idpro), 1, -1) . "%' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idprod, codigobar&\" - \"&nompro FROM productos WHERE codigobar&\" - \"&nompro LIKE '%" . substr($this->Db->qstr($this->idpro), 1, -1) . "%' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE codigobar||\" - \"||nompro LIKE '%" . substr($this->Db->qstr($this->idpro), 1, -1) . "%' ORDER BY codigobar, nompro";
   }
   else
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE codigobar||\" - \"||nompro LIKE '%" . substr($this->Db->qstr($this->idpro), 1, -1) . "%' ORDER BY codigobar, nompro";
   }

   $this->idfaccom = $old_value_idfaccom;
   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->valorpar = $old_value_valorpar;
   $this->iva = $old_value_iva;
   $this->descuento = $old_value_descuento;
   $this->tasaiva = $old_value_tasaiva;
   $this->tasadesc = $old_value_tasadesc;
   $this->devuelto = $old_value_devuelto;
   $this->vencimiento = $old_value_vencimiento;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(detallecompra_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => detallecompra_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_idpro'][] = $rs->fields[0];
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
                      $aResponse[] = array('label' => $sLkpValue, 'value' => $sLkpIndex);
                  }
              }
              $oJson = new Services_JSON();
              echo $oJson->encode($aResponse);
              exit;
          }
          detallecompra_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['inline_form_seq'] = $this->sc_seq_row;
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
              detallecompra_mob_pack_ajax_response();
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
          $_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  detallecompra_mob_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_iva = $this->iva;
    $original_tasaiva = $this->tasaiva;
}
if (!isset($this->sc_temp_regimen_emp)) {$this->sc_temp_regimen_emp = (isset($_SESSION['regimen_emp'])) ? $_SESSION['regimen_emp'] : "";}
                         if($this->sc_temp_regimen_emp==0)
	{
	$this->iva =0;
	$this->tasaiva =0;
	$this->nmgp_cmp_hidden["iva"] = "off"; $this->NM_ajax_info['fieldDisplay']['iva'] = 'off';
	}
if (isset($this->sc_temp_regimen_emp)) { $_SESSION['regimen_emp'] = $this->sc_temp_regimen_emp;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_iva != $this->iva || (isset($bFlagRead_iva) && $bFlagRead_iva)))
    {
        $this->ajax_return_values_iva(true);
    }
    if (($original_tasaiva != $this->tasaiva || (isset($bFlagRead_tasaiva) && $bFlagRead_tasaiva)))
    {
        $this->ajax_return_values_tasaiva(true);
    }
}
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'off'; 
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          detallecompra_mob_pack_ajax_response();
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
          detallecompra_mob_pack_ajax_response();
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
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "&script_case_session=" . session_id() . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
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

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'idfaccom':
               return "Idfaccom";
               break;
           case 'idpro':
               return "Producto";
               break;
           case 'colores':
               return "Color";
               break;
           case 'tallas':
               return "Talla";
               break;
           case 'sabor':
               return "Sabor";
               break;
           case 'cantidad':
               return "Cantidad";
               break;
           case 'presentacion':
               return "Presentación";
               break;
           case 'valorunit':
               return "Costo unitario";
               break;
           case 'valorpar':
               return "Subtotal";
               break;
           case 'iva':
               return "Valor de IVA";
               break;
           case 'idbod':
               return "Ubicación";
               break;
           case 'descuento':
               return "Descuento";
               break;
           case 'tasaiva':
               return "Tasaiva";
               break;
           case 'tasadesc':
               return "Tasadesc";
               break;
           case 'devuelto':
               return "Devuelto";
               break;
           case 'vencimiento':
               return "Vence";
               break;
           case 'lote':
               return "Lote";
               break;
           case 'iddet':
               return "Iddet";
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
              if (!isset($this->NM_ajax_info['errList']['geral_detallecompra_mob']) || !is_array($this->NM_ajax_info['errList']['geral_detallecompra_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_detallecompra_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_detallecompra_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'idfaccom' == $filtro)
        $this->ValidateField_idfaccom($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idpro' == $filtro)
        $this->ValidateField_idpro($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'colores' == $filtro)
        $this->ValidateField_colores($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tallas' == $filtro)
        $this->ValidateField_tallas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sabor' == $filtro)
        $this->ValidateField_sabor($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cantidad' == $filtro)
        $this->ValidateField_cantidad($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'presentacion' == $filtro)
        $this->ValidateField_presentacion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valorunit' == $filtro)
        $this->ValidateField_valorunit($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valorpar' == $filtro)
        $this->ValidateField_valorpar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'iva' == $filtro)
        $this->ValidateField_iva($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idbod' == $filtro)
        $this->ValidateField_idbod($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'descuento' == $filtro)
        $this->ValidateField_descuento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tasaiva' == $filtro)
        $this->ValidateField_tasaiva($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tasadesc' == $filtro)
        $this->ValidateField_tasadesc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'devuelto' == $filtro)
        $this->ValidateField_devuelto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'vencimiento' == $filtro)
        $this->ValidateField_vencimiento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'lote' == $filtro)
        $this->ValidateField_lote($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_idfaccom(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_numero($this->idfaccom, $this->field_config['idfaccom']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->idfaccom != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->idfaccom) > $iTestSize)  
              { 
                  $Campos_Crit .= "Idfaccom: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['idfaccom']))
                  {
                      $Campos_Erros['idfaccom'] = array();
                  }
                  $Campos_Erros['idfaccom'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['idfaccom']) || !is_array($this->NM_ajax_info['errList']['idfaccom']))
                  {
                      $this->NM_ajax_info['errList']['idfaccom'] = array();
                  }
                  $this->NM_ajax_info['errList']['idfaccom'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->idfaccom, 20, 0, -0, 1.0E+20, "N") == false)  
              { 
                  $Campos_Crit .= "Idfaccom; " ; 
                  if (!isset($Campos_Erros['idfaccom']))
                  {
                      $Campos_Erros['idfaccom'] = array();
                  }
                  $Campos_Erros['idfaccom'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['idfaccom']) || !is_array($this->NM_ajax_info['errList']['idfaccom']))
                  {
                      $this->NM_ajax_info['errList']['idfaccom'] = array();
                  }
                  $this->NM_ajax_info['errList']['idfaccom'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['php_cmp_required']['idfaccom']) || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['php_cmp_required']['idfaccom'] == "on") 
           { 
              $Campos_Falta[] = "Idfaccom" ; 
              if (!isset($Campos_Erros['idfaccom']))
              {
                  $Campos_Erros['idfaccom'] = array();
              }
              $Campos_Erros['idfaccom'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['idfaccom']) || !is_array($this->NM_ajax_info['errList']['idfaccom']))
                  {
                      $this->NM_ajax_info['errList']['idfaccom'] = array();
                  }
                  $this->NM_ajax_info['errList']['idfaccom'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
    } // ValidateField_idfaccom

    function ValidateField_idpro(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      $this->idpro = sc_strtoupper($this->idpro); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->idpro) > 10) 
          { 
              $Campos_Crit .= "Producto " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['idpro']))
              {
                  $Campos_Erros['idpro'] = array();
              }
              $Campos_Erros['idpro'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['idpro']) || !is_array($this->NM_ajax_info['errList']['idpro']))
              {
                  $this->NM_ajax_info['errList']['idpro'] = array();
              }
              $this->NM_ajax_info['errList']['idpro'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_idpro

    function ValidateField_colores(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->colores) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_colores']) && !in_array($this->colores, $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_colores']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['colores']))
                   {
                       $Campos_Erros['colores'] = array();
                   }
                   $Campos_Erros['colores'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['colores']) || !is_array($this->NM_ajax_info['errList']['colores']))
                   {
                       $this->NM_ajax_info['errList']['colores'] = array();
                   }
                   $this->NM_ajax_info['errList']['colores'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_colores

    function ValidateField_tallas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->tallas) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_tallas']) && !in_array($this->tallas, $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_tallas']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['tallas']))
                   {
                       $Campos_Erros['tallas'] = array();
                   }
                   $Campos_Erros['tallas'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['tallas']) || !is_array($this->NM_ajax_info['errList']['tallas']))
                   {
                       $this->NM_ajax_info['errList']['tallas'] = array();
                   }
                   $this->NM_ajax_info['errList']['tallas'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_tallas

    function ValidateField_sabor(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->sabor) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_sabor']) && !in_array($this->sabor, $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_sabor']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['sabor']))
                   {
                       $Campos_Erros['sabor'] = array();
                   }
                   $Campos_Erros['sabor'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['sabor']) || !is_array($this->NM_ajax_info['errList']['sabor']))
                   {
                       $this->NM_ajax_info['errList']['sabor'] = array();
                   }
                   $this->NM_ajax_info['errList']['sabor'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_sabor

    function ValidateField_cantidad(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->cantidad == "")  
      { 
          $this->cantidad = 0;
          $this->sc_force_zero[] = 'cantidad';
      } 
      if (!empty($this->field_config['cantidad']['symbol_dec']))
      {
          nm_limpa_valor($this->cantidad, $this->field_config['cantidad']['symbol_dec'], $this->field_config['cantidad']['symbol_grp']) ; 
          if ('.' == substr($this->cantidad, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->cantidad, 1)))
              {
                  $this->cantidad = '';
              }
              else
              {
                  $this->cantidad = '0' . $this->cantidad;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->cantidad != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->cantidad) > $iTestSize)  
              { 
                  $Campos_Crit .= "Cantidad: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cantidad']))
                  {
                      $Campos_Erros['cantidad'] = array();
                  }
                  $Campos_Erros['cantidad'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cantidad']) || !is_array($this->NM_ajax_info['errList']['cantidad']))
                  {
                      $this->NM_ajax_info['errList']['cantidad'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidad'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cantidad, 10, 2, -0, 999999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Cantidad; " ; 
                  if (!isset($Campos_Erros['cantidad']))
                  {
                      $Campos_Erros['cantidad'] = array();
                  }
                  $Campos_Erros['cantidad'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cantidad']) || !is_array($this->NM_ajax_info['errList']['cantidad']))
                  {
                      $this->NM_ajax_info['errList']['cantidad'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidad'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_cantidad

    function ValidateField_presentacion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->presentacion) != "")  
          { 
          } 
      } 
    } // ValidateField_presentacion

    function ValidateField_valorunit(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->valorunit == "")  
      { 
          $this->valorunit = 0;
          $this->sc_force_zero[] = 'valorunit';
      } 
      if (!empty($this->field_config['valorunit']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valorunit, $this->field_config['valorunit']['symbol_dec'], $this->field_config['valorunit']['symbol_grp'], $this->field_config['valorunit']['symbol_mon']); 
          nm_limpa_valor($this->valorunit, $this->field_config['valorunit']['symbol_dec'], $this->field_config['valorunit']['symbol_grp']) ; 
          if ('.' == substr($this->valorunit, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->valorunit, 1)))
              {
                  $this->valorunit = '';
              }
              else
              {
                  $this->valorunit = '0' . $this->valorunit;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->valorunit != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->valorunit) > $iTestSize)  
              { 
                  $Campos_Crit .= "Costo unitario: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valorunit']))
                  {
                      $Campos_Erros['valorunit'] = array();
                  }
                  $Campos_Erros['valorunit'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valorunit']) || !is_array($this->NM_ajax_info['errList']['valorunit']))
                  {
                      $this->NM_ajax_info['errList']['valorunit'] = array();
                  }
                  $this->NM_ajax_info['errList']['valorunit'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valorunit, 12, 0, -0, 999999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Costo unitario; " ; 
                  if (!isset($Campos_Erros['valorunit']))
                  {
                      $Campos_Erros['valorunit'] = array();
                  }
                  $Campos_Erros['valorunit'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valorunit']) || !is_array($this->NM_ajax_info['errList']['valorunit']))
                  {
                      $this->NM_ajax_info['errList']['valorunit'] = array();
                  }
                  $this->NM_ajax_info['errList']['valorunit'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_valorunit

    function ValidateField_valorpar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->valorpar == "")  
      { 
          $this->valorpar = 0;
          $this->sc_force_zero[] = 'valorpar';
      } 
      if (!empty($this->field_config['valorpar']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valorpar, $this->field_config['valorpar']['symbol_dec'], $this->field_config['valorpar']['symbol_grp'], $this->field_config['valorpar']['symbol_mon']); 
          nm_limpa_valor($this->valorpar, $this->field_config['valorpar']['symbol_dec'], $this->field_config['valorpar']['symbol_grp']) ; 
          if ('.' == substr($this->valorpar, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->valorpar, 1)))
              {
                  $this->valorpar = '';
              }
              else
              {
                  $this->valorpar = '0' . $this->valorpar;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->valorpar != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->valorpar) > $iTestSize)  
              { 
                  $Campos_Crit .= "Subtotal: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valorpar']))
                  {
                      $Campos_Erros['valorpar'] = array();
                  }
                  $Campos_Erros['valorpar'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valorpar']) || !is_array($this->NM_ajax_info['errList']['valorpar']))
                  {
                      $this->NM_ajax_info['errList']['valorpar'] = array();
                  }
                  $this->NM_ajax_info['errList']['valorpar'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valorpar, 12, 0, -0, 999999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Subtotal; " ; 
                  if (!isset($Campos_Erros['valorpar']))
                  {
                      $Campos_Erros['valorpar'] = array();
                  }
                  $Campos_Erros['valorpar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valorpar']) || !is_array($this->NM_ajax_info['errList']['valorpar']))
                  {
                      $this->NM_ajax_info['errList']['valorpar'] = array();
                  }
                  $this->NM_ajax_info['errList']['valorpar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_valorpar

    function ValidateField_iva(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->iva == "")  
      { 
          $this->iva = 0;
          $this->sc_force_zero[] = 'iva';
      } 
      if (!empty($this->field_config['iva']['symbol_dec']))
      {
          $this->sc_remove_currency($this->iva, $this->field_config['iva']['symbol_dec'], $this->field_config['iva']['symbol_grp'], $this->field_config['iva']['symbol_mon']); 
          nm_limpa_valor($this->iva, $this->field_config['iva']['symbol_dec'], $this->field_config['iva']['symbol_grp']) ; 
          if ('.' == substr($this->iva, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->iva, 1)))
              {
                  $this->iva = '';
              }
              else
              {
                  $this->iva = '0' . $this->iva;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->iva != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->iva) > $iTestSize)  
              { 
                  $Campos_Crit .= "Valor de IVA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['iva']))
                  {
                      $Campos_Erros['iva'] = array();
                  }
                  $Campos_Erros['iva'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['iva']) || !is_array($this->NM_ajax_info['errList']['iva']))
                  {
                      $this->NM_ajax_info['errList']['iva'] = array();
                  }
                  $this->NM_ajax_info['errList']['iva'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->iva, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Valor de IVA; " ; 
                  if (!isset($Campos_Erros['iva']))
                  {
                      $Campos_Erros['iva'] = array();
                  }
                  $Campos_Erros['iva'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['iva']) || !is_array($this->NM_ajax_info['errList']['iva']))
                  {
                      $this->NM_ajax_info['errList']['iva'] = array();
                  }
                  $this->NM_ajax_info['errList']['iva'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_iva

    function ValidateField_idbod(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->idbod == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['php_cmp_required']['idbod']) || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['php_cmp_required']['idbod'] == "on"))
      {
          $Campos_Falta[] = "Ubicación" ; 
          if (!isset($Campos_Erros['idbod']))
          {
              $Campos_Erros['idbod'] = array();
          }
          $Campos_Erros['idbod'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['idbod']) || !is_array($this->NM_ajax_info['errList']['idbod']))
          {
              $this->NM_ajax_info['errList']['idbod'] = array();
          }
          $this->NM_ajax_info['errList']['idbod'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->idbod) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_idbod']) && !in_array($this->idbod, $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_idbod']))
          {
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
    } // ValidateField_idbod

    function ValidateField_descuento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->descuento == "")  
      { 
          $this->descuento = 0;
          $this->sc_force_zero[] = 'descuento';
      } 
      if (!empty($this->field_config['descuento']['symbol_dec']))
      {
          $this->sc_remove_currency($this->descuento, $this->field_config['descuento']['symbol_dec'], $this->field_config['descuento']['symbol_grp'], $this->field_config['descuento']['symbol_mon']); 
          nm_limpa_valor($this->descuento, $this->field_config['descuento']['symbol_dec'], $this->field_config['descuento']['symbol_grp']) ; 
          if ('.' == substr($this->descuento, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->descuento, 1)))
              {
                  $this->descuento = '';
              }
              else
              {
                  $this->descuento = '0' . $this->descuento;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->descuento != '')  
          { 
              $iTestSize = 7;
              if (strlen($this->descuento) > $iTestSize)  
              { 
                  $Campos_Crit .= "Descuento: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['descuento']))
                  {
                      $Campos_Erros['descuento'] = array();
                  }
                  $Campos_Erros['descuento'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['descuento']) || !is_array($this->NM_ajax_info['errList']['descuento']))
                  {
                      $this->NM_ajax_info['errList']['descuento'] = array();
                  }
                  $this->NM_ajax_info['errList']['descuento'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->descuento, 6, 0, -0, 999999, "N") == false)  
              { 
                  $Campos_Crit .= "Descuento; " ; 
                  if (!isset($Campos_Erros['descuento']))
                  {
                      $Campos_Erros['descuento'] = array();
                  }
                  $Campos_Erros['descuento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['descuento']) || !is_array($this->NM_ajax_info['errList']['descuento']))
                  {
                      $this->NM_ajax_info['errList']['descuento'] = array();
                  }
                  $this->NM_ajax_info['errList']['descuento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_descuento

    function ValidateField_tasaiva(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->tasaiva == "")  
      { 
          $this->tasaiva = 0;
          $this->sc_force_zero[] = 'tasaiva';
      } 
      nm_limpa_numero($this->tasaiva, $this->field_config['tasaiva']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->tasaiva != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->tasaiva) > $iTestSize)  
              { 
                  $Campos_Crit .= "Tasaiva: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['tasaiva']))
                  {
                      $Campos_Erros['tasaiva'] = array();
                  }
                  $Campos_Erros['tasaiva'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['tasaiva']) || !is_array($this->NM_ajax_info['errList']['tasaiva']))
                  {
                      $this->NM_ajax_info['errList']['tasaiva'] = array();
                  }
                  $this->NM_ajax_info['errList']['tasaiva'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->tasaiva, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Tasaiva; " ; 
                  if (!isset($Campos_Erros['tasaiva']))
                  {
                      $Campos_Erros['tasaiva'] = array();
                  }
                  $Campos_Erros['tasaiva'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['tasaiva']) || !is_array($this->NM_ajax_info['errList']['tasaiva']))
                  {
                      $this->NM_ajax_info['errList']['tasaiva'] = array();
                  }
                  $this->NM_ajax_info['errList']['tasaiva'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_tasaiva

    function ValidateField_tasadesc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->tasadesc == "")  
      { 
          $this->tasadesc = 0;
          $this->sc_force_zero[] = 'tasadesc';
      } 
      nm_limpa_numero($this->tasadesc, $this->field_config['tasadesc']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->tasadesc != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->tasadesc) > $iTestSize)  
              { 
                  $Campos_Crit .= "Tasadesc: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['tasadesc']))
                  {
                      $Campos_Erros['tasadesc'] = array();
                  }
                  $Campos_Erros['tasadesc'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['tasadesc']) || !is_array($this->NM_ajax_info['errList']['tasadesc']))
                  {
                      $this->NM_ajax_info['errList']['tasadesc'] = array();
                  }
                  $this->NM_ajax_info['errList']['tasadesc'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->tasadesc, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Tasadesc; " ; 
                  if (!isset($Campos_Erros['tasadesc']))
                  {
                      $Campos_Erros['tasadesc'] = array();
                  }
                  $Campos_Erros['tasadesc'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['tasadesc']) || !is_array($this->NM_ajax_info['errList']['tasadesc']))
                  {
                      $this->NM_ajax_info['errList']['tasadesc'] = array();
                  }
                  $this->NM_ajax_info['errList']['tasadesc'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_tasadesc

    function ValidateField_devuelto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->devuelto == "")  
      { 
          $this->devuelto = 0;
          $this->sc_force_zero[] = 'devuelto';
      } 
      nm_limpa_numero($this->devuelto, $this->field_config['devuelto']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->devuelto != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->devuelto) > $iTestSize)  
              { 
                  $Campos_Crit .= "Devuelto: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['devuelto']))
                  {
                      $Campos_Erros['devuelto'] = array();
                  }
                  $Campos_Erros['devuelto'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['devuelto']) || !is_array($this->NM_ajax_info['errList']['devuelto']))
                  {
                      $this->NM_ajax_info['errList']['devuelto'] = array();
                  }
                  $this->NM_ajax_info['errList']['devuelto'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->devuelto, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Devuelto; " ; 
                  if (!isset($Campos_Erros['devuelto']))
                  {
                      $Campos_Erros['devuelto'] = array();
                  }
                  $Campos_Erros['devuelto'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['devuelto']) || !is_array($this->NM_ajax_info['errList']['devuelto']))
                  {
                      $this->NM_ajax_info['errList']['devuelto'] = array();
                  }
                  $this->NM_ajax_info['errList']['devuelto'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_devuelto

    function ValidateField_vencimiento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->vencimiento, $this->field_config['vencimiento']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['vencimiento']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['vencimiento']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['vencimiento']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['vencimiento']['date_sep']) ; 
          if (trim($this->vencimiento) != "")  
          { 
              if ($teste_validade->Data($this->vencimiento, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Vence; " ; 
                  if (!isset($Campos_Erros['vencimiento']))
                  {
                      $Campos_Erros['vencimiento'] = array();
                  }
                  $Campos_Erros['vencimiento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['vencimiento']) || !is_array($this->NM_ajax_info['errList']['vencimiento']))
                  {
                      $this->NM_ajax_info['errList']['vencimiento'] = array();
                  }
                  $this->NM_ajax_info['errList']['vencimiento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['vencimiento']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_vencimiento

    function ValidateField_lote(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      $this->lote = sc_strtoupper($this->lote); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->lote) > 20) 
          { 
              $Campos_Crit .= "Lote " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['lote']))
              {
                  $Campos_Erros['lote'] = array();
              }
              $Campos_Erros['lote'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['lote']) || !is_array($this->NM_ajax_info['errList']['lote']))
              {
                  $this->NM_ajax_info['errList']['lote'] = array();
              }
              $this->NM_ajax_info['errList']['lote'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_lote

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
    $this->nmgp_dados_form['idfaccom'] = $this->idfaccom;
    $this->nmgp_dados_form['idpro'] = $this->idpro;
    $this->nmgp_dados_form['colores'] = $this->colores;
    $this->nmgp_dados_form['tallas'] = $this->tallas;
    $this->nmgp_dados_form['sabor'] = $this->sabor;
    $this->nmgp_dados_form['cantidad'] = $this->cantidad;
    $this->nmgp_dados_form['presentacion'] = $this->presentacion;
    $this->nmgp_dados_form['valorunit'] = $this->valorunit;
    $this->nmgp_dados_form['valorpar'] = $this->valorpar;
    $this->nmgp_dados_form['iva'] = $this->iva;
    $this->nmgp_dados_form['idbod'] = $this->idbod;
    $this->nmgp_dados_form['descuento'] = $this->descuento;
    $this->nmgp_dados_form['tasaiva'] = $this->tasaiva;
    $this->nmgp_dados_form['tasadesc'] = $this->tasadesc;
    $this->nmgp_dados_form['devuelto'] = $this->devuelto;
    $this->nmgp_dados_form['vencimiento'] = $this->vencimiento;
    $this->nmgp_dados_form['lote'] = $this->lote;
    $this->nmgp_dados_form['iddet'] = $this->iddet;
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_numero($this->idfaccom, $this->field_config['idfaccom']['symbol_grp']) ; 
      if (!empty($this->field_config['cantidad']['symbol_dec']))
      {
         nm_limpa_valor($this->cantidad, $this->field_config['cantidad']['symbol_dec'], $this->field_config['cantidad']['symbol_grp']);
      }
      if (!empty($this->field_config['valorunit']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valorunit, $this->field_config['valorunit']['symbol_dec'], $this->field_config['valorunit']['symbol_grp'], $this->field_config['valorunit']['symbol_mon']);
         nm_limpa_valor($this->valorunit, $this->field_config['valorunit']['symbol_dec'], $this->field_config['valorunit']['symbol_grp']);
      }
      if (!empty($this->field_config['valorpar']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valorpar, $this->field_config['valorpar']['symbol_dec'], $this->field_config['valorpar']['symbol_grp'], $this->field_config['valorpar']['symbol_mon']);
         nm_limpa_valor($this->valorpar, $this->field_config['valorpar']['symbol_dec'], $this->field_config['valorpar']['symbol_grp']);
      }
      if (!empty($this->field_config['iva']['symbol_dec']))
      {
         $this->sc_remove_currency($this->iva, $this->field_config['iva']['symbol_dec'], $this->field_config['iva']['symbol_grp'], $this->field_config['iva']['symbol_mon']);
         nm_limpa_valor($this->iva, $this->field_config['iva']['symbol_dec'], $this->field_config['iva']['symbol_grp']);
      }
      if (!empty($this->field_config['descuento']['symbol_dec']))
      {
         $this->sc_remove_currency($this->descuento, $this->field_config['descuento']['symbol_dec'], $this->field_config['descuento']['symbol_grp'], $this->field_config['descuento']['symbol_mon']);
         nm_limpa_valor($this->descuento, $this->field_config['descuento']['symbol_dec'], $this->field_config['descuento']['symbol_grp']);
      }
      nm_limpa_numero($this->tasaiva, $this->field_config['tasaiva']['symbol_grp']) ; 
      nm_limpa_numero($this->tasadesc, $this->field_config['tasadesc']['symbol_grp']) ; 
      nm_limpa_numero($this->devuelto, $this->field_config['devuelto']['symbol_grp']) ; 
      nm_limpa_data($this->vencimiento, $this->field_config['vencimiento']['date_sep']) ; 
      nm_limpa_numero($this->iddet, $this->field_config['iddet']['symbol_grp']) ; 
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
       $value = preg_replace('~&#x0*([0-9a-f]+);~ei', '', $value);
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
      if ($Nome_Campo == "idfaccom")
      {
          nm_limpa_numero($this->idfaccom, $this->field_config['idfaccom']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "cantidad")
      {
          if (!empty($this->field_config['cantidad']['symbol_dec']))
          {
             nm_limpa_valor($this->cantidad, $this->field_config['cantidad']['symbol_dec'], $this->field_config['cantidad']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "valorunit")
      {
          if (!empty($this->field_config['valorunit']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valorunit, $this->field_config['valorunit']['symbol_dec'], $this->field_config['valorunit']['symbol_grp'], $this->field_config['valorunit']['symbol_mon']);
             nm_limpa_valor($this->valorunit, $this->field_config['valorunit']['symbol_dec'], $this->field_config['valorunit']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "valorpar")
      {
          if (!empty($this->field_config['valorpar']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valorpar, $this->field_config['valorpar']['symbol_dec'], $this->field_config['valorpar']['symbol_grp'], $this->field_config['valorpar']['symbol_mon']);
             nm_limpa_valor($this->valorpar, $this->field_config['valorpar']['symbol_dec'], $this->field_config['valorpar']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "iva")
      {
          if (!empty($this->field_config['iva']['symbol_dec']))
          {
             $this->sc_remove_currency($this->iva, $this->field_config['iva']['symbol_dec'], $this->field_config['iva']['symbol_grp'], $this->field_config['iva']['symbol_mon']);
             nm_limpa_valor($this->iva, $this->field_config['iva']['symbol_dec'], $this->field_config['iva']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "descuento")
      {
          if (!empty($this->field_config['descuento']['symbol_dec']))
          {
             $this->sc_remove_currency($this->descuento, $this->field_config['descuento']['symbol_dec'], $this->field_config['descuento']['symbol_grp'], $this->field_config['descuento']['symbol_mon']);
             nm_limpa_valor($this->descuento, $this->field_config['descuento']['symbol_dec'], $this->field_config['descuento']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "tasaiva")
      {
          nm_limpa_numero($this->tasaiva, $this->field_config['tasaiva']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tasadesc")
      {
          nm_limpa_numero($this->tasadesc, $this->field_config['tasadesc']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "devuelto")
      {
          nm_limpa_numero($this->devuelto, $this->field_config['devuelto']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "iddet")
      {
          nm_limpa_numero($this->iddet, $this->field_config['iddet']['symbol_grp']) ; 
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
      if (!empty($this->idfaccom) || (!empty($format_fields) && isset($format_fields['idfaccom'])))
      {
          nmgp_Form_Num_Val($this->idfaccom, $this->field_config['idfaccom']['symbol_grp'], $this->field_config['idfaccom']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['idfaccom']['symbol_fmt']) ; 
      }
      if (!empty($this->cantidad) || (!empty($format_fields) && isset($format_fields['cantidad'])))
      {
          nmgp_Form_Num_Val($this->cantidad, $this->field_config['cantidad']['symbol_grp'], $this->field_config['cantidad']['symbol_dec'], "2", "S", "", "", "", "-", $this->field_config['cantidad']['symbol_fmt']) ; 
      }
      if (!empty($this->valorunit) || (!empty($format_fields) && isset($format_fields['valorunit'])))
      {
          nmgp_Form_Num_Val($this->valorunit, $this->field_config['valorunit']['symbol_grp'], $this->field_config['valorunit']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['valorunit']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['valorunit']['symbol_mon'];
          $this->sc_add_currency($this->valorunit, $sMonSymb, $this->field_config['valorunit']['format_pos']); 
      }
      if (!empty($this->valorpar) || (!empty($format_fields) && isset($format_fields['valorpar'])))
      {
          nmgp_Form_Num_Val($this->valorpar, $this->field_config['valorpar']['symbol_grp'], $this->field_config['valorpar']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['valorpar']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['valorpar']['symbol_mon'];
          $this->sc_add_currency($this->valorpar, $sMonSymb, $this->field_config['valorpar']['format_pos']); 
      }
      if (!empty($this->iva) || (!empty($format_fields) && isset($format_fields['iva'])))
      {
          nmgp_Form_Num_Val($this->iva, $this->field_config['iva']['symbol_grp'], $this->field_config['iva']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['iva']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['iva']['symbol_mon'];
          $this->sc_add_currency($this->iva, $sMonSymb, $this->field_config['iva']['format_pos']); 
      }
      if (!empty($this->descuento) || (!empty($format_fields) && isset($format_fields['descuento'])))
      {
          nmgp_Form_Num_Val($this->descuento, $this->field_config['descuento']['symbol_grp'], $this->field_config['descuento']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['descuento']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['descuento']['symbol_mon'];
          $this->sc_add_currency($this->descuento, $sMonSymb, $this->field_config['descuento']['format_pos']); 
      }
      if (!empty($this->tasaiva) || (!empty($format_fields) && isset($format_fields['tasaiva'])))
      {
          nmgp_Form_Num_Val($this->tasaiva, $this->field_config['tasaiva']['symbol_grp'], $this->field_config['tasaiva']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['tasaiva']['symbol_fmt']) ; 
      }
      if (!empty($this->tasadesc) || (!empty($format_fields) && isset($format_fields['tasadesc'])))
      {
          nmgp_Form_Num_Val($this->tasadesc, $this->field_config['tasadesc']['symbol_grp'], $this->field_config['tasadesc']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['tasadesc']['symbol_fmt']) ; 
      }
      if (!empty($this->devuelto) || (!empty($format_fields) && isset($format_fields['devuelto'])))
      {
          nmgp_Form_Num_Val($this->devuelto, $this->field_config['devuelto']['symbol_grp'], $this->field_config['devuelto']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['devuelto']['symbol_fmt']) ; 
      }
      if ((!empty($this->vencimiento) && 'null' != $this->vencimiento) || (!empty($format_fields) && isset($format_fields['vencimiento'])))
      {
          nm_volta_data($this->vencimiento, $this->field_config['vencimiento']['date_format']) ; 
          nmgp_Form_Datas($this->vencimiento, $this->field_config['vencimiento']['date_format'], $this->field_config['vencimiento']['date_sep']) ;  
      }
      elseif ('null' == $this->vencimiento || '' == $this->vencimiento)
      {
          $this->vencimiento = '';
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
      $guarda_format_hora = $this->field_config['vencimiento']['date_format'];
      if ($this->vencimiento != "")  
      { 
          nm_conv_data($this->vencimiento, $this->field_config['vencimiento']['date_format']) ; 
          $this->vencimiento_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->vencimiento_hora = substr($this->vencimiento_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->vencimiento_hora = substr($this->vencimiento_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->vencimiento_hora = substr($this->vencimiento_hora, 0, -4);
          }
      } 
      if ($this->vencimiento == "" && $use_null)  
      { 
          $this->vencimiento = "null" ; 
      } 
      $this->field_config['vencimiento']['date_format'] = $guarda_format_hora;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
       return $dt_out;
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
          $this->ajax_return_values_idfaccom();
          $this->ajax_return_values_idpro();
          $this->ajax_return_values_colores();
          $this->ajax_return_values_tallas();
          $this->ajax_return_values_sabor();
          $this->ajax_return_values_cantidad();
          $this->ajax_return_values_presentacion();
          $this->ajax_return_values_valorunit();
          $this->ajax_return_values_valorpar();
          $this->ajax_return_values_iva();
          $this->ajax_return_values_idbod();
          $this->ajax_return_values_descuento();
          $this->ajax_return_values_tasaiva();
          $this->ajax_return_values_tasadesc();
          $this->ajax_return_values_devuelto();
          $this->ajax_return_values_vencimiento();
          $this->ajax_return_values_lote();
          $this->ajax_return_values_iddet();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['iddet']['keyVal'] = detallecompra_mob_pack_protect_string($this->nmgp_dados_form['iddet']);
          }
   } // ajax_return_values

          //----- idfaccom
   function ajax_return_values_idfaccom($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idfaccom", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idfaccom);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idfaccom'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- idpro
   function ajax_return_values_idpro($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idpro", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idpro);
              $aLookup = array();
              $this->_tmp_lookup_idpro = $this->idpro;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_idpro']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_idpro'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_idpro']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_idpro'] = array(); 
    }

   $old_value_idfaccom = $this->idfaccom;
   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_valorpar = $this->valorpar;
   $old_value_iva = $this->iva;
   $old_value_descuento = $this->descuento;
   $old_value_tasaiva = $this->tasaiva;
   $old_value_tasadesc = $this->tasadesc;
   $old_value_devuelto = $this->devuelto;
   $old_value_vencimiento = $this->vencimiento;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_tasaiva = $this->tasaiva;
   $unformatted_value_tasadesc = $this->tasadesc;
   $unformatted_value_devuelto = $this->devuelto;
   $unformatted_value_vencimiento = $this->vencimiento;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idprod, concat(codigobar, \" - \",nompro) FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idprod, codigobar&\" - \"&nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }
   else
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }

   $this->idfaccom = $old_value_idfaccom;
   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->valorpar = $old_value_valorpar;
   $this->iva = $old_value_iva;
   $this->descuento = $old_value_descuento;
   $this->tasaiva = $old_value_tasaiva;
   $this->tasadesc = $old_value_tasadesc;
   $this->devuelto = $old_value_devuelto;
   $this->vencimiento = $old_value_vencimiento;

   if ('' != $this->idpro && '' != $this->idpro && '' != $this->idpro && '' != $this->idpro && '' != $this->idpro)
   {
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(detallecompra_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => detallecompra_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_idpro'][] = $rs->fields[0];
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
          $this->NM_ajax_info['fldList']['idpro'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idpro']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idpro']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idpro']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][detallecompra_mob_pack_protect_string(NM_charset_to_utf8($this->idpro))]) ? $aLookup[0][detallecompra_mob_pack_protect_string(NM_charset_to_utf8($this->idpro))] : "";
          $this->NM_ajax_info['fldList']['idpro_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

          //----- colores
   function ajax_return_values_colores($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("colores", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->colores);
              $aLookup = array();
              $this->_tmp_lookup_colores = $this->colores;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_colores']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_colores'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_colores']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_colores'] = array(); 
}
$aLookup[] = array(detallecompra_mob_pack_protect_string('0') => detallecompra_mob_pack_protect_string(''));
$_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_colores'][] = '0';
if ($this->idpro != "")
{ 
   $this->nm_clear_val("idpro");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_idfaccom = $this->idfaccom;
   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_valorpar = $this->valorpar;
   $old_value_iva = $this->iva;
   $old_value_descuento = $this->descuento;
   $old_value_tasaiva = $this->tasaiva;
   $old_value_tasadesc = $this->tasadesc;
   $old_value_devuelto = $this->devuelto;
   $old_value_vencimiento = $this->vencimiento;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_tasaiva = $this->tasaiva;
   $unformatted_value_tasadesc = $this->tasadesc;
   $unformatted_value_devuelto = $this->devuelto;
   $unformatted_value_vencimiento = $this->vencimiento;

   $nm_comando = "SELECT f.idcol, c.color 
FROM colorxproducto f
left join colores c on f.idcol=c.idcolores
where idpr=$this->idpro
ORDER BY f.idcol";

   $this->idfaccom = $old_value_idfaccom;
   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->valorpar = $old_value_valorpar;
   $this->iva = $old_value_iva;
   $this->descuento = $old_value_descuento;
   $this->tasaiva = $old_value_tasaiva;
   $this->tasadesc = $old_value_tasadesc;
   $this->devuelto = $old_value_devuelto;
   $this->vencimiento = $old_value_vencimiento;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(detallecompra_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => detallecompra_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_colores'][] = $rs->fields[0];
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
} 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"colores\"";
          if (isset($this->NM_ajax_info['select_html']['colores']) && !empty($this->NM_ajax_info['select_html']['colores']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['colores'];
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

                  if ($this->colores == $sValue)
                  {
                      $this->_tmp_lookup_colores = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['colores'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['colores']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['colores']['valList'][$i] = detallecompra_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['colores']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['colores']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['colores']['labList'] = $aLabel;
          }
   }

          //----- tallas
   function ajax_return_values_tallas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tallas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tallas);
              $aLookup = array();
              $this->_tmp_lookup_tallas = $this->tallas;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_tallas']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_tallas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_tallas']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_tallas'] = array(); 
}
$aLookup[] = array(detallecompra_mob_pack_protect_string('0') => detallecompra_mob_pack_protect_string(''));
$_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_tallas'][] = '0';
if ($this->idpro != "")
{ 
   $this->nm_clear_val("idpro");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_idfaccom = $this->idfaccom;
   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_valorpar = $this->valorpar;
   $old_value_iva = $this->iva;
   $old_value_descuento = $this->descuento;
   $old_value_tasaiva = $this->tasaiva;
   $old_value_tasadesc = $this->tasadesc;
   $old_value_devuelto = $this->devuelto;
   $old_value_vencimiento = $this->vencimiento;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_tasaiva = $this->tasaiva;
   $unformatted_value_tasadesc = $this->tasadesc;
   $unformatted_value_devuelto = $this->devuelto;
   $unformatted_value_vencimiento = $this->vencimiento;

   $nm_comando = "SELECT f.idta, t.tamaño
FROM tallaxproducto f
left join tallas t on f.idta=t.idtallas
where idpr=$this->idpro
ORDER BY f.idta";

   $this->idfaccom = $old_value_idfaccom;
   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->valorpar = $old_value_valorpar;
   $this->iva = $old_value_iva;
   $this->descuento = $old_value_descuento;
   $this->tasaiva = $old_value_tasaiva;
   $this->tasadesc = $old_value_tasadesc;
   $this->devuelto = $old_value_devuelto;
   $this->vencimiento = $old_value_vencimiento;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(detallecompra_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => detallecompra_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_tallas'][] = $rs->fields[0];
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
} 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tallas\"";
          if (isset($this->NM_ajax_info['select_html']['tallas']) && !empty($this->NM_ajax_info['select_html']['tallas']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['tallas'];
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

                  if ($this->tallas == $sValue)
                  {
                      $this->_tmp_lookup_tallas = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tallas'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tallas']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tallas']['valList'][$i] = detallecompra_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tallas']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tallas']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tallas']['labList'] = $aLabel;
          }
   }

          //----- sabor
   function ajax_return_values_sabor($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sabor", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sabor);
              $aLookup = array();
              $this->_tmp_lookup_sabor = $this->sabor;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_sabor']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_sabor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_sabor']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_sabor'] = array(); 
}
$aLookup[] = array(detallecompra_mob_pack_protect_string('0') => detallecompra_mob_pack_protect_string(''));
$_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_sabor'][] = '0';
if ($this->idpro != "")
{ 
   $this->nm_clear_val("idpro");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_idfaccom = $this->idfaccom;
   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_valorpar = $this->valorpar;
   $old_value_iva = $this->iva;
   $old_value_descuento = $this->descuento;
   $old_value_tasaiva = $this->tasaiva;
   $old_value_tasadesc = $this->tasadesc;
   $old_value_devuelto = $this->devuelto;
   $old_value_vencimiento = $this->vencimiento;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_tasaiva = $this->tasaiva;
   $unformatted_value_tasadesc = $this->tasadesc;
   $unformatted_value_devuelto = $this->devuelto;
   $unformatted_value_vencimiento = $this->vencimiento;

   $nm_comando = "SELECT f.idsa, t.tamaño
FROM saborxproducto f
left join tallas t on f.idsa=t.idtallas
where idpr=$this->idpro and tallasabor='S'
ORDER BY f.idsa";

   $this->idfaccom = $old_value_idfaccom;
   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->valorpar = $old_value_valorpar;
   $this->iva = $old_value_iva;
   $this->descuento = $old_value_descuento;
   $this->tasaiva = $old_value_tasaiva;
   $this->tasadesc = $old_value_tasadesc;
   $this->devuelto = $old_value_devuelto;
   $this->vencimiento = $old_value_vencimiento;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(detallecompra_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => detallecompra_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_sabor'][] = $rs->fields[0];
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
} 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"sabor\"";
          if (isset($this->NM_ajax_info['select_html']['sabor']) && !empty($this->NM_ajax_info['select_html']['sabor']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['sabor'];
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

                  if ($this->sabor == $sValue)
                  {
                      $this->_tmp_lookup_sabor = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['sabor'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['sabor']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['sabor']['valList'][$i] = detallecompra_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['sabor']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['sabor']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['sabor']['labList'] = $aLabel;
          }
   }

          //----- cantidad
   function ajax_return_values_cantidad($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cantidad", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cantidad);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cantidad'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- presentacion
   function ajax_return_values_presentacion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("presentacion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->presentacion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['presentacion'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- valorunit
   function ajax_return_values_valorunit($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valorunit", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valorunit);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valorunit'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- valorpar
   function ajax_return_values_valorpar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valorpar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valorpar);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valorpar'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- iva
   function ajax_return_values_iva($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("iva", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->iva);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['iva'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_idbod']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_idbod'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_idbod']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_idbod'] = array(); 
}
$aLookup[] = array(detallecompra_mob_pack_protect_string('') => detallecompra_mob_pack_protect_string('Destino'));
$_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_idbod'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_idfaccom = $this->idfaccom;
   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_valorpar = $this->valorpar;
   $old_value_iva = $this->iva;
   $old_value_descuento = $this->descuento;
   $old_value_tasaiva = $this->tasaiva;
   $old_value_tasadesc = $this->tasadesc;
   $old_value_devuelto = $this->devuelto;
   $old_value_vencimiento = $this->vencimiento;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_tasaiva = $this->tasaiva;
   $unformatted_value_tasadesc = $this->tasadesc;
   $unformatted_value_devuelto = $this->devuelto;
   $unformatted_value_vencimiento = $this->vencimiento;

   $nm_comando = "SELECT idbodega, bodega 
FROM bodegas 
ORDER BY bodega";

   $this->idfaccom = $old_value_idfaccom;
   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->valorpar = $old_value_valorpar;
   $this->iva = $old_value_iva;
   $this->descuento = $old_value_descuento;
   $this->tasaiva = $old_value_tasaiva;
   $this->tasadesc = $old_value_tasadesc;
   $this->devuelto = $old_value_devuelto;
   $this->vencimiento = $old_value_vencimiento;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(detallecompra_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => detallecompra_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['Lookup_idbod'][] = $rs->fields[0];
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
              $sSelComp = $this->NM_ajax_info['select_html']['idbod'];
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
              $this->NM_ajax_info['fldList']['idbod']['valList'][$i] = detallecompra_mob_pack_protect_string($v);
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

          //----- descuento
   function ajax_return_values_descuento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("descuento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->descuento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['descuento'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- tasaiva
   function ajax_return_values_tasaiva($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tasaiva", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tasaiva);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tasaiva'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- tasadesc
   function ajax_return_values_tasadesc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tasadesc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tasadesc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tasadesc'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- devuelto
   function ajax_return_values_devuelto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("devuelto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->devuelto);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['devuelto'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- vencimiento
   function ajax_return_values_vencimiento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("vencimiento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->vencimiento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['vencimiento'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- lote
   function ajax_return_values_lote($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("lote", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->lote);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['lote'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- iddet
   function ajax_return_values_iddet($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("iddet", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->iddet);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['iddet'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['upload_dir'][$fieldName][] = $newName;
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
      $_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_devuelto = $this->devuelto;
    $original_idfaccom = $this->idfaccom;
    $original_idpro = $this->idpro;
    $original_presentacion = $this->presentacion;
}
if (!isset($this->sc_temp_edit_cantidad)) {$this->sc_temp_edit_cantidad = (isset($_SESSION['edit_cantidad'])) ? $_SESSION['edit_cantidad'] : "";}
if (!isset($this->sc_temp_cost_ant)) {$this->sc_temp_cost_ant = (isset($_SESSION['cost_ant'])) ? $_SESSION['cost_ant'] : "";}
if (!isset($this->sc_temp_sw)) {$this->sc_temp_sw = (isset($_SESSION['sw'])) ? $_SESSION['sw'] : "";}
if (!isset($this->sc_temp_par_idfaccom)) {$this->sc_temp_par_idfaccom = (isset($_SESSION['par_idfaccom'])) ? $_SESSION['par_idfaccom'] : "";}
                         $this->idfaccom =$this->sc_temp_par_idfaccom;
$this->sc_temp_sw=0;
$this->sc_temp_cost_ant=0;
$this->sc_temp_edit_cantidad=0;
$sql="SELECT fechacom FROM facturacom WHERE idfaccom=$this->sc_temp_par_idfaccom";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->ds = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
;
$fecha =substr($this->ds , 8);
$fecha = date("Y-m-d", strtotime($fecha ));

if ($this->devuelto >0)
	{
	$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
	$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;
	$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;
	}

$sql="select unidmaymen, unimay, unimen from productos where idprod=$this->idpro ";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->ds[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
;
$resp=$this->ds[0][0];

if($resp=="SI")
	{
	$this->presentacion =$this->ds[0][1];
	}
else
	{
	$this->presentacion =$this->ds[0][2];
	}
if (isset($this->sc_temp_par_idfaccom)) { $_SESSION['par_idfaccom'] = $this->sc_temp_par_idfaccom;}
if (isset($this->sc_temp_sw)) { $_SESSION['sw'] = $this->sc_temp_sw;}
if (isset($this->sc_temp_cost_ant)) { $_SESSION['cost_ant'] = $this->sc_temp_cost_ant;}
if (isset($this->sc_temp_edit_cantidad)) { $_SESSION['edit_cantidad'] = $this->sc_temp_edit_cantidad;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_devuelto != $this->devuelto || (isset($bFlagRead_devuelto) && $bFlagRead_devuelto)))
    {
        $this->ajax_return_values_devuelto(true);
    }
    if (($original_idfaccom != $this->idfaccom || (isset($bFlagRead_idfaccom) && $bFlagRead_idfaccom)))
    {
        $this->ajax_return_values_idfaccom(true);
    }
    if (($original_idpro != $this->idpro || (isset($bFlagRead_idpro) && $bFlagRead_idpro)))
    {
        $this->ajax_return_values_idpro(true);
    }
    if (($original_presentacion != $this->presentacion || (isset($bFlagRead_presentacion) && $bFlagRead_presentacion)))
    {
        $this->ajax_return_values_presentacion(true);
    }
}
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'off'; 
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
      $this->cantidad = str_replace($sc_parm1, $sc_parm2, $this->cantidad); 
      $this->valorunit = str_replace($sc_parm1, $sc_parm2, $this->valorunit); 
      $this->valorpar = str_replace($sc_parm1, $sc_parm2, $this->valorpar); 
      $this->iva = str_replace($sc_parm1, $sc_parm2, $this->iva); 
      $this->descuento = str_replace($sc_parm1, $sc_parm2, $this->descuento); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->cantidad = "'" . $this->cantidad . "'";
      $this->valorunit = "'" . $this->valorunit . "'";
      $this->valorpar = "'" . $this->valorpar . "'";
      $this->iva = "'" . $this->iva . "'";
      $this->descuento = "'" . $this->descuento . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->cantidad = str_replace("'", "", $this->cantidad); 
      $this->valorunit = str_replace("'", "", $this->valorunit); 
      $this->valorpar = str_replace("'", "", $this->valorpar); 
      $this->iva = str_replace("'", "", $this->iva); 
      $this->descuento = str_replace("'", "", $this->descuento); 
   } 
//----------- 

   function return_after_insert()
   {
      global $sc_where;
      $sc_where_pos = " WHERE ((iddet < $this->iddet))";
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
      if ('' != $this->iddet)
      {
          $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count;
          $rsc = $this->Db->Execute($nmgp_sel_count);
          if ($rsc === false && !$rsc->EOF)
          {
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
              exit;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start'] = $rsc->fields[0];
          $rsc->Close();
      }
   }

   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
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
      $_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cantidad = $this->cantidad;
    $original_idpro = $this->idpro;
    $original_valorunit = $this->valorunit;
}
if (!isset($this->sc_temp_cost_ant)) {$this->sc_temp_cost_ant = (isset($_SESSION['cost_ant'])) ? $_SESSION['cost_ant'] : "";}
                         $proid=$this->idpro ;
$sql="SELECT costomen FROM productos WHERE idprod=$proid";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->ds = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
;
$this->ds =substr($this->ds , 8);
$this->sc_temp_cost_ant=$this->ds ;	$this->actualiza_stock();
if (isset($this->sc_temp_cost_ant)) { $_SESSION['cost_ant'] = $this->sc_temp_cost_ant;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cantidad != $this->cantidad || (isset($bFlagRead_cantidad) && $bFlagRead_cantidad)))
    {
        $this->ajax_return_values_cantidad(true);
    }
    if (($original_idpro != $this->idpro || (isset($bFlagRead_idpro) && $bFlagRead_idpro)))
    {
        $this->ajax_return_values_idpro(true);
    }
    if (($original_valorunit != $this->valorunit || (isset($bFlagRead_valorunit) && $bFlagRead_valorunit)))
    {
        $this->ajax_return_values_valorunit(true);
    }
}
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'off'; 
    }
    if ("alterar" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cantidad = $this->cantidad;
    $original_idbod = $this->idbod;
    $original_idfaccom = $this->idfaccom;
    $original_idpro = $this->idpro;
    $original_lote = $this->lote;
    $original_valorpar = $this->valorpar;
    $original_valorunit = $this->valorunit;
    $original_vencimiento = $this->vencimiento;
}
                        $this->actualiza_stock_edita();

$idfaco=$this->idfaccom ;

     $nm_select ="UPDATE inventario SET cantidad=$this->cantidad , idpro=$this->idpro , costo=$this->valorunit ,  valorparcial=$this->valorpar , idbod=$this->idbod ,fechavenc='".$this->vencimiento ."',lote2='".$this->lote ."' WHERE detalle like'%Compra%' and idfaccom=$idfaco and iddetalle=$this->iddet "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                detallecompra_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cantidad != $this->cantidad || (isset($bFlagRead_cantidad) && $bFlagRead_cantidad)))
    {
        $this->ajax_return_values_cantidad(true);
    }
    if (($original_idbod != $this->idbod || (isset($bFlagRead_idbod) && $bFlagRead_idbod)))
    {
        $this->ajax_return_values_idbod(true);
    }
    if (($original_idfaccom != $this->idfaccom || (isset($bFlagRead_idfaccom) && $bFlagRead_idfaccom)))
    {
        $this->ajax_return_values_idfaccom(true);
    }
    if (($original_idpro != $this->idpro || (isset($bFlagRead_idpro) && $bFlagRead_idpro)))
    {
        $this->ajax_return_values_idpro(true);
    }
    if (($original_lote != $this->lote || (isset($bFlagRead_lote) && $bFlagRead_lote)))
    {
        $this->ajax_return_values_lote(true);
    }
    if (($original_valorpar != $this->valorpar || (isset($bFlagRead_valorpar) && $bFlagRead_valorpar)))
    {
        $this->ajax_return_values_valorpar(true);
    }
    if (($original_valorunit != $this->valorunit || (isset($bFlagRead_valorunit) && $bFlagRead_valorunit)))
    {
        $this->ajax_return_values_valorunit(true);
    }
    if (($original_vencimiento != $this->vencimiento || (isset($bFlagRead_vencimiento) && $bFlagRead_vencimiento)))
    {
        $this->ajax_return_values_vencimiento(true);
    }
}
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'off'; 
    }
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cantidad = $this->cantidad;
    $original_idfaccom = $this->idfaccom;
    $original_idpro = $this->idpro;
}
                        $this->actualiza_stock_elimina();
$idfaco=$this->idfaccom ;
$sql="select idinv from inventario where idpro=$this->idpro  and idfaccom=$idfaco and detalle like'%Compra%' and iddetalle=$this->iddet ";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->det = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->det[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->det = false;
          $this->det_erro = $this->Db->ErrorMsg();
      } 
;
$idin=$this->det[0][0];

     $nm_select ="DELETE FROM inventario WHERE idinv=$idin"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                detallecompra_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cantidad != $this->cantidad || (isset($bFlagRead_cantidad) && $bFlagRead_cantidad)))
    {
        $this->ajax_return_values_cantidad(true);
    }
    if (($original_idfaccom != $this->idfaccom || (isset($bFlagRead_idfaccom) && $bFlagRead_idfaccom)))
    {
        $this->ajax_return_values_idfaccom(true);
    }
    if (($original_idpro != $this->idpro || (isset($bFlagRead_idpro) && $bFlagRead_idpro)))
    {
        $this->ajax_return_values_idpro(true);
    }
}
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'off'; 
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
      $SC_tem_cmp_update = true; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Db->BeginTrans(); 
          $this->Ini->sc_tem_trans_banco = true; 
      } 
      if ('incluir' == $this->nmgp_opcao && empty($this->idfaccom)) {$this->idfaccom = "" . $_SESSION['par_idfaccom'] . ""; $this->sc_force_zero[] = "idfaccom";}  
      $NM_val_form['idfaccom'] = $this->idfaccom;
      $NM_val_form['idpro'] = $this->idpro;
      $NM_val_form['colores'] = $this->colores;
      $NM_val_form['tallas'] = $this->tallas;
      $NM_val_form['sabor'] = $this->sabor;
      $NM_val_form['cantidad'] = $this->cantidad;
      $NM_val_form['presentacion'] = $this->presentacion;
      $NM_val_form['valorunit'] = $this->valorunit;
      $NM_val_form['valorpar'] = $this->valorpar;
      $NM_val_form['iva'] = $this->iva;
      $NM_val_form['idbod'] = $this->idbod;
      $NM_val_form['descuento'] = $this->descuento;
      $NM_val_form['tasaiva'] = $this->tasaiva;
      $NM_val_form['tasadesc'] = $this->tasadesc;
      $NM_val_form['devuelto'] = $this->devuelto;
      $NM_val_form['vencimiento'] = $this->vencimiento;
      $NM_val_form['lote'] = $this->lote;
      $NM_val_form['iddet'] = $this->iddet;
      if ($this->iddet == "")  
      { 
          $this->iddet = 0;
      } 
      if ($this->idfaccom == "")  
      { 
          $this->idfaccom = 0;
          $this->sc_force_zero[] = 'idfaccom';
      } 
      if ($this->idpro == "")  
      { 
          $this->idpro = 0;
          $this->sc_force_zero[] = 'idpro';
      } 
      if ($this->idbod == "")  
      { 
          $this->idbod = 0;
          $this->sc_force_zero[] = 'idbod';
      } 
      if ($this->cantidad == "")  
      { 
          $this->cantidad = 0;
          $this->sc_force_zero[] = 'cantidad';
      } 
      if ($this->valorunit == "")  
      { 
          $this->valorunit = 0;
          $this->sc_force_zero[] = 'valorunit';
      } 
      if ($this->valorpar == "")  
      { 
          $this->valorpar = 0;
          $this->sc_force_zero[] = 'valorpar';
      } 
      if ($this->iva == "")  
      { 
          $this->iva = 0;
          $this->sc_force_zero[] = 'iva';
      } 
      if ($this->descuento == "")  
      { 
          $this->descuento = 0;
          $this->sc_force_zero[] = 'descuento';
      } 
      if ($this->tasaiva == "")  
      { 
          $this->tasaiva = 0;
          $this->sc_force_zero[] = 'tasaiva';
      } 
      if ($this->tasadesc == "")  
      { 
          $this->tasadesc = 0;
          $this->sc_force_zero[] = 'tasadesc';
      } 
      if ($this->devuelto == "")  
      { 
          $this->devuelto = 0;
          $this->sc_force_zero[] = 'devuelto';
      } 
      if ($this->colores == "")  
      { 
          $this->colores = 0;
          $this->sc_force_zero[] = 'colores';
      } 
      if ($this->tallas == "")  
      { 
          $this->tallas = 0;
          $this->sc_force_zero[] = 'tallas';
      } 
      if ($this->sabor == "")  
      { 
          $this->sabor = 0;
          $this->sc_force_zero[] = 'sabor';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_ibase, $this->Ini->nm_bases_mysql);
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          if ($this->vencimiento == "")  
          { 
              $this->vencimiento = "null"; 
              $NM_val_null[] = "vencimiento";
          } 
          $this->lote_before_qstr = $this->lote;
          $this->lote = substr($this->Db->qstr($this->lote), 1, -1); 
          if ($this->lote == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->lote = "null"; 
              $NM_val_null[] = "lote";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where iddet = $this->iddet ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where iddet = $this->iddet "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where iddet = $this->iddet ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where iddet = $this->iddet "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 detallecompra_mob_pack_ajax_response();
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
              $comando_oracle = "";  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET idfaccom = $this->idfaccom, idpro = $this->idpro, idbod = $this->idbod, cantidad = $this->cantidad, valorunit = $this->valorunit, valorpar = $this->valorpar, iva = $this->iva, descuento = $this->descuento, tasaiva = $this->tasaiva, tasadesc = $this->tasadesc, devuelto = $this->devuelto, colores = $this->colores, tallas = $this->tallas, sabor = $this->sabor, vencimiento = #$this->vencimiento#, lote = '$this->lote'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET idfaccom = $this->idfaccom, idpro = $this->idpro, idbod = $this->idbod, cantidad = $this->cantidad, valorunit = $this->valorunit, valorpar = $this->valorpar, iva = $this->iva, descuento = $this->descuento, tasaiva = $this->tasaiva, tasadesc = $this->tasadesc, devuelto = $this->devuelto, colores = $this->colores, tallas = $this->tallas, sabor = $this->sabor, vencimiento = " . $this->Ini->date_delim . $this->vencimiento . $this->Ini->date_delim1 . ", lote = '$this->lote'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET idfaccom = $this->idfaccom, idpro = $this->idpro, idbod = $this->idbod, cantidad = $this->cantidad, valorunit = $this->valorunit, valorpar = $this->valorpar, iva = $this->iva, descuento = $this->descuento, tasaiva = $this->tasaiva, tasadesc = $this->tasadesc, devuelto = $this->devuelto, colores = $this->colores, tallas = $this->tallas, sabor = $this->sabor, vencimiento = " . $this->Ini->date_delim . $this->vencimiento . $this->Ini->date_delim1 . ", lote = '$this->lote'";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET idfaccom = $this->idfaccom, idpro = $this->idpro, idbod = $this->idbod, cantidad = $this->cantidad, valorunit = $this->valorunit, valorpar = $this->valorpar, iva = $this->iva, descuento = $this->descuento, tasaiva = $this->tasaiva, tasadesc = $this->tasadesc, devuelto = $this->devuelto, colores = $this->colores, tallas = $this->tallas, sabor = $this->sabor, vencimiento = " . $this->Ini->date_delim . $this->vencimiento . $this->Ini->date_delim1 . ", lote = '$this->lote'";  
              } 
              $aDoNotUpdate = array();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE iddet = $this->iddet ";  
              }  
              else  
              {
                  $comando .= " WHERE iddet = $this->iddet ";  
              }  
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if ($SC_ex_update || $SC_tem_cmp_update)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg(), true); 
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $this->Db->ErrorMsg();  
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  detallecompra_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
          $this->lote = $this->lote_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['iddet'])) { $this->iddet = $NM_val_form['iddet']; }
              elseif (isset($this->iddet)) { $this->nm_limpa_alfa($this->iddet); }
              if     (isset($NM_val_form) && isset($NM_val_form['idfaccom'])) { $this->idfaccom = $NM_val_form['idfaccom']; }
              elseif (isset($this->idfaccom)) { $this->nm_limpa_alfa($this->idfaccom); }
              if     (isset($NM_val_form) && isset($NM_val_form['idpro'])) { $this->idpro = $NM_val_form['idpro']; }
              elseif (isset($this->idpro)) { $this->nm_limpa_alfa($this->idpro); }
              if     (isset($NM_val_form) && isset($NM_val_form['idbod'])) { $this->idbod = $NM_val_form['idbod']; }
              elseif (isset($this->idbod)) { $this->nm_limpa_alfa($this->idbod); }
              if     (isset($NM_val_form) && isset($NM_val_form['cantidad'])) { $this->cantidad = $NM_val_form['cantidad']; }
              elseif (isset($this->cantidad)) { $this->nm_limpa_alfa($this->cantidad); }
              if     (isset($NM_val_form) && isset($NM_val_form['valorunit'])) { $this->valorunit = $NM_val_form['valorunit']; }
              elseif (isset($this->valorunit)) { $this->nm_limpa_alfa($this->valorunit); }
              if     (isset($NM_val_form) && isset($NM_val_form['valorpar'])) { $this->valorpar = $NM_val_form['valorpar']; }
              elseif (isset($this->valorpar)) { $this->nm_limpa_alfa($this->valorpar); }
              if     (isset($NM_val_form) && isset($NM_val_form['iva'])) { $this->iva = $NM_val_form['iva']; }
              elseif (isset($this->iva)) { $this->nm_limpa_alfa($this->iva); }
              if     (isset($NM_val_form) && isset($NM_val_form['descuento'])) { $this->descuento = $NM_val_form['descuento']; }
              elseif (isset($this->descuento)) { $this->nm_limpa_alfa($this->descuento); }
              if     (isset($NM_val_form) && isset($NM_val_form['tasaiva'])) { $this->tasaiva = $NM_val_form['tasaiva']; }
              elseif (isset($this->tasaiva)) { $this->nm_limpa_alfa($this->tasaiva); }
              if     (isset($NM_val_form) && isset($NM_val_form['tasadesc'])) { $this->tasadesc = $NM_val_form['tasadesc']; }
              elseif (isset($this->tasadesc)) { $this->nm_limpa_alfa($this->tasadesc); }
              if     (isset($NM_val_form) && isset($NM_val_form['devuelto'])) { $this->devuelto = $NM_val_form['devuelto']; }
              elseif (isset($this->devuelto)) { $this->nm_limpa_alfa($this->devuelto); }
              if     (isset($NM_val_form) && isset($NM_val_form['colores'])) { $this->colores = $NM_val_form['colores']; }
              elseif (isset($this->colores)) { $this->nm_limpa_alfa($this->colores); }
              if     (isset($NM_val_form) && isset($NM_val_form['tallas'])) { $this->tallas = $NM_val_form['tallas']; }
              elseif (isset($this->tallas)) { $this->nm_limpa_alfa($this->tallas); }
              if     (isset($NM_val_form) && isset($NM_val_form['sabor'])) { $this->sabor = $NM_val_form['sabor']; }
              elseif (isset($this->sabor)) { $this->nm_limpa_alfa($this->sabor); }
              if     (isset($NM_val_form) && isset($NM_val_form['lote'])) { $this->lote = $NM_val_form['lote']; }
              elseif (isset($this->lote)) { $this->nm_limpa_alfa($this->lote); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('idfaccom', 'idpro', 'colores', 'tallas', 'sabor', 'cantidad', 'presentacion', 'valorunit', 'valorpar', 'iva', 'idbod', 'descuento', 'tasaiva', 'tasadesc', 'devuelto', 'vencimiento', 'lote'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "iddet, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      detallecompra_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (idfaccom, idpro, idbod, cantidad, valorunit, valorpar, iva, descuento, tasaiva, tasadesc, devuelto, colores, tallas, sabor, vencimiento, lote) VALUES ($this->idfaccom, $this->idpro, $this->idbod, $this->cantidad, $this->valorunit, $this->valorpar, $this->iva, $this->descuento, $this->tasaiva, $this->tasadesc, $this->devuelto, $this->colores, $this->tallas, $this->sabor, #$this->vencimiento#, '$this->lote')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idfaccom, idpro, idbod, cantidad, valorunit, valorpar, iva, descuento, tasaiva, tasadesc, devuelto, colores, tallas, sabor, vencimiento, lote) VALUES (" . $NM_seq_auto . "$this->idfaccom, $this->idpro, $this->idbod, $this->cantidad, $this->valorunit, $this->valorpar, $this->iva, $this->descuento, $this->tasaiva, $this->tasadesc, $this->devuelto, $this->colores, $this->tallas, $this->sabor, " . $this->Ini->date_delim . $this->vencimiento . $this->Ini->date_delim1 . ", '$this->lote')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idfaccom, idpro, idbod, cantidad, valorunit, valorpar, iva, descuento, tasaiva, tasadesc, devuelto, colores, tallas, sabor, vencimiento, lote) VALUES (" . $NM_seq_auto . "$this->idfaccom, $this->idpro, $this->idbod, $this->cantidad, $this->valorunit, $this->valorpar, $this->iva, $this->descuento, $this->tasaiva, $this->tasadesc, $this->devuelto, $this->colores, $this->tallas, $this->sabor, " . $this->Ini->date_delim . $this->vencimiento . $this->Ini->date_delim1 . ", '$this->lote')"; 
              }
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg(), true); 
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                      { 
                          $this->sc_erro_insert = $this->Db->ErrorMsg();  
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              detallecompra_mob_pack_ajax_response();
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
                          detallecompra_mob_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->iddet =  $rsy->fields[0];
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
                  $this->iddet = $rsy->fields[0];
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
                  $this->iddet = $rsy->fields[0];
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
                  $this->iddet = $rsy->fields[0];
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
                  $this->iddet = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->sc_insert_on = true; 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              $this->nmgp_botoes['tallacolor'] = "on";
              $this->return_after_insert();
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->iddet = substr($this->Db->qstr($this->iddet), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where iddet = $this->iddet"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where iddet = $this->iddet "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where iddet = $this->iddet"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where iddet = $this->iddet "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet "); 
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
                          detallecompra_mob_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['total']);
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['decimal_db'] == ",")
        {
            $this->nm_troca_decimal(",", ".");
        }
        $_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cantidad = $this->cantidad;
    $original_colores = $this->colores;
    $original_idbod = $this->idbod;
    $original_idfaccom = $this->idfaccom;
    $original_idpro = $this->idpro;
    $original_lote = $this->lote;
    $original_tallas = $this->tallas;
    $original_valorpar = $this->valorpar;
    $original_valorunit = $this->valorunit;
    $original_vencimiento = $this->vencimiento;
}
                          
      $nm_select = "SELECT LAST_INSERT_ID()"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->ds[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
;
$last_id=$this->ds[0][0];$this->update_master();



$venc = "";
if($this->vencimiento !="null")
{
	$venc = "fechavenc='".$this->vencimiento ."'";
}
else
{
	$venc = "fechavenc=null";
}

$vsql = "INSERT 
		 inventario 
		 SET 
		 fecha='".date("Y-m-d")."', 
		 cantidad=$this->cantidad , 
		 idpro=$this->idpro , 
		 costo=$this->valorunit ,
		 valorparcial=$this->valorpar , 
		 idbod=$this->idbod , 
		 tipo=1, 
		 detalle='Compra', 
		 idmov=1, 
		 idfaccom=$this->idfaccom , 
		 nufacvta=0, 
		 iddetalle=$last_id, 
		 colores=$this->colores , 
		 tallas=$this->tallas ,
		 $venc,
		 lote2='$this->lote'";


     $nm_select = $vsql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                detallecompra_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cantidad != $this->cantidad || (isset($bFlagRead_cantidad) && $bFlagRead_cantidad)))
    {
        $this->ajax_return_values_cantidad(true);
    }
    if (($original_colores != $this->colores || (isset($bFlagRead_colores) && $bFlagRead_colores)))
    {
        $this->ajax_return_values_colores(true);
    }
    if (($original_idbod != $this->idbod || (isset($bFlagRead_idbod) && $bFlagRead_idbod)))
    {
        $this->ajax_return_values_idbod(true);
    }
    if (($original_idfaccom != $this->idfaccom || (isset($bFlagRead_idfaccom) && $bFlagRead_idfaccom)))
    {
        $this->ajax_return_values_idfaccom(true);
    }
    if (($original_idpro != $this->idpro || (isset($bFlagRead_idpro) && $bFlagRead_idpro)))
    {
        $this->ajax_return_values_idpro(true);
    }
    if (($original_lote != $this->lote || (isset($bFlagRead_lote) && $bFlagRead_lote)))
    {
        $this->ajax_return_values_lote(true);
    }
    if (($original_tallas != $this->tallas || (isset($bFlagRead_tallas) && $bFlagRead_tallas)))
    {
        $this->ajax_return_values_tallas(true);
    }
    if (($original_valorpar != $this->valorpar || (isset($bFlagRead_valorpar) && $bFlagRead_valorpar)))
    {
        $this->ajax_return_values_valorpar(true);
    }
    if (($original_valorunit != $this->valorunit || (isset($bFlagRead_valorunit) && $bFlagRead_valorunit)))
    {
        $this->ajax_return_values_valorunit(true);
    }
    if (($original_vencimiento != $this->vencimiento || (isset($bFlagRead_vencimiento) && $bFlagRead_vencimiento)))
    {
        $this->ajax_return_values_vencimiento(true);
    }
}
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'on';
                        $this->update_master();
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'off'; 
    }
    if ("delete" == $this->sc_evento && $this->nmgp_opcao != "nada") {
      $_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'on';
                        $this->update_master();
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'off'; 
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['decimal_db'] == ",")
   {
       $this->nm_troca_decimal(".", ",");
   }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['parms'] = "iddet?#?$this->iddet?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->iddet = substr($this->Db->qstr($this->iddet), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['run_iframe'] == "R")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->iddet)) 
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
      if ($this->nmgp_opcao != "nada" && (trim($this->iddet) === "")) 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['run_iframe'] == "F" && $this->sc_evento == "insert")
      {
          $this->nmgp_opcao = "final";
      }
      $sc_where = trim("idfaccom=" . $_SESSION['par_idfaccom'] . "
and cantidad >0");
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['total']))
      { 
          $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_detallecompra_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['total'] = $qt_geral_reg_detallecompra_mob;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->iddet))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "iddet < $this->iddet "; 
              }  
              else  
              {
                  $Key_Where = "iddet < $this->iddet "; 
              }
              $Where_Start = (empty($sc_where)) ? " where " . $Key_Where :  $sc_where . " and (" . $Key_Where . ")";
              $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $Where_Start; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_detallecompra_mob = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start'] > $qt_geral_reg_detallecompra_mob)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start'] = $qt_geral_reg_detallecompra_mob; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start'] = $qt_geral_reg_detallecompra_mob; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['total'] + 1; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT iddet, idfaccom, idpro, idbod, cantidad, valorunit, valorpar, iva, descuento, tasaiva, tasadesc, devuelto, colores, tallas, sabor, str_replace (convert(char(10),vencimiento,102), '.', '-') + ' ' + convert(char(8),vencimiento,20), lote from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT iddet, idfaccom, idpro, idbod, cantidad, valorunit, valorpar, iva, descuento, tasaiva, tasadesc, devuelto, colores, tallas, sabor, vencimiento, lote from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = "idfaccom=" . $_SESSION['par_idfaccom'] . "
and cantidad >0";
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (!empty($sc_where))
              {
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  {
                     $aWhere[] = "iddet = $this->iddet"; 
                  }  
                  else  
                  {
                     $aWhere[] = "iddet = $this->iddet"; 
                  }
              } 
              else
              {
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  {
                      $aWhere[] = "iddet = $this->iddet"; 
                  }  
                  else  
                  {
                      $aWhere[] = "iddet = $this->iddet"; 
                  }
              } 
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "iddet";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "insert" || $this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['tallacolor'] = $this->nmgp_botoes['tallacolor'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['empty_filter'] = true;
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
              $this->NM_ajax_info['buttonDisplay']['tallacolor'] = $this->nmgp_botoes['tallacolor'] = "on";
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
              $this->iddet = $rs->fields[0] ; 
              $this->nmgp_dados_select['iddet'] = $this->iddet;
              $this->idfaccom = $rs->fields[1] ; 
              $this->nmgp_dados_select['idfaccom'] = $this->idfaccom;
              $this->idpro = $rs->fields[2] ; 
              $this->nmgp_dados_select['idpro'] = $this->idpro;
              $this->idbod = $rs->fields[3] ; 
              $this->nmgp_dados_select['idbod'] = $this->idbod;
              $this->cantidad = trim($rs->fields[4]) ; 
              $this->nmgp_dados_select['cantidad'] = $this->cantidad;
              $this->valorunit = trim($rs->fields[5]) ; 
              $this->nmgp_dados_select['valorunit'] = $this->valorunit;
              $this->valorpar = trim($rs->fields[6]) ; 
              $this->nmgp_dados_select['valorpar'] = $this->valorpar;
              $this->iva = $rs->fields[7] ; 
              $this->nmgp_dados_select['iva'] = $this->iva;
              $this->descuento = trim($rs->fields[8]) ; 
              $this->nmgp_dados_select['descuento'] = $this->descuento;
              $this->tasaiva = $rs->fields[9] ; 
              $this->nmgp_dados_select['tasaiva'] = $this->tasaiva;
              $this->tasadesc = $rs->fields[10] ; 
              $this->nmgp_dados_select['tasadesc'] = $this->tasadesc;
              $this->devuelto = $rs->fields[11] ; 
              $this->nmgp_dados_select['devuelto'] = $this->devuelto;
              $this->colores = $rs->fields[12] ; 
              $this->nmgp_dados_select['colores'] = $this->colores;
              $this->tallas = $rs->fields[13] ; 
              $this->nmgp_dados_select['tallas'] = $this->tallas;
              $this->sabor = $rs->fields[14] ; 
              $this->nmgp_dados_select['sabor'] = $this->sabor;
              $this->vencimiento = $rs->fields[15] ; 
              $this->nmgp_dados_select['vencimiento'] = $this->vencimiento;
              $this->lote = $rs->fields[16] ; 
              $this->nmgp_dados_select['lote'] = $this->lote;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->iddet = (string)$this->iddet; 
              $this->idfaccom = (string)$this->idfaccom; 
              $this->idpro = (string)$this->idpro; 
              $this->idbod = (string)$this->idbod; 
              $this->cantidad = (strpos(strtolower($this->cantidad), "e")) ? (float)$this->cantidad : $this->cantidad; 
              $this->cantidad = (string)$this->cantidad; 
              $this->valorunit = (strpos(strtolower($this->valorunit), "e")) ? (float)$this->valorunit : $this->valorunit; 
              $this->valorunit = (string)$this->valorunit; 
              $this->valorpar = (strpos(strtolower($this->valorpar), "e")) ? (float)$this->valorpar : $this->valorpar; 
              $this->valorpar = (string)$this->valorpar; 
              $this->iva = (string)$this->iva; 
              $this->descuento = (strpos(strtolower($this->descuento), "e")) ? (float)$this->descuento : $this->descuento; 
              $this->descuento = (string)$this->descuento; 
              $this->tasaiva = (string)$this->tasaiva; 
              $this->tasadesc = (string)$this->tasadesc; 
              $this->devuelto = (string)$this->devuelto; 
              $this->colores = (string)$this->colores; 
              $this->tallas = (string)$this->tallas; 
              $this->sabor = (string)$this->sabor; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['parms'] = "iddet?#?$this->iddet?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['reg_start'] < $qt_geral_reg_detallecompra_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['opcao']   = '';
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
              $this->iddet = "";  
              $this->idfaccom = "";  
              $this->idpro = "";  
              $this->idbod = "";  
              $this->cantidad = "";  
              $this->valorunit = "";  
              $this->valorpar = "";  
              $this->iva = "";  
              $this->descuento = "0";  
              $this->tasaiva = "";  
              $this->tasadesc = "";  
              $this->devuelto = "";  
              $this->colores = "";  
              $this->tallas = "";  
              $this->sabor = "";  
              $this->vencimiento = "";  
              $this->vencimiento_hora = "" ;  
              $this->lote = "";  
              $this->presentacion = "";  
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['foreign_key'] as $sFKName => $sFKValue)
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
      $this->nm_proc_onload();
  }
//
function actualiza_stock()
{
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_valorpar)) {$this->sc_temp_valorpar = (isset($_SESSION['valorpar'])) ? $_SESSION['valorpar'] : "";}
                         
$proid=$this->idpro ;
$cant=$this->cantidad ;
$cost=$this->valorunit ;
$this->sc_temp_valorpar=round(($this->cantidad *$this->valorunit ), 0);
 
      $nm_select = "SELECT cantidad FROM inventario WHERE idpro=$proid"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 $rx->fields[0] = str_replace(',', '.', $rx->fields[0]);
                 $rx->fields[0] = (strpos(strtolower($rx->fields[0]), "e")) ? (float)$rx->fields[0] : $rx->fields[0];
                 $rx->fields[0] = (string)$rx->fields[0];
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->ds[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
;
if(empty($this->ds [0][0]))
{
	$sql="UPDATE productos SET stockmen = $cant WHERE idprod=$proid";
	
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
                detallecompra_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	$sql="UPDATE productos SET costomen = $cost WHERE idprod=$proid";
	
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
                detallecompra_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
}
else
	{
		$sql="UPDATE productos SET stockmen = (SELECT SUM(cantidad) FROM inventario WHERE idpro=$proid)+$cant WHERE idprod=$proid";
		
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
                detallecompra_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		$sql1="UPDATE productos SET costomen = $cost WHERE idprod=$proid";
		
     $nm_select = $sql1; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                detallecompra_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	}
if (isset($this->sc_temp_valorpar)) { $_SESSION['valorpar'] = $this->sc_temp_valorpar;}
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'off';
}
function actualiza_stock_edita()
{
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_edit_cantidad)) {$this->sc_temp_edit_cantidad = (isset($_SESSION['edit_cantidad'])) ? $_SESSION['edit_cantidad'] : "";}
                         
$proid=$this->idpro ;
$cost=$this->valorunit ;
if($this->sc_temp_edit_cantidad>$this->cantidad )
{
	$cant=$this->sc_temp_edit_cantidad-$this->cantidad ;
	$sql="UPDATE productos SET stockmen = (SELECT SUM(cantidad) FROM inventario WHERE idpro=$proid)-$cant WHERE idprod=$proid";
	
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
                detallecompra_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	$sql="UPDATE productos SET costomen = $cost WHERE idprod=$proid";
	
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
                detallecompra_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	goto salir;
}

else if($this->sc_temp_edit_cantidad==0)
		{
		 	$sql="UPDATE productos SET costomen = $cost WHERE idprod=$proid";
			
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
                detallecompra_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			goto nosuma;
		}
		else { 
				$cant=$this->cantidad -$this->sc_temp_edit_cantidad;
				$sql="UPDATE productos SET stockmen = (SELECT SUM(cantidad) FROM inventario WHERE idpro=$proid)+$cant WHERE 					idprod=$proid";
				
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
                detallecompra_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
				$sql="UPDATE productos SET costomen = $cost WHERE idprod=$proid";
				
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
                detallecompra_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			 }
nosuma:
salir:
$this->sc_temp_edit_cantidad=0;
if (isset($this->sc_temp_edit_cantidad)) { $_SESSION['edit_cantidad'] = $this->sc_temp_edit_cantidad;}
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'off';
}
function actualiza_stock_elimina()
{
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_cost_ant)) {$this->sc_temp_cost_ant = (isset($_SESSION['cost_ant'])) ? $_SESSION['cost_ant'] : "";}
                         
$proid=$this->idpro ;
$cant=$this->cantidad ;
$cost=$this->sc_temp_cost_ant;
 
      $nm_select = "SELECT stockmen FROM productos WHERE idprod=$proid"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 $rx->fields[0] = str_replace(',', '.', $rx->fields[0]);
                 $rx->fields[0] = (strpos(strtolower($rx->fields[0]), "e")) ? (float)$rx->fields[0] : $rx->fields[0];
                 $rx->fields[0] = (string)$rx->fields[0];
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->ds[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
;
if(!empty($this->ds[0][0]))
	{
		$stoc=$this->ds[0][0]-$cant;
		$sql="UPDATE productos SET stockmen = $stoc WHERE idprod=$proid";
		
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
                detallecompra_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		$sql="UPDATE productos SET costomen = $cost WHERE idprod=$proid";
		
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
                detallecompra_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	}
if (isset($this->sc_temp_cost_ant)) { $_SESSION['cost_ant'] = $this->sc_temp_cost_ant;}
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'off';
}
function calcula_valor()
{
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_regimen_emp)) {$this->sc_temp_regimen_emp = (isset($_SESSION['regimen_emp'])) ? $_SESSION['regimen_emp'] : "";}
                         
$this->valorpar =round(($this->cantidad *$this->valorunit ),0);
if($this->sc_temp_regimen_emp==1)
	{
	$viva=$this->tasaiva ;
	$viva=$viva/100;
	$b=$this->valorpar *$viva; $b=round($b, 0);
	$this->iva =$b;
	}


if (isset($this->sc_temp_regimen_emp)) { $_SESSION['regimen_emp'] = $this->sc_temp_regimen_emp;}
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'off';
}
function cantidad_onChange()
{
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'on';
                         
$original_idpro = $this->idpro;
$original_colores = $this->colores;
$original_tallas = $this->tallas;
$original_sabor = $this->sabor;
$original_valorunit = $this->valorunit;
$original_cantidad = $this->cantidad;
$original_valorpar = $this->valorpar;
$original_tasaiva = $this->tasaiva;
$original_iva = $this->iva;

$idp=$this->idpro ;
$col=$this->colores ;
$tal=$this->tallas ;
$sa=$this->sabor ;
 
      $nm_select = "select colores, tallas, sabores from productos where idprod=$idp"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dat = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->dat[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dat = false;
          $this->dat_erro = $this->Db->ErrorMsg();
      } 
;	
if($this->dat[0][0]=='SI')
	{
	if($col>0)
		{
		if($this->dat[0][1]=='SI')
			{
			if($tal>0)
				{
				if($this->dat[0][2]=='SI')
					{
					if($sa>0)
						{
						goto et;
						}
					else
						{
						$this->sc_set_focus('sabor');
						$this->nm_mens_alert[] = "Por favor seleccione el SABOR!"; if ($this->NM_ajax_flag) { $this->sc_ajax_alert("Por favor seleccione el SABOR!"); }goto et2;
						}
					}
				else
					{
					goto et;
					}
				}
			else
				{
				$this->sc_set_focus('tallas');
				$this->nm_mens_alert[] = "Por favor seleccione la TALLA!"; if ($this->NM_ajax_flag) { $this->sc_ajax_alert("Por favor seleccione la TALLA!"); }goto et2;
				}
			}
		else
			{
			if($this->dat[0][2]=='SI')
					{
					if($sa>0)
						{
						goto et;
						}
					else
						{
						$this->sc_set_focus('sabor');
						$this->nm_mens_alert[] = "Por favor seleccione el SABOR!"; if ($this->NM_ajax_flag) { $this->sc_ajax_alert("Por favor seleccione el SABOR!"); }goto et2;
						}
					}
				else
					{
					goto et;
					}
			}
		}
	else
			{
			$this->sc_set_focus('colores');
			$this->nm_mens_alert[] = "Por favor seleccione el COLOR!"; if ($this->NM_ajax_flag) { $this->sc_ajax_alert("Por favor seleccione el COLOR!"); }goto et2;
			}
	}
else
	{
	if($this->dat[0][1]=='SI')
			{
			if($tal>0)
				{
				if($this->dat[0][2]=='SI')
					{
					if($sa>0)
						{
						goto et;
						}
					else
						{
						$this->sc_set_focus('sabor');
						$this->nm_mens_alert[] = "Por favor seleccione el SABOR!"; if ($this->NM_ajax_flag) { $this->sc_ajax_alert("Por favor seleccione el SABOR!"); }goto et2;
						}
					}
				else
					{
					goto et;
					}
				}
			else
				{
				$this->sc_set_focus('tallas');
				$this->nm_mens_alert[] = "Por favor seleccione la TALLA!"; if ($this->NM_ajax_flag) { $this->sc_ajax_alert("Por favor seleccione la TALLA!"); }goto et2;
				}
			}
		else
			{
			if($this->dat[0][2]=='SI')
					{
					if($sa>0)
						{
						goto et;
						}
					else
						{
						$this->sc_set_focus('sabor');
						$this->nm_mens_alert[] = "Por favor seleccione el SABOR!"; if ($this->NM_ajax_flag) { $this->sc_ajax_alert("Por favor seleccione el SABOR!"); }goto et2;
						}
					}
				else
					{
					goto et;
					}
			}
	}

et:;
	if($this->valorunit =="")
		{
		$this->sc_set_focus('valorunit');
		}
	else
		{
	$this->calcula_valor();
		}
goto et3;
et2:;
$this->cantidad =0;
et3:;



$modificado_idpro = $this->idpro;
$modificado_colores = $this->colores;
$modificado_tallas = $this->tallas;
$modificado_sabor = $this->sabor;
$modificado_valorunit = $this->valorunit;
$modificado_cantidad = $this->cantidad;
$modificado_valorpar = $this->valorpar;
$modificado_tasaiva = $this->tasaiva;
$modificado_iva = $this->iva;
$this->nm_formatar_campos('idpro', 'colores', 'tallas', 'sabor', 'valorunit', 'cantidad', 'valorpar', 'tasaiva', 'iva');
if ($original_idpro !== $modificado_idpro || (isset($bFlagRead_idpro) && $bFlagRead_idpro))
{
    $this->ajax_return_values_idpro(true);
}
if ($original_colores !== $modificado_colores || (isset($bFlagRead_colores) && $bFlagRead_colores))
{
    $this->ajax_return_values_colores(true);
}
if ($original_tallas !== $modificado_tallas || (isset($bFlagRead_tallas) && $bFlagRead_tallas))
{
    $this->ajax_return_values_tallas(true);
}
if ($original_sabor !== $modificado_sabor || (isset($bFlagRead_sabor) && $bFlagRead_sabor))
{
    $this->ajax_return_values_sabor(true);
}
if ($original_valorunit !== $modificado_valorunit || (isset($bFlagRead_valorunit) && $bFlagRead_valorunit))
{
    $this->ajax_return_values_valorunit(true);
}
if ($original_cantidad !== $modificado_cantidad || (isset($bFlagRead_cantidad) && $bFlagRead_cantidad))
{
    $this->ajax_return_values_cantidad(true);
}
if ($original_valorpar !== $modificado_valorpar || (isset($bFlagRead_valorpar) && $bFlagRead_valorpar))
{
    $this->ajax_return_values_valorpar(true);
}
if ($original_tasaiva !== $modificado_tasaiva || (isset($bFlagRead_tasaiva) && $bFlagRead_tasaiva))
{
    $this->ajax_return_values_tasaiva(true);
}
if ($original_iva !== $modificado_iva || (isset($bFlagRead_iva) && $bFlagRead_iva))
{
    $this->ajax_return_values_iva(true);
}
detallecompra_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'off';
}
function cantidad_onFocus()
{
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_edit_cantidad)) {$this->sc_temp_edit_cantidad = (isset($_SESSION['edit_cantidad'])) ? $_SESSION['edit_cantidad'] : "";}
if (!isset($this->sc_temp_sw)) {$this->sc_temp_sw = (isset($_SESSION['sw'])) ? $_SESSION['sw'] : "";}
                         
$original_cantidad = $this->cantidad;


if($this->sc_temp_sw==0){
	if($this->cantidad !="")
	{
		$this->sc_temp_edit_cantidad=$this->cantidad ;
	}
	$this->sc_temp_sw=1;
	}




if (isset($this->sc_temp_sw)) { $_SESSION['sw'] = $this->sc_temp_sw;}
if (isset($this->sc_temp_edit_cantidad)) { $_SESSION['edit_cantidad'] = $this->sc_temp_edit_cantidad;}
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'off';
$modificado_cantidad = $this->cantidad;
$this->nm_formatar_campos('cantidad');
if ($original_cantidad !== $modificado_cantidad || (isset($bFlagRead_cantidad) && $bFlagRead_cantidad))
{
    $this->ajax_return_values_cantidad(true);
}
detallecompra_mob_pack_ajax_response();
exit;
}
function colores_onChange()
{
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'on';
                         

$this->sc_set_focus('tallas');

$this->nm_formatar_campos();
detallecompra_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'off';
}
function idpro_onChange()
{
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'on';
                         
$original_cantidad = $this->cantidad;
$original_tasaiva = $this->tasaiva;
$original_valorunit = $this->valorunit;
$original_valorpar = $this->valorpar;
$original_iva = $this->iva;
$original_idpro = $this->idpro;
$original_tasadesc = $this->tasadesc;
$original_devuelto = $this->devuelto;
$original_presentacion = $this->presentacion;

$this->cantidad ="";
$this->tasaiva =0;
$this->valorunit ="";
$this->valorpar ="";
$this->iva ="";

 
      $nm_select = "select idiva from productos where idprod=$this->idpro "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->ds = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
;
$tiva=substr($this->ds , 5);
 
      $nm_select = "select trifa from iva where idiva=$tiva"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->ds = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
;
$this->tasaiva =substr($this->ds , 5);
$this->tasadesc =0;
$this->devuelto =0;

$sql="select unidmaymen, unimay, unimen from productos where idprod=$this->idpro ";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->ds[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
;
$resp=$this->ds[0][0];

if($resp=="SI")
	{
	$this->presentacion =$this->ds[0][1];
	$this->nm_mens_alert[] = "Introduzca cantidad en unidad Mayor!"; if ($this->NM_ajax_flag) { $this->sc_ajax_alert("Introduzca cantidad en unidad Mayor!"); }}
else
	{
	$this->presentacion =$this->ds[0][2];
	}

$this->sc_set_focus('colores');





$modificado_cantidad = $this->cantidad;
$modificado_tasaiva = $this->tasaiva;
$modificado_valorunit = $this->valorunit;
$modificado_valorpar = $this->valorpar;
$modificado_iva = $this->iva;
$modificado_idpro = $this->idpro;
$modificado_tasadesc = $this->tasadesc;
$modificado_devuelto = $this->devuelto;
$modificado_presentacion = $this->presentacion;
$this->nm_formatar_campos('cantidad', 'tasaiva', 'valorunit', 'valorpar', 'iva', 'idpro', 'tasadesc', 'devuelto', 'presentacion');
if ($original_cantidad !== $modificado_cantidad || (isset($bFlagRead_cantidad) && $bFlagRead_cantidad))
{
    $this->ajax_return_values_cantidad(true);
}
if ($original_tasaiva !== $modificado_tasaiva || (isset($bFlagRead_tasaiva) && $bFlagRead_tasaiva))
{
    $this->ajax_return_values_tasaiva(true);
}
if ($original_valorunit !== $modificado_valorunit || (isset($bFlagRead_valorunit) && $bFlagRead_valorunit))
{
    $this->ajax_return_values_valorunit(true);
}
if ($original_valorpar !== $modificado_valorpar || (isset($bFlagRead_valorpar) && $bFlagRead_valorpar))
{
    $this->ajax_return_values_valorpar(true);
}
if ($original_iva !== $modificado_iva || (isset($bFlagRead_iva) && $bFlagRead_iva))
{
    $this->ajax_return_values_iva(true);
}
if ($original_idpro !== $modificado_idpro || (isset($bFlagRead_idpro) && $bFlagRead_idpro))
{
    $this->ajax_return_values_idpro(true);
}
if ($original_tasadesc !== $modificado_tasadesc || (isset($bFlagRead_tasadesc) && $bFlagRead_tasadesc))
{
    $this->ajax_return_values_tasadesc(true);
}
if ($original_devuelto !== $modificado_devuelto || (isset($bFlagRead_devuelto) && $bFlagRead_devuelto))
{
    $this->ajax_return_values_devuelto(true);
}
if ($original_presentacion !== $modificado_presentacion || (isset($bFlagRead_presentacion) && $bFlagRead_presentacion))
{
    $this->ajax_return_values_presentacion(true);
}
detallecompra_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'off';
}
function sabor_onChange()
{
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'on';
                         

$this->sc_set_focus('cantidad');

$this->nm_formatar_campos();
detallecompra_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'off';
}
function tallas_onChange()
{
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'on';
                         

$this->sc_set_focus('sabor');

$this->nm_formatar_campos();
detallecompra_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'off';
}
function update_master()
{
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_par_idfaccom)) {$this->sc_temp_par_idfaccom = (isset($_SESSION['par_idfaccom'])) ? $_SESSION['par_idfaccom'] : "";}
                         
$sql="SELECT sum(valorpar), sum(iva) FROM detallecompra WHERE idfaccom=$this->sc_temp_par_idfaccom";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->ds[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
;
$stotal=$this->ds[0][0];
$siva=$this->ds[0][1];
$total=$stotal+$siva;
if(!empty($this->ds[0][0]))
{
	
     $nm_select ="UPDATE facturacom SET subtotal=$stotal, valoriva=$siva, total=$total, saldo=$total WHERE idfaccom=$this->sc_temp_par_idfaccom"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                detallecompra_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	$stotal= number_format($stotal,0,",",".");
	$siva= number_format($siva,0,",",".");
	$total= number_format($total,0,",",".");
	$this->sc_master_value('subtotal', $stotal);
	$this->sc_master_value('valoriva', $siva);
	$this->sc_master_value('total', $total);
	$this->sc_master_value('saldo', $total);
	
	
}

else
	{
		
     $nm_select ="UPDATE facturacom SET subtotal=0, valoriva=0, total=0 WHERE idfaccom=$this->sc_temp_par_idfaccom"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                detallecompra_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		$stotal= 0;
		$siva=0;
		$total=0;
		
		$this->sc_master_value('subtotal', $stotal);
		$this->sc_master_value('valoriva', $siva);
		$this->sc_master_value('total', $total);
		
	}
if (isset($this->sc_temp_par_idfaccom)) { $_SESSION['par_idfaccom'] = $this->sc_temp_par_idfaccom;}
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'off';
}
function valorunit_onChange()
{
$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'on';
                         
$original_cantidad = $this->cantidad;
$original_valorpar = $this->valorpar;
$original_valorunit = $this->valorunit;
$original_tasaiva = $this->tasaiva;
$original_iva = $this->iva;

if($this->cantidad =="" or $this->cantidad ==0)
	{
	$this->sc_set_focus('cantidad');
	}
else
	{
$this->calcula_valor();
	$this->sc_set_focus('idbod');
	}

$modificado_cantidad = $this->cantidad;
$modificado_valorpar = $this->valorpar;
$modificado_valorunit = $this->valorunit;
$modificado_tasaiva = $this->tasaiva;
$modificado_iva = $this->iva;
$this->nm_formatar_campos('cantidad', 'valorpar', 'valorunit', 'tasaiva', 'iva');
if ($original_cantidad !== $modificado_cantidad || (isset($bFlagRead_cantidad) && $bFlagRead_cantidad))
{
    $this->ajax_return_values_cantidad(true);
}
if ($original_valorpar !== $modificado_valorpar || (isset($bFlagRead_valorpar) && $bFlagRead_valorpar))
{
    $this->ajax_return_values_valorpar(true);
}
if ($original_valorunit !== $modificado_valorunit || (isset($bFlagRead_valorunit) && $bFlagRead_valorunit))
{
    $this->ajax_return_values_valorunit(true);
}
if ($original_tasaiva !== $modificado_tasaiva || (isset($bFlagRead_tasaiva) && $bFlagRead_tasaiva))
{
    $this->ajax_return_values_tasaiva(true);
}
if ($original_iva !== $modificado_iva || (isset($bFlagRead_iva) && $bFlagRead_iva))
{
    $this->ajax_return_values_iva(true);
}
detallecompra_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['detallecompra_mob']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              detallecompra_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
    include_once("detallecompra_mob_form0.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['table_refresh'])
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
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['csrf_token'];
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

 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

 function new_date_format($type, $field)
 {
     $new_date_format = '';

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
             $new_date_format .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format .= $time_sep;
         }
         else
         {
             $new_date_format .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format;
     if ('DH' == $type)
     {
         $new_date_format                                      = explode(';', $new_date_format);
         $this->field_config[$field]['date_format_js']        = $new_date_format[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              detallecompra_mob_pack_ajax_response();
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
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "iddet", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "idfaccom", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "idpro", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_idbod($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "idbod", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "cantidad", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "valorunit", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "valorpar", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "iva", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "descuento", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "tasaiva", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "tasadesc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "devuelto", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "idfaccom", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_idpro($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "idpro", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_colores($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "colores", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_tallas($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "tallas", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_sabor($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "sabor", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "cantidad", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "valorunit", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "valorpar", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "iva", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_idbod($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "idbod", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "descuento", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "tasaiva", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "tasadesc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "devuelto", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "lote", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['where_filter_form'] . " and (idfaccom=" . $_SESSION['par_idfaccom'] . "
and cantidad >0) and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where idfaccom=" . $_SESSION['par_idfaccom'] . "
and cantidad >0 and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_detallecompra_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['total'] = $qt_geral_reg_detallecompra_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          detallecompra_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          detallecompra_mob_pack_ajax_response();
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
      $nm_numeric[] = "iddet";$nm_numeric[] = "idfaccom";$nm_numeric[] = "idpro";$nm_numeric[] = "idbod";$nm_numeric[] = "cantidad";$nm_numeric[] = "valorunit";$nm_numeric[] = "valorpar";$nm_numeric[] = "iva";$nm_numeric[] = "descuento";$nm_numeric[] = "tasaiva";$nm_numeric[] = "tasadesc";$nm_numeric[] = "devuelto";$nm_numeric[] = "colores";$nm_numeric[] = "tallas";$nm_numeric[] = "sabor";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['decimal_db'] == ".")
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
      $Nm_datas['vencimiento'] = "date";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['SC_sep_date1'];
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
          elseif (substr($Nm_datas[$campo_join], 0, 4) == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          {
              $nome = "str_replace (convert(char(10)," . $nome . ",102), '.', '-') + ' ' + convert(char(8)," . $nome . ",20)";
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
                 $prep .= $nm_aspas . $Cmp . $nm_aspas1;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         switch (strtoupper($condicao))
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." like '%" . $campo . "%'";
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." not like '%" . $campo . "%'";
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GT":     // 
               $comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GE":     // 
               $comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LT":     // 
               $comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LE":     // 
               $comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
            break;
         }
   }
   function SC_lookup_idpro($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
      if (in_array(strtolower($this->Ini->nm_con_conn_mysql['tpbanco']), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT codigobar + \" - \" + nompro, idprod FROM productos WHERE (codigobar + \" - \" + nompro LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_con_conn_mysql['tpbanco']), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(codigobar,\" - \",nompro), idprod FROM productos WHERE (concat(codigobar,\" - \",nompro) LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_con_conn_mysql['tpbanco']), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT codigobar&\" - \"&nompro, idprod FROM productos WHERE (codigobar&\" - \"&nompro LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_con_conn_mysql['tpbanco']), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT codigobar||\" - \"||nompro, idprod FROM productos WHERE (codigobar||\" - \"||nompro LIKE '%$campo%')" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT codigobar||\" - \"||nompro, idprod FROM productos WHERE (codigobar||\" - \"||nompro LIKE '%$campo%')" ; 
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
   function SC_lookup_idbod($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT bodega, idbodega FROM bodegas WHERE (bodega LIKE '%$campo%')" ; 
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
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['sc_outra_jan'])
   {
       $nmgp_saida_form = "detallecompra_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "detallecompra_mob_fim.php";
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
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = '_self';
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       detallecompra_mob_pack_ajax_response();
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
     <INPUT type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['masterValue']))
{
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['masterValue'] as $cmp_master => $val_master)
{
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
}
unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['masterValue']);
?>
}
<?php
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
    function sc_set_focus($sFieldName)
    {
        $sFieldName = strtolower($sFieldName);
        $aFocus = array(
                        'idfaccom' => 'idfaccom',
                        'idpro' => 'idpro',
                        'colores' => 'colores',
                        'tallas' => 'tallas',
                        'sabor' => 'sabor',
                        'cantidad' => 'cantidad',
                        'presentacion' => 'presentacion',
                        'valorunit' => 'valorunit',
                        'valorpar' => 'valorpar',
                        'iva' => 'iva',
                        'idbod' => 'idbod',
                        'descuento' => 'descuento',
                        'tasaiva' => 'tasaiva',
                        'tasadesc' => 'tasadesc',
                        'devuelto' => 'devuelto',
                        'vencimiento' => 'vencimiento',
                        'lote' => 'lote',
                       );
        if (isset($aFocus[$sFieldName]))
        {
            $this->NM_ajax_info['focus'] = $aFocus[$sFieldName];
        }
    } // sc_set_focus
    function sc_master_value($sIndex, $sValue)
    {
        $sIndex = strtolower($sIndex);
        $this->NM_ajax_info['masterValue'][$sIndex] = $sValue;
        $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_mob']['masterValue'] = $this->NM_ajax_info['masterValue'];
    } // sc_master_value
    function sc_ajax_alert($sMessage)
    {
        if ($this->NM_ajax_flag)
        {
            $this->NM_ajax_info['ajaxAlert']['message'] = NM_charset_to_utf8($sMessage);
        }
    } // sc_ajax_alert
}
?>
