<?php
//
class terceros_cliente_mob_apl
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
   var $idtercero;
   var $documento;
   var $nombres;
   var $direccion;
   var $tel_cel;
   var $nacimiento;
   var $sexo;
   var $sexo_1;
   var $urlmail;
   var $fechault;
   var $saldo;
   var $afiliacion;
   var $idmuni;
   var $idmuni_1;
   var $observaciones;
   var $credito;
   var $credito_1;
   var $cupo;
   var $listaprecios;
   var $listaprecios_1;
   var $loatiende;
   var $loatiende_1;
   var $con_actual;
   var $con_actual_hora;
   var $efec_retencion;
   var $efec_retencion_1;
   var $regimen;
   var $regimen_1;
   var $tipo;
   var $tipo_1;
   var $cliente;
   var $cliente_1;
   var $empleado;
   var $empleado_1;
   var $proveedor;
   var $proveedor_1;
   var $contacto;
   var $telefonos_prov;
   var $email;
   var $url;
   var $creditoprov;
   var $creditoprov_1;
   var $dias;
   var $fechultcomp;
   var $saldoapagar;
   var $autoretenedor;
   var $autoretenedor_1;
   var $tipo_documento;
   var $tipo_documento_1;
   var $dv;
   var $nombre1;
   var $nombre2;
   var $apellido1;
   var $apellido2;
   var $sucur_cliente;
   var $sucur_cliente_1;
   var $representante;
   var $imagenter;
   var $imagenter_scfile_name;
   var $imagenter_ul_name;
   var $imagenter_scfile_type;
   var $imagenter_ul_type;
   var $imagenter_limpa;
   var $imagenter_salva;
   var $out_imagenter;
   var $es_restaurante;
   var $cupodis;
   var $departamento;
   var $departamento_1;
   var $relleno2;
   var $sucursales;
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
   var $nm_mens_form_ins;
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
          if (isset($this->NM_ajax_info['param']['apellido1']))
          {
              $this->apellido1 = $this->NM_ajax_info['param']['apellido1'];
          }
          if (isset($this->NM_ajax_info['param']['apellido2']))
          {
              $this->apellido2 = $this->NM_ajax_info['param']['apellido2'];
          }
          if (isset($this->NM_ajax_info['param']['cliente']))
          {
              $this->cliente = $this->NM_ajax_info['param']['cliente'];
          }
          if (isset($this->NM_ajax_info['param']['credito']))
          {
              $this->credito = $this->NM_ajax_info['param']['credito'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['cupo']))
          {
              $this->cupo = $this->NM_ajax_info['param']['cupo'];
          }
          if (isset($this->NM_ajax_info['param']['departamento']))
          {
              $this->departamento = $this->NM_ajax_info['param']['departamento'];
          }
          if (isset($this->NM_ajax_info['param']['direccion']))
          {
              $this->direccion = $this->NM_ajax_info['param']['direccion'];
          }
          if (isset($this->NM_ajax_info['param']['documento']))
          {
              $this->documento = $this->NM_ajax_info['param']['documento'];
          }
          if (isset($this->NM_ajax_info['param']['dv']))
          {
              $this->dv = $this->NM_ajax_info['param']['dv'];
          }
          if (isset($this->NM_ajax_info['param']['es_restaurante']))
          {
              $this->es_restaurante = $this->NM_ajax_info['param']['es_restaurante'];
          }
          if (isset($this->NM_ajax_info['param']['idmuni']))
          {
              $this->idmuni = $this->NM_ajax_info['param']['idmuni'];
          }
          if (isset($this->NM_ajax_info['param']['idtercero']))
          {
              $this->idtercero = $this->NM_ajax_info['param']['idtercero'];
          }
          if (isset($this->NM_ajax_info['param']['imagenter']))
          {
              $this->imagenter = $this->NM_ajax_info['param']['imagenter'];
          }
          if (isset($this->NM_ajax_info['param']['imagenter_limpa']))
          {
              $this->imagenter_limpa = $this->NM_ajax_info['param']['imagenter_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['imagenter_ul_name']))
          {
              $this->imagenter_ul_name = $this->NM_ajax_info['param']['imagenter_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['imagenter_ul_type']))
          {
              $this->imagenter_ul_type = $this->NM_ajax_info['param']['imagenter_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['loatiende']))
          {
              $this->loatiende = $this->NM_ajax_info['param']['loatiende'];
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
          if (isset($this->NM_ajax_info['param']['nombre1']))
          {
              $this->nombre1 = $this->NM_ajax_info['param']['nombre1'];
          }
          if (isset($this->NM_ajax_info['param']['nombre2']))
          {
              $this->nombre2 = $this->NM_ajax_info['param']['nombre2'];
          }
          if (isset($this->NM_ajax_info['param']['nombres']))
          {
              $this->nombres = $this->NM_ajax_info['param']['nombres'];
          }
          if (isset($this->NM_ajax_info['param']['observaciones']))
          {
              $this->observaciones = $this->NM_ajax_info['param']['observaciones'];
          }
          if (isset($this->NM_ajax_info['param']['regimen']))
          {
              $this->regimen = $this->NM_ajax_info['param']['regimen'];
          }
          if (isset($this->NM_ajax_info['param']['representante']))
          {
              $this->representante = $this->NM_ajax_info['param']['representante'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['sexo']))
          {
              $this->sexo = $this->NM_ajax_info['param']['sexo'];
          }
          if (isset($this->NM_ajax_info['param']['tel_cel']))
          {
              $this->tel_cel = $this->NM_ajax_info['param']['tel_cel'];
          }
          if (isset($this->NM_ajax_info['param']['tipo']))
          {
              $this->tipo = $this->NM_ajax_info['param']['tipo'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_documento']))
          {
              $this->tipo_documento = $this->NM_ajax_info['param']['tipo_documento'];
          }
          if (isset($this->NM_ajax_info['param']['urlmail']))
          {
              $this->urlmail = $this->NM_ajax_info['param']['urlmail'];
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
      if (isset($this->pa) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['pa'] = $this->pa;
      }
      if (isset($this->sa) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['sa'] = $this->sa;
      }
      if (isset($this->id_tercero) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['id_tercero'] = $this->id_tercero;
      }
      if (isset($this->pn) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['pn'] = $this->pn;
      }
      if (isset($this->sn) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['sn'] = $this->sn;
      }
      if (isset($this->nomb) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['nomb'] = $this->nomb;
      }
      if (isset($_POST["pa"]) && isset($this->pa)) 
      {
          $_SESSION['pa'] = $this->pa;
      }
      if (isset($_POST["sa"]) && isset($this->sa)) 
      {
          $_SESSION['sa'] = $this->sa;
      }
      if (isset($_POST["id_tercero"]) && isset($this->id_tercero)) 
      {
          $_SESSION['id_tercero'] = $this->id_tercero;
      }
      if (isset($_POST["pn"]) && isset($this->pn)) 
      {
          $_SESSION['pn'] = $this->pn;
      }
      if (isset($_POST["sn"]) && isset($this->sn)) 
      {
          $_SESSION['sn'] = $this->sn;
      }
      if (isset($_POST["nomb"]) && isset($this->nomb)) 
      {
          $_SESSION['nomb'] = $this->nomb;
      }
      if (isset($_GET["pa"]) && isset($this->pa)) 
      {
          $_SESSION['pa'] = $this->pa;
      }
      if (isset($_GET["sa"]) && isset($this->sa)) 
      {
          $_SESSION['sa'] = $this->sa;
      }
      if (isset($_GET["id_tercero"]) && isset($this->id_tercero)) 
      {
          $_SESSION['id_tercero'] = $this->id_tercero;
      }
      if (isset($_GET["pn"]) && isset($this->pn)) 
      {
          $_SESSION['pn'] = $this->pn;
      }
      if (isset($_GET["sn"]) && isset($this->sn)) 
      {
          $_SESSION['sn'] = $this->sn;
      }
      if (isset($_GET["nomb"]) && isset($this->nomb)) 
      {
          $_SESSION['nomb'] = $this->nomb;
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['terceros_cliente_mob']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['terceros_cliente_mob']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['terceros_cliente_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['terceros_cliente_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['terceros_cliente_mob']['embutida_parms']);
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
                 nm_limpa_str_terceros_cliente_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->pa)) 
          {
              $_SESSION['pa'] = $this->pa;
          }
          if (isset($this->sa)) 
          {
              $_SESSION['sa'] = $this->sa;
          }
          if (isset($this->id_tercero)) 
          {
              $_SESSION['id_tercero'] = $this->id_tercero;
          }
          if (isset($this->pn)) 
          {
              $_SESSION['pn'] = $this->pn;
          }
          if (isset($this->sn)) 
          {
              $_SESSION['sn'] = $this->sn;
          }
          if (isset($this->nomb)) 
          {
              $_SESSION['nomb'] = $this->nomb;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['terceros_cliente_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['terceros_cliente_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['terceros_cliente_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['terceros_cliente_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->pa)) 
          {
              $_SESSION['pa'] = $this->pa;
          }
          if (isset($this->sa)) 
          {
              $_SESSION['sa'] = $this->sa;
          }
          if (isset($this->id_tercero)) 
          {
              $_SESSION['id_tercero'] = $this->id_tercero;
          }
          if (isset($this->pn)) 
          {
              $_SESSION['pn'] = $this->pn;
          }
          if (isset($this->sn)) 
          {
              $_SESSION['sn'] = $this->sn;
          }
          if (isset($this->nomb)) 
          {
              $_SESSION['nomb'] = $this->nomb;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['terceros_cliente_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['terceros_cliente_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['terceros_cliente_mob']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['terceros_cliente_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['terceros_cliente_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['terceros_cliente_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['terceros_cliente_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['terceros_cliente_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['terceros_cliente_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['terceros_cliente_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new terceros_cliente_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['initialize'])
          {
              $_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_departamento = $this->departamento;
}
  $this->departamento =23;

if($this->idtercero >0)
	{
	;
	;
	;
	;
	;
	;
	}
else
	{
	;
	;
	;
	;
	;
	;
	}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_departamento != $this->departamento || (isset($bFlagRead_departamento) && $bFlagRead_departamento)))
    {
        $this->ajax_return_values_departamento(true);
    }
}
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off';
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob'][$I_conf]  = $Conf_opt;
              }
          }
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['terceros_cliente_mob']['upload_field_info'] = array();

      $_SESSION['sc_session'][$script_case_init]['terceros_cliente_mob']['upload_field_info']['imagenter'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'terceros_cliente_mob',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/\.(jpg|jpeg|gif|png)$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '0',
          'upload_file_width'  => '0',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['terceros_cliente_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['terceros_cliente_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['terceros_cliente_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['terceros_cliente_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('terceros_cliente_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['terceros_cliente_mob']['label'] = "Actualización datos del cliente";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "terceros_cliente_mob")
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



      $_SESSION['scriptcase']['error_icon']['terceros_cliente_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['terceros_cliente_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      if (isset($this->NM_ajax_info['param']['imagenter_ul_name']) && '' != $this->NM_ajax_info['param']['imagenter_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['upload_field_ul_name'][$this->imagenter_ul_name]))
          {
              $this->NM_ajax_info['param']['imagenter_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['upload_field_ul_name'][$this->imagenter_ul_name];
          }
          $this->imagenter = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter_ul_name'];
          $this->imagenter_scfile_name = substr($this->NM_ajax_info['param']['imagenter_ul_name'], 12);
          $this->imagenter_scfile_type = $this->NM_ajax_info['param']['imagenter_ul_type'];
          $this->imagenter_ul_name = $this->NM_ajax_info['param']['imagenter_ul_name'];
          $this->imagenter_ul_type = $this->NM_ajax_info['param']['imagenter_ul_type'];
      }
      elseif (isset($this->imagenter_ul_name) && '' != $this->imagenter_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['upload_field_ul_name'][$this->imagenter_ul_name]))
          {
              $this->imagenter_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['upload_field_ul_name'][$this->imagenter_ul_name];
          }
          $this->imagenter = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter_ul_name;
          $this->imagenter_scfile_name = substr($this->imagenter_ul_name, 12);
          $this->imagenter_scfile_type = $this->imagenter_ul_type;
      }

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['goto']      = 'on';
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
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_orig'] = " where cliente='SI'";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_pesq'] = " where cliente='SI'";
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_cliente_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['terceros_cliente_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['terceros_cliente_mob'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_form'];
          if (!isset($this->idtercero)){$this->idtercero = $this->nmgp_dados_form['idtercero'];} 
          if (!isset($this->nacimiento)){$this->nacimiento = $this->nmgp_dados_form['nacimiento'];} 
          if (!isset($this->fechault)){$this->fechault = $this->nmgp_dados_form['fechault'];} 
          if (!isset($this->saldo)){$this->saldo = $this->nmgp_dados_form['saldo'];} 
          if (!isset($this->afiliacion)){$this->afiliacion = $this->nmgp_dados_form['afiliacion'];} 
          if (!isset($this->listaprecios)){$this->listaprecios = $this->nmgp_dados_form['listaprecios'];} 
          if (!isset($this->con_actual)){$this->con_actual = $this->nmgp_dados_form['con_actual'];} 
          if (!isset($this->efec_retencion)){$this->efec_retencion = $this->nmgp_dados_form['efec_retencion'];} 
          if (!isset($this->empleado)){$this->empleado = $this->nmgp_dados_form['empleado'];} 
          if (!isset($this->proveedor)){$this->proveedor = $this->nmgp_dados_form['proveedor'];} 
          if (!isset($this->contacto)){$this->contacto = $this->nmgp_dados_form['contacto'];} 
          if (!isset($this->telefonos_prov)){$this->telefonos_prov = $this->nmgp_dados_form['telefonos_prov'];} 
          if (!isset($this->email)){$this->email = $this->nmgp_dados_form['email'];} 
          if (!isset($this->url)){$this->url = $this->nmgp_dados_form['url'];} 
          if (!isset($this->creditoprov)){$this->creditoprov = $this->nmgp_dados_form['creditoprov'];} 
          if (!isset($this->dias)){$this->dias = $this->nmgp_dados_form['dias'];} 
          if (!isset($this->fechultcomp)){$this->fechultcomp = $this->nmgp_dados_form['fechultcomp'];} 
          if (!isset($this->saldoapagar)){$this->saldoapagar = $this->nmgp_dados_form['saldoapagar'];} 
          if (!isset($this->autoretenedor)){$this->autoretenedor = $this->nmgp_dados_form['autoretenedor'];} 
          if (!isset($this->sucur_cliente)){$this->sucur_cliente = $this->nmgp_dados_form['sucur_cliente'];} 
          if (!isset($this->cupodis)){$this->cupodis = $this->nmgp_dados_form['cupodis'];} 
          if (!isset($this->relleno2)){$this->relleno2 = $this->nmgp_dados_form['relleno2'];} 
          if (!isset($this->sucursales)){$this->sucursales = $this->nmgp_dados_form['sucursales'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("terceros_cliente_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'terceros_cliente_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'terceros_cliente_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'terceros_cliente/terceros_cliente_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "terceros_cliente_mob_erro.class.php"); 
      }
      $this->Erro      = new terceros_cliente_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['opcao']))
         { 
             if ($this->idtercero != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['terceros_cliente_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_form'];
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
      if (!isset($this->NM_ajax_flag) || ('validate_' != substr($this->NM_ajax_opcao, 0, 9) && 'add_new_line' != $this->NM_ajax_opcao && 'autocomp_' != substr($this->NM_ajax_opcao, 0, 9)))
      {
      $_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_id_tercero)) {$this->sc_temp_id_tercero = (isset($_SESSION['id_tercero'])) ? $_SESSION['id_tercero'] : "";}
  $this->sc_temp_id_tercero=0;

if($this->idtercero >0)
	{
	;
	;
	;
	;
	;
	;
	}
else
	{
	;
	;
	;
	;
	;
	;
	}
if (isset($this->sc_temp_id_tercero)) { $_SESSION['id_tercero'] = $this->sc_temp_id_tercero;}
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off'; 
      }
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['terceros_cliente_mob']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['terceros_cliente_mob']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
      if (isset($this->documento)) { $this->nm_limpa_alfa($this->documento); }
      if (isset($this->nombres)) { $this->nm_limpa_alfa($this->nombres); }
      if (isset($this->direccion)) { $this->nm_limpa_alfa($this->direccion); }
      if (isset($this->tel_cel)) { $this->nm_limpa_alfa($this->tel_cel); }
      if (isset($this->sexo)) { $this->nm_limpa_alfa($this->sexo); }
      if (isset($this->urlmail)) { $this->nm_limpa_alfa($this->urlmail); }
      if (isset($this->idmuni)) { $this->nm_limpa_alfa($this->idmuni); }
      if (isset($this->observaciones)) { $this->nm_limpa_alfa($this->observaciones); }
      if (isset($this->credito)) { $this->nm_limpa_alfa($this->credito); }
      if (isset($this->cupo)) { $this->nm_limpa_alfa($this->cupo); }
      if (isset($this->loatiende)) { $this->nm_limpa_alfa($this->loatiende); }
      if (isset($this->regimen)) { $this->nm_limpa_alfa($this->regimen); }
      if (isset($this->tipo)) { $this->nm_limpa_alfa($this->tipo); }
      if (isset($this->cliente)) { $this->nm_limpa_alfa($this->cliente); }
      if (isset($this->tipo_documento)) { $this->nm_limpa_alfa($this->tipo_documento); }
      if (isset($this->dv)) { $this->nm_limpa_alfa($this->dv); }
      if (isset($this->nombre1)) { $this->nm_limpa_alfa($this->nombre1); }
      if (isset($this->nombre2)) { $this->nm_limpa_alfa($this->nombre2); }
      if (isset($this->apellido1)) { $this->nm_limpa_alfa($this->apellido1); }
      if (isset($this->apellido2)) { $this->nm_limpa_alfa($this->apellido2); }
      if (isset($this->representante)) { $this->nm_limpa_alfa($this->representante); }
      if (isset($this->es_restaurante)) { $this->nm_limpa_alfa($this->es_restaurante); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- dv
      $this->field_config['dv']               = array();
      $this->field_config['dv']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dv']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dv']['symbol_dec'] = '';
      $this->field_config['dv']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dv']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- cupo
      $this->field_config['cupo']               = array();
      $this->field_config['cupo']['symbol_grp'] = ',';
      $this->field_config['cupo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['cupo']['symbol_dec'] = '.';
      $this->field_config['cupo']['symbol_mon'] = '$';
      $this->field_config['cupo']['format_pos'] = '3';
      $this->field_config['cupo']['format_neg'] = '4';
      //-- idtercero
      $this->field_config['idtercero']               = array();
      $this->field_config['idtercero']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idtercero']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idtercero']['symbol_dec'] = '';
      $this->field_config['idtercero']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idtercero']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- nacimiento
      $this->field_config['nacimiento']                 = array();
      $this->field_config['nacimiento']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['nacimiento']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['nacimiento']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'nacimiento');
      //-- fechault
      $this->field_config['fechault']                 = array();
      $this->field_config['fechault']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fechault']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechault']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fechault');
      //-- saldo
      $this->field_config['saldo']               = array();
      $this->field_config['saldo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['saldo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['saldo']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['saldo']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['saldo']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['saldo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- afiliacion
      $this->field_config['afiliacion']                 = array();
      $this->field_config['afiliacion']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['afiliacion']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['afiliacion']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'afiliacion');
      //-- con_actual
      $this->field_config['con_actual']                 = array();
      $this->field_config['con_actual']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['con_actual']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['con_actual']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['con_actual']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'con_actual');
      //-- dias
      $this->field_config['dias']               = array();
      $this->field_config['dias']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dias']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dias']['symbol_dec'] = '';
      $this->field_config['dias']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dias']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fechultcomp
      $this->field_config['fechultcomp']                 = array();
      $this->field_config['fechultcomp']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fechultcomp']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechultcomp']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fechultcomp');
      //-- saldoapagar
      $this->field_config['saldoapagar']               = array();
      $this->field_config['saldoapagar']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['saldoapagar']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['saldoapagar']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['saldoapagar']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['saldoapagar']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['saldoapagar']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- cupodis
      $this->field_config['cupodis']               = array();
      $this->field_config['cupodis']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['cupodis']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['cupodis']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['cupodis']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['cupodis']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['cupodis']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
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
          if ('validate_tipo_documento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_documento');
          }
          if ('validate_documento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'documento');
          }
          if ('validate_dv' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dv');
          }
          if ('validate_imagenter' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'imagenter');
          }
          if ('validate_nombre1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nombre1');
          }
          if ('validate_nombre2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nombre2');
          }
          if ('validate_apellido1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'apellido1');
          }
          if ('validate_apellido2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'apellido2');
          }
          if ('validate_tel_cel' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tel_cel');
          }
          if ('validate_urlmail' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'urlmail');
          }
          if ('validate_nombres' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nombres');
          }
          if ('validate_representante' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'representante');
          }
          if ('validate_sexo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sexo');
          }
          if ('validate_tipo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo');
          }
          if ('validate_regimen' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'regimen');
          }
          if ('validate_direccion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'direccion');
          }
          if ('validate_departamento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'departamento');
          }
          if ('validate_idmuni' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idmuni');
          }
          if ('validate_observaciones' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'observaciones');
          }
          if ('validate_cliente' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cliente');
          }
          if ('validate_es_restaurante' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'es_restaurante');
          }
          if ('validate_credito' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'credito');
          }
          if ('validate_cupo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cupo');
          }
          if ('validate_loatiende' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'loatiende');
          }
          terceros_cliente_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          if ('event_apellido1_onchange' == $this->NM_ajax_opcao)
          {
              $this->apellido1_onChange();
          }
          if ('event_apellido2_onchange' == $this->NM_ajax_opcao)
          {
              $this->apellido2_onChange();
          }
          if ('event_cliente_onchange' == $this->NM_ajax_opcao)
          {
              $this->cliente_onChange();
          }
          if ('event_credito_onchange' == $this->NM_ajax_opcao)
          {
              $this->credito_onChange();
          }
          if ('event_creditoprov_onchange' == $this->NM_ajax_opcao)
          {
              $this->creditoprov_onChange();
          }
          if ('event_cupo_onchange' == $this->NM_ajax_opcao)
          {
              $this->cupo_onChange();
          }
          if ('event_documento_onchange' == $this->NM_ajax_opcao)
          {
              $this->documento_onChange();
          }
          if ('event_nombre1_onchange' == $this->NM_ajax_opcao)
          {
              $this->nombre1_onChange();
          }
          if ('event_nombre2_onchange' == $this->NM_ajax_opcao)
          {
              $this->nombre2_onChange();
          }
          if ('event_nombres_onfocus' == $this->NM_ajax_opcao)
          {
              $this->nombres_onFocus();
          }
          if ('event_proveedor_onchange' == $this->NM_ajax_opcao)
          {
              $this->proveedor_onChange();
          }
          if ('event_sucur_cliente_onchange' == $this->NM_ajax_opcao)
          {
              $this->sucur_cliente_onChange();
          }
          if ('event_tipo_onchange' == $this->NM_ajax_opcao)
          {
              $this->tipo_onChange();
          }
          terceros_cliente_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $this->nm_tira_formatacao();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_select']['cupo']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->cupo = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_select']['cupo'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_select']['cliente']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->cliente = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_select']['cliente'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_select']['dias']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->dias = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_select']['dias'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_select']['documento']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->documento = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_select']['documento'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_select']['tipo_documento']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->tipo_documento = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_select']['tipo_documento'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_select']['nombres']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->nombres = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_select']['nombres'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_select']['credito']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->credito = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_select']['credito'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_select']['cupodis']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->cupodis = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_select']['cupodis'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_select']['regimen']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->regimen = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_select']['regimen'];
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              terceros_cliente_mob_pack_ajax_response();
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
          if ($this->nmgp_opcao != "incluir")
          {
              $this->scFormFocusErrorName = '';
          }
          $_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  terceros_cliente_mob_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['recarga'] = $this->nmgp_opcao;
          if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
          {
              $this->NM_close_db(); 
              $this->nm_tira_formatacao(); 
              $this->nm_gera_mensagem($this->nm_mens_form_ins, "terceros_cliente_mob.php", "", "idtercero?#?$this->idtercero?@?"); 
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cliente = $this->cliente;
    $original_credito = $this->credito;
    $original_cupo = $this->cupo;
    $original_departamento = $this->departamento;
    $original_loatiende = $this->loatiende;
}
  $this->departamento =23;

if($this->idtercero >0)
	{
	;
	;
	;
	;
	;
	;
	}
else
	{
	;
	;
	;
	;
	;
	;
	}
if($this->cliente =='NO')
	{	
	$this->sc_ajax_javascript('nm_field_disabled', array("cliente=disabled", ""));
;
	$this->sc_ajax_javascript('nm_field_disabled', array("cupodis=disabled", ""));
;
		$this->nmgp_cmp_hidden["credito"] = "off"; $this->NM_ajax_info['fieldDisplay']['credito'] = 'off';
		$this->nmgp_cmp_hidden["cupodis"] = "off"; $this->NM_ajax_info['fieldDisplay']['cupodis'] = 'off';
		$this->nmgp_cmp_hidden["cupo"] = "off"; $this->NM_ajax_info['fieldDisplay']['cupo'] = 'off';
		$this->nmgp_cmp_hidden["faccredito"] = "off"; $this->NM_ajax_info['fieldDisplay']['faccredito'] = 'off';
		$this->nmgp_cmp_hidden["efec_retencion"] = "off"; $this->NM_ajax_info['fieldDisplay']['efec_retencion'] = 'off';
		$this->nmgp_cmp_hidden["listaprecios"] = "off"; $this->NM_ajax_info['fieldDisplay']['listaprecios'] = 'off';
		$this->nmgp_cmp_hidden["loatiende"] = "off"; $this->NM_ajax_info['fieldDisplay']['loatiende'] = 'off';
		;
		;
		;
	}
else
		{
		$this->sc_ajax_javascript('nm_field_disabled', array("cupo=disabled;cupodis=disabled", ""));
;
		$this->sc_ajax_javascript('nm_field_disabled', array("cliente=", ""));
;
		$this->nmgp_cmp_hidden["credito"] = "on"; $this->NM_ajax_info['fieldDisplay']['credito'] = 'on';
		$this->nmgp_cmp_hidden["cupodis"] = "on"; $this->NM_ajax_info['fieldDisplay']['cupodis'] = 'on';
		$this->nmgp_cmp_hidden["cupo"] = "on"; $this->NM_ajax_info['fieldDisplay']['cupo'] = 'on';
		$this->nmgp_cmp_hidden["faccredito"] = "on"; $this->NM_ajax_info['fieldDisplay']['faccredito'] = 'on';
		$this->nmgp_cmp_hidden["efec_retencion"] = "on"; $this->NM_ajax_info['fieldDisplay']['efec_retencion'] = 'on';
		$this->nmgp_cmp_hidden["listaprecios"] = "on"; $this->NM_ajax_info['fieldDisplay']['listaprecios'] = 'on';
		$this->nmgp_cmp_hidden["loatiende"] = "on"; $this->NM_ajax_info['fieldDisplay']['loatiende'] = 'on';
		;
		;
		;
		}


if($this->credito =='SI')
	{
		$cup="SELECT cupo FROM clientes WHERE idtercero = $this->idtercero ";
		 
      $nm_select = $cup; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->des = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->des = false;
          $this->des_erro = $this->Db->ErrorMsg();
      } 
;
		$this->des =substr($this->des , 4);
		$this->cupo =$this->des ;
		$this->cupodis =$this->cupo -$this->saldo ;
		$this->sc_ajax_javascript('nm_field_disabled', array("cliente=disabled", ""));
;
		if($this->cupodis !=$this->cupo ){$this->sc_ajax_javascript('nm_field_disabled', array("credito=disabled", ""));
;}
		$this->sc_ajax_javascript('nm_field_disabled', array("cupodis=disabled", ""));
;
		
	}
	else
		{
			$this->sc_ajax_javascript('nm_field_disabled', array("cupo=disabled;cupodis=disabled", ""));
;
			$this->sc_ajax_javascript('nm_field_disabled', array("cliente=", ""));
;
		}


if($this->proveedor =='SI')
	{
	;
	
	$this->nmgp_cmp_hidden["autoretenedor"] = "on"; $this->NM_ajax_info['fieldDisplay']['autoretenedor'] = 'on';
	$this->nmgp_cmp_hidden["creditoprov"] = "on"; $this->NM_ajax_info['fieldDisplay']['creditoprov'] = 'on';
	$this->nmgp_cmp_hidden["dias"] = "on"; $this->NM_ajax_info['fieldDisplay']['dias'] = 'on';
	}
else
	{
	;
	$this->nmgp_cmp_hidden["autoretenedor"] = "off"; $this->NM_ajax_info['fieldDisplay']['autoretenedor'] = 'off';
	$this->nmgp_cmp_hidden["creditoprov"] = "off"; $this->NM_ajax_info['fieldDisplay']['creditoprov'] = 'off';
	$this->nmgp_cmp_hidden["dias"] = "off"; $this->NM_ajax_info['fieldDisplay']['dias'] = 'off';
	}
if($this->sucur_cliente =='SI')
	{
	;
	}
else
	{
	;
	}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cliente != $this->cliente || (isset($bFlagRead_cliente) && $bFlagRead_cliente)))
    {
        $this->ajax_return_values_cliente(true);
    }
    if (($original_credito != $this->credito || (isset($bFlagRead_credito) && $bFlagRead_credito)))
    {
        $this->ajax_return_values_credito(true);
    }
    if (($original_cupo != $this->cupo || (isset($bFlagRead_cupo) && $bFlagRead_cupo)))
    {
        $this->ajax_return_values_cupo(true);
    }
    if (($original_departamento != $this->departamento || (isset($bFlagRead_departamento) && $bFlagRead_departamento)))
    {
        $this->ajax_return_values_departamento(true);
    }
    if (($original_loatiende != $this->loatiende || (isset($bFlagRead_loatiende) && $bFlagRead_loatiende)))
    {
        $this->ajax_return_values_loatiende(true);
    }
}
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off'; 
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          terceros_cliente_mob_pack_ajax_response();
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
          terceros_cliente_mob_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "terceros_cliente_mob.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Actualización datos del cliente") ?></TITLE>
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
<form name="Fdown" method="get" action="terceros_cliente_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="terceros_cliente_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="terceros_cliente_mob.php" target="_self" style="display: none"> 
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
           case 'tipo_documento':
               return "Tipo Documento";
               break;
           case 'documento':
               return "Documento de Identidad/Nit";
               break;
           case 'dv':
               return "DV";
               break;
           case 'imagenter':
               return "Foto";
               break;
           case 'nombre1':
               return "Primer Nombre";
               break;
           case 'nombre2':
               return "Otros Nombres";
               break;
           case 'apellido1':
               return "Primer Apellido";
               break;
           case 'apellido2':
               return "Segundo Apellido";
               break;
           case 'tel_cel':
               return "Teléfono o celular";
               break;
           case 'urlmail':
               return "email";
               break;
           case 'nombres':
               return "Nombres o Razón Social";
               break;
           case 'representante':
               return "Representante Legal";
               break;
           case 'sexo':
               return "Género";
               break;
           case 'tipo':
               return "Tipo persona";
               break;
           case 'regimen':
               return "Régimen";
               break;
           case 'direccion':
               return "Dirección";
               break;
           case 'departamento':
               return "Departamento";
               break;
           case 'idmuni':
               return "Ciudad";
               break;
           case 'observaciones':
               return "Observaciones";
               break;
           case 'cliente':
               return "Cliente";
               break;
           case 'es_restaurante':
               return "Utilizar en Restaurante";
               break;
           case 'credito':
               return "Credito";
               break;
           case 'cupo':
               return "Cupo";
               break;
           case 'loatiende':
               return "Lo Atiende";
               break;
           case 'idtercero':
               return "Idtercero";
               break;
           case 'nacimiento':
               return "Cumpleaños";
               break;
           case 'fechault':
               return "Fecha de última compra";
               break;
           case 'saldo':
               return "Saldo pendiente";
               break;
           case 'afiliacion':
               return "Cliente desde";
               break;
           case 'listaprecios':
               return "Aplica Lista de Precios";
               break;
           case 'con_actual':
               return "Con Actual";
               break;
           case 'efec_retencion':
               return "Practica Retención";
               break;
           case 'empleado':
               return "Empleado";
               break;
           case 'proveedor':
               return "Proveedor";
               break;
           case 'contacto':
               return "Persona de Contacto o vendedor";
               break;
           case 'telefonos_prov':
               return "Número de Tel.";
               break;
           case 'email':
               return "Email";
               break;
           case 'url':
               return "Url";
               break;
           case 'creditoprov':
               return "Otorga Crédito";
               break;
           case 'dias':
               return "Días del crédito";
               break;
           case 'fechultcomp':
               return "Última Compra";
               break;
           case 'saldoapagar':
               return "Saldo a pagar";
               break;
           case 'autoretenedor':
               return "Autoretenedor";
               break;
           case 'sucur_cliente':
               return "Sucursales";
               break;
           case 'cupodis':
               return "Cupo disponible";
               break;
           case 'relleno2':
               return "";
               break;
           case 'sucursales':
               return "Ingresar/Editar";
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
     $this->scFormFocusErrorName = '';
     $this->sc_force_zero = array();

     if (!is_array($filtro) && '' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_terceros_cliente_mob']) || !is_array($this->NM_ajax_info['errList']['geral_terceros_cliente_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_terceros_cliente_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_terceros_cliente_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'tipo_documento' == $filtro)) || (is_array($filtro) && in_array('tipo_documento', $filtro)))
        $this->ValidateField_tipo_documento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "tipo_documento";

      if ((!is_array($filtro) && ('' == $filtro || 'documento' == $filtro)) || (is_array($filtro) && in_array('documento', $filtro)))
        $this->ValidateField_documento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "documento";

      if ((!is_array($filtro) && ('' == $filtro || 'dv' == $filtro)) || (is_array($filtro) && in_array('dv', $filtro)))
        $this->ValidateField_dv($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "dv";

      if ((!is_array($filtro) && ('' == $filtro || 'imagenter' == $filtro)) || (is_array($filtro) && in_array('imagenter', $filtro)))
        $this->ValidateField_imagenter($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "imagenter";

      if ((!is_array($filtro) && ('' == $filtro || 'nombre1' == $filtro)) || (is_array($filtro) && in_array('nombre1', $filtro)))
        $this->ValidateField_nombre1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "nombre1";

      if ((!is_array($filtro) && ('' == $filtro || 'nombre2' == $filtro)) || (is_array($filtro) && in_array('nombre2', $filtro)))
        $this->ValidateField_nombre2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "nombre2";

      if ((!is_array($filtro) && ('' == $filtro || 'apellido1' == $filtro)) || (is_array($filtro) && in_array('apellido1', $filtro)))
        $this->ValidateField_apellido1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "apellido1";

      if ((!is_array($filtro) && ('' == $filtro || 'apellido2' == $filtro)) || (is_array($filtro) && in_array('apellido2', $filtro)))
        $this->ValidateField_apellido2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "apellido2";

      if ((!is_array($filtro) && ('' == $filtro || 'tel_cel' == $filtro)) || (is_array($filtro) && in_array('tel_cel', $filtro)))
        $this->ValidateField_tel_cel($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "tel_cel";

      if ((!is_array($filtro) && ('' == $filtro || 'urlmail' == $filtro)) || (is_array($filtro) && in_array('urlmail', $filtro)))
        $this->ValidateField_urlmail($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "urlmail";

      if ((!is_array($filtro) && ('' == $filtro || 'nombres' == $filtro)) || (is_array($filtro) && in_array('nombres', $filtro)))
        $this->ValidateField_nombres($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "nombres";

      if ((!is_array($filtro) && ('' == $filtro || 'representante' == $filtro)) || (is_array($filtro) && in_array('representante', $filtro)))
        $this->ValidateField_representante($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "representante";

      if ((!is_array($filtro) && ('' == $filtro || 'sexo' == $filtro)) || (is_array($filtro) && in_array('sexo', $filtro)))
        $this->ValidateField_sexo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "sexo";

      if ((!is_array($filtro) && ('' == $filtro || 'tipo' == $filtro)) || (is_array($filtro) && in_array('tipo', $filtro)))
        $this->ValidateField_tipo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "tipo";

      if ((!is_array($filtro) && ('' == $filtro || 'regimen' == $filtro)) || (is_array($filtro) && in_array('regimen', $filtro)))
        $this->ValidateField_regimen($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "regimen";

      if ((!is_array($filtro) && ('' == $filtro || 'direccion' == $filtro)) || (is_array($filtro) && in_array('direccion', $filtro)))
        $this->ValidateField_direccion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "direccion";

      if ((!is_array($filtro) && ('' == $filtro || 'departamento' == $filtro)) || (is_array($filtro) && in_array('departamento', $filtro)))
        $this->ValidateField_departamento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "departamento";

      if ((!is_array($filtro) && ('' == $filtro || 'idmuni' == $filtro)) || (is_array($filtro) && in_array('idmuni', $filtro)))
        $this->ValidateField_idmuni($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "idmuni";

      if ((!is_array($filtro) && ('' == $filtro || 'observaciones' == $filtro)) || (is_array($filtro) && in_array('observaciones', $filtro)))
        $this->ValidateField_observaciones($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "observaciones";

      if ((!is_array($filtro) && ('' == $filtro || 'cliente' == $filtro)) || (is_array($filtro) && in_array('cliente', $filtro)))
        $this->ValidateField_cliente($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "cliente";

      if ((!is_array($filtro) && ('' == $filtro || 'es_restaurante' == $filtro)) || (is_array($filtro) && in_array('es_restaurante', $filtro)))
        $this->ValidateField_es_restaurante($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "es_restaurante";

      if ((!is_array($filtro) && ('' == $filtro || 'credito' == $filtro)) || (is_array($filtro) && in_array('credito', $filtro)))
        $this->ValidateField_credito($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "credito";

      if ((!is_array($filtro) && ('' == $filtro || 'cupo' == $filtro)) || (is_array($filtro) && in_array('cupo', $filtro)))
        $this->ValidateField_cupo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "cupo";

      if ((!is_array($filtro) && ('' == $filtro || 'loatiende' == $filtro)) || (is_array($filtro) && in_array('loatiende', $filtro)))
        $this->ValidateField_loatiende($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "loatiende";

      $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_tipo_documento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tipo_documento == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipo_documento';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipo_documento

    function ValidateField_documento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['php_cmp_required']['documento']) || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['php_cmp_required']['documento'] == "on")) 
      { 
          if ($this->documento == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Documento de Identidad/Nit" ; 
              if (!isset($Campos_Erros['documento']))
              {
                  $Campos_Erros['documento'] = array();
              }
              $Campos_Erros['documento'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['documento']) || !is_array($this->NM_ajax_info['errList']['documento']))
                  {
                      $this->NM_ajax_info['errList']['documento'] = array();
                  }
                  $this->NM_ajax_info['errList']['documento'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->documento) > 14) 
          { 
              $hasError = true;
              $Campos_Crit .= "Documento de Identidad/Nit " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 14 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['documento']))
              {
                  $Campos_Erros['documento'] = array();
              }
              $Campos_Erros['documento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 14 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['documento']) || !is_array($this->NM_ajax_info['errList']['documento']))
              {
                  $this->NM_ajax_info['errList']['documento'] = array();
              }
              $this->NM_ajax_info['errList']['documento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 14 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "01234567890123456789";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->documento ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->documento, $_SESSION['scriptcase']['charset']); $x++) 
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
              $Campos_Crit .= "Documento de Identidad/Nit " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['documento']))
              {
                  $Campos_Erros['documento'] = array();
              }
              $Campos_Erros['documento'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['documento']) || !is_array($this->NM_ajax_info['errList']['documento']))
              {
                  $this->NM_ajax_info['errList']['documento'] = array();
              }
              $this->NM_ajax_info['errList']['documento'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'documento';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_documento

    function ValidateField_dv(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->dv === "" || is_null($this->dv))  
      { 
          $this->dv = 0;
          $this->sc_force_zero[] = 'dv';
      } 
      nm_limpa_numero($this->dv, $this->field_config['dv']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->dv != '')  
          { 
              $iTestSize = 1;
              if (strlen($this->dv) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "DV: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['dv']))
                  {
                      $Campos_Erros['dv'] = array();
                  }
                  $Campos_Erros['dv'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['dv']) || !is_array($this->NM_ajax_info['errList']['dv']))
                  {
                      $this->NM_ajax_info['errList']['dv'] = array();
                  }
                  $this->NM_ajax_info['errList']['dv'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->dv, 1, 0, -0, 9, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "DV; " ; 
                  if (!isset($Campos_Erros['dv']))
                  {
                      $Campos_Erros['dv'] = array();
                  }
                  $Campos_Erros['dv'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dv']) || !is_array($this->NM_ajax_info['errList']['dv']))
                  {
                      $this->NM_ajax_info['errList']['dv'] = array();
                  }
                  $this->NM_ajax_info['errList']['dv'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'dv';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_dv

    function ValidateField_imagenter(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->imagenter;
            if ("" != $this->imagenter && "S" != $this->imagenter_limpa && !$teste_validade->ArqExtensao($this->imagenter, array('jpg', 'jpeg', 'gif', 'png')))
            {
                $hasError = true;
                $Campos_Crit .= "Foto: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['imagenter']))
                {
                    $Campos_Erros['imagenter'] = array();
                }
                $Campos_Erros['imagenter'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['imagenter']) || !is_array($this->NM_ajax_info['errList']['imagenter']))
                {
                    $this->NM_ajax_info['errList']['imagenter'] = array();
                }
                $this->NM_ajax_info['errList']['imagenter'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
            if (!$hasError && "" != $this->imagenter && "S" != $this->imagenter_limpa) {
                if (!function_exists('sc_upload_unprotect_chars')) {
                    include_once 'terceros_cliente_mob_doc_name.php';
                }
                $pathParts = pathinfo(sc_upload_unprotect_chars($sTestFile));
                $fileSize = filesize(sc_upload_unprotect_chars($sTestFile));
                $sizeErrorSuffix = '';
                if ($hasError) {
                    $Campos_Crit .= "Foto: " . $this->Ini->Nm_lang['lang_errm_file_size'] . $sizeErrorSuffix;
                    if (!isset($Campos_Erros['imagenter']))
                    {
                        $Campos_Erros['imagenter'] = array();
                    }
                    $Campos_Erros['imagenter'][] = $this->Ini->Nm_lang['lang_errm_file_size'] . $sizeErrorSuffix;
                    if (!isset($this->NM_ajax_info['errList']['imagenter']) || !is_array($this->NM_ajax_info['errList']['imagenter']))
                    {
                        $this->NM_ajax_info['errList']['imagenter'] = array();
                    }
                    $this->NM_ajax_info['errList']['imagenter'][] = $this->Ini->Nm_lang['lang_errm_file_size'] . $sizeErrorSuffix;
                }
            }
        }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'imagenter';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_imagenter

    function ValidateField_nombre1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->nombre1 = sc_strtoupper($this->nombre1); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nombre1) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Primer Nombre " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombre1']))
              {
                  $Campos_Erros['nombre1'] = array();
              }
              $Campos_Erros['nombre1'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombre1']) || !is_array($this->NM_ajax_info['errList']['nombre1']))
              {
                  $this->NM_ajax_info['errList']['nombre1'] = array();
              }
              $this->NM_ajax_info['errList']['nombre1'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚÀÈÌÒÙÃÕÂÊÎÔÛÄËÏÖÜÑÝÿ¨´`^~Ç ";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->nombre1 ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->nombre1, $_SESSION['scriptcase']['charset']); $x++) 
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
              $Campos_Crit .= "Primer Nombre " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['nombre1']))
              {
                  $Campos_Erros['nombre1'] = array();
              }
              $Campos_Erros['nombre1'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['nombre1']) || !is_array($this->NM_ajax_info['errList']['nombre1']))
              {
                  $this->NM_ajax_info['errList']['nombre1'] = array();
              }
              $this->NM_ajax_info['errList']['nombre1'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nombre1';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nombre1

    function ValidateField_nombre2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->nombre2 = sc_strtoupper($this->nombre2); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nombre2) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Otros Nombres " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombre2']))
              {
                  $Campos_Erros['nombre2'] = array();
              }
              $Campos_Erros['nombre2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombre2']) || !is_array($this->NM_ajax_info['errList']['nombre2']))
              {
                  $this->NM_ajax_info['errList']['nombre2'] = array();
              }
              $this->NM_ajax_info['errList']['nombre2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚÀÈÌÒÙÃÕÂÊÎÔÛÄËÏÖÜÑÝÿ¨´`^~Ç ";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->nombre2 ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->nombre2, $_SESSION['scriptcase']['charset']); $x++) 
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
              $Campos_Crit .= "Otros Nombres " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['nombre2']))
              {
                  $Campos_Erros['nombre2'] = array();
              }
              $Campos_Erros['nombre2'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['nombre2']) || !is_array($this->NM_ajax_info['errList']['nombre2']))
              {
                  $this->NM_ajax_info['errList']['nombre2'] = array();
              }
              $this->NM_ajax_info['errList']['nombre2'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nombre2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nombre2

    function ValidateField_apellido1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->apellido1 = sc_strtoupper($this->apellido1); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->apellido1) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Primer Apellido " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['apellido1']))
              {
                  $Campos_Erros['apellido1'] = array();
              }
              $Campos_Erros['apellido1'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['apellido1']) || !is_array($this->NM_ajax_info['errList']['apellido1']))
              {
                  $this->NM_ajax_info['errList']['apellido1'] = array();
              }
              $this->NM_ajax_info['errList']['apellido1'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚÀÈÌÒÙÃÕÂÊÎÔÛÄËÏÖÜÑÝÿ¨´`^~Ç ";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->apellido1 ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->apellido1, $_SESSION['scriptcase']['charset']); $x++) 
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
              $Campos_Crit .= "Primer Apellido " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['apellido1']))
              {
                  $Campos_Erros['apellido1'] = array();
              }
              $Campos_Erros['apellido1'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['apellido1']) || !is_array($this->NM_ajax_info['errList']['apellido1']))
              {
                  $this->NM_ajax_info['errList']['apellido1'] = array();
              }
              $this->NM_ajax_info['errList']['apellido1'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'apellido1';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_apellido1

    function ValidateField_apellido2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->apellido2 = sc_strtoupper($this->apellido2); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->apellido2) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Segundo Apellido " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['apellido2']))
              {
                  $Campos_Erros['apellido2'] = array();
              }
              $Campos_Erros['apellido2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['apellido2']) || !is_array($this->NM_ajax_info['errList']['apellido2']))
              {
                  $this->NM_ajax_info['errList']['apellido2'] = array();
              }
              $this->NM_ajax_info['errList']['apellido2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚÀÈÌÒÙÃÕÂÊÎÔÛÄËÏÖÜÑÝÿ¨´`^~Ç ";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->apellido2 ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->apellido2, $_SESSION['scriptcase']['charset']); $x++) 
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
              $Campos_Crit .= "Segundo Apellido " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['apellido2']))
              {
                  $Campos_Erros['apellido2'] = array();
              }
              $Campos_Erros['apellido2'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['apellido2']) || !is_array($this->NM_ajax_info['errList']['apellido2']))
              {
                  $this->NM_ajax_info['errList']['apellido2'] = array();
              }
              $this->NM_ajax_info['errList']['apellido2'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'apellido2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_apellido2

    function ValidateField_tel_cel(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tel_cel) > 14) 
          { 
              $hasError = true;
              $Campos_Crit .= "Teléfono o celular " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 14 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tel_cel']))
              {
                  $Campos_Erros['tel_cel'] = array();
              }
              $Campos_Erros['tel_cel'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 14 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tel_cel']) || !is_array($this->NM_ajax_info['errList']['tel_cel']))
              {
                  $this->NM_ajax_info['errList']['tel_cel'] = array();
              }
              $this->NM_ajax_info['errList']['tel_cel'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 14 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tel_cel';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tel_cel

    function ValidateField_urlmail(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->urlmail) != "")  
          { 
              if ($teste_validade->Email($this->urlmail) == false)  
              { 
                  $hasError = true;
                      $Campos_Crit .= "email; " ; 
                  if (!isset($Campos_Erros['urlmail']))
                  {
                      $Campos_Erros['urlmail'] = array();
                  }
                  $Campos_Erros['urlmail'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                      if (!isset($this->NM_ajax_info['errList']['urlmail']) || !is_array($this->NM_ajax_info['errList']['urlmail']))
                      {
                          $this->NM_ajax_info['errList']['urlmail'] = array();
                      }
                      $this->NM_ajax_info['errList']['urlmail'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'urlmail';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_urlmail

    function ValidateField_nombres(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->nombres = sc_strtoupper($this->nombres); 
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['php_cmp_required']['nombres']) || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['php_cmp_required']['nombres'] == "on")) 
      { 
          if ($this->nombres == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Nombres o Razón Social" ; 
              if (!isset($Campos_Erros['nombres']))
              {
                  $Campos_Erros['nombres'] = array();
              }
              $Campos_Erros['nombres'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['nombres']) || !is_array($this->NM_ajax_info['errList']['nombres']))
                  {
                      $this->NM_ajax_info['errList']['nombres'] = array();
                  }
                  $this->NM_ajax_info['errList']['nombres'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nombres) > 120) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nombres o Razón Social " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombres']))
              {
                  $Campos_Erros['nombres'] = array();
              }
              $Campos_Erros['nombres'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombres']) || !is_array($this->NM_ajax_info['errList']['nombres']))
              {
                  $this->NM_ajax_info['errList']['nombres'] = array();
              }
              $this->NM_ajax_info['errList']['nombres'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nombres';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nombres

    function ValidateField_representante(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->representante = sc_strtoupper($this->representante); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->representante) > 120) 
          { 
              $hasError = true;
              $Campos_Crit .= "Representante Legal " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['representante']))
              {
                  $Campos_Erros['representante'] = array();
              }
              $Campos_Erros['representante'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['representante']) || !is_array($this->NM_ajax_info['errList']['representante']))
              {
                  $this->NM_ajax_info['errList']['representante'] = array();
              }
              $this->NM_ajax_info['errList']['representante'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ÁÉÍÓÚÀÈÌÒÙÃÕÂÊÎÔÛÄËÏÖÜÑÝÿ¨´`^~Ç .-";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->representante ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->representante, $_SESSION['scriptcase']['charset']); $x++) 
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
              $Campos_Crit .= "Representante Legal " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['representante']))
              {
                  $Campos_Erros['representante'] = array();
              }
              $Campos_Erros['representante'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['representante']) || !is_array($this->NM_ajax_info['errList']['representante']))
              {
                  $this->NM_ajax_info['errList']['representante'] = array();
              }
              $this->NM_ajax_info['errList']['representante'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'representante';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_representante

    function ValidateField_sexo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->sexo == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sexo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sexo

    function ValidateField_tipo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tipo == "" && $this->nmgp_opcao != "excluir")
      { 
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

    function ValidateField_regimen(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->regimen == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'regimen';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_regimen

    function ValidateField_direccion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->direccion) > 60) 
          { 
              $hasError = true;
              $Campos_Crit .= "Dirección " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['direccion']))
              {
                  $Campos_Erros['direccion'] = array();
              }
              $Campos_Erros['direccion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['direccion']) || !is_array($this->NM_ajax_info['errList']['direccion']))
              {
                  $this->NM_ajax_info['errList']['direccion'] = array();
              }
              $this->NM_ajax_info['errList']['direccion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'direccion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_direccion

    function ValidateField_departamento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->departamento) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_departamento']) && !in_array($this->departamento, $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_departamento']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['departamento']))
                   {
                       $Campos_Erros['departamento'] = array();
                   }
                   $Campos_Erros['departamento'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['departamento']) || !is_array($this->NM_ajax_info['errList']['departamento']))
                   {
                       $this->NM_ajax_info['errList']['departamento'] = array();
                   }
                   $this->NM_ajax_info['errList']['departamento'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'departamento';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_departamento

    function ValidateField_idmuni(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->idmuni) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_idmuni']) && !in_array($this->idmuni, $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_idmuni']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['idmuni']))
                   {
                       $Campos_Erros['idmuni'] = array();
                   }
                   $Campos_Erros['idmuni'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['idmuni']) || !is_array($this->NM_ajax_info['errList']['idmuni']))
                   {
                       $this->NM_ajax_info['errList']['idmuni'] = array();
                   }
                   $this->NM_ajax_info['errList']['idmuni'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idmuni';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idmuni

    function ValidateField_observaciones(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->observaciones) > 200) 
          { 
              $hasError = true;
              $Campos_Crit .= "Observaciones " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['observaciones']))
              {
                  $Campos_Erros['observaciones'] = array();
              }
              $Campos_Erros['observaciones'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['observaciones']) || !is_array($this->NM_ajax_info['errList']['observaciones']))
              {
                  $this->NM_ajax_info['errList']['observaciones'] = array();
              }
              $this->NM_ajax_info['errList']['observaciones'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
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

    function ValidateField_cliente(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cliente == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cliente';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cliente

    function ValidateField_es_restaurante(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->es_restaurante == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->es_restaurante != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_es_restaurante']) && !in_array($this->es_restaurante, $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_es_restaurante']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['es_restaurante']))
              {
                  $Campos_Erros['es_restaurante'] = array();
              }
              $Campos_Erros['es_restaurante'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['es_restaurante']) || !is_array($this->NM_ajax_info['errList']['es_restaurante']))
              {
                  $this->NM_ajax_info['errList']['es_restaurante'] = array();
              }
              $this->NM_ajax_info['errList']['es_restaurante'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'es_restaurante';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_es_restaurante

    function ValidateField_credito(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->credito == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'credito';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_credito

    function ValidateField_cupo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cupo === "" || is_null($this->cupo))  
      { 
          $this->cupo = 0;
          $this->sc_force_zero[] = 'cupo';
      } 
      if (!empty($this->field_config['cupo']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cupo, $this->field_config['cupo']['symbol_dec'], $this->field_config['cupo']['symbol_grp'], $this->field_config['cupo']['symbol_mon']); 
          nm_limpa_valor($this->cupo, $this->field_config['cupo']['symbol_dec'], $this->field_config['cupo']['symbol_grp']) ; 
          if ('.' == substr($this->cupo, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->cupo, 1)))
              {
                  $this->cupo = '';
              }
              else
              {
                  $this->cupo = '0' . $this->cupo;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->cupo != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->cupo) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cupo: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cupo']))
                  {
                      $Campos_Erros['cupo'] = array();
                  }
                  $Campos_Erros['cupo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cupo']) || !is_array($this->NM_ajax_info['errList']['cupo']))
                  {
                      $this->NM_ajax_info['errList']['cupo'] = array();
                  }
                  $this->NM_ajax_info['errList']['cupo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cupo, 12, 0, -0, 999999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cupo; " ; 
                  if (!isset($Campos_Erros['cupo']))
                  {
                      $Campos_Erros['cupo'] = array();
                  }
                  $Campos_Erros['cupo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cupo']) || !is_array($this->NM_ajax_info['errList']['cupo']))
                  {
                      $this->NM_ajax_info['errList']['cupo'] = array();
                  }
                  $this->NM_ajax_info['errList']['cupo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cupo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cupo

    function ValidateField_loatiende(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->loatiende) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_loatiende']) && !in_array($this->loatiende, $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_loatiende']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['loatiende']))
                   {
                       $Campos_Erros['loatiende'] = array();
                   }
                   $Campos_Erros['loatiende'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['loatiende']) || !is_array($this->NM_ajax_info['errList']['loatiende']))
                   {
                       $this->NM_ajax_info['errList']['loatiende'] = array();
                   }
                   $this->NM_ajax_info['errList']['loatiende'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'loatiende';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_loatiende
//
//--------------------------------------------------------------------------------------
   function upload_img_doc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser;
     if (!empty($Campos_Crit) || !empty($Campos_Falta))
     {
          return;
     }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->imagenter == "none") 
          { 
              $this->imagenter = ""; 
          } 
          if ($this->imagenter != "") 
          { 
              if (!function_exists('sc_upload_unprotect_chars'))
              {
                  include_once 'terceros_cliente_mob_doc_name.php';
              }
              $this->imagenter = sc_upload_unprotect_chars($this->imagenter);
              $this->imagenter_scfile_name = sc_upload_unprotect_chars($this->imagenter_scfile_name);
              if ($nm_browser == "Opera")  
              { 
                  $this->imagenter_scfile_type = substr($this->imagenter_scfile_type, 0, strpos($this->imagenter_scfile_type, ";")) ; 
              } 
              if ($this->imagenter_scfile_type == "image/pjpeg" || $this->imagenter_scfile_type == "image/jpeg" || $this->imagenter_scfile_type == "image/gif" ||  
                  $this->imagenter_scfile_type == "image/png" || $this->imagenter_scfile_type == "image/x-png" || $this->imagenter_scfile_type == "image/bmp")  
              { 
                  if (is_file($this->imagenter))  
                  { 
                      $this->NM_size_docs[$this->imagenter_scfile_name] = $this->sc_file_size($this->imagenter);
                      $reg_imagenter = file_get_contents($this->imagenter); 
                      $this->imagenter = $reg_imagenter; 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "Foto " . $this->Ini->Nm_lang['lang_errm_upld']; 
                      $this->imagenter = "";
                      if (!isset($Campos_Erros['imagenter']))
                      {
                          $Campos_Erros['imagenter'] = array();
                      }
                      $Campos_Erros['imagenter'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                      if (!isset($this->NM_ajax_info['errList']['imagenter']) || !is_array($this->NM_ajax_info['errList']['imagenter']))
                      {
                          $this->NM_ajax_info['errList']['imagenter'] = array();
                      }
                      $this->NM_ajax_info['errList']['imagenter'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  } 
              } 
              else 
              { 
                  if ($nm_browser == "Konqueror")  
                  { 
                      $this->imagenter = "" ; 
                  } 
                  else 
                  { 
                     $Campos_Crit .= "Foto " . $this->Ini->Nm_lang['lang_errm_ivtp'];  
                      if (!isset($Campos_Erros['imagenter']))
                      {
                          $Campos_Erros['imagenter'] = array();
                      }
                      $Campos_Erros['imagenter'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                      if (!isset($this->NM_ajax_info['errList']['imagenter']) || !is_array($this->NM_ajax_info['errList']['imagenter']))
                      {
                          $this->NM_ajax_info['errList']['imagenter'] = array();
                      }
                      $this->NM_ajax_info['errList']['imagenter'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                  } 
              } 
          } 
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_form']['imagenter']) && $this->imagenter_limpa != "S")
          {
              $this->imagenter = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_form']['imagenter'];
          }
      } 
   }

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
    $this->nmgp_dados_form['tipo_documento'] = $this->tipo_documento;
    $this->nmgp_dados_form['documento'] = $this->documento;
    $this->nmgp_dados_form['dv'] = $this->dv;
    if (empty($this->imagenter))
    {
        $this->imagenter = $this->nmgp_dados_form['imagenter'];
    }
    $this->nmgp_dados_form['imagenter'] = $this->imagenter;
    $this->nmgp_dados_form['imagenter_limpa'] = $this->imagenter_limpa;
    $this->nmgp_dados_form['nombre1'] = $this->nombre1;
    $this->nmgp_dados_form['nombre2'] = $this->nombre2;
    $this->nmgp_dados_form['apellido1'] = $this->apellido1;
    $this->nmgp_dados_form['apellido2'] = $this->apellido2;
    $this->nmgp_dados_form['tel_cel'] = $this->tel_cel;
    $this->nmgp_dados_form['urlmail'] = $this->urlmail;
    $this->nmgp_dados_form['nombres'] = $this->nombres;
    $this->nmgp_dados_form['representante'] = $this->representante;
    $this->nmgp_dados_form['sexo'] = $this->sexo;
    $this->nmgp_dados_form['tipo'] = $this->tipo;
    $this->nmgp_dados_form['regimen'] = $this->regimen;
    $this->nmgp_dados_form['direccion'] = $this->direccion;
    $this->nmgp_dados_form['departamento'] = $this->departamento;
    $this->nmgp_dados_form['idmuni'] = $this->idmuni;
    $this->nmgp_dados_form['observaciones'] = $this->observaciones;
    $this->nmgp_dados_form['cliente'] = $this->cliente;
    $this->nmgp_dados_form['es_restaurante'] = $this->es_restaurante;
    $this->nmgp_dados_form['credito'] = $this->credito;
    $this->nmgp_dados_form['cupo'] = $this->cupo;
    $this->nmgp_dados_form['loatiende'] = $this->loatiende;
    $this->nmgp_dados_form['idtercero'] = $this->idtercero;
    $this->nmgp_dados_form['nacimiento'] = $this->nacimiento;
    $this->nmgp_dados_form['fechault'] = $this->fechault;
    $this->nmgp_dados_form['saldo'] = $this->saldo;
    $this->nmgp_dados_form['afiliacion'] = $this->afiliacion;
    $this->nmgp_dados_form['listaprecios'] = $this->listaprecios;
    $this->nmgp_dados_form['con_actual'] = $this->con_actual;
    $this->nmgp_dados_form['efec_retencion'] = $this->efec_retencion;
    $this->nmgp_dados_form['empleado'] = $this->empleado;
    $this->nmgp_dados_form['proveedor'] = $this->proveedor;
    $this->nmgp_dados_form['contacto'] = $this->contacto;
    $this->nmgp_dados_form['telefonos_prov'] = $this->telefonos_prov;
    $this->nmgp_dados_form['email'] = $this->email;
    $this->nmgp_dados_form['url'] = $this->url;
    $this->nmgp_dados_form['creditoprov'] = $this->creditoprov;
    $this->nmgp_dados_form['dias'] = $this->dias;
    $this->nmgp_dados_form['fechultcomp'] = $this->fechultcomp;
    $this->nmgp_dados_form['saldoapagar'] = $this->saldoapagar;
    $this->nmgp_dados_form['autoretenedor'] = $this->autoretenedor;
    $this->nmgp_dados_form['sucur_cliente'] = $this->sucur_cliente;
    $this->nmgp_dados_form['cupodis'] = $this->cupodis;
    $this->nmgp_dados_form['relleno2'] = $this->relleno2;
    $this->nmgp_dados_form['sucursales'] = $this->sucursales;
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['dv'] = $this->dv;
      nm_limpa_numero($this->dv, $this->field_config['dv']['symbol_grp']) ; 
      $this->Before_unformat['cupo'] = $this->cupo;
      if (!empty($this->field_config['cupo']['symbol_dec']))
      {
         $this->sc_remove_currency($this->cupo, $this->field_config['cupo']['symbol_dec'], $this->field_config['cupo']['symbol_grp'], $this->field_config['cupo']['symbol_mon']);
         nm_limpa_valor($this->cupo, $this->field_config['cupo']['symbol_dec'], $this->field_config['cupo']['symbol_grp']);
      }
      $this->Before_unformat['idtercero'] = $this->idtercero;
      nm_limpa_numero($this->idtercero, $this->field_config['idtercero']['symbol_grp']) ; 
      $this->Before_unformat['nacimiento'] = $this->nacimiento;
      nm_limpa_data($this->nacimiento, $this->field_config['nacimiento']['date_sep']) ; 
      $this->Before_unformat['fechault'] = $this->fechault;
      nm_limpa_data($this->fechault, $this->field_config['fechault']['date_sep']) ; 
      $this->Before_unformat['saldo'] = $this->saldo;
      if (!empty($this->field_config['saldo']['symbol_dec']))
      {
         $this->sc_remove_currency($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp'], $this->field_config['saldo']['symbol_mon']);
         nm_limpa_valor($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp']);
      }
      $this->Before_unformat['afiliacion'] = $this->afiliacion;
      nm_limpa_data($this->afiliacion, $this->field_config['afiliacion']['date_sep']) ; 
      $this->Before_unformat['con_actual'] = $this->con_actual;
      $this->Before_unformat['con_actual_hora'] = $this->con_actual_hora;
      nm_limpa_data($this->con_actual, $this->field_config['con_actual']['date_sep']) ; 
      nm_limpa_hora($this->con_actual_hora, $this->field_config['con_actual']['time_sep']) ; 
      $this->Before_unformat['dias'] = $this->dias;
      nm_limpa_numero($this->dias, $this->field_config['dias']['symbol_grp']) ; 
      $this->Before_unformat['fechultcomp'] = $this->fechultcomp;
      nm_limpa_data($this->fechultcomp, $this->field_config['fechultcomp']['date_sep']) ; 
      $this->Before_unformat['saldoapagar'] = $this->saldoapagar;
      if (!empty($this->field_config['saldoapagar']['symbol_dec']))
      {
         $this->sc_remove_currency($this->saldoapagar, $this->field_config['saldoapagar']['symbol_dec'], $this->field_config['saldoapagar']['symbol_grp'], $this->field_config['saldoapagar']['symbol_mon']);
         nm_limpa_valor($this->saldoapagar, $this->field_config['saldoapagar']['symbol_dec'], $this->field_config['saldoapagar']['symbol_grp']);
      }
      $this->Before_unformat['cupodis'] = $this->cupodis;
      if (!empty($this->field_config['cupodis']['symbol_dec']))
      {
         $this->sc_remove_currency($this->cupodis, $this->field_config['cupodis']['symbol_dec'], $this->field_config['cupodis']['symbol_grp'], $this->field_config['cupodis']['symbol_mon']);
         nm_limpa_valor($this->cupodis, $this->field_config['cupodis']['symbol_dec'], $this->field_config['cupodis']['symbol_grp']);
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
      if ($Nome_Campo == "dv")
      {
          nm_limpa_numero($this->dv, $this->field_config['dv']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "cupo")
      {
          if (!empty($this->field_config['cupo']['symbol_dec']))
          {
             $this->sc_remove_currency($this->cupo, $this->field_config['cupo']['symbol_dec'], $this->field_config['cupo']['symbol_grp'], $this->field_config['cupo']['symbol_mon']);
             nm_limpa_valor($this->cupo, $this->field_config['cupo']['symbol_dec'], $this->field_config['cupo']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "idtercero")
      {
          nm_limpa_numero($this->idtercero, $this->field_config['idtercero']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "saldo")
      {
          if (!empty($this->field_config['saldo']['symbol_dec']))
          {
             $this->sc_remove_currency($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp'], $this->field_config['saldo']['symbol_mon']);
             nm_limpa_valor($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dias")
      {
          nm_limpa_numero($this->dias, $this->field_config['dias']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "saldoapagar")
      {
          if (!empty($this->field_config['saldoapagar']['symbol_dec']))
          {
             $this->sc_remove_currency($this->saldoapagar, $this->field_config['saldoapagar']['symbol_dec'], $this->field_config['saldoapagar']['symbol_grp'], $this->field_config['saldoapagar']['symbol_mon']);
             nm_limpa_valor($this->saldoapagar, $this->field_config['saldoapagar']['symbol_dec'], $this->field_config['saldoapagar']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "cupodis")
      {
          if (!empty($this->field_config['cupodis']['symbol_dec']))
          {
             $this->sc_remove_currency($this->cupodis, $this->field_config['cupodis']['symbol_dec'], $this->field_config['cupodis']['symbol_grp'], $this->field_config['cupodis']['symbol_mon']);
             nm_limpa_valor($this->cupodis, $this->field_config['cupodis']['symbol_dec'], $this->field_config['cupodis']['symbol_grp']);
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
      if ('' !== $this->dv || (!empty($format_fields) && isset($format_fields['dv'])))
      {
          nmgp_Form_Num_Val($this->dv, $this->field_config['dv']['symbol_grp'], $this->field_config['dv']['symbol_dec'], "0", "S", $this->field_config['dv']['format_neg'], "", "", "-", $this->field_config['dv']['symbol_fmt']) ; 
      }
      if ('' !== $this->cupo || (!empty($format_fields) && isset($format_fields['cupo'])))
      {
          nmgp_Form_Num_Val($this->cupo, $this->field_config['cupo']['symbol_grp'], $this->field_config['cupo']['symbol_dec'], "0", "S", $this->field_config['cupo']['format_neg'], "", "", "-", $this->field_config['cupo']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['cupo']['symbol_mon'];
          $this->sc_add_currency($this->cupo, $sMonSymb, $this->field_config['cupo']['format_pos']); 
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
          $this->ajax_return_values_tipo_documento();
          $this->ajax_return_values_documento();
          $this->ajax_return_values_dv();
          $this->ajax_return_values_imagenter();
          $this->ajax_return_values_nombre1();
          $this->ajax_return_values_nombre2();
          $this->ajax_return_values_apellido1();
          $this->ajax_return_values_apellido2();
          $this->ajax_return_values_tel_cel();
          $this->ajax_return_values_urlmail();
          $this->ajax_return_values_nombres();
          $this->ajax_return_values_representante();
          $this->ajax_return_values_sexo();
          $this->ajax_return_values_tipo();
          $this->ajax_return_values_regimen();
          $this->ajax_return_values_direccion();
          $this->ajax_return_values_departamento();
          $this->ajax_return_values_idmuni();
          $this->ajax_return_values_observaciones();
          $this->ajax_return_values_cliente();
          $this->ajax_return_values_es_restaurante();
          $this->ajax_return_values_credito();
          $this->ajax_return_values_cupo();
          $this->ajax_return_values_loatiende();
          $this->ajax_return_values_idtercero();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idtercero']['keyVal'] = terceros_cliente_mob_pack_protect_string($this->nmgp_dados_form['idtercero']);
          }
   } // ajax_return_values

          //----- tipo_documento
   function ajax_return_values_tipo_documento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_documento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo_documento);
              $aLookup = array();
              $this->_tmp_lookup_tipo_documento = $this->tipo_documento;

$aLookup[] = array(terceros_cliente_mob_pack_protect_string('11') => str_replace('<', '&lt;',terceros_cliente_mob_pack_protect_string("Registtro civil de nacimiento")));
$aLookup[] = array(terceros_cliente_mob_pack_protect_string('12') => str_replace('<', '&lt;',terceros_cliente_mob_pack_protect_string("Tarjeta de identidad")));
$aLookup[] = array(terceros_cliente_mob_pack_protect_string('13') => str_replace('<', '&lt;',terceros_cliente_mob_pack_protect_string("Cédula de ciudadanía")));
$aLookup[] = array(terceros_cliente_mob_pack_protect_string('21') => str_replace('<', '&lt;',terceros_cliente_mob_pack_protect_string("Tarjeta de Extranjería")));
$aLookup[] = array(terceros_cliente_mob_pack_protect_string('22') => str_replace('<', '&lt;',terceros_cliente_mob_pack_protect_string("Cédula de extranjería")));
$aLookup[] = array(terceros_cliente_mob_pack_protect_string('31') => str_replace('<', '&lt;',terceros_cliente_mob_pack_protect_string("Nit")));
$aLookup[] = array(terceros_cliente_mob_pack_protect_string('41') => str_replace('<', '&lt;',terceros_cliente_mob_pack_protect_string("Pasaporte")));
$aLookup[] = array(terceros_cliente_mob_pack_protect_string('42') => str_replace('<', '&lt;',terceros_cliente_mob_pack_protect_string("Tipo de documento extranjero")));
$aLookup[] = array(terceros_cliente_mob_pack_protect_string('43') => str_replace('<', '&lt;',terceros_cliente_mob_pack_protect_string("Definido por la DIAN")));
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_tipo_documento'][] = '11';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_tipo_documento'][] = '12';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_tipo_documento'][] = '13';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_tipo_documento'][] = '21';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_tipo_documento'][] = '22';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_tipo_documento'][] = '31';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_tipo_documento'][] = '41';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_tipo_documento'][] = '42';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_tipo_documento'][] = '43';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tipo_documento\"";
          if (isset($this->NM_ajax_info['select_html']['tipo_documento']) && !empty($this->NM_ajax_info['select_html']['tipo_documento']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['tipo_documento']);
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

                  if ($this->tipo_documento == $sValue)
                  {
                      $this->_tmp_lookup_tipo_documento = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tipo_documento'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipo_documento']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipo_documento']['valList'][$i] = terceros_cliente_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipo_documento']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipo_documento']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipo_documento']['labList'] = $aLabel;
          }
   }

          //----- documento
   function ajax_return_values_documento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("documento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->documento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['documento'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- dv
   function ajax_return_values_dv($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dv", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->dv);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['dv'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- imagenter
   function ajax_return_values_imagenter($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("imagenter", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->imagenter);
              $aLookup = array();
   $out_imagenter = '';
   $out1_imagenter = '';
   if ('' != $this->imagenter_ul_name && @is_file($this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter_ul_name))
   {
       $this->imagenter = @file_get_contents($this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter_ul_name);
   }
   if ($this->imagenter != "" && $this->imagenter != "none")   
   { 
       $out_imagenter = $this->Ini->path_imag_temp . "/sc_imagenter_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ;  
       $out1_imagenter = $out_imagenter; 
       $arq_imagenter = fopen($this->Ini->root . $out_imagenter, "w") ;  
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
       { 
           $nm_tmp = nm_conv_img_access(substr($this->imagenter, 0, 12));
           if (substr($this->imagenter, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
           { 
               $this->imagenter = nm_conv_img_access($this->imagenter);
           } 
       } 
       if (substr($this->imagenter, 0, 4) == "*nm*") 
       { 
           $this->imagenter = substr($this->imagenter, 4) ; 
           $this->imagenter = base64_decode($this->imagenter) ; 
       } 
       $img_pos_bm = strpos($this->imagenter, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->imagenter = substr($this->imagenter, $img_pos_bm) ; 
       } 
       fwrite($arq_imagenter, $this->imagenter) ;  
       fclose($arq_imagenter) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_imagenter, true);
       $this->nmgp_return_img['imagenter'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['imagenter'][1] = $sc_obj_img->getWidth();
       $_SESSION['scriptcase']['sc_num_img']++ ; 
   } 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['imagenter'] = array(
                       'row'    => '',
               'type'    => 'imagem',
               'valList' => array($this->Ini->Nm_lang['lang_othr_show_imgg']),
               'imgFile' => $out_imagenter,
               'imgOrig' => $out1_imagenter,
               'keepImg' => $sKeepImage,
              );
          }
   }

          //----- nombre1
   function ajax_return_values_nombre1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombre1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nombre1);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nombre1'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nombre2
   function ajax_return_values_nombre2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombre2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nombre2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nombre2'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- apellido1
   function ajax_return_values_apellido1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("apellido1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->apellido1);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['apellido1'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- apellido2
   function ajax_return_values_apellido2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("apellido2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->apellido2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['apellido2'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tel_cel
   function ajax_return_values_tel_cel($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tel_cel", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tel_cel);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tel_cel'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- urlmail
   function ajax_return_values_urlmail($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("urlmail", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->urlmail);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['urlmail'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- nombres
   function ajax_return_values_nombres($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombres", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nombres);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nombres'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- representante
   function ajax_return_values_representante($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("representante", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->representante);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['representante'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- sexo
   function ajax_return_values_sexo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sexo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sexo);
              $aLookup = array();
              $this->_tmp_lookup_sexo = $this->sexo;

$aLookup[] = array(terceros_cliente_mob_pack_protect_string('M') => str_replace('<', '&lt;',terceros_cliente_mob_pack_protect_string("Masculino")));
$aLookup[] = array(terceros_cliente_mob_pack_protect_string('F') => str_replace('<', '&lt;',terceros_cliente_mob_pack_protect_string("Femenino")));
$aLookup[] = array(terceros_cliente_mob_pack_protect_string('O') => str_replace('<', '&lt;',terceros_cliente_mob_pack_protect_string("Otro")));
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_sexo'][] = 'M';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_sexo'][] = 'F';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_sexo'][] = 'O';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"sexo\"";
          if (isset($this->NM_ajax_info['select_html']['sexo']) && !empty($this->NM_ajax_info['select_html']['sexo']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['sexo']);
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

                  if ($this->sexo == $sValue)
                  {
                      $this->_tmp_lookup_sexo = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['sexo'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['sexo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['sexo']['valList'][$i] = terceros_cliente_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['sexo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['sexo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['sexo']['labList'] = $aLabel;
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

$aLookup[] = array(terceros_cliente_mob_pack_protect_string('NAT') => str_replace('<', '&lt;',terceros_cliente_mob_pack_protect_string("NATURAL")));
$aLookup[] = array(terceros_cliente_mob_pack_protect_string('JUR') => str_replace('<', '&lt;',terceros_cliente_mob_pack_protect_string("JURÍDICA")));
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_tipo'][] = 'NAT';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_tipo'][] = 'JUR';
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
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipo']['valList'][$i] = terceros_cliente_mob_pack_protect_string($v);
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

          //----- regimen
   function ajax_return_values_regimen($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("regimen", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->regimen);
              $aLookup = array();
              $this->_tmp_lookup_regimen = $this->regimen;

$aLookup[] = array(terceros_cliente_mob_pack_protect_string('SIM') => str_replace('<', '&lt;',terceros_cliente_mob_pack_protect_string("SIMPLIFICADO")));
$aLookup[] = array(terceros_cliente_mob_pack_protect_string('COMUN') => str_replace('<', '&lt;',terceros_cliente_mob_pack_protect_string("COMÚN")));
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_regimen'][] = 'SIM';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_regimen'][] = 'COMUN';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"regimen\"";
          if (isset($this->NM_ajax_info['select_html']['regimen']) && !empty($this->NM_ajax_info['select_html']['regimen']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['regimen']);
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

                  if ($this->regimen == $sValue)
                  {
                      $this->_tmp_lookup_regimen = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['regimen'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['regimen']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['regimen']['valList'][$i] = terceros_cliente_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['regimen']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['regimen']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['regimen']['labList'] = $aLabel;
          }
   }

          //----- direccion
   function ajax_return_values_direccion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("direccion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->direccion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['direccion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- departamento
   function ajax_return_values_departamento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("departamento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->departamento);
              $aLookup = array();
              $this->_tmp_lookup_departamento = $this->departamento;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_departamento']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_departamento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_departamento']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_departamento'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dv = $this->dv;
   $old_value_cupo = $this->cupo;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_cupo = $this->cupo;

   $nm_comando = "SELECT iddep, departamento  FROM departamento  ORDER BY departamento";

   $this->dv = $old_value_dv;
   $this->cupo = $old_value_cupo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(terceros_cliente_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', terceros_cliente_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_departamento'][] = $rs->fields[0];
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
          $sSelComp = "name=\"departamento\"";
          if (isset($this->NM_ajax_info['select_html']['departamento']) && !empty($this->NM_ajax_info['select_html']['departamento']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['departamento']);
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

                  if ($this->departamento == $sValue)
                  {
                      $this->_tmp_lookup_departamento = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['departamento'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['departamento']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['departamento']['valList'][$i] = terceros_cliente_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['departamento']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['departamento']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['departamento']['labList'] = $aLabel;
          }
   }

          //----- idmuni
   function ajax_return_values_idmuni($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idmuni", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idmuni);
              $aLookup = array();
              $this->_tmp_lookup_idmuni = $this->idmuni;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_idmuni']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_idmuni'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_idmuni']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_idmuni'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dv = $this->dv;
   $old_value_cupo = $this->cupo;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_cupo = $this->cupo;

   $nm_comando = "SELECT idmun, municipio  FROM municipio  WHERE iddepar=$this->departamento ORDER BY municipio";

   $this->dv = $old_value_dv;
   $this->cupo = $old_value_cupo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(terceros_cliente_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', terceros_cliente_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_idmuni'][] = $rs->fields[0];
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
          $sSelComp = "name=\"idmuni\"";
          if (isset($this->NM_ajax_info['select_html']['idmuni']) && !empty($this->NM_ajax_info['select_html']['idmuni']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['idmuni']);
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

                  if ($this->idmuni == $sValue)
                  {
                      $this->_tmp_lookup_idmuni = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['idmuni'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idmuni']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idmuni']['valList'][$i] = terceros_cliente_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idmuni']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idmuni']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idmuni']['labList'] = $aLabel;
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

          //----- cliente
   function ajax_return_values_cliente($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cliente", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cliente);
              $aLookup = array();
              $this->_tmp_lookup_cliente = $this->cliente;

$aLookup[] = array(terceros_cliente_mob_pack_protect_string('SI') => str_replace('<', '&lt;',terceros_cliente_mob_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_cliente'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"cliente\"";
          if (isset($this->NM_ajax_info['select_html']['cliente']) && !empty($this->NM_ajax_info['select_html']['cliente']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['cliente']);
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

                  if ($this->cliente == $sValue)
                  {
                      $this->_tmp_lookup_cliente = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['cliente'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['cliente']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['cliente']['valList'][$i] = terceros_cliente_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['cliente']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['cliente']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['cliente']['labList'] = $aLabel;
          }
   }

          //----- es_restaurante
   function ajax_return_values_es_restaurante($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("es_restaurante", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->es_restaurante);
              $aLookup = array();
              $this->_tmp_lookup_es_restaurante = $this->es_restaurante;

$aLookup[] = array(terceros_cliente_mob_pack_protect_string('NO') => str_replace('<', '&lt;',terceros_cliente_mob_pack_protect_string("NO")));
$aLookup[] = array(terceros_cliente_mob_pack_protect_string('SI') => str_replace('<', '&lt;',terceros_cliente_mob_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_es_restaurante'][] = 'NO';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_es_restaurante'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['es_restaurante']) && !empty($this->NM_ajax_info['select_html']['es_restaurante']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['es_restaurante']);
          }
          $this->NM_ajax_info['fldList']['es_restaurante'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['es_restaurante']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['es_restaurante']['valList'][$i] = terceros_cliente_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['es_restaurante']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['es_restaurante']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['es_restaurante']['labList'] = $aLabel;
          }
   }

          //----- credito
   function ajax_return_values_credito($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("credito", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->credito);
              $aLookup = array();
              $this->_tmp_lookup_credito = $this->credito;

$aLookup[] = array(terceros_cliente_mob_pack_protect_string('NO') => str_replace('<', '&lt;',terceros_cliente_mob_pack_protect_string("NO")));
$aLookup[] = array(terceros_cliente_mob_pack_protect_string('SI') => str_replace('<', '&lt;',terceros_cliente_mob_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_credito'][] = 'NO';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_credito'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"credito\"";
          if (isset($this->NM_ajax_info['select_html']['credito']) && !empty($this->NM_ajax_info['select_html']['credito']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['credito']);
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

                  if ($this->credito == $sValue)
                  {
                      $this->_tmp_lookup_credito = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['credito'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['credito']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['credito']['valList'][$i] = terceros_cliente_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['credito']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['credito']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['credito']['labList'] = $aLabel;
          }
   }

          //----- cupo
   function ajax_return_values_cupo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cupo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cupo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cupo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- loatiende
   function ajax_return_values_loatiende($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("loatiende", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->loatiende);
              $aLookup = array();
              $this->_tmp_lookup_loatiende = $this->loatiende;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_loatiende']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_loatiende'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_loatiende']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_loatiende'] = array(); 
}
$aLookup[] = array(terceros_cliente_mob_pack_protect_string('') => str_replace('<', '&lt;',terceros_cliente_mob_pack_protect_string('Vendedor')));
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_loatiende'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dv = $this->dv;
   $old_value_cupo = $this->cupo;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_cupo = $this->cupo;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + \"  \" + nombres  FROM terceros  where empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento, \"  \",nombres)  FROM terceros  where empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&\"  \"&nombres  FROM terceros  where empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||\"  \"||nombres  FROM terceros  where empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + \"  \" + nombres  FROM terceros  where empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||\"  \"||nombres  FROM terceros  where empleado='SI' ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||\"  \"||nombres  FROM terceros  where empleado='SI' ORDER BY documento, nombres";
   }

   $this->dv = $old_value_dv;
   $this->cupo = $old_value_cupo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(terceros_cliente_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', terceros_cliente_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_loatiende'][] = $rs->fields[0];
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
          $sSelComp = "name=\"loatiende\"";
          if (isset($this->NM_ajax_info['select_html']['loatiende']) && !empty($this->NM_ajax_info['select_html']['loatiende']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['loatiende']);
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

                  if ($this->loatiende == $sValue)
                  {
                      $this->_tmp_lookup_loatiende = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['loatiende'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['loatiende']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['loatiende']['valList'][$i] = terceros_cliente_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['loatiende']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['loatiende']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['loatiende']['labList'] = $aLabel;
          }
   }

          //----- idtercero
   function ajax_return_values_idtercero($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idtercero", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idtercero);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idtercero'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("idtercero", $this->form_encode_input($sTmpValue))),
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['upload_dir'][$fieldName][] = $newName;
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
      $_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_apellido1 = $this->apellido1;
    $original_apellido2 = $this->apellido2;
    $original_cliente = $this->cliente;
    $original_credito = $this->credito;
    $original_cupo = $this->cupo;
    $original_departamento = $this->departamento;
    $original_documento = $this->documento;
    $original_idmuni = $this->idmuni;
    $original_nombre1 = $this->nombre1;
    $original_nombre2 = $this->nombre2;
    $original_nombres = $this->nombres;
}
if (!isset($this->sc_temp_nomb)) {$this->sc_temp_nomb = (isset($_SESSION['nomb'])) ? $_SESSION['nomb'] : "";}
if (!isset($this->sc_temp_sa)) {$this->sc_temp_sa = (isset($_SESSION['sa'])) ? $_SESSION['sa'] : "";}
if (!isset($this->sc_temp_pa)) {$this->sc_temp_pa = (isset($_SESSION['pa'])) ? $_SESSION['pa'] : "";}
if (!isset($this->sc_temp_sn)) {$this->sc_temp_sn = (isset($_SESSION['sn'])) ? $_SESSION['sn'] : "";}
if (!isset($this->sc_temp_pn)) {$this->sc_temp_pn = (isset($_SESSION['pn'])) ? $_SESSION['pn'] : "";}
if (!isset($this->sc_temp_id_tercero)) {$this->sc_temp_id_tercero = (isset($_SESSION['id_tercero'])) ? $_SESSION['id_tercero'] : "";}
  if($this->documento =="0000000")
{
	$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
	$this->sc_ajax_javascript('nm_field_disabled', array("documento=disabled;tipo_documento=disabled;nombres=disabled", ""));
;
}

$this->departamento =23;
$this->sc_temp_id_tercero=$this->idtercero ;
$this->sc_temp_pn=$this->nombre1 ;
$this->sc_temp_sn=$this->nombre2 ;
$this->sc_temp_pa=$this->apellido1 ;
$this->sc_temp_sa=$this->apellido2 ;
$this->sc_temp_nomb=$this->nombres ;
 
if($this->idtercero >0)
	{
	;
	;
	;
	;
	;
	;
	}
else
	{
	;
	;
	;
	;
	;
	;
	}
if($this->documento !="")
	{
	$buscar="SELECT iddepar FROM municipio WHERE idmun = $this->idmuni ";
	 
      $nm_select = $buscar; 
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
	$this->ds =substr($this->ds , 7);
	$this->departamento =$this->ds ;

	if($this->cliente =='SI')
		{	
		if($this->credito =='SI')
			{
				
				$this->cupodis =$this->cupo -$this->saldo ;
				if($this->cupodis !=$this->cupo ){$this->sc_ajax_javascript('nm_field_disabled', array("credito=disabled", ""));
;}
				$this->sc_ajax_javascript('nm_field_disabled', array("cupodis=disabled", ""));
;
				if($this->cupodis !=$this->cupo ){$this->sc_ajax_javascript('nm_field_disabled', array("credito=disabled", ""));
;}
				$this->sc_ajax_javascript('nm_field_disabled', array("cupodis=disabled", ""));
;
			}
		else
			{
				$this->sc_ajax_javascript('nm_field_disabled', array("cupo=disabled;cupodis=disabled", ""));
;
				$this->sc_ajax_javascript('nm_field_disabled', array("cliente=", ""));
;
			}
		}
	else
		{
		$this->credito ='NO';
		$this->cupodis =0;
		$this->cupo =0;
		$this->efec_retencion ='N';
		
		;
		;
		;
		;
		}
	}

	
if($this->proveedor =='SI')
	{
	;
	$this->nmgp_cmp_hidden["autoretenedor"] = "on"; $this->NM_ajax_info['fieldDisplay']['autoretenedor'] = 'on';
	$this->nmgp_cmp_hidden["creditoprov"] = "on"; $this->NM_ajax_info['fieldDisplay']['creditoprov'] = 'on';
	$this->nmgp_cmp_hidden["dias"] = "on"; $this->NM_ajax_info['fieldDisplay']['dias'] = 'on';
	}
else
	{
	;
	$this->nmgp_cmp_hidden["autoretenedor"] = "off"; $this->NM_ajax_info['fieldDisplay']['autoretenedor'] = 'off';
	$this->nmgp_cmp_hidden["creditoprov"] = "off"; $this->NM_ajax_info['fieldDisplay']['creditoprov'] = 'off';
	$this->nmgp_cmp_hidden["dias"] = "off"; $this->NM_ajax_info['fieldDisplay']['dias'] = 'off';
	}
if($this->sucur_cliente =='SI')
	{
	;
	}
else
	{
	;
	}
if (isset($this->sc_temp_id_tercero)) { $_SESSION['id_tercero'] = $this->sc_temp_id_tercero;}
if (isset($this->sc_temp_pn)) { $_SESSION['pn'] = $this->sc_temp_pn;}
if (isset($this->sc_temp_sn)) { $_SESSION['sn'] = $this->sc_temp_sn;}
if (isset($this->sc_temp_pa)) { $_SESSION['pa'] = $this->sc_temp_pa;}
if (isset($this->sc_temp_sa)) { $_SESSION['sa'] = $this->sc_temp_sa;}
if (isset($this->sc_temp_nomb)) { $_SESSION['nomb'] = $this->sc_temp_nomb;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_apellido1 != $this->apellido1 || (isset($bFlagRead_apellido1) && $bFlagRead_apellido1)))
    {
        $this->ajax_return_values_apellido1(true);
    }
    if (($original_apellido2 != $this->apellido2 || (isset($bFlagRead_apellido2) && $bFlagRead_apellido2)))
    {
        $this->ajax_return_values_apellido2(true);
    }
    if (($original_cliente != $this->cliente || (isset($bFlagRead_cliente) && $bFlagRead_cliente)))
    {
        $this->ajax_return_values_cliente(true);
    }
    if (($original_credito != $this->credito || (isset($bFlagRead_credito) && $bFlagRead_credito)))
    {
        $this->ajax_return_values_credito(true);
    }
    if (($original_cupo != $this->cupo || (isset($bFlagRead_cupo) && $bFlagRead_cupo)))
    {
        $this->ajax_return_values_cupo(true);
    }
    if (($original_departamento != $this->departamento || (isset($bFlagRead_departamento) && $bFlagRead_departamento)))
    {
        $this->ajax_return_values_departamento(true);
    }
    if (($original_documento != $this->documento || (isset($bFlagRead_documento) && $bFlagRead_documento)))
    {
        $this->ajax_return_values_documento(true);
    }
    if (($original_idmuni != $this->idmuni || (isset($bFlagRead_idmuni) && $bFlagRead_idmuni)))
    {
        $this->ajax_return_values_idmuni(true);
    }
    if (($original_nombre1 != $this->nombre1 || (isset($bFlagRead_nombre1) && $bFlagRead_nombre1)))
    {
        $this->ajax_return_values_nombre1(true);
    }
    if (($original_nombre2 != $this->nombre2 || (isset($bFlagRead_nombre2) && $bFlagRead_nombre2)))
    {
        $this->ajax_return_values_nombre2(true);
    }
    if (($original_nombres != $this->nombres || (isset($bFlagRead_nombres) && $bFlagRead_nombres)))
    {
        $this->ajax_return_values_nombres(true);
    }
}
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off'; 
      }
      if (empty($this->con_actual))
      {
          $this->con_actual_hora = $this->con_actual;
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
      $this->cupo = str_replace($sc_parm1, $sc_parm2, $this->cupo); 
      $this->saldo = str_replace($sc_parm1, $sc_parm2, $this->saldo); 
      $this->saldoapagar = str_replace($sc_parm1, $sc_parm2, $this->saldoapagar); 
      $this->cupodis = str_replace($sc_parm1, $sc_parm2, $this->cupodis); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->cupo = "'" . $this->cupo . "'";
      $this->saldo = "'" . $this->saldo . "'";
      $this->saldoapagar = "'" . $this->saldoapagar . "'";
      $this->cupodis = "'" . $this->cupodis . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->cupo = str_replace("'", "", $this->cupo); 
      $this->saldo = str_replace("'", "", $this->saldo); 
      $this->saldoapagar = str_replace("'", "", $this->saldoapagar); 
      $this->cupodis = str_replace("'", "", $this->cupodis); 
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
      $_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'on';
   
      $nm_select = "select (select idfaccom from facturacom where idprov='".$this->idtercero ."' Limit 1) as compra, (select idfacven from facturaven where idcli='".$this->idtercero ."' Limit 1) as venta, (select numero from terceros_cuentas where tercero='".$this->idtercero ."' Limit 1) as t_cuent"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_ter = array();
     if ($this->idtercero != "" && $this->idtercero != "" && $this->idtercero != "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds_ter[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_ter = false;
          $this->ds_ter_erro = $this->Db->ErrorMsg();
      } 
     } 
;

if(isset($this->ds_ter[0][0]) or isset($this->ds_ter[0][1]) or isset($this->ds_ter[0][2]))
	{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Tercero ya tiene Movimiento, NO se puede Borrar";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_terceros_cliente_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_terceros_cliente_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "Tercero ya tiene Movimiento, NO se puede Borrar";
 }
;
	}
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off'; 
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
      if (('alterar' == $this->nmgp_opcao || 'igual' == $this->nmgp_opcao) && $this->fechultcomp == ""){$this->fechultcomp = "null"; $NM_val_null[] = "fechultcomp";}  
      $NM_val_form['tipo_documento'] = $this->tipo_documento;
      $NM_val_form['documento'] = $this->documento;
      $NM_val_form['dv'] = $this->dv;
      $NM_val_form['imagenter'] = $this->imagenter;
      $NM_val_form['nombre1'] = $this->nombre1;
      $NM_val_form['nombre2'] = $this->nombre2;
      $NM_val_form['apellido1'] = $this->apellido1;
      $NM_val_form['apellido2'] = $this->apellido2;
      $NM_val_form['tel_cel'] = $this->tel_cel;
      $NM_val_form['urlmail'] = $this->urlmail;
      $NM_val_form['nombres'] = $this->nombres;
      $NM_val_form['representante'] = $this->representante;
      $NM_val_form['sexo'] = $this->sexo;
      $NM_val_form['tipo'] = $this->tipo;
      $NM_val_form['regimen'] = $this->regimen;
      $NM_val_form['direccion'] = $this->direccion;
      $NM_val_form['departamento'] = $this->departamento;
      $NM_val_form['idmuni'] = $this->idmuni;
      $NM_val_form['observaciones'] = $this->observaciones;
      $NM_val_form['cliente'] = $this->cliente;
      $NM_val_form['es_restaurante'] = $this->es_restaurante;
      $NM_val_form['credito'] = $this->credito;
      $NM_val_form['cupo'] = $this->cupo;
      $NM_val_form['loatiende'] = $this->loatiende;
      $NM_val_form['idtercero'] = $this->idtercero;
      $NM_val_form['nacimiento'] = $this->nacimiento;
      $NM_val_form['fechault'] = $this->fechault;
      $NM_val_form['saldo'] = $this->saldo;
      $NM_val_form['afiliacion'] = $this->afiliacion;
      $NM_val_form['listaprecios'] = $this->listaprecios;
      $NM_val_form['con_actual'] = $this->con_actual;
      $NM_val_form['efec_retencion'] = $this->efec_retencion;
      $NM_val_form['empleado'] = $this->empleado;
      $NM_val_form['proveedor'] = $this->proveedor;
      $NM_val_form['contacto'] = $this->contacto;
      $NM_val_form['telefonos_prov'] = $this->telefonos_prov;
      $NM_val_form['email'] = $this->email;
      $NM_val_form['url'] = $this->url;
      $NM_val_form['creditoprov'] = $this->creditoprov;
      $NM_val_form['dias'] = $this->dias;
      $NM_val_form['fechultcomp'] = $this->fechultcomp;
      $NM_val_form['saldoapagar'] = $this->saldoapagar;
      $NM_val_form['autoretenedor'] = $this->autoretenedor;
      $NM_val_form['sucur_cliente'] = $this->sucur_cliente;
      $NM_val_form['cupodis'] = $this->cupodis;
      $NM_val_form['relleno2'] = $this->relleno2;
      $NM_val_form['sucursales'] = $this->sucursales;
      if ($this->idtercero === "" || is_null($this->idtercero))  
      { 
          $this->idtercero = 0;
      } 
      if ($this->saldo === "" || is_null($this->saldo))  
      { 
          $this->saldo = 0;
          $this->sc_force_zero[] = 'saldo';
      } 
      if ($this->idmuni === "" || is_null($this->idmuni))  
      { 
          $this->idmuni = 0;
          $this->sc_force_zero[] = 'idmuni';
      } 
      if ($this->cupo === "" || is_null($this->cupo))  
      { 
          $this->cupo = 0;
          $this->sc_force_zero[] = 'cupo';
      } 
      if ($this->listaprecios === "" || is_null($this->listaprecios))  
      { 
          $this->listaprecios = 0;
          $this->sc_force_zero[] = 'listaprecios';
      } 
      if ($this->loatiende === "" || is_null($this->loatiende))  
      { 
          $this->loatiende = 0;
          $this->sc_force_zero[] = 'loatiende';
      } 
      if ($this->dias === "" || is_null($this->dias))  
      { 
          $this->dias = 0;
          $this->sc_force_zero[] = 'dias';
      } 
      if ($this->saldoapagar === "" || is_null($this->saldoapagar))  
      { 
          $this->saldoapagar = 0;
          $this->sc_force_zero[] = 'saldoapagar';
      } 
      if ($this->dv === "" || is_null($this->dv))  
      { 
          $this->dv = 0;
          $this->sc_force_zero[] = 'dv';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->documento_before_qstr = $this->documento;
          $this->documento = substr($this->Db->qstr($this->documento), 1, -1); 
          if ($this->documento == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->documento = "null"; 
              $NM_val_null[] = "documento";
          } 
          $this->nombres_before_qstr = $this->nombres;
          $this->nombres = substr($this->Db->qstr($this->nombres), 1, -1); 
          if ($this->nombres == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombres = "null"; 
              $NM_val_null[] = "nombres";
          } 
          $this->direccion_before_qstr = $this->direccion;
          $this->direccion = substr($this->Db->qstr($this->direccion), 1, -1); 
          if ($this->direccion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->direccion = "null"; 
              $NM_val_null[] = "direccion";
          } 
          $this->tel_cel_before_qstr = $this->tel_cel;
          $this->tel_cel = substr($this->Db->qstr($this->tel_cel), 1, -1); 
          if ($this->tel_cel == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tel_cel = "null"; 
              $NM_val_null[] = "tel_cel";
          } 
          if ($this->nacimiento == "")  
          { 
              $this->nacimiento = "null"; 
              $NM_val_null[] = "nacimiento";
          } 
          $this->sexo_before_qstr = $this->sexo;
          $this->sexo = substr($this->Db->qstr($this->sexo), 1, -1); 
          if ($this->sexo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sexo = "null"; 
              $NM_val_null[] = "sexo";
          } 
          $this->urlmail_before_qstr = $this->urlmail;
          $this->urlmail = substr($this->Db->qstr($this->urlmail), 1, -1); 
          if ($this->urlmail == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->urlmail = "null"; 
              $NM_val_null[] = "urlmail";
          } 
          if ($this->fechault == "")  
          { 
              $this->fechault = "null"; 
              $NM_val_null[] = "fechault";
          } 
          if ($this->afiliacion == "")  
          { 
              $this->afiliacion = "null"; 
              $NM_val_null[] = "afiliacion";
          } 
          $this->observaciones_before_qstr = $this->observaciones;
          $this->observaciones = substr($this->Db->qstr($this->observaciones), 1, -1); 
          if ($this->observaciones == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->observaciones = "null"; 
              $NM_val_null[] = "observaciones";
          } 
          $this->credito_before_qstr = $this->credito;
          $this->credito = substr($this->Db->qstr($this->credito), 1, -1); 
          if ($this->credito == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->credito = "null"; 
              $NM_val_null[] = "credito";
          } 
          if ($this->con_actual == "")  
          { 
              $this->con_actual = "null"; 
              $NM_val_null[] = "con_actual";
          } 
          $this->efec_retencion_before_qstr = $this->efec_retencion;
          $this->efec_retencion = substr($this->Db->qstr($this->efec_retencion), 1, -1); 
          if ($this->efec_retencion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->efec_retencion = "null"; 
              $NM_val_null[] = "efec_retencion";
          } 
          $this->regimen_before_qstr = $this->regimen;
          $this->regimen = substr($this->Db->qstr($this->regimen), 1, -1); 
          if ($this->regimen == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->regimen = "null"; 
              $NM_val_null[] = "regimen";
          } 
          $this->tipo_before_qstr = $this->tipo;
          $this->tipo = substr($this->Db->qstr($this->tipo), 1, -1); 
          if ($this->tipo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo = "null"; 
              $NM_val_null[] = "tipo";
          } 
          $this->cliente_before_qstr = $this->cliente;
          $this->cliente = substr($this->Db->qstr($this->cliente), 1, -1); 
          if ($this->cliente == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cliente = "null"; 
              $NM_val_null[] = "cliente";
          } 
          $this->empleado_before_qstr = $this->empleado;
          $this->empleado = substr($this->Db->qstr($this->empleado), 1, -1); 
          if ($this->empleado == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->empleado = "null"; 
              $NM_val_null[] = "empleado";
          } 
          $this->proveedor_before_qstr = $this->proveedor;
          $this->proveedor = substr($this->Db->qstr($this->proveedor), 1, -1); 
          if ($this->proveedor == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->proveedor = "null"; 
              $NM_val_null[] = "proveedor";
          } 
          $this->contacto_before_qstr = $this->contacto;
          $this->contacto = substr($this->Db->qstr($this->contacto), 1, -1); 
          if ($this->contacto == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->contacto = "null"; 
              $NM_val_null[] = "contacto";
          } 
          $this->telefonos_prov_before_qstr = $this->telefonos_prov;
          $this->telefonos_prov = substr($this->Db->qstr($this->telefonos_prov), 1, -1); 
          if ($this->telefonos_prov == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->telefonos_prov = "null"; 
              $NM_val_null[] = "telefonos_prov";
          } 
          $this->email_before_qstr = $this->email;
          $this->email = substr($this->Db->qstr($this->email), 1, -1); 
          if ($this->email == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->email = "null"; 
              $NM_val_null[] = "email";
          } 
          $this->url_before_qstr = $this->url;
          $this->url = substr($this->Db->qstr($this->url), 1, -1); 
          if ($this->url == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->url = "null"; 
              $NM_val_null[] = "url";
          } 
          $this->creditoprov_before_qstr = $this->creditoprov;
          $this->creditoprov = substr($this->Db->qstr($this->creditoprov), 1, -1); 
          if ($this->creditoprov == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->creditoprov = "null"; 
              $NM_val_null[] = "creditoprov";
          } 
          if ($this->fechultcomp == "")  
          { 
              $this->fechultcomp = "null"; 
              $NM_val_null[] = "fechultcomp";
          } 
          $this->autoretenedor_before_qstr = $this->autoretenedor;
          $this->autoretenedor = substr($this->Db->qstr($this->autoretenedor), 1, -1); 
          if ($this->autoretenedor == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->autoretenedor = "null"; 
              $NM_val_null[] = "autoretenedor";
          } 
          $this->tipo_documento_before_qstr = $this->tipo_documento;
          $this->tipo_documento = substr($this->Db->qstr($this->tipo_documento), 1, -1); 
          if ($this->tipo_documento == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo_documento = "null"; 
              $NM_val_null[] = "tipo_documento";
          } 
          $this->nombre1_before_qstr = $this->nombre1;
          $this->nombre1 = substr($this->Db->qstr($this->nombre1), 1, -1); 
          if ($this->nombre1 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombre1 = "null"; 
              $NM_val_null[] = "nombre1";
          } 
          $this->nombre2_before_qstr = $this->nombre2;
          $this->nombre2 = substr($this->Db->qstr($this->nombre2), 1, -1); 
          if ($this->nombre2 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombre2 = "null"; 
              $NM_val_null[] = "nombre2";
          } 
          $this->apellido1_before_qstr = $this->apellido1;
          $this->apellido1 = substr($this->Db->qstr($this->apellido1), 1, -1); 
          if ($this->apellido1 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->apellido1 = "null"; 
              $NM_val_null[] = "apellido1";
          } 
          $this->apellido2_before_qstr = $this->apellido2;
          $this->apellido2 = substr($this->Db->qstr($this->apellido2), 1, -1); 
          if ($this->apellido2 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->apellido2 = "null"; 
              $NM_val_null[] = "apellido2";
          } 
          $this->sucur_cliente_before_qstr = $this->sucur_cliente;
          $this->sucur_cliente = substr($this->Db->qstr($this->sucur_cliente), 1, -1); 
          if ($this->sucur_cliente == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sucur_cliente = "null"; 
              $NM_val_null[] = "sucur_cliente";
          } 
          $this->representante_before_qstr = $this->representante;
          $this->representante = substr($this->Db->qstr($this->representante), 1, -1); 
          if ($this->representante == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->representante = "null"; 
              $NM_val_null[] = "representante";
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          { 
              $nm_tmp = nm_conv_img_access(substr($this->imagenter, 0, 12));
              if (substr($this->imagenter, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
              { 
                  $this->imagenter = nm_conv_img_access($this->imagenter);
              } 
              if (!empty($this->imagenter) && $this->imagenter != 'null' && substr($this->imagenter, 0, 4) != "*nm*") 
              { 
                  $this->imagenter = "*nm*" . base64_encode($this->imagenter) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              if ($this->Ini->nm_tpbanco != "pdo_sqlsrv" && !empty($this->imagenter) && $this->imagenter != 'null' && substr($this->imagenter, 0, 4) != "*nm*") 
              { 
                  $this->imagenter = "*nm*" . base64_encode($this->imagenter) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              if ($this->Ini->nm_tpbanco != 'pdo_ibm' && !empty($this->imagenter) && $this->imagenter != 'null' && substr($this->imagenter, 0, 4) != "*nm*") 
              { 
                  $this->imagenter = "*nm*" . base64_encode($this->imagenter) ; 
              } 
          } 
          else
          { 
              $this->imagenter =  substr($this->Db->qstr($this->imagenter), 1, -1);
          } 
          if ($this->imagenter == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->imagenter = "null"; 
              $NM_val_null[] = "imagenter";
          } 
          $this->es_restaurante_before_qstr = $this->es_restaurante;
          $this->es_restaurante = substr($this->Db->qstr($this->es_restaurante), 1, -1); 
          if ($this->es_restaurante == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->es_restaurante = "null"; 
              $NM_val_null[] = "es_restaurante";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 terceros_cliente_mob_pack_ajax_response();
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
              $Cmd_Unique = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where (documento = '" . $this->documento . "') AND (idtercero <> $this->idtercero)";
              $Cmd_Unique = str_replace("'null'", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace("#null#", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $Cmd_Unique) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $Cmd_Unique;
              $rsUni = $this->Db->Execute($Cmd_Unique);
              if (false === $rsUni)
              {
                  $dbErrorMessage = $this->Db->ErrorMsg();
                  $dbErrorCode = $this->Db->ErrorNo();
                  $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $dbErrorMessage, true);
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) {
                      $this->sc_erro_update = $dbErrorMessage;
                      $this->NM_rollback_db();
                      if ($this->NM_ajax_flag) {
                          terceros_cliente_mob_pack_ajax_response();
                      }
                      exit;
                  }
              }
              elseif (0 < $rsUni->fields[0])
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_ukey'] . " Documento de Identidad/Nit"); 
                  $this->nmgp_opcao = "nada"; 
                  $aUpdateOk[] = 'documento';
                  $rsUni->Close();
              }
              else
              {
                  $rsUni->Close();
              }
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "documento = '$this->documento', nombres = '$this->nombres', direccion = '$this->direccion', tel_cel = '$this->tel_cel', sexo = '$this->sexo', urlmail = '$this->urlmail', idmuni = $this->idmuni, observaciones = '$this->observaciones', credito = '$this->credito', cupo = $this->cupo, loatiende = $this->loatiende, regimen = '$this->regimen', tipo = '$this->tipo', cliente = '$this->cliente', tipo_documento = '$this->tipo_documento', dv = $this->dv, nombre1 = '$this->nombre1', nombre2 = '$this->nombre2', apellido1 = '$this->apellido1', apellido2 = '$this->apellido2', representante = '$this->representante', es_restaurante = '$this->es_restaurante'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "documento = '$this->documento', nombres = '$this->nombres', direccion = '$this->direccion', tel_cel = '$this->tel_cel', sexo = '$this->sexo', urlmail = '$this->urlmail', idmuni = $this->idmuni, observaciones = '$this->observaciones', credito = '$this->credito', cupo = $this->cupo, loatiende = $this->loatiende, regimen = '$this->regimen', tipo = '$this->tipo', cliente = '$this->cliente', tipo_documento = '$this->tipo_documento', dv = $this->dv, nombre1 = '$this->nombre1', nombre2 = '$this->nombre2', apellido1 = '$this->apellido1', apellido2 = '$this->apellido2', representante = '$this->representante', es_restaurante = '$this->es_restaurante'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "documento = '$this->documento', nombres = '$this->nombres', direccion = '$this->direccion', tel_cel = '$this->tel_cel', sexo = '$this->sexo', urlmail = '$this->urlmail', idmuni = $this->idmuni, observaciones = '$this->observaciones', credito = '$this->credito', cupo = $this->cupo, loatiende = $this->loatiende, regimen = '$this->regimen', tipo = '$this->tipo', cliente = '$this->cliente', tipo_documento = '$this->tipo_documento', dv = $this->dv, nombre1 = '$this->nombre1', nombre2 = '$this->nombre2', apellido1 = '$this->apellido1', apellido2 = '$this->apellido2', representante = '$this->representante', es_restaurante = '$this->es_restaurante'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "documento = '$this->documento', nombres = '$this->nombres', direccion = '$this->direccion', tel_cel = '$this->tel_cel', sexo = '$this->sexo', urlmail = '$this->urlmail', idmuni = $this->idmuni, observaciones = '$this->observaciones', credito = '$this->credito', cupo = $this->cupo, loatiende = $this->loatiende, regimen = '$this->regimen', tipo = '$this->tipo', cliente = '$this->cliente', tipo_documento = '$this->tipo_documento', dv = $this->dv, nombre1 = '$this->nombre1', nombre2 = '$this->nombre2', apellido1 = '$this->apellido1', apellido2 = '$this->apellido2', representante = '$this->representante', es_restaurante = '$this->es_restaurante'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "documento = '$this->documento', nombres = '$this->nombres', direccion = '$this->direccion', tel_cel = '$this->tel_cel', sexo = '$this->sexo', urlmail = '$this->urlmail', idmuni = $this->idmuni, observaciones = '$this->observaciones', credito = '$this->credito', cupo = $this->cupo, loatiende = $this->loatiende, regimen = '$this->regimen', tipo = '$this->tipo', cliente = '$this->cliente', tipo_documento = '$this->tipo_documento', dv = $this->dv, nombre1 = '$this->nombre1', nombre2 = '$this->nombre2', apellido1 = '$this->apellido1', apellido2 = '$this->apellido2', representante = '$this->representante', es_restaurante = '$this->es_restaurante'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "documento = '$this->documento', nombres = '$this->nombres', direccion = '$this->direccion', tel_cel = '$this->tel_cel', sexo = '$this->sexo', urlmail = '$this->urlmail', idmuni = $this->idmuni, observaciones = '$this->observaciones', credito = '$this->credito', cupo = $this->cupo, loatiende = $this->loatiende, regimen = '$this->regimen', tipo = '$this->tipo', cliente = '$this->cliente', tipo_documento = '$this->tipo_documento', dv = $this->dv, nombre1 = '$this->nombre1', nombre2 = '$this->nombre2', apellido1 = '$this->apellido1', apellido2 = '$this->apellido2', representante = '$this->representante', es_restaurante = '$this->es_restaurante'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "documento = '$this->documento', nombres = '$this->nombres', direccion = '$this->direccion', tel_cel = '$this->tel_cel', sexo = '$this->sexo', urlmail = '$this->urlmail', idmuni = $this->idmuni, observaciones = '$this->observaciones', credito = '$this->credito', cupo = $this->cupo, loatiende = $this->loatiende, regimen = '$this->regimen', tipo = '$this->tipo', cliente = '$this->cliente', tipo_documento = '$this->tipo_documento', dv = $this->dv, nombre1 = '$this->nombre1', nombre2 = '$this->nombre2', apellido1 = '$this->apellido1', apellido2 = '$this->apellido2', representante = '$this->representante', es_restaurante = '$this->es_restaurante'"; 
              } 
              if (isset($NM_val_form['nacimiento']) && $NM_val_form['nacimiento'] != $this->nmgp_dados_select['nacimiento']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "nacimiento = #$this->nacimiento#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "nacimiento = EXTEND('" . $this->nacimiento . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "nacimiento = " . $this->Ini->date_delim . $this->nacimiento . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['fechault']) && $NM_val_form['fechault'] != $this->nmgp_dados_select['fechault']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "fechault = #$this->fechault#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "fechault = EXTEND('" . $this->fechault . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fechault = " . $this->Ini->date_delim . $this->fechault . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['saldo']) && $NM_val_form['saldo'] != $this->nmgp_dados_select['saldo']) 
              { 
                  $SC_fields_update[] = "saldo = $this->saldo"; 
              } 
              if (isset($NM_val_form['afiliacion']) && $NM_val_form['afiliacion'] != $this->nmgp_dados_select['afiliacion']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "afiliacion = #$this->afiliacion#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "afiliacion = EXTEND('" . $this->afiliacion . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "afiliacion = " . $this->Ini->date_delim . $this->afiliacion . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['listaprecios']) && $NM_val_form['listaprecios'] != $this->nmgp_dados_select['listaprecios']) 
              { 
                  $SC_fields_update[] = "listaprecios = $this->listaprecios"; 
              } 
              if (isset($NM_val_form['con_actual']) && $NM_val_form['con_actual'] != $this->nmgp_dados_select['con_actual']) 
              { 
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  { 
                      $SC_fields_update[] = "con_actual = TO_DATE('$this->con_actual', 'yyyy-mm-dd hh24:mi:ss')"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "con_actual = '$this->con_actual'"; 
                  } 
              } 
              if (isset($NM_val_form['efec_retencion']) && $NM_val_form['efec_retencion'] != $this->nmgp_dados_select['efec_retencion']) 
              { 
                  $SC_fields_update[] = "efec_retencion = '$this->efec_retencion'"; 
              } 
              if (isset($NM_val_form['empleado']) && $NM_val_form['empleado'] != $this->nmgp_dados_select['empleado']) 
              { 
                  $SC_fields_update[] = "empleado = '$this->empleado'"; 
              } 
              if (isset($NM_val_form['proveedor']) && $NM_val_form['proveedor'] != $this->nmgp_dados_select['proveedor']) 
              { 
                  $SC_fields_update[] = "proveedor = '$this->proveedor'"; 
              } 
              if (isset($NM_val_form['contacto']) && $NM_val_form['contacto'] != $this->nmgp_dados_select['contacto']) 
              { 
                  $SC_fields_update[] = "contacto = '$this->contacto'"; 
              } 
              if (isset($NM_val_form['telefonos_prov']) && $NM_val_form['telefonos_prov'] != $this->nmgp_dados_select['telefonos_prov']) 
              { 
                  $SC_fields_update[] = "telefonos_prov = '$this->telefonos_prov'"; 
              } 
              if (isset($NM_val_form['email']) && $NM_val_form['email'] != $this->nmgp_dados_select['email']) 
              { 
                  $SC_fields_update[] = "email = '$this->email'"; 
              } 
              if (isset($NM_val_form['url']) && $NM_val_form['url'] != $this->nmgp_dados_select['url']) 
              { 
                  $SC_fields_update[] = "url = '$this->url'"; 
              } 
              if (isset($NM_val_form['creditoprov']) && $NM_val_form['creditoprov'] != $this->nmgp_dados_select['creditoprov']) 
              { 
                  $SC_fields_update[] = "creditoprov = '$this->creditoprov'"; 
              } 
              if (isset($NM_val_form['dias']) && $NM_val_form['dias'] != $this->nmgp_dados_select['dias']) 
              { 
                  $SC_fields_update[] = "dias = $this->dias"; 
              } 
              if (isset($NM_val_form['fechultcomp']) && $NM_val_form['fechultcomp'] != $this->nmgp_dados_select['fechultcomp']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "fechultcomp = #$this->fechultcomp#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "fechultcomp = EXTEND('" . $this->fechultcomp . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fechultcomp = " . $this->Ini->date_delim . $this->fechultcomp . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['saldoapagar']) && $NM_val_form['saldoapagar'] != $this->nmgp_dados_select['saldoapagar']) 
              { 
                  $SC_fields_update[] = "saldoapagar = $this->saldoapagar"; 
              } 
              if (isset($NM_val_form['autoretenedor']) && $NM_val_form['autoretenedor'] != $this->nmgp_dados_select['autoretenedor']) 
              { 
                  $SC_fields_update[] = "autoretenedor = '$this->autoretenedor'"; 
              } 
              if (isset($NM_val_form['sucur_cliente']) && $NM_val_form['sucur_cliente'] != $this->nmgp_dados_select['sucur_cliente']) 
              { 
                  $SC_fields_update[] = "sucur_cliente = '$this->sucur_cliente'"; 
              } 
              $aDoNotUpdate = array();
              $temp_cmd_sql = "";
              if ($this->imagenter_limpa == "S")
              {
                  if ($this->imagenter != "null")
                  {
                      $this->imagenter = '';
                  }
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                  {
                  }
                  else
                  {
                      $temp_cmd_sql = "imagenter = '" . $this->imagenter . "'";
                  }
                  $this->imagenter = "";
              }
              else
              {
                  if ($this->imagenter != "none" && $this->imagenter != "")
                  {
                      $NM_conteudo =  $this->imagenter;
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                      {
                      }
                      else
                      {
                          $temp_cmd_sql .= " imagenter = '$NM_conteudo'";
                      }
                  }
                  else
                  {
                      $aDoNotUpdate[] = "imagenter";
                  }
              }
              if (!empty($temp_cmd_sql))
              {
                  $SC_fields_update[] = $temp_cmd_sql;
              }
              if ($this->imagenter_limpa == "S" || ($this->imagenter != "none" && $this->imagenter != "" && in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) 
                  { 
                      $SC_fields_update[] = "imagenter = ''"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql)) 
                  { 
                      $SC_fields_update[] = "imagenter = ''"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
                  { 
                      $SC_fields_update[] = "imagenter = ''"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                  { 
                      $SC_fields_update[] = "imagenter = null"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite)) 
                  { 
                      $SC_fields_update[] = "imagenter = ''"; 
                  } 
                  else 
                  { 
                      $SC_fields_update[] = "imagenter = empty_blob()"; 
                  } 
              } 
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE idtercero = $this->idtercero ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE idtercero = $this->idtercero ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE idtercero = $this->idtercero ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE idtercero = $this->idtercero ";  
              }  
              else  
              {
                  $comando .= " WHERE idtercero = $this->idtercero ";  
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
                                  terceros_cliente_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              $this->documento = $this->documento_before_qstr;
              $this->nombres = $this->nombres_before_qstr;
              $this->direccion = $this->direccion_before_qstr;
              $this->tel_cel = $this->tel_cel_before_qstr;
              $this->sexo = $this->sexo_before_qstr;
              $this->urlmail = $this->urlmail_before_qstr;
              $this->observaciones = $this->observaciones_before_qstr;
              $this->credito = $this->credito_before_qstr;
              $this->efec_retencion = $this->efec_retencion_before_qstr;
              $this->regimen = $this->regimen_before_qstr;
              $this->tipo = $this->tipo_before_qstr;
              $this->cliente = $this->cliente_before_qstr;
              $this->empleado = $this->empleado_before_qstr;
              $this->proveedor = $this->proveedor_before_qstr;
              $this->contacto = $this->contacto_before_qstr;
              $this->telefonos_prov = $this->telefonos_prov_before_qstr;
              $this->email = $this->email_before_qstr;
              $this->url = $this->url_before_qstr;
              $this->creditoprov = $this->creditoprov_before_qstr;
              $this->autoretenedor = $this->autoretenedor_before_qstr;
              $this->tipo_documento = $this->tipo_documento_before_qstr;
              $this->nombre1 = $this->nombre1_before_qstr;
              $this->nombre2 = $this->nombre2_before_qstr;
              $this->apellido1 = $this->apellido1_before_qstr;
              $this->apellido2 = $this->apellido2_before_qstr;
              $this->sucur_cliente = $this->sucur_cliente_before_qstr;
              $this->representante = $this->representante_before_qstr;
              $this->es_restaurante = $this->es_restaurante_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if ($this->imagenter_limpa == "S" && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"imagenter\", \"\",  \"idtercero = $this->idtercero\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "imagenter", "",  "idtercero = $this->idtercero"); 
                  } 
                  else 
                  { 
                      if ($this->imagenter != "none" && $this->imagenter != "") 
                      { 
                          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"imagenter\", $this->imagenter,  \"idtercero = $this->idtercero\")"; 
                          $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "imagenter", $this->imagenter,  "idtercero = $this->idtercero"); 
                      } 
                  } 
                  if ($rs === false) 
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          terceros_cliente_mob_pack_ajax_response();
                      }
                      exit;  
                  }   
              }   
              if ($this->imagenter_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['imagenter_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
                  $this->NM_ajax_info['fldList']['imagenter_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }


              if     (isset($NM_val_form) && isset($NM_val_form['idtercero'])) { $this->idtercero = $NM_val_form['idtercero']; }
              elseif (isset($this->idtercero)) { $this->nm_limpa_alfa($this->idtercero); }
              if     (isset($NM_val_form) && isset($NM_val_form['documento'])) { $this->documento = $NM_val_form['documento']; }
              elseif (isset($this->documento)) { $this->nm_limpa_alfa($this->documento); }
              if     (isset($NM_val_form) && isset($NM_val_form['nombres'])) { $this->nombres = $NM_val_form['nombres']; }
              elseif (isset($this->nombres)) { $this->nm_limpa_alfa($this->nombres); }
              if     (isset($NM_val_form) && isset($NM_val_form['direccion'])) { $this->direccion = $NM_val_form['direccion']; }
              elseif (isset($this->direccion)) { $this->nm_limpa_alfa($this->direccion); }
              if     (isset($NM_val_form) && isset($NM_val_form['tel_cel'])) { $this->tel_cel = $NM_val_form['tel_cel']; }
              elseif (isset($this->tel_cel)) { $this->nm_limpa_alfa($this->tel_cel); }
              if     (isset($NM_val_form) && isset($NM_val_form['sexo'])) { $this->sexo = $NM_val_form['sexo']; }
              elseif (isset($this->sexo)) { $this->nm_limpa_alfa($this->sexo); }
              if     (isset($NM_val_form) && isset($NM_val_form['urlmail'])) { $this->urlmail = $NM_val_form['urlmail']; }
              elseif (isset($this->urlmail)) { $this->nm_limpa_alfa($this->urlmail); }
              if     (isset($NM_val_form) && isset($NM_val_form['idmuni'])) { $this->idmuni = $NM_val_form['idmuni']; }
              elseif (isset($this->idmuni)) { $this->nm_limpa_alfa($this->idmuni); }
              if     (isset($NM_val_form) && isset($NM_val_form['observaciones'])) { $this->observaciones = $NM_val_form['observaciones']; }
              elseif (isset($this->observaciones)) { $this->nm_limpa_alfa($this->observaciones); }
              if     (isset($NM_val_form) && isset($NM_val_form['credito'])) { $this->credito = $NM_val_form['credito']; }
              elseif (isset($this->credito)) { $this->nm_limpa_alfa($this->credito); }
              if     (isset($NM_val_form) && isset($NM_val_form['cupo'])) { $this->cupo = $NM_val_form['cupo']; }
              elseif (isset($this->cupo)) { $this->nm_limpa_alfa($this->cupo); }
              if     (isset($NM_val_form) && isset($NM_val_form['loatiende'])) { $this->loatiende = $NM_val_form['loatiende']; }
              elseif (isset($this->loatiende)) { $this->nm_limpa_alfa($this->loatiende); }
              if     (isset($NM_val_form) && isset($NM_val_form['regimen'])) { $this->regimen = $NM_val_form['regimen']; }
              elseif (isset($this->regimen)) { $this->nm_limpa_alfa($this->regimen); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo'])) { $this->tipo = $NM_val_form['tipo']; }
              elseif (isset($this->tipo)) { $this->nm_limpa_alfa($this->tipo); }
              if     (isset($NM_val_form) && isset($NM_val_form['cliente'])) { $this->cliente = $NM_val_form['cliente']; }
              elseif (isset($this->cliente)) { $this->nm_limpa_alfa($this->cliente); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo_documento'])) { $this->tipo_documento = $NM_val_form['tipo_documento']; }
              elseif (isset($this->tipo_documento)) { $this->nm_limpa_alfa($this->tipo_documento); }
              if     (isset($NM_val_form) && isset($NM_val_form['dv'])) { $this->dv = $NM_val_form['dv']; }
              elseif (isset($this->dv)) { $this->nm_limpa_alfa($this->dv); }
              if     (isset($NM_val_form) && isset($NM_val_form['nombre1'])) { $this->nombre1 = $NM_val_form['nombre1']; }
              elseif (isset($this->nombre1)) { $this->nm_limpa_alfa($this->nombre1); }
              if     (isset($NM_val_form) && isset($NM_val_form['nombre2'])) { $this->nombre2 = $NM_val_form['nombre2']; }
              elseif (isset($this->nombre2)) { $this->nm_limpa_alfa($this->nombre2); }
              if     (isset($NM_val_form) && isset($NM_val_form['apellido1'])) { $this->apellido1 = $NM_val_form['apellido1']; }
              elseif (isset($this->apellido1)) { $this->nm_limpa_alfa($this->apellido1); }
              if     (isset($NM_val_form) && isset($NM_val_form['apellido2'])) { $this->apellido2 = $NM_val_form['apellido2']; }
              elseif (isset($this->apellido2)) { $this->nm_limpa_alfa($this->apellido2); }
              if     (isset($NM_val_form) && isset($NM_val_form['representante'])) { $this->representante = $NM_val_form['representante']; }
              elseif (isset($this->representante)) { $this->nm_limpa_alfa($this->representante); }
              if     (isset($NM_val_form) && isset($NM_val_form['es_restaurante'])) { $this->es_restaurante = $NM_val_form['es_restaurante']; }
              elseif (isset($this->es_restaurante)) { $this->nm_limpa_alfa($this->es_restaurante); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('tipo_documento', 'documento', 'dv', 'imagenter', 'nombre1', 'nombre2', 'apellido1', 'apellido2', 'tel_cel', 'urlmail', 'nombres', 'representante', 'sexo', 'tipo', 'regimen', 'direccion', 'departamento', 'idmuni', 'observaciones', 'cliente', 'es_restaurante', 'credito', 'cupo', 'loatiende'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          $bInsertOk = true;
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 0) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_pkey']); 
              $this->nmgp_opcao = "nada"; 
              $GLOBALS["erro_incl"] = 1; 
              $bInsertOk = false;
              $this->sc_evento = 'insert';
          } 
          $rs1->Close(); 
          $aInsertOk = array(); 
              $Cmd_Unique = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where documento = '" . $this->documento . "'";
              $Cmd_Unique = str_replace("'null'", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace("#null#", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $Cmd_Unique) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $Cmd_Unique;
              $rsUni = $this->Db->Execute($Cmd_Unique);
              if (false === $rsUni)
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
                          terceros_cliente_mob_pack_ajax_response();
                          exit;
                      }
                  }
              }
              elseif (0 < $rsUni->fields[0])
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_inst_uniq'] . " Documento de Identidad/Nit"); 
                  $this->nmgp_opcao = "nada"; 
                  $GLOBALS["erro_incl"] = 1; 
                  $aInsertOk[] = 'documento';
                  $rsUni->Close();
              }
              else
              {
                  $rsUni->Close();
              }
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      terceros_cliente_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              $_test_file = $this->fetchUniqueUploadName($this->imagenter_scfile_name, $dir_file, "imagenter");
              if (trim($this->imagenter_scfile_name) != $_test_file)
              {
                  $this->imagenter_scfile_name = $_test_file;
                  $this->imagenter = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante) VALUES ($this->idtercero, '$this->documento', '$this->nombres', '$this->direccion', '$this->tel_cel', #$this->nacimiento#, '$this->sexo', '$this->urlmail', #$this->fechault#, $this->saldo, #$this->afiliacion#, $this->idmuni, '$this->observaciones', '$this->credito', $this->cupo, $this->listaprecios, $this->loatiende, '$this->con_actual', '$this->efec_retencion', '$this->regimen', '$this->tipo', '$this->cliente', '$this->empleado', '$this->proveedor', '$this->contacto', '$this->telefonos_prov', '$this->email', '$this->url', '$this->creditoprov', $this->dias, #$this->fechultcomp#, $this->saldoapagar, '$this->autoretenedor', '$this->tipo_documento', $this->dv, '$this->nombre1', '$this->nombre2', '$this->apellido1', '$this->apellido2', '$this->sucur_cliente', '$this->representante', '$this->imagenter', '$this->es_restaurante')"; 
              }
              elseif ($this->Ini->nm_tpbanco == "pdo_sqlsrv")
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante) VALUES ($this->idtercero, '$this->documento', '$this->nombres', '$this->direccion', '$this->tel_cel', " . $this->Ini->date_delim . $this->nacimiento . $this->Ini->date_delim1 . ", '$this->sexo', '$this->urlmail', " . $this->Ini->date_delim . $this->fechault . $this->Ini->date_delim1 . ", $this->saldo, " . $this->Ini->date_delim . $this->afiliacion . $this->Ini->date_delim1 . ", $this->idmuni, '$this->observaciones', '$this->credito', $this->cupo, $this->listaprecios, $this->loatiende, '$this->con_actual', '$this->efec_retencion', '$this->regimen', '$this->tipo', '$this->cliente', '$this->empleado', '$this->proveedor', '$this->contacto', '$this->telefonos_prov', '$this->email', '$this->url', '$this->creditoprov', $this->dias, " . $this->Ini->date_delim . $this->fechultcomp . $this->Ini->date_delim1 . ", $this->saldoapagar, '$this->autoretenedor', '$this->tipo_documento', $this->dv, '$this->nombre1', '$this->nombre2', '$this->apellido1', '$this->apellido2', '$this->sucur_cliente', '$this->representante', '', '$this->es_restaurante')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante) VALUES ($this->idtercero, '$this->documento', '$this->nombres', '$this->direccion', '$this->tel_cel', " . $this->Ini->date_delim . $this->nacimiento . $this->Ini->date_delim1 . ", '$this->sexo', '$this->urlmail', " . $this->Ini->date_delim . $this->fechault . $this->Ini->date_delim1 . ", $this->saldo, " . $this->Ini->date_delim . $this->afiliacion . $this->Ini->date_delim1 . ", $this->idmuni, '$this->observaciones', '$this->credito', $this->cupo, $this->listaprecios, $this->loatiende, '$this->con_actual', '$this->efec_retencion', '$this->regimen', '$this->tipo', '$this->cliente', '$this->empleado', '$this->proveedor', '$this->contacto', '$this->telefonos_prov', '$this->email', '$this->url', '$this->creditoprov', $this->dias, " . $this->Ini->date_delim . $this->fechultcomp . $this->Ini->date_delim1 . ", $this->saldoapagar, '$this->autoretenedor', '$this->tipo_documento', $this->dv, '$this->nombre1', '$this->nombre2', '$this->apellido1', '$this->apellido2', '$this->sucur_cliente', '$this->representante', '$this->imagenter', '$this->es_restaurante')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante) VALUES ($this->idtercero, '$this->documento', '$this->nombres', '$this->direccion', '$this->tel_cel', " . $this->Ini->date_delim . $this->nacimiento . $this->Ini->date_delim1 . ", '$this->sexo', '$this->urlmail', " . $this->Ini->date_delim . $this->fechault . $this->Ini->date_delim1 . ", $this->saldo, " . $this->Ini->date_delim . $this->afiliacion . $this->Ini->date_delim1 . ", $this->idmuni, '$this->observaciones', '$this->credito', $this->cupo, $this->listaprecios, $this->loatiende, '$this->con_actual', '$this->efec_retencion', '$this->regimen', '$this->tipo', '$this->cliente', '$this->empleado', '$this->proveedor', '$this->contacto', '$this->telefonos_prov', '$this->email', '$this->url', '$this->creditoprov', $this->dias, " . $this->Ini->date_delim . $this->fechultcomp . $this->Ini->date_delim1 . ", $this->saldoapagar, '$this->autoretenedor', '$this->tipo_documento', $this->dv, '$this->nombre1', '$this->nombre2', '$this->apellido1', '$this->apellido2', '$this->sucur_cliente', '$this->representante', '$this->imagenter', '$this->es_restaurante')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante) VALUES (" . $NM_seq_auto . "$this->idtercero, '$this->documento', '$this->nombres', '$this->direccion', '$this->tel_cel', " . $this->Ini->date_delim . $this->nacimiento . $this->Ini->date_delim1 . ", '$this->sexo', '$this->urlmail', " . $this->Ini->date_delim . $this->fechault . $this->Ini->date_delim1 . ", $this->saldo, " . $this->Ini->date_delim . $this->afiliacion . $this->Ini->date_delim1 . ", $this->idmuni, '$this->observaciones', '$this->credito', $this->cupo, $this->listaprecios, $this->loatiende, TO_DATE('$this->con_actual', 'yyyy-mm-dd hh24:mi:ss'), '$this->efec_retencion', '$this->regimen', '$this->tipo', '$this->cliente', '$this->empleado', '$this->proveedor', '$this->contacto', '$this->telefonos_prov', '$this->email', '$this->url', '$this->creditoprov', $this->dias, " . $this->Ini->date_delim . $this->fechultcomp . $this->Ini->date_delim1 . ", $this->saldoapagar, '$this->autoretenedor', '$this->tipo_documento', $this->dv, '$this->nombre1', '$this->nombre2', '$this->apellido1', '$this->apellido2', '$this->sucur_cliente', '$this->representante', EMPTY_BLOB(), '$this->es_restaurante')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante) VALUES (" . $NM_seq_auto . "$this->idtercero, '$this->documento', '$this->nombres', '$this->direccion', '$this->tel_cel', EXTEND('$this->nacimiento', YEAR TO DAY), '$this->sexo', '$this->urlmail', EXTEND('$this->fechault', YEAR TO DAY), $this->saldo, EXTEND('$this->afiliacion', YEAR TO DAY), $this->idmuni, '$this->observaciones', '$this->credito', $this->cupo, $this->listaprecios, $this->loatiende, '$this->con_actual', '$this->efec_retencion', '$this->regimen', '$this->tipo', '$this->cliente', '$this->empleado', '$this->proveedor', '$this->contacto', '$this->telefonos_prov', '$this->email', '$this->url', '$this->creditoprov', $this->dias, EXTEND('$this->fechultcomp', YEAR TO DAY), $this->saldoapagar, '$this->autoretenedor', '$this->tipo_documento', $this->dv, '$this->nombre1', '$this->nombre2', '$this->apellido1', '$this->apellido2', '$this->sucur_cliente', '$this->representante', null, '$this->es_restaurante')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante) VALUES (" . $NM_seq_auto . "$this->idtercero, '$this->documento', '$this->nombres', '$this->direccion', '$this->tel_cel', " . $this->Ini->date_delim . $this->nacimiento . $this->Ini->date_delim1 . ", '$this->sexo', '$this->urlmail', " . $this->Ini->date_delim . $this->fechault . $this->Ini->date_delim1 . ", $this->saldo, " . $this->Ini->date_delim . $this->afiliacion . $this->Ini->date_delim1 . ", $this->idmuni, '$this->observaciones', '$this->credito', $this->cupo, $this->listaprecios, $this->loatiende, '$this->con_actual', '$this->efec_retencion', '$this->regimen', '$this->tipo', '$this->cliente', '$this->empleado', '$this->proveedor', '$this->contacto', '$this->telefonos_prov', '$this->email', '$this->url', '$this->creditoprov', $this->dias, " . $this->Ini->date_delim . $this->fechultcomp . $this->Ini->date_delim1 . ", $this->saldoapagar, '$this->autoretenedor', '$this->tipo_documento', $this->dv, '$this->nombre1', '$this->nombre2', '$this->apellido1', '$this->apellido2', '$this->sucur_cliente', '$this->representante', '', '$this->es_restaurante')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante) VALUES (" . $NM_seq_auto . "$this->idtercero, '$this->documento', '$this->nombres', '$this->direccion', '$this->tel_cel', " . $this->Ini->date_delim . $this->nacimiento . $this->Ini->date_delim1 . ", '$this->sexo', '$this->urlmail', " . $this->Ini->date_delim . $this->fechault . $this->Ini->date_delim1 . ", $this->saldo, " . $this->Ini->date_delim . $this->afiliacion . $this->Ini->date_delim1 . ", $this->idmuni, '$this->observaciones', '$this->credito', $this->cupo, $this->listaprecios, $this->loatiende, '$this->con_actual', '$this->efec_retencion', '$this->regimen', '$this->tipo', '$this->cliente', '$this->empleado', '$this->proveedor', '$this->contacto', '$this->telefonos_prov', '$this->email', '$this->url', '$this->creditoprov', $this->dias, " . $this->Ini->date_delim . $this->fechultcomp . $this->Ini->date_delim1 . ", $this->saldoapagar, '$this->autoretenedor', '$this->tipo_documento', $this->dv, '$this->nombre1', '$this->nombre2', '$this->apellido1', '$this->apellido2', '$this->sucur_cliente', '$this->representante', '', '$this->es_restaurante')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante) VALUES (" . $NM_seq_auto . "$this->idtercero, '$this->documento', '$this->nombres', '$this->direccion', '$this->tel_cel', " . $this->Ini->date_delim . $this->nacimiento . $this->Ini->date_delim1 . ", '$this->sexo', '$this->urlmail', " . $this->Ini->date_delim . $this->fechault . $this->Ini->date_delim1 . ", $this->saldo, " . $this->Ini->date_delim . $this->afiliacion . $this->Ini->date_delim1 . ", $this->idmuni, '$this->observaciones', '$this->credito', $this->cupo, $this->listaprecios, $this->loatiende, '$this->con_actual', '$this->efec_retencion', '$this->regimen', '$this->tipo', '$this->cliente', '$this->empleado', '$this->proveedor', '$this->contacto', '$this->telefonos_prov', '$this->email', '$this->url', '$this->creditoprov', $this->dias, " . $this->Ini->date_delim . $this->fechultcomp . $this->Ini->date_delim1 . ", $this->saldoapagar, '$this->autoretenedor', '$this->tipo_documento', $this->dv, '$this->nombre1', '$this->nombre2', '$this->apellido1', '$this->apellido2', '$this->sucur_cliente', '$this->representante', '', '$this->es_restaurante')"; 
              }
              elseif ($this->Ini->nm_tpbanco =='pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante) VALUES (" . $NM_seq_auto . "$this->idtercero, '$this->documento', '$this->nombres', '$this->direccion', '$this->tel_cel', " . $this->Ini->date_delim . $this->nacimiento . $this->Ini->date_delim1 . ", '$this->sexo', '$this->urlmail', " . $this->Ini->date_delim . $this->fechault . $this->Ini->date_delim1 . ", $this->saldo, " . $this->Ini->date_delim . $this->afiliacion . $this->Ini->date_delim1 . ", $this->idmuni, '$this->observaciones', '$this->credito', $this->cupo, $this->listaprecios, $this->loatiende, TO_DATE('$this->con_actual', 'yyyy-mm-dd hh24:mi:ss'), '$this->efec_retencion', '$this->regimen', '$this->tipo', '$this->cliente', '$this->empleado', '$this->proveedor', '$this->contacto', '$this->telefonos_prov', '$this->email', '$this->url', '$this->creditoprov', $this->dias, " . $this->Ini->date_delim . $this->fechultcomp . $this->Ini->date_delim1 . ", $this->saldoapagar, '$this->autoretenedor', '$this->tipo_documento', $this->dv, '$this->nombre1', '$this->nombre2', '$this->apellido1', '$this->apellido2', '$this->sucur_cliente', '$this->representante', EMPTY_BLOB(), '$this->es_restaurante')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante) VALUES (" . $NM_seq_auto . "$this->idtercero, '$this->documento', '$this->nombres', '$this->direccion', '$this->tel_cel', " . $this->Ini->date_delim . $this->nacimiento . $this->Ini->date_delim1 . ", '$this->sexo', '$this->urlmail', " . $this->Ini->date_delim . $this->fechault . $this->Ini->date_delim1 . ", $this->saldo, " . $this->Ini->date_delim . $this->afiliacion . $this->Ini->date_delim1 . ", $this->idmuni, '$this->observaciones', '$this->credito', $this->cupo, $this->listaprecios, $this->loatiende, '$this->con_actual', '$this->efec_retencion', '$this->regimen', '$this->tipo', '$this->cliente', '$this->empleado', '$this->proveedor', '$this->contacto', '$this->telefonos_prov', '$this->email', '$this->url', '$this->creditoprov', $this->dias, " . $this->Ini->date_delim . $this->fechultcomp . $this->Ini->date_delim1 . ", $this->saldoapagar, '$this->autoretenedor', '$this->tipo_documento', $this->dv, '$this->nombre1', '$this->nombre2', '$this->apellido1', '$this->apellido2', '$this->sucur_cliente', '$this->representante', '$this->imagenter', '$this->es_restaurante')"; 
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
                              terceros_cliente_mob_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              $this->documento = $this->documento_before_qstr;
              $this->nombres = $this->nombres_before_qstr;
              $this->direccion = $this->direccion_before_qstr;
              $this->tel_cel = $this->tel_cel_before_qstr;
              $this->sexo = $this->sexo_before_qstr;
              $this->urlmail = $this->urlmail_before_qstr;
              $this->observaciones = $this->observaciones_before_qstr;
              $this->credito = $this->credito_before_qstr;
              $this->efec_retencion = $this->efec_retencion_before_qstr;
              $this->regimen = $this->regimen_before_qstr;
              $this->tipo = $this->tipo_before_qstr;
              $this->cliente = $this->cliente_before_qstr;
              $this->empleado = $this->empleado_before_qstr;
              $this->proveedor = $this->proveedor_before_qstr;
              $this->contacto = $this->contacto_before_qstr;
              $this->telefonos_prov = $this->telefonos_prov_before_qstr;
              $this->email = $this->email_before_qstr;
              $this->url = $this->url_before_qstr;
              $this->creditoprov = $this->creditoprov_before_qstr;
              $this->autoretenedor = $this->autoretenedor_before_qstr;
              $this->tipo_documento = $this->tipo_documento_before_qstr;
              $this->nombre1 = $this->nombre1_before_qstr;
              $this->nombre2 = $this->nombre2_before_qstr;
              $this->apellido1 = $this->apellido1_before_qstr;
              $this->apellido2 = $this->apellido2_before_qstr;
              $this->sucur_cliente = $this->sucur_cliente_before_qstr;
              $this->representante = $this->representante_before_qstr;
              $this->es_restaurante = $this->es_restaurante_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if (trim($this->imagenter ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  imagenter , $this->imagenter,  \"idtercero = $this->idtercero\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "imagenter", $this->imagenter,  "idtercero = $this->idtercero"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              terceros_cliente_mob_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
              }  
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->documento = $this->documento_before_qstr;
              $this->nombres = $this->nombres_before_qstr;
              $this->direccion = $this->direccion_before_qstr;
              $this->tel_cel = $this->tel_cel_before_qstr;
              $this->sexo = $this->sexo_before_qstr;
              $this->urlmail = $this->urlmail_before_qstr;
              $this->observaciones = $this->observaciones_before_qstr;
              $this->credito = $this->credito_before_qstr;
              $this->efec_retencion = $this->efec_retencion_before_qstr;
              $this->regimen = $this->regimen_before_qstr;
              $this->tipo = $this->tipo_before_qstr;
              $this->cliente = $this->cliente_before_qstr;
              $this->empleado = $this->empleado_before_qstr;
              $this->proveedor = $this->proveedor_before_qstr;
              $this->contacto = $this->contacto_before_qstr;
              $this->telefonos_prov = $this->telefonos_prov_before_qstr;
              $this->email = $this->email_before_qstr;
              $this->url = $this->url_before_qstr;
              $this->creditoprov = $this->creditoprov_before_qstr;
              $this->autoretenedor = $this->autoretenedor_before_qstr;
              $this->tipo_documento = $this->tipo_documento_before_qstr;
              $this->nombre1 = $this->nombre1_before_qstr;
              $this->nombre2 = $this->nombre2_before_qstr;
              $this->apellido1 = $this->apellido1_before_qstr;
              $this->apellido2 = $this->apellido2_before_qstr;
              $this->sucur_cliente = $this->sucur_cliente_before_qstr;
              $this->representante = $this->representante_before_qstr;
              $this->es_restaurante = $this->es_restaurante_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->idtercero = substr($this->Db->qstr($this->idtercero), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero "); 
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
                          terceros_cliente_mob_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['total']);
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['decimal_db'] == ",")
        {
            $this->nm_troca_decimal(",", ".");
        }
        $_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cliente = $this->cliente;
    $original_direccion = $this->direccion;
    $original_idmuni = $this->idmuni;
    $original_tel_cel = $this->tel_cel;
}
   
      $nm_select = "SELECT LAST_INSERT_ID()"; 
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
$idt=$this->ds[0][0];
$muni=$this->idmuni ;
 
      $nm_select = "select iddepar from municipio where idmun=$muni"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->des = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->des = false;
          $this->des_erro = $this->Db->ErrorMsg();
      } 
;
$dep=substr($this->des , 7);
if($this->cliente =="SI")
	{

     $nm_select ="insert direccion SET idter=$idt, iddepar=$dep, idmuni=$muni, direc='$this->direccion', obs='PRINCIPAL', telefono='$this->tel_cel'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                terceros_cliente_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ; 
	}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cliente != $this->cliente || (isset($bFlagRead_cliente) && $bFlagRead_cliente)))
    {
        $this->ajax_return_values_cliente(true);
    }
    if (($original_direccion != $this->direccion || (isset($bFlagRead_direccion) && $bFlagRead_direccion)))
    {
        $this->ajax_return_values_direccion(true);
    }
    if (($original_idmuni != $this->idmuni || (isset($bFlagRead_idmuni) && $bFlagRead_idmuni)))
    {
        $this->ajax_return_values_idmuni(true);
    }
    if (($original_tel_cel != $this->tel_cel || (isset($bFlagRead_tel_cel) && $bFlagRead_tel_cel)))
    {
        $this->ajax_return_values_tel_cel(true);
    }
}
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cliente = $this->cliente;
    $original_direccion = $this->direccion;
    $original_idmuni = $this->idmuni;
    $original_tel_cel = $this->tel_cel;
}
  $muni=$this->idmuni ;
 
      $nm_select = "select iddepar from municipio where idmun=$muni"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->des = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->des = false;
          $this->des_erro = $this->Db->ErrorMsg();
      } 
;
$dep=substr($this->des , 7);
if($this->cliente =="SI")
	{

     $nm_select ="UPDATE direccion SET iddepar=$dep, idmuni=$muni, direc='$this->direccion', telefono='$this->tel_cel' where idter=$this->idtercero  and obs='PRINCIPAL'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                terceros_cliente_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ; 
	}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cliente != $this->cliente || (isset($bFlagRead_cliente) && $bFlagRead_cliente)))
    {
        $this->ajax_return_values_cliente(true);
    }
    if (($original_direccion != $this->direccion || (isset($bFlagRead_direccion) && $bFlagRead_direccion)))
    {
        $this->ajax_return_values_direccion(true);
    }
    if (($original_idmuni != $this->idmuni || (isset($bFlagRead_idmuni) && $bFlagRead_idmuni)))
    {
        $this->ajax_return_values_idmuni(true);
    }
    if (($original_tel_cel != $this->tel_cel || (isset($bFlagRead_tel_cel) && $bFlagRead_tel_cel)))
    {
        $this->ajax_return_values_tel_cel(true);
    }
}
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off'; 
    }
    if ("delete" == $this->sc_evento && $this->nmgp_opcao != "nada") {
      $_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'on';
  
     $nm_select ="delete from direccion where idter=$this->idtercero "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                terceros_cliente_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off'; 
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['decimal_db'] == ",")
   {
       $this->nm_troca_decimal(".", ",");
   }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['parms'] = "idtercero?#?$this->idtercero?@?"; 
      }
      $this->nmgp_dados_form['imagenter'] = ""; 
      $this->imagenter_limpa = ""; 
      $this->imagenter_salva = ""; 
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idtercero = null === $this->idtercero ? null : substr($this->Db->qstr($this->idtercero), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->idtercero)) 
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
      if ($this->nmgp_opcao != "nada" && (trim($this->idtercero) == "")) 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['run_iframe'] == "F" && $this->sc_evento == "insert")
      {
          $this->nmgp_opcao = "final";
      }
      $sc_where = trim("cliente='SI'");
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_terceros_cliente_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['total'] = $qt_geral_reg_terceros_cliente_mob;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->idtercero))
          {
              $Reg_OK      = false;
              $Count_start = -1;
              $sc_order_by = "";
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Sel_Chave = "idtercero"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Sel_Chave = "idtercero"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Sel_Chave = "idtercero"; 
              }
              else  
              {
                  $Sel_Chave = "idtercero"; 
              }
              $nmgp_select = "SELECT " . $Sel_Chave . " from " . $this->Ini->nm_tabela . $sc_where; 
              $sc_order_by = "idtercero desc";
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
                  if ($rt->fields[0] == $this->idtercero)
                  { 
                      $Reg_OK = true;
                  }  
                  $Count_start++;
                  $rt->MoveNext();
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start'] = $Count_start;
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_terceros_cliente_mob = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start'] > $qt_geral_reg_terceros_cliente_mob)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start'] = $qt_geral_reg_terceros_cliente_mob; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start'] = $qt_geral_reg_terceros_cliente_mob; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_terceros_cliente_mob) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT idtercero, documento, nombres, direccion, tel_cel, str_replace (convert(char(10),nacimiento,102), '.', '-') + ' ' + convert(char(8),nacimiento,20), sexo, urlmail, str_replace (convert(char(10),fechault,102), '.', '-') + ' ' + convert(char(8),fechault,20), saldo, str_replace (convert(char(10),afiliacion,102), '.', '-') + ' ' + convert(char(8),afiliacion,20), idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, str_replace (convert(char(10),fechultcomp,102), '.', '-') + ' ' + convert(char(8),fechultcomp,20), saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT idtercero, documento, nombres, direccion, tel_cel, convert(char(23),nacimiento,121), sexo, urlmail, convert(char(23),fechault,121), saldo, convert(char(23),afiliacion,121), idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, convert(char(23),fechultcomp,121), saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, TO_DATE(TO_CHAR(con_actual, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT idtercero, documento, nombres, direccion, tel_cel, EXTEND(nacimiento, YEAR TO DAY), sexo, urlmail, EXTEND(fechault, YEAR TO DAY), saldo, EXTEND(afiliacion, YEAR TO DAY), idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, EXTEND(fechultcomp, YEAR TO DAY), saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, LOTOFILE(imagenter, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_imagenter', 'client'), es_restaurante from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = "cliente='SI'";
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (!empty($sc_where))
              {
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  {
                     $aWhere[] = "idtercero = $this->idtercero"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                  {
                     $aWhere[] = "idtercero = $this->idtercero"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  {
                     $aWhere[] = "idtercero = $this->idtercero"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  {
                     $aWhere[] = "idtercero = $this->idtercero"; 
                  }  
                  else  
                  {
                     $aWhere[] = "idtercero = $this->idtercero"; 
                  }
              } 
              else
              {
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  {
                      $aWhere[] = "idtercero = $this->idtercero"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                  {
                      $aWhere[] = "idtercero = $this->idtercero"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  {
                      $aWhere[] = "idtercero = $this->idtercero"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  {
                      $aWhere[] = "idtercero = $this->idtercero"; 
                  }  
                  else  
                  {
                      $aWhere[] = "idtercero = $this->idtercero"; 
                  }
              } 
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "idtercero desc";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['empty_filter'] = true;
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
              $this->idtercero = $rs->fields[0] ; 
              $this->nmgp_dados_select['idtercero'] = $this->idtercero;
              $this->documento = $rs->fields[1] ; 
              $this->nmgp_dados_select['documento'] = $this->documento;
              $this->nombres = $rs->fields[2] ; 
              $this->nmgp_dados_select['nombres'] = $this->nombres;
              $this->direccion = $rs->fields[3] ; 
              $this->nmgp_dados_select['direccion'] = $this->direccion;
              $this->tel_cel = $rs->fields[4] ; 
              $this->nmgp_dados_select['tel_cel'] = $this->tel_cel;
              $this->nacimiento = $rs->fields[5] ; 
              $this->nmgp_dados_select['nacimiento'] = $this->nacimiento;
              $this->sexo = $rs->fields[6] ; 
              $this->nmgp_dados_select['sexo'] = $this->sexo;
              $this->urlmail = $rs->fields[7] ; 
              $this->nmgp_dados_select['urlmail'] = $this->urlmail;
              $this->fechault = $rs->fields[8] ; 
              $this->nmgp_dados_select['fechault'] = $this->fechault;
              $this->saldo = $rs->fields[9] ; 
              $this->nmgp_dados_select['saldo'] = $this->saldo;
              $this->afiliacion = $rs->fields[10] ; 
              $this->nmgp_dados_select['afiliacion'] = $this->afiliacion;
              $this->idmuni = $rs->fields[11] ; 
              $this->nmgp_dados_select['idmuni'] = $this->idmuni;
              $this->observaciones = $rs->fields[12] ; 
              $this->nmgp_dados_select['observaciones'] = $this->observaciones;
              $this->credito = $rs->fields[13] ; 
              $this->nmgp_dados_select['credito'] = $this->credito;
              $this->cupo = $rs->fields[14] ; 
              $this->nmgp_dados_select['cupo'] = $this->cupo;
              $this->listaprecios = $rs->fields[15] ; 
              $this->nmgp_dados_select['listaprecios'] = $this->listaprecios;
              $this->loatiende = $rs->fields[16] ; 
              $this->nmgp_dados_select['loatiende'] = $this->loatiende;
              $this->con_actual = $rs->fields[17] ; 
              if (substr($this->con_actual, 10, 1) == "-") 
              { 
                 $this->con_actual = substr($this->con_actual, 0, 10) . " " . substr($this->con_actual, 11);
              } 
              if (substr($this->con_actual, 13, 1) == ".") 
              { 
                 $this->con_actual = substr($this->con_actual, 0, 13) . ":" . substr($this->con_actual, 14, 2) . ":" . substr($this->con_actual, 17);
              } 
              $this->nmgp_dados_select['con_actual'] = $this->con_actual;
              $this->efec_retencion = $rs->fields[18] ; 
              $this->nmgp_dados_select['efec_retencion'] = $this->efec_retencion;
              $this->regimen = $rs->fields[19] ; 
              $this->nmgp_dados_select['regimen'] = $this->regimen;
              $this->tipo = $rs->fields[20] ; 
              $this->nmgp_dados_select['tipo'] = $this->tipo;
              $this->cliente = $rs->fields[21] ; 
              $this->nmgp_dados_select['cliente'] = $this->cliente;
              $this->empleado = $rs->fields[22] ; 
              $this->nmgp_dados_select['empleado'] = $this->empleado;
              $this->proveedor = $rs->fields[23] ; 
              $this->nmgp_dados_select['proveedor'] = $this->proveedor;
              $this->contacto = $rs->fields[24] ; 
              $this->nmgp_dados_select['contacto'] = $this->contacto;
              $this->telefonos_prov = $rs->fields[25] ; 
              $this->nmgp_dados_select['telefonos_prov'] = $this->telefonos_prov;
              $this->email = $rs->fields[26] ; 
              $this->nmgp_dados_select['email'] = $this->email;
              $this->url = $rs->fields[27] ; 
              $this->nmgp_dados_select['url'] = $this->url;
              $this->creditoprov = $rs->fields[28] ; 
              $this->nmgp_dados_select['creditoprov'] = $this->creditoprov;
              $this->dias = $rs->fields[29] ; 
              $this->nmgp_dados_select['dias'] = $this->dias;
              $this->fechultcomp = $rs->fields[30] ; 
              $this->nmgp_dados_select['fechultcomp'] = $this->fechultcomp;
              $this->saldoapagar = $rs->fields[31] ; 
              $this->nmgp_dados_select['saldoapagar'] = $this->saldoapagar;
              $this->autoretenedor = $rs->fields[32] ; 
              $this->nmgp_dados_select['autoretenedor'] = $this->autoretenedor;
              $this->tipo_documento = $rs->fields[33] ; 
              $this->nmgp_dados_select['tipo_documento'] = $this->tipo_documento;
              $this->dv = $rs->fields[34] ; 
              $this->nmgp_dados_select['dv'] = $this->dv;
              $this->nombre1 = $rs->fields[35] ; 
              $this->nmgp_dados_select['nombre1'] = $this->nombre1;
              $this->nombre2 = $rs->fields[36] ; 
              $this->nmgp_dados_select['nombre2'] = $this->nombre2;
              $this->apellido1 = $rs->fields[37] ; 
              $this->nmgp_dados_select['apellido1'] = $this->apellido1;
              $this->apellido2 = $rs->fields[38] ; 
              $this->nmgp_dados_select['apellido2'] = $this->apellido2;
              $this->sucur_cliente = $rs->fields[39] ; 
              $this->nmgp_dados_select['sucur_cliente'] = $this->sucur_cliente;
              $this->representante = $rs->fields[40] ; 
              $this->nmgp_dados_select['representante'] = $this->representante;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->imagenter = $this->Db->BlobDecode($rs->fields[41]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_oracle')
              { 
                  $this->imagenter = $this->Db->BlobDecode($rs->fields[41]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[41]) && !empty($rs->fields[41]) && is_file($rs->fields[41])) 
                  { 
                     $this->imagenter = file_get_contents($rs->fields[41]);
                  }else 
                  { 
                     $this->imagenter = ''; 
                  } 
              } 
              else
              { 
                  $this->imagenter = $rs->fields[41] ; 
              } 
              $this->nmgp_dados_select['imagenter'] = $this->imagenter;
              $this->es_restaurante = $rs->fields[42] ; 
              $this->nmgp_dados_select['es_restaurante'] = $this->es_restaurante;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->idtercero = (string)$this->idtercero; 
              $this->saldo = (string)$this->saldo; 
              $this->idmuni = (string)$this->idmuni; 
              $this->cupo = (string)$this->cupo; 
              $this->listaprecios = (string)$this->listaprecios; 
              $this->loatiende = (string)$this->loatiende; 
              $this->dias = (string)$this->dias; 
              $this->saldoapagar = (string)$this->saldoapagar; 
              $this->dv = (string)$this->dv; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['parms'] = "idtercero?#?$this->idtercero?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['sub_dir'][0]  = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start'] < $qt_geral_reg_terceros_cliente_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['opcao']   = '';
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
              $this->nm_mens_form_ins = "Cliente creado Satisfactoriamente";
              $this->idtercero = "";  
              $this->nmgp_dados_form["idtercero"] = $this->idtercero;
              $this->documento = "";  
              $this->nmgp_dados_form["documento"] = $this->documento;
              $this->nombres = "";  
              $this->nmgp_dados_form["nombres"] = $this->nombres;
              $this->direccion = "";  
              $this->nmgp_dados_form["direccion"] = $this->direccion;
              $this->tel_cel = "";  
              $this->nmgp_dados_form["tel_cel"] = $this->tel_cel;
              $this->nacimiento = "";  
              $this->nacimiento_hora = "" ;  
              $this->nmgp_dados_form["nacimiento"] = $this->nacimiento;
              $this->sexo = "";  
              $this->nmgp_dados_form["sexo"] = $this->sexo;
              $this->urlmail = "";  
              $this->nmgp_dados_form["urlmail"] = $this->urlmail;
              $this->fechault = "";  
              $this->fechault_hora = "" ;  
              $this->nmgp_dados_form["fechault"] = $this->fechault;
              $this->saldo = "";  
              $this->nmgp_dados_form["saldo"] = $this->saldo;
              $this->afiliacion =  date('Y') . "-" . date('m')  . "-" . date('d');
              $this->nmgp_dados_form["afiliacion"] = $this->afiliacion;
              $this->idmuni = "828";  
              $this->nmgp_dados_form["idmuni"] = $this->idmuni;
              $this->observaciones = "";  
              $this->nmgp_dados_form["observaciones"] = $this->observaciones;
              $this->credito = "";  
              $this->nmgp_dados_form["credito"] = $this->credito;
              $this->cupo = "";  
              $this->nmgp_dados_form["cupo"] = $this->cupo;
              $this->listaprecios = "1";  
              $this->nmgp_dados_form["listaprecios"] = $this->listaprecios;
              $this->loatiende = "";  
              $this->nmgp_dados_form["loatiende"] = $this->loatiende;
              $this->con_actual = "";  
              $this->con_actual_hora = "" ;  
              $this->nmgp_dados_form["con_actual"] = $this->con_actual;
              $this->efec_retencion = "";  
              $this->nmgp_dados_form["efec_retencion"] = $this->efec_retencion;
              $this->regimen = "";  
              $this->nmgp_dados_form["regimen"] = $this->regimen;
              $this->tipo = "";  
              $this->nmgp_dados_form["tipo"] = $this->tipo;
              $this->cliente = "";  
              $this->nmgp_dados_form["cliente"] = $this->cliente;
              $this->empleado = "";  
              $this->nmgp_dados_form["empleado"] = $this->empleado;
              $this->proveedor = "";  
              $this->nmgp_dados_form["proveedor"] = $this->proveedor;
              $this->contacto = "";  
              $this->nmgp_dados_form["contacto"] = $this->contacto;
              $this->telefonos_prov = "";  
              $this->nmgp_dados_form["telefonos_prov"] = $this->telefonos_prov;
              $this->email = "";  
              $this->nmgp_dados_form["email"] = $this->email;
              $this->url = "";  
              $this->nmgp_dados_form["url"] = $this->url;
              $this->creditoprov = "";  
              $this->nmgp_dados_form["creditoprov"] = $this->creditoprov;
              $this->dias = "";  
              $this->nmgp_dados_form["dias"] = $this->dias;
              $this->fechultcomp = "";  
              $this->fechultcomp_hora = "" ;  
              $this->nmgp_dados_form["fechultcomp"] = $this->fechultcomp;
              $this->saldoapagar = "";  
              $this->nmgp_dados_form["saldoapagar"] = $this->saldoapagar;
              $this->autoretenedor = "";  
              $this->nmgp_dados_form["autoretenedor"] = $this->autoretenedor;
              $this->tipo_documento = "";  
              $this->nmgp_dados_form["tipo_documento"] = $this->tipo_documento;
              $this->dv = "";  
              $this->nmgp_dados_form["dv"] = $this->dv;
              $this->nombre1 = "";  
              $this->nmgp_dados_form["nombre1"] = $this->nombre1;
              $this->nombre2 = "";  
              $this->nmgp_dados_form["nombre2"] = $this->nombre2;
              $this->apellido1 = "";  
              $this->nmgp_dados_form["apellido1"] = $this->apellido1;
              $this->apellido2 = "";  
              $this->nmgp_dados_form["apellido2"] = $this->apellido2;
              $this->sucur_cliente = "";  
              $this->nmgp_dados_form["sucur_cliente"] = $this->sucur_cliente;
              $this->representante = "";  
              $this->nmgp_dados_form["representante"] = $this->representante;
              $this->imagenter = "";  
              $this->imagenter_ul_name = "" ;  
              $this->imagenter_ul_type = "" ;  
              $this->nmgp_dados_form["imagenter"] = $this->imagenter;
              $this->es_restaurante = "";  
              $this->nmgp_dados_form["es_restaurante"] = $this->es_restaurante;
              $this->cupodis = "0";  
              $this->nmgp_dados_form["cupodis"] = $this->cupodis;
              $this->departamento = "";  
              $this->nmgp_dados_form["departamento"] = $this->departamento;
              $this->relleno2 = "";  
              $this->nmgp_dados_form["relleno2"] = $this->relleno2;
              $this->sucursales = "";  
              $this->nmgp_dados_form["sucursales"] = $this->sucursales;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['foreign_key'] as $sFKName => $sFKValue)
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
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = 1;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['reg_start'] + 1;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function apellido1_onChange()
{
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_pa)) {$this->sc_temp_pa = (isset($_SESSION['pa'])) ? $_SESSION['pa'] : "";}
  
$original_nombre1 = $this->nombre1;
$original_apellido1 = $this->apellido1;

if($this->nombre1 <>"")
	{
	
	if($this->apellido1 <>"")
		{
		$this->sc_temp_pa=$this->apellido1 ;
		}
	}


if (isset($this->sc_temp_pa)) { $_SESSION['pa'] = $this->sc_temp_pa;}
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off';
$modificado_nombre1 = $this->nombre1;
$modificado_apellido1 = $this->apellido1;
$this->nm_formatar_campos('nombre1', 'apellido1');
if ($original_nombre1 !== $modificado_nombre1 || isset($this->nmgp_cmp_readonly['nombre1']) || (isset($bFlagRead_nombre1) && $bFlagRead_nombre1))
{
    $this->ajax_return_values_nombre1(true);
}
if ($original_apellido1 !== $modificado_apellido1 || isset($this->nmgp_cmp_readonly['apellido1']) || (isset($bFlagRead_apellido1) && $bFlagRead_apellido1))
{
    $this->ajax_return_values_apellido1(true);
}
$this->NM_ajax_info['event_field'] = 'apellido1';
terceros_cliente_mob_pack_ajax_response();
exit;
}
function apellido2_onChange()
{
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_sa)) {$this->sc_temp_sa = (isset($_SESSION['sa'])) ? $_SESSION['sa'] : "";}
  
$original_nombre1 = $this->nombre1;
$original_apellido2 = $this->apellido2;

if($this->nombre1 <>"")
	{

		$this->sc_temp_sa=$this->apellido2 ;
		
	}


if (isset($this->sc_temp_sa)) { $_SESSION['sa'] = $this->sc_temp_sa;}
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off';
$modificado_nombre1 = $this->nombre1;
$modificado_apellido2 = $this->apellido2;
$this->nm_formatar_campos('nombre1', 'apellido2');
if ($original_nombre1 !== $modificado_nombre1 || isset($this->nmgp_cmp_readonly['nombre1']) || (isset($bFlagRead_nombre1) && $bFlagRead_nombre1))
{
    $this->ajax_return_values_nombre1(true);
}
if ($original_apellido2 !== $modificado_apellido2 || isset($this->nmgp_cmp_readonly['apellido2']) || (isset($bFlagRead_apellido2) && $bFlagRead_apellido2))
{
    $this->ajax_return_values_apellido2(true);
}
$this->NM_ajax_info['event_field'] = 'apellido2';
terceros_cliente_mob_pack_ajax_response();
exit;
}
function cliente_onChange()
{
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_id_tercero)) {$this->sc_temp_id_tercero = (isset($_SESSION['id_tercero'])) ? $_SESSION['id_tercero'] : "";}
  
$original_cliente = $this->cliente;
$original_credito = $this->credito;
$original_cupo = $this->cupo;
$original_loatiende = $this->loatiende;

$this->sc_temp_id_tercero=$this->idtercero ;




if (isset($this->sc_temp_id_tercero)) { $_SESSION['id_tercero'] = $this->sc_temp_id_tercero;}
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off';
$modificado_cliente = $this->cliente;
$modificado_credito = $this->credito;
$modificado_cupo = $this->cupo;
$modificado_loatiende = $this->loatiende;
$this->nm_formatar_campos('cliente', 'credito', 'cupo', 'loatiende');
if ($original_cliente !== $modificado_cliente || isset($this->nmgp_cmp_readonly['cliente']) || (isset($bFlagRead_cliente) && $bFlagRead_cliente))
{
    $this->ajax_return_values_cliente(true);
}
if ($original_credito !== $modificado_credito || isset($this->nmgp_cmp_readonly['credito']) || (isset($bFlagRead_credito) && $bFlagRead_credito))
{
    $this->ajax_return_values_credito(true);
}
if ($original_cupo !== $modificado_cupo || isset($this->nmgp_cmp_readonly['cupo']) || (isset($bFlagRead_cupo) && $bFlagRead_cupo))
{
    $this->ajax_return_values_cupo(true);
}
if ($original_loatiende !== $modificado_loatiende || isset($this->nmgp_cmp_readonly['loatiende']) || (isset($bFlagRead_loatiende) && $bFlagRead_loatiende))
{
    $this->ajax_return_values_loatiende(true);
}
$this->NM_ajax_info['event_field'] = 'cliente';
terceros_cliente_mob_pack_ajax_response();
exit;
}
function credito_onChange()
{
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'on';
  
$original_credito = $this->credito;
$original_cupo = $this->cupo;

if($this->credito =='SI')
	{
	$this->sc_ajax_javascript('nm_field_disabled', array("cupo=", ""));
;
	$this->sc_set_focus('cupo');
	$this->sc_ajax_javascript('nm_field_disabled', array("cliente=disabled", ""));
;
	}
else
	{
	$this->cupo =0;
	$this->cupodis =0;
	$this->sc_ajax_javascript('nm_field_disabled', array("cupo=disabled", ""));
;
	$this->sc_ajax_javascript('nm_field_disabled', array("cliente=", ""));
;
	$this->sc_set_focus('efec_retencion');
	}

$modificado_credito = $this->credito;
$modificado_cupo = $this->cupo;
$this->nm_formatar_campos('credito', 'cupo');
if ($original_credito !== $modificado_credito || isset($this->nmgp_cmp_readonly['credito']) || (isset($bFlagRead_credito) && $bFlagRead_credito))
{
    $this->ajax_return_values_credito(true);
}
if ($original_cupo !== $modificado_cupo || isset($this->nmgp_cmp_readonly['cupo']) || (isset($bFlagRead_cupo) && $bFlagRead_cupo))
{
    $this->ajax_return_values_cupo(true);
}
$this->NM_ajax_info['event_field'] = 'credito';
terceros_cliente_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off';
}
function creditoprov_onChange()
{
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'on';
  

if($this->creditoprov =='SI')
	{
	$this->sc_ajax_javascript('nm_field_disabled', array("dias=", ""));
;
	$this->sc_set_focus('dias');
	}
else
	{
	$this->sc_ajax_javascript('nm_field_disabled', array("dias=disabled", ""));
;
	$this->sc_set_focus('url');
	}

$this->nm_formatar_campos();
$this->NM_ajax_info['event_field'] = 'creditoprov';
terceros_cliente_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off';
}
function cupo_onChange()
{
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'on';
  
$original_cupo = $this->cupo;

$this->cupodis =$this->cupo -$this->saldo ;
if($this->saldo ==$this->cupo  and $this->cupo >0)
	{
	
	}


$modificado_cupo = $this->cupo;
$this->nm_formatar_campos('cupo');
if ($original_cupo !== $modificado_cupo || isset($this->nmgp_cmp_readonly['cupo']) || (isset($bFlagRead_cupo) && $bFlagRead_cupo))
{
    $this->ajax_return_values_cupo(true);
}
$this->NM_ajax_info['event_field'] = 'cupo';
terceros_cliente_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off';
}
function documento_onChange()
{
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'on';
  
$original_documento = $this->documento;
$original_dv = $this->dv;

$long=strlen($this->documento );
$str=$this->documento ;
$arr = str_split($str);
switch ($long)
	{
	case 4:
	$valor=$arr[3]*3+$arr[2]*7+$arr[1]*13+$arr[0]*17;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		$this->dv =$dig;
		}
	else
		{
		$this->dv =11-$dig;
		}
	break;
	
	case 5:
	$valor=$arr[0]*19+$arr[1]*17+$arr[2]*13+$arr[3]*7+$arr[4]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		$this->dv =$dig;
		}
	else
		{
		$this->dv =11-$dig;
		}
	break;
	
	case 6:
	$valor=$arr[0]*23+$arr[1]*19+$arr[2]*17+$arr[3]*13+$arr[4]*7+$arr[5]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		$this->dv =$dig;
		}
	else
		{
		$this->dv =11-$dig;
		}
	break;
	
	case 7:
	$valor=$arr[0]*29+$arr[1]*23+$arr[2]*19+$arr[3]*17+$arr[4]*13+$arr[5]*7+$arr[6]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		$this->dv =$dig;
		}
	else
		{
		$this->dv =11-$dig;
		}
	break;
	
	case 8:
	$valor=$arr[0]*37+$arr[1]*29+$arr[2]*23+$arr[3]*19+$arr[4]*17+$arr[5]*13+$arr[6]*7+$arr[7]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		$this->dv =$dig;
		}
	else
		{
		$this->dv =11-$dig;
		}
	break;
	
	case 9:
	$valor=$arr[0]*41+$arr[1]*37+$arr[2]*29+$arr[3]*23+$arr[4]*19+$arr[5]*17+$arr[6]*13+$arr[7]*7+$arr[8]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		$this->dv =$dig;
		}
	else
		{
		$this->dv =11-$dig;
		}
	break;
	
	case 10:
	$valor=$arr[0]*67+$arr[1]*41+$arr[2]*37+$arr[3]*29+$arr[4]*23+$arr[5]*19+$arr[6]*17+$arr[7]*13+$arr[8]*7+$arr[9]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		$this->dv =$dig;
		}
	else
		{
		$this->dv =11-$dig;
		}
	break;
	}


$modificado_documento = $this->documento;
$modificado_dv = $this->dv;
$this->nm_formatar_campos('documento', 'dv');
if ($original_documento !== $modificado_documento || isset($this->nmgp_cmp_readonly['documento']) || (isset($bFlagRead_documento) && $bFlagRead_documento))
{
    $this->ajax_return_values_documento(true);
}
if ($original_dv !== $modificado_dv || isset($this->nmgp_cmp_readonly['dv']) || (isset($bFlagRead_dv) && $bFlagRead_dv))
{
    $this->ajax_return_values_dv(true);
}
$this->NM_ajax_info['event_field'] = 'documento';
terceros_cliente_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off';
}
function nombre1_onChange()
{
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_pn)) {$this->sc_temp_pn = (isset($_SESSION['pn'])) ? $_SESSION['pn'] : "";}
  
$original_nombre1 = $this->nombre1;

if($this->nombre1 <>"")
	{
	$this->sc_temp_pn=$this->nombre1 ;
	
	}





if (isset($this->sc_temp_pn)) { $_SESSION['pn'] = $this->sc_temp_pn;}
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off';
$modificado_nombre1 = $this->nombre1;
$this->nm_formatar_campos('nombre1');
if ($original_nombre1 !== $modificado_nombre1 || isset($this->nmgp_cmp_readonly['nombre1']) || (isset($bFlagRead_nombre1) && $bFlagRead_nombre1))
{
    $this->ajax_return_values_nombre1(true);
}
$this->NM_ajax_info['event_field'] = 'nombre1';
terceros_cliente_mob_pack_ajax_response();
exit;
}
function nombre2_onChange()
{
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_sn)) {$this->sc_temp_sn = (isset($_SESSION['sn'])) ? $_SESSION['sn'] : "";}
  
$original_nombre1 = $this->nombre1;
$original_nombre2 = $this->nombre2;

if($this->nombre1 <>"")
	{
	
		$this->sc_temp_sn=$this->nombre2 ;
	
	}
	


if (isset($this->sc_temp_sn)) { $_SESSION['sn'] = $this->sc_temp_sn;}
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off';
$modificado_nombre1 = $this->nombre1;
$modificado_nombre2 = $this->nombre2;
$this->nm_formatar_campos('nombre1', 'nombre2');
if ($original_nombre1 !== $modificado_nombre1 || isset($this->nmgp_cmp_readonly['nombre1']) || (isset($bFlagRead_nombre1) && $bFlagRead_nombre1))
{
    $this->ajax_return_values_nombre1(true);
}
if ($original_nombre2 !== $modificado_nombre2 || isset($this->nmgp_cmp_readonly['nombre2']) || (isset($bFlagRead_nombre2) && $bFlagRead_nombre2))
{
    $this->ajax_return_values_nombre2(true);
}
$this->NM_ajax_info['event_field'] = 'nombre2';
terceros_cliente_mob_pack_ajax_response();
exit;
}
function nombres_onFocus()
{
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'on';
  
$original_nombre1 = $this->nombre1;
$original_nombres = $this->nombres;
$original_nombre2 = $this->nombre2;
$original_apellido1 = $this->apellido1;
$original_apellido2 = $this->apellido2;


$this->quita_nombres();


	
	

$modificado_nombre1 = $this->nombre1;
$modificado_nombres = $this->nombres;
$modificado_nombre2 = $this->nombre2;
$modificado_apellido1 = $this->apellido1;
$modificado_apellido2 = $this->apellido2;
$this->nm_formatar_campos('nombre1', 'nombres', 'nombre2', 'apellido1', 'apellido2');
if ($original_nombre1 !== $modificado_nombre1 || isset($this->nmgp_cmp_readonly['nombre1']) || (isset($bFlagRead_nombre1) && $bFlagRead_nombre1))
{
    $this->ajax_return_values_nombre1(true);
}
if ($original_nombres !== $modificado_nombres || isset($this->nmgp_cmp_readonly['nombres']) || (isset($bFlagRead_nombres) && $bFlagRead_nombres))
{
    $this->ajax_return_values_nombres(true);
}
if ($original_nombre2 !== $modificado_nombre2 || isset($this->nmgp_cmp_readonly['nombre2']) || (isset($bFlagRead_nombre2) && $bFlagRead_nombre2))
{
    $this->ajax_return_values_nombre2(true);
}
if ($original_apellido1 !== $modificado_apellido1 || isset($this->nmgp_cmp_readonly['apellido1']) || (isset($bFlagRead_apellido1) && $bFlagRead_apellido1))
{
    $this->ajax_return_values_apellido1(true);
}
if ($original_apellido2 !== $modificado_apellido2 || isset($this->nmgp_cmp_readonly['apellido2']) || (isset($bFlagRead_apellido2) && $bFlagRead_apellido2))
{
    $this->ajax_return_values_apellido2(true);
}
$this->NM_ajax_info['event_field'] = 'nombres';
terceros_cliente_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off';
}
function proveedor_onChange()
{
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'on';
  

if($this->proveedor =='SI')
	{
	;
	;
	$this->nmgp_cmp_hidden["autoretenedor"] = "on"; $this->NM_ajax_info['fieldDisplay']['autoretenedor'] = 'on';
	$this->nmgp_cmp_hidden["creditoprov"] = "on"; $this->NM_ajax_info['fieldDisplay']['creditoprov'] = 'on';
	$this->nmgp_cmp_hidden["dias"] = "on"; $this->NM_ajax_info['fieldDisplay']['dias'] = 'on';
	$this->sc_ajax_javascript('nm_field_disabled', array("dias=disabled", ""));
;
	$this->sc_set_focus('autoretenedor');
	}
else
	{
	;
	;
	$this->nmgp_cmp_hidden["autoretenedor"] = "off"; $this->NM_ajax_info['fieldDisplay']['autoretenedor'] = 'off';
	$this->nmgp_cmp_hidden["creditoprov"] = "off"; $this->NM_ajax_info['fieldDisplay']['creditoprov'] = 'off';
	$this->nmgp_cmp_hidden["dias"] = "off"; $this->NM_ajax_info['fieldDisplay']['dias'] = 'off';
	}

$this->nm_formatar_campos();
$this->NM_ajax_info['event_field'] = 'proveedor';
terceros_cliente_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off';
}
function quita_nombres()
{
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_sa)) {$this->sc_temp_sa = (isset($_SESSION['sa'])) ? $_SESSION['sa'] : "";}
if (!isset($this->sc_temp_pa)) {$this->sc_temp_pa = (isset($_SESSION['pa'])) ? $_SESSION['pa'] : "";}
if (!isset($this->sc_temp_sn)) {$this->sc_temp_sn = (isset($_SESSION['sn'])) ? $_SESSION['sn'] : "";}
if (!isset($this->sc_temp_pn)) {$this->sc_temp_pn = (isset($_SESSION['pn'])) ? $_SESSION['pn'] : "";}
if (!isset($this->sc_temp_nomb)) {$this->sc_temp_nomb = (isset($_SESSION['nomb'])) ? $_SESSION['nomb'] : "";}
  
$pos='';
$pos=strpos($this->sc_temp_nomb, '/', 0);
if(!empty($pos))
	{
	$rs=substr($this->sc_temp_nomb, 0, $pos);
	$this->nombres =$rs.'/'." ".$this->sc_temp_pn." ".$this->sc_temp_sn." ".$this->sc_temp_pa." ".$this->sc_temp_sa;
	}
else
	{
	$this->nombres =$this->sc_temp_pn." ".$this->sc_temp_sn." ".$this->sc_temp_pa." ".$this->sc_temp_sa;
	}




if (isset($this->sc_temp_nomb)) { $_SESSION['nomb'] = $this->sc_temp_nomb;}
if (isset($this->sc_temp_pn)) { $_SESSION['pn'] = $this->sc_temp_pn;}
if (isset($this->sc_temp_sn)) { $_SESSION['sn'] = $this->sc_temp_sn;}
if (isset($this->sc_temp_pa)) { $_SESSION['pa'] = $this->sc_temp_pa;}
if (isset($this->sc_temp_sa)) { $_SESSION['sa'] = $this->sc_temp_sa;}
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off';
}
function sucur_cliente_onChange()
{
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'on';
  
$original_idmuni = $this->idmuni;
$original_direccion = $this->direccion;
$original_tel_cel = $this->tel_cel;

if($this->idtercero >0)
	{
	if($this->sucur_cliente =='SI')
		{
		
     $nm_select ="update terceros set sucur_cliente=\"SI\" where idtercero=$this->idtercero "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                terceros_cliente_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		;
		$muni=$this->idmuni ;
		 
      $nm_select = "select iddepar from municipio where idmun=$muni"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->des = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->des = false;
          $this->des_erro = $this->Db->ErrorMsg();
      } 
;
		$dep=substr($this->des , 7);
		 
      $nm_select = "select iddireccion from direccion where idter=$this->idtercero  and obs='PRINCIPAL'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
     if ($this->idtercero != "")
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
     } 
;
		if (empty($this->ds[0][0]))
			{
			
     $nm_select ="insert direccion SET idter=$this->idtercero , iddepar=$dep, idmuni=$muni, direc='$this->direccion', obs='PRINCIPAL', telefono='$this->tel_cel'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                terceros_cliente_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ; 
			}

		}
	else
		{
		
     $nm_select ="update terceros set sucur_cliente=\"NO\" where idtercero=$this->idtercero "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                terceros_cliente_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		;
		}
	}



$modificado_idmuni = $this->idmuni;
$modificado_direccion = $this->direccion;
$modificado_tel_cel = $this->tel_cel;
$this->nm_formatar_campos('idmuni', 'direccion', 'tel_cel');
if ($original_idmuni !== $modificado_idmuni || isset($this->nmgp_cmp_readonly['idmuni']) || (isset($bFlagRead_idmuni) && $bFlagRead_idmuni))
{
    $this->ajax_return_values_idmuni(true);
}
if ($original_direccion !== $modificado_direccion || isset($this->nmgp_cmp_readonly['direccion']) || (isset($bFlagRead_direccion) && $bFlagRead_direccion))
{
    $this->ajax_return_values_direccion(true);
}
if ($original_tel_cel !== $modificado_tel_cel || isset($this->nmgp_cmp_readonly['tel_cel']) || (isset($bFlagRead_tel_cel) && $bFlagRead_tel_cel))
{
    $this->ajax_return_values_tel_cel(true);
}
$this->NM_ajax_info['event_field'] = 'sucur';
terceros_cliente_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off';
}
function tipo_onChange()
{
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'on';
  
$original_tipo = $this->tipo;
$original_regimen = $this->regimen;

if($this->tipo =='JUR')
	{
	$this->regimen ='COMUN';
	$this->nmgp_cmp_hidden["efec_retencion"] = "on"; $this->NM_ajax_info['fieldDisplay']['efec_retencion'] = 'on';
	$this->sc_ajax_javascript('nm_field_disabled', array("regimen=disabled", ""));
;
	$this->efec_retencion ='S';
	}
else
	{
	$this->nmgp_cmp_hidden["efec_retencion"] = "on"; $this->NM_ajax_info['fieldDisplay']['efec_retencion'] = 'on';
	$this->sc_ajax_javascript('nm_field_disabled', array("regimen=", ""));
;
	$this->efec_retencion ='N';
	$this->sc_set_focus('regimen');
	}

$modificado_tipo = $this->tipo;
$modificado_regimen = $this->regimen;
$this->nm_formatar_campos('tipo', 'regimen');
if ($original_tipo !== $modificado_tipo || isset($this->nmgp_cmp_readonly['tipo']) || (isset($bFlagRead_tipo) && $bFlagRead_tipo))
{
    $this->ajax_return_values_tipo(true);
}
if ($original_regimen !== $modificado_regimen || isset($this->nmgp_cmp_readonly['regimen']) || (isset($bFlagRead_regimen) && $bFlagRead_regimen))
{
    $this->ajax_return_values_regimen(true);
}
$this->NM_ajax_info['event_field'] = 'tipo';
terceros_cliente_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['terceros_cliente_mob']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          if ($this->sc_evento == "insert")
          {
              $this->nm_gera_mensagem("Cliente creado Satisfactoriamente", $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['retorno_edit'], "parent"); 
          }
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              terceros_cliente_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
//-- 
   if ($this->nmgp_opcao == "novo")
   { 
       $out_imagenter = "";  
   } 
   else 
   { 
       $out_imagenter = $this->imagenter;  
   } 
   if ($this->imagenter != "" && $this->imagenter != "none")   
   { 
       $out_imagenter = $this->Ini->path_imag_temp . "/sc_imagenter_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ;  
       $arq_imagenter = fopen($this->Ini->root . $out_imagenter, "w") ;  
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
       { 
           $nm_tmp = nm_conv_img_access(substr($this->imagenter, 0, 12));
           if (substr($this->imagenter, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
           { 
               $this->imagenter = nm_conv_img_access($this->imagenter);
           } 
       } 
       if (substr($this->imagenter, 0, 4) == "*nm*") 
       { 
           $this->imagenter = substr($this->imagenter, 4) ; 
           $this->imagenter = base64_decode($this->imagenter) ; 
       } 
       $img_pos_bm = strpos($this->imagenter, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->imagenter = substr($this->imagenter, $img_pos_bm) ; 
       } 
       fwrite($arq_imagenter, $this->imagenter) ;  
       fclose($arq_imagenter) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_imagenter, true);
       $this->nmgp_return_img['imagenter'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['imagenter'][1] = $sc_obj_img->getWidth();
       if ($this->Ini->Export_img_zip) {
           $this->Ini->Img_export_zip[] = $this->Ini->root . $out_imagenter;
           $out_imagenter = str_replace($this->Ini->path_imag_temp . "/", "", $out_imagenter);
       } 
       $_SESSION['scriptcase']['sc_num_img']++ ; 
   } 
   if (isset($_POST['nmgp_opcao']) && 'excluir' == $_POST['nmgp_opcao'] && $this->sc_evento != "delete" && (!isset($this->sc_evento_old) || 'delete' != $this->sc_evento_old))
   {
       global $temp_out_imagenter;
       if (isset($temp_out_imagenter))
       {
           $out_imagenter = $temp_out_imagenter;
       }
   }
        $this->initFormPages();
    include_once("terceros_cliente_mob_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("documento", "nombres", "nombre1", "nombre2", "apellido1", "apellido2"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['csrf_token'];
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

   function Form_lookup_tipo_documento()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Registtro civil de nacimiento?#?11?#?N?@?";
       $nmgp_def_dados .= "Tarjeta de identidad?#?12?#?N?@?";
       $nmgp_def_dados .= "Cédula de ciudadanía?#?13?#?S?@?";
       $nmgp_def_dados .= "Tarjeta de Extranjería?#?21?#?N?@?";
       $nmgp_def_dados .= "Cédula de extranjería?#?22?#?N?@?";
       $nmgp_def_dados .= "Nit?#?31?#?N?@?";
       $nmgp_def_dados .= "Pasaporte?#?41?#?N?@?";
       $nmgp_def_dados .= "Tipo de documento extranjero?#?42?#?N?@?";
       $nmgp_def_dados .= "Definido por la DIAN?#?43?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_sexo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Masculino?#?M?#?S?@?";
       $nmgp_def_dados .= "Femenino?#?F?#?N?@?";
       $nmgp_def_dados .= "Otro?#?O?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_tipo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "NATURAL?#?NAT?#?S?@?";
       $nmgp_def_dados .= "JURÍDICA?#?JUR?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_regimen()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SIMPLIFICADO?#?SIM?#?S?@?";
       $nmgp_def_dados .= "COMÚN?#?COMUN?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_departamento()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_departamento']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_departamento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_departamento']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_departamento'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_departamento']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_departamento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_departamento']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_departamento'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_cupo = $this->cupo;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_cupo = $this->cupo;

   $nm_comando = "SELECT iddep, departamento  FROM departamento  ORDER BY departamento";

   $this->dv = $old_value_dv;
   $this->cupo = $old_value_cupo;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_departamento'][] = $rs->fields[0];
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
   function Form_lookup_idmuni()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_idmuni']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_idmuni'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_idmuni']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_idmuni'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_idmuni']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_idmuni'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_idmuni']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_idmuni'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_cupo = $this->cupo;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_cupo = $this->cupo;

   $nm_comando = "SELECT idmun, municipio  FROM municipio  WHERE iddepar=$this->departamento ORDER BY municipio";

   $this->dv = $old_value_dv;
   $this->cupo = $old_value_cupo;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_idmuni'][] = $rs->fields[0];
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
   function Form_lookup_cliente()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_es_restaurante()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "NO?#?NO?#?S?@?";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_credito()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "NO?#?NO?#?S?@?";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_loatiende()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_loatiende']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_loatiende'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_loatiende']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_loatiende'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_loatiende']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_loatiende'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_loatiende']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_loatiende'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_cupo = $this->cupo;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_cupo = $this->cupo;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + \"  \" + nombres  FROM terceros  where empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento, \"  \",nombres)  FROM terceros  where empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&\"  \"&nombres  FROM terceros  where empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||\"  \"||nombres  FROM terceros  where empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + \"  \" + nombres  FROM terceros  where empleado='SI' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||\"  \"||nombres  FROM terceros  where empleado='SI' ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||\"  \"||nombres  FROM terceros  where empleado='SI' ORDER BY documento, nombres";
   }

   $this->dv = $old_value_dv;
   $this->cupo = $old_value_cupo;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['Lookup_loatiende'][] = $rs->fields[0];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              terceros_cliente_mob_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "documento", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nombres", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nombre1", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nombre2", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "apellido1", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "apellido2", $arg_search, $data_search);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_filter_form'] . " and (cliente='SI') and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where cliente='SI' and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_terceros_cliente_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['total'] = $qt_geral_reg_terceros_cliente_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          terceros_cliente_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          terceros_cliente_mob_pack_ajax_response();
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
      $nm_numeric[] = "idtercero";$nm_numeric[] = "saldo";$nm_numeric[] = "idmuni";$nm_numeric[] = "cupo";$nm_numeric[] = "listaprecios";$nm_numeric[] = "loatiende";$nm_numeric[] = "dias";$nm_numeric[] = "saldoapagar";$nm_numeric[] = "dv";$nm_numeric[] = "";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['decimal_db'] == ".")
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
      $Nm_datas['nacimiento'] = "date";$Nm_datas['fechault'] = "date";$Nm_datas['afiliacion'] = "date";$Nm_datas['con_actual'] = "timestamp";$Nm_datas['fechultcomp'] = "date";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['SC_sep_date1'];
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
       $nmgp_saida_form = "terceros_cliente_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "terceros_cliente_mob_fim.php";
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
       terceros_cliente_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['masterValue']);
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
 function nm_gera_mensagem($nm_mensagem, $nm_apl_dest, $nm_apl_retorno="", $nm_apl_parms="")
 {
    $nm_tp_saida = "post";
    if ($nm_apl_dest == "terceros_cliente_mob.php")
    {
        $form_submit = 1;
        $form_opcao  = $this->nmgp_opcao;
    }
    if ("novo" == $this->nmgp_opcao || "insert" == $this->sc_evento)
    {
        $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['opc_ant'] = "";
    }
    if ($nm_apl_retorno == 'parent')
    {
        $nm_apl_retorno = "";
        $nm_tp_saida = "parent";
    }
    elseif (strtolower(substr($nm_apl_dest, 0, 5)) == "http:" || strtolower(substr($nm_apl_dest, 0, 6)) == "https:" || strtolower(substr($nm_apl_dest, 0, 3)) == "../")
    {
        $nm_tp_saida = "get";
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['sc_outra_jan']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['sc_outra_jan'] && $nm_apl_retorno == 'sc_sai')
    {
        $nm_tp_saida    = "close";
    }
    if ($nm_apl_retorno == 'sc_sai')
    {
        $nm_apl_retorno = "";
    }
    if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
    {
        $sOldBuffer = ob_get_contents();
        ob_end_clean();
        $this->NM_ajax_info['redir']['metodo'] = 'html';
        $this->NM_ajax_info['redir']['action'] = '';
        ob_start();
    }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
</HEAD>
<body class="scFormPage">
<form name="Fmens" method=post 
             target="_self"> 
<input type=hidden name="nm_form_submit" value="<?php echo $this->form_encode_input($form_submit); ?>">
<input type=hidden name="nmgp_opcao" value="<?php echo $this->form_encode_input($form_opcao); ?>">
<input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
<input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nm_apl_retorno); ?>">
<input type=hidden name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<div style="display: flex; justify-content: center">
    <div class="scAppDivMoldura" style="min-width: 300px">
        <div class="scAppDivContentText"><?php echo $nm_mensagem; ?></div>
        <div style="padding-top: 10px; display: flex; justify-content: right">
<?php echo nmButtonOutput($this->arr_buttons, "bok", "nm_saida_mens('" . $nm_tp_saida. "')", "nm_saida_mens('" . $nm_tp_saida. "')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>

        </div>
    </div>
</div>
</form> 
<script type="text/javascript"> 
function nm_saida_mens(tp_saida) 
{ 
   if (tp_saida == "close") 
   { 
       window.close();  
   } 
   if (tp_saida == "parent") 
   { 
<?php
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['run_iframe_ajax']))
        {
            echo "parent.ajax_navigate('edit', '" . $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['retorno_edit'][1] . "');";
        }
        else
        {
            echo "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_cliente_mob']['retorno_edit'] . "';"; 
        }
?>
   } 
   if (tp_saida == "post") 
   { 
       document.Fmens.target  = "_self"; 
       document.Fmens.action  = "<?php echo $nm_apl_dest; ?>";
       document.Fmens.submit(); 
   } 
   if (tp_saida == "get") 
   { 
       window.location = "<?php echo $nm_apl_dest; ?>";  
   } 
} 
<?php
if ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
</script> 
</body>
</html>
<?php
    if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
    {
        $this->NM_ajax_info['redir']['action'] = terceros_cliente_mob_pack_protect_string(ob_get_contents());
        ob_end_clean();
        ob_start();
        terceros_cliente_mob_pack_ajax_response();
    }
    exit;
 }
    function sc_set_focus($sFieldName)
    {
        $sFieldName = strtolower($sFieldName);
        $aFocus = array(
                        'tipo_documento' => 'tipo_documento',
                        'documento' => 'documento',
                        'dv' => 'dv',
                        'imagenter' => 'imagenter',
                        'nombre1' => 'nombre1',
                        'nombre2' => 'nombre2',
                        'apellido1' => 'apellido1',
                        'apellido2' => 'apellido2',
                        'tel_cel' => 'tel_cel',
                        'urlmail' => 'urlmail',
                        'nombres' => 'nombres',
                        'representante' => 'representante',
                        'sexo' => 'sexo',
                        'tipo' => 'tipo',
                        'regimen' => 'regimen',
                        'direccion' => 'direccion',
                        'departamento' => 'departamento',
                        'idmuni' => 'idmuni',
                        'observaciones' => 'observaciones',
                        'cliente' => 'cliente',
                        'es_restaurante' => 'es_restaurante',
                        'credito' => 'credito',
                        'cupo' => 'cupo',
                        'loatiende' => 'loatiende',
                       );
        if (isset($aFocus[$sFieldName]))
        {
            $this->NM_ajax_info['focus'] = $aFocus[$sFieldName];
        }
    } // sc_set_focus
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
                return array("sc_b_new_t.sc-unique-btn-1", "sc_b_new_t.sc-unique-btn-15");
                break;
            case "insert":
                return array("sc_b_ins_t.sc-unique-btn-2", "sc_b_ins_t.sc-unique-btn-16");
                break;
            case "bcancelar":
                return array("sc_b_sai_t.sc-unique-btn-3", "sc_b_sai_t.sc-unique-btn-17");
                break;
            case "update":
                return array("sc_b_upd_t.sc-unique-btn-4", "sc_b_upd_t.sc-unique-btn-18");
                break;
            case "delete":
                return array("sc_b_del_t.sc-unique-btn-5", "sc_b_del_t.sc-unique-btn-19");
                break;
            case "help":
                return array("sc_b_hlp_t");
                break;
            case "exit":
                return array("sc_b_sai_t.sc-unique-btn-6", "sc_b_sai_t.sc-unique-btn-7", "sc_b_sai_t.sc-unique-btn-9", "sc_b_sai_t.sc-unique-btn-20", "sc_b_sai_t.sc-unique-btn-21", "sc_b_sai_t.sc-unique-btn-23", "sc_b_sai_t.sc-unique-btn-8", "sc_b_sai_t.sc-unique-btn-10", "sc_b_sai_t.sc-unique-btn-22", "sc_b_sai_t.sc-unique-btn-24");
                break;
            case "birpara":
                return array("brec_b");
                break;
            case "first":
                return array("sc_b_ini_b.sc-unique-btn-11", "sc_b_ini_b.sc-unique-btn-25");
                break;
            case "back":
                return array("sc_b_ret_b.sc-unique-btn-12", "sc_b_ret_b.sc-unique-btn-26");
                break;
            case "forward":
                return array("sc_b_avc_b.sc-unique-btn-13", "sc_b_avc_b.sc-unique-btn-27");
                break;
            case "last":
                return array("sc_b_fim_b.sc-unique-btn-14", "sc_b_fim_b.sc-unique-btn-28");
                break;
        }

        return array($buttonName);
    } // getButtonIds

}
?>
