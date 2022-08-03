<?php
//
class seg_login_apl
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
   var $empresa;
   var $empresa_1;
   var $login;
   var $pswd;
   var $nit;
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
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['bok']))
          {
              $this->bok = $this->NM_ajax_info['param']['bok'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['empresa']))
          {
              $this->empresa = $this->NM_ajax_info['param']['empresa'];
          }
          if (isset($this->NM_ajax_info['param']['login']))
          {
              $this->login = $this->NM_ajax_info['param']['login'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['pswd']))
          {
              $this->pswd = $this->NM_ajax_info['param']['pswd'];
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
      if (isset($this->usr_login) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($this->usr_iduser) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_iduser'] = $this->usr_iduser;
      }
      if (isset($this->usr_name) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_name'] = $this->usr_name;
      }
      if (isset($this->usr_grupo) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_grupo'] = $this->usr_grupo;
      }
      if (isset($this->usr_database) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_database'] = $this->usr_database;
      }
      if (isset($this->gOS) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gOS'] = $this->gOS;
      }
      if (isset($this->gnombreusuario) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gnombreusuario'] = $this->gnombreusuario;
      }
      if (isset($this->gidtercero) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gidtercero'] = $this->gidtercero;
      }
      if (isset($this->gidbanco) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gidbanco'] = $this->gidbanco;
      }
      if (isset($this->gidresolucion) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gidresolucion'] = $this->gidresolucion;
      }
      if (isset($this->gusuariologueado) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gusuariologueado'] = $this->gusuariologueado;
      }
      if (isset($this->gusuario_logueo) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gusuario_logueo'] = $this->gusuario_logueo;
      }
      if (isset($this->glineasporfactura) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['glineasporfactura'] = $this->glineasporfactura;
      }
      if (isset($this->gconsolidararticulos) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gconsolidararticulos'] = $this->gconsolidararticulos;
      }
      if (isset($this->gespaciadodetallefactura) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gespaciadodetallefactura'] = $this->gespaciadodetallefactura;
      }
      if (isset($this->gserialguardado) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gserialguardado'] = $this->gserialguardado;
      }
      if (isset($this->gnombre_archivo_empresa) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gnombre_archivo_empresa'] = $this->gnombre_archivo_empresa;
      }
      if (isset($this->gbd_seleccionada) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gbd_seleccionada'] = $this->gbd_seleccionada;
      }
      if (isset($this->gimpresorapos) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gimpresorapos'] = $this->gimpresorapos;
      }
      if (isset($this->grazonsoc) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['grazonsoc'] = $this->grazonsoc;
      }
      if (isset($this->gnit) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gnit'] = $this->gnit;
      }
      if (isset($this->gdireccion) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gdireccion'] = $this->gdireccion;
      }
      if (isset($this->gtelefono) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gtelefono'] = $this->gtelefono;
      }
      if (isset($this->gregimen) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gregimen'] = $this->gregimen;
      }
      if (isset($this->gnaturaleza) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gnaturaleza'] = $this->gnaturaleza;
      }
      if (isset($this->gTiempoSegRefreshDoc) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gTiempoSegRefreshDoc'] = $this->gTiempoSegRefreshDoc;
      }
      if (isset($this->gGrupoUsuarioComanda) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gGrupoUsuarioComanda'] = $this->gGrupoUsuarioComanda;
      }
      if (isset($this->gModificarInventario) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gModificarInventario'] = $this->gModificarInventario;
      }
      if (isset($this->gsesion_id) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gsesion_id'] = $this->gsesion_id;
      }
      if (isset($this->gdescripciongrupo) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gdescripciongrupo'] = $this->gdescripciongrupo;
      }
      if (isset($this->gsiaperturacaja) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gsiaperturacaja'] = $this->gsiaperturacaja;
      }
      if (isset($this->docpordefectoenpos) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['docpordefectoenpos'] = $this->docpordefectoenpos;
      }
      if (isset($this->empresa) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['empresa'] = $this->empresa;
      }
      if (isset($this->regimen_emp) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['regimen_emp'] = $this->regimen_emp;
      }
      if (isset($this->nit) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['nit'] = $this->nit;
      }
      if (isset($this->direccion) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['direccion'] = $this->direccion;
      }
      if (isset($this->tele) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['tele'] = $this->tele;
      }
      if (isset($this->gsiescajero) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gsiescajero'] = $this->gsiescajero;
      }
      if (isset($this->gncajas) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gncajas'] = $this->gncajas;
      }
      if (isset($this->gdescuento_general) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gdescuento_general'] = $this->gdescuento_general;
      }
      if (isset($this->gurl_reg_empresa) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gurl_reg_empresa'] = $this->gurl_reg_empresa;
      }
      if (isset($this->gurl_reg_software) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gurl_reg_software'] = $this->gurl_reg_software;
      }
      if (isset($this->gurl_reg_certificado) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gurl_reg_certificado'] = $this->gurl_reg_certificado;
      }
      if (isset($this->gurl_reg_subirlogo) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gurl_reg_subirlogo'] = $this->gurl_reg_subirlogo;
      }
      if (isset($this->gurl_reg_resolucion) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gurl_reg_resolucion'] = $this->gurl_reg_resolucion;
      }
      if (isset($this->gurl_rangos) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gurl_rangos'] = $this->gurl_rangos;
      }
      if (isset($this->gurl_enviofacturas) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gurl_enviofacturas'] = $this->gurl_enviofacturas;
      }
      if (isset($this->gurl_envionotacredito) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gurl_envionotacredito'] = $this->gurl_envionotacredito;
      }
      if (isset($this->gurl_envionotadebito) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gurl_envionotadebito'] = $this->gurl_envionotadebito;
      }
      if (isset($this->par_idajuste) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_idajuste'] = $this->par_idajuste;
      }
      if (isset($this->par_fechainv) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_fechainv'] = $this->par_fechainv;
      }
      if (isset($this->edit_cantidad) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['edit_cantidad'] = $this->edit_cantidad;
      }
      if (isset($this->par_idproducto) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_idproducto'] = $this->par_idproducto;
      }
      if (isset($this->par_idfaccom) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_idfaccom'] = $this->par_idfaccom;
      }
      if (isset($this->cost_ant) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['cost_ant'] = $this->cost_ant;
      }
      if (isset($this->valorpar) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['valorpar'] = $this->valorpar;
      }
      if (isset($this->sw) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['sw'] = $this->sw;
      }
      if (isset($this->par_idinvself) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_idinvself'] = $this->par_idinvself;
      }
      if (isset($this->par_movimiento) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_movimiento'] = $this->par_movimiento;
      }
      if (isset($this->par_numfacventa) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_numfacventa'] = $this->par_numfacventa;
      }
      if (isset($this->par_numero) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_numero'] = $this->par_numero;
      }
      if (isset($this->par_idmovimiento) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_idmovimiento'] = $this->par_idmovimiento;
      }
      if (isset($this->par_destino) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_destino'] = $this->par_destino;
      }
      if (isset($this->fmen) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['fmen'] = $this->fmen;
      }
      if (isset($this->fmay) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['fmay'] = $this->fmay;
      }
      if (isset($this->par_idmov) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_idmov'] = $this->par_idmov;
      }
      if (isset($this->t_iva) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['t_iva'] = $this->t_iva;
      }
      if (isset($this->sum_iva) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['sum_iva'] = $this->sum_iva;
      }
      if (isset($this->par_cliente) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_cliente'] = $this->par_cliente;
      }
      if (isset($this->proveedor) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['proveedor'] = $this->proveedor;
      }
      if (isset($this->cliente) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['cliente'] = $this->cliente;
      }
      if (isset($this->unmay) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['unmay'] = $this->unmay;
      }
      if (isset($this->fac) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['fac'] = $this->fac;
      }
      if (isset($this->idpref) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['idpref'] = $this->idpref;
      }
      if (isset($this->gnube_activa) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gnube_activa'] = $this->gnube_activa;
      }
      if (isset($this->grestaurar) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['grestaurar'] = $this->grestaurar;
      }
      if (isset($this->gtipo_empresa) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gtipo_empresa'] = $this->gtipo_empresa;
      }
      if (isset($this->gtipo_negocio) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gtipo_negocio'] = $this->gtipo_negocio;
      }
      if (isset($this->gPermisosUsuario) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gPermisosUsuario'] = $this->gPermisosUsuario;
      }
      if (isset($this->gnuevaactualizacion) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gnuevaactualizacion'] = $this->gnuevaactualizacion;
      }
      if (isset($this->gSerial) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gSerial'] = $this->gSerial;
      }
      if (isset($this->gmensaje) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gmensaje'] = $this->gmensaje;
      }
      if (isset($this->glicencia) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['glicencia'] = $this->glicencia;
      }
      if (isset($this->gaplicaciones_menu) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gaplicaciones_menu'] = $this->gaplicaciones_menu;
      }
      if (isset($_POST["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_POST["usr_name"]) && isset($this->usr_name)) 
      {
          $_SESSION['usr_name'] = $this->usr_name;
      }
      if (isset($_POST["usr_grupo"]) && isset($this->usr_grupo)) 
      {
          $_SESSION['usr_grupo'] = $this->usr_grupo;
      }
      if (isset($_POST["usr_database"]) && isset($this->usr_database)) 
      {
          $_SESSION['usr_database'] = $this->usr_database;
      }
      if (isset($_POST["gOS"]) && isset($this->gOS)) 
      {
          $_SESSION['gOS'] = $this->gOS;
      }
      if (!isset($_POST["gOS"]) && isset($_POST["gos"])) 
      {
          $_SESSION['gOS'] = $_POST["gos"];
      }
      if (isset($_POST["gnombreusuario"]) && isset($this->gnombreusuario)) 
      {
          $_SESSION['gnombreusuario'] = $this->gnombreusuario;
      }
      if (isset($_POST["gidtercero"]) && isset($this->gidtercero)) 
      {
          $_SESSION['gidtercero'] = $this->gidtercero;
      }
      if (isset($_POST["gidbanco"]) && isset($this->gidbanco)) 
      {
          $_SESSION['gidbanco'] = $this->gidbanco;
      }
      if (isset($_POST["gidresolucion"]) && isset($this->gidresolucion)) 
      {
          $_SESSION['gidresolucion'] = $this->gidresolucion;
      }
      if (isset($_POST["gusuariologueado"]) && isset($this->gusuariologueado)) 
      {
          $_SESSION['gusuariologueado'] = $this->gusuariologueado;
      }
      if (isset($_POST["gusuario_logueo"]) && isset($this->gusuario_logueo)) 
      {
          $_SESSION['gusuario_logueo'] = $this->gusuario_logueo;
      }
      if (isset($_POST["glineasporfactura"]) && isset($this->glineasporfactura)) 
      {
          $_SESSION['glineasporfactura'] = $this->glineasporfactura;
      }
      if (isset($_POST["gconsolidararticulos"]) && isset($this->gconsolidararticulos)) 
      {
          $_SESSION['gconsolidararticulos'] = $this->gconsolidararticulos;
      }
      if (isset($_POST["gespaciadodetallefactura"]) && isset($this->gespaciadodetallefactura)) 
      {
          $_SESSION['gespaciadodetallefactura'] = $this->gespaciadodetallefactura;
      }
      if (isset($_POST["gserialguardado"]) && isset($this->gserialguardado)) 
      {
          $_SESSION['gserialguardado'] = $this->gserialguardado;
      }
      if (isset($_POST["gnombre_archivo_empresa"]) && isset($this->gnombre_archivo_empresa)) 
      {
          $_SESSION['gnombre_archivo_empresa'] = $this->gnombre_archivo_empresa;
      }
      if (isset($_POST["gbd_seleccionada"]) && isset($this->gbd_seleccionada)) 
      {
          $_SESSION['gbd_seleccionada'] = $this->gbd_seleccionada;
      }
      if (isset($_POST["gimpresorapos"]) && isset($this->gimpresorapos)) 
      {
          $_SESSION['gimpresorapos'] = $this->gimpresorapos;
      }
      if (isset($_POST["grazonsoc"]) && isset($this->grazonsoc)) 
      {
          $_SESSION['grazonsoc'] = $this->grazonsoc;
      }
      if (isset($_POST["gnit"]) && isset($this->gnit)) 
      {
          $_SESSION['gnit'] = $this->gnit;
      }
      if (isset($_POST["gdireccion"]) && isset($this->gdireccion)) 
      {
          $_SESSION['gdireccion'] = $this->gdireccion;
      }
      if (isset($_POST["gtelefono"]) && isset($this->gtelefono)) 
      {
          $_SESSION['gtelefono'] = $this->gtelefono;
      }
      if (isset($_POST["gregimen"]) && isset($this->gregimen)) 
      {
          $_SESSION['gregimen'] = $this->gregimen;
      }
      if (isset($_POST["gnaturaleza"]) && isset($this->gnaturaleza)) 
      {
          $_SESSION['gnaturaleza'] = $this->gnaturaleza;
      }
      if (isset($_POST["gTiempoSegRefreshDoc"]) && isset($this->gTiempoSegRefreshDoc)) 
      {
          $_SESSION['gTiempoSegRefreshDoc'] = $this->gTiempoSegRefreshDoc;
      }
      if (!isset($_POST["gTiempoSegRefreshDoc"]) && isset($_POST["gtiemposegrefreshdoc"])) 
      {
          $_SESSION['gTiempoSegRefreshDoc'] = $_POST["gtiemposegrefreshdoc"];
      }
      if (isset($_POST["gGrupoUsuarioComanda"]) && isset($this->gGrupoUsuarioComanda)) 
      {
          $_SESSION['gGrupoUsuarioComanda'] = $this->gGrupoUsuarioComanda;
      }
      if (!isset($_POST["gGrupoUsuarioComanda"]) && isset($_POST["ggrupousuariocomanda"])) 
      {
          $_SESSION['gGrupoUsuarioComanda'] = $_POST["ggrupousuariocomanda"];
      }
      if (isset($_POST["gModificarInventario"]) && isset($this->gModificarInventario)) 
      {
          $_SESSION['gModificarInventario'] = $this->gModificarInventario;
      }
      if (!isset($_POST["gModificarInventario"]) && isset($_POST["gmodificarinventario"])) 
      {
          $_SESSION['gModificarInventario'] = $_POST["gmodificarinventario"];
      }
      if (isset($_POST["gsesion_id"]) && isset($this->gsesion_id)) 
      {
          $_SESSION['gsesion_id'] = $this->gsesion_id;
      }
      if (isset($_POST["gdescripciongrupo"]) && isset($this->gdescripciongrupo)) 
      {
          $_SESSION['gdescripciongrupo'] = $this->gdescripciongrupo;
      }
      if (isset($_POST["gsiaperturacaja"]) && isset($this->gsiaperturacaja)) 
      {
          $_SESSION['gsiaperturacaja'] = $this->gsiaperturacaja;
      }
      if (isset($_POST["docpordefectoenpos"]) && isset($this->docpordefectoenpos)) 
      {
          $_SESSION['docpordefectoenpos'] = $this->docpordefectoenpos;
      }
      if (isset($_POST["empresa"]) && isset($this->empresa)) 
      {
          $_SESSION['empresa'] = $this->empresa;
      }
      if (isset($_POST["regimen_emp"]) && isset($this->regimen_emp)) 
      {
          $_SESSION['regimen_emp'] = $this->regimen_emp;
      }
      if (isset($_POST["nit"]) && isset($this->nit)) 
      {
          $_SESSION['nit'] = $this->nit;
      }
      if (isset($_POST["direccion"]) && isset($this->direccion)) 
      {
          $_SESSION['direccion'] = $this->direccion;
      }
      if (isset($_POST["tele"]) && isset($this->tele)) 
      {
          $_SESSION['tele'] = $this->tele;
      }
      if (isset($_POST["gsiescajero"]) && isset($this->gsiescajero)) 
      {
          $_SESSION['gsiescajero'] = $this->gsiescajero;
      }
      if (isset($_POST["gncajas"]) && isset($this->gncajas)) 
      {
          $_SESSION['gncajas'] = $this->gncajas;
      }
      if (isset($_POST["gdescuento_general"]) && isset($this->gdescuento_general)) 
      {
          $_SESSION['gdescuento_general'] = $this->gdescuento_general;
      }
      if (isset($_POST["gurl_reg_empresa"]) && isset($this->gurl_reg_empresa)) 
      {
          $_SESSION['gurl_reg_empresa'] = $this->gurl_reg_empresa;
      }
      if (isset($_POST["gurl_reg_software"]) && isset($this->gurl_reg_software)) 
      {
          $_SESSION['gurl_reg_software'] = $this->gurl_reg_software;
      }
      if (isset($_POST["gurl_reg_certificado"]) && isset($this->gurl_reg_certificado)) 
      {
          $_SESSION['gurl_reg_certificado'] = $this->gurl_reg_certificado;
      }
      if (isset($_POST["gurl_reg_subirlogo"]) && isset($this->gurl_reg_subirlogo)) 
      {
          $_SESSION['gurl_reg_subirlogo'] = $this->gurl_reg_subirlogo;
      }
      if (isset($_POST["gurl_reg_resolucion"]) && isset($this->gurl_reg_resolucion)) 
      {
          $_SESSION['gurl_reg_resolucion'] = $this->gurl_reg_resolucion;
      }
      if (isset($_POST["gurl_rangos"]) && isset($this->gurl_rangos)) 
      {
          $_SESSION['gurl_rangos'] = $this->gurl_rangos;
      }
      if (isset($_POST["gurl_enviofacturas"]) && isset($this->gurl_enviofacturas)) 
      {
          $_SESSION['gurl_enviofacturas'] = $this->gurl_enviofacturas;
      }
      if (isset($_POST["gurl_envionotacredito"]) && isset($this->gurl_envionotacredito)) 
      {
          $_SESSION['gurl_envionotacredito'] = $this->gurl_envionotacredito;
      }
      if (isset($_POST["gurl_envionotadebito"]) && isset($this->gurl_envionotadebito)) 
      {
          $_SESSION['gurl_envionotadebito'] = $this->gurl_envionotadebito;
      }
      if (isset($_POST["par_idajuste"]) && isset($this->par_idajuste)) 
      {
          $_SESSION['par_idajuste'] = $this->par_idajuste;
      }
      if (isset($_POST["par_fechainv"]) && isset($this->par_fechainv)) 
      {
          $_SESSION['par_fechainv'] = $this->par_fechainv;
      }
      if (isset($_POST["edit_cantidad"]) && isset($this->edit_cantidad)) 
      {
          $_SESSION['edit_cantidad'] = $this->edit_cantidad;
      }
      if (isset($_POST["par_idproducto"]) && isset($this->par_idproducto)) 
      {
          $_SESSION['par_idproducto'] = $this->par_idproducto;
      }
      if (isset($_POST["par_idfaccom"]) && isset($this->par_idfaccom)) 
      {
          $_SESSION['par_idfaccom'] = $this->par_idfaccom;
      }
      if (isset($_POST["cost_ant"]) && isset($this->cost_ant)) 
      {
          $_SESSION['cost_ant'] = $this->cost_ant;
      }
      if (isset($_POST["valorpar"]) && isset($this->valorpar)) 
      {
          $_SESSION['valorpar'] = $this->valorpar;
      }
      if (isset($_POST["sw"]) && isset($this->sw)) 
      {
          $_SESSION['sw'] = $this->sw;
      }
      if (isset($_POST["par_idinvself"]) && isset($this->par_idinvself)) 
      {
          $_SESSION['par_idinvself'] = $this->par_idinvself;
      }
      if (isset($_POST["par_movimiento"]) && isset($this->par_movimiento)) 
      {
          $_SESSION['par_movimiento'] = $this->par_movimiento;
      }
      if (isset($_POST["par_numfacventa"]) && isset($this->par_numfacventa)) 
      {
          $_SESSION['par_numfacventa'] = $this->par_numfacventa;
      }
      if (isset($_POST["par_numero"]) && isset($this->par_numero)) 
      {
          $_SESSION['par_numero'] = $this->par_numero;
      }
      if (isset($_POST["par_idmovimiento"]) && isset($this->par_idmovimiento)) 
      {
          $_SESSION['par_idmovimiento'] = $this->par_idmovimiento;
      }
      if (isset($_POST["par_destino"]) && isset($this->par_destino)) 
      {
          $_SESSION['par_destino'] = $this->par_destino;
      }
      if (isset($_POST["fmen"]) && isset($this->fmen)) 
      {
          $_SESSION['fmen'] = $this->fmen;
      }
      if (isset($_POST["fmay"]) && isset($this->fmay)) 
      {
          $_SESSION['fmay'] = $this->fmay;
      }
      if (isset($_POST["par_idmov"]) && isset($this->par_idmov)) 
      {
          $_SESSION['par_idmov'] = $this->par_idmov;
      }
      if (isset($_POST["t_iva"]) && isset($this->t_iva)) 
      {
          $_SESSION['t_iva'] = $this->t_iva;
      }
      if (isset($_POST["sum_iva"]) && isset($this->sum_iva)) 
      {
          $_SESSION['sum_iva'] = $this->sum_iva;
      }
      if (isset($_POST["par_cliente"]) && isset($this->par_cliente)) 
      {
          $_SESSION['par_cliente'] = $this->par_cliente;
      }
      if (isset($_POST["proveedor"]) && isset($this->proveedor)) 
      {
          $_SESSION['proveedor'] = $this->proveedor;
      }
      if (isset($_POST["cliente"]) && isset($this->cliente)) 
      {
          $_SESSION['cliente'] = $this->cliente;
      }
      if (isset($_POST["unmay"]) && isset($this->unmay)) 
      {
          $_SESSION['unmay'] = $this->unmay;
      }
      if (isset($_POST["fac"]) && isset($this->fac)) 
      {
          $_SESSION['fac'] = $this->fac;
      }
      if (isset($_POST["idpref"]) && isset($this->idpref)) 
      {
          $_SESSION['idpref'] = $this->idpref;
      }
      if (isset($_POST["gnube_activa"]) && isset($this->gnube_activa)) 
      {
          $_SESSION['gnube_activa'] = $this->gnube_activa;
      }
      if (isset($_POST["grestaurar"]) && isset($this->grestaurar)) 
      {
          $_SESSION['grestaurar'] = $this->grestaurar;
      }
      if (isset($_POST["gtipo_empresa"]) && isset($this->gtipo_empresa)) 
      {
          $_SESSION['gtipo_empresa'] = $this->gtipo_empresa;
      }
      if (isset($_POST["gtipo_negocio"]) && isset($this->gtipo_negocio)) 
      {
          $_SESSION['gtipo_negocio'] = $this->gtipo_negocio;
      }
      if (isset($_POST["gPermisosUsuario"]) && isset($this->gPermisosUsuario)) 
      {
          $_SESSION['gPermisosUsuario'] = $this->gPermisosUsuario;
      }
      if (!isset($_POST["gPermisosUsuario"]) && isset($_POST["gpermisosusuario"])) 
      {
          $_SESSION['gPermisosUsuario'] = $_POST["gpermisosusuario"];
      }
      if (isset($_POST["gnuevaactualizacion"]) && isset($this->gnuevaactualizacion)) 
      {
          $_SESSION['gnuevaactualizacion'] = $this->gnuevaactualizacion;
      }
      if (isset($_POST["gSerial"]) && isset($this->gSerial)) 
      {
          $_SESSION['gSerial'] = $this->gSerial;
      }
      if (!isset($_POST["gSerial"]) && isset($_POST["gserial"])) 
      {
          $_SESSION['gSerial'] = $_POST["gserial"];
      }
      if (isset($_POST["gmensaje"]) && isset($this->gmensaje)) 
      {
          $_SESSION['gmensaje'] = $this->gmensaje;
      }
      if (isset($_POST["glicencia"]) && isset($this->glicencia)) 
      {
          $_SESSION['glicencia'] = $this->glicencia;
      }
      if (isset($_POST["gaplicaciones_menu"]) && isset($this->gaplicaciones_menu)) 
      {
          $_SESSION['gaplicaciones_menu'] = $this->gaplicaciones_menu;
      }
      if (isset($_GET["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_GET["usr_iduser"]) && isset($this->usr_iduser)) 
      {
          $_SESSION['usr_iduser'] = $this->usr_iduser;
      }
      if (isset($_GET["usr_name"]) && isset($this->usr_name)) 
      {
          $_SESSION['usr_name'] = $this->usr_name;
      }
      if (isset($_GET["usr_grupo"]) && isset($this->usr_grupo)) 
      {
          $_SESSION['usr_grupo'] = $this->usr_grupo;
      }
      if (isset($_GET["usr_database"]) && isset($this->usr_database)) 
      {
          $_SESSION['usr_database'] = $this->usr_database;
      }
      if (isset($_GET["gOS"]) && isset($this->gOS)) 
      {
          $_SESSION['gOS'] = $this->gOS;
      }
      if (!isset($_GET["gOS"]) && isset($_GET["gos"])) 
      {
          $_SESSION['gOS'] = $_GET["gos"];
      }
      if (isset($_GET["gnombreusuario"]) && isset($this->gnombreusuario)) 
      {
          $_SESSION['gnombreusuario'] = $this->gnombreusuario;
      }
      if (isset($_GET["gidtercero"]) && isset($this->gidtercero)) 
      {
          $_SESSION['gidtercero'] = $this->gidtercero;
      }
      if (isset($_GET["gidbanco"]) && isset($this->gidbanco)) 
      {
          $_SESSION['gidbanco'] = $this->gidbanco;
      }
      if (isset($_GET["gidresolucion"]) && isset($this->gidresolucion)) 
      {
          $_SESSION['gidresolucion'] = $this->gidresolucion;
      }
      if (isset($_GET["gusuariologueado"]) && isset($this->gusuariologueado)) 
      {
          $_SESSION['gusuariologueado'] = $this->gusuariologueado;
      }
      if (isset($_GET["gusuario_logueo"]) && isset($this->gusuario_logueo)) 
      {
          $_SESSION['gusuario_logueo'] = $this->gusuario_logueo;
      }
      if (isset($_GET["glineasporfactura"]) && isset($this->glineasporfactura)) 
      {
          $_SESSION['glineasporfactura'] = $this->glineasporfactura;
      }
      if (isset($_GET["gconsolidararticulos"]) && isset($this->gconsolidararticulos)) 
      {
          $_SESSION['gconsolidararticulos'] = $this->gconsolidararticulos;
      }
      if (isset($_GET["gespaciadodetallefactura"]) && isset($this->gespaciadodetallefactura)) 
      {
          $_SESSION['gespaciadodetallefactura'] = $this->gespaciadodetallefactura;
      }
      if (isset($_GET["gserialguardado"]) && isset($this->gserialguardado)) 
      {
          $_SESSION['gserialguardado'] = $this->gserialguardado;
      }
      if (isset($_GET["gnombre_archivo_empresa"]) && isset($this->gnombre_archivo_empresa)) 
      {
          $_SESSION['gnombre_archivo_empresa'] = $this->gnombre_archivo_empresa;
      }
      if (isset($_GET["gbd_seleccionada"]) && isset($this->gbd_seleccionada)) 
      {
          $_SESSION['gbd_seleccionada'] = $this->gbd_seleccionada;
      }
      if (isset($_GET["gimpresorapos"]) && isset($this->gimpresorapos)) 
      {
          $_SESSION['gimpresorapos'] = $this->gimpresorapos;
      }
      if (isset($_GET["grazonsoc"]) && isset($this->grazonsoc)) 
      {
          $_SESSION['grazonsoc'] = $this->grazonsoc;
      }
      if (isset($_GET["gnit"]) && isset($this->gnit)) 
      {
          $_SESSION['gnit'] = $this->gnit;
      }
      if (isset($_GET["gdireccion"]) && isset($this->gdireccion)) 
      {
          $_SESSION['gdireccion'] = $this->gdireccion;
      }
      if (isset($_GET["gtelefono"]) && isset($this->gtelefono)) 
      {
          $_SESSION['gtelefono'] = $this->gtelefono;
      }
      if (isset($_GET["gregimen"]) && isset($this->gregimen)) 
      {
          $_SESSION['gregimen'] = $this->gregimen;
      }
      if (isset($_GET["gnaturaleza"]) && isset($this->gnaturaleza)) 
      {
          $_SESSION['gnaturaleza'] = $this->gnaturaleza;
      }
      if (isset($_GET["gTiempoSegRefreshDoc"]) && isset($this->gTiempoSegRefreshDoc)) 
      {
          $_SESSION['gTiempoSegRefreshDoc'] = $this->gTiempoSegRefreshDoc;
      }
      if (!isset($_GET["gTiempoSegRefreshDoc"]) && isset($_GET["gtiemposegrefreshdoc"])) 
      {
          $_SESSION['gTiempoSegRefreshDoc'] = $_GET["gtiemposegrefreshdoc"];
      }
      if (isset($_GET["gGrupoUsuarioComanda"]) && isset($this->gGrupoUsuarioComanda)) 
      {
          $_SESSION['gGrupoUsuarioComanda'] = $this->gGrupoUsuarioComanda;
      }
      if (!isset($_GET["gGrupoUsuarioComanda"]) && isset($_GET["ggrupousuariocomanda"])) 
      {
          $_SESSION['gGrupoUsuarioComanda'] = $_GET["ggrupousuariocomanda"];
      }
      if (isset($_GET["gModificarInventario"]) && isset($this->gModificarInventario)) 
      {
          $_SESSION['gModificarInventario'] = $this->gModificarInventario;
      }
      if (!isset($_GET["gModificarInventario"]) && isset($_GET["gmodificarinventario"])) 
      {
          $_SESSION['gModificarInventario'] = $_GET["gmodificarinventario"];
      }
      if (isset($_GET["gsesion_id"]) && isset($this->gsesion_id)) 
      {
          $_SESSION['gsesion_id'] = $this->gsesion_id;
      }
      if (isset($_GET["gdescripciongrupo"]) && isset($this->gdescripciongrupo)) 
      {
          $_SESSION['gdescripciongrupo'] = $this->gdescripciongrupo;
      }
      if (isset($_GET["gsiaperturacaja"]) && isset($this->gsiaperturacaja)) 
      {
          $_SESSION['gsiaperturacaja'] = $this->gsiaperturacaja;
      }
      if (isset($_GET["docpordefectoenpos"]) && isset($this->docpordefectoenpos)) 
      {
          $_SESSION['docpordefectoenpos'] = $this->docpordefectoenpos;
      }
      if (isset($_GET["empresa"]) && isset($this->empresa)) 
      {
          $_SESSION['empresa'] = $this->empresa;
      }
      if (isset($_GET["regimen_emp"]) && isset($this->regimen_emp)) 
      {
          $_SESSION['regimen_emp'] = $this->regimen_emp;
      }
      if (isset($_GET["nit"]) && isset($this->nit)) 
      {
          $_SESSION['nit'] = $this->nit;
      }
      if (isset($_GET["direccion"]) && isset($this->direccion)) 
      {
          $_SESSION['direccion'] = $this->direccion;
      }
      if (isset($_GET["tele"]) && isset($this->tele)) 
      {
          $_SESSION['tele'] = $this->tele;
      }
      if (isset($_GET["gsiescajero"]) && isset($this->gsiescajero)) 
      {
          $_SESSION['gsiescajero'] = $this->gsiescajero;
      }
      if (isset($_GET["gncajas"]) && isset($this->gncajas)) 
      {
          $_SESSION['gncajas'] = $this->gncajas;
      }
      if (isset($_GET["gdescuento_general"]) && isset($this->gdescuento_general)) 
      {
          $_SESSION['gdescuento_general'] = $this->gdescuento_general;
      }
      if (isset($_GET["gurl_reg_empresa"]) && isset($this->gurl_reg_empresa)) 
      {
          $_SESSION['gurl_reg_empresa'] = $this->gurl_reg_empresa;
      }
      if (isset($_GET["gurl_reg_software"]) && isset($this->gurl_reg_software)) 
      {
          $_SESSION['gurl_reg_software'] = $this->gurl_reg_software;
      }
      if (isset($_GET["gurl_reg_certificado"]) && isset($this->gurl_reg_certificado)) 
      {
          $_SESSION['gurl_reg_certificado'] = $this->gurl_reg_certificado;
      }
      if (isset($_GET["gurl_reg_subirlogo"]) && isset($this->gurl_reg_subirlogo)) 
      {
          $_SESSION['gurl_reg_subirlogo'] = $this->gurl_reg_subirlogo;
      }
      if (isset($_GET["gurl_reg_resolucion"]) && isset($this->gurl_reg_resolucion)) 
      {
          $_SESSION['gurl_reg_resolucion'] = $this->gurl_reg_resolucion;
      }
      if (isset($_GET["gurl_rangos"]) && isset($this->gurl_rangos)) 
      {
          $_SESSION['gurl_rangos'] = $this->gurl_rangos;
      }
      if (isset($_GET["gurl_enviofacturas"]) && isset($this->gurl_enviofacturas)) 
      {
          $_SESSION['gurl_enviofacturas'] = $this->gurl_enviofacturas;
      }
      if (isset($_GET["gurl_envionotacredito"]) && isset($this->gurl_envionotacredito)) 
      {
          $_SESSION['gurl_envionotacredito'] = $this->gurl_envionotacredito;
      }
      if (isset($_GET["gurl_envionotadebito"]) && isset($this->gurl_envionotadebito)) 
      {
          $_SESSION['gurl_envionotadebito'] = $this->gurl_envionotadebito;
      }
      if (isset($_GET["par_idajuste"]) && isset($this->par_idajuste)) 
      {
          $_SESSION['par_idajuste'] = $this->par_idajuste;
      }
      if (isset($_GET["par_fechainv"]) && isset($this->par_fechainv)) 
      {
          $_SESSION['par_fechainv'] = $this->par_fechainv;
      }
      if (isset($_GET["edit_cantidad"]) && isset($this->edit_cantidad)) 
      {
          $_SESSION['edit_cantidad'] = $this->edit_cantidad;
      }
      if (isset($_GET["par_idproducto"]) && isset($this->par_idproducto)) 
      {
          $_SESSION['par_idproducto'] = $this->par_idproducto;
      }
      if (isset($_GET["par_idfaccom"]) && isset($this->par_idfaccom)) 
      {
          $_SESSION['par_idfaccom'] = $this->par_idfaccom;
      }
      if (isset($_GET["cost_ant"]) && isset($this->cost_ant)) 
      {
          $_SESSION['cost_ant'] = $this->cost_ant;
      }
      if (isset($_GET["valorpar"]) && isset($this->valorpar)) 
      {
          $_SESSION['valorpar'] = $this->valorpar;
      }
      if (isset($_GET["sw"]) && isset($this->sw)) 
      {
          $_SESSION['sw'] = $this->sw;
      }
      if (isset($_GET["par_idinvself"]) && isset($this->par_idinvself)) 
      {
          $_SESSION['par_idinvself'] = $this->par_idinvself;
      }
      if (isset($_GET["par_movimiento"]) && isset($this->par_movimiento)) 
      {
          $_SESSION['par_movimiento'] = $this->par_movimiento;
      }
      if (isset($_GET["par_numfacventa"]) && isset($this->par_numfacventa)) 
      {
          $_SESSION['par_numfacventa'] = $this->par_numfacventa;
      }
      if (isset($_GET["par_numero"]) && isset($this->par_numero)) 
      {
          $_SESSION['par_numero'] = $this->par_numero;
      }
      if (isset($_GET["par_idmovimiento"]) && isset($this->par_idmovimiento)) 
      {
          $_SESSION['par_idmovimiento'] = $this->par_idmovimiento;
      }
      if (isset($_GET["par_destino"]) && isset($this->par_destino)) 
      {
          $_SESSION['par_destino'] = $this->par_destino;
      }
      if (isset($_GET["fmen"]) && isset($this->fmen)) 
      {
          $_SESSION['fmen'] = $this->fmen;
      }
      if (isset($_GET["fmay"]) && isset($this->fmay)) 
      {
          $_SESSION['fmay'] = $this->fmay;
      }
      if (isset($_GET["par_idmov"]) && isset($this->par_idmov)) 
      {
          $_SESSION['par_idmov'] = $this->par_idmov;
      }
      if (isset($_GET["t_iva"]) && isset($this->t_iva)) 
      {
          $_SESSION['t_iva'] = $this->t_iva;
      }
      if (isset($_GET["sum_iva"]) && isset($this->sum_iva)) 
      {
          $_SESSION['sum_iva'] = $this->sum_iva;
      }
      if (isset($_GET["par_cliente"]) && isset($this->par_cliente)) 
      {
          $_SESSION['par_cliente'] = $this->par_cliente;
      }
      if (isset($_GET["proveedor"]) && isset($this->proveedor)) 
      {
          $_SESSION['proveedor'] = $this->proveedor;
      }
      if (isset($_GET["cliente"]) && isset($this->cliente)) 
      {
          $_SESSION['cliente'] = $this->cliente;
      }
      if (isset($_GET["unmay"]) && isset($this->unmay)) 
      {
          $_SESSION['unmay'] = $this->unmay;
      }
      if (isset($_GET["fac"]) && isset($this->fac)) 
      {
          $_SESSION['fac'] = $this->fac;
      }
      if (isset($_GET["idpref"]) && isset($this->idpref)) 
      {
          $_SESSION['idpref'] = $this->idpref;
      }
      if (isset($_GET["gnube_activa"]) && isset($this->gnube_activa)) 
      {
          $_SESSION['gnube_activa'] = $this->gnube_activa;
      }
      if (isset($_GET["grestaurar"]) && isset($this->grestaurar)) 
      {
          $_SESSION['grestaurar'] = $this->grestaurar;
      }
      if (isset($_GET["gtipo_empresa"]) && isset($this->gtipo_empresa)) 
      {
          $_SESSION['gtipo_empresa'] = $this->gtipo_empresa;
      }
      if (isset($_GET["gtipo_negocio"]) && isset($this->gtipo_negocio)) 
      {
          $_SESSION['gtipo_negocio'] = $this->gtipo_negocio;
      }
      if (isset($_GET["gPermisosUsuario"]) && isset($this->gPermisosUsuario)) 
      {
          $_SESSION['gPermisosUsuario'] = $this->gPermisosUsuario;
      }
      if (!isset($_GET["gPermisosUsuario"]) && isset($_GET["gpermisosusuario"])) 
      {
          $_SESSION['gPermisosUsuario'] = $_GET["gpermisosusuario"];
      }
      if (isset($_GET["gnuevaactualizacion"]) && isset($this->gnuevaactualizacion)) 
      {
          $_SESSION['gnuevaactualizacion'] = $this->gnuevaactualizacion;
      }
      if (isset($_GET["gSerial"]) && isset($this->gSerial)) 
      {
          $_SESSION['gSerial'] = $this->gSerial;
      }
      if (!isset($_GET["gSerial"]) && isset($_GET["gserial"])) 
      {
          $_SESSION['gSerial'] = $_GET["gserial"];
      }
      if (isset($_GET["gmensaje"]) && isset($this->gmensaje)) 
      {
          $_SESSION['gmensaje'] = $this->gmensaje;
      }
      if (isset($_GET["glicencia"]) && isset($this->glicencia)) 
      {
          $_SESSION['glicencia'] = $this->glicencia;
      }
      if (isset($_GET["gaplicaciones_menu"]) && isset($this->gaplicaciones_menu)) 
      {
          $_SESSION['gaplicaciones_menu'] = $this->gaplicaciones_menu;
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['seg_login']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['seg_login']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['seg_login']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['seg_login']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['seg_login']['embutida_parms']);
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
                 nm_limpa_str_seg_login($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
          if (isset($this->usr_iduser)) 
          {
              $_SESSION['usr_iduser'] = $this->usr_iduser;
          }
          if (isset($this->usr_name)) 
          {
              $_SESSION['usr_name'] = $this->usr_name;
          }
          if (isset($this->usr_grupo)) 
          {
              $_SESSION['usr_grupo'] = $this->usr_grupo;
          }
          if (isset($this->usr_database)) 
          {
              $_SESSION['usr_database'] = $this->usr_database;
          }
          if (!isset($this->gOS) && isset($this->gos)) 
          {
              $this->gOS = $this->gos;
          }
          if (isset($this->gOS)) 
          {
              $_SESSION['gOS'] = $this->gOS;
          }
          if (isset($this->gnombreusuario)) 
          {
              $_SESSION['gnombreusuario'] = $this->gnombreusuario;
          }
          if (isset($this->gidtercero)) 
          {
              $_SESSION['gidtercero'] = $this->gidtercero;
          }
          if (isset($this->gidbanco)) 
          {
              $_SESSION['gidbanco'] = $this->gidbanco;
          }
          if (isset($this->gidresolucion)) 
          {
              $_SESSION['gidresolucion'] = $this->gidresolucion;
          }
          if (isset($this->gusuariologueado)) 
          {
              $_SESSION['gusuariologueado'] = $this->gusuariologueado;
          }
          if (isset($this->gusuario_logueo)) 
          {
              $_SESSION['gusuario_logueo'] = $this->gusuario_logueo;
          }
          if (isset($this->glineasporfactura)) 
          {
              $_SESSION['glineasporfactura'] = $this->glineasporfactura;
          }
          if (isset($this->gconsolidararticulos)) 
          {
              $_SESSION['gconsolidararticulos'] = $this->gconsolidararticulos;
          }
          if (isset($this->gespaciadodetallefactura)) 
          {
              $_SESSION['gespaciadodetallefactura'] = $this->gespaciadodetallefactura;
          }
          if (isset($this->gserialguardado)) 
          {
              $_SESSION['gserialguardado'] = $this->gserialguardado;
          }
          if (isset($this->gnombre_archivo_empresa)) 
          {
              $_SESSION['gnombre_archivo_empresa'] = $this->gnombre_archivo_empresa;
          }
          if (isset($this->gbd_seleccionada)) 
          {
              $_SESSION['gbd_seleccionada'] = $this->gbd_seleccionada;
          }
          if (isset($this->gimpresorapos)) 
          {
              $_SESSION['gimpresorapos'] = $this->gimpresorapos;
          }
          if (isset($this->grazonsoc)) 
          {
              $_SESSION['grazonsoc'] = $this->grazonsoc;
          }
          if (isset($this->gnit)) 
          {
              $_SESSION['gnit'] = $this->gnit;
          }
          if (isset($this->gdireccion)) 
          {
              $_SESSION['gdireccion'] = $this->gdireccion;
          }
          if (isset($this->gtelefono)) 
          {
              $_SESSION['gtelefono'] = $this->gtelefono;
          }
          if (isset($this->gregimen)) 
          {
              $_SESSION['gregimen'] = $this->gregimen;
          }
          if (isset($this->gnaturaleza)) 
          {
              $_SESSION['gnaturaleza'] = $this->gnaturaleza;
          }
          if (!isset($this->gTiempoSegRefreshDoc) && isset($this->gtiemposegrefreshdoc)) 
          {
              $this->gTiempoSegRefreshDoc = $this->gtiemposegrefreshdoc;
          }
          if (isset($this->gTiempoSegRefreshDoc)) 
          {
              $_SESSION['gTiempoSegRefreshDoc'] = $this->gTiempoSegRefreshDoc;
          }
          if (!isset($this->gGrupoUsuarioComanda) && isset($this->ggrupousuariocomanda)) 
          {
              $this->gGrupoUsuarioComanda = $this->ggrupousuariocomanda;
          }
          if (isset($this->gGrupoUsuarioComanda)) 
          {
              $_SESSION['gGrupoUsuarioComanda'] = $this->gGrupoUsuarioComanda;
          }
          if (!isset($this->gModificarInventario) && isset($this->gmodificarinventario)) 
          {
              $this->gModificarInventario = $this->gmodificarinventario;
          }
          if (isset($this->gModificarInventario)) 
          {
              $_SESSION['gModificarInventario'] = $this->gModificarInventario;
          }
          if (isset($this->gsesion_id)) 
          {
              $_SESSION['gsesion_id'] = $this->gsesion_id;
          }
          if (isset($this->gdescripciongrupo)) 
          {
              $_SESSION['gdescripciongrupo'] = $this->gdescripciongrupo;
          }
          if (isset($this->gsiaperturacaja)) 
          {
              $_SESSION['gsiaperturacaja'] = $this->gsiaperturacaja;
          }
          if (isset($this->docpordefectoenpos)) 
          {
              $_SESSION['docpordefectoenpos'] = $this->docpordefectoenpos;
          }
          if (isset($this->empresa)) 
          {
              $_SESSION['empresa'] = $this->empresa;
          }
          if (isset($this->regimen_emp)) 
          {
              $_SESSION['regimen_emp'] = $this->regimen_emp;
          }
          if (isset($this->nit)) 
          {
              $_SESSION['nit'] = $this->nit;
          }
          if (isset($this->direccion)) 
          {
              $_SESSION['direccion'] = $this->direccion;
          }
          if (isset($this->tele)) 
          {
              $_SESSION['tele'] = $this->tele;
          }
          if (isset($this->gsiescajero)) 
          {
              $_SESSION['gsiescajero'] = $this->gsiescajero;
          }
          if (isset($this->gncajas)) 
          {
              $_SESSION['gncajas'] = $this->gncajas;
          }
          if (isset($this->gdescuento_general)) 
          {
              $_SESSION['gdescuento_general'] = $this->gdescuento_general;
          }
          if (isset($this->gurl_reg_empresa)) 
          {
              $_SESSION['gurl_reg_empresa'] = $this->gurl_reg_empresa;
          }
          if (isset($this->gurl_reg_software)) 
          {
              $_SESSION['gurl_reg_software'] = $this->gurl_reg_software;
          }
          if (isset($this->gurl_reg_certificado)) 
          {
              $_SESSION['gurl_reg_certificado'] = $this->gurl_reg_certificado;
          }
          if (isset($this->gurl_reg_subirlogo)) 
          {
              $_SESSION['gurl_reg_subirlogo'] = $this->gurl_reg_subirlogo;
          }
          if (isset($this->gurl_reg_resolucion)) 
          {
              $_SESSION['gurl_reg_resolucion'] = $this->gurl_reg_resolucion;
          }
          if (isset($this->gurl_rangos)) 
          {
              $_SESSION['gurl_rangos'] = $this->gurl_rangos;
          }
          if (isset($this->gurl_enviofacturas)) 
          {
              $_SESSION['gurl_enviofacturas'] = $this->gurl_enviofacturas;
          }
          if (isset($this->gurl_envionotacredito)) 
          {
              $_SESSION['gurl_envionotacredito'] = $this->gurl_envionotacredito;
          }
          if (isset($this->gurl_envionotadebito)) 
          {
              $_SESSION['gurl_envionotadebito'] = $this->gurl_envionotadebito;
          }
          if (isset($this->par_idajuste)) 
          {
              $_SESSION['par_idajuste'] = $this->par_idajuste;
          }
          if (isset($this->par_fechainv)) 
          {
              $_SESSION['par_fechainv'] = $this->par_fechainv;
          }
          if (isset($this->edit_cantidad)) 
          {
              $_SESSION['edit_cantidad'] = $this->edit_cantidad;
          }
          if (isset($this->par_idproducto)) 
          {
              $_SESSION['par_idproducto'] = $this->par_idproducto;
          }
          if (isset($this->par_idfaccom)) 
          {
              $_SESSION['par_idfaccom'] = $this->par_idfaccom;
          }
          if (isset($this->cost_ant)) 
          {
              $_SESSION['cost_ant'] = $this->cost_ant;
          }
          if (isset($this->valorpar)) 
          {
              $_SESSION['valorpar'] = $this->valorpar;
          }
          if (isset($this->sw)) 
          {
              $_SESSION['sw'] = $this->sw;
          }
          if (isset($this->par_idinvself)) 
          {
              $_SESSION['par_idinvself'] = $this->par_idinvself;
          }
          if (isset($this->par_movimiento)) 
          {
              $_SESSION['par_movimiento'] = $this->par_movimiento;
          }
          if (isset($this->par_numfacventa)) 
          {
              $_SESSION['par_numfacventa'] = $this->par_numfacventa;
          }
          if (isset($this->par_numero)) 
          {
              $_SESSION['par_numero'] = $this->par_numero;
          }
          if (isset($this->par_idmovimiento)) 
          {
              $_SESSION['par_idmovimiento'] = $this->par_idmovimiento;
          }
          if (isset($this->par_destino)) 
          {
              $_SESSION['par_destino'] = $this->par_destino;
          }
          if (isset($this->fmen)) 
          {
              $_SESSION['fmen'] = $this->fmen;
          }
          if (isset($this->fmay)) 
          {
              $_SESSION['fmay'] = $this->fmay;
          }
          if (isset($this->par_idmov)) 
          {
              $_SESSION['par_idmov'] = $this->par_idmov;
          }
          if (isset($this->t_iva)) 
          {
              $_SESSION['t_iva'] = $this->t_iva;
          }
          if (isset($this->sum_iva)) 
          {
              $_SESSION['sum_iva'] = $this->sum_iva;
          }
          if (isset($this->par_cliente)) 
          {
              $_SESSION['par_cliente'] = $this->par_cliente;
          }
          if (isset($this->proveedor)) 
          {
              $_SESSION['proveedor'] = $this->proveedor;
          }
          if (isset($this->cliente)) 
          {
              $_SESSION['cliente'] = $this->cliente;
          }
          if (isset($this->unmay)) 
          {
              $_SESSION['unmay'] = $this->unmay;
          }
          if (isset($this->fac)) 
          {
              $_SESSION['fac'] = $this->fac;
          }
          if (isset($this->idpref)) 
          {
              $_SESSION['idpref'] = $this->idpref;
          }
          if (isset($this->gnube_activa)) 
          {
              $_SESSION['gnube_activa'] = $this->gnube_activa;
          }
          if (isset($this->grestaurar)) 
          {
              $_SESSION['grestaurar'] = $this->grestaurar;
          }
          if (isset($this->gtipo_empresa)) 
          {
              $_SESSION['gtipo_empresa'] = $this->gtipo_empresa;
          }
          if (isset($this->gtipo_negocio)) 
          {
              $_SESSION['gtipo_negocio'] = $this->gtipo_negocio;
          }
          if (!isset($this->gPermisosUsuario) && isset($this->gpermisosusuario)) 
          {
              $this->gPermisosUsuario = $this->gpermisosusuario;
          }
          if (isset($this->gPermisosUsuario)) 
          {
              $_SESSION['gPermisosUsuario'] = $this->gPermisosUsuario;
          }
          if (isset($this->gnuevaactualizacion)) 
          {
              $_SESSION['gnuevaactualizacion'] = $this->gnuevaactualizacion;
          }
          if (!isset($this->gSerial) && isset($this->gserial)) 
          {
              $this->gSerial = $this->gserial;
          }
          if (isset($this->gSerial)) 
          {
              $_SESSION['gSerial'] = $this->gSerial;
          }
          if (isset($this->gmensaje)) 
          {
              $_SESSION['gmensaje'] = $this->gmensaje;
          }
          if (isset($this->glicencia)) 
          {
              $_SESSION['glicencia'] = $this->glicencia;
          }
          if (isset($this->gaplicaciones_menu)) 
          {
              $_SESSION['gaplicaciones_menu'] = $this->gaplicaciones_menu;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['seg_login']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['seg_login']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['seg_login']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['seg_login']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
          if (isset($this->usr_iduser)) 
          {
              $_SESSION['usr_iduser'] = $this->usr_iduser;
          }
          if (isset($this->usr_name)) 
          {
              $_SESSION['usr_name'] = $this->usr_name;
          }
          if (isset($this->usr_grupo)) 
          {
              $_SESSION['usr_grupo'] = $this->usr_grupo;
          }
          if (isset($this->usr_database)) 
          {
              $_SESSION['usr_database'] = $this->usr_database;
          }
          if (!isset($this->gOS) && isset($this->gos)) 
          {
              $this->gOS = $this->gos;
          }
          if (isset($this->gOS)) 
          {
              $_SESSION['gOS'] = $this->gOS;
          }
          if (isset($this->gnombreusuario)) 
          {
              $_SESSION['gnombreusuario'] = $this->gnombreusuario;
          }
          if (isset($this->gidtercero)) 
          {
              $_SESSION['gidtercero'] = $this->gidtercero;
          }
          if (isset($this->gidbanco)) 
          {
              $_SESSION['gidbanco'] = $this->gidbanco;
          }
          if (isset($this->gidresolucion)) 
          {
              $_SESSION['gidresolucion'] = $this->gidresolucion;
          }
          if (isset($this->gusuariologueado)) 
          {
              $_SESSION['gusuariologueado'] = $this->gusuariologueado;
          }
          if (isset($this->gusuario_logueo)) 
          {
              $_SESSION['gusuario_logueo'] = $this->gusuario_logueo;
          }
          if (isset($this->glineasporfactura)) 
          {
              $_SESSION['glineasporfactura'] = $this->glineasporfactura;
          }
          if (isset($this->gconsolidararticulos)) 
          {
              $_SESSION['gconsolidararticulos'] = $this->gconsolidararticulos;
          }
          if (isset($this->gespaciadodetallefactura)) 
          {
              $_SESSION['gespaciadodetallefactura'] = $this->gespaciadodetallefactura;
          }
          if (isset($this->gserialguardado)) 
          {
              $_SESSION['gserialguardado'] = $this->gserialguardado;
          }
          if (isset($this->gnombre_archivo_empresa)) 
          {
              $_SESSION['gnombre_archivo_empresa'] = $this->gnombre_archivo_empresa;
          }
          if (isset($this->gbd_seleccionada)) 
          {
              $_SESSION['gbd_seleccionada'] = $this->gbd_seleccionada;
          }
          if (isset($this->gimpresorapos)) 
          {
              $_SESSION['gimpresorapos'] = $this->gimpresorapos;
          }
          if (isset($this->grazonsoc)) 
          {
              $_SESSION['grazonsoc'] = $this->grazonsoc;
          }
          if (isset($this->gnit)) 
          {
              $_SESSION['gnit'] = $this->gnit;
          }
          if (isset($this->gdireccion)) 
          {
              $_SESSION['gdireccion'] = $this->gdireccion;
          }
          if (isset($this->gtelefono)) 
          {
              $_SESSION['gtelefono'] = $this->gtelefono;
          }
          if (isset($this->gregimen)) 
          {
              $_SESSION['gregimen'] = $this->gregimen;
          }
          if (isset($this->gnaturaleza)) 
          {
              $_SESSION['gnaturaleza'] = $this->gnaturaleza;
          }
          if (!isset($this->gTiempoSegRefreshDoc) && isset($this->gtiemposegrefreshdoc)) 
          {
              $this->gTiempoSegRefreshDoc = $this->gtiemposegrefreshdoc;
          }
          if (isset($this->gTiempoSegRefreshDoc)) 
          {
              $_SESSION['gTiempoSegRefreshDoc'] = $this->gTiempoSegRefreshDoc;
          }
          if (!isset($this->gGrupoUsuarioComanda) && isset($this->ggrupousuariocomanda)) 
          {
              $this->gGrupoUsuarioComanda = $this->ggrupousuariocomanda;
          }
          if (isset($this->gGrupoUsuarioComanda)) 
          {
              $_SESSION['gGrupoUsuarioComanda'] = $this->gGrupoUsuarioComanda;
          }
          if (!isset($this->gModificarInventario) && isset($this->gmodificarinventario)) 
          {
              $this->gModificarInventario = $this->gmodificarinventario;
          }
          if (isset($this->gModificarInventario)) 
          {
              $_SESSION['gModificarInventario'] = $this->gModificarInventario;
          }
          if (isset($this->gsesion_id)) 
          {
              $_SESSION['gsesion_id'] = $this->gsesion_id;
          }
          if (isset($this->gdescripciongrupo)) 
          {
              $_SESSION['gdescripciongrupo'] = $this->gdescripciongrupo;
          }
          if (isset($this->gsiaperturacaja)) 
          {
              $_SESSION['gsiaperturacaja'] = $this->gsiaperturacaja;
          }
          if (isset($this->docpordefectoenpos)) 
          {
              $_SESSION['docpordefectoenpos'] = $this->docpordefectoenpos;
          }
          if (isset($this->empresa)) 
          {
              $_SESSION['empresa'] = $this->empresa;
          }
          if (isset($this->regimen_emp)) 
          {
              $_SESSION['regimen_emp'] = $this->regimen_emp;
          }
          if (isset($this->nit)) 
          {
              $_SESSION['nit'] = $this->nit;
          }
          if (isset($this->direccion)) 
          {
              $_SESSION['direccion'] = $this->direccion;
          }
          if (isset($this->tele)) 
          {
              $_SESSION['tele'] = $this->tele;
          }
          if (isset($this->gsiescajero)) 
          {
              $_SESSION['gsiescajero'] = $this->gsiescajero;
          }
          if (isset($this->gncajas)) 
          {
              $_SESSION['gncajas'] = $this->gncajas;
          }
          if (isset($this->gdescuento_general)) 
          {
              $_SESSION['gdescuento_general'] = $this->gdescuento_general;
          }
          if (isset($this->gurl_reg_empresa)) 
          {
              $_SESSION['gurl_reg_empresa'] = $this->gurl_reg_empresa;
          }
          if (isset($this->gurl_reg_software)) 
          {
              $_SESSION['gurl_reg_software'] = $this->gurl_reg_software;
          }
          if (isset($this->gurl_reg_certificado)) 
          {
              $_SESSION['gurl_reg_certificado'] = $this->gurl_reg_certificado;
          }
          if (isset($this->gurl_reg_subirlogo)) 
          {
              $_SESSION['gurl_reg_subirlogo'] = $this->gurl_reg_subirlogo;
          }
          if (isset($this->gurl_reg_resolucion)) 
          {
              $_SESSION['gurl_reg_resolucion'] = $this->gurl_reg_resolucion;
          }
          if (isset($this->gurl_rangos)) 
          {
              $_SESSION['gurl_rangos'] = $this->gurl_rangos;
          }
          if (isset($this->gurl_enviofacturas)) 
          {
              $_SESSION['gurl_enviofacturas'] = $this->gurl_enviofacturas;
          }
          if (isset($this->gurl_envionotacredito)) 
          {
              $_SESSION['gurl_envionotacredito'] = $this->gurl_envionotacredito;
          }
          if (isset($this->gurl_envionotadebito)) 
          {
              $_SESSION['gurl_envionotadebito'] = $this->gurl_envionotadebito;
          }
          if (isset($this->par_idajuste)) 
          {
              $_SESSION['par_idajuste'] = $this->par_idajuste;
          }
          if (isset($this->par_fechainv)) 
          {
              $_SESSION['par_fechainv'] = $this->par_fechainv;
          }
          if (isset($this->edit_cantidad)) 
          {
              $_SESSION['edit_cantidad'] = $this->edit_cantidad;
          }
          if (isset($this->par_idproducto)) 
          {
              $_SESSION['par_idproducto'] = $this->par_idproducto;
          }
          if (isset($this->par_idfaccom)) 
          {
              $_SESSION['par_idfaccom'] = $this->par_idfaccom;
          }
          if (isset($this->cost_ant)) 
          {
              $_SESSION['cost_ant'] = $this->cost_ant;
          }
          if (isset($this->valorpar)) 
          {
              $_SESSION['valorpar'] = $this->valorpar;
          }
          if (isset($this->sw)) 
          {
              $_SESSION['sw'] = $this->sw;
          }
          if (isset($this->par_idinvself)) 
          {
              $_SESSION['par_idinvself'] = $this->par_idinvself;
          }
          if (isset($this->par_movimiento)) 
          {
              $_SESSION['par_movimiento'] = $this->par_movimiento;
          }
          if (isset($this->par_numfacventa)) 
          {
              $_SESSION['par_numfacventa'] = $this->par_numfacventa;
          }
          if (isset($this->par_numero)) 
          {
              $_SESSION['par_numero'] = $this->par_numero;
          }
          if (isset($this->par_idmovimiento)) 
          {
              $_SESSION['par_idmovimiento'] = $this->par_idmovimiento;
          }
          if (isset($this->par_destino)) 
          {
              $_SESSION['par_destino'] = $this->par_destino;
          }
          if (isset($this->fmen)) 
          {
              $_SESSION['fmen'] = $this->fmen;
          }
          if (isset($this->fmay)) 
          {
              $_SESSION['fmay'] = $this->fmay;
          }
          if (isset($this->par_idmov)) 
          {
              $_SESSION['par_idmov'] = $this->par_idmov;
          }
          if (isset($this->t_iva)) 
          {
              $_SESSION['t_iva'] = $this->t_iva;
          }
          if (isset($this->sum_iva)) 
          {
              $_SESSION['sum_iva'] = $this->sum_iva;
          }
          if (isset($this->par_cliente)) 
          {
              $_SESSION['par_cliente'] = $this->par_cliente;
          }
          if (isset($this->proveedor)) 
          {
              $_SESSION['proveedor'] = $this->proveedor;
          }
          if (isset($this->cliente)) 
          {
              $_SESSION['cliente'] = $this->cliente;
          }
          if (isset($this->unmay)) 
          {
              $_SESSION['unmay'] = $this->unmay;
          }
          if (isset($this->fac)) 
          {
              $_SESSION['fac'] = $this->fac;
          }
          if (isset($this->idpref)) 
          {
              $_SESSION['idpref'] = $this->idpref;
          }
          if (isset($this->gnube_activa)) 
          {
              $_SESSION['gnube_activa'] = $this->gnube_activa;
          }
          if (isset($this->grestaurar)) 
          {
              $_SESSION['grestaurar'] = $this->grestaurar;
          }
          if (isset($this->gtipo_empresa)) 
          {
              $_SESSION['gtipo_empresa'] = $this->gtipo_empresa;
          }
          if (isset($this->gtipo_negocio)) 
          {
              $_SESSION['gtipo_negocio'] = $this->gtipo_negocio;
          }
          if (!isset($this->gPermisosUsuario) && isset($this->gpermisosusuario)) 
          {
              $this->gPermisosUsuario = $this->gpermisosusuario;
          }
          if (isset($this->gPermisosUsuario)) 
          {
              $_SESSION['gPermisosUsuario'] = $this->gPermisosUsuario;
          }
          if (isset($this->gnuevaactualizacion)) 
          {
              $_SESSION['gnuevaactualizacion'] = $this->gnuevaactualizacion;
          }
          if (!isset($this->gSerial) && isset($this->gserial)) 
          {
              $this->gSerial = $this->gserial;
          }
          if (isset($this->gSerial)) 
          {
              $_SESSION['gSerial'] = $this->gSerial;
          }
          if (isset($this->gmensaje)) 
          {
              $_SESSION['gmensaje'] = $this->gmensaje;
          }
          if (isset($this->glicencia)) 
          {
              $_SESSION['glicencia'] = $this->glicencia;
          }
          if (isset($this->gaplicaciones_menu)) 
          {
              $_SESSION['gaplicaciones_menu'] = $this->gaplicaciones_menu;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['seg_login']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['seg_login']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['seg_login']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['seg_login']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['seg_login']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['seg_login']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['seg_login']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['seg_login']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['seg_login']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['seg_login']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new seg_login_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['seg_login']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['seg_login']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['seg_login'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['seg_login']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['seg_login']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('seg_login') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['seg_login']['label'] = "Facilweb";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "seg_login")
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



      $_SESSION['scriptcase']['error_icon']['seg_login']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['seg_login'] = "";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['seg_login']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['seg_login']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['seg_login']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['seg_login']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['seg_login']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['seg_login']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['ok'] = "on";
      $this->nmgp_botoes['facebook'] = "off";
      $this->nmgp_botoes['google'] = "off";
      $this->nmgp_botoes['twitter'] = "off";
      $this->nmgp_botoes['paypal'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['seg_login']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['seg_login']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['seg_login']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['seg_login']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['seg_login'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['seg_login'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['seg_login']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['seg_login']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['seg_login']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['seg_login']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['seg_login']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['seg_login']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['seg_login']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['seg_login']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['seg_login']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['seg_login']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['seg_login']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['seg_login']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['seg_login']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['seg_login']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['seg_login']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['seg_login']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['seg_login']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['seg_login']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['seg_login']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("seg_login", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'seg_login_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'seg_login_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('contr:' == substr($str_link_webhelp, 0, 6))
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
          require_once($this->Ini->path_embutida . 'seg_login/seg_login_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "seg_login_erro.class.php"); 
      }
      $this->Erro      = new seg_login_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['seg_login']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['seg_login']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['seg_login']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['dados_form'];
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
      $_SESSION['scriptcase']['seg_login']['contr_erro'] = 'on';
if (!isset($this->sc_temp_usr_grupo)) {$this->sc_temp_usr_grupo = (isset($_SESSION['usr_grupo'])) ? $_SESSION['usr_grupo'] : "";}
if (!isset($this->sc_temp_usr_name)) {$this->sc_temp_usr_name = (isset($_SESSION['usr_name'])) ? $_SESSION['usr_name'] : "";}
if (!isset($this->sc_temp_usr_iduser)) {$this->sc_temp_usr_iduser = (isset($_SESSION['usr_iduser'])) ? $_SESSION['usr_iduser'] : "";}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
  unset($_SESSION['scriptcase']['sc_apl_seg']);unset($_SESSION['scriptcase']['pass']);unset($_SESSION['usr_login']);
 unset($this->sc_temp_usr_login);
 unset($_SESSION['usr_iduser']);
 unset($this->sc_temp_usr_iduser);
 unset($_SESSION['usr_name']);
 unset($this->sc_temp_usr_name);
 unset($_SESSION['usr_grupo']);
 unset($this->sc_temp_usr_grupo);
;


if (isset($_SESSION['scriptcase']['sc_connection_edit']))
{
    unset($_SESSION['scriptcase']['sc_connection_edit']);
}


$this->iniGlobales();
if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
if (isset($this->sc_temp_usr_iduser)) { $_SESSION['usr_iduser'] = $this->sc_temp_usr_iduser;}
if (isset($this->sc_temp_usr_name)) { $_SESSION['usr_name'] = $this->sc_temp_usr_name;}
if (isset($this->sc_temp_usr_grupo)) { $_SESSION['usr_grupo'] = $this->sc_temp_usr_grupo;}
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off'; 
      }
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['seg_login']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['seg_login']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


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
          if ('validate_empresa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'empresa');
          }
          if ('validate_login' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'login');
          }
          if ('validate_pswd' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pswd');
          }
          if ('validate_nit' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nit');
          }
          seg_login_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              seg_login_pack_ajax_response();
              exit;
          }
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
          $_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  seg_login_pack_ajax_response();
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
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  seg_login_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
//
      if (!isset($nm_form_submit) && $this->nmgp_opcao != "nada")
      {
          $this->empresa = "" ;  
          $this->login = "" ;  
          $this->pswd = "" ;  
          $this->nit = "" ;  
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['dados_form']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['dados_form']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['dados_form'] as $NM_campo => $NM_valor)
              {
                  $$NM_campo = $NM_valor;
              }
          }
      }
      else
      {
           if ($this->nmgp_opcao != "nada")
           {
           }
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['recarga'] = $this->nmgp_opcao;
      }
      if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "" || $campos_erro != "" || !isset($this->bok) || $this->bok != "OK" || $this->nmgp_opcao == "recarga")
      {
          if ($Campos_Crit == "" && empty($Campos_Falta) && $this->Campos_Mens_erro == "" && !isset($this->bok) && $this->nmgp_opcao != "recarga")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['campos']))
              { 
                  $empresa = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['campos'][0]; 
                  $login = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['campos'][1]; 
                  $pswd = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['campos'][2]; 
                  $nit = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['campos'][3]; 
              } 
          }
          $this->nm_gera_html();
          $this->NM_close_db(); 
      }
      elseif (isset($this->bok) && $this->bok == "OK")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['campos'] = array(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['campos'][0] = $this->empresa; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['campos'][1] = $this->login; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['campos'][2] = $this->pswd; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['campos'][3] = $this->nit; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['redir'] == "redir")
          {
              $this->nmgp_redireciona(); 
          }
          else
          {
              $contr_menu = "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['iframe_menu'])
              {
                  $contr_menu = "glo_menu";
              }
              if (isset($_SESSION['scriptcase']['sc_ult_apl_menu']) && in_array("seg_login", $_SESSION['scriptcase']['sc_ult_apl_menu']))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona_form("seg_login_fim.php", $this->nm_location, $contr_menu); 
              }
              elseif (!$this->NM_ajax_flag)
              {
                  $this->nm_gera_html();
                  if (!$_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['embutida_proc'])
                  { 
                      $this->NM_close_db(); 
                  } 
              }
          }
          $this->NM_close_db(); 
          if ($this->NM_ajax_flag)
          {
              seg_login_pack_ajax_response();
              exit;
          }
      }
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "seg_login.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Facilweb") ?></TITLE>
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
<form name="Fdown" method="get" action="seg_login_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="seg_login"> 
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
           $this->Ini->nm_db_conn_mysql->Close(); 
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
           case 'empresa':
               return "Empresa";
               break;
           case 'login':
               return "Login";
               break;
           case 'pswd':
               return "Pswd";
               break;
           case 'nit':
               return "Nit";
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
              if (!isset($this->NM_ajax_info['errList']['geral_seg_login']) || !is_array($this->NM_ajax_info['errList']['geral_seg_login']))
              {
                  $this->NM_ajax_info['errList']['geral_seg_login'] = array();
              }
              $this->NM_ajax_info['errList']['geral_seg_login'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'empresa' == $filtro)) || (is_array($filtro) && in_array('empresa', $filtro)))
        $this->ValidateField_empresa($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "empresa";

      if ((!is_array($filtro) && ('' == $filtro || 'login' == $filtro)) || (is_array($filtro) && in_array('login', $filtro)))
        $this->ValidateField_login($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "login";

      if ((!is_array($filtro) && ('' == $filtro || 'pswd' == $filtro)) || (is_array($filtro) && in_array('pswd', $filtro)))
        $this->ValidateField_pswd($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "pswd";

      if ((!is_array($filtro) && ('' == $filtro || 'nit' == $filtro)) || (is_array($filtro) && in_array('nit', $filtro)))
        $this->ValidateField_nit($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $this->scFormFocusErrorName && ( !empty($Campos_Crit) || !empty($Campos_Falta) ))
          $this->scFormFocusErrorName = "nit";


      if (empty($Campos_Crit) && empty($Campos_Falta))
      {
      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['seg_login']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_empresa = $this->empresa;
    $original_login = $this->login;
    $original_nit = $this->nit;
    $original_pswd = $this->pswd;
}
if (!isset($this->sc_temp_usr_grupo)) {$this->sc_temp_usr_grupo = (isset($_SESSION['usr_grupo'])) ? $_SESSION['usr_grupo'] : "";}
if (!isset($this->sc_temp_usr_name)) {$this->sc_temp_usr_name = (isset($_SESSION['usr_name'])) ? $_SESSION['usr_name'] : "";}
if (!isset($this->sc_temp_usr_iduser)) {$this->sc_temp_usr_iduser = (isset($_SESSION['usr_iduser'])) ? $_SESSION['usr_iduser'] : "";}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
if (!isset($this->sc_temp_usr_database)) {$this->sc_temp_usr_database = (isset($_SESSION['usr_database'])) ? $_SESSION['usr_database'] : "";}
  if($this->empresa  == '' && $this->nit  == ''){
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= 'Campo empresa vacio';
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_seg_login';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_seg_login';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = 'Campo empresa vacio';
 }
;
	if (isset($this->Campos_Mens_erro) && !empty($this->Campos_Mens_erro))
{
 if (isset($this->sc_temp_usr_database)) { $_SESSION['usr_database'] = $this->sc_temp_usr_database;}
 if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
 if (isset($this->sc_temp_usr_iduser)) { $_SESSION['usr_iduser'] = $this->sc_temp_usr_iduser;}
 if (isset($this->sc_temp_usr_name)) { $_SESSION['usr_name'] = $this->sc_temp_usr_name;}
 if (isset($this->sc_temp_usr_grupo)) { $_SESSION['usr_grupo'] = $this->sc_temp_usr_grupo;}
    $_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off';
    return;
}
}

if($this->sc_logged_is_blocked()) { if (isset($this->Campos_Mens_erro) && !empty($this->Campos_Mens_erro))
{
 if (isset($this->sc_temp_usr_database)) { $_SESSION['usr_database'] = $this->sc_temp_usr_database;}
 if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
 if (isset($this->sc_temp_usr_iduser)) { $_SESSION['usr_iduser'] = $this->sc_temp_usr_iduser;}
 if (isset($this->sc_temp_usr_name)) { $_SESSION['usr_name'] = $this->sc_temp_usr_name;}
 if (isset($this->sc_temp_usr_grupo)) { $_SESSION['usr_grupo'] = $this->sc_temp_usr_grupo;}
    $_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off';
    return;
}
}

if($this->nit  != ''){

	$data_company = $this->getCompanyDatabase($this->nit );

	if($data_company['code'] == 200){
		$data = $data_company['data'];
		$usr_database = $data[0]['nombre'];
	} else{
		
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $data_company['msg'];
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_seg_login';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_seg_login';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $data_company['msg'];
 }
;
		if (isset($this->Campos_Mens_erro) && !empty($this->Campos_Mens_erro))
{
 if (isset($this->sc_temp_usr_database)) { $_SESSION['usr_database'] = $this->sc_temp_usr_database;}
 if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
 if (isset($this->sc_temp_usr_iduser)) { $_SESSION['usr_iduser'] = $this->sc_temp_usr_iduser;}
 if (isset($this->sc_temp_usr_name)) { $_SESSION['usr_name'] = $this->sc_temp_usr_name;}
 if (isset($this->sc_temp_usr_grupo)) { $_SESSION['usr_grupo'] = $this->sc_temp_usr_grupo;}
    $_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off';
    return;
}
}
	
} else {

	$usr_database = $this->empresa ;    
}


 if (isset($usr_database)) {$this->sc_temp_usr_database = $usr_database;}
;


$slogin = $this->Db->qstr($this->login );
$spswd = $this->Db->qstr($this->pswd );

$sql = "SELECT  
		u.idusuarios,
		u.nombre,
        u.activo,
        u.grupo,
        u.password
	FROM $usr_database.usuarios u
	    WHERE u.usuario = $slogin
	AND u.password = $spswd";


 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if($this->rs ===false) {
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Error en consulta sql : ".$this->rs_erro ;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_seg_login';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_seg_login';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "Error en consulta sql : ".$this->rs_erro ;
 }
;
	if (isset($this->Campos_Mens_erro) && !empty($this->Campos_Mens_erro))
{
 if (isset($this->sc_temp_usr_database)) { $_SESSION['usr_database'] = $this->sc_temp_usr_database;}
 if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
 if (isset($this->sc_temp_usr_iduser)) { $_SESSION['usr_iduser'] = $this->sc_temp_usr_iduser;}
 if (isset($this->sc_temp_usr_name)) { $_SESSION['usr_name'] = $this->sc_temp_usr_name;}
 if (isset($this->sc_temp_usr_grupo)) { $_SESSION['usr_grupo'] = $this->sc_temp_usr_grupo;}
    $_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off';
    return;
}
} else if(empty($this->rs )) {

	$this->sc_logged_in_fail($this->login );

	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .=  $this->Ini->Nm_lang['lang_error_login'] ;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_seg_login';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_seg_login';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] =  $this->Ini->Nm_lang['lang_error_login'] ;
 }
;
	if (isset($this->Campos_Mens_erro) && !empty($this->Campos_Mens_erro))
{
 if (isset($this->sc_temp_usr_database)) { $_SESSION['usr_database'] = $this->sc_temp_usr_database;}
 if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
 if (isset($this->sc_temp_usr_iduser)) { $_SESSION['usr_iduser'] = $this->sc_temp_usr_iduser;}
 if (isset($this->sc_temp_usr_name)) { $_SESSION['usr_name'] = $this->sc_temp_usr_name;}
 if (isset($this->sc_temp_usr_grupo)) { $_SESSION['usr_grupo'] = $this->sc_temp_usr_grupo;}
    $_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off';
    return;
}
} else if(($this->rs[0][2] === 'N')) {
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .=  $this->Ini->Nm_lang['lang_error_not_active'] ;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_seg_login';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_seg_login';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] =  $this->Ini->Nm_lang['lang_error_not_active'] ;
 }
;
	if (isset($this->Campos_Mens_erro) && !empty($this->Campos_Mens_erro))
{
 if (isset($this->sc_temp_usr_database)) { $_SESSION['usr_database'] = $this->sc_temp_usr_database;}
 if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
 if (isset($this->sc_temp_usr_iduser)) { $_SESSION['usr_iduser'] = $this->sc_temp_usr_iduser;}
 if (isset($this->sc_temp_usr_name)) { $_SESSION['usr_name'] = $this->sc_temp_usr_name;}
 if (isset($this->sc_temp_usr_grupo)) { $_SESSION['usr_grupo'] = $this->sc_temp_usr_grupo;}
    $_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off';
    return;
}
} else  {
	$usr_login	= $this->login ;
	$usr_iduser = $this->rs[0][0];
	$usr_name = $this->rs[0][1];
	$usr_grupo  = $this->rs[0][3];

	 if (isset($usr_login)) {$this->sc_temp_usr_login = $usr_login;}
;
	 if (isset($usr_iduser)) {$this->sc_temp_usr_iduser = $usr_iduser;}
;
	 if (isset($usr_name)) {$this->sc_temp_usr_name = $usr_name;}
;
	 if (isset($usr_grupo)) {$this->sc_temp_usr_grupo = $usr_grupo;}
;
	
	$this->setGlobales($slogin, $spswd, $usr_database);

}
if (isset($this->sc_temp_usr_database)) { $_SESSION['usr_database'] = $this->sc_temp_usr_database;}
if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
if (isset($this->sc_temp_usr_iduser)) { $_SESSION['usr_iduser'] = $this->sc_temp_usr_iduser;}
if (isset($this->sc_temp_usr_name)) { $_SESSION['usr_name'] = $this->sc_temp_usr_name;}
if (isset($this->sc_temp_usr_grupo)) { $_SESSION['usr_grupo'] = $this->sc_temp_usr_grupo;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_empresa != $this->empresa || (isset($bFlagRead_empresa) && $bFlagRead_empresa)))
    {
        $this->ajax_return_values_empresa(true);
    }
    if (($original_login != $this->login || (isset($bFlagRead_login) && $bFlagRead_login)))
    {
        $this->ajax_return_values_login(true);
    }
    if (($original_nit != $this->nit || (isset($bFlagRead_nit) && $bFlagRead_nit)))
    {
        $this->ajax_return_values_nit(true);
    }
    if (($original_pswd != $this->pswd || (isset($bFlagRead_pswd) && $bFlagRead_pswd)))
    {
        $this->ajax_return_values_pswd(true);
    }
}
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off'; 
      }
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

      if (empty($Campos_Crit) && empty($Campos_Falta) && empty($this->Campos_Mens_erro))
      {
          if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
          {
              $_SESSION['scriptcase']['seg_login']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_login = $this->login;
}
  $this->sc_validate_success();
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_login != $this->login || (isset($bFlagRead_login) && $bFlagRead_login)))
    {
        $this->ajax_return_values_login(true);
    }
}
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off'; 
          }
      }
   }

    function ValidateField_empresa(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->empresa) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['Lookup_empresa']) && !in_array($this->empresa, $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['Lookup_empresa']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['empresa']))
                   {
                       $Campos_Erros['empresa'] = array();
                   }
                   $Campos_Erros['empresa'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['empresa']) || !is_array($this->NM_ajax_info['errList']['empresa']))
                   {
                       $this->NM_ajax_info['errList']['empresa'] = array();
                   }
                   $this->NM_ajax_info['errList']['empresa'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'empresa';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_empresa

    function ValidateField_login(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['php_cmp_required']['login']) || $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['php_cmp_required']['login'] == "on")) 
      { 
          if ($this->login == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Login" ; 
              if (!isset($Campos_Erros['login']))
              {
                  $Campos_Erros['login'] = array();
              }
              $Campos_Erros['login'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['login']) || !is_array($this->NM_ajax_info['errList']['login']))
                  {
                      $this->NM_ajax_info['errList']['login'] = array();
                  }
                  $this->NM_ajax_info['errList']['login'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->login) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Login " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['login']))
              {
                  $Campos_Erros['login'] = array();
              }
              $Campos_Erros['login'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['login']) || !is_array($this->NM_ajax_info['errList']['login']))
              {
                  $this->NM_ajax_info['errList']['login'] = array();
              }
              $this->NM_ajax_info['errList']['login'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'login';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_login

    function ValidateField_pswd(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['php_cmp_required']['pswd']) || $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['php_cmp_required']['pswd'] == "on")) 
      { 
          if ($this->pswd == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Pswd" ; 
              if (!isset($Campos_Erros['pswd']))
              {
                  $Campos_Erros['pswd'] = array();
              }
              $Campos_Erros['pswd'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['pswd']) || !is_array($this->NM_ajax_info['errList']['pswd']))
                  {
                      $this->NM_ajax_info['errList']['pswd'] = array();
                  }
                  $this->NM_ajax_info['errList']['pswd'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->pswd) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Pswd " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['pswd']))
              {
                  $Campos_Erros['pswd'] = array();
              }
              $Campos_Erros['pswd'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['pswd']) || !is_array($this->NM_ajax_info['errList']['pswd']))
              {
                  $this->NM_ajax_info['errList']['pswd'] = array();
              }
              $this->NM_ajax_info['errList']['pswd'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pswd';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pswd

    function ValidateField_nit(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nit) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nit " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nit']))
              {
                  $Campos_Erros['nit'] = array();
              }
              $Campos_Erros['nit'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nit']) || !is_array($this->NM_ajax_info['errList']['nit']))
              {
                  $this->NM_ajax_info['errList']['nit'] = array();
              }
              $this->NM_ajax_info['errList']['nit'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
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
    $this->nmgp_dados_form['empresa'] = $this->empresa;
    $this->nmgp_dados_form['login'] = $this->login;
    $this->nmgp_dados_form['pswd'] = $this->pswd;
    $this->nmgp_dados_form['nit'] = $this->nit;
    $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
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
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
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

   function ajax_return_values()
   {
          $this->ajax_return_values_empresa();
          $this->ajax_return_values_login();
          $this->ajax_return_values_pswd();
          $this->ajax_return_values_nit();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          }
   } // ajax_return_values

          //----- empresa
   function ajax_return_values_empresa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("empresa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->empresa);
              $aLookup = array();
              $this->_tmp_lookup_empresa = $this->empresa;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['Lookup_empresa']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['Lookup_empresa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['Lookup_empresa']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['Lookup_empresa'] = array(); 
}
$aLookup[] = array(seg_login_pack_protect_string('') => str_replace('<', '&lt;',seg_login_pack_protect_string('Seleccione Empresa')));
$_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['Lookup_empresa'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   $nm_comando = "SELECT nombre, nombre_empresa  FROM empresas  ORDER BY nombre_empresa";
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(seg_login_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', seg_login_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['Lookup_empresa'][] = $rs->fields[0];
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
          $sSelComp = "name=\"empresa\"";
          if (isset($this->NM_ajax_info['select_html']['empresa']) && !empty($this->NM_ajax_info['select_html']['empresa']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['empresa']);
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

                  if ($this->empresa == $sValue)
                  {
                      $this->_tmp_lookup_empresa = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['empresa'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['empresa']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['empresa']['valList'][$i] = seg_login_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['empresa']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['empresa']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['empresa']['labList'] = $aLabel;
          }
   }

          //----- login
   function ajax_return_values_login($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("login", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->login);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['login'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- pswd
   function ajax_return_values_pswd($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pswd", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pswd);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pswd'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['upload_dir'][$fieldName][] = $newName;
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
//
function getCompanyDatabase($nit)
{
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'on';
  
$sql = 'SELECT nombre 
FROM empresas where nit = '.$this->nit;

$this->Db->fetchMode = ADODB_FETCH_BOTH;
 
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
$data = [];

if (false == $this->ds ) {

	$status = "error";
	$message='Tenemos Problemas!';
	$message=$this->ds_erro ;
	$code =  500;

} elseif ($this->ds->EOF) {

	$status = "warning";
	$message='No hemos encontrado empresa con el Nit '.$this->nit;
	$code = 300;
	$this->ds->Close();

} else {

	while (!$this->ds->EOF){

		$data[] = $this->ds->getRowAssoc(false);
		$this->ds->moveNext();
	}

	$status = "success";
	$message="record found!";
	$code = 200;

	$this->ds->Close();
}

$res = [
	"status" => $status,
	"msg" => $message,
	"code" => $code,
	"data" => $data,
	"sql" => $sql
];

return $res;
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off';
}
function iniGlobales()
{
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gncajas)) {$this->sc_temp_gncajas = (isset($_SESSION['gncajas'])) ? $_SESSION['gncajas'] : "";}
if (!isset($this->sc_temp_gdescuento_general)) {$this->sc_temp_gdescuento_general = (isset($_SESSION['gdescuento_general'])) ? $_SESSION['gdescuento_general'] : "";}
if (!isset($this->sc_temp_gaplicaciones_menu)) {$this->sc_temp_gaplicaciones_menu = (isset($_SESSION['gaplicaciones_menu'])) ? $_SESSION['gaplicaciones_menu'] : "";}
if (!isset($this->sc_temp_gidbanco)) {$this->sc_temp_gidbanco = (isset($_SESSION['gidbanco'])) ? $_SESSION['gidbanco'] : "";}
if (!isset($this->sc_temp_glicencia)) {$this->sc_temp_glicencia = (isset($_SESSION['glicencia'])) ? $_SESSION['glicencia'] : "";}
if (!isset($this->sc_temp_gGrupoUsuarioComanda)) {$this->sc_temp_gGrupoUsuarioComanda = (isset($_SESSION['gGrupoUsuarioComanda'])) ? $_SESSION['gGrupoUsuarioComanda'] : "";}
if (!isset($this->sc_temp_gimpresorapos)) {$this->sc_temp_gimpresorapos = (isset($_SESSION['gimpresorapos'])) ? $_SESSION['gimpresorapos'] : "";}
if (!isset($this->sc_temp_gTiempoSegRefreshDoc)) {$this->sc_temp_gTiempoSegRefreshDoc = (isset($_SESSION['gTiempoSegRefreshDoc'])) ? $_SESSION['gTiempoSegRefreshDoc'] : "";}
if (!isset($this->sc_temp_gmensaje)) {$this->sc_temp_gmensaje = (isset($_SESSION['gmensaje'])) ? $_SESSION['gmensaje'] : "";}
if (!isset($this->sc_temp_gSerial)) {$this->sc_temp_gSerial = (isset($_SESSION['gSerial'])) ? $_SESSION['gSerial'] : "";}
if (!isset($this->sc_temp_gserialguardado)) {$this->sc_temp_gserialguardado = (isset($_SESSION['gserialguardado'])) ? $_SESSION['gserialguardado'] : "";}
if (!isset($this->sc_temp_gespaciadodetallefactura)) {$this->sc_temp_gespaciadodetallefactura = (isset($_SESSION['gespaciadodetallefactura'])) ? $_SESSION['gespaciadodetallefactura'] : "";}
if (!isset($this->sc_temp_gconsolidararticulos)) {$this->sc_temp_gconsolidararticulos = (isset($_SESSION['gconsolidararticulos'])) ? $_SESSION['gconsolidararticulos'] : "";}
if (!isset($this->sc_temp_glineasporfactura)) {$this->sc_temp_glineasporfactura = (isset($_SESSION['glineasporfactura'])) ? $_SESSION['glineasporfactura'] : "";}
if (!isset($this->sc_temp_gnuevaactualizacion)) {$this->sc_temp_gnuevaactualizacion = (isset($_SESSION['gnuevaactualizacion'])) ? $_SESSION['gnuevaactualizacion'] : "";}
if (!isset($this->sc_temp_gusuariologueado)) {$this->sc_temp_gusuariologueado = (isset($_SESSION['gusuariologueado'])) ? $_SESSION['gusuariologueado'] : "";}
if (!isset($this->sc_temp_gidresolucion)) {$this->sc_temp_gidresolucion = (isset($_SESSION['gidresolucion'])) ? $_SESSION['gidresolucion'] : "";}
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
if (!isset($this->sc_temp_gnombreusuario)) {$this->sc_temp_gnombreusuario = (isset($_SESSION['gnombreusuario'])) ? $_SESSION['gnombreusuario'] : "";}
if (!isset($this->sc_temp_gPermisosUsuario)) {$this->sc_temp_gPermisosUsuario = (isset($_SESSION['gPermisosUsuario'])) ? $_SESSION['gPermisosUsuario'] : "";}
if (!isset($this->sc_temp_gtipo_negocio)) {$this->sc_temp_gtipo_negocio = (isset($_SESSION['gtipo_negocio'])) ? $_SESSION['gtipo_negocio'] : "";}
if (!isset($this->sc_temp_gtipo_empresa)) {$this->sc_temp_gtipo_empresa = (isset($_SESSION['gtipo_empresa'])) ? $_SESSION['gtipo_empresa'] : "";}
if (!isset($this->sc_temp_grestaurar)) {$this->sc_temp_grestaurar = (isset($_SESSION['grestaurar'])) ? $_SESSION['grestaurar'] : "";}
if (!isset($this->sc_temp_regimen_emp)) {$this->sc_temp_regimen_emp = (isset($_SESSION['regimen_emp'])) ? $_SESSION['regimen_emp'] : "";}
if (!isset($this->sc_temp_gnube_activa)) {$this->sc_temp_gnube_activa = (isset($_SESSION['gnube_activa'])) ? $_SESSION['gnube_activa'] : "";}
if (!isset($this->sc_temp_docpordefectoenpos)) {$this->sc_temp_docpordefectoenpos = (isset($_SESSION['docpordefectoenpos'])) ? $_SESSION['docpordefectoenpos'] : "";}
if (!isset($this->sc_temp_gsiescajero)) {$this->sc_temp_gsiescajero = (isset($_SESSION['gsiescajero'])) ? $_SESSION['gsiescajero'] : "";}
if (!isset($this->sc_temp_gsiaperturacaja)) {$this->sc_temp_gsiaperturacaja = (isset($_SESSION['gsiaperturacaja'])) ? $_SESSION['gsiaperturacaja'] : "";}
if (!isset($this->sc_temp_idpref)) {$this->sc_temp_idpref = (isset($_SESSION['idpref'])) ? $_SESSION['idpref'] : "";}
if (!isset($this->sc_temp_fac)) {$this->sc_temp_fac = (isset($_SESSION['fac'])) ? $_SESSION['fac'] : "";}
if (!isset($this->sc_temp_unmay)) {$this->sc_temp_unmay = (isset($_SESSION['unmay'])) ? $_SESSION['unmay'] : "";}
if (!isset($this->sc_temp_cliente)) {$this->sc_temp_cliente = (isset($_SESSION['cliente'])) ? $_SESSION['cliente'] : "";}
if (!isset($this->sc_temp_proveedor)) {$this->sc_temp_proveedor = (isset($_SESSION['proveedor'])) ? $_SESSION['proveedor'] : "";}
if (!isset($this->sc_temp_par_cliente)) {$this->sc_temp_par_cliente = (isset($_SESSION['par_cliente'])) ? $_SESSION['par_cliente'] : "";}
if (!isset($this->sc_temp_sum_iva)) {$this->sc_temp_sum_iva = (isset($_SESSION['sum_iva'])) ? $_SESSION['sum_iva'] : "";}
if (!isset($this->sc_temp_t_iva)) {$this->sc_temp_t_iva = (isset($_SESSION['t_iva'])) ? $_SESSION['t_iva'] : "";}
if (!isset($this->sc_temp_tele)) {$this->sc_temp_tele = (isset($_SESSION['tele'])) ? $_SESSION['tele'] : "";}
if (!isset($this->sc_temp_direccion)) {$this->sc_temp_direccion = (isset($_SESSION['direccion'])) ? $_SESSION['direccion'] : "";}
if (!isset($this->sc_temp_nit)) {$this->sc_temp_nit = (isset($_SESSION['nit'])) ? $_SESSION['nit'] : "";}
if (!isset($this->sc_temp_empresa)) {$this->sc_temp_empresa = (isset($_SESSION['empresa'])) ? $_SESSION['empresa'] : "";}
if (!isset($this->sc_temp_par_idmov)) {$this->sc_temp_par_idmov = (isset($_SESSION['par_idmov'])) ? $_SESSION['par_idmov'] : "";}
if (!isset($this->sc_temp_fmay)) {$this->sc_temp_fmay = (isset($_SESSION['fmay'])) ? $_SESSION['fmay'] : "";}
if (!isset($this->sc_temp_fmen)) {$this->sc_temp_fmen = (isset($_SESSION['fmen'])) ? $_SESSION['fmen'] : "";}
if (!isset($this->sc_temp_par_destino)) {$this->sc_temp_par_destino = (isset($_SESSION['par_destino'])) ? $_SESSION['par_destino'] : "";}
if (!isset($this->sc_temp_par_idmovimiento)) {$this->sc_temp_par_idmovimiento = (isset($_SESSION['par_idmovimiento'])) ? $_SESSION['par_idmovimiento'] : "";}
if (!isset($this->sc_temp_par_numero)) {$this->sc_temp_par_numero = (isset($_SESSION['par_numero'])) ? $_SESSION['par_numero'] : "";}
if (!isset($this->sc_temp_par_numfacventa)) {$this->sc_temp_par_numfacventa = (isset($_SESSION['par_numfacventa'])) ? $_SESSION['par_numfacventa'] : "";}
if (!isset($this->sc_temp_par_movimiento)) {$this->sc_temp_par_movimiento = (isset($_SESSION['par_movimiento'])) ? $_SESSION['par_movimiento'] : "";}
if (!isset($this->sc_temp_par_idinvself)) {$this->sc_temp_par_idinvself = (isset($_SESSION['par_idinvself'])) ? $_SESSION['par_idinvself'] : "";}
if (!isset($this->sc_temp_sw)) {$this->sc_temp_sw = (isset($_SESSION['sw'])) ? $_SESSION['sw'] : "";}
if (!isset($this->sc_temp_valorpar)) {$this->sc_temp_valorpar = (isset($_SESSION['valorpar'])) ? $_SESSION['valorpar'] : "";}
if (!isset($this->sc_temp_cost_ant)) {$this->sc_temp_cost_ant = (isset($_SESSION['cost_ant'])) ? $_SESSION['cost_ant'] : "";}
if (!isset($this->sc_temp_par_idfaccom)) {$this->sc_temp_par_idfaccom = (isset($_SESSION['par_idfaccom'])) ? $_SESSION['par_idfaccom'] : "";}
if (!isset($this->sc_temp_par_idproducto)) {$this->sc_temp_par_idproducto = (isset($_SESSION['par_idproducto'])) ? $_SESSION['par_idproducto'] : "";}
if (!isset($this->sc_temp_edit_cantidad)) {$this->sc_temp_edit_cantidad = (isset($_SESSION['edit_cantidad'])) ? $_SESSION['edit_cantidad'] : "";}
if (!isset($this->sc_temp_par_fechainv)) {$this->sc_temp_par_fechainv = (isset($_SESSION['par_fechainv'])) ? $_SESSION['par_fechainv'] : "";}
if (!isset($this->sc_temp_par_idajuste)) {$this->sc_temp_par_idajuste = (isset($_SESSION['par_idajuste'])) ? $_SESSION['par_idajuste'] : "";}
if (!isset($this->sc_temp_gbd_seleccionada)) {$this->sc_temp_gbd_seleccionada = (isset($_SESSION['gbd_seleccionada'])) ? $_SESSION['gbd_seleccionada'] : "";}
if (!isset($this->sc_temp_gOS)) {$this->sc_temp_gOS = (isset($_SESSION['gOS'])) ? $_SESSION['gOS'] : "";}
if (!isset($this->sc_temp_gurl_envionotadebito)) {$this->sc_temp_gurl_envionotadebito = (isset($_SESSION['gurl_envionotadebito'])) ? $_SESSION['gurl_envionotadebito'] : "";}
if (!isset($this->sc_temp_gurl_envionotacredito)) {$this->sc_temp_gurl_envionotacredito = (isset($_SESSION['gurl_envionotacredito'])) ? $_SESSION['gurl_envionotacredito'] : "";}
if (!isset($this->sc_temp_gurl_enviofacturas)) {$this->sc_temp_gurl_enviofacturas = (isset($_SESSION['gurl_enviofacturas'])) ? $_SESSION['gurl_enviofacturas'] : "";}
if (!isset($this->sc_temp_gurl_rangos)) {$this->sc_temp_gurl_rangos = (isset($_SESSION['gurl_rangos'])) ? $_SESSION['gurl_rangos'] : "";}
if (!isset($this->sc_temp_gurl_reg_resolucion)) {$this->sc_temp_gurl_reg_resolucion = (isset($_SESSION['gurl_reg_resolucion'])) ? $_SESSION['gurl_reg_resolucion'] : "";}
if (!isset($this->sc_temp_gurl_reg_subirlogo)) {$this->sc_temp_gurl_reg_subirlogo = (isset($_SESSION['gurl_reg_subirlogo'])) ? $_SESSION['gurl_reg_subirlogo'] : "";}
if (!isset($this->sc_temp_gurl_reg_certificado)) {$this->sc_temp_gurl_reg_certificado = (isset($_SESSION['gurl_reg_certificado'])) ? $_SESSION['gurl_reg_certificado'] : "";}
if (!isset($this->sc_temp_gurl_reg_software)) {$this->sc_temp_gurl_reg_software = (isset($_SESSION['gurl_reg_software'])) ? $_SESSION['gurl_reg_software'] : "";}
if (!isset($this->sc_temp_gurl_reg_empresa)) {$this->sc_temp_gurl_reg_empresa = (isset($_SESSION['gurl_reg_empresa'])) ? $_SESSION['gurl_reg_empresa'] : "";}
  



$this->sc_temp_gurl_reg_empresa     = 'https://www.apifacilweb.com/public/api/ubl2.1/config';
$this->sc_temp_gurl_reg_software    = 'http://www.apifacilweb.com/public/api/ubl2.1/config/software';
$this->sc_temp_gurl_reg_certificado = 'http://www.apifacilweb.com/public/api/ubl2.1/config/certificate';
$this->sc_temp_gurl_reg_subirlogo   = 'http://www.apifacilweb.com/public/api/ubl2.1/config/logo';
$this->sc_temp_gurl_reg_resolucion  = 'https://www.apifacilweb.com/public/api/ubl2.1/config/resolution';
$this->sc_temp_gurl_rangos          = 'https://www.apifacilweb.com/public/api/ubl2.1/numbering-range';
$this->sc_temp_gurl_enviofacturas   = 'https://www.apifacilweb.com/public/api/ubl2.1/invoice';   
$this->sc_temp_gurl_envionotacredito= 'https://www.apifacilweb.com/public/api/ubl2.1/credit-note';
$this->sc_temp_gurl_envionotadebito = 'https://www.apifacilweb.com/public/api/ubl2.1/debit-note';

$this->sc_temp_gOS = strtoupper(substr(PHP_OS, 0, 3));

$this->sc_temp_gbd_seleccionada = "";
$this->sc_temp_par_idajuste=0;
$this->sc_temp_par_fechainv=0;
$this->sc_temp_edit_cantidad=0;
$this->sc_temp_par_idproducto=0;
$this->sc_temp_par_idfaccom=0;
$this->sc_temp_cost_ant=0;
$this->sc_temp_valorpar=0;
$this->sc_temp_sw=0;
$this->sc_temp_par_idinvself=0;
$this->sc_temp_par_movimiento=0;
$this->sc_temp_par_numfacventa=0;
$this->sc_temp_par_numero=0;
$this->sc_temp_par_idmovimiento=0;
$this->sc_temp_par_destino=0;
$this->sc_temp_fmen=0;
$this->sc_temp_fmay=0;
$this->sc_temp_par_idmov=0;
$this->sc_temp_empresa="Empresa: DEMOSTRACION SOFTWARE FACILWEB";
$this->sc_temp_nit="Nit: 000000000-0";
$this->sc_temp_direccion="Dirección: Av. 24 # 16-17 B. Galán";
$this->sc_temp_tele="Tel/Fax (7)5825916";
$this->sc_temp_t_iva=0;
$this->sc_temp_sum_iva=0;
$this->sc_temp_par_cliente=0;
$this->sc_temp_proveedor=0;
$this->sc_temp_cliente=0;
$this->sc_temp_unmay=0;
$this->sc_temp_fac=0;
$this->sc_temp_idpref=0;
$this->sc_temp_gsiaperturacaja="NO";
$this->sc_temp_gsiescajero="NO";
$this->sc_temp_docpordefectoenpos="FV";
$this->sc_temp_gnube_activa = "NO";
$this->sc_temp_regimen_emp = 0;
$this->sc_temp_grestaurar = 'NO';
$this->sc_temp_gtipo_empresa = "ESCRITORIO";
$this->sc_temp_gtipo_negocio = "GENERAL";

$this->sc_temp_gPermisosUsuario = "";
$this->sc_temp_gnombreusuario = "";
$this->sc_temp_gidtercero = "";
$this->sc_temp_gidresolucion = "";
$this->sc_temp_gusuariologueado = "";
$this->sc_temp_gnuevaactualizacion = "";
if (isset($_SESSION['scriptcase']['sc_apl_conf']))
{
unset($_SESSION['scriptcase']['sc_apl_conf']);
}
;
$this->sc_temp_glineasporfactura = "";
$this->sc_temp_gconsolidararticulos = "";
$this->sc_temp_gespaciadodetallefactura = "";
$this->sc_temp_gserialguardado = "";
$this->sc_temp_gSerial = "";
$this->sc_temp_gmensaje = "";
$this->sc_temp_gTiempoSegRefreshDoc = 0;
$this->sc_temp_gimpresorapos = "";
$this->sc_temp_gGrupoUsuarioComanda = 0;
$this->sc_temp_glicencia = "";
$this->sc_temp_gidbanco = 1;

$this->sc_temp_gaplicaciones_menu = "";

$this->sc_temp_gdescuento_general = "0";

$this->sc_temp_gncajas = 0;

 
      $nm_select = "select serial_licencia from terminos order by idterminos asc limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vlic = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vlic[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vlic = false;
          $this->vlic_erro = $this->Db->ErrorMsg();
      } 
;

if(isset($this->vlic[0][0]))
{
$this->sc_temp_glicencia = $this->vlic[0][0];
}

$vsql = "select modo from generales where id_general='1'";
 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vTempresa = array();
      $this->vtempresa = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vTempresa[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vtempresa[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vTempresa = false;
          $this->vTempresa_erro = $this->Db->ErrorMsg();
          $this->vtempresa = false;
          $this->vtempresa_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vtempresa[0][0]))
{
	$this->sc_temp_gtipo_empresa = $this->vtempresa[0][0];
}
if (isset($this->sc_temp_gurl_reg_empresa)) { $_SESSION['gurl_reg_empresa'] = $this->sc_temp_gurl_reg_empresa;}
if (isset($this->sc_temp_gurl_reg_software)) { $_SESSION['gurl_reg_software'] = $this->sc_temp_gurl_reg_software;}
if (isset($this->sc_temp_gurl_reg_certificado)) { $_SESSION['gurl_reg_certificado'] = $this->sc_temp_gurl_reg_certificado;}
if (isset($this->sc_temp_gurl_reg_subirlogo)) { $_SESSION['gurl_reg_subirlogo'] = $this->sc_temp_gurl_reg_subirlogo;}
if (isset($this->sc_temp_gurl_reg_resolucion)) { $_SESSION['gurl_reg_resolucion'] = $this->sc_temp_gurl_reg_resolucion;}
if (isset($this->sc_temp_gurl_rangos)) { $_SESSION['gurl_rangos'] = $this->sc_temp_gurl_rangos;}
if (isset($this->sc_temp_gurl_enviofacturas)) { $_SESSION['gurl_enviofacturas'] = $this->sc_temp_gurl_enviofacturas;}
if (isset($this->sc_temp_gurl_envionotacredito)) { $_SESSION['gurl_envionotacredito'] = $this->sc_temp_gurl_envionotacredito;}
if (isset($this->sc_temp_gurl_envionotadebito)) { $_SESSION['gurl_envionotadebito'] = $this->sc_temp_gurl_envionotadebito;}
if (isset($this->sc_temp_gOS)) { $_SESSION['gOS'] = $this->sc_temp_gOS;}
if (isset($this->sc_temp_gbd_seleccionada)) { $_SESSION['gbd_seleccionada'] = $this->sc_temp_gbd_seleccionada;}
if (isset($this->sc_temp_par_idajuste)) { $_SESSION['par_idajuste'] = $this->sc_temp_par_idajuste;}
if (isset($this->sc_temp_par_fechainv)) { $_SESSION['par_fechainv'] = $this->sc_temp_par_fechainv;}
if (isset($this->sc_temp_edit_cantidad)) { $_SESSION['edit_cantidad'] = $this->sc_temp_edit_cantidad;}
if (isset($this->sc_temp_par_idproducto)) { $_SESSION['par_idproducto'] = $this->sc_temp_par_idproducto;}
if (isset($this->sc_temp_par_idfaccom)) { $_SESSION['par_idfaccom'] = $this->sc_temp_par_idfaccom;}
if (isset($this->sc_temp_cost_ant)) { $_SESSION['cost_ant'] = $this->sc_temp_cost_ant;}
if (isset($this->sc_temp_valorpar)) { $_SESSION['valorpar'] = $this->sc_temp_valorpar;}
if (isset($this->sc_temp_sw)) { $_SESSION['sw'] = $this->sc_temp_sw;}
if (isset($this->sc_temp_par_idinvself)) { $_SESSION['par_idinvself'] = $this->sc_temp_par_idinvself;}
if (isset($this->sc_temp_par_movimiento)) { $_SESSION['par_movimiento'] = $this->sc_temp_par_movimiento;}
if (isset($this->sc_temp_par_numfacventa)) { $_SESSION['par_numfacventa'] = $this->sc_temp_par_numfacventa;}
if (isset($this->sc_temp_par_numero)) { $_SESSION['par_numero'] = $this->sc_temp_par_numero;}
if (isset($this->sc_temp_par_idmovimiento)) { $_SESSION['par_idmovimiento'] = $this->sc_temp_par_idmovimiento;}
if (isset($this->sc_temp_par_destino)) { $_SESSION['par_destino'] = $this->sc_temp_par_destino;}
if (isset($this->sc_temp_fmen)) { $_SESSION['fmen'] = $this->sc_temp_fmen;}
if (isset($this->sc_temp_fmay)) { $_SESSION['fmay'] = $this->sc_temp_fmay;}
if (isset($this->sc_temp_par_idmov)) { $_SESSION['par_idmov'] = $this->sc_temp_par_idmov;}
if (isset($this->sc_temp_empresa)) { $_SESSION['empresa'] = $this->sc_temp_empresa;}
if (isset($this->sc_temp_nit)) { $_SESSION['nit'] = $this->sc_temp_nit;}
if (isset($this->sc_temp_direccion)) { $_SESSION['direccion'] = $this->sc_temp_direccion;}
if (isset($this->sc_temp_tele)) { $_SESSION['tele'] = $this->sc_temp_tele;}
if (isset($this->sc_temp_t_iva)) { $_SESSION['t_iva'] = $this->sc_temp_t_iva;}
if (isset($this->sc_temp_sum_iva)) { $_SESSION['sum_iva'] = $this->sc_temp_sum_iva;}
if (isset($this->sc_temp_par_cliente)) { $_SESSION['par_cliente'] = $this->sc_temp_par_cliente;}
if (isset($this->sc_temp_proveedor)) { $_SESSION['proveedor'] = $this->sc_temp_proveedor;}
if (isset($this->sc_temp_cliente)) { $_SESSION['cliente'] = $this->sc_temp_cliente;}
if (isset($this->sc_temp_unmay)) { $_SESSION['unmay'] = $this->sc_temp_unmay;}
if (isset($this->sc_temp_fac)) { $_SESSION['fac'] = $this->sc_temp_fac;}
if (isset($this->sc_temp_idpref)) { $_SESSION['idpref'] = $this->sc_temp_idpref;}
if (isset($this->sc_temp_gsiaperturacaja)) { $_SESSION['gsiaperturacaja'] = $this->sc_temp_gsiaperturacaja;}
if (isset($this->sc_temp_gsiescajero)) { $_SESSION['gsiescajero'] = $this->sc_temp_gsiescajero;}
if (isset($this->sc_temp_docpordefectoenpos)) { $_SESSION['docpordefectoenpos'] = $this->sc_temp_docpordefectoenpos;}
if (isset($this->sc_temp_gnube_activa)) { $_SESSION['gnube_activa'] = $this->sc_temp_gnube_activa;}
if (isset($this->sc_temp_regimen_emp)) { $_SESSION['regimen_emp'] = $this->sc_temp_regimen_emp;}
if (isset($this->sc_temp_grestaurar)) { $_SESSION['grestaurar'] = $this->sc_temp_grestaurar;}
if (isset($this->sc_temp_gtipo_empresa)) { $_SESSION['gtipo_empresa'] = $this->sc_temp_gtipo_empresa;}
if (isset($this->sc_temp_gtipo_negocio)) { $_SESSION['gtipo_negocio'] = $this->sc_temp_gtipo_negocio;}
if (isset($this->sc_temp_gPermisosUsuario)) { $_SESSION['gPermisosUsuario'] = $this->sc_temp_gPermisosUsuario;}
if (isset($this->sc_temp_gnombreusuario)) { $_SESSION['gnombreusuario'] = $this->sc_temp_gnombreusuario;}
if (isset($this->sc_temp_gidtercero)) { $_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
if (isset($this->sc_temp_gidresolucion)) { $_SESSION['gidresolucion'] = $this->sc_temp_gidresolucion;}
if (isset($this->sc_temp_gusuariologueado)) { $_SESSION['gusuariologueado'] = $this->sc_temp_gusuariologueado;}
if (isset($this->sc_temp_gnuevaactualizacion)) { $_SESSION['gnuevaactualizacion'] = $this->sc_temp_gnuevaactualizacion;}
if (isset($this->sc_temp_glineasporfactura)) { $_SESSION['glineasporfactura'] = $this->sc_temp_glineasporfactura;}
if (isset($this->sc_temp_gconsolidararticulos)) { $_SESSION['gconsolidararticulos'] = $this->sc_temp_gconsolidararticulos;}
if (isset($this->sc_temp_gespaciadodetallefactura)) { $_SESSION['gespaciadodetallefactura'] = $this->sc_temp_gespaciadodetallefactura;}
if (isset($this->sc_temp_gserialguardado)) { $_SESSION['gserialguardado'] = $this->sc_temp_gserialguardado;}
if (isset($this->sc_temp_gSerial)) { $_SESSION['gSerial'] = $this->sc_temp_gSerial;}
if (isset($this->sc_temp_gmensaje)) { $_SESSION['gmensaje'] = $this->sc_temp_gmensaje;}
if (isset($this->sc_temp_gTiempoSegRefreshDoc)) { $_SESSION['gTiempoSegRefreshDoc'] = $this->sc_temp_gTiempoSegRefreshDoc;}
if (isset($this->sc_temp_gimpresorapos)) { $_SESSION['gimpresorapos'] = $this->sc_temp_gimpresorapos;}
if (isset($this->sc_temp_gGrupoUsuarioComanda)) { $_SESSION['gGrupoUsuarioComanda'] = $this->sc_temp_gGrupoUsuarioComanda;}
if (isset($this->sc_temp_glicencia)) { $_SESSION['glicencia'] = $this->sc_temp_glicencia;}
if (isset($this->sc_temp_gidbanco)) { $_SESSION['gidbanco'] = $this->sc_temp_gidbanco;}
if (isset($this->sc_temp_gaplicaciones_menu)) { $_SESSION['gaplicaciones_menu'] = $this->sc_temp_gaplicaciones_menu;}
if (isset($this->sc_temp_gdescuento_general)) { $_SESSION['gdescuento_general'] = $this->sc_temp_gdescuento_general;}
if (isset($this->sc_temp_gncajas)) { $_SESSION['gncajas'] = $this->sc_temp_gncajas;}
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off';
}
function sc_validate_success()
{
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gbd_seleccionada)) {$this->sc_temp_gbd_seleccionada = (isset($_SESSION['gbd_seleccionada'])) ? $_SESSION['gbd_seleccionada'] : "";}
if (!isset($this->sc_temp_usr_grupo)) {$this->sc_temp_usr_grupo = (isset($_SESSION['usr_grupo'])) ? $_SESSION['usr_grupo'] : "";}
if (!isset($this->sc_temp_usr_database)) {$this->sc_temp_usr_database = (isset($_SESSION['usr_database'])) ? $_SESSION['usr_database'] : "";}
if (!isset($this->sc_temp_usr_iduser)) {$this->sc_temp_usr_iduser = (isset($_SESSION['usr_iduser'])) ? $_SESSION['usr_iduser'] : "";}
  
$var_idusuario = $this->sc_temp_usr_iduser;
$var_database = $this->sc_temp_usr_database;
$var_idgrupo = $this->sc_temp_usr_grupo;
$sql = "SELECT 
		sa.app_name,
		sga.priv_access,
		sga.priv_insert,
		sga.priv_delete,
		sga.priv_update,
		sga.priv_export,
		sga.priv_print,
		sa.app_name2
FROM $var_database.seg_groups_apps sga
inner join $var_database.seg_apps sa on sa.idapp=sga.idapp
where sga.idusuarios_grupos = $var_idgrupo";

	
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

$arr_default = array(
	'access' => 'off',
	'insert' => 'off',
	'delete' => 'off',
	'update' => 'off',
	'export' => 'btn_display_off',
	'print'  => 'btn_display_off',
);

$appfields = array(0,7);

if ($this->rs  !== false)
{
	$arr_perm = array();
	while (!$this->rs->EOF)
	{
		foreach ($appfields as $fldapp) {
			$app = $this->rs->fields[$fldapp];
			if(!empty($app)):
				if(!isset($arr_perm[$app]))	{$arr_perm[$app] = $arr_default;}
				if($this->rs->fields[1] == 'Y') 	{$arr_perm[$app][ 'access' ] = 'on';}
				if($this->rs->fields[2] == 'Y') 	{$arr_perm[$app][ 'insert' ] = 'on';}
				if($this->rs->fields[3] == 'Y') 	{$arr_perm[$app][ 'delete' ] = 'on';}
				if($this->rs->fields[4] == 'Y')	{$arr_perm[$app][ 'update' ] = 'on';}
				if($this->rs->fields[5] == 'Y')	{$arr_perm[$app]['export'] =  'btn_display_on';}
				if($this->rs->fields[6] == 'Y')	{$arr_perm[$app]['print'] =  'btn_display_on';}
			endif;
		}
		$this->rs->MoveNext();	
	}
	$this->rs->Close();


	foreach($arr_perm as $app => $perm)
	{
		$_SESSION['scriptcase']['sc_apl_seg'][$app] = $perm['access'];;

		$_SESSION['scriptcase']['sc_apl_conf'][$app]['insert'] = $perm['insert'];
		$_SESSION['scriptcase']['sc_apl_conf'][$app]['delete'] = $perm['delete'];
		$_SESSION['scriptcase']['sc_apl_conf'][$app]['update'] = $perm['update'];
		if ($perm['export'] == 'btn_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['xls'] = 'on';
}
elseif ($perm['export'] == 'btn_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['xls'] = 'off';
}
elseif ($perm['export'] == 'field_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['xls'] = 'on';
}
elseif ($perm['export'] == 'field_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['xls'] = 'off';
}
elseif ($perm['export'] == 'field_readonly') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']]['xls'] = 'on';
}
else {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']] = 'xls';
}
;
		if ($perm['export'] == 'btn_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['word'] = 'on';
}
elseif ($perm['export'] == 'btn_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['word'] = 'off';
}
elseif ($perm['export'] == 'field_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['word'] = 'on';
}
elseif ($perm['export'] == 'field_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['word'] = 'off';
}
elseif ($perm['export'] == 'field_readonly') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']]['word'] = 'on';
}
else {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']] = 'word';
}
;
		if ($perm['export'] == 'btn_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['pdf'] = 'on';
}
elseif ($perm['export'] == 'btn_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['pdf'] = 'off';
}
elseif ($perm['export'] == 'field_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['pdf'] = 'on';
}
elseif ($perm['export'] == 'field_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['pdf'] = 'off';
}
elseif ($perm['export'] == 'field_readonly') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']]['pdf'] = 'on';
}
else {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']] = 'pdf';
}
;
		if ($perm['export'] == 'btn_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['xml'] = 'on';
}
elseif ($perm['export'] == 'btn_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['xml'] = 'off';
}
elseif ($perm['export'] == 'field_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['xml'] = 'on';
}
elseif ($perm['export'] == 'field_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['xml'] = 'off';
}
elseif ($perm['export'] == 'field_readonly') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']]['xml'] = 'on';
}
else {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']] = 'xml';
}
;
		if ($perm['export'] == 'btn_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['csv'] = 'on';
}
elseif ($perm['export'] == 'btn_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['csv'] = 'off';
}
elseif ($perm['export'] == 'field_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['csv'] = 'on';
}
elseif ($perm['export'] == 'field_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['csv'] = 'off';
}
elseif ($perm['export'] == 'field_readonly') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']]['csv'] = 'on';
}
else {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']] = 'csv';
}
;
		if ($perm['export'] == 'btn_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['rtf'] = 'on';
}
elseif ($perm['export'] == 'btn_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['rtf'] = 'off';
}
elseif ($perm['export'] == 'field_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['rtf'] = 'on';
}
elseif ($perm['export'] == 'field_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['rtf'] = 'off';
}
elseif ($perm['export'] == 'field_readonly') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']]['rtf'] = 'on';
}
else {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['export']] = 'rtf';
}
;
		if ($perm['print'] == 'btn_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['print'] = 'on';
}
elseif ($perm['print'] == 'btn_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['btn_display']['print'] = 'off';
}
elseif ($perm['print'] == 'field_display_on') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['print'] = 'on';
}
elseif ($perm['print'] == 'field_display_off') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app]['field_display']['print'] = 'off';
}
elseif ($perm['print'] == 'field_readonly') {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['print']]['print'] = 'on';
}
else {
    $_SESSION['scriptcase']['sc_apl_conf'][$app][$perm['print']] = 'print';
}
;

	}


	$_SESSION['scriptcase']['sc_apl_seg']['logout_app'] = "on";;
	
	
	sc_connection_edit("conn_mysql", array("database" =>  $var_database, ));
	
	
	if($this->sc_logged($this->login )):

		$_SESSION['scriptcase']['user_logout'][] = array('V' => 'logged_user', 'U' => 'logout', 'R' => 'seg_login.php', 'T' => '_top');;
	endif;	

	$this->sc_temp_gbd_seleccionada = $var_database;
	$_SESSION['scriptcase']['sc_apl_seg']['blk_menu'] = "on";;
	 if (isset($this->sc_temp_usr_iduser)) { $_SESSION['usr_iduser'] = $this->sc_temp_usr_iduser;}
 if (isset($this->sc_temp_usr_database)) { $_SESSION['usr_database'] = $this->sc_temp_usr_database;}
 if (isset($this->sc_temp_usr_grupo)) { $_SESSION['usr_grupo'] = $this->sc_temp_usr_grupo;}
 if (isset($this->sc_temp_gbd_seleccionada)) { $_SESSION['gbd_seleccionada'] = $this->sc_temp_gbd_seleccionada;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('blk_menu') . "/", $this->nm_location, "", "_parent", "ret_self", 440, 630);
 };
} else {
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Usuario no tiene permisos configurados.";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_seg_login';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_seg_login';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "Usuario no tiene permisos configurados.";
 }
;
	if (isset($this->Campos_Mens_erro) && !empty($this->Campos_Mens_erro))
{
 if (isset($this->sc_temp_usr_iduser)) { $_SESSION['usr_iduser'] = $this->sc_temp_usr_iduser;}
 if (isset($this->sc_temp_usr_database)) { $_SESSION['usr_database'] = $this->sc_temp_usr_database;}
 if (isset($this->sc_temp_usr_grupo)) { $_SESSION['usr_grupo'] = $this->sc_temp_usr_grupo;}
 if (isset($this->sc_temp_gbd_seleccionada)) { $_SESSION['gbd_seleccionada'] = $this->sc_temp_gbd_seleccionada;}
    $_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off';
    return;
}
}
if (isset($this->sc_temp_usr_iduser)) { $_SESSION['usr_iduser'] = $this->sc_temp_usr_iduser;}
if (isset($this->sc_temp_usr_database)) { $_SESSION['usr_database'] = $this->sc_temp_usr_database;}
if (isset($this->sc_temp_usr_grupo)) { $_SESSION['usr_grupo'] = $this->sc_temp_usr_grupo;}
if (isset($this->sc_temp_gbd_seleccionada)) { $_SESSION['gbd_seleccionada'] = $this->sc_temp_gbd_seleccionada;}
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off';
}
function setGlobales($usuario, $password, $database)
{
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gdescuento_general)) {$this->sc_temp_gdescuento_general = (isset($_SESSION['gdescuento_general'])) ? $_SESSION['gdescuento_general'] : "";}
if (!isset($this->sc_temp_gncajas)) {$this->sc_temp_gncajas = (isset($_SESSION['gncajas'])) ? $_SESSION['gncajas'] : "";}
if (!isset($this->sc_temp_gsiescajero)) {$this->sc_temp_gsiescajero = (isset($_SESSION['gsiescajero'])) ? $_SESSION['gsiescajero'] : "";}
if (!isset($this->sc_temp_tele)) {$this->sc_temp_tele = (isset($_SESSION['tele'])) ? $_SESSION['tele'] : "";}
if (!isset($this->sc_temp_direccion)) {$this->sc_temp_direccion = (isset($_SESSION['direccion'])) ? $_SESSION['direccion'] : "";}
if (!isset($this->sc_temp_nit)) {$this->sc_temp_nit = (isset($_SESSION['nit'])) ? $_SESSION['nit'] : "";}
if (!isset($this->sc_temp_regimen_emp)) {$this->sc_temp_regimen_emp = (isset($_SESSION['regimen_emp'])) ? $_SESSION['regimen_emp'] : "";}
if (!isset($this->sc_temp_empresa)) {$this->sc_temp_empresa = (isset($_SESSION['empresa'])) ? $_SESSION['empresa'] : "";}
if (!isset($this->sc_temp_docpordefectoenpos)) {$this->sc_temp_docpordefectoenpos = (isset($_SESSION['docpordefectoenpos'])) ? $_SESSION['docpordefectoenpos'] : "";}
if (!isset($this->sc_temp_gsiaperturacaja)) {$this->sc_temp_gsiaperturacaja = (isset($_SESSION['gsiaperturacaja'])) ? $_SESSION['gsiaperturacaja'] : "";}
if (!isset($this->sc_temp_gdescripciongrupo)) {$this->sc_temp_gdescripciongrupo = (isset($_SESSION['gdescripciongrupo'])) ? $_SESSION['gdescripciongrupo'] : "";}
if (!isset($this->sc_temp_gsesion_id)) {$this->sc_temp_gsesion_id = (isset($_SESSION['gsesion_id'])) ? $_SESSION['gsesion_id'] : "";}
if (!isset($this->sc_temp_gModificarInventario)) {$this->sc_temp_gModificarInventario = (isset($_SESSION['gModificarInventario'])) ? $_SESSION['gModificarInventario'] : "";}
if (!isset($this->sc_temp_gGrupoUsuarioComanda)) {$this->sc_temp_gGrupoUsuarioComanda = (isset($_SESSION['gGrupoUsuarioComanda'])) ? $_SESSION['gGrupoUsuarioComanda'] : "";}
if (!isset($this->sc_temp_gTiempoSegRefreshDoc)) {$this->sc_temp_gTiempoSegRefreshDoc = (isset($_SESSION['gTiempoSegRefreshDoc'])) ? $_SESSION['gTiempoSegRefreshDoc'] : "";}
if (!isset($this->sc_temp_gnaturaleza)) {$this->sc_temp_gnaturaleza = (isset($_SESSION['gnaturaleza'])) ? $_SESSION['gnaturaleza'] : "";}
if (!isset($this->sc_temp_gregimen)) {$this->sc_temp_gregimen = (isset($_SESSION['gregimen'])) ? $_SESSION['gregimen'] : "";}
if (!isset($this->sc_temp_gtelefono)) {$this->sc_temp_gtelefono = (isset($_SESSION['gtelefono'])) ? $_SESSION['gtelefono'] : "";}
if (!isset($this->sc_temp_gdireccion)) {$this->sc_temp_gdireccion = (isset($_SESSION['gdireccion'])) ? $_SESSION['gdireccion'] : "";}
if (!isset($this->sc_temp_gnit)) {$this->sc_temp_gnit = (isset($_SESSION['gnit'])) ? $_SESSION['gnit'] : "";}
if (!isset($this->sc_temp_grazonsoc)) {$this->sc_temp_grazonsoc = (isset($_SESSION['grazonsoc'])) ? $_SESSION['grazonsoc'] : "";}
if (!isset($this->sc_temp_gimpresorapos)) {$this->sc_temp_gimpresorapos = (isset($_SESSION['gimpresorapos'])) ? $_SESSION['gimpresorapos'] : "";}
if (!isset($this->sc_temp_gbd_seleccionada)) {$this->sc_temp_gbd_seleccionada = (isset($_SESSION['gbd_seleccionada'])) ? $_SESSION['gbd_seleccionada'] : "";}
if (!isset($this->sc_temp_gnombre_archivo_empresa)) {$this->sc_temp_gnombre_archivo_empresa = (isset($_SESSION['gnombre_archivo_empresa'])) ? $_SESSION['gnombre_archivo_empresa'] : "";}
if (!isset($this->sc_temp_gserialguardado)) {$this->sc_temp_gserialguardado = (isset($_SESSION['gserialguardado'])) ? $_SESSION['gserialguardado'] : "";}
if (!isset($this->sc_temp_gespaciadodetallefactura)) {$this->sc_temp_gespaciadodetallefactura = (isset($_SESSION['gespaciadodetallefactura'])) ? $_SESSION['gespaciadodetallefactura'] : "";}
if (!isset($this->sc_temp_gconsolidararticulos)) {$this->sc_temp_gconsolidararticulos = (isset($_SESSION['gconsolidararticulos'])) ? $_SESSION['gconsolidararticulos'] : "";}
if (!isset($this->sc_temp_glineasporfactura)) {$this->sc_temp_glineasporfactura = (isset($_SESSION['glineasporfactura'])) ? $_SESSION['glineasporfactura'] : "";}
if (!isset($this->sc_temp_gusuario_logueo)) {$this->sc_temp_gusuario_logueo = (isset($_SESSION['gusuario_logueo'])) ? $_SESSION['gusuario_logueo'] : "";}
if (!isset($this->sc_temp_gusuariologueado)) {$this->sc_temp_gusuariologueado = (isset($_SESSION['gusuariologueado'])) ? $_SESSION['gusuariologueado'] : "";}
if (!isset($this->sc_temp_gidresolucion)) {$this->sc_temp_gidresolucion = (isset($_SESSION['gidresolucion'])) ? $_SESSION['gidresolucion'] : "";}
if (!isset($this->sc_temp_gidbanco)) {$this->sc_temp_gidbanco = (isset($_SESSION['gidbanco'])) ? $_SESSION['gidbanco'] : "";}
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
if (!isset($this->sc_temp_gnombreusuario)) {$this->sc_temp_gnombreusuario = (isset($_SESSION['gnombreusuario'])) ? $_SESSION['gnombreusuario'] : "";}
  

$vsql = "select  
		 nombre,
		 tercero,
		 resolucion,
		 idusuarios,
		 (select lineasporfactura from $database.".$database.".configuraciones where idconfiguraciones='1') as lineasporfactura,
		 (select consolidararticulos from $database.".$database.".configuraciones where idconfiguraciones='1') as consolidararticulos,
		 (select espaciado from $database.configuraciones where ".$database.".idconfiguraciones='1') as espaciado,
		 (select serial from $database.configuraciones where ".$database.".idconfiguraciones='1') as serial,
		 (select coalesce(fecha,'N') from $database.".$database.".configuraciones where idconfiguraciones='1') as fecha_demo,
		 (select if(nombre_pc is not null and nombre_pc <> '' and nombre_impre is not null and nombre_impre <> '',concat('//',nombre_pc,'/',nombre_impre),'') from $database.".$database.".configuraciones where idconfiguraciones='1') as impresorapos,
		 (select if(d.nombre_pc is not null and d.nombre_pc <> '' and d.nombre_impre is not null and d.nombre_impre <> '',concat('//',d.nombre_pc,'/',d.nombre_impre),'') from $database.".$database.".resdian d where d.Idres=resolucion) as impresorapospj,
		 if(nombre_pc is not null and nombre_pc <> '' and nombre_impre is not null and nombre_impre <> '',concat('//',nombre_pc,'/',nombre_impre),'') as impresoraposusuario,
		 (select razonsoc from $database.".$database.".datosemp where iddatos='1') as razonsoc,
		 (select concat(nit,'-',dv) from $database.".$database.".datosemp where iddatos='1') as nit,
		 (select direccion from $database.".$database.".datosemp where iddatos='1') as direccion,
		 (select telefono from $database.".$database.".datosemp where iddatos='1') as telefono,
		 (select if(regimen=0,'Regimen Simplificado','Regimen Comun') from $database.".$database.".datosemp where iddatos='1') as regimen,
		 (select naturaleza from $database.".$database.".datosemp where iddatos='1') as naturaleza,
		 (select ruta_bd_tns from $database.".$database.".configuraciones where idconfiguraciones='1') as rutabdtns,
		 (select refresh_grid_doc from $database.".$database.".configuraciones where idconfiguraciones='1') as refresh_grid_doc,
		 coalesce(grupocomanda,'0') as grupocomanda,
		 (select modificainvpedido from $database.".$database.".configuraciones where idconfiguraciones='1') as modificainvpedido,
		 sesion_id,
		 (select g.descripcion from $database.".$database.".usuarios_grupos g where g.idusuarios_grupos=grupo) as grupo,
		 (select apertura_caja from $database.".$database.".configuraciones where idconfiguraciones='1') as apertura_caja,
		 (select tipodoc_pordefecto_pos from $database.".$database.".configuraciones where idconfiguraciones='1') as tipodoc_pordefecto_pos,
		 banco_movil
		 from $database.
		 ".$database.".usuarios 
		 where 
		     usuario='".$usuario."' 
		 and password='".$password."'";

 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vValidaUsuario = array();
      $this->vvalidausuario = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vValidaUsuario[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vvalidausuario[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vValidaUsuario = false;
          $this->vValidaUsuario_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $this->vvalidausuario = false;
          $this->vvalidausuario_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

if(isset($this->vvalidausuario[0][0]))
{
	$this->sc_temp_gnombreusuario           = $this->vvalidausuario[0][0];
	$this->sc_temp_gidtercero               = $this->vvalidausuario[0][1];
	$this->sc_temp_gidbanco = $this->vvalidausuario[0][26];
	$this->sc_temp_gidresolucion            = $this->vvalidausuario[0][2];
	$this->sc_temp_gusuariologueado         = $this->sc_temp_gusuario_logueo;
	$this->sc_temp_glineasporfactura        = $this->vvalidausuario[0][4];
	$this->sc_temp_gconsolidararticulos     = $this->vvalidausuario[0][5];
	$this->sc_temp_gespaciadodetallefactura = $this->vvalidausuario[0][6];
	$this->sc_temp_gserialguardado          = $this->vvalidausuario[0][7];
	$fecha_configuraciones     = $this->vvalidausuario[0][8];
	$this->sc_temp_gnombre_archivo_empresa  = $this->sc_temp_gbd_seleccionada;
	$this->sc_temp_gimpresorapos            = $this->vvalidausuario[0][9];
	
	if(!empty($this->vvalidausuario[0][10]))
	{
		$this->sc_temp_gimpresorapos = $this->vvalidausuario[0][10];
	}
	if(!empty($this->vvalidausuario[0][11]))
	{
		$this->sc_temp_gimpresorapos = $this->vvalidausuario[0][11];
	}
	
	$this->sc_temp_grazonsoc   = $this->vvalidausuario[0][12];
	$this->sc_temp_gnit        = $this->vvalidausuario[0][13];
	$this->sc_temp_gdireccion  = $this->vvalidausuario[0][14];
	$this->sc_temp_gtelefono   = $this->vvalidausuario[0][15];
	$this->sc_temp_gregimen    = $this->vvalidausuario[0][16];
	$this->sc_temp_gnaturaleza = $this->vvalidausuario[0][17];
	
	$this->sc_temp_gTiempoSegRefreshDoc = $this->vvalidausuario[0][19];
	
	$this->sc_temp_gGrupoUsuarioComanda = $this->vvalidausuario[0][20];

	$this->sc_temp_gModificarInventario = $this->vvalidausuario[0][21];

	if(isset($this->vvalidausuario[0][22]))
	{
		$this->sc_temp_gsesion_id  = $this->vvalidausuario[0][22];
	}
	else
	{
		$this->sc_temp_gsesion_id  = "";
	}
	
	$this->sc_temp_gdescripciongrupo  = $this->vvalidausuario[0][23];
	$this->sc_temp_gsiaperturacaja    = $this->vvalidausuario[0][24];
	$this->sc_temp_docpordefectoenpos = $this->vvalidausuario[0][25];
}


 
      $nm_select = "select razonsoc, regimen,nit,dv,direccion,telefono from $database.datosemp order by iddatos desc limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dsEmpresa = array();
      $this->dsempresa = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dsEmpresa[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->dsempresa[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dsEmpresa = false;
          $this->dsEmpresa_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $this->dsempresa = false;
          $this->dsempresa_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
if(isset($this->dsempresa[0][0]))
{
	$this->sc_temp_empresa     =$this->dsempresa[0][0];
	$this->sc_temp_regimen_emp =$this->dsempresa[0][1];
	$this->sc_temp_nit		  =$this->dsempresa[0][2];
	$this->sc_temp_direccion	  =$this->dsempresa[0][4];
	$this->sc_temp_tele		  =$this->dsempresa[0][5];
}
else
{
	$this->sc_temp_empresa     ="EMPRESA DEMO";
}

$vsql = "select es_cajero from $database.terceros where idtercero='".$this->sc_temp_gidtercero."'";
 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiEsCajero = array();
      $this->vsiescajero = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vSiEsCajero[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vsiescajero[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiEsCajero = false;
          $this->vSiEsCajero_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $this->vsiescajero = false;
          $this->vsiescajero_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
if(isset($this->vsiescajero[0][0]))
{
	$this->sc_temp_gsiescajero = $this->vsiescajero[0][0];
	
	if($this->sc_temp_gsiescajero =="SI")
	{				
		 
      $nm_select = "select count(*) from $database.bancos where comportamiento='SI'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vCajas = array();
      $this->vcajas = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vCajas[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vcajas[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vCajas = false;
          $this->vCajas_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $this->vcajas = false;
          $this->vcajas_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

		if(isset($this->vcajas[0][0]))
		{
			if($this->vcajas[0][0]>0)
			{
				$this->sc_temp_gncajas = $this->vcajas[0][0];
			}
		}
	}
}



$vsqld = "select porcentaje from $database.programar_descuentos_generales where desde <= '".date("Y-m-d H:i:s")."' and hasta>'".date("Y-m-d H:i:s")."' and activo='SI' and cajas_afectadas like '%".$this->sc_temp_gidbanco."%'";
 
      $nm_select = $vsqld; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDGeneral = array();
      $this->vdgeneral = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vDGeneral[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vdgeneral[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDGeneral = false;
          $this->vDGeneral_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $this->vdgeneral = false;
          $this->vdgeneral_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

if(isset($this->vdgeneral[0][0]))
{
	$this->sc_temp_gdescuento_general = $this->vdgeneral[0][0];
}
else
{
	$this->sc_temp_gdescuento_general = "0";
}


if($this->sc_temp_gsiescajero=="SI")
{
	if($this->sc_temp_gncajas>0)
	{
		 if (isset($this->sc_temp_gnombreusuario)) { $_SESSION['gnombreusuario'] = $this->sc_temp_gnombreusuario;}
 if (isset($this->sc_temp_gidtercero)) { $_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
 if (isset($this->sc_temp_gidbanco)) { $_SESSION['gidbanco'] = $this->sc_temp_gidbanco;}
 if (isset($this->sc_temp_gidresolucion)) { $_SESSION['gidresolucion'] = $this->sc_temp_gidresolucion;}
 if (isset($this->sc_temp_gusuariologueado)) { $_SESSION['gusuariologueado'] = $this->sc_temp_gusuariologueado;}
 if (isset($this->sc_temp_gusuario_logueo)) { $_SESSION['gusuario_logueo'] = $this->sc_temp_gusuario_logueo;}
 if (isset($this->sc_temp_glineasporfactura)) { $_SESSION['glineasporfactura'] = $this->sc_temp_glineasporfactura;}
 if (isset($this->sc_temp_gconsolidararticulos)) { $_SESSION['gconsolidararticulos'] = $this->sc_temp_gconsolidararticulos;}
 if (isset($this->sc_temp_gespaciadodetallefactura)) { $_SESSION['gespaciadodetallefactura'] = $this->sc_temp_gespaciadodetallefactura;}
 if (isset($this->sc_temp_gserialguardado)) { $_SESSION['gserialguardado'] = $this->sc_temp_gserialguardado;}
 if (isset($this->sc_temp_gnombre_archivo_empresa)) { $_SESSION['gnombre_archivo_empresa'] = $this->sc_temp_gnombre_archivo_empresa;}
 if (isset($this->sc_temp_gbd_seleccionada)) { $_SESSION['gbd_seleccionada'] = $this->sc_temp_gbd_seleccionada;}
 if (isset($this->sc_temp_gimpresorapos)) { $_SESSION['gimpresorapos'] = $this->sc_temp_gimpresorapos;}
 if (isset($this->sc_temp_grazonsoc)) { $_SESSION['grazonsoc'] = $this->sc_temp_grazonsoc;}
 if (isset($this->sc_temp_gnit)) { $_SESSION['gnit'] = $this->sc_temp_gnit;}
 if (isset($this->sc_temp_gdireccion)) { $_SESSION['gdireccion'] = $this->sc_temp_gdireccion;}
 if (isset($this->sc_temp_gtelefono)) { $_SESSION['gtelefono'] = $this->sc_temp_gtelefono;}
 if (isset($this->sc_temp_gregimen)) { $_SESSION['gregimen'] = $this->sc_temp_gregimen;}
 if (isset($this->sc_temp_gnaturaleza)) { $_SESSION['gnaturaleza'] = $this->sc_temp_gnaturaleza;}
 if (isset($this->sc_temp_gTiempoSegRefreshDoc)) { $_SESSION['gTiempoSegRefreshDoc'] = $this->sc_temp_gTiempoSegRefreshDoc;}
 if (isset($this->sc_temp_gGrupoUsuarioComanda)) { $_SESSION['gGrupoUsuarioComanda'] = $this->sc_temp_gGrupoUsuarioComanda;}
 if (isset($this->sc_temp_gModificarInventario)) { $_SESSION['gModificarInventario'] = $this->sc_temp_gModificarInventario;}
 if (isset($this->sc_temp_gsesion_id)) { $_SESSION['gsesion_id'] = $this->sc_temp_gsesion_id;}
 if (isset($this->sc_temp_gdescripciongrupo)) { $_SESSION['gdescripciongrupo'] = $this->sc_temp_gdescripciongrupo;}
 if (isset($this->sc_temp_gsiaperturacaja)) { $_SESSION['gsiaperturacaja'] = $this->sc_temp_gsiaperturacaja;}
 if (isset($this->sc_temp_docpordefectoenpos)) { $_SESSION['docpordefectoenpos'] = $this->sc_temp_docpordefectoenpos;}
 if (isset($this->sc_temp_empresa)) { $_SESSION['empresa'] = $this->sc_temp_empresa;}
 if (isset($this->sc_temp_regimen_emp)) { $_SESSION['regimen_emp'] = $this->sc_temp_regimen_emp;}
 if (isset($this->sc_temp_nit)) { $_SESSION['nit'] = $this->sc_temp_nit;}
 if (isset($this->sc_temp_direccion)) { $_SESSION['direccion'] = $this->sc_temp_direccion;}
 if (isset($this->sc_temp_tele)) { $_SESSION['tele'] = $this->sc_temp_tele;}
 if (isset($this->sc_temp_gsiescajero)) { $_SESSION['gsiescajero'] = $this->sc_temp_gsiescajero;}
 if (isset($this->sc_temp_gncajas)) { $_SESSION['gncajas'] = $this->sc_temp_gncajas;}
 if (isset($this->sc_temp_gdescuento_general)) { $_SESSION['gdescuento_general'] = $this->sc_temp_gdescuento_general;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('control_seleccionar_cajas') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
	}
	else
	{
		echo "No hay cajas configuradas.";
	}
}
if (isset($this->sc_temp_gnombreusuario)) { $_SESSION['gnombreusuario'] = $this->sc_temp_gnombreusuario;}
if (isset($this->sc_temp_gidtercero)) { $_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
if (isset($this->sc_temp_gidbanco)) { $_SESSION['gidbanco'] = $this->sc_temp_gidbanco;}
if (isset($this->sc_temp_gidresolucion)) { $_SESSION['gidresolucion'] = $this->sc_temp_gidresolucion;}
if (isset($this->sc_temp_gusuariologueado)) { $_SESSION['gusuariologueado'] = $this->sc_temp_gusuariologueado;}
if (isset($this->sc_temp_gusuario_logueo)) { $_SESSION['gusuario_logueo'] = $this->sc_temp_gusuario_logueo;}
if (isset($this->sc_temp_glineasporfactura)) { $_SESSION['glineasporfactura'] = $this->sc_temp_glineasporfactura;}
if (isset($this->sc_temp_gconsolidararticulos)) { $_SESSION['gconsolidararticulos'] = $this->sc_temp_gconsolidararticulos;}
if (isset($this->sc_temp_gespaciadodetallefactura)) { $_SESSION['gespaciadodetallefactura'] = $this->sc_temp_gespaciadodetallefactura;}
if (isset($this->sc_temp_gserialguardado)) { $_SESSION['gserialguardado'] = $this->sc_temp_gserialguardado;}
if (isset($this->sc_temp_gnombre_archivo_empresa)) { $_SESSION['gnombre_archivo_empresa'] = $this->sc_temp_gnombre_archivo_empresa;}
if (isset($this->sc_temp_gbd_seleccionada)) { $_SESSION['gbd_seleccionada'] = $this->sc_temp_gbd_seleccionada;}
if (isset($this->sc_temp_gimpresorapos)) { $_SESSION['gimpresorapos'] = $this->sc_temp_gimpresorapos;}
if (isset($this->sc_temp_grazonsoc)) { $_SESSION['grazonsoc'] = $this->sc_temp_grazonsoc;}
if (isset($this->sc_temp_gnit)) { $_SESSION['gnit'] = $this->sc_temp_gnit;}
if (isset($this->sc_temp_gdireccion)) { $_SESSION['gdireccion'] = $this->sc_temp_gdireccion;}
if (isset($this->sc_temp_gtelefono)) { $_SESSION['gtelefono'] = $this->sc_temp_gtelefono;}
if (isset($this->sc_temp_gregimen)) { $_SESSION['gregimen'] = $this->sc_temp_gregimen;}
if (isset($this->sc_temp_gnaturaleza)) { $_SESSION['gnaturaleza'] = $this->sc_temp_gnaturaleza;}
if (isset($this->sc_temp_gTiempoSegRefreshDoc)) { $_SESSION['gTiempoSegRefreshDoc'] = $this->sc_temp_gTiempoSegRefreshDoc;}
if (isset($this->sc_temp_gGrupoUsuarioComanda)) { $_SESSION['gGrupoUsuarioComanda'] = $this->sc_temp_gGrupoUsuarioComanda;}
if (isset($this->sc_temp_gModificarInventario)) { $_SESSION['gModificarInventario'] = $this->sc_temp_gModificarInventario;}
if (isset($this->sc_temp_gsesion_id)) { $_SESSION['gsesion_id'] = $this->sc_temp_gsesion_id;}
if (isset($this->sc_temp_gdescripciongrupo)) { $_SESSION['gdescripciongrupo'] = $this->sc_temp_gdescripciongrupo;}
if (isset($this->sc_temp_gsiaperturacaja)) { $_SESSION['gsiaperturacaja'] = $this->sc_temp_gsiaperturacaja;}
if (isset($this->sc_temp_docpordefectoenpos)) { $_SESSION['docpordefectoenpos'] = $this->sc_temp_docpordefectoenpos;}
if (isset($this->sc_temp_empresa)) { $_SESSION['empresa'] = $this->sc_temp_empresa;}
if (isset($this->sc_temp_regimen_emp)) { $_SESSION['regimen_emp'] = $this->sc_temp_regimen_emp;}
if (isset($this->sc_temp_nit)) { $_SESSION['nit'] = $this->sc_temp_nit;}
if (isset($this->sc_temp_direccion)) { $_SESSION['direccion'] = $this->sc_temp_direccion;}
if (isset($this->sc_temp_tele)) { $_SESSION['tele'] = $this->sc_temp_tele;}
if (isset($this->sc_temp_gsiescajero)) { $_SESSION['gsiescajero'] = $this->sc_temp_gsiescajero;}
if (isset($this->sc_temp_gncajas)) { $_SESSION['gncajas'] = $this->sc_temp_gncajas;}
if (isset($this->sc_temp_gdescuento_general)) { $_SESSION['gdescuento_general'] = $this->sc_temp_gdescuento_general;}
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off';
}
function sc_logged($user, $ip = '')
{
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'on';
if (!isset($this->sc_temp_usr_database)) {$this->sc_temp_usr_database = (isset($_SESSION['usr_database'])) ? $_SESSION['usr_database'] : "";}
  
	$str_sql = "SELECT date_login, ip FROM ".$this->sc_temp_usr_database.".seg_logged WHERE login = '". $user ."' AND sc_session <> '_SC_FAIL_SC_'";

	 
      $nm_select = $str_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->data = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->data = false;
          $this->data_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

	if($this->data  === FALSE || !isset($this->data->fields[0]))
	{
		$ip = ($ip == '') ? $_SERVER['REMOTE_ADDR'] : $ip;
		$this->sc_logged_in($user, $ip);
		return true;
	}
	else
	{
		if (isset($_SESSION['scriptcase']['sc_apl_conf']['seg_logged']))
{
unset($_SESSION['scriptcase']['sc_apl_conf']['seg_logged']);
}
;
		$_SESSION['scriptcase']['sc_apl_seg']['seg_logged'] = "on";;
		 if (isset($this->sc_temp_usr_database)) { $_SESSION['usr_database'] = $this->sc_temp_usr_database;}
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('seg_logged') . "/", $this->nm_location, "user?#?" . NM_encode_input($user) . "?@?", "modal", "ret_self", 400, 424);;

		return false;
	}
if (isset($this->sc_temp_usr_database)) { $_SESSION['usr_database'] = $this->sc_temp_usr_database;}
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off';
}
function sc_verify_logged()
{
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'on';
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
if (!isset($this->sc_temp_usr_database)) {$this->sc_temp_usr_database = (isset($_SESSION['usr_database'])) ? $_SESSION['usr_database'] : "";}
  
	$str_sql = "SELECT count(*) FROM ".$this->sc_temp_usr_database.".seg_logged WHERE login = '". $this->sc_temp_logged_user . "' AND date_login = '". $this->sc_temp_logged_date_login ."' AND sc_session <> '_SC_FAIL_SC_'";
	 
      $nm_select = $str_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs_logged = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->rs_logged[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs_logged = false;
          $this->rs_logged_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
	if($this->rs_logged[0][0] != 1)
	{
		 if (isset($this->sc_temp_usr_database)) { $_SESSION['usr_database'] = $this->sc_temp_usr_database;}
 if (isset($this->sc_temp_logged_user)) { $_SESSION['logged_user'] = $this->sc_temp_logged_user;}
 if (isset($this->sc_temp_logged_date_login)) { $_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('seg_login') . "/", $this->nm_location, "", "_parent", "ret_self", 440, 630);
 };
	}
if (isset($this->sc_temp_usr_database)) { $_SESSION['usr_database'] = $this->sc_temp_usr_database;}
if (isset($this->sc_temp_logged_user)) { $_SESSION['logged_user'] = $this->sc_temp_logged_user;}
if (isset($this->sc_temp_logged_date_login)) { $_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off';
}
function sc_logged_in($user, $ip = '')
{
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'on';
if (!isset($this->sc_temp_usr_database)) {$this->sc_temp_usr_database = (isset($_SESSION['usr_database'])) ? $_SESSION['usr_database'] : "";}
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
  
	$ip = ($ip == '') ? $_SERVER['REMOTE_ADDR'] : $ip;
	$this->sc_temp_logged_user = $user;
	$this->sc_temp_logged_date_login = microtime(true);

	$str_sql = "DELETE FROM ".$this->sc_temp_usr_database.".seg_logged WHERE login = '". $user . "' AND sc_session = '_SC_FAIL_SC_' AND ip = '".$ip."'";
	
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Ini->nm_db_conn_mysql->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_mysql->ErrorMsg());
             if ($this->NM_ajax_flag)
             {
                seg_login_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

	$str_sql = "INSERT INTO ".$this->sc_temp_usr_database.".seg_logged(login, date_login, sc_session, ip) VALUES ('". $user ."', '". $this->sc_temp_logged_date_login ."', '". session_id() ."', '". $ip ."')";
	
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Ini->nm_db_conn_mysql->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_mysql->ErrorMsg());
             if ($this->NM_ajax_flag)
             {
                seg_login_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
if (isset($this->sc_temp_logged_user)) { $_SESSION['logged_user'] = $this->sc_temp_logged_user;}
if (isset($this->sc_temp_logged_date_login)) { $_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
if (isset($this->sc_temp_usr_database)) { $_SESSION['usr_database'] = $this->sc_temp_usr_database;}
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off';
}
function sc_logged_in_fail($user, $ip = '')
{
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'on';
if (!isset($this->sc_temp_usr_database)) {$this->sc_temp_usr_database = (isset($_SESSION['usr_database'])) ? $_SESSION['usr_database'] : "";}
  
	$ip = ($ip == '') ? $_SERVER['REMOTE_ADDR'] : $ip;
	$str_sql = "INSERT INTO ".$this->sc_temp_usr_database.".seg_logged(login, date_login, sc_session, ip) VALUES ('" . $user . "', '" . microtime(true) . "', '_SC_FAIL_SC_', '" . $ip . "')";
	
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Ini->nm_db_conn_mysql->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_mysql->ErrorMsg());
             if ($this->NM_ajax_flag)
             {
                seg_login_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	return true;
if (isset($this->sc_temp_usr_database)) { $_SESSION['usr_database'] = $this->sc_temp_usr_database;}
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off';
}
function sc_logged_is_blocked($ip = '')
{
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'on';
if (!isset($this->sc_temp_usr_database)) {$this->sc_temp_usr_database = (isset($_SESSION['usr_database'])) ? $_SESSION['usr_database'] : "";}
  
	$ip = ($ip == '') ? $_SERVER['REMOTE_ADDR'] : $ip;
	$minutes_ago = strtotime("-10 minutes");
	$str_select = "SELECT count(*) FROM ".$this->sc_temp_usr_database.".seg_logged WHERE sc_session = '_SC_BLOCKED_SC_' AND ip = '".$ip."' AND date_login > '". $minutes_ago ."'";
	 
      $nm_select = $str_select; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs_logged = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->rs_logged[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs_logged = false;
          $this->rs_logged_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
	if($this->rs_logged  !== FALSE && $this->rs_logged[0][0] == 1)
	{
		$message =  $this->Ini->Nm_lang['lang_user_blocked'] ;
		$message = sprintf($message, 10);
		
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_seg_login';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_seg_login';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $message;
 }
;
		return true;
	}

	$str_select = "SELECT count(*) FROM ".$this->sc_temp_usr_database.".seg_logged WHERE sc_session = '_SC_FAIL_SC_' AND ip = '".$ip."' AND date_login > '". $minutes_ago ."'";
	 
      $nm_select = $str_select; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs_logged = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->rs_logged[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs_logged = false;
          $this->rs_logged_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

	if($this->rs_logged  !== FALSE && $this->rs_logged[0][0] == 10)
	{
		$str_sql = "INSERT INTO ".$this->sc_temp_usr_database.".seg_logged(login, date_login, sc_session, ip) VALUES ('blocked', '". microtime(true) ."', '_SC_BLOCKED_SC_', '". $ip ."')";
		
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Ini->nm_db_conn_mysql->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_mysql->ErrorMsg());
             if ($this->NM_ajax_flag)
             {
                seg_login_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		$message =  $this->Ini->Nm_lang['lang_user_blocked'] ;
		$message = sprintf($message, 10);
		
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $message;
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_seg_login';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_seg_login';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = $message;
 }
;
		return true;
	}
	return false;
if (isset($this->sc_temp_usr_database)) { $_SESSION['usr_database'] = $this->sc_temp_usr_database;}
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off';
}
function sc_logged_out($user, $date_login = '',$pardatabase='')
{
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'on';
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
  
	$tabla = 'seg_logged';	
	if (!empty($pardatabase)) {
		$tabla = $pardatabase.'.seg_logged';
	}
	$date_login = ($date_login == '' ? "" : " AND date_login = '". $date_login ."'");

	$str_sql = "SELECT sc_session FROM $tabla WHERE login = '". $user ."' ". $date_login . " AND sc_session <> '_SC_FAIL_SC_'";
	 
      $nm_select = $str_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->data = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
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
          $this->data_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
	if(isset($this->data[0][0]) && !empty($this->data[0][0]))
	{
		$session_bkp = $_SESSION;
		$sessionid = session_id();
		session_write_close();

		session_id($this->data[0][0]);
		session_start();
		$_SESSION['logged_user'] = 'logout';
		session_write_close();

		session_id($sessionid);
		session_start();
		$_SESSION = $session_bkp;
	}


	$str_sql = "DELETE FROM $tabla WHERE login = '". $user . "' " . $date_login;
	
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Ini->nm_db_conn_mysql->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_mysql->ErrorMsg());
             if ($this->NM_ajax_flag)
             {
                seg_login_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	 unset($_SESSION['logged_date_login']);
 unset($this->sc_temp_logged_date_login);
 unset($_SESSION['logged_user']);
 unset($this->sc_temp_logged_user);
;
if (isset($this->sc_temp_logged_date_login)) { $_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
if (isset($this->sc_temp_logged_user)) { $_SESSION['logged_user'] = $this->sc_temp_logged_user;}
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off';
}
function sc_looged_check_logout()  {
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'on';
if (!isset($this->sc_temp_usr_email)) {$this->sc_temp_usr_email = (isset($_SESSION['usr_email'])) ? $_SESSION['usr_email'] : "";}
if (!isset($this->sc_temp_logged_date_login)) {$this->sc_temp_logged_date_login = (isset($_SESSION['logged_date_login'])) ? $_SESSION['logged_date_login'] : "";}
if (!isset($this->sc_temp_logged_user)) {$this->sc_temp_logged_user = (isset($_SESSION['logged_user'])) ? $_SESSION['logged_user'] : "";}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
  
	if(isset($this->sc_temp_logged_user) && ($this->sc_temp_logged_user == 'logout' || empty($this->sc_temp_logged_user)))
	{
		 unset($_SESSION['usr_login']);
 unset($this->sc_temp_usr_login);
 unset($_SESSION['logged_user']);
 unset($this->sc_temp_logged_user);
 unset($_SESSION['logged_date_login']);
 unset($this->sc_temp_logged_date_login);
 unset($_SESSION['usr_email']);
 unset($this->sc_temp_usr_email);
;
	}
if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
if (isset($this->sc_temp_logged_user)) { $_SESSION['logged_user'] = $this->sc_temp_logged_user;}
if (isset($this->sc_temp_logged_date_login)) { $_SESSION['logged_date_login'] = $this->sc_temp_logged_date_login;}
if (isset($this->sc_temp_usr_email)) { $_SESSION['usr_email'] = $this->sc_temp_usr_email;}
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off';
}
function seginsertApp($app_name, $idapptype, $description, $orden) {
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'on';
if (!isset($this->sc_temp_usr_database)) {$this->sc_temp_usr_database = (isset($_SESSION['usr_database'])) ? $_SESSION['usr_database'] : "";}
  

	$str_sql = "SELECT idapp, idapptype, description, orden, app_name FROM ".$this->sc_temp_usr_database.".seg_apps WHERE app_name = '". $app_name . "';";
	 
      $nm_select = $str_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs_app = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->rs_app[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs_app = false;
          $this->rs_app_erro = $this->Db->ErrorMsg();
      } 
;

	if (!isset($this->rs_app[0][0]))	{ 
		unset($this->rs_app);
		$str_sql = "SELECT idapp, idapptype, description, orden, app_name FROM ".$this->sc_temp_usr_database.".seg_apps WHERE orden = '". $orden . "';";
		 
      $nm_select = $str_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs_app = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->rs_app[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs_app = false;
          $this->rs_app_erro = $this->Db->ErrorMsg();
      } 
;
	}

	if (!isset($this->rs_app[0][0]))	{ 
		$str_sql = 'INSERT INTO '.$this->sc_temp_usr_database.'.seg_apps(app_name, idapptype, description, orden)'
			." VALUES ('$app_name', '$idapptype', '$description', '$orden')";
		
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                seg_login_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	} elseif ( $this->rs_app[0][1]!=$idapptype || $this->rs_app[0][2]!=$description || $this->rs_app[0][3]!=$orden ) {
		$var_idapp = $this->rs_app[0][0];
		$str_sql = 'UPDATE '.$this->sc_temp_usr_database.'.seg_apps'
			." SET idapptype= '$idapptype'"
			.", app_name='$app_name'"
			.", description='$description'"
			.", orden='$orden'"
			." WHERE idapp = $var_idapp";
		
     $nm_select = $str_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                seg_login_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	}
if (isset($this->sc_temp_usr_database)) { $_SESSION['usr_database'] = $this->sc_temp_usr_database;}
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              seg_login_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1) 
      { 
          $nm_saida_global = $_SESSION['scriptcase']['nm_sc_retorno']; 
      } 
    if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
    $_SESSION['scriptcase']['seg_login']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gOS)) {$this->sc_temp_gOS = (isset($_SESSION['gOS'])) ? $_SESSION['gOS'] : "";}
  ?>

<script>
	document.addEventListener("DOMContentLoaded", function(event) {

		let environment = '<?php echo $this->sc_temp_gOS; ?>';

		
		if(environment == 'WIN') {
			document.getElementById('id_sc_field_empresa').
			closest('.first').classList.remove("d-none");
		} else{
			document.getElementById('id_sc_field_nit').
			closest('.first').classList.remove("d-none");
		}
		
		console.log(environment);
		var inputs = document.getElementsByTagName("input");
		[].forEach.call(inputs, function(input) {
			input.setAttribute('autocomplete', 'off');
		});

		
		$(document).on("keypress", "#id_sc_field_pswd", function(e){
			if(e.which == 13) {
				let check = $('#rememberme').prop('checked');
				if(check){
					$('form[name=F1]')
						.find('input[type=text],input[type=password],select')
						.each(function(n,el){
							localStorage.setItem($(this).prop('id'), $(this).val());
						})
				}
				nm_atualiza('alterar');
				return;
			}
		});	

	});
</script>


<?php

if (isset($this->sc_temp_gOS)) { $_SESSION['gOS'] = $this->sc_temp_gOS;}
$_SESSION['scriptcase']['seg_login']['contr_erro'] = 'off'; 
    }
    if (!empty($this->Campos_Mens_erro)) 
    {
        $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
    }
    $this->nm_guardar_campos();
    $this->nm_formatar_campos();
        $this->initFormPages();
    $empresa = $this->empresa;
    $login = $this->login;
    $pswd = $this->pswd;
    $nit = $this->nit;
    header("X-XSS-Protection: 1; mode=block");
    header("X-Frame-Options: SAMEORIGIN");
    include_once("seg_login_form_user.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array(""))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['csrf_token'];
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

   function Form_lookup_empresa()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['Lookup_empresa']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['Lookup_empresa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['Lookup_empresa']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['Lookup_empresa'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['Lookup_empresa']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['Lookup_empresa'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['Lookup_empresa']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['Lookup_empresa'] = array(); 
    }
   $nm_comando = "SELECT nombre, nombre_empresa  FROM empresas  ORDER BY nombre_empresa";
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['Lookup_empresa'][] = $rs->fields[0];
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
       $nmgp_saida_form = "seg_login_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['nm_run_menu'] = 2;
       $nmgp_saida_form = "seg_login_fim.php";
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['redir_target_name']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['redir_target_name'])
       {
           $sTarget = $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['redir_target_name'];
           unset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['redir_target_name']);
       }
       else
       {
           $sTarget = '_self';
       }
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       seg_login_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['masterValue']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['opc_ant'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['seg_login']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           seg_login_pack_ajax_response();
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
       seg_login_pack_ajax_response();
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
       if ($this->Ini->nm_db_conn_mysql)
       {
           $this->Ini->nm_db_conn_mysql->Close();
       }
       exit;
   }
}
    function getButtonIds($buttonName) {
        switch ($buttonName) {
            case "ok":
                return array("sub_form_b.sc-unique-btn-1");
                break;
            case "help":
                return array("sc_b_hlp_b");
                break;
            case "exit":
                return array("Bsair_b.sc-unique-btn-2", "Bsair_b.sc-unique-btn-3");
                break;
        }

        return array($buttonName);
    } // getButtonIds

}
?>
