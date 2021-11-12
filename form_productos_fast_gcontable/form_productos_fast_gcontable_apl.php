<?php
//
class form_productos_fast_gcontable_apl
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
   var $idprod_;
   var $codigobar_;
   var $codigoprod_;
   var $nompro_;
   var $unidmaymen_;
   var $unimay_;
   var $unimen_;
   var $costomay_;
   var $costomen_;
   var $recmayamen_;
   var $preciomen_;
   var $preciomen2_;
   var $preciomen3_;
   var $precio2_;
   var $preciomay_;
   var $preciofull_;
   var $stockmay_;
   var $stockmen_;
   var $idgrup_;
   var $idpro1_;
   var $idpro2_;
   var $idiva_;
   var $otro_;
   var $otro2_;
   var $colores_;
   var $tallas_;
   var $sabores_;
   var $imagenprod_;
   var $imagenprod__scfile_name;
   var $imagenprod__ul_name;
   var $imagenprod__scfile_type;
   var $imagenprod__ul_type;
   var $imagenprod__limpa;
   var $imagenprod__salva;
   var $out_imagenprod_;
   var $imconsumo_;
   var $escombo_;
   var $idcombo_;
   var $precio_editable_;
   var $cod_cuenta_;
   var $fecha_vencimiento_;
   var $fecha_fab_;
   var $lote_;
   var $serial_codbarras_;
   var $maneja_tcs_lfs_;
   var $control_costo_;
   var $por_preciominimo_;
   var $id_marca_;
   var $id_linea_;
   var $ultima_compra_;
   var $n_ultcompra_;
   var $ultima_venta_;
   var $n_ultventa_;
   var $codigobar2_;
   var $codigobar3_;
   var $nube_;
   var $existencia_;
   var $multiple_escala_;
   var $en_base_a_;
   var $activo_;
   var $tipo_producto_;
   var $costo_prom_;
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
   var $sc_max_reg = 10; 
   var $sc_max_reg_incl = 10; 
   var $form_vert_form_productos_fast_gcontable = array();
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
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['cod_cuenta_']))
          {
              $this->cod_cuenta_ = $this->NM_ajax_info['param']['cod_cuenta_'];
          }
          if (isset($this->NM_ajax_info['param']['codigobar_']))
          {
              $this->codigobar_ = $this->NM_ajax_info['param']['codigobar_'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['idprod_']))
          {
              $this->idprod_ = $this->NM_ajax_info['param']['idprod_'];
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
          if (isset($this->NM_ajax_info['param']['nompro_']))
          {
              $this->nompro_ = $this->NM_ajax_info['param']['nompro_'];
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
      $this->sc_conv_var['idprod'] = "idprod_";
      $this->sc_conv_var['codigobar'] = "codigobar_";
      $this->sc_conv_var['codigoprod'] = "codigoprod_";
      $this->sc_conv_var['nompro'] = "nompro_";
      $this->sc_conv_var['unidmaymen'] = "unidmaymen_";
      $this->sc_conv_var['unimay'] = "unimay_";
      $this->sc_conv_var['unimen'] = "unimen_";
      $this->sc_conv_var['costomay'] = "costomay_";
      $this->sc_conv_var['costomen'] = "costomen_";
      $this->sc_conv_var['recmayamen'] = "recmayamen_";
      $this->sc_conv_var['preciomen'] = "preciomen_";
      $this->sc_conv_var['preciomen2'] = "preciomen2_";
      $this->sc_conv_var['preciomen3'] = "preciomen3_";
      $this->sc_conv_var['precio2'] = "precio2_";
      $this->sc_conv_var['preciomay'] = "preciomay_";
      $this->sc_conv_var['preciofull'] = "preciofull_";
      $this->sc_conv_var['stockmay'] = "stockmay_";
      $this->sc_conv_var['stockmen'] = "stockmen_";
      $this->sc_conv_var['idgrup'] = "idgrup_";
      $this->sc_conv_var['idpro1'] = "idpro1_";
      $this->sc_conv_var['idpro2'] = "idpro2_";
      $this->sc_conv_var['idiva'] = "idiva_";
      $this->sc_conv_var['otro'] = "otro_";
      $this->sc_conv_var['otro2'] = "otro2_";
      $this->sc_conv_var['colores'] = "colores_";
      $this->sc_conv_var['tallas'] = "tallas_";
      $this->sc_conv_var['sabores'] = "sabores_";
      $this->sc_conv_var['imagenprod'] = "imagenprod_";
      $this->sc_conv_var['imconsumo'] = "imconsumo_";
      $this->sc_conv_var['escombo'] = "escombo_";
      $this->sc_conv_var['idcombo'] = "idcombo_";
      $this->sc_conv_var['precio_editable'] = "precio_editable_";
      $this->sc_conv_var['cod_cuenta'] = "cod_cuenta_";
      $this->sc_conv_var['fecha_vencimiento'] = "fecha_vencimiento_";
      $this->sc_conv_var['fecha_fab'] = "fecha_fab_";
      $this->sc_conv_var['lote'] = "lote_";
      $this->sc_conv_var['serial_codbarras'] = "serial_codbarras_";
      $this->sc_conv_var['maneja_tcs_lfs'] = "maneja_tcs_lfs_";
      $this->sc_conv_var['control_costo'] = "control_costo_";
      $this->sc_conv_var['por_preciominimo'] = "por_preciominimo_";
      $this->sc_conv_var['id_marca'] = "id_marca_";
      $this->sc_conv_var['id_linea'] = "id_linea_";
      $this->sc_conv_var['ultima_compra'] = "ultima_compra_";
      $this->sc_conv_var['n_ultcompra'] = "n_ultcompra_";
      $this->sc_conv_var['ultima_venta'] = "ultima_venta_";
      $this->sc_conv_var['n_ultventa'] = "n_ultventa_";
      $this->sc_conv_var['codigobar2'] = "codigobar2_";
      $this->sc_conv_var['codigobar3'] = "codigobar3_";
      $this->sc_conv_var['nube'] = "nube_";
      $this->sc_conv_var['existencia'] = "existencia_";
      $this->sc_conv_var['multiple_escala'] = "multiple_escala_";
      $this->sc_conv_var['en_base_a'] = "en_base_a_";
      $this->sc_conv_var['activo'] = "activo_";
      $this->sc_conv_var['tipo_producto'] = "tipo_producto_";
      $this->sc_conv_var['costo_prom'] = "costo_prom_";
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
          $_SESSION['sc_session'][$script_case_init]['form_productos_fast_gcontable']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_productos_fast_gcontable']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_productos_fast_gcontable']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_productos_fast_gcontable']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_productos_fast_gcontable']['embutida_parms']);
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
                 nm_limpa_str_form_productos_fast_gcontable($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 if ($cadapar[0] == "idprod_")
                 {
                     $this->NM_where_filter .= (empty($this->NM_where_filter)) ? "(" : " and ";
                     $this->NM_where_filter .= "idprod = " . $this->idprod_;
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
              $_SESSION['sc_session'][$script_case_init]['form_productos_fast_gcontable']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_productos_fast_gcontable']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_productos_fast_gcontable']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_productos_fast_gcontable']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_productos_fast_gcontable']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_productos_fast_gcontable']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_productos_fast_gcontable']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_productos_fast_gcontable']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_productos_fast_gcontable']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_productos_fast_gcontable']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_productos_fast_gcontable']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_productos_fast_gcontable']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_productos_fast_gcontable']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_productos_fast_gcontable']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_productos_fast_gcontable_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_productos_fast_gcontable']['upload_field_info'] = array();

      $_SESSION['sc_session'][$script_case_init]['form_productos_fast_gcontable']['upload_field_info']['imagenprod_'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_productos_fast_gcontable',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '0',
          'upload_file_width'  => '0',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_productos_fast_gcontable']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_productos_fast_gcontable'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_productos_fast_gcontable']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_productos_fast_gcontable']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_productos_fast_gcontable') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_productos_fast_gcontable']['label'] = "Editar Grupos Contables en Productos";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_productos_fast_gcontable")
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



      $_SESSION['scriptcase']['error_icon']['form_productos_fast_gcontable']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Lemon__NM__nm_scriptcase9_Lemon_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_productos_fast_gcontable'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new']  = "off";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['insert'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "off";
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_productos_fast_gcontable']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_productos_fast_gcontable'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_productos_fast_gcontable'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field . "_"] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field . "_"] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_productos_fast_gcontable", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'form_productos_fast_gcontable_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_productos_fast_gcontable_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_productos_fast_gcontable/form_productos_fast_gcontable_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_productos_fast_gcontable_erro.class.php"); 
      }
      $this->Erro      = new form_productos_fast_gcontable_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sc_max_reg']) && strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sc_max_reg']) == "all")
      {
          $this->form_paginacao = "total";
      }
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['opcao']))
         { 
             if ($this->idprod_ != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['final'];
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

            $out1_img_cache = $_SESSION['scriptcase']['form_productos_fast_gcontable']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['form_productos_fast_gcontable']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
      //-- idprod_
      $this->field_config['idprod_']               = array();
      $this->field_config['idprod_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idprod_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idprod_']['symbol_dec'] = '';
      $this->field_config['idprod_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idprod_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- costomay_
      $this->field_config['costomay_']               = array();
      $this->field_config['costomay_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['costomay_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['costomay_']['symbol_dec'] = '';
      $this->field_config['costomay_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['costomay_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- costomen_
      $this->field_config['costomen_']               = array();
      $this->field_config['costomen_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['costomen_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['costomen_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['costomen_']['symbol_mon'] = '';
      $this->field_config['costomen_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['costomen_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- recmayamen_
      $this->field_config['recmayamen_']               = array();
      $this->field_config['recmayamen_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['recmayamen_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['recmayamen_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['recmayamen_']['symbol_mon'] = '';
      $this->field_config['recmayamen_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['recmayamen_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- preciomen_
      $this->field_config['preciomen_']               = array();
      $this->field_config['preciomen_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['preciomen_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['preciomen_']['symbol_dec'] = '';
      $this->field_config['preciomen_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['preciomen_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- preciomen2_
      $this->field_config['preciomen2_']               = array();
      $this->field_config['preciomen2_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['preciomen2_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['preciomen2_']['symbol_dec'] = '';
      $this->field_config['preciomen2_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['preciomen2_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- preciomen3_
      $this->field_config['preciomen3_']               = array();
      $this->field_config['preciomen3_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['preciomen3_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['preciomen3_']['symbol_dec'] = '';
      $this->field_config['preciomen3_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['preciomen3_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- precio2_
      $this->field_config['precio2_']               = array();
      $this->field_config['precio2_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['precio2_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['precio2_']['symbol_dec'] = '';
      $this->field_config['precio2_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['precio2_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- preciomay_
      $this->field_config['preciomay_']               = array();
      $this->field_config['preciomay_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['preciomay_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['preciomay_']['symbol_dec'] = '';
      $this->field_config['preciomay_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['preciomay_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- preciofull_
      $this->field_config['preciofull_']               = array();
      $this->field_config['preciofull_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['preciofull_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['preciofull_']['symbol_dec'] = '';
      $this->field_config['preciofull_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['preciofull_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- stockmay_
      $this->field_config['stockmay_']               = array();
      $this->field_config['stockmay_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['stockmay_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['stockmay_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['stockmay_']['symbol_mon'] = '';
      $this->field_config['stockmay_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['stockmay_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- stockmen_
      $this->field_config['stockmen_']               = array();
      $this->field_config['stockmen_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['stockmen_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['stockmen_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['stockmen_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['stockmen_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- idgrup_
      $this->field_config['idgrup_']               = array();
      $this->field_config['idgrup_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idgrup_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idgrup_']['symbol_dec'] = '';
      $this->field_config['idgrup_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idgrup_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- idpro1_
      $this->field_config['idpro1_']               = array();
      $this->field_config['idpro1_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idpro1_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idpro1_']['symbol_dec'] = '';
      $this->field_config['idpro1_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idpro1_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- idpro2_
      $this->field_config['idpro2_']               = array();
      $this->field_config['idpro2_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idpro2_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idpro2_']['symbol_dec'] = '';
      $this->field_config['idpro2_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idpro2_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- idiva_
      $this->field_config['idiva_']               = array();
      $this->field_config['idiva_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idiva_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idiva_']['symbol_dec'] = '';
      $this->field_config['idiva_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idiva_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- otro_
      $this->field_config['otro_']               = array();
      $this->field_config['otro_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['otro_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['otro_']['symbol_dec'] = '';
      $this->field_config['otro_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['otro_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- otro2_
      $this->field_config['otro2_']               = array();
      $this->field_config['otro2_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['otro2_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['otro2_']['symbol_dec'] = '';
      $this->field_config['otro2_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['otro2_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- imconsumo_
      $this->field_config['imconsumo_']               = array();
      $this->field_config['imconsumo_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['imconsumo_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['imconsumo_']['symbol_dec'] = '';
      $this->field_config['imconsumo_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['imconsumo_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- idcombo_
      $this->field_config['idcombo_']               = array();
      $this->field_config['idcombo_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idcombo_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idcombo_']['symbol_dec'] = '';
      $this->field_config['idcombo_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idcombo_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- por_preciominimo_
      $this->field_config['por_preciominimo_']               = array();
      $this->field_config['por_preciominimo_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['por_preciominimo_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['por_preciominimo_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['por_preciominimo_']['symbol_mon'] = '';
      $this->field_config['por_preciominimo_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['por_preciominimo_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- id_marca_
      $this->field_config['id_marca_']               = array();
      $this->field_config['id_marca_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_marca_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_marca_']['symbol_dec'] = '';
      $this->field_config['id_marca_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_marca_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- id_linea_
      $this->field_config['id_linea_']               = array();
      $this->field_config['id_linea_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_linea_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_linea_']['symbol_dec'] = '';
      $this->field_config['id_linea_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_linea_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ultima_compra_
      $this->field_config['ultima_compra_']                 = array();
      $this->field_config['ultima_compra_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['ultima_compra_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['ultima_compra_']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'ultima_compra_');
      //-- ultima_venta_
      $this->field_config['ultima_venta_']                 = array();
      $this->field_config['ultima_venta_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['ultima_venta_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['ultima_venta_']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'ultima_venta_');
      //-- existencia_
      $this->field_config['existencia_']               = array();
      $this->field_config['existencia_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['existencia_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['existencia_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['existencia_']['symbol_mon'] = '';
      $this->field_config['existencia_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['existencia_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- costo_prom_
      $this->field_config['costo_prom_']               = array();
      $this->field_config['costo_prom_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['costo_prom_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['costo_prom_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['costo_prom_']['symbol_mon'] = '';
      $this->field_config['costo_prom_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['costo_prom_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sc_max_reg'] = $this->nmgp_max_line;
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['opc_edit'] = true;  
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
         form_productos_fast_gcontable_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'backup_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "igual";
         $this->nm_tira_formatacao();
         $this->nm_select_banco();
         $this->ajax_return_values();
         $this->NM_close_db();
         form_productos_fast_gcontable_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'submit_form' == $this->NM_ajax_opcao)
      {
         if (isset($this->codigobar_)) { $this->nm_limpa_alfa($this->codigobar_); }
         if (isset($this->nompro_)) { $this->nm_limpa_alfa($this->nompro_); }
         if (isset($this->cod_cuenta_)) { $this->nm_limpa_alfa($this->cod_cuenta_); }
         if (isset($this->Sc_num_lin_alt) && $this->Sc_num_lin_alt > 0) 
         {
             $sc_seq_vert = $this->Sc_num_lin_alt;
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dados_form'][$sc_seq_vert];
             $this->idprod_ = $this->nmgp_dados_form['idprod_']; 
             $this->codigoprod_ = $this->nmgp_dados_form['codigoprod_']; 
             $this->unidmaymen_ = $this->nmgp_dados_form['unidmaymen_']; 
             $this->unimay_ = $this->nmgp_dados_form['unimay_']; 
             $this->unimen_ = $this->nmgp_dados_form['unimen_']; 
             $this->costomay_ = $this->nmgp_dados_form['costomay_']; 
             $this->costomen_ = $this->nmgp_dados_form['costomen_']; 
             $this->recmayamen_ = $this->nmgp_dados_form['recmayamen_']; 
             $this->preciomen_ = $this->nmgp_dados_form['preciomen_']; 
             $this->preciomen2_ = $this->nmgp_dados_form['preciomen2_']; 
             $this->preciomen3_ = $this->nmgp_dados_form['preciomen3_']; 
             $this->precio2_ = $this->nmgp_dados_form['precio2_']; 
             $this->preciomay_ = $this->nmgp_dados_form['preciomay_']; 
             $this->preciofull_ = $this->nmgp_dados_form['preciofull_']; 
             $this->stockmay_ = $this->nmgp_dados_form['stockmay_']; 
             $this->stockmen_ = $this->nmgp_dados_form['stockmen_']; 
             $this->idgrup_ = $this->nmgp_dados_form['idgrup_']; 
             $this->idpro1_ = $this->nmgp_dados_form['idpro1_']; 
             $this->idpro2_ = $this->nmgp_dados_form['idpro2_']; 
             $this->idiva_ = $this->nmgp_dados_form['idiva_']; 
             $this->otro_ = $this->nmgp_dados_form['otro_']; 
             $this->otro2_ = $this->nmgp_dados_form['otro2_']; 
             $this->colores_ = $this->nmgp_dados_form['colores_']; 
             $this->tallas_ = $this->nmgp_dados_form['tallas_']; 
             $this->sabores_ = $this->nmgp_dados_form['sabores_']; 
             $this->imagenprod_ = $this->nmgp_dados_form['imagenprod_']; 
             $this->imconsumo_ = $this->nmgp_dados_form['imconsumo_']; 
             $this->escombo_ = $this->nmgp_dados_form['escombo_']; 
             $this->idcombo_ = $this->nmgp_dados_form['idcombo_']; 
             $this->precio_editable_ = $this->nmgp_dados_form['precio_editable_']; 
             $this->fecha_vencimiento_ = $this->nmgp_dados_form['fecha_vencimiento_']; 
             $this->fecha_fab_ = $this->nmgp_dados_form['fecha_fab_']; 
             $this->lote_ = $this->nmgp_dados_form['lote_']; 
             $this->serial_codbarras_ = $this->nmgp_dados_form['serial_codbarras_']; 
             $this->maneja_tcs_lfs_ = $this->nmgp_dados_form['maneja_tcs_lfs_']; 
             $this->control_costo_ = $this->nmgp_dados_form['control_costo_']; 
             $this->por_preciominimo_ = $this->nmgp_dados_form['por_preciominimo_']; 
             $this->id_marca_ = $this->nmgp_dados_form['id_marca_']; 
             $this->id_linea_ = $this->nmgp_dados_form['id_linea_']; 
             $this->ultima_compra_ = $this->nmgp_dados_form['ultima_compra_']; 
             $this->n_ultcompra_ = $this->nmgp_dados_form['n_ultcompra_']; 
             $this->ultima_venta_ = $this->nmgp_dados_form['ultima_venta_']; 
             $this->n_ultventa_ = $this->nmgp_dados_form['n_ultventa_']; 
             $this->codigobar2_ = $this->nmgp_dados_form['codigobar2_']; 
             $this->codigobar3_ = $this->nmgp_dados_form['codigobar3_']; 
             $this->nube_ = $this->nmgp_dados_form['nube_']; 
             $this->existencia_ = $this->nmgp_dados_form['existencia_']; 
             $this->multiple_escala_ = $this->nmgp_dados_form['multiple_escala_']; 
             $this->en_base_a_ = $this->nmgp_dados_form['en_base_a_']; 
             $this->activo_ = $this->nmgp_dados_form['activo_']; 
             $this->tipo_producto_ = $this->nmgp_dados_form['tipo_producto_']; 
             $this->costo_prom_ = $this->nmgp_dados_form['costo_prom_']; 
         }
         $this->controle_form_vert();
         if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
         {
             $this->NM_rollback_db();
              if ($this->NM_ajax_flag)
              {
                  if (!isset($this->NM_ajax_info['errList']['geral_form_productos_fast_gcontable']) || !is_array($this->NM_ajax_info['errList']['geral_form_productos_fast_gcontable']))
                  {
                      $this->NM_ajax_info['errList']['geral_form_productos_fast_gcontable'] = array();
                  }
                  if ($Campos_Crit != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_productos_fast_gcontable'][] = $Campos_Crit;
                  }
                  if (!empty($Campos_Falta))
                  {
                      $this->NM_ajax_info['errList']['geral_form_productos_fast_gcontable'][] = $this->Formata_Campos_Falta($Campos_Falta);
                  }
                  if ($this->Campos_Mens_erro != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_productos_fast_gcontable'][] = $this->Campos_Mens_erro;
                  }
              }
         }
         else
         {
             $this->NM_commit_db();
         }
         if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sc_redir_atualiz'] == "ok")
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
         form_productos_fast_gcontable_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
          if ('validate_codigobar_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'codigobar_');
          }
          if ('validate_nompro_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nompro_');
          }
          if ('validate_cod_cuenta_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cod_cuenta_');
          }
          form_productos_fast_gcontable_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('autocomp_cod_cuenta_' == substr($this->NM_ajax_opcao, 0, strlen('autocomp_cod_cuenta_')))
          {
              if (isset($_GET['term'])) {
                  $this->cod_cuenta_ = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->cod_cuenta_ = '';
              }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['Lookup_cod_cuenta_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['Lookup_cod_cuenta_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['Lookup_cod_cuenta_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['Lookup_cod_cuenta_'] = array(); 
    }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + descripcion FROM grupos_contables WHERE codigo + ' - ' + descripcion LIKE '%" . substr($this->Db->qstr($this->cod_cuenta_), 1, -1) . "%' ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ',descripcion) FROM grupos_contables WHERE concat(codigo,' - ',descripcion) LIKE '%" . substr($this->Db->qstr($this->cod_cuenta_), 1, -1) . "%' ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&descripcion FROM grupos_contables WHERE codigo&' - '&descripcion LIKE '%" . substr($this->Db->qstr($this->cod_cuenta_), 1, -1) . "%' ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||descripcion FROM grupos_contables WHERE codigo||' - '||descripcion LIKE '%" . substr($this->Db->qstr($this->cod_cuenta_), 1, -1) . "%' ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + descripcion FROM grupos_contables WHERE codigo + ' - ' + descripcion LIKE '%" . substr($this->Db->qstr($this->cod_cuenta_), 1, -1) . "%' ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||descripcion FROM grupos_contables WHERE codigo||' - '||descripcion LIKE '%" . substr($this->Db->qstr($this->cod_cuenta_), 1, -1) . "%' ORDER BY codigo, descripcion";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||descripcion FROM grupos_contables WHERE codigo||' - '||descripcion LIKE '%" . substr($this->Db->qstr($this->cod_cuenta_), 1, -1) . "%' ORDER BY codigo, descripcion";
   }
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_productos_fast_gcontable_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_productos_fast_gcontable_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['Lookup_cod_cuenta_'][] = $rs->fields[0];
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
          form_productos_fast_gcontable_pack_ajax_response();
          exit;
      }
      while ($sc_contr_vert > $sc_seq_vert) 
      { 
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
         $this->codigobar_ = $GLOBALS["codigobar_" . $sc_seq_vert]; 
         $this->nompro_ = $GLOBALS["nompro_" . $sc_seq_vert]; 
         $this->cod_cuenta_ = $GLOBALS["cod_cuenta_" . $sc_seq_vert]; 
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dados_form'][$sc_seq_vert];
             $this->idprod_ = $this->nmgp_dados_form['idprod_']; 
             $this->codigoprod_ = $this->nmgp_dados_form['codigoprod_']; 
             $this->unidmaymen_ = $this->nmgp_dados_form['unidmaymen_']; 
             $this->unimay_ = $this->nmgp_dados_form['unimay_']; 
             $this->unimen_ = $this->nmgp_dados_form['unimen_']; 
             $this->costomay_ = $this->nmgp_dados_form['costomay_']; 
             $this->costomen_ = $this->nmgp_dados_form['costomen_']; 
             $this->recmayamen_ = $this->nmgp_dados_form['recmayamen_']; 
             $this->preciomen_ = $this->nmgp_dados_form['preciomen_']; 
             $this->preciomen2_ = $this->nmgp_dados_form['preciomen2_']; 
             $this->preciomen3_ = $this->nmgp_dados_form['preciomen3_']; 
             $this->precio2_ = $this->nmgp_dados_form['precio2_']; 
             $this->preciomay_ = $this->nmgp_dados_form['preciomay_']; 
             $this->preciofull_ = $this->nmgp_dados_form['preciofull_']; 
             $this->stockmay_ = $this->nmgp_dados_form['stockmay_']; 
             $this->stockmen_ = $this->nmgp_dados_form['stockmen_']; 
             $this->idgrup_ = $this->nmgp_dados_form['idgrup_']; 
             $this->idpro1_ = $this->nmgp_dados_form['idpro1_']; 
             $this->idpro2_ = $this->nmgp_dados_form['idpro2_']; 
             $this->idiva_ = $this->nmgp_dados_form['idiva_']; 
             $this->otro_ = $this->nmgp_dados_form['otro_']; 
             $this->otro2_ = $this->nmgp_dados_form['otro2_']; 
             $this->colores_ = $this->nmgp_dados_form['colores_']; 
             $this->tallas_ = $this->nmgp_dados_form['tallas_']; 
             $this->sabores_ = $this->nmgp_dados_form['sabores_']; 
             $this->imagenprod_ = $this->nmgp_dados_form['imagenprod_']; 
             $this->imconsumo_ = $this->nmgp_dados_form['imconsumo_']; 
             $this->escombo_ = $this->nmgp_dados_form['escombo_']; 
             $this->idcombo_ = $this->nmgp_dados_form['idcombo_']; 
             $this->precio_editable_ = $this->nmgp_dados_form['precio_editable_']; 
             $this->fecha_vencimiento_ = $this->nmgp_dados_form['fecha_vencimiento_']; 
             $this->fecha_fab_ = $this->nmgp_dados_form['fecha_fab_']; 
             $this->lote_ = $this->nmgp_dados_form['lote_']; 
             $this->serial_codbarras_ = $this->nmgp_dados_form['serial_codbarras_']; 
             $this->maneja_tcs_lfs_ = $this->nmgp_dados_form['maneja_tcs_lfs_']; 
             $this->control_costo_ = $this->nmgp_dados_form['control_costo_']; 
             $this->por_preciominimo_ = $this->nmgp_dados_form['por_preciominimo_']; 
             $this->id_marca_ = $this->nmgp_dados_form['id_marca_']; 
             $this->id_linea_ = $this->nmgp_dados_form['id_linea_']; 
             $this->ultima_compra_ = $this->nmgp_dados_form['ultima_compra_']; 
             $this->n_ultcompra_ = $this->nmgp_dados_form['n_ultcompra_']; 
             $this->ultima_venta_ = $this->nmgp_dados_form['ultima_venta_']; 
             $this->n_ultventa_ = $this->nmgp_dados_form['n_ultventa_']; 
             $this->codigobar2_ = $this->nmgp_dados_form['codigobar2_']; 
             $this->codigobar3_ = $this->nmgp_dados_form['codigobar3_']; 
             $this->nube_ = $this->nmgp_dados_form['nube_']; 
             $this->existencia_ = $this->nmgp_dados_form['existencia_']; 
             $this->multiple_escala_ = $this->nmgp_dados_form['multiple_escala_']; 
             $this->en_base_a_ = $this->nmgp_dados_form['en_base_a_']; 
             $this->activo_ = $this->nmgp_dados_form['activo_']; 
             $this->tipo_producto_ = $this->nmgp_dados_form['tipo_producto_']; 
             $this->costo_prom_ = $this->nmgp_dados_form['costo_prom_']; 
         }
         if (isset($this->codigobar_)) { $this->nm_limpa_alfa($this->codigobar_); }
         if (isset($this->nompro_)) { $this->nm_limpa_alfa($this->nompro_); }
         if (isset($this->cod_cuenta_)) { $this->nm_limpa_alfa($this->cod_cuenta_); }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dados_form'])) 
         {
            $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dados_form'][$sc_seq_vert];
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dados_select'])) 
         {
            $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dados_select'][$sc_seq_vert];
         }
         if ($this->nmgp_opcao != "recarga" && (!in_array($sc_seq_vert, $sc_check_excl) && !in_array($sc_seq_vert, $sc_check_incl) ))
         { }
         else
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sc_disabled'] = array();
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
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['codigobar_'] =  $this->codigobar_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['nompro_'] =  $this->nompro_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['cod_cuenta_'] =  $this->cod_cuenta_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['idprod_'] =  $this->idprod_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['codigoprod_'] =  $this->codigoprod_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['unidmaymen_'] =  $this->unidmaymen_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['unimay_'] =  $this->unimay_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['unimen_'] =  $this->unimen_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['costomay_'] =  $this->costomay_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['costomen_'] =  $this->costomen_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['recmayamen_'] =  $this->recmayamen_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['preciomen_'] =  $this->preciomen_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['preciomen2_'] =  $this->preciomen2_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['preciomen3_'] =  $this->preciomen3_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['precio2_'] =  $this->precio2_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['preciomay_'] =  $this->preciomay_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['preciofull_'] =  $this->preciofull_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['stockmay_'] =  $this->stockmay_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['stockmen_'] =  $this->stockmen_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['idgrup_'] =  $this->idgrup_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['idpro1_'] =  $this->idpro1_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['idpro2_'] =  $this->idpro2_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['idiva_'] =  $this->idiva_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['otro_'] =  $this->otro_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['otro2_'] =  $this->otro2_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['colores_'] =  $this->colores_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['tallas_'] =  $this->tallas_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['sabores_'] =  $this->sabores_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['imagenprod_'] =  $this->imagenprod_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['imagenprod__limpa'] =  $this->imagenprod__limpa; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['imconsumo_'] =  $this->imconsumo_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['escombo_'] =  $this->escombo_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['idcombo_'] =  $this->idcombo_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['precio_editable_'] =  $this->precio_editable_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['fecha_vencimiento_'] =  $this->fecha_vencimiento_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['fecha_fab_'] =  $this->fecha_fab_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['lote_'] =  $this->lote_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['serial_codbarras_'] =  $this->serial_codbarras_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['maneja_tcs_lfs_'] =  $this->maneja_tcs_lfs_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['control_costo_'] =  $this->control_costo_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['por_preciominimo_'] =  $this->por_preciominimo_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['id_marca_'] =  $this->id_marca_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['id_linea_'] =  $this->id_linea_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['ultima_compra_'] =  $this->ultima_compra_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['n_ultcompra_'] =  $this->n_ultcompra_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['ultima_venta_'] =  $this->ultima_venta_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['n_ultventa_'] =  $this->n_ultventa_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['codigobar2_'] =  $this->codigobar2_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['codigobar3_'] =  $this->codigobar3_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['nube_'] =  $this->nube_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['existencia_'] =  $this->existencia_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['multiple_escala_'] =  $this->multiple_escala_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['en_base_a_'] =  $this->en_base_a_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['activo_'] =  $this->activo_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['tipo_producto_'] =  $this->tipo_producto_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['costo_prom_'] =  $this->costo_prom_; 
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
          form_productos_fast_gcontable_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
      {
          $this->nm_gera_html();
          $this->NM_ajax_info['tableRefresh'] = NM_charset_to_utf8($this->Table_refresh . $this->New_Line) . '</table>';
          $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
          $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_form_productos_fast_gcontable);
          $this->NM_ajax_info['fldList']['idprod_']['keyVal'] = sc_htmlentities($this->nmgp_dados_form['idprod_']);
          $this->NM_close_db();
          form_productos_fast_gcontable_pack_ajax_response();
          exit;
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sc_redir_atualiz'] == "ok")
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_productos_fast_gcontable_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          return; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_productos_fast_gcontable']['contr_erro'] = 'off';
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_productos_fast_gcontable.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Editar Grupos Contables en Productos") ?></TITLE>
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
<form name="Fdown" method="get" action="form_productos_fast_gcontable_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_productos_fast_gcontable"> 
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
           case 'codigobar_':
               return "Código";
               break;
           case 'nompro_':
               return "Descripción";
               break;
           case 'cod_cuenta_':
               return "Grupo Contable";
               break;
           case 'idprod_':
               return "Idprod";
               break;
           case 'codigoprod_':
               return "Codigoprod";
               break;
           case 'unidmaymen_':
               return "Unidmaymen";
               break;
           case 'unimay_':
               return "Unimay";
               break;
           case 'unimen_':
               return "Unimen";
               break;
           case 'costomay_':
               return "Costomay";
               break;
           case 'costomen_':
               return "Costomen";
               break;
           case 'recmayamen_':
               return "Recmayamen";
               break;
           case 'preciomen_':
               return "Preciomen";
               break;
           case 'preciomen2_':
               return "Preciomen 2";
               break;
           case 'preciomen3_':
               return "Preciomen 3";
               break;
           case 'precio2_':
               return "Precio 2";
               break;
           case 'preciomay_':
               return "Preciomay";
               break;
           case 'preciofull_':
               return "Preciofull";
               break;
           case 'stockmay_':
               return "Stockmay";
               break;
           case 'stockmen_':
               return "Stockmen";
               break;
           case 'idgrup_':
               return "Idgrup";
               break;
           case 'idpro1_':
               return "Idpro 1";
               break;
           case 'idpro2_':
               return "Idpro 2";
               break;
           case 'idiva_':
               return "Idiva";
               break;
           case 'otro_':
               return "Otro";
               break;
           case 'otro2_':
               return "Otro 2";
               break;
           case 'colores_':
               return "Colores";
               break;
           case 'tallas_':
               return "Tallas";
               break;
           case 'sabores_':
               return "Sabores";
               break;
           case 'imagenprod_':
               return "Imagenprod";
               break;
           case 'imconsumo_':
               return "Imconsumo";
               break;
           case 'escombo_':
               return "Escombo";
               break;
           case 'idcombo_':
               return "Idcombo";
               break;
           case 'precio_editable_':
               return "Precio Editable";
               break;
           case 'fecha_vencimiento_':
               return "Fecha Vencimiento";
               break;
           case 'fecha_fab_':
               return "Fecha Fab";
               break;
           case 'lote_':
               return "Lote";
               break;
           case 'serial_codbarras_':
               return "Serial Codbarras";
               break;
           case 'maneja_tcs_lfs_':
               return "Maneja Tcs Lfs";
               break;
           case 'control_costo_':
               return "Control Costo";
               break;
           case 'por_preciominimo_':
               return "Por Preciominimo";
               break;
           case 'id_marca_':
               return "Id Marca";
               break;
           case 'id_linea_':
               return "Id Linea";
               break;
           case 'ultima_compra_':
               return "Ultima Compra";
               break;
           case 'n_ultcompra_':
               return "N Ultcompra";
               break;
           case 'ultima_venta_':
               return "Ultima Venta";
               break;
           case 'n_ultventa_':
               return "N Ultventa";
               break;
           case 'codigobar2_':
               return "Codigobar 2";
               break;
           case 'codigobar3_':
               return "Codigobar 3";
               break;
           case 'nube_':
               return "Nube";
               break;
           case 'existencia_':
               return "Existencia";
               break;
           case 'multiple_escala_':
               return "Multiple Escala";
               break;
           case 'en_base_a_':
               return "En Base A";
               break;
           case 'activo_':
               return "Activo";
               break;
           case 'tipo_producto_':
               return "Tipo Producto";
               break;
           case 'costo_prom_':
               return "Costo Prom";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_productos_fast_gcontable']) || !is_array($this->NM_ajax_info['errList']['geral_form_productos_fast_gcontable']))
              {
                  $this->NM_ajax_info['errList']['geral_form_productos_fast_gcontable'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_productos_fast_gcontable'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'codigobar_' == $filtro)) || (is_array($filtro) && in_array('codigobar_', $filtro)))
        $this->ValidateField_codigobar_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nompro_' == $filtro)) || (is_array($filtro) && in_array('nompro_', $filtro)))
        $this->ValidateField_nompro_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cod_cuenta_' == $filtro)) || (is_array($filtro) && in_array('cod_cuenta_', $filtro)))
        $this->ValidateField_cod_cuenta_($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_codigobar_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['php_cmp_required']['codigobar_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['php_cmp_required']['codigobar_'] == "on")) 
      { 
          if ($this->codigobar_ == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Código" ; 
              if (!isset($Campos_Erros['codigobar_']))
              {
                  $Campos_Erros['codigobar_'] = array();
              }
              $Campos_Erros['codigobar_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['codigobar_']) || !is_array($this->NM_ajax_info['errList']['codigobar_']))
                  {
                      $this->NM_ajax_info['errList']['codigobar_'] = array();
                  }
                  $this->NM_ajax_info['errList']['codigobar_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->codigobar_) > 25) 
          { 
              $hasError = true;
              $Campos_Crit .= "Código " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['codigobar_']))
              {
                  $Campos_Erros['codigobar_'] = array();
              }
              $Campos_Erros['codigobar_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['codigobar_']) || !is_array($this->NM_ajax_info['errList']['codigobar_']))
              {
                  $this->NM_ajax_info['errList']['codigobar_'] = array();
              }
              $this->NM_ajax_info['errList']['codigobar_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'codigobar_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_codigobar_

    function ValidateField_nompro_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['php_cmp_required']['nompro_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['php_cmp_required']['nompro_'] == "on")) 
      { 
          if ($this->nompro_ == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Descripción" ; 
              if (!isset($Campos_Erros['nompro_']))
              {
                  $Campos_Erros['nompro_'] = array();
              }
              $Campos_Erros['nompro_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['nompro_']) || !is_array($this->NM_ajax_info['errList']['nompro_']))
                  {
                      $this->NM_ajax_info['errList']['nompro_'] = array();
                  }
                  $this->NM_ajax_info['errList']['nompro_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nompro_) > 200) 
          { 
              $hasError = true;
              $Campos_Crit .= "Descripción " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nompro_']))
              {
                  $Campos_Erros['nompro_'] = array();
              }
              $Campos_Erros['nompro_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nompro_']) || !is_array($this->NM_ajax_info['errList']['nompro_']))
              {
                  $this->NM_ajax_info['errList']['nompro_'] = array();
              }
              $this->NM_ajax_info['errList']['nompro_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nompro_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nompro_

    function ValidateField_cod_cuenta_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cod_cuenta_) > 10) 
          { 
              $hasError = true;
              $Campos_Crit .= "Grupo Contable " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cod_cuenta_']))
              {
                  $Campos_Erros['cod_cuenta_'] = array();
              }
              $Campos_Erros['cod_cuenta_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cod_cuenta_']) || !is_array($this->NM_ajax_info['errList']['cod_cuenta_']))
              {
                  $this->NM_ajax_info['errList']['cod_cuenta_'] = array();
              }
              $this->NM_ajax_info['errList']['cod_cuenta_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cod_cuenta_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cod_cuenta_

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
    $this->nmgp_dados_form['codigobar_'] = $this->codigobar_;
    $this->nmgp_dados_form['nompro_'] = $this->nompro_;
    $this->nmgp_dados_form['cod_cuenta_'] = $this->cod_cuenta_;
    $this->nmgp_dados_form['idprod_'] = $this->idprod_;
    $this->nmgp_dados_form['codigoprod_'] = $this->codigoprod_;
    $this->nmgp_dados_form['unidmaymen_'] = $this->unidmaymen_;
    $this->nmgp_dados_form['unimay_'] = $this->unimay_;
    $this->nmgp_dados_form['unimen_'] = $this->unimen_;
    $this->nmgp_dados_form['costomay_'] = $this->costomay_;
    $this->nmgp_dados_form['costomen_'] = $this->costomen_;
    $this->nmgp_dados_form['recmayamen_'] = $this->recmayamen_;
    $this->nmgp_dados_form['preciomen_'] = $this->preciomen_;
    $this->nmgp_dados_form['preciomen2_'] = $this->preciomen2_;
    $this->nmgp_dados_form['preciomen3_'] = $this->preciomen3_;
    $this->nmgp_dados_form['precio2_'] = $this->precio2_;
    $this->nmgp_dados_form['preciomay_'] = $this->preciomay_;
    $this->nmgp_dados_form['preciofull_'] = $this->preciofull_;
    $this->nmgp_dados_form['stockmay_'] = $this->stockmay_;
    $this->nmgp_dados_form['stockmen_'] = $this->stockmen_;
    $this->nmgp_dados_form['idgrup_'] = $this->idgrup_;
    $this->nmgp_dados_form['idpro1_'] = $this->idpro1_;
    $this->nmgp_dados_form['idpro2_'] = $this->idpro2_;
    $this->nmgp_dados_form['idiva_'] = $this->idiva_;
    $this->nmgp_dados_form['otro_'] = $this->otro_;
    $this->nmgp_dados_form['otro2_'] = $this->otro2_;
    $this->nmgp_dados_form['colores_'] = $this->colores_;
    $this->nmgp_dados_form['tallas_'] = $this->tallas_;
    $this->nmgp_dados_form['sabores_'] = $this->sabores_;
    $this->nmgp_dados_form['imagenprod_'] = $this->imagenprod_;
    $this->nmgp_dados_form['imagenprod__limpa'] = $this->imagenprod__limpa;
    $this->nmgp_dados_form['imconsumo_'] = $this->imconsumo_;
    $this->nmgp_dados_form['escombo_'] = $this->escombo_;
    $this->nmgp_dados_form['idcombo_'] = $this->idcombo_;
    $this->nmgp_dados_form['precio_editable_'] = $this->precio_editable_;
    $this->nmgp_dados_form['fecha_vencimiento_'] = $this->fecha_vencimiento_;
    $this->nmgp_dados_form['fecha_fab_'] = $this->fecha_fab_;
    $this->nmgp_dados_form['lote_'] = $this->lote_;
    $this->nmgp_dados_form['serial_codbarras_'] = $this->serial_codbarras_;
    $this->nmgp_dados_form['maneja_tcs_lfs_'] = $this->maneja_tcs_lfs_;
    $this->nmgp_dados_form['control_costo_'] = $this->control_costo_;
    $this->nmgp_dados_form['por_preciominimo_'] = $this->por_preciominimo_;
    $this->nmgp_dados_form['id_marca_'] = $this->id_marca_;
    $this->nmgp_dados_form['id_linea_'] = $this->id_linea_;
    $this->nmgp_dados_form['ultima_compra_'] = $this->ultima_compra_;
    $this->nmgp_dados_form['n_ultcompra_'] = $this->n_ultcompra_;
    $this->nmgp_dados_form['ultima_venta_'] = $this->ultima_venta_;
    $this->nmgp_dados_form['n_ultventa_'] = $this->n_ultventa_;
    $this->nmgp_dados_form['codigobar2_'] = $this->codigobar2_;
    $this->nmgp_dados_form['codigobar3_'] = $this->codigobar3_;
    $this->nmgp_dados_form['nube_'] = $this->nube_;
    $this->nmgp_dados_form['existencia_'] = $this->existencia_;
    $this->nmgp_dados_form['multiple_escala_'] = $this->multiple_escala_;
    $this->nmgp_dados_form['en_base_a_'] = $this->en_base_a_;
    $this->nmgp_dados_form['activo_'] = $this->activo_;
    $this->nmgp_dados_form['tipo_producto_'] = $this->tipo_producto_;
    $this->nmgp_dados_form['costo_prom_'] = $this->costo_prom_;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dados_form'][$sc_seq_vert] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['idprod_'] = $this->idprod_;
      nm_limpa_numero($this->idprod_, $this->field_config['idprod_']['symbol_grp']) ; 
      $this->Before_unformat['costomay_'] = $this->costomay_;
      nm_limpa_numero($this->costomay_, $this->field_config['costomay_']['symbol_grp']) ; 
      $this->Before_unformat['costomen_'] = $this->costomen_;
      if (!empty($this->field_config['costomen_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->costomen_, $this->field_config['costomen_']['symbol_dec'], $this->field_config['costomen_']['symbol_grp'], $this->field_config['costomen_']['symbol_mon']);
         nm_limpa_valor($this->costomen_, $this->field_config['costomen_']['symbol_dec'], $this->field_config['costomen_']['symbol_grp']);
      }
      $this->Before_unformat['recmayamen_'] = $this->recmayamen_;
      if (!empty($this->field_config['recmayamen_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->recmayamen_, $this->field_config['recmayamen_']['symbol_dec'], $this->field_config['recmayamen_']['symbol_grp'], $this->field_config['recmayamen_']['symbol_mon']);
         nm_limpa_valor($this->recmayamen_, $this->field_config['recmayamen_']['symbol_dec'], $this->field_config['recmayamen_']['symbol_grp']);
      }
      $this->Before_unformat['preciomen_'] = $this->preciomen_;
      nm_limpa_numero($this->preciomen_, $this->field_config['preciomen_']['symbol_grp']) ; 
      $this->Before_unformat['preciomen2_'] = $this->preciomen2_;
      nm_limpa_numero($this->preciomen2_, $this->field_config['preciomen2_']['symbol_grp']) ; 
      $this->Before_unformat['preciomen3_'] = $this->preciomen3_;
      nm_limpa_numero($this->preciomen3_, $this->field_config['preciomen3_']['symbol_grp']) ; 
      $this->Before_unformat['precio2_'] = $this->precio2_;
      nm_limpa_numero($this->precio2_, $this->field_config['precio2_']['symbol_grp']) ; 
      $this->Before_unformat['preciomay_'] = $this->preciomay_;
      nm_limpa_numero($this->preciomay_, $this->field_config['preciomay_']['symbol_grp']) ; 
      $this->Before_unformat['preciofull_'] = $this->preciofull_;
      nm_limpa_numero($this->preciofull_, $this->field_config['preciofull_']['symbol_grp']) ; 
      $this->Before_unformat['stockmay_'] = $this->stockmay_;
      if (!empty($this->field_config['stockmay_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->stockmay_, $this->field_config['stockmay_']['symbol_dec'], $this->field_config['stockmay_']['symbol_grp'], $this->field_config['stockmay_']['symbol_mon']);
         nm_limpa_valor($this->stockmay_, $this->field_config['stockmay_']['symbol_dec'], $this->field_config['stockmay_']['symbol_grp']);
      }
      $this->Before_unformat['stockmen_'] = $this->stockmen_;
      if (!empty($this->field_config['stockmen_']['symbol_dec']))
      {
         nm_limpa_valor($this->stockmen_, $this->field_config['stockmen_']['symbol_dec'], $this->field_config['stockmen_']['symbol_grp']);
      }
      $this->Before_unformat['idgrup_'] = $this->idgrup_;
      nm_limpa_numero($this->idgrup_, $this->field_config['idgrup_']['symbol_grp']) ; 
      $this->Before_unformat['idpro1_'] = $this->idpro1_;
      nm_limpa_numero($this->idpro1_, $this->field_config['idpro1_']['symbol_grp']) ; 
      $this->Before_unformat['idpro2_'] = $this->idpro2_;
      nm_limpa_numero($this->idpro2_, $this->field_config['idpro2_']['symbol_grp']) ; 
      $this->Before_unformat['idiva_'] = $this->idiva_;
      nm_limpa_numero($this->idiva_, $this->field_config['idiva_']['symbol_grp']) ; 
      $this->Before_unformat['otro_'] = $this->otro_;
      nm_limpa_numero($this->otro_, $this->field_config['otro_']['symbol_grp']) ; 
      $this->Before_unformat['otro2_'] = $this->otro2_;
      nm_limpa_numero($this->otro2_, $this->field_config['otro2_']['symbol_grp']) ; 
      $this->Before_unformat['imconsumo_'] = $this->imconsumo_;
      nm_limpa_numero($this->imconsumo_, $this->field_config['imconsumo_']['symbol_grp']) ; 
      $this->Before_unformat['idcombo_'] = $this->idcombo_;
      nm_limpa_numero($this->idcombo_, $this->field_config['idcombo_']['symbol_grp']) ; 
      $this->Before_unformat['por_preciominimo_'] = $this->por_preciominimo_;
      if (!empty($this->field_config['por_preciominimo_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->por_preciominimo_, $this->field_config['por_preciominimo_']['symbol_dec'], $this->field_config['por_preciominimo_']['symbol_grp'], $this->field_config['por_preciominimo_']['symbol_mon']);
         nm_limpa_valor($this->por_preciominimo_, $this->field_config['por_preciominimo_']['symbol_dec'], $this->field_config['por_preciominimo_']['symbol_grp']);
      }
      $this->Before_unformat['id_marca_'] = $this->id_marca_;
      nm_limpa_numero($this->id_marca_, $this->field_config['id_marca_']['symbol_grp']) ; 
      $this->Before_unformat['id_linea_'] = $this->id_linea_;
      nm_limpa_numero($this->id_linea_, $this->field_config['id_linea_']['symbol_grp']) ; 
      $this->Before_unformat['ultima_compra_'] = $this->ultima_compra_;
      nm_limpa_data($this->ultima_compra_, $this->field_config['ultima_compra_']['date_sep']) ; 
      $this->Before_unformat['ultima_venta_'] = $this->ultima_venta_;
      nm_limpa_data($this->ultima_venta_, $this->field_config['ultima_venta_']['date_sep']) ; 
      $this->Before_unformat['existencia_'] = $this->existencia_;
      if (!empty($this->field_config['existencia_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->existencia_, $this->field_config['existencia_']['symbol_dec'], $this->field_config['existencia_']['symbol_grp'], $this->field_config['existencia_']['symbol_mon']);
         nm_limpa_valor($this->existencia_, $this->field_config['existencia_']['symbol_dec'], $this->field_config['existencia_']['symbol_grp']);
      }
      $this->Before_unformat['costo_prom_'] = $this->costo_prom_;
      if (!empty($this->field_config['costo_prom_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->costo_prom_, $this->field_config['costo_prom_']['symbol_dec'], $this->field_config['costo_prom_']['symbol_grp'], $this->field_config['costo_prom_']['symbol_mon']);
         nm_limpa_valor($this->costo_prom_, $this->field_config['costo_prom_']['symbol_dec'], $this->field_config['costo_prom_']['symbol_grp']);
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
      if ($Nome_Campo == "idprod_")
      {
          nm_limpa_numero($this->idprod_, $this->field_config['idprod_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "costomay_")
      {
          nm_limpa_numero($this->costomay_, $this->field_config['costomay_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "costomen_")
      {
          if (!empty($this->field_config['costomen_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->costomen_, $this->field_config['costomen_']['symbol_dec'], $this->field_config['costomen_']['symbol_grp'], $this->field_config['costomen_']['symbol_mon']);
             nm_limpa_valor($this->costomen_, $this->field_config['costomen_']['symbol_dec'], $this->field_config['costomen_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "recmayamen_")
      {
          if (!empty($this->field_config['recmayamen_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->recmayamen_, $this->field_config['recmayamen_']['symbol_dec'], $this->field_config['recmayamen_']['symbol_grp'], $this->field_config['recmayamen_']['symbol_mon']);
             nm_limpa_valor($this->recmayamen_, $this->field_config['recmayamen_']['symbol_dec'], $this->field_config['recmayamen_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "preciomen_")
      {
          nm_limpa_numero($this->preciomen_, $this->field_config['preciomen_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "preciomen2_")
      {
          nm_limpa_numero($this->preciomen2_, $this->field_config['preciomen2_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "preciomen3_")
      {
          nm_limpa_numero($this->preciomen3_, $this->field_config['preciomen3_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "precio2_")
      {
          nm_limpa_numero($this->precio2_, $this->field_config['precio2_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "preciomay_")
      {
          nm_limpa_numero($this->preciomay_, $this->field_config['preciomay_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "preciofull_")
      {
          nm_limpa_numero($this->preciofull_, $this->field_config['preciofull_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "stockmay_")
      {
          if (!empty($this->field_config['stockmay_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->stockmay_, $this->field_config['stockmay_']['symbol_dec'], $this->field_config['stockmay_']['symbol_grp'], $this->field_config['stockmay_']['symbol_mon']);
             nm_limpa_valor($this->stockmay_, $this->field_config['stockmay_']['symbol_dec'], $this->field_config['stockmay_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "stockmen_")
      {
          if (!empty($this->field_config['stockmen_']['symbol_dec']))
          {
             nm_limpa_valor($this->stockmen_, $this->field_config['stockmen_']['symbol_dec'], $this->field_config['stockmen_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "idgrup_")
      {
          nm_limpa_numero($this->idgrup_, $this->field_config['idgrup_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "idpro1_")
      {
          nm_limpa_numero($this->idpro1_, $this->field_config['idpro1_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "idpro2_")
      {
          nm_limpa_numero($this->idpro2_, $this->field_config['idpro2_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "idiva_")
      {
          nm_limpa_numero($this->idiva_, $this->field_config['idiva_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "otro_")
      {
          nm_limpa_numero($this->otro_, $this->field_config['otro_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "otro2_")
      {
          nm_limpa_numero($this->otro2_, $this->field_config['otro2_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "imconsumo_")
      {
          nm_limpa_numero($this->imconsumo_, $this->field_config['imconsumo_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "idcombo_")
      {
          nm_limpa_numero($this->idcombo_, $this->field_config['idcombo_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "por_preciominimo_")
      {
          if (!empty($this->field_config['por_preciominimo_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->por_preciominimo_, $this->field_config['por_preciominimo_']['symbol_dec'], $this->field_config['por_preciominimo_']['symbol_grp'], $this->field_config['por_preciominimo_']['symbol_mon']);
             nm_limpa_valor($this->por_preciominimo_, $this->field_config['por_preciominimo_']['symbol_dec'], $this->field_config['por_preciominimo_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "id_marca_")
      {
          nm_limpa_numero($this->id_marca_, $this->field_config['id_marca_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_linea_")
      {
          nm_limpa_numero($this->id_linea_, $this->field_config['id_linea_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "existencia_")
      {
          if (!empty($this->field_config['existencia_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->existencia_, $this->field_config['existencia_']['symbol_dec'], $this->field_config['existencia_']['symbol_grp'], $this->field_config['existencia_']['symbol_mon']);
             nm_limpa_valor($this->existencia_, $this->field_config['existencia_']['symbol_dec'], $this->field_config['existencia_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "costo_prom_")
      {
          if (!empty($this->field_config['costo_prom_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->costo_prom_, $this->field_config['costo_prom_']['symbol_dec'], $this->field_config['costo_prom_']['symbol_grp'], $this->field_config['costo_prom_']['symbol_mon']);
             nm_limpa_valor($this->costo_prom_, $this->field_config['costo_prom_']['symbol_dec'], $this->field_config['costo_prom_']['symbol_grp']);
          }
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
              $this->NM_ajax_info['fldList']['idprod_']['keyVal'] = form_productos_fast_gcontable_pack_protect_string($this->nmgp_dados_form['idprod_']);
          }
   } // ajax_return_values
   function ajax_return_values_all_vert()
   {
          if (isset($this->nmgp_refresh_fields) && isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_productos_fast_gcontable[$this->nmgp_refresh_row] = $this->NM_ajax_info['param'];
              if ((isset($this->Embutida_ronly) && $this->Embutida_ronly) || $this->NM_ajax_force_values)
              {
                  if (isset($this->NM_ajax_changed['codigobar_']) && $this->NM_ajax_changed['codigobar_'])
                  {
                      $this->form_vert_form_productos_fast_gcontable[$this->nmgp_refresh_row]['codigobar_'] = $this->codigobar_;
                  }
                  if (isset($this->NM_ajax_changed['nompro_']) && $this->NM_ajax_changed['nompro_'])
                  {
                      $this->form_vert_form_productos_fast_gcontable[$this->nmgp_refresh_row]['nompro_'] = $this->nompro_;
                  }
                  if (isset($this->NM_ajax_changed['cod_cuenta_']) && $this->NM_ajax_changed['cod_cuenta_'])
                  {
                      $this->form_vert_form_productos_fast_gcontable[$this->nmgp_refresh_row]['cod_cuenta_'] = $this->cod_cuenta_;
                  }
              }
          }
          if (isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_productos_fast_gcontable[$this->nmgp_refresh_row]['codigobar_'] = $this->codigobar_;
              $this->form_vert_form_productos_fast_gcontable[$this->nmgp_refresh_row]['nompro_'] = $this->nompro_;
              $this->form_vert_form_productos_fast_gcontable[$this->nmgp_refresh_row]['cod_cuenta_'] = $this->cod_cuenta_;
          }
          $this->NM_ajax_info['rsSize']            = sizeof($this->form_vert_form_productos_fast_gcontable);
          $this->NM_ajax_info['buttonDisplayVert'] = array();
          foreach($this->form_vert_form_productos_fast_gcontable as $sc_seq_vert => $aRecData)
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
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("codigobar_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['codigobar_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['codigobar_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nompro_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['nompro_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['nompro_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cod_cuenta_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['cod_cuenta_']);
                  $this->cod_cuenta_ = $sTmpValue;
                  $this->nm_clear_val('cod_cuenta_');
                  $sTmpValue = $this->cod_cuenta_;
                  $aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['Lookup_cod_cuenta_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['Lookup_cod_cuenta_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['Lookup_cod_cuenta_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['Lookup_cod_cuenta_'] = array(); 
    }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + descripcion FROM grupos_contables WHERE codigo = '" . $aRecData['cod_cuenta_'] . "' ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ',descripcion) FROM grupos_contables WHERE codigo = '" . $aRecData['cod_cuenta_'] . "' ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&descripcion FROM grupos_contables WHERE codigo = '" . $aRecData['cod_cuenta_'] . "' ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||descripcion FROM grupos_contables WHERE codigo = '" . $aRecData['cod_cuenta_'] . "' ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + descripcion FROM grupos_contables WHERE codigo = '" . $aRecData['cod_cuenta_'] . "' ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||descripcion FROM grupos_contables WHERE codigo = '" . $aRecData['cod_cuenta_'] . "' ORDER BY codigo, descripcion";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||descripcion FROM grupos_contables WHERE codigo = '" . $aRecData['cod_cuenta_'] . "' ORDER BY codigo, descripcion";
   }
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_productos_fast_gcontable_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_productos_fast_gcontable_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['Lookup_cod_cuenta_'][] = $rs->fields[0];
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
                  $this->NM_ajax_info['fldList']['cod_cuenta_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select2_ac',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['cod_cuenta_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['cod_cuenta_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['cod_cuenta_' . $sc_seq_vert]['labList'] = $aLabel;
          $this->NM_ajax_info['fldList']['cod_cuenta_' . $sc_seq_vert . '_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($aLookup[0][form_productos_fast_gcontable_pack_protect_string($aRecData['cod_cuenta_'])]),
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['upload_dir'][$fieldName][] = $newName;
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
          $_SESSION['scriptcase']['form_productos_fast_gcontable']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_codigobar_ = $this->codigobar_;
    $original_nompro_ = $this->nompro_;
}
 if($this->codigobar_ =='00' or $this->codigobar_ =='01')
{

	$this->sc_field_readonly("codigobar_", 'on', (isset($sc_seq_vert) ? $sc_seq_vert : ''));
	$this->sc_field_readonly("nompro_", 'on', (isset($sc_seq_vert) ? $sc_seq_vert : ''));
}
else
{
	$this->sc_field_readonly("codigobar_", 'off', (isset($sc_seq_vert) ? $sc_seq_vert : ''));
	$this->sc_field_readonly("nompro_", 'off', (isset($sc_seq_vert) ? $sc_seq_vert : ''));
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_codigobar_ != $this->codigobar_ || (isset($bFlagRead_codigobar_) && $bFlagRead_codigobar_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['codigobar_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['codigobar_' . $this->nmgp_refresh_row]['valList'] = array($this->codigobar_);
        $this->NM_ajax_changed['codigobar_'] = true;
    }
    if (($original_nompro_ != $this->nompro_ || (isset($bFlagRead_nompro_) && $bFlagRead_nompro_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['nompro_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['nompro_' . $this->nmgp_refresh_row]['valList'] = array($this->nompro_);
        $this->NM_ajax_changed['nompro_'] = true;
    }
}
$_SESSION['scriptcase']['form_productos_fast_gcontable']['contr_erro'] = 'off'; 
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
      $this->costomen_ = str_replace($sc_parm1, $sc_parm2, $this->costomen_); 
      $this->recmayamen_ = str_replace($sc_parm1, $sc_parm2, $this->recmayamen_); 
      $this->stockmay_ = str_replace($sc_parm1, $sc_parm2, $this->stockmay_); 
      $this->stockmen_ = str_replace($sc_parm1, $sc_parm2, $this->stockmen_); 
      $this->por_preciominimo_ = str_replace($sc_parm1, $sc_parm2, $this->por_preciominimo_); 
      $this->existencia_ = str_replace($sc_parm1, $sc_parm2, $this->existencia_); 
      $this->costo_prom_ = str_replace($sc_parm1, $sc_parm2, $this->costo_prom_); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->costomen_ = "'" . $this->costomen_ . "'";
      $this->recmayamen_ = "'" . $this->recmayamen_ . "'";
      $this->stockmay_ = "'" . $this->stockmay_ . "'";
      $this->stockmen_ = "'" . $this->stockmen_ . "'";
      $this->por_preciominimo_ = "'" . $this->por_preciominimo_ . "'";
      $this->existencia_ = "'" . $this->existencia_ . "'";
      $this->costo_prom_ = "'" . $this->costo_prom_ . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->costomen_ = str_replace("'", "", $this->costomen_); 
      $this->recmayamen_ = str_replace("'", "", $this->recmayamen_); 
      $this->stockmay_ = str_replace("'", "", $this->stockmay_); 
      $this->stockmen_ = str_replace("'", "", $this->stockmen_); 
      $this->por_preciominimo_ = str_replace("'", "", $this->por_preciominimo_); 
      $this->existencia_ = str_replace("'", "", $this->existencia_); 
      $this->costo_prom_ = str_replace("'", "", $this->costo_prom_); 
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
          $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dados_select'][$sc_seq_vert];
          if ($this->nmgp_dados_select['codigobar_'] == $this->codigobar_ &&
              $this->nmgp_dados_select['nompro_'] == $this->nompro_ &&
              $this->nmgp_dados_select['cod_cuenta_'] == $this->cod_cuenta_)
          { }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dados_select'][$sc_seq_vert]['codigobar_'] = $this->codigobar_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dados_select'][$sc_seq_vert]['nompro_'] = $this->nompro_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dados_select'][$sc_seq_vert]['cod_cuenta_'] = $this->cod_cuenta_;
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
      $NM_val_form['codigobar_'] = $this->codigobar_;
      $NM_val_form['nompro_'] = $this->nompro_;
      $NM_val_form['cod_cuenta_'] = $this->cod_cuenta_;
      $NM_val_form['idprod_'] = $this->idprod_;
      $NM_val_form['codigoprod_'] = $this->codigoprod_;
      $NM_val_form['unidmaymen_'] = $this->unidmaymen_;
      $NM_val_form['unimay_'] = $this->unimay_;
      $NM_val_form['unimen_'] = $this->unimen_;
      $NM_val_form['costomay_'] = $this->costomay_;
      $NM_val_form['costomen_'] = $this->costomen_;
      $NM_val_form['recmayamen_'] = $this->recmayamen_;
      $NM_val_form['preciomen_'] = $this->preciomen_;
      $NM_val_form['preciomen2_'] = $this->preciomen2_;
      $NM_val_form['preciomen3_'] = $this->preciomen3_;
      $NM_val_form['precio2_'] = $this->precio2_;
      $NM_val_form['preciomay_'] = $this->preciomay_;
      $NM_val_form['preciofull_'] = $this->preciofull_;
      $NM_val_form['stockmay_'] = $this->stockmay_;
      $NM_val_form['stockmen_'] = $this->stockmen_;
      $NM_val_form['idgrup_'] = $this->idgrup_;
      $NM_val_form['idpro1_'] = $this->idpro1_;
      $NM_val_form['idpro2_'] = $this->idpro2_;
      $NM_val_form['idiva_'] = $this->idiva_;
      $NM_val_form['otro_'] = $this->otro_;
      $NM_val_form['otro2_'] = $this->otro2_;
      $NM_val_form['colores_'] = $this->colores_;
      $NM_val_form['tallas_'] = $this->tallas_;
      $NM_val_form['sabores_'] = $this->sabores_;
      $NM_val_form['imagenprod_'] = $this->imagenprod_;
      $NM_val_form['imconsumo_'] = $this->imconsumo_;
      $NM_val_form['escombo_'] = $this->escombo_;
      $NM_val_form['idcombo_'] = $this->idcombo_;
      $NM_val_form['precio_editable_'] = $this->precio_editable_;
      $NM_val_form['fecha_vencimiento_'] = $this->fecha_vencimiento_;
      $NM_val_form['fecha_fab_'] = $this->fecha_fab_;
      $NM_val_form['lote_'] = $this->lote_;
      $NM_val_form['serial_codbarras_'] = $this->serial_codbarras_;
      $NM_val_form['maneja_tcs_lfs_'] = $this->maneja_tcs_lfs_;
      $NM_val_form['control_costo_'] = $this->control_costo_;
      $NM_val_form['por_preciominimo_'] = $this->por_preciominimo_;
      $NM_val_form['id_marca_'] = $this->id_marca_;
      $NM_val_form['id_linea_'] = $this->id_linea_;
      $NM_val_form['ultima_compra_'] = $this->ultima_compra_;
      $NM_val_form['n_ultcompra_'] = $this->n_ultcompra_;
      $NM_val_form['ultima_venta_'] = $this->ultima_venta_;
      $NM_val_form['n_ultventa_'] = $this->n_ultventa_;
      $NM_val_form['codigobar2_'] = $this->codigobar2_;
      $NM_val_form['codigobar3_'] = $this->codigobar3_;
      $NM_val_form['nube_'] = $this->nube_;
      $NM_val_form['existencia_'] = $this->existencia_;
      $NM_val_form['multiple_escala_'] = $this->multiple_escala_;
      $NM_val_form['en_base_a_'] = $this->en_base_a_;
      $NM_val_form['activo_'] = $this->activo_;
      $NM_val_form['tipo_producto_'] = $this->tipo_producto_;
      $NM_val_form['costo_prom_'] = $this->costo_prom_;
      if ($this->idprod_ === "" || is_null($this->idprod_))  
      { 
          $this->idprod_ = 0;
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->costomay_ === "" || is_null($this->costomay_))  
      { 
          $this->costomay_ = 0;
          $this->sc_force_zero[] = 'costomay_';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->costomen_ === "" || is_null($this->costomen_))  
      { 
          $this->costomen_ = 0;
          $this->sc_force_zero[] = 'costomen_';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->recmayamen_ === "" || is_null($this->recmayamen_))  
      { 
          $this->recmayamen_ = 0;
          $this->sc_force_zero[] = 'recmayamen_';
      } 
      }
      if ($this->preciomen_ === "" || is_null($this->preciomen_))  
      { 
          $this->preciomen_ = 0;
          $this->sc_force_zero[] = 'preciomen_';
      } 
      if ($this->preciomen2_ === "" || is_null($this->preciomen2_))  
      { 
          $this->preciomen2_ = 0;
          $this->sc_force_zero[] = 'preciomen2_';
      } 
      if ($this->preciomen3_ === "" || is_null($this->preciomen3_))  
      { 
          $this->preciomen3_ = 0;
          $this->sc_force_zero[] = 'preciomen3_';
      } 
      if ($this->precio2_ === "" || is_null($this->precio2_))  
      { 
          $this->precio2_ = 0;
          $this->sc_force_zero[] = 'precio2_';
      } 
      if ($this->preciomay_ === "" || is_null($this->preciomay_))  
      { 
          $this->preciomay_ = 0;
          $this->sc_force_zero[] = 'preciomay_';
      } 
      if ($this->preciofull_ === "" || is_null($this->preciofull_))  
      { 
          $this->preciofull_ = 0;
          $this->sc_force_zero[] = 'preciofull_';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->stockmay_ === "" || is_null($this->stockmay_))  
      { 
          $this->stockmay_ = 0;
          $this->sc_force_zero[] = 'stockmay_';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->stockmen_ === "" || is_null($this->stockmen_))  
      { 
          $this->stockmen_ = 0;
          $this->sc_force_zero[] = 'stockmen_';
      } 
      }
      if ($this->idgrup_ === "" || is_null($this->idgrup_))  
      { 
          $this->idgrup_ = 0;
          $this->sc_force_zero[] = 'idgrup_';
      } 
      if ($this->idpro1_ === "" || is_null($this->idpro1_))  
      { 
          $this->idpro1_ = 0;
          $this->sc_force_zero[] = 'idpro1_';
      } 
      if ($this->idpro2_ === "" || is_null($this->idpro2_))  
      { 
          $this->idpro2_ = 0;
          $this->sc_force_zero[] = 'idpro2_';
      } 
      if ($this->idiva_ === "" || is_null($this->idiva_))  
      { 
          $this->idiva_ = 0;
          $this->sc_force_zero[] = 'idiva_';
      } 
      if ($this->otro_ === "" || is_null($this->otro_))  
      { 
          $this->otro_ = 0;
          $this->sc_force_zero[] = 'otro_';
      } 
      if ($this->otro2_ === "" || is_null($this->otro2_))  
      { 
          $this->otro2_ = 0;
          $this->sc_force_zero[] = 'otro2_';
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
      if ($this->imconsumo_ === "" || is_null($this->imconsumo_))  
      { 
          $this->imconsumo_ = 0;
          $this->sc_force_zero[] = 'imconsumo_';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->idcombo_ === "" || is_null($this->idcombo_))  
      { 
          $this->idcombo_ = 0;
          $this->sc_force_zero[] = 'idcombo_';
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
      if ($this->por_preciominimo_ === "" || is_null($this->por_preciominimo_))  
      { 
          $this->por_preciominimo_ = 0;
          $this->sc_force_zero[] = 'por_preciominimo_';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->id_marca_ === "" || is_null($this->id_marca_))  
      { 
          $this->id_marca_ = 0;
          $this->sc_force_zero[] = 'id_marca_';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->id_linea_ === "" || is_null($this->id_linea_))  
      { 
          $this->id_linea_ = 0;
          $this->sc_force_zero[] = 'id_linea_';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->existencia_ === "" || is_null($this->existencia_))  
      { 
          $this->existencia_ = 0;
          $this->sc_force_zero[] = 'existencia_';
      } 
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
      if ($this->costo_prom_ === "" || is_null($this->costo_prom_))  
      { 
          $this->costo_prom_ = 0;
          $this->sc_force_zero[] = 'costo_prom_';
      } 
      }
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->codigobar__before_qstr = $this->codigobar_;
          $this->codigobar_ = substr($this->Db->qstr($this->codigobar_), 1, -1); 
          if ($this->codigobar_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codigobar_ = "null"; 
              $NM_val_null[] = "codigobar_";
          } 
          $this->codigoprod__before_qstr = $this->codigoprod_;
          $this->codigoprod_ = substr($this->Db->qstr($this->codigoprod_), 1, -1); 
          if ($this->codigoprod_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codigoprod_ = "null"; 
              $NM_val_null[] = "codigoprod_";
          } 
          $this->nompro__before_qstr = $this->nompro_;
          $this->nompro_ = substr($this->Db->qstr($this->nompro_), 1, -1); 
          if ($this->nompro_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nompro_ = "null"; 
              $NM_val_null[] = "nompro_";
          } 
          $this->unidmaymen__before_qstr = $this->unidmaymen_;
          $this->unidmaymen_ = substr($this->Db->qstr($this->unidmaymen_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->unidmaymen_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->unidmaymen_ = "null"; 
                  $NM_val_null[] = "unidmaymen_";
              } 
          }
          $this->unimay__before_qstr = $this->unimay_;
          $this->unimay_ = substr($this->Db->qstr($this->unimay_), 1, -1); 
          if ($this->unimay_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->unimay_ = "null"; 
              $NM_val_null[] = "unimay_";
          } 
          $this->unimen__before_qstr = $this->unimen_;
          $this->unimen_ = substr($this->Db->qstr($this->unimen_), 1, -1); 
          if ($this->unimen_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->unimen_ = "null"; 
              $NM_val_null[] = "unimen_";
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
          $this->colores__before_qstr = $this->colores_;
          $this->colores_ = substr($this->Db->qstr($this->colores_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->colores_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->colores_ = "null"; 
                  $NM_val_null[] = "colores_";
              } 
          }
          $this->tallas__before_qstr = $this->tallas_;
          $this->tallas_ = substr($this->Db->qstr($this->tallas_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->tallas_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->tallas_ = "null"; 
                  $NM_val_null[] = "tallas_";
              } 
          }
          $this->sabores__before_qstr = $this->sabores_;
          $this->sabores_ = substr($this->Db->qstr($this->sabores_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->sabores_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->sabores_ = "null"; 
                  $NM_val_null[] = "sabores_";
              } 
          }
          if ($this->imagenprod_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->imagenprod_ = "null"; 
              $NM_val_null[] = "imagenprod_";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->escombo__before_qstr = $this->escombo_;
          $this->escombo_ = substr($this->Db->qstr($this->escombo_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->escombo_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->escombo_ = "null"; 
                  $NM_val_null[] = "escombo_";
              } 
          }
          $this->precio_editable__before_qstr = $this->precio_editable_;
          $this->precio_editable_ = substr($this->Db->qstr($this->precio_editable_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->precio_editable_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->precio_editable_ = "null"; 
                  $NM_val_null[] = "precio_editable_";
              } 
          }
          $this->cod_cuenta__before_qstr = $this->cod_cuenta_;
          $this->cod_cuenta_ = substr($this->Db->qstr($this->cod_cuenta_), 1, -1); 
          if ($this->cod_cuenta_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cod_cuenta_ = "null"; 
              $NM_val_null[] = "cod_cuenta_";
          } 
          $this->fecha_vencimiento__before_qstr = $this->fecha_vencimiento_;
          $this->fecha_vencimiento_ = substr($this->Db->qstr($this->fecha_vencimiento_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->fecha_vencimiento_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->fecha_vencimiento_ = "null"; 
                  $NM_val_null[] = "fecha_vencimiento_";
              } 
          }
          $this->fecha_fab__before_qstr = $this->fecha_fab_;
          $this->fecha_fab_ = substr($this->Db->qstr($this->fecha_fab_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->fecha_fab_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->fecha_fab_ = "null"; 
                  $NM_val_null[] = "fecha_fab_";
              } 
          }
          $this->lote__before_qstr = $this->lote_;
          $this->lote_ = substr($this->Db->qstr($this->lote_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->lote_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->lote_ = "null"; 
                  $NM_val_null[] = "lote_";
              } 
          }
          $this->serial_codbarras__before_qstr = $this->serial_codbarras_;
          $this->serial_codbarras_ = substr($this->Db->qstr($this->serial_codbarras_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->serial_codbarras_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->serial_codbarras_ = "null"; 
                  $NM_val_null[] = "serial_codbarras_";
              } 
          }
          $this->maneja_tcs_lfs__before_qstr = $this->maneja_tcs_lfs_;
          $this->maneja_tcs_lfs_ = substr($this->Db->qstr($this->maneja_tcs_lfs_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->maneja_tcs_lfs_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->maneja_tcs_lfs_ = "null"; 
                  $NM_val_null[] = "maneja_tcs_lfs_";
              } 
          }
          $this->control_costo__before_qstr = $this->control_costo_;
          $this->control_costo_ = substr($this->Db->qstr($this->control_costo_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->control_costo_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->control_costo_ = "null"; 
                  $NM_val_null[] = "control_costo_";
              } 
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
          if ($this->ultima_compra_ == "")  
          { 
              $this->ultima_compra_ = "null"; 
              $NM_val_null[] = "ultima_compra_";
          } 
          $this->n_ultcompra__before_qstr = $this->n_ultcompra_;
          $this->n_ultcompra_ = substr($this->Db->qstr($this->n_ultcompra_), 1, -1); 
          if ($this->n_ultcompra_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->n_ultcompra_ = "null"; 
              $NM_val_null[] = "n_ultcompra_";
          } 
          if ($this->ultima_venta_ == "")  
          { 
              $this->ultima_venta_ = "null"; 
              $NM_val_null[] = "ultima_venta_";
          } 
          $this->n_ultventa__before_qstr = $this->n_ultventa_;
          $this->n_ultventa_ = substr($this->Db->qstr($this->n_ultventa_), 1, -1); 
          if ($this->n_ultventa_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->n_ultventa_ = "null"; 
              $NM_val_null[] = "n_ultventa_";
          } 
          $this->codigobar2__before_qstr = $this->codigobar2_;
          $this->codigobar2_ = substr($this->Db->qstr($this->codigobar2_), 1, -1); 
          if ($this->codigobar2_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codigobar2_ = "null"; 
              $NM_val_null[] = "codigobar2_";
          } 
          $this->codigobar3__before_qstr = $this->codigobar3_;
          $this->codigobar3_ = substr($this->Db->qstr($this->codigobar3_), 1, -1); 
          if ($this->codigobar3_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codigobar3_ = "null"; 
              $NM_val_null[] = "codigobar3_";
          } 
          $this->nube__before_qstr = $this->nube_;
          $this->nube_ = substr($this->Db->qstr($this->nube_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->nube_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->nube_ = "null"; 
                  $NM_val_null[] = "nube_";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->multiple_escala__before_qstr = $this->multiple_escala_;
          $this->multiple_escala_ = substr($this->Db->qstr($this->multiple_escala_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->multiple_escala_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->multiple_escala_ = "null"; 
                  $NM_val_null[] = "multiple_escala_";
              } 
          }
          $this->en_base_a__before_qstr = $this->en_base_a_;
          $this->en_base_a_ = substr($this->Db->qstr($this->en_base_a_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->en_base_a_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->en_base_a_ = "null"; 
                  $NM_val_null[] = "en_base_a_";
              } 
          }
          $this->activo__before_qstr = $this->activo_;
          $this->activo_ = substr($this->Db->qstr($this->activo_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->activo_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->activo_ = "null"; 
                  $NM_val_null[] = "activo_";
              } 
          }
          $this->tipo_producto__before_qstr = $this->tipo_producto_;
          $this->tipo_producto_ = substr($this->Db->qstr($this->tipo_producto_), 1, -1); 
          if ($this->tipo_producto_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo_producto_ = "null"; 
              $NM_val_null[] = "tipo_producto_";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_productos_fast_gcontable_pack_ajax_response();
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
              $Cmd_Unique = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where (codigobar = '" . $this->codigobar_ . "') AND (idprod <> $this->idprod_)";
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
                          form_productos_fast_gcontable_pack_ajax_response();
                      }
                      exit;
                  }
              }
              elseif (0 < $rsUni->fields[0])
              {
                  $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_ukey']; 
                  $this->nmgp_opcao = "nada"; 
                  $aUpdateOk[] = 'codigobar';
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
                  $SC_fields_update[] = "codigobar = '$this->codigobar_', nompro = '$this->nompro_', cod_cuenta = '$this->cod_cuenta_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "codigobar = '$this->codigobar_', nompro = '$this->nompro_', cod_cuenta = '$this->cod_cuenta_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "codigobar = '$this->codigobar_', nompro = '$this->nompro_', cod_cuenta = '$this->cod_cuenta_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "codigobar = '$this->codigobar_', nompro = '$this->nompro_', cod_cuenta = '$this->cod_cuenta_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "codigobar = '$this->codigobar_', nompro = '$this->nompro_', cod_cuenta = '$this->cod_cuenta_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "codigobar = '$this->codigobar_', nompro = '$this->nompro_', cod_cuenta = '$this->cod_cuenta_'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "codigobar = '$this->codigobar_', nompro = '$this->nompro_', cod_cuenta = '$this->cod_cuenta_'"; 
              } 
              if (isset($NM_val_form['codigoprod_']) && $NM_val_form['codigoprod_'] != $this->nmgp_dados_select['codigoprod_']) 
              { 
                  $SC_fields_update[] = "codigoprod = '$this->codigoprod_'"; 
              } 
              if (isset($NM_val_form['unidmaymen_']) && $NM_val_form['unidmaymen_'] != $this->nmgp_dados_select['unidmaymen_']) 
              { 
                  $SC_fields_update[] = "unidmaymen = '$this->unidmaymen_'"; 
              } 
              if (isset($NM_val_form['unimay_']) && $NM_val_form['unimay_'] != $this->nmgp_dados_select['unimay_']) 
              { 
                  $SC_fields_update[] = "unimay = '$this->unimay_'"; 
              } 
              if (isset($NM_val_form['unimen_']) && $NM_val_form['unimen_'] != $this->nmgp_dados_select['unimen_']) 
              { 
                  $SC_fields_update[] = "unimen = '$this->unimen_'"; 
              } 
              if (isset($NM_val_form['costomay_']) && $NM_val_form['costomay_'] != $this->nmgp_dados_select['costomay_']) 
              { 
                  $SC_fields_update[] = "costomay = $this->costomay_"; 
              } 
              if (isset($NM_val_form['costomen_']) && $NM_val_form['costomen_'] != $this->nmgp_dados_select['costomen_']) 
              { 
                  $SC_fields_update[] = "costomen = $this->costomen_"; 
              } 
              if (isset($NM_val_form['recmayamen_']) && $NM_val_form['recmayamen_'] != $this->nmgp_dados_select['recmayamen_']) 
              { 
                  $SC_fields_update[] = "recmayamen = $this->recmayamen_"; 
              } 
              if (isset($NM_val_form['preciomen_']) && $NM_val_form['preciomen_'] != $this->nmgp_dados_select['preciomen_']) 
              { 
                  $SC_fields_update[] = "preciomen = $this->preciomen_"; 
              } 
              if (isset($NM_val_form['preciomen2_']) && $NM_val_form['preciomen2_'] != $this->nmgp_dados_select['preciomen2_']) 
              { 
                  $SC_fields_update[] = "preciomen2 = $this->preciomen2_"; 
              } 
              if (isset($NM_val_form['preciomen3_']) && $NM_val_form['preciomen3_'] != $this->nmgp_dados_select['preciomen3_']) 
              { 
                  $SC_fields_update[] = "preciomen3 = $this->preciomen3_"; 
              } 
              if (isset($NM_val_form['precio2_']) && $NM_val_form['precio2_'] != $this->nmgp_dados_select['precio2_']) 
              { 
                  $SC_fields_update[] = "precio2 = $this->precio2_"; 
              } 
              if (isset($NM_val_form['preciomay_']) && $NM_val_form['preciomay_'] != $this->nmgp_dados_select['preciomay_']) 
              { 
                  $SC_fields_update[] = "preciomay = $this->preciomay_"; 
              } 
              if (isset($NM_val_form['preciofull_']) && $NM_val_form['preciofull_'] != $this->nmgp_dados_select['preciofull_']) 
              { 
                  $SC_fields_update[] = "preciofull = $this->preciofull_"; 
              } 
              if (isset($NM_val_form['stockmay_']) && $NM_val_form['stockmay_'] != $this->nmgp_dados_select['stockmay_']) 
              { 
                  $SC_fields_update[] = "stockmay = $this->stockmay_"; 
              } 
              if (isset($NM_val_form['stockmen_']) && $NM_val_form['stockmen_'] != $this->nmgp_dados_select['stockmen_']) 
              { 
                  $SC_fields_update[] = "stockmen = $this->stockmen_"; 
              } 
              if (isset($NM_val_form['idgrup_']) && $NM_val_form['idgrup_'] != $this->nmgp_dados_select['idgrup_']) 
              { 
                  $SC_fields_update[] = "idgrup = $this->idgrup_"; 
              } 
              if (isset($NM_val_form['idpro1_']) && $NM_val_form['idpro1_'] != $this->nmgp_dados_select['idpro1_']) 
              { 
                  $SC_fields_update[] = "idpro1 = $this->idpro1_"; 
              } 
              if (isset($NM_val_form['idpro2_']) && $NM_val_form['idpro2_'] != $this->nmgp_dados_select['idpro2_']) 
              { 
                  $SC_fields_update[] = "idpro2 = $this->idpro2_"; 
              } 
              if (isset($NM_val_form['idiva_']) && $NM_val_form['idiva_'] != $this->nmgp_dados_select['idiva_']) 
              { 
                  $SC_fields_update[] = "idiva = $this->idiva_"; 
              } 
              if (isset($NM_val_form['otro_']) && $NM_val_form['otro_'] != $this->nmgp_dados_select['otro_']) 
              { 
                  $SC_fields_update[] = "otro = $this->otro_"; 
              } 
              if (isset($NM_val_form['otro2_']) && $NM_val_form['otro2_'] != $this->nmgp_dados_select['otro2_']) 
              { 
                  $SC_fields_update[] = "otro2 = $this->otro2_"; 
              } 
              if (isset($NM_val_form['colores_']) && $NM_val_form['colores_'] != $this->nmgp_dados_select['colores_']) 
              { 
                  $SC_fields_update[] = "colores = '$this->colores_'"; 
              } 
              if (isset($NM_val_form['tallas_']) && $NM_val_form['tallas_'] != $this->nmgp_dados_select['tallas_']) 
              { 
                  $SC_fields_update[] = "tallas = '$this->tallas_'"; 
              } 
              if (isset($NM_val_form['sabores_']) && $NM_val_form['sabores_'] != $this->nmgp_dados_select['sabores_']) 
              { 
                  $SC_fields_update[] = "sabores = '$this->sabores_'"; 
              } 
              if (isset($NM_val_form['imconsumo_']) && $NM_val_form['imconsumo_'] != $this->nmgp_dados_select['imconsumo_']) 
              { 
                  $SC_fields_update[] = "imconsumo = $this->imconsumo_"; 
              } 
              if (isset($NM_val_form['escombo_']) && $NM_val_form['escombo_'] != $this->nmgp_dados_select['escombo_']) 
              { 
                  $SC_fields_update[] = "escombo = '$this->escombo_'"; 
              } 
              if (isset($NM_val_form['idcombo_']) && $NM_val_form['idcombo_'] != $this->nmgp_dados_select['idcombo_']) 
              { 
                  $SC_fields_update[] = "idcombo = $this->idcombo_"; 
              } 
              if (isset($NM_val_form['precio_editable_']) && $NM_val_form['precio_editable_'] != $this->nmgp_dados_select['precio_editable_']) 
              { 
                  $SC_fields_update[] = "precio_editable = '$this->precio_editable_'"; 
              } 
              if (isset($NM_val_form['fecha_vencimiento_']) && $NM_val_form['fecha_vencimiento_'] != $this->nmgp_dados_select['fecha_vencimiento_']) 
              { 
                  $SC_fields_update[] = "fecha_vencimiento = '$this->fecha_vencimiento_'"; 
              } 
              if (isset($NM_val_form['fecha_fab_']) && $NM_val_form['fecha_fab_'] != $this->nmgp_dados_select['fecha_fab_']) 
              { 
                  $SC_fields_update[] = "fecha_fab = '$this->fecha_fab_'"; 
              } 
              if (isset($NM_val_form['lote_']) && $NM_val_form['lote_'] != $this->nmgp_dados_select['lote_']) 
              { 
                  $SC_fields_update[] = "lote = '$this->lote_'"; 
              } 
              if (isset($NM_val_form['serial_codbarras_']) && $NM_val_form['serial_codbarras_'] != $this->nmgp_dados_select['serial_codbarras_']) 
              { 
                  $SC_fields_update[] = "serial_codbarras = '$this->serial_codbarras_'"; 
              } 
              if (isset($NM_val_form['maneja_tcs_lfs_']) && $NM_val_form['maneja_tcs_lfs_'] != $this->nmgp_dados_select['maneja_tcs_lfs_']) 
              { 
                  $SC_fields_update[] = "maneja_tcs_lfs = '$this->maneja_tcs_lfs_'"; 
              } 
              if (isset($NM_val_form['control_costo_']) && $NM_val_form['control_costo_'] != $this->nmgp_dados_select['control_costo_']) 
              { 
                  $SC_fields_update[] = "control_costo = '$this->control_costo_'"; 
              } 
              if (isset($NM_val_form['por_preciominimo_']) && $NM_val_form['por_preciominimo_'] != $this->nmgp_dados_select['por_preciominimo_']) 
              { 
                  $SC_fields_update[] = "por_preciominimo = $this->por_preciominimo_"; 
              } 
              if (isset($NM_val_form['id_marca_']) && $NM_val_form['id_marca_'] != $this->nmgp_dados_select['id_marca_']) 
              { 
                  $SC_fields_update[] = "id_marca = $this->id_marca_"; 
              } 
              if (isset($NM_val_form['id_linea_']) && $NM_val_form['id_linea_'] != $this->nmgp_dados_select['id_linea_']) 
              { 
                  $SC_fields_update[] = "id_linea = $this->id_linea_"; 
              } 
              if (isset($NM_val_form['ultima_compra_']) && $NM_val_form['ultima_compra_'] != $this->nmgp_dados_select['ultima_compra_']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "ultima_compra = #$this->ultima_compra_#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "ultima_compra = EXTEND('" . $this->ultima_compra_ . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "ultima_compra = " . $this->Ini->date_delim . $this->ultima_compra_ . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['n_ultcompra_']) && $NM_val_form['n_ultcompra_'] != $this->nmgp_dados_select['n_ultcompra_']) 
              { 
                  $SC_fields_update[] = "n_ultcompra = '$this->n_ultcompra_'"; 
              } 
              if (isset($NM_val_form['ultima_venta_']) && $NM_val_form['ultima_venta_'] != $this->nmgp_dados_select['ultima_venta_']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "ultima_venta = #$this->ultima_venta_#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "ultima_venta = EXTEND('" . $this->ultima_venta_ . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "ultima_venta = " . $this->Ini->date_delim . $this->ultima_venta_ . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['n_ultventa_']) && $NM_val_form['n_ultventa_'] != $this->nmgp_dados_select['n_ultventa_']) 
              { 
                  $SC_fields_update[] = "n_ultventa = '$this->n_ultventa_'"; 
              } 
              if (isset($NM_val_form['codigobar2_']) && $NM_val_form['codigobar2_'] != $this->nmgp_dados_select['codigobar2_']) 
              { 
                  $SC_fields_update[] = "codigobar2 = '$this->codigobar2_'"; 
              } 
              if (isset($NM_val_form['codigobar3_']) && $NM_val_form['codigobar3_'] != $this->nmgp_dados_select['codigobar3_']) 
              { 
                  $SC_fields_update[] = "codigobar3 = '$this->codigobar3_'"; 
              } 
              if (isset($NM_val_form['nube_']) && $NM_val_form['nube_'] != $this->nmgp_dados_select['nube_']) 
              { 
                  $SC_fields_update[] = "nube = '$this->nube_'"; 
              } 
              if (isset($NM_val_form['existencia_']) && $NM_val_form['existencia_'] != $this->nmgp_dados_select['existencia_']) 
              { 
                  $SC_fields_update[] = "existencia = $this->existencia_"; 
              } 
              if (isset($NM_val_form['multiple_escala_']) && $NM_val_form['multiple_escala_'] != $this->nmgp_dados_select['multiple_escala_']) 
              { 
                  $SC_fields_update[] = "multiple_escala = '$this->multiple_escala_'"; 
              } 
              if (isset($NM_val_form['en_base_a_']) && $NM_val_form['en_base_a_'] != $this->nmgp_dados_select['en_base_a_']) 
              { 
                  $SC_fields_update[] = "en_base_a = '$this->en_base_a_'"; 
              } 
              if (isset($NM_val_form['activo_']) && $NM_val_form['activo_'] != $this->nmgp_dados_select['activo_']) 
              { 
                  $SC_fields_update[] = "activo = '$this->activo_'"; 
              } 
              if (isset($NM_val_form['tipo_producto_']) && $NM_val_form['tipo_producto_'] != $this->nmgp_dados_select['tipo_producto_']) 
              { 
                  $SC_fields_update[] = "tipo_producto = '$this->tipo_producto_'"; 
              } 
              if (isset($NM_val_form['costo_prom_']) && $NM_val_form['costo_prom_'] != $this->nmgp_dados_select['costo_prom_']) 
              { 
                  $SC_fields_update[] = "costo_prom = $this->costo_prom_"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE idprod = $this->idprod_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE idprod = $this->idprod_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE idprod = $this->idprod_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE idprod = $this->idprod_ ";  
              }  
              else  
              {
                  $comando .= " WHERE idprod = $this->idprod_ ";  
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
                                  form_productos_fast_gcontable_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->codigobar_ = $this->codigobar__before_qstr;
              $this->codigoprod_ = $this->codigoprod__before_qstr;
              $this->nompro_ = $this->nompro__before_qstr;
              $this->unidmaymen_ = $this->unidmaymen__before_qstr;
              $this->unimay_ = $this->unimay__before_qstr;
              $this->unimen_ = $this->unimen__before_qstr;
              $this->colores_ = $this->colores__before_qstr;
              $this->tallas_ = $this->tallas__before_qstr;
              $this->sabores_ = $this->sabores__before_qstr;
              $this->escombo_ = $this->escombo__before_qstr;
              $this->precio_editable_ = $this->precio_editable__before_qstr;
              $this->cod_cuenta_ = $this->cod_cuenta__before_qstr;
              $this->fecha_vencimiento_ = $this->fecha_vencimiento__before_qstr;
              $this->fecha_fab_ = $this->fecha_fab__before_qstr;
              $this->lote_ = $this->lote__before_qstr;
              $this->serial_codbarras_ = $this->serial_codbarras__before_qstr;
              $this->maneja_tcs_lfs_ = $this->maneja_tcs_lfs__before_qstr;
              $this->control_costo_ = $this->control_costo__before_qstr;
              $this->n_ultcompra_ = $this->n_ultcompra__before_qstr;
              $this->n_ultventa_ = $this->n_ultventa__before_qstr;
              $this->codigobar2_ = $this->codigobar2__before_qstr;
              $this->codigobar3_ = $this->codigobar3__before_qstr;
              $this->nube_ = $this->nube__before_qstr;
              $this->multiple_escala_ = $this->multiple_escala__before_qstr;
              $this->en_base_a_ = $this->en_base_a__before_qstr;
              $this->activo_ = $this->activo__before_qstr;
              $this->tipo_producto_ = $this->tipo_producto__before_qstr;
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }

              $this->sc_teve_alt = true; 
              if     (isset($NM_val_form) && isset($NM_val_form['codigobar_'])) { $this->codigobar_ = $NM_val_form['codigobar_']; }
              elseif (isset($this->codigobar_)) { $this->nm_limpa_alfa($this->codigobar_); }
              if     (isset($NM_val_form) && isset($NM_val_form['nompro_'])) { $this->nompro_ = $NM_val_form['nompro_']; }
              elseif (isset($this->nompro_)) { $this->nm_limpa_alfa($this->nompro_); }
              if     (isset($NM_val_form) && isset($NM_val_form['cod_cuenta_'])) { $this->cod_cuenta_ = $NM_val_form['cod_cuenta_']; }
              elseif (isset($this->cod_cuenta_)) { $this->nm_limpa_alfa($this->cod_cuenta_); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('codigobar_', 'nompro_', 'cod_cuenta_'), $aDoNotUpdate);
              $this->nmgp_refresh_fields = $aOldRefresh;

              if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
              {

                  $this->NM_ajax_info['readOnly']['codigobar_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['nompro_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['cod_cuenta_' . $this->nmgp_refresh_row] = 'on';


                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "idprod, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
              $Cmd_Unique = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where codigobar = '" . $this->codigobar_ . "'";
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
                          form_productos_fast_gcontable_pack_ajax_response();
                          exit;
                      }
                  }
              }
              elseif (0 < $rsUni->fields[0])
              {
                  $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_inst_uniq'] . " Código"; 
                  $this->nmgp_opcao = "nada"; 
                  $GLOBALS["erro_incl"] = 1; 
                  $aInsertOk[] = 'codigobar';
                  $rsUni->Close();
              }
              else
              {
                  $rsUni->Close();
              }
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if ($bInsertOk)
          { 
              $_test_file = $this->fetchUniqueUploadName($this->imagenprod__scfile_name, $dir_file, "imagenprod_");
              if (trim($this->imagenprod__scfile_name) != $_test_file)
              {
                  $this->imagenprod__scfile_name = $_test_file;
                  $this->imagenprod_ = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->unidmaymen_ != "")
                  { 
                       $compl_insert     .= ", unidmaymen";
                       $compl_insert_val .= ", '$this->unidmaymen_'";
                  } 
                  if ($this->costomen_ != "")
                  { 
                       $compl_insert     .= ", costomen";
                       $compl_insert_val .= ", $this->costomen_";
                  } 
                  if ($this->recmayamen_ != "")
                  { 
                       $compl_insert     .= ", recmayamen";
                       $compl_insert_val .= ", $this->recmayamen_";
                  } 
                  if ($this->stockmay_ != "")
                  { 
                       $compl_insert     .= ", stockmay";
                       $compl_insert_val .= ", $this->stockmay_";
                  } 
                  if ($this->stockmen_ != "")
                  { 
                       $compl_insert     .= ", stockmen";
                       $compl_insert_val .= ", $this->stockmen_";
                  } 
                  if ($this->colores_ != "")
                  { 
                       $compl_insert     .= ", colores";
                       $compl_insert_val .= ", '$this->colores_'";
                  } 
                  if ($this->tallas_ != "")
                  { 
                       $compl_insert     .= ", tallas";
                       $compl_insert_val .= ", '$this->tallas_'";
                  } 
                  if ($this->sabores_ != "")
                  { 
                       $compl_insert     .= ", sabores";
                       $compl_insert_val .= ", '$this->sabores_'";
                  } 
                  if ($this->imconsumo_ != "")
                  { 
                       $compl_insert     .= ", imconsumo";
                       $compl_insert_val .= ", $this->imconsumo_";
                  } 
                  if ($this->escombo_ != "")
                  { 
                       $compl_insert     .= ", escombo";
                       $compl_insert_val .= ", '$this->escombo_'";
                  } 
                  if ($this->precio_editable_ != "")
                  { 
                       $compl_insert     .= ", precio_editable";
                       $compl_insert_val .= ", '$this->precio_editable_'";
                  } 
                  if ($this->fecha_vencimiento_ != "")
                  { 
                       $compl_insert     .= ", fecha_vencimiento";
                       $compl_insert_val .= ", '$this->fecha_vencimiento_'";
                  } 
                  if ($this->fecha_fab_ != "")
                  { 
                       $compl_insert     .= ", fecha_fab";
                       $compl_insert_val .= ", '$this->fecha_fab_'";
                  } 
                  if ($this->lote_ != "")
                  { 
                       $compl_insert     .= ", lote";
                       $compl_insert_val .= ", '$this->lote_'";
                  } 
                  if ($this->serial_codbarras_ != "")
                  { 
                       $compl_insert     .= ", serial_codbarras";
                       $compl_insert_val .= ", '$this->serial_codbarras_'";
                  } 
                  if ($this->maneja_tcs_lfs_ != "")
                  { 
                       $compl_insert     .= ", maneja_tcs_lfs";
                       $compl_insert_val .= ", '$this->maneja_tcs_lfs_'";
                  } 
                  if ($this->control_costo_ != "")
                  { 
                       $compl_insert     .= ", control_costo";
                       $compl_insert_val .= ", '$this->control_costo_'";
                  } 
                  if ($this->por_preciominimo_ != "")
                  { 
                       $compl_insert     .= ", por_preciominimo";
                       $compl_insert_val .= ", $this->por_preciominimo_";
                  } 
                  if ($this->id_marca_ != "")
                  { 
                       $compl_insert     .= ", id_marca";
                       $compl_insert_val .= ", $this->id_marca_";
                  } 
                  if ($this->id_linea_ != "")
                  { 
                       $compl_insert     .= ", id_linea";
                       $compl_insert_val .= ", $this->id_linea_";
                  } 
                  if ($this->nube_ != "")
                  { 
                       $compl_insert     .= ", nube";
                       $compl_insert_val .= ", '$this->nube_'";
                  } 
                  if ($this->existencia_ != "")
                  { 
                       $compl_insert     .= ", existencia";
                       $compl_insert_val .= ", $this->existencia_";
                  } 
                  if ($this->multiple_escala_ != "")
                  { 
                       $compl_insert     .= ", multiple_escala";
                       $compl_insert_val .= ", '$this->multiple_escala_'";
                  } 
                  if ($this->en_base_a_ != "")
                  { 
                       $compl_insert     .= ", en_base_a";
                       $compl_insert_val .= ", '$this->en_base_a_'";
                  } 
                  if ($this->activo_ != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo_'";
                  } 
                  if ($this->costo_prom_ != "")
                  { 
                       $compl_insert     .= ", costo_prom";
                       $compl_insert_val .= ", $this->costo_prom_";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (codigobar, codigoprod, nompro, unimay, unimen, costomay, preciomen, preciomen2, preciomen3, precio2, preciomay, preciofull, idgrup, idpro1, idpro2, idiva, otro, otro2, imagenprod, idcombo, cod_cuenta, ultima_compra, n_ultcompra, ultima_venta, n_ultventa, codigobar2, codigobar3, tipo_producto $compl_insert) VALUES ('$this->codigobar_', '$this->codigoprod_', '$this->nompro_', '$this->unimay_', '$this->unimen_', $this->costomay_, $this->preciomen_, $this->preciomen2_, $this->preciomen3_, $this->precio2_, $this->preciomay_, $this->preciofull_, $this->idgrup_, $this->idpro1_, $this->idpro2_, $this->idiva_, $this->otro_, $this->otro2_, '$this->imagenprod_', $this->idcombo_, '$this->cod_cuenta_', #$this->ultima_compra_#, '$this->n_ultcompra_', #$this->ultima_venta_#, '$this->n_ultventa_', '$this->codigobar2_', '$this->codigobar3_', '$this->tipo_producto_' $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco == "pdo_sqlsrv")
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->unidmaymen_ != "")
                  { 
                       $compl_insert     .= ", unidmaymen";
                       $compl_insert_val .= ", '$this->unidmaymen_'";
                  } 
                  if ($this->costomen_ != "")
                  { 
                       $compl_insert     .= ", costomen";
                       $compl_insert_val .= ", $this->costomen_";
                  } 
                  if ($this->recmayamen_ != "")
                  { 
                       $compl_insert     .= ", recmayamen";
                       $compl_insert_val .= ", $this->recmayamen_";
                  } 
                  if ($this->stockmay_ != "")
                  { 
                       $compl_insert     .= ", stockmay";
                       $compl_insert_val .= ", $this->stockmay_";
                  } 
                  if ($this->stockmen_ != "")
                  { 
                       $compl_insert     .= ", stockmen";
                       $compl_insert_val .= ", $this->stockmen_";
                  } 
                  if ($this->colores_ != "")
                  { 
                       $compl_insert     .= ", colores";
                       $compl_insert_val .= ", '$this->colores_'";
                  } 
                  if ($this->tallas_ != "")
                  { 
                       $compl_insert     .= ", tallas";
                       $compl_insert_val .= ", '$this->tallas_'";
                  } 
                  if ($this->sabores_ != "")
                  { 
                       $compl_insert     .= ", sabores";
                       $compl_insert_val .= ", '$this->sabores_'";
                  } 
                  if ($this->imconsumo_ != "")
                  { 
                       $compl_insert     .= ", imconsumo";
                       $compl_insert_val .= ", $this->imconsumo_";
                  } 
                  if ($this->escombo_ != "")
                  { 
                       $compl_insert     .= ", escombo";
                       $compl_insert_val .= ", '$this->escombo_'";
                  } 
                  if ($this->precio_editable_ != "")
                  { 
                       $compl_insert     .= ", precio_editable";
                       $compl_insert_val .= ", '$this->precio_editable_'";
                  } 
                  if ($this->fecha_vencimiento_ != "")
                  { 
                       $compl_insert     .= ", fecha_vencimiento";
                       $compl_insert_val .= ", '$this->fecha_vencimiento_'";
                  } 
                  if ($this->fecha_fab_ != "")
                  { 
                       $compl_insert     .= ", fecha_fab";
                       $compl_insert_val .= ", '$this->fecha_fab_'";
                  } 
                  if ($this->lote_ != "")
                  { 
                       $compl_insert     .= ", lote";
                       $compl_insert_val .= ", '$this->lote_'";
                  } 
                  if ($this->serial_codbarras_ != "")
                  { 
                       $compl_insert     .= ", serial_codbarras";
                       $compl_insert_val .= ", '$this->serial_codbarras_'";
                  } 
                  if ($this->maneja_tcs_lfs_ != "")
                  { 
                       $compl_insert     .= ", maneja_tcs_lfs";
                       $compl_insert_val .= ", '$this->maneja_tcs_lfs_'";
                  } 
                  if ($this->control_costo_ != "")
                  { 
                       $compl_insert     .= ", control_costo";
                       $compl_insert_val .= ", '$this->control_costo_'";
                  } 
                  if ($this->por_preciominimo_ != "")
                  { 
                       $compl_insert     .= ", por_preciominimo";
                       $compl_insert_val .= ", $this->por_preciominimo_";
                  } 
                  if ($this->id_marca_ != "")
                  { 
                       $compl_insert     .= ", id_marca";
                       $compl_insert_val .= ", $this->id_marca_";
                  } 
                  if ($this->id_linea_ != "")
                  { 
                       $compl_insert     .= ", id_linea";
                       $compl_insert_val .= ", $this->id_linea_";
                  } 
                  if ($this->nube_ != "")
                  { 
                       $compl_insert     .= ", nube";
                       $compl_insert_val .= ", '$this->nube_'";
                  } 
                  if ($this->existencia_ != "")
                  { 
                       $compl_insert     .= ", existencia";
                       $compl_insert_val .= ", $this->existencia_";
                  } 
                  if ($this->multiple_escala_ != "")
                  { 
                       $compl_insert     .= ", multiple_escala";
                       $compl_insert_val .= ", '$this->multiple_escala_'";
                  } 
                  if ($this->en_base_a_ != "")
                  { 
                       $compl_insert     .= ", en_base_a";
                       $compl_insert_val .= ", '$this->en_base_a_'";
                  } 
                  if ($this->activo_ != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo_'";
                  } 
                  if ($this->costo_prom_ != "")
                  { 
                       $compl_insert     .= ", costo_prom";
                       $compl_insert_val .= ", $this->costo_prom_";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (codigobar, codigoprod, nompro, unimay, unimen, costomay, preciomen, preciomen2, preciomen3, precio2, preciomay, preciofull, idgrup, idpro1, idpro2, idiva, otro, otro2, imagenprod, idcombo, cod_cuenta, ultima_compra, n_ultcompra, ultima_venta, n_ultventa, codigobar2, codigobar3, tipo_producto $compl_insert) VALUES ('$this->codigobar_', '$this->codigoprod_', '$this->nompro_', '$this->unimay_', '$this->unimen_', $this->costomay_, $this->preciomen_, $this->preciomen2_, $this->preciomen3_, $this->precio2_, $this->preciomay_, $this->preciofull_, $this->idgrup_, $this->idpro1_, $this->idpro2_, $this->idiva_, $this->otro_, $this->otro2_, '', $this->idcombo_, '$this->cod_cuenta_', " . $this->Ini->date_delim . $this->ultima_compra_ . $this->Ini->date_delim1 . ", '$this->n_ultcompra_', " . $this->Ini->date_delim . $this->ultima_venta_ . $this->Ini->date_delim1 . ", '$this->n_ultventa_', '$this->codigobar2_', '$this->codigobar3_', '$this->tipo_producto_' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->unidmaymen_ != "")
                  { 
                       $compl_insert     .= ", unidmaymen";
                       $compl_insert_val .= ", '$this->unidmaymen_'";
                  } 
                  if ($this->costomen_ != "")
                  { 
                       $compl_insert     .= ", costomen";
                       $compl_insert_val .= ", $this->costomen_";
                  } 
                  if ($this->recmayamen_ != "")
                  { 
                       $compl_insert     .= ", recmayamen";
                       $compl_insert_val .= ", $this->recmayamen_";
                  } 
                  if ($this->stockmay_ != "")
                  { 
                       $compl_insert     .= ", stockmay";
                       $compl_insert_val .= ", $this->stockmay_";
                  } 
                  if ($this->stockmen_ != "")
                  { 
                       $compl_insert     .= ", stockmen";
                       $compl_insert_val .= ", $this->stockmen_";
                  } 
                  if ($this->colores_ != "")
                  { 
                       $compl_insert     .= ", colores";
                       $compl_insert_val .= ", '$this->colores_'";
                  } 
                  if ($this->tallas_ != "")
                  { 
                       $compl_insert     .= ", tallas";
                       $compl_insert_val .= ", '$this->tallas_'";
                  } 
                  if ($this->sabores_ != "")
                  { 
                       $compl_insert     .= ", sabores";
                       $compl_insert_val .= ", '$this->sabores_'";
                  } 
                  if ($this->imconsumo_ != "")
                  { 
                       $compl_insert     .= ", imconsumo";
                       $compl_insert_val .= ", $this->imconsumo_";
                  } 
                  if ($this->escombo_ != "")
                  { 
                       $compl_insert     .= ", escombo";
                       $compl_insert_val .= ", '$this->escombo_'";
                  } 
                  if ($this->precio_editable_ != "")
                  { 
                       $compl_insert     .= ", precio_editable";
                       $compl_insert_val .= ", '$this->precio_editable_'";
                  } 
                  if ($this->fecha_vencimiento_ != "")
                  { 
                       $compl_insert     .= ", fecha_vencimiento";
                       $compl_insert_val .= ", '$this->fecha_vencimiento_'";
                  } 
                  if ($this->fecha_fab_ != "")
                  { 
                       $compl_insert     .= ", fecha_fab";
                       $compl_insert_val .= ", '$this->fecha_fab_'";
                  } 
                  if ($this->lote_ != "")
                  { 
                       $compl_insert     .= ", lote";
                       $compl_insert_val .= ", '$this->lote_'";
                  } 
                  if ($this->serial_codbarras_ != "")
                  { 
                       $compl_insert     .= ", serial_codbarras";
                       $compl_insert_val .= ", '$this->serial_codbarras_'";
                  } 
                  if ($this->maneja_tcs_lfs_ != "")
                  { 
                       $compl_insert     .= ", maneja_tcs_lfs";
                       $compl_insert_val .= ", '$this->maneja_tcs_lfs_'";
                  } 
                  if ($this->control_costo_ != "")
                  { 
                       $compl_insert     .= ", control_costo";
                       $compl_insert_val .= ", '$this->control_costo_'";
                  } 
                  if ($this->por_preciominimo_ != "")
                  { 
                       $compl_insert     .= ", por_preciominimo";
                       $compl_insert_val .= ", $this->por_preciominimo_";
                  } 
                  if ($this->id_marca_ != "")
                  { 
                       $compl_insert     .= ", id_marca";
                       $compl_insert_val .= ", $this->id_marca_";
                  } 
                  if ($this->id_linea_ != "")
                  { 
                       $compl_insert     .= ", id_linea";
                       $compl_insert_val .= ", $this->id_linea_";
                  } 
                  if ($this->nube_ != "")
                  { 
                       $compl_insert     .= ", nube";
                       $compl_insert_val .= ", '$this->nube_'";
                  } 
                  if ($this->existencia_ != "")
                  { 
                       $compl_insert     .= ", existencia";
                       $compl_insert_val .= ", $this->existencia_";
                  } 
                  if ($this->multiple_escala_ != "")
                  { 
                       $compl_insert     .= ", multiple_escala";
                       $compl_insert_val .= ", '$this->multiple_escala_'";
                  } 
                  if ($this->en_base_a_ != "")
                  { 
                       $compl_insert     .= ", en_base_a";
                       $compl_insert_val .= ", '$this->en_base_a_'";
                  } 
                  if ($this->activo_ != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo_'";
                  } 
                  if ($this->costo_prom_ != "")
                  { 
                       $compl_insert     .= ", costo_prom";
                       $compl_insert_val .= ", $this->costo_prom_";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (codigobar, codigoprod, nompro, unimay, unimen, costomay, preciomen, preciomen2, preciomen3, precio2, preciomay, preciofull, idgrup, idpro1, idpro2, idiva, otro, otro2, imagenprod, idcombo, cod_cuenta, ultima_compra, n_ultcompra, ultima_venta, n_ultventa, codigobar2, codigobar3, tipo_producto $compl_insert) VALUES ('$this->codigobar_', '$this->codigoprod_', '$this->nompro_', '$this->unimay_', '$this->unimen_', $this->costomay_, $this->preciomen_, $this->preciomen2_, $this->preciomen3_, $this->precio2_, $this->preciomay_, $this->preciofull_, $this->idgrup_, $this->idpro1_, $this->idpro2_, $this->idiva_, $this->otro_, $this->otro2_, '$this->imagenprod_', $this->idcombo_, '$this->cod_cuenta_', " . $this->Ini->date_delim . $this->ultima_compra_ . $this->Ini->date_delim1 . ", '$this->n_ultcompra_', " . $this->Ini->date_delim . $this->ultima_venta_ . $this->Ini->date_delim1 . ", '$this->n_ultventa_', '$this->codigobar2_', '$this->codigobar3_', '$this->tipo_producto_' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->unidmaymen_ != "")
                  { 
                       $compl_insert     .= ", unidmaymen";
                       $compl_insert_val .= ", '$this->unidmaymen_'";
                  } 
                  if ($this->costomen_ != "")
                  { 
                       $compl_insert     .= ", costomen";
                       $compl_insert_val .= ", $this->costomen_";
                  } 
                  if ($this->recmayamen_ != "")
                  { 
                       $compl_insert     .= ", recmayamen";
                       $compl_insert_val .= ", $this->recmayamen_";
                  } 
                  if ($this->stockmay_ != "")
                  { 
                       $compl_insert     .= ", stockmay";
                       $compl_insert_val .= ", $this->stockmay_";
                  } 
                  if ($this->stockmen_ != "")
                  { 
                       $compl_insert     .= ", stockmen";
                       $compl_insert_val .= ", $this->stockmen_";
                  } 
                  if ($this->colores_ != "")
                  { 
                       $compl_insert     .= ", colores";
                       $compl_insert_val .= ", '$this->colores_'";
                  } 
                  if ($this->tallas_ != "")
                  { 
                       $compl_insert     .= ", tallas";
                       $compl_insert_val .= ", '$this->tallas_'";
                  } 
                  if ($this->sabores_ != "")
                  { 
                       $compl_insert     .= ", sabores";
                       $compl_insert_val .= ", '$this->sabores_'";
                  } 
                  if ($this->imconsumo_ != "")
                  { 
                       $compl_insert     .= ", imconsumo";
                       $compl_insert_val .= ", $this->imconsumo_";
                  } 
                  if ($this->escombo_ != "")
                  { 
                       $compl_insert     .= ", escombo";
                       $compl_insert_val .= ", '$this->escombo_'";
                  } 
                  if ($this->precio_editable_ != "")
                  { 
                       $compl_insert     .= ", precio_editable";
                       $compl_insert_val .= ", '$this->precio_editable_'";
                  } 
                  if ($this->fecha_vencimiento_ != "")
                  { 
                       $compl_insert     .= ", fecha_vencimiento";
                       $compl_insert_val .= ", '$this->fecha_vencimiento_'";
                  } 
                  if ($this->fecha_fab_ != "")
                  { 
                       $compl_insert     .= ", fecha_fab";
                       $compl_insert_val .= ", '$this->fecha_fab_'";
                  } 
                  if ($this->lote_ != "")
                  { 
                       $compl_insert     .= ", lote";
                       $compl_insert_val .= ", '$this->lote_'";
                  } 
                  if ($this->serial_codbarras_ != "")
                  { 
                       $compl_insert     .= ", serial_codbarras";
                       $compl_insert_val .= ", '$this->serial_codbarras_'";
                  } 
                  if ($this->maneja_tcs_lfs_ != "")
                  { 
                       $compl_insert     .= ", maneja_tcs_lfs";
                       $compl_insert_val .= ", '$this->maneja_tcs_lfs_'";
                  } 
                  if ($this->control_costo_ != "")
                  { 
                       $compl_insert     .= ", control_costo";
                       $compl_insert_val .= ", '$this->control_costo_'";
                  } 
                  if ($this->por_preciominimo_ != "")
                  { 
                       $compl_insert     .= ", por_preciominimo";
                       $compl_insert_val .= ", $this->por_preciominimo_";
                  } 
                  if ($this->id_marca_ != "")
                  { 
                       $compl_insert     .= ", id_marca";
                       $compl_insert_val .= ", $this->id_marca_";
                  } 
                  if ($this->id_linea_ != "")
                  { 
                       $compl_insert     .= ", id_linea";
                       $compl_insert_val .= ", $this->id_linea_";
                  } 
                  if ($this->nube_ != "")
                  { 
                       $compl_insert     .= ", nube";
                       $compl_insert_val .= ", '$this->nube_'";
                  } 
                  if ($this->existencia_ != "")
                  { 
                       $compl_insert     .= ", existencia";
                       $compl_insert_val .= ", $this->existencia_";
                  } 
                  if ($this->multiple_escala_ != "")
                  { 
                       $compl_insert     .= ", multiple_escala";
                       $compl_insert_val .= ", '$this->multiple_escala_'";
                  } 
                  if ($this->en_base_a_ != "")
                  { 
                       $compl_insert     .= ", en_base_a";
                       $compl_insert_val .= ", '$this->en_base_a_'";
                  } 
                  if ($this->activo_ != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo_'";
                  } 
                  if ($this->costo_prom_ != "")
                  { 
                       $compl_insert     .= ", costo_prom";
                       $compl_insert_val .= ", $this->costo_prom_";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (codigobar, codigoprod, nompro, unimay, unimen, costomay, preciomen, preciomen2, preciomen3, precio2, preciomay, preciofull, idgrup, idpro1, idpro2, idiva, otro, otro2, imagenprod, idcombo, cod_cuenta, ultima_compra, n_ultcompra, ultima_venta, n_ultventa, codigobar2, codigobar3, tipo_producto $compl_insert) VALUES ('$this->codigobar_', '$this->codigoprod_', '$this->nompro_', '$this->unimay_', '$this->unimen_', $this->costomay_, $this->preciomen_, $this->preciomen2_, $this->preciomen3_, $this->precio2_, $this->preciomay_, $this->preciofull_, $this->idgrup_, $this->idpro1_, $this->idpro2_, $this->idiva_, $this->otro_, $this->otro2_, '$this->imagenprod_', $this->idcombo_, '$this->cod_cuenta_', " . $this->Ini->date_delim . $this->ultima_compra_ . $this->Ini->date_delim1 . ", '$this->n_ultcompra_', " . $this->Ini->date_delim . $this->ultima_venta_ . $this->Ini->date_delim1 . ", '$this->n_ultventa_', '$this->codigobar2_', '$this->codigobar3_', '$this->tipo_producto_' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->unidmaymen_ != "")
                  { 
                       $compl_insert     .= ", unidmaymen";
                       $compl_insert_val .= ", '$this->unidmaymen_'";
                  } 
                  if ($this->costomen_ != "")
                  { 
                       $compl_insert     .= ", costomen";
                       $compl_insert_val .= ", $this->costomen_";
                  } 
                  if ($this->recmayamen_ != "")
                  { 
                       $compl_insert     .= ", recmayamen";
                       $compl_insert_val .= ", $this->recmayamen_";
                  } 
                  if ($this->stockmay_ != "")
                  { 
                       $compl_insert     .= ", stockmay";
                       $compl_insert_val .= ", $this->stockmay_";
                  } 
                  if ($this->stockmen_ != "")
                  { 
                       $compl_insert     .= ", stockmen";
                       $compl_insert_val .= ", $this->stockmen_";
                  } 
                  if ($this->colores_ != "")
                  { 
                       $compl_insert     .= ", colores";
                       $compl_insert_val .= ", '$this->colores_'";
                  } 
                  if ($this->tallas_ != "")
                  { 
                       $compl_insert     .= ", tallas";
                       $compl_insert_val .= ", '$this->tallas_'";
                  } 
                  if ($this->sabores_ != "")
                  { 
                       $compl_insert     .= ", sabores";
                       $compl_insert_val .= ", '$this->sabores_'";
                  } 
                  if ($this->imconsumo_ != "")
                  { 
                       $compl_insert     .= ", imconsumo";
                       $compl_insert_val .= ", $this->imconsumo_";
                  } 
                  if ($this->escombo_ != "")
                  { 
                       $compl_insert     .= ", escombo";
                       $compl_insert_val .= ", '$this->escombo_'";
                  } 
                  if ($this->precio_editable_ != "")
                  { 
                       $compl_insert     .= ", precio_editable";
                       $compl_insert_val .= ", '$this->precio_editable_'";
                  } 
                  if ($this->fecha_vencimiento_ != "")
                  { 
                       $compl_insert     .= ", fecha_vencimiento";
                       $compl_insert_val .= ", '$this->fecha_vencimiento_'";
                  } 
                  if ($this->fecha_fab_ != "")
                  { 
                       $compl_insert     .= ", fecha_fab";
                       $compl_insert_val .= ", '$this->fecha_fab_'";
                  } 
                  if ($this->lote_ != "")
                  { 
                       $compl_insert     .= ", lote";
                       $compl_insert_val .= ", '$this->lote_'";
                  } 
                  if ($this->serial_codbarras_ != "")
                  { 
                       $compl_insert     .= ", serial_codbarras";
                       $compl_insert_val .= ", '$this->serial_codbarras_'";
                  } 
                  if ($this->maneja_tcs_lfs_ != "")
                  { 
                       $compl_insert     .= ", maneja_tcs_lfs";
                       $compl_insert_val .= ", '$this->maneja_tcs_lfs_'";
                  } 
                  if ($this->control_costo_ != "")
                  { 
                       $compl_insert     .= ", control_costo";
                       $compl_insert_val .= ", '$this->control_costo_'";
                  } 
                  if ($this->por_preciominimo_ != "")
                  { 
                       $compl_insert     .= ", por_preciominimo";
                       $compl_insert_val .= ", $this->por_preciominimo_";
                  } 
                  if ($this->id_marca_ != "")
                  { 
                       $compl_insert     .= ", id_marca";
                       $compl_insert_val .= ", $this->id_marca_";
                  } 
                  if ($this->id_linea_ != "")
                  { 
                       $compl_insert     .= ", id_linea";
                       $compl_insert_val .= ", $this->id_linea_";
                  } 
                  if ($this->nube_ != "")
                  { 
                       $compl_insert     .= ", nube";
                       $compl_insert_val .= ", '$this->nube_'";
                  } 
                  if ($this->existencia_ != "")
                  { 
                       $compl_insert     .= ", existencia";
                       $compl_insert_val .= ", $this->existencia_";
                  } 
                  if ($this->multiple_escala_ != "")
                  { 
                       $compl_insert     .= ", multiple_escala";
                       $compl_insert_val .= ", '$this->multiple_escala_'";
                  } 
                  if ($this->en_base_a_ != "")
                  { 
                       $compl_insert     .= ", en_base_a";
                       $compl_insert_val .= ", '$this->en_base_a_'";
                  } 
                  if ($this->activo_ != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo_'";
                  } 
                  if ($this->costo_prom_ != "")
                  { 
                       $compl_insert     .= ", costo_prom";
                       $compl_insert_val .= ", $this->costo_prom_";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codigobar, codigoprod, nompro, unimay, unimen, costomay, preciomen, preciomen2, preciomen3, precio2, preciomay, preciofull, idgrup, idpro1, idpro2, idiva, otro, otro2, imagenprod, idcombo, cod_cuenta, ultima_compra, n_ultcompra, ultima_venta, n_ultventa, codigobar2, codigobar3, tipo_producto $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codigobar_', '$this->codigoprod_', '$this->nompro_', '$this->unimay_', '$this->unimen_', $this->costomay_, $this->preciomen_, $this->preciomen2_, $this->preciomen3_, $this->precio2_, $this->preciomay_, $this->preciofull_, $this->idgrup_, $this->idpro1_, $this->idpro2_, $this->idiva_, $this->otro_, $this->otro2_, EMPTY_BLOB(), $this->idcombo_, '$this->cod_cuenta_', " . $this->Ini->date_delim . $this->ultima_compra_ . $this->Ini->date_delim1 . ", '$this->n_ultcompra_', " . $this->Ini->date_delim . $this->ultima_venta_ . $this->Ini->date_delim1 . ", '$this->n_ultventa_', '$this->codigobar2_', '$this->codigobar3_', '$this->tipo_producto_' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->unidmaymen_ != "")
                  { 
                       $compl_insert     .= ", unidmaymen";
                       $compl_insert_val .= ", '$this->unidmaymen_'";
                  } 
                  if ($this->costomen_ != "")
                  { 
                       $compl_insert     .= ", costomen";
                       $compl_insert_val .= ", $this->costomen_";
                  } 
                  if ($this->recmayamen_ != "")
                  { 
                       $compl_insert     .= ", recmayamen";
                       $compl_insert_val .= ", $this->recmayamen_";
                  } 
                  if ($this->stockmay_ != "")
                  { 
                       $compl_insert     .= ", stockmay";
                       $compl_insert_val .= ", $this->stockmay_";
                  } 
                  if ($this->stockmen_ != "")
                  { 
                       $compl_insert     .= ", stockmen";
                       $compl_insert_val .= ", $this->stockmen_";
                  } 
                  if ($this->colores_ != "")
                  { 
                       $compl_insert     .= ", colores";
                       $compl_insert_val .= ", '$this->colores_'";
                  } 
                  if ($this->tallas_ != "")
                  { 
                       $compl_insert     .= ", tallas";
                       $compl_insert_val .= ", '$this->tallas_'";
                  } 
                  if ($this->sabores_ != "")
                  { 
                       $compl_insert     .= ", sabores";
                       $compl_insert_val .= ", '$this->sabores_'";
                  } 
                  if ($this->imconsumo_ != "")
                  { 
                       $compl_insert     .= ", imconsumo";
                       $compl_insert_val .= ", $this->imconsumo_";
                  } 
                  if ($this->escombo_ != "")
                  { 
                       $compl_insert     .= ", escombo";
                       $compl_insert_val .= ", '$this->escombo_'";
                  } 
                  if ($this->precio_editable_ != "")
                  { 
                       $compl_insert     .= ", precio_editable";
                       $compl_insert_val .= ", '$this->precio_editable_'";
                  } 
                  if ($this->fecha_vencimiento_ != "")
                  { 
                       $compl_insert     .= ", fecha_vencimiento";
                       $compl_insert_val .= ", '$this->fecha_vencimiento_'";
                  } 
                  if ($this->fecha_fab_ != "")
                  { 
                       $compl_insert     .= ", fecha_fab";
                       $compl_insert_val .= ", '$this->fecha_fab_'";
                  } 
                  if ($this->lote_ != "")
                  { 
                       $compl_insert     .= ", lote";
                       $compl_insert_val .= ", '$this->lote_'";
                  } 
                  if ($this->serial_codbarras_ != "")
                  { 
                       $compl_insert     .= ", serial_codbarras";
                       $compl_insert_val .= ", '$this->serial_codbarras_'";
                  } 
                  if ($this->maneja_tcs_lfs_ != "")
                  { 
                       $compl_insert     .= ", maneja_tcs_lfs";
                       $compl_insert_val .= ", '$this->maneja_tcs_lfs_'";
                  } 
                  if ($this->control_costo_ != "")
                  { 
                       $compl_insert     .= ", control_costo";
                       $compl_insert_val .= ", '$this->control_costo_'";
                  } 
                  if ($this->por_preciominimo_ != "")
                  { 
                       $compl_insert     .= ", por_preciominimo";
                       $compl_insert_val .= ", $this->por_preciominimo_";
                  } 
                  if ($this->id_marca_ != "")
                  { 
                       $compl_insert     .= ", id_marca";
                       $compl_insert_val .= ", $this->id_marca_";
                  } 
                  if ($this->id_linea_ != "")
                  { 
                       $compl_insert     .= ", id_linea";
                       $compl_insert_val .= ", $this->id_linea_";
                  } 
                  if ($this->nube_ != "")
                  { 
                       $compl_insert     .= ", nube";
                       $compl_insert_val .= ", '$this->nube_'";
                  } 
                  if ($this->existencia_ != "")
                  { 
                       $compl_insert     .= ", existencia";
                       $compl_insert_val .= ", $this->existencia_";
                  } 
                  if ($this->multiple_escala_ != "")
                  { 
                       $compl_insert     .= ", multiple_escala";
                       $compl_insert_val .= ", '$this->multiple_escala_'";
                  } 
                  if ($this->en_base_a_ != "")
                  { 
                       $compl_insert     .= ", en_base_a";
                       $compl_insert_val .= ", '$this->en_base_a_'";
                  } 
                  if ($this->activo_ != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo_'";
                  } 
                  if ($this->costo_prom_ != "")
                  { 
                       $compl_insert     .= ", costo_prom";
                       $compl_insert_val .= ", $this->costo_prom_";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codigobar, codigoprod, nompro, unimay, unimen, costomay, preciomen, preciomen2, preciomen3, precio2, preciomay, preciofull, idgrup, idpro1, idpro2, idiva, otro, otro2, imagenprod, idcombo, cod_cuenta, ultima_compra, n_ultcompra, ultima_venta, n_ultventa, codigobar2, codigobar3, tipo_producto $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codigobar_', '$this->codigoprod_', '$this->nompro_', '$this->unimay_', '$this->unimen_', $this->costomay_, $this->preciomen_, $this->preciomen2_, $this->preciomen3_, $this->precio2_, $this->preciomay_, $this->preciofull_, $this->idgrup_, $this->idpro1_, $this->idpro2_, $this->idiva_, $this->otro_, $this->otro2_, null, $this->idcombo_, '$this->cod_cuenta_', EXTEND('$this->ultima_compra_', YEAR TO DAY), '$this->n_ultcompra_', EXTEND('$this->ultima_venta_', YEAR TO DAY), '$this->n_ultventa_', '$this->codigobar2_', '$this->codigobar3_', '$this->tipo_producto_' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->unidmaymen_ != "")
                  { 
                       $compl_insert     .= ", unidmaymen";
                       $compl_insert_val .= ", '$this->unidmaymen_'";
                  } 
                  if ($this->costomen_ != "")
                  { 
                       $compl_insert     .= ", costomen";
                       $compl_insert_val .= ", $this->costomen_";
                  } 
                  if ($this->recmayamen_ != "")
                  { 
                       $compl_insert     .= ", recmayamen";
                       $compl_insert_val .= ", $this->recmayamen_";
                  } 
                  if ($this->stockmay_ != "")
                  { 
                       $compl_insert     .= ", stockmay";
                       $compl_insert_val .= ", $this->stockmay_";
                  } 
                  if ($this->stockmen_ != "")
                  { 
                       $compl_insert     .= ", stockmen";
                       $compl_insert_val .= ", $this->stockmen_";
                  } 
                  if ($this->colores_ != "")
                  { 
                       $compl_insert     .= ", colores";
                       $compl_insert_val .= ", '$this->colores_'";
                  } 
                  if ($this->tallas_ != "")
                  { 
                       $compl_insert     .= ", tallas";
                       $compl_insert_val .= ", '$this->tallas_'";
                  } 
                  if ($this->sabores_ != "")
                  { 
                       $compl_insert     .= ", sabores";
                       $compl_insert_val .= ", '$this->sabores_'";
                  } 
                  if ($this->imconsumo_ != "")
                  { 
                       $compl_insert     .= ", imconsumo";
                       $compl_insert_val .= ", $this->imconsumo_";
                  } 
                  if ($this->escombo_ != "")
                  { 
                       $compl_insert     .= ", escombo";
                       $compl_insert_val .= ", '$this->escombo_'";
                  } 
                  if ($this->precio_editable_ != "")
                  { 
                       $compl_insert     .= ", precio_editable";
                       $compl_insert_val .= ", '$this->precio_editable_'";
                  } 
                  if ($this->fecha_vencimiento_ != "")
                  { 
                       $compl_insert     .= ", fecha_vencimiento";
                       $compl_insert_val .= ", '$this->fecha_vencimiento_'";
                  } 
                  if ($this->fecha_fab_ != "")
                  { 
                       $compl_insert     .= ", fecha_fab";
                       $compl_insert_val .= ", '$this->fecha_fab_'";
                  } 
                  if ($this->lote_ != "")
                  { 
                       $compl_insert     .= ", lote";
                       $compl_insert_val .= ", '$this->lote_'";
                  } 
                  if ($this->serial_codbarras_ != "")
                  { 
                       $compl_insert     .= ", serial_codbarras";
                       $compl_insert_val .= ", '$this->serial_codbarras_'";
                  } 
                  if ($this->maneja_tcs_lfs_ != "")
                  { 
                       $compl_insert     .= ", maneja_tcs_lfs";
                       $compl_insert_val .= ", '$this->maneja_tcs_lfs_'";
                  } 
                  if ($this->control_costo_ != "")
                  { 
                       $compl_insert     .= ", control_costo";
                       $compl_insert_val .= ", '$this->control_costo_'";
                  } 
                  if ($this->por_preciominimo_ != "")
                  { 
                       $compl_insert     .= ", por_preciominimo";
                       $compl_insert_val .= ", $this->por_preciominimo_";
                  } 
                  if ($this->id_marca_ != "")
                  { 
                       $compl_insert     .= ", id_marca";
                       $compl_insert_val .= ", $this->id_marca_";
                  } 
                  if ($this->id_linea_ != "")
                  { 
                       $compl_insert     .= ", id_linea";
                       $compl_insert_val .= ", $this->id_linea_";
                  } 
                  if ($this->nube_ != "")
                  { 
                       $compl_insert     .= ", nube";
                       $compl_insert_val .= ", '$this->nube_'";
                  } 
                  if ($this->existencia_ != "")
                  { 
                       $compl_insert     .= ", existencia";
                       $compl_insert_val .= ", $this->existencia_";
                  } 
                  if ($this->multiple_escala_ != "")
                  { 
                       $compl_insert     .= ", multiple_escala";
                       $compl_insert_val .= ", '$this->multiple_escala_'";
                  } 
                  if ($this->en_base_a_ != "")
                  { 
                       $compl_insert     .= ", en_base_a";
                       $compl_insert_val .= ", '$this->en_base_a_'";
                  } 
                  if ($this->activo_ != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo_'";
                  } 
                  if ($this->costo_prom_ != "")
                  { 
                       $compl_insert     .= ", costo_prom";
                       $compl_insert_val .= ", $this->costo_prom_";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codigobar, codigoprod, nompro, unimay, unimen, costomay, preciomen, preciomen2, preciomen3, precio2, preciomay, preciofull, idgrup, idpro1, idpro2, idiva, otro, otro2, imagenprod, idcombo, cod_cuenta, ultima_compra, n_ultcompra, ultima_venta, n_ultventa, codigobar2, codigobar3, tipo_producto $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codigobar_', '$this->codigoprod_', '$this->nompro_', '$this->unimay_', '$this->unimen_', $this->costomay_, $this->preciomen_, $this->preciomen2_, $this->preciomen3_, $this->precio2_, $this->preciomay_, $this->preciofull_, $this->idgrup_, $this->idpro1_, $this->idpro2_, $this->idiva_, $this->otro_, $this->otro2_, '', $this->idcombo_, '$this->cod_cuenta_', " . $this->Ini->date_delim . $this->ultima_compra_ . $this->Ini->date_delim1 . ", '$this->n_ultcompra_', " . $this->Ini->date_delim . $this->ultima_venta_ . $this->Ini->date_delim1 . ", '$this->n_ultventa_', '$this->codigobar2_', '$this->codigobar3_', '$this->tipo_producto_' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->unidmaymen_ != "")
                  { 
                       $compl_insert     .= ", unidmaymen";
                       $compl_insert_val .= ", '$this->unidmaymen_'";
                  } 
                  if ($this->costomen_ != "")
                  { 
                       $compl_insert     .= ", costomen";
                       $compl_insert_val .= ", $this->costomen_";
                  } 
                  if ($this->recmayamen_ != "")
                  { 
                       $compl_insert     .= ", recmayamen";
                       $compl_insert_val .= ", $this->recmayamen_";
                  } 
                  if ($this->stockmay_ != "")
                  { 
                       $compl_insert     .= ", stockmay";
                       $compl_insert_val .= ", $this->stockmay_";
                  } 
                  if ($this->stockmen_ != "")
                  { 
                       $compl_insert     .= ", stockmen";
                       $compl_insert_val .= ", $this->stockmen_";
                  } 
                  if ($this->colores_ != "")
                  { 
                       $compl_insert     .= ", colores";
                       $compl_insert_val .= ", '$this->colores_'";
                  } 
                  if ($this->tallas_ != "")
                  { 
                       $compl_insert     .= ", tallas";
                       $compl_insert_val .= ", '$this->tallas_'";
                  } 
                  if ($this->sabores_ != "")
                  { 
                       $compl_insert     .= ", sabores";
                       $compl_insert_val .= ", '$this->sabores_'";
                  } 
                  if ($this->imconsumo_ != "")
                  { 
                       $compl_insert     .= ", imconsumo";
                       $compl_insert_val .= ", $this->imconsumo_";
                  } 
                  if ($this->escombo_ != "")
                  { 
                       $compl_insert     .= ", escombo";
                       $compl_insert_val .= ", '$this->escombo_'";
                  } 
                  if ($this->precio_editable_ != "")
                  { 
                       $compl_insert     .= ", precio_editable";
                       $compl_insert_val .= ", '$this->precio_editable_'";
                  } 
                  if ($this->fecha_vencimiento_ != "")
                  { 
                       $compl_insert     .= ", fecha_vencimiento";
                       $compl_insert_val .= ", '$this->fecha_vencimiento_'";
                  } 
                  if ($this->fecha_fab_ != "")
                  { 
                       $compl_insert     .= ", fecha_fab";
                       $compl_insert_val .= ", '$this->fecha_fab_'";
                  } 
                  if ($this->lote_ != "")
                  { 
                       $compl_insert     .= ", lote";
                       $compl_insert_val .= ", '$this->lote_'";
                  } 
                  if ($this->serial_codbarras_ != "")
                  { 
                       $compl_insert     .= ", serial_codbarras";
                       $compl_insert_val .= ", '$this->serial_codbarras_'";
                  } 
                  if ($this->maneja_tcs_lfs_ != "")
                  { 
                       $compl_insert     .= ", maneja_tcs_lfs";
                       $compl_insert_val .= ", '$this->maneja_tcs_lfs_'";
                  } 
                  if ($this->control_costo_ != "")
                  { 
                       $compl_insert     .= ", control_costo";
                       $compl_insert_val .= ", '$this->control_costo_'";
                  } 
                  if ($this->por_preciominimo_ != "")
                  { 
                       $compl_insert     .= ", por_preciominimo";
                       $compl_insert_val .= ", $this->por_preciominimo_";
                  } 
                  if ($this->id_marca_ != "")
                  { 
                       $compl_insert     .= ", id_marca";
                       $compl_insert_val .= ", $this->id_marca_";
                  } 
                  if ($this->id_linea_ != "")
                  { 
                       $compl_insert     .= ", id_linea";
                       $compl_insert_val .= ", $this->id_linea_";
                  } 
                  if ($this->nube_ != "")
                  { 
                       $compl_insert     .= ", nube";
                       $compl_insert_val .= ", '$this->nube_'";
                  } 
                  if ($this->existencia_ != "")
                  { 
                       $compl_insert     .= ", existencia";
                       $compl_insert_val .= ", $this->existencia_";
                  } 
                  if ($this->multiple_escala_ != "")
                  { 
                       $compl_insert     .= ", multiple_escala";
                       $compl_insert_val .= ", '$this->multiple_escala_'";
                  } 
                  if ($this->en_base_a_ != "")
                  { 
                       $compl_insert     .= ", en_base_a";
                       $compl_insert_val .= ", '$this->en_base_a_'";
                  } 
                  if ($this->activo_ != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo_'";
                  } 
                  if ($this->costo_prom_ != "")
                  { 
                       $compl_insert     .= ", costo_prom";
                       $compl_insert_val .= ", $this->costo_prom_";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codigobar, codigoprod, nompro, unimay, unimen, costomay, preciomen, preciomen2, preciomen3, precio2, preciomay, preciofull, idgrup, idpro1, idpro2, idiva, otro, otro2, imagenprod, idcombo, cod_cuenta, ultima_compra, n_ultcompra, ultima_venta, n_ultventa, codigobar2, codigobar3, tipo_producto $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codigobar_', '$this->codigoprod_', '$this->nompro_', '$this->unimay_', '$this->unimen_', $this->costomay_, $this->preciomen_, $this->preciomen2_, $this->preciomen3_, $this->precio2_, $this->preciomay_, $this->preciofull_, $this->idgrup_, $this->idpro1_, $this->idpro2_, $this->idiva_, $this->otro_, $this->otro2_, '', $this->idcombo_, '$this->cod_cuenta_', " . $this->Ini->date_delim . $this->ultima_compra_ . $this->Ini->date_delim1 . ", '$this->n_ultcompra_', " . $this->Ini->date_delim . $this->ultima_venta_ . $this->Ini->date_delim1 . ", '$this->n_ultventa_', '$this->codigobar2_', '$this->codigobar3_', '$this->tipo_producto_' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->unidmaymen_ != "")
                  { 
                       $compl_insert     .= ", unidmaymen";
                       $compl_insert_val .= ", '$this->unidmaymen_'";
                  } 
                  if ($this->costomen_ != "")
                  { 
                       $compl_insert     .= ", costomen";
                       $compl_insert_val .= ", $this->costomen_";
                  } 
                  if ($this->recmayamen_ != "")
                  { 
                       $compl_insert     .= ", recmayamen";
                       $compl_insert_val .= ", $this->recmayamen_";
                  } 
                  if ($this->stockmay_ != "")
                  { 
                       $compl_insert     .= ", stockmay";
                       $compl_insert_val .= ", $this->stockmay_";
                  } 
                  if ($this->stockmen_ != "")
                  { 
                       $compl_insert     .= ", stockmen";
                       $compl_insert_val .= ", $this->stockmen_";
                  } 
                  if ($this->colores_ != "")
                  { 
                       $compl_insert     .= ", colores";
                       $compl_insert_val .= ", '$this->colores_'";
                  } 
                  if ($this->tallas_ != "")
                  { 
                       $compl_insert     .= ", tallas";
                       $compl_insert_val .= ", '$this->tallas_'";
                  } 
                  if ($this->sabores_ != "")
                  { 
                       $compl_insert     .= ", sabores";
                       $compl_insert_val .= ", '$this->sabores_'";
                  } 
                  if ($this->imconsumo_ != "")
                  { 
                       $compl_insert     .= ", imconsumo";
                       $compl_insert_val .= ", $this->imconsumo_";
                  } 
                  if ($this->escombo_ != "")
                  { 
                       $compl_insert     .= ", escombo";
                       $compl_insert_val .= ", '$this->escombo_'";
                  } 
                  if ($this->precio_editable_ != "")
                  { 
                       $compl_insert     .= ", precio_editable";
                       $compl_insert_val .= ", '$this->precio_editable_'";
                  } 
                  if ($this->fecha_vencimiento_ != "")
                  { 
                       $compl_insert     .= ", fecha_vencimiento";
                       $compl_insert_val .= ", '$this->fecha_vencimiento_'";
                  } 
                  if ($this->fecha_fab_ != "")
                  { 
                       $compl_insert     .= ", fecha_fab";
                       $compl_insert_val .= ", '$this->fecha_fab_'";
                  } 
                  if ($this->lote_ != "")
                  { 
                       $compl_insert     .= ", lote";
                       $compl_insert_val .= ", '$this->lote_'";
                  } 
                  if ($this->serial_codbarras_ != "")
                  { 
                       $compl_insert     .= ", serial_codbarras";
                       $compl_insert_val .= ", '$this->serial_codbarras_'";
                  } 
                  if ($this->maneja_tcs_lfs_ != "")
                  { 
                       $compl_insert     .= ", maneja_tcs_lfs";
                       $compl_insert_val .= ", '$this->maneja_tcs_lfs_'";
                  } 
                  if ($this->control_costo_ != "")
                  { 
                       $compl_insert     .= ", control_costo";
                       $compl_insert_val .= ", '$this->control_costo_'";
                  } 
                  if ($this->por_preciominimo_ != "")
                  { 
                       $compl_insert     .= ", por_preciominimo";
                       $compl_insert_val .= ", $this->por_preciominimo_";
                  } 
                  if ($this->id_marca_ != "")
                  { 
                       $compl_insert     .= ", id_marca";
                       $compl_insert_val .= ", $this->id_marca_";
                  } 
                  if ($this->id_linea_ != "")
                  { 
                       $compl_insert     .= ", id_linea";
                       $compl_insert_val .= ", $this->id_linea_";
                  } 
                  if ($this->nube_ != "")
                  { 
                       $compl_insert     .= ", nube";
                       $compl_insert_val .= ", '$this->nube_'";
                  } 
                  if ($this->existencia_ != "")
                  { 
                       $compl_insert     .= ", existencia";
                       $compl_insert_val .= ", $this->existencia_";
                  } 
                  if ($this->multiple_escala_ != "")
                  { 
                       $compl_insert     .= ", multiple_escala";
                       $compl_insert_val .= ", '$this->multiple_escala_'";
                  } 
                  if ($this->en_base_a_ != "")
                  { 
                       $compl_insert     .= ", en_base_a";
                       $compl_insert_val .= ", '$this->en_base_a_'";
                  } 
                  if ($this->activo_ != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo_'";
                  } 
                  if ($this->costo_prom_ != "")
                  { 
                       $compl_insert     .= ", costo_prom";
                       $compl_insert_val .= ", $this->costo_prom_";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codigobar, codigoprod, nompro, unimay, unimen, costomay, preciomen, preciomen2, preciomen3, precio2, preciomay, preciofull, idgrup, idpro1, idpro2, idiva, otro, otro2, imagenprod, idcombo, cod_cuenta, ultima_compra, n_ultcompra, ultima_venta, n_ultventa, codigobar2, codigobar3, tipo_producto $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codigobar_', '$this->codigoprod_', '$this->nompro_', '$this->unimay_', '$this->unimen_', $this->costomay_, $this->preciomen_, $this->preciomen2_, $this->preciomen3_, $this->precio2_, $this->preciomay_, $this->preciofull_, $this->idgrup_, $this->idpro1_, $this->idpro2_, $this->idiva_, $this->otro_, $this->otro2_, '', $this->idcombo_, '$this->cod_cuenta_', " . $this->Ini->date_delim . $this->ultima_compra_ . $this->Ini->date_delim1 . ", '$this->n_ultcompra_', " . $this->Ini->date_delim . $this->ultima_venta_ . $this->Ini->date_delim1 . ", '$this->n_ultventa_', '$this->codigobar2_', '$this->codigobar3_', '$this->tipo_producto_' $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco =='pdo_ibm')
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->unidmaymen_ != "")
                  { 
                       $compl_insert     .= ", unidmaymen";
                       $compl_insert_val .= ", '$this->unidmaymen_'";
                  } 
                  if ($this->costomen_ != "")
                  { 
                       $compl_insert     .= ", costomen";
                       $compl_insert_val .= ", $this->costomen_";
                  } 
                  if ($this->recmayamen_ != "")
                  { 
                       $compl_insert     .= ", recmayamen";
                       $compl_insert_val .= ", $this->recmayamen_";
                  } 
                  if ($this->stockmay_ != "")
                  { 
                       $compl_insert     .= ", stockmay";
                       $compl_insert_val .= ", $this->stockmay_";
                  } 
                  if ($this->stockmen_ != "")
                  { 
                       $compl_insert     .= ", stockmen";
                       $compl_insert_val .= ", $this->stockmen_";
                  } 
                  if ($this->colores_ != "")
                  { 
                       $compl_insert     .= ", colores";
                       $compl_insert_val .= ", '$this->colores_'";
                  } 
                  if ($this->tallas_ != "")
                  { 
                       $compl_insert     .= ", tallas";
                       $compl_insert_val .= ", '$this->tallas_'";
                  } 
                  if ($this->sabores_ != "")
                  { 
                       $compl_insert     .= ", sabores";
                       $compl_insert_val .= ", '$this->sabores_'";
                  } 
                  if ($this->imconsumo_ != "")
                  { 
                       $compl_insert     .= ", imconsumo";
                       $compl_insert_val .= ", $this->imconsumo_";
                  } 
                  if ($this->escombo_ != "")
                  { 
                       $compl_insert     .= ", escombo";
                       $compl_insert_val .= ", '$this->escombo_'";
                  } 
                  if ($this->precio_editable_ != "")
                  { 
                       $compl_insert     .= ", precio_editable";
                       $compl_insert_val .= ", '$this->precio_editable_'";
                  } 
                  if ($this->fecha_vencimiento_ != "")
                  { 
                       $compl_insert     .= ", fecha_vencimiento";
                       $compl_insert_val .= ", '$this->fecha_vencimiento_'";
                  } 
                  if ($this->fecha_fab_ != "")
                  { 
                       $compl_insert     .= ", fecha_fab";
                       $compl_insert_val .= ", '$this->fecha_fab_'";
                  } 
                  if ($this->lote_ != "")
                  { 
                       $compl_insert     .= ", lote";
                       $compl_insert_val .= ", '$this->lote_'";
                  } 
                  if ($this->serial_codbarras_ != "")
                  { 
                       $compl_insert     .= ", serial_codbarras";
                       $compl_insert_val .= ", '$this->serial_codbarras_'";
                  } 
                  if ($this->maneja_tcs_lfs_ != "")
                  { 
                       $compl_insert     .= ", maneja_tcs_lfs";
                       $compl_insert_val .= ", '$this->maneja_tcs_lfs_'";
                  } 
                  if ($this->control_costo_ != "")
                  { 
                       $compl_insert     .= ", control_costo";
                       $compl_insert_val .= ", '$this->control_costo_'";
                  } 
                  if ($this->por_preciominimo_ != "")
                  { 
                       $compl_insert     .= ", por_preciominimo";
                       $compl_insert_val .= ", $this->por_preciominimo_";
                  } 
                  if ($this->id_marca_ != "")
                  { 
                       $compl_insert     .= ", id_marca";
                       $compl_insert_val .= ", $this->id_marca_";
                  } 
                  if ($this->id_linea_ != "")
                  { 
                       $compl_insert     .= ", id_linea";
                       $compl_insert_val .= ", $this->id_linea_";
                  } 
                  if ($this->nube_ != "")
                  { 
                       $compl_insert     .= ", nube";
                       $compl_insert_val .= ", '$this->nube_'";
                  } 
                  if ($this->existencia_ != "")
                  { 
                       $compl_insert     .= ", existencia";
                       $compl_insert_val .= ", $this->existencia_";
                  } 
                  if ($this->multiple_escala_ != "")
                  { 
                       $compl_insert     .= ", multiple_escala";
                       $compl_insert_val .= ", '$this->multiple_escala_'";
                  } 
                  if ($this->en_base_a_ != "")
                  { 
                       $compl_insert     .= ", en_base_a";
                       $compl_insert_val .= ", '$this->en_base_a_'";
                  } 
                  if ($this->activo_ != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo_'";
                  } 
                  if ($this->costo_prom_ != "")
                  { 
                       $compl_insert     .= ", costo_prom";
                       $compl_insert_val .= ", $this->costo_prom_";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codigobar, codigoprod, nompro, unimay, unimen, costomay, preciomen, preciomen2, preciomen3, precio2, preciomay, preciofull, idgrup, idpro1, idpro2, idiva, otro, otro2, imagenprod, idcombo, cod_cuenta, ultima_compra, n_ultcompra, ultima_venta, n_ultventa, codigobar2, codigobar3, tipo_producto $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codigobar_', '$this->codigoprod_', '$this->nompro_', '$this->unimay_', '$this->unimen_', $this->costomay_, $this->preciomen_, $this->preciomen2_, $this->preciomen3_, $this->precio2_, $this->preciomay_, $this->preciofull_, $this->idgrup_, $this->idpro1_, $this->idpro2_, $this->idiva_, $this->otro_, $this->otro2_, EMPTY_BLOB(), $this->idcombo_, '$this->cod_cuenta_', " . $this->Ini->date_delim . $this->ultima_compra_ . $this->Ini->date_delim1 . ", '$this->n_ultcompra_', " . $this->Ini->date_delim . $this->ultima_venta_ . $this->Ini->date_delim1 . ", '$this->n_ultventa_', '$this->codigobar2_', '$this->codigobar3_', '$this->tipo_producto_' $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->unidmaymen_ != "")
                  { 
                       $compl_insert     .= ", unidmaymen";
                       $compl_insert_val .= ", '$this->unidmaymen_'";
                  } 
                  if ($this->costomen_ != "")
                  { 
                       $compl_insert     .= ", costomen";
                       $compl_insert_val .= ", $this->costomen_";
                  } 
                  if ($this->recmayamen_ != "")
                  { 
                       $compl_insert     .= ", recmayamen";
                       $compl_insert_val .= ", $this->recmayamen_";
                  } 
                  if ($this->stockmay_ != "")
                  { 
                       $compl_insert     .= ", stockmay";
                       $compl_insert_val .= ", $this->stockmay_";
                  } 
                  if ($this->stockmen_ != "")
                  { 
                       $compl_insert     .= ", stockmen";
                       $compl_insert_val .= ", $this->stockmen_";
                  } 
                  if ($this->colores_ != "")
                  { 
                       $compl_insert     .= ", colores";
                       $compl_insert_val .= ", '$this->colores_'";
                  } 
                  if ($this->tallas_ != "")
                  { 
                       $compl_insert     .= ", tallas";
                       $compl_insert_val .= ", '$this->tallas_'";
                  } 
                  if ($this->sabores_ != "")
                  { 
                       $compl_insert     .= ", sabores";
                       $compl_insert_val .= ", '$this->sabores_'";
                  } 
                  if ($this->imconsumo_ != "")
                  { 
                       $compl_insert     .= ", imconsumo";
                       $compl_insert_val .= ", $this->imconsumo_";
                  } 
                  if ($this->escombo_ != "")
                  { 
                       $compl_insert     .= ", escombo";
                       $compl_insert_val .= ", '$this->escombo_'";
                  } 
                  if ($this->precio_editable_ != "")
                  { 
                       $compl_insert     .= ", precio_editable";
                       $compl_insert_val .= ", '$this->precio_editable_'";
                  } 
                  if ($this->fecha_vencimiento_ != "")
                  { 
                       $compl_insert     .= ", fecha_vencimiento";
                       $compl_insert_val .= ", '$this->fecha_vencimiento_'";
                  } 
                  if ($this->fecha_fab_ != "")
                  { 
                       $compl_insert     .= ", fecha_fab";
                       $compl_insert_val .= ", '$this->fecha_fab_'";
                  } 
                  if ($this->lote_ != "")
                  { 
                       $compl_insert     .= ", lote";
                       $compl_insert_val .= ", '$this->lote_'";
                  } 
                  if ($this->serial_codbarras_ != "")
                  { 
                       $compl_insert     .= ", serial_codbarras";
                       $compl_insert_val .= ", '$this->serial_codbarras_'";
                  } 
                  if ($this->maneja_tcs_lfs_ != "")
                  { 
                       $compl_insert     .= ", maneja_tcs_lfs";
                       $compl_insert_val .= ", '$this->maneja_tcs_lfs_'";
                  } 
                  if ($this->control_costo_ != "")
                  { 
                       $compl_insert     .= ", control_costo";
                       $compl_insert_val .= ", '$this->control_costo_'";
                  } 
                  if ($this->por_preciominimo_ != "")
                  { 
                       $compl_insert     .= ", por_preciominimo";
                       $compl_insert_val .= ", $this->por_preciominimo_";
                  } 
                  if ($this->id_marca_ != "")
                  { 
                       $compl_insert     .= ", id_marca";
                       $compl_insert_val .= ", $this->id_marca_";
                  } 
                  if ($this->id_linea_ != "")
                  { 
                       $compl_insert     .= ", id_linea";
                       $compl_insert_val .= ", $this->id_linea_";
                  } 
                  if ($this->nube_ != "")
                  { 
                       $compl_insert     .= ", nube";
                       $compl_insert_val .= ", '$this->nube_'";
                  } 
                  if ($this->existencia_ != "")
                  { 
                       $compl_insert     .= ", existencia";
                       $compl_insert_val .= ", $this->existencia_";
                  } 
                  if ($this->multiple_escala_ != "")
                  { 
                       $compl_insert     .= ", multiple_escala";
                       $compl_insert_val .= ", '$this->multiple_escala_'";
                  } 
                  if ($this->en_base_a_ != "")
                  { 
                       $compl_insert     .= ", en_base_a";
                       $compl_insert_val .= ", '$this->en_base_a_'";
                  } 
                  if ($this->activo_ != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo_'";
                  } 
                  if ($this->costo_prom_ != "")
                  { 
                       $compl_insert     .= ", costo_prom";
                       $compl_insert_val .= ", $this->costo_prom_";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "codigobar, codigoprod, nompro, unimay, unimen, costomay, preciomen, preciomen2, preciomen3, precio2, preciomay, preciofull, idgrup, idpro1, idpro2, idiva, otro, otro2, imagenprod, idcombo, cod_cuenta, ultima_compra, n_ultcompra, ultima_venta, n_ultventa, codigobar2, codigobar3, tipo_producto $compl_insert) VALUES (" . $NM_seq_auto . "'$this->codigobar_', '$this->codigoprod_', '$this->nompro_', '$this->unimay_', '$this->unimen_', $this->costomay_, $this->preciomen_, $this->preciomen2_, $this->preciomen3_, $this->precio2_, $this->preciomay_, $this->preciofull_, $this->idgrup_, $this->idpro1_, $this->idpro2_, $this->idiva_, $this->otro_, $this->otro2_, '$this->imagenprod_', $this->idcombo_, '$this->cod_cuenta_', " . $this->Ini->date_delim . $this->ultima_compra_ . $this->Ini->date_delim1 . ", '$this->n_ultcompra_', " . $this->Ini->date_delim . $this->ultima_venta_ . $this->Ini->date_delim1 . ", '$this->n_ultventa_', '$this->codigobar2_', '$this->codigobar3_', '$this->tipo_producto_' $compl_insert_val)"; 
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
                              form_productos_fast_gcontable_pack_ajax_response();
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
                          form_productos_fast_gcontable_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->idprod_ =  $rsy->fields[0];
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
                  $this->idprod_ = $rsy->fields[0];
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
                  $this->idprod_ = $rsy->fields[0];
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
                  $this->idprod_ = $rsy->fields[0];
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
                  $this->idprod_ = $rsy->fields[0];
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
                  $this->idprod_ = $rsy->fields[0];
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
                  $this->idprod_ = $rsy->fields[0];
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
                  $this->idprod_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->codigobar_ = $this->codigobar__before_qstr;
              $this->codigoprod_ = $this->codigoprod__before_qstr;
              $this->nompro_ = $this->nompro__before_qstr;
              $this->unidmaymen_ = $this->unidmaymen__before_qstr;
              $this->unimay_ = $this->unimay__before_qstr;
              $this->unimen_ = $this->unimen__before_qstr;
              $this->colores_ = $this->colores__before_qstr;
              $this->tallas_ = $this->tallas__before_qstr;
              $this->sabores_ = $this->sabores__before_qstr;
              $this->escombo_ = $this->escombo__before_qstr;
              $this->precio_editable_ = $this->precio_editable__before_qstr;
              $this->cod_cuenta_ = $this->cod_cuenta__before_qstr;
              $this->fecha_vencimiento_ = $this->fecha_vencimiento__before_qstr;
              $this->fecha_fab_ = $this->fecha_fab__before_qstr;
              $this->lote_ = $this->lote__before_qstr;
              $this->serial_codbarras_ = $this->serial_codbarras__before_qstr;
              $this->maneja_tcs_lfs_ = $this->maneja_tcs_lfs__before_qstr;
              $this->control_costo_ = $this->control_costo__before_qstr;
              $this->n_ultcompra_ = $this->n_ultcompra__before_qstr;
              $this->n_ultventa_ = $this->n_ultventa__before_qstr;
              $this->codigobar2_ = $this->codigobar2__before_qstr;
              $this->codigobar3_ = $this->codigobar3__before_qstr;
              $this->nube_ = $this->nube__before_qstr;
              $this->multiple_escala_ = $this->multiple_escala__before_qstr;
              $this->en_base_a_ = $this->en_base_a__before_qstr;
              $this->activo_ = $this->activo__before_qstr;
              $this->tipo_producto_ = $this->tipo_producto__before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if (trim($this->imagenprod_ ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  imagenprod , $this->imagenprod_,  \"idprod = $this->idprod_\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "imagenprod", $this->imagenprod_,  "idprod = $this->idprod_"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_productos_fast_gcontable_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
              }  
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['db_changed'] = true;

              $this->sc_evento = "insert"; 
              $this->codigobar_ = $this->codigobar__before_qstr;
              $this->codigoprod_ = $this->codigoprod__before_qstr;
              $this->nompro_ = $this->nompro__before_qstr;
              $this->unidmaymen_ = $this->unidmaymen__before_qstr;
              $this->unimay_ = $this->unimay__before_qstr;
              $this->unimen_ = $this->unimen__before_qstr;
              $this->colores_ = $this->colores__before_qstr;
              $this->tallas_ = $this->tallas__before_qstr;
              $this->sabores_ = $this->sabores__before_qstr;
              $this->escombo_ = $this->escombo__before_qstr;
              $this->precio_editable_ = $this->precio_editable__before_qstr;
              $this->cod_cuenta_ = $this->cod_cuenta__before_qstr;
              $this->fecha_vencimiento_ = $this->fecha_vencimiento__before_qstr;
              $this->fecha_fab_ = $this->fecha_fab__before_qstr;
              $this->lote_ = $this->lote__before_qstr;
              $this->serial_codbarras_ = $this->serial_codbarras__before_qstr;
              $this->maneja_tcs_lfs_ = $this->maneja_tcs_lfs__before_qstr;
              $this->control_costo_ = $this->control_costo__before_qstr;
              $this->n_ultcompra_ = $this->n_ultcompra__before_qstr;
              $this->n_ultventa_ = $this->n_ultventa__before_qstr;
              $this->codigobar2_ = $this->codigobar2__before_qstr;
              $this->codigobar3_ = $this->codigobar3__before_qstr;
              $this->nube_ = $this->nube__before_qstr;
              $this->multiple_escala_ = $this->multiple_escala__before_qstr;
              $this->en_base_a_ = $this->en_base_a__before_qstr;
              $this->activo_ = $this->activo__before_qstr;
              $this->tipo_producto_ = $this->tipo_producto__before_qstr;
              $this->sc_teve_incl = true; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dados_select'][$sc_seq_vert]['codigobar_'] = $this->codigobar_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dados_select'][$sc_seq_vert]['nompro_'] = $this->nompro_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dados_select'][$sc_seq_vert]['cod_cuenta_'] = $this->cod_cuenta_;
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
              if (isset($this->codigobar_)) { $this->nm_limpa_alfa($this->codigobar_); }
              if (isset($this->nompro_)) { $this->nm_limpa_alfa($this->nompro_); }
              if (isset($this->cod_cuenta_)) { $this->nm_limpa_alfa($this->cod_cuenta_); }
              if (isset($this->Embutida_form) && $this->Embutida_form)
              {
                  $this->nm_guardar_campos();
                  $this->nm_formatar_campos();

                  $this->NM_ajax_info['fldList']['codigobar_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['codigobar_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->codigobar_)));
                  $this->NM_ajax_info['fldList']['codigobar_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_codigobar_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['codigobar_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['codigobar_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['codigobar_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['codigobar_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['nompro_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['nompro_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->nompro_)));
                  $this->NM_ajax_info['fldList']['nompro_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_nompro_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['nompro_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['nompro_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['nompro_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['nompro_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

              $aLookup = array();
              $aRecData['cod_cuenta_'] = $this->cod_cuenta_;
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['Lookup_cod_cuenta_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['Lookup_cod_cuenta_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['Lookup_cod_cuenta_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['Lookup_cod_cuenta_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['Lookup_cod_cuenta_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['Lookup_cod_cuenta_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['Lookup_cod_cuenta_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['Lookup_cod_cuenta_'] = array(); 
    }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + descripcion FROM grupos_contables WHERE codigo = '" . $aRecData['cod_cuenta_'] . "' ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ',descripcion) FROM grupos_contables WHERE codigo = '" . $aRecData['cod_cuenta_'] . "' ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&descripcion FROM grupos_contables WHERE codigo = '" . $aRecData['cod_cuenta_'] . "' ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||descripcion FROM grupos_contables WHERE codigo = '" . $aRecData['cod_cuenta_'] . "' ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + descripcion FROM grupos_contables WHERE codigo = '" . $aRecData['cod_cuenta_'] . "' ORDER BY codigo, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||descripcion FROM grupos_contables WHERE codigo = '" . $aRecData['cod_cuenta_'] . "' ORDER BY codigo, descripcion";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||descripcion FROM grupos_contables WHERE codigo = '" . $aRecData['cod_cuenta_'] . "' ORDER BY codigo, descripcion";
   }
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_productos_fast_gcontable_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_productos_fast_gcontable_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['Lookup_cod_cuenta_'][] = $rs->fields[0];
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
          $val_output = "";
          foreach ($aLookup as $iLookup => $aLookupDados)
          {
              $SV_cmp = $this->cod_cuenta_;
              $this->nm_clear_val("cod_cuenta_");
              if (isset($aLookupDados[$this->cod_cuenta_]))
              {
                  $val_output = $aLookupDados[$this->cod_cuenta_];
              }
              $this->cod_cuenta_ = $SV_cmp;
          }
          $this->NM_ajax_info['fldList']['cod_cuenta__autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          $tmpLabel_cod_cuenta_ = $val_output;

                  $this->NM_ajax_info['fldList']['cod_cuenta_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['cod_cuenta_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->cod_cuenta_)));
                  $this->NM_ajax_info['fldList']['cod_cuenta_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_cod_cuenta_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cod_cuenta_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cod_cuenta_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cod_cuenta_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cod_cuenta_' . $this->nmgp_refresh_row] = "on";
                      }
                  }


                  $this->nm_tira_formatacao();

                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->idprod_ = substr($this->Db->qstr($this->idprod_), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idprod = $this->idprod_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idprod = $this->idprod_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idprod = $this->idprod_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idprod = $this->idprod_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idprod = $this->idprod_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idprod = $this->idprod_ "); 
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
                          form_productos_fast_gcontable_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['db_changed'] = true;

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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['parms'] = "idprod_?#?$this->idprod_?@?"; 
      }
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idprod_ = null === $this->idprod_ ? null : substr($this->Db->qstr($this->idprod_), 1, -1); 
      } 
   }
//---------- 
   function nm_select_banco() 
   { 
      global $nm_form_submit, $sc_seq_vert, $sc_check_incl, $teste_validade, $sc_where;
 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['rows']))
      {
          $this->sc_max_reg = $_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['rows'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['rows_ins']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['rows_ins']))
      {
          $this->sc_max_reg_incl = $_SESSION['scriptcase']['sc_apl_conf']['form_productos_fast_gcontable']['rows_ins'];
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_qtd_reg']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_qtd_reg'])
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_liga_qtd_reg'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sc_max_reg']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sc_max_reg'] > 0 || strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sc_max_reg']) == "all"))
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sc_max_reg'];
      } 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
      $this->form_vert_form_productos_fast_gcontable = array();
      if ($this->nmgp_opcao != "novo") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['parms'] = ""; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($this->sc_teve_excl)
      {
          $this->nmgp_opcao = "avanca";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] -= $this->sc_max_reg;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] = 0;
      }
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_filter'] . ")";
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
          if (null != $this->idprod_)
          {
              $aNewWhereCond[] = "idprod = " . $this->idprod_;
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
          if ($this->app_is_initializing || $this->sc_teve_excl || $this->sc_teve_incl || (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['total']))
          {
              $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where;
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
              $rt = $this->Db->Execute($nmgp_select);
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit;
              }
              $qt_geral_reg_form_productos_fast_gcontable = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['total'] = $qt_geral_reg_form_productos_fast_gcontable;
              $rt->Close();
          }
      if ((isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['total']) || $this->sc_teve_excl || $this->sc_teve_incl)
      { 
          if (!$this->sc_teve_excl && !$this->sc_teve_incl) 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] = 0; 
          } 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->idprod_))
          {
              $Reg_OK      = false;
              $Count_start = -1;
              $sc_order_by = "";
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Sel_Chave = "idprod"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Sel_Chave = "idprod"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Sel_Chave = "idprod"; 
              }
              else  
              {
                  $Sel_Chave = "idprod"; 
              }
              $nmgp_select = "SELECT " . $Sel_Chave . " from " . $this->Ini->nm_tabela . $sc_where; 
              $sc_order_by = "idprod DESC";
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
                  if ($rt->fields[0] == $this->idprod_)
                  { 
                      $Reg_OK = true;
                  }  
                  $Count_start++;
                  $rt->MoveNext();
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] = $Count_start;
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_productos_fast_gcontable = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['total'];
      } 
      if ($this->nmgp_opcao == "inicio" || $this->nmgp_opcao == "ordem") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_productos_fast_gcontable) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] += $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] > $qt_geral_reg_form_productos_fast_gcontable)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] = $qt_geral_reg_form_productos_fast_gcontable - $this->sc_max_reg; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] = 0; 
              }
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] -= $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] = ($qt_geral_reg_form_productos_fast_gcontable + 1) - $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] = 0; 
          }
      } 
      }
      $Cmps_ord_def = array();
      $sc_order_by  = "";
      $sc_order_by = "idprod DESC";
      $sc_order_by = str_replace("order by ", "", $sc_order_by);
      $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
      if (!empty($sc_order_by))
      {
          $sc_order_by = " order by $sc_order_by "; 
      }
      if ($this->nmgp_opcao == "ordem" && in_array($this->nmgp_ordem, $Cmps_ord_def)) 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['ordem_cmp'] != $this->nmgp_ordem)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['ordem_cmp'] = $this->nmgp_ordem; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['ordem_ord'] = ' asc'; 
          }
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['ordem_ord'] == ' asc')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['ordem_ord'] = ' desc'; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['ordem_ord'] = ' asc'; 
          }
      } 
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['ordem_cmp'])) 
      { 
          $sc_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['ordem_cmp'] . $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['ordem_ord']; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT idprod, codigobar, codigoprod, nompro, unidmaymen, unimay, unimen, costomay, costomen, recmayamen, preciomen, preciomen2, preciomen3, precio2, preciomay, preciofull, stockmay, stockmen, idgrup, idpro1, idpro2, idiva, otro, otro2, colores, tallas, sabores, imagenprod, imconsumo, escombo, idcombo, precio_editable, cod_cuenta, fecha_vencimiento, fecha_fab, lote, serial_codbarras, maneja_tcs_lfs, control_costo, por_preciominimo, id_marca, id_linea, str_replace (convert(char(10),ultima_compra,102), '.', '-') + ' ' + convert(char(8),ultima_compra,20), n_ultcompra, str_replace (convert(char(10),ultima_venta,102), '.', '-') + ' ' + convert(char(8),ultima_venta,20), n_ultventa, codigobar2, codigobar3, nube, existencia, multiple_escala, en_base_a, activo, tipo_producto, costo_prom from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT idprod, codigobar, codigoprod, nompro, unidmaymen, unimay, unimen, costomay, costomen, recmayamen, preciomen, preciomen2, preciomen3, precio2, preciomay, preciofull, stockmay, stockmen, idgrup, idpro1, idpro2, idiva, otro, otro2, colores, tallas, sabores, imagenprod, imconsumo, escombo, idcombo, precio_editable, cod_cuenta, fecha_vencimiento, fecha_fab, lote, serial_codbarras, maneja_tcs_lfs, control_costo, por_preciominimo, id_marca, id_linea, convert(char(23),ultima_compra,121), n_ultcompra, convert(char(23),ultima_venta,121), n_ultventa, codigobar2, codigobar3, nube, existencia, multiple_escala, en_base_a, activo, tipo_producto, costo_prom from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT idprod, codigobar, codigoprod, nompro, unidmaymen, unimay, unimen, costomay, costomen, recmayamen, preciomen, preciomen2, preciomen3, precio2, preciomay, preciofull, stockmay, stockmen, idgrup, idpro1, idpro2, idiva, otro, otro2, colores, tallas, sabores, imagenprod, imconsumo, escombo, idcombo, precio_editable, cod_cuenta, fecha_vencimiento, fecha_fab, lote, serial_codbarras, maneja_tcs_lfs, control_costo, por_preciominimo, id_marca, id_linea, ultima_compra, n_ultcompra, ultima_venta, n_ultventa, codigobar2, codigobar3, nube, existencia, multiple_escala, en_base_a, activo, tipo_producto, costo_prom from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT idprod, codigobar, codigoprod, nompro, unidmaymen, unimay, unimen, costomay, costomen, recmayamen, preciomen, preciomen2, preciomen3, precio2, preciomay, preciofull, stockmay, stockmen, idgrup, idpro1, idpro2, idiva, otro, otro2, colores, tallas, sabores, LOTOFILE(imagenprod, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_imagenprod', 'client'), imconsumo, escombo, idcombo, precio_editable, cod_cuenta, fecha_vencimiento, fecha_fab, lote, serial_codbarras, maneja_tcs_lfs, control_costo, por_preciominimo, id_marca, id_linea, EXTEND(ultima_compra, YEAR TO DAY), n_ultcompra, EXTEND(ultima_venta, YEAR TO DAY), n_ultventa, codigobar2, codigobar3, nube, existencia, multiple_escala, en_base_a, activo, tipo_producto, costo_prom from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      else 
      { 
          $nmgp_select = "SELECT idprod, codigobar, codigoprod, nompro, unidmaymen, unimay, unimen, costomay, costomen, recmayamen, preciomen, preciomen2, preciomen3, precio2, preciomay, preciofull, stockmay, stockmen, idgrup, idpro1, idpro2, idiva, otro, otro2, colores, tallas, sabores, imagenprod, imconsumo, escombo, idcombo, precio_editable, cod_cuenta, fecha_vencimiento, fecha_fab, lote, serial_codbarras, maneja_tcs_lfs, control_costo, por_preciominimo, id_marca, id_linea, ultima_compra, n_ultcompra, ultima_venta, n_ultventa, codigobar2, codigobar3, nube, existencia, multiple_escala, en_base_a, activo, tipo_producto, costo_prom from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['run_iframe'] == "R")
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          else 
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start']) ; 
              } 
              else  
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
                  $rs = $this->Db->Execute($nmgp_select) ; 
                  if (!$rs === false && !$rs->EOF) 
                  { 
                      $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start']) ;  
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
          if ($rs->EOF && $this->nmgp_botoes['new'] != "on" && !$this->proc_fast_search)
          {
              $this->nmgp_form_empty = true;
          }
          if ($rs->EOF)
          {
              $sc_seq_vert = 0; 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_filter']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['empty_filter'] = true;
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
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['run_iframe'] == "R")
              { 
                  $this->sc_max_reg++;
              } 
              }
              $this->idprod_ = $rs->fields[0] ; 
              $this->nmgp_dados_select['idprod_'] = $this->idprod_;
              $this->codigobar_ = $rs->fields[1] ; 
              $this->nmgp_dados_select['codigobar_'] = $this->codigobar_;
              $this->codigoprod_ = $rs->fields[2] ; 
              $this->nmgp_dados_select['codigoprod_'] = $this->codigoprod_;
              $this->nompro_ = $rs->fields[3] ; 
              $this->nmgp_dados_select['nompro_'] = $this->nompro_;
              $this->unidmaymen_ = $rs->fields[4] ; 
              $this->nmgp_dados_select['unidmaymen_'] = $this->unidmaymen_;
              $this->unimay_ = $rs->fields[5] ; 
              $this->nmgp_dados_select['unimay_'] = $this->unimay_;
              $this->unimen_ = $rs->fields[6] ; 
              $this->nmgp_dados_select['unimen_'] = $this->unimen_;
              $this->costomay_ = $rs->fields[7] ; 
              $this->nmgp_dados_select['costomay_'] = $this->costomay_;
              $this->costomen_ = trim($rs->fields[8]) ; 
              $this->nmgp_dados_select['costomen_'] = $this->costomen_;
              $this->recmayamen_ = trim($rs->fields[9]) ; 
              $this->nmgp_dados_select['recmayamen_'] = $this->recmayamen_;
              $this->preciomen_ = trim($rs->fields[10]) ; 
              $this->nmgp_dados_select['preciomen_'] = $this->preciomen_;
              $this->preciomen2_ = trim($rs->fields[11]) ; 
              $this->nmgp_dados_select['preciomen2_'] = $this->preciomen2_;
              $this->preciomen3_ = trim($rs->fields[12]) ; 
              $this->nmgp_dados_select['preciomen3_'] = $this->preciomen3_;
              $this->precio2_ = trim($rs->fields[13]) ; 
              $this->nmgp_dados_select['precio2_'] = $this->precio2_;
              $this->preciomay_ = trim($rs->fields[14]) ; 
              $this->nmgp_dados_select['preciomay_'] = $this->preciomay_;
              $this->preciofull_ = trim($rs->fields[15]) ; 
              $this->nmgp_dados_select['preciofull_'] = $this->preciofull_;
              $this->stockmay_ = trim($rs->fields[16]) ; 
              $this->nmgp_dados_select['stockmay_'] = $this->stockmay_;
              $this->stockmen_ = trim($rs->fields[17]) ; 
              $this->nmgp_dados_select['stockmen_'] = $this->stockmen_;
              $this->idgrup_ = $rs->fields[18] ; 
              $this->nmgp_dados_select['idgrup_'] = $this->idgrup_;
              $this->idpro1_ = $rs->fields[19] ; 
              $this->nmgp_dados_select['idpro1_'] = $this->idpro1_;
              $this->idpro2_ = $rs->fields[20] ; 
              $this->nmgp_dados_select['idpro2_'] = $this->idpro2_;
              $this->idiva_ = $rs->fields[21] ; 
              $this->nmgp_dados_select['idiva_'] = $this->idiva_;
              $this->otro_ = $rs->fields[22] ; 
              $this->nmgp_dados_select['otro_'] = $this->otro_;
              $this->otro2_ = $rs->fields[23] ; 
              $this->nmgp_dados_select['otro2_'] = $this->otro2_;
              $this->colores_ = $rs->fields[24] ; 
              $this->nmgp_dados_select['colores_'] = $this->colores_;
              $this->tallas_ = $rs->fields[25] ; 
              $this->nmgp_dados_select['tallas_'] = $this->tallas_;
              $this->sabores_ = $rs->fields[26] ; 
              $this->nmgp_dados_select['sabores_'] = $this->sabores_;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->imagenprod_ = $this->Db->BlobDecode($rs->fields[27]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_oracle')
              { 
                  $this->imagenprod_ = $this->Db->BlobDecode($rs->fields[27]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[27]) && !empty($rs->fields[27]) && is_file($rs->fields[27])) 
                  { 
                     $this->imagenprod_ = file_get_contents($rs->fields[27]); 
                  }else 
                  { 
                     $this->imagenprod_ = ''; 
                  } 
              } 
              else
              { 
                  $this->imagenprod_ = $rs->fields[27] ; 
              } 
              $this->nmgp_dados_select['imagenprod_'] = $this->imagenprod_;
              $this->imconsumo_ = $rs->fields[28] ; 
              $this->nmgp_dados_select['imconsumo_'] = $this->imconsumo_;
              $this->escombo_ = $rs->fields[29] ; 
              $this->nmgp_dados_select['escombo_'] = $this->escombo_;
              $this->idcombo_ = $rs->fields[30] ; 
              $this->nmgp_dados_select['idcombo_'] = $this->idcombo_;
              $this->precio_editable_ = $rs->fields[31] ; 
              $this->nmgp_dados_select['precio_editable_'] = $this->precio_editable_;
              $this->cod_cuenta_ = $rs->fields[32] ; 
              $this->nmgp_dados_select['cod_cuenta_'] = $this->cod_cuenta_;
              $this->fecha_vencimiento_ = $rs->fields[33] ; 
              $this->nmgp_dados_select['fecha_vencimiento_'] = $this->fecha_vencimiento_;
              $this->fecha_fab_ = $rs->fields[34] ; 
              $this->nmgp_dados_select['fecha_fab_'] = $this->fecha_fab_;
              $this->lote_ = $rs->fields[35] ; 
              $this->nmgp_dados_select['lote_'] = $this->lote_;
              $this->serial_codbarras_ = $rs->fields[36] ; 
              $this->nmgp_dados_select['serial_codbarras_'] = $this->serial_codbarras_;
              $this->maneja_tcs_lfs_ = $rs->fields[37] ; 
              $this->nmgp_dados_select['maneja_tcs_lfs_'] = $this->maneja_tcs_lfs_;
              $this->control_costo_ = $rs->fields[38] ; 
              $this->nmgp_dados_select['control_costo_'] = $this->control_costo_;
              $this->por_preciominimo_ = trim($rs->fields[39]) ; 
              $this->nmgp_dados_select['por_preciominimo_'] = $this->por_preciominimo_;
              $this->id_marca_ = $rs->fields[40] ; 
              $this->nmgp_dados_select['id_marca_'] = $this->id_marca_;
              $this->id_linea_ = $rs->fields[41] ; 
              $this->nmgp_dados_select['id_linea_'] = $this->id_linea_;
              $this->ultima_compra_ = $rs->fields[42] ; 
              $this->nmgp_dados_select['ultima_compra_'] = $this->ultima_compra_;
              $this->n_ultcompra_ = $rs->fields[43] ; 
              $this->nmgp_dados_select['n_ultcompra_'] = $this->n_ultcompra_;
              $this->ultima_venta_ = $rs->fields[44] ; 
              $this->nmgp_dados_select['ultima_venta_'] = $this->ultima_venta_;
              $this->n_ultventa_ = $rs->fields[45] ; 
              $this->nmgp_dados_select['n_ultventa_'] = $this->n_ultventa_;
              $this->codigobar2_ = $rs->fields[46] ; 
              $this->nmgp_dados_select['codigobar2_'] = $this->codigobar2_;
              $this->codigobar3_ = $rs->fields[47] ; 
              $this->nmgp_dados_select['codigobar3_'] = $this->codigobar3_;
              $this->nube_ = $rs->fields[48] ; 
              $this->nmgp_dados_select['nube_'] = $this->nube_;
              $this->existencia_ = trim($rs->fields[49]) ; 
              $this->nmgp_dados_select['existencia_'] = $this->existencia_;
              $this->multiple_escala_ = $rs->fields[50] ; 
              $this->nmgp_dados_select['multiple_escala_'] = $this->multiple_escala_;
              $this->en_base_a_ = $rs->fields[51] ; 
              $this->nmgp_dados_select['en_base_a_'] = $this->en_base_a_;
              $this->activo_ = $rs->fields[52] ; 
              $this->nmgp_dados_select['activo_'] = $this->activo_;
              $this->tipo_producto_ = $rs->fields[53] ; 
              $this->nmgp_dados_select['tipo_producto_'] = $this->tipo_producto_;
              $this->costo_prom_ = trim($rs->fields[54]) ; 
              $this->nmgp_dados_select['costo_prom_'] = $this->costo_prom_;
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->idprod_ = (string)$this->idprod_; 
              $this->costomay_ = (string)$this->costomay_; 
              $this->costomen_ = (strpos(strtolower($this->costomen_), "e")) ? (float)$this->costomen_ : $this->costomen_; 
              $this->costomen_ = (string)$this->costomen_; 
              $this->recmayamen_ = (strpos(strtolower($this->recmayamen_), "e")) ? (float)$this->recmayamen_ : $this->recmayamen_; 
              $this->recmayamen_ = (string)$this->recmayamen_; 
              $this->preciomen_ = (strpos(strtolower($this->preciomen_), "e")) ? (float)$this->preciomen_ : $this->preciomen_; 
              $this->preciomen_ = (string)$this->preciomen_; 
              $this->preciomen2_ = (strpos(strtolower($this->preciomen2_), "e")) ? (float)$this->preciomen2_ : $this->preciomen2_; 
              $this->preciomen2_ = (string)$this->preciomen2_; 
              $this->preciomen3_ = (strpos(strtolower($this->preciomen3_), "e")) ? (float)$this->preciomen3_ : $this->preciomen3_; 
              $this->preciomen3_ = (string)$this->preciomen3_; 
              $this->precio2_ = (strpos(strtolower($this->precio2_), "e")) ? (float)$this->precio2_ : $this->precio2_; 
              $this->precio2_ = (string)$this->precio2_; 
              $this->preciomay_ = (strpos(strtolower($this->preciomay_), "e")) ? (float)$this->preciomay_ : $this->preciomay_; 
              $this->preciomay_ = (string)$this->preciomay_; 
              $this->preciofull_ = (strpos(strtolower($this->preciofull_), "e")) ? (float)$this->preciofull_ : $this->preciofull_; 
              $this->preciofull_ = (string)$this->preciofull_; 
              $this->stockmay_ = (strpos(strtolower($this->stockmay_), "e")) ? (float)$this->stockmay_ : $this->stockmay_; 
              $this->stockmay_ = (string)$this->stockmay_; 
              $this->stockmen_ = (strpos(strtolower($this->stockmen_), "e")) ? (float)$this->stockmen_ : $this->stockmen_; 
              $this->stockmen_ = (string)$this->stockmen_; 
              $this->idgrup_ = (string)$this->idgrup_; 
              $this->idpro1_ = (string)$this->idpro1_; 
              $this->idpro2_ = (string)$this->idpro2_; 
              $this->idiva_ = (string)$this->idiva_; 
              $this->otro_ = (string)$this->otro_; 
              $this->otro2_ = (string)$this->otro2_; 
              $this->imconsumo_ = (string)$this->imconsumo_; 
              $this->idcombo_ = (string)$this->idcombo_; 
              $this->por_preciominimo_ = (strpos(strtolower($this->por_preciominimo_), "e")) ? (float)$this->por_preciominimo_ : $this->por_preciominimo_; 
              $this->por_preciominimo_ = (string)$this->por_preciominimo_; 
              $this->id_marca_ = (string)$this->id_marca_; 
              $this->id_linea_ = (string)$this->id_linea_; 
              $this->existencia_ = (strpos(strtolower($this->existencia_), "e")) ? (float)$this->existencia_ : $this->existencia_; 
              $this->existencia_ = (string)$this->existencia_; 
              $this->costo_prom_ = (strpos(strtolower($this->costo_prom_), "e")) ? (float)$this->costo_prom_ : $this->costo_prom_; 
              $this->costo_prom_ = (string)$this->costo_prom_; 
              if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['parms'])) 
              { 
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['parms'] = "idprod_?#?$this->idprod_?@?";
              } 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sub_dir'][0]  = "";
              $this->nm_proc_onload_record($sc_seq_vert);
              $this->storeRecordState($sc_seq_vert);
//
//-- 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dados_select'][$sc_seq_vert] = $this->nmgp_dados_select;
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['codigobar_'] =  $this->codigobar_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['nompro_'] =  $this->nompro_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['cod_cuenta_'] =  $this->cod_cuenta_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['idprod_'] =  $this->idprod_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['codigoprod_'] =  $this->codigoprod_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['unidmaymen_'] =  $this->unidmaymen_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['unimay_'] =  $this->unimay_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['unimen_'] =  $this->unimen_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['costomay_'] =  $this->costomay_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['costomen_'] =  $this->costomen_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['recmayamen_'] =  $this->recmayamen_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['preciomen_'] =  $this->preciomen_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['preciomen2_'] =  $this->preciomen2_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['preciomen3_'] =  $this->preciomen3_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['precio2_'] =  $this->precio2_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['preciomay_'] =  $this->preciomay_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['preciofull_'] =  $this->preciofull_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['stockmay_'] =  $this->stockmay_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['stockmen_'] =  $this->stockmen_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['idgrup_'] =  $this->idgrup_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['idpro1_'] =  $this->idpro1_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['idpro2_'] =  $this->idpro2_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['idiva_'] =  $this->idiva_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['otro_'] =  $this->otro_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['otro2_'] =  $this->otro2_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['colores_'] =  $this->colores_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['tallas_'] =  $this->tallas_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['sabores_'] =  $this->sabores_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['imagenprod_'] =  $this->imagenprod_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['imagenprod__limpa'] =  $this->imagenprod__limpa; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['imconsumo_'] =  $this->imconsumo_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['escombo_'] =  $this->escombo_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['idcombo_'] =  $this->idcombo_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['precio_editable_'] =  $this->precio_editable_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['fecha_vencimiento_'] =  $this->fecha_vencimiento_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['fecha_fab_'] =  $this->fecha_fab_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['lote_'] =  $this->lote_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['serial_codbarras_'] =  $this->serial_codbarras_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['maneja_tcs_lfs_'] =  $this->maneja_tcs_lfs_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['control_costo_'] =  $this->control_costo_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['por_preciominimo_'] =  $this->por_preciominimo_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['id_marca_'] =  $this->id_marca_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['id_linea_'] =  $this->id_linea_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['ultima_compra_'] =  $this->ultima_compra_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['n_ultcompra_'] =  $this->n_ultcompra_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['ultima_venta_'] =  $this->ultima_venta_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['n_ultventa_'] =  $this->n_ultventa_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['codigobar2_'] =  $this->codigobar2_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['codigobar3_'] =  $this->codigobar3_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['nube_'] =  $this->nube_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['existencia_'] =  $this->existencia_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['multiple_escala_'] =  $this->multiple_escala_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['en_base_a_'] =  $this->en_base_a_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['activo_'] =  $this->activo_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['tipo_producto_'] =  $this->tipo_producto_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['costo_prom_'] =  $this->costo_prom_; 
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
          ksort ($this->form_vert_form_productos_fast_gcontable); 
          $rs->Close(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_qtd'] = $sc_seq_vert + $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] - 1;
          if ('total' == $this->form_paginacao)
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $this->sc_max_reg; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $this->sc_max_reg; 
          }
          else
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['total'] + 1; 
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
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] < (($qt_geral_reg_form_productos_fast_gcontable + 1) - $this->sc_max_reg);
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['opcao'] = '';
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
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['embutida_multi']) 
          { 
          } 
          elseif ($this->Embutida_form) 
          { 
              $this->sc_max_reg_incl = 0; 
          } 
          while ($sc_seq_vert <= $this->sc_max_reg_incl) 
          { 
              $this->codigobar_ = "";  
              $this->nompro_ = "";  
              $this->cod_cuenta_ = "";  
              $this->nm_proc_onload_record($sc_seq_vert);
              if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['foreign_key']))
              {
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['foreign_key'] as $sFKName => $sFKValue)
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
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['codigobar_'] =  $this->codigobar_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['nompro_'] =  $this->nompro_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['cod_cuenta_'] =  $this->cod_cuenta_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['idprod_'] =  $this->idprod_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['codigoprod_'] =  $this->codigoprod_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['unidmaymen_'] =  $this->unidmaymen_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['unimay_'] =  $this->unimay_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['unimen_'] =  $this->unimen_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['costomay_'] =  $this->costomay_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['costomen_'] =  $this->costomen_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['recmayamen_'] =  $this->recmayamen_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['preciomen_'] =  $this->preciomen_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['preciomen2_'] =  $this->preciomen2_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['preciomen3_'] =  $this->preciomen3_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['precio2_'] =  $this->precio2_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['preciomay_'] =  $this->preciomay_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['preciofull_'] =  $this->preciofull_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['stockmay_'] =  $this->stockmay_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['stockmen_'] =  $this->stockmen_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['idgrup_'] =  $this->idgrup_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['idpro1_'] =  $this->idpro1_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['idpro2_'] =  $this->idpro2_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['idiva_'] =  $this->idiva_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['otro_'] =  $this->otro_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['otro2_'] =  $this->otro2_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['colores_'] =  $this->colores_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['tallas_'] =  $this->tallas_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['sabores_'] =  $this->sabores_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['imagenprod_'] =  $this->imagenprod_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['imagenprod__limpa'] =  $this->imagenprod__limpa; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['imconsumo_'] =  $this->imconsumo_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['escombo_'] =  $this->escombo_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['idcombo_'] =  $this->idcombo_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['precio_editable_'] =  $this->precio_editable_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['fecha_vencimiento_'] =  $this->fecha_vencimiento_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['fecha_fab_'] =  $this->fecha_fab_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['lote_'] =  $this->lote_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['serial_codbarras_'] =  $this->serial_codbarras_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['maneja_tcs_lfs_'] =  $this->maneja_tcs_lfs_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['control_costo_'] =  $this->control_costo_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['por_preciominimo_'] =  $this->por_preciominimo_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['id_marca_'] =  $this->id_marca_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['id_linea_'] =  $this->id_linea_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['ultima_compra_'] =  $this->ultima_compra_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['n_ultcompra_'] =  $this->n_ultcompra_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['ultima_venta_'] =  $this->ultima_venta_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['n_ultventa_'] =  $this->n_ultventa_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['codigobar2_'] =  $this->codigobar2_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['codigobar3_'] =  $this->codigobar3_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['nube_'] =  $this->nube_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['existencia_'] =  $this->existencia_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['multiple_escala_'] =  $this->multiple_escala_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['en_base_a_'] =  $this->en_base_a_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['activo_'] =  $this->activo_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['tipo_producto_'] =  $this->tipo_producto_; 
             $this->form_vert_form_productos_fast_gcontable[$sc_seq_vert]['costo_prom_'] =  $this->costo_prom_; 
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
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['reg_start'] + $this->sc_max_reg;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['record_state'][$sc_seq_vert]['buttons']['update'];
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_productos_fast_gcontable_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['retorno_edit'] . "';";
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
        $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['table_refresh'] = true;
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("codigobar_", "nompro_", "cod_cuenta_"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['csrf_token'];
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

   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_productos_fast_gcontable_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "codigobar", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nompro", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_cod_cuenta_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "cod_cuenta", $arg_search, $data_lookup);
              }
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_productos_fast_gcontable = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['total'] = $qt_geral_reg_form_productos_fast_gcontable;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_productos_fast_gcontable_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_productos_fast_gcontable_pack_ajax_response();
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
      $nm_numeric[] = "idprod";$nm_numeric[] = "costomay";$nm_numeric[] = "costomen";$nm_numeric[] = "recmayamen";$nm_numeric[] = "preciomen";$nm_numeric[] = "preciomen2";$nm_numeric[] = "preciomen3";$nm_numeric[] = "precio2";$nm_numeric[] = "preciomay";$nm_numeric[] = "preciofull";$nm_numeric[] = "stockmay";$nm_numeric[] = "stockmen";$nm_numeric[] = "idgrup";$nm_numeric[] = "idpro1";$nm_numeric[] = "idpro2";$nm_numeric[] = "idiva";$nm_numeric[] = "otro";$nm_numeric[] = "otro2";$nm_numeric[] = "imconsumo";$nm_numeric[] = "idcombo";$nm_numeric[] = "por_preciominimo";$nm_numeric[] = "id_marca";$nm_numeric[] = "id_linea";$nm_numeric[] = "existencia";$nm_numeric[] = "costo_prom";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['decimal_db'] == ".")
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
      $Nm_datas['ultima_compra'] = "date";$Nm_datas['ultima_venta'] = "date";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['SC_sep_date1'];
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
   function SC_lookup_cod_cuenta_($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT codigo + ' - ' + descripcion, codigo FROM grupos_contables WHERE (codigo + ' - ' + descripcion LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(codigo,' - ',descripcion), codigo FROM grupos_contables WHERE (concat(codigo,' - ',descripcion) LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT codigo&' - '&descripcion, codigo FROM grupos_contables WHERE (codigo&' - '&descripcion LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT codigo||' - '||descripcion, codigo FROM grupos_contables WHERE (codigo||' - '||descripcion LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT codigo + ' - ' + descripcion, codigo FROM grupos_contables WHERE (codigo + ' - ' + descripcion LIKE '%$campo%')" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT codigo||' - '||descripcion, codigo FROM grupos_contables WHERE (codigo||' - '||descripcion LIKE '%$campo%')" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT codigo||' - '||descripcion, codigo FROM grupos_contables WHERE (codigo||' - '||descripcion LIKE '%$campo%')" ; 
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
       $nmgp_saida_form = "form_productos_fast_gcontable_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_productos_fast_gcontable_fim.php";
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
       form_productos_fast_gcontable_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_productos_fast_gcontable']['masterValue']);
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
            case "balterarsel":
                return array("sc_b_upd_t.sc-unique-btn-1");
                break;
            case "help":
                return array("sc_b_hlp_t");
                break;
            case "exit":
                return array("sc_b_sai_t.sc-unique-btn-2", "sc_b_sai_t.sc-unique-btn-4", "sc_b_sai_t.sc-unique-btn-3");
                break;
            case "birpara":
                return array("brec_b");
                break;
            case "first":
                return array("sc_b_ini_b.sc-unique-btn-5");
                break;
            case "back":
                return array("sc_b_ret_b.sc-unique-btn-6");
                break;
            case "forward":
                return array("sc_b_avc_b.sc-unique-btn-7");
                break;
            case "last":
                return array("sc_b_fim_b.sc-unique-btn-8");
                break;
        }

        return array($buttonName);
    } // getButtonIds

}
?>
