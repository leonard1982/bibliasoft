<?php
//
class form_etiquetas_apl
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
   var $idetiqueta;
   var $idfamilia;
   var $idfamilia_1;
   var $codigo;
   var $descripcion;
   var $size_letra_descripcion;
   var $tipo_letra;
   var $tipo_letra_1;
   var $columnas;
   var $tipo_codigo;
   var $tipo_codigo_1;
   var $tipo_imagen;
   var $tipo_imagen_1;
   var $altura;
   var $anchura;
   var $precio;
   var $precio_1;
   var $ver_codigo;
   var $ver_codigo_1;
   var $ver_descripcion;
   var $ver_descripcion_1;
   var $titulo;
   var $personalizado1;
   var $personalizado2;
   var $personalizado3;
   var $espaciado;
   var $ancho_descripcion;
   var $size_letra_codigo;
   var $size_letra_precio;
   var $size_letra_perso1;
   var $size_letra_perso2;
   var $size_letra_perso3;
   var $posicion_codigo;
   var $posicion_descripcion;
   var $posicion_precio;
   var $posicion_perso1;
   var $posicion_perso2;
   var $posicion_perso3;
   var $alineacion;
   var $alineacion_1;
   var $nombre_configuracion;
   var $copias;
   var $nompro;
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
          if (isset($this->NM_ajax_info['param']['alineacion']))
          {
              $this->alineacion = $this->NM_ajax_info['param']['alineacion'];
          }
          if (isset($this->NM_ajax_info['param']['altura']))
          {
              $this->altura = $this->NM_ajax_info['param']['altura'];
          }
          if (isset($this->NM_ajax_info['param']['ancho_descripcion']))
          {
              $this->ancho_descripcion = $this->NM_ajax_info['param']['ancho_descripcion'];
          }
          if (isset($this->NM_ajax_info['param']['anchura']))
          {
              $this->anchura = $this->NM_ajax_info['param']['anchura'];
          }
          if (isset($this->NM_ajax_info['param']['codigo']))
          {
              $this->codigo = $this->NM_ajax_info['param']['codigo'];
          }
          if (isset($this->NM_ajax_info['param']['columnas']))
          {
              $this->columnas = $this->NM_ajax_info['param']['columnas'];
          }
          if (isset($this->NM_ajax_info['param']['copias']))
          {
              $this->copias = $this->NM_ajax_info['param']['copias'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['descripcion']))
          {
              $this->descripcion = $this->NM_ajax_info['param']['descripcion'];
          }
          if (isset($this->NM_ajax_info['param']['espaciado']))
          {
              $this->espaciado = $this->NM_ajax_info['param']['espaciado'];
          }
          if (isset($this->NM_ajax_info['param']['idetiqueta']))
          {
              $this->idetiqueta = $this->NM_ajax_info['param']['idetiqueta'];
          }
          if (isset($this->NM_ajax_info['param']['idfamilia']))
          {
              $this->idfamilia = $this->NM_ajax_info['param']['idfamilia'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['nombre_configuracion']))
          {
              $this->nombre_configuracion = $this->NM_ajax_info['param']['nombre_configuracion'];
          }
          if (isset($this->NM_ajax_info['param']['nompro']))
          {
              $this->nompro = $this->NM_ajax_info['param']['nompro'];
          }
          if (isset($this->NM_ajax_info['param']['personalizado1']))
          {
              $this->personalizado1 = $this->NM_ajax_info['param']['personalizado1'];
          }
          if (isset($this->NM_ajax_info['param']['personalizado2']))
          {
              $this->personalizado2 = $this->NM_ajax_info['param']['personalizado2'];
          }
          if (isset($this->NM_ajax_info['param']['personalizado3']))
          {
              $this->personalizado3 = $this->NM_ajax_info['param']['personalizado3'];
          }
          if (isset($this->NM_ajax_info['param']['posicion_codigo']))
          {
              $this->posicion_codigo = $this->NM_ajax_info['param']['posicion_codigo'];
          }
          if (isset($this->NM_ajax_info['param']['posicion_descripcion']))
          {
              $this->posicion_descripcion = $this->NM_ajax_info['param']['posicion_descripcion'];
          }
          if (isset($this->NM_ajax_info['param']['posicion_perso1']))
          {
              $this->posicion_perso1 = $this->NM_ajax_info['param']['posicion_perso1'];
          }
          if (isset($this->NM_ajax_info['param']['posicion_perso2']))
          {
              $this->posicion_perso2 = $this->NM_ajax_info['param']['posicion_perso2'];
          }
          if (isset($this->NM_ajax_info['param']['posicion_perso3']))
          {
              $this->posicion_perso3 = $this->NM_ajax_info['param']['posicion_perso3'];
          }
          if (isset($this->NM_ajax_info['param']['posicion_precio']))
          {
              $this->posicion_precio = $this->NM_ajax_info['param']['posicion_precio'];
          }
          if (isset($this->NM_ajax_info['param']['precio']))
          {
              $this->precio = $this->NM_ajax_info['param']['precio'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['size_letra_codigo']))
          {
              $this->size_letra_codigo = $this->NM_ajax_info['param']['size_letra_codigo'];
          }
          if (isset($this->NM_ajax_info['param']['size_letra_descripcion']))
          {
              $this->size_letra_descripcion = $this->NM_ajax_info['param']['size_letra_descripcion'];
          }
          if (isset($this->NM_ajax_info['param']['size_letra_perso1']))
          {
              $this->size_letra_perso1 = $this->NM_ajax_info['param']['size_letra_perso1'];
          }
          if (isset($this->NM_ajax_info['param']['size_letra_perso2']))
          {
              $this->size_letra_perso2 = $this->NM_ajax_info['param']['size_letra_perso2'];
          }
          if (isset($this->NM_ajax_info['param']['size_letra_perso3']))
          {
              $this->size_letra_perso3 = $this->NM_ajax_info['param']['size_letra_perso3'];
          }
          if (isset($this->NM_ajax_info['param']['size_letra_precio']))
          {
              $this->size_letra_precio = $this->NM_ajax_info['param']['size_letra_precio'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_codigo']))
          {
              $this->tipo_codigo = $this->NM_ajax_info['param']['tipo_codigo'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_imagen']))
          {
              $this->tipo_imagen = $this->NM_ajax_info['param']['tipo_imagen'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_letra']))
          {
              $this->tipo_letra = $this->NM_ajax_info['param']['tipo_letra'];
          }
          if (isset($this->NM_ajax_info['param']['titulo']))
          {
              $this->titulo = $this->NM_ajax_info['param']['titulo'];
          }
          if (isset($this->NM_ajax_info['param']['ver_codigo']))
          {
              $this->ver_codigo = $this->NM_ajax_info['param']['ver_codigo'];
          }
          if (isset($this->NM_ajax_info['param']['ver_descripcion']))
          {
              $this->ver_descripcion = $this->NM_ajax_info['param']['ver_descripcion'];
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
          $_SESSION['sc_session'][$script_case_init]['form_etiquetas']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_etiquetas']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_etiquetas']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_etiquetas']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_etiquetas']['embutida_parms']);
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
                 nm_limpa_str_form_etiquetas($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_etiquetas']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_etiquetas']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_etiquetas']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_etiquetas']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_etiquetas']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_etiquetas']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_etiquetas']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_etiquetas']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_etiquetas']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_etiquetas']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_etiquetas']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_etiquetas']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_etiquetas']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_etiquetas']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_etiquetas_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_etiquetas']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_etiquetas']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_etiquetas'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_etiquetas']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_etiquetas']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_etiquetas') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_etiquetas']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - etiquetas";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_etiquetas")
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



      $_SESSION['scriptcase']['error_icon']['form_etiquetas']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_etiquetas'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['goto']      = 'on';
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_etiquetas']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_etiquetas'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_etiquetas'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_etiquetas", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'form_etiquetas_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_etiquetas_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_etiquetas/form_etiquetas_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_etiquetas_erro.class.php"); 
      }
      $this->Erro      = new form_etiquetas_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['opcao']))
         { 
             if ($this->idetiqueta != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_etiquetas']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dados_form'];
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
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['form_etiquetas']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['form_etiquetas']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
      if (isset($this->idetiqueta)) { $this->nm_limpa_alfa($this->idetiqueta); }
      if (isset($this->idfamilia)) { $this->nm_limpa_alfa($this->idfamilia); }
      if (isset($this->codigo)) { $this->nm_limpa_alfa($this->codigo); }
      if (isset($this->descripcion)) { $this->nm_limpa_alfa($this->descripcion); }
      if (isset($this->size_letra_descripcion)) { $this->nm_limpa_alfa($this->size_letra_descripcion); }
      if (isset($this->tipo_letra)) { $this->nm_limpa_alfa($this->tipo_letra); }
      if (isset($this->columnas)) { $this->nm_limpa_alfa($this->columnas); }
      if (isset($this->tipo_codigo)) { $this->nm_limpa_alfa($this->tipo_codigo); }
      if (isset($this->tipo_imagen)) { $this->nm_limpa_alfa($this->tipo_imagen); }
      if (isset($this->altura)) { $this->nm_limpa_alfa($this->altura); }
      if (isset($this->anchura)) { $this->nm_limpa_alfa($this->anchura); }
      if (isset($this->precio)) { $this->nm_limpa_alfa($this->precio); }
      if (isset($this->ver_codigo)) { $this->nm_limpa_alfa($this->ver_codigo); }
      if (isset($this->ver_descripcion)) { $this->nm_limpa_alfa($this->ver_descripcion); }
      if (isset($this->titulo)) { $this->nm_limpa_alfa($this->titulo); }
      if (isset($this->personalizado1)) { $this->nm_limpa_alfa($this->personalizado1); }
      if (isset($this->personalizado2)) { $this->nm_limpa_alfa($this->personalizado2); }
      if (isset($this->personalizado3)) { $this->nm_limpa_alfa($this->personalizado3); }
      if (isset($this->espaciado)) { $this->nm_limpa_alfa($this->espaciado); }
      if (isset($this->ancho_descripcion)) { $this->nm_limpa_alfa($this->ancho_descripcion); }
      if (isset($this->size_letra_codigo)) { $this->nm_limpa_alfa($this->size_letra_codigo); }
      if (isset($this->size_letra_precio)) { $this->nm_limpa_alfa($this->size_letra_precio); }
      if (isset($this->size_letra_perso1)) { $this->nm_limpa_alfa($this->size_letra_perso1); }
      if (isset($this->size_letra_perso2)) { $this->nm_limpa_alfa($this->size_letra_perso2); }
      if (isset($this->size_letra_perso3)) { $this->nm_limpa_alfa($this->size_letra_perso3); }
      if (isset($this->posicion_codigo)) { $this->nm_limpa_alfa($this->posicion_codigo); }
      if (isset($this->posicion_descripcion)) { $this->nm_limpa_alfa($this->posicion_descripcion); }
      if (isset($this->posicion_precio)) { $this->nm_limpa_alfa($this->posicion_precio); }
      if (isset($this->posicion_perso1)) { $this->nm_limpa_alfa($this->posicion_perso1); }
      if (isset($this->posicion_perso2)) { $this->nm_limpa_alfa($this->posicion_perso2); }
      if (isset($this->posicion_perso3)) { $this->nm_limpa_alfa($this->posicion_perso3); }
      if (isset($this->alineacion)) { $this->nm_limpa_alfa($this->alineacion); }
      if (isset($this->nombre_configuracion)) { $this->nm_limpa_alfa($this->nombre_configuracion); }
      if (isset($this->copias)) { $this->nm_limpa_alfa($this->copias); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- idetiqueta
      $this->field_config['idetiqueta']               = array();
      $this->field_config['idetiqueta']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idetiqueta']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idetiqueta']['symbol_dec'] = '';
      $this->field_config['idetiqueta']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idetiqueta']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- size_letra_descripcion
      $this->field_config['size_letra_descripcion']               = array();
      $this->field_config['size_letra_descripcion']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['size_letra_descripcion']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['size_letra_descripcion']['symbol_dec'] = '';
      $this->field_config['size_letra_descripcion']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['size_letra_descripcion']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- columnas
      $this->field_config['columnas']               = array();
      $this->field_config['columnas']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['columnas']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['columnas']['symbol_dec'] = '';
      $this->field_config['columnas']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['columnas']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- altura
      $this->field_config['altura']               = array();
      $this->field_config['altura']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['altura']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['altura']['symbol_dec'] = '';
      $this->field_config['altura']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['altura']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- anchura
      $this->field_config['anchura']               = array();
      $this->field_config['anchura']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['anchura']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['anchura']['symbol_dec'] = '';
      $this->field_config['anchura']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['anchura']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- espaciado
      $this->field_config['espaciado']               = array();
      $this->field_config['espaciado']['symbol_grp'] = ',';
      $this->field_config['espaciado']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['espaciado']['symbol_dec'] = '.';
      $this->field_config['espaciado']['symbol_mon'] = 'em';
      $this->field_config['espaciado']['format_pos'] = '3';
      $this->field_config['espaciado']['format_neg'] = '2';
      //-- ancho_descripcion
      $this->field_config['ancho_descripcion']               = array();
      $this->field_config['ancho_descripcion']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['ancho_descripcion']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['ancho_descripcion']['symbol_dec'] = '';
      $this->field_config['ancho_descripcion']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['ancho_descripcion']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- size_letra_codigo
      $this->field_config['size_letra_codigo']               = array();
      $this->field_config['size_letra_codigo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['size_letra_codigo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['size_letra_codigo']['symbol_dec'] = '';
      $this->field_config['size_letra_codigo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['size_letra_codigo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- size_letra_precio
      $this->field_config['size_letra_precio']               = array();
      $this->field_config['size_letra_precio']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['size_letra_precio']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['size_letra_precio']['symbol_dec'] = '';
      $this->field_config['size_letra_precio']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['size_letra_precio']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- size_letra_perso1
      $this->field_config['size_letra_perso1']               = array();
      $this->field_config['size_letra_perso1']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['size_letra_perso1']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['size_letra_perso1']['symbol_dec'] = '';
      $this->field_config['size_letra_perso1']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['size_letra_perso1']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- size_letra_perso2
      $this->field_config['size_letra_perso2']               = array();
      $this->field_config['size_letra_perso2']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['size_letra_perso2']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['size_letra_perso2']['symbol_dec'] = '';
      $this->field_config['size_letra_perso2']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['size_letra_perso2']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- size_letra_perso3
      $this->field_config['size_letra_perso3']               = array();
      $this->field_config['size_letra_perso3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['size_letra_perso3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['size_letra_perso3']['symbol_dec'] = '';
      $this->field_config['size_letra_perso3']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['size_letra_perso3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- posicion_codigo
      $this->field_config['posicion_codigo']               = array();
      $this->field_config['posicion_codigo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['posicion_codigo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['posicion_codigo']['symbol_dec'] = '';
      $this->field_config['posicion_codigo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['posicion_codigo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- posicion_descripcion
      $this->field_config['posicion_descripcion']               = array();
      $this->field_config['posicion_descripcion']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['posicion_descripcion']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['posicion_descripcion']['symbol_dec'] = '';
      $this->field_config['posicion_descripcion']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['posicion_descripcion']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- posicion_precio
      $this->field_config['posicion_precio']               = array();
      $this->field_config['posicion_precio']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['posicion_precio']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['posicion_precio']['symbol_dec'] = '';
      $this->field_config['posicion_precio']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['posicion_precio']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- posicion_perso1
      $this->field_config['posicion_perso1']               = array();
      $this->field_config['posicion_perso1']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['posicion_perso1']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['posicion_perso1']['symbol_dec'] = '';
      $this->field_config['posicion_perso1']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['posicion_perso1']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- posicion_perso2
      $this->field_config['posicion_perso2']               = array();
      $this->field_config['posicion_perso2']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['posicion_perso2']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['posicion_perso2']['symbol_dec'] = '';
      $this->field_config['posicion_perso2']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['posicion_perso2']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- posicion_perso3
      $this->field_config['posicion_perso3']               = array();
      $this->field_config['posicion_perso3']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['posicion_perso3']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['posicion_perso3']['symbol_dec'] = '';
      $this->field_config['posicion_perso3']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['posicion_perso3']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- copias
      $this->field_config['copias']               = array();
      $this->field_config['copias']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['copias']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['copias']['symbol_dec'] = '';
      $this->field_config['copias']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['copias']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
          if ('validate_idetiqueta' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idetiqueta');
          }
          if ('validate_nombre_configuracion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nombre_configuracion');
          }
          if ('validate_titulo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'titulo');
          }
          if ('validate_idfamilia' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idfamilia');
          }
          if ('validate_codigo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'codigo');
          }
          if ('validate_nompro' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nompro');
          }
          if ('validate_descripcion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'descripcion');
          }
          if ('validate_size_letra_descripcion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'size_letra_descripcion');
          }
          if ('validate_tipo_letra' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_letra');
          }
          if ('validate_columnas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'columnas');
          }
          if ('validate_tipo_codigo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_codigo');
          }
          if ('validate_tipo_imagen' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_imagen');
          }
          if ('validate_altura' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'altura');
          }
          if ('validate_anchura' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'anchura');
          }
          if ('validate_precio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'precio');
          }
          if ('validate_ver_codigo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ver_codigo');
          }
          if ('validate_ver_descripcion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ver_descripcion');
          }
          if ('validate_personalizado1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'personalizado1');
          }
          if ('validate_personalizado2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'personalizado2');
          }
          if ('validate_personalizado3' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'personalizado3');
          }
          if ('validate_espaciado' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'espaciado');
          }
          if ('validate_ancho_descripcion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ancho_descripcion');
          }
          if ('validate_size_letra_codigo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'size_letra_codigo');
          }
          if ('validate_size_letra_precio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'size_letra_precio');
          }
          if ('validate_size_letra_perso1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'size_letra_perso1');
          }
          if ('validate_size_letra_perso2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'size_letra_perso2');
          }
          if ('validate_size_letra_perso3' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'size_letra_perso3');
          }
          if ('validate_posicion_codigo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'posicion_codigo');
          }
          if ('validate_posicion_descripcion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'posicion_descripcion');
          }
          if ('validate_posicion_precio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'posicion_precio');
          }
          if ('validate_posicion_perso1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'posicion_perso1');
          }
          if ('validate_posicion_perso2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'posicion_perso2');
          }
          if ('validate_posicion_perso3' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'posicion_perso3');
          }
          if ('validate_alineacion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'alineacion');
          }
          if ('validate_copias' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'copias');
          }
          form_etiquetas_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          if ('event_codigo_onchange' == $this->NM_ajax_opcao)
          {
              $this->codigo_onChange();
          }
          form_etiquetas_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->ver_codigo))
          {
              $x = 0; 
              $this->ver_codigo_1 = $this->ver_codigo;
              $this->ver_codigo = ""; 
              if ($this->ver_codigo_1 != "") 
              { 
                  foreach ($this->ver_codigo_1 as $dados_ver_codigo_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->ver_codigo .= ";";
                      } 
                      $this->ver_codigo .= $dados_ver_codigo_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->ver_descripcion))
          {
              $x = 0; 
              $this->ver_descripcion_1 = $this->ver_descripcion;
              $this->ver_descripcion = ""; 
              if ($this->ver_descripcion_1 != "") 
              { 
                  foreach ($this->ver_descripcion_1 as $dados_ver_descripcion_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->ver_descripcion .= ";";
                      } 
                      $this->ver_descripcion .= $dados_ver_descripcion_1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_etiquetas_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_etiquetas']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_etiquetas_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['sc_redir_atualiz'] == "ok")
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
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_etiquetas_pack_ajax_response();
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
          form_etiquetas_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_etiquetas.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - etiquetas") ?></TITLE>
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
<form name="Fdown" method="get" action="form_etiquetas_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_etiquetas"> 
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
           case 'idetiqueta':
               return "Idetiqueta";
               break;
           case 'nombre_configuracion':
               return "Nombre Configuracion";
               break;
           case 'titulo':
               return "Titulo Reporte";
               break;
           case 'idfamilia':
               return "Familia";
               break;
           case 'codigo':
               return "Codigo";
               break;
           case 'nompro':
               return "";
               break;
           case 'descripcion':
               return "Descripcion";
               break;
           case 'size_letra_descripcion':
               return "Tamaño letra descripción";
               break;
           case 'tipo_letra':
               return "Tipo Letra";
               break;
           case 'columnas':
               return "Columnas";
               break;
           case 'tipo_codigo':
               return "Tipo Codigo";
               break;
           case 'tipo_imagen':
               return "Tipo Imagen";
               break;
           case 'altura':
               return "Altura";
               break;
           case 'anchura':
               return "Anchura";
               break;
           case 'precio':
               return "Precio";
               break;
           case 'ver_codigo':
               return "Ver Codigo";
               break;
           case 'ver_descripcion':
               return "Ver Descripcion";
               break;
           case 'personalizado1':
               return "Personalizado 1";
               break;
           case 'personalizado2':
               return "Personalizado 2";
               break;
           case 'personalizado3':
               return "Personalizado 3";
               break;
           case 'espaciado':
               return "Espaciado";
               break;
           case 'ancho_descripcion':
               return "Ancho Descripcion";
               break;
           case 'size_letra_codigo':
               return "Size Letra Codigo";
               break;
           case 'size_letra_precio':
               return "Size Letra Precio";
               break;
           case 'size_letra_perso1':
               return "Size Letra Perso 1";
               break;
           case 'size_letra_perso2':
               return "Size Letra Perso 2";
               break;
           case 'size_letra_perso3':
               return "Size Letra Perso 3";
               break;
           case 'posicion_codigo':
               return "Posicion Codigo";
               break;
           case 'posicion_descripcion':
               return "Posicion Descripcion";
               break;
           case 'posicion_precio':
               return "Posicion Precio";
               break;
           case 'posicion_perso1':
               return "Posicion Perso 1";
               break;
           case 'posicion_perso2':
               return "Posicion Perso 2";
               break;
           case 'posicion_perso3':
               return "Posicion Perso 3";
               break;
           case 'alineacion':
               return "Alineacion";
               break;
           case 'copias':
               return "No Copias";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_etiquetas']) || !is_array($this->NM_ajax_info['errList']['geral_form_etiquetas']))
              {
                  $this->NM_ajax_info['errList']['geral_form_etiquetas'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_etiquetas'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'idetiqueta' == $filtro)) || (is_array($filtro) && in_array('idetiqueta', $filtro)))
        $this->ValidateField_idetiqueta($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nombre_configuracion' == $filtro)) || (is_array($filtro) && in_array('nombre_configuracion', $filtro)))
        $this->ValidateField_nombre_configuracion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'titulo' == $filtro)) || (is_array($filtro) && in_array('titulo', $filtro)))
        $this->ValidateField_titulo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'idfamilia' == $filtro)) || (is_array($filtro) && in_array('idfamilia', $filtro)))
        $this->ValidateField_idfamilia($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'codigo' == $filtro)) || (is_array($filtro) && in_array('codigo', $filtro)))
        $this->ValidateField_codigo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nompro' == $filtro)) || (is_array($filtro) && in_array('nompro', $filtro)))
        $this->ValidateField_nompro($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'descripcion' == $filtro)) || (is_array($filtro) && in_array('descripcion', $filtro)))
        $this->ValidateField_descripcion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'size_letra_descripcion' == $filtro)) || (is_array($filtro) && in_array('size_letra_descripcion', $filtro)))
        $this->ValidateField_size_letra_descripcion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipo_letra' == $filtro)) || (is_array($filtro) && in_array('tipo_letra', $filtro)))
        $this->ValidateField_tipo_letra($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'columnas' == $filtro)) || (is_array($filtro) && in_array('columnas', $filtro)))
        $this->ValidateField_columnas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipo_codigo' == $filtro)) || (is_array($filtro) && in_array('tipo_codigo', $filtro)))
        $this->ValidateField_tipo_codigo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipo_imagen' == $filtro)) || (is_array($filtro) && in_array('tipo_imagen', $filtro)))
        $this->ValidateField_tipo_imagen($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'altura' == $filtro)) || (is_array($filtro) && in_array('altura', $filtro)))
        $this->ValidateField_altura($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'anchura' == $filtro)) || (is_array($filtro) && in_array('anchura', $filtro)))
        $this->ValidateField_anchura($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'precio' == $filtro)) || (is_array($filtro) && in_array('precio', $filtro)))
        $this->ValidateField_precio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ver_codigo' == $filtro)) || (is_array($filtro) && in_array('ver_codigo', $filtro)))
        $this->ValidateField_ver_codigo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ver_descripcion' == $filtro)) || (is_array($filtro) && in_array('ver_descripcion', $filtro)))
        $this->ValidateField_ver_descripcion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'personalizado1' == $filtro)) || (is_array($filtro) && in_array('personalizado1', $filtro)))
        $this->ValidateField_personalizado1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'personalizado2' == $filtro)) || (is_array($filtro) && in_array('personalizado2', $filtro)))
        $this->ValidateField_personalizado2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'personalizado3' == $filtro)) || (is_array($filtro) && in_array('personalizado3', $filtro)))
        $this->ValidateField_personalizado3($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'espaciado' == $filtro)) || (is_array($filtro) && in_array('espaciado', $filtro)))
        $this->ValidateField_espaciado($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ancho_descripcion' == $filtro)) || (is_array($filtro) && in_array('ancho_descripcion', $filtro)))
        $this->ValidateField_ancho_descripcion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'size_letra_codigo' == $filtro)) || (is_array($filtro) && in_array('size_letra_codigo', $filtro)))
        $this->ValidateField_size_letra_codigo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'size_letra_precio' == $filtro)) || (is_array($filtro) && in_array('size_letra_precio', $filtro)))
        $this->ValidateField_size_letra_precio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'size_letra_perso1' == $filtro)) || (is_array($filtro) && in_array('size_letra_perso1', $filtro)))
        $this->ValidateField_size_letra_perso1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'size_letra_perso2' == $filtro)) || (is_array($filtro) && in_array('size_letra_perso2', $filtro)))
        $this->ValidateField_size_letra_perso2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'size_letra_perso3' == $filtro)) || (is_array($filtro) && in_array('size_letra_perso3', $filtro)))
        $this->ValidateField_size_letra_perso3($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'posicion_codigo' == $filtro)) || (is_array($filtro) && in_array('posicion_codigo', $filtro)))
        $this->ValidateField_posicion_codigo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'posicion_descripcion' == $filtro)) || (is_array($filtro) && in_array('posicion_descripcion', $filtro)))
        $this->ValidateField_posicion_descripcion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'posicion_precio' == $filtro)) || (is_array($filtro) && in_array('posicion_precio', $filtro)))
        $this->ValidateField_posicion_precio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'posicion_perso1' == $filtro)) || (is_array($filtro) && in_array('posicion_perso1', $filtro)))
        $this->ValidateField_posicion_perso1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'posicion_perso2' == $filtro)) || (is_array($filtro) && in_array('posicion_perso2', $filtro)))
        $this->ValidateField_posicion_perso2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'posicion_perso3' == $filtro)) || (is_array($filtro) && in_array('posicion_perso3', $filtro)))
        $this->ValidateField_posicion_perso3($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'alineacion' == $filtro)) || (is_array($filtro) && in_array('alineacion', $filtro)))
        $this->ValidateField_alineacion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'copias' == $filtro)) || (is_array($filtro) && in_array('copias', $filtro)))
        $this->ValidateField_copias($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_idetiqueta(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idetiqueta === "" || is_null($this->idetiqueta))  
      { 
          $this->idetiqueta = 0;
      } 
      nm_limpa_numero($this->idetiqueta, $this->field_config['idetiqueta']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->idetiqueta != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->idetiqueta) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Idetiqueta: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['idetiqueta']))
                  {
                      $Campos_Erros['idetiqueta'] = array();
                  }
                  $Campos_Erros['idetiqueta'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['idetiqueta']) || !is_array($this->NM_ajax_info['errList']['idetiqueta']))
                  {
                      $this->NM_ajax_info['errList']['idetiqueta'] = array();
                  }
                  $this->NM_ajax_info['errList']['idetiqueta'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->idetiqueta, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Idetiqueta; " ; 
                  if (!isset($Campos_Erros['idetiqueta']))
                  {
                      $Campos_Erros['idetiqueta'] = array();
                  }
                  $Campos_Erros['idetiqueta'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['idetiqueta']) || !is_array($this->NM_ajax_info['errList']['idetiqueta']))
                  {
                      $this->NM_ajax_info['errList']['idetiqueta'] = array();
                  }
                  $this->NM_ajax_info['errList']['idetiqueta'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idetiqueta';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idetiqueta

    function ValidateField_nombre_configuracion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->nombre_configuracion = sc_strtoupper($this->nombre_configuracion); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nombre_configuracion) > 200) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nombre Configuracion " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombre_configuracion']))
              {
                  $Campos_Erros['nombre_configuracion'] = array();
              }
              $Campos_Erros['nombre_configuracion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombre_configuracion']) || !is_array($this->NM_ajax_info['errList']['nombre_configuracion']))
              {
                  $this->NM_ajax_info['errList']['nombre_configuracion'] = array();
              }
              $this->NM_ajax_info['errList']['nombre_configuracion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nombre_configuracion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nombre_configuracion

    function ValidateField_titulo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->titulo) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "Titulo Reporte " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['titulo']))
              {
                  $Campos_Erros['titulo'] = array();
              }
              $Campos_Erros['titulo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['titulo']) || !is_array($this->NM_ajax_info['errList']['titulo']))
              {
                  $this->NM_ajax_info['errList']['titulo'] = array();
              }
              $this->NM_ajax_info['errList']['titulo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'titulo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_titulo

    function ValidateField_idfamilia(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idfamilia == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['idfamilia']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['idfamilia'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Familia" ; 
          if (!isset($Campos_Erros['idfamilia']))
          {
              $Campos_Erros['idfamilia'] = array();
          }
          $Campos_Erros['idfamilia'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['idfamilia']) || !is_array($this->NM_ajax_info['errList']['idfamilia']))
          {
              $this->NM_ajax_info['errList']['idfamilia'] = array();
          }
          $this->NM_ajax_info['errList']['idfamilia'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->idfamilia) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia']) && !in_array($this->idfamilia, $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['idfamilia']))
              {
                  $Campos_Erros['idfamilia'] = array();
              }
              $Campos_Erros['idfamilia'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['idfamilia']) || !is_array($this->NM_ajax_info['errList']['idfamilia']))
              {
                  $this->NM_ajax_info['errList']['idfamilia'] = array();
              }
              $this->NM_ajax_info['errList']['idfamilia'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idfamilia';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idfamilia

    function ValidateField_codigo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->codigo) > 40) 
          { 
              $hasError = true;
              $Campos_Crit .= "Codigo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['codigo']))
              {
                  $Campos_Erros['codigo'] = array();
              }
              $Campos_Erros['codigo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['codigo']) || !is_array($this->NM_ajax_info['errList']['codigo']))
              {
                  $this->NM_ajax_info['errList']['codigo'] = array();
              }
              $this->NM_ajax_info['errList']['codigo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'codigo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_codigo

    function ValidateField_nompro(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->nompro) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nompro';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nompro

    function ValidateField_descripcion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->descripcion) > 200) 
          { 
              $hasError = true;
              $Campos_Crit .= "Descripcion " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['descripcion']))
              {
                  $Campos_Erros['descripcion'] = array();
              }
              $Campos_Erros['descripcion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['descripcion']) || !is_array($this->NM_ajax_info['errList']['descripcion']))
              {
                  $this->NM_ajax_info['errList']['descripcion'] = array();
              }
              $this->NM_ajax_info['errList']['descripcion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'descripcion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_descripcion

    function ValidateField_size_letra_descripcion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      nm_limpa_numero($this->size_letra_descripcion, $this->field_config['size_letra_descripcion']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->size_letra_descripcion != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->size_letra_descripcion) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tamaño letra descripción: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['size_letra_descripcion']))
                  {
                      $Campos_Erros['size_letra_descripcion'] = array();
                  }
                  $Campos_Erros['size_letra_descripcion'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['size_letra_descripcion']) || !is_array($this->NM_ajax_info['errList']['size_letra_descripcion']))
                  {
                      $this->NM_ajax_info['errList']['size_letra_descripcion'] = array();
                  }
                  $this->NM_ajax_info['errList']['size_letra_descripcion'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->size_letra_descripcion, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tamaño letra descripción; " ; 
                  if (!isset($Campos_Erros['size_letra_descripcion']))
                  {
                      $Campos_Erros['size_letra_descripcion'] = array();
                  }
                  $Campos_Erros['size_letra_descripcion'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['size_letra_descripcion']) || !is_array($this->NM_ajax_info['errList']['size_letra_descripcion']))
                  {
                      $this->NM_ajax_info['errList']['size_letra_descripcion'] = array();
                  }
                  $this->NM_ajax_info['errList']['size_letra_descripcion'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_descripcion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_descripcion'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Tamaño letra descripción" ; 
              if (!isset($Campos_Erros['size_letra_descripcion']))
              {
                  $Campos_Erros['size_letra_descripcion'] = array();
              }
              $Campos_Erros['size_letra_descripcion'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['size_letra_descripcion']) || !is_array($this->NM_ajax_info['errList']['size_letra_descripcion']))
                  {
                      $this->NM_ajax_info['errList']['size_letra_descripcion'] = array();
                  }
                  $this->NM_ajax_info['errList']['size_letra_descripcion'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'size_letra_descripcion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_size_letra_descripcion

    function ValidateField_tipo_letra(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tipo_letra == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['tipo_letra']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['tipo_letra'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Tipo Letra" ;
          if (!isset($Campos_Erros['tipo_letra']))
          {
              $Campos_Erros['tipo_letra'] = array();
          }
          $Campos_Erros['tipo_letra'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['tipo_letra']) || !is_array($this->NM_ajax_info['errList']['tipo_letra']))
                  {
                      $this->NM_ajax_info['errList']['tipo_letra'] = array();
                  }
                  $this->NM_ajax_info['errList']['tipo_letra'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipo_letra';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipo_letra

    function ValidateField_columnas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      nm_limpa_numero($this->columnas, $this->field_config['columnas']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->columnas != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->columnas) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Columnas: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['columnas']))
                  {
                      $Campos_Erros['columnas'] = array();
                  }
                  $Campos_Erros['columnas'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['columnas']) || !is_array($this->NM_ajax_info['errList']['columnas']))
                  {
                      $this->NM_ajax_info['errList']['columnas'] = array();
                  }
                  $this->NM_ajax_info['errList']['columnas'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->columnas, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Columnas; " ; 
                  if (!isset($Campos_Erros['columnas']))
                  {
                      $Campos_Erros['columnas'] = array();
                  }
                  $Campos_Erros['columnas'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['columnas']) || !is_array($this->NM_ajax_info['errList']['columnas']))
                  {
                      $this->NM_ajax_info['errList']['columnas'] = array();
                  }
                  $this->NM_ajax_info['errList']['columnas'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['columnas']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['columnas'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Columnas" ; 
              if (!isset($Campos_Erros['columnas']))
              {
                  $Campos_Erros['columnas'] = array();
              }
              $Campos_Erros['columnas'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['columnas']) || !is_array($this->NM_ajax_info['errList']['columnas']))
                  {
                      $this->NM_ajax_info['errList']['columnas'] = array();
                  }
                  $this->NM_ajax_info['errList']['columnas'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'columnas';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_columnas

    function ValidateField_tipo_codigo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tipo_codigo == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['tipo_codigo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['tipo_codigo'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Tipo Codigo" ;
          if (!isset($Campos_Erros['tipo_codigo']))
          {
              $Campos_Erros['tipo_codigo'] = array();
          }
          $Campos_Erros['tipo_codigo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['tipo_codigo']) || !is_array($this->NM_ajax_info['errList']['tipo_codigo']))
                  {
                      $this->NM_ajax_info['errList']['tipo_codigo'] = array();
                  }
                  $this->NM_ajax_info['errList']['tipo_codigo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipo_codigo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipo_codigo

    function ValidateField_tipo_imagen(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tipo_imagen == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['tipo_imagen']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['tipo_imagen'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Tipo Imagen" ;
          if (!isset($Campos_Erros['tipo_imagen']))
          {
              $Campos_Erros['tipo_imagen'] = array();
          }
          $Campos_Erros['tipo_imagen'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['tipo_imagen']) || !is_array($this->NM_ajax_info['errList']['tipo_imagen']))
                  {
                      $this->NM_ajax_info['errList']['tipo_imagen'] = array();
                  }
                  $this->NM_ajax_info['errList']['tipo_imagen'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipo_imagen';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipo_imagen

    function ValidateField_altura(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      nm_limpa_numero($this->altura, $this->field_config['altura']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->altura != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->altura) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Altura: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['altura']))
                  {
                      $Campos_Erros['altura'] = array();
                  }
                  $Campos_Erros['altura'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['altura']) || !is_array($this->NM_ajax_info['errList']['altura']))
                  {
                      $this->NM_ajax_info['errList']['altura'] = array();
                  }
                  $this->NM_ajax_info['errList']['altura'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->altura, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Altura; " ; 
                  if (!isset($Campos_Erros['altura']))
                  {
                      $Campos_Erros['altura'] = array();
                  }
                  $Campos_Erros['altura'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['altura']) || !is_array($this->NM_ajax_info['errList']['altura']))
                  {
                      $this->NM_ajax_info['errList']['altura'] = array();
                  }
                  $this->NM_ajax_info['errList']['altura'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['altura']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['altura'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Altura" ; 
              if (!isset($Campos_Erros['altura']))
              {
                  $Campos_Erros['altura'] = array();
              }
              $Campos_Erros['altura'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['altura']) || !is_array($this->NM_ajax_info['errList']['altura']))
                  {
                      $this->NM_ajax_info['errList']['altura'] = array();
                  }
                  $this->NM_ajax_info['errList']['altura'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'altura';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_altura

    function ValidateField_anchura(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      nm_limpa_numero($this->anchura, $this->field_config['anchura']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->anchura != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->anchura) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Anchura: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['anchura']))
                  {
                      $Campos_Erros['anchura'] = array();
                  }
                  $Campos_Erros['anchura'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['anchura']) || !is_array($this->NM_ajax_info['errList']['anchura']))
                  {
                      $this->NM_ajax_info['errList']['anchura'] = array();
                  }
                  $this->NM_ajax_info['errList']['anchura'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->anchura, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Anchura; " ; 
                  if (!isset($Campos_Erros['anchura']))
                  {
                      $Campos_Erros['anchura'] = array();
                  }
                  $Campos_Erros['anchura'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['anchura']) || !is_array($this->NM_ajax_info['errList']['anchura']))
                  {
                      $this->NM_ajax_info['errList']['anchura'] = array();
                  }
                  $this->NM_ajax_info['errList']['anchura'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['anchura']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['anchura'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Anchura" ; 
              if (!isset($Campos_Erros['anchura']))
              {
                  $Campos_Erros['anchura'] = array();
              }
              $Campos_Erros['anchura'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['anchura']) || !is_array($this->NM_ajax_info['errList']['anchura']))
                  {
                      $this->NM_ajax_info['errList']['anchura'] = array();
                  }
                  $this->NM_ajax_info['errList']['anchura'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'anchura';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_anchura

    function ValidateField_precio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->precio == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['precio']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['precio'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Precio" ;
          if (!isset($Campos_Erros['precio']))
          {
              $Campos_Erros['precio'] = array();
          }
          $Campos_Erros['precio'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['precio']) || !is_array($this->NM_ajax_info['errList']['precio']))
                  {
                      $this->NM_ajax_info['errList']['precio'] = array();
                  }
                  $this->NM_ajax_info['errList']['precio'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'precio';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_precio

    function ValidateField_ver_codigo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ver_codigo == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->ver_codigo = "NO";
      } 
      else 
      { 
          if (is_array($this->ver_codigo))
          {
              $x = 0; 
              $this->ver_codigo_1 = array(); 
              foreach ($this->ver_codigo as $ind => $dados_ver_codigo_1 ) 
              {
                  if ($dados_ver_codigo_1 != "") 
                  {
                      $this->ver_codigo_1[] = $dados_ver_codigo_1;
                  } 
              } 
              $this->ver_codigo = ""; 
              foreach ($this->ver_codigo_1 as $dados_ver_codigo_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->ver_codigo .= ";";
                   } 
                   $this->ver_codigo .= $dados_ver_codigo_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ver_codigo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ver_codigo

    function ValidateField_ver_descripcion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ver_descripcion == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->ver_descripcion = "NO";
      } 
      else 
      { 
          if (is_array($this->ver_descripcion))
          {
              $x = 0; 
              $this->ver_descripcion_1 = array(); 
              foreach ($this->ver_descripcion as $ind => $dados_ver_descripcion_1 ) 
              {
                  if ($dados_ver_descripcion_1 != "") 
                  {
                      $this->ver_descripcion_1[] = $dados_ver_descripcion_1;
                  } 
              } 
              $this->ver_descripcion = ""; 
              foreach ($this->ver_descripcion_1 as $dados_ver_descripcion_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->ver_descripcion .= ";";
                   } 
                   $this->ver_descripcion .= $dados_ver_descripcion_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ver_descripcion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ver_descripcion

    function ValidateField_personalizado1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->personalizado1) > 200) 
          { 
              $hasError = true;
              $Campos_Crit .= "Personalizado 1 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['personalizado1']))
              {
                  $Campos_Erros['personalizado1'] = array();
              }
              $Campos_Erros['personalizado1'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['personalizado1']) || !is_array($this->NM_ajax_info['errList']['personalizado1']))
              {
                  $this->NM_ajax_info['errList']['personalizado1'] = array();
              }
              $this->NM_ajax_info['errList']['personalizado1'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'personalizado1';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_personalizado1

    function ValidateField_personalizado2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->personalizado2) > 200) 
          { 
              $hasError = true;
              $Campos_Crit .= "Personalizado 2 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['personalizado2']))
              {
                  $Campos_Erros['personalizado2'] = array();
              }
              $Campos_Erros['personalizado2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['personalizado2']) || !is_array($this->NM_ajax_info['errList']['personalizado2']))
              {
                  $this->NM_ajax_info['errList']['personalizado2'] = array();
              }
              $this->NM_ajax_info['errList']['personalizado2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'personalizado2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_personalizado2

    function ValidateField_personalizado3(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->personalizado3) > 200) 
          { 
              $hasError = true;
              $Campos_Crit .= "Personalizado 3 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['personalizado3']))
              {
                  $Campos_Erros['personalizado3'] = array();
              }
              $Campos_Erros['personalizado3'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['personalizado3']) || !is_array($this->NM_ajax_info['errList']['personalizado3']))
              {
                  $this->NM_ajax_info['errList']['personalizado3'] = array();
              }
              $this->NM_ajax_info['errList']['personalizado3'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'personalizado3';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_personalizado3

    function ValidateField_espaciado(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['espaciado']['symbol_dec']))
      {
          $this->sc_remove_currency($this->espaciado, $this->field_config['espaciado']['symbol_dec'], $this->field_config['espaciado']['symbol_grp'], $this->field_config['espaciado']['symbol_mon']); 
          nm_limpa_valor($this->espaciado, $this->field_config['espaciado']['symbol_dec'], $this->field_config['espaciado']['symbol_grp']) ; 
          if ('.' == substr($this->espaciado, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->espaciado, 1)))
              {
                  $this->espaciado = '';
              }
              else
              {
                  $this->espaciado = '0' . $this->espaciado;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->espaciado != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->espaciado) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Espaciado: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['espaciado']))
                  {
                      $Campos_Erros['espaciado'] = array();
                  }
                  $Campos_Erros['espaciado'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['espaciado']) || !is_array($this->NM_ajax_info['errList']['espaciado']))
                  {
                      $this->NM_ajax_info['errList']['espaciado'] = array();
                  }
                  $this->NM_ajax_info['errList']['espaciado'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->espaciado, 10, 2, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Espaciado; " ; 
                  if (!isset($Campos_Erros['espaciado']))
                  {
                      $Campos_Erros['espaciado'] = array();
                  }
                  $Campos_Erros['espaciado'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['espaciado']) || !is_array($this->NM_ajax_info['errList']['espaciado']))
                  {
                      $this->NM_ajax_info['errList']['espaciado'] = array();
                  }
                  $this->NM_ajax_info['errList']['espaciado'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['espaciado']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['espaciado'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Espaciado" ; 
              if (!isset($Campos_Erros['espaciado']))
              {
                  $Campos_Erros['espaciado'] = array();
              }
              $Campos_Erros['espaciado'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['espaciado']) || !is_array($this->NM_ajax_info['errList']['espaciado']))
                  {
                      $this->NM_ajax_info['errList']['espaciado'] = array();
                  }
                  $this->NM_ajax_info['errList']['espaciado'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'espaciado';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_espaciado

    function ValidateField_ancho_descripcion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      nm_limpa_numero($this->ancho_descripcion, $this->field_config['ancho_descripcion']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->ancho_descripcion != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->ancho_descripcion) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Ancho Descripcion: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['ancho_descripcion']))
                  {
                      $Campos_Erros['ancho_descripcion'] = array();
                  }
                  $Campos_Erros['ancho_descripcion'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['ancho_descripcion']) || !is_array($this->NM_ajax_info['errList']['ancho_descripcion']))
                  {
                      $this->NM_ajax_info['errList']['ancho_descripcion'] = array();
                  }
                  $this->NM_ajax_info['errList']['ancho_descripcion'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->ancho_descripcion, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Ancho Descripcion; " ; 
                  if (!isset($Campos_Erros['ancho_descripcion']))
                  {
                      $Campos_Erros['ancho_descripcion'] = array();
                  }
                  $Campos_Erros['ancho_descripcion'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['ancho_descripcion']) || !is_array($this->NM_ajax_info['errList']['ancho_descripcion']))
                  {
                      $this->NM_ajax_info['errList']['ancho_descripcion'] = array();
                  }
                  $this->NM_ajax_info['errList']['ancho_descripcion'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['ancho_descripcion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['ancho_descripcion'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Ancho Descripcion" ; 
              if (!isset($Campos_Erros['ancho_descripcion']))
              {
                  $Campos_Erros['ancho_descripcion'] = array();
              }
              $Campos_Erros['ancho_descripcion'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['ancho_descripcion']) || !is_array($this->NM_ajax_info['errList']['ancho_descripcion']))
                  {
                      $this->NM_ajax_info['errList']['ancho_descripcion'] = array();
                  }
                  $this->NM_ajax_info['errList']['ancho_descripcion'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ancho_descripcion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ancho_descripcion

    function ValidateField_size_letra_codigo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      nm_limpa_numero($this->size_letra_codigo, $this->field_config['size_letra_codigo']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->size_letra_codigo != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->size_letra_codigo) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Size Letra Codigo: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['size_letra_codigo']))
                  {
                      $Campos_Erros['size_letra_codigo'] = array();
                  }
                  $Campos_Erros['size_letra_codigo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['size_letra_codigo']) || !is_array($this->NM_ajax_info['errList']['size_letra_codigo']))
                  {
                      $this->NM_ajax_info['errList']['size_letra_codigo'] = array();
                  }
                  $this->NM_ajax_info['errList']['size_letra_codigo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->size_letra_codigo, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Size Letra Codigo; " ; 
                  if (!isset($Campos_Erros['size_letra_codigo']))
                  {
                      $Campos_Erros['size_letra_codigo'] = array();
                  }
                  $Campos_Erros['size_letra_codigo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['size_letra_codigo']) || !is_array($this->NM_ajax_info['errList']['size_letra_codigo']))
                  {
                      $this->NM_ajax_info['errList']['size_letra_codigo'] = array();
                  }
                  $this->NM_ajax_info['errList']['size_letra_codigo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_codigo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_codigo'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Size Letra Codigo" ; 
              if (!isset($Campos_Erros['size_letra_codigo']))
              {
                  $Campos_Erros['size_letra_codigo'] = array();
              }
              $Campos_Erros['size_letra_codigo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['size_letra_codigo']) || !is_array($this->NM_ajax_info['errList']['size_letra_codigo']))
                  {
                      $this->NM_ajax_info['errList']['size_letra_codigo'] = array();
                  }
                  $this->NM_ajax_info['errList']['size_letra_codigo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'size_letra_codigo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_size_letra_codigo

    function ValidateField_size_letra_precio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      nm_limpa_numero($this->size_letra_precio, $this->field_config['size_letra_precio']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->size_letra_precio != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->size_letra_precio) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Size Letra Precio: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['size_letra_precio']))
                  {
                      $Campos_Erros['size_letra_precio'] = array();
                  }
                  $Campos_Erros['size_letra_precio'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['size_letra_precio']) || !is_array($this->NM_ajax_info['errList']['size_letra_precio']))
                  {
                      $this->NM_ajax_info['errList']['size_letra_precio'] = array();
                  }
                  $this->NM_ajax_info['errList']['size_letra_precio'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->size_letra_precio, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Size Letra Precio; " ; 
                  if (!isset($Campos_Erros['size_letra_precio']))
                  {
                      $Campos_Erros['size_letra_precio'] = array();
                  }
                  $Campos_Erros['size_letra_precio'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['size_letra_precio']) || !is_array($this->NM_ajax_info['errList']['size_letra_precio']))
                  {
                      $this->NM_ajax_info['errList']['size_letra_precio'] = array();
                  }
                  $this->NM_ajax_info['errList']['size_letra_precio'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_precio']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_precio'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Size Letra Precio" ; 
              if (!isset($Campos_Erros['size_letra_precio']))
              {
                  $Campos_Erros['size_letra_precio'] = array();
              }
              $Campos_Erros['size_letra_precio'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['size_letra_precio']) || !is_array($this->NM_ajax_info['errList']['size_letra_precio']))
                  {
                      $this->NM_ajax_info['errList']['size_letra_precio'] = array();
                  }
                  $this->NM_ajax_info['errList']['size_letra_precio'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'size_letra_precio';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_size_letra_precio

    function ValidateField_size_letra_perso1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      nm_limpa_numero($this->size_letra_perso1, $this->field_config['size_letra_perso1']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->size_letra_perso1 != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->size_letra_perso1) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Size Letra Perso 1: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['size_letra_perso1']))
                  {
                      $Campos_Erros['size_letra_perso1'] = array();
                  }
                  $Campos_Erros['size_letra_perso1'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['size_letra_perso1']) || !is_array($this->NM_ajax_info['errList']['size_letra_perso1']))
                  {
                      $this->NM_ajax_info['errList']['size_letra_perso1'] = array();
                  }
                  $this->NM_ajax_info['errList']['size_letra_perso1'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->size_letra_perso1, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Size Letra Perso 1; " ; 
                  if (!isset($Campos_Erros['size_letra_perso1']))
                  {
                      $Campos_Erros['size_letra_perso1'] = array();
                  }
                  $Campos_Erros['size_letra_perso1'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['size_letra_perso1']) || !is_array($this->NM_ajax_info['errList']['size_letra_perso1']))
                  {
                      $this->NM_ajax_info['errList']['size_letra_perso1'] = array();
                  }
                  $this->NM_ajax_info['errList']['size_letra_perso1'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_perso1']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_perso1'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Size Letra Perso 1" ; 
              if (!isset($Campos_Erros['size_letra_perso1']))
              {
                  $Campos_Erros['size_letra_perso1'] = array();
              }
              $Campos_Erros['size_letra_perso1'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['size_letra_perso1']) || !is_array($this->NM_ajax_info['errList']['size_letra_perso1']))
                  {
                      $this->NM_ajax_info['errList']['size_letra_perso1'] = array();
                  }
                  $this->NM_ajax_info['errList']['size_letra_perso1'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'size_letra_perso1';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_size_letra_perso1

    function ValidateField_size_letra_perso2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      nm_limpa_numero($this->size_letra_perso2, $this->field_config['size_letra_perso2']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->size_letra_perso2 != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->size_letra_perso2) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Size Letra Perso 2: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['size_letra_perso2']))
                  {
                      $Campos_Erros['size_letra_perso2'] = array();
                  }
                  $Campos_Erros['size_letra_perso2'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['size_letra_perso2']) || !is_array($this->NM_ajax_info['errList']['size_letra_perso2']))
                  {
                      $this->NM_ajax_info['errList']['size_letra_perso2'] = array();
                  }
                  $this->NM_ajax_info['errList']['size_letra_perso2'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->size_letra_perso2, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Size Letra Perso 2; " ; 
                  if (!isset($Campos_Erros['size_letra_perso2']))
                  {
                      $Campos_Erros['size_letra_perso2'] = array();
                  }
                  $Campos_Erros['size_letra_perso2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['size_letra_perso2']) || !is_array($this->NM_ajax_info['errList']['size_letra_perso2']))
                  {
                      $this->NM_ajax_info['errList']['size_letra_perso2'] = array();
                  }
                  $this->NM_ajax_info['errList']['size_letra_perso2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_perso2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_perso2'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Size Letra Perso 2" ; 
              if (!isset($Campos_Erros['size_letra_perso2']))
              {
                  $Campos_Erros['size_letra_perso2'] = array();
              }
              $Campos_Erros['size_letra_perso2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['size_letra_perso2']) || !is_array($this->NM_ajax_info['errList']['size_letra_perso2']))
                  {
                      $this->NM_ajax_info['errList']['size_letra_perso2'] = array();
                  }
                  $this->NM_ajax_info['errList']['size_letra_perso2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'size_letra_perso2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_size_letra_perso2

    function ValidateField_size_letra_perso3(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      nm_limpa_numero($this->size_letra_perso3, $this->field_config['size_letra_perso3']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->size_letra_perso3 != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->size_letra_perso3) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Size Letra Perso 3: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['size_letra_perso3']))
                  {
                      $Campos_Erros['size_letra_perso3'] = array();
                  }
                  $Campos_Erros['size_letra_perso3'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['size_letra_perso3']) || !is_array($this->NM_ajax_info['errList']['size_letra_perso3']))
                  {
                      $this->NM_ajax_info['errList']['size_letra_perso3'] = array();
                  }
                  $this->NM_ajax_info['errList']['size_letra_perso3'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->size_letra_perso3, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Size Letra Perso 3; " ; 
                  if (!isset($Campos_Erros['size_letra_perso3']))
                  {
                      $Campos_Erros['size_letra_perso3'] = array();
                  }
                  $Campos_Erros['size_letra_perso3'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['size_letra_perso3']) || !is_array($this->NM_ajax_info['errList']['size_letra_perso3']))
                  {
                      $this->NM_ajax_info['errList']['size_letra_perso3'] = array();
                  }
                  $this->NM_ajax_info['errList']['size_letra_perso3'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_perso3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['size_letra_perso3'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Size Letra Perso 3" ; 
              if (!isset($Campos_Erros['size_letra_perso3']))
              {
                  $Campos_Erros['size_letra_perso3'] = array();
              }
              $Campos_Erros['size_letra_perso3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['size_letra_perso3']) || !is_array($this->NM_ajax_info['errList']['size_letra_perso3']))
                  {
                      $this->NM_ajax_info['errList']['size_letra_perso3'] = array();
                  }
                  $this->NM_ajax_info['errList']['size_letra_perso3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'size_letra_perso3';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_size_letra_perso3

    function ValidateField_posicion_codigo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      nm_limpa_numero($this->posicion_codigo, $this->field_config['posicion_codigo']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->posicion_codigo != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->posicion_codigo) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Posicion Codigo: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['posicion_codigo']))
                  {
                      $Campos_Erros['posicion_codigo'] = array();
                  }
                  $Campos_Erros['posicion_codigo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['posicion_codigo']) || !is_array($this->NM_ajax_info['errList']['posicion_codigo']))
                  {
                      $this->NM_ajax_info['errList']['posicion_codigo'] = array();
                  }
                  $this->NM_ajax_info['errList']['posicion_codigo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->posicion_codigo, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Posicion Codigo; " ; 
                  if (!isset($Campos_Erros['posicion_codigo']))
                  {
                      $Campos_Erros['posicion_codigo'] = array();
                  }
                  $Campos_Erros['posicion_codigo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['posicion_codigo']) || !is_array($this->NM_ajax_info['errList']['posicion_codigo']))
                  {
                      $this->NM_ajax_info['errList']['posicion_codigo'] = array();
                  }
                  $this->NM_ajax_info['errList']['posicion_codigo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_codigo']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_codigo'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Posicion Codigo" ; 
              if (!isset($Campos_Erros['posicion_codigo']))
              {
                  $Campos_Erros['posicion_codigo'] = array();
              }
              $Campos_Erros['posicion_codigo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['posicion_codigo']) || !is_array($this->NM_ajax_info['errList']['posicion_codigo']))
                  {
                      $this->NM_ajax_info['errList']['posicion_codigo'] = array();
                  }
                  $this->NM_ajax_info['errList']['posicion_codigo'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'posicion_codigo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_posicion_codigo

    function ValidateField_posicion_descripcion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      nm_limpa_numero($this->posicion_descripcion, $this->field_config['posicion_descripcion']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->posicion_descripcion != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->posicion_descripcion) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Posicion Descripcion: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['posicion_descripcion']))
                  {
                      $Campos_Erros['posicion_descripcion'] = array();
                  }
                  $Campos_Erros['posicion_descripcion'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['posicion_descripcion']) || !is_array($this->NM_ajax_info['errList']['posicion_descripcion']))
                  {
                      $this->NM_ajax_info['errList']['posicion_descripcion'] = array();
                  }
                  $this->NM_ajax_info['errList']['posicion_descripcion'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->posicion_descripcion, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Posicion Descripcion; " ; 
                  if (!isset($Campos_Erros['posicion_descripcion']))
                  {
                      $Campos_Erros['posicion_descripcion'] = array();
                  }
                  $Campos_Erros['posicion_descripcion'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['posicion_descripcion']) || !is_array($this->NM_ajax_info['errList']['posicion_descripcion']))
                  {
                      $this->NM_ajax_info['errList']['posicion_descripcion'] = array();
                  }
                  $this->NM_ajax_info['errList']['posicion_descripcion'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_descripcion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_descripcion'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Posicion Descripcion" ; 
              if (!isset($Campos_Erros['posicion_descripcion']))
              {
                  $Campos_Erros['posicion_descripcion'] = array();
              }
              $Campos_Erros['posicion_descripcion'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['posicion_descripcion']) || !is_array($this->NM_ajax_info['errList']['posicion_descripcion']))
                  {
                      $this->NM_ajax_info['errList']['posicion_descripcion'] = array();
                  }
                  $this->NM_ajax_info['errList']['posicion_descripcion'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'posicion_descripcion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_posicion_descripcion

    function ValidateField_posicion_precio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      nm_limpa_numero($this->posicion_precio, $this->field_config['posicion_precio']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->posicion_precio != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->posicion_precio) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Posicion Precio: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['posicion_precio']))
                  {
                      $Campos_Erros['posicion_precio'] = array();
                  }
                  $Campos_Erros['posicion_precio'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['posicion_precio']) || !is_array($this->NM_ajax_info['errList']['posicion_precio']))
                  {
                      $this->NM_ajax_info['errList']['posicion_precio'] = array();
                  }
                  $this->NM_ajax_info['errList']['posicion_precio'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->posicion_precio, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Posicion Precio; " ; 
                  if (!isset($Campos_Erros['posicion_precio']))
                  {
                      $Campos_Erros['posicion_precio'] = array();
                  }
                  $Campos_Erros['posicion_precio'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['posicion_precio']) || !is_array($this->NM_ajax_info['errList']['posicion_precio']))
                  {
                      $this->NM_ajax_info['errList']['posicion_precio'] = array();
                  }
                  $this->NM_ajax_info['errList']['posicion_precio'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_precio']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_precio'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Posicion Precio" ; 
              if (!isset($Campos_Erros['posicion_precio']))
              {
                  $Campos_Erros['posicion_precio'] = array();
              }
              $Campos_Erros['posicion_precio'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['posicion_precio']) || !is_array($this->NM_ajax_info['errList']['posicion_precio']))
                  {
                      $this->NM_ajax_info['errList']['posicion_precio'] = array();
                  }
                  $this->NM_ajax_info['errList']['posicion_precio'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'posicion_precio';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_posicion_precio

    function ValidateField_posicion_perso1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      nm_limpa_numero($this->posicion_perso1, $this->field_config['posicion_perso1']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->posicion_perso1 != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->posicion_perso1) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Posicion Perso 1: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['posicion_perso1']))
                  {
                      $Campos_Erros['posicion_perso1'] = array();
                  }
                  $Campos_Erros['posicion_perso1'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['posicion_perso1']) || !is_array($this->NM_ajax_info['errList']['posicion_perso1']))
                  {
                      $this->NM_ajax_info['errList']['posicion_perso1'] = array();
                  }
                  $this->NM_ajax_info['errList']['posicion_perso1'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->posicion_perso1, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Posicion Perso 1; " ; 
                  if (!isset($Campos_Erros['posicion_perso1']))
                  {
                      $Campos_Erros['posicion_perso1'] = array();
                  }
                  $Campos_Erros['posicion_perso1'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['posicion_perso1']) || !is_array($this->NM_ajax_info['errList']['posicion_perso1']))
                  {
                      $this->NM_ajax_info['errList']['posicion_perso1'] = array();
                  }
                  $this->NM_ajax_info['errList']['posicion_perso1'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_perso1']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_perso1'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Posicion Perso 1" ; 
              if (!isset($Campos_Erros['posicion_perso1']))
              {
                  $Campos_Erros['posicion_perso1'] = array();
              }
              $Campos_Erros['posicion_perso1'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['posicion_perso1']) || !is_array($this->NM_ajax_info['errList']['posicion_perso1']))
                  {
                      $this->NM_ajax_info['errList']['posicion_perso1'] = array();
                  }
                  $this->NM_ajax_info['errList']['posicion_perso1'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'posicion_perso1';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_posicion_perso1

    function ValidateField_posicion_perso2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      nm_limpa_numero($this->posicion_perso2, $this->field_config['posicion_perso2']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->posicion_perso2 != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->posicion_perso2) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Posicion Perso 2: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['posicion_perso2']))
                  {
                      $Campos_Erros['posicion_perso2'] = array();
                  }
                  $Campos_Erros['posicion_perso2'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['posicion_perso2']) || !is_array($this->NM_ajax_info['errList']['posicion_perso2']))
                  {
                      $this->NM_ajax_info['errList']['posicion_perso2'] = array();
                  }
                  $this->NM_ajax_info['errList']['posicion_perso2'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->posicion_perso2, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Posicion Perso 2; " ; 
                  if (!isset($Campos_Erros['posicion_perso2']))
                  {
                      $Campos_Erros['posicion_perso2'] = array();
                  }
                  $Campos_Erros['posicion_perso2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['posicion_perso2']) || !is_array($this->NM_ajax_info['errList']['posicion_perso2']))
                  {
                      $this->NM_ajax_info['errList']['posicion_perso2'] = array();
                  }
                  $this->NM_ajax_info['errList']['posicion_perso2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_perso2']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_perso2'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Posicion Perso 2" ; 
              if (!isset($Campos_Erros['posicion_perso2']))
              {
                  $Campos_Erros['posicion_perso2'] = array();
              }
              $Campos_Erros['posicion_perso2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['posicion_perso2']) || !is_array($this->NM_ajax_info['errList']['posicion_perso2']))
                  {
                      $this->NM_ajax_info['errList']['posicion_perso2'] = array();
                  }
                  $this->NM_ajax_info['errList']['posicion_perso2'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'posicion_perso2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_posicion_perso2

    function ValidateField_posicion_perso3(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao == "alterar")
      {
      }
      nm_limpa_numero($this->posicion_perso3, $this->field_config['posicion_perso3']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->posicion_perso3 != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->posicion_perso3) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Posicion Perso 3: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['posicion_perso3']))
                  {
                      $Campos_Erros['posicion_perso3'] = array();
                  }
                  $Campos_Erros['posicion_perso3'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['posicion_perso3']) || !is_array($this->NM_ajax_info['errList']['posicion_perso3']))
                  {
                      $this->NM_ajax_info['errList']['posicion_perso3'] = array();
                  }
                  $this->NM_ajax_info['errList']['posicion_perso3'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->posicion_perso3, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Posicion Perso 3; " ; 
                  if (!isset($Campos_Erros['posicion_perso3']))
                  {
                      $Campos_Erros['posicion_perso3'] = array();
                  }
                  $Campos_Erros['posicion_perso3'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['posicion_perso3']) || !is_array($this->NM_ajax_info['errList']['posicion_perso3']))
                  {
                      $this->NM_ajax_info['errList']['posicion_perso3'] = array();
                  }
                  $this->NM_ajax_info['errList']['posicion_perso3'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_perso3']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['posicion_perso3'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Posicion Perso 3" ; 
              if (!isset($Campos_Erros['posicion_perso3']))
              {
                  $Campos_Erros['posicion_perso3'] = array();
              }
              $Campos_Erros['posicion_perso3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['posicion_perso3']) || !is_array($this->NM_ajax_info['errList']['posicion_perso3']))
                  {
                      $this->NM_ajax_info['errList']['posicion_perso3'] = array();
                  }
                  $this->NM_ajax_info['errList']['posicion_perso3'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'posicion_perso3';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_posicion_perso3

    function ValidateField_alineacion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->alineacion == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['alineacion']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['php_cmp_required']['alineacion'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "Alineacion" ;
          if (!isset($Campos_Erros['alineacion']))
          {
              $Campos_Erros['alineacion'] = array();
          }
          $Campos_Erros['alineacion'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['alineacion']) || !is_array($this->NM_ajax_info['errList']['alineacion']))
                  {
                      $this->NM_ajax_info['errList']['alineacion'] = array();
                  }
                  $this->NM_ajax_info['errList']['alineacion'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'alineacion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_alineacion

    function ValidateField_copias(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->copias === "" || is_null($this->copias))  
      { 
          $this->copias = 0;
          $this->sc_force_zero[] = 'copias';
      } 
      nm_limpa_numero($this->copias, $this->field_config['copias']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->copias != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->copias) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "No Copias: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['copias']))
                  {
                      $Campos_Erros['copias'] = array();
                  }
                  $Campos_Erros['copias'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['copias']) || !is_array($this->NM_ajax_info['errList']['copias']))
                  {
                      $this->NM_ajax_info['errList']['copias'] = array();
                  }
                  $this->NM_ajax_info['errList']['copias'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->copias, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "No Copias; " ; 
                  if (!isset($Campos_Erros['copias']))
                  {
                      $Campos_Erros['copias'] = array();
                  }
                  $Campos_Erros['copias'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['copias']) || !is_array($this->NM_ajax_info['errList']['copias']))
                  {
                      $this->NM_ajax_info['errList']['copias'] = array();
                  }
                  $this->NM_ajax_info['errList']['copias'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'copias';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_copias

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
    $this->nmgp_dados_form['idetiqueta'] = $this->idetiqueta;
    $this->nmgp_dados_form['nombre_configuracion'] = $this->nombre_configuracion;
    $this->nmgp_dados_form['titulo'] = $this->titulo;
    $this->nmgp_dados_form['idfamilia'] = $this->idfamilia;
    $this->nmgp_dados_form['codigo'] = $this->codigo;
    $this->nmgp_dados_form['nompro'] = $this->nompro;
    $this->nmgp_dados_form['descripcion'] = $this->descripcion;
    $this->nmgp_dados_form['size_letra_descripcion'] = $this->size_letra_descripcion;
    $this->nmgp_dados_form['tipo_letra'] = $this->tipo_letra;
    $this->nmgp_dados_form['columnas'] = $this->columnas;
    $this->nmgp_dados_form['tipo_codigo'] = $this->tipo_codigo;
    $this->nmgp_dados_form['tipo_imagen'] = $this->tipo_imagen;
    $this->nmgp_dados_form['altura'] = $this->altura;
    $this->nmgp_dados_form['anchura'] = $this->anchura;
    $this->nmgp_dados_form['precio'] = $this->precio;
    $this->nmgp_dados_form['ver_codigo'] = $this->ver_codigo;
    $this->nmgp_dados_form['ver_descripcion'] = $this->ver_descripcion;
    $this->nmgp_dados_form['personalizado1'] = $this->personalizado1;
    $this->nmgp_dados_form['personalizado2'] = $this->personalizado2;
    $this->nmgp_dados_form['personalizado3'] = $this->personalizado3;
    $this->nmgp_dados_form['espaciado'] = $this->espaciado;
    $this->nmgp_dados_form['ancho_descripcion'] = $this->ancho_descripcion;
    $this->nmgp_dados_form['size_letra_codigo'] = $this->size_letra_codigo;
    $this->nmgp_dados_form['size_letra_precio'] = $this->size_letra_precio;
    $this->nmgp_dados_form['size_letra_perso1'] = $this->size_letra_perso1;
    $this->nmgp_dados_form['size_letra_perso2'] = $this->size_letra_perso2;
    $this->nmgp_dados_form['size_letra_perso3'] = $this->size_letra_perso3;
    $this->nmgp_dados_form['posicion_codigo'] = $this->posicion_codigo;
    $this->nmgp_dados_form['posicion_descripcion'] = $this->posicion_descripcion;
    $this->nmgp_dados_form['posicion_precio'] = $this->posicion_precio;
    $this->nmgp_dados_form['posicion_perso1'] = $this->posicion_perso1;
    $this->nmgp_dados_form['posicion_perso2'] = $this->posicion_perso2;
    $this->nmgp_dados_form['posicion_perso3'] = $this->posicion_perso3;
    $this->nmgp_dados_form['alineacion'] = $this->alineacion;
    $this->nmgp_dados_form['copias'] = $this->copias;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['idetiqueta'] = $this->idetiqueta;
      nm_limpa_numero($this->idetiqueta, $this->field_config['idetiqueta']['symbol_grp']) ; 
      $this->Before_unformat['size_letra_descripcion'] = $this->size_letra_descripcion;
      nm_limpa_numero($this->size_letra_descripcion, $this->field_config['size_letra_descripcion']['symbol_grp']) ; 
      $this->Before_unformat['columnas'] = $this->columnas;
      nm_limpa_numero($this->columnas, $this->field_config['columnas']['symbol_grp']) ; 
      $this->Before_unformat['altura'] = $this->altura;
      nm_limpa_numero($this->altura, $this->field_config['altura']['symbol_grp']) ; 
      $this->Before_unformat['anchura'] = $this->anchura;
      nm_limpa_numero($this->anchura, $this->field_config['anchura']['symbol_grp']) ; 
      $this->Before_unformat['espaciado'] = $this->espaciado;
      if (!empty($this->field_config['espaciado']['symbol_dec']))
      {
         $this->sc_remove_currency($this->espaciado, $this->field_config['espaciado']['symbol_dec'], $this->field_config['espaciado']['symbol_grp'], $this->field_config['espaciado']['symbol_mon']);
         nm_limpa_valor($this->espaciado, $this->field_config['espaciado']['symbol_dec'], $this->field_config['espaciado']['symbol_grp']);
      }
      $this->Before_unformat['ancho_descripcion'] = $this->ancho_descripcion;
      nm_limpa_numero($this->ancho_descripcion, $this->field_config['ancho_descripcion']['symbol_grp']) ; 
      $this->Before_unformat['size_letra_codigo'] = $this->size_letra_codigo;
      nm_limpa_numero($this->size_letra_codigo, $this->field_config['size_letra_codigo']['symbol_grp']) ; 
      $this->Before_unformat['size_letra_precio'] = $this->size_letra_precio;
      nm_limpa_numero($this->size_letra_precio, $this->field_config['size_letra_precio']['symbol_grp']) ; 
      $this->Before_unformat['size_letra_perso1'] = $this->size_letra_perso1;
      nm_limpa_numero($this->size_letra_perso1, $this->field_config['size_letra_perso1']['symbol_grp']) ; 
      $this->Before_unformat['size_letra_perso2'] = $this->size_letra_perso2;
      nm_limpa_numero($this->size_letra_perso2, $this->field_config['size_letra_perso2']['symbol_grp']) ; 
      $this->Before_unformat['size_letra_perso3'] = $this->size_letra_perso3;
      nm_limpa_numero($this->size_letra_perso3, $this->field_config['size_letra_perso3']['symbol_grp']) ; 
      $this->Before_unformat['posicion_codigo'] = $this->posicion_codigo;
      nm_limpa_numero($this->posicion_codigo, $this->field_config['posicion_codigo']['symbol_grp']) ; 
      $this->Before_unformat['posicion_descripcion'] = $this->posicion_descripcion;
      nm_limpa_numero($this->posicion_descripcion, $this->field_config['posicion_descripcion']['symbol_grp']) ; 
      $this->Before_unformat['posicion_precio'] = $this->posicion_precio;
      nm_limpa_numero($this->posicion_precio, $this->field_config['posicion_precio']['symbol_grp']) ; 
      $this->Before_unformat['posicion_perso1'] = $this->posicion_perso1;
      nm_limpa_numero($this->posicion_perso1, $this->field_config['posicion_perso1']['symbol_grp']) ; 
      $this->Before_unformat['posicion_perso2'] = $this->posicion_perso2;
      nm_limpa_numero($this->posicion_perso2, $this->field_config['posicion_perso2']['symbol_grp']) ; 
      $this->Before_unformat['posicion_perso3'] = $this->posicion_perso3;
      nm_limpa_numero($this->posicion_perso3, $this->field_config['posicion_perso3']['symbol_grp']) ; 
      $this->Before_unformat['copias'] = $this->copias;
      nm_limpa_numero($this->copias, $this->field_config['copias']['symbol_grp']) ; 
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
      if ($Nome_Campo == "idetiqueta")
      {
          nm_limpa_numero($this->idetiqueta, $this->field_config['idetiqueta']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "size_letra_descripcion")
      {
          nm_limpa_numero($this->size_letra_descripcion, $this->field_config['size_letra_descripcion']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "columnas")
      {
          nm_limpa_numero($this->columnas, $this->field_config['columnas']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "altura")
      {
          nm_limpa_numero($this->altura, $this->field_config['altura']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "anchura")
      {
          nm_limpa_numero($this->anchura, $this->field_config['anchura']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "espaciado")
      {
          if (!empty($this->field_config['espaciado']['symbol_dec']))
          {
             $this->sc_remove_currency($this->espaciado, $this->field_config['espaciado']['symbol_dec'], $this->field_config['espaciado']['symbol_grp'], $this->field_config['espaciado']['symbol_mon']);
             nm_limpa_valor($this->espaciado, $this->field_config['espaciado']['symbol_dec'], $this->field_config['espaciado']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "ancho_descripcion")
      {
          nm_limpa_numero($this->ancho_descripcion, $this->field_config['ancho_descripcion']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "size_letra_codigo")
      {
          nm_limpa_numero($this->size_letra_codigo, $this->field_config['size_letra_codigo']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "size_letra_precio")
      {
          nm_limpa_numero($this->size_letra_precio, $this->field_config['size_letra_precio']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "size_letra_perso1")
      {
          nm_limpa_numero($this->size_letra_perso1, $this->field_config['size_letra_perso1']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "size_letra_perso2")
      {
          nm_limpa_numero($this->size_letra_perso2, $this->field_config['size_letra_perso2']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "size_letra_perso3")
      {
          nm_limpa_numero($this->size_letra_perso3, $this->field_config['size_letra_perso3']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "posicion_codigo")
      {
          nm_limpa_numero($this->posicion_codigo, $this->field_config['posicion_codigo']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "posicion_descripcion")
      {
          nm_limpa_numero($this->posicion_descripcion, $this->field_config['posicion_descripcion']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "posicion_precio")
      {
          nm_limpa_numero($this->posicion_precio, $this->field_config['posicion_precio']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "posicion_perso1")
      {
          nm_limpa_numero($this->posicion_perso1, $this->field_config['posicion_perso1']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "posicion_perso2")
      {
          nm_limpa_numero($this->posicion_perso2, $this->field_config['posicion_perso2']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "posicion_perso3")
      {
          nm_limpa_numero($this->posicion_perso3, $this->field_config['posicion_perso3']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "copias")
      {
          nm_limpa_numero($this->copias, $this->field_config['copias']['symbol_grp']) ; 
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
      if ('' !== $this->idetiqueta || (!empty($format_fields) && isset($format_fields['idetiqueta'])))
      {
          nmgp_Form_Num_Val($this->idetiqueta, $this->field_config['idetiqueta']['symbol_grp'], $this->field_config['idetiqueta']['symbol_dec'], "0", "S", $this->field_config['idetiqueta']['format_neg'], "", "", "-", $this->field_config['idetiqueta']['symbol_fmt']) ; 
      }
      if ('' !== $this->size_letra_descripcion || (!empty($format_fields) && isset($format_fields['size_letra_descripcion'])))
      {
          nmgp_Form_Num_Val($this->size_letra_descripcion, $this->field_config['size_letra_descripcion']['symbol_grp'], $this->field_config['size_letra_descripcion']['symbol_dec'], "0", "S", $this->field_config['size_letra_descripcion']['format_neg'], "", "", "-", $this->field_config['size_letra_descripcion']['symbol_fmt']) ; 
      }
      if ('' !== $this->columnas || (!empty($format_fields) && isset($format_fields['columnas'])))
      {
          nmgp_Form_Num_Val($this->columnas, $this->field_config['columnas']['symbol_grp'], $this->field_config['columnas']['symbol_dec'], "0", "S", $this->field_config['columnas']['format_neg'], "", "", "-", $this->field_config['columnas']['symbol_fmt']) ; 
      }
      if ('' !== $this->altura || (!empty($format_fields) && isset($format_fields['altura'])))
      {
          nmgp_Form_Num_Val($this->altura, $this->field_config['altura']['symbol_grp'], $this->field_config['altura']['symbol_dec'], "0", "S", $this->field_config['altura']['format_neg'], "", "", "-", $this->field_config['altura']['symbol_fmt']) ; 
      }
      if ('' !== $this->anchura || (!empty($format_fields) && isset($format_fields['anchura'])))
      {
          nmgp_Form_Num_Val($this->anchura, $this->field_config['anchura']['symbol_grp'], $this->field_config['anchura']['symbol_dec'], "0", "S", $this->field_config['anchura']['format_neg'], "", "", "-", $this->field_config['anchura']['symbol_fmt']) ; 
      }
      if ('' !== $this->espaciado || (!empty($format_fields) && isset($format_fields['espaciado'])))
      {
          nmgp_Form_Num_Val($this->espaciado, $this->field_config['espaciado']['symbol_grp'], $this->field_config['espaciado']['symbol_dec'], "2", "S", $this->field_config['espaciado']['format_neg'], "", "", "-", $this->field_config['espaciado']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['espaciado']['symbol_mon'];
          $this->sc_add_currency($this->espaciado, $sMonSymb, $this->field_config['espaciado']['format_pos']); 
      }
      if ('' !== $this->ancho_descripcion || (!empty($format_fields) && isset($format_fields['ancho_descripcion'])))
      {
          nmgp_Form_Num_Val($this->ancho_descripcion, $this->field_config['ancho_descripcion']['symbol_grp'], $this->field_config['ancho_descripcion']['symbol_dec'], "0", "S", $this->field_config['ancho_descripcion']['format_neg'], "", "", "-", $this->field_config['ancho_descripcion']['symbol_fmt']) ; 
      }
      if ('' !== $this->size_letra_codigo || (!empty($format_fields) && isset($format_fields['size_letra_codigo'])))
      {
          nmgp_Form_Num_Val($this->size_letra_codigo, $this->field_config['size_letra_codigo']['symbol_grp'], $this->field_config['size_letra_codigo']['symbol_dec'], "0", "S", $this->field_config['size_letra_codigo']['format_neg'], "", "", "-", $this->field_config['size_letra_codigo']['symbol_fmt']) ; 
      }
      if ('' !== $this->size_letra_precio || (!empty($format_fields) && isset($format_fields['size_letra_precio'])))
      {
          nmgp_Form_Num_Val($this->size_letra_precio, $this->field_config['size_letra_precio']['symbol_grp'], $this->field_config['size_letra_precio']['symbol_dec'], "0", "S", $this->field_config['size_letra_precio']['format_neg'], "", "", "-", $this->field_config['size_letra_precio']['symbol_fmt']) ; 
      }
      if ('' !== $this->size_letra_perso1 || (!empty($format_fields) && isset($format_fields['size_letra_perso1'])))
      {
          nmgp_Form_Num_Val($this->size_letra_perso1, $this->field_config['size_letra_perso1']['symbol_grp'], $this->field_config['size_letra_perso1']['symbol_dec'], "0", "S", $this->field_config['size_letra_perso1']['format_neg'], "", "", "-", $this->field_config['size_letra_perso1']['symbol_fmt']) ; 
      }
      if ('' !== $this->size_letra_perso2 || (!empty($format_fields) && isset($format_fields['size_letra_perso2'])))
      {
          nmgp_Form_Num_Val($this->size_letra_perso2, $this->field_config['size_letra_perso2']['symbol_grp'], $this->field_config['size_letra_perso2']['symbol_dec'], "0", "S", $this->field_config['size_letra_perso2']['format_neg'], "", "", "-", $this->field_config['size_letra_perso2']['symbol_fmt']) ; 
      }
      if ('' !== $this->size_letra_perso3 || (!empty($format_fields) && isset($format_fields['size_letra_perso3'])))
      {
          nmgp_Form_Num_Val($this->size_letra_perso3, $this->field_config['size_letra_perso3']['symbol_grp'], $this->field_config['size_letra_perso3']['symbol_dec'], "0", "S", $this->field_config['size_letra_perso3']['format_neg'], "", "", "-", $this->field_config['size_letra_perso3']['symbol_fmt']) ; 
      }
      if ('' !== $this->posicion_codigo || (!empty($format_fields) && isset($format_fields['posicion_codigo'])))
      {
          nmgp_Form_Num_Val($this->posicion_codigo, $this->field_config['posicion_codigo']['symbol_grp'], $this->field_config['posicion_codigo']['symbol_dec'], "0", "S", $this->field_config['posicion_codigo']['format_neg'], "", "", "-", $this->field_config['posicion_codigo']['symbol_fmt']) ; 
      }
      if ('' !== $this->posicion_descripcion || (!empty($format_fields) && isset($format_fields['posicion_descripcion'])))
      {
          nmgp_Form_Num_Val($this->posicion_descripcion, $this->field_config['posicion_descripcion']['symbol_grp'], $this->field_config['posicion_descripcion']['symbol_dec'], "0", "S", $this->field_config['posicion_descripcion']['format_neg'], "", "", "-", $this->field_config['posicion_descripcion']['symbol_fmt']) ; 
      }
      if ('' !== $this->posicion_precio || (!empty($format_fields) && isset($format_fields['posicion_precio'])))
      {
          nmgp_Form_Num_Val($this->posicion_precio, $this->field_config['posicion_precio']['symbol_grp'], $this->field_config['posicion_precio']['symbol_dec'], "0", "S", $this->field_config['posicion_precio']['format_neg'], "", "", "-", $this->field_config['posicion_precio']['symbol_fmt']) ; 
      }
      if ('' !== $this->posicion_perso1 || (!empty($format_fields) && isset($format_fields['posicion_perso1'])))
      {
          nmgp_Form_Num_Val($this->posicion_perso1, $this->field_config['posicion_perso1']['symbol_grp'], $this->field_config['posicion_perso1']['symbol_dec'], "0", "S", $this->field_config['posicion_perso1']['format_neg'], "", "", "-", $this->field_config['posicion_perso1']['symbol_fmt']) ; 
      }
      if ('' !== $this->posicion_perso2 || (!empty($format_fields) && isset($format_fields['posicion_perso2'])))
      {
          nmgp_Form_Num_Val($this->posicion_perso2, $this->field_config['posicion_perso2']['symbol_grp'], $this->field_config['posicion_perso2']['symbol_dec'], "0", "S", $this->field_config['posicion_perso2']['format_neg'], "", "", "-", $this->field_config['posicion_perso2']['symbol_fmt']) ; 
      }
      if ('' !== $this->posicion_perso3 || (!empty($format_fields) && isset($format_fields['posicion_perso3'])))
      {
          nmgp_Form_Num_Val($this->posicion_perso3, $this->field_config['posicion_perso3']['symbol_grp'], $this->field_config['posicion_perso3']['symbol_dec'], "0", "S", $this->field_config['posicion_perso3']['format_neg'], "", "", "-", $this->field_config['posicion_perso3']['symbol_fmt']) ; 
      }
      if ('' !== $this->copias || (!empty($format_fields) && isset($format_fields['copias'])))
      {
          nmgp_Form_Num_Val($this->copias, $this->field_config['copias']['symbol_grp'], $this->field_config['copias']['symbol_dec'], "0", "S", $this->field_config['copias']['format_neg'], "", "", "-", $this->field_config['copias']['symbol_fmt']) ; 
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
          $this->ajax_return_values_idetiqueta();
          $this->ajax_return_values_nombre_configuracion();
          $this->ajax_return_values_titulo();
          $this->ajax_return_values_idfamilia();
          $this->ajax_return_values_codigo();
          $this->ajax_return_values_nompro();
          $this->ajax_return_values_descripcion();
          $this->ajax_return_values_size_letra_descripcion();
          $this->ajax_return_values_tipo_letra();
          $this->ajax_return_values_columnas();
          $this->ajax_return_values_tipo_codigo();
          $this->ajax_return_values_tipo_imagen();
          $this->ajax_return_values_altura();
          $this->ajax_return_values_anchura();
          $this->ajax_return_values_precio();
          $this->ajax_return_values_ver_codigo();
          $this->ajax_return_values_ver_descripcion();
          $this->ajax_return_values_personalizado1();
          $this->ajax_return_values_personalizado2();
          $this->ajax_return_values_personalizado3();
          $this->ajax_return_values_espaciado();
          $this->ajax_return_values_ancho_descripcion();
          $this->ajax_return_values_size_letra_codigo();
          $this->ajax_return_values_size_letra_precio();
          $this->ajax_return_values_size_letra_perso1();
          $this->ajax_return_values_size_letra_perso2();
          $this->ajax_return_values_size_letra_perso3();
          $this->ajax_return_values_posicion_codigo();
          $this->ajax_return_values_posicion_descripcion();
          $this->ajax_return_values_posicion_precio();
          $this->ajax_return_values_posicion_perso1();
          $this->ajax_return_values_posicion_perso2();
          $this->ajax_return_values_posicion_perso3();
          $this->ajax_return_values_alineacion();
          $this->ajax_return_values_copias();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idetiqueta']['keyVal'] = form_etiquetas_pack_protect_string($this->nmgp_dados_form['idetiqueta']);
          }
   } // ajax_return_values

          //----- idetiqueta
   function ajax_return_values_idetiqueta($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idetiqueta", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idetiqueta);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idetiqueta'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("idetiqueta", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- nombre_configuracion
   function ajax_return_values_nombre_configuracion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombre_configuracion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nombre_configuracion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nombre_configuracion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- titulo
   function ajax_return_values_titulo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("titulo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->titulo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['titulo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- idfamilia
   function ajax_return_values_idfamilia($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idfamilia", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idfamilia);
              $aLookup = array();
              $this->_tmp_lookup_idfamilia = $this->idfamilia;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia'] = array(); 
}
$aLookup[] = array(form_etiquetas_pack_protect_string('0') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string('NINGUNA')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia'][] = '0';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_idetiqueta = $this->idetiqueta;
   $old_value_size_letra_descripcion = $this->size_letra_descripcion;
   $old_value_columnas = $this->columnas;
   $old_value_altura = $this->altura;
   $old_value_anchura = $this->anchura;
   $old_value_espaciado = $this->espaciado;
   $old_value_ancho_descripcion = $this->ancho_descripcion;
   $old_value_size_letra_codigo = $this->size_letra_codigo;
   $old_value_size_letra_precio = $this->size_letra_precio;
   $old_value_size_letra_perso1 = $this->size_letra_perso1;
   $old_value_size_letra_perso2 = $this->size_letra_perso2;
   $old_value_size_letra_perso3 = $this->size_letra_perso3;
   $old_value_posicion_codigo = $this->posicion_codigo;
   $old_value_posicion_descripcion = $this->posicion_descripcion;
   $old_value_posicion_precio = $this->posicion_precio;
   $old_value_posicion_perso1 = $this->posicion_perso1;
   $old_value_posicion_perso2 = $this->posicion_perso2;
   $old_value_posicion_perso3 = $this->posicion_perso3;
   $old_value_copias = $this->copias;
   $this->nm_tira_formatacao();


   $unformatted_value_idetiqueta = $this->idetiqueta;
   $unformatted_value_size_letra_descripcion = $this->size_letra_descripcion;
   $unformatted_value_columnas = $this->columnas;
   $unformatted_value_altura = $this->altura;
   $unformatted_value_anchura = $this->anchura;
   $unformatted_value_espaciado = $this->espaciado;
   $unformatted_value_ancho_descripcion = $this->ancho_descripcion;
   $unformatted_value_size_letra_codigo = $this->size_letra_codigo;
   $unformatted_value_size_letra_precio = $this->size_letra_precio;
   $unformatted_value_size_letra_perso1 = $this->size_letra_perso1;
   $unformatted_value_size_letra_perso2 = $this->size_letra_perso2;
   $unformatted_value_size_letra_perso3 = $this->size_letra_perso3;
   $unformatted_value_posicion_codigo = $this->posicion_codigo;
   $unformatted_value_posicion_descripcion = $this->posicion_descripcion;
   $unformatted_value_posicion_precio = $this->posicion_precio;
   $unformatted_value_posicion_perso1 = $this->posicion_perso1;
   $unformatted_value_posicion_perso2 = $this->posicion_perso2;
   $unformatted_value_posicion_perso3 = $this->posicion_perso3;
   $unformatted_value_copias = $this->copias;

   $ver_codigo_val_str = "''";
   if (!empty($this->ver_codigo))
   {
       if (is_array($this->ver_codigo))
       {
           $Tmp_array = $this->ver_codigo;
       }
       else
       {
           $Tmp_array = explode(";", $this->ver_codigo);
       }
       $ver_codigo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ver_codigo_val_str)
          {
             $ver_codigo_val_str .= ", ";
          }
          $ver_codigo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $ver_descripcion_val_str = "''";
   if (!empty($this->ver_descripcion))
   {
       if (is_array($this->ver_descripcion))
       {
           $Tmp_array = $this->ver_descripcion;
       }
       else
       {
           $Tmp_array = explode(";", $this->ver_descripcion);
       }
       $ver_descripcion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ver_descripcion_val_str)
          {
             $ver_descripcion_val_str .= ", ";
          }
          $ver_descripcion_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idgrupo, nomgrupo  FROM grupo  ORDER BY nomgrupo";

   $this->idetiqueta = $old_value_idetiqueta;
   $this->size_letra_descripcion = $old_value_size_letra_descripcion;
   $this->columnas = $old_value_columnas;
   $this->altura = $old_value_altura;
   $this->anchura = $old_value_anchura;
   $this->espaciado = $old_value_espaciado;
   $this->ancho_descripcion = $old_value_ancho_descripcion;
   $this->size_letra_codigo = $old_value_size_letra_codigo;
   $this->size_letra_precio = $old_value_size_letra_precio;
   $this->size_letra_perso1 = $old_value_size_letra_perso1;
   $this->size_letra_perso2 = $old_value_size_letra_perso2;
   $this->size_letra_perso3 = $old_value_size_letra_perso3;
   $this->posicion_codigo = $old_value_posicion_codigo;
   $this->posicion_descripcion = $old_value_posicion_descripcion;
   $this->posicion_precio = $old_value_posicion_precio;
   $this->posicion_perso1 = $old_value_posicion_perso1;
   $this->posicion_perso2 = $old_value_posicion_perso2;
   $this->posicion_perso3 = $old_value_posicion_perso3;
   $this->copias = $old_value_copias;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_etiquetas_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_etiquetas_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia'][] = $rs->fields[0];
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
          $sSelComp = "name=\"idfamilia\"";
          if (isset($this->NM_ajax_info['select_html']['idfamilia']) && !empty($this->NM_ajax_info['select_html']['idfamilia']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['idfamilia']);
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

                  if ($this->idfamilia == $sValue)
                  {
                      $this->_tmp_lookup_idfamilia = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['idfamilia'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idfamilia']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idfamilia']['valList'][$i] = form_etiquetas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idfamilia']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idfamilia']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idfamilia']['labList'] = $aLabel;
          }
   }

          //----- codigo
   function ajax_return_values_codigo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("codigo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->codigo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['codigo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nompro
   function ajax_return_values_nompro($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nompro", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nompro);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nompro'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- descripcion
   function ajax_return_values_descripcion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("descripcion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->descripcion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['descripcion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- size_letra_descripcion
   function ajax_return_values_size_letra_descripcion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("size_letra_descripcion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->size_letra_descripcion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['size_letra_descripcion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- tipo_letra
   function ajax_return_values_tipo_letra($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_letra", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo_letra);
              $aLookup = array();
              $this->_tmp_lookup_tipo_letra = $this->tipo_letra;

$aLookup[] = array(form_etiquetas_pack_protect_string('Arial') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("Arial")));
$aLookup[] = array(form_etiquetas_pack_protect_string('Helvetica') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("Helvetica")));
$aLookup[] = array(form_etiquetas_pack_protect_string('sans') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("sans-serif")));
$aLookup[] = array(form_etiquetas_pack_protect_string('Tahoma') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("Tahoma")));
$aLookup[] = array(form_etiquetas_pack_protect_string('Georgia') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("Georgia")));
$aLookup[] = array(form_etiquetas_pack_protect_string('Verdana') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("Verdana")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_letra'][] = 'Arial';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_letra'][] = 'Helvetica';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_letra'][] = 'sans';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_letra'][] = 'Tahoma';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_letra'][] = 'Georgia';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_letra'][] = 'Verdana';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tipo_letra\"";
          if (isset($this->NM_ajax_info['select_html']['tipo_letra']) && !empty($this->NM_ajax_info['select_html']['tipo_letra']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['tipo_letra']);
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

                  if ($this->tipo_letra == $sValue)
                  {
                      $this->_tmp_lookup_tipo_letra = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tipo_letra'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipo_letra']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipo_letra']['valList'][$i] = form_etiquetas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipo_letra']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipo_letra']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipo_letra']['labList'] = $aLabel;
          }
   }

          //----- columnas
   function ajax_return_values_columnas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("columnas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->columnas);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['columnas'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- tipo_codigo
   function ajax_return_values_tipo_codigo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_codigo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo_codigo);
              $aLookup = array();
              $this->_tmp_lookup_tipo_codigo = $this->tipo_codigo;

$aLookup[] = array(form_etiquetas_pack_protect_string('TYPE_EAN_13') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("TYPE_EAN_13")));
$aLookup[] = array(form_etiquetas_pack_protect_string('TYPE_EAN_8') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("TYPE_EAN_8")));
$aLookup[] = array(form_etiquetas_pack_protect_string('TYPE_EAN_5') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("TYPE_EAN_5")));
$aLookup[] = array(form_etiquetas_pack_protect_string('TYPE_CODE_39') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("TYPE_CODE_39")));
$aLookup[] = array(form_etiquetas_pack_protect_string('TYPE_CODE_128') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("TYPE_CODE_128")));
$aLookup[] = array(form_etiquetas_pack_protect_string('TYPE_CODE_11') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("TYPE_CODE_11")));
$aLookup[] = array(form_etiquetas_pack_protect_string('TYPE_PHARMA_CODE') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("TYPE_PHARMA_CODE")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_codigo'][] = 'TYPE_EAN_13';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_codigo'][] = 'TYPE_EAN_8';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_codigo'][] = 'TYPE_EAN_5';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_codigo'][] = 'TYPE_CODE_39';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_codigo'][] = 'TYPE_CODE_128';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_codigo'][] = 'TYPE_CODE_11';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_codigo'][] = 'TYPE_PHARMA_CODE';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tipo_codigo\"";
          if (isset($this->NM_ajax_info['select_html']['tipo_codigo']) && !empty($this->NM_ajax_info['select_html']['tipo_codigo']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['tipo_codigo']);
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

                  if ($this->tipo_codigo == $sValue)
                  {
                      $this->_tmp_lookup_tipo_codigo = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tipo_codigo'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipo_codigo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipo_codigo']['valList'][$i] = form_etiquetas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipo_codigo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipo_codigo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipo_codigo']['labList'] = $aLabel;
          }
   }

          //----- tipo_imagen
   function ajax_return_values_tipo_imagen($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_imagen", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo_imagen);
              $aLookup = array();
              $this->_tmp_lookup_tipo_imagen = $this->tipo_imagen;

$aLookup[] = array(form_etiquetas_pack_protect_string('BarcodeGeneratorPNG') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("PNG")));
$aLookup[] = array(form_etiquetas_pack_protect_string('BarcodeGeneratorSVG') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("SVG")));
$aLookup[] = array(form_etiquetas_pack_protect_string('BarcodeGeneratorJPG') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("JPG")));
$aLookup[] = array(form_etiquetas_pack_protect_string('BarcodeGeneratorHTML') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("HTML")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_imagen'][] = 'BarcodeGeneratorPNG';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_imagen'][] = 'BarcodeGeneratorSVG';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_imagen'][] = 'BarcodeGeneratorJPG';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_tipo_imagen'][] = 'BarcodeGeneratorHTML';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tipo_imagen\"";
          if (isset($this->NM_ajax_info['select_html']['tipo_imagen']) && !empty($this->NM_ajax_info['select_html']['tipo_imagen']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['tipo_imagen']);
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

                  if ($this->tipo_imagen == $sValue)
                  {
                      $this->_tmp_lookup_tipo_imagen = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tipo_imagen'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipo_imagen']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipo_imagen']['valList'][$i] = form_etiquetas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipo_imagen']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipo_imagen']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipo_imagen']['labList'] = $aLabel;
          }
   }

          //----- altura
   function ajax_return_values_altura($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("altura", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->altura);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['altura'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- anchura
   function ajax_return_values_anchura($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("anchura", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->anchura);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['anchura'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- precio
   function ajax_return_values_precio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("precio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->precio);
              $aLookup = array();
              $this->_tmp_lookup_precio = $this->precio;

$aLookup[] = array(form_etiquetas_pack_protect_string('preciomen') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("PRECIO1")));
$aLookup[] = array(form_etiquetas_pack_protect_string('preciomen2') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("PRECIO2")));
$aLookup[] = array(form_etiquetas_pack_protect_string('preciomen3') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("PRECIO3")));
$aLookup[] = array(form_etiquetas_pack_protect_string('preciofull') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("PRECIOM1")));
$aLookup[] = array(form_etiquetas_pack_protect_string('precio2') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("PRECIOM2")));
$aLookup[] = array(form_etiquetas_pack_protect_string('preciomay') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("PRECIOM3")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_precio'][] = 'preciomen';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_precio'][] = 'preciomen2';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_precio'][] = 'preciomen3';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_precio'][] = 'preciofull';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_precio'][] = 'precio2';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_precio'][] = 'preciomay';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"precio\"";
          if (isset($this->NM_ajax_info['select_html']['precio']) && !empty($this->NM_ajax_info['select_html']['precio']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['precio']);
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

                  if ($this->precio == $sValue)
                  {
                      $this->_tmp_lookup_precio = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['precio'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['precio']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['precio']['valList'][$i] = form_etiquetas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['precio']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['precio']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['precio']['labList'] = $aLabel;
          }
   }

          //----- ver_codigo
   function ajax_return_values_ver_codigo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ver_codigo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ver_codigo);
              $aLookup = array();
              $this->_tmp_lookup_ver_codigo = $this->ver_codigo;

$aLookup[] = array(form_etiquetas_pack_protect_string('SI') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_ver_codigo'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ver_codigo']) && !empty($this->NM_ajax_info['select_html']['ver_codigo']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ver_codigo']);
          }
          $this->NM_ajax_info['fldList']['ver_codigo'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-ver_codigo',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ver_codigo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ver_codigo']['valList'][$i] = form_etiquetas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ver_codigo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ver_codigo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ver_codigo']['labList'] = $aLabel;
          }
   }

          //----- ver_descripcion
   function ajax_return_values_ver_descripcion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ver_descripcion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ver_descripcion);
              $aLookup = array();
              $this->_tmp_lookup_ver_descripcion = $this->ver_descripcion;

$aLookup[] = array(form_etiquetas_pack_protect_string('SI') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_ver_descripcion'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ver_descripcion']) && !empty($this->NM_ajax_info['select_html']['ver_descripcion']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ver_descripcion']);
          }
          $this->NM_ajax_info['fldList']['ver_descripcion'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-ver_descripcion',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ver_descripcion']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ver_descripcion']['valList'][$i] = form_etiquetas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ver_descripcion']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ver_descripcion']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ver_descripcion']['labList'] = $aLabel;
          }
   }

          //----- personalizado1
   function ajax_return_values_personalizado1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("personalizado1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->personalizado1);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['personalizado1'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- personalizado2
   function ajax_return_values_personalizado2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("personalizado2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->personalizado2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['personalizado2'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- personalizado3
   function ajax_return_values_personalizado3($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("personalizado3", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->personalizado3);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['personalizado3'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- espaciado
   function ajax_return_values_espaciado($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("espaciado", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->espaciado);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['espaciado'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- ancho_descripcion
   function ajax_return_values_ancho_descripcion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ancho_descripcion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ancho_descripcion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ancho_descripcion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- size_letra_codigo
   function ajax_return_values_size_letra_codigo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("size_letra_codigo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->size_letra_codigo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['size_letra_codigo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- size_letra_precio
   function ajax_return_values_size_letra_precio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("size_letra_precio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->size_letra_precio);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['size_letra_precio'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- size_letra_perso1
   function ajax_return_values_size_letra_perso1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("size_letra_perso1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->size_letra_perso1);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['size_letra_perso1'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- size_letra_perso2
   function ajax_return_values_size_letra_perso2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("size_letra_perso2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->size_letra_perso2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['size_letra_perso2'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- size_letra_perso3
   function ajax_return_values_size_letra_perso3($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("size_letra_perso3", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->size_letra_perso3);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['size_letra_perso3'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- posicion_codigo
   function ajax_return_values_posicion_codigo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("posicion_codigo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->posicion_codigo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['posicion_codigo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- posicion_descripcion
   function ajax_return_values_posicion_descripcion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("posicion_descripcion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->posicion_descripcion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['posicion_descripcion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- posicion_precio
   function ajax_return_values_posicion_precio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("posicion_precio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->posicion_precio);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['posicion_precio'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- posicion_perso1
   function ajax_return_values_posicion_perso1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("posicion_perso1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->posicion_perso1);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['posicion_perso1'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- posicion_perso2
   function ajax_return_values_posicion_perso2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("posicion_perso2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->posicion_perso2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['posicion_perso2'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- posicion_perso3
   function ajax_return_values_posicion_perso3($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("posicion_perso3", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->posicion_perso3);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['posicion_perso3'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- alineacion
   function ajax_return_values_alineacion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("alineacion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->alineacion);
              $aLookup = array();
              $this->_tmp_lookup_alineacion = $this->alineacion;

$aLookup[] = array(form_etiquetas_pack_protect_string('center') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("CENTER")));
$aLookup[] = array(form_etiquetas_pack_protect_string('left') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("LEFT")));
$aLookup[] = array(form_etiquetas_pack_protect_string('right') => str_replace('<', '&lt;',form_etiquetas_pack_protect_string("RIGHT")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_alineacion'][] = 'center';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_alineacion'][] = 'left';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_alineacion'][] = 'right';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"alineacion\"";
          if (isset($this->NM_ajax_info['select_html']['alineacion']) && !empty($this->NM_ajax_info['select_html']['alineacion']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['alineacion']);
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

                  if ($this->alineacion == $sValue)
                  {
                      $this->_tmp_lookup_alineacion = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['alineacion'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['alineacion']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['alineacion']['valList'][$i] = form_etiquetas_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['alineacion']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['alineacion']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['alineacion']['labList'] = $aLabel;
          }
   }

          //----- copias
   function ajax_return_values_copias($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("copias", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->copias);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['copias'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['upload_dir'][$fieldName][] = $newName;
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
      $this->espaciado = str_replace($sc_parm1, $sc_parm2, $this->espaciado); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->espaciado = "'" . $this->espaciado . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->espaciado = str_replace("'", "", $this->espaciado); 
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
      $NM_val_form['idetiqueta'] = $this->idetiqueta;
      $NM_val_form['nombre_configuracion'] = $this->nombre_configuracion;
      $NM_val_form['titulo'] = $this->titulo;
      $NM_val_form['idfamilia'] = $this->idfamilia;
      $NM_val_form['codigo'] = $this->codigo;
      $NM_val_form['nompro'] = $this->nompro;
      $NM_val_form['descripcion'] = $this->descripcion;
      $NM_val_form['size_letra_descripcion'] = $this->size_letra_descripcion;
      $NM_val_form['tipo_letra'] = $this->tipo_letra;
      $NM_val_form['columnas'] = $this->columnas;
      $NM_val_form['tipo_codigo'] = $this->tipo_codigo;
      $NM_val_form['tipo_imagen'] = $this->tipo_imagen;
      $NM_val_form['altura'] = $this->altura;
      $NM_val_form['anchura'] = $this->anchura;
      $NM_val_form['precio'] = $this->precio;
      $NM_val_form['ver_codigo'] = $this->ver_codigo;
      $NM_val_form['ver_descripcion'] = $this->ver_descripcion;
      $NM_val_form['personalizado1'] = $this->personalizado1;
      $NM_val_form['personalizado2'] = $this->personalizado2;
      $NM_val_form['personalizado3'] = $this->personalizado3;
      $NM_val_form['espaciado'] = $this->espaciado;
      $NM_val_form['ancho_descripcion'] = $this->ancho_descripcion;
      $NM_val_form['size_letra_codigo'] = $this->size_letra_codigo;
      $NM_val_form['size_letra_precio'] = $this->size_letra_precio;
      $NM_val_form['size_letra_perso1'] = $this->size_letra_perso1;
      $NM_val_form['size_letra_perso2'] = $this->size_letra_perso2;
      $NM_val_form['size_letra_perso3'] = $this->size_letra_perso3;
      $NM_val_form['posicion_codigo'] = $this->posicion_codigo;
      $NM_val_form['posicion_descripcion'] = $this->posicion_descripcion;
      $NM_val_form['posicion_precio'] = $this->posicion_precio;
      $NM_val_form['posicion_perso1'] = $this->posicion_perso1;
      $NM_val_form['posicion_perso2'] = $this->posicion_perso2;
      $NM_val_form['posicion_perso3'] = $this->posicion_perso3;
      $NM_val_form['alineacion'] = $this->alineacion;
      $NM_val_form['copias'] = $this->copias;
      if ($this->idetiqueta === "" || is_null($this->idetiqueta))  
      { 
          $this->idetiqueta = 0;
      } 
      if ($this->idfamilia === "" || is_null($this->idfamilia))  
      { 
          $this->idfamilia = 0;
          $this->sc_force_zero[] = 'idfamilia';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->size_letra_descripcion === "" || is_null($this->size_letra_descripcion))  
      { 
          $this->size_letra_descripcion = 0;
          $this->sc_force_zero[] = 'size_letra_descripcion';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->columnas === "" || is_null($this->columnas))  
      { 
          $this->columnas = 0;
          $this->sc_force_zero[] = 'columnas';
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
      if ($this->altura === "" || is_null($this->altura))  
      { 
          $this->altura = 0;
          $this->sc_force_zero[] = 'altura';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->anchura === "" || is_null($this->anchura))  
      { 
          $this->anchura = 0;
          $this->sc_force_zero[] = 'anchura';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->espaciado === "" || is_null($this->espaciado))  
      { 
          $this->espaciado = 0;
          $this->sc_force_zero[] = 'espaciado';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->ancho_descripcion === "" || is_null($this->ancho_descripcion))  
      { 
          $this->ancho_descripcion = 0;
          $this->sc_force_zero[] = 'ancho_descripcion';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->size_letra_codigo === "" || is_null($this->size_letra_codigo))  
      { 
          $this->size_letra_codigo = 0;
          $this->sc_force_zero[] = 'size_letra_codigo';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->size_letra_precio === "" || is_null($this->size_letra_precio))  
      { 
          $this->size_letra_precio = 0;
          $this->sc_force_zero[] = 'size_letra_precio';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->size_letra_perso1 === "" || is_null($this->size_letra_perso1))  
      { 
          $this->size_letra_perso1 = 0;
          $this->sc_force_zero[] = 'size_letra_perso1';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->size_letra_perso2 === "" || is_null($this->size_letra_perso2))  
      { 
          $this->size_letra_perso2 = 0;
          $this->sc_force_zero[] = 'size_letra_perso2';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->size_letra_perso3 === "" || is_null($this->size_letra_perso3))  
      { 
          $this->size_letra_perso3 = 0;
          $this->sc_force_zero[] = 'size_letra_perso3';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->posicion_codigo === "" || is_null($this->posicion_codigo))  
      { 
          $this->posicion_codigo = 0;
          $this->sc_force_zero[] = 'posicion_codigo';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->posicion_descripcion === "" || is_null($this->posicion_descripcion))  
      { 
          $this->posicion_descripcion = 0;
          $this->sc_force_zero[] = 'posicion_descripcion';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->posicion_precio === "" || is_null($this->posicion_precio))  
      { 
          $this->posicion_precio = 0;
          $this->sc_force_zero[] = 'posicion_precio';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->posicion_perso1 === "" || is_null($this->posicion_perso1))  
      { 
          $this->posicion_perso1 = 0;
          $this->sc_force_zero[] = 'posicion_perso1';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->posicion_perso2 === "" || is_null($this->posicion_perso2))  
      { 
          $this->posicion_perso2 = 0;
          $this->sc_force_zero[] = 'posicion_perso2';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->posicion_perso3 === "" || is_null($this->posicion_perso3))  
      { 
          $this->posicion_perso3 = 0;
          $this->sc_force_zero[] = 'posicion_perso3';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->copias === "" || is_null($this->copias))  
      { 
          $this->copias = 0;
          $this->sc_force_zero[] = 'copias';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->codigo_before_qstr = $this->codigo;
          $this->codigo = substr($this->Db->qstr($this->codigo), 1, -1); 
          if ($this->codigo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codigo = "null"; 
              $NM_val_null[] = "codigo";
          } 
          $this->descripcion_before_qstr = $this->descripcion;
          $this->descripcion = substr($this->Db->qstr($this->descripcion), 1, -1); 
          if ($this->descripcion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->descripcion = "null"; 
              $NM_val_null[] = "descripcion";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->tipo_letra_before_qstr = $this->tipo_letra;
          $this->tipo_letra = substr($this->Db->qstr($this->tipo_letra), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->tipo_letra == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->tipo_letra = "null"; 
                  $NM_val_null[] = "tipo_letra";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->tipo_codigo_before_qstr = $this->tipo_codigo;
          $this->tipo_codigo = substr($this->Db->qstr($this->tipo_codigo), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->tipo_codigo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->tipo_codigo = "null"; 
                  $NM_val_null[] = "tipo_codigo";
              } 
          }
          $this->tipo_imagen_before_qstr = $this->tipo_imagen;
          $this->tipo_imagen = substr($this->Db->qstr($this->tipo_imagen), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->tipo_imagen == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->tipo_imagen = "null"; 
                  $NM_val_null[] = "tipo_imagen";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->precio_before_qstr = $this->precio;
          $this->precio = substr($this->Db->qstr($this->precio), 1, -1); 
          if ($this->precio == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->precio = "null"; 
              $NM_val_null[] = "precio";
          } 
          $this->ver_codigo_before_qstr = $this->ver_codigo;
          $this->ver_codigo = substr($this->Db->qstr($this->ver_codigo), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->ver_codigo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->ver_codigo = "null"; 
                  $NM_val_null[] = "ver_codigo";
              } 
          }
          $this->ver_descripcion_before_qstr = $this->ver_descripcion;
          $this->ver_descripcion = substr($this->Db->qstr($this->ver_descripcion), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->ver_descripcion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->ver_descripcion = "null"; 
                  $NM_val_null[] = "ver_descripcion";
              } 
          }
          $this->titulo_before_qstr = $this->titulo;
          $this->titulo = substr($this->Db->qstr($this->titulo), 1, -1); 
          if ($this->titulo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->titulo = "null"; 
              $NM_val_null[] = "titulo";
          } 
          $this->personalizado1_before_qstr = $this->personalizado1;
          $this->personalizado1 = substr($this->Db->qstr($this->personalizado1), 1, -1); 
          if ($this->personalizado1 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->personalizado1 = "null"; 
              $NM_val_null[] = "personalizado1";
          } 
          $this->personalizado2_before_qstr = $this->personalizado2;
          $this->personalizado2 = substr($this->Db->qstr($this->personalizado2), 1, -1); 
          if ($this->personalizado2 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->personalizado2 = "null"; 
              $NM_val_null[] = "personalizado2";
          } 
          $this->personalizado3_before_qstr = $this->personalizado3;
          $this->personalizado3 = substr($this->Db->qstr($this->personalizado3), 1, -1); 
          if ($this->personalizado3 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->personalizado3 = "null"; 
              $NM_val_null[] = "personalizado3";
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
          $this->alineacion_before_qstr = $this->alineacion;
          $this->alineacion = substr($this->Db->qstr($this->alineacion), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->alineacion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->alineacion = "null"; 
                  $NM_val_null[] = "alineacion";
              } 
          }
          $this->nombre_configuracion_before_qstr = $this->nombre_configuracion;
          $this->nombre_configuracion = substr($this->Db->qstr($this->nombre_configuracion), 1, -1); 
          if ($this->nombre_configuracion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombre_configuracion = "null"; 
              $NM_val_null[] = "nombre_configuracion";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_etiquetas_pack_ajax_response();
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
                  $SC_fields_update[] = "idfamilia = $this->idfamilia, codigo = '$this->codigo', descripcion = '$this->descripcion', size_letra_descripcion = $this->size_letra_descripcion, tipo_letra = '$this->tipo_letra', columnas = $this->columnas, tipo_codigo = '$this->tipo_codigo', tipo_imagen = '$this->tipo_imagen', altura = $this->altura, anchura = $this->anchura, precio = '$this->precio', ver_codigo = '$this->ver_codigo', ver_descripcion = '$this->ver_descripcion', titulo = '$this->titulo', personalizado1 = '$this->personalizado1', personalizado2 = '$this->personalizado2', personalizado3 = '$this->personalizado3', espaciado = $this->espaciado, ancho_descripcion = $this->ancho_descripcion, size_letra_codigo = $this->size_letra_codigo, size_letra_precio = $this->size_letra_precio, size_letra_perso1 = $this->size_letra_perso1, size_letra_perso2 = $this->size_letra_perso2, size_letra_perso3 = $this->size_letra_perso3, posicion_codigo = $this->posicion_codigo, posicion_descripcion = $this->posicion_descripcion, posicion_precio = $this->posicion_precio, posicion_perso1 = $this->posicion_perso1, posicion_perso2 = $this->posicion_perso2, posicion_perso3 = $this->posicion_perso3, alineacion = '$this->alineacion', nombre_configuracion = '$this->nombre_configuracion', copias = $this->copias"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idfamilia = $this->idfamilia, codigo = '$this->codigo', descripcion = '$this->descripcion', size_letra_descripcion = $this->size_letra_descripcion, tipo_letra = '$this->tipo_letra', columnas = $this->columnas, tipo_codigo = '$this->tipo_codigo', tipo_imagen = '$this->tipo_imagen', altura = $this->altura, anchura = $this->anchura, precio = '$this->precio', ver_codigo = '$this->ver_codigo', ver_descripcion = '$this->ver_descripcion', titulo = '$this->titulo', personalizado1 = '$this->personalizado1', personalizado2 = '$this->personalizado2', personalizado3 = '$this->personalizado3', espaciado = $this->espaciado, ancho_descripcion = $this->ancho_descripcion, size_letra_codigo = $this->size_letra_codigo, size_letra_precio = $this->size_letra_precio, size_letra_perso1 = $this->size_letra_perso1, size_letra_perso2 = $this->size_letra_perso2, size_letra_perso3 = $this->size_letra_perso3, posicion_codigo = $this->posicion_codigo, posicion_descripcion = $this->posicion_descripcion, posicion_precio = $this->posicion_precio, posicion_perso1 = $this->posicion_perso1, posicion_perso2 = $this->posicion_perso2, posicion_perso3 = $this->posicion_perso3, alineacion = '$this->alineacion', nombre_configuracion = '$this->nombre_configuracion', copias = $this->copias"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idfamilia = $this->idfamilia, codigo = '$this->codigo', descripcion = '$this->descripcion', size_letra_descripcion = $this->size_letra_descripcion, tipo_letra = '$this->tipo_letra', columnas = $this->columnas, tipo_codigo = '$this->tipo_codigo', tipo_imagen = '$this->tipo_imagen', altura = $this->altura, anchura = $this->anchura, precio = '$this->precio', ver_codigo = '$this->ver_codigo', ver_descripcion = '$this->ver_descripcion', titulo = '$this->titulo', personalizado1 = '$this->personalizado1', personalizado2 = '$this->personalizado2', personalizado3 = '$this->personalizado3', espaciado = $this->espaciado, ancho_descripcion = $this->ancho_descripcion, size_letra_codigo = $this->size_letra_codigo, size_letra_precio = $this->size_letra_precio, size_letra_perso1 = $this->size_letra_perso1, size_letra_perso2 = $this->size_letra_perso2, size_letra_perso3 = $this->size_letra_perso3, posicion_codigo = $this->posicion_codigo, posicion_descripcion = $this->posicion_descripcion, posicion_precio = $this->posicion_precio, posicion_perso1 = $this->posicion_perso1, posicion_perso2 = $this->posicion_perso2, posicion_perso3 = $this->posicion_perso3, alineacion = '$this->alineacion', nombre_configuracion = '$this->nombre_configuracion', copias = $this->copias"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idfamilia = $this->idfamilia, codigo = '$this->codigo', descripcion = '$this->descripcion', size_letra_descripcion = $this->size_letra_descripcion, tipo_letra = '$this->tipo_letra', columnas = $this->columnas, tipo_codigo = '$this->tipo_codigo', tipo_imagen = '$this->tipo_imagen', altura = $this->altura, anchura = $this->anchura, precio = '$this->precio', ver_codigo = '$this->ver_codigo', ver_descripcion = '$this->ver_descripcion', titulo = '$this->titulo', personalizado1 = '$this->personalizado1', personalizado2 = '$this->personalizado2', personalizado3 = '$this->personalizado3', espaciado = $this->espaciado, ancho_descripcion = $this->ancho_descripcion, size_letra_codigo = $this->size_letra_codigo, size_letra_precio = $this->size_letra_precio, size_letra_perso1 = $this->size_letra_perso1, size_letra_perso2 = $this->size_letra_perso2, size_letra_perso3 = $this->size_letra_perso3, posicion_codigo = $this->posicion_codigo, posicion_descripcion = $this->posicion_descripcion, posicion_precio = $this->posicion_precio, posicion_perso1 = $this->posicion_perso1, posicion_perso2 = $this->posicion_perso2, posicion_perso3 = $this->posicion_perso3, alineacion = '$this->alineacion', nombre_configuracion = '$this->nombre_configuracion', copias = $this->copias"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idfamilia = $this->idfamilia, codigo = '$this->codigo', descripcion = '$this->descripcion', size_letra_descripcion = $this->size_letra_descripcion, tipo_letra = '$this->tipo_letra', columnas = $this->columnas, tipo_codigo = '$this->tipo_codigo', tipo_imagen = '$this->tipo_imagen', altura = $this->altura, anchura = $this->anchura, precio = '$this->precio', ver_codigo = '$this->ver_codigo', ver_descripcion = '$this->ver_descripcion', titulo = '$this->titulo', personalizado1 = '$this->personalizado1', personalizado2 = '$this->personalizado2', personalizado3 = '$this->personalizado3', espaciado = $this->espaciado, ancho_descripcion = $this->ancho_descripcion, size_letra_codigo = $this->size_letra_codigo, size_letra_precio = $this->size_letra_precio, size_letra_perso1 = $this->size_letra_perso1, size_letra_perso2 = $this->size_letra_perso2, size_letra_perso3 = $this->size_letra_perso3, posicion_codigo = $this->posicion_codigo, posicion_descripcion = $this->posicion_descripcion, posicion_precio = $this->posicion_precio, posicion_perso1 = $this->posicion_perso1, posicion_perso2 = $this->posicion_perso2, posicion_perso3 = $this->posicion_perso3, alineacion = '$this->alineacion', nombre_configuracion = '$this->nombre_configuracion', copias = $this->copias"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idfamilia = $this->idfamilia, codigo = '$this->codigo', descripcion = '$this->descripcion', size_letra_descripcion = $this->size_letra_descripcion, tipo_letra = '$this->tipo_letra', columnas = $this->columnas, tipo_codigo = '$this->tipo_codigo', tipo_imagen = '$this->tipo_imagen', altura = $this->altura, anchura = $this->anchura, precio = '$this->precio', ver_codigo = '$this->ver_codigo', ver_descripcion = '$this->ver_descripcion', titulo = '$this->titulo', personalizado1 = '$this->personalizado1', personalizado2 = '$this->personalizado2', personalizado3 = '$this->personalizado3', espaciado = $this->espaciado, ancho_descripcion = $this->ancho_descripcion, size_letra_codigo = $this->size_letra_codigo, size_letra_precio = $this->size_letra_precio, size_letra_perso1 = $this->size_letra_perso1, size_letra_perso2 = $this->size_letra_perso2, size_letra_perso3 = $this->size_letra_perso3, posicion_codigo = $this->posicion_codigo, posicion_descripcion = $this->posicion_descripcion, posicion_precio = $this->posicion_precio, posicion_perso1 = $this->posicion_perso1, posicion_perso2 = $this->posicion_perso2, posicion_perso3 = $this->posicion_perso3, alineacion = '$this->alineacion', nombre_configuracion = '$this->nombre_configuracion', copias = $this->copias"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idfamilia = $this->idfamilia, codigo = '$this->codigo', descripcion = '$this->descripcion', size_letra_descripcion = $this->size_letra_descripcion, tipo_letra = '$this->tipo_letra', columnas = $this->columnas, tipo_codigo = '$this->tipo_codigo', tipo_imagen = '$this->tipo_imagen', altura = $this->altura, anchura = $this->anchura, precio = '$this->precio', ver_codigo = '$this->ver_codigo', ver_descripcion = '$this->ver_descripcion', titulo = '$this->titulo', personalizado1 = '$this->personalizado1', personalizado2 = '$this->personalizado2', personalizado3 = '$this->personalizado3', espaciado = $this->espaciado, ancho_descripcion = $this->ancho_descripcion, size_letra_codigo = $this->size_letra_codigo, size_letra_precio = $this->size_letra_precio, size_letra_perso1 = $this->size_letra_perso1, size_letra_perso2 = $this->size_letra_perso2, size_letra_perso3 = $this->size_letra_perso3, posicion_codigo = $this->posicion_codigo, posicion_descripcion = $this->posicion_descripcion, posicion_precio = $this->posicion_precio, posicion_perso1 = $this->posicion_perso1, posicion_perso2 = $this->posicion_perso2, posicion_perso3 = $this->posicion_perso3, alineacion = '$this->alineacion', nombre_configuracion = '$this->nombre_configuracion', copias = $this->copias"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE idetiqueta = $this->idetiqueta ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE idetiqueta = $this->idetiqueta ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE idetiqueta = $this->idetiqueta ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE idetiqueta = $this->idetiqueta ";  
              }  
              else  
              {
                  $comando .= " WHERE idetiqueta = $this->idetiqueta ";  
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
                                  form_etiquetas_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->codigo = $this->codigo_before_qstr;
              $this->descripcion = $this->descripcion_before_qstr;
              $this->tipo_letra = $this->tipo_letra_before_qstr;
              $this->tipo_codigo = $this->tipo_codigo_before_qstr;
              $this->tipo_imagen = $this->tipo_imagen_before_qstr;
              $this->precio = $this->precio_before_qstr;
              $this->ver_codigo = $this->ver_codigo_before_qstr;
              $this->ver_descripcion = $this->ver_descripcion_before_qstr;
              $this->titulo = $this->titulo_before_qstr;
              $this->personalizado1 = $this->personalizado1_before_qstr;
              $this->personalizado2 = $this->personalizado2_before_qstr;
              $this->personalizado3 = $this->personalizado3_before_qstr;
              $this->alineacion = $this->alineacion_before_qstr;
              $this->nombre_configuracion = $this->nombre_configuracion_before_qstr;
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['idetiqueta'])) { $this->idetiqueta = $NM_val_form['idetiqueta']; }
              elseif (isset($this->idetiqueta)) { $this->nm_limpa_alfa($this->idetiqueta); }
              if     (isset($NM_val_form) && isset($NM_val_form['idfamilia'])) { $this->idfamilia = $NM_val_form['idfamilia']; }
              elseif (isset($this->idfamilia)) { $this->nm_limpa_alfa($this->idfamilia); }
              if     (isset($NM_val_form) && isset($NM_val_form['codigo'])) { $this->codigo = $NM_val_form['codigo']; }
              elseif (isset($this->codigo)) { $this->nm_limpa_alfa($this->codigo); }
              if     (isset($NM_val_form) && isset($NM_val_form['descripcion'])) { $this->descripcion = $NM_val_form['descripcion']; }
              elseif (isset($this->descripcion)) { $this->nm_limpa_alfa($this->descripcion); }
              if     (isset($NM_val_form) && isset($NM_val_form['size_letra_descripcion'])) { $this->size_letra_descripcion = $NM_val_form['size_letra_descripcion']; }
              elseif (isset($this->size_letra_descripcion)) { $this->nm_limpa_alfa($this->size_letra_descripcion); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo_letra'])) { $this->tipo_letra = $NM_val_form['tipo_letra']; }
              elseif (isset($this->tipo_letra)) { $this->nm_limpa_alfa($this->tipo_letra); }
              if     (isset($NM_val_form) && isset($NM_val_form['columnas'])) { $this->columnas = $NM_val_form['columnas']; }
              elseif (isset($this->columnas)) { $this->nm_limpa_alfa($this->columnas); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo_codigo'])) { $this->tipo_codigo = $NM_val_form['tipo_codigo']; }
              elseif (isset($this->tipo_codigo)) { $this->nm_limpa_alfa($this->tipo_codigo); }
              if     (isset($NM_val_form) && isset($NM_val_form['tipo_imagen'])) { $this->tipo_imagen = $NM_val_form['tipo_imagen']; }
              elseif (isset($this->tipo_imagen)) { $this->nm_limpa_alfa($this->tipo_imagen); }
              if     (isset($NM_val_form) && isset($NM_val_form['altura'])) { $this->altura = $NM_val_form['altura']; }
              elseif (isset($this->altura)) { $this->nm_limpa_alfa($this->altura); }
              if     (isset($NM_val_form) && isset($NM_val_form['anchura'])) { $this->anchura = $NM_val_form['anchura']; }
              elseif (isset($this->anchura)) { $this->nm_limpa_alfa($this->anchura); }
              if     (isset($NM_val_form) && isset($NM_val_form['precio'])) { $this->precio = $NM_val_form['precio']; }
              elseif (isset($this->precio)) { $this->nm_limpa_alfa($this->precio); }
              if     (isset($NM_val_form) && isset($NM_val_form['ver_codigo'])) { $this->ver_codigo = $NM_val_form['ver_codigo']; }
              elseif (isset($this->ver_codigo)) { $this->nm_limpa_alfa($this->ver_codigo); }
              if     (isset($NM_val_form) && isset($NM_val_form['ver_descripcion'])) { $this->ver_descripcion = $NM_val_form['ver_descripcion']; }
              elseif (isset($this->ver_descripcion)) { $this->nm_limpa_alfa($this->ver_descripcion); }
              if     (isset($NM_val_form) && isset($NM_val_form['titulo'])) { $this->titulo = $NM_val_form['titulo']; }
              elseif (isset($this->titulo)) { $this->nm_limpa_alfa($this->titulo); }
              if     (isset($NM_val_form) && isset($NM_val_form['personalizado1'])) { $this->personalizado1 = $NM_val_form['personalizado1']; }
              elseif (isset($this->personalizado1)) { $this->nm_limpa_alfa($this->personalizado1); }
              if     (isset($NM_val_form) && isset($NM_val_form['personalizado2'])) { $this->personalizado2 = $NM_val_form['personalizado2']; }
              elseif (isset($this->personalizado2)) { $this->nm_limpa_alfa($this->personalizado2); }
              if     (isset($NM_val_form) && isset($NM_val_form['personalizado3'])) { $this->personalizado3 = $NM_val_form['personalizado3']; }
              elseif (isset($this->personalizado3)) { $this->nm_limpa_alfa($this->personalizado3); }
              if     (isset($NM_val_form) && isset($NM_val_form['espaciado'])) { $this->espaciado = $NM_val_form['espaciado']; }
              elseif (isset($this->espaciado)) { $this->nm_limpa_alfa($this->espaciado); }
              if     (isset($NM_val_form) && isset($NM_val_form['ancho_descripcion'])) { $this->ancho_descripcion = $NM_val_form['ancho_descripcion']; }
              elseif (isset($this->ancho_descripcion)) { $this->nm_limpa_alfa($this->ancho_descripcion); }
              if     (isset($NM_val_form) && isset($NM_val_form['size_letra_codigo'])) { $this->size_letra_codigo = $NM_val_form['size_letra_codigo']; }
              elseif (isset($this->size_letra_codigo)) { $this->nm_limpa_alfa($this->size_letra_codigo); }
              if     (isset($NM_val_form) && isset($NM_val_form['size_letra_precio'])) { $this->size_letra_precio = $NM_val_form['size_letra_precio']; }
              elseif (isset($this->size_letra_precio)) { $this->nm_limpa_alfa($this->size_letra_precio); }
              if     (isset($NM_val_form) && isset($NM_val_form['size_letra_perso1'])) { $this->size_letra_perso1 = $NM_val_form['size_letra_perso1']; }
              elseif (isset($this->size_letra_perso1)) { $this->nm_limpa_alfa($this->size_letra_perso1); }
              if     (isset($NM_val_form) && isset($NM_val_form['size_letra_perso2'])) { $this->size_letra_perso2 = $NM_val_form['size_letra_perso2']; }
              elseif (isset($this->size_letra_perso2)) { $this->nm_limpa_alfa($this->size_letra_perso2); }
              if     (isset($NM_val_form) && isset($NM_val_form['size_letra_perso3'])) { $this->size_letra_perso3 = $NM_val_form['size_letra_perso3']; }
              elseif (isset($this->size_letra_perso3)) { $this->nm_limpa_alfa($this->size_letra_perso3); }
              if     (isset($NM_val_form) && isset($NM_val_form['posicion_codigo'])) { $this->posicion_codigo = $NM_val_form['posicion_codigo']; }
              elseif (isset($this->posicion_codigo)) { $this->nm_limpa_alfa($this->posicion_codigo); }
              if     (isset($NM_val_form) && isset($NM_val_form['posicion_descripcion'])) { $this->posicion_descripcion = $NM_val_form['posicion_descripcion']; }
              elseif (isset($this->posicion_descripcion)) { $this->nm_limpa_alfa($this->posicion_descripcion); }
              if     (isset($NM_val_form) && isset($NM_val_form['posicion_precio'])) { $this->posicion_precio = $NM_val_form['posicion_precio']; }
              elseif (isset($this->posicion_precio)) { $this->nm_limpa_alfa($this->posicion_precio); }
              if     (isset($NM_val_form) && isset($NM_val_form['posicion_perso1'])) { $this->posicion_perso1 = $NM_val_form['posicion_perso1']; }
              elseif (isset($this->posicion_perso1)) { $this->nm_limpa_alfa($this->posicion_perso1); }
              if     (isset($NM_val_form) && isset($NM_val_form['posicion_perso2'])) { $this->posicion_perso2 = $NM_val_form['posicion_perso2']; }
              elseif (isset($this->posicion_perso2)) { $this->nm_limpa_alfa($this->posicion_perso2); }
              if     (isset($NM_val_form) && isset($NM_val_form['posicion_perso3'])) { $this->posicion_perso3 = $NM_val_form['posicion_perso3']; }
              elseif (isset($this->posicion_perso3)) { $this->nm_limpa_alfa($this->posicion_perso3); }
              if     (isset($NM_val_form) && isset($NM_val_form['alineacion'])) { $this->alineacion = $NM_val_form['alineacion']; }
              elseif (isset($this->alineacion)) { $this->nm_limpa_alfa($this->alineacion); }
              if     (isset($NM_val_form) && isset($NM_val_form['nombre_configuracion'])) { $this->nombre_configuracion = $NM_val_form['nombre_configuracion']; }
              elseif (isset($this->nombre_configuracion)) { $this->nm_limpa_alfa($this->nombre_configuracion); }
              if     (isset($NM_val_form) && isset($NM_val_form['copias'])) { $this->copias = $NM_val_form['copias']; }
              elseif (isset($this->copias)) { $this->nm_limpa_alfa($this->copias); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('idetiqueta', 'nombre_configuracion', 'titulo', 'idfamilia', 'codigo', 'nompro', 'descripcion', 'size_letra_descripcion', 'tipo_letra', 'columnas', 'tipo_codigo', 'tipo_imagen', 'altura', 'anchura', 'precio', 'ver_codigo', 'ver_descripcion', 'personalizado1', 'personalizado2', 'personalizado3', 'espaciado', 'ancho_descripcion', 'size_letra_codigo', 'size_letra_precio', 'size_letra_perso1', 'size_letra_perso2', 'size_letra_perso3', 'posicion_codigo', 'posicion_descripcion', 'posicion_precio', 'posicion_perso1', 'posicion_perso2', 'posicion_perso3', 'alineacion', 'copias'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "idetiqueta, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_etiquetas_pack_ajax_response();
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
                  if ($this->size_letra_descripcion != "")
                  { 
                       $compl_insert     .= ", size_letra_descripcion";
                       $compl_insert_val .= ", $this->size_letra_descripcion";
                  } 
                  if ($this->tipo_letra != "")
                  { 
                       $compl_insert     .= ", tipo_letra";
                       $compl_insert_val .= ", '$this->tipo_letra'";
                  } 
                  if ($this->columnas != "")
                  { 
                       $compl_insert     .= ", columnas";
                       $compl_insert_val .= ", $this->columnas";
                  } 
                  if ($this->tipo_codigo != "")
                  { 
                       $compl_insert     .= ", tipo_codigo";
                       $compl_insert_val .= ", '$this->tipo_codigo'";
                  } 
                  if ($this->tipo_imagen != "")
                  { 
                       $compl_insert     .= ", tipo_imagen";
                       $compl_insert_val .= ", '$this->tipo_imagen'";
                  } 
                  if ($this->altura != "")
                  { 
                       $compl_insert     .= ", altura";
                       $compl_insert_val .= ", $this->altura";
                  } 
                  if ($this->anchura != "")
                  { 
                       $compl_insert     .= ", anchura";
                       $compl_insert_val .= ", $this->anchura";
                  } 
                  if ($this->ver_codigo != "")
                  { 
                       $compl_insert     .= ", ver_codigo";
                       $compl_insert_val .= ", '$this->ver_codigo'";
                  } 
                  if ($this->ver_descripcion != "")
                  { 
                       $compl_insert     .= ", ver_descripcion";
                       $compl_insert_val .= ", '$this->ver_descripcion'";
                  } 
                  if ($this->ancho_descripcion != "")
                  { 
                       $compl_insert     .= ", ancho_descripcion";
                       $compl_insert_val .= ", $this->ancho_descripcion";
                  } 
                  if ($this->size_letra_codigo != "")
                  { 
                       $compl_insert     .= ", size_letra_codigo";
                       $compl_insert_val .= ", $this->size_letra_codigo";
                  } 
                  if ($this->size_letra_precio != "")
                  { 
                       $compl_insert     .= ", size_letra_precio";
                       $compl_insert_val .= ", $this->size_letra_precio";
                  } 
                  if ($this->size_letra_perso1 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso1";
                       $compl_insert_val .= ", $this->size_letra_perso1";
                  } 
                  if ($this->size_letra_perso2 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso2";
                       $compl_insert_val .= ", $this->size_letra_perso2";
                  } 
                  if ($this->size_letra_perso3 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso3";
                       $compl_insert_val .= ", $this->size_letra_perso3";
                  } 
                  if ($this->posicion_codigo != "")
                  { 
                       $compl_insert     .= ", posicion_codigo";
                       $compl_insert_val .= ", $this->posicion_codigo";
                  } 
                  if ($this->posicion_descripcion != "")
                  { 
                       $compl_insert     .= ", posicion_descripcion";
                       $compl_insert_val .= ", $this->posicion_descripcion";
                  } 
                  if ($this->posicion_precio != "")
                  { 
                       $compl_insert     .= ", posicion_precio";
                       $compl_insert_val .= ", $this->posicion_precio";
                  } 
                  if ($this->posicion_perso1 != "")
                  { 
                       $compl_insert     .= ", posicion_perso1";
                       $compl_insert_val .= ", $this->posicion_perso1";
                  } 
                  if ($this->posicion_perso2 != "")
                  { 
                       $compl_insert     .= ", posicion_perso2";
                       $compl_insert_val .= ", $this->posicion_perso2";
                  } 
                  if ($this->posicion_perso3 != "")
                  { 
                       $compl_insert     .= ", posicion_perso3";
                       $compl_insert_val .= ", $this->posicion_perso3";
                  } 
                  if ($this->alineacion != "")
                  { 
                       $compl_insert     .= ", alineacion";
                       $compl_insert_val .= ", '$this->alineacion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (idfamilia, codigo, descripcion, precio, titulo, personalizado1, personalizado2, personalizado3, espaciado, nombre_configuracion, copias $compl_insert) VALUES ($this->idfamilia, '$this->codigo', '$this->descripcion', '$this->precio', '$this->titulo', '$this->personalizado1', '$this->personalizado2', '$this->personalizado3', $this->espaciado, '$this->nombre_configuracion', $this->copias $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->size_letra_descripcion != "")
                  { 
                       $compl_insert     .= ", size_letra_descripcion";
                       $compl_insert_val .= ", $this->size_letra_descripcion";
                  } 
                  if ($this->tipo_letra != "")
                  { 
                       $compl_insert     .= ", tipo_letra";
                       $compl_insert_val .= ", '$this->tipo_letra'";
                  } 
                  if ($this->columnas != "")
                  { 
                       $compl_insert     .= ", columnas";
                       $compl_insert_val .= ", $this->columnas";
                  } 
                  if ($this->tipo_codigo != "")
                  { 
                       $compl_insert     .= ", tipo_codigo";
                       $compl_insert_val .= ", '$this->tipo_codigo'";
                  } 
                  if ($this->tipo_imagen != "")
                  { 
                       $compl_insert     .= ", tipo_imagen";
                       $compl_insert_val .= ", '$this->tipo_imagen'";
                  } 
                  if ($this->altura != "")
                  { 
                       $compl_insert     .= ", altura";
                       $compl_insert_val .= ", $this->altura";
                  } 
                  if ($this->anchura != "")
                  { 
                       $compl_insert     .= ", anchura";
                       $compl_insert_val .= ", $this->anchura";
                  } 
                  if ($this->ver_codigo != "")
                  { 
                       $compl_insert     .= ", ver_codigo";
                       $compl_insert_val .= ", '$this->ver_codigo'";
                  } 
                  if ($this->ver_descripcion != "")
                  { 
                       $compl_insert     .= ", ver_descripcion";
                       $compl_insert_val .= ", '$this->ver_descripcion'";
                  } 
                  if ($this->ancho_descripcion != "")
                  { 
                       $compl_insert     .= ", ancho_descripcion";
                       $compl_insert_val .= ", $this->ancho_descripcion";
                  } 
                  if ($this->size_letra_codigo != "")
                  { 
                       $compl_insert     .= ", size_letra_codigo";
                       $compl_insert_val .= ", $this->size_letra_codigo";
                  } 
                  if ($this->size_letra_precio != "")
                  { 
                       $compl_insert     .= ", size_letra_precio";
                       $compl_insert_val .= ", $this->size_letra_precio";
                  } 
                  if ($this->size_letra_perso1 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso1";
                       $compl_insert_val .= ", $this->size_letra_perso1";
                  } 
                  if ($this->size_letra_perso2 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso2";
                       $compl_insert_val .= ", $this->size_letra_perso2";
                  } 
                  if ($this->size_letra_perso3 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso3";
                       $compl_insert_val .= ", $this->size_letra_perso3";
                  } 
                  if ($this->posicion_codigo != "")
                  { 
                       $compl_insert     .= ", posicion_codigo";
                       $compl_insert_val .= ", $this->posicion_codigo";
                  } 
                  if ($this->posicion_descripcion != "")
                  { 
                       $compl_insert     .= ", posicion_descripcion";
                       $compl_insert_val .= ", $this->posicion_descripcion";
                  } 
                  if ($this->posicion_precio != "")
                  { 
                       $compl_insert     .= ", posicion_precio";
                       $compl_insert_val .= ", $this->posicion_precio";
                  } 
                  if ($this->posicion_perso1 != "")
                  { 
                       $compl_insert     .= ", posicion_perso1";
                       $compl_insert_val .= ", $this->posicion_perso1";
                  } 
                  if ($this->posicion_perso2 != "")
                  { 
                       $compl_insert     .= ", posicion_perso2";
                       $compl_insert_val .= ", $this->posicion_perso2";
                  } 
                  if ($this->posicion_perso3 != "")
                  { 
                       $compl_insert     .= ", posicion_perso3";
                       $compl_insert_val .= ", $this->posicion_perso3";
                  } 
                  if ($this->alineacion != "")
                  { 
                       $compl_insert     .= ", alineacion";
                       $compl_insert_val .= ", '$this->alineacion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idfamilia, codigo, descripcion, precio, titulo, personalizado1, personalizado2, personalizado3, espaciado, nombre_configuracion, copias $compl_insert) VALUES (" . $NM_seq_auto . "$this->idfamilia, '$this->codigo', '$this->descripcion', '$this->precio', '$this->titulo', '$this->personalizado1', '$this->personalizado2', '$this->personalizado3', $this->espaciado, '$this->nombre_configuracion', $this->copias $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->size_letra_descripcion != "")
                  { 
                       $compl_insert     .= ", size_letra_descripcion";
                       $compl_insert_val .= ", $this->size_letra_descripcion";
                  } 
                  if ($this->tipo_letra != "")
                  { 
                       $compl_insert     .= ", tipo_letra";
                       $compl_insert_val .= ", '$this->tipo_letra'";
                  } 
                  if ($this->columnas != "")
                  { 
                       $compl_insert     .= ", columnas";
                       $compl_insert_val .= ", $this->columnas";
                  } 
                  if ($this->tipo_codigo != "")
                  { 
                       $compl_insert     .= ", tipo_codigo";
                       $compl_insert_val .= ", '$this->tipo_codigo'";
                  } 
                  if ($this->tipo_imagen != "")
                  { 
                       $compl_insert     .= ", tipo_imagen";
                       $compl_insert_val .= ", '$this->tipo_imagen'";
                  } 
                  if ($this->altura != "")
                  { 
                       $compl_insert     .= ", altura";
                       $compl_insert_val .= ", $this->altura";
                  } 
                  if ($this->anchura != "")
                  { 
                       $compl_insert     .= ", anchura";
                       $compl_insert_val .= ", $this->anchura";
                  } 
                  if ($this->ver_codigo != "")
                  { 
                       $compl_insert     .= ", ver_codigo";
                       $compl_insert_val .= ", '$this->ver_codigo'";
                  } 
                  if ($this->ver_descripcion != "")
                  { 
                       $compl_insert     .= ", ver_descripcion";
                       $compl_insert_val .= ", '$this->ver_descripcion'";
                  } 
                  if ($this->ancho_descripcion != "")
                  { 
                       $compl_insert     .= ", ancho_descripcion";
                       $compl_insert_val .= ", $this->ancho_descripcion";
                  } 
                  if ($this->size_letra_codigo != "")
                  { 
                       $compl_insert     .= ", size_letra_codigo";
                       $compl_insert_val .= ", $this->size_letra_codigo";
                  } 
                  if ($this->size_letra_precio != "")
                  { 
                       $compl_insert     .= ", size_letra_precio";
                       $compl_insert_val .= ", $this->size_letra_precio";
                  } 
                  if ($this->size_letra_perso1 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso1";
                       $compl_insert_val .= ", $this->size_letra_perso1";
                  } 
                  if ($this->size_letra_perso2 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso2";
                       $compl_insert_val .= ", $this->size_letra_perso2";
                  } 
                  if ($this->size_letra_perso3 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso3";
                       $compl_insert_val .= ", $this->size_letra_perso3";
                  } 
                  if ($this->posicion_codigo != "")
                  { 
                       $compl_insert     .= ", posicion_codigo";
                       $compl_insert_val .= ", $this->posicion_codigo";
                  } 
                  if ($this->posicion_descripcion != "")
                  { 
                       $compl_insert     .= ", posicion_descripcion";
                       $compl_insert_val .= ", $this->posicion_descripcion";
                  } 
                  if ($this->posicion_precio != "")
                  { 
                       $compl_insert     .= ", posicion_precio";
                       $compl_insert_val .= ", $this->posicion_precio";
                  } 
                  if ($this->posicion_perso1 != "")
                  { 
                       $compl_insert     .= ", posicion_perso1";
                       $compl_insert_val .= ", $this->posicion_perso1";
                  } 
                  if ($this->posicion_perso2 != "")
                  { 
                       $compl_insert     .= ", posicion_perso2";
                       $compl_insert_val .= ", $this->posicion_perso2";
                  } 
                  if ($this->posicion_perso3 != "")
                  { 
                       $compl_insert     .= ", posicion_perso3";
                       $compl_insert_val .= ", $this->posicion_perso3";
                  } 
                  if ($this->alineacion != "")
                  { 
                       $compl_insert     .= ", alineacion";
                       $compl_insert_val .= ", '$this->alineacion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idfamilia, codigo, descripcion, precio, titulo, personalizado1, personalizado2, personalizado3, espaciado, nombre_configuracion, copias $compl_insert) VALUES (" . $NM_seq_auto . "$this->idfamilia, '$this->codigo', '$this->descripcion', '$this->precio', '$this->titulo', '$this->personalizado1', '$this->personalizado2', '$this->personalizado3', $this->espaciado, '$this->nombre_configuracion', $this->copias $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->size_letra_descripcion != "")
                  { 
                       $compl_insert     .= ", size_letra_descripcion";
                       $compl_insert_val .= ", $this->size_letra_descripcion";
                  } 
                  if ($this->tipo_letra != "")
                  { 
                       $compl_insert     .= ", tipo_letra";
                       $compl_insert_val .= ", '$this->tipo_letra'";
                  } 
                  if ($this->columnas != "")
                  { 
                       $compl_insert     .= ", columnas";
                       $compl_insert_val .= ", $this->columnas";
                  } 
                  if ($this->tipo_codigo != "")
                  { 
                       $compl_insert     .= ", tipo_codigo";
                       $compl_insert_val .= ", '$this->tipo_codigo'";
                  } 
                  if ($this->tipo_imagen != "")
                  { 
                       $compl_insert     .= ", tipo_imagen";
                       $compl_insert_val .= ", '$this->tipo_imagen'";
                  } 
                  if ($this->altura != "")
                  { 
                       $compl_insert     .= ", altura";
                       $compl_insert_val .= ", $this->altura";
                  } 
                  if ($this->anchura != "")
                  { 
                       $compl_insert     .= ", anchura";
                       $compl_insert_val .= ", $this->anchura";
                  } 
                  if ($this->ver_codigo != "")
                  { 
                       $compl_insert     .= ", ver_codigo";
                       $compl_insert_val .= ", '$this->ver_codigo'";
                  } 
                  if ($this->ver_descripcion != "")
                  { 
                       $compl_insert     .= ", ver_descripcion";
                       $compl_insert_val .= ", '$this->ver_descripcion'";
                  } 
                  if ($this->ancho_descripcion != "")
                  { 
                       $compl_insert     .= ", ancho_descripcion";
                       $compl_insert_val .= ", $this->ancho_descripcion";
                  } 
                  if ($this->size_letra_codigo != "")
                  { 
                       $compl_insert     .= ", size_letra_codigo";
                       $compl_insert_val .= ", $this->size_letra_codigo";
                  } 
                  if ($this->size_letra_precio != "")
                  { 
                       $compl_insert     .= ", size_letra_precio";
                       $compl_insert_val .= ", $this->size_letra_precio";
                  } 
                  if ($this->size_letra_perso1 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso1";
                       $compl_insert_val .= ", $this->size_letra_perso1";
                  } 
                  if ($this->size_letra_perso2 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso2";
                       $compl_insert_val .= ", $this->size_letra_perso2";
                  } 
                  if ($this->size_letra_perso3 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso3";
                       $compl_insert_val .= ", $this->size_letra_perso3";
                  } 
                  if ($this->posicion_codigo != "")
                  { 
                       $compl_insert     .= ", posicion_codigo";
                       $compl_insert_val .= ", $this->posicion_codigo";
                  } 
                  if ($this->posicion_descripcion != "")
                  { 
                       $compl_insert     .= ", posicion_descripcion";
                       $compl_insert_val .= ", $this->posicion_descripcion";
                  } 
                  if ($this->posicion_precio != "")
                  { 
                       $compl_insert     .= ", posicion_precio";
                       $compl_insert_val .= ", $this->posicion_precio";
                  } 
                  if ($this->posicion_perso1 != "")
                  { 
                       $compl_insert     .= ", posicion_perso1";
                       $compl_insert_val .= ", $this->posicion_perso1";
                  } 
                  if ($this->posicion_perso2 != "")
                  { 
                       $compl_insert     .= ", posicion_perso2";
                       $compl_insert_val .= ", $this->posicion_perso2";
                  } 
                  if ($this->posicion_perso3 != "")
                  { 
                       $compl_insert     .= ", posicion_perso3";
                       $compl_insert_val .= ", $this->posicion_perso3";
                  } 
                  if ($this->alineacion != "")
                  { 
                       $compl_insert     .= ", alineacion";
                       $compl_insert_val .= ", '$this->alineacion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idfamilia, codigo, descripcion, precio, titulo, personalizado1, personalizado2, personalizado3, espaciado, nombre_configuracion, copias $compl_insert) VALUES (" . $NM_seq_auto . "$this->idfamilia, '$this->codigo', '$this->descripcion', '$this->precio', '$this->titulo', '$this->personalizado1', '$this->personalizado2', '$this->personalizado3', $this->espaciado, '$this->nombre_configuracion', $this->copias $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->size_letra_descripcion != "")
                  { 
                       $compl_insert     .= ", size_letra_descripcion";
                       $compl_insert_val .= ", $this->size_letra_descripcion";
                  } 
                  if ($this->tipo_letra != "")
                  { 
                       $compl_insert     .= ", tipo_letra";
                       $compl_insert_val .= ", '$this->tipo_letra'";
                  } 
                  if ($this->columnas != "")
                  { 
                       $compl_insert     .= ", columnas";
                       $compl_insert_val .= ", $this->columnas";
                  } 
                  if ($this->tipo_codigo != "")
                  { 
                       $compl_insert     .= ", tipo_codigo";
                       $compl_insert_val .= ", '$this->tipo_codigo'";
                  } 
                  if ($this->tipo_imagen != "")
                  { 
                       $compl_insert     .= ", tipo_imagen";
                       $compl_insert_val .= ", '$this->tipo_imagen'";
                  } 
                  if ($this->altura != "")
                  { 
                       $compl_insert     .= ", altura";
                       $compl_insert_val .= ", $this->altura";
                  } 
                  if ($this->anchura != "")
                  { 
                       $compl_insert     .= ", anchura";
                       $compl_insert_val .= ", $this->anchura";
                  } 
                  if ($this->ver_codigo != "")
                  { 
                       $compl_insert     .= ", ver_codigo";
                       $compl_insert_val .= ", '$this->ver_codigo'";
                  } 
                  if ($this->ver_descripcion != "")
                  { 
                       $compl_insert     .= ", ver_descripcion";
                       $compl_insert_val .= ", '$this->ver_descripcion'";
                  } 
                  if ($this->ancho_descripcion != "")
                  { 
                       $compl_insert     .= ", ancho_descripcion";
                       $compl_insert_val .= ", $this->ancho_descripcion";
                  } 
                  if ($this->size_letra_codigo != "")
                  { 
                       $compl_insert     .= ", size_letra_codigo";
                       $compl_insert_val .= ", $this->size_letra_codigo";
                  } 
                  if ($this->size_letra_precio != "")
                  { 
                       $compl_insert     .= ", size_letra_precio";
                       $compl_insert_val .= ", $this->size_letra_precio";
                  } 
                  if ($this->size_letra_perso1 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso1";
                       $compl_insert_val .= ", $this->size_letra_perso1";
                  } 
                  if ($this->size_letra_perso2 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso2";
                       $compl_insert_val .= ", $this->size_letra_perso2";
                  } 
                  if ($this->size_letra_perso3 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso3";
                       $compl_insert_val .= ", $this->size_letra_perso3";
                  } 
                  if ($this->posicion_codigo != "")
                  { 
                       $compl_insert     .= ", posicion_codigo";
                       $compl_insert_val .= ", $this->posicion_codigo";
                  } 
                  if ($this->posicion_descripcion != "")
                  { 
                       $compl_insert     .= ", posicion_descripcion";
                       $compl_insert_val .= ", $this->posicion_descripcion";
                  } 
                  if ($this->posicion_precio != "")
                  { 
                       $compl_insert     .= ", posicion_precio";
                       $compl_insert_val .= ", $this->posicion_precio";
                  } 
                  if ($this->posicion_perso1 != "")
                  { 
                       $compl_insert     .= ", posicion_perso1";
                       $compl_insert_val .= ", $this->posicion_perso1";
                  } 
                  if ($this->posicion_perso2 != "")
                  { 
                       $compl_insert     .= ", posicion_perso2";
                       $compl_insert_val .= ", $this->posicion_perso2";
                  } 
                  if ($this->posicion_perso3 != "")
                  { 
                       $compl_insert     .= ", posicion_perso3";
                       $compl_insert_val .= ", $this->posicion_perso3";
                  } 
                  if ($this->alineacion != "")
                  { 
                       $compl_insert     .= ", alineacion";
                       $compl_insert_val .= ", '$this->alineacion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idfamilia, codigo, descripcion, precio, titulo, personalizado1, personalizado2, personalizado3, espaciado, nombre_configuracion, copias $compl_insert) VALUES (" . $NM_seq_auto . "$this->idfamilia, '$this->codigo', '$this->descripcion', '$this->precio', '$this->titulo', '$this->personalizado1', '$this->personalizado2', '$this->personalizado3', $this->espaciado, '$this->nombre_configuracion', $this->copias $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->size_letra_descripcion != "")
                  { 
                       $compl_insert     .= ", size_letra_descripcion";
                       $compl_insert_val .= ", $this->size_letra_descripcion";
                  } 
                  if ($this->tipo_letra != "")
                  { 
                       $compl_insert     .= ", tipo_letra";
                       $compl_insert_val .= ", '$this->tipo_letra'";
                  } 
                  if ($this->columnas != "")
                  { 
                       $compl_insert     .= ", columnas";
                       $compl_insert_val .= ", $this->columnas";
                  } 
                  if ($this->tipo_codigo != "")
                  { 
                       $compl_insert     .= ", tipo_codigo";
                       $compl_insert_val .= ", '$this->tipo_codigo'";
                  } 
                  if ($this->tipo_imagen != "")
                  { 
                       $compl_insert     .= ", tipo_imagen";
                       $compl_insert_val .= ", '$this->tipo_imagen'";
                  } 
                  if ($this->altura != "")
                  { 
                       $compl_insert     .= ", altura";
                       $compl_insert_val .= ", $this->altura";
                  } 
                  if ($this->anchura != "")
                  { 
                       $compl_insert     .= ", anchura";
                       $compl_insert_val .= ", $this->anchura";
                  } 
                  if ($this->ver_codigo != "")
                  { 
                       $compl_insert     .= ", ver_codigo";
                       $compl_insert_val .= ", '$this->ver_codigo'";
                  } 
                  if ($this->ver_descripcion != "")
                  { 
                       $compl_insert     .= ", ver_descripcion";
                       $compl_insert_val .= ", '$this->ver_descripcion'";
                  } 
                  if ($this->ancho_descripcion != "")
                  { 
                       $compl_insert     .= ", ancho_descripcion";
                       $compl_insert_val .= ", $this->ancho_descripcion";
                  } 
                  if ($this->size_letra_codigo != "")
                  { 
                       $compl_insert     .= ", size_letra_codigo";
                       $compl_insert_val .= ", $this->size_letra_codigo";
                  } 
                  if ($this->size_letra_precio != "")
                  { 
                       $compl_insert     .= ", size_letra_precio";
                       $compl_insert_val .= ", $this->size_letra_precio";
                  } 
                  if ($this->size_letra_perso1 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso1";
                       $compl_insert_val .= ", $this->size_letra_perso1";
                  } 
                  if ($this->size_letra_perso2 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso2";
                       $compl_insert_val .= ", $this->size_letra_perso2";
                  } 
                  if ($this->size_letra_perso3 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso3";
                       $compl_insert_val .= ", $this->size_letra_perso3";
                  } 
                  if ($this->posicion_codigo != "")
                  { 
                       $compl_insert     .= ", posicion_codigo";
                       $compl_insert_val .= ", $this->posicion_codigo";
                  } 
                  if ($this->posicion_descripcion != "")
                  { 
                       $compl_insert     .= ", posicion_descripcion";
                       $compl_insert_val .= ", $this->posicion_descripcion";
                  } 
                  if ($this->posicion_precio != "")
                  { 
                       $compl_insert     .= ", posicion_precio";
                       $compl_insert_val .= ", $this->posicion_precio";
                  } 
                  if ($this->posicion_perso1 != "")
                  { 
                       $compl_insert     .= ", posicion_perso1";
                       $compl_insert_val .= ", $this->posicion_perso1";
                  } 
                  if ($this->posicion_perso2 != "")
                  { 
                       $compl_insert     .= ", posicion_perso2";
                       $compl_insert_val .= ", $this->posicion_perso2";
                  } 
                  if ($this->posicion_perso3 != "")
                  { 
                       $compl_insert     .= ", posicion_perso3";
                       $compl_insert_val .= ", $this->posicion_perso3";
                  } 
                  if ($this->alineacion != "")
                  { 
                       $compl_insert     .= ", alineacion";
                       $compl_insert_val .= ", '$this->alineacion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idfamilia, codigo, descripcion, precio, titulo, personalizado1, personalizado2, personalizado3, espaciado, nombre_configuracion, copias $compl_insert) VALUES (" . $NM_seq_auto . "$this->idfamilia, '$this->codigo', '$this->descripcion', '$this->precio', '$this->titulo', '$this->personalizado1', '$this->personalizado2', '$this->personalizado3', $this->espaciado, '$this->nombre_configuracion', $this->copias $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->size_letra_descripcion != "")
                  { 
                       $compl_insert     .= ", size_letra_descripcion";
                       $compl_insert_val .= ", $this->size_letra_descripcion";
                  } 
                  if ($this->tipo_letra != "")
                  { 
                       $compl_insert     .= ", tipo_letra";
                       $compl_insert_val .= ", '$this->tipo_letra'";
                  } 
                  if ($this->columnas != "")
                  { 
                       $compl_insert     .= ", columnas";
                       $compl_insert_val .= ", $this->columnas";
                  } 
                  if ($this->tipo_codigo != "")
                  { 
                       $compl_insert     .= ", tipo_codigo";
                       $compl_insert_val .= ", '$this->tipo_codigo'";
                  } 
                  if ($this->tipo_imagen != "")
                  { 
                       $compl_insert     .= ", tipo_imagen";
                       $compl_insert_val .= ", '$this->tipo_imagen'";
                  } 
                  if ($this->altura != "")
                  { 
                       $compl_insert     .= ", altura";
                       $compl_insert_val .= ", $this->altura";
                  } 
                  if ($this->anchura != "")
                  { 
                       $compl_insert     .= ", anchura";
                       $compl_insert_val .= ", $this->anchura";
                  } 
                  if ($this->ver_codigo != "")
                  { 
                       $compl_insert     .= ", ver_codigo";
                       $compl_insert_val .= ", '$this->ver_codigo'";
                  } 
                  if ($this->ver_descripcion != "")
                  { 
                       $compl_insert     .= ", ver_descripcion";
                       $compl_insert_val .= ", '$this->ver_descripcion'";
                  } 
                  if ($this->ancho_descripcion != "")
                  { 
                       $compl_insert     .= ", ancho_descripcion";
                       $compl_insert_val .= ", $this->ancho_descripcion";
                  } 
                  if ($this->size_letra_codigo != "")
                  { 
                       $compl_insert     .= ", size_letra_codigo";
                       $compl_insert_val .= ", $this->size_letra_codigo";
                  } 
                  if ($this->size_letra_precio != "")
                  { 
                       $compl_insert     .= ", size_letra_precio";
                       $compl_insert_val .= ", $this->size_letra_precio";
                  } 
                  if ($this->size_letra_perso1 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso1";
                       $compl_insert_val .= ", $this->size_letra_perso1";
                  } 
                  if ($this->size_letra_perso2 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso2";
                       $compl_insert_val .= ", $this->size_letra_perso2";
                  } 
                  if ($this->size_letra_perso3 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso3";
                       $compl_insert_val .= ", $this->size_letra_perso3";
                  } 
                  if ($this->posicion_codigo != "")
                  { 
                       $compl_insert     .= ", posicion_codigo";
                       $compl_insert_val .= ", $this->posicion_codigo";
                  } 
                  if ($this->posicion_descripcion != "")
                  { 
                       $compl_insert     .= ", posicion_descripcion";
                       $compl_insert_val .= ", $this->posicion_descripcion";
                  } 
                  if ($this->posicion_precio != "")
                  { 
                       $compl_insert     .= ", posicion_precio";
                       $compl_insert_val .= ", $this->posicion_precio";
                  } 
                  if ($this->posicion_perso1 != "")
                  { 
                       $compl_insert     .= ", posicion_perso1";
                       $compl_insert_val .= ", $this->posicion_perso1";
                  } 
                  if ($this->posicion_perso2 != "")
                  { 
                       $compl_insert     .= ", posicion_perso2";
                       $compl_insert_val .= ", $this->posicion_perso2";
                  } 
                  if ($this->posicion_perso3 != "")
                  { 
                       $compl_insert     .= ", posicion_perso3";
                       $compl_insert_val .= ", $this->posicion_perso3";
                  } 
                  if ($this->alineacion != "")
                  { 
                       $compl_insert     .= ", alineacion";
                       $compl_insert_val .= ", '$this->alineacion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idfamilia, codigo, descripcion, precio, titulo, personalizado1, personalizado2, personalizado3, espaciado, nombre_configuracion, copias $compl_insert) VALUES (" . $NM_seq_auto . "$this->idfamilia, '$this->codigo', '$this->descripcion', '$this->precio', '$this->titulo', '$this->personalizado1', '$this->personalizado2', '$this->personalizado3', $this->espaciado, '$this->nombre_configuracion', $this->copias $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->size_letra_descripcion != "")
                  { 
                       $compl_insert     .= ", size_letra_descripcion";
                       $compl_insert_val .= ", $this->size_letra_descripcion";
                  } 
                  if ($this->tipo_letra != "")
                  { 
                       $compl_insert     .= ", tipo_letra";
                       $compl_insert_val .= ", '$this->tipo_letra'";
                  } 
                  if ($this->columnas != "")
                  { 
                       $compl_insert     .= ", columnas";
                       $compl_insert_val .= ", $this->columnas";
                  } 
                  if ($this->tipo_codigo != "")
                  { 
                       $compl_insert     .= ", tipo_codigo";
                       $compl_insert_val .= ", '$this->tipo_codigo'";
                  } 
                  if ($this->tipo_imagen != "")
                  { 
                       $compl_insert     .= ", tipo_imagen";
                       $compl_insert_val .= ", '$this->tipo_imagen'";
                  } 
                  if ($this->altura != "")
                  { 
                       $compl_insert     .= ", altura";
                       $compl_insert_val .= ", $this->altura";
                  } 
                  if ($this->anchura != "")
                  { 
                       $compl_insert     .= ", anchura";
                       $compl_insert_val .= ", $this->anchura";
                  } 
                  if ($this->ver_codigo != "")
                  { 
                       $compl_insert     .= ", ver_codigo";
                       $compl_insert_val .= ", '$this->ver_codigo'";
                  } 
                  if ($this->ver_descripcion != "")
                  { 
                       $compl_insert     .= ", ver_descripcion";
                       $compl_insert_val .= ", '$this->ver_descripcion'";
                  } 
                  if ($this->ancho_descripcion != "")
                  { 
                       $compl_insert     .= ", ancho_descripcion";
                       $compl_insert_val .= ", $this->ancho_descripcion";
                  } 
                  if ($this->size_letra_codigo != "")
                  { 
                       $compl_insert     .= ", size_letra_codigo";
                       $compl_insert_val .= ", $this->size_letra_codigo";
                  } 
                  if ($this->size_letra_precio != "")
                  { 
                       $compl_insert     .= ", size_letra_precio";
                       $compl_insert_val .= ", $this->size_letra_precio";
                  } 
                  if ($this->size_letra_perso1 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso1";
                       $compl_insert_val .= ", $this->size_letra_perso1";
                  } 
                  if ($this->size_letra_perso2 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso2";
                       $compl_insert_val .= ", $this->size_letra_perso2";
                  } 
                  if ($this->size_letra_perso3 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso3";
                       $compl_insert_val .= ", $this->size_letra_perso3";
                  } 
                  if ($this->posicion_codigo != "")
                  { 
                       $compl_insert     .= ", posicion_codigo";
                       $compl_insert_val .= ", $this->posicion_codigo";
                  } 
                  if ($this->posicion_descripcion != "")
                  { 
                       $compl_insert     .= ", posicion_descripcion";
                       $compl_insert_val .= ", $this->posicion_descripcion";
                  } 
                  if ($this->posicion_precio != "")
                  { 
                       $compl_insert     .= ", posicion_precio";
                       $compl_insert_val .= ", $this->posicion_precio";
                  } 
                  if ($this->posicion_perso1 != "")
                  { 
                       $compl_insert     .= ", posicion_perso1";
                       $compl_insert_val .= ", $this->posicion_perso1";
                  } 
                  if ($this->posicion_perso2 != "")
                  { 
                       $compl_insert     .= ", posicion_perso2";
                       $compl_insert_val .= ", $this->posicion_perso2";
                  } 
                  if ($this->posicion_perso3 != "")
                  { 
                       $compl_insert     .= ", posicion_perso3";
                       $compl_insert_val .= ", $this->posicion_perso3";
                  } 
                  if ($this->alineacion != "")
                  { 
                       $compl_insert     .= ", alineacion";
                       $compl_insert_val .= ", '$this->alineacion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idfamilia, codigo, descripcion, precio, titulo, personalizado1, personalizado2, personalizado3, espaciado, nombre_configuracion, copias $compl_insert) VALUES (" . $NM_seq_auto . "$this->idfamilia, '$this->codigo', '$this->descripcion', '$this->precio', '$this->titulo', '$this->personalizado1', '$this->personalizado2', '$this->personalizado3', $this->espaciado, '$this->nombre_configuracion', $this->copias $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->size_letra_descripcion != "")
                  { 
                       $compl_insert     .= ", size_letra_descripcion";
                       $compl_insert_val .= ", $this->size_letra_descripcion";
                  } 
                  if ($this->tipo_letra != "")
                  { 
                       $compl_insert     .= ", tipo_letra";
                       $compl_insert_val .= ", '$this->tipo_letra'";
                  } 
                  if ($this->columnas != "")
                  { 
                       $compl_insert     .= ", columnas";
                       $compl_insert_val .= ", $this->columnas";
                  } 
                  if ($this->tipo_codigo != "")
                  { 
                       $compl_insert     .= ", tipo_codigo";
                       $compl_insert_val .= ", '$this->tipo_codigo'";
                  } 
                  if ($this->tipo_imagen != "")
                  { 
                       $compl_insert     .= ", tipo_imagen";
                       $compl_insert_val .= ", '$this->tipo_imagen'";
                  } 
                  if ($this->altura != "")
                  { 
                       $compl_insert     .= ", altura";
                       $compl_insert_val .= ", $this->altura";
                  } 
                  if ($this->anchura != "")
                  { 
                       $compl_insert     .= ", anchura";
                       $compl_insert_val .= ", $this->anchura";
                  } 
                  if ($this->ver_codigo != "")
                  { 
                       $compl_insert     .= ", ver_codigo";
                       $compl_insert_val .= ", '$this->ver_codigo'";
                  } 
                  if ($this->ver_descripcion != "")
                  { 
                       $compl_insert     .= ", ver_descripcion";
                       $compl_insert_val .= ", '$this->ver_descripcion'";
                  } 
                  if ($this->ancho_descripcion != "")
                  { 
                       $compl_insert     .= ", ancho_descripcion";
                       $compl_insert_val .= ", $this->ancho_descripcion";
                  } 
                  if ($this->size_letra_codigo != "")
                  { 
                       $compl_insert     .= ", size_letra_codigo";
                       $compl_insert_val .= ", $this->size_letra_codigo";
                  } 
                  if ($this->size_letra_precio != "")
                  { 
                       $compl_insert     .= ", size_letra_precio";
                       $compl_insert_val .= ", $this->size_letra_precio";
                  } 
                  if ($this->size_letra_perso1 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso1";
                       $compl_insert_val .= ", $this->size_letra_perso1";
                  } 
                  if ($this->size_letra_perso2 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso2";
                       $compl_insert_val .= ", $this->size_letra_perso2";
                  } 
                  if ($this->size_letra_perso3 != "")
                  { 
                       $compl_insert     .= ", size_letra_perso3";
                       $compl_insert_val .= ", $this->size_letra_perso3";
                  } 
                  if ($this->posicion_codigo != "")
                  { 
                       $compl_insert     .= ", posicion_codigo";
                       $compl_insert_val .= ", $this->posicion_codigo";
                  } 
                  if ($this->posicion_descripcion != "")
                  { 
                       $compl_insert     .= ", posicion_descripcion";
                       $compl_insert_val .= ", $this->posicion_descripcion";
                  } 
                  if ($this->posicion_precio != "")
                  { 
                       $compl_insert     .= ", posicion_precio";
                       $compl_insert_val .= ", $this->posicion_precio";
                  } 
                  if ($this->posicion_perso1 != "")
                  { 
                       $compl_insert     .= ", posicion_perso1";
                       $compl_insert_val .= ", $this->posicion_perso1";
                  } 
                  if ($this->posicion_perso2 != "")
                  { 
                       $compl_insert     .= ", posicion_perso2";
                       $compl_insert_val .= ", $this->posicion_perso2";
                  } 
                  if ($this->posicion_perso3 != "")
                  { 
                       $compl_insert     .= ", posicion_perso3";
                       $compl_insert_val .= ", $this->posicion_perso3";
                  } 
                  if ($this->alineacion != "")
                  { 
                       $compl_insert     .= ", alineacion";
                       $compl_insert_val .= ", '$this->alineacion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idfamilia, codigo, descripcion, precio, titulo, personalizado1, personalizado2, personalizado3, espaciado, nombre_configuracion, copias $compl_insert) VALUES (" . $NM_seq_auto . "$this->idfamilia, '$this->codigo', '$this->descripcion', '$this->precio', '$this->titulo', '$this->personalizado1', '$this->personalizado2', '$this->personalizado3', $this->espaciado, '$this->nombre_configuracion', $this->copias $compl_insert_val)"; 
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
                              form_etiquetas_pack_ajax_response();
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
                          form_etiquetas_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->idetiqueta =  $rsy->fields[0];
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
                  $this->idetiqueta = $rsy->fields[0];
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
                  $this->idetiqueta = $rsy->fields[0];
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
                  $this->idetiqueta = $rsy->fields[0];
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
                  $this->idetiqueta = $rsy->fields[0];
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
                  $this->idetiqueta = $rsy->fields[0];
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
                  $this->idetiqueta = $rsy->fields[0];
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
                  $this->idetiqueta = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->codigo = $this->codigo_before_qstr;
              $this->descripcion = $this->descripcion_before_qstr;
              $this->tipo_letra = $this->tipo_letra_before_qstr;
              $this->tipo_codigo = $this->tipo_codigo_before_qstr;
              $this->tipo_imagen = $this->tipo_imagen_before_qstr;
              $this->precio = $this->precio_before_qstr;
              $this->ver_codigo = $this->ver_codigo_before_qstr;
              $this->ver_descripcion = $this->ver_descripcion_before_qstr;
              $this->titulo = $this->titulo_before_qstr;
              $this->personalizado1 = $this->personalizado1_before_qstr;
              $this->personalizado2 = $this->personalizado2_before_qstr;
              $this->personalizado3 = $this->personalizado3_before_qstr;
              $this->alineacion = $this->alineacion_before_qstr;
              $this->nombre_configuracion = $this->nombre_configuracion_before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->codigo = $this->codigo_before_qstr;
              $this->descripcion = $this->descripcion_before_qstr;
              $this->tipo_letra = $this->tipo_letra_before_qstr;
              $this->tipo_codigo = $this->tipo_codigo_before_qstr;
              $this->tipo_imagen = $this->tipo_imagen_before_qstr;
              $this->precio = $this->precio_before_qstr;
              $this->ver_codigo = $this->ver_codigo_before_qstr;
              $this->ver_descripcion = $this->ver_descripcion_before_qstr;
              $this->titulo = $this->titulo_before_qstr;
              $this->personalizado1 = $this->personalizado1_before_qstr;
              $this->personalizado2 = $this->personalizado2_before_qstr;
              $this->personalizado3 = $this->personalizado3_before_qstr;
              $this->alineacion = $this->alineacion_before_qstr;
              $this->nombre_configuracion = $this->nombre_configuracion_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->idetiqueta = substr($this->Db->qstr($this->idetiqueta), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idetiqueta = $this->idetiqueta "); 
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
                          form_etiquetas_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['total']);
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['parms'] = "idetiqueta?#?$this->idetiqueta?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idetiqueta = null === $this->idetiqueta ? null : substr($this->Db->qstr($this->idetiqueta), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->idetiqueta)) 
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
      if ($this->nmgp_opcao != "nada" && (trim($this->idetiqueta) == "")) 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] == "F" && $this->sc_evento == "insert")
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_etiquetas = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['total'] = $qt_geral_reg_form_etiquetas;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->idetiqueta))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "idetiqueta < $this->idetiqueta "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "idetiqueta < $this->idetiqueta "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "idetiqueta < $this->idetiqueta "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "idetiqueta < $this->idetiqueta "; 
              }
              else  
              {
                  $Key_Where = "idetiqueta < $this->idetiqueta "; 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_etiquetas = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start'] > $qt_geral_reg_form_etiquetas)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start'] = $qt_geral_reg_form_etiquetas; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start'] = $qt_geral_reg_form_etiquetas; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_etiquetas) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT idetiqueta, idfamilia, codigo, descripcion, size_letra_descripcion, tipo_letra, columnas, tipo_codigo, tipo_imagen, altura, anchura, precio, ver_codigo, ver_descripcion, titulo, personalizado1, personalizado2, personalizado3, espaciado, ancho_descripcion, size_letra_codigo, size_letra_precio, size_letra_perso1, size_letra_perso2, size_letra_perso3, posicion_codigo, posicion_descripcion, posicion_precio, posicion_perso1, posicion_perso2, posicion_perso3, alineacion, nombre_configuracion, copias from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT idetiqueta, idfamilia, codigo, descripcion, size_letra_descripcion, tipo_letra, columnas, tipo_codigo, tipo_imagen, altura, anchura, precio, ver_codigo, ver_descripcion, titulo, personalizado1, personalizado2, personalizado3, espaciado, ancho_descripcion, size_letra_codigo, size_letra_precio, size_letra_perso1, size_letra_perso2, size_letra_perso3, posicion_codigo, posicion_descripcion, posicion_precio, posicion_perso1, posicion_perso2, posicion_perso3, alineacion, nombre_configuracion, copias from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT idetiqueta, idfamilia, codigo, descripcion, size_letra_descripcion, tipo_letra, columnas, tipo_codigo, tipo_imagen, altura, anchura, precio, ver_codigo, ver_descripcion, titulo, personalizado1, personalizado2, personalizado3, espaciado, ancho_descripcion, size_letra_codigo, size_letra_precio, size_letra_perso1, size_letra_perso2, size_letra_perso3, posicion_codigo, posicion_descripcion, posicion_precio, posicion_perso1, posicion_perso2, posicion_perso3, alineacion, nombre_configuracion, copias from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT idetiqueta, idfamilia, codigo, descripcion, size_letra_descripcion, tipo_letra, columnas, tipo_codigo, tipo_imagen, altura, anchura, precio, ver_codigo, ver_descripcion, titulo, personalizado1, personalizado2, personalizado3, espaciado, ancho_descripcion, size_letra_codigo, size_letra_precio, size_letra_perso1, size_letra_perso2, size_letra_perso3, posicion_codigo, posicion_descripcion, posicion_precio, posicion_perso1, posicion_perso2, posicion_perso3, alineacion, nombre_configuracion, copias from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT idetiqueta, idfamilia, codigo, descripcion, size_letra_descripcion, tipo_letra, columnas, tipo_codigo, tipo_imagen, altura, anchura, precio, ver_codigo, ver_descripcion, titulo, personalizado1, personalizado2, personalizado3, espaciado, ancho_descripcion, size_letra_codigo, size_letra_precio, size_letra_perso1, size_letra_perso2, size_letra_perso3, posicion_codigo, posicion_descripcion, posicion_precio, posicion_perso1, posicion_perso2, posicion_perso3, alineacion, nombre_configuracion, copias from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "idetiqueta = $this->idetiqueta"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "idetiqueta = $this->idetiqueta"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "idetiqueta = $this->idetiqueta"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "idetiqueta = $this->idetiqueta"; 
              }  
              else  
              {
                  $aWhere[] = "idetiqueta = $this->idetiqueta"; 
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
          $sc_order_by = "idetiqueta";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['empty_filter'] = true;
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
              $this->idetiqueta = $rs->fields[0] ; 
              $this->nmgp_dados_select['idetiqueta'] = $this->idetiqueta;
              $this->idfamilia = $rs->fields[1] ; 
              $this->nmgp_dados_select['idfamilia'] = $this->idfamilia;
              $this->codigo = $rs->fields[2] ; 
              $this->nmgp_dados_select['codigo'] = $this->codigo;
              $this->descripcion = $rs->fields[3] ; 
              $this->nmgp_dados_select['descripcion'] = $this->descripcion;
              $this->size_letra_descripcion = $rs->fields[4] ; 
              $this->nmgp_dados_select['size_letra_descripcion'] = $this->size_letra_descripcion;
              $this->tipo_letra = $rs->fields[5] ; 
              $this->nmgp_dados_select['tipo_letra'] = $this->tipo_letra;
              $this->columnas = $rs->fields[6] ; 
              $this->nmgp_dados_select['columnas'] = $this->columnas;
              $this->tipo_codigo = $rs->fields[7] ; 
              $this->nmgp_dados_select['tipo_codigo'] = $this->tipo_codigo;
              $this->tipo_imagen = $rs->fields[8] ; 
              $this->nmgp_dados_select['tipo_imagen'] = $this->tipo_imagen;
              $this->altura = $rs->fields[9] ; 
              $this->nmgp_dados_select['altura'] = $this->altura;
              $this->anchura = $rs->fields[10] ; 
              $this->nmgp_dados_select['anchura'] = $this->anchura;
              $this->precio = $rs->fields[11] ; 
              $this->nmgp_dados_select['precio'] = $this->precio;
              $this->ver_codigo = $rs->fields[12] ; 
              $this->nmgp_dados_select['ver_codigo'] = $this->ver_codigo;
              $this->ver_descripcion = $rs->fields[13] ; 
              $this->nmgp_dados_select['ver_descripcion'] = $this->ver_descripcion;
              $this->titulo = $rs->fields[14] ; 
              $this->nmgp_dados_select['titulo'] = $this->titulo;
              $this->personalizado1 = $rs->fields[15] ; 
              $this->nmgp_dados_select['personalizado1'] = $this->personalizado1;
              $this->personalizado2 = $rs->fields[16] ; 
              $this->nmgp_dados_select['personalizado2'] = $this->personalizado2;
              $this->personalizado3 = $rs->fields[17] ; 
              $this->nmgp_dados_select['personalizado3'] = $this->personalizado3;
              $this->espaciado = trim($rs->fields[18]) ; 
              $this->nmgp_dados_select['espaciado'] = $this->espaciado;
              $this->ancho_descripcion = $rs->fields[19] ; 
              $this->nmgp_dados_select['ancho_descripcion'] = $this->ancho_descripcion;
              $this->size_letra_codigo = $rs->fields[20] ; 
              $this->nmgp_dados_select['size_letra_codigo'] = $this->size_letra_codigo;
              $this->size_letra_precio = $rs->fields[21] ; 
              $this->nmgp_dados_select['size_letra_precio'] = $this->size_letra_precio;
              $this->size_letra_perso1 = $rs->fields[22] ; 
              $this->nmgp_dados_select['size_letra_perso1'] = $this->size_letra_perso1;
              $this->size_letra_perso2 = $rs->fields[23] ; 
              $this->nmgp_dados_select['size_letra_perso2'] = $this->size_letra_perso2;
              $this->size_letra_perso3 = $rs->fields[24] ; 
              $this->nmgp_dados_select['size_letra_perso3'] = $this->size_letra_perso3;
              $this->posicion_codigo = $rs->fields[25] ; 
              $this->nmgp_dados_select['posicion_codigo'] = $this->posicion_codigo;
              $this->posicion_descripcion = $rs->fields[26] ; 
              $this->nmgp_dados_select['posicion_descripcion'] = $this->posicion_descripcion;
              $this->posicion_precio = $rs->fields[27] ; 
              $this->nmgp_dados_select['posicion_precio'] = $this->posicion_precio;
              $this->posicion_perso1 = $rs->fields[28] ; 
              $this->nmgp_dados_select['posicion_perso1'] = $this->posicion_perso1;
              $this->posicion_perso2 = $rs->fields[29] ; 
              $this->nmgp_dados_select['posicion_perso2'] = $this->posicion_perso2;
              $this->posicion_perso3 = $rs->fields[30] ; 
              $this->nmgp_dados_select['posicion_perso3'] = $this->posicion_perso3;
              $this->alineacion = $rs->fields[31] ; 
              $this->nmgp_dados_select['alineacion'] = $this->alineacion;
              $this->nombre_configuracion = $rs->fields[32] ; 
              $this->nmgp_dados_select['nombre_configuracion'] = $this->nombre_configuracion;
              $this->copias = $rs->fields[33] ; 
              $this->nmgp_dados_select['copias'] = $this->copias;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->idetiqueta = (string)$this->idetiqueta; 
              $this->idfamilia = (string)$this->idfamilia; 
              $this->size_letra_descripcion = (string)$this->size_letra_descripcion; 
              $this->columnas = (string)$this->columnas; 
              $this->altura = (string)$this->altura; 
              $this->anchura = (string)$this->anchura; 
              $this->espaciado = (strpos(strtolower($this->espaciado), "e")) ? (float)$this->espaciado : $this->espaciado; 
              $this->espaciado = (string)$this->espaciado; 
              $this->ancho_descripcion = (string)$this->ancho_descripcion; 
              $this->size_letra_codigo = (string)$this->size_letra_codigo; 
              $this->size_letra_precio = (string)$this->size_letra_precio; 
              $this->size_letra_perso1 = (string)$this->size_letra_perso1; 
              $this->size_letra_perso2 = (string)$this->size_letra_perso2; 
              $this->size_letra_perso3 = (string)$this->size_letra_perso3; 
              $this->posicion_codigo = (string)$this->posicion_codigo; 
              $this->posicion_descripcion = (string)$this->posicion_descripcion; 
              $this->posicion_precio = (string)$this->posicion_precio; 
              $this->posicion_perso1 = (string)$this->posicion_perso1; 
              $this->posicion_perso2 = (string)$this->posicion_perso2; 
              $this->posicion_perso3 = (string)$this->posicion_perso3; 
              $this->copias = (string)$this->copias; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['parms'] = "idetiqueta?#?$this->idetiqueta?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start'] < $qt_geral_reg_form_etiquetas;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['opcao']   = '';
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
              $this->idetiqueta = "";  
              $this->nmgp_dados_form["idetiqueta"] = $this->idetiqueta;
              $this->idfamilia = "";  
              $this->nmgp_dados_form["idfamilia"] = $this->idfamilia;
              $this->codigo = "";  
              $this->nmgp_dados_form["codigo"] = $this->codigo;
              $this->descripcion = "";  
              $this->nmgp_dados_form["descripcion"] = $this->descripcion;
              $this->size_letra_descripcion = "12";  
              $this->nmgp_dados_form["size_letra_descripcion"] = $this->size_letra_descripcion;
              $this->tipo_letra = "Arial";  
              $this->nmgp_dados_form["tipo_letra"] = $this->tipo_letra;
              $this->columnas = "1";  
              $this->nmgp_dados_form["columnas"] = $this->columnas;
              $this->tipo_codigo = "TYPE_CODE_128";  
              $this->nmgp_dados_form["tipo_codigo"] = $this->tipo_codigo;
              $this->tipo_imagen = "BarcodeGeneratorPNG";  
              $this->nmgp_dados_form["tipo_imagen"] = $this->tipo_imagen;
              $this->altura = "40";  
              $this->nmgp_dados_form["altura"] = $this->altura;
              $this->anchura = "80";  
              $this->nmgp_dados_form["anchura"] = $this->anchura;
              $this->precio = "";  
              $this->nmgp_dados_form["precio"] = $this->precio;
              $this->ver_codigo = "SI";  
              $this->nmgp_dados_form["ver_codigo"] = $this->ver_codigo;
              $this->ver_descripcion = "SI";  
              $this->nmgp_dados_form["ver_descripcion"] = $this->ver_descripcion;
              $this->titulo = "";  
              $this->nmgp_dados_form["titulo"] = $this->titulo;
              $this->personalizado1 = "";  
              $this->nmgp_dados_form["personalizado1"] = $this->personalizado1;
              $this->personalizado2 = "";  
              $this->nmgp_dados_form["personalizado2"] = $this->personalizado2;
              $this->personalizado3 = "";  
              $this->nmgp_dados_form["personalizado3"] = $this->personalizado3;
              $this->espaciado = "0.25";  
              $this->nmgp_dados_form["espaciado"] = $this->espaciado;
              $this->ancho_descripcion = "80";  
              $this->nmgp_dados_form["ancho_descripcion"] = $this->ancho_descripcion;
              $this->size_letra_codigo = "12";  
              $this->nmgp_dados_form["size_letra_codigo"] = $this->size_letra_codigo;
              $this->size_letra_precio = "12";  
              $this->nmgp_dados_form["size_letra_precio"] = $this->size_letra_precio;
              $this->size_letra_perso1 = "12";  
              $this->nmgp_dados_form["size_letra_perso1"] = $this->size_letra_perso1;
              $this->size_letra_perso2 = "12";  
              $this->nmgp_dados_form["size_letra_perso2"] = $this->size_letra_perso2;
              $this->size_letra_perso3 = "12";  
              $this->nmgp_dados_form["size_letra_perso3"] = $this->size_letra_perso3;
              $this->posicion_codigo = "1";  
              $this->nmgp_dados_form["posicion_codigo"] = $this->posicion_codigo;
              $this->posicion_descripcion = "2";  
              $this->nmgp_dados_form["posicion_descripcion"] = $this->posicion_descripcion;
              $this->posicion_precio = "3";  
              $this->nmgp_dados_form["posicion_precio"] = $this->posicion_precio;
              $this->posicion_perso1 = "4";  
              $this->nmgp_dados_form["posicion_perso1"] = $this->posicion_perso1;
              $this->posicion_perso2 = "5";  
              $this->nmgp_dados_form["posicion_perso2"] = $this->posicion_perso2;
              $this->posicion_perso3 = "6";  
              $this->nmgp_dados_form["posicion_perso3"] = $this->posicion_perso3;
              $this->alineacion = "center";  
              $this->nmgp_dados_form["alineacion"] = $this->alineacion;
              $this->nombre_configuracion = "";  
              $this->nmgp_dados_form["nombre_configuracion"] = $this->nombre_configuracion;
              $this->copias = "1";  
              $this->nmgp_dados_form["copias"] = $this->copias;
              $this->nompro = "";  
              $this->nmgp_dados_form["nompro"] = $this->nompro;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['foreign_key'] as $sFKName => $sFKValue)
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
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idetiqueta) from " . $this->Ini->nm_tabela . " where idetiqueta < $this->idetiqueta" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idetiqueta) from " . $this->Ini->nm_tabela . " where idetiqueta < $this->idetiqueta" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idetiqueta) from " . $this->Ini->nm_tabela . " where idetiqueta < $this->idetiqueta" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idetiqueta) from " . $this->Ini->nm_tabela . " where idetiqueta < $this->idetiqueta" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idetiqueta) from " . $this->Ini->nm_tabela . " where idetiqueta < $this->idetiqueta" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idetiqueta) from " . $this->Ini->nm_tabela . " where idetiqueta < $this->idetiqueta" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idetiqueta) from " . $this->Ini->nm_tabela . " where idetiqueta < $this->idetiqueta" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idetiqueta) from " . $this->Ini->nm_tabela . " where idetiqueta < $this->idetiqueta" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idetiqueta) from " . $this->Ini->nm_tabela . " where idetiqueta < $this->idetiqueta" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idetiqueta) from " . $this->Ini->nm_tabela . " where idetiqueta < $this->idetiqueta" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idetiqueta = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idetiqueta) from " . $this->Ini->nm_tabela . " where idetiqueta > $this->idetiqueta" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idetiqueta) from " . $this->Ini->nm_tabela . " where idetiqueta > $this->idetiqueta" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idetiqueta) from " . $this->Ini->nm_tabela . " where idetiqueta > $this->idetiqueta" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idetiqueta) from " . $this->Ini->nm_tabela . " where idetiqueta > $this->idetiqueta" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idetiqueta) from " . $this->Ini->nm_tabela . " where idetiqueta > $this->idetiqueta" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idetiqueta) from " . $this->Ini->nm_tabela . " where idetiqueta > $this->idetiqueta" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idetiqueta) from " . $this->Ini->nm_tabela . " where idetiqueta > $this->idetiqueta" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idetiqueta) from " . $this->Ini->nm_tabela . " where idetiqueta > $this->idetiqueta" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idetiqueta) from " . $this->Ini->nm_tabela . " where idetiqueta > $this->idetiqueta" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idetiqueta) from " . $this->Ini->nm_tabela . " where idetiqueta > $this->idetiqueta" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->idetiqueta = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idetiqueta) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idetiqueta) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idetiqueta) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idetiqueta) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idetiqueta) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idetiqueta) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idetiqueta) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idetiqueta) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(idetiqueta) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(idetiqueta) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_filter']))
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
     $this->idetiqueta = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idetiqueta) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idetiqueta) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idetiqueta) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idetiqueta) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idetiqueta) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idetiqueta) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idetiqueta) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idetiqueta) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(idetiqueta) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(idetiqueta) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
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
     $this->idetiqueta = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
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
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['reg_start'] + 1;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function codigo_onChange()
{
$_SESSION['scriptcase']['form_etiquetas']['contr_erro'] = 'on';
  
$original_codigo = $this->codigo;
$original_nompro = $this->nompro;

$vsql = "select nompro from productos where codigobar='".$this->codigo ."'";
 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDesc = array();
      $this->vdesc = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vDesc[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vdesc[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDesc = false;
          $this->vDesc_erro = $this->Db->ErrorMsg();
          $this->vdesc = false;
          $this->vdesc_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vdesc[0][0]))
{
	$this->nompro  = $this->vdesc[0][0];
}

$modificado_codigo = $this->codigo;
$modificado_nompro = $this->nompro;
$this->nm_formatar_campos('codigo', 'nompro');
if ($original_codigo !== $modificado_codigo || isset($this->nmgp_cmp_readonly['codigo']) || (isset($bFlagRead_codigo) && $bFlagRead_codigo))
{
    $this->ajax_return_values_codigo(true);
}
if ($original_nompro !== $modificado_nompro || isset($this->nmgp_cmp_readonly['nompro']) || (isset($bFlagRead_nompro) && $bFlagRead_nompro))
{
    $this->ajax_return_values_nompro(true);
}
$this->NM_ajax_info['event_field'] = 'codigo';
form_etiquetas_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_etiquetas']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_etiquetas_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_etiquetas_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("idetiqueta", "idfamilia", "codigo", "descripcion", "size_letra_descripcion", "tipo_letra", "columnas", "tipo_codigo", "tipo_imagen", "altura", "anchura", "precio", "ver_codigo", "ver_descripcion", "titulo", "personalizado1", "personalizado2", "personalizado3", "espaciado", "ancho_descripcion", "size_letra_codigo", "size_letra_precio", "size_letra_perso1", "size_letra_perso2", "size_letra_perso3", "posicion_codigo", "posicion_descripcion", "posicion_precio", "posicion_perso1", "posicion_perso2", "posicion_perso3", "alineacion", "nombre_configuracion"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['csrf_token'];
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

   function Form_lookup_idfamilia()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia'] = array(); 
    }

   $old_value_idetiqueta = $this->idetiqueta;
   $old_value_size_letra_descripcion = $this->size_letra_descripcion;
   $old_value_columnas = $this->columnas;
   $old_value_altura = $this->altura;
   $old_value_anchura = $this->anchura;
   $old_value_espaciado = $this->espaciado;
   $old_value_ancho_descripcion = $this->ancho_descripcion;
   $old_value_size_letra_codigo = $this->size_letra_codigo;
   $old_value_size_letra_precio = $this->size_letra_precio;
   $old_value_size_letra_perso1 = $this->size_letra_perso1;
   $old_value_size_letra_perso2 = $this->size_letra_perso2;
   $old_value_size_letra_perso3 = $this->size_letra_perso3;
   $old_value_posicion_codigo = $this->posicion_codigo;
   $old_value_posicion_descripcion = $this->posicion_descripcion;
   $old_value_posicion_precio = $this->posicion_precio;
   $old_value_posicion_perso1 = $this->posicion_perso1;
   $old_value_posicion_perso2 = $this->posicion_perso2;
   $old_value_posicion_perso3 = $this->posicion_perso3;
   $old_value_copias = $this->copias;
   $this->nm_tira_formatacao();


   $unformatted_value_idetiqueta = $this->idetiqueta;
   $unformatted_value_size_letra_descripcion = $this->size_letra_descripcion;
   $unformatted_value_columnas = $this->columnas;
   $unformatted_value_altura = $this->altura;
   $unformatted_value_anchura = $this->anchura;
   $unformatted_value_espaciado = $this->espaciado;
   $unformatted_value_ancho_descripcion = $this->ancho_descripcion;
   $unformatted_value_size_letra_codigo = $this->size_letra_codigo;
   $unformatted_value_size_letra_precio = $this->size_letra_precio;
   $unformatted_value_size_letra_perso1 = $this->size_letra_perso1;
   $unformatted_value_size_letra_perso2 = $this->size_letra_perso2;
   $unformatted_value_size_letra_perso3 = $this->size_letra_perso3;
   $unformatted_value_posicion_codigo = $this->posicion_codigo;
   $unformatted_value_posicion_descripcion = $this->posicion_descripcion;
   $unformatted_value_posicion_precio = $this->posicion_precio;
   $unformatted_value_posicion_perso1 = $this->posicion_perso1;
   $unformatted_value_posicion_perso2 = $this->posicion_perso2;
   $unformatted_value_posicion_perso3 = $this->posicion_perso3;
   $unformatted_value_copias = $this->copias;

   $ver_codigo_val_str = "''";
   if (!empty($this->ver_codigo))
   {
       if (is_array($this->ver_codigo))
       {
           $Tmp_array = $this->ver_codigo;
       }
       else
       {
           $Tmp_array = explode(";", $this->ver_codigo);
       }
       $ver_codigo_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ver_codigo_val_str)
          {
             $ver_codigo_val_str .= ", ";
          }
          $ver_codigo_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $ver_descripcion_val_str = "''";
   if (!empty($this->ver_descripcion))
   {
       if (is_array($this->ver_descripcion))
       {
           $Tmp_array = $this->ver_descripcion;
       }
       else
       {
           $Tmp_array = explode(";", $this->ver_descripcion);
       }
       $ver_descripcion_val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $ver_descripcion_val_str)
          {
             $ver_descripcion_val_str .= ", ";
          }
          $ver_descripcion_val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT idgrupo, nomgrupo  FROM grupo  ORDER BY nomgrupo";

   $this->idetiqueta = $old_value_idetiqueta;
   $this->size_letra_descripcion = $old_value_size_letra_descripcion;
   $this->columnas = $old_value_columnas;
   $this->altura = $old_value_altura;
   $this->anchura = $old_value_anchura;
   $this->espaciado = $old_value_espaciado;
   $this->ancho_descripcion = $old_value_ancho_descripcion;
   $this->size_letra_codigo = $old_value_size_letra_codigo;
   $this->size_letra_precio = $old_value_size_letra_precio;
   $this->size_letra_perso1 = $old_value_size_letra_perso1;
   $this->size_letra_perso2 = $old_value_size_letra_perso2;
   $this->size_letra_perso3 = $old_value_size_letra_perso3;
   $this->posicion_codigo = $old_value_posicion_codigo;
   $this->posicion_descripcion = $old_value_posicion_descripcion;
   $this->posicion_precio = $old_value_posicion_precio;
   $this->posicion_perso1 = $old_value_posicion_perso1;
   $this->posicion_perso2 = $old_value_posicion_perso2;
   $this->posicion_perso3 = $old_value_posicion_perso3;
   $this->copias = $old_value_copias;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['Lookup_idfamilia'][] = $rs->fields[0];
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
   function Form_lookup_tipo_letra()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Arial?#?Arial?#??@?";
       $nmgp_def_dados .= "Helvetica?#?Helvetica?#??@?";
       $nmgp_def_dados .= "sans-serif?#?sans?#??@?";
       $nmgp_def_dados .= "Tahoma?#?Tahoma?#??@?";
       $nmgp_def_dados .= "Georgia?#?Georgia?#??@?";
       $nmgp_def_dados .= "Verdana?#?Verdana?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_tipo_codigo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "TYPE_EAN_13?#?TYPE_EAN_13?#??@?";
       $nmgp_def_dados .= "TYPE_EAN_8?#?TYPE_EAN_8?#??@?";
       $nmgp_def_dados .= "TYPE_EAN_5?#?TYPE_EAN_5?#??@?";
       $nmgp_def_dados .= "TYPE_CODE_39?#?TYPE_CODE_39?#??@?";
       $nmgp_def_dados .= "TYPE_CODE_128?#?TYPE_CODE_128?#??@?";
       $nmgp_def_dados .= "TYPE_CODE_11?#?TYPE_CODE_11?#??@?";
       $nmgp_def_dados .= "TYPE_PHARMA_CODE?#?TYPE_PHARMA_CODE?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_tipo_imagen()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "PNG?#?BarcodeGeneratorPNG?#??@?";
       $nmgp_def_dados .= "SVG?#?BarcodeGeneratorSVG?#??@?";
       $nmgp_def_dados .= "JPG?#?BarcodeGeneratorJPG?#??@?";
       $nmgp_def_dados .= "HTML?#?BarcodeGeneratorHTML?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_precio()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "PRECIO1?#?preciomen?#??@?";
       $nmgp_def_dados .= "PRECIO2?#?preciomen2?#??@?";
       $nmgp_def_dados .= "PRECIO3?#?preciomen3?#??@?";
       $nmgp_def_dados .= "PRECIOM1?#?preciofull?#??@?";
       $nmgp_def_dados .= "PRECIOM2?#?precio2?#??@?";
       $nmgp_def_dados .= "PRECIOM3?#?preciomay?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_ver_codigo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_ver_descripcion()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_alineacion()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "CENTER?#?center?#?N?@?";
       $nmgp_def_dados .= "LEFT?#?left?#?N?@?";
       $nmgp_def_dados .= "RIGHT?#?right?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_etiquetas_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "idetiqueta", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_idfamilia($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "idfamilia", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "codigo", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "descripcion", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "size_letra_descripcion", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_tipo_letra($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "tipo_letra", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "columnas", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_tipo_codigo($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "tipo_codigo", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_tipo_imagen($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "tipo_imagen", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "altura", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "anchura", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_precio($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "precio", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_ver_codigo($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "ver_codigo", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_ver_descripcion($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "ver_descripcion", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "titulo", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "personalizado1", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "personalizado2", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "personalizado3", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "espaciado", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ancho_descripcion", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "size_letra_codigo", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "size_letra_precio", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "size_letra_perso1", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "size_letra_perso2", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "size_letra_perso3", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "posicion_codigo", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "posicion_descripcion", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "posicion_precio", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "posicion_perso1", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "posicion_perso2", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "posicion_perso3", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_alineacion($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "alineacion", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nombre_configuracion", $arg_search, $data_search);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_etiquetas = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['total'] = $qt_geral_reg_form_etiquetas;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_etiquetas_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_etiquetas_pack_ajax_response();
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
      $nm_numeric[] = "idetiqueta";$nm_numeric[] = "idfamilia";$nm_numeric[] = "size_letra_descripcion";$nm_numeric[] = "columnas";$nm_numeric[] = "altura";$nm_numeric[] = "anchura";$nm_numeric[] = "espaciado";$nm_numeric[] = "ancho_descripcion";$nm_numeric[] = "size_letra_codigo";$nm_numeric[] = "size_letra_precio";$nm_numeric[] = "size_letra_perso1";$nm_numeric[] = "size_letra_perso2";$nm_numeric[] = "size_letra_perso3";$nm_numeric[] = "posicion_codigo";$nm_numeric[] = "posicion_descripcion";$nm_numeric[] = "posicion_precio";$nm_numeric[] = "posicion_perso1";$nm_numeric[] = "posicion_perso2";$nm_numeric[] = "posicion_perso3";$nm_numeric[] = "copias";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['decimal_db'] == ".")
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
   function SC_lookup_idfamilia($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT nomgrupo, idgrupo FROM grupo WHERE (nomgrupo LIKE '%$campo%')" ; 
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
   function SC_lookup_tipo_letra($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['Arial'] = "Arial";
       $data_look['Helvetica'] = "Helvetica";
       $data_look['sans'] = "sans-serif";
       $data_look['Tahoma'] = "Tahoma";
       $data_look['Georgia'] = "Georgia";
       $data_look['Verdana'] = "Verdana";
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
   function SC_lookup_tipo_codigo($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['TYPE_EAN_13'] = "TYPE_EAN_13";
       $data_look['TYPE_EAN_8'] = "TYPE_EAN_8";
       $data_look['TYPE_EAN_5'] = "TYPE_EAN_5";
       $data_look['TYPE_CODE_39'] = "TYPE_CODE_39";
       $data_look['TYPE_CODE_128'] = "TYPE_CODE_128";
       $data_look['TYPE_CODE_11'] = "TYPE_CODE_11";
       $data_look['TYPE_PHARMA_CODE'] = "TYPE_PHARMA_CODE";
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
   function SC_lookup_tipo_imagen($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['BarcodeGeneratorPNG'] = "PNG";
       $data_look['BarcodeGeneratorSVG'] = "SVG";
       $data_look['BarcodeGeneratorJPG'] = "JPG";
       $data_look['BarcodeGeneratorHTML'] = "HTML";
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
   function SC_lookup_precio($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['preciomen'] = "PRECIO1";
       $data_look['preciomen2'] = "PRECIO2";
       $data_look['preciomen3'] = "PRECIO3";
       $data_look['preciofull'] = "PRECIOM1";
       $data_look['precio2'] = "PRECIOM2";
       $data_look['preciomay'] = "PRECIOM3";
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
   function SC_lookup_ver_codigo($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
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
   function SC_lookup_ver_descripcion($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
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
   function SC_lookup_alineacion($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['center'] = "CENTER";
       $data_look['left'] = "LEFT";
       $data_look['right'] = "RIGHT";
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
       $nmgp_saida_form = "form_etiquetas_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_etiquetas_fim.php";
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
       form_etiquetas_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_etiquetas']['masterValue']);
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
