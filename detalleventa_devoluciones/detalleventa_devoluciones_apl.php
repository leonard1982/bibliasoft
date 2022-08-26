<?php
//
class detalleventa_devoluciones_apl
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
   var $numfac_;
   var $remision_;
   var $idpro_;
   var $unidadmayor_;
   var $unidadmayor__1;
   var $factor_;
   var $idbod_;
   var $costop_;
   var $cantidad_;
   var $valorunit_;
   var $valorpar_;
   var $iva_;
   var $descuento_;
   var $adicional_;
   var $adicional1_;
   var $devuelto_;
   var $colores_;
   var $tallas_;
   var $sabor_;
   var $iddev_;
   var $procesado_;
   var $stockubica_;
   var $unidad_;
   var $fech_;
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
   var $sc_max_reg_incl = 1; 
   var $form_vert_detalleventa_devoluciones = array();
   var $form_paginacao = 'total';
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
          if (isset($this->NM_ajax_info['param']['adicional1_']))
          {
              $this->adicional1_ = $this->NM_ajax_info['param']['adicional1_'];
          }
          if (isset($this->NM_ajax_info['param']['adicional_']))
          {
              $this->adicional_ = $this->NM_ajax_info['param']['adicional_'];
          }
          if (isset($this->NM_ajax_info['param']['cantidad_']))
          {
              $this->cantidad_ = $this->NM_ajax_info['param']['cantidad_'];
          }
          if (isset($this->NM_ajax_info['param']['colores_']))
          {
              $this->colores_ = $this->NM_ajax_info['param']['colores_'];
          }
          if (isset($this->NM_ajax_info['param']['costop_']))
          {
              $this->costop_ = $this->NM_ajax_info['param']['costop_'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['descuento_']))
          {
              $this->descuento_ = $this->NM_ajax_info['param']['descuento_'];
          }
          if (isset($this->NM_ajax_info['param']['factor_']))
          {
              $this->factor_ = $this->NM_ajax_info['param']['factor_'];
          }
          if (isset($this->NM_ajax_info['param']['fech_']))
          {
              $this->fech_ = $this->NM_ajax_info['param']['fech_'];
          }
          if (isset($this->NM_ajax_info['param']['idbod_']))
          {
              $this->idbod_ = $this->NM_ajax_info['param']['idbod_'];
          }
          if (isset($this->NM_ajax_info['param']['iddet_']))
          {
              $this->iddet_ = $this->NM_ajax_info['param']['iddet_'];
          }
          if (isset($this->NM_ajax_info['param']['iddev_']))
          {
              $this->iddev_ = $this->NM_ajax_info['param']['iddev_'];
          }
          if (isset($this->NM_ajax_info['param']['idpro_']))
          {
              $this->idpro_ = $this->NM_ajax_info['param']['idpro_'];
          }
          if (isset($this->NM_ajax_info['param']['iva_']))
          {
              $this->iva_ = $this->NM_ajax_info['param']['iva_'];
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
          if (isset($this->NM_ajax_info['param']['sabor_']))
          {
              $this->sabor_ = $this->NM_ajax_info['param']['sabor_'];
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
          if (isset($this->NM_ajax_info['param']['stockubica_']))
          {
              $this->stockubica_ = $this->NM_ajax_info['param']['stockubica_'];
          }
          if (isset($this->NM_ajax_info['param']['tallas_']))
          {
              $this->tallas_ = $this->NM_ajax_info['param']['tallas_'];
          }
          if (isset($this->NM_ajax_info['param']['unidad_']))
          {
              $this->unidad_ = $this->NM_ajax_info['param']['unidad_'];
          }
          if (isset($this->NM_ajax_info['param']['unidadmayor_']))
          {
              $this->unidadmayor_ = $this->NM_ajax_info['param']['unidadmayor_'];
          }
          if (isset($this->NM_ajax_info['param']['valorpar_']))
          {
              $this->valorpar_ = $this->NM_ajax_info['param']['valorpar_'];
          }
          if (isset($this->NM_ajax_info['param']['valorunit_']))
          {
              $this->valorunit_ = $this->NM_ajax_info['param']['valorunit_'];
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
      $this->sc_conv_var['numfac'] = "numfac_";
      $this->sc_conv_var['remision'] = "remision_";
      $this->sc_conv_var['idpro'] = "idpro_";
      $this->sc_conv_var['unidadmayor'] = "unidadmayor_";
      $this->sc_conv_var['factor'] = "factor_";
      $this->sc_conv_var['idbod'] = "idbod_";
      $this->sc_conv_var['costop'] = "costop_";
      $this->sc_conv_var['cantidad'] = "cantidad_";
      $this->sc_conv_var['valorunit'] = "valorunit_";
      $this->sc_conv_var['valorpar'] = "valorpar_";
      $this->sc_conv_var['iva'] = "iva_";
      $this->sc_conv_var['descuento'] = "descuento_";
      $this->sc_conv_var['adicional'] = "adicional_";
      $this->sc_conv_var['adicional1'] = "adicional1_";
      $this->sc_conv_var['devuelto'] = "devuelto_";
      $this->sc_conv_var['colores'] = "colores_";
      $this->sc_conv_var['tallas'] = "tallas_";
      $this->sc_conv_var['sabor'] = "sabor_";
      $this->sc_conv_var['iddev'] = "iddev_";
      $this->sc_conv_var['procesado'] = "procesado_";
      $this->sc_conv_var['stockubica'] = "stockubica_";
      $this->sc_conv_var['unidad'] = "unidad_";
      $this->sc_conv_var['fech'] = "fech_";
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
      if (isset($this->edit_cantidad) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['edit_cantidad'] = $this->edit_cantidad;
      }
      if (isset($this->sw) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['sw'] = $this->sw;
      }
      if (isset($this->vtotal) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['vtotal'] = $this->vtotal;
      }
      if (isset($_POST["par_numfacventa"]) && isset($this->par_numfacventa)) 
      {
          $_SESSION['par_numfacventa'] = $this->par_numfacventa;
      }
      if (isset($_POST["edit_cantidad"]) && isset($this->edit_cantidad)) 
      {
          $_SESSION['edit_cantidad'] = $this->edit_cantidad;
      }
      if (isset($_POST["sw"]) && isset($this->sw)) 
      {
          $_SESSION['sw'] = $this->sw;
      }
      if (isset($_POST["vtotal"]) && isset($this->vtotal)) 
      {
          $_SESSION['vtotal'] = $this->vtotal;
      }
      if (isset($_GET["par_numfacventa"]) && isset($this->par_numfacventa)) 
      {
          $_SESSION['par_numfacventa'] = $this->par_numfacventa;
      }
      if (isset($_GET["edit_cantidad"]) && isset($this->edit_cantidad)) 
      {
          $_SESSION['edit_cantidad'] = $this->edit_cantidad;
      }
      if (isset($_GET["sw"]) && isset($this->sw)) 
      {
          $_SESSION['sw'] = $this->sw;
      }
      if (isset($_GET["vtotal"]) && isset($this->vtotal)) 
      {
          $_SESSION['vtotal'] = $this->vtotal;
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['detalleventa_devoluciones']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['detalleventa_devoluciones']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['detalleventa_devoluciones']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['detalleventa_devoluciones']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['detalleventa_devoluciones']['embutida_parms']);
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
                 nm_limpa_str_detalleventa_devoluciones($cadapar[1]);
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
                 if ($cadapar[0] == "iddev_")
                 {
                     $this->NM_where_filter .= (empty($this->NM_where_filter)) ? "(" : " and ";
                     $this->NM_where_filter .= "iddev = " . $this->iddev_;
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
          if (isset($this->par_numfacventa)) 
          {
              $_SESSION['par_numfacventa'] = $this->par_numfacventa;
          }
          if (isset($this->edit_cantidad)) 
          {
              $_SESSION['edit_cantidad'] = $this->edit_cantidad;
          }
          if (isset($this->sw)) 
          {
              $_SESSION['sw'] = $this->sw;
          }
          if (isset($this->vtotal)) 
          {
              $_SESSION['vtotal'] = $this->vtotal;
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
              $_SESSION['sc_session'][$script_case_init]['detalleventa_devoluciones']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['detalleventa_devoluciones']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['detalleventa_devoluciones']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['detalleventa_devoluciones']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->par_numfacventa)) 
          {
              $_SESSION['par_numfacventa'] = $this->par_numfacventa;
          }
          if (isset($this->edit_cantidad)) 
          {
              $_SESSION['edit_cantidad'] = $this->edit_cantidad;
          }
          if (isset($this->sw)) 
          {
              $_SESSION['sw'] = $this->sw;
          }
          if (isset($this->vtotal)) 
          {
              $_SESSION['vtotal'] = $this->vtotal;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['detalleventa_devoluciones']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['detalleventa_devoluciones']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['detalleventa_devoluciones']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['detalleventa_devoluciones']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['detalleventa_devoluciones']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['detalleventa_devoluciones']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['detalleventa_devoluciones']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['detalleventa_devoluciones']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['detalleventa_devoluciones']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['detalleventa_devoluciones']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new detalleventa_devoluciones_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['initialize'])
          {
              $_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'on';
  $this->NM_ajax_info['buttonDisplay']['insert'] = $this->nmgp_botoes["insert"] = "off";;
$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "on";;
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off';
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['detalleventa_devoluciones']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['detalleventa_devoluciones']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['detalleventa_devoluciones'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['detalleventa_devoluciones']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['detalleventa_devoluciones']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('detalleventa_devoluciones') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['detalleventa_devoluciones']['label'] = "Elimine el item que no va a devolver y dele actualizar a los otros items";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "detalleventa_devoluciones")
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


      $this->arr_buttons['sc_btn_0']['hint']             = "";
      $this->arr_buttons['sc_btn_0']['type']             = "button";
      $this->arr_buttons['sc_btn_0']['value']            = "Asentar devolución";
      $this->arr_buttons['sc_btn_0']['display']          = "only_text";
      $this->arr_buttons['sc_btn_0']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_0']['style']            = "default";
      $this->arr_buttons['sc_btn_0']['image']            = "";


      $_SESSION['scriptcase']['error_icon']['detalleventa_devoluciones']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['detalleventa_devoluciones'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['goto']      = 'on';
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
      $this->nmgp_botoes['sc_btn_0'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_orig'] = " where numfac=" . $_SESSION['par_numfacventa'] . " and procesado<1";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_pesq'] = " where numfac=" . $_SESSION['par_numfacventa'] . " and procesado<1";
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['detalleventa_devoluciones']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['detalleventa_devoluciones'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['detalleventa_devoluciones'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field . "_"] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field . "_"] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("detalleventa_devoluciones", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'detalleventa_devoluciones_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'detalleventa_devoluciones_help.txt');
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
          require_once($this->Ini->path_embutida . 'detalleventa_devoluciones/detalleventa_devoluciones_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "detalleventa_devoluciones_erro.class.php"); 
      }
      $this->Erro      = new detalleventa_devoluciones_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_max_reg']) && strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_max_reg']) == "all")
      {
          $this->form_paginacao = "total";
      }
      $this->proc_fast_search = false;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['opcao']))
         { 
             if ($this->iddet_ != "" || $this->iddev_ != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['sc_btn_0'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['sc_btn_0'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['botoes']['sc_btn_0'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['final'];
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
      $_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'on';
  $this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "on";;
$this->NM_ajax_info['buttonDisplay']['insert'] = $this->nmgp_botoes["insert"] = "off";;
$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "on";;
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off'; 
      }
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['detalleventa_devoluciones']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['detalleventa_devoluciones']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
      if ($nm_opc_form_php == "formphp")
      { 
          if ($nm_call_php == "sc_btn_0")
          { 
              $this->sc_btn_sc_btn_0();
          } 
          $this->NM_close_db(); 
          exit;
      } 
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- idbod_
      $this->field_config['idbod_']               = array();
      $this->field_config['idbod_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idbod_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idbod_']['symbol_dec'] = '';
      $this->field_config['idbod_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idbod_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- stockubica_
      $this->field_config['stockubica_']               = array();
      $this->field_config['stockubica_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['stockubica_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['stockubica_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['stockubica_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['stockubica_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
      //-- valorpar_
      $this->field_config['valorpar_']               = array();
      $this->field_config['valorpar_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['valorpar_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valorpar_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['valorpar_']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['valorpar_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['valorpar_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- descuento_
      $this->field_config['descuento_']               = array();
      $this->field_config['descuento_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['descuento_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['descuento_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['descuento_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['descuento_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- adicional_
      $this->field_config['adicional_']               = array();
      $this->field_config['adicional_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['adicional_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['adicional_']['symbol_dec'] = '';
      $this->field_config['adicional_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['adicional_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- adicional1_
      $this->field_config['adicional1_']               = array();
      $this->field_config['adicional1_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['adicional1_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['adicional1_']['symbol_dec'] = '';
      $this->field_config['adicional1_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['adicional1_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- factor_
      $this->field_config['factor_']               = array();
      $this->field_config['factor_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['factor_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['factor_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['factor_']['symbol_mon'] = '';
      $this->field_config['factor_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['factor_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- iva_
      $this->field_config['iva_']               = array();
      $this->field_config['iva_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['iva_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['iva_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['iva_']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['iva_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['iva_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- costop_
      $this->field_config['costop_']               = array();
      $this->field_config['costop_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['costop_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['costop_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['costop_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['costop_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fech_
      $this->field_config['fech_']                 = array();
      $this->field_config['fech_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fech_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fech_']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fech_');
      //-- iddet_
      $this->field_config['iddet_']               = array();
      $this->field_config['iddet_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['iddet_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['iddet_']['symbol_dec'] = '';
      $this->field_config['iddet_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['iddet_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- numfac_
      $this->field_config['numfac_']               = array();
      $this->field_config['numfac_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['numfac_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['numfac_']['symbol_dec'] = '';
      $this->field_config['numfac_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['numfac_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- remision_
      $this->field_config['remision_']               = array();
      $this->field_config['remision_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['remision_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['remision_']['symbol_dec'] = '';
      $this->field_config['remision_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['remision_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- devuelto_
      $this->field_config['devuelto_']               = array();
      $this->field_config['devuelto_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['devuelto_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['devuelto_']['symbol_dec'] = '';
      $this->field_config['devuelto_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['devuelto_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- iddev_
      $this->field_config['iddev_']               = array();
      $this->field_config['iddev_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['iddev_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['iddev_']['symbol_dec'] = '';
      $this->field_config['iddev_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['iddev_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- procesado_
      $this->field_config['procesado_']               = array();
      $this->field_config['procesado_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['procesado_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['procesado_']['symbol_dec'] = '';
      $this->field_config['procesado_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['procesado_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_max_reg'] = $this->nmgp_max_line;
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['opc_edit'] = true;  
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
         detalleventa_devoluciones_pack_ajax_response();
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
         detalleventa_devoluciones_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'submit_form' == $this->NM_ajax_opcao)
      {
         if (isset($this->idpro_)) { $this->nm_limpa_alfa($this->idpro_); }
         if (isset($this->unidadmayor_)) { $this->nm_limpa_alfa($this->unidadmayor_); }
         if (isset($this->factor_)) { $this->nm_limpa_alfa($this->factor_); }
         if (isset($this->idbod_)) { $this->nm_limpa_alfa($this->idbod_); }
         if (isset($this->costop_)) { $this->nm_limpa_alfa($this->costop_); }
         if (isset($this->cantidad_)) { $this->nm_limpa_alfa($this->cantidad_); }
         if (isset($this->valorunit_)) { $this->nm_limpa_alfa($this->valorunit_); }
         if (isset($this->valorpar_)) { $this->nm_limpa_alfa($this->valorpar_); }
         if (isset($this->iva_)) { $this->nm_limpa_alfa($this->iva_); }
         if (isset($this->descuento_)) { $this->nm_limpa_alfa($this->descuento_); }
         if (isset($this->adicional_)) { $this->nm_limpa_alfa($this->adicional_); }
         if (isset($this->adicional1_)) { $this->nm_limpa_alfa($this->adicional1_); }
         if (isset($this->colores_)) { $this->nm_limpa_alfa($this->colores_); }
         if (isset($this->tallas_)) { $this->nm_limpa_alfa($this->tallas_); }
         if (isset($this->sabor_)) { $this->nm_limpa_alfa($this->sabor_); }
         if (isset($this->Sc_num_lin_alt) && $this->Sc_num_lin_alt > 0) 
         {
             $sc_seq_vert = $this->Sc_num_lin_alt;
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_form'][$sc_seq_vert];
             $this->iddet_ = $this->nmgp_dados_form['iddet_']; 
             $this->numfac_ = $this->nmgp_dados_form['numfac_']; 
             $this->remision_ = $this->nmgp_dados_form['remision_']; 
             if ($this->nmgp_opcao == "incluir"){$this->idpro_ = $this->nmgp_dados_form['idpro_'];} 
             if ($this->nmgp_opcao == "incluir"){$this->cantidad_ = $this->nmgp_dados_form['cantidad_'];} 
             if ($this->nmgp_opcao == "incluir"){$this->valorunit_ = $this->nmgp_dados_form['valorunit_'];} 
             $this->devuelto_ = $this->nmgp_dados_form['devuelto_']; 
             $this->iddev_ = $this->nmgp_dados_form['iddev_']; 
             $this->procesado_ = $this->nmgp_dados_form['procesado_']; 
         }
         $this->controle_form_vert();
         if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
         {
             $this->NM_rollback_db();
              if ($this->NM_ajax_flag)
              {
                  if (!isset($this->NM_ajax_info['errList']['geral_detalleventa_devoluciones']) || !is_array($this->NM_ajax_info['errList']['geral_detalleventa_devoluciones']))
                  {
                      $this->NM_ajax_info['errList']['geral_detalleventa_devoluciones'] = array();
                  }
                  if ($Campos_Crit != "")
                  {
                      $this->NM_ajax_info['errList']['geral_detalleventa_devoluciones'][] = $Campos_Crit;
                  }
                  if (!empty($Campos_Falta))
                  {
                      $this->NM_ajax_info['errList']['geral_detalleventa_devoluciones'][] = $this->Formata_Campos_Falta($Campos_Falta);
                  }
                  if ($this->Campos_Mens_erro != "")
                  {
                      $this->NM_ajax_info['errList']['geral_detalleventa_devoluciones'][] = $this->Campos_Mens_erro;
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
             $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_redir_atualiz'] == "ok")
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
         detalleventa_devoluciones_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
          if ('validate_idpro_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idpro_');
          }
          if ('validate_colores_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'colores_');
          }
          if ('validate_tallas_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tallas_');
          }
          if ('validate_sabor_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sabor_');
          }
          if ('validate_idbod_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idbod_');
          }
          if ('validate_unidadmayor_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'unidadmayor_');
          }
          if ('validate_stockubica_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'stockubica_');
          }
          if ('validate_unidad_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'unidad_');
          }
          if ('validate_cantidad_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cantidad_');
          }
          if ('validate_valorunit_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valorunit_');
          }
          if ('validate_valorpar_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valorpar_');
          }
          if ('validate_descuento_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'descuento_');
          }
          if ('validate_adicional_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'adicional_');
          }
          if ('validate_adicional1_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'adicional1_');
          }
          if ('validate_factor_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'factor_');
          }
          if ('validate_iva_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'iva_');
          }
          if ('validate_costop_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'costop_');
          }
          if ('validate_fech_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fech_');
          }
          detalleventa_devoluciones_pack_ajax_response();
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idpro_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idpro_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idpro_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idpro_'] = array(); 
    }

   $old_value_idbod_ = $this->idbod_;
   $old_value_stockubica_ = $this->stockubica_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_adicional_ = $this->adicional_;
   $old_value_adicional1_ = $this->adicional1_;
   $old_value_factor_ = $this->factor_;
   $old_value_iva_ = $this->iva_;
   $old_value_costop_ = $this->costop_;
   $old_value_fech_ = $this->fech_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idbod_ = $this->idbod_;
   $unformatted_value_stockubica_ = $this->stockubica_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_adicional_ = $this->adicional_;
   $unformatted_value_adicional1_ = $this->adicional1_;
   $unformatted_value_factor_ = $this->factor_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_costop_ = $this->costop_;
   $unformatted_value_fech_ = $this->fech_;

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

   $this->idbod_ = $old_value_idbod_;
   $this->stockubica_ = $old_value_stockubica_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->descuento_ = $old_value_descuento_;
   $this->adicional_ = $old_value_adicional_;
   $this->adicional1_ = $old_value_adicional1_;
   $this->factor_ = $old_value_factor_;
   $this->iva_ = $old_value_iva_;
   $this->costop_ = $old_value_costop_;
   $this->fech_ = $old_value_fech_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idpro_'][] = $rs->fields[0];
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
          if ('autocomp_idbod_' == substr($this->NM_ajax_opcao, 0, strlen('autocomp_idbod_')))
          {
              if (isset($_GET['term'])) {
                  $this->idbod_ = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->idbod_ = '';
              }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idbod_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idbod_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idbod_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idbod_'] = array(); 
    }

   $old_value_idbod_ = $this->idbod_;
   $old_value_stockubica_ = $this->stockubica_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_adicional_ = $this->adicional_;
   $old_value_adicional1_ = $this->adicional1_;
   $old_value_factor_ = $this->factor_;
   $old_value_iva_ = $this->iva_;
   $old_value_costop_ = $this->costop_;
   $old_value_fech_ = $this->fech_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);

   $this->nm_clear_val("idbod_");

   $unformatted_value_idbod_ = $this->idbod_;
   $unformatted_value_stockubica_ = $this->stockubica_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_adicional_ = $this->adicional_;
   $unformatted_value_adicional1_ = $this->adicional1_;
   $unformatted_value_factor_ = $this->factor_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_costop_ = $this->costop_;
   $unformatted_value_fech_ = $this->fech_;

   $nm_comando = "SELECT idbodega, bodega FROM bodegas WHERE bodega LIKE '%" . substr($this->Db->qstr($this->idbod_), 1, -1) . "%' ORDER BY bodega";

   $this->idbod_ = $old_value_idbod_;
   $this->stockubica_ = $old_value_stockubica_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->descuento_ = $old_value_descuento_;
   $this->adicional_ = $old_value_adicional_;
   $this->adicional1_ = $old_value_adicional1_;
   $this->factor_ = $old_value_factor_;
   $this->iva_ = $old_value_iva_;
   $this->costop_ = $old_value_costop_;
   $this->fech_ = $old_value_fech_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idbod_'][] = $rs->fields[0];
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
          if ('autocomp_colores_' == substr($this->NM_ajax_opcao, 0, strlen('autocomp_colores_')))
          {
              if (isset($_GET['term'])) {
                  $this->colores_ = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->colores_ = '';
              }
if ('autocomp_' != substr($this->NM_ajax_opcao, 0, 9))
{
   $this->idpro_ = $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['idpro_'];
}
if ($this->idpro_ != "")
{ 
   $this->nm_clear_val("idpro_");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_colores_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_colores_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_colores_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_colores_'] = array(); 
    }

   $old_value_idbod_ = $this->idbod_;
   $old_value_stockubica_ = $this->stockubica_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_adicional_ = $this->adicional_;
   $old_value_adicional1_ = $this->adicional1_;
   $old_value_factor_ = $this->factor_;
   $old_value_iva_ = $this->iva_;
   $old_value_costop_ = $this->costop_;
   $old_value_fech_ = $this->fech_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idbod_ = $this->idbod_;
   $unformatted_value_stockubica_ = $this->stockubica_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_adicional_ = $this->adicional_;
   $unformatted_value_adicional1_ = $this->adicional1_;
   $unformatted_value_factor_ = $this->factor_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_costop_ = $this->costop_;
   $unformatted_value_fech_ = $this->fech_;

   $nm_comando = "SELECT f.idcol, c.color FROM colorxproducto f left join colores c on f.idcol=c.idcolores WHERE (idpr=$this->idpro_) AND c.color LIKE '%" . substr($this->Db->qstr($this->colores_), 1, -1) . "%' ORDER BY f.idcol";

   $this->idbod_ = $old_value_idbod_;
   $this->stockubica_ = $old_value_stockubica_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->descuento_ = $old_value_descuento_;
   $this->adicional_ = $old_value_adicional_;
   $this->adicional1_ = $old_value_adicional1_;
   $this->factor_ = $old_value_factor_;
   $this->iva_ = $old_value_iva_;
   $this->costop_ = $old_value_costop_;
   $this->fech_ = $old_value_fech_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_colores_'][] = $rs->fields[0];
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
          if ('autocomp_tallas_' == substr($this->NM_ajax_opcao, 0, strlen('autocomp_tallas_')))
          {
              if (isset($_GET['term'])) {
                  $this->tallas_ = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->tallas_ = '';
              }
if ('autocomp_' != substr($this->NM_ajax_opcao, 0, 9))
{
   $this->idpro_ = $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['idpro_'];
}
if ($this->idpro_ != "")
{ 
   $this->nm_clear_val("idpro_");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_tallas_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_tallas_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_tallas_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_tallas_'] = array(); 
    }

   $old_value_idbod_ = $this->idbod_;
   $old_value_stockubica_ = $this->stockubica_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_adicional_ = $this->adicional_;
   $old_value_adicional1_ = $this->adicional1_;
   $old_value_factor_ = $this->factor_;
   $old_value_iva_ = $this->iva_;
   $old_value_costop_ = $this->costop_;
   $old_value_fech_ = $this->fech_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idbod_ = $this->idbod_;
   $unformatted_value_stockubica_ = $this->stockubica_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_adicional_ = $this->adicional_;
   $unformatted_value_adicional1_ = $this->adicional1_;
   $unformatted_value_factor_ = $this->factor_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_costop_ = $this->costop_;
   $unformatted_value_fech_ = $this->fech_;

   $nm_comando = "SELECT f.idta, t.tamaño FROM tallaxproducto f left join tallas t on f.idta=t.idtallas WHERE (idpr=$this->idpro_) AND t.tamaño LIKE '%" . substr($this->Db->qstr($this->tallas_), 1, -1) . "%' ORDER BY f.idta";

   $this->idbod_ = $old_value_idbod_;
   $this->stockubica_ = $old_value_stockubica_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->descuento_ = $old_value_descuento_;
   $this->adicional_ = $old_value_adicional_;
   $this->adicional1_ = $old_value_adicional1_;
   $this->factor_ = $old_value_factor_;
   $this->iva_ = $old_value_iva_;
   $this->costop_ = $old_value_costop_;
   $this->fech_ = $old_value_fech_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_tallas_'][] = $rs->fields[0];
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
          if ('autocomp_sabor_' == substr($this->NM_ajax_opcao, 0, strlen('autocomp_sabor_')))
          {
              if (isset($_GET['term'])) {
                  $this->sabor_ = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->sabor_ = '';
              }
if ('autocomp_' != substr($this->NM_ajax_opcao, 0, 9))
{
   $this->idpro_ = $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['idpro_'];
}
if ($this->idpro_ != "")
{ 
   $this->nm_clear_val("idpro_");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_sabor_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_sabor_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_sabor_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_sabor_'] = array(); 
    }

   $old_value_idbod_ = $this->idbod_;
   $old_value_stockubica_ = $this->stockubica_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_adicional_ = $this->adicional_;
   $old_value_adicional1_ = $this->adicional1_;
   $old_value_factor_ = $this->factor_;
   $old_value_iva_ = $this->iva_;
   $old_value_costop_ = $this->costop_;
   $old_value_fech_ = $this->fech_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idbod_ = $this->idbod_;
   $unformatted_value_stockubica_ = $this->stockubica_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_adicional_ = $this->adicional_;
   $unformatted_value_adicional1_ = $this->adicional1_;
   $unformatted_value_factor_ = $this->factor_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_costop_ = $this->costop_;
   $unformatted_value_fech_ = $this->fech_;

   $nm_comando = "SELECT f.idsa, t.tamaño FROM saborxproducto f left join tallas t on f.idsa=t.idtallas WHERE (idpr=$this->idpro_ and tallasabor='S') AND t.tamaño LIKE '%" . substr($this->Db->qstr($this->sabor_), 1, -1) . "%' ORDER BY f.idsa";

   $this->idbod_ = $old_value_idbod_;
   $this->stockubica_ = $old_value_stockubica_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->descuento_ = $old_value_descuento_;
   $this->adicional_ = $old_value_adicional_;
   $this->adicional1_ = $old_value_adicional1_;
   $this->factor_ = $old_value_factor_;
   $this->iva_ = $old_value_iva_;
   $this->costop_ = $old_value_costop_;
   $this->fech_ = $old_value_fech_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_sabor_'][] = $rs->fields[0];
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
          detalleventa_devoluciones_pack_ajax_response();
          exit;
      }
      while ($sc_contr_vert > $sc_seq_vert) 
      { 
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
         if ($this->nmgp_opcao == "recarga" && !isset($GLOBALS["idpro_" . $sc_seq_vert]))
         { 
             $GLOBALS["idpro_" . $sc_seq_vert] = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['idpro_'];
         } 
         if ($this->nmgp_opcao == "recarga" && !isset($GLOBALS["cantidad_" . $sc_seq_vert]))
         { 
             $GLOBALS["cantidad_" . $sc_seq_vert] = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['cantidad_'];
         } 
         if ($this->nmgp_opcao == "recarga" && !isset($GLOBALS["valorunit_" . $sc_seq_vert]))
         { 
             $GLOBALS["valorunit_" . $sc_seq_vert] = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['valorunit_'];
         } 
         $this->idpro_ = $GLOBALS["idpro_" . $sc_seq_vert]; 
         $this->colores_ = $GLOBALS["colores_" . $sc_seq_vert]; 
         $this->tallas_ = $GLOBALS["tallas_" . $sc_seq_vert]; 
         $this->sabor_ = $GLOBALS["sabor_" . $sc_seq_vert]; 
         $this->idbod_ = $GLOBALS["idbod_" . $sc_seq_vert]; 
         $this->unidadmayor_ = $GLOBALS["unidadmayor_" . $sc_seq_vert]; 
         $this->stockubica_ = $GLOBALS["stockubica_" . $sc_seq_vert]; 
         $this->unidad_ = $GLOBALS["unidad_" . $sc_seq_vert]; 
         $this->cantidad_ = $GLOBALS["cantidad_" . $sc_seq_vert]; 
         $this->valorunit_ = $GLOBALS["valorunit_" . $sc_seq_vert]; 
         $this->valorpar_ = $GLOBALS["valorpar_" . $sc_seq_vert]; 
         $this->descuento_ = $GLOBALS["descuento_" . $sc_seq_vert]; 
         $this->adicional_ = $GLOBALS["adicional_" . $sc_seq_vert]; 
         $this->adicional1_ = $GLOBALS["adicional1_" . $sc_seq_vert]; 
         $this->factor_ = $GLOBALS["factor_" . $sc_seq_vert]; 
         $this->iva_ = $GLOBALS["iva_" . $sc_seq_vert]; 
         $this->costop_ = $GLOBALS["costop_" . $sc_seq_vert]; 
         $this->fech_ = $GLOBALS["fech_" . $sc_seq_vert]; 
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_form'][$sc_seq_vert];
             $this->iddet_ = $this->nmgp_dados_form['iddet_']; 
             $this->numfac_ = $this->nmgp_dados_form['numfac_']; 
             $this->remision_ = $this->nmgp_dados_form['remision_']; 
             if ($this->nmgp_opcao == "incluir"){$this->idpro_ = $this->nmgp_dados_form['idpro_'];} 
             if ($this->nmgp_opcao == "incluir"){$this->cantidad_ = $this->nmgp_dados_form['cantidad_'];} 
             if ($this->nmgp_opcao == "incluir"){$this->valorunit_ = $this->nmgp_dados_form['valorunit_'];} 
             $this->devuelto_ = $this->nmgp_dados_form['devuelto_']; 
             $this->iddev_ = $this->nmgp_dados_form['iddev_']; 
             $this->procesado_ = $this->nmgp_dados_form['procesado_']; 
         }
         if (isset($this->idpro_)) { $this->nm_limpa_alfa($this->idpro_); }
         if (isset($this->unidadmayor_)) { $this->nm_limpa_alfa($this->unidadmayor_); }
         if (isset($this->factor_)) { $this->nm_limpa_alfa($this->factor_); }
         if (isset($this->idbod_)) { $this->nm_limpa_alfa($this->idbod_); }
         if (isset($this->costop_)) { $this->nm_limpa_alfa($this->costop_); }
         if (isset($this->cantidad_)) { $this->nm_limpa_alfa($this->cantidad_); }
         if (isset($this->valorunit_)) { $this->nm_limpa_alfa($this->valorunit_); }
         if (isset($this->valorpar_)) { $this->nm_limpa_alfa($this->valorpar_); }
         if (isset($this->iva_)) { $this->nm_limpa_alfa($this->iva_); }
         if (isset($this->descuento_)) { $this->nm_limpa_alfa($this->descuento_); }
         if (isset($this->adicional_)) { $this->nm_limpa_alfa($this->adicional_); }
         if (isset($this->adicional1_)) { $this->nm_limpa_alfa($this->adicional1_); }
         if (isset($this->colores_)) { $this->nm_limpa_alfa($this->colores_); }
         if (isset($this->tallas_)) { $this->nm_limpa_alfa($this->tallas_); }
         if (isset($this->sabor_)) { $this->nm_limpa_alfa($this->sabor_); }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_form'])) 
         {
            $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_form'][$sc_seq_vert];
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'])) 
         {
            $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert];
         }
         if ($this->nmgp_opcao != "recarga" && in_array($sc_seq_vert, $sc_check_excl))
         {
             $this->nmgp_opcao = "excluir";
         }
         if ($this->nmgp_opcao == "incluir" && !in_array($sc_seq_vert, $sc_check_incl))
         { }
         else
         {
             if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['idpro_']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_disabled'][$sc_seq_vert]['idpro_']))
             { 
                 $this->idpro_ = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['idpro_'];
             } 
             if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['cantidad_']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_disabled'][$sc_seq_vert]['cantidad_']))
             { 
                 $this->cantidad_ = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['cantidad_'];
             } 
             if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['valorunit_']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_disabled'][$sc_seq_vert]['valorunit_']))
             { 
                 $this->valorunit_ = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['valorunit_'];
             } 
             $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_disabled'] = array();
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
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['idpro_'] =  $this->idpro_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['colores_'] =  $this->colores_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['tallas_'] =  $this->tallas_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['sabor_'] =  $this->sabor_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['idbod_'] =  $this->idbod_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['unidadmayor_'] =  $this->unidadmayor_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['stockubica_'] =  $this->stockubica_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['unidad_'] =  $this->unidad_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['cantidad_'] =  $this->cantidad_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['valorunit_'] =  $this->valorunit_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['valorpar_'] =  $this->valorpar_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['descuento_'] =  $this->descuento_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['adicional_'] =  $this->adicional_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['adicional1_'] =  $this->adicional1_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['factor_'] =  $this->factor_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['iva_'] =  $this->iva_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['costop_'] =  $this->costop_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['fech_'] =  $this->fech_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['iddet_'] =  $this->iddet_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['numfac_'] =  $this->numfac_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['remision_'] =  $this->remision_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['devuelto_'] =  $this->devuelto_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['iddev_'] =  $this->iddev_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['procesado_'] =  $this->procesado_; 
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

          if ($this->sc_after_all_update) {
          $_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'on';
  


$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off'; 
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
          detalleventa_devoluciones_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
      {
          $this->nm_gera_html();
          $this->NM_ajax_info['tableRefresh'] = NM_charset_to_utf8($this->Table_refresh . $this->New_Line) . '</table>';
          $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
          $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_detalleventa_devoluciones);
          $this->NM_ajax_info['fldList']['iddet_']['keyVal'] = sc_htmlentities($this->nmgp_dados_form['iddet_']);
          $this->NM_ajax_info['fldList']['iddev_']['keyVal'] = sc_htmlentities($this->nmgp_dados_form['iddev_']);
          $this->NM_close_db();
          detalleventa_devoluciones_pack_ajax_response();
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
          $this->NM_close_db();
          detalleventa_devoluciones_pack_ajax_response();
          exit;
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_redir_atualiz'] == "ok")
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (isset($this->idpro_))
          { 
              $SV_idpro_ = $this->idpro_;
          } 
          if (isset($this->cantidad_))
          { 
              $SV_cantidad_ = $this->cantidad_;
          } 
          if (isset($this->valorunit_))
          { 
              $SV_valorunit_ = $this->valorunit_;
          } 
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if (isset($SV_idpro_) && $this->nmgp_opcao != "recarga")
          { 
              $this->idpro_ = $SV_idpro_;
          } 
          if (isset($SV_cantidad_) && $this->nmgp_opcao != "recarga")
          { 
              $this->cantidad_ = $SV_cantidad_;
          } 
          if (isset($SV_valorunit_) && $this->nmgp_opcao != "recarga")
          { 
              $this->valorunit_ = $SV_valorunit_;
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              detalleventa_devoluciones_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          return; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off';
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "detalleventa_devoluciones.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Elimine el item que no va a devolver y dele actualizar a los otros items") ?></TITLE>
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
<form name="Fdown" method="get" action="detalleventa_devoluciones_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="detalleventa_devoluciones"> 
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
   function sc_btn_sc_btn_0() 
   {
        global $nm_url_saida, $teste_validade, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;
 
     ob_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
 <head>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
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
include_once("detalleventa_devoluciones_sajax_js.php");
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
      $nmgp_opcao_saida_php = "igual";
      $nmgp_opc_ant_saida_php = "";
      $nm_f_saida = "./";
      nm_limpa_numero($this->idbod_, $this->field_config['idbod_']['symbol_grp']) ; 
      if (!empty($this->field_config['stockubica_']['symbol_dec']))
      {
          nm_limpa_valor($this->stockubica_, $this->field_config['stockubica_']['symbol_dec'], $this->field_config['stockubica_']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['cantidad_']['symbol_dec']))
      {
          nm_limpa_valor($this->cantidad_, $this->field_config['cantidad_']['symbol_dec'], $this->field_config['cantidad_']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['valorunit_']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valorunit_, $this->field_config['valorunit_']['symbol_dec'], $this->field_config['valorunit_']['symbol_grp'], $this->field_config['valorunit_']['symbol_mon']); 
          nm_limpa_valor($this->valorunit_, $this->field_config['valorunit_']['symbol_dec'], $this->field_config['valorunit_']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['valorpar_']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valorpar_, $this->field_config['valorpar_']['symbol_dec'], $this->field_config['valorpar_']['symbol_grp'], $this->field_config['valorpar_']['symbol_mon']); 
          nm_limpa_valor($this->valorpar_, $this->field_config['valorpar_']['symbol_dec'], $this->field_config['valorpar_']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['descuento_']['symbol_dec']))
      {
          nm_limpa_valor($this->descuento_, $this->field_config['descuento_']['symbol_dec'], $this->field_config['descuento_']['symbol_grp']) ; 
      }
      nm_limpa_numero($this->adicional_, $this->field_config['adicional_']['symbol_grp']) ; 
      nm_limpa_numero($this->adicional1_, $this->field_config['adicional1_']['symbol_grp']) ; 
      if (!empty($this->field_config['factor_']['symbol_dec']))
      {
          $this->sc_remove_currency($this->factor_, $this->field_config['factor_']['symbol_dec'], $this->field_config['factor_']['symbol_grp'], $this->field_config['factor_']['symbol_mon']); 
          nm_limpa_valor($this->factor_, $this->field_config['factor_']['symbol_dec'], $this->field_config['factor_']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['iva_']['symbol_dec']))
      {
          $this->sc_remove_currency($this->iva_, $this->field_config['iva_']['symbol_dec'], $this->field_config['iva_']['symbol_grp'], $this->field_config['iva_']['symbol_mon']); 
          nm_limpa_valor($this->iva_, $this->field_config['iva_']['symbol_dec'], $this->field_config['iva_']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['costop_']['symbol_dec']))
      {
          nm_limpa_valor($this->costop_, $this->field_config['costop_']['symbol_dec'], $this->field_config['costop_']['symbol_grp']) ; 
      }
      nm_limpa_data($this->fech_, $this->field_config['fech_']['date_sep']) ; 
      $this->nm_converte_datas();
      $_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'on';
if (!isset($this->sc_temp_sw)) {$this->sc_temp_sw = (isset($_SESSION['sw'])) ? $_SESSION['sw'] : "";}
if (!isset($this->sc_temp_par_numfacventa)) {$this->sc_temp_par_numfacventa = (isset($_SESSION['par_numfacventa'])) ? $_SESSION['par_numfacventa'] : "";}
  	

	$this->sc_temp_sw=0;
$this->trae_fecha();
$id="";
$idfac="";
$idproducto="";
$unimay="";
$fac="";
$bod="";
$costo="";
$cantid="";
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
$proc="";
$nume="";
 
      $nm_select = "select * from detalleventaself where numfac=$this->sc_temp_par_numfacventa"; 
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
                 $SCrx->fields[21] = str_replace(',', '.', $SCrx->fields[21]);
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
                 $SCrx->fields[21] = (strpos(strtolower($SCrx->fields[21]), "e")) ? (float)$SCrx->fields[21] : $SCrx->fields[21];
                 $SCrx->fields[21] = (string)$SCrx->fields[21];
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
				 $cantid.=$ads[8]*-1;
				 $vuni.=$ads[9]*-1;
				 $vparcial.=$ads[10]*-1;
				 $iva.=$ads[11]*-1;
				 $desc.=$ads[12]*-1;
				 $tiva.=$ads[13];
				 $tdes.=$ads[14];
			  	 $dev.=$ads[15];
			 	$col.=$ads[16];
			  	$tall.=$ads[17];			  
			   	$sab.=$ads[18];
			  	$nume.=$ads[21];
			  $this->trae_saldo($vparcial);
			  $this->saldo_fctura($vparcial);
			  $this->actualiza_stock($idproducto, $cantid);
			  		
				
     $nm_select ="insert detalleventa set numfac=$idfac, remision='Null', idpro=$idproducto, unidadmayor='$unimay', factor=$fac, idbod=$bod, costop=$costo, cantidad=$cantid, valorunit=$vuni, valorpar=$vparcial, iva=$iva, descuento=$desc, adicional=$tiva, adicional1=$tdes, devuelto=0, colores=$col, tallas=$tall, sabor=$sab, numdevo=$nume, iddeta=$id"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                detalleventa_devoluciones_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

$gru=$this->consulta_grupo($idproducto);
if($gru==0)
	{
		if($unimay=='NO' and $fac>0)
		{
		$cant=$cantid;
		$aux=$cant/$fac;
		$cant=round($aux, 3);

		
     $nm_select ="INSERT inventario SET fecha='$this->fech_', cantidad=$cant, idpro=$idproducto, costo=$costo, 		valorparcial=(($vparcial*-1)-($desc*-1)), idbod=$bod, tipo=1, detalle='Devolución en Venta', idmov=1, nufacvta=$this->sc_temp_par_numfacventa, iddetalle=$id, lote='Null', colores=$col, tallas=$tall, sabor=$sab, numdev=$nume"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                detalleventa_devoluciones_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
					
		}
	else
		{ 
		$cant=($cantid*-1);
		
     $nm_select ="INSERT inventario SET fecha='$this->fech_', cantidad=$cant, idpro=$idproducto, costo=$costo, 		valorparcial=(($vparcial*-1)-($desc*-1)), idbod=$bod,tipo=1, detalle='Devolución en Venta', idmov=1,   		nufacvta=$this->sc_temp_par_numfacventa, iddetalle=$id, colores=$col, tallas=$tall, sabor=$sab, numdev=$nume"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                detalleventa_devoluciones_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		}
	}
			  $cant=($cantid*-1);
			  
     $nm_select ="update detalleventa set devuelto=$cant+$dev where iddet=$id"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                detalleventa_devoluciones_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			  
	$id="";
	$idfac="";
	$idproducto="";
	$unimay="";
	$fac="";
	$bod="";
	$costo="";
	$cantid="";
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
	$nume="";
				}
			
	}

$this->update_master();

     $nm_select ="DELETE FROM detalleventaself WHERE numfac=$this->sc_temp_par_numfacventa"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                detalleventa_devoluciones_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
 if (isset($this->sc_temp_par_numfacventa)) { $_SESSION['par_numfacventa'] = $this->sc_temp_par_numfacventa;}
 if (isset($this->sc_temp_sw)) { $_SESSION['sw'] = $this->sc_temp_sw;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_devventa') . "/", $this->nm_location, "_self?#?" . NM_encode_input("") . "?@?","_self", '', 440, 630);
 };
if (isset($this->sc_temp_par_numfacventa)) { $_SESSION['par_numfacventa'] = $this->sc_temp_par_numfacventa;}
if (isset($this->sc_temp_sw)) { $_SESSION['sw'] = $this->sc_temp_sw;}
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off'; 
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['total']);
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="iddet_" value="<?php echo $this->form_encode_input($this->iddet_) ?>"/>
      <input type=hidden name="iddev_" value="<?php echo $this->form_encode_input($this->iddev_) ?>"/>
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
           case 'idpro_':
               return "Artículo";
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
           case 'idbod_':
               return "Ubicación";
               break;
           case 'unidadmayor_':
               return "Unidad Mayor";
               break;
           case 'stockubica_':
               return "Stock Ubic.";
               break;
           case 'unidad_':
               return "Unidad";
               break;
           case 'cantidad_':
               return "Cantidad a devolver";
               break;
           case 'valorunit_':
               return "Valor unit.";
               break;
           case 'valorpar_':
               return "Valor parcial";
               break;
           case 'descuento_':
               return "Descuento";
               break;
           case 'adicional_':
               return "Tasa de IVA";
               break;
           case 'adicional1_':
               return "Tasa de descuento";
               break;
           case 'factor_':
               return "Factor";
               break;
           case 'iva_':
               return "IVA";
               break;
           case 'costop_':
               return "Costop";
               break;
           case 'fech_':
               return "fech";
               break;
           case 'iddet_':
               return "Iddet";
               break;
           case 'numfac_':
               return "Numfac";
               break;
           case 'remision_':
               return "Remision";
               break;
           case 'devuelto_':
               return "Devuelto";
               break;
           case 'iddev_':
               return "Iddev";
               break;
           case 'procesado_':
               return "Procesado";
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
              if (!isset($this->NM_ajax_info['errList']['geral_detalleventa_devoluciones']) || !is_array($this->NM_ajax_info['errList']['geral_detalleventa_devoluciones']))
              {
                  $this->NM_ajax_info['errList']['geral_detalleventa_devoluciones'] = array();
              }
              $this->NM_ajax_info['errList']['geral_detalleventa_devoluciones'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'idpro_' == $filtro)) || (is_array($filtro) && in_array('idpro_', $filtro)))
        $this->ValidateField_idpro_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'colores_' == $filtro)) || (is_array($filtro) && in_array('colores_', $filtro)))
        $this->ValidateField_colores_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tallas_' == $filtro)) || (is_array($filtro) && in_array('tallas_', $filtro)))
        $this->ValidateField_tallas_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'sabor_' == $filtro)) || (is_array($filtro) && in_array('sabor_', $filtro)))
        $this->ValidateField_sabor_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'idbod_' == $filtro)) || (is_array($filtro) && in_array('idbod_', $filtro)))
        $this->ValidateField_idbod_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'unidadmayor_' == $filtro)) || (is_array($filtro) && in_array('unidadmayor_', $filtro)))
        $this->ValidateField_unidadmayor_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'stockubica_' == $filtro)) || (is_array($filtro) && in_array('stockubica_', $filtro)))
        $this->ValidateField_stockubica_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'unidad_' == $filtro)) || (is_array($filtro) && in_array('unidad_', $filtro)))
        $this->ValidateField_unidad_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cantidad_' == $filtro)) || (is_array($filtro) && in_array('cantidad_', $filtro)))
        $this->ValidateField_cantidad_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'valorunit_' == $filtro)) || (is_array($filtro) && in_array('valorunit_', $filtro)))
        $this->ValidateField_valorunit_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'valorpar_' == $filtro)) || (is_array($filtro) && in_array('valorpar_', $filtro)))
        $this->ValidateField_valorpar_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'descuento_' == $filtro)) || (is_array($filtro) && in_array('descuento_', $filtro)))
        $this->ValidateField_descuento_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'adicional_' == $filtro)) || (is_array($filtro) && in_array('adicional_', $filtro)))
        $this->ValidateField_adicional_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'adicional1_' == $filtro)) || (is_array($filtro) && in_array('adicional1_', $filtro)))
        $this->ValidateField_adicional1_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'factor_' == $filtro)) || (is_array($filtro) && in_array('factor_', $filtro)))
        $this->ValidateField_factor_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'iva_' == $filtro)) || (is_array($filtro) && in_array('iva_', $filtro)))
        $this->ValidateField_iva_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'costop_' == $filtro)) || (is_array($filtro) && in_array('costop_', $filtro)))
        $this->ValidateField_costop_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fech_' == $filtro)) || (is_array($filtro) && in_array('fech_', $filtro)))
        $this->ValidateField_fech_($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_idpro_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->idpro_) > 10) 
          { 
              $hasError = true;
              $Campos_Crit .= "Artículo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
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

    function ValidateField_colores_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->colores_) > 3) 
          { 
              $hasError = true;
              $Campos_Crit .= "Color " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['colores_']))
              {
                  $Campos_Erros['colores_'] = array();
              }
              $Campos_Erros['colores_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['colores_']) || !is_array($this->NM_ajax_info['errList']['colores_']))
              {
                  $this->NM_ajax_info['errList']['colores_'] = array();
              }
              $this->NM_ajax_info['errList']['colores_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'colores_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_colores_

    function ValidateField_tallas_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tallas_) > 2) 
          { 
              $hasError = true;
              $Campos_Crit .= "Talla " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tallas_']))
              {
                  $Campos_Erros['tallas_'] = array();
              }
              $Campos_Erros['tallas_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tallas_']) || !is_array($this->NM_ajax_info['errList']['tallas_']))
              {
                  $this->NM_ajax_info['errList']['tallas_'] = array();
              }
              $this->NM_ajax_info['errList']['tallas_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tallas_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tallas_

    function ValidateField_sabor_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->sabor_) > 2) 
          { 
              $hasError = true;
              $Campos_Crit .= "Sabor " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sabor_']))
              {
                  $Campos_Erros['sabor_'] = array();
              }
              $Campos_Erros['sabor_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sabor_']) || !is_array($this->NM_ajax_info['errList']['sabor_']))
              {
                  $this->NM_ajax_info['errList']['sabor_'] = array();
              }
              $this->NM_ajax_info['errList']['sabor_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sabor_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sabor_

    function ValidateField_idbod_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idbod_ === "" || is_null($this->idbod_))  
      { 
          $this->idbod_ = 0;
          $this->sc_force_zero[] = 'idbod_';
      } 
      nm_limpa_numero($this->idbod_, $this->field_config['idbod_']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->idbod_ != '')  
          { 
              $iTestSize = 2;
              if (strlen($this->idbod_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Ubicación: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['idbod_']))
                  {
                      $Campos_Erros['idbod_'] = array();
                  }
                  $Campos_Erros['idbod_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['idbod_']) || !is_array($this->NM_ajax_info['errList']['idbod_']))
                  {
                      $this->NM_ajax_info['errList']['idbod_'] = array();
                  }
                  $this->NM_ajax_info['errList']['idbod_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->idbod_, 2, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Ubicación; " ; 
                  if (!isset($Campos_Erros['idbod_']))
                  {
                      $Campos_Erros['idbod_'] = array();
                  }
                  $Campos_Erros['idbod_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['idbod_']) || !is_array($this->NM_ajax_info['errList']['idbod_']))
                  {
                      $this->NM_ajax_info['errList']['idbod_'] = array();
                  }
                  $this->NM_ajax_info['errList']['idbod_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
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

    function ValidateField_unidadmayor_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->unidadmayor_ == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['php_cmp_required']['unidadmayor_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['php_cmp_required']['unidadmayor_'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Unidad Mayor" ;
          if (!isset($Campos_Erros['unidadmayor_']))
          {
              $Campos_Erros['unidadmayor_'] = array();
          }
          $Campos_Erros['unidadmayor_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['unidadmayor_']) || !is_array($this->NM_ajax_info['errList']['unidadmayor_']))
                  {
                      $this->NM_ajax_info['errList']['unidadmayor_'] = array();
                  }
                  $this->NM_ajax_info['errList']['unidadmayor_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'unidadmayor_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_unidadmayor_

    function ValidateField_stockubica_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->stockubica_ === "" || is_null($this->stockubica_))  
      { 
          $this->stockubica_ = 0;
          $this->sc_force_zero[] = 'stockubica_';
      } 
      if (!empty($this->field_config['stockubica_']['symbol_dec']))
      {
          nm_limpa_valor($this->stockubica_, $this->field_config['stockubica_']['symbol_dec'], $this->field_config['stockubica_']['symbol_grp']) ; 
          if ('.' == substr($this->stockubica_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->stockubica_, 1)))
              {
                  $this->stockubica_ = '';
              }
              else
              {
                  $this->stockubica_ = '0' . $this->stockubica_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->stockubica_ != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->stockubica_, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->stockubica_, -1))
              {
                  $iTestSize++;
                  $this->stockubica_ = '-' . substr($this->stockubica_, 0, -1);
              }
              if (strlen($this->stockubica_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Stock Ubic.: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['stockubica_']))
                  {
                      $Campos_Erros['stockubica_'] = array();
                  }
                  $Campos_Erros['stockubica_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['stockubica_']) || !is_array($this->NM_ajax_info['errList']['stockubica_']))
                  {
                      $this->NM_ajax_info['errList']['stockubica_'] = array();
                  }
                  $this->NM_ajax_info['errList']['stockubica_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->stockubica_, 17, 3, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Stock Ubic.; " ; 
                  if (!isset($Campos_Erros['stockubica_']))
                  {
                      $Campos_Erros['stockubica_'] = array();
                  }
                  $Campos_Erros['stockubica_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['stockubica_']) || !is_array($this->NM_ajax_info['errList']['stockubica_']))
                  {
                      $this->NM_ajax_info['errList']['stockubica_'] = array();
                  }
                  $this->NM_ajax_info['errList']['stockubica_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'stockubica_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_stockubica_

    function ValidateField_unidad_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->unidad_) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'unidad_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_unidad_

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
                  $Campos_Crit .= "Cantidad a devolver: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
                  $Campos_Crit .= "Cantidad a devolver; " ; 
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
                  $Campos_Crit .= "Valor unit.: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->valorunit_, 12, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valor unit.; " ; 
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
                  $Campos_Crit .= "Valor parcial: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->valorpar_, 12, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Valor parcial; " ; 
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
              $iTestSize = 7;
              if (strlen($this->descuento_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Descuento: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->descuento_, 6, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Descuento; " ; 
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

    function ValidateField_adicional_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->adicional_ === "" || is_null($this->adicional_))  
      { 
          $this->adicional_ = 0;
          $this->sc_force_zero[] = 'adicional_';
      } 
      nm_limpa_numero($this->adicional_, $this->field_config['adicional_']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->adicional_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->adicional_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tasa de IVA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['adicional_']))
                  {
                      $Campos_Erros['adicional_'] = array();
                  }
                  $Campos_Erros['adicional_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['adicional_']) || !is_array($this->NM_ajax_info['errList']['adicional_']))
                  {
                      $this->NM_ajax_info['errList']['adicional_'] = array();
                  }
                  $this->NM_ajax_info['errList']['adicional_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->adicional_, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tasa de IVA; " ; 
                  if (!isset($Campos_Erros['adicional_']))
                  {
                      $Campos_Erros['adicional_'] = array();
                  }
                  $Campos_Erros['adicional_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['adicional_']) || !is_array($this->NM_ajax_info['errList']['adicional_']))
                  {
                      $this->NM_ajax_info['errList']['adicional_'] = array();
                  }
                  $this->NM_ajax_info['errList']['adicional_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'adicional_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_adicional_

    function ValidateField_adicional1_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->adicional1_ === "" || is_null($this->adicional1_))  
      { 
          $this->adicional1_ = 0;
          $this->sc_force_zero[] = 'adicional1_';
      } 
      nm_limpa_numero($this->adicional1_, $this->field_config['adicional1_']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->adicional1_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->adicional1_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tasa de descuento: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['adicional1_']))
                  {
                      $Campos_Erros['adicional1_'] = array();
                  }
                  $Campos_Erros['adicional1_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['adicional1_']) || !is_array($this->NM_ajax_info['errList']['adicional1_']))
                  {
                      $this->NM_ajax_info['errList']['adicional1_'] = array();
                  }
                  $this->NM_ajax_info['errList']['adicional1_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->adicional1_, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tasa de descuento; " ; 
                  if (!isset($Campos_Erros['adicional1_']))
                  {
                      $Campos_Erros['adicional1_'] = array();
                  }
                  $Campos_Erros['adicional1_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['adicional1_']) || !is_array($this->NM_ajax_info['errList']['adicional1_']))
                  {
                      $this->NM_ajax_info['errList']['adicional1_'] = array();
                  }
                  $this->NM_ajax_info['errList']['adicional1_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'adicional1_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_adicional1_

    function ValidateField_factor_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if (!empty($this->field_config['factor_']['symbol_dec']))
      {
          $this->sc_remove_currency($this->factor_, $this->field_config['factor_']['symbol_dec'], $this->field_config['factor_']['symbol_grp'], $this->field_config['factor_']['symbol_mon']); 
          nm_limpa_valor($this->factor_, $this->field_config['factor_']['symbol_dec'], $this->field_config['factor_']['symbol_grp']) ; 
          if ('.' == substr($this->factor_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->factor_, 1)))
              {
                  $this->factor_ = '';
              }
              else
              {
                  $this->factor_ = '0' . $this->factor_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->factor_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->factor_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Factor: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['factor_']))
                  {
                      $Campos_Erros['factor_'] = array();
                  }
                  $Campos_Erros['factor_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['factor_']) || !is_array($this->NM_ajax_info['errList']['factor_']))
                  {
                      $this->NM_ajax_info['errList']['factor_'] = array();
                  }
                  $this->NM_ajax_info['errList']['factor_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->factor_, 8, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Factor; " ; 
                  if (!isset($Campos_Erros['factor_']))
                  {
                      $Campos_Erros['factor_'] = array();
                  }
                  $Campos_Erros['factor_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['factor_']) || !is_array($this->NM_ajax_info['errList']['factor_']))
                  {
                      $this->NM_ajax_info['errList']['factor_'] = array();
                  }
                  $this->NM_ajax_info['errList']['factor_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['php_cmp_required']['factor_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['php_cmp_required']['factor_'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Factor" ; 
              if (!isset($Campos_Erros['factor_']))
              {
                  $Campos_Erros['factor_'] = array();
              }
              $Campos_Erros['factor_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['factor_']) || !is_array($this->NM_ajax_info['errList']['factor_']))
                  {
                      $this->NM_ajax_info['errList']['factor_'] = array();
                  }
                  $this->NM_ajax_info['errList']['factor_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'factor_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_factor_

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
              $iTestSize = 11;
              if (strlen($this->iva_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "IVA: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->iva_, 10, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "IVA; " ; 
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

    function ValidateField_costop_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['costop_']['symbol_dec']))
      {
          nm_limpa_valor($this->costop_, $this->field_config['costop_']['symbol_dec'], $this->field_config['costop_']['symbol_grp']) ; 
          if ('.' == substr($this->costop_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->costop_, 1)))
              {
                  $this->costop_ = '';
              }
              else
              {
                  $this->costop_ = '0' . $this->costop_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->costop_ != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->costop_) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Costop: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['costop_']))
                  {
                      $Campos_Erros['costop_'] = array();
                  }
                  $Campos_Erros['costop_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['costop_']) || !is_array($this->NM_ajax_info['errList']['costop_']))
                  {
                      $this->NM_ajax_info['errList']['costop_'] = array();
                  }
                  $this->NM_ajax_info['errList']['costop_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->costop_, 12, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Costop; " ; 
                  if (!isset($Campos_Erros['costop_']))
                  {
                      $Campos_Erros['costop_'] = array();
                  }
                  $Campos_Erros['costop_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['costop_']) || !is_array($this->NM_ajax_info['errList']['costop_']))
                  {
                      $this->NM_ajax_info['errList']['costop_'] = array();
                  }
                  $this->NM_ajax_info['errList']['costop_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['php_cmp_required']['costop_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['php_cmp_required']['costop_'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Costop" ; 
              if (!isset($Campos_Erros['costop_']))
              {
                  $Campos_Erros['costop_'] = array();
              }
              $Campos_Erros['costop_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['costop_']) || !is_array($this->NM_ajax_info['errList']['costop_']))
                  {
                      $this->NM_ajax_info['errList']['costop_'] = array();
                  }
                  $this->NM_ajax_info['errList']['costop_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'costop_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_costop_

    function ValidateField_fech_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fech_, $this->field_config['fech_']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fech_']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fech_']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fech_']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fech_']['date_sep']) ; 
          if (trim($this->fech_) != "")  
          { 
              if ($teste_validade->Data($this->fech_, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "fech; " ; 
                  if (!isset($Campos_Erros['fech_']))
                  {
                      $Campos_Erros['fech_'] = array();
                  }
                  $Campos_Erros['fech_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fech_']) || !is_array($this->NM_ajax_info['errList']['fech_']))
                  {
                      $this->NM_ajax_info['errList']['fech_'] = array();
                  }
                  $this->NM_ajax_info['errList']['fech_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fech_']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fech_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fech_

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
    $this->nmgp_dados_form['idpro_'] = $this->idpro_;
    $this->nmgp_dados_form['colores_'] = $this->colores_;
    $this->nmgp_dados_form['tallas_'] = $this->tallas_;
    $this->nmgp_dados_form['sabor_'] = $this->sabor_;
    $this->nmgp_dados_form['idbod_'] = $this->idbod_;
    $this->nmgp_dados_form['unidadmayor_'] = $this->unidadmayor_;
    $this->nmgp_dados_form['stockubica_'] = $this->stockubica_;
    $this->nmgp_dados_form['unidad_'] = $this->unidad_;
    $this->nmgp_dados_form['cantidad_'] = $this->cantidad_;
    $this->nmgp_dados_form['valorunit_'] = $this->valorunit_;
    $this->nmgp_dados_form['valorpar_'] = $this->valorpar_;
    $this->nmgp_dados_form['descuento_'] = $this->descuento_;
    $this->nmgp_dados_form['adicional_'] = $this->adicional_;
    $this->nmgp_dados_form['adicional1_'] = $this->adicional1_;
    $this->nmgp_dados_form['factor_'] = $this->factor_;
    $this->nmgp_dados_form['iva_'] = $this->iva_;
    $this->nmgp_dados_form['costop_'] = $this->costop_;
    $this->nmgp_dados_form['fech_'] = (strlen(trim($this->fech_)) > 19) ? str_replace(".", ":", $this->fech_) : trim($this->fech_);
    $this->nmgp_dados_form['iddet_'] = $this->iddet_;
    $this->nmgp_dados_form['numfac_'] = $this->numfac_;
    $this->nmgp_dados_form['remision_'] = $this->remision_;
    $this->nmgp_dados_form['devuelto_'] = $this->devuelto_;
    $this->nmgp_dados_form['iddev_'] = $this->iddev_;
    $this->nmgp_dados_form['procesado_'] = $this->procesado_;
    $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_form'][$sc_seq_vert] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['idbod_'] = $this->idbod_;
      nm_limpa_numero($this->idbod_, $this->field_config['idbod_']['symbol_grp']) ; 
      $this->Before_unformat['stockubica_'] = $this->stockubica_;
      if (!empty($this->field_config['stockubica_']['symbol_dec']))
      {
         nm_limpa_valor($this->stockubica_, $this->field_config['stockubica_']['symbol_dec'], $this->field_config['stockubica_']['symbol_grp']);
      }
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
      $this->Before_unformat['valorpar_'] = $this->valorpar_;
      if (!empty($this->field_config['valorpar_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valorpar_, $this->field_config['valorpar_']['symbol_dec'], $this->field_config['valorpar_']['symbol_grp'], $this->field_config['valorpar_']['symbol_mon']);
         nm_limpa_valor($this->valorpar_, $this->field_config['valorpar_']['symbol_dec'], $this->field_config['valorpar_']['symbol_grp']);
      }
      $this->Before_unformat['descuento_'] = $this->descuento_;
      if (!empty($this->field_config['descuento_']['symbol_dec']))
      {
         nm_limpa_valor($this->descuento_, $this->field_config['descuento_']['symbol_dec'], $this->field_config['descuento_']['symbol_grp']);
      }
      $this->Before_unformat['adicional_'] = $this->adicional_;
      nm_limpa_numero($this->adicional_, $this->field_config['adicional_']['symbol_grp']) ; 
      $this->Before_unformat['adicional1_'] = $this->adicional1_;
      nm_limpa_numero($this->adicional1_, $this->field_config['adicional1_']['symbol_grp']) ; 
      $this->Before_unformat['factor_'] = $this->factor_;
      if (!empty($this->field_config['factor_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->factor_, $this->field_config['factor_']['symbol_dec'], $this->field_config['factor_']['symbol_grp'], $this->field_config['factor_']['symbol_mon']);
         nm_limpa_valor($this->factor_, $this->field_config['factor_']['symbol_dec'], $this->field_config['factor_']['symbol_grp']);
      }
      $this->Before_unformat['iva_'] = $this->iva_;
      if (!empty($this->field_config['iva_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->iva_, $this->field_config['iva_']['symbol_dec'], $this->field_config['iva_']['symbol_grp'], $this->field_config['iva_']['symbol_mon']);
         nm_limpa_valor($this->iva_, $this->field_config['iva_']['symbol_dec'], $this->field_config['iva_']['symbol_grp']);
      }
      $this->Before_unformat['costop_'] = $this->costop_;
      if (!empty($this->field_config['costop_']['symbol_dec']))
      {
         nm_limpa_valor($this->costop_, $this->field_config['costop_']['symbol_dec'], $this->field_config['costop_']['symbol_grp']);
      }
      $this->Before_unformat['fech_'] = $this->fech_;
      nm_limpa_data($this->fech_, $this->field_config['fech_']['date_sep']) ; 
      $this->Before_unformat['iddet_'] = $this->iddet_;
      nm_limpa_numero($this->iddet_, $this->field_config['iddet_']['symbol_grp']) ; 
      $this->Before_unformat['numfac_'] = $this->numfac_;
      nm_limpa_numero($this->numfac_, $this->field_config['numfac_']['symbol_grp']) ; 
      $this->Before_unformat['remision_'] = $this->remision_;
      nm_limpa_numero($this->remision_, $this->field_config['remision_']['symbol_grp']) ; 
      $this->Before_unformat['devuelto_'] = $this->devuelto_;
      nm_limpa_numero($this->devuelto_, $this->field_config['devuelto_']['symbol_grp']) ; 
      $this->Before_unformat['iddev_'] = $this->iddev_;
      nm_limpa_numero($this->iddev_, $this->field_config['iddev_']['symbol_grp']) ; 
      $this->Before_unformat['procesado_'] = $this->procesado_;
      nm_limpa_numero($this->procesado_, $this->field_config['procesado_']['symbol_grp']) ; 
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
      if ($Nome_Campo == "idbod_")
      {
          nm_limpa_numero($this->idbod_, $this->field_config['idbod_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "stockubica_")
      {
          if (!empty($this->field_config['stockubica_']['symbol_dec']))
          {
             nm_limpa_valor($this->stockubica_, $this->field_config['stockubica_']['symbol_dec'], $this->field_config['stockubica_']['symbol_grp']);
          }
      }
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
      if ($Nome_Campo == "valorpar_")
      {
          if (!empty($this->field_config['valorpar_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valorpar_, $this->field_config['valorpar_']['symbol_dec'], $this->field_config['valorpar_']['symbol_grp'], $this->field_config['valorpar_']['symbol_mon']);
             nm_limpa_valor($this->valorpar_, $this->field_config['valorpar_']['symbol_dec'], $this->field_config['valorpar_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "descuento_")
      {
          if (!empty($this->field_config['descuento_']['symbol_dec']))
          {
             nm_limpa_valor($this->descuento_, $this->field_config['descuento_']['symbol_dec'], $this->field_config['descuento_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "adicional_")
      {
          nm_limpa_numero($this->adicional_, $this->field_config['adicional_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "adicional1_")
      {
          nm_limpa_numero($this->adicional1_, $this->field_config['adicional1_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "factor_")
      {
          if (!empty($this->field_config['factor_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->factor_, $this->field_config['factor_']['symbol_dec'], $this->field_config['factor_']['symbol_grp'], $this->field_config['factor_']['symbol_mon']);
             nm_limpa_valor($this->factor_, $this->field_config['factor_']['symbol_dec'], $this->field_config['factor_']['symbol_grp']);
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
      if ($Nome_Campo == "costop_")
      {
          if (!empty($this->field_config['costop_']['symbol_dec']))
          {
             nm_limpa_valor($this->costop_, $this->field_config['costop_']['symbol_dec'], $this->field_config['costop_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "iddet_")
      {
          nm_limpa_numero($this->iddet_, $this->field_config['iddet_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "numfac_")
      {
          nm_limpa_numero($this->numfac_, $this->field_config['numfac_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "remision_")
      {
          nm_limpa_numero($this->remision_, $this->field_config['remision_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "devuelto_")
      {
          nm_limpa_numero($this->devuelto_, $this->field_config['devuelto_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "iddev_")
      {
          nm_limpa_numero($this->iddev_, $this->field_config['iddev_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "procesado_")
      {
          nm_limpa_numero($this->procesado_, $this->field_config['procesado_']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
      if ('' !== $this->idbod_ || (!empty($format_fields) && isset($format_fields['idbod_'])))
      {
          nmgp_Form_Num_Val($this->idbod_, $this->field_config['idbod_']['symbol_grp'], $this->field_config['idbod_']['symbol_dec'], "0", "S", $this->field_config['idbod_']['format_neg'], "", "", "-", $this->field_config['idbod_']['symbol_fmt']) ; 
      }
      if ('' !== $this->stockubica_ || (!empty($format_fields) && isset($format_fields['stockubica_'])))
      {
          nmgp_Form_Num_Val($this->stockubica_, $this->field_config['stockubica_']['symbol_grp'], $this->field_config['stockubica_']['symbol_dec'], "3", "S", $this->field_config['stockubica_']['format_neg'], "", "", "-", $this->field_config['stockubica_']['symbol_fmt']) ; 
      }
      if ('' !== $this->cantidad_ || (!empty($format_fields) && isset($format_fields['cantidad_'])))
      {
          nmgp_Form_Num_Val($this->cantidad_, $this->field_config['cantidad_']['symbol_grp'], $this->field_config['cantidad_']['symbol_dec'], "2", "S", $this->field_config['cantidad_']['format_neg'], "", "", "-", $this->field_config['cantidad_']['symbol_fmt']) ; 
      }
      if ('' !== $this->valorunit_ || (!empty($format_fields) && isset($format_fields['valorunit_'])))
      {
          nmgp_Form_Num_Val($this->valorunit_, $this->field_config['valorunit_']['symbol_grp'], $this->field_config['valorunit_']['symbol_dec'], "0", "S", $this->field_config['valorunit_']['format_neg'], "", "", "-", $this->field_config['valorunit_']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['valorunit_']['symbol_mon'];
          $this->sc_add_currency($this->valorunit_, $sMonSymb, $this->field_config['valorunit_']['format_pos']); 
      }
      if ('' !== $this->valorpar_ || (!empty($format_fields) && isset($format_fields['valorpar_'])))
      {
          nmgp_Form_Num_Val($this->valorpar_, $this->field_config['valorpar_']['symbol_grp'], $this->field_config['valorpar_']['symbol_dec'], "0", "S", $this->field_config['valorpar_']['format_neg'], "", "", "-", $this->field_config['valorpar_']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['valorpar_']['symbol_mon'];
          $this->sc_add_currency($this->valorpar_, $sMonSymb, $this->field_config['valorpar_']['format_pos']); 
      }
      if ('' !== $this->descuento_ || (!empty($format_fields) && isset($format_fields['descuento_'])))
      {
          nmgp_Form_Num_Val($this->descuento_, $this->field_config['descuento_']['symbol_grp'], $this->field_config['descuento_']['symbol_dec'], "0", "S", $this->field_config['descuento_']['format_neg'], "", "", "-", $this->field_config['descuento_']['symbol_fmt']) ; 
      }
      if ('' !== $this->adicional_ || (!empty($format_fields) && isset($format_fields['adicional_'])))
      {
          nmgp_Form_Num_Val($this->adicional_, $this->field_config['adicional_']['symbol_grp'], $this->field_config['adicional_']['symbol_dec'], "0", "S", $this->field_config['adicional_']['format_neg'], "", "", "-", $this->field_config['adicional_']['symbol_fmt']) ; 
      }
      if ('' !== $this->adicional1_ || (!empty($format_fields) && isset($format_fields['adicional1_'])))
      {
          nmgp_Form_Num_Val($this->adicional1_, $this->field_config['adicional1_']['symbol_grp'], $this->field_config['adicional1_']['symbol_dec'], "0", "S", $this->field_config['adicional1_']['format_neg'], "", "", "-", $this->field_config['adicional1_']['symbol_fmt']) ; 
      }
      if ('' !== $this->factor_ || (!empty($format_fields) && isset($format_fields['factor_'])))
      {
          nmgp_Form_Num_Val($this->factor_, $this->field_config['factor_']['symbol_grp'], $this->field_config['factor_']['symbol_dec'], "2", "S", $this->field_config['factor_']['format_neg'], "", "", "-", $this->field_config['factor_']['symbol_fmt']) ; 
      }
      if ('' !== $this->iva_ || (!empty($format_fields) && isset($format_fields['iva_'])))
      {
          nmgp_Form_Num_Val($this->iva_, $this->field_config['iva_']['symbol_grp'], $this->field_config['iva_']['symbol_dec'], "0", "S", $this->field_config['iva_']['format_neg'], "", "", "-", $this->field_config['iva_']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['iva_']['symbol_mon'];
          $this->sc_add_currency($this->iva_, $sMonSymb, $this->field_config['iva_']['format_pos']); 
      }
      if ('' !== $this->costop_ || (!empty($format_fields) && isset($format_fields['costop_'])))
      {
          nmgp_Form_Num_Val($this->costop_, $this->field_config['costop_']['symbol_grp'], $this->field_config['costop_']['symbol_dec'], "0", "S", $this->field_config['costop_']['format_neg'], "", "", "-", $this->field_config['costop_']['symbol_fmt']) ; 
      }
      if ((!empty($this->fech_) && 'null' != $this->fech_) || (!empty($format_fields) && isset($format_fields['fech_'])))
      {
          nm_volta_data($this->fech_, $this->field_config['fech_']['date_format']) ; 
          nmgp_Form_Datas($this->fech_, $this->field_config['fech_']['date_format'], $this->field_config['fech_']['date_sep']) ;  
      }
      elseif ('null' == $this->fech_ || '' == $this->fech_)
      {
          $this->fech_ = '';
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
      if ($this->fech_ != "")  
      {
     nm_conv_form_data($this->fech_, $this->field_config['fech_']['date_format'], "AAAAMMDD", array($this->field_config['fech_']['date_sep'])) ;  
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
              $this->NM_ajax_info['fldList']['iddet_']['keyVal'] = detalleventa_devoluciones_pack_protect_string($this->nmgp_dados_form['iddet_']);
              $this->NM_ajax_info['fldList']['iddev_']['keyVal'] = detalleventa_devoluciones_pack_protect_string($this->nmgp_dados_form['iddev_']);
          }
   } // ajax_return_values
   function ajax_return_values_all_vert()
   {
          if (isset($this->nmgp_refresh_fields) && isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_detalleventa_devoluciones[$this->nmgp_refresh_row] = $this->NM_ajax_info['param'];
              if ((isset($this->Embutida_ronly) && $this->Embutida_ronly) || $this->NM_ajax_force_values)
              {
                  if (isset($this->NM_ajax_changed['idpro_']) && $this->NM_ajax_changed['idpro_'])
                  {
                      $this->form_vert_detalleventa_devoluciones[$this->nmgp_refresh_row]['idpro_'] = $this->idpro_;
                  }
                  if (isset($this->NM_ajax_changed['colores_']) && $this->NM_ajax_changed['colores_'])
                  {
                      $this->form_vert_detalleventa_devoluciones[$this->nmgp_refresh_row]['colores_'] = $this->colores_;
                  }
                  if (isset($this->NM_ajax_changed['tallas_']) && $this->NM_ajax_changed['tallas_'])
                  {
                      $this->form_vert_detalleventa_devoluciones[$this->nmgp_refresh_row]['tallas_'] = $this->tallas_;
                  }
                  if (isset($this->NM_ajax_changed['sabor_']) && $this->NM_ajax_changed['sabor_'])
                  {
                      $this->form_vert_detalleventa_devoluciones[$this->nmgp_refresh_row]['sabor_'] = $this->sabor_;
                  }
                  if (isset($this->NM_ajax_changed['idbod_']) && $this->NM_ajax_changed['idbod_'])
                  {
                      $this->form_vert_detalleventa_devoluciones[$this->nmgp_refresh_row]['idbod_'] = $this->idbod_;
                  }
                  if (isset($this->NM_ajax_changed['unidadmayor_']) && $this->NM_ajax_changed['unidadmayor_'])
                  {
                      $this->form_vert_detalleventa_devoluciones[$this->nmgp_refresh_row]['unidadmayor_'] = $this->unidadmayor_;
                  }
                  if (isset($this->NM_ajax_changed['stockubica_']) && $this->NM_ajax_changed['stockubica_'])
                  {
                      $this->form_vert_detalleventa_devoluciones[$this->nmgp_refresh_row]['stockubica_'] = $this->stockubica_;
                  }
                  if (isset($this->NM_ajax_changed['unidad_']) && $this->NM_ajax_changed['unidad_'])
                  {
                      $this->form_vert_detalleventa_devoluciones[$this->nmgp_refresh_row]['unidad_'] = $this->unidad_;
                  }
                  if (isset($this->NM_ajax_changed['cantidad_']) && $this->NM_ajax_changed['cantidad_'])
                  {
                      $this->form_vert_detalleventa_devoluciones[$this->nmgp_refresh_row]['cantidad_'] = $this->cantidad_;
                  }
                  if (isset($this->NM_ajax_changed['valorunit_']) && $this->NM_ajax_changed['valorunit_'])
                  {
                      $this->form_vert_detalleventa_devoluciones[$this->nmgp_refresh_row]['valorunit_'] = $this->valorunit_;
                  }
                  if (isset($this->NM_ajax_changed['valorpar_']) && $this->NM_ajax_changed['valorpar_'])
                  {
                      $this->form_vert_detalleventa_devoluciones[$this->nmgp_refresh_row]['valorpar_'] = $this->valorpar_;
                  }
                  if (isset($this->NM_ajax_changed['descuento_']) && $this->NM_ajax_changed['descuento_'])
                  {
                      $this->form_vert_detalleventa_devoluciones[$this->nmgp_refresh_row]['descuento_'] = $this->descuento_;
                  }
                  if (isset($this->NM_ajax_changed['adicional_']) && $this->NM_ajax_changed['adicional_'])
                  {
                      $this->form_vert_detalleventa_devoluciones[$this->nmgp_refresh_row]['adicional_'] = $this->adicional_;
                  }
                  if (isset($this->NM_ajax_changed['adicional1_']) && $this->NM_ajax_changed['adicional1_'])
                  {
                      $this->form_vert_detalleventa_devoluciones[$this->nmgp_refresh_row]['adicional1_'] = $this->adicional1_;
                  }
                  if (isset($this->NM_ajax_changed['factor_']) && $this->NM_ajax_changed['factor_'])
                  {
                      $this->form_vert_detalleventa_devoluciones[$this->nmgp_refresh_row]['factor_'] = $this->factor_;
                  }
                  if (isset($this->NM_ajax_changed['iva_']) && $this->NM_ajax_changed['iva_'])
                  {
                      $this->form_vert_detalleventa_devoluciones[$this->nmgp_refresh_row]['iva_'] = $this->iva_;
                  }
                  if (isset($this->NM_ajax_changed['costop_']) && $this->NM_ajax_changed['costop_'])
                  {
                      $this->form_vert_detalleventa_devoluciones[$this->nmgp_refresh_row]['costop_'] = $this->costop_;
                  }
                  if (isset($this->NM_ajax_changed['fech_']) && $this->NM_ajax_changed['fech_'])
                  {
                      $this->form_vert_detalleventa_devoluciones[$this->nmgp_refresh_row]['fech_'] = $this->fech_;
                  }
              }
          }
          if (isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_detalleventa_devoluciones[$this->nmgp_refresh_row]['unidadmayor_'] = $this->unidadmayor_;
              $this->form_vert_detalleventa_devoluciones[$this->nmgp_refresh_row]['unidad_'] = $this->unidad_;
          }
          $this->NM_ajax_info['rsSize']            = sizeof($this->form_vert_detalleventa_devoluciones);
          $this->NM_ajax_info['buttonDisplayVert'] = array();
          foreach($this->form_vert_detalleventa_devoluciones as $sc_seq_vert => $aRecData)
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idpro_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idpro_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idpro_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idpro_'] = array(); 
    }

   $old_value_idbod_ = $this->idbod_;
   $old_value_stockubica_ = $this->stockubica_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_adicional_ = $this->adicional_;
   $old_value_adicional1_ = $this->adicional1_;
   $old_value_factor_ = $this->factor_;
   $old_value_iva_ = $this->iva_;
   $old_value_costop_ = $this->costop_;
   $old_value_fech_ = $this->fech_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idbod_ = $this->idbod_;
   $unformatted_value_stockubica_ = $this->stockubica_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_adicional_ = $this->adicional_;
   $unformatted_value_adicional1_ = $this->adicional1_;
   $unformatted_value_factor_ = $this->factor_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_costop_ = $this->costop_;
   $unformatted_value_fech_ = $this->fech_;

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

   $this->idbod_ = $old_value_idbod_;
   $this->stockubica_ = $old_value_stockubica_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->descuento_ = $old_value_descuento_;
   $this->adicional_ = $old_value_adicional_;
   $this->adicional1_ = $old_value_adicional1_;
   $this->factor_ = $old_value_factor_;
   $this->iva_ = $old_value_iva_;
   $this->costop_ = $old_value_costop_;
   $this->fech_ = $old_value_fech_;

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
              $aLookup[] = array(detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idpro_'][] = $rs->fields[0];
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
               'valList' => array($aLookup[0][detalleventa_devoluciones_pack_protect_string($aRecData['idpro_'])]),
              );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("colores_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['colores_']);
                  $this->colores_ = $sTmpValue;
                  $this->nm_clear_val('colores_');
                  $sTmpValue = $this->colores_;
                  $aLookup = array();
if ('autocomp_' != substr($this->NM_ajax_opcao, 0, 9))
{
   $this->idpro_ = $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['idpro_'];
}
if ($this->idpro_ != "")
{ 
   $this->nm_clear_val("idpro_");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_colores_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_colores_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_colores_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_colores_'] = array(); 
    }

   $old_value_idbod_ = $this->idbod_;
   $old_value_stockubica_ = $this->stockubica_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_adicional_ = $this->adicional_;
   $old_value_adicional1_ = $this->adicional1_;
   $old_value_factor_ = $this->factor_;
   $old_value_iva_ = $this->iva_;
   $old_value_costop_ = $this->costop_;
   $old_value_fech_ = $this->fech_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idbod_ = $this->idbod_;
   $unformatted_value_stockubica_ = $this->stockubica_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_adicional_ = $this->adicional_;
   $unformatted_value_adicional1_ = $this->adicional1_;
   $unformatted_value_factor_ = $this->factor_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_costop_ = $this->costop_;
   $unformatted_value_fech_ = $this->fech_;

   $nm_comando = "SELECT f.idcol, c.color FROM colorxproducto f left join colores c on f.idcol=c.idcolores WHERE (idpr=$this->idpro_) AND f.idcol = " . $aRecData['colores_'] . " ORDER BY f.idcol";

   $this->idbod_ = $old_value_idbod_;
   $this->stockubica_ = $old_value_stockubica_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->descuento_ = $old_value_descuento_;
   $this->adicional_ = $old_value_adicional_;
   $this->adicional1_ = $old_value_adicional1_;
   $this->factor_ = $old_value_factor_;
   $this->iva_ = $old_value_iva_;
   $this->costop_ = $old_value_costop_;
   $this->fech_ = $old_value_fech_;

   if ('' != $aRecData['colores_'])
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
              $aLookup[] = array(detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_colores_'][] = $rs->fields[0];
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
} 
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['colores_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select2_ac',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['colores_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['colores_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['colores_' . $sc_seq_vert]['labList'] = $aLabel;
          $this->NM_ajax_info['fldList']['colores_' . $sc_seq_vert . '_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($aLookup[0][detalleventa_devoluciones_pack_protect_string($aRecData['colores_'])]),
              );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tallas_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['tallas_']);
                  $this->tallas_ = $sTmpValue;
                  $this->nm_clear_val('tallas_');
                  $sTmpValue = $this->tallas_;
                  $aLookup = array();
if ('autocomp_' != substr($this->NM_ajax_opcao, 0, 9))
{
   $this->idpro_ = $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['idpro_'];
}
if ($this->idpro_ != "")
{ 
   $this->nm_clear_val("idpro_");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_tallas_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_tallas_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_tallas_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_tallas_'] = array(); 
    }

   $old_value_idbod_ = $this->idbod_;
   $old_value_stockubica_ = $this->stockubica_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_adicional_ = $this->adicional_;
   $old_value_adicional1_ = $this->adicional1_;
   $old_value_factor_ = $this->factor_;
   $old_value_iva_ = $this->iva_;
   $old_value_costop_ = $this->costop_;
   $old_value_fech_ = $this->fech_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idbod_ = $this->idbod_;
   $unformatted_value_stockubica_ = $this->stockubica_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_adicional_ = $this->adicional_;
   $unformatted_value_adicional1_ = $this->adicional1_;
   $unformatted_value_factor_ = $this->factor_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_costop_ = $this->costop_;
   $unformatted_value_fech_ = $this->fech_;

   $nm_comando = "SELECT f.idta, t.tamaño FROM tallaxproducto f left join tallas t on f.idta=t.idtallas WHERE (idpr=$this->idpro_) AND f.idta = " . $aRecData['tallas_'] . " ORDER BY f.idta";

   $this->idbod_ = $old_value_idbod_;
   $this->stockubica_ = $old_value_stockubica_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->descuento_ = $old_value_descuento_;
   $this->adicional_ = $old_value_adicional_;
   $this->adicional1_ = $old_value_adicional1_;
   $this->factor_ = $old_value_factor_;
   $this->iva_ = $old_value_iva_;
   $this->costop_ = $old_value_costop_;
   $this->fech_ = $old_value_fech_;

   if ('' != $aRecData['tallas_'])
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
              $aLookup[] = array(detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_tallas_'][] = $rs->fields[0];
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
} 
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['tallas_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select2_ac',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tallas_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tallas_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tallas_' . $sc_seq_vert]['labList'] = $aLabel;
          $this->NM_ajax_info['fldList']['tallas_' . $sc_seq_vert . '_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($aLookup[0][detalleventa_devoluciones_pack_protect_string($aRecData['tallas_'])]),
              );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sabor_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['sabor_']);
                  $this->sabor_ = $sTmpValue;
                  $this->nm_clear_val('sabor_');
                  $sTmpValue = $this->sabor_;
                  $aLookup = array();
if ('autocomp_' != substr($this->NM_ajax_opcao, 0, 9))
{
   $this->idpro_ = $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['idpro_'];
}
if ($this->idpro_ != "")
{ 
   $this->nm_clear_val("idpro_");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_sabor_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_sabor_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_sabor_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_sabor_'] = array(); 
    }

   $old_value_idbod_ = $this->idbod_;
   $old_value_stockubica_ = $this->stockubica_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_adicional_ = $this->adicional_;
   $old_value_adicional1_ = $this->adicional1_;
   $old_value_factor_ = $this->factor_;
   $old_value_iva_ = $this->iva_;
   $old_value_costop_ = $this->costop_;
   $old_value_fech_ = $this->fech_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idbod_ = $this->idbod_;
   $unformatted_value_stockubica_ = $this->stockubica_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_adicional_ = $this->adicional_;
   $unformatted_value_adicional1_ = $this->adicional1_;
   $unformatted_value_factor_ = $this->factor_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_costop_ = $this->costop_;
   $unformatted_value_fech_ = $this->fech_;

   $nm_comando = "SELECT f.idsa, t.tamaño FROM saborxproducto f left join tallas t on f.idsa=t.idtallas WHERE (idpr=$this->idpro_ and tallasabor='S') AND f.idsa = " . $aRecData['sabor_'] . " ORDER BY f.idsa";

   $this->idbod_ = $old_value_idbod_;
   $this->stockubica_ = $old_value_stockubica_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->descuento_ = $old_value_descuento_;
   $this->adicional_ = $old_value_adicional_;
   $this->adicional1_ = $old_value_adicional1_;
   $this->factor_ = $old_value_factor_;
   $this->iva_ = $old_value_iva_;
   $this->costop_ = $old_value_costop_;
   $this->fech_ = $old_value_fech_;

   if ('' != $aRecData['sabor_'])
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
              $aLookup[] = array(detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_sabor_'][] = $rs->fields[0];
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
} 
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['sabor_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select2_ac',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['sabor_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['sabor_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['sabor_' . $sc_seq_vert]['labList'] = $aLabel;
          $this->NM_ajax_info['fldList']['sabor_' . $sc_seq_vert . '_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($aLookup[0][detalleventa_devoluciones_pack_protect_string($aRecData['sabor_'])]),
              );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idbod_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['idbod_']);
                  $this->idbod_ = $sTmpValue;
                  $this->nm_clear_val('idbod_');
                  $sTmpValue = $this->idbod_;
                  $aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idbod_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idbod_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idbod_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idbod_'] = array(); 
    }

   $old_value_idbod_ = $this->idbod_;
   $old_value_stockubica_ = $this->stockubica_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_adicional_ = $this->adicional_;
   $old_value_adicional1_ = $this->adicional1_;
   $old_value_factor_ = $this->factor_;
   $old_value_iva_ = $this->iva_;
   $old_value_costop_ = $this->costop_;
   $old_value_fech_ = $this->fech_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);

   $this->idbod_ = $aRecData['idbod_'];
   $this->nm_clear_val("idbod_");
   $aRecData['idbod_'] = $this->idbod_;

   $unformatted_value_idbod_ = $this->idbod_;
   $unformatted_value_stockubica_ = $this->stockubica_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_adicional_ = $this->adicional_;
   $unformatted_value_adicional1_ = $this->adicional1_;
   $unformatted_value_factor_ = $this->factor_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_costop_ = $this->costop_;
   $unformatted_value_fech_ = $this->fech_;

   $nm_comando = "SELECT idbodega, bodega FROM bodegas WHERE idbodega = " . $aRecData['idbod_'] . " ORDER BY bodega";

   $this->idbod_ = $old_value_idbod_;
   $this->stockubica_ = $old_value_stockubica_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->descuento_ = $old_value_descuento_;
   $this->adicional_ = $old_value_adicional_;
   $this->adicional1_ = $old_value_adicional1_;
   $this->factor_ = $old_value_factor_;
   $this->iva_ = $old_value_iva_;
   $this->costop_ = $old_value_costop_;
   $this->fech_ = $old_value_fech_;

   if ('' != $aRecData['idbod_'])
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
              $aLookup[] = array(detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idbod_'][] = $rs->fields[0];
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
                  $this->NM_ajax_info['fldList']['idbod_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select2_ac',
                       'valList' => array($sTmpValue),
                       );
          $aLabel     = array();
          $aLabelTemp = array();
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
          $this->NM_ajax_info['fldList']['idbod_' . $sc_seq_vert . '_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($aLookup[0][detalleventa_devoluciones_pack_protect_string($aRecData['idbod_'])]),
              );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("unidadmayor_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['unidadmayor_']);
                  $aLookup = array();
$aLookup[] = array(detalleventa_devoluciones_pack_protect_string('NO') => str_replace('<', '&lt;',detalleventa_devoluciones_pack_protect_string("NO")));
$aLookup[] = array(detalleventa_devoluciones_pack_protect_string('SI') => str_replace('<', '&lt;',detalleventa_devoluciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_unidadmayor_'][] = 'NO';
$_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_unidadmayor_'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"unidadmayor_\"";
          if (isset($this->NM_ajax_info['select_html']['unidadmayor_']) && !empty($this->NM_ajax_info['select_html']['unidadmayor_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['unidadmayor_']) . "\";");
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
                  $this->NM_ajax_info['fldList']['unidadmayor_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['unidadmayor_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['unidadmayor_' . $sc_seq_vert]['valList'][$i] = detalleventa_devoluciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['unidadmayor_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['unidadmayor_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['unidadmayor_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("stockubica_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['stockubica_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['stockubica_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("unidad_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['unidad_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['unidad_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
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
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("descuento_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['descuento_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['descuento_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("adicional_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['adicional_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['adicional_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("adicional1_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['adicional1_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['adicional1_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("factor_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['factor_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['factor_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
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
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("costop_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['costop_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['costop_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fech_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['fech_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['fech_' . $sc_seq_vert] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['upload_dir'][$fieldName][] = $newName;
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
          $_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_adicional1_ = $this->adicional1_;
    $original_adicional_ = $this->adicional_;
    $original_cantidad_ = $this->cantidad_;
    $original_colores_ = $this->colores_;
    $original_descuento_ = $this->descuento_;
    $original_factor_ = $this->factor_;
    $original_idbod_ = $this->idbod_;
    $original_idpro_ = $this->idpro_;
    $original_iva_ = $this->iva_;
    $original_sabor_ = $this->sabor_;
    $original_stockubica_ = $this->stockubica_;
    $original_tallas_ = $this->tallas_;
    $original_unidad_ = $this->unidad_;
    $original_unidadmayor_ = $this->unidadmayor_;
    $original_valorpar_ = $this->valorpar_;
    $original_valorunit_ = $this->valorunit_;
}
if (!isset($this->sc_temp_edit_cantidad)) {$this->sc_temp_edit_cantidad = (isset($_SESSION['edit_cantidad'])) ? $_SESSION['edit_cantidad'] : "";}
if (!isset($this->sc_temp_sw)) {$this->sc_temp_sw = (isset($_SESSION['sw'])) ? $_SESSION['sw'] : "";}
if (!isset($this->sc_temp_par_numfacventa)) {$this->sc_temp_par_numfacventa = (isset($_SESSION['par_numfacventa'])) ? $_SESSION['par_numfacventa'] : "";}
  $this->numfac_ =$this->sc_temp_par_numfacventa;
$this->sc_temp_sw=0;
$this->sc_temp_edit_cantidad=0;
$this->ver_stock();
$this->NM_ajax_info['buttonDisplay']['insert'] = $this->nmgp_botoes["insert"] = "off";;
$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;

$this->cantidad_ =$this->cantidad_ -$this->devuelto_ ;
$this->sc_temp_edit_cantidad=$this->cantidad_ ;
$this->calcula_parcial();
$this->calcula_descuento();
$this->calcula_iva();
if (isset($this->sc_temp_par_numfacventa)) { $_SESSION['par_numfacventa'] = $this->sc_temp_par_numfacventa;}
if (isset($this->sc_temp_sw)) { $_SESSION['sw'] = $this->sc_temp_sw;}
if (isset($this->sc_temp_edit_cantidad)) { $_SESSION['edit_cantidad'] = $this->sc_temp_edit_cantidad;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_adicional1_ != $this->adicional1_ || (isset($bFlagRead_adicional1_) && $bFlagRead_adicional1_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['adicional1_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['adicional1_' . $this->nmgp_refresh_row]['valList'] = array($this->adicional1_);
        $this->NM_ajax_changed['adicional1_'] = true;
    }
    if (($original_adicional_ != $this->adicional_ || (isset($bFlagRead_adicional_) && $bFlagRead_adicional_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['adicional_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['adicional_' . $this->nmgp_refresh_row]['valList'] = array($this->adicional_);
        $this->NM_ajax_changed['adicional_'] = true;
    }
    if (($original_cantidad_ != $this->cantidad_ || (isset($bFlagRead_cantidad_) && $bFlagRead_cantidad_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['cantidad_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['cantidad_' . $this->nmgp_refresh_row]['valList'] = array($this->cantidad_);
        $this->NM_ajax_changed['cantidad_'] = true;
    }
    if (($original_colores_ != $this->colores_ || (isset($bFlagRead_colores_) && $bFlagRead_colores_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['colores_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['colores_' . $this->nmgp_refresh_row]['valList'] = array($this->colores_);
        $this->NM_ajax_changed['colores_'] = true;
    }
    if (($original_descuento_ != $this->descuento_ || (isset($bFlagRead_descuento_) && $bFlagRead_descuento_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['descuento_' . $this->nmgp_refresh_row]['type']    = 'label';
        $this->NM_ajax_info['fldList']['descuento_' . $this->nmgp_refresh_row]['valList'] = array($this->descuento_);
        $this->NM_ajax_changed['descuento_'] = true;
    }
    if (($original_factor_ != $this->factor_ || (isset($bFlagRead_factor_) && $bFlagRead_factor_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['factor_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['factor_' . $this->nmgp_refresh_row]['valList'] = array($this->factor_);
        $this->NM_ajax_changed['factor_'] = true;
    }
    if (($original_idbod_ != $this->idbod_ || (isset($bFlagRead_idbod_) && $bFlagRead_idbod_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['idbod_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['idbod_' . $this->nmgp_refresh_row]['valList'] = array($this->idbod_);
        $this->NM_ajax_changed['idbod_'] = true;
    }
    if (($original_idpro_ != $this->idpro_ || (isset($bFlagRead_idpro_) && $bFlagRead_idpro_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['idpro_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['idpro_' . $this->nmgp_refresh_row]['valList'] = array($this->idpro_);
        $this->NM_ajax_changed['idpro_'] = true;
    }
    if (($original_iva_ != $this->iva_ || (isset($bFlagRead_iva_) && $bFlagRead_iva_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['iva_' . $this->nmgp_refresh_row]['type']    = 'label';
        $this->NM_ajax_info['fldList']['iva_' . $this->nmgp_refresh_row]['valList'] = array($this->iva_);
        $this->NM_ajax_changed['iva_'] = true;
    }
    if (($original_sabor_ != $this->sabor_ || (isset($bFlagRead_sabor_) && $bFlagRead_sabor_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['sabor_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['sabor_' . $this->nmgp_refresh_row]['valList'] = array($this->sabor_);
        $this->NM_ajax_changed['sabor_'] = true;
    }
    if (($original_stockubica_ != $this->stockubica_ || (isset($bFlagRead_stockubica_) && $bFlagRead_stockubica_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['stockubica_' . $this->nmgp_refresh_row]['type']    = 'label';
        $this->NM_ajax_info['fldList']['stockubica_' . $this->nmgp_refresh_row]['valList'] = array($this->stockubica_);
        $this->NM_ajax_changed['stockubica_'] = true;
    }
    if (($original_tallas_ != $this->tallas_ || (isset($bFlagRead_tallas_) && $bFlagRead_tallas_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['tallas_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['tallas_' . $this->nmgp_refresh_row]['valList'] = array($this->tallas_);
        $this->NM_ajax_changed['tallas_'] = true;
    }
    if (($original_unidad_ != $this->unidad_ || (isset($bFlagRead_unidad_) && $bFlagRead_unidad_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['unidad_' . $this->nmgp_refresh_row]['type']    = 'label';
        $this->NM_ajax_info['fldList']['unidad_' . $this->nmgp_refresh_row]['valList'] = array($this->unidad_);
        $this->NM_ajax_changed['unidad_'] = true;
    }
    if (($original_unidadmayor_ != $this->unidadmayor_ || (isset($bFlagRead_unidadmayor_) && $bFlagRead_unidadmayor_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['unidadmayor_' . $this->nmgp_refresh_row]['type']    = 'select';
        $this->NM_ajax_info['fldList']['unidadmayor_' . $this->nmgp_refresh_row]['valList'] = array($this->unidadmayor_);
        $this->NM_ajax_changed['unidadmayor_'] = true;
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
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off'; 
          }
  }
  function nm_proc_onload($bFormat = true)
  {
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_colores_ = $this->colores_;
    $original_factor_ = $this->factor_;
    $original_idbod_ = $this->idbod_;
    $original_idpro_ = $this->idpro_;
    $original_sabor_ = $this->sabor_;
    $original_stockubica_ = $this->stockubica_;
    $original_tallas_ = $this->tallas_;
    $original_unidad_ = $this->unidad_;
    $original_unidadmayor_ = $this->unidadmayor_;
}
if (!isset($this->sc_temp_sw)) {$this->sc_temp_sw = (isset($_SESSION['sw'])) ? $_SESSION['sw'] : "";}
if (!isset($this->sc_temp_edit_cantidad)) {$this->sc_temp_edit_cantidad = (isset($_SESSION['edit_cantidad'])) ? $_SESSION['edit_cantidad'] : "";}
  $this->ver_stock();
$this->sc_temp_edit_cantidad=0;
$this->sc_temp_sw=0;
$this->NM_ajax_info['buttonDisplay']['insert'] = $this->nmgp_botoes["insert"] = "off";;
$this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes["exit"] = "off";;
$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "on";;
$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;
if (isset($this->sc_temp_edit_cantidad)) { $_SESSION['edit_cantidad'] = $this->sc_temp_edit_cantidad;}
if (isset($this->sc_temp_sw)) { $_SESSION['sw'] = $this->sc_temp_sw;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_colores_ != $this->colores_ || (isset($bFlagRead_colores_) && $bFlagRead_colores_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['colores_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['colores_' . $this->nmgp_refresh_row]['valList'] = array($this->colores_);
        $this->NM_ajax_changed['colores_'] = true;
    }
    if (($original_factor_ != $this->factor_ || (isset($bFlagRead_factor_) && $bFlagRead_factor_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['factor_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['factor_' . $this->nmgp_refresh_row]['valList'] = array($this->factor_);
        $this->NM_ajax_changed['factor_'] = true;
    }
    if (($original_idbod_ != $this->idbod_ || (isset($bFlagRead_idbod_) && $bFlagRead_idbod_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['idbod_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['idbod_' . $this->nmgp_refresh_row]['valList'] = array($this->idbod_);
        $this->NM_ajax_changed['idbod_'] = true;
    }
    if (($original_idpro_ != $this->idpro_ || (isset($bFlagRead_idpro_) && $bFlagRead_idpro_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['idpro_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['idpro_' . $this->nmgp_refresh_row]['valList'] = array($this->idpro_);
        $this->NM_ajax_changed['idpro_'] = true;
    }
    if (($original_sabor_ != $this->sabor_ || (isset($bFlagRead_sabor_) && $bFlagRead_sabor_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['sabor_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['sabor_' . $this->nmgp_refresh_row]['valList'] = array($this->sabor_);
        $this->NM_ajax_changed['sabor_'] = true;
    }
    if (($original_stockubica_ != $this->stockubica_ || (isset($bFlagRead_stockubica_) && $bFlagRead_stockubica_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['stockubica_' . $this->nmgp_refresh_row]['type']    = 'label';
        $this->NM_ajax_info['fldList']['stockubica_' . $this->nmgp_refresh_row]['valList'] = array($this->stockubica_);
        $this->NM_ajax_changed['stockubica_'] = true;
    }
    if (($original_tallas_ != $this->tallas_ || (isset($bFlagRead_tallas_) && $bFlagRead_tallas_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['tallas_' . $this->nmgp_refresh_row]['type']    = 'text';
        $this->NM_ajax_info['fldList']['tallas_' . $this->nmgp_refresh_row]['valList'] = array($this->tallas_);
        $this->NM_ajax_changed['tallas_'] = true;
    }
    if (($original_unidad_ != $this->unidad_ || (isset($bFlagRead_unidad_) && $bFlagRead_unidad_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['unidad_' . $this->nmgp_refresh_row]['type']    = 'label';
        $this->NM_ajax_info['fldList']['unidad_' . $this->nmgp_refresh_row]['valList'] = array($this->unidad_);
        $this->NM_ajax_changed['unidad_'] = true;
    }
    if (($original_unidadmayor_ != $this->unidadmayor_ || (isset($bFlagRead_unidadmayor_) && $bFlagRead_unidadmayor_))&& isset($this->nmgp_refresh_row))
    {
        $this->NM_ajax_info['fldList']['unidadmayor_' . $this->nmgp_refresh_row]['type']    = 'select';
        $this->NM_ajax_info['fldList']['unidadmayor_' . $this->nmgp_refresh_row]['valList'] = array($this->unidadmayor_);
        $this->NM_ajax_changed['unidadmayor_'] = true;
    }
}
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off'; 
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
      $this->stockubica_ = str_replace($sc_parm1, $sc_parm2, $this->stockubica_); 
      $this->cantidad_ = str_replace($sc_parm1, $sc_parm2, $this->cantidad_); 
      $this->valorunit_ = str_replace($sc_parm1, $sc_parm2, $this->valorunit_); 
      $this->valorpar_ = str_replace($sc_parm1, $sc_parm2, $this->valorpar_); 
      $this->descuento_ = str_replace($sc_parm1, $sc_parm2, $this->descuento_); 
      $this->factor_ = str_replace($sc_parm1, $sc_parm2, $this->factor_); 
      $this->iva_ = str_replace($sc_parm1, $sc_parm2, $this->iva_); 
      $this->costop_ = str_replace($sc_parm1, $sc_parm2, $this->costop_); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->stockubica_ = "'" . $this->stockubica_ . "'";
      $this->cantidad_ = "'" . $this->cantidad_ . "'";
      $this->valorunit_ = "'" . $this->valorunit_ . "'";
      $this->valorpar_ = "'" . $this->valorpar_ . "'";
      $this->descuento_ = "'" . $this->descuento_ . "'";
      $this->factor_ = "'" . $this->factor_ . "'";
      $this->iva_ = "'" . $this->iva_ . "'";
      $this->costop_ = "'" . $this->costop_ . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->stockubica_ = str_replace("'", "", $this->stockubica_); 
      $this->cantidad_ = str_replace("'", "", $this->cantidad_); 
      $this->valorunit_ = str_replace("'", "", $this->valorunit_); 
      $this->valorpar_ = str_replace("'", "", $this->valorpar_); 
      $this->descuento_ = str_replace("'", "", $this->descuento_); 
      $this->factor_ = str_replace("'", "", $this->factor_); 
      $this->iva_ = str_replace("'", "", $this->iva_); 
      $this->costop_ = str_replace("'", "", $this->costop_); 
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
    if ("alterar" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'on';
  

$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off'; 
    }
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'on';
  

$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          return;
      }
      if ($this->nmgp_opcao == "alterar")
      {
          $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert];
          if ($this->nmgp_dados_select['idpro_'] == $this->idpro_ &&
              $this->nmgp_dados_select['colores_'] == $this->colores_ &&
              $this->nmgp_dados_select['tallas_'] == $this->tallas_ &&
              $this->nmgp_dados_select['sabor_'] == $this->sabor_ &&
              $this->nmgp_dados_select['idbod_'] == $this->idbod_ &&
              $this->nmgp_dados_select['unidadmayor_'] == $this->unidadmayor_ &&
              $this->nmgp_dados_select['cantidad_'] == $this->cantidad_ &&
              $this->nmgp_dados_select['valorunit_'] == $this->valorunit_ &&
              $this->nmgp_dados_select['valorpar_'] == $this->valorpar_ &&
              $this->nmgp_dados_select['descuento_'] == $this->descuento_ &&
              $this->nmgp_dados_select['adicional_'] == $this->adicional_ &&
              $this->nmgp_dados_select['adicional1_'] == $this->adicional1_ &&
              $this->nmgp_dados_select['factor_'] == $this->factor_ &&
              $this->nmgp_dados_select['iva_'] == $this->iva_ &&
              $this->nmgp_dados_select['costop_'] == $this->costop_)
          { }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['idpro_'] = $this->idpro_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['colores_'] = $this->colores_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['tallas_'] = $this->tallas_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['sabor_'] = $this->sabor_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['idbod_'] = $this->idbod_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['unidadmayor_'] = $this->unidadmayor_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['cantidad_'] = $this->cantidad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['valorunit_'] = $this->valorunit_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['valorpar_'] = $this->valorpar_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['descuento_'] = $this->descuento_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['adicional_'] = $this->adicional_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['adicional1_'] = $this->adicional1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['factor_'] = $this->factor_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['iva_'] = $this->iva_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['costop_'] = $this->costop_;
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
      $NM_val_form['idpro_'] = $this->idpro_;
      $NM_val_form['colores_'] = $this->colores_;
      $NM_val_form['tallas_'] = $this->tallas_;
      $NM_val_form['sabor_'] = $this->sabor_;
      $NM_val_form['idbod_'] = $this->idbod_;
      $NM_val_form['unidadmayor_'] = $this->unidadmayor_;
      $NM_val_form['stockubica_'] = $this->stockubica_;
      $NM_val_form['unidad_'] = $this->unidad_;
      $NM_val_form['cantidad_'] = $this->cantidad_;
      $NM_val_form['valorunit_'] = $this->valorunit_;
      $NM_val_form['valorpar_'] = $this->valorpar_;
      $NM_val_form['descuento_'] = $this->descuento_;
      $NM_val_form['adicional_'] = $this->adicional_;
      $NM_val_form['adicional1_'] = $this->adicional1_;
      $NM_val_form['factor_'] = $this->factor_;
      $NM_val_form['iva_'] = $this->iva_;
      $NM_val_form['costop_'] = $this->costop_;
      $NM_val_form['fech_'] = $this->fech_;
      $NM_val_form['iddet_'] = $this->iddet_;
      $NM_val_form['numfac_'] = $this->numfac_;
      $NM_val_form['remision_'] = $this->remision_;
      $NM_val_form['devuelto_'] = $this->devuelto_;
      $NM_val_form['iddev_'] = $this->iddev_;
      $NM_val_form['procesado_'] = $this->procesado_;
      if ($this->iddet_ === "" || is_null($this->iddet_))  
      { 
          $this->iddet_ = 0;
      } 
      if ($this->numfac_ === "" || is_null($this->numfac_))  
      { 
          $this->numfac_ = 0;
          $this->sc_force_zero[] = 'numfac_';
      } 
      if ($this->remision_ === "" || is_null($this->remision_))  
      { 
          $this->remision_ = 0;
          $this->sc_force_zero[] = 'remision_';
      } 
      if ($this->idpro_ === "" || is_null($this->idpro_))  
      { 
          $this->idpro_ = 0;
          $this->sc_force_zero[] = 'idpro_';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->factor_ === "" || is_null($this->factor_))  
      { 
          $this->factor_ = 0;
          $this->sc_force_zero[] = 'factor_';
      } 
      }
      if ($this->idbod_ === "" || is_null($this->idbod_))  
      { 
          $this->idbod_ = 0;
          $this->sc_force_zero[] = 'idbod_';
      } 
      if ($this->costop_ === "" || is_null($this->costop_))  
      { 
          $this->costop_ = 0;
          $this->sc_force_zero[] = 'costop_';
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
      if ($this->adicional_ === "" || is_null($this->adicional_))  
      { 
          $this->adicional_ = 0;
          $this->sc_force_zero[] = 'adicional_';
      } 
      if ($this->adicional1_ === "" || is_null($this->adicional1_))  
      { 
          $this->adicional1_ = 0;
          $this->sc_force_zero[] = 'adicional1_';
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
      if ($this->iddev_ === "" || is_null($this->iddev_))  
      { 
          $this->iddev_ = 0;
      } 
      if ($this->procesado_ === "" || is_null($this->procesado_))  
      { 
          $this->procesado_ = 0;
          $this->sc_force_zero[] = 'procesado_';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->unidadmayor__before_qstr = $this->unidadmayor_;
          $this->unidadmayor_ = substr($this->Db->qstr($this->unidadmayor_), 1, -1); 
          if ($this->unidadmayor_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->unidadmayor_ = "null"; 
              $NM_val_null[] = "unidadmayor_";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 detalleventa_devoluciones_pack_ajax_response();
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
                  $SC_fields_update[] = "idpro = $this->idpro_, unidadmayor = '$this->unidadmayor_', factor = $this->factor_, idbod = $this->idbod_, costop = $this->costop_, cantidad = $this->cantidad_, valorunit = $this->valorunit_, valorpar = $this->valorpar_, iva = $this->iva_, descuento = $this->descuento_, adicional = $this->adicional_, adicional1 = $this->adicional1_, colores = $this->colores_, tallas = $this->tallas_, sabor = $this->sabor_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idpro = $this->idpro_, unidadmayor = '$this->unidadmayor_', factor = $this->factor_, idbod = $this->idbod_, costop = $this->costop_, cantidad = $this->cantidad_, valorunit = $this->valorunit_, valorpar = $this->valorpar_, iva = $this->iva_, descuento = $this->descuento_, adicional = $this->adicional_, adicional1 = $this->adicional1_, colores = $this->colores_, tallas = $this->tallas_, sabor = $this->sabor_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idpro = $this->idpro_, unidadmayor = '$this->unidadmayor_', factor = $this->factor_, idbod = $this->idbod_, costop = $this->costop_, cantidad = $this->cantidad_, valorunit = $this->valorunit_, valorpar = $this->valorpar_, iva = $this->iva_, descuento = $this->descuento_, adicional = $this->adicional_, adicional1 = $this->adicional1_, colores = $this->colores_, tallas = $this->tallas_, sabor = $this->sabor_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idpro = $this->idpro_, unidadmayor = '$this->unidadmayor_', factor = $this->factor_, idbod = $this->idbod_, costop = $this->costop_, cantidad = $this->cantidad_, valorunit = $this->valorunit_, valorpar = $this->valorpar_, iva = $this->iva_, descuento = $this->descuento_, adicional = $this->adicional_, adicional1 = $this->adicional1_, colores = $this->colores_, tallas = $this->tallas_, sabor = $this->sabor_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idpro = $this->idpro_, unidadmayor = '$this->unidadmayor_', factor = $this->factor_, idbod = $this->idbod_, costop = $this->costop_, cantidad = $this->cantidad_, valorunit = $this->valorunit_, valorpar = $this->valorpar_, iva = $this->iva_, descuento = $this->descuento_, adicional = $this->adicional_, adicional1 = $this->adicional1_, colores = $this->colores_, tallas = $this->tallas_, sabor = $this->sabor_"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idpro = $this->idpro_, unidadmayor = '$this->unidadmayor_', factor = $this->factor_, idbod = $this->idbod_, costop = $this->costop_, cantidad = $this->cantidad_, valorunit = $this->valorunit_, valorpar = $this->valorpar_, iva = $this->iva_, descuento = $this->descuento_, adicional = $this->adicional_, adicional1 = $this->adicional1_, colores = $this->colores_, tallas = $this->tallas_, sabor = $this->sabor_"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idpro = $this->idpro_, unidadmayor = '$this->unidadmayor_', factor = $this->factor_, idbod = $this->idbod_, costop = $this->costop_, cantidad = $this->cantidad_, valorunit = $this->valorunit_, valorpar = $this->valorpar_, iva = $this->iva_, descuento = $this->descuento_, adicional = $this->adicional_, adicional1 = $this->adicional1_, colores = $this->colores_, tallas = $this->tallas_, sabor = $this->sabor_"; 
              } 
              if (isset($NM_val_form['numfac_']) && $NM_val_form['numfac_'] != $this->nmgp_dados_select['numfac_']) 
              { 
                  $SC_fields_update[] = "numfac = $this->numfac_"; 
              } 
              if (isset($NM_val_form['remision_']) && $NM_val_form['remision_'] != $this->nmgp_dados_select['remision_']) 
              { 
                  $SC_fields_update[] = "remision = $this->remision_"; 
              } 
              if (isset($NM_val_form['devuelto_']) && $NM_val_form['devuelto_'] != $this->nmgp_dados_select['devuelto_']) 
              { 
                  $SC_fields_update[] = "devuelto = $this->devuelto_"; 
              } 
              if (isset($NM_val_form['procesado_']) && $NM_val_form['procesado_'] != $this->nmgp_dados_select['procesado_']) 
              { 
                  $SC_fields_update[] = "procesado = $this->procesado_"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE iddet = $this->iddet_ and iddev = $this->iddev_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE iddet = $this->iddet_ and iddev = $this->iddev_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE iddet = $this->iddet_ and iddev = $this->iddev_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE iddet = $this->iddet_ and iddev = $this->iddev_ ";  
              }  
              else  
              {
                  $comando .= " WHERE iddet = $this->iddet_ and iddev = $this->iddev_ ";  
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
                                  detalleventa_devoluciones_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->unidadmayor_ = $this->unidadmayor__before_qstr;
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
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 

              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }

              $this->sc_teve_alt = true; 
              if     (isset($NM_val_form) && isset($NM_val_form['idpro_'])) { $this->idpro_ = $NM_val_form['idpro_']; }
              elseif (isset($this->idpro_)) { $this->nm_limpa_alfa($this->idpro_); }
              if     (isset($NM_val_form) && isset($NM_val_form['unidadmayor_'])) { $this->unidadmayor_ = $NM_val_form['unidadmayor_']; }
              elseif (isset($this->unidadmayor_)) { $this->nm_limpa_alfa($this->unidadmayor_); }
              if     (isset($NM_val_form) && isset($NM_val_form['factor_'])) { $this->factor_ = $NM_val_form['factor_']; }
              elseif (isset($this->factor_)) { $this->nm_limpa_alfa($this->factor_); }
              if     (isset($NM_val_form) && isset($NM_val_form['idbod_'])) { $this->idbod_ = $NM_val_form['idbod_']; }
              elseif (isset($this->idbod_)) { $this->nm_limpa_alfa($this->idbod_); }
              if     (isset($NM_val_form) && isset($NM_val_form['costop_'])) { $this->costop_ = $NM_val_form['costop_']; }
              elseif (isset($this->costop_)) { $this->nm_limpa_alfa($this->costop_); }
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
              if     (isset($NM_val_form) && isset($NM_val_form['adicional_'])) { $this->adicional_ = $NM_val_form['adicional_']; }
              elseif (isset($this->adicional_)) { $this->nm_limpa_alfa($this->adicional_); }
              if     (isset($NM_val_form) && isset($NM_val_form['adicional1_'])) { $this->adicional1_ = $NM_val_form['adicional1_']; }
              elseif (isset($this->adicional1_)) { $this->nm_limpa_alfa($this->adicional1_); }
              if     (isset($NM_val_form) && isset($NM_val_form['colores_'])) { $this->colores_ = $NM_val_form['colores_']; }
              elseif (isset($this->colores_)) { $this->nm_limpa_alfa($this->colores_); }
              if     (isset($NM_val_form) && isset($NM_val_form['tallas_'])) { $this->tallas_ = $NM_val_form['tallas_']; }
              elseif (isset($this->tallas_)) { $this->nm_limpa_alfa($this->tallas_); }
              if     (isset($NM_val_form) && isset($NM_val_form['sabor_'])) { $this->sabor_ = $NM_val_form['sabor_']; }
              elseif (isset($this->sabor_)) { $this->nm_limpa_alfa($this->sabor_); }
              $this->nm_proc_onload_record($this->nmgp_refresh_row);

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('idpro_', 'colores_', 'tallas_', 'sabor_', 'idbod_', 'unidadmayor_', 'stockubica_', 'unidad_', 'cantidad_', 'valorunit_', 'valorpar_', 'descuento_', 'adicional_', 'adicional1_', 'factor_', 'iva_', 'costop_', 'fech_'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
              {

                  $this->NM_ajax_info['readOnly']['idpro_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['colores_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['tallas_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['sabor_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['idbod_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['unidadmayor_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['stockubica_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['unidad_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['cantidad_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['valorunit_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['valorpar_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['descuento_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['adicional_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['adicional1_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['factor_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['iva_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['costop_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['fech_' . $this->nmgp_refresh_row] = 'on';


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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "iddet, ";
          } 
          $bInsertOk = true;
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "); 
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
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->factor_ != "")
                  { 
                       $compl_insert     .= ", factor";
                       $compl_insert_val .= ", $this->factor_";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (numfac, remision, idpro, unidadmayor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, iddev, procesado $compl_insert) VALUES ($this->numfac_, $this->remision_, $this->idpro_, '$this->unidadmayor_', $this->idbod_, $this->costop_, $this->cantidad_, $this->valorunit_, $this->valorpar_, $this->iva_, $this->descuento_, $this->adicional_, $this->adicional1_, $this->devuelto_, $this->colores_, $this->tallas_, $this->sabor_, $this->iddev_, $this->procesado_ $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->factor_ != "")
                  { 
                       $compl_insert     .= ", factor";
                       $compl_insert_val .= ", $this->factor_";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfac, remision, idpro, unidadmayor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, iddev, procesado $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfac_, $this->remision_, $this->idpro_, '$this->unidadmayor_', $this->idbod_, $this->costop_, $this->cantidad_, $this->valorunit_, $this->valorpar_, $this->iva_, $this->descuento_, $this->adicional_, $this->adicional1_, $this->devuelto_, $this->colores_, $this->tallas_, $this->sabor_, $this->iddev_, $this->procesado_ $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->factor_ != "")
                  { 
                       $compl_insert     .= ", factor";
                       $compl_insert_val .= ", $this->factor_";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfac, remision, idpro, unidadmayor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, iddev, procesado $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfac_, $this->remision_, $this->idpro_, '$this->unidadmayor_', $this->idbod_, $this->costop_, $this->cantidad_, $this->valorunit_, $this->valorpar_, $this->iva_, $this->descuento_, $this->adicional_, $this->adicional1_, $this->devuelto_, $this->colores_, $this->tallas_, $this->sabor_, $this->iddev_, $this->procesado_ $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->factor_ != "")
                  { 
                       $compl_insert     .= ", factor";
                       $compl_insert_val .= ", $this->factor_";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfac, remision, idpro, unidadmayor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, iddev, procesado $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfac_, $this->remision_, $this->idpro_, '$this->unidadmayor_', $this->idbod_, $this->costop_, $this->cantidad_, $this->valorunit_, $this->valorpar_, $this->iva_, $this->descuento_, $this->adicional_, $this->adicional1_, $this->devuelto_, $this->colores_, $this->tallas_, $this->sabor_, $this->iddev_, $this->procesado_ $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->factor_ != "")
                  { 
                       $compl_insert     .= ", factor";
                       $compl_insert_val .= ", $this->factor_";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfac, remision, idpro, unidadmayor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, iddev, procesado $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfac_, $this->remision_, $this->idpro_, '$this->unidadmayor_', $this->idbod_, $this->costop_, $this->cantidad_, $this->valorunit_, $this->valorpar_, $this->iva_, $this->descuento_, $this->adicional_, $this->adicional1_, $this->devuelto_, $this->colores_, $this->tallas_, $this->sabor_, $this->iddev_, $this->procesado_ $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->factor_ != "")
                  { 
                       $compl_insert     .= ", factor";
                       $compl_insert_val .= ", $this->factor_";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfac, remision, idpro, unidadmayor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, iddev, procesado $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfac_, $this->remision_, $this->idpro_, '$this->unidadmayor_', $this->idbod_, $this->costop_, $this->cantidad_, $this->valorunit_, $this->valorpar_, $this->iva_, $this->descuento_, $this->adicional_, $this->adicional1_, $this->devuelto_, $this->colores_, $this->tallas_, $this->sabor_, $this->iddev_, $this->procesado_ $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->factor_ != "")
                  { 
                       $compl_insert     .= ", factor";
                       $compl_insert_val .= ", $this->factor_";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfac, remision, idpro, unidadmayor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, iddev, procesado $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfac_, $this->remision_, $this->idpro_, '$this->unidadmayor_', $this->idbod_, $this->costop_, $this->cantidad_, $this->valorunit_, $this->valorpar_, $this->iva_, $this->descuento_, $this->adicional_, $this->adicional1_, $this->devuelto_, $this->colores_, $this->tallas_, $this->sabor_, $this->iddev_, $this->procesado_ $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->factor_ != "")
                  { 
                       $compl_insert     .= ", factor";
                       $compl_insert_val .= ", $this->factor_";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfac, remision, idpro, unidadmayor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, iddev, procesado $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfac_, $this->remision_, $this->idpro_, '$this->unidadmayor_', $this->idbod_, $this->costop_, $this->cantidad_, $this->valorunit_, $this->valorpar_, $this->iva_, $this->descuento_, $this->adicional_, $this->adicional1_, $this->devuelto_, $this->colores_, $this->tallas_, $this->sabor_, $this->iddev_, $this->procesado_ $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->factor_ != "")
                  { 
                       $compl_insert     .= ", factor";
                       $compl_insert_val .= ", $this->factor_";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "numfac, remision, idpro, unidadmayor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, iddev, procesado $compl_insert) VALUES (" . $NM_seq_auto . "$this->numfac_, $this->remision_, $this->idpro_, '$this->unidadmayor_', $this->idbod_, $this->costop_, $this->cantidad_, $this->valorunit_, $this->valorpar_, $this->iva_, $this->descuento_, $this->adicional_, $this->adicional1_, $this->devuelto_, $this->colores_, $this->tallas_, $this->sabor_, $this->iddev_, $this->procesado_ $compl_insert_val)"; 
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
                              detalleventa_devoluciones_pack_ajax_response();
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
                          detalleventa_devoluciones_pack_ajax_response();
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
              $this->unidadmayor_ = $this->unidadmayor__before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['db_changed'] = true;

              $this->sc_evento = "insert"; 
              $this->unidadmayor_ = $this->unidadmayor__before_qstr;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['total']++; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_qtd']++; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_I_E']++; 
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['total'] + 1; 
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              $this->sc_teve_incl = true; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['idpro_'] = $this->idpro_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['colores_'] = $this->colores_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['tallas_'] = $this->tallas_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['sabor_'] = $this->sabor_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['idbod_'] = $this->idbod_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['unidadmayor_'] = $this->unidadmayor_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['cantidad_'] = $this->cantidad_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['valorunit_'] = $this->valorunit_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['valorpar_'] = $this->valorpar_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['descuento_'] = $this->descuento_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['adicional_'] = $this->adicional_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['adicional1_'] = $this->adicional1_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['factor_'] = $this->factor_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['iva_'] = $this->iva_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert]['costop_'] = $this->costop_;
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
              if (isset($this->idpro_)) { $this->nm_limpa_alfa($this->idpro_); }
              if (isset($this->unidadmayor_)) { $this->nm_limpa_alfa($this->unidadmayor_); }
              if (isset($this->factor_)) { $this->nm_limpa_alfa($this->factor_); }
              if (isset($this->idbod_)) { $this->nm_limpa_alfa($this->idbod_); }
              if (isset($this->costop_)) { $this->nm_limpa_alfa($this->costop_); }
              if (isset($this->cantidad_)) { $this->nm_limpa_alfa($this->cantidad_); }
              if (isset($this->valorunit_)) { $this->nm_limpa_alfa($this->valorunit_); }
              if (isset($this->valorpar_)) { $this->nm_limpa_alfa($this->valorpar_); }
              if (isset($this->iva_)) { $this->nm_limpa_alfa($this->iva_); }
              if (isset($this->descuento_)) { $this->nm_limpa_alfa($this->descuento_); }
              if (isset($this->adicional_)) { $this->nm_limpa_alfa($this->adicional_); }
              if (isset($this->adicional1_)) { $this->nm_limpa_alfa($this->adicional1_); }
              if (isset($this->colores_)) { $this->nm_limpa_alfa($this->colores_); }
              if (isset($this->tallas_)) { $this->nm_limpa_alfa($this->tallas_); }
              if (isset($this->sabor_)) { $this->nm_limpa_alfa($this->sabor_); }
              if (isset($this->Embutida_form) && $this->Embutida_form)
              {
                  $this->nm_guardar_campos();
                  $this->nm_proc_onload_record($this->nmgp_refresh_row);
                  $this->nm_formatar_campos();

              $aLookup = array();
              $aRecData['idpro_'] = $this->idpro_;
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idpro_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idpro_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idpro_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idpro_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idpro_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idpro_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idpro_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idpro_'] = array(); 
    }

   $old_value_idbod_ = $this->idbod_;
   $old_value_stockubica_ = $this->stockubica_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_adicional_ = $this->adicional_;
   $old_value_adicional1_ = $this->adicional1_;
   $old_value_factor_ = $this->factor_;
   $old_value_iva_ = $this->iva_;
   $old_value_costop_ = $this->costop_;
   $old_value_fech_ = $this->fech_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idbod_ = $this->idbod_;
   $unformatted_value_stockubica_ = $this->stockubica_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_adicional_ = $this->adicional_;
   $unformatted_value_adicional1_ = $this->adicional1_;
   $unformatted_value_factor_ = $this->factor_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_costop_ = $this->costop_;
   $unformatted_value_fech_ = $this->fech_;

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

   $this->idbod_ = $old_value_idbod_;
   $this->stockubica_ = $old_value_stockubica_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->descuento_ = $old_value_descuento_;
   $this->adicional_ = $old_value_adicional_;
   $this->adicional1_ = $old_value_adicional1_;
   $this->factor_ = $old_value_factor_;
   $this->iva_ = $old_value_iva_;
   $this->costop_ = $old_value_costop_;
   $this->fech_ = $old_value_fech_;

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
              $aLookup[] = array(detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idpro_'][] = $rs->fields[0];
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

              $aLookup = array();
              $aRecData['colores_'] = $this->colores_;
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_colores_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_colores_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_colores_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_colores_'] = array(); 
}
if ($this->idpro_ != "")
{ 
   $this->nm_clear_val("idpro_");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_colores_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_colores_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_colores_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_colores_'] = array(); 
    }

   $old_value_idbod_ = $this->idbod_;
   $old_value_stockubica_ = $this->stockubica_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_adicional_ = $this->adicional_;
   $old_value_adicional1_ = $this->adicional1_;
   $old_value_factor_ = $this->factor_;
   $old_value_iva_ = $this->iva_;
   $old_value_costop_ = $this->costop_;
   $old_value_fech_ = $this->fech_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idbod_ = $this->idbod_;
   $unformatted_value_stockubica_ = $this->stockubica_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_adicional_ = $this->adicional_;
   $unformatted_value_adicional1_ = $this->adicional1_;
   $unformatted_value_factor_ = $this->factor_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_costop_ = $this->costop_;
   $unformatted_value_fech_ = $this->fech_;

   $nm_comando = "SELECT f.idcol, c.color FROM colorxproducto f left join colores c on f.idcol=c.idcolores WHERE (idpr=$this->idpro_) AND f.idcol = " . $aRecData['colores_'] . " ORDER BY f.idcol";

   $this->idbod_ = $old_value_idbod_;
   $this->stockubica_ = $old_value_stockubica_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->descuento_ = $old_value_descuento_;
   $this->adicional_ = $old_value_adicional_;
   $this->adicional1_ = $old_value_adicional1_;
   $this->factor_ = $old_value_factor_;
   $this->iva_ = $old_value_iva_;
   $this->costop_ = $old_value_costop_;
   $this->fech_ = $old_value_fech_;

   if ('' != $aRecData['colores_'])
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
              $aLookup[] = array(detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_colores_'][] = $rs->fields[0];
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
} 
          $val_output = "";
          foreach ($aLookup as $iLookup => $aLookupDados)
          {
              $SV_cmp = $this->colores_;
              $this->nm_clear_val("colores_");
              if (isset($aLookupDados[$this->colores_]))
              {
                  $val_output = $aLookupDados[$this->colores_];
              }
              $this->colores_ = $SV_cmp;
          }
          $this->NM_ajax_info['fldList']['colores__autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          $tmpLabel_colores_ = $val_output;

                  $this->NM_ajax_info['fldList']['colores_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['colores_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->colores_)));
                  $this->NM_ajax_info['fldList']['colores_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_colores_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['colores_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['colores_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['colores_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['colores_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

              $aLookup = array();
              $aRecData['tallas_'] = $this->tallas_;
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_tallas_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_tallas_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_tallas_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_tallas_'] = array(); 
}
if ($this->idpro_ != "")
{ 
   $this->nm_clear_val("idpro_");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_tallas_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_tallas_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_tallas_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_tallas_'] = array(); 
    }

   $old_value_idbod_ = $this->idbod_;
   $old_value_stockubica_ = $this->stockubica_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_adicional_ = $this->adicional_;
   $old_value_adicional1_ = $this->adicional1_;
   $old_value_factor_ = $this->factor_;
   $old_value_iva_ = $this->iva_;
   $old_value_costop_ = $this->costop_;
   $old_value_fech_ = $this->fech_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idbod_ = $this->idbod_;
   $unformatted_value_stockubica_ = $this->stockubica_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_adicional_ = $this->adicional_;
   $unformatted_value_adicional1_ = $this->adicional1_;
   $unformatted_value_factor_ = $this->factor_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_costop_ = $this->costop_;
   $unformatted_value_fech_ = $this->fech_;

   $nm_comando = "SELECT f.idta, t.tamaño FROM tallaxproducto f left join tallas t on f.idta=t.idtallas WHERE (idpr=$this->idpro_) AND f.idta = " . $aRecData['tallas_'] . " ORDER BY f.idta";

   $this->idbod_ = $old_value_idbod_;
   $this->stockubica_ = $old_value_stockubica_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->descuento_ = $old_value_descuento_;
   $this->adicional_ = $old_value_adicional_;
   $this->adicional1_ = $old_value_adicional1_;
   $this->factor_ = $old_value_factor_;
   $this->iva_ = $old_value_iva_;
   $this->costop_ = $old_value_costop_;
   $this->fech_ = $old_value_fech_;

   if ('' != $aRecData['tallas_'])
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
              $aLookup[] = array(detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_tallas_'][] = $rs->fields[0];
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
} 
          $val_output = "";
          foreach ($aLookup as $iLookup => $aLookupDados)
          {
              $SV_cmp = $this->tallas_;
              $this->nm_clear_val("tallas_");
              if (isset($aLookupDados[$this->tallas_]))
              {
                  $val_output = $aLookupDados[$this->tallas_];
              }
              $this->tallas_ = $SV_cmp;
          }
          $this->NM_ajax_info['fldList']['tallas__autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          $tmpLabel_tallas_ = $val_output;

                  $this->NM_ajax_info['fldList']['tallas_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['tallas_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->tallas_)));
                  $this->NM_ajax_info['fldList']['tallas_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_tallas_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tallas_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tallas_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['tallas_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['tallas_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

              $aLookup = array();
              $aRecData['sabor_'] = $this->sabor_;
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_sabor_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_sabor_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_sabor_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_sabor_'] = array(); 
}
if ($this->idpro_ != "")
{ 
   $this->nm_clear_val("idpro_");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_sabor_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_sabor_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_sabor_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_sabor_'] = array(); 
    }

   $old_value_idbod_ = $this->idbod_;
   $old_value_stockubica_ = $this->stockubica_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_adicional_ = $this->adicional_;
   $old_value_adicional1_ = $this->adicional1_;
   $old_value_factor_ = $this->factor_;
   $old_value_iva_ = $this->iva_;
   $old_value_costop_ = $this->costop_;
   $old_value_fech_ = $this->fech_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_idbod_ = $this->idbod_;
   $unformatted_value_stockubica_ = $this->stockubica_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_adicional_ = $this->adicional_;
   $unformatted_value_adicional1_ = $this->adicional1_;
   $unformatted_value_factor_ = $this->factor_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_costop_ = $this->costop_;
   $unformatted_value_fech_ = $this->fech_;

   $nm_comando = "SELECT f.idsa, t.tamaño FROM saborxproducto f left join tallas t on f.idsa=t.idtallas WHERE (idpr=$this->idpro_ and tallasabor='S') AND f.idsa = " . $aRecData['sabor_'] . " ORDER BY f.idsa";

   $this->idbod_ = $old_value_idbod_;
   $this->stockubica_ = $old_value_stockubica_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->descuento_ = $old_value_descuento_;
   $this->adicional_ = $old_value_adicional_;
   $this->adicional1_ = $old_value_adicional1_;
   $this->factor_ = $old_value_factor_;
   $this->iva_ = $old_value_iva_;
   $this->costop_ = $old_value_costop_;
   $this->fech_ = $old_value_fech_;

   if ('' != $aRecData['sabor_'])
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
              $aLookup[] = array(detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_sabor_'][] = $rs->fields[0];
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
} 
          $val_output = "";
          foreach ($aLookup as $iLookup => $aLookupDados)
          {
              $SV_cmp = $this->sabor_;
              $this->nm_clear_val("sabor_");
              if (isset($aLookupDados[$this->sabor_]))
              {
                  $val_output = $aLookupDados[$this->sabor_];
              }
              $this->sabor_ = $SV_cmp;
          }
          $this->NM_ajax_info['fldList']['sabor__autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          $tmpLabel_sabor_ = $val_output;

                  $this->NM_ajax_info['fldList']['sabor_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['sabor_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->sabor_)));
                  $this->NM_ajax_info['fldList']['sabor_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_sabor_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sabor_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sabor_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['sabor_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['sabor_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

              $aLookup = array();
              $aRecData['idbod_'] = $this->idbod_;
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idbod_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idbod_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idbod_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idbod_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idbod_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idbod_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idbod_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idbod_'] = array(); 
    }

   $old_value_idbod_ = $this->idbod_;
   $old_value_stockubica_ = $this->stockubica_;
   $old_value_cantidad_ = $this->cantidad_;
   $old_value_valorunit_ = $this->valorunit_;
   $old_value_valorpar_ = $this->valorpar_;
   $old_value_descuento_ = $this->descuento_;
   $old_value_adicional_ = $this->adicional_;
   $old_value_adicional1_ = $this->adicional1_;
   $old_value_factor_ = $this->factor_;
   $old_value_iva_ = $this->iva_;
   $old_value_costop_ = $this->costop_;
   $old_value_fech_ = $this->fech_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);

   $this->idbod_ = $aRecData['idbod_'];
   $this->nm_clear_val("idbod_");
   $aRecData['idbod_'] = $this->idbod_;

   $unformatted_value_idbod_ = $this->idbod_;
   $unformatted_value_stockubica_ = $this->stockubica_;
   $unformatted_value_cantidad_ = $this->cantidad_;
   $unformatted_value_valorunit_ = $this->valorunit_;
   $unformatted_value_valorpar_ = $this->valorpar_;
   $unformatted_value_descuento_ = $this->descuento_;
   $unformatted_value_adicional_ = $this->adicional_;
   $unformatted_value_adicional1_ = $this->adicional1_;
   $unformatted_value_factor_ = $this->factor_;
   $unformatted_value_iva_ = $this->iva_;
   $unformatted_value_costop_ = $this->costop_;
   $unformatted_value_fech_ = $this->fech_;

   $nm_comando = "SELECT idbodega, bodega FROM bodegas WHERE idbodega = " . $aRecData['idbod_'] . " ORDER BY bodega";

   $this->idbod_ = $old_value_idbod_;
   $this->stockubica_ = $old_value_stockubica_;
   $this->cantidad_ = $old_value_cantidad_;
   $this->valorunit_ = $old_value_valorunit_;
   $this->valorpar_ = $old_value_valorpar_;
   $this->descuento_ = $old_value_descuento_;
   $this->adicional_ = $old_value_adicional_;
   $this->adicional1_ = $old_value_adicional1_;
   $this->factor_ = $old_value_factor_;
   $this->iva_ = $old_value_iva_;
   $this->costop_ = $old_value_costop_;
   $this->fech_ = $old_value_fech_;

   if ('' != $aRecData['idbod_'])
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
              $aLookup[] = array(detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_idbod_'][] = $rs->fields[0];
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
              $SV_cmp = $this->idbod_;
              $this->nm_clear_val("idbod_");
              if (isset($aLookupDados[$this->idbod_]))
              {
                  $val_output = $aLookupDados[$this->idbod_];
              }
              $this->idbod_ = $SV_cmp;
          }
          $this->NM_ajax_info['fldList']['idbod__autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          $tmpLabel_idbod_ = $val_output;

                  $this->NM_ajax_info['fldList']['idbod_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['idbod_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->idbod_)));
                  $this->NM_ajax_info['fldList']['idbod_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_idbod_)));

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

                  $aLookup = array();
$aLookup[] = array(detalleventa_devoluciones_pack_protect_string('NO') => str_replace('<', '&lt;',detalleventa_devoluciones_pack_protect_string("NO")));
$aLookup[] = array(detalleventa_devoluciones_pack_protect_string('SI') => str_replace('<', '&lt;',detalleventa_devoluciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_unidadmayor_'][] = 'NO';
$_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['Lookup_unidadmayor_'][] = 'SI';
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == detalleventa_devoluciones_pack_protect_string(NM_charset_to_utf8($this->unidadmayor_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_unidadmayor_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['unidadmayor_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['unidadmayor_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->unidadmayor_)));
                  $this->NM_ajax_info['fldList']['unidadmayor_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_unidadmayor_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['unidadmayor_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['unidadmayor_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['unidadmayor_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['unidadmayor_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $tmpLabel_stockubica_ = $this->stockubica_;
                  $this->NM_ajax_info['fldList']['stockubica_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['stockubica_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->stockubica_)));
                  $this->NM_ajax_info['fldList']['stockubica_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_stockubica_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['stockubica_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['stockubica_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['stockubica_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['stockubica_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $tmpLabel_unidad_ = $this->unidad_;
                  $this->NM_ajax_info['fldList']['unidad_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['unidad_' . $this->nmgp_refresh_row]['valList'] = array($this->unidad_);
                  $this->NM_ajax_info['fldList']['unidad_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_unidad_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['unidad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['unidad_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['unidad_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['unidad_' . $this->nmgp_refresh_row] = "on";
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

                  $tmpLabel_descuento_ = $this->descuento_;
                  $this->NM_ajax_info['fldList']['descuento_' . $this->nmgp_refresh_row]['type']    = 'label';
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

                  $this->NM_ajax_info['fldList']['adicional_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['adicional_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->adicional_)));
                  $this->NM_ajax_info['fldList']['adicional_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_adicional_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['adicional_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['adicional_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['adicional_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['adicional_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['adicional1_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['adicional1_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->adicional1_)));
                  $this->NM_ajax_info['fldList']['adicional1_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_adicional1_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['adicional1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['adicional1_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['adicional1_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['adicional1_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['factor_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['factor_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->factor_)));
                  $this->NM_ajax_info['fldList']['factor_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_factor_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['factor_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['factor_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['factor_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['factor_' . $this->nmgp_refresh_row] = "on";
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

                  $this->NM_ajax_info['fldList']['costop_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['costop_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->costop_)));
                  $this->NM_ajax_info['fldList']['costop_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_costop_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['costop_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['costop_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['costop_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['costop_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['fech_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['fech_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->fech_)));
                  $this->NM_ajax_info['fldList']['fech_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_fech_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['fech_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['fech_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['fech_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['fech_' . $this->nmgp_refresh_row] = "on";
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

                  $tmpLabel_iddev_ = $this->iddev_;
                  $this->NM_ajax_info['fldList']['iddev_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['iddev_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->iddev_)));
                  $this->NM_ajax_info['fldList']['iddev_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_iddev_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['iddev_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['iddev_' . $this->nmgp_refresh_row] = "on";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['iddev_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['iddev_' . $this->nmgp_refresh_row] = "on";
                      }
                  }


                  $this->nm_tira_formatacao();
                  $this->nm_converte_datas();

                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->iddet_ = substr($this->Db->qstr($this->iddet_), 1, -1); 
          $this->iddev_ = substr($this->Db->qstr($this->iddev_), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet_ and iddev = $this->iddev_ "); 
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
                          detalleventa_devoluciones_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nm_proc_onload_record($sc_seq_vert);
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['db_changed'] = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_qtd']--; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['total']--; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_I_E']--; 
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['total'] + 1; 
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
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['parms'] = "iddet_?#?$this->iddet_?@?iddev_?#?$this->iddev_?@?"; 
      }
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->iddet_ = null === $this->iddet_ ? null : substr($this->Db->qstr($this->iddet_), 1, -1); 
          $this->iddev_ = null === $this->iddev_ ? null : substr($this->Db->qstr($this->iddev_), 1, -1); 
      } 
   }
//---------- 
   function nm_select_banco() 
   { 
      global $nm_form_submit, $sc_seq_vert, $sc_check_incl, $teste_validade, $sc_where;
 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['rows']))
      {
          $this->sc_max_reg = $_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['rows'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['rows_ins']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['rows_ins']))
      {
          $this->sc_max_reg_incl = $_SESSION['scriptcase']['sc_apl_conf']['detalleventa_devoluciones']['rows_ins'];
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_qtd_reg']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_qtd_reg'])
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_liga_qtd_reg'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_max_reg']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_max_reg'] > 0 || strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_max_reg']) == "all"))
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_max_reg'];
      } 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
      $this->form_vert_detalleventa_devoluciones = array();
      if ($this->nmgp_opcao != "novo") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['parms'] = ""; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($this->sc_teve_excl)
      {
          $this->nmgp_opcao = "avanca";
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] -= $this->sc_max_reg;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] = 0;
      }
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_filter'] . ")";
          }
      }
      $sc_where = trim("numfac=" . $_SESSION['par_numfacventa'] . " and procesado<1");
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
          if (null != $this->iddev_)
          {
              $aNewWhereCond[] = "iddev = " . $this->iddev_;
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
          if ($this->app_is_initializing || $this->sc_teve_excl || $this->sc_teve_incl || (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['total']))
          {
              $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where;
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
              $rt = $this->Db->Execute($nmgp_select);
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit;
              }
              $qt_geral_reg_detalleventa_devoluciones = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['total'] = $qt_geral_reg_detalleventa_devoluciones;
              $rt->Close();
          }
      if ((isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['total']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_I_E'] = 0; 
          if (!$this->sc_teve_excl && !$this->sc_teve_incl) 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] = 0; 
          } 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->iddet_) && !empty($this->iddev_))
          {
              $Reg_OK      = false;
              $Count_start = -1;
              $sc_order_by = "";
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Sel_Chave = "iddet, iddev"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Sel_Chave = "iddet, iddev"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Sel_Chave = "iddet, iddev"; 
              }
              else  
              {
                  $Sel_Chave = "iddet, iddev"; 
              }
              $nmgp_select = "SELECT " . $Sel_Chave . " from " . $this->Ini->nm_tabela . $sc_where; 
              $sc_order_by = "iddet, iddev";
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
                  if ($rt->fields[0] == $this->iddet_ && $rt->fields[1] == $this->iddev_)
                  { 
                      $Reg_OK = true;
                  }  
                  $Count_start++;
                  $rt->MoveNext();
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] = $Count_start;
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_detalleventa_devoluciones = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['total'];
      } 
      if ($this->nmgp_opcao == "inicio" || $this->nmgp_opcao == "ordem") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_detalleventa_devoluciones) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] += ($this->sc_max_reg + $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_I_E']); 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] > $qt_geral_reg_detalleventa_devoluciones)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] = $qt_geral_reg_detalleventa_devoluciones - $this->sc_max_reg; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] = 0; 
              }
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] -= $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] = ($qt_geral_reg_detalleventa_devoluciones + 1) - $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] = 0; 
          }
      } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_I_E'] = 0; 
      }
      $Cmps_ord_def = array();
      $sc_order_by  = "";
      $sc_order_by = "iddet, iddev";
      $sc_order_by = str_replace("order by ", "", $sc_order_by);
      $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
      if (!empty($sc_order_by))
      {
          $sc_order_by = " order by $sc_order_by "; 
      }
      if ($this->nmgp_opcao == "ordem" && in_array($this->nmgp_ordem, $Cmps_ord_def)) 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['ordem_cmp'] != $this->nmgp_ordem)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['ordem_cmp'] = $this->nmgp_ordem; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['ordem_ord'] = ' asc'; 
          }
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['ordem_ord'] == ' asc')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['ordem_ord'] = ' desc'; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['ordem_ord'] = ' asc'; 
          }
      } 
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['ordem_cmp'])) 
      { 
          $sc_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['ordem_cmp'] . $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['ordem_ord']; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT iddet, numfac, remision, idpro, unidadmayor, factor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, iddev, procesado from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT iddet, numfac, remision, idpro, unidadmayor, factor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, iddev, procesado from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT iddet, numfac, remision, idpro, unidadmayor, factor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, iddev, procesado from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT iddet, numfac, remision, idpro, unidadmayor, factor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, iddev, procesado from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      else 
      { 
          $nmgp_select = "SELECT iddet, numfac, remision, idpro, unidadmayor, factor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, iddev, procesado from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['run_iframe'] == "R")
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          else 
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start']) ; 
              } 
              else  
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
                  $rs = $this->Db->Execute($nmgp_select) ; 
                  if (!$rs === false && !$rs->EOF) 
                  { 
                      $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start']) ;  
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
              $this->nmgp_botoes['sc_btn_0'] = "off";
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_filter']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['empty_filter'] = true;
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
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['run_iframe'] == "R")
              { 
                  $this->sc_max_reg++;
              } 
              }
              $this->iddet_ = $rs->fields[0] ; 
              $this->nmgp_dados_select['iddet_'] = $this->iddet_;
              $this->numfac_ = $rs->fields[1] ; 
              $this->nmgp_dados_select['numfac_'] = $this->numfac_;
              $this->remision_ = $rs->fields[2] ; 
              $this->nmgp_dados_select['remision_'] = $this->remision_;
              $this->idpro_ = $rs->fields[3] ; 
              $this->nmgp_dados_select['idpro_'] = $this->idpro_;
              $this->unidadmayor_ = $rs->fields[4] ; 
              $this->nmgp_dados_select['unidadmayor_'] = $this->unidadmayor_;
              $this->factor_ = trim($rs->fields[5]) ; 
              $this->nmgp_dados_select['factor_'] = $this->factor_;
              $this->idbod_ = $rs->fields[6] ; 
              $this->nmgp_dados_select['idbod_'] = $this->idbod_;
              $this->costop_ = trim($rs->fields[7]) ; 
              $this->nmgp_dados_select['costop_'] = $this->costop_;
              $this->cantidad_ = trim($rs->fields[8]) ; 
              $this->nmgp_dados_select['cantidad_'] = $this->cantidad_;
              $this->valorunit_ = trim($rs->fields[9]) ; 
              $this->nmgp_dados_select['valorunit_'] = $this->valorunit_;
              $this->valorpar_ = trim($rs->fields[10]) ; 
              $this->nmgp_dados_select['valorpar_'] = $this->valorpar_;
              $this->iva_ = trim($rs->fields[11]) ; 
              $this->nmgp_dados_select['iva_'] = $this->iva_;
              $this->descuento_ = trim($rs->fields[12]) ; 
              $this->nmgp_dados_select['descuento_'] = $this->descuento_;
              $this->adicional_ = $rs->fields[13] ; 
              $this->nmgp_dados_select['adicional_'] = $this->adicional_;
              $this->adicional1_ = $rs->fields[14] ; 
              $this->nmgp_dados_select['adicional1_'] = $this->adicional1_;
              $this->devuelto_ = $rs->fields[15] ; 
              $this->nmgp_dados_select['devuelto_'] = $this->devuelto_;
              $this->colores_ = $rs->fields[16] ; 
              $this->nmgp_dados_select['colores_'] = $this->colores_;
              $this->tallas_ = $rs->fields[17] ; 
              $this->nmgp_dados_select['tallas_'] = $this->tallas_;
              $this->sabor_ = $rs->fields[18] ; 
              $this->nmgp_dados_select['sabor_'] = $this->sabor_;
              $this->iddev_ = $rs->fields[19] ; 
              $this->nmgp_dados_select['iddev_'] = $this->iddev_;
              $this->procesado_ = $rs->fields[20] ; 
              $this->nmgp_dados_select['procesado_'] = $this->procesado_;
              $this->stockubica_ = isset($GLOBALS['stockubica_' . $sc_seq_vert]) ? $GLOBALS['stockubica_' . $sc_seq_vert] : '';
              $this->unidad_ = isset($GLOBALS['unidad_' . $sc_seq_vert]) ? $GLOBALS['unidad_' . $sc_seq_vert] : '';
              $this->fech_ = isset($GLOBALS['fech_' . $sc_seq_vert]) ? $GLOBALS['fech_' . $sc_seq_vert] : '';
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->iddet_ = (string)$this->iddet_; 
              $this->numfac_ = (string)$this->numfac_; 
              $this->remision_ = (string)$this->remision_; 
              $this->idpro_ = (string)$this->idpro_; 
              $this->factor_ = (strpos(strtolower($this->factor_), "e")) ? (float)$this->factor_ : $this->factor_; 
              $this->factor_ = (string)$this->factor_; 
              $this->idbod_ = (string)$this->idbod_; 
              $this->costop_ = (strpos(strtolower($this->costop_), "e")) ? (float)$this->costop_ : $this->costop_; 
              $this->costop_ = (string)$this->costop_; 
              $this->cantidad_ = (strpos(strtolower($this->cantidad_), "e")) ? (float)$this->cantidad_ : $this->cantidad_; 
              $this->cantidad_ = (string)$this->cantidad_; 
              $this->valorunit_ = (strpos(strtolower($this->valorunit_), "e")) ? (float)$this->valorunit_ : $this->valorunit_; 
              $this->valorunit_ = (string)$this->valorunit_; 
              $this->valorpar_ = (strpos(strtolower($this->valorpar_), "e")) ? (float)$this->valorpar_ : $this->valorpar_; 
              $this->valorpar_ = (string)$this->valorpar_; 
              $this->iva_ = (strpos(strtolower($this->iva_), "e")) ? (float)$this->iva_ : $this->iva_; 
              $this->iva_ = (string)$this->iva_; 
              $this->descuento_ = (strpos(strtolower($this->descuento_), "e")) ? (float)$this->descuento_ : $this->descuento_; 
              $this->descuento_ = (string)$this->descuento_; 
              $this->adicional_ = (string)$this->adicional_; 
              $this->adicional1_ = (string)$this->adicional1_; 
              $this->devuelto_ = (string)$this->devuelto_; 
              $this->colores_ = (string)$this->colores_; 
              $this->tallas_ = (string)$this->tallas_; 
              $this->sabor_ = (string)$this->sabor_; 
              $this->iddev_ = (string)$this->iddev_; 
              $this->procesado_ = (string)$this->procesado_; 
              if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['parms'])) 
              { 
                  $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['parms'] = "iddet_?#?$this->iddet_?@?iddev_?#?$this->iddev_?@?";
              } 
              $this->nm_proc_onload_record($sc_seq_vert);
              $this->storeRecordState($sc_seq_vert);
//
//-- 
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dados_select'][$sc_seq_vert] = $this->nmgp_dados_select;
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['idpro_'] =  $this->idpro_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['colores_'] =  $this->colores_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['tallas_'] =  $this->tallas_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['sabor_'] =  $this->sabor_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['idbod_'] =  $this->idbod_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['unidadmayor_'] =  $this->unidadmayor_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['stockubica_'] =  $this->stockubica_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['unidad_'] =  $this->unidad_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['cantidad_'] =  $this->cantidad_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['valorunit_'] =  $this->valorunit_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['valorpar_'] =  $this->valorpar_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['descuento_'] =  $this->descuento_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['adicional_'] =  $this->adicional_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['adicional1_'] =  $this->adicional1_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['factor_'] =  $this->factor_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['iva_'] =  $this->iva_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['costop_'] =  $this->costop_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['fech_'] =  $this->fech_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['iddet_'] =  $this->iddet_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['numfac_'] =  $this->numfac_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['remision_'] =  $this->remision_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['devuelto_'] =  $this->devuelto_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['iddev_'] =  $this->iddev_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['procesado_'] =  $this->procesado_; 
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
          ksort ($this->form_vert_detalleventa_devoluciones); 
          $rs->Close(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_qtd'] = $sc_seq_vert + $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] - 1;
          if ('total' == $this->form_paginacao)
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $this->sc_max_reg; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $this->sc_max_reg; 
          }
          else
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['total'] + 1; 
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
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] < (($qt_geral_reg_detalleventa_devoluciones + 1) - $this->sc_max_reg);
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['opcao'] = '';
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
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['embutida_multi']) 
          { 
          } 
          else 
          { 
              $this->sc_max_reg_incl = 0; 
          } 
          while ($sc_seq_vert <= $this->sc_max_reg_incl) 
          { 
              $this->idpro_ = "";  
              $this->unidadmayor_ = "";  
              $this->factor_ = "";  
              $this->idbod_ = "";  
              $this->costop_ = "";  
              $this->cantidad_ = htmlentities("0");  
              $this->valorunit_ = "";  
              $this->valorpar_ = "";  
              $this->iva_ = "";  
              $this->descuento_ = "";  
              $this->adicional_ = htmlentities("0");  
              $this->adicional1_ = htmlentities("0");  
              $this->colores_ = "";  
              $this->tallas_ = "";  
              $this->sabor_ = "";  
              $this->stockubica_ = htmlentities("0");  
              $this->unidad_ = "";  
              $this->fech_ = "";  
              $this->nm_proc_onload_record($sc_seq_vert);
              if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['foreign_key']))
              {
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['foreign_key'] as $sFKName => $sFKValue)
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
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['idpro_'] =  $this->idpro_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['colores_'] =  $this->colores_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['tallas_'] =  $this->tallas_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['sabor_'] =  $this->sabor_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['idbod_'] =  $this->idbod_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['unidadmayor_'] =  $this->unidadmayor_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['stockubica_'] =  $this->stockubica_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['unidad_'] =  $this->unidad_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['cantidad_'] =  $this->cantidad_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['valorunit_'] =  $this->valorunit_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['valorpar_'] =  $this->valorpar_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['descuento_'] =  $this->descuento_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['adicional_'] =  $this->adicional_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['adicional1_'] =  $this->adicional1_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['factor_'] =  $this->factor_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['iva_'] =  $this->iva_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['costop_'] =  $this->costop_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['fech_'] =  $this->fech_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['iddet_'] =  $this->iddet_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['numfac_'] =  $this->numfac_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['remision_'] =  $this->remision_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['devuelto_'] =  $this->devuelto_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['iddev_'] =  $this->iddev_; 
             $this->form_vert_detalleventa_devoluciones[$sc_seq_vert]['procesado_'] =  $this->procesado_; 
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
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['reg_start'] + $this->sc_max_reg;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function actualiza_stock($prod, $canti)
{
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'on';
  
$proid=$this->idpro_ ;
$gru=$this->consulta_grupo($proid);
if($gru==0)
	{
$proid=$prod;
$cant=$canti*-1;

		$sql="select stockmen from productos where idprod=$proid";
		 
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
		$this->ds =substr($this->ds , 8);$existencia=$this->ds ;
		if($this->unidadmayor_ =='NO' and $this->factor_ >0)
			{
			$aux=$cant/$this->factor_ ;
			$cant=round($aux, 3);
			$sql="UPDATE productos SET stockmen = ($existencia+$cant) WHERE idprod=$proid";
			
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
                detalleventa_devoluciones_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			}
		else
			{
			$sql="UPDATE productos SET stockmen = ($existencia+$cant) WHERE idprod=$proid";
			
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
                detalleventa_devoluciones_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			}
	}
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off';
}
function actualiza_stock_edita()
{
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'on';
if (!isset($this->sc_temp_sw)) {$this->sc_temp_sw = (isset($_SESSION['sw'])) ? $_SESSION['sw'] : "";}
if (!isset($this->sc_temp_edit_cantidad)) {$this->sc_temp_edit_cantidad = (isset($_SESSION['edit_cantidad'])) ? $_SESSION['edit_cantidad'] : "";}
  
$proid=$this->idpro_ ;
$cant=$this->cantidad_ ;

if($this->sc_temp_edit_cantidad<$cant and $cant>0)
	{
		$cant=$cant-$this->sc_temp_edit_cantidad;
		$sql="select stockmen from productos where idprod=$proid";
		 
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
		$this->ds =substr($this->ds , 8);$existencia=$this->ds ;
		
		if($this->unidadmayor_ =='NO' and $this->factor_ >0)
			{
			$aux=$cant/$this->factor_ ;
			$cant=round($aux, 3);
			$sql="UPDATE productos SET stockmen = ($existencia-$cant) WHERE idprod=$proid";
			
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
                detalleventa_devoluciones_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			}
		else
			{
			$sql="UPDATE productos SET stockmen = ($existencia-$cant) WHERE idprod=$proid";
			
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
                detalleventa_devoluciones_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			}
	}
else if($this->sc_temp_edit_cantidad>$cant and $cant>0)
	{
		$cant=$this->sc_temp_edit_cantidad-$cant;
		$sql="select stockmen from productos where idprod=$proid";
		 
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
		$this->ds =substr($this->ds , 8);$existencia=$this->ds ;
		
		if($this->unidadmayor_ =='NO' and $this->factor_ >0)
			{
			$aux=$cant/$this->factor_ ;
			$cant=round($aux, 3);
			$sql="UPDATE productos SET stockmen = ($existencia+$cant) WHERE idprod=$proid";
			
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
                detalleventa_devoluciones_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			}
		else
			{
			$sql="UPDATE productos SET stockmen = ($existencia+$cant) WHERE idprod=$proid";
			
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
                detalleventa_devoluciones_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			}
	}
$this->sc_temp_sw=0;
if (isset($this->sc_temp_edit_cantidad)) { $_SESSION['edit_cantidad'] = $this->sc_temp_edit_cantidad;}
if (isset($this->sc_temp_sw)) { $_SESSION['sw'] = $this->sc_temp_sw;}
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off';
}
function actualiza_stock_elimina()
{
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'on';
  
$proid=$this->idpro_ ;
$cant=$this->cantidad_ ;
 
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
		if($this->unidadmayor_ =='NO' and $this->factor_ >0)
			{
			$aux=$cant/$this->factor_ ;
			$cant=round($aux, 3);
			}
			
			$stoc=$this->ds[0][0]+$cant;
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
                detalleventa_devoluciones_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	}
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off';
}
function calcula_descuento()
{
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'on';
  
$sql="select otro from productos where idprod=$this->idpro_ ";
 
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
$desc=substr($this->ds , 4);settype ($desc,"integer");
if($desc==1)
	{
	$sql="select otro2 from productos where idprod=$this->idpro_ ";
	 
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
	$tasades=substr($this->ds , 5);
	$this->adicional1_ =$tasades;
	$tasades=$tasades/100;$tasades=round($tasades, 2);
	$this->descuento_ =$this->valorpar_ *$tasades;
	
	}
else{$this->descuento_ =0;$this->adicional1_ =0;}
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off';
}
function calcula_iva()
{
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'on';
  
$sql="select idiva from productos where idprod=$this->idpro_ ";
 
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
$idiva=substr($this->ds , 5);
$sql="select trifa from iva where idiva=$idiva";
 
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
$iva=substr($this->ds , 5);
$this->adicional_ =$iva;
$iva=$iva/100;
$iva=$iva+1;
$parc_desc=$this->valorpar_ -$this->descuento_ ;
$b=$parc_desc/$iva; $b=round($b, 0);
$this->iva_ =$parc_desc-$b;
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off';
}
function calcula_parcial()
{
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'on';
  
$ca=$this->cantidad_ ;
$vu=$this->valorunit_ ;
$this->valorpar_ =$ca*$vu;

$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off';
}
function cantidad__onChange()
{
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'on';
if (!isset($this->sc_temp_sw)) {$this->sc_temp_sw = (isset($_SESSION['sw'])) ? $_SESSION['sw'] : "";}
if (!isset($this->sc_temp_edit_cantidad)) {$this->sc_temp_edit_cantidad = (isset($_SESSION['edit_cantidad'])) ? $_SESSION['edit_cantidad'] : "";}
  
$original_cantidad_ = $this->cantidad_;
$original_idpro_ = $this->idpro_;
$original_adicional1_ = $this->adicional1_;
$original_descuento_ = $this->descuento_;
$original_valorpar_ = $this->valorpar_;
$original_adicional_ = $this->adicional_;
$original_iva_ = $this->iva_;
$original_valorunit_ = $this->valorunit_;
$original_colores_ = $this->colores_;
$original_tallas_ = $this->tallas_;
$original_sabor_ = $this->sabor_;
$original_idbod_ = $this->idbod_;
$original_unidadmayor_ = $this->unidadmayor_;
$original_factor_ = $this->factor_;
$original_stockubica_ = $this->stockubica_;
$original_unidad_ = $this->unidad_;

$this->calcula_parcial();
$this->calcula_descuento();
$this->calcula_iva();
$this->ver_stock();
if($this->cantidad_ >$this->sc_temp_edit_cantidad)
	{
		
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "¡Cantidad excede la compra o ya fue devuelto!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_detalleventa_devoluciones';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_detalleventa_devoluciones';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "¡Cantidad excede la compra o ya fue devuelto!";
 }
;
	}
else
	{
	$this->sc_temp_sw=0;
	}



if (isset($this->sc_temp_edit_cantidad)) { $_SESSION['edit_cantidad'] = $this->sc_temp_edit_cantidad;}
if (isset($this->sc_temp_sw)) { $_SESSION['sw'] = $this->sc_temp_sw;}
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off';
$modificado_cantidad_ = $this->cantidad_;
$modificado_idpro_ = $this->idpro_;
$modificado_adicional1_ = $this->adicional1_;
$modificado_descuento_ = $this->descuento_;
$modificado_valorpar_ = $this->valorpar_;
$modificado_adicional_ = $this->adicional_;
$modificado_iva_ = $this->iva_;
$modificado_valorunit_ = $this->valorunit_;
$modificado_colores_ = $this->colores_;
$modificado_tallas_ = $this->tallas_;
$modificado_sabor_ = $this->sabor_;
$modificado_idbod_ = $this->idbod_;
$modificado_unidadmayor_ = $this->unidadmayor_;
$modificado_factor_ = $this->factor_;
$modificado_stockubica_ = $this->stockubica_;
$modificado_unidad_ = $this->unidad_;
$this->nm_formatar_campos('cantidad_', 'idpro_', 'adicional1_', 'descuento_', 'valorpar_', 'adicional_', 'iva_', 'valorunit_', 'colores_', 'tallas_', 'sabor_', 'idbod_', 'unidadmayor_', 'factor_', 'stockubica_', 'unidad_');
$this->nmgp_refresh_fields = array();
if ($original_cantidad_ !== $modificado_cantidad_ || isset($this->nmgp_cmp_readonly['cantidad_']) || (isset($bFlagRead_cantidad_) && $bFlagRead_cantidad_))
{
    $this->nmgp_refresh_fields[] = 'cantidad_';
    $this->NM_ajax_changed['cantidad_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_idpro_ !== $modificado_idpro_ || isset($this->nmgp_cmp_readonly['idpro_']) || (isset($bFlagRead_idpro_) && $bFlagRead_idpro_))
{
    $this->nmgp_refresh_fields[] = 'idpro_';
    $this->NM_ajax_changed['idpro_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_adicional1_ !== $modificado_adicional1_ || isset($this->nmgp_cmp_readonly['adicional1_']) || (isset($bFlagRead_adicional1_) && $bFlagRead_adicional1_))
{
    $this->nmgp_refresh_fields[] = 'adicional1_';
    $this->NM_ajax_changed['adicional1_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_descuento_ !== $modificado_descuento_ || isset($this->nmgp_cmp_readonly['descuento_']) || (isset($bFlagRead_descuento_) && $bFlagRead_descuento_))
{
    $this->nmgp_refresh_fields[] = 'descuento_';
    $this->NM_ajax_changed['descuento_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_valorpar_ !== $modificado_valorpar_ || isset($this->nmgp_cmp_readonly['valorpar_']) || (isset($bFlagRead_valorpar_) && $bFlagRead_valorpar_))
{
    $this->nmgp_refresh_fields[] = 'valorpar_';
    $this->NM_ajax_changed['valorpar_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_adicional_ !== $modificado_adicional_ || isset($this->nmgp_cmp_readonly['adicional_']) || (isset($bFlagRead_adicional_) && $bFlagRead_adicional_))
{
    $this->nmgp_refresh_fields[] = 'adicional_';
    $this->NM_ajax_changed['adicional_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_iva_ !== $modificado_iva_ || isset($this->nmgp_cmp_readonly['iva_']) || (isset($bFlagRead_iva_) && $bFlagRead_iva_))
{
    $this->nmgp_refresh_fields[] = 'iva_';
    $this->NM_ajax_changed['iva_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_valorunit_ !== $modificado_valorunit_ || isset($this->nmgp_cmp_readonly['valorunit_']) || (isset($bFlagRead_valorunit_) && $bFlagRead_valorunit_))
{
    $this->nmgp_refresh_fields[] = 'valorunit_';
    $this->NM_ajax_changed['valorunit_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_colores_ !== $modificado_colores_ || isset($this->nmgp_cmp_readonly['colores_']) || (isset($bFlagRead_colores_) && $bFlagRead_colores_))
{
    $this->nmgp_refresh_fields[] = 'colores_';
    $this->NM_ajax_changed['colores_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_tallas_ !== $modificado_tallas_ || isset($this->nmgp_cmp_readonly['tallas_']) || (isset($bFlagRead_tallas_) && $bFlagRead_tallas_))
{
    $this->nmgp_refresh_fields[] = 'tallas_';
    $this->NM_ajax_changed['tallas_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_sabor_ !== $modificado_sabor_ || isset($this->nmgp_cmp_readonly['sabor_']) || (isset($bFlagRead_sabor_) && $bFlagRead_sabor_))
{
    $this->nmgp_refresh_fields[] = 'sabor_';
    $this->NM_ajax_changed['sabor_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_idbod_ !== $modificado_idbod_ || isset($this->nmgp_cmp_readonly['idbod_']) || (isset($bFlagRead_idbod_) && $bFlagRead_idbod_))
{
    $this->nmgp_refresh_fields[] = 'idbod_';
    $this->NM_ajax_changed['idbod_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_unidadmayor_ !== $modificado_unidadmayor_ || isset($this->nmgp_cmp_readonly['unidadmayor_']) || (isset($bFlagRead_unidadmayor_) && $bFlagRead_unidadmayor_))
{
    $this->nmgp_refresh_fields[] = 'unidadmayor_';
    $this->NM_ajax_changed['unidadmayor_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_factor_ !== $modificado_factor_ || isset($this->nmgp_cmp_readonly['factor_']) || (isset($bFlagRead_factor_) && $bFlagRead_factor_))
{
    $this->nmgp_refresh_fields[] = 'factor_';
    $this->NM_ajax_changed['factor_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_stockubica_ !== $modificado_stockubica_ || isset($this->nmgp_cmp_readonly['stockubica_']) || (isset($bFlagRead_stockubica_) && $bFlagRead_stockubica_))
{
    $this->nmgp_refresh_fields[] = 'stockubica_';
    $this->NM_ajax_changed['stockubica_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($original_unidad_ !== $modificado_unidad_ || isset($this->nmgp_cmp_readonly['unidad_']) || (isset($bFlagRead_unidad_) && $bFlagRead_unidad_))
{
    $this->nmgp_refresh_fields[] = 'unidad_';
    $this->NM_ajax_changed['unidad_'] = true;
    $this->NM_ajax_force_values = true;
}
if ($this->NM_ajax_force_values)
{
    $this->ajax_return_values();
}
$this->NM_ajax_info['event_field'] = 'cantidad';
detalleventa_devoluciones_pack_ajax_response();
exit;
}
function cantidad__onFocus()
{
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'on';
if (!isset($this->sc_temp_edit_cantidad)) {$this->sc_temp_edit_cantidad = (isset($_SESSION['edit_cantidad'])) ? $_SESSION['edit_cantidad'] : "";}
if (!isset($this->sc_temp_sw)) {$this->sc_temp_sw = (isset($_SESSION['sw'])) ? $_SESSION['sw'] : "";}
  
$original_cantidad_ = $this->cantidad_;

if($this->sc_temp_sw==0){
if($this->cantidad_ !=0){$this->sc_temp_edit_cantidad=$this->cantidad_ ;}
	$this->sc_temp_sw=1;
	}
if ($this->cantidad_ ==0)
	{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "producto ya fue devuelto!, por favor elimine item";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_detalleventa_devoluciones';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_detalleventa_devoluciones';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "producto ya fue devuelto!, por favor elimine item";
 }
;
	}


if (isset($this->sc_temp_sw)) { $_SESSION['sw'] = $this->sc_temp_sw;}
if (isset($this->sc_temp_edit_cantidad)) { $_SESSION['edit_cantidad'] = $this->sc_temp_edit_cantidad;}
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off';
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
detalleventa_devoluciones_pack_ajax_response();
exit;
}
function consulta_grupo($produc)
{
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'on';
  
$idp=$produc;
 
      $nm_select = "select idgrup from productos where idprod=$idp"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dat = array();
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
if (isset($this->dat[0][0]))
	{
	if ($this->dat[0][0]==1)
		{
		$se=1;
		goto eti2;		
		}
	else
		{
		goto eti1;
		}
	}
else
	{
	goto eti1;
	}
eti1:;
$se=0;
eti2:;
return $se;
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off';
}
function saldo_fctura($vpar)
{
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'on';
if (!isset($this->sc_temp_par_numfacventa)) {$this->sc_temp_par_numfacventa = (isset($_SESSION['par_numfacventa'])) ? $_SESSION['par_numfacventa'] : "";}
  
$id=$this->sc_temp_par_numfacventa; 
 
      $nm_select = "select saldo from facturaven where idfacven=$id"; 
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
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
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
	$sal=$this->des[0][0]-($vpar*-1);
	
     $nm_select ="update facturaven SET observaciones='Presenta devolucion(es)', saldo=$sal where idfacven=$id"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                detalleventa_devoluciones_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	}
if (isset($this->sc_temp_par_numfacventa)) { $_SESSION['par_numfacventa'] = $this->sc_temp_par_numfacventa;}
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off';
}
function trae_fecha()
{
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'on';
if (!isset($this->sc_temp_par_numfacventa)) {$this->sc_temp_par_numfacventa = (isset($_SESSION['par_numfacventa'])) ? $_SESSION['par_numfacventa'] : "";}
  
$sql="SELECT fecha FROM devventa WHERE numfacven=$this->sc_temp_par_numfacventa order by iddevol desc limit 1";
	 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dts = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
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
	$this->fech_ =$this->dts[0][0];
if (isset($this->sc_temp_par_numfacventa)) { $_SESSION['par_numfacventa'] = $this->sc_temp_par_numfacventa;}
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off';
}
function trae_saldo($vprod)
{
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'on';
if (!isset($this->sc_temp_par_numfacventa)) {$this->sc_temp_par_numfacventa = (isset($_SESSION['par_numfacventa'])) ? $_SESSION['par_numfacventa'] : "";}
  
 
      $nm_select = "select idcli from facturaven where idfacven=$this->sc_temp_par_numfacventa"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->de = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->de = false;
          $this->de_erro = $this->Db->ErrorMsg();
      } 
;
$cli=substr($this->de , 5);
 
      $nm_select = "select saldo from terceros where idtercero=$cli"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->da = array();
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
                      $this->da[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->da = false;
          $this->da_erro = $this->Db->ErrorMsg();
      } 
;
if (isset($this->da[0][0]))
	{
	$saldocli=$this->da[0][0]+$vprod;
	
     $nm_select ="update terceros SET saldo=$saldocli where idtercero=$cli"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                detalleventa_devoluciones_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	}
if (isset($this->sc_temp_par_numfacventa)) { $_SESSION['par_numfacventa'] = $this->sc_temp_par_numfacventa;}
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off';
}
function update_master()
{
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'on';
if (!isset($this->sc_temp_vtotal)) {$this->sc_temp_vtotal = (isset($_SESSION['vtotal'])) ? $_SESSION['vtotal'] : "";}
if (!isset($this->sc_temp_par_numfacventa)) {$this->sc_temp_par_numfacventa = (isset($_SESSION['par_numfacventa'])) ? $_SESSION['par_numfacventa'] : "";}
  
$a=$this->sc_temp_par_numfacventa; 
$sql="SELECT sum(valorpar), sum(iva), sum(descuento) FROM detalleventaself WHERE numfac=$this->sc_temp_par_numfacventa and procesado<1";
 
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
$total=$this->ds[0][0]-$this->ds[0][2];
$this->sc_temp_vtotal=$total;
$iva=$this->ds[0][1];
$sub=$total-$iva;
$desc=$this->ds[0][2];

if(!empty($this->ds[0][0]))
{
	
     $nm_select ="UPDATE devventa SET vunit=$total*-1, vparc=$sub*-1, viva=$iva*-1, vdesc=$desc*-1 WHERE numfacven=$this->sc_temp_par_numfacventa order by numerodev desc limit 1"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                detalleventa_devoluciones_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	$total= number_format($total,0,",",".");
	$iva= number_format($iva,0,",",".");
	$sub= number_format($sub,0,",",".");
	$desc= number_format($desc,0,",",".");

	$this->sc_master_value('vunit', $total*-1);
	$this->sc_master_value('vparc', $sub*-1);
	$this->sc_master_value('viva', $iva*-1);
	$this->sc_master_value('vdesc', $desc*-1);
}

else
	{
	
     $nm_select ="UPDATE devventa SET vunit=0, vparc=0, viva=0, vdesc=0 WHERE numfacven=$this->sc_temp_par_numfacventa order by numerodev desc limit 1"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                detalleventa_devoluciones_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	
	$this->sc_master_value('vunit', 0);
	$this->sc_master_value('vparc', 0);
	$this->sc_master_value('viva', 0);
	$this->sc_master_value('vdesc', 0);
	$this->sc_temp_vtotal=0;
	}
if (isset($this->sc_temp_par_numfacventa)) { $_SESSION['par_numfacventa'] = $this->sc_temp_par_numfacventa;}
if (isset($this->sc_temp_vtotal)) { $_SESSION['vtotal'] = $this->sc_temp_vtotal;}
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off';
}
function ver_stock()
{
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'on';
  
$proid=$this->idpro_ ;
$gru=$this->consulta_grupo($proid);
if($gru==0)
	{
if ($this->colores_ >0)
	{
	if ($this->tallas_ >0)
		{
		if($this->sabor_ >0)
			{
			$sql="SELECT SUM(cantidad) AS cantidad FROM inventario
			WHERE idpro = $this->idpro_  AND idbod=$this->idbod_  and colores=$this->colores_  and tallas=$this->tallas_  and sabor=$this->sabor_ ";
			}
		else
			{
			$sql="SELECT SUM(cantidad) AS cantidad FROM inventario
			WHERE idpro = $this->idpro_  AND idbod=$this->idbod_  and colores=$this->colores_  and tallas=$this->tallas_ ";
			}
		}
	else
		{
		if($this->sabor_ >0)
			{
			$sql="SELECT SUM(cantidad) AS cantidad FROM inventario
			WHERE idpro = $this->idpro_  AND idbod=$this->idbod_  and colores=$this->colores_  and sabor=$this->sabor_ ";
			}
		else
			{
			$sql="SELECT SUM(cantidad) AS cantidad FROM inventario
			WHERE idpro = $this->idpro_  AND idbod=$this->idbod_  and colores=$this->colores_ ";
			}
		}
	}
else
	{
	if ($this->tallas_ >0)
		{
		if($this->sabor_ >0)
			{
			$sql="SELECT SUM(cantidad) AS cantidad FROM inventario
		WHERE idpro = $this->idpro_  AND idbod=$this->idbod_  and tallas=$this->tallas_  and sabor=$this->sabor_ ";
			}
		else
			{
			$sql="SELECT SUM(cantidad) AS cantidad FROM inventario
		WHERE idpro = $this->idpro_  AND idbod=$this->idbod_  and tallas=$this->tallas_ ";
			}
		}
	else
		{
		$sql="SELECT SUM(cantidad) AS cantidad FROM inventario
		WHERE idpro = $this->idpro_  AND idbod=$this->idbod_  ";
		}
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
	if($this->unidadmayor_ =='NO' and $this->factor_ >0)
		{
		$this->stockubica_ =$this->ds[0][0]*$this->factor_ ;
		 
      $nm_select = "select unimen from productos where idprod=$this->idpro_ "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->dt = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt = false;
          $this->dt_erro = $this->Db->ErrorMsg();
      } 
;
		$this->unidad_ =substr($this->dt , 6);
		}
	else if($this->unidadmayor_ =='SI')
		{
		$this->stockubica_ =$this->ds[0][0];
		 
      $nm_select = "select unimay from productos where idprod=$this->idpro_ "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->dt = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt = false;
          $this->dt_erro = $this->Db->ErrorMsg();
      } 
;
		$this->unidad_ =substr($this->dt , 6);
		}
	if($this->unidadmayor_ =='NO' and $this->factor_ ==0)
		{
		$this->stockubica_ =$this->ds[0][0];
		 
      $nm_select = "select unimen from productos where idprod=$this->idpro_ "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->dt = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt = false;
          $this->dt_erro = $this->Db->ErrorMsg();
      } 
;
		$this->unidad_ =substr($this->dt , 6);
		}
	}else
		{
		$this->stockubica_ =0;
		$this->unidad_ ='';
		}
	}
$_SESSION['scriptcase']['detalleventa_devoluciones']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              detalleventa_devoluciones_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['retorno_edit'] . "';";
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
        $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['table_refresh'] = true;
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("iddet_", "numfac_", "remision_", "idpro_", "unidadmayor_", "factor_", "idbod_", "costop_", "cantidad_", "valorunit_", "valorpar_", "iva_", "descuento_", "adicional_", "adicional1_", "devuelto_", "colores_", "tallas_", "sabor_"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['csrf_token'];
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

   function Form_lookup_unidadmayor_()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "NO?#?NO?#?N?@?";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              detalleventa_devoluciones_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "numfac", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "remision", $arg_search, str_replace(",", ".", $data_search));
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
              $data_lookup = $this->SC_lookup_unidadmayor_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "unidadmayor", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "factor", $arg_search, str_replace(",", ".", $data_search));
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
              $this->SC_monta_condicao($comando, "costop", $arg_search, str_replace(",", ".", $data_search));
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
              $this->SC_monta_condicao($comando, "adicional", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "adicional1", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "devuelto", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_colores_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "colores", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_tallas_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "tallas", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_sabor_($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "sabor", $arg_search, $data_lookup);
              }
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_filter_form'] . " and (numfac=" . $_SESSION['par_numfacventa'] . " and procesado<1) and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where numfac=" . $_SESSION['par_numfacventa'] . " and procesado<1 and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_detalleventa_devoluciones = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['total'] = $qt_geral_reg_detalleventa_devoluciones;
      $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          detalleventa_devoluciones_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          detalleventa_devoluciones_pack_ajax_response();
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
      $nm_numeric[] = "iddet";$nm_numeric[] = "numfac";$nm_numeric[] = "remision";$nm_numeric[] = "idpro";$nm_numeric[] = "factor";$nm_numeric[] = "idbod";$nm_numeric[] = "costop";$nm_numeric[] = "cantidad";$nm_numeric[] = "valorunit";$nm_numeric[] = "valorpar";$nm_numeric[] = "iva";$nm_numeric[] = "descuento";$nm_numeric[] = "adicional";$nm_numeric[] = "adicional1";$nm_numeric[] = "devuelto";$nm_numeric[] = "colores";$nm_numeric[] = "tallas";$nm_numeric[] = "sabor";$nm_numeric[] = "iddev";$nm_numeric[] = "procesado";$nm_numeric[] = "";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['decimal_db'] == ".")
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
      $Nm_datas[''] = "date";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['SC_sep_date1'];
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
   function SC_lookup_unidadmayor_($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['NO'] = "NO";
       $data_look['SI'] = "SI";
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
   function SC_lookup_colores_($condicao, $campo)
   {
       return $campo;
   }
   function SC_lookup_tallas_($condicao, $campo)
   {
       return $campo;
   }
   function SC_lookup_sabor_($condicao, $campo)
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
       $nmgp_saida_form = "detalleventa_devoluciones_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['nm_run_menu'] = 2;
       $nmgp_saida_form = "detalleventa_devoluciones_fim.php";
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
       detalleventa_devoluciones_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['masterValue']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['opc_ant'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           detalleventa_devoluciones_pack_ajax_response();
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
       detalleventa_devoluciones_pack_ajax_response();
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
    function sc_master_value($sIndex, $sValue)
    {
        $sIndex = strtolower($sIndex);
        $this->NM_ajax_info['masterValue'][$sIndex] = $sValue;
        $_SESSION['sc_session'][$this->Ini->sc_page]['detalleventa_devoluciones']['masterValue'] = $this->NM_ajax_info['masterValue'];
    } // sc_master_value
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
            case "update":
                return array("sc_b_upd_t.sc-unique-btn-5");
                break;
            case "sc_btn_0":
                return array("sc_sc_btn_0_top");
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
