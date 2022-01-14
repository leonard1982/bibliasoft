<?php
//
class fac_compras_mob_apl
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
   var $idfaccom;
   var $numfacom;
   var $formapago;
   var $formapago_1;
   var $fechacom;
   var $fechavenc;
   var $idprov;
   var $subtotal;
   var $valoriva;
   var $total;
   var $pagada;
   var $asentada;
   var $asentada_1;
   var $control;
   var $observaciones;
   var $saldo;
   var $anulada;
   var $anulada_1;
   var $es_remision;
   var $es_remision_1;
   var $id_pedidocom;
   var $id_pedidocom_1;
   var $retencion;
   var $retencion_1;
   var $reteica;
   var $reteica_1;
   var $reteiva;
   var $usuario;
   var $banco;
   var $banco_1;
   var $num_ndevolucion;
   var $creado;
   var $creado_hora;
   var $editado;
   var $editado_hora;
   var $cod_cuenta;
   var $detalle;
   var $hdetalle;
   var $prefijo_delpedido;
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
          if (isset($this->NM_ajax_info['param']['anulada']))
          {
              $this->anulada = $this->NM_ajax_info['param']['anulada'];
          }
          if (isset($this->NM_ajax_info['param']['asentada']))
          {
              $this->asentada = $this->NM_ajax_info['param']['asentada'];
          }
          if (isset($this->NM_ajax_info['param']['banco']))
          {
              $this->banco = $this->NM_ajax_info['param']['banco'];
          }
          if (isset($this->NM_ajax_info['param']['cod_cuenta']))
          {
              $this->cod_cuenta = $this->NM_ajax_info['param']['cod_cuenta'];
          }
          if (isset($this->NM_ajax_info['param']['control']))
          {
              $this->control = $this->NM_ajax_info['param']['control'];
          }
          if (isset($this->NM_ajax_info['param']['creado']))
          {
              $this->creado = $this->NM_ajax_info['param']['creado'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['detalle']))
          {
              $this->detalle = $this->NM_ajax_info['param']['detalle'];
          }
          if (isset($this->NM_ajax_info['param']['editado']))
          {
              $this->editado = $this->NM_ajax_info['param']['editado'];
          }
          if (isset($this->NM_ajax_info['param']['es_remision']))
          {
              $this->es_remision = $this->NM_ajax_info['param']['es_remision'];
          }
          if (isset($this->NM_ajax_info['param']['fechacom']))
          {
              $this->fechacom = $this->NM_ajax_info['param']['fechacom'];
          }
          if (isset($this->NM_ajax_info['param']['fechavenc']))
          {
              $this->fechavenc = $this->NM_ajax_info['param']['fechavenc'];
          }
          if (isset($this->NM_ajax_info['param']['formapago']))
          {
              $this->formapago = $this->NM_ajax_info['param']['formapago'];
          }
          if (isset($this->NM_ajax_info['param']['hdetalle']))
          {
              $this->hdetalle = $this->NM_ajax_info['param']['hdetalle'];
          }
          if (isset($this->NM_ajax_info['param']['id_pedidocom']))
          {
              $this->id_pedidocom = $this->NM_ajax_info['param']['id_pedidocom'];
          }
          if (isset($this->NM_ajax_info['param']['idfaccom']))
          {
              $this->idfaccom = $this->NM_ajax_info['param']['idfaccom'];
          }
          if (isset($this->NM_ajax_info['param']['idprov']))
          {
              $this->idprov = $this->NM_ajax_info['param']['idprov'];
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
          if (isset($this->NM_ajax_info['param']['numfacom']))
          {
              $this->numfacom = $this->NM_ajax_info['param']['numfacom'];
          }
          if (isset($this->NM_ajax_info['param']['observaciones']))
          {
              $this->observaciones = $this->NM_ajax_info['param']['observaciones'];
          }
          if (isset($this->NM_ajax_info['param']['pagada']))
          {
              $this->pagada = $this->NM_ajax_info['param']['pagada'];
          }
          if (isset($this->NM_ajax_info['param']['prefijo_delpedido']))
          {
              $this->prefijo_delpedido = $this->NM_ajax_info['param']['prefijo_delpedido'];
          }
          if (isset($this->NM_ajax_info['param']['reteica']))
          {
              $this->reteica = $this->NM_ajax_info['param']['reteica'];
          }
          if (isset($this->NM_ajax_info['param']['reteiva']))
          {
              $this->reteiva = $this->NM_ajax_info['param']['reteiva'];
          }
          if (isset($this->NM_ajax_info['param']['retencion']))
          {
              $this->retencion = $this->NM_ajax_info['param']['retencion'];
          }
          if (isset($this->NM_ajax_info['param']['saldo']))
          {
              $this->saldo = $this->NM_ajax_info['param']['saldo'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['subtotal']))
          {
              $this->subtotal = $this->NM_ajax_info['param']['subtotal'];
          }
          if (isset($this->NM_ajax_info['param']['total']))
          {
              $this->total = $this->NM_ajax_info['param']['total'];
          }
          if (isset($this->NM_ajax_info['param']['usuario']))
          {
              $this->usuario = $this->NM_ajax_info['param']['usuario'];
          }
          if (isset($this->NM_ajax_info['param']['valoriva']))
          {
              $this->valoriva = $this->NM_ajax_info['param']['valoriva'];
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
      if (isset($this->par_idfaccom) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_idfaccom'] = $this->par_idfaccom;
      }
      if (isset($this->gidtercero) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gidtercero'] = $this->gidtercero;
      }
      if (isset($this->elpedi) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['elpedi'] = $this->elpedi;
      }
      if (isset($_POST["par_idfaccom"]) && isset($this->par_idfaccom)) 
      {
          $_SESSION['par_idfaccom'] = $this->par_idfaccom;
      }
      if (isset($_POST["gidtercero"]) && isset($this->gidtercero)) 
      {
          $_SESSION['gidtercero'] = $this->gidtercero;
      }
      if (isset($_POST["elpedi"]) && isset($this->elpedi)) 
      {
          $_SESSION['elpedi'] = $this->elpedi;
      }
      if (isset($_GET["par_idfaccom"]) && isset($this->par_idfaccom)) 
      {
          $_SESSION['par_idfaccom'] = $this->par_idfaccom;
      }
      if (isset($_GET["gidtercero"]) && isset($this->gidtercero)) 
      {
          $_SESSION['gidtercero'] = $this->gidtercero;
      }
      if (isset($_GET["elpedi"]) && isset($this->elpedi)) 
      {
          $_SESSION['elpedi'] = $this->elpedi;
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['fac_compras_mob']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['fac_compras_mob']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['fac_compras_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['fac_compras_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['fac_compras_mob']['embutida_parms']);
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
                 nm_limpa_str_fac_compras_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->par_idfaccom)) 
          {
              $_SESSION['par_idfaccom'] = $this->par_idfaccom;
          }
          if (isset($this->gidtercero)) 
          {
              $_SESSION['gidtercero'] = $this->gidtercero;
          }
          if (isset($this->elpedi)) 
          {
              $_SESSION['elpedi'] = $this->elpedi;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['fac_compras_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['fac_compras_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['fac_compras_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['fac_compras_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->par_idfaccom)) 
          {
              $_SESSION['par_idfaccom'] = $this->par_idfaccom;
          }
          if (isset($this->gidtercero)) 
          {
              $_SESSION['gidtercero'] = $this->gidtercero;
          }
          if (isset($this->elpedi)) 
          {
              $_SESSION['elpedi'] = $this->elpedi;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['fac_compras_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['fac_compras_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['fac_compras_mob']['nm_run_menu'] = 1;
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
          $_SESSION['sc_session'][$script_case_init]['fac_compras_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['fac_compras_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['fac_compras_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['fac_compras_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['fac_compras_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['fac_compras_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['fac_compras_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new fac_compras_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['fac_compras']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['fac_compras'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['fac_compras_mob']['upload_field_info'] = array();

      $this->Ini->Init_apl_lig = array();
      $this->List_apl_lig = array('blank_compras'=>array('type'=>'blank', 'lab'=>'Vista Previa Factura de Compra', 'hint'=>'Vista previa de la Compra', 'img_on'=>'scriptcase__NM__ico__NM__printer3_32.png', 'img_off'=>'scriptcase__NM__ico__NM__printer3_32.png'));
      if (isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['sc_outra_jan'] || $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['sc_modal']))
      {
          foreach ($this->List_apl_lig as $apl_name => $Lig_parms)
          {
              if (!isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init'][$apl_name]))
              {
                  $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init'][$apl_name] = rand(2, 10000);
              }
              $this->Ini->Init_apl_lig[$apl_name]['ini']     = "&script_case_init=" . $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init'][$apl_name];
              $this->Ini->Init_apl_lig[$apl_name]['type']    = $Lig_parms['type'];
              $this->Ini->Init_apl_lig[$apl_name]['lab']     = $Lig_parms['lab'];
              $this->Ini->Init_apl_lig[$apl_name]['hint']    = $Lig_parms['hint'];
              $this->Ini->Init_apl_lig[$apl_name]['img_on']  = $Lig_parms['img_on'];
              $this->Ini->Init_apl_lig[$apl_name]['img_off'] = $Lig_parms['img_off'];
          }
      }
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['fac_compras_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['fac_compras_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['fac_compras_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['fac_compras_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('fac_compras_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['fac_compras_mob']['label'] = "Editar Compra";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "fac_compras_mob")
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


      $this->arr_buttons['eliminar']['hint']             = "Elimina compra que no tenga detalle";
      $this->arr_buttons['eliminar']['type']             = "button";
      $this->arr_buttons['eliminar']['value']            = "Eliminar";
      $this->arr_buttons['eliminar']['display']          = "only_text";
      $this->arr_buttons['eliminar']['display_position'] = "text_right";
      $this->arr_buttons['eliminar']['style']            = "default";
      $this->arr_buttons['eliminar']['image']            = "";

      $this->arr_buttons['sc_btn_0']['hint']             = "Vista previa de la compra";
      $this->arr_buttons['sc_btn_0']['type']             = "image";
      $this->arr_buttons['sc_btn_0']['value']            = "Vista previa";
      $this->arr_buttons['sc_btn_0']['display']          = "only_img";
      $this->arr_buttons['sc_btn_0']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_0']['style']            = "";
      $this->arr_buttons['sc_btn_0']['image']            = "grp__NM__ico__NM__preview_search_find_locate_1551.png";


      $_SESSION['scriptcase']['error_icon']['fac_compras_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Lemon__NM__nm_scriptcase9_Lemon_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['fac_compras_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
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
      $this->nmgp_botoes['Eliminar'] = "on";
      $this->nmgp_botoes['sc_btn_0'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['fac_compras_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['fac_compras_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['fac_compras_mob'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_form'];
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['pagada'] != "null"){$this->pagada = $this->nmgp_dados_form['pagada'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['asentada'] != "null"){$this->asentada = $this->nmgp_dados_form['asentada'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['anulada'] != "null"){$this->anulada = $this->nmgp_dados_form['anulada'];} 
          if (!isset($this->num_ndevolucion)){$this->num_ndevolucion = $this->nmgp_dados_form['num_ndevolucion'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("fac_compras_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'fac_compras/fac_compras_mob_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'fac_compras_mob_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'fac_compras_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'fac_compras_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'fac_compras/fac_compras_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "fac_compras_mob_erro.class.php"); 
      }
      $this->Erro      = new fac_compras_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['opcao']))
         { 
             if ($this->idfaccom != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['fac_compras_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['Eliminar'] = "off";
          $this->nmgp_botoes['sc_btn_0'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['Eliminar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['botoes']['Eliminar'];
          $this->nmgp_botoes['sc_btn_0'] = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['botoes']['sc_btn_0'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_form'];
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

            $out1_img_cache = $_SESSION['scriptcase']['fac_compras_mob']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['fac_compras_mob']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
      if (isset($this->idfaccom)) { $this->nm_limpa_alfa($this->idfaccom); }
      if (isset($this->numfacom)) { $this->nm_limpa_alfa($this->numfacom); }
      if (isset($this->formapago)) { $this->nm_limpa_alfa($this->formapago); }
      if (isset($this->idprov)) { $this->nm_limpa_alfa($this->idprov); }
      if (isset($this->subtotal)) { $this->nm_limpa_alfa($this->subtotal); }
      if (isset($this->valoriva)) { $this->nm_limpa_alfa($this->valoriva); }
      if (isset($this->total)) { $this->nm_limpa_alfa($this->total); }
      if (isset($this->pagada)) { $this->nm_limpa_alfa($this->pagada); }
      if (isset($this->asentada)) { $this->nm_limpa_alfa($this->asentada); }
      if (isset($this->control)) { $this->nm_limpa_alfa($this->control); }
      if (isset($this->observaciones)) { $this->nm_limpa_alfa($this->observaciones); }
      if (isset($this->saldo)) { $this->nm_limpa_alfa($this->saldo); }
      if (isset($this->anulada)) { $this->nm_limpa_alfa($this->anulada); }
      if (isset($this->es_remision)) { $this->nm_limpa_alfa($this->es_remision); }
      if (isset($this->id_pedidocom)) { $this->nm_limpa_alfa($this->id_pedidocom); }
      if (isset($this->retencion)) { $this->nm_limpa_alfa($this->retencion); }
      if (isset($this->reteica)) { $this->nm_limpa_alfa($this->reteica); }
      if (isset($this->reteiva)) { $this->nm_limpa_alfa($this->reteiva); }
      if (isset($this->usuario)) { $this->nm_limpa_alfa($this->usuario); }
      if (isset($this->banco)) { $this->nm_limpa_alfa($this->banco); }
      if (isset($this->cod_cuenta)) { $this->nm_limpa_alfa($this->cod_cuenta); }
      if (isset($this->detalle)) { $this->nm_limpa_alfa($this->detalle); }
      if ($nm_opc_form_php == "formphp")
      { 
          if ($nm_call_php == "Eliminar")
          { 
              $this->sc_btn_Eliminar();
          } 
          $this->NM_close_db(); 
          exit;
      } 
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- fechacom
      $this->field_config['fechacom']                 = array();
      $this->field_config['fechacom']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fechacom']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechacom']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fechacom');
      //-- fechavenc
      $this->field_config['fechavenc']                 = array();
      $this->field_config['fechavenc']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fechavenc']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechavenc']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fechavenc');
      //-- total
      $this->field_config['total']               = array();
      $this->field_config['total']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['total']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['total']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['total']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['total']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['total']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- saldo
      $this->field_config['saldo']               = array();
      $this->field_config['saldo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['saldo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['saldo']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['saldo']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['saldo']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['saldo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- subtotal
      $this->field_config['subtotal']               = array();
      $this->field_config['subtotal']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['subtotal']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['subtotal']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['subtotal']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['subtotal']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['subtotal']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- valoriva
      $this->field_config['valoriva']               = array();
      $this->field_config['valoriva']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['valoriva']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valoriva']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['valoriva']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['valoriva']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['valoriva']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- reteiva
      $this->field_config['reteiva']               = array();
      $this->field_config['reteiva']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['reteiva']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['reteiva']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['reteiva']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['reteiva']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- idfaccom
      $this->field_config['idfaccom']               = array();
      $this->field_config['idfaccom']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idfaccom']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idfaccom']['symbol_dec'] = '';
      $this->field_config['idfaccom']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idfaccom']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- control
      $this->field_config['control']               = array();
      $this->field_config['control']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['control']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['control']['symbol_dec'] = '';
      $this->field_config['control']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['control']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- usuario
      $this->field_config['usuario']               = array();
      $this->field_config['usuario']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['usuario']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['usuario']['symbol_dec'] = '';
      $this->field_config['usuario']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['usuario']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
      //-- num_ndevolucion
      $this->field_config['num_ndevolucion']               = array();
      $this->field_config['num_ndevolucion']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['num_ndevolucion']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['num_ndevolucion']['symbol_dec'] = '';
      $this->field_config['num_ndevolucion']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['num_ndevolucion']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
          if ('validate_es_remision' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'es_remision');
          }
          if ('validate_id_pedidocom' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_pedidocom');
          }
          if ('validate_numfacom' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numfacom');
          }
          if ('validate_fechacom' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fechacom');
          }
          if ('validate_idprov' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idprov');
          }
          if ('validate_formapago' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'formapago');
          }
          if ('validate_fechavenc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fechavenc');
          }
          if ('validate_total' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'total');
          }
          if ('validate_saldo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'saldo');
          }
          if ('validate_pagada' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pagada');
          }
          if ('validate_anulada' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'anulada');
          }
          if ('validate_asentada' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'asentada');
          }
          if ('validate_subtotal' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'subtotal');
          }
          if ('validate_valoriva' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valoriva');
          }
          if ('validate_retencion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'retencion');
          }
          if ('validate_reteica' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'reteica');
          }
          if ('validate_reteiva' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'reteiva');
          }
          if ('validate_banco' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'banco');
          }
          if ('validate_idfaccom' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idfaccom');
          }
          if ('validate_detalle' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'detalle');
          }
          if ('validate_hdetalle' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hdetalle');
          }
          if ('validate_prefijo_delpedido' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'prefijo_delpedido');
          }
          if ('validate_observaciones' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'observaciones');
          }
          if ('validate_control' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'control');
          }
          if ('validate_usuario' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'usuario');
          }
          if ('validate_cod_cuenta' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cod_cuenta');
          }
          if ('validate_creado' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'creado');
          }
          if ('validate_editado' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'editado');
          }
          fac_compras_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_asentada_onchange' == $this->NM_ajax_opcao)
          {
              $this->asentada_onChange();
          }
          if ('event_hdetalle_onclick' == $this->NM_ajax_opcao)
          {
              $this->hdetalle_onClick();
          }
          if ('event_hdetalle_onfocus' == $this->NM_ajax_opcao)
          {
              $this->hdetalle_onFocus();
          }
          if ('event_id_pedidocom_onchange' == $this->NM_ajax_opcao)
          {
              $this->id_pedidocom_onChange();
          }
          if ('event_idprov_onchange' == $this->NM_ajax_opcao)
          {
              $this->idprov_onChange();
          }
          fac_compras_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('autocomp_idprov' == $this->NM_ajax_opcao)
          {
              if (isset($_GET['term'])) {
                  $this->idprov = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->idprov = '';
              }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_idprov']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_idprov'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_idprov']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_idprov'] = array(); 
    }

   $old_value_fechacom = $this->fechacom;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_total = $this->total;
   $old_value_saldo = $this->saldo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_reteiva = $this->reteiva;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_control = $this->control;
   $old_value_usuario = $this->usuario;
   $old_value_creado = $this->creado;
   $old_value_creado_hora = $this->creado_hora;
   $old_value_editado = $this->editado;
   $old_value_editado_hora = $this->editado_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechacom = $this->fechacom;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_total = $this->total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_control = $this->control;
   $unformatted_value_usuario = $this->usuario;
   $unformatted_value_creado = $this->creado;
   $unformatted_value_creado_hora = $this->creado_hora;
   $unformatted_value_editado = $this->editado;
   $unformatted_value_editado_hora = $this->editado_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + \" - \" + nombres FROM terceros WHERE (proveedor='SI') AND documento + \" - \" + nombres LIKE '%" . substr($this->Db->qstr($this->idprov), 1, -1) . "%' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento, \" - \",nombres) FROM terceros WHERE (proveedor='SI') AND concat(documento, \" - \",nombres) LIKE '%" . substr($this->Db->qstr($this->idprov), 1, -1) . "%' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&\" - \"&nombres FROM terceros WHERE (proveedor='SI') AND documento&\" - \"&nombres LIKE '%" . substr($this->Db->qstr($this->idprov), 1, -1) . "%' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||\" - \"||nombres FROM terceros WHERE (proveedor='SI') AND documento||\" - \"||nombres LIKE '%" . substr($this->Db->qstr($this->idprov), 1, -1) . "%' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + \" - \" + nombres FROM terceros WHERE (proveedor='SI') AND documento + \" - \" + nombres LIKE '%" . substr($this->Db->qstr($this->idprov), 1, -1) . "%' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||\" - \"||nombres FROM terceros WHERE (proveedor='SI') AND documento||\" - \"||nombres LIKE '%" . substr($this->Db->qstr($this->idprov), 1, -1) . "%' ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||\" - \"||nombres FROM terceros WHERE (proveedor='SI') AND documento||\" - \"||nombres LIKE '%" . substr($this->Db->qstr($this->idprov), 1, -1) . "%' ORDER BY documento, nombres";
   }

   $this->fechacom = $old_value_fechacom;
   $this->fechavenc = $old_value_fechavenc;
   $this->total = $old_value_total;
   $this->saldo = $old_value_saldo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->reteiva = $old_value_reteiva;
   $this->idfaccom = $old_value_idfaccom;
   $this->control = $old_value_control;
   $this->usuario = $old_value_usuario;
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
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(fac_compras_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', fac_compras_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_idprov'][] = $rs->fields[0];
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
          fac_compras_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['anulada']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->anulada = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['anulada'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['observaciones']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->observaciones = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['observaciones'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['banco']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->banco = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['banco'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['credito']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->credito = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['credito'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['fechavenc']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->fechavenc = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['fechavenc'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['pagada']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->pagada = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['pagada'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['id_pedidocom']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->id_pedidocom = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['id_pedidocom'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['es_remision']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->es_remision = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['es_remision'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['idprov']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->idprov = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['idprov'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['fechacom']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->fechacom = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['fechacom'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['numfacom']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->numfacom = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['numfacom'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['formapago']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->formapago = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['formapago'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['asentada']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->asentada = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select']['asentada'];
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
    if ('recarga' == $nm_sc_sv_opcao) {
      $_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'on';
  $this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
$_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'off'; 
    }
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              fac_compras_mob_pack_ajax_response();
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
          $_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  fac_compras_mob_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          fac_compras_mob_pack_ajax_response();
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
          fac_compras_mob_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "fac_compras_mob.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Editar Compra") ?></TITLE>
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
<form name="Fdown" method="get" action="fac_compras_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="fac_compras_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="fac_compras_mob.php" target="_self" style="display: none"> 
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
   function sc_btn_Eliminar() 
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;
 
     ob_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
 <head>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

      if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
      {
?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
      }

?>
        <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
    <SCRIPT type="text/javascript">
      var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
      var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
      var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
      var sc_userSweetAlertDisplayed = false;
    </SCRIPT>
    <SCRIPT type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<?php
include_once("fac_compras_mob_sajax_js.php");
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
    <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
    <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 </head>
  <body class="scFormPage">
      <table class="scFormTabela" align="center"><tr><td>
<?php
      $varloc_btn_php = array();
      $nmgp_opcao_saida_php = "igual";
      $nmgp_opc_ant_saida_php = "";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      else
      {
          if (!isset($this->idfaccom) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_form']['idfaccom']))
          {
              $varloc_btn_php['idfaccom'] = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_form']['idfaccom'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_form']['total'];
          }
          if (!isset($this->numfacom) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_form']['numfacom']))
          {
              $varloc_btn_php['numfacom'] = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_form']['numfacom'];
          }
      }
      $nm_f_saida = "fac_compras_mob.php";
      nm_limpa_data($this->fechacom, $this->field_config['fechacom']['date_sep']) ; 
      nm_limpa_data($this->fechavenc, $this->field_config['fechavenc']['date_sep']) ; 
      if (!empty($this->field_config['total']['symbol_dec']))
      {
          $this->sc_remove_currency($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp'], $this->field_config['total']['symbol_mon']); 
          nm_limpa_valor($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['saldo']['symbol_dec']))
      {
          $this->sc_remove_currency($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp'], $this->field_config['saldo']['symbol_mon']); 
          nm_limpa_valor($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['subtotal']['symbol_dec']))
      {
          $this->sc_remove_currency($this->subtotal, $this->field_config['subtotal']['symbol_dec'], $this->field_config['subtotal']['symbol_grp'], $this->field_config['subtotal']['symbol_mon']); 
          nm_limpa_valor($this->subtotal, $this->field_config['subtotal']['symbol_dec'], $this->field_config['subtotal']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['valoriva']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valoriva, $this->field_config['valoriva']['symbol_dec'], $this->field_config['valoriva']['symbol_grp'], $this->field_config['valoriva']['symbol_mon']); 
          nm_limpa_valor($this->valoriva, $this->field_config['valoriva']['symbol_dec'], $this->field_config['valoriva']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['reteiva']['symbol_dec']))
      {
          nm_limpa_valor($this->reteiva, $this->field_config['reteiva']['symbol_dec'], $this->field_config['reteiva']['symbol_grp']) ; 
      }
      nm_limpa_numero($this->idfaccom, $this->field_config['idfaccom']['symbol_grp']) ; 
      nm_limpa_numero($this->control, $this->field_config['control']['symbol_grp']) ; 
      nm_limpa_numero($this->usuario, $this->field_config['usuario']['symbol_grp']) ; 
      nm_limpa_data($this->creado, $this->field_config['creado']['date_sep']) ; 
      nm_limpa_hora($this->creado_hora, $this->field_config['creado']['time_sep']) ; 
      nm_limpa_data($this->editado, $this->field_config['editado']['date_sep']) ; 
      nm_limpa_hora($this->editado_hora, $this->field_config['editado']['time_sep']) ; 
      $this->nm_converte_datas();
      foreach ($varloc_btn_php as $cmp => $val_cmp)
      {
          $this->$cmp = $val_cmp;
      }
      $_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
  ?>
<script src="<?php echo sc_url_library('prj', 'js', 'jquery-1.11.1.js'); ?>"></script>
<script src="<?php echo sc_url_library('prj', 'js', 'alertify.js'); ?>"></script>

<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'css/alertify.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'css/themes/default.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'css/themes/semantic.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'css/themes/bootstrap.min.css'); ?>">
<?php


$idfcom=$this->idfaccom ;
if ($this->total <>0)
	{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_fac_compras_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_fac_compras_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "";
 }
;
	echo "<script>alertify.alert('Alerta', '¡Compra Tiene Items asociados, por favor elimine datalle primero!', function(){ window.location.href='../grid_compras'; });</script>";
	}
else
	{
	  
      $nm_select = "select id_pedidocom from facturacom where idfaccom=$idfcom"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->data = array();
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
                      $this->data[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->data = false;
          $this->data_erro = $this->Db->ErrorMsg();
      } 
;
	 if(isset($this->data[0][0]))
		 {
		 if($this->data[0][0]>0)echo "hola";
			 {
			 $pedi=$this->data[0][0];
			 
     $nm_select ="update pedidos set numfacven=NULL, facturado='NO' where idpedido=$pedi"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                fac_compras_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			 }
		 }
	
     $nm_select ="DELETE FROM facturacom WHERE idfaccom=$idfcom"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                fac_compras_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	

     $nm_select ="insert into log set usuario='".$this->sc_temp_gidtercero."',accion='ELIMINAR', observaciones='EL USUARIO ELIMINÓ LA COMPRA NO: $this->numfacom .' "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                fac_compras_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	
	echo "<script>alertify.alert('Alerta', '¡Compra eliminada con éxito!', function(){ window.location.href='../grid_compras'; });</script>";
	}
if (isset($this->sc_temp_gidtercero)) { $_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
$_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="idfaccom" value="<?php echo $this->form_encode_input($this->idfaccom) ?>"/>
      <input type=hidden name="nmgp_opcao" value="<?php echo $this->form_encode_input($nmgp_opcao_saida_php); ?>"/>
      <input type=hidden name="nmgp_opc_ant" value="<?php echo $this->form_encode_input($nmgp_opc_ant_saida_php); ?>"/>
      <input type=submit name="nmgp_bok" value="<?php echo $this->Ini->Nm_lang['lang_btns_cfrm'] ?>"/>
      </form>
      </td></tr></table>
      </body>
      </html>
<?php
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
           echo "<script type=\"text/javascript\">" . $this->redir_modal . "</script>";
           $this->redir_modal = "";
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
           case 'es_remision':
               return "DOCUMENTO ES REMISIÓN?:";
               break;
           case 'id_pedidocom':
               return "CARGAR DESDE PEDIDO N°";
               break;
           case 'numfacom':
               return "NÚMERO DE  FACTURA O DOCUMENTO DE COMPRA:";
               break;
           case 'fechacom':
               return "FECHA:";
               break;
           case 'idprov':
               return "EL PROVEEDOR:";
               break;
           case 'formapago':
               return "FORMA DE PAGO:";
               break;
           case 'fechavenc':
               return "FECHA DE VENCIMIENTO:";
               break;
           case 'total':
               return "COSTO TOTAL DE LA COMPRA:";
               break;
           case 'saldo':
               return "SALDO POR PAGAR:";
               break;
           case 'pagada':
               return "PAGADA?:";
               break;
           case 'anulada':
               return "ESTADO:";
               break;
           case 'asentada':
               return "ASENTAR COMPRA:";
               break;
           case 'subtotal':
               return "SUBTOTAL:";
               break;
           case 'valoriva':
               return "IVA DE LA COMPRA:";
               break;
           case 'retencion':
               return "RETENCIÓN %:";
               break;
           case 'reteica':
               return "RETE ICA %:";
               break;
           case 'reteiva':
               return "RETE IVA %:";
               break;
           case 'banco':
               return "CAJA N°";
               break;
           case 'idfaccom':
               return "Idfaccom";
               break;
           case 'detalle':
               return "detalle";
               break;
           case 'hdetalle':
               return "Llenar detalle";
               break;
           case 'prefijo_delpedido':
               return "";
               break;
           case 'observaciones':
               return "OBSERVACIONES:";
               break;
           case 'control':
               return "Control";
               break;
           case 'usuario':
               return "Usuario";
               break;
           case 'cod_cuenta':
               return "Cod Cuenta";
               break;
           case 'creado':
               return "Creado";
               break;
           case 'editado':
               return "Editado";
               break;
           case 'num_ndevolucion':
               return "Num Ndevolucion";
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
              if (!isset($this->NM_ajax_info['errList']['geral_fac_compras_mob']) || !is_array($this->NM_ajax_info['errList']['geral_fac_compras_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_fac_compras_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_fac_compras_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'es_remision' == $filtro)) || (is_array($filtro) && in_array('es_remision', $filtro)))
        $this->ValidateField_es_remision($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_pedidocom' == $filtro)) || (is_array($filtro) && in_array('id_pedidocom', $filtro)))
        $this->ValidateField_id_pedidocom($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'numfacom' == $filtro)) || (is_array($filtro) && in_array('numfacom', $filtro)))
        $this->ValidateField_numfacom($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fechacom' == $filtro)) || (is_array($filtro) && in_array('fechacom', $filtro)))
        $this->ValidateField_fechacom($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'idprov' == $filtro)) || (is_array($filtro) && in_array('idprov', $filtro)))
        $this->ValidateField_idprov($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'formapago' == $filtro)) || (is_array($filtro) && in_array('formapago', $filtro)))
        $this->ValidateField_formapago($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fechavenc' == $filtro)) || (is_array($filtro) && in_array('fechavenc', $filtro)))
        $this->ValidateField_fechavenc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'total' == $filtro)) || (is_array($filtro) && in_array('total', $filtro)))
        $this->ValidateField_total($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'saldo' == $filtro)) || (is_array($filtro) && in_array('saldo', $filtro)))
        $this->ValidateField_saldo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'pagada' == $filtro)) || (is_array($filtro) && in_array('pagada', $filtro)))
        $this->ValidateField_pagada($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'anulada' == $filtro)) || (is_array($filtro) && in_array('anulada', $filtro)))
        $this->ValidateField_anulada($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'asentada' == $filtro)) || (is_array($filtro) && in_array('asentada', $filtro)))
        $this->ValidateField_asentada($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'subtotal' == $filtro)) || (is_array($filtro) && in_array('subtotal', $filtro)))
        $this->ValidateField_subtotal($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'valoriva' == $filtro)) || (is_array($filtro) && in_array('valoriva', $filtro)))
        $this->ValidateField_valoriva($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'retencion' == $filtro)) || (is_array($filtro) && in_array('retencion', $filtro)))
        $this->ValidateField_retencion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'reteica' == $filtro)) || (is_array($filtro) && in_array('reteica', $filtro)))
        $this->ValidateField_reteica($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'reteiva' == $filtro)) || (is_array($filtro) && in_array('reteiva', $filtro)))
        $this->ValidateField_reteiva($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'banco' == $filtro)) || (is_array($filtro) && in_array('banco', $filtro)))
        $this->ValidateField_banco($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'idfaccom' == $filtro)) || (is_array($filtro) && in_array('idfaccom', $filtro)))
        $this->ValidateField_idfaccom($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'detalle' == $filtro)) || (is_array($filtro) && in_array('detalle', $filtro)))
        $this->ValidateField_detalle($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'hdetalle' == $filtro)) || (is_array($filtro) && in_array('hdetalle', $filtro)))
        $this->ValidateField_hdetalle($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'prefijo_delpedido' == $filtro)) || (is_array($filtro) && in_array('prefijo_delpedido', $filtro)))
        $this->ValidateField_prefijo_delpedido($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'observaciones' == $filtro)) || (is_array($filtro) && in_array('observaciones', $filtro)))
        $this->ValidateField_observaciones($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'control' == $filtro)) || (is_array($filtro) && in_array('control', $filtro)))
        $this->ValidateField_control($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'usuario' == $filtro)) || (is_array($filtro) && in_array('usuario', $filtro)))
        $this->ValidateField_usuario($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cod_cuenta' == $filtro)) || (is_array($filtro) && in_array('cod_cuenta', $filtro)))
        $this->ValidateField_cod_cuenta($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'creado' == $filtro)) || (is_array($filtro) && in_array('creado', $filtro)))
        $this->ValidateField_creado($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'editado' == $filtro)) || (is_array($filtro) && in_array('editado', $filtro)))
        $this->ValidateField_editado($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_es_remision(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->es_remision == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'es_remision';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_es_remision

    function ValidateField_id_pedidocom(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->id_pedidocom) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_id_pedidocom']) && !in_array($this->id_pedidocom, $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_id_pedidocom']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_pedidocom']))
                   {
                       $Campos_Erros['id_pedidocom'] = array();
                   }
                   $Campos_Erros['id_pedidocom'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_pedidocom']) || !is_array($this->NM_ajax_info['errList']['id_pedidocom']))
                   {
                       $this->NM_ajax_info['errList']['id_pedidocom'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_pedidocom'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_pedidocom';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_pedidocom

    function ValidateField_numfacom(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->numfacom = sc_strtoupper($this->numfacom); 
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['php_cmp_required']['numfacom']) || $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['php_cmp_required']['numfacom'] == "on")) 
      { 
          if ($this->numfacom == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "NÚMERO DE  FACTURA O DOCUMENTO DE COMPRA:" ; 
              if (!isset($Campos_Erros['numfacom']))
              {
                  $Campos_Erros['numfacom'] = array();
              }
              $Campos_Erros['numfacom'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['numfacom']) || !is_array($this->NM_ajax_info['errList']['numfacom']))
                  {
                      $this->NM_ajax_info['errList']['numfacom'] = array();
                  }
                  $this->NM_ajax_info['errList']['numfacom'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->numfacom) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "NÚMERO DE  FACTURA O DOCUMENTO DE COMPRA: " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['numfacom']))
              {
                  $Campos_Erros['numfacom'] = array();
              }
              $Campos_Erros['numfacom'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['numfacom']) || !is_array($this->NM_ajax_info['errList']['numfacom']))
              {
                  $this->NM_ajax_info['errList']['numfacom'] = array();
              }
              $this->NM_ajax_info['errList']['numfacom'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'numfacom';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_numfacom

    function ValidateField_fechacom(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fechacom, $this->field_config['fechacom']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fechacom']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fechacom']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fechacom']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fechacom']['date_sep']) ; 
          if (trim($this->fechacom) != "")  
          { 
              if ($teste_validade->Data($this->fechacom, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "FECHA:; " ; 
                  if (!isset($Campos_Erros['fechacom']))
                  {
                      $Campos_Erros['fechacom'] = array();
                  }
                  $Campos_Erros['fechacom'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fechacom']) || !is_array($this->NM_ajax_info['errList']['fechacom']))
                  {
                      $this->NM_ajax_info['errList']['fechacom'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechacom'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fechacom']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fechacom';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fechacom

    function ValidateField_idprov(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['php_cmp_required']['idprov']) || $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['php_cmp_required']['idprov'] == "on")) 
      { 
          if ($this->idprov == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "EL PROVEEDOR:" ; 
              if (!isset($Campos_Erros['idprov']))
              {
                  $Campos_Erros['idprov'] = array();
              }
              $Campos_Erros['idprov'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['idprov']) || !is_array($this->NM_ajax_info['errList']['idprov']))
                  {
                      $this->NM_ajax_info['errList']['idprov'] = array();
                  }
                  $this->NM_ajax_info['errList']['idprov'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->idprov) > 10) 
          { 
              $hasError = true;
              $Campos_Crit .= "EL PROVEEDOR: " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['idprov']))
              {
                  $Campos_Erros['idprov'] = array();
              }
              $Campos_Erros['idprov'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['idprov']) || !is_array($this->NM_ajax_info['errList']['idprov']))
              {
                  $this->NM_ajax_info['errList']['idprov'] = array();
              }
              $this->NM_ajax_info['errList']['idprov'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idprov';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idprov

    function ValidateField_formapago(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->formapago == "" && $this->nmgp_opcao != "excluir")
      { 
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

    function ValidateField_fechavenc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fechavenc, $this->field_config['fechavenc']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fechavenc']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fechavenc']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fechavenc']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fechavenc']['date_sep']) ; 
          if (trim($this->fechavenc) != "")  
          { 
              if ($teste_validade->Data($this->fechavenc, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "FECHA DE VENCIMIENTO:; " ; 
                  if (!isset($Campos_Erros['fechavenc']))
                  {
                      $Campos_Erros['fechavenc'] = array();
                  }
                  $Campos_Erros['fechavenc'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fechavenc']) || !is_array($this->NM_ajax_info['errList']['fechavenc']))
                  {
                      $this->NM_ajax_info['errList']['fechavenc'] = array();
                  }
                  $this->NM_ajax_info['errList']['fechavenc'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fechavenc']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fechavenc';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fechavenc

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
                  $Campos_Crit .= "COSTO TOTAL DE LA COMPRA:: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
                  $Campos_Crit .= "COSTO TOTAL DE LA COMPRA:; " ; 
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

    function ValidateField_saldo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->saldo === "" || is_null($this->saldo))  
      { 
          $this->saldo = 0;
          $this->sc_force_zero[] = 'saldo';
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
              $iTestSize = 13;
              if (strlen($this->saldo) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "SALDO POR PAGAR:: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->saldo, 12, 0, -0, 999999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "SALDO POR PAGAR:; " ; 
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

    function ValidateField_pagada(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->pagada) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "PAGADA?: " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
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

    function ValidateField_anulada(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->anulada == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'anulada';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_anulada

    function ValidateField_asentada(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->asentada == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->asentada === "" || is_null($this->asentada))  
      { 
          $this->asentada = 0;
          $this->sc_force_zero[] = 'asentada';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'asentada';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_asentada

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
                  $Campos_Crit .= "SUBTOTAL:: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
                  $Campos_Crit .= "SUBTOTAL:; " ; 
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
                  $Campos_Crit .= "IVA DE LA COMPRA:: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
                  $Campos_Crit .= "IVA DE LA COMPRA:; " ; 
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

    function ValidateField_retencion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->retencion) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_retencion']) && !in_array($this->retencion, $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_retencion']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['retencion']))
                   {
                       $Campos_Erros['retencion'] = array();
                   }
                   $Campos_Erros['retencion'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['retencion']) || !is_array($this->NM_ajax_info['errList']['retencion']))
                   {
                       $this->NM_ajax_info['errList']['retencion'] = array();
                   }
                   $this->NM_ajax_info['errList']['retencion'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'retencion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_retencion

    function ValidateField_reteica(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->reteica) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_reteica']) && !in_array($this->reteica, $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_reteica']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['reteica']))
                   {
                       $Campos_Erros['reteica'] = array();
                   }
                   $Campos_Erros['reteica'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['reteica']) || !is_array($this->NM_ajax_info['errList']['reteica']))
                   {
                       $this->NM_ajax_info['errList']['reteica'] = array();
                   }
                   $this->NM_ajax_info['errList']['reteica'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'reteica';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_reteica

    function ValidateField_reteiva(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->reteiva === "" || is_null($this->reteiva))  
      { 
          $this->reteiva = 0;
          $this->sc_force_zero[] = 'reteiva';
      } 
      if (!empty($this->field_config['reteiva']['symbol_dec']))
      {
          nm_limpa_valor($this->reteiva, $this->field_config['reteiva']['symbol_dec'], $this->field_config['reteiva']['symbol_grp']) ; 
          if ('.' == substr($this->reteiva, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->reteiva, 1)))
              {
                  $this->reteiva = '';
              }
              else
              {
                  $this->reteiva = '0' . $this->reteiva;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->reteiva != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->reteiva) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "RETE IVA %:: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['reteiva']))
                  {
                      $Campos_Erros['reteiva'] = array();
                  }
                  $Campos_Erros['reteiva'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['reteiva']) || !is_array($this->NM_ajax_info['errList']['reteiva']))
                  {
                      $this->NM_ajax_info['errList']['reteiva'] = array();
                  }
                  $this->NM_ajax_info['errList']['reteiva'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->reteiva, 8, 2, -0, 9999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "RETE IVA %:; " ; 
                  if (!isset($Campos_Erros['reteiva']))
                  {
                      $Campos_Erros['reteiva'] = array();
                  }
                  $Campos_Erros['reteiva'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['reteiva']) || !is_array($this->NM_ajax_info['errList']['reteiva']))
                  {
                      $this->NM_ajax_info['errList']['reteiva'] = array();
                  }
                  $this->NM_ajax_info['errList']['reteiva'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'reteiva';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_reteiva

    function ValidateField_banco(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->banco) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_banco']) && !in_array($this->banco, $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_banco']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['banco']))
                   {
                       $Campos_Erros['banco'] = array();
                   }
                   $Campos_Erros['banco'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['banco']) || !is_array($this->NM_ajax_info['errList']['banco']))
                   {
                       $this->NM_ajax_info['errList']['banco'] = array();
                   }
                   $this->NM_ajax_info['errList']['banco'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'banco';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_banco

    function ValidateField_idfaccom(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idfaccom === "" || is_null($this->idfaccom))  
      { 
          $this->idfaccom = 0;
      } 
      nm_limpa_numero($this->idfaccom, $this->field_config['idfaccom']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->idfaccom != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->idfaccom) > $iTestSize)  
              { 
                  $hasError = true;
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
              if ($teste_validade->Valor($this->idfaccom, 20, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
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
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idfaccom';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idfaccom

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

    function ValidateField_hdetalle(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->hdetalle) > 2) 
          { 
              $hasError = true;
              $Campos_Crit .= "Llenar detalle " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['hdetalle']))
              {
                  $Campos_Erros['hdetalle'] = array();
              }
              $Campos_Erros['hdetalle'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['hdetalle']) || !is_array($this->NM_ajax_info['errList']['hdetalle']))
              {
                  $this->NM_ajax_info['errList']['hdetalle'] = array();
              }
              $this->NM_ajax_info['errList']['hdetalle'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'hdetalle';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_hdetalle

    function ValidateField_prefijo_delpedido(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->prefijo_delpedido) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['prefijo_delpedido']))
              {
                  $Campos_Erros['prefijo_delpedido'] = array();
              }
              $Campos_Erros['prefijo_delpedido'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['prefijo_delpedido']) || !is_array($this->NM_ajax_info['errList']['prefijo_delpedido']))
              {
                  $this->NM_ajax_info['errList']['prefijo_delpedido'] = array();
              }
              $this->NM_ajax_info['errList']['prefijo_delpedido'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'prefijo_delpedido';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_prefijo_delpedido

    function ValidateField_observaciones(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->observaciones = sc_strtoupper($this->observaciones); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->observaciones) > 200) 
          { 
              $hasError = true;
              $Campos_Crit .= "OBSERVACIONES: " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
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

    function ValidateField_control(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->control === "" || is_null($this->control))  
      { 
          $this->control = 0;
          $this->sc_force_zero[] = 'control';
      } 
      nm_limpa_numero($this->control, $this->field_config['control']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->control != '')  
          { 
              $iTestSize = 1;
              if (strlen($this->control) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Control: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['control']))
                  {
                      $Campos_Erros['control'] = array();
                  }
                  $Campos_Erros['control'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['control']) || !is_array($this->NM_ajax_info['errList']['control']))
                  {
                      $this->NM_ajax_info['errList']['control'] = array();
                  }
                  $this->NM_ajax_info['errList']['control'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->control, 1, 0, -0, 9, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Control; " ; 
                  if (!isset($Campos_Erros['control']))
                  {
                      $Campos_Erros['control'] = array();
                  }
                  $Campos_Erros['control'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['control']) || !is_array($this->NM_ajax_info['errList']['control']))
                  {
                      $this->NM_ajax_info['errList']['control'] = array();
                  }
                  $this->NM_ajax_info['errList']['control'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'control';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_control

    function ValidateField_usuario(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->usuario === "" || is_null($this->usuario))  
      { 
          $this->usuario = 0;
          $this->sc_force_zero[] = 'usuario';
      } 
      nm_limpa_numero($this->usuario, $this->field_config['usuario']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->usuario != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->usuario) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Usuario: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['usuario']))
                  {
                      $Campos_Erros['usuario'] = array();
                  }
                  $Campos_Erros['usuario'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['usuario']) || !is_array($this->NM_ajax_info['errList']['usuario']))
                  {
                      $this->NM_ajax_info['errList']['usuario'] = array();
                  }
                  $this->NM_ajax_info['errList']['usuario'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->usuario, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Usuario; " ; 
                  if (!isset($Campos_Erros['usuario']))
                  {
                      $Campos_Erros['usuario'] = array();
                  }
                  $Campos_Erros['usuario'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['usuario']) || !is_array($this->NM_ajax_info['errList']['usuario']))
                  {
                      $this->NM_ajax_info['errList']['usuario'] = array();
                  }
                  $this->NM_ajax_info['errList']['usuario'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
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

    function ValidateField_cod_cuenta(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cod_cuenta) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cod Cuenta " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
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
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cod_cuenta';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cod_cuenta

    function ValidateField_creado(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->creado, $this->field_config['creado']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
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
      if ($this->nmgp_opcao != "excluir") 
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
    $this->nmgp_dados_form['es_remision'] = $this->es_remision;
    $this->nmgp_dados_form['id_pedidocom'] = $this->id_pedidocom;
    $this->nmgp_dados_form['numfacom'] = $this->numfacom;
    $this->nmgp_dados_form['fechacom'] = (strlen(trim($this->fechacom)) > 19) ? str_replace(".", ":", $this->fechacom) : trim($this->fechacom);
    $this->nmgp_dados_form['idprov'] = $this->idprov;
    $this->nmgp_dados_form['formapago'] = $this->formapago;
    $this->nmgp_dados_form['fechavenc'] = (strlen(trim($this->fechavenc)) > 19) ? str_replace(".", ":", $this->fechavenc) : trim($this->fechavenc);
    $this->nmgp_dados_form['total'] = $this->total;
    $this->nmgp_dados_form['saldo'] = $this->saldo;
    $this->nmgp_dados_form['pagada'] = $this->pagada;
    $this->nmgp_dados_form['anulada'] = $this->anulada;
    $this->nmgp_dados_form['asentada'] = $this->asentada;
    $this->nmgp_dados_form['subtotal'] = $this->subtotal;
    $this->nmgp_dados_form['valoriva'] = $this->valoriva;
    $this->nmgp_dados_form['retencion'] = $this->retencion;
    $this->nmgp_dados_form['reteica'] = $this->reteica;
    $this->nmgp_dados_form['reteiva'] = $this->reteiva;
    $this->nmgp_dados_form['banco'] = $this->banco;
    $this->nmgp_dados_form['idfaccom'] = $this->idfaccom;
    $this->nmgp_dados_form['detalle'] = $this->detalle;
    $this->nmgp_dados_form['hdetalle'] = $this->hdetalle;
    $this->nmgp_dados_form['prefijo_delpedido'] = $this->prefijo_delpedido;
    $this->nmgp_dados_form['observaciones'] = $this->observaciones;
    $this->nmgp_dados_form['control'] = $this->control;
    $this->nmgp_dados_form['usuario'] = $this->usuario;
    $this->nmgp_dados_form['cod_cuenta'] = $this->cod_cuenta;
    $this->nmgp_dados_form['creado'] = (strlen(trim($this->creado)) > 19) ? str_replace(".", ":", $this->creado) : trim($this->creado);
    $this->nmgp_dados_form['editado'] = (strlen(trim($this->editado)) > 19) ? str_replace(".", ":", $this->editado) : trim($this->editado);
    $this->nmgp_dados_form['num_ndevolucion'] = $this->num_ndevolucion;
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['fechacom'] = $this->fechacom;
      nm_limpa_data($this->fechacom, $this->field_config['fechacom']['date_sep']) ; 
      $this->Before_unformat['fechavenc'] = $this->fechavenc;
      nm_limpa_data($this->fechavenc, $this->field_config['fechavenc']['date_sep']) ; 
      $this->Before_unformat['total'] = $this->total;
      if (!empty($this->field_config['total']['symbol_dec']))
      {
         $this->sc_remove_currency($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp'], $this->field_config['total']['symbol_mon']);
         nm_limpa_valor($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp']);
      }
      $this->Before_unformat['saldo'] = $this->saldo;
      if (!empty($this->field_config['saldo']['symbol_dec']))
      {
         $this->sc_remove_currency($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp'], $this->field_config['saldo']['symbol_mon']);
         nm_limpa_valor($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp']);
      }
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
      $this->Before_unformat['reteiva'] = $this->reteiva;
      if (!empty($this->field_config['reteiva']['symbol_dec']))
      {
         nm_limpa_valor($this->reteiva, $this->field_config['reteiva']['symbol_dec'], $this->field_config['reteiva']['symbol_grp']);
      }
      $this->Before_unformat['idfaccom'] = $this->idfaccom;
      nm_limpa_numero($this->idfaccom, $this->field_config['idfaccom']['symbol_grp']) ; 
      $this->Before_unformat['control'] = $this->control;
      nm_limpa_numero($this->control, $this->field_config['control']['symbol_grp']) ; 
      $this->Before_unformat['usuario'] = $this->usuario;
      nm_limpa_numero($this->usuario, $this->field_config['usuario']['symbol_grp']) ; 
      $this->Before_unformat['creado'] = $this->creado;
      $this->Before_unformat['creado_hora'] = $this->creado_hora;
      nm_limpa_data($this->creado, $this->field_config['creado']['date_sep']) ; 
      nm_limpa_hora($this->creado_hora, $this->field_config['creado']['time_sep']) ; 
      $this->Before_unformat['editado'] = $this->editado;
      $this->Before_unformat['editado_hora'] = $this->editado_hora;
      nm_limpa_data($this->editado, $this->field_config['editado']['date_sep']) ; 
      nm_limpa_hora($this->editado_hora, $this->field_config['editado']['time_sep']) ; 
      $this->Before_unformat['num_ndevolucion'] = $this->num_ndevolucion;
      nm_limpa_numero($this->num_ndevolucion, $this->field_config['num_ndevolucion']['symbol_grp']) ; 
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
      if ($Nome_Campo == "total")
      {
          if (!empty($this->field_config['total']['symbol_dec']))
          {
             $this->sc_remove_currency($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp'], $this->field_config['total']['symbol_mon']);
             nm_limpa_valor($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp']);
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
      if ($Nome_Campo == "reteiva")
      {
          if (!empty($this->field_config['reteiva']['symbol_dec']))
          {
             nm_limpa_valor($this->reteiva, $this->field_config['reteiva']['symbol_dec'], $this->field_config['reteiva']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "idfaccom")
      {
          nm_limpa_numero($this->idfaccom, $this->field_config['idfaccom']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "control")
      {
          nm_limpa_numero($this->control, $this->field_config['control']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "usuario")
      {
          nm_limpa_numero($this->usuario, $this->field_config['usuario']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "num_ndevolucion")
      {
          nm_limpa_numero($this->num_ndevolucion, $this->field_config['num_ndevolucion']['symbol_grp']) ; 
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
      if ((!empty($this->fechacom) && 'null' != $this->fechacom) || (!empty($format_fields) && isset($format_fields['fechacom'])))
      {
          nm_volta_data($this->fechacom, $this->field_config['fechacom']['date_format']) ; 
          nmgp_Form_Datas($this->fechacom, $this->field_config['fechacom']['date_format'], $this->field_config['fechacom']['date_sep']) ;  
      }
      elseif ('null' == $this->fechacom || '' == $this->fechacom)
      {
          $this->fechacom = '';
      }
      if ((!empty($this->fechavenc) && 'null' != $this->fechavenc) || (!empty($format_fields) && isset($format_fields['fechavenc'])))
      {
          nm_volta_data($this->fechavenc, $this->field_config['fechavenc']['date_format']) ; 
          nmgp_Form_Datas($this->fechavenc, $this->field_config['fechavenc']['date_format'], $this->field_config['fechavenc']['date_sep']) ;  
      }
      elseif ('null' == $this->fechavenc || '' == $this->fechavenc)
      {
          $this->fechavenc = '';
      }
      if ('' !== $this->total || (!empty($format_fields) && isset($format_fields['total'])))
      {
          nmgp_Form_Num_Val($this->total, $this->field_config['total']['symbol_grp'], $this->field_config['total']['symbol_dec'], "2", "S", $this->field_config['total']['format_neg'], "", "", "-", $this->field_config['total']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['total']['symbol_mon'];
          $this->sc_add_currency($this->total, $sMonSymb, $this->field_config['total']['format_pos']); 
      }
      if ('' !== $this->saldo || (!empty($format_fields) && isset($format_fields['saldo'])))
      {
          nmgp_Form_Num_Val($this->saldo, $this->field_config['saldo']['symbol_grp'], $this->field_config['saldo']['symbol_dec'], "0", "S", $this->field_config['saldo']['format_neg'], "", "", "-", $this->field_config['saldo']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['saldo']['symbol_mon'];
          $this->sc_add_currency($this->saldo, $sMonSymb, $this->field_config['saldo']['format_pos']); 
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
      if ('' !== $this->reteiva || (!empty($format_fields) && isset($format_fields['reteiva'])))
      {
          nmgp_Form_Num_Val($this->reteiva, $this->field_config['reteiva']['symbol_grp'], $this->field_config['reteiva']['symbol_dec'], "2", "S", $this->field_config['reteiva']['format_neg'], "", "", "-", $this->field_config['reteiva']['symbol_fmt']) ; 
      }
      if ('' !== $this->idfaccom || (!empty($format_fields) && isset($format_fields['idfaccom'])))
      {
          nmgp_Form_Num_Val($this->idfaccom, $this->field_config['idfaccom']['symbol_grp'], $this->field_config['idfaccom']['symbol_dec'], "0", "S", $this->field_config['idfaccom']['format_neg'], "", "", "-", $this->field_config['idfaccom']['symbol_fmt']) ; 
      }
      if ('' !== $this->control || (!empty($format_fields) && isset($format_fields['control'])))
      {
          nmgp_Form_Num_Val($this->control, $this->field_config['control']['symbol_grp'], $this->field_config['control']['symbol_dec'], "0", "S", $this->field_config['control']['format_neg'], "", "", "-", $this->field_config['control']['symbol_fmt']) ; 
      }
      if ('' !== $this->usuario || (!empty($format_fields) && isset($format_fields['usuario'])))
      {
          nmgp_Form_Num_Val($this->usuario, $this->field_config['usuario']['symbol_grp'], $this->field_config['usuario']['symbol_dec'], "0", "S", $this->field_config['usuario']['format_neg'], "", "", "-", $this->field_config['usuario']['symbol_fmt']) ; 
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
      $guarda_format_hora = $this->field_config['fechacom']['date_format'];
      if ($this->fechacom != "")  
      { 
          nm_conv_data($this->fechacom, $this->field_config['fechacom']['date_format']) ; 
          $this->fechacom_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fechacom_hora = substr($this->fechacom_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fechacom_hora = substr($this->fechacom_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fechacom_hora = substr($this->fechacom_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fechacom_hora = substr($this->fechacom_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fechacom_hora = substr($this->fechacom_hora, 0, -4);
          }
      } 
      if ($this->fechacom == "" && $use_null)  
      { 
          $this->fechacom = "null" ; 
      } 
      $this->field_config['fechacom']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fechavenc']['date_format'];
      if ($this->fechavenc != "")  
      { 
          nm_conv_data($this->fechavenc, $this->field_config['fechavenc']['date_format']) ; 
          $this->fechavenc_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fechavenc_hora = substr($this->fechavenc_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fechavenc_hora = substr($this->fechavenc_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fechavenc_hora = substr($this->fechavenc_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fechavenc_hora = substr($this->fechavenc_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fechavenc_hora = substr($this->fechavenc_hora, 0, -4);
          }
      } 
      if ($this->fechavenc == "" && $use_null)  
      { 
          $this->fechavenc = "null" ; 
      } 
      $this->field_config['fechavenc']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_es_remision();
          $this->ajax_return_values_id_pedidocom();
          $this->ajax_return_values_numfacom();
          $this->ajax_return_values_fechacom();
          $this->ajax_return_values_idprov();
          $this->ajax_return_values_formapago();
          $this->ajax_return_values_fechavenc();
          $this->ajax_return_values_total();
          $this->ajax_return_values_saldo();
          $this->ajax_return_values_pagada();
          $this->ajax_return_values_anulada();
          $this->ajax_return_values_asentada();
          $this->ajax_return_values_subtotal();
          $this->ajax_return_values_valoriva();
          $this->ajax_return_values_retencion();
          $this->ajax_return_values_reteica();
          $this->ajax_return_values_reteiva();
          $this->ajax_return_values_banco();
          $this->ajax_return_values_idfaccom();
          $this->ajax_return_values_detalle();
          $this->ajax_return_values_hdetalle();
          $this->ajax_return_values_prefijo_delpedido();
          $this->ajax_return_values_observaciones();
          $this->ajax_return_values_control();
          $this->ajax_return_values_usuario();
          $this->ajax_return_values_cod_cuenta();
          $this->ajax_return_values_creado();
          $this->ajax_return_values_editado();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idfaccom']['keyVal'] = fac_compras_mob_pack_protect_string($this->nmgp_dados_form['idfaccom']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['grid_detallecompra_fac_script_case_init'] ]['grid_detallecompra_fac']['embutida_form_full'] = true;
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['grid_detallecompra_fac_script_case_init'] ]['grid_detallecompra_fac']['embutida_form']       = true;
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['grid_detallecompra_fac_script_case_init'] ]['grid_detallecompra_fac']['embutida_pai']        = "fac_compras_mob";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['grid_detallecompra_fac_script_case_init'] ]['grid_detallecompra_fac']['embutida_form_parms'] = "par_idfaccom*scin" . $this->nmgp_dados_form['idfaccom'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_paginacao*scinFULL*scout";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['grid_detallecompra_fac_script_case_init'] ]['grid_detallecompra_fac']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['grid_detallecompra_fac_script_case_init'] ]['grid_detallecompra_fac']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['grid_detallecompra_fac_script_case_init'] ]['grid_detallecompra_fac'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['grid_detallecompra_fac_script_case_init'] ]['grid_detallecompra_fac'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['grid_detallecompra_fac_script_case_init'] ]['grid_detallecompra_fac']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['grid_detallecompra_fac_script_case_init'] ]['grid_detallecompra_fac']['total']);
              }
          }
   } // ajax_return_values

          //----- es_remision
   function ajax_return_values_es_remision($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("es_remision", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->es_remision);
              $aLookup = array();
              $this->_tmp_lookup_es_remision = $this->es_remision;

$aLookup[] = array(fac_compras_mob_pack_protect_string('NO') => str_replace('<', '&lt;',fac_compras_mob_pack_protect_string("NO")));
$aLookup[] = array(fac_compras_mob_pack_protect_string('SI') => str_replace('<', '&lt;',fac_compras_mob_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_es_remision'][] = 'NO';
$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_es_remision'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"es_remision\"";
          if (isset($this->NM_ajax_info['select_html']['es_remision']) && !empty($this->NM_ajax_info['select_html']['es_remision']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['es_remision']);
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

                  if ($this->es_remision == $sValue)
                  {
                      $this->_tmp_lookup_es_remision = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['es_remision'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['es_remision']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['es_remision']['valList'][$i] = fac_compras_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['es_remision']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['es_remision']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['es_remision']['labList'] = $aLabel;
          }
   }

          //----- id_pedidocom
   function ajax_return_values_id_pedidocom($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_pedidocom", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_pedidocom);
              $aLookup = array();
              $this->_tmp_lookup_id_pedidocom = $this->id_pedidocom;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_id_pedidocom']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_id_pedidocom'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_id_pedidocom']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_id_pedidocom'] = array(); 
}
$aLookup[] = array(fac_compras_mob_pack_protect_string('0') => str_replace('<', '&lt;',fac_compras_mob_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_id_pedidocom'][] = '0';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fechacom = $this->fechacom;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_total = $this->total;
   $old_value_saldo = $this->saldo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_reteiva = $this->reteiva;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_control = $this->control;
   $old_value_usuario = $this->usuario;
   $old_value_creado = $this->creado;
   $old_value_creado_hora = $this->creado_hora;
   $old_value_editado = $this->editado;
   $old_value_editado_hora = $this->editado_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechacom = $this->fechacom;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_total = $this->total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_control = $this->control;
   $unformatted_value_usuario = $this->usuario;
   $unformatted_value_creado = $this->creado;
   $unformatted_value_creado_hora = $this->creado_hora;
   $unformatted_value_editado = $this->editado;
   $unformatted_value_editado_hora = $this->editado_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo + \" - \" + pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc like 'PC' ORDER BY prefijo_ped, numpedido";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idpedido, concat(resdian.prefijo, \" - \", pedidos.numpedido)  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc like 'PC' ORDER BY prefijo_ped, numpedido";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo&\" - \"&pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc like 'PC' ORDER BY prefijo_ped, numpedido";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo||\" - \"||pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc like 'PC' ORDER BY prefijo_ped, numpedido";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo + \" - \" + pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc like 'PC' ORDER BY prefijo_ped, numpedido";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo||\" - \"||pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc like 'PC' ORDER BY prefijo_ped, numpedido";
   }
   else
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo||\" - \"||pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc like 'PC' ORDER BY prefijo_ped, numpedido";
   }

   $this->fechacom = $old_value_fechacom;
   $this->fechavenc = $old_value_fechavenc;
   $this->total = $old_value_total;
   $this->saldo = $old_value_saldo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->reteiva = $old_value_reteiva;
   $this->idfaccom = $old_value_idfaccom;
   $this->control = $old_value_control;
   $this->usuario = $old_value_usuario;
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
              $aLookup[] = array(fac_compras_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', fac_compras_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_id_pedidocom'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_pedidocom\"";
          if (isset($this->NM_ajax_info['select_html']['id_pedidocom']) && !empty($this->NM_ajax_info['select_html']['id_pedidocom']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['id_pedidocom']);
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

                  if ($this->id_pedidocom == $sValue)
                  {
                      $this->_tmp_lookup_id_pedidocom = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_pedidocom'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_pedidocom']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_pedidocom']['valList'][$i] = fac_compras_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_pedidocom']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_pedidocom']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_pedidocom']['labList'] = $aLabel;
          }
   }

          //----- numfacom
   function ajax_return_values_numfacom($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("numfacom", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->numfacom);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numfacom'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fechacom
   function ajax_return_values_fechacom($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fechacom", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fechacom);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fechacom'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- idprov
   function ajax_return_values_idprov($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idprov", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idprov);
              $aLookup = array();
              $this->_tmp_lookup_idprov = $this->idprov;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_idprov']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_idprov'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_idprov']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_idprov'] = array(); 
    }

   $old_value_fechacom = $this->fechacom;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_total = $this->total;
   $old_value_saldo = $this->saldo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_reteiva = $this->reteiva;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_control = $this->control;
   $old_value_usuario = $this->usuario;
   $old_value_creado = $this->creado;
   $old_value_creado_hora = $this->creado_hora;
   $old_value_editado = $this->editado;
   $old_value_editado_hora = $this->editado_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechacom = $this->fechacom;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_total = $this->total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_control = $this->control;
   $unformatted_value_usuario = $this->usuario;
   $unformatted_value_creado = $this->creado;
   $unformatted_value_creado_hora = $this->creado_hora;
   $unformatted_value_editado = $this->editado;
   $unformatted_value_editado_hora = $this->editado_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + \" - \" + nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idprov), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento, \" - \",nombres) FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idprov), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&\" - \"&nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idprov), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||\" - \"||nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idprov), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + \" - \" + nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idprov), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||\" - \"||nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idprov), 1, -1) . " ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||\" - \"||nombres FROM terceros WHERE (proveedor='SI') AND idtercero = " . substr($this->Db->qstr($this->idprov), 1, -1) . " ORDER BY documento, nombres";
   }

   $this->fechacom = $old_value_fechacom;
   $this->fechavenc = $old_value_fechavenc;
   $this->total = $old_value_total;
   $this->saldo = $old_value_saldo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->reteiva = $old_value_reteiva;
   $this->idfaccom = $old_value_idfaccom;
   $this->control = $old_value_control;
   $this->usuario = $old_value_usuario;
   $this->creado = $old_value_creado;
   $this->creado_hora = $old_value_creado_hora;
   $this->editado = $old_value_editado;
   $this->editado_hora = $old_value_editado_hora;

   if ('' != $this->idprov && '' != $this->idprov && '' != $this->idprov && '' != $this->idprov && '' != $this->idprov && '' != $this->idprov && '' != $this->idprov)
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
              $aLookup[] = array(fac_compras_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', fac_compras_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_idprov'][] = $rs->fields[0];
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
          $this->NM_ajax_info['fldList']['idprov'] = array(
                       'row'    => '',
               'type'    => 'select2_ac',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idprov']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idprov']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idprov']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][fac_compras_mob_pack_protect_string(NM_charset_to_utf8($this->idprov))]) ? $aLookup[0][fac_compras_mob_pack_protect_string(NM_charset_to_utf8($this->idprov))] : "";
          $this->NM_ajax_info['fldList']['idprov_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

          //----- formapago
   function ajax_return_values_formapago($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("formapago", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->formapago);
              $aLookup = array();
              $this->_tmp_lookup_formapago = $this->formapago;

$aLookup[] = array(fac_compras_mob_pack_protect_string('CONTADO') => str_replace('<', '&lt;',fac_compras_mob_pack_protect_string("CONTADO")));
$aLookup[] = array(fac_compras_mob_pack_protect_string('CRÉDITO') => str_replace('<', '&lt;',fac_compras_mob_pack_protect_string("CRÉDITO")));
$aLookup[] = array(fac_compras_mob_pack_protect_string('DEPÓSITO') => str_replace('<', '&lt;',fac_compras_mob_pack_protect_string("DEPOSITO")));
$aLookup[] = array(fac_compras_mob_pack_protect_string('OTRO') => str_replace('<', '&lt;',fac_compras_mob_pack_protect_string("OTRO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_formapago'][] = 'CONTADO';
$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_formapago'][] = 'CRÉDITO';
$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_formapago'][] = 'DEPÓSITO';
$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_formapago'][] = 'OTRO';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"formapago\"";
          if (isset($this->NM_ajax_info['select_html']['formapago']) && !empty($this->NM_ajax_info['select_html']['formapago']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['formapago']);
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

                  if ($this->formapago == $sValue)
                  {
                      $this->_tmp_lookup_formapago = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['formapago'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['formapago']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['formapago']['valList'][$i] = fac_compras_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['formapago']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['formapago']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['formapago']['labList'] = $aLabel;
          }
   }

          //----- fechavenc
   function ajax_return_values_fechavenc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fechavenc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fechavenc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fechavenc'] = array(
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
               'type'    => 'label',
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
               'type'    => 'label',
               'valList' => array($sTmpValue),
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
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- anulada
   function ajax_return_values_anulada($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("anulada", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->anulada);
              $aLookup = array();
              $this->_tmp_lookup_anulada = $this->anulada;

$aLookup[] = array(fac_compras_mob_pack_protect_string('') => str_replace('<', '&lt;',fac_compras_mob_pack_protect_string("")));
$aLookup[] = array(fac_compras_mob_pack_protect_string('DEVUELTA') => str_replace('<', '&lt;',fac_compras_mob_pack_protect_string("DEVUELTA")));
$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_anulada'][] = '';
$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_anulada'][] = 'DEVUELTA';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"anulada\"";
          if (isset($this->NM_ajax_info['select_html']['anulada']) && !empty($this->NM_ajax_info['select_html']['anulada']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['anulada']);
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

                  if ($this->anulada == $sValue)
                  {
                      $this->_tmp_lookup_anulada = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['anulada'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['anulada']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['anulada']['valList'][$i] = fac_compras_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['anulada']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['anulada']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['anulada']['labList'] = $aLabel;
          }
   }

          //----- asentada
   function ajax_return_values_asentada($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("asentada", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->asentada);
              $aLookup = array();
              $this->_tmp_lookup_asentada = $this->asentada;

$aLookup[] = array(fac_compras_mob_pack_protect_string('0') => str_replace('<', '&lt;',fac_compras_mob_pack_protect_string("NO")));
$aLookup[] = array(fac_compras_mob_pack_protect_string('1') => str_replace('<', '&lt;',fac_compras_mob_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_asentada'][] = '0';
$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_asentada'][] = '1';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"asentada\"";
          if (isset($this->NM_ajax_info['select_html']['asentada']) && !empty($this->NM_ajax_info['select_html']['asentada']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['asentada']);
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

                  if ($this->asentada == $sValue)
                  {
                      $this->_tmp_lookup_asentada = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['asentada'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['asentada']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['asentada']['valList'][$i] = fac_compras_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['asentada']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['asentada']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['asentada']['labList'] = $aLabel;
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
               'type'    => 'label',
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
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- retencion
   function ajax_return_values_retencion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("retencion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->retencion);
              $aLookup = array();
              $this->_tmp_lookup_retencion = $this->retencion;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_retencion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_retencion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_retencion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_retencion'] = array(); 
}
$aLookup[] = array(fac_compras_mob_pack_protect_string('0.00') => str_replace('<', '&lt;',fac_compras_mob_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_retencion'][] = '0.00';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fechacom = $this->fechacom;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_total = $this->total;
   $old_value_saldo = $this->saldo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_reteiva = $this->reteiva;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_control = $this->control;
   $old_value_usuario = $this->usuario;
   $old_value_creado = $this->creado;
   $old_value_creado_hora = $this->creado_hora;
   $old_value_editado = $this->editado;
   $old_value_editado_hora = $this->editado_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechacom = $this->fechacom;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_total = $this->total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_control = $this->control;
   $unformatted_value_usuario = $this->usuario;
   $unformatted_value_creado = $this->creado;
   $unformatted_value_creado_hora = $this->creado_hora;
   $unformatted_value_editado = $this->editado;
   $unformatted_value_editado_hora = $this->editado_hora;

   $nm_comando = "SELECT porrete  FROM tiporetefuente  ORDER BY  id_tiporetefuente desc";

   $this->fechacom = $old_value_fechacom;
   $this->fechavenc = $old_value_fechavenc;
   $this->total = $old_value_total;
   $this->saldo = $old_value_saldo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->reteiva = $old_value_reteiva;
   $this->idfaccom = $old_value_idfaccom;
   $this->control = $old_value_control;
   $this->usuario = $old_value_usuario;
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
              $aLookup[] = array(fac_compras_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', fac_compras_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0]))));
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_retencion'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
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
          $sSelComp = "name=\"retencion\"";
          if (isset($this->NM_ajax_info['select_html']['retencion']) && !empty($this->NM_ajax_info['select_html']['retencion']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['retencion']);
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

                  if ($this->retencion == $sValue)
                  {
                      $this->_tmp_lookup_retencion = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['retencion'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['retencion']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['retencion']['valList'][$i] = fac_compras_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['retencion']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['retencion']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['retencion']['labList'] = $aLabel;
          }
   }

          //----- reteica
   function ajax_return_values_reteica($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("reteica", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->reteica);
              $aLookup = array();
              $this->_tmp_lookup_reteica = $this->reteica;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_reteica']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_reteica'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_reteica']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_reteica'] = array(); 
}
$aLookup[] = array(fac_compras_mob_pack_protect_string('0.00') => str_replace('<', '&lt;',fac_compras_mob_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_reteica'][] = '0.00';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fechacom = $this->fechacom;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_total = $this->total;
   $old_value_saldo = $this->saldo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_reteiva = $this->reteiva;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_control = $this->control;
   $old_value_usuario = $this->usuario;
   $old_value_creado = $this->creado;
   $old_value_creado_hora = $this->creado_hora;
   $old_value_editado = $this->editado;
   $old_value_editado_hora = $this->editado_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechacom = $this->fechacom;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_total = $this->total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_control = $this->control;
   $unformatted_value_usuario = $this->usuario;
   $unformatted_value_creado = $this->creado;
   $unformatted_value_creado_hora = $this->creado_hora;
   $unformatted_value_editado = $this->editado;
   $unformatted_value_editado_hora = $this->editado_hora;

   $nm_comando = "SELECT  porcica  FROM tipoica  ORDER BY id_ica DESC";

   $this->fechacom = $old_value_fechacom;
   $this->fechavenc = $old_value_fechavenc;
   $this->total = $old_value_total;
   $this->saldo = $old_value_saldo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->reteiva = $old_value_reteiva;
   $this->idfaccom = $old_value_idfaccom;
   $this->control = $old_value_control;
   $this->usuario = $old_value_usuario;
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
              $aLookup[] = array(fac_compras_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', fac_compras_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0]))));
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_reteica'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
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
          $sSelComp = "name=\"reteica\"";
          if (isset($this->NM_ajax_info['select_html']['reteica']) && !empty($this->NM_ajax_info['select_html']['reteica']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['reteica']);
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

                  if ($this->reteica == $sValue)
                  {
                      $this->_tmp_lookup_reteica = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['reteica'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['reteica']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['reteica']['valList'][$i] = fac_compras_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['reteica']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['reteica']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['reteica']['labList'] = $aLabel;
          }
   }

          //----- reteiva
   function ajax_return_values_reteiva($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("reteiva", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->reteiva);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['reteiva'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- banco
   function ajax_return_values_banco($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("banco", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->banco);
              $aLookup = array();
              $this->_tmp_lookup_banco = $this->banco;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_banco']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_banco'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_banco']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_banco'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_fechacom = $this->fechacom;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_total = $this->total;
   $old_value_saldo = $this->saldo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_reteiva = $this->reteiva;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_control = $this->control;
   $old_value_usuario = $this->usuario;
   $old_value_creado = $this->creado;
   $old_value_creado_hora = $this->creado_hora;
   $old_value_editado = $this->editado;
   $old_value_editado_hora = $this->editado_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechacom = $this->fechacom;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_total = $this->total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_control = $this->control;
   $unformatted_value_usuario = $this->usuario;
   $unformatted_value_creado = $this->creado;
   $unformatted_value_creado_hora = $this->creado_hora;
   $unformatted_value_editado = $this->editado;
   $unformatted_value_editado_hora = $this->editado_hora;

   $nm_comando = "SELECT idcaja_vta, codigo_banco  FROM bancos  ORDER BY codigo_banco";

   $this->fechacom = $old_value_fechacom;
   $this->fechavenc = $old_value_fechavenc;
   $this->total = $old_value_total;
   $this->saldo = $old_value_saldo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->reteiva = $old_value_reteiva;
   $this->idfaccom = $old_value_idfaccom;
   $this->control = $old_value_control;
   $this->usuario = $old_value_usuario;
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
              $aLookup[] = array(fac_compras_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', fac_compras_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_banco'][] = $rs->fields[0];
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
          $sSelComp = "name=\"banco\"";
          if (isset($this->NM_ajax_info['select_html']['banco']) && !empty($this->NM_ajax_info['select_html']['banco']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['banco']);
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

                  if ($this->banco == $sValue)
                  {
                      $this->_tmp_lookup_banco = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['banco'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['banco']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['banco']['valList'][$i] = fac_compras_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['banco']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['banco']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['banco']['labList'] = $aLabel;
          }
   }

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
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("idfaccom", $this->form_encode_input($sTmpValue))),
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

          //----- hdetalle
   function ajax_return_values_hdetalle($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hdetalle", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->hdetalle);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['hdetalle'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- prefijo_delpedido
   function ajax_return_values_prefijo_delpedido($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("prefijo_delpedido", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->prefijo_delpedido);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['prefijo_delpedido'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
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

          //----- control
   function ajax_return_values_control($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("control", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->control);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['control'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['upload_dir'][$fieldName][] = $newName;
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
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_0_gpidcompra'] = $this->form_encode_input($this->nmgp_dados_form['idfaccom']);
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_asentada = $this->asentada;
    $original_banco = $this->banco;
    $original_cod_cuenta = $this->cod_cuenta;
    $original_id_pedidocom = $this->id_pedidocom;
    $original_idfaccom = $this->idfaccom;
    $original_numfacom = $this->numfacom;
    $original_prefijo_delpedido = $this->prefijo_delpedido;
}
if (!isset($this->sc_temp_par_idfaccom)) {$this->sc_temp_par_idfaccom = (isset($_SESSION['par_idfaccom'])) ? $_SESSION['par_idfaccom'] : "";}
  $this->sc_set_focus('numfacom');
$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
if($this->idfaccom >0)
	{
	 
      $nm_select = "select numfacom from facturacom where idfaccom=$this->idfaccom "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fc = array();
     if ($this->idfaccom != "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds_fc[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fc = false;
          $this->ds_fc_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	$this->numfacom =$this->ds_fc[0][0];
	}
if($this->numfacom ==0 or $this->numfacom =="")
	{
	$this->banco =1;
	}

if ($this->numfacom =='0' OR $this->numfacom !="")
	{
		
				$this->sc_ajax_javascript('nm_field_disabled', array("pagada=disabled;id_pedidocom=disabled;es_remision=disabled", ""));
;
				$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
				$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;
	}
		else
			{
				$this->sc_ajax_javascript('nm_field_disabled', array("idprov=;fechacom=;numfacom=;pagada=;formapago=;fechavenc=;id_pedidocom=;es_remision=", ""));
;
				$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
				$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "on";;
			}
	

if($this->asentada ==1)
	{
		$this->Ini->nm_hidden_blocos[4] = "off"; $this->NM_ajax_info['blockDisplay']['4'] = 'off';
		$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "on";;
	}
else
	{
		$this->Ini->nm_hidden_blocos[4] = "on"; $this->NM_ajax_info['blockDisplay']['4'] = 'on';
		
	}

$vsitiene = "NO";
$vcd = $this->cod_cuenta ;
 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select concat(prefijo,'/',numero) as num,str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20) from terceros_cuentas where cod_cuenta='".$vcd."' and ie='EGRESO' and tipo='CE'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select concat(prefijo,'/',numero) as num,convert(char(19),fecha,121) from terceros_cuentas where cod_cuenta='".$vcd."' and ie='EGRESO' and tipo='CE'"; 
      }
      else
      { 
          $nm_select = "select concat(prefijo,'/',numero) as num,fecha from terceros_cuentas where cod_cuenta='".$vcd."' and ie='EGRESO' and tipo='CE'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiDoc = array();
      $this->vsidoc = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vSiDoc[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vsidoc[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiDoc = false;
          $this->vSiDoc_erro = $this->Db->ErrorMsg();
          $this->vsidoc = false;
          $this->vsidoc_erro = $this->Db->ErrorMsg();
      } 
;

if(isset($this->vsidoc[0][0]))
{
	$vdoc = $this->vsidoc[0][0];
	$vfec = $this->vsidoc[0][1];
	$vmensaje = "No se puede desasentar la compra porque tiene un documento de pago en tesoreria: ".$vdoc.", fecha: ".$vfec;
	$this->nm_mens_alert[] = $vmensaje; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert($vmensaje); }$vsitiene = "SI";
}

 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select numpago,str_replace (convert(char(10),fecpago,102), '.', '-') + ' ' + convert(char(8),fecpago,20) from pagos where iddocapagar='".$this->idfaccom ."'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select numpago,convert(char(19),fecpago,121) from pagos where iddocapagar='".$this->idfaccom ."'"; 
      }
      else
      { 
          $nm_select = "select numpago,fecpago from pagos where iddocapagar='".$this->idfaccom ."'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiDoc2 = array();
      $this->vsidoc2 = array();
     if ($this->idfaccom != "")
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
                      $this->vSiDoc2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vsidoc2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiDoc2 = false;
          $this->vSiDoc2_erro = $this->Db->ErrorMsg();
          $this->vsidoc2 = false;
          $this->vsidoc2_erro = $this->Db->ErrorMsg();
      } 
     } 
;

if(isset($this->vsidoc2[0][0]))
{
	$vdoc = $this->vsidoc2[0][0];
	$vfec = $this->vsidoc2[0][1];
	$vmensaje = "No se puede desasentar la compra porque tiene un comprobante de egreso: ".$vdoc.", fecha: ".$vfec;
	$this->nm_mens_alert[] = $vmensaje; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert($vmensaje); }$vsitiene = "SI";
}


switch ($vsitiene){
	case "SI":
		$this->sc_ajax_javascript('nm_field_disabled', array("asentada=disabled", ""));
;
		$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;
		break;
	case "NO":
		$this->sc_ajax_javascript('nm_field_disabled', array("asentada=", ""));
;
		$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "on";;
		break;
	case "AB":
		$this->sc_ajax_javascript('nm_field_disabled', array("asentada=disabled", ""));
;
		$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;
		break;
}
$this->sc_temp_par_idfaccom=$this->idfaccom ;
if(isset($this->numfacom ))
   {
	$this->trae_prefijo_ped();
	}
if (isset($this->sc_temp_par_idfaccom)) { $_SESSION['par_idfaccom'] = $this->sc_temp_par_idfaccom;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_asentada != $this->asentada || (isset($bFlagRead_asentada) && $bFlagRead_asentada)))
    {
        $this->ajax_return_values_asentada(true);
    }
    if (($original_banco != $this->banco || (isset($bFlagRead_banco) && $bFlagRead_banco)))
    {
        $this->ajax_return_values_banco(true);
    }
    if (($original_cod_cuenta != $this->cod_cuenta || (isset($bFlagRead_cod_cuenta) && $bFlagRead_cod_cuenta)))
    {
        $this->ajax_return_values_cod_cuenta(true);
    }
    if (($original_id_pedidocom != $this->id_pedidocom || (isset($bFlagRead_id_pedidocom) && $bFlagRead_id_pedidocom)))
    {
        $this->ajax_return_values_id_pedidocom(true);
    }
    if (($original_idfaccom != $this->idfaccom || (isset($bFlagRead_idfaccom) && $bFlagRead_idfaccom)))
    {
        $this->ajax_return_values_idfaccom(true);
    }
    if (($original_numfacom != $this->numfacom || (isset($bFlagRead_numfacom) && $bFlagRead_numfacom)))
    {
        $this->ajax_return_values_numfacom(true);
    }
    if (($original_prefijo_delpedido != $this->prefijo_delpedido || (isset($bFlagRead_prefijo_delpedido) && $bFlagRead_prefijo_delpedido)))
    {
        $this->ajax_return_values_prefijo_delpedido(true);
    }
}
$_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'off'; 
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
      $this->total = str_replace($sc_parm1, $sc_parm2, $this->total); 
      $this->saldo = str_replace($sc_parm1, $sc_parm2, $this->saldo); 
      $this->subtotal = str_replace($sc_parm1, $sc_parm2, $this->subtotal); 
      $this->valoriva = str_replace($sc_parm1, $sc_parm2, $this->valoriva); 
      $this->reteiva = str_replace($sc_parm1, $sc_parm2, $this->reteiva); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->total = "'" . $this->total . "'";
      $this->saldo = "'" . $this->saldo . "'";
      $this->subtotal = "'" . $this->subtotal . "'";
      $this->valoriva = "'" . $this->valoriva . "'";
      $this->reteiva = "'" . $this->reteiva . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->total = str_replace("'", "", $this->total); 
      $this->saldo = str_replace("'", "", $this->saldo); 
      $this->subtotal = str_replace("'", "", $this->subtotal); 
      $this->valoriva = str_replace("'", "", $this->valoriva); 
      $this->reteiva = str_replace("'", "", $this->reteiva); 
   } 
//----------- 

   function return_after_insert()
   {
      global $sc_where;
      $sc_where_pos = " WHERE ((idfaccom > $this->idfaccom))";
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
      if ('' != $this->idfaccom)
      {
          $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count;
          $rsc = $this->Db->Execute($nmgp_sel_count);
          if ($rsc === false && !$rsc->EOF)
          {
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
              exit;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start'] = $rsc->fields[0];
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
      $_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_control = $this->control;
    $original_idprov = $this->idprov;
    $original_numfacom = $this->numfacom;
    $original_usuario = $this->usuario;
}
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
  $vnum = $this->numfacom ;
$vprov= $this->idprov ;

 
      $nm_select = "select numfacom from facturacom where numfacom='".$vnum."' and idprov='".$vprov."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiExi = array();
      $this->vsiexi = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vSiExi[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vsiexi[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiExi = false;
          $this->vSiExi_erro = $this->Db->ErrorMsg();
          $this->vsiexi = false;
          $this->vsiexi_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vsiexi[0][0]))
{
	$this->nm_mens_alert[] = "Número de factura del proveedor repetida."; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("Número de factura del proveedor repetida."); }
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Número de factura del proveedor repetida.";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_fac_compras_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_fac_compras_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "Número de factura del proveedor repetida.";
 }
;
}
else
{
	$this->control =0;
	$this->usuario =$this->sc_temp_gidtercero;
}
if (isset($this->sc_temp_gidtercero)) { $_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_control != $this->control || (isset($bFlagRead_control) && $bFlagRead_control)))
    {
        $this->ajax_return_values_control(true);
    }
    if (($original_idprov != $this->idprov || (isset($bFlagRead_idprov) && $bFlagRead_idprov)))
    {
        $this->ajax_return_values_idprov(true);
    }
    if (($original_numfacom != $this->numfacom || (isset($bFlagRead_numfacom) && $bFlagRead_numfacom)))
    {
        $this->ajax_return_values_numfacom(true);
    }
    if (($original_usuario != $this->usuario || (isset($bFlagRead_usuario) && $bFlagRead_usuario)))
    {
        $this->ajax_return_values_usuario(true);
    }
}
$_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'off'; 
    }
    if ("alterar" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_idfaccom = $this->idfaccom;
    $original_idprov = $this->idprov;
    $original_numfacom = $this->numfacom;
}
  $vnum   = $this->numfacom ;
$vprov  = $this->idprov ;
$vidfac = $this->idfaccom ;

 
      $nm_select = "select numfacom from facturacom where numfacom='".$vnum."' and idprov='".$vprov."' and idfaccom<>'".$vidfac."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiExi = array();
      $this->vsiexi = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vSiExi[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vsiexi[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiExi = false;
          $this->vSiExi_erro = $this->Db->ErrorMsg();
          $this->vsiexi = false;
          $this->vsiexi_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vsiexi[0][0]))
{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Número de factura del proveedor repetida.";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_fac_compras_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_fac_compras_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "Número de factura del proveedor repetida.";
 }
;
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_idfaccom != $this->idfaccom || (isset($bFlagRead_idfaccom) && $bFlagRead_idfaccom)))
    {
        $this->ajax_return_values_idfaccom(true);
    }
    if (($original_idprov != $this->idprov || (isset($bFlagRead_idprov) && $bFlagRead_idprov)))
    {
        $this->ajax_return_values_idprov(true);
    }
    if (($original_numfacom != $this->numfacom || (isset($bFlagRead_numfacom) && $bFlagRead_numfacom)))
    {
        $this->ajax_return_values_numfacom(true);
    }
}
$_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'off'; 
    }
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_idfaccom = $this->idfaccom;
    $original_numfacom = $this->numfacom;
}
              /* detallecompra */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM detallecompra WHERE numfaccom = '" . $this->numfacom  . "' AND idfaccom = '" . $this->idfaccom  . "'";
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM detallecompra WHERE numfaccom = '" . $this->numfacom  . "' AND idfaccom = '" . $this->idfaccom  . "'";
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM detallecompra WHERE numfaccom = '" . $this->numfacom  . "' AND idfaccom = '" . $this->idfaccom  . "'";
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM detallecompra WHERE numfaccom = '" . $this->numfacom  . "' AND idfaccom = '" . $this->idfaccom  . "'";
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM detallecompra WHERE numfaccom = '" . $this->numfacom  . "' AND idfaccom = '" . $this->idfaccom  . "'";
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_detallecompra = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dataset_detallecompra[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_detallecompra = false;
          $this->dataset_detallecompra_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_detallecompra[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_fac_compras_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_fac_compras_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }

            /* inventario */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM inventario WHERE idfaccom = '" . $this->idfaccom  . "'";
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM inventario WHERE idfaccom = '" . $this->idfaccom  . "'";
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM inventario WHERE idfaccom = '" . $this->idfaccom  . "'";
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM inventario WHERE idfaccom = '" . $this->idfaccom  . "'";
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM inventario WHERE idfaccom = '" . $this->idfaccom  . "'";
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_inventario = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dataset_inventario[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_inventario = false;
          $this->dataset_inventario_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_inventario[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_fac_compras_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_fac_compras_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_idfaccom != $this->idfaccom || (isset($bFlagRead_idfaccom) && $bFlagRead_idfaccom)))
    {
        $this->ajax_return_values_idfaccom(true);
    }
    if (($original_numfacom != $this->numfacom || (isset($bFlagRead_numfacom) && $bFlagRead_numfacom)))
    {
        $this->ajax_return_values_numfacom(true);
    }
}
$_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'off'; 
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
      $NM_val_form['es_remision'] = $this->es_remision;
      $NM_val_form['id_pedidocom'] = $this->id_pedidocom;
      $NM_val_form['numfacom'] = $this->numfacom;
      $NM_val_form['fechacom'] = $this->fechacom;
      $NM_val_form['idprov'] = $this->idprov;
      $NM_val_form['formapago'] = $this->formapago;
      $NM_val_form['fechavenc'] = $this->fechavenc;
      $NM_val_form['total'] = $this->total;
      $NM_val_form['saldo'] = $this->saldo;
      $NM_val_form['pagada'] = $this->pagada;
      $NM_val_form['anulada'] = $this->anulada;
      $NM_val_form['asentada'] = $this->asentada;
      $NM_val_form['subtotal'] = $this->subtotal;
      $NM_val_form['valoriva'] = $this->valoriva;
      $NM_val_form['retencion'] = $this->retencion;
      $NM_val_form['reteica'] = $this->reteica;
      $NM_val_form['reteiva'] = $this->reteiva;
      $NM_val_form['banco'] = $this->banco;
      $NM_val_form['idfaccom'] = $this->idfaccom;
      $NM_val_form['detalle'] = $this->detalle;
      $NM_val_form['hdetalle'] = $this->hdetalle;
      $NM_val_form['prefijo_delpedido'] = $this->prefijo_delpedido;
      $NM_val_form['observaciones'] = $this->observaciones;
      $NM_val_form['control'] = $this->control;
      $NM_val_form['usuario'] = $this->usuario;
      $NM_val_form['cod_cuenta'] = $this->cod_cuenta;
      $NM_val_form['creado'] = $this->creado;
      $NM_val_form['editado'] = $this->editado;
      $NM_val_form['num_ndevolucion'] = $this->num_ndevolucion;
      if ($this->idfaccom === "" || is_null($this->idfaccom))  
      { 
          $this->idfaccom = 0;
      } 
      if ($this->idprov === "" || is_null($this->idprov))  
      { 
          $this->idprov = 0;
          $this->sc_force_zero[] = 'idprov';
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
      if ($this->control === "" || is_null($this->control))  
      { 
          $this->control = 0;
          $this->sc_force_zero[] = 'control';
      } 
      if ($this->saldo === "" || is_null($this->saldo))  
      { 
          $this->saldo = 0;
          $this->sc_force_zero[] = 'saldo';
      } 
      if ($this->id_pedidocom === "" || is_null($this->id_pedidocom))  
      { 
          $this->id_pedidocom = 0;
          $this->sc_force_zero[] = 'id_pedidocom';
      } 
      if ($this->retencion === "" || is_null($this->retencion))  
      { 
          $this->retencion = 0;
          $this->sc_force_zero[] = 'retencion';
      } 
      if ($this->reteica === "" || is_null($this->reteica))  
      { 
          $this->reteica = 0;
          $this->sc_force_zero[] = 'reteica';
      } 
      if ($this->reteiva === "" || is_null($this->reteiva))  
      { 
          $this->reteiva = 0;
          $this->sc_force_zero[] = 'reteiva';
      } 
      if ($this->usuario === "" || is_null($this->usuario))  
      { 
          $this->usuario = 0;
          $this->sc_force_zero[] = 'usuario';
      } 
      if ($this->banco === "" || is_null($this->banco))  
      { 
          $this->banco = 0;
          $this->sc_force_zero[] = 'banco';
      } 
      if ($this->num_ndevolucion === "" || is_null($this->num_ndevolucion))  
      { 
          $this->num_ndevolucion = 0;
          $this->sc_force_zero[] = 'num_ndevolucion';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->numfacom_before_qstr = $this->numfacom;
          $this->numfacom = substr($this->Db->qstr($this->numfacom), 1, -1); 
          if ($this->numfacom == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->numfacom = "null"; 
              $NM_val_null[] = "numfacom";
          } 
          $this->formapago_before_qstr = $this->formapago;
          $this->formapago = substr($this->Db->qstr($this->formapago), 1, -1); 
          if ($this->formapago == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->formapago = "null"; 
              $NM_val_null[] = "formapago";
          } 
          if ($this->fechacom == "")  
          { 
              $this->fechacom = "null"; 
              $NM_val_null[] = "fechacom";
          } 
          if ($this->fechavenc == "")  
          { 
              $this->fechavenc = "null"; 
              $NM_val_null[] = "fechavenc";
          } 
          $this->pagada_before_qstr = $this->pagada;
          $this->pagada = substr($this->Db->qstr($this->pagada), 1, -1); 
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
          $this->anulada_before_qstr = $this->anulada;
          $this->anulada = substr($this->Db->qstr($this->anulada), 1, -1); 
          if ($this->anulada == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->anulada = "null"; 
              $NM_val_null[] = "anulada";
          } 
          $this->es_remision_before_qstr = $this->es_remision;
          $this->es_remision = substr($this->Db->qstr($this->es_remision), 1, -1); 
          if ($this->es_remision == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->es_remision = "null"; 
              $NM_val_null[] = "es_remision";
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 fac_compras_mob_pack_ajax_response();
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
                  $SC_fields_update[] = "numfacom = '$this->numfacom', formapago = '$this->formapago', fechacom = #$this->fechacom#, fechavenc = #$this->fechavenc#, idprov = $this->idprov, subtotal = $this->subtotal, valoriva = $this->valoriva, total = $this->total, pagada = '$this->pagada', asentada = $this->asentada, control = $this->control, observaciones = '$this->observaciones', saldo = $this->saldo, anulada = '$this->anulada', es_remision = '$this->es_remision', id_pedidocom = $this->id_pedidocom, retencion = $this->retencion, reteica = $this->reteica, reteiva = $this->reteiva, usuario = $this->usuario, banco = $this->banco, creado = #$this->creado#, editado = #$this->editado#"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numfacom = '$this->numfacom', formapago = '$this->formapago', fechacom = " . $this->Ini->date_delim . $this->fechacom . $this->Ini->date_delim1 . ", fechavenc = " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", idprov = $this->idprov, subtotal = $this->subtotal, valoriva = $this->valoriva, total = $this->total, pagada = '$this->pagada', asentada = $this->asentada, control = $this->control, observaciones = '$this->observaciones', saldo = $this->saldo, anulada = '$this->anulada', es_remision = '$this->es_remision', id_pedidocom = $this->id_pedidocom, retencion = $this->retencion, reteica = $this->reteica, reteiva = $this->reteiva, usuario = $this->usuario, banco = $this->banco, creado = " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", editado = " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . ""; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numfacom = '$this->numfacom', formapago = '$this->formapago', fechacom = " . $this->Ini->date_delim . $this->fechacom . $this->Ini->date_delim1 . ", fechavenc = " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", idprov = $this->idprov, subtotal = $this->subtotal, valoriva = $this->valoriva, total = $this->total, pagada = '$this->pagada', asentada = $this->asentada, control = $this->control, observaciones = '$this->observaciones', saldo = $this->saldo, anulada = '$this->anulada', es_remision = '$this->es_remision', id_pedidocom = $this->id_pedidocom, retencion = $this->retencion, reteica = $this->reteica, reteiva = $this->reteiva, usuario = $this->usuario, banco = $this->banco, creado = " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", editado = " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . ""; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numfacom = '$this->numfacom', formapago = '$this->formapago', fechacom = EXTEND('$this->fechacom', YEAR TO DAY), fechavenc = EXTEND('$this->fechavenc', YEAR TO DAY), idprov = $this->idprov, subtotal = $this->subtotal, valoriva = $this->valoriva, total = $this->total, pagada = '$this->pagada', asentada = $this->asentada, control = $this->control, observaciones = '$this->observaciones', saldo = $this->saldo, anulada = '$this->anulada', es_remision = '$this->es_remision', id_pedidocom = $this->id_pedidocom, retencion = $this->retencion, reteica = $this->reteica, reteiva = $this->reteiva, usuario = $this->usuario, banco = $this->banco, creado = EXTEND('$this->creado', YEAR TO FRACTION), editado = EXTEND('$this->editado', YEAR TO FRACTION)"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numfacom = '$this->numfacom', formapago = '$this->formapago', fechacom = " . $this->Ini->date_delim . $this->fechacom . $this->Ini->date_delim1 . ", fechavenc = " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", idprov = $this->idprov, subtotal = $this->subtotal, valoriva = $this->valoriva, total = $this->total, pagada = '$this->pagada', asentada = $this->asentada, control = $this->control, observaciones = '$this->observaciones', saldo = $this->saldo, anulada = '$this->anulada', es_remision = '$this->es_remision', id_pedidocom = $this->id_pedidocom, retencion = $this->retencion, reteica = $this->reteica, reteiva = $this->reteiva, usuario = $this->usuario, banco = $this->banco, creado = " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", editado = " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . ""; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numfacom = '$this->numfacom', formapago = '$this->formapago', fechacom = " . $this->Ini->date_delim . $this->fechacom . $this->Ini->date_delim1 . ", fechavenc = " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", idprov = $this->idprov, subtotal = $this->subtotal, valoriva = $this->valoriva, total = $this->total, pagada = '$this->pagada', asentada = $this->asentada, control = $this->control, observaciones = '$this->observaciones', saldo = $this->saldo, anulada = '$this->anulada', es_remision = '$this->es_remision', id_pedidocom = $this->id_pedidocom, retencion = $this->retencion, reteica = $this->reteica, reteiva = $this->reteiva, usuario = $this->usuario, banco = $this->banco, creado = " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", editado = " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . ""; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numfacom = '$this->numfacom', formapago = '$this->formapago', fechacom = " . $this->Ini->date_delim . $this->fechacom . $this->Ini->date_delim1 . ", fechavenc = " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", idprov = $this->idprov, subtotal = $this->subtotal, valoriva = $this->valoriva, total = $this->total, pagada = '$this->pagada', asentada = $this->asentada, control = $this->control, observaciones = '$this->observaciones', saldo = $this->saldo, anulada = '$this->anulada', es_remision = '$this->es_remision', id_pedidocom = $this->id_pedidocom, retencion = $this->retencion, reteica = $this->reteica, reteiva = $this->reteiva, usuario = $this->usuario, banco = $this->banco, creado = " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", editado = " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . ""; 
              } 
              if (isset($NM_val_form['num_ndevolucion']) && $NM_val_form['num_ndevolucion'] != $this->nmgp_dados_select['num_ndevolucion']) 
              { 
                  $SC_fields_update[] = "num_ndevolucion = $this->num_ndevolucion"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE idfaccom = $this->idfaccom ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE idfaccom = $this->idfaccom ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE idfaccom = $this->idfaccom ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE idfaccom = $this->idfaccom ";  
              }  
              else  
              {
                  $comando .= " WHERE idfaccom = $this->idfaccom ";  
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
                                  fac_compras_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->numfacom = $this->numfacom_before_qstr;
              $this->formapago = $this->formapago_before_qstr;
              $this->pagada = $this->pagada_before_qstr;
              $this->observaciones = $this->observaciones_before_qstr;
              $this->anulada = $this->anulada_before_qstr;
              $this->es_remision = $this->es_remision_before_qstr;
              $this->cod_cuenta = $this->cod_cuenta_before_qstr;
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['idfaccom'])) { $this->idfaccom = $NM_val_form['idfaccom']; }
              elseif (isset($this->idfaccom)) { $this->nm_limpa_alfa($this->idfaccom); }
              if     (isset($NM_val_form) && isset($NM_val_form['numfacom'])) { $this->numfacom = $NM_val_form['numfacom']; }
              elseif (isset($this->numfacom)) { $this->nm_limpa_alfa($this->numfacom); }
              if     (isset($NM_val_form) && isset($NM_val_form['formapago'])) { $this->formapago = $NM_val_form['formapago']; }
              elseif (isset($this->formapago)) { $this->nm_limpa_alfa($this->formapago); }
              if     (isset($NM_val_form) && isset($NM_val_form['idprov'])) { $this->idprov = $NM_val_form['idprov']; }
              elseif (isset($this->idprov)) { $this->nm_limpa_alfa($this->idprov); }
              if     (isset($NM_val_form) && isset($NM_val_form['subtotal'])) { $this->subtotal = $NM_val_form['subtotal']; }
              elseif (isset($this->subtotal)) { $this->nm_limpa_alfa($this->subtotal); }
              if     (isset($NM_val_form) && isset($NM_val_form['valoriva'])) { $this->valoriva = $NM_val_form['valoriva']; }
              elseif (isset($this->valoriva)) { $this->nm_limpa_alfa($this->valoriva); }
              if     (isset($NM_val_form) && isset($NM_val_form['total'])) { $this->total = $NM_val_form['total']; }
              elseif (isset($this->total)) { $this->nm_limpa_alfa($this->total); }
              if     (isset($NM_val_form) && isset($NM_val_form['pagada'])) { $this->pagada = $NM_val_form['pagada']; }
              elseif (isset($this->pagada)) { $this->nm_limpa_alfa($this->pagada); }
              if     (isset($NM_val_form) && isset($NM_val_form['asentada'])) { $this->asentada = $NM_val_form['asentada']; }
              elseif (isset($this->asentada)) { $this->nm_limpa_alfa($this->asentada); }
              if     (isset($NM_val_form) && isset($NM_val_form['control'])) { $this->control = $NM_val_form['control']; }
              elseif (isset($this->control)) { $this->nm_limpa_alfa($this->control); }
              if     (isset($NM_val_form) && isset($NM_val_form['observaciones'])) { $this->observaciones = $NM_val_form['observaciones']; }
              elseif (isset($this->observaciones)) { $this->nm_limpa_alfa($this->observaciones); }
              if     (isset($NM_val_form) && isset($NM_val_form['saldo'])) { $this->saldo = $NM_val_form['saldo']; }
              elseif (isset($this->saldo)) { $this->nm_limpa_alfa($this->saldo); }
              if     (isset($NM_val_form) && isset($NM_val_form['anulada'])) { $this->anulada = $NM_val_form['anulada']; }
              elseif (isset($this->anulada)) { $this->nm_limpa_alfa($this->anulada); }
              if     (isset($NM_val_form) && isset($NM_val_form['es_remision'])) { $this->es_remision = $NM_val_form['es_remision']; }
              elseif (isset($this->es_remision)) { $this->nm_limpa_alfa($this->es_remision); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_pedidocom'])) { $this->id_pedidocom = $NM_val_form['id_pedidocom']; }
              elseif (isset($this->id_pedidocom)) { $this->nm_limpa_alfa($this->id_pedidocom); }
              if     (isset($NM_val_form) && isset($NM_val_form['retencion'])) { $this->retencion = $NM_val_form['retencion']; }
              elseif (isset($this->retencion)) { $this->nm_limpa_alfa($this->retencion); }
              if     (isset($NM_val_form) && isset($NM_val_form['reteica'])) { $this->reteica = $NM_val_form['reteica']; }
              elseif (isset($this->reteica)) { $this->nm_limpa_alfa($this->reteica); }
              if     (isset($NM_val_form) && isset($NM_val_form['reteiva'])) { $this->reteiva = $NM_val_form['reteiva']; }
              elseif (isset($this->reteiva)) { $this->nm_limpa_alfa($this->reteiva); }
              if     (isset($NM_val_form) && isset($NM_val_form['usuario'])) { $this->usuario = $NM_val_form['usuario']; }
              elseif (isset($this->usuario)) { $this->nm_limpa_alfa($this->usuario); }
              if     (isset($NM_val_form) && isset($NM_val_form['banco'])) { $this->banco = $NM_val_form['banco']; }
              elseif (isset($this->banco)) { $this->nm_limpa_alfa($this->banco); }
              if     (isset($NM_val_form) && isset($NM_val_form['cod_cuenta'])) { $this->cod_cuenta = $NM_val_form['cod_cuenta']; }
              elseif (isset($this->cod_cuenta)) { $this->nm_limpa_alfa($this->cod_cuenta); }
              if     (isset($NM_val_form) && isset($NM_val_form['detalle'])) { $this->detalle = $NM_val_form['detalle']; }
              elseif (isset($this->detalle)) { $this->nm_limpa_alfa($this->detalle); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('es_remision', 'id_pedidocom', 'numfacom', 'fechacom', 'idprov', 'formapago', 'fechavenc', 'total', 'saldo', 'pagada', 'anulada', 'asentada', 'subtotal', 'valoriva', 'retencion', 'reteica', 'reteiva', 'banco', 'idfaccom', 'detalle', 'hdetalle', 'prefijo_delpedido', 'observaciones', 'control', 'usuario', 'cod_cuenta', 'creado', 'editado'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "idfaccom, ";
          } 
              $this->creado =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->creado_hora =  date('H') . ":" . date('i') . ":" . date('s');
              $this->editado =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->editado_hora =  date('H') . ":" . date('i') . ":" . date('s');
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      fac_compras_mob_pack_ajax_response();
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
                  if ($this->pagada != "")
                  { 
                       $compl_insert     .= ", pagada";
                       $compl_insert_val .= ", '$this->pagada'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (numfacom, formapago, fechacom, fechavenc, idprov, subtotal, valoriva, total, asentada, control, observaciones, saldo, anulada, es_remision, id_pedidocom, retencion, reteica, reteiva, usuario, banco, num_ndevolucion, creado, editado $compl_insert) VALUES ('$this->numfacom', '$this->formapago', #$this->fechacom#, #$this->fechavenc#, $this->idprov, $this->subtotal, $this->valoriva, $this->total, $this->asentada, $this->control, '$this->observaciones', $this->saldo, '$this->anulada', '$this->es_remision', $this->id_pedidocom, $this->retencion, $this->reteica, $this->reteiva, $this->usuario, $this->banco, $this->num_ndevolucion, #$this->creado#, #$this->editado# $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->pagada != "")
                  { 
                       $compl_insert     .= ", pagada";
                       $compl_insert_val .= ", '$this->pagada'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacom, formapago, fechacom, fechavenc, idprov, subtotal, valoriva, total, asentada, control, observaciones, saldo, anulada, es_remision, id_pedidocom, retencion, reteica, reteiva, usuario, banco, num_ndevolucion, creado, editado $compl_insert) VALUES (" . $NM_seq_auto . "'$this->numfacom', '$this->formapago', " . $this->Ini->date_delim . $this->fechacom . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", $this->idprov, $this->subtotal, $this->valoriva, $this->total, $this->asentada, $this->control, '$this->observaciones', $this->saldo, '$this->anulada', '$this->es_remision', $this->id_pedidocom, $this->retencion, $this->reteica, $this->reteiva, $this->usuario, $this->banco, $this->num_ndevolucion, " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . " $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->pagada != "")
                  { 
                       $compl_insert     .= ", pagada";
                       $compl_insert_val .= ", '$this->pagada'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacom, formapago, fechacom, fechavenc, idprov, subtotal, valoriva, total, asentada, control, observaciones, saldo, anulada, es_remision, id_pedidocom, retencion, reteica, reteiva, usuario, banco, num_ndevolucion, creado, editado $compl_insert) VALUES (" . $NM_seq_auto . "'$this->numfacom', '$this->formapago', " . $this->Ini->date_delim . $this->fechacom . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", $this->idprov, $this->subtotal, $this->valoriva, $this->total, $this->asentada, $this->control, '$this->observaciones', $this->saldo, '$this->anulada', '$this->es_remision', $this->id_pedidocom, $this->retencion, $this->reteica, $this->reteiva, $this->usuario, $this->banco, $this->num_ndevolucion, " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . " $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->pagada != "")
                  { 
                       $compl_insert     .= ", pagada";
                       $compl_insert_val .= ", '$this->pagada'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacom, formapago, fechacom, fechavenc, idprov, subtotal, valoriva, total, asentada, control, observaciones, saldo, anulada, es_remision, id_pedidocom, retencion, reteica, reteiva, usuario, banco, num_ndevolucion, creado, editado $compl_insert) VALUES (" . $NM_seq_auto . "'$this->numfacom', '$this->formapago', " . $this->Ini->date_delim . $this->fechacom . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", $this->idprov, $this->subtotal, $this->valoriva, $this->total, $this->asentada, $this->control, '$this->observaciones', $this->saldo, '$this->anulada', '$this->es_remision', $this->id_pedidocom, $this->retencion, $this->reteica, $this->reteiva, $this->usuario, $this->banco, $this->num_ndevolucion, " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . " $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->pagada != "")
                  { 
                       $compl_insert     .= ", pagada";
                       $compl_insert_val .= ", '$this->pagada'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacom, formapago, fechacom, fechavenc, idprov, subtotal, valoriva, total, asentada, control, observaciones, saldo, anulada, es_remision, id_pedidocom, retencion, reteica, reteiva, usuario, banco, num_ndevolucion, creado, editado $compl_insert) VALUES (" . $NM_seq_auto . "'$this->numfacom', '$this->formapago', EXTEND('$this->fechacom', YEAR TO DAY), EXTEND('$this->fechavenc', YEAR TO DAY), $this->idprov, $this->subtotal, $this->valoriva, $this->total, $this->asentada, $this->control, '$this->observaciones', $this->saldo, '$this->anulada', '$this->es_remision', $this->id_pedidocom, $this->retencion, $this->reteica, $this->reteiva, $this->usuario, $this->banco, $this->num_ndevolucion, EXTEND('$this->creado', YEAR TO FRACTION), EXTEND('$this->editado', YEAR TO FRACTION) $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->pagada != "")
                  { 
                       $compl_insert     .= ", pagada";
                       $compl_insert_val .= ", '$this->pagada'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacom, formapago, fechacom, fechavenc, idprov, subtotal, valoriva, total, asentada, control, observaciones, saldo, anulada, es_remision, id_pedidocom, retencion, reteica, reteiva, usuario, banco, num_ndevolucion, creado, editado $compl_insert) VALUES (" . $NM_seq_auto . "'$this->numfacom', '$this->formapago', " . $this->Ini->date_delim . $this->fechacom . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", $this->idprov, $this->subtotal, $this->valoriva, $this->total, $this->asentada, $this->control, '$this->observaciones', $this->saldo, '$this->anulada', '$this->es_remision', $this->id_pedidocom, $this->retencion, $this->reteica, $this->reteiva, $this->usuario, $this->banco, $this->num_ndevolucion, " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . " $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->pagada != "")
                  { 
                       $compl_insert     .= ", pagada";
                       $compl_insert_val .= ", '$this->pagada'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacom, formapago, fechacom, fechavenc, idprov, subtotal, valoriva, total, asentada, control, observaciones, saldo, anulada, es_remision, id_pedidocom, retencion, reteica, reteiva, usuario, banco, num_ndevolucion, creado, editado $compl_insert) VALUES (" . $NM_seq_auto . "'$this->numfacom', '$this->formapago', " . $this->Ini->date_delim . $this->fechacom . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", $this->idprov, $this->subtotal, $this->valoriva, $this->total, $this->asentada, $this->control, '$this->observaciones', $this->saldo, '$this->anulada', '$this->es_remision', $this->id_pedidocom, $this->retencion, $this->reteica, $this->reteiva, $this->usuario, $this->banco, $this->num_ndevolucion, " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . " $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->pagada != "")
                  { 
                       $compl_insert     .= ", pagada";
                       $compl_insert_val .= ", '$this->pagada'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacom, formapago, fechacom, fechavenc, idprov, subtotal, valoriva, total, asentada, control, observaciones, saldo, anulada, es_remision, id_pedidocom, retencion, reteica, reteiva, usuario, banco, num_ndevolucion, creado, editado $compl_insert) VALUES (" . $NM_seq_auto . "'$this->numfacom', '$this->formapago', " . $this->Ini->date_delim . $this->fechacom . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", $this->idprov, $this->subtotal, $this->valoriva, $this->total, $this->asentada, $this->control, '$this->observaciones', $this->saldo, '$this->anulada', '$this->es_remision', $this->id_pedidocom, $this->retencion, $this->reteica, $this->reteiva, $this->usuario, $this->banco, $this->num_ndevolucion, " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . " $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->pagada != "")
                  { 
                       $compl_insert     .= ", pagada";
                       $compl_insert_val .= ", '$this->pagada'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacom, formapago, fechacom, fechavenc, idprov, subtotal, valoriva, total, asentada, control, observaciones, saldo, anulada, es_remision, id_pedidocom, retencion, reteica, reteiva, usuario, banco, num_ndevolucion, creado, editado $compl_insert) VALUES (" . $NM_seq_auto . "'$this->numfacom', '$this->formapago', " . $this->Ini->date_delim . $this->fechacom . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", $this->idprov, $this->subtotal, $this->valoriva, $this->total, $this->asentada, $this->control, '$this->observaciones', $this->saldo, '$this->anulada', '$this->es_remision', $this->id_pedidocom, $this->retencion, $this->reteica, $this->reteiva, $this->usuario, $this->banco, $this->num_ndevolucion, " . $this->Ini->date_delim . $this->creado . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->editado . $this->Ini->date_delim1 . " $compl_insert_val)"; 
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
                              fac_compras_mob_pack_ajax_response();
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
                          fac_compras_mob_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->idfaccom =  $rsy->fields[0];
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
                  $this->idfaccom = $rsy->fields[0];
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
                  $this->idfaccom = $rsy->fields[0];
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
                  $this->idfaccom = $rsy->fields[0];
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
                  $this->idfaccom = $rsy->fields[0];
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
                  $this->idfaccom = $rsy->fields[0];
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
                  $this->idfaccom = $rsy->fields[0];
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
                  $this->idfaccom = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->numfacom = $this->numfacom_before_qstr;
              $this->formapago = $this->formapago_before_qstr;
              $this->pagada = $this->pagada_before_qstr;
              $this->observaciones = $this->observaciones_before_qstr;
              $this->anulada = $this->anulada_before_qstr;
              $this->es_remision = $this->es_remision_before_qstr;
              $this->cod_cuenta = $this->cod_cuenta_before_qstr;
              $this->detalle = $this->detalle_before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->numfacom = $this->numfacom_before_qstr;
              $this->formapago = $this->formapago_before_qstr;
              $this->pagada = $this->pagada_before_qstr;
              $this->observaciones = $this->observaciones_before_qstr;
              $this->anulada = $this->anulada_before_qstr;
              $this->es_remision = $this->es_remision_before_qstr;
              $this->cod_cuenta = $this->cod_cuenta_before_qstr;
              $this->detalle = $this->detalle_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              $this->nmgp_botoes['Eliminar'] = "on";
              $this->nmgp_botoes['sc_btn_0'] = "on";
              $this->return_after_insert();
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->idfaccom = substr($this->Db->qstr($this->idfaccom), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idfaccom = $this->idfaccom "); 
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
                          fac_compras_mob_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['total']);
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['decimal_db'] == ",")
        {
            $this->nm_troca_decimal(",", ".");
        }
        $_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_fechacom = $this->fechacom;
    $original_id_pedidocom = $this->id_pedidocom;
    $original_idfaccom = $this->idfaccom;
    $original_idprov = $this->idprov;
    $original_numfacom = $this->numfacom;
}
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
  
     $nm_select ="insert into log set usuario='".$this->sc_temp_gidtercero."',accion='AGREGAR', observaciones='EL USUARIO AGREGÓ LA COMPRA NO: $this->numfacom .' "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                fac_compras_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;


     $nm_select ="UPDATE terceros set fechultcomp='$this->fechacom' where idtercero=$this->idprov "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                fac_compras_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
$idcomp=$this->idfaccom ;
$fec=$this->fechacom ;

$para=$this->id_pedidocom ;
if($para>0)
	{
	$id=0;
	$idped=0;
	$idproducto=0;
	$unimay="";
	$facto=0;
	$bod=0;
	$cost=0;
	$cantidad=0;
	$vunit=0;
	$vparcial=0;
	$iva=0;
	$desc=0;
	$tiva=0;
	$tdes=0;
	$col=0;
	$tal=0;
	$sab=0;
	 
      $nm_select = "select * from detallepedido where idpedid=$para"; 
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
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
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
                 $SCrx->fields[22] = str_replace(',', '.', $SCrx->fields[22]);
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
                 $SCrx->fields[22] = (strpos(strtolower($SCrx->fields[22]), "e")) ? (float)$SCrx->fields[22] : $SCrx->fields[22];
                 $SCrx->fields[22] = (string)$SCrx->fields[22];
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
	   { $i=0;
		  foreach($this->ds  as $ads)
				{$i=$i+1;
				 $id.=$ads[0];
				 $idped.=$ads[1];
				 $idproducto.=$ads[4];
				 $unimay.=$ads[5];
				 $facto.=$ads[6];
				 $bod.=$ads[7];
				 $cost.=$ads[8];
				 $cantidad.=$ads[9];
				 $vunit.=$ads[10];
				 $vparcial.=$ads[11];
				 $iva.=$ads[12];
				 $desc.=$ads[13];
				 $tiva.=$ads[14];
				 $tdes.=$ads[15];
				 $col.=$ads[17];
				 $tal.=$ads[18];
				 $sab.=$ads[19];
				 

     $nm_select ="insert detallecompra set idfaccom=$idcomp, idpro=$idproducto, idbod=$bod, cantidad=$cantidad, valorunit=$vunit, valorpar=$vparcial, iva=$iva, descuento=$desc, tasaiva=$tiva, tasadesc=$tdes, devuelto=0, colores=$col, tallas=$tal, sabor=$sab"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                fac_compras_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ; 
				 
 
      $nm_select = "select iddet from detallecompra order by iddet DESC Limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->da = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->da = false;
          $this->da_erro = $this->Db->ErrorMsg();
      } 
;
$iddeta=substr($this->da , 5);

$sql="select stockmen from productos where idprod=$idproducto";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->das = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->das = false;
          $this->das_erro = $this->Db->ErrorMsg();
      } 
;
$existencia=substr($this->das , 8);
			 
	
     $nm_select ="INSERT inventario SET fecha='$fec', cantidad=$cantidad, idpro=$idproducto, costo=$vunit-$desc, 	valorparcial=$vparcial, idbod=$bod, tipo=1, detalle='Compra-Pedido', idmov=1, idfaccom=$idcomp, nufacvta=0, iddetalle=$iddeta, colores=$col, tallas=$tal, sabor=$sab"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                fac_compras_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	
	$sql1="UPDATE productos SET stockmen = ($existencia+$cantidad) WHERE idprod=$idproducto";
	
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
                fac_compras_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

	$id=0;
	$idped=0;
	$idproducto=0;
	$unimay="";
	$facto=0;
	$bod=0;
	$cost=0;
	$cantidad=0;
	$vunit=0;
	$vparcial=0;
	$iva=0;
	$desc=0;
	$tiva=0;
	$tdes=0;
	$col=0;
	$tal=0;
	$sab=0;
				}
	 
      $nm_select = "select observaciones from pedidos where idpedido=$para"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_pedido = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dt_pedido[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_pedido = false;
          $this->dt_pedido_erro = $this->Db->ErrorMsg();
      } 
;
	$vObserv=$this->dt_pedido[0][0];
	$vNumfac=$this->numfacom ;
	$vObserv="$vObserv".' , '."$vNumfac";
	
     $nm_select ="UPDATE pedidos set numfacven=$idcomp, facturado='SI', asentada=1,  observaciones='$vObserv' where idpedido=$para"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                fac_compras_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		
	}

	else
		{
		$this->nm_mens_alert[] = "¡Pedido no tiene detalle!"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("¡Pedido no tiene detalle!"); }}
	}
$this->sc_set_focus('hdetalle');
if (isset($this->sc_temp_gidtercero)) { $_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_fechacom != $this->fechacom || (isset($bFlagRead_fechacom) && $bFlagRead_fechacom)))
    {
        $this->ajax_return_values_fechacom(true);
    }
    if (($original_id_pedidocom != $this->id_pedidocom || (isset($bFlagRead_id_pedidocom) && $bFlagRead_id_pedidocom)))
    {
        $this->ajax_return_values_id_pedidocom(true);
    }
    if (($original_idfaccom != $this->idfaccom || (isset($bFlagRead_idfaccom) && $bFlagRead_idfaccom)))
    {
        $this->ajax_return_values_idfaccom(true);
    }
    if (($original_idprov != $this->idprov || (isset($bFlagRead_idprov) && $bFlagRead_idprov)))
    {
        $this->ajax_return_values_idprov(true);
    }
    if (($original_numfacom != $this->numfacom || (isset($bFlagRead_numfacom) && $bFlagRead_numfacom)))
    {
        $this->ajax_return_values_numfacom(true);
    }
}
$_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_numfacom = $this->numfacom;
}
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
  
     $nm_select ="insert into log set usuario='".$this->sc_temp_gidtercero."',accion='EDITAR', observaciones='EL USUARIO EDITÓ LA COMPRA NO: $this->numfacom .' "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                fac_compras_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
if (isset($this->sc_temp_gidtercero)) { $_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_numfacom != $this->numfacom || (isset($bFlagRead_numfacom) && $bFlagRead_numfacom)))
    {
        $this->ajax_return_values_numfacom(true);
    }
}
$_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'off'; 
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['decimal_db'] == ",")
   {
       $this->nm_troca_decimal(".", ",");
   }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['parms'] = "idfaccom?#?$this->idfaccom?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idfaccom = null === $this->idfaccom ? null : substr($this->Db->qstr($this->idfaccom), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['run_iframe'] == "R")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->idfaccom)) 
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
      if ($this->nmgp_opcao != "nada" && (trim($this->idfaccom) == "")) 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['run_iframe'] == "F" && $this->sc_evento == "insert")
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_fac_compras_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['total'] = $qt_geral_reg_fac_compras_mob;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->idfaccom))
          {
              $Reg_OK      = false;
              $Count_start = -1;
              $sc_order_by = "";
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Sel_Chave = "idfaccom"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Sel_Chave = "idfaccom"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Sel_Chave = "idfaccom"; 
              }
              else  
              {
                  $Sel_Chave = "idfaccom"; 
              }
              $nmgp_select = "SELECT " . $Sel_Chave . " from " . $this->Ini->nm_tabela . $sc_where; 
              $sc_order_by = "idfaccom DESC";
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
                  if ($rt->fields[0] == $this->idfaccom)
                  { 
                      $Reg_OK = true;
                  }  
                  $Count_start++;
                  $rt->MoveNext();
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start'] = $Count_start;
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_fac_compras_mob = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start'] > $qt_geral_reg_fac_compras_mob)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start'] = $qt_geral_reg_fac_compras_mob; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start'] = $qt_geral_reg_fac_compras_mob; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_fac_compras_mob) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT idfaccom, numfacom, formapago, str_replace (convert(char(10),fechacom,102), '.', '-') + ' ' + convert(char(8),fechacom,20), str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), idprov, subtotal, valoriva, total, pagada, asentada, control, observaciones, saldo, anulada, es_remision, id_pedidocom, retencion, reteica, reteiva, usuario, banco, num_ndevolucion, str_replace (convert(char(10),creado,102), '.', '-') + ' ' + convert(char(8),creado,20), str_replace (convert(char(10),editado,102), '.', '-') + ' ' + convert(char(8),editado,20), cod_cuenta from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT idfaccom, numfacom, formapago, convert(char(23),fechacom,121), convert(char(23),fechavenc,121), idprov, subtotal, valoriva, total, pagada, asentada, control, observaciones, saldo, anulada, es_remision, id_pedidocom, retencion, reteica, reteiva, usuario, banco, num_ndevolucion, convert(char(23),creado,121), convert(char(23),editado,121), cod_cuenta from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT idfaccom, numfacom, formapago, fechacom, fechavenc, idprov, subtotal, valoriva, total, pagada, asentada, control, observaciones, saldo, anulada, es_remision, id_pedidocom, retencion, reteica, reteiva, usuario, banco, num_ndevolucion, creado, editado, cod_cuenta from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT idfaccom, numfacom, formapago, EXTEND(fechacom, YEAR TO DAY), EXTEND(fechavenc, YEAR TO DAY), idprov, subtotal, valoriva, total, pagada, asentada, control, observaciones, saldo, anulada, es_remision, id_pedidocom, retencion, reteica, reteiva, usuario, banco, num_ndevolucion, EXTEND(creado, YEAR TO FRACTION), EXTEND(editado, YEAR TO FRACTION), cod_cuenta from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT idfaccom, numfacom, formapago, fechacom, fechavenc, idprov, subtotal, valoriva, total, pagada, asentada, control, observaciones, saldo, anulada, es_remision, id_pedidocom, retencion, reteica, reteiva, usuario, banco, num_ndevolucion, creado, editado, cod_cuenta from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "idfaccom = $this->idfaccom"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "idfaccom = $this->idfaccom"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "idfaccom = $this->idfaccom"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "idfaccom = $this->idfaccom"; 
              }  
              else  
              {
                  $aWhere[] = "idfaccom = $this->idfaccom"; 
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
          $sc_order_by = "idfaccom DESC";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "insert" || $this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['Eliminar'] = $this->nmgp_botoes['Eliminar'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['sc_btn_0'] = $this->nmgp_botoes['sc_btn_0'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['empty_filter'] = true;
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
              $this->NM_ajax_info['buttonDisplay']['Eliminar'] = $this->nmgp_botoes['Eliminar'] = "off";
              $this->NM_ajax_info['buttonDisplay']['sc_btn_0'] = $this->nmgp_botoes['sc_btn_0'] = "off";
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
              $this->idfaccom = $rs->fields[0] ; 
              $this->nmgp_dados_select['idfaccom'] = $this->idfaccom;
              $this->numfacom = $rs->fields[1] ; 
              $this->nmgp_dados_select['numfacom'] = $this->numfacom;
              $this->formapago = $rs->fields[2] ; 
              $this->nmgp_dados_select['formapago'] = $this->formapago;
              $this->fechacom = $rs->fields[3] ; 
              $this->nmgp_dados_select['fechacom'] = $this->fechacom;
              $this->fechavenc = $rs->fields[4] ; 
              $this->nmgp_dados_select['fechavenc'] = $this->fechavenc;
              $this->idprov = $rs->fields[5] ; 
              $this->nmgp_dados_select['idprov'] = $this->idprov;
              $this->subtotal = trim($rs->fields[6]) ; 
              $this->nmgp_dados_select['subtotal'] = $this->subtotal;
              $this->valoriva = trim($rs->fields[7]) ; 
              $this->nmgp_dados_select['valoriva'] = $this->valoriva;
              $this->total = trim($rs->fields[8]) ; 
              $this->nmgp_dados_select['total'] = $this->total;
              $this->pagada = $rs->fields[9] ; 
              $this->nmgp_dados_select['pagada'] = $this->pagada;
              $this->asentada = $rs->fields[10] ; 
              $this->nmgp_dados_select['asentada'] = $this->asentada;
              $this->control = $rs->fields[11] ; 
              $this->nmgp_dados_select['control'] = $this->control;
              $this->observaciones = $rs->fields[12] ; 
              $this->nmgp_dados_select['observaciones'] = $this->observaciones;
              $this->saldo = trim($rs->fields[13]) ; 
              $this->nmgp_dados_select['saldo'] = $this->saldo;
              $this->anulada = $rs->fields[14] ; 
              $this->nmgp_dados_select['anulada'] = $this->anulada;
              $this->es_remision = $rs->fields[15] ; 
              $this->nmgp_dados_select['es_remision'] = $this->es_remision;
              $this->id_pedidocom = $rs->fields[16] ; 
              $this->nmgp_dados_select['id_pedidocom'] = $this->id_pedidocom;
              $this->retencion = trim($rs->fields[17]) ; 
              $this->nmgp_dados_select['retencion'] = $this->retencion;
              $this->reteica = trim($rs->fields[18]) ; 
              $this->nmgp_dados_select['reteica'] = $this->reteica;
              $this->reteiva = trim($rs->fields[19]) ; 
              $this->nmgp_dados_select['reteiva'] = $this->reteiva;
              $this->usuario = $rs->fields[20] ; 
              $this->nmgp_dados_select['usuario'] = $this->usuario;
              $this->banco = $rs->fields[21] ; 
              $this->nmgp_dados_select['banco'] = $this->banco;
              $this->num_ndevolucion = $rs->fields[22] ; 
              $this->nmgp_dados_select['num_ndevolucion'] = $this->num_ndevolucion;
              $this->creado = $rs->fields[23] ; 
              if (substr($this->creado, 10, 1) == "-") 
              { 
                 $this->creado = substr($this->creado, 0, 10) . " " . substr($this->creado, 11);
              } 
              if (substr($this->creado, 13, 1) == ".") 
              { 
                 $this->creado = substr($this->creado, 0, 13) . ":" . substr($this->creado, 14, 2) . ":" . substr($this->creado, 17);
              } 
              $this->nmgp_dados_select['creado'] = $this->creado;
              $this->editado = $rs->fields[24] ; 
              if (substr($this->editado, 10, 1) == "-") 
              { 
                 $this->editado = substr($this->editado, 0, 10) . " " . substr($this->editado, 11);
              } 
              if (substr($this->editado, 13, 1) == ".") 
              { 
                 $this->editado = substr($this->editado, 0, 13) . ":" . substr($this->editado, 14, 2) . ":" . substr($this->editado, 17);
              } 
              $this->nmgp_dados_select['editado'] = $this->editado;
              $this->cod_cuenta = $rs->fields[25] ; 
              $this->nmgp_dados_select['cod_cuenta'] = $this->cod_cuenta;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->idfaccom = (string)$this->idfaccom; 
              $this->idprov = (string)$this->idprov; 
              $this->subtotal = (strpos(strtolower($this->subtotal), "e")) ? (float)$this->subtotal : $this->subtotal; 
              $this->subtotal = (string)$this->subtotal; 
              $this->valoriva = (strpos(strtolower($this->valoriva), "e")) ? (float)$this->valoriva : $this->valoriva; 
              $this->valoriva = (string)$this->valoriva; 
              $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
              $this->total = (string)$this->total; 
              $this->asentada = (string)$this->asentada; 
              $this->control = (string)$this->control; 
              $this->saldo = (strpos(strtolower($this->saldo), "e")) ? (float)$this->saldo : $this->saldo; 
              $this->saldo = (string)$this->saldo; 
              $this->id_pedidocom = (string)$this->id_pedidocom; 
              $this->retencion = (strpos(strtolower($this->retencion), "e")) ? (float)$this->retencion : $this->retencion; 
              $this->retencion = (string)$this->retencion; 
              $this->reteica = (strpos(strtolower($this->reteica), "e")) ? (float)$this->reteica : $this->reteica; 
              $this->reteica = (string)$this->reteica; 
              $this->reteiva = (strpos(strtolower($this->reteiva), "e")) ? (float)$this->reteiva : $this->reteiva; 
              $this->reteiva = (string)$this->reteiva; 
              $this->usuario = (string)$this->usuario; 
              $this->banco = (string)$this->banco; 
              $this->num_ndevolucion = (string)$this->num_ndevolucion; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['parms'] = "idfaccom?#?$this->idfaccom?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start'] < $qt_geral_reg_fac_compras_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['opcao']   = '';
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
              $this->idfaccom = "";  
              $this->nmgp_dados_form["idfaccom"] = $this->idfaccom;
              $this->numfacom = "";  
              $this->nmgp_dados_form["numfacom"] = $this->numfacom;
              $this->formapago = "";  
              $this->nmgp_dados_form["formapago"] = $this->formapago;
              $this->fechacom =  date('Y') . "-" . date('m')  . "-" . date('d');
              $this->nmgp_dados_form["fechacom"] = $this->fechacom;
              $this->fechavenc =  date('Y') . "-" . date('m')  . "-" . date('d');
              $this->nmgp_dados_form["fechavenc"] = $this->fechavenc;
              $this->idprov = "";  
              $this->nmgp_dados_form["idprov"] = $this->idprov;
              $this->subtotal = "0";  
              $this->nmgp_dados_form["subtotal"] = $this->subtotal;
              $this->valoriva = "0";  
              $this->nmgp_dados_form["valoriva"] = $this->valoriva;
              $this->total = "0";  
              $this->nmgp_dados_form["total"] = $this->total;
              $this->pagada = "";  
              $this->nmgp_dados_form["pagada"] = $this->pagada;
              $this->asentada = "";  
              $this->nmgp_dados_form["asentada"] = $this->asentada;
              $this->control = "";  
              $this->nmgp_dados_form["control"] = $this->control;
              $this->observaciones = "SIN";  
              $this->nmgp_dados_form["observaciones"] = $this->observaciones;
              $this->saldo = "0";  
              $this->nmgp_dados_form["saldo"] = $this->saldo;
              $this->anulada = "";  
              $this->nmgp_dados_form["anulada"] = $this->anulada;
              $this->es_remision = "";  
              $this->nmgp_dados_form["es_remision"] = $this->es_remision;
              $this->id_pedidocom = "";  
              $this->nmgp_dados_form["id_pedidocom"] = $this->id_pedidocom;
              $this->retencion = "";  
              $this->nmgp_dados_form["retencion"] = $this->retencion;
              $this->reteica = "";  
              $this->nmgp_dados_form["reteica"] = $this->reteica;
              $this->reteiva = "";  
              $this->nmgp_dados_form["reteiva"] = $this->reteiva;
              $this->usuario = "";  
              $this->nmgp_dados_form["usuario"] = $this->usuario;
              $this->banco = "";  
              $this->nmgp_dados_form["banco"] = $this->banco;
              $this->num_ndevolucion = "";  
              $this->nmgp_dados_form["num_ndevolucion"] = $this->num_ndevolucion;
              $this->creado =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->creado_hora =  date('H') . ":" . date('i') . ":" . date('s');
              $this->nmgp_dados_form["creado"] = $this->creado;
              $this->editado =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->editado_hora =  date('H') . ":" . date('i') . ":" . date('s');
              $this->nmgp_dados_form["editado"] = $this->editado;
              $this->cod_cuenta = "";  
              $this->nmgp_dados_form["cod_cuenta"] = $this->cod_cuenta;
              $this->detalle = "";  
              $this->nmgp_dados_form["detalle"] = $this->detalle;
              $this->hdetalle = "";  
              $this->nmgp_dados_form["hdetalle"] = $this->hdetalle;
              $this->prefijo_delpedido = "";  
              $this->nmgp_dados_form["prefijo_delpedido"] = $this->prefijo_delpedido;
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['foreign_key'] as $sFKName => $sFKValue)
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra_fac']['embutida_parms'] = "par_idfaccom*scin" . $this->nmgp_dados_form['idfaccom'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_paginacao*scinFULL*scout";
  }
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idfaccom) from " . $this->Ini->nm_tabela . " where idfaccom < $this->idfaccom" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idfaccom) from " . $this->Ini->nm_tabela . " where idfaccom < $this->idfaccom" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idfaccom) from " . $this->Ini->nm_tabela . " where idfaccom < $this->idfaccom" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idfaccom) from " . $this->Ini->nm_tabela . " where idfaccom < $this->idfaccom" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idfaccom) from " . $this->Ini->nm_tabela . " where idfaccom < $this->idfaccom" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idfaccom) from " . $this->Ini->nm_tabela . " where idfaccom < $this->idfaccom" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idfaccom) from " . $this->Ini->nm_tabela . " where idfaccom < $this->idfaccom" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idfaccom) from " . $this->Ini->nm_tabela . " where idfaccom < $this->idfaccom" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idfaccom) from " . $this->Ini->nm_tabela . " where idfaccom < $this->idfaccom" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idfaccom) from " . $this->Ini->nm_tabela . " where idfaccom < $this->idfaccom" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idfaccom = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idfaccom) from " . $this->Ini->nm_tabela . " where idfaccom > $this->idfaccom" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idfaccom) from " . $this->Ini->nm_tabela . " where idfaccom > $this->idfaccom" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idfaccom) from " . $this->Ini->nm_tabela . " where idfaccom > $this->idfaccom" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idfaccom) from " . $this->Ini->nm_tabela . " where idfaccom > $this->idfaccom" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idfaccom) from " . $this->Ini->nm_tabela . " where idfaccom > $this->idfaccom" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idfaccom) from " . $this->Ini->nm_tabela . " where idfaccom > $this->idfaccom" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idfaccom) from " . $this->Ini->nm_tabela . " where idfaccom > $this->idfaccom" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idfaccom) from " . $this->Ini->nm_tabela . " where idfaccom > $this->idfaccom" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idfaccom) from " . $this->Ini->nm_tabela . " where idfaccom > $this->idfaccom" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idfaccom) from " . $this->Ini->nm_tabela . " where idfaccom > $this->idfaccom" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idfaccom = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idfaccom) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idfaccom) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idfaccom) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idfaccom) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idfaccom) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idfaccom) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idfaccom) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idfaccom) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idfaccom) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idfaccom) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_filter']))
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
     $this->idfaccom = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idfaccom) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idfaccom) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idfaccom) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idfaccom) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idfaccom) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idfaccom) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idfaccom) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idfaccom) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idfaccom) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idfaccom) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
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
     $this->idfaccom = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['reg_start'] + 1;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function asentada_onChange()
{
$_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'on';
  
$original_subtotal = $this->subtotal;
$original_valoriva = $this->valoriva;
$original_cod_cuenta = $this->cod_cuenta;
$original_asentada = $this->asentada;
$original_idfaccom = $this->idfaccom;
$original_banco = $this->banco;
$original_formapago = $this->formapago;
$original_total = $this->total;
$original_idprov = $this->idprov;
$original_retencion = $this->retencion;
$original_reteica = $this->reteica;
$original_reteiva = $this->reteiva;
$original_fechacom = $this->fechacom;
$original_numfacom = $this->numfacom;
$original_usuario = $this->usuario;
$original_pagada = $this->pagada;
$original_saldo = $this->saldo;

$vGneCE='NO';
$vFpago='CRÉDITO';
$vAsent='NO';
$vNuPago=0;
$vIdPago=0;
$vIddet=0;
$vIdCaja=0;
$vBRet=$this->subtotal ;
$vElIva=$this->valoriva ;
$vTasaRet=0;
$vTasaIca=0;
$vTasaRiva=0;
$vRet=0;
$vReIca=0;
$vReIVA=0;
$vCanc=0;
$vTot=0;
$sal=0;

$vcd = $this->cod_cuenta ;
 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select concat(prefijo,'/',numero) as num,str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20) from terceros_cuentas where cod_cuenta='".$vcd."' and ie='EGRESO' and tipo='CE'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select concat(prefijo,'/',numero) as num,convert(char(19),fecha,121) from terceros_cuentas where cod_cuenta='".$vcd."' and ie='EGRESO' and tipo='CE'"; 
      }
      else
      { 
          $nm_select = "select concat(prefijo,'/',numero) as num,fecha from terceros_cuentas where cod_cuenta='".$vcd."' and ie='EGRESO' and tipo='CE'"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiDoc = array();
      $this->vsidoc = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vSiDoc[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vsidoc[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiDoc = false;
          $this->vSiDoc_erro = $this->Db->ErrorMsg();
          $this->vsidoc = false;
          $this->vsidoc_erro = $this->Db->ErrorMsg();
      } 
;

if(isset($this->vsidoc[0][0]))
{
	$this->asentada  = 1;
	$vdoc = $this->vsidoc[0][0];
	$vfec = $this->vsidoc[0][1];
	$vmensaje = "No se puede desasentar la compra porque tiene un documento de pago en tesoreria: ".$vdoc.", fecha: ".$vfec;
	$this->sc_ajax_message($vmensaje, "Mensaje", "", "");
}
else
{
	if($this->idfaccom >0)
		{
		 
      $nm_select = "select pago_automatico from configuraciones where idconfiguraciones=1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_conf = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds_conf[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_conf = false;
          $this->ds_conf_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->ds_conf[0][0]))
			{
			if($this->ds_conf[0][0]=='SI')
				{
				$this->banco =1;
				$vGneCE='SI';
				$vFpago=$this->formapago ;
				$vAsent=$this->fSiAsentada();
				}
			}

		}

	$vTot=$this->total ;
	if($vTot>0)
		{
		if ($this->asentada ==1)
			{
			$this->sc_ajax_javascript('nm_field_disabled', array("anulada=disabled;observaciones=disabled;banco=disabled", ""));
;
			$this->Ini->nm_hidden_blocos[4] = "off"; $this->NM_ajax_info['blockDisplay']['4'] = 'off';

			$idt=$this->idprov ; 
			 
      $nm_select = "select coalesce(saldoapagar,'0') from terceros where idtercero=$idt"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_te = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds_te[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_te = false;
          $this->ds_te_erro = $this->Db->ErrorMsg();
      } 
;
			if(isset($this->ds_te[0][0]))
				{
				$sal=$this->ds_te[0][0]; 
				}


			if($vGneCE=='SI' and $vFpago=='CONTADO' and $vAsent=='NO')
				{
				$vTasaRet=round(($this->retencion /100), 3);
				$vTasaIca=$this->reteica ;
				$vTasaRiva=round(($this->reteiva /100), 3);
				$vRet=round(($vBRet*$vTasaRet), 0);
				$vReIca=round((($vBRet*$vTasaIca)/1000), 0);
				$vReIVA=round(($vElIva*$vTasaRiva), 0);
				$vCanc=$this->total -($vRet+$vReIca+$vReIVA);

				 
      $nm_select = "SELECT numpago FROM pagos ORDER BY idpago DESC LIMIT 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_pag = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds_pag[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_pag = false;
          $this->ds_pag_erro = $this->Db->ErrorMsg();
      } 
;

				if(isset($this->ds_pag[0][0]))
					{
					$vNuPago=$this->ds_pag[0][0]+1;
					}
				else
					{
					$vNuPago=1;
					}

				$sql_CE="insert pagos set numpago=$vNuPago, client=$this->idprov , fecpago='$this->fechacom', montocan=$vCanc, ret=$vRet, descuent=0, docapagar='$this->numfacom', iddocapagar=$this->idfaccom , saldodocumento=$this->total , conc='COMPRA CONTADO', asent='SI', porc_ret=$this->retencion , val_ica=$vReIca, porc_ica=$this->reteica , porc_reteiva=$this->reteiva , val_reteiva=$vReIVA, banco='1', usuario=$this->usuario , id_concepto=0";

				

				
     $nm_select = $sql_CE; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                fac_compras_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

				 
      $nm_select = "SELECT idpago FROM pagos ORDER BY idpago DESC LIMIT 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_pago = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds_pago[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_pago = false;
          $this->ds_pago_erro = $this->Db->ErrorMsg();
      } 
;
				if(isset($this->ds_pago[0][0]))
					{
					$vIdPago=$this->ds_pago[0][0];
					}
				else
					{
					$vIdPago=1;
					}

				$sql_dCE="insert detallepagos set idfact=0, idrc=0, idfp=1, monto=$vCanc, id_pago=$vIdPago";
				
     $nm_select = $sql_dCE; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                fac_compras_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;


				$sql_caja="insert caja set fecha='$this->fechacom', detalle='COMPROBANTE EGRESO', nota='COMPRA CONTADO', cantidad=-$vCanc, documento='$this->numfacom', cierredia='NO', idrp=$vIdPago, idpedido=0, banco=$this->banco , usuario=$this->usuario ";
				
     $nm_select = $sql_caja; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                fac_compras_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

				
     $nm_select ="update facturacom set pagada='SI', asentada='1', saldo='0' where idfaccom='".$this->idfaccom ."'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                fac_compras_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
				
     $nm_select ="update facturacom set pagada='SI', asentada='1', saldo='0' where idfaccom='".$this->idfaccom ."'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                fac_compras_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
				$this->pagada ='SI';
				$this->asentada =1;
				$this->saldo =0;
				}
			else
				{
				 $idt=$this->idprov ;
				if($vGneCE=='SI' and $vFpago=='CONTADO' and $vAsent=='SI')
					{
					goto saltar;
					}
				else
					{
					
     $nm_select ="UPDATE terceros set saldoapagar=($vTot+$sal) where idtercero=$idt"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                fac_compras_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
					}
				saltar:;
				
     $nm_select ="update facturacom set asentada='1' where idfaccom=$this->idfaccom "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                fac_compras_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

				}

			}
		else
			{
			$this->sc_ajax_javascript('nm_field_disabled', array("anulada=;observaciones=;banco=", ""));
;
			$this->Ini->nm_hidden_blocos[4] = "on"; $this->NM_ajax_info['blockDisplay']['4'] = 'on';

			$idt=$this->idprov ;
			if(($vGneCE=='NO' or $vFpago=='CRÉDITO') and $vAsent=='NO')
				{
				 
      $nm_select = "select saldoapagar from terceros where idtercero=$idt"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_ter = array();
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
;
				if(isset($this->ds_ter[0][0]))
					{
					$sal=$this->ds_ter[0][0];
					
     $nm_select ="UPDATE terceros set saldoapagar=($sal-$vTot) where idtercero=$idt"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                fac_compras_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
					}
				}
			
     $nm_select ="update facturacom set asentada=0,pagada='NO' where idfaccom=$this->idfaccom "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                fac_compras_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

			}
		}

	else
		{
		$this->nm_mens_alert[] = "No tiene compra registrada, NO puede Asentar"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("No tiene compra registrada, NO puede Asentar"); }$this->asentada =0;
		}
}

$modificado_subtotal = $this->subtotal;
$modificado_valoriva = $this->valoriva;
$modificado_cod_cuenta = $this->cod_cuenta;
$modificado_asentada = $this->asentada;
$modificado_idfaccom = $this->idfaccom;
$modificado_banco = $this->banco;
$modificado_formapago = $this->formapago;
$modificado_total = $this->total;
$modificado_idprov = $this->idprov;
$modificado_retencion = $this->retencion;
$modificado_reteica = $this->reteica;
$modificado_reteiva = $this->reteiva;
$modificado_fechacom = $this->fechacom;
$modificado_numfacom = $this->numfacom;
$modificado_usuario = $this->usuario;
$modificado_pagada = $this->pagada;
$modificado_saldo = $this->saldo;
$this->nm_formatar_campos('subtotal', 'valoriva', 'cod_cuenta', 'asentada', 'idfaccom', 'banco', 'formapago', 'total', 'idprov', 'retencion', 'reteica', 'reteiva', 'fechacom', 'numfacom', 'usuario', 'pagada', 'saldo');
if ($original_subtotal !== $modificado_subtotal || isset($this->nmgp_cmp_readonly['subtotal']) || (isset($bFlagRead_subtotal) && $bFlagRead_subtotal))
{
    $this->ajax_return_values_subtotal(true);
}
if ($original_valoriva !== $modificado_valoriva || isset($this->nmgp_cmp_readonly['valoriva']) || (isset($bFlagRead_valoriva) && $bFlagRead_valoriva))
{
    $this->ajax_return_values_valoriva(true);
}
if ($original_cod_cuenta !== $modificado_cod_cuenta || isset($this->nmgp_cmp_readonly['cod_cuenta']) || (isset($bFlagRead_cod_cuenta) && $bFlagRead_cod_cuenta))
{
    $this->ajax_return_values_cod_cuenta(true);
}
if ($original_asentada !== $modificado_asentada || isset($this->nmgp_cmp_readonly['asentada']) || (isset($bFlagRead_asentada) && $bFlagRead_asentada))
{
    $this->ajax_return_values_asentada(true);
}
if ($original_idfaccom !== $modificado_idfaccom || isset($this->nmgp_cmp_readonly['idfaccom']) || (isset($bFlagRead_idfaccom) && $bFlagRead_idfaccom))
{
    $this->ajax_return_values_idfaccom(true);
}
if ($original_banco !== $modificado_banco || isset($this->nmgp_cmp_readonly['banco']) || (isset($bFlagRead_banco) && $bFlagRead_banco))
{
    $this->ajax_return_values_banco(true);
}
if ($original_formapago !== $modificado_formapago || isset($this->nmgp_cmp_readonly['formapago']) || (isset($bFlagRead_formapago) && $bFlagRead_formapago))
{
    $this->ajax_return_values_formapago(true);
}
if ($original_total !== $modificado_total || isset($this->nmgp_cmp_readonly['total']) || (isset($bFlagRead_total) && $bFlagRead_total))
{
    $this->ajax_return_values_total(true);
}
if ($original_idprov !== $modificado_idprov || isset($this->nmgp_cmp_readonly['idprov']) || (isset($bFlagRead_idprov) && $bFlagRead_idprov))
{
    $this->ajax_return_values_idprov(true);
}
if ($original_retencion !== $modificado_retencion || isset($this->nmgp_cmp_readonly['retencion']) || (isset($bFlagRead_retencion) && $bFlagRead_retencion))
{
    $this->ajax_return_values_retencion(true);
}
if ($original_reteica !== $modificado_reteica || isset($this->nmgp_cmp_readonly['reteica']) || (isset($bFlagRead_reteica) && $bFlagRead_reteica))
{
    $this->ajax_return_values_reteica(true);
}
if ($original_reteiva !== $modificado_reteiva || isset($this->nmgp_cmp_readonly['reteiva']) || (isset($bFlagRead_reteiva) && $bFlagRead_reteiva))
{
    $this->ajax_return_values_reteiva(true);
}
if ($original_fechacom !== $modificado_fechacom || isset($this->nmgp_cmp_readonly['fechacom']) || (isset($bFlagRead_fechacom) && $bFlagRead_fechacom))
{
    $this->ajax_return_values_fechacom(true);
}
if ($original_numfacom !== $modificado_numfacom || isset($this->nmgp_cmp_readonly['numfacom']) || (isset($bFlagRead_numfacom) && $bFlagRead_numfacom))
{
    $this->ajax_return_values_numfacom(true);
}
if ($original_usuario !== $modificado_usuario || isset($this->nmgp_cmp_readonly['usuario']) || (isset($bFlagRead_usuario) && $bFlagRead_usuario))
{
    $this->ajax_return_values_usuario(true);
}
if ($original_pagada !== $modificado_pagada || isset($this->nmgp_cmp_readonly['pagada']) || (isset($bFlagRead_pagada) && $bFlagRead_pagada))
{
    $this->ajax_return_values_pagada(true);
}
if ($original_saldo !== $modificado_saldo || isset($this->nmgp_cmp_readonly['saldo']) || (isset($bFlagRead_saldo) && $bFlagRead_saldo))
{
    $this->ajax_return_values_saldo(true);
}
$this->NM_ajax_info['event_field'] = 'asentada';
fac_compras_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'off';
}
function fSiAsentada()
{
$_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'on';
  
 
      $nm_select = "select idpago from pagos where iddocapagar=$this->idfaccom "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dse_pag = array();
     if ($this->idfaccom != "")
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
                      $this->dse_pag[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dse_pag = false;
          $this->dse_pag_erro = $this->Db->ErrorMsg();
      } 
     } 
;
if(isset($this->dse_pag[0][0]))
	{
	$as='SI';
	}
else
	{
	$as='NO';
	}
return $as;
$_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'off';
}
function hdetalle_onClick()
{
$_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_par_idfaccom)) {$this->sc_temp_par_idfaccom = (isset($_SESSION['par_idfaccom'])) ? $_SESSION['par_idfaccom'] : "";}
  
$original_idfaccom = $this->idfaccom;

$this->sc_temp_par_idfaccom=$this->idfaccom ;
 if (isset($this->sc_temp_par_idfaccom)) { $_SESSION['par_idfaccom'] = $this->sc_temp_par_idfaccom;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('detallecompra') . "/", $this->nm_location, $this->sc_temp_par_idfaccom, "_self", "ret_self", 440, 630);
 };



if (isset($this->sc_temp_par_idfaccom)) { $_SESSION['par_idfaccom'] = $this->sc_temp_par_idfaccom;}
$_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'off';
$modificado_idfaccom = $this->idfaccom;
$this->nm_formatar_campos('idfaccom');
if ($original_idfaccom !== $modificado_idfaccom || isset($this->nmgp_cmp_readonly['idfaccom']) || (isset($bFlagRead_idfaccom) && $bFlagRead_idfaccom))
{
    $this->ajax_return_values_idfaccom(true);
}
$this->NM_ajax_info['event_field'] = 'hdetalle';
fac_compras_mob_pack_ajax_response();
exit;
}
function hdetalle_onFocus()
{
$_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_par_idfaccom)) {$this->sc_temp_par_idfaccom = (isset($_SESSION['par_idfaccom'])) ? $_SESSION['par_idfaccom'] : "";}
  
$original_idfaccom = $this->idfaccom;

if($this->idfaccom >0)
	{
	$this->sc_temp_par_idfaccom=$this->idfaccom ;
	 if (isset($this->sc_temp_par_idfaccom)) { $_SESSION['par_idfaccom'] = $this->sc_temp_par_idfaccom;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('detallecompra') . "/", $this->nm_location, $this->sc_temp_par_idfaccom, "_self", "ret_self", 440, 630);
 };
	}




if (isset($this->sc_temp_par_idfaccom)) { $_SESSION['par_idfaccom'] = $this->sc_temp_par_idfaccom;}
$_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'off';
$modificado_idfaccom = $this->idfaccom;
$this->nm_formatar_campos('idfaccom');
if ($original_idfaccom !== $modificado_idfaccom || isset($this->nmgp_cmp_readonly['idfaccom']) || (isset($bFlagRead_idfaccom) && $bFlagRead_idfaccom))
{
    $this->ajax_return_values_idfaccom(true);
}
$this->NM_ajax_info['event_field'] = 'hdetalle';
fac_compras_mob_pack_ajax_response();
exit;
}
function id_pedidocom_onChange()
{
$_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'on';
  
$original_id_pedidocom = $this->id_pedidocom;
$original_idprov = $this->idprov;
$original_prefijo_delpedido = $this->prefijo_delpedido;
$original_observaciones = $this->observaciones;
$original_formapago = $this->formapago;
$original_subtotal = $this->subtotal;
$original_valoriva = $this->valoriva;
$original_total = $this->total;
$original_saldo = $this->saldo;

$par=$this->id_pedidocom ;

if($par>0 or $par!=NULL )
{
 
      $nm_select = "select credito, idcli, subtotal, valoriva, total, saldo, adicional from pedidos where idpedido=$par"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
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
                 $SCrx->fields[5] = str_replace(',', '.', $SCrx->fields[5]);
                 $SCrx->fields[6] = str_replace(',', '.', $SCrx->fields[6]);
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
                 $SCrx->fields[5] = (strpos(strtolower($SCrx->fields[5]), "e")) ? (float)$SCrx->fields[5] : $SCrx->fields[5];
                 $SCrx->fields[5] = (string)$SCrx->fields[5];
                 $SCrx->fields[6] = (strpos(strtolower($SCrx->fields[6]), "e")) ? (float)$SCrx->fields[6] : $SCrx->fields[6];
                 $SCrx->fields[6] = (string)$SCrx->fields[6];
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
$this->idprov =$this->dt[0][1];
$this->trae_prefijo_ped();
$elpe.=$this->prefijo_delpedido ;
$this->observaciones ="INGRESA PEDIDO: ";
$this->observaciones .="$elpe";
$this->sc_set_focus('idcli');

if($this->dt[0][0]==1)
	{
	$this->formapago ='CRÉDITO';
	}
	else
	{
	$this->formapago ='CONTADO';	
	}
$this->subtotal =$this->dt[0][2];	
$this->valoriva =$this->dt[0][3];
$this->total =$this->dt[0][4];
$this->saldo =$this->dt[0][5];
$this->sc_ajax_javascript('nm_field_disabled', array("credito=;fechavenc=", ""));
;

}

$modificado_id_pedidocom = $this->id_pedidocom;
$modificado_idprov = $this->idprov;
$modificado_prefijo_delpedido = $this->prefijo_delpedido;
$modificado_observaciones = $this->observaciones;
$modificado_formapago = $this->formapago;
$modificado_subtotal = $this->subtotal;
$modificado_valoriva = $this->valoriva;
$modificado_total = $this->total;
$modificado_saldo = $this->saldo;
$this->nm_formatar_campos('id_pedidocom', 'idprov', 'prefijo_delpedido', 'observaciones', 'formapago', 'subtotal', 'valoriva', 'total', 'saldo');
if ($original_id_pedidocom !== $modificado_id_pedidocom || isset($this->nmgp_cmp_readonly['id_pedidocom']) || (isset($bFlagRead_id_pedidocom) && $bFlagRead_id_pedidocom))
{
    $this->ajax_return_values_id_pedidocom(true);
}
if ($original_idprov !== $modificado_idprov || isset($this->nmgp_cmp_readonly['idprov']) || (isset($bFlagRead_idprov) && $bFlagRead_idprov))
{
    $this->ajax_return_values_idprov(true);
}
if ($original_prefijo_delpedido !== $modificado_prefijo_delpedido || isset($this->nmgp_cmp_readonly['prefijo_delpedido']) || (isset($bFlagRead_prefijo_delpedido) && $bFlagRead_prefijo_delpedido))
{
    $this->ajax_return_values_prefijo_delpedido(true);
}
if ($original_observaciones !== $modificado_observaciones || isset($this->nmgp_cmp_readonly['observaciones']) || (isset($bFlagRead_observaciones) && $bFlagRead_observaciones))
{
    $this->ajax_return_values_observaciones(true);
}
if ($original_formapago !== $modificado_formapago || isset($this->nmgp_cmp_readonly['formapago']) || (isset($bFlagRead_formapago) && $bFlagRead_formapago))
{
    $this->ajax_return_values_formapago(true);
}
if ($original_subtotal !== $modificado_subtotal || isset($this->nmgp_cmp_readonly['subtotal']) || (isset($bFlagRead_subtotal) && $bFlagRead_subtotal))
{
    $this->ajax_return_values_subtotal(true);
}
if ($original_valoriva !== $modificado_valoriva || isset($this->nmgp_cmp_readonly['valoriva']) || (isset($bFlagRead_valoriva) && $bFlagRead_valoriva))
{
    $this->ajax_return_values_valoriva(true);
}
if ($original_total !== $modificado_total || isset($this->nmgp_cmp_readonly['total']) || (isset($bFlagRead_total) && $bFlagRead_total))
{
    $this->ajax_return_values_total(true);
}
if ($original_saldo !== $modificado_saldo || isset($this->nmgp_cmp_readonly['saldo']) || (isset($bFlagRead_saldo) && $bFlagRead_saldo))
{
    $this->ajax_return_values_saldo(true);
}
$this->NM_ajax_info['event_field'] = 'id';
fac_compras_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'off';
}
function idprov_onChange()
{
$_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'on';
  
$original_idprov = $this->idprov;
$original_fechacom = $this->fechacom;
$original_fechavenc = $this->fechavenc;
$original_formapago = $this->formapago;


		
$sql="select creditoprov, dias from terceros where idtercero=$this->idprov ";
 
      $nm_select = $sql; 
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
if(isset($this->ds [0][0]))
	{
	$diascre=$this->ds [0][1];
	$fechven= 
         $this->nm_data->CalculaData($this->fechacom ,"yyyy/mm/dd","+",$diascre,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
	$this->fechavenc =date("Y-m-d", strtotime($fechven));
	if ($this->ds [0][0]=='SI')
	{
	$this->formapago ='CRÉDITO';
	}
	else
		{
		$this->formapago ='CONTADO';
		}
	$this->sc_set_focus('formapago');
	}
else
	{
	$fechven= 
         $this->nm_data->CalculaData($this->fechacom ,"yyyy/mm/dd","+",0,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
	$this->fechavenc =date("Y-m-d", strtotime($fechven));
	$this->formapago ='CONTADO';
	$this->sc_set_focus('formapago');
	}


$modificado_idprov = $this->idprov;
$modificado_fechacom = $this->fechacom;
$modificado_fechavenc = $this->fechavenc;
$modificado_formapago = $this->formapago;
$this->nm_formatar_campos('idprov', 'fechacom', 'fechavenc', 'formapago');
if ($original_idprov !== $modificado_idprov || isset($this->nmgp_cmp_readonly['idprov']) || (isset($bFlagRead_idprov) && $bFlagRead_idprov))
{
    $this->ajax_return_values_idprov(true);
}
if ($original_fechacom !== $modificado_fechacom || isset($this->nmgp_cmp_readonly['fechacom']) || (isset($bFlagRead_fechacom) && $bFlagRead_fechacom))
{
    $this->ajax_return_values_fechacom(true);
}
if ($original_fechavenc !== $modificado_fechavenc || isset($this->nmgp_cmp_readonly['fechavenc']) || (isset($bFlagRead_fechavenc) && $bFlagRead_fechavenc))
{
    $this->ajax_return_values_fechavenc(true);
}
if ($original_formapago !== $modificado_formapago || isset($this->nmgp_cmp_readonly['formapago']) || (isset($bFlagRead_formapago) && $bFlagRead_formapago))
{
    $this->ajax_return_values_formapago(true);
}
$this->NM_ajax_info['event_field'] = 'idprov';
fac_compras_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'off';
}
function trae_prefijo_ped()
{
$_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_elpedi)) {$this->sc_temp_elpedi = (isset($_SESSION['elpedi'])) ? $_SESSION['elpedi'] : "";}
  
 
      $nm_select = "select prefijo_ped, numpedido from pedidos where idpedido=$this->id_pedidocom "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dse = array();
     if ($this->id_pedidocom != "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dse[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dse = false;
          $this->dse_erro = $this->Db->ErrorMsg();
      } 
     } 
;
if(isset($this->dse[0][0]))
	{
	$this->sc_temp_elpedi=$this->id_pedidocom ;
	$vari=$this->dse[0][0];
	 
      $nm_select = "select prefijo from resdian where Idres=$vari"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->da = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->da = false;
          $this->da_erro = $this->Db->ErrorMsg();
      } 
;
	$pre=substr($this->da , 7);
	$this->prefijo_delpedido =$pre." 00".$this->dse[0][1];
	}
if (isset($this->sc_temp_elpedi)) { $_SESSION['elpedi'] = $this->sc_temp_elpedi;}
$_SESSION['scriptcase']['fac_compras_mob']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              fac_compras_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("fac_compras_mob_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("idfaccom", "numfacom", "fechacom", "fechavenc", "idprov", "subtotal", "valoriva", "total", "pagada", "asentada", "observaciones", "saldo"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['csrf_token'];
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

   function Form_lookup_es_remision()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "NO?#?NO?#?S?@?";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_id_pedidocom()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_id_pedidocom']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_id_pedidocom'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_id_pedidocom']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_id_pedidocom'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_id_pedidocom']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_id_pedidocom'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_id_pedidocom']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_id_pedidocom'] = array(); 
    }

   $old_value_fechacom = $this->fechacom;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_total = $this->total;
   $old_value_saldo = $this->saldo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_reteiva = $this->reteiva;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_control = $this->control;
   $old_value_usuario = $this->usuario;
   $old_value_creado = $this->creado;
   $old_value_creado_hora = $this->creado_hora;
   $old_value_editado = $this->editado;
   $old_value_editado_hora = $this->editado_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechacom = $this->fechacom;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_total = $this->total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_control = $this->control;
   $unformatted_value_usuario = $this->usuario;
   $unformatted_value_creado = $this->creado;
   $unformatted_value_creado_hora = $this->creado_hora;
   $unformatted_value_editado = $this->editado;
   $unformatted_value_editado_hora = $this->editado_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo + \" - \" + pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc like 'PC' ORDER BY prefijo_ped, numpedido";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idpedido, concat(resdian.prefijo, \" - \", pedidos.numpedido)  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc like 'PC' ORDER BY prefijo_ped, numpedido";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo&\" - \"&pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc like 'PC' ORDER BY prefijo_ped, numpedido";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo||\" - \"||pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc like 'PC' ORDER BY prefijo_ped, numpedido";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo + \" - \" + pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc like 'PC' ORDER BY prefijo_ped, numpedido";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo||\" - \"||pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc like 'PC' ORDER BY prefijo_ped, numpedido";
   }
   else
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo||\" - \"||pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc like 'PC' ORDER BY prefijo_ped, numpedido";
   }

   $this->fechacom = $old_value_fechacom;
   $this->fechavenc = $old_value_fechavenc;
   $this->total = $old_value_total;
   $this->saldo = $old_value_saldo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->reteiva = $old_value_reteiva;
   $this->idfaccom = $old_value_idfaccom;
   $this->control = $old_value_control;
   $this->usuario = $old_value_usuario;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_id_pedidocom'][] = $rs->fields[0];
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
   function Form_lookup_formapago()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "CONTADO?#?CONTADO?#?N?@?";
       $nmgp_def_dados .= "CRÉDITO?#?CRÉDITO?#?N?@?";
       $nmgp_def_dados .= "DEPOSITO?#?DEPÓSITO?#?N?@?";
       $nmgp_def_dados .= "OTRO?#?OTRO?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_anulada()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#??#?S?@?";
       $nmgp_def_dados .= "DEVUELTA?#?DEVUELTA?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_asentada()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "NO?#?0?#?S?@?";
       $nmgp_def_dados .= "SI?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_retencion()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_retencion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_retencion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_retencion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_retencion'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_retencion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_retencion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_retencion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_retencion'] = array(); 
    }

   $old_value_fechacom = $this->fechacom;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_total = $this->total;
   $old_value_saldo = $this->saldo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_reteiva = $this->reteiva;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_control = $this->control;
   $old_value_usuario = $this->usuario;
   $old_value_creado = $this->creado;
   $old_value_creado_hora = $this->creado_hora;
   $old_value_editado = $this->editado;
   $old_value_editado_hora = $this->editado_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechacom = $this->fechacom;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_total = $this->total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_control = $this->control;
   $unformatted_value_usuario = $this->usuario;
   $unformatted_value_creado = $this->creado;
   $unformatted_value_creado_hora = $this->creado_hora;
   $unformatted_value_editado = $this->editado;
   $unformatted_value_editado_hora = $this->editado_hora;

   $nm_comando = "SELECT porrete  FROM tiporetefuente  ORDER BY  id_tiporetefuente desc";

   $this->fechacom = $old_value_fechacom;
   $this->fechavenc = $old_value_fechavenc;
   $this->total = $old_value_total;
   $this->saldo = $old_value_saldo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->reteiva = $old_value_reteiva;
   $this->idfaccom = $old_value_idfaccom;
   $this->control = $old_value_control;
   $this->usuario = $old_value_usuario;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_retencion'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
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
   function Form_lookup_reteica()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_reteica']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_reteica'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_reteica']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_reteica'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_reteica']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_reteica'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_reteica']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_reteica'] = array(); 
    }

   $old_value_fechacom = $this->fechacom;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_total = $this->total;
   $old_value_saldo = $this->saldo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_reteiva = $this->reteiva;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_control = $this->control;
   $old_value_usuario = $this->usuario;
   $old_value_creado = $this->creado;
   $old_value_creado_hora = $this->creado_hora;
   $old_value_editado = $this->editado;
   $old_value_editado_hora = $this->editado_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechacom = $this->fechacom;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_total = $this->total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_control = $this->control;
   $unformatted_value_usuario = $this->usuario;
   $unformatted_value_creado = $this->creado;
   $unformatted_value_creado_hora = $this->creado_hora;
   $unformatted_value_editado = $this->editado;
   $unformatted_value_editado_hora = $this->editado_hora;

   $nm_comando = "SELECT  porcica  FROM tipoica  ORDER BY id_ica DESC";

   $this->fechacom = $old_value_fechacom;
   $this->fechavenc = $old_value_fechavenc;
   $this->total = $old_value_total;
   $this->saldo = $old_value_saldo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->reteiva = $old_value_reteiva;
   $this->idfaccom = $old_value_idfaccom;
   $this->control = $old_value_control;
   $this->usuario = $old_value_usuario;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_reteica'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
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
   function Form_lookup_banco()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_banco']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_banco'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_banco']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_banco'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_banco']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_banco'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_banco']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_banco'] = array(); 
    }

   $old_value_fechacom = $this->fechacom;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_total = $this->total;
   $old_value_saldo = $this->saldo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_reteiva = $this->reteiva;
   $old_value_idfaccom = $this->idfaccom;
   $old_value_control = $this->control;
   $old_value_usuario = $this->usuario;
   $old_value_creado = $this->creado;
   $old_value_creado_hora = $this->creado_hora;
   $old_value_editado = $this->editado;
   $old_value_editado_hora = $this->editado_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_fechacom = $this->fechacom;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_total = $this->total;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_idfaccom = $this->idfaccom;
   $unformatted_value_control = $this->control;
   $unformatted_value_usuario = $this->usuario;
   $unformatted_value_creado = $this->creado;
   $unformatted_value_creado_hora = $this->creado_hora;
   $unformatted_value_editado = $this->editado;
   $unformatted_value_editado_hora = $this->editado_hora;

   $nm_comando = "SELECT idcaja_vta, codigo_banco  FROM bancos  ORDER BY codigo_banco";

   $this->fechacom = $old_value_fechacom;
   $this->fechavenc = $old_value_fechavenc;
   $this->total = $old_value_total;
   $this->saldo = $old_value_saldo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->reteiva = $old_value_reteiva;
   $this->idfaccom = $old_value_idfaccom;
   $this->control = $old_value_control;
   $this->usuario = $old_value_usuario;
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['Lookup_banco'][] = $rs->fields[0];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              fac_compras_mob_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "idfaccom", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "numfacom", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fechacom", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fechavenc", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_idprov($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "idprov", $arg_search, $data_lookup);
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
              $data_lookup = $this->SC_lookup_asentada($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "asentada", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "observaciones", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "saldo", $arg_search, str_replace(",", ".", $data_search));
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_fac_compras_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['total'] = $qt_geral_reg_fac_compras_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          fac_compras_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          fac_compras_mob_pack_ajax_response();
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
      $nm_numeric[] = "idfaccom";$nm_numeric[] = "idprov";$nm_numeric[] = "subtotal";$nm_numeric[] = "valoriva";$nm_numeric[] = "total";$nm_numeric[] = "asentada";$nm_numeric[] = "control";$nm_numeric[] = "saldo";$nm_numeric[] = "id_pedidocom";$nm_numeric[] = "retencion";$nm_numeric[] = "reteica";$nm_numeric[] = "reteiva";$nm_numeric[] = "usuario";$nm_numeric[] = "banco";$nm_numeric[] = "num_ndevolucion";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['decimal_db'] == ".")
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
      $Nm_datas['fechacom'] = "date";$Nm_datas['fechavenc'] = "date";$Nm_datas['creado'] = "datetime";$Nm_datas['editado'] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['SC_sep_date1'];
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
   function SC_lookup_idprov($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT documento + \" - \" + nombres, idtercero FROM terceros WHERE (documento + \" - \" + nombres LIKE '%$campo%') AND (proveedor='SI')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(documento,\" - \",nombres), idtercero FROM terceros WHERE (concat(documento,\" - \",nombres) LIKE '%$campo%') AND (proveedor='SI')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT documento&\" - \"&nombres, idtercero FROM terceros WHERE (documento&\" - \"&nombres LIKE '%$campo%') AND (proveedor='SI')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT documento||\" - \"||nombres, idtercero FROM terceros WHERE (documento||\" - \"||nombres LIKE '%$campo%') AND (proveedor='SI')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT documento + \" - \" + nombres, idtercero FROM terceros WHERE (documento + \" - \" + nombres LIKE '%$campo%') AND (proveedor='SI')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT documento||\" - \"||nombres, idtercero FROM terceros WHERE (documento||\" - \"||nombres LIKE '%$campo%') AND (proveedor='SI')" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT documento||\" - \"||nombres, idtercero FROM terceros WHERE (documento||\" - \"||nombres LIKE '%$campo%') AND (proveedor='SI')" ; 
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
   function SC_lookup_asentada($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['0'] = "NO";
       $data_look['1'] = "SI";
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
       $nmgp_saida_form = "fac_compras_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "fac_compras_mob_fim.php";
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
       fac_compras_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['masterValue']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['opc_ant'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['fac_compras_mob']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           fac_compras_mob_pack_ajax_response();
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
       fac_compras_mob_pack_ajax_response();
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
                        'es_remision' => 'es_remision',
                        'id_pedidocom' => 'id_pedidocom',
                        'numfacom' => 'numfacom',
                        'fechacom' => 'fechacom',
                        'idprov' => 'idprov',
                        'formapago' => 'formapago',
                        'fechavenc' => 'fechavenc',
                        'total' => 'total',
                        'saldo' => 'saldo',
                        'pagada' => 'pagada',
                        'anulada' => 'anulada',
                        'asentada' => 'asentada',
                        'subtotal' => 'subtotal',
                        'valoriva' => 'valoriva',
                        'retencion' => 'retencion',
                        'reteica' => 'reteica',
                        'reteiva' => 'reteiva',
                        'banco' => 'banco',
                        'idfaccom' => 'idfaccom',
                        'detalle' => 'detalle',
                        'hdetalle' => 'hdetalle',
                        'prefijo_delpedido' => 'prefijo_delpedido',
                        'observaciones' => 'observaciones',
                        'control' => 'control',
                        'usuario' => 'usuario',
                        'cod_cuenta' => 'cod_cuenta',
                        'creado' => 'creado',
                        'editado' => 'editado',
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
            case "eliminar":
                return array("sc_Eliminar_top");
                break;
            case "sc_btn_0":
                return array("sc_sc_btn_0_top");
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
