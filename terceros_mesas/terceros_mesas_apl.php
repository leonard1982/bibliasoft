<?php
//
class terceros_mesas_apl
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
   var $idtercero_;
   var $documento_;
   var $nombres_;
   var $direccion_;
   var $tel_cel_;
   var $nacimiento_;
   var $sexo_;
   var $sexo__1;
   var $urlmail_;
   var $fechault_;
   var $saldo_;
   var $afiliacion_;
   var $idmuni_;
   var $idmuni__1;
   var $observaciones_;
   var $credito_;
   var $credito__1;
   var $cupo_;
   var $listaprecios_;
   var $listaprecios__1;
   var $loatiende_;
   var $loatiende__1;
   var $con_actual_;
   var $con_actual__hora;
   var $efec_retencion_;
   var $efec_retencion__1;
   var $regimen_;
   var $regimen__1;
   var $tipo_;
   var $tipo__1;
   var $cliente_;
   var $cliente__1;
   var $empleado_;
   var $empleado__1;
   var $proveedor_;
   var $proveedor__1;
   var $contacto_;
   var $telefonos_prov_;
   var $email_;
   var $url_;
   var $creditoprov_;
   var $creditoprov__1;
   var $dias_;
   var $fechultcomp_;
   var $saldoapagar_;
   var $autoretenedor_;
   var $autoretenedor__1;
   var $tipo_documento_;
   var $tipo_documento__1;
   var $dv_;
   var $nombre1_;
   var $nombre2_;
   var $apellido1_;
   var $apellido2_;
   var $sucur_cliente_;
   var $sucur_cliente__1;
   var $representante_;
   var $imagenter_;
   var $imagenter__scfile_name;
   var $imagenter__ul_name;
   var $imagenter__scfile_type;
   var $imagenter__ul_type;
   var $imagenter__limpa;
   var $imagenter__salva;
   var $out_imagenter_;
   var $es_restaurante_;
   var $cupodis_;
   var $departamento_;
   var $departamento__1;
   var $relleno2_;
   var $sucursales_;
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
   var $form_vert_terceros_mesas = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = true;
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
          if (isset($this->NM_ajax_info['param']['apellido1_']))
          {
              $this->apellido1_ = $this->NM_ajax_info['param']['apellido1_'];
          }
          if (isset($this->NM_ajax_info['param']['apellido2_']))
          {
              $this->apellido2_ = $this->NM_ajax_info['param']['apellido2_'];
          }
          if (isset($this->NM_ajax_info['param']['cliente_']))
          {
              $this->cliente_ = $this->NM_ajax_info['param']['cliente_'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['departamento_']))
          {
              $this->departamento_ = $this->NM_ajax_info['param']['departamento_'];
          }
          if (isset($this->NM_ajax_info['param']['direccion_']))
          {
              $this->direccion_ = $this->NM_ajax_info['param']['direccion_'];
          }
          if (isset($this->NM_ajax_info['param']['documento_']))
          {
              $this->documento_ = $this->NM_ajax_info['param']['documento_'];
          }
          if (isset($this->NM_ajax_info['param']['dv_']))
          {
              $this->dv_ = $this->NM_ajax_info['param']['dv_'];
          }
          if (isset($this->NM_ajax_info['param']['es_restaurante_']))
          {
              $this->es_restaurante_ = $this->NM_ajax_info['param']['es_restaurante_'];
          }
          if (isset($this->NM_ajax_info['param']['idmuni_']))
          {
              $this->idmuni_ = $this->NM_ajax_info['param']['idmuni_'];
          }
          if (isset($this->NM_ajax_info['param']['idtercero_']))
          {
              $this->idtercero_ = $this->NM_ajax_info['param']['idtercero_'];
          }
          if (isset($this->NM_ajax_info['param']['imagenter_']))
          {
              $this->imagenter_ = $this->NM_ajax_info['param']['imagenter_'];
          }
          if (isset($this->NM_ajax_info['param']['imagenter__limpa']))
          {
              $this->imagenter__limpa = $this->NM_ajax_info['param']['imagenter__limpa'];
          }
          if (isset($this->NM_ajax_info['param']['imagenter__ul_name']))
          {
              $this->imagenter__ul_name = $this->NM_ajax_info['param']['imagenter__ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['imagenter__ul_type']))
          {
              $this->imagenter__ul_type = $this->NM_ajax_info['param']['imagenter__ul_type'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_row']))
          {
              $this->nmgp_refresh_row = $this->NM_ajax_info['param']['nmgp_refresh_row'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['nombre1_']))
          {
              $this->nombre1_ = $this->NM_ajax_info['param']['nombre1_'];
          }
          if (isset($this->NM_ajax_info['param']['nombre2_']))
          {
              $this->nombre2_ = $this->NM_ajax_info['param']['nombre2_'];
          }
          if (isset($this->NM_ajax_info['param']['nombres_']))
          {
              $this->nombres_ = $this->NM_ajax_info['param']['nombres_'];
          }
          if (isset($this->NM_ajax_info['param']['observaciones_']))
          {
              $this->observaciones_ = $this->NM_ajax_info['param']['observaciones_'];
          }
          if (isset($this->NM_ajax_info['param']['regimen_']))
          {
              $this->regimen_ = $this->NM_ajax_info['param']['regimen_'];
          }
          if (isset($this->NM_ajax_info['param']['representante_']))
          {
              $this->representante_ = $this->NM_ajax_info['param']['representante_'];
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
          if (isset($this->NM_ajax_info['param']['sexo_']))
          {
              $this->sexo_ = $this->NM_ajax_info['param']['sexo_'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_']))
          {
              $this->tipo_ = $this->NM_ajax_info['param']['tipo_'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_documento_']))
          {
              $this->tipo_documento_ = $this->NM_ajax_info['param']['tipo_documento_'];
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
      $this->sc_conv_var['idtercero'] = "idtercero_";
      $this->sc_conv_var['documento'] = "documento_";
      $this->sc_conv_var['nombres'] = "nombres_";
      $this->sc_conv_var['direccion'] = "direccion_";
      $this->sc_conv_var['tel_cel'] = "tel_cel_";
      $this->sc_conv_var['nacimiento'] = "nacimiento_";
      $this->sc_conv_var['sexo'] = "sexo_";
      $this->sc_conv_var['urlmail'] = "urlmail_";
      $this->sc_conv_var['fechault'] = "fechault_";
      $this->sc_conv_var['saldo'] = "saldo_";
      $this->sc_conv_var['afiliacion'] = "afiliacion_";
      $this->sc_conv_var['idmuni'] = "idmuni_";
      $this->sc_conv_var['observaciones'] = "observaciones_";
      $this->sc_conv_var['credito'] = "credito_";
      $this->sc_conv_var['cupo'] = "cupo_";
      $this->sc_conv_var['listaprecios'] = "listaprecios_";
      $this->sc_conv_var['loatiende'] = "loatiende_";
      $this->sc_conv_var['con_actual'] = "con_actual_";
      $this->sc_conv_var['efec_retencion'] = "efec_retencion_";
      $this->sc_conv_var['regimen'] = "regimen_";
      $this->sc_conv_var['tipo'] = "tipo_";
      $this->sc_conv_var['cliente'] = "cliente_";
      $this->sc_conv_var['empleado'] = "empleado_";
      $this->sc_conv_var['proveedor'] = "proveedor_";
      $this->sc_conv_var['contacto'] = "contacto_";
      $this->sc_conv_var['telefonos_prov'] = "telefonos_prov_";
      $this->sc_conv_var['email'] = "email_";
      $this->sc_conv_var['url'] = "url_";
      $this->sc_conv_var['creditoprov'] = "creditoprov_";
      $this->sc_conv_var['dias'] = "dias_";
      $this->sc_conv_var['fechultcomp'] = "fechultcomp_";
      $this->sc_conv_var['saldoapagar'] = "saldoapagar_";
      $this->sc_conv_var['autoretenedor'] = "autoretenedor_";
      $this->sc_conv_var['tipo_documento'] = "tipo_documento_";
      $this->sc_conv_var['dv'] = "dv_";
      $this->sc_conv_var['nombre1'] = "nombre1_";
      $this->sc_conv_var['nombre2'] = "nombre2_";
      $this->sc_conv_var['apellido1'] = "apellido1_";
      $this->sc_conv_var['apellido2'] = "apellido2_";
      $this->sc_conv_var['sucur_cliente'] = "sucur_cliente_";
      $this->sc_conv_var['representante'] = "representante_";
      $this->sc_conv_var['imagenter'] = "imagenter_";
      $this->sc_conv_var['es_restaurante'] = "es_restaurante_";
      $this->sc_conv_var['cupodis'] = "cupodis_";
      $this->sc_conv_var['departamento'] = "departamento_";
      $this->sc_conv_var['relleno2'] = "relleno2_";
      $this->sc_conv_var['sucursales'] = "sucursales_";
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
      if (isset($this->id_tercero) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['id_tercero'] = $this->id_tercero;
      }
      if (isset($_POST["id_tercero"]) && isset($this->id_tercero)) 
      {
          $_SESSION['id_tercero'] = $this->id_tercero;
      }
      if (isset($_GET["id_tercero"]) && isset($this->id_tercero)) 
      {
          $_SESSION['id_tercero'] = $this->id_tercero;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['terceros_mesas']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['terceros_mesas']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['terceros_mesas']['embutida_parms']);
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
                 nm_limpa_str_terceros_mesas($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 if ($cadapar[0] == "idtercero_")
                 {
                     $this->NM_where_filter .= (empty($this->NM_where_filter)) ? "(" : " and ";
                     $this->NM_where_filter .= "idtercero = " . $this->idtercero_;
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
          if (isset($this->id_tercero)) 
          {
              $_SESSION['id_tercero'] = $this->id_tercero;
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
              $_SESSION['sc_session'][$script_case_init]['terceros_mesas']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['terceros_mesas']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['terceros_mesas']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['terceros_mesas']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->id_tercero)) 
          {
              $_SESSION['id_tercero'] = $this->id_tercero;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['terceros_mesas']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['terceros_mesas']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['terceros_mesas']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['terceros_mesas']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['terceros_mesas']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['terceros_mesas']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['terceros_mesas']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['terceros_mesas']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['terceros_mesas']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['terceros_mesas']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new terceros_mesas_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['initialize'])
          {
              $_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_departamento_ = $this->departamento_;
}
  $this->departamento_ =23;
if($this->idtercero_ >0)
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
    if (($original_departamento_ != $this->departamento_ || (isset($bFlagRead_departamento_) && $bFlagRead_departamento_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['departamento_' . $this->nmgp_refresh_row]['type']    = 'select';
        $this->NM_ajax_info['fldList']['departamento_' . $this->nmgp_refresh_row]['valList'] = array($this->departamento_);
        $this->NM_ajax_changed['departamento_'] = true;
    }
}
$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'off';
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['terceros_mesas']['upload_field_info'] = array();

      $_SESSION['sc_session'][$script_case_init]['terceros_mesas']['upload_field_info']['imagenter_'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'terceros_mesas',
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

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['terceros_mesas']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['terceros_mesas'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['terceros_mesas']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['terceros_mesas']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('terceros_mesas') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['terceros_mesas']['label'] = "Actualización datos ubicación o mesa";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "terceros_mesas")
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



      $_SESSION['scriptcase']['error_icon']['terceros_mesas']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Lemon__NM__nm_scriptcase9_Lemon_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['terceros_mesas'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      if (isset($this->NM_ajax_info['param']['imagenter__ul_name']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name];
          }
          $this->imagenter_ = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name'];
          $this->imagenter__scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name'], 12);
          $this->imagenter__scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type'];
          $this->imagenter__ul_name = $this->NM_ajax_info['param']['imagenter__ul_name'];
          $this->imagenter__ul_type = $this->NM_ajax_info['param']['imagenter__ul_type'];
      }
      elseif (isset($this->imagenter__ul_name) && '' != $this->imagenter__ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name]))
          {
              $this->imagenter__ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name];
          }
          $this->imagenter_ = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name;
          $this->imagenter__scfile_name = substr($this->imagenter__ul_name, 12);
          $this->imagenter__scfile_type = $this->imagenter__ul_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name1']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name1'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name1]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name1'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name1];
          }
          $this->imagenter_1      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name1'];
          $this->imagenter_1_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name1'], 12);
          $this->imagenter_1_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type1'];
      }
      elseif (isset($this->imagenter__ul_name1) && '' != $this->imagenter__ul_name1)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name1]))
          {
              $this->imagenter__ul_name1 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name1];
          }
          $this->imagenter_1      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name1;
          $this->imagenter_1_scfile_name = substr($this->imagenter__ul_name1, 12);
          $this->imagenter_1_scfile_type = $this->imagenter__ul_type1;
      }
      if (isset($this->imagenter_1))
      {
          $GLOBALS['imagenter_1']      = $this->imagenter_1;
          $GLOBALS['imagenter_1_scfile_name'] = $this->imagenter_1_scfile_name;
          $GLOBALS['imagenter_1_scfile_type'] = $this->imagenter_1_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name2']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name2'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name2]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name2'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name2];
          }
          $this->imagenter_2      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name2'];
          $this->imagenter_2_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name2'], 12);
          $this->imagenter_2_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type2'];
      }
      elseif (isset($this->imagenter__ul_name2) && '' != $this->imagenter__ul_name2)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name2]))
          {
              $this->imagenter__ul_name2 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name2];
          }
          $this->imagenter_2      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name2;
          $this->imagenter_2_scfile_name = substr($this->imagenter__ul_name2, 12);
          $this->imagenter_2_scfile_type = $this->imagenter__ul_type2;
      }
      if (isset($this->imagenter_2))
      {
          $GLOBALS['imagenter_2']      = $this->imagenter_2;
          $GLOBALS['imagenter_2_scfile_name'] = $this->imagenter_2_scfile_name;
          $GLOBALS['imagenter_2_scfile_type'] = $this->imagenter_2_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name3']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name3'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name3]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name3'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name3];
          }
          $this->imagenter_3      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name3'];
          $this->imagenter_3_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name3'], 12);
          $this->imagenter_3_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type3'];
      }
      elseif (isset($this->imagenter__ul_name3) && '' != $this->imagenter__ul_name3)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name3]))
          {
              $this->imagenter__ul_name3 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name3];
          }
          $this->imagenter_3      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name3;
          $this->imagenter_3_scfile_name = substr($this->imagenter__ul_name3, 12);
          $this->imagenter_3_scfile_type = $this->imagenter__ul_type3;
      }
      if (isset($this->imagenter_3))
      {
          $GLOBALS['imagenter_3']      = $this->imagenter_3;
          $GLOBALS['imagenter_3_scfile_name'] = $this->imagenter_3_scfile_name;
          $GLOBALS['imagenter_3_scfile_type'] = $this->imagenter_3_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name4']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name4'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name4]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name4'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name4];
          }
          $this->imagenter_4      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name4'];
          $this->imagenter_4_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name4'], 12);
          $this->imagenter_4_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type4'];
      }
      elseif (isset($this->imagenter__ul_name4) && '' != $this->imagenter__ul_name4)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name4]))
          {
              $this->imagenter__ul_name4 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name4];
          }
          $this->imagenter_4      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name4;
          $this->imagenter_4_scfile_name = substr($this->imagenter__ul_name4, 12);
          $this->imagenter_4_scfile_type = $this->imagenter__ul_type4;
      }
      if (isset($this->imagenter_4))
      {
          $GLOBALS['imagenter_4']      = $this->imagenter_4;
          $GLOBALS['imagenter_4_scfile_name'] = $this->imagenter_4_scfile_name;
          $GLOBALS['imagenter_4_scfile_type'] = $this->imagenter_4_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name5']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name5'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name5]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name5'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name5];
          }
          $this->imagenter_5      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name5'];
          $this->imagenter_5_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name5'], 12);
          $this->imagenter_5_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type5'];
      }
      elseif (isset($this->imagenter__ul_name5) && '' != $this->imagenter__ul_name5)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name5]))
          {
              $this->imagenter__ul_name5 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name5];
          }
          $this->imagenter_5      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name5;
          $this->imagenter_5_scfile_name = substr($this->imagenter__ul_name5, 12);
          $this->imagenter_5_scfile_type = $this->imagenter__ul_type5;
      }
      if (isset($this->imagenter_5))
      {
          $GLOBALS['imagenter_5']      = $this->imagenter_5;
          $GLOBALS['imagenter_5_scfile_name'] = $this->imagenter_5_scfile_name;
          $GLOBALS['imagenter_5_scfile_type'] = $this->imagenter_5_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name6']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name6'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name6]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name6'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name6];
          }
          $this->imagenter_6      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name6'];
          $this->imagenter_6_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name6'], 12);
          $this->imagenter_6_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type6'];
      }
      elseif (isset($this->imagenter__ul_name6) && '' != $this->imagenter__ul_name6)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name6]))
          {
              $this->imagenter__ul_name6 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name6];
          }
          $this->imagenter_6      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name6;
          $this->imagenter_6_scfile_name = substr($this->imagenter__ul_name6, 12);
          $this->imagenter_6_scfile_type = $this->imagenter__ul_type6;
      }
      if (isset($this->imagenter_6))
      {
          $GLOBALS['imagenter_6']      = $this->imagenter_6;
          $GLOBALS['imagenter_6_scfile_name'] = $this->imagenter_6_scfile_name;
          $GLOBALS['imagenter_6_scfile_type'] = $this->imagenter_6_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name7']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name7'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name7]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name7'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name7];
          }
          $this->imagenter_7      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name7'];
          $this->imagenter_7_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name7'], 12);
          $this->imagenter_7_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type7'];
      }
      elseif (isset($this->imagenter__ul_name7) && '' != $this->imagenter__ul_name7)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name7]))
          {
              $this->imagenter__ul_name7 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name7];
          }
          $this->imagenter_7      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name7;
          $this->imagenter_7_scfile_name = substr($this->imagenter__ul_name7, 12);
          $this->imagenter_7_scfile_type = $this->imagenter__ul_type7;
      }
      if (isset($this->imagenter_7))
      {
          $GLOBALS['imagenter_7']      = $this->imagenter_7;
          $GLOBALS['imagenter_7_scfile_name'] = $this->imagenter_7_scfile_name;
          $GLOBALS['imagenter_7_scfile_type'] = $this->imagenter_7_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name8']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name8'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name8]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name8'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name8];
          }
          $this->imagenter_8      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name8'];
          $this->imagenter_8_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name8'], 12);
          $this->imagenter_8_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type8'];
      }
      elseif (isset($this->imagenter__ul_name8) && '' != $this->imagenter__ul_name8)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name8]))
          {
              $this->imagenter__ul_name8 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name8];
          }
          $this->imagenter_8      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name8;
          $this->imagenter_8_scfile_name = substr($this->imagenter__ul_name8, 12);
          $this->imagenter_8_scfile_type = $this->imagenter__ul_type8;
      }
      if (isset($this->imagenter_8))
      {
          $GLOBALS['imagenter_8']      = $this->imagenter_8;
          $GLOBALS['imagenter_8_scfile_name'] = $this->imagenter_8_scfile_name;
          $GLOBALS['imagenter_8_scfile_type'] = $this->imagenter_8_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name9']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name9'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name9]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name9'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name9];
          }
          $this->imagenter_9      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name9'];
          $this->imagenter_9_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name9'], 12);
          $this->imagenter_9_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type9'];
      }
      elseif (isset($this->imagenter__ul_name9) && '' != $this->imagenter__ul_name9)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name9]))
          {
              $this->imagenter__ul_name9 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name9];
          }
          $this->imagenter_9      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name9;
          $this->imagenter_9_scfile_name = substr($this->imagenter__ul_name9, 12);
          $this->imagenter_9_scfile_type = $this->imagenter__ul_type9;
      }
      if (isset($this->imagenter_9))
      {
          $GLOBALS['imagenter_9']      = $this->imagenter_9;
          $GLOBALS['imagenter_9_scfile_name'] = $this->imagenter_9_scfile_name;
          $GLOBALS['imagenter_9_scfile_type'] = $this->imagenter_9_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name10']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name10'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name10]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name10'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name10];
          }
          $this->imagenter_10      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name10'];
          $this->imagenter_10_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name10'], 12);
          $this->imagenter_10_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type10'];
      }
      elseif (isset($this->imagenter__ul_name10) && '' != $this->imagenter__ul_name10)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name10]))
          {
              $this->imagenter__ul_name10 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name10];
          }
          $this->imagenter_10      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name10;
          $this->imagenter_10_scfile_name = substr($this->imagenter__ul_name10, 12);
          $this->imagenter_10_scfile_type = $this->imagenter__ul_type10;
      }
      if (isset($this->imagenter_10))
      {
          $GLOBALS['imagenter_10']      = $this->imagenter_10;
          $GLOBALS['imagenter_10_scfile_name'] = $this->imagenter_10_scfile_name;
          $GLOBALS['imagenter_10_scfile_type'] = $this->imagenter_10_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name11']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name11'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name11]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name11'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name11];
          }
          $this->imagenter_11      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name11'];
          $this->imagenter_11_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name11'], 12);
          $this->imagenter_11_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type11'];
      }
      elseif (isset($this->imagenter__ul_name11) && '' != $this->imagenter__ul_name11)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name11]))
          {
              $this->imagenter__ul_name11 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name11];
          }
          $this->imagenter_11      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name11;
          $this->imagenter_11_scfile_name = substr($this->imagenter__ul_name11, 12);
          $this->imagenter_11_scfile_type = $this->imagenter__ul_type11;
      }
      if (isset($this->imagenter_11))
      {
          $GLOBALS['imagenter_11']      = $this->imagenter_11;
          $GLOBALS['imagenter_11_scfile_name'] = $this->imagenter_11_scfile_name;
          $GLOBALS['imagenter_11_scfile_type'] = $this->imagenter_11_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name12']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name12'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name12]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name12'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name12];
          }
          $this->imagenter_12      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name12'];
          $this->imagenter_12_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name12'], 12);
          $this->imagenter_12_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type12'];
      }
      elseif (isset($this->imagenter__ul_name12) && '' != $this->imagenter__ul_name12)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name12]))
          {
              $this->imagenter__ul_name12 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name12];
          }
          $this->imagenter_12      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name12;
          $this->imagenter_12_scfile_name = substr($this->imagenter__ul_name12, 12);
          $this->imagenter_12_scfile_type = $this->imagenter__ul_type12;
      }
      if (isset($this->imagenter_12))
      {
          $GLOBALS['imagenter_12']      = $this->imagenter_12;
          $GLOBALS['imagenter_12_scfile_name'] = $this->imagenter_12_scfile_name;
          $GLOBALS['imagenter_12_scfile_type'] = $this->imagenter_12_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name13']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name13'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name13]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name13'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name13];
          }
          $this->imagenter_13      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name13'];
          $this->imagenter_13_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name13'], 12);
          $this->imagenter_13_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type13'];
      }
      elseif (isset($this->imagenter__ul_name13) && '' != $this->imagenter__ul_name13)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name13]))
          {
              $this->imagenter__ul_name13 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name13];
          }
          $this->imagenter_13      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name13;
          $this->imagenter_13_scfile_name = substr($this->imagenter__ul_name13, 12);
          $this->imagenter_13_scfile_type = $this->imagenter__ul_type13;
      }
      if (isset($this->imagenter_13))
      {
          $GLOBALS['imagenter_13']      = $this->imagenter_13;
          $GLOBALS['imagenter_13_scfile_name'] = $this->imagenter_13_scfile_name;
          $GLOBALS['imagenter_13_scfile_type'] = $this->imagenter_13_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name14']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name14'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name14]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name14'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name14];
          }
          $this->imagenter_14      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name14'];
          $this->imagenter_14_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name14'], 12);
          $this->imagenter_14_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type14'];
      }
      elseif (isset($this->imagenter__ul_name14) && '' != $this->imagenter__ul_name14)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name14]))
          {
              $this->imagenter__ul_name14 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name14];
          }
          $this->imagenter_14      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name14;
          $this->imagenter_14_scfile_name = substr($this->imagenter__ul_name14, 12);
          $this->imagenter_14_scfile_type = $this->imagenter__ul_type14;
      }
      if (isset($this->imagenter_14))
      {
          $GLOBALS['imagenter_14']      = $this->imagenter_14;
          $GLOBALS['imagenter_14_scfile_name'] = $this->imagenter_14_scfile_name;
          $GLOBALS['imagenter_14_scfile_type'] = $this->imagenter_14_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name15']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name15'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name15]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name15'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name15];
          }
          $this->imagenter_15      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name15'];
          $this->imagenter_15_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name15'], 12);
          $this->imagenter_15_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type15'];
      }
      elseif (isset($this->imagenter__ul_name15) && '' != $this->imagenter__ul_name15)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name15]))
          {
              $this->imagenter__ul_name15 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name15];
          }
          $this->imagenter_15      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name15;
          $this->imagenter_15_scfile_name = substr($this->imagenter__ul_name15, 12);
          $this->imagenter_15_scfile_type = $this->imagenter__ul_type15;
      }
      if (isset($this->imagenter_15))
      {
          $GLOBALS['imagenter_15']      = $this->imagenter_15;
          $GLOBALS['imagenter_15_scfile_name'] = $this->imagenter_15_scfile_name;
          $GLOBALS['imagenter_15_scfile_type'] = $this->imagenter_15_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name16']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name16'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name16]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name16'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name16];
          }
          $this->imagenter_16      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name16'];
          $this->imagenter_16_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name16'], 12);
          $this->imagenter_16_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type16'];
      }
      elseif (isset($this->imagenter__ul_name16) && '' != $this->imagenter__ul_name16)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name16]))
          {
              $this->imagenter__ul_name16 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name16];
          }
          $this->imagenter_16      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name16;
          $this->imagenter_16_scfile_name = substr($this->imagenter__ul_name16, 12);
          $this->imagenter_16_scfile_type = $this->imagenter__ul_type16;
      }
      if (isset($this->imagenter_16))
      {
          $GLOBALS['imagenter_16']      = $this->imagenter_16;
          $GLOBALS['imagenter_16_scfile_name'] = $this->imagenter_16_scfile_name;
          $GLOBALS['imagenter_16_scfile_type'] = $this->imagenter_16_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name17']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name17'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name17]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name17'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name17];
          }
          $this->imagenter_17      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name17'];
          $this->imagenter_17_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name17'], 12);
          $this->imagenter_17_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type17'];
      }
      elseif (isset($this->imagenter__ul_name17) && '' != $this->imagenter__ul_name17)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name17]))
          {
              $this->imagenter__ul_name17 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name17];
          }
          $this->imagenter_17      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name17;
          $this->imagenter_17_scfile_name = substr($this->imagenter__ul_name17, 12);
          $this->imagenter_17_scfile_type = $this->imagenter__ul_type17;
      }
      if (isset($this->imagenter_17))
      {
          $GLOBALS['imagenter_17']      = $this->imagenter_17;
          $GLOBALS['imagenter_17_scfile_name'] = $this->imagenter_17_scfile_name;
          $GLOBALS['imagenter_17_scfile_type'] = $this->imagenter_17_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name18']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name18'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name18]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name18'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name18];
          }
          $this->imagenter_18      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name18'];
          $this->imagenter_18_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name18'], 12);
          $this->imagenter_18_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type18'];
      }
      elseif (isset($this->imagenter__ul_name18) && '' != $this->imagenter__ul_name18)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name18]))
          {
              $this->imagenter__ul_name18 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name18];
          }
          $this->imagenter_18      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name18;
          $this->imagenter_18_scfile_name = substr($this->imagenter__ul_name18, 12);
          $this->imagenter_18_scfile_type = $this->imagenter__ul_type18;
      }
      if (isset($this->imagenter_18))
      {
          $GLOBALS['imagenter_18']      = $this->imagenter_18;
          $GLOBALS['imagenter_18_scfile_name'] = $this->imagenter_18_scfile_name;
          $GLOBALS['imagenter_18_scfile_type'] = $this->imagenter_18_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name19']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name19'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name19]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name19'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name19];
          }
          $this->imagenter_19      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name19'];
          $this->imagenter_19_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name19'], 12);
          $this->imagenter_19_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type19'];
      }
      elseif (isset($this->imagenter__ul_name19) && '' != $this->imagenter__ul_name19)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name19]))
          {
              $this->imagenter__ul_name19 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name19];
          }
          $this->imagenter_19      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name19;
          $this->imagenter_19_scfile_name = substr($this->imagenter__ul_name19, 12);
          $this->imagenter_19_scfile_type = $this->imagenter__ul_type19;
      }
      if (isset($this->imagenter_19))
      {
          $GLOBALS['imagenter_19']      = $this->imagenter_19;
          $GLOBALS['imagenter_19_scfile_name'] = $this->imagenter_19_scfile_name;
          $GLOBALS['imagenter_19_scfile_type'] = $this->imagenter_19_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name20']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name20'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name20]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name20'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name20];
          }
          $this->imagenter_20      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name20'];
          $this->imagenter_20_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name20'], 12);
          $this->imagenter_20_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type20'];
      }
      elseif (isset($this->imagenter__ul_name20) && '' != $this->imagenter__ul_name20)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name20]))
          {
              $this->imagenter__ul_name20 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name20];
          }
          $this->imagenter_20      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name20;
          $this->imagenter_20_scfile_name = substr($this->imagenter__ul_name20, 12);
          $this->imagenter_20_scfile_type = $this->imagenter__ul_type20;
      }
      if (isset($this->imagenter_20))
      {
          $GLOBALS['imagenter_20']      = $this->imagenter_20;
          $GLOBALS['imagenter_20_scfile_name'] = $this->imagenter_20_scfile_name;
          $GLOBALS['imagenter_20_scfile_type'] = $this->imagenter_20_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name21']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name21'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name21]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name21'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name21];
          }
          $this->imagenter_21      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name21'];
          $this->imagenter_21_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name21'], 12);
          $this->imagenter_21_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type21'];
      }
      elseif (isset($this->imagenter__ul_name21) && '' != $this->imagenter__ul_name21)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name21]))
          {
              $this->imagenter__ul_name21 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name21];
          }
          $this->imagenter_21      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name21;
          $this->imagenter_21_scfile_name = substr($this->imagenter__ul_name21, 12);
          $this->imagenter_21_scfile_type = $this->imagenter__ul_type21;
      }
      if (isset($this->imagenter_21))
      {
          $GLOBALS['imagenter_21']      = $this->imagenter_21;
          $GLOBALS['imagenter_21_scfile_name'] = $this->imagenter_21_scfile_name;
          $GLOBALS['imagenter_21_scfile_type'] = $this->imagenter_21_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name22']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name22'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name22]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name22'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name22];
          }
          $this->imagenter_22      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name22'];
          $this->imagenter_22_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name22'], 12);
          $this->imagenter_22_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type22'];
      }
      elseif (isset($this->imagenter__ul_name22) && '' != $this->imagenter__ul_name22)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name22]))
          {
              $this->imagenter__ul_name22 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name22];
          }
          $this->imagenter_22      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name22;
          $this->imagenter_22_scfile_name = substr($this->imagenter__ul_name22, 12);
          $this->imagenter_22_scfile_type = $this->imagenter__ul_type22;
      }
      if (isset($this->imagenter_22))
      {
          $GLOBALS['imagenter_22']      = $this->imagenter_22;
          $GLOBALS['imagenter_22_scfile_name'] = $this->imagenter_22_scfile_name;
          $GLOBALS['imagenter_22_scfile_type'] = $this->imagenter_22_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name23']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name23'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name23]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name23'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name23];
          }
          $this->imagenter_23      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name23'];
          $this->imagenter_23_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name23'], 12);
          $this->imagenter_23_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type23'];
      }
      elseif (isset($this->imagenter__ul_name23) && '' != $this->imagenter__ul_name23)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name23]))
          {
              $this->imagenter__ul_name23 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name23];
          }
          $this->imagenter_23      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name23;
          $this->imagenter_23_scfile_name = substr($this->imagenter__ul_name23, 12);
          $this->imagenter_23_scfile_type = $this->imagenter__ul_type23;
      }
      if (isset($this->imagenter_23))
      {
          $GLOBALS['imagenter_23']      = $this->imagenter_23;
          $GLOBALS['imagenter_23_scfile_name'] = $this->imagenter_23_scfile_name;
          $GLOBALS['imagenter_23_scfile_type'] = $this->imagenter_23_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name24']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name24'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name24]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name24'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name24];
          }
          $this->imagenter_24      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name24'];
          $this->imagenter_24_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name24'], 12);
          $this->imagenter_24_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type24'];
      }
      elseif (isset($this->imagenter__ul_name24) && '' != $this->imagenter__ul_name24)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name24]))
          {
              $this->imagenter__ul_name24 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name24];
          }
          $this->imagenter_24      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name24;
          $this->imagenter_24_scfile_name = substr($this->imagenter__ul_name24, 12);
          $this->imagenter_24_scfile_type = $this->imagenter__ul_type24;
      }
      if (isset($this->imagenter_24))
      {
          $GLOBALS['imagenter_24']      = $this->imagenter_24;
          $GLOBALS['imagenter_24_scfile_name'] = $this->imagenter_24_scfile_name;
          $GLOBALS['imagenter_24_scfile_type'] = $this->imagenter_24_scfile_type;
      }
      if (isset($this->NM_ajax_info['param']['imagenter__ul_name25']) && '' != $this->NM_ajax_info['param']['imagenter__ul_name25'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name25]))
          {
              $this->NM_ajax_info['param']['imagenter__ul_name25'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name25];
          }
          $this->imagenter_25      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['imagenter__ul_name25'];
          $this->imagenter_25_scfile_name = substr($this->NM_ajax_info['param']['imagenter__ul_name25'], 12);
          $this->imagenter_25_scfile_type = $this->NM_ajax_info['param']['imagenter__ul_type25'];
      }
      elseif (isset($this->imagenter__ul_name25) && '' != $this->imagenter__ul_name25)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name25]))
          {
              $this->imagenter__ul_name25 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_field_ul_name'][$this->imagenter__ul_name25];
          }
          $this->imagenter_25      = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->imagenter__ul_name25;
          $this->imagenter_25_scfile_name = substr($this->imagenter__ul_name25, 12);
          $this->imagenter_25_scfile_type = $this->imagenter__ul_type25;
      }
      if (isset($this->imagenter_25))
      {
          $GLOBALS['imagenter_25']      = $this->imagenter_25;
          $GLOBALS['imagenter_25_scfile_name'] = $this->imagenter_25_scfile_name;
          $GLOBALS['imagenter_25_scfile_type'] = $this->imagenter_25_scfile_type;
      }

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['goto']      = 'on';
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_orig'] = " where cliente='SI' and documento <1000000 and documento<>0";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_pesq'] = " where cliente='SI' and documento <1000000 and documento<>0";
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['terceros_mesas']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['terceros_mesas'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['terceros_mesas'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field . "_"] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field . "_"] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("terceros_mesas", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'terceros_mesas_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'terceros_mesas_help.txt');
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
          require_once($this->Ini->path_embutida . 'terceros_mesas/terceros_mesas_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "terceros_mesas_erro.class.php"); 
      }
      $this->Erro      = new terceros_mesas_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_max_reg']) && strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_max_reg']) == "all")
      {
          $this->form_paginacao = "total";
      }
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['opcao']))
         { 
             if ($this->idtercero_ != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['final'];
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
      $_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'on';
if (!isset($this->sc_temp_id_tercero)) {$this->sc_temp_id_tercero = (isset($_SESSION['id_tercero'])) ? $_SESSION['id_tercero'] : "";}
  $this->sc_temp_id_tercero=0;
if($this->idtercero_ >0)
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
$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'off'; 
      }
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['terceros_mesas']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['terceros_mesas']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- dv_
      $this->field_config['dv_']               = array();
      $this->field_config['dv_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dv_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dv_']['symbol_dec'] = '';
      $this->field_config['dv_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dv_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- idtercero_
      $this->field_config['idtercero_']               = array();
      $this->field_config['idtercero_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idtercero_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idtercero_']['symbol_dec'] = '';
      $this->field_config['idtercero_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idtercero_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- nacimiento_
      $this->field_config['nacimiento_']                 = array();
      $this->field_config['nacimiento_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['nacimiento_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['nacimiento_']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'nacimiento_');
      //-- fechault_
      $this->field_config['fechault_']                 = array();
      $this->field_config['fechault_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fechault_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechault_']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fechault_');
      //-- saldo_
      $this->field_config['saldo_']               = array();
      $this->field_config['saldo_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['saldo_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['saldo_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['saldo_']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['saldo_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['saldo_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- afiliacion_
      $this->field_config['afiliacion_']                 = array();
      $this->field_config['afiliacion_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['afiliacion_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['afiliacion_']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'afiliacion_');
      //-- cupo_
      $this->field_config['cupo_']               = array();
      $this->field_config['cupo_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['cupo_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['cupo_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['cupo_']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['cupo_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['cupo_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- con_actual_
      $this->field_config['con_actual_']                 = array();
      $this->field_config['con_actual_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['con_actual_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['con_actual_']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['con_actual_']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'con_actual_');
      //-- dias_
      $this->field_config['dias_']               = array();
      $this->field_config['dias_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dias_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dias_']['symbol_dec'] = '';
      $this->field_config['dias_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dias_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fechultcomp_
      $this->field_config['fechultcomp_']                 = array();
      $this->field_config['fechultcomp_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fechultcomp_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechultcomp_']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fechultcomp_');
      //-- saldoapagar_
      $this->field_config['saldoapagar_']               = array();
      $this->field_config['saldoapagar_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['saldoapagar_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['saldoapagar_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['saldoapagar_']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['saldoapagar_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['saldoapagar_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- cupodis_
      $this->field_config['cupodis_']               = array();
      $this->field_config['cupodis_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['cupodis_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['cupodis_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['cupodis_']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['cupodis_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['cupodis_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_max_reg'] = $this->nmgp_max_line;
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['opc_edit'] = true;  
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
         terceros_mesas_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'backup_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "igual";
         $this->nm_tira_formatacao();
         $this->nm_select_banco();
         $this->ajax_return_values();
         $this->NM_close_db();
         terceros_mesas_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'submit_form' == $this->NM_ajax_opcao)
      {
         if (isset($this->documento_)) { $this->nm_limpa_alfa($this->documento_); }
         if (isset($this->nombres_)) { $this->nm_limpa_alfa($this->nombres_); }
         if (isset($this->direccion_)) { $this->nm_limpa_alfa($this->direccion_); }
         if (isset($this->sexo_)) { $this->nm_limpa_alfa($this->sexo_); }
         if (isset($this->idmuni_)) { $this->nm_limpa_alfa($this->idmuni_); }
         if (isset($this->observaciones_)) { $this->nm_limpa_alfa($this->observaciones_); }
         if (isset($this->regimen_)) { $this->nm_limpa_alfa($this->regimen_); }
         if (isset($this->tipo_)) { $this->nm_limpa_alfa($this->tipo_); }
         if (isset($this->cliente_)) { $this->nm_limpa_alfa($this->cliente_); }
         if (isset($this->tipo_documento_)) { $this->nm_limpa_alfa($this->tipo_documento_); }
         if (isset($this->dv_)) { $this->nm_limpa_alfa($this->dv_); }
         if (isset($this->nombre1_)) { $this->nm_limpa_alfa($this->nombre1_); }
         if (isset($this->nombre2_)) { $this->nm_limpa_alfa($this->nombre2_); }
         if (isset($this->apellido1_)) { $this->nm_limpa_alfa($this->apellido1_); }
         if (isset($this->apellido2_)) { $this->nm_limpa_alfa($this->apellido2_); }
         if (isset($this->representante_)) { $this->nm_limpa_alfa($this->representante_); }
         if (isset($this->es_restaurante_)) { $this->nm_limpa_alfa($this->es_restaurante_); }
         if (isset($this->Sc_num_lin_alt) && $this->Sc_num_lin_alt > 0) 
         {
             $sc_seq_vert = $this->Sc_num_lin_alt;
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_form'][$sc_seq_vert];
             $this->idtercero_ = $this->nmgp_dados_form['idtercero_']; 
             $this->tel_cel_ = $this->nmgp_dados_form['tel_cel_']; 
             $this->nacimiento_ = $this->nmgp_dados_form['nacimiento_']; 
             $this->urlmail_ = $this->nmgp_dados_form['urlmail_']; 
             $this->fechault_ = $this->nmgp_dados_form['fechault_']; 
             $this->saldo_ = $this->nmgp_dados_form['saldo_']; 
             $this->afiliacion_ = $this->nmgp_dados_form['afiliacion_']; 
             $this->credito_ = $this->nmgp_dados_form['credito_']; 
             $this->cupo_ = $this->nmgp_dados_form['cupo_']; 
             $this->listaprecios_ = $this->nmgp_dados_form['listaprecios_']; 
             $this->loatiende_ = $this->nmgp_dados_form['loatiende_']; 
             $this->con_actual_ = $this->nmgp_dados_form['con_actual_']; 
             $this->efec_retencion_ = $this->nmgp_dados_form['efec_retencion_']; 
             $this->empleado_ = $this->nmgp_dados_form['empleado_']; 
             $this->proveedor_ = $this->nmgp_dados_form['proveedor_']; 
             $this->contacto_ = $this->nmgp_dados_form['contacto_']; 
             $this->telefonos_prov_ = $this->nmgp_dados_form['telefonos_prov_']; 
             $this->email_ = $this->nmgp_dados_form['email_']; 
             $this->url_ = $this->nmgp_dados_form['url_']; 
             $this->creditoprov_ = $this->nmgp_dados_form['creditoprov_']; 
             $this->dias_ = $this->nmgp_dados_form['dias_']; 
             $this->fechultcomp_ = $this->nmgp_dados_form['fechultcomp_']; 
             $this->saldoapagar_ = $this->nmgp_dados_form['saldoapagar_']; 
             $this->autoretenedor_ = $this->nmgp_dados_form['autoretenedor_']; 
             $this->sucur_cliente_ = $this->nmgp_dados_form['sucur_cliente_']; 
             $this->cupodis_ = $this->nmgp_dados_form['cupodis_']; 
             $this->relleno2_ = $this->nmgp_dados_form['relleno2_']; 
             $this->sucursales_ = $this->nmgp_dados_form['sucursales_']; 
         }
         $this->controle_form_vert();
         if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
         {
             $this->NM_rollback_db();
              if ($this->NM_ajax_flag)
              {
                  if (!isset($this->NM_ajax_info['errList']['geral_terceros_mesas']) || !is_array($this->NM_ajax_info['errList']['geral_terceros_mesas']))
                  {
                      $this->NM_ajax_info['errList']['geral_terceros_mesas'] = array();
                  }
                  if ($Campos_Crit != "")
                  {
                      $this->NM_ajax_info['errList']['geral_terceros_mesas'][] = $Campos_Crit;
                  }
                  if (!empty($Campos_Falta))
                  {
                      $this->NM_ajax_info['errList']['geral_terceros_mesas'][] = $this->Formata_Campos_Falta($Campos_Falta);
                  }
                  if ($this->Campos_Mens_erro != "")
                  {
                      $this->NM_ajax_info['errList']['geral_terceros_mesas'][] = $this->Campos_Mens_erro;
                  }
                  $this->NM_gera_nav_page(); 
                  $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              }
         }
         else
         {
             $this->NM_commit_db();
         }
         if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_redir_atualiz'] == "ok")
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
         terceros_mesas_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
          if ('validate_tipo_documento_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_documento_');
          }
          if ('validate_documento_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'documento_');
          }
          if ('validate_dv_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dv_');
          }
          if ('validate_imagenter_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'imagenter_');
          }
          if ('validate_nombre1_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nombre1_');
          }
          if ('validate_nombre2_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nombre2_');
          }
          if ('validate_apellido1_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'apellido1_');
          }
          if ('validate_apellido2_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'apellido2_');
          }
          if ('validate_nombres_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nombres_');
          }
          if ('validate_representante_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'representante_');
          }
          if ('validate_sexo_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sexo_');
          }
          if ('validate_tipo_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_');
          }
          if ('validate_regimen_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'regimen_');
          }
          if ('validate_direccion_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'direccion_');
          }
          if ('validate_departamento_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'departamento_');
          }
          if ('validate_idmuni_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idmuni_');
          }
          if ('validate_observaciones_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'observaciones_');
          }
          if ('validate_cliente_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cliente_');
          }
          if ('validate_es_restaurante_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'es_restaurante_');
          }
          terceros_mesas_pack_ajax_response();
          exit;
      }
      while ($sc_contr_vert > $sc_seq_vert) 
      { 
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
         if ($this->nmgp_opcao == "recarga" && !isset($GLOBALS["cupo_" . $sc_seq_vert]))
         { 
             $GLOBALS["cupo_" . $sc_seq_vert] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['cupo_'];
         } 
         if ($this->nmgp_opcao == "recarga" && !isset($GLOBALS["cliente_" . $sc_seq_vert]))
         { 
             $GLOBALS["cliente_" . $sc_seq_vert] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['cliente_'];
         } 
         if ($this->nmgp_opcao == "recarga" && !isset($GLOBALS["dias_" . $sc_seq_vert]))
         { 
             $GLOBALS["dias_" . $sc_seq_vert] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['dias_'];
         } 
         if ($this->nmgp_opcao == "recarga" && !isset($GLOBALS["credito_" . $sc_seq_vert]))
         { 
             $GLOBALS["credito_" . $sc_seq_vert] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['credito_'];
         } 
         if ($this->nmgp_opcao == "recarga" && !isset($GLOBALS["cupodis_" . $sc_seq_vert]))
         { 
             $GLOBALS["cupodis_" . $sc_seq_vert] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['cupodis_'];
         } 
         if ($this->nmgp_opcao == "recarga" && !isset($GLOBALS["documento_" . $sc_seq_vert]))
         { 
             $GLOBALS["documento_" . $sc_seq_vert] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['documento_'];
         } 
         if ($this->nmgp_opcao == "recarga" && !isset($GLOBALS["tipo_documento_" . $sc_seq_vert]))
         { 
             $GLOBALS["tipo_documento_" . $sc_seq_vert] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['tipo_documento_'];
         } 
         if ($this->nmgp_opcao == "recarga" && !isset($GLOBALS["nombres_" . $sc_seq_vert]))
         { 
             $GLOBALS["nombres_" . $sc_seq_vert] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['nombres_'];
         } 
         if ($this->nmgp_opcao == "recarga" && !isset($GLOBALS["regimen_" . $sc_seq_vert]))
         { 
             $GLOBALS["regimen_" . $sc_seq_vert] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['regimen_'];
         } 
         $this->tipo_documento_ = $GLOBALS["tipo_documento_" . $sc_seq_vert]; 
         $this->documento_ = $GLOBALS["documento_" . $sc_seq_vert]; 
         $this->dv_ = $GLOBALS["dv_" . $sc_seq_vert]; 
         $this->imagenter_ = $GLOBALS["imagenter_" . $sc_seq_vert]; 
         $this->imagenter__scfile_type = $GLOBALS["imagenter_"  . $sc_seq_vert . "_scfile_type"]; 
         $this->imagenter__scfile_name = $GLOBALS["imagenter_"  . $sc_seq_vert . "_scfile_name"]; 
         $this->imagenter__limpa = $GLOBALS["imagenter__limpa" . $sc_seq_vert]; 
         $this->imagenter__salva = $GLOBALS["imagenter_"  . $sc_seq_vert . "_salva"]; 
         $this->nombre1_ = $GLOBALS["nombre1_" . $sc_seq_vert]; 
         $this->nombre2_ = $GLOBALS["nombre2_" . $sc_seq_vert]; 
         $this->apellido1_ = $GLOBALS["apellido1_" . $sc_seq_vert]; 
         $this->apellido2_ = $GLOBALS["apellido2_" . $sc_seq_vert]; 
         $this->nombres_ = $GLOBALS["nombres_" . $sc_seq_vert]; 
         $this->representante_ = $GLOBALS["representante_" . $sc_seq_vert]; 
         $this->sexo_ = $GLOBALS["sexo_" . $sc_seq_vert]; 
         $this->tipo_ = $GLOBALS["tipo_" . $sc_seq_vert]; 
         $this->regimen_ = $GLOBALS["regimen_" . $sc_seq_vert]; 
         $this->direccion_ = $GLOBALS["direccion_" . $sc_seq_vert]; 
         $this->departamento_ = $GLOBALS["departamento_" . $sc_seq_vert]; 
         $this->idmuni_ = $GLOBALS["idmuni_" . $sc_seq_vert]; 
         $this->observaciones_ = $GLOBALS["observaciones_" . $sc_seq_vert]; 
         $this->cliente_ = $GLOBALS["cliente_" . $sc_seq_vert]; 
         $this->es_restaurante_ = $GLOBALS["es_restaurante_" . $sc_seq_vert]; 
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_form'][$sc_seq_vert];
             $this->idtercero_ = $this->nmgp_dados_form['idtercero_']; 
             $this->tel_cel_ = $this->nmgp_dados_form['tel_cel_']; 
             $this->nacimiento_ = $this->nmgp_dados_form['nacimiento_']; 
             $this->urlmail_ = $this->nmgp_dados_form['urlmail_']; 
             $this->fechault_ = $this->nmgp_dados_form['fechault_']; 
             $this->saldo_ = $this->nmgp_dados_form['saldo_']; 
             $this->afiliacion_ = $this->nmgp_dados_form['afiliacion_']; 
             $this->credito_ = $this->nmgp_dados_form['credito_']; 
             $this->cupo_ = $this->nmgp_dados_form['cupo_']; 
             $this->listaprecios_ = $this->nmgp_dados_form['listaprecios_']; 
             $this->loatiende_ = $this->nmgp_dados_form['loatiende_']; 
             $this->con_actual_ = $this->nmgp_dados_form['con_actual_']; 
             $this->efec_retencion_ = $this->nmgp_dados_form['efec_retencion_']; 
             $this->empleado_ = $this->nmgp_dados_form['empleado_']; 
             $this->proveedor_ = $this->nmgp_dados_form['proveedor_']; 
             $this->contacto_ = $this->nmgp_dados_form['contacto_']; 
             $this->telefonos_prov_ = $this->nmgp_dados_form['telefonos_prov_']; 
             $this->email_ = $this->nmgp_dados_form['email_']; 
             $this->url_ = $this->nmgp_dados_form['url_']; 
             $this->creditoprov_ = $this->nmgp_dados_form['creditoprov_']; 
             $this->dias_ = $this->nmgp_dados_form['dias_']; 
             $this->fechultcomp_ = $this->nmgp_dados_form['fechultcomp_']; 
             $this->saldoapagar_ = $this->nmgp_dados_form['saldoapagar_']; 
             $this->autoretenedor_ = $this->nmgp_dados_form['autoretenedor_']; 
             $this->sucur_cliente_ = $this->nmgp_dados_form['sucur_cliente_']; 
             $this->cupodis_ = $this->nmgp_dados_form['cupodis_']; 
             $this->relleno2_ = $this->nmgp_dados_form['relleno2_']; 
             $this->sucursales_ = $this->nmgp_dados_form['sucursales_']; 
         }
         if (isset($this->documento_)) { $this->nm_limpa_alfa($this->documento_); }
         if (isset($this->nombres_)) { $this->nm_limpa_alfa($this->nombres_); }
         if (isset($this->direccion_)) { $this->nm_limpa_alfa($this->direccion_); }
         if (isset($this->sexo_)) { $this->nm_limpa_alfa($this->sexo_); }
         if (isset($this->idmuni_)) { $this->nm_limpa_alfa($this->idmuni_); }
         if (isset($this->observaciones_)) { $this->nm_limpa_alfa($this->observaciones_); }
         if (isset($this->regimen_)) { $this->nm_limpa_alfa($this->regimen_); }
         if (isset($this->tipo_)) { $this->nm_limpa_alfa($this->tipo_); }
         if (isset($this->cliente_)) { $this->nm_limpa_alfa($this->cliente_); }
         if (isset($this->tipo_documento_)) { $this->nm_limpa_alfa($this->tipo_documento_); }
         if (isset($this->dv_)) { $this->nm_limpa_alfa($this->dv_); }
         if (isset($this->nombre1_)) { $this->nm_limpa_alfa($this->nombre1_); }
         if (isset($this->nombre2_)) { $this->nm_limpa_alfa($this->nombre2_); }
         if (isset($this->apellido1_)) { $this->nm_limpa_alfa($this->apellido1_); }
         if (isset($this->apellido2_)) { $this->nm_limpa_alfa($this->apellido2_); }
         if (isset($this->representante_)) { $this->nm_limpa_alfa($this->representante_); }
         if (isset($this->es_restaurante_)) { $this->nm_limpa_alfa($this->es_restaurante_); }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_form'])) 
         {
            $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_form'][$sc_seq_vert];
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'])) 
         {
            $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert];
         }
         if ($this->nmgp_opcao != "recarga" && in_array($sc_seq_vert, $sc_check_excl))
         {
             $this->nmgp_opcao = "excluir";
         }
         if ($this->nmgp_opcao == "incluir" && !in_array($sc_seq_vert, $sc_check_incl))
         { }
         else
         {
             if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['cupo_']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_disabled'][$sc_seq_vert]['cupo_']))
             { 
                 $this->cupo_ = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['cupo_'];
             } 
             if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['cliente_']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_disabled'][$sc_seq_vert]['cliente_']))
             { 
                 $this->cliente_ = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['cliente_'];
             } 
             if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['dias_']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_disabled'][$sc_seq_vert]['dias_']))
             { 
                 $this->dias_ = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['dias_'];
             } 
             if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['credito_']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_disabled'][$sc_seq_vert]['credito_']))
             { 
                 $this->credito_ = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['credito_'];
             } 
             if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['cupodis_']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_disabled'][$sc_seq_vert]['cupodis_']))
             { 
                 $this->cupodis_ = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['cupodis_'];
             } 
             if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['documento_']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_disabled'][$sc_seq_vert]['documento_']))
             { 
                 $this->documento_ = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['documento_'];
             } 
             if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['tipo_documento_']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_disabled'][$sc_seq_vert]['tipo_documento_']))
             { 
                 $this->tipo_documento_ = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['tipo_documento_'];
             } 
             if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['nombres_']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_disabled'][$sc_seq_vert]['nombres_']))
             { 
                 $this->nombres_ = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['nombres_'];
             } 
             if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['regimen_']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_disabled'][$sc_seq_vert]['regimen_']))
             { 
                 $this->regimen_ = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['regimen_'];
             } 
             $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_disabled'] = array();
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
             $this->form_vert_terceros_mesas[$sc_seq_vert]['tipo_documento_'] =  $this->tipo_documento_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['documento_'] =  $this->documento_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['dv_'] =  $this->dv_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['imagenter_'] =  $this->imagenter_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['imagenter__limpa'] =  $this->imagenter__limpa; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['nombre1_'] =  $this->nombre1_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['nombre2_'] =  $this->nombre2_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['apellido1_'] =  $this->apellido1_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['apellido2_'] =  $this->apellido2_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['nombres_'] =  $this->nombres_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['representante_'] =  $this->representante_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['sexo_'] =  $this->sexo_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['tipo_'] =  $this->tipo_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['regimen_'] =  $this->regimen_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['direccion_'] =  $this->direccion_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['departamento_'] =  $this->departamento_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['idmuni_'] =  $this->idmuni_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['observaciones_'] =  $this->observaciones_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['cliente_'] =  $this->cliente_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['es_restaurante_'] =  $this->es_restaurante_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['idtercero_'] =  $this->idtercero_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['tel_cel_'] =  $this->tel_cel_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['nacimiento_'] =  $this->nacimiento_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['urlmail_'] =  $this->urlmail_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['fechault_'] =  $this->fechault_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['saldo_'] =  $this->saldo_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['afiliacion_'] =  $this->afiliacion_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['credito_'] =  $this->credito_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['cupo_'] =  $this->cupo_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['listaprecios_'] =  $this->listaprecios_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['loatiende_'] =  $this->loatiende_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['con_actual_'] =  $this->con_actual_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['con_actual__hora'] =  $this->con_actual__hora; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['efec_retencion_'] =  $this->efec_retencion_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['empleado_'] =  $this->empleado_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['proveedor_'] =  $this->proveedor_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['contacto_'] =  $this->contacto_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['telefonos_prov_'] =  $this->telefonos_prov_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['email_'] =  $this->email_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['url_'] =  $this->url_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['creditoprov_'] =  $this->creditoprov_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['dias_'] =  $this->dias_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['fechultcomp_'] =  $this->fechultcomp_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['saldoapagar_'] =  $this->saldoapagar_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['autoretenedor_'] =  $this->autoretenedor_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['sucur_cliente_'] =  $this->sucur_cliente_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['cupodis_'] =  $this->cupodis_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['relleno2_'] =  $this->relleno2_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['sucursales_'] =  $this->sucursales_; 
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
              $_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cliente_ = $this->cliente_;
    $original_departamento_ = $this->departamento_;
}
  $this->departamento_ =23;
if($this->idtercero_ >0)
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
if($this->cliente_ =='NO')
	{	
	if ($this->NM_ajax_flag && isset($this->nmgp_refresh_row) && !empty($this->nmgp_refresh_row)) {
    $this->sc_ajax_javascript('nm_field_disabled', array("cliente_=disabled", "", $this->nmgp_refresh_row));
}
else {
    $this->sc_ajax_javascript('nm_field_disabled', array("cliente_=disabled", ""));
}
;
	if ($this->NM_ajax_flag && isset($this->nmgp_refresh_row) && !empty($this->nmgp_refresh_row)) {
    $this->sc_ajax_javascript('nm_field_disabled', array("cupodis_=disabled", "", $this->nmgp_refresh_row));
}
else {
    $this->sc_ajax_javascript('nm_field_disabled', array("cupodis_=disabled", ""));
}
;
		$this->nmgp_cmp_hidden["credito_"] = "off"; $this->NM_ajax_info['fieldDisplay']['credito_'] = 'off';
		$this->nmgp_cmp_hidden["cupodis_"] = "off"; $this->NM_ajax_info['fieldDisplay']['cupodis_'] = 'off';
		$this->nmgp_cmp_hidden["cupo_"] = "off"; $this->NM_ajax_info['fieldDisplay']['cupo_'] = 'off';
		$this->nmgp_cmp_hidden["faccredito"] = "off"; $this->NM_ajax_info['fieldDisplay']['faccredito'] = 'off';
		$this->nmgp_cmp_hidden["efec_retencion_"] = "off"; $this->NM_ajax_info['fieldDisplay']['efec_retencion_'] = 'off';
		$this->nmgp_cmp_hidden["listaprecios_"] = "off"; $this->NM_ajax_info['fieldDisplay']['listaprecios_'] = 'off';
		$this->nmgp_cmp_hidden["loatiende_"] = "off"; $this->NM_ajax_info['fieldDisplay']['loatiende_'] = 'off';
		;
		;
		;
	}
else
		{
		if ($this->NM_ajax_flag && isset($this->nmgp_refresh_row) && !empty($this->nmgp_refresh_row)) {
    $this->sc_ajax_javascript('nm_field_disabled', array("cupo_=disabled;cupodis_=disabled", "", $this->nmgp_refresh_row));
}
else {
    $this->sc_ajax_javascript('nm_field_disabled', array("cupo_=disabled;cupodis_=disabled", ""));
}
;
		if ($this->NM_ajax_flag && isset($this->nmgp_refresh_row) && !empty($this->nmgp_refresh_row)) {
    $this->sc_ajax_javascript('nm_field_disabled', array("cliente_=", "", $this->nmgp_refresh_row));
}
else {
    $this->sc_ajax_javascript('nm_field_disabled', array("cliente_=", ""));
}
;
		$this->nmgp_cmp_hidden["credito_"] = "on"; $this->NM_ajax_info['fieldDisplay']['credito_'] = 'on';
		$this->nmgp_cmp_hidden["cupodis_"] = "on"; $this->NM_ajax_info['fieldDisplay']['cupodis_'] = 'on';
		$this->nmgp_cmp_hidden["cupo_"] = "on"; $this->NM_ajax_info['fieldDisplay']['cupo_'] = 'on';
		$this->nmgp_cmp_hidden["faccredito"] = "on"; $this->NM_ajax_info['fieldDisplay']['faccredito'] = 'on';
		$this->nmgp_cmp_hidden["efec_retencion_"] = "on"; $this->NM_ajax_info['fieldDisplay']['efec_retencion_'] = 'on';
		$this->nmgp_cmp_hidden["listaprecios_"] = "on"; $this->NM_ajax_info['fieldDisplay']['listaprecios_'] = 'on';
		$this->nmgp_cmp_hidden["loatiende_"] = "on"; $this->NM_ajax_info['fieldDisplay']['loatiende_'] = 'on';
		;
		;
		;
		}


if($this->credito_ =='SI')
	{
		$cup="SELECT cupo FROM clientes WHERE idtercero = $this->idtercero_ ";
		 
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
		$this->cupo_ =$this->des ;
		$this->cupodis_ =$this->cupo_ -$this->saldo_ ;
		if ($this->NM_ajax_flag && isset($this->nmgp_refresh_row) && !empty($this->nmgp_refresh_row)) {
    $this->sc_ajax_javascript('nm_field_disabled', array("cliente_=disabled", "", $this->nmgp_refresh_row));
}
else {
    $this->sc_ajax_javascript('nm_field_disabled', array("cliente_=disabled", ""));
}
;
		if($this->cupodis_ !=$this->cupo_ ){if ($this->NM_ajax_flag && isset($this->nmgp_refresh_row) && !empty($this->nmgp_refresh_row)) {
    $this->sc_ajax_javascript('nm_field_disabled', array("credito_=disabled", "", $this->nmgp_refresh_row));
}
else {
    $this->sc_ajax_javascript('nm_field_disabled', array("credito_=disabled", ""));
}
;}
		if ($this->NM_ajax_flag && isset($this->nmgp_refresh_row) && !empty($this->nmgp_refresh_row)) {
    $this->sc_ajax_javascript('nm_field_disabled', array("cupodis_=disabled", "", $this->nmgp_refresh_row));
}
else {
    $this->sc_ajax_javascript('nm_field_disabled', array("cupodis_=disabled", ""));
}
;
		
	}
	else
		{
			if ($this->NM_ajax_flag && isset($this->nmgp_refresh_row) && !empty($this->nmgp_refresh_row)) {
    $this->sc_ajax_javascript('nm_field_disabled', array("cupo_=disabled;cupodis_=disabled", "", $this->nmgp_refresh_row));
}
else {
    $this->sc_ajax_javascript('nm_field_disabled', array("cupo_=disabled;cupodis_=disabled", ""));
}
;
			if ($this->NM_ajax_flag && isset($this->nmgp_refresh_row) && !empty($this->nmgp_refresh_row)) {
    $this->sc_ajax_javascript('nm_field_disabled', array("cliente_=", "", $this->nmgp_refresh_row));
}
else {
    $this->sc_ajax_javascript('nm_field_disabled', array("cliente_=", ""));
}
;
		}


if($this->proveedor_ =='SI')
	{
	;
	
	$this->nmgp_cmp_hidden["autoretenedor_"] = "on"; $this->NM_ajax_info['fieldDisplay']['autoretenedor_'] = 'on';
	$this->nmgp_cmp_hidden["creditoprov_"] = "on"; $this->NM_ajax_info['fieldDisplay']['creditoprov_'] = 'on';
	$this->nmgp_cmp_hidden["dias_"] = "on"; $this->NM_ajax_info['fieldDisplay']['dias_'] = 'on';
	}
else
	{
	;
	$this->nmgp_cmp_hidden["autoretenedor_"] = "off"; $this->NM_ajax_info['fieldDisplay']['autoretenedor_'] = 'off';
	$this->nmgp_cmp_hidden["creditoprov_"] = "off"; $this->NM_ajax_info['fieldDisplay']['creditoprov_'] = 'off';
	$this->nmgp_cmp_hidden["dias_"] = "off"; $this->NM_ajax_info['fieldDisplay']['dias_'] = 'off';
	}
if($this->sucur_cliente_ =='SI')
	{
	;
	}
else
	{
	;
	}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cliente_ != $this->cliente_ || (isset($bFlagRead_cliente_) && $bFlagRead_cliente_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['cliente_' . $this->nmgp_refresh_row]['type']    = 'select';
        $this->NM_ajax_info['fldList']['cliente_' . $this->nmgp_refresh_row]['valList'] = array($this->cliente_);
        $this->NM_ajax_changed['cliente_'] = true;
    }
    if (($original_departamento_ != $this->departamento_ || (isset($bFlagRead_departamento_) && $bFlagRead_departamento_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['departamento_' . $this->nmgp_refresh_row]['type']    = 'select';
        $this->NM_ajax_info['fldList']['departamento_' . $this->nmgp_refresh_row]['valList'] = array($this->departamento_);
        $this->NM_ajax_changed['departamento_'] = true;
    }
}
$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'off'; 
          }
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          $this->NM_close_db();
          terceros_mesas_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
      {
          $this->nm_gera_html();
          $this->NM_ajax_info['tableRefresh'] = NM_charset_to_utf8($this->Table_refresh . $this->New_Line) . '</table>';
          $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
          $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_terceros_mesas);
          $this->NM_ajax_info['fldList']['idtercero_']['keyVal'] = sc_htmlentities($this->nmgp_dados_form['idtercero_']);
          $this->NM_close_db();
          terceros_mesas_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          if ('event_cliente__onchange' == $this->NM_ajax_opcao)
          {
              $this->cliente__onChange();
          }
          if ('event_credito__onchange' == $this->NM_ajax_opcao)
          {
              $this->credito__onChange();
          }
          if ('event_creditoprov__onchange' == $this->NM_ajax_opcao)
          {
              $this->creditoprov__onChange();
          }
          if ('event_cupo__onchange' == $this->NM_ajax_opcao)
          {
              $this->cupo__onChange();
          }
          if ('event_documento__onchange' == $this->NM_ajax_opcao)
          {
              $this->documento__onChange();
          }
          if ('event_nombres__onfocus' == $this->NM_ajax_opcao)
          {
              $this->nombres__onFocus();
          }
          if ('event_proveedor__onchange' == $this->NM_ajax_opcao)
          {
              $this->proveedor__onChange();
          }
          if ('event_sucur_cliente__onchange' == $this->NM_ajax_opcao)
          {
              $this->sucur_cliente__onChange();
          }
          if ('event_tipo__onchange' == $this->NM_ajax_opcao)
          {
              $this->tipo__onChange();
          }
          $this->NM_close_db();
          terceros_mesas_pack_ajax_response();
          exit;
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_redir_atualiz'] == "ok")
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          if (isset($this->cupo_))
          { 
              $SV_cupo_ = $this->cupo_;
          } 
          if (isset($this->cliente_))
          { 
              $SV_cliente_ = $this->cliente_;
          } 
          if (isset($this->dias_))
          { 
              $SV_dias_ = $this->dias_;
          } 
          if (isset($this->credito_))
          { 
              $SV_credito_ = $this->credito_;
          } 
          if (isset($this->cupodis_))
          { 
              $SV_cupodis_ = $this->cupodis_;
          } 
          if (isset($this->documento_))
          { 
              $SV_documento_ = $this->documento_;
          } 
          if (isset($this->tipo_documento_))
          { 
              $SV_tipo_documento_ = $this->tipo_documento_;
          } 
          if (isset($this->nombres_))
          { 
              $SV_nombres_ = $this->nombres_;
          } 
          if (isset($this->regimen_))
          { 
              $SV_regimen_ = $this->regimen_;
          } 
          $this->nm_tira_formatacao();
          if (isset($SV_cupo_) && $this->nmgp_opcao != "recarga")
          { 
              $this->cupo_ = $SV_cupo_;
          } 
          if (isset($SV_cliente_) && $this->nmgp_opcao != "recarga")
          { 
              $this->cliente_ = $SV_cliente_;
          } 
          if (isset($SV_dias_) && $this->nmgp_opcao != "recarga")
          { 
              $this->dias_ = $SV_dias_;
          } 
          if (isset($SV_credito_) && $this->nmgp_opcao != "recarga")
          { 
              $this->credito_ = $SV_credito_;
          } 
          if (isset($SV_cupodis_) && $this->nmgp_opcao != "recarga")
          { 
              $this->cupodis_ = $SV_cupodis_;
          } 
          if (isset($SV_documento_) && $this->nmgp_opcao != "recarga")
          { 
              $this->documento_ = $SV_documento_;
          } 
          if (isset($SV_tipo_documento_) && $this->nmgp_opcao != "recarga")
          { 
              $this->tipo_documento_ = $SV_tipo_documento_;
          } 
          if (isset($SV_nombres_) && $this->nmgp_opcao != "recarga")
          { 
              $this->nombres_ = $SV_nombres_;
          } 
          if (isset($SV_regimen_) && $this->nmgp_opcao != "recarga")
          { 
              $this->regimen_ = $SV_regimen_;
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              terceros_mesas_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          return; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'off';
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "terceros_mesas.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Actualización datos ubicación o mesa") ?></TITLE>
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
<form name="Fdown" method="get" action="terceros_mesas_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="terceros_mesas"> 
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
           case 'tipo_documento_':
               return "Tipo Documento";
               break;
           case 'documento_':
               return "Código de Ubicación o mesa";
               break;
           case 'dv_':
               return "DV";
               break;
           case 'imagenter_':
               return "Foto";
               break;
           case 'nombre1_':
               return "Primer Nombre";
               break;
           case 'nombre2_':
               return "Otros Nombres";
               break;
           case 'apellido1_':
               return "Primer Apellido";
               break;
           case 'apellido2_':
               return "Segundo Apellido";
               break;
           case 'nombres_':
               return "Nombre de Mesa o ubicación";
               break;
           case 'representante_':
               return "Representante Legal";
               break;
           case 'sexo_':
               return "Género";
               break;
           case 'tipo_':
               return "Tipo persona";
               break;
           case 'regimen_':
               return "Régimen";
               break;
           case 'direccion_':
               return "Dirección";
               break;
           case 'departamento_':
               return "Departamento";
               break;
           case 'idmuni_':
               return "Ciudad";
               break;
           case 'observaciones_':
               return "Observaciones";
               break;
           case 'cliente_':
               return "Cliente";
               break;
           case 'es_restaurante_':
               return "Utilizar en Restaurante";
               break;
           case 'idtercero_':
               return "Idtercero";
               break;
           case 'tel_cel_':
               return "Teléfono o celular";
               break;
           case 'nacimiento_':
               return "Cumpleaños";
               break;
           case 'urlmail_':
               return "email";
               break;
           case 'fechault_':
               return "Fecha de última compra";
               break;
           case 'saldo_':
               return "Saldo pendiente";
               break;
           case 'afiliacion_':
               return "Cliente desde";
               break;
           case 'credito_':
               return "Credito";
               break;
           case 'cupo_':
               return "Cupo";
               break;
           case 'listaprecios_':
               return "Aplica Lista de Precios";
               break;
           case 'loatiende_':
               return "Vendedor";
               break;
           case 'con_actual_':
               return "Con Actual";
               break;
           case 'efec_retencion_':
               return "Practica Retención";
               break;
           case 'empleado_':
               return "Empleado";
               break;
           case 'proveedor_':
               return "Proveedor";
               break;
           case 'contacto_':
               return "Persona de Contacto o vendedor";
               break;
           case 'telefonos_prov_':
               return "Número de Tel.";
               break;
           case 'email_':
               return "Email";
               break;
           case 'url_':
               return "Url";
               break;
           case 'creditoprov_':
               return "Otorga Crédito";
               break;
           case 'dias_':
               return "Días del crédito";
               break;
           case 'fechultcomp_':
               return "Última Compra";
               break;
           case 'saldoapagar_':
               return "Saldo a pagar";
               break;
           case 'autoretenedor_':
               return "Autoretenedor";
               break;
           case 'sucur_cliente_':
               return "Sucursales";
               break;
           case 'cupodis_':
               return "Cupo disponible";
               break;
           case 'relleno2_':
               return "";
               break;
           case 'sucursales_':
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
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_terceros_mesas']) || !is_array($this->NM_ajax_info['errList']['geral_terceros_mesas']))
              {
                  $this->NM_ajax_info['errList']['geral_terceros_mesas'] = array();
              }
              $this->NM_ajax_info['errList']['geral_terceros_mesas'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'tipo_documento_' == $filtro)
        $this->ValidateField_tipo_documento_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'documento_' == $filtro)
        $this->ValidateField_documento_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dv_' == $filtro)
        $this->ValidateField_dv_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'imagenter_' == $filtro)
        $this->ValidateField_imagenter_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nombre1_' == $filtro)
        $this->ValidateField_nombre1_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nombre2_' == $filtro)
        $this->ValidateField_nombre2_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'apellido1_' == $filtro)
        $this->ValidateField_apellido1_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'apellido2_' == $filtro)
        $this->ValidateField_apellido2_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nombres_' == $filtro)
        $this->ValidateField_nombres_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'representante_' == $filtro)
        $this->ValidateField_representante_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sexo_' == $filtro)
        $this->ValidateField_sexo_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tipo_' == $filtro)
        $this->ValidateField_tipo_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'regimen_' == $filtro)
        $this->ValidateField_regimen_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'direccion_' == $filtro)
        $this->ValidateField_direccion_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'departamento_' == $filtro)
        $this->ValidateField_departamento_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idmuni_' == $filtro)
        $this->ValidateField_idmuni_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'observaciones_' == $filtro)
        $this->ValidateField_observaciones_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cliente_' == $filtro)
        $this->ValidateField_cliente_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'es_restaurante_' == $filtro)
        $this->ValidateField_es_restaurante_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
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

    function ValidateField_tipo_documento_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tipo_documento_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipo_documento_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipo_documento_

    function ValidateField_documento_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['php_cmp_required']['documento_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['php_cmp_required']['documento_'] == "on")) 
      { 
          if ($this->documento_ == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Código de Ubicación o mesa" ; 
              if (!isset($Campos_Erros['documento_']))
              {
                  $Campos_Erros['documento_'] = array();
              }
              $Campos_Erros['documento_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['documento_']) || !is_array($this->NM_ajax_info['errList']['documento_']))
                  {
                      $this->NM_ajax_info['errList']['documento_'] = array();
                  }
                  $this->NM_ajax_info['errList']['documento_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->documento_) > 14) 
          { 
              $hasError = true;
              $Campos_Crit .= "Código de Ubicación o mesa " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 14 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['documento_']))
              {
                  $Campos_Erros['documento_'] = array();
              }
              $Campos_Erros['documento_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 14 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['documento_']) || !is_array($this->NM_ajax_info['errList']['documento_']))
              {
                  $this->NM_ajax_info['errList']['documento_'] = array();
              }
              $this->NM_ajax_info['errList']['documento_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 14 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "01234567890123456789";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->documento_ ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->documento_, $_SESSION['scriptcase']['charset']); $x++) 
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
              $Campos_Crit .= "Código de Ubicación o mesa " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['documento_']))
              {
                  $Campos_Erros['documento_'] = array();
              }
              $Campos_Erros['documento_'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['documento_']) || !is_array($this->NM_ajax_info['errList']['documento_']))
              {
                  $this->NM_ajax_info['errList']['documento_'] = array();
              }
              $this->NM_ajax_info['errList']['documento_'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'documento_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_documento_

    function ValidateField_dv_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->dv_ === "" || is_null($this->dv_))  
      { 
          $this->dv_ = 0;
          $this->sc_force_zero[] = 'dv_';
      } 
      nm_limpa_numero($this->dv_, $this->field_config['dv_']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->dv_ != '')  
          { 
              $iTestSize = 1;
              if (strlen($this->dv_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "DV: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['dv_']))
                  {
                      $Campos_Erros['dv_'] = array();
                  }
                  $Campos_Erros['dv_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['dv_']) || !is_array($this->NM_ajax_info['errList']['dv_']))
                  {
                      $this->NM_ajax_info['errList']['dv_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dv_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->dv_, 1, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "DV; " ; 
                  if (!isset($Campos_Erros['dv_']))
                  {
                      $Campos_Erros['dv_'] = array();
                  }
                  $Campos_Erros['dv_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dv_']) || !is_array($this->NM_ajax_info['errList']['dv_']))
                  {
                      $this->NM_ajax_info['errList']['dv_'] = array();
                  }
                  $this->NM_ajax_info['errList']['dv_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'dv_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_dv_

    function ValidateField_imagenter_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->imagenter_;
            if ("" != $this->imagenter_ && "S" != $this->imagenter__limpa && !$teste_validade->ArqExtensao($this->imagenter_, array('jpg', 'jpeg', 'gif', 'png')))
            {
                $hasError = true;
                $Campos_Crit .= "Foto: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['imagenter_']))
                {
                    $Campos_Erros['imagenter_'] = array();
                }
                $Campos_Erros['imagenter_'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['imagenter_']) || !is_array($this->NM_ajax_info['errList']['imagenter_']))
                {
                    $this->NM_ajax_info['errList']['imagenter_'] = array();
                }
                $this->NM_ajax_info['errList']['imagenter_'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
            if (!$hasError && "" != $this->imagenter_ && "S" != $this->imagenter__limpa) {
                if (!function_exists('sc_upload_unprotect_chars')) {
                    include_once 'terceros_mesas_doc_name.php';
                }
                $pathParts = pathinfo(sc_upload_unprotect_chars($sTestFile));
                $fileSize = filesize(sc_upload_unprotect_chars($sTestFile));
                $sizeErrorSuffix = '';
                if ($hasError) {
                    $Campos_Crit .= "Foto: " . $this->Ini->Nm_lang['lang_errm_file_size'] . $sizeErrorSuffix;
                    if (!isset($Campos_Erros['imagenter_']))
                    {
                        $Campos_Erros['imagenter_'] = array();
                    }
                    $Campos_Erros['imagenter_'][] = $this->Ini->Nm_lang['lang_errm_file_size'] . $sizeErrorSuffix;
                    if (!isset($this->NM_ajax_info['errList']['imagenter_']) || !is_array($this->NM_ajax_info['errList']['imagenter_']))
                    {
                        $this->NM_ajax_info['errList']['imagenter_'] = array();
                    }
                    $this->NM_ajax_info['errList']['imagenter_'][] = $this->Ini->Nm_lang['lang_errm_file_size'] . $sizeErrorSuffix;
                }
            }
        }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'imagenter_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_imagenter_

    function ValidateField_nombre1_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->nombre1_ = sc_strtoupper($this->nombre1_); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nombre1_) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Primer Nombre " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombre1_']))
              {
                  $Campos_Erros['nombre1_'] = array();
              }
              $Campos_Erros['nombre1_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombre1_']) || !is_array($this->NM_ajax_info['errList']['nombre1_']))
              {
                  $this->NM_ajax_info['errList']['nombre1_'] = array();
              }
              $this->NM_ajax_info['errList']['nombre1_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚÀÈÌÒÙÃÕÂÊÎÔÛÄËÏÖÜÑÝÿ¨´`^~Ç ";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->nombre1_ ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->nombre1_, $_SESSION['scriptcase']['charset']); $x++) 
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
              if (!isset($Campos_Erros['nombre1_']))
              {
                  $Campos_Erros['nombre1_'] = array();
              }
              $Campos_Erros['nombre1_'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['nombre1_']) || !is_array($this->NM_ajax_info['errList']['nombre1_']))
              {
                  $this->NM_ajax_info['errList']['nombre1_'] = array();
              }
              $this->NM_ajax_info['errList']['nombre1_'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nombre1_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nombre1_

    function ValidateField_nombre2_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->nombre2_ = sc_strtoupper($this->nombre2_); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nombre2_) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Otros Nombres " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombre2_']))
              {
                  $Campos_Erros['nombre2_'] = array();
              }
              $Campos_Erros['nombre2_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombre2_']) || !is_array($this->NM_ajax_info['errList']['nombre2_']))
              {
                  $this->NM_ajax_info['errList']['nombre2_'] = array();
              }
              $this->NM_ajax_info['errList']['nombre2_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚÀÈÌÒÙÃÕÂÊÎÔÛÄËÏÖÜÑÝÿ¨´`^~Ç ";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->nombre2_ ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->nombre2_, $_SESSION['scriptcase']['charset']); $x++) 
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
              if (!isset($Campos_Erros['nombre2_']))
              {
                  $Campos_Erros['nombre2_'] = array();
              }
              $Campos_Erros['nombre2_'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['nombre2_']) || !is_array($this->NM_ajax_info['errList']['nombre2_']))
              {
                  $this->NM_ajax_info['errList']['nombre2_'] = array();
              }
              $this->NM_ajax_info['errList']['nombre2_'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nombre2_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nombre2_

    function ValidateField_apellido1_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->apellido1_ = sc_strtoupper($this->apellido1_); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->apellido1_) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Primer Apellido " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['apellido1_']))
              {
                  $Campos_Erros['apellido1_'] = array();
              }
              $Campos_Erros['apellido1_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['apellido1_']) || !is_array($this->NM_ajax_info['errList']['apellido1_']))
              {
                  $this->NM_ajax_info['errList']['apellido1_'] = array();
              }
              $this->NM_ajax_info['errList']['apellido1_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚÀÈÌÒÙÃÕÂÊÎÔÛÄËÏÖÜÑÝÿ¨´`^~Ç ";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->apellido1_ ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->apellido1_, $_SESSION['scriptcase']['charset']); $x++) 
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
              if (!isset($Campos_Erros['apellido1_']))
              {
                  $Campos_Erros['apellido1_'] = array();
              }
              $Campos_Erros['apellido1_'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['apellido1_']) || !is_array($this->NM_ajax_info['errList']['apellido1_']))
              {
                  $this->NM_ajax_info['errList']['apellido1_'] = array();
              }
              $this->NM_ajax_info['errList']['apellido1_'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'apellido1_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_apellido1_

    function ValidateField_apellido2_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->apellido2_ = sc_strtoupper($this->apellido2_); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->apellido2_) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Segundo Apellido " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['apellido2_']))
              {
                  $Campos_Erros['apellido2_'] = array();
              }
              $Campos_Erros['apellido2_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['apellido2_']) || !is_array($this->NM_ajax_info['errList']['apellido2_']))
              {
                  $this->NM_ajax_info['errList']['apellido2_'] = array();
              }
              $this->NM_ajax_info['errList']['apellido2_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚÀÈÌÒÙÃÕÂÊÎÔÛÄËÏÖÜÑÝÿ¨´`^~Ç ";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->apellido2_ ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->apellido2_, $_SESSION['scriptcase']['charset']); $x++) 
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
              if (!isset($Campos_Erros['apellido2_']))
              {
                  $Campos_Erros['apellido2_'] = array();
              }
              $Campos_Erros['apellido2_'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['apellido2_']) || !is_array($this->NM_ajax_info['errList']['apellido2_']))
              {
                  $this->NM_ajax_info['errList']['apellido2_'] = array();
              }
              $this->NM_ajax_info['errList']['apellido2_'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'apellido2_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_apellido2_

    function ValidateField_nombres_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->nombres_ = sc_strtoupper($this->nombres_); 
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['php_cmp_required']['nombres_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['php_cmp_required']['nombres_'] == "on")) 
      { 
          if ($this->nombres_ == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Nombre de Mesa o ubicación" ; 
              if (!isset($Campos_Erros['nombres_']))
              {
                  $Campos_Erros['nombres_'] = array();
              }
              $Campos_Erros['nombres_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['nombres_']) || !is_array($this->NM_ajax_info['errList']['nombres_']))
                  {
                      $this->NM_ajax_info['errList']['nombres_'] = array();
                  }
                  $this->NM_ajax_info['errList']['nombres_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nombres_) > 120) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nombre de Mesa o ubicación " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombres_']))
              {
                  $Campos_Erros['nombres_'] = array();
              }
              $Campos_Erros['nombres_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombres_']) || !is_array($this->NM_ajax_info['errList']['nombres_']))
              {
                  $this->NM_ajax_info['errList']['nombres_'] = array();
              }
              $this->NM_ajax_info['errList']['nombres_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nombres_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nombres_

    function ValidateField_representante_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->representante_ = sc_strtoupper($this->representante_); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->representante_) > 120) 
          { 
              $hasError = true;
              $Campos_Crit .= "Representante Legal " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['representante_']))
              {
                  $Campos_Erros['representante_'] = array();
              }
              $Campos_Erros['representante_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['representante_']) || !is_array($this->NM_ajax_info['errList']['representante_']))
              {
                  $this->NM_ajax_info['errList']['representante_'] = array();
              }
              $this->NM_ajax_info['errList']['representante_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ÁÉÍÓÚÀÈÌÒÙÃÕÂÊÎÔÛÄËÏÖÜÑÝÿ¨´`^~Ç .-";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->representante_ ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->representante_, $_SESSION['scriptcase']['charset']); $x++) 
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
              if (!isset($Campos_Erros['representante_']))
              {
                  $Campos_Erros['representante_'] = array();
              }
              $Campos_Erros['representante_'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['representante_']) || !is_array($this->NM_ajax_info['errList']['representante_']))
              {
                  $this->NM_ajax_info['errList']['representante_'] = array();
              }
              $this->NM_ajax_info['errList']['representante_'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'representante_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_representante_

    function ValidateField_sexo_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->sexo_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sexo_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sexo_

    function ValidateField_tipo_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tipo_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipo_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipo_

    function ValidateField_regimen_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->regimen_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'regimen_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_regimen_

    function ValidateField_direccion_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->direccion_) > 60) 
          { 
              $hasError = true;
              $Campos_Crit .= "Dirección " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['direccion_']))
              {
                  $Campos_Erros['direccion_'] = array();
              }
              $Campos_Erros['direccion_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['direccion_']) || !is_array($this->NM_ajax_info['errList']['direccion_']))
              {
                  $this->NM_ajax_info['errList']['direccion_'] = array();
              }
              $this->NM_ajax_info['errList']['direccion_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'direccion_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_direccion_

    function ValidateField_departamento_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->departamento_) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_']) && !in_array($this->departamento_, $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['departamento_']))
                   {
                       $Campos_Erros['departamento_'] = array();
                   }
                   $Campos_Erros['departamento_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['departamento_']) || !is_array($this->NM_ajax_info['errList']['departamento_']))
                   {
                       $this->NM_ajax_info['errList']['departamento_'] = array();
                   }
                   $this->NM_ajax_info['errList']['departamento_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'departamento_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_departamento_

    function ValidateField_idmuni_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->idmuni_) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_']) && !in_array($this->idmuni_, $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['idmuni_']))
                   {
                       $Campos_Erros['idmuni_'] = array();
                   }
                   $Campos_Erros['idmuni_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['idmuni_']) || !is_array($this->NM_ajax_info['errList']['idmuni_']))
                   {
                       $this->NM_ajax_info['errList']['idmuni_'] = array();
                   }
                   $this->NM_ajax_info['errList']['idmuni_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idmuni_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idmuni_

    function ValidateField_observaciones_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->observaciones_) > 200) 
          { 
              $hasError = true;
              $Campos_Crit .= "Observaciones " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['observaciones_']))
              {
                  $Campos_Erros['observaciones_'] = array();
              }
              $Campos_Erros['observaciones_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['observaciones_']) || !is_array($this->NM_ajax_info['errList']['observaciones_']))
              {
                  $this->NM_ajax_info['errList']['observaciones_'] = array();
              }
              $this->NM_ajax_info['errList']['observaciones_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'observaciones_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_observaciones_

    function ValidateField_cliente_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cliente_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cliente_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cliente_

    function ValidateField_es_restaurante_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->es_restaurante_ == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->es_restaurante_ != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_es_restaurante_']) && !in_array($this->es_restaurante_, $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_es_restaurante_']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['es_restaurante_']))
              {
                  $Campos_Erros['es_restaurante_'] = array();
              }
              $Campos_Erros['es_restaurante_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['es_restaurante_']) || !is_array($this->NM_ajax_info['errList']['es_restaurante_']))
              {
                  $this->NM_ajax_info['errList']['es_restaurante_'] = array();
              }
              $this->NM_ajax_info['errList']['es_restaurante_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'es_restaurante_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_es_restaurante_
//
//--------------------------------------------------------------------------------------
   function upload_img_doc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros) 
   {
     global $nm_browser;
     if (!empty($Campos_Crit) || !empty($Campos_Falta))
     {
          return;
     }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->imagenter_ == "none") 
          { 
              $this->imagenter_ = ""; 
          } 
          if ($this->imagenter_ != "") 
          { 
              if (!function_exists('sc_upload_unprotect_chars'))
              {
                  include_once 'terceros_mesas_doc_name.php';
              }
              $this->imagenter_ = sc_upload_unprotect_chars($this->imagenter_);
              $this->imagenter__scfile_name = sc_upload_unprotect_chars($this->imagenter__scfile_name);
              if ($nm_browser == "Opera")  
              { 
                  $this->imagenter__scfile_type = substr($this->imagenter__scfile_type, 0, strpos($this->imagenter__scfile_type, ";")) ; 
              } 
              if ($this->imagenter__scfile_type == "image/pjpeg" || $this->imagenter__scfile_type == "image/jpeg" || $this->imagenter__scfile_type == "image/gif" ||  
                  $this->imagenter__scfile_type == "image/png" || $this->imagenter__scfile_type == "image/x-png" || $this->imagenter__scfile_type == "image/bmp")  
              { 
                  if (is_file($this->imagenter_))  
                  { 
                      $this->NM_size_docs[$this->imagenter__scfile_name] = $this->sc_file_size($this->imagenter_);
                      $reg_imagenter_ = file_get_contents($this->imagenter_); 
                      $this->imagenter_ = $reg_imagenter_; 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "Foto " . $this->Ini->Nm_lang['lang_errm_upld']; 
                      $this->imagenter_ = "";
                      if (!isset($Campos_Erros['imagenter_']))
                      {
                          $Campos_Erros['imagenter_'] = array();
                      }
                      $Campos_Erros['imagenter_'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                      if (!isset($this->NM_ajax_info['errList']['imagenter_']) || !is_array($this->NM_ajax_info['errList']['imagenter_']))
                      {
                          $this->NM_ajax_info['errList']['imagenter_'] = array();
                      }
                      $this->NM_ajax_info['errList']['imagenter_'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  } 
              } 
              else 
              { 
                  if ($nm_browser == "Konqueror")  
                  { 
                      $this->imagenter_ = "" ; 
                  } 
                  else 
                  { 
                     $Campos_Crit .= "Foto " . $this->Ini->Nm_lang['lang_errm_ivtp'];  
                      if (!isset($Campos_Erros['imagenter_']))
                      {
                          $Campos_Erros['imagenter_'] = array();
                      }
                      $Campos_Erros['imagenter_'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                      if (!isset($this->NM_ajax_info['errList']['imagenter_']) || !is_array($this->NM_ajax_info['errList']['imagenter_']))
                      {
                          $this->NM_ajax_info['errList']['imagenter_'] = array();
                      }
                      $this->NM_ajax_info['errList']['imagenter_'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                  } 
              } 
          } 
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_form']['imagenter_']) && $this->imagenter__limpa != "S")
          {
              $this->imagenter_ = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_form']['imagenter_'];
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
    $this->nmgp_dados_form['tipo_documento_'] = $this->tipo_documento_;
    $this->nmgp_dados_form['documento_'] = $this->documento_;
    $this->nmgp_dados_form['dv_'] = $this->dv_;
    $this->nmgp_dados_form['imagenter_'] = $this->imagenter_;
    $this->nmgp_dados_form['imagenter__limpa'] = $this->imagenter__limpa;
    $this->nmgp_dados_form['nombre1_'] = $this->nombre1_;
    $this->nmgp_dados_form['nombre2_'] = $this->nombre2_;
    $this->nmgp_dados_form['apellido1_'] = $this->apellido1_;
    $this->nmgp_dados_form['apellido2_'] = $this->apellido2_;
    $this->nmgp_dados_form['nombres_'] = $this->nombres_;
    $this->nmgp_dados_form['representante_'] = $this->representante_;
    $this->nmgp_dados_form['sexo_'] = $this->sexo_;
    $this->nmgp_dados_form['tipo_'] = $this->tipo_;
    $this->nmgp_dados_form['regimen_'] = $this->regimen_;
    $this->nmgp_dados_form['direccion_'] = $this->direccion_;
    $this->nmgp_dados_form['departamento_'] = $this->departamento_;
    $this->nmgp_dados_form['idmuni_'] = $this->idmuni_;
    $this->nmgp_dados_form['observaciones_'] = $this->observaciones_;
    $this->nmgp_dados_form['cliente_'] = $this->cliente_;
    $this->nmgp_dados_form['es_restaurante_'] = $this->es_restaurante_;
    $this->nmgp_dados_form['idtercero_'] = $this->idtercero_;
    $this->nmgp_dados_form['tel_cel_'] = $this->tel_cel_;
    $this->nmgp_dados_form['nacimiento_'] = $this->nacimiento_;
    $this->nmgp_dados_form['urlmail_'] = $this->urlmail_;
    $this->nmgp_dados_form['fechault_'] = $this->fechault_;
    $this->nmgp_dados_form['saldo_'] = $this->saldo_;
    $this->nmgp_dados_form['afiliacion_'] = $this->afiliacion_;
    $this->nmgp_dados_form['credito_'] = $this->credito_;
    $this->nmgp_dados_form['cupo_'] = $this->cupo_;
    $this->nmgp_dados_form['listaprecios_'] = $this->listaprecios_;
    $this->nmgp_dados_form['loatiende_'] = $this->loatiende_;
    $this->nmgp_dados_form['con_actual_'] = $this->con_actual_;
    $this->nmgp_dados_form['efec_retencion_'] = $this->efec_retencion_;
    $this->nmgp_dados_form['empleado_'] = $this->empleado_;
    $this->nmgp_dados_form['proveedor_'] = $this->proveedor_;
    $this->nmgp_dados_form['contacto_'] = $this->contacto_;
    $this->nmgp_dados_form['telefonos_prov_'] = $this->telefonos_prov_;
    $this->nmgp_dados_form['email_'] = $this->email_;
    $this->nmgp_dados_form['url_'] = $this->url_;
    $this->nmgp_dados_form['creditoprov_'] = $this->creditoprov_;
    $this->nmgp_dados_form['dias_'] = $this->dias_;
    $this->nmgp_dados_form['fechultcomp_'] = $this->fechultcomp_;
    $this->nmgp_dados_form['saldoapagar_'] = $this->saldoapagar_;
    $this->nmgp_dados_form['autoretenedor_'] = $this->autoretenedor_;
    $this->nmgp_dados_form['sucur_cliente_'] = $this->sucur_cliente_;
    $this->nmgp_dados_form['cupodis_'] = $this->cupodis_;
    $this->nmgp_dados_form['relleno2_'] = $this->relleno2_;
    $this->nmgp_dados_form['sucursales_'] = $this->sucursales_;
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_form'][$sc_seq_vert] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['dv_'] = $this->dv_;
      nm_limpa_numero($this->dv_, $this->field_config['dv_']['symbol_grp']) ; 
      $this->Before_unformat['idtercero_'] = $this->idtercero_;
      nm_limpa_numero($this->idtercero_, $this->field_config['idtercero_']['symbol_grp']) ; 
      $this->Before_unformat['nacimiento_'] = $this->nacimiento_;
      nm_limpa_data($this->nacimiento_, $this->field_config['nacimiento_']['date_sep']) ; 
      $this->Before_unformat['fechault_'] = $this->fechault_;
      nm_limpa_data($this->fechault_, $this->field_config['fechault_']['date_sep']) ; 
      $this->Before_unformat['saldo_'] = $this->saldo_;
      if (!empty($this->field_config['saldo_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->saldo_, $this->field_config['saldo_']['symbol_dec'], $this->field_config['saldo_']['symbol_grp'], $this->field_config['saldo_']['symbol_mon']);
         nm_limpa_valor($this->saldo_, $this->field_config['saldo_']['symbol_dec'], $this->field_config['saldo_']['symbol_grp']);
      }
      $this->Before_unformat['afiliacion_'] = $this->afiliacion_;
      nm_limpa_data($this->afiliacion_, $this->field_config['afiliacion_']['date_sep']) ; 
      $this->Before_unformat['cupo_'] = $this->cupo_;
      if (!empty($this->field_config['cupo_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->cupo_, $this->field_config['cupo_']['symbol_dec'], $this->field_config['cupo_']['symbol_grp'], $this->field_config['cupo_']['symbol_mon']);
         nm_limpa_valor($this->cupo_, $this->field_config['cupo_']['symbol_dec'], $this->field_config['cupo_']['symbol_grp']);
      }
      $this->Before_unformat['con_actual_'] = $this->con_actual_;
      $this->Before_unformat['con_actual__hora'] = $this->con_actual__hora;
      nm_limpa_data($this->con_actual_, $this->field_config['con_actual_']['date_sep']) ; 
      nm_limpa_hora($this->con_actual__hora, $this->field_config['con_actual_']['time_sep']) ; 
      $this->Before_unformat['dias_'] = $this->dias_;
      nm_limpa_numero($this->dias_, $this->field_config['dias_']['symbol_grp']) ; 
      $this->Before_unformat['fechultcomp_'] = $this->fechultcomp_;
      nm_limpa_data($this->fechultcomp_, $this->field_config['fechultcomp_']['date_sep']) ; 
      $this->Before_unformat['saldoapagar_'] = $this->saldoapagar_;
      if (!empty($this->field_config['saldoapagar_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->saldoapagar_, $this->field_config['saldoapagar_']['symbol_dec'], $this->field_config['saldoapagar_']['symbol_grp'], $this->field_config['saldoapagar_']['symbol_mon']);
         nm_limpa_valor($this->saldoapagar_, $this->field_config['saldoapagar_']['symbol_dec'], $this->field_config['saldoapagar_']['symbol_grp']);
      }
      $this->Before_unformat['cupodis_'] = $this->cupodis_;
      if (!empty($this->field_config['cupodis_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->cupodis_, $this->field_config['cupodis_']['symbol_dec'], $this->field_config['cupodis_']['symbol_grp'], $this->field_config['cupodis_']['symbol_mon']);
         nm_limpa_valor($this->cupodis_, $this->field_config['cupodis_']['symbol_dec'], $this->field_config['cupodis_']['symbol_grp']);
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
      if ($Nome_Campo == "dv_")
      {
          nm_limpa_numero($this->dv_, $this->field_config['dv_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "idtercero_")
      {
          nm_limpa_numero($this->idtercero_, $this->field_config['idtercero_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "saldo_")
      {
          if (!empty($this->field_config['saldo_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->saldo_, $this->field_config['saldo_']['symbol_dec'], $this->field_config['saldo_']['symbol_grp'], $this->field_config['saldo_']['symbol_mon']);
             nm_limpa_valor($this->saldo_, $this->field_config['saldo_']['symbol_dec'], $this->field_config['saldo_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "cupo_")
      {
          if (!empty($this->field_config['cupo_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->cupo_, $this->field_config['cupo_']['symbol_dec'], $this->field_config['cupo_']['symbol_grp'], $this->field_config['cupo_']['symbol_mon']);
             nm_limpa_valor($this->cupo_, $this->field_config['cupo_']['symbol_dec'], $this->field_config['cupo_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "dias_")
      {
          nm_limpa_numero($this->dias_, $this->field_config['dias_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "saldoapagar_")
      {
          if (!empty($this->field_config['saldoapagar_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->saldoapagar_, $this->field_config['saldoapagar_']['symbol_dec'], $this->field_config['saldoapagar_']['symbol_grp'], $this->field_config['saldoapagar_']['symbol_mon']);
             nm_limpa_valor($this->saldoapagar_, $this->field_config['saldoapagar_']['symbol_dec'], $this->field_config['saldoapagar_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "cupodis_")
      {
          if (!empty($this->field_config['cupodis_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->cupodis_, $this->field_config['cupodis_']['symbol_dec'], $this->field_config['cupodis_']['symbol_grp'], $this->field_config['cupodis_']['symbol_mon']);
             nm_limpa_valor($this->cupodis_, $this->field_config['cupodis_']['symbol_dec'], $this->field_config['cupodis_']['symbol_grp']);
          }
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
      if ('' !== $this->dv_ || (!empty($format_fields) && isset($format_fields['dv_'])))
      {
          nmgp_Form_Num_Val($this->dv_, $this->field_config['dv_']['symbol_grp'], $this->field_config['dv_']['symbol_dec'], "0", "S", $this->field_config['dv_']['format_neg'], "", "", "-", $this->field_config['dv_']['symbol_fmt']) ; 
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
          $this->ajax_return_values_all_vert();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idtercero_']['keyVal'] = terceros_mesas_pack_protect_string($this->nmgp_dados_form['idtercero_']);
          }
   } // ajax_return_values
   function ajax_return_values_all_vert()
   {
          if (isset($this->nmgp_refresh_fields) && isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_terceros_mesas[$this->nmgp_refresh_row] = $this->NM_ajax_info['param'];
              if ((isset($this->Embutida_ronly) && $this->Embutida_ronly) || $this->NM_ajax_force_values)
              {
                  if (isset($this->NM_ajax_changed['tipo_documento_']) && $this->NM_ajax_changed['tipo_documento_'])
                  {
                      $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['tipo_documento_'] = $this->tipo_documento_;
                  }
                  if (isset($this->NM_ajax_changed['documento_']) && $this->NM_ajax_changed['documento_'])
                  {
                      $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['documento_'] = $this->documento_;
                  }
                  if (isset($this->NM_ajax_changed['dv_']) && $this->NM_ajax_changed['dv_'])
                  {
                      $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['dv_'] = $this->dv_;
                  }
                  if (isset($this->NM_ajax_changed['imagenter_']) && $this->NM_ajax_changed['imagenter_'])
                  {
                      $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['imagenter_'] = $this->imagenter_;
                  }
                  if (isset($this->NM_ajax_changed['nombre1_']) && $this->NM_ajax_changed['nombre1_'])
                  {
                      $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['nombre1_'] = $this->nombre1_;
                  }
                  if (isset($this->NM_ajax_changed['nombre2_']) && $this->NM_ajax_changed['nombre2_'])
                  {
                      $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['nombre2_'] = $this->nombre2_;
                  }
                  if (isset($this->NM_ajax_changed['apellido1_']) && $this->NM_ajax_changed['apellido1_'])
                  {
                      $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['apellido1_'] = $this->apellido1_;
                  }
                  if (isset($this->NM_ajax_changed['apellido2_']) && $this->NM_ajax_changed['apellido2_'])
                  {
                      $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['apellido2_'] = $this->apellido2_;
                  }
                  if (isset($this->NM_ajax_changed['nombres_']) && $this->NM_ajax_changed['nombres_'])
                  {
                      $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['nombres_'] = $this->nombres_;
                  }
                  if (isset($this->NM_ajax_changed['representante_']) && $this->NM_ajax_changed['representante_'])
                  {
                      $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['representante_'] = $this->representante_;
                  }
                  if (isset($this->NM_ajax_changed['sexo_']) && $this->NM_ajax_changed['sexo_'])
                  {
                      $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['sexo_'] = $this->sexo_;
                  }
                  if (isset($this->NM_ajax_changed['tipo_']) && $this->NM_ajax_changed['tipo_'])
                  {
                      $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['tipo_'] = $this->tipo_;
                  }
                  if (isset($this->NM_ajax_changed['regimen_']) && $this->NM_ajax_changed['regimen_'])
                  {
                      $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['regimen_'] = $this->regimen_;
                  }
                  if (isset($this->NM_ajax_changed['direccion_']) && $this->NM_ajax_changed['direccion_'])
                  {
                      $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['direccion_'] = $this->direccion_;
                  }
                  if (isset($this->NM_ajax_changed['departamento_']) && $this->NM_ajax_changed['departamento_'])
                  {
                      $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['departamento_'] = $this->departamento_;
                  }
                  if (isset($this->NM_ajax_changed['idmuni_']) && $this->NM_ajax_changed['idmuni_'])
                  {
                      $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['idmuni_'] = $this->idmuni_;
                  }
                  if (isset($this->NM_ajax_changed['observaciones_']) && $this->NM_ajax_changed['observaciones_'])
                  {
                      $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['observaciones_'] = $this->observaciones_;
                  }
                  if (isset($this->NM_ajax_changed['cliente_']) && $this->NM_ajax_changed['cliente_'])
                  {
                      $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['cliente_'] = $this->cliente_;
                  }
                  if (isset($this->NM_ajax_changed['es_restaurante_']) && $this->NM_ajax_changed['es_restaurante_'])
                  {
                      $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['es_restaurante_'] = $this->es_restaurante_;
                  }
              }
          }
          if (isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['tipo_documento_'] = $this->tipo_documento_;
              $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['documento_'] = $this->documento_;
              $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['nombre1_'] = $this->nombre1_;
              $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['nombre2_'] = $this->nombre2_;
              $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['apellido1_'] = $this->apellido1_;
              $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['apellido2_'] = $this->apellido2_;
              $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['nombres_'] = $this->nombres_;
              $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['representante_'] = $this->representante_;
              $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['sexo_'] = $this->sexo_;
              $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['tipo_'] = $this->tipo_;
              $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['regimen_'] = $this->regimen_;
              $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['direccion_'] = $this->direccion_;
              $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['departamento_'] = $this->departamento_;
              $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['observaciones_'] = $this->observaciones_;
              $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['cliente_'] = $this->cliente_;
              $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['es_restaurante_'] = $this->es_restaurante_;
              if ('' == $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['imagenter_'] && '' != $this->imagenter_)
              {
                  $this->form_vert_terceros_mesas[$this->nmgp_refresh_row]['imagenter_'] = $this->imagenter_;
              }
          }
          $this->NM_ajax_info['rsSize']            = sizeof($this->form_vert_terceros_mesas);
          $this->NM_ajax_info['buttonDisplayVert'] = array();
          foreach($this->form_vert_terceros_mesas as $sc_seq_vert => $aRecData)
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
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_documento_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['tipo_documento_']);
                  $aLookup = array();
$aLookup[] = array(terceros_mesas_pack_protect_string('11') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Registtro civil de nacimiento")));
$aLookup[] = array(terceros_mesas_pack_protect_string('12') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Tarjeta de identidad")));
$aLookup[] = array(terceros_mesas_pack_protect_string('13') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Cédula de ciudadanía")));
$aLookup[] = array(terceros_mesas_pack_protect_string('21') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Tarjeta de Extranjería")));
$aLookup[] = array(terceros_mesas_pack_protect_string('22') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Cédula de extranjería")));
$aLookup[] = array(terceros_mesas_pack_protect_string('31') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Nit")));
$aLookup[] = array(terceros_mesas_pack_protect_string('41') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Pasaporte")));
$aLookup[] = array(terceros_mesas_pack_protect_string('42') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Tipo de documento extranjero")));
$aLookup[] = array(terceros_mesas_pack_protect_string('43') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Definido por la DIAN")));
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '11';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '12';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '13';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '21';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '22';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '31';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '41';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '42';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '43';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tipo_documento_\"";
          if (isset($this->NM_ajax_info['select_html']['tipo_documento_']) && !empty($this->NM_ajax_info['select_html']['tipo_documento_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['tipo_documento_']) . "\";");
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
                  $this->NM_ajax_info['fldList']['tipo_documento_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipo_documento_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipo_documento_' . $sc_seq_vert]['valList'][$i] = terceros_mesas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipo_documento_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipo_documento_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipo_documento_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("documento_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['documento_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['documento_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dv_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['dv_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['dv_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("imagenter_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['imagenter_']);
                  $aLookup = array();
   $sKeepImage = 'N';
   if ('' == $aRecData['imagenter_'] && isset($aRecData['imagenter__limpa']) && 'N' == $aRecData['imagenter__limpa'])
   {
       $sKeepImage = 'S';
   }
   $out_imagenter_ = '';
   $out1_imagenter_ = '';
   $guarda_imagenter_ = $this->imagenter_;
   $this->imagenter_  = $aRecData['imagenter_'];
   if ($this->imagenter_ != "" && $this->imagenter_ != "none")   
   { 
       $out_imagenter_ = $this->Ini->path_imag_temp . "/sc_imagenter__" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ;  
       $out1_imagenter_ = $out_imagenter_; 
       $arq_imagenter_ = fopen($this->Ini->root . $out_imagenter_, "w") ;  
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
       { 
           $nm_tmp = nm_conv_img_access(substr($this->imagenter_, 0, 12));
           if (substr($this->imagenter_, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
           { 
               $this->imagenter_ = nm_conv_img_access($this->imagenter_);
           } 
       } 
       if (substr($this->imagenter_, 0, 4) == "*nm*") 
       { 
           $this->imagenter_ = substr($this->imagenter_, 4) ; 
           $this->imagenter_ = base64_decode($this->imagenter_) ; 
       } 
       $img_pos_bm = strpos($this->imagenter_, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->imagenter_ = substr($this->imagenter_, $img_pos_bm) ; 
       } 
       fwrite($arq_imagenter_, $this->imagenter_) ;  
       fclose($arq_imagenter_) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_imagenter_, true);
       $this->nmgp_return_img['imagenter_'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['imagenter_'][1] = $sc_obj_img->getWidth();
       $_SESSION['scriptcase']['sc_num_img']++ ; 
   } 
   $this->imagenter_  = $guarda_imagenter_;
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['imagenter_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'imagem',
                       'valList' => array($this->Ini->Nm_lang['lang_othr_show_imgg']),
                       'imgFile' => $out_imagenter_,
                       'imgOrig' => $out1_imagenter_,
               'keepImg' => $sKeepImage,
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombre1_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['nombre1_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['nombre1_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombre2_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['nombre2_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['nombre2_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("apellido1_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['apellido1_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['apellido1_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("apellido2_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['apellido2_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['apellido2_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombres_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['nombres_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['nombres_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("representante_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['representante_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['representante_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sexo_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['sexo_']);
                  $aLookup = array();
$aLookup[] = array(terceros_mesas_pack_protect_string('M') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Masculino")));
$aLookup[] = array(terceros_mesas_pack_protect_string('F') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Femenino")));
$aLookup[] = array(terceros_mesas_pack_protect_string('O') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Otro")));
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_sexo_'][] = 'M';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_sexo_'][] = 'F';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_sexo_'][] = 'O';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"sexo_\"";
          if (isset($this->NM_ajax_info['select_html']['sexo_']) && !empty($this->NM_ajax_info['select_html']['sexo_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['sexo_']) . "\";");
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
                  $this->NM_ajax_info['fldList']['sexo_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['sexo_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['sexo_' . $sc_seq_vert]['valList'][$i] = terceros_mesas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['sexo_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['sexo_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['sexo_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['tipo_']);
                  $aLookup = array();
$aLookup[] = array(terceros_mesas_pack_protect_string('NAT') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("NATURAL")));
$aLookup[] = array(terceros_mesas_pack_protect_string('JUR') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("JURÍDICA")));
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_'][] = 'NAT';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_'][] = 'JUR';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tipo_\"";
          if (isset($this->NM_ajax_info['select_html']['tipo_']) && !empty($this->NM_ajax_info['select_html']['tipo_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['tipo_']) . "\";");
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
                  $this->NM_ajax_info['fldList']['tipo_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipo_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipo_' . $sc_seq_vert]['valList'][$i] = terceros_mesas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipo_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipo_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipo_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("regimen_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['regimen_']);
                  $aLookup = array();
$aLookup[] = array(terceros_mesas_pack_protect_string('SIM') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("SIMPLIFICADO")));
$aLookup[] = array(terceros_mesas_pack_protect_string('COMUN') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("COMÚN")));
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_regimen_'][] = 'SIM';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_regimen_'][] = 'COMUN';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"regimen_\"";
          if (isset($this->NM_ajax_info['select_html']['regimen_']) && !empty($this->NM_ajax_info['select_html']['regimen_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['regimen_']) . "\";");
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
                  $this->NM_ajax_info['fldList']['regimen_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['regimen_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['regimen_' . $sc_seq_vert]['valList'][$i] = terceros_mesas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['regimen_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['regimen_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['regimen_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("direccion_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['direccion_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['direccion_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("departamento_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['departamento_']);
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dv_ = $this->dv_;
   $this->nm_tira_formatacao();


   $unformatted_value_dv_ = $this->dv_;

   $nm_comando = "SELECT iddep, departamento  FROM departamento  ORDER BY departamento";

   $this->dv_ = $old_value_dv_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(terceros_mesas_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', terceros_mesas_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_'][] = $rs->fields[0];
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
          $sSelComp = "name=\"departamento_\"";
          if (isset($this->NM_ajax_info['select_html']['departamento_']) && !empty($this->NM_ajax_info['select_html']['departamento_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['departamento_']) . "\";");
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
                  $this->NM_ajax_info['fldList']['departamento_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
               'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['departamento_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['departamento_' . $sc_seq_vert]['valList'][$i] = terceros_mesas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['departamento_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['departamento_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['departamento_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idmuni_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['idmuni_']);
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_'] = array(); 
}
   $this->departamento_ = $this->form_vert_terceros_mesas[$sc_seq_vert]['departamento_'];
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dv_ = $this->dv_;
   $this->nm_tira_formatacao();


   $unformatted_value_dv_ = $this->dv_;

   $nm_comando = "SELECT idmun, municipio  FROM municipio  WHERE iddepar=$this->departamento_ ORDER BY municipio";

   $this->dv_ = $old_value_dv_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(terceros_mesas_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', terceros_mesas_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_'][] = $rs->fields[0];
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
          $sSelComp = "name=\"idmuni_\"";
          if (isset($this->NM_ajax_info['select_html']['idmuni_']) && !empty($this->NM_ajax_info['select_html']['idmuni_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['idmuni_']) . "\";");
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
                  $this->NM_ajax_info['fldList']['idmuni_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
               'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idmuni_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idmuni_' . $sc_seq_vert]['valList'][$i] = terceros_mesas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idmuni_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idmuni_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idmuni_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("observaciones_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['observaciones_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['observaciones_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cliente_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['cliente_']);
                  $aLookup = array();
$aLookup[] = array(terceros_mesas_pack_protect_string('SI') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_cliente_'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"cliente_\"";
          if (isset($this->NM_ajax_info['select_html']['cliente_']) && !empty($this->NM_ajax_info['select_html']['cliente_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['cliente_']) . "\";");
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
                  $this->NM_ajax_info['fldList']['cliente_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['cliente_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['cliente_' . $sc_seq_vert]['valList'][$i] = terceros_mesas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['cliente_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['cliente_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['cliente_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("es_restaurante_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['es_restaurante_']);
                  $aLookup = array();
$aLookup[] = array(terceros_mesas_pack_protect_string('NO') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("NO")));
$aLookup[] = array(terceros_mesas_pack_protect_string('SI') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_es_restaurante_'][] = 'NO';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_es_restaurante_'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['es_restaurante_']) && !empty($this->NM_ajax_info['select_html']['es_restaurante_']))
          {
              eval("\$sOptComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['es_restaurante_']) . "\";");
          }
                  $this->NM_ajax_info['fldList']['es_restaurante_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'radio',
                       'switch'  => false,
                       'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['es_restaurante_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['es_restaurante_' . $sc_seq_vert]['valList'][$i] = terceros_mesas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['es_restaurante_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['es_restaurante_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['es_restaurante_' . $sc_seq_vert]['labList'] = $aLabel;
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['upload_dir'][$fieldName][] = $newName;
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
          $_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cliente_ = $this->cliente_;
    $original_departamento_ = $this->departamento_;
    $original_documento_ = $this->documento_;
    $original_idmuni_ = $this->idmuni_;
}
if (!isset($this->sc_temp_id_tercero)) {$this->sc_temp_id_tercero = (isset($_SESSION['id_tercero'])) ? $_SESSION['id_tercero'] : "";}
  if($this->documento_ =="0000000")
{
	$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
	if ($this->NM_ajax_flag && isset($this->nmgp_refresh_row) && !empty($this->nmgp_refresh_row)) {
    $this->sc_ajax_javascript('nm_field_disabled', array("documento_=disabled;tipo_documento_=disabled;nombres_=disabled", "", $this->nmgp_refresh_row));
}
else {
    $this->sc_ajax_javascript('nm_field_disabled', array("documento_=disabled;tipo_documento_=disabled;nombres_=disabled", ""));
}
;
}

$this->departamento_ =23;
$this->sc_temp_id_tercero=$this->idtercero_ ;
if($this->idtercero_ >0)
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
if($this->documento_ !="")
	{
	$buscar="SELECT iddepar FROM municipio WHERE idmun = $this->idmuni_ ";
	 
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
	$this->departamento_ =$this->ds ;

	if($this->cliente_ =='SI')
		{	
		if($this->credito_ =='SI')
			{
				
				$this->cupodis_ =$this->cupo_ -$this->saldo_ ;
				if($this->cupodis_ !=$this->cupo_ ){if ($this->NM_ajax_flag && isset($this->nmgp_refresh_row) && !empty($this->nmgp_refresh_row)) {
    $this->sc_ajax_javascript('nm_field_disabled', array("credito_=disabled", "", $this->nmgp_refresh_row));
}
else {
    $this->sc_ajax_javascript('nm_field_disabled', array("credito_=disabled", ""));
}
;}
				if ($this->NM_ajax_flag && isset($this->nmgp_refresh_row) && !empty($this->nmgp_refresh_row)) {
    $this->sc_ajax_javascript('nm_field_disabled', array("cupodis_=disabled", "", $this->nmgp_refresh_row));
}
else {
    $this->sc_ajax_javascript('nm_field_disabled', array("cupodis_=disabled", ""));
}
;
			}
		else
			{
				if ($this->NM_ajax_flag && isset($this->nmgp_refresh_row) && !empty($this->nmgp_refresh_row)) {
    $this->sc_ajax_javascript('nm_field_disabled', array("cupo_=disabled;cupodis_=disabled", "", $this->nmgp_refresh_row));
}
else {
    $this->sc_ajax_javascript('nm_field_disabled', array("cupo_=disabled;cupodis_=disabled", ""));
}
;
				if ($this->NM_ajax_flag && isset($this->nmgp_refresh_row) && !empty($this->nmgp_refresh_row)) {
    $this->sc_ajax_javascript('nm_field_disabled', array("cliente_=", "", $this->nmgp_refresh_row));
}
else {
    $this->sc_ajax_javascript('nm_field_disabled', array("cliente_=", ""));
}
;
			}
		}
	else
		{
		$this->credito_ ='NO';
		$this->cupodis_ =0;
		$this->cupo_ =0;
		$this->efec_retencion_ ='N';
		$this->nmgp_cmp_hidden["credito_"] = "off"; $this->NM_ajax_info['fieldDisplay']['credito_'] = 'off';
		$this->nmgp_cmp_hidden["cupodis_"] = "off"; $this->NM_ajax_info['fieldDisplay']['cupodis_'] = 'off';
		$this->nmgp_cmp_hidden["cupo_"] = "off"; $this->NM_ajax_info['fieldDisplay']['cupo_'] = 'off';
		$this->nmgp_cmp_hidden["faccredito"] = "off"; $this->NM_ajax_info['fieldDisplay']['faccredito'] = 'off';
		$this->nmgp_cmp_hidden["efec_retencion_"] = "off"; $this->NM_ajax_info['fieldDisplay']['efec_retencion_'] = 'off';
		$this->nmgp_cmp_hidden["listaprecios_"] = "off"; $this->NM_ajax_info['fieldDisplay']['listaprecios_'] = 'off';
		$this->nmgp_cmp_hidden["loatiende_"] = "off"; $this->NM_ajax_info['fieldDisplay']['loatiende_'] = 'off';
		;
		;
		;
		}
	}

	
if($this->proveedor_ =='SI')
	{
	;
	$this->nmgp_cmp_hidden["autoretenedor_"] = "on"; $this->NM_ajax_info['fieldDisplay']['autoretenedor_'] = 'on';
	$this->nmgp_cmp_hidden["creditoprov_"] = "on"; $this->NM_ajax_info['fieldDisplay']['creditoprov_'] = 'on';
	$this->nmgp_cmp_hidden["dias_"] = "on"; $this->NM_ajax_info['fieldDisplay']['dias_'] = 'on';
	}
else
	{
	;
	$this->nmgp_cmp_hidden["autoretenedor_"] = "off"; $this->NM_ajax_info['fieldDisplay']['autoretenedor_'] = 'off';
	$this->nmgp_cmp_hidden["creditoprov_"] = "off"; $this->NM_ajax_info['fieldDisplay']['creditoprov_'] = 'off';
	$this->nmgp_cmp_hidden["dias_"] = "off"; $this->NM_ajax_info['fieldDisplay']['dias_'] = 'off';
	}
if($this->sucur_cliente_ =='SI')
	{
	;
	}
else
	{
	;
	}
if (isset($this->sc_temp_id_tercero)) { $_SESSION['id_tercero'] = $this->sc_temp_id_tercero;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cliente_ != $this->cliente_ || (isset($bFlagRead_cliente_) && $bFlagRead_cliente_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['cliente_' . $this->nmgp_refresh_row]['type']    = 'select';
        $this->NM_ajax_info['fldList']['cliente_' . $this->nmgp_refresh_row]['valList'] = array($this->cliente_);
        $this->NM_ajax_changed['cliente_'] = true;
    }
    if (($original_departamento_ != $this->departamento_ || (isset($bFlagRead_departamento_) && $bFlagRead_departamento_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['departamento_' . $this->nmgp_refresh_row]['type']    = 'select';
        $this->NM_ajax_info['fldList']['departamento_' . $this->nmgp_refresh_row]['valList'] = array($this->departamento_);
        $this->NM_ajax_changed['departamento_'] = true;
    }
    if (($original_documento_ != $this->documento_ || (isset($bFlagRead_documento_) && $bFlagRead_documento_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['documento_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['documento_' . $this->nmgp_refresh_row]['valList'] = array($this->documento_);
        $this->NM_ajax_changed['documento_'] = true;
    }
    if (($original_idmuni_ != $this->idmuni_ || (isset($bFlagRead_idmuni_) && $bFlagRead_idmuni_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['idmuni_' . $this->nmgp_refresh_row]['type']    = 'select';
        $this->NM_ajax_info['fldList']['idmuni_' . $this->nmgp_refresh_row]['valList'] = array($this->idmuni_);
        $this->NM_ajax_changed['idmuni_'] = true;
    }
}
$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'off'; 
          }
  }
  function nm_proc_onload($bFormat = true)
  {
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cliente_ = $this->cliente_;
    $original_departamento_ = $this->departamento_;
    $original_documento_ = $this->documento_;
    $original_idmuni_ = $this->idmuni_;
}
if (!isset($this->sc_temp_id_tercero)) {$this->sc_temp_id_tercero = (isset($_SESSION['id_tercero'])) ? $_SESSION['id_tercero'] : "";}
  $this->departamento_ =23;
$this->sc_temp_id_tercero=$this->idtercero_ ;
if($this->idtercero_ >0)
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
if($this->documento_ !="")
	{
	$buscar="SELECT iddepar FROM municipio WHERE idmun = $this->idmuni_ ";
	 
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
	$this->departamento_ =$this->ds ;

	if($this->cliente_ =='SI')
		{	
		if($this->credito_ =='SI')
			{
				
				$this->cupodis_ =$this->cupo_ -$this->saldo_ ;
				if($this->cupodis_ !=$this->cupo_ ){if ($this->NM_ajax_flag && isset($this->nmgp_refresh_row) && !empty($this->nmgp_refresh_row)) {
    $this->sc_ajax_javascript('nm_field_disabled', array("credito_=disabled", "", $this->nmgp_refresh_row));
}
else {
    $this->sc_ajax_javascript('nm_field_disabled', array("credito_=disabled", ""));
}
;}
				if ($this->NM_ajax_flag && isset($this->nmgp_refresh_row) && !empty($this->nmgp_refresh_row)) {
    $this->sc_ajax_javascript('nm_field_disabled', array("cupodis_=disabled", "", $this->nmgp_refresh_row));
}
else {
    $this->sc_ajax_javascript('nm_field_disabled', array("cupodis_=disabled", ""));
}
;
				if($this->cupodis_ !=$this->cupo_ ){if ($this->NM_ajax_flag && isset($this->nmgp_refresh_row) && !empty($this->nmgp_refresh_row)) {
    $this->sc_ajax_javascript('nm_field_disabled', array("credito_=disabled", "", $this->nmgp_refresh_row));
}
else {
    $this->sc_ajax_javascript('nm_field_disabled', array("credito_=disabled", ""));
}
;}
				if ($this->NM_ajax_flag && isset($this->nmgp_refresh_row) && !empty($this->nmgp_refresh_row)) {
    $this->sc_ajax_javascript('nm_field_disabled', array("cupodis_=disabled", "", $this->nmgp_refresh_row));
}
else {
    $this->sc_ajax_javascript('nm_field_disabled', array("cupodis_=disabled", ""));
}
;
			}
		else
			{
				if ($this->NM_ajax_flag && isset($this->nmgp_refresh_row) && !empty($this->nmgp_refresh_row)) {
    $this->sc_ajax_javascript('nm_field_disabled', array("cupo_=disabled;cupodis_=disabled", "", $this->nmgp_refresh_row));
}
else {
    $this->sc_ajax_javascript('nm_field_disabled', array("cupo_=disabled;cupodis_=disabled", ""));
}
;
				if ($this->NM_ajax_flag && isset($this->nmgp_refresh_row) && !empty($this->nmgp_refresh_row)) {
    $this->sc_ajax_javascript('nm_field_disabled', array("cliente_=", "", $this->nmgp_refresh_row));
}
else {
    $this->sc_ajax_javascript('nm_field_disabled', array("cliente_=", ""));
}
;
			}
		}
	else
		{
		$this->credito_ ='NO';
		$this->cupodis_ =0;
		$this->cupo_ =0;
		$this->efec_retencion_ ='N';
		
		;
		;
		;
		;
		}
	}

	
if($this->proveedor_ =='SI')
	{
	;
	$this->nmgp_cmp_hidden["autoretenedor_"] = "on"; $this->NM_ajax_info['fieldDisplay']['autoretenedor_'] = 'on';
	$this->nmgp_cmp_hidden["creditoprov_"] = "on"; $this->NM_ajax_info['fieldDisplay']['creditoprov_'] = 'on';
	$this->nmgp_cmp_hidden["dias_"] = "on"; $this->NM_ajax_info['fieldDisplay']['dias_'] = 'on';
	}
else
	{
	;
	$this->nmgp_cmp_hidden["autoretenedor_"] = "off"; $this->NM_ajax_info['fieldDisplay']['autoretenedor_'] = 'off';
	$this->nmgp_cmp_hidden["creditoprov_"] = "off"; $this->NM_ajax_info['fieldDisplay']['creditoprov_'] = 'off';
	$this->nmgp_cmp_hidden["dias_"] = "off"; $this->NM_ajax_info['fieldDisplay']['dias_'] = 'off';
	}
if($this->sucur_cliente_ =='SI')
	{
	;
	}
else
	{
	;
	}
if (isset($this->sc_temp_id_tercero)) { $_SESSION['id_tercero'] = $this->sc_temp_id_tercero;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cliente_ != $this->cliente_ || (isset($bFlagRead_cliente_) && $bFlagRead_cliente_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['cliente_' . $this->nmgp_refresh_row]['type']    = 'select';
        $this->NM_ajax_info['fldList']['cliente_' . $this->nmgp_refresh_row]['valList'] = array($this->cliente_);
        $this->NM_ajax_changed['cliente_'] = true;
    }
    if (($original_departamento_ != $this->departamento_ || (isset($bFlagRead_departamento_) && $bFlagRead_departamento_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['departamento_' . $this->nmgp_refresh_row]['type']    = 'select';
        $this->NM_ajax_info['fldList']['departamento_' . $this->nmgp_refresh_row]['valList'] = array($this->departamento_);
        $this->NM_ajax_changed['departamento_'] = true;
    }
    if (($original_documento_ != $this->documento_ || (isset($bFlagRead_documento_) && $bFlagRead_documento_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['documento_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['documento_' . $this->nmgp_refresh_row]['valList'] = array($this->documento_);
        $this->NM_ajax_changed['documento_'] = true;
    }
    if (($original_idmuni_ != $this->idmuni_ || (isset($bFlagRead_idmuni_) && $bFlagRead_idmuni_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['idmuni_' . $this->nmgp_refresh_row]['type']    = 'select';
        $this->NM_ajax_info['fldList']['idmuni_' . $this->nmgp_refresh_row]['valList'] = array($this->idmuni_);
        $this->NM_ajax_changed['idmuni_'] = true;
    }
}
$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'off'; 
      }
      if (empty($this->con_actual_))
      {
          $this->con_actual__hora = $this->con_actual_;
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
      $this->saldo_ = str_replace($sc_parm1, $sc_parm2, $this->saldo_); 
      $this->cupo_ = str_replace($sc_parm1, $sc_parm2, $this->cupo_); 
      $this->saldoapagar_ = str_replace($sc_parm1, $sc_parm2, $this->saldoapagar_); 
      $this->cupodis_ = str_replace($sc_parm1, $sc_parm2, $this->cupodis_); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->saldo_ = "'" . $this->saldo_ . "'";
      $this->cupo_ = "'" . $this->cupo_ . "'";
      $this->saldoapagar_ = "'" . $this->saldoapagar_ . "'";
      $this->cupodis_ = "'" . $this->cupodis_ . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->saldo_ = str_replace("'", "", $this->saldo_); 
      $this->cupo_ = str_replace("'", "", $this->cupo_); 
      $this->saldoapagar_ = str_replace("'", "", $this->saldoapagar_); 
      $this->cupodis_ = str_replace("'", "", $this->cupodis_); 
   } 
//----------- 

   function return_after_insert()
   {
      global $sc_where;
      $sc_where_pos = " WHERE ((idtercero > $this->idtercero_))";
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
      if ('' != $this->idtercero_)
      {
          $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count;
          $rsc = $this->Db->Execute($nmgp_sel_count);
          if ($rsc === false && !$rsc->EOF)
          {
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
              exit;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] = $rsc->fields[0];
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
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'on';
   
      $nm_select = "select (select idfaccom from facturacom where idprov='".$this->idtercero_ ."' Limit 1) as compra, (select idfacven from facturaven where idcli='".$this->idtercero_ ."' Limit 1) as venta, (select numero from terceros_cuentas where tercero='".$this->idtercero_ ."' Limit 1) as t_cuent"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_ter = array();
     if ($this->idtercero_ != "" && $this->idtercero_ != "" && $this->idtercero_ != "")
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
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_terceros_mesas' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "Tercero ya tiene Movimiento, NO se puede Borrar";
 }
;
	}
$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          return;
      }
      if ($this->nmgp_opcao == "alterar")
      {
          $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert];
          if ($this->nmgp_dados_select['tipo_documento_'] == $this->tipo_documento_ &&
              $this->nmgp_dados_select['documento_'] == $this->documento_ &&
              $this->nmgp_dados_select['dv_'] == $this->dv_ &&
              $this->nmgp_dados_select['imagenter_'] == $this->imagenter_ &&
              $this->nmgp_dados_select['nombre1_'] == $this->nombre1_ &&
              $this->nmgp_dados_select['nombre2_'] == $this->nombre2_ &&
              $this->nmgp_dados_select['apellido1_'] == $this->apellido1_ &&
              $this->nmgp_dados_select['apellido2_'] == $this->apellido2_ &&
              $this->nmgp_dados_select['nombres_'] == $this->nombres_ &&
              $this->nmgp_dados_select['representante_'] == $this->representante_ &&
              $this->nmgp_dados_select['sexo_'] == $this->sexo_ &&
              $this->nmgp_dados_select['tipo_'] == $this->tipo_ &&
              $this->nmgp_dados_select['regimen_'] == $this->regimen_ &&
              $this->nmgp_dados_select['direccion_'] == $this->direccion_ &&
              $this->nmgp_dados_select['idmuni_'] == $this->idmuni_ &&
              $this->nmgp_dados_select['observaciones_'] == $this->observaciones_ &&
              $this->nmgp_dados_select['cliente_'] == $this->cliente_ &&
              $this->nmgp_dados_select['es_restaurante_'] == $this->es_restaurante_)
          { }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['tipo_documento_'] = $this->tipo_documento_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['documento_'] = $this->documento_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['dv_'] = $this->dv_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['imagenter_'] = $this->imagenter_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['nombre1_'] = $this->nombre1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['nombre2_'] = $this->nombre2_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['apellido1_'] = $this->apellido1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['apellido2_'] = $this->apellido2_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['nombres_'] = $this->nombres_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['representante_'] = $this->representante_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['sexo_'] = $this->sexo_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['tipo_'] = $this->tipo_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['regimen_'] = $this->regimen_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['direccion_'] = $this->direccion_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['idmuni_'] = $this->idmuni_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['observaciones_'] = $this->observaciones_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['cliente_'] = $this->cliente_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['es_restaurante_'] = $this->es_restaurante_;
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
      if (('alterar' == $this->nmgp_opcao || 'igual' == $this->nmgp_opcao) && $this->fechultcomp_ == ""){$this->fechultcomp_ = "null"; $NM_val_null[] = "fechultcomp_";}  
      $NM_val_form['tipo_documento_'] = $this->tipo_documento_;
      $NM_val_form['documento_'] = $this->documento_;
      $NM_val_form['dv_'] = $this->dv_;
      $NM_val_form['imagenter_'] = $this->imagenter_;
      $NM_val_form['nombre1_'] = $this->nombre1_;
      $NM_val_form['nombre2_'] = $this->nombre2_;
      $NM_val_form['apellido1_'] = $this->apellido1_;
      $NM_val_form['apellido2_'] = $this->apellido2_;
      $NM_val_form['nombres_'] = $this->nombres_;
      $NM_val_form['representante_'] = $this->representante_;
      $NM_val_form['sexo_'] = $this->sexo_;
      $NM_val_form['tipo_'] = $this->tipo_;
      $NM_val_form['regimen_'] = $this->regimen_;
      $NM_val_form['direccion_'] = $this->direccion_;
      $NM_val_form['departamento_'] = $this->departamento_;
      $NM_val_form['idmuni_'] = $this->idmuni_;
      $NM_val_form['observaciones_'] = $this->observaciones_;
      $NM_val_form['cliente_'] = $this->cliente_;
      $NM_val_form['es_restaurante_'] = $this->es_restaurante_;
      $NM_val_form['idtercero_'] = $this->idtercero_;
      $NM_val_form['tel_cel_'] = $this->tel_cel_;
      $NM_val_form['nacimiento_'] = $this->nacimiento_;
      $NM_val_form['urlmail_'] = $this->urlmail_;
      $NM_val_form['fechault_'] = $this->fechault_;
      $NM_val_form['saldo_'] = $this->saldo_;
      $NM_val_form['afiliacion_'] = $this->afiliacion_;
      $NM_val_form['credito_'] = $this->credito_;
      $NM_val_form['cupo_'] = $this->cupo_;
      $NM_val_form['listaprecios_'] = $this->listaprecios_;
      $NM_val_form['loatiende_'] = $this->loatiende_;
      $NM_val_form['con_actual_'] = $this->con_actual_;
      $NM_val_form['efec_retencion_'] = $this->efec_retencion_;
      $NM_val_form['empleado_'] = $this->empleado_;
      $NM_val_form['proveedor_'] = $this->proveedor_;
      $NM_val_form['contacto_'] = $this->contacto_;
      $NM_val_form['telefonos_prov_'] = $this->telefonos_prov_;
      $NM_val_form['email_'] = $this->email_;
      $NM_val_form['url_'] = $this->url_;
      $NM_val_form['creditoprov_'] = $this->creditoprov_;
      $NM_val_form['dias_'] = $this->dias_;
      $NM_val_form['fechultcomp_'] = $this->fechultcomp_;
      $NM_val_form['saldoapagar_'] = $this->saldoapagar_;
      $NM_val_form['autoretenedor_'] = $this->autoretenedor_;
      $NM_val_form['sucur_cliente_'] = $this->sucur_cliente_;
      $NM_val_form['cupodis_'] = $this->cupodis_;
      $NM_val_form['relleno2_'] = $this->relleno2_;
      $NM_val_form['sucursales_'] = $this->sucursales_;
      if ($this->idtercero_ === "" || is_null($this->idtercero_))  
      { 
          $this->idtercero_ = 0;
      } 
      if ($this->saldo_ === "" || is_null($this->saldo_))  
      { 
          $this->saldo_ = 0;
          $this->sc_force_zero[] = 'saldo_';
      } 
      if ($this->idmuni_ === "" || is_null($this->idmuni_))  
      { 
          $this->idmuni_ = 0;
          $this->sc_force_zero[] = 'idmuni_';
      } 
      if ($this->cupo_ === "" || is_null($this->cupo_))  
      { 
          $this->cupo_ = 0;
          $this->sc_force_zero[] = 'cupo_';
      } 
      if ($this->listaprecios_ === "" || is_null($this->listaprecios_))  
      { 
          $this->listaprecios_ = 0;
          $this->sc_force_zero[] = 'listaprecios_';
      } 
      if ($this->loatiende_ === "" || is_null($this->loatiende_))  
      { 
          $this->loatiende_ = 0;
          $this->sc_force_zero[] = 'loatiende_';
      } 
      if ($this->dias_ === "" || is_null($this->dias_))  
      { 
          $this->dias_ = 0;
          $this->sc_force_zero[] = 'dias_';
      } 
      if ($this->saldoapagar_ === "" || is_null($this->saldoapagar_))  
      { 
          $this->saldoapagar_ = 0;
          $this->sc_force_zero[] = 'saldoapagar_';
      } 
      if ($this->dv_ === "" || is_null($this->dv_))  
      { 
          $this->dv_ = 0;
          $this->sc_force_zero[] = 'dv_';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->documento__before_qstr = $this->documento_;
          $this->documento_ = substr($this->Db->qstr($this->documento_), 1, -1); 
          if ($this->documento_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->documento_ = "null"; 
              $NM_val_null[] = "documento_";
          } 
          $this->nombres__before_qstr = $this->nombres_;
          $this->nombres_ = substr($this->Db->qstr($this->nombres_), 1, -1); 
          if ($this->nombres_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombres_ = "null"; 
              $NM_val_null[] = "nombres_";
          } 
          $this->direccion__before_qstr = $this->direccion_;
          $this->direccion_ = substr($this->Db->qstr($this->direccion_), 1, -1); 
          if ($this->direccion_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->direccion_ = "null"; 
              $NM_val_null[] = "direccion_";
          } 
          $this->tel_cel__before_qstr = $this->tel_cel_;
          $this->tel_cel_ = substr($this->Db->qstr($this->tel_cel_), 1, -1); 
          if ($this->tel_cel_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tel_cel_ = "null"; 
              $NM_val_null[] = "tel_cel_";
          } 
          if ($this->nacimiento_ == "")  
          { 
              $this->nacimiento_ = "null"; 
              $NM_val_null[] = "nacimiento_";
          } 
          $this->sexo__before_qstr = $this->sexo_;
          $this->sexo_ = substr($this->Db->qstr($this->sexo_), 1, -1); 
          if ($this->sexo_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sexo_ = "null"; 
              $NM_val_null[] = "sexo_";
          } 
          $this->urlmail__before_qstr = $this->urlmail_;
          $this->urlmail_ = substr($this->Db->qstr($this->urlmail_), 1, -1); 
          if ($this->urlmail_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->urlmail_ = "null"; 
              $NM_val_null[] = "urlmail_";
          } 
          if ($this->fechault_ == "")  
          { 
              $this->fechault_ = "null"; 
              $NM_val_null[] = "fechault_";
          } 
          if ($this->afiliacion_ == "")  
          { 
              $this->afiliacion_ = "null"; 
              $NM_val_null[] = "afiliacion_";
          } 
          $this->observaciones__before_qstr = $this->observaciones_;
          $this->observaciones_ = substr($this->Db->qstr($this->observaciones_), 1, -1); 
          if ($this->observaciones_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->observaciones_ = "null"; 
              $NM_val_null[] = "observaciones_";
          } 
          $this->credito__before_qstr = $this->credito_;
          $this->credito_ = substr($this->Db->qstr($this->credito_), 1, -1); 
          if ($this->credito_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->credito_ = "null"; 
              $NM_val_null[] = "credito_";
          } 
          if ($this->con_actual_ == "")  
          { 
              $this->con_actual_ = "null"; 
              $NM_val_null[] = "con_actual_";
          } 
          $this->efec_retencion__before_qstr = $this->efec_retencion_;
          $this->efec_retencion_ = substr($this->Db->qstr($this->efec_retencion_), 1, -1); 
          if ($this->efec_retencion_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->efec_retencion_ = "null"; 
              $NM_val_null[] = "efec_retencion_";
          } 
          $this->regimen__before_qstr = $this->regimen_;
          $this->regimen_ = substr($this->Db->qstr($this->regimen_), 1, -1); 
          if ($this->regimen_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->regimen_ = "null"; 
              $NM_val_null[] = "regimen_";
          } 
          $this->tipo__before_qstr = $this->tipo_;
          $this->tipo_ = substr($this->Db->qstr($this->tipo_), 1, -1); 
          if ($this->tipo_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo_ = "null"; 
              $NM_val_null[] = "tipo_";
          } 
          $this->cliente__before_qstr = $this->cliente_;
          $this->cliente_ = substr($this->Db->qstr($this->cliente_), 1, -1); 
          if ($this->cliente_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cliente_ = "null"; 
              $NM_val_null[] = "cliente_";
          } 
          $this->empleado__before_qstr = $this->empleado_;
          $this->empleado_ = substr($this->Db->qstr($this->empleado_), 1, -1); 
          if ($this->empleado_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->empleado_ = "null"; 
              $NM_val_null[] = "empleado_";
          } 
          $this->proveedor__before_qstr = $this->proveedor_;
          $this->proveedor_ = substr($this->Db->qstr($this->proveedor_), 1, -1); 
          if ($this->proveedor_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->proveedor_ = "null"; 
              $NM_val_null[] = "proveedor_";
          } 
          $this->contacto__before_qstr = $this->contacto_;
          $this->contacto_ = substr($this->Db->qstr($this->contacto_), 1, -1); 
          if ($this->contacto_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->contacto_ = "null"; 
              $NM_val_null[] = "contacto_";
          } 
          $this->telefonos_prov__before_qstr = $this->telefonos_prov_;
          $this->telefonos_prov_ = substr($this->Db->qstr($this->telefonos_prov_), 1, -1); 
          if ($this->telefonos_prov_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->telefonos_prov_ = "null"; 
              $NM_val_null[] = "telefonos_prov_";
          } 
          $this->email__before_qstr = $this->email_;
          $this->email_ = substr($this->Db->qstr($this->email_), 1, -1); 
          if ($this->email_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->email_ = "null"; 
              $NM_val_null[] = "email_";
          } 
          $this->url__before_qstr = $this->url_;
          $this->url_ = substr($this->Db->qstr($this->url_), 1, -1); 
          if ($this->url_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->url_ = "null"; 
              $NM_val_null[] = "url_";
          } 
          $this->creditoprov__before_qstr = $this->creditoprov_;
          $this->creditoprov_ = substr($this->Db->qstr($this->creditoprov_), 1, -1); 
          if ($this->creditoprov_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->creditoprov_ = "null"; 
              $NM_val_null[] = "creditoprov_";
          } 
          if ($this->fechultcomp_ == "")  
          { 
              $this->fechultcomp_ = "null"; 
              $NM_val_null[] = "fechultcomp_";
          } 
          $this->autoretenedor__before_qstr = $this->autoretenedor_;
          $this->autoretenedor_ = substr($this->Db->qstr($this->autoretenedor_), 1, -1); 
          if ($this->autoretenedor_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->autoretenedor_ = "null"; 
              $NM_val_null[] = "autoretenedor_";
          } 
          $this->tipo_documento__before_qstr = $this->tipo_documento_;
          $this->tipo_documento_ = substr($this->Db->qstr($this->tipo_documento_), 1, -1); 
          if ($this->tipo_documento_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo_documento_ = "null"; 
              $NM_val_null[] = "tipo_documento_";
          } 
          $this->nombre1__before_qstr = $this->nombre1_;
          $this->nombre1_ = substr($this->Db->qstr($this->nombre1_), 1, -1); 
          if ($this->nombre1_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombre1_ = "null"; 
              $NM_val_null[] = "nombre1_";
          } 
          $this->nombre2__before_qstr = $this->nombre2_;
          $this->nombre2_ = substr($this->Db->qstr($this->nombre2_), 1, -1); 
          if ($this->nombre2_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombre2_ = "null"; 
              $NM_val_null[] = "nombre2_";
          } 
          $this->apellido1__before_qstr = $this->apellido1_;
          $this->apellido1_ = substr($this->Db->qstr($this->apellido1_), 1, -1); 
          if ($this->apellido1_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->apellido1_ = "null"; 
              $NM_val_null[] = "apellido1_";
          } 
          $this->apellido2__before_qstr = $this->apellido2_;
          $this->apellido2_ = substr($this->Db->qstr($this->apellido2_), 1, -1); 
          if ($this->apellido2_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->apellido2_ = "null"; 
              $NM_val_null[] = "apellido2_";
          } 
          $this->sucur_cliente__before_qstr = $this->sucur_cliente_;
          $this->sucur_cliente_ = substr($this->Db->qstr($this->sucur_cliente_), 1, -1); 
          if ($this->sucur_cliente_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sucur_cliente_ = "null"; 
              $NM_val_null[] = "sucur_cliente_";
          } 
          $this->representante__before_qstr = $this->representante_;
          $this->representante_ = substr($this->Db->qstr($this->representante_), 1, -1); 
          if ($this->representante_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->representante_ = "null"; 
              $NM_val_null[] = "representante_";
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          { 
              $nm_tmp = nm_conv_img_access(substr($this->imagenter_, 0, 12));
              if (substr($this->imagenter_, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
              { 
                  $this->imagenter_ = nm_conv_img_access($this->imagenter_);
              } 
              if (!empty($this->imagenter_) && $this->imagenter_ != 'null' && substr($this->imagenter_, 0, 4) != "*nm*") 
              { 
                  $this->imagenter_ = "*nm*" . base64_encode($this->imagenter_) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              if ($this->Ini->nm_tpbanco != "pdo_sqlsrv" && !empty($this->imagenter_) && $this->imagenter_ != 'null' && substr($this->imagenter_, 0, 4) != "*nm*") 
              { 
                  $this->imagenter_ = "*nm*" . base64_encode($this->imagenter_) ; 
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
              if ($this->Ini->nm_tpbanco != 'pdo_ibm' && !empty($this->imagenter_) && $this->imagenter_ != 'null' && substr($this->imagenter_, 0, 4) != "*nm*") 
              { 
                  $this->imagenter_ = "*nm*" . base64_encode($this->imagenter_) ; 
              } 
          } 
          else
          { 
              $this->imagenter_ =  substr($this->Db->qstr($this->imagenter_), 1, -1);
          } 
          if ($this->imagenter_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->imagenter_ = "null"; 
              $NM_val_null[] = "imagenter_";
          } 
          $this->es_restaurante__before_qstr = $this->es_restaurante_;
          $this->es_restaurante_ = substr($this->Db->qstr($this->es_restaurante_), 1, -1); 
          if ($this->es_restaurante_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->es_restaurante_ = "null"; 
              $NM_val_null[] = "es_restaurante_";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 terceros_mesas_pack_ajax_response();
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
              $Cmd_Unique = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where (documento = '" . $this->documento_ . "') AND (idtercero <> $this->idtercero_)";
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
                          terceros_mesas_pack_ajax_response();
                      }
                      exit;
                  }
              }
              elseif (0 < $rsUni->fields[0])
              {
                  $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_ukey']; 
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
                  $SC_fields_update[] = "documento = '$this->documento_', nombres = '$this->nombres_', direccion = '$this->direccion_', sexo = '$this->sexo_', idmuni = $this->idmuni_, observaciones = '$this->observaciones_', regimen = '$this->regimen_', tipo = '$this->tipo_', cliente = '$this->cliente_', tipo_documento = '$this->tipo_documento_', dv = $this->dv_, nombre1 = '$this->nombre1_', nombre2 = '$this->nombre2_', apellido1 = '$this->apellido1_', apellido2 = '$this->apellido2_', representante = '$this->representante_', es_restaurante = '$this->es_restaurante_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "documento = '$this->documento_', nombres = '$this->nombres_', direccion = '$this->direccion_', sexo = '$this->sexo_', idmuni = $this->idmuni_, observaciones = '$this->observaciones_', regimen = '$this->regimen_', tipo = '$this->tipo_', cliente = '$this->cliente_', tipo_documento = '$this->tipo_documento_', dv = $this->dv_, nombre1 = '$this->nombre1_', nombre2 = '$this->nombre2_', apellido1 = '$this->apellido1_', apellido2 = '$this->apellido2_', representante = '$this->representante_', es_restaurante = '$this->es_restaurante_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "documento = '$this->documento_', nombres = '$this->nombres_', direccion = '$this->direccion_', sexo = '$this->sexo_', idmuni = $this->idmuni_, observaciones = '$this->observaciones_', regimen = '$this->regimen_', tipo = '$this->tipo_', cliente = '$this->cliente_', tipo_documento = '$this->tipo_documento_', dv = $this->dv_, nombre1 = '$this->nombre1_', nombre2 = '$this->nombre2_', apellido1 = '$this->apellido1_', apellido2 = '$this->apellido2_', representante = '$this->representante_', es_restaurante = '$this->es_restaurante_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "documento = '$this->documento_', nombres = '$this->nombres_', direccion = '$this->direccion_', sexo = '$this->sexo_', idmuni = $this->idmuni_, observaciones = '$this->observaciones_', regimen = '$this->regimen_', tipo = '$this->tipo_', cliente = '$this->cliente_', tipo_documento = '$this->tipo_documento_', dv = $this->dv_, nombre1 = '$this->nombre1_', nombre2 = '$this->nombre2_', apellido1 = '$this->apellido1_', apellido2 = '$this->apellido2_', representante = '$this->representante_', es_restaurante = '$this->es_restaurante_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "documento = '$this->documento_', nombres = '$this->nombres_', direccion = '$this->direccion_', sexo = '$this->sexo_', idmuni = $this->idmuni_, observaciones = '$this->observaciones_', regimen = '$this->regimen_', tipo = '$this->tipo_', cliente = '$this->cliente_', tipo_documento = '$this->tipo_documento_', dv = $this->dv_, nombre1 = '$this->nombre1_', nombre2 = '$this->nombre2_', apellido1 = '$this->apellido1_', apellido2 = '$this->apellido2_', representante = '$this->representante_', es_restaurante = '$this->es_restaurante_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "documento = '$this->documento_', nombres = '$this->nombres_', direccion = '$this->direccion_', sexo = '$this->sexo_', idmuni = $this->idmuni_, observaciones = '$this->observaciones_', regimen = '$this->regimen_', tipo = '$this->tipo_', cliente = '$this->cliente_', tipo_documento = '$this->tipo_documento_', dv = $this->dv_, nombre1 = '$this->nombre1_', nombre2 = '$this->nombre2_', apellido1 = '$this->apellido1_', apellido2 = '$this->apellido2_', representante = '$this->representante_', es_restaurante = '$this->es_restaurante_'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "documento = '$this->documento_', nombres = '$this->nombres_', direccion = '$this->direccion_', sexo = '$this->sexo_', idmuni = $this->idmuni_, observaciones = '$this->observaciones_', regimen = '$this->regimen_', tipo = '$this->tipo_', cliente = '$this->cliente_', tipo_documento = '$this->tipo_documento_', dv = $this->dv_, nombre1 = '$this->nombre1_', nombre2 = '$this->nombre2_', apellido1 = '$this->apellido1_', apellido2 = '$this->apellido2_', representante = '$this->representante_', es_restaurante = '$this->es_restaurante_'"; 
              } 
              if (isset($NM_val_form['tel_cel_']) && $NM_val_form['tel_cel_'] != $this->nmgp_dados_select['tel_cel_']) 
              { 
                  $SC_fields_update[] = "tel_cel = '$this->tel_cel_'"; 
              } 
              if (isset($NM_val_form['nacimiento_']) && $NM_val_form['nacimiento_'] != $this->nmgp_dados_select['nacimiento_']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "nacimiento = #$this->nacimiento_#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "nacimiento = EXTEND('" . $this->nacimiento_ . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "nacimiento = " . $this->Ini->date_delim . $this->nacimiento_ . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['urlmail_']) && $NM_val_form['urlmail_'] != $this->nmgp_dados_select['urlmail_']) 
              { 
                  $SC_fields_update[] = "urlmail = '$this->urlmail_'"; 
              } 
              if (isset($NM_val_form['fechault_']) && $NM_val_form['fechault_'] != $this->nmgp_dados_select['fechault_']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "fechault = #$this->fechault_#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "fechault = EXTEND('" . $this->fechault_ . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fechault = " . $this->Ini->date_delim . $this->fechault_ . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['saldo_']) && $NM_val_form['saldo_'] != $this->nmgp_dados_select['saldo_']) 
              { 
                  $SC_fields_update[] = "saldo = $this->saldo_"; 
              } 
              if (isset($NM_val_form['afiliacion_']) && $NM_val_form['afiliacion_'] != $this->nmgp_dados_select['afiliacion_']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "afiliacion = #$this->afiliacion_#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "afiliacion = EXTEND('" . $this->afiliacion_ . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "afiliacion = " . $this->Ini->date_delim . $this->afiliacion_ . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['credito_']) && $NM_val_form['credito_'] != $this->nmgp_dados_select['credito_']) 
              { 
                  $SC_fields_update[] = "credito = '$this->credito_'"; 
              } 
              if (isset($NM_val_form['cupo_']) && $NM_val_form['cupo_'] != $this->nmgp_dados_select['cupo_']) 
              { 
                  $SC_fields_update[] = "cupo = $this->cupo_"; 
              } 
              if (isset($NM_val_form['listaprecios_']) && $NM_val_form['listaprecios_'] != $this->nmgp_dados_select['listaprecios_']) 
              { 
                  $SC_fields_update[] = "listaprecios = $this->listaprecios_"; 
              } 
              if (isset($NM_val_form['loatiende_']) && $NM_val_form['loatiende_'] != $this->nmgp_dados_select['loatiende_']) 
              { 
                  $SC_fields_update[] = "loatiende = $this->loatiende_"; 
              } 
              if (isset($NM_val_form['con_actual_']) && $NM_val_form['con_actual_'] != $this->nmgp_dados_select['con_actual_']) 
              { 
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  { 
                      $SC_fields_update[] = "con_actual = TO_DATE('$this->con_actual_', 'yyyy-mm-dd hh24:mi:ss')"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "con_actual = '$this->con_actual_'"; 
                  } 
              } 
              if (isset($NM_val_form['efec_retencion_']) && $NM_val_form['efec_retencion_'] != $this->nmgp_dados_select['efec_retencion_']) 
              { 
                  $SC_fields_update[] = "efec_retencion = '$this->efec_retencion_'"; 
              } 
              if (isset($NM_val_form['empleado_']) && $NM_val_form['empleado_'] != $this->nmgp_dados_select['empleado_']) 
              { 
                  $SC_fields_update[] = "empleado = '$this->empleado_'"; 
              } 
              if (isset($NM_val_form['proveedor_']) && $NM_val_form['proveedor_'] != $this->nmgp_dados_select['proveedor_']) 
              { 
                  $SC_fields_update[] = "proveedor = '$this->proveedor_'"; 
              } 
              if (isset($NM_val_form['contacto_']) && $NM_val_form['contacto_'] != $this->nmgp_dados_select['contacto_']) 
              { 
                  $SC_fields_update[] = "contacto = '$this->contacto_'"; 
              } 
              if (isset($NM_val_form['telefonos_prov_']) && $NM_val_form['telefonos_prov_'] != $this->nmgp_dados_select['telefonos_prov_']) 
              { 
                  $SC_fields_update[] = "telefonos_prov = '$this->telefonos_prov_'"; 
              } 
              if (isset($NM_val_form['email_']) && $NM_val_form['email_'] != $this->nmgp_dados_select['email_']) 
              { 
                  $SC_fields_update[] = "email = '$this->email_'"; 
              } 
              if (isset($NM_val_form['url_']) && $NM_val_form['url_'] != $this->nmgp_dados_select['url_']) 
              { 
                  $SC_fields_update[] = "url = '$this->url_'"; 
              } 
              if (isset($NM_val_form['creditoprov_']) && $NM_val_form['creditoprov_'] != $this->nmgp_dados_select['creditoprov_']) 
              { 
                  $SC_fields_update[] = "creditoprov = '$this->creditoprov_'"; 
              } 
              if (isset($NM_val_form['dias_']) && $NM_val_form['dias_'] != $this->nmgp_dados_select['dias_']) 
              { 
                  $SC_fields_update[] = "dias = $this->dias_"; 
              } 
              if (isset($NM_val_form['fechultcomp_']) && $NM_val_form['fechultcomp_'] != $this->nmgp_dados_select['fechultcomp_']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "fechultcomp = #$this->fechultcomp_#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "fechultcomp = EXTEND('" . $this->fechultcomp_ . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fechultcomp = " . $this->Ini->date_delim . $this->fechultcomp_ . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['saldoapagar_']) && $NM_val_form['saldoapagar_'] != $this->nmgp_dados_select['saldoapagar_']) 
              { 
                  $SC_fields_update[] = "saldoapagar = $this->saldoapagar_"; 
              } 
              if (isset($NM_val_form['autoretenedor_']) && $NM_val_form['autoretenedor_'] != $this->nmgp_dados_select['autoretenedor_']) 
              { 
                  $SC_fields_update[] = "autoretenedor = '$this->autoretenedor_'"; 
              } 
              if (isset($NM_val_form['sucur_cliente_']) && $NM_val_form['sucur_cliente_'] != $this->nmgp_dados_select['sucur_cliente_']) 
              { 
                  $SC_fields_update[] = "sucur_cliente = '$this->sucur_cliente_'"; 
              } 
              $aDoNotUpdate = array();
              $temp_cmd_sql = "";
              if ($this->imagenter__limpa == "S")
              {
                  if ($this->imagenter_ != "null")
                  {
                      $this->imagenter_ = '';
                  }
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                  {
                  }
                  else
                  {
                      $temp_cmd_sql = "imagenter = '" . $this->imagenter_ . "'";
                  }
                  $this->imagenter_ = "";
              }
              else
              {
                  if ($this->imagenter_ != "none" && $this->imagenter_ != "")
                  {
                      $NM_conteudo =  $this->imagenter_;
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
                      $aDoNotUpdate[] = "imagenter_";
                  }
              }
              if (!empty($temp_cmd_sql))
              {
                  $SC_fields_update[] = $temp_cmd_sql;
              }
              if ($this->imagenter__limpa == "S" || ($this->imagenter_ != "none" && $this->imagenter_ != "" && in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))) 
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
                  $comando .= " WHERE idtercero = $this->idtercero_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE idtercero = $this->idtercero_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE idtercero = $this->idtercero_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE idtercero = $this->idtercero_ ";  
              }  
              else  
              {
                  $comando .= " WHERE idtercero = $this->idtercero_ ";  
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
                                  terceros_mesas_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              $this->documento_ = $this->documento__before_qstr;
              $this->nombres_ = $this->nombres__before_qstr;
              $this->direccion_ = $this->direccion__before_qstr;
              $this->tel_cel_ = $this->tel_cel__before_qstr;
              $this->sexo_ = $this->sexo__before_qstr;
              $this->urlmail_ = $this->urlmail__before_qstr;
              $this->observaciones_ = $this->observaciones__before_qstr;
              $this->credito_ = $this->credito__before_qstr;
              $this->efec_retencion_ = $this->efec_retencion__before_qstr;
              $this->regimen_ = $this->regimen__before_qstr;
              $this->tipo_ = $this->tipo__before_qstr;
              $this->cliente_ = $this->cliente__before_qstr;
              $this->empleado_ = $this->empleado__before_qstr;
              $this->proveedor_ = $this->proveedor__before_qstr;
              $this->contacto_ = $this->contacto__before_qstr;
              $this->telefonos_prov_ = $this->telefonos_prov__before_qstr;
              $this->email_ = $this->email__before_qstr;
              $this->url_ = $this->url__before_qstr;
              $this->creditoprov_ = $this->creditoprov__before_qstr;
              $this->autoretenedor_ = $this->autoretenedor__before_qstr;
              $this->tipo_documento_ = $this->tipo_documento__before_qstr;
              $this->nombre1_ = $this->nombre1__before_qstr;
              $this->nombre2_ = $this->nombre2__before_qstr;
              $this->apellido1_ = $this->apellido1__before_qstr;
              $this->apellido2_ = $this->apellido2__before_qstr;
              $this->sucur_cliente_ = $this->sucur_cliente__before_qstr;
              $this->representante_ = $this->representante__before_qstr;
              $this->es_restaurante_ = $this->es_restaurante__before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if ($this->imagenter__limpa == "S" && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"imagenter\", \"\",  \"idtercero = $this->idtercero_\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "imagenter", "",  "idtercero = $this->idtercero_"); 
                  } 
                  else 
                  { 
                      if ($this->imagenter_ != "none" && $this->imagenter_ != "") 
                      { 
                          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"imagenter\", $this->imagenter_,  \"idtercero = $this->idtercero_\")"; 
                          $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "imagenter", $this->imagenter_,  "idtercero = $this->idtercero_"); 
                      } 
                  } 
                  if ($rs === false) 
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          terceros_mesas_pack_ajax_response();
                      }
                      exit;  
                  }   
              }   
              if ($this->imagenter__limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['imagenter__salva'] = array(
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
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 

              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
                  $this->NM_ajax_info['fldList']['imagenter__salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }

              $this->sc_teve_alt = true; 
              if     (isset($NM_val_form) && isset($NM_val_form['documento_'])) { $this->documento_ = $NM_val_form['documento_']; }
              elseif (isset($this->documento_)) { $this->nm_limpa_alfa($this->documento_); }
              if     (isset($NM_val_form) && isset($NM_val_form['nombres_'])) { $this->nombres_ = $NM_val_form['nombres_']; }
              elseif (isset($this->nombres_)) { $this->nm_limpa_alfa($this->nombres_); }
              if     (isset($NM_val_form) && isset($NM_val_form['direccion_'])) { $this->direccion_ = $NM_val_form['direccion_']; }
              elseif (isset($this->direccion_)) { $this->nm_limpa_alfa($this->direccion_); }
              if     (isset($NM_val_form) && isset($NM_val_form['sexo_'])) { $this->sexo_ = $NM_val_form['sexo_']; }
              elseif (isset($this->sexo_)) { $this->nm_limpa_alfa($this->sexo_); }
              if     (isset($NM_val_form) && isset($NM_val_form['idmuni_'])) { $this->idmuni_ = $NM_val_form['idmuni_']; }
              elseif (isset($this->idmuni_)) { $this->nm_limpa_alfa($this->idmuni_); }
              if     (isset($NM_val_form) && isset($NM_val_form['observaciones_'])) { $this->observaciones_ = $NM_val_form['observaciones_']; }
              elseif (isset($this->observaciones_)) { $this->nm_limpa_alfa($this->observaciones_); }
              if     (isset($NM_val_form) && isset($NM_val_form['regimen_'])) { $this->regimen_ = $NM_val_form['regimen_']; }
              elseif (isset($this->regimen_)) { $this->nm_limpa_alfa($this->regimen_); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo_'])) { $this->tipo_ = $NM_val_form['tipo_']; }
              elseif (isset($this->tipo_)) { $this->nm_limpa_alfa($this->tipo_); }
              if     (isset($NM_val_form) && isset($NM_val_form['cliente_'])) { $this->cliente_ = $NM_val_form['cliente_']; }
              elseif (isset($this->cliente_)) { $this->nm_limpa_alfa($this->cliente_); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo_documento_'])) { $this->tipo_documento_ = $NM_val_form['tipo_documento_']; }
              elseif (isset($this->tipo_documento_)) { $this->nm_limpa_alfa($this->tipo_documento_); }
              if     (isset($NM_val_form) && isset($NM_val_form['dv_'])) { $this->dv_ = $NM_val_form['dv_']; }
              elseif (isset($this->dv_)) { $this->nm_limpa_alfa($this->dv_); }
              if     (isset($NM_val_form) && isset($NM_val_form['nombre1_'])) { $this->nombre1_ = $NM_val_form['nombre1_']; }
              elseif (isset($this->nombre1_)) { $this->nm_limpa_alfa($this->nombre1_); }
              if     (isset($NM_val_form) && isset($NM_val_form['nombre2_'])) { $this->nombre2_ = $NM_val_form['nombre2_']; }
              elseif (isset($this->nombre2_)) { $this->nm_limpa_alfa($this->nombre2_); }
              if     (isset($NM_val_form) && isset($NM_val_form['apellido1_'])) { $this->apellido1_ = $NM_val_form['apellido1_']; }
              elseif (isset($this->apellido1_)) { $this->nm_limpa_alfa($this->apellido1_); }
              if     (isset($NM_val_form) && isset($NM_val_form['apellido2_'])) { $this->apellido2_ = $NM_val_form['apellido2_']; }
              elseif (isset($this->apellido2_)) { $this->nm_limpa_alfa($this->apellido2_); }
              if     (isset($NM_val_form) && isset($NM_val_form['representante_'])) { $this->representante_ = $NM_val_form['representante_']; }
              elseif (isset($this->representante_)) { $this->nm_limpa_alfa($this->representante_); }
              if     (isset($NM_val_form) && isset($NM_val_form['es_restaurante_'])) { $this->es_restaurante_ = $NM_val_form['es_restaurante_']; }
              elseif (isset($this->es_restaurante_)) { $this->nm_limpa_alfa($this->es_restaurante_); }
              $this->nm_proc_onload_record($this->nmgp_refresh_row);

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('tipo_documento_', 'documento_', 'dv_', 'nombre1_', 'nombre2_', 'apellido1_', 'apellido2_', 'nombres_', 'representante_', 'sexo_', 'tipo_', 'regimen_', 'direccion_', 'departamento_', 'idmuni_', 'observaciones_', 'cliente_', 'es_restaurante_'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
              {

                  $this->NM_ajax_info['readOnly']['tipo_documento_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['documento_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['dv_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['imagenter_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['nombre1_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['nombre2_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['apellido1_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['apellido2_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['nombres_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['representante_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['sexo_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['tipo_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['regimen_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['direccion_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['departamento_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['idmuni_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['observaciones_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['cliente_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['es_restaurante_' . $this->nmgp_refresh_row] = 'on';


                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          $bInsertOk = true;
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 0) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_pkey']; 
              $this->nmgp_opcao = "nada"; 
              $GLOBALS["erro_incl"] = 1; 
              $bInsertOk = false;
              $this->sc_evento = 'insert';
          } 
          $rs1->Close(); 
          $aInsertOk = array(); 
              $Cmd_Unique = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where documento = '" . $this->documento_ . "'";
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
                          terceros_mesas_pack_ajax_response();
                          exit;
                      }
                  }
              }
              elseif (0 < $rsUni->fields[0])
              {
                  $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_inst_uniq'] . " Código de Ubicación o mesa"; 
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
          if ($bInsertOk)
          { 
              $_test_file = $this->fetchUniqueUploadName($this->imagenter__scfile_name, $dir_file, "imagenter_");
              if (trim($this->imagenter__scfile_name) != $_test_file)
              {
                  $this->imagenter__scfile_name = $_test_file;
                  $this->imagenter_ = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante) VALUES ($this->idtercero_, '$this->documento_', '$this->nombres_', '$this->direccion_', '$this->tel_cel_', #$this->nacimiento_#, '$this->sexo_', '$this->urlmail_', #$this->fechault_#, $this->saldo_, #$this->afiliacion_#, $this->idmuni_, '$this->observaciones_', '$this->credito_', $this->cupo_, $this->listaprecios_, $this->loatiende_, '$this->con_actual_', '$this->efec_retencion_', '$this->regimen_', '$this->tipo_', '$this->cliente_', '$this->empleado_', '$this->proveedor_', '$this->contacto_', '$this->telefonos_prov_', '$this->email_', '$this->url_', '$this->creditoprov_', $this->dias_, #$this->fechultcomp_#, $this->saldoapagar_, '$this->autoretenedor_', '$this->tipo_documento_', $this->dv_, '$this->nombre1_', '$this->nombre2_', '$this->apellido1_', '$this->apellido2_', '$this->sucur_cliente_', '$this->representante_', '$this->imagenter_', '$this->es_restaurante_')"; 
              }
              elseif ($this->Ini->nm_tpbanco == "pdo_sqlsrv")
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante) VALUES ($this->idtercero_, '$this->documento_', '$this->nombres_', '$this->direccion_', '$this->tel_cel_', " . $this->Ini->date_delim . $this->nacimiento_ . $this->Ini->date_delim1 . ", '$this->sexo_', '$this->urlmail_', " . $this->Ini->date_delim . $this->fechault_ . $this->Ini->date_delim1 . ", $this->saldo_, " . $this->Ini->date_delim . $this->afiliacion_ . $this->Ini->date_delim1 . ", $this->idmuni_, '$this->observaciones_', '$this->credito_', $this->cupo_, $this->listaprecios_, $this->loatiende_, '$this->con_actual_', '$this->efec_retencion_', '$this->regimen_', '$this->tipo_', '$this->cliente_', '$this->empleado_', '$this->proveedor_', '$this->contacto_', '$this->telefonos_prov_', '$this->email_', '$this->url_', '$this->creditoprov_', $this->dias_, " . $this->Ini->date_delim . $this->fechultcomp_ . $this->Ini->date_delim1 . ", $this->saldoapagar_, '$this->autoretenedor_', '$this->tipo_documento_', $this->dv_, '$this->nombre1_', '$this->nombre2_', '$this->apellido1_', '$this->apellido2_', '$this->sucur_cliente_', '$this->representante_', '', '$this->es_restaurante_')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante) VALUES ($this->idtercero_, '$this->documento_', '$this->nombres_', '$this->direccion_', '$this->tel_cel_', " . $this->Ini->date_delim . $this->nacimiento_ . $this->Ini->date_delim1 . ", '$this->sexo_', '$this->urlmail_', " . $this->Ini->date_delim . $this->fechault_ . $this->Ini->date_delim1 . ", $this->saldo_, " . $this->Ini->date_delim . $this->afiliacion_ . $this->Ini->date_delim1 . ", $this->idmuni_, '$this->observaciones_', '$this->credito_', $this->cupo_, $this->listaprecios_, $this->loatiende_, '$this->con_actual_', '$this->efec_retencion_', '$this->regimen_', '$this->tipo_', '$this->cliente_', '$this->empleado_', '$this->proveedor_', '$this->contacto_', '$this->telefonos_prov_', '$this->email_', '$this->url_', '$this->creditoprov_', $this->dias_, " . $this->Ini->date_delim . $this->fechultcomp_ . $this->Ini->date_delim1 . ", $this->saldoapagar_, '$this->autoretenedor_', '$this->tipo_documento_', $this->dv_, '$this->nombre1_', '$this->nombre2_', '$this->apellido1_', '$this->apellido2_', '$this->sucur_cliente_', '$this->representante_', '$this->imagenter_', '$this->es_restaurante_')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante) VALUES ($this->idtercero_, '$this->documento_', '$this->nombres_', '$this->direccion_', '$this->tel_cel_', " . $this->Ini->date_delim . $this->nacimiento_ . $this->Ini->date_delim1 . ", '$this->sexo_', '$this->urlmail_', " . $this->Ini->date_delim . $this->fechault_ . $this->Ini->date_delim1 . ", $this->saldo_, " . $this->Ini->date_delim . $this->afiliacion_ . $this->Ini->date_delim1 . ", $this->idmuni_, '$this->observaciones_', '$this->credito_', $this->cupo_, $this->listaprecios_, $this->loatiende_, '$this->con_actual_', '$this->efec_retencion_', '$this->regimen_', '$this->tipo_', '$this->cliente_', '$this->empleado_', '$this->proveedor_', '$this->contacto_', '$this->telefonos_prov_', '$this->email_', '$this->url_', '$this->creditoprov_', $this->dias_, " . $this->Ini->date_delim . $this->fechultcomp_ . $this->Ini->date_delim1 . ", $this->saldoapagar_, '$this->autoretenedor_', '$this->tipo_documento_', $this->dv_, '$this->nombre1_', '$this->nombre2_', '$this->apellido1_', '$this->apellido2_', '$this->sucur_cliente_', '$this->representante_', '$this->imagenter_', '$this->es_restaurante_')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante) VALUES (" . $NM_seq_auto . "$this->idtercero_, '$this->documento_', '$this->nombres_', '$this->direccion_', '$this->tel_cel_', " . $this->Ini->date_delim . $this->nacimiento_ . $this->Ini->date_delim1 . ", '$this->sexo_', '$this->urlmail_', " . $this->Ini->date_delim . $this->fechault_ . $this->Ini->date_delim1 . ", $this->saldo_, " . $this->Ini->date_delim . $this->afiliacion_ . $this->Ini->date_delim1 . ", $this->idmuni_, '$this->observaciones_', '$this->credito_', $this->cupo_, $this->listaprecios_, $this->loatiende_, TO_DATE('$this->con_actual_', 'yyyy-mm-dd hh24:mi:ss'), '$this->efec_retencion_', '$this->regimen_', '$this->tipo_', '$this->cliente_', '$this->empleado_', '$this->proveedor_', '$this->contacto_', '$this->telefonos_prov_', '$this->email_', '$this->url_', '$this->creditoprov_', $this->dias_, " . $this->Ini->date_delim . $this->fechultcomp_ . $this->Ini->date_delim1 . ", $this->saldoapagar_, '$this->autoretenedor_', '$this->tipo_documento_', $this->dv_, '$this->nombre1_', '$this->nombre2_', '$this->apellido1_', '$this->apellido2_', '$this->sucur_cliente_', '$this->representante_', EMPTY_BLOB(), '$this->es_restaurante_')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante) VALUES (" . $NM_seq_auto . "$this->idtercero_, '$this->documento_', '$this->nombres_', '$this->direccion_', '$this->tel_cel_', EXTEND('$this->nacimiento_', YEAR TO DAY), '$this->sexo_', '$this->urlmail_', EXTEND('$this->fechault_', YEAR TO DAY), $this->saldo_, EXTEND('$this->afiliacion_', YEAR TO DAY), $this->idmuni_, '$this->observaciones_', '$this->credito_', $this->cupo_, $this->listaprecios_, $this->loatiende_, '$this->con_actual_', '$this->efec_retencion_', '$this->regimen_', '$this->tipo_', '$this->cliente_', '$this->empleado_', '$this->proveedor_', '$this->contacto_', '$this->telefonos_prov_', '$this->email_', '$this->url_', '$this->creditoprov_', $this->dias_, EXTEND('$this->fechultcomp_', YEAR TO DAY), $this->saldoapagar_, '$this->autoretenedor_', '$this->tipo_documento_', $this->dv_, '$this->nombre1_', '$this->nombre2_', '$this->apellido1_', '$this->apellido2_', '$this->sucur_cliente_', '$this->representante_', null, '$this->es_restaurante_')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante) VALUES (" . $NM_seq_auto . "$this->idtercero_, '$this->documento_', '$this->nombres_', '$this->direccion_', '$this->tel_cel_', " . $this->Ini->date_delim . $this->nacimiento_ . $this->Ini->date_delim1 . ", '$this->sexo_', '$this->urlmail_', " . $this->Ini->date_delim . $this->fechault_ . $this->Ini->date_delim1 . ", $this->saldo_, " . $this->Ini->date_delim . $this->afiliacion_ . $this->Ini->date_delim1 . ", $this->idmuni_, '$this->observaciones_', '$this->credito_', $this->cupo_, $this->listaprecios_, $this->loatiende_, '$this->con_actual_', '$this->efec_retencion_', '$this->regimen_', '$this->tipo_', '$this->cliente_', '$this->empleado_', '$this->proveedor_', '$this->contacto_', '$this->telefonos_prov_', '$this->email_', '$this->url_', '$this->creditoprov_', $this->dias_, " . $this->Ini->date_delim . $this->fechultcomp_ . $this->Ini->date_delim1 . ", $this->saldoapagar_, '$this->autoretenedor_', '$this->tipo_documento_', $this->dv_, '$this->nombre1_', '$this->nombre2_', '$this->apellido1_', '$this->apellido2_', '$this->sucur_cliente_', '$this->representante_', '', '$this->es_restaurante_')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante) VALUES (" . $NM_seq_auto . "$this->idtercero_, '$this->documento_', '$this->nombres_', '$this->direccion_', '$this->tel_cel_', " . $this->Ini->date_delim . $this->nacimiento_ . $this->Ini->date_delim1 . ", '$this->sexo_', '$this->urlmail_', " . $this->Ini->date_delim . $this->fechault_ . $this->Ini->date_delim1 . ", $this->saldo_, " . $this->Ini->date_delim . $this->afiliacion_ . $this->Ini->date_delim1 . ", $this->idmuni_, '$this->observaciones_', '$this->credito_', $this->cupo_, $this->listaprecios_, $this->loatiende_, '$this->con_actual_', '$this->efec_retencion_', '$this->regimen_', '$this->tipo_', '$this->cliente_', '$this->empleado_', '$this->proveedor_', '$this->contacto_', '$this->telefonos_prov_', '$this->email_', '$this->url_', '$this->creditoprov_', $this->dias_, " . $this->Ini->date_delim . $this->fechultcomp_ . $this->Ini->date_delim1 . ", $this->saldoapagar_, '$this->autoretenedor_', '$this->tipo_documento_', $this->dv_, '$this->nombre1_', '$this->nombre2_', '$this->apellido1_', '$this->apellido2_', '$this->sucur_cliente_', '$this->representante_', '', '$this->es_restaurante_')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante) VALUES (" . $NM_seq_auto . "$this->idtercero_, '$this->documento_', '$this->nombres_', '$this->direccion_', '$this->tel_cel_', " . $this->Ini->date_delim . $this->nacimiento_ . $this->Ini->date_delim1 . ", '$this->sexo_', '$this->urlmail_', " . $this->Ini->date_delim . $this->fechault_ . $this->Ini->date_delim1 . ", $this->saldo_, " . $this->Ini->date_delim . $this->afiliacion_ . $this->Ini->date_delim1 . ", $this->idmuni_, '$this->observaciones_', '$this->credito_', $this->cupo_, $this->listaprecios_, $this->loatiende_, '$this->con_actual_', '$this->efec_retencion_', '$this->regimen_', '$this->tipo_', '$this->cliente_', '$this->empleado_', '$this->proveedor_', '$this->contacto_', '$this->telefonos_prov_', '$this->email_', '$this->url_', '$this->creditoprov_', $this->dias_, " . $this->Ini->date_delim . $this->fechultcomp_ . $this->Ini->date_delim1 . ", $this->saldoapagar_, '$this->autoretenedor_', '$this->tipo_documento_', $this->dv_, '$this->nombre1_', '$this->nombre2_', '$this->apellido1_', '$this->apellido2_', '$this->sucur_cliente_', '$this->representante_', '', '$this->es_restaurante_')"; 
              }
              elseif ($this->Ini->nm_tpbanco =='pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante) VALUES (" . $NM_seq_auto . "$this->idtercero_, '$this->documento_', '$this->nombres_', '$this->direccion_', '$this->tel_cel_', " . $this->Ini->date_delim . $this->nacimiento_ . $this->Ini->date_delim1 . ", '$this->sexo_', '$this->urlmail_', " . $this->Ini->date_delim . $this->fechault_ . $this->Ini->date_delim1 . ", $this->saldo_, " . $this->Ini->date_delim . $this->afiliacion_ . $this->Ini->date_delim1 . ", $this->idmuni_, '$this->observaciones_', '$this->credito_', $this->cupo_, $this->listaprecios_, $this->loatiende_, TO_DATE('$this->con_actual_', 'yyyy-mm-dd hh24:mi:ss'), '$this->efec_retencion_', '$this->regimen_', '$this->tipo_', '$this->cliente_', '$this->empleado_', '$this->proveedor_', '$this->contacto_', '$this->telefonos_prov_', '$this->email_', '$this->url_', '$this->creditoprov_', $this->dias_, " . $this->Ini->date_delim . $this->fechultcomp_ . $this->Ini->date_delim1 . ", $this->saldoapagar_, '$this->autoretenedor_', '$this->tipo_documento_', $this->dv_, '$this->nombre1_', '$this->nombre2_', '$this->apellido1_', '$this->apellido2_', '$this->sucur_cliente_', '$this->representante_', EMPTY_BLOB(), '$this->es_restaurante_')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante) VALUES (" . $NM_seq_auto . "$this->idtercero_, '$this->documento_', '$this->nombres_', '$this->direccion_', '$this->tel_cel_', " . $this->Ini->date_delim . $this->nacimiento_ . $this->Ini->date_delim1 . ", '$this->sexo_', '$this->urlmail_', " . $this->Ini->date_delim . $this->fechault_ . $this->Ini->date_delim1 . ", $this->saldo_, " . $this->Ini->date_delim . $this->afiliacion_ . $this->Ini->date_delim1 . ", $this->idmuni_, '$this->observaciones_', '$this->credito_', $this->cupo_, $this->listaprecios_, $this->loatiende_, '$this->con_actual_', '$this->efec_retencion_', '$this->regimen_', '$this->tipo_', '$this->cliente_', '$this->empleado_', '$this->proveedor_', '$this->contacto_', '$this->telefonos_prov_', '$this->email_', '$this->url_', '$this->creditoprov_', $this->dias_, " . $this->Ini->date_delim . $this->fechultcomp_ . $this->Ini->date_delim1 . ", $this->saldoapagar_, '$this->autoretenedor_', '$this->tipo_documento_', $this->dv_, '$this->nombre1_', '$this->nombre2_', '$this->apellido1_', '$this->apellido2_', '$this->sucur_cliente_', '$this->representante_', '$this->imagenter_', '$this->es_restaurante_')"; 
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
                              terceros_mesas_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              $this->documento_ = $this->documento__before_qstr;
              $this->nombres_ = $this->nombres__before_qstr;
              $this->direccion_ = $this->direccion__before_qstr;
              $this->tel_cel_ = $this->tel_cel__before_qstr;
              $this->sexo_ = $this->sexo__before_qstr;
              $this->urlmail_ = $this->urlmail__before_qstr;
              $this->observaciones_ = $this->observaciones__before_qstr;
              $this->credito_ = $this->credito__before_qstr;
              $this->efec_retencion_ = $this->efec_retencion__before_qstr;
              $this->regimen_ = $this->regimen__before_qstr;
              $this->tipo_ = $this->tipo__before_qstr;
              $this->cliente_ = $this->cliente__before_qstr;
              $this->empleado_ = $this->empleado__before_qstr;
              $this->proveedor_ = $this->proveedor__before_qstr;
              $this->contacto_ = $this->contacto__before_qstr;
              $this->telefonos_prov_ = $this->telefonos_prov__before_qstr;
              $this->email_ = $this->email__before_qstr;
              $this->url_ = $this->url__before_qstr;
              $this->creditoprov_ = $this->creditoprov__before_qstr;
              $this->autoretenedor_ = $this->autoretenedor__before_qstr;
              $this->tipo_documento_ = $this->tipo_documento__before_qstr;
              $this->nombre1_ = $this->nombre1__before_qstr;
              $this->nombre2_ = $this->nombre2__before_qstr;
              $this->apellido1_ = $this->apellido1__before_qstr;
              $this->apellido2_ = $this->apellido2__before_qstr;
              $this->sucur_cliente_ = $this->sucur_cliente__before_qstr;
              $this->representante_ = $this->representante__before_qstr;
              $this->es_restaurante_ = $this->es_restaurante__before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if (trim($this->imagenter_ ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  imagenter , $this->imagenter_,  \"idtercero = $this->idtercero_\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "imagenter", $this->imagenter_,  "idtercero = $this->idtercero_"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              terceros_mesas_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
              }  
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['db_changed'] = true;

              $this->sc_evento = "insert"; 
              $this->documento_ = $this->documento__before_qstr;
              $this->nombres_ = $this->nombres__before_qstr;
              $this->direccion_ = $this->direccion__before_qstr;
              $this->tel_cel_ = $this->tel_cel__before_qstr;
              $this->sexo_ = $this->sexo__before_qstr;
              $this->urlmail_ = $this->urlmail__before_qstr;
              $this->observaciones_ = $this->observaciones__before_qstr;
              $this->credito_ = $this->credito__before_qstr;
              $this->efec_retencion_ = $this->efec_retencion__before_qstr;
              $this->regimen_ = $this->regimen__before_qstr;
              $this->tipo_ = $this->tipo__before_qstr;
              $this->cliente_ = $this->cliente__before_qstr;
              $this->empleado_ = $this->empleado__before_qstr;
              $this->proveedor_ = $this->proveedor__before_qstr;
              $this->contacto_ = $this->contacto__before_qstr;
              $this->telefonos_prov_ = $this->telefonos_prov__before_qstr;
              $this->email_ = $this->email__before_qstr;
              $this->url_ = $this->url__before_qstr;
              $this->creditoprov_ = $this->creditoprov__before_qstr;
              $this->autoretenedor_ = $this->autoretenedor__before_qstr;
              $this->tipo_documento_ = $this->tipo_documento__before_qstr;
              $this->nombre1_ = $this->nombre1__before_qstr;
              $this->nombre2_ = $this->nombre2__before_qstr;
              $this->apellido1_ = $this->apellido1__before_qstr;
              $this->apellido2_ = $this->apellido2__before_qstr;
              $this->sucur_cliente_ = $this->sucur_cliente__before_qstr;
              $this->representante_ = $this->representante__before_qstr;
              $this->es_restaurante_ = $this->es_restaurante__before_qstr;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['total']++; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_qtd']++; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_I_E']++; 
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['total'] + 1; 
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              $this->sc_teve_incl = true; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['tipo_documento_'] = $this->tipo_documento_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['documento_'] = $this->documento_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['dv_'] = $this->dv_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['imagenter_'] = $this->imagenter_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['nombre1_'] = $this->nombre1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['nombre2_'] = $this->nombre2_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['apellido1_'] = $this->apellido1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['apellido2_'] = $this->apellido2_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['nombres_'] = $this->nombres_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['representante_'] = $this->representante_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['sexo_'] = $this->sexo_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['tipo_'] = $this->tipo_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['regimen_'] = $this->regimen_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['direccion_'] = $this->direccion_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['idmuni_'] = $this->idmuni_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['observaciones_'] = $this->observaciones_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['cliente_'] = $this->cliente_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert]['es_restaurante_'] = $this->es_restaurante_;
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
              if (isset($this->documento_)) { $this->nm_limpa_alfa($this->documento_); }
              if (isset($this->nombres_)) { $this->nm_limpa_alfa($this->nombres_); }
              if (isset($this->direccion_)) { $this->nm_limpa_alfa($this->direccion_); }
              if (isset($this->sexo_)) { $this->nm_limpa_alfa($this->sexo_); }
              if (isset($this->idmuni_)) { $this->nm_limpa_alfa($this->idmuni_); }
              if (isset($this->observaciones_)) { $this->nm_limpa_alfa($this->observaciones_); }
              if (isset($this->regimen_)) { $this->nm_limpa_alfa($this->regimen_); }
              if (isset($this->tipo_)) { $this->nm_limpa_alfa($this->tipo_); }
              if (isset($this->cliente_)) { $this->nm_limpa_alfa($this->cliente_); }
              if (isset($this->tipo_documento_)) { $this->nm_limpa_alfa($this->tipo_documento_); }
              if (isset($this->dv_)) { $this->nm_limpa_alfa($this->dv_); }
              if (isset($this->nombre1_)) { $this->nm_limpa_alfa($this->nombre1_); }
              if (isset($this->nombre2_)) { $this->nm_limpa_alfa($this->nombre2_); }
              if (isset($this->apellido1_)) { $this->nm_limpa_alfa($this->apellido1_); }
              if (isset($this->apellido2_)) { $this->nm_limpa_alfa($this->apellido2_); }
              if (isset($this->representante_)) { $this->nm_limpa_alfa($this->representante_); }
              if (isset($this->es_restaurante_)) { $this->nm_limpa_alfa($this->es_restaurante_); }
              if (isset($this->Embutida_form) && $this->Embutida_form)
              {
                  $this->nm_guardar_campos();
                  $this->nm_proc_onload_record($this->nmgp_refresh_row);
                  $this->nm_formatar_campos();

                  $aLookup = array();
$aLookup[] = array(terceros_mesas_pack_protect_string('11') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Registtro civil de nacimiento")));
$aLookup[] = array(terceros_mesas_pack_protect_string('12') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Tarjeta de identidad")));
$aLookup[] = array(terceros_mesas_pack_protect_string('13') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Cédula de ciudadanía")));
$aLookup[] = array(terceros_mesas_pack_protect_string('21') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Tarjeta de Extranjería")));
$aLookup[] = array(terceros_mesas_pack_protect_string('22') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Cédula de extranjería")));
$aLookup[] = array(terceros_mesas_pack_protect_string('31') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Nit")));
$aLookup[] = array(terceros_mesas_pack_protect_string('41') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Pasaporte")));
$aLookup[] = array(terceros_mesas_pack_protect_string('42') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Tipo de documento extranjero")));
$aLookup[] = array(terceros_mesas_pack_protect_string('43') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Definido por la DIAN")));
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '11';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '12';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '13';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '21';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '22';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '31';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '41';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '42';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_documento_'][] = '43';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == terceros_mesas_pack_protect_string(NM_charset_to_utf8($this->tipo_documento_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_tipo_documento_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['tipo_documento_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['tipo_documento_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->tipo_documento_)));
                  $this->NM_ajax_info['fldList']['tipo_documento_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_tipo_documento_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tipo_documento_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tipo_documento_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tipo_documento_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tipo_documento_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['documento_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['documento_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->documento_)));
                  $this->NM_ajax_info['fldList']['documento_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_documento_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['documento_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['documento_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['documento_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['documento_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['dv_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['dv_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->dv_)));
                  $this->NM_ajax_info['fldList']['dv_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_dv_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dv_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dv_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['dv_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['dv_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

   if ($this->imagenter_ != "" && $this->imagenter_ != "none")   
   { 
       $this->imagenter_ = $NM_val_form['imagenter_'];
       $out_imagenter_ = $this->Ini->path_imag_temp . "/sc_imagenter__" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".gif" ;  
       $out1_imagenter_ = $out_imagenter_; 
       $arq_imagenter_ = fopen($this->Ini->root . $out_imagenter_, "w") ;  
       $img_pos_bm = strpos($this->imagenter_, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->imagenter_ = substr($this->imagenter_, $img_pos_bm) ; 
       } 
       fwrite($arq_imagenter_, $this->imagenter_) ;  
       fclose($arq_imagenter_) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_imagenter_, true);
       $this->nmgp_return_img['imagenter_'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['imagenter_'][1] = $sc_obj_img->getWidth();
       $_SESSION['scriptcase']['sc_num_img']++ ; 
   } 
   if ($this->Embutida_ronly)
   {
       $this->NM_ajax_info['fldList']['imagenter_' . $this->nmgp_refresh_row]['keepImg'] = 'S';
   }
                  $this->NM_ajax_info['fldList']['imagenter_' . $this->nmgp_refresh_row]['imgFile'] = $out_imagenter_;
                  $this->NM_ajax_info['fldList']['imagenter_' . $this->nmgp_refresh_row]['imgOrig'] = $out1_imagenter_;
                  $this->NM_ajax_info['fldList']['imagenter_' . $this->nmgp_refresh_row]['type']    = 'imagem';
                  $this->NM_ajax_info['fldList']['imagenter_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->imagenter_)));
                  $this->NM_ajax_info['fldList']['imagenter_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_imagenter_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['imagenter_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['imagenter_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['imagenter_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['imagenter_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['nombre1_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['nombre1_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->nombre1_)));
                  $this->NM_ajax_info['fldList']['nombre1_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_nombre1_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['nombre1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['nombre1_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['nombre1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['nombre1_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['nombre2_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['nombre2_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->nombre2_)));
                  $this->NM_ajax_info['fldList']['nombre2_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_nombre2_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['nombre2_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['nombre2_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['nombre2_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['nombre2_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['apellido1_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['apellido1_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->apellido1_)));
                  $this->NM_ajax_info['fldList']['apellido1_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_apellido1_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['apellido1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['apellido1_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['apellido1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['apellido1_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['apellido2_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['apellido2_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->apellido2_)));
                  $this->NM_ajax_info['fldList']['apellido2_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_apellido2_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['apellido2_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['apellido2_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['apellido2_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['apellido2_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['nombres_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['nombres_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->nombres_)));
                  $this->NM_ajax_info['fldList']['nombres_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_nombres_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['nombres_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['nombres_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['nombres_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['nombres_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['representante_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['representante_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->representante_)));
                  $this->NM_ajax_info['fldList']['representante_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_representante_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['representante_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['representante_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['representante_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['representante_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(terceros_mesas_pack_protect_string('M') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Masculino")));
$aLookup[] = array(terceros_mesas_pack_protect_string('F') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Femenino")));
$aLookup[] = array(terceros_mesas_pack_protect_string('O') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("Otro")));
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_sexo_'][] = 'M';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_sexo_'][] = 'F';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_sexo_'][] = 'O';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == terceros_mesas_pack_protect_string(NM_charset_to_utf8($this->sexo_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_sexo_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['sexo_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['sexo_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->sexo_)));
                  $this->NM_ajax_info['fldList']['sexo_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_sexo_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sexo_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sexo_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sexo_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sexo_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(terceros_mesas_pack_protect_string('NAT') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("NATURAL")));
$aLookup[] = array(terceros_mesas_pack_protect_string('JUR') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("JURÍDICA")));
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_'][] = 'NAT';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_tipo_'][] = 'JUR';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == terceros_mesas_pack_protect_string(NM_charset_to_utf8($this->tipo_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_tipo_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['tipo_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['tipo_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->tipo_)));
                  $this->NM_ajax_info['fldList']['tipo_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_tipo_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tipo_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tipo_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tipo_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tipo_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(terceros_mesas_pack_protect_string('SIM') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("SIMPLIFICADO")));
$aLookup[] = array(terceros_mesas_pack_protect_string('COMUN') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("COMÚN")));
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_regimen_'][] = 'SIM';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_regimen_'][] = 'COMUN';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == terceros_mesas_pack_protect_string(NM_charset_to_utf8($this->regimen_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_regimen_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['regimen_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['regimen_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->regimen_)));
                  $this->NM_ajax_info['fldList']['regimen_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_regimen_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['regimen_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['regimen_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['regimen_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['regimen_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['direccion_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['direccion_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->direccion_)));
                  $this->NM_ajax_info['fldList']['direccion_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_direccion_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['direccion_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['direccion_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['direccion_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['direccion_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dv_ = $this->dv_;
   $this->nm_tira_formatacao();


   $unformatted_value_dv_ = $this->dv_;

   $nm_comando = "SELECT iddep, departamento  FROM departamento  ORDER BY departamento";

   $this->dv_ = $old_value_dv_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(terceros_mesas_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', terceros_mesas_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_'][] = $rs->fields[0];
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
              if (key($aValData) == terceros_mesas_pack_protect_string(NM_charset_to_utf8($this->departamento_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_departamento_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['departamento_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['departamento_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->departamento_)));
                  $this->NM_ajax_info['fldList']['departamento_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_departamento_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['departamento_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['departamento_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['departamento_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['departamento_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dv_ = $this->dv_;
   $this->nm_tira_formatacao();


   $unformatted_value_dv_ = $this->dv_;

   $nm_comando = "SELECT idmun, municipio  FROM municipio  WHERE iddepar=$this->departamento_ ORDER BY municipio";

   $this->dv_ = $old_value_dv_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(terceros_mesas_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', terceros_mesas_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_'][] = $rs->fields[0];
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
              if (key($aValData) == terceros_mesas_pack_protect_string(NM_charset_to_utf8($this->idmuni_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_idmuni_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['idmuni_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['idmuni_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->idmuni_)));
                  $this->NM_ajax_info['fldList']['idmuni_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_idmuni_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['idmuni_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['idmuni_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['idmuni_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['idmuni_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->observaciones_    = str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $this->observaciones_);
                  $tmpLabel_observaciones_ = nl2br($this->observaciones_);
                  $this->NM_ajax_info['fldList']['observaciones_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['observaciones_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->observaciones_)));
                  $this->NM_ajax_info['fldList']['observaciones_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_observaciones_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['observaciones_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['observaciones_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['observaciones_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['observaciones_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(terceros_mesas_pack_protect_string('SI') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_cliente_'][] = 'SI';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == terceros_mesas_pack_protect_string(NM_charset_to_utf8($this->cliente_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_cliente_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['cliente_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['cliente_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->cliente_)));
                  $this->NM_ajax_info['fldList']['cliente_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_cliente_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cliente_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cliente_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cliente_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cliente_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
$aLookup[] = array(terceros_mesas_pack_protect_string('NO') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("NO")));
$aLookup[] = array(terceros_mesas_pack_protect_string('SI') => str_replace('<', '&lt;',terceros_mesas_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_es_restaurante_'][] = 'NO';
$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_es_restaurante_'][] = 'SI';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == terceros_mesas_pack_protect_string(NM_charset_to_utf8($this->es_restaurante_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_es_restaurante_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['es_restaurante_' . $this->nmgp_refresh_row]['type']    = 'radio';
                  $this->NM_ajax_info['fldList']['es_restaurante_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->es_restaurante_)));
                  $this->NM_ajax_info['fldList']['es_restaurante_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_es_restaurante_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['es_restaurante_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['es_restaurante_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['es_restaurante_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['es_restaurante_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $tmpLabel_idtercero_ = $this->idtercero_;
                  $this->NM_ajax_info['fldList']['idtercero_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['idtercero_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->idtercero_)));
                  $this->NM_ajax_info['fldList']['idtercero_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_idtercero_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['idtercero_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['idtercero_' . $this->nmgp_refresh_row] = "on";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['idtercero_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['idtercero_' . $this->nmgp_refresh_row] = "on";
                      }
                  }


                  $this->nm_tira_formatacao();

                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_redir_insert'] != "S"))
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->idtercero_ = substr($this->Db->qstr($this->idtercero_), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
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
                          terceros_mesas_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nm_proc_onload_record($sc_seq_vert);
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['db_changed'] = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_qtd']--; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['total']--; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_I_E']--; 
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['total'] + 1; 
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['decimal_db'] == ",")
        {
            $this->nm_troca_decimal(",", ".");
        }
        $_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cliente_ = $this->cliente_;
    $original_direccion_ = $this->direccion_;
    $original_idmuni_ = $this->idmuni_;
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
$muni=$this->idmuni_ ;
 
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
if($this->cliente_ =="SI")
	{

     $nm_select ="insert direccion SET idter=$idt, iddepar=$dep, idmuni=$muni, direc='$this->direccion_', obs='PRINCIPAL', telefono='$this->tel_cel_'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                terceros_mesas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ; 
	}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cliente_ != $this->cliente_ || (isset($bFlagRead_cliente_) && $bFlagRead_cliente_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['cliente_' . $this->nmgp_refresh_row]['type']    = 'select';
        $this->NM_ajax_info['fldList']['cliente_' . $this->nmgp_refresh_row]['valList'] = array($this->cliente_);
        $this->NM_ajax_changed['cliente_'] = true;
    }
    if (($original_direccion_ != $this->direccion_ || (isset($bFlagRead_direccion_) && $bFlagRead_direccion_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['direccion_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['direccion_' . $this->nmgp_refresh_row]['valList'] = array($this->direccion_);
        $this->NM_ajax_changed['direccion_'] = true;
    }
    if (($original_idmuni_ != $this->idmuni_ || (isset($bFlagRead_idmuni_) && $bFlagRead_idmuni_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['idmuni_' . $this->nmgp_refresh_row]['type']    = 'select';
        $this->NM_ajax_info['fldList']['idmuni_' . $this->nmgp_refresh_row]['valList'] = array($this->idmuni_);
        $this->NM_ajax_changed['idmuni_'] = true;
    }
}
$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cliente_ = $this->cliente_;
    $original_direccion_ = $this->direccion_;
    $original_idmuni_ = $this->idmuni_;
}
  $muni=$this->idmuni_ ;
 
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
if($this->cliente_ =="SI")
	{

     $nm_select ="UPDATE direccion SET iddepar=$dep, idmuni=$muni, direc='$this->direccion_', telefono='$this->tel_cel_' where idter=$this->idtercero_  and obs='PRINCIPAL'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                terceros_mesas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ; 
	}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cliente_ != $this->cliente_ || (isset($bFlagRead_cliente_) && $bFlagRead_cliente_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['cliente_' . $this->nmgp_refresh_row]['type']    = 'select';
        $this->NM_ajax_info['fldList']['cliente_' . $this->nmgp_refresh_row]['valList'] = array($this->cliente_);
        $this->NM_ajax_changed['cliente_'] = true;
    }
    if (($original_direccion_ != $this->direccion_ || (isset($bFlagRead_direccion_) && $bFlagRead_direccion_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['direccion_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['direccion_' . $this->nmgp_refresh_row]['valList'] = array($this->direccion_);
        $this->NM_ajax_changed['direccion_'] = true;
    }
    if (($original_idmuni_ != $this->idmuni_ || (isset($bFlagRead_idmuni_) && $bFlagRead_idmuni_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['idmuni_' . $this->nmgp_refresh_row]['type']    = 'select';
        $this->NM_ajax_info['fldList']['idmuni_' . $this->nmgp_refresh_row]['valList'] = array($this->idmuni_);
        $this->NM_ajax_changed['idmuni_'] = true;
    }
}
$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'off'; 
    }
    if ("delete" == $this->sc_evento && $this->nmgp_opcao != "nada") {
      $_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'on';
  
     $nm_select ="delete from direccion where idter=$this->idtercero_ "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                terceros_mesas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          return;
      }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['decimal_db'] == ",")
   {
       $this->nm_troca_decimal(".", ",");
   }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['parms'] = "idtercero_?#?$this->idtercero_?@?"; 
      }
      $this->nmgp_dados_form['imagenter_'] = ""; 
      $this->imagenter__limpa = ""; 
      $this->imagenter__salva = ""; 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idtercero_ = null === $this->idtercero_ ? null : substr($this->Db->qstr($this->idtercero_), 1, -1); 
      } 
   }
//---------- 
   function nm_select_banco() 
   { 
      global $nm_form_submit, $sc_seq_vert, $sc_check_incl, $teste_validade, $sc_where;
 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['rows']))
      {
          $this->sc_max_reg = $_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['rows'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['rows_ins']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['rows_ins']))
      {
          $this->sc_max_reg_incl = $_SESSION['scriptcase']['sc_apl_conf']['terceros_mesas']['rows_ins'];
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_qtd_reg']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_qtd_reg'])
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_liga_qtd_reg'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_max_reg']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_max_reg'] > 0 || strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_max_reg']) == "all"))
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_max_reg'];
      } 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
      $this->form_vert_terceros_mesas = array();
      if ($this->nmgp_opcao != "novo") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['parms'] = ""; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($this->sc_teve_excl)
      {
          $this->nmgp_opcao = "avanca";
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] -= $this->sc_max_reg;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] = 0;
      }
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_filter'] . ")";
          }
      }
      $sc_where = trim("cliente='SI' and documento <1000000 and documento<>0");
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
          if (null != $this->idtercero_)
          {
              $aNewWhereCond[] = "idtercero = " . $this->idtercero_;
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
          if ($this->app_is_initializing || $this->sc_teve_excl || $this->sc_teve_incl || (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['total']))
          {
              $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where;
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
              $rt = $this->Db->Execute($nmgp_select);
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit;
              }
              $qt_geral_reg_terceros_mesas = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['total'] = $qt_geral_reg_terceros_mesas;
              $rt->Close();
          }
      if ((isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['total']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_I_E'] = 0; 
          if (!$this->sc_teve_excl && !$this->sc_teve_incl) 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] = 0; 
          } 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->idtercero_))
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
                  if ($rt->fields[0] == $this->idtercero_)
                  { 
                      $Reg_OK = true;
                  }  
                  $Count_start++;
                  $rt->MoveNext();
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] = $Count_start;
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_terceros_mesas = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['total'];
      } 
      if ($this->nmgp_opcao == "inicio" || $this->nmgp_opcao == "ordem") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_terceros_mesas) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] += ($this->sc_max_reg + $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_I_E']); 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] > $qt_geral_reg_terceros_mesas)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] = $qt_geral_reg_terceros_mesas - $this->sc_max_reg; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] = 0; 
              }
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] -= $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] = ($qt_geral_reg_terceros_mesas + 1) - $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] = 0; 
          }
      } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_I_E'] = 0; 
      }
      $Cmps_ord_def = array();
      $sc_order_by  = "";
      $sc_order_by = "idtercero desc";
      $sc_order_by = str_replace("order by ", "", $sc_order_by);
      $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
      if (!empty($sc_order_by))
      {
          $sc_order_by = " order by $sc_order_by "; 
      }
      if ($this->nmgp_opcao == "ordem" && in_array($this->nmgp_ordem, $Cmps_ord_def)) 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['ordem_cmp'] != $this->nmgp_ordem)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['ordem_cmp'] = $this->nmgp_ordem; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['ordem_ord'] = ' asc'; 
          }
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['ordem_ord'] == ' asc')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['ordem_ord'] = ' desc'; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['ordem_ord'] = ' asc'; 
          }
      } 
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['ordem_cmp'])) 
      { 
          $sc_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['ordem_cmp'] . $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['ordem_ord']; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT idtercero, documento, nombres, direccion, tel_cel, str_replace (convert(char(10),nacimiento,102), '.', '-') + ' ' + convert(char(8),nacimiento,20), sexo, urlmail, str_replace (convert(char(10),fechault,102), '.', '-') + ' ' + convert(char(8),fechault,20), saldo, str_replace (convert(char(10),afiliacion,102), '.', '-') + ' ' + convert(char(8),afiliacion,20), idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, str_replace (convert(char(10),fechultcomp,102), '.', '-') + ' ' + convert(char(8),fechultcomp,20), saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT idtercero, documento, nombres, direccion, tel_cel, convert(char(23),nacimiento,121), sexo, urlmail, convert(char(23),fechault,121), saldo, convert(char(23),afiliacion,121), idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, convert(char(23),fechultcomp,121), saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, TO_DATE(TO_CHAR(con_actual, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT idtercero, documento, nombres, direccion, tel_cel, EXTEND(nacimiento, YEAR TO DAY), sexo, urlmail, EXTEND(fechault, YEAR TO DAY), saldo, EXTEND(afiliacion, YEAR TO DAY), idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, EXTEND(fechultcomp, YEAR TO DAY), saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, LOTOFILE(imagenter, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_imagenter', 'client'), es_restaurante from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      else 
      { 
          $nmgp_select = "SELECT idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] == "R")
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          else 
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start']) ; 
              } 
              else  
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
                  $rs = $this->Db->Execute($nmgp_select) ; 
                  if (!$rs === false && !$rs->EOF) 
                  { 
                      $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start']) ;  
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
          if ($rs->EOF && !$this->proc_fast_search && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['empty_filter']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['empty_filter'])) 
          { 
              $this->nm_flag_saida_novo = "S"; 
              $this->nmgp_opcao = "novo"; 
              $this->sc_evento  = "novo"; 
              if ($this->aba_iframe)
              {
                  $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs->EOF && $this->nmgp_botoes['new'] != "on" && !$this->proc_fast_search)
          {
              $this->nmgp_form_empty = true;
          }
          if ($rs->EOF)
          {
              $sc_seq_vert = 0; 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_filter']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['empty_filter'] = true;
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
          if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
              $this->nm_proc_onload(false);
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
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] == "R")
              { 
                  $this->sc_max_reg++;
              } 
              }
              $this->idtercero_ = $rs->fields[0] ; 
              $this->nmgp_dados_select['idtercero_'] = $this->idtercero_;
              $this->documento_ = $rs->fields[1] ; 
              $this->nmgp_dados_select['documento_'] = $this->documento_;
              $this->nombres_ = $rs->fields[2] ; 
              $this->nmgp_dados_select['nombres_'] = $this->nombres_;
              $this->direccion_ = $rs->fields[3] ; 
              $this->nmgp_dados_select['direccion_'] = $this->direccion_;
              $this->tel_cel_ = $rs->fields[4] ; 
              $this->nmgp_dados_select['tel_cel_'] = $this->tel_cel_;
              $this->nacimiento_ = $rs->fields[5] ; 
              $this->nmgp_dados_select['nacimiento_'] = $this->nacimiento_;
              $this->sexo_ = $rs->fields[6] ; 
              $this->nmgp_dados_select['sexo_'] = $this->sexo_;
              $this->urlmail_ = $rs->fields[7] ; 
              $this->nmgp_dados_select['urlmail_'] = $this->urlmail_;
              $this->fechault_ = $rs->fields[8] ; 
              $this->nmgp_dados_select['fechault_'] = $this->fechault_;
              $this->saldo_ = $rs->fields[9] ; 
              $this->nmgp_dados_select['saldo_'] = $this->saldo_;
              $this->afiliacion_ = $rs->fields[10] ; 
              $this->nmgp_dados_select['afiliacion_'] = $this->afiliacion_;
              $this->idmuni_ = $rs->fields[11] ; 
              $this->nmgp_dados_select['idmuni_'] = $this->idmuni_;
              $this->observaciones_ = $rs->fields[12] ; 
              $this->nmgp_dados_select['observaciones_'] = $this->observaciones_;
              $this->credito_ = $rs->fields[13] ; 
              $this->nmgp_dados_select['credito_'] = $this->credito_;
              $this->cupo_ = $rs->fields[14] ; 
              $this->nmgp_dados_select['cupo_'] = $this->cupo_;
              $this->listaprecios_ = $rs->fields[15] ; 
              $this->nmgp_dados_select['listaprecios_'] = $this->listaprecios_;
              $this->loatiende_ = $rs->fields[16] ; 
              $this->nmgp_dados_select['loatiende_'] = $this->loatiende_;
              $this->con_actual_ = $rs->fields[17] ; 
              if (substr($this->con_actual_, 10, 1) == "-") 
              { 
                 $this->con_actual_ = substr($this->con_actual_, 0, 10) . " " . substr($this->con_actual_, 11);
              } 
              if (substr($this->con_actual_, 13, 1) == ".") 
              { 
                 $this->con_actual_ = substr($this->con_actual_, 0, 13) . ":" . substr($this->con_actual_, 14, 2) . ":" . substr($this->con_actual_, 17);
              } 
              $this->nmgp_dados_select['con_actual_'] = $this->con_actual_;
              $this->efec_retencion_ = $rs->fields[18] ; 
              $this->nmgp_dados_select['efec_retencion_'] = $this->efec_retencion_;
              $this->regimen_ = $rs->fields[19] ; 
              $this->nmgp_dados_select['regimen_'] = $this->regimen_;
              $this->tipo_ = $rs->fields[20] ; 
              $this->nmgp_dados_select['tipo_'] = $this->tipo_;
              $this->cliente_ = $rs->fields[21] ; 
              $this->nmgp_dados_select['cliente_'] = $this->cliente_;
              $this->empleado_ = $rs->fields[22] ; 
              $this->nmgp_dados_select['empleado_'] = $this->empleado_;
              $this->proveedor_ = $rs->fields[23] ; 
              $this->nmgp_dados_select['proveedor_'] = $this->proveedor_;
              $this->contacto_ = $rs->fields[24] ; 
              $this->nmgp_dados_select['contacto_'] = $this->contacto_;
              $this->telefonos_prov_ = $rs->fields[25] ; 
              $this->nmgp_dados_select['telefonos_prov_'] = $this->telefonos_prov_;
              $this->email_ = $rs->fields[26] ; 
              $this->nmgp_dados_select['email_'] = $this->email_;
              $this->url_ = $rs->fields[27] ; 
              $this->nmgp_dados_select['url_'] = $this->url_;
              $this->creditoprov_ = $rs->fields[28] ; 
              $this->nmgp_dados_select['creditoprov_'] = $this->creditoprov_;
              $this->dias_ = $rs->fields[29] ; 
              $this->nmgp_dados_select['dias_'] = $this->dias_;
              $this->fechultcomp_ = $rs->fields[30] ; 
              $this->nmgp_dados_select['fechultcomp_'] = $this->fechultcomp_;
              $this->saldoapagar_ = $rs->fields[31] ; 
              $this->nmgp_dados_select['saldoapagar_'] = $this->saldoapagar_;
              $this->autoretenedor_ = $rs->fields[32] ; 
              $this->nmgp_dados_select['autoretenedor_'] = $this->autoretenedor_;
              $this->tipo_documento_ = $rs->fields[33] ; 
              $this->nmgp_dados_select['tipo_documento_'] = $this->tipo_documento_;
              $this->dv_ = $rs->fields[34] ; 
              $this->nmgp_dados_select['dv_'] = $this->dv_;
              $this->nombre1_ = $rs->fields[35] ; 
              $this->nmgp_dados_select['nombre1_'] = $this->nombre1_;
              $this->nombre2_ = $rs->fields[36] ; 
              $this->nmgp_dados_select['nombre2_'] = $this->nombre2_;
              $this->apellido1_ = $rs->fields[37] ; 
              $this->nmgp_dados_select['apellido1_'] = $this->apellido1_;
              $this->apellido2_ = $rs->fields[38] ; 
              $this->nmgp_dados_select['apellido2_'] = $this->apellido2_;
              $this->sucur_cliente_ = $rs->fields[39] ; 
              $this->nmgp_dados_select['sucur_cliente_'] = $this->sucur_cliente_;
              $this->representante_ = $rs->fields[40] ; 
              $this->nmgp_dados_select['representante_'] = $this->representante_;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->imagenter_ = $this->Db->BlobDecode($rs->fields[41]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_oracle')
              { 
                  $this->imagenter_ = $this->Db->BlobDecode($rs->fields[41]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[41]) && !empty($rs->fields[41]) && is_file($rs->fields[41])) 
                  { 
                     $this->imagenter_ = file_get_contents($rs->fields[41]); 
                  }else 
                  { 
                     $this->imagenter_ = ''; 
                  } 
              } 
              else
              { 
                  $this->imagenter_ = $rs->fields[41] ; 
              } 
              $this->nmgp_dados_select['imagenter_'] = $this->imagenter_;
              $this->es_restaurante_ = $rs->fields[42] ; 
              $this->nmgp_dados_select['es_restaurante_'] = $this->es_restaurante_;
              $this->cupodis_ = isset($GLOBALS['cupodis_' . $sc_seq_vert]) ? $GLOBALS['cupodis_' . $sc_seq_vert] : '';
              $this->departamento_ = isset($GLOBALS['departamento_' . $sc_seq_vert]) ? $GLOBALS['departamento_' . $sc_seq_vert] : '';
              $this->relleno2_ = isset($GLOBALS['relleno2_' . $sc_seq_vert]) ? $GLOBALS['relleno2_' . $sc_seq_vert] : '';
              $this->sucursales_ = isset($GLOBALS['sucursales_' . $sc_seq_vert]) ? $GLOBALS['sucursales_' . $sc_seq_vert] : '';
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->idtercero_ = (string)$this->idtercero_; 
              $this->saldo_ = (string)$this->saldo_; 
              $this->idmuni_ = (string)$this->idmuni_; 
              $this->cupo_ = (string)$this->cupo_; 
              $this->listaprecios_ = (string)$this->listaprecios_; 
              $this->loatiende_ = (string)$this->loatiende_; 
              $this->dias_ = (string)$this->dias_; 
              $this->saldoapagar_ = (string)$this->saldoapagar_; 
              $this->dv_ = (string)$this->dv_; 
              if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['parms'])) 
              { 
                  $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['parms'] = "idtercero_?#?$this->idtercero_?@?";
              } 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sub_dir'][0]  = "";
              $this->nm_proc_onload_record($sc_seq_vert);
              $this->storeRecordState($sc_seq_vert);
//
//-- 
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dados_select'][$sc_seq_vert] = $this->nmgp_dados_select;
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_terceros_mesas[$sc_seq_vert]['tipo_documento_'] =  $this->tipo_documento_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['documento_'] =  $this->documento_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['dv_'] =  $this->dv_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['imagenter_'] =  $this->imagenter_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['imagenter__limpa'] =  $this->imagenter__limpa; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['nombre1_'] =  $this->nombre1_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['nombre2_'] =  $this->nombre2_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['apellido1_'] =  $this->apellido1_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['apellido2_'] =  $this->apellido2_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['nombres_'] =  $this->nombres_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['representante_'] =  $this->representante_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['sexo_'] =  $this->sexo_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['tipo_'] =  $this->tipo_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['regimen_'] =  $this->regimen_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['direccion_'] =  $this->direccion_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['departamento_'] =  $this->departamento_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['idmuni_'] =  $this->idmuni_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['observaciones_'] =  $this->observaciones_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['cliente_'] =  $this->cliente_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['es_restaurante_'] =  $this->es_restaurante_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['idtercero_'] =  $this->idtercero_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['tel_cel_'] =  $this->tel_cel_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['nacimiento_'] =  $this->nacimiento_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['urlmail_'] =  $this->urlmail_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['fechault_'] =  $this->fechault_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['saldo_'] =  $this->saldo_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['afiliacion_'] =  $this->afiliacion_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['credito_'] =  $this->credito_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['cupo_'] =  $this->cupo_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['listaprecios_'] =  $this->listaprecios_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['loatiende_'] =  $this->loatiende_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['con_actual_'] =  $this->con_actual_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['con_actual__hora'] =  $this->con_actual__hora; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['efec_retencion_'] =  $this->efec_retencion_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['empleado_'] =  $this->empleado_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['proveedor_'] =  $this->proveedor_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['contacto_'] =  $this->contacto_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['telefonos_prov_'] =  $this->telefonos_prov_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['email_'] =  $this->email_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['url_'] =  $this->url_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['creditoprov_'] =  $this->creditoprov_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['dias_'] =  $this->dias_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['fechultcomp_'] =  $this->fechultcomp_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['saldoapagar_'] =  $this->saldoapagar_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['autoretenedor_'] =  $this->autoretenedor_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['sucur_cliente_'] =  $this->sucur_cliente_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['cupodis_'] =  $this->cupodis_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['relleno2_'] =  $this->relleno2_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['sucursales_'] =  $this->sucursales_; 
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
          ksort ($this->form_vert_terceros_mesas); 
          $rs->Close(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_qtd'] = $sc_seq_vert + $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] - 1;
          if ('total' == $this->form_paginacao)
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $this->sc_max_reg; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $this->sc_max_reg; 
          }
          else
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['total'] + 1; 
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
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] < (($qt_geral_reg_terceros_mesas + 1) - $this->sc_max_reg);
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['opcao'] = '';
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
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['embutida_multi']) 
          { 
          } 
          else 
          { 
              $this->sc_max_reg_incl = 0; 
          } 
          while ($sc_seq_vert <= $this->sc_max_reg_incl) 
          { 
              $this->documento_ = "";  
              $this->nombres_ = "";  
              $this->direccion_ = htmlentities("SiN");  
              $this->sexo_ = "";  
              $this->afiliacion_ =  date('Y') . "-" . date('m')  . "-" . date('d');
              $this->idmuni_ = htmlentities("828");  
              $this->observaciones_ = "";  
              $this->listaprecios_ = htmlentities("1");  
              $this->regimen_ = "";  
              $this->tipo_ = "";  
              $this->cliente_ = "";  
              $this->tipo_documento_ = "";  
              $this->dv_ = htmlentities("0");  
              $this->nombre1_ = "";  
              $this->nombre2_ = "";  
              $this->apellido1_ = "";  
              $this->apellido2_ = "";  
              $this->representante_ = "";  
              $this->imagenter_ = "";  
              $this->es_restaurante_ = "";  
              $this->cupodis_ = htmlentities("0");  
              $this->departamento_ = "";  
              $this->nm_proc_onload_record($sc_seq_vert);
              if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['foreign_key']))
              {
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['foreign_key'] as $sFKName => $sFKValue)
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
             $this->form_vert_terceros_mesas[$sc_seq_vert]['tipo_documento_'] =  $this->tipo_documento_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['documento_'] =  $this->documento_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['dv_'] =  $this->dv_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['imagenter_'] =  $this->imagenter_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['imagenter__limpa'] =  $this->imagenter__limpa; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['nombre1_'] =  $this->nombre1_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['nombre2_'] =  $this->nombre2_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['apellido1_'] =  $this->apellido1_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['apellido2_'] =  $this->apellido2_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['nombres_'] =  $this->nombres_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['representante_'] =  $this->representante_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['sexo_'] =  $this->sexo_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['tipo_'] =  $this->tipo_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['regimen_'] =  $this->regimen_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['direccion_'] =  $this->direccion_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['departamento_'] =  $this->departamento_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['idmuni_'] =  $this->idmuni_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['observaciones_'] =  $this->observaciones_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['cliente_'] =  $this->cliente_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['es_restaurante_'] =  $this->es_restaurante_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['idtercero_'] =  $this->idtercero_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['tel_cel_'] =  $this->tel_cel_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['nacimiento_'] =  $this->nacimiento_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['urlmail_'] =  $this->urlmail_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['fechault_'] =  $this->fechault_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['saldo_'] =  $this->saldo_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['afiliacion_'] =  $this->afiliacion_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['credito_'] =  $this->credito_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['cupo_'] =  $this->cupo_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['listaprecios_'] =  $this->listaprecios_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['loatiende_'] =  $this->loatiende_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['con_actual_'] =  $this->con_actual_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['con_actual__hora'] =  $this->con_actual__hora; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['efec_retencion_'] =  $this->efec_retencion_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['empleado_'] =  $this->empleado_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['proveedor_'] =  $this->proveedor_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['contacto_'] =  $this->contacto_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['telefonos_prov_'] =  $this->telefonos_prov_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['email_'] =  $this->email_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['url_'] =  $this->url_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['creditoprov_'] =  $this->creditoprov_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['dias_'] =  $this->dias_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['fechultcomp_'] =  $this->fechultcomp_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['saldoapagar_'] =  $this->saldoapagar_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['autoretenedor_'] =  $this->autoretenedor_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['sucur_cliente_'] =  $this->sucur_cliente_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['cupodis_'] =  $this->cupodis_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['relleno2_'] =  $this->relleno2_; 
             $this->form_vert_terceros_mesas[$sc_seq_vert]['sucursales_'] =  $this->sucursales_; 
              $sc_seq_vert++; 
          } 
          if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
              $this->nm_proc_onload(false);
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
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['reg_start'] + $this->sc_max_reg;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function cliente__onChange()
{
$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'on';
if (!isset($this->sc_temp_id_tercero)) {$this->sc_temp_id_tercero = (isset($_SESSION['id_tercero'])) ? $_SESSION['id_tercero'] : "";}
  
$original_cliente_ = $this->cliente_;

$this->sc_temp_id_tercero=$this->idtercero_ ;




if (isset($this->sc_temp_id_tercero)) { $_SESSION['id_tercero'] = $this->sc_temp_id_tercero;}
$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'off';
$modificado_cliente_ = $this->cliente_;
$this->nm_formatar_campos('cliente_');
$this->nmgp_refresh_fields = array();
if ($original_cliente_ !== $modificado_cliente_ || isset($this->nmgp_cmp_readonly['cliente_']) || (isset($bFlagRead_cliente_) && $bFlagRead_cliente_))
{
    $this->nmgp_refresh_fields[] = 'cliente_';
    $this->NM_ajax_changed['cliente_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'cliente';
terceros_mesas_pack_ajax_response();
exit;
}
function credito__onChange()
{
$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'on';
  

if($this->credito_ =='SI')
	{
	$this->sc_ajax_javascript('nm_field_disabled', array("cupo_=", "", $this->nmgp_refresh_row));
;
	$this->sc_set_focus('cupo');
	$this->sc_ajax_javascript('nm_field_disabled', array("cliente_=disabled", "", $this->nmgp_refresh_row));
;
	}
else
	{
	$this->cupo_ =0;
	$this->cupodis_ =0;
	$this->sc_ajax_javascript('nm_field_disabled', array("cupo_=disabled", "", $this->nmgp_refresh_row));
;
	$this->sc_ajax_javascript('nm_field_disabled', array("cliente_=", "", $this->nmgp_refresh_row));
;
	$this->sc_set_focus('efec_retencion');
	}

$this->nm_formatar_campos();
$this->nmgp_refresh_fields = array();
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'credito';
terceros_mesas_pack_ajax_response();
exit;


$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'off';
}
function creditoprov__onChange()
{
$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'on';
  

if($this->creditoprov_ =='SI')
	{
	$this->sc_ajax_javascript('nm_field_disabled', array("dias_=", "", $this->nmgp_refresh_row));
;
	$this->sc_set_focus('dias');
	}
else
	{
	$this->sc_ajax_javascript('nm_field_disabled', array("dias_=disabled", "", $this->nmgp_refresh_row));
;
	$this->sc_set_focus('url');
	}

$this->nm_formatar_campos();
$this->nmgp_refresh_fields = array();
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'creditoprov';
terceros_mesas_pack_ajax_response();
exit;


$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'off';
}
function cupo__onChange()
{
$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'on';
  

$this->cupodis_ =$this->cupo_ -$this->saldo_ ;
if($this->saldo_ ==$this->cupo_  and $this->cupo_ >0)
	{
	
	}


$this->nm_formatar_campos();
$this->nmgp_refresh_fields = array();
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'cupo';
terceros_mesas_pack_ajax_response();
exit;


$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'off';
}
function documento__onChange()
{
$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'on';
  
$original_documento_ = $this->documento_;
$original_dv_ = $this->dv_;

$long=strlen($this->documento_ );
$str=$this->documento_ ;
$arr = str_split($str);
switch ($long)
	{
	case 4:
	$valor=$arr[3]*3+$arr[2]*7+$arr[1]*13+$arr[0]*17;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		$this->dv_ =$dig;
		}
	else
		{
		$this->dv_ =11-$dig;
		}
	break;
	
	case 5:
	$valor=$arr[0]*19+$arr[1]*17+$arr[2]*13+$arr[3]*7+$arr[4]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		$this->dv_ =$dig;
		}
	else
		{
		$this->dv_ =11-$dig;
		}
	break;
	
	case 6:
	$valor=$arr[0]*23+$arr[1]*19+$arr[2]*17+$arr[3]*13+$arr[4]*7+$arr[5]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		$this->dv_ =$dig;
		}
	else
		{
		$this->dv_ =11-$dig;
		}
	break;
	
	case 7:
	$valor=$arr[0]*29+$arr[1]*23+$arr[2]*19+$arr[3]*17+$arr[4]*13+$arr[5]*7+$arr[6]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		$this->dv_ =$dig;
		}
	else
		{
		$this->dv_ =11-$dig;
		}
	break;
	
	case 8:
	$valor=$arr[0]*37+$arr[1]*29+$arr[2]*23+$arr[3]*19+$arr[4]*17+$arr[5]*13+$arr[6]*7+$arr[7]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		$this->dv_ =$dig;
		}
	else
		{
		$this->dv_ =11-$dig;
		}
	break;
	
	case 9:
	$valor=$arr[0]*41+$arr[1]*37+$arr[2]*29+$arr[3]*23+$arr[4]*19+$arr[5]*17+$arr[6]*13+$arr[7]*7+$arr[8]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		$this->dv_ =$dig;
		}
	else
		{
		$this->dv_ =11-$dig;
		}
	break;
	
	case 10:
	$valor=$arr[0]*67+$arr[1]*41+$arr[2]*37+$arr[3]*29+$arr[4]*23+$arr[5]*19+$arr[6]*17+$arr[7]*13+$arr[8]*7+$arr[9]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
		{
		$this->dv_ =$dig;
		}
	else
		{
		$this->dv_ =11-$dig;
		}
	break;
	}


$modificado_documento_ = $this->documento_;
$modificado_dv_ = $this->dv_;
$this->nm_formatar_campos('documento_', 'dv_');
$this->nmgp_refresh_fields = array();
if ($original_documento_ !== $modificado_documento_ || isset($this->nmgp_cmp_readonly['documento_']) || (isset($bFlagRead_documento_) && $bFlagRead_documento_))
{
    $this->nmgp_refresh_fields[] = 'documento_';
    $this->NM_ajax_changed['documento_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_dv_ !== $modificado_dv_ || isset($this->nmgp_cmp_readonly['dv_']) || (isset($bFlagRead_dv_) && $bFlagRead_dv_))
{
    $this->nmgp_refresh_fields[] = 'dv_';
    $this->NM_ajax_changed['dv_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'documento';
terceros_mesas_pack_ajax_response();
exit;


$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'off';
}
function nombres__onFocus()
{
$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'on';
  
$original_nombre1_ = $this->nombre1_;
$original_nombres_ = $this->nombres_;
$original_nombre2_ = $this->nombre2_;
$original_apellido1_ = $this->apellido1_;
$original_apellido2_ = $this->apellido2_;

$long=strlen($this->nombre1_ );
if($long>0)
	{$long2=strlen($this->nombres_ );
	 if($long2>0)
		 {
		$this->nombres_ =$this->nombres_ .'/'.$this->nombre1_ .' '.$this->nombre2_ .' '.$this->apellido1_ .' '.$this->apellido2_ ;
	 	}
	 else
		 {
		 $this->nombres_ =$this->nombre1_ .' '.$this->nombre2_ .' '.$this->apellido1_ .' '.$this->apellido2_ ;
		 }
	}

$modificado_nombre1_ = $this->nombre1_;
$modificado_nombres_ = $this->nombres_;
$modificado_nombre2_ = $this->nombre2_;
$modificado_apellido1_ = $this->apellido1_;
$modificado_apellido2_ = $this->apellido2_;
$this->nm_formatar_campos('nombre1_', 'nombres_', 'nombre2_', 'apellido1_', 'apellido2_');
$this->nmgp_refresh_fields = array();
if ($original_nombre1_ !== $modificado_nombre1_ || isset($this->nmgp_cmp_readonly['nombre1_']) || (isset($bFlagRead_nombre1_) && $bFlagRead_nombre1_))
{
    $this->nmgp_refresh_fields[] = 'nombre1_';
    $this->NM_ajax_changed['nombre1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_nombres_ !== $modificado_nombres_ || isset($this->nmgp_cmp_readonly['nombres_']) || (isset($bFlagRead_nombres_) && $bFlagRead_nombres_))
{
    $this->nmgp_refresh_fields[] = 'nombres_';
    $this->NM_ajax_changed['nombres_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_nombre2_ !== $modificado_nombre2_ || isset($this->nmgp_cmp_readonly['nombre2_']) || (isset($bFlagRead_nombre2_) && $bFlagRead_nombre2_))
{
    $this->nmgp_refresh_fields[] = 'nombre2_';
    $this->NM_ajax_changed['nombre2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_apellido1_ !== $modificado_apellido1_ || isset($this->nmgp_cmp_readonly['apellido1_']) || (isset($bFlagRead_apellido1_) && $bFlagRead_apellido1_))
{
    $this->nmgp_refresh_fields[] = 'apellido1_';
    $this->NM_ajax_changed['apellido1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_apellido2_ !== $modificado_apellido2_ || isset($this->nmgp_cmp_readonly['apellido2_']) || (isset($bFlagRead_apellido2_) && $bFlagRead_apellido2_))
{
    $this->nmgp_refresh_fields[] = 'apellido2_';
    $this->NM_ajax_changed['apellido2_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'nombres';
terceros_mesas_pack_ajax_response();
exit;


$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'off';
}
function proveedor__onChange()
{
$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'on';
  

if($this->proveedor_ =='SI')
	{
	;
	;
	$this->nmgp_cmp_hidden["autoretenedor_"] = "on"; $this->NM_ajax_info['fieldDisplay']['autoretenedor_'] = 'on';
	$this->nmgp_cmp_hidden["creditoprov_"] = "on"; $this->NM_ajax_info['fieldDisplay']['creditoprov_'] = 'on';
	$this->nmgp_cmp_hidden["dias_"] = "on"; $this->NM_ajax_info['fieldDisplay']['dias_'] = 'on';
	$this->sc_ajax_javascript('nm_field_disabled', array("dias_=disabled", "", $this->nmgp_refresh_row));
;
	$this->sc_set_focus('autoretenedor');
	}
else
	{
	;
	;
	$this->nmgp_cmp_hidden["autoretenedor_"] = "off"; $this->NM_ajax_info['fieldDisplay']['autoretenedor_'] = 'off';
	$this->nmgp_cmp_hidden["creditoprov_"] = "off"; $this->NM_ajax_info['fieldDisplay']['creditoprov_'] = 'off';
	$this->nmgp_cmp_hidden["dias_"] = "off"; $this->NM_ajax_info['fieldDisplay']['dias_'] = 'off';
	}

$this->nm_formatar_campos();
$this->nmgp_refresh_fields = array();
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'proveedor';
terceros_mesas_pack_ajax_response();
exit;
$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'off';
}
function sucur_cliente__onChange()
{
$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'on';
  
$original_idmuni_ = $this->idmuni_;
$original_direccion_ = $this->direccion_;

if($this->idtercero_ >0)
	{
	if($this->sucur_cliente_ =='SI')
		{
		
     $nm_select ="update terceros set sucur_cliente=\"SI\" where idtercero=$this->idtercero_ "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                terceros_mesas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		;
		$muni=$this->idmuni_ ;
		 
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
		 
      $nm_select = "select iddireccion from direccion where idter=$this->idtercero_  and obs='PRINCIPAL'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
     if ($this->idtercero_ != "")
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
			
     $nm_select ="insert direccion SET idter=$this->idtercero_ , iddepar=$dep, idmuni=$muni, direc='$this->direccion_', obs='PRINCIPAL', telefono='$this->tel_cel_'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                terceros_mesas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ; 
			}

		}
	else
		{
		
     $nm_select ="update terceros set sucur_cliente=\"NO\" where idtercero=$this->idtercero_ "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                terceros_mesas_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		;
		}
	}



$modificado_idmuni_ = $this->idmuni_;
$modificado_direccion_ = $this->direccion_;
$this->nm_formatar_campos('idmuni_', 'direccion_');
$this->nmgp_refresh_fields = array();
if ($original_idmuni_ !== $modificado_idmuni_ || isset($this->nmgp_cmp_readonly['idmuni_']) || (isset($bFlagRead_idmuni_) && $bFlagRead_idmuni_))
{
    $this->nmgp_refresh_fields[] = 'idmuni_';
    $this->NM_ajax_changed['idmuni_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_direccion_ !== $modificado_direccion_ || isset($this->nmgp_cmp_readonly['direccion_']) || (isset($bFlagRead_direccion_) && $bFlagRead_direccion_))
{
    $this->nmgp_refresh_fields[] = 'direccion_';
    $this->NM_ajax_changed['direccion_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'sucur';
terceros_mesas_pack_ajax_response();
exit;
$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'off';
}
function tipo__onChange()
{
$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'on';
  
$original_tipo_ = $this->tipo_;
$original_regimen_ = $this->regimen_;

if($this->tipo_ =='JUR')
	{
	$this->regimen_ ='COMUN';
	$this->nmgp_cmp_hidden["efec_retencion_"] = "on"; $this->NM_ajax_info['fieldDisplay']['efec_retencion_'] = 'on';
	$this->sc_ajax_javascript('nm_field_disabled', array("regimen_=disabled", "", $this->nmgp_refresh_row));
;
	$this->efec_retencion_ ='S';
	}
else
	{
	$this->nmgp_cmp_hidden["efec_retencion_"] = "on"; $this->NM_ajax_info['fieldDisplay']['efec_retencion_'] = 'on';
	$this->sc_ajax_javascript('nm_field_disabled', array("regimen_=", "", $this->nmgp_refresh_row));
;
	$this->efec_retencion_ ='N';
	$this->sc_set_focus('regimen');
	}

$modificado_tipo_ = $this->tipo_;
$modificado_regimen_ = $this->regimen_;
$this->nm_formatar_campos('tipo_', 'regimen_');
$this->nmgp_refresh_fields = array();
if ($original_tipo_ !== $modificado_tipo_ || isset($this->nmgp_cmp_readonly['tipo_']) || (isset($bFlagRead_tipo_) && $bFlagRead_tipo_))
{
    $this->nmgp_refresh_fields[] = 'tipo_';
    $this->NM_ajax_changed['tipo_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_regimen_ !== $modificado_regimen_ || isset($this->nmgp_cmp_readonly['regimen_']) || (isset($bFlagRead_regimen_) && $bFlagRead_regimen_))
{
    $this->nmgp_refresh_fields[] = 'regimen_';
    $this->NM_ajax_changed['regimen_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'tipo';
terceros_mesas_pack_ajax_response();
exit;
$_SESSION['scriptcase']['terceros_mesas']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              terceros_mesas_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['retorno_edit'] . "';";
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
        $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['table_refresh'] = true;
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("documento_", "nombres_", "nombre1_", "nombre2_", "apellido1_", "apellido2_"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['csrf_token'];
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

   function Form_lookup_tipo_documento_()
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
   function Form_lookup_sexo_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Masculino?#?M?#?S?@?";
       $nmgp_def_dados .= "Femenino?#?F?#?N?@?";
       $nmgp_def_dados .= "Otro?#?O?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_tipo_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "NATURAL?#?NAT?#?S?@?";
       $nmgp_def_dados .= "JURÍDICA?#?JUR?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_regimen_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SIMPLIFICADO?#?SIM?#?S?@?";
       $nmgp_def_dados .= "COMÚN?#?COMUN?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_departamento_()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_'] = array(); 
    }

   $old_value_dv_ = $this->dv_;
   $this->nm_tira_formatacao();


   $unformatted_value_dv_ = $this->dv_;

   $nm_comando = "SELECT iddep, departamento  FROM departamento  ORDER BY departamento";

   $this->dv_ = $old_value_dv_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_departamento_'][] = $rs->fields[0];
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
   function Form_lookup_idmuni_()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_'] = array(); 
    }

   $old_value_dv_ = $this->dv_;
   $this->nm_tira_formatacao();


   $unformatted_value_dv_ = $this->dv_;

   $nm_comando = "SELECT idmun, municipio  FROM municipio  WHERE iddepar=$this->departamento_ ORDER BY municipio";

   $this->dv_ = $old_value_dv_;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['Lookup_idmuni_'][] = $rs->fields[0];
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
   function Form_lookup_cliente_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?S?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_es_restaurante_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "NO?#?NO?#?N?@?";
       $nmgp_def_dados .= "SI?#?SI?#?S?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              terceros_mesas_pack_ajax_response();
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_filter_form'] . " and (cliente='SI' and documento <1000000 and documento<>0) and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where cliente='SI' and documento <1000000 and documento<>0 and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_terceros_mesas = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['total'] = $qt_geral_reg_terceros_mesas;
      $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          terceros_mesas_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          terceros_mesas_pack_ajax_response();
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
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['decimal_db'] == ".")
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['SC_sep_date1'];
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
       $nmgp_saida_form = "terceros_mesas_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['nm_run_menu'] = 2;
       $nmgp_saida_form = "terceros_mesas_fim.php";
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
       terceros_mesas_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['terceros_mesas']['masterValue']);
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
                        'tipo_documento' => 'tipo_documento_',
                        'documento' => 'documento_',
                        'dv' => 'dv_',
                        'imagenter' => 'imagenter_',
                        'nombre1' => 'nombre1_',
                        'nombre2' => 'nombre2_',
                        'apellido1' => 'apellido1_',
                        'apellido2' => 'apellido2_',
                        'nombres' => 'nombres_',
                        'representante' => 'representante_',
                        'sexo' => 'sexo_',
                        'tipo' => 'tipo_',
                        'regimen' => 'regimen_',
                        'direccion' => 'direccion_',
                        'departamento_' => 'departamento_',
                        'idmuni' => 'idmuni_',
                        'observaciones' => 'observaciones_',
                        'cliente' => 'cliente_',
                        'es_restaurante' => 'es_restaurante_',
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
