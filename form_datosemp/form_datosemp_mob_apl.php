<?php
//
class form_datosemp_mob_apl
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
   var $iddatos;
   var $razonsoc;
   var $nit;
   var $dv;
   var $direccion;
   var $naturaleza;
   var $naturaleza_1;
   var $regimen;
   var $regimen_1;
   var $telefono;
   var $correo;
   var $logo;
   var $logo_scfile_name;
   var $logo_ul_name;
   var $logo_ul_type;
   var $logo_limpa;
   var $logo_salva;
   var $nombre_archivo;
   var $tamanio;
   var $detalle_trib;
   var $detalle_trib_1;
   var $codigos_ciiu;
   var $codigos_ciiu_1;
   var $responsab_trib;
   var $tipo_documento;
   var $tipo_documento_1;
   var $nombre_comercial;
   var $nompais;
   var $nompais_1;
   var $nom_depto;
   var $nom_depto_1;
   var $municipio;
   var $municipio_1;
   var $ciudad;
   var $ciudad_1;
   var $codigo_postal;
   var $sucursal;
   var $sucursal_1;
   var $codigo_te;
   var $codigo_te_1;
   var $ruta_logo;
   var $ruta_logo_scfile_name;
   var $ruta_logo_ul_name;
   var $ruta_logo_scfile_type;
   var $ruta_logo_ul_type;
   var $ruta_logo_limpa;
   var $ruta_logo_salva;
   var $out_ruta_logo;
   var $ciiu;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $NM_size_docs = array();
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
          if (isset($this->NM_ajax_info['param']['ciiu']))
          {
              $this->ciiu = $this->NM_ajax_info['param']['ciiu'];
          }
          if (isset($this->NM_ajax_info['param']['ciudad']))
          {
              $this->ciudad = $this->NM_ajax_info['param']['ciudad'];
          }
          if (isset($this->NM_ajax_info['param']['codigo_postal']))
          {
              $this->codigo_postal = $this->NM_ajax_info['param']['codigo_postal'];
          }
          if (isset($this->NM_ajax_info['param']['codigo_te']))
          {
              $this->codigo_te = $this->NM_ajax_info['param']['codigo_te'];
          }
          if (isset($this->NM_ajax_info['param']['codigos_ciiu']))
          {
              $this->codigos_ciiu = $this->NM_ajax_info['param']['codigos_ciiu'];
          }
          if (isset($this->NM_ajax_info['param']['correo']))
          {
              $this->correo = $this->NM_ajax_info['param']['correo'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['detalle_trib']))
          {
              $this->detalle_trib = $this->NM_ajax_info['param']['detalle_trib'];
          }
          if (isset($this->NM_ajax_info['param']['direccion']))
          {
              $this->direccion = $this->NM_ajax_info['param']['direccion'];
          }
          if (isset($this->NM_ajax_info['param']['dv']))
          {
              $this->dv = $this->NM_ajax_info['param']['dv'];
          }
          if (isset($this->NM_ajax_info['param']['iddatos']))
          {
              $this->iddatos = $this->NM_ajax_info['param']['iddatos'];
          }
          if (isset($this->NM_ajax_info['param']['logo']))
          {
              $this->logo = $this->NM_ajax_info['param']['logo'];
          }
          if (isset($this->NM_ajax_info['param']['logo_limpa']))
          {
              $this->logo_limpa = $this->NM_ajax_info['param']['logo_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['logo_ul_name']))
          {
              $this->logo_ul_name = $this->NM_ajax_info['param']['logo_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['logo_ul_type']))
          {
              $this->logo_ul_type = $this->NM_ajax_info['param']['logo_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['municipio']))
          {
              $this->municipio = $this->NM_ajax_info['param']['municipio'];
          }
          if (isset($this->NM_ajax_info['param']['naturaleza']))
          {
              $this->naturaleza = $this->NM_ajax_info['param']['naturaleza'];
          }
          if (isset($this->NM_ajax_info['param']['nit']))
          {
              $this->nit = $this->NM_ajax_info['param']['nit'];
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
          if (isset($this->NM_ajax_info['param']['nom_depto']))
          {
              $this->nom_depto = $this->NM_ajax_info['param']['nom_depto'];
          }
          if (isset($this->NM_ajax_info['param']['nombre_comercial']))
          {
              $this->nombre_comercial = $this->NM_ajax_info['param']['nombre_comercial'];
          }
          if (isset($this->NM_ajax_info['param']['nompais']))
          {
              $this->nompais = $this->NM_ajax_info['param']['nompais'];
          }
          if (isset($this->NM_ajax_info['param']['razonsoc']))
          {
              $this->razonsoc = $this->NM_ajax_info['param']['razonsoc'];
          }
          if (isset($this->NM_ajax_info['param']['regimen']))
          {
              $this->regimen = $this->NM_ajax_info['param']['regimen'];
          }
          if (isset($this->NM_ajax_info['param']['responsab_trib']))
          {
              $this->responsab_trib = $this->NM_ajax_info['param']['responsab_trib'];
          }
          if (isset($this->NM_ajax_info['param']['ruta_logo']))
          {
              $this->ruta_logo = $this->NM_ajax_info['param']['ruta_logo'];
          }
          if (isset($this->NM_ajax_info['param']['ruta_logo_limpa']))
          {
              $this->ruta_logo_limpa = $this->NM_ajax_info['param']['ruta_logo_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['ruta_logo_salva']))
          {
              $this->ruta_logo_salva = $this->NM_ajax_info['param']['ruta_logo_salva'];
          }
          if (isset($this->NM_ajax_info['param']['ruta_logo_ul_name']))
          {
              $this->ruta_logo_ul_name = $this->NM_ajax_info['param']['ruta_logo_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['ruta_logo_ul_type']))
          {
              $this->ruta_logo_ul_type = $this->NM_ajax_info['param']['ruta_logo_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['sucursal']))
          {
              $this->sucursal = $this->NM_ajax_info['param']['sucursal'];
          }
          if (isset($this->NM_ajax_info['param']['telefono']))
          {
              $this->telefono = $this->NM_ajax_info['param']['telefono'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_documento']))
          {
              $this->tipo_documento = $this->NM_ajax_info['param']['tipo_documento'];
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
      if (isset($this->gbd_seleccionada) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gbd_seleccionada'] = $this->gbd_seleccionada;
      }
      if (isset($this->empresa) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['empresa'] = $this->empresa;
      }
      if (isset($_POST["gbd_seleccionada"]) && isset($this->gbd_seleccionada)) 
      {
          $_SESSION['gbd_seleccionada'] = $this->gbd_seleccionada;
      }
      if (isset($_POST["empresa"]) && isset($this->empresa)) 
      {
          $_SESSION['empresa'] = $this->empresa;
      }
      if (isset($_GET["gbd_seleccionada"]) && isset($this->gbd_seleccionada)) 
      {
          $_SESSION['gbd_seleccionada'] = $this->gbd_seleccionada;
      }
      if (isset($_GET["empresa"]) && isset($this->empresa)) 
      {
          $_SESSION['empresa'] = $this->empresa;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_datosemp_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_datosemp_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_datosemp_mob']['embutida_parms']);
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
                 nm_limpa_str_form_datosemp_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->gbd_seleccionada)) 
          {
              $_SESSION['gbd_seleccionada'] = $this->gbd_seleccionada;
          }
          if (isset($this->empresa)) 
          {
              $_SESSION['empresa'] = $this->empresa;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_datosemp_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_datosemp_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_datosemp_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_datosemp_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->gbd_seleccionada)) 
          {
              $_SESSION['gbd_seleccionada'] = $this->gbd_seleccionada;
          }
          if (isset($this->empresa)) 
          {
              $_SESSION['empresa'] = $this->empresa;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_datosemp_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_datosemp_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_datosemp_mob']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_datosemp_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_datosemp_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_datosemp_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_datosemp_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_datosemp_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_datosemp_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_datosemp_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_datosemp_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_datosemp']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_datosemp'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_datosemp_mob']['upload_field_info'] = array();

      $_SESSION['sc_session'][$script_case_init]['form_datosemp_mob']['upload_field_info']['logo'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_datosemp_mob',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/\.(jpg|jpeg|gif|png)$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '',
          'upload_file_width'  => '',
          'upload_file_aspect' => '',
          'upload_file_type'   => 'A',
      );

      $_SESSION['sc_session'][$script_case_init]['form_datosemp_mob']['upload_field_info']['ruta_logo'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_datosemp_mob',
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

      $this->Ini->Init_apl_lig = array();
      $this->List_apl_lig = array('grid_codigos_ciiu'=>array('type'=>'cons', 'lab'=>'CÓDIGOS CIIU', 'hint'=>'', 'img_on'=>'grp__NM__ico__NM__icons8-feed-de-actividad-32.png', 'img_off'=>'grp__NM__ico__NM__icons8-feed-de-actividad-32.png'),'grid_codigo_postal'=>array('type'=>'cons', 'lab'=>'CÓDIGOS POSTALES', 'hint'=>'', 'img_on'=>'scriptcase__NM__ico__NM__mail_find_32.png', 'img_off'=>'scriptcase__NM__ico__NM__mail_find_32.png'));
      if (isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['sc_outra_jan'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['sc_modal']))
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_datosemp_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_datosemp_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_datosemp_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_datosemp_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_datosemp_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_datosemp_mob']['label'] = "DATOS DE LA EMPRESA";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_datosemp_mob")
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


      $this->arr_buttons['sc_btn_0']['hint']             = "Consultar Código Postal";
      $this->arr_buttons['sc_btn_0']['type']             = "image";
      $this->arr_buttons['sc_btn_0']['value']            = "Consultar Códigos Postales";
      $this->arr_buttons['sc_btn_0']['display']          = "only_img";
      $this->arr_buttons['sc_btn_0']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_0']['style']            = "";
      $this->arr_buttons['sc_btn_0']['image']            = "scriptcase__NM__ico__NM__mail_find_32.png";

      $this->arr_buttons['btn_recargar']['hint']             = "Recargar página";
      $this->arr_buttons['btn_recargar']['type']             = "button";
      $this->arr_buttons['btn_recargar']['value']            = "Recargar";
      $this->arr_buttons['btn_recargar']['display']          = "only_text";
      $this->arr_buttons['btn_recargar']['display_position'] = "text_right";
      $this->arr_buttons['btn_recargar']['style']            = "default";
      $this->arr_buttons['btn_recargar']['image']            = "";


      $_SESSION['scriptcase']['error_icon']['form_datosemp_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Lemon__NM__nm_scriptcase9_Lemon_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_datosemp_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      if (isset($this->NM_ajax_info['param']['logo_ul_name']) && '' != $this->NM_ajax_info['param']['logo_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['upload_field_ul_name'][$this->logo_ul_name]))
          {
              $this->NM_ajax_info['param']['logo_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['upload_field_ul_name'][$this->logo_ul_name];
          }
          $this->logo = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['logo_ul_name'];
          $this->logo_scfile_name = substr($this->NM_ajax_info['param']['logo_ul_name'], 12);
          $this->logo_scfile_type = $this->NM_ajax_info['param']['logo_ul_type'];
          $this->logo_ul_name = $this->NM_ajax_info['param']['logo_ul_name'];
          $this->logo_ul_type = $this->NM_ajax_info['param']['logo_ul_type'];
      }
      elseif (isset($this->logo_ul_name) && '' != $this->logo_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['upload_field_ul_name'][$this->logo_ul_name]))
          {
              $this->logo_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['upload_field_ul_name'][$this->logo_ul_name];
          }
          $this->logo = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->logo_ul_name;
          $this->logo_scfile_name = substr($this->logo_ul_name, 12);
          $this->logo_scfile_type = $this->logo_ul_type;
      }
      if (isset($this->NM_ajax_info['param']['ruta_logo_ul_name']) && '' != $this->NM_ajax_info['param']['ruta_logo_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['upload_field_ul_name'][$this->ruta_logo_ul_name]))
          {
              $this->NM_ajax_info['param']['ruta_logo_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['upload_field_ul_name'][$this->ruta_logo_ul_name];
          }
          $this->ruta_logo = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['ruta_logo_ul_name'];
          $this->ruta_logo_scfile_name = substr($this->NM_ajax_info['param']['ruta_logo_ul_name'], 12);
          $this->ruta_logo_scfile_type = $this->NM_ajax_info['param']['ruta_logo_ul_type'];
          $this->ruta_logo_ul_name = $this->NM_ajax_info['param']['ruta_logo_ul_name'];
          $this->ruta_logo_ul_type = $this->NM_ajax_info['param']['ruta_logo_ul_type'];
      }
      elseif (isset($this->ruta_logo_ul_name) && '' != $this->ruta_logo_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['upload_field_ul_name'][$this->ruta_logo_ul_name]))
          {
              $this->ruta_logo_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['upload_field_ul_name'][$this->ruta_logo_ul_name];
          }
          $this->ruta_logo = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->ruta_logo_ul_name;
          $this->ruta_logo_scfile_name = substr($this->ruta_logo_ul_name, 12);
          $this->ruta_logo_scfile_type = $this->ruta_logo_ul_type;
      }

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "off";
      $this->nmgp_botoes['new']  = "off";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['insert'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "off";
      $this->nmgp_botoes['first'] = "off";
      $this->nmgp_botoes['back'] = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last'] = "off";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "off";
      $this->nmgp_botoes['sc_btn_0'] = "on";
      $this->nmgp_botoes['btn_recargar'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_orig'] = " where iddatos=1";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_pesq'] = " where iddatos=1";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_datosemp_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_datosemp_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_datosemp_mob'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['dados_form'];
          if (!isset($this->nombre_archivo)){$this->nombre_archivo = $this->nmgp_dados_form['nombre_archivo'];} 
          if (!isset($this->tamanio)){$this->tamanio = $this->nmgp_dados_form['tamanio'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_datosemp_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'form_datosemp_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_datosemp_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_datosemp/form_datosemp_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_datosemp_mob_erro.class.php"); 
      }
      $this->Erro      = new form_datosemp_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['opcao']))
         { 
             if ($this->iddatos != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_datosemp_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['sc_btn_0'] = "on";
          $this->nmgp_botoes['btn_recargar'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['sc_btn_0'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['botoes']['sc_btn_0'];
          $this->nmgp_botoes['btn_recargar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['botoes']['btn_recargar'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['dados_form'];
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
      $_SESSION['scriptcase']['form_datosemp_mob']['contr_erro'] = 'on';
  	$this->NM_ajax_info['buttonDisplay']['insert'] = $this->nmgp_botoes["insert"] = "off";;
	$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;
$_SESSION['scriptcase']['form_datosemp_mob']['contr_erro'] = 'off'; 
      }
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['form_datosemp_mob']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['form_datosemp_mob']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
      if (isset($this->iddatos)) { $this->nm_limpa_alfa($this->iddatos); }
      if (isset($this->razonsoc)) { $this->nm_limpa_alfa($this->razonsoc); }
      if (isset($this->nit)) { $this->nm_limpa_alfa($this->nit); }
      if (isset($this->dv)) { $this->nm_limpa_alfa($this->dv); }
      if (isset($this->direccion)) { $this->nm_limpa_alfa($this->direccion); }
      if (isset($this->naturaleza)) { $this->nm_limpa_alfa($this->naturaleza); }
      if (isset($this->regimen)) { $this->nm_limpa_alfa($this->regimen); }
      if (isset($this->telefono)) { $this->nm_limpa_alfa($this->telefono); }
      if (isset($this->correo)) { $this->nm_limpa_alfa($this->correo); }
      if (isset($this->detalle_trib)) { $this->nm_limpa_alfa($this->detalle_trib); }
      if (isset($this->codigos_ciiu)) { $this->nm_limpa_alfa($this->codigos_ciiu); }
      if (isset($this->responsab_trib)) { $this->nm_limpa_alfa($this->responsab_trib); }
      if (isset($this->nombre_comercial)) { $this->nm_limpa_alfa($this->nombre_comercial); }
      if (isset($this->nompais)) { $this->nm_limpa_alfa($this->nompais); }
      if (isset($this->nom_depto)) { $this->nm_limpa_alfa($this->nom_depto); }
      if (isset($this->municipio)) { $this->nm_limpa_alfa($this->municipio); }
      if (isset($this->ciudad)) { $this->nm_limpa_alfa($this->ciudad); }
      if (isset($this->codigo_postal)) { $this->nm_limpa_alfa($this->codigo_postal); }
      if (isset($this->sucursal)) { $this->nm_limpa_alfa($this->sucursal); }
      if (isset($this->codigo_te)) { $this->nm_limpa_alfa($this->codigo_te); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['dados_select'];
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
      //-- iddatos
      $this->field_config['iddatos']               = array();
      $this->field_config['iddatos']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['iddatos']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['iddatos']['symbol_dec'] = '';
      $this->field_config['iddatos']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['iddatos']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
          if ('validate_codigo_te' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'codigo_te');
          }
          if ('validate_sucursal' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sucursal');
          }
          if ('validate_razonsoc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'razonsoc');
          }
          if ('validate_nombre_comercial' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nombre_comercial');
          }
          if ('validate_regimen' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'regimen');
          }
          if ('validate_naturaleza' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'naturaleza');
          }
          if ('validate_tipo_documento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_documento');
          }
          if ('validate_nit' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nit');
          }
          if ('validate_dv' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dv');
          }
          if ('validate_correo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'correo');
          }
          if ('validate_iddatos' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'iddatos');
          }
          if ('validate_nompais' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nompais');
          }
          if ('validate_nom_depto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nom_depto');
          }
          if ('validate_municipio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'municipio');
          }
          if ('validate_ciudad' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ciudad');
          }
          if ('validate_direccion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'direccion');
          }
          if ('validate_codigo_postal' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'codigo_postal');
          }
          if ('validate_telefono' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'telefono');
          }
          if ('validate_logo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'logo');
          }
          if ('validate_ruta_logo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ruta_logo');
          }
          if ('validate_detalle_trib' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'detalle_trib');
          }
          if ('validate_codigos_ciiu' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'codigos_ciiu');
          }
          if ('validate_ciiu' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ciiu');
          }
          if ('validate_responsab_trib' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'responsab_trib');
          }
          form_datosemp_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          if ('event_nit_onchange' == $this->NM_ajax_opcao)
          {
              $this->nit_onChange();
          }
          if ('event_tipo_documento_onchange' == $this->NM_ajax_opcao)
          {
              $this->tipo_documento_onChange();
          }
          form_datosemp_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_datosemp_mob_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_datosemp_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_datosemp_mob_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_datosemp_mob_pack_ajax_response();
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
          form_datosemp_mob_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_datosemp_mob.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("DATOS DE LA EMPRESA") ?></TITLE>
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
<form name="Fdown" method="get" action="form_datosemp_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_datosemp_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="form_datosemp_mob.php" target="_self" style="display: none"> 
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
           case 'codigo_te':
               return "TIPO ESTABLECIMIENTO**";
               break;
           case 'sucursal':
               return "CÓDIGO SUCURSAL**";
               break;
           case 'razonsoc':
               return "NOMBRES";
               break;
           case 'nombre_comercial':
               return "NOMBRE COMERCIAL";
               break;
           case 'regimen':
               return "RÉGIMEN";
               break;
           case 'naturaleza':
               return "NATURALEZA";
               break;
           case 'tipo_documento':
               return "TIPO DOCUMENTO";
               break;
           case 'nit':
               return "NIT o CÉDULA";
               break;
           case 'dv':
               return "DÍGITO VERIFICACIÓN";
               break;
           case 'correo':
               return "E-MAIL**";
               break;
           case 'iddatos':
               return "Iddatos";
               break;
           case 'nompais':
               return "PAÍS**";
               break;
           case 'nom_depto':
               return "DEPARTAMENTO**";
               break;
           case 'municipio':
               return "MUNICIPIO**";
               break;
           case 'ciudad':
               return "CIUDAD";
               break;
           case 'direccion':
               return "DIRECCIÓN**";
               break;
           case 'codigo_postal':
               return "CÓDIGO POSTAL**";
               break;
           case 'telefono':
               return "TELÉFONO/WHATSAPP ";
               break;
           case 'logo':
               return "LOGO EMPRESA";
               break;
           case 'ruta_logo':
               return "Ruta Logo";
               break;
           case 'detalle_trib':
               return "DETALLE TRIBUTARIO**";
               break;
           case 'codigos_ciiu':
               return "ACTIVIDAD ECONÓMICA (CIIU)**";
               break;
           case 'ciiu':
               return "CONSULTAR CIIU";
               break;
           case 'responsab_trib':
               return "RESPONSABILIDADES FISCALES**";
               break;
           case 'nombre_archivo':
               return "Nombre Archivo";
               break;
           case 'tamanio':
               return "Tamanio";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_datosemp_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_datosemp_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_datosemp_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_datosemp_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'codigo_te' == $filtro)
        $this->ValidateField_codigo_te($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sucursal' == $filtro)
        $this->ValidateField_sucursal($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'razonsoc' == $filtro)
        $this->ValidateField_razonsoc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nombre_comercial' == $filtro)
        $this->ValidateField_nombre_comercial($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'regimen' == $filtro)
        $this->ValidateField_regimen($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'naturaleza' == $filtro)
        $this->ValidateField_naturaleza($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tipo_documento' == $filtro)
        $this->ValidateField_tipo_documento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nit' == $filtro)
        $this->ValidateField_nit($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'dv' == $filtro)
        $this->ValidateField_dv($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'correo' == $filtro)
        $this->ValidateField_correo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'iddatos' == $filtro)
        $this->ValidateField_iddatos($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nompais' == $filtro)
        $this->ValidateField_nompais($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nom_depto' == $filtro)
        $this->ValidateField_nom_depto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'municipio' == $filtro)
        $this->ValidateField_municipio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ciudad' == $filtro)
        $this->ValidateField_ciudad($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'direccion' == $filtro)
        $this->ValidateField_direccion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'codigo_postal' == $filtro)
        $this->ValidateField_codigo_postal($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'telefono' == $filtro)
        $this->ValidateField_telefono($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'logo' == $filtro)
        $this->ValidateField_logo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ruta_logo' == $filtro)
        $this->ValidateField_ruta_logo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'detalle_trib' == $filtro)
        $this->ValidateField_detalle_trib($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'codigos_ciiu' == $filtro)
        $this->ValidateField_codigos_ciiu($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ciiu' == $filtro)
        $this->ValidateField_ciiu($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'responsab_trib' == $filtro)
        $this->ValidateField_responsab_trib($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_codigo_te(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->codigo_te) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigo_te']) && !in_array($this->codigo_te, $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigo_te']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['codigo_te']))
                   {
                       $Campos_Erros['codigo_te'] = array();
                   }
                   $Campos_Erros['codigo_te'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['codigo_te']) || !is_array($this->NM_ajax_info['errList']['codigo_te']))
                   {
                       $this->NM_ajax_info['errList']['codigo_te'] = array();
                   }
                   $this->NM_ajax_info['errList']['codigo_te'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'codigo_te';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_codigo_te

    function ValidateField_sucursal(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->sucursal) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_sucursal']) && !in_array($this->sucursal, $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_sucursal']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['sucursal']))
                   {
                       $Campos_Erros['sucursal'] = array();
                   }
                   $Campos_Erros['sucursal'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['sucursal']) || !is_array($this->NM_ajax_info['errList']['sucursal']))
                   {
                       $this->NM_ajax_info['errList']['sucursal'] = array();
                   }
                   $this->NM_ajax_info['errList']['sucursal'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sucursal';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sucursal

    function ValidateField_razonsoc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['php_cmp_required']['razonsoc']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['php_cmp_required']['razonsoc'] == "on")) 
      { 
          if ($this->razonsoc == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "NOMBRES" ; 
              if (!isset($Campos_Erros['razonsoc']))
              {
                  $Campos_Erros['razonsoc'] = array();
              }
              $Campos_Erros['razonsoc'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['razonsoc']) || !is_array($this->NM_ajax_info['errList']['razonsoc']))
                  {
                      $this->NM_ajax_info['errList']['razonsoc'] = array();
                  }
                  $this->NM_ajax_info['errList']['razonsoc'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->razonsoc) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "NOMBRES " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['razonsoc']))
              {
                  $Campos_Erros['razonsoc'] = array();
              }
              $Campos_Erros['razonsoc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['razonsoc']) || !is_array($this->NM_ajax_info['errList']['razonsoc']))
              {
                  $this->NM_ajax_info['errList']['razonsoc'] = array();
              }
              $this->NM_ajax_info['errList']['razonsoc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'razonsoc';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_razonsoc

    function ValidateField_nombre_comercial(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nombre_comercial) > 120) 
          { 
              $hasError = true;
              $Campos_Crit .= "NOMBRE COMERCIAL " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombre_comercial']))
              {
                  $Campos_Erros['nombre_comercial'] = array();
              }
              $Campos_Erros['nombre_comercial'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombre_comercial']) || !is_array($this->NM_ajax_info['errList']['nombre_comercial']))
              {
                  $this->NM_ajax_info['errList']['nombre_comercial'] = array();
              }
              $this->NM_ajax_info['errList']['nombre_comercial'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nombre_comercial';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nombre_comercial

    function ValidateField_regimen(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->regimen == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->regimen === "" || is_null($this->regimen))  
      { 
          $this->regimen = 0;
          $this->sc_force_zero[] = 'regimen';
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

    function ValidateField_naturaleza(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->naturaleza == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->naturaleza === "" || is_null($this->naturaleza))  
      { 
          $this->naturaleza = 0;
          $this->sc_force_zero[] = 'naturaleza';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'naturaleza';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_naturaleza

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

    function ValidateField_nit(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['php_cmp_required']['nit']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['php_cmp_required']['nit'] == "on")) 
      { 
          if ($this->nit == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "NIT o CÉDULA" ; 
              if (!isset($Campos_Erros['nit']))
              {
                  $Campos_Erros['nit'] = array();
              }
              $Campos_Erros['nit'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['nit']) || !is_array($this->NM_ajax_info['errList']['nit']))
                  {
                      $this->NM_ajax_info['errList']['nit'] = array();
                  }
                  $this->NM_ajax_info['errList']['nit'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nit) > 14) 
          { 
              $hasError = true;
              $Campos_Crit .= "NIT o CÉDULA " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 14 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nit']))
              {
                  $Campos_Erros['nit'] = array();
              }
              $Campos_Erros['nit'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 14 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nit']) || !is_array($this->NM_ajax_info['errList']['nit']))
              {
                  $this->NM_ajax_info['errList']['nit'] = array();
              }
              $this->NM_ajax_info['errList']['nit'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 14 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "0123456789ç0123456789Ç";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->nit ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->nit, $_SESSION['scriptcase']['charset']); $x++) 
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
              $Campos_Crit .= "NIT o CÉDULA " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['nit']))
              {
                  $Campos_Erros['nit'] = array();
              }
              $Campos_Erros['nit'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['nit']) || !is_array($this->NM_ajax_info['errList']['nit']))
              {
                  $this->NM_ajax_info['errList']['nit'] = array();
              }
              $this->NM_ajax_info['errList']['nit'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nit';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nit

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
                  $Campos_Crit .= "DÍGITO VERIFICACIÓN: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
                  $Campos_Crit .= "DÍGITO VERIFICACIÓN; " ; 
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

    function ValidateField_correo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->correo = sc_strtolower($this->correo); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->correo) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "E-MAIL** " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['correo']))
              {
                  $Campos_Erros['correo'] = array();
              }
              $Campos_Erros['correo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['correo']) || !is_array($this->NM_ajax_info['errList']['correo']))
              {
                  $this->NM_ajax_info['errList']['correo'] = array();
              }
              $this->NM_ajax_info['errList']['correo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'correo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_correo

    function ValidateField_iddatos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->iddatos === "" || is_null($this->iddatos))  
      { 
          $this->iddatos = 0;
      } 
      nm_limpa_numero($this->iddatos, $this->field_config['iddatos']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->iddatos != '')  
          { 
              $iTestSize = 1;
              if (strlen($this->iddatos) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Iddatos: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['iddatos']))
                  {
                      $Campos_Erros['iddatos'] = array();
                  }
                  $Campos_Erros['iddatos'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['iddatos']) || !is_array($this->NM_ajax_info['errList']['iddatos']))
                  {
                      $this->NM_ajax_info['errList']['iddatos'] = array();
                  }
                  $this->NM_ajax_info['errList']['iddatos'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->iddatos, 1, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Iddatos; " ; 
                  if (!isset($Campos_Erros['iddatos']))
                  {
                      $Campos_Erros['iddatos'] = array();
                  }
                  $Campos_Erros['iddatos'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['iddatos']) || !is_array($this->NM_ajax_info['errList']['iddatos']))
                  {
                      $this->NM_ajax_info['errList']['iddatos'] = array();
                  }
                  $this->NM_ajax_info['errList']['iddatos'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'iddatos';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_iddatos

    function ValidateField_nompais(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->nompais) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nompais']) && !in_array($this->nompais, $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nompais']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['nompais']))
                   {
                       $Campos_Erros['nompais'] = array();
                   }
                   $Campos_Erros['nompais'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['nompais']) || !is_array($this->NM_ajax_info['errList']['nompais']))
                   {
                       $this->NM_ajax_info['errList']['nompais'] = array();
                   }
                   $this->NM_ajax_info['errList']['nompais'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nompais';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nompais

    function ValidateField_nom_depto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->nom_depto) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nom_depto']) && !in_array($this->nom_depto, $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nom_depto']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['nom_depto']))
                   {
                       $Campos_Erros['nom_depto'] = array();
                   }
                   $Campos_Erros['nom_depto'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['nom_depto']) || !is_array($this->NM_ajax_info['errList']['nom_depto']))
                   {
                       $this->NM_ajax_info['errList']['nom_depto'] = array();
                   }
                   $this->NM_ajax_info['errList']['nom_depto'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nom_depto';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nom_depto

    function ValidateField_municipio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->municipio) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_municipio']) && !in_array($this->municipio, $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_municipio']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['municipio']))
                   {
                       $Campos_Erros['municipio'] = array();
                   }
                   $Campos_Erros['municipio'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['municipio']) || !is_array($this->NM_ajax_info['errList']['municipio']))
                   {
                       $this->NM_ajax_info['errList']['municipio'] = array();
                   }
                   $this->NM_ajax_info['errList']['municipio'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'municipio';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_municipio

    function ValidateField_ciudad(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->ciudad) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_ciudad']) && !in_array($this->ciudad, $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_ciudad']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['ciudad']))
                   {
                       $Campos_Erros['ciudad'] = array();
                   }
                   $Campos_Erros['ciudad'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['ciudad']) || !is_array($this->NM_ajax_info['errList']['ciudad']))
                   {
                       $this->NM_ajax_info['errList']['ciudad'] = array();
                   }
                   $this->NM_ajax_info['errList']['ciudad'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ciudad';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ciudad

    function ValidateField_direccion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->direccion) > 60) 
          { 
              $hasError = true;
              $Campos_Crit .= "DIRECCIÓN** " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
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

    function ValidateField_codigo_postal(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->codigo_postal) > 6) 
          { 
              $hasError = true;
              $Campos_Crit .= "CÓDIGO POSTAL** " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 6 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['codigo_postal']))
              {
                  $Campos_Erros['codigo_postal'] = array();
              }
              $Campos_Erros['codigo_postal'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 6 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['codigo_postal']) || !is_array($this->NM_ajax_info['errList']['codigo_postal']))
              {
                  $this->NM_ajax_info['errList']['codigo_postal'] = array();
              }
              $this->NM_ajax_info['errList']['codigo_postal'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 6 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'codigo_postal';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_codigo_postal

    function ValidateField_telefono(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->telefono = sc_strtoupper($this->telefono); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->telefono) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "TELÉFONO/WHATSAPP  " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['telefono']))
              {
                  $Campos_Erros['telefono'] = array();
              }
              $Campos_Erros['telefono'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['telefono']) || !is_array($this->NM_ajax_info['errList']['telefono']))
              {
                  $this->NM_ajax_info['errList']['telefono'] = array();
              }
              $this->NM_ajax_info['errList']['telefono'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'telefono';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_telefono

    function ValidateField_logo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->logo;
            if ("" != $this->logo && "S" != $this->logo_limpa && !$teste_validade->ArqExtensao($this->logo, array('jpg', 'jpeg', 'gif', 'png')))
            {
                $hasError = true;
                $Campos_Crit .= "LOGO EMPRESA: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['logo']))
                {
                    $Campos_Erros['logo'] = array();
                }
                $Campos_Erros['logo'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['logo']) || !is_array($this->NM_ajax_info['errList']['logo']))
                {
                    $this->NM_ajax_info['errList']['logo'] = array();
                }
                $this->NM_ajax_info['errList']['logo'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
            if (!$hasError && "" != $this->logo && "S" != $this->logo_limpa) {
                if (!function_exists('sc_upload_unprotect_chars')) {
                    include_once 'form_datosemp_mob_doc_name.php';
                }
                $pathParts = pathinfo(sc_upload_unprotect_chars($sTestFile));
                $fileSize = filesize(sc_upload_unprotect_chars($sTestFile));
                $sizeErrorSuffix = '';
                if ($hasError) {
                    $Campos_Crit .= "LOGO EMPRESA: " . $this->Ini->Nm_lang['lang_errm_file_size'] . $sizeErrorSuffix;
                    if (!isset($Campos_Erros['logo']))
                    {
                        $Campos_Erros['logo'] = array();
                    }
                    $Campos_Erros['logo'][] = $this->Ini->Nm_lang['lang_errm_file_size'] . $sizeErrorSuffix;
                    if (!isset($this->NM_ajax_info['errList']['logo']) || !is_array($this->NM_ajax_info['errList']['logo']))
                    {
                        $this->NM_ajax_info['errList']['logo'] = array();
                    }
                    $this->NM_ajax_info['errList']['logo'][] = $this->Ini->Nm_lang['lang_errm_file_size'] . $sizeErrorSuffix;
                }
            }
        }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'logo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_logo

    function ValidateField_ruta_logo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->ruta_logo;
            if ("" != $this->ruta_logo && "S" != $this->ruta_logo_limpa && !$teste_validade->ArqExtensao($this->ruta_logo, array()))
            {
                $hasError = true;
                $Campos_Crit .= "Ruta Logo: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['ruta_logo']))
                {
                    $Campos_Erros['ruta_logo'] = array();
                }
                $Campos_Erros['ruta_logo'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['ruta_logo']) || !is_array($this->NM_ajax_info['errList']['ruta_logo']))
                {
                    $this->NM_ajax_info['errList']['ruta_logo'] = array();
                }
                $this->NM_ajax_info['errList']['ruta_logo'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
        }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ruta_logo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ruta_logo

    function ValidateField_detalle_trib(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->detalle_trib) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_detalle_trib']) && !in_array($this->detalle_trib, $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_detalle_trib']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['detalle_trib']))
                   {
                       $Campos_Erros['detalle_trib'] = array();
                   }
                   $Campos_Erros['detalle_trib'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['detalle_trib']) || !is_array($this->NM_ajax_info['errList']['detalle_trib']))
                   {
                       $this->NM_ajax_info['errList']['detalle_trib'] = array();
                   }
                   $this->NM_ajax_info['errList']['detalle_trib'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'detalle_trib';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_detalle_trib

    function ValidateField_codigos_ciiu(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->codigos_ciiu) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigos_ciiu']) && !in_array($this->codigos_ciiu, $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigos_ciiu']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['codigos_ciiu']))
                   {
                       $Campos_Erros['codigos_ciiu'] = array();
                   }
                   $Campos_Erros['codigos_ciiu'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['codigos_ciiu']) || !is_array($this->NM_ajax_info['errList']['codigos_ciiu']))
                   {
                       $this->NM_ajax_info['errList']['codigos_ciiu'] = array();
                   }
                   $this->NM_ajax_info['errList']['codigos_ciiu'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'codigos_ciiu';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_codigos_ciiu

    function ValidateField_ciiu(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->ciiu) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ciiu';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ciiu

    function ValidateField_responsab_trib(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->responsab_trib) > 120) 
          { 
              $hasError = true;
              $Campos_Crit .= "RESPONSABILIDADES FISCALES** " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['responsab_trib']))
              {
                  $Campos_Erros['responsab_trib'] = array();
              }
              $Campos_Erros['responsab_trib'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['responsab_trib']) || !is_array($this->NM_ajax_info['errList']['responsab_trib']))
              {
                  $this->NM_ajax_info['errList']['responsab_trib'] = array();
              }
              $this->NM_ajax_info['errList']['responsab_trib'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'responsab_trib';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_responsab_trib
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
          if ($this->logo == "none") 
          { 
              $this->logo = ""; 
          } 
          if ($this->logo != "") 
          { 
              if (!function_exists('sc_upload_unprotect_chars'))
              {
                  include_once 'form_datosemp_mob_doc_name.php';
              }
              $this->logo = sc_upload_unprotect_chars($this->logo);
              $this->logo_scfile_name = sc_upload_unprotect_chars($this->logo_scfile_name);
              if (is_file($this->logo))  
              { 
                  $this->NM_size_docs[$this->logo_scfile_name] = $this->sc_file_size($this->logo);
                  $this->nombre_archivo = $this->logo_scfile_name;
                  $this->tamanio = $this->NM_size_docs[$this->logo_scfile_name];
                  $reg_logo = file_get_contents($this->logo); 
                  $this->logo = $reg_logo; 
              } 
              else 
              { 
                  $Campos_Crit .= "LOGO EMPRESA " . $this->Ini->Nm_lang['lang_errm_upld']; 
                  $this->logo = "";
                  if (!isset($Campos_Erros['logo']))
                  {
                      $Campos_Erros['logo'] = array();
                  }
                  $Campos_Erros['logo'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  if (!isset($this->NM_ajax_info['errList']['logo']) || !is_array($this->NM_ajax_info['errList']['logo']))
                  {
                      $this->NM_ajax_info['errList']['logo'] = array();
                  }
                  $this->NM_ajax_info['errList']['logo'][] = $this->Ini->Nm_lang['lang_errm_upld'];
              } 
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->ruta_logo == "none") 
          { 
              $this->ruta_logo = ""; 
          } 
          if ($this->ruta_logo != "") 
          { 
              if (!function_exists('sc_upload_unprotect_chars'))
              {
                  include_once 'form_datosemp_mob_doc_name.php';
              }
              $this->ruta_logo = sc_upload_unprotect_chars($this->ruta_logo);
              $this->ruta_logo_scfile_name = sc_upload_unprotect_chars($this->ruta_logo_scfile_name);
              if ($nm_browser == "Opera")  
              { 
                  $this->ruta_logo_scfile_type = substr($this->ruta_logo_scfile_type, 0, strpos($this->ruta_logo_scfile_type, ";")) ; 
              } 
              if ($this->ruta_logo_scfile_type == "image/pjpeg" || $this->ruta_logo_scfile_type == "image/jpeg" || $this->ruta_logo_scfile_type == "image/gif" ||  
                  $this->ruta_logo_scfile_type == "image/png" || $this->ruta_logo_scfile_type == "image/x-png" || $this->ruta_logo_scfile_type == "image/bmp")  
              { 
                  if (is_file($this->ruta_logo))  
                  { 
                      $this->NM_size_docs[$this->ruta_logo_scfile_name] = $this->sc_file_size($this->ruta_logo);
                      if ($this->nmgp_opcao == "incluir")
                      { 
                          $this->SC_IMG_ruta_logo = $this->ruta_logo;
                      } 
                      else 
                      { 
                          $arq_ruta_logo = fopen($this->ruta_logo, "r") ; 
                          $reg_ruta_logo = fread($arq_ruta_logo, filesize($this->ruta_logo)) ; 
                          fclose($arq_ruta_logo) ;  
                      } 
                      $this->ruta_logo =  trim($this->ruta_logo_scfile_name) ;  
                      $dir_img = $this->Ini->root . $this->Ini->path_imagens . "/logos/" . $_SESSION['gbd_seleccionada'] . "/" . "/"; 
                     if ($this->nmgp_opcao != "incluir")
                     { 
                      if (nm_mkdir($dir_img))  
                      { 
                          $arq_ruta_logo = fopen($dir_img . trim($this->ruta_logo_scfile_name), "w") ; 
                          fwrite($arq_ruta_logo, $reg_ruta_logo) ;  
                          fclose($arq_ruta_logo) ;  
                      } 
                      else 
                      { 
                          $Campos_Crit .= "Ruta Logo: " . $this->Ini->Nm_lang['lang_errm_ivdr']; 
                          $this->ruta_logo = "";
                          if (!isset($Campos_Erros['ruta_logo']))
                          {
                              $Campos_Erros['ruta_logo'] = array();
                          }
                          $Campos_Erros['ruta_logo'][] = $this->Ini->Nm_lang['lang_errm_ivdr'];
                          if (!isset($this->NM_ajax_info['errList']['ruta_logo']) || !is_array($this->NM_ajax_info['errList']['ruta_logo']))
                          {
                              $this->NM_ajax_info['errList']['ruta_logo'] = array();
                          }
                          $this->NM_ajax_info['errList']['ruta_logo'][] = $this->Ini->Nm_lang['lang_errm_ivdr'];
                      } 
                     } 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "Ruta Logo " . $this->Ini->Nm_lang['lang_errm_upld']; 
                      $this->ruta_logo = "";
                      if (!isset($Campos_Erros['ruta_logo']))
                      {
                          $Campos_Erros['ruta_logo'] = array();
                      }
                      $Campos_Erros['ruta_logo'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                      if (!isset($this->NM_ajax_info['errList']['ruta_logo']) || !is_array($this->NM_ajax_info['errList']['ruta_logo']))
                      {
                          $this->NM_ajax_info['errList']['ruta_logo'] = array();
                      }
                      $this->NM_ajax_info['errList']['ruta_logo'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  } 
              } 
              else 
              { 
                  if ($nm_browser == "Konqueror")  
                  { 
                      $this->ruta_logo = "" ; 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "Ruta Logo " . $this->Ini->Nm_lang['lang_errm_ivtp']; 
                      if (!isset($Campos_Erros['ruta_logo']))
                      {
                          $Campos_Erros['ruta_logo'] = array();
                      }
                      $Campos_Erros['ruta_logo'][] = $this->Ini->Nm_lang['geracao_tp_inval'];
                      if (!isset($this->NM_ajax_info['errList']['ruta_logo']) || !is_array($this->NM_ajax_info['errList']['ruta_logo']))
                      {
                          $this->NM_ajax_info['errList']['ruta_logo'] = array();
                      }
                      $this->NM_ajax_info['errList']['ruta_logo'][] = $this->Ini->Nm_lang['geracao_tp_inval'];
                  } 
              } 
          } 
          elseif (!empty($this->ruta_logo_salva) && $this->ruta_logo_limpa != "S")
          {
              $this->ruta_logo = $this->ruta_logo_salva;
          }
      } 
      elseif (!empty($this->ruta_logo_salva) && $this->ruta_logo_limpa != "S")
      {
          $this->ruta_logo = $this->ruta_logo_salva;
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
    $this->nmgp_dados_form['codigo_te'] = $this->codigo_te;
    $this->nmgp_dados_form['sucursal'] = $this->sucursal;
    $this->nmgp_dados_form['razonsoc'] = $this->razonsoc;
    $this->nmgp_dados_form['nombre_comercial'] = $this->nombre_comercial;
    $this->nmgp_dados_form['regimen'] = $this->regimen;
    $this->nmgp_dados_form['naturaleza'] = $this->naturaleza;
    $this->nmgp_dados_form['tipo_documento'] = $this->tipo_documento;
    $this->nmgp_dados_form['nit'] = $this->nit;
    $this->nmgp_dados_form['dv'] = $this->dv;
    $this->nmgp_dados_form['correo'] = $this->correo;
    $this->nmgp_dados_form['iddatos'] = $this->iddatos;
    $this->nmgp_dados_form['nompais'] = $this->nompais;
    $this->nmgp_dados_form['nom_depto'] = $this->nom_depto;
    $this->nmgp_dados_form['municipio'] = $this->municipio;
    $this->nmgp_dados_form['ciudad'] = $this->ciudad;
    $this->nmgp_dados_form['direccion'] = $this->direccion;
    $this->nmgp_dados_form['codigo_postal'] = $this->codigo_postal;
    $this->nmgp_dados_form['telefono'] = $this->telefono;
    if (empty($this->logo))
    {
        $this->logo = $this->nmgp_dados_form['logo'];
    }
    $this->nmgp_dados_form['logo'] = $this->logo;
    $this->nmgp_dados_form['logo_limpa'] = $this->logo_limpa;
    if (empty($this->ruta_logo))
    {
        $this->ruta_logo = $this->nmgp_dados_form['ruta_logo'];
    }
    $this->nmgp_dados_form['ruta_logo'] = $this->ruta_logo;
    $this->nmgp_dados_form['ruta_logo_limpa'] = $this->ruta_logo_limpa;
    $this->nmgp_dados_form['detalle_trib'] = $this->detalle_trib;
    $this->nmgp_dados_form['codigos_ciiu'] = $this->codigos_ciiu;
    $this->nmgp_dados_form['ciiu'] = $this->ciiu;
    $this->nmgp_dados_form['responsab_trib'] = $this->responsab_trib;
    $this->nmgp_dados_form['nombre_archivo'] = $this->nombre_archivo;
    $this->nmgp_dados_form['tamanio'] = $this->tamanio;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['dv'] = $this->dv;
      nm_limpa_numero($this->dv, $this->field_config['dv']['symbol_grp']) ; 
      $this->Before_unformat['iddatos'] = $this->iddatos;
      nm_limpa_numero($this->iddatos, $this->field_config['iddatos']['symbol_grp']) ; 
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
      if ($Nome_Campo == "iddatos")
      {
          nm_limpa_numero($this->iddatos, $this->field_config['iddatos']['symbol_grp']) ; 
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
      if ('' !== $this->iddatos || (!empty($format_fields) && isset($format_fields['iddatos'])))
      {
          nmgp_Form_Num_Val($this->iddatos, $this->field_config['iddatos']['symbol_grp'], $this->field_config['iddatos']['symbol_dec'], "0", "S", $this->field_config['iddatos']['format_neg'], "", "", "-", $this->field_config['iddatos']['symbol_fmt']) ; 
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
          $this->ajax_return_values_codigo_te();
          $this->ajax_return_values_sucursal();
          $this->ajax_return_values_razonsoc();
          $this->ajax_return_values_nombre_comercial();
          $this->ajax_return_values_regimen();
          $this->ajax_return_values_naturaleza();
          $this->ajax_return_values_tipo_documento();
          $this->ajax_return_values_nit();
          $this->ajax_return_values_dv();
          $this->ajax_return_values_correo();
          $this->ajax_return_values_iddatos();
          $this->ajax_return_values_nompais();
          $this->ajax_return_values_nom_depto();
          $this->ajax_return_values_municipio();
          $this->ajax_return_values_ciudad();
          $this->ajax_return_values_direccion();
          $this->ajax_return_values_codigo_postal();
          $this->ajax_return_values_telefono();
          $this->ajax_return_values_logo();
          $this->ajax_return_values_ruta_logo();
          $this->ajax_return_values_detalle_trib();
          $this->ajax_return_values_codigos_ciiu();
          $this->ajax_return_values_ciiu();
          $this->ajax_return_values_responsab_trib();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['iddatos']['keyVal'] = form_datosemp_mob_pack_protect_string($this->nmgp_dados_form['iddatos']);
          }
   } // ajax_return_values

          //----- codigo_te
   function ajax_return_values_codigo_te($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("codigo_te", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->codigo_te);
              $aLookup = array();
              $this->_tmp_lookup_codigo_te = $this->codigo_te;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigo_te']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigo_te'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigo_te']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigo_te'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo_te, codigo_te + ' - ' + descripcion_te  FROM tipos_establecimientos  ORDER BY codigo_te, descripcion_te";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo_te, concat(codigo_te, ' - ',descripcion_te)  FROM tipos_establecimientos  ORDER BY codigo_te, descripcion_te";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo_te, codigo_te&' - '&descripcion_te  FROM tipos_establecimientos  ORDER BY codigo_te, descripcion_te";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo_te, codigo_te||' - '||descripcion_te  FROM tipos_establecimientos  ORDER BY codigo_te, descripcion_te";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo_te, codigo_te + ' - ' + descripcion_te  FROM tipos_establecimientos  ORDER BY codigo_te, descripcion_te";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo_te, codigo_te||' - '||descripcion_te  FROM tipos_establecimientos  ORDER BY codigo_te, descripcion_te";
   }
   else
   {
       $nm_comando = "SELECT codigo_te, codigo_te||' - '||descripcion_te  FROM tipos_establecimientos  ORDER BY codigo_te, descripcion_te";
   }

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_datosemp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_datosemp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigo_te'][] = $rs->fields[0];
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
          $sSelComp = "name=\"codigo_te\"";
          if (isset($this->NM_ajax_info['select_html']['codigo_te']) && !empty($this->NM_ajax_info['select_html']['codigo_te']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['codigo_te']);
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

                  if ($this->codigo_te == $sValue)
                  {
                      $this->_tmp_lookup_codigo_te = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['codigo_te'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['codigo_te']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['codigo_te']['valList'][$i] = form_datosemp_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['codigo_te']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['codigo_te']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['codigo_te']['labList'] = $aLabel;
          }
   }

          //----- sucursal
   function ajax_return_values_sucursal($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sucursal", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sucursal);
              $aLookup = array();
              $this->_tmp_lookup_sucursal = $this->sucursal;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_sucursal']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_sucursal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_sucursal']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_sucursal'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo_suc, codigo_suc + ' - ' + observacion_suc  FROM sucursales  ORDER BY codigo_suc, observacion_suc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo_suc, concat(codigo_suc,' - ', observacion_suc)  FROM sucursales  ORDER BY codigo_suc, observacion_suc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo_suc, codigo_suc&' - '&observacion_suc  FROM sucursales  ORDER BY codigo_suc, observacion_suc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo_suc, codigo_suc||' - '||observacion_suc  FROM sucursales  ORDER BY codigo_suc, observacion_suc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo_suc, codigo_suc + ' - ' + observacion_suc  FROM sucursales  ORDER BY codigo_suc, observacion_suc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo_suc, codigo_suc||' - '||observacion_suc  FROM sucursales  ORDER BY codigo_suc, observacion_suc";
   }
   else
   {
       $nm_comando = "SELECT codigo_suc, codigo_suc||' - '||observacion_suc  FROM sucursales  ORDER BY codigo_suc, observacion_suc";
   }

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_datosemp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_datosemp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_sucursal'][] = $rs->fields[0];
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
          $sSelComp = "name=\"sucursal\"";
          if (isset($this->NM_ajax_info['select_html']['sucursal']) && !empty($this->NM_ajax_info['select_html']['sucursal']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['sucursal']);
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

                  if ($this->sucursal == $sValue)
                  {
                      $this->_tmp_lookup_sucursal = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['sucursal'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['sucursal']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['sucursal']['valList'][$i] = form_datosemp_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['sucursal']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['sucursal']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['sucursal']['labList'] = $aLabel;
          }
   }

          //----- razonsoc
   function ajax_return_values_razonsoc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("razonsoc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->razonsoc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['razonsoc'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nombre_comercial
   function ajax_return_values_nombre_comercial($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombre_comercial", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nombre_comercial);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nombre_comercial'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
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

$aLookup[] = array(form_datosemp_mob_pack_protect_string('0') => str_replace('<', '&lt;',form_datosemp_mob_pack_protect_string("No responsable de IVA")));
$aLookup[] = array(form_datosemp_mob_pack_protect_string('1') => str_replace('<', '&lt;',form_datosemp_mob_pack_protect_string("Responsable de IVA")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_regimen'][] = '0';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_regimen'][] = '1';
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
              $this->NM_ajax_info['fldList']['regimen']['valList'][$i] = form_datosemp_mob_pack_protect_string($v);
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

          //----- naturaleza
   function ajax_return_values_naturaleza($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("naturaleza", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->naturaleza);
              $aLookup = array();
              $this->_tmp_lookup_naturaleza = $this->naturaleza;

$aLookup[] = array(form_datosemp_mob_pack_protect_string('1') => str_replace('<', '&lt;',form_datosemp_mob_pack_protect_string("Natural")));
$aLookup[] = array(form_datosemp_mob_pack_protect_string('2') => str_replace('<', '&lt;',form_datosemp_mob_pack_protect_string("Jurídica")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_naturaleza'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_naturaleza'][] = '2';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"naturaleza\"";
          if (isset($this->NM_ajax_info['select_html']['naturaleza']) && !empty($this->NM_ajax_info['select_html']['naturaleza']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['naturaleza']);
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

                  if ($this->naturaleza == $sValue)
                  {
                      $this->_tmp_lookup_naturaleza = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['naturaleza'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['naturaleza']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['naturaleza']['valList'][$i] = form_datosemp_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['naturaleza']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['naturaleza']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['naturaleza']['labList'] = $aLabel;
          }
   }

          //----- tipo_documento
   function ajax_return_values_tipo_documento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_documento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo_documento);
              $aLookup = array();
              $this->_tmp_lookup_tipo_documento = $this->tipo_documento;

$aLookup[] = array(form_datosemp_mob_pack_protect_string('11') => str_replace('<', '&lt;',form_datosemp_mob_pack_protect_string("Registro civil de nacimiento")));
$aLookup[] = array(form_datosemp_mob_pack_protect_string('12') => str_replace('<', '&lt;',form_datosemp_mob_pack_protect_string("Tarjeta de identidad")));
$aLookup[] = array(form_datosemp_mob_pack_protect_string('13') => str_replace('<', '&lt;',form_datosemp_mob_pack_protect_string("Cédula de ciudadanía")));
$aLookup[] = array(form_datosemp_mob_pack_protect_string('21') => str_replace('<', '&lt;',form_datosemp_mob_pack_protect_string("Tarjeta de Extranjería")));
$aLookup[] = array(form_datosemp_mob_pack_protect_string('22') => str_replace('<', '&lt;',form_datosemp_mob_pack_protect_string("Cédula de extranjería")));
$aLookup[] = array(form_datosemp_mob_pack_protect_string('31') => str_replace('<', '&lt;',form_datosemp_mob_pack_protect_string("Nit")));
$aLookup[] = array(form_datosemp_mob_pack_protect_string('41') => str_replace('<', '&lt;',form_datosemp_mob_pack_protect_string("Pasaporte")));
$aLookup[] = array(form_datosemp_mob_pack_protect_string('42') => str_replace('<', '&lt;',form_datosemp_mob_pack_protect_string("Tipo de documento extranjero")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_tipo_documento'][] = '11';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_tipo_documento'][] = '12';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_tipo_documento'][] = '13';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_tipo_documento'][] = '21';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_tipo_documento'][] = '22';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_tipo_documento'][] = '31';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_tipo_documento'][] = '41';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_tipo_documento'][] = '42';
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
              $this->NM_ajax_info['fldList']['tipo_documento']['valList'][$i] = form_datosemp_mob_pack_protect_string($v);
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

          //----- nit
   function ajax_return_values_nit($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nit", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nit);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nit'] = array(
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

          //----- correo
   function ajax_return_values_correo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("correo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->correo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['correo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- iddatos
   function ajax_return_values_iddatos($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("iddatos", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->iddatos);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['iddatos'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("iddatos", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- nompais
   function ajax_return_values_nompais($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nompais", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nompais);
              $aLookup = array();
              $this->_tmp_lookup_nompais = $this->nompais;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nompais']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nompais'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nompais']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nompais'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   $nm_comando = "SELECT nompais, nompais  FROM paises  ORDER BY nompais";

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_datosemp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_datosemp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nompais'][] = $rs->fields[0];
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
          $sSelComp = "name=\"nompais\"";
          if (isset($this->NM_ajax_info['select_html']['nompais']) && !empty($this->NM_ajax_info['select_html']['nompais']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['nompais']);
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

                  if ($this->nompais == $sValue)
                  {
                      $this->_tmp_lookup_nompais = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['nompais'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['nompais']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['nompais']['valList'][$i] = form_datosemp_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['nompais']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['nompais']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['nompais']['labList'] = $aLabel;
          }
   }

          //----- nom_depto
   function ajax_return_values_nom_depto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nom_depto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nom_depto);
              $aLookup = array();
              $this->_tmp_lookup_nom_depto = $this->nom_depto;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nom_depto']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nom_depto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nom_depto']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nom_depto'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT departamento, cod_iso3166 + ' - ' + departamento  FROM departamento  ORDER BY departamento, cod_iso3166";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT departamento, concat(cod_iso3166, ' - ',departamento)  FROM departamento  ORDER BY departamento, cod_iso3166";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT departamento, cod_iso3166&' - '&departamento  FROM departamento  ORDER BY departamento, cod_iso3166";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT departamento, cod_iso3166||' - '||departamento  FROM departamento  ORDER BY departamento, cod_iso3166";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT departamento, cod_iso3166 + ' - ' + departamento  FROM departamento  ORDER BY departamento, cod_iso3166";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT departamento, cod_iso3166||' - '||departamento  FROM departamento  ORDER BY departamento, cod_iso3166";
   }
   else
   {
       $nm_comando = "SELECT departamento, cod_iso3166||' - '||departamento  FROM departamento  ORDER BY departamento, cod_iso3166";
   }

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_datosemp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_datosemp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nom_depto'][] = $rs->fields[0];
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
          $sSelComp = "name=\"nom_depto\"";
          if (isset($this->NM_ajax_info['select_html']['nom_depto']) && !empty($this->NM_ajax_info['select_html']['nom_depto']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['nom_depto']);
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

                  if ($this->nom_depto == $sValue)
                  {
                      $this->_tmp_lookup_nom_depto = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['nom_depto'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['nom_depto']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['nom_depto']['valList'][$i] = form_datosemp_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['nom_depto']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['nom_depto']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['nom_depto']['labList'] = $aLabel;
          }
   }

          //----- municipio
   function ajax_return_values_municipio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("municipio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->municipio);
              $aLookup = array();
              $this->_tmp_lookup_municipio = $this->municipio;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_municipio']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_municipio'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_municipio']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_municipio'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   $nm_comando = "SELECT idmun, municipio  FROM municipio  WHERE iddepar=(SELECT iddep from departamento where departamento like '$this->nom_depto') ORDER BY municipio";

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_datosemp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_datosemp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_municipio'][] = $rs->fields[0];
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
          $sSelComp = "name=\"municipio\"";
          if (isset($this->NM_ajax_info['select_html']['municipio']) && !empty($this->NM_ajax_info['select_html']['municipio']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['municipio']);
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

                  if ($this->municipio == $sValue)
                  {
                      $this->_tmp_lookup_municipio = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['municipio'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['municipio']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['municipio']['valList'][$i] = form_datosemp_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['municipio']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['municipio']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['municipio']['labList'] = $aLabel;
          }
   }

          //----- ciudad
   function ajax_return_values_ciudad($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ciudad", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ciudad);
              $aLookup = array();
              $this->_tmp_lookup_ciudad = $this->ciudad;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_ciudad']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_ciudad'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_ciudad']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_ciudad'] = array(); 
}
if ($this->municipio != "")
{ 
   $this->nm_clear_val("municipio");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   $nm_comando = "SELECT municipio FROM municipio  WHERE idmun=$this->municipio ORDER BY municipio";

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_datosemp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_datosemp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0]))));
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_ciudad'][] = $rs->fields[0];
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
} 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"ciudad\"";
          if (isset($this->NM_ajax_info['select_html']['ciudad']) && !empty($this->NM_ajax_info['select_html']['ciudad']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ciudad']);
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

                  if ($this->ciudad == $sValue)
                  {
                      $this->_tmp_lookup_ciudad = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['ciudad'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ciudad']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ciudad']['valList'][$i] = form_datosemp_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ciudad']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ciudad']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ciudad']['labList'] = $aLabel;
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

          //----- codigo_postal
   function ajax_return_values_codigo_postal($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("codigo_postal", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->codigo_postal);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['codigo_postal'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- telefono
   function ajax_return_values_telefono($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("telefono", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->telefono);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['telefono'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- logo
   function ajax_return_values_logo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("logo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->logo);
              $aLookup = array();
              $sTmpExtension = pathinfo($this->nombre_archivo, PATHINFO_EXTENSION);
              $sTmpExtension = null == $sTmpExtension ? '' : '.' . $sTmpExtension;
              $sTmpFile      = 'sc_logo_' . md5(mt_rand(1, 1000) . microtime() . session_id()) . $sTmpExtension;
   if ($this->logo != "" && $this->logo != "none")   
   { 
       $out_logo = $this->Ini->path_imag_temp . "/" . $sTmpFile;
       $arq_logo = fopen($this->Ini->root . $out_logo, "w") ;  
       if (substr($this->logo, 0, 4) == "*nm*" && (strstr(strtoupper($this->Ini->nm_tpbanco),"MSSQL") || strstr(strtoupper($this->Ini->nm_tpbanco),"PDOSQLITE"))) 
       { 
           $this->logo = base64_decode($this->logo) ; 
       } 
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
       {
           $this->logo = str_replace("''", "'", $this->logo);
       }
       fwrite($arq_logo, $this->logo) ;  
       fclose($arq_logo) ;  
       if (isset($this->NM_size_docs[$nombre_archivo]))
       {
           if ($this->NM_size_docs[$nombre_archivo] != filesize($this->Ini->root . $out_logo))
           {
           }
       }
   } 
              if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['download_filenames']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['download_filenames'] = array();
              }
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['download_filenames'][$sTmpFile] = $this->nombre_archivo;
              $tmp_file_logo = trim(NM_charset_to_utf8($this->nombre_archivo));
              $tmp_icon_logo = '';
              if ('' != $tmp_file_logo)
              {
                  $tmp_icon_logo = $this->gera_icone($tmp_file_logo);
              }
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['logo'] = array(
                       'row'    => '',
               'type'    => 'documento',
               'valList' => array($tmp_file_logo),
               'docLink' => "<a href=\"javascript:nm_mostra_doc('documento_db', '" . substr($sTmpFile, 3) . "', 'form_datosemp')\">" . $tmp_file_logo . "</a>",
               'docIcon' => $tmp_icon_logo,
               'docReadonly' => "N",
              );
          }
   }

          //----- ruta_logo
   function ajax_return_values_ruta_logo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ruta_logo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ruta_logo);
              $aLookup = array();
   $out_ruta_logo = '';
   $out1_ruta_logo = '';
   if ($this->ruta_logo != "" && $this->ruta_logo != "none")   
   { 
       $path_ruta_logo = $this->Ini->root . $this->Ini->path_imagens . "/logos/" . $_SESSION['gbd_seleccionada'] . "/" . "/" . $this->ruta_logo;
       $md5_ruta_logo  = md5("/logos/" . $_SESSION['gbd_seleccionada'] . "/" . $this->ruta_logo);
       nm_fix_SubDirUpload($this->ruta_logo,$this->Ini->root . $this->Ini->path_imagens,"/logos/" . $_SESSION['gbd_seleccionada'] . "/");
        if (is_file($path_ruta_logo))  
       { 
           $NM_ler_img = true;
           $out_ruta_logo = $this->Ini->path_imag_temp . "/sc_ruta_logo_" . $md5_ruta_logo . ".gif" ;  
           $out1_ruta_logo = $out_ruta_logo; 
           if (is_file($this->Ini->root . $out_ruta_logo))  
           { 
               $NM_img_time = filemtime($this->Ini->root . $out_ruta_logo) + 0; 
               if ($this->Ini->nm_timestamp < $NM_img_time)  
               { 
                   $NM_ler_img = false;
               } 
           } 
           if ($NM_ler_img) 
           { 
               $tmp_ruta_logo = fopen($path_ruta_logo, "r") ; 
               $reg_ruta_logo = fread($tmp_ruta_logo, filesize($path_ruta_logo)) ; 
               fclose($tmp_ruta_logo) ;  
               $arq_ruta_logo = fopen($this->Ini->root . $out_ruta_logo, "w") ;  
               fwrite($arq_ruta_logo, $reg_ruta_logo) ;  
               fclose($arq_ruta_logo) ;  
           } 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out_ruta_logo, true);
           $this->nmgp_return_img['ruta_logo'][0] = $sc_obj_img->getHeight();
           $this->nmgp_return_img['ruta_logo'][1] = $sc_obj_img->getWidth();
       } 
   } 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ruta_logo'] = array(
                       'row'    => '',
               'type'    => 'imagem',
               'valList' => array($sTmpValue),
               'imgFile' => $out_ruta_logo,
               'imgOrig' => $out1_ruta_logo,
               'keepImg' => $sKeepImage,
              );
          }
   }

          //----- detalle_trib
   function ajax_return_values_detalle_trib($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("detalle_trib", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->detalle_trib);
              $aLookup = array();
              $this->_tmp_lookup_detalle_trib = $this->detalle_trib;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_detalle_trib']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_detalle_trib'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_detalle_trib']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_detalle_trib'] = array(); 
}
$aLookup[] = array(form_datosemp_mob_pack_protect_string('') => str_replace('<', '&lt;',form_datosemp_mob_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_detalle_trib'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + descripcion_dt  FROM detalle_tributario  WHERE codigo in('01','ZZ','ZY') ORDER BY id_detalle_trib, codigo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo, ' - ',descripcion_dt)  FROM detalle_tributario  WHERE codigo in('01','ZZ','ZY') ORDER BY id_detalle_trib, codigo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&descripcion_dt  FROM detalle_tributario  WHERE codigo in('01','ZZ','ZY') ORDER BY id_detalle_trib, codigo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||descripcion_dt  FROM detalle_tributario  WHERE codigo in('01','ZZ','ZY') ORDER BY id_detalle_trib, codigo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + descripcion_dt  FROM detalle_tributario  WHERE codigo in('01','ZZ','ZY') ORDER BY id_detalle_trib, codigo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||descripcion_dt  FROM detalle_tributario  WHERE codigo in('01','ZZ','ZY') ORDER BY id_detalle_trib, codigo";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||descripcion_dt  FROM detalle_tributario  WHERE codigo in('01','ZZ','ZY') ORDER BY id_detalle_trib, codigo";
   }

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_datosemp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_datosemp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_detalle_trib'][] = $rs->fields[0];
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
          $sSelComp = "name=\"detalle_trib\"";
          if (isset($this->NM_ajax_info['select_html']['detalle_trib']) && !empty($this->NM_ajax_info['select_html']['detalle_trib']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['detalle_trib']);
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

                  if ($this->detalle_trib == $sValue)
                  {
                      $this->_tmp_lookup_detalle_trib = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['detalle_trib'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['detalle_trib']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['detalle_trib']['valList'][$i] = form_datosemp_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['detalle_trib']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['detalle_trib']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['detalle_trib']['labList'] = $aLabel;
          }
   }

          //----- codigos_ciiu
   function ajax_return_values_codigos_ciiu($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("codigos_ciiu", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->codigos_ciiu);
              $aLookup = array();
              $this->_tmp_lookup_codigos_ciiu = $this->codigos_ciiu;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigos_ciiu']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigos_ciiu'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigos_ciiu']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigos_ciiu'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo_ciiu, codigo_ciiu + ' - ' + descripcion  FROM codigos_ciiu  ORDER BY id_ciiu, codigo_ciiu, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo_ciiu, concat(codigo_ciiu, ' - ',descripcion)  FROM codigos_ciiu  ORDER BY id_ciiu, codigo_ciiu, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo_ciiu, codigo_ciiu&' - '&descripcion  FROM codigos_ciiu  ORDER BY id_ciiu, codigo_ciiu, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo_ciiu, codigo_ciiu||' - '||descripcion  FROM codigos_ciiu  ORDER BY id_ciiu, codigo_ciiu, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo_ciiu, codigo_ciiu + ' - ' + descripcion  FROM codigos_ciiu  ORDER BY id_ciiu, codigo_ciiu, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo_ciiu, codigo_ciiu||' - '||descripcion  FROM codigos_ciiu  ORDER BY id_ciiu, codigo_ciiu, descripcion";
   }
   else
   {
       $nm_comando = "SELECT codigo_ciiu, codigo_ciiu||' - '||descripcion  FROM codigos_ciiu  ORDER BY id_ciiu, codigo_ciiu, descripcion";
   }

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_datosemp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_datosemp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigos_ciiu'][] = $rs->fields[0];
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
          $sSelComp = "name=\"codigos_ciiu\"";
          if (isset($this->NM_ajax_info['select_html']['codigos_ciiu']) && !empty($this->NM_ajax_info['select_html']['codigos_ciiu']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['codigos_ciiu']);
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

                  if ($this->codigos_ciiu == $sValue)
                  {
                      $this->_tmp_lookup_codigos_ciiu = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['codigos_ciiu'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['codigos_ciiu']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['codigos_ciiu']['valList'][$i] = form_datosemp_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['codigos_ciiu']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['codigos_ciiu']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['codigos_ciiu']['labList'] = $aLabel;
          }
   }

          //----- ciiu
   function ajax_return_values_ciiu($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ciiu", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ciiu);
              $aLookup = array();
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__icons8-feed-de-actividad-32.png"))
          { 
              $ciiu = "&nbsp;" ;  
          } 
          else 
          { 
              $ciiu = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__icons8-feed-de-actividad-32.png\"/>" ; 
          } 
    $sTmpImgHtml = "<a href=\"javascript:nm_gp_submit('" . $this->Ini->link_grid_codigos_ciiu_cons . "', '$this->nm_location', 'NMSC_inicial*scininicio*scout', 'inicio', '_blank', '0', '0', 'grid_codigos_ciiu')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $ciiu . "</font></a>";
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ciiu'] = array(
                       'row'    => '',
               'type'    => 'imagehtml',
               'valList' => array($sTmpValue),
               'imgHtml' => $sTmpImgHtml,
              );
          }
   }

          //----- responsab_trib
   function ajax_return_values_responsab_trib($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("responsab_trib", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->responsab_trib);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['responsab_trib'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['upload_dir'][$fieldName][] = $newName;
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
//----------- 

   function return_after_insert()
   {
      global $sc_where;
      $sc_where_pos = " WHERE ((iddatos < $this->iddatos))";
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
      if ('' != $this->iddatos)
      {
          $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count;
          $rsc = $this->Db->Execute($nmgp_sel_count);
          if ($rsc === false && !$rsc->EOF)
          {
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
              exit;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['reg_start'] = $rsc->fields[0];
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
      $NM_val_form['codigo_te'] = $this->codigo_te;
      $NM_val_form['sucursal'] = $this->sucursal;
      $NM_val_form['razonsoc'] = $this->razonsoc;
      $NM_val_form['nombre_comercial'] = $this->nombre_comercial;
      $NM_val_form['regimen'] = $this->regimen;
      $NM_val_form['naturaleza'] = $this->naturaleza;
      $NM_val_form['tipo_documento'] = $this->tipo_documento;
      $NM_val_form['nit'] = $this->nit;
      $NM_val_form['dv'] = $this->dv;
      $NM_val_form['correo'] = $this->correo;
      $NM_val_form['iddatos'] = $this->iddatos;
      $NM_val_form['nompais'] = $this->nompais;
      $NM_val_form['nom_depto'] = $this->nom_depto;
      $NM_val_form['municipio'] = $this->municipio;
      $NM_val_form['ciudad'] = $this->ciudad;
      $NM_val_form['direccion'] = $this->direccion;
      $NM_val_form['codigo_postal'] = $this->codigo_postal;
      $NM_val_form['telefono'] = $this->telefono;
      $NM_val_form['logo'] = $this->logo;
      $NM_val_form['ruta_logo'] = $this->ruta_logo;
      $NM_val_form['detalle_trib'] = $this->detalle_trib;
      $NM_val_form['codigos_ciiu'] = $this->codigos_ciiu;
      $NM_val_form['ciiu'] = $this->ciiu;
      $NM_val_form['responsab_trib'] = $this->responsab_trib;
      $NM_val_form['nombre_archivo'] = $this->nombre_archivo;
      $NM_val_form['tamanio'] = $this->tamanio;
      if ($this->iddatos === "" || is_null($this->iddatos))  
      { 
          $this->iddatos = 0;
      } 
      if ($this->dv === "" || is_null($this->dv))  
      { 
          $this->dv = 0;
          $this->sc_force_zero[] = 'dv';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->naturaleza === "" || is_null($this->naturaleza))  
      { 
          $this->naturaleza = 0;
          $this->sc_force_zero[] = 'naturaleza';
      } 
      }
      if ($this->regimen === "" || is_null($this->regimen))  
      { 
          $this->regimen = 0;
          $this->sc_force_zero[] = 'regimen';
      } 
      if ($this->municipio === "" || is_null($this->municipio))  
      { 
          $this->municipio = 0;
          $this->sc_force_zero[] = 'municipio';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->razonsoc_before_qstr = $this->razonsoc;
          $this->razonsoc = substr($this->Db->qstr($this->razonsoc), 1, -1); 
          if ($this->razonsoc == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->razonsoc = "null"; 
              $NM_val_null[] = "razonsoc";
          } 
          $this->nit_before_qstr = $this->nit;
          $this->nit = substr($this->Db->qstr($this->nit), 1, -1); 
          if ($this->nit == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nit = "null"; 
              $NM_val_null[] = "nit";
          } 
          $this->direccion_before_qstr = $this->direccion;
          $this->direccion = substr($this->Db->qstr($this->direccion), 1, -1); 
          if ($this->direccion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->direccion = "null"; 
              $NM_val_null[] = "direccion";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->telefono_before_qstr = $this->telefono;
          $this->telefono = substr($this->Db->qstr($this->telefono), 1, -1); 
          if ($this->telefono == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->telefono = "null"; 
              $NM_val_null[] = "telefono";
          } 
          $this->correo_before_qstr = $this->correo;
          $this->correo = substr($this->Db->qstr($this->correo), 1, -1); 
          if ($this->correo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->correo = "null"; 
              $NM_val_null[] = "correo";
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
          { 
              if (substr($this->logo, 0, 4) != "*nm*" && $this->logo != 'null') 
              { 
                  $this->logo = "*nm*" . base64_encode($this->logo) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
          {
              $this->logo = str_replace("'", "''", $this->logo);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
          { 
              if ($this->Ini->nm_tpbanco != "pdo_sqlsrv" && substr($this->logo, 0, 4) != "*nm*" && $this->logo != 'null') 
              { 
                  $this->logo = "*nm*" . base64_encode($this->logo) ; 
              } 
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
              if ($this->Ini->nm_tpbanco != 'pdo_ibm' && substr($this->logo, 0, 4) != "*nm*" && $this->logo != 'null') 
              { 
                  $this->logo = "*nm*" . base64_encode($this->logo) ; 
              } 
          } 
          else
          { 
              $this->logo =  substr($this->Db->qstr($this->logo), 1, -1);
          } 
          if ($this->logo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->logo = "null"; 
              $NM_val_null[] = "logo";
          } 
          $this->nombre_archivo_before_qstr = $this->nombre_archivo;
          $this->nombre_archivo = substr($this->Db->qstr($this->nombre_archivo), 1, -1); 
          if ($this->nombre_archivo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombre_archivo = "null"; 
              $NM_val_null[] = "nombre_archivo";
          } 
          $this->tamanio_before_qstr = $this->tamanio;
          $this->tamanio = substr($this->Db->qstr($this->tamanio), 1, -1); 
          if ($this->tamanio == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tamanio = "null"; 
              $NM_val_null[] = "tamanio";
          } 
          $this->detalle_trib_before_qstr = $this->detalle_trib;
          $this->detalle_trib = substr($this->Db->qstr($this->detalle_trib), 1, -1); 
          if ($this->detalle_trib == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->detalle_trib = "null"; 
              $NM_val_null[] = "detalle_trib";
          } 
          $this->codigos_ciiu_before_qstr = $this->codigos_ciiu;
          $this->codigos_ciiu = substr($this->Db->qstr($this->codigos_ciiu), 1, -1); 
          if ($this->codigos_ciiu == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codigos_ciiu = "null"; 
              $NM_val_null[] = "codigos_ciiu";
          } 
          $this->responsab_trib_before_qstr = $this->responsab_trib;
          $this->responsab_trib = substr($this->Db->qstr($this->responsab_trib), 1, -1); 
          if ($this->responsab_trib == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->responsab_trib = "null"; 
              $NM_val_null[] = "responsab_trib";
          } 
          if ($this->tipo_documento == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo_documento = "null"; 
              $NM_val_null[] = "tipo_documento";
          } 
          $this->nombre_comercial_before_qstr = $this->nombre_comercial;
          $this->nombre_comercial = substr($this->Db->qstr($this->nombre_comercial), 1, -1); 
          if ($this->nombre_comercial == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombre_comercial = "null"; 
              $NM_val_null[] = "nombre_comercial";
          } 
          $this->nompais_before_qstr = $this->nompais;
          $this->nompais = substr($this->Db->qstr($this->nompais), 1, -1); 
          if ($this->nompais == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nompais = "null"; 
              $NM_val_null[] = "nompais";
          } 
          $this->nom_depto_before_qstr = $this->nom_depto;
          $this->nom_depto = substr($this->Db->qstr($this->nom_depto), 1, -1); 
          if ($this->nom_depto == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nom_depto = "null"; 
              $NM_val_null[] = "nom_depto";
          } 
          $this->ciudad_before_qstr = $this->ciudad;
          $this->ciudad = substr($this->Db->qstr($this->ciudad), 1, -1); 
          if ($this->ciudad == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ciudad = "null"; 
              $NM_val_null[] = "ciudad";
          } 
          $this->codigo_postal_before_qstr = $this->codigo_postal;
          $this->codigo_postal = substr($this->Db->qstr($this->codigo_postal), 1, -1); 
          if ($this->codigo_postal == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codigo_postal = "null"; 
              $NM_val_null[] = "codigo_postal";
          } 
          $this->sucursal_before_qstr = $this->sucursal;
          $this->sucursal = substr($this->Db->qstr($this->sucursal), 1, -1); 
          if ($this->sucursal == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sucursal = "null"; 
              $NM_val_null[] = "sucursal";
          } 
          $this->codigo_te_before_qstr = $this->codigo_te;
          $this->codigo_te = substr($this->Db->qstr($this->codigo_te), 1, -1); 
          if ($this->codigo_te == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codigo_te = "null"; 
              $NM_val_null[] = "codigo_te";
          } 
          $this->ruta_logo_before_qstr = $this->ruta_logo;
          $this->ruta_logo = substr($this->Db->qstr($this->ruta_logo), 1, -1); 
          if ($this->ruta_logo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ruta_logo = "null"; 
              $NM_val_null[] = "ruta_logo";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_datosemp_mob_pack_ajax_response();
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
              if ($this->logo_limpa == "S") 
              { 
                  if ($this->nombre_archivo != "null") 
                  { 
                      $this->nombre_archivo = ''; 
                  } 
                  $NM_val_form['nombre_archivo'] = ''; 
                  $this->tamanio = 0; 
                  $NM_val_form['tamanio'] = 0; 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "razonsoc = '$this->razonsoc', nit = '$this->nit', dv = $this->dv, direccion = '$this->direccion', naturaleza = $this->naturaleza, regimen = $this->regimen, telefono = '$this->telefono', correo = '$this->correo', detalle_trib = '$this->detalle_trib', codigos_ciiu = '$this->codigos_ciiu', responsab_trib = '$this->responsab_trib', tipo_documento = '$this->tipo_documento', nombre_comercial = '$this->nombre_comercial', nompais = '$this->nompais', nom_depto = '$this->nom_depto', municipio = $this->municipio, ciudad = '$this->ciudad', codigo_postal = '$this->codigo_postal', sucursal = '$this->sucursal', codigo_te = '$this->codigo_te'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "razonsoc = '$this->razonsoc', nit = '$this->nit', dv = $this->dv, direccion = '$this->direccion', naturaleza = $this->naturaleza, regimen = $this->regimen, telefono = '$this->telefono', correo = '$this->correo', detalle_trib = '$this->detalle_trib', codigos_ciiu = '$this->codigos_ciiu', responsab_trib = '$this->responsab_trib', tipo_documento = '$this->tipo_documento', nombre_comercial = '$this->nombre_comercial', nompais = '$this->nompais', nom_depto = '$this->nom_depto', municipio = $this->municipio, ciudad = '$this->ciudad', codigo_postal = '$this->codigo_postal', sucursal = '$this->sucursal', codigo_te = '$this->codigo_te'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "razonsoc = '$this->razonsoc', nit = '$this->nit', dv = $this->dv, direccion = '$this->direccion', naturaleza = $this->naturaleza, regimen = $this->regimen, telefono = '$this->telefono', correo = '$this->correo', detalle_trib = '$this->detalle_trib', codigos_ciiu = '$this->codigos_ciiu', responsab_trib = '$this->responsab_trib', tipo_documento = '$this->tipo_documento', nombre_comercial = '$this->nombre_comercial', nompais = '$this->nompais', nom_depto = '$this->nom_depto', municipio = $this->municipio, ciudad = '$this->ciudad', codigo_postal = '$this->codigo_postal', sucursal = '$this->sucursal', codigo_te = '$this->codigo_te'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "razonsoc = '$this->razonsoc', nit = '$this->nit', dv = $this->dv, direccion = '$this->direccion', naturaleza = $this->naturaleza, regimen = $this->regimen, telefono = '$this->telefono', correo = '$this->correo', detalle_trib = '$this->detalle_trib', codigos_ciiu = '$this->codigos_ciiu', responsab_trib = '$this->responsab_trib', tipo_documento = '$this->tipo_documento', nombre_comercial = '$this->nombre_comercial', nompais = '$this->nompais', nom_depto = '$this->nom_depto', municipio = $this->municipio, ciudad = '$this->ciudad', codigo_postal = '$this->codigo_postal', sucursal = '$this->sucursal', codigo_te = '$this->codigo_te'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "razonsoc = '$this->razonsoc', nit = '$this->nit', dv = $this->dv, direccion = '$this->direccion', naturaleza = $this->naturaleza, regimen = $this->regimen, telefono = '$this->telefono', correo = '$this->correo', detalle_trib = '$this->detalle_trib', codigos_ciiu = '$this->codigos_ciiu', responsab_trib = '$this->responsab_trib', tipo_documento = '$this->tipo_documento', nombre_comercial = '$this->nombre_comercial', nompais = '$this->nompais', nom_depto = '$this->nom_depto', municipio = $this->municipio, ciudad = '$this->ciudad', codigo_postal = '$this->codigo_postal', sucursal = '$this->sucursal', codigo_te = '$this->codigo_te'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "razonsoc = '$this->razonsoc', nit = '$this->nit', dv = $this->dv, direccion = '$this->direccion', naturaleza = $this->naturaleza, regimen = $this->regimen, telefono = '$this->telefono', correo = '$this->correo', detalle_trib = '$this->detalle_trib', codigos_ciiu = '$this->codigos_ciiu', responsab_trib = '$this->responsab_trib', tipo_documento = '$this->tipo_documento', nombre_comercial = '$this->nombre_comercial', nompais = '$this->nompais', nom_depto = '$this->nom_depto', municipio = $this->municipio, ciudad = '$this->ciudad', codigo_postal = '$this->codigo_postal', sucursal = '$this->sucursal', codigo_te = '$this->codigo_te'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "razonsoc = '$this->razonsoc', nit = '$this->nit', dv = $this->dv, direccion = '$this->direccion', naturaleza = $this->naturaleza, regimen = $this->regimen, telefono = '$this->telefono', correo = '$this->correo', detalle_trib = '$this->detalle_trib', codigos_ciiu = '$this->codigos_ciiu', responsab_trib = '$this->responsab_trib', tipo_documento = '$this->tipo_documento', nombre_comercial = '$this->nombre_comercial', nompais = '$this->nompais', nom_depto = '$this->nom_depto', municipio = $this->municipio, ciudad = '$this->ciudad', codigo_postal = '$this->codigo_postal', sucursal = '$this->sucursal', codigo_te = '$this->codigo_te'"; 
              } 
              if (isset($NM_val_form['nombre_archivo']) && $NM_val_form['nombre_archivo'] != $this->nmgp_dados_select['nombre_archivo']) 
              { 
                  $SC_fields_update[] = "nombre_archivo = '$this->nombre_archivo'"; 
              } 
              if (isset($NM_val_form['tamanio']) && $NM_val_form['tamanio'] != $this->nmgp_dados_select['tamanio']) 
              { 
                  $SC_fields_update[] = "tamanio = '$this->tamanio'"; 
              } 
              $aDoNotUpdate = array();
              $aEraseFiles  = array();
              $temp_cmd_sql = "";
              if ($this->logo_limpa == "S")
              {
                  if ($this->logo != "null")
                  {
                      $this->logo = '';
                  }
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                  {
                  }
                  else
                  {
                      $temp_cmd_sql = "logo = '" . $this->logo . "'";
                  }
                  $this->logo = "";
              }
              else
              {
                  if ($this->logo != "none" && $this->logo != "")
                  {
                      $NM_conteudo =  $this->logo;
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                      {
                      }
                      else
                      {
                          $temp_cmd_sql .= " logo = '$NM_conteudo'";
                      }
                  }
                  else
                  {
                      $aDoNotUpdate[] = "logo";
                  }
              }
              if (!empty($temp_cmd_sql))
              {
                  $SC_fields_update[] = $temp_cmd_sql;
              }
              $temp_cmd_sql = "";
              if ($this->ruta_logo_limpa == "S")
              {
                  $sDirErase     = $this->Ini->root . $this->Ini->path_imagens . "/logos/" . $_SESSION['gbd_seleccionada'] . "/" . "/";
                  $aEraseFiles[] = array('dir' => $sDirErase, 'file' => $this->nmgp_dados_form['ruta_logo']);
                  if ($this->ruta_logo != "null")
                  {
                      $this->ruta_logo = '';
                  }
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                  {
                      $temp_cmd_sql = "ruta_logo = '" . $this->ruta_logo . "'";
                  }
                  else
                  {
                      $temp_cmd_sql = "ruta_logo = '" . $this->ruta_logo . "'";
                  }
                  $this->ruta_logo = "";
              }
              else
              {
                  if ($this->ruta_logo != "none" && $this->ruta_logo != "")
                  {
                      $NM_conteudo =  $this->ruta_logo;
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                      {
                      $temp_cmd_sql .= " ruta_logo = '$NM_conteudo'";
                      }
                      else
                      {
                          $temp_cmd_sql .= " ruta_logo = '$NM_conteudo'";
                      }
                  }
                  else
                  {
                      $aDoNotUpdate[] = "ruta_logo";
                  }
              }
              if (!empty($temp_cmd_sql))
              {
                  $SC_fields_update[] = $temp_cmd_sql;
              }
              if ($this->logo_limpa == "S" || ($this->logo != "none" && $this->logo != "" && in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) 
                  { 
                      $SC_fields_update[] = "logo = ''"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql)) 
                  { 
                      $SC_fields_update[] = "logo = ''"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
                  { 
                      $SC_fields_update[] = "logo = ''"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                  { 
                      $SC_fields_update[] = "logo = null"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite)) 
                  { 
                      $SC_fields_update[] = "logo = ''"; 
                  } 
                  else 
                  { 
                      $SC_fields_update[] = "logo = empty_blob()"; 
                  } 
              } 
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE iddatos = $this->iddatos ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE iddatos = $this->iddatos ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE iddatos = $this->iddatos ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE iddatos = $this->iddatos ";  
              }  
              else  
              {
                  $comando .= " WHERE iddatos = $this->iddatos ";  
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
                                  form_datosemp_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              $this->razonsoc = $this->razonsoc_before_qstr;
              $this->nit = $this->nit_before_qstr;
              $this->direccion = $this->direccion_before_qstr;
              $this->telefono = $this->telefono_before_qstr;
              $this->correo = $this->correo_before_qstr;
              $this->nombre_archivo = $this->nombre_archivo_before_qstr;
              $this->tamanio = $this->tamanio_before_qstr;
              $this->detalle_trib = $this->detalle_trib_before_qstr;
              $this->codigos_ciiu = $this->codigos_ciiu_before_qstr;
              $this->responsab_trib = $this->responsab_trib_before_qstr;
              $this->nombre_comercial = $this->nombre_comercial_before_qstr;
              $this->nompais = $this->nompais_before_qstr;
              $this->nom_depto = $this->nom_depto_before_qstr;
              $this->ciudad = $this->ciudad_before_qstr;
              $this->codigo_postal = $this->codigo_postal_before_qstr;
              $this->sucursal = $this->sucursal_before_qstr;
              $this->codigo_te = $this->codigo_te_before_qstr;
              $this->ruta_logo = $this->ruta_logo_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if ($this->logo_limpa == "S" && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"logo\", \"\",  \"iddatos = $this->iddatos\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "logo", "",  "iddatos = $this->iddatos"); 
                  } 
                  else 
                  { 
                      if ($this->logo != "none" && $this->logo != "") 
                      { 
                          $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"logo\", $this->logo,  \"iddatos = $this->iddatos\")"; 
                          $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "logo", $this->logo,  "iddatos = $this->iddatos"); 
                      } 
                  } 
                  if ($rs === false) 
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_datosemp_mob_pack_ajax_response();
                      }
                      exit;  
                  }   
              }   
              if ($this->logo_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['logo_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
              if ($this->ruta_logo_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['ruta_logo_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
              if (!empty($aEraseFiles))
              {
                  foreach ($aEraseFiles as $aEraseData)
                  {
                      $sEraseFile = $aEraseData['dir'] . $aEraseData['file'];
                      if (@is_file($sEraseFile))
                      {
                          @unlink($sEraseFile);
                      }
                  }
              }
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
                  $this->NM_ajax_info['fldList']['logo_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
                  $this->NM_ajax_info['fldList']['ruta_logo_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }


              if     (isset($NM_val_form) && isset($NM_val_form['iddatos'])) { $this->iddatos = $NM_val_form['iddatos']; }
              elseif (isset($this->iddatos)) { $this->nm_limpa_alfa($this->iddatos); }
              if     (isset($NM_val_form) && isset($NM_val_form['razonsoc'])) { $this->razonsoc = $NM_val_form['razonsoc']; }
              elseif (isset($this->razonsoc)) { $this->nm_limpa_alfa($this->razonsoc); }
              if     (isset($NM_val_form) && isset($NM_val_form['nit'])) { $this->nit = $NM_val_form['nit']; }
              elseif (isset($this->nit)) { $this->nm_limpa_alfa($this->nit); }
              if     (isset($NM_val_form) && isset($NM_val_form['dv'])) { $this->dv = $NM_val_form['dv']; }
              elseif (isset($this->dv)) { $this->nm_limpa_alfa($this->dv); }
              if     (isset($NM_val_form) && isset($NM_val_form['direccion'])) { $this->direccion = $NM_val_form['direccion']; }
              elseif (isset($this->direccion)) { $this->nm_limpa_alfa($this->direccion); }
              if     (isset($NM_val_form) && isset($NM_val_form['naturaleza'])) { $this->naturaleza = $NM_val_form['naturaleza']; }
              elseif (isset($this->naturaleza)) { $this->nm_limpa_alfa($this->naturaleza); }
              if     (isset($NM_val_form) && isset($NM_val_form['regimen'])) { $this->regimen = $NM_val_form['regimen']; }
              elseif (isset($this->regimen)) { $this->nm_limpa_alfa($this->regimen); }
              if     (isset($NM_val_form) && isset($NM_val_form['telefono'])) { $this->telefono = $NM_val_form['telefono']; }
              elseif (isset($this->telefono)) { $this->nm_limpa_alfa($this->telefono); }
              if     (isset($NM_val_form) && isset($NM_val_form['correo'])) { $this->correo = $NM_val_form['correo']; }
              elseif (isset($this->correo)) { $this->nm_limpa_alfa($this->correo); }
              if     (isset($NM_val_form) && isset($NM_val_form['detalle_trib'])) { $this->detalle_trib = $NM_val_form['detalle_trib']; }
              elseif (isset($this->detalle_trib)) { $this->nm_limpa_alfa($this->detalle_trib); }
              if     (isset($NM_val_form) && isset($NM_val_form['codigos_ciiu'])) { $this->codigos_ciiu = $NM_val_form['codigos_ciiu']; }
              elseif (isset($this->codigos_ciiu)) { $this->nm_limpa_alfa($this->codigos_ciiu); }
              if     (isset($NM_val_form) && isset($NM_val_form['responsab_trib'])) { $this->responsab_trib = $NM_val_form['responsab_trib']; }
              elseif (isset($this->responsab_trib)) { $this->nm_limpa_alfa($this->responsab_trib); }
              if     (isset($NM_val_form) && isset($NM_val_form['nombre_comercial'])) { $this->nombre_comercial = $NM_val_form['nombre_comercial']; }
              elseif (isset($this->nombre_comercial)) { $this->nm_limpa_alfa($this->nombre_comercial); }
              if     (isset($NM_val_form) && isset($NM_val_form['nompais'])) { $this->nompais = $NM_val_form['nompais']; }
              elseif (isset($this->nompais)) { $this->nm_limpa_alfa($this->nompais); }
              if     (isset($NM_val_form) && isset($NM_val_form['nom_depto'])) { $this->nom_depto = $NM_val_form['nom_depto']; }
              elseif (isset($this->nom_depto)) { $this->nm_limpa_alfa($this->nom_depto); }
              if     (isset($NM_val_form) && isset($NM_val_form['municipio'])) { $this->municipio = $NM_val_form['municipio']; }
              elseif (isset($this->municipio)) { $this->nm_limpa_alfa($this->municipio); }
              if     (isset($NM_val_form) && isset($NM_val_form['ciudad'])) { $this->ciudad = $NM_val_form['ciudad']; }
              elseif (isset($this->ciudad)) { $this->nm_limpa_alfa($this->ciudad); }
              if     (isset($NM_val_form) && isset($NM_val_form['codigo_postal'])) { $this->codigo_postal = $NM_val_form['codigo_postal']; }
              elseif (isset($this->codigo_postal)) { $this->nm_limpa_alfa($this->codigo_postal); }
              if     (isset($NM_val_form) && isset($NM_val_form['sucursal'])) { $this->sucursal = $NM_val_form['sucursal']; }
              elseif (isset($this->sucursal)) { $this->nm_limpa_alfa($this->sucursal); }
              if     (isset($NM_val_form) && isset($NM_val_form['codigo_te'])) { $this->codigo_te = $NM_val_form['codigo_te']; }
              elseif (isset($this->codigo_te)) { $this->nm_limpa_alfa($this->codigo_te); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('codigo_te', 'sucursal', 'razonsoc', 'nombre_comercial', 'regimen', 'naturaleza', 'tipo_documento', 'nit', 'dv', 'correo', 'iddatos', 'nompais', 'nom_depto', 'municipio', 'ciudad', 'direccion', 'codigo_postal', 'telefono', 'logo', 'ruta_logo', 'detalle_trib', 'codigos_ciiu', 'ciiu', 'responsab_trib'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "iddatos, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_datosemp_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              $_test_file = $this->fetchUniqueUploadName($this->logo_scfile_name, $dir_file, "logo");
              if (trim($this->logo_scfile_name) != $_test_file)
              {
                  $this->logo_scfile_name = $_test_file;
                  $this->logo = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->naturaleza != "")
                  { 
                       $compl_insert     .= ", naturaleza";
                       $compl_insert_val .= ", $this->naturaleza";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (razonsoc, nit, dv, direccion, regimen, telefono, correo, logo, nombre_archivo, tamanio, detalle_trib, codigos_ciiu, responsab_trib, tipo_documento, nombre_comercial, nompais, nom_depto, municipio, ciudad, codigo_postal, sucursal, codigo_te, ruta_logo $compl_insert) VALUES ('$this->razonsoc', '$this->nit', $this->dv, '$this->direccion', $this->regimen, '$this->telefono', '$this->correo', '$this->logo', '$this->nombre_archivo', '$this->tamanio', '$this->detalle_trib', '$this->codigos_ciiu', '$this->responsab_trib', '$this->tipo_documento', '$this->nombre_comercial', '$this->nompais', '$this->nom_depto', $this->municipio, '$this->ciudad', '$this->codigo_postal', '$this->sucursal', '$this->codigo_te', '$this->ruta_logo' $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco == "pdo_sqlsrv")
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->naturaleza != "")
                  { 
                       $compl_insert     .= ", naturaleza";
                       $compl_insert_val .= ", $this->naturaleza";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (razonsoc, nit, dv, direccion, regimen, telefono, correo, logo, nombre_archivo, tamanio, detalle_trib, codigos_ciiu, responsab_trib, tipo_documento, nombre_comercial, nompais, nom_depto, municipio, ciudad, codigo_postal, sucursal, codigo_te, ruta_logo $compl_insert) VALUES ('$this->razonsoc', '$this->nit', $this->dv, '$this->direccion', $this->regimen, '$this->telefono', '$this->correo', '', '$this->nombre_archivo', '$this->tamanio', '$this->detalle_trib', '$this->codigos_ciiu', '$this->responsab_trib', '$this->tipo_documento', '$this->nombre_comercial', '$this->nompais', '$this->nom_depto', $this->municipio, '$this->ciudad', '$this->codigo_postal', '$this->sucursal', '$this->codigo_te', '$this->ruta_logo' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->naturaleza != "")
                  { 
                       $compl_insert     .= ", naturaleza";
                       $compl_insert_val .= ", $this->naturaleza";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (razonsoc, nit, dv, direccion, regimen, telefono, correo, logo, nombre_archivo, tamanio, detalle_trib, codigos_ciiu, responsab_trib, tipo_documento, nombre_comercial, nompais, nom_depto, municipio, ciudad, codigo_postal, sucursal, codigo_te, ruta_logo $compl_insert) VALUES ('$this->razonsoc', '$this->nit', $this->dv, '$this->direccion', $this->regimen, '$this->telefono', '$this->correo', '$this->logo', '$this->nombre_archivo', '$this->tamanio', '$this->detalle_trib', '$this->codigos_ciiu', '$this->responsab_trib', '$this->tipo_documento', '$this->nombre_comercial', '$this->nompais', '$this->nom_depto', $this->municipio, '$this->ciudad', '$this->codigo_postal', '$this->sucursal', '$this->codigo_te', '$this->ruta_logo' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->naturaleza != "")
                  { 
                       $compl_insert     .= ", naturaleza";
                       $compl_insert_val .= ", $this->naturaleza";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (razonsoc, nit, dv, direccion, regimen, telefono, correo, logo, nombre_archivo, tamanio, detalle_trib, codigos_ciiu, responsab_trib, tipo_documento, nombre_comercial, nompais, nom_depto, municipio, ciudad, codigo_postal, sucursal, codigo_te, ruta_logo $compl_insert) VALUES ('$this->razonsoc', '$this->nit', $this->dv, '$this->direccion', $this->regimen, '$this->telefono', '$this->correo', '$this->logo', '$this->nombre_archivo', '$this->tamanio', '$this->detalle_trib', '$this->codigos_ciiu', '$this->responsab_trib', '$this->tipo_documento', '$this->nombre_comercial', '$this->nompais', '$this->nom_depto', $this->municipio, '$this->ciudad', '$this->codigo_postal', '$this->sucursal', '$this->codigo_te', '$this->ruta_logo' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->naturaleza != "")
                  { 
                       $compl_insert     .= ", naturaleza";
                       $compl_insert_val .= ", $this->naturaleza";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "razonsoc, nit, dv, direccion, regimen, telefono, correo, logo, nombre_archivo, tamanio, detalle_trib, codigos_ciiu, responsab_trib, tipo_documento, nombre_comercial, nompais, nom_depto, municipio, ciudad, codigo_postal, sucursal, codigo_te, ruta_logo $compl_insert) VALUES (" . $NM_seq_auto . "'$this->razonsoc', '$this->nit', $this->dv, '$this->direccion', $this->regimen, '$this->telefono', '$this->correo', EMPTY_BLOB(), '$this->nombre_archivo', '$this->tamanio', '$this->detalle_trib', '$this->codigos_ciiu', '$this->responsab_trib', '$this->tipo_documento', '$this->nombre_comercial', '$this->nompais', '$this->nom_depto', $this->municipio, '$this->ciudad', '$this->codigo_postal', '$this->sucursal', '$this->codigo_te', '$this->ruta_logo' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->naturaleza != "")
                  { 
                       $compl_insert     .= ", naturaleza";
                       $compl_insert_val .= ", $this->naturaleza";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "razonsoc, nit, dv, direccion, regimen, telefono, correo, logo, nombre_archivo, tamanio, detalle_trib, codigos_ciiu, responsab_trib, tipo_documento, nombre_comercial, nompais, nom_depto, municipio, ciudad, codigo_postal, sucursal, codigo_te, ruta_logo $compl_insert) VALUES (" . $NM_seq_auto . "'$this->razonsoc', '$this->nit', $this->dv, '$this->direccion', $this->regimen, '$this->telefono', '$this->correo', null, '$this->nombre_archivo', '$this->tamanio', '$this->detalle_trib', '$this->codigos_ciiu', '$this->responsab_trib', '$this->tipo_documento', '$this->nombre_comercial', '$this->nompais', '$this->nom_depto', $this->municipio, '$this->ciudad', '$this->codigo_postal', '$this->sucursal', '$this->codigo_te', '$this->ruta_logo' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->naturaleza != "")
                  { 
                       $compl_insert     .= ", naturaleza";
                       $compl_insert_val .= ", $this->naturaleza";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "razonsoc, nit, dv, direccion, regimen, telefono, correo, logo, nombre_archivo, tamanio, detalle_trib, codigos_ciiu, responsab_trib, tipo_documento, nombre_comercial, nompais, nom_depto, municipio, ciudad, codigo_postal, sucursal, codigo_te, ruta_logo $compl_insert) VALUES (" . $NM_seq_auto . "'$this->razonsoc', '$this->nit', $this->dv, '$this->direccion', $this->regimen, '$this->telefono', '$this->correo', '', '$this->nombre_archivo', '$this->tamanio', '$this->detalle_trib', '$this->codigos_ciiu', '$this->responsab_trib', '$this->tipo_documento', '$this->nombre_comercial', '$this->nompais', '$this->nom_depto', $this->municipio, '$this->ciudad', '$this->codigo_postal', '$this->sucursal', '$this->codigo_te', '$this->ruta_logo' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->naturaleza != "")
                  { 
                       $compl_insert     .= ", naturaleza";
                       $compl_insert_val .= ", $this->naturaleza";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "razonsoc, nit, dv, direccion, regimen, telefono, correo, logo, nombre_archivo, tamanio, detalle_trib, codigos_ciiu, responsab_trib, tipo_documento, nombre_comercial, nompais, nom_depto, municipio, ciudad, codigo_postal, sucursal, codigo_te, ruta_logo $compl_insert) VALUES (" . $NM_seq_auto . "'$this->razonsoc', '$this->nit', $this->dv, '$this->direccion', $this->regimen, '$this->telefono', '$this->correo', '', '$this->nombre_archivo', '$this->tamanio', '$this->detalle_trib', '$this->codigos_ciiu', '$this->responsab_trib', '$this->tipo_documento', '$this->nombre_comercial', '$this->nompais', '$this->nom_depto', $this->municipio, '$this->ciudad', '$this->codigo_postal', '$this->sucursal', '$this->codigo_te', '$this->ruta_logo' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->naturaleza != "")
                  { 
                       $compl_insert     .= ", naturaleza";
                       $compl_insert_val .= ", $this->naturaleza";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "razonsoc, nit, dv, direccion, regimen, telefono, correo, logo, nombre_archivo, tamanio, detalle_trib, codigos_ciiu, responsab_trib, tipo_documento, nombre_comercial, nompais, nom_depto, municipio, ciudad, codigo_postal, sucursal, codigo_te, ruta_logo $compl_insert) VALUES (" . $NM_seq_auto . "'$this->razonsoc', '$this->nit', $this->dv, '$this->direccion', $this->regimen, '$this->telefono', '$this->correo', '', '$this->nombre_archivo', '$this->tamanio', '$this->detalle_trib', '$this->codigos_ciiu', '$this->responsab_trib', '$this->tipo_documento', '$this->nombre_comercial', '$this->nompais', '$this->nom_depto', $this->municipio, '$this->ciudad', '$this->codigo_postal', '$this->sucursal', '$this->codigo_te', '$this->ruta_logo' $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco =='pdo_ibm')
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->naturaleza != "")
                  { 
                       $compl_insert     .= ", naturaleza";
                       $compl_insert_val .= ", $this->naturaleza";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "razonsoc, nit, dv, direccion, regimen, telefono, correo, logo, nombre_archivo, tamanio, detalle_trib, codigos_ciiu, responsab_trib, tipo_documento, nombre_comercial, nompais, nom_depto, municipio, ciudad, codigo_postal, sucursal, codigo_te, ruta_logo $compl_insert) VALUES (" . $NM_seq_auto . "'$this->razonsoc', '$this->nit', $this->dv, '$this->direccion', $this->regimen, '$this->telefono', '$this->correo', EMPTY_BLOB(), '$this->nombre_archivo', '$this->tamanio', '$this->detalle_trib', '$this->codigos_ciiu', '$this->responsab_trib', '$this->tipo_documento', '$this->nombre_comercial', '$this->nompais', '$this->nom_depto', $this->municipio, '$this->ciudad', '$this->codigo_postal', '$this->sucursal', '$this->codigo_te', '$this->ruta_logo' $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->naturaleza != "")
                  { 
                       $compl_insert     .= ", naturaleza";
                       $compl_insert_val .= ", $this->naturaleza";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "razonsoc, nit, dv, direccion, regimen, telefono, correo, logo, nombre_archivo, tamanio, detalle_trib, codigos_ciiu, responsab_trib, tipo_documento, nombre_comercial, nompais, nom_depto, municipio, ciudad, codigo_postal, sucursal, codigo_te, ruta_logo $compl_insert) VALUES (" . $NM_seq_auto . "'$this->razonsoc', '$this->nit', $this->dv, '$this->direccion', $this->regimen, '$this->telefono', '$this->correo', '$this->logo', '$this->nombre_archivo', '$this->tamanio', '$this->detalle_trib', '$this->codigos_ciiu', '$this->responsab_trib', '$this->tipo_documento', '$this->nombre_comercial', '$this->nompais', '$this->nom_depto', $this->municipio, '$this->ciudad', '$this->codigo_postal', '$this->sucursal', '$this->codigo_te', '$this->ruta_logo' $compl_insert_val)"; 
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
                              form_datosemp_mob_pack_ajax_response();
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
                          form_datosemp_mob_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->iddatos =  $rsy->fields[0];
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
                  $this->iddatos = $rsy->fields[0];
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
                  $this->iddatos = $rsy->fields[0];
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
                  $this->iddatos = $rsy->fields[0];
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
                  $this->iddatos = $rsy->fields[0];
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
                  $this->iddatos = $rsy->fields[0];
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
                  $this->iddatos = $rsy->fields[0];
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
                  $this->iddatos = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->razonsoc = $this->razonsoc_before_qstr;
              $this->nit = $this->nit_before_qstr;
              $this->direccion = $this->direccion_before_qstr;
              $this->telefono = $this->telefono_before_qstr;
              $this->correo = $this->correo_before_qstr;
              $this->nombre_archivo = $this->nombre_archivo_before_qstr;
              $this->tamanio = $this->tamanio_before_qstr;
              $this->detalle_trib = $this->detalle_trib_before_qstr;
              $this->codigos_ciiu = $this->codigos_ciiu_before_qstr;
              $this->responsab_trib = $this->responsab_trib_before_qstr;
              $this->nombre_comercial = $this->nombre_comercial_before_qstr;
              $this->nompais = $this->nompais_before_qstr;
              $this->nom_depto = $this->nom_depto_before_qstr;
              $this->ciudad = $this->ciudad_before_qstr;
              $this->codigo_postal = $this->codigo_postal_before_qstr;
              $this->sucursal = $this->sucursal_before_qstr;
              $this->codigo_te = $this->codigo_te_before_qstr;
              $this->ruta_logo = $this->ruta_logo_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if (trim($this->logo ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  logo , $this->logo,  \"iddatos = $this->iddatos\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "logo", $this->logo,  "iddatos = $this->iddatos"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_datosemp_mob_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
              }  
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['total']);
              }

              $dir_img = $this->Ini->root . $this->Ini->path_imagens . "/logos/" . $_SESSION['gbd_seleccionada'] . "/" . "/"; 
              if (nm_mkdir($dir_img))  
              { 
                  $arq_ruta_logo = fopen($this->SC_IMG_ruta_logo, "r") ; 
                  $reg_ruta_logo = fread($arq_ruta_logo, filesize($this->SC_IMG_ruta_logo)) ; 
                  fclose($arq_ruta_logo) ;  
                  $arq_ruta_logo = fopen($dir_img . trim($this->ruta_logo_scfile_name), "w") ; 
                  fwrite($arq_ruta_logo, $reg_ruta_logo) ;  
                  fclose($arq_ruta_logo) ;  
              } 
              $this->sc_evento = "insert"; 
              $this->razonsoc = $this->razonsoc_before_qstr;
              $this->nit = $this->nit_before_qstr;
              $this->direccion = $this->direccion_before_qstr;
              $this->telefono = $this->telefono_before_qstr;
              $this->correo = $this->correo_before_qstr;
              $this->nombre_archivo = $this->nombre_archivo_before_qstr;
              $this->tamanio = $this->tamanio_before_qstr;
              $this->detalle_trib = $this->detalle_trib_before_qstr;
              $this->codigos_ciiu = $this->codigos_ciiu_before_qstr;
              $this->responsab_trib = $this->responsab_trib_before_qstr;
              $this->nombre_comercial = $this->nombre_comercial_before_qstr;
              $this->nompais = $this->nompais_before_qstr;
              $this->nom_depto = $this->nom_depto_before_qstr;
              $this->ciudad = $this->ciudad_before_qstr;
              $this->codigo_postal = $this->codigo_postal_before_qstr;
              $this->sucursal = $this->sucursal_before_qstr;
              $this->codigo_te = $this->codigo_te_before_qstr;
              $this->ruta_logo = $this->ruta_logo_before_qstr;
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              $this->nmgp_botoes['sc_btn_0'] = "on";
              $this->nmgp_botoes['btn_recargar'] = "on";
              $this->return_after_insert();
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->iddatos = substr($this->Db->qstr($this->iddatos), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos "); 
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
          $aEraseFiles = array();
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where iddatos = $this->iddatos "); 
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
                          form_datosemp_mob_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
                  $sDirErase     = $this->Ini->root . $this->Ini->path_imagens . "/logos/" . $_SESSION['gbd_seleccionada'] . "/" . "/"; 
                  $aEraseFiles[] = array('dir' => $sDirErase, 'file' => $this->nmgp_dados_form['ruta_logo']);
              if (!empty($aEraseFiles))
              {
                  foreach ($aEraseFiles as $aEraseData)
                  {
                      $sEraseFile = $aEraseData['dir'] . $aEraseData['file'];
                      if (@is_file($sEraseFile))
                      {
                          @unlink($sEraseFile);
                      }
                  }
              }
              $this->sc_evento = "delete"; 
              if (empty($this->sc_erro_delete)) {
                  $this->record_delete_ok = true;
              }
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['total']);
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
        $_SESSION['scriptcase']['form_datosemp_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_razonsoc = $this->razonsoc;
}
if (!isset($this->sc_temp_empresa)) {$this->sc_temp_empresa = (isset($_SESSION['empresa'])) ? $_SESSION['empresa'] : "";}
  $this->NM_ajax_info['buttonDisplay']['insert'] = $this->nmgp_botoes["insert"] = "off";;
$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;

$this->sc_temp_empresa = $this->razonsoc ;
if (isset($this->sc_temp_empresa)) { $_SESSION['empresa'] = $this->sc_temp_empresa;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_razonsoc != $this->razonsoc || (isset($bFlagRead_razonsoc) && $bFlagRead_razonsoc)))
    {
        $this->ajax_return_values_razonsoc(true);
    }
}
$_SESSION['scriptcase']['form_datosemp_mob']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['scriptcase']['form_datosemp_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_razonsoc = $this->razonsoc;
}
if (!isset($this->sc_temp_empresa)) {$this->sc_temp_empresa = (isset($_SESSION['empresa'])) ? $_SESSION['empresa'] : "";}
  $this->sc_temp_empresa = $this->razonsoc ;

if (isset($this->sc_temp_empresa)) { $_SESSION['empresa'] = $this->sc_temp_empresa;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_razonsoc != $this->razonsoc || (isset($bFlagRead_razonsoc) && $bFlagRead_razonsoc)))
    {
        $this->ajax_return_values_razonsoc(true);
    }
}
$_SESSION['scriptcase']['form_datosemp_mob']['contr_erro'] = 'off'; 
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
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['parms'] = "iddatos?#?$this->iddatos?@?"; 
      }
      $this->nmgp_dados_form['logo'] = ""; 
      $this->logo_limpa = ""; 
      $this->logo_salva = ""; 
      $this->nmgp_dados_form['ruta_logo'] = ""; 
      $this->ruta_logo_limpa = ""; 
      $this->ruta_logo_salva = ""; 
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->iddatos = null === $this->iddatos ? null : substr($this->Db->qstr($this->iddatos), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_filter'] . ")";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT iddatos, razonsoc, nit, dv, direccion, naturaleza, regimen, telefono, correo, logo, nombre_archivo, tamanio, detalle_trib, codigos_ciiu, responsab_trib, tipo_documento, nombre_comercial, nompais, nom_depto, municipio, ciudad, codigo_postal, sucursal, codigo_te, ruta_logo from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT iddatos, razonsoc, nit, dv, direccion, naturaleza, regimen, telefono, correo, logo, nombre_archivo, tamanio, detalle_trib, codigos_ciiu, responsab_trib, tipo_documento, nombre_comercial, nompais, nom_depto, municipio, ciudad, codigo_postal, sucursal, codigo_te, ruta_logo from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT iddatos, razonsoc, nit, dv, direccion, naturaleza, regimen, telefono, correo, logo, nombre_archivo, tamanio, detalle_trib, codigos_ciiu, responsab_trib, tipo_documento, nombre_comercial, nompais, nom_depto, municipio, ciudad, codigo_postal, sucursal, codigo_te, ruta_logo from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT iddatos, razonsoc, nit, dv, direccion, naturaleza, regimen, telefono, correo, LOTOFILE(logo, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_logo', 'client'), nombre_archivo, tamanio, detalle_trib, codigos_ciiu, responsab_trib, tipo_documento, nombre_comercial, nompais, nom_depto, municipio, ciudad, codigo_postal, sucursal, codigo_te, ruta_logo from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT iddatos, razonsoc, nit, dv, direccion, naturaleza, regimen, telefono, correo, logo, nombre_archivo, tamanio, detalle_trib, codigos_ciiu, responsab_trib, tipo_documento, nombre_comercial, nompais, nom_depto, municipio, ciudad, codigo_postal, sucursal, codigo_te, ruta_logo from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = "iddatos=1";
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (!empty($sc_where))
              {
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  {
                     $aWhere[] = "iddatos = $this->iddatos"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                  {
                     $aWhere[] = "iddatos = $this->iddatos"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  {
                     $aWhere[] = "iddatos = $this->iddatos"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  {
                     $aWhere[] = "iddatos = $this->iddatos"; 
                  }  
                  else  
                  {
                     $aWhere[] = "iddatos = $this->iddatos"; 
                  }
              } 
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "iddatos";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "insert" || $this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['sc_btn_0'] = $this->nmgp_botoes['sc_btn_0'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['btn_recargar'] = $this->nmgp_botoes['btn_recargar'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['empty_filter'] = true;
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
              $this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes['update'] = "off";
              $this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes['delete'] = "off";
              return; 
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->iddatos = $rs->fields[0] ; 
              $this->nmgp_dados_select['iddatos'] = $this->iddatos;
              $this->razonsoc = $rs->fields[1] ; 
              $this->nmgp_dados_select['razonsoc'] = $this->razonsoc;
              $this->nit = $rs->fields[2] ; 
              $this->nmgp_dados_select['nit'] = $this->nit;
              $this->dv = $rs->fields[3] ; 
              $this->nmgp_dados_select['dv'] = $this->dv;
              $this->direccion = $rs->fields[4] ; 
              $this->nmgp_dados_select['direccion'] = $this->direccion;
              $this->naturaleza = $rs->fields[5] ; 
              $this->nmgp_dados_select['naturaleza'] = $this->naturaleza;
              $this->regimen = $rs->fields[6] ; 
              $this->nmgp_dados_select['regimen'] = $this->regimen;
              $this->telefono = $rs->fields[7] ; 
              $this->nmgp_dados_select['telefono'] = $this->telefono;
              $this->correo = $rs->fields[8] ; 
              $this->nmgp_dados_select['correo'] = $this->correo;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->logo = $this->Db->BlobDecode($rs->fields[9]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_oracle')
              { 
                  $this->logo = $this->Db->BlobDecode($rs->fields[9]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[9]) && !empty($rs->fields[9]) && is_file($rs->fields[9])) 
                  { 
                     $this->logo = file_get_contents($rs->fields[9]);
                  }else 
                  { 
                     $this->logo = ''; 
                  } 
              } 
              else
              { 
                  $this->logo = $rs->fields[9] ; 
              } 
              $this->nmgp_dados_select['logo'] = $this->logo;
              $this->nombre_archivo = $rs->fields[10] ; 
              $this->nmgp_dados_select['nombre_archivo'] = $this->nombre_archivo;
              $this->tamanio = $rs->fields[11] ; 
              $this->nmgp_dados_select['tamanio'] = $this->tamanio;
              $this->detalle_trib = $rs->fields[12] ; 
              $this->nmgp_dados_select['detalle_trib'] = $this->detalle_trib;
              $this->codigos_ciiu = $rs->fields[13] ; 
              $this->nmgp_dados_select['codigos_ciiu'] = $this->codigos_ciiu;
              $this->responsab_trib = $rs->fields[14] ; 
              $this->nmgp_dados_select['responsab_trib'] = $this->responsab_trib;
              $this->tipo_documento = $rs->fields[15] ; 
              $this->nmgp_dados_select['tipo_documento'] = $this->tipo_documento;
              $this->nombre_comercial = $rs->fields[16] ; 
              $this->nmgp_dados_select['nombre_comercial'] = $this->nombre_comercial;
              $this->nompais = $rs->fields[17] ; 
              $this->nmgp_dados_select['nompais'] = $this->nompais;
              $this->nom_depto = $rs->fields[18] ; 
              $this->nmgp_dados_select['nom_depto'] = $this->nom_depto;
              $this->municipio = $rs->fields[19] ; 
              $this->nmgp_dados_select['municipio'] = $this->municipio;
              $this->ciudad = $rs->fields[20] ; 
              $this->nmgp_dados_select['ciudad'] = $this->ciudad;
              $this->codigo_postal = $rs->fields[21] ; 
              $this->nmgp_dados_select['codigo_postal'] = $this->codigo_postal;
              $this->sucursal = $rs->fields[22] ; 
              $this->nmgp_dados_select['sucursal'] = $this->sucursal;
              $this->codigo_te = $rs->fields[23] ; 
              $this->nmgp_dados_select['codigo_te'] = $this->codigo_te;
              $this->ruta_logo = $rs->fields[24] ; 
              $this->nmgp_dados_select['ruta_logo'] = $this->ruta_logo;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->iddatos = (string)$this->iddatos; 
              $this->dv = (string)$this->dv; 
              $this->naturaleza = (string)$this->naturaleza; 
              $this->regimen = (string)$this->regimen; 
              $this->municipio = (string)$this->municipio; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['parms'] = "iddatos?#?$this->iddatos?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['sub_dir'][0]  = "/logos/" . $_SESSION['gbd_seleccionada'] . "/";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['reg_start'] < $qt_geral_reg_form_datosemp_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['opcao']   = '';
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
              $this->iddatos = "";  
              $this->nmgp_dados_form["iddatos"] = $this->iddatos;
              $this->razonsoc = "";  
              $this->nmgp_dados_form["razonsoc"] = $this->razonsoc;
              $this->nit = "";  
              $this->nmgp_dados_form["nit"] = $this->nit;
              $this->dv = "";  
              $this->nmgp_dados_form["dv"] = $this->dv;
              $this->direccion = "";  
              $this->nmgp_dados_form["direccion"] = $this->direccion;
              $this->naturaleza = "";  
              $this->nmgp_dados_form["naturaleza"] = $this->naturaleza;
              $this->regimen = "";  
              $this->nmgp_dados_form["regimen"] = $this->regimen;
              $this->telefono = "";  
              $this->nmgp_dados_form["telefono"] = $this->telefono;
              $this->correo = "";  
              $this->nmgp_dados_form["correo"] = $this->correo;
              $this->logo = "";  
              $this->logo_ul_name = "" ;  
              $this->logo_ul_type = "" ;  
              $this->nmgp_dados_form["logo"] = $this->logo;
              $this->nombre_archivo = "";  
              $this->nmgp_dados_form["nombre_archivo"] = $this->nombre_archivo;
              $this->tamanio = "";  
              $this->nmgp_dados_form["tamanio"] = $this->tamanio;
              $this->detalle_trib = "ZZ";  
              $this->nmgp_dados_form["detalle_trib"] = $this->detalle_trib;
              $this->codigos_ciiu = "6202";  
              $this->nmgp_dados_form["codigos_ciiu"] = $this->codigos_ciiu;
              $this->responsab_trib = "R-99-PN";  
              $this->nmgp_dados_form["responsab_trib"] = $this->responsab_trib;
              $this->tipo_documento = "";  
              $this->nmgp_dados_form["tipo_documento"] = $this->tipo_documento;
              $this->nombre_comercial = "";  
              $this->nmgp_dados_form["nombre_comercial"] = $this->nombre_comercial;
              $this->nompais = "COLOMBIA";  
              $this->nmgp_dados_form["nompais"] = $this->nompais;
              $this->nom_depto = "NORTE DE SANTANDER";  
              $this->nmgp_dados_form["nom_depto"] = $this->nom_depto;
              $this->municipio = "828";  
              $this->nmgp_dados_form["municipio"] = $this->municipio;
              $this->ciudad = "";  
              $this->nmgp_dados_form["ciudad"] = $this->ciudad;
              $this->codigo_postal = "54001";  
              $this->nmgp_dados_form["codigo_postal"] = $this->codigo_postal;
              $this->sucursal = "001";  
              $this->nmgp_dados_form["sucursal"] = $this->sucursal;
              $this->codigo_te = "E-16";  
              $this->nmgp_dados_form["codigo_te"] = $this->codigo_te;
              $this->ruta_logo = "";  
              $this->ruta_logo_ul_name = "" ;  
              $this->ruta_logo_ul_type = "" ;  
              $this->nmgp_dados_form["ruta_logo"] = $this->ruta_logo;
              $this->ciiu = "";  
              $this->nmgp_dados_form["ciiu"] = $this->ciiu;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['foreign_key'] as $sFKName => $sFKValue)
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
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

// 
 function gera_icone($doc) 
 {
    $cam_icone = "";
    $path =  $this->Ini->root . $this->Ini->path_icones . "/";
    if (is_dir($path))
    {
        $nm_icones = nm_list_icon($path); 
        $nm_tipo = strtolower(substr($doc, strrpos($doc, ".") + 1));
        $nm_tipo = str_replace(array('docx', 'xlsx'), array('doc', 'xls'), $nm_tipo);
        if (isset($nm_icones[$nm_tipo]) && !empty($nm_icones[$nm_tipo]))
        {
            $cam_icone = $this->Ini->path_icones . "/" . $nm_icones[$nm_tipo];
        }
        else
        {
            $cam_icone = $this->Ini->path_icones . "/" . $nm_icones["default"];
        }
    }
    return $cam_icone;
 } 
//
function fDigitoVerif($vdocumento)
{
$_SESSION['scriptcase']['form_datosemp_mob']['contr_erro'] = 'on';
  
$long=strlen($vdocumento);
$str=$vdocumento;
$arr = str_split($str);
$vdv = "";
switch ($long)
{
	case 4:
	$valor=$arr[3]*3+$arr[2]*7+$arr[1]*13+$arr[0]*17;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
	{
		$vdv = $dig;
	}
	else
	{
		$vdv = 11-$dig;
	}
	break;

	case 5:
	$valor=$arr[0]*19+$arr[1]*17+$arr[2]*13+$arr[3]*7+$arr[4]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
	{
		$vdv = $dig;
	}
	else
	{
		$vdv = 11-$dig;
	}
	break;

	case 6:
	$valor=$arr[0]*23+$arr[1]*19+$arr[2]*17+$arr[3]*13+$arr[4]*7+$arr[5]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
	{
		$vdv = $dig;
	}
	else
	{
		$vdv = 11-$dig;
	}
	break;

	case 7:
	$valor=$arr[0]*29+$arr[1]*23+$arr[2]*19+$arr[3]*17+$arr[4]*13+$arr[5]*7+$arr[6]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
	{
		$vdv = $dig;
	}
	else
	{
		$vdv = 11-$dig;
	}
	break;

	case 8:
	$valor=$arr[0]*37+$arr[1]*29+$arr[2]*23+$arr[3]*19+$arr[4]*17+$arr[5]*13+$arr[6]*7+$arr[7]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
	{
		$vdv = $dig;
	}
	else
	{
		$vdv = 11-$dig;
	}
	break;

	case 9:
	$valor=$arr[0]*41+$arr[1]*37+$arr[2]*29+$arr[3]*23+$arr[4]*19+$arr[5]*17+$arr[6]*13+$arr[7]*7+$arr[8]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
	{
		$vdv = $dig;
	}
	else
	{
		$vdv = 11-$dig;
	}
	break;

	case 10:
	$valor=$arr[0]*43+$arr[1]*41+$arr[2]*37+$arr[3]*29+$arr[4]*23+$arr[5]*19+$arr[6]*17+$arr[7]*13+$arr[8]*7+$arr[9]*3;
	$dig=$valor%11;
	if($dig==1 or $dig==0)
	{
		$vdv = $dig;
	}
	else
	{
		$vdv = 11-$dig;
	}
	break;
}

return $vdv;


$_SESSION['scriptcase']['form_datosemp_mob']['contr_erro'] = 'off';
}
function nit_onChange()
{
$_SESSION['scriptcase']['form_datosemp_mob']['contr_erro'] = 'on';
  
$original_tipo_documento = $this->tipo_documento;
$original_nit = $this->nit;
$original_dv = $this->dv;

if($this->tipo_documento ==31)
{
	if($this->nit >0)
	{
		$this->dv  = $this->fDigitoVerif($this->nit );
	}
}

$modificado_tipo_documento = $this->tipo_documento;
$modificado_nit = $this->nit;
$modificado_dv = $this->dv;
$this->nm_formatar_campos('tipo_documento', 'nit', 'dv');
if ($original_tipo_documento !== $modificado_tipo_documento || isset($this->nmgp_cmp_readonly['tipo_documento']) || (isset($bFlagRead_tipo_documento) && $bFlagRead_tipo_documento))
{
    $this->ajax_return_values_tipo_documento(true);
}
if ($original_nit !== $modificado_nit || isset($this->nmgp_cmp_readonly['nit']) || (isset($bFlagRead_nit) && $bFlagRead_nit))
{
    $this->ajax_return_values_nit(true);
}
if ($original_dv !== $modificado_dv || isset($this->nmgp_cmp_readonly['dv']) || (isset($bFlagRead_dv) && $bFlagRead_dv))
{
    $this->ajax_return_values_dv(true);
}
$this->NM_ajax_info['event_field'] = 'nit';
form_datosemp_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_datosemp_mob']['contr_erro'] = 'off';
}
function tipo_documento_onChange()
{
$_SESSION['scriptcase']['form_datosemp_mob']['contr_erro'] = 'on';
  
$original_tipo_documento = $this->tipo_documento;
$original_nit = $this->nit;
$original_dv = $this->dv;

if($this->tipo_documento ==31)
{
	if($this->nit >0)
	{
		$this->dv  = $this->fDigitoVerif($this->nit );
	}
}

$modificado_tipo_documento = $this->tipo_documento;
$modificado_nit = $this->nit;
$modificado_dv = $this->dv;
$this->nm_formatar_campos('tipo_documento', 'nit', 'dv');
if ($original_tipo_documento !== $modificado_tipo_documento || isset($this->nmgp_cmp_readonly['tipo_documento']) || (isset($bFlagRead_tipo_documento) && $bFlagRead_tipo_documento))
{
    $this->ajax_return_values_tipo_documento(true);
}
if ($original_nit !== $modificado_nit || isset($this->nmgp_cmp_readonly['nit']) || (isset($bFlagRead_nit) && $bFlagRead_nit))
{
    $this->ajax_return_values_nit(true);
}
if ($original_dv !== $modificado_dv || isset($this->nmgp_cmp_readonly['dv']) || (isset($bFlagRead_dv) && $bFlagRead_dv))
{
    $this->ajax_return_values_dv(true);
}
$this->NM_ajax_info['event_field'] = 'tipo';
form_datosemp_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_datosemp_mob']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_datosemp_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['retorno_edit'] . "';";
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
       $out_logo = "";  
   } 
   else 
   { 
       $out_logo = $this->logo;  
   } 
   if ($this->logo != "" && $this->logo != "none")   
   { 
       $sTmpExtension = pathinfo($this->nombre_archivo, PATHINFO_EXTENSION);
       $sTmpExtension = null == $sTmpExtension ? '' : '.' . $sTmpExtension;
       $sTmpFile_nombre_archivo = 'sc_logo_' . md5(mt_rand(1, 1000) . microtime() . session_id()) . $sTmpExtension;
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['download_filenames']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['download_filenames'] = array();
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp']['download_filenames'][$sTmpFile_nombre_archivo] = $this->nombre_archivo;
       $out_logo = $this->Ini->path_imag_temp . "/" . $sTmpFile_nombre_archivo;
       $arq_logo = fopen($this->Ini->root . $out_logo, "w") ;  
       if (substr($this->logo, 0, 4) == "*nm*" && (strstr(strtoupper($this->Ini->nm_tpbanco),"MSSQL") || strstr(strtoupper($this->Ini->nm_tpbanco),"PDOSQLITE"))) 
       { 
           $this->logo = base64_decode($this->logo) ; 
       } 
       fwrite($arq_logo, $this->logo) ;  
       fclose($arq_logo) ;  
       if (isset($this->NM_size_docs[$nombre_archivo]))
       {
           if ($this->NM_size_docs[$nombre_archivo] != filesize($this->Ini->root . $out_logo))
           {
               echo "<font=3><b>" . $this->Ini->Nm_lang['lang_errm_dcmt'] . $nombre_archivo . "</font></b>";
           }
       }
   } 
   if ($this->nmgp_opcao == "novo")
   { 
       $out_ruta_logo = "";  
   } 
   else 
   { 
       $out_ruta_logo = $this->ruta_logo;  
   } 
   if ($this->ruta_logo != "" && $this->ruta_logo != "none")   
   { 
       $path_ruta_logo = $this->Ini->root . $this->Ini->path_imagens . "/logos/" . $_SESSION['gbd_seleccionada'] . "/" . "/" . $this->ruta_logo;
       $md5_ruta_logo  = md5("/logos/" . $_SESSION['gbd_seleccionada'] . "/" . $this->ruta_logo);
       nm_fix_SubDirUpload($this->ruta_logo,$this->Ini->root . $this->Ini->path_imagens,"/logos/" . $_SESSION['gbd_seleccionada'] . "/");
        if (is_file($path_ruta_logo))  
       { 
           $NM_ler_img = true;
           $out_ruta_logo = $this->Ini->path_imag_temp . "/sc_ruta_logo_" . $md5_ruta_logo . ".gif" ;  
           if (is_file($this->Ini->root . $out_ruta_logo))  
           { 
               $NM_img_time = filemtime($this->Ini->root . $out_ruta_logo) + 0; 
               if ($this->Ini->nm_timestamp < $NM_img_time)  
               { 
                   $NM_ler_img = false;
               } 
           } 
           if ($NM_ler_img) 
           { 
               $tmp_ruta_logo = fopen($path_ruta_logo, "r") ; 
               $reg_ruta_logo = fread($tmp_ruta_logo, filesize($path_ruta_logo)) ; 
               fclose($tmp_ruta_logo) ;  
               $arq_ruta_logo = fopen($this->Ini->root . $out_ruta_logo, "w") ;  
               fwrite($arq_ruta_logo, $reg_ruta_logo) ;  
               fclose($arq_ruta_logo) ;  
           } 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out_ruta_logo, true);
           $this->nmgp_return_img['ruta_logo'][0] = $sc_obj_img->getHeight();
           $this->nmgp_return_img['ruta_logo'][1] = $sc_obj_img->getWidth();
       if ($this->Ini->Export_img_zip) {
           $this->Ini->Img_export_zip[] = $this->Ini->root . $out_ruta_logo;
           $out_ruta_logo = str_replace($this->Ini->path_imag_temp . "/", "", $out_ruta_logo);
       } 
       } 
   } 
   if (isset($_POST['nmgp_opcao']) && 'excluir' == $_POST['nmgp_opcao'] && $this->sc_evento != "delete" && (!isset($this->sc_evento_old) || 'delete' != $this->sc_evento_old))
   {
       global $temp_out_ruta_logo;
       if (isset($temp_out_ruta_logo))
       {
           $out_ruta_logo = $temp_out_ruta_logo;
       }
   }
        $this->initFormPages();
    include_once("form_datosemp_mob_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("iddatos", "razonsoc", "nit", "direccion", "naturaleza", "regimen"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['csrf_token'];
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

   function Form_lookup_codigo_te()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigo_te']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigo_te'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigo_te']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigo_te'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigo_te']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigo_te'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigo_te']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigo_te'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo_te, codigo_te + ' - ' + descripcion_te  FROM tipos_establecimientos  ORDER BY codigo_te, descripcion_te";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo_te, concat(codigo_te, ' - ',descripcion_te)  FROM tipos_establecimientos  ORDER BY codigo_te, descripcion_te";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo_te, codigo_te&' - '&descripcion_te  FROM tipos_establecimientos  ORDER BY codigo_te, descripcion_te";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo_te, codigo_te||' - '||descripcion_te  FROM tipos_establecimientos  ORDER BY codigo_te, descripcion_te";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo_te, codigo_te + ' - ' + descripcion_te  FROM tipos_establecimientos  ORDER BY codigo_te, descripcion_te";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo_te, codigo_te||' - '||descripcion_te  FROM tipos_establecimientos  ORDER BY codigo_te, descripcion_te";
   }
   else
   {
       $nm_comando = "SELECT codigo_te, codigo_te||' - '||descripcion_te  FROM tipos_establecimientos  ORDER BY codigo_te, descripcion_te";
   }

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigo_te'][] = $rs->fields[0];
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
   function Form_lookup_sucursal()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_sucursal']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_sucursal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_sucursal']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_sucursal'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_sucursal']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_sucursal'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_sucursal']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_sucursal'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo_suc, codigo_suc + ' - ' + observacion_suc  FROM sucursales  ORDER BY codigo_suc, observacion_suc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo_suc, concat(codigo_suc,' - ', observacion_suc)  FROM sucursales  ORDER BY codigo_suc, observacion_suc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo_suc, codigo_suc&' - '&observacion_suc  FROM sucursales  ORDER BY codigo_suc, observacion_suc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo_suc, codigo_suc||' - '||observacion_suc  FROM sucursales  ORDER BY codigo_suc, observacion_suc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo_suc, codigo_suc + ' - ' + observacion_suc  FROM sucursales  ORDER BY codigo_suc, observacion_suc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo_suc, codigo_suc||' - '||observacion_suc  FROM sucursales  ORDER BY codigo_suc, observacion_suc";
   }
   else
   {
       $nm_comando = "SELECT codigo_suc, codigo_suc||' - '||observacion_suc  FROM sucursales  ORDER BY codigo_suc, observacion_suc";
   }

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_sucursal'][] = $rs->fields[0];
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
   function Form_lookup_regimen()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "No responsable de IVA?#?0?#?S?@?";
       $nmgp_def_dados .= "Responsable de IVA?#?1?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_naturaleza()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Natural?#?1?#?S?@?";
       $nmgp_def_dados .= "Jurídica?#?2?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_tipo_documento()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Registro civil de nacimiento?#?11?#?N?@?";
       $nmgp_def_dados .= "Tarjeta de identidad?#?12?#?N?@?";
       $nmgp_def_dados .= "Cédula de ciudadanía?#?13?#?S?@?";
       $nmgp_def_dados .= "Tarjeta de Extranjería?#?21?#?N?@?";
       $nmgp_def_dados .= "Cédula de extranjería?#?22?#?N?@?";
       $nmgp_def_dados .= "Nit?#?31?#?N?@?";
       $nmgp_def_dados .= "Pasaporte?#?41?#?N?@?";
       $nmgp_def_dados .= "Tipo de documento extranjero?#?42?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_nompais()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nompais']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nompais'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nompais']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nompais'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nompais']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nompais'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nompais']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nompais'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   $nm_comando = "SELECT nompais, nompais  FROM paises  ORDER BY nompais";

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nompais'][] = $rs->fields[0];
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
   function Form_lookup_nom_depto()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nom_depto']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nom_depto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nom_depto']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nom_depto'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nom_depto']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nom_depto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nom_depto']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nom_depto'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT departamento, cod_iso3166 + ' - ' + departamento  FROM departamento  ORDER BY departamento, cod_iso3166";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT departamento, concat(cod_iso3166, ' - ',departamento)  FROM departamento  ORDER BY departamento, cod_iso3166";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT departamento, cod_iso3166&' - '&departamento  FROM departamento  ORDER BY departamento, cod_iso3166";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT departamento, cod_iso3166||' - '||departamento  FROM departamento  ORDER BY departamento, cod_iso3166";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT departamento, cod_iso3166 + ' - ' + departamento  FROM departamento  ORDER BY departamento, cod_iso3166";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT departamento, cod_iso3166||' - '||departamento  FROM departamento  ORDER BY departamento, cod_iso3166";
   }
   else
   {
       $nm_comando = "SELECT departamento, cod_iso3166||' - '||departamento  FROM departamento  ORDER BY departamento, cod_iso3166";
   }

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_nom_depto'][] = $rs->fields[0];
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
   function Form_lookup_municipio()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_municipio']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_municipio'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_municipio']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_municipio'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_municipio']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_municipio'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_municipio']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_municipio'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   $nm_comando = "SELECT idmun, municipio  FROM municipio  WHERE iddepar=(SELECT iddep from departamento where departamento like '$this->nom_depto') ORDER BY municipio";

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_municipio'][] = $rs->fields[0];
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
   function Form_lookup_ciudad()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_ciudad']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_ciudad'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_ciudad']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_ciudad'] = array(); 
}
if ($this->municipio != "")
{ 
   $this->nm_clear_val("municipio");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_ciudad']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_ciudad'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_ciudad']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_ciudad'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   $nm_comando = "SELECT municipio FROM municipio  WHERE idmun=$this->municipio ORDER BY municipio";

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_ciudad'][] = $rs->fields[0];
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
} 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_detalle_trib()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_detalle_trib']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_detalle_trib'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_detalle_trib']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_detalle_trib'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_detalle_trib']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_detalle_trib'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_detalle_trib']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_detalle_trib'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + descripcion_dt  FROM detalle_tributario  WHERE codigo in('01','ZZ','ZY') ORDER BY id_detalle_trib, codigo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo, ' - ',descripcion_dt)  FROM detalle_tributario  WHERE codigo in('01','ZZ','ZY') ORDER BY id_detalle_trib, codigo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&descripcion_dt  FROM detalle_tributario  WHERE codigo in('01','ZZ','ZY') ORDER BY id_detalle_trib, codigo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||descripcion_dt  FROM detalle_tributario  WHERE codigo in('01','ZZ','ZY') ORDER BY id_detalle_trib, codigo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + descripcion_dt  FROM detalle_tributario  WHERE codigo in('01','ZZ','ZY') ORDER BY id_detalle_trib, codigo";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||descripcion_dt  FROM detalle_tributario  WHERE codigo in('01','ZZ','ZY') ORDER BY id_detalle_trib, codigo";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||descripcion_dt  FROM detalle_tributario  WHERE codigo in('01','ZZ','ZY') ORDER BY id_detalle_trib, codigo";
   }

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_detalle_trib'][] = $rs->fields[0];
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
   function Form_lookup_codigos_ciiu()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigos_ciiu']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigos_ciiu'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigos_ciiu']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigos_ciiu'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigos_ciiu']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigos_ciiu'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigos_ciiu']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigos_ciiu'] = array(); 
    }

   $old_value_dv = $this->dv;
   $old_value_iddatos = $this->iddatos;
   $this->nm_tira_formatacao();


   $unformatted_value_dv = $this->dv;
   $unformatted_value_iddatos = $this->iddatos;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo_ciiu, codigo_ciiu + ' - ' + descripcion  FROM codigos_ciiu  ORDER BY id_ciiu, codigo_ciiu, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo_ciiu, concat(codigo_ciiu, ' - ',descripcion)  FROM codigos_ciiu  ORDER BY id_ciiu, codigo_ciiu, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo_ciiu, codigo_ciiu&' - '&descripcion  FROM codigos_ciiu  ORDER BY id_ciiu, codigo_ciiu, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo_ciiu, codigo_ciiu||' - '||descripcion  FROM codigos_ciiu  ORDER BY id_ciiu, codigo_ciiu, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo_ciiu, codigo_ciiu + ' - ' + descripcion  FROM codigos_ciiu  ORDER BY id_ciiu, codigo_ciiu, descripcion";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo_ciiu, codigo_ciiu||' - '||descripcion  FROM codigos_ciiu  ORDER BY id_ciiu, codigo_ciiu, descripcion";
   }
   else
   {
       $nm_comando = "SELECT codigo_ciiu, codigo_ciiu||' - '||descripcion  FROM codigos_ciiu  ORDER BY id_ciiu, codigo_ciiu, descripcion";
   }

   $this->dv = $old_value_dv;
   $this->iddatos = $old_value_iddatos;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['Lookup_codigos_ciiu'][] = $rs->fields[0];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_datosemp_mob_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "iddatos", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "razonsoc", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nit", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "direccion", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_naturaleza($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "naturaleza", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_regimen($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "regimen", $arg_search, $data_lookup);
              }
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_filter_form'] . " and (iddatos=1) and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where iddatos=1 and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_datosemp_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['total'] = $qt_geral_reg_form_datosemp_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_datosemp_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_datosemp_mob_pack_ajax_response();
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
      $nm_numeric[] = "iddatos";$nm_numeric[] = "dv";$nm_numeric[] = "naturaleza";$nm_numeric[] = "regimen";$nm_numeric[] = "municipio";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['decimal_db'] == ".")
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
   function SC_lookup_naturaleza($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "Natural";
       $data_look['2'] = "Jurídica";
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
   function SC_lookup_regimen($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['0'] = "No responsable de IVA";
       $data_look['1'] = "Responsable de IVA";
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
       $nmgp_saida_form = "form_datosemp_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_datosemp_mob_fim.php";
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
       form_datosemp_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datosemp_mob']['masterValue']);
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
}
?>
