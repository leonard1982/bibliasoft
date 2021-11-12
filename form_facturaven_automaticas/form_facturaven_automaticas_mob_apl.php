<?php
//
class form_facturaven_automaticas_mob_apl
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
   var $idfacven;
   var $numfacven;
   var $nremision;
   var $credito;
   var $credito_1;
   var $fechaven;
   var $fechavenc;
   var $idcli;
   var $idcli_1;
   var $subtotal;
   var $valoriva;
   var $total;
   var $pagada;
   var $asentada;
   var $observaciones;
   var $saldo;
   var $adicional;
   var $formapago;
   var $adicional2;
   var $adicional3;
   var $obspago;
   var $vendedor;
   var $pedido;
   var $resolucion;
   var $resolucion_1;
   var $dircliente;
   var $dircliente_1;
   var $imconsumo;
   var $retefuente;
   var $reteiva;
   var $reteica;
   var $cree;
   var $espos;
   var $cufe;
   var $enlacepdf;
   var $estado;
   var $avisos;
   var $dias_decredito;
   var $banco;
   var $tipo;
   var $id_fact;
   var $enviada_a_tns;
   var $fecha_a_tns;
   var $fecha_a_tns_hora;
   var $factura_tns;
   var $creado_en_movil;
   var $disponible_en_movil;
   var $mot_nc;
   var $mot_nd;
   var $creado;
   var $creado_hora;
   var $editado;
   var $editado_hora;
   var $usuario_crea;
   var $cod_cuenta;
   var $qr_base64;
   var $fecha_validacion;
   var $fecha_validacion_hora;
   var $id_trans_fe;
   var $id_clasificacion;
   var $id_clasificacion_1;
   var $detalle;
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
          if (isset($this->NM_ajax_info['param']['credito']))
          {
              $this->credito = $this->NM_ajax_info['param']['credito'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['detalle']))
          {
              $this->detalle = $this->NM_ajax_info['param']['detalle'];
          }
          if (isset($this->NM_ajax_info['param']['dias_decredito']))
          {
              $this->dias_decredito = $this->NM_ajax_info['param']['dias_decredito'];
          }
          if (isset($this->NM_ajax_info['param']['dircliente']))
          {
              $this->dircliente = $this->NM_ajax_info['param']['dircliente'];
          }
          if (isset($this->NM_ajax_info['param']['fechaven']))
          {
              $this->fechaven = $this->NM_ajax_info['param']['fechaven'];
          }
          if (isset($this->NM_ajax_info['param']['formapago']))
          {
              $this->formapago = $this->NM_ajax_info['param']['formapago'];
          }
          if (isset($this->NM_ajax_info['param']['id_clasificacion']))
          {
              $this->id_clasificacion = $this->NM_ajax_info['param']['id_clasificacion'];
          }
          if (isset($this->NM_ajax_info['param']['idcli']))
          {
              $this->idcli = $this->NM_ajax_info['param']['idcli'];
          }
          if (isset($this->NM_ajax_info['param']['idfacven']))
          {
              $this->idfacven = $this->NM_ajax_info['param']['idfacven'];
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
          if (isset($this->NM_ajax_info['param']['numfacven']))
          {
              $this->numfacven = $this->NM_ajax_info['param']['numfacven'];
          }
          if (isset($this->NM_ajax_info['param']['observaciones']))
          {
              $this->observaciones = $this->NM_ajax_info['param']['observaciones'];
          }
          if (isset($this->NM_ajax_info['param']['resolucion']))
          {
              $this->resolucion = $this->NM_ajax_info['param']['resolucion'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['subtotal']))
          {
              $this->subtotal = $this->NM_ajax_info['param']['subtotal'];
          }
          if (isset($this->NM_ajax_info['param']['tipo']))
          {
              $this->tipo = $this->NM_ajax_info['param']['tipo'];
          }
          if (isset($this->NM_ajax_info['param']['total']))
          {
              $this->total = $this->NM_ajax_info['param']['total'];
          }
          if (isset($this->NM_ajax_info['param']['valoriva']))
          {
              $this->valoriva = $this->NM_ajax_info['param']['valoriva'];
          }
          if (isset($this->NM_ajax_info['param']['vendedor']))
          {
              $this->vendedor = $this->NM_ajax_info['param']['vendedor'];
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
          $_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['embutida_parms']);
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
                 nm_limpa_str_form_facturaven_automaticas_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['total']);
          }
          if (!isset($_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['total']))
          {
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['form_facturaven_automaticas_detalleventa_mob_script_case_init'] ]['form_facturaven_automaticas_detalleventa_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['form_facturaven_automaticas_detalleventa_mob_script_case_init'] ]['form_facturaven_automaticas_detalleventa_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_facturaven_automaticas_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_facturaven_automaticas_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_facturaven_automaticas_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_facturaven_automaticas_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_facturaven_automaticas_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_facturaven_automaticas_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_facturaven_automaticas_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_facturaven_automaticas_mob']['label'] = "Factura Automática";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_facturaven_automaticas_mob")
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



      $_SESSION['scriptcase']['error_icon']['form_facturaven_automaticas_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Lemon__NM__nm_scriptcase9_Lemon_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_facturaven_automaticas_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['goto']      = 'on';
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_facturaven_automaticas_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_facturaven_automaticas_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_facturaven_automaticas_mob'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['dados_form'];
          if (!isset($this->nremision)){$this->nremision = $this->nmgp_dados_form['nremision'];} 
          if (!isset($this->fechavenc)){$this->fechavenc = $this->nmgp_dados_form['fechavenc'];} 
          if (!isset($this->pagada)){$this->pagada = $this->nmgp_dados_form['pagada'];} 
          if (!isset($this->asentada)){$this->asentada = $this->nmgp_dados_form['asentada'];} 
          if (!isset($this->saldo)){$this->saldo = $this->nmgp_dados_form['saldo'];} 
          if (!isset($this->adicional)){$this->adicional = $this->nmgp_dados_form['adicional'];} 
          if (!isset($this->adicional2)){$this->adicional2 = $this->nmgp_dados_form['adicional2'];} 
          if (!isset($this->adicional3)){$this->adicional3 = $this->nmgp_dados_form['adicional3'];} 
          if (!isset($this->obspago)){$this->obspago = $this->nmgp_dados_form['obspago'];} 
          if (!isset($this->pedido)){$this->pedido = $this->nmgp_dados_form['pedido'];} 
          if (!isset($this->imconsumo)){$this->imconsumo = $this->nmgp_dados_form['imconsumo'];} 
          if (!isset($this->retefuente)){$this->retefuente = $this->nmgp_dados_form['retefuente'];} 
          if (!isset($this->reteiva)){$this->reteiva = $this->nmgp_dados_form['reteiva'];} 
          if (!isset($this->reteica)){$this->reteica = $this->nmgp_dados_form['reteica'];} 
          if (!isset($this->cree)){$this->cree = $this->nmgp_dados_form['cree'];} 
          if (!isset($this->espos)){$this->espos = $this->nmgp_dados_form['espos'];} 
          if (!isset($this->cufe)){$this->cufe = $this->nmgp_dados_form['cufe'];} 
          if (!isset($this->enlacepdf)){$this->enlacepdf = $this->nmgp_dados_form['enlacepdf'];} 
          if (!isset($this->estado)){$this->estado = $this->nmgp_dados_form['estado'];} 
          if (!isset($this->avisos)){$this->avisos = $this->nmgp_dados_form['avisos'];} 
          if (!isset($this->banco)){$this->banco = $this->nmgp_dados_form['banco'];} 
          if (!isset($this->id_fact)){$this->id_fact = $this->nmgp_dados_form['id_fact'];} 
          if (!isset($this->enviada_a_tns)){$this->enviada_a_tns = $this->nmgp_dados_form['enviada_a_tns'];} 
          if (!isset($this->fecha_a_tns)){$this->fecha_a_tns = $this->nmgp_dados_form['fecha_a_tns'];} 
          if (!isset($this->factura_tns)){$this->factura_tns = $this->nmgp_dados_form['factura_tns'];} 
          if (!isset($this->creado_en_movil)){$this->creado_en_movil = $this->nmgp_dados_form['creado_en_movil'];} 
          if (!isset($this->disponible_en_movil)){$this->disponible_en_movil = $this->nmgp_dados_form['disponible_en_movil'];} 
          if (!isset($this->mot_nc)){$this->mot_nc = $this->nmgp_dados_form['mot_nc'];} 
          if (!isset($this->mot_nd)){$this->mot_nd = $this->nmgp_dados_form['mot_nd'];} 
          if (!isset($this->creado)){$this->creado = $this->nmgp_dados_form['creado'];} 
          if (!isset($this->editado)){$this->editado = $this->nmgp_dados_form['editado'];} 
          if (!isset($this->usuario_crea)){$this->usuario_crea = $this->nmgp_dados_form['usuario_crea'];} 
          if (!isset($this->cod_cuenta)){$this->cod_cuenta = $this->nmgp_dados_form['cod_cuenta'];} 
          if (!isset($this->qr_base64)){$this->qr_base64 = $this->nmgp_dados_form['qr_base64'];} 
          if (!isset($this->fecha_validacion)){$this->fecha_validacion = $this->nmgp_dados_form['fecha_validacion'];} 
          if (!isset($this->id_trans_fe)){$this->id_trans_fe = $this->nmgp_dados_form['id_trans_fe'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_facturaven_automaticas_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_facturaven_automaticas/form_facturaven_automaticas_mob_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_facturaven_automaticas_mob_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_facturaven_automaticas_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_facturaven_automaticas_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_facturaven_automaticas/form_facturaven_automaticas_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_facturaven_automaticas_mob_erro.class.php"); 
      }
      $this->Erro      = new form_facturaven_automaticas_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['opcao']))
         { 
             if ($this->idfacven != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_facturaven_automaticas_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['dados_form'];
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
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['form_facturaven_automaticas_detalleventa_mob_script_case_init'] ]['form_facturaven_automaticas_detalleventa_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['form_facturaven_automaticas_detalleventa_mob_script_case_init'] ]['form_facturaven_automaticas_detalleventa_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['form_facturaven_automaticas_detalleventa_mob_script_case_init'] ]['form_facturaven_automaticas_detalleventa_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['form_facturaven_automaticas_detalleventa_mob_script_case_init'] ]['form_facturaven_automaticas_detalleventa_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_facturaven_automaticas_detalleventa_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_facturaven_automaticas_detalleventa_mob') . "/form_facturaven_automaticas_detalleventa_mob_apl.php");
          $this->form_facturaven_automaticas_detalleventa_mob = new form_facturaven_automaticas_detalleventa_mob_apl;
      }
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

            $out1_img_cache = $_SESSION['scriptcase']['form_facturaven_automaticas_mob']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['form_facturaven_automaticas_mob']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
      if (isset($this->idfacven)) { $this->nm_limpa_alfa($this->idfacven); }
      if (isset($this->numfacven)) { $this->nm_limpa_alfa($this->numfacven); }
      if (isset($this->credito)) { $this->nm_limpa_alfa($this->credito); }
      if (isset($this->idcli)) { $this->nm_limpa_alfa($this->idcli); }
      if (isset($this->subtotal)) { $this->nm_limpa_alfa($this->subtotal); }
      if (isset($this->valoriva)) { $this->nm_limpa_alfa($this->valoriva); }
      if (isset($this->total)) { $this->nm_limpa_alfa($this->total); }
      if (isset($this->observaciones)) { $this->nm_limpa_alfa($this->observaciones); }
      if (isset($this->vendedor)) { $this->nm_limpa_alfa($this->vendedor); }
      if (isset($this->resolucion)) { $this->nm_limpa_alfa($this->resolucion); }
      if (isset($this->dircliente)) { $this->nm_limpa_alfa($this->dircliente); }
      if (isset($this->dias_decredito)) { $this->nm_limpa_alfa($this->dias_decredito); }
      if (isset($this->id_clasificacion)) { $this->nm_limpa_alfa($this->id_clasificacion); }
      if (isset($this->detalle)) { $this->nm_limpa_alfa($this->detalle); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- fechaven
      $this->field_config['fechaven']                 = array();
      $this->field_config['fechaven']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fechaven']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechaven']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fechaven');
      //-- dias_decredito
      $this->field_config['dias_decredito']               = array();
      $this->field_config['dias_decredito']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dias_decredito']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dias_decredito']['symbol_dec'] = '';
      $this->field_config['dias_decredito']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dias_decredito']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- subtotal
      $this->field_config['subtotal']               = array();
      $this->field_config['subtotal']['symbol_grp'] = ',';
      $this->field_config['subtotal']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['subtotal']['symbol_dec'] = '.';
      $this->field_config['subtotal']['symbol_mon'] = '$';
      $this->field_config['subtotal']['format_pos'] = '3';
      $this->field_config['subtotal']['format_neg'] = '4';
      //-- valoriva
      $this->field_config['valoriva']               = array();
      $this->field_config['valoriva']['symbol_grp'] = ',';
      $this->field_config['valoriva']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valoriva']['symbol_dec'] = '.';
      $this->field_config['valoriva']['symbol_mon'] = '$';
      $this->field_config['valoriva']['format_pos'] = '3';
      $this->field_config['valoriva']['format_neg'] = '4';
      //-- total
      $this->field_config['total']               = array();
      $this->field_config['total']['symbol_grp'] = ',';
      $this->field_config['total']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['total']['symbol_dec'] = '.';
      $this->field_config['total']['symbol_mon'] = '$';
      $this->field_config['total']['format_pos'] = '3';
      $this->field_config['total']['format_neg'] = '4';
      //-- vendedor
      $this->field_config['vendedor']               = array();
      $this->field_config['vendedor']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['vendedor']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['vendedor']['symbol_dec'] = '';
      $this->field_config['vendedor']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['vendedor']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- numfacven
      $this->field_config['numfacven']               = array();
      $this->field_config['numfacven']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['numfacven']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['numfacven']['symbol_dec'] = '';
      $this->field_config['numfacven']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['numfacven']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- idfacven
      $this->field_config['idfacven']               = array();
      $this->field_config['idfacven']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idfacven']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idfacven']['symbol_dec'] = '';
      $this->field_config['idfacven']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idfacven']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- nremision
      $this->field_config['nremision']               = array();
      $this->field_config['nremision']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['nremision']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['nremision']['symbol_dec'] = '';
      $this->field_config['nremision']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['nremision']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fechavenc
      $this->field_config['fechavenc']                 = array();
      $this->field_config['fechavenc']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fechavenc']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechavenc']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fechavenc');
      //-- asentada
      $this->field_config['asentada']               = array();
      $this->field_config['asentada']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['asentada']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['asentada']['symbol_dec'] = '';
      $this->field_config['asentada']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['asentada']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- saldo
      $this->field_config['saldo']               = array();
      $this->field_config['saldo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['saldo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['saldo']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['saldo']['symbol_mon'] = '';
      $this->field_config['saldo']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['saldo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- adicional
      $this->field_config['adicional']               = array();
      $this->field_config['adicional']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['adicional']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['adicional']['symbol_dec'] = '';
      $this->field_config['adicional']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['adicional']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- adicional2
      $this->field_config['adicional2']               = array();
      $this->field_config['adicional2']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['adicional2']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['adicional2']['symbol_dec'] = '';
      $this->field_config['adicional2']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['adicional2']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- adicional3
      $this->field_config['adicional3']               = array();
      $this->field_config['adicional3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['adicional3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['adicional3']['symbol_dec'] = '';
      $this->field_config['adicional3']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['adicional3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- pedido
      $this->field_config['pedido']               = array();
      $this->field_config['pedido']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['pedido']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['pedido']['symbol_dec'] = '';
      $this->field_config['pedido']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['pedido']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- imconsumo
      $this->field_config['imconsumo']               = array();
      $this->field_config['imconsumo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['imconsumo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['imconsumo']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['imconsumo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['imconsumo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- retefuente
      $this->field_config['retefuente']               = array();
      $this->field_config['retefuente']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['retefuente']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['retefuente']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['retefuente']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['retefuente']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- reteiva
      $this->field_config['reteiva']               = array();
      $this->field_config['reteiva']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['reteiva']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['reteiva']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['reteiva']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['reteiva']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- reteica
      $this->field_config['reteica']               = array();
      $this->field_config['reteica']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['reteica']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['reteica']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['reteica']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['reteica']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- cree
      $this->field_config['cree']               = array();
      $this->field_config['cree']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cree']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cree']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['cree']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cree']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- banco
      $this->field_config['banco']               = array();
      $this->field_config['banco']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['banco']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['banco']['symbol_dec'] = '';
      $this->field_config['banco']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['banco']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- id_fact
      $this->field_config['id_fact']               = array();
      $this->field_config['id_fact']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_fact']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_fact']['symbol_dec'] = '';
      $this->field_config['id_fact']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_fact']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fecha_a_tns
      $this->field_config['fecha_a_tns']                 = array();
      $this->field_config['fecha_a_tns']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecha_a_tns']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha_a_tns']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecha_a_tns']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecha_a_tns');
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
      //-- usuario_crea
      $this->field_config['usuario_crea']               = array();
      $this->field_config['usuario_crea']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['usuario_crea']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['usuario_crea']['symbol_dec'] = '';
      $this->field_config['usuario_crea']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['usuario_crea']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fecha_validacion
      $this->field_config['fecha_validacion']                 = array();
      $this->field_config['fecha_validacion']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecha_validacion']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha_validacion']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecha_validacion']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecha_validacion');
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
          if ('validate_resolucion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'resolucion');
          }
          if ('validate_formapago' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'formapago');
          }
          if ('validate_fechaven' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fechaven');
          }
          if ('validate_credito' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'credito');
          }
          if ('validate_dias_decredito' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dias_decredito');
          }
          if ('validate_idcli' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idcli');
          }
          if ('validate_dircliente' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dircliente');
          }
          if ('validate_subtotal' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'subtotal');
          }
          if ('validate_valoriva' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valoriva');
          }
          if ('validate_total' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'total');
          }
          if ('validate_observaciones' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'observaciones');
          }
          if ('validate_vendedor' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'vendedor');
          }
          if ('validate_numfacven' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numfacven');
          }
          if ('validate_idfacven' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idfacven');
          }
          if ('validate_tipo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo');
          }
          if ('validate_detalle' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'detalle');
          }
          if ('validate_id_clasificacion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_clasificacion');
          }
          form_facturaven_automaticas_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['inline_form_seq'] = $this->sc_seq_row;
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
              form_facturaven_automaticas_mob_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_facturaven_automaticas_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_facturaven_automaticas_mob_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_facturaven_automaticas_mob_pack_ajax_response();
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
          form_facturaven_automaticas_mob_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_facturaven_automaticas_mob.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Factura Automática") ?></TITLE>
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
<form name="Fdown" method="get" action="form_facturaven_automaticas_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_facturaven_automaticas_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="form_facturaven_automaticas_mob.php" target="_self" style="display: none"> 
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
           case 'resolucion':
               return "Prefijo";
               break;
           case 'formapago':
               return "Formapago";
               break;
           case 'fechaven':
               return "Fecha Inicio";
               break;
           case 'credito':
               return "Forma de pago";
               break;
           case 'dias_decredito':
               return "Días crédito";
               break;
           case 'idcli':
               return "Cliente";
               break;
           case 'dircliente':
               return "Dirección";
               break;
           case 'subtotal':
               return "SubTotal";
               break;
           case 'valoriva':
               return "Valor IVA";
               break;
           case 'total':
               return "Total";
               break;
           case 'observaciones':
               return "Observaciones";
               break;
           case 'vendedor':
               return "Vendedor";
               break;
           case 'numfacven':
               return "Número";
               break;
           case 'idfacven':
               return "Idfacven";
               break;
           case 'tipo':
               return "Tipo";
               break;
           case 'detalle':
               return "";
               break;
           case 'id_clasificacion':
               return "Clasificación";
               break;
           case 'nremision':
               return "Nremision";
               break;
           case 'fechavenc':
               return "Fechavenc";
               break;
           case 'pagada':
               return "Pagada";
               break;
           case 'asentada':
               return "Asentada";
               break;
           case 'saldo':
               return "Saldo";
               break;
           case 'adicional':
               return "Adicional";
               break;
           case 'adicional2':
               return "Adicional 2";
               break;
           case 'adicional3':
               return "Adicional 3";
               break;
           case 'obspago':
               return "Obspago";
               break;
           case 'pedido':
               return "Pedido";
               break;
           case 'imconsumo':
               return "Imconsumo";
               break;
           case 'retefuente':
               return "Retefuente";
               break;
           case 'reteiva':
               return "Reteiva";
               break;
           case 'reteica':
               return "Reteica";
               break;
           case 'cree':
               return "Cree";
               break;
           case 'espos':
               return "Espos";
               break;
           case 'cufe':
               return "Cufe";
               break;
           case 'enlacepdf':
               return "Enlacepdf";
               break;
           case 'estado':
               return "Estado";
               break;
           case 'avisos':
               return "Avisos";
               break;
           case 'banco':
               return "Banco";
               break;
           case 'id_fact':
               return "Id Fact";
               break;
           case 'enviada_a_tns':
               return "Enviada A Tns";
               break;
           case 'fecha_a_tns':
               return "Fecha A Tns";
               break;
           case 'factura_tns':
               return "Factura Tns";
               break;
           case 'creado_en_movil':
               return "Creado En Movil";
               break;
           case 'disponible_en_movil':
               return "Disponible En Movil";
               break;
           case 'mot_nc':
               return "Mot Nc";
               break;
           case 'mot_nd':
               return "Mot Nd";
               break;
           case 'creado':
               return "Creado";
               break;
           case 'editado':
               return "Editado";
               break;
           case 'usuario_crea':
               return "Usuario Crea";
               break;
           case 'cod_cuenta':
               return "Cod Cuenta";
               break;
           case 'qr_base64':
               return "Qr Base 64";
               break;
           case 'fecha_validacion':
               return "Fecha Validacion";
               break;
           case 'id_trans_fe':
               return "Id Trans Fe";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_facturaven_automaticas_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_facturaven_automaticas_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_facturaven_automaticas_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_facturaven_automaticas_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'resolucion' == $filtro)) || (is_array($filtro) && in_array('resolucion', $filtro)))
        $this->ValidateField_resolucion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'formapago' == $filtro)) || (is_array($filtro) && in_array('formapago', $filtro)))
        $this->ValidateField_formapago($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fechaven' == $filtro)) || (is_array($filtro) && in_array('fechaven', $filtro)))
        $this->ValidateField_fechaven($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'credito' == $filtro)) || (is_array($filtro) && in_array('credito', $filtro)))
        $this->ValidateField_credito($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'dias_decredito' == $filtro)) || (is_array($filtro) && in_array('dias_decredito', $filtro)))
        $this->ValidateField_dias_decredito($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'idcli' == $filtro)) || (is_array($filtro) && in_array('idcli', $filtro)))
        $this->ValidateField_idcli($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'dircliente' == $filtro)) || (is_array($filtro) && in_array('dircliente', $filtro)))
        $this->ValidateField_dircliente($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'subtotal' == $filtro)) || (is_array($filtro) && in_array('subtotal', $filtro)))
        $this->ValidateField_subtotal($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'valoriva' == $filtro)) || (is_array($filtro) && in_array('valoriva', $filtro)))
        $this->ValidateField_valoriva($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'total' == $filtro)) || (is_array($filtro) && in_array('total', $filtro)))
        $this->ValidateField_total($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'observaciones' == $filtro)) || (is_array($filtro) && in_array('observaciones', $filtro)))
        $this->ValidateField_observaciones($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'vendedor' == $filtro)) || (is_array($filtro) && in_array('vendedor', $filtro)))
        $this->ValidateField_vendedor($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'numfacven' == $filtro)) || (is_array($filtro) && in_array('numfacven', $filtro)))
        $this->ValidateField_numfacven($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'idfacven' == $filtro)) || (is_array($filtro) && in_array('idfacven', $filtro)))
        $this->ValidateField_idfacven($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipo' == $filtro)) || (is_array($filtro) && in_array('tipo', $filtro)))
        $this->ValidateField_tipo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'detalle' == $filtro)) || (is_array($filtro) && in_array('detalle', $filtro)))
        $this->ValidateField_detalle($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_clasificacion' == $filtro)) || (is_array($filtro) && in_array('id_clasificacion', $filtro)))
        $this->ValidateField_id_clasificacion($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_resolucion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->resolucion) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_resolucion']) && !in_array($this->resolucion, $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_resolucion']))
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

    function ValidateField_formapago(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->formapago) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Formapago " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['formapago']))
              {
                  $Campos_Erros['formapago'] = array();
              }
              $Campos_Erros['formapago'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['formapago']) || !is_array($this->NM_ajax_info['errList']['formapago']))
              {
                  $this->NM_ajax_info['errList']['formapago'] = array();
              }
              $this->NM_ajax_info['errList']['formapago'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'formapago';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_formapago

    function ValidateField_fechaven(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fechaven, $this->field_config['fechaven']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fechaven']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fechaven']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fechaven']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fechaven']['date_sep']) ; 
          if (trim($this->fechaven) != "")  
          { 
              if ($teste_validade->Data($this->fechaven, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecha Inicio; " ; 
                  if (!isset($Campos_Erros['fechaven']))
                  {
                      $Campos_Erros['fechaven'] = array();
                  }
                  $Campos_Erros['fechaven'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fechaven']) || !is_array($this->NM_ajax_info['errList']['fechaven']))
                  {
                      $this->NM_ajax_info['errList']['fechaven'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechaven'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fechaven']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fechaven';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fechaven

    function ValidateField_credito(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->credito == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['php_cmp_required']['credito']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['php_cmp_required']['credito'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Forma de pago" ;
          if (!isset($Campos_Erros['credito']))
          {
              $Campos_Erros['credito'] = array();
          }
          $Campos_Erros['credito'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['credito']) || !is_array($this->NM_ajax_info['errList']['credito']))
                  {
                      $this->NM_ajax_info['errList']['credito'] = array();
                  }
                  $this->NM_ajax_info['errList']['credito'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
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

    function ValidateField_dias_decredito(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->dias_decredito, $this->field_config['dias_decredito']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->dias_decredito != '')  
          { 
              $iTestSize = 3;
              if (strlen($this->dias_decredito) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Días crédito: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['dias_decredito']))
                  {
                      $Campos_Erros['dias_decredito'] = array();
                  }
                  $Campos_Erros['dias_decredito'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['dias_decredito']) || !is_array($this->NM_ajax_info['errList']['dias_decredito']))
                  {
                      $this->NM_ajax_info['errList']['dias_decredito'] = array();
                  }
                  $this->NM_ajax_info['errList']['dias_decredito'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->dias_decredito, 3, 0, -0, 999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Días crédito; " ; 
                  if (!isset($Campos_Erros['dias_decredito']))
                  {
                      $Campos_Erros['dias_decredito'] = array();
                  }
                  $Campos_Erros['dias_decredito'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dias_decredito']) || !is_array($this->NM_ajax_info['errList']['dias_decredito']))
                  {
                      $this->NM_ajax_info['errList']['dias_decredito'] = array();
                  }
                  $this->NM_ajax_info['errList']['dias_decredito'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['php_cmp_required']['dias_decredito']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['php_cmp_required']['dias_decredito'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Días crédito" ; 
              if (!isset($Campos_Erros['dias_decredito']))
              {
                  $Campos_Erros['dias_decredito'] = array();
              }
              $Campos_Erros['dias_decredito'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['dias_decredito']) || !is_array($this->NM_ajax_info['errList']['dias_decredito']))
                  {
                      $this->NM_ajax_info['errList']['dias_decredito'] = array();
                  }
                  $this->NM_ajax_info['errList']['dias_decredito'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'dias_decredito';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_dias_decredito

    function ValidateField_idcli(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->idcli) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_idcli']) && !in_array($this->idcli, $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_idcli']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['idcli']))
                   {
                       $Campos_Erros['idcli'] = array();
                   }
                   $Campos_Erros['idcli'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['idcli']) || !is_array($this->NM_ajax_info['errList']['idcli']))
                   {
                       $this->NM_ajax_info['errList']['idcli'] = array();
                   }
                   $this->NM_ajax_info['errList']['idcli'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idcli';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idcli

    function ValidateField_dircliente(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->dircliente == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['php_cmp_required']['dircliente']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['php_cmp_required']['dircliente'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Dirección" ; 
          if (!isset($Campos_Erros['dircliente']))
          {
              $Campos_Erros['dircliente'] = array();
          }
          $Campos_Erros['dircliente'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['dircliente']) || !is_array($this->NM_ajax_info['errList']['dircliente']))
          {
              $this->NM_ajax_info['errList']['dircliente'] = array();
          }
          $this->NM_ajax_info['errList']['dircliente'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->dircliente) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_dircliente']) && !in_array($this->dircliente, $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_dircliente']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['dircliente']))
              {
                  $Campos_Erros['dircliente'] = array();
              }
              $Campos_Erros['dircliente'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['dircliente']) || !is_array($this->NM_ajax_info['errList']['dircliente']))
              {
                  $this->NM_ajax_info['errList']['dircliente'] = array();
              }
              $this->NM_ajax_info['errList']['dircliente'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'dircliente';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_dircliente

    function ValidateField_subtotal(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->subtotal === "" || is_null($this->subtotal))  
      { 
          $this->subtotal = 0;
          $this->sc_force_zero[] = 'subtotal';
      } 
      if (!empty($this->field_config['subtotal']['symbol_dec']))
      {
          $this->sc_remove_currency($this->subtotal, $this->field_config['subtotal']['symbol_dec'], $this->field_config['subtotal']['symbol_grp'], $this->field_config['subtotal']['symbol_mon']); 
          nm_limpa_valor($this->subtotal, $this->field_config['subtotal']['symbol_dec'], $this->field_config['subtotal']['symbol_grp']) ; 
          if ('.' == substr($this->subtotal, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->subtotal, 1)))
              {
                  $this->subtotal = '';
              }
              else
              {
                  $this->subtotal = '0' . $this->subtotal;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->subtotal != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->subtotal) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "SubTotal: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['subtotal']))
                  {
                      $Campos_Erros['subtotal'] = array();
                  }
                  $Campos_Erros['subtotal'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['subtotal']) || !is_array($this->NM_ajax_info['errList']['subtotal']))
                  {
                      $this->NM_ajax_info['errList']['subtotal'] = array();
                  }
                  $this->NM_ajax_info['errList']['subtotal'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->subtotal, 10, 2, -0, 999999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "SubTotal; " ; 
                  if (!isset($Campos_Erros['subtotal']))
                  {
                      $Campos_Erros['subtotal'] = array();
                  }
                  $Campos_Erros['subtotal'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['subtotal']) || !is_array($this->NM_ajax_info['errList']['subtotal']))
                  {
                      $this->NM_ajax_info['errList']['subtotal'] = array();
                  }
                  $this->NM_ajax_info['errList']['subtotal'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'subtotal';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_subtotal

    function ValidateField_valoriva(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->valoriva === "" || is_null($this->valoriva))  
      { 
          $this->valoriva = 0;
          $this->sc_force_zero[] = 'valoriva';
      } 
      if (!empty($this->field_config['valoriva']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valoriva, $this->field_config['valoriva']['symbol_dec'], $this->field_config['valoriva']['symbol_grp'], $this->field_config['valoriva']['symbol_mon']); 
          nm_limpa_valor($this->valoriva, $this->field_config['valoriva']['symbol_dec'], $this->field_config['valoriva']['symbol_grp']) ; 
          if ('.' == substr($this->valoriva, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->valoriva, 1)))
              {
                  $this->valoriva = '';
              }
              else
              {
                  $this->valoriva = '0' . $this->valoriva;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->valoriva != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->valoriva) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valor IVA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valoriva']))
                  {
                      $Campos_Erros['valoriva'] = array();
                  }
                  $Campos_Erros['valoriva'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valoriva']) || !is_array($this->NM_ajax_info['errList']['valoriva']))
                  {
                      $this->NM_ajax_info['errList']['valoriva'] = array();
                  }
                  $this->NM_ajax_info['errList']['valoriva'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valoriva, 8, 2, -0, 9999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valor IVA; " ; 
                  if (!isset($Campos_Erros['valoriva']))
                  {
                      $Campos_Erros['valoriva'] = array();
                  }
                  $Campos_Erros['valoriva'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valoriva']) || !is_array($this->NM_ajax_info['errList']['valoriva']))
                  {
                      $this->NM_ajax_info['errList']['valoriva'] = array();
                  }
                  $this->NM_ajax_info['errList']['valoriva'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valoriva';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valoriva

    function ValidateField_total(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->total === "" || is_null($this->total))  
      { 
          $this->total = 0;
          $this->sc_force_zero[] = 'total';
      } 
      if (!empty($this->field_config['total']['symbol_dec']))
      {
          $this->sc_remove_currency($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp'], $this->field_config['total']['symbol_mon']); 
          nm_limpa_valor($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp']) ; 
          if ('.' == substr($this->total, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->total, 1)))
              {
                  $this->total = '';
              }
              else
              {
                  $this->total = '0' . $this->total;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->total != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->total) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Total: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['total']))
                  {
                      $Campos_Erros['total'] = array();
                  }
                  $Campos_Erros['total'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['total']) || !is_array($this->NM_ajax_info['errList']['total']))
                  {
                      $this->NM_ajax_info['errList']['total'] = array();
                  }
                  $this->NM_ajax_info['errList']['total'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->total, 10, 2, -0, 999999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Total; " ; 
                  if (!isset($Campos_Erros['total']))
                  {
                      $Campos_Erros['total'] = array();
                  }
                  $Campos_Erros['total'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['total']) || !is_array($this->NM_ajax_info['errList']['total']))
                  {
                      $this->NM_ajax_info['errList']['total'] = array();
                  }
                  $this->NM_ajax_info['errList']['total'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'total';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_total

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

    function ValidateField_vendedor(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->vendedor === "" || is_null($this->vendedor))  
      { 
          $this->vendedor = 0;
          $this->sc_force_zero[] = 'vendedor';
      } 
      nm_limpa_numero($this->vendedor, $this->field_config['vendedor']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->vendedor != '')  
          { 
              $iTestSize = 10;
              if (strlen($this->vendedor) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Vendedor: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['vendedor']))
                  {
                      $Campos_Erros['vendedor'] = array();
                  }
                  $Campos_Erros['vendedor'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['vendedor']) || !is_array($this->NM_ajax_info['errList']['vendedor']))
                  {
                      $this->NM_ajax_info['errList']['vendedor'] = array();
                  }
                  $this->NM_ajax_info['errList']['vendedor'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->vendedor, 10, 0, -0, 9999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Vendedor; " ; 
                  if (!isset($Campos_Erros['vendedor']))
                  {
                      $Campos_Erros['vendedor'] = array();
                  }
                  $Campos_Erros['vendedor'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['vendedor']) || !is_array($this->NM_ajax_info['errList']['vendedor']))
                  {
                      $this->NM_ajax_info['errList']['vendedor'] = array();
                  }
                  $this->NM_ajax_info['errList']['vendedor'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'vendedor';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_vendedor

    function ValidateField_numfacven(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->numfacven === "" || is_null($this->numfacven))  
      { 
          $this->numfacven = 0;
          $this->sc_force_zero[] = 'numfacven';
      } 
      nm_limpa_numero($this->numfacven, $this->field_config['numfacven']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->numfacven != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->numfacven) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Número: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['numfacven']))
                  {
                      $Campos_Erros['numfacven'] = array();
                  }
                  $Campos_Erros['numfacven'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['numfacven']) || !is_array($this->NM_ajax_info['errList']['numfacven']))
                  {
                      $this->NM_ajax_info['errList']['numfacven'] = array();
                  }
                  $this->NM_ajax_info['errList']['numfacven'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->numfacven, 20, 0, -0, 1.0E+20, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Número; " ; 
                  if (!isset($Campos_Erros['numfacven']))
                  {
                      $Campos_Erros['numfacven'] = array();
                  }
                  $Campos_Erros['numfacven'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['numfacven']) || !is_array($this->NM_ajax_info['errList']['numfacven']))
                  {
                      $this->NM_ajax_info['errList']['numfacven'] = array();
                  }
                  $this->NM_ajax_info['errList']['numfacven'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
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

    function ValidateField_idfacven(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idfacven === "" || is_null($this->idfacven))  
      { 
          $this->idfacven = 0;
      } 
      nm_limpa_numero($this->idfacven, $this->field_config['idfacven']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->idfacven != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->idfacven) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Idfacven: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['idfacven']))
                  {
                      $Campos_Erros['idfacven'] = array();
                  }
                  $Campos_Erros['idfacven'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['idfacven']) || !is_array($this->NM_ajax_info['errList']['idfacven']))
                  {
                      $this->NM_ajax_info['errList']['idfacven'] = array();
                  }
                  $this->NM_ajax_info['errList']['idfacven'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->idfacven, 20, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Idfacven; " ; 
                  if (!isset($Campos_Erros['idfacven']))
                  {
                      $Campos_Erros['idfacven'] = array();
                  }
                  $Campos_Erros['idfacven'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['idfacven']) || !is_array($this->NM_ajax_info['errList']['idfacven']))
                  {
                      $this->NM_ajax_info['errList']['idfacven'] = array();
                  }
                  $this->NM_ajax_info['errList']['idfacven'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idfacven';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idfacven

    function ValidateField_tipo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['php_cmp_required']['tipo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['php_cmp_required']['tipo'] == "on")) 
      { 
          if ($this->tipo == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Tipo" ; 
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
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tipo) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tipo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tipo']))
              {
                  $Campos_Erros['tipo'] = array();
              }
              $Campos_Erros['tipo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tipo']) || !is_array($this->NM_ajax_info['errList']['tipo']))
              {
                  $this->NM_ajax_info['errList']['tipo'] = array();
              }
              $this->NM_ajax_info['errList']['tipo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
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

    function ValidateField_detalle(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->detalle) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'detalle';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_detalle

    function ValidateField_id_clasificacion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->id_clasificacion) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_id_clasificacion']) && !in_array($this->id_clasificacion, $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_id_clasificacion']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_clasificacion']))
                   {
                       $Campos_Erros['id_clasificacion'] = array();
                   }
                   $Campos_Erros['id_clasificacion'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_clasificacion']) || !is_array($this->NM_ajax_info['errList']['id_clasificacion']))
                   {
                       $this->NM_ajax_info['errList']['id_clasificacion'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_clasificacion'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_clasificacion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_clasificacion

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
    $this->nmgp_dados_form['resolucion'] = $this->resolucion;
    $this->nmgp_dados_form['formapago'] = $this->formapago;
    $this->nmgp_dados_form['fechaven'] = (strlen(trim($this->fechaven)) > 19) ? str_replace(".", ":", $this->fechaven) : trim($this->fechaven);
    $this->nmgp_dados_form['credito'] = $this->credito;
    $this->nmgp_dados_form['dias_decredito'] = $this->dias_decredito;
    $this->nmgp_dados_form['idcli'] = $this->idcli;
    $this->nmgp_dados_form['dircliente'] = $this->dircliente;
    $this->nmgp_dados_form['subtotal'] = $this->subtotal;
    $this->nmgp_dados_form['valoriva'] = $this->valoriva;
    $this->nmgp_dados_form['total'] = $this->total;
    $this->nmgp_dados_form['observaciones'] = $this->observaciones;
    $this->nmgp_dados_form['vendedor'] = $this->vendedor;
    $this->nmgp_dados_form['numfacven'] = $this->numfacven;
    $this->nmgp_dados_form['idfacven'] = $this->idfacven;
    $this->nmgp_dados_form['tipo'] = $this->tipo;
    $this->nmgp_dados_form['detalle'] = $this->detalle;
    $this->nmgp_dados_form['id_clasificacion'] = $this->id_clasificacion;
    $this->nmgp_dados_form['nremision'] = $this->nremision;
    $this->nmgp_dados_form['fechavenc'] = $this->fechavenc;
    $this->nmgp_dados_form['pagada'] = $this->pagada;
    $this->nmgp_dados_form['asentada'] = $this->asentada;
    $this->nmgp_dados_form['saldo'] = $this->saldo;
    $this->nmgp_dados_form['adicional'] = $this->adicional;
    $this->nmgp_dados_form['adicional2'] = $this->adicional2;
    $this->nmgp_dados_form['adicional3'] = $this->adicional3;
    $this->nmgp_dados_form['obspago'] = $this->obspago;
    $this->nmgp_dados_form['pedido'] = $this->pedido;
    $this->nmgp_dados_form['imconsumo'] = $this->imconsumo;
    $this->nmgp_dados_form['retefuente'] = $this->retefuente;
    $this->nmgp_dados_form['reteiva'] = $this->reteiva;
    $this->nmgp_dados_form['reteica'] = $this->reteica;
    $this->nmgp_dados_form['cree'] = $this->cree;
    $this->nmgp_dados_form['espos'] = $this->espos;
    $this->nmgp_dados_form['cufe'] = $this->cufe;
    $this->nmgp_dados_form['enlacepdf'] = $this->enlacepdf;
    $this->nmgp_dados_form['estado'] = $this->estado;
    $this->nmgp_dados_form['avisos'] = $this->avisos;
    $this->nmgp_dados_form['banco'] = $this->banco;
    $this->nmgp_dados_form['id_fact'] = $this->id_fact;
    $this->nmgp_dados_form['enviada_a_tns'] = $this->enviada_a_tns;
    $this->nmgp_dados_form['fecha_a_tns'] = $this->fecha_a_tns;
    $this->nmgp_dados_form['factura_tns'] = $this->factura_tns;
    $this->nmgp_dados_form['creado_en_movil'] = $this->creado_en_movil;
    $this->nmgp_dados_form['disponible_en_movil'] = $this->disponible_en_movil;
    $this->nmgp_dados_form['mot_nc'] = $this->mot_nc;
    $this->nmgp_dados_form['mot_nd'] = $this->mot_nd;
    $this->nmgp_dados_form['creado'] = $this->creado;
    $this->nmgp_dados_form['editado'] = $this->editado;
    $this->nmgp_dados_form['usuario_crea'] = $this->usuario_crea;
    $this->nmgp_dados_form['cod_cuenta'] = $this->cod_cuenta;
    $this->nmgp_dados_form['qr_base64'] = $this->qr_base64;
    $this->nmgp_dados_form['fecha_validacion'] = $this->fecha_validacion;
    $this->nmgp_dados_form['id_trans_fe'] = $this->id_trans_fe;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['fechaven'] = $this->fechaven;
      nm_limpa_data($this->fechaven, $this->field_config['fechaven']['date_sep']) ; 
      $this->Before_unformat['dias_decredito'] = $this->dias_decredito;
      nm_limpa_numero($this->dias_decredito, $this->field_config['dias_decredito']['symbol_grp']) ; 
      $this->Before_unformat['subtotal'] = $this->subtotal;
      if (!empty($this->field_config['subtotal']['symbol_dec']))
      {
         $this->sc_remove_currency($this->subtotal, $this->field_config['subtotal']['symbol_dec'], $this->field_config['subtotal']['symbol_grp'], $this->field_config['subtotal']['symbol_mon']);
         nm_limpa_valor($this->subtotal, $this->field_config['subtotal']['symbol_dec'], $this->field_config['subtotal']['symbol_grp']);
      }
      $this->Before_unformat['valoriva'] = $this->valoriva;
      if (!empty($this->field_config['valoriva']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valoriva, $this->field_config['valoriva']['symbol_dec'], $this->field_config['valoriva']['symbol_grp'], $this->field_config['valoriva']['symbol_mon']);
         nm_limpa_valor($this->valoriva, $this->field_config['valoriva']['symbol_dec'], $this->field_config['valoriva']['symbol_grp']);
      }
      $this->Before_unformat['total'] = $this->total;
      if (!empty($this->field_config['total']['symbol_dec']))
      {
         $this->sc_remove_currency($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp'], $this->field_config['total']['symbol_mon']);
         nm_limpa_valor($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp']);
      }
      $this->Before_unformat['vendedor'] = $this->vendedor;
      nm_limpa_numero($this->vendedor, $this->field_config['vendedor']['symbol_grp']) ; 
      $this->Before_unformat['numfacven'] = $this->numfacven;
      nm_limpa_numero($this->numfacven, $this->field_config['numfacven']['symbol_grp']) ; 
      $this->Before_unformat['idfacven'] = $this->idfacven;
      nm_limpa_numero($this->idfacven, $this->field_config['idfacven']['symbol_grp']) ; 
      $this->Before_unformat['nremision'] = $this->nremision;
      nm_limpa_numero($this->nremision, $this->field_config['nremision']['symbol_grp']) ; 
      $this->Before_unformat['fechavenc'] = $this->fechavenc;
      nm_limpa_data($this->fechavenc, $this->field_config['fechavenc']['date_sep']) ; 
      $this->Before_unformat['asentada'] = $this->asentada;
      nm_limpa_numero($this->asentada, $this->field_config['asentada']['symbol_grp']) ; 
      $this->Before_unformat['saldo'] = $this->saldo;
      if (!empty($this->field_config['saldo']['symbol_dec']))
      {
         $this->sc_remove_currency($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp'], $this->field_config['saldo']['symbol_mon']);
         nm_limpa_valor($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp']);
      }
      $this->Before_unformat['adicional'] = $this->adicional;
      nm_limpa_numero($this->adicional, $this->field_config['adicional']['symbol_grp']) ; 
      $this->Before_unformat['adicional2'] = $this->adicional2;
      nm_limpa_numero($this->adicional2, $this->field_config['adicional2']['symbol_grp']) ; 
      $this->Before_unformat['adicional3'] = $this->adicional3;
      nm_limpa_numero($this->adicional3, $this->field_config['adicional3']['symbol_grp']) ; 
      $this->Before_unformat['pedido'] = $this->pedido;
      nm_limpa_numero($this->pedido, $this->field_config['pedido']['symbol_grp']) ; 
      $this->Before_unformat['imconsumo'] = $this->imconsumo;
      if (!empty($this->field_config['imconsumo']['symbol_dec']))
      {
         nm_limpa_valor($this->imconsumo, $this->field_config['imconsumo']['symbol_dec'], $this->field_config['imconsumo']['symbol_grp']);
      }
      $this->Before_unformat['retefuente'] = $this->retefuente;
      if (!empty($this->field_config['retefuente']['symbol_dec']))
      {
         nm_limpa_valor($this->retefuente, $this->field_config['retefuente']['symbol_dec'], $this->field_config['retefuente']['symbol_grp']);
      }
      $this->Before_unformat['reteiva'] = $this->reteiva;
      if (!empty($this->field_config['reteiva']['symbol_dec']))
      {
         nm_limpa_valor($this->reteiva, $this->field_config['reteiva']['symbol_dec'], $this->field_config['reteiva']['symbol_grp']);
      }
      $this->Before_unformat['reteica'] = $this->reteica;
      if (!empty($this->field_config['reteica']['symbol_dec']))
      {
         nm_limpa_valor($this->reteica, $this->field_config['reteica']['symbol_dec'], $this->field_config['reteica']['symbol_grp']);
      }
      $this->Before_unformat['cree'] = $this->cree;
      if (!empty($this->field_config['cree']['symbol_dec']))
      {
         nm_limpa_valor($this->cree, $this->field_config['cree']['symbol_dec'], $this->field_config['cree']['symbol_grp']);
      }
      $this->Before_unformat['banco'] = $this->banco;
      nm_limpa_numero($this->banco, $this->field_config['banco']['symbol_grp']) ; 
      $this->Before_unformat['id_fact'] = $this->id_fact;
      nm_limpa_numero($this->id_fact, $this->field_config['id_fact']['symbol_grp']) ; 
      $this->Before_unformat['fecha_a_tns'] = $this->fecha_a_tns;
      $this->Before_unformat['fecha_a_tns_hora'] = $this->fecha_a_tns_hora;
      nm_limpa_data($this->fecha_a_tns, $this->field_config['fecha_a_tns']['date_sep']) ; 
      nm_limpa_hora($this->fecha_a_tns_hora, $this->field_config['fecha_a_tns']['time_sep']) ; 
      $this->Before_unformat['creado'] = $this->creado;
      $this->Before_unformat['creado_hora'] = $this->creado_hora;
      nm_limpa_data($this->creado, $this->field_config['creado']['date_sep']) ; 
      nm_limpa_hora($this->creado_hora, $this->field_config['creado']['time_sep']) ; 
      $this->Before_unformat['editado'] = $this->editado;
      $this->Before_unformat['editado_hora'] = $this->editado_hora;
      nm_limpa_data($this->editado, $this->field_config['editado']['date_sep']) ; 
      nm_limpa_hora($this->editado_hora, $this->field_config['editado']['time_sep']) ; 
      $this->Before_unformat['usuario_crea'] = $this->usuario_crea;
      nm_limpa_numero($this->usuario_crea, $this->field_config['usuario_crea']['symbol_grp']) ; 
      $this->Before_unformat['fecha_validacion'] = $this->fecha_validacion;
      $this->Before_unformat['fecha_validacion_hora'] = $this->fecha_validacion_hora;
      nm_limpa_data($this->fecha_validacion, $this->field_config['fecha_validacion']['date_sep']) ; 
      nm_limpa_hora($this->fecha_validacion_hora, $this->field_config['fecha_validacion']['time_sep']) ; 
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
      if ($Nome_Campo == "dias_decredito")
      {
          nm_limpa_numero($this->dias_decredito, $this->field_config['dias_decredito']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "subtotal")
      {
          if (!empty($this->field_config['subtotal']['symbol_dec']))
          {
             $this->sc_remove_currency($this->subtotal, $this->field_config['subtotal']['symbol_dec'], $this->field_config['subtotal']['symbol_grp'], $this->field_config['subtotal']['symbol_mon']);
             nm_limpa_valor($this->subtotal, $this->field_config['subtotal']['symbol_dec'], $this->field_config['subtotal']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "valoriva")
      {
          if (!empty($this->field_config['valoriva']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valoriva, $this->field_config['valoriva']['symbol_dec'], $this->field_config['valoriva']['symbol_grp'], $this->field_config['valoriva']['symbol_mon']);
             nm_limpa_valor($this->valoriva, $this->field_config['valoriva']['symbol_dec'], $this->field_config['valoriva']['symbol_grp']);
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
      if ($Nome_Campo == "vendedor")
      {
          nm_limpa_numero($this->vendedor, $this->field_config['vendedor']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "numfacven")
      {
          nm_limpa_numero($this->numfacven, $this->field_config['numfacven']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "idfacven")
      {
          nm_limpa_numero($this->idfacven, $this->field_config['idfacven']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "nremision")
      {
          nm_limpa_numero($this->nremision, $this->field_config['nremision']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "asentada")
      {
          nm_limpa_numero($this->asentada, $this->field_config['asentada']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "saldo")
      {
          if (!empty($this->field_config['saldo']['symbol_dec']))
          {
             $this->sc_remove_currency($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp'], $this->field_config['saldo']['symbol_mon']);
             nm_limpa_valor($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "adicional")
      {
          nm_limpa_numero($this->adicional, $this->field_config['adicional']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "adicional2")
      {
          nm_limpa_numero($this->adicional2, $this->field_config['adicional2']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "adicional3")
      {
          nm_limpa_numero($this->adicional3, $this->field_config['adicional3']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "pedido")
      {
          nm_limpa_numero($this->pedido, $this->field_config['pedido']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "imconsumo")
      {
          if (!empty($this->field_config['imconsumo']['symbol_dec']))
          {
             nm_limpa_valor($this->imconsumo, $this->field_config['imconsumo']['symbol_dec'], $this->field_config['imconsumo']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "retefuente")
      {
          if (!empty($this->field_config['retefuente']['symbol_dec']))
          {
             nm_limpa_valor($this->retefuente, $this->field_config['retefuente']['symbol_dec'], $this->field_config['retefuente']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "reteiva")
      {
          if (!empty($this->field_config['reteiva']['symbol_dec']))
          {
             nm_limpa_valor($this->reteiva, $this->field_config['reteiva']['symbol_dec'], $this->field_config['reteiva']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "reteica")
      {
          if (!empty($this->field_config['reteica']['symbol_dec']))
          {
             nm_limpa_valor($this->reteica, $this->field_config['reteica']['symbol_dec'], $this->field_config['reteica']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "cree")
      {
          if (!empty($this->field_config['cree']['symbol_dec']))
          {
             nm_limpa_valor($this->cree, $this->field_config['cree']['symbol_dec'], $this->field_config['cree']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "banco")
      {
          nm_limpa_numero($this->banco, $this->field_config['banco']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_fact")
      {
          nm_limpa_numero($this->id_fact, $this->field_config['id_fact']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "usuario_crea")
      {
          nm_limpa_numero($this->usuario_crea, $this->field_config['usuario_crea']['symbol_grp']) ; 
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
      if ((!empty($this->fechaven) && 'null' != $this->fechaven) || (!empty($format_fields) && isset($format_fields['fechaven'])))
      {
          nm_volta_data($this->fechaven, $this->field_config['fechaven']['date_format']) ; 
          nmgp_Form_Datas($this->fechaven, $this->field_config['fechaven']['date_format'], $this->field_config['fechaven']['date_sep']) ;  
      }
      elseif ('null' == $this->fechaven || '' == $this->fechaven)
      {
          $this->fechaven = '';
      }
      if ('' !== $this->dias_decredito || (!empty($format_fields) && isset($format_fields['dias_decredito'])))
      {
          nmgp_Form_Num_Val($this->dias_decredito, $this->field_config['dias_decredito']['symbol_grp'], $this->field_config['dias_decredito']['symbol_dec'], "0", "S", $this->field_config['dias_decredito']['format_neg'], "", "", "-", $this->field_config['dias_decredito']['symbol_fmt']) ; 
      }
      if ('' !== $this->subtotal || (!empty($format_fields) && isset($format_fields['subtotal'])))
      {
          nmgp_Form_Num_Val($this->subtotal, $this->field_config['subtotal']['symbol_grp'], $this->field_config['subtotal']['symbol_dec'], "2", "S", $this->field_config['subtotal']['format_neg'], "", "", "-", $this->field_config['subtotal']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['subtotal']['symbol_mon'];
          $this->sc_add_currency($this->subtotal, $sMonSymb, $this->field_config['subtotal']['format_pos']); 
      }
      if ('' !== $this->valoriva || (!empty($format_fields) && isset($format_fields['valoriva'])))
      {
          nmgp_Form_Num_Val($this->valoriva, $this->field_config['valoriva']['symbol_grp'], $this->field_config['valoriva']['symbol_dec'], "2", "S", $this->field_config['valoriva']['format_neg'], "", "", "-", $this->field_config['valoriva']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['valoriva']['symbol_mon'];
          $this->sc_add_currency($this->valoriva, $sMonSymb, $this->field_config['valoriva']['format_pos']); 
      }
      if ('' !== $this->total || (!empty($format_fields) && isset($format_fields['total'])))
      {
          nmgp_Form_Num_Val($this->total, $this->field_config['total']['symbol_grp'], $this->field_config['total']['symbol_dec'], "2", "S", $this->field_config['total']['format_neg'], "", "", "-", $this->field_config['total']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['total']['symbol_mon'];
          $this->sc_add_currency($this->total, $sMonSymb, $this->field_config['total']['format_pos']); 
      }
      if ('' !== $this->vendedor || (!empty($format_fields) && isset($format_fields['vendedor'])))
      {
          nmgp_Form_Num_Val($this->vendedor, $this->field_config['vendedor']['symbol_grp'], $this->field_config['vendedor']['symbol_dec'], "0", "S", $this->field_config['vendedor']['format_neg'], "", "", "-", $this->field_config['vendedor']['symbol_fmt']) ; 
      }
      if ('' !== $this->numfacven || (!empty($format_fields) && isset($format_fields['numfacven'])))
      {
          nmgp_Form_Num_Val($this->numfacven, $this->field_config['numfacven']['symbol_grp'], $this->field_config['numfacven']['symbol_dec'], "0", "S", $this->field_config['numfacven']['format_neg'], "", "", "-", $this->field_config['numfacven']['symbol_fmt']) ; 
      }
      if ('' !== $this->idfacven || (!empty($format_fields) && isset($format_fields['idfacven'])))
      {
          nmgp_Form_Num_Val($this->idfacven, $this->field_config['idfacven']['symbol_grp'], $this->field_config['idfacven']['symbol_dec'], "0", "S", $this->field_config['idfacven']['format_neg'], "", "", "-", $this->field_config['idfacven']['symbol_fmt']) ; 
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
      $guarda_format_hora = $this->field_config['fechaven']['date_format'];
      if ($this->fechaven != "")  
      { 
          nm_conv_data($this->fechaven, $this->field_config['fechaven']['date_format']) ; 
          $this->fechaven_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fechaven_hora = substr($this->fechaven_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fechaven_hora = substr($this->fechaven_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fechaven_hora = substr($this->fechaven_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fechaven_hora = substr($this->fechaven_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fechaven_hora = substr($this->fechaven_hora, 0, -4);
          }
      } 
      if ($this->fechaven == "" && $use_null)  
      { 
          $this->fechaven = "null" ; 
      } 
      $this->field_config['fechaven']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_resolucion();
          $this->ajax_return_values_formapago();
          $this->ajax_return_values_fechaven();
          $this->ajax_return_values_credito();
          $this->ajax_return_values_dias_decredito();
          $this->ajax_return_values_idcli();
          $this->ajax_return_values_dircliente();
          $this->ajax_return_values_subtotal();
          $this->ajax_return_values_valoriva();
          $this->ajax_return_values_total();
          $this->ajax_return_values_observaciones();
          $this->ajax_return_values_vendedor();
          $this->ajax_return_values_numfacven();
          $this->ajax_return_values_idfacven();
          $this->ajax_return_values_tipo();
          $this->ajax_return_values_detalle();
          $this->ajax_return_values_id_clasificacion();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idfacven']['keyVal'] = form_facturaven_automaticas_mob_pack_protect_string($this->nmgp_dados_form['idfacven']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['form_facturaven_automaticas_detalleventa_mob_script_case_init'] ]['form_facturaven_automaticas_detalleventa_mob']['foreign_key']['numfac'] = $this->nmgp_dados_form['idfacven'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['form_facturaven_automaticas_detalleventa_mob_script_case_init'] ]['form_facturaven_automaticas_detalleventa_mob']['where_filter'] = "numfac = " . $this->nmgp_dados_form['idfacven'] . "";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['form_facturaven_automaticas_detalleventa_mob_script_case_init'] ]['form_facturaven_automaticas_detalleventa_mob']['where_detal']  = "numfac = " . $this->nmgp_dados_form['idfacven'] . "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['form_facturaven_automaticas_detalleventa_mob_script_case_init'] ]['form_facturaven_automaticas_detalleventa_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['form_facturaven_automaticas_detalleventa_mob_script_case_init'] ]['form_facturaven_automaticas_detalleventa_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['form_facturaven_automaticas_detalleventa_mob_script_case_init'] ]['form_facturaven_automaticas_detalleventa_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['form_facturaven_automaticas_detalleventa_mob_script_case_init'] ]['form_facturaven_automaticas_detalleventa_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['form_facturaven_automaticas_detalleventa_mob_script_case_init'] ]['form_facturaven_automaticas_detalleventa'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['form_facturaven_automaticas_detalleventa_mob_script_case_init'] ]['form_facturaven_automaticas_detalleventa_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['form_facturaven_automaticas_detalleventa_mob_script_case_init'] ]['form_facturaven_automaticas_detalleventa_mob']['total']);
              }
          }
   } // ajax_return_values

          //----- resolucion
   function ajax_return_values_resolucion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("resolucion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->resolucion);
              $aLookup = array();
              $this->_tmp_lookup_resolucion = $this->resolucion;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_resolucion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_resolucion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_resolucion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_resolucion'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_vendedor = $this->vendedor;
   $old_value_numfacven = $this->numfacven;
   $old_value_idfacven = $this->idfacven;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_vendedor = $this->vendedor;
   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_idfacven = $this->idfacven;

   $nm_comando = "SELECT Idres, prefijo  FROM resdian  WHERE activa='SI' ORDER BY prefijo";

   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->vendedor = $old_value_vendedor;
   $this->numfacven = $old_value_numfacven;
   $this->idfacven = $old_value_idfacven;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_facturaven_automaticas_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_facturaven_automaticas_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_resolucion'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['resolucion']['valList'][$i] = form_facturaven_automaticas_mob_pack_protect_string($v);
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

          //----- formapago
   function ajax_return_values_formapago($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("formapago", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->formapago);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['formapago'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fechaven
   function ajax_return_values_fechaven($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fechaven", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fechaven);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fechaven'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
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

$aLookup[] = array(form_facturaven_automaticas_mob_pack_protect_string('1') => str_replace('<', '&lt;',form_facturaven_automaticas_mob_pack_protect_string("Crédito")));
$aLookup[] = array(form_facturaven_automaticas_mob_pack_protect_string('2') => str_replace('<', '&lt;',form_facturaven_automaticas_mob_pack_protect_string("Contado")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_credito'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_credito'][] = '2';
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
              $this->NM_ajax_info['fldList']['credito']['valList'][$i] = form_facturaven_automaticas_mob_pack_protect_string($v);
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

          //----- dias_decredito
   function ajax_return_values_dias_decredito($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dias_decredito", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->dias_decredito);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['dias_decredito'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- idcli
   function ajax_return_values_idcli($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idcli", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idcli);
              $aLookup = array();
              $this->_tmp_lookup_idcli = $this->idcli;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_idcli']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_idcli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_idcli']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_idcli'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_vendedor = $this->vendedor;
   $old_value_numfacven = $this->numfacven;
   $old_value_idfacven = $this->idfacven;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_vendedor = $this->vendedor;
   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_idfacven = $this->idfacven;

   $nm_comando = "SELECT idtercero, nombres  FROM terceros  ORDER BY nombres";

   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->vendedor = $old_value_vendedor;
   $this->numfacven = $old_value_numfacven;
   $this->idfacven = $old_value_idfacven;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_facturaven_automaticas_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_facturaven_automaticas_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_idcli'][] = $rs->fields[0];
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
          $sSelComp = "name=\"idcli\"";
          if (isset($this->NM_ajax_info['select_html']['idcli']) && !empty($this->NM_ajax_info['select_html']['idcli']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['idcli']);
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

                  if ($this->idcli == $sValue)
                  {
                      $this->_tmp_lookup_idcli = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['idcli'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idcli']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idcli']['valList'][$i] = form_facturaven_automaticas_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idcli']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idcli']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idcli']['labList'] = $aLabel;
          }
   }

          //----- dircliente
   function ajax_return_values_dircliente($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dircliente", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->dircliente);
              $aLookup = array();
              $this->_tmp_lookup_dircliente = $this->dircliente;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_dircliente']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_dircliente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_dircliente']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_dircliente'] = array(); 
}
if ($this->idcli != "")
{ 
   $this->nm_clear_val("idcli");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_vendedor = $this->vendedor;
   $old_value_numfacven = $this->numfacven;
   $old_value_idfacven = $this->idfacven;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_vendedor = $this->vendedor;
   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_idfacven = $this->idfacven;

   $nm_comando = "SELECT iddireccion, direc FROM direccion  WHERE idter='$this->idcli' ORDER BY direc";

   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->vendedor = $old_value_vendedor;
   $this->numfacven = $old_value_numfacven;
   $this->idfacven = $old_value_idfacven;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_facturaven_automaticas_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_facturaven_automaticas_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_dircliente'][] = $rs->fields[0];
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
          $sSelComp = "name=\"dircliente\"";
          if (isset($this->NM_ajax_info['select_html']['dircliente']) && !empty($this->NM_ajax_info['select_html']['dircliente']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['dircliente']);
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

                  if ($this->dircliente == $sValue)
                  {
                      $this->_tmp_lookup_dircliente = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['dircliente'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['dircliente']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['dircliente']['valList'][$i] = form_facturaven_automaticas_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['dircliente']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['dircliente']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['dircliente']['labList'] = $aLabel;
          }
   }

          //----- subtotal
   function ajax_return_values_subtotal($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("subtotal", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->subtotal);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['subtotal'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- valoriva
   function ajax_return_values_valoriva($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valoriva", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valoriva);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valoriva'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- total
   function ajax_return_values_total($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("total", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->total);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['total'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
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

          //----- vendedor
   function ajax_return_values_vendedor($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("vendedor", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->vendedor);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['vendedor'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- numfacven
   function ajax_return_values_numfacven($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numfacven", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numfacven);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numfacven'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- idfacven
   function ajax_return_values_idfacven($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idfacven", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idfacven);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idfacven'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("idfacven", $this->form_encode_input($sTmpValue))),
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
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tipo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- detalle
   function ajax_return_values_detalle($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("detalle", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->detalle);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['detalle'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- id_clasificacion
   function ajax_return_values_id_clasificacion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_clasificacion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_clasificacion);
              $aLookup = array();
              $this->_tmp_lookup_id_clasificacion = $this->id_clasificacion;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_id_clasificacion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_id_clasificacion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_id_clasificacion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_id_clasificacion'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_vendedor = $this->vendedor;
   $old_value_numfacven = $this->numfacven;
   $old_value_idfacven = $this->idfacven;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_vendedor = $this->vendedor;
   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_idfacven = $this->idfacven;

   $nm_comando = "SELECT id, descripcion  FROM facturaven_clasificacion  ORDER BY descripcion";

   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->vendedor = $old_value_vendedor;
   $this->numfacven = $old_value_numfacven;
   $this->idfacven = $old_value_idfacven;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_facturaven_automaticas_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_facturaven_automaticas_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_id_clasificacion'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_clasificacion\"";
          if (isset($this->NM_ajax_info['select_html']['id_clasificacion']) && !empty($this->NM_ajax_info['select_html']['id_clasificacion']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_clasificacion']);
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

                  if ($this->id_clasificacion == $sValue)
                  {
                      $this->_tmp_lookup_id_clasificacion = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_clasificacion'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_clasificacion']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_clasificacion']['valList'][$i] = form_facturaven_automaticas_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_clasificacion']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_clasificacion']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_clasificacion']['labList'] = $aLabel;
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['upload_dir'][$fieldName][] = $newName;
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
      $this->subtotal = str_replace($sc_parm1, $sc_parm2, $this->subtotal); 
      $this->valoriva = str_replace($sc_parm1, $sc_parm2, $this->valoriva); 
      $this->total = str_replace($sc_parm1, $sc_parm2, $this->total); 
      $this->saldo = str_replace($sc_parm1, $sc_parm2, $this->saldo); 
      $this->imconsumo = str_replace($sc_parm1, $sc_parm2, $this->imconsumo); 
      $this->retefuente = str_replace($sc_parm1, $sc_parm2, $this->retefuente); 
      $this->reteiva = str_replace($sc_parm1, $sc_parm2, $this->reteiva); 
      $this->reteica = str_replace($sc_parm1, $sc_parm2, $this->reteica); 
      $this->cree = str_replace($sc_parm1, $sc_parm2, $this->cree); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->subtotal = "'" . $this->subtotal . "'";
      $this->valoriva = "'" . $this->valoriva . "'";
      $this->total = "'" . $this->total . "'";
      $this->saldo = "'" . $this->saldo . "'";
      $this->imconsumo = "'" . $this->imconsumo . "'";
      $this->retefuente = "'" . $this->retefuente . "'";
      $this->reteiva = "'" . $this->reteiva . "'";
      $this->reteica = "'" . $this->reteica . "'";
      $this->cree = "'" . $this->cree . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->subtotal = str_replace("'", "", $this->subtotal); 
      $this->valoriva = str_replace("'", "", $this->valoriva); 
      $this->total = str_replace("'", "", $this->total); 
      $this->saldo = str_replace("'", "", $this->saldo); 
      $this->imconsumo = str_replace("'", "", $this->imconsumo); 
      $this->retefuente = str_replace("'", "", $this->retefuente); 
      $this->reteiva = str_replace("'", "", $this->reteiva); 
      $this->reteica = str_replace("'", "", $this->reteica); 
      $this->cree = str_replace("'", "", $this->cree); 
   } 
//----------- 

   function controle_navegacao()
   {
      global $sc_where;

          if (false && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['total']))
          {
               $sc_where_pos = " WHERE ((idfacven < $this->idfacven))";
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
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['total'] = $rsc->fields[0];
               $rsc->Close(); 
               if ('' != $this->idfacven)
               {
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['inicio'] = $rsc->fields[0];
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['inicio'] < 0)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['inicio'] = 0;
               }
               $rsc->Close(); 
               }
               else
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['inicio'] = 0;
               }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['qt_reg_grid'] = 1;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['inicio']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['inicio'] = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['final']  = 0;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['opcao'] = $this->NM_ajax_info['param']['nmgp_opcao'];
          if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['opcao'], array('incluir', 'alterar', 'excluir')))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['opcao'] = '';
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['opcao'] == 'inicio')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['inicio'] = 0;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['opcao'] == 'retorna')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['inicio'] = 0 ;
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['opcao'] == 'avanca' && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['total']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['total'] > $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['final']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['final'];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['opcao'] == 'final')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['inicio'] = 0;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['final'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['qt_reg_grid'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['final'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['opcao'] = '';

   }
   function return_after_insert()
   {
      global $sc_where;
      $sc_where_pos = " WHERE ((idfacven < $this->idfacven))";
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
      if ('' != $this->idfacven)
      {
          $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count;
          $rsc = $this->Db->Execute($nmgp_sel_count);
          if ($rsc === false && !$rsc->EOF)
          {
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
              exit;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['reg_start'] = $rsc->fields[0];
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
      $_SESSION['scriptcase']['form_facturaven_automaticas_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_numfacven = $this->numfacven;
    $original_resolucion = $this->resolucion;
}
 $vsql="select numfacven from facturaven_automaticas where resolucion='".$this->resolucion ."' ORDER BY idfacven desc limit 1";
 
      $nm_select = $vsql; 
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
if(!empty($this->vnum[0][0]))
{
	$this->numfacven =$this->vnum[0][0]+1;
}
else
{
	$vsql = "select primerfactura from resdian where Idres='".$this->resolucion ."'";
	 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vNum2 = array();
      $this->vnum2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vNum2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vnum2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vNum2 = false;
          $this->vNum2_erro = $this->Db->ErrorMsg();
          $this->vnum2 = false;
          $this->vnum2_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->vnum2[0][0]))
	{
		$this->numfacven  = $this->vnum2[0][0];
	}
	else
	{
		$this->numfacven =1;
	}
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_numfacven != $this->numfacven || (isset($bFlagRead_numfacven) && $bFlagRead_numfacven)))
    {
        $this->ajax_return_values_numfacven(true);
    }
    if (($original_resolucion != $this->resolucion || (isset($bFlagRead_resolucion) && $bFlagRead_resolucion)))
    {
        $this->ajax_return_values_resolucion(true);
    }
}
$_SESSION['scriptcase']['form_facturaven_automaticas_mob']['contr_erro'] = 'off'; 
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
      $NM_val_form['resolucion'] = $this->resolucion;
      $NM_val_form['formapago'] = $this->formapago;
      $NM_val_form['fechaven'] = $this->fechaven;
      $NM_val_form['credito'] = $this->credito;
      $NM_val_form['dias_decredito'] = $this->dias_decredito;
      $NM_val_form['idcli'] = $this->idcli;
      $NM_val_form['dircliente'] = $this->dircliente;
      $NM_val_form['subtotal'] = $this->subtotal;
      $NM_val_form['valoriva'] = $this->valoriva;
      $NM_val_form['total'] = $this->total;
      $NM_val_form['observaciones'] = $this->observaciones;
      $NM_val_form['vendedor'] = $this->vendedor;
      $NM_val_form['numfacven'] = $this->numfacven;
      $NM_val_form['idfacven'] = $this->idfacven;
      $NM_val_form['tipo'] = $this->tipo;
      $NM_val_form['detalle'] = $this->detalle;
      $NM_val_form['id_clasificacion'] = $this->id_clasificacion;
      $NM_val_form['nremision'] = $this->nremision;
      $NM_val_form['fechavenc'] = $this->fechavenc;
      $NM_val_form['pagada'] = $this->pagada;
      $NM_val_form['asentada'] = $this->asentada;
      $NM_val_form['saldo'] = $this->saldo;
      $NM_val_form['adicional'] = $this->adicional;
      $NM_val_form['adicional2'] = $this->adicional2;
      $NM_val_form['adicional3'] = $this->adicional3;
      $NM_val_form['obspago'] = $this->obspago;
      $NM_val_form['pedido'] = $this->pedido;
      $NM_val_form['imconsumo'] = $this->imconsumo;
      $NM_val_form['retefuente'] = $this->retefuente;
      $NM_val_form['reteiva'] = $this->reteiva;
      $NM_val_form['reteica'] = $this->reteica;
      $NM_val_form['cree'] = $this->cree;
      $NM_val_form['espos'] = $this->espos;
      $NM_val_form['cufe'] = $this->cufe;
      $NM_val_form['enlacepdf'] = $this->enlacepdf;
      $NM_val_form['estado'] = $this->estado;
      $NM_val_form['avisos'] = $this->avisos;
      $NM_val_form['banco'] = $this->banco;
      $NM_val_form['id_fact'] = $this->id_fact;
      $NM_val_form['enviada_a_tns'] = $this->enviada_a_tns;
      $NM_val_form['fecha_a_tns'] = $this->fecha_a_tns;
      $NM_val_form['factura_tns'] = $this->factura_tns;
      $NM_val_form['creado_en_movil'] = $this->creado_en_movil;
      $NM_val_form['disponible_en_movil'] = $this->disponible_en_movil;
      $NM_val_form['mot_nc'] = $this->mot_nc;
      $NM_val_form['mot_nd'] = $this->mot_nd;
      $NM_val_form['creado'] = $this->creado;
      $NM_val_form['editado'] = $this->editado;
      $NM_val_form['usuario_crea'] = $this->usuario_crea;
      $NM_val_form['cod_cuenta'] = $this->cod_cuenta;
      $NM_val_form['qr_base64'] = $this->qr_base64;
      $NM_val_form['fecha_validacion'] = $this->fecha_validacion;
      $NM_val_form['id_trans_fe'] = $this->id_trans_fe;
      if ($this->idfacven === "" || is_null($this->idfacven))  
      { 
          $this->idfacven = 0;
      } 
      if ($this->numfacven === "" || is_null($this->numfacven))  
      { 
          $this->numfacven = 0;
          $this->sc_force_zero[] = 'numfacven';
      } 
      if ($this->nremision === "" || is_null($this->nremision))  
      { 
          $this->nremision = 0;
          $this->sc_force_zero[] = 'nremision';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->credito === "" || is_null($this->credito))  
      { 
          $this->credito = 0;
          $this->sc_force_zero[] = 'credito';
      } 
      }
      if ($this->idcli === "" || is_null($this->idcli))  
      { 
          $this->idcli = 0;
          $this->sc_force_zero[] = 'idcli';
      } 
      if ($this->subtotal === "" || is_null($this->subtotal))  
      { 
          $this->subtotal = 0;
          $this->sc_force_zero[] = 'subtotal';
      } 
      if ($this->valoriva === "" || is_null($this->valoriva))  
      { 
          $this->valoriva = 0;
          $this->sc_force_zero[] = 'valoriva';
      } 
      if ($this->total === "" || is_null($this->total))  
      { 
          $this->total = 0;
          $this->sc_force_zero[] = 'total';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->asentada === "" || is_null($this->asentada))  
      { 
          $this->asentada = 0;
          $this->sc_force_zero[] = 'asentada';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->saldo === "" || is_null($this->saldo))  
      { 
          $this->saldo = 0;
          $this->sc_force_zero[] = 'saldo';
      } 
      }
      if ($this->adicional === "" || is_null($this->adicional))  
      { 
          $this->adicional = 0;
          $this->sc_force_zero[] = 'adicional';
      } 
      if ($this->adicional2 === "" || is_null($this->adicional2))  
      { 
          $this->adicional2 = 0;
          $this->sc_force_zero[] = 'adicional2';
      } 
      if ($this->adicional3 === "" || is_null($this->adicional3))  
      { 
          $this->adicional3 = 0;
          $this->sc_force_zero[] = 'adicional3';
      } 
      if ($this->vendedor === "" || is_null($this->vendedor))  
      { 
          $this->vendedor = 0;
          $this->sc_force_zero[] = 'vendedor';
      } 
      if ($this->pedido === "" || is_null($this->pedido))  
      { 
          $this->pedido = 0;
          $this->sc_force_zero[] = 'pedido';
      } 
      if ($this->resolucion === "" || is_null($this->resolucion))  
      { 
          $this->resolucion = 0;
          $this->sc_force_zero[] = 'resolucion';
      } 
      if ($this->dircliente === "" || is_null($this->dircliente))  
      { 
          $this->dircliente = 0;
          $this->sc_force_zero[] = 'dircliente';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->imconsumo === "" || is_null($this->imconsumo))  
      { 
          $this->imconsumo = 0;
          $this->sc_force_zero[] = 'imconsumo';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->retefuente === "" || is_null($this->retefuente))  
      { 
          $this->retefuente = 0;
          $this->sc_force_zero[] = 'retefuente';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->reteiva === "" || is_null($this->reteiva))  
      { 
          $this->reteiva = 0;
          $this->sc_force_zero[] = 'reteiva';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->reteica === "" || is_null($this->reteica))  
      { 
          $this->reteica = 0;
          $this->sc_force_zero[] = 'reteica';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->cree === "" || is_null($this->cree))  
      { 
          $this->cree = 0;
          $this->sc_force_zero[] = 'cree';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->dias_decredito === "" || is_null($this->dias_decredito))  
      { 
          $this->dias_decredito = 0;
          $this->sc_force_zero[] = 'dias_decredito';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->banco === "" || is_null($this->banco))  
      { 
          $this->banco = 0;
          $this->sc_force_zero[] = 'banco';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->id_fact === "" || is_null($this->id_fact))  
      { 
          $this->id_fact = 0;
          $this->sc_force_zero[] = 'id_fact';
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
      if ($this->usuario_crea === "" || is_null($this->usuario_crea))  
      { 
          $this->usuario_crea = 0;
          $this->sc_force_zero[] = 'usuario_crea';
      } 
      if ($this->id_clasificacion === "" || is_null($this->id_clasificacion))  
      { 
          $this->id_clasificacion = 0;
          $this->sc_force_zero[] = 'id_clasificacion';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->fechaven == "")  
          { 
              $this->fechaven = "null"; 
              $NM_val_null[] = "fechaven";
          } 
          if ($this->fechavenc == "")  
          { 
              $this->fechavenc = "null"; 
              $NM_val_null[] = "fechavenc";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->pagada == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->pagada = "null"; 
                  $NM_val_null[] = "pagada";
              } 
          }
          $this->observaciones_before_qstr = $this->observaciones;
          $this->observaciones = substr($this->Db->qstr($this->observaciones), 1, -1); 
          if ($this->observaciones == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->observaciones = "null"; 
              $NM_val_null[] = "observaciones";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->formapago == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->formapago = "null"; 
              $NM_val_null[] = "formapago";
          } 
          $this->obspago_before_qstr = $this->obspago;
          $this->obspago = substr($this->Db->qstr($this->obspago), 1, -1); 
          if ($this->obspago == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->obspago = "null"; 
              $NM_val_null[] = "obspago";
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
              if ($this->espos == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->espos = "null"; 
                  $NM_val_null[] = "espos";
              } 
          }
          $this->cufe_before_qstr = $this->cufe;
          $this->cufe = substr($this->Db->qstr($this->cufe), 1, -1); 
          if ($this->cufe == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cufe = "null"; 
              $NM_val_null[] = "cufe";
          } 
          $this->enlacepdf_before_qstr = $this->enlacepdf;
          $this->enlacepdf = substr($this->Db->qstr($this->enlacepdf), 1, -1); 
          if ($this->enlacepdf == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->enlacepdf = "null"; 
              $NM_val_null[] = "enlacepdf";
          } 
          $this->estado_before_qstr = $this->estado;
          $this->estado = substr($this->Db->qstr($this->estado), 1, -1); 
          if ($this->estado == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->estado = "null"; 
              $NM_val_null[] = "estado";
          } 
          $this->avisos_before_qstr = $this->avisos;
          $this->avisos = substr($this->Db->qstr($this->avisos), 1, -1); 
          if ($this->avisos == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->avisos = "null"; 
              $NM_val_null[] = "avisos";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->tipo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->tipo = "null"; 
                  $NM_val_null[] = "tipo";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->enviada_a_tns == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->enviada_a_tns = "null"; 
                  $NM_val_null[] = "enviada_a_tns";
              } 
          }
          if ($this->fecha_a_tns == "")  
          { 
              $this->fecha_a_tns = "null"; 
              $NM_val_null[] = "fecha_a_tns";
          } 
          $this->factura_tns_before_qstr = $this->factura_tns;
          $this->factura_tns = substr($this->Db->qstr($this->factura_tns), 1, -1); 
          if ($this->factura_tns == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->factura_tns = "null"; 
              $NM_val_null[] = "factura_tns";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->creado_en_movil == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->creado_en_movil = "null"; 
                  $NM_val_null[] = "creado_en_movil";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->disponible_en_movil == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->disponible_en_movil = "null"; 
                  $NM_val_null[] = "disponible_en_movil";
              } 
          }
          $this->mot_nc_before_qstr = $this->mot_nc;
          $this->mot_nc = substr($this->Db->qstr($this->mot_nc), 1, -1); 
          if ($this->mot_nc == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->mot_nc = "null"; 
              $NM_val_null[] = "mot_nc";
          } 
          $this->mot_nd_before_qstr = $this->mot_nd;
          $this->mot_nd = substr($this->Db->qstr($this->mot_nd), 1, -1); 
          if ($this->mot_nd == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->mot_nd = "null"; 
              $NM_val_null[] = "mot_nd";
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
          $this->cod_cuenta_before_qstr = $this->cod_cuenta;
          $this->cod_cuenta = substr($this->Db->qstr($this->cod_cuenta), 1, -1); 
          if ($this->cod_cuenta == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cod_cuenta = "null"; 
              $NM_val_null[] = "cod_cuenta";
          } 
          $this->qr_base64_before_qstr = $this->qr_base64;
          $this->qr_base64 = substr($this->Db->qstr($this->qr_base64), 1, -1); 
          if ($this->qr_base64 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->qr_base64 = "null"; 
              $NM_val_null[] = "qr_base64";
          } 
          if ($this->fecha_validacion == "")  
          { 
              $this->fecha_validacion = "null"; 
              $NM_val_null[] = "fecha_validacion";
          } 
          $this->id_trans_fe_before_qstr = $this->id_trans_fe;
          $this->id_trans_fe = substr($this->Db->qstr($this->id_trans_fe), 1, -1); 
          if ($this->id_trans_fe == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->id_trans_fe = "null"; 
              $NM_val_null[] = "id_trans_fe";
          } 
          $this->detalle_before_qstr = $this->detalle;
          $this->detalle = substr($this->Db->qstr($this->detalle), 1, -1); 
          if ($this->detalle == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->detalle = "null"; 
              $NM_val_null[] = "detalle";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_facturaven_automaticas_mob_pack_ajax_response();
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
                  $SC_fields_update[] = "numfacven = $this->numfacven, credito = $this->credito, fechaven = #$this->fechaven#, idcli = $this->idcli, subtotal = $this->subtotal, valoriva = $this->valoriva, total = $this->total, observaciones = '$this->observaciones', formapago = '$this->formapago', vendedor = $this->vendedor, resolucion = $this->resolucion, dircliente = $this->dircliente, dias_decredito = $this->dias_decredito, tipo = '$this->tipo', id_clasificacion = $this->id_clasificacion"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numfacven = $this->numfacven, credito = $this->credito, fechaven = " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", idcli = $this->idcli, subtotal = $this->subtotal, valoriva = $this->valoriva, total = $this->total, observaciones = '$this->observaciones', formapago = '$this->formapago', vendedor = $this->vendedor, resolucion = $this->resolucion, dircliente = $this->dircliente, dias_decredito = $this->dias_decredito, tipo = '$this->tipo', id_clasificacion = $this->id_clasificacion"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numfacven = $this->numfacven, credito = $this->credito, fechaven = " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", idcli = $this->idcli, subtotal = $this->subtotal, valoriva = $this->valoriva, total = $this->total, observaciones = '$this->observaciones', formapago = '$this->formapago', vendedor = $this->vendedor, resolucion = $this->resolucion, dircliente = $this->dircliente, dias_decredito = $this->dias_decredito, tipo = '$this->tipo', id_clasificacion = $this->id_clasificacion"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numfacven = $this->numfacven, credito = $this->credito, fechaven = EXTEND('$this->fechaven', YEAR TO DAY), idcli = $this->idcli, subtotal = $this->subtotal, valoriva = $this->valoriva, total = $this->total, observaciones = '$this->observaciones', formapago = '$this->formapago', vendedor = $this->vendedor, resolucion = $this->resolucion, dircliente = $this->dircliente, dias_decredito = $this->dias_decredito, tipo = '$this->tipo', id_clasificacion = $this->id_clasificacion"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numfacven = $this->numfacven, credito = $this->credito, fechaven = " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", idcli = $this->idcli, subtotal = $this->subtotal, valoriva = $this->valoriva, total = $this->total, observaciones = '$this->observaciones', formapago = '$this->formapago', vendedor = $this->vendedor, resolucion = $this->resolucion, dircliente = $this->dircliente, dias_decredito = $this->dias_decredito, tipo = '$this->tipo', id_clasificacion = $this->id_clasificacion"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numfacven = $this->numfacven, credito = $this->credito, fechaven = " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", idcli = $this->idcli, subtotal = $this->subtotal, valoriva = $this->valoriva, total = $this->total, observaciones = '$this->observaciones', formapago = '$this->formapago', vendedor = $this->vendedor, resolucion = $this->resolucion, dircliente = $this->dircliente, dias_decredito = $this->dias_decredito, tipo = '$this->tipo', id_clasificacion = $this->id_clasificacion"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numfacven = $this->numfacven, credito = $this->credito, fechaven = " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", idcli = $this->idcli, subtotal = $this->subtotal, valoriva = $this->valoriva, total = $this->total, observaciones = '$this->observaciones', formapago = '$this->formapago', vendedor = $this->vendedor, resolucion = $this->resolucion, dircliente = $this->dircliente, dias_decredito = $this->dias_decredito, tipo = '$this->tipo', id_clasificacion = $this->id_clasificacion"; 
              } 
              if (isset($NM_val_form['nremision']) && $NM_val_form['nremision'] != $this->nmgp_dados_select['nremision']) 
              { 
                  $SC_fields_update[] = "nremision = $this->nremision"; 
              } 
              if (isset($NM_val_form['fechavenc']) && $NM_val_form['fechavenc'] != $this->nmgp_dados_select['fechavenc']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "fechavenc = #$this->fechavenc#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "fechavenc = EXTEND('" . $this->fechavenc . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fechavenc = " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['pagada']) && $NM_val_form['pagada'] != $this->nmgp_dados_select['pagada']) 
              { 
                  $SC_fields_update[] = "pagada = '$this->pagada'"; 
              } 
              if (isset($NM_val_form['asentada']) && $NM_val_form['asentada'] != $this->nmgp_dados_select['asentada']) 
              { 
                  $SC_fields_update[] = "asentada = $this->asentada"; 
              } 
              if (isset($NM_val_form['saldo']) && $NM_val_form['saldo'] != $this->nmgp_dados_select['saldo']) 
              { 
                  $SC_fields_update[] = "saldo = $this->saldo"; 
              } 
              if (isset($NM_val_form['adicional']) && $NM_val_form['adicional'] != $this->nmgp_dados_select['adicional']) 
              { 
                  $SC_fields_update[] = "adicional = $this->adicional"; 
              } 
              if (isset($NM_val_form['adicional2']) && $NM_val_form['adicional2'] != $this->nmgp_dados_select['adicional2']) 
              { 
                  $SC_fields_update[] = "adicional2 = $this->adicional2"; 
              } 
              if (isset($NM_val_form['adicional3']) && $NM_val_form['adicional3'] != $this->nmgp_dados_select['adicional3']) 
              { 
                  $SC_fields_update[] = "adicional3 = $this->adicional3"; 
              } 
              if (isset($NM_val_form['obspago']) && $NM_val_form['obspago'] != $this->nmgp_dados_select['obspago']) 
              { 
                  $SC_fields_update[] = "obspago = '$this->obspago'"; 
              } 
              if (isset($NM_val_form['pedido']) && $NM_val_form['pedido'] != $this->nmgp_dados_select['pedido']) 
              { 
                  $SC_fields_update[] = "pedido = $this->pedido"; 
              } 
              if (isset($NM_val_form['imconsumo']) && $NM_val_form['imconsumo'] != $this->nmgp_dados_select['imconsumo']) 
              { 
                  $SC_fields_update[] = "imconsumo = $this->imconsumo"; 
              } 
              if (isset($NM_val_form['retefuente']) && $NM_val_form['retefuente'] != $this->nmgp_dados_select['retefuente']) 
              { 
                  $SC_fields_update[] = "retefuente = $this->retefuente"; 
              } 
              if (isset($NM_val_form['reteiva']) && $NM_val_form['reteiva'] != $this->nmgp_dados_select['reteiva']) 
              { 
                  $SC_fields_update[] = "reteiva = $this->reteiva"; 
              } 
              if (isset($NM_val_form['reteica']) && $NM_val_form['reteica'] != $this->nmgp_dados_select['reteica']) 
              { 
                  $SC_fields_update[] = "reteica = $this->reteica"; 
              } 
              if (isset($NM_val_form['cree']) && $NM_val_form['cree'] != $this->nmgp_dados_select['cree']) 
              { 
                  $SC_fields_update[] = "cree = $this->cree"; 
              } 
              if (isset($NM_val_form['espos']) && $NM_val_form['espos'] != $this->nmgp_dados_select['espos']) 
              { 
                  $SC_fields_update[] = "espos = '$this->espos'"; 
              } 
              if (isset($NM_val_form['cufe']) && $NM_val_form['cufe'] != $this->nmgp_dados_select['cufe']) 
              { 
                  $SC_fields_update[] = "cufe = '$this->cufe'"; 
              } 
              if (isset($NM_val_form['enlacepdf']) && $NM_val_form['enlacepdf'] != $this->nmgp_dados_select['enlacepdf']) 
              { 
                  $SC_fields_update[] = "enlacepdf = '$this->enlacepdf'"; 
              } 
              if (isset($NM_val_form['estado']) && $NM_val_form['estado'] != $this->nmgp_dados_select['estado']) 
              { 
                  $SC_fields_update[] = "estado = '$this->estado'"; 
              } 
              if (isset($NM_val_form['avisos']) && $NM_val_form['avisos'] != $this->nmgp_dados_select['avisos']) 
              { 
                  $SC_fields_update[] = "avisos = '$this->avisos'"; 
              } 
              if (isset($NM_val_form['banco']) && $NM_val_form['banco'] != $this->nmgp_dados_select['banco']) 
              { 
                  $SC_fields_update[] = "banco = $this->banco"; 
              } 
              if (isset($NM_val_form['id_fact']) && $NM_val_form['id_fact'] != $this->nmgp_dados_select['id_fact']) 
              { 
                  $SC_fields_update[] = "id_fact = $this->id_fact"; 
              } 
              if (isset($NM_val_form['enviada_a_tns']) && $NM_val_form['enviada_a_tns'] != $this->nmgp_dados_select['enviada_a_tns']) 
              { 
                  $SC_fields_update[] = "enviada_a_tns = '$this->enviada_a_tns'"; 
              } 
              if (isset($NM_val_form['fecha_a_tns']) && $NM_val_form['fecha_a_tns'] != $this->nmgp_dados_select['fecha_a_tns']) 
              { 
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  { 
                      $SC_fields_update[] = "fecha_a_tns = TO_DATE('$this->fecha_a_tns', 'yyyy-mm-dd hh24:mi:ss')"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fecha_a_tns = '$this->fecha_a_tns'"; 
                  } 
              } 
              if (isset($NM_val_form['factura_tns']) && $NM_val_form['factura_tns'] != $this->nmgp_dados_select['factura_tns']) 
              { 
                  $SC_fields_update[] = "factura_tns = '$this->factura_tns'"; 
              } 
              if (isset($NM_val_form['creado_en_movil']) && $NM_val_form['creado_en_movil'] != $this->nmgp_dados_select['creado_en_movil']) 
              { 
                  $SC_fields_update[] = "creado_en_movil = '$this->creado_en_movil'"; 
              } 
              if (isset($NM_val_form['disponible_en_movil']) && $NM_val_form['disponible_en_movil'] != $this->nmgp_dados_select['disponible_en_movil']) 
              { 
                  $SC_fields_update[] = "disponible_en_movil = '$this->disponible_en_movil'"; 
              } 
              if (isset($NM_val_form['mot_nc']) && $NM_val_form['mot_nc'] != $this->nmgp_dados_select['mot_nc']) 
              { 
                  $SC_fields_update[] = "mot_nc = '$this->mot_nc'"; 
              } 
              if (isset($NM_val_form['mot_nd']) && $NM_val_form['mot_nd'] != $this->nmgp_dados_select['mot_nd']) 
              { 
                  $SC_fields_update[] = "mot_nd = '$this->mot_nd'"; 
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
              if (isset($NM_val_form['editado']) && $NM_val_form['editado'] != $this->nmgp_dados_select['editado']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "editado = #$this->editado#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "editado = EXTEND('" . $this->editado . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "editado = " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['usuario_crea']) && $NM_val_form['usuario_crea'] != $this->nmgp_dados_select['usuario_crea']) 
              { 
                  $SC_fields_update[] = "usuario_crea = $this->usuario_crea"; 
              } 
              if (isset($NM_val_form['cod_cuenta']) && $NM_val_form['cod_cuenta'] != $this->nmgp_dados_select['cod_cuenta']) 
              { 
                  $SC_fields_update[] = "cod_cuenta = '$this->cod_cuenta'"; 
              } 
              if (isset($NM_val_form['qr_base64']) && $NM_val_form['qr_base64'] != $this->nmgp_dados_select['qr_base64']) 
              { 
                  $SC_fields_update[] = "qr_base64 = '$this->qr_base64'"; 
              } 
              if (isset($NM_val_form['fecha_validacion']) && $NM_val_form['fecha_validacion'] != $this->nmgp_dados_select['fecha_validacion']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "fecha_validacion = #$this->fecha_validacion#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "fecha_validacion = EXTEND('" . $this->fecha_validacion . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fecha_validacion = " . $this->Ini->date_delim . $this->fecha_validacion . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['id_trans_fe']) && $NM_val_form['id_trans_fe'] != $this->nmgp_dados_select['id_trans_fe']) 
              { 
                  $SC_fields_update[] = "id_trans_fe = '$this->id_trans_fe'"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE idfacven = $this->idfacven ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE idfacven = $this->idfacven ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE idfacven = $this->idfacven ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE idfacven = $this->idfacven ";  
              }  
              else  
              {
                  $comando .= " WHERE idfacven = $this->idfacven ";  
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
                                  form_facturaven_automaticas_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->observaciones = $this->observaciones_before_qstr;
              $this->obspago = $this->obspago_before_qstr;
              $this->cufe = $this->cufe_before_qstr;
              $this->enlacepdf = $this->enlacepdf_before_qstr;
              $this->estado = $this->estado_before_qstr;
              $this->avisos = $this->avisos_before_qstr;
              $this->factura_tns = $this->factura_tns_before_qstr;
              $this->mot_nc = $this->mot_nc_before_qstr;
              $this->mot_nd = $this->mot_nd_before_qstr;
              $this->cod_cuenta = $this->cod_cuenta_before_qstr;
              $this->qr_base64 = $this->qr_base64_before_qstr;
              $this->id_trans_fe = $this->id_trans_fe_before_qstr;
              $this->detalle = $this->detalle_before_qstr;
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['idfacven'])) { $this->idfacven = $NM_val_form['idfacven']; }
              elseif (isset($this->idfacven)) { $this->nm_limpa_alfa($this->idfacven); }
              if     (isset($NM_val_form) && isset($NM_val_form['numfacven'])) { $this->numfacven = $NM_val_form['numfacven']; }
              elseif (isset($this->numfacven)) { $this->nm_limpa_alfa($this->numfacven); }
              if     (isset($NM_val_form) && isset($NM_val_form['credito'])) { $this->credito = $NM_val_form['credito']; }
              elseif (isset($this->credito)) { $this->nm_limpa_alfa($this->credito); }
              if     (isset($NM_val_form) && isset($NM_val_form['idcli'])) { $this->idcli = $NM_val_form['idcli']; }
              elseif (isset($this->idcli)) { $this->nm_limpa_alfa($this->idcli); }
              if     (isset($NM_val_form) && isset($NM_val_form['subtotal'])) { $this->subtotal = $NM_val_form['subtotal']; }
              elseif (isset($this->subtotal)) { $this->nm_limpa_alfa($this->subtotal); }
              if     (isset($NM_val_form) && isset($NM_val_form['valoriva'])) { $this->valoriva = $NM_val_form['valoriva']; }
              elseif (isset($this->valoriva)) { $this->nm_limpa_alfa($this->valoriva); }
              if     (isset($NM_val_form) && isset($NM_val_form['total'])) { $this->total = $NM_val_form['total']; }
              elseif (isset($this->total)) { $this->nm_limpa_alfa($this->total); }
              if     (isset($NM_val_form) && isset($NM_val_form['observaciones'])) { $this->observaciones = $NM_val_form['observaciones']; }
              elseif (isset($this->observaciones)) { $this->nm_limpa_alfa($this->observaciones); }
              if     (isset($NM_val_form) && isset($NM_val_form['vendedor'])) { $this->vendedor = $NM_val_form['vendedor']; }
              elseif (isset($this->vendedor)) { $this->nm_limpa_alfa($this->vendedor); }
              if     (isset($NM_val_form) && isset($NM_val_form['resolucion'])) { $this->resolucion = $NM_val_form['resolucion']; }
              elseif (isset($this->resolucion)) { $this->nm_limpa_alfa($this->resolucion); }
              if     (isset($NM_val_form) && isset($NM_val_form['dircliente'])) { $this->dircliente = $NM_val_form['dircliente']; }
              elseif (isset($this->dircliente)) { $this->nm_limpa_alfa($this->dircliente); }
              if     (isset($NM_val_form) && isset($NM_val_form['dias_decredito'])) { $this->dias_decredito = $NM_val_form['dias_decredito']; }
              elseif (isset($this->dias_decredito)) { $this->nm_limpa_alfa($this->dias_decredito); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_clasificacion'])) { $this->id_clasificacion = $NM_val_form['id_clasificacion']; }
              elseif (isset($this->id_clasificacion)) { $this->nm_limpa_alfa($this->id_clasificacion); }
              if     (isset($NM_val_form) && isset($NM_val_form['detalle'])) { $this->detalle = $NM_val_form['detalle']; }
              elseif (isset($this->detalle)) { $this->nm_limpa_alfa($this->detalle); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('resolucion', 'formapago', 'fechaven', 'credito', 'dias_decredito', 'idcli', 'dircliente', 'subtotal', 'valoriva', 'total', 'observaciones', 'vendedor', 'numfacven', 'idfacven', 'tipo', 'detalle', 'id_clasificacion'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "idfacven, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_facturaven_automaticas_mob_pack_ajax_response();
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
                  if ($this->credito != "")
                  { 
                       $compl_insert     .= ", credito";
                       $compl_insert_val .= ", $this->credito";
                  } 
                  if ($this->pagada != "")
                  { 
                       $compl_insert     .= ", pagada";
                       $compl_insert_val .= ", '$this->pagada'";
                  } 
                  if ($this->saldo != "")
                  { 
                       $compl_insert     .= ", saldo";
                       $compl_insert_val .= ", $this->saldo";
                  } 
                  if ($this->imconsumo != "")
                  { 
                       $compl_insert     .= ", imconsumo";
                       $compl_insert_val .= ", $this->imconsumo";
                  } 
                  if ($this->retefuente != "")
                  { 
                       $compl_insert     .= ", retefuente";
                       $compl_insert_val .= ", $this->retefuente";
                  } 
                  if ($this->reteiva != "")
                  { 
                       $compl_insert     .= ", reteiva";
                       $compl_insert_val .= ", $this->reteiva";
                  } 
                  if ($this->reteica != "")
                  { 
                       $compl_insert     .= ", reteica";
                       $compl_insert_val .= ", $this->reteica";
                  } 
                  if ($this->cree != "")
                  { 
                       $compl_insert     .= ", cree";
                       $compl_insert_val .= ", $this->cree";
                  } 
                  if ($this->espos != "")
                  { 
                       $compl_insert     .= ", espos";
                       $compl_insert_val .= ", '$this->espos'";
                  } 
                  if ($this->banco != "")
                  { 
                       $compl_insert     .= ", banco";
                       $compl_insert_val .= ", $this->banco";
                  } 
                  if ($this->tipo != "")
                  { 
                       $compl_insert     .= ", tipo";
                       $compl_insert_val .= ", '$this->tipo'";
                  } 
                  if ($this->enviada_a_tns != "")
                  { 
                       $compl_insert     .= ", enviada_a_tns";
                       $compl_insert_val .= ", '$this->enviada_a_tns'";
                  } 
                  if ($this->creado_en_movil != "")
                  { 
                       $compl_insert     .= ", creado_en_movil";
                       $compl_insert_val .= ", '$this->creado_en_movil'";
                  } 
                  if ($this->disponible_en_movil != "")
                  { 
                       $compl_insert     .= ", disponible_en_movil";
                       $compl_insert_val .= ", '$this->disponible_en_movil'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (numfacven, nremision, fechaven, fechavenc, idcli, subtotal, valoriva, total, asentada, observaciones, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, cufe, enlacepdf, estado, avisos, dias_decredito, id_fact, fecha_a_tns, factura_tns, mot_nc, mot_nd, creado, editado, usuario_crea, cod_cuenta, qr_base64, fecha_validacion, id_trans_fe, id_clasificacion $compl_insert) VALUES ($this->numfacven, $this->nremision, #$this->fechaven#, #$this->fechavenc#, $this->idcli, $this->subtotal, $this->valoriva, $this->total, $this->asentada, '$this->observaciones', $this->adicional, '$this->formapago', $this->adicional2, $this->adicional3, '$this->obspago', $this->vendedor, $this->pedido, $this->resolucion, $this->dircliente, '$this->cufe', '$this->enlacepdf', '$this->estado', '$this->avisos', $this->dias_decredito, $this->id_fact, '$this->fecha_a_tns', '$this->factura_tns', '$this->mot_nc', '$this->mot_nd', #$this->creado#, #$this->editado#, $this->usuario_crea, '$this->cod_cuenta', '$this->qr_base64', #$this->fecha_validacion#, '$this->id_trans_fe', $this->id_clasificacion $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->credito != "")
                  { 
                       $compl_insert     .= ", credito";
                       $compl_insert_val .= ", $this->credito";
                  } 
                  if ($this->pagada != "")
                  { 
                       $compl_insert     .= ", pagada";
                       $compl_insert_val .= ", '$this->pagada'";
                  } 
                  if ($this->saldo != "")
                  { 
                       $compl_insert     .= ", saldo";
                       $compl_insert_val .= ", $this->saldo";
                  } 
                  if ($this->imconsumo != "")
                  { 
                       $compl_insert     .= ", imconsumo";
                       $compl_insert_val .= ", $this->imconsumo";
                  } 
                  if ($this->retefuente != "")
                  { 
                       $compl_insert     .= ", retefuente";
                       $compl_insert_val .= ", $this->retefuente";
                  } 
                  if ($this->reteiva != "")
                  { 
                       $compl_insert     .= ", reteiva";
                       $compl_insert_val .= ", $this->reteiva";
                  } 
                  if ($this->reteica != "")
                  { 
                       $compl_insert     .= ", reteica";
                       $compl_insert_val .= ", $this->reteica";
                  } 
                  if ($this->cree != "")
                  { 
                       $compl_insert     .= ", cree";
                       $compl_insert_val .= ", $this->cree";
                  } 
                  if ($this->espos != "")
                  { 
                       $compl_insert     .= ", espos";
                       $compl_insert_val .= ", '$this->espos'";
                  } 
                  if ($this->banco != "")
                  { 
                       $compl_insert     .= ", banco";
                       $compl_insert_val .= ", $this->banco";
                  } 
                  if ($this->tipo != "")
                  { 
                       $compl_insert     .= ", tipo";
                       $compl_insert_val .= ", '$this->tipo'";
                  } 
                  if ($this->enviada_a_tns != "")
                  { 
                       $compl_insert     .= ", enviada_a_tns";
                       $compl_insert_val .= ", '$this->enviada_a_tns'";
                  } 
                  if ($this->creado_en_movil != "")
                  { 
                       $compl_insert     .= ", creado_en_movil";
                       $compl_insert_val .= ", '$this->creado_en_movil'";
                  } 
                  if ($this->disponible_en_movil != "")
                  { 
                       $compl_insert     .= ", disponible_en_movil";
                       $compl_insert_val .= ", '$this->disponible_en_movil'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacven, nremision, fechaven, fechavenc, idcli, subtotal, valoriva, total, asentada, observaciones, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, cufe, enlacepdf, estado, avisos, dias_decredito, id_fact, fecha_a_tns, factura_tns, mot_nc, mot_nd, creado, editado, usuario_crea, cod_cuenta, qr_base64, fecha_validacion, id_trans_fe, id_clasificacion $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfacven, $this->nremision, " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", $this->idcli, $this->subtotal, $this->valoriva, $this->total, $this->asentada, '$this->observaciones', $this->adicional, '$this->formapago', $this->adicional2, $this->adicional3, '$this->obspago', $this->vendedor, $this->pedido, $this->resolucion, $this->dircliente, '$this->cufe', '$this->enlacepdf', '$this->estado', '$this->avisos', $this->dias_decredito, $this->id_fact, '$this->fecha_a_tns', '$this->factura_tns', '$this->mot_nc', '$this->mot_nd', " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . ", $this->usuario_crea, '$this->cod_cuenta', '$this->qr_base64', " . $this->Ini->date_delim . $this->fecha_validacion . $this->Ini->date_delim1 . ", '$this->id_trans_fe', $this->id_clasificacion $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->credito != "")
                  { 
                       $compl_insert     .= ", credito";
                       $compl_insert_val .= ", $this->credito";
                  } 
                  if ($this->pagada != "")
                  { 
                       $compl_insert     .= ", pagada";
                       $compl_insert_val .= ", '$this->pagada'";
                  } 
                  if ($this->saldo != "")
                  { 
                       $compl_insert     .= ", saldo";
                       $compl_insert_val .= ", $this->saldo";
                  } 
                  if ($this->imconsumo != "")
                  { 
                       $compl_insert     .= ", imconsumo";
                       $compl_insert_val .= ", $this->imconsumo";
                  } 
                  if ($this->retefuente != "")
                  { 
                       $compl_insert     .= ", retefuente";
                       $compl_insert_val .= ", $this->retefuente";
                  } 
                  if ($this->reteiva != "")
                  { 
                       $compl_insert     .= ", reteiva";
                       $compl_insert_val .= ", $this->reteiva";
                  } 
                  if ($this->reteica != "")
                  { 
                       $compl_insert     .= ", reteica";
                       $compl_insert_val .= ", $this->reteica";
                  } 
                  if ($this->cree != "")
                  { 
                       $compl_insert     .= ", cree";
                       $compl_insert_val .= ", $this->cree";
                  } 
                  if ($this->espos != "")
                  { 
                       $compl_insert     .= ", espos";
                       $compl_insert_val .= ", '$this->espos'";
                  } 
                  if ($this->banco != "")
                  { 
                       $compl_insert     .= ", banco";
                       $compl_insert_val .= ", $this->banco";
                  } 
                  if ($this->tipo != "")
                  { 
                       $compl_insert     .= ", tipo";
                       $compl_insert_val .= ", '$this->tipo'";
                  } 
                  if ($this->enviada_a_tns != "")
                  { 
                       $compl_insert     .= ", enviada_a_tns";
                       $compl_insert_val .= ", '$this->enviada_a_tns'";
                  } 
                  if ($this->creado_en_movil != "")
                  { 
                       $compl_insert     .= ", creado_en_movil";
                       $compl_insert_val .= ", '$this->creado_en_movil'";
                  } 
                  if ($this->disponible_en_movil != "")
                  { 
                       $compl_insert     .= ", disponible_en_movil";
                       $compl_insert_val .= ", '$this->disponible_en_movil'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacven, nremision, fechaven, fechavenc, idcli, subtotal, valoriva, total, asentada, observaciones, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, cufe, enlacepdf, estado, avisos, dias_decredito, id_fact, fecha_a_tns, factura_tns, mot_nc, mot_nd, creado, editado, usuario_crea, cod_cuenta, qr_base64, fecha_validacion, id_trans_fe, id_clasificacion $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfacven, $this->nremision, " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", $this->idcli, $this->subtotal, $this->valoriva, $this->total, $this->asentada, '$this->observaciones', $this->adicional, '$this->formapago', $this->adicional2, $this->adicional3, '$this->obspago', $this->vendedor, $this->pedido, $this->resolucion, $this->dircliente, '$this->cufe', '$this->enlacepdf', '$this->estado', '$this->avisos', $this->dias_decredito, $this->id_fact, '$this->fecha_a_tns', '$this->factura_tns', '$this->mot_nc', '$this->mot_nd', " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . ", $this->usuario_crea, '$this->cod_cuenta', '$this->qr_base64', " . $this->Ini->date_delim . $this->fecha_validacion . $this->Ini->date_delim1 . ", '$this->id_trans_fe', $this->id_clasificacion $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->credito != "")
                  { 
                       $compl_insert     .= ", credito";
                       $compl_insert_val .= ", $this->credito";
                  } 
                  if ($this->pagada != "")
                  { 
                       $compl_insert     .= ", pagada";
                       $compl_insert_val .= ", '$this->pagada'";
                  } 
                  if ($this->saldo != "")
                  { 
                       $compl_insert     .= ", saldo";
                       $compl_insert_val .= ", $this->saldo";
                  } 
                  if ($this->imconsumo != "")
                  { 
                       $compl_insert     .= ", imconsumo";
                       $compl_insert_val .= ", $this->imconsumo";
                  } 
                  if ($this->retefuente != "")
                  { 
                       $compl_insert     .= ", retefuente";
                       $compl_insert_val .= ", $this->retefuente";
                  } 
                  if ($this->reteiva != "")
                  { 
                       $compl_insert     .= ", reteiva";
                       $compl_insert_val .= ", $this->reteiva";
                  } 
                  if ($this->reteica != "")
                  { 
                       $compl_insert     .= ", reteica";
                       $compl_insert_val .= ", $this->reteica";
                  } 
                  if ($this->cree != "")
                  { 
                       $compl_insert     .= ", cree";
                       $compl_insert_val .= ", $this->cree";
                  } 
                  if ($this->espos != "")
                  { 
                       $compl_insert     .= ", espos";
                       $compl_insert_val .= ", '$this->espos'";
                  } 
                  if ($this->banco != "")
                  { 
                       $compl_insert     .= ", banco";
                       $compl_insert_val .= ", $this->banco";
                  } 
                  if ($this->tipo != "")
                  { 
                       $compl_insert     .= ", tipo";
                       $compl_insert_val .= ", '$this->tipo'";
                  } 
                  if ($this->enviada_a_tns != "")
                  { 
                       $compl_insert     .= ", enviada_a_tns";
                       $compl_insert_val .= ", '$this->enviada_a_tns'";
                  } 
                  if ($this->creado_en_movil != "")
                  { 
                       $compl_insert     .= ", creado_en_movil";
                       $compl_insert_val .= ", '$this->creado_en_movil'";
                  } 
                  if ($this->disponible_en_movil != "")
                  { 
                       $compl_insert     .= ", disponible_en_movil";
                       $compl_insert_val .= ", '$this->disponible_en_movil'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacven, nremision, fechaven, fechavenc, idcli, subtotal, valoriva, total, asentada, observaciones, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, cufe, enlacepdf, estado, avisos, dias_decredito, id_fact, fecha_a_tns, factura_tns, mot_nc, mot_nd, creado, editado, usuario_crea, cod_cuenta, qr_base64, fecha_validacion, id_trans_fe, id_clasificacion $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfacven, $this->nremision, " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", $this->idcli, $this->subtotal, $this->valoriva, $this->total, $this->asentada, '$this->observaciones', $this->adicional, '$this->formapago', $this->adicional2, $this->adicional3, '$this->obspago', $this->vendedor, $this->pedido, $this->resolucion, $this->dircliente, '$this->cufe', '$this->enlacepdf', '$this->estado', '$this->avisos', $this->dias_decredito, $this->id_fact, TO_DATE('$this->fecha_a_tns', 'yyyy-mm-dd hh24:mi:ss'), '$this->factura_tns', '$this->mot_nc', '$this->mot_nd', " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . ", $this->usuario_crea, '$this->cod_cuenta', '$this->qr_base64', " . $this->Ini->date_delim . $this->fecha_validacion . $this->Ini->date_delim1 . ", '$this->id_trans_fe', $this->id_clasificacion $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->credito != "")
                  { 
                       $compl_insert     .= ", credito";
                       $compl_insert_val .= ", $this->credito";
                  } 
                  if ($this->pagada != "")
                  { 
                       $compl_insert     .= ", pagada";
                       $compl_insert_val .= ", '$this->pagada'";
                  } 
                  if ($this->saldo != "")
                  { 
                       $compl_insert     .= ", saldo";
                       $compl_insert_val .= ", $this->saldo";
                  } 
                  if ($this->imconsumo != "")
                  { 
                       $compl_insert     .= ", imconsumo";
                       $compl_insert_val .= ", $this->imconsumo";
                  } 
                  if ($this->retefuente != "")
                  { 
                       $compl_insert     .= ", retefuente";
                       $compl_insert_val .= ", $this->retefuente";
                  } 
                  if ($this->reteiva != "")
                  { 
                       $compl_insert     .= ", reteiva";
                       $compl_insert_val .= ", $this->reteiva";
                  } 
                  if ($this->reteica != "")
                  { 
                       $compl_insert     .= ", reteica";
                       $compl_insert_val .= ", $this->reteica";
                  } 
                  if ($this->cree != "")
                  { 
                       $compl_insert     .= ", cree";
                       $compl_insert_val .= ", $this->cree";
                  } 
                  if ($this->espos != "")
                  { 
                       $compl_insert     .= ", espos";
                       $compl_insert_val .= ", '$this->espos'";
                  } 
                  if ($this->banco != "")
                  { 
                       $compl_insert     .= ", banco";
                       $compl_insert_val .= ", $this->banco";
                  } 
                  if ($this->tipo != "")
                  { 
                       $compl_insert     .= ", tipo";
                       $compl_insert_val .= ", '$this->tipo'";
                  } 
                  if ($this->enviada_a_tns != "")
                  { 
                       $compl_insert     .= ", enviada_a_tns";
                       $compl_insert_val .= ", '$this->enviada_a_tns'";
                  } 
                  if ($this->creado_en_movil != "")
                  { 
                       $compl_insert     .= ", creado_en_movil";
                       $compl_insert_val .= ", '$this->creado_en_movil'";
                  } 
                  if ($this->disponible_en_movil != "")
                  { 
                       $compl_insert     .= ", disponible_en_movil";
                       $compl_insert_val .= ", '$this->disponible_en_movil'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacven, nremision, fechaven, fechavenc, idcli, subtotal, valoriva, total, asentada, observaciones, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, cufe, enlacepdf, estado, avisos, dias_decredito, id_fact, fecha_a_tns, factura_tns, mot_nc, mot_nd, creado, editado, usuario_crea, cod_cuenta, qr_base64, fecha_validacion, id_trans_fe, id_clasificacion $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfacven, $this->nremision, EXTEND('$this->fechaven', YEAR TO DAY), EXTEND('$this->fechavenc', YEAR TO DAY), $this->idcli, $this->subtotal, $this->valoriva, $this->total, $this->asentada, '$this->observaciones', $this->adicional, '$this->formapago', $this->adicional2, $this->adicional3, '$this->obspago', $this->vendedor, $this->pedido, $this->resolucion, $this->dircliente, '$this->cufe', '$this->enlacepdf', '$this->estado', '$this->avisos', $this->dias_decredito, $this->id_fact, '$this->fecha_a_tns', '$this->factura_tns', '$this->mot_nc', '$this->mot_nd', EXTEND('$this->creado', YEAR TO FRACTION), EXTEND('$this->editado', YEAR TO FRACTION), $this->usuario_crea, '$this->cod_cuenta', '$this->qr_base64', EXTEND('$this->fecha_validacion', YEAR TO FRACTION), '$this->id_trans_fe', $this->id_clasificacion $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->credito != "")
                  { 
                       $compl_insert     .= ", credito";
                       $compl_insert_val .= ", $this->credito";
                  } 
                  if ($this->pagada != "")
                  { 
                       $compl_insert     .= ", pagada";
                       $compl_insert_val .= ", '$this->pagada'";
                  } 
                  if ($this->saldo != "")
                  { 
                       $compl_insert     .= ", saldo";
                       $compl_insert_val .= ", $this->saldo";
                  } 
                  if ($this->imconsumo != "")
                  { 
                       $compl_insert     .= ", imconsumo";
                       $compl_insert_val .= ", $this->imconsumo";
                  } 
                  if ($this->retefuente != "")
                  { 
                       $compl_insert     .= ", retefuente";
                       $compl_insert_val .= ", $this->retefuente";
                  } 
                  if ($this->reteiva != "")
                  { 
                       $compl_insert     .= ", reteiva";
                       $compl_insert_val .= ", $this->reteiva";
                  } 
                  if ($this->reteica != "")
                  { 
                       $compl_insert     .= ", reteica";
                       $compl_insert_val .= ", $this->reteica";
                  } 
                  if ($this->cree != "")
                  { 
                       $compl_insert     .= ", cree";
                       $compl_insert_val .= ", $this->cree";
                  } 
                  if ($this->espos != "")
                  { 
                       $compl_insert     .= ", espos";
                       $compl_insert_val .= ", '$this->espos'";
                  } 
                  if ($this->banco != "")
                  { 
                       $compl_insert     .= ", banco";
                       $compl_insert_val .= ", $this->banco";
                  } 
                  if ($this->tipo != "")
                  { 
                       $compl_insert     .= ", tipo";
                       $compl_insert_val .= ", '$this->tipo'";
                  } 
                  if ($this->enviada_a_tns != "")
                  { 
                       $compl_insert     .= ", enviada_a_tns";
                       $compl_insert_val .= ", '$this->enviada_a_tns'";
                  } 
                  if ($this->creado_en_movil != "")
                  { 
                       $compl_insert     .= ", creado_en_movil";
                       $compl_insert_val .= ", '$this->creado_en_movil'";
                  } 
                  if ($this->disponible_en_movil != "")
                  { 
                       $compl_insert     .= ", disponible_en_movil";
                       $compl_insert_val .= ", '$this->disponible_en_movil'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacven, nremision, fechaven, fechavenc, idcli, subtotal, valoriva, total, asentada, observaciones, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, cufe, enlacepdf, estado, avisos, dias_decredito, id_fact, fecha_a_tns, factura_tns, mot_nc, mot_nd, creado, editado, usuario_crea, cod_cuenta, qr_base64, fecha_validacion, id_trans_fe, id_clasificacion $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfacven, $this->nremision, " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", $this->idcli, $this->subtotal, $this->valoriva, $this->total, $this->asentada, '$this->observaciones', $this->adicional, '$this->formapago', $this->adicional2, $this->adicional3, '$this->obspago', $this->vendedor, $this->pedido, $this->resolucion, $this->dircliente, '$this->cufe', '$this->enlacepdf', '$this->estado', '$this->avisos', $this->dias_decredito, $this->id_fact, '$this->fecha_a_tns', '$this->factura_tns', '$this->mot_nc', '$this->mot_nd', " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . ", $this->usuario_crea, '$this->cod_cuenta', '$this->qr_base64', " . $this->Ini->date_delim . $this->fecha_validacion . $this->Ini->date_delim1 . ", '$this->id_trans_fe', $this->id_clasificacion $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->credito != "")
                  { 
                       $compl_insert     .= ", credito";
                       $compl_insert_val .= ", $this->credito";
                  } 
                  if ($this->pagada != "")
                  { 
                       $compl_insert     .= ", pagada";
                       $compl_insert_val .= ", '$this->pagada'";
                  } 
                  if ($this->saldo != "")
                  { 
                       $compl_insert     .= ", saldo";
                       $compl_insert_val .= ", $this->saldo";
                  } 
                  if ($this->imconsumo != "")
                  { 
                       $compl_insert     .= ", imconsumo";
                       $compl_insert_val .= ", $this->imconsumo";
                  } 
                  if ($this->retefuente != "")
                  { 
                       $compl_insert     .= ", retefuente";
                       $compl_insert_val .= ", $this->retefuente";
                  } 
                  if ($this->reteiva != "")
                  { 
                       $compl_insert     .= ", reteiva";
                       $compl_insert_val .= ", $this->reteiva";
                  } 
                  if ($this->reteica != "")
                  { 
                       $compl_insert     .= ", reteica";
                       $compl_insert_val .= ", $this->reteica";
                  } 
                  if ($this->cree != "")
                  { 
                       $compl_insert     .= ", cree";
                       $compl_insert_val .= ", $this->cree";
                  } 
                  if ($this->espos != "")
                  { 
                       $compl_insert     .= ", espos";
                       $compl_insert_val .= ", '$this->espos'";
                  } 
                  if ($this->banco != "")
                  { 
                       $compl_insert     .= ", banco";
                       $compl_insert_val .= ", $this->banco";
                  } 
                  if ($this->tipo != "")
                  { 
                       $compl_insert     .= ", tipo";
                       $compl_insert_val .= ", '$this->tipo'";
                  } 
                  if ($this->enviada_a_tns != "")
                  { 
                       $compl_insert     .= ", enviada_a_tns";
                       $compl_insert_val .= ", '$this->enviada_a_tns'";
                  } 
                  if ($this->creado_en_movil != "")
                  { 
                       $compl_insert     .= ", creado_en_movil";
                       $compl_insert_val .= ", '$this->creado_en_movil'";
                  } 
                  if ($this->disponible_en_movil != "")
                  { 
                       $compl_insert     .= ", disponible_en_movil";
                       $compl_insert_val .= ", '$this->disponible_en_movil'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacven, nremision, fechaven, fechavenc, idcli, subtotal, valoriva, total, asentada, observaciones, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, cufe, enlacepdf, estado, avisos, dias_decredito, id_fact, fecha_a_tns, factura_tns, mot_nc, mot_nd, creado, editado, usuario_crea, cod_cuenta, qr_base64, fecha_validacion, id_trans_fe, id_clasificacion $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfacven, $this->nremision, " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", $this->idcli, $this->subtotal, $this->valoriva, $this->total, $this->asentada, '$this->observaciones', $this->adicional, '$this->formapago', $this->adicional2, $this->adicional3, '$this->obspago', $this->vendedor, $this->pedido, $this->resolucion, $this->dircliente, '$this->cufe', '$this->enlacepdf', '$this->estado', '$this->avisos', $this->dias_decredito, $this->id_fact, '$this->fecha_a_tns', '$this->factura_tns', '$this->mot_nc', '$this->mot_nd', " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . ", $this->usuario_crea, '$this->cod_cuenta', '$this->qr_base64', " . $this->Ini->date_delim . $this->fecha_validacion . $this->Ini->date_delim1 . ", '$this->id_trans_fe', $this->id_clasificacion $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->credito != "")
                  { 
                       $compl_insert     .= ", credito";
                       $compl_insert_val .= ", $this->credito";
                  } 
                  if ($this->pagada != "")
                  { 
                       $compl_insert     .= ", pagada";
                       $compl_insert_val .= ", '$this->pagada'";
                  } 
                  if ($this->saldo != "")
                  { 
                       $compl_insert     .= ", saldo";
                       $compl_insert_val .= ", $this->saldo";
                  } 
                  if ($this->imconsumo != "")
                  { 
                       $compl_insert     .= ", imconsumo";
                       $compl_insert_val .= ", $this->imconsumo";
                  } 
                  if ($this->retefuente != "")
                  { 
                       $compl_insert     .= ", retefuente";
                       $compl_insert_val .= ", $this->retefuente";
                  } 
                  if ($this->reteiva != "")
                  { 
                       $compl_insert     .= ", reteiva";
                       $compl_insert_val .= ", $this->reteiva";
                  } 
                  if ($this->reteica != "")
                  { 
                       $compl_insert     .= ", reteica";
                       $compl_insert_val .= ", $this->reteica";
                  } 
                  if ($this->cree != "")
                  { 
                       $compl_insert     .= ", cree";
                       $compl_insert_val .= ", $this->cree";
                  } 
                  if ($this->espos != "")
                  { 
                       $compl_insert     .= ", espos";
                       $compl_insert_val .= ", '$this->espos'";
                  } 
                  if ($this->banco != "")
                  { 
                       $compl_insert     .= ", banco";
                       $compl_insert_val .= ", $this->banco";
                  } 
                  if ($this->tipo != "")
                  { 
                       $compl_insert     .= ", tipo";
                       $compl_insert_val .= ", '$this->tipo'";
                  } 
                  if ($this->enviada_a_tns != "")
                  { 
                       $compl_insert     .= ", enviada_a_tns";
                       $compl_insert_val .= ", '$this->enviada_a_tns'";
                  } 
                  if ($this->creado_en_movil != "")
                  { 
                       $compl_insert     .= ", creado_en_movil";
                       $compl_insert_val .= ", '$this->creado_en_movil'";
                  } 
                  if ($this->disponible_en_movil != "")
                  { 
                       $compl_insert     .= ", disponible_en_movil";
                       $compl_insert_val .= ", '$this->disponible_en_movil'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacven, nremision, fechaven, fechavenc, idcli, subtotal, valoriva, total, asentada, observaciones, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, cufe, enlacepdf, estado, avisos, dias_decredito, id_fact, fecha_a_tns, factura_tns, mot_nc, mot_nd, creado, editado, usuario_crea, cod_cuenta, qr_base64, fecha_validacion, id_trans_fe, id_clasificacion $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfacven, $this->nremision, " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", $this->idcli, $this->subtotal, $this->valoriva, $this->total, $this->asentada, '$this->observaciones', $this->adicional, '$this->formapago', $this->adicional2, $this->adicional3, '$this->obspago', $this->vendedor, $this->pedido, $this->resolucion, $this->dircliente, '$this->cufe', '$this->enlacepdf', '$this->estado', '$this->avisos', $this->dias_decredito, $this->id_fact, TO_DATE('$this->fecha_a_tns', 'yyyy-mm-dd hh24:mi:ss'), '$this->factura_tns', '$this->mot_nc', '$this->mot_nd', " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . ", $this->usuario_crea, '$this->cod_cuenta', '$this->qr_base64', " . $this->Ini->date_delim . $this->fecha_validacion . $this->Ini->date_delim1 . ", '$this->id_trans_fe', $this->id_clasificacion $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->credito != "")
                  { 
                       $compl_insert     .= ", credito";
                       $compl_insert_val .= ", $this->credito";
                  } 
                  if ($this->pagada != "")
                  { 
                       $compl_insert     .= ", pagada";
                       $compl_insert_val .= ", '$this->pagada'";
                  } 
                  if ($this->saldo != "")
                  { 
                       $compl_insert     .= ", saldo";
                       $compl_insert_val .= ", $this->saldo";
                  } 
                  if ($this->imconsumo != "")
                  { 
                       $compl_insert     .= ", imconsumo";
                       $compl_insert_val .= ", $this->imconsumo";
                  } 
                  if ($this->retefuente != "")
                  { 
                       $compl_insert     .= ", retefuente";
                       $compl_insert_val .= ", $this->retefuente";
                  } 
                  if ($this->reteiva != "")
                  { 
                       $compl_insert     .= ", reteiva";
                       $compl_insert_val .= ", $this->reteiva";
                  } 
                  if ($this->reteica != "")
                  { 
                       $compl_insert     .= ", reteica";
                       $compl_insert_val .= ", $this->reteica";
                  } 
                  if ($this->cree != "")
                  { 
                       $compl_insert     .= ", cree";
                       $compl_insert_val .= ", $this->cree";
                  } 
                  if ($this->espos != "")
                  { 
                       $compl_insert     .= ", espos";
                       $compl_insert_val .= ", '$this->espos'";
                  } 
                  if ($this->banco != "")
                  { 
                       $compl_insert     .= ", banco";
                       $compl_insert_val .= ", $this->banco";
                  } 
                  if ($this->tipo != "")
                  { 
                       $compl_insert     .= ", tipo";
                       $compl_insert_val .= ", '$this->tipo'";
                  } 
                  if ($this->enviada_a_tns != "")
                  { 
                       $compl_insert     .= ", enviada_a_tns";
                       $compl_insert_val .= ", '$this->enviada_a_tns'";
                  } 
                  if ($this->creado_en_movil != "")
                  { 
                       $compl_insert     .= ", creado_en_movil";
                       $compl_insert_val .= ", '$this->creado_en_movil'";
                  } 
                  if ($this->disponible_en_movil != "")
                  { 
                       $compl_insert     .= ", disponible_en_movil";
                       $compl_insert_val .= ", '$this->disponible_en_movil'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacven, nremision, fechaven, fechavenc, idcli, subtotal, valoriva, total, asentada, observaciones, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, cufe, enlacepdf, estado, avisos, dias_decredito, id_fact, fecha_a_tns, factura_tns, mot_nc, mot_nd, creado, editado, usuario_crea, cod_cuenta, qr_base64, fecha_validacion, id_trans_fe, id_clasificacion $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfacven, $this->nremision, " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", $this->idcli, $this->subtotal, $this->valoriva, $this->total, $this->asentada, '$this->observaciones', $this->adicional, '$this->formapago', $this->adicional2, $this->adicional3, '$this->obspago', $this->vendedor, $this->pedido, $this->resolucion, $this->dircliente, '$this->cufe', '$this->enlacepdf', '$this->estado', '$this->avisos', $this->dias_decredito, $this->id_fact, '$this->fecha_a_tns', '$this->factura_tns', '$this->mot_nc', '$this->mot_nd', " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . ", $this->usuario_crea, '$this->cod_cuenta', '$this->qr_base64', " . $this->Ini->date_delim . $this->fecha_validacion . $this->Ini->date_delim1 . ", '$this->id_trans_fe', $this->id_clasificacion $compl_insert_val)"; 
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
                              form_facturaven_automaticas_mob_pack_ajax_response();
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
                          form_facturaven_automaticas_mob_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->idfacven =  $rsy->fields[0];
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
                  $this->idfacven = $rsy->fields[0];
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
                  $this->idfacven = $rsy->fields[0];
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
                  $this->idfacven = $rsy->fields[0];
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
                  $this->idfacven = $rsy->fields[0];
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
                  $this->idfacven = $rsy->fields[0];
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
                  $this->idfacven = $rsy->fields[0];
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
                  $this->idfacven = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->observaciones = $this->observaciones_before_qstr;
              $this->obspago = $this->obspago_before_qstr;
              $this->cufe = $this->cufe_before_qstr;
              $this->enlacepdf = $this->enlacepdf_before_qstr;
              $this->estado = $this->estado_before_qstr;
              $this->avisos = $this->avisos_before_qstr;
              $this->factura_tns = $this->factura_tns_before_qstr;
              $this->mot_nc = $this->mot_nc_before_qstr;
              $this->mot_nd = $this->mot_nd_before_qstr;
              $this->cod_cuenta = $this->cod_cuenta_before_qstr;
              $this->qr_base64 = $this->qr_base64_before_qstr;
              $this->id_trans_fe = $this->id_trans_fe_before_qstr;
              $this->detalle = $this->detalle_before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->observaciones = $this->observaciones_before_qstr;
              $this->obspago = $this->obspago_before_qstr;
              $this->cufe = $this->cufe_before_qstr;
              $this->enlacepdf = $this->enlacepdf_before_qstr;
              $this->estado = $this->estado_before_qstr;
              $this->avisos = $this->avisos_before_qstr;
              $this->factura_tns = $this->factura_tns_before_qstr;
              $this->mot_nc = $this->mot_nc_before_qstr;
              $this->mot_nd = $this->mot_nd_before_qstr;
              $this->cod_cuenta = $this->cod_cuenta_before_qstr;
              $this->qr_base64 = $this->qr_base64_before_qstr;
              $this->id_trans_fe = $this->id_trans_fe_before_qstr;
              $this->detalle = $this->detalle_before_qstr;
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['sc_redir_insert'] != "S"))
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->idfacven = substr($this->Db->qstr($this->idfacven), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';
          if ($bDelecaoOk)
          {
              $sDetailWhere = "numfac = " . $this->idfacven . "";
              $this->form_facturaven_automaticas_detalleventa_mob->ini_controle();
              if ($this->form_facturaven_automaticas_detalleventa_mob->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idfacven = $this->idfacven "); 
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
                          form_facturaven_automaticas_mob_pack_ajax_response();
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['total']);
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['parms'] = "idfacven?#?$this->idfacven?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idfacven = null === $this->idfacven ? null : substr($this->Db->qstr($this->idfacven), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_filter'] . ")";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT idfacven, numfacven, nremision, credito, str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20), str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, imconsumo, retefuente, reteiva, reteica, cree, espos, cufe, enlacepdf, estado, avisos, dias_decredito, banco, tipo, id_fact, enviada_a_tns, fecha_a_tns, factura_tns, creado_en_movil, disponible_en_movil, mot_nc, mot_nd, str_replace (convert(char(10),creado,102), '.', '-') + ' ' + convert(char(8),creado,20), str_replace (convert(char(10),editado,102), '.', '-') + ' ' + convert(char(8),editado,20), usuario_crea, cod_cuenta, qr_base64, str_replace (convert(char(10),fecha_validacion,102), '.', '-') + ' ' + convert(char(8),fecha_validacion,20), id_trans_fe, id_clasificacion from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT idfacven, numfacven, nremision, credito, convert(char(23),fechaven,121), convert(char(23),fechavenc,121), idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, imconsumo, retefuente, reteiva, reteica, cree, espos, cufe, enlacepdf, estado, avisos, dias_decredito, banco, tipo, id_fact, enviada_a_tns, fecha_a_tns, factura_tns, creado_en_movil, disponible_en_movil, mot_nc, mot_nd, convert(char(23),creado,121), convert(char(23),editado,121), usuario_crea, cod_cuenta, qr_base64, convert(char(23),fecha_validacion,121), id_trans_fe, id_clasificacion from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT idfacven, numfacven, nremision, credito, fechaven, fechavenc, idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, imconsumo, retefuente, reteiva, reteica, cree, espos, cufe, enlacepdf, estado, avisos, dias_decredito, banco, tipo, id_fact, enviada_a_tns, TO_DATE(TO_CHAR(fecha_a_tns, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), factura_tns, creado_en_movil, disponible_en_movil, mot_nc, mot_nd, creado, editado, usuario_crea, cod_cuenta, qr_base64, fecha_validacion, id_trans_fe, id_clasificacion from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT idfacven, numfacven, nremision, credito, EXTEND(fechaven, YEAR TO DAY), EXTEND(fechavenc, YEAR TO DAY), idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, imconsumo, retefuente, reteiva, reteica, cree, espos, cufe, enlacepdf, estado, avisos, dias_decredito, banco, tipo, id_fact, enviada_a_tns, fecha_a_tns, factura_tns, creado_en_movil, disponible_en_movil, mot_nc, mot_nd, EXTEND(creado, YEAR TO FRACTION), EXTEND(editado, YEAR TO FRACTION), usuario_crea, cod_cuenta, qr_base64, EXTEND(fecha_validacion, YEAR TO FRACTION), id_trans_fe, id_clasificacion from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT idfacven, numfacven, nremision, credito, fechaven, fechavenc, idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, imconsumo, retefuente, reteiva, reteica, cree, espos, cufe, enlacepdf, estado, avisos, dias_decredito, banco, tipo, id_fact, enviada_a_tns, fecha_a_tns, factura_tns, creado_en_movil, disponible_en_movil, mot_nc, mot_nd, creado, editado, usuario_crea, cod_cuenta, qr_base64, fecha_validacion, id_trans_fe, id_clasificacion from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "idfacven = $this->idfacven"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "idfacven = $this->idfacven"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "idfacven = $this->idfacven"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "idfacven = $this->idfacven"; 
              }  
              else  
              {
                  $aWhere[] = "idfacven = $this->idfacven"; 
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
          $sc_order_by = "idfacven";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "insert" || $this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['select'] = ""; 
              } 
          } 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
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
              $this->NM_ajax_info['navSummary']['reg_ini'] = 0; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = 0; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = 0; 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['empty_filter'] = true;
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
          else 
          { 
              $this->NM_ajax_info['navSummary']['reg_ini'] = 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = 1; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = 1; 
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->idfacven = $rs->fields[0] ; 
              $this->nmgp_dados_select['idfacven'] = $this->idfacven;
              $this->numfacven = $rs->fields[1] ; 
              $this->nmgp_dados_select['numfacven'] = $this->numfacven;
              $this->nremision = $rs->fields[2] ; 
              $this->nmgp_dados_select['nremision'] = $this->nremision;
              $this->credito = $rs->fields[3] ; 
              $this->nmgp_dados_select['credito'] = $this->credito;
              $this->fechaven = $rs->fields[4] ; 
              $this->nmgp_dados_select['fechaven'] = $this->fechaven;
              $this->fechavenc = $rs->fields[5] ; 
              $this->nmgp_dados_select['fechavenc'] = $this->fechavenc;
              $this->idcli = $rs->fields[6] ; 
              $this->nmgp_dados_select['idcli'] = $this->idcli;
              $this->subtotal = $rs->fields[7] ; 
              $this->nmgp_dados_select['subtotal'] = $this->subtotal;
              $this->valoriva = $rs->fields[8] ; 
              $this->nmgp_dados_select['valoriva'] = $this->valoriva;
              $this->total = $rs->fields[9] ; 
              $this->nmgp_dados_select['total'] = $this->total;
              $this->pagada = $rs->fields[10] ; 
              $this->nmgp_dados_select['pagada'] = $this->pagada;
              $this->asentada = $rs->fields[11] ; 
              $this->nmgp_dados_select['asentada'] = $this->asentada;
              $this->observaciones = $rs->fields[12] ; 
              $this->nmgp_dados_select['observaciones'] = $this->observaciones;
              $this->saldo = $rs->fields[13] ; 
              $this->nmgp_dados_select['saldo'] = $this->saldo;
              $this->adicional = $rs->fields[14] ; 
              $this->nmgp_dados_select['adicional'] = $this->adicional;
              $this->formapago = $rs->fields[15] ; 
              $this->nmgp_dados_select['formapago'] = $this->formapago;
              $this->adicional2 = $rs->fields[16] ; 
              $this->nmgp_dados_select['adicional2'] = $this->adicional2;
              $this->adicional3 = $rs->fields[17] ; 
              $this->nmgp_dados_select['adicional3'] = $this->adicional3;
              $this->obspago = $rs->fields[18] ; 
              $this->nmgp_dados_select['obspago'] = $this->obspago;
              $this->vendedor = $rs->fields[19] ; 
              $this->nmgp_dados_select['vendedor'] = $this->vendedor;
              $this->pedido = $rs->fields[20] ; 
              $this->nmgp_dados_select['pedido'] = $this->pedido;
              $this->resolucion = $rs->fields[21] ; 
              $this->nmgp_dados_select['resolucion'] = $this->resolucion;
              $this->dircliente = $rs->fields[22] ; 
              $this->nmgp_dados_select['dircliente'] = $this->dircliente;
              $this->imconsumo = $rs->fields[23] ; 
              $this->nmgp_dados_select['imconsumo'] = $this->imconsumo;
              $this->retefuente = $rs->fields[24] ; 
              $this->nmgp_dados_select['retefuente'] = $this->retefuente;
              $this->reteiva = $rs->fields[25] ; 
              $this->nmgp_dados_select['reteiva'] = $this->reteiva;
              $this->reteica = $rs->fields[26] ; 
              $this->nmgp_dados_select['reteica'] = $this->reteica;
              $this->cree = $rs->fields[27] ; 
              $this->nmgp_dados_select['cree'] = $this->cree;
              $this->espos = $rs->fields[28] ; 
              $this->nmgp_dados_select['espos'] = $this->espos;
              $this->cufe = $rs->fields[29] ; 
              $this->nmgp_dados_select['cufe'] = $this->cufe;
              $this->enlacepdf = $rs->fields[30] ; 
              $this->nmgp_dados_select['enlacepdf'] = $this->enlacepdf;
              $this->estado = $rs->fields[31] ; 
              $this->nmgp_dados_select['estado'] = $this->estado;
              $this->avisos = $rs->fields[32] ; 
              $this->nmgp_dados_select['avisos'] = $this->avisos;
              $this->dias_decredito = $rs->fields[33] ; 
              $this->nmgp_dados_select['dias_decredito'] = $this->dias_decredito;
              $this->banco = $rs->fields[34] ; 
              $this->nmgp_dados_select['banco'] = $this->banco;
              $this->tipo = $rs->fields[35] ; 
              $this->nmgp_dados_select['tipo'] = $this->tipo;
              $this->id_fact = $rs->fields[36] ; 
              $this->nmgp_dados_select['id_fact'] = $this->id_fact;
              $this->enviada_a_tns = $rs->fields[37] ; 
              $this->nmgp_dados_select['enviada_a_tns'] = $this->enviada_a_tns;
              $this->fecha_a_tns = $rs->fields[38] ; 
              if (substr($this->fecha_a_tns, 10, 1) == "-") 
              { 
                 $this->fecha_a_tns = substr($this->fecha_a_tns, 0, 10) . " " . substr($this->fecha_a_tns, 11);
              } 
              if (substr($this->fecha_a_tns, 13, 1) == ".") 
              { 
                 $this->fecha_a_tns = substr($this->fecha_a_tns, 0, 13) . ":" . substr($this->fecha_a_tns, 14, 2) . ":" . substr($this->fecha_a_tns, 17);
              } 
              $this->nmgp_dados_select['fecha_a_tns'] = $this->fecha_a_tns;
              $this->factura_tns = $rs->fields[39] ; 
              $this->nmgp_dados_select['factura_tns'] = $this->factura_tns;
              $this->creado_en_movil = $rs->fields[40] ; 
              $this->nmgp_dados_select['creado_en_movil'] = $this->creado_en_movil;
              $this->disponible_en_movil = $rs->fields[41] ; 
              $this->nmgp_dados_select['disponible_en_movil'] = $this->disponible_en_movil;
              $this->mot_nc = $rs->fields[42] ; 
              $this->nmgp_dados_select['mot_nc'] = $this->mot_nc;
              $this->mot_nd = $rs->fields[43] ; 
              $this->nmgp_dados_select['mot_nd'] = $this->mot_nd;
              $this->creado = $rs->fields[44] ; 
              if (substr($this->creado, 10, 1) == "-") 
              { 
                 $this->creado = substr($this->creado, 0, 10) . " " . substr($this->creado, 11);
              } 
              if (substr($this->creado, 13, 1) == ".") 
              { 
                 $this->creado = substr($this->creado, 0, 13) . ":" . substr($this->creado, 14, 2) . ":" . substr($this->creado, 17);
              } 
              $this->nmgp_dados_select['creado'] = $this->creado;
              $this->editado = $rs->fields[45] ; 
              if (substr($this->editado, 10, 1) == "-") 
              { 
                 $this->editado = substr($this->editado, 0, 10) . " " . substr($this->editado, 11);
              } 
              if (substr($this->editado, 13, 1) == ".") 
              { 
                 $this->editado = substr($this->editado, 0, 13) . ":" . substr($this->editado, 14, 2) . ":" . substr($this->editado, 17);
              } 
              $this->nmgp_dados_select['editado'] = $this->editado;
              $this->usuario_crea = $rs->fields[46] ; 
              $this->nmgp_dados_select['usuario_crea'] = $this->usuario_crea;
              $this->cod_cuenta = $rs->fields[47] ; 
              $this->nmgp_dados_select['cod_cuenta'] = $this->cod_cuenta;
              $this->qr_base64 = $rs->fields[48] ; 
              $this->nmgp_dados_select['qr_base64'] = $this->qr_base64;
              $this->fecha_validacion = $rs->fields[49] ; 
              if (substr($this->fecha_validacion, 10, 1) == "-") 
              { 
                 $this->fecha_validacion = substr($this->fecha_validacion, 0, 10) . " " . substr($this->fecha_validacion, 11);
              } 
              if (substr($this->fecha_validacion, 13, 1) == ".") 
              { 
                 $this->fecha_validacion = substr($this->fecha_validacion, 0, 13) . ":" . substr($this->fecha_validacion, 14, 2) . ":" . substr($this->fecha_validacion, 17);
              } 
              $this->nmgp_dados_select['fecha_validacion'] = $this->fecha_validacion;
              $this->id_trans_fe = $rs->fields[50] ; 
              $this->nmgp_dados_select['id_trans_fe'] = $this->id_trans_fe;
              $this->id_clasificacion = $rs->fields[51] ; 
              $this->nmgp_dados_select['id_clasificacion'] = $this->id_clasificacion;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->idfacven = (string)$this->idfacven; 
              $this->numfacven = (string)$this->numfacven; 
              $this->nremision = (string)$this->nremision; 
              $this->credito = (string)$this->credito; 
              $this->idcli = (string)$this->idcli; 
              $this->subtotal = (string)$this->subtotal; 
              $this->valoriva = (string)$this->valoriva; 
              $this->total = (string)$this->total; 
              $this->asentada = (string)$this->asentada; 
              $this->saldo = (string)$this->saldo; 
              $this->adicional = (string)$this->adicional; 
              $this->adicional2 = (string)$this->adicional2; 
              $this->adicional3 = (string)$this->adicional3; 
              $this->vendedor = (string)$this->vendedor; 
              $this->pedido = (string)$this->pedido; 
              $this->resolucion = (string)$this->resolucion; 
              $this->dircliente = (string)$this->dircliente; 
              $this->imconsumo = (string)$this->imconsumo; 
              $this->retefuente = (string)$this->retefuente; 
              $this->reteiva = (string)$this->reteiva; 
              $this->reteica = (string)$this->reteica; 
              $this->cree = (string)$this->cree; 
              $this->dias_decredito = (string)$this->dias_decredito; 
              $this->banco = (string)$this->banco; 
              $this->id_fact = (string)$this->id_fact; 
              $this->usuario_crea = (string)$this->usuario_crea; 
              $this->id_clasificacion = (string)$this->id_clasificacion; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['parms'] = "idfacven?#?$this->idfacven?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->controle_navegacao();
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
              $this->idfacven = "";  
              $this->nmgp_dados_form["idfacven"] = $this->idfacven;
              $this->numfacven = "";  
              $this->nmgp_dados_form["numfacven"] = $this->numfacven;
              $this->nremision = "";  
              $this->nmgp_dados_form["nremision"] = $this->nremision;
              $this->credito = "2";  
              $this->nmgp_dados_form["credito"] = $this->credito;
              $this->fechaven =  date('Y') . "-" . date('m')  . "-" . date('d');
              $this->nmgp_dados_form["fechaven"] = $this->fechaven;
              $this->fechavenc = "";  
              $this->fechavenc_hora = "" ;  
              $this->nmgp_dados_form["fechavenc"] = $this->fechavenc;
              $this->idcli = "";  
              $this->nmgp_dados_form["idcli"] = $this->idcli;
              $this->subtotal = "";  
              $this->nmgp_dados_form["subtotal"] = $this->subtotal;
              $this->valoriva = "";  
              $this->nmgp_dados_form["valoriva"] = $this->valoriva;
              $this->total = "";  
              $this->nmgp_dados_form["total"] = $this->total;
              $this->pagada = "";  
              $this->nmgp_dados_form["pagada"] = $this->pagada;
              $this->asentada = "";  
              $this->nmgp_dados_form["asentada"] = $this->asentada;
              $this->observaciones = "";  
              $this->nmgp_dados_form["observaciones"] = $this->observaciones;
              $this->saldo = "";  
              $this->nmgp_dados_form["saldo"] = $this->saldo;
              $this->adicional = "";  
              $this->nmgp_dados_form["adicional"] = $this->adicional;
              $this->formapago = "EFECTIVO";  
              $this->nmgp_dados_form["formapago"] = $this->formapago;
              $this->adicional2 = "";  
              $this->nmgp_dados_form["adicional2"] = $this->adicional2;
              $this->adicional3 = "";  
              $this->nmgp_dados_form["adicional3"] = $this->adicional3;
              $this->obspago = "";  
              $this->nmgp_dados_form["obspago"] = $this->obspago;
              $this->vendedor = "1";  
              $this->nmgp_dados_form["vendedor"] = $this->vendedor;
              $this->pedido = "";  
              $this->nmgp_dados_form["pedido"] = $this->pedido;
              $this->resolucion = "";  
              $this->nmgp_dados_form["resolucion"] = $this->resolucion;
              $this->dircliente = "";  
              $this->nmgp_dados_form["dircliente"] = $this->dircliente;
              $this->imconsumo = "";  
              $this->nmgp_dados_form["imconsumo"] = $this->imconsumo;
              $this->retefuente = "";  
              $this->nmgp_dados_form["retefuente"] = $this->retefuente;
              $this->reteiva = "";  
              $this->nmgp_dados_form["reteiva"] = $this->reteiva;
              $this->reteica = "";  
              $this->nmgp_dados_form["reteica"] = $this->reteica;
              $this->cree = "";  
              $this->nmgp_dados_form["cree"] = $this->cree;
              $this->espos = "";  
              $this->nmgp_dados_form["espos"] = $this->espos;
              $this->cufe = "";  
              $this->nmgp_dados_form["cufe"] = $this->cufe;
              $this->enlacepdf = "";  
              $this->nmgp_dados_form["enlacepdf"] = $this->enlacepdf;
              $this->estado = "";  
              $this->nmgp_dados_form["estado"] = $this->estado;
              $this->avisos = "";  
              $this->nmgp_dados_form["avisos"] = $this->avisos;
              $this->dias_decredito = "0";  
              $this->nmgp_dados_form["dias_decredito"] = $this->dias_decredito;
              $this->banco = "";  
              $this->nmgp_dados_form["banco"] = $this->banco;
              $this->tipo = "FV";  
              $this->nmgp_dados_form["tipo"] = $this->tipo;
              $this->id_fact = "";  
              $this->nmgp_dados_form["id_fact"] = $this->id_fact;
              $this->enviada_a_tns = "";  
              $this->nmgp_dados_form["enviada_a_tns"] = $this->enviada_a_tns;
              $this->fecha_a_tns = "";  
              $this->fecha_a_tns_hora = "" ;  
              $this->nmgp_dados_form["fecha_a_tns"] = $this->fecha_a_tns;
              $this->factura_tns = "";  
              $this->nmgp_dados_form["factura_tns"] = $this->factura_tns;
              $this->creado_en_movil = "";  
              $this->nmgp_dados_form["creado_en_movil"] = $this->creado_en_movil;
              $this->disponible_en_movil = "";  
              $this->nmgp_dados_form["disponible_en_movil"] = $this->disponible_en_movil;
              $this->mot_nc = "";  
              $this->nmgp_dados_form["mot_nc"] = $this->mot_nc;
              $this->mot_nd = "";  
              $this->nmgp_dados_form["mot_nd"] = $this->mot_nd;
              $this->creado = "";  
              $this->creado_hora = "" ;  
              $this->nmgp_dados_form["creado"] = $this->creado;
              $this->editado = "";  
              $this->editado_hora = "" ;  
              $this->nmgp_dados_form["editado"] = $this->editado;
              $this->usuario_crea = "";  
              $this->nmgp_dados_form["usuario_crea"] = $this->usuario_crea;
              $this->cod_cuenta = "";  
              $this->nmgp_dados_form["cod_cuenta"] = $this->cod_cuenta;
              $this->qr_base64 = "";  
              $this->nmgp_dados_form["qr_base64"] = $this->qr_base64;
              $this->fecha_validacion = "";  
              $this->fecha_validacion_hora = "" ;  
              $this->nmgp_dados_form["fecha_validacion"] = $this->fecha_validacion;
              $this->id_trans_fe = "";  
              $this->nmgp_dados_form["id_trans_fe"] = $this->id_trans_fe;
              $this->id_clasificacion = "1";  
              $this->nmgp_dados_form["id_clasificacion"] = $this->id_clasificacion;
              $this->detalle = "";  
              $this->nmgp_dados_form["detalle"] = $this->detalle;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['foreign_key'] as $sFKName => $sFKValue)
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_detalleventa_mob']['embutida_parms'] = "didfacven*scin" . $this->nmgp_dados_form['idfacven'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
  }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas']['record_state'][$sc_seq_vert]['buttons']['update'];
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_facturaven_automaticas_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_facturaven_automaticas_mob_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("idfacven", "numfacven", "nremision", "credito", "fechaven", "fechavenc", "idcli", "subtotal", "valoriva", "total", "pagada", "asentada", "observaciones", "saldo", "adicional", "formapago", "adicional2", "adicional3", "obspago", "vendedor", "pedido", "resolucion", "dircliente", "imconsumo", "retefuente", "reteiva", "reteica", "cree", "espos", "cufe", "enlacepdf", "estado", "avisos", "dias_decredito", "banco", "tipo", "id_fact", "enviada_a_tns", "fecha_a_tns", "factura_tns", "creado_en_movil", "disponible_en_movil", "mot_nc", "mot_nd", "creado", "editado", "usuario_crea", "cod_cuenta", "qr_base64", "fecha_validacion", "id_trans_fe"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['csrf_token'];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_resolucion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_resolucion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_resolucion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_resolucion'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_resolucion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_resolucion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_resolucion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_resolucion'] = array(); 
    }

   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_vendedor = $this->vendedor;
   $old_value_numfacven = $this->numfacven;
   $old_value_idfacven = $this->idfacven;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_vendedor = $this->vendedor;
   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_idfacven = $this->idfacven;

   $nm_comando = "SELECT Idres, prefijo  FROM resdian  WHERE activa='SI' ORDER BY prefijo";

   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->vendedor = $old_value_vendedor;
   $this->numfacven = $old_value_numfacven;
   $this->idfacven = $old_value_idfacven;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_resolucion'][] = $rs->fields[0];
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
   function Form_lookup_credito()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Crédito?#?1?#?N?@?";
       $nmgp_def_dados .= "Contado?#?2?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_idcli()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_idcli']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_idcli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_idcli']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_idcli'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_idcli']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_idcli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_idcli']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_idcli'] = array(); 
    }

   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_vendedor = $this->vendedor;
   $old_value_numfacven = $this->numfacven;
   $old_value_idfacven = $this->idfacven;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_vendedor = $this->vendedor;
   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_idfacven = $this->idfacven;

   $nm_comando = "SELECT idtercero, nombres  FROM terceros  ORDER BY nombres";

   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->vendedor = $old_value_vendedor;
   $this->numfacven = $old_value_numfacven;
   $this->idfacven = $old_value_idfacven;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_idcli'][] = $rs->fields[0];
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
   function Form_lookup_dircliente()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_dircliente']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_dircliente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_dircliente']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_dircliente'] = array(); 
}
if ($this->idcli != "")
{ 
   $this->nm_clear_val("idcli");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_dircliente']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_dircliente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_dircliente']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_dircliente'] = array(); 
    }

   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_vendedor = $this->vendedor;
   $old_value_numfacven = $this->numfacven;
   $old_value_idfacven = $this->idfacven;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_vendedor = $this->vendedor;
   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_idfacven = $this->idfacven;

   $nm_comando = "SELECT iddireccion, direc FROM direccion  WHERE idter='$this->idcli' ORDER BY direc";

   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->vendedor = $old_value_vendedor;
   $this->numfacven = $old_value_numfacven;
   $this->idfacven = $old_value_idfacven;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_dircliente'][] = $rs->fields[0];
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
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_id_clasificacion()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_id_clasificacion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_id_clasificacion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_id_clasificacion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_id_clasificacion'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_id_clasificacion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_id_clasificacion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_id_clasificacion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_id_clasificacion'] = array(); 
    }

   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_vendedor = $this->vendedor;
   $old_value_numfacven = $this->numfacven;
   $old_value_idfacven = $this->idfacven;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_vendedor = $this->vendedor;
   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_idfacven = $this->idfacven;

   $nm_comando = "SELECT id, descripcion  FROM facturaven_clasificacion  ORDER BY descripcion";

   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->vendedor = $old_value_vendedor;
   $this->numfacven = $old_value_numfacven;
   $this->idfacven = $old_value_idfacven;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['Lookup_id_clasificacion'][] = $rs->fields[0];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_facturaven_automaticas_mob_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "idfacven", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "numfacven", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nremision", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_credito($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "credito", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fechaven", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fechavenc", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_idcli($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "idcli", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "subtotal", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "valoriva", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "total", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "pagada", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "asentada", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "observaciones", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "saldo", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "adicional", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "formapago", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "adicional2", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "adicional3", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "obspago", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "vendedor", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "pedido", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_resolucion($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "resolucion", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_dircliente($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "dircliente", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "imconsumo", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "retefuente", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "reteiva", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "reteica", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cree", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "espos", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cufe", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "enlacepdf", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "estado", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "avisos", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "dias_decredito", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "banco", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tipo", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "id_fact", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "enviada_a_tns", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecha_a_tns", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "factura_tns", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "creado_en_movil", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "disponible_en_movil", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "mot_nc", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "mot_nd", $arg_search, $data_search);
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
              $this->SC_monta_condicao($comando, "usuario_crea", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cod_cuenta", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "qr_base64", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecha_validacion", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "id_trans_fe", $arg_search, $data_search);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_facturaven_automaticas_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['total'] = $qt_geral_reg_form_facturaven_automaticas_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_facturaven_automaticas_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_facturaven_automaticas_mob_pack_ajax_response();
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
      $nm_numeric[] = "idfacven";$nm_numeric[] = "numfacven";$nm_numeric[] = "nremision";$nm_numeric[] = "credito";$nm_numeric[] = "idcli";$nm_numeric[] = "subtotal";$nm_numeric[] = "valoriva";$nm_numeric[] = "total";$nm_numeric[] = "asentada";$nm_numeric[] = "saldo";$nm_numeric[] = "adicional";$nm_numeric[] = "adicional2";$nm_numeric[] = "adicional3";$nm_numeric[] = "vendedor";$nm_numeric[] = "pedido";$nm_numeric[] = "resolucion";$nm_numeric[] = "dircliente";$nm_numeric[] = "imconsumo";$nm_numeric[] = "retefuente";$nm_numeric[] = "reteiva";$nm_numeric[] = "reteica";$nm_numeric[] = "cree";$nm_numeric[] = "dias_decredito";$nm_numeric[] = "banco";$nm_numeric[] = "id_fact";$nm_numeric[] = "usuario_crea";$nm_numeric[] = "id_clasificacion";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['decimal_db'] == ".")
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
      $Nm_datas['fechaven'] = "date";$Nm_datas['fechavenc'] = "date";$Nm_datas['fecha_a_tns'] = "timestamp";$Nm_datas['creado'] = "datetime";$Nm_datas['editado'] = "datetime";$Nm_datas['fecha_validacion'] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['SC_sep_date1'];
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
   function SC_lookup_credito($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "Crédito";
       $data_look['2'] = "Contado";
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
   function SC_lookup_idcli($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT nombres, idtercero FROM terceros WHERE (nombres LIKE '%$campo%')" ; 
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
   function SC_lookup_resolucion($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT prefijo, Idres FROM resdian WHERE (CAST (Idres AS TEXT) LIKE '%$campo%') AND (activa='SI')" ; 
       }
       else
       {
           $nm_comando = "SELECT prefijo, Idres FROM resdian WHERE (prefijo LIKE '%$campo%') AND (activa='SI')" ; 
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
   function SC_lookup_dircliente($condicao, $campo)
   {
       return $campo;
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
       $nmgp_saida_form = "form_facturaven_automaticas_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_facturaven_automaticas_mob_fim.php";
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
       form_facturaven_automaticas_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_facturaven_automaticas_mob']['masterValue']);
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
                return array("sc_b_new_t.sc-unique-btn-1", "sc_b_new_t.sc-unique-btn-8");
                break;
            case "insert":
                return array("sc_b_ins_t.sc-unique-btn-2", "sc_b_ins_t.sc-unique-btn-9");
                break;
            case "update":
                return array("sc_b_upd_t.sc-unique-btn-3", "sc_b_upd_t.sc-unique-btn-10");
                break;
            case "delete":
                return array("sc_b_del_t.sc-unique-btn-4", "sc_b_del_t.sc-unique-btn-11");
                break;
            case "help":
                return array("sc_b_hlp_t");
                break;
            case "exit":
                return array("sc_b_sai_t.sc-unique-btn-5", "sc_b_sai_t.sc-unique-btn-7", "sc_b_sai_t.sc-unique-btn-12", "sc_b_sai_t.sc-unique-btn-14", "sc_b_sai_t.sc-unique-btn-6", "sc_b_sai_t.sc-unique-btn-13");
                break;
        }

        return array($buttonName);
    } // getButtonIds

}
?>
