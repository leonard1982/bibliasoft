<?php
//
class form_notas_apl
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
   var $asentada_1;
   var $observaciones;
   var $saldo;
   var $adicional;
   var $formapago;
   var $adicional2;
   var $adicional3;
   var $obspago;
   var $vendedor;
   var $pedido;
   var $pedido_1;
   var $resolucion;
   var $resolucion_1;
   var $dircliente;
   var $imconsumo;
   var $retefuente;
   var $retefuente_1;
   var $reteiva;
   var $reteica;
   var $reteica_1;
   var $cree;
   var $cree_1;
   var $espos;
   var $cufe;
   var $enlacepdf;
   var $estado;
   var $avisos;
   var $creado;
   var $creado_hora;
   var $editado;
   var $editado_hora;
   var $usuario_crea;
   var $dias_decredito;
   var $banco;
   var $tipo;
   var $tipo_1;
   var $id_fact;
   var $enviada_a_tns;
   var $fecha_a_tns;
   var $fecha_a_tns_hora;
   var $factura_tns;
   var $creado_en_movil;
   var $disponible_en_movil;
   var $mot_nc;
   var $mot_nc_1;
   var $mot_nd;
   var $mot_nd_1;
   var $cupo;
   var $cupodis;
   var $detalle;
   var $direccion;
   var $direccion_1;
   var $num_fac;
   var $num_fac_1;
   var $pref_pedido;
   var $prefijo_fac;
   var $prefijo_fac_1;
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
          if (isset($this->NM_ajax_info['param']['adicional']))
          {
              $this->adicional = $this->NM_ajax_info['param']['adicional'];
          }
          if (isset($this->NM_ajax_info['param']['asentada']))
          {
              $this->asentada = $this->NM_ajax_info['param']['asentada'];
          }
          if (isset($this->NM_ajax_info['param']['credito']))
          {
              $this->credito = $this->NM_ajax_info['param']['credito'];
          }
          if (isset($this->NM_ajax_info['param']['cree']))
          {
              $this->cree = $this->NM_ajax_info['param']['cree'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['cupo']))
          {
              $this->cupo = $this->NM_ajax_info['param']['cupo'];
          }
          if (isset($this->NM_ajax_info['param']['cupodis']))
          {
              $this->cupodis = $this->NM_ajax_info['param']['cupodis'];
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
          if (isset($this->NM_ajax_info['param']['direccion']))
          {
              $this->direccion = $this->NM_ajax_info['param']['direccion'];
          }
          if (isset($this->NM_ajax_info['param']['fechaven']))
          {
              $this->fechaven = $this->NM_ajax_info['param']['fechaven'];
          }
          if (isset($this->NM_ajax_info['param']['fechavenc']))
          {
              $this->fechavenc = $this->NM_ajax_info['param']['fechavenc'];
          }
          if (isset($this->NM_ajax_info['param']['id_fact']))
          {
              $this->id_fact = $this->NM_ajax_info['param']['id_fact'];
          }
          if (isset($this->NM_ajax_info['param']['idcli']))
          {
              $this->idcli = $this->NM_ajax_info['param']['idcli'];
          }
          if (isset($this->NM_ajax_info['param']['idfacven']))
          {
              $this->idfacven = $this->NM_ajax_info['param']['idfacven'];
          }
          if (isset($this->NM_ajax_info['param']['imconsumo']))
          {
              $this->imconsumo = $this->NM_ajax_info['param']['imconsumo'];
          }
          if (isset($this->NM_ajax_info['param']['mot_nc']))
          {
              $this->mot_nc = $this->NM_ajax_info['param']['mot_nc'];
          }
          if (isset($this->NM_ajax_info['param']['mot_nd']))
          {
              $this->mot_nd = $this->NM_ajax_info['param']['mot_nd'];
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
          if (isset($this->NM_ajax_info['param']['nremision']))
          {
              $this->nremision = $this->NM_ajax_info['param']['nremision'];
          }
          if (isset($this->NM_ajax_info['param']['num_fac']))
          {
              $this->num_fac = $this->NM_ajax_info['param']['num_fac'];
          }
          if (isset($this->NM_ajax_info['param']['numfacven']))
          {
              $this->numfacven = $this->NM_ajax_info['param']['numfacven'];
          }
          if (isset($this->NM_ajax_info['param']['observaciones']))
          {
              $this->observaciones = $this->NM_ajax_info['param']['observaciones'];
          }
          if (isset($this->NM_ajax_info['param']['pagada']))
          {
              $this->pagada = $this->NM_ajax_info['param']['pagada'];
          }
          if (isset($this->NM_ajax_info['param']['pedido']))
          {
              $this->pedido = $this->NM_ajax_info['param']['pedido'];
          }
          if (isset($this->NM_ajax_info['param']['pref_pedido']))
          {
              $this->pref_pedido = $this->NM_ajax_info['param']['pref_pedido'];
          }
          if (isset($this->NM_ajax_info['param']['prefijo_fac']))
          {
              $this->prefijo_fac = $this->NM_ajax_info['param']['prefijo_fac'];
          }
          if (isset($this->NM_ajax_info['param']['resolucion']))
          {
              $this->resolucion = $this->NM_ajax_info['param']['resolucion'];
          }
          if (isset($this->NM_ajax_info['param']['retefuente']))
          {
              $this->retefuente = $this->NM_ajax_info['param']['retefuente'];
          }
          if (isset($this->NM_ajax_info['param']['reteica']))
          {
              $this->reteica = $this->NM_ajax_info['param']['reteica'];
          }
          if (isset($this->NM_ajax_info['param']['reteiva']))
          {
              $this->reteiva = $this->NM_ajax_info['param']['reteiva'];
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
      if (isset($this->gCupoilimitado) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gCupoilimitado'] = $this->gCupoilimitado;
      }
      if (isset($this->gidtercero) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gidtercero'] = $this->gidtercero;
      }
      if (isset($this->vGIdFacAfec) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['vGIdFacAfec'] = $this->vGIdFacAfec;
      }
      if (isset($this->par_numfacventa) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_numfacventa'] = $this->par_numfacventa;
      }
      if (isset($this->elped) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['elped'] = $this->elped;
      }
      if (isset($this->gCliente) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gCliente'] = $this->gCliente;
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_notas']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_notas']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_notas']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_notas']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_notas']['embutida_parms']);
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
                 nm_limpa_str_form_notas($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (!isset($this->gCupoilimitado) && isset($this->gcupoilimitado)) 
          {
              $this->gCupoilimitado = $this->gcupoilimitado;
          }
          if (isset($this->gCupoilimitado)) 
          {
              $_SESSION['gCupoilimitado'] = $this->gCupoilimitado;
          }
          if (isset($this->gidtercero)) 
          {
              $_SESSION['gidtercero'] = $this->gidtercero;
          }
          if (!isset($this->vGIdFacAfec) && isset($this->vgidfacafec)) 
          {
              $this->vGIdFacAfec = $this->vgidfacafec;
          }
          if (isset($this->vGIdFacAfec)) 
          {
              $_SESSION['vGIdFacAfec'] = $this->vGIdFacAfec;
          }
          if (isset($this->par_numfacventa)) 
          {
              $_SESSION['par_numfacventa'] = $this->par_numfacventa;
          }
          if (isset($this->elped)) 
          {
              $_SESSION['elped'] = $this->elped;
          }
          if (!isset($this->gCliente) && isset($this->gcliente)) 
          {
              $this->gCliente = $this->gcliente;
          }
          if (isset($this->gCliente)) 
          {
              $_SESSION['gCliente'] = $this->gCliente;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_notas']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_notas']['total']);
          }
          if (!isset($_SESSION['sc_session'][$script_case_init]['form_notas']['total']))
          {
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_notas']['form_detalle_notasDC_script_case_init'] ]['form_detalle_notasDC']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_notas']['form_detalle_notasDC_script_case_init'] ]['form_detalle_notasDC']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_notas']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_notas']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (!isset($this->gCupoilimitado) && isset($this->gcupoilimitado)) 
          {
              $this->gCupoilimitado = $this->gcupoilimitado;
          }
          if (isset($this->gCupoilimitado)) 
          {
              $_SESSION['gCupoilimitado'] = $this->gCupoilimitado;
          }
          if (isset($this->gidtercero)) 
          {
              $_SESSION['gidtercero'] = $this->gidtercero;
          }
          if (!isset($this->vGIdFacAfec) && isset($this->vgidfacafec)) 
          {
              $this->vGIdFacAfec = $this->vgidfacafec;
          }
          if (isset($this->vGIdFacAfec)) 
          {
              $_SESSION['vGIdFacAfec'] = $this->vGIdFacAfec;
          }
          if (isset($this->par_numfacventa)) 
          {
              $_SESSION['par_numfacventa'] = $this->par_numfacventa;
          }
          if (isset($this->elped)) 
          {
              $_SESSION['elped'] = $this->elped;
          }
          if (!isset($this->gCliente) && isset($this->gcliente)) 
          {
              $this->gCliente = $this->gcliente;
          }
          if (isset($this->gCliente)) 
          {
              $_SESSION['gCliente'] = $this->gCliente;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_notas']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_notas']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_notas']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_notas']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_notas']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_notas']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_notas']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_notas']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_notas']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_notas']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_notas_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_notas']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_notas']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_notas'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_notas']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_notas']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_notas') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_notas']['label'] = "Editar Nota";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_notas")
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


      $this->arr_buttons['imprimir']['hint']             = "Imprimir factura...";
      $this->arr_buttons['imprimir']['type']             = "image";
      $this->arr_buttons['imprimir']['value']            = "Imprimir";
      $this->arr_buttons['imprimir']['display']          = "only_img";
      $this->arr_buttons['imprimir']['display_position'] = "text_right";
      $this->arr_buttons['imprimir']['style']            = "";
      $this->arr_buttons['imprimir']['image']            = "usr__NM__bg__NM__apps_printer_15747.png";

      $this->arr_buttons['eliminar']['hint']             = "";
      $this->arr_buttons['eliminar']['type']             = "button";
      $this->arr_buttons['eliminar']['value']            = "Eliminar";
      $this->arr_buttons['eliminar']['display']          = "only_text";
      $this->arr_buttons['eliminar']['display_position'] = "text_right";
      $this->arr_buttons['eliminar']['style']            = "default";
      $this->arr_buttons['eliminar']['image']            = "";

      $this->arr_buttons['rc']['hint']             = "Recibo de caja";
      $this->arr_buttons['rc']['type']             = "button";
      $this->arr_buttons['rc']['value']            = "Recibo C";
      $this->arr_buttons['rc']['display']          = "only_text";
      $this->arr_buttons['rc']['display_position'] = "text_right";
      $this->arr_buttons['rc']['style']            = "default";
      $this->arr_buttons['rc']['image']            = "";

      $this->arr_buttons['autorizar']['hint']             = "";
      $this->arr_buttons['autorizar']['type']             = "button";
      $this->arr_buttons['autorizar']['value']            = "Autorizar";
      $this->arr_buttons['autorizar']['display']          = "only_text";
      $this->arr_buttons['autorizar']['display_position'] = "text_right";
      $this->arr_buttons['autorizar']['style']            = "default";
      $this->arr_buttons['autorizar']['image']            = "";

      $this->arr_buttons['btn_asentar']['hint']             = "Asentar Documento";
      $this->arr_buttons['btn_asentar']['type']             = "button";
      $this->arr_buttons['btn_asentar']['value']            = "Asentar";
      $this->arr_buttons['btn_asentar']['display']          = "text_fontawesomeicon";
      $this->arr_buttons['btn_asentar']['display_position'] = "text_right";
      $this->arr_buttons['btn_asentar']['style']            = "google";
      $this->arr_buttons['btn_asentar']['image']            = "";
      $this->arr_buttons['btn_asentar']['has_fa']            = "true";
      $this->arr_buttons['btn_asentar']['fontawesomeicon']            = "";

      $this->arr_buttons['btn_reversar']['hint']             = "Reversar Documento";
      $this->arr_buttons['btn_reversar']['type']             = "button";
      $this->arr_buttons['btn_reversar']['value']            = "Reversar";
      $this->arr_buttons['btn_reversar']['display']          = "text_fontawesomeicon";
      $this->arr_buttons['btn_reversar']['display_position'] = "text_right";
      $this->arr_buttons['btn_reversar']['style']            = "youtube";
      $this->arr_buttons['btn_reversar']['image']            = "";
      $this->arr_buttons['btn_reversar']['has_fa']            = "true";
      $this->arr_buttons['btn_reversar']['fontawesomeicon']            = "";


      $_SESSION['scriptcase']['error_icon']['form_notas']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_notas'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_notas']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_notas']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_notas']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_notas']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_notas']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_notas']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['goto']      = 'on';
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
      $this->nmgp_botoes['imprimir'] = "on";
      $this->nmgp_botoes['Eliminar'] = "on";
      $this->nmgp_botoes['rc'] = "on";
      $this->nmgp_botoes['autorizar'] = "on";
      $this->nmgp_botoes['btn_asentar'] = "on";
      $this->nmgp_botoes['btn_reversar'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_notas']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_notas']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_notas']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_notas']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_notas'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_notas'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_notas']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_notas']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_notas']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_notas']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_notas']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_notas']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_notas']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_notas']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_notas']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_notas']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_notas']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_notas']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_notas']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_notas']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_notas']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_notas']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_notas']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_notas']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_notas']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form'];
          if (!isset($this->formapago)){$this->formapago = $this->nmgp_dados_form['formapago'];} 
          if (!isset($this->adicional2)){$this->adicional2 = $this->nmgp_dados_form['adicional2'];} 
          if (!isset($this->adicional3)){$this->adicional3 = $this->nmgp_dados_form['adicional3'];} 
          if (!isset($this->obspago)){$this->obspago = $this->nmgp_dados_form['obspago'];} 
          if (!isset($this->espos)){$this->espos = $this->nmgp_dados_form['espos'];} 
          if (!isset($this->cufe)){$this->cufe = $this->nmgp_dados_form['cufe'];} 
          if (!isset($this->enlacepdf)){$this->enlacepdf = $this->nmgp_dados_form['enlacepdf'];} 
          if (!isset($this->estado)){$this->estado = $this->nmgp_dados_form['estado'];} 
          if (!isset($this->avisos)){$this->avisos = $this->nmgp_dados_form['avisos'];} 
          if (!isset($this->creado)){$this->creado = $this->nmgp_dados_form['creado'];} 
          if (!isset($this->editado)){$this->editado = $this->nmgp_dados_form['editado'];} 
          if (!isset($this->usuario_crea)){$this->usuario_crea = $this->nmgp_dados_form['usuario_crea'];} 
          if (!isset($this->banco)){$this->banco = $this->nmgp_dados_form['banco'];} 
          if (!isset($this->enviada_a_tns)){$this->enviada_a_tns = $this->nmgp_dados_form['enviada_a_tns'];} 
          if (!isset($this->fecha_a_tns)){$this->fecha_a_tns = $this->nmgp_dados_form['fecha_a_tns'];} 
          if (!isset($this->factura_tns)){$this->factura_tns = $this->nmgp_dados_form['factura_tns'];} 
          if (!isset($this->creado_en_movil)){$this->creado_en_movil = $this->nmgp_dados_form['creado_en_movil'];} 
          if (!isset($this->disponible_en_movil)){$this->disponible_en_movil = $this->nmgp_dados_form['disponible_en_movil'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_notas", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_notas/form_notas_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_notas_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_notas_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_notas_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_notas/form_notas_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_notas_erro.class.php"); 
      }
      $this->Erro      = new form_notas_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['opcao']))
         { 
             if ($this->idfacven != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_notas']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_notas']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_notas']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['imprimir'] = "off";
          $this->nmgp_botoes['Eliminar'] = "off";
          $this->nmgp_botoes['rc'] = "off";
          $this->nmgp_botoes['autorizar'] = "on";
          $this->nmgp_botoes['btn_asentar'] = "off";
          $this->nmgp_botoes['btn_reversar'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['imprimir'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['botoes']['imprimir'];
          $this->nmgp_botoes['Eliminar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['botoes']['Eliminar'];
          $this->nmgp_botoes['rc'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['botoes']['rc'];
          $this->nmgp_botoes['autorizar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['botoes']['autorizar'];
          $this->nmgp_botoes['btn_asentar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['botoes']['btn_asentar'];
          $this->nmgp_botoes['btn_reversar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['botoes']['btn_reversar'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form'];
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
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['form_detalle_notasDC_script_case_init'] ]['form_detalle_notasDC']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['form_detalle_notasDC_script_case_init'] ]['form_detalle_notasDC']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['form_detalle_notasDC_script_case_init'] ]['form_detalle_notasDC']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['form_detalle_notasDC_script_case_init'] ]['form_detalle_notasDC']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_detalle_notasDC') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_detalle_notasDC') . "/form_detalle_notasDC_apl.php");
          $this->form_detalle_notasDC = new form_detalle_notasDC_apl;
      }
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
      if (!isset($this->NM_ajax_flag) || ('validate_' != substr($this->NM_ajax_opcao, 0, 9) && 'add_new_line' != $this->NM_ajax_opcao && 'autocomp_' != substr($this->NM_ajax_opcao, 0, 9)))
      {
      $_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_numfacven = $this->numfacven;
}
  
if(($this->numfacven ) == NULL)
	{
	$this->sc_ajax_javascript('nm_field_disabled', array("idcli=;fechaven=;fechavenc=;credito=;pagada=", ""));
;
	}
$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "on";;
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_numfacven != $this->numfacven || (isset($bFlagRead_numfacven) && $bFlagRead_numfacven)))
    {
        $this->ajax_return_values_numfacven(true);
    }
}
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off'; 
      }
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['form_notas']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['form_notas']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
      if (isset($this->nremision)) { $this->nm_limpa_alfa($this->nremision); }
      if (isset($this->credito)) { $this->nm_limpa_alfa($this->credito); }
      if (isset($this->idcli)) { $this->nm_limpa_alfa($this->idcli); }
      if (isset($this->subtotal)) { $this->nm_limpa_alfa($this->subtotal); }
      if (isset($this->valoriva)) { $this->nm_limpa_alfa($this->valoriva); }
      if (isset($this->total)) { $this->nm_limpa_alfa($this->total); }
      if (isset($this->pagada)) { $this->nm_limpa_alfa($this->pagada); }
      if (isset($this->asentada)) { $this->nm_limpa_alfa($this->asentada); }
      if (isset($this->observaciones)) { $this->nm_limpa_alfa($this->observaciones); }
      if (isset($this->saldo)) { $this->nm_limpa_alfa($this->saldo); }
      if (isset($this->adicional)) { $this->nm_limpa_alfa($this->adicional); }
      if (isset($this->vendedor)) { $this->nm_limpa_alfa($this->vendedor); }
      if (isset($this->pedido)) { $this->nm_limpa_alfa($this->pedido); }
      if (isset($this->resolucion)) { $this->nm_limpa_alfa($this->resolucion); }
      if (isset($this->dircliente)) { $this->nm_limpa_alfa($this->dircliente); }
      if (isset($this->imconsumo)) { $this->nm_limpa_alfa($this->imconsumo); }
      if (isset($this->retefuente)) { $this->nm_limpa_alfa($this->retefuente); }
      if (isset($this->reteiva)) { $this->nm_limpa_alfa($this->reteiva); }
      if (isset($this->reteica)) { $this->nm_limpa_alfa($this->reteica); }
      if (isset($this->cree)) { $this->nm_limpa_alfa($this->cree); }
      if (isset($this->dias_decredito)) { $this->nm_limpa_alfa($this->dias_decredito); }
      if (isset($this->tipo)) { $this->nm_limpa_alfa($this->tipo); }
      if (isset($this->id_fact)) { $this->nm_limpa_alfa($this->id_fact); }
      if (isset($this->mot_nc)) { $this->nm_limpa_alfa($this->mot_nc); }
      if (isset($this->mot_nd)) { $this->nm_limpa_alfa($this->mot_nd); }
      if (isset($this->detalle)) { $this->nm_limpa_alfa($this->detalle); }
      if ($nm_opc_form_php == "formphp")
      { 
          if ($nm_call_php == "Eliminar")
          { 
              $this->sc_btn_Eliminar();
          } 
          if ($nm_call_php == "autorizar")
          { 
              $this->sc_btn_autorizar();
          } 
          if ($nm_call_php == "btn_asentar")
          { 
              $this->sc_btn_btn_asentar();
          } 
          if ($nm_call_php == "btn_reversar")
          { 
              $this->sc_btn_btn_reversar();
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- numfacven
      $this->field_config['numfacven']               = array();
      $this->field_config['numfacven']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['numfacven']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['numfacven']['symbol_dec'] = '';
      $this->field_config['numfacven']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['numfacven']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
      //-- fechavenc
      $this->field_config['fechavenc']                 = array();
      $this->field_config['fechavenc']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fechavenc']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechavenc']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fechavenc');
      //-- id_fact
      $this->field_config['id_fact']               = array();
      $this->field_config['id_fact']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_fact']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_fact']['symbol_dec'] = '';
      $this->field_config['id_fact']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_fact']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- nremision
      $this->field_config['nremision']               = array();
      $this->field_config['nremision']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['nremision']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['nremision']['symbol_dec'] = '';
      $this->field_config['nremision']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['nremision']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- cupodis
      $this->field_config['cupodis']               = array();
      $this->field_config['cupodis']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['cupodis']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['cupodis']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['cupodis']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['cupodis']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['cupodis']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- cupo
      $this->field_config['cupo']               = array();
      $this->field_config['cupo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['cupo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['cupo']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['cupo']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['cupo']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['cupo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
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
      //-- total
      $this->field_config['total']               = array();
      $this->field_config['total']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['total']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['total']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['total']['symbol_mon'] = '';
      $this->field_config['total']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['total']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- adicional
      $this->field_config['adicional']               = array();
      $this->field_config['adicional']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['adicional']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['adicional']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['adicional']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['adicional']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['adicional']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- saldo
      $this->field_config['saldo']               = array();
      $this->field_config['saldo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['saldo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['saldo']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['saldo']['symbol_mon'] = '';
      $this->field_config['saldo']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['saldo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- idfacven
      $this->field_config['idfacven']               = array();
      $this->field_config['idfacven']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idfacven']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idfacven']['symbol_dec'] = '';
      $this->field_config['idfacven']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idfacven']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- reteiva
      $this->field_config['reteiva']               = array();
      $this->field_config['reteiva']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['reteiva']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['reteiva']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['reteiva']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['reteiva']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- imconsumo
      $this->field_config['imconsumo']               = array();
      $this->field_config['imconsumo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['imconsumo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['imconsumo']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['imconsumo']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['imconsumo']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['imconsumo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
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
      //-- banco
      $this->field_config['banco']               = array();
      $this->field_config['banco']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['banco']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['banco']['symbol_dec'] = '';
      $this->field_config['banco']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['banco']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fecha_a_tns
      $this->field_config['fecha_a_tns']                 = array();
      $this->field_config['fecha_a_tns']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecha_a_tns']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha_a_tns']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecha_a_tns']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecha_a_tns');
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
          if ('validate_tipo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo');
          }
          if ('validate_resolucion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'resolucion');
          }
          if ('validate_numfacven' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'numfacven');
          }
          if ('validate_pedido' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pedido');
          }
          if ('validate_fechaven' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fechaven');
          }
          if ('validate_asentada' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'asentada');
          }
          if ('validate_dias_decredito' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dias_decredito');
          }
          if ('validate_fechavenc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fechavenc');
          }
          if ('validate_pagada' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pagada');
          }
          if ('validate_pref_pedido' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pref_pedido');
          }
          if ('validate_prefijo_fac' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'prefijo_fac');
          }
          if ('validate_num_fac' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_fac');
          }
          if ('validate_id_fact' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_fact');
          }
          if ('validate_idcli' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idcli');
          }
          if ('validate_direccion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'direccion');
          }
          if ('validate_dircliente' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dircliente');
          }
          if ('validate_vendedor' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'vendedor');
          }
          if ('validate_credito' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'credito');
          }
          if ('validate_mot_nc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'mot_nc');
          }
          if ('validate_mot_nd' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'mot_nd');
          }
          if ('validate_observaciones' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'observaciones');
          }
          if ('validate_nremision' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nremision');
          }
          if ('validate_cupodis' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cupodis');
          }
          if ('validate_cupo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cupo');
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
          if ('validate_adicional' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'adicional');
          }
          if ('validate_saldo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'saldo');
          }
          if ('validate_idfacven' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idfacven');
          }
          if ('validate_retefuente' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'retefuente');
          }
          if ('validate_cree' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cree');
          }
          if ('validate_reteica' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'reteica');
          }
          if ('validate_reteiva' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'reteiva');
          }
          if ('validate_imconsumo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'imconsumo');
          }
          if ('validate_detalle' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'detalle');
          }
          form_notas_pack_ajax_response();
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
          if ('event_credito_onchange' == $this->NM_ajax_opcao)
          {
              $this->credito_onChange();
          }
          if ('event_dias_decredito_onchange' == $this->NM_ajax_opcao)
          {
              $this->dias_decredito_onChange();
          }
          if ('event_fechaven_onchange' == $this->NM_ajax_opcao)
          {
              $this->fechaven_onChange();
          }
          if ('event_fechavenc_onchange' == $this->NM_ajax_opcao)
          {
              $this->fechavenc_onChange();
          }
          if ('event_id_fact_onchange' == $this->NM_ajax_opcao)
          {
              $this->id_fact_onChange();
          }
          if ('event_idcli_onchange' == $this->NM_ajax_opcao)
          {
              $this->idcli_onChange();
          }
          if ('event_num_fac_onchange' == $this->NM_ajax_opcao)
          {
              $this->num_fac_onChange();
          }
          if ('event_pedido_onchange' == $this->NM_ajax_opcao)
          {
              $this->pedido_onChange();
          }
          if ('event_prefijo_fac_onchange' == $this->NM_ajax_opcao)
          {
              $this->prefijo_fac_onChange();
          }
          if ('event_resolucion_onchange' == $this->NM_ajax_opcao)
          {
              $this->resolucion_onChange();
          }
          if ('event_tipo_onchange' == $this->NM_ajax_opcao)
          {
              $this->tipo_onChange();
          }
          form_notas_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('autocomp_vendedor' == $this->NM_ajax_opcao)
          {
              if (isset($_GET['term'])) {
                  $this->vendedor = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->vendedor = '';
              }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_vendedor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_vendedor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_vendedor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_vendedor'] = array(); 
    }

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + \"  \" + nombres FROM terceros WHERE documento + \"  \" + nombres LIKE '%" . substr($this->Db->qstr($this->vendedor), 1, -1) . "%' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento, \"  \",nombres) FROM terceros WHERE concat(documento, \"  \",nombres) LIKE '%" . substr($this->Db->qstr($this->vendedor), 1, -1) . "%' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&\"  \"&nombres FROM terceros WHERE documento&\"  \"&nombres LIKE '%" . substr($this->Db->qstr($this->vendedor), 1, -1) . "%' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||\"  \"||nombres FROM terceros WHERE documento||\"  \"||nombres LIKE '%" . substr($this->Db->qstr($this->vendedor), 1, -1) . "%' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + \"  \" + nombres FROM terceros WHERE documento + \"  \" + nombres LIKE '%" . substr($this->Db->qstr($this->vendedor), 1, -1) . "%' ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||\"  \"||nombres FROM terceros WHERE documento||\"  \"||nombres LIKE '%" . substr($this->Db->qstr($this->vendedor), 1, -1) . "%' ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||\"  \"||nombres FROM terceros WHERE documento||\"  \"||nombres LIKE '%" . substr($this->Db->qstr($this->vendedor), 1, -1) . "%' ORDER BY documento, nombres";
   }

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_vendedor'][] = $rs->fields[0];
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
          form_notas_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select']['tipo']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->tipo = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select']['tipo'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select']['resolucion']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->resolucion = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select']['resolucion'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select']['idcli']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->idcli = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select']['idcli'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select']['observaciones']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->observaciones = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select']['observaciones'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select']['numfacven']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->numfacven = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select']['numfacven'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select']['pagada']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->pagada = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select']['pagada'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select']['fechaven']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->fechaven = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select']['fechaven'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select']['fechavenc']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->fechavenc = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select']['fechavenc'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select']['credito']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->credito = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select']['credito'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select']['pedido']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->pedido = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select']['pedido'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select']['asentada']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->asentada = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select']['asentada'];
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
    if ('recarga' == $nm_sc_sv_opcao) {
      $_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_pref_pedido = $this->pref_pedido;
}
  $this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;

if($this->pref_pedido <>"")
	{
	$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;
	}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_pref_pedido != $this->pref_pedido || (isset($bFlagRead_pref_pedido) && $bFlagRead_pref_pedido)))
    {
        $this->ajax_return_values_pref_pedido(true);
    }
}
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off'; 
    }
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_notas_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_notas_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['sc_redir_atualiz'] == "ok")
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
          $_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_asentada = $this->asentada;
    $original_pref_pedido = $this->pref_pedido;
}
  if($this->asentada ==1)
	{   
		$this->Ini->nm_hidden_blocos[5] = "off"; $this->NM_ajax_info['blockDisplay']['5'] = 'off';
		$this->NM_ajax_info['buttonDisplay']['imprimir'] = $this->nmgp_botoes["imprimir"] = "on";;
	}
elseif($this->asentada ==0)
	{
		$this->Ini->nm_hidden_blocos[5] = "on"; $this->NM_ajax_info['blockDisplay']['5'] = 'on';
		$this->NM_ajax_info['buttonDisplay']['imprimir'] = $this->nmgp_botoes["imprimir"] = "off";;
	
	}
		
$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "on";;
if($this->pref_pedido <>"")
	{
	$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;
	}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_asentada != $this->asentada || (isset($bFlagRead_asentada) && $bFlagRead_asentada)))
    {
        $this->ajax_return_values_asentada(true);
    }
    if (($original_pref_pedido != $this->pref_pedido || (isset($bFlagRead_pref_pedido) && $bFlagRead_pref_pedido)))
    {
        $this->ajax_return_values_pref_pedido(true);
    }
}
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off'; 
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_notas_pack_ajax_response();
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
          form_notas_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_notas.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Editar Nota") ?></TITLE>
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
<form name="Fdown" method="get" action="form_notas_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_notas"> 
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
        <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
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
include_once("form_notas_sajax_js.php");
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      else
      {
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->idfacven) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idfacven']))
          {
              $varloc_btn_php['idfacven'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idfacven'];
          }
      }
      $nm_f_saida = "./";
      nm_limpa_numero($this->numfacven, $this->field_config['numfacven']['symbol_grp']) ; 
      nm_limpa_data($this->fechaven, $this->field_config['fechaven']['date_sep']) ; 
      nm_limpa_numero($this->dias_decredito, $this->field_config['dias_decredito']['symbol_grp']) ; 
      nm_limpa_data($this->fechavenc, $this->field_config['fechavenc']['date_sep']) ; 
      nm_limpa_numero($this->id_fact, $this->field_config['id_fact']['symbol_grp']) ; 
      nm_limpa_numero($this->nremision, $this->field_config['nremision']['symbol_grp']) ; 
      if (!empty($this->field_config['cupodis']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cupodis, $this->field_config['cupodis']['symbol_dec'], $this->field_config['cupodis']['symbol_grp'], $this->field_config['cupodis']['symbol_mon']); 
          nm_limpa_valor($this->cupodis, $this->field_config['cupodis']['symbol_dec'], $this->field_config['cupodis']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['cupo']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cupo, $this->field_config['cupo']['symbol_dec'], $this->field_config['cupo']['symbol_grp'], $this->field_config['cupo']['symbol_mon']); 
          nm_limpa_valor($this->cupo, $this->field_config['cupo']['symbol_dec'], $this->field_config['cupo']['symbol_grp']) ; 
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
      if (!empty($this->field_config['total']['symbol_dec']))
      {
          $this->sc_remove_currency($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp'], $this->field_config['total']['symbol_mon']); 
          nm_limpa_valor($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['adicional']['symbol_dec']))
      {
          $this->sc_remove_currency($this->adicional, $this->field_config['adicional']['symbol_dec'], $this->field_config['adicional']['symbol_grp'], $this->field_config['adicional']['symbol_mon']); 
          nm_limpa_valor($this->adicional, $this->field_config['adicional']['symbol_dec'], $this->field_config['adicional']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['saldo']['symbol_dec']))
      {
          $this->sc_remove_currency($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp'], $this->field_config['saldo']['symbol_mon']); 
          nm_limpa_valor($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp']) ; 
      }
      nm_limpa_numero($this->idfacven, $this->field_config['idfacven']['symbol_grp']) ; 
      if (!empty($this->field_config['reteiva']['symbol_dec']))
      {
          nm_limpa_valor($this->reteiva, $this->field_config['reteiva']['symbol_dec'], $this->field_config['reteiva']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['imconsumo']['symbol_dec']))
      {
          $this->sc_remove_currency($this->imconsumo, $this->field_config['imconsumo']['symbol_dec'], $this->field_config['imconsumo']['symbol_grp'], $this->field_config['imconsumo']['symbol_mon']); 
          nm_limpa_valor($this->imconsumo, $this->field_config['imconsumo']['symbol_dec'], $this->field_config['imconsumo']['symbol_grp']) ; 
      }
      $this->nm_converte_datas();
      foreach ($varloc_btn_php as $cmp => $val_cmp)
      {
          $this->$cmp = $val_cmp;
      }
      $_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
  if ($this->total !=0)
	{
	echo "Factura Tiene Items asociados, por favor elimine datalle primero.";
	}
else
	{$idrem=$this->idfacven ;
	 
      $nm_select = "select pedido from facturaven where idfacven=$idrem"; 
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
		 if($this->data[0][0]>0)
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
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			 }
		 }
	
     $nm_select ="DELETE FROM facturaven WHERE idfacven=$idrem"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	 ?>
		<script>
			window.location.href='../grid_NC_ND/';
		</script>
	<?php
	}
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="idfacven" value="<?php echo $this->form_encode_input($this->idfacven) ?>"/>
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
   function sc_btn_autorizar() 
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
        <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
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
include_once("form_notas_sajax_js.php");
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      else
      {
          if (!isset($this->idcli) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idcli']))
          {
              $varloc_btn_php['idcli'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idcli'];
          }
          if (!isset($this->idcli) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idcli']))
          {
              $varloc_btn_php['idcli'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idcli'];
          }
      }
      $nm_f_saida = "./";
      nm_limpa_numero($this->numfacven, $this->field_config['numfacven']['symbol_grp']) ; 
      nm_limpa_data($this->fechaven, $this->field_config['fechaven']['date_sep']) ; 
      nm_limpa_numero($this->dias_decredito, $this->field_config['dias_decredito']['symbol_grp']) ; 
      nm_limpa_data($this->fechavenc, $this->field_config['fechavenc']['date_sep']) ; 
      nm_limpa_numero($this->id_fact, $this->field_config['id_fact']['symbol_grp']) ; 
      nm_limpa_numero($this->nremision, $this->field_config['nremision']['symbol_grp']) ; 
      if (!empty($this->field_config['cupodis']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cupodis, $this->field_config['cupodis']['symbol_dec'], $this->field_config['cupodis']['symbol_grp'], $this->field_config['cupodis']['symbol_mon']); 
          nm_limpa_valor($this->cupodis, $this->field_config['cupodis']['symbol_dec'], $this->field_config['cupodis']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['cupo']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cupo, $this->field_config['cupo']['symbol_dec'], $this->field_config['cupo']['symbol_grp'], $this->field_config['cupo']['symbol_mon']); 
          nm_limpa_valor($this->cupo, $this->field_config['cupo']['symbol_dec'], $this->field_config['cupo']['symbol_grp']) ; 
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
      if (!empty($this->field_config['total']['symbol_dec']))
      {
          $this->sc_remove_currency($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp'], $this->field_config['total']['symbol_mon']); 
          nm_limpa_valor($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['adicional']['symbol_dec']))
      {
          $this->sc_remove_currency($this->adicional, $this->field_config['adicional']['symbol_dec'], $this->field_config['adicional']['symbol_grp'], $this->field_config['adicional']['symbol_mon']); 
          nm_limpa_valor($this->adicional, $this->field_config['adicional']['symbol_dec'], $this->field_config['adicional']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['saldo']['symbol_dec']))
      {
          $this->sc_remove_currency($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp'], $this->field_config['saldo']['symbol_mon']); 
          nm_limpa_valor($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp']) ; 
      }
      nm_limpa_numero($this->idfacven, $this->field_config['idfacven']['symbol_grp']) ; 
      if (!empty($this->field_config['reteiva']['symbol_dec']))
      {
          nm_limpa_valor($this->reteiva, $this->field_config['reteiva']['symbol_dec'], $this->field_config['reteiva']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['imconsumo']['symbol_dec']))
      {
          $this->sc_remove_currency($this->imconsumo, $this->field_config['imconsumo']['symbol_dec'], $this->field_config['imconsumo']['symbol_grp'], $this->field_config['imconsumo']['symbol_mon']); 
          nm_limpa_valor($this->imconsumo, $this->field_config['imconsumo']['symbol_dec'], $this->field_config['imconsumo']['symbol_grp']) ; 
      }
      $this->nm_converte_datas();
      foreach ($varloc_btn_php as $cmp => $val_cmp)
      {
          $this->$cmp = $val_cmp;
      }
      $_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gCliente)) {$this->sc_temp_gCliente = (isset($_SESSION['gCliente'])) ? $_SESSION['gCliente'] : "";}
  if($this->idcli >0)
	{
	$this->sc_temp_gCliente=$this->idcli ;
	 if (isset($this->sc_temp_gCliente)) { $_SESSION['gCliente'] = $this->sc_temp_gCliente;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('autorizacion') . "/", $this->nm_location, "_self?#?" . NM_encode_input("") . "?@?","_self", '', 440, 630);
 };
	}
else
	{
	$this->sc_set_focus('idcli');
	echo "SELECCIONE CLIENTE!";
	}
if (isset($this->sc_temp_gCliente)) { $_SESSION['gCliente'] = $this->sc_temp_gCliente;}
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="idfacven" value="<?php echo $this->form_encode_input($this->idfacven) ?>"/>
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
   function sc_btn_btn_asentar() 
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
        <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
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
include_once("form_notas_sajax_js.php");
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      else
      {
          if (!isset($this->idfacven) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idfacven']))
          {
              $varloc_btn_php['idfacven'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idfacven'];
          }
          if (!isset($this->fechaven) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['fechaven']))
          {
              $varloc_btn_php['fechaven'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['fechaven'];
          }
          if (!isset($this->id_fact) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['id_fact']))
          {
              $varloc_btn_php['id_fact'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['id_fact'];
          }
          if (!isset($this->asentada) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['asentada']))
          {
              $varloc_btn_php['asentada'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['asentada'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->asentada) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['asentada']))
          {
              $varloc_btn_php['asentada'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['asentada'];
          }
          if (!isset($this->idcli) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idcli']))
          {
              $varloc_btn_php['idcli'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idcli'];
          }
          if (!isset($this->tipo) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['tipo']))
          {
              $varloc_btn_php['tipo'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['tipo'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->tipo) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['tipo']))
          {
              $varloc_btn_php['tipo'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['tipo'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->idfacven) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idfacven']))
          {
              $varloc_btn_php['idfacven'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idfacven'];
          }
          if (!isset($this->idcli) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idcli']))
          {
              $varloc_btn_php['idcli'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idcli'];
          }
          if (!isset($this->tipo) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['tipo']))
          {
              $varloc_btn_php['tipo'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['tipo'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->tipo) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['tipo']))
          {
              $varloc_btn_php['tipo'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['tipo'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->idfacven) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idfacven']))
          {
              $varloc_btn_php['idfacven'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idfacven'];
          }
          if (!isset($this->asentada) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['asentada']))
          {
              $varloc_btn_php['asentada'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['asentada'];
          }
      }
      $nm_f_saida = "./";
      nm_limpa_numero($this->numfacven, $this->field_config['numfacven']['symbol_grp']) ; 
      nm_limpa_data($this->fechaven, $this->field_config['fechaven']['date_sep']) ; 
      nm_limpa_numero($this->dias_decredito, $this->field_config['dias_decredito']['symbol_grp']) ; 
      nm_limpa_data($this->fechavenc, $this->field_config['fechavenc']['date_sep']) ; 
      nm_limpa_numero($this->id_fact, $this->field_config['id_fact']['symbol_grp']) ; 
      nm_limpa_numero($this->nremision, $this->field_config['nremision']['symbol_grp']) ; 
      if (!empty($this->field_config['cupodis']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cupodis, $this->field_config['cupodis']['symbol_dec'], $this->field_config['cupodis']['symbol_grp'], $this->field_config['cupodis']['symbol_mon']); 
          nm_limpa_valor($this->cupodis, $this->field_config['cupodis']['symbol_dec'], $this->field_config['cupodis']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['cupo']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cupo, $this->field_config['cupo']['symbol_dec'], $this->field_config['cupo']['symbol_grp'], $this->field_config['cupo']['symbol_mon']); 
          nm_limpa_valor($this->cupo, $this->field_config['cupo']['symbol_dec'], $this->field_config['cupo']['symbol_grp']) ; 
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
      if (!empty($this->field_config['total']['symbol_dec']))
      {
          $this->sc_remove_currency($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp'], $this->field_config['total']['symbol_mon']); 
          nm_limpa_valor($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['adicional']['symbol_dec']))
      {
          $this->sc_remove_currency($this->adicional, $this->field_config['adicional']['symbol_dec'], $this->field_config['adicional']['symbol_grp'], $this->field_config['adicional']['symbol_mon']); 
          nm_limpa_valor($this->adicional, $this->field_config['adicional']['symbol_dec'], $this->field_config['adicional']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['saldo']['symbol_dec']))
      {
          $this->sc_remove_currency($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp'], $this->field_config['saldo']['symbol_mon']); 
          nm_limpa_valor($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp']) ; 
      }
      nm_limpa_numero($this->idfacven, $this->field_config['idfacven']['symbol_grp']) ; 
      if (!empty($this->field_config['reteiva']['symbol_dec']))
      {
          nm_limpa_valor($this->reteiva, $this->field_config['reteiva']['symbol_dec'], $this->field_config['reteiva']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['imconsumo']['symbol_dec']))
      {
          $this->sc_remove_currency($this->imconsumo, $this->field_config['imconsumo']['symbol_dec'], $this->field_config['imconsumo']['symbol_grp'], $this->field_config['imconsumo']['symbol_mon']); 
          nm_limpa_valor($this->imconsumo, $this->field_config['imconsumo']['symbol_dec'], $this->field_config['imconsumo']['symbol_grp']) ; 
      }
      $this->nm_converte_datas();
      foreach ($varloc_btn_php as $cmp => $val_cmp)
      {
          $this->$cmp = $val_cmp;
      }
      $_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
  $vIdFV=			$this->idfacven ;
$fec=			$this->fechaven ;
$vIdFacinter=	$this->id_fact ;
$i=				0;
$vGrupo=		0;
$unimay=		'NO';
$facto=			0;
$cant=			0;
$aux=			0;
$vSaldoF=		0;
$vPagada=		'';
$vCredito=		'';
$vTotal=		0;

$this->asentada =1;

     $nm_select ="UPDATE facturaven set asentada='1' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

if($this->total >0)
	{
	if ($this->asentada ==1)
		{
		$this->sc_ajax_javascript('nm_field_disabled', array("tipo=disabled;resolucion=disabled;idcli=disabled;observaciones=disabled;numfacven=disabled;pagada=disabled;fechaven=disabled;fechavenc=disabled;credito=disabled;resolucion=disabled;numfacven=disabled;pedido=disabled", ""));
;
		$this->Ini->nm_hidden_blocos[5] = "off"; $this->NM_ajax_info['blockDisplay']['5'] = 'off';
				
		$idt=$this->idcli ; 
		 
      $nm_select = "select saldo from terceros where idtercero=$idt"; 
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
			}
		
		 
      $nm_select = "select saldo, credito, pagada, total from facturaven where idfacven=$vIdFacinter"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dat_f = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dat_f[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dat_f = false;
          $this->dat_f_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->dat_f[0][0]))
			{
			if($this->dat_f[0][0]>0)
				{
				$vSaldoF=$this->dat_f[0][0];
				}
			$vCredito=	$this->dat_f[0][1];
			$vPagada=	$this->dat_f[0][2];
			$vTotal=	$this->dat_f[0][3];
			}
		
			if($this->tipo =='ND')
				{
				
     $nm_select ="UPDATE terceros set saldo=$this->total +$sal where idtercero=$idt"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
				}
		
			elseif($this->tipo =='NC')
				{
				
				if($vCredito==2 )
					{
					if($vPagada=='NO' or $vPagada=='AB')
						{
						if($this->total ==$vSaldoF or $this->total >$vSaldoF)
							{
							
     $nm_select ="UPDATE facturaven set saldo=0, pagada='SI' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						elseif($this->total <$vSaldoF)
							{
							
     $nm_select ="UPDATE facturaven set saldo=$vSaldoF-$this->total , pagada='AB' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						$this->fHacerRecibo();
						}
					
					else
						{
						$this->fHacerRecibo();
						}
						
					}
				
				else 
					{
					
     $nm_select ="UPDATE terceros set saldo=$sal-$this->total  where idtercero=$idt"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
					if($vPagada=='NO' or $vPagada=='AB')
						{
						if($this->total ==$vSaldoF or $this->total >$vSaldoF)
							{
							
     $nm_select ="UPDATE facturaven set saldo=0, pagada='SI' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						elseif($this->total <$vSaldoF)
							{
							
							
     $nm_select ="UPDATE facturaven set saldo=$vSaldoF-$this->total , pagada='AB' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						$this->fHacerReciboCr($this->total -$vSaldoF);
						}
					
					else
						{
						$this->fHacerRecibo();
						}
						
					}
						
				}
			
     $nm_select ="UPDATE facturaven set idcli=$idt, asentada=1 where idfacven=$this->idfacven "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			$this->NM_ajax_info['buttonDisplay']['imprimir'] = $this->nmgp_botoes["imprimir"] = "on";;
			$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "on";;
			
	
		}
	
	else
		{
		
		 
      $nm_select = "select saldo, credito, pagada, total from facturaven where idfacven=$vIdFacinter"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dat_f = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dat_f[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dat_f = false;
          $this->dat_f_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->dat_f[0][0]))
			{
			if($this->dat_f[0][0]>0)
				{
				$vSaldoF=$this->dat_f[0][0];
				}
			$vCredito=	$this->dat_f[0][1];
			$vPagada=	$this->dat_f[0][2];
			$vTotal=	$this->dat_f[0][3];
			}
				
		$this->Ini->nm_hidden_blocos[5] = "on"; $this->NM_ajax_info['blockDisplay']['5'] = 'on';
		
		$idt=$this->idcli ; 
		 
      $nm_select = "select saldo from terceros where idtercero=$idt"; 
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
			}
		
		if($this->tipo =='ND')
			{
			
     $nm_select ="UPDATE terceros set saldo=$sal-$this->total  where idtercero=$idt"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			}
		
		elseif($this->tipo =='NC')
			{
			if($vCredito==2 )
				{
				if($vPagada=='SI')
					{
					if($vTotal==$this->total )
							{
							
     $nm_select ="UPDATE facturaven set saldo=$this->total , pagada='NO' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						
						else
							{
							
     $nm_select ="UPDATE facturaven set saldo=$this->total +$vSaldoF, pagada='AB' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
					}
				
				elseif($vPagada=='AB')
					{
					if($this->total ==$vSaldoF or $this->total >$vSaldoF)
						{
						if($vTotal==($this->total +$vSaldoF) or $vTotal<($this->total +$vSaldoF))
							{
							
     $nm_select ="UPDATE facturaven set saldo=$this->total +$vSaldoF, pagada='NO' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						else
							{
							
     $nm_select ="UPDATE facturaven set saldo=$this->total +$vSaldoF, pagada='AB' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						
						}
					elseif($this->total <$vSaldoF)
						{
						
     $nm_select ="UPDATE facturaven set saldo=$this->total +$vSaldoF, pagada='AB' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
						}
					}
				$this->fBorrarRecibo();
				}
			
			else 
				{
				
     $nm_select ="UPDATE terceros set saldo=$this->total +$sal where idtercero=$idt"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
				
				if($vPagada=='SI' or $vPagada=='AB')
					{
					if($this->total ==$vTotal)
						{
						
     $nm_select ="UPDATE facturaven set saldo=$vTotal, pagada='NO' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
						}
					elseif($this->total <$vTotal)
						{
						
     $nm_select ="UPDATE facturaven set saldo=$this->total +$vSaldoF, pagada='AB' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
						}
					}
					
				else
					{
					}
				}
						
			
			
			
			$this->NM_ajax_info['buttonDisplay']['imprimir'] = $this->nmgp_botoes["imprimir"] = "off";;
			$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "on";;
			
     $nm_select ="UPDATE facturaven set asentada=0 where idfacven=$this->idfacven "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
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
	$this->nm_mens_alert[] = "No ha Detallado la Nota, NO puede Asentar"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("No ha Detallado la Nota, NO puede Asentar"); }$this->asentada =0;
	$this->NM_ajax_info['buttonDisplay']['imprimir'] = $this->nmgp_botoes["imprimir"] = "off";;
	$this->sc_ajax_javascript('nm_field_disabled', array("numfacven=disabled;pagada=disabled;fechaven=disabled;fechavenc=disabled", ""));
;
	}


echo "<div style='padding:10px;border-radius:8px;color:white;background:#1c2f74;'>Documento asentado con éxito.</div><br>";
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="idfacven" value="<?php echo $this->form_encode_input($this->idfacven) ?>"/>
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
   function sc_btn_btn_reversar() 
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
        <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
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
include_once("form_notas_sajax_js.php");
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      else
      {
          if (!isset($this->idfacven) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idfacven']))
          {
              $varloc_btn_php['idfacven'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idfacven'];
          }
          if (!isset($this->fechaven) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['fechaven']))
          {
              $varloc_btn_php['fechaven'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['fechaven'];
          }
          if (!isset($this->id_fact) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['id_fact']))
          {
              $varloc_btn_php['id_fact'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['id_fact'];
          }
          if (!isset($this->asentada) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['asentada']))
          {
              $varloc_btn_php['asentada'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['asentada'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->asentada) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['asentada']))
          {
              $varloc_btn_php['asentada'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['asentada'];
          }
          if (!isset($this->idcli) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idcli']))
          {
              $varloc_btn_php['idcli'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idcli'];
          }
          if (!isset($this->tipo) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['tipo']))
          {
              $varloc_btn_php['tipo'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['tipo'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->tipo) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['tipo']))
          {
              $varloc_btn_php['tipo'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['tipo'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->idfacven) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idfacven']))
          {
              $varloc_btn_php['idfacven'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idfacven'];
          }
          if (!isset($this->idcli) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idcli']))
          {
              $varloc_btn_php['idcli'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idcli'];
          }
          if (!isset($this->tipo) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['tipo']))
          {
              $varloc_btn_php['tipo'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['tipo'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->tipo) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['tipo']))
          {
              $varloc_btn_php['tipo'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['tipo'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->total) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total']))
          {
              $varloc_btn_php['total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['total'];
          }
          if (!isset($this->idfacven) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idfacven']))
          {
              $varloc_btn_php['idfacven'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['idfacven'];
          }
          if (!isset($this->asentada) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['asentada']))
          {
              $varloc_btn_php['asentada'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form']['asentada'];
          }
      }
      $nm_f_saida = "./";
      nm_limpa_numero($this->numfacven, $this->field_config['numfacven']['symbol_grp']) ; 
      nm_limpa_data($this->fechaven, $this->field_config['fechaven']['date_sep']) ; 
      nm_limpa_numero($this->dias_decredito, $this->field_config['dias_decredito']['symbol_grp']) ; 
      nm_limpa_data($this->fechavenc, $this->field_config['fechavenc']['date_sep']) ; 
      nm_limpa_numero($this->id_fact, $this->field_config['id_fact']['symbol_grp']) ; 
      nm_limpa_numero($this->nremision, $this->field_config['nremision']['symbol_grp']) ; 
      if (!empty($this->field_config['cupodis']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cupodis, $this->field_config['cupodis']['symbol_dec'], $this->field_config['cupodis']['symbol_grp'], $this->field_config['cupodis']['symbol_mon']); 
          nm_limpa_valor($this->cupodis, $this->field_config['cupodis']['symbol_dec'], $this->field_config['cupodis']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['cupo']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cupo, $this->field_config['cupo']['symbol_dec'], $this->field_config['cupo']['symbol_grp'], $this->field_config['cupo']['symbol_mon']); 
          nm_limpa_valor($this->cupo, $this->field_config['cupo']['symbol_dec'], $this->field_config['cupo']['symbol_grp']) ; 
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
      if (!empty($this->field_config['total']['symbol_dec']))
      {
          $this->sc_remove_currency($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp'], $this->field_config['total']['symbol_mon']); 
          nm_limpa_valor($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['adicional']['symbol_dec']))
      {
          $this->sc_remove_currency($this->adicional, $this->field_config['adicional']['symbol_dec'], $this->field_config['adicional']['symbol_grp'], $this->field_config['adicional']['symbol_mon']); 
          nm_limpa_valor($this->adicional, $this->field_config['adicional']['symbol_dec'], $this->field_config['adicional']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['saldo']['symbol_dec']))
      {
          $this->sc_remove_currency($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp'], $this->field_config['saldo']['symbol_mon']); 
          nm_limpa_valor($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp']) ; 
      }
      nm_limpa_numero($this->idfacven, $this->field_config['idfacven']['symbol_grp']) ; 
      if (!empty($this->field_config['reteiva']['symbol_dec']))
      {
          nm_limpa_valor($this->reteiva, $this->field_config['reteiva']['symbol_dec'], $this->field_config['reteiva']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['imconsumo']['symbol_dec']))
      {
          $this->sc_remove_currency($this->imconsumo, $this->field_config['imconsumo']['symbol_dec'], $this->field_config['imconsumo']['symbol_grp'], $this->field_config['imconsumo']['symbol_mon']); 
          nm_limpa_valor($this->imconsumo, $this->field_config['imconsumo']['symbol_dec'], $this->field_config['imconsumo']['symbol_grp']) ; 
      }
      $this->nm_converte_datas();
      foreach ($varloc_btn_php as $cmp => $val_cmp)
      {
          $this->$cmp = $val_cmp;
      }
      $_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
  $vIdFV=			$this->idfacven ;
$fec=			$this->fechaven ;
$vIdFacinter=	$this->id_fact ;
$i=				0;
$vGrupo=		0;
$unimay=		'NO';
$facto=			0;
$cant=			0;
$aux=			0;
$vSaldoF=		0;
$vPagada=		'';
$vCredito=		'';
$vTotal=		0;

$this->asentada =0;

     $nm_select ="UPDATE facturaven set asentada='0' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

if($this->total >0)
	{
	if ($this->asentada ==1)
		{
		$this->sc_ajax_javascript('nm_field_disabled', array("tipo=disabled;resolucion=disabled;idcli=disabled;observaciones=disabled;numfacven=disabled;pagada=disabled;fechaven=disabled;fechavenc=disabled;credito=disabled;resolucion=disabled;numfacven=disabled;pedido=disabled", ""));
;
		$this->Ini->nm_hidden_blocos[5] = "off"; $this->NM_ajax_info['blockDisplay']['5'] = 'off';
				
		$idt=$this->idcli ; 
		 
      $nm_select = "select saldo from terceros where idtercero=$idt"; 
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
			}
		
		 
      $nm_select = "select saldo, credito, pagada, total from facturaven where idfacven=$vIdFacinter"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dat_f = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dat_f[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dat_f = false;
          $this->dat_f_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->dat_f[0][0]))
			{
			if($this->dat_f[0][0]>0)
				{
				$vSaldoF=$this->dat_f[0][0];
				}
			$vCredito=	$this->dat_f[0][1];
			$vPagada=	$this->dat_f[0][2];
			$vTotal=	$this->dat_f[0][3];
			}
		
			if($this->tipo =='ND')
				{
				
     $nm_select ="UPDATE terceros set saldo=$this->total +$sal where idtercero=$idt"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
				}
		
			elseif($this->tipo =='NC')
				{
				
				if($vCredito==2 )
					{
					if($vPagada=='NO' or $vPagada=='AB')
						{
						if($this->total ==$vSaldoF or $this->total >$vSaldoF)
							{
							
     $nm_select ="UPDATE facturaven set saldo=0, pagada='SI' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						elseif($this->total <$vSaldoF)
							{
							
     $nm_select ="UPDATE facturaven set saldo=$vSaldoF-$this->total , pagada='AB' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						$this->fHacerRecibo();
						}
					
					else
						{
						$this->fHacerRecibo();
						}
						
					}
				
				else 
					{
					
     $nm_select ="UPDATE terceros set saldo=$sal-$this->total  where idtercero=$idt"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
					if($vPagada=='NO' or $vPagada=='AB')
						{
						if($this->total ==$vSaldoF or $this->total >$vSaldoF)
							{
							
     $nm_select ="UPDATE facturaven set saldo=0, pagada='SI' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						elseif($this->total <$vSaldoF)
							{
							
							
     $nm_select ="UPDATE facturaven set saldo=$vSaldoF-$this->total , pagada='AB' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						$this->fHacerReciboCr($this->total -$vSaldoF);
						}
					
					else
						{
						$this->fHacerRecibo();
						}
						
					}
						
				}
			
     $nm_select ="UPDATE facturaven set idcli=$idt, asentada=1 where idfacven=$this->idfacven "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			$this->NM_ajax_info['buttonDisplay']['imprimir'] = $this->nmgp_botoes["imprimir"] = "on";;
			$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "on";;
			
	
		}
	
	else
		{
		
		 
      $nm_select = "select saldo, credito, pagada, total from facturaven where idfacven=$vIdFacinter"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dat_f = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dat_f[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dat_f = false;
          $this->dat_f_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->dat_f[0][0]))
			{
			if($this->dat_f[0][0]>0)
				{
				$vSaldoF=$this->dat_f[0][0];
				}
			$vCredito=	$this->dat_f[0][1];
			$vPagada=	$this->dat_f[0][2];
			$vTotal=	$this->dat_f[0][3];
			}
				
		$this->Ini->nm_hidden_blocos[5] = "on"; $this->NM_ajax_info['blockDisplay']['5'] = 'on';
		
		$idt=$this->idcli ; 
		 
      $nm_select = "select saldo from terceros where idtercero=$idt"; 
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
			}
		
		if($this->tipo =='ND')
			{
			
     $nm_select ="UPDATE terceros set saldo=$sal-$this->total  where idtercero=$idt"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			}
		
		elseif($this->tipo =='NC')
			{
			if($vCredito==2 )
				{
				if($vPagada=='SI')
					{
					if($vTotal==$this->total )
							{
							
     $nm_select ="UPDATE facturaven set saldo=$this->total , pagada='NO' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						
						else
							{
							
     $nm_select ="UPDATE facturaven set saldo=$this->total +$vSaldoF, pagada='AB' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
					}
				
				elseif($vPagada=='AB')
					{
					if($this->total ==$vSaldoF or $this->total >$vSaldoF)
						{
						if($vTotal==($this->total +$vSaldoF) or $vTotal<($this->total +$vSaldoF))
							{
							
     $nm_select ="UPDATE facturaven set saldo=$this->total +$vSaldoF, pagada='NO' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						else
							{
							
     $nm_select ="UPDATE facturaven set saldo=$this->total +$vSaldoF, pagada='AB' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						
						}
					elseif($this->total <$vSaldoF)
						{
						
     $nm_select ="UPDATE facturaven set saldo=$this->total +$vSaldoF, pagada='AB' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
						}
					}
				$this->fBorrarRecibo();
				}
			
			else 
				{
				
     $nm_select ="UPDATE terceros set saldo=$this->total +$sal where idtercero=$idt"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
				
				if($vPagada=='SI' or $vPagada=='AB')
					{
					if($this->total ==$vTotal)
						{
						
     $nm_select ="UPDATE facturaven set saldo=$vTotal, pagada='NO' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
						}
					elseif($this->total <$vTotal)
						{
						
     $nm_select ="UPDATE facturaven set saldo=$this->total +$vSaldoF, pagada='AB' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
						}
					}
					
				else
					{
					}
				}
						
			
			
			
			$this->NM_ajax_info['buttonDisplay']['imprimir'] = $this->nmgp_botoes["imprimir"] = "off";;
			$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "on";;
			
     $nm_select ="UPDATE facturaven set asentada=0 where idfacven=$this->idfacven "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
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
	$this->nm_mens_alert[] = "No ha Detallado la Nota, NO puede Asentar"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("No ha Detallado la Nota, NO puede Asentar"); }$this->asentada =0;
	$this->NM_ajax_info['buttonDisplay']['imprimir'] = $this->nmgp_botoes["imprimir"] = "off";;
	$this->sc_ajax_javascript('nm_field_disabled', array("numfacven=disabled;pagada=disabled;fechaven=disabled;fechavenc=disabled", ""));
;
	}



echo "<div style='padding:10px;border-radius:8px;color:white;background:#d50011;'>Documento reversado con éxito.</div><br>";
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="idfacven" value="<?php echo $this->form_encode_input($this->idfacven) ?>"/>
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
           case 'tipo':
               return "TIPO DE NOTA:";
               break;
           case 'resolucion':
               return "PREFIJO NOTA:";
               break;
           case 'numfacven':
               return "NOTA No:";
               break;
           case 'pedido':
               return "DOCUMENTO A CARGAR?:";
               break;
           case 'fechaven':
               return "FECHA:";
               break;
           case 'asentada':
               return "ASENTADA:";
               break;
           case 'dias_decredito':
               return "DIAS CRÉDITO?:";
               break;
           case 'fechavenc':
               return "FECHA DE LA FACTURA:";
               break;
           case 'pagada':
               return "PAGADA?:";
               break;
           case 'pref_pedido':
               return "";
               break;
           case 'prefijo_fac':
               return "PREFIJO FACTURA:";
               break;
           case 'num_fac':
               return "FACTURA N°:";
               break;
           case 'id_fact':
               return "FACTURA AFECTADA:";
               break;
           case 'idcli':
               return "EL CLIENTE:";
               break;
           case 'direccion':
               return "DIRECCION:";
               break;
           case 'dircliente':
               return "DIRECCIÓN/SUCURSAL:";
               break;
           case 'vendedor':
               return "LO ATIENDE:";
               break;
           case 'credito':
               return "CRÉDITO?:";
               break;
           case 'mot_nc':
               return "Motivo";
               break;
           case 'mot_nd':
               return "MOTIVO ND:";
               break;
           case 'observaciones':
               return "OBSERVACIONES:";
               break;
           case 'nremision':
               return "Remisión #";
               break;
           case 'cupodis':
               return "Cupo Disponible";
               break;
           case 'cupo':
               return "Cupo Asignado al Cliente";
               break;
           case 'subtotal':
               return "SUBTOTAL";
               break;
           case 'valoriva':
               return "VALOR DEL IVA";
               break;
           case 'total':
               return "TOTAL DE LA NOTA";
               break;
           case 'adicional':
               return "";
               break;
           case 'saldo':
               return "";
               break;
           case 'idfacven':
               return "Idfacven";
               break;
           case 'retefuente':
               return "RETEFUENTE % :";
               break;
           case 'cree':
               return "AUTO RETENCIÓN %:";
               break;
           case 'reteica':
               return "RETEICA %:";
               break;
           case 'reteiva':
               return "RETEIVA %:";
               break;
           case 'imconsumo':
               return "Imconsumo";
               break;
           case 'detalle':
               return "detalle";
               break;
           case 'formapago':
               return "Formapago";
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
           case 'creado':
               return "Creado";
               break;
           case 'editado':
               return "Editado";
               break;
           case 'usuario_crea':
               return "Usuario Crea";
               break;
           case 'banco':
               return "Banco";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_notas']) || !is_array($this->NM_ajax_info['errList']['geral_form_notas']))
              {
                  $this->NM_ajax_info['errList']['geral_form_notas'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_notas'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'tipo' == $filtro)) || (is_array($filtro) && in_array('tipo', $filtro)))
        $this->ValidateField_tipo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'resolucion' == $filtro)) || (is_array($filtro) && in_array('resolucion', $filtro)))
        $this->ValidateField_resolucion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'numfacven' == $filtro)) || (is_array($filtro) && in_array('numfacven', $filtro)))
        $this->ValidateField_numfacven($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'pedido' == $filtro)) || (is_array($filtro) && in_array('pedido', $filtro)))
        $this->ValidateField_pedido($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fechaven' == $filtro)) || (is_array($filtro) && in_array('fechaven', $filtro)))
        $this->ValidateField_fechaven($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'asentada' == $filtro)) || (is_array($filtro) && in_array('asentada', $filtro)))
        $this->ValidateField_asentada($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'dias_decredito' == $filtro)) || (is_array($filtro) && in_array('dias_decredito', $filtro)))
        $this->ValidateField_dias_decredito($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fechavenc' == $filtro)) || (is_array($filtro) && in_array('fechavenc', $filtro)))
        $this->ValidateField_fechavenc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'pagada' == $filtro)) || (is_array($filtro) && in_array('pagada', $filtro)))
        $this->ValidateField_pagada($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'pref_pedido' == $filtro)) || (is_array($filtro) && in_array('pref_pedido', $filtro)))
        $this->ValidateField_pref_pedido($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'prefijo_fac' == $filtro)) || (is_array($filtro) && in_array('prefijo_fac', $filtro)))
        $this->ValidateField_prefijo_fac($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'num_fac' == $filtro)) || (is_array($filtro) && in_array('num_fac', $filtro)))
        $this->ValidateField_num_fac($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_fact' == $filtro)) || (is_array($filtro) && in_array('id_fact', $filtro)))
        $this->ValidateField_id_fact($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'idcli' == $filtro)) || (is_array($filtro) && in_array('idcli', $filtro)))
        $this->ValidateField_idcli($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'direccion' == $filtro)) || (is_array($filtro) && in_array('direccion', $filtro)))
        $this->ValidateField_direccion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'dircliente' == $filtro)) || (is_array($filtro) && in_array('dircliente', $filtro)))
        $this->ValidateField_dircliente($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'vendedor' == $filtro)) || (is_array($filtro) && in_array('vendedor', $filtro)))
        $this->ValidateField_vendedor($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'credito' == $filtro)) || (is_array($filtro) && in_array('credito', $filtro)))
        $this->ValidateField_credito($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'mot_nc' == $filtro)) || (is_array($filtro) && in_array('mot_nc', $filtro)))
        $this->ValidateField_mot_nc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'mot_nd' == $filtro)) || (is_array($filtro) && in_array('mot_nd', $filtro)))
        $this->ValidateField_mot_nd($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'observaciones' == $filtro)) || (is_array($filtro) && in_array('observaciones', $filtro)))
        $this->ValidateField_observaciones($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nremision' == $filtro)) || (is_array($filtro) && in_array('nremision', $filtro)))
        $this->ValidateField_nremision($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cupodis' == $filtro)) || (is_array($filtro) && in_array('cupodis', $filtro)))
        $this->ValidateField_cupodis($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cupo' == $filtro)) || (is_array($filtro) && in_array('cupo', $filtro)))
        $this->ValidateField_cupo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'subtotal' == $filtro)) || (is_array($filtro) && in_array('subtotal', $filtro)))
        $this->ValidateField_subtotal($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'valoriva' == $filtro)) || (is_array($filtro) && in_array('valoriva', $filtro)))
        $this->ValidateField_valoriva($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'total' == $filtro)) || (is_array($filtro) && in_array('total', $filtro)))
        $this->ValidateField_total($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'adicional' == $filtro)) || (is_array($filtro) && in_array('adicional', $filtro)))
        $this->ValidateField_adicional($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'saldo' == $filtro)) || (is_array($filtro) && in_array('saldo', $filtro)))
        $this->ValidateField_saldo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'idfacven' == $filtro)) || (is_array($filtro) && in_array('idfacven', $filtro)))
        $this->ValidateField_idfacven($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'retefuente' == $filtro)) || (is_array($filtro) && in_array('retefuente', $filtro)))
        $this->ValidateField_retefuente($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cree' == $filtro)) || (is_array($filtro) && in_array('cree', $filtro)))
        $this->ValidateField_cree($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'reteica' == $filtro)) || (is_array($filtro) && in_array('reteica', $filtro)))
        $this->ValidateField_reteica($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'reteiva' == $filtro)) || (is_array($filtro) && in_array('reteiva', $filtro)))
        $this->ValidateField_reteiva($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'imconsumo' == $filtro)) || (is_array($filtro) && in_array('imconsumo', $filtro)))
        $this->ValidateField_imconsumo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'detalle' == $filtro)) || (is_array($filtro) && in_array('detalle', $filtro)))
        $this->ValidateField_detalle($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_mot_nc = $this->mot_nc;
    $original_mot_nd = $this->mot_nd;
    $original_tipo = $this->tipo;
}
  if ($this->sc_evento == "excluir" || $this->sc_evento == "delete")
	{
	goto salida;
	}

if($this->tipo =='NC')
	{
	if(isset($this->mot_nc ) and !empty($this->mot_nc ))
		{
		goto salida;
		}
	else
		{
		$this->sc_set_focus('mot_nc');
		
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "NO HA SELECCIONADO MOTIVO DE LA NOTA CRÉDITO, NO SE PUEDE PROSEGUIR!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_form_notas';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_notas';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "NO HA SELECCIONADO MOTIVO DE LA NOTA CRÉDITO, NO SE PUEDE PROSEGUIR!";
 }
;
		}
	}
elseif($this->tipo =='ND')
	{
	if(isset($this->mot_nd ) and !empty($this->mot_nd ))
		{
		goto salida;
		}
	else
		{
		$this->sc_set_focus('mot_nd');
		
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "NO HA SELECCIONADO MOTIVO DE LA NOTA DÉBITO, NO SE PUEDE PROSEGUIR!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_form_notas';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_notas';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "NO HA SELECCIONADO MOTIVO DE LA NOTA DÉBITO, NO SE PUEDE PROSEGUIR!";
 }
;
		}
	}

salida:;
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_mot_nc != $this->mot_nc || (isset($bFlagRead_mot_nc) && $bFlagRead_mot_nc)))
    {
        $this->ajax_return_values_mot_nc(true);
    }
    if (($original_mot_nd != $this->mot_nd || (isset($bFlagRead_mot_nd) && $bFlagRead_mot_nd)))
    {
        $this->ajax_return_values_mot_nd(true);
    }
    if (($original_tipo != $this->tipo || (isset($bFlagRead_tipo) && $bFlagRead_tipo)))
    {
        $this->ajax_return_values_tipo(true);
    }
}
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off'; 
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

    function ValidateField_tipo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tipo == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['php_cmp_required']['tipo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['php_cmp_required']['tipo'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "TIPO DE NOTA:" ;
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
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipo

    function ValidateField_resolucion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->resolucion == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['php_cmp_required']['resolucion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['php_cmp_required']['resolucion'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "PREFIJO NOTA:" ; 
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
          if (!empty($this->resolucion) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_resolucion']) && !in_array($this->resolucion, $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_resolucion']))
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
                  $Campos_Crit .= "NOTA No:: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->numfacven, 20, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "NOTA No:; " ; 
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

    function ValidateField_pedido(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->pedido) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_pedido']) && !in_array($this->pedido, $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_pedido']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['pedido']))
                   {
                       $Campos_Erros['pedido'] = array();
                   }
                   $Campos_Erros['pedido'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['pedido']) || !is_array($this->NM_ajax_info['errList']['pedido']))
                   {
                       $this->NM_ajax_info['errList']['pedido'] = array();
                   }
                   $this->NM_ajax_info['errList']['pedido'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pedido';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pedido

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
                  $Campos_Crit .= "FECHA:; " ; 
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

    function ValidateField_dias_decredito(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->dias_decredito === "" || is_null($this->dias_decredito))  
      { 
          $this->dias_decredito = 0;
          $this->sc_force_zero[] = 'dias_decredito';
      } 
      nm_limpa_numero($this->dias_decredito, $this->field_config['dias_decredito']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->dias_decredito != '')  
          { 
              $iTestSize = 3;
              if (strlen($this->dias_decredito) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "DIAS CRÉDITO?:: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->dias_decredito, 3, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "DIAS CRÉDITO?:; " ; 
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
                  $Campos_Crit .= "FECHA DE LA FACTURA:; " ; 
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

    function ValidateField_pref_pedido(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->pref_pedido) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['pref_pedido']))
              {
                  $Campos_Erros['pref_pedido'] = array();
              }
              $Campos_Erros['pref_pedido'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['pref_pedido']) || !is_array($this->NM_ajax_info['errList']['pref_pedido']))
              {
                  $this->NM_ajax_info['errList']['pref_pedido'] = array();
              }
              $this->NM_ajax_info['errList']['pref_pedido'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pref_pedido';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pref_pedido

    function ValidateField_prefijo_fac(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->prefijo_fac) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_prefijo_fac']) && !in_array($this->prefijo_fac, $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_prefijo_fac']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['prefijo_fac']))
                   {
                       $Campos_Erros['prefijo_fac'] = array();
                   }
                   $Campos_Erros['prefijo_fac'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['prefijo_fac']) || !is_array($this->NM_ajax_info['errList']['prefijo_fac']))
                   {
                       $this->NM_ajax_info['errList']['prefijo_fac'] = array();
                   }
                   $this->NM_ajax_info['errList']['prefijo_fac'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'prefijo_fac';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_prefijo_fac

    function ValidateField_num_fac(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->num_fac) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_num_fac']) && !in_array($this->num_fac, $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_num_fac']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['num_fac']))
                   {
                       $Campos_Erros['num_fac'] = array();
                   }
                   $Campos_Erros['num_fac'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['num_fac']) || !is_array($this->NM_ajax_info['errList']['num_fac']))
                   {
                       $this->NM_ajax_info['errList']['num_fac'] = array();
                   }
                   $this->NM_ajax_info['errList']['num_fac'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'num_fac';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_num_fac

    function ValidateField_id_fact(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->id_fact === "" || is_null($this->id_fact))  
      { 
          $this->id_fact = 0;
          $this->sc_force_zero[] = 'id_fact';
      } 
      nm_limpa_numero($this->id_fact, $this->field_config['id_fact']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->id_fact != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->id_fact) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "FACTURA AFECTADA:: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id_fact']))
                  {
                      $Campos_Erros['id_fact'] = array();
                  }
                  $Campos_Erros['id_fact'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id_fact']) || !is_array($this->NM_ajax_info['errList']['id_fact']))
                  {
                      $this->NM_ajax_info['errList']['id_fact'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_fact'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id_fact, 20, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "FACTURA AFECTADA:; " ; 
                  if (!isset($Campos_Erros['id_fact']))
                  {
                      $Campos_Erros['id_fact'] = array();
                  }
                  $Campos_Erros['id_fact'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id_fact']) || !is_array($this->NM_ajax_info['errList']['id_fact']))
                  {
                      $this->NM_ajax_info['errList']['id_fact'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_fact'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_fact';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_fact

    function ValidateField_idcli(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idcli == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['php_cmp_required']['idcli']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['php_cmp_required']['idcli'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "EL CLIENTE:" ; 
          if (!isset($Campos_Erros['idcli']))
          {
              $Campos_Erros['idcli'] = array();
          }
          $Campos_Erros['idcli'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['idcli']) || !is_array($this->NM_ajax_info['errList']['idcli']))
          {
              $this->NM_ajax_info['errList']['idcli'] = array();
          }
          $this->NM_ajax_info['errList']['idcli'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->idcli) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_idcli']) && !in_array($this->idcli, $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_idcli']))
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

    function ValidateField_direccion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->direccion) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_direccion']) && !in_array($this->direccion, $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_direccion']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['direccion']))
                   {
                       $Campos_Erros['direccion'] = array();
                   }
                   $Campos_Erros['direccion'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['direccion']) || !is_array($this->NM_ajax_info['errList']['direccion']))
                   {
                       $this->NM_ajax_info['errList']['direccion'] = array();
                   }
                   $this->NM_ajax_info['errList']['direccion'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
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

    function ValidateField_dircliente(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->dircliente) > 11) 
          { 
              $hasError = true;
              $Campos_Crit .= "DIRECCIÓN/SUCURSAL: " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['dircliente']))
              {
                  $Campos_Erros['dircliente'] = array();
              }
              $Campos_Erros['dircliente'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['dircliente']) || !is_array($this->NM_ajax_info['errList']['dircliente']))
              {
                  $this->NM_ajax_info['errList']['dircliente'] = array();
              }
              $this->NM_ajax_info['errList']['dircliente'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
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

    function ValidateField_vendedor(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->vendedor) > 10) 
          { 
              $hasError = true;
              $Campos_Crit .= "LO ATIENDE: " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['vendedor']))
              {
                  $Campos_Erros['vendedor'] = array();
              }
              $Campos_Erros['vendedor'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['vendedor']) || !is_array($this->NM_ajax_info['errList']['vendedor']))
              {
                  $this->NM_ajax_info['errList']['vendedor'] = array();
              }
              $this->NM_ajax_info['errList']['vendedor'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
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

    function ValidateField_credito(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->credito == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['php_cmp_required']['credito']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['php_cmp_required']['credito'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "CRÉDITO?:" ;
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

    function ValidateField_mot_nc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->mot_nc) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nc']) && !in_array($this->mot_nc, $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nc']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['mot_nc']))
                   {
                       $Campos_Erros['mot_nc'] = array();
                   }
                   $Campos_Erros['mot_nc'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['mot_nc']) || !is_array($this->NM_ajax_info['errList']['mot_nc']))
                   {
                       $this->NM_ajax_info['errList']['mot_nc'] = array();
                   }
                   $this->NM_ajax_info['errList']['mot_nc'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'mot_nc';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_mot_nc

    function ValidateField_mot_nd(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->mot_nd) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nd']) && !in_array($this->mot_nd, $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nd']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['mot_nd']))
                   {
                       $Campos_Erros['mot_nd'] = array();
                   }
                   $Campos_Erros['mot_nd'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['mot_nd']) || !is_array($this->NM_ajax_info['errList']['mot_nd']))
                   {
                       $this->NM_ajax_info['errList']['mot_nd'] = array();
                   }
                   $this->NM_ajax_info['errList']['mot_nd'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'mot_nd';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_mot_nd

    function ValidateField_observaciones(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
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

    function ValidateField_nremision(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nremision === "" || is_null($this->nremision))  
      { 
          $this->nremision = 0;
          $this->sc_force_zero[] = 'nremision';
      } 
      nm_limpa_numero($this->nremision, $this->field_config['nremision']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->nremision != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->nremision) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Remisión #: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['nremision']))
                  {
                      $Campos_Erros['nremision'] = array();
                  }
                  $Campos_Erros['nremision'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['nremision']) || !is_array($this->NM_ajax_info['errList']['nremision']))
                  {
                      $this->NM_ajax_info['errList']['nremision'] = array();
                  }
                  $this->NM_ajax_info['errList']['nremision'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->nremision, 20, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Remisión #; " ; 
                  if (!isset($Campos_Erros['nremision']))
                  {
                      $Campos_Erros['nremision'] = array();
                  }
                  $Campos_Erros['nremision'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['nremision']) || !is_array($this->NM_ajax_info['errList']['nremision']))
                  {
                      $this->NM_ajax_info['errList']['nremision'] = array();
                  }
                  $this->NM_ajax_info['errList']['nremision'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nremision';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nremision

    function ValidateField_cupodis(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cupodis === "" || is_null($this->cupodis))  
      { 
          $this->cupodis = 0;
          $this->sc_force_zero[] = 'cupodis';
      } 
      if (!empty($this->field_config['cupodis']['symbol_dec']))
      {
          $this->sc_remove_currency($this->cupodis, $this->field_config['cupodis']['symbol_dec'], $this->field_config['cupodis']['symbol_grp'], $this->field_config['cupodis']['symbol_mon']); 
          nm_limpa_valor($this->cupodis, $this->field_config['cupodis']['symbol_dec'], $this->field_config['cupodis']['symbol_grp']) ; 
          if ('.' == substr($this->cupodis, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->cupodis, 1)))
              {
                  $this->cupodis = '';
              }
              else
              {
                  $this->cupodis = '0' . $this->cupodis;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->cupodis != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->cupodis, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->cupodis, -1))
              {
                  $iTestSize++;
                  $this->cupodis = '-' . substr($this->cupodis, 0, -1);
              }
              if (strlen($this->cupodis) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cupo Disponible: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cupodis']))
                  {
                      $Campos_Erros['cupodis'] = array();
                  }
                  $Campos_Erros['cupodis'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cupodis']) || !is_array($this->NM_ajax_info['errList']['cupodis']))
                  {
                      $this->NM_ajax_info['errList']['cupodis'] = array();
                  }
                  $this->NM_ajax_info['errList']['cupodis'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cupodis, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cupo Disponible; " ; 
                  if (!isset($Campos_Erros['cupodis']))
                  {
                      $Campos_Erros['cupodis'] = array();
                  }
                  $Campos_Erros['cupodis'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cupodis']) || !is_array($this->NM_ajax_info['errList']['cupodis']))
                  {
                      $this->NM_ajax_info['errList']['cupodis'] = array();
                  }
                  $this->NM_ajax_info['errList']['cupodis'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cupodis';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cupodis

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
              $iTestSize = 21;
              if ('-' == substr($this->cupo, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->cupo, -1))
              {
                  $iTestSize++;
                  $this->cupo = '-' . substr($this->cupo, 0, -1);
              }
              if (strlen($this->cupo) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cupo Asignado al Cliente: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->cupo, 20, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cupo Asignado al Cliente; " ; 
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
                  $Campos_Crit .= "SUBTOTAL: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->subtotal, 10, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "SUBTOTAL; " ; 
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
                  $Campos_Crit .= "VALOR DEL IVA: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->valoriva, 8, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "VALOR DEL IVA; " ; 
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
                  $Campos_Crit .= "TOTAL DE LA NOTA: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->total, 10, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "TOTAL DE LA NOTA; " ; 
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

    function ValidateField_adicional(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->adicional === "" || is_null($this->adicional))  
      { 
          $this->adicional = 0;
          $this->sc_force_zero[] = 'adicional';
      } 
      if (!empty($this->field_config['adicional']['symbol_dec']))
      {
          $this->sc_remove_currency($this->adicional, $this->field_config['adicional']['symbol_dec'], $this->field_config['adicional']['symbol_grp'], $this->field_config['adicional']['symbol_mon']); 
          nm_limpa_valor($this->adicional, $this->field_config['adicional']['symbol_dec'], $this->field_config['adicional']['symbol_grp']) ; 
          if ('.' == substr($this->adicional, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->adicional, 1)))
              {
                  $this->adicional = '';
              }
              else
              {
                  $this->adicional = '0' . $this->adicional;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->adicional != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->adicional) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['adicional']))
                  {
                      $Campos_Erros['adicional'] = array();
                  }
                  $Campos_Erros['adicional'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['adicional']) || !is_array($this->NM_ajax_info['errList']['adicional']))
                  {
                      $this->NM_ajax_info['errList']['adicional'] = array();
                  }
                  $this->NM_ajax_info['errList']['adicional'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->adicional, 9, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "; " ; 
                  if (!isset($Campos_Erros['adicional']))
                  {
                      $Campos_Erros['adicional'] = array();
                  }
                  $Campos_Erros['adicional'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['adicional']) || !is_array($this->NM_ajax_info['errList']['adicional']))
                  {
                      $this->NM_ajax_info['errList']['adicional'] = array();
                  }
                  $this->NM_ajax_info['errList']['adicional'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'adicional';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_adicional

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
                  $Campos_Crit .= ": " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->saldo, 10, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "; " ; 
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

    function ValidateField_retefuente(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->retefuente) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_retefuente']) && !in_array($this->retefuente, $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_retefuente']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['retefuente']))
                   {
                       $Campos_Erros['retefuente'] = array();
                   }
                   $Campos_Erros['retefuente'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['retefuente']) || !is_array($this->NM_ajax_info['errList']['retefuente']))
                   {
                       $this->NM_ajax_info['errList']['retefuente'] = array();
                   }
                   $this->NM_ajax_info['errList']['retefuente'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'retefuente';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_retefuente

    function ValidateField_cree(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->cree) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_cree']) && !in_array($this->cree, $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_cree']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['cree']))
                   {
                       $Campos_Erros['cree'] = array();
                   }
                   $Campos_Erros['cree'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['cree']) || !is_array($this->NM_ajax_info['errList']['cree']))
                   {
                       $this->NM_ajax_info['errList']['cree'] = array();
                   }
                   $this->NM_ajax_info['errList']['cree'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cree';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cree

    function ValidateField_reteica(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->reteica) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_reteica']) && !in_array($this->reteica, $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_reteica']))
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
                  $Campos_Crit .= "RETEIVA %:: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->reteiva, 7, 3, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "RETEIVA %:; " ; 
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

    function ValidateField_imconsumo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->imconsumo === "" || is_null($this->imconsumo))  
      { 
          $this->imconsumo = 0;
          $this->sc_force_zero[] = 'imconsumo';
      } 
      if (!empty($this->field_config['imconsumo']['symbol_dec']))
      {
          $this->sc_remove_currency($this->imconsumo, $this->field_config['imconsumo']['symbol_dec'], $this->field_config['imconsumo']['symbol_grp'], $this->field_config['imconsumo']['symbol_mon']); 
          nm_limpa_valor($this->imconsumo, $this->field_config['imconsumo']['symbol_dec'], $this->field_config['imconsumo']['symbol_grp']) ; 
          if ('.' == substr($this->imconsumo, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->imconsumo, 1)))
              {
                  $this->imconsumo = '';
              }
              else
              {
                  $this->imconsumo = '0' . $this->imconsumo;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->imconsumo != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->imconsumo) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Imconsumo: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['imconsumo']))
                  {
                      $Campos_Erros['imconsumo'] = array();
                  }
                  $Campos_Erros['imconsumo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['imconsumo']) || !is_array($this->NM_ajax_info['errList']['imconsumo']))
                  {
                      $this->NM_ajax_info['errList']['imconsumo'] = array();
                  }
                  $this->NM_ajax_info['errList']['imconsumo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->imconsumo, 8, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Imconsumo; " ; 
                  if (!isset($Campos_Erros['imconsumo']))
                  {
                      $Campos_Erros['imconsumo'] = array();
                  }
                  $Campos_Erros['imconsumo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['imconsumo']) || !is_array($this->NM_ajax_info['errList']['imconsumo']))
                  {
                      $this->NM_ajax_info['errList']['imconsumo'] = array();
                  }
                  $this->NM_ajax_info['errList']['imconsumo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'imconsumo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_imconsumo

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
    $this->nmgp_dados_form['tipo'] = $this->tipo;
    $this->nmgp_dados_form['resolucion'] = $this->resolucion;
    $this->nmgp_dados_form['numfacven'] = $this->numfacven;
    $this->nmgp_dados_form['pedido'] = $this->pedido;
    $this->nmgp_dados_form['fechaven'] = (strlen(trim($this->fechaven)) > 19) ? str_replace(".", ":", $this->fechaven) : trim($this->fechaven);
    $this->nmgp_dados_form['asentada'] = $this->asentada;
    $this->nmgp_dados_form['dias_decredito'] = $this->dias_decredito;
    $this->nmgp_dados_form['fechavenc'] = (strlen(trim($this->fechavenc)) > 19) ? str_replace(".", ":", $this->fechavenc) : trim($this->fechavenc);
    $this->nmgp_dados_form['pagada'] = $this->pagada;
    $this->nmgp_dados_form['pref_pedido'] = $this->pref_pedido;
    $this->nmgp_dados_form['prefijo_fac'] = $this->prefijo_fac;
    $this->nmgp_dados_form['num_fac'] = $this->num_fac;
    $this->nmgp_dados_form['id_fact'] = $this->id_fact;
    $this->nmgp_dados_form['idcli'] = $this->idcli;
    $this->nmgp_dados_form['direccion'] = $this->direccion;
    $this->nmgp_dados_form['dircliente'] = $this->dircliente;
    $this->nmgp_dados_form['vendedor'] = $this->vendedor;
    $this->nmgp_dados_form['credito'] = $this->credito;
    $this->nmgp_dados_form['mot_nc'] = $this->mot_nc;
    $this->nmgp_dados_form['mot_nd'] = $this->mot_nd;
    $this->nmgp_dados_form['observaciones'] = $this->observaciones;
    $this->nmgp_dados_form['nremision'] = $this->nremision;
    $this->nmgp_dados_form['cupodis'] = $this->cupodis;
    $this->nmgp_dados_form['cupo'] = $this->cupo;
    $this->nmgp_dados_form['subtotal'] = $this->subtotal;
    $this->nmgp_dados_form['valoriva'] = $this->valoriva;
    $this->nmgp_dados_form['total'] = $this->total;
    $this->nmgp_dados_form['adicional'] = $this->adicional;
    $this->nmgp_dados_form['saldo'] = $this->saldo;
    $this->nmgp_dados_form['idfacven'] = $this->idfacven;
    $this->nmgp_dados_form['retefuente'] = $this->retefuente;
    $this->nmgp_dados_form['cree'] = $this->cree;
    $this->nmgp_dados_form['reteica'] = $this->reteica;
    $this->nmgp_dados_form['reteiva'] = $this->reteiva;
    $this->nmgp_dados_form['imconsumo'] = $this->imconsumo;
    $this->nmgp_dados_form['detalle'] = $this->detalle;
    $this->nmgp_dados_form['formapago'] = $this->formapago;
    $this->nmgp_dados_form['adicional2'] = $this->adicional2;
    $this->nmgp_dados_form['adicional3'] = $this->adicional3;
    $this->nmgp_dados_form['obspago'] = $this->obspago;
    $this->nmgp_dados_form['espos'] = $this->espos;
    $this->nmgp_dados_form['cufe'] = $this->cufe;
    $this->nmgp_dados_form['enlacepdf'] = $this->enlacepdf;
    $this->nmgp_dados_form['estado'] = $this->estado;
    $this->nmgp_dados_form['avisos'] = $this->avisos;
    $this->nmgp_dados_form['creado'] = $this->creado;
    $this->nmgp_dados_form['editado'] = $this->editado;
    $this->nmgp_dados_form['usuario_crea'] = $this->usuario_crea;
    $this->nmgp_dados_form['banco'] = $this->banco;
    $this->nmgp_dados_form['enviada_a_tns'] = $this->enviada_a_tns;
    $this->nmgp_dados_form['fecha_a_tns'] = $this->fecha_a_tns;
    $this->nmgp_dados_form['factura_tns'] = $this->factura_tns;
    $this->nmgp_dados_form['creado_en_movil'] = $this->creado_en_movil;
    $this->nmgp_dados_form['disponible_en_movil'] = $this->disponible_en_movil;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['numfacven'] = $this->numfacven;
      nm_limpa_numero($this->numfacven, $this->field_config['numfacven']['symbol_grp']) ; 
      $this->Before_unformat['fechaven'] = $this->fechaven;
      nm_limpa_data($this->fechaven, $this->field_config['fechaven']['date_sep']) ; 
      $this->Before_unformat['dias_decredito'] = $this->dias_decredito;
      nm_limpa_numero($this->dias_decredito, $this->field_config['dias_decredito']['symbol_grp']) ; 
      $this->Before_unformat['fechavenc'] = $this->fechavenc;
      nm_limpa_data($this->fechavenc, $this->field_config['fechavenc']['date_sep']) ; 
      $this->Before_unformat['id_fact'] = $this->id_fact;
      nm_limpa_numero($this->id_fact, $this->field_config['id_fact']['symbol_grp']) ; 
      $this->Before_unformat['nremision'] = $this->nremision;
      nm_limpa_numero($this->nremision, $this->field_config['nremision']['symbol_grp']) ; 
      $this->Before_unformat['cupodis'] = $this->cupodis;
      if (!empty($this->field_config['cupodis']['symbol_dec']))
      {
         $this->sc_remove_currency($this->cupodis, $this->field_config['cupodis']['symbol_dec'], $this->field_config['cupodis']['symbol_grp'], $this->field_config['cupodis']['symbol_mon']);
         nm_limpa_valor($this->cupodis, $this->field_config['cupodis']['symbol_dec'], $this->field_config['cupodis']['symbol_grp']);
      }
      $this->Before_unformat['cupo'] = $this->cupo;
      if (!empty($this->field_config['cupo']['symbol_dec']))
      {
         $this->sc_remove_currency($this->cupo, $this->field_config['cupo']['symbol_dec'], $this->field_config['cupo']['symbol_grp'], $this->field_config['cupo']['symbol_mon']);
         nm_limpa_valor($this->cupo, $this->field_config['cupo']['symbol_dec'], $this->field_config['cupo']['symbol_grp']);
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
      $this->Before_unformat['total'] = $this->total;
      if (!empty($this->field_config['total']['symbol_dec']))
      {
         $this->sc_remove_currency($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp'], $this->field_config['total']['symbol_mon']);
         nm_limpa_valor($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp']);
      }
      $this->Before_unformat['adicional'] = $this->adicional;
      if (!empty($this->field_config['adicional']['symbol_dec']))
      {
         $this->sc_remove_currency($this->adicional, $this->field_config['adicional']['symbol_dec'], $this->field_config['adicional']['symbol_grp'], $this->field_config['adicional']['symbol_mon']);
         nm_limpa_valor($this->adicional, $this->field_config['adicional']['symbol_dec'], $this->field_config['adicional']['symbol_grp']);
      }
      $this->Before_unformat['saldo'] = $this->saldo;
      if (!empty($this->field_config['saldo']['symbol_dec']))
      {
         $this->sc_remove_currency($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp'], $this->field_config['saldo']['symbol_mon']);
         nm_limpa_valor($this->saldo, $this->field_config['saldo']['symbol_dec'], $this->field_config['saldo']['symbol_grp']);
      }
      $this->Before_unformat['idfacven'] = $this->idfacven;
      nm_limpa_numero($this->idfacven, $this->field_config['idfacven']['symbol_grp']) ; 
      $this->Before_unformat['reteiva'] = $this->reteiva;
      if (!empty($this->field_config['reteiva']['symbol_dec']))
      {
         nm_limpa_valor($this->reteiva, $this->field_config['reteiva']['symbol_dec'], $this->field_config['reteiva']['symbol_grp']);
      }
      $this->Before_unformat['imconsumo'] = $this->imconsumo;
      if (!empty($this->field_config['imconsumo']['symbol_dec']))
      {
         $this->sc_remove_currency($this->imconsumo, $this->field_config['imconsumo']['symbol_dec'], $this->field_config['imconsumo']['symbol_grp'], $this->field_config['imconsumo']['symbol_mon']);
         nm_limpa_valor($this->imconsumo, $this->field_config['imconsumo']['symbol_dec'], $this->field_config['imconsumo']['symbol_grp']);
      }
      $this->Before_unformat['adicional2'] = $this->adicional2;
      nm_limpa_numero($this->adicional2, $this->field_config['adicional2']['symbol_grp']) ; 
      $this->Before_unformat['adicional3'] = $this->adicional3;
      nm_limpa_numero($this->adicional3, $this->field_config['adicional3']['symbol_grp']) ; 
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
      $this->Before_unformat['banco'] = $this->banco;
      nm_limpa_numero($this->banco, $this->field_config['banco']['symbol_grp']) ; 
      $this->Before_unformat['fecha_a_tns'] = $this->fecha_a_tns;
      $this->Before_unformat['fecha_a_tns_hora'] = $this->fecha_a_tns_hora;
      nm_limpa_data($this->fecha_a_tns, $this->field_config['fecha_a_tns']['date_sep']) ; 
      nm_limpa_hora($this->fecha_a_tns_hora, $this->field_config['fecha_a_tns']['time_sep']) ; 
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
      if ($Nome_Campo == "numfacven")
      {
          nm_limpa_numero($this->numfacven, $this->field_config['numfacven']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dias_decredito")
      {
          nm_limpa_numero($this->dias_decredito, $this->field_config['dias_decredito']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_fact")
      {
          nm_limpa_numero($this->id_fact, $this->field_config['id_fact']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "nremision")
      {
          nm_limpa_numero($this->nremision, $this->field_config['nremision']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "cupodis")
      {
          if (!empty($this->field_config['cupodis']['symbol_dec']))
          {
             $this->sc_remove_currency($this->cupodis, $this->field_config['cupodis']['symbol_dec'], $this->field_config['cupodis']['symbol_grp'], $this->field_config['cupodis']['symbol_mon']);
             nm_limpa_valor($this->cupodis, $this->field_config['cupodis']['symbol_dec'], $this->field_config['cupodis']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "cupo")
      {
          if (!empty($this->field_config['cupo']['symbol_dec']))
          {
             $this->sc_remove_currency($this->cupo, $this->field_config['cupo']['symbol_dec'], $this->field_config['cupo']['symbol_grp'], $this->field_config['cupo']['symbol_mon']);
             nm_limpa_valor($this->cupo, $this->field_config['cupo']['symbol_dec'], $this->field_config['cupo']['symbol_grp']);
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
      if ($Nome_Campo == "total")
      {
          if (!empty($this->field_config['total']['symbol_dec']))
          {
             $this->sc_remove_currency($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp'], $this->field_config['total']['symbol_mon']);
             nm_limpa_valor($this->total, $this->field_config['total']['symbol_dec'], $this->field_config['total']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "adicional")
      {
          if (!empty($this->field_config['adicional']['symbol_dec']))
          {
             $this->sc_remove_currency($this->adicional, $this->field_config['adicional']['symbol_dec'], $this->field_config['adicional']['symbol_grp'], $this->field_config['adicional']['symbol_mon']);
             nm_limpa_valor($this->adicional, $this->field_config['adicional']['symbol_dec'], $this->field_config['adicional']['symbol_grp']);
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
      if ($Nome_Campo == "idfacven")
      {
          nm_limpa_numero($this->idfacven, $this->field_config['idfacven']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "reteiva")
      {
          if (!empty($this->field_config['reteiva']['symbol_dec']))
          {
             nm_limpa_valor($this->reteiva, $this->field_config['reteiva']['symbol_dec'], $this->field_config['reteiva']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "imconsumo")
      {
          if (!empty($this->field_config['imconsumo']['symbol_dec']))
          {
             $this->sc_remove_currency($this->imconsumo, $this->field_config['imconsumo']['symbol_dec'], $this->field_config['imconsumo']['symbol_grp'], $this->field_config['imconsumo']['symbol_mon']);
             nm_limpa_valor($this->imconsumo, $this->field_config['imconsumo']['symbol_dec'], $this->field_config['imconsumo']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "adicional2")
      {
          nm_limpa_numero($this->adicional2, $this->field_config['adicional2']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "adicional3")
      {
          nm_limpa_numero($this->adicional3, $this->field_config['adicional3']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "usuario_crea")
      {
          nm_limpa_numero($this->usuario_crea, $this->field_config['usuario_crea']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "banco")
      {
          nm_limpa_numero($this->banco, $this->field_config['banco']['symbol_grp']) ; 
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
      if ('' !== $this->numfacven || (!empty($format_fields) && isset($format_fields['numfacven'])))
      {
          nmgp_Form_Num_Val($this->numfacven, $this->field_config['numfacven']['symbol_grp'], $this->field_config['numfacven']['symbol_dec'], "0", "S", $this->field_config['numfacven']['format_neg'], "", "", "-", $this->field_config['numfacven']['symbol_fmt']) ; 
      }
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
      if ((!empty($this->fechavenc) && 'null' != $this->fechavenc) || (!empty($format_fields) && isset($format_fields['fechavenc'])))
      {
          nm_volta_data($this->fechavenc, $this->field_config['fechavenc']['date_format']) ; 
          nmgp_Form_Datas($this->fechavenc, $this->field_config['fechavenc']['date_format'], $this->field_config['fechavenc']['date_sep']) ;  
      }
      elseif ('null' == $this->fechavenc || '' == $this->fechavenc)
      {
          $this->fechavenc = '';
      }
      if ('' !== $this->id_fact || (!empty($format_fields) && isset($format_fields['id_fact'])))
      {
          nmgp_Form_Num_Val($this->id_fact, $this->field_config['id_fact']['symbol_grp'], $this->field_config['id_fact']['symbol_dec'], "0", "S", $this->field_config['id_fact']['format_neg'], "", "", "-", $this->field_config['id_fact']['symbol_fmt']) ; 
      }
      if ('' !== $this->nremision || (!empty($format_fields) && isset($format_fields['nremision'])))
      {
          nmgp_Form_Num_Val($this->nremision, $this->field_config['nremision']['symbol_grp'], $this->field_config['nremision']['symbol_dec'], "0", "S", $this->field_config['nremision']['format_neg'], "", "", "-", $this->field_config['nremision']['symbol_fmt']) ; 
      }
      if ('' !== $this->cupodis || (!empty($format_fields) && isset($format_fields['cupodis'])))
      {
          nmgp_Form_Num_Val($this->cupodis, $this->field_config['cupodis']['symbol_grp'], $this->field_config['cupodis']['symbol_dec'], "0", "S", $this->field_config['cupodis']['format_neg'], "", "", "-", $this->field_config['cupodis']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['cupodis']['symbol_mon'];
          $this->sc_add_currency($this->cupodis, $sMonSymb, $this->field_config['cupodis']['format_pos']); 
      }
      if ('' !== $this->cupo || (!empty($format_fields) && isset($format_fields['cupo'])))
      {
          nmgp_Form_Num_Val($this->cupo, $this->field_config['cupo']['symbol_grp'], $this->field_config['cupo']['symbol_dec'], "0", "S", $this->field_config['cupo']['format_neg'], "", "", "-", $this->field_config['cupo']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['cupo']['symbol_mon'];
          $this->sc_add_currency($this->cupo, $sMonSymb, $this->field_config['cupo']['format_pos']); 
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
      }
      if ('' !== $this->adicional || (!empty($format_fields) && isset($format_fields['adicional'])))
      {
          nmgp_Form_Num_Val($this->adicional, $this->field_config['adicional']['symbol_grp'], $this->field_config['adicional']['symbol_dec'], "2", "S", $this->field_config['adicional']['format_neg'], "", "", "-", $this->field_config['adicional']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['adicional']['symbol_mon'];
          $this->sc_add_currency($this->adicional, $sMonSymb, $this->field_config['adicional']['format_pos']); 
      }
      if ('' !== $this->saldo || (!empty($format_fields) && isset($format_fields['saldo'])))
      {
          nmgp_Form_Num_Val($this->saldo, $this->field_config['saldo']['symbol_grp'], $this->field_config['saldo']['symbol_dec'], "2", "S", $this->field_config['saldo']['format_neg'], "", "", "-", $this->field_config['saldo']['symbol_fmt']) ; 
      }
      if ('' !== $this->idfacven || (!empty($format_fields) && isset($format_fields['idfacven'])))
      {
          nmgp_Form_Num_Val($this->idfacven, $this->field_config['idfacven']['symbol_grp'], $this->field_config['idfacven']['symbol_dec'], "0", "S", $this->field_config['idfacven']['format_neg'], "", "", "-", $this->field_config['idfacven']['symbol_fmt']) ; 
      }
      if ('' !== $this->reteiva || (!empty($format_fields) && isset($format_fields['reteiva'])))
      {
          nmgp_Form_Num_Val($this->reteiva, $this->field_config['reteiva']['symbol_grp'], $this->field_config['reteiva']['symbol_dec'], "3", "S", $this->field_config['reteiva']['format_neg'], "", "", "-", $this->field_config['reteiva']['symbol_fmt']) ; 
      }
      if ('' !== $this->imconsumo || (!empty($format_fields) && isset($format_fields['imconsumo'])))
      {
          nmgp_Form_Num_Val($this->imconsumo, $this->field_config['imconsumo']['symbol_grp'], $this->field_config['imconsumo']['symbol_dec'], "2", "S", $this->field_config['imconsumo']['format_neg'], "", "", "-", $this->field_config['imconsumo']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['imconsumo']['symbol_mon'];
          $this->sc_add_currency($this->imconsumo, $sMonSymb, $this->field_config['imconsumo']['format_pos']); 
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
          $this->ajax_return_values_tipo();
          $this->ajax_return_values_resolucion();
          $this->ajax_return_values_numfacven();
          $this->ajax_return_values_pedido();
          $this->ajax_return_values_fechaven();
          $this->ajax_return_values_asentada();
          $this->ajax_return_values_dias_decredito();
          $this->ajax_return_values_fechavenc();
          $this->ajax_return_values_pagada();
          $this->ajax_return_values_pref_pedido();
          $this->ajax_return_values_prefijo_fac();
          $this->ajax_return_values_num_fac();
          $this->ajax_return_values_id_fact();
          $this->ajax_return_values_idcli();
          $this->ajax_return_values_direccion();
          $this->ajax_return_values_dircliente();
          $this->ajax_return_values_vendedor();
          $this->ajax_return_values_credito();
          $this->ajax_return_values_mot_nc();
          $this->ajax_return_values_mot_nd();
          $this->ajax_return_values_observaciones();
          $this->ajax_return_values_nremision();
          $this->ajax_return_values_cupodis();
          $this->ajax_return_values_cupo();
          $this->ajax_return_values_subtotal();
          $this->ajax_return_values_valoriva();
          $this->ajax_return_values_total();
          $this->ajax_return_values_adicional();
          $this->ajax_return_values_saldo();
          $this->ajax_return_values_idfacven();
          $this->ajax_return_values_retefuente();
          $this->ajax_return_values_cree();
          $this->ajax_return_values_reteica();
          $this->ajax_return_values_reteiva();
          $this->ajax_return_values_imconsumo();
          $this->ajax_return_values_detalle();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idfacven']['keyVal'] = form_notas_pack_protect_string($this->nmgp_dados_form['idfacven']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['form_detalle_notasDC_script_case_init'] ]['form_detalle_notasDC']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['form_detalle_notasDC_script_case_init'] ]['form_detalle_notasDC']['total']);
          }
   } // ajax_return_values

          //----- tipo
   function ajax_return_values_tipo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo);
              $aLookup = array();
              $this->_tmp_lookup_tipo = $this->tipo;

$aLookup[] = array(form_notas_pack_protect_string('NC') => str_replace('<', '&lt;',form_notas_pack_protect_string("NOTA CRÉDITO")));
$aLookup[] = array(form_notas_pack_protect_string('ND') => str_replace('<', '&lt;',form_notas_pack_protect_string("NOTA DÉBITO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_tipo'][] = 'NC';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_tipo'][] = 'ND';
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
              $this->NM_ajax_info['fldList']['tipo']['valList'][$i] = form_notas_pack_protect_string($v);
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

          //----- resolucion
   function ajax_return_values_resolucion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("resolucion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->resolucion);
              $aLookup = array();
              $this->_tmp_lookup_resolucion = $this->resolucion;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_resolucion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_resolucion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_resolucion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_resolucion'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   $nm_comando = "SELECT Idres, prefijo  FROM resdian  where resolucion<>0 AND if('$this->tipo'='NC',pref_ncr='SI' ,pref_ndb='SI') ORDER BY prefijo";

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_resolucion'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['resolucion']['valList'][$i] = form_notas_pack_protect_string($v);
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
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['numfacven'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- pedido
   function ajax_return_values_pedido($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pedido", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pedido);
              $aLookup = array();
              $this->_tmp_lookup_pedido = $this->pedido;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_pedido']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_pedido'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_pedido']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_pedido'] = array(); 
}
$aLookup[] = array(form_notas_pack_protect_string('') => str_replace('<', '&lt;',form_notas_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_pedido'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo + \" - \" + pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc='PV' ORDER BY idpedido DESC";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idpedido, concat(resdian.prefijo, \" - \", pedidos.numpedido)  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc='PV' ORDER BY idpedido DESC";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo&\" - \"&pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc='PV' ORDER BY idpedido DESC";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo||\" - \"||pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc='PV' ORDER BY idpedido DESC";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo + \" - \" + pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc='PV' ORDER BY idpedido DESC";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo||\" - \"||pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc='PV' ORDER BY idpedido DESC";
   }
   else
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo||\" - \"||pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc='PV' ORDER BY idpedido DESC";
   }

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_pedido'][] = $rs->fields[0];
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
          $sSelComp = "name=\"pedido\"";
          if (isset($this->NM_ajax_info['select_html']['pedido']) && !empty($this->NM_ajax_info['select_html']['pedido']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['pedido']);
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

                  if ($this->pedido == $sValue)
                  {
                      $this->_tmp_lookup_pedido = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['pedido'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['pedido']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['pedido']['valList'][$i] = form_notas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['pedido']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['pedido']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['pedido']['labList'] = $aLabel;
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

          //----- asentada
   function ajax_return_values_asentada($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("asentada", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->asentada);
              $aLookup = array();
              $this->_tmp_lookup_asentada = $this->asentada;

$aLookup[] = array(form_notas_pack_protect_string('0') => str_replace('<', '&lt;',form_notas_pack_protect_string("No")));
$aLookup[] = array(form_notas_pack_protect_string('1') => str_replace('<', '&lt;',form_notas_pack_protect_string("Sí")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_asentada'][] = '0';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_asentada'][] = '1';
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
              $this->NM_ajax_info['fldList']['asentada']['valList'][$i] = form_notas_pack_protect_string($v);
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

          //----- pref_pedido
   function ajax_return_values_pref_pedido($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pref_pedido", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pref_pedido);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pref_pedido'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- prefijo_fac
   function ajax_return_values_prefijo_fac($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("prefijo_fac", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->prefijo_fac);
              $aLookup = array();
              $this->_tmp_lookup_prefijo_fac = $this->prefijo_fac;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_prefijo_fac']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_prefijo_fac'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_prefijo_fac']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_prefijo_fac'] = array(); 
}
$aLookup[] = array(form_notas_pack_protect_string('') => str_replace('<', '&lt;',form_notas_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_prefijo_fac'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   $nm_comando = "SELECT Idres, concat(prefijo,' - Vencer ',fec_vencimiento)  FROM resdian  WHERE pref_factura='SI' ORDER BY prefijo";

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_prefijo_fac'][] = $rs->fields[0];
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
          $sSelComp = "name=\"prefijo_fac\"";
          if (isset($this->NM_ajax_info['select_html']['prefijo_fac']) && !empty($this->NM_ajax_info['select_html']['prefijo_fac']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['prefijo_fac']);
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

                  if ($this->prefijo_fac == $sValue)
                  {
                      $this->_tmp_lookup_prefijo_fac = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['prefijo_fac'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['prefijo_fac']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['prefijo_fac']['valList'][$i] = form_notas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['prefijo_fac']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['prefijo_fac']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['prefijo_fac']['labList'] = $aLabel;
          }
   }

          //----- num_fac
   function ajax_return_values_num_fac($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("num_fac", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->num_fac);
              $aLookup = array();
              $this->_tmp_lookup_num_fac = $this->num_fac;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_num_fac']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_num_fac'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_num_fac']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_num_fac'] = array(); 
}
$aLookup[] = array(form_notas_pack_protect_string('') => str_replace('<', '&lt;',form_notas_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_num_fac'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   $nm_comando = "SELECT idfacven, numfacven  FROM facturaven  where tipo= 'FV'  and resolucion = '".$this->prefijo_fac."'";

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

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
              $aLookup[] = array(form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_num_fac'][] = $rs->fields[0];
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
          $sSelComp = "name=\"num_fac\"";
          if (isset($this->NM_ajax_info['select_html']['num_fac']) && !empty($this->NM_ajax_info['select_html']['num_fac']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['num_fac']);
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

                  if ($this->num_fac == $sValue)
                  {
                      $this->_tmp_lookup_num_fac = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['num_fac'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['num_fac']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['num_fac']['valList'][$i] = form_notas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['num_fac']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['num_fac']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['num_fac']['labList'] = $aLabel;
          }
   }

          //----- id_fact
   function ajax_return_values_id_fact($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_fact", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_fact);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_fact'] = array(
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_idcli']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_idcli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_idcli']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_idcli'] = array(); 
}
$aLookup[] = array(form_notas_pack_protect_string('') => str_replace('<', '&lt;',form_notas_pack_protect_string('Seleccione')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_idcli'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   $nm_comando = "SELECT idtercero, concat(documento,\" - \", nombres)  FROM terceros  ORDER BY nombres ASC";

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_idcli'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['idcli']['valList'][$i] = form_notas_pack_protect_string($v);
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

          //----- direccion
   function ajax_return_values_direccion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("direccion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->direccion);
              $aLookup = array();
              $this->_tmp_lookup_direccion = $this->direccion;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_direccion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_direccion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_direccion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_direccion'] = array(); 
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

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   $nm_comando = "SELECT iddireccion, direc  FROM direccion  WHERE idter='$this->idcli' ORDER BY direc";

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_direccion'][] = $rs->fields[0];
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
          $sSelComp = "name=\"direccion\"";
          if (isset($this->NM_ajax_info['select_html']['direccion']) && !empty($this->NM_ajax_info['select_html']['direccion']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['direccion']);
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

                  if ($this->direccion == $sValue)
                  {
                      $this->_tmp_lookup_direccion = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['direccion'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['direccion']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['direccion']['valList'][$i] = form_notas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['direccion']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['direccion']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['direccion']['labList'] = $aLabel;
          }
   }

          //----- dircliente
   function ajax_return_values_dircliente($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dircliente", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->dircliente);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['dircliente'] = array(
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
              $this->_tmp_lookup_vendedor = $this->vendedor;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_vendedor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_vendedor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_vendedor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_vendedor'] = array(); 
    }

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idtercero, documento + \"  \" + nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->vendedor), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idtercero, concat(documento, \"  \",nombres) FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->vendedor), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idtercero, documento&\"  \"&nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->vendedor), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idtercero, documento||\"  \"||nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->vendedor), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idtercero, documento + \"  \" + nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->vendedor), 1, -1) . " ORDER BY documento, nombres";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idtercero, documento||\"  \"||nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->vendedor), 1, -1) . " ORDER BY documento, nombres";
   }
   else
   {
       $nm_comando = "SELECT idtercero, documento||\"  \"||nombres FROM terceros WHERE idtercero = " . substr($this->Db->qstr($this->vendedor), 1, -1) . " ORDER BY documento, nombres";
   }

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

   if ('' != $this->vendedor && '' != $this->vendedor && '' != $this->vendedor && '' != $this->vendedor && '' != $this->vendedor && '' != $this->vendedor && '' != $this->vendedor)
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
              $aLookup[] = array(form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_vendedor'][] = $rs->fields[0];
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
          $this->NM_ajax_info['fldList']['vendedor'] = array(
                       'row'    => '',
               'type'    => 'select2_ac',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['vendedor']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['vendedor']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['vendedor']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][form_notas_pack_protect_string(NM_charset_to_utf8($this->vendedor))]) ? $aLookup[0][form_notas_pack_protect_string(NM_charset_to_utf8($this->vendedor))] : "";
          $this->NM_ajax_info['fldList']['vendedor_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
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

$aLookup[] = array(form_notas_pack_protect_string('2') => str_replace('<', '&lt;',form_notas_pack_protect_string("No")));
$aLookup[] = array(form_notas_pack_protect_string('1') => str_replace('<', '&lt;',form_notas_pack_protect_string("Sí")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_credito'][] = '2';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_credito'][] = '1';
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
              $this->NM_ajax_info['fldList']['credito']['valList'][$i] = form_notas_pack_protect_string($v);
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

          //----- mot_nc
   function ajax_return_values_mot_nc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("mot_nc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->mot_nc);
              $aLookup = array();
              $this->_tmp_lookup_mot_nc = $this->mot_nc;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nc']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nc'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nc']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nc'] = array(); 
}
$aLookup[] = array(form_notas_pack_protect_string('') => str_replace('<', '&lt;',form_notas_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nc'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   $nm_comando = "SELECT cod_motivo_nc, motivo_desc  FROM motivo_notas_credito  ORDER BY motivo_desc";

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nc'][] = $rs->fields[0];
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
          $sSelComp = "name=\"mot_nc\"";
          if (isset($this->NM_ajax_info['select_html']['mot_nc']) && !empty($this->NM_ajax_info['select_html']['mot_nc']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['mot_nc']);
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

                  if ($this->mot_nc == $sValue)
                  {
                      $this->_tmp_lookup_mot_nc = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['mot_nc'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['mot_nc']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['mot_nc']['valList'][$i] = form_notas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['mot_nc']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['mot_nc']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['mot_nc']['labList'] = $aLabel;
          }
   }

          //----- mot_nd
   function ajax_return_values_mot_nd($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("mot_nd", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->mot_nd);
              $aLookup = array();
              $this->_tmp_lookup_mot_nd = $this->mot_nd;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nd']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nd'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nd']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nd'] = array(); 
}
$aLookup[] = array(form_notas_pack_protect_string('') => str_replace('<', '&lt;',form_notas_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nd'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   $nm_comando = "SELECT cod_motivo_nd, motivo_desc  FROM motivo_notas_debito  ORDER BY motivo_desc";

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nd'][] = $rs->fields[0];
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
          $sSelComp = "name=\"mot_nd\"";
          if (isset($this->NM_ajax_info['select_html']['mot_nd']) && !empty($this->NM_ajax_info['select_html']['mot_nd']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['mot_nd']);
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

                  if ($this->mot_nd == $sValue)
                  {
                      $this->_tmp_lookup_mot_nd = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['mot_nd'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['mot_nd']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['mot_nd']['valList'][$i] = form_notas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['mot_nd']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['mot_nd']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['mot_nd']['labList'] = $aLabel;
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

          //----- nremision
   function ajax_return_values_nremision($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nremision", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nremision);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nremision'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cupodis
   function ajax_return_values_cupodis($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cupodis", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cupodis);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cupodis'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
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
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
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

          //----- adicional
   function ajax_return_values_adicional($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("adicional", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->adicional);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['adicional'] = array(
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

          //----- retefuente
   function ajax_return_values_retefuente($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("retefuente", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->retefuente);
              $aLookup = array();
              $this->_tmp_lookup_retefuente = $this->retefuente;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_retefuente']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_retefuente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_retefuente']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_retefuente'] = array(); 
}
$aLookup[] = array(form_notas_pack_protect_string('0.000') => str_replace('<', '&lt;',form_notas_pack_protect_string('%')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_retefuente'][] = '0.000';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   $nm_comando = "SELECT  porrete  FROM tiporetefuente  ORDER BY id_tiporetefuente DESC";

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[0]))));
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_retefuente'][] = $rs->fields[0];
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
          $sSelComp = "name=\"retefuente\"";
          if (isset($this->NM_ajax_info['select_html']['retefuente']) && !empty($this->NM_ajax_info['select_html']['retefuente']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['retefuente']);
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

                  if ($this->retefuente == $sValue)
                  {
                      $this->_tmp_lookup_retefuente = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['retefuente'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['retefuente']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['retefuente']['valList'][$i] = form_notas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['retefuente']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['retefuente']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['retefuente']['labList'] = $aLabel;
          }
   }

          //----- cree
   function ajax_return_values_cree($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cree", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cree);
              $aLookup = array();
              $this->_tmp_lookup_cree = $this->cree;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_cree']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_cree'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_cree']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_cree'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   $nm_comando = "SELECT  porcntajeauto  FROM tipoautoretencion  ORDER BY id_autoret DESC";

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[0]))));
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_cree'][] = $rs->fields[0];
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
          $sSelComp = "name=\"cree\"";
          if (isset($this->NM_ajax_info['select_html']['cree']) && !empty($this->NM_ajax_info['select_html']['cree']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['cree']);
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

                  if ($this->cree == $sValue)
                  {
                      $this->_tmp_lookup_cree = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['cree'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['cree']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['cree']['valList'][$i] = form_notas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['cree']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['cree']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['cree']['labList'] = $aLabel;
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_reteica']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_reteica'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_reteica']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_reteica'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   $nm_comando = "SELECT  porcica  FROM tipoica  ORDER BY  id_ica DESC";

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_notas_pack_protect_string(NM_charset_to_utf8($rs->fields[0]))));
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_reteica'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['reteica']['valList'][$i] = form_notas_pack_protect_string($v);
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

          //----- imconsumo
   function ajax_return_values_imconsumo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("imconsumo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->imconsumo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['imconsumo'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("imconsumo", $this->form_encode_input($sTmpValue))),
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['upload_dir'][$fieldName][] = $newName;
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
       $this->NM_ajax_info['btnVars']['var_btn_imprimir_par_numfacventa'] = $this->form_encode_input($this->nmgp_dados_form['idfacven']);
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_asentada = $this->asentada;
    $original_credito = $this->credito;
    $original_cupo = $this->cupo;
    $original_cupodis = $this->cupodis;
    $original_dircliente = $this->dircliente;
    $original_direccion = $this->direccion;
    $original_id_fact = $this->id_fact;
    $original_idcli = $this->idcli;
    $original_idfacven = $this->idfacven;
    $original_mot_nc = $this->mot_nc;
    $original_mot_nd = $this->mot_nd;
    $original_num_fac = $this->num_fac;
    $original_numfacven = $this->numfacven;
    $original_pedido = $this->pedido;
    $original_pref_pedido = $this->pref_pedido;
    $original_prefijo_fac = $this->prefijo_fac;
    $original_tipo = $this->tipo;
    $original_total = $this->total;
}
if (!isset($this->sc_temp_gCupoilimitado)) {$this->sc_temp_gCupoilimitado = (isset($_SESSION['gCupoilimitado'])) ? $_SESSION['gCupoilimitado'] : "";}
  $this->sc_set_focus('idcli');
$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
$this->sc_temp_gCupoilimitado='SI';

if ($this->numfacven !="")
	{
	$vDir=$this->dircliente ;
	if($vDir>0)
		{
		 
      $nm_select = "select d.idmuni, d.direc, m.municipio from direccion d left join municipio m on  d.idmuni=m.idmun where d.iddireccion=$vDir"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_dir = array();
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
                      $this->ds_dir[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_dir = false;
          $this->ds_dir_erro = $this->Db->ErrorMsg();
      } 
;
		$this->direccion =$this->ds_dir[0][1].' - CIUDAD '.$this->ds_dir[0][2];
		}
	
		 
      $nm_select = "SELECT nufacvta FROM inventario WHERE nufacvta=$this->idfacven "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset = array();
     if ($this->idfacven != "")
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
                      $this->dataset[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset = false;
          $this->dataset_erro = $this->Db->ErrorMsg();
      } 
     } 
;
		if(!empty($this->dataset[0][0])){$num=$this->dataset[0][0];}else{$num=0;}
	    if ($num>0 OR $num==0)
			{
				$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
				$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;
			}
		else
			{
				$this->sc_ajax_javascript('nm_field_disabled', array("idcli=;fechaven=;pagada=", ""));
;
				$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
				$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "on";;
			}
	if($this->credito ==1)
		{
		$this->saldo_cliente();
		}
	
	 
      $nm_select = "SELECT resolucion, numfacven FROM facturaven WHERE idfacven=$this->id_fact "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->d_cm = array();
     if ($this->id_fact != "")
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
                      $this->d_cm[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->d_cm = false;
          $this->d_cm_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if(isset($this->d_cm[0][0]))
		{
		$this->prefijo_fac =$this->d_cm[0][0];
		$this->num_fac =$this->d_cm[0][1];
		}
	
	
	}
else
	{
	$this->sc_ajax_javascript('nm_field_disabled', array("idcli=;fechaven=;fechavenc=;credito=;pagada=", ""));
;
	$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
	$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "on";;
	}

if($this->asentada ==1)
	{
		$this->sc_ajax_javascript('nm_field_disabled', array("idcli=disabled;fechaven=disabled;fechavenc=disabled;credito=disabled;pagada=disabled;resolucion=disabled;numfacven=disabled;pedido=disabled", ""));
;
		$this->Ini->nm_hidden_blocos[5] = "off"; $this->NM_ajax_info['blockDisplay']['5'] = 'off';
		$this->NM_ajax_info['buttonDisplay']['imprimir'] = $this->nmgp_botoes["imprimir"] = "on";;
	}
elseif($this->asentada ==0)
	{
		$this->sc_ajax_javascript('nm_field_disabled', array("idcli=;fechaven=;fechavenc=;credito=;pagada=;resolucion=;numfacven=;pedido=", ""));
;
		$this->Ini->nm_hidden_blocos[5] = "on"; $this->NM_ajax_info['blockDisplay']['5'] = 'on';
		$this->NM_ajax_info['buttonDisplay']['imprimir'] = $this->nmgp_botoes["imprimir"] = "off";;
		
	}



$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "on";;
if($this->total >0)
	{
	$this->sc_ajax_javascript('nm_field_disabled', array("pedido=disabled", ""));
;
	}
if(isset($this->numfacven ))
   {
	$this->trae_prefijo_ped();
	}

if($this->tipo =='NC')
	{
	$this->nmgp_cmp_hidden["mot_nd"] = "off"; $this->NM_ajax_info['fieldDisplay']['mot_nd'] = 'off';
	$this->num_fac  = $this->id_fact ;
	$this->direccion  = $this->dircliente ;
	}
elseif($this->tipo =='ND')
	{
	$this->nmgp_cmp_hidden["mot_nc"] = "off"; $this->NM_ajax_info['fieldDisplay']['mot_nc'] = 'off';
	$this->nmgp_cmp_hidden["mot_nd"] = "on"; $this->NM_ajax_info['fieldDisplay']['mot_nd'] = 'on';
	}
else
	{
	$this->nmgp_cmp_hidden["mot_nd"] = "off"; $this->NM_ajax_info['fieldDisplay']['mot_nd'] = 'off';
	}

if(isset($this->idfacven ) or $this->idfacven >0)
	{
	 
      $nm_select = "select estado from facturaven where idfacven='".$this->idfacven ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dat_fv = array();
     if ($this->idfacven != "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dat_fv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dat_fv = false;
          $this->dat_fv_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if(isset($this->dat_fv[0][0]))
		{
		if($this->dat_fv[0][0]=='200')
			{
			$this->sc_ajax_javascript('nm_field_disabled', array("asentada=disabled", ""));
;
			$this->sc_ajax_javascript('nm_field_disabled', array("tipo=disabled", ""));
;
			$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;
			$this->NM_ajax_info['buttonDisplay']['Eliminar'] = $this->nmgp_botoes["Eliminar"] = "off";;
			$this->NM_ajax_info['buttonDisplay']['rc'] = $this->nmgp_botoes["rc"] = "off";;
			}
		else
			{
			$this->sc_ajax_javascript('nm_field_disabled', array("asentada=", ""));
;
			$this->sc_ajax_javascript('nm_field_disabled', array("tipo=", ""));
;
			$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "on";;
			$this->NM_ajax_info['buttonDisplay']['Eliminar'] = $this->nmgp_botoes["Eliminar"] = "on";;
			$this->NM_ajax_info['buttonDisplay']['rc'] = $this->nmgp_botoes["rc"] = "off";;
			}
		}
	else
		{
		$this->sc_ajax_javascript('nm_field_disabled', array("asentada=", ""));
;
		$this->sc_ajax_javascript('nm_field_disabled', array("tipo=", ""));
;
		$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "on";;
		$this->NM_ajax_info['buttonDisplay']['Eliminar'] = $this->nmgp_botoes["Eliminar"] = "on";;
		$this->NM_ajax_info['buttonDisplay']['rc'] = $this->nmgp_botoes["rc"] = "off";;
		}
	}


if($this->asentada ==1)
{
	$this->NM_ajax_info['buttonDisplay']['btn_asentar'] = $this->nmgp_botoes["btn_asentar"] = "off";;
	$this->NM_ajax_info['buttonDisplay']['btn_reversar'] = $this->nmgp_botoes["btn_reversar"] = "on";;
}
else
{
	$this->NM_ajax_info['buttonDisplay']['btn_asentar'] = $this->nmgp_botoes["btn_asentar"] = "on";;
	$this->NM_ajax_info['buttonDisplay']['btn_reversar'] = $this->nmgp_botoes["btn_reversar"] = "off";;
}
if (isset($this->sc_temp_gCupoilimitado)) { $_SESSION['gCupoilimitado'] = $this->sc_temp_gCupoilimitado;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_asentada != $this->asentada || (isset($bFlagRead_asentada) && $bFlagRead_asentada)))
    {
        $this->ajax_return_values_asentada(true);
    }
    if (($original_credito != $this->credito || (isset($bFlagRead_credito) && $bFlagRead_credito)))
    {
        $this->ajax_return_values_credito(true);
    }
    if (($original_cupo != $this->cupo || (isset($bFlagRead_cupo) && $bFlagRead_cupo)))
    {
        $this->ajax_return_values_cupo(true);
    }
    if (($original_cupodis != $this->cupodis || (isset($bFlagRead_cupodis) && $bFlagRead_cupodis)))
    {
        $this->ajax_return_values_cupodis(true);
    }
    if (($original_dircliente != $this->dircliente || (isset($bFlagRead_dircliente) && $bFlagRead_dircliente)))
    {
        $this->ajax_return_values_dircliente(true);
    }
    if (($original_direccion != $this->direccion || (isset($bFlagRead_direccion) && $bFlagRead_direccion)))
    {
        $this->ajax_return_values_direccion(true);
    }
    if (($original_id_fact != $this->id_fact || (isset($bFlagRead_id_fact) && $bFlagRead_id_fact)))
    {
        $this->ajax_return_values_id_fact(true);
    }
    if (($original_idcli != $this->idcli || (isset($bFlagRead_idcli) && $bFlagRead_idcli)))
    {
        $this->ajax_return_values_idcli(true);
    }
    if (($original_idfacven != $this->idfacven || (isset($bFlagRead_idfacven) && $bFlagRead_idfacven)))
    {
        $this->ajax_return_values_idfacven(true);
    }
    if (($original_mot_nc != $this->mot_nc || (isset($bFlagRead_mot_nc) && $bFlagRead_mot_nc)))
    {
        $this->ajax_return_values_mot_nc(true);
    }
    if (($original_mot_nd != $this->mot_nd || (isset($bFlagRead_mot_nd) && $bFlagRead_mot_nd)))
    {
        $this->ajax_return_values_mot_nd(true);
    }
    if (($original_num_fac != $this->num_fac || (isset($bFlagRead_num_fac) && $bFlagRead_num_fac)))
    {
        $this->ajax_return_values_num_fac(true);
    }
    if (($original_numfacven != $this->numfacven || (isset($bFlagRead_numfacven) && $bFlagRead_numfacven)))
    {
        $this->ajax_return_values_numfacven(true);
    }
    if (($original_pedido != $this->pedido || (isset($bFlagRead_pedido) && $bFlagRead_pedido)))
    {
        $this->ajax_return_values_pedido(true);
    }
    if (($original_pref_pedido != $this->pref_pedido || (isset($bFlagRead_pref_pedido) && $bFlagRead_pref_pedido)))
    {
        $this->ajax_return_values_pref_pedido(true);
    }
    if (($original_prefijo_fac != $this->prefijo_fac || (isset($bFlagRead_prefijo_fac) && $bFlagRead_prefijo_fac)))
    {
        $this->ajax_return_values_prefijo_fac(true);
    }
    if (($original_tipo != $this->tipo || (isset($bFlagRead_tipo) && $bFlagRead_tipo)))
    {
        $this->ajax_return_values_tipo(true);
    }
    if (($original_total != $this->total || (isset($bFlagRead_total) && $bFlagRead_total)))
    {
        $this->ajax_return_values_total(true);
    }
}
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off'; 
      }
      if (empty($this->creado))
      {
          $this->creado_hora = $this->creado;
      }
      if (empty($this->editado))
      {
          $this->editado_hora = $this->editado;
      }
      if (empty($this->fecha_a_tns))
      {
          $this->fecha_a_tns_hora = $this->fecha_a_tns;
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
      $this->cupodis = str_replace($sc_parm1, $sc_parm2, $this->cupodis); 
      $this->cupo = str_replace($sc_parm1, $sc_parm2, $this->cupo); 
      $this->subtotal = str_replace($sc_parm1, $sc_parm2, $this->subtotal); 
      $this->valoriva = str_replace($sc_parm1, $sc_parm2, $this->valoriva); 
      $this->total = str_replace($sc_parm1, $sc_parm2, $this->total); 
      $this->adicional = str_replace($sc_parm1, $sc_parm2, $this->adicional); 
      $this->saldo = str_replace($sc_parm1, $sc_parm2, $this->saldo); 
      $this->reteiva = str_replace($sc_parm1, $sc_parm2, $this->reteiva); 
      $this->imconsumo = str_replace($sc_parm1, $sc_parm2, $this->imconsumo); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->cupodis = "'" . $this->cupodis . "'";
      $this->cupo = "'" . $this->cupo . "'";
      $this->subtotal = "'" . $this->subtotal . "'";
      $this->valoriva = "'" . $this->valoriva . "'";
      $this->total = "'" . $this->total . "'";
      $this->adicional = "'" . $this->adicional . "'";
      $this->saldo = "'" . $this->saldo . "'";
      $this->reteiva = "'" . $this->reteiva . "'";
      $this->imconsumo = "'" . $this->imconsumo . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->cupodis = str_replace("'", "", $this->cupodis); 
      $this->cupo = str_replace("'", "", $this->cupo); 
      $this->subtotal = str_replace("'", "", $this->subtotal); 
      $this->valoriva = str_replace("'", "", $this->valoriva); 
      $this->total = str_replace("'", "", $this->total); 
      $this->adicional = str_replace("'", "", $this->adicional); 
      $this->saldo = str_replace("'", "", $this->saldo); 
      $this->reteiva = str_replace("'", "", $this->reteiva); 
      $this->imconsumo = str_replace("'", "", $this->imconsumo); 
   } 
//----------- 

   function return_after_insert()
   {
      global $sc_where;
      $sc_where_pos = " WHERE ((idfacven > $this->idfacven))";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start'] = $rsc->fields[0];
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
      $_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cree = $this->cree;
    $original_id_fact = $this->id_fact;
    $original_nremision = $this->nremision;
    $original_numfacven = $this->numfacven;
    $original_resolucion = $this->resolucion;
    $original_retefuente = $this->retefuente;
    $original_tipo = $this->tipo;
    $original_vendedor = $this->vendedor;
}
if (!isset($this->sc_temp_vGIdFacAfec)) {$this->sc_temp_vGIdFacAfec = (isset($_SESSION['vGIdFacAfec'])) ? $_SESSION['vGIdFacAfec'] : "";}
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
  $vIdCuadre=0;
$hoy= date('d-m-Y');
$fecha_del=date("Y-m-d", strtotime($hoy));
$this->usuario_crea =$this->sc_temp_gidtercero;

$this->banco =1;
$res=$this->resolucion ;
if(empty($this->numfacven ))
	{
	if($this->tipo =='NC')
		{
		$sql="select numfacven from facturaven where resolucion=$res and  tipo='NC' ORDER BY idfacven desc";
		}
	elseif($this->tipo =='ND')
		{
		$sql="select numfacven from facturaven where resolucion=$res and  tipo='ND' ORDER BY idfacven desc";
		}
	 
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
	if(!empty($this->ds[0][0]))
		{
		$this->numfacven =$this->ds[0][0]+1;
		}
	else
		{
		 
      $nm_select = "select primerfactura from resdian where Idres=$res"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->de = array();
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
                      $this->de[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->de = false;
          $this->de_erro = $this->Db->ErrorMsg();
      } 
;
		$fac=$this->de[0][0];
		 $this->numfacven =$fac;
		}
	}
else
	{
	if($this->tipo =='NC')
		{
		$sql1="select numfacven from facturaven where resolucion=$res and numfacven=$this->numfacven  and tipo='NC'";
		}
	elseif($this->tipo =='ND')
		{
		$sql1="select numfacven from facturaven where resolucion=$res and numfacven=$this->numfacven  and tipo='ND'";
		}
	
	 
      $nm_select = $sql1; 
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
	if(isset($this->des[0][0]))
		{
		
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "EL NÚMERO DE LA NOTA YA EXISTE!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_form_notas';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_notas';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "EL NÚMERO DE LA NOTA YA EXISTE!";
 }
;
		}
	}
$this->nremision =NULL;
$this->id_fact  = $this->sc_temp_vGIdFacAfec;
if($this->vendedor <1)
	{
	$this->vendedor =1;
	}

$this->fVerifica_Ret();
err:;
if (isset($this->sc_temp_gidtercero)) { $_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
if (isset($this->sc_temp_vGIdFacAfec)) { $_SESSION['vGIdFacAfec'] = $this->sc_temp_vGIdFacAfec;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cree != $this->cree || (isset($bFlagRead_cree) && $bFlagRead_cree)))
    {
        $this->ajax_return_values_cree(true);
    }
    if (($original_id_fact != $this->id_fact || (isset($bFlagRead_id_fact) && $bFlagRead_id_fact)))
    {
        $this->ajax_return_values_id_fact(true);
    }
    if (($original_nremision != $this->nremision || (isset($bFlagRead_nremision) && $bFlagRead_nremision)))
    {
        $this->ajax_return_values_nremision(true);
    }
    if (($original_numfacven != $this->numfacven || (isset($bFlagRead_numfacven) && $bFlagRead_numfacven)))
    {
        $this->ajax_return_values_numfacven(true);
    }
    if (($original_resolucion != $this->resolucion || (isset($bFlagRead_resolucion) && $bFlagRead_resolucion)))
    {
        $this->ajax_return_values_resolucion(true);
    }
    if (($original_retefuente != $this->retefuente || (isset($bFlagRead_retefuente) && $bFlagRead_retefuente)))
    {
        $this->ajax_return_values_retefuente(true);
    }
    if (($original_tipo != $this->tipo || (isset($bFlagRead_tipo) && $bFlagRead_tipo)))
    {
        $this->ajax_return_values_tipo(true);
    }
    if (($original_vendedor != $this->vendedor || (isset($bFlagRead_vendedor) && $bFlagRead_vendedor)))
    {
        $this->ajax_return_values_vendedor(true);
    }
}
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off'; 
    }
    if ("alterar" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cree = $this->cree;
    $original_retefuente = $this->retefuente;
}
  $this->fVerifica_Ret();

if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cree != $this->cree || (isset($bFlagRead_cree) && $bFlagRead_cree)))
    {
        $this->ajax_return_values_cree(true);
    }
    if (($original_retefuente != $this->retefuente || (isset($bFlagRead_retefuente) && $bFlagRead_retefuente)))
    {
        $this->ajax_return_values_retefuente(true);
    }
}
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off'; 
    }
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_numfacven = $this->numfacven;
}
              /* detalleventa */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM detalleventa WHERE numfac = '" . $this->numfacven  . "'";
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM detalleventa WHERE numfac = '" . $this->numfacven  . "'";
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM detalleventa WHERE numfac = '" . $this->numfacven  . "'";
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM detalleventa WHERE numfac = '" . $this->numfacven  . "'";
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM detalleventa WHERE numfac = '" . $this->numfacven  . "'";
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_detalleventa = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dataset_detalleventa[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_detalleventa = false;
          $this->dataset_detalleventa_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_detalleventa[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_form_notas';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_notas';
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
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM inventario WHERE nufacvta = '" . $this->numfacven  . "'";
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM inventario WHERE nufacvta = '" . $this->numfacven  . "'";
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM inventario WHERE nufacvta = '" . $this->numfacven  . "'";
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM inventario WHERE nufacvta = '" . $this->numfacven  . "'";
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM inventario WHERE nufacvta = '" . $this->numfacven  . "'";
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
   $sErrorIndex = 'geral_form_notas';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_notas';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_numfacven != $this->numfacven || (isset($bFlagRead_numfacven) && $bFlagRead_numfacven)))
    {
        $this->ajax_return_values_numfacven(true);
    }
}
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off'; 
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
      if ('incluir' == $this->nmgp_opcao && empty($this->nremision)) {$this->nremision = "0"; $this->sc_force_zero[] = "nremision";}  
      if (('alterar' == $this->nmgp_opcao || 'igual' == $this->nmgp_opcao) && empty($this->nremision)){$this->nremision = "0"; $this->sc_force_zero[] = "nremision";}  
      $NM_val_form['tipo'] = $this->tipo;
      $NM_val_form['resolucion'] = $this->resolucion;
      $NM_val_form['numfacven'] = $this->numfacven;
      $NM_val_form['pedido'] = $this->pedido;
      $NM_val_form['fechaven'] = $this->fechaven;
      $NM_val_form['asentada'] = $this->asentada;
      $NM_val_form['dias_decredito'] = $this->dias_decredito;
      $NM_val_form['fechavenc'] = $this->fechavenc;
      $NM_val_form['pagada'] = $this->pagada;
      $NM_val_form['pref_pedido'] = $this->pref_pedido;
      $NM_val_form['prefijo_fac'] = $this->prefijo_fac;
      $NM_val_form['num_fac'] = $this->num_fac;
      $NM_val_form['id_fact'] = $this->id_fact;
      $NM_val_form['idcli'] = $this->idcli;
      $NM_val_form['direccion'] = $this->direccion;
      $NM_val_form['dircliente'] = $this->dircliente;
      $NM_val_form['vendedor'] = $this->vendedor;
      $NM_val_form['credito'] = $this->credito;
      $NM_val_form['mot_nc'] = $this->mot_nc;
      $NM_val_form['mot_nd'] = $this->mot_nd;
      $NM_val_form['observaciones'] = $this->observaciones;
      $NM_val_form['nremision'] = $this->nremision;
      $NM_val_form['cupodis'] = $this->cupodis;
      $NM_val_form['cupo'] = $this->cupo;
      $NM_val_form['subtotal'] = $this->subtotal;
      $NM_val_form['valoriva'] = $this->valoriva;
      $NM_val_form['total'] = $this->total;
      $NM_val_form['adicional'] = $this->adicional;
      $NM_val_form['saldo'] = $this->saldo;
      $NM_val_form['idfacven'] = $this->idfacven;
      $NM_val_form['retefuente'] = $this->retefuente;
      $NM_val_form['cree'] = $this->cree;
      $NM_val_form['reteica'] = $this->reteica;
      $NM_val_form['reteiva'] = $this->reteiva;
      $NM_val_form['imconsumo'] = $this->imconsumo;
      $NM_val_form['detalle'] = $this->detalle;
      $NM_val_form['formapago'] = $this->formapago;
      $NM_val_form['adicional2'] = $this->adicional2;
      $NM_val_form['adicional3'] = $this->adicional3;
      $NM_val_form['obspago'] = $this->obspago;
      $NM_val_form['espos'] = $this->espos;
      $NM_val_form['cufe'] = $this->cufe;
      $NM_val_form['enlacepdf'] = $this->enlacepdf;
      $NM_val_form['estado'] = $this->estado;
      $NM_val_form['avisos'] = $this->avisos;
      $NM_val_form['creado'] = $this->creado;
      $NM_val_form['editado'] = $this->editado;
      $NM_val_form['usuario_crea'] = $this->usuario_crea;
      $NM_val_form['banco'] = $this->banco;
      $NM_val_form['enviada_a_tns'] = $this->enviada_a_tns;
      $NM_val_form['fecha_a_tns'] = $this->fecha_a_tns;
      $NM_val_form['factura_tns'] = $this->factura_tns;
      $NM_val_form['creado_en_movil'] = $this->creado_en_movil;
      $NM_val_form['disponible_en_movil'] = $this->disponible_en_movil;
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
      if ($this->saldo === "" || is_null($this->saldo))  
      { 
          $this->saldo = 0;
          $this->sc_force_zero[] = 'saldo';
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
      if ($this->imconsumo === "" || is_null($this->imconsumo))  
      { 
          $this->imconsumo = 0;
          $this->sc_force_zero[] = 'imconsumo';
      } 
      if ($this->retefuente === "" || is_null($this->retefuente))  
      { 
          $this->retefuente = 0;
          $this->sc_force_zero[] = 'retefuente';
      } 
      if ($this->reteiva === "" || is_null($this->reteiva))  
      { 
          $this->reteiva = 0;
          $this->sc_force_zero[] = 'reteiva';
      } 
      if ($this->reteica === "" || is_null($this->reteica))  
      { 
          $this->reteica = 0;
          $this->sc_force_zero[] = 'reteica';
      } 
      if ($this->cree === "" || is_null($this->cree))  
      { 
          $this->cree = 0;
          $this->sc_force_zero[] = 'cree';
      } 
      if ($this->usuario_crea === "" || is_null($this->usuario_crea))  
      { 
          $this->usuario_crea = 0;
          $this->sc_force_zero[] = 'usuario_crea';
      } 
      if ($this->dias_decredito === "" || is_null($this->dias_decredito))  
      { 
          $this->dias_decredito = 0;
          $this->sc_force_zero[] = 'dias_decredito';
      } 
      if ($this->banco === "" || is_null($this->banco))  
      { 
          $this->banco = 0;
          $this->sc_force_zero[] = 'banco';
      } 
      if ($this->id_fact === "" || is_null($this->id_fact))  
      { 
          $this->id_fact = 0;
          $this->sc_force_zero[] = 'id_fact';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['decimal_db'] == ",") 
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
          $this->formapago_before_qstr = $this->formapago;
          $this->formapago = substr($this->Db->qstr($this->formapago), 1, -1); 
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
          $this->espos_before_qstr = $this->espos;
          $this->espos = substr($this->Db->qstr($this->espos), 1, -1); 
          if ($this->espos == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->espos = "null"; 
              $NM_val_null[] = "espos";
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
          $this->tipo_before_qstr = $this->tipo;
          $this->tipo = substr($this->Db->qstr($this->tipo), 1, -1); 
          if ($this->tipo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo = "null"; 
              $NM_val_null[] = "tipo";
          } 
          $this->enviada_a_tns_before_qstr = $this->enviada_a_tns;
          $this->enviada_a_tns = substr($this->Db->qstr($this->enviada_a_tns), 1, -1); 
          if ($this->enviada_a_tns == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->enviada_a_tns = "null"; 
              $NM_val_null[] = "enviada_a_tns";
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
          $this->creado_en_movil_before_qstr = $this->creado_en_movil;
          $this->creado_en_movil = substr($this->Db->qstr($this->creado_en_movil), 1, -1); 
          if ($this->creado_en_movil == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->creado_en_movil = "null"; 
              $NM_val_null[] = "creado_en_movil";
          } 
          $this->disponible_en_movil_before_qstr = $this->disponible_en_movil;
          $this->disponible_en_movil = substr($this->Db->qstr($this->disponible_en_movil), 1, -1); 
          if ($this->disponible_en_movil == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->disponible_en_movil = "null"; 
              $NM_val_null[] = "disponible_en_movil";
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['decimal_db'] == ",") 
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
                 form_notas_pack_ajax_response();
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
                  $SC_fields_update[] = "numfacven = $this->numfacven, nremision = $this->nremision, credito = $this->credito, fechaven = #$this->fechaven#, fechavenc = #$this->fechavenc#, idcli = $this->idcli, subtotal = $this->subtotal, valoriva = $this->valoriva, total = $this->total, pagada = '$this->pagada', asentada = $this->asentada, observaciones = '$this->observaciones', saldo = $this->saldo, adicional = $this->adicional, vendedor = $this->vendedor, pedido = $this->pedido, resolucion = $this->resolucion, dircliente = $this->dircliente, retefuente = $this->retefuente, reteiva = $this->reteiva, reteica = $this->reteica, cree = $this->cree, dias_decredito = $this->dias_decredito, tipo = '$this->tipo', id_fact = $this->id_fact, mot_nc = '$this->mot_nc', mot_nd = '$this->mot_nd'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numfacven = $this->numfacven, nremision = $this->nremision, credito = $this->credito, fechaven = " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", fechavenc = " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", idcli = $this->idcli, subtotal = $this->subtotal, valoriva = $this->valoriva, total = $this->total, pagada = '$this->pagada', asentada = $this->asentada, observaciones = '$this->observaciones', saldo = $this->saldo, adicional = $this->adicional, vendedor = $this->vendedor, pedido = $this->pedido, resolucion = $this->resolucion, dircliente = $this->dircliente, retefuente = $this->retefuente, reteiva = $this->reteiva, reteica = $this->reteica, cree = $this->cree, dias_decredito = $this->dias_decredito, tipo = '$this->tipo', id_fact = $this->id_fact, mot_nc = '$this->mot_nc', mot_nd = '$this->mot_nd'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numfacven = $this->numfacven, nremision = $this->nremision, credito = $this->credito, fechaven = " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", fechavenc = " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", idcli = $this->idcli, subtotal = $this->subtotal, valoriva = $this->valoriva, total = $this->total, pagada = '$this->pagada', asentada = $this->asentada, observaciones = '$this->observaciones', saldo = $this->saldo, adicional = $this->adicional, vendedor = $this->vendedor, pedido = $this->pedido, resolucion = $this->resolucion, dircliente = $this->dircliente, retefuente = $this->retefuente, reteiva = $this->reteiva, reteica = $this->reteica, cree = $this->cree, dias_decredito = $this->dias_decredito, tipo = '$this->tipo', id_fact = $this->id_fact, mot_nc = '$this->mot_nc', mot_nd = '$this->mot_nd'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numfacven = $this->numfacven, nremision = $this->nremision, credito = $this->credito, fechaven = EXTEND('$this->fechaven', YEAR TO DAY), fechavenc = EXTEND('$this->fechavenc', YEAR TO DAY), idcli = $this->idcli, subtotal = $this->subtotal, valoriva = $this->valoriva, total = $this->total, pagada = '$this->pagada', asentada = $this->asentada, observaciones = '$this->observaciones', saldo = $this->saldo, adicional = $this->adicional, vendedor = $this->vendedor, pedido = $this->pedido, resolucion = $this->resolucion, dircliente = $this->dircliente, retefuente = $this->retefuente, reteiva = $this->reteiva, reteica = $this->reteica, cree = $this->cree, dias_decredito = $this->dias_decredito, tipo = '$this->tipo', id_fact = $this->id_fact, mot_nc = '$this->mot_nc', mot_nd = '$this->mot_nd'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numfacven = $this->numfacven, nremision = $this->nremision, credito = $this->credito, fechaven = " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", fechavenc = " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", idcli = $this->idcli, subtotal = $this->subtotal, valoriva = $this->valoriva, total = $this->total, pagada = '$this->pagada', asentada = $this->asentada, observaciones = '$this->observaciones', saldo = $this->saldo, adicional = $this->adicional, vendedor = $this->vendedor, pedido = $this->pedido, resolucion = $this->resolucion, dircliente = $this->dircliente, retefuente = $this->retefuente, reteiva = $this->reteiva, reteica = $this->reteica, cree = $this->cree, dias_decredito = $this->dias_decredito, tipo = '$this->tipo', id_fact = $this->id_fact, mot_nc = '$this->mot_nc', mot_nd = '$this->mot_nd'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numfacven = $this->numfacven, nremision = $this->nremision, credito = $this->credito, fechaven = " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", fechavenc = " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", idcli = $this->idcli, subtotal = $this->subtotal, valoriva = $this->valoriva, total = $this->total, pagada = '$this->pagada', asentada = $this->asentada, observaciones = '$this->observaciones', saldo = $this->saldo, adicional = $this->adicional, vendedor = $this->vendedor, pedido = $this->pedido, resolucion = $this->resolucion, dircliente = $this->dircliente, retefuente = $this->retefuente, reteiva = $this->reteiva, reteica = $this->reteica, cree = $this->cree, dias_decredito = $this->dias_decredito, tipo = '$this->tipo', id_fact = $this->id_fact, mot_nc = '$this->mot_nc', mot_nd = '$this->mot_nd'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "numfacven = $this->numfacven, nremision = $this->nremision, credito = $this->credito, fechaven = " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", fechavenc = " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", idcli = $this->idcli, subtotal = $this->subtotal, valoriva = $this->valoriva, total = $this->total, pagada = '$this->pagada', asentada = $this->asentada, observaciones = '$this->observaciones', saldo = $this->saldo, adicional = $this->adicional, vendedor = $this->vendedor, pedido = $this->pedido, resolucion = $this->resolucion, dircliente = $this->dircliente, retefuente = $this->retefuente, reteiva = $this->reteiva, reteica = $this->reteica, cree = $this->cree, dias_decredito = $this->dias_decredito, tipo = '$this->tipo', id_fact = $this->id_fact, mot_nc = '$this->mot_nc', mot_nd = '$this->mot_nd'"; 
              } 
              if (isset($NM_val_form['formapago']) && $NM_val_form['formapago'] != $this->nmgp_dados_select['formapago']) 
              { 
                  $SC_fields_update[] = "formapago = '$this->formapago'"; 
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
              if (isset($NM_val_form['imconsumo']) && $NM_val_form['imconsumo'] != $this->nmgp_dados_select['imconsumo']) 
              { 
                  $SC_fields_update[] = "imconsumo = $this->imconsumo"; 
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
              if (isset($NM_val_form['creado']) && $NM_val_form['creado'] != $this->nmgp_dados_select['creado']) 
              { 
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  { 
                      $SC_fields_update[] = "creado = TO_DATE('$this->creado', 'yyyy-mm-dd hh24:mi:ss')"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "creado = '$this->creado'"; 
                  } 
              } 
              if (isset($NM_val_form['editado']) && $NM_val_form['editado'] != $this->nmgp_dados_select['editado']) 
              { 
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  { 
                      $SC_fields_update[] = "editado = TO_DATE('$this->editado', 'yyyy-mm-dd hh24:mi:ss')"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "editado = '$this->editado'"; 
                  } 
              } 
              if (isset($NM_val_form['usuario_crea']) && $NM_val_form['usuario_crea'] != $this->nmgp_dados_select['usuario_crea']) 
              { 
                  $SC_fields_update[] = "usuario_crea = $this->usuario_crea"; 
              } 
              if (isset($NM_val_form['banco']) && $NM_val_form['banco'] != $this->nmgp_dados_select['banco']) 
              { 
                  $SC_fields_update[] = "banco = $this->banco"; 
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
                                  form_notas_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->pagada = $this->pagada_before_qstr;
              $this->observaciones = $this->observaciones_before_qstr;
              $this->formapago = $this->formapago_before_qstr;
              $this->obspago = $this->obspago_before_qstr;
              $this->espos = $this->espos_before_qstr;
              $this->cufe = $this->cufe_before_qstr;
              $this->enlacepdf = $this->enlacepdf_before_qstr;
              $this->estado = $this->estado_before_qstr;
              $this->avisos = $this->avisos_before_qstr;
              $this->tipo = $this->tipo_before_qstr;
              $this->enviada_a_tns = $this->enviada_a_tns_before_qstr;
              $this->factura_tns = $this->factura_tns_before_qstr;
              $this->creado_en_movil = $this->creado_en_movil_before_qstr;
              $this->disponible_en_movil = $this->disponible_en_movil_before_qstr;
              $this->mot_nc = $this->mot_nc_before_qstr;
              $this->mot_nd = $this->mot_nd_before_qstr;
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['idfacven'])) { $this->idfacven = $NM_val_form['idfacven']; }
              elseif (isset($this->idfacven)) { $this->nm_limpa_alfa($this->idfacven); }
              if     (isset($NM_val_form) && isset($NM_val_form['numfacven'])) { $this->numfacven = $NM_val_form['numfacven']; }
              elseif (isset($this->numfacven)) { $this->nm_limpa_alfa($this->numfacven); }
              if     (isset($NM_val_form) && isset($NM_val_form['nremision'])) { $this->nremision = $NM_val_form['nremision']; }
              elseif (isset($this->nremision)) { $this->nm_limpa_alfa($this->nremision); }
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
              if     (isset($NM_val_form) && isset($NM_val_form['pagada'])) { $this->pagada = $NM_val_form['pagada']; }
              elseif (isset($this->pagada)) { $this->nm_limpa_alfa($this->pagada); }
              if     (isset($NM_val_form) && isset($NM_val_form['asentada'])) { $this->asentada = $NM_val_form['asentada']; }
              elseif (isset($this->asentada)) { $this->nm_limpa_alfa($this->asentada); }
              if     (isset($NM_val_form) && isset($NM_val_form['observaciones'])) { $this->observaciones = $NM_val_form['observaciones']; }
              elseif (isset($this->observaciones)) { $this->nm_limpa_alfa($this->observaciones); }
              if     (isset($NM_val_form) && isset($NM_val_form['saldo'])) { $this->saldo = $NM_val_form['saldo']; }
              elseif (isset($this->saldo)) { $this->nm_limpa_alfa($this->saldo); }
              if     (isset($NM_val_form) && isset($NM_val_form['adicional'])) { $this->adicional = $NM_val_form['adicional']; }
              elseif (isset($this->adicional)) { $this->nm_limpa_alfa($this->adicional); }
              if     (isset($NM_val_form) && isset($NM_val_form['vendedor'])) { $this->vendedor = $NM_val_form['vendedor']; }
              elseif (isset($this->vendedor)) { $this->nm_limpa_alfa($this->vendedor); }
              if     (isset($NM_val_form) && isset($NM_val_form['pedido'])) { $this->pedido = $NM_val_form['pedido']; }
              elseif (isset($this->pedido)) { $this->nm_limpa_alfa($this->pedido); }
              if     (isset($NM_val_form) && isset($NM_val_form['resolucion'])) { $this->resolucion = $NM_val_form['resolucion']; }
              elseif (isset($this->resolucion)) { $this->nm_limpa_alfa($this->resolucion); }
              if     (isset($NM_val_form) && isset($NM_val_form['dircliente'])) { $this->dircliente = $NM_val_form['dircliente']; }
              elseif (isset($this->dircliente)) { $this->nm_limpa_alfa($this->dircliente); }
              if     (isset($NM_val_form) && isset($NM_val_form['imconsumo'])) { $this->imconsumo = $NM_val_form['imconsumo']; }
              elseif (isset($this->imconsumo)) { $this->nm_limpa_alfa($this->imconsumo); }
              if     (isset($NM_val_form) && isset($NM_val_form['retefuente'])) { $this->retefuente = $NM_val_form['retefuente']; }
              elseif (isset($this->retefuente)) { $this->nm_limpa_alfa($this->retefuente); }
              if     (isset($NM_val_form) && isset($NM_val_form['reteiva'])) { $this->reteiva = $NM_val_form['reteiva']; }
              elseif (isset($this->reteiva)) { $this->nm_limpa_alfa($this->reteiva); }
              if     (isset($NM_val_form) && isset($NM_val_form['reteica'])) { $this->reteica = $NM_val_form['reteica']; }
              elseif (isset($this->reteica)) { $this->nm_limpa_alfa($this->reteica); }
              if     (isset($NM_val_form) && isset($NM_val_form['cree'])) { $this->cree = $NM_val_form['cree']; }
              elseif (isset($this->cree)) { $this->nm_limpa_alfa($this->cree); }
              if     (isset($NM_val_form) && isset($NM_val_form['dias_decredito'])) { $this->dias_decredito = $NM_val_form['dias_decredito']; }
              elseif (isset($this->dias_decredito)) { $this->nm_limpa_alfa($this->dias_decredito); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo'])) { $this->tipo = $NM_val_form['tipo']; }
              elseif (isset($this->tipo)) { $this->nm_limpa_alfa($this->tipo); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_fact'])) { $this->id_fact = $NM_val_form['id_fact']; }
              elseif (isset($this->id_fact)) { $this->nm_limpa_alfa($this->id_fact); }
              if     (isset($NM_val_form) && isset($NM_val_form['mot_nc'])) { $this->mot_nc = $NM_val_form['mot_nc']; }
              elseif (isset($this->mot_nc)) { $this->nm_limpa_alfa($this->mot_nc); }
              if     (isset($NM_val_form) && isset($NM_val_form['mot_nd'])) { $this->mot_nd = $NM_val_form['mot_nd']; }
              elseif (isset($this->mot_nd)) { $this->nm_limpa_alfa($this->mot_nd); }
              if     (isset($NM_val_form) && isset($NM_val_form['detalle'])) { $this->detalle = $NM_val_form['detalle']; }
              elseif (isset($this->detalle)) { $this->nm_limpa_alfa($this->detalle); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('tipo', 'resolucion', 'numfacven', 'pedido', 'fechaven', 'asentada', 'dias_decredito', 'fechavenc', 'pagada', 'pref_pedido', 'prefijo_fac', 'num_fac', 'id_fact', 'idcli', 'direccion', 'dircliente', 'vendedor', 'credito', 'mot_nc', 'mot_nd', 'observaciones', 'nremision', 'cupodis', 'cupo', 'subtotal', 'valoriva', 'total', 'adicional', 'saldo', 'idfacven', 'retefuente', 'cree', 'reteica', 'reteiva', 'imconsumo', 'detalle'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['decimal_db'] == ",") 
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
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_notas_pack_ajax_response();
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
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (numfacven, nremision, fechaven, fechavenc, idcli, subtotal, valoriva, total, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, imconsumo, retefuente, reteiva, reteica, cree, espos, cufe, enlacepdf, estado, avisos, creado, editado, usuario_crea, dias_decredito, banco, tipo, id_fact, enviada_a_tns, fecha_a_tns, factura_tns, creado_en_movil, disponible_en_movil, mot_nc, mot_nd $compl_insert) VALUES ($this->numfacven, $this->nremision, #$this->fechaven#, #$this->fechavenc#, $this->idcli, $this->subtotal, $this->valoriva, $this->total, $this->asentada, '$this->observaciones', $this->saldo, $this->adicional, '$this->formapago', $this->adicional2, $this->adicional3, '$this->obspago', $this->vendedor, $this->pedido, $this->resolucion, $this->dircliente, $this->imconsumo, $this->retefuente, $this->reteiva, $this->reteica, $this->cree, '$this->espos', '$this->cufe', '$this->enlacepdf', '$this->estado', '$this->avisos', '$this->creado', '$this->editado', $this->usuario_crea, $this->dias_decredito, $this->banco, '$this->tipo', $this->id_fact, '$this->enviada_a_tns', '$this->fecha_a_tns', '$this->factura_tns', '$this->creado_en_movil', '$this->disponible_en_movil', '$this->mot_nc', '$this->mot_nd' $compl_insert_val)"; 
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
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacven, nremision, fechaven, fechavenc, idcli, subtotal, valoriva, total, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, imconsumo, retefuente, reteiva, reteica, cree, espos, cufe, enlacepdf, estado, avisos, creado, editado, usuario_crea, dias_decredito, banco, tipo, id_fact, enviada_a_tns, fecha_a_tns, factura_tns, creado_en_movil, disponible_en_movil, mot_nc, mot_nd $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfacven, $this->nremision, " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", $this->idcli, $this->subtotal, $this->valoriva, $this->total, $this->asentada, '$this->observaciones', $this->saldo, $this->adicional, '$this->formapago', $this->adicional2, $this->adicional3, '$this->obspago', $this->vendedor, $this->pedido, $this->resolucion, $this->dircliente, $this->imconsumo, $this->retefuente, $this->reteiva, $this->reteica, $this->cree, '$this->espos', '$this->cufe', '$this->enlacepdf', '$this->estado', '$this->avisos', '$this->creado', '$this->editado', $this->usuario_crea, $this->dias_decredito, $this->banco, '$this->tipo', $this->id_fact, '$this->enviada_a_tns', '$this->fecha_a_tns', '$this->factura_tns', '$this->creado_en_movil', '$this->disponible_en_movil', '$this->mot_nc', '$this->mot_nd' $compl_insert_val)"; 
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
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacven, nremision, fechaven, fechavenc, idcli, subtotal, valoriva, total, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, imconsumo, retefuente, reteiva, reteica, cree, espos, cufe, enlacepdf, estado, avisos, creado, editado, usuario_crea, dias_decredito, banco, tipo, id_fact, enviada_a_tns, fecha_a_tns, factura_tns, creado_en_movil, disponible_en_movil, mot_nc, mot_nd $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfacven, $this->nremision, " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", $this->idcli, $this->subtotal, $this->valoriva, $this->total, $this->asentada, '$this->observaciones', $this->saldo, $this->adicional, '$this->formapago', $this->adicional2, $this->adicional3, '$this->obspago', $this->vendedor, $this->pedido, $this->resolucion, $this->dircliente, $this->imconsumo, $this->retefuente, $this->reteiva, $this->reteica, $this->cree, '$this->espos', '$this->cufe', '$this->enlacepdf', '$this->estado', '$this->avisos', '$this->creado', '$this->editado', $this->usuario_crea, $this->dias_decredito, $this->banco, '$this->tipo', $this->id_fact, '$this->enviada_a_tns', '$this->fecha_a_tns', '$this->factura_tns', '$this->creado_en_movil', '$this->disponible_en_movil', '$this->mot_nc', '$this->mot_nd' $compl_insert_val)"; 
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
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacven, nremision, fechaven, fechavenc, idcli, subtotal, valoriva, total, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, imconsumo, retefuente, reteiva, reteica, cree, espos, cufe, enlacepdf, estado, avisos, creado, editado, usuario_crea, dias_decredito, banco, tipo, id_fact, enviada_a_tns, fecha_a_tns, factura_tns, creado_en_movil, disponible_en_movil, mot_nc, mot_nd $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfacven, $this->nremision, " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", $this->idcli, $this->subtotal, $this->valoriva, $this->total, $this->asentada, '$this->observaciones', $this->saldo, $this->adicional, '$this->formapago', $this->adicional2, $this->adicional3, '$this->obspago', $this->vendedor, $this->pedido, $this->resolucion, $this->dircliente, $this->imconsumo, $this->retefuente, $this->reteiva, $this->reteica, $this->cree, '$this->espos', '$this->cufe', '$this->enlacepdf', '$this->estado', '$this->avisos', TO_DATE('$this->creado', 'yyyy-mm-dd hh24:mi:ss'), TO_DATE('$this->editado', 'yyyy-mm-dd hh24:mi:ss'), $this->usuario_crea, $this->dias_decredito, $this->banco, '$this->tipo', $this->id_fact, '$this->enviada_a_tns', TO_DATE('$this->fecha_a_tns', 'yyyy-mm-dd hh24:mi:ss'), '$this->factura_tns', '$this->creado_en_movil', '$this->disponible_en_movil', '$this->mot_nc', '$this->mot_nd' $compl_insert_val)"; 
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
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacven, nremision, fechaven, fechavenc, idcli, subtotal, valoriva, total, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, imconsumo, retefuente, reteiva, reteica, cree, espos, cufe, enlacepdf, estado, avisos, creado, editado, usuario_crea, dias_decredito, banco, tipo, id_fact, enviada_a_tns, fecha_a_tns, factura_tns, creado_en_movil, disponible_en_movil, mot_nc, mot_nd $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfacven, $this->nremision, EXTEND('$this->fechaven', YEAR TO DAY), EXTEND('$this->fechavenc', YEAR TO DAY), $this->idcli, $this->subtotal, $this->valoriva, $this->total, $this->asentada, '$this->observaciones', $this->saldo, $this->adicional, '$this->formapago', $this->adicional2, $this->adicional3, '$this->obspago', $this->vendedor, $this->pedido, $this->resolucion, $this->dircliente, $this->imconsumo, $this->retefuente, $this->reteiva, $this->reteica, $this->cree, '$this->espos', '$this->cufe', '$this->enlacepdf', '$this->estado', '$this->avisos', '$this->creado', '$this->editado', $this->usuario_crea, $this->dias_decredito, $this->banco, '$this->tipo', $this->id_fact, '$this->enviada_a_tns', '$this->fecha_a_tns', '$this->factura_tns', '$this->creado_en_movil', '$this->disponible_en_movil', '$this->mot_nc', '$this->mot_nd' $compl_insert_val)"; 
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
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacven, nremision, fechaven, fechavenc, idcli, subtotal, valoriva, total, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, imconsumo, retefuente, reteiva, reteica, cree, espos, cufe, enlacepdf, estado, avisos, creado, editado, usuario_crea, dias_decredito, banco, tipo, id_fact, enviada_a_tns, fecha_a_tns, factura_tns, creado_en_movil, disponible_en_movil, mot_nc, mot_nd $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfacven, $this->nremision, " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", $this->idcli, $this->subtotal, $this->valoriva, $this->total, $this->asentada, '$this->observaciones', $this->saldo, $this->adicional, '$this->formapago', $this->adicional2, $this->adicional3, '$this->obspago', $this->vendedor, $this->pedido, $this->resolucion, $this->dircliente, $this->imconsumo, $this->retefuente, $this->reteiva, $this->reteica, $this->cree, '$this->espos', '$this->cufe', '$this->enlacepdf', '$this->estado', '$this->avisos', '$this->creado', '$this->editado', $this->usuario_crea, $this->dias_decredito, $this->banco, '$this->tipo', $this->id_fact, '$this->enviada_a_tns', '$this->fecha_a_tns', '$this->factura_tns', '$this->creado_en_movil', '$this->disponible_en_movil', '$this->mot_nc', '$this->mot_nd' $compl_insert_val)"; 
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
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacven, nremision, fechaven, fechavenc, idcli, subtotal, valoriva, total, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, imconsumo, retefuente, reteiva, reteica, cree, espos, cufe, enlacepdf, estado, avisos, creado, editado, usuario_crea, dias_decredito, banco, tipo, id_fact, enviada_a_tns, fecha_a_tns, factura_tns, creado_en_movil, disponible_en_movil, mot_nc, mot_nd $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfacven, $this->nremision, " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", $this->idcli, $this->subtotal, $this->valoriva, $this->total, $this->asentada, '$this->observaciones', $this->saldo, $this->adicional, '$this->formapago', $this->adicional2, $this->adicional3, '$this->obspago', $this->vendedor, $this->pedido, $this->resolucion, $this->dircliente, $this->imconsumo, $this->retefuente, $this->reteiva, $this->reteica, $this->cree, '$this->espos', '$this->cufe', '$this->enlacepdf', '$this->estado', '$this->avisos', '$this->creado', '$this->editado', $this->usuario_crea, $this->dias_decredito, $this->banco, '$this->tipo', $this->id_fact, '$this->enviada_a_tns', '$this->fecha_a_tns', '$this->factura_tns', '$this->creado_en_movil', '$this->disponible_en_movil', '$this->mot_nc', '$this->mot_nd' $compl_insert_val)"; 
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
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacven, nremision, fechaven, fechavenc, idcli, subtotal, valoriva, total, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, imconsumo, retefuente, reteiva, reteica, cree, espos, cufe, enlacepdf, estado, avisos, creado, editado, usuario_crea, dias_decredito, banco, tipo, id_fact, enviada_a_tns, fecha_a_tns, factura_tns, creado_en_movil, disponible_en_movil, mot_nc, mot_nd $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfacven, $this->nremision, " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", $this->idcli, $this->subtotal, $this->valoriva, $this->total, $this->asentada, '$this->observaciones', $this->saldo, $this->adicional, '$this->formapago', $this->adicional2, $this->adicional3, '$this->obspago', $this->vendedor, $this->pedido, $this->resolucion, $this->dircliente, $this->imconsumo, $this->retefuente, $this->reteiva, $this->reteica, $this->cree, '$this->espos', '$this->cufe', '$this->enlacepdf', '$this->estado', '$this->avisos', TO_DATE('$this->creado', 'yyyy-mm-dd hh24:mi:ss'), TO_DATE('$this->editado', 'yyyy-mm-dd hh24:mi:ss'), $this->usuario_crea, $this->dias_decredito, $this->banco, '$this->tipo', $this->id_fact, '$this->enviada_a_tns', TO_DATE('$this->fecha_a_tns', 'yyyy-mm-dd hh24:mi:ss'), '$this->factura_tns', '$this->creado_en_movil', '$this->disponible_en_movil', '$this->mot_nc', '$this->mot_nd' $compl_insert_val)"; 
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
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfacven, nremision, fechaven, fechavenc, idcli, subtotal, valoriva, total, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, imconsumo, retefuente, reteiva, reteica, cree, espos, cufe, enlacepdf, estado, avisos, creado, editado, usuario_crea, dias_decredito, banco, tipo, id_fact, enviada_a_tns, fecha_a_tns, factura_tns, creado_en_movil, disponible_en_movil, mot_nc, mot_nd $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfacven, $this->nremision, " . $this->Ini->date_delim . $this->fechaven . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->fechavenc . $this->Ini->date_delim1 . ", $this->idcli, $this->subtotal, $this->valoriva, $this->total, $this->asentada, '$this->observaciones', $this->saldo, $this->adicional, '$this->formapago', $this->adicional2, $this->adicional3, '$this->obspago', $this->vendedor, $this->pedido, $this->resolucion, $this->dircliente, $this->imconsumo, $this->retefuente, $this->reteiva, $this->reteica, $this->cree, '$this->espos', '$this->cufe', '$this->enlacepdf', '$this->estado', '$this->avisos', '$this->creado', '$this->editado', $this->usuario_crea, $this->dias_decredito, $this->banco, '$this->tipo', $this->id_fact, '$this->enviada_a_tns', '$this->fecha_a_tns', '$this->factura_tns', '$this->creado_en_movil', '$this->disponible_en_movil', '$this->mot_nc', '$this->mot_nd' $compl_insert_val)"; 
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
                              form_notas_pack_ajax_response();
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
                          form_notas_pack_ajax_response();
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
              $this->pagada = $this->pagada_before_qstr;
              $this->observaciones = $this->observaciones_before_qstr;
              $this->formapago = $this->formapago_before_qstr;
              $this->obspago = $this->obspago_before_qstr;
              $this->espos = $this->espos_before_qstr;
              $this->cufe = $this->cufe_before_qstr;
              $this->enlacepdf = $this->enlacepdf_before_qstr;
              $this->estado = $this->estado_before_qstr;
              $this->avisos = $this->avisos_before_qstr;
              $this->tipo = $this->tipo_before_qstr;
              $this->enviada_a_tns = $this->enviada_a_tns_before_qstr;
              $this->factura_tns = $this->factura_tns_before_qstr;
              $this->creado_en_movil = $this->creado_en_movil_before_qstr;
              $this->disponible_en_movil = $this->disponible_en_movil_before_qstr;
              $this->mot_nc = $this->mot_nc_before_qstr;
              $this->mot_nd = $this->mot_nd_before_qstr;
              $this->detalle = $this->detalle_before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->pagada = $this->pagada_before_qstr;
              $this->observaciones = $this->observaciones_before_qstr;
              $this->formapago = $this->formapago_before_qstr;
              $this->obspago = $this->obspago_before_qstr;
              $this->espos = $this->espos_before_qstr;
              $this->cufe = $this->cufe_before_qstr;
              $this->enlacepdf = $this->enlacepdf_before_qstr;
              $this->estado = $this->estado_before_qstr;
              $this->avisos = $this->avisos_before_qstr;
              $this->tipo = $this->tipo_before_qstr;
              $this->enviada_a_tns = $this->enviada_a_tns_before_qstr;
              $this->factura_tns = $this->factura_tns_before_qstr;
              $this->creado_en_movil = $this->creado_en_movil_before_qstr;
              $this->disponible_en_movil = $this->disponible_en_movil_before_qstr;
              $this->mot_nc = $this->mot_nc_before_qstr;
              $this->mot_nd = $this->mot_nd_before_qstr;
              $this->detalle = $this->detalle_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              $this->nmgp_botoes['imprimir'] = "on";
              $this->nmgp_botoes['Eliminar'] = "on";
              $this->nmgp_botoes['rc'] = "on";
              $this->nmgp_botoes['autorizar'] = "off";
              $this->nmgp_botoes['btn_asentar'] = "on";
              $this->nmgp_botoes['btn_reversar'] = "on";
              $this->return_after_insert();
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['decimal_db'] == ",") 
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
                          form_notas_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['total']);
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['decimal_db'] == ",")
        {
            $this->nm_troca_decimal(",", ".");
        }
        $_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_fechaven = $this->fechaven;
    $original_idfacven = $this->idfacven;
    $original_tipo = $this->tipo;
}
if (!isset($this->sc_temp_vGIdFacAfec)) {$this->sc_temp_vGIdFacAfec = (isset($_SESSION['vGIdFacAfec'])) ? $_SESSION['vGIdFacAfec'] : "";}
if (!isset($this->sc_temp_par_numfacventa)) {$this->sc_temp_par_numfacventa = (isset($_SESSION['par_numfacventa'])) ? $_SESSION['par_numfacventa'] : "";}
  $vObserv="";
$vNumfac="";
$vObserv="";
$vLafac="";


$this->sc_temp_par_numfacventa=$this->idfacven ;
$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "on";;

$vIdFV=$this->idfacven ;
$fec=$this->fechaven ;


$vLafac=$this->sc_temp_vGIdFacAfec;
$numf=0;
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
$laobs="";
$descpro='';
$tipodocu=$this->tipo ;
$idnota=$this->idfacven ;
$vGrupo="";
$vCambiaVal='NO';
$vControl='NO';
$vsql = "select * from detalleventa where numfac='".$vLafac."'";
 
      $nm_select = $vsql; 
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
if(isset($this->ds[0][0]))
   { 
	$i=0;
	foreach($this->ds  as $ads)
		{$i=$i+1;
		 $idproducto.=$ads[3];
		 $unimay.=$ads[4];
		 $facto.=$ads[5];
		 $bod.=$ads[6];
		 $cost.=$ads[7];
		 $cantidad.=$ads[8];
		 $vunit.=$ads[9];
		 $vparcial.=$ads[10];
		 $iva.=$ads[11];
		 $desc.=$ads[12];
		 $tiva.=$ads[13];
		 $tdes.=$ads[14];
		 $col.=$ads[16];
		 $tal.=$ads[17];
		 $sab.=$ads[18];
		 $laobs.=$ads[21];
		 $descpro.=$ads[22];
		 
		 if($unimay!='SI' and $unimay!='NO')
		 {
		 	$unimay = "NO";
		 }


     $nm_select ="insert detalleventa set numfac=$vIdFV, remision=0, idpro=$idproducto, unidadmayor='$unimay', factor=$facto, idbod=$bod, costop=$cost, cantidad=$cantidad, valorunit=$vunit, valorpar=$vparcial, iva=$iva, descuento=$desc, adicional=$tiva, adicional1=$tdes, devuelto=0, colores=$col, tallas=$tal, sabor=$sab, obs='$laobs', tipo_doc='$tipodocu', id_nota=$idnota, tipo_tran='DEV'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ; 
		 
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
		$laobs="";
		$descpro='';		 
		}
	}

else
	{
	$this->nm_mens_alert[] = "¡FACTURA no tiene detalle!"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("¡FACTURA no tiene detalle!"); }}
if (isset($this->sc_temp_par_numfacventa)) { $_SESSION['par_numfacventa'] = $this->sc_temp_par_numfacventa;}
if (isset($this->sc_temp_vGIdFacAfec)) { $_SESSION['vGIdFacAfec'] = $this->sc_temp_vGIdFacAfec;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_fechaven != $this->fechaven || (isset($bFlagRead_fechaven) && $bFlagRead_fechaven)))
    {
        $this->ajax_return_values_fechaven(true);
    }
    if (($original_idfacven != $this->idfacven || (isset($bFlagRead_idfacven) && $bFlagRead_idfacven)))
    {
        $this->ajax_return_values_idfacven(true);
    }
    if (($original_tipo != $this->tipo || (isset($bFlagRead_tipo) && $bFlagRead_tipo)))
    {
        $this->ajax_return_values_tipo(true);
    }
}
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off'; 
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['decimal_db'] == ",")
   {
       $this->nm_troca_decimal(".", ",");
   }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['parms'] = "idfacven?#?$this->idfacven?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idfacven = null === $this->idfacven ? null : substr($this->Db->qstr($this->idfacven), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['run_iframe'] == "R")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->idfacven)) 
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
      if ($this->nmgp_opcao != "nada" && (trim($this->idfacven) == "")) 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['run_iframe'] == "F" && $this->sc_evento == "insert")
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_notas = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['total'] = $qt_geral_reg_form_notas;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->idfacven))
          {
              $Reg_OK      = false;
              $Count_start = -1;
              $sc_order_by = "";
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Sel_Chave = "idfacven"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Sel_Chave = "idfacven"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Sel_Chave = "idfacven"; 
              }
              else  
              {
                  $Sel_Chave = "idfacven"; 
              }
              $nmgp_select = "SELECT " . $Sel_Chave . " from " . $this->Ini->nm_tabela . $sc_where; 
              $sc_order_by = "idfacven desc";
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
                  if ($rt->fields[0] == $this->idfacven)
                  { 
                      $Reg_OK = true;
                  }  
                  $Count_start++;
                  $rt->MoveNext();
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start'] = $Count_start;
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_notas = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start'] > $qt_geral_reg_form_notas)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start'] = $qt_geral_reg_form_notas; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start'] = $qt_geral_reg_form_notas; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_notas) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT idfacven, numfacven, nremision, credito, str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20), str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, imconsumo, retefuente, reteiva, reteica, cree, espos, cufe, enlacepdf, estado, avisos, creado, editado, usuario_crea, dias_decredito, banco, tipo, id_fact, enviada_a_tns, fecha_a_tns, factura_tns, creado_en_movil, disponible_en_movil, mot_nc, mot_nd from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT idfacven, numfacven, nremision, credito, convert(char(23),fechaven,121), convert(char(23),fechavenc,121), idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, imconsumo, retefuente, reteiva, reteica, cree, espos, cufe, enlacepdf, estado, avisos, creado, editado, usuario_crea, dias_decredito, banco, tipo, id_fact, enviada_a_tns, fecha_a_tns, factura_tns, creado_en_movil, disponible_en_movil, mot_nc, mot_nd from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT idfacven, numfacven, nremision, credito, fechaven, fechavenc, idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, imconsumo, retefuente, reteiva, reteica, cree, espos, cufe, enlacepdf, estado, avisos, TO_DATE(TO_CHAR(creado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), TO_DATE(TO_CHAR(editado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), usuario_crea, dias_decredito, banco, tipo, id_fact, enviada_a_tns, TO_DATE(TO_CHAR(fecha_a_tns, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), factura_tns, creado_en_movil, disponible_en_movil, mot_nc, mot_nd from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT idfacven, numfacven, nremision, credito, EXTEND(fechaven, YEAR TO DAY), EXTEND(fechavenc, YEAR TO DAY), idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, imconsumo, retefuente, reteiva, reteica, cree, espos, cufe, enlacepdf, estado, avisos, creado, editado, usuario_crea, dias_decredito, banco, tipo, id_fact, enviada_a_tns, fecha_a_tns, factura_tns, creado_en_movil, disponible_en_movil, mot_nc, mot_nd from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT idfacven, numfacven, nremision, credito, fechaven, fechavenc, idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, formapago, adicional2, adicional3, obspago, vendedor, pedido, resolucion, dircliente, imconsumo, retefuente, reteiva, reteica, cree, espos, cufe, enlacepdf, estado, avisos, creado, editado, usuario_crea, dias_decredito, banco, tipo, id_fact, enviada_a_tns, fecha_a_tns, factura_tns, creado_en_movil, disponible_en_movil, mot_nc, mot_nd from " . $this->Ini->nm_tabela ; 
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
          $sc_order_by = "idfacven desc";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "insert" || $this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['imprimir'] = $this->nmgp_botoes['imprimir'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['Eliminar'] = $this->nmgp_botoes['Eliminar'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['rc'] = $this->nmgp_botoes['rc'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['autorizar'] = $this->nmgp_botoes['autorizar'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['btn_asentar'] = $this->nmgp_botoes['btn_asentar'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['btn_reversar'] = $this->nmgp_botoes['btn_reversar'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['empty_filter'] = true;
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
              $this->NM_ajax_info['buttonDisplay']['imprimir'] = $this->nmgp_botoes['imprimir'] = "off";
              $this->NM_ajax_info['buttonDisplay']['Eliminar'] = $this->nmgp_botoes['Eliminar'] = "off";
              $this->NM_ajax_info['buttonDisplay']['rc'] = $this->nmgp_botoes['rc'] = "off";
              $this->NM_ajax_info['buttonDisplay']['autorizar'] = $this->nmgp_botoes['autorizar'] = "on";
              $this->NM_ajax_info['buttonDisplay']['btn_asentar'] = $this->nmgp_botoes['btn_asentar'] = "off";
              $this->NM_ajax_info['buttonDisplay']['btn_reversar'] = $this->nmgp_botoes['btn_reversar'] = "off";
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
              $this->subtotal = trim($rs->fields[7]) ; 
              $this->nmgp_dados_select['subtotal'] = $this->subtotal;
              $this->valoriva = trim($rs->fields[8]) ; 
              $this->nmgp_dados_select['valoriva'] = $this->valoriva;
              $this->total = trim($rs->fields[9]) ; 
              $this->nmgp_dados_select['total'] = $this->total;
              $this->pagada = $rs->fields[10] ; 
              $this->nmgp_dados_select['pagada'] = $this->pagada;
              $this->asentada = $rs->fields[11] ; 
              $this->nmgp_dados_select['asentada'] = $this->asentada;
              $this->observaciones = $rs->fields[12] ; 
              $this->nmgp_dados_select['observaciones'] = $this->observaciones;
              $this->saldo = trim($rs->fields[13]) ; 
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
              $this->imconsumo = trim($rs->fields[23]) ; 
              $this->nmgp_dados_select['imconsumo'] = $this->imconsumo;
              $this->retefuente = trim($rs->fields[24]) ; 
              $this->nmgp_dados_select['retefuente'] = $this->retefuente;
              $this->reteiva = trim($rs->fields[25]) ; 
              $this->nmgp_dados_select['reteiva'] = $this->reteiva;
              $this->reteica = trim($rs->fields[26]) ; 
              $this->nmgp_dados_select['reteica'] = $this->reteica;
              $this->cree = trim($rs->fields[27]) ; 
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
              $this->creado = $rs->fields[33] ; 
              if (substr($this->creado, 10, 1) == "-") 
              { 
                 $this->creado = substr($this->creado, 0, 10) . " " . substr($this->creado, 11);
              } 
              if (substr($this->creado, 13, 1) == ".") 
              { 
                 $this->creado = substr($this->creado, 0, 13) . ":" . substr($this->creado, 14, 2) . ":" . substr($this->creado, 17);
              } 
              $this->nmgp_dados_select['creado'] = $this->creado;
              $this->editado = $rs->fields[34] ; 
              if (substr($this->editado, 10, 1) == "-") 
              { 
                 $this->editado = substr($this->editado, 0, 10) . " " . substr($this->editado, 11);
              } 
              if (substr($this->editado, 13, 1) == ".") 
              { 
                 $this->editado = substr($this->editado, 0, 13) . ":" . substr($this->editado, 14, 2) . ":" . substr($this->editado, 17);
              } 
              $this->nmgp_dados_select['editado'] = $this->editado;
              $this->usuario_crea = $rs->fields[35] ; 
              $this->nmgp_dados_select['usuario_crea'] = $this->usuario_crea;
              $this->dias_decredito = $rs->fields[36] ; 
              $this->nmgp_dados_select['dias_decredito'] = $this->dias_decredito;
              $this->banco = $rs->fields[37] ; 
              $this->nmgp_dados_select['banco'] = $this->banco;
              $this->tipo = $rs->fields[38] ; 
              $this->nmgp_dados_select['tipo'] = $this->tipo;
              $this->id_fact = $rs->fields[39] ; 
              $this->nmgp_dados_select['id_fact'] = $this->id_fact;
              $this->enviada_a_tns = $rs->fields[40] ; 
              $this->nmgp_dados_select['enviada_a_tns'] = $this->enviada_a_tns;
              $this->fecha_a_tns = $rs->fields[41] ; 
              if (substr($this->fecha_a_tns, 10, 1) == "-") 
              { 
                 $this->fecha_a_tns = substr($this->fecha_a_tns, 0, 10) . " " . substr($this->fecha_a_tns, 11);
              } 
              if (substr($this->fecha_a_tns, 13, 1) == ".") 
              { 
                 $this->fecha_a_tns = substr($this->fecha_a_tns, 0, 13) . ":" . substr($this->fecha_a_tns, 14, 2) . ":" . substr($this->fecha_a_tns, 17);
              } 
              $this->nmgp_dados_select['fecha_a_tns'] = $this->fecha_a_tns;
              $this->factura_tns = $rs->fields[42] ; 
              $this->nmgp_dados_select['factura_tns'] = $this->factura_tns;
              $this->creado_en_movil = $rs->fields[43] ; 
              $this->nmgp_dados_select['creado_en_movil'] = $this->creado_en_movil;
              $this->disponible_en_movil = $rs->fields[44] ; 
              $this->nmgp_dados_select['disponible_en_movil'] = $this->disponible_en_movil;
              $this->mot_nc = $rs->fields[45] ; 
              $this->nmgp_dados_select['mot_nc'] = $this->mot_nc;
              $this->mot_nd = $rs->fields[46] ; 
              $this->nmgp_dados_select['mot_nd'] = $this->mot_nd;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->idfacven = (string)$this->idfacven; 
              $this->numfacven = (string)$this->numfacven; 
              $this->nremision = (string)$this->nremision; 
              $this->credito = (string)$this->credito; 
              $this->idcli = (string)$this->idcli; 
              $this->subtotal = (strpos(strtolower($this->subtotal), "e")) ? (float)$this->subtotal : $this->subtotal; 
              $this->subtotal = (string)$this->subtotal; 
              $this->valoriva = (strpos(strtolower($this->valoriva), "e")) ? (float)$this->valoriva : $this->valoriva; 
              $this->valoriva = (string)$this->valoriva; 
              $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
              $this->total = (string)$this->total; 
              $this->asentada = (string)$this->asentada; 
              $this->saldo = (strpos(strtolower($this->saldo), "e")) ? (float)$this->saldo : $this->saldo; 
              $this->saldo = (string)$this->saldo; 
              $this->adicional = (string)$this->adicional; 
              $this->adicional2 = (string)$this->adicional2; 
              $this->adicional3 = (string)$this->adicional3; 
              $this->vendedor = (string)$this->vendedor; 
              $this->pedido = (string)$this->pedido; 
              $this->resolucion = (string)$this->resolucion; 
              $this->dircliente = (string)$this->dircliente; 
              $this->imconsumo = (strpos(strtolower($this->imconsumo), "e")) ? (float)$this->imconsumo : $this->imconsumo; 
              $this->imconsumo = (string)$this->imconsumo; 
              $this->retefuente = (strpos(strtolower($this->retefuente), "e")) ? (float)$this->retefuente : $this->retefuente; 
              $this->retefuente = (string)$this->retefuente; 
              $this->reteiva = (strpos(strtolower($this->reteiva), "e")) ? (float)$this->reteiva : $this->reteiva; 
              $this->reteiva = (string)$this->reteiva; 
              $this->reteica = (strpos(strtolower($this->reteica), "e")) ? (float)$this->reteica : $this->reteica; 
              $this->reteica = (string)$this->reteica; 
              $this->cree = (strpos(strtolower($this->cree), "e")) ? (float)$this->cree : $this->cree; 
              $this->cree = (string)$this->cree; 
              $this->usuario_crea = (string)$this->usuario_crea; 
              $this->dias_decredito = (string)$this->dias_decredito; 
              $this->banco = (string)$this->banco; 
              $this->id_fact = (string)$this->id_fact; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['parms'] = "idfacven?#?$this->idfacven?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start'] < $qt_geral_reg_form_notas;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['opcao']   = '';
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
              $this->adicional = "0";  
              $this->nmgp_dados_form["adicional"] = $this->adicional;
              $this->formapago = "";  
              $this->nmgp_dados_form["formapago"] = $this->formapago;
              $this->adicional2 = "";  
              $this->nmgp_dados_form["adicional2"] = $this->adicional2;
              $this->adicional3 = "";  
              $this->nmgp_dados_form["adicional3"] = $this->adicional3;
              $this->obspago = "";  
              $this->nmgp_dados_form["obspago"] = $this->obspago;
              $this->vendedor = "";  
              $this->nmgp_dados_form["vendedor"] = $this->vendedor;
              $this->pedido = "";  
              $this->nmgp_dados_form["pedido"] = $this->pedido;
              $this->resolucion = "";  
              $this->nmgp_dados_form["resolucion"] = $this->resolucion;
              $this->dircliente = "";  
              $this->nmgp_dados_form["dircliente"] = $this->dircliente;
              $this->imconsumo = "0";  
              $this->nmgp_dados_form["imconsumo"] = $this->imconsumo;
              $this->retefuente = "0";  
              $this->nmgp_dados_form["retefuente"] = $this->retefuente;
              $this->reteiva = "0";  
              $this->nmgp_dados_form["reteiva"] = $this->reteiva;
              $this->reteica = "0";  
              $this->nmgp_dados_form["reteica"] = $this->reteica;
              $this->cree = "0";  
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
              $this->creado = "";  
              $this->creado_hora = "" ;  
              $this->nmgp_dados_form["creado"] = $this->creado;
              $this->editado = "";  
              $this->editado_hora = "" ;  
              $this->nmgp_dados_form["editado"] = $this->editado;
              $this->usuario_crea = "";  
              $this->nmgp_dados_form["usuario_crea"] = $this->usuario_crea;
              $this->dias_decredito = "";  
              $this->nmgp_dados_form["dias_decredito"] = $this->dias_decredito;
              $this->banco = "";  
              $this->nmgp_dados_form["banco"] = $this->banco;
              $this->tipo = "";  
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
              $this->mot_nc = "2";  
              $this->nmgp_dados_form["mot_nc"] = $this->mot_nc;
              $this->mot_nd = "2";  
              $this->nmgp_dados_form["mot_nd"] = $this->mot_nd;
              $this->cupo = "";  
              $this->nmgp_dados_form["cupo"] = $this->cupo;
              $this->cupodis = "";  
              $this->nmgp_dados_form["cupodis"] = $this->cupodis;
              $this->detalle = "";  
              $this->nmgp_dados_form["detalle"] = $this->detalle;
              $this->direccion = "";  
              $this->nmgp_dados_form["direccion"] = $this->direccion;
              $this->num_fac = "";  
              $this->nmgp_dados_form["num_fac"] = $this->num_fac;
              $this->pref_pedido = "";  
              $this->nmgp_dados_form["pref_pedido"] = $this->pref_pedido;
              $this->prefijo_fac = "";  
              $this->nmgp_dados_form["prefijo_fac"] = $this->prefijo_fac;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['foreign_key'] as $sFKName => $sFKValue)
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_notasDC']['embutida_parms'] = "par_numfacventa*scin" . $this->nmgp_dados_form['idfacven'] . "*scoutedit_cantidad*scin0*scoutsw*scin0*scoutgfactsinexist*scin@aspass@SI@aspass@*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
  }
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idfacven) from " . $this->Ini->nm_tabela . " where idfacven < $this->idfacven" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idfacven) from " . $this->Ini->nm_tabela . " where idfacven < $this->idfacven" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idfacven) from " . $this->Ini->nm_tabela . " where idfacven < $this->idfacven" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idfacven) from " . $this->Ini->nm_tabela . " where idfacven < $this->idfacven" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idfacven) from " . $this->Ini->nm_tabela . " where idfacven < $this->idfacven" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idfacven) from " . $this->Ini->nm_tabela . " where idfacven < $this->idfacven" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idfacven) from " . $this->Ini->nm_tabela . " where idfacven < $this->idfacven" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idfacven) from " . $this->Ini->nm_tabela . " where idfacven < $this->idfacven" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idfacven) from " . $this->Ini->nm_tabela . " where idfacven < $this->idfacven" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idfacven) from " . $this->Ini->nm_tabela . " where idfacven < $this->idfacven" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idfacven = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idfacven) from " . $this->Ini->nm_tabela . " where idfacven > $this->idfacven" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idfacven) from " . $this->Ini->nm_tabela . " where idfacven > $this->idfacven" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idfacven) from " . $this->Ini->nm_tabela . " where idfacven > $this->idfacven" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idfacven) from " . $this->Ini->nm_tabela . " where idfacven > $this->idfacven" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idfacven) from " . $this->Ini->nm_tabela . " where idfacven > $this->idfacven" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idfacven) from " . $this->Ini->nm_tabela . " where idfacven > $this->idfacven" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idfacven) from " . $this->Ini->nm_tabela . " where idfacven > $this->idfacven" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idfacven) from " . $this->Ini->nm_tabela . " where idfacven > $this->idfacven" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idfacven) from " . $this->Ini->nm_tabela . " where idfacven > $this->idfacven" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idfacven) from " . $this->Ini->nm_tabela . " where idfacven > $this->idfacven" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idfacven = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idfacven) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idfacven) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idfacven) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idfacven) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idfacven) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idfacven) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idfacven) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idfacven) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idfacven) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idfacven) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_filter']))
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
     $this->idfacven = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idfacven) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idfacven) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idfacven) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idfacven) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idfacven) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idfacven) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idfacven) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idfacven) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idfacven) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idfacven) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
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
     $this->idfacven = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['reg_start'] + 1;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function asentada_onChange()
{
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
  
$original_idfacven = $this->idfacven;
$original_fechaven = $this->fechaven;
$original_id_fact = $this->id_fact;
$original_total = $this->total;
$original_asentada = $this->asentada;
$original_idcli = $this->idcli;
$original_tipo = $this->tipo;
$original_numfacven = $this->numfacven;
$original_resolucion = $this->resolucion;

$vIdFV=			$this->idfacven ;
$fec=			$this->fechaven ;
$vIdFacinter=	$this->id_fact ;
$i=				0;
$vGrupo=		0;
$unimay=		'NO';
$facto=			0;
$cant=			0;
$aux=			0;
$vSaldoF=		0;
$vPagada=		'';
$vCredito=		'';
$vTotal=		0;

if($this->total >0)
	{
	if ($this->asentada ==1)
		{
		$this->sc_ajax_javascript('nm_field_disabled', array("tipo=disabled;resolucion=disabled;idcli=disabled;observaciones=disabled;numfacven=disabled;pagada=disabled;fechaven=disabled;fechavenc=disabled;credito=disabled;resolucion=disabled;numfacven=disabled;pedido=disabled", ""));
;
		$this->Ini->nm_hidden_blocos[5] = "off"; $this->NM_ajax_info['blockDisplay']['5'] = 'off';
				
		$idt=$this->idcli ; 
		 
      $nm_select = "select saldo from terceros where idtercero=$idt"; 
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
			}
		
		 
      $nm_select = "select saldo, credito, pagada, total from facturaven where idfacven=$vIdFacinter"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dat_f = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dat_f[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dat_f = false;
          $this->dat_f_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->dat_f[0][0]))
			{
			if($this->dat_f[0][0]>0)
				{
				$vSaldoF=$this->dat_f[0][0];
				}
			$vCredito=	$this->dat_f[0][1];
			$vPagada=	$this->dat_f[0][2];
			$vTotal=	$this->dat_f[0][3];
			}
		
			if($this->tipo =='ND')
				{
				
     $nm_select ="UPDATE terceros set saldo=$this->total +$sal where idtercero=$idt"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
				}
		
			elseif($this->tipo =='NC')
				{
				
				if($vCredito==2 )
					{
					if($vPagada=='NO' or $vPagada=='AB')
						{
						if($this->total ==$vSaldoF or $this->total >$vSaldoF)
							{
							
     $nm_select ="UPDATE facturaven set saldo=0, pagada='SI' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						elseif($this->total <$vSaldoF)
							{
							
     $nm_select ="UPDATE facturaven set saldo=$vSaldoF-$this->total , pagada='AB' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						$this->fHacerRecibo();
						}
					
					else
						{
						$this->fHacerRecibo();
						}
						
					}
				
				else 
					{
					
     $nm_select ="UPDATE terceros set saldo=$sal-$this->total  where idtercero=$idt"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
					if($vPagada=='NO' or $vPagada=='AB')
						{
						if($this->total ==$vSaldoF or $this->total >$vSaldoF)
							{
							
     $nm_select ="UPDATE facturaven set saldo=0, pagada='SI' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						elseif($this->total <$vSaldoF)
							{
							
							
     $nm_select ="UPDATE facturaven set saldo=$vSaldoF-$this->total , pagada='AB' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						$this->fHacerReciboCr($this->total -$vSaldoF);
						}
					
					else
						{
						$this->fHacerRecibo();
						}
						
					}
						
				}
			
     $nm_select ="UPDATE facturaven set idcli=$idt, asentada=1 where idfacven=$this->idfacven "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			$this->NM_ajax_info['buttonDisplay']['imprimir'] = $this->nmgp_botoes["imprimir"] = "on";;
			$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "on";;
			
	
		}
	
	else
		{
		
		 
      $nm_select = "select saldo, credito, pagada, total from facturaven where idfacven=$vIdFacinter"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dat_f = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dat_f[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dat_f = false;
          $this->dat_f_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->dat_f[0][0]))
			{
			if($this->dat_f[0][0]>0)
				{
				$vSaldoF=$this->dat_f[0][0];
				}
			$vCredito=	$this->dat_f[0][1];
			$vPagada=	$this->dat_f[0][2];
			$vTotal=	$this->dat_f[0][3];
			}
				
		$this->Ini->nm_hidden_blocos[5] = "on"; $this->NM_ajax_info['blockDisplay']['5'] = 'on';
		
		$idt=$this->idcli ; 
		 
      $nm_select = "select saldo from terceros where idtercero=$idt"; 
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
			}
		
		if($this->tipo =='ND')
			{
			
     $nm_select ="UPDATE terceros set saldo=$sal-$this->total  where idtercero=$idt"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			}
		
		elseif($this->tipo =='NC')
			{
			if($vCredito==2 )
				{
				if($vPagada=='SI')
					{
					if($vTotal==$this->total )
							{
							
     $nm_select ="UPDATE facturaven set saldo=$this->total , pagada='NO' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						
						else
							{
							
     $nm_select ="UPDATE facturaven set saldo=$this->total +$vSaldoF, pagada='AB' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
					}
				
				elseif($vPagada=='AB')
					{
					if($this->total ==$vSaldoF or $this->total >$vSaldoF)
						{
						if($vTotal==($this->total +$vSaldoF) or $vTotal<($this->total +$vSaldoF))
							{
							
     $nm_select ="UPDATE facturaven set saldo=$this->total +$vSaldoF, pagada='NO' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						else
							{
							
     $nm_select ="UPDATE facturaven set saldo=$this->total +$vSaldoF, pagada='AB' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						
						}
					elseif($this->total <$vSaldoF)
						{
						
     $nm_select ="UPDATE facturaven set saldo=$this->total +$vSaldoF, pagada='AB' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
						}
					}
				$this->fBorrarRecibo();
				}
			
			else 
				{
				
     $nm_select ="UPDATE terceros set saldo=$this->total +$sal where idtercero=$idt"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
				
				if($vPagada=='SI' or $vPagada=='AB')
					{
					if($this->total ==$vTotal)
						{
						
     $nm_select ="UPDATE facturaven set saldo=$vTotal, pagada='NO' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
						}
					elseif($this->total <$vTotal)
						{
						
     $nm_select ="UPDATE facturaven set saldo=$this->total +$vSaldoF, pagada='AB' where idfacven=$vIdFacinter"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
						}
					}
					
				else
					{
					}
				}
						
			
			
			
			$this->NM_ajax_info['buttonDisplay']['imprimir'] = $this->nmgp_botoes["imprimir"] = "off";;
			$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "on";;
			
     $nm_select ="UPDATE facturaven set asentada=0 where idfacven=$this->idfacven "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
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
	$this->nm_mens_alert[] = "No ha Detallado la Nota, NO puede Asentar"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("No ha Detallado la Nota, NO puede Asentar"); }$this->asentada =0;
	$this->NM_ajax_info['buttonDisplay']['imprimir'] = $this->nmgp_botoes["imprimir"] = "off";;
	$this->sc_ajax_javascript('nm_field_disabled', array("numfacven=disabled;pagada=disabled;fechaven=disabled;fechavenc=disabled", ""));
;
	}

$modificado_idfacven = $this->idfacven;
$modificado_fechaven = $this->fechaven;
$modificado_id_fact = $this->id_fact;
$modificado_total = $this->total;
$modificado_asentada = $this->asentada;
$modificado_idcli = $this->idcli;
$modificado_tipo = $this->tipo;
$modificado_numfacven = $this->numfacven;
$modificado_resolucion = $this->resolucion;
$this->nm_formatar_campos('idfacven', 'fechaven', 'id_fact', 'total', 'asentada', 'idcli', 'tipo', 'numfacven', 'resolucion');
if ($original_idfacven !== $modificado_idfacven || isset($this->nmgp_cmp_readonly['idfacven']) || (isset($bFlagRead_idfacven) && $bFlagRead_idfacven))
{
    $this->ajax_return_values_idfacven(true);
}
if ($original_fechaven !== $modificado_fechaven || isset($this->nmgp_cmp_readonly['fechaven']) || (isset($bFlagRead_fechaven) && $bFlagRead_fechaven))
{
    $this->ajax_return_values_fechaven(true);
}
if ($original_id_fact !== $modificado_id_fact || isset($this->nmgp_cmp_readonly['id_fact']) || (isset($bFlagRead_id_fact) && $bFlagRead_id_fact))
{
    $this->ajax_return_values_id_fact(true);
}
if ($original_total !== $modificado_total || isset($this->nmgp_cmp_readonly['total']) || (isset($bFlagRead_total) && $bFlagRead_total))
{
    $this->ajax_return_values_total(true);
}
if ($original_asentada !== $modificado_asentada || isset($this->nmgp_cmp_readonly['asentada']) || (isset($bFlagRead_asentada) && $bFlagRead_asentada))
{
    $this->ajax_return_values_asentada(true);
}
if ($original_idcli !== $modificado_idcli || isset($this->nmgp_cmp_readonly['idcli']) || (isset($bFlagRead_idcli) && $bFlagRead_idcli))
{
    $this->ajax_return_values_idcli(true);
}
if ($original_tipo !== $modificado_tipo || isset($this->nmgp_cmp_readonly['tipo']) || (isset($bFlagRead_tipo) && $bFlagRead_tipo))
{
    $this->ajax_return_values_tipo(true);
}
if ($original_numfacven !== $modificado_numfacven || isset($this->nmgp_cmp_readonly['numfacven']) || (isset($bFlagRead_numfacven) && $bFlagRead_numfacven))
{
    $this->ajax_return_values_numfacven(true);
}
if ($original_resolucion !== $modificado_resolucion || isset($this->nmgp_cmp_readonly['resolucion']) || (isset($bFlagRead_resolucion) && $bFlagRead_resolucion))
{
    $this->ajax_return_values_resolucion(true);
}
$this->NM_ajax_info['event_field'] = 'asentada';
form_notas_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off';
}
function credito_onChange()
{
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gCupoilimitado)) {$this->sc_temp_gCupoilimitado = (isset($_SESSION['gCupoilimitado'])) ? $_SESSION['gCupoilimitado'] : "";}
  
$original_idcli = $this->idcli;
$original_credito = $this->credito;
$original_cupodis = $this->cupodis;
$original_fechaven = $this->fechaven;
$original_dias_decredito = $this->dias_decredito;
$original_fechavenc = $this->fechavenc;
$original_cupo = $this->cupo;

$vAuto='NO';
$vAuto=$this->fAutorizacion();

$sql="select credito from terceros where idtercero=$this->idcli ";
 
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
	$mcre=$this->ds[0][0]; 
	$this->saldo_cliente();
	if ($this->credito ==1 and $mcre=='SI')
		{
		if($this->sc_temp_gCupoilimitado=='NO')
			{
			if($this->cupodis >10000 or $vAuto=='SI')
			{
			$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",$this->dias_decredito ,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
			$this->fechavenc =date("Y-m-d", strtotime($fechven));
			$this->sc_ajax_javascript('nm_field_disabled', array("credito=;fechavenc=", ""));
;
			$this->sc_set_focus('fechavenc');
			}
		else
			{
			echo "NO TIENE CUPO";
			goto sincupo;
			}
			}
		else
			{
			if($this->cupo ==0 or $vAuto=='SI')
				{
				$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",$this->dias_decredito ,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
				$this->fechavenc =date("Y-m-d", strtotime($fechven));
				$this->sc_ajax_javascript('nm_field_disabled', array("credito=;fechavenc=", ""));
;
				$this->sc_set_focus('fechavenc');
				}
			else
				{
				if($this->cupodis >10000)
					{
					$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",$this->dias_decredito ,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
					$this->fechavenc =date("Y-m-d", strtotime($fechven));
					$this->sc_ajax_javascript('nm_field_disabled', array("credito=;fechavenc=", ""));
;
					$this->sc_set_focus('fechavenc');
					}
				else
					{
					echo "NO TIENE CUPO";
					goto sincupo;
					}
				}
			}
		
		}
	else
		{sincupo:;
		$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",0,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
		$this->fechavenc =date("Y-m-d", strtotime($fechven));
		$this->credito =2;
		$this->sc_ajax_javascript('nm_field_disabled', array("pagada=", ""));
;
		$this->sc_set_focus('pagada');
		}
	}
else
	{
	$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",0,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
		$this->fechavenc =date("Y-m-d", strtotime($fechven));
		$this->sc_ajax_javascript('nm_field_disabled', array("pagada=", ""));
;
		$this->sc_set_focus('pagada');
	}


if (isset($this->sc_temp_gCupoilimitado)) { $_SESSION['gCupoilimitado'] = $this->sc_temp_gCupoilimitado;}
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off';
$modificado_idcli = $this->idcli;
$modificado_credito = $this->credito;
$modificado_cupodis = $this->cupodis;
$modificado_fechaven = $this->fechaven;
$modificado_dias_decredito = $this->dias_decredito;
$modificado_fechavenc = $this->fechavenc;
$modificado_cupo = $this->cupo;
$this->nm_formatar_campos('idcli', 'credito', 'cupodis', 'fechaven', 'dias_decredito', 'fechavenc', 'cupo');
if ($original_idcli !== $modificado_idcli || isset($this->nmgp_cmp_readonly['idcli']) || (isset($bFlagRead_idcli) && $bFlagRead_idcli))
{
    $this->ajax_return_values_idcli(true);
}
if ($original_credito !== $modificado_credito || isset($this->nmgp_cmp_readonly['credito']) || (isset($bFlagRead_credito) && $bFlagRead_credito))
{
    $this->ajax_return_values_credito(true);
}
if ($original_cupodis !== $modificado_cupodis || isset($this->nmgp_cmp_readonly['cupodis']) || (isset($bFlagRead_cupodis) && $bFlagRead_cupodis))
{
    $this->ajax_return_values_cupodis(true);
}
if ($original_fechaven !== $modificado_fechaven || isset($this->nmgp_cmp_readonly['fechaven']) || (isset($bFlagRead_fechaven) && $bFlagRead_fechaven))
{
    $this->ajax_return_values_fechaven(true);
}
if ($original_dias_decredito !== $modificado_dias_decredito || isset($this->nmgp_cmp_readonly['dias_decredito']) || (isset($bFlagRead_dias_decredito) && $bFlagRead_dias_decredito))
{
    $this->ajax_return_values_dias_decredito(true);
}
if ($original_fechavenc !== $modificado_fechavenc || isset($this->nmgp_cmp_readonly['fechavenc']) || (isset($bFlagRead_fechavenc) && $bFlagRead_fechavenc))
{
    $this->ajax_return_values_fechavenc(true);
}
if ($original_cupo !== $modificado_cupo || isset($this->nmgp_cmp_readonly['cupo']) || (isset($bFlagRead_cupo) && $bFlagRead_cupo))
{
    $this->ajax_return_values_cupo(true);
}
$this->NM_ajax_info['event_field'] = 'credito';
form_notas_pack_ajax_response();
exit;
}
function dias_decredito_onChange()
{
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
  
$original_idcli = $this->idcli;
$original_dias_decredito = $this->dias_decredito;
$original_credito = $this->credito;
$original_fechaven = $this->fechaven;
$original_fechavenc = $this->fechavenc;

$sql3="select dias_credito from terceros where idtercero=$this->idcli ";
 
      $nm_select = $sql3; 
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
	if($this->dias_decredito >$this->dat[0][0])
		{
		$this->dias_decredito =$this->dat[0][0];
		$this->nm_mens_alert[] = "¡Excede días configurados al cliente!"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("¡Excede días configurados al cliente!"); }$this->sc_set_focus('dias_decredito');
		}
	}
if($this->credito ==2)
	{
	$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",0,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
	$this->fechavenc =date("Y-m-d", strtotime($fechven));
	}
else
	{
	$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",$this->dias_decredito ,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
	$this->fechavenc =date("Y-m-d", strtotime($fechven));
	}


$modificado_idcli = $this->idcli;
$modificado_dias_decredito = $this->dias_decredito;
$modificado_credito = $this->credito;
$modificado_fechaven = $this->fechaven;
$modificado_fechavenc = $this->fechavenc;
$this->nm_formatar_campos('idcli', 'dias_decredito', 'credito', 'fechaven', 'fechavenc');
if ($original_idcli !== $modificado_idcli || isset($this->nmgp_cmp_readonly['idcli']) || (isset($bFlagRead_idcli) && $bFlagRead_idcli))
{
    $this->ajax_return_values_idcli(true);
}
if ($original_dias_decredito !== $modificado_dias_decredito || isset($this->nmgp_cmp_readonly['dias_decredito']) || (isset($bFlagRead_dias_decredito) && $bFlagRead_dias_decredito))
{
    $this->ajax_return_values_dias_decredito(true);
}
if ($original_credito !== $modificado_credito || isset($this->nmgp_cmp_readonly['credito']) || (isset($bFlagRead_credito) && $bFlagRead_credito))
{
    $this->ajax_return_values_credito(true);
}
if ($original_fechaven !== $modificado_fechaven || isset($this->nmgp_cmp_readonly['fechaven']) || (isset($bFlagRead_fechaven) && $bFlagRead_fechaven))
{
    $this->ajax_return_values_fechaven(true);
}
if ($original_fechavenc !== $modificado_fechavenc || isset($this->nmgp_cmp_readonly['fechavenc']) || (isset($bFlagRead_fechavenc) && $bFlagRead_fechavenc))
{
    $this->ajax_return_values_fechavenc(true);
}
$this->NM_ajax_info['event_field'] = 'dias';
form_notas_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off';
}
function fAutorizacion()
{
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
  
$vSIoNO='NO';
$vCliente=$this->idcli ;
if($vCliente>0)
	{
	 
      $nm_select = "select autorizado from terceros where idtercero=$vCliente"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_ter = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dt_ter[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_ter = false;
          $this->dt_ter_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->dt_ter[0][0]))
		{
		$vSIoNO=$this->dt_ter[0][0];
		}
	else
		{
		$vSIoNO='NO';
		}
	}
return $vSIoNO;
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off';
}
function fBorrarRecibo()
{
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
  
$sql_caja = "DELETE FROM caja WHERE  documento = '".$this->numfacven ."' AND resolucion = '".$this->resolucion ."' AND tipodoc = 'NC'";

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
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off';
}
function fHacerRecibo()
{
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
  
$sql_caja = "INSERT caja SET fecha = '".$this->fechaven ."', detalle = 'OTROS PAGOS', nota = 'NOTA CREDITO', cantidad = '".-1*$this->total ."', documento = '".$this->numfacven ."', cierredia = 'NO', resolucion = '".$this->resolucion ."', banco = 1, usuario = '".$this->sc_temp_gidtercero."', tipodoc = 'NC', id_tercero = '".$this->idcli ."'";


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
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
if (isset($this->sc_temp_gidtercero)) { $_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off';
}
function fHacerReciboCr($valor)
{
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
  


$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off';
}
function fValidaPrecio($iddelprod, $vUmay, $vFactor, $vValUnitario, $vTIva)
{
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
  
if($vFactor==0)
	{
	$vFmult=0;
	}
else
	{
	$vFmult=$vFactor;
	}
if($vTIva>0)
	{
	$vTIva=round(($vTIva/100), 2);
	}
else
	{
	$vTIva=0;
	}

 
      $nm_select = "select control_costo from configuraciones where idconfiguraciones=1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dat_conf = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dat_conf[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dat_conf = false;
          $this->dat_conf_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->dat_conf[0][0]))
	{
	if($this->dat_conf[0][0]=='SI')
		{
		 
      $nm_select = "select control_costo, por_preciominimo, costomen from productos where idprod=$iddelprod"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_prod = array();
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
                      $this->dt_prod[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_prod = false;
          $this->dt_prod_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->dt_prod[0][0]))
			{
			$vControl=0;
			$vValMinUMay=0;
			$vValMinUMen=0;
			$vPorc=0;
			$vCost=0;
			$vControl=$this->dt_prod[0][0];
			$vPorc=$this->dt_prod[0][1];
			$vCost=$this->dt_prod[0][2];
			
			if($vControl=='NA' or $vControl=='UC')
				{
				if($vUmay=='SI')
					{
					$vValMinUMay=round(($vCost*(1+$vTIva)), 0);
					$vCosUMen=$vCost/$vFmult;
					$vCstUMenor=round($vCosUMen, 0);
					$vValMinUMen=round(($vCstUMenor)*(1+$vTIva), 0);
					}
				else
					{
					$vValMinUMen=round(($vCost*(1+$vTIva)), 0);
					$vValMinUMay=0;
					}
				}
			elseif($vControl=='CP')
				{
				if($vUmay=='SI')
					{
					$vValMinUMay=round(($vCost*(1+$vTIva)), 0);
					$vCosUMen=$vCost/$vFmult;
					$vCstUMenor=round($vCosUMen, 0);
					$vValMinUMen=round(($vCstUMenor)*(1+$vTIva), 0);
					}
				else
					{
					$vValMinUMen=round(($vCost*(1+$vTIva)), 0);
					$vValMinUMay=0;
					}
				}
			else
				{
				if($vUmay=='SI')
					{
					$vCosUMay=round(($vCost*(1+$vTIva)), 0);
					$vValMinUMay=round($vCosUMay*(1+($vPorc/100)),0);
					$vCosUMen=$vCost/$vFmult;
					$vCstUMenor=round($vCosUMen, 0);
					$vCostmasIva=round(($vCstUMenor)*(1+$vTIva), 0);
					$vValMinUMen=round($vCostmasIva*(1+($vPorc/100)), 0);
					}
				else
					{
					$vCstUMenor=$vCost;
					$vCostmasIva=round(($vCstUMenor)*(1+$vTIva), 0);
					$vValMinUMen=round($vCostmasIva*(1+($vPorc/100)), 0);
					$vValMinUMay=0;
					}
				}
			}
		else
			{
			$vValMinUMay=0;
			$vValMinUMen=0;
			if($vUmay=='SI')
				{
				$vValMinUMay=round(($vCost*(1+$vTIva)), 0);
				$vCosUMen=$vCost/$vFmult;
				$vCstUMenor=round($vCosUMen, 0);
				$vValMinUMen=round(($vCstUMenor)*(1+$vTIva), 0);
				}
			else
				{
				$vValMinUMen=round(($vCost*(1+$vTIva)), 0);
				$vValMinUMay=0;
				}
			}
		}
	}
else
	{
	$vValMinUMay=0;
	$vValMinUMen=0;
	if($vUmay=='SI')
		{
		$vValMinUMay=round(($vCost*(1+$vTIva)), 0);
		$vCosUMen=$vCost/$vFmult;
		$vCstUMenor=round($vCosUMen, 0);
		$vValMinUMen=round(($vCstUMenor)*(1+$vTIva), 0);
		}
	else
		{
		$vValMinUMen=round(($vCost*(1+$vTIva)), 0);
		$vValMinUMay=0;
		}
	}

if($vUmay=='SI' and $vFmult>0)
	{
	if($vValUnitario>=$vValMinUMay)
		{
		return $vResp='NO';
		}
	else
		{
		return $vResp='SI';
		}
	}
else
	{
	if($vValUnitario>=$vValMinUMen)
		{
		return $vResp='NO';
		}
	else
		{
		return $vResp='SI';
		}
	}
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off';
}
function fVerifica_Ret()
{
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
  
$sql_EsAutoretenedor="select essociedad, grancontr from configuraciones";
 
      $nm_select = $sql_EsAutoretenedor; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_autoret = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds_autoret[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_autoret = false;
          $this->ds_autoret_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->ds_autoret[0][0]))
	{
	if($this->ds_autoret[0][0]=='NO')
		{
		$sql_Autoret="select porcntajeauto from tipoautoretencion where porcntajeauto=0.000 order by id_autoret DESC limit 1";		    
      $nm_select = $sql_Autoret; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_Arf = array();
      $this->ds_arf = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds_Arf[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->ds_arf[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_Arf = false;
          $this->ds_Arf_erro = $this->Db->ErrorMsg();
          $this->ds_arf = false;
          $this->ds_arf_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->ds_arf[0][0]))
			{
			$this->cree =$this->ds_arf[0][0];
			}
		}
	else
		{
		$sql_Autoret="select porcntajeauto from tipoautoretencion where porcntajeauto!=0.000 order by id_autoret DESC limit 1";		    
      $nm_select = $sql_Autoret; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_Arf = array();
      $this->ds_arf = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds_Arf[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->ds_arf[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_Arf = false;
          $this->ds_Arf_erro = $this->Db->ErrorMsg();
          $this->ds_arf = false;
          $this->ds_arf_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->ds_arf[0][0]))
			{
			$this->cree =$this->ds_arf[0][0];
			}
		}
	
	if($this->ds_autoret[0][1]=='NO')
		{
		}
	else
		{}
	}
else
	{
	}
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off';
}
function fechaven_onChange()
{
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
  
$original_credito = $this->credito;
$original_fechaven = $this->fechaven;
$original_fechavenc = $this->fechavenc;
$original_dias_decredito = $this->dias_decredito;

if($this->credito ==2)
	{
	$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",0,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
	$this->fechavenc =date("Y-m-d", strtotime($fechven));
	}
else
	{
	$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",$this->dias_decredito ,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
	$this->fechavenc =date("Y-m-d", strtotime($fechven));
	}

$modificado_credito = $this->credito;
$modificado_fechaven = $this->fechaven;
$modificado_fechavenc = $this->fechavenc;
$modificado_dias_decredito = $this->dias_decredito;
$this->nm_formatar_campos('credito', 'fechaven', 'fechavenc', 'dias_decredito');
if ($original_credito !== $modificado_credito || isset($this->nmgp_cmp_readonly['credito']) || (isset($bFlagRead_credito) && $bFlagRead_credito))
{
    $this->ajax_return_values_credito(true);
}
if ($original_fechaven !== $modificado_fechaven || isset($this->nmgp_cmp_readonly['fechaven']) || (isset($bFlagRead_fechaven) && $bFlagRead_fechaven))
{
    $this->ajax_return_values_fechaven(true);
}
if ($original_fechavenc !== $modificado_fechavenc || isset($this->nmgp_cmp_readonly['fechavenc']) || (isset($bFlagRead_fechavenc) && $bFlagRead_fechavenc))
{
    $this->ajax_return_values_fechavenc(true);
}
if ($original_dias_decredito !== $modificado_dias_decredito || isset($this->nmgp_cmp_readonly['dias_decredito']) || (isset($bFlagRead_dias_decredito) && $bFlagRead_dias_decredito))
{
    $this->ajax_return_values_dias_decredito(true);
}
$this->NM_ajax_info['event_field'] = 'fechaven';
form_notas_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off';
}
function fechavenc_onChange()
{
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
  
$original_credito = $this->credito;
$original_fechaven = $this->fechaven;
$original_fechavenc = $this->fechavenc;
$original_dias_decredito = $this->dias_decredito;

if($this->credito ==2)
	{
	$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",0,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
	$this->fechavenc =date("Y-m-d", strtotime($fechven));
	}
else
	{
	$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",$this->dias_decredito ,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
	$this->fechavenc =date("Y-m-d", strtotime($fechven));
	}

$modificado_credito = $this->credito;
$modificado_fechaven = $this->fechaven;
$modificado_fechavenc = $this->fechavenc;
$modificado_dias_decredito = $this->dias_decredito;
$this->nm_formatar_campos('credito', 'fechaven', 'fechavenc', 'dias_decredito');
if ($original_credito !== $modificado_credito || isset($this->nmgp_cmp_readonly['credito']) || (isset($bFlagRead_credito) && $bFlagRead_credito))
{
    $this->ajax_return_values_credito(true);
}
if ($original_fechaven !== $modificado_fechaven || isset($this->nmgp_cmp_readonly['fechaven']) || (isset($bFlagRead_fechaven) && $bFlagRead_fechaven))
{
    $this->ajax_return_values_fechaven(true);
}
if ($original_fechavenc !== $modificado_fechavenc || isset($this->nmgp_cmp_readonly['fechavenc']) || (isset($bFlagRead_fechavenc) && $bFlagRead_fechavenc))
{
    $this->ajax_return_values_fechavenc(true);
}
if ($original_dias_decredito !== $modificado_dias_decredito || isset($this->nmgp_cmp_readonly['dias_decredito']) || (isset($bFlagRead_dias_decredito) && $bFlagRead_dias_decredito))
{
    $this->ajax_return_values_dias_decredito(true);
}
$this->NM_ajax_info['event_field'] = 'fechavenc';
form_notas_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off';
}
function id_fact_onChange()
{
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
  
$original_id_fact = $this->id_fact;
$original_idcli = $this->idcli;
$original_fechavenc = $this->fechavenc;
$original_retefuente = $this->retefuente;
$original_reteiva = $this->reteiva;
$original_reteica = $this->reteica;
$original_direccion = $this->direccion;
$original_vendedor = $this->vendedor;
$original_dircliente = $this->dircliente;

$vIdfac=$this->id_fact ;
 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select idcli, dircliente, vendedor, str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20), retefuente, reteiva, reteica, cree from facturaven where idfacven=$vIdfac"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select idcli, dircliente, vendedor, convert(char(19),fechaven,121), retefuente, reteiva, reteica, cree from facturaven where idfacven=$vIdfac"; 
      }
      else
      { 
          $nm_select = "select idcli, dircliente, vendedor, fechaven, retefuente, reteiva, reteica, cree from facturaven where idfacven=$vIdfac"; 
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
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[5] = str_replace(',', '.', $SCrx->fields[5]);
                 $SCrx->fields[6] = str_replace(',', '.', $SCrx->fields[6]);
                 $SCrx->fields[7] = str_replace(',', '.', $SCrx->fields[7]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[4] = (strpos(strtolower($SCrx->fields[4]), "e")) ? (float)$SCrx->fields[4] : $SCrx->fields[4];
                 $SCrx->fields[4] = (string)$SCrx->fields[4];
                 $SCrx->fields[5] = (strpos(strtolower($SCrx->fields[5]), "e")) ? (float)$SCrx->fields[5] : $SCrx->fields[5];
                 $SCrx->fields[5] = (string)$SCrx->fields[5];
                 $SCrx->fields[6] = (strpos(strtolower($SCrx->fields[6]), "e")) ? (float)$SCrx->fields[6] : $SCrx->fields[6];
                 $SCrx->fields[6] = (string)$SCrx->fields[6];
                 $SCrx->fields[7] = (strpos(strtolower($SCrx->fields[7]), "e")) ? (float)$SCrx->fields[7] : $SCrx->fields[7];
                 $SCrx->fields[7] = (string)$SCrx->fields[7];
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
$this->idcli = $this->ds[0][0];
$vDir=$this->ds[0][1];
$fechfac= 
         $this->nm_data->CalculaData($this->ds[0][3],"yyyy/mm/dd","+",0,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
$this->fechavenc =date("Y-m-d", strtotime($fechfac));
$this->retefuente =$this->ds[0][4];
$this->reteiva =$this->ds[0][5];
$this->reteica =$this->ds[0][6];


 
      $nm_select = "select direc, telefono, idmuni from direccion  where iddireccion=$vDir"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dts = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dts[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dts = false;
          $this->dts_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->dts[0][0]))
	{
	$vMun=$this->dts[0][2];
	 
      $nm_select = "select municipio from municipio where idmun=$vMun"; 
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
	$dir=$this->dt[0][0].' '.$this->dts[0][0].' Tel: '.$this->dts[0][1];
	$this->direccion =$dir;
	}

$vVend=$this->ds[0][2];
if($vVend>1)
	{
	
	}
else
	{
	$this->vendedor =$vVend;
	}

$this->dircliente =$vDir;


$modificado_id_fact = $this->id_fact;
$modificado_idcli = $this->idcli;
$modificado_fechavenc = $this->fechavenc;
$modificado_retefuente = $this->retefuente;
$modificado_reteiva = $this->reteiva;
$modificado_reteica = $this->reteica;
$modificado_direccion = $this->direccion;
$modificado_vendedor = $this->vendedor;
$modificado_dircliente = $this->dircliente;
$this->nm_formatar_campos('id_fact', 'idcli', 'fechavenc', 'retefuente', 'reteiva', 'reteica', 'direccion', 'vendedor', 'dircliente');
if ($original_id_fact !== $modificado_id_fact || isset($this->nmgp_cmp_readonly['id_fact']) || (isset($bFlagRead_id_fact) && $bFlagRead_id_fact))
{
    $this->ajax_return_values_id_fact(true);
}
if ($original_idcli !== $modificado_idcli || isset($this->nmgp_cmp_readonly['idcli']) || (isset($bFlagRead_idcli) && $bFlagRead_idcli))
{
    $this->ajax_return_values_idcli(true);
}
if ($original_fechavenc !== $modificado_fechavenc || isset($this->nmgp_cmp_readonly['fechavenc']) || (isset($bFlagRead_fechavenc) && $bFlagRead_fechavenc))
{
    $this->ajax_return_values_fechavenc(true);
}
if ($original_retefuente !== $modificado_retefuente || isset($this->nmgp_cmp_readonly['retefuente']) || (isset($bFlagRead_retefuente) && $bFlagRead_retefuente))
{
    $this->ajax_return_values_retefuente(true);
}
if ($original_reteiva !== $modificado_reteiva || isset($this->nmgp_cmp_readonly['reteiva']) || (isset($bFlagRead_reteiva) && $bFlagRead_reteiva))
{
    $this->ajax_return_values_reteiva(true);
}
if ($original_reteica !== $modificado_reteica || isset($this->nmgp_cmp_readonly['reteica']) || (isset($bFlagRead_reteica) && $bFlagRead_reteica))
{
    $this->ajax_return_values_reteica(true);
}
if ($original_direccion !== $modificado_direccion || isset($this->nmgp_cmp_readonly['direccion']) || (isset($bFlagRead_direccion) && $bFlagRead_direccion))
{
    $this->ajax_return_values_direccion(true);
}
if ($original_vendedor !== $modificado_vendedor || isset($this->nmgp_cmp_readonly['vendedor']) || (isset($bFlagRead_vendedor) && $bFlagRead_vendedor))
{
    $this->ajax_return_values_vendedor(true);
}
if ($original_dircliente !== $modificado_dircliente || isset($this->nmgp_cmp_readonly['dircliente']) || (isset($bFlagRead_dircliente) && $bFlagRead_dircliente))
{
    $this->ajax_return_values_dircliente(true);
}
$this->NM_ajax_info['event_field'] = 'id';
form_notas_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off';
}
function idcli_onChange()
{
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gCupoilimitado)) {$this->sc_temp_gCupoilimitado = (isset($_SESSION['gCupoilimitado'])) ? $_SESSION['gCupoilimitado'] : "";}
  
$original_idcli = $this->idcli;
$original_vendedor = $this->vendedor;
$original_dias_decredito = $this->dias_decredito;
$original_cupodis = $this->cupodis;
$original_cupo = $this->cupo;
$original_fechaven = $this->fechaven;
$original_fechavenc = $this->fechavenc;
$original_credito = $this->credito;

$vAuto='NO';
$vAuto=$this->fAutorizacion();


if($this->idcli >0){	
$sql="select saldo, credito, cupo, loatiende, dias_credito from terceros where idtercero=$this->idcli ";
 
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
if(isset($this->ds [0][1]))
	{
	$this->vendedor =$this->ds [0][3];
	$this->dias_decredito =$this->ds[0][4];
	if($this->sc_temp_gCupoilimitado=='NO')
		{
		$this->cupodis =$this->ds [0][2]-$this->ds [0][0];
		$this->cupo =$this->ds [0][2];
		}
	else
		{
		$this->cupodis =0;
		$this->cupo =$this->ds [0][2];
		}
	if ($this->ds [0][1]=='SI')
		{
		
		if($this->sc_temp_gCupoilimitado=='NO')
			{
			if($this->cupodis <5000 and $vAuto=='NO')
				{
					$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",0,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
					$this->fechavenc =date("Y-m-d", strtotime($fechven));
					
					$this->credito =2;
					$this->nm_mens_alert[] = "CLIENTE NO TIENE CUPO"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("CLIENTE NO TIENE CUPO"); }$this->sc_set_focus('pagada');
				}
			else
				{
				$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",$this->dias_decredito ,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
				$this->fechavenc =date("Y-m-d", strtotime($fechven));
				$this->sc_ajax_javascript('nm_field_disabled', array("credito=;fechavenc=", ""));
;
				$this->credito =1;
				$this->sc_set_focus('credito');
				}
			}
		else
			{
			if($this->cupo ==0 or $vAuto=='SI')
				{
				$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",$this->dias_decredito ,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
				$this->fechavenc =date("Y-m-d", strtotime($fechven));
				$this->sc_ajax_javascript('nm_field_disabled', array("credito=;fechavenc=", ""));
;
				$this->credito =1;
				$this->sc_set_focus('credito');
				}
			else
				{
				$this->cupodis =$this->ds [0][2]-$this->ds [0][0];
				if($this->cupodis <5000)
					{
					$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",0,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
					$this->fechavenc =date("Y-m-d", strtotime($fechven));
					$this->credito =2;
					$this->nm_mens_alert[] = "CLIENTE NO TIENE CUPO"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("CLIENTE NO TIENE CUPO"); }$this->sc_set_focus('pagada');
					}
				else
					{
					$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",$this->dias_decredito ,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
					$this->fechavenc =date("Y-m-d", strtotime($fechven));
					$this->sc_ajax_javascript('nm_field_disabled', array("credito=;fechavenc=", ""));
;
					$this->credito =1;
					$this->sc_set_focus('credito');
					}
				}
			}
		}
	else
		{
		$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",0,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
		$this->fechavenc =date("Y-m-d", strtotime($fechven));
		$this->credito =2;
		$this->sc_set_focus('pagada');
		}
		
	}
else
	{
	$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",0,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
	$this->fechavenc =date("Y-m-d", strtotime($fechven));
	$this->credito =2;
	$this->sc_set_focus('pagada');
	$this->cupodis =0;
	}
}


if (isset($this->sc_temp_gCupoilimitado)) { $_SESSION['gCupoilimitado'] = $this->sc_temp_gCupoilimitado;}
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off';
$modificado_idcli = $this->idcli;
$modificado_vendedor = $this->vendedor;
$modificado_dias_decredito = $this->dias_decredito;
$modificado_cupodis = $this->cupodis;
$modificado_cupo = $this->cupo;
$modificado_fechaven = $this->fechaven;
$modificado_fechavenc = $this->fechavenc;
$modificado_credito = $this->credito;
$this->nm_formatar_campos('idcli', 'vendedor', 'dias_decredito', 'cupodis', 'cupo', 'fechaven', 'fechavenc', 'credito');
if ($original_idcli !== $modificado_idcli || isset($this->nmgp_cmp_readonly['idcli']) || (isset($bFlagRead_idcli) && $bFlagRead_idcli))
{
    $this->ajax_return_values_idcli(true);
}
if ($original_vendedor !== $modificado_vendedor || isset($this->nmgp_cmp_readonly['vendedor']) || (isset($bFlagRead_vendedor) && $bFlagRead_vendedor))
{
    $this->ajax_return_values_vendedor(true);
}
if ($original_dias_decredito !== $modificado_dias_decredito || isset($this->nmgp_cmp_readonly['dias_decredito']) || (isset($bFlagRead_dias_decredito) && $bFlagRead_dias_decredito))
{
    $this->ajax_return_values_dias_decredito(true);
}
if ($original_cupodis !== $modificado_cupodis || isset($this->nmgp_cmp_readonly['cupodis']) || (isset($bFlagRead_cupodis) && $bFlagRead_cupodis))
{
    $this->ajax_return_values_cupodis(true);
}
if ($original_cupo !== $modificado_cupo || isset($this->nmgp_cmp_readonly['cupo']) || (isset($bFlagRead_cupo) && $bFlagRead_cupo))
{
    $this->ajax_return_values_cupo(true);
}
if ($original_fechaven !== $modificado_fechaven || isset($this->nmgp_cmp_readonly['fechaven']) || (isset($bFlagRead_fechaven) && $bFlagRead_fechaven))
{
    $this->ajax_return_values_fechaven(true);
}
if ($original_fechavenc !== $modificado_fechavenc || isset($this->nmgp_cmp_readonly['fechavenc']) || (isset($bFlagRead_fechavenc) && $bFlagRead_fechavenc))
{
    $this->ajax_return_values_fechavenc(true);
}
if ($original_credito !== $modificado_credito || isset($this->nmgp_cmp_readonly['credito']) || (isset($bFlagRead_credito) && $bFlagRead_credito))
{
    $this->ajax_return_values_credito(true);
}
$this->NM_ajax_info['event_field'] = 'idcli';
form_notas_pack_ajax_response();
exit;
}
function llena_master()
{
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gCupoilimitado)) {$this->sc_temp_gCupoilimitado = (isset($_SESSION['gCupoilimitado'])) ? $_SESSION['gCupoilimitado'] : "";}
  
$sql="select saldo, credito, cupo, loatiende from terceros where idtercero=$this->idcli ";
 
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
if(isset($this->ds [0][1]))
	{
	$this->cupodis =$this->ds [0][2]-$this->ds [0][0];
	$this->cupo =$this->ds [0][2];
	$this->vendedor =$this->ds [0][3];
	if($this->sc_temp_gCupoilimitado=='NO')
			{
			if ($this->ds [0][1]=='SI')
				{
				$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",30,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
				$this->fechavenc =date("Y-m-d", strtotime($fechven));
				$this->sc_ajax_javascript('nm_field_disabled', array("credito=;fechavenc=", ""));
;
				 $this->credito =1;
				 $this->sc_set_focus('credito');

				if($this->cupodis <5000)
					{
						$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",0,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
						$this->fechavenc =date("Y-m-d", strtotime($fechven));
						$this->credito =2;
						$this->sc_ajax_javascript('nm_field_disabled', array("credito=disabled;fechavenc=disabled", ""));
;
						$this->nm_mens_alert[] = "CLIENTE NO TIENE CUPO"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("CLIENTE NO TIENE CUPO"); }$this->sc_set_focus('observaciones');
					}
				}
			else
				{
				$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",0,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
				$this->fechavenc =date("Y-m-d", strtotime($fechven));
				$this->credito =2;
				$this->sc_ajax_javascript('nm_field_disabled', array("fechavenc=disabled", ""));
;
				$this->sc_set_focus('observaciones');
				}
		}
	else
		{
		if ($this->ds [0][1]=='SI')
			{
			if ($this->cupo ==0)
				{
				$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",30,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
				$this->fechavenc =date("Y-m-d", strtotime($fechven));
				$this->sc_ajax_javascript('nm_field_disabled', array("credito=;fechavenc=", ""));
;
				$this->credito =1;
				$this->sc_set_focus('credito');
				}
			else
				{
				if($this->cupodis <5000)
					{
						$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",0,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
						$this->fechavenc =date("Y-m-d", strtotime($fechven));
						$this->credito =2;
						$this->sc_ajax_javascript('nm_field_disabled', array("credito=disabled;fechavenc=disabled", ""));
;
						$this->nm_mens_alert[] = "CLIENTE NO TIENE CUPO"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("CLIENTE NO TIENE CUPO"); }$this->sc_set_focus('observaciones');
					}
				}
			}
		else
			{
			$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",0,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
			$this->fechavenc =date("Y-m-d", strtotime($fechven));
			$this->credito =2;
			$this->sc_ajax_javascript('nm_field_disabled', array("credito=disabled;fechavenc=disabled", ""));
;
			$this->sc_set_focus('observaciones');
			$this->cupodis =0;
			}
		}
		
	}
else
	{
	$fechven= 
         $this->nm_data->CalculaData($this->fechaven ,"yyyy/mm/dd","+",0,0,0, "aaaa-mm-dd", "yyyy/mm/dd"); 
      ;
	$this->fechavenc =date("Y-m-d", strtotime($fechven));
	$this->credito =2;
	$this->sc_ajax_javascript('nm_field_disabled', array("credito=disabled;fechavenc=disabled", ""));
;
	$this->sc_set_focus('observaciones');
	$this->cupodis =0;
	}
if (isset($this->sc_temp_gCupoilimitado)) { $_SESSION['gCupoilimitado'] = $this->sc_temp_gCupoilimitado;}
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off';
}
function num_fac_onChange()
{
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
if (!isset($this->sc_temp_vGIdFacAfec)) {$this->sc_temp_vGIdFacAfec = (isset($_SESSION['vGIdFacAfec'])) ? $_SESSION['vGIdFacAfec'] : "";}
  
$original_prefijo_fac = $this->prefijo_fac;
$original_num_fac = $this->num_fac;
$original_idcli = $this->idcli;
$original_dircliente = $this->dircliente;
$original_direccion = $this->direccion;
$original_fechavenc = $this->fechavenc;
$original_retefuente = $this->retefuente;
$original_reteiva = $this->reteiva;
$original_reteica = $this->reteica;
$original_vendedor = $this->vendedor;

if(!empty($this->prefijo_fac ))
{	

	$vIdfac=$this->num_fac ;
	$this->sc_temp_vGIdFacAfec = $this->num_fac ;
	
	$vsql = "select idcli, dircliente, vendedor, fechaven, retefuente, reteiva, reteica, cree from facturaven where idfacven='".$vIdfac."'";
	 
      $nm_select = $vsql; 
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
	if(isset($this->ds[0][0]))
	{
		$this->idcli      = $this->ds[0][0];
		$vDir       = $this->ds[0][1];
		
		if($vDir==0 or empty($vDir))
		{
			$vsql = "select iddireccion from direccion where idter='".$this->idcli ."'";
			 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDirec = array();
      $this->vdirec = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vDirec[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vdirec[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDirec = false;
          $this->vDirec_erro = $this->Db->ErrorMsg();
          $this->vdirec = false;
          $this->vdirec_erro = $this->Db->ErrorMsg();
      } 
;
			if(isset($this->vdirec[0][0]))
			{
				$vDir = $this->vdirec[0][0];
				$vsql = "update facturaven set dircliente='".$this->vdirec[0][0]."' where idfacven='".$vIdfac."'";
				
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
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			}
			else
			{
				$idt  = $this->idcli ;
				$vsql = "select idmuni, direccion, tel_cel, ciudad, codigo_postal, lenguaje from terceros where idtercero='".$idt."'";
				 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDTer = array();
      $this->vdter = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vDTer[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vdter[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDTer = false;
          $this->vDTer_erro = $this->Db->ErrorMsg();
          $this->vdter = false;
          $this->vdter_erro = $this->Db->ErrorMsg();
      } 
;
				if(isset($this->vdter[0][0]))
				{
					$muni   = $this->vdter[0][0];
					$this->vdirec = $this->vdter[0][1];
					$vtel_c = $this->vdter[0][2];
					$vciudad= $this->vdter[0][3];
					$vcodpos= $this->vdter[0][4];
					$vlengua= $this->vdter[0][5];
					
					$sql2 = "select iddepar from municipio where idmun = '".$muni."'";
					 
      $nm_select = $sql2; 
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
					if(isset($this->des[0][0]))
					{
						$dep = $this->des[0][0];
					}
					$vsql = "insert direccion SET idter = '".$idt."', iddepar = '".$dep."', idmuni = '".$muni."', direc = '".$vdirec."', obs = 'PRINCIPAL', telefono = '".$vtel_c."', ciudad = '".$vciudad."',  codigo_postal = '".$vcodpos."', lenguaje = '".$vlengua."'";
					
     $nm_select = $vsq; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ; 
					
					$vsql = "select iddireccion from direccion where idter='".$idt."'";
					 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDirec2 = array();
      $this->vdirec2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vDirec2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vdirec2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDirec2 = false;
          $this->vDirec2_erro = $this->Db->ErrorMsg();
          $this->vdirec2 = false;
          $this->vdirec2_erro = $this->Db->ErrorMsg();
      } 
;
					if(isset($this->vdirec2[0][0]))
					{
						$vDir = $this->vdirec2[0][0];
						$vsql = "update facturaven set dircliente='".$this->vdirec2[0][0]."' where idfacven='".$vIdfac."'";
						
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
                form_notas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
					}
				}
			}
		}
		
		if(isset($this->ds[0][1]))
			{
			$this->dircliente =$vDir;
			$this->direccion  = $this->dircliente ;
			}
		else
			{
			$this->dircliente = 'SIN';
			$this->direccion  = $this->dircliente ;
			}
		
		$this->fechavenc  =$this->ds[0][3];
		$this->retefuente =$this->ds[0][4];
		$this->reteiva    =$this->ds[0][5];
		$this->reteica    =$this->ds[0][6];

		
		
	}
}







if (isset($this->sc_temp_vGIdFacAfec)) { $_SESSION['vGIdFacAfec'] = $this->sc_temp_vGIdFacAfec;}
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off';
$modificado_prefijo_fac = $this->prefijo_fac;
$modificado_num_fac = $this->num_fac;
$modificado_idcli = $this->idcli;
$modificado_dircliente = $this->dircliente;
$modificado_direccion = $this->direccion;
$modificado_fechavenc = $this->fechavenc;
$modificado_retefuente = $this->retefuente;
$modificado_reteiva = $this->reteiva;
$modificado_reteica = $this->reteica;
$modificado_vendedor = $this->vendedor;
$this->nm_formatar_campos('prefijo_fac', 'num_fac', 'idcli', 'dircliente', 'direccion', 'fechavenc', 'retefuente', 'reteiva', 'reteica', 'vendedor');
if ($original_prefijo_fac !== $modificado_prefijo_fac || isset($this->nmgp_cmp_readonly['prefijo_fac']) || (isset($bFlagRead_prefijo_fac) && $bFlagRead_prefijo_fac))
{
    $this->ajax_return_values_prefijo_fac(true);
}
if ($original_num_fac !== $modificado_num_fac || isset($this->nmgp_cmp_readonly['num_fac']) || (isset($bFlagRead_num_fac) && $bFlagRead_num_fac))
{
    $this->ajax_return_values_num_fac(true);
}
if ($original_idcli !== $modificado_idcli || isset($this->nmgp_cmp_readonly['idcli']) || (isset($bFlagRead_idcli) && $bFlagRead_idcli))
{
    $this->ajax_return_values_idcli(true);
}
if ($original_dircliente !== $modificado_dircliente || isset($this->nmgp_cmp_readonly['dircliente']) || (isset($bFlagRead_dircliente) && $bFlagRead_dircliente))
{
    $this->ajax_return_values_dircliente(true);
}
if ($original_direccion !== $modificado_direccion || isset($this->nmgp_cmp_readonly['direccion']) || (isset($bFlagRead_direccion) && $bFlagRead_direccion))
{
    $this->ajax_return_values_direccion(true);
}
if ($original_fechavenc !== $modificado_fechavenc || isset($this->nmgp_cmp_readonly['fechavenc']) || (isset($bFlagRead_fechavenc) && $bFlagRead_fechavenc))
{
    $this->ajax_return_values_fechavenc(true);
}
if ($original_retefuente !== $modificado_retefuente || isset($this->nmgp_cmp_readonly['retefuente']) || (isset($bFlagRead_retefuente) && $bFlagRead_retefuente))
{
    $this->ajax_return_values_retefuente(true);
}
if ($original_reteiva !== $modificado_reteiva || isset($this->nmgp_cmp_readonly['reteiva']) || (isset($bFlagRead_reteiva) && $bFlagRead_reteiva))
{
    $this->ajax_return_values_reteiva(true);
}
if ($original_reteica !== $modificado_reteica || isset($this->nmgp_cmp_readonly['reteica']) || (isset($bFlagRead_reteica) && $bFlagRead_reteica))
{
    $this->ajax_return_values_reteica(true);
}
if ($original_vendedor !== $modificado_vendedor || isset($this->nmgp_cmp_readonly['vendedor']) || (isset($bFlagRead_vendedor) && $bFlagRead_vendedor))
{
    $this->ajax_return_values_vendedor(true);
}
$this->NM_ajax_info['event_field'] = 'num';
form_notas_pack_ajax_response();
exit;
}
function pedido_onChange()
{
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
  
$original_pedido = $this->pedido;
$original_observaciones = $this->observaciones;
$original_credito = $this->credito;
$original_subtotal = $this->subtotal;
$original_valoriva = $this->valoriva;
$original_total = $this->total;
$original_saldo = $this->saldo;
$original_adicional = $this->adicional;
$original_vendedor = $this->vendedor;
$original_idcli = $this->idcli;
$original_pref_pedido = $this->pref_pedido;
$original_cupodis = $this->cupodis;
$original_cupo = $this->cupo;
$original_fechaven = $this->fechaven;
$original_fechavenc = $this->fechavenc;

$par=$this->pedido ;
$this->observaciones ='';
$this->credito =2;
$this->subtotal =0;
$this->valoriva =0;
$this->total =0;
$this->saldo =0;
$this->adicional =0;
$this->vendedor =0;
$dirdelcliente ='';


if($par>0 or $par!=NULL )
{
 
      $nm_select = "select credito, idcli, subtotal, valoriva, total, saldo, adicional, vendedor, dircliente from pedidos where idpedido=$par"; 
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
                 $SCrx->fields[7] = str_replace(',', '.', $SCrx->fields[7]);
                 $SCrx->fields[8] = str_replace(',', '.', $SCrx->fields[8]);
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
                 $SCrx->fields[7] = (strpos(strtolower($SCrx->fields[7]), "e")) ? (float)$SCrx->fields[7] : $SCrx->fields[7];
                 $SCrx->fields[7] = (string)$SCrx->fields[7];
                 $SCrx->fields[8] = (strpos(strtolower($SCrx->fields[8]), "e")) ? (float)$SCrx->fields[8] : $SCrx->fields[8];
                 $SCrx->fields[8] = (string)$SCrx->fields[8];
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
$this->idcli =$this->dt[0][1];
$this->trae_prefijo_ped();
$elpe=$this->pref_pedido ;
$this->observaciones ="SE FACTURA DOCUMENTO: ";
$this->observaciones .=$elpe;
$this->sc_set_focus('idcli');

$this->llena_master();
$this->credito =$this->dt[0][0];
$this->subtotal =$this->dt[0][2];
$this->valoriva =$this->dt[0][3];
$this->total =$this->dt[0][4];
$this->saldo =$this->dt[0][5];
$this->adicional =$this->dt[0][6];
$this->vendedor =$this->dt[0][7];
$dirdelcliente =$this->dt[0][7];
$this->sc_ajax_javascript('nm_field_disabled', array("credito=;fechavenc=", ""));
;
}

$modificado_pedido = $this->pedido;
$modificado_observaciones = $this->observaciones;
$modificado_credito = $this->credito;
$modificado_subtotal = $this->subtotal;
$modificado_valoriva = $this->valoriva;
$modificado_total = $this->total;
$modificado_saldo = $this->saldo;
$modificado_adicional = $this->adicional;
$modificado_vendedor = $this->vendedor;
$modificado_idcli = $this->idcli;
$modificado_pref_pedido = $this->pref_pedido;
$modificado_cupodis = $this->cupodis;
$modificado_cupo = $this->cupo;
$modificado_fechaven = $this->fechaven;
$modificado_fechavenc = $this->fechavenc;
$this->nm_formatar_campos('pedido', 'observaciones', 'credito', 'subtotal', 'valoriva', 'total', 'saldo', 'adicional', 'vendedor', 'idcli', 'pref_pedido', 'cupodis', 'cupo', 'fechaven', 'fechavenc');
if ($original_pedido !== $modificado_pedido || isset($this->nmgp_cmp_readonly['pedido']) || (isset($bFlagRead_pedido) && $bFlagRead_pedido))
{
    $this->ajax_return_values_pedido(true);
}
if ($original_observaciones !== $modificado_observaciones || isset($this->nmgp_cmp_readonly['observaciones']) || (isset($bFlagRead_observaciones) && $bFlagRead_observaciones))
{
    $this->ajax_return_values_observaciones(true);
}
if ($original_credito !== $modificado_credito || isset($this->nmgp_cmp_readonly['credito']) || (isset($bFlagRead_credito) && $bFlagRead_credito))
{
    $this->ajax_return_values_credito(true);
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
if ($original_adicional !== $modificado_adicional || isset($this->nmgp_cmp_readonly['adicional']) || (isset($bFlagRead_adicional) && $bFlagRead_adicional))
{
    $this->ajax_return_values_adicional(true);
}
if ($original_vendedor !== $modificado_vendedor || isset($this->nmgp_cmp_readonly['vendedor']) || (isset($bFlagRead_vendedor) && $bFlagRead_vendedor))
{
    $this->ajax_return_values_vendedor(true);
}
if ($original_idcli !== $modificado_idcli || isset($this->nmgp_cmp_readonly['idcli']) || (isset($bFlagRead_idcli) && $bFlagRead_idcli))
{
    $this->ajax_return_values_idcli(true);
}
if ($original_pref_pedido !== $modificado_pref_pedido || isset($this->nmgp_cmp_readonly['pref_pedido']) || (isset($bFlagRead_pref_pedido) && $bFlagRead_pref_pedido))
{
    $this->ajax_return_values_pref_pedido(true);
}
if ($original_cupodis !== $modificado_cupodis || isset($this->nmgp_cmp_readonly['cupodis']) || (isset($bFlagRead_cupodis) && $bFlagRead_cupodis))
{
    $this->ajax_return_values_cupodis(true);
}
if ($original_cupo !== $modificado_cupo || isset($this->nmgp_cmp_readonly['cupo']) || (isset($bFlagRead_cupo) && $bFlagRead_cupo))
{
    $this->ajax_return_values_cupo(true);
}
if ($original_fechaven !== $modificado_fechaven || isset($this->nmgp_cmp_readonly['fechaven']) || (isset($bFlagRead_fechaven) && $bFlagRead_fechaven))
{
    $this->ajax_return_values_fechaven(true);
}
if ($original_fechavenc !== $modificado_fechavenc || isset($this->nmgp_cmp_readonly['fechavenc']) || (isset($bFlagRead_fechavenc) && $bFlagRead_fechavenc))
{
    $this->ajax_return_values_fechavenc(true);
}
$this->NM_ajax_info['event_field'] = 'pedido';
form_notas_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off';
}
function prefijo_fac_onChange()
{
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
  
$original_id_fact = $this->id_fact;
$original_num_fac = $this->num_fac;

$this->id_fact =0;
$this->num_fac ='';

$modificado_id_fact = $this->id_fact;
$modificado_num_fac = $this->num_fac;
$this->nm_formatar_campos('id_fact', 'num_fac');
if ($original_id_fact !== $modificado_id_fact || isset($this->nmgp_cmp_readonly['id_fact']) || (isset($bFlagRead_id_fact) && $bFlagRead_id_fact))
{
    $this->ajax_return_values_id_fact(true);
}
if ($original_num_fac !== $modificado_num_fac || isset($this->nmgp_cmp_readonly['num_fac']) || (isset($bFlagRead_num_fac) && $bFlagRead_num_fac))
{
    $this->ajax_return_values_num_fac(true);
}
$this->NM_ajax_info['event_field'] = 'prefijo';
form_notas_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off';
}
function resolucion_onChange()
{
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
  
$original_tipo = $this->tipo;
$original_resolucion = $this->resolucion;
$original_numfacven = $this->numfacven;
$original_total = $this->total;

if($this->tipo =='NC')
	{
	 
      $nm_select = "select pref_ncr from resdian where Idres=$this->resolucion "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_res = array();
     if ($this->resolucion != "")
     { 
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
     } 
;
	if(isset($this->ds_res[0][0]))
		{
		if($this->ds_res[0][0]=='NO')
			{
			 
      $nm_select = "select Idres from resdian where pref_ncr='SI' order by Idres desc Limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_tipo = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds_tipo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_tipo = false;
          $this->ds_tipo_erro = $this->Db->ErrorMsg();
      } 
;
			if(isset($this->ds_tipo[0][0]))
				{
				$this->resolucion =$this->ds_tipo[0][0];
				}
			else
				{
				$this->resolucion ='';
				$this->sc_set_focus('resolucion');
				echo "NO HAY PREFIJO DEFINIDO PARA NOTA CRÉDITO";
				}
			}
		
		}
	else
		{
		$this->resolucion ='';
		$this->sc_set_focus('resolucion');
		echo "NO HAY PREFIJO DEFINIDO PARA NOTA CRÉDITO";
		}
	
	}

elseif($this->tipo =='ND')
	{
	 
      $nm_select = "select pref_ndb from resdian where Idres=$this->resolucion "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_re = array();
     if ($this->resolucion != "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds_re[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_re = false;
          $this->ds_re_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if(isset($this->ds_re[0][0]))
		{
		if($this->ds_re[0][0]=='NO')
			{
			 
      $nm_select = "select Idres from resdian where pref_ndb='SI' order by Idres desc Limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_tip = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds_tip[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_tip = false;
          $this->ds_tip_erro = $this->Db->ErrorMsg();
      } 
;
			if(isset($this->ds_tip[0][0]))
				{
				$this->resolucion =$this->ds_tip[0][0];
				}
			else
				{
				$this->resolucion ='';
				$this->sc_set_focus('resolucion');
				echo "NO HAY PREFIJO DEFINIDO PARA NOTA DÉBITO";
				}
			}
		
		}
	else
		{
		$this->resolucion ='';
		$this->sc_set_focus('resolucion');
		echo "NO HAY PREFIJO DEFINIDO PARA NOTA DÉBITO";
		}
	}



$modificado_tipo = $this->tipo;
$modificado_resolucion = $this->resolucion;
$modificado_numfacven = $this->numfacven;
$modificado_total = $this->total;
$this->nm_formatar_campos('tipo', 'resolucion', 'numfacven', 'total');
if ($original_tipo !== $modificado_tipo || isset($this->nmgp_cmp_readonly['tipo']) || (isset($bFlagRead_tipo) && $bFlagRead_tipo))
{
    $this->ajax_return_values_tipo(true);
}
if ($original_resolucion !== $modificado_resolucion || isset($this->nmgp_cmp_readonly['resolucion']) || (isset($bFlagRead_resolucion) && $bFlagRead_resolucion))
{
    $this->ajax_return_values_resolucion(true);
}
if ($original_numfacven !== $modificado_numfacven || isset($this->nmgp_cmp_readonly['numfacven']) || (isset($bFlagRead_numfacven) && $bFlagRead_numfacven))
{
    $this->ajax_return_values_numfacven(true);
}
if ($original_total !== $modificado_total || isset($this->nmgp_cmp_readonly['total']) || (isset($bFlagRead_total) && $bFlagRead_total))
{
    $this->ajax_return_values_total(true);
}
$this->NM_ajax_info['event_field'] = 'resolucion';
form_notas_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off';
}
function saldo_cliente()
{
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
  
$sql="select saldo, cupo from terceros where idtercero=$this->idcli ";
 
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
	$this->cupodis =$this->ds [0][1]-$this->ds [0][0];
	$this->cupo =$this->ds [0][1];
	}
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off';
}
function tipo_onChange()
{
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
  
$original_tipo = $this->tipo;
$original_resolucion = $this->resolucion;
$original_mot_nc = $this->mot_nc;
$original_mot_nd = $this->mot_nd;

if($this->tipo =='NC')
	{
	 
      $nm_select = "select Idres from resdian where pref_ncr='SI' order by Idres desc Limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_tipo = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds_tipo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_tipo = false;
          $this->ds_tipo_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->ds_tipo[0][0]))
		{
		$this->resolucion =$this->ds_tipo[0][0];
		}
	$this->nmgp_cmp_hidden["mot_nc"] = "on"; $this->NM_ajax_info['fieldDisplay']['mot_nc'] = 'on';
	$this->nmgp_cmp_hidden["mot_nd"] = "off"; $this->NM_ajax_info['fieldDisplay']['mot_nd'] = 'off';
	}
elseif($this->tipo =='ND')
	{
	 
      $nm_select = "select Idres from resdian where pref_ndb='SI' order by Idres desc Limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_tip = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds_tip[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_tip = false;
          $this->ds_tip_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->ds_tip[0][0]))
		{
		$this->resolucion =$this->ds_tip[0][0];
		}
	$this->nmgp_cmp_hidden["mot_nc"] = "off"; $this->NM_ajax_info['fieldDisplay']['mot_nc'] = 'off';
	$this->nmgp_cmp_hidden["mot_nd"] = "on"; $this->NM_ajax_info['fieldDisplay']['mot_nd'] = 'on';
	}

$modificado_tipo = $this->tipo;
$modificado_resolucion = $this->resolucion;
$modificado_mot_nc = $this->mot_nc;
$modificado_mot_nd = $this->mot_nd;
$this->nm_formatar_campos('tipo', 'resolucion', 'mot_nc', 'mot_nd');
if ($original_tipo !== $modificado_tipo || isset($this->nmgp_cmp_readonly['tipo']) || (isset($bFlagRead_tipo) && $bFlagRead_tipo))
{
    $this->ajax_return_values_tipo(true);
}
if ($original_resolucion !== $modificado_resolucion || isset($this->nmgp_cmp_readonly['resolucion']) || (isset($bFlagRead_resolucion) && $bFlagRead_resolucion))
{
    $this->ajax_return_values_resolucion(true);
}
if ($original_mot_nc !== $modificado_mot_nc || isset($this->nmgp_cmp_readonly['mot_nc']) || (isset($bFlagRead_mot_nc) && $bFlagRead_mot_nc))
{
    $this->ajax_return_values_mot_nc(true);
}
if ($original_mot_nd !== $modificado_mot_nd || isset($this->nmgp_cmp_readonly['mot_nd']) || (isset($bFlagRead_mot_nd) && $bFlagRead_mot_nd))
{
    $this->ajax_return_values_mot_nd(true);
}
$this->NM_ajax_info['event_field'] = 'tipo';
form_notas_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off';
}
function trae_prefijo_ped()
{
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'on';
if (!isset($this->sc_temp_elped)) {$this->sc_temp_elped = (isset($_SESSION['elped'])) ? $_SESSION['elped'] : "";}
  
 
      $nm_select = "select prefijo_ped, numpedido from pedidos where idpedido=$this->pedido "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dse = array();
     if ($this->pedido != "")
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
	$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;
	$this->sc_temp_elped=$this->pedido ;
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
	$this->pref_pedido =$pre." 00".$this->dse[0][1];
	}
if (isset($this->sc_temp_elped)) { $_SESSION['elped'] = $this->sc_temp_elped;}
$_SESSION['scriptcase']['form_notas']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_notas_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_notas_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("idfacven", "numfacven", "credito", "fechaven", "fechavenc", "idcli", "subtotal", "valoriva", "total", "pagada", "asentada", "observaciones", "saldo", "adicional", "adicional2", "adicional3"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['csrf_token'];
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

   function Form_lookup_tipo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "NOTA CRÉDITO?#?NC?#?N?@?";
       $nmgp_def_dados .= "NOTA DÉBITO?#?ND?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_resolucion()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_resolucion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_resolucion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_resolucion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_resolucion'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_resolucion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_resolucion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_resolucion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_resolucion'] = array(); 
    }

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   $nm_comando = "SELECT Idres, prefijo  FROM resdian  where resolucion<>0 AND if('$this->tipo'='NC',pref_ncr='SI' ,pref_ndb='SI') ORDER BY prefijo";

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_resolucion'][] = $rs->fields[0];
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
   function Form_lookup_pedido()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_pedido']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_pedido'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_pedido']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_pedido'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_pedido']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_pedido'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_pedido']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_pedido'] = array(); 
    }

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo + \" - \" + pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc='PV' ORDER BY idpedido DESC";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idpedido, concat(resdian.prefijo, \" - \", pedidos.numpedido)  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc='PV' ORDER BY idpedido DESC";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo&\" - \"&pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc='PV' ORDER BY idpedido DESC";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo||\" - \"||pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc='PV' ORDER BY idpedido DESC";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo + \" - \" + pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc='PV' ORDER BY idpedido DESC";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo||\" - \"||pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc='PV' ORDER BY idpedido DESC";
   }
   else
   {
       $nm_comando = "SELECT idpedido, resdian.prefijo||\" - \"||pedidos.numpedido  FROM pedidos pedidos left join resdian on pedidos.prefijo_ped=resdian.Idres where pedidos.nremision is NULL and (pedidos.nremision is NULL OR pedidos.nremision=0 ) and pedidos.tipo_doc='PV' ORDER BY idpedido DESC";
   }

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_pedido'][] = $rs->fields[0];
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
   function Form_lookup_asentada()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "No?#?0?#?S?@?";
       $nmgp_def_dados .= "Sí?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_prefijo_fac()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_prefijo_fac']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_prefijo_fac'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_prefijo_fac']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_prefijo_fac'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_prefijo_fac']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_prefijo_fac'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_prefijo_fac']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_prefijo_fac'] = array(); 
    }

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   $nm_comando = "SELECT Idres, concat(prefijo,' - Vencer ',fec_vencimiento)  FROM resdian  WHERE pref_factura='SI' ORDER BY prefijo";

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_prefijo_fac'][] = $rs->fields[0];
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
   function Form_lookup_num_fac()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_num_fac']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_num_fac'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_num_fac']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_num_fac'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_num_fac']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_num_fac'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_num_fac']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_num_fac'] = array(); 
    }

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   $nm_comando = "SELECT idfacven, numfacven  FROM facturaven  where tipo= 'FV'  and resolucion = '".$this->prefijo_fac."'";

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_num_fac'][] = $rs->fields[0];
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
   function Form_lookup_idcli()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_idcli']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_idcli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_idcli']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_idcli'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_idcli']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_idcli'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_idcli']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_idcli'] = array(); 
    }

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   $nm_comando = "SELECT idtercero, concat(documento,\" - \", nombres)  FROM terceros  ORDER BY nombres ASC";

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_idcli'][] = $rs->fields[0];
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
   function Form_lookup_direccion()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_direccion']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_direccion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_direccion']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_direccion'] = array(); 
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_direccion']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_direccion'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_direccion']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_direccion'] = array(); 
    }

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   $nm_comando = "SELECT iddireccion, direc  FROM direccion  WHERE idter='$this->idcli' ORDER BY direc";

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_direccion'][] = $rs->fields[0];
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
   function Form_lookup_credito()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "No?#?2?#?S?@?";
       $nmgp_def_dados .= "Sí?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_mot_nc()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nc']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nc'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nc']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nc'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nc']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nc'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nc']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nc'] = array(); 
    }

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   $nm_comando = "SELECT cod_motivo_nc, motivo_desc  FROM motivo_notas_credito  ORDER BY motivo_desc";

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nc'][] = $rs->fields[0];
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
   function Form_lookup_mot_nd()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nd']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nd'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nd']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nd'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nd']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nd'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nd']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nd'] = array(); 
    }

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   $nm_comando = "SELECT cod_motivo_nd, motivo_desc  FROM motivo_notas_debito  ORDER BY motivo_desc";

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_mot_nd'][] = $rs->fields[0];
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
   function Form_lookup_retefuente()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_retefuente']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_retefuente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_retefuente']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_retefuente'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_retefuente']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_retefuente'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_retefuente']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_retefuente'] = array(); 
    }

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   $nm_comando = "SELECT  porrete  FROM tiporetefuente  ORDER BY id_tiporetefuente DESC";

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_retefuente'][] = $rs->fields[0];
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
   function Form_lookup_cree()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_cree']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_cree'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_cree']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_cree'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_cree']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_cree'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_cree']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_cree'] = array(); 
    }

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   $nm_comando = "SELECT  porcntajeauto  FROM tipoautoretencion  ORDER BY id_autoret DESC";

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_cree'][] = $rs->fields[0];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_reteica']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_reteica'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_reteica']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_reteica'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_reteica']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_reteica'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_reteica']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_reteica'] = array(); 
    }

   $old_value_numfacven = $this->numfacven;
   $old_value_fechaven = $this->fechaven;
   $old_value_dias_decredito = $this->dias_decredito;
   $old_value_fechavenc = $this->fechavenc;
   $old_value_id_fact = $this->id_fact;
   $old_value_nremision = $this->nremision;
   $old_value_cupodis = $this->cupodis;
   $old_value_cupo = $this->cupo;
   $old_value_subtotal = $this->subtotal;
   $old_value_valoriva = $this->valoriva;
   $old_value_total = $this->total;
   $old_value_adicional = $this->adicional;
   $old_value_saldo = $this->saldo;
   $old_value_idfacven = $this->idfacven;
   $old_value_reteiva = $this->reteiva;
   $old_value_imconsumo = $this->imconsumo;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_numfacven = $this->numfacven;
   $unformatted_value_fechaven = $this->fechaven;
   $unformatted_value_dias_decredito = $this->dias_decredito;
   $unformatted_value_fechavenc = $this->fechavenc;
   $unformatted_value_id_fact = $this->id_fact;
   $unformatted_value_nremision = $this->nremision;
   $unformatted_value_cupodis = $this->cupodis;
   $unformatted_value_cupo = $this->cupo;
   $unformatted_value_subtotal = $this->subtotal;
   $unformatted_value_valoriva = $this->valoriva;
   $unformatted_value_total = $this->total;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_saldo = $this->saldo;
   $unformatted_value_idfacven = $this->idfacven;
   $unformatted_value_reteiva = $this->reteiva;
   $unformatted_value_imconsumo = $this->imconsumo;

   $nm_comando = "SELECT  porcica  FROM tipoica  ORDER BY  id_ica DESC";

   $this->numfacven = $old_value_numfacven;
   $this->fechaven = $old_value_fechaven;
   $this->dias_decredito = $old_value_dias_decredito;
   $this->fechavenc = $old_value_fechavenc;
   $this->id_fact = $old_value_id_fact;
   $this->nremision = $old_value_nremision;
   $this->cupodis = $old_value_cupodis;
   $this->cupo = $old_value_cupo;
   $this->subtotal = $old_value_subtotal;
   $this->valoriva = $old_value_valoriva;
   $this->total = $old_value_total;
   $this->adicional = $old_value_adicional;
   $this->saldo = $old_value_saldo;
   $this->idfacven = $old_value_idfacven;
   $this->reteiva = $old_value_reteiva;
   $this->imconsumo = $old_value_imconsumo;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['Lookup_reteica'][] = $rs->fields[0];
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
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_notas_pack_ajax_response();
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
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "adicional", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "adicional2", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "adicional3", $arg_search, str_replace(",", ".", $data_search));
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_notas = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['total'] = $qt_geral_reg_form_notas;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_notas_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_notas_pack_ajax_response();
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
      $nm_numeric[] = "idfacven";$nm_numeric[] = "numfacven";$nm_numeric[] = "nremision";$nm_numeric[] = "credito";$nm_numeric[] = "idcli";$nm_numeric[] = "subtotal";$nm_numeric[] = "valoriva";$nm_numeric[] = "total";$nm_numeric[] = "asentada";$nm_numeric[] = "saldo";$nm_numeric[] = "adicional";$nm_numeric[] = "adicional2";$nm_numeric[] = "adicional3";$nm_numeric[] = "vendedor";$nm_numeric[] = "pedido";$nm_numeric[] = "resolucion";$nm_numeric[] = "dircliente";$nm_numeric[] = "imconsumo";$nm_numeric[] = "retefuente";$nm_numeric[] = "reteiva";$nm_numeric[] = "reteica";$nm_numeric[] = "cree";$nm_numeric[] = "usuario_crea";$nm_numeric[] = "dias_decredito";$nm_numeric[] = "banco";$nm_numeric[] = "id_fact";$nm_numeric[] = "";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['decimal_db'] == ".")
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
      $Nm_datas['fechaven'] = "date";$Nm_datas['fechavenc'] = "date";$Nm_datas['creado'] = "timestamp";$Nm_datas['editado'] = "timestamp";$Nm_datas['fecha_a_tns'] = "timestamp";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['SC_sep_date1'];
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
       $data_look['2'] = "No";
       $data_look['1'] = "Sí";
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
       $nm_comando = "SELECT concat(documento,\" - \",nombres), idtercero FROM terceros WHERE (concat(documento,\" - \",nombres) LIKE '%$campo%')" ; 
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
       $data_look['0'] = "No";
       $data_look['1'] = "Sí";
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
       $nmgp_saida_form = "form_notas_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_notas_fim.php";
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
       form_notas_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['masterValue']);
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_notasDC']['reg_start'] = "";
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detalle_notasDC']['total']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['opc_ant'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_notas']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_notas_pack_ajax_response();
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
       form_notas_pack_ajax_response();
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
    <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
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
                        'tipo' => 'tipo',
                        'resolucion' => 'resolucion',
                        'numfacven' => 'numfacven',
                        'pedido' => 'pedido',
                        'fechaven' => 'fechaven',
                        'asentada' => 'asentada',
                        'dias_decredito' => 'dias_decredito',
                        'fechavenc' => 'fechavenc',
                        'pagada' => 'pagada',
                        'pref_pedido' => 'pref_pedido',
                        'prefijo_fac' => 'prefijo_fac',
                        'num_fac' => 'num_fac',
                        'id_fact' => 'id_fact',
                        'idcli' => 'idcli',
                        'direccion' => 'direccion',
                        'dircliente' => 'dircliente',
                        'vendedor' => 'vendedor',
                        'credito' => 'credito',
                        'mot_nc' => 'mot_nc',
                        'mot_nd' => 'mot_nd',
                        'observaciones' => 'observaciones',
                        'nremision' => 'nremision',
                        'cupodis' => 'cupodis',
                        'cupo' => 'cupo',
                        'subtotal' => 'subtotal',
                        'valoriva' => 'valoriva',
                        'total' => 'total',
                        'adicional' => 'adicional',
                        'saldo' => 'saldo',
                        'idfacven' => 'idfacven',
                        'retefuente' => 'retefuente',
                        'cree' => 'cree',
                        'reteica' => 'reteica',
                        'reteiva' => 'reteiva',
                        'imconsumo' => 'imconsumo',
                        'detalle' => 'detalle',
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
            case "eliminar":
                return array("sc_Eliminar_top");
                break;
            case "rc":
                return array("sc_rc_top");
                break;
            case "btn_asentar":
                return array("sc_btn_asentar_top");
                break;
            case "btn_reversar":
                return array("sc_btn_reversar_top");
                break;
            case "imprimir":
                return array("sc_imprimir_top");
                break;
            case "help":
                return array("sc_b_hlp_t");
                break;
            case "exit":
                return array("sc_b_sai_t.sc-unique-btn-6", "sc_b_sai_t.sc-unique-btn-7", "sc_b_sai_t.sc-unique-btn-9", "sc_b_sai_t.sc-unique-btn-8", "sc_b_sai_t.sc-unique-btn-10");
                break;
            case "birpara":
                return array("brec_b");
                break;
            case "first":
                return array("sc_b_ini_b.sc-unique-btn-11");
                break;
            case "back":
                return array("sc_b_ret_b.sc-unique-btn-12");
                break;
            case "forward":
                return array("sc_b_avc_b.sc-unique-btn-13");
                break;
            case "last":
                return array("sc_b_fim_b.sc-unique-btn-14");
                break;
        }

        return array($buttonName);
    } // getButtonIds

}
?>
