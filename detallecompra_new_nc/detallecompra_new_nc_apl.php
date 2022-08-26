<?php
//
class detallecompra_new_nc_apl
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
   var $iddet_;
   var $idfaccom_;
   var $idpro_;
   var $idbod_;
   var $idbod__1;
   var $cantidad_;
   var $valorunit_;
   var $valorpar_;
   var $iva_;
   var $descuento_;
   var $tasaiva_;
   var $tasadesc_;
   var $devuelto_;
   var $colores_;
   var $colores__1;
   var $tallas_;
   var $tallas__1;
   var $sabor_;
   var $sabor__1;
   var $vencimiento_;
   var $lote_;
   var $descr_;
   var $fecha_fab_;
   var $serial_codbarra_;
   var $porc_desc_;
   var $unidad_c_;
   var $num_ndevolucion_;
   var $tipo_docu_;
   var $tipo_trans_;
   var $id_nota_;
   var $cod_barras_;
   var $presentacion_;
   var $ver_;
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
   var $sc_max_reg = 1; 
   var $sc_max_reg_incl = 30; 
   var $form_vert_detallecompra_new_nc = array();
   var $form_paginacao = 'total';
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
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['cantidad_']))
          {
              $this->cantidad_ = $this->NM_ajax_info['param']['cantidad_'];
          }
          if (isset($this->NM_ajax_info['param']['cod_barras_']))
          {
              $this->cod_barras_ = $this->NM_ajax_info['param']['cod_barras_'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['descuento_']))
          {
              $this->descuento_ = $this->NM_ajax_info['param']['descuento_'];
          }
          if (isset($this->NM_ajax_info['param']['devuelto_']))
          {
              $this->devuelto_ = $this->NM_ajax_info['param']['devuelto_'];
          }
          if (isset($this->NM_ajax_info['param']['id_nota_']))
          {
              $this->id_nota_ = $this->NM_ajax_info['param']['id_nota_'];
          }
          if (isset($this->NM_ajax_info['param']['idbod_']))
          {
              $this->idbod_ = $this->NM_ajax_info['param']['idbod_'];
          }
          if (isset($this->NM_ajax_info['param']['iddet_']))
          {
              $this->iddet_ = $this->NM_ajax_info['param']['iddet_'];
          }
          if (isset($this->NM_ajax_info['param']['idfaccom_']))
          {
              $this->idfaccom_ = $this->NM_ajax_info['param']['idfaccom_'];
          }
          if (isset($this->NM_ajax_info['param']['idpro_']))
          {
              $this->idpro_ = $this->NM_ajax_info['param']['idpro_'];
          }
          if (isset($this->NM_ajax_info['param']['iva_']))
          {
              $this->iva_ = $this->NM_ajax_info['param']['iva_'];
          }
          if (isset($this->NM_ajax_info['param']['lote_']))
          {
              $this->lote_ = $this->NM_ajax_info['param']['lote_'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_row']))
          {
              $this->nmgp_refresh_row = $this->NM_ajax_info['param']['nmgp_refresh_row'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['porc_desc_']))
          {
              $this->porc_desc_ = $this->NM_ajax_info['param']['porc_desc_'];
          }
          if (isset($this->NM_ajax_info['param']['presentacion_']))
          {
              $this->presentacion_ = $this->NM_ajax_info['param']['presentacion_'];
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
          if (isset($this->NM_ajax_info['param']['serial_codbarra_']))
          {
              $this->serial_codbarra_ = $this->NM_ajax_info['param']['serial_codbarra_'];
          }
          if (isset($this->NM_ajax_info['param']['tasadesc_']))
          {
              $this->tasadesc_ = $this->NM_ajax_info['param']['tasadesc_'];
          }
          if (isset($this->NM_ajax_info['param']['tasaiva_']))
          {
              $this->tasaiva_ = $this->NM_ajax_info['param']['tasaiva_'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_docu_']))
          {
              $this->tipo_docu_ = $this->NM_ajax_info['param']['tipo_docu_'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_trans_']))
          {
              $this->tipo_trans_ = $this->NM_ajax_info['param']['tipo_trans_'];
          }
          if (isset($this->NM_ajax_info['param']['valorpar_']))
          {
              $this->valorpar_ = $this->NM_ajax_info['param']['valorpar_'];
          }
          if (isset($this->NM_ajax_info['param']['valorunit_']))
          {
              $this->valorunit_ = $this->NM_ajax_info['param']['valorunit_'];
          }
          if (isset($this->NM_ajax_info['param']['vencimiento_']))
          {
              $this->vencimiento_ = $this->NM_ajax_info['param']['vencimiento_'];
          }
          if (isset($this->NM_ajax_info['param']['ver_']))
          {
              $this->ver_ = $this->NM_ajax_info['param']['ver_'];
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
      $this->sc_conv_var['iddet'] = "iddet_";
      $this->sc_conv_var['idfaccom'] = "idfaccom_";
      $this->sc_conv_var['idpro'] = "idpro_";
      $this->sc_conv_var['idbod'] = "idbod_";
      $this->sc_conv_var['cantidad'] = "cantidad_";
      $this->sc_conv_var['valorunit'] = "valorunit_";
      $this->sc_conv_var['valorpar'] = "valorpar_";
      $this->sc_conv_var['iva'] = "iva_";
      $this->sc_conv_var['descuento'] = "descuento_";
      $this->sc_conv_var['tasaiva'] = "tasaiva_";
      $this->sc_conv_var['tasadesc'] = "tasadesc_";
      $this->sc_conv_var['devuelto'] = "devuelto_";
      $this->sc_conv_var['colores'] = "colores_";
      $this->sc_conv_var['tallas'] = "tallas_";
      $this->sc_conv_var['sabor'] = "sabor_";
      $this->sc_conv_var['vencimiento'] = "vencimiento_";
      $this->sc_conv_var['lote'] = "lote_";
      $this->sc_conv_var['descr'] = "descr_";
      $this->sc_conv_var['fecha_fab'] = "fecha_fab_";
      $this->sc_conv_var['serial_codbarra'] = "serial_codbarra_";
      $this->sc_conv_var['porc_desc'] = "porc_desc_";
      $this->sc_conv_var['unidad_c'] = "unidad_c_";
      $this->sc_conv_var['num_ndevolucion'] = "num_ndevolucion_";
      $this->sc_conv_var['tipo_docu'] = "tipo_docu_";
      $this->sc_conv_var['tipo_trans'] = "tipo_trans_";
      $this->sc_conv_var['id_nota'] = "id_nota_";
      $this->sc_conv_var['cod_barras'] = "cod_barras_";
      $this->sc_conv_var['presentacion'] = "presentacion_";
      $this->sc_conv_var['ver'] = "ver_";
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
      if (isset($this->gNFac) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gNFac'] = $this->gNFac;
      }
      if (isset($this->valorpar) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['valorpar'] = $this->valorpar;
      }
      if (isset($this->edit_cantidad) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['edit_cantidad'] = $this->edit_cantidad;
      }
      if (isset($this->regimen_emp) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['regimen_emp'] = $this->regimen_emp;
      }
      if (isset($this->sw) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['sw'] = $this->sw;
      }
      if (isset($this->gidtercero) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gidtercero'] = $this->gidtercero;
      }
      if (isset($this->vS_1) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['vS_1'] = $this->vS_1;
      }
      if (isset($this->vS_2) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['vS_2'] = $this->vS_2;
      }
      if (isset($this->vS_3) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['vS_3'] = $this->vS_3;
      }
      if (isset($this->gSw_1) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gSw_1'] = $this->gSw_1;
      }
      if (isset($this->gSw_2) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gSw_2'] = $this->gSw_2;
      }
      if (isset($this->gSw_3) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gSw_3'] = $this->gSw_3;
      }
      if (isset($this->cost_ant) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['cost_ant'] = $this->cost_ant;
      }
      if (isset($this->gTcompra) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gTcompra'] = $this->gTcompra;
      }
      if (isset($_POST["par_idfaccom"]) && isset($this->par_idfaccom)) 
      {
          $_SESSION['par_idfaccom'] = $this->par_idfaccom;
      }
      if (isset($_POST["gNFac"]) && isset($this->gNFac)) 
      {
          $_SESSION['gNFac'] = $this->gNFac;
      }
      if (!isset($_POST["gNFac"]) && isset($_POST["gnfac"])) 
      {
          $_SESSION['gNFac'] = $_POST["gnfac"];
      }
      if (isset($_POST["valorpar"]) && isset($this->valorpar)) 
      {
          $_SESSION['valorpar'] = $this->valorpar;
      }
      if (isset($_POST["edit_cantidad"]) && isset($this->edit_cantidad)) 
      {
          $_SESSION['edit_cantidad'] = $this->edit_cantidad;
      }
      if (isset($_POST["regimen_emp"]) && isset($this->regimen_emp)) 
      {
          $_SESSION['regimen_emp'] = $this->regimen_emp;
      }
      if (isset($_POST["sw"]) && isset($this->sw)) 
      {
          $_SESSION['sw'] = $this->sw;
      }
      if (isset($_POST["gidtercero"]) && isset($this->gidtercero)) 
      {
          $_SESSION['gidtercero'] = $this->gidtercero;
      }
      if (isset($_POST["vS_1"]) && isset($this->vS_1)) 
      {
          $_SESSION['vS_1'] = $this->vS_1;
      }
      if (!isset($_POST["vS_1"]) && isset($_POST["vs_1"])) 
      {
          $_SESSION['vS_1'] = $_POST["vs_1"];
      }
      if (isset($_POST["vS_2"]) && isset($this->vS_2)) 
      {
          $_SESSION['vS_2'] = $this->vS_2;
      }
      if (!isset($_POST["vS_2"]) && isset($_POST["vs_2"])) 
      {
          $_SESSION['vS_2'] = $_POST["vs_2"];
      }
      if (isset($_POST["vS_3"]) && isset($this->vS_3)) 
      {
          $_SESSION['vS_3'] = $this->vS_3;
      }
      if (!isset($_POST["vS_3"]) && isset($_POST["vs_3"])) 
      {
          $_SESSION['vS_3'] = $_POST["vs_3"];
      }
      if (isset($_POST["gSw_1"]) && isset($this->gSw_1)) 
      {
          $_SESSION['gSw_1'] = $this->gSw_1;
      }
      if (!isset($_POST["gSw_1"]) && isset($_POST["gsw_1"])) 
      {
          $_SESSION['gSw_1'] = $_POST["gsw_1"];
      }
      if (isset($_POST["gSw_2"]) && isset($this->gSw_2)) 
      {
          $_SESSION['gSw_2'] = $this->gSw_2;
      }
      if (!isset($_POST["gSw_2"]) && isset($_POST["gsw_2"])) 
      {
          $_SESSION['gSw_2'] = $_POST["gsw_2"];
      }
      if (isset($_POST["gSw_3"]) && isset($this->gSw_3)) 
      {
          $_SESSION['gSw_3'] = $this->gSw_3;
      }
      if (!isset($_POST["gSw_3"]) && isset($_POST["gsw_3"])) 
      {
          $_SESSION['gSw_3'] = $_POST["gsw_3"];
      }
      if (isset($_POST["cost_ant"]) && isset($this->cost_ant)) 
      {
          $_SESSION['cost_ant'] = $this->cost_ant;
      }
      if (isset($_POST["gTcompra"]) && isset($this->gTcompra)) 
      {
          $_SESSION['gTcompra'] = $this->gTcompra;
      }
      if (!isset($_POST["gTcompra"]) && isset($_POST["gtcompra"])) 
      {
          $_SESSION['gTcompra'] = $_POST["gtcompra"];
      }
      if (isset($_GET["par_idfaccom"]) && isset($this->par_idfaccom)) 
      {
          $_SESSION['par_idfaccom'] = $this->par_idfaccom;
      }
      if (isset($_GET["gNFac"]) && isset($this->gNFac)) 
      {
          $_SESSION['gNFac'] = $this->gNFac;
      }
      if (!isset($_GET["gNFac"]) && isset($_GET["gnfac"])) 
      {
          $_SESSION['gNFac'] = $_GET["gnfac"];
      }
      if (isset($_GET["valorpar"]) && isset($this->valorpar)) 
      {
          $_SESSION['valorpar'] = $this->valorpar;
      }
      if (isset($_GET["edit_cantidad"]) && isset($this->edit_cantidad)) 
      {
          $_SESSION['edit_cantidad'] = $this->edit_cantidad;
      }
      if (isset($_GET["regimen_emp"]) && isset($this->regimen_emp)) 
      {
          $_SESSION['regimen_emp'] = $this->regimen_emp;
      }
      if (isset($_GET["sw"]) && isset($this->sw)) 
      {
          $_SESSION['sw'] = $this->sw;
      }
      if (isset($_GET["gidtercero"]) && isset($this->gidtercero)) 
      {
          $_SESSION['gidtercero'] = $this->gidtercero;
      }
      if (isset($_GET["vS_1"]) && isset($this->vS_1)) 
      {
          $_SESSION['vS_1'] = $this->vS_1;
      }
      if (!isset($_GET["vS_1"]) && isset($_GET["vs_1"])) 
      {
          $_SESSION['vS_1'] = $_GET["vs_1"];
      }
      if (isset($_GET["vS_2"]) && isset($this->vS_2)) 
      {
          $_SESSION['vS_2'] = $this->vS_2;
      }
      if (!isset($_GET["vS_2"]) && isset($_GET["vs_2"])) 
      {
          $_SESSION['vS_2'] = $_GET["vs_2"];
      }
      if (isset($_GET["vS_3"]) && isset($this->vS_3)) 
      {
          $_SESSION['vS_3'] = $this->vS_3;
      }
      if (!isset($_GET["vS_3"]) && isset($_GET["vs_3"])) 
      {
          $_SESSION['vS_3'] = $_GET["vs_3"];
      }
      if (isset($_GET["gSw_1"]) && isset($this->gSw_1)) 
      {
          $_SESSION['gSw_1'] = $this->gSw_1;
      }
      if (!isset($_GET["gSw_1"]) && isset($_GET["gsw_1"])) 
      {
          $_SESSION['gSw_1'] = $_GET["gsw_1"];
      }
      if (isset($_GET["gSw_2"]) && isset($this->gSw_2)) 
      {
          $_SESSION['gSw_2'] = $this->gSw_2;
      }
      if (!isset($_GET["gSw_2"]) && isset($_GET["gsw_2"])) 
      {
          $_SESSION['gSw_2'] = $_GET["gsw_2"];
      }
      if (isset($_GET["gSw_3"]) && isset($this->gSw_3)) 
      {
          $_SESSION['gSw_3'] = $this->gSw_3;
      }
      if (!isset($_GET["gSw_3"]) && isset($_GET["gsw_3"])) 
      {
          $_SESSION['gSw_3'] = $_GET["gsw_3"];
      }
      if (isset($_GET["cost_ant"]) && isset($this->cost_ant)) 
      {
          $_SESSION['cost_ant'] = $this->cost_ant;
      }
      if (isset($_GET["gTcompra"]) && isset($this->gTcompra)) 
      {
          $_SESSION['gTcompra'] = $this->gTcompra;
      }
      if (!isset($_GET["gTcompra"]) && isset($_GET["gtcompra"])) 
      {
          $_SESSION['gTcompra'] = $_GET["gtcompra"];
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['detallecompra_new_nc']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['detallecompra_new_nc']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['detallecompra_new_nc']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['detallecompra_new_nc']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['detallecompra_new_nc']['embutida_parms']);
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
                 nm_limpa_str_detallecompra_new_nc($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 if ($cadapar[0] == "iddet_")
                 {
                     $this->NM_where_filter .= (empty($this->NM_where_filter)) ? "(" : " and ";
                     $this->NM_where_filter .= "iddet = " . $this->iddet_;
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
          if (isset($this->par_idfaccom)) 
          {
              $_SESSION['par_idfaccom'] = $this->par_idfaccom;
          }
          if (!isset($this->gNFac) && isset($this->gnfac)) 
          {
              $this->gNFac = $this->gnfac;
          }
          if (isset($this->gNFac)) 
          {
              $_SESSION['gNFac'] = $this->gNFac;
          }
          if (isset($this->valorpar)) 
          {
              $_SESSION['valorpar'] = $this->valorpar;
          }
          if (isset($this->edit_cantidad)) 
          {
              $_SESSION['edit_cantidad'] = $this->edit_cantidad;
          }
          if (isset($this->regimen_emp)) 
          {
              $_SESSION['regimen_emp'] = $this->regimen_emp;
          }
          if (isset($this->sw)) 
          {
              $_SESSION['sw'] = $this->sw;
          }
          if (isset($this->gidtercero)) 
          {
              $_SESSION['gidtercero'] = $this->gidtercero;
          }
          if (!isset($this->vS_1) && isset($this->vs_1)) 
          {
              $this->vS_1 = $this->vs_1;
          }
          if (isset($this->vS_1)) 
          {
              $_SESSION['vS_1'] = $this->vS_1;
          }
          if (!isset($this->vS_2) && isset($this->vs_2)) 
          {
              $this->vS_2 = $this->vs_2;
          }
          if (isset($this->vS_2)) 
          {
              $_SESSION['vS_2'] = $this->vS_2;
          }
          if (!isset($this->vS_3) && isset($this->vs_3)) 
          {
              $this->vS_3 = $this->vs_3;
          }
          if (isset($this->vS_3)) 
          {
              $_SESSION['vS_3'] = $this->vS_3;
          }
          if (!isset($this->gSw_1) && isset($this->gsw_1)) 
          {
              $this->gSw_1 = $this->gsw_1;
          }
          if (isset($this->gSw_1)) 
          {
              $_SESSION['gSw_1'] = $this->gSw_1;
          }
          if (!isset($this->gSw_2) && isset($this->gsw_2)) 
          {
              $this->gSw_2 = $this->gsw_2;
          }
          if (isset($this->gSw_2)) 
          {
              $_SESSION['gSw_2'] = $this->gSw_2;
          }
          if (!isset($this->gSw_3) && isset($this->gsw_3)) 
          {
              $this->gSw_3 = $this->gsw_3;
          }
          if (isset($this->gSw_3)) 
          {
              $_SESSION['gSw_3'] = $this->gSw_3;
          }
          if (isset($this->cost_ant)) 
          {
              $_SESSION['cost_ant'] = $this->cost_ant;
          }
          if (!isset($this->gTcompra) && isset($this->gtcompra)) 
          {
              $this->gTcompra = $this->gtcompra;
          }
          if (isset($this->gTcompra)) 
          {
              $_SESSION['gTcompra'] = $this->gTcompra;
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
              $_SESSION['sc_session'][$script_case_init]['detallecompra_new_nc']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['detallecompra_new_nc']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['detallecompra_new_nc']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['detallecompra_new_nc']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->par_idfaccom)) 
          {
              $_SESSION['par_idfaccom'] = $this->par_idfaccom;
          }
          if (!isset($this->gNFac) && isset($this->gnfac)) 
          {
              $this->gNFac = $this->gnfac;
          }
          if (isset($this->gNFac)) 
          {
              $_SESSION['gNFac'] = $this->gNFac;
          }
          if (isset($this->valorpar)) 
          {
              $_SESSION['valorpar'] = $this->valorpar;
          }
          if (isset($this->edit_cantidad)) 
          {
              $_SESSION['edit_cantidad'] = $this->edit_cantidad;
          }
          if (isset($this->regimen_emp)) 
          {
              $_SESSION['regimen_emp'] = $this->regimen_emp;
          }
          if (isset($this->sw)) 
          {
              $_SESSION['sw'] = $this->sw;
          }
          if (isset($this->gidtercero)) 
          {
              $_SESSION['gidtercero'] = $this->gidtercero;
          }
          if (!isset($this->vS_1) && isset($this->vs_1)) 
          {
              $this->vS_1 = $this->vs_1;
          }
          if (isset($this->vS_1)) 
          {
              $_SESSION['vS_1'] = $this->vS_1;
          }
          if (!isset($this->vS_2) && isset($this->vs_2)) 
          {
              $this->vS_2 = $this->vs_2;
          }
          if (isset($this->vS_2)) 
          {
              $_SESSION['vS_2'] = $this->vS_2;
          }
          if (!isset($this->vS_3) && isset($this->vs_3)) 
          {
              $this->vS_3 = $this->vs_3;
          }
          if (isset($this->vS_3)) 
          {
              $_SESSION['vS_3'] = $this->vS_3;
          }
          if (!isset($this->gSw_1) && isset($this->gsw_1)) 
          {
              $this->gSw_1 = $this->gsw_1;
          }
          if (isset($this->gSw_1)) 
          {
              $_SESSION['gSw_1'] = $this->gSw_1;
          }
          if (!isset($this->gSw_2) && isset($this->gsw_2)) 
          {
              $this->gSw_2 = $this->gsw_2;
          }
          if (isset($this->gSw_2)) 
          {
              $_SESSION['gSw_2'] = $this->gSw_2;
          }
          if (!isset($this->gSw_3) && isset($this->gsw_3)) 
          {
              $this->gSw_3 = $this->gsw_3;
          }
          if (isset($this->gSw_3)) 
          {
              $_SESSION['gSw_3'] = $this->gSw_3;
          }
          if (isset($this->cost_ant)) 
          {
              $_SESSION['cost_ant'] = $this->cost_ant;
          }
          if (!isset($this->gTcompra) && isset($this->gtcompra)) 
          {
              $this->gTcompra = $this->gtcompra;
          }
          if (isset($this->gTcompra)) 
          {
              $_SESSION['gTcompra'] = $this->gTcompra;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['detallecompra_new_nc']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['detallecompra_new_nc']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['detallecompra_new_nc']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['detallecompra_new_nc']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['detallecompra_new_nc']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['detallecompra_new_nc']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['detallecompra_new_nc']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['detallecompra_new_nc']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['detallecompra_new_nc']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['detallecompra_new_nc']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new detallecompra_new_nc_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['initialize'])
          {
              $_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_iva_ = $this->iva_;
    $original_tasaiva_ = $this->tasaiva_;
}
if (!isset($this->sc_temp_gSw_3)) {$this->sc_temp_gSw_3 = (isset($_SESSION['gSw_3'])) ? $_SESSION['gSw_3'] : "";}
if (!isset($this->sc_temp_gSw_2)) {$this->sc_temp_gSw_2 = (isset($_SESSION['gSw_2'])) ? $_SESSION['gSw_2'] : "";}
if (!isset($this->sc_temp_gSw_1)) {$this->sc_temp_gSw_1 = (isset($_SESSION['gSw_1'])) ? $_SESSION['gSw_1'] : "";}
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
	$this->iva_ =0;
	$this->tasaiva_ =0;
	$this->nmgp_cmp_hidden["iva_"] = "off"; $this->NM_ajax_info['fieldDisplay']['iva_'] = 'off';
	}
$this->sc_temp_gSw_1=0;
$this->sc_temp_gSw_2=0;
$this->sc_temp_gSw_3=0;
if (isset($this->sc_temp_regimen_emp)) { $_SESSION['regimen_emp'] = $this->sc_temp_regimen_emp;}
if (isset($this->sc_temp_gSw_1)) { $_SESSION['gSw_1'] = $this->sc_temp_gSw_1;}
if (isset($this->sc_temp_gSw_2)) { $_SESSION['gSw_2'] = $this->sc_temp_gSw_2;}
if (isset($this->sc_temp_gSw_3)) { $_SESSION['gSw_3'] = $this->sc_temp_gSw_3;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_iva_ != $this->iva_ || (isset($bFlagRead_iva_) && $bFlagRead_iva_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['iva_' . $this->nmgp_refresh_row]['type']    = 'label';
        $this->NM_ajax_info['fldList']['iva_' . $this->nmgp_refresh_row]['valList'] = array($this->iva_);
        $this->NM_ajax_changed['iva_'] = true;
    }
    if (($original_tasaiva_ != $this->tasaiva_ || (isset($bFlagRead_tasaiva_) && $bFlagRead_tasaiva_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['tasaiva_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['tasaiva_' . $this->nmgp_refresh_row]['valList'] = array($this->tasaiva_);
        $this->NM_ajax_changed['tasaiva_'] = true;
    }
}
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off';
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['detallecompra_new_nc']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['detallecompra_new_nc']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['detallecompra_new_nc'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['detallecompra_new_nc']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['detallecompra_new_nc']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('detallecompra_new_nc') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['detallecompra_new_nc']['label'] = "Agregar Detalle";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "detallecompra_new_nc")
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



      $_SESSION['scriptcase']['error_icon']['detallecompra_new_nc']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['detallecompra_new_nc'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_orig'] = " where idfaccom=" . $_SESSION['par_idfaccom'] . "
and cantidad >0";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_pesq'] = " where idfaccom=" . $_SESSION['par_idfaccom'] . "
and cantidad >0";
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detallecompra_new_nc']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['detallecompra_new_nc'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['detallecompra_new_nc'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field . "_"] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field . "_"] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("detallecompra_new_nc", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'detallecompra_new_nc_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'detallecompra_new_nc_help.txt');
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
          require_once($this->Ini->path_embutida . 'detallecompra_new_nc/detallecompra_new_nc_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "detallecompra_new_nc_erro.class.php"); 
      }
      $this->Erro      = new detallecompra_new_nc_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['sc_max_reg']) && strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['sc_max_reg']) == "all")
      {
          $this->form_paginacao = "total";
      }
      $this->proc_fast_search = false;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['opcao']))
         { 
             if ($this->iddet_ != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['final'];
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
      if (!isset($this->NM_ajax_flag) || ('validate_' != substr($this->NM_ajax_opcao, 0, 9) && 'add_new_line' != $this->NM_ajax_opcao && 'autocomp_' != substr($this->NM_ajax_opcao, 0, 9)))
      {
      $_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gSw_3)) {$this->sc_temp_gSw_3 = (isset($_SESSION['gSw_3'])) ? $_SESSION['gSw_3'] : "";}
if (!isset($this->sc_temp_gSw_2)) {$this->sc_temp_gSw_2 = (isset($_SESSION['gSw_2'])) ? $_SESSION['gSw_2'] : "";}
if (!isset($this->sc_temp_gSw_1)) {$this->sc_temp_gSw_1 = (isset($_SESSION['gSw_1'])) ? $_SESSION['gSw_1'] : "";}
if (!isset($this->sc_temp_gNFac)) {$this->sc_temp_gNFac = (isset($_SESSION['gNFac'])) ? $_SESSION['gNFac'] : "";}
if (!isset($this->sc_temp_par_idfaccom)) {$this->sc_temp_par_idfaccom = (isset($_SESSION['par_idfaccom'])) ? $_SESSION['par_idfaccom'] : "";}
  $this->sc_temp_par_idfaccom;
 
      $nm_select = "select numfacom from facturacom where idfaccom=$this->sc_temp_par_idfaccom"; 
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
	$this->sc_temp_gNFac=$this->des[0][0];
	}
else
	{
	$this->sc_temp_gNFac='SIN COMPRA RELACIONADA';
	}
$this->sc_temp_gSw_1=0;
$this->sc_temp_gSw_2=0;
$this->sc_temp_gSw_3=0;
if (isset($this->sc_temp_par_idfaccom)) { $_SESSION['par_idfaccom'] = $this->sc_temp_par_idfaccom;}
if (isset($this->sc_temp_gNFac)) { $_SESSION['gNFac'] = $this->sc_temp_gNFac;}
if (isset($this->sc_temp_gSw_1)) { $_SESSION['gSw_1'] = $this->sc_temp_gSw_1;}
if (isset($this->sc_temp_gSw_2)) { $_SESSION['gSw_2'] = $this->sc_temp_gSw_2;}
if (isset($this->sc_temp_gSw_3)) { $_SESSION['gSw_3'] = $this->sc_temp_gSw_3;}
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off'; 
      }
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['detallecompra_new_nc']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['detallecompra_new_nc']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
      if ($nm_opc_lookup == "lookup")
      { 
          if ($GLOBALS['F'] == "presentacion_")
          { 
              $nm_parms   = substr($GLOBALS['P0'], 1, strlen($GLOBALS['P0']) - 2);
              $array_vars = explode(",", $nm_parms);
              $this->presentacion_ = $array_vars[0];
              $presentacion_       = $this->presentacion_;
              $this->presentacion_       = $presentacion_;
              $this->lookup_presentacion_($conteudo);
              $conteudo = str_replace("&", "&amp;", $conteudo); 
              $conteudo = str_replace("\/" , "\/", $conteudo); 
              echo "<html><head></head>";
              echo " <body onload=\"p=document.layers?parentLayer:window.parent;p.jsrsLoaded('" . $GLOBALS['C'] . "');\">";
              echo "  jsrsPayload:";
              echo "  <br>";
              echo "  <form name=\"jsrs_Form\"><textarea name=\"jsrs_Payload\">";
              echo "$conteudo";
              echo " </textarea></form></body></html>";
          } 
          $this->NM_close_db(); 
          exit;
      } 
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- cantidad_
      $this->field_config['cantidad_']               = array();
      $this->field_config['cantidad_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cantidad_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cantidad_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['cantidad_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cantidad_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- valorunit_
      $this->field_config['valorunit_']               = array();
      $this->field_config['valorunit_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['valorunit_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valorunit_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['valorunit_']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['valorunit_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['valorunit_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- porc_desc_
      $this->field_config['porc_desc_']               = array();
      $this->field_config['porc_desc_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['porc_desc_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['porc_desc_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['porc_desc_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['porc_desc_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- descuento_
      $this->field_config['descuento_']               = array();
      $this->field_config['descuento_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['descuento_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['descuento_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['descuento_']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['descuento_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['descuento_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- valorpar_
      $this->field_config['valorpar_']               = array();
      $this->field_config['valorpar_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['valorpar_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valorpar_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['valorpar_']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['valorpar_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['valorpar_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- iva_
      $this->field_config['iva_']               = array();
      $this->field_config['iva_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['iva_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['iva_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['iva_']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['iva_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['iva_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- tasaiva_
      $this->field_config['tasaiva_']               = array();
      $this->field_config['tasaiva_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['tasaiva_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['tasaiva_']['symbol_dec'] = '';
      $this->field_config['tasaiva_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['tasaiva_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- tasadesc_
      $this->field_config['tasadesc_']               = array();
      $this->field_config['tasadesc_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['tasadesc_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['tasadesc_']['symbol_dec'] = '';
      $this->field_config['tasadesc_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['tasadesc_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- devuelto_
      $this->field_config['devuelto_']               = array();
      $this->field_config['devuelto_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['devuelto_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['devuelto_']['symbol_dec'] = '';
      $this->field_config['devuelto_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['devuelto_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- vencimiento_
      $this->field_config['vencimiento_']                 = array();
      $this->field_config['vencimiento_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['vencimiento_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['vencimiento_']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'vencimiento_');
      //-- iddet_
      $this->field_config['iddet_']               = array();
      $this->field_config['iddet_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['iddet_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['iddet_']['symbol_dec'] = '';
      $this->field_config['iddet_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['iddet_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- idfaccom_
      $this->field_config['idfaccom_']               = array();
      $this->field_config['idfaccom_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idfaccom_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idfaccom_']['symbol_dec'] = '';
      $this->field_config['idfaccom_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idfaccom_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- id_nota_
      $this->field_config['id_nota_']               = array();
      $this->field_config['id_nota_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_nota_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_nota_']['symbol_dec'] = '';
      $this->field_config['id_nota_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_nota_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fecha_fab_
      $this->field_config['fecha_fab_']                 = array();
      $this->field_config['fecha_fab_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fecha_fab_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha_fab_']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fecha_fab_');
      //-- num_ndevolucion_
      $this->field_config['num_ndevolucion_']               = array();
      $this->field_config['num_ndevolucion_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['num_ndevolucion_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['num_ndevolucion_']['symbol_dec'] = '';
      $this->field_config['num_ndevolucion_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['num_ndevolucion_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['sc_max_reg'] = $this->nmgp_max_line;
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['opc_edit'] = true;  
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
         detallecompra_new_nc_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'backup_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "igual";
         $this->nm_tira_formatacao();
         $this->nm_converte_datas();
         $this->nm_select_banco();
         $this->ajax_return_values();
         $this->NM_close_db();
         detallecompra_new_nc_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'submit_form' == $this->NM_ajax_opcao)
      {
         if (isset($this->iddet_)) { $this->nm_limpa_alfa($this->iddet_); }
         if (isset($this->idfaccom_)) { $this->nm_limpa_alfa($this->idfaccom_); }
         if (isset($this->idpro_)) { $this->nm_limpa_alfa($this->idpro_); }
         if (isset($this->idbod_)) { $this->nm_limpa_alfa($this->idbod_); }
         if (isset($this->cantidad_)) { $this->nm_limpa_alfa($this->cantidad_); }
         if (isset($this->valorunit_)) { $this->nm_limpa_alfa($this->valorunit_); }
         if (isset($this->valorpar_)) { $this->nm_limpa_alfa($this->valorpar_); }
         if (isset($this->iva_)) { $this->nm_limpa_alfa($this->iva_); }
         if (isset($this->descuento_)) { $this->nm_limpa_alfa($this->descuento_); }
         if (isset($this->tasaiva_)) { $this->nm_limpa_alfa($this->tasaiva_); }
         if (isset($this->tasadesc_)) { $this->nm_limpa_alfa($this->tasadesc_); }
         if (isset($this->devuelto_)) { $this->nm_limpa_alfa($this->devuelto_); }
         if (isset($this->lote_)) { $this->nm_limpa_alfa($this->lote_); }
         if (isset($this->serial_codbarra_)) { $this->nm_limpa_alfa($this->serial_codbarra_); }
         if (isset($this->porc_desc_)) { $this->nm_limpa_alfa($this->porc_desc_); }
         if (isset($this->tipo_docu_)) { $this->nm_limpa_alfa($this->tipo_docu_); }
         if (isset($this->tipo_trans_)) { $this->nm_limpa_alfa($this->tipo_trans_); }
         if (isset($this->id_nota_)) { $this->nm_limpa_alfa($this->id_nota_); }
         if (isset($this->Sc_num_lin_alt) && $this->Sc_num_lin_alt > 0) 
         {
             $sc_seq_vert = $this->Sc_num_lin_alt;
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_form'][$sc_seq_vert];
             $this->colores_ = $this->nmgp_dados_form['colores_']; 
             $this->tallas_ = $this->nmgp_dados_form['tallas_']; 
             $this->sabor_ = $this->nmgp_dados_form['sabor_']; 
             $this->descr_ = $this->nmgp_dados_form['descr_']; 
             $this->fecha_fab_ = $this->nmgp_dados_form['fecha_fab_']; 
             $this->unidad_c_ = $this->nmgp_dados_form['unidad_c_']; 
             $this->num_ndevolucion_ = $this->nmgp_dados_form['num_ndevolucion_']; 
         }
         $this->controle_form_vert();
         if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
         {
             $this->NM_rollback_db();
              if ($this->NM_ajax_flag)
              {
                  if (!isset($this->NM_ajax_info['errList']['geral_detallecompra_new_nc']) || !is_array($this->NM_ajax_info['errList']['geral_detallecompra_new_nc']))
                  {
                      $this->NM_ajax_info['errList']['geral_detallecompra_new_nc'] = array();
                  }
                  if ($Campos_Crit != "")
                  {
                      $this->NM_ajax_info['errList']['geral_detallecompra_new_nc'][] = $Campos_Crit;
                  }
                  if (!empty($Campos_Falta))
                  {
                      $this->NM_ajax_info['errList']['geral_detallecompra_new_nc'][] = $this->Formata_Campos_Falta($Campos_Falta);
                  }
                  if ($this->Campos_Mens_erro != "")
                  {
                      $this->NM_ajax_info['errList']['geral_detallecompra_new_nc'][] = $this->Campos_Mens_erro;
                  }
              }
         }
         else
         {
             $this->NM_commit_db();
         }
         if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['sc_redir_atualiz'] == "ok")
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
         detallecompra_new_nc_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
          if ('validate_cod_barras_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cod_barras_');
          }
          if ('validate_idpro_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idpro_');
          }
          if ('validate_ver_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ver_');
          }
          if ('validate_presentacion_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'presentacion_');
          }
          if ('validate_cantidad_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cantidad_');
          }
          if ('validate_valorunit_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valorunit_');
          }
          if ('validate_porc_desc_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'porc_desc_');
          }
          if ('validate_descuento_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'descuento_');
          }
          if ('validate_valorpar_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valorpar_');
          }
          if ('validate_iva_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'iva_');
          }
          if ('validate_idbod_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idbod_');
          }
          if ('validate_tasaiva_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tasaiva_');
          }
          if ('validate_tasadesc_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tasadesc_');
          }
          if ('validate_devuelto_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'devuelto_');
          }
          if ('validate_vencimiento_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'vencimiento_');
          }
          if ('validate_lote_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'lote_');
          }
          if ('validate_serial_codbarra_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'serial_codbarra_');
          }
          if ('validate_iddet_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'iddet_');
          }
          if ('validate_idfaccom_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idfaccom_');
          }
          if ('validate_tipo_docu_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_docu_');
          }
          if ('validate_tipo_trans_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_trans_');
          }
          if ('validate_id_nota_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_nota_');
          }
          detallecompra_new_nc_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('autocomp_idpro_' == substr($this->NM_ajax_opcao, 0, strlen('autocomp_idpro_')))
          {
              if (isset($_GET['term'])) {
                  $this->idpro_ = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->idpro_ = '';
              }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idpro_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idpro_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idpro_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idpro_'] = array(); 
    }

   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_porc_desc_ = $this->porc_desc_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_iva_ = $this->iva_;
   $old_value_tasaiva_ = $this->tasaiva_;
   $old_value_tasadesc_ = $this->tasadesc_;
   $old_value_devuelto_ = $this->devuelto_;
   $old_value_vencimiento_ = $this->vencimiento_;
   $old_value_iddet_ = $this->iddet_;
   $old_value_idfaccom_ = $this->idfaccom_;
   $old_value_id_nota_ = $this->id_nota_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_porc_desc_ = $this->porc_desc_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_tasaiva_ = $this->tasaiva_;
   $unformatted_value_tasadesc_ = $this->tasadesc_;
   $unformatted_value_devuelto_ = $this->devuelto_;
   $unformatted_value_vencimiento_ = $this->vencimiento_;
   $unformatted_value_iddet_ = $this->iddet_;
   $unformatted_value_idfaccom_ = $this->idfaccom_;
   $unformatted_value_id_nota_ = $this->id_nota_;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro FROM productos WHERE codigobar + \" - \" + nompro LIKE '%" . substr($this->Db->qstr($this->idpro_), 1, -1) . "%' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idprod, concat(codigobar, \" - \",nompro) FROM productos WHERE concat(codigobar, \" - \",nompro) LIKE '%" . substr($this->Db->qstr($this->idpro_), 1, -1) . "%' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idprod, codigobar&\" - \"&nompro FROM productos WHERE codigobar&\" - \"&nompro LIKE '%" . substr($this->Db->qstr($this->idpro_), 1, -1) . "%' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE codigobar||\" - \"||nompro LIKE '%" . substr($this->Db->qstr($this->idpro_), 1, -1) . "%' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro FROM productos WHERE codigobar + \" - \" + nompro LIKE '%" . substr($this->Db->qstr($this->idpro_), 1, -1) . "%' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE codigobar||\" - \"||nompro LIKE '%" . substr($this->Db->qstr($this->idpro_), 1, -1) . "%' ORDER BY codigobar, nompro";
   }
   else
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE codigobar||\" - \"||nompro LIKE '%" . substr($this->Db->qstr($this->idpro_), 1, -1) . "%' ORDER BY codigobar, nompro";
   }

   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->porc_desc_ = $old_value_porc_desc_;
   $this->descuento_ = $old_value_descuento_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->iva_ = $old_value_iva_;
   $this->tasaiva_ = $old_value_tasaiva_;
   $this->tasadesc_ = $old_value_tasadesc_;
   $this->devuelto_ = $old_value_devuelto_;
   $this->vencimiento_ = $old_value_vencimiento_;
   $this->iddet_ = $old_value_iddet_;
   $this->idfaccom_ = $old_value_idfaccom_;
   $this->id_nota_ = $old_value_id_nota_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(detallecompra_new_nc_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', detallecompra_new_nc_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idpro_'][] = $rs->fields[0];
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
          detallecompra_new_nc_pack_ajax_response();
          exit;
      }
      while ($sc_contr_vert > $sc_seq_vert) 
      { 
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
         $this->cod_barras_ = $GLOBALS["cod_barras_" . $sc_seq_vert]; 
         $this->idpro_ = $GLOBALS["idpro_" . $sc_seq_vert]; 
         $this->ver_ = $GLOBALS["ver_" . $sc_seq_vert]; 
         $this->presentacion_ = $GLOBALS["presentacion_" . $sc_seq_vert]; 
         $this->cantidad_ = $GLOBALS["cantidad_" . $sc_seq_vert]; 
         $this->valorunit_ = $GLOBALS["valorunit_" . $sc_seq_vert]; 
         $this->porc_desc_ = $GLOBALS["porc_desc_" . $sc_seq_vert]; 
         $this->descuento_ = $GLOBALS["descuento_" . $sc_seq_vert]; 
         $this->valorpar_ = $GLOBALS["valorpar_" . $sc_seq_vert]; 
         $this->iva_ = $GLOBALS["iva_" . $sc_seq_vert]; 
         $this->idbod_ = $GLOBALS["idbod_" . $sc_seq_vert]; 
         $this->tasaiva_ = $GLOBALS["tasaiva_" . $sc_seq_vert]; 
         $this->tasadesc_ = $GLOBALS["tasadesc_" . $sc_seq_vert]; 
         $this->devuelto_ = $GLOBALS["devuelto_" . $sc_seq_vert]; 
         $this->vencimiento_ = $GLOBALS["vencimiento_" . $sc_seq_vert]; 
         $this->lote_ = $GLOBALS["lote_" . $sc_seq_vert]; 
         $this->serial_codbarra_ = $GLOBALS["serial_codbarra_" . $sc_seq_vert]; 
         $this->iddet_ = $GLOBALS["iddet_" . $sc_seq_vert]; 
         $this->idfaccom_ = $GLOBALS["idfaccom_" . $sc_seq_vert]; 
         $this->tipo_docu_ = $GLOBALS["tipo_docu_" . $sc_seq_vert]; 
         $this->tipo_trans_ = $GLOBALS["tipo_trans_" . $sc_seq_vert]; 
         $this->id_nota_ = $GLOBALS["id_nota_" . $sc_seq_vert]; 
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_form'][$sc_seq_vert];
             $this->colores_ = $this->nmgp_dados_form['colores_']; 
             $this->tallas_ = $this->nmgp_dados_form['tallas_']; 
             $this->sabor_ = $this->nmgp_dados_form['sabor_']; 
             $this->descr_ = $this->nmgp_dados_form['descr_']; 
             $this->fecha_fab_ = $this->nmgp_dados_form['fecha_fab_']; 
             $this->unidad_c_ = $this->nmgp_dados_form['unidad_c_']; 
             $this->num_ndevolucion_ = $this->nmgp_dados_form['num_ndevolucion_']; 
         }
         if (isset($this->iddet_)) { $this->nm_limpa_alfa($this->iddet_); }
         if (isset($this->idfaccom_)) { $this->nm_limpa_alfa($this->idfaccom_); }
         if (isset($this->idpro_)) { $this->nm_limpa_alfa($this->idpro_); }
         if (isset($this->idbod_)) { $this->nm_limpa_alfa($this->idbod_); }
         if (isset($this->cantidad_)) { $this->nm_limpa_alfa($this->cantidad_); }
         if (isset($this->valorunit_)) { $this->nm_limpa_alfa($this->valorunit_); }
         if (isset($this->valorpar_)) { $this->nm_limpa_alfa($this->valorpar_); }
         if (isset($this->iva_)) { $this->nm_limpa_alfa($this->iva_); }
         if (isset($this->descuento_)) { $this->nm_limpa_alfa($this->descuento_); }
         if (isset($this->tasaiva_)) { $this->nm_limpa_alfa($this->tasaiva_); }
         if (isset($this->tasadesc_)) { $this->nm_limpa_alfa($this->tasadesc_); }
         if (isset($this->devuelto_)) { $this->nm_limpa_alfa($this->devuelto_); }
         if (isset($this->lote_)) { $this->nm_limpa_alfa($this->lote_); }
         if (isset($this->serial_codbarra_)) { $this->nm_limpa_alfa($this->serial_codbarra_); }
         if (isset($this->porc_desc_)) { $this->nm_limpa_alfa($this->porc_desc_); }
         if (isset($this->tipo_docu_)) { $this->nm_limpa_alfa($this->tipo_docu_); }
         if (isset($this->tipo_trans_)) { $this->nm_limpa_alfa($this->tipo_trans_); }
         if (isset($this->id_nota_)) { $this->nm_limpa_alfa($this->id_nota_); }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_form'])) 
         {
            $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_form'][$sc_seq_vert];
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'])) 
         {
            $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert];
         }
         if ($this->nmgp_opcao != "recarga" && (!in_array($sc_seq_vert, $sc_check_excl) && !in_array($sc_seq_vert, $sc_check_incl) ))
         { }
         else
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['sc_disabled'] = array();
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
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['cod_barras_'] =  $this->cod_barras_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['idpro_'] =  $this->idpro_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['ver_'] =  $this->ver_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['presentacion_'] =  $this->presentacion_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['cantidad_'] =  $this->cantidad_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['valorunit_'] =  $this->valorunit_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['porc_desc_'] =  $this->porc_desc_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['descuento_'] =  $this->descuento_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['valorpar_'] =  $this->valorpar_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['iva_'] =  $this->iva_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['idbod_'] =  $this->idbod_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['tasaiva_'] =  $this->tasaiva_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['tasadesc_'] =  $this->tasadesc_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['devuelto_'] =  $this->devuelto_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['vencimiento_'] =  $this->vencimiento_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['lote_'] =  $this->lote_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['serial_codbarra_'] =  $this->serial_codbarra_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['iddet_'] =  $this->iddet_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['idfaccom_'] =  $this->idfaccom_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['tipo_docu_'] =  $this->tipo_docu_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['tipo_trans_'] =  $this->tipo_trans_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['id_nota_'] =  $this->id_nota_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['colores_'] =  $this->colores_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['tallas_'] =  $this->tallas_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['sabor_'] =  $this->sabor_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['descr_'] =  $this->descr_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['fecha_fab_'] =  $this->fecha_fab_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['unidad_c_'] =  $this->unidad_c_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['num_ndevolucion_'] =  $this->num_ndevolucion_; 
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
          $this->nmgp_opcao = "inicio"; 
      }
      if ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $this->nmgp_opcao = 'igual';
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && (!$this->NM_ajax_flag || 'event_' != substr($this->NM_ajax_opcao, 0, 6))) 
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
          if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
          {
              $_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_iva_ = $this->iva_;
    $original_tasaiva_ = $this->tasaiva_;
}
if (!isset($this->sc_temp_regimen_emp)) {$this->sc_temp_regimen_emp = (isset($_SESSION['regimen_emp'])) ? $_SESSION['regimen_emp'] : "";}
  if($this->sc_temp_regimen_emp==0)
	{
	$this->iva_ =0;
	$this->tasaiva_ =0;
	$this->nmgp_cmp_hidden["iva_"] = "off"; $this->NM_ajax_info['fieldDisplay']['iva_'] = 'off';
	}
if (isset($this->sc_temp_regimen_emp)) { $_SESSION['regimen_emp'] = $this->sc_temp_regimen_emp;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_iva_ != $this->iva_ || (isset($bFlagRead_iva_) && $bFlagRead_iva_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['iva_' . $this->nmgp_refresh_row]['type']    = 'label';
        $this->NM_ajax_info['fldList']['iva_' . $this->nmgp_refresh_row]['valList'] = array($this->iva_);
        $this->NM_ajax_changed['iva_'] = true;
    }
    if (($original_tasaiva_ != $this->tasaiva_ || (isset($bFlagRead_tasaiva_) && $bFlagRead_tasaiva_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['tasaiva_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['tasaiva_' . $this->nmgp_refresh_row]['valList'] = array($this->tasaiva_);
        $this->NM_ajax_changed['tasaiva_'] = true;
    }
}
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off'; 
          }
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          $this->NM_close_db();
          detallecompra_new_nc_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
      {
          $this->nm_gera_html();
          $this->NM_ajax_info['tableRefresh'] = NM_charset_to_utf8($this->Table_refresh . $this->New_Line) . '</table>';
          $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
          $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_detallecompra_new_nc);
          $this->NM_ajax_info['fldList']['iddet_']['keyVal'] = sc_htmlentities($this->nmgp_dados_form['iddet_']);
          $this->NM_close_db();
          detallecompra_new_nc_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_cantidad__onchange' == $this->NM_ajax_opcao)
          {
              $this->cantidad__onChange();
          }
          if ('event_cantidad__onfocus' == $this->NM_ajax_opcao)
          {
              $this->cantidad__onFocus();
          }
          if ('event_cod_barras__onchange' == $this->NM_ajax_opcao)
          {
              $this->cod_barras__onChange();
          }
          if ('event_colores__onchange' == $this->NM_ajax_opcao)
          {
              $this->colores__onChange();
          }
          if ('event_descuento__onchange' == $this->NM_ajax_opcao)
          {
              $this->descuento__onChange();
          }
          if ('event_idpro__onchange' == $this->NM_ajax_opcao)
          {
              $this->idpro__onChange();
          }
          if ('event_porc_desc__onchange' == $this->NM_ajax_opcao)
          {
              $this->porc_desc__onChange();
          }
          if ('event_sabor__onchange' == $this->NM_ajax_opcao)
          {
              $this->sabor__onChange();
          }
          if ('event_tallas__onchange' == $this->NM_ajax_opcao)
          {
              $this->tallas__onChange();
          }
          if ('event_valorunit__onblur' == $this->NM_ajax_opcao)
          {
              $this->valorunit__onBlur();
          }
          if ('event_valorunit__onchange' == $this->NM_ajax_opcao)
          {
              $this->valorunit__onChange();
          }
          $this->NM_close_db();
          detallecompra_new_nc_pack_ajax_response();
          exit;
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['sc_redir_atualiz'] == "ok")
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['inline_form_seq'] = $this->sc_seq_row;
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
              detallecompra_new_nc_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          return; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off';
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "detallecompra_new_nc.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Agregar Detalle") ?></TITLE>
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
<form name="Fdown" method="get" action="detallecompra_new_nc_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="detallecompra_new_nc"> 
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
   function lookup_presentacion_(&$conteudo)
   {
      global  $presentacion_;
      $guarda_formatado = $this->formatado;
      $this->nm_tira_formatacao();
      $Salva_opc = $this->nmgp_opcao;
      $this->nmgp_opcao = "lookup_rpc";
      $this->nm_converte_datas();
      $this->nmgp_opcao = $Salva_opc;
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      $nm_comando = "SELECT descripcion_um 
FROM unidades_medida 
WHERE codigo_um = '$this->presentacion_' 
ORDER BY descripcion_um"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      {
          $conteudo = (isset($rs->fields[0])) ? $rs->fields[0] : ""; 
          $rs->Close() ; 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      {  
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0; 
      foreach ($this->Before_unformat as $Cmp => $Val)
      {
          $this->$Cmp = $Val;
          $this->formatado = $guarda_formatado;
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
           case 'cod_barras_':
               return "Código Prod.";
               break;
           case 'idpro_':
               return "Producto";
               break;
           case 'ver_':
               return "Ver";
               break;
           case 'presentacion_':
               return "Presentación";
               break;
           case 'cantidad_':
               return "Cantidad";
               break;
           case 'valorunit_':
               return "C. unitario";
               break;
           case 'porc_desc_':
               return "% Desc. Un.";
               break;
           case 'descuento_':
               return "Desc. x U.";
               break;
           case 'valorpar_':
               return "Subtotal";
               break;
           case 'iva_':
               return "$ IVA";
               break;
           case 'idbod_':
               return "Ubicación";
               break;
           case 'tasaiva_':
               return "Tasaiva";
               break;
           case 'tasadesc_':
               return "Tasadesc";
               break;
           case 'devuelto_':
               return "Devuelto";
               break;
           case 'vencimiento_':
               return "F. Venc";
               break;
           case 'lote_':
               return "Lote";
               break;
           case 'serial_codbarra_':
               return "Serial o CodBarras";
               break;
           case 'iddet_':
               return "Iddet";
               break;
           case 'idfaccom_':
               return "Idfaccom";
               break;
           case 'tipo_docu_':
               return "Tipo Docu";
               break;
           case 'tipo_trans_':
               return "Tipo Trans";
               break;
           case 'id_nota_':
               return "Id Nota";
               break;
           case 'colores_':
               return "Color";
               break;
           case 'tallas_':
               return "Talla";
               break;
           case 'sabor_':
               return "Sabor";
               break;
           case 'descr_':
               return "Descr";
               break;
           case 'fecha_fab_':
               return "Fecha Fab";
               break;
           case 'unidad_c_':
               return "Unidad C";
               break;
           case 'num_ndevolucion_':
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
     global $nm_browser, $teste_validade, $sc_seq_vert;
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
              if (!isset($this->NM_ajax_info['errList']['geral_detallecompra_new_nc']) || !is_array($this->NM_ajax_info['errList']['geral_detallecompra_new_nc']))
              {
                  $this->NM_ajax_info['errList']['geral_detallecompra_new_nc'] = array();
              }
              $this->NM_ajax_info['errList']['geral_detallecompra_new_nc'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'cod_barras_' == $filtro)) || (is_array($filtro) && in_array('cod_barras_', $filtro)))
        $this->ValidateField_cod_barras_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'idpro_' == $filtro)) || (is_array($filtro) && in_array('idpro_', $filtro)))
        $this->ValidateField_idpro_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ver_' == $filtro)) || (is_array($filtro) && in_array('ver_', $filtro)))
        $this->ValidateField_ver_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'presentacion_' == $filtro)) || (is_array($filtro) && in_array('presentacion_', $filtro)))
        $this->ValidateField_presentacion_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cantidad_' == $filtro)) || (is_array($filtro) && in_array('cantidad_', $filtro)))
        $this->ValidateField_cantidad_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'valorunit_' == $filtro)) || (is_array($filtro) && in_array('valorunit_', $filtro)))
        $this->ValidateField_valorunit_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'porc_desc_' == $filtro)) || (is_array($filtro) && in_array('porc_desc_', $filtro)))
        $this->ValidateField_porc_desc_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'descuento_' == $filtro)) || (is_array($filtro) && in_array('descuento_', $filtro)))
        $this->ValidateField_descuento_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'valorpar_' == $filtro)) || (is_array($filtro) && in_array('valorpar_', $filtro)))
        $this->ValidateField_valorpar_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'iva_' == $filtro)) || (is_array($filtro) && in_array('iva_', $filtro)))
        $this->ValidateField_iva_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'idbod_' == $filtro)) || (is_array($filtro) && in_array('idbod_', $filtro)))
        $this->ValidateField_idbod_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tasaiva_' == $filtro)) || (is_array($filtro) && in_array('tasaiva_', $filtro)))
        $this->ValidateField_tasaiva_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tasadesc_' == $filtro)) || (is_array($filtro) && in_array('tasadesc_', $filtro)))
        $this->ValidateField_tasadesc_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'devuelto_' == $filtro)) || (is_array($filtro) && in_array('devuelto_', $filtro)))
        $this->ValidateField_devuelto_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'vencimiento_' == $filtro)) || (is_array($filtro) && in_array('vencimiento_', $filtro)))
        $this->ValidateField_vencimiento_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'lote_' == $filtro)) || (is_array($filtro) && in_array('lote_', $filtro)))
        $this->ValidateField_lote_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'serial_codbarra_' == $filtro)) || (is_array($filtro) && in_array('serial_codbarra_', $filtro)))
        $this->ValidateField_serial_codbarra_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'iddet_' == $filtro)) || (is_array($filtro) && in_array('iddet_', $filtro)))
        $this->ValidateField_iddet_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'idfaccom_' == $filtro)) || (is_array($filtro) && in_array('idfaccom_', $filtro)))
        $this->ValidateField_idfaccom_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipo_docu_' == $filtro)) || (is_array($filtro) && in_array('tipo_docu_', $filtro)))
        $this->ValidateField_tipo_docu_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipo_trans_' == $filtro)) || (is_array($filtro) && in_array('tipo_trans_', $filtro)))
        $this->ValidateField_tipo_trans_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'id_nota_' == $filtro)) || (is_array($filtro) && in_array('id_nota_', $filtro)))
        $this->ValidateField_id_nota_($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cantidad_ = $this->cantidad_;
    $original_idpro_ = $this->idpro_;
    $original_lote_ = $this->lote_;
    $original_vencimiento_ = $this->vencimiento_;
}
  if ($this->sc_evento == "excluir" || $this->sc_evento == "delete")
	{
	goto pasar;
	}

$sql="select fecha_vencimiento, lote, serial_codbarras from productos where idprod=$this->idpro_ ";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fls = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds_fls[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fls = false;
          $this->ds_fls_erro = $this->Db->ErrorMsg();
      } 
;

if(isset($this->ds_fls[0][0]) and $this->ds_fls[0][0]=='SI' )
	{
	if(empty($this->vencimiento_ ) or $this->vencimiento_ ==0)
		{
		
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "¡Por favor Ingrese Fecha de Vencimiento al Producto!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_detallecompra_new_nc';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_detallecompra_new_nc';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "¡Por favor Ingrese Fecha de Vencimiento al Producto!";
 }
;
		goto pasar;
		}
	}

if(isset($this->ds_fls[0][1]) and $this->ds_fls[0][1]=='SI' )
	{
	if(empty($this->lote_ ))
		{
		
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "¡Por favor Ingrese LOTE al Producto!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_detallecompra_new_nc';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_detallecompra_new_nc';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "¡Por favor Ingrese LOTE al Producto!";
 }
;
		goto pasar;
		}
	}

if(!isset($this->cantidad_ ) or $this->cantidad_ ==0)
	{echo "CANTIDAD: ", $this->cantidad_ ;
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "¡Por favor Ingrese cantidad válida!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_detallecompra_new_nc';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_detallecompra_new_nc';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "¡Por favor Ingrese cantidad válida!";
 }
;
	}

pasar:;
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cantidad_ != $this->cantidad_ || (isset($bFlagRead_cantidad_) && $bFlagRead_cantidad_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['cantidad_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['cantidad_' . $this->nmgp_refresh_row]['valList'] = array($this->cantidad_);
        $this->NM_ajax_changed['cantidad_'] = true;
    }
    if (($original_idpro_ != $this->idpro_ || (isset($bFlagRead_idpro_) && $bFlagRead_idpro_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['idpro_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['idpro_' . $this->nmgp_refresh_row]['valList'] = array($this->idpro_);
        $this->NM_ajax_changed['idpro_'] = true;
    }
    if (($original_lote_ != $this->lote_ || (isset($bFlagRead_lote_) && $bFlagRead_lote_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['lote_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['lote_' . $this->nmgp_refresh_row]['valList'] = array($this->lote_);
        $this->NM_ajax_changed['lote_'] = true;
    }
    if (($original_vencimiento_ != $this->vencimiento_ || (isset($bFlagRead_vencimiento_) && $bFlagRead_vencimiento_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['vencimiento_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['vencimiento_' . $this->nmgp_refresh_row]['valList'] = array($this->vencimiento_);
        $this->NM_ajax_changed['vencimiento_'] = true;
    }
}
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off'; 
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

    function ValidateField_cod_barras_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cod_barras_) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Código Prod. " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cod_barras_']))
              {
                  $Campos_Erros['cod_barras_'] = array();
              }
              $Campos_Erros['cod_barras_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cod_barras_']) || !is_array($this->NM_ajax_info['errList']['cod_barras_']))
              {
                  $this->NM_ajax_info['errList']['cod_barras_'] = array();
              }
              $this->NM_ajax_info['errList']['cod_barras_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "abcdefghijklmnopqrstuvwxyz0123456789 .-_ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789 .-_";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->cod_barras_ ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->cod_barras_, $_SESSION['scriptcase']['charset']); $x++) 
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
              $Campos_Crit .= "Código Prod. " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['cod_barras_']))
              {
                  $Campos_Erros['cod_barras_'] = array();
              }
              $Campos_Erros['cod_barras_'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['cod_barras_']) || !is_array($this->NM_ajax_info['errList']['cod_barras_']))
              {
                  $this->NM_ajax_info['errList']['cod_barras_'] = array();
              }
              $this->NM_ajax_info['errList']['cod_barras_'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cod_barras_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cod_barras_

    function ValidateField_idpro_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->idpro_) > 10) 
          { 
              $hasError = true;
              $Campos_Crit .= "Producto " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['idpro_']))
              {
                  $Campos_Erros['idpro_'] = array();
              }
              $Campos_Erros['idpro_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['idpro_']) || !is_array($this->NM_ajax_info['errList']['idpro_']))
              {
                  $this->NM_ajax_info['errList']['idpro_'] = array();
              }
              $this->NM_ajax_info['errList']['idpro_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idpro_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idpro_

    function ValidateField_ver_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->ver_) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ver_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ver_

    function ValidateField_presentacion_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->presentacion_) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'presentacion_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_presentacion_

    function ValidateField_cantidad_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cantidad_ === "" || is_null($this->cantidad_))  
      { 
          $this->cantidad_ = 0;
          $this->sc_force_zero[] = 'cantidad_';
      } 
      if (!empty($this->field_config['cantidad_']['symbol_dec']))
      {
          nm_limpa_valor($this->cantidad_, $this->field_config['cantidad_']['symbol_dec'], $this->field_config['cantidad_']['symbol_grp']) ; 
          if ('.' == substr($this->cantidad_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->cantidad_, 1)))
              {
                  $this->cantidad_ = '';
              }
              else
              {
                  $this->cantidad_ = '0' . $this->cantidad_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->cantidad_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->cantidad_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cantidad: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cantidad_']))
                  {
                      $Campos_Erros['cantidad_'] = array();
                  }
                  $Campos_Erros['cantidad_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cantidad_']) || !is_array($this->NM_ajax_info['errList']['cantidad_']))
                  {
                      $this->NM_ajax_info['errList']['cantidad_'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidad_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cantidad_, 10, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cantidad; " ; 
                  if (!isset($Campos_Erros['cantidad_']))
                  {
                      $Campos_Erros['cantidad_'] = array();
                  }
                  $Campos_Erros['cantidad_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cantidad_']) || !is_array($this->NM_ajax_info['errList']['cantidad_']))
                  {
                      $this->NM_ajax_info['errList']['cantidad_'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidad_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cantidad_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cantidad_

    function ValidateField_valorunit_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->valorunit_ === "" || is_null($this->valorunit_))  
      { 
          $this->valorunit_ = 0;
          $this->sc_force_zero[] = 'valorunit_';
      } 
      if (!empty($this->field_config['valorunit_']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valorunit_, $this->field_config['valorunit_']['symbol_dec'], $this->field_config['valorunit_']['symbol_grp'], $this->field_config['valorunit_']['symbol_mon']); 
          nm_limpa_valor($this->valorunit_, $this->field_config['valorunit_']['symbol_dec'], $this->field_config['valorunit_']['symbol_grp']) ; 
          if ('.' == substr($this->valorunit_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->valorunit_, 1)))
              {
                  $this->valorunit_ = '';
              }
              else
              {
                  $this->valorunit_ = '0' . $this->valorunit_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->valorunit_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->valorunit_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "C. unitario: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valorunit_']))
                  {
                      $Campos_Erros['valorunit_'] = array();
                  }
                  $Campos_Erros['valorunit_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valorunit_']) || !is_array($this->NM_ajax_info['errList']['valorunit_']))
                  {
                      $this->NM_ajax_info['errList']['valorunit_'] = array();
                  }
                  $this->NM_ajax_info['errList']['valorunit_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valorunit_, 10, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "C. unitario; " ; 
                  if (!isset($Campos_Erros['valorunit_']))
                  {
                      $Campos_Erros['valorunit_'] = array();
                  }
                  $Campos_Erros['valorunit_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valorunit_']) || !is_array($this->NM_ajax_info['errList']['valorunit_']))
                  {
                      $this->NM_ajax_info['errList']['valorunit_'] = array();
                  }
                  $this->NM_ajax_info['errList']['valorunit_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valorunit_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valorunit_

    function ValidateField_porc_desc_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->porc_desc_ === "" || is_null($this->porc_desc_))  
      { 
          $this->porc_desc_ = 0;
          $this->sc_force_zero[] = 'porc_desc_';
      } 
      if (!empty($this->field_config['porc_desc_']['symbol_dec']))
      {
          nm_limpa_valor($this->porc_desc_, $this->field_config['porc_desc_']['symbol_dec'], $this->field_config['porc_desc_']['symbol_grp']) ; 
          if ('.' == substr($this->porc_desc_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->porc_desc_, 1)))
              {
                  $this->porc_desc_ = '';
              }
              else
              {
                  $this->porc_desc_ = '0' . $this->porc_desc_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->porc_desc_ != '')  
          { 
              $iTestSize = 5;
              if (strlen($this->porc_desc_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "% Desc. Un.: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['porc_desc_']))
                  {
                      $Campos_Erros['porc_desc_'] = array();
                  }
                  $Campos_Erros['porc_desc_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['porc_desc_']) || !is_array($this->NM_ajax_info['errList']['porc_desc_']))
                  {
                      $this->NM_ajax_info['errList']['porc_desc_'] = array();
                  }
                  $this->NM_ajax_info['errList']['porc_desc_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->porc_desc_, 3, 1, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "% Desc. Un.; " ; 
                  if (!isset($Campos_Erros['porc_desc_']))
                  {
                      $Campos_Erros['porc_desc_'] = array();
                  }
                  $Campos_Erros['porc_desc_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['porc_desc_']) || !is_array($this->NM_ajax_info['errList']['porc_desc_']))
                  {
                      $this->NM_ajax_info['errList']['porc_desc_'] = array();
                  }
                  $this->NM_ajax_info['errList']['porc_desc_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'porc_desc_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_porc_desc_

    function ValidateField_descuento_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->descuento_ === "" || is_null($this->descuento_))  
      { 
          $this->descuento_ = 0;
          $this->sc_force_zero[] = 'descuento_';
      } 
      if (!empty($this->field_config['descuento_']['symbol_dec']))
      {
          $this->sc_remove_currency($this->descuento_, $this->field_config['descuento_']['symbol_dec'], $this->field_config['descuento_']['symbol_grp'], $this->field_config['descuento_']['symbol_mon']); 
          nm_limpa_valor($this->descuento_, $this->field_config['descuento_']['symbol_dec'], $this->field_config['descuento_']['symbol_grp']) ; 
          if ('.' == substr($this->descuento_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->descuento_, 1)))
              {
                  $this->descuento_ = '';
              }
              else
              {
                  $this->descuento_ = '0' . $this->descuento_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->descuento_ != '')  
          { 
              $iTestSize = 9;
              if (strlen($this->descuento_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Desc. x U.: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['descuento_']))
                  {
                      $Campos_Erros['descuento_'] = array();
                  }
                  $Campos_Erros['descuento_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['descuento_']) || !is_array($this->NM_ajax_info['errList']['descuento_']))
                  {
                      $this->NM_ajax_info['errList']['descuento_'] = array();
                  }
                  $this->NM_ajax_info['errList']['descuento_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->descuento_, 6, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Desc. x U.; " ; 
                  if (!isset($Campos_Erros['descuento_']))
                  {
                      $Campos_Erros['descuento_'] = array();
                  }
                  $Campos_Erros['descuento_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['descuento_']) || !is_array($this->NM_ajax_info['errList']['descuento_']))
                  {
                      $this->NM_ajax_info['errList']['descuento_'] = array();
                  }
                  $this->NM_ajax_info['errList']['descuento_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'descuento_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_descuento_

    function ValidateField_valorpar_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->valorpar_ === "" || is_null($this->valorpar_))  
      { 
          $this->valorpar_ = 0;
          $this->sc_force_zero[] = 'valorpar_';
      } 
      if (!empty($this->field_config['valorpar_']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valorpar_, $this->field_config['valorpar_']['symbol_dec'], $this->field_config['valorpar_']['symbol_grp'], $this->field_config['valorpar_']['symbol_mon']); 
          nm_limpa_valor($this->valorpar_, $this->field_config['valorpar_']['symbol_dec'], $this->field_config['valorpar_']['symbol_grp']) ; 
          if ('.' == substr($this->valorpar_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->valorpar_, 1)))
              {
                  $this->valorpar_ = '';
              }
              else
              {
                  $this->valorpar_ = '0' . $this->valorpar_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->valorpar_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->valorpar_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Subtotal: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valorpar_']))
                  {
                      $Campos_Erros['valorpar_'] = array();
                  }
                  $Campos_Erros['valorpar_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valorpar_']) || !is_array($this->NM_ajax_info['errList']['valorpar_']))
                  {
                      $this->NM_ajax_info['errList']['valorpar_'] = array();
                  }
                  $this->NM_ajax_info['errList']['valorpar_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valorpar_, 10, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Subtotal; " ; 
                  if (!isset($Campos_Erros['valorpar_']))
                  {
                      $Campos_Erros['valorpar_'] = array();
                  }
                  $Campos_Erros['valorpar_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valorpar_']) || !is_array($this->NM_ajax_info['errList']['valorpar_']))
                  {
                      $this->NM_ajax_info['errList']['valorpar_'] = array();
                  }
                  $this->NM_ajax_info['errList']['valorpar_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valorpar_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valorpar_

    function ValidateField_iva_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->iva_ === "" || is_null($this->iva_))  
      { 
          $this->iva_ = 0;
          $this->sc_force_zero[] = 'iva_';
      } 
      if (!empty($this->field_config['iva_']['symbol_dec']))
      {
          $this->sc_remove_currency($this->iva_, $this->field_config['iva_']['symbol_dec'], $this->field_config['iva_']['symbol_grp'], $this->field_config['iva_']['symbol_mon']); 
          nm_limpa_valor($this->iva_, $this->field_config['iva_']['symbol_dec'], $this->field_config['iva_']['symbol_grp']) ; 
          if ('.' == substr($this->iva_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->iva_, 1)))
              {
                  $this->iva_ = '';
              }
              else
              {
                  $this->iva_ = '0' . $this->iva_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->iva_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->iva_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "$ IVA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['iva_']))
                  {
                      $Campos_Erros['iva_'] = array();
                  }
                  $Campos_Erros['iva_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['iva_']) || !is_array($this->NM_ajax_info['errList']['iva_']))
                  {
                      $this->NM_ajax_info['errList']['iva_'] = array();
                  }
                  $this->NM_ajax_info['errList']['iva_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->iva_, 10, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "$ IVA; " ; 
                  if (!isset($Campos_Erros['iva_']))
                  {
                      $Campos_Erros['iva_'] = array();
                  }
                  $Campos_Erros['iva_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['iva_']) || !is_array($this->NM_ajax_info['errList']['iva_']))
                  {
                      $this->NM_ajax_info['errList']['iva_'] = array();
                  }
                  $this->NM_ajax_info['errList']['iva_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'iva_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_iva_

    function ValidateField_idbod_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idbod_ == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['php_cmp_required']['idbod_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['php_cmp_required']['idbod_'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Ubicación" ; 
          if (!isset($Campos_Erros['idbod_']))
          {
              $Campos_Erros['idbod_'] = array();
          }
          $Campos_Erros['idbod_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['idbod_']) || !is_array($this->NM_ajax_info['errList']['idbod_']))
          {
              $this->NM_ajax_info['errList']['idbod_'] = array();
          }
          $this->NM_ajax_info['errList']['idbod_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->idbod_) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idbod_']) && !in_array($this->idbod_, $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idbod_']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['idbod_']))
              {
                  $Campos_Erros['idbod_'] = array();
              }
              $Campos_Erros['idbod_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['idbod_']) || !is_array($this->NM_ajax_info['errList']['idbod_']))
              {
                  $this->NM_ajax_info['errList']['idbod_'] = array();
              }
              $this->NM_ajax_info['errList']['idbod_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idbod_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idbod_

    function ValidateField_tasaiva_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tasaiva_ === "" || is_null($this->tasaiva_))  
      { 
          $this->tasaiva_ = 0;
          $this->sc_force_zero[] = 'tasaiva_';
      } 
      nm_limpa_numero($this->tasaiva_, $this->field_config['tasaiva_']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->tasaiva_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->tasaiva_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tasaiva: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['tasaiva_']))
                  {
                      $Campos_Erros['tasaiva_'] = array();
                  }
                  $Campos_Erros['tasaiva_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['tasaiva_']) || !is_array($this->NM_ajax_info['errList']['tasaiva_']))
                  {
                      $this->NM_ajax_info['errList']['tasaiva_'] = array();
                  }
                  $this->NM_ajax_info['errList']['tasaiva_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->tasaiva_, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tasaiva; " ; 
                  if (!isset($Campos_Erros['tasaiva_']))
                  {
                      $Campos_Erros['tasaiva_'] = array();
                  }
                  $Campos_Erros['tasaiva_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['tasaiva_']) || !is_array($this->NM_ajax_info['errList']['tasaiva_']))
                  {
                      $this->NM_ajax_info['errList']['tasaiva_'] = array();
                  }
                  $this->NM_ajax_info['errList']['tasaiva_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tasaiva_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tasaiva_

    function ValidateField_tasadesc_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tasadesc_ === "" || is_null($this->tasadesc_))  
      { 
          $this->tasadesc_ = 0;
          $this->sc_force_zero[] = 'tasadesc_';
      } 
      nm_limpa_numero($this->tasadesc_, $this->field_config['tasadesc_']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->tasadesc_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->tasadesc_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tasadesc: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['tasadesc_']))
                  {
                      $Campos_Erros['tasadesc_'] = array();
                  }
                  $Campos_Erros['tasadesc_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['tasadesc_']) || !is_array($this->NM_ajax_info['errList']['tasadesc_']))
                  {
                      $this->NM_ajax_info['errList']['tasadesc_'] = array();
                  }
                  $this->NM_ajax_info['errList']['tasadesc_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->tasadesc_, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tasadesc; " ; 
                  if (!isset($Campos_Erros['tasadesc_']))
                  {
                      $Campos_Erros['tasadesc_'] = array();
                  }
                  $Campos_Erros['tasadesc_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['tasadesc_']) || !is_array($this->NM_ajax_info['errList']['tasadesc_']))
                  {
                      $this->NM_ajax_info['errList']['tasadesc_'] = array();
                  }
                  $this->NM_ajax_info['errList']['tasadesc_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tasadesc_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tasadesc_

    function ValidateField_devuelto_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->devuelto_ === "" || is_null($this->devuelto_))  
      { 
          $this->devuelto_ = 0;
          $this->sc_force_zero[] = 'devuelto_';
      } 
      nm_limpa_numero($this->devuelto_, $this->field_config['devuelto_']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->devuelto_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->devuelto_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Devuelto: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['devuelto_']))
                  {
                      $Campos_Erros['devuelto_'] = array();
                  }
                  $Campos_Erros['devuelto_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['devuelto_']) || !is_array($this->NM_ajax_info['errList']['devuelto_']))
                  {
                      $this->NM_ajax_info['errList']['devuelto_'] = array();
                  }
                  $this->NM_ajax_info['errList']['devuelto_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->devuelto_, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Devuelto; " ; 
                  if (!isset($Campos_Erros['devuelto_']))
                  {
                      $Campos_Erros['devuelto_'] = array();
                  }
                  $Campos_Erros['devuelto_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['devuelto_']) || !is_array($this->NM_ajax_info['errList']['devuelto_']))
                  {
                      $this->NM_ajax_info['errList']['devuelto_'] = array();
                  }
                  $this->NM_ajax_info['errList']['devuelto_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'devuelto_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_devuelto_

    function ValidateField_vencimiento_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->vencimiento_, $this->field_config['vencimiento_']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['vencimiento_']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['vencimiento_']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['vencimiento_']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['vencimiento_']['date_sep']) ; 
          if (trim($this->vencimiento_) != "")  
          { 
              if ($teste_validade->Data($this->vencimiento_, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "F. Venc; " ; 
                  if (!isset($Campos_Erros['vencimiento_']))
                  {
                      $Campos_Erros['vencimiento_'] = array();
                  }
                  $Campos_Erros['vencimiento_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['vencimiento_']) || !is_array($this->NM_ajax_info['errList']['vencimiento_']))
                  {
                      $this->NM_ajax_info['errList']['vencimiento_'] = array();
                  }
                  $this->NM_ajax_info['errList']['vencimiento_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['vencimiento_']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'vencimiento_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_vencimiento_

    function ValidateField_lote_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->lote_ = sc_strtoupper($this->lote_); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->lote_) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Lote " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['lote_']))
              {
                  $Campos_Erros['lote_'] = array();
              }
              $Campos_Erros['lote_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['lote_']) || !is_array($this->NM_ajax_info['errList']['lote_']))
              {
                  $this->NM_ajax_info['errList']['lote_'] = array();
              }
              $this->NM_ajax_info['errList']['lote_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'lote_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_lote_

    function ValidateField_serial_codbarra_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->serial_codbarra_) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Serial o CodBarras " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['serial_codbarra_']))
              {
                  $Campos_Erros['serial_codbarra_'] = array();
              }
              $Campos_Erros['serial_codbarra_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['serial_codbarra_']) || !is_array($this->NM_ajax_info['errList']['serial_codbarra_']))
              {
                  $this->NM_ajax_info['errList']['serial_codbarra_'] = array();
              }
              $this->NM_ajax_info['errList']['serial_codbarra_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'serial_codbarra_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_serial_codbarra_

    function ValidateField_iddet_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->iddet_ === "" || is_null($this->iddet_))  
      { 
          $this->iddet_ = 0;
      } 
      nm_limpa_numero($this->iddet_, $this->field_config['iddet_']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->iddet_ != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->iddet_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Iddet: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['iddet_']))
                  {
                      $Campos_Erros['iddet_'] = array();
                  }
                  $Campos_Erros['iddet_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['iddet_']) || !is_array($this->NM_ajax_info['errList']['iddet_']))
                  {
                      $this->NM_ajax_info['errList']['iddet_'] = array();
                  }
                  $this->NM_ajax_info['errList']['iddet_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->iddet_, 20, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Iddet; " ; 
                  if (!isset($Campos_Erros['iddet_']))
                  {
                      $Campos_Erros['iddet_'] = array();
                  }
                  $Campos_Erros['iddet_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['iddet_']) || !is_array($this->NM_ajax_info['errList']['iddet_']))
                  {
                      $this->NM_ajax_info['errList']['iddet_'] = array();
                  }
                  $this->NM_ajax_info['errList']['iddet_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'iddet_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_iddet_

    function ValidateField_idfaccom_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->idfaccom_, $this->field_config['idfaccom_']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->idfaccom_ != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->idfaccom_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Idfaccom: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['idfaccom_']))
                  {
                      $Campos_Erros['idfaccom_'] = array();
                  }
                  $Campos_Erros['idfaccom_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['idfaccom_']) || !is_array($this->NM_ajax_info['errList']['idfaccom_']))
                  {
                      $this->NM_ajax_info['errList']['idfaccom_'] = array();
                  }
                  $this->NM_ajax_info['errList']['idfaccom_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->idfaccom_, 20, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Idfaccom; " ; 
                  if (!isset($Campos_Erros['idfaccom_']))
                  {
                      $Campos_Erros['idfaccom_'] = array();
                  }
                  $Campos_Erros['idfaccom_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['idfaccom_']) || !is_array($this->NM_ajax_info['errList']['idfaccom_']))
                  {
                      $this->NM_ajax_info['errList']['idfaccom_'] = array();
                  }
                  $this->NM_ajax_info['errList']['idfaccom_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['php_cmp_required']['idfaccom_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['php_cmp_required']['idfaccom_'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Idfaccom" ; 
              if (!isset($Campos_Erros['idfaccom_']))
              {
                  $Campos_Erros['idfaccom_'] = array();
              }
              $Campos_Erros['idfaccom_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['idfaccom_']) || !is_array($this->NM_ajax_info['errList']['idfaccom_']))
                  {
                      $this->NM_ajax_info['errList']['idfaccom_'] = array();
                  }
                  $this->NM_ajax_info['errList']['idfaccom_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idfaccom_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idfaccom_

    function ValidateField_tipo_docu_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tipo_docu_) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tipo Docu " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tipo_docu_']))
              {
                  $Campos_Erros['tipo_docu_'] = array();
              }
              $Campos_Erros['tipo_docu_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tipo_docu_']) || !is_array($this->NM_ajax_info['errList']['tipo_docu_']))
              {
                  $this->NM_ajax_info['errList']['tipo_docu_'] = array();
              }
              $this->NM_ajax_info['errList']['tipo_docu_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipo_docu_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipo_docu_

    function ValidateField_tipo_trans_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tipo_trans_) > 4) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tipo Trans " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tipo_trans_']))
              {
                  $Campos_Erros['tipo_trans_'] = array();
              }
              $Campos_Erros['tipo_trans_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tipo_trans_']) || !is_array($this->NM_ajax_info['errList']['tipo_trans_']))
              {
                  $this->NM_ajax_info['errList']['tipo_trans_'] = array();
              }
              $this->NM_ajax_info['errList']['tipo_trans_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 4 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipo_trans_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipo_trans_

    function ValidateField_id_nota_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->id_nota_ === "" || is_null($this->id_nota_))  
      { 
          $this->id_nota_ = 0;
          $this->sc_force_zero[] = 'id_nota_';
      } 
      nm_limpa_numero($this->id_nota_, $this->field_config['id_nota_']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->id_nota_ != '')  
          { 
              $iTestSize = 19;
              if (strlen($this->id_nota_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Id Nota: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id_nota_']))
                  {
                      $Campos_Erros['id_nota_'] = array();
                  }
                  $Campos_Erros['id_nota_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id_nota_']) || !is_array($this->NM_ajax_info['errList']['id_nota_']))
                  {
                      $this->NM_ajax_info['errList']['id_nota_'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_nota_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id_nota_, 19, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Id Nota; " ; 
                  if (!isset($Campos_Erros['id_nota_']))
                  {
                      $Campos_Erros['id_nota_'] = array();
                  }
                  $Campos_Erros['id_nota_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id_nota_']) || !is_array($this->NM_ajax_info['errList']['id_nota_']))
                  {
                      $this->NM_ajax_info['errList']['id_nota_'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_nota_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_nota_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_nota_

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
    $this->nmgp_dados_form['cod_barras_'] = $this->cod_barras_;
    $this->nmgp_dados_form['idpro_'] = $this->idpro_;
    $this->nmgp_dados_form['ver_'] = $this->ver_;
    $this->nmgp_dados_form['presentacion_'] = $this->presentacion_;
    $this->nmgp_dados_form['cantidad_'] = $this->cantidad_;
    $this->nmgp_dados_form['valorunit_'] = $this->valorunit_;
    $this->nmgp_dados_form['porc_desc_'] = $this->porc_desc_;
    $this->nmgp_dados_form['descuento_'] = $this->descuento_;
    $this->nmgp_dados_form['valorpar_'] = $this->valorpar_;
    $this->nmgp_dados_form['iva_'] = $this->iva_;
    $this->nmgp_dados_form['idbod_'] = $this->idbod_;
    $this->nmgp_dados_form['tasaiva_'] = $this->tasaiva_;
    $this->nmgp_dados_form['tasadesc_'] = $this->tasadesc_;
    $this->nmgp_dados_form['devuelto_'] = $this->devuelto_;
    $this->nmgp_dados_form['vencimiento_'] = (strlen(trim($this->vencimiento_)) > 19) ? str_replace(".", ":", $this->vencimiento_) : trim($this->vencimiento_);
    $this->nmgp_dados_form['lote_'] = $this->lote_;
    $this->nmgp_dados_form['serial_codbarra_'] = $this->serial_codbarra_;
    $this->nmgp_dados_form['iddet_'] = $this->iddet_;
    $this->nmgp_dados_form['idfaccom_'] = $this->idfaccom_;
    $this->nmgp_dados_form['tipo_docu_'] = $this->tipo_docu_;
    $this->nmgp_dados_form['tipo_trans_'] = $this->tipo_trans_;
    $this->nmgp_dados_form['id_nota_'] = $this->id_nota_;
    $this->nmgp_dados_form['colores_'] = $this->colores_;
    $this->nmgp_dados_form['tallas_'] = $this->tallas_;
    $this->nmgp_dados_form['sabor_'] = $this->sabor_;
    $this->nmgp_dados_form['descr_'] = $this->descr_;
    $this->nmgp_dados_form['fecha_fab_'] = $this->fecha_fab_;
    $this->nmgp_dados_form['unidad_c_'] = $this->unidad_c_;
    $this->nmgp_dados_form['num_ndevolucion_'] = $this->num_ndevolucion_;
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_form'][$sc_seq_vert] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['cantidad_'] = $this->cantidad_;
      if (!empty($this->field_config['cantidad_']['symbol_dec']))
      {
         nm_limpa_valor($this->cantidad_, $this->field_config['cantidad_']['symbol_dec'], $this->field_config['cantidad_']['symbol_grp']);
      }
      $this->Before_unformat['valorunit_'] = $this->valorunit_;
      if (!empty($this->field_config['valorunit_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valorunit_, $this->field_config['valorunit_']['symbol_dec'], $this->field_config['valorunit_']['symbol_grp'], $this->field_config['valorunit_']['symbol_mon']);
         nm_limpa_valor($this->valorunit_, $this->field_config['valorunit_']['symbol_dec'], $this->field_config['valorunit_']['symbol_grp']);
      }
      $this->Before_unformat['porc_desc_'] = $this->porc_desc_;
      if (!empty($this->field_config['porc_desc_']['symbol_dec']))
      {
         nm_limpa_valor($this->porc_desc_, $this->field_config['porc_desc_']['symbol_dec'], $this->field_config['porc_desc_']['symbol_grp']);
      }
      $this->Before_unformat['descuento_'] = $this->descuento_;
      if (!empty($this->field_config['descuento_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->descuento_, $this->field_config['descuento_']['symbol_dec'], $this->field_config['descuento_']['symbol_grp'], $this->field_config['descuento_']['symbol_mon']);
         nm_limpa_valor($this->descuento_, $this->field_config['descuento_']['symbol_dec'], $this->field_config['descuento_']['symbol_grp']);
      }
      $this->Before_unformat['valorpar_'] = $this->valorpar_;
      if (!empty($this->field_config['valorpar_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valorpar_, $this->field_config['valorpar_']['symbol_dec'], $this->field_config['valorpar_']['symbol_grp'], $this->field_config['valorpar_']['symbol_mon']);
         nm_limpa_valor($this->valorpar_, $this->field_config['valorpar_']['symbol_dec'], $this->field_config['valorpar_']['symbol_grp']);
      }
      $this->Before_unformat['iva_'] = $this->iva_;
      if (!empty($this->field_config['iva_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->iva_, $this->field_config['iva_']['symbol_dec'], $this->field_config['iva_']['symbol_grp'], $this->field_config['iva_']['symbol_mon']);
         nm_limpa_valor($this->iva_, $this->field_config['iva_']['symbol_dec'], $this->field_config['iva_']['symbol_grp']);
      }
      $this->Before_unformat['tasaiva_'] = $this->tasaiva_;
      nm_limpa_numero($this->tasaiva_, $this->field_config['tasaiva_']['symbol_grp']) ; 
      $this->Before_unformat['tasadesc_'] = $this->tasadesc_;
      nm_limpa_numero($this->tasadesc_, $this->field_config['tasadesc_']['symbol_grp']) ; 
      $this->Before_unformat['devuelto_'] = $this->devuelto_;
      nm_limpa_numero($this->devuelto_, $this->field_config['devuelto_']['symbol_grp']) ; 
      $this->Before_unformat['vencimiento_'] = $this->vencimiento_;
      nm_limpa_data($this->vencimiento_, $this->field_config['vencimiento_']['date_sep']) ; 
      $this->Before_unformat['iddet_'] = $this->iddet_;
      nm_limpa_numero($this->iddet_, $this->field_config['iddet_']['symbol_grp']) ; 
      $this->Before_unformat['idfaccom_'] = $this->idfaccom_;
      nm_limpa_numero($this->idfaccom_, $this->field_config['idfaccom_']['symbol_grp']) ; 
      $this->Before_unformat['id_nota_'] = $this->id_nota_;
      nm_limpa_numero($this->id_nota_, $this->field_config['id_nota_']['symbol_grp']) ; 
      $this->Before_unformat['fecha_fab_'] = $this->fecha_fab_;
      nm_limpa_data($this->fecha_fab_, $this->field_config['fecha_fab_']['date_sep']) ; 
      $this->Before_unformat['num_ndevolucion_'] = $this->num_ndevolucion_;
      nm_limpa_numero($this->num_ndevolucion_, $this->field_config['num_ndevolucion_']['symbol_grp']) ; 
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
      if ($Nome_Campo == "cantidad_")
      {
          if (!empty($this->field_config['cantidad_']['symbol_dec']))
          {
             nm_limpa_valor($this->cantidad_, $this->field_config['cantidad_']['symbol_dec'], $this->field_config['cantidad_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "valorunit_")
      {
          if (!empty($this->field_config['valorunit_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valorunit_, $this->field_config['valorunit_']['symbol_dec'], $this->field_config['valorunit_']['symbol_grp'], $this->field_config['valorunit_']['symbol_mon']);
             nm_limpa_valor($this->valorunit_, $this->field_config['valorunit_']['symbol_dec'], $this->field_config['valorunit_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "porc_desc_")
      {
          if (!empty($this->field_config['porc_desc_']['symbol_dec']))
          {
             nm_limpa_valor($this->porc_desc_, $this->field_config['porc_desc_']['symbol_dec'], $this->field_config['porc_desc_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "descuento_")
      {
          if (!empty($this->field_config['descuento_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->descuento_, $this->field_config['descuento_']['symbol_dec'], $this->field_config['descuento_']['symbol_grp'], $this->field_config['descuento_']['symbol_mon']);
             nm_limpa_valor($this->descuento_, $this->field_config['descuento_']['symbol_dec'], $this->field_config['descuento_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "valorpar_")
      {
          if (!empty($this->field_config['valorpar_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valorpar_, $this->field_config['valorpar_']['symbol_dec'], $this->field_config['valorpar_']['symbol_grp'], $this->field_config['valorpar_']['symbol_mon']);
             nm_limpa_valor($this->valorpar_, $this->field_config['valorpar_']['symbol_dec'], $this->field_config['valorpar_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "iva_")
      {
          if (!empty($this->field_config['iva_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->iva_, $this->field_config['iva_']['symbol_dec'], $this->field_config['iva_']['symbol_grp'], $this->field_config['iva_']['symbol_mon']);
             nm_limpa_valor($this->iva_, $this->field_config['iva_']['symbol_dec'], $this->field_config['iva_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "tasaiva_")
      {
          nm_limpa_numero($this->tasaiva_, $this->field_config['tasaiva_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tasadesc_")
      {
          nm_limpa_numero($this->tasadesc_, $this->field_config['tasadesc_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "devuelto_")
      {
          nm_limpa_numero($this->devuelto_, $this->field_config['devuelto_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "iddet_")
      {
          nm_limpa_numero($this->iddet_, $this->field_config['iddet_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "idfaccom_")
      {
          nm_limpa_numero($this->idfaccom_, $this->field_config['idfaccom_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_nota_")
      {
          nm_limpa_numero($this->id_nota_, $this->field_config['id_nota_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "num_ndevolucion_")
      {
          nm_limpa_numero($this->num_ndevolucion_, $this->field_config['num_ndevolucion_']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
      if ('' !== $this->cantidad_ || (!empty($format_fields) && isset($format_fields['cantidad_'])))
      {
          nmgp_Form_Num_Val($this->cantidad_, $this->field_config['cantidad_']['symbol_grp'], $this->field_config['cantidad_']['symbol_dec'], "2", "S", $this->field_config['cantidad_']['format_neg'], "", "", "-", $this->field_config['cantidad_']['symbol_fmt']) ; 
      }
      if ('' !== $this->valorunit_ || (!empty($format_fields) && isset($format_fields['valorunit_'])))
      {
          nmgp_Form_Num_Val($this->valorunit_, $this->field_config['valorunit_']['symbol_grp'], $this->field_config['valorunit_']['symbol_dec'], "2", "S", $this->field_config['valorunit_']['format_neg'], "", "", "-", $this->field_config['valorunit_']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['valorunit_']['symbol_mon'];
          $this->sc_add_currency($this->valorunit_, $sMonSymb, $this->field_config['valorunit_']['format_pos']); 
      }
      if ('' !== $this->porc_desc_ || (!empty($format_fields) && isset($format_fields['porc_desc_'])))
      {
          nmgp_Form_Num_Val($this->porc_desc_, $this->field_config['porc_desc_']['symbol_grp'], $this->field_config['porc_desc_']['symbol_dec'], "1", "S", $this->field_config['porc_desc_']['format_neg'], "", "", "-", $this->field_config['porc_desc_']['symbol_fmt']) ; 
      }
      if ('' !== $this->descuento_ || (!empty($format_fields) && isset($format_fields['descuento_'])))
      {
          nmgp_Form_Num_Val($this->descuento_, $this->field_config['descuento_']['symbol_grp'], $this->field_config['descuento_']['symbol_dec'], "2", "S", $this->field_config['descuento_']['format_neg'], "", "", "-", $this->field_config['descuento_']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['descuento_']['symbol_mon'];
          $this->sc_add_currency($this->descuento_, $sMonSymb, $this->field_config['descuento_']['format_pos']); 
      }
      if ('' !== $this->valorpar_ || (!empty($format_fields) && isset($format_fields['valorpar_'])))
      {
          nmgp_Form_Num_Val($this->valorpar_, $this->field_config['valorpar_']['symbol_grp'], $this->field_config['valorpar_']['symbol_dec'], "2", "S", $this->field_config['valorpar_']['format_neg'], "", "", "-", $this->field_config['valorpar_']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['valorpar_']['symbol_mon'];
          $this->sc_add_currency($this->valorpar_, $sMonSymb, $this->field_config['valorpar_']['format_pos']); 
      }
      if ('' !== $this->iva_ || (!empty($format_fields) && isset($format_fields['iva_'])))
      {
          nmgp_Form_Num_Val($this->iva_, $this->field_config['iva_']['symbol_grp'], $this->field_config['iva_']['symbol_dec'], "2", "S", $this->field_config['iva_']['format_neg'], "", "", "-", $this->field_config['iva_']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['iva_']['symbol_mon'];
          $this->sc_add_currency($this->iva_, $sMonSymb, $this->field_config['iva_']['format_pos']); 
      }
      if ('' !== $this->tasaiva_ || (!empty($format_fields) && isset($format_fields['tasaiva_'])))
      {
          nmgp_Form_Num_Val($this->tasaiva_, $this->field_config['tasaiva_']['symbol_grp'], $this->field_config['tasaiva_']['symbol_dec'], "0", "S", $this->field_config['tasaiva_']['format_neg'], "", "", "-", $this->field_config['tasaiva_']['symbol_fmt']) ; 
      }
      if ('' !== $this->tasadesc_ || (!empty($format_fields) && isset($format_fields['tasadesc_'])))
      {
          nmgp_Form_Num_Val($this->tasadesc_, $this->field_config['tasadesc_']['symbol_grp'], $this->field_config['tasadesc_']['symbol_dec'], "0", "S", $this->field_config['tasadesc_']['format_neg'], "", "", "-", $this->field_config['tasadesc_']['symbol_fmt']) ; 
      }
      if ('' !== $this->devuelto_ || (!empty($format_fields) && isset($format_fields['devuelto_'])))
      {
          nmgp_Form_Num_Val($this->devuelto_, $this->field_config['devuelto_']['symbol_grp'], $this->field_config['devuelto_']['symbol_dec'], "0", "S", $this->field_config['devuelto_']['format_neg'], "", "", "-", $this->field_config['devuelto_']['symbol_fmt']) ; 
      }
      if ((!empty($this->vencimiento_) && 'null' != $this->vencimiento_) || (!empty($format_fields) && isset($format_fields['vencimiento_'])))
      {
          nm_volta_data($this->vencimiento_, $this->field_config['vencimiento_']['date_format']) ; 
          nmgp_Form_Datas($this->vencimiento_, $this->field_config['vencimiento_']['date_format'], $this->field_config['vencimiento_']['date_sep']) ;  
      }
      elseif ('null' == $this->vencimiento_ || '' == $this->vencimiento_)
      {
          $this->vencimiento_ = '';
      }
      if ('' !== $this->iddet_ || (!empty($format_fields) && isset($format_fields['iddet_'])))
      {
          nmgp_Form_Num_Val($this->iddet_, $this->field_config['iddet_']['symbol_grp'], $this->field_config['iddet_']['symbol_dec'], "0", "S", $this->field_config['iddet_']['format_neg'], "", "", "-", $this->field_config['iddet_']['symbol_fmt']) ; 
      }
      if ('' !== $this->idfaccom_ || (!empty($format_fields) && isset($format_fields['idfaccom_'])))
      {
          nmgp_Form_Num_Val($this->idfaccom_, $this->field_config['idfaccom_']['symbol_grp'], $this->field_config['idfaccom_']['symbol_dec'], "0", "S", $this->field_config['idfaccom_']['format_neg'], "", "", "-", $this->field_config['idfaccom_']['symbol_fmt']) ; 
      }
      if ('' !== $this->id_nota_ || (!empty($format_fields) && isset($format_fields['id_nota_'])))
      {
          nmgp_Form_Num_Val($this->id_nota_, $this->field_config['id_nota_']['symbol_grp'], $this->field_config['id_nota_']['symbol_dec'], "0", "S", $this->field_config['id_nota_']['format_neg'], "", "", "-", $this->field_config['id_nota_']['symbol_fmt']) ; 
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
      $guarda_format_hora = $this->field_config['vencimiento_']['date_format'];
      if ($this->vencimiento_ != "")  
      { 
          nm_conv_data($this->vencimiento_, $this->field_config['vencimiento_']['date_format']) ; 
          $this->vencimiento__hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->vencimiento__hora = substr($this->vencimiento__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->vencimiento__hora = substr($this->vencimiento__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->vencimiento__hora = substr($this->vencimiento__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->vencimiento__hora = substr($this->vencimiento__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->vencimiento__hora = substr($this->vencimiento__hora, 0, -4);
          }
      } 
      if ($this->vencimiento_ == "" && $use_null)  
      { 
          $this->vencimiento_ = "null" ; 
      } 
      $this->field_config['vencimiento_']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_all_vert();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['iddet_']['keyVal'] = detallecompra_new_nc_pack_protect_string($this->nmgp_dados_form['iddet_']);
          }
   } // ajax_return_values
   function ajax_return_values_all_vert()
   {
          if (isset($this->nmgp_refresh_fields) && isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row] = $this->NM_ajax_info['param'];
              if ((isset($this->Embutida_ronly) && $this->Embutida_ronly) || $this->NM_ajax_force_values)
              {
                  if (isset($this->NM_ajax_changed['cod_barras_']) && $this->NM_ajax_changed['cod_barras_'])
                  {
                      $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['cod_barras_'] = $this->cod_barras_;
                  }
                  if (isset($this->NM_ajax_changed['idpro_']) && $this->NM_ajax_changed['idpro_'])
                  {
                      $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['idpro_'] = $this->idpro_;
                  }
                  if (isset($this->NM_ajax_changed['ver_']) && $this->NM_ajax_changed['ver_'])
                  {
                      $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['ver_'] = $this->ver_;
                  }
                  if (isset($this->NM_ajax_changed['presentacion_']) && $this->NM_ajax_changed['presentacion_'])
                  {
                      $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['presentacion_'] = $this->presentacion_;
                  }
                  if (isset($this->NM_ajax_changed['cantidad_']) && $this->NM_ajax_changed['cantidad_'])
                  {
                      $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['cantidad_'] = $this->cantidad_;
                  }
                  if (isset($this->NM_ajax_changed['valorunit_']) && $this->NM_ajax_changed['valorunit_'])
                  {
                      $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['valorunit_'] = $this->valorunit_;
                  }
                  if (isset($this->NM_ajax_changed['porc_desc_']) && $this->NM_ajax_changed['porc_desc_'])
                  {
                      $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['porc_desc_'] = $this->porc_desc_;
                  }
                  if (isset($this->NM_ajax_changed['descuento_']) && $this->NM_ajax_changed['descuento_'])
                  {
                      $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['descuento_'] = $this->descuento_;
                  }
                  if (isset($this->NM_ajax_changed['valorpar_']) && $this->NM_ajax_changed['valorpar_'])
                  {
                      $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['valorpar_'] = $this->valorpar_;
                  }
                  if (isset($this->NM_ajax_changed['iva_']) && $this->NM_ajax_changed['iva_'])
                  {
                      $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['iva_'] = $this->iva_;
                  }
                  if (isset($this->NM_ajax_changed['idbod_']) && $this->NM_ajax_changed['idbod_'])
                  {
                      $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['idbod_'] = $this->idbod_;
                  }
                  if (isset($this->NM_ajax_changed['tasaiva_']) && $this->NM_ajax_changed['tasaiva_'])
                  {
                      $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['tasaiva_'] = $this->tasaiva_;
                  }
                  if (isset($this->NM_ajax_changed['tasadesc_']) && $this->NM_ajax_changed['tasadesc_'])
                  {
                      $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['tasadesc_'] = $this->tasadesc_;
                  }
                  if (isset($this->NM_ajax_changed['devuelto_']) && $this->NM_ajax_changed['devuelto_'])
                  {
                      $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['devuelto_'] = $this->devuelto_;
                  }
                  if (isset($this->NM_ajax_changed['vencimiento_']) && $this->NM_ajax_changed['vencimiento_'])
                  {
                      $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['vencimiento_'] = $this->vencimiento_;
                  }
                  if (isset($this->NM_ajax_changed['lote_']) && $this->NM_ajax_changed['lote_'])
                  {
                      $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['lote_'] = $this->lote_;
                  }
                  if (isset($this->NM_ajax_changed['serial_codbarra_']) && $this->NM_ajax_changed['serial_codbarra_'])
                  {
                      $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['serial_codbarra_'] = $this->serial_codbarra_;
                  }
                  if (isset($this->NM_ajax_changed['iddet_']) && $this->NM_ajax_changed['iddet_'])
                  {
                      $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['iddet_'] = $this->iddet_;
                  }
                  if (isset($this->NM_ajax_changed['idfaccom_']) && $this->NM_ajax_changed['idfaccom_'])
                  {
                      $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['idfaccom_'] = $this->idfaccom_;
                  }
                  if (isset($this->NM_ajax_changed['tipo_docu_']) && $this->NM_ajax_changed['tipo_docu_'])
                  {
                      $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['tipo_docu_'] = $this->tipo_docu_;
                  }
                  if (isset($this->NM_ajax_changed['tipo_trans_']) && $this->NM_ajax_changed['tipo_trans_'])
                  {
                      $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['tipo_trans_'] = $this->tipo_trans_;
                  }
                  if (isset($this->NM_ajax_changed['id_nota_']) && $this->NM_ajax_changed['id_nota_'])
                  {
                      $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['id_nota_'] = $this->id_nota_;
                  }
              }
          }
          if (isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['cod_barras_'] = $this->cod_barras_;
              $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['ver_'] = $this->ver_;
              $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['presentacion_'] = $this->presentacion_;
              $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['lote_'] = $this->lote_;
              $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['serial_codbarra_'] = $this->serial_codbarra_;
              $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['tipo_docu_'] = $this->tipo_docu_;
              $this->form_vert_detallecompra_new_nc[$this->nmgp_refresh_row]['tipo_trans_'] = $this->tipo_trans_;
          }
          $this->NM_ajax_info['rsSize']            = sizeof($this->form_vert_detallecompra_new_nc);
          $this->NM_ajax_info['buttonDisplayVert'] = array();
          foreach($this->form_vert_detallecompra_new_nc as $sc_seq_vert => $aRecData)
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
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cod_barras_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['cod_barras_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['cod_barras_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idpro_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['idpro_']);
                  $this->idpro_ = $sTmpValue;
                  $this->nm_clear_val('idpro_');
                  $sTmpValue = $this->idpro_;
                  $aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idpro_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idpro_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idpro_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idpro_'] = array(); 
    }

   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_porc_desc_ = $this->porc_desc_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_iva_ = $this->iva_;
   $old_value_tasaiva_ = $this->tasaiva_;
   $old_value_tasadesc_ = $this->tasadesc_;
   $old_value_devuelto_ = $this->devuelto_;
   $old_value_vencimiento_ = $this->vencimiento_;
   $old_value_iddet_ = $this->iddet_;
   $old_value_idfaccom_ = $this->idfaccom_;
   $old_value_id_nota_ = $this->id_nota_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_porc_desc_ = $this->porc_desc_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_tasaiva_ = $this->tasaiva_;
   $unformatted_value_tasadesc_ = $this->tasadesc_;
   $unformatted_value_devuelto_ = $this->devuelto_;
   $unformatted_value_vencimiento_ = $this->vencimiento_;
   $unformatted_value_iddet_ = $this->iddet_;
   $unformatted_value_idfaccom_ = $this->idfaccom_;
   $unformatted_value_id_nota_ = $this->id_nota_;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro FROM productos WHERE idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idprod, concat(codigobar, \" - \",nompro) FROM productos WHERE idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idprod, codigobar&\" - \"&nompro FROM productos WHERE idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro FROM productos WHERE idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   else
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }

   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->porc_desc_ = $old_value_porc_desc_;
   $this->descuento_ = $old_value_descuento_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->iva_ = $old_value_iva_;
   $this->tasaiva_ = $old_value_tasaiva_;
   $this->tasadesc_ = $old_value_tasadesc_;
   $this->devuelto_ = $old_value_devuelto_;
   $this->vencimiento_ = $old_value_vencimiento_;
   $this->iddet_ = $old_value_iddet_;
   $this->idfaccom_ = $old_value_idfaccom_;
   $this->id_nota_ = $old_value_id_nota_;

   if ('' != $aRecData['idpro_'] && '' != $aRecData['idpro_'] && '' != $aRecData['idpro_'] && '' != $aRecData['idpro_'] && '' != $aRecData['idpro_'] && '' != $aRecData['idpro_'] && '' != $aRecData['idpro_'])
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
              $aLookup[] = array(detallecompra_new_nc_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', detallecompra_new_nc_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idpro_'][] = $rs->fields[0];
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
                  $this->NM_ajax_info['fldList']['idpro_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select2_ac',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idpro_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idpro_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idpro_' . $sc_seq_vert]['labList'] = $aLabel;
          $this->NM_ajax_info['fldList']['idpro_' . $sc_seq_vert . '_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($aLookup[0][detallecompra_new_nc_pack_protect_string($aRecData['idpro_'])]),
              );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ver_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['ver_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['ver_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("presentacion_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['presentacion_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['presentacion_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              $this->presentacion_ = $aRecData['presentacion_'];
              $orig_presentacion_ = $this->presentacion_;
              $presentacion_      = $this->presentacion_;
              $this->presentacion_ = $presentacion_;
              $this->lookup_presentacion_($conteudo);
              $this->presentacion_ = $orig_presentacion_;
              $this->NM_ajax_info['fldList']['presentacion_' . $sc_seq_vert]['lookupCons'] = detallecompra_new_nc_pack_protect_string($conteudo);
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cantidad_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['cantidad_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['cantidad_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valorunit_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['valorunit_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['valorunit_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("porc_desc_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['porc_desc_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['porc_desc_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("descuento_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['descuento_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['descuento_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valorpar_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['valorpar_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['valorpar_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("iva_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['iva_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['iva_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idbod_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['idbod_']);
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idbod_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idbod_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idbod_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idbod_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_porc_desc_ = $this->porc_desc_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_iva_ = $this->iva_;
   $old_value_tasaiva_ = $this->tasaiva_;
   $old_value_tasadesc_ = $this->tasadesc_;
   $old_value_devuelto_ = $this->devuelto_;
   $old_value_vencimiento_ = $this->vencimiento_;
   $old_value_iddet_ = $this->iddet_;
   $old_value_idfaccom_ = $this->idfaccom_;
   $old_value_id_nota_ = $this->id_nota_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_porc_desc_ = $this->porc_desc_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_tasaiva_ = $this->tasaiva_;
   $unformatted_value_tasadesc_ = $this->tasadesc_;
   $unformatted_value_devuelto_ = $this->devuelto_;
   $unformatted_value_vencimiento_ = $this->vencimiento_;
   $unformatted_value_iddet_ = $this->iddet_;
   $unformatted_value_idfaccom_ = $this->idfaccom_;
   $unformatted_value_id_nota_ = $this->id_nota_;

   $nm_comando = "SELECT idbodega, bodega  FROM bodegas  ORDER BY bodega";

   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->porc_desc_ = $old_value_porc_desc_;
   $this->descuento_ = $old_value_descuento_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->iva_ = $old_value_iva_;
   $this->tasaiva_ = $old_value_tasaiva_;
   $this->tasadesc_ = $old_value_tasadesc_;
   $this->devuelto_ = $old_value_devuelto_;
   $this->vencimiento_ = $old_value_vencimiento_;
   $this->iddet_ = $old_value_iddet_;
   $this->idfaccom_ = $old_value_idfaccom_;
   $this->id_nota_ = $old_value_id_nota_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(detallecompra_new_nc_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', detallecompra_new_nc_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idbod_'][] = $rs->fields[0];
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
          $sSelComp = "name=\"idbod_\"";
          if (isset($this->NM_ajax_info['select_html']['idbod_']) && !empty($this->NM_ajax_info['select_html']['idbod_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['idbod_']) . "\";");
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
                  $this->NM_ajax_info['fldList']['idbod_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
               'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idbod_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idbod_' . $sc_seq_vert]['valList'][$i] = detallecompra_new_nc_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idbod_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idbod_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idbod_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tasaiva_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['tasaiva_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['tasaiva_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tasadesc_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['tasadesc_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['tasadesc_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("devuelto_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['devuelto_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['devuelto_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("vencimiento_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['vencimiento_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['vencimiento_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("lote_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['lote_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['lote_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("serial_codbarra_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['serial_codbarra_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['serial_codbarra_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("iddet_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['iddet_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['iddet_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idfaccom_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['idfaccom_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['idfaccom_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_docu_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['tipo_docu_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['tipo_docu_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_trans_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['tipo_trans_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['tipo_trans_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_nota_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['id_nota_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['id_nota_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['upload_dir'][$fieldName][] = $newName;
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
          if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
          $_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cantidad_ = $this->cantidad_;
    $original_cod_barras_ = $this->cod_barras_;
    $original_descuento_ = $this->descuento_;
    $original_devuelto_ = $this->devuelto_;
    $original_idbod_ = $this->idbod_;
    $original_idfaccom_ = $this->idfaccom_;
    $original_idpro_ = $this->idpro_;
    $original_lote_ = $this->lote_;
    $original_presentacion_ = $this->presentacion_;
    $original_serial_codbarra_ = $this->serial_codbarra_;
    $original_valorunit_ = $this->valorunit_;
    $original_vencimiento_ = $this->vencimiento_;
    $original_ver_ = $this->ver_;
}
if (!isset($this->sc_temp_gSw_3)) {$this->sc_temp_gSw_3 = (isset($_SESSION['gSw_3'])) ? $_SESSION['gSw_3'] : "";}
if (!isset($this->sc_temp_gSw_2)) {$this->sc_temp_gSw_2 = (isset($_SESSION['gSw_2'])) ? $_SESSION['gSw_2'] : "";}
if (!isset($this->sc_temp_gSw_1)) {$this->sc_temp_gSw_1 = (isset($_SESSION['gSw_1'])) ? $_SESSION['gSw_1'] : "";}
if (!isset($this->sc_temp_edit_cantidad)) {$this->sc_temp_edit_cantidad = (isset($_SESSION['edit_cantidad'])) ? $_SESSION['edit_cantidad'] : "";}
if (!isset($this->sc_temp_sw)) {$this->sc_temp_sw = (isset($_SESSION['sw'])) ? $_SESSION['sw'] : "";}
if (!isset($this->sc_temp_par_idfaccom)) {$this->sc_temp_par_idfaccom = (isset($_SESSION['par_idfaccom'])) ? $_SESSION['par_idfaccom'] : "";}
if (!isset($this->sc_temp_gTcompra)) {$this->sc_temp_gTcompra = (isset($_SESSION['gTcompra'])) ? $_SESSION['gTcompra'] : "";}
  $vtmpproductoid = $this->idpro_ ;
if(!empty($vtmpproductoid))
{
	$this->ver_  = "<a href='../form_producto_precioscompra/index.php?gtmpidprod=".$vtmpproductoid."' target='_blank'>Ver</a>";
}

$this->sc_temp_gTcompra=0;
$this->idfaccom_ =$this->sc_temp_par_idfaccom;
$this->sc_temp_sw=0;
$this->sc_temp_edit_cantidad=0;
if($this->idpro_ >0)
	{
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
	}

if ($this->devuelto_ >0)
	{
	$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
	$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;
	$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;
	}
if($this->idpro_ >0)
	{
	$sql="select unidmaymen, unimay, unimen from productos where idprod=$this->idpro_ ";
	 
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
	$resp=$this->ds[0][0];

	if($resp=="SI")
		{
		$this->presentacion_ =$this->ds[0][1];
		}
	else
		{
		$this->presentacion_ =$this->ds[0][2];
		}
	}
if($this->colores_ ==0 or $this->colores_ =="")
	{
	$this->nmgp_cmp_hidden["colores_"] = "off"; $this->NM_ajax_info['fieldDisplay']['colores_'] = 'off';
	}
else
	{
	$this->nmgp_cmp_hidden["colores_"] = "on"; $this->NM_ajax_info['fieldDisplay']['colores_'] = 'on';
	}
if($this->tallas_ ==0 or $this->tallas_ =="")
	{
	$this->nmgp_cmp_hidden["tallas_"] = "off"; $this->NM_ajax_info['fieldDisplay']['tallas_'] = 'off';
	}
else
	{
	$this->nmgp_cmp_hidden["tallas_"] = "on"; $this->NM_ajax_info['fieldDisplay']['tallas_'] = 'on';
	}
if($this->sabor_ ==0 or $this->sabor_ =="")
	{
	$this->nmgp_cmp_hidden["sabor_"] = "off"; $this->NM_ajax_info['fieldDisplay']['sabor_'] = 'off';
	}
else
	{
	$this->nmgp_cmp_hidden["sabor_"] = "on"; $this->NM_ajax_info['fieldDisplay']['sabor_'] = 'on';
	}
$vElSerial='';
$vElLote='';
$vLaFecha='';

if($this->idpro_ >0)
	{
	 
      $nm_select = "select fecha_vencimiento, lote, serial_codbarras, codigobar from productos where idprod=$this->idpro_ "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
     if ($this->idpro_ != "")
     { 
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
     } 
;
	if($this->dt[0][0]=='NO' and $this->sc_temp_gSw_1==0)
		{
		$this->vencimiento_ ='';
		$this->nmgp_cmp_hidden["vencimiento_"] = "off"; $this->NM_ajax_info['fieldDisplay']['vencimiento_'] = 'off';
		$this->sc_temp_gSw_1=0;
		}
	else
		{
		$this->nmgp_cmp_hidden["vencimiento_"] = "on"; $this->NM_ajax_info['fieldDisplay']['vencimiento_'] = 'on';
		$vLaFecha=$this->vencimiento_ ;
		$this->sc_temp_gSw_1=1;
		}
	
	if($this->dt[0][1]=='NO' and $this->sc_temp_gSw_2==0)
		{
		$this->lote_ ='';
		$this->nmgp_cmp_hidden["lote_"] = "off"; $this->NM_ajax_info['fieldDisplay']['lote_'] = 'off';
		$this->sc_temp_gSw_2=0;
		}
	else
		{
		$this->nmgp_cmp_hidden["lote_"] = "on"; $this->NM_ajax_info['fieldDisplay']['lote_'] = 'on';
		$vElLote=$this->lote_ ;
		$this->sc_temp_gSw_2=1;
		}
	
	if ($this->dt[0][2]=='NO' and $this->sc_temp_gSw_3==0)
		{
		$this->serial_codbarra_ ='';
		$this->nmgp_cmp_hidden["serial_codbarra_"] = "off"; $this->NM_ajax_info['fieldDisplay']['serial_codbarra_'] = 'off';
		$this->sc_temp_gSw_3=0;
		}
	else
		{
		$vElSerial=$this->serial_codbarra_ ;
		$this->nmgp_cmp_hidden["serial_codbarra_"] = "on"; $this->NM_ajax_info['fieldDisplay']['serial_codbarra_'] = 'on';
		$this->sc_temp_gSw_3=1;
		}
	$this->cod_barras_ =$this->dt[0][3];
	
	}
else
	{
	$this->nmgp_cmp_hidden["fecha_fab_"] = "off"; $this->NM_ajax_info['fieldDisplay']['fecha_fab_'] = 'off';
	$this->nmgp_cmp_hidden["serial_codbarra_"] = "off"; $this->NM_ajax_info['fieldDisplay']['serial_codbarra_'] = 'off';
	$this->nmgp_cmp_hidden["vencimiento_"] = "off"; $this->NM_ajax_info['fieldDisplay']['vencimiento_'] = 'off';
	$this->nmgp_cmp_hidden["lote_"] = "off"; $this->NM_ajax_info['fieldDisplay']['lote_'] = 'off';
	}

if($this->idpro_ >0)
	{
	if( $this->dt[0][0]=='SI' or $this->dt[0][1]=='SI' or $this->dt[0][2]=='SI')
		{
		$this->sc_field_readonly("fecha_fab_", 'on', (isset($sc_seq_vert) ? $sc_seq_vert : ''));
		$this->sc_field_readonly("serial_codbarra_", 'on', (isset($sc_seq_vert) ? $sc_seq_vert : ''));
		$this->serial_codbarra_ =$vElSerial;
		$this->sc_field_readonly("vencimiento_", 'on', (isset($sc_seq_vert) ? $sc_seq_vert : ''));
		$this->vencimiento_ =$vLaFecha;
		$this->sc_field_readonly("lote_", 'on', (isset($sc_seq_vert) ? $sc_seq_vert : ''));
		$this->lote_ =$vElLote;
		$this->sc_field_readonly("cantidad_", 'on', (isset($sc_seq_vert) ? $sc_seq_vert : ''));
		$this->sc_field_readonly("cod_barras_", 'on', (isset($sc_seq_vert) ? $sc_seq_vert : ''));
		$this->sc_field_readonly("idpro_", 'on', (isset($sc_seq_vert) ? $sc_seq_vert : ''));
		$this->sc_field_readonly("valorunit_", 'on', (isset($sc_seq_vert) ? $sc_seq_vert : ''));
		$this->sc_field_readonly("descuento_", 'on', (isset($sc_seq_vert) ? $sc_seq_vert : ''));
		$this->sc_field_readonly("idbod_", 'on', (isset($sc_seq_vert) ? $sc_seq_vert : ''));
		}
	else
		{
		$this->sc_field_readonly("idpro_", 'on', (isset($sc_seq_vert) ? $sc_seq_vert : ''));
		$this->sc_field_readonly("valorunit_", 'off', (isset($sc_seq_vert) ? $sc_seq_vert : ''));
		$this->sc_field_readonly("descuento_", 'off', (isset($sc_seq_vert) ? $sc_seq_vert : ''));
		$this->sc_field_readonly("idbod_", 'off', (isset($sc_seq_vert) ? $sc_seq_vert : ''));
		}
	}
if (isset($this->sc_temp_gTcompra)) { $_SESSION['gTcompra'] = $this->sc_temp_gTcompra;}
if (isset($this->sc_temp_par_idfaccom)) { $_SESSION['par_idfaccom'] = $this->sc_temp_par_idfaccom;}
if (isset($this->sc_temp_sw)) { $_SESSION['sw'] = $this->sc_temp_sw;}
if (isset($this->sc_temp_edit_cantidad)) { $_SESSION['edit_cantidad'] = $this->sc_temp_edit_cantidad;}
if (isset($this->sc_temp_gSw_1)) { $_SESSION['gSw_1'] = $this->sc_temp_gSw_1;}
if (isset($this->sc_temp_gSw_2)) { $_SESSION['gSw_2'] = $this->sc_temp_gSw_2;}
if (isset($this->sc_temp_gSw_3)) { $_SESSION['gSw_3'] = $this->sc_temp_gSw_3;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cantidad_ != $this->cantidad_ || (isset($bFlagRead_cantidad_) && $bFlagRead_cantidad_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['cantidad_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['cantidad_' . $this->nmgp_refresh_row]['valList'] = array($this->cantidad_);
        $this->NM_ajax_changed['cantidad_'] = true;
    }
    if (($original_cod_barras_ != $this->cod_barras_ || (isset($bFlagRead_cod_barras_) && $bFlagRead_cod_barras_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['cod_barras_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['cod_barras_' . $this->nmgp_refresh_row]['valList'] = array($this->cod_barras_);
        $this->NM_ajax_changed['cod_barras_'] = true;
    }
    if (($original_descuento_ != $this->descuento_ || (isset($bFlagRead_descuento_) && $bFlagRead_descuento_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['descuento_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['descuento_' . $this->nmgp_refresh_row]['valList'] = array($this->descuento_);
        $this->NM_ajax_changed['descuento_'] = true;
    }
    if (($original_devuelto_ != $this->devuelto_ || (isset($bFlagRead_devuelto_) && $bFlagRead_devuelto_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['devuelto_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['devuelto_' . $this->nmgp_refresh_row]['valList'] = array($this->devuelto_);
        $this->NM_ajax_changed['devuelto_'] = true;
    }
    if (($original_idbod_ != $this->idbod_ || (isset($bFlagRead_idbod_) && $bFlagRead_idbod_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['idbod_' . $this->nmgp_refresh_row]['type']    = 'select';
        $this->NM_ajax_info['fldList']['idbod_' . $this->nmgp_refresh_row]['valList'] = array($this->idbod_);
        $this->NM_ajax_changed['idbod_'] = true;
    }
    if (($original_idfaccom_ != $this->idfaccom_ || (isset($bFlagRead_idfaccom_) && $bFlagRead_idfaccom_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['idfaccom_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['idfaccom_' . $this->nmgp_refresh_row]['valList'] = array($this->idfaccom_);
        $this->NM_ajax_changed['idfaccom_'] = true;
    }
    if (($original_idpro_ != $this->idpro_ || (isset($bFlagRead_idpro_) && $bFlagRead_idpro_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['idpro_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['idpro_' . $this->nmgp_refresh_row]['valList'] = array($this->idpro_);
        $this->NM_ajax_changed['idpro_'] = true;
    }
    if (($original_lote_ != $this->lote_ || (isset($bFlagRead_lote_) && $bFlagRead_lote_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['lote_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['lote_' . $this->nmgp_refresh_row]['valList'] = array($this->lote_);
        $this->NM_ajax_changed['lote_'] = true;
    }
    if (($original_presentacion_ != $this->presentacion_ || (isset($bFlagRead_presentacion_) && $bFlagRead_presentacion_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['presentacion_' . $this->nmgp_refresh_row]['type']    = 'label';
        $this->NM_ajax_info['fldList']['presentacion_' . $this->nmgp_refresh_row]['valList'] = array($this->presentacion_);
        $this->NM_ajax_changed['presentacion_'] = true;
    }
    if (($original_serial_codbarra_ != $this->serial_codbarra_ || (isset($bFlagRead_serial_codbarra_) && $bFlagRead_serial_codbarra_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['serial_codbarra_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['serial_codbarra_' . $this->nmgp_refresh_row]['valList'] = array($this->serial_codbarra_);
        $this->NM_ajax_changed['serial_codbarra_'] = true;
    }
    if (($original_valorunit_ != $this->valorunit_ || (isset($bFlagRead_valorunit_) && $bFlagRead_valorunit_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['valorunit_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['valorunit_' . $this->nmgp_refresh_row]['valList'] = array($this->valorunit_);
        $this->NM_ajax_changed['valorunit_'] = true;
    }
    if (($original_vencimiento_ != $this->vencimiento_ || (isset($bFlagRead_vencimiento_) && $bFlagRead_vencimiento_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['vencimiento_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['vencimiento_' . $this->nmgp_refresh_row]['valList'] = array($this->vencimiento_);
        $this->NM_ajax_changed['vencimiento_'] = true;
    }
    if (($original_ver_ != $this->ver_ || (isset($bFlagRead_ver_) && $bFlagRead_ver_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['ver_' . $this->nmgp_refresh_row]['type']    = 'label';
        $this->NM_ajax_info['fldList']['ver_' . $this->nmgp_refresh_row]['valList'] = array($this->ver_);
        $this->NM_ajax_changed['ver_'] = true;
    }
}
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off'; 
          }
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
//
   function nm_troca_decimal($sc_parm1, $sc_parm2) 
   { 
      $this->cantidad_ = str_replace($sc_parm1, $sc_parm2, $this->cantidad_); 
      $this->valorunit_ = str_replace($sc_parm1, $sc_parm2, $this->valorunit_); 
      $this->porc_desc_ = str_replace($sc_parm1, $sc_parm2, $this->porc_desc_); 
      $this->descuento_ = str_replace($sc_parm1, $sc_parm2, $this->descuento_); 
      $this->valorpar_ = str_replace($sc_parm1, $sc_parm2, $this->valorpar_); 
      $this->iva_ = str_replace($sc_parm1, $sc_parm2, $this->iva_); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->cantidad_ = "'" . $this->cantidad_ . "'";
      $this->valorunit_ = "'" . $this->valorunit_ . "'";
      $this->porc_desc_ = "'" . $this->porc_desc_ . "'";
      $this->descuento_ = "'" . $this->descuento_ . "'";
      $this->valorpar_ = "'" . $this->valorpar_ . "'";
      $this->iva_ = "'" . $this->iva_ . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->cantidad_ = str_replace("'", "", $this->cantidad_); 
      $this->valorunit_ = str_replace("'", "", $this->valorunit_); 
      $this->porc_desc_ = str_replace("'", "", $this->porc_desc_); 
      $this->descuento_ = str_replace("'", "", $this->descuento_); 
      $this->valorpar_ = str_replace("'", "", $this->valorpar_); 
      $this->iva_ = str_replace("'", "", $this->iva_); 
   } 
//----------- 

   function return_after_insert()
   {
      global $sc_where;
      $sc_where_pos = " WHERE ((iddet < $this->iddet_))";
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
      if ('' != $this->iddet_)
      {
          $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count;
          $rsc = $this->Db->Execute($nmgp_sel_count);
          if ($rsc === false && !$rsc->EOF)
          {
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
              exit;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] = $rsc->fields[0];
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
    if ("incluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_id_nota_ = $this->id_nota_;
    $original_idpro_ = $this->idpro_;
    $original_lote_ = $this->lote_;
    $original_serial_codbarra_ = $this->serial_codbarra_;
    $original_tipo_docu_ = $this->tipo_docu_;
    $original_tipo_trans_ = $this->tipo_trans_;
    $original_vencimiento_ = $this->vencimiento_;
}
if (!isset($this->sc_temp_cost_ant)) {$this->sc_temp_cost_ant = (isset($_SESSION['cost_ant'])) ? $_SESSION['cost_ant'] : "";}
  $sql_cost="SELECT costomen FROM productos WHERE idprod='".$this->idpro_ ."'";
 
      $nm_select = $sql_cost; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_cost = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->ds_cost[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_cost = false;
          $this->ds_cost_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->ds_cost[0][0]))
	{
	$this->sc_temp_cost_ant = $this->ds_cost[0][0];
	}
else
	{
	$this->sc_temp_cost_ant = 0;
	}

if($this->idpro_ >0)
	{
	 
      $nm_select = "select fecha_vencimiento, lote, serial_codbarras, codigobar from productos where idprod='".$this->idpro_ ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
     if ($this->idpro_ != "")
     { 
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
     } 
;
	if($this->dt[0][0]=='NO')
		{
		$this->vencimiento_ ='';
		}
		
	if($this->dt[0][1]=='NO')
		{
		$this->lote_ ='';
		}
	
	if ($this->dt[0][2]=='NO')
		{
		$this->serial_codbarra_ ='';
		}
	}
$this->tipo_docu_   = 'NC';
$this->tipo_trans_  = 'DESC';
$this->id_nota_  = 0;

$sql_tp = "select idgrup from productos where idprod = '".$this->idpro_ ."'";
 
      $nm_select = $sql_tp; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dtp = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dtp[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dtp = false;
          $this->dtp_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->dtp[0][0]))
	{
	if($this->dtp[0][0]!=1)
		{
		
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "No se puede agregar producto diferentes a los Registrasdos <br>en la compra a la NC, excepto, ítem de descuento general a la compra";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_detallecompra_new_nc';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_detallecompra_new_nc';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "No se puede agregar producto diferentes a los Registrasdos <br>en la compra a la NC, excepto, ítem de descuento general a la compra";
 }
;
		}
	}
if (isset($this->sc_temp_cost_ant)) { $_SESSION['cost_ant'] = $this->sc_temp_cost_ant;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_id_nota_ != $this->id_nota_ || (isset($bFlagRead_id_nota_) && $bFlagRead_id_nota_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['id_nota_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['id_nota_' . $this->nmgp_refresh_row]['valList'] = array($this->id_nota_);
        $this->NM_ajax_changed['id_nota_'] = true;
    }
    if (($original_idpro_ != $this->idpro_ || (isset($bFlagRead_idpro_) && $bFlagRead_idpro_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['idpro_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['idpro_' . $this->nmgp_refresh_row]['valList'] = array($this->idpro_);
        $this->NM_ajax_changed['idpro_'] = true;
    }
    if (($original_lote_ != $this->lote_ || (isset($bFlagRead_lote_) && $bFlagRead_lote_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['lote_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['lote_' . $this->nmgp_refresh_row]['valList'] = array($this->lote_);
        $this->NM_ajax_changed['lote_'] = true;
    }
    if (($original_serial_codbarra_ != $this->serial_codbarra_ || (isset($bFlagRead_serial_codbarra_) && $bFlagRead_serial_codbarra_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['serial_codbarra_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['serial_codbarra_' . $this->nmgp_refresh_row]['valList'] = array($this->serial_codbarra_);
        $this->NM_ajax_changed['serial_codbarra_'] = true;
    }
    if (($original_tipo_docu_ != $this->tipo_docu_ || (isset($bFlagRead_tipo_docu_) && $bFlagRead_tipo_docu_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['tipo_docu_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['tipo_docu_' . $this->nmgp_refresh_row]['valList'] = array($this->tipo_docu_);
        $this->NM_ajax_changed['tipo_docu_'] = true;
    }
    if (($original_tipo_trans_ != $this->tipo_trans_ || (isset($bFlagRead_tipo_trans_) && $bFlagRead_tipo_trans_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['tipo_trans_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['tipo_trans_' . $this->nmgp_refresh_row]['valList'] = array($this->tipo_trans_);
        $this->NM_ajax_changed['tipo_trans_'] = true;
    }
    if (($original_vencimiento_ != $this->vencimiento_ || (isset($bFlagRead_vencimiento_) && $bFlagRead_vencimiento_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['vencimiento_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['vencimiento_' . $this->nmgp_refresh_row]['valList'] = array($this->vencimiento_);
        $this->NM_ajax_changed['vencimiento_'] = true;
    }
}
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off'; 
    }
    if ("alterar" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cantidad_ = $this->cantidad_;
    $original_id_nota_ = $this->id_nota_;
    $original_tipo_trans_ = $this->tipo_trans_;
    $original_valorunit_ = $this->valorunit_;
}
  
$sql_det = "SELECT cantidad, valorunit FROM detallecompra WHERE iddet = '".$this->id_nota_ ."'";
 
      $nm_select = $sql_det; 
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
	if($this->cantidad_ ==$this->det[0][0])
		{
		if($this->valorunit_ ==$this->det[0][0])
			{
			$this->tipo_trans_  = 'DEV';
			}
		elseif($this->valorunit_ <$this->det[0][0])
			{
			$this->tipo_trans_  = 'DESC';
			}
		else
			{
			
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Es Nota de Devolución, Valor Unitario NO puede ser mayor, <br>que el registrado en Compra!!!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_detallecompra_new_nc';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_detallecompra_new_nc';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "Es Nota de Devolución, Valor Unitario NO puede ser mayor, <br>que el registrado en Compra!!!";
 }
;
			}
		}
	elseif($this->cantidad_ <$this->det[0][0])
		{
		if($this->valorunit_ ==$this->det[0][0])
			{
			$this->tipo_trans_  = 'DEV';
			}
		else
			{
			
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Es Nota de Devolución, Valor Unitario NO puede ser diferente, <br> para una parte del ítem registrado en Compra!!!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_detallecompra_new_nc';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_detallecompra_new_nc';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "Es Nota de Devolución, Valor Unitario NO puede ser diferente, <br> para una parte del ítem registrado en Compra!!!";
 }
;
			}
		}
	else
		{
		
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Es Nota de Devolución, Cantidad NO puede ser mayor, <br>que el registrado en Compra!!!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_detallecompra_new_nc';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_detallecompra_new_nc';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "Es Nota de Devolución, Cantidad NO puede ser mayor, <br>que el registrado en Compra!!!";
 }
;
		}
	}
else
	{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Ítem no relacionado con lo registrado en Compra!!!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_detallecompra_new_nc';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_detallecompra_new_nc';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "Ítem no relacionado con lo registrado en Compra!!!";
 }
;
	}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cantidad_ != $this->cantidad_ || (isset($bFlagRead_cantidad_) && $bFlagRead_cantidad_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['cantidad_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['cantidad_' . $this->nmgp_refresh_row]['valList'] = array($this->cantidad_);
        $this->NM_ajax_changed['cantidad_'] = true;
    }
    if (($original_id_nota_ != $this->id_nota_ || (isset($bFlagRead_id_nota_) && $bFlagRead_id_nota_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['id_nota_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['id_nota_' . $this->nmgp_refresh_row]['valList'] = array($this->id_nota_);
        $this->NM_ajax_changed['id_nota_'] = true;
    }
    if (($original_tipo_trans_ != $this->tipo_trans_ || (isset($bFlagRead_tipo_trans_) && $bFlagRead_tipo_trans_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['tipo_trans_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['tipo_trans_' . $this->nmgp_refresh_row]['valList'] = array($this->tipo_trans_);
        $this->NM_ajax_changed['tipo_trans_'] = true;
    }
    if (($original_valorunit_ != $this->valorunit_ || (isset($bFlagRead_valorunit_) && $bFlagRead_valorunit_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['valorunit_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['valorunit_' . $this->nmgp_refresh_row]['valList'] = array($this->valorunit_);
        $this->NM_ajax_changed['valorunit_'] = true;
    }
}
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off'; 
    }
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cantidad_ = $this->cantidad_;
    $original_idfaccom_ = $this->idfaccom_;
    $original_idpro_ = $this->idpro_;
    $original_valorpar_ = $this->valorpar_;
    $original_valorunit_ = $this->valorunit_;
}
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
   
      $nm_select = "select numfacom from facturacom where idfaccom='".$this->idfaccom_ ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDatosFactura = array();
      $this->vdatosfactura = array();
     if ($this->idfaccom_ != "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vDatosFactura[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vdatosfactura[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDatosFactura = false;
          $this->vDatosFactura_erro = $this->Db->ErrorMsg();
          $this->vdatosfactura = false;
          $this->vdatosfactura_erro = $this->Db->ErrorMsg();
      } 
     } 
;

if(isset($this->vdatosfactura[0][0]))
{
	$vnumfacom = $this->vdatosfactura[0][0];
	
	 
      $nm_select = "select codigobar, nompro from productos where idprod='".$this->idpro_ ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vProducto = array();
      $this->vproducto = array();
     if ($this->idpro_ != "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vProducto[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vproducto[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vProducto = false;
          $this->vProducto_erro = $this->Db->ErrorMsg();
          $this->vproducto = false;
          $this->vproducto_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	
	if(isset($this->vproducto[0][0]))
	{
		$vprod = $this->vproducto[0][0].' - '.$this->vproducto[0][1];
		
		
     $nm_select ="insert into log set usuario='".$this->sc_temp_gidtercero."',accion='ELIMINAR', observaciones='EL USUARIO ELIMINÓ EL PRODUCTO: ".$vprod.", CANTIDAD: $this->cantidad_ , COSTO/U: ".number_format($this->valorunit_ ).", TOTAL LINEA: ".number_format($this->valorpar_ )." A LA COMPRA NO: ".$vnumfacom.".' "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                detallecompra_new_nc_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	}	
}
if (isset($this->sc_temp_gidtercero)) { $_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cantidad_ != $this->cantidad_ || (isset($bFlagRead_cantidad_) && $bFlagRead_cantidad_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['cantidad_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['cantidad_' . $this->nmgp_refresh_row]['valList'] = array($this->cantidad_);
        $this->NM_ajax_changed['cantidad_'] = true;
    }
    if (($original_idfaccom_ != $this->idfaccom_ || (isset($bFlagRead_idfaccom_) && $bFlagRead_idfaccom_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['idfaccom_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['idfaccom_' . $this->nmgp_refresh_row]['valList'] = array($this->idfaccom_);
        $this->NM_ajax_changed['idfaccom_'] = true;
    }
    if (($original_idpro_ != $this->idpro_ || (isset($bFlagRead_idpro_) && $bFlagRead_idpro_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['idpro_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['idpro_' . $this->nmgp_refresh_row]['valList'] = array($this->idpro_);
        $this->NM_ajax_changed['idpro_'] = true;
    }
    if (($original_valorpar_ != $this->valorpar_ || (isset($bFlagRead_valorpar_) && $bFlagRead_valorpar_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['valorpar_' . $this->nmgp_refresh_row]['type']    = 'label';
        $this->NM_ajax_info['fldList']['valorpar_' . $this->nmgp_refresh_row]['valList'] = array($this->valorpar_);
        $this->NM_ajax_changed['valorpar_'] = true;
    }
    if (($original_valorunit_ != $this->valorunit_ || (isset($bFlagRead_valorunit_) && $bFlagRead_valorunit_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['valorunit_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['valorunit_' . $this->nmgp_refresh_row]['valList'] = array($this->valorunit_);
        $this->NM_ajax_changed['valorunit_'] = true;
    }
}
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          return;
      }
      if ($this->nmgp_opcao == "alterar")
      {
          $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert];
          if ($this->nmgp_dados_select['idpro_'] == $this->idpro_ &&
              $this->nmgp_dados_select['cantidad_'] == $this->cantidad_ &&
              $this->nmgp_dados_select['valorunit_'] == $this->valorunit_ &&
              $this->nmgp_dados_select['porc_desc_'] == $this->porc_desc_ &&
              $this->nmgp_dados_select['descuento_'] == $this->descuento_ &&
              $this->nmgp_dados_select['valorpar_'] == $this->valorpar_ &&
              $this->nmgp_dados_select['iva_'] == $this->iva_ &&
              $this->nmgp_dados_select['idbod_'] == $this->idbod_ &&
              $this->nmgp_dados_select['tasaiva_'] == $this->tasaiva_ &&
              $this->nmgp_dados_select['tasadesc_'] == $this->tasadesc_ &&
              $this->nmgp_dados_select['devuelto_'] == $this->devuelto_ &&
              $this->nmgp_dados_select['vencimiento_'] == $this->vencimiento_ &&
              $this->nmgp_dados_select['lote_'] == $this->lote_ &&
              $this->nmgp_dados_select['serial_codbarra_'] == $this->serial_codbarra_ &&
              $this->nmgp_dados_select['iddet_'] == $this->iddet_ &&
              $this->nmgp_dados_select['idfaccom_'] == $this->idfaccom_ &&
              $this->nmgp_dados_select['tipo_docu_'] == $this->tipo_docu_ &&
              $this->nmgp_dados_select['tipo_trans_'] == $this->tipo_trans_ &&
              $this->nmgp_dados_select['id_nota_'] == $this->id_nota_)
          { }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['idpro_'] = $this->idpro_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['cantidad_'] = $this->cantidad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['valorunit_'] = $this->valorunit_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['porc_desc_'] = $this->porc_desc_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['descuento_'] = $this->descuento_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['valorpar_'] = $this->valorpar_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['iva_'] = $this->iva_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['idbod_'] = $this->idbod_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['tasaiva_'] = $this->tasaiva_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['tasadesc_'] = $this->tasadesc_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['devuelto_'] = $this->devuelto_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['vencimiento_'] = $this->vencimiento_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['lote_'] = $this->lote_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['serial_codbarra_'] = $this->serial_codbarra_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['iddet_'] = $this->iddet_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['idfaccom_'] = $this->idfaccom_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['tipo_docu_'] = $this->tipo_docu_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['tipo_trans_'] = $this->tipo_trans_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['id_nota_'] = $this->id_nota_;
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
      $NM_val_form['cod_barras_'] = $this->cod_barras_;
      $NM_val_form['idpro_'] = $this->idpro_;
      $NM_val_form['ver_'] = $this->ver_;
      $NM_val_form['presentacion_'] = $this->presentacion_;
      $NM_val_form['cantidad_'] = $this->cantidad_;
      $NM_val_form['valorunit_'] = $this->valorunit_;
      $NM_val_form['porc_desc_'] = $this->porc_desc_;
      $NM_val_form['descuento_'] = $this->descuento_;
      $NM_val_form['valorpar_'] = $this->valorpar_;
      $NM_val_form['iva_'] = $this->iva_;
      $NM_val_form['idbod_'] = $this->idbod_;
      $NM_val_form['tasaiva_'] = $this->tasaiva_;
      $NM_val_form['tasadesc_'] = $this->tasadesc_;
      $NM_val_form['devuelto_'] = $this->devuelto_;
      $NM_val_form['vencimiento_'] = $this->vencimiento_;
      $NM_val_form['lote_'] = $this->lote_;
      $NM_val_form['serial_codbarra_'] = $this->serial_codbarra_;
      $NM_val_form['iddet_'] = $this->iddet_;
      $NM_val_form['idfaccom_'] = $this->idfaccom_;
      $NM_val_form['tipo_docu_'] = $this->tipo_docu_;
      $NM_val_form['tipo_trans_'] = $this->tipo_trans_;
      $NM_val_form['id_nota_'] = $this->id_nota_;
      $NM_val_form['colores_'] = $this->colores_;
      $NM_val_form['tallas_'] = $this->tallas_;
      $NM_val_form['sabor_'] = $this->sabor_;
      $NM_val_form['descr_'] = $this->descr_;
      $NM_val_form['fecha_fab_'] = $this->fecha_fab_;
      $NM_val_form['unidad_c_'] = $this->unidad_c_;
      $NM_val_form['num_ndevolucion_'] = $this->num_ndevolucion_;
      if ($this->iddet_ === "" || is_null($this->iddet_))  
      { 
          $this->iddet_ = 0;
      } 
      if ($this->idfaccom_ === "" || is_null($this->idfaccom_))  
      { 
          $this->idfaccom_ = 0;
          $this->sc_force_zero[] = 'idfaccom_';
      } 
      if ($this->idpro_ === "" || is_null($this->idpro_))  
      { 
          $this->idpro_ = 0;
          $this->sc_force_zero[] = 'idpro_';
      } 
      if ($this->idbod_ === "" || is_null($this->idbod_))  
      { 
          $this->idbod_ = 0;
          $this->sc_force_zero[] = 'idbod_';
      } 
      if ($this->cantidad_ === "" || is_null($this->cantidad_))  
      { 
          $this->cantidad_ = 0;
          $this->sc_force_zero[] = 'cantidad_';
      } 
      if ($this->valorunit_ === "" || is_null($this->valorunit_))  
      { 
          $this->valorunit_ = 0;
          $this->sc_force_zero[] = 'valorunit_';
      } 
      if ($this->valorpar_ === "" || is_null($this->valorpar_))  
      { 
          $this->valorpar_ = 0;
          $this->sc_force_zero[] = 'valorpar_';
      } 
      if ($this->iva_ === "" || is_null($this->iva_))  
      { 
          $this->iva_ = 0;
          $this->sc_force_zero[] = 'iva_';
      } 
      if ($this->descuento_ === "" || is_null($this->descuento_))  
      { 
          $this->descuento_ = 0;
          $this->sc_force_zero[] = 'descuento_';
      } 
      if ($this->tasaiva_ === "" || is_null($this->tasaiva_))  
      { 
          $this->tasaiva_ = 0;
          $this->sc_force_zero[] = 'tasaiva_';
      } 
      if ($this->tasadesc_ === "" || is_null($this->tasadesc_))  
      { 
          $this->tasadesc_ = 0;
          $this->sc_force_zero[] = 'tasadesc_';
      } 
      if ($this->devuelto_ === "" || is_null($this->devuelto_))  
      { 
          $this->devuelto_ = 0;
          $this->sc_force_zero[] = 'devuelto_';
      } 
      if ($this->colores_ === "" || is_null($this->colores_))  
      { 
          $this->colores_ = 0;
          $this->sc_force_zero[] = 'colores_';
      } 
      if ($this->tallas_ === "" || is_null($this->tallas_))  
      { 
          $this->tallas_ = 0;
          $this->sc_force_zero[] = 'tallas_';
      } 
      if ($this->sabor_ === "" || is_null($this->sabor_))  
      { 
          $this->sabor_ = 0;
          $this->sc_force_zero[] = 'sabor_';
      } 
      if ($this->porc_desc_ === "" || is_null($this->porc_desc_))  
      { 
          $this->porc_desc_ = 0;
          $this->sc_force_zero[] = 'porc_desc_';
      } 
      if ($this->num_ndevolucion_ === "" || is_null($this->num_ndevolucion_))  
      { 
          $this->num_ndevolucion_ = 0;
          $this->sc_force_zero[] = 'num_ndevolucion_';
      } 
      if ($this->id_nota_ === "" || is_null($this->id_nota_))  
      { 
          $this->id_nota_ = 0;
          $this->sc_force_zero[] = 'id_nota_';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          if ($this->vencimiento_ == "")  
          { 
              $this->vencimiento_ = "null"; 
              $NM_val_null[] = "vencimiento_";
          } 
          $this->lote__before_qstr = $this->lote_;
          $this->lote_ = substr($this->Db->qstr($this->lote_), 1, -1); 
          if ($this->lote_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->lote_ = "null"; 
              $NM_val_null[] = "lote_";
          } 
          $this->descr__before_qstr = $this->descr_;
          $this->descr_ = substr($this->Db->qstr($this->descr_), 1, -1); 
          if ($this->descr_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->descr_ = "null"; 
              $NM_val_null[] = "descr_";
          } 
          if ($this->fecha_fab_ == "")  
          { 
              $this->fecha_fab_ = "null"; 
              $NM_val_null[] = "fecha_fab_";
          } 
          $this->serial_codbarra__before_qstr = $this->serial_codbarra_;
          $this->serial_codbarra_ = substr($this->Db->qstr($this->serial_codbarra_), 1, -1); 
          if ($this->serial_codbarra_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->serial_codbarra_ = "null"; 
              $NM_val_null[] = "serial_codbarra_";
          } 
          $this->unidad_c__before_qstr = $this->unidad_c_;
          $this->unidad_c_ = substr($this->Db->qstr($this->unidad_c_), 1, -1); 
          if ($this->unidad_c_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->unidad_c_ = "null"; 
              $NM_val_null[] = "unidad_c_";
          } 
          $this->tipo_docu__before_qstr = $this->tipo_docu_;
          $this->tipo_docu_ = substr($this->Db->qstr($this->tipo_docu_), 1, -1); 
          if ($this->tipo_docu_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo_docu_ = "null"; 
              $NM_val_null[] = "tipo_docu_";
          } 
          $this->tipo_trans__before_qstr = $this->tipo_trans_;
          $this->tipo_trans_ = substr($this->Db->qstr($this->tipo_trans_), 1, -1); 
          if ($this->tipo_trans_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo_trans_ = "null"; 
              $NM_val_null[] = "tipo_trans_";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 detallecompra_new_nc_pack_ajax_response();
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
                  $SC_fields_update[] = "idfaccom = $this->idfaccom_, idpro = $this->idpro_, idbod = $this->idbod_, cantidad = $this->cantidad_, valorunit = $this->valorunit_, valorpar = $this->valorpar_, iva = $this->iva_, descuento = $this->descuento_, tasaiva = $this->tasaiva_, tasadesc = $this->tasadesc_, devuelto = $this->devuelto_, vencimiento = #$this->vencimiento_#, lote = '$this->lote_', serial_codbarra = '$this->serial_codbarra_', porc_desc = $this->porc_desc_, tipo_docu = '$this->tipo_docu_', tipo_trans = '$this->tipo_trans_', id_nota = $this->id_nota_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idfaccom = $this->idfaccom_, idpro = $this->idpro_, idbod = $this->idbod_, cantidad = $this->cantidad_, valorunit = $this->valorunit_, valorpar = $this->valorpar_, iva = $this->iva_, descuento = $this->descuento_, tasaiva = $this->tasaiva_, tasadesc = $this->tasadesc_, devuelto = $this->devuelto_, vencimiento = " . $this->Ini->date_delim . $this->vencimiento_ . $this->Ini->date_delim1 . ", lote = '$this->lote_', serial_codbarra = '$this->serial_codbarra_', porc_desc = $this->porc_desc_, tipo_docu = '$this->tipo_docu_', tipo_trans = '$this->tipo_trans_', id_nota = $this->id_nota_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idfaccom = $this->idfaccom_, idpro = $this->idpro_, idbod = $this->idbod_, cantidad = $this->cantidad_, valorunit = $this->valorunit_, valorpar = $this->valorpar_, iva = $this->iva_, descuento = $this->descuento_, tasaiva = $this->tasaiva_, tasadesc = $this->tasadesc_, devuelto = $this->devuelto_, vencimiento = " . $this->Ini->date_delim . $this->vencimiento_ . $this->Ini->date_delim1 . ", lote = '$this->lote_', serial_codbarra = '$this->serial_codbarra_', porc_desc = $this->porc_desc_, tipo_docu = '$this->tipo_docu_', tipo_trans = '$this->tipo_trans_', id_nota = $this->id_nota_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idfaccom = $this->idfaccom_, idpro = $this->idpro_, idbod = $this->idbod_, cantidad = $this->cantidad_, valorunit = $this->valorunit_, valorpar = $this->valorpar_, iva = $this->iva_, descuento = $this->descuento_, tasaiva = $this->tasaiva_, tasadesc = $this->tasadesc_, devuelto = $this->devuelto_, vencimiento = EXTEND('$this->vencimiento_', YEAR TO DAY), lote = '$this->lote_', serial_codbarra = '$this->serial_codbarra_', porc_desc = $this->porc_desc_, tipo_docu = '$this->tipo_docu_', tipo_trans = '$this->tipo_trans_', id_nota = $this->id_nota_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idfaccom = $this->idfaccom_, idpro = $this->idpro_, idbod = $this->idbod_, cantidad = $this->cantidad_, valorunit = $this->valorunit_, valorpar = $this->valorpar_, iva = $this->iva_, descuento = $this->descuento_, tasaiva = $this->tasaiva_, tasadesc = $this->tasadesc_, devuelto = $this->devuelto_, vencimiento = " . $this->Ini->date_delim . $this->vencimiento_ . $this->Ini->date_delim1 . ", lote = '$this->lote_', serial_codbarra = '$this->serial_codbarra_', porc_desc = $this->porc_desc_, tipo_docu = '$this->tipo_docu_', tipo_trans = '$this->tipo_trans_', id_nota = $this->id_nota_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idfaccom = $this->idfaccom_, idpro = $this->idpro_, idbod = $this->idbod_, cantidad = $this->cantidad_, valorunit = $this->valorunit_, valorpar = $this->valorpar_, iva = $this->iva_, descuento = $this->descuento_, tasaiva = $this->tasaiva_, tasadesc = $this->tasadesc_, devuelto = $this->devuelto_, vencimiento = " . $this->Ini->date_delim . $this->vencimiento_ . $this->Ini->date_delim1 . ", lote = '$this->lote_', serial_codbarra = '$this->serial_codbarra_', porc_desc = $this->porc_desc_, tipo_docu = '$this->tipo_docu_', tipo_trans = '$this->tipo_trans_', id_nota = $this->id_nota_"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idfaccom = $this->idfaccom_, idpro = $this->idpro_, idbod = $this->idbod_, cantidad = $this->cantidad_, valorunit = $this->valorunit_, valorpar = $this->valorpar_, iva = $this->iva_, descuento = $this->descuento_, tasaiva = $this->tasaiva_, tasadesc = $this->tasadesc_, devuelto = $this->devuelto_, vencimiento = " . $this->Ini->date_delim . $this->vencimiento_ . $this->Ini->date_delim1 . ", lote = '$this->lote_', serial_codbarra = '$this->serial_codbarra_', porc_desc = $this->porc_desc_, tipo_docu = '$this->tipo_docu_', tipo_trans = '$this->tipo_trans_', id_nota = $this->id_nota_"; 
              } 
              if (isset($NM_val_form['colores_']) && $NM_val_form['colores_'] != $this->nmgp_dados_select['colores_']) 
              { 
                  $SC_fields_update[] = "colores = $this->colores_"; 
              } 
              if (isset($NM_val_form['tallas_']) && $NM_val_form['tallas_'] != $this->nmgp_dados_select['tallas_']) 
              { 
                  $SC_fields_update[] = "tallas = $this->tallas_"; 
              } 
              if (isset($NM_val_form['sabor_']) && $NM_val_form['sabor_'] != $this->nmgp_dados_select['sabor_']) 
              { 
                  $SC_fields_update[] = "sabor = $this->sabor_"; 
              } 
              if (isset($NM_val_form['descr_']) && $NM_val_form['descr_'] != $this->nmgp_dados_select['descr_']) 
              { 
                  $SC_fields_update[] = "descr = '$this->descr_'"; 
              } 
              if (isset($NM_val_form['fecha_fab_']) && $NM_val_form['fecha_fab_'] != $this->nmgp_dados_select['fecha_fab_']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "fecha_fab = #$this->fecha_fab_#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "fecha_fab = EXTEND('" . $this->fecha_fab_ . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fecha_fab = " . $this->Ini->date_delim . $this->fecha_fab_ . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['unidad_c_']) && $NM_val_form['unidad_c_'] != $this->nmgp_dados_select['unidad_c_']) 
              { 
                  $SC_fields_update[] = "unidad_c = '$this->unidad_c_'"; 
              } 
              if (isset($NM_val_form['num_ndevolucion_']) && $NM_val_form['num_ndevolucion_'] != $this->nmgp_dados_select['num_ndevolucion_']) 
              { 
                  $SC_fields_update[] = "num_ndevolucion = $this->num_ndevolucion_"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE iddet = $this->iddet_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE iddet = $this->iddet_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE iddet = $this->iddet_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE iddet = $this->iddet_ ";  
              }  
              else  
              {
                  $comando .= " WHERE iddet = $this->iddet_ ";  
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
                                  detallecompra_new_nc_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->lote_ = $this->lote__before_qstr;
              $this->descr_ = $this->descr__before_qstr;
              $this->serial_codbarra_ = $this->serial_codbarra__before_qstr;
              $this->unidad_c_ = $this->unidad_c__before_qstr;
              $this->tipo_docu_ = $this->tipo_docu__before_qstr;
              $this->tipo_trans_ = $this->tipo_trans__before_qstr;
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }

              $this->sc_teve_alt = true; 
              if     (isset($NM_val_form) && isset($NM_val_form['iddet_'])) { $this->iddet_ = $NM_val_form['iddet_']; }
              elseif (isset($this->iddet_)) { $this->nm_limpa_alfa($this->iddet_); }
              if     (isset($NM_val_form) && isset($NM_val_form['idfaccom_'])) { $this->idfaccom_ = $NM_val_form['idfaccom_']; }
              elseif (isset($this->idfaccom_)) { $this->nm_limpa_alfa($this->idfaccom_); }
              if     (isset($NM_val_form) && isset($NM_val_form['idpro_'])) { $this->idpro_ = $NM_val_form['idpro_']; }
              elseif (isset($this->idpro_)) { $this->nm_limpa_alfa($this->idpro_); }
              if     (isset($NM_val_form) && isset($NM_val_form['idbod_'])) { $this->idbod_ = $NM_val_form['idbod_']; }
              elseif (isset($this->idbod_)) { $this->nm_limpa_alfa($this->idbod_); }
              if     (isset($NM_val_form) && isset($NM_val_form['cantidad_'])) { $this->cantidad_ = $NM_val_form['cantidad_']; }
              elseif (isset($this->cantidad_)) { $this->nm_limpa_alfa($this->cantidad_); }
              if     (isset($NM_val_form) && isset($NM_val_form['valorunit_'])) { $this->valorunit_ = $NM_val_form['valorunit_']; }
              elseif (isset($this->valorunit_)) { $this->nm_limpa_alfa($this->valorunit_); }
              if     (isset($NM_val_form) && isset($NM_val_form['valorpar_'])) { $this->valorpar_ = $NM_val_form['valorpar_']; }
              elseif (isset($this->valorpar_)) { $this->nm_limpa_alfa($this->valorpar_); }
              if     (isset($NM_val_form) && isset($NM_val_form['iva_'])) { $this->iva_ = $NM_val_form['iva_']; }
              elseif (isset($this->iva_)) { $this->nm_limpa_alfa($this->iva_); }
              if     (isset($NM_val_form) && isset($NM_val_form['descuento_'])) { $this->descuento_ = $NM_val_form['descuento_']; }
              elseif (isset($this->descuento_)) { $this->nm_limpa_alfa($this->descuento_); }
              if     (isset($NM_val_form) && isset($NM_val_form['tasaiva_'])) { $this->tasaiva_ = $NM_val_form['tasaiva_']; }
              elseif (isset($this->tasaiva_)) { $this->nm_limpa_alfa($this->tasaiva_); }
              if     (isset($NM_val_form) && isset($NM_val_form['tasadesc_'])) { $this->tasadesc_ = $NM_val_form['tasadesc_']; }
              elseif (isset($this->tasadesc_)) { $this->nm_limpa_alfa($this->tasadesc_); }
              if     (isset($NM_val_form) && isset($NM_val_form['devuelto_'])) { $this->devuelto_ = $NM_val_form['devuelto_']; }
              elseif (isset($this->devuelto_)) { $this->nm_limpa_alfa($this->devuelto_); }
              if     (isset($NM_val_form) && isset($NM_val_form['lote_'])) { $this->lote_ = $NM_val_form['lote_']; }
              elseif (isset($this->lote_)) { $this->nm_limpa_alfa($this->lote_); }
              if     (isset($NM_val_form) && isset($NM_val_form['serial_codbarra_'])) { $this->serial_codbarra_ = $NM_val_form['serial_codbarra_']; }
              elseif (isset($this->serial_codbarra_)) { $this->nm_limpa_alfa($this->serial_codbarra_); }
              if     (isset($NM_val_form) && isset($NM_val_form['porc_desc_'])) { $this->porc_desc_ = $NM_val_form['porc_desc_']; }
              elseif (isset($this->porc_desc_)) { $this->nm_limpa_alfa($this->porc_desc_); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo_docu_'])) { $this->tipo_docu_ = $NM_val_form['tipo_docu_']; }
              elseif (isset($this->tipo_docu_)) { $this->nm_limpa_alfa($this->tipo_docu_); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo_trans_'])) { $this->tipo_trans_ = $NM_val_form['tipo_trans_']; }
              elseif (isset($this->tipo_trans_)) { $this->nm_limpa_alfa($this->tipo_trans_); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_nota_'])) { $this->id_nota_ = $NM_val_form['id_nota_']; }
              elseif (isset($this->id_nota_)) { $this->nm_limpa_alfa($this->id_nota_); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('cod_barras_', 'idpro_', 'ver_', 'presentacion_', 'cantidad_', 'valorunit_', 'porc_desc_', 'descuento_', 'valorpar_', 'iva_', 'idbod_', 'tasaiva_', 'tasadesc_', 'devuelto_', 'vencimiento_', 'lote_', 'serial_codbarra_', 'iddet_', 'idfaccom_', 'tipo_docu_', 'tipo_trans_', 'id_nota_'), $aDoNotUpdate);
              $this->nmgp_refresh_fields = $aOldRefresh;

              if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
              {

                  $this->NM_ajax_info['readOnly']['cod_barras_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['idpro_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['ver_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['presentacion_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['cantidad_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['valorunit_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['porc_desc_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['descuento_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['valorpar_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['iva_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['idbod_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['tasaiva_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['tasadesc_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['devuelto_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['vencimiento_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['lote_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['serial_codbarra_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['iddet_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['idfaccom_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['tipo_docu_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['tipo_trans_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['id_nota_' . $this->nmgp_refresh_row] = 'on';


                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['decimal_db'] == ",") 
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
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (idfaccom, idpro, idbod, cantidad, valorunit, valorpar, iva, descuento, tasaiva, tasadesc, devuelto, colores, tallas, sabor, vencimiento, lote, descr, fecha_fab, serial_codbarra, porc_desc, unidad_c, num_ndevolucion, tipo_docu, tipo_trans, id_nota) VALUES ($this->idfaccom_, $this->idpro_, $this->idbod_, $this->cantidad_, $this->valorunit_, $this->valorpar_, $this->iva_, $this->descuento_, $this->tasaiva_, $this->tasadesc_, $this->devuelto_, $this->colores_, $this->tallas_, $this->sabor_, #$this->vencimiento_#, '$this->lote_', '$this->descr_', #$this->fecha_fab_#, '$this->serial_codbarra_', $this->porc_desc_, '$this->unidad_c_', $this->num_ndevolucion_, '$this->tipo_docu_', '$this->tipo_trans_', $this->id_nota_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idfaccom, idpro, idbod, cantidad, valorunit, valorpar, iva, descuento, tasaiva, tasadesc, devuelto, colores, tallas, sabor, vencimiento, lote, descr, fecha_fab, serial_codbarra, porc_desc, unidad_c, num_ndevolucion, tipo_docu, tipo_trans, id_nota) VALUES (" . $NM_seq_auto . "$this->idfaccom_, $this->idpro_, $this->idbod_, $this->cantidad_, $this->valorunit_, $this->valorpar_, $this->iva_, $this->descuento_, $this->tasaiva_, $this->tasadesc_, $this->devuelto_, $this->colores_, $this->tallas_, $this->sabor_, " . $this->Ini->date_delim . $this->vencimiento_ . $this->Ini->date_delim1 . ", '$this->lote_', '$this->descr_', " . $this->Ini->date_delim . $this->fecha_fab_ . $this->Ini->date_delim1 . ", '$this->serial_codbarra_', $this->porc_desc_, '$this->unidad_c_', $this->num_ndevolucion_, '$this->tipo_docu_', '$this->tipo_trans_', $this->id_nota_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idfaccom, idpro, idbod, cantidad, valorunit, valorpar, iva, descuento, tasaiva, tasadesc, devuelto, colores, tallas, sabor, vencimiento, lote, descr, fecha_fab, serial_codbarra, porc_desc, unidad_c, num_ndevolucion, tipo_docu, tipo_trans, id_nota) VALUES (" . $NM_seq_auto . "$this->idfaccom_, $this->idpro_, $this->idbod_, $this->cantidad_, $this->valorunit_, $this->valorpar_, $this->iva_, $this->descuento_, $this->tasaiva_, $this->tasadesc_, $this->devuelto_, $this->colores_, $this->tallas_, $this->sabor_, " . $this->Ini->date_delim . $this->vencimiento_ . $this->Ini->date_delim1 . ", '$this->lote_', '$this->descr_', " . $this->Ini->date_delim . $this->fecha_fab_ . $this->Ini->date_delim1 . ", '$this->serial_codbarra_', $this->porc_desc_, '$this->unidad_c_', $this->num_ndevolucion_, '$this->tipo_docu_', '$this->tipo_trans_', $this->id_nota_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idfaccom, idpro, idbod, cantidad, valorunit, valorpar, iva, descuento, tasaiva, tasadesc, devuelto, colores, tallas, sabor, vencimiento, lote, descr, fecha_fab, serial_codbarra, porc_desc, unidad_c, num_ndevolucion, tipo_docu, tipo_trans, id_nota) VALUES (" . $NM_seq_auto . "$this->idfaccom_, $this->idpro_, $this->idbod_, $this->cantidad_, $this->valorunit_, $this->valorpar_, $this->iva_, $this->descuento_, $this->tasaiva_, $this->tasadesc_, $this->devuelto_, $this->colores_, $this->tallas_, $this->sabor_, " . $this->Ini->date_delim . $this->vencimiento_ . $this->Ini->date_delim1 . ", '$this->lote_', '$this->descr_', " . $this->Ini->date_delim . $this->fecha_fab_ . $this->Ini->date_delim1 . ", '$this->serial_codbarra_', $this->porc_desc_, '$this->unidad_c_', $this->num_ndevolucion_, '$this->tipo_docu_', '$this->tipo_trans_', $this->id_nota_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idfaccom, idpro, idbod, cantidad, valorunit, valorpar, iva, descuento, tasaiva, tasadesc, devuelto, colores, tallas, sabor, vencimiento, lote, descr, fecha_fab, serial_codbarra, porc_desc, unidad_c, num_ndevolucion, tipo_docu, tipo_trans, id_nota) VALUES (" . $NM_seq_auto . "$this->idfaccom_, $this->idpro_, $this->idbod_, $this->cantidad_, $this->valorunit_, $this->valorpar_, $this->iva_, $this->descuento_, $this->tasaiva_, $this->tasadesc_, $this->devuelto_, $this->colores_, $this->tallas_, $this->sabor_, EXTEND('$this->vencimiento_', YEAR TO DAY), '$this->lote_', '$this->descr_', EXTEND('$this->fecha_fab_', YEAR TO DAY), '$this->serial_codbarra_', $this->porc_desc_, '$this->unidad_c_', $this->num_ndevolucion_, '$this->tipo_docu_', '$this->tipo_trans_', $this->id_nota_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idfaccom, idpro, idbod, cantidad, valorunit, valorpar, iva, descuento, tasaiva, tasadesc, devuelto, colores, tallas, sabor, vencimiento, lote, descr, fecha_fab, serial_codbarra, porc_desc, unidad_c, num_ndevolucion, tipo_docu, tipo_trans, id_nota) VALUES (" . $NM_seq_auto . "$this->idfaccom_, $this->idpro_, $this->idbod_, $this->cantidad_, $this->valorunit_, $this->valorpar_, $this->iva_, $this->descuento_, $this->tasaiva_, $this->tasadesc_, $this->devuelto_, $this->colores_, $this->tallas_, $this->sabor_, " . $this->Ini->date_delim . $this->vencimiento_ . $this->Ini->date_delim1 . ", '$this->lote_', '$this->descr_', " . $this->Ini->date_delim . $this->fecha_fab_ . $this->Ini->date_delim1 . ", '$this->serial_codbarra_', $this->porc_desc_, '$this->unidad_c_', $this->num_ndevolucion_, '$this->tipo_docu_', '$this->tipo_trans_', $this->id_nota_)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idfaccom, idpro, idbod, cantidad, valorunit, valorpar, iva, descuento, tasaiva, tasadesc, devuelto, colores, tallas, sabor, vencimiento, lote, descr, fecha_fab, serial_codbarra, porc_desc, unidad_c, num_ndevolucion, tipo_docu, tipo_trans, id_nota) VALUES (" . $NM_seq_auto . "$this->idfaccom_, $this->idpro_, $this->idbod_, $this->cantidad_, $this->valorunit_, $this->valorpar_, $this->iva_, $this->descuento_, $this->tasaiva_, $this->tasadesc_, $this->devuelto_, $this->colores_, $this->tallas_, $this->sabor_, " . $this->Ini->date_delim . $this->vencimiento_ . $this->Ini->date_delim1 . ", '$this->lote_', '$this->descr_', " . $this->Ini->date_delim . $this->fecha_fab_ . $this->Ini->date_delim1 . ", '$this->serial_codbarra_', $this->porc_desc_, '$this->unidad_c_', $this->num_ndevolucion_, '$this->tipo_docu_', '$this->tipo_trans_', $this->id_nota_)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idfaccom, idpro, idbod, cantidad, valorunit, valorpar, iva, descuento, tasaiva, tasadesc, devuelto, colores, tallas, sabor, vencimiento, lote, descr, fecha_fab, serial_codbarra, porc_desc, unidad_c, num_ndevolucion, tipo_docu, tipo_trans, id_nota) VALUES (" . $NM_seq_auto . "$this->idfaccom_, $this->idpro_, $this->idbod_, $this->cantidad_, $this->valorunit_, $this->valorpar_, $this->iva_, $this->descuento_, $this->tasaiva_, $this->tasadesc_, $this->devuelto_, $this->colores_, $this->tallas_, $this->sabor_, " . $this->Ini->date_delim . $this->vencimiento_ . $this->Ini->date_delim1 . ", '$this->lote_', '$this->descr_', " . $this->Ini->date_delim . $this->fecha_fab_ . $this->Ini->date_delim1 . ", '$this->serial_codbarra_', $this->porc_desc_, '$this->unidad_c_', $this->num_ndevolucion_, '$this->tipo_docu_', '$this->tipo_trans_', $this->id_nota_)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idfaccom, idpro, idbod, cantidad, valorunit, valorpar, iva, descuento, tasaiva, tasadesc, devuelto, colores, tallas, sabor, vencimiento, lote, descr, fecha_fab, serial_codbarra, porc_desc, unidad_c, num_ndevolucion, tipo_docu, tipo_trans, id_nota) VALUES (" . $NM_seq_auto . "$this->idfaccom_, $this->idpro_, $this->idbod_, $this->cantidad_, $this->valorunit_, $this->valorpar_, $this->iva_, $this->descuento_, $this->tasaiva_, $this->tasadesc_, $this->devuelto_, $this->colores_, $this->tallas_, $this->sabor_, " . $this->Ini->date_delim . $this->vencimiento_ . $this->Ini->date_delim1 . ", '$this->lote_', '$this->descr_', " . $this->Ini->date_delim . $this->fecha_fab_ . $this->Ini->date_delim1 . ", '$this->serial_codbarra_', $this->porc_desc_, '$this->unidad_c_', $this->num_ndevolucion_, '$this->tipo_docu_', '$this->tipo_trans_', $this->id_nota_)"; 
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
                              detallecompra_new_nc_pack_ajax_response();
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
                          detallecompra_new_nc_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->iddet_ =  $rsy->fields[0];
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
                  $this->iddet_ = $rsy->fields[0];
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
                  $this->iddet_ = $rsy->fields[0];
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
                  $this->iddet_ = $rsy->fields[0];
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
                  $this->iddet_ = $rsy->fields[0];
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
                  $this->iddet_ = $rsy->fields[0];
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
                  $this->iddet_ = $rsy->fields[0];
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
                  $this->iddet_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->lote_ = $this->lote__before_qstr;
              $this->descr_ = $this->descr__before_qstr;
              $this->serial_codbarra_ = $this->serial_codbarra__before_qstr;
              $this->unidad_c_ = $this->unidad_c__before_qstr;
              $this->tipo_docu_ = $this->tipo_docu__before_qstr;
              $this->tipo_trans_ = $this->tipo_trans__before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['db_changed'] = true;

              $this->sc_evento = "insert"; 
              $this->lote_ = $this->lote__before_qstr;
              $this->descr_ = $this->descr__before_qstr;
              $this->serial_codbarra_ = $this->serial_codbarra__before_qstr;
              $this->unidad_c_ = $this->unidad_c__before_qstr;
              $this->tipo_docu_ = $this->tipo_docu__before_qstr;
              $this->tipo_trans_ = $this->tipo_trans__before_qstr;
              $this->sc_teve_incl = true; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['idpro_'] = $this->idpro_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['cantidad_'] = $this->cantidad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['valorunit_'] = $this->valorunit_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['porc_desc_'] = $this->porc_desc_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['descuento_'] = $this->descuento_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['valorpar_'] = $this->valorpar_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['iva_'] = $this->iva_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['idbod_'] = $this->idbod_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['tasaiva_'] = $this->tasaiva_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['tasadesc_'] = $this->tasadesc_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['devuelto_'] = $this->devuelto_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['vencimiento_'] = $this->vencimiento_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['lote_'] = $this->lote_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['serial_codbarra_'] = $this->serial_codbarra_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['iddet_'] = $this->iddet_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['idfaccom_'] = $this->idfaccom_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['tipo_docu_'] = $this->tipo_docu_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['tipo_trans_'] = $this->tipo_trans_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert]['id_nota_'] = $this->id_nota_;
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
              if (isset($this->iddet_)) { $this->nm_limpa_alfa($this->iddet_); }
              if (isset($this->idfaccom_)) { $this->nm_limpa_alfa($this->idfaccom_); }
              if (isset($this->idpro_)) { $this->nm_limpa_alfa($this->idpro_); }
              if (isset($this->idbod_)) { $this->nm_limpa_alfa($this->idbod_); }
              if (isset($this->cantidad_)) { $this->nm_limpa_alfa($this->cantidad_); }
              if (isset($this->valorunit_)) { $this->nm_limpa_alfa($this->valorunit_); }
              if (isset($this->valorpar_)) { $this->nm_limpa_alfa($this->valorpar_); }
              if (isset($this->iva_)) { $this->nm_limpa_alfa($this->iva_); }
              if (isset($this->descuento_)) { $this->nm_limpa_alfa($this->descuento_); }
              if (isset($this->tasaiva_)) { $this->nm_limpa_alfa($this->tasaiva_); }
              if (isset($this->tasadesc_)) { $this->nm_limpa_alfa($this->tasadesc_); }
              if (isset($this->devuelto_)) { $this->nm_limpa_alfa($this->devuelto_); }
              if (isset($this->lote_)) { $this->nm_limpa_alfa($this->lote_); }
              if (isset($this->serial_codbarra_)) { $this->nm_limpa_alfa($this->serial_codbarra_); }
              if (isset($this->porc_desc_)) { $this->nm_limpa_alfa($this->porc_desc_); }
              if (isset($this->tipo_docu_)) { $this->nm_limpa_alfa($this->tipo_docu_); }
              if (isset($this->tipo_trans_)) { $this->nm_limpa_alfa($this->tipo_trans_); }
              if (isset($this->id_nota_)) { $this->nm_limpa_alfa($this->id_nota_); }
              if (isset($this->Embutida_form) && $this->Embutida_form)
              {
                  $this->nm_guardar_campos();
                  $this->nm_formatar_campos();

                  $this->NM_ajax_info['fldList']['cod_barras_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['cod_barras_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->cod_barras_)));
                  $this->NM_ajax_info['fldList']['cod_barras_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_cod_barras_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cod_barras_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cod_barras_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cod_barras_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cod_barras_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

              $aLookup = array();
              $aRecData['idpro_'] = $this->idpro_;
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idpro_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idpro_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idpro_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idpro_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idpro_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idpro_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idpro_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idpro_'] = array(); 
    }

   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_porc_desc_ = $this->porc_desc_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_iva_ = $this->iva_;
   $old_value_tasaiva_ = $this->tasaiva_;
   $old_value_tasadesc_ = $this->tasadesc_;
   $old_value_devuelto_ = $this->devuelto_;
   $old_value_vencimiento_ = $this->vencimiento_;
   $old_value_iddet_ = $this->iddet_;
   $old_value_idfaccom_ = $this->idfaccom_;
   $old_value_id_nota_ = $this->id_nota_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_porc_desc_ = $this->porc_desc_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_tasaiva_ = $this->tasaiva_;
   $unformatted_value_tasadesc_ = $this->tasadesc_;
   $unformatted_value_devuelto_ = $this->devuelto_;
   $unformatted_value_vencimiento_ = $this->vencimiento_;
   $unformatted_value_iddet_ = $this->iddet_;
   $unformatted_value_idfaccom_ = $this->idfaccom_;
   $unformatted_value_id_nota_ = $this->id_nota_;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro FROM productos WHERE idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idprod, concat(codigobar, \" - \",nompro) FROM productos WHERE idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idprod, codigobar&\" - \"&nompro FROM productos WHERE idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro FROM productos WHERE idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }
   else
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE idprod = " . $aRecData['idpro_'] . " ORDER BY codigobar, nompro";
   }

   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->porc_desc_ = $old_value_porc_desc_;
   $this->descuento_ = $old_value_descuento_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->iva_ = $old_value_iva_;
   $this->tasaiva_ = $old_value_tasaiva_;
   $this->tasadesc_ = $old_value_tasadesc_;
   $this->devuelto_ = $old_value_devuelto_;
   $this->vencimiento_ = $old_value_vencimiento_;
   $this->iddet_ = $old_value_iddet_;
   $this->idfaccom_ = $old_value_idfaccom_;
   $this->id_nota_ = $old_value_id_nota_;

   if ('' != $aRecData['idpro_'] && '' != $aRecData['idpro_'] && '' != $aRecData['idpro_'] && '' != $aRecData['idpro_'] && '' != $aRecData['idpro_'] && '' != $aRecData['idpro_'] && '' != $aRecData['idpro_'])
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
              $aLookup[] = array(detallecompra_new_nc_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', detallecompra_new_nc_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idpro_'][] = $rs->fields[0];
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
          $val_output = "";
          foreach ($aLookup as $iLookup => $aLookupDados)
          {
              $SV_cmp = $this->idpro_;
              $this->nm_clear_val("idpro_");
              if (isset($aLookupDados[$this->idpro_]))
              {
                  $val_output = $aLookupDados[$this->idpro_];
              }
              $this->idpro_ = $SV_cmp;
          }
          $this->NM_ajax_info['fldList']['idpro__autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          $tmpLabel_idpro_ = $val_output;

                  $this->NM_ajax_info['fldList']['idpro_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['idpro_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->idpro_)));
                  $this->NM_ajax_info['fldList']['idpro_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_idpro_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['idpro_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['idpro_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['idpro_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['idpro_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $tmpLabel_ver_ = $this->ver_;
                  $this->NM_ajax_info['fldList']['ver_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['ver_' . $this->nmgp_refresh_row]['valList'] = array($this->ver_);
                  $this->NM_ajax_info['fldList']['ver_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_ver_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['ver_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['ver_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['ver_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['ver_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $orig_presentacion_ = $this->presentacion_;
                  $presentacion_      = $this->presentacion_;
                  $this->presentacion_ = $presentacion_;
                  $this->lookup_presentacion_($conteudo);
                  $this->presentacion_ = $orig_presentacion_;
                  $this->NM_ajax_info['fldList']['presentacion_' . $this->nmgp_refresh_row]['lookupCons'] = detallecompra_new_nc_pack_protect_string($conteudo);
                  $tmpLabel_presentacion_ = $this->presentacion_;
                  $this->NM_ajax_info['fldList']['presentacion_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['presentacion_' . $this->nmgp_refresh_row]['valList'] = array($this->presentacion_);
                  $this->NM_ajax_info['fldList']['presentacion_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_presentacion_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['presentacion_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['presentacion_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['presentacion_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['presentacion_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['cantidad_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['cantidad_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->cantidad_)));
                  $this->NM_ajax_info['fldList']['cantidad_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_cantidad_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cantidad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cantidad_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cantidad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cantidad_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['valorunit_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['valorunit_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->valorunit_)));
                  $this->NM_ajax_info['fldList']['valorunit_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_valorunit_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['valorunit_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['valorunit_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['valorunit_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['valorunit_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['porc_desc_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['porc_desc_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->porc_desc_)));
                  $this->NM_ajax_info['fldList']['porc_desc_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_porc_desc_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['porc_desc_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['porc_desc_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['porc_desc_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['porc_desc_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['descuento_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['descuento_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->descuento_)));
                  $this->NM_ajax_info['fldList']['descuento_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_descuento_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['descuento_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['descuento_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['descuento_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['descuento_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $tmpLabel_valorpar_ = $this->valorpar_;
                  $this->NM_ajax_info['fldList']['valorpar_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['valorpar_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->valorpar_)));
                  $this->NM_ajax_info['fldList']['valorpar_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_valorpar_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['valorpar_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['valorpar_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['valorpar_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['valorpar_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $tmpLabel_iva_ = $this->iva_;
                  $this->NM_ajax_info['fldList']['iva_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['iva_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->iva_)));
                  $this->NM_ajax_info['fldList']['iva_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_iva_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['iva_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['iva_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['iva_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['iva_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idbod_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idbod_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idbod_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idbod_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_porc_desc_ = $this->porc_desc_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_iva_ = $this->iva_;
   $old_value_tasaiva_ = $this->tasaiva_;
   $old_value_tasadesc_ = $this->tasadesc_;
   $old_value_devuelto_ = $this->devuelto_;
   $old_value_vencimiento_ = $this->vencimiento_;
   $old_value_iddet_ = $this->iddet_;
   $old_value_idfaccom_ = $this->idfaccom_;
   $old_value_id_nota_ = $this->id_nota_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_porc_desc_ = $this->porc_desc_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_tasaiva_ = $this->tasaiva_;
   $unformatted_value_tasadesc_ = $this->tasadesc_;
   $unformatted_value_devuelto_ = $this->devuelto_;
   $unformatted_value_vencimiento_ = $this->vencimiento_;
   $unformatted_value_iddet_ = $this->iddet_;
   $unformatted_value_idfaccom_ = $this->idfaccom_;
   $unformatted_value_id_nota_ = $this->id_nota_;

   $nm_comando = "SELECT idbodega, bodega  FROM bodegas  ORDER BY bodega";

   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->porc_desc_ = $old_value_porc_desc_;
   $this->descuento_ = $old_value_descuento_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->iva_ = $old_value_iva_;
   $this->tasaiva_ = $old_value_tasaiva_;
   $this->tasadesc_ = $old_value_tasadesc_;
   $this->devuelto_ = $old_value_devuelto_;
   $this->vencimiento_ = $old_value_vencimiento_;
   $this->iddet_ = $old_value_iddet_;
   $this->idfaccom_ = $old_value_idfaccom_;
   $this->id_nota_ = $old_value_id_nota_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(detallecompra_new_nc_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', detallecompra_new_nc_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idbod_'][] = $rs->fields[0];
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
              if (key($aValData) == detallecompra_new_nc_pack_protect_string(NM_charset_to_utf8($this->idbod_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_idbod_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['idbod_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['idbod_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->idbod_)));
                  $this->NM_ajax_info['fldList']['idbod_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_idbod_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['idbod_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['idbod_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['idbod_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['idbod_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['tasaiva_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['tasaiva_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->tasaiva_)));
                  $this->NM_ajax_info['fldList']['tasaiva_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_tasaiva_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tasaiva_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tasaiva_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tasaiva_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tasaiva_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['tasadesc_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['tasadesc_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->tasadesc_)));
                  $this->NM_ajax_info['fldList']['tasadesc_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_tasadesc_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tasadesc_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tasadesc_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tasadesc_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tasadesc_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['devuelto_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['devuelto_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->devuelto_)));
                  $this->NM_ajax_info['fldList']['devuelto_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_devuelto_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['devuelto_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['devuelto_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['devuelto_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['devuelto_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['vencimiento_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['vencimiento_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->vencimiento_)));
                  $this->NM_ajax_info['fldList']['vencimiento_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_vencimiento_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['vencimiento_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['vencimiento_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['vencimiento_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['vencimiento_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['lote_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['lote_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->lote_)));
                  $this->NM_ajax_info['fldList']['lote_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_lote_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['lote_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['lote_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['lote_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['lote_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['serial_codbarra_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['serial_codbarra_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->serial_codbarra_)));
                  $this->NM_ajax_info['fldList']['serial_codbarra_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_serial_codbarra_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['serial_codbarra_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['serial_codbarra_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['serial_codbarra_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['serial_codbarra_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $tmpLabel_iddet_ = $this->iddet_;
                  $this->NM_ajax_info['fldList']['iddet_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['iddet_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->iddet_)));
                  $this->NM_ajax_info['fldList']['iddet_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_iddet_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['iddet_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['iddet_' . $this->nmgp_refresh_row] = "on";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['iddet_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['iddet_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['idfaccom_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['idfaccom_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->idfaccom_)));
                  $this->NM_ajax_info['fldList']['idfaccom_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_idfaccom_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['idfaccom_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['idfaccom_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['idfaccom_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['idfaccom_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['tipo_docu_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['tipo_docu_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->tipo_docu_)));
                  $this->NM_ajax_info['fldList']['tipo_docu_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_tipo_docu_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tipo_docu_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tipo_docu_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tipo_docu_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tipo_docu_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['tipo_trans_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['tipo_trans_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->tipo_trans_)));
                  $this->NM_ajax_info['fldList']['tipo_trans_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_tipo_trans_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tipo_trans_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tipo_trans_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tipo_trans_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tipo_trans_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['id_nota_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['id_nota_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->id_nota_)));
                  $this->NM_ajax_info['fldList']['id_nota_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_id_nota_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_nota_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_nota_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_nota_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_nota_' . $this->nmgp_refresh_row] = "on";
                      }
                  }


                  $this->nm_tira_formatacao();
                  $this->nm_converte_datas();

                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['sc_redir_insert'] != "S"))
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->iddet_ = substr($this->Db->qstr($this->iddet_), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ "); 
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
                          detallecompra_new_nc_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['db_changed'] = true;

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
    if ("insert" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['decimal_db'] == ",")
        {
            $this->nm_troca_decimal(",", ".");
        }
        $_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cantidad_ = $this->cantidad_;
    $original_iddet_ = $this->iddet_;
    $original_idfaccom_ = $this->idfaccom_;
    $original_idpro_ = $this->idpro_;
    $original_lote_ = $this->lote_;
    $original_serial_codbarra_ = $this->serial_codbarra_;
    $original_valorpar_ = $this->valorpar_;
    $original_valorunit_ = $this->valorunit_;
    $original_vencimiento_ = $this->vencimiento_;
}
if (!isset($this->sc_temp_vS_3)) {$this->sc_temp_vS_3 = (isset($_SESSION['vS_3'])) ? $_SESSION['vS_3'] : "";}
if (!isset($this->sc_temp_vS_2)) {$this->sc_temp_vS_2 = (isset($_SESSION['vS_2'])) ? $_SESSION['vS_2'] : "";}
if (!isset($this->sc_temp_vS_1)) {$this->sc_temp_vS_1 = (isset($_SESSION['vS_1'])) ? $_SESSION['vS_1'] : "";}
if (!isset($this->sc_temp_par_idfaccom)) {$this->sc_temp_par_idfaccom = (isset($_SESSION['par_idfaccom'])) ? $_SESSION['par_idfaccom'] : "";}
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
  $this->update_master();

 
      $nm_select = "select numfacom from facturacom where idfaccom='".$this->idfaccom_ ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDatosFactura = array();
      $this->vdatosfactura = array();
     if ($this->idfaccom_ != "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vDatosFactura[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vdatosfactura[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDatosFactura = false;
          $this->vDatosFactura_erro = $this->Db->ErrorMsg();
          $this->vdatosfactura = false;
          $this->vdatosfactura_erro = $this->Db->ErrorMsg();
      } 
     } 
;

if(isset($this->vdatosfactura[0][0]))
{
	$vnumfacom = $this->vdatosfactura[0][0];
	
	 
      $nm_select = "select codigobar, nompro from productos where idprod='".$this->idpro_ ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vProducto = array();
      $this->vproducto = array();
     if ($this->idpro_ != "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vProducto[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vproducto[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vProducto = false;
          $this->vProducto_erro = $this->Db->ErrorMsg();
          $this->vproducto = false;
          $this->vproducto_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	
	if(isset($this->vproducto[0][0]))
	{
		$vprod = $this->vproducto[0][0].' - '.$this->vproducto[0][1];
		
		
     $nm_select ="insert into log set usuario='".$this->sc_temp_gidtercero."',accion='AGREGAR', observaciones='EL USUARIO AGREGÓ EL PRODUCTO: ".$vprod.", CANTIDAD: $this->cantidad_ , COSTO/U: ".number_format($this->valorunit_ ).", TOTAL LINEA: ".number_format($this->valorpar_ )." A LA DEVOLUCION No: ".$vnumfacom.".' "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                detallecompra_new_nc_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	}	
}


$last_id=$this->iddet_ ;

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
$this->ds =substr($this->ds , 8);

if($this->idpro_ >0)
	{
	 
      $nm_select = "select fecha_vencimiento, lote, serial_codbarras, codigobar from productos where idprod=$this->idpro_ "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
     if ($this->idpro_ != "")
     { 
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
     } 
;
	if($this->dt[0][0]=='NO')
		{
		$Vfechavenc='';
		$this->sc_temp_vS_1=0;
		}
	else
		{
		$this->sc_temp_vS_1=1;
		$Vfechavenc="";
		if($this->vencimiento_ !="" and !empty($this->vencimiento_ ))
			{
			$Vfechavenc="'".$this->vencimiento_ ."'";
			}
		}
		
	if($this->dt[0][1]=='NO')
		{
		$this->sc_temp_vS_2=0;
		$this->lote_ ='';
		}
	else
		{
		$this->sc_temp_vS_2=1;
		}
	
	if ($this->dt[0][2]=='NO')
		{
		$this->sc_temp_vS_3=0;
		$this->serial_codbarra_ ='';
		}
	else
		{
		$this->sc_temp_vS_3=1;
		}
	}
if (isset($this->sc_temp_gidtercero)) { $_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
if (isset($this->sc_temp_par_idfaccom)) { $_SESSION['par_idfaccom'] = $this->sc_temp_par_idfaccom;}
if (isset($this->sc_temp_vS_1)) { $_SESSION['vS_1'] = $this->sc_temp_vS_1;}
if (isset($this->sc_temp_vS_2)) { $_SESSION['vS_2'] = $this->sc_temp_vS_2;}
if (isset($this->sc_temp_vS_3)) { $_SESSION['vS_3'] = $this->sc_temp_vS_3;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cantidad_ != $this->cantidad_ || (isset($bFlagRead_cantidad_) && $bFlagRead_cantidad_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['cantidad_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['cantidad_' . $this->nmgp_refresh_row]['valList'] = array($this->cantidad_);
        $this->NM_ajax_changed['cantidad_'] = true;
    }
    if (($original_iddet_ != $this->iddet_ || (isset($bFlagRead_iddet_) && $bFlagRead_iddet_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['iddet_' . $this->nmgp_refresh_row]['type']    = 'label';
        $this->NM_ajax_info['fldList']['iddet_' . $this->nmgp_refresh_row]['valList'] = array($this->iddet_);
        $this->NM_ajax_changed['iddet_'] = true;
    }
    if (($original_idfaccom_ != $this->idfaccom_ || (isset($bFlagRead_idfaccom_) && $bFlagRead_idfaccom_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['idfaccom_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['idfaccom_' . $this->nmgp_refresh_row]['valList'] = array($this->idfaccom_);
        $this->NM_ajax_changed['idfaccom_'] = true;
    }
    if (($original_idpro_ != $this->idpro_ || (isset($bFlagRead_idpro_) && $bFlagRead_idpro_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['idpro_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['idpro_' . $this->nmgp_refresh_row]['valList'] = array($this->idpro_);
        $this->NM_ajax_changed['idpro_'] = true;
    }
    if (($original_lote_ != $this->lote_ || (isset($bFlagRead_lote_) && $bFlagRead_lote_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['lote_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['lote_' . $this->nmgp_refresh_row]['valList'] = array($this->lote_);
        $this->NM_ajax_changed['lote_'] = true;
    }
    if (($original_serial_codbarra_ != $this->serial_codbarra_ || (isset($bFlagRead_serial_codbarra_) && $bFlagRead_serial_codbarra_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['serial_codbarra_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['serial_codbarra_' . $this->nmgp_refresh_row]['valList'] = array($this->serial_codbarra_);
        $this->NM_ajax_changed['serial_codbarra_'] = true;
    }
    if (($original_valorpar_ != $this->valorpar_ || (isset($bFlagRead_valorpar_) && $bFlagRead_valorpar_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['valorpar_' . $this->nmgp_refresh_row]['type']    = 'label';
        $this->NM_ajax_info['fldList']['valorpar_' . $this->nmgp_refresh_row]['valList'] = array($this->valorpar_);
        $this->NM_ajax_changed['valorpar_'] = true;
    }
    if (($original_valorunit_ != $this->valorunit_ || (isset($bFlagRead_valorunit_) && $bFlagRead_valorunit_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['valorunit_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['valorunit_' . $this->nmgp_refresh_row]['valList'] = array($this->valorunit_);
        $this->NM_ajax_changed['valorunit_'] = true;
    }
    if (($original_vencimiento_ != $this->vencimiento_ || (isset($bFlagRead_vencimiento_) && $bFlagRead_vencimiento_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['vencimiento_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['vencimiento_' . $this->nmgp_refresh_row]['valList'] = array($this->vencimiento_);
        $this->NM_ajax_changed['vencimiento_'] = true;
    }
}
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
  $this->update_master();
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off'; 
    }
    if ("delete" == $this->sc_evento && $this->nmgp_opcao != "nada") {
      $_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
  $this->update_master();
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          return;
      }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['decimal_db'] == ",")
   {
       $this->nm_troca_decimal(".", ",");
   }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['parms'] = "iddet_?#?$this->iddet_?@?"; 
      }
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->iddet_ = null === $this->iddet_ ? null : substr($this->Db->qstr($this->iddet_), 1, -1); 
      } 
   }
//---------- 
   function nm_select_banco() 
   { 
      global $nm_form_submit, $sc_seq_vert, $sc_check_incl, $teste_validade, $sc_where;
 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['rows']))
      {
          $this->sc_max_reg = $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['rows'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['rows_ins']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['rows_ins']))
      {
          $this->sc_max_reg_incl = $_SESSION['scriptcase']['sc_apl_conf']['detallecompra_new_nc']['rows_ins'];
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_qtd_reg']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_qtd_reg'])
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_liga_qtd_reg'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['sc_max_reg']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['sc_max_reg'] > 0 || strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['sc_max_reg']) == "all"))
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['sc_max_reg'];
      } 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
      $this->form_vert_detallecompra_new_nc = array();
      if ($this->nmgp_opcao != "novo") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['parms'] = ""; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($this->sc_teve_excl)
      {
          $this->nmgp_opcao = "avanca";
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] -= $this->sc_max_reg;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] = 0;
      }
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_filter'] . ")";
          }
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
          $sc_where = (isset($sc_where) && '' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (((isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao) || (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)) && !$this->has_where_params && 'novo' != $this->nmgp_opcao)
      {
          $aNewWhereCond = array();
          if (null != $this->iddet_)
          {
              $aNewWhereCond[] = "iddet = " . $this->iddet_;
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
          if ($this->app_is_initializing || $this->sc_teve_excl || $this->sc_teve_incl || (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['total']))
          {
              $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where;
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
              $rt = $this->Db->Execute($nmgp_select);
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit;
              }
              $qt_geral_reg_detallecompra_new_nc = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['total'] = $qt_geral_reg_detallecompra_new_nc;
              $rt->Close();
          }
      if ((isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['total']) || $this->sc_teve_excl || $this->sc_teve_incl)
      { 
          if (!$this->sc_teve_excl && !$this->sc_teve_incl) 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] = 0; 
          } 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->iddet_))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "iddet < $this->iddet_ "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "iddet < $this->iddet_ "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "iddet < $this->iddet_ "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "iddet < $this->iddet_ "; 
              }
              else  
              {
                  $Key_Where = "iddet < $this->iddet_ "; 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_detallecompra_new_nc = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['total'];
      } 
      if ($this->nmgp_opcao == "inicio" || $this->nmgp_opcao == "ordem") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_detallecompra_new_nc) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] += $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] > $qt_geral_reg_detallecompra_new_nc)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] = $qt_geral_reg_detallecompra_new_nc - $this->sc_max_reg; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] = 0; 
              }
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] -= $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] = ($qt_geral_reg_detallecompra_new_nc + 1) - $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] = 0; 
          }
      } 
      }
      $Cmps_ord_def = array();
      $sc_order_by  = "";
      $sc_order_by = "iddet";
      $sc_order_by = str_replace("order by ", "", $sc_order_by);
      $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
      if (!empty($sc_order_by))
      {
          $sc_order_by = " order by $sc_order_by "; 
      }
      if ($this->nmgp_opcao == "ordem" && in_array($this->nmgp_ordem, $Cmps_ord_def)) 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['ordem_cmp'] != $this->nmgp_ordem)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['ordem_cmp'] = $this->nmgp_ordem; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['ordem_ord'] = ' asc'; 
          }
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['ordem_ord'] == ' asc')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['ordem_ord'] = ' desc'; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['ordem_ord'] = ' asc'; 
          }
      } 
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['ordem_cmp'])) 
      { 
          $sc_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['ordem_cmp'] . $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['ordem_ord']; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT iddet, idfaccom, idpro, idbod, cantidad, valorunit, valorpar, iva, descuento, tasaiva, tasadesc, devuelto, colores, tallas, sabor, str_replace (convert(char(10),vencimiento,102), '.', '-') + ' ' + convert(char(8),vencimiento,20), lote, descr, str_replace (convert(char(10),fecha_fab,102), '.', '-') + ' ' + convert(char(8),fecha_fab,20), serial_codbarra, porc_desc, unidad_c, num_ndevolucion, tipo_docu, tipo_trans, id_nota from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT iddet, idfaccom, idpro, idbod, cantidad, valorunit, valorpar, iva, descuento, tasaiva, tasadesc, devuelto, colores, tallas, sabor, convert(char(23),vencimiento,121), lote, descr, convert(char(23),fecha_fab,121), serial_codbarra, porc_desc, unidad_c, num_ndevolucion, tipo_docu, tipo_trans, id_nota from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT iddet, idfaccom, idpro, idbod, cantidad, valorunit, valorpar, iva, descuento, tasaiva, tasadesc, devuelto, colores, tallas, sabor, vencimiento, lote, descr, fecha_fab, serial_codbarra, porc_desc, unidad_c, num_ndevolucion, tipo_docu, tipo_trans, id_nota from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT iddet, idfaccom, idpro, idbod, cantidad, valorunit, valorpar, iva, descuento, tasaiva, tasadesc, devuelto, colores, tallas, sabor, EXTEND(vencimiento, YEAR TO DAY), lote, descr, EXTEND(fecha_fab, YEAR TO DAY), serial_codbarra, porc_desc, unidad_c, num_ndevolucion, tipo_docu, tipo_trans, id_nota from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      else 
      { 
          $nmgp_select = "SELECT iddet, idfaccom, idpro, idbod, cantidad, valorunit, valorpar, iva, descuento, tasaiva, tasadesc, devuelto, colores, tallas, sabor, vencimiento, lote, descr, fecha_fab, serial_codbarra, porc_desc, unidad_c, num_ndevolucion, tipo_docu, tipo_trans, id_nota from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['run_iframe'] == "R")
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          else 
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start']) ; 
              } 
              else  
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
                  $rs = $this->Db->Execute($nmgp_select) ; 
                  if (!$rs === false && !$rs->EOF) 
                  { 
                      $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start']) ;  
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
          if ($rs->EOF) 
          { 
              $this->nm_flag_saida_novo = "S"; 
              $this->nmgp_opcao = "novo"; 
              $this->sc_evento  = "novo"; 
              if ($this->aba_iframe)
              {
                  $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs->EOF && $this->nmgp_botoes['new'] != "on")
          {
              $this->nmgp_form_empty = true;
          }
          if ($rs->EOF)
          {
              $sc_seq_vert = 0; 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_filter']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['empty_filter'] = true;
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
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['run_iframe'] == "R")
              { 
                  $this->sc_max_reg++;
              } 
              }
              $this->iddet_ = $rs->fields[0] ; 
              $this->nmgp_dados_select['iddet_'] = $this->iddet_;
              $this->idfaccom_ = $rs->fields[1] ; 
              $this->nmgp_dados_select['idfaccom_'] = $this->idfaccom_;
              $this->idpro_ = $rs->fields[2] ; 
              $this->nmgp_dados_select['idpro_'] = $this->idpro_;
              $this->idbod_ = $rs->fields[3] ; 
              $this->nmgp_dados_select['idbod_'] = $this->idbod_;
              $this->cantidad_ = $rs->fields[4] ; 
              $this->nmgp_dados_select['cantidad_'] = $this->cantidad_;
              $this->valorunit_ = $rs->fields[5] ; 
              $this->nmgp_dados_select['valorunit_'] = $this->valorunit_;
              $this->valorpar_ = $rs->fields[6] ; 
              $this->nmgp_dados_select['valorpar_'] = $this->valorpar_;
              $this->iva_ = $rs->fields[7] ; 
              $this->nmgp_dados_select['iva_'] = $this->iva_;
              $this->descuento_ = $rs->fields[8] ; 
              $this->nmgp_dados_select['descuento_'] = $this->descuento_;
              $this->tasaiva_ = $rs->fields[9] ; 
              $this->nmgp_dados_select['tasaiva_'] = $this->tasaiva_;
              $this->tasadesc_ = $rs->fields[10] ; 
              $this->nmgp_dados_select['tasadesc_'] = $this->tasadesc_;
              $this->devuelto_ = $rs->fields[11] ; 
              $this->nmgp_dados_select['devuelto_'] = $this->devuelto_;
              $this->colores_ = $rs->fields[12] ; 
              $this->nmgp_dados_select['colores_'] = $this->colores_;
              $this->tallas_ = $rs->fields[13] ; 
              $this->nmgp_dados_select['tallas_'] = $this->tallas_;
              $this->sabor_ = $rs->fields[14] ; 
              $this->nmgp_dados_select['sabor_'] = $this->sabor_;
              $this->vencimiento_ = $rs->fields[15] ; 
              $this->nmgp_dados_select['vencimiento_'] = $this->vencimiento_;
              $this->lote_ = $rs->fields[16] ; 
              $this->nmgp_dados_select['lote_'] = $this->lote_;
              $this->descr_ = $rs->fields[17] ; 
              $this->nmgp_dados_select['descr_'] = $this->descr_;
              $this->fecha_fab_ = $rs->fields[18] ; 
              $this->nmgp_dados_select['fecha_fab_'] = $this->fecha_fab_;
              $this->serial_codbarra_ = $rs->fields[19] ; 
              $this->nmgp_dados_select['serial_codbarra_'] = $this->serial_codbarra_;
              $this->porc_desc_ = $rs->fields[20] ; 
              $this->nmgp_dados_select['porc_desc_'] = $this->porc_desc_;
              $this->unidad_c_ = $rs->fields[21] ; 
              $this->nmgp_dados_select['unidad_c_'] = $this->unidad_c_;
              $this->num_ndevolucion_ = $rs->fields[22] ; 
              $this->nmgp_dados_select['num_ndevolucion_'] = $this->num_ndevolucion_;
              $this->tipo_docu_ = $rs->fields[23] ; 
              $this->nmgp_dados_select['tipo_docu_'] = $this->tipo_docu_;
              $this->tipo_trans_ = $rs->fields[24] ; 
              $this->nmgp_dados_select['tipo_trans_'] = $this->tipo_trans_;
              $this->id_nota_ = $rs->fields[25] ; 
              $this->nmgp_dados_select['id_nota_'] = $this->id_nota_;
              $this->cod_barras_ = isset($GLOBALS['cod_barras_' . $sc_seq_vert]) ? $GLOBALS['cod_barras_' . $sc_seq_vert] : '';
              $this->presentacion_ = isset($GLOBALS['presentacion_' . $sc_seq_vert]) ? $GLOBALS['presentacion_' . $sc_seq_vert] : '';
              $this->ver_ = isset($GLOBALS['ver_' . $sc_seq_vert]) ? $GLOBALS['ver_' . $sc_seq_vert] : '';
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->iddet_ = (string)$this->iddet_; 
              $this->idfaccom_ = (string)$this->idfaccom_; 
              $this->idpro_ = (string)$this->idpro_; 
              $this->idbod_ = (string)$this->idbod_; 
              $this->cantidad_ = (string)$this->cantidad_; 
              $this->valorunit_ = (string)$this->valorunit_; 
              $this->valorpar_ = (string)$this->valorpar_; 
              $this->iva_ = (string)$this->iva_; 
              $this->descuento_ = (string)$this->descuento_; 
              $this->tasaiva_ = (string)$this->tasaiva_; 
              $this->tasadesc_ = (string)$this->tasadesc_; 
              $this->devuelto_ = (string)$this->devuelto_; 
              $this->colores_ = (string)$this->colores_; 
              $this->tallas_ = (string)$this->tallas_; 
              $this->sabor_ = (string)$this->sabor_; 
              $this->porc_desc_ = (string)$this->porc_desc_; 
              $this->num_ndevolucion_ = (string)$this->num_ndevolucion_; 
              $this->id_nota_ = (string)$this->id_nota_; 
              if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['parms'])) 
              { 
                  $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['parms'] = "iddet_?#?$this->iddet_?@?";
              } 
              $this->nm_proc_onload_record($sc_seq_vert);
              $this->storeRecordState($sc_seq_vert);
//
//-- 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dados_select'][$sc_seq_vert] = $this->nmgp_dados_select;
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['cod_barras_'] =  $this->cod_barras_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['idpro_'] =  $this->idpro_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['ver_'] =  $this->ver_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['presentacion_'] =  $this->presentacion_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['cantidad_'] =  $this->cantidad_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['valorunit_'] =  $this->valorunit_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['porc_desc_'] =  $this->porc_desc_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['descuento_'] =  $this->descuento_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['valorpar_'] =  $this->valorpar_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['iva_'] =  $this->iva_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['idbod_'] =  $this->idbod_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['tasaiva_'] =  $this->tasaiva_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['tasadesc_'] =  $this->tasadesc_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['devuelto_'] =  $this->devuelto_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['vencimiento_'] =  $this->vencimiento_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['lote_'] =  $this->lote_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['serial_codbarra_'] =  $this->serial_codbarra_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['iddet_'] =  $this->iddet_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['idfaccom_'] =  $this->idfaccom_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['tipo_docu_'] =  $this->tipo_docu_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['tipo_trans_'] =  $this->tipo_trans_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['id_nota_'] =  $this->id_nota_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['colores_'] =  $this->colores_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['tallas_'] =  $this->tallas_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['sabor_'] =  $this->sabor_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['descr_'] =  $this->descr_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['fecha_fab_'] =  $this->fecha_fab_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['unidad_c_'] =  $this->unidad_c_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['num_ndevolucion_'] =  $this->num_ndevolucion_; 
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
          ksort ($this->form_vert_detallecompra_new_nc); 
          $rs->Close(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_qtd'] = $sc_seq_vert + $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] - 1;
          if ('total' == $this->form_paginacao)
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $this->sc_max_reg; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $this->sc_max_reg; 
          }
          else
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['total'] + 1; 
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
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] < (($qt_geral_reg_detallecompra_new_nc + 1) - $this->sc_max_reg);
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['opcao'] = '';
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
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['embutida_multi']) 
          { 
          } 
          elseif ($this->Embutida_form) 
          { 
              $this->sc_max_reg_incl = 0; 
          } 
          while ($sc_seq_vert <= $this->sc_max_reg_incl) 
          { 
              $this->iddet_ = "";  
              $this->idfaccom_ = "";  
              $this->idpro_ = "";  
              $this->idbod_ = "";  
              $this->cantidad_ = "";  
              $this->valorunit_ = "";  
              $this->valorpar_ = "";  
              $this->iva_ = "";  
              $this->descuento_ = "0.00";  
              $this->tasaiva_ = "";  
              $this->tasadesc_ = "";  
              $this->devuelto_ = "";  
              $this->vencimiento_ = "";  
              $this->lote_ = "";  
              $this->serial_codbarra_ = "";  
              $this->porc_desc_ = "";  
              $this->tipo_docu_ = "";  
              $this->tipo_trans_ = "";  
              $this->id_nota_ = "";  
              $this->cod_barras_ = "";  
              $this->presentacion_ = "";  
              $this->ver_ = "";  
              $this->nm_proc_onload_record($sc_seq_vert);
              if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['foreign_key']))
              {
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['foreign_key'] as $sFKName => $sFKValue)
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
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['cod_barras_'] =  $this->cod_barras_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['idpro_'] =  $this->idpro_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['ver_'] =  $this->ver_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['presentacion_'] =  $this->presentacion_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['cantidad_'] =  $this->cantidad_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['valorunit_'] =  $this->valorunit_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['porc_desc_'] =  $this->porc_desc_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['descuento_'] =  $this->descuento_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['valorpar_'] =  $this->valorpar_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['iva_'] =  $this->iva_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['idbod_'] =  $this->idbod_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['tasaiva_'] =  $this->tasaiva_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['tasadesc_'] =  $this->tasadesc_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['devuelto_'] =  $this->devuelto_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['vencimiento_'] =  $this->vencimiento_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['lote_'] =  $this->lote_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['serial_codbarra_'] =  $this->serial_codbarra_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['iddet_'] =  $this->iddet_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['idfaccom_'] =  $this->idfaccom_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['tipo_docu_'] =  $this->tipo_docu_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['tipo_trans_'] =  $this->tipo_trans_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['id_nota_'] =  $this->id_nota_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['colores_'] =  $this->colores_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['tallas_'] =  $this->tallas_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['sabor_'] =  $this->sabor_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['descr_'] =  $this->descr_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['fecha_fab_'] =  $this->fecha_fab_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['unidad_c_'] =  $this->unidad_c_; 
             $this->form_vert_detallecompra_new_nc[$sc_seq_vert]['num_ndevolucion_'] =  $this->num_ndevolucion_; 
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
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['reg_start'] + $this->sc_max_reg;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function actualiza_stock()
{
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
if (!isset($this->sc_temp_valorpar)) {$this->sc_temp_valorpar = (isset($_SESSION['valorpar'])) ? $_SESSION['valorpar'] : "";}
  
$proid=$this->idpro_ ;
$cant=$this->cantidad_ ;
$cost=$this->valorunit_ ;
$this->sc_temp_valorpar=round(($this->cantidad_ *$this->valorunit_ ), 2);
 
      $nm_select = "SELECT cantidad FROM inventario WHERE idpro=$proid"; 
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
                detallecompra_new_nc_pack_ajax_response();
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
                detallecompra_new_nc_pack_ajax_response();
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
                detallecompra_new_nc_pack_ajax_response();
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
                detallecompra_new_nc_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	}
if (isset($this->sc_temp_valorpar)) { $_SESSION['valorpar'] = $this->sc_temp_valorpar;}
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off';
}
function actualiza_stock_edita()
{
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
if (!isset($this->sc_temp_edit_cantidad)) {$this->sc_temp_edit_cantidad = (isset($_SESSION['edit_cantidad'])) ? $_SESSION['edit_cantidad'] : "";}
  
$proid=$this->idpro_ ;
$cost=$this->valorunit_ ;
if($this->sc_temp_edit_cantidad>$this->cantidad_ )
{
	$cant=$this->sc_temp_edit_cantidad-$this->cantidad_ ;
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
                detallecompra_new_nc_pack_ajax_response();
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
                detallecompra_new_nc_pack_ajax_response();
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
                detallecompra_new_nc_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			goto nosuma;
		}
		else { 
				$cant=$this->cantidad_ -$this->sc_temp_edit_cantidad;
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
                detallecompra_new_nc_pack_ajax_response();
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
                detallecompra_new_nc_pack_ajax_response();
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
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off';
}
function actualiza_stock_elimina()
{
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
  
$proid=$this->idpro_ ;
$cant=$this->cantidad_ ;
$sql_costo="select costo from inventario where idpro=$this->idpro_  and detalle like 'Compra' order by idinv desc limit 1,1";

 
      $nm_select = $sql_costo; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->da_costo = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->da_costo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->da_costo = false;
          $this->da_costo_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->da_costo[0][0]))
	{
	$cost=$this->da_costo[0][0];
	}
else
	{
	$cost=$this->valorunit_ ;
	}

 
      $nm_select = "SELECT stockmen FROM productos WHERE idprod=$proid"; 
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
                detallecompra_new_nc_pack_ajax_response();
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
                detallecompra_new_nc_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	}
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off';
}
function calcula_valor()
{
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
if (!isset($this->sc_temp_regimen_emp)) {$this->sc_temp_regimen_emp = (isset($_SESSION['regimen_emp'])) ? $_SESSION['regimen_emp'] : "";}
  
$this->valorpar_ =round(($this->cantidad_ *($this->valorunit_ -$this->descuento_ )),2);
if($this->sc_temp_regimen_emp==1)
	{
	$viva=$this->tasaiva_ ;
	$viva=$viva/100;
	$b=$this->valorpar_ *$viva; $b=round($b, 2);
	$this->iva_ =$b;
	}


if (isset($this->sc_temp_regimen_emp)) { $_SESSION['regimen_emp'] = $this->sc_temp_regimen_emp;}
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off';
}
function cantidad__onChange()
{
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
  
$original_idpro_ = $this->idpro_;
$original_valorunit_ = $this->valorunit_;
$original_cantidad_ = $this->cantidad_;
$original_valorpar_ = $this->valorpar_;
$original_descuento_ = $this->descuento_;
$original_tasaiva_ = $this->tasaiva_;
$original_iva_ = $this->iva_;

$idp=$this->idpro_ ;
$col=$this->colores_ ;
$tal=$this->tallas_ ;
$sa=$this->sabor_ ;
 
      $nm_select = "select colores, tallas, sabores from productos where idprod=$idp"; 
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
						$this->nm_mens_alert[] = "Por favor seleccione el SABOR!"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("Por favor seleccione el SABOR!"); }goto et2;
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
				$this->nm_mens_alert[] = "Por favor seleccione la TALLA!"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("Por favor seleccione la TALLA!"); }goto et2;
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
						$this->nm_mens_alert[] = "Por favor seleccione el SABOR!"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("Por favor seleccione el SABOR!"); }goto et2;
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
			$this->nm_mens_alert[] = "Por favor seleccione el COLOR!"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("Por favor seleccione el COLOR!"); }goto et2;
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
						$this->nm_mens_alert[] = "Por favor seleccione el SABOR!"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("Por favor seleccione el SABOR!"); }goto et2;
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
				$this->nm_mens_alert[] = "Por favor seleccione la TALLA!"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("Por favor seleccione la TALLA!"); }goto et2;
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
						$this->nm_mens_alert[] = "Por favor seleccione el SABOR!"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("Por favor seleccione el SABOR!"); }goto et2;
						}
					}
				else
					{
					goto et;
					}
			}
	}

et:;
	if($this->valorunit_ =="")
		{
		$this->sc_set_focus('valorunit');
		}
	else
		{
		$this->calcula_valor();
		}
goto et3;
et2:;
$this->cantidad_ =0;
et3:;



$modificado_idpro_ = $this->idpro_;
$modificado_valorunit_ = $this->valorunit_;
$modificado_cantidad_ = $this->cantidad_;
$modificado_valorpar_ = $this->valorpar_;
$modificado_descuento_ = $this->descuento_;
$modificado_tasaiva_ = $this->tasaiva_;
$modificado_iva_ = $this->iva_;
$this->nm_formatar_campos('idpro_', 'valorunit_', 'cantidad_', 'valorpar_', 'descuento_', 'tasaiva_', 'iva_');
$this->nmgp_refresh_fields = array();
if ($original_idpro_ !== $modificado_idpro_ || isset($this->nmgp_cmp_readonly['idpro_']) || (isset($bFlagRead_idpro_) && $bFlagRead_idpro_))
{
    $this->nmgp_refresh_fields[] = 'idpro_';
    $this->NM_ajax_changed['idpro_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_valorunit_ !== $modificado_valorunit_ || isset($this->nmgp_cmp_readonly['valorunit_']) || (isset($bFlagRead_valorunit_) && $bFlagRead_valorunit_))
{
    $this->nmgp_refresh_fields[] = 'valorunit_';
    $this->NM_ajax_changed['valorunit_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_cantidad_ !== $modificado_cantidad_ || isset($this->nmgp_cmp_readonly['cantidad_']) || (isset($bFlagRead_cantidad_) && $bFlagRead_cantidad_))
{
    $this->nmgp_refresh_fields[] = 'cantidad_';
    $this->NM_ajax_changed['cantidad_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_valorpar_ !== $modificado_valorpar_ || isset($this->nmgp_cmp_readonly['valorpar_']) || (isset($bFlagRead_valorpar_) && $bFlagRead_valorpar_))
{
    $this->nmgp_refresh_fields[] = 'valorpar_';
    $this->NM_ajax_changed['valorpar_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_descuento_ !== $modificado_descuento_ || isset($this->nmgp_cmp_readonly['descuento_']) || (isset($bFlagRead_descuento_) && $bFlagRead_descuento_))
{
    $this->nmgp_refresh_fields[] = 'descuento_';
    $this->NM_ajax_changed['descuento_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_tasaiva_ !== $modificado_tasaiva_ || isset($this->nmgp_cmp_readonly['tasaiva_']) || (isset($bFlagRead_tasaiva_) && $bFlagRead_tasaiva_))
{
    $this->nmgp_refresh_fields[] = 'tasaiva_';
    $this->NM_ajax_changed['tasaiva_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_iva_ !== $modificado_iva_ || isset($this->nmgp_cmp_readonly['iva_']) || (isset($bFlagRead_iva_) && $bFlagRead_iva_))
{
    $this->nmgp_refresh_fields[] = 'iva_';
    $this->NM_ajax_changed['iva_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'cantidad';
detallecompra_new_nc_pack_ajax_response();
exit;
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off';
}
function cantidad__onFocus()
{
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
if (!isset($this->sc_temp_edit_cantidad)) {$this->sc_temp_edit_cantidad = (isset($_SESSION['edit_cantidad'])) ? $_SESSION['edit_cantidad'] : "";}
if (!isset($this->sc_temp_sw)) {$this->sc_temp_sw = (isset($_SESSION['sw'])) ? $_SESSION['sw'] : "";}
  
$original_cantidad_ = $this->cantidad_;


if($this->sc_temp_sw==0){
	if($this->cantidad_ !="")
	{
		$this->sc_temp_edit_cantidad=$this->cantidad_ ;
	}
	$this->sc_temp_sw=1;
	}




if (isset($this->sc_temp_sw)) { $_SESSION['sw'] = $this->sc_temp_sw;}
if (isset($this->sc_temp_edit_cantidad)) { $_SESSION['edit_cantidad'] = $this->sc_temp_edit_cantidad;}
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off';
$modificado_cantidad_ = $this->cantidad_;
$this->nm_formatar_campos('cantidad_');
$this->nmgp_refresh_fields = array();
if ($original_cantidad_ !== $modificado_cantidad_ || isset($this->nmgp_cmp_readonly['cantidad_']) || (isset($bFlagRead_cantidad_) && $bFlagRead_cantidad_))
{
    $this->nmgp_refresh_fields[] = 'cantidad_';
    $this->NM_ajax_changed['cantidad_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'cantidad';
detallecompra_new_nc_pack_ajax_response();
exit;
}
function cod_barras__onChange()
{
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
  
$original_cod_barras_ = $this->cod_barras_;
$original_idpro_ = $this->idpro_;
$original_ver_ = $this->ver_;
$original_cantidad_ = $this->cantidad_;
$original_tasaiva_ = $this->tasaiva_;
$original_valorunit_ = $this->valorunit_;
$original_valorpar_ = $this->valorpar_;
$original_iva_ = $this->iva_;
$original_tasadesc_ = $this->tasadesc_;
$original_devuelto_ = $this->devuelto_;
$original_presentacion_ = $this->presentacion_;
$original_vencimiento_ = $this->vencimiento_;
$original_lote_ = $this->lote_;
$original_serial_codbarra_ = $this->serial_codbarra_;

$vCodba=$this->cod_barras_ ;
 
      $nm_select = "select idprod FROM productos where codigobar ='$vCodba'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dse = array();
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
;
if(isset($this->dse[0][0]))
	{
	$this->idpro_ =$this->dse[0][0];
	
	$vtmpproductoid = $this->idpro_ ;
	if(!empty($vtmpproductoid))
	{
		$this->ver_  = "<a href='../form_producto_precioscompra/index.php?gtmpidprod=".$vtmpproductoid."' target='_blank'>Ver</a>";
	}
	}
else
	{
	echo "PRODUCTO NO REGISTRADO";
	}
$Vcts="";
$this->cantidad_ ="";
$this->tasaiva_ =0;
$this->valorunit_ ="";
$this->valorpar_ ="";
$this->iva_ ="";
$Vcts=$this->fManeja_CTS();
 
      $nm_select = "select idiva from productos where idprod=$this->idpro_ "; 
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
$this->tasaiva_ =substr($this->ds , 5);
$this->tasadesc_ =0;
$this->devuelto_ =0;

$sql="select unidmaymen, unimay, unimen, costomay, costomen, fecha_vencimiento, lote, serial_codbarras from productos where idprod=$this->idpro_ ";
 
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
$resp=$this->ds[0][0];
if(isset($this->ds[0][0]) and ($this->ds[0][0])!="")
	{
	if($resp=="SI")
		{
		$this->presentacion_ =$this->ds[0][1];
		$this->valorunit_ =$this->ds[0][4];
		$this->nm_mens_alert[] = "Introduzca cantidad en unidad Mayor!"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("Introduzca cantidad en unidad Mayor!"); }}
	else
		{
		$this->presentacion_ =$this->ds[0][2];
		$this->valorunit_ =$this->ds[0][4];
		}
	if($this->ds[0][5]=='SI')
		{
		$this->nmgp_cmp_hidden["vencimiento_"] = "on"; $this->NM_ajax_info['fieldDisplay']['vencimiento_'] = 'on';
		}
	if($this->ds[0][6]=='SI')
		{
		$this->nmgp_cmp_hidden["lote_"] = "on"; $this->NM_ajax_info['fieldDisplay']['lote_'] = 'on';
		}
	if($this->ds[0][7]=='SI')
		{
		$this->nmgp_cmp_hidden["serial_codbarra_"] = "on"; $this->NM_ajax_info['fieldDisplay']['serial_codbarra_'] = 'on';
		}
	
	}
switch ($Vcts)
	{
	case 1:
	$this->sc_set_focus('sabor');
	break;
	
	case 2:
	$this->sc_set_focus('tallas');
	break;
	
	case 3:
	$this->sc_set_focus('colores');
	break;
	
	case 0:
	$this->sc_set_focus('cantidad');
	break;
	}


$modificado_cod_barras_ = $this->cod_barras_;
$modificado_idpro_ = $this->idpro_;
$modificado_ver_ = $this->ver_;
$modificado_cantidad_ = $this->cantidad_;
$modificado_tasaiva_ = $this->tasaiva_;
$modificado_valorunit_ = $this->valorunit_;
$modificado_valorpar_ = $this->valorpar_;
$modificado_iva_ = $this->iva_;
$modificado_tasadesc_ = $this->tasadesc_;
$modificado_devuelto_ = $this->devuelto_;
$modificado_presentacion_ = $this->presentacion_;
$modificado_vencimiento_ = $this->vencimiento_;
$modificado_lote_ = $this->lote_;
$modificado_serial_codbarra_ = $this->serial_codbarra_;
$this->nm_formatar_campos('cod_barras_', 'idpro_', 'ver_', 'cantidad_', 'tasaiva_', 'valorunit_', 'valorpar_', 'iva_', 'tasadesc_', 'devuelto_', 'presentacion_', 'vencimiento_', 'lote_', 'serial_codbarra_');
$this->nmgp_refresh_fields = array();
if ($original_cod_barras_ !== $modificado_cod_barras_ || isset($this->nmgp_cmp_readonly['cod_barras_']) || (isset($bFlagRead_cod_barras_) && $bFlagRead_cod_barras_))
{
    $this->nmgp_refresh_fields[] = 'cod_barras_';
    $this->NM_ajax_changed['cod_barras_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_idpro_ !== $modificado_idpro_ || isset($this->nmgp_cmp_readonly['idpro_']) || (isset($bFlagRead_idpro_) && $bFlagRead_idpro_))
{
    $this->nmgp_refresh_fields[] = 'idpro_';
    $this->NM_ajax_changed['idpro_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ver_ !== $modificado_ver_ || isset($this->nmgp_cmp_readonly['ver_']) || (isset($bFlagRead_ver_) && $bFlagRead_ver_))
{
    $this->nmgp_refresh_fields[] = 'ver_';
    $this->NM_ajax_changed['ver_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_cantidad_ !== $modificado_cantidad_ || isset($this->nmgp_cmp_readonly['cantidad_']) || (isset($bFlagRead_cantidad_) && $bFlagRead_cantidad_))
{
    $this->nmgp_refresh_fields[] = 'cantidad_';
    $this->NM_ajax_changed['cantidad_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_tasaiva_ !== $modificado_tasaiva_ || isset($this->nmgp_cmp_readonly['tasaiva_']) || (isset($bFlagRead_tasaiva_) && $bFlagRead_tasaiva_))
{
    $this->nmgp_refresh_fields[] = 'tasaiva_';
    $this->NM_ajax_changed['tasaiva_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_valorunit_ !== $modificado_valorunit_ || isset($this->nmgp_cmp_readonly['valorunit_']) || (isset($bFlagRead_valorunit_) && $bFlagRead_valorunit_))
{
    $this->nmgp_refresh_fields[] = 'valorunit_';
    $this->NM_ajax_changed['valorunit_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_valorpar_ !== $modificado_valorpar_ || isset($this->nmgp_cmp_readonly['valorpar_']) || (isset($bFlagRead_valorpar_) && $bFlagRead_valorpar_))
{
    $this->nmgp_refresh_fields[] = 'valorpar_';
    $this->NM_ajax_changed['valorpar_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_iva_ !== $modificado_iva_ || isset($this->nmgp_cmp_readonly['iva_']) || (isset($bFlagRead_iva_) && $bFlagRead_iva_))
{
    $this->nmgp_refresh_fields[] = 'iva_';
    $this->NM_ajax_changed['iva_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_tasadesc_ !== $modificado_tasadesc_ || isset($this->nmgp_cmp_readonly['tasadesc_']) || (isset($bFlagRead_tasadesc_) && $bFlagRead_tasadesc_))
{
    $this->nmgp_refresh_fields[] = 'tasadesc_';
    $this->NM_ajax_changed['tasadesc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_devuelto_ !== $modificado_devuelto_ || isset($this->nmgp_cmp_readonly['devuelto_']) || (isset($bFlagRead_devuelto_) && $bFlagRead_devuelto_))
{
    $this->nmgp_refresh_fields[] = 'devuelto_';
    $this->NM_ajax_changed['devuelto_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_presentacion_ !== $modificado_presentacion_ || isset($this->nmgp_cmp_readonly['presentacion_']) || (isset($bFlagRead_presentacion_) && $bFlagRead_presentacion_))
{
    $this->nmgp_refresh_fields[] = 'presentacion_';
    $this->NM_ajax_changed['presentacion_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_vencimiento_ !== $modificado_vencimiento_ || isset($this->nmgp_cmp_readonly['vencimiento_']) || (isset($bFlagRead_vencimiento_) && $bFlagRead_vencimiento_))
{
    $this->nmgp_refresh_fields[] = 'vencimiento_';
    $this->NM_ajax_changed['vencimiento_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_lote_ !== $modificado_lote_ || isset($this->nmgp_cmp_readonly['lote_']) || (isset($bFlagRead_lote_) && $bFlagRead_lote_))
{
    $this->nmgp_refresh_fields[] = 'lote_';
    $this->NM_ajax_changed['lote_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_serial_codbarra_ !== $modificado_serial_codbarra_ || isset($this->nmgp_cmp_readonly['serial_codbarra_']) || (isset($bFlagRead_serial_codbarra_) && $bFlagRead_serial_codbarra_))
{
    $this->nmgp_refresh_fields[] = 'serial_codbarra_';
    $this->NM_ajax_changed['serial_codbarra_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'cod';
detallecompra_new_nc_pack_ajax_response();
exit;
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off';
}
function colores__onChange()
{
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
  

$this->sc_set_focus('tallas');

$this->nm_formatar_campos();
$this->nmgp_refresh_fields = array();
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'colores';
detallecompra_new_nc_pack_ajax_response();
exit;


$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off';
}
function descuento__onChange()
{
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
  
$original_valorpar_ = $this->valorpar_;
$original_cantidad_ = $this->cantidad_;
$original_valorunit_ = $this->valorunit_;
$original_descuento_ = $this->descuento_;
$original_tasaiva_ = $this->tasaiva_;
$original_iva_ = $this->iva_;

$this->calcula_valor();
$this->sc_set_focus('idbod');


$modificado_valorpar_ = $this->valorpar_;
$modificado_cantidad_ = $this->cantidad_;
$modificado_valorunit_ = $this->valorunit_;
$modificado_descuento_ = $this->descuento_;
$modificado_tasaiva_ = $this->tasaiva_;
$modificado_iva_ = $this->iva_;
$this->nm_formatar_campos('valorpar_', 'cantidad_', 'valorunit_', 'descuento_', 'tasaiva_', 'iva_');
$this->nmgp_refresh_fields = array();
if ($original_valorpar_ !== $modificado_valorpar_ || isset($this->nmgp_cmp_readonly['valorpar_']) || (isset($bFlagRead_valorpar_) && $bFlagRead_valorpar_))
{
    $this->nmgp_refresh_fields[] = 'valorpar_';
    $this->NM_ajax_changed['valorpar_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_cantidad_ !== $modificado_cantidad_ || isset($this->nmgp_cmp_readonly['cantidad_']) || (isset($bFlagRead_cantidad_) && $bFlagRead_cantidad_))
{
    $this->nmgp_refresh_fields[] = 'cantidad_';
    $this->NM_ajax_changed['cantidad_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_valorunit_ !== $modificado_valorunit_ || isset($this->nmgp_cmp_readonly['valorunit_']) || (isset($bFlagRead_valorunit_) && $bFlagRead_valorunit_))
{
    $this->nmgp_refresh_fields[] = 'valorunit_';
    $this->NM_ajax_changed['valorunit_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_descuento_ !== $modificado_descuento_ || isset($this->nmgp_cmp_readonly['descuento_']) || (isset($bFlagRead_descuento_) && $bFlagRead_descuento_))
{
    $this->nmgp_refresh_fields[] = 'descuento_';
    $this->NM_ajax_changed['descuento_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_tasaiva_ !== $modificado_tasaiva_ || isset($this->nmgp_cmp_readonly['tasaiva_']) || (isset($bFlagRead_tasaiva_) && $bFlagRead_tasaiva_))
{
    $this->nmgp_refresh_fields[] = 'tasaiva_';
    $this->NM_ajax_changed['tasaiva_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_iva_ !== $modificado_iva_ || isset($this->nmgp_cmp_readonly['iva_']) || (isset($bFlagRead_iva_) && $bFlagRead_iva_))
{
    $this->nmgp_refresh_fields[] = 'iva_';
    $this->NM_ajax_changed['iva_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'descuento';
detallecompra_new_nc_pack_ajax_response();
exit;


$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off';
}
function fManeja_CTS()
{
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
  
$sql2="select colores, tallas, sabores from productos where idprod=$this->idpro_ ";
 
      $nm_select = $sql2; 
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
	if ($this->dt[0][0]=='NO')
		{
		$this->colores_ =0;
		$this->nmgp_cmp_hidden["colores_"] = "off"; $this->NM_ajax_info['fieldDisplay']['colores_'] = 'off';
		}
	else
		{
		$this->nmgp_cmp_hidden["colores_"] = "on"; $this->NM_ajax_info['fieldDisplay']['colores_'] = 'on';
		}
	if ($this->dt[0][1]=='NO')
		{
		$this->tallas_ =0;
		$this->nmgp_cmp_hidden["tallas_"] = "off"; $this->NM_ajax_info['fieldDisplay']['tallas_'] = 'off';
		}
	else
		{
		$this->nmgp_cmp_hidden["tallas_"] = "on"; $this->NM_ajax_info['fieldDisplay']['tallas_'] = 'on';
		}
	if ($this->dt[0][2]=='NO')
		{
		$this->sabor_ =0;
		$this->nmgp_cmp_hidden["sabor_"] = "off"; $this->NM_ajax_info['fieldDisplay']['sabor_'] = 'off';
		}
	else
		{
		$this->nmgp_cmp_hidden["sabor_"] = "on"; $this->NM_ajax_info['fieldDisplay']['sabor_'] = 'on';
		}
	
	if($this->colores_ ==0)
		{
		if($this->tallas_ ==0)
			{
			if($this->sabor_ ==0)
				{
				return $Vsin=0;
				}
			else
				{
				return $Vsin=1;
				}
			}
		else
			{
			if($this->sabor_ ==0)
				{
				return $Vsin=2;
				}
			else
				{
				return $Vsin=2;
				}
			}
		}
	else
		{
			if($this->tallas_ ==0)
				{
				if($this->sabor_ ==0)
					{
					return $Vsin=3;
					}
				else
					{
					return $Vsin=3;
					}
				}
			else
				{
				if($this->sabor_ ==0)
					{
					return $Vsin=3;
					}
				else
					{
					return $Vsin=3;
					}
				}
			}
		
	return $Vsin;
	}
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off';
}
function idpro__onChange()
{
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
  
$original_idpro_ = $this->idpro_;
$original_ver_ = $this->ver_;
$original_cantidad_ = $this->cantidad_;
$original_tasaiva_ = $this->tasaiva_;
$original_valorunit_ = $this->valorunit_;
$original_valorpar_ = $this->valorpar_;
$original_iva_ = $this->iva_;
$original_tasadesc_ = $this->tasadesc_;
$original_devuelto_ = $this->devuelto_;
$original_presentacion_ = $this->presentacion_;
$original_vencimiento_ = $this->vencimiento_;
$original_lote_ = $this->lote_;
$original_serial_codbarra_ = $this->serial_codbarra_;

$vtmpproductoid = $this->idpro_ ;
if(!empty($vtmpproductoid))
{
	$this->ver_  = "<a href='../form_producto_precioscompra/index.php?gtmpidprod=".$vtmpproductoid."' target='_blank'>Ver</a>";
}

$this->cantidad_ ="";
$this->tasaiva_ =0;
$this->valorunit_ ="";
$this->valorpar_ ="";
$this->iva_ ="";
$Vcts=$this->fManeja_CTS();
 
      $nm_select = "select idiva from productos where idprod=$this->idpro_ "; 
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
$this->tasaiva_ =substr($this->ds , 5);
$this->tasadesc_ =0;
$this->devuelto_ =0;

$sql="select unidmaymen, unimay, unimen, costomay, costomen, fecha_vencimiento, lote, serial_codbarras from productos where idprod=$this->idpro_ ";
 
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
$resp=$this->ds[0][0];
if(isset($this->ds[0][0]) and ($this->ds[0][0])!="")
	{
	if($resp=="SI")
		{
		$this->presentacion_ =$this->ds[0][1];
		$this->valorunit_ =$this->ds[0][4];
		$this->nm_mens_alert[] = "Introduzca cantidad en unidad Mayor!"; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert("Introduzca cantidad en unidad Mayor!"); }}
	else
		{
		$this->presentacion_ =$this->ds[0][2];
		$this->valorunit_ =$this->ds[0][4];
		}
	
	if($this->ds[0][5]=='SI')
		{
		$this->nmgp_cmp_hidden["vencimiento_"] = "on"; $this->NM_ajax_info['fieldDisplay']['vencimiento_'] = 'on';
		}
	if($this->ds[0][6]=='SI')
		{
		$this->nmgp_cmp_hidden["lote_"] = "on"; $this->NM_ajax_info['fieldDisplay']['lote_'] = 'on';
		}
	if($this->ds[0][7]=='SI')
		{
		$this->nmgp_cmp_hidden["serial_codbarra_"] = "on"; $this->NM_ajax_info['fieldDisplay']['serial_codbarra_'] = 'on';
		}
	
	}
switch ($Vcts)
	{
	case 1:
	$this->sc_set_focus('sabor');
	break;
	
	case 2:
	$this->sc_set_focus('tallas');
	break;
	
	case 3:
	$this->sc_set_focus('colores');
	break;
	
	case 0:
	$this->sc_set_focus('cantidad');
	break;
	}

$sql="select unidmaymen, unimay, unimen, costomay, costomen, fecha_vencimiento, lote, serial_codbarras from productos where idprod=$this->idpro_ ";
	



$modificado_idpro_ = $this->idpro_;
$modificado_ver_ = $this->ver_;
$modificado_cantidad_ = $this->cantidad_;
$modificado_tasaiva_ = $this->tasaiva_;
$modificado_valorunit_ = $this->valorunit_;
$modificado_valorpar_ = $this->valorpar_;
$modificado_iva_ = $this->iva_;
$modificado_tasadesc_ = $this->tasadesc_;
$modificado_devuelto_ = $this->devuelto_;
$modificado_presentacion_ = $this->presentacion_;
$modificado_vencimiento_ = $this->vencimiento_;
$modificado_lote_ = $this->lote_;
$modificado_serial_codbarra_ = $this->serial_codbarra_;
$this->nm_formatar_campos('idpro_', 'ver_', 'cantidad_', 'tasaiva_', 'valorunit_', 'valorpar_', 'iva_', 'tasadesc_', 'devuelto_', 'presentacion_', 'vencimiento_', 'lote_', 'serial_codbarra_');
$this->nmgp_refresh_fields = array();
if ($original_idpro_ !== $modificado_idpro_ || isset($this->nmgp_cmp_readonly['idpro_']) || (isset($bFlagRead_idpro_) && $bFlagRead_idpro_))
{
    $this->nmgp_refresh_fields[] = 'idpro_';
    $this->NM_ajax_changed['idpro_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_ver_ !== $modificado_ver_ || isset($this->nmgp_cmp_readonly['ver_']) || (isset($bFlagRead_ver_) && $bFlagRead_ver_))
{
    $this->nmgp_refresh_fields[] = 'ver_';
    $this->NM_ajax_changed['ver_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_cantidad_ !== $modificado_cantidad_ || isset($this->nmgp_cmp_readonly['cantidad_']) || (isset($bFlagRead_cantidad_) && $bFlagRead_cantidad_))
{
    $this->nmgp_refresh_fields[] = 'cantidad_';
    $this->NM_ajax_changed['cantidad_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_tasaiva_ !== $modificado_tasaiva_ || isset($this->nmgp_cmp_readonly['tasaiva_']) || (isset($bFlagRead_tasaiva_) && $bFlagRead_tasaiva_))
{
    $this->nmgp_refresh_fields[] = 'tasaiva_';
    $this->NM_ajax_changed['tasaiva_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_valorunit_ !== $modificado_valorunit_ || isset($this->nmgp_cmp_readonly['valorunit_']) || (isset($bFlagRead_valorunit_) && $bFlagRead_valorunit_))
{
    $this->nmgp_refresh_fields[] = 'valorunit_';
    $this->NM_ajax_changed['valorunit_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_valorpar_ !== $modificado_valorpar_ || isset($this->nmgp_cmp_readonly['valorpar_']) || (isset($bFlagRead_valorpar_) && $bFlagRead_valorpar_))
{
    $this->nmgp_refresh_fields[] = 'valorpar_';
    $this->NM_ajax_changed['valorpar_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_iva_ !== $modificado_iva_ || isset($this->nmgp_cmp_readonly['iva_']) || (isset($bFlagRead_iva_) && $bFlagRead_iva_))
{
    $this->nmgp_refresh_fields[] = 'iva_';
    $this->NM_ajax_changed['iva_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_tasadesc_ !== $modificado_tasadesc_ || isset($this->nmgp_cmp_readonly['tasadesc_']) || (isset($bFlagRead_tasadesc_) && $bFlagRead_tasadesc_))
{
    $this->nmgp_refresh_fields[] = 'tasadesc_';
    $this->NM_ajax_changed['tasadesc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_devuelto_ !== $modificado_devuelto_ || isset($this->nmgp_cmp_readonly['devuelto_']) || (isset($bFlagRead_devuelto_) && $bFlagRead_devuelto_))
{
    $this->nmgp_refresh_fields[] = 'devuelto_';
    $this->NM_ajax_changed['devuelto_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_presentacion_ !== $modificado_presentacion_ || isset($this->nmgp_cmp_readonly['presentacion_']) || (isset($bFlagRead_presentacion_) && $bFlagRead_presentacion_))
{
    $this->nmgp_refresh_fields[] = 'presentacion_';
    $this->NM_ajax_changed['presentacion_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_vencimiento_ !== $modificado_vencimiento_ || isset($this->nmgp_cmp_readonly['vencimiento_']) || (isset($bFlagRead_vencimiento_) && $bFlagRead_vencimiento_))
{
    $this->nmgp_refresh_fields[] = 'vencimiento_';
    $this->NM_ajax_changed['vencimiento_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_lote_ !== $modificado_lote_ || isset($this->nmgp_cmp_readonly['lote_']) || (isset($bFlagRead_lote_) && $bFlagRead_lote_))
{
    $this->nmgp_refresh_fields[] = 'lote_';
    $this->NM_ajax_changed['lote_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_serial_codbarra_ !== $modificado_serial_codbarra_ || isset($this->nmgp_cmp_readonly['serial_codbarra_']) || (isset($bFlagRead_serial_codbarra_) && $bFlagRead_serial_codbarra_))
{
    $this->nmgp_refresh_fields[] = 'serial_codbarra_';
    $this->NM_ajax_changed['serial_codbarra_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'idpro';
detallecompra_new_nc_pack_ajax_response();
exit;
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off';
}
function porc_desc__onChange()
{
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
  
$original_descuento_ = $this->descuento_;
$original_valorunit_ = $this->valorunit_;
$original_porc_desc_ = $this->porc_desc_;
$original_valorpar_ = $this->valorpar_;
$original_cantidad_ = $this->cantidad_;
$original_tasaiva_ = $this->tasaiva_;
$original_iva_ = $this->iva_;

$this->descuento_ =round(($this->valorunit_ *$this->porc_desc_ /100), 2);
$this->calcula_valor();
$this->sc_set_focus('idbod');

$modificado_descuento_ = $this->descuento_;
$modificado_valorunit_ = $this->valorunit_;
$modificado_porc_desc_ = $this->porc_desc_;
$modificado_valorpar_ = $this->valorpar_;
$modificado_cantidad_ = $this->cantidad_;
$modificado_tasaiva_ = $this->tasaiva_;
$modificado_iva_ = $this->iva_;
$this->nm_formatar_campos('descuento_', 'valorunit_', 'porc_desc_', 'valorpar_', 'cantidad_', 'tasaiva_', 'iva_');
$this->nmgp_refresh_fields = array();
if ($original_descuento_ !== $modificado_descuento_ || isset($this->nmgp_cmp_readonly['descuento_']) || (isset($bFlagRead_descuento_) && $bFlagRead_descuento_))
{
    $this->nmgp_refresh_fields[] = 'descuento_';
    $this->NM_ajax_changed['descuento_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_valorunit_ !== $modificado_valorunit_ || isset($this->nmgp_cmp_readonly['valorunit_']) || (isset($bFlagRead_valorunit_) && $bFlagRead_valorunit_))
{
    $this->nmgp_refresh_fields[] = 'valorunit_';
    $this->NM_ajax_changed['valorunit_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_porc_desc_ !== $modificado_porc_desc_ || isset($this->nmgp_cmp_readonly['porc_desc_']) || (isset($bFlagRead_porc_desc_) && $bFlagRead_porc_desc_))
{
    $this->nmgp_refresh_fields[] = 'porc_desc_';
    $this->NM_ajax_changed['porc_desc_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_valorpar_ !== $modificado_valorpar_ || isset($this->nmgp_cmp_readonly['valorpar_']) || (isset($bFlagRead_valorpar_) && $bFlagRead_valorpar_))
{
    $this->nmgp_refresh_fields[] = 'valorpar_';
    $this->NM_ajax_changed['valorpar_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_cantidad_ !== $modificado_cantidad_ || isset($this->nmgp_cmp_readonly['cantidad_']) || (isset($bFlagRead_cantidad_) && $bFlagRead_cantidad_))
{
    $this->nmgp_refresh_fields[] = 'cantidad_';
    $this->NM_ajax_changed['cantidad_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_tasaiva_ !== $modificado_tasaiva_ || isset($this->nmgp_cmp_readonly['tasaiva_']) || (isset($bFlagRead_tasaiva_) && $bFlagRead_tasaiva_))
{
    $this->nmgp_refresh_fields[] = 'tasaiva_';
    $this->NM_ajax_changed['tasaiva_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_iva_ !== $modificado_iva_ || isset($this->nmgp_cmp_readonly['iva_']) || (isset($bFlagRead_iva_) && $bFlagRead_iva_))
{
    $this->nmgp_refresh_fields[] = 'iva_';
    $this->NM_ajax_changed['iva_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'porc';
detallecompra_new_nc_pack_ajax_response();
exit;


$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off';
}
function sabor__onChange()
{
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
  

$this->sc_set_focus('cantidad');

$this->nm_formatar_campos();
$this->nmgp_refresh_fields = array();
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'sabor';
detallecompra_new_nc_pack_ajax_response();
exit;


$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off';
}
function tallas__onChange()
{
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
  

$this->sc_set_focus('sabor');

$this->nm_formatar_campos();
$this->nmgp_refresh_fields = array();
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'tallas';
detallecompra_new_nc_pack_ajax_response();
exit;


$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off';
}
function update_master()
{
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
if (!isset($this->sc_temp_par_idfaccom)) {$this->sc_temp_par_idfaccom = (isset($_SESSION['par_idfaccom'])) ? $_SESSION['par_idfaccom'] : "";}
  
$sql="SELECT sum(valorpar), sum(iva) FROM detallecompra WHERE idfaccom=$this->sc_temp_par_idfaccom";
 
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
if(isset($this->ds[0][0]))
	{
	$stotal=$this->ds[0][0];
	$siva=$this->ds[0][1];
	$total=$stotal+$siva;
	}

if(!empty($this->ds[0][0]))
	{
	$sqlupd = "UPDATE facturacom SET subtotal='".$stotal."', valoriva='".$siva."', total='".$total."', saldo= 0 WHERE idfaccom='".$this->sc_temp_par_idfaccom."'";
	
     $nm_select = $sqlupd; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                detallecompra_new_nc_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	$this->sc_master_value('subtotal', $stotal);
	$this->sc_master_value('valoriva', $siva);
	$this->sc_master_value('total', $total);
	$this->sc_master_value('saldo', $total);
	}

else
	{
	$sqlupd = "UPDATE facturacom SET subtotal=0, valoriva=0, total=0, saldo=0 WHERE idfaccom='".$this->sc_temp_par_idfaccom."'";
	
     $nm_select = $sqlupd; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                detallecompra_new_nc_pack_ajax_response();
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
	$this->sc_master_value('saldo', $total);
	}
if (isset($this->sc_temp_par_idfaccom)) { $_SESSION['par_idfaccom'] = $this->sc_temp_par_idfaccom;}
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off';
}
function valorunit__onBlur()
{
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gTcompra)) {$this->sc_temp_gTcompra = (isset($_SESSION['gTcompra'])) ? $_SESSION['gTcompra'] : "";}
  
$original_valorpar_ = $this->valorpar_;
$original_descuento_ = $this->descuento_;
$original_iva_ = $this->iva_;

$this->sc_temp_gTcompra=($this->valorpar_ -$this->descuento_ +$this->iva_ )+$this->sc_temp_gTcompra;



if (isset($this->sc_temp_gTcompra)) { $_SESSION['gTcompra'] = $this->sc_temp_gTcompra;}
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off';
$modificado_valorpar_ = $this->valorpar_;
$modificado_descuento_ = $this->descuento_;
$modificado_iva_ = $this->iva_;
$this->nm_formatar_campos('valorpar_', 'descuento_', 'iva_');
$this->nmgp_refresh_fields = array();
if ($original_valorpar_ !== $modificado_valorpar_ || isset($this->nmgp_cmp_readonly['valorpar_']) || (isset($bFlagRead_valorpar_) && $bFlagRead_valorpar_))
{
    $this->nmgp_refresh_fields[] = 'valorpar_';
    $this->NM_ajax_changed['valorpar_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_descuento_ !== $modificado_descuento_ || isset($this->nmgp_cmp_readonly['descuento_']) || (isset($bFlagRead_descuento_) && $bFlagRead_descuento_))
{
    $this->nmgp_refresh_fields[] = 'descuento_';
    $this->NM_ajax_changed['descuento_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_iva_ !== $modificado_iva_ || isset($this->nmgp_cmp_readonly['iva_']) || (isset($bFlagRead_iva_) && $bFlagRead_iva_))
{
    $this->nmgp_refresh_fields[] = 'iva_';
    $this->NM_ajax_changed['iva_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'valorunit';
detallecompra_new_nc_pack_ajax_response();
exit;
}
function valorunit__onChange()
{
$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'on';
  
$original_cantidad_ = $this->cantidad_;
$original_valorpar_ = $this->valorpar_;
$original_valorunit_ = $this->valorunit_;
$original_descuento_ = $this->descuento_;
$original_tasaiva_ = $this->tasaiva_;
$original_iva_ = $this->iva_;

if($this->cantidad_ =="" or $this->cantidad_ ==0)
	{
	$this->sc_set_focus('cantidad');
	}
else
	{
	$this->calcula_valor();
	$this->sc_set_focus('descuento');
	}

$modificado_cantidad_ = $this->cantidad_;
$modificado_valorpar_ = $this->valorpar_;
$modificado_valorunit_ = $this->valorunit_;
$modificado_descuento_ = $this->descuento_;
$modificado_tasaiva_ = $this->tasaiva_;
$modificado_iva_ = $this->iva_;
$this->nm_formatar_campos('cantidad_', 'valorpar_', 'valorunit_', 'descuento_', 'tasaiva_', 'iva_');
$this->nmgp_refresh_fields = array();
if ($original_cantidad_ !== $modificado_cantidad_ || isset($this->nmgp_cmp_readonly['cantidad_']) || (isset($bFlagRead_cantidad_) && $bFlagRead_cantidad_))
{
    $this->nmgp_refresh_fields[] = 'cantidad_';
    $this->NM_ajax_changed['cantidad_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_valorpar_ !== $modificado_valorpar_ || isset($this->nmgp_cmp_readonly['valorpar_']) || (isset($bFlagRead_valorpar_) && $bFlagRead_valorpar_))
{
    $this->nmgp_refresh_fields[] = 'valorpar_';
    $this->NM_ajax_changed['valorpar_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_valorunit_ !== $modificado_valorunit_ || isset($this->nmgp_cmp_readonly['valorunit_']) || (isset($bFlagRead_valorunit_) && $bFlagRead_valorunit_))
{
    $this->nmgp_refresh_fields[] = 'valorunit_';
    $this->NM_ajax_changed['valorunit_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_descuento_ !== $modificado_descuento_ || isset($this->nmgp_cmp_readonly['descuento_']) || (isset($bFlagRead_descuento_) && $bFlagRead_descuento_))
{
    $this->nmgp_refresh_fields[] = 'descuento_';
    $this->NM_ajax_changed['descuento_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_tasaiva_ !== $modificado_tasaiva_ || isset($this->nmgp_cmp_readonly['tasaiva_']) || (isset($bFlagRead_tasaiva_) && $bFlagRead_tasaiva_))
{
    $this->nmgp_refresh_fields[] = 'tasaiva_';
    $this->NM_ajax_changed['tasaiva_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_iva_ !== $modificado_iva_ || isset($this->nmgp_cmp_readonly['iva_']) || (isset($bFlagRead_iva_) && $bFlagRead_iva_))
{
    $this->nmgp_refresh_fields[] = 'iva_';
    $this->NM_ajax_changed['iva_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'valorunit';
detallecompra_new_nc_pack_ajax_response();
exit;


$_SESSION['scriptcase']['detallecompra_new_nc']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              detallecompra_new_nc_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['retorno_edit'] . "';";
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
        $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['table_refresh'] = true;
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("iddet_", "idfaccom_", "numfaccom", "idpro_", "idbod_", "cantidad_", "valorunit_", "valorpar_", "iva_", "descuento_", "tasaiva_", "tasadesc_", "devuelto_"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['csrf_token'];
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

   function Form_lookup_idbod_()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idbod_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idbod_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idbod_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idbod_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idbod_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idbod_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idbod_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idbod_'] = array(); 
    }

   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_porc_desc_ = $this->porc_desc_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_iva_ = $this->iva_;
   $old_value_tasaiva_ = $this->tasaiva_;
   $old_value_tasadesc_ = $this->tasadesc_;
   $old_value_devuelto_ = $this->devuelto_;
   $old_value_vencimiento_ = $this->vencimiento_;
   $old_value_iddet_ = $this->iddet_;
   $old_value_idfaccom_ = $this->idfaccom_;
   $old_value_id_nota_ = $this->id_nota_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_porc_desc_ = $this->porc_desc_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_tasaiva_ = $this->tasaiva_;
   $unformatted_value_tasadesc_ = $this->tasadesc_;
   $unformatted_value_devuelto_ = $this->devuelto_;
   $unformatted_value_vencimiento_ = $this->vencimiento_;
   $unformatted_value_iddet_ = $this->iddet_;
   $unformatted_value_idfaccom_ = $this->idfaccom_;
   $unformatted_value_id_nota_ = $this->id_nota_;

   $nm_comando = "SELECT idbodega, bodega  FROM bodegas  ORDER BY bodega";

   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->porc_desc_ = $old_value_porc_desc_;
   $this->descuento_ = $old_value_descuento_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->iva_ = $old_value_iva_;
   $this->tasaiva_ = $old_value_tasaiva_;
   $this->tasadesc_ = $old_value_tasadesc_;
   $this->devuelto_ = $old_value_devuelto_;
   $this->vencimiento_ = $old_value_vencimiento_;
   $this->iddet_ = $old_value_iddet_;
   $this->idfaccom_ = $old_value_idfaccom_;
   $this->id_nota_ = $old_value_id_nota_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['Lookup_idbod_'][] = $rs->fields[0];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              detallecompra_new_nc_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "iddet", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "idfaccom", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_idpro_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "idpro", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_idbod_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "idbod", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "cantidad", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "valorunit", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "valorpar", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "iva", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "descuento", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tasaiva", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tasadesc", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "devuelto", $arg_search, str_replace(",", ".", $data_search));
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_filter_form'] . " and (idfaccom=" . $_SESSION['par_idfaccom'] . "
and cantidad >0) and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where idfaccom=" . $_SESSION['par_idfaccom'] . "
and cantidad >0 and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_detallecompra_new_nc = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['total'] = $qt_geral_reg_detallecompra_new_nc;
      $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          detallecompra_new_nc_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          detallecompra_new_nc_pack_ajax_response();
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
      $nm_numeric[] = "iddet";$nm_numeric[] = "idfaccom";$nm_numeric[] = "idpro";$nm_numeric[] = "idbod";$nm_numeric[] = "cantidad";$nm_numeric[] = "valorunit";$nm_numeric[] = "valorpar";$nm_numeric[] = "iva";$nm_numeric[] = "descuento";$nm_numeric[] = "tasaiva";$nm_numeric[] = "tasadesc";$nm_numeric[] = "devuelto";$nm_numeric[] = "colores";$nm_numeric[] = "tallas";$nm_numeric[] = "sabor";$nm_numeric[] = "porc_desc";$nm_numeric[] = "num_ndevolucion";$nm_numeric[] = "id_nota";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['decimal_db'] == ".")
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
      $Nm_datas['vencimiento'] = "date";$Nm_datas['fecha_fab'] = "date";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['SC_sep_date1'];
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
   function SC_lookup_idpro_($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT codigobar + \" - \" + nompro, idprod FROM productos WHERE (codigobar + \" - \" + nompro LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(codigobar,\" - \",nompro), idprod FROM productos WHERE (concat(codigobar,\" - \",nompro) LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT codigobar&\" - \"&nompro, idprod FROM productos WHERE (codigobar&\" - \"&nompro LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT codigobar||\" - \"||nompro, idprod FROM productos WHERE (codigobar||\" - \"||nompro LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT codigobar + \" - \" + nompro, idprod FROM productos WHERE (codigobar + \" - \" + nompro LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
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
   function SC_lookup_idbod_($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
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
       $nmgp_saida_form = "detallecompra_new_nc_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['nm_run_menu'] = 2;
       $nmgp_saida_form = "detallecompra_new_nc_fim.php";
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
       detallecompra_new_nc_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['masterValue']);
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
    function sc_set_focus($sFieldName)
    {
        $sFieldName = strtolower($sFieldName);
        $aFocus = array(
                        'cod_barras_' => 'cod_barras_',
                        'idpro' => 'idpro_',
                        'ver_' => 'ver_',
                        'presentacion_' => 'presentacion_',
                        'cantidad' => 'cantidad_',
                        'valorunit' => 'valorunit_',
                        'porc_desc' => 'porc_desc_',
                        'descuento' => 'descuento_',
                        'valorpar' => 'valorpar_',
                        'iva' => 'iva_',
                        'idbod' => 'idbod_',
                        'tasaiva' => 'tasaiva_',
                        'tasadesc' => 'tasadesc_',
                        'devuelto' => 'devuelto_',
                        'vencimiento' => 'vencimiento_',
                        'lote' => 'lote_',
                        'serial_codbarra' => 'serial_codbarra_',
                        'iddet' => 'iddet_',
                        'idfaccom' => 'idfaccom_',
                        'tipo_docu' => 'tipo_docu_',
                        'tipo_trans' => 'tipo_trans_',
                        'id_nota' => 'id_nota_',
                       );
        if (isset($aFocus[$sFieldName]))
        {
            if (isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
            {
                $this->NM_ajax_info['focus'] = $aFocus[$sFieldName] . $this->nmgp_refresh_row;
            }
            else
            {
                $this->NM_ajax_info['focus'] = $aFocus[$sFieldName] . 1;
            }
        }
    } // sc_set_focus
    function sc_master_value($sIndex, $sValue)
    {
        $sIndex = strtolower($sIndex);
        $this->NM_ajax_info['masterValue'][$sIndex] = $sValue;
        $_SESSION['sc_session'][$this->Ini->sc_page]['detallecompra_new_nc']['masterValue'] = $this->NM_ajax_info['masterValue'];
    } // sc_master_value
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
    function sc_field_readonly($sField, $sStatus, $iSeq = '')
    {
        if ('on' != $sStatus && 'off' != $sStatus)
        {
            return;
        }

        $sFieldDateTime = '';

        $sFlagVar        = 'bFlagRead_' . $sField;
        $this->$sFlagVar = 'on' == $sStatus;

        if (isset($this->nmgp_refresh_row))
        {
            $iSeq = $this->nmgp_refresh_row;
        }

        $this->nmgp_cmp_readonly[$sField]                = $sStatus;
        $this->NM_ajax_info['readOnly'][$sField . $iSeq] = $sStatus;
        if ('' != $sFieldDateTime)
        {
            $this->NM_ajax_info['readOnly'][$sFieldDateTime . $iSeq] = $sStatus;
        }
    } // sc_field_readonly
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
            case "balterarsel":
                return array("sc_b_upd_t.sc-unique-btn-5");
                break;
            case "bexcluirsel":
                return array("sc_b_del_t.sc-unique-btn-6");
                break;
            case "0":
                return array("sys_separator.sc-unique-btn-7");
                break;
            case "help":
                return array("sc_b_hlp_t");
                break;
            case "exit":
                return array("sc_b_sai_t.sc-unique-btn-8", "sc_b_sai_t.sc-unique-btn-9", "sc_b_sai_t.sc-unique-btn-11", "sc_b_sai_t.sc-unique-btn-10", "sc_b_sai_t.sc-unique-btn-12");
                break;
            case "birpara":
                return array("brec_b");
                break;
            case "first":
                return array("sc_b_ini_b.sc-unique-btn-13");
                break;
            case "back":
                return array("sc_b_ret_b.sc-unique-btn-14");
                break;
            case "forward":
                return array("sc_b_avc_b.sc-unique-btn-15");
                break;
            case "last":
                return array("sc_b_fim_b.sc-unique-btn-16");
                break;
        }

        return array($buttonName);
    } // getButtonIds

}
?>
