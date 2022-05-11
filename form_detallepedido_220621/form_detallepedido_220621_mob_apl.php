<?php
//
class form_detallepedido_220621_mob_apl
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
   var $iddet;
   var $idpedid;
   var $numfac;
   var $remision;
   var $idpro;
   var $unidadmayor;
   var $unidadmayor_1;
   var $factor;
   var $idbod;
   var $idbod_1;
   var $costop;
   var $cantidad;
   var $valorunit;
   var $valorpar;
   var $iva;
   var $descuento;
   var $adicional;
   var $adicional1;
   var $devuelto;
   var $colores;
   var $colores_1;
   var $tallas;
   var $tallas_1;
   var $sabor;
   var $sabor_1;
   var $estado_comanda;
   var $usuario_comanda;
   var $tercero_comanda;
   var $hora_inicio;
   var $hora_inicio_hora;
   var $hora_final;
   var $hora_final_hora;
   var $observ;
   var $cerrado;
   var $obs;
   var $descr;
   var $codbarra;
   var $stockubica;
   var $unidad;
   var $descrip;
   var $autorizarborrado;
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
          if (isset($this->NM_ajax_info['param']['adicional1']))
          {
              $this->adicional1 = $this->NM_ajax_info['param']['adicional1'];
          }
          if (isset($this->NM_ajax_info['param']['autorizarborrado']))
          {
              $this->autorizarborrado = $this->NM_ajax_info['param']['autorizarborrado'];
          }
          if (isset($this->NM_ajax_info['param']['cantidad']))
          {
              $this->cantidad = $this->NM_ajax_info['param']['cantidad'];
          }
          if (isset($this->NM_ajax_info['param']['colores']))
          {
              $this->colores = $this->NM_ajax_info['param']['colores'];
          }
          if (isset($this->NM_ajax_info['param']['costop']))
          {
              $this->costop = $this->NM_ajax_info['param']['costop'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['descrip']))
          {
              $this->descrip = $this->NM_ajax_info['param']['descrip'];
          }
          if (isset($this->NM_ajax_info['param']['descuento']))
          {
              $this->descuento = $this->NM_ajax_info['param']['descuento'];
          }
          if (isset($this->NM_ajax_info['param']['estado_comanda']))
          {
              $this->estado_comanda = $this->NM_ajax_info['param']['estado_comanda'];
          }
          if (isset($this->NM_ajax_info['param']['factor']))
          {
              $this->factor = $this->NM_ajax_info['param']['factor'];
          }
          if (isset($this->NM_ajax_info['param']['idbod']))
          {
              $this->idbod = $this->NM_ajax_info['param']['idbod'];
          }
          if (isset($this->NM_ajax_info['param']['iddet']))
          {
              $this->iddet = $this->NM_ajax_info['param']['iddet'];
          }
          if (isset($this->NM_ajax_info['param']['idpedid']))
          {
              $this->idpedid = $this->NM_ajax_info['param']['idpedid'];
          }
          if (isset($this->NM_ajax_info['param']['idpro']))
          {
              $this->idpro = $this->NM_ajax_info['param']['idpro'];
          }
          if (isset($this->NM_ajax_info['param']['iva']))
          {
              $this->iva = $this->NM_ajax_info['param']['iva'];
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
          if (isset($this->NM_ajax_info['param']['obs']))
          {
              $this->obs = $this->NM_ajax_info['param']['obs'];
          }
          if (isset($this->NM_ajax_info['param']['sabor']))
          {
              $this->sabor = $this->NM_ajax_info['param']['sabor'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['stockubica']))
          {
              $this->stockubica = $this->NM_ajax_info['param']['stockubica'];
          }
          if (isset($this->NM_ajax_info['param']['tallas']))
          {
              $this->tallas = $this->NM_ajax_info['param']['tallas'];
          }
          if (isset($this->NM_ajax_info['param']['unidad']))
          {
              $this->unidad = $this->NM_ajax_info['param']['unidad'];
          }
          if (isset($this->NM_ajax_info['param']['unidadmayor']))
          {
              $this->unidadmayor = $this->NM_ajax_info['param']['unidadmayor'];
          }
          if (isset($this->NM_ajax_info['param']['valorpar']))
          {
              $this->valorpar = $this->NM_ajax_info['param']['valorpar'];
          }
          if (isset($this->NM_ajax_info['param']['valorunit']))
          {
              $this->valorunit = $this->NM_ajax_info['param']['valorunit'];
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
      if (isset($this->gidpedido) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gidpedido'] = $this->gidpedido;
      }
      if (isset($this->edit_cantidad) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['edit_cantidad'] = $this->edit_cantidad;
      }
      if (isset($this->sw) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['sw'] = $this->sw;
      }
      if (isset($this->gProducto) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gProducto'] = $this->gProducto;
      }
      if (isset($this->gIdDeta) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gIdDeta'] = $this->gIdDeta;
      }
      if (isset($this->gidtercero) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gidtercero'] = $this->gidtercero;
      }
      if (isset($this->color_pedido) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['color_pedido'] = $this->color_pedido;
      }
      if (isset($this->talla_pedido) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['talla_pedido'] = $this->talla_pedido;
      }
      if (isset($this->sabor_pedido) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['sabor_pedido'] = $this->sabor_pedido;
      }
      if (isset($this->gModificarInventario) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gModificarInventario'] = $this->gModificarInventario;
      }
      if (isset($this->par_numero) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['par_numero'] = $this->par_numero;
      }
      if (isset($_POST["gidpedido"]) && isset($this->gidpedido)) 
      {
          $_SESSION['gidpedido'] = $this->gidpedido;
      }
      if (isset($_POST["edit_cantidad"]) && isset($this->edit_cantidad)) 
      {
          $_SESSION['edit_cantidad'] = $this->edit_cantidad;
      }
      if (isset($_POST["sw"]) && isset($this->sw)) 
      {
          $_SESSION['sw'] = $this->sw;
      }
      if (isset($_POST["gProducto"]) && isset($this->gProducto)) 
      {
          $_SESSION['gProducto'] = $this->gProducto;
      }
      if (!isset($_POST["gProducto"]) && isset($_POST["gproducto"])) 
      {
          $_SESSION['gProducto'] = $_POST["gproducto"];
      }
      if (isset($_POST["gIdDeta"]) && isset($this->gIdDeta)) 
      {
          $_SESSION['gIdDeta'] = $this->gIdDeta;
      }
      if (!isset($_POST["gIdDeta"]) && isset($_POST["giddeta"])) 
      {
          $_SESSION['gIdDeta'] = $_POST["giddeta"];
      }
      if (isset($_POST["gidtercero"]) && isset($this->gidtercero)) 
      {
          $_SESSION['gidtercero'] = $this->gidtercero;
      }
      if (isset($_POST["color_pedido"]) && isset($this->color_pedido)) 
      {
          $_SESSION['color_pedido'] = $this->color_pedido;
      }
      if (isset($_POST["talla_pedido"]) && isset($this->talla_pedido)) 
      {
          $_SESSION['talla_pedido'] = $this->talla_pedido;
      }
      if (isset($_POST["sabor_pedido"]) && isset($this->sabor_pedido)) 
      {
          $_SESSION['sabor_pedido'] = $this->sabor_pedido;
      }
      if (isset($_POST["gModificarInventario"]) && isset($this->gModificarInventario)) 
      {
          $_SESSION['gModificarInventario'] = $this->gModificarInventario;
      }
      if (!isset($_POST["gModificarInventario"]) && isset($_POST["gmodificarinventario"])) 
      {
          $_SESSION['gModificarInventario'] = $_POST["gmodificarinventario"];
      }
      if (isset($_POST["par_numero"]) && isset($this->par_numero)) 
      {
          $_SESSION['par_numero'] = $this->par_numero;
      }
      if (isset($_GET["gidpedido"]) && isset($this->gidpedido)) 
      {
          $_SESSION['gidpedido'] = $this->gidpedido;
      }
      if (isset($_GET["edit_cantidad"]) && isset($this->edit_cantidad)) 
      {
          $_SESSION['edit_cantidad'] = $this->edit_cantidad;
      }
      if (isset($_GET["sw"]) && isset($this->sw)) 
      {
          $_SESSION['sw'] = $this->sw;
      }
      if (isset($_GET["gProducto"]) && isset($this->gProducto)) 
      {
          $_SESSION['gProducto'] = $this->gProducto;
      }
      if (!isset($_GET["gProducto"]) && isset($_GET["gproducto"])) 
      {
          $_SESSION['gProducto'] = $_GET["gproducto"];
      }
      if (isset($_GET["gIdDeta"]) && isset($this->gIdDeta)) 
      {
          $_SESSION['gIdDeta'] = $this->gIdDeta;
      }
      if (!isset($_GET["gIdDeta"]) && isset($_GET["giddeta"])) 
      {
          $_SESSION['gIdDeta'] = $_GET["giddeta"];
      }
      if (isset($_GET["gidtercero"]) && isset($this->gidtercero)) 
      {
          $_SESSION['gidtercero'] = $this->gidtercero;
      }
      if (isset($_GET["color_pedido"]) && isset($this->color_pedido)) 
      {
          $_SESSION['color_pedido'] = $this->color_pedido;
      }
      if (isset($_GET["talla_pedido"]) && isset($this->talla_pedido)) 
      {
          $_SESSION['talla_pedido'] = $this->talla_pedido;
      }
      if (isset($_GET["sabor_pedido"]) && isset($this->sabor_pedido)) 
      {
          $_SESSION['sabor_pedido'] = $this->sabor_pedido;
      }
      if (isset($_GET["gModificarInventario"]) && isset($this->gModificarInventario)) 
      {
          $_SESSION['gModificarInventario'] = $this->gModificarInventario;
      }
      if (!isset($_GET["gModificarInventario"]) && isset($_GET["gmodificarinventario"])) 
      {
          $_SESSION['gModificarInventario'] = $_GET["gmodificarinventario"];
      }
      if (isset($_GET["par_numero"]) && isset($this->par_numero)) 
      {
          $_SESSION['par_numero'] = $this->par_numero;
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_detallepedido_220621_mob']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_detallepedido_220621_mob']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_detallepedido_220621_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_detallepedido_220621_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_detallepedido_220621_mob']['embutida_parms']);
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
                 nm_limpa_str_form_detallepedido_220621_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->gidpedido)) 
          {
              $_SESSION['gidpedido'] = $this->gidpedido;
          }
          if (isset($this->edit_cantidad)) 
          {
              $_SESSION['edit_cantidad'] = $this->edit_cantidad;
          }
          if (isset($this->sw)) 
          {
              $_SESSION['sw'] = $this->sw;
          }
          if (!isset($this->gProducto) && isset($this->gproducto)) 
          {
              $this->gProducto = $this->gproducto;
          }
          if (isset($this->gProducto)) 
          {
              $_SESSION['gProducto'] = $this->gProducto;
          }
          if (!isset($this->gIdDeta) && isset($this->giddeta)) 
          {
              $this->gIdDeta = $this->giddeta;
          }
          if (isset($this->gIdDeta)) 
          {
              $_SESSION['gIdDeta'] = $this->gIdDeta;
          }
          if (isset($this->gidtercero)) 
          {
              $_SESSION['gidtercero'] = $this->gidtercero;
          }
          if (isset($this->color_pedido)) 
          {
              $_SESSION['color_pedido'] = $this->color_pedido;
          }
          if (isset($this->talla_pedido)) 
          {
              $_SESSION['talla_pedido'] = $this->talla_pedido;
          }
          if (isset($this->sabor_pedido)) 
          {
              $_SESSION['sabor_pedido'] = $this->sabor_pedido;
          }
          if (!isset($this->gModificarInventario) && isset($this->gmodificarinventario)) 
          {
              $this->gModificarInventario = $this->gmodificarinventario;
          }
          if (isset($this->gModificarInventario)) 
          {
              $_SESSION['gModificarInventario'] = $this->gModificarInventario;
          }
          if (isset($this->par_numero)) 
          {
              $_SESSION['par_numero'] = $this->par_numero;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_detallepedido_220621_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_detallepedido_220621_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_detallepedido_220621_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_detallepedido_220621_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->gidpedido)) 
          {
              $_SESSION['gidpedido'] = $this->gidpedido;
          }
          if (isset($this->edit_cantidad)) 
          {
              $_SESSION['edit_cantidad'] = $this->edit_cantidad;
          }
          if (isset($this->sw)) 
          {
              $_SESSION['sw'] = $this->sw;
          }
          if (!isset($this->gProducto) && isset($this->gproducto)) 
          {
              $this->gProducto = $this->gproducto;
          }
          if (isset($this->gProducto)) 
          {
              $_SESSION['gProducto'] = $this->gProducto;
          }
          if (!isset($this->gIdDeta) && isset($this->giddeta)) 
          {
              $this->gIdDeta = $this->giddeta;
          }
          if (isset($this->gIdDeta)) 
          {
              $_SESSION['gIdDeta'] = $this->gIdDeta;
          }
          if (isset($this->gidtercero)) 
          {
              $_SESSION['gidtercero'] = $this->gidtercero;
          }
          if (isset($this->color_pedido)) 
          {
              $_SESSION['color_pedido'] = $this->color_pedido;
          }
          if (isset($this->talla_pedido)) 
          {
              $_SESSION['talla_pedido'] = $this->talla_pedido;
          }
          if (isset($this->sabor_pedido)) 
          {
              $_SESSION['sabor_pedido'] = $this->sabor_pedido;
          }
          if (!isset($this->gModificarInventario) && isset($this->gmodificarinventario)) 
          {
              $this->gModificarInventario = $this->gmodificarinventario;
          }
          if (isset($this->gModificarInventario)) 
          {
              $_SESSION['gModificarInventario'] = $this->gModificarInventario;
          }
          if (isset($this->par_numero)) 
          {
              $_SESSION['par_numero'] = $this->par_numero;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_detallepedido_220621_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_detallepedido_220621_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_detallepedido_220621_mob']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_detallepedido_220621_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_detallepedido_220621_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_detallepedido_220621_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_detallepedido_220621_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_detallepedido_220621_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_detallepedido_220621_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_detallepedido_220621_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_detallepedido_220621_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_detallepedido_220621_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_detallepedido_220621_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_detallepedido_220621_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_detallepedido_220621_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_detallepedido_220621_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_detallepedido_220621_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_detallepedido_220621_mob']['label'] = "Detalle venta";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_detallepedido_220621_mob")
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


      $this->arr_buttons['autorizar']['hint']             = "";
      $this->arr_buttons['autorizar']['type']             = "button";
      $this->arr_buttons['autorizar']['value']            = "autorizar";
      $this->arr_buttons['autorizar']['display']          = "only_text";
      $this->arr_buttons['autorizar']['display_position'] = "text_right";
      $this->arr_buttons['autorizar']['style']            = "default";
      $this->arr_buttons['autorizar']['image']            = "";

      $this->arr_buttons['refrescar']['hint']             = "";
      $this->arr_buttons['refrescar']['type']             = "button";
      $this->arr_buttons['refrescar']['value']            = "Recargar";
      $this->arr_buttons['refrescar']['display']          = "only_text";
      $this->arr_buttons['refrescar']['display_position'] = "text_right";
      $this->arr_buttons['refrescar']['style']            = "default";
      $this->arr_buttons['refrescar']['image']            = "";


      $_SESSION['scriptcase']['error_icon']['form_detallepedido_220621_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_detallepedido_220621_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['goto']      = 'on';
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
      $this->nmgp_botoes['autorizar'] = "on";
      $this->nmgp_botoes['refrescar'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_orig'] = " where idpedid='" . $_SESSION['gidpedido'] . "'";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_pesq'] = " where idpedid='" . $_SESSION['gidpedido'] . "'";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_detallepedido_220621_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_detallepedido_220621_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_detallepedido_220621_mob'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dados_form'];
          if (!isset($this->numfac)){$this->numfac = $this->nmgp_dados_form['numfac'];} 
          if (!isset($this->remision)){$this->remision = $this->nmgp_dados_form['remision'];} 
          if (!isset($this->devuelto)){$this->devuelto = $this->nmgp_dados_form['devuelto'];} 
          if (!isset($this->usuario_comanda)){$this->usuario_comanda = $this->nmgp_dados_form['usuario_comanda'];} 
          if (!isset($this->tercero_comanda)){$this->tercero_comanda = $this->nmgp_dados_form['tercero_comanda'];} 
          if (!isset($this->hora_inicio)){$this->hora_inicio = $this->nmgp_dados_form['hora_inicio'];} 
          if (!isset($this->hora_final)){$this->hora_final = $this->nmgp_dados_form['hora_final'];} 
          if (!isset($this->observ)){$this->observ = $this->nmgp_dados_form['observ'];} 
          if (!isset($this->cerrado)){$this->cerrado = $this->nmgp_dados_form['cerrado'];} 
          if (!isset($this->descr)){$this->descr = $this->nmgp_dados_form['descr'];} 
          if (!isset($this->codbarra)){$this->codbarra = $this->nmgp_dados_form['codbarra'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_detallepedido_220621_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'form_detallepedido_220621_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_detallepedido_220621_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_detallepedido_220621/form_detallepedido_220621_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_detallepedido_220621_mob_erro.class.php"); 
      }
      $this->Erro      = new form_detallepedido_220621_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['opcao']))
         { 
             if ($this->iddet != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_detallepedido_220621_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['autorizar'] = "off";
          $this->nmgp_botoes['refrescar'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['autorizar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['botoes']['autorizar'];
          $this->nmgp_botoes['refrescar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['botoes']['refrescar'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dados_form'];
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
      if (!isset($this->NM_ajax_flag) || ('validate_' != substr($this->NM_ajax_opcao, 0, 9) && 'add_new_line' != $this->NM_ajax_opcao && 'autocomp_' != substr($this->NM_ajax_opcao, 0, 9)))
      {
      $_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_descrip = $this->descrip;
}
if (!isset($this->sc_temp_gIdDeta)) {$this->sc_temp_gIdDeta = (isset($_SESSION['gIdDeta'])) ? $_SESSION['gIdDeta'] : "";}
if (!isset($this->sc_temp_gProducto)) {$this->sc_temp_gProducto = (isset($_SESSION['gProducto'])) ? $_SESSION['gProducto'] : "";}
  $this->sc_temp_gProducto='';
$this->sc_temp_gIdDeta='';
$this->nmgp_cmp_hidden["descrip"] = "off"; $this->NM_ajax_info['fieldDisplay']['descrip'] = 'off';
if (isset($this->sc_temp_gProducto)) { $_SESSION['gProducto'] = $this->sc_temp_gProducto;}
if (isset($this->sc_temp_gIdDeta)) { $_SESSION['gIdDeta'] = $this->sc_temp_gIdDeta;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_descrip != $this->descrip || (isset($bFlagRead_descrip) && $bFlagRead_descrip)))
    {
        $this->ajax_return_values_descrip(true);
    }
}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off'; 
      }
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['form_detallepedido_220621_mob']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['form_detallepedido_220621_mob']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
      if (isset($this->iddet)) { $this->nm_limpa_alfa($this->iddet); }
      if (isset($this->idpedid)) { $this->nm_limpa_alfa($this->idpedid); }
      if (isset($this->idpro)) { $this->nm_limpa_alfa($this->idpro); }
      if (isset($this->unidadmayor)) { $this->nm_limpa_alfa($this->unidadmayor); }
      if (isset($this->factor)) { $this->nm_limpa_alfa($this->factor); }
      if (isset($this->idbod)) { $this->nm_limpa_alfa($this->idbod); }
      if (isset($this->costop)) { $this->nm_limpa_alfa($this->costop); }
      if (isset($this->cantidad)) { $this->nm_limpa_alfa($this->cantidad); }
      if (isset($this->valorunit)) { $this->nm_limpa_alfa($this->valorunit); }
      if (isset($this->valorpar)) { $this->nm_limpa_alfa($this->valorpar); }
      if (isset($this->iva)) { $this->nm_limpa_alfa($this->iva); }
      if (isset($this->descuento)) { $this->nm_limpa_alfa($this->descuento); }
      if (isset($this->adicional)) { $this->nm_limpa_alfa($this->adicional); }
      if (isset($this->adicional1)) { $this->nm_limpa_alfa($this->adicional1); }
      if (isset($this->colores)) { $this->nm_limpa_alfa($this->colores); }
      if (isset($this->tallas)) { $this->nm_limpa_alfa($this->tallas); }
      if (isset($this->sabor)) { $this->nm_limpa_alfa($this->sabor); }
      if (isset($this->estado_comanda)) { $this->nm_limpa_alfa($this->estado_comanda); }
      if (isset($this->obs)) { $this->nm_limpa_alfa($this->obs); }
      if ($nm_opc_form_php == "formphp")
      { 
          if ($nm_call_php == "autorizar")
          { 
              $this->sc_btn_autorizar();
          } 
          if ($nm_call_php == "refrescar")
          { 
              $this->sc_btn_refrescar();
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- cantidad
      $this->field_config['cantidad']               = array();
      $this->field_config['cantidad']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cantidad']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cantidad']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['cantidad']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cantidad']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- valorunit
      $this->field_config['valorunit']               = array();
      $this->field_config['valorunit']['symbol_grp'] = '.';
      $this->field_config['valorunit']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valorunit']['symbol_dec'] = ',';
      $this->field_config['valorunit']['symbol_mon'] = '$';
      $this->field_config['valorunit']['format_pos'] = '3';
      $this->field_config['valorunit']['format_neg'] = '4';
      //-- adicional
      $this->field_config['adicional']               = array();
      $this->field_config['adicional']['symbol_grp'] = ',';
      $this->field_config['adicional']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['adicional']['symbol_dec'] = '.';
      $this->field_config['adicional']['symbol_mon'] = '%';
      $this->field_config['adicional']['format_pos'] = '3';
      $this->field_config['adicional']['format_neg'] = '2';
      //-- descuento
      $this->field_config['descuento']               = array();
      $this->field_config['descuento']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['descuento']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['descuento']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['descuento']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['descuento']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- valorpar
      $this->field_config['valorpar']               = array();
      $this->field_config['valorpar']['symbol_grp'] = ',';
      $this->field_config['valorpar']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valorpar']['symbol_dec'] = '.';
      $this->field_config['valorpar']['symbol_mon'] = '$';
      $this->field_config['valorpar']['format_pos'] = '3';
      $this->field_config['valorpar']['format_neg'] = '4';
      //-- stockubica
      $this->field_config['stockubica']               = array();
      $this->field_config['stockubica']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['stockubica']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['stockubica']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['stockubica']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['stockubica']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- iddet
      $this->field_config['iddet']               = array();
      $this->field_config['iddet']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['iddet']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['iddet']['symbol_dec'] = '';
      $this->field_config['iddet']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['iddet']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- adicional1
      $this->field_config['adicional1']               = array();
      $this->field_config['adicional1']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['adicional1']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['adicional1']['symbol_dec'] = '';
      $this->field_config['adicional1']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['adicional1']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- factor
      $this->field_config['factor']               = array();
      $this->field_config['factor']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['factor']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['factor']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['factor']['symbol_mon'] = '';
      $this->field_config['factor']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['factor']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- iva
      $this->field_config['iva']               = array();
      $this->field_config['iva']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['iva']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['iva']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['iva']['symbol_mon'] = $_SESSION['scriptcase']['reg_conf']['monet_simb'];
      $this->field_config['iva']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['iva']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- costop
      $this->field_config['costop']               = array();
      $this->field_config['costop']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['costop']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['costop']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['costop']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['costop']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- idpedid
      $this->field_config['idpedid']               = array();
      $this->field_config['idpedid']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idpedid']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idpedid']['symbol_dec'] = '';
      $this->field_config['idpedid']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idpedid']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- numfac
      $this->field_config['numfac']               = array();
      $this->field_config['numfac']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['numfac']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['numfac']['symbol_dec'] = '';
      $this->field_config['numfac']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['numfac']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- remision
      $this->field_config['remision']               = array();
      $this->field_config['remision']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['remision']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['remision']['symbol_dec'] = '';
      $this->field_config['remision']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['remision']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- devuelto
      $this->field_config['devuelto']               = array();
      $this->field_config['devuelto']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['devuelto']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['devuelto']['symbol_dec'] = '';
      $this->field_config['devuelto']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['devuelto']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- tercero_comanda
      $this->field_config['tercero_comanda']               = array();
      $this->field_config['tercero_comanda']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['tercero_comanda']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['tercero_comanda']['symbol_dec'] = '';
      $this->field_config['tercero_comanda']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['tercero_comanda']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- hora_inicio
      $this->field_config['hora_inicio']                 = array();
      $this->field_config['hora_inicio']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['hora_inicio']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['hora_inicio']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['hora_inicio']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'hora_inicio');
      //-- hora_final
      $this->field_config['hora_final']                 = array();
      $this->field_config['hora_final']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['hora_final']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['hora_final']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['hora_final']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'hora_final');
      //-- codbarra
      $this->field_config['codbarra']               = array();
      $this->field_config['codbarra']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['codbarra']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['codbarra']['symbol_dec'] = '';
      $this->field_config['codbarra']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['codbarra']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
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
          if ('validate_idpro' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idpro');
          }
          if ('validate_descrip' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'descrip');
          }
          if ('validate_idbod' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idbod');
          }
          if ('validate_unidad' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'unidad');
          }
          if ('validate_cantidad' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cantidad');
          }
          if ('validate_valorunit' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valorunit');
          }
          if ('validate_adicional' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'adicional');
          }
          if ('validate_descuento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'descuento');
          }
          if ('validate_valorpar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valorpar');
          }
          if ('validate_unidadmayor' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'unidadmayor');
          }
          if ('validate_stockubica' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'stockubica');
          }
          if ('validate_obs' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'obs');
          }
          if ('validate_iddet' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'iddet');
          }
          if ('validate_colores' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'colores');
          }
          if ('validate_tallas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tallas');
          }
          if ('validate_sabor' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sabor');
          }
          if ('validate_adicional1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'adicional1');
          }
          if ('validate_factor' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'factor');
          }
          if ('validate_iva' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'iva');
          }
          if ('validate_costop' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'costop');
          }
          if ('validate_autorizarborrado' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'autorizarborrado');
          }
          if ('validate_estado_comanda' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'estado_comanda');
          }
          if ('validate_idpedid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idpedid');
          }
          form_detallepedido_220621_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          if ('event_autorizarborrado_onclick' == $this->NM_ajax_opcao)
          {
              $this->autorizarborrado_onClick();
          }
          if ('event_cantidad_onblur' == $this->NM_ajax_opcao)
          {
              $this->cantidad_onBlur();
          }
          if ('event_cantidad_onchange' == $this->NM_ajax_opcao)
          {
              $this->cantidad_onChange();
          }
          if ('event_cantidad_onfocus' == $this->NM_ajax_opcao)
          {
              $this->cantidad_onFocus();
          }
          if ('event_colores_onchange' == $this->NM_ajax_opcao)
          {
              $this->colores_onChange();
          }
          if ('event_idbod_onblur' == $this->NM_ajax_opcao)
          {
              $this->idbod_onBlur();
          }
          if ('event_idbod_onchange' == $this->NM_ajax_opcao)
          {
              $this->idbod_onChange();
          }
          if ('event_idpro_onchange' == $this->NM_ajax_opcao)
          {
              $this->idpro_onChange();
          }
          if ('event_sabor_onchange' == $this->NM_ajax_opcao)
          {
              $this->sabor_onChange();
          }
          if ('event_tallas_onchange' == $this->NM_ajax_opcao)
          {
              $this->tallas_onChange();
          }
          if ('event_unidadmayor_onchange' == $this->NM_ajax_opcao)
          {
              $this->unidadmayor_onChange();
          }
          if ('event_valorunit_onchange' == $this->NM_ajax_opcao)
          {
              $this->valorunit_onChange();
          }
          form_detallepedido_220621_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('autocomp_idpro' == $this->NM_ajax_opcao)
          {
              if (isset($_GET['term'])) {
                  $this->idpro = ($_SESSION['scriptcase']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['scriptcase']['charset'], 'UTF-8')) : $_GET['term'];
              } else {
                  $this->idpro = '';
              }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idpro']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idpro'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idpro']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idpro'] = array(); 
    }

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_adicional = $this->adicional;
   $old_value_descuento = $this->descuento;
   $old_value_valorpar = $this->valorpar;
   $old_value_stockubica = $this->stockubica;
   $old_value_iddet = $this->iddet;
   $old_value_adicional1 = $this->adicional1;
   $old_value_factor = $this->factor;
   $old_value_iva = $this->iva;
   $old_value_costop = $this->costop;
   $old_value_idpedid = $this->idpedid;
   $this->nm_tira_formatacao();


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_stockubica = $this->stockubica;
   $unformatted_value_iddet = $this->iddet;
   $unformatted_value_adicional1 = $this->adicional1;
   $unformatted_value_factor = $this->factor;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_costop = $this->costop;
   $unformatted_value_idpedid = $this->idpedid;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro FROM productos WHERE codigobar + \" - \" + nompro LIKE '%" . substr($this->Db->qstr($this->idpro), 1, -1) . "%' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idprod, concat(codigobar, \" - \",nompro) FROM productos WHERE concat(codigobar, \" - \",nompro) LIKE '%" . substr($this->Db->qstr($this->idpro), 1, -1) . "%' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idprod, codigobar&\" - \"&nompro FROM productos WHERE codigobar&\" - \"&nompro LIKE '%" . substr($this->Db->qstr($this->idpro), 1, -1) . "%' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE codigobar||\" - \"||nompro LIKE '%" . substr($this->Db->qstr($this->idpro), 1, -1) . "%' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro FROM productos WHERE codigobar + \" - \" + nompro LIKE '%" . substr($this->Db->qstr($this->idpro), 1, -1) . "%' ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE codigobar||\" - \"||nompro LIKE '%" . substr($this->Db->qstr($this->idpro), 1, -1) . "%' ORDER BY codigobar, nompro";
   }
   else
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE codigobar||\" - \"||nompro LIKE '%" . substr($this->Db->qstr($this->idpro), 1, -1) . "%' ORDER BY codigobar, nompro";
   }

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->adicional = $old_value_adicional;
   $this->descuento = $old_value_descuento;
   $this->valorpar = $old_value_valorpar;
   $this->stockubica = $old_value_stockubica;
   $this->iddet = $old_value_iddet;
   $this->adicional1 = $old_value_adicional1;
   $this->factor = $old_value_factor;
   $this->iva = $old_value_iva;
   $this->costop = $old_value_costop;
   $this->idpedid = $old_value_idpedid;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_detallepedido_220621_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_detallepedido_220621_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idpro'][] = $rs->fields[0];
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
          form_detallepedido_220621_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['inline_form_seq'] = $this->sc_seq_row;
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
              form_detallepedido_220621_mob_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_detallepedido_220621_mob_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_detallepedido_220621_mob_pack_ajax_response();
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
          form_detallepedido_220621_mob_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_detallepedido_220621_mob.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Detalle venta") ?></TITLE>
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
<form name="Fdown" method="get" action="form_detallepedido_220621_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_detallepedido_220621_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="form_detallepedido_220621_mob.php" target="_self" style="display: none"> 
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
include_once("form_detallepedido_220621_mob_sajax_js.php");
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      else
      {
          if (!isset($this->iddet) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dados_form']['iddet']))
          {
              $varloc_btn_php['iddet'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dados_form']['iddet'];
          }
          if (!isset($this->estado_comanda) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dados_form']['estado_comanda']))
          {
              $varloc_btn_php['estado_comanda'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dados_form']['estado_comanda'];
          }
          if (!isset($this->idpro) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dados_form']['idpro']))
          {
              $varloc_btn_php['idpro'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dados_form']['idpro'];
          }
          if (!isset($this->iddet) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dados_form']['iddet']))
          {
              $varloc_btn_php['iddet'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dados_form']['iddet'];
          }
      }
      $nm_f_saida = "form_detallepedido_220621_mob.php";
      if (!empty($this->field_config['cantidad']['symbol_dec']))
      {
          nm_limpa_valor($this->cantidad, $this->field_config['cantidad']['symbol_dec'], $this->field_config['cantidad']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['valorunit']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valorunit, $this->field_config['valorunit']['symbol_dec'], $this->field_config['valorunit']['symbol_grp'], $this->field_config['valorunit']['symbol_mon']); 
          nm_limpa_valor($this->valorunit, $this->field_config['valorunit']['symbol_dec'], $this->field_config['valorunit']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['adicional']['symbol_dec']))
      {
          $this->sc_remove_currency($this->adicional, $this->field_config['adicional']['symbol_dec'], $this->field_config['adicional']['symbol_grp'], $this->field_config['adicional']['symbol_mon']); 
          nm_limpa_valor($this->adicional, $this->field_config['adicional']['symbol_dec'], $this->field_config['adicional']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['descuento']['symbol_dec']))
      {
          nm_limpa_valor($this->descuento, $this->field_config['descuento']['symbol_dec'], $this->field_config['descuento']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['valorpar']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valorpar, $this->field_config['valorpar']['symbol_dec'], $this->field_config['valorpar']['symbol_grp'], $this->field_config['valorpar']['symbol_mon']); 
          nm_limpa_valor($this->valorpar, $this->field_config['valorpar']['symbol_dec'], $this->field_config['valorpar']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['stockubica']['symbol_dec']))
      {
          nm_limpa_valor($this->stockubica, $this->field_config['stockubica']['symbol_dec'], $this->field_config['stockubica']['symbol_grp']) ; 
      }
      nm_limpa_numero($this->iddet, $this->field_config['iddet']['symbol_grp']) ; 
      nm_limpa_numero($this->adicional1, $this->field_config['adicional1']['symbol_grp']) ; 
      if (!empty($this->field_config['factor']['symbol_dec']))
      {
          $this->sc_remove_currency($this->factor, $this->field_config['factor']['symbol_dec'], $this->field_config['factor']['symbol_grp'], $this->field_config['factor']['symbol_mon']); 
          nm_limpa_valor($this->factor, $this->field_config['factor']['symbol_dec'], $this->field_config['factor']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['iva']['symbol_dec']))
      {
          $this->sc_remove_currency($this->iva, $this->field_config['iva']['symbol_dec'], $this->field_config['iva']['symbol_grp'], $this->field_config['iva']['symbol_mon']); 
          nm_limpa_valor($this->iva, $this->field_config['iva']['symbol_dec'], $this->field_config['iva']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['costop']['symbol_dec']))
      {
          nm_limpa_valor($this->costop, $this->field_config['costop']['symbol_dec'], $this->field_config['costop']['symbol_grp']) ; 
      }
      nm_limpa_numero($this->idpedid, $this->field_config['idpedid']['symbol_grp']) ; 
      foreach ($varloc_btn_php as $cmp => $val_cmp)
      {
          $this->$cmp = $val_cmp;
      }
      $_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gIdDeta)) {$this->sc_temp_gIdDeta = (isset($_SESSION['gIdDeta'])) ? $_SESSION['gIdDeta'] : "";}
if (!isset($this->sc_temp_gProducto)) {$this->sc_temp_gProducto = (isset($_SESSION['gProducto'])) ? $_SESSION['gProducto'] : "";}
  if($this->iddet >0 and $this->estado_comanda ==2)
	{
	$this->sc_temp_gProducto=$this->idpro ;
	$this->sc_temp_gIdDeta=$this->iddet ;
	 if (isset($this->sc_temp_gProducto)) { $_SESSION['gProducto'] = $this->sc_temp_gProducto;}
 if (isset($this->sc_temp_gIdDeta)) { $_SESSION['gIdDeta'] = $this->sc_temp_gIdDeta;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('autoriza_borrado') . "/", $this->nm_location, "_self?#?" . NM_encode_input("") . "?@?","_self", '', 440, 630);
 };
	}
else
	{
	$this->sc_set_focus('valorunii');
	echo "NO SE PUEDE ELIMINAR!";
	}
if (isset($this->sc_temp_gProducto)) { $_SESSION['gProducto'] = $this->sc_temp_gProducto;}
if (isset($this->sc_temp_gIdDeta)) { $_SESSION['gIdDeta'] = $this->sc_temp_gIdDeta;}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="iddet" value="<?php echo $this->form_encode_input($this->iddet) ?>"/>
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
   function sc_btn_refrescar() 
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
include_once("form_detallepedido_220621_mob_sajax_js.php");
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      $nm_f_saida = "form_detallepedido_220621_mob.php";
      if (!empty($this->field_config['cantidad']['symbol_dec']))
      {
          nm_limpa_valor($this->cantidad, $this->field_config['cantidad']['symbol_dec'], $this->field_config['cantidad']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['valorunit']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valorunit, $this->field_config['valorunit']['symbol_dec'], $this->field_config['valorunit']['symbol_grp'], $this->field_config['valorunit']['symbol_mon']); 
          nm_limpa_valor($this->valorunit, $this->field_config['valorunit']['symbol_dec'], $this->field_config['valorunit']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['adicional']['symbol_dec']))
      {
          $this->sc_remove_currency($this->adicional, $this->field_config['adicional']['symbol_dec'], $this->field_config['adicional']['symbol_grp'], $this->field_config['adicional']['symbol_mon']); 
          nm_limpa_valor($this->adicional, $this->field_config['adicional']['symbol_dec'], $this->field_config['adicional']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['descuento']['symbol_dec']))
      {
          nm_limpa_valor($this->descuento, $this->field_config['descuento']['symbol_dec'], $this->field_config['descuento']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['valorpar']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valorpar, $this->field_config['valorpar']['symbol_dec'], $this->field_config['valorpar']['symbol_grp'], $this->field_config['valorpar']['symbol_mon']); 
          nm_limpa_valor($this->valorpar, $this->field_config['valorpar']['symbol_dec'], $this->field_config['valorpar']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['stockubica']['symbol_dec']))
      {
          nm_limpa_valor($this->stockubica, $this->field_config['stockubica']['symbol_dec'], $this->field_config['stockubica']['symbol_grp']) ; 
      }
      nm_limpa_numero($this->iddet, $this->field_config['iddet']['symbol_grp']) ; 
      nm_limpa_numero($this->adicional1, $this->field_config['adicional1']['symbol_grp']) ; 
      if (!empty($this->field_config['factor']['symbol_dec']))
      {
          $this->sc_remove_currency($this->factor, $this->field_config['factor']['symbol_dec'], $this->field_config['factor']['symbol_grp'], $this->field_config['factor']['symbol_mon']); 
          nm_limpa_valor($this->factor, $this->field_config['factor']['symbol_dec'], $this->field_config['factor']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['iva']['symbol_dec']))
      {
          $this->sc_remove_currency($this->iva, $this->field_config['iva']['symbol_dec'], $this->field_config['iva']['symbol_grp'], $this->field_config['iva']['symbol_mon']); 
          nm_limpa_valor($this->iva, $this->field_config['iva']['symbol_dec'], $this->field_config['iva']['symbol_grp']) ; 
      }
      if (!empty($this->field_config['costop']['symbol_dec']))
      {
          nm_limpa_valor($this->costop, $this->field_config['costop']['symbol_dec'], $this->field_config['costop']['symbol_grp']) ; 
      }
      nm_limpa_numero($this->idpedid, $this->field_config['idpedid']['symbol_grp']) ; 
      $_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_par_numero)) {$this->sc_temp_par_numero = (isset($_SESSION['par_numero'])) ? $_SESSION['par_numero'] : "";}
  $vidped = $this->sc_temp_par_numero;
$this->sc_temp_par_numero = $vidped;
 if (isset($this->sc_temp_par_numero)) { $_SESSION['par_numero'] = $this->sc_temp_par_numero;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_detallepedido') . "/", $this->nm_location, "par_numero?#?" . NM_encode_input($vidped) . "?@?","_self", '', 440, 630);
 };
if (isset($this->sc_temp_par_numero)) { $_SESSION['par_numero'] = $this->sc_temp_par_numero;}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="iddet" value="<?php echo $this->form_encode_input($this->iddet) ?>"/>
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
           case 'idpro':
               return "Artículo";
               break;
           case 'descrip':
               return "Desc. Artículo";
               break;
           case 'idbod':
               return " Bodega";
               break;
           case 'unidad':
               return "Unidad";
               break;
           case 'cantidad':
               return "Cantidad";
               break;
           case 'valorunit':
               return "Unitario";
               break;
           case 'adicional':
               return "Impuesto";
               break;
           case 'descuento':
               return "Desc.";
               break;
           case 'valorpar':
               return "Parcial";
               break;
           case 'unidadmayor':
               return "Unidad Mayor";
               break;
           case 'stockubica':
               return "Stock Ubicación";
               break;
           case 'obs':
               return "Desc. Artículo";
               break;
           case 'iddet':
               return "Iddet";
               break;
           case 'colores':
               return "Color";
               break;
           case 'tallas':
               return "Talla";
               break;
           case 'sabor':
               return "Sabor";
               break;
           case 'adicional1':
               return "Tasa de descuento";
               break;
           case 'factor':
               return "Factor";
               break;
           case 'iva':
               return "Impuesto";
               break;
           case 'costop':
               return "Costop";
               break;
           case 'autorizarborrado':
               return "Borrar";
               break;
           case 'estado_comanda':
               return "Estado";
               break;
           case 'idpedid':
               return "Idpedid";
               break;
           case 'numfac':
               return "Numfac";
               break;
           case 'remision':
               return "Remision";
               break;
           case 'devuelto':
               return "Devuelto";
               break;
           case 'usuario_comanda':
               return "Usuario Comanda";
               break;
           case 'tercero_comanda':
               return "Tercero Comanda";
               break;
           case 'hora_inicio':
               return "Hora Inicio";
               break;
           case 'hora_final':
               return "Hora Final";
               break;
           case 'observ':
               return "Observ";
               break;
           case 'cerrado':
               return "Cerrado";
               break;
           case 'descr':
               return "Descr";
               break;
           case 'codbarra':
               return "Código";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_detallepedido_220621_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_detallepedido_220621_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_detallepedido_220621_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_detallepedido_220621_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'idpro' == $filtro)) || (is_array($filtro) && in_array('idpro', $filtro)))
        $this->ValidateField_idpro($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'descrip' == $filtro)) || (is_array($filtro) && in_array('descrip', $filtro)))
        $this->ValidateField_descrip($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'idbod' == $filtro)) || (is_array($filtro) && in_array('idbod', $filtro)))
        $this->ValidateField_idbod($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'unidad' == $filtro)) || (is_array($filtro) && in_array('unidad', $filtro)))
        $this->ValidateField_unidad($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cantidad' == $filtro)) || (is_array($filtro) && in_array('cantidad', $filtro)))
        $this->ValidateField_cantidad($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'valorunit' == $filtro)) || (is_array($filtro) && in_array('valorunit', $filtro)))
        $this->ValidateField_valorunit($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'adicional' == $filtro)) || (is_array($filtro) && in_array('adicional', $filtro)))
        $this->ValidateField_adicional($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'descuento' == $filtro)) || (is_array($filtro) && in_array('descuento', $filtro)))
        $this->ValidateField_descuento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'valorpar' == $filtro)) || (is_array($filtro) && in_array('valorpar', $filtro)))
        $this->ValidateField_valorpar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'unidadmayor' == $filtro)) || (is_array($filtro) && in_array('unidadmayor', $filtro)))
        $this->ValidateField_unidadmayor($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'stockubica' == $filtro)) || (is_array($filtro) && in_array('stockubica', $filtro)))
        $this->ValidateField_stockubica($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'obs' == $filtro)) || (is_array($filtro) && in_array('obs', $filtro)))
        $this->ValidateField_obs($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'iddet' == $filtro)) || (is_array($filtro) && in_array('iddet', $filtro)))
        $this->ValidateField_iddet($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'colores' == $filtro)) || (is_array($filtro) && in_array('colores', $filtro)))
        $this->ValidateField_colores($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tallas' == $filtro)) || (is_array($filtro) && in_array('tallas', $filtro)))
        $this->ValidateField_tallas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'sabor' == $filtro)) || (is_array($filtro) && in_array('sabor', $filtro)))
        $this->ValidateField_sabor($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'adicional1' == $filtro)) || (is_array($filtro) && in_array('adicional1', $filtro)))
        $this->ValidateField_adicional1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'factor' == $filtro)) || (is_array($filtro) && in_array('factor', $filtro)))
        $this->ValidateField_factor($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'iva' == $filtro)) || (is_array($filtro) && in_array('iva', $filtro)))
        $this->ValidateField_iva($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'costop' == $filtro)) || (is_array($filtro) && in_array('costop', $filtro)))
        $this->ValidateField_costop($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'autorizarborrado' == $filtro)) || (is_array($filtro) && in_array('autorizarborrado', $filtro)))
        $this->ValidateField_autorizarborrado($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'estado_comanda' == $filtro)) || (is_array($filtro) && in_array('estado_comanda', $filtro)))
        $this->ValidateField_estado_comanda($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'idpedid' == $filtro)) || (is_array($filtro) && in_array('idpedid', $filtro)))
        $this->ValidateField_idpedid($Campos_Crit, $Campos_Falta, $Campos_Erros);

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_cantidad = $this->cantidad;
    $original_estado_comanda = $this->estado_comanda;
    $original_valorpar = $this->valorpar;
}
  if ($this->sc_evento == "excluir" || $this->sc_evento == "delete")
	{
	if($this->estado_comanda <2)
		{
		goto a;
		}
	elseif($this->estado_comanda ==2)
		{
		
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "¡Ítem No se puede eliminar, solicite Autorización!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_form_detallepedido_220621_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_detallepedido_220621_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "¡Ítem No se puede eliminar, solicite Autorización!";
 }
;
		}
	else
		{
		
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "¡Ítem No se puede eliminar!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_form_detallepedido_220621_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_detallepedido_220621_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "¡Ítem No se puede eliminar!";
 }
;
		}
	}

if($this->cantidad ==0.00 or (empty($this->cantidad )))
	{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "¡Ingrese una cantidad Válida!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_form_detallepedido_220621_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_detallepedido_220621_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "¡Ingrese una cantidad Válida!";
 }
;
	$this->sc_set_focus('colores');
	if(floatval($this->valorpar )<1)
			{
			
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "¡No ingresó precio válido!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_form_detallepedido_220621_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_detallepedido_220621_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "¡No ingresó precio válido!";
 }
;
			}
	}
a:;
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_cantidad != $this->cantidad || (isset($bFlagRead_cantidad) && $bFlagRead_cantidad)))
    {
        $this->ajax_return_values_cantidad(true);
    }
    if (($original_estado_comanda != $this->estado_comanda || (isset($bFlagRead_estado_comanda) && $bFlagRead_estado_comanda)))
    {
        $this->ajax_return_values_estado_comanda(true);
    }
    if (($original_valorpar != $this->valorpar || (isset($bFlagRead_valorpar) && $bFlagRead_valorpar)))
    {
        $this->ajax_return_values_valorpar(true);
    }
}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off'; 
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

    function ValidateField_idpro(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->idpro) > 10) 
          { 
              $hasError = true;
              $Campos_Crit .= "Artículo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['idpro']))
              {
                  $Campos_Erros['idpro'] = array();
              }
              $Campos_Erros['idpro'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['idpro']) || !is_array($this->NM_ajax_info['errList']['idpro']))
              {
                  $this->NM_ajax_info['errList']['idpro'] = array();
              }
              $this->NM_ajax_info['errList']['idpro'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idpro';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idpro

    function ValidateField_descrip(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->descrip) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'descrip';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_descrip

    function ValidateField_idbod(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idbod == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['php_cmp_required']['idbod']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['php_cmp_required']['idbod'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = " Bodega" ; 
          if (!isset($Campos_Erros['idbod']))
          {
              $Campos_Erros['idbod'] = array();
          }
          $Campos_Erros['idbod'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['idbod']) || !is_array($this->NM_ajax_info['errList']['idbod']))
          {
              $this->NM_ajax_info['errList']['idbod'] = array();
          }
          $this->NM_ajax_info['errList']['idbod'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->idbod) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod']) && !in_array($this->idbod, $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['idbod']))
              {
                  $Campos_Erros['idbod'] = array();
              }
              $Campos_Erros['idbod'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['idbod']) || !is_array($this->NM_ajax_info['errList']['idbod']))
              {
                  $this->NM_ajax_info['errList']['idbod'] = array();
              }
              $this->NM_ajax_info['errList']['idbod'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idbod';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idbod

    function ValidateField_unidad(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->unidad) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'unidad';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_unidad

    function ValidateField_cantidad(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cantidad === "" || is_null($this->cantidad))  
      { 
          $this->cantidad = 0;
          $this->sc_force_zero[] = 'cantidad';
      } 
      if (!empty($this->field_config['cantidad']['symbol_dec']))
      {
          nm_limpa_valor($this->cantidad, $this->field_config['cantidad']['symbol_dec'], $this->field_config['cantidad']['symbol_grp']) ; 
          if ('.' == substr($this->cantidad, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->cantidad, 1)))
              {
                  $this->cantidad = '';
              }
              else
              {
                  $this->cantidad = '0' . $this->cantidad;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->cantidad != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->cantidad) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cantidad: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cantidad']))
                  {
                      $Campos_Erros['cantidad'] = array();
                  }
                  $Campos_Erros['cantidad'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cantidad']) || !is_array($this->NM_ajax_info['errList']['cantidad']))
                  {
                      $this->NM_ajax_info['errList']['cantidad'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidad'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cantidad, 10, 2, -0, 999999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cantidad; " ; 
                  if (!isset($Campos_Erros['cantidad']))
                  {
                      $Campos_Erros['cantidad'] = array();
                  }
                  $Campos_Erros['cantidad'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cantidad']) || !is_array($this->NM_ajax_info['errList']['cantidad']))
                  {
                      $this->NM_ajax_info['errList']['cantidad'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidad'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cantidad';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cantidad

    function ValidateField_valorunit(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->valorunit === "" || is_null($this->valorunit))  
      { 
          $this->valorunit = 0;
          $this->sc_force_zero[] = 'valorunit';
      } 
      if (!empty($this->field_config['valorunit']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valorunit, $this->field_config['valorunit']['symbol_dec'], $this->field_config['valorunit']['symbol_grp'], $this->field_config['valorunit']['symbol_mon']); 
          nm_limpa_valor($this->valorunit, $this->field_config['valorunit']['symbol_dec'], $this->field_config['valorunit']['symbol_grp']) ; 
          if ('.' == substr($this->valorunit, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->valorunit, 1)))
              {
                  $this->valorunit = '';
              }
              else
              {
                  $this->valorunit = '0' . $this->valorunit;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->valorunit != '')  
          { 
              $iTestSize = 13;
              if ('-' == substr($this->valorunit, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->valorunit, -1))
              {
                  $iTestSize++;
                  $this->valorunit = '-' . substr($this->valorunit, 0, -1);
              }
              if (strlen($this->valorunit) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Unitario: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valorunit']))
                  {
                      $Campos_Erros['valorunit'] = array();
                  }
                  $Campos_Erros['valorunit'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valorunit']) || !is_array($this->NM_ajax_info['errList']['valorunit']))
                  {
                      $this->NM_ajax_info['errList']['valorunit'] = array();
                  }
                  $this->NM_ajax_info['errList']['valorunit'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valorunit, 12, 0, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Unitario; " ; 
                  if (!isset($Campos_Erros['valorunit']))
                  {
                      $Campos_Erros['valorunit'] = array();
                  }
                  $Campos_Erros['valorunit'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valorunit']) || !is_array($this->NM_ajax_info['errList']['valorunit']))
                  {
                      $this->NM_ajax_info['errList']['valorunit'] = array();
                  }
                  $this->NM_ajax_info['errList']['valorunit'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valorunit';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valorunit

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
                  $Campos_Crit .= "Impuesto: " . $this->Ini->Nm_lang['lang_errm_size']; 
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
              if ($teste_validade->Valor($this->adicional, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Impuesto; " ; 
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

    function ValidateField_descuento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->descuento === "" || is_null($this->descuento))  
      { 
          $this->descuento = 0;
          $this->sc_force_zero[] = 'descuento';
      } 
      if (!empty($this->field_config['descuento']['symbol_dec']))
      {
          nm_limpa_valor($this->descuento, $this->field_config['descuento']['symbol_dec'], $this->field_config['descuento']['symbol_grp']) ; 
          if ('.' == substr($this->descuento, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->descuento, 1)))
              {
                  $this->descuento = '';
              }
              else
              {
                  $this->descuento = '0' . $this->descuento;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->descuento != '')  
          { 
              $iTestSize = 7;
              if (strlen($this->descuento) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Desc.: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['descuento']))
                  {
                      $Campos_Erros['descuento'] = array();
                  }
                  $Campos_Erros['descuento'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['descuento']) || !is_array($this->NM_ajax_info['errList']['descuento']))
                  {
                      $this->NM_ajax_info['errList']['descuento'] = array();
                  }
                  $this->NM_ajax_info['errList']['descuento'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->descuento, 6, 0, -0, 999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Desc.; " ; 
                  if (!isset($Campos_Erros['descuento']))
                  {
                      $Campos_Erros['descuento'] = array();
                  }
                  $Campos_Erros['descuento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['descuento']) || !is_array($this->NM_ajax_info['errList']['descuento']))
                  {
                      $this->NM_ajax_info['errList']['descuento'] = array();
                  }
                  $this->NM_ajax_info['errList']['descuento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'descuento';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_descuento

    function ValidateField_valorpar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->valorpar === "" || is_null($this->valorpar))  
      { 
          $this->valorpar = 0;
          $this->sc_force_zero[] = 'valorpar';
      } 
      if (!empty($this->field_config['valorpar']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valorpar, $this->field_config['valorpar']['symbol_dec'], $this->field_config['valorpar']['symbol_grp'], $this->field_config['valorpar']['symbol_mon']); 
          nm_limpa_valor($this->valorpar, $this->field_config['valorpar']['symbol_dec'], $this->field_config['valorpar']['symbol_grp']) ; 
          if ('.' == substr($this->valorpar, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->valorpar, 1)))
              {
                  $this->valorpar = '';
              }
              else
              {
                  $this->valorpar = '0' . $this->valorpar;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->valorpar != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->valorpar) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Parcial: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valorpar']))
                  {
                      $Campos_Erros['valorpar'] = array();
                  }
                  $Campos_Erros['valorpar'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valorpar']) || !is_array($this->NM_ajax_info['errList']['valorpar']))
                  {
                      $this->NM_ajax_info['errList']['valorpar'] = array();
                  }
                  $this->NM_ajax_info['errList']['valorpar'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valorpar, 12, 0, -0, 999999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Parcial; " ; 
                  if (!isset($Campos_Erros['valorpar']))
                  {
                      $Campos_Erros['valorpar'] = array();
                  }
                  $Campos_Erros['valorpar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valorpar']) || !is_array($this->NM_ajax_info['errList']['valorpar']))
                  {
                      $this->NM_ajax_info['errList']['valorpar'] = array();
                  }
                  $this->NM_ajax_info['errList']['valorpar'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valorpar';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valorpar

    function ValidateField_unidadmayor(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->unidadmayor == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'unidadmayor';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_unidadmayor

    function ValidateField_stockubica(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->stockubica === "" || is_null($this->stockubica))  
      { 
          $this->stockubica = 0;
          $this->sc_force_zero[] = 'stockubica';
      } 
      if (!empty($this->field_config['stockubica']['symbol_dec']))
      {
          nm_limpa_valor($this->stockubica, $this->field_config['stockubica']['symbol_dec'], $this->field_config['stockubica']['symbol_grp']) ; 
          if ('.' == substr($this->stockubica, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->stockubica, 1)))
              {
                  $this->stockubica = '';
              }
              else
              {
                  $this->stockubica = '0' . $this->stockubica;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->stockubica != '')  
          { 
              $iTestSize = 21;
              if ('-' == substr($this->stockubica, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->stockubica, -1))
              {
                  $iTestSize++;
                  $this->stockubica = '-' . substr($this->stockubica, 0, -1);
              }
              if (strlen($this->stockubica) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Stock Ubicación: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['stockubica']))
                  {
                      $Campos_Erros['stockubica'] = array();
                  }
                  $Campos_Erros['stockubica'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['stockubica']) || !is_array($this->NM_ajax_info['errList']['stockubica']))
                  {
                      $this->NM_ajax_info['errList']['stockubica'] = array();
                  }
                  $this->NM_ajax_info['errList']['stockubica'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->stockubica, 18, 2, 0, 0, "S") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Stock Ubicación; " ; 
                  if (!isset($Campos_Erros['stockubica']))
                  {
                      $Campos_Erros['stockubica'] = array();
                  }
                  $Campos_Erros['stockubica'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['stockubica']) || !is_array($this->NM_ajax_info['errList']['stockubica']))
                  {
                      $this->NM_ajax_info['errList']['stockubica'] = array();
                  }
                  $this->NM_ajax_info['errList']['stockubica'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'stockubica';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_stockubica

    function ValidateField_obs(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->obs) > 600) 
          { 
              $hasError = true;
              $Campos_Crit .= "Desc. Artículo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 600 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['obs']))
              {
                  $Campos_Erros['obs'] = array();
              }
              $Campos_Erros['obs'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 600 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['obs']) || !is_array($this->NM_ajax_info['errList']['obs']))
              {
                  $this->NM_ajax_info['errList']['obs'] = array();
              }
              $this->NM_ajax_info['errList']['obs'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 600 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'obs';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_obs

    function ValidateField_iddet(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->iddet === "" || is_null($this->iddet))  
      { 
          $this->iddet = 0;
      } 
      nm_limpa_numero($this->iddet, $this->field_config['iddet']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->iddet != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->iddet) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Iddet: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['iddet']))
                  {
                      $Campos_Erros['iddet'] = array();
                  }
                  $Campos_Erros['iddet'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['iddet']) || !is_array($this->NM_ajax_info['errList']['iddet']))
                  {
                      $this->NM_ajax_info['errList']['iddet'] = array();
                  }
                  $this->NM_ajax_info['errList']['iddet'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->iddet, 20, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Iddet; " ; 
                  if (!isset($Campos_Erros['iddet']))
                  {
                      $Campos_Erros['iddet'] = array();
                  }
                  $Campos_Erros['iddet'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['iddet']) || !is_array($this->NM_ajax_info['errList']['iddet']))
                  {
                      $this->NM_ajax_info['errList']['iddet'] = array();
                  }
                  $this->NM_ajax_info['errList']['iddet'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'iddet';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_iddet

    function ValidateField_colores(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->colores) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores']) && !in_array($this->colores, $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['colores']))
                   {
                       $Campos_Erros['colores'] = array();
                   }
                   $Campos_Erros['colores'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['colores']) || !is_array($this->NM_ajax_info['errList']['colores']))
                   {
                       $this->NM_ajax_info['errList']['colores'] = array();
                   }
                   $this->NM_ajax_info['errList']['colores'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'colores';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_colores

    function ValidateField_tallas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->tallas) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas']) && !in_array($this->tallas, $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['tallas']))
                   {
                       $Campos_Erros['tallas'] = array();
                   }
                   $Campos_Erros['tallas'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['tallas']) || !is_array($this->NM_ajax_info['errList']['tallas']))
                   {
                       $this->NM_ajax_info['errList']['tallas'] = array();
                   }
                   $this->NM_ajax_info['errList']['tallas'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tallas';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tallas

    function ValidateField_sabor(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->sabor) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor']) && !in_array($this->sabor, $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['sabor']))
                   {
                       $Campos_Erros['sabor'] = array();
                   }
                   $Campos_Erros['sabor'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['sabor']) || !is_array($this->NM_ajax_info['errList']['sabor']))
                   {
                       $this->NM_ajax_info['errList']['sabor'] = array();
                   }
                   $this->NM_ajax_info['errList']['sabor'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sabor';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sabor

    function ValidateField_adicional1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->adicional1 === "" || is_null($this->adicional1))  
      { 
          $this->adicional1 = 0;
          $this->sc_force_zero[] = 'adicional1';
      } 
      nm_limpa_numero($this->adicional1, $this->field_config['adicional1']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->adicional1 != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->adicional1) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tasa de descuento: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['adicional1']))
                  {
                      $Campos_Erros['adicional1'] = array();
                  }
                  $Campos_Erros['adicional1'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['adicional1']) || !is_array($this->NM_ajax_info['errList']['adicional1']))
                  {
                      $this->NM_ajax_info['errList']['adicional1'] = array();
                  }
                  $this->NM_ajax_info['errList']['adicional1'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->adicional1, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tasa de descuento; " ; 
                  if (!isset($Campos_Erros['adicional1']))
                  {
                      $Campos_Erros['adicional1'] = array();
                  }
                  $Campos_Erros['adicional1'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['adicional1']) || !is_array($this->NM_ajax_info['errList']['adicional1']))
                  {
                      $this->NM_ajax_info['errList']['adicional1'] = array();
                  }
                  $this->NM_ajax_info['errList']['adicional1'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'adicional1';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_adicional1

    function ValidateField_factor(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->factor === "" || is_null($this->factor))  
      { 
          $this->factor = 0;
          $this->sc_force_zero[] = 'factor';
      } 
      if (!empty($this->field_config['factor']['symbol_dec']))
      {
          $this->sc_remove_currency($this->factor, $this->field_config['factor']['symbol_dec'], $this->field_config['factor']['symbol_grp'], $this->field_config['factor']['symbol_mon']); 
          nm_limpa_valor($this->factor, $this->field_config['factor']['symbol_dec'], $this->field_config['factor']['symbol_grp']) ; 
          if ('.' == substr($this->factor, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->factor, 1)))
              {
                  $this->factor = '';
              }
              else
              {
                  $this->factor = '0' . $this->factor;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->factor != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->factor) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Factor: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['factor']))
                  {
                      $Campos_Erros['factor'] = array();
                  }
                  $Campos_Erros['factor'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['factor']) || !is_array($this->NM_ajax_info['errList']['factor']))
                  {
                      $this->NM_ajax_info['errList']['factor'] = array();
                  }
                  $this->NM_ajax_info['errList']['factor'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->factor, 8, 2, -0, 9999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Factor; " ; 
                  if (!isset($Campos_Erros['factor']))
                  {
                      $Campos_Erros['factor'] = array();
                  }
                  $Campos_Erros['factor'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['factor']) || !is_array($this->NM_ajax_info['errList']['factor']))
                  {
                      $this->NM_ajax_info['errList']['factor'] = array();
                  }
                  $this->NM_ajax_info['errList']['factor'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'factor';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_factor

    function ValidateField_iva(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->iva === "" || is_null($this->iva))  
      { 
          $this->iva = 0;
          $this->sc_force_zero[] = 'iva';
      } 
      if (!empty($this->field_config['iva']['symbol_dec']))
      {
          $this->sc_remove_currency($this->iva, $this->field_config['iva']['symbol_dec'], $this->field_config['iva']['symbol_grp'], $this->field_config['iva']['symbol_mon']); 
          nm_limpa_valor($this->iva, $this->field_config['iva']['symbol_dec'], $this->field_config['iva']['symbol_grp']) ; 
          if ('.' == substr($this->iva, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->iva, 1)))
              {
                  $this->iva = '';
              }
              else
              {
                  $this->iva = '0' . $this->iva;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->iva != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->iva) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Impuesto: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['iva']))
                  {
                      $Campos_Erros['iva'] = array();
                  }
                  $Campos_Erros['iva'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['iva']) || !is_array($this->NM_ajax_info['errList']['iva']))
                  {
                      $this->NM_ajax_info['errList']['iva'] = array();
                  }
                  $this->NM_ajax_info['errList']['iva'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->iva, 8, 2, -0, 9999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Impuesto; " ; 
                  if (!isset($Campos_Erros['iva']))
                  {
                      $Campos_Erros['iva'] = array();
                  }
                  $Campos_Erros['iva'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['iva']) || !is_array($this->NM_ajax_info['errList']['iva']))
                  {
                      $this->NM_ajax_info['errList']['iva'] = array();
                  }
                  $this->NM_ajax_info['errList']['iva'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'iva';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_iva

    function ValidateField_costop(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->costop === "" || is_null($this->costop))  
      { 
          $this->costop = 0;
          $this->sc_force_zero[] = 'costop';
      } 
      if (!empty($this->field_config['costop']['symbol_dec']))
      {
          nm_limpa_valor($this->costop, $this->field_config['costop']['symbol_dec'], $this->field_config['costop']['symbol_grp']) ; 
          if ('.' == substr($this->costop, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->costop, 1)))
              {
                  $this->costop = '';
              }
              else
              {
                  $this->costop = '0' . $this->costop;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->costop != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->costop) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Costop: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['costop']))
                  {
                      $Campos_Erros['costop'] = array();
                  }
                  $Campos_Erros['costop'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['costop']) || !is_array($this->NM_ajax_info['errList']['costop']))
                  {
                      $this->NM_ajax_info['errList']['costop'] = array();
                  }
                  $this->NM_ajax_info['errList']['costop'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->costop, 12, 0, -0, 999999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Costop; " ; 
                  if (!isset($Campos_Erros['costop']))
                  {
                      $Campos_Erros['costop'] = array();
                  }
                  $Campos_Erros['costop'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['costop']) || !is_array($this->NM_ajax_info['errList']['costop']))
                  {
                      $this->NM_ajax_info['errList']['costop'] = array();
                  }
                  $this->NM_ajax_info['errList']['costop'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'costop';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_costop

    function ValidateField_autorizarborrado(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->autorizarborrado == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->autorizarborrado != "")
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_autorizarborrado']) && !in_array($this->autorizarborrado, $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_autorizarborrado']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['autorizarborrado']))
              {
                  $Campos_Erros['autorizarborrado'] = array();
              }
              $Campos_Erros['autorizarborrado'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['autorizarborrado']) || !is_array($this->NM_ajax_info['errList']['autorizarborrado']))
              {
                  $this->NM_ajax_info['errList']['autorizarborrado'] = array();
              }
              $this->NM_ajax_info['errList']['autorizarborrado'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'autorizarborrado';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_autorizarborrado

    function ValidateField_estado_comanda(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->estado_comanda) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Estado " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['estado_comanda']))
              {
                  $Campos_Erros['estado_comanda'] = array();
              }
              $Campos_Erros['estado_comanda'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['estado_comanda']) || !is_array($this->NM_ajax_info['errList']['estado_comanda']))
              {
                  $this->NM_ajax_info['errList']['estado_comanda'] = array();
              }
              $this->NM_ajax_info['errList']['estado_comanda'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'estado_comanda';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_estado_comanda

    function ValidateField_idpedid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idpedid === "" || is_null($this->idpedid))  
      { 
          $this->idpedid = 0;
          $this->sc_force_zero[] = 'idpedid';
      } 
      nm_limpa_numero($this->idpedid, $this->field_config['idpedid']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->idpedid != '')  
          { 
              $iTestSize = 20;
              if (strlen($this->idpedid) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Idpedid: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['idpedid']))
                  {
                      $Campos_Erros['idpedid'] = array();
                  }
                  $Campos_Erros['idpedid'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['idpedid']) || !is_array($this->NM_ajax_info['errList']['idpedid']))
                  {
                      $this->NM_ajax_info['errList']['idpedid'] = array();
                  }
                  $this->NM_ajax_info['errList']['idpedid'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->idpedid, 20, 0, -0, 1.0E+20, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Idpedid; " ; 
                  if (!isset($Campos_Erros['idpedid']))
                  {
                      $Campos_Erros['idpedid'] = array();
                  }
                  $Campos_Erros['idpedid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['idpedid']) || !is_array($this->NM_ajax_info['errList']['idpedid']))
                  {
                      $this->NM_ajax_info['errList']['idpedid'] = array();
                  }
                  $this->NM_ajax_info['errList']['idpedid'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idpedid';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idpedid

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
    $this->nmgp_dados_form['idpro'] = $this->idpro;
    $this->nmgp_dados_form['descrip'] = $this->descrip;
    $this->nmgp_dados_form['idbod'] = $this->idbod;
    $this->nmgp_dados_form['unidad'] = $this->unidad;
    $this->nmgp_dados_form['cantidad'] = $this->cantidad;
    $this->nmgp_dados_form['valorunit'] = $this->valorunit;
    $this->nmgp_dados_form['adicional'] = $this->adicional;
    $this->nmgp_dados_form['descuento'] = $this->descuento;
    $this->nmgp_dados_form['valorpar'] = $this->valorpar;
    $this->nmgp_dados_form['unidadmayor'] = $this->unidadmayor;
    $this->nmgp_dados_form['stockubica'] = $this->stockubica;
    $this->nmgp_dados_form['obs'] = $this->obs;
    $this->nmgp_dados_form['iddet'] = $this->iddet;
    $this->nmgp_dados_form['colores'] = $this->colores;
    $this->nmgp_dados_form['tallas'] = $this->tallas;
    $this->nmgp_dados_form['sabor'] = $this->sabor;
    $this->nmgp_dados_form['adicional1'] = $this->adicional1;
    $this->nmgp_dados_form['factor'] = $this->factor;
    $this->nmgp_dados_form['iva'] = $this->iva;
    $this->nmgp_dados_form['costop'] = $this->costop;
    $this->nmgp_dados_form['autorizarborrado'] = $this->autorizarborrado;
    $this->nmgp_dados_form['estado_comanda'] = $this->estado_comanda;
    $this->nmgp_dados_form['idpedid'] = $this->idpedid;
    $this->nmgp_dados_form['numfac'] = $this->numfac;
    $this->nmgp_dados_form['remision'] = $this->remision;
    $this->nmgp_dados_form['devuelto'] = $this->devuelto;
    $this->nmgp_dados_form['usuario_comanda'] = $this->usuario_comanda;
    $this->nmgp_dados_form['tercero_comanda'] = $this->tercero_comanda;
    $this->nmgp_dados_form['hora_inicio'] = $this->hora_inicio;
    $this->nmgp_dados_form['hora_final'] = $this->hora_final;
    $this->nmgp_dados_form['observ'] = $this->observ;
    $this->nmgp_dados_form['cerrado'] = $this->cerrado;
    $this->nmgp_dados_form['descr'] = $this->descr;
    $this->nmgp_dados_form['codbarra'] = $this->codbarra;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['cantidad'] = $this->cantidad;
      if (!empty($this->field_config['cantidad']['symbol_dec']))
      {
         nm_limpa_valor($this->cantidad, $this->field_config['cantidad']['symbol_dec'], $this->field_config['cantidad']['symbol_grp']);
      }
      $this->Before_unformat['valorunit'] = $this->valorunit;
      if (!empty($this->field_config['valorunit']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valorunit, $this->field_config['valorunit']['symbol_dec'], $this->field_config['valorunit']['symbol_grp'], $this->field_config['valorunit']['symbol_mon']);
         nm_limpa_valor($this->valorunit, $this->field_config['valorunit']['symbol_dec'], $this->field_config['valorunit']['symbol_grp']);
      }
      $this->Before_unformat['adicional'] = $this->adicional;
      if (!empty($this->field_config['adicional']['symbol_dec']))
      {
         $this->sc_remove_currency($this->adicional, $this->field_config['adicional']['symbol_dec'], $this->field_config['adicional']['symbol_grp'], $this->field_config['adicional']['symbol_mon']);
         nm_limpa_valor($this->adicional, $this->field_config['adicional']['symbol_dec'], $this->field_config['adicional']['symbol_grp']);
      }
      $this->Before_unformat['descuento'] = $this->descuento;
      if (!empty($this->field_config['descuento']['symbol_dec']))
      {
         nm_limpa_valor($this->descuento, $this->field_config['descuento']['symbol_dec'], $this->field_config['descuento']['symbol_grp']);
      }
      $this->Before_unformat['valorpar'] = $this->valorpar;
      if (!empty($this->field_config['valorpar']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valorpar, $this->field_config['valorpar']['symbol_dec'], $this->field_config['valorpar']['symbol_grp'], $this->field_config['valorpar']['symbol_mon']);
         nm_limpa_valor($this->valorpar, $this->field_config['valorpar']['symbol_dec'], $this->field_config['valorpar']['symbol_grp']);
      }
      $this->Before_unformat['stockubica'] = $this->stockubica;
      if (!empty($this->field_config['stockubica']['symbol_dec']))
      {
         nm_limpa_valor($this->stockubica, $this->field_config['stockubica']['symbol_dec'], $this->field_config['stockubica']['symbol_grp']);
      }
      $this->Before_unformat['iddet'] = $this->iddet;
      nm_limpa_numero($this->iddet, $this->field_config['iddet']['symbol_grp']) ; 
      $this->Before_unformat['adicional1'] = $this->adicional1;
      nm_limpa_numero($this->adicional1, $this->field_config['adicional1']['symbol_grp']) ; 
      $this->Before_unformat['factor'] = $this->factor;
      if (!empty($this->field_config['factor']['symbol_dec']))
      {
         $this->sc_remove_currency($this->factor, $this->field_config['factor']['symbol_dec'], $this->field_config['factor']['symbol_grp'], $this->field_config['factor']['symbol_mon']);
         nm_limpa_valor($this->factor, $this->field_config['factor']['symbol_dec'], $this->field_config['factor']['symbol_grp']);
      }
      $this->Before_unformat['iva'] = $this->iva;
      if (!empty($this->field_config['iva']['symbol_dec']))
      {
         $this->sc_remove_currency($this->iva, $this->field_config['iva']['symbol_dec'], $this->field_config['iva']['symbol_grp'], $this->field_config['iva']['symbol_mon']);
         nm_limpa_valor($this->iva, $this->field_config['iva']['symbol_dec'], $this->field_config['iva']['symbol_grp']);
      }
      $this->Before_unformat['costop'] = $this->costop;
      if (!empty($this->field_config['costop']['symbol_dec']))
      {
         nm_limpa_valor($this->costop, $this->field_config['costop']['symbol_dec'], $this->field_config['costop']['symbol_grp']);
      }
      $this->Before_unformat['idpedid'] = $this->idpedid;
      nm_limpa_numero($this->idpedid, $this->field_config['idpedid']['symbol_grp']) ; 
      $this->Before_unformat['numfac'] = $this->numfac;
      nm_limpa_numero($this->numfac, $this->field_config['numfac']['symbol_grp']) ; 
      $this->Before_unformat['remision'] = $this->remision;
      nm_limpa_numero($this->remision, $this->field_config['remision']['symbol_grp']) ; 
      $this->Before_unformat['devuelto'] = $this->devuelto;
      nm_limpa_numero($this->devuelto, $this->field_config['devuelto']['symbol_grp']) ; 
      $this->Before_unformat['tercero_comanda'] = $this->tercero_comanda;
      nm_limpa_numero($this->tercero_comanda, $this->field_config['tercero_comanda']['symbol_grp']) ; 
      $this->Before_unformat['hora_inicio'] = $this->hora_inicio;
      $this->Before_unformat['hora_inicio_hora'] = $this->hora_inicio_hora;
      nm_limpa_data($this->hora_inicio, $this->field_config['hora_inicio']['date_sep']) ; 
      nm_limpa_hora($this->hora_inicio_hora, $this->field_config['hora_inicio']['time_sep']) ; 
      $this->Before_unformat['hora_final'] = $this->hora_final;
      $this->Before_unformat['hora_final_hora'] = $this->hora_final_hora;
      nm_limpa_data($this->hora_final, $this->field_config['hora_final']['date_sep']) ; 
      nm_limpa_hora($this->hora_final_hora, $this->field_config['hora_final']['time_sep']) ; 
      $this->Before_unformat['codbarra'] = $this->codbarra;
      nm_limpa_numero($this->codbarra, $this->field_config['codbarra']['symbol_grp']) ; 
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
      if ($Nome_Campo == "cantidad")
      {
          if (!empty($this->field_config['cantidad']['symbol_dec']))
          {
             nm_limpa_valor($this->cantidad, $this->field_config['cantidad']['symbol_dec'], $this->field_config['cantidad']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "valorunit")
      {
          if (!empty($this->field_config['valorunit']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valorunit, $this->field_config['valorunit']['symbol_dec'], $this->field_config['valorunit']['symbol_grp'], $this->field_config['valorunit']['symbol_mon']);
             nm_limpa_valor($this->valorunit, $this->field_config['valorunit']['symbol_dec'], $this->field_config['valorunit']['symbol_grp']);
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
      if ($Nome_Campo == "descuento")
      {
          if (!empty($this->field_config['descuento']['symbol_dec']))
          {
             nm_limpa_valor($this->descuento, $this->field_config['descuento']['symbol_dec'], $this->field_config['descuento']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "valorpar")
      {
          if (!empty($this->field_config['valorpar']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valorpar, $this->field_config['valorpar']['symbol_dec'], $this->field_config['valorpar']['symbol_grp'], $this->field_config['valorpar']['symbol_mon']);
             nm_limpa_valor($this->valorpar, $this->field_config['valorpar']['symbol_dec'], $this->field_config['valorpar']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "stockubica")
      {
          if (!empty($this->field_config['stockubica']['symbol_dec']))
          {
             nm_limpa_valor($this->stockubica, $this->field_config['stockubica']['symbol_dec'], $this->field_config['stockubica']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "iddet")
      {
          nm_limpa_numero($this->iddet, $this->field_config['iddet']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "adicional1")
      {
          nm_limpa_numero($this->adicional1, $this->field_config['adicional1']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "factor")
      {
          if (!empty($this->field_config['factor']['symbol_dec']))
          {
             $this->sc_remove_currency($this->factor, $this->field_config['factor']['symbol_dec'], $this->field_config['factor']['symbol_grp'], $this->field_config['factor']['symbol_mon']);
             nm_limpa_valor($this->factor, $this->field_config['factor']['symbol_dec'], $this->field_config['factor']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "iva")
      {
          if (!empty($this->field_config['iva']['symbol_dec']))
          {
             $this->sc_remove_currency($this->iva, $this->field_config['iva']['symbol_dec'], $this->field_config['iva']['symbol_grp'], $this->field_config['iva']['symbol_mon']);
             nm_limpa_valor($this->iva, $this->field_config['iva']['symbol_dec'], $this->field_config['iva']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "costop")
      {
          if (!empty($this->field_config['costop']['symbol_dec']))
          {
             nm_limpa_valor($this->costop, $this->field_config['costop']['symbol_dec'], $this->field_config['costop']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "idpedid")
      {
          nm_limpa_numero($this->idpedid, $this->field_config['idpedid']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "numfac")
      {
          nm_limpa_numero($this->numfac, $this->field_config['numfac']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "remision")
      {
          nm_limpa_numero($this->remision, $this->field_config['remision']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "devuelto")
      {
          nm_limpa_numero($this->devuelto, $this->field_config['devuelto']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tercero_comanda")
      {
          nm_limpa_numero($this->tercero_comanda, $this->field_config['tercero_comanda']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "codbarra")
      {
          nm_limpa_numero($this->codbarra, $this->field_config['codbarra']['symbol_grp']) ; 
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
      if ('' !== $this->cantidad || (!empty($format_fields) && isset($format_fields['cantidad'])))
      {
          nmgp_Form_Num_Val($this->cantidad, $this->field_config['cantidad']['symbol_grp'], $this->field_config['cantidad']['symbol_dec'], "2", "S", $this->field_config['cantidad']['format_neg'], "", "", "-", $this->field_config['cantidad']['symbol_fmt']) ; 
      }
      if ('' !== $this->valorunit || (!empty($format_fields) && isset($format_fields['valorunit'])))
      {
          nmgp_Form_Num_Val($this->valorunit, $this->field_config['valorunit']['symbol_grp'], $this->field_config['valorunit']['symbol_dec'], "0", "S", $this->field_config['valorunit']['format_neg'], "", "", "-", $this->field_config['valorunit']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['valorunit']['symbol_mon'];
          $this->sc_add_currency($this->valorunit, $sMonSymb, $this->field_config['valorunit']['format_pos']); 
      }
      if ('' !== $this->adicional || (!empty($format_fields) && isset($format_fields['adicional'])))
      {
          nmgp_Form_Num_Val($this->adicional, $this->field_config['adicional']['symbol_grp'], $this->field_config['adicional']['symbol_dec'], "0", "S", $this->field_config['adicional']['format_neg'], "", "", "-", $this->field_config['adicional']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['adicional']['symbol_mon'];
          $this->sc_add_currency($this->adicional, $sMonSymb, $this->field_config['adicional']['format_pos']); 
      }
      if ('' !== $this->descuento || (!empty($format_fields) && isset($format_fields['descuento'])))
      {
          nmgp_Form_Num_Val($this->descuento, $this->field_config['descuento']['symbol_grp'], $this->field_config['descuento']['symbol_dec'], "0", "S", $this->field_config['descuento']['format_neg'], "", "", "-", $this->field_config['descuento']['symbol_fmt']) ; 
      }
      if ('' !== $this->valorpar || (!empty($format_fields) && isset($format_fields['valorpar'])))
      {
          nmgp_Form_Num_Val($this->valorpar, $this->field_config['valorpar']['symbol_grp'], $this->field_config['valorpar']['symbol_dec'], "0", "S", $this->field_config['valorpar']['format_neg'], "", "", "-", $this->field_config['valorpar']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['valorpar']['symbol_mon'];
          $this->sc_add_currency($this->valorpar, $sMonSymb, $this->field_config['valorpar']['format_pos']); 
      }
      if ('' !== $this->stockubica || (!empty($format_fields) && isset($format_fields['stockubica'])))
      {
          nmgp_Form_Num_Val($this->stockubica, $this->field_config['stockubica']['symbol_grp'], $this->field_config['stockubica']['symbol_dec'], "2", "S", $this->field_config['stockubica']['format_neg'], "", "", "-", $this->field_config['stockubica']['symbol_fmt']) ; 
      }
      if ('' !== $this->iddet || (!empty($format_fields) && isset($format_fields['iddet'])))
      {
          nmgp_Form_Num_Val($this->iddet, $this->field_config['iddet']['symbol_grp'], $this->field_config['iddet']['symbol_dec'], "0", "S", $this->field_config['iddet']['format_neg'], "", "", "-", $this->field_config['iddet']['symbol_fmt']) ; 
      }
      if ('' !== $this->adicional1 || (!empty($format_fields) && isset($format_fields['adicional1'])))
      {
          nmgp_Form_Num_Val($this->adicional1, $this->field_config['adicional1']['symbol_grp'], $this->field_config['adicional1']['symbol_dec'], "0", "S", $this->field_config['adicional1']['format_neg'], "", "", "-", $this->field_config['adicional1']['symbol_fmt']) ; 
      }
      if ('' !== $this->factor || (!empty($format_fields) && isset($format_fields['factor'])))
      {
          nmgp_Form_Num_Val($this->factor, $this->field_config['factor']['symbol_grp'], $this->field_config['factor']['symbol_dec'], "2", "S", $this->field_config['factor']['format_neg'], "", "", "-", $this->field_config['factor']['symbol_fmt']) ; 
      }
      if ('' !== $this->iva || (!empty($format_fields) && isset($format_fields['iva'])))
      {
          nmgp_Form_Num_Val($this->iva, $this->field_config['iva']['symbol_grp'], $this->field_config['iva']['symbol_dec'], "2", "S", $this->field_config['iva']['format_neg'], "", "", "-", $this->field_config['iva']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['iva']['symbol_mon'];
          $this->sc_add_currency($this->iva, $sMonSymb, $this->field_config['iva']['format_pos']); 
      }
      if ('' !== $this->costop || (!empty($format_fields) && isset($format_fields['costop'])))
      {
          nmgp_Form_Num_Val($this->costop, $this->field_config['costop']['symbol_grp'], $this->field_config['costop']['symbol_dec'], "0", "S", $this->field_config['costop']['format_neg'], "", "", "-", $this->field_config['costop']['symbol_fmt']) ; 
      }
      if ('' !== $this->idpedid || (!empty($format_fields) && isset($format_fields['idpedid'])))
      {
          nmgp_Form_Num_Val($this->idpedid, $this->field_config['idpedid']['symbol_grp'], $this->field_config['idpedid']['symbol_dec'], "0", "S", $this->field_config['idpedid']['format_neg'], "", "", "-", $this->field_config['idpedid']['symbol_fmt']) ; 
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
          $this->ajax_return_values_idpro();
          $this->ajax_return_values_descrip();
          $this->ajax_return_values_idbod();
          $this->ajax_return_values_unidad();
          $this->ajax_return_values_cantidad();
          $this->ajax_return_values_valorunit();
          $this->ajax_return_values_adicional();
          $this->ajax_return_values_descuento();
          $this->ajax_return_values_valorpar();
          $this->ajax_return_values_unidadmayor();
          $this->ajax_return_values_stockubica();
          $this->ajax_return_values_obs();
          $this->ajax_return_values_iddet();
          $this->ajax_return_values_colores();
          $this->ajax_return_values_tallas();
          $this->ajax_return_values_sabor();
          $this->ajax_return_values_adicional1();
          $this->ajax_return_values_factor();
          $this->ajax_return_values_iva();
          $this->ajax_return_values_costop();
          $this->ajax_return_values_autorizarborrado();
          $this->ajax_return_values_estado_comanda();
          $this->ajax_return_values_idpedid();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['iddet']['keyVal'] = form_detallepedido_220621_mob_pack_protect_string($this->nmgp_dados_form['iddet']);
          }
   } // ajax_return_values

          //----- idpro
   function ajax_return_values_idpro($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idpro", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idpro);
              $aLookup = array();
              $this->_tmp_lookup_idpro = $this->idpro;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idpro']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idpro'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idpro']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idpro'] = array(); 
    }

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_adicional = $this->adicional;
   $old_value_descuento = $this->descuento;
   $old_value_valorpar = $this->valorpar;
   $old_value_stockubica = $this->stockubica;
   $old_value_iddet = $this->iddet;
   $old_value_adicional1 = $this->adicional1;
   $old_value_factor = $this->factor;
   $old_value_iva = $this->iva;
   $old_value_costop = $this->costop;
   $old_value_idpedid = $this->idpedid;
   $this->nm_tira_formatacao();


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_stockubica = $this->stockubica;
   $unformatted_value_iddet = $this->iddet;
   $unformatted_value_adicional1 = $this->adicional1;
   $unformatted_value_factor = $this->factor;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_costop = $this->costop;
   $unformatted_value_idpedid = $this->idpedid;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idprod, concat(codigobar, \" - \",nompro) FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idprod, codigobar&\" - \"&nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idprod, codigobar + \" - \" + nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }
   else
   {
       $nm_comando = "SELECT idprod, codigobar||\" - \"||nompro FROM productos WHERE idprod = " . substr($this->Db->qstr($this->idpro), 1, -1) . " ORDER BY codigobar, nompro";
   }

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->adicional = $old_value_adicional;
   $this->descuento = $old_value_descuento;
   $this->valorpar = $old_value_valorpar;
   $this->stockubica = $old_value_stockubica;
   $this->iddet = $old_value_iddet;
   $this->adicional1 = $old_value_adicional1;
   $this->factor = $old_value_factor;
   $this->iva = $old_value_iva;
   $this->costop = $old_value_costop;
   $this->idpedid = $old_value_idpedid;

   if ('' != $this->idpro && '' != $this->idpro && '' != $this->idpro && '' != $this->idpro && '' != $this->idpro && '' != $this->idpro && '' != $this->idpro)
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
              $aLookup[] = array(form_detallepedido_220621_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_detallepedido_220621_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idpro'][] = $rs->fields[0];
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
          $this->NM_ajax_info['fldList']['idpro'] = array(
                       'row'    => '',
               'type'    => 'select2_ac',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idpro']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idpro']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idpro']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][form_detallepedido_220621_mob_pack_protect_string(NM_charset_to_utf8($this->idpro))]) ? $aLookup[0][form_detallepedido_220621_mob_pack_protect_string(NM_charset_to_utf8($this->idpro))] : "";
          $this->NM_ajax_info['fldList']['idpro_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

          //----- descrip
   function ajax_return_values_descrip($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("descrip", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->descrip);
              $aLookup = array();
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__icons8-factura-32.png"))
          { 
              $descrip = "&nbsp;" ;  
          } 
          elseif ($this->Ini->Gd_missing) 
          { 
              $descrip = "<span class=\"scFormErrorMessage\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>"; 
          } 
          else 
          { 
              $in_descrip = $this->Ini->root  . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__icons8-factura-32.png"; 
              $img_time = filemtime($this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__ico__NM__icons8-factura-32.png"); 
              $out_descrip = str_replace("/", "_", $this->Ini->path_imag_cab); 
              $out_descrip = $this->Ini->path_imag_temp . "/sc_" . $out_descrip . "_descrip_3030_" . $img_time . "_grp__NM__ico__NM__icons8-factura-32.png";
              if (!is_file($this->Ini->root . $out_descrip)) 
              {  
                  $sc_obj_img = new nm_trata_img($in_descrip, true);
                  $sc_obj_img->setWidth(30);
                  $sc_obj_img->setHeight(30);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_descrip);
              } 
              $descrip = "<img border=\"0\" src=\"" . $out_descrip . "\"/>" ; 
          } 
    $sTmpImgHtml = "<a href=\"javascript:nm_gp_submit('" . $this->Ini->link_form_detallepedido_obs_edit . "', '$this->nm_location', 'iddet*scin" . $this->nmgp_dados_form['iddet'] . "*scoutpar_numero*scin" . $this->nmgp_dados_form['idpedid'] . "*scoutid_detalle*scin" . $this->nmgp_dados_form['iddet'] . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout', '', '_self', '0', '0', 'form_detallepedido_obs')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $descrip . "</font></a>";
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['descrip'] = array(
                       'row'    => '',
               'type'    => 'imagehtml',
               'valList' => array($sTmpValue),
               'imgHtml' => $sTmpImgHtml,
              );
          }
   }

          //----- idbod
   function ajax_return_values_idbod($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idbod", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idbod);
              $aLookup = array();
              $this->_tmp_lookup_idbod = $this->idbod;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_adicional = $this->adicional;
   $old_value_descuento = $this->descuento;
   $old_value_valorpar = $this->valorpar;
   $old_value_stockubica = $this->stockubica;
   $old_value_iddet = $this->iddet;
   $old_value_adicional1 = $this->adicional1;
   $old_value_factor = $this->factor;
   $old_value_iva = $this->iva;
   $old_value_costop = $this->costop;
   $old_value_idpedid = $this->idpedid;
   $this->nm_tira_formatacao();


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_stockubica = $this->stockubica;
   $unformatted_value_iddet = $this->iddet;
   $unformatted_value_adicional1 = $this->adicional1;
   $unformatted_value_factor = $this->factor;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_costop = $this->costop;
   $unformatted_value_idpedid = $this->idpedid;

   $nm_comando = "SELECT idbodega, bodega  FROM bodegas  ORDER BY bodega";

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->adicional = $old_value_adicional;
   $this->descuento = $old_value_descuento;
   $this->valorpar = $old_value_valorpar;
   $this->stockubica = $old_value_stockubica;
   $this->iddet = $old_value_iddet;
   $this->adicional1 = $old_value_adicional1;
   $this->factor = $old_value_factor;
   $this->iva = $old_value_iva;
   $this->costop = $old_value_costop;
   $this->idpedid = $old_value_idpedid;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_detallepedido_220621_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_detallepedido_220621_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod'][] = $rs->fields[0];
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
          $sSelComp = "name=\"idbod\"";
          if (isset($this->NM_ajax_info['select_html']['idbod']) && !empty($this->NM_ajax_info['select_html']['idbod']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['idbod']);
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

                  if ($this->idbod == $sValue)
                  {
                      $this->_tmp_lookup_idbod = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['idbod'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idbod']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idbod']['valList'][$i] = form_detallepedido_220621_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idbod']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idbod']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idbod']['labList'] = $aLabel;
          }
   }

          //----- unidad
   function ajax_return_values_unidad($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("unidad", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->unidad);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['unidad'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cantidad
   function ajax_return_values_cantidad($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cantidad", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cantidad);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cantidad'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- valorunit
   function ajax_return_values_valorunit($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valorunit", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valorunit);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valorunit'] = array(
                       'row'    => '',
               'type'    => 'text',
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

          //----- descuento
   function ajax_return_values_descuento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("descuento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->descuento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['descuento'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- valorpar
   function ajax_return_values_valorpar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valorpar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valorpar);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valorpar'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- unidadmayor
   function ajax_return_values_unidadmayor($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("unidadmayor", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->unidadmayor);
              $aLookup = array();
              $this->_tmp_lookup_unidadmayor = $this->unidadmayor;

$aLookup[] = array(form_detallepedido_220621_mob_pack_protect_string('NO') => str_replace('<', '&lt;',form_detallepedido_220621_mob_pack_protect_string("NO")));
$aLookup[] = array(form_detallepedido_220621_mob_pack_protect_string('SI') => str_replace('<', '&lt;',form_detallepedido_220621_mob_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_unidadmayor'][] = 'NO';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_unidadmayor'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"unidadmayor\"";
          if (isset($this->NM_ajax_info['select_html']['unidadmayor']) && !empty($this->NM_ajax_info['select_html']['unidadmayor']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['unidadmayor']);
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

                  if ($this->unidadmayor == $sValue)
                  {
                      $this->_tmp_lookup_unidadmayor = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['unidadmayor'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['unidadmayor']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['unidadmayor']['valList'][$i] = form_detallepedido_220621_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['unidadmayor']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['unidadmayor']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['unidadmayor']['labList'] = $aLabel;
          }
   }

          //----- stockubica
   function ajax_return_values_stockubica($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("stockubica", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->stockubica);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['stockubica'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- obs
   function ajax_return_values_obs($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("obs", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->obs);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['obs'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- iddet
   function ajax_return_values_iddet($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("iddet", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->iddet);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['iddet'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("iddet", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- colores
   function ajax_return_values_colores($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("colores", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->colores);
              $aLookup = array();
              $this->_tmp_lookup_colores = $this->colores;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores'] = array(); 
}
$aLookup[] = array(form_detallepedido_220621_mob_pack_protect_string('0') => str_replace('<', '&lt;',form_detallepedido_220621_mob_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores'][] = '0';
if ($this->idpro != "")
{ 
   $this->nm_clear_val("idpro");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_adicional = $this->adicional;
   $old_value_descuento = $this->descuento;
   $old_value_valorpar = $this->valorpar;
   $old_value_stockubica = $this->stockubica;
   $old_value_iddet = $this->iddet;
   $old_value_adicional1 = $this->adicional1;
   $old_value_factor = $this->factor;
   $old_value_iva = $this->iva;
   $old_value_costop = $this->costop;
   $old_value_idpedid = $this->idpedid;
   $this->nm_tira_formatacao();


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_stockubica = $this->stockubica;
   $unformatted_value_iddet = $this->iddet;
   $unformatted_value_adicional1 = $this->adicional1;
   $unformatted_value_factor = $this->factor;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_costop = $this->costop;
   $unformatted_value_idpedid = $this->idpedid;

   $nm_comando = "SELECT f.idcol, c.color  FROM colorxproducto f left join colores c on f.idcol=c.idcolores where idpr=$this->idpro ORDER BY f.idcol";

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->adicional = $old_value_adicional;
   $this->descuento = $old_value_descuento;
   $this->valorpar = $old_value_valorpar;
   $this->stockubica = $old_value_stockubica;
   $this->iddet = $old_value_iddet;
   $this->adicional1 = $old_value_adicional1;
   $this->factor = $old_value_factor;
   $this->iva = $old_value_iva;
   $this->costop = $old_value_costop;
   $this->idpedid = $old_value_idpedid;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_detallepedido_220621_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_detallepedido_220621_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores'][] = $rs->fields[0];
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
          $sSelComp = "name=\"colores\"";
          if (isset($this->NM_ajax_info['select_html']['colores']) && !empty($this->NM_ajax_info['select_html']['colores']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['colores']);
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

                  if ($this->colores == $sValue)
                  {
                      $this->_tmp_lookup_colores = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['colores'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['colores']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['colores']['valList'][$i] = form_detallepedido_220621_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['colores']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['colores']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['colores']['labList'] = $aLabel;
          }
   }

          //----- tallas
   function ajax_return_values_tallas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tallas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tallas);
              $aLookup = array();
              $this->_tmp_lookup_tallas = $this->tallas;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas'] = array(); 
}
$aLookup[] = array(form_detallepedido_220621_mob_pack_protect_string('0') => str_replace('<', '&lt;',form_detallepedido_220621_mob_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas'][] = '0';
if ($this->idpro != "")
{ 
   $this->nm_clear_val("idpro");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_adicional = $this->adicional;
   $old_value_descuento = $this->descuento;
   $old_value_valorpar = $this->valorpar;
   $old_value_stockubica = $this->stockubica;
   $old_value_iddet = $this->iddet;
   $old_value_adicional1 = $this->adicional1;
   $old_value_factor = $this->factor;
   $old_value_iva = $this->iva;
   $old_value_costop = $this->costop;
   $old_value_idpedid = $this->idpedid;
   $this->nm_tira_formatacao();


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_stockubica = $this->stockubica;
   $unformatted_value_iddet = $this->iddet;
   $unformatted_value_adicional1 = $this->adicional1;
   $unformatted_value_factor = $this->factor;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_costop = $this->costop;
   $unformatted_value_idpedid = $this->idpedid;

   $nm_comando = "SELECT f.idta, t.tamaño FROM tallaxproducto f left join tallas t on f.idta=t.idtallas where idpr=$this->idpro ORDER BY f.idta";

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->adicional = $old_value_adicional;
   $this->descuento = $old_value_descuento;
   $this->valorpar = $old_value_valorpar;
   $this->stockubica = $old_value_stockubica;
   $this->iddet = $old_value_iddet;
   $this->adicional1 = $old_value_adicional1;
   $this->factor = $old_value_factor;
   $this->iva = $old_value_iva;
   $this->costop = $old_value_costop;
   $this->idpedid = $old_value_idpedid;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_detallepedido_220621_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_detallepedido_220621_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas'][] = $rs->fields[0];
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
          $sSelComp = "name=\"tallas\"";
          if (isset($this->NM_ajax_info['select_html']['tallas']) && !empty($this->NM_ajax_info['select_html']['tallas']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['tallas']);
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

                  if ($this->tallas == $sValue)
                  {
                      $this->_tmp_lookup_tallas = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tallas'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tallas']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tallas']['valList'][$i] = form_detallepedido_220621_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tallas']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tallas']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tallas']['labList'] = $aLabel;
          }
   }

          //----- sabor
   function ajax_return_values_sabor($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sabor", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sabor);
              $aLookup = array();
              $this->_tmp_lookup_sabor = $this->sabor;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor'] = array(); 
}
$aLookup[] = array(form_detallepedido_220621_mob_pack_protect_string('0') => str_replace('<', '&lt;',form_detallepedido_220621_mob_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor'][] = '0';
if ($this->idpro != "")
{ 
   $this->nm_clear_val("idpro");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_adicional = $this->adicional;
   $old_value_descuento = $this->descuento;
   $old_value_valorpar = $this->valorpar;
   $old_value_stockubica = $this->stockubica;
   $old_value_iddet = $this->iddet;
   $old_value_adicional1 = $this->adicional1;
   $old_value_factor = $this->factor;
   $old_value_iva = $this->iva;
   $old_value_costop = $this->costop;
   $old_value_idpedid = $this->idpedid;
   $this->nm_tira_formatacao();


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_stockubica = $this->stockubica;
   $unformatted_value_iddet = $this->iddet;
   $unformatted_value_adicional1 = $this->adicional1;
   $unformatted_value_factor = $this->factor;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_costop = $this->costop;
   $unformatted_value_idpedid = $this->idpedid;

   $nm_comando = "SELECT f.idsa, t.tamaño FROM saborxproducto f left join tallas t on f.idsa=t.idtallas where idpr=$this->idpro and tallasabor='S' ORDER BY f.idsa";

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->adicional = $old_value_adicional;
   $this->descuento = $old_value_descuento;
   $this->valorpar = $old_value_valorpar;
   $this->stockubica = $old_value_stockubica;
   $this->iddet = $old_value_iddet;
   $this->adicional1 = $old_value_adicional1;
   $this->factor = $old_value_factor;
   $this->iva = $old_value_iva;
   $this->costop = $old_value_costop;
   $this->idpedid = $old_value_idpedid;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_detallepedido_220621_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_detallepedido_220621_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor'][] = $rs->fields[0];
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
          $sSelComp = "name=\"sabor\"";
          if (isset($this->NM_ajax_info['select_html']['sabor']) && !empty($this->NM_ajax_info['select_html']['sabor']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['sabor']);
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

                  if ($this->sabor == $sValue)
                  {
                      $this->_tmp_lookup_sabor = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['sabor'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['sabor']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['sabor']['valList'][$i] = form_detallepedido_220621_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['sabor']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['sabor']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['sabor']['labList'] = $aLabel;
          }
   }

          //----- adicional1
   function ajax_return_values_adicional1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("adicional1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->adicional1);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['adicional1'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- factor
   function ajax_return_values_factor($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("factor", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->factor);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['factor'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- iva
   function ajax_return_values_iva($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("iva", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->iva);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['iva'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- costop
   function ajax_return_values_costop($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("costop", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->costop);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['costop'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- autorizarborrado
   function ajax_return_values_autorizarborrado($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("autorizarborrado", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->autorizarborrado);
              $aLookup = array();
              $this->_tmp_lookup_autorizarborrado = $this->autorizarborrado;

$aLookup[] = array(form_detallepedido_220621_mob_pack_protect_string('s') => str_replace('<', '&lt;',form_detallepedido_220621_mob_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_autorizarborrado'][] = 's';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['autorizarborrado']) && !empty($this->NM_ajax_info['select_html']['autorizarborrado']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['autorizarborrado']);
          }
          $this->NM_ajax_info['fldList']['autorizarborrado'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['autorizarborrado']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['autorizarborrado']['valList'][$i] = form_detallepedido_220621_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['autorizarborrado']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['autorizarborrado']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['autorizarborrado']['labList'] = $aLabel;
          }
   }

          //----- estado_comanda
   function ajax_return_values_estado_comanda($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("estado_comanda", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->estado_comanda);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['estado_comanda'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- idpedid
   function ajax_return_values_idpedid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idpedid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idpedid);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idpedid'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['upload_dir'][$fieldName][] = $newName;
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
      if ($this->sc_evento == "novo" || $this->sc_evento == "incluir" || ($this->nmgp_opcao == "nada" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['opc_ant']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['opc_ant'] == "novo") || (isset($GLOBALS['erro_incl']) && 1 == $GLOBALS['erro_incl']))
      {
          if (!isset($this->nmgp_cmp_hidden["autorizarborrado"]))
          {
              $this->nmgp_cmp_hidden["autorizarborrado"] = "off"; $this->NM_ajax_info['fieldDisplay']['autorizarborrado'] = 'off';
          }
      }
      else
      {
      }
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_factor = $this->factor;
    $original_idbod = $this->idbod;
    $original_idpro = $this->idpro;
    $original_stockubica = $this->stockubica;
    $original_unidad = $this->unidad;
    $original_unidadmayor = $this->unidadmayor;
}
  $this->ver_stock();
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_factor != $this->factor || (isset($bFlagRead_factor) && $bFlagRead_factor)))
    {
        $this->ajax_return_values_factor(true);
    }
    if (($original_idbod != $this->idbod || (isset($bFlagRead_idbod) && $bFlagRead_idbod)))
    {
        $this->ajax_return_values_idbod(true);
    }
    if (($original_idpro != $this->idpro || (isset($bFlagRead_idpro) && $bFlagRead_idpro)))
    {
        $this->ajax_return_values_idpro(true);
    }
    if (($original_stockubica != $this->stockubica || (isset($bFlagRead_stockubica) && $bFlagRead_stockubica)))
    {
        $this->ajax_return_values_stockubica(true);
    }
    if (($original_unidad != $this->unidad || (isset($bFlagRead_unidad) && $bFlagRead_unidad)))
    {
        $this->ajax_return_values_unidad(true);
    }
    if (($original_unidadmayor != $this->unidadmayor || (isset($bFlagRead_unidadmayor) && $bFlagRead_unidadmayor)))
    {
        $this->ajax_return_values_unidadmayor(true);
    }
}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off'; 
      }
      if (empty($this->hora_inicio))
      {
          $this->hora_inicio_hora = $this->hora_inicio;
      }
      if (empty($this->hora_final))
      {
          $this->hora_final_hora = $this->hora_final;
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
      $this->cantidad = str_replace($sc_parm1, $sc_parm2, $this->cantidad); 
      $this->valorunit = str_replace($sc_parm1, $sc_parm2, $this->valorunit); 
      $this->adicional = str_replace($sc_parm1, $sc_parm2, $this->adicional); 
      $this->descuento = str_replace($sc_parm1, $sc_parm2, $this->descuento); 
      $this->valorpar = str_replace($sc_parm1, $sc_parm2, $this->valorpar); 
      $this->stockubica = str_replace($sc_parm1, $sc_parm2, $this->stockubica); 
      $this->factor = str_replace($sc_parm1, $sc_parm2, $this->factor); 
      $this->iva = str_replace($sc_parm1, $sc_parm2, $this->iva); 
      $this->costop = str_replace($sc_parm1, $sc_parm2, $this->costop); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->cantidad = "'" . $this->cantidad . "'";
      $this->valorunit = "'" . $this->valorunit . "'";
      $this->adicional = "'" . $this->adicional . "'";
      $this->descuento = "'" . $this->descuento . "'";
      $this->valorpar = "'" . $this->valorpar . "'";
      $this->stockubica = "'" . $this->stockubica . "'";
      $this->factor = "'" . $this->factor . "'";
      $this->iva = "'" . $this->iva . "'";
      $this->costop = "'" . $this->costop . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->cantidad = str_replace("'", "", $this->cantidad); 
      $this->valorunit = str_replace("'", "", $this->valorunit); 
      $this->adicional = str_replace("'", "", $this->adicional); 
      $this->descuento = str_replace("'", "", $this->descuento); 
      $this->valorpar = str_replace("'", "", $this->valorpar); 
      $this->stockubica = str_replace("'", "", $this->stockubica); 
      $this->factor = str_replace("'", "", $this->factor); 
      $this->iva = str_replace("'", "", $this->iva); 
      $this->costop = str_replace("'", "", $this->costop); 
   } 
//----------- 

   function return_after_insert()
   {
      global $sc_where;
      $sc_where_pos = " WHERE ((iddet < $this->iddet))";
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
      if ('' != $this->iddet)
      {
          $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count;
          $rsc = $this->Db->Execute($nmgp_sel_count);
          if ($rsc === false && !$rsc->EOF)
          {
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
              exit;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start'] = $rsc->fields[0];
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
      $_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_adicional = $this->adicional;
    $original_adicional1 = $this->adicional1;
    $original_cantidad = $this->cantidad;
    $original_descuento = $this->descuento;
    $original_idpro = $this->idpro;
    $original_iva = $this->iva;
    $original_valorpar = $this->valorpar;
    $original_valorunit = $this->valorunit;
}
  $this->calcula_parcial();
$this->calcula_descuento();
$this->calcula_iva();
				
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_adicional != $this->adicional || (isset($bFlagRead_adicional) && $bFlagRead_adicional)))
    {
        $this->ajax_return_values_adicional(true);
    }
    if (($original_adicional1 != $this->adicional1 || (isset($bFlagRead_adicional1) && $bFlagRead_adicional1)))
    {
        $this->ajax_return_values_adicional1(true);
    }
    if (($original_cantidad != $this->cantidad || (isset($bFlagRead_cantidad) && $bFlagRead_cantidad)))
    {
        $this->ajax_return_values_cantidad(true);
    }
    if (($original_descuento != $this->descuento || (isset($bFlagRead_descuento) && $bFlagRead_descuento)))
    {
        $this->ajax_return_values_descuento(true);
    }
    if (($original_idpro != $this->idpro || (isset($bFlagRead_idpro) && $bFlagRead_idpro)))
    {
        $this->ajax_return_values_idpro(true);
    }
    if (($original_iva != $this->iva || (isset($bFlagRead_iva) && $bFlagRead_iva)))
    {
        $this->ajax_return_values_iva(true);
    }
    if (($original_valorpar != $this->valorpar || (isset($bFlagRead_valorpar) && $bFlagRead_valorpar)))
    {
        $this->ajax_return_values_valorpar(true);
    }
    if (($original_valorunit != $this->valorunit || (isset($bFlagRead_valorunit) && $bFlagRead_valorunit)))
    {
        $this->ajax_return_values_valorunit(true);
    }
}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off'; 
    }
    if ("alterar" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_adicional = $this->adicional;
    $original_adicional1 = $this->adicional1;
    $original_cantidad = $this->cantidad;
    $original_descuento = $this->descuento;
    $original_idpro = $this->idpro;
    $original_iva = $this->iva;
    $original_valorpar = $this->valorpar;
    $original_valorunit = $this->valorunit;
}
  $this->calcula_parcial();
$this->calcula_descuento();
$this->calcula_iva();
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_adicional != $this->adicional || (isset($bFlagRead_adicional) && $bFlagRead_adicional)))
    {
        $this->ajax_return_values_adicional(true);
    }
    if (($original_adicional1 != $this->adicional1 || (isset($bFlagRead_adicional1) && $bFlagRead_adicional1)))
    {
        $this->ajax_return_values_adicional1(true);
    }
    if (($original_cantidad != $this->cantidad || (isset($bFlagRead_cantidad) && $bFlagRead_cantidad)))
    {
        $this->ajax_return_values_cantidad(true);
    }
    if (($original_descuento != $this->descuento || (isset($bFlagRead_descuento) && $bFlagRead_descuento)))
    {
        $this->ajax_return_values_descuento(true);
    }
    if (($original_idpro != $this->idpro || (isset($bFlagRead_idpro) && $bFlagRead_idpro)))
    {
        $this->ajax_return_values_idpro(true);
    }
    if (($original_iva != $this->iva || (isset($bFlagRead_iva) && $bFlagRead_iva)))
    {
        $this->ajax_return_values_iva(true);
    }
    if (($original_valorpar != $this->valorpar || (isset($bFlagRead_valorpar) && $bFlagRead_valorpar)))
    {
        $this->ajax_return_values_valorpar(true);
    }
    if (($original_valorunit != $this->valorunit || (isset($bFlagRead_valorunit) && $bFlagRead_valorunit)))
    {
        $this->ajax_return_values_valorunit(true);
    }
}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off'; 
    }
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_estado_comanda = $this->estado_comanda;
    $original_iddet = $this->iddet;
    $original_idpedid = $this->idpedid;
    $original_idpro = $this->idpro;
}
if (!isset($this->sc_temp_gModificarInventario)) {$this->sc_temp_gModificarInventario = (isset($_SESSION['gModificarInventario'])) ? $_SESSION['gModificarInventario'] : "";}
if (!isset($this->sc_temp_gIdDeta)) {$this->sc_temp_gIdDeta = (isset($_SESSION['gIdDeta'])) ? $_SESSION['gIdDeta'] : "";}
if (!isset($this->sc_temp_gProducto)) {$this->sc_temp_gProducto = (isset($_SESSION['gProducto'])) ? $_SESSION['gProducto'] : "";}
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
   
      $nm_select = "select estado_comanda,(select p.nompro from productos p where p.idprod=$this->idpro ) from detallepedido where iddet='".$this->iddet ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vdet = array();
     if ($this->idpro != "" && $this->iddet != "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vdet[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vdet = false;
          $this->vdet_erro = $this->Db->ErrorMsg();
      } 
     } 
;

if(isset($this->vdet[0][0]))
{
	$this->estado_comanda  =$this->vdet[0][0];
	$vnompro  = $this->vdet[0][1];

	if($this->estado_comanda ==2)
		{
		$this->sc_temp_gProducto=$this->idpro ;
		$this->sc_temp_gIdDeta=$this->iddet ;
		 if (isset($this->sc_temp_gidtercero)) { $_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
 if (isset($this->sc_temp_gProducto)) { $_SESSION['gProducto'] = $this->sc_temp_gProducto;}
 if (isset($this->sc_temp_gIdDeta)) { $_SESSION['gIdDeta'] = $this->sc_temp_gIdDeta;}
 if (isset($this->sc_temp_gModificarInventario)) { $_SESSION['gModificarInventario'] = $this->sc_temp_gModificarInventario;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('autoriza_borrado') . "/", $this->nm_location, "_self?#?" . NM_encode_input("") . "?@?", "_self", "ret_self", 440, 630);
 };
		}
	else
		{
			if($this->estado_comanda ==1)
			{
			
				 
      $nm_select = "select numpedido from pedidos where idpedido='".$this->idpedid ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vdatospedido = array();
     if ($this->idpedid != "")
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
                      $this->vdatospedido[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vdatospedido = false;
          $this->vdatospedido_erro = $this->Db->ErrorMsg();
      } 
     } 
;
				if(isset($this->vdatospedido[0][0]))
				{
					
					$vnumpedido = $this->vdatospedido[0][0];
					
     $nm_select ="insert into log set usuario='".$this->sc_temp_gidtercero."',accion='ELIMINAR',observaciones='EL USUARIO ELIMINO EL ITEM: ".$vnompro." DEL PEDIDO N: ".$vnumpedido."'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_detallepedido_220621_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
				}
			}	
			else
			{
				$this->sc_temp_gProducto="";
				$this->sc_temp_gIdDeta="";
				$this->sc_set_focus('valorunii');
			}
		}
}
switch($this->estado_comanda )
{
	case 1:
		$this->estado_comanda  = "PENDIENTE";
	break;
							
	case 2:
		$this->estado_comanda  = "PROCESO";
	break;
							
	case 3:
		$this->estado_comanda  = "CERRADA";
	break;
}

if($this->sc_temp_gModificarInventario=="SI")
{
	$this->fGestionaStock($this->iddet ,1,"pedido");

	if(!empty($this->iddet ))
	{
		$this->update_master();
	}
}
if (isset($this->sc_temp_gidtercero)) { $_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
if (isset($this->sc_temp_gProducto)) { $_SESSION['gProducto'] = $this->sc_temp_gProducto;}
if (isset($this->sc_temp_gIdDeta)) { $_SESSION['gIdDeta'] = $this->sc_temp_gIdDeta;}
if (isset($this->sc_temp_gModificarInventario)) { $_SESSION['gModificarInventario'] = $this->sc_temp_gModificarInventario;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_estado_comanda != $this->estado_comanda || (isset($bFlagRead_estado_comanda) && $bFlagRead_estado_comanda)))
    {
        $this->ajax_return_values_estado_comanda(true);
    }
    if (($original_iddet != $this->iddet || (isset($bFlagRead_iddet) && $bFlagRead_iddet)))
    {
        $this->ajax_return_values_iddet(true);
    }
    if (($original_idpedid != $this->idpedid || (isset($bFlagRead_idpedid) && $bFlagRead_idpedid)))
    {
        $this->ajax_return_values_idpedid(true);
    }
    if (($original_idpro != $this->idpro || (isset($bFlagRead_idpro) && $bFlagRead_idpro)))
    {
        $this->ajax_return_values_idpro(true);
    }
}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off'; 
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
      if ('incluir' == $this->nmgp_opcao && empty($this->idpedid)) {$this->idpedid = "" . $_SESSION['gidpedido'] . ""; $this->sc_force_zero[] = "idpedid";}  
      if (('alterar' == $this->nmgp_opcao || 'igual' == $this->nmgp_opcao) && $this->idpedid == ""){$this->idpedid = "null"; $NM_val_null[] = "idpedid";}  
      $NM_val_form['idpro'] = $this->idpro;
      $NM_val_form['descrip'] = $this->descrip;
      $NM_val_form['idbod'] = $this->idbod;
      $NM_val_form['unidad'] = $this->unidad;
      $NM_val_form['cantidad'] = $this->cantidad;
      $NM_val_form['valorunit'] = $this->valorunit;
      $NM_val_form['adicional'] = $this->adicional;
      $NM_val_form['descuento'] = $this->descuento;
      $NM_val_form['valorpar'] = $this->valorpar;
      $NM_val_form['unidadmayor'] = $this->unidadmayor;
      $NM_val_form['stockubica'] = $this->stockubica;
      $NM_val_form['obs'] = $this->obs;
      $NM_val_form['iddet'] = $this->iddet;
      $NM_val_form['colores'] = $this->colores;
      $NM_val_form['tallas'] = $this->tallas;
      $NM_val_form['sabor'] = $this->sabor;
      $NM_val_form['adicional1'] = $this->adicional1;
      $NM_val_form['factor'] = $this->factor;
      $NM_val_form['iva'] = $this->iva;
      $NM_val_form['costop'] = $this->costop;
      $NM_val_form['autorizarborrado'] = $this->autorizarborrado;
      $NM_val_form['estado_comanda'] = $this->estado_comanda;
      $NM_val_form['idpedid'] = $this->idpedid;
      $NM_val_form['numfac'] = $this->numfac;
      $NM_val_form['remision'] = $this->remision;
      $NM_val_form['devuelto'] = $this->devuelto;
      $NM_val_form['usuario_comanda'] = $this->usuario_comanda;
      $NM_val_form['tercero_comanda'] = $this->tercero_comanda;
      $NM_val_form['hora_inicio'] = $this->hora_inicio;
      $NM_val_form['hora_final'] = $this->hora_final;
      $NM_val_form['observ'] = $this->observ;
      $NM_val_form['cerrado'] = $this->cerrado;
      $NM_val_form['descr'] = $this->descr;
      $NM_val_form['codbarra'] = $this->codbarra;
      if ($this->iddet === "" || is_null($this->iddet))  
      { 
          $this->iddet = 0;
      } 
      if ($this->idpedid === "" || is_null($this->idpedid))  
      { 
          $this->idpedid = 0;
          $this->sc_force_zero[] = 'idpedid';
      } 
      if ($this->numfac === "" || is_null($this->numfac))  
      { 
          $this->numfac = 0;
          $this->sc_force_zero[] = 'numfac';
      } 
      if ($this->remision === "" || is_null($this->remision))  
      { 
          $this->remision = 0;
          $this->sc_force_zero[] = 'remision';
      } 
      if ($this->idpro === "" || is_null($this->idpro))  
      { 
          $this->idpro = 0;
          $this->sc_force_zero[] = 'idpro';
      } 
      if ($this->factor === "" || is_null($this->factor))  
      { 
          $this->factor = 0;
          $this->sc_force_zero[] = 'factor';
      } 
      if ($this->idbod === "" || is_null($this->idbod))  
      { 
          $this->idbod = 0;
          $this->sc_force_zero[] = 'idbod';
      } 
      if ($this->costop === "" || is_null($this->costop))  
      { 
          $this->costop = 0;
          $this->sc_force_zero[] = 'costop';
      } 
      if ($this->cantidad === "" || is_null($this->cantidad))  
      { 
          $this->cantidad = 0;
          $this->sc_force_zero[] = 'cantidad';
      } 
      if ($this->valorunit === "" || is_null($this->valorunit))  
      { 
          $this->valorunit = 0;
          $this->sc_force_zero[] = 'valorunit';
      } 
      if ($this->valorpar === "" || is_null($this->valorpar))  
      { 
          $this->valorpar = 0;
          $this->sc_force_zero[] = 'valorpar';
      } 
      if ($this->iva === "" || is_null($this->iva))  
      { 
          $this->iva = 0;
          $this->sc_force_zero[] = 'iva';
      } 
      if ($this->descuento === "" || is_null($this->descuento))  
      { 
          $this->descuento = 0;
          $this->sc_force_zero[] = 'descuento';
      } 
      if ($this->adicional === "" || is_null($this->adicional))  
      { 
          $this->adicional = 0;
          $this->sc_force_zero[] = 'adicional';
      } 
      if ($this->adicional1 === "" || is_null($this->adicional1))  
      { 
          $this->adicional1 = 0;
          $this->sc_force_zero[] = 'adicional1';
      } 
      if ($this->devuelto === "" || is_null($this->devuelto))  
      { 
          $this->devuelto = 0;
          $this->sc_force_zero[] = 'devuelto';
      } 
      if ($this->colores === "" || is_null($this->colores))  
      { 
          $this->colores = 0;
          $this->sc_force_zero[] = 'colores';
      } 
      if ($this->tallas === "" || is_null($this->tallas))  
      { 
          $this->tallas = 0;
          $this->sc_force_zero[] = 'tallas';
      } 
      if ($this->sabor === "" || is_null($this->sabor))  
      { 
          $this->sabor = 0;
          $this->sc_force_zero[] = 'sabor';
      } 
      if ($this->tercero_comanda === "" || is_null($this->tercero_comanda))  
      { 
          $this->tercero_comanda = 0;
          $this->sc_force_zero[] = 'tercero_comanda';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->unidadmayor_before_qstr = $this->unidadmayor;
          $this->unidadmayor = substr($this->Db->qstr($this->unidadmayor), 1, -1); 
          if ($this->unidadmayor == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->unidadmayor = "null"; 
              $NM_val_null[] = "unidadmayor";
          } 
          $this->estado_comanda_before_qstr = $this->estado_comanda;
          $this->estado_comanda = substr($this->Db->qstr($this->estado_comanda), 1, -1); 
          if ($this->estado_comanda == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->estado_comanda = "null"; 
              $NM_val_null[] = "estado_comanda";
          } 
          $this->usuario_comanda_before_qstr = $this->usuario_comanda;
          $this->usuario_comanda = substr($this->Db->qstr($this->usuario_comanda), 1, -1); 
          if ($this->usuario_comanda == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->usuario_comanda = "null"; 
              $NM_val_null[] = "usuario_comanda";
          } 
          if ($this->hora_inicio == "")  
          { 
              $this->hora_inicio = "null"; 
              $NM_val_null[] = "hora_inicio";
          } 
          if ($this->hora_final == "")  
          { 
              $this->hora_final = "null"; 
              $NM_val_null[] = "hora_final";
          } 
          $this->observ_before_qstr = $this->observ;
          $this->observ = substr($this->Db->qstr($this->observ), 1, -1); 
          if ($this->observ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->observ = "null"; 
              $NM_val_null[] = "observ";
          } 
          $this->cerrado_before_qstr = $this->cerrado;
          $this->cerrado = substr($this->Db->qstr($this->cerrado), 1, -1); 
          if ($this->cerrado == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cerrado = "null"; 
              $NM_val_null[] = "cerrado";
          } 
          $this->obs_before_qstr = $this->obs;
          $this->obs = substr($this->Db->qstr($this->obs), 1, -1); 
          if ($this->obs == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->obs = "null"; 
              $NM_val_null[] = "obs";
          } 
          $this->descr_before_qstr = $this->descr;
          $this->descr = substr($this->Db->qstr($this->descr), 1, -1); 
          if ($this->descr == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->descr = "null"; 
              $NM_val_null[] = "descr";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_detallepedido_220621_mob_pack_ajax_response();
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
                  $SC_fields_update[] = "idpedid = $this->idpedid, idpro = $this->idpro, unidadmayor = '$this->unidadmayor', factor = $this->factor, idbod = $this->idbod, costop = $this->costop, cantidad = $this->cantidad, valorunit = $this->valorunit, valorpar = $this->valorpar, iva = $this->iva, descuento = $this->descuento, adicional = $this->adicional, adicional1 = $this->adicional1, colores = $this->colores, tallas = $this->tallas, sabor = $this->sabor, estado_comanda = '$this->estado_comanda', obs = '$this->obs'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idpedid = $this->idpedid, idpro = $this->idpro, unidadmayor = '$this->unidadmayor', factor = $this->factor, idbod = $this->idbod, costop = $this->costop, cantidad = $this->cantidad, valorunit = $this->valorunit, valorpar = $this->valorpar, iva = $this->iva, descuento = $this->descuento, adicional = $this->adicional, adicional1 = $this->adicional1, colores = $this->colores, tallas = $this->tallas, sabor = $this->sabor, estado_comanda = '$this->estado_comanda', obs = '$this->obs'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idpedid = $this->idpedid, idpro = $this->idpro, unidadmayor = '$this->unidadmayor', factor = $this->factor, idbod = $this->idbod, costop = $this->costop, cantidad = $this->cantidad, valorunit = $this->valorunit, valorpar = $this->valorpar, iva = $this->iva, descuento = $this->descuento, adicional = $this->adicional, adicional1 = $this->adicional1, colores = $this->colores, tallas = $this->tallas, sabor = $this->sabor, estado_comanda = '$this->estado_comanda', obs = '$this->obs'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idpedid = $this->idpedid, idpro = $this->idpro, unidadmayor = '$this->unidadmayor', factor = $this->factor, idbod = $this->idbod, costop = $this->costop, cantidad = $this->cantidad, valorunit = $this->valorunit, valorpar = $this->valorpar, iva = $this->iva, descuento = $this->descuento, adicional = $this->adicional, adicional1 = $this->adicional1, colores = $this->colores, tallas = $this->tallas, sabor = $this->sabor, estado_comanda = '$this->estado_comanda', obs = '$this->obs'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idpedid = $this->idpedid, idpro = $this->idpro, unidadmayor = '$this->unidadmayor', factor = $this->factor, idbod = $this->idbod, costop = $this->costop, cantidad = $this->cantidad, valorunit = $this->valorunit, valorpar = $this->valorpar, iva = $this->iva, descuento = $this->descuento, adicional = $this->adicional, adicional1 = $this->adicional1, colores = $this->colores, tallas = $this->tallas, sabor = $this->sabor, estado_comanda = '$this->estado_comanda', obs = '$this->obs'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idpedid = $this->idpedid, idpro = $this->idpro, unidadmayor = '$this->unidadmayor', factor = $this->factor, idbod = $this->idbod, costop = $this->costop, cantidad = $this->cantidad, valorunit = $this->valorunit, valorpar = $this->valorpar, iva = $this->iva, descuento = $this->descuento, adicional = $this->adicional, adicional1 = $this->adicional1, colores = $this->colores, tallas = $this->tallas, sabor = $this->sabor, estado_comanda = '$this->estado_comanda', obs = '$this->obs'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "idpedid = $this->idpedid, idpro = $this->idpro, unidadmayor = '$this->unidadmayor', factor = $this->factor, idbod = $this->idbod, costop = $this->costop, cantidad = $this->cantidad, valorunit = $this->valorunit, valorpar = $this->valorpar, iva = $this->iva, descuento = $this->descuento, adicional = $this->adicional, adicional1 = $this->adicional1, colores = $this->colores, tallas = $this->tallas, sabor = $this->sabor, estado_comanda = '$this->estado_comanda', obs = '$this->obs'"; 
              } 
              if (isset($NM_val_form['numfac']) && $NM_val_form['numfac'] != $this->nmgp_dados_select['numfac']) 
              { 
                  $SC_fields_update[] = "numfac = $this->numfac"; 
              } 
              if (isset($NM_val_form['remision']) && $NM_val_form['remision'] != $this->nmgp_dados_select['remision']) 
              { 
                  $SC_fields_update[] = "remision = $this->remision"; 
              } 
              if (isset($NM_val_form['devuelto']) && $NM_val_form['devuelto'] != $this->nmgp_dados_select['devuelto']) 
              { 
                  $SC_fields_update[] = "devuelto = $this->devuelto"; 
              } 
              if (isset($NM_val_form['usuario_comanda']) && $NM_val_form['usuario_comanda'] != $this->nmgp_dados_select['usuario_comanda']) 
              { 
                  $SC_fields_update[] = "usuario_comanda = '$this->usuario_comanda'"; 
              } 
              if (isset($NM_val_form['tercero_comanda']) && $NM_val_form['tercero_comanda'] != $this->nmgp_dados_select['tercero_comanda']) 
              { 
                  $SC_fields_update[] = "tercero_comanda = $this->tercero_comanda"; 
              } 
              if (isset($NM_val_form['hora_inicio']) && $NM_val_form['hora_inicio'] != $this->nmgp_dados_select['hora_inicio']) 
              { 
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  { 
                      $SC_fields_update[] = "hora_inicio = TO_DATE('$this->hora_inicio', 'yyyy-mm-dd hh24:mi:ss')"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "hora_inicio = '$this->hora_inicio'"; 
                  } 
              } 
              if (isset($NM_val_form['hora_final']) && $NM_val_form['hora_final'] != $this->nmgp_dados_select['hora_final']) 
              { 
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  { 
                      $SC_fields_update[] = "hora_final = TO_DATE('$this->hora_final', 'yyyy-mm-dd hh24:mi:ss')"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "hora_final = '$this->hora_final'"; 
                  } 
              } 
              if (isset($NM_val_form['observ']) && $NM_val_form['observ'] != $this->nmgp_dados_select['observ']) 
              { 
                  $SC_fields_update[] = "observ = '$this->observ'"; 
              } 
              if (isset($NM_val_form['cerrado']) && $NM_val_form['cerrado'] != $this->nmgp_dados_select['cerrado']) 
              { 
                  $SC_fields_update[] = "cerrado = '$this->cerrado'"; 
              } 
              if (isset($NM_val_form['descr']) && $NM_val_form['descr'] != $this->nmgp_dados_select['descr']) 
              { 
                  $SC_fields_update[] = "descr = '$this->descr'"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE iddet = $this->iddet ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE iddet = $this->iddet ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE iddet = $this->iddet ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE iddet = $this->iddet ";  
              }  
              else  
              {
                  $comando .= " WHERE iddet = $this->iddet ";  
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
                                  form_detallepedido_220621_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->unidadmayor = $this->unidadmayor_before_qstr;
              $this->estado_comanda = $this->estado_comanda_before_qstr;
              $this->usuario_comanda = $this->usuario_comanda_before_qstr;
              $this->observ = $this->observ_before_qstr;
              $this->cerrado = $this->cerrado_before_qstr;
              $this->obs = $this->obs_before_qstr;
              $this->descr = $this->descr_before_qstr;
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['iddet'])) { $this->iddet = $NM_val_form['iddet']; }
              elseif (isset($this->iddet)) { $this->nm_limpa_alfa($this->iddet); }
              if     (isset($NM_val_form) && isset($NM_val_form['idpedid'])) { $this->idpedid = $NM_val_form['idpedid']; }
              elseif (isset($this->idpedid)) { $this->nm_limpa_alfa($this->idpedid); }
              if     (isset($NM_val_form) && isset($NM_val_form['idpro'])) { $this->idpro = $NM_val_form['idpro']; }
              elseif (isset($this->idpro)) { $this->nm_limpa_alfa($this->idpro); }
              if     (isset($NM_val_form) && isset($NM_val_form['unidadmayor'])) { $this->unidadmayor = $NM_val_form['unidadmayor']; }
              elseif (isset($this->unidadmayor)) { $this->nm_limpa_alfa($this->unidadmayor); }
              if     (isset($NM_val_form) && isset($NM_val_form['factor'])) { $this->factor = $NM_val_form['factor']; }
              elseif (isset($this->factor)) { $this->nm_limpa_alfa($this->factor); }
              if     (isset($NM_val_form) && isset($NM_val_form['idbod'])) { $this->idbod = $NM_val_form['idbod']; }
              elseif (isset($this->idbod)) { $this->nm_limpa_alfa($this->idbod); }
              if     (isset($NM_val_form) && isset($NM_val_form['costop'])) { $this->costop = $NM_val_form['costop']; }
              elseif (isset($this->costop)) { $this->nm_limpa_alfa($this->costop); }
              if     (isset($NM_val_form) && isset($NM_val_form['cantidad'])) { $this->cantidad = $NM_val_form['cantidad']; }
              elseif (isset($this->cantidad)) { $this->nm_limpa_alfa($this->cantidad); }
              if     (isset($NM_val_form) && isset($NM_val_form['valorunit'])) { $this->valorunit = $NM_val_form['valorunit']; }
              elseif (isset($this->valorunit)) { $this->nm_limpa_alfa($this->valorunit); }
              if     (isset($NM_val_form) && isset($NM_val_form['valorpar'])) { $this->valorpar = $NM_val_form['valorpar']; }
              elseif (isset($this->valorpar)) { $this->nm_limpa_alfa($this->valorpar); }
              if     (isset($NM_val_form) && isset($NM_val_form['iva'])) { $this->iva = $NM_val_form['iva']; }
              elseif (isset($this->iva)) { $this->nm_limpa_alfa($this->iva); }
              if     (isset($NM_val_form) && isset($NM_val_form['descuento'])) { $this->descuento = $NM_val_form['descuento']; }
              elseif (isset($this->descuento)) { $this->nm_limpa_alfa($this->descuento); }
              if     (isset($NM_val_form) && isset($NM_val_form['adicional'])) { $this->adicional = $NM_val_form['adicional']; }
              elseif (isset($this->adicional)) { $this->nm_limpa_alfa($this->adicional); }
              if     (isset($NM_val_form) && isset($NM_val_form['adicional1'])) { $this->adicional1 = $NM_val_form['adicional1']; }
              elseif (isset($this->adicional1)) { $this->nm_limpa_alfa($this->adicional1); }
              if     (isset($NM_val_form) && isset($NM_val_form['colores'])) { $this->colores = $NM_val_form['colores']; }
              elseif (isset($this->colores)) { $this->nm_limpa_alfa($this->colores); }
              if     (isset($NM_val_form) && isset($NM_val_form['tallas'])) { $this->tallas = $NM_val_form['tallas']; }
              elseif (isset($this->tallas)) { $this->nm_limpa_alfa($this->tallas); }
              if     (isset($NM_val_form) && isset($NM_val_form['sabor'])) { $this->sabor = $NM_val_form['sabor']; }
              elseif (isset($this->sabor)) { $this->nm_limpa_alfa($this->sabor); }
              if     (isset($NM_val_form) && isset($NM_val_form['estado_comanda'])) { $this->estado_comanda = $NM_val_form['estado_comanda']; }
              elseif (isset($this->estado_comanda)) { $this->nm_limpa_alfa($this->estado_comanda); }
              if     (isset($NM_val_form) && isset($NM_val_form['obs'])) { $this->obs = $NM_val_form['obs']; }
              elseif (isset($this->obs)) { $this->nm_limpa_alfa($this->obs); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('idpro', 'descrip', 'idbod', 'unidad', 'cantidad', 'valorunit', 'adicional', 'descuento', 'valorpar', 'unidadmayor', 'stockubica', 'obs', 'iddet', 'colores', 'tallas', 'sabor', 'adicional1', 'factor', 'iva', 'costop', 'autorizarborrado', 'estado_comanda', 'idpedid'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['decimal_db'] == ",") 
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
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_detallepedido_220621_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (idpedid, numfac, remision, idpro, unidadmayor, factor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, estado_comanda, usuario_comanda, tercero_comanda, hora_inicio, hora_final, observ, cerrado, obs, descr) VALUES ($this->idpedid, $this->numfac, $this->remision, $this->idpro, '$this->unidadmayor', $this->factor, $this->idbod, $this->costop, $this->cantidad, $this->valorunit, $this->valorpar, $this->iva, $this->descuento, $this->adicional, $this->adicional1, $this->devuelto, $this->colores, $this->tallas, $this->sabor, '$this->estado_comanda', '$this->usuario_comanda', $this->tercero_comanda, '$this->hora_inicio', '$this->hora_final', '$this->observ', '$this->cerrado', '$this->obs', '$this->descr')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idpedid, numfac, remision, idpro, unidadmayor, factor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, estado_comanda, usuario_comanda, tercero_comanda, hora_inicio, hora_final, observ, cerrado, obs, descr) VALUES (" . $NM_seq_auto . "$this->idpedid, $this->numfac, $this->remision, $this->idpro, '$this->unidadmayor', $this->factor, $this->idbod, $this->costop, $this->cantidad, $this->valorunit, $this->valorpar, $this->iva, $this->descuento, $this->adicional, $this->adicional1, $this->devuelto, $this->colores, $this->tallas, $this->sabor, '$this->estado_comanda', '$this->usuario_comanda', $this->tercero_comanda, '$this->hora_inicio', '$this->hora_final', '$this->observ', '$this->cerrado', '$this->obs', '$this->descr')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idpedid, numfac, remision, idpro, unidadmayor, factor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, estado_comanda, usuario_comanda, tercero_comanda, hora_inicio, hora_final, observ, cerrado, obs, descr) VALUES (" . $NM_seq_auto . "$this->idpedid, $this->numfac, $this->remision, $this->idpro, '$this->unidadmayor', $this->factor, $this->idbod, $this->costop, $this->cantidad, $this->valorunit, $this->valorpar, $this->iva, $this->descuento, $this->adicional, $this->adicional1, $this->devuelto, $this->colores, $this->tallas, $this->sabor, '$this->estado_comanda', '$this->usuario_comanda', $this->tercero_comanda, '$this->hora_inicio', '$this->hora_final', '$this->observ', '$this->cerrado', '$this->obs', '$this->descr')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idpedid, numfac, remision, idpro, unidadmayor, factor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, estado_comanda, usuario_comanda, tercero_comanda, hora_inicio, hora_final, observ, cerrado, obs, descr) VALUES (" . $NM_seq_auto . "$this->idpedid, $this->numfac, $this->remision, $this->idpro, '$this->unidadmayor', $this->factor, $this->idbod, $this->costop, $this->cantidad, $this->valorunit, $this->valorpar, $this->iva, $this->descuento, $this->adicional, $this->adicional1, $this->devuelto, $this->colores, $this->tallas, $this->sabor, '$this->estado_comanda', '$this->usuario_comanda', $this->tercero_comanda, TO_DATE('$this->hora_inicio', 'yyyy-mm-dd hh24:mi:ss'), TO_DATE('$this->hora_final', 'yyyy-mm-dd hh24:mi:ss'), '$this->observ', '$this->cerrado', '$this->obs', '$this->descr')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idpedid, numfac, remision, idpro, unidadmayor, factor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, estado_comanda, usuario_comanda, tercero_comanda, hora_inicio, hora_final, observ, cerrado, obs, descr) VALUES (" . $NM_seq_auto . "$this->idpedid, $this->numfac, $this->remision, $this->idpro, '$this->unidadmayor', $this->factor, $this->idbod, $this->costop, $this->cantidad, $this->valorunit, $this->valorpar, $this->iva, $this->descuento, $this->adicional, $this->adicional1, $this->devuelto, $this->colores, $this->tallas, $this->sabor, '$this->estado_comanda', '$this->usuario_comanda', $this->tercero_comanda, '$this->hora_inicio', '$this->hora_final', '$this->observ', '$this->cerrado', '$this->obs', '$this->descr')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idpedid, numfac, remision, idpro, unidadmayor, factor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, estado_comanda, usuario_comanda, tercero_comanda, hora_inicio, hora_final, observ, cerrado, obs, descr) VALUES (" . $NM_seq_auto . "$this->idpedid, $this->numfac, $this->remision, $this->idpro, '$this->unidadmayor', $this->factor, $this->idbod, $this->costop, $this->cantidad, $this->valorunit, $this->valorpar, $this->iva, $this->descuento, $this->adicional, $this->adicional1, $this->devuelto, $this->colores, $this->tallas, $this->sabor, '$this->estado_comanda', '$this->usuario_comanda', $this->tercero_comanda, '$this->hora_inicio', '$this->hora_final', '$this->observ', '$this->cerrado', '$this->obs', '$this->descr')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idpedid, numfac, remision, idpro, unidadmayor, factor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, estado_comanda, usuario_comanda, tercero_comanda, hora_inicio, hora_final, observ, cerrado, obs, descr) VALUES (" . $NM_seq_auto . "$this->idpedid, $this->numfac, $this->remision, $this->idpro, '$this->unidadmayor', $this->factor, $this->idbod, $this->costop, $this->cantidad, $this->valorunit, $this->valorpar, $this->iva, $this->descuento, $this->adicional, $this->adicional1, $this->devuelto, $this->colores, $this->tallas, $this->sabor, '$this->estado_comanda', '$this->usuario_comanda', $this->tercero_comanda, '$this->hora_inicio', '$this->hora_final', '$this->observ', '$this->cerrado', '$this->obs', '$this->descr')"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idpedid, numfac, remision, idpro, unidadmayor, factor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, estado_comanda, usuario_comanda, tercero_comanda, hora_inicio, hora_final, observ, cerrado, obs, descr) VALUES (" . $NM_seq_auto . "$this->idpedid, $this->numfac, $this->remision, $this->idpro, '$this->unidadmayor', $this->factor, $this->idbod, $this->costop, $this->cantidad, $this->valorunit, $this->valorpar, $this->iva, $this->descuento, $this->adicional, $this->adicional1, $this->devuelto, $this->colores, $this->tallas, $this->sabor, '$this->estado_comanda', '$this->usuario_comanda', $this->tercero_comanda, TO_DATE('$this->hora_inicio', 'yyyy-mm-dd hh24:mi:ss'), TO_DATE('$this->hora_final', 'yyyy-mm-dd hh24:mi:ss'), '$this->observ', '$this->cerrado', '$this->obs', '$this->descr')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "idpedid, numfac, remision, idpro, unidadmayor, factor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, estado_comanda, usuario_comanda, tercero_comanda, hora_inicio, hora_final, observ, cerrado, obs, descr) VALUES (" . $NM_seq_auto . "$this->idpedid, $this->numfac, $this->remision, $this->idpro, '$this->unidadmayor', $this->factor, $this->idbod, $this->costop, $this->cantidad, $this->valorunit, $this->valorpar, $this->iva, $this->descuento, $this->adicional, $this->adicional1, $this->devuelto, $this->colores, $this->tallas, $this->sabor, '$this->estado_comanda', '$this->usuario_comanda', $this->tercero_comanda, '$this->hora_inicio', '$this->hora_final', '$this->observ', '$this->cerrado', '$this->obs', '$this->descr')"; 
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
                              form_detallepedido_220621_mob_pack_ajax_response();
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
                          form_detallepedido_220621_mob_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->iddet =  $rsy->fields[0];
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
                  $this->iddet = $rsy->fields[0];
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
                  $this->iddet = $rsy->fields[0];
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
                  $this->iddet = $rsy->fields[0];
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
                  $this->iddet = $rsy->fields[0];
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
                  $this->iddet = $rsy->fields[0];
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
                  $this->iddet = $rsy->fields[0];
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
                  $this->iddet = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->unidadmayor = $this->unidadmayor_before_qstr;
              $this->estado_comanda = $this->estado_comanda_before_qstr;
              $this->usuario_comanda = $this->usuario_comanda_before_qstr;
              $this->observ = $this->observ_before_qstr;
              $this->cerrado = $this->cerrado_before_qstr;
              $this->obs = $this->obs_before_qstr;
              $this->descr = $this->descr_before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->unidadmayor = $this->unidadmayor_before_qstr;
              $this->estado_comanda = $this->estado_comanda_before_qstr;
              $this->usuario_comanda = $this->usuario_comanda_before_qstr;
              $this->observ = $this->observ_before_qstr;
              $this->cerrado = $this->cerrado_before_qstr;
              $this->obs = $this->obs_before_qstr;
              $this->descr = $this->descr_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              $this->nmgp_botoes['autorizar'] = "on";
              $this->nmgp_botoes['refrescar'] = "on";
              $this->return_after_insert();
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->iddet = substr($this->Db->qstr($this->iddet), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where iddet = $this->iddet "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where iddet = $this->iddet "); 
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
                          form_detallepedido_220621_mob_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['total']);
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['decimal_db'] == ",")
        {
            $this->nm_troca_decimal(",", ".");
        }
        $_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_iddet = $this->iddet;
    $original_idpedid = $this->idpedid;
    $original_idpro = $this->idpro;
}
if (!isset($this->sc_temp_gModificarInventario)) {$this->sc_temp_gModificarInventario = (isset($_SESSION['gModificarInventario'])) ? $_SESSION['gModificarInventario'] : "";}
   
      $nm_select = "select idgrup from productos where idprod=$this->idpro "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->d_gru = array();
     if ($this->idpro != "")
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
                      $this->d_gru[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->d_gru = false;
          $this->d_gru_erro = $this->Db->ErrorMsg();
      } 
     } 
;
if(isset($this->d_gru[0][0]))
	{
	if($this->d_gru[0][0]==1)
		{
		$vGrupo=1;
		}
	else
		{
		$vGrupo=0;
		}
	}
if($this->sc_temp_gModificarInventario=="SI" and $vGrupo==0)
	{
	 
      $nm_select = "select prefijo_ped from pedidos where idpedido=$this->idpedid "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->d_ped = array();
     if ($this->idpedid != "")
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
                      $this->d_ped[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->d_ped = false;
          $this->d_ped_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if(isset($this->d_ped[0][0]))
		{
		$pref=$this->d_ped[0][0];
		 
      $nm_select = "select prefijo from resdian where Idres=$pref"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->pre = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->pre[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->pre = false;
          $this->pre_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->pre[0][0]))
			{
			$cad=$this->pre[0][0]; 
			$existe=strpos ($cad, 'PED');
			if($existe !== false)
				{
				$this->fGestionaStock($this->iddet ,2,"pedido");
				}
			}
		}
	}

$this->update_master();
if (isset($this->sc_temp_gModificarInventario)) { $_SESSION['gModificarInventario'] = $this->sc_temp_gModificarInventario;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_iddet != $this->iddet || (isset($bFlagRead_iddet) && $bFlagRead_iddet)))
    {
        $this->ajax_return_values_iddet(true);
    }
    if (($original_idpedid != $this->idpedid || (isset($bFlagRead_idpedid) && $bFlagRead_idpedid)))
    {
        $this->ajax_return_values_idpedid(true);
    }
    if (($original_idpro != $this->idpro || (isset($bFlagRead_idpro) && $bFlagRead_idpro)))
    {
        $this->ajax_return_values_idpro(true);
    }
}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_iddet = $this->iddet;
    $original_idpedid = $this->idpedid;
}
if (!isset($this->sc_temp_sw)) {$this->sc_temp_sw = (isset($_SESSION['sw'])) ? $_SESSION['sw'] : "";}
if (!isset($this->sc_temp_gModificarInventario)) {$this->sc_temp_gModificarInventario = (isset($_SESSION['gModificarInventario'])) ? $_SESSION['gModificarInventario'] : "";}
  if($this->sc_temp_gModificarInventario=="SI")
{
	$this->fGestionaStock($this->iddet ,3,"pedido");
}

$this->update_master();
$this->sc_temp_sw=0;

if (isset($this->sc_temp_gModificarInventario)) { $_SESSION['gModificarInventario'] = $this->sc_temp_gModificarInventario;}
if (isset($this->sc_temp_sw)) { $_SESSION['sw'] = $this->sc_temp_sw;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_iddet != $this->iddet || (isset($bFlagRead_iddet) && $bFlagRead_iddet)))
    {
        $this->ajax_return_values_iddet(true);
    }
    if (($original_idpedid != $this->idpedid || (isset($bFlagRead_idpedid) && $bFlagRead_idpedid)))
    {
        $this->ajax_return_values_idpedid(true);
    }
}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off'; 
    }
    if ("delete" == $this->sc_evento && $this->nmgp_opcao != "nada") {
      $_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_idpedid = $this->idpedid;
}
  $this->update_master();
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_idpedid != $this->idpedid || (isset($bFlagRead_idpedid) && $bFlagRead_idpedid)))
    {
        $this->ajax_return_values_idpedid(true);
    }
}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off'; 
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['decimal_db'] == ",")
   {
       $this->nm_troca_decimal(".", ",");
   }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['parms'] = "iddet?#?$this->iddet?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->iddet = null === $this->iddet ? null : substr($this->Db->qstr($this->iddet), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] == "R")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->iddet)) 
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
      if ($this->nmgp_opcao != "nada" && (trim($this->iddet) == "")) 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] == "F" && $this->sc_evento == "insert")
      {
          $this->nmgp_opcao = "final";
      }
      $sc_where = trim("idpedid='" . $_SESSION['gidpedido'] . "'");
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_detallepedido_220621_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['total'] = $qt_geral_reg_form_detallepedido_220621_mob;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->iddet))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "iddet < $this->iddet "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "iddet < $this->iddet "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "iddet < $this->iddet "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "iddet < $this->iddet "; 
              }
              else  
              {
                  $Key_Where = "iddet < $this->iddet "; 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_detallepedido_220621_mob = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start'] > $qt_geral_reg_form_detallepedido_220621_mob)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start'] = $qt_geral_reg_form_detallepedido_220621_mob; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start'] = $qt_geral_reg_form_detallepedido_220621_mob; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_detallepedido_220621_mob) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT iddet, idpedid, numfac, remision, idpro, unidadmayor, factor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, estado_comanda, usuario_comanda, tercero_comanda, hora_inicio, hora_final, observ, cerrado, obs, descr from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT iddet, idpedid, numfac, remision, idpro, unidadmayor, factor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, estado_comanda, usuario_comanda, tercero_comanda, hora_inicio, hora_final, observ, cerrado, obs, descr from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT iddet, idpedid, numfac, remision, idpro, unidadmayor, factor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, estado_comanda, usuario_comanda, tercero_comanda, TO_DATE(TO_CHAR(hora_inicio, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), TO_DATE(TO_CHAR(hora_final, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), observ, cerrado, obs, descr from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT iddet, idpedid, numfac, remision, idpro, unidadmayor, factor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, estado_comanda, usuario_comanda, tercero_comanda, hora_inicio, hora_final, observ, cerrado, obs, descr from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT iddet, idpedid, numfac, remision, idpro, unidadmayor, factor, idbod, costop, cantidad, valorunit, valorpar, iva, descuento, adicional, adicional1, devuelto, colores, tallas, sabor, estado_comanda, usuario_comanda, tercero_comanda, hora_inicio, hora_final, observ, cerrado, obs, descr from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = "idpedid='" . $_SESSION['gidpedido'] . "'";
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (!empty($sc_where))
              {
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  {
                     $aWhere[] = "iddet = $this->iddet"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                  {
                     $aWhere[] = "iddet = $this->iddet"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  {
                     $aWhere[] = "iddet = $this->iddet"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  {
                     $aWhere[] = "iddet = $this->iddet"; 
                  }  
                  else  
                  {
                     $aWhere[] = "iddet = $this->iddet"; 
                  }
              } 
              else
              {
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  {
                      $aWhere[] = "iddet = $this->iddet"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                  {
                      $aWhere[] = "iddet = $this->iddet"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  {
                      $aWhere[] = "iddet = $this->iddet"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  {
                      $aWhere[] = "iddet = $this->iddet"; 
                  }  
                  else  
                  {
                      $aWhere[] = "iddet = $this->iddet"; 
                  }
              } 
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "iddet";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "insert" || $this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['autorizar'] = $this->nmgp_botoes['autorizar'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['refrescar'] = $this->nmgp_botoes['refrescar'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['empty_filter'] = true;
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
              $this->NM_ajax_info['buttonDisplay']['autorizar'] = $this->nmgp_botoes['autorizar'] = "off";
              $this->NM_ajax_info['buttonDisplay']['refrescar'] = $this->nmgp_botoes['refrescar'] = "off";
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
              $this->iddet = $rs->fields[0] ; 
              $this->nmgp_dados_select['iddet'] = $this->iddet;
              $this->idpedid = $rs->fields[1] ; 
              $this->nmgp_dados_select['idpedid'] = $this->idpedid;
              $this->numfac = $rs->fields[2] ; 
              $this->nmgp_dados_select['numfac'] = $this->numfac;
              $this->remision = $rs->fields[3] ; 
              $this->nmgp_dados_select['remision'] = $this->remision;
              $this->idpro = $rs->fields[4] ; 
              $this->nmgp_dados_select['idpro'] = $this->idpro;
              $this->unidadmayor = $rs->fields[5] ; 
              $this->nmgp_dados_select['unidadmayor'] = $this->unidadmayor;
              $this->factor = trim($rs->fields[6]) ; 
              $this->nmgp_dados_select['factor'] = $this->factor;
              $this->idbod = $rs->fields[7] ; 
              $this->nmgp_dados_select['idbod'] = $this->idbod;
              $this->costop = trim($rs->fields[8]) ; 
              $this->nmgp_dados_select['costop'] = $this->costop;
              $this->cantidad = trim($rs->fields[9]) ; 
              $this->nmgp_dados_select['cantidad'] = $this->cantidad;
              $this->valorunit = trim($rs->fields[10]) ; 
              $this->nmgp_dados_select['valorunit'] = $this->valorunit;
              $this->valorpar = trim($rs->fields[11]) ; 
              $this->nmgp_dados_select['valorpar'] = $this->valorpar;
              $this->iva = trim($rs->fields[12]) ; 
              $this->nmgp_dados_select['iva'] = $this->iva;
              $this->descuento = trim($rs->fields[13]) ; 
              $this->nmgp_dados_select['descuento'] = $this->descuento;
              $this->adicional = $rs->fields[14] ; 
              $this->nmgp_dados_select['adicional'] = $this->adicional;
              $this->adicional1 = $rs->fields[15] ; 
              $this->nmgp_dados_select['adicional1'] = $this->adicional1;
              $this->devuelto = $rs->fields[16] ; 
              $this->nmgp_dados_select['devuelto'] = $this->devuelto;
              $this->colores = $rs->fields[17] ; 
              $this->nmgp_dados_select['colores'] = $this->colores;
              $this->tallas = $rs->fields[18] ; 
              $this->nmgp_dados_select['tallas'] = $this->tallas;
              $this->sabor = $rs->fields[19] ; 
              $this->nmgp_dados_select['sabor'] = $this->sabor;
              $this->estado_comanda = $rs->fields[20] ; 
              $this->nmgp_dados_select['estado_comanda'] = $this->estado_comanda;
              $this->usuario_comanda = $rs->fields[21] ; 
              $this->nmgp_dados_select['usuario_comanda'] = $this->usuario_comanda;
              $this->tercero_comanda = $rs->fields[22] ; 
              $this->nmgp_dados_select['tercero_comanda'] = $this->tercero_comanda;
              $this->hora_inicio = $rs->fields[23] ; 
              if (substr($this->hora_inicio, 10, 1) == "-") 
              { 
                 $this->hora_inicio = substr($this->hora_inicio, 0, 10) . " " . substr($this->hora_inicio, 11);
              } 
              if (substr($this->hora_inicio, 13, 1) == ".") 
              { 
                 $this->hora_inicio = substr($this->hora_inicio, 0, 13) . ":" . substr($this->hora_inicio, 14, 2) . ":" . substr($this->hora_inicio, 17);
              } 
              $this->nmgp_dados_select['hora_inicio'] = $this->hora_inicio;
              $this->hora_final = $rs->fields[24] ; 
              if (substr($this->hora_final, 10, 1) == "-") 
              { 
                 $this->hora_final = substr($this->hora_final, 0, 10) . " " . substr($this->hora_final, 11);
              } 
              if (substr($this->hora_final, 13, 1) == ".") 
              { 
                 $this->hora_final = substr($this->hora_final, 0, 13) . ":" . substr($this->hora_final, 14, 2) . ":" . substr($this->hora_final, 17);
              } 
              $this->nmgp_dados_select['hora_final'] = $this->hora_final;
              $this->observ = $rs->fields[25] ; 
              $this->nmgp_dados_select['observ'] = $this->observ;
              $this->cerrado = $rs->fields[26] ; 
              $this->nmgp_dados_select['cerrado'] = $this->cerrado;
              $this->obs = $rs->fields[27] ; 
              $this->nmgp_dados_select['obs'] = $this->obs;
              $this->descr = $rs->fields[28] ; 
              $this->nmgp_dados_select['descr'] = $this->descr;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->iddet = (string)$this->iddet; 
              $this->idpedid = (string)$this->idpedid; 
              $this->numfac = (string)$this->numfac; 
              $this->remision = (string)$this->remision; 
              $this->idpro = (string)$this->idpro; 
              $this->factor = (strpos(strtolower($this->factor), "e")) ? (float)$this->factor : $this->factor; 
              $this->factor = (string)$this->factor; 
              $this->idbod = (string)$this->idbod; 
              $this->costop = (strpos(strtolower($this->costop), "e")) ? (float)$this->costop : $this->costop; 
              $this->costop = (string)$this->costop; 
              $this->cantidad = (strpos(strtolower($this->cantidad), "e")) ? (float)$this->cantidad : $this->cantidad; 
              $this->cantidad = (string)$this->cantidad; 
              $this->valorunit = (strpos(strtolower($this->valorunit), "e")) ? (float)$this->valorunit : $this->valorunit; 
              $this->valorunit = (string)$this->valorunit; 
              $this->valorpar = (strpos(strtolower($this->valorpar), "e")) ? (float)$this->valorpar : $this->valorpar; 
              $this->valorpar = (string)$this->valorpar; 
              $this->iva = (strpos(strtolower($this->iva), "e")) ? (float)$this->iva : $this->iva; 
              $this->iva = (string)$this->iva; 
              $this->descuento = (strpos(strtolower($this->descuento), "e")) ? (float)$this->descuento : $this->descuento; 
              $this->descuento = (string)$this->descuento; 
              $this->adicional = (string)$this->adicional; 
              $this->adicional1 = (string)$this->adicional1; 
              $this->devuelto = (string)$this->devuelto; 
              $this->colores = (string)$this->colores; 
              $this->tallas = (string)$this->tallas; 
              $this->sabor = (string)$this->sabor; 
              $this->tercero_comanda = (string)$this->tercero_comanda; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['parms'] = "iddet?#?$this->iddet?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start'] < $qt_geral_reg_form_detallepedido_220621_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['opcao']   = '';
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
              $this->iddet = "";  
              $this->nmgp_dados_form["iddet"] = $this->iddet;
              $this->idpedid = "" . $_SESSION['gidpedido'] . "";  
              $this->nmgp_dados_form["idpedid"] = $this->idpedid;
              $this->numfac = "";  
              $this->nmgp_dados_form["numfac"] = $this->numfac;
              $this->remision = "";  
              $this->nmgp_dados_form["remision"] = $this->remision;
              $this->idpro = "";  
              $this->nmgp_dados_form["idpro"] = $this->idpro;
              $this->unidadmayor = "";  
              $this->nmgp_dados_form["unidadmayor"] = $this->unidadmayor;
              $this->factor = "";  
              $this->nmgp_dados_form["factor"] = $this->factor;
              $this->idbod = "";  
              $this->nmgp_dados_form["idbod"] = $this->idbod;
              $this->costop = "";  
              $this->nmgp_dados_form["costop"] = $this->costop;
              $this->cantidad = "1";  
              $this->nmgp_dados_form["cantidad"] = $this->cantidad;
              $this->valorunit = "0";  
              $this->nmgp_dados_form["valorunit"] = $this->valorunit;
              $this->valorpar = "";  
              $this->nmgp_dados_form["valorpar"] = $this->valorpar;
              $this->iva = "";  
              $this->nmgp_dados_form["iva"] = $this->iva;
              $this->descuento = "";  
              $this->nmgp_dados_form["descuento"] = $this->descuento;
              $this->adicional = "0";  
              $this->nmgp_dados_form["adicional"] = $this->adicional;
              $this->adicional1 = "0";  
              $this->nmgp_dados_form["adicional1"] = $this->adicional1;
              $this->devuelto = "";  
              $this->nmgp_dados_form["devuelto"] = $this->devuelto;
              $this->colores = "";  
              $this->nmgp_dados_form["colores"] = $this->colores;
              $this->tallas = "";  
              $this->nmgp_dados_form["tallas"] = $this->tallas;
              $this->sabor = "";  
              $this->nmgp_dados_form["sabor"] = $this->sabor;
              $this->estado_comanda = "";  
              $this->nmgp_dados_form["estado_comanda"] = $this->estado_comanda;
              $this->usuario_comanda = "";  
              $this->nmgp_dados_form["usuario_comanda"] = $this->usuario_comanda;
              $this->tercero_comanda = "";  
              $this->nmgp_dados_form["tercero_comanda"] = $this->tercero_comanda;
              $this->hora_inicio = "";  
              $this->hora_inicio_hora = "" ;  
              $this->nmgp_dados_form["hora_inicio"] = $this->hora_inicio;
              $this->hora_final = "";  
              $this->hora_final_hora = "" ;  
              $this->nmgp_dados_form["hora_final"] = $this->hora_final;
              $this->observ = "";  
              $this->nmgp_dados_form["observ"] = $this->observ;
              $this->cerrado = "";  
              $this->nmgp_dados_form["cerrado"] = $this->cerrado;
              $this->obs = "";  
              $this->nmgp_dados_form["obs"] = $this->obs;
              $this->descr = "";  
              $this->nmgp_dados_form["descr"] = $this->descr;
              $this->codbarra = "";  
              $this->nmgp_dados_form["codbarra"] = $this->codbarra;
              $this->stockubica = "0";  
              $this->nmgp_dados_form["stockubica"] = $this->stockubica;
              $this->unidad = "";  
              $this->nmgp_dados_form["unidad"] = $this->unidad;
              $this->descrip = "";  
              $this->nmgp_dados_form["descrip"] = $this->descrip;
              $this->autorizarborrado = "";  
              $this->nmgp_dados_form["autorizarborrado"] = $this->autorizarborrado;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['foreign_key'] as $sFKName => $sFKValue)
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
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = 1;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['reg_start'] + 1;
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function actualiza_stock()
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
  
$proid=$this->idpro ;
$cant=$this->cantidad ;

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
		if($this->unidadmayor =='NO' and $this->factor >0)
			{
			$aux=$cant/$this->factor ;
			$cant=round($aux, 2);
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
                form_detallepedido_220621_mob_pack_ajax_response();
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
                form_detallepedido_220621_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
}
function actualiza_stock_edita()
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_sw)) {$this->sc_temp_sw = (isset($_SESSION['sw'])) ? $_SESSION['sw'] : "";}
if (!isset($this->sc_temp_edit_cantidad)) {$this->sc_temp_edit_cantidad = (isset($_SESSION['edit_cantidad'])) ? $_SESSION['edit_cantidad'] : "";}
  
$proid=$this->idpro ;
$cant=$this->cantidad ;

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
		
		if($this->unidadmayor =='NO' and $this->factor >0)
			{
			$aux=$cant/$this->factor ;
			$cant=round($aux, 2);
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
                form_detallepedido_220621_mob_pack_ajax_response();
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
                form_detallepedido_220621_mob_pack_ajax_response();
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
		
		if($this->unidadmayor =='NO' and $this->factor >0)
			{
			$aux=$cant/$this->factor ;
			$cant=round($aux, 2);
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
                form_detallepedido_220621_mob_pack_ajax_response();
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
                form_detallepedido_220621_mob_pack_ajax_response();
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
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
}
function actualiza_stock_elimina()
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
  
$proid=$this->idpro ;
$cant=$this->cantidad ;
 
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
		if($this->unidadmayor =='NO' and $this->factor >0)
			{
			$aux=$cant/$this->factor ;
			$cant=round($aux, 2);
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
                form_detallepedido_220621_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
	}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
}
function autorizarborrado_onClick()
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gIdDeta)) {$this->sc_temp_gIdDeta = (isset($_SESSION['gIdDeta'])) ? $_SESSION['gIdDeta'] : "";}
if (!isset($this->sc_temp_gProducto)) {$this->sc_temp_gProducto = (isset($_SESSION['gProducto'])) ? $_SESSION['gProducto'] : "";}
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
  
$original_idpro = $this->idpro;
$original_iddet = $this->iddet;
$original_estado_comanda = $this->estado_comanda;
$original_idpedid = $this->idpedid;
$original_iddet = $this->iddet;

 
      $nm_select = "select estado_comanda,(select p.nompro from productos p where p.idprod=$this->idpro ) from detallepedido where iddet='".$this->iddet ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vdet = array();
     if ($this->idpro != "" && $this->iddet != "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vdet[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vdet = false;
          $this->vdet_erro = $this->Db->ErrorMsg();
      } 
     } 
;

if(isset($this->vdet[0][0]))
{
	$this->estado_comanda  =$this->vdet[0][0];
	$vnompro  = $this->vdet[0][1];

	if($this->estado_comanda ==2)
		{
		$this->sc_temp_gProducto=$this->idpro ;
		$this->sc_temp_gIdDeta=$this->iddet ;
		 if (isset($this->sc_temp_gidtercero)) { $_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
 if (isset($this->sc_temp_gProducto)) { $_SESSION['gProducto'] = $this->sc_temp_gProducto;}
 if (isset($this->sc_temp_gIdDeta)) { $_SESSION['gIdDeta'] = $this->sc_temp_gIdDeta;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('autoriza_borrado') . "/", $this->nm_location, "_self?#?" . NM_encode_input("") . "?@?", "_self", "ret_self", 440, 630);
 };
		}
	else
		{
			if($this->estado_comanda ==1)
			{
			
				 
      $nm_select = "select numpedido from pedidos where idpedido='".$this->idpedid ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vdatospedido = array();
     if ($this->idpedid != "")
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
                      $this->vdatospedido[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vdatospedido = false;
          $this->vdatospedido_erro = $this->Db->ErrorMsg();
      } 
     } 
;
				if(isset($this->vdatospedido[0][0]))
				{
					
					$vnumpedido = $this->vdatospedido[0][0];
					
     $nm_select ="insert into log set usuario='".$this->sc_temp_gidtercero."',accion='ELIMINAR',observaciones='EL USUARIO ELIMINO EL ITEM: ".$vnompro." DEL PEDIDO N: ".$vnumpedido."'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_detallepedido_220621_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
					
     $nm_select ="delete from detallepedido where iddet=$this->iddet "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_detallepedido_220621_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
					$this->update_master();
					 if (isset($this->sc_temp_gidtercero)) { $_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
 if (isset($this->sc_temp_gProducto)) { $_SESSION['gProducto'] = $this->sc_temp_gProducto;}
 if (isset($this->sc_temp_gIdDeta)) { $_SESSION['gIdDeta'] = $this->sc_temp_gIdDeta;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_detallepedido') . "/", $this->nm_location, "idpedid?#?" . NM_encode_input($this->idpedid ) . "?@?", "_self", "ret_self", 440, 630);
 };
				}
			}	
			else
			{
				$this->sc_temp_gProducto="";
				$this->sc_temp_gIdDeta="";
				$this->sc_set_focus('valorunii');
				echo "NO SE PUEDE ELIMINAR!";
			}
		}
}
switch($this->estado_comanda )
{
	case 1:
		$this->estado_comanda  = "PENDIENTE";
	break;
							
	case 2:
		$this->estado_comanda  = "PROCESO";
	break;
							
	case 3:
		$this->estado_comanda  = "CERRADA";
	break;
}



if (isset($this->sc_temp_gidtercero)) { $_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
if (isset($this->sc_temp_gProducto)) { $_SESSION['gProducto'] = $this->sc_temp_gProducto;}
if (isset($this->sc_temp_gIdDeta)) { $_SESSION['gIdDeta'] = $this->sc_temp_gIdDeta;}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
$modificado_idpro = $this->idpro;
$modificado_iddet = $this->iddet;
$modificado_estado_comanda = $this->estado_comanda;
$modificado_idpedid = $this->idpedid;
$modificado_iddet = $this->iddet;
$this->nm_formatar_campos('idpro', 'iddet', 'estado_comanda', 'idpedid');
if ($original_idpro !== $modificado_idpro || isset($this->nmgp_cmp_readonly['idpro']) || (isset($bFlagRead_idpro) && $bFlagRead_idpro))
{
    $this->ajax_return_values_idpro(true);
}
if ($original_iddet !== $modificado_iddet || isset($this->nmgp_cmp_readonly['iddet']) || (isset($bFlagRead_iddet) && $bFlagRead_iddet))
{
    $this->ajax_return_values_iddet(true);
}
if ($original_estado_comanda !== $modificado_estado_comanda || isset($this->nmgp_cmp_readonly['estado_comanda']) || (isset($bFlagRead_estado_comanda) && $bFlagRead_estado_comanda))
{
    $this->ajax_return_values_estado_comanda(true);
}
if ($original_idpedid !== $modificado_idpedid || isset($this->nmgp_cmp_readonly['idpedid']) || (isset($bFlagRead_idpedid) && $bFlagRead_idpedid))
{
    $this->ajax_return_values_idpedid(true);
}
if ($original_iddet !== $modificado_iddet || isset($this->nmgp_cmp_readonly['iddet']) || (isset($bFlagRead_iddet) && $bFlagRead_iddet))
{
    $this->ajax_return_values_iddet(true);
}
$this->NM_ajax_info['event_field'] = 'autorizarborrado';
form_detallepedido_220621_mob_pack_ajax_response();
exit;
}
function calcula_descuento()
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
  
$desc = 0;
$sql="select coalesce(otro,0),coalesce(otro2,0) from productos where idprod='".$this->idpro ."'";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dsdesc1 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dsdesc1[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dsdesc1 = false;
          $this->dsdesc1_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->dsdesc1[0][0]))
{
	$desc = intval($this->dsdesc1[0][0]);
}

if($desc==1)
{
	$tasades = 0;
	if(isset($this->dsdesc1[0][1]))
	{
		$tasades = $this->dsdesc1[0][1];
	}
	$this->adicional1  = $tasades;
	$tasades=$tasades/100;$tasades=round($tasades, 2);
	$this->descuento =floatval($this->valorpar )*$tasades;
	
}
else
{
	$this->descuento =0;
	$this->adicional1 =0;
}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
}
function calcula_iva()
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
  
$idiva = 0;
$sql = "select i.idiva,i.trifa from productos p inner join iva i on p.idiva=i.idiva where p.idprod='".$this->idpro ."'";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dsiva1 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dsiva1[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dsiva1 = false;
          $this->dsiva1_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->dsiva1[0][0]))
{
	$idiva = $this->dsiva1[0][0];
	$viva  = $this->dsiva1[0][1];
		
	$this->adicional =$viva;
	$viva=$viva/100;
	$viva=$viva+1;
	$parc_desc=floatval($this->valorpar )-floatval($this->descuento );
	$b=$parc_desc/$viva; $b=round($b, 0);
	$this->iva =$parc_desc-$b;
}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
}
function calcula_parcial()
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
  
$ca=floatval($this->cantidad );
$vu=floatval($this->valorunit );
$this->valorpar =$ca*$vu;

$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
}
function cantidad_onBlur()
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_sabor_pedido)) {$this->sc_temp_sabor_pedido = (isset($_SESSION['sabor_pedido'])) ? $_SESSION['sabor_pedido'] : "";}
if (!isset($this->sc_temp_talla_pedido)) {$this->sc_temp_talla_pedido = (isset($_SESSION['talla_pedido'])) ? $_SESSION['talla_pedido'] : "";}
if (!isset($this->sc_temp_color_pedido)) {$this->sc_temp_color_pedido = (isset($_SESSION['color_pedido'])) ? $_SESSION['color_pedido'] : "";}
  
$original_idpro = $this->idpro;
$original_valorunit = $this->valorunit;
$original_cantidad = $this->cantidad;
$original_stockubica = $this->stockubica;
$original_adicional1 = $this->adicional1;
$original_descuento = $this->descuento;
$original_valorpar = $this->valorpar;
$original_adicional = $this->adicional;
$original_iva = $this->iva;
$original_idbod = $this->idbod;
$original_unidadmayor = $this->unidadmayor;
$original_factor = $this->factor;
$original_unidad = $this->unidad;

$idp=$this->idpro ;
$col=$this->sc_temp_color_pedido;
$tal=$this->sc_temp_talla_pedido;
$sa=$this->sc_temp_sabor_pedido;
 
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
	if($this->valorunit =="")
		{
		$this->sc_set_focus('valorunit');
		}
	else
		{
		$gru=$this->consulta_grupo();
		if($gru==0)
		{
		if(!empty($this->idpro ))
			{
			if($this->cantidad ==0.00 or (empty($this->cantidad )))
				{
				
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "¡Ingrese una cantidad Válida!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_form_detallepedido_220621_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_detallepedido_220621_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "¡Ingrese una cantidad Válida!";
 }
;
				$this->sc_set_focus('colores');
				}
			else
				{
				$this->sc_set_focus('valorunit');
				$this->calcula_parcial();
				$this->calcula_descuento();
				$this->calcula_iva();
				$this->ver_stock();
				}
			}
		}
else
	{
	$this->sc_set_focus('valorunit');
	$this->calcula_parcial();
	$this->calcula_descuento();
	$this->calcula_iva();
	$this->ver_stock();
	}
		}
goto et3;
et2:;
$this->cantidad =0;

et3:;




if (isset($this->sc_temp_color_pedido)) { $_SESSION['color_pedido'] = $this->sc_temp_color_pedido;}
if (isset($this->sc_temp_talla_pedido)) { $_SESSION['talla_pedido'] = $this->sc_temp_talla_pedido;}
if (isset($this->sc_temp_sabor_pedido)) { $_SESSION['sabor_pedido'] = $this->sc_temp_sabor_pedido;}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
$modificado_idpro = $this->idpro;
$modificado_valorunit = $this->valorunit;
$modificado_cantidad = $this->cantidad;
$modificado_stockubica = $this->stockubica;
$modificado_adicional1 = $this->adicional1;
$modificado_descuento = $this->descuento;
$modificado_valorpar = $this->valorpar;
$modificado_adicional = $this->adicional;
$modificado_iva = $this->iva;
$modificado_idbod = $this->idbod;
$modificado_unidadmayor = $this->unidadmayor;
$modificado_factor = $this->factor;
$modificado_unidad = $this->unidad;
$this->nm_formatar_campos('idpro', 'valorunit', 'cantidad', 'stockubica', 'adicional1', 'descuento', 'valorpar', 'adicional', 'iva', 'idbod', 'unidadmayor', 'factor', 'unidad');
if ($original_idpro !== $modificado_idpro || isset($this->nmgp_cmp_readonly['idpro']) || (isset($bFlagRead_idpro) && $bFlagRead_idpro))
{
    $this->ajax_return_values_idpro(true);
}
if ($original_valorunit !== $modificado_valorunit || isset($this->nmgp_cmp_readonly['valorunit']) || (isset($bFlagRead_valorunit) && $bFlagRead_valorunit))
{
    $this->ajax_return_values_valorunit(true);
}
if ($original_cantidad !== $modificado_cantidad || isset($this->nmgp_cmp_readonly['cantidad']) || (isset($bFlagRead_cantidad) && $bFlagRead_cantidad))
{
    $this->ajax_return_values_cantidad(true);
}
if ($original_stockubica !== $modificado_stockubica || isset($this->nmgp_cmp_readonly['stockubica']) || (isset($bFlagRead_stockubica) && $bFlagRead_stockubica))
{
    $this->ajax_return_values_stockubica(true);
}
if ($original_adicional1 !== $modificado_adicional1 || isset($this->nmgp_cmp_readonly['adicional1']) || (isset($bFlagRead_adicional1) && $bFlagRead_adicional1))
{
    $this->ajax_return_values_adicional1(true);
}
if ($original_descuento !== $modificado_descuento || isset($this->nmgp_cmp_readonly['descuento']) || (isset($bFlagRead_descuento) && $bFlagRead_descuento))
{
    $this->ajax_return_values_descuento(true);
}
if ($original_valorpar !== $modificado_valorpar || isset($this->nmgp_cmp_readonly['valorpar']) || (isset($bFlagRead_valorpar) && $bFlagRead_valorpar))
{
    $this->ajax_return_values_valorpar(true);
}
if ($original_adicional !== $modificado_adicional || isset($this->nmgp_cmp_readonly['adicional']) || (isset($bFlagRead_adicional) && $bFlagRead_adicional))
{
    $this->ajax_return_values_adicional(true);
}
if ($original_iva !== $modificado_iva || isset($this->nmgp_cmp_readonly['iva']) || (isset($bFlagRead_iva) && $bFlagRead_iva))
{
    $this->ajax_return_values_iva(true);
}
if ($original_idbod !== $modificado_idbod || isset($this->nmgp_cmp_readonly['idbod']) || (isset($bFlagRead_idbod) && $bFlagRead_idbod))
{
    $this->ajax_return_values_idbod(true);
}
if ($original_unidadmayor !== $modificado_unidadmayor || isset($this->nmgp_cmp_readonly['unidadmayor']) || (isset($bFlagRead_unidadmayor) && $bFlagRead_unidadmayor))
{
    $this->ajax_return_values_unidadmayor(true);
}
if ($original_factor !== $modificado_factor || isset($this->nmgp_cmp_readonly['factor']) || (isset($bFlagRead_factor) && $bFlagRead_factor))
{
    $this->ajax_return_values_factor(true);
}
if ($original_unidad !== $modificado_unidad || isset($this->nmgp_cmp_readonly['unidad']) || (isset($bFlagRead_unidad) && $bFlagRead_unidad))
{
    $this->ajax_return_values_unidad(true);
}
$this->NM_ajax_info['event_field'] = 'cantidad';
form_detallepedido_220621_mob_pack_ajax_response();
exit;
}
function cantidad_onChange()
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
  
$original_cantidad = $this->cantidad;
$original_stockubica = $this->stockubica;




$modificado_cantidad = $this->cantidad;
$modificado_stockubica = $this->stockubica;
$this->nm_formatar_campos('cantidad', 'stockubica');
if ($original_cantidad !== $modificado_cantidad || isset($this->nmgp_cmp_readonly['cantidad']) || (isset($bFlagRead_cantidad) && $bFlagRead_cantidad))
{
    $this->ajax_return_values_cantidad(true);
}
if ($original_stockubica !== $modificado_stockubica || isset($this->nmgp_cmp_readonly['stockubica']) || (isset($bFlagRead_stockubica) && $bFlagRead_stockubica))
{
    $this->ajax_return_values_stockubica(true);
}
$this->NM_ajax_info['event_field'] = 'cantidad';
form_detallepedido_220621_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
}
function cantidad_onFocus()
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_edit_cantidad)) {$this->sc_temp_edit_cantidad = (isset($_SESSION['edit_cantidad'])) ? $_SESSION['edit_cantidad'] : "";}
if (!isset($this->sc_temp_sw)) {$this->sc_temp_sw = (isset($_SESSION['sw'])) ? $_SESSION['sw'] : "";}
  
$original_cantidad = $this->cantidad;

if($this->sc_temp_sw==0){
if($this->cantidad !=0){$this->sc_temp_edit_cantidad=$this->cantidad ;}
	$this->sc_temp_sw=1;
	}


if (isset($this->sc_temp_sw)) { $_SESSION['sw'] = $this->sc_temp_sw;}
if (isset($this->sc_temp_edit_cantidad)) { $_SESSION['edit_cantidad'] = $this->sc_temp_edit_cantidad;}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
$modificado_cantidad = $this->cantidad;
$this->nm_formatar_campos('cantidad');
if ($original_cantidad !== $modificado_cantidad || isset($this->nmgp_cmp_readonly['cantidad']) || (isset($bFlagRead_cantidad) && $bFlagRead_cantidad))
{
    $this->ajax_return_values_cantidad(true);
}
$this->NM_ajax_info['event_field'] = 'cantidad';
form_detallepedido_220621_mob_pack_ajax_response();
exit;
}
function colores_onChange()
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_color_pedido)) {$this->sc_temp_color_pedido = (isset($_SESSION['color_pedido'])) ? $_SESSION['color_pedido'] : "";}
  
$original_colores = $this->colores;
$original_idpro = $this->idpro;
$original_idbod = $this->idbod;
$original_unidadmayor = $this->unidadmayor;
$original_factor = $this->factor;
$original_stockubica = $this->stockubica;
$original_unidad = $this->unidad;

$this->ver_stock();
$this->sc_set_focus('tallas');
if($this->colores >0)
	{
	$this->sc_temp_color_pedido=$this->colores ;
	}


if (isset($this->sc_temp_color_pedido)) { $_SESSION['color_pedido'] = $this->sc_temp_color_pedido;}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
$modificado_colores = $this->colores;
$modificado_idpro = $this->idpro;
$modificado_idbod = $this->idbod;
$modificado_unidadmayor = $this->unidadmayor;
$modificado_factor = $this->factor;
$modificado_stockubica = $this->stockubica;
$modificado_unidad = $this->unidad;
$this->nm_formatar_campos('colores', 'idpro', 'idbod', 'unidadmayor', 'factor', 'stockubica', 'unidad');
if ($original_colores !== $modificado_colores || isset($this->nmgp_cmp_readonly['colores']) || (isset($bFlagRead_colores) && $bFlagRead_colores))
{
    $this->ajax_return_values_colores(true);
}
if ($original_idpro !== $modificado_idpro || isset($this->nmgp_cmp_readonly['idpro']) || (isset($bFlagRead_idpro) && $bFlagRead_idpro))
{
    $this->ajax_return_values_idpro(true);
}
if ($original_idbod !== $modificado_idbod || isset($this->nmgp_cmp_readonly['idbod']) || (isset($bFlagRead_idbod) && $bFlagRead_idbod))
{
    $this->ajax_return_values_idbod(true);
}
if ($original_unidadmayor !== $modificado_unidadmayor || isset($this->nmgp_cmp_readonly['unidadmayor']) || (isset($bFlagRead_unidadmayor) && $bFlagRead_unidadmayor))
{
    $this->ajax_return_values_unidadmayor(true);
}
if ($original_factor !== $modificado_factor || isset($this->nmgp_cmp_readonly['factor']) || (isset($bFlagRead_factor) && $bFlagRead_factor))
{
    $this->ajax_return_values_factor(true);
}
if ($original_stockubica !== $modificado_stockubica || isset($this->nmgp_cmp_readonly['stockubica']) || (isset($bFlagRead_stockubica) && $bFlagRead_stockubica))
{
    $this->ajax_return_values_stockubica(true);
}
if ($original_unidad !== $modificado_unidad || isset($this->nmgp_cmp_readonly['unidad']) || (isset($bFlagRead_unidad) && $bFlagRead_unidad))
{
    $this->ajax_return_values_unidad(true);
}
$this->NM_ajax_info['event_field'] = 'colores';
form_detallepedido_220621_mob_pack_ajax_response();
exit;
}
function consulta_grupo()
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
  
if(!empty($this->idpro ))
{
	$idpr=$this->idpro ;
	 
      $nm_select = "select idgrup from productos where idprod=$idpr"; 
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
}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
}
function idbod_onBlur()
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
  
$original_idpro = $this->idpro;
$original_idbod = $this->idbod;
$original_unidadmayor = $this->unidadmayor;
$original_factor = $this->factor;
$original_stockubica = $this->stockubica;
$original_unidad = $this->unidad;

$this->ver_stock();

$modificado_idpro = $this->idpro;
$modificado_idbod = $this->idbod;
$modificado_unidadmayor = $this->unidadmayor;
$modificado_factor = $this->factor;
$modificado_stockubica = $this->stockubica;
$modificado_unidad = $this->unidad;
$this->nm_formatar_campos('idpro', 'idbod', 'unidadmayor', 'factor', 'stockubica', 'unidad');
if ($original_idpro !== $modificado_idpro || isset($this->nmgp_cmp_readonly['idpro']) || (isset($bFlagRead_idpro) && $bFlagRead_idpro))
{
    $this->ajax_return_values_idpro(true);
}
if ($original_idbod !== $modificado_idbod || isset($this->nmgp_cmp_readonly['idbod']) || (isset($bFlagRead_idbod) && $bFlagRead_idbod))
{
    $this->ajax_return_values_idbod(true);
}
if ($original_unidadmayor !== $modificado_unidadmayor || isset($this->nmgp_cmp_readonly['unidadmayor']) || (isset($bFlagRead_unidadmayor) && $bFlagRead_unidadmayor))
{
    $this->ajax_return_values_unidadmayor(true);
}
if ($original_factor !== $modificado_factor || isset($this->nmgp_cmp_readonly['factor']) || (isset($bFlagRead_factor) && $bFlagRead_factor))
{
    $this->ajax_return_values_factor(true);
}
if ($original_stockubica !== $modificado_stockubica || isset($this->nmgp_cmp_readonly['stockubica']) || (isset($bFlagRead_stockubica) && $bFlagRead_stockubica))
{
    $this->ajax_return_values_stockubica(true);
}
if ($original_unidad !== $modificado_unidad || isset($this->nmgp_cmp_readonly['unidad']) || (isset($bFlagRead_unidad) && $bFlagRead_unidad))
{
    $this->ajax_return_values_unidad(true);
}
$this->NM_ajax_info['event_field'] = 'idbod';
form_detallepedido_220621_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
}
function idbod_onChange()
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
  
$original_idpro = $this->idpro;
$original_idbod = $this->idbod;
$original_unidadmayor = $this->unidadmayor;
$original_factor = $this->factor;
$original_stockubica = $this->stockubica;
$original_unidad = $this->unidad;

$this->ver_stock();

$modificado_idpro = $this->idpro;
$modificado_idbod = $this->idbod;
$modificado_unidadmayor = $this->unidadmayor;
$modificado_factor = $this->factor;
$modificado_stockubica = $this->stockubica;
$modificado_unidad = $this->unidad;
$this->nm_formatar_campos('idpro', 'idbod', 'unidadmayor', 'factor', 'stockubica', 'unidad');
if ($original_idpro !== $modificado_idpro || isset($this->nmgp_cmp_readonly['idpro']) || (isset($bFlagRead_idpro) && $bFlagRead_idpro))
{
    $this->ajax_return_values_idpro(true);
}
if ($original_idbod !== $modificado_idbod || isset($this->nmgp_cmp_readonly['idbod']) || (isset($bFlagRead_idbod) && $bFlagRead_idbod))
{
    $this->ajax_return_values_idbod(true);
}
if ($original_unidadmayor !== $modificado_unidadmayor || isset($this->nmgp_cmp_readonly['unidadmayor']) || (isset($bFlagRead_unidadmayor) && $bFlagRead_unidadmayor))
{
    $this->ajax_return_values_unidadmayor(true);
}
if ($original_factor !== $modificado_factor || isset($this->nmgp_cmp_readonly['factor']) || (isset($bFlagRead_factor) && $bFlagRead_factor))
{
    $this->ajax_return_values_factor(true);
}
if ($original_stockubica !== $modificado_stockubica || isset($this->nmgp_cmp_readonly['stockubica']) || (isset($bFlagRead_stockubica) && $bFlagRead_stockubica))
{
    $this->ajax_return_values_stockubica(true);
}
if ($original_unidad !== $modificado_unidad || isset($this->nmgp_cmp_readonly['unidad']) || (isset($bFlagRead_unidad) && $bFlagRead_unidad))
{
    $this->ajax_return_values_unidad(true);
}
$this->NM_ajax_info['event_field'] = 'idbod';
form_detallepedido_220621_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
}
function idpro_onChange()
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_gidpedido)) {$this->sc_temp_gidpedido = (isset($_SESSION['gidpedido'])) ? $_SESSION['gidpedido'] : "";}
  
$original_cantidad = $this->cantidad;
$original_idpro = $this->idpro;
$original_valorunit = $this->valorunit;
$original_unidadmayor = $this->unidadmayor;
$original_costop = $this->costop;
$original_factor = $this->factor;
$original_idbod = $this->idbod;
$original_adicional1 = $this->adicional1;
$original_descuento = $this->descuento;
$original_valorpar = $this->valorpar;
$original_adicional = $this->adicional;
$original_iva = $this->iva;
$original_colores = $this->colores;
$original_tallas = $this->tallas;
$original_sabor = $this->sabor;

$this->maneja_cts();
$lis = 1;
$sql1="select t.listaprecios from pedidos p inner join terceros t on p.idcli=t.idtercero  where p.idpedido='".$this->sc_temp_gidpedido."'";
 
      $nm_select = $sql1; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vLista = array();
      $this->vlista = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vLista[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vlista[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vLista = false;
          $this->vLista_erro = $this->Db->ErrorMsg();
          $this->vlista = false;
          $this->vlista_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vlista[0][0]))
{
	$lis = $this->vlista[0][0];
}

$this->cantidad =1;
$vprecioeditable = "NO";
$vidgrup = 1;

switch ($lis)
	{
	case '1':
		$sql="select unidmaymen, costomen, recmayamen, preciomen, preciofull,precio_editable,idgrup from productos where idprod='".$this->idpro ."'";

		 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vData = array();
      $this->vdata = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vData[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vdata[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vData = false;
          $this->vData_erro = $this->Db->ErrorMsg();
          $this->vdata = false;
          $this->vdata_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->vdata[0][0]))
		{
			
		if($this->vdata[0][0]=='SI')
			{
			$this->valorunit =$this->vdata[0][4];
			$this->unidadmayor ="SI";

			}
		else
			{
			$this->valorunit =$this->vdata[0][3];
			$this->unidadmayor ="NO";
			}

			$this->costop =$this->vdata[0][1];
			$this->factor =$this->vdata[0][2];

			$vprecioeditable = $this->vdata[0][5];
			$vidgrup = $this->vdata[0][6];
		}
	break;
	
	case '2':
	$sql="select unidmaymen, costomen, recmayamen, preciomen2, precio2,precio_editable,idgrup from productos where idprod=$this->idpro ";
	 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->data = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
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
          $this->data_erro = $this->Db->ErrorMsg();
      } 
;
	if($this->data[0][0]=='SI')
		{
		$this->valorunit =$this->data[0][4];
		$this->unidadmayor ="SI";
		$this->sc_set_focus('colores');
		}
	else
		{
		$this->valorunit =$this->data[0][3];
		$this->unidadmayor ="NO";
		$this->sc_set_focus('colores');
		}
		
		$this->costop =$this->data[0][1];
		$this->factor =$this->data[0][2];
	
		$vprecioeditable = $this->data[0][5];
		$vidgrup = $this->data[0][6];
	break;
	
	case '3':
	$sql="select unidmaymen, costomen, recmayamen, preciomen3, preciomay,precio_editable,idgrup from productos where idprod=$this->idpro ";
	 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->data = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
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
          $this->data_erro = $this->Db->ErrorMsg();
      } 
;
	if($this->data[0][0]=='SI')
		{
		$this->valorunit =$this->data[0][4];
		$this->unidadmayor ="SI";
		$this->sc_set_focus('colores');
		}
	else
		{
		$this->valorunit =$this->data[0][3];
		$this->unidadmayor ="NO";
		$this->sc_set_focus('colores');
		}
		$this->costop =$this->data[0][1];
		$this->factor =$this->data[0][2];
	
		$vprecioeditable = $this->data[0][5];
		$vidgrup = $this->data[0][6];
	break;
	
	}

if($vprecioeditable=="SI")
{
	$this->sc_field_readonly("valorunit", 'off');
}
else
{
	$this->sc_field_readonly("valorunit", 'on');
}

if($vidgrup==1)
{
	$this->idbod  = "";
}
else
{
	$this->idbod  = 1;
}


$this->sc_set_focus('idbod');
$this->calcula_parcial();
$this->calcula_descuento();
$this->calcula_iva();




if (isset($this->sc_temp_gidpedido)) { $_SESSION['gidpedido'] = $this->sc_temp_gidpedido;}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
$modificado_cantidad = $this->cantidad;
$modificado_idpro = $this->idpro;
$modificado_valorunit = $this->valorunit;
$modificado_unidadmayor = $this->unidadmayor;
$modificado_costop = $this->costop;
$modificado_factor = $this->factor;
$modificado_idbod = $this->idbod;
$modificado_adicional1 = $this->adicional1;
$modificado_descuento = $this->descuento;
$modificado_valorpar = $this->valorpar;
$modificado_adicional = $this->adicional;
$modificado_iva = $this->iva;
$modificado_colores = $this->colores;
$modificado_tallas = $this->tallas;
$modificado_sabor = $this->sabor;
$this->nm_formatar_campos('cantidad', 'idpro', 'valorunit', 'unidadmayor', 'costop', 'factor', 'idbod', 'adicional1', 'descuento', 'valorpar', 'adicional', 'iva', 'colores', 'tallas', 'sabor');
if ($original_cantidad !== $modificado_cantidad || isset($this->nmgp_cmp_readonly['cantidad']) || (isset($bFlagRead_cantidad) && $bFlagRead_cantidad))
{
    $this->ajax_return_values_cantidad(true);
}
if ($original_idpro !== $modificado_idpro || isset($this->nmgp_cmp_readonly['idpro']) || (isset($bFlagRead_idpro) && $bFlagRead_idpro))
{
    $this->ajax_return_values_idpro(true);
}
if ($original_valorunit !== $modificado_valorunit || isset($this->nmgp_cmp_readonly['valorunit']) || (isset($bFlagRead_valorunit) && $bFlagRead_valorunit))
{
    $this->ajax_return_values_valorunit(true);
}
if ($original_unidadmayor !== $modificado_unidadmayor || isset($this->nmgp_cmp_readonly['unidadmayor']) || (isset($bFlagRead_unidadmayor) && $bFlagRead_unidadmayor))
{
    $this->ajax_return_values_unidadmayor(true);
}
if ($original_costop !== $modificado_costop || isset($this->nmgp_cmp_readonly['costop']) || (isset($bFlagRead_costop) && $bFlagRead_costop))
{
    $this->ajax_return_values_costop(true);
}
if ($original_factor !== $modificado_factor || isset($this->nmgp_cmp_readonly['factor']) || (isset($bFlagRead_factor) && $bFlagRead_factor))
{
    $this->ajax_return_values_factor(true);
}
if ($original_idbod !== $modificado_idbod || isset($this->nmgp_cmp_readonly['idbod']) || (isset($bFlagRead_idbod) && $bFlagRead_idbod))
{
    $this->ajax_return_values_idbod(true);
}
if ($original_adicional1 !== $modificado_adicional1 || isset($this->nmgp_cmp_readonly['adicional1']) || (isset($bFlagRead_adicional1) && $bFlagRead_adicional1))
{
    $this->ajax_return_values_adicional1(true);
}
if ($original_descuento !== $modificado_descuento || isset($this->nmgp_cmp_readonly['descuento']) || (isset($bFlagRead_descuento) && $bFlagRead_descuento))
{
    $this->ajax_return_values_descuento(true);
}
if ($original_valorpar !== $modificado_valorpar || isset($this->nmgp_cmp_readonly['valorpar']) || (isset($bFlagRead_valorpar) && $bFlagRead_valorpar))
{
    $this->ajax_return_values_valorpar(true);
}
if ($original_adicional !== $modificado_adicional || isset($this->nmgp_cmp_readonly['adicional']) || (isset($bFlagRead_adicional) && $bFlagRead_adicional))
{
    $this->ajax_return_values_adicional(true);
}
if ($original_iva !== $modificado_iva || isset($this->nmgp_cmp_readonly['iva']) || (isset($bFlagRead_iva) && $bFlagRead_iva))
{
    $this->ajax_return_values_iva(true);
}
if ($original_colores !== $modificado_colores || isset($this->nmgp_cmp_readonly['colores']) || (isset($bFlagRead_colores) && $bFlagRead_colores))
{
    $this->ajax_return_values_colores(true);
}
if ($original_tallas !== $modificado_tallas || isset($this->nmgp_cmp_readonly['tallas']) || (isset($bFlagRead_tallas) && $bFlagRead_tallas))
{
    $this->ajax_return_values_tallas(true);
}
if ($original_sabor !== $modificado_sabor || isset($this->nmgp_cmp_readonly['sabor']) || (isset($bFlagRead_sabor) && $bFlagRead_sabor))
{
    $this->ajax_return_values_sabor(true);
}
$this->NM_ajax_info['event_field'] = 'idpro';
form_detallepedido_220621_mob_pack_ajax_response();
exit;
}
function maneja_cts()
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_sabor_pedido)) {$this->sc_temp_sabor_pedido = (isset($_SESSION['sabor_pedido'])) ? $_SESSION['sabor_pedido'] : "";}
if (!isset($this->sc_temp_talla_pedido)) {$this->sc_temp_talla_pedido = (isset($_SESSION['talla_pedido'])) ? $_SESSION['talla_pedido'] : "";}
if (!isset($this->sc_temp_color_pedido)) {$this->sc_temp_color_pedido = (isset($_SESSION['color_pedido'])) ? $_SESSION['color_pedido'] : "";}
  
$sql2="select colores, tallas, sabores from productos where idprod=$this->idpro ";
 
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
		$this->colores =0;
		$this->nmgp_cmp_hidden["colores"] = "off"; $this->NM_ajax_info['fieldDisplay']['colores'] = 'off';
		}
	else
		{
		$this->nmgp_cmp_hidden["colores"] = "on"; $this->NM_ajax_info['fieldDisplay']['colores'] = 'on';
		}
	if ($this->dt[0][1]=='NO')
		{
		$this->tallas =0;
		$this->nmgp_cmp_hidden["tallas"] = "off"; $this->NM_ajax_info['fieldDisplay']['tallas'] = 'off';
		}
	else
		{
		$this->nmgp_cmp_hidden["tallas"] = "on"; $this->NM_ajax_info['fieldDisplay']['tallas'] = 'on';
		}
	if ($this->dt[0][2]=='NO')
		{
		$this->sabor =0;
		$this->nmgp_cmp_hidden["sabor"] = "off"; $this->NM_ajax_info['fieldDisplay']['sabor'] = 'off';
		}
	else
		{
		$this->nmgp_cmp_hidden["sabor"] = "on"; $this->NM_ajax_info['fieldDisplay']['sabor'] = 'on';
		}
	$this->sc_temp_color_pedido=$this->colores ;
	$this->sc_temp_talla_pedido=$this->tallas ;
	$this->sc_temp_sabor_pedido=$this->sabor ;
	$this->ver_stock();
	}
if (isset($this->sc_temp_color_pedido)) { $_SESSION['color_pedido'] = $this->sc_temp_color_pedido;}
if (isset($this->sc_temp_talla_pedido)) { $_SESSION['talla_pedido'] = $this->sc_temp_talla_pedido;}
if (isset($this->sc_temp_sabor_pedido)) { $_SESSION['sabor_pedido'] = $this->sc_temp_sabor_pedido;}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
}
function sabor_onChange()
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_sabor_pedido)) {$this->sc_temp_sabor_pedido = (isset($_SESSION['sabor_pedido'])) ? $_SESSION['sabor_pedido'] : "";}
  
$original_sabor = $this->sabor;
$original_idpro = $this->idpro;
$original_idbod = $this->idbod;
$original_unidadmayor = $this->unidadmayor;
$original_factor = $this->factor;
$original_stockubica = $this->stockubica;
$original_unidad = $this->unidad;

$this->ver_stock();
$this->sc_set_focus('idbod');
if($this->sabor >0)
	{
	$this->sc_temp_sabor_pedido=$this->sabor ;
	}


if (isset($this->sc_temp_sabor_pedido)) { $_SESSION['sabor_pedido'] = $this->sc_temp_sabor_pedido;}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
$modificado_sabor = $this->sabor;
$modificado_idpro = $this->idpro;
$modificado_idbod = $this->idbod;
$modificado_unidadmayor = $this->unidadmayor;
$modificado_factor = $this->factor;
$modificado_stockubica = $this->stockubica;
$modificado_unidad = $this->unidad;
$this->nm_formatar_campos('sabor', 'idpro', 'idbod', 'unidadmayor', 'factor', 'stockubica', 'unidad');
if ($original_sabor !== $modificado_sabor || isset($this->nmgp_cmp_readonly['sabor']) || (isset($bFlagRead_sabor) && $bFlagRead_sabor))
{
    $this->ajax_return_values_sabor(true);
}
if ($original_idpro !== $modificado_idpro || isset($this->nmgp_cmp_readonly['idpro']) || (isset($bFlagRead_idpro) && $bFlagRead_idpro))
{
    $this->ajax_return_values_idpro(true);
}
if ($original_idbod !== $modificado_idbod || isset($this->nmgp_cmp_readonly['idbod']) || (isset($bFlagRead_idbod) && $bFlagRead_idbod))
{
    $this->ajax_return_values_idbod(true);
}
if ($original_unidadmayor !== $modificado_unidadmayor || isset($this->nmgp_cmp_readonly['unidadmayor']) || (isset($bFlagRead_unidadmayor) && $bFlagRead_unidadmayor))
{
    $this->ajax_return_values_unidadmayor(true);
}
if ($original_factor !== $modificado_factor || isset($this->nmgp_cmp_readonly['factor']) || (isset($bFlagRead_factor) && $bFlagRead_factor))
{
    $this->ajax_return_values_factor(true);
}
if ($original_stockubica !== $modificado_stockubica || isset($this->nmgp_cmp_readonly['stockubica']) || (isset($bFlagRead_stockubica) && $bFlagRead_stockubica))
{
    $this->ajax_return_values_stockubica(true);
}
if ($original_unidad !== $modificado_unidad || isset($this->nmgp_cmp_readonly['unidad']) || (isset($bFlagRead_unidad) && $bFlagRead_unidad))
{
    $this->ajax_return_values_unidad(true);
}
$this->NM_ajax_info['event_field'] = 'sabor';
form_detallepedido_220621_mob_pack_ajax_response();
exit;
}
function tallas_onChange()
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_talla_pedido)) {$this->sc_temp_talla_pedido = (isset($_SESSION['talla_pedido'])) ? $_SESSION['talla_pedido'] : "";}
  
$original_tallas = $this->tallas;
$original_idpro = $this->idpro;
$original_idbod = $this->idbod;
$original_unidadmayor = $this->unidadmayor;
$original_factor = $this->factor;
$original_stockubica = $this->stockubica;
$original_unidad = $this->unidad;

$this->ver_stock();
$this->sc_set_focus('sabor');
if($this->tallas >0)
	{
	$this->sc_temp_talla_pedido=$this->tallas ;
	}


if (isset($this->sc_temp_talla_pedido)) { $_SESSION['talla_pedido'] = $this->sc_temp_talla_pedido;}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
$modificado_tallas = $this->tallas;
$modificado_idpro = $this->idpro;
$modificado_idbod = $this->idbod;
$modificado_unidadmayor = $this->unidadmayor;
$modificado_factor = $this->factor;
$modificado_stockubica = $this->stockubica;
$modificado_unidad = $this->unidad;
$this->nm_formatar_campos('tallas', 'idpro', 'idbod', 'unidadmayor', 'factor', 'stockubica', 'unidad');
if ($original_tallas !== $modificado_tallas || isset($this->nmgp_cmp_readonly['tallas']) || (isset($bFlagRead_tallas) && $bFlagRead_tallas))
{
    $this->ajax_return_values_tallas(true);
}
if ($original_idpro !== $modificado_idpro || isset($this->nmgp_cmp_readonly['idpro']) || (isset($bFlagRead_idpro) && $bFlagRead_idpro))
{
    $this->ajax_return_values_idpro(true);
}
if ($original_idbod !== $modificado_idbod || isset($this->nmgp_cmp_readonly['idbod']) || (isset($bFlagRead_idbod) && $bFlagRead_idbod))
{
    $this->ajax_return_values_idbod(true);
}
if ($original_unidadmayor !== $modificado_unidadmayor || isset($this->nmgp_cmp_readonly['unidadmayor']) || (isset($bFlagRead_unidadmayor) && $bFlagRead_unidadmayor))
{
    $this->ajax_return_values_unidadmayor(true);
}
if ($original_factor !== $modificado_factor || isset($this->nmgp_cmp_readonly['factor']) || (isset($bFlagRead_factor) && $bFlagRead_factor))
{
    $this->ajax_return_values_factor(true);
}
if ($original_stockubica !== $modificado_stockubica || isset($this->nmgp_cmp_readonly['stockubica']) || (isset($bFlagRead_stockubica) && $bFlagRead_stockubica))
{
    $this->ajax_return_values_stockubica(true);
}
if ($original_unidad !== $modificado_unidad || isset($this->nmgp_cmp_readonly['unidad']) || (isset($bFlagRead_unidad) && $bFlagRead_unidad))
{
    $this->ajax_return_values_unidad(true);
}
$this->NM_ajax_info['event_field'] = 'tallas';
form_detallepedido_220621_mob_pack_ajax_response();
exit;
}
function unidadmayor_onChange()
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_par_numero)) {$this->sc_temp_par_numero = (isset($_SESSION['par_numero'])) ? $_SESSION['par_numero'] : "";}
  
$original_unidadmayor = $this->unidadmayor;
$original_idpro = $this->idpro;
$original_valorunit = $this->valorunit;
$original_adicional1 = $this->adicional1;
$original_descuento = $this->descuento;
$original_valorpar = $this->valorpar;
$original_adicional = $this->adicional;
$original_iva = $this->iva;
$original_cantidad = $this->cantidad;
$original_idbod = $this->idbod;
$original_factor = $this->factor;
$original_stockubica = $this->stockubica;
$original_unidad = $this->unidad;

$fac=$this->sc_temp_par_numero;
$sql1="select idcli from pedidos where idpedido=$fac";
 
      $nm_select = $sql1; 
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
$ter=substr($this->des , 5);
$sql2="select listaprecios from terceros where idtercero=$ter";
 
      $nm_select = $sql2; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($this->dec = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dec = false;
          $this->dec_erro = $this->Db->ErrorMsg();
      } 
;
$lis=substr($this->dec , 12); 

if($this->unidadmayor =='NO')
{
	switch ($lis)
		{
		case 1:
		$sql="select preciomen from productos where idprod=$this->idpro ";
		 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->data = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
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
          $this->data_erro = $this->Db->ErrorMsg();
      } 
;
		if(!empty($this->data[0][0]))
			{
			$this->valorunit =$this->data[0][0];
			$this->sc_set_focus('cantidad');
			}
		
		break;

		case 2:
		$sql="select preciomen2 from productos where idprod=$this->idpro ";
		 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->data = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
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
          $this->data_erro = $this->Db->ErrorMsg();
      } 
;
		if(!empty($this->data[0][0]))
			{
			$this->valorunit =$this->data[0][0];
			$this->sc_set_focus('cantidad');
			}
		
		break;

		case 3:
		$sql="select preciomen3 from productos where idprod=$this->idpro ";
		 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->data = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
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
          $this->data_erro = $this->Db->ErrorMsg();
      } 
;
		if(!empty($this->data[0][0]))
			{
			$this->valorunit =$this->data[0][0];
			$this->sc_set_focus('cantidad');
			}
		break;

		}
}
else
	{
	switch ($lis)
		{
		case 1:
		$sql="select unidmaymen, preciomen, preciofull from productos where idprod=$this->idpro ";
		 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->data = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
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
          $this->data_erro = $this->Db->ErrorMsg();
      } 
;
		if($this->data[0][0]=='SI')
			{
			$this->valorunit =$this->data[0][2];
			$this->sc_set_focus('cantidad');
			}
		else
			{
			$this->unidadmayor ="NO";
			$this->nm_mens_alert[] = 'PRODUCTO NO MANEJA UNIDAD MAYOR/MENOR'; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert('PRODUCTO NO MANEJA UNIDAD MAYOR/MENOR'); }$this->valorunit =$this->data[0][1];
			$this->sc_set_focus('cantidad');
			}
		
		break;

		case 2:
		$sql="select unidmaymen, preciomen2, precio2  from productos where idprod=$this->idpro ";
		 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->data = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
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
          $this->data_erro = $this->Db->ErrorMsg();
      } 
;
		if($this->data[0][0]=='SI')
			{
			$this->valorunit =$this->data[0][2];
			$this->sc_set_focus('cantidad');
			}
		else
			{
			$this->unidadmayor ="NO";
			$this->nm_mens_alert[] = 'PRODUCTO NO MANEJA UNIDAD MAYOR/MENOR'; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert('PRODUCTO NO MANEJA UNIDAD MAYOR/MENOR'); }$this->valorunit =$this->data[0][1];
			$this->sc_set_focus('cantidad');
			}
		break;

		case 3:
		$sql="select unidmaymen, preciomen3, preciomay from productos where idprod=$this->idpro ";
		 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->data = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
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
          $this->data_erro = $this->Db->ErrorMsg();
      } 
;
		if($this->data[0][0]=='SI')
			{
			$this->valorunit =$this->data[0][2];
			$this->sc_set_focus('cantidad');
			}
		else
			{
			$this->unidadmayor ="NO";
			$this->nm_mens_alert[] = 'PRODUCTO NO MANEJA UNIDAD MAYOR/MENOR'; $this->nm_params_alert[] = array(); if ($this->NM_ajax_flag) { $this->sc_ajax_alert('PRODUCTO NO MANEJA UNIDAD MAYOR/MENOR'); }$this->valorunit =$this->data[0][1];
			$this->sc_set_focus('cantidad');
			}
		break;

		}
	}
$this->calcula_parcial();
$this->calcula_descuento();
$this->calcula_iva();
$this->ver_stock();



if (isset($this->sc_temp_par_numero)) { $_SESSION['par_numero'] = $this->sc_temp_par_numero;}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
$modificado_unidadmayor = $this->unidadmayor;
$modificado_idpro = $this->idpro;
$modificado_valorunit = $this->valorunit;
$modificado_adicional1 = $this->adicional1;
$modificado_descuento = $this->descuento;
$modificado_valorpar = $this->valorpar;
$modificado_adicional = $this->adicional;
$modificado_iva = $this->iva;
$modificado_cantidad = $this->cantidad;
$modificado_idbod = $this->idbod;
$modificado_factor = $this->factor;
$modificado_stockubica = $this->stockubica;
$modificado_unidad = $this->unidad;
$this->nm_formatar_campos('unidadmayor', 'idpro', 'valorunit', 'adicional1', 'descuento', 'valorpar', 'adicional', 'iva', 'cantidad', 'idbod', 'factor', 'stockubica', 'unidad');
if ($original_unidadmayor !== $modificado_unidadmayor || isset($this->nmgp_cmp_readonly['unidadmayor']) || (isset($bFlagRead_unidadmayor) && $bFlagRead_unidadmayor))
{
    $this->ajax_return_values_unidadmayor(true);
}
if ($original_idpro !== $modificado_idpro || isset($this->nmgp_cmp_readonly['idpro']) || (isset($bFlagRead_idpro) && $bFlagRead_idpro))
{
    $this->ajax_return_values_idpro(true);
}
if ($original_valorunit !== $modificado_valorunit || isset($this->nmgp_cmp_readonly['valorunit']) || (isset($bFlagRead_valorunit) && $bFlagRead_valorunit))
{
    $this->ajax_return_values_valorunit(true);
}
if ($original_adicional1 !== $modificado_adicional1 || isset($this->nmgp_cmp_readonly['adicional1']) || (isset($bFlagRead_adicional1) && $bFlagRead_adicional1))
{
    $this->ajax_return_values_adicional1(true);
}
if ($original_descuento !== $modificado_descuento || isset($this->nmgp_cmp_readonly['descuento']) || (isset($bFlagRead_descuento) && $bFlagRead_descuento))
{
    $this->ajax_return_values_descuento(true);
}
if ($original_valorpar !== $modificado_valorpar || isset($this->nmgp_cmp_readonly['valorpar']) || (isset($bFlagRead_valorpar) && $bFlagRead_valorpar))
{
    $this->ajax_return_values_valorpar(true);
}
if ($original_adicional !== $modificado_adicional || isset($this->nmgp_cmp_readonly['adicional']) || (isset($bFlagRead_adicional) && $bFlagRead_adicional))
{
    $this->ajax_return_values_adicional(true);
}
if ($original_iva !== $modificado_iva || isset($this->nmgp_cmp_readonly['iva']) || (isset($bFlagRead_iva) && $bFlagRead_iva))
{
    $this->ajax_return_values_iva(true);
}
if ($original_cantidad !== $modificado_cantidad || isset($this->nmgp_cmp_readonly['cantidad']) || (isset($bFlagRead_cantidad) && $bFlagRead_cantidad))
{
    $this->ajax_return_values_cantidad(true);
}
if ($original_idbod !== $modificado_idbod || isset($this->nmgp_cmp_readonly['idbod']) || (isset($bFlagRead_idbod) && $bFlagRead_idbod))
{
    $this->ajax_return_values_idbod(true);
}
if ($original_factor !== $modificado_factor || isset($this->nmgp_cmp_readonly['factor']) || (isset($bFlagRead_factor) && $bFlagRead_factor))
{
    $this->ajax_return_values_factor(true);
}
if ($original_stockubica !== $modificado_stockubica || isset($this->nmgp_cmp_readonly['stockubica']) || (isset($bFlagRead_stockubica) && $bFlagRead_stockubica))
{
    $this->ajax_return_values_stockubica(true);
}
if ($original_unidad !== $modificado_unidad || isset($this->nmgp_cmp_readonly['unidad']) || (isset($bFlagRead_unidad) && $bFlagRead_unidad))
{
    $this->ajax_return_values_unidad(true);
}
$this->NM_ajax_info['event_field'] = 'unidadmayor';
form_detallepedido_220621_mob_pack_ajax_response();
exit;
}
function update_master()
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
  
$tiva   = 0;
$vtotal = 0;
$vsub   = 0;
$vdesc  = 0;

if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco)
{
    $this->Ini->sc_tem_trans_banco = $this->Db->BeginTrans();
}


$sql="SELECT sum(valorpar), sum(iva), sum(descuento) FROM detallepedido WHERE idpedid=$this->idpedid ";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dstotales = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dstotales[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dstotales = false;
          $this->dstotales_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->dstotales[0][0]))
{
	if($this->dstotales[0][0]>0)
	{
		if($this->dstotales[0][2]>0)
		{
			$vtotal=$this->dstotales[0][0]-$this->dstotales[0][2];
			$vdesc=$this->dstotales[0][2];
		}
		else
		{
			$vtotal=$this->dstotales[0][0];
		}
		
		if($this->dstotales[0][1]>0)
		{
			$tiva=$this->dstotales[0][1];
			$vsub=$total-$this->iva;
		}

	
		
     $nm_select ="UPDATE pedidos SET total=$vtotal, saldo=$vtotal, subtotal=$vsub, valoriva=$tiva, adicional=$vdesc WHERE idpedido=$this->idpedid "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_detallepedido_220621_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
		
		$vtotal= number_format($vtotal,0,",",".");
		$tiva= number_format($tiva,0,",",".");
		$vsub= number_format($vsub,0,",",".");
		$vdesc= number_format($vdesc,0,",",".");
		

		$this->sc_master_value('total', $vtotal);
		$this->sc_master_value('saldo', $vtotal);
		$this->sc_master_value('subtotal', $vsub);
		$this->sc_master_value('valoriva', $tiva);
		$this->sc_master_value('adicional', $vdesc);
	}

	else
	{
		
     $nm_select ="UPDATE pedidos SET total=0, saldo=0, subtotal=0, valoriva=0, adicional=0 WHERE idpedido=$this->idpedid "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_detallepedido_220621_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

		$this->sc_master_value('total', 0);
		$this->sc_master_value('saldo', 0);
		$this->sc_master_value('subtotal', 0);
		$this->sc_master_value('valoriva', 0);
		$this->sc_master_value('adicional', 0);
	}
}
else
{
	
     $nm_select ="UPDATE pedidos SET total=0, saldo=0, subtotal=0, valoriva=0, adicional=0 WHERE idpedido=$this->idpedid "; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_detallepedido_220621_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

	$this->sc_master_value('total', 0);
	$this->sc_master_value('saldo', 0);
	$this->sc_master_value('subtotal', 0);
	$this->sc_master_value('valoriva', 0);
	$this->sc_master_value('adicional', 0);
}
if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
}
function valorunit_onChange()
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
  
$original_valorunit = $this->valorunit;
$original_costop = $this->costop;
$original_idpro = $this->idpro;
$original_adicional1 = $this->adicional1;
$original_descuento = $this->descuento;
$original_valorpar = $this->valorpar;
$original_adicional = $this->adicional;
$original_iva = $this->iva;
$original_cantidad = $this->cantidad;
$original_idbod = $this->idbod;
$original_unidadmayor = $this->unidadmayor;
$original_factor = $this->factor;
$original_stockubica = $this->stockubica;
$original_unidad = $this->unidad;

if($this->valorunit <$this->costop )
	{
	
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "¡Valor unitario inferior al costo!";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_form_detallepedido_220621_mob';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_detallepedido_220621_mob';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "¡Valor unitario inferior al costo!";
 }
;
	$this->sc_set_focus('valorunit');
	}
$this->calcula_parcial();
$this->calcula_descuento();
$this->calcula_iva();
$this->ver_stock();

$modificado_valorunit = $this->valorunit;
$modificado_costop = $this->costop;
$modificado_idpro = $this->idpro;
$modificado_adicional1 = $this->adicional1;
$modificado_descuento = $this->descuento;
$modificado_valorpar = $this->valorpar;
$modificado_adicional = $this->adicional;
$modificado_iva = $this->iva;
$modificado_cantidad = $this->cantidad;
$modificado_idbod = $this->idbod;
$modificado_unidadmayor = $this->unidadmayor;
$modificado_factor = $this->factor;
$modificado_stockubica = $this->stockubica;
$modificado_unidad = $this->unidad;
$this->nm_formatar_campos('valorunit', 'costop', 'idpro', 'adicional1', 'descuento', 'valorpar', 'adicional', 'iva', 'cantidad', 'idbod', 'unidadmayor', 'factor', 'stockubica', 'unidad');
if ($original_valorunit !== $modificado_valorunit || isset($this->nmgp_cmp_readonly['valorunit']) || (isset($bFlagRead_valorunit) && $bFlagRead_valorunit))
{
    $this->ajax_return_values_valorunit(true);
}
if ($original_costop !== $modificado_costop || isset($this->nmgp_cmp_readonly['costop']) || (isset($bFlagRead_costop) && $bFlagRead_costop))
{
    $this->ajax_return_values_costop(true);
}
if ($original_idpro !== $modificado_idpro || isset($this->nmgp_cmp_readonly['idpro']) || (isset($bFlagRead_idpro) && $bFlagRead_idpro))
{
    $this->ajax_return_values_idpro(true);
}
if ($original_adicional1 !== $modificado_adicional1 || isset($this->nmgp_cmp_readonly['adicional1']) || (isset($bFlagRead_adicional1) && $bFlagRead_adicional1))
{
    $this->ajax_return_values_adicional1(true);
}
if ($original_descuento !== $modificado_descuento || isset($this->nmgp_cmp_readonly['descuento']) || (isset($bFlagRead_descuento) && $bFlagRead_descuento))
{
    $this->ajax_return_values_descuento(true);
}
if ($original_valorpar !== $modificado_valorpar || isset($this->nmgp_cmp_readonly['valorpar']) || (isset($bFlagRead_valorpar) && $bFlagRead_valorpar))
{
    $this->ajax_return_values_valorpar(true);
}
if ($original_adicional !== $modificado_adicional || isset($this->nmgp_cmp_readonly['adicional']) || (isset($bFlagRead_adicional) && $bFlagRead_adicional))
{
    $this->ajax_return_values_adicional(true);
}
if ($original_iva !== $modificado_iva || isset($this->nmgp_cmp_readonly['iva']) || (isset($bFlagRead_iva) && $bFlagRead_iva))
{
    $this->ajax_return_values_iva(true);
}
if ($original_cantidad !== $modificado_cantidad || isset($this->nmgp_cmp_readonly['cantidad']) || (isset($bFlagRead_cantidad) && $bFlagRead_cantidad))
{
    $this->ajax_return_values_cantidad(true);
}
if ($original_idbod !== $modificado_idbod || isset($this->nmgp_cmp_readonly['idbod']) || (isset($bFlagRead_idbod) && $bFlagRead_idbod))
{
    $this->ajax_return_values_idbod(true);
}
if ($original_unidadmayor !== $modificado_unidadmayor || isset($this->nmgp_cmp_readonly['unidadmayor']) || (isset($bFlagRead_unidadmayor) && $bFlagRead_unidadmayor))
{
    $this->ajax_return_values_unidadmayor(true);
}
if ($original_factor !== $modificado_factor || isset($this->nmgp_cmp_readonly['factor']) || (isset($bFlagRead_factor) && $bFlagRead_factor))
{
    $this->ajax_return_values_factor(true);
}
if ($original_stockubica !== $modificado_stockubica || isset($this->nmgp_cmp_readonly['stockubica']) || (isset($bFlagRead_stockubica) && $bFlagRead_stockubica))
{
    $this->ajax_return_values_stockubica(true);
}
if ($original_unidad !== $modificado_unidad || isset($this->nmgp_cmp_readonly['unidad']) || (isset($bFlagRead_unidad) && $bFlagRead_unidad))
{
    $this->ajax_return_values_unidad(true);
}
$this->NM_ajax_info['event_field'] = 'valorunit';
form_detallepedido_220621_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
}
function ver_stock()
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_sabor_pedido)) {$this->sc_temp_sabor_pedido = (isset($_SESSION['sabor_pedido'])) ? $_SESSION['sabor_pedido'] : "";}
if (!isset($this->sc_temp_talla_pedido)) {$this->sc_temp_talla_pedido = (isset($_SESSION['talla_pedido'])) ? $_SESSION['talla_pedido'] : "";}
if (!isset($this->sc_temp_color_pedido)) {$this->sc_temp_color_pedido = (isset($_SESSION['color_pedido'])) ? $_SESSION['color_pedido'] : "";}
  
$gru=$this->consulta_grupo();
if($gru==0)
	{
if(!empty($this->idpro ))
	{
$sql="SELECT SUM(cantidad) AS cantidad FROM inventario
WHERE idpro = $this->idpro  AND idbod=$this->idbod  and colores=$this->sc_temp_color_pedido and tallas=$this->sc_temp_talla_pedido and sabor=$this->sc_temp_sabor_pedido";
 
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
if(!empty($this->ds[0][0]))
	{
	if($this->unidadmayor =='NO' and $this->factor >0)
		{
		$this->stockubica =$this->ds[0][0]*$this->factor ;
		 
      $nm_select = "select unimen from productos where idprod=$this->idpro "; 
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
		$this->unidad =substr($this->dt , 6);
		}
	else if($this->unidadmayor =='SI')
		{
		$this->stockubica =$this->ds[0][0];
		 
      $nm_select = "select unimay from productos where idprod=$this->idpro "; 
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
		$this->unidad =substr($this->dt , 6);
		}
	if($this->unidadmayor =='NO' and $this->factor ==0)
		{
		$this->stockubica =$this->ds[0][0];
		 
      $nm_select = "select unimen from productos where idprod=$this->idpro "; 
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
		$this->unidad =substr($this->dt , 6);
		}
	}else
		{
		$this->stockubica =0;
		$this->unidad ='';
		}
	}
	}
}
if (isset($this->sc_temp_color_pedido)) { $_SESSION['color_pedido'] = $this->sc_temp_color_pedido;}
if (isset($this->sc_temp_talla_pedido)) { $_SESSION['talla_pedido'] = $this->sc_temp_talla_pedido;}
if (isset($this->sc_temp_sabor_pedido)) { $_SESSION['sabor_pedido'] = $this->sc_temp_sabor_pedido;}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
}
function fGestionaStock($iddet,$tipo,$tipodoc)
{
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'on';
  
	if(!empty($this->iddet))
	{	
		$vsqldetalle = "select 
						cantidad,
						idpro,
						costop,
						valorpar,
						idbod,
						idpedid 
						from 
						detallepedido
						where 
						iddet='".$iddet."'
						";

		 
      $nm_select = $vsqldetalle; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDatosDetalle = array();
      $this->vdatosdetalle = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vDatosDetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vdatosdetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDatosDetalle = false;
          $this->vDatosDetalle_erro = $this->Db->ErrorMsg();
          $this->vdatosdetalle = false;
          $this->vdatosdetalle_erro = $this->Db->ErrorMsg();
      } 
;

		if(isset($this->vdatosdetalle[0][0]))
		{
			$vcantidad = $this->vdatosdetalle[0][0];
			$vidpro    = $this->vdatosdetalle[0][1];
			$vcosto    = $this->vdatosdetalle[0][2];
			$vvalorpar = $this->vdatosdetalle[0][3];
			$vidbod    = $this->vdatosdetalle[0][4];
			$vidpedid  = $this->vdatosdetalle[0][5];
			$vtipo     = $tipo;
			$vdetalle  = "Venta Restaurante";
			$vidmov    = 1;
			$vfecha    = date("Y-m-d");
		}

		switch($tipo)
		{
			case 1:

				 
      $nm_select = "select 
									  escombo,
									  idprod 
									  from 
									  productos 
									  where 
									  idprod='".$vidpro."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->siEsCombo = array();
      $this->siescombo = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->siEsCombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->siescombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->siEsCombo = false;
          $this->siEsCombo_erro = $this->Db->ErrorMsg();
          $this->siescombo = false;
          $this->siescombo_erro = $this->Db->ErrorMsg();
      } 
;

				if(isset($this->siescombo[0][0]))
				{
					if($this->siescombo[0][0]=="SI")
					{
						 
      $nm_select = "select 
											   idcombo,
											   idproducto,
											   cantidad,
											   precio 
											   from 
											   detallecombos 
											   where 
											   idcombo='".$vidpro."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->listaCombo = array();
      $this->listacombo = array();
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
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->listaCombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->listacombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->listaCombo = false;
          $this->listaCombo_erro = $this->Db->ErrorMsg();
          $this->listacombo = false;
          $this->listacombo_erro = $this->Db->ErrorMsg();
      } 
;

						if(isset($this->listacombo[0][0]))
						{
							for($i=0;$i<count($this->listacombo );$i++)
							{
								 
      $nm_select = "select 
														 sum(cantidad)*-1 
														 from 
														 inventario 
														 where 
															 idpro='".$this->listacombo[$i][1] ."' 
														 and idped='".$vidpedid."' 
														 and iddetalle='".$iddet."' 
														 and idcombo='".$vidpro."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vCantidadPro = array();
      $this->vcantidadpro = array();
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
                      $this->vCantidadPro[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vcantidadpro[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vCantidadPro = false;
          $this->vCantidadPro_erro = $this->Db->ErrorMsg();
          $this->vcantidadpro = false;
          $this->vcantidadpro_erro = $this->Db->ErrorMsg();
      } 
;

								if(isset($this->vcantidadpro[0][0]))
								{
									$vsqlstock2="UPDATE 
											   productos 
											   SET 
											   stockmen = (stockmen+".$this->vcantidadpro[0][0].")
											   WHERE 
											   idprod='".$this->listacombo[$i][1]."'
											   ";
									
     $nm_select = $vsqlstock2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_detallepedido_220621_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
								}
							}
							
							for($i=0;$i<count($this->listacombo );$i++)
							{
								
								
     $nm_select ="delete  											from  											inventario  											where  												 idpro='".$this->listacombo[$i][1] ."'  											and idped='".$vidpedid."'  											and iddetalle='".$iddet."'  											and idcombo='".$vidpro."'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_detallepedido_220621_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						}
					}
				}

				$vsqlinv="delete 
						  from 
						  inventario 
						  where 
							  idpro='".$vidpro."' 
						  and idped='".$vidpedid."' 
						  and detalle like '%Venta Restaurante%' 
						  and iddetalle='".$iddet."'
						  ";

				
     $nm_select = $vsqlinv; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_detallepedido_220621_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

				$vsqlstock="UPDATE 
					   productos 
					   SET 
					   stockmen = stockmen+$vcantidad 
					   WHERE 
					   idprod='".$vidpro."'
					   ";

				
     $nm_select = $vsqlstock; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_detallepedido_220621_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
			break;

			case 2:
				$vsqlinv = "INSERT 
					  inventario 
					  SET 
					  fecha		   ='".$vfecha."', 
					  cantidad	   =(".$vcantidad."*-1), 
					  idpro		   ='".$vidpro."', 
					  costo		   ='".$vcosto."',
					  valorparcial ='".$vvalorpar."', 
					  idbod        ='".$vidbod."', 
					  tipo		   ='".$vtipo."', 
					  detalle	   ='".$vdetalle."', 
					  idmov		   ='".$vidmov."',
					  idped  	   ='".$vidpedid."', 
					  iddetalle	   ='".$iddet."'
					  ";

				
     $nm_select = $vsqlinv; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_detallepedido_220621_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

				$vsqlstock="UPDATE 
					   productos 
					   SET 
					   stockmen = stockmen-$vcantidad
					   WHERE 
					   idprod='".$vidpro."'
					   ";

				
     $nm_select = $vsqlstock; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_detallepedido_220621_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

				 
      $nm_select = "select escombo,costomen from productos where idprod='".$vidpro."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->siEsCombo = array();
      $this->siescombo = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->siEsCombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->siescombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->siEsCombo = false;
          $this->siEsCombo_erro = $this->Db->ErrorMsg();
          $this->siescombo = false;
          $this->siescombo_erro = $this->Db->ErrorMsg();
      } 
;

				if(isset($this->siescombo[0][0]))
				{
					if($this->siescombo[0][0]=="SI")
					{

						 
      $nm_select = "select 
											   idcombo,
											   idproducto,
											   cantidad,
											   precio 
											   from 
											   detallecombos 
											   where 
											   idcombo='".$vidpro."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->listaCombo = array();
      $this->listacombo = array();
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
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->listaCombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->listacombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->listaCombo = false;
          $this->listaCombo_erro = $this->Db->ErrorMsg();
          $this->listacombo = false;
          $this->listacombo_erro = $this->Db->ErrorMsg();
      } 
;

						if(isset($this->listacombo[0][0]))
						{
							for($i=0;$i<count($this->listacombo );$i++)
							{
								

								$vsqlinv2 = "INSERT 
									  inventario 
									  SET 
									  fecha		   ='".$vfecha."', 
									  cantidad	   =((".$vcantidad."*".$this->listacombo[$i][2].")*-1), 
									  idpro		   ='".$this->listacombo[$i][1]."', 
									  costo		   ='".$this->siescombo[0][1]."',
									  valorparcial ='".($this->listacombo[$i][2]*$this->listacombo[$i][3])."', 
									  idbod        ='".$vidbod."', 
									  tipo		   ='".$vtipo."', 
									  detalle	   ='".$vdetalle."', 
									  idmov		   ='".$vidmov."',
									  idped  	   ='".$vidpedid."',
									  iddetalle	   ='".$iddet."',
									  idcombo      = '".$vidpro."'
									  ";

								
     $nm_select = $vsqlinv2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_detallepedido_220621_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;

								$vsqlstock2="UPDATE 
									   productos 
									   SET 
									   stockmen = stockmen-(".$vcantidad."*".$this->listacombo[$i][2].")
									   WHERE 
									   idprod='".$this->listacombo[$i][1]."'
									   ";

								
     $nm_select = $vsqlstock2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_detallepedido_220621_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
							}
						}
					}
				}
			break;

			case 3:

				if($vcantidad > 0)
				{
					 
      $nm_select = "select
												  cantidad
												  from
												  inventario
												  where 
													  iddetalle='".$iddet."'
												  and idped='".$vidpedid."' 
												  and idpro='".$vidpro."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vCantAnterior = array();
      $this->vcantanterior = array();
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
                      $this->vCantAnterior[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vcantanterior[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vCantAnterior = false;
          $this->vCantAnterior_erro = $this->Db->ErrorMsg();
          $this->vcantanterior = false;
          $this->vcantanterior_erro = $this->Db->ErrorMsg();
      } 
;
					
					if(isset($this->vcantanterior[0][0]))
					{
						$vsqlinv = "UPDATE
								  inventario 
								  SET 
								  cantidad = (".$vcantidad."*-1)
								  where 
									  iddetalle='".$iddet."'
								  and idped='".$vidpedid."' 
								  and idpro='".$vidpro."'
								  ";

						
     $nm_select = $vsqlinv; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_detallepedido_220621_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
						
						$vcantidadanterior = $this->vcantanterior[0][0]*-1;

						$vsqlstock="UPDATE 
								   productos 
								   SET 
								   stockmen = stockmen+".$vcantidadanterior."
								   WHERE 
								   idprod='".$vidpro."'
								   ";

						
     $nm_select = $vsqlstock; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_detallepedido_220621_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
						
						$vsqlstock="UPDATE 
								   productos 
								   SET 
								   stockmen = (stockmen-".$vcantidad.")
								   WHERE 
								   idprod='".$vidpro."'
								   ";

						
     $nm_select = $vsqlstock; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_detallepedido_220621_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
						
						 
      $nm_select = "select 
											  escombo,
											  costomen 
											  from 
											  productos 
											  where 
											  idprod='".$vidpro."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->siEsCombo = array();
      $this->siescombo = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->siEsCombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->siescombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->siEsCombo = false;
          $this->siEsCombo_erro = $this->Db->ErrorMsg();
          $this->siescombo = false;
          $this->siescombo_erro = $this->Db->ErrorMsg();
      } 
;

						if(isset($this->siescombo[0][0]))
						{
							if($this->siescombo[0][0]=="SI")
							{
								 
      $nm_select = "select 
													   idcombo,
													   idproducto,
													   cantidad,
													   precio 
													   from 
													   detallecombos 
													   where 
													   idcombo='".$vidpro."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->listaCombo = array();
      $this->listacombo = array();
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
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->listaCombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->listacombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->listaCombo = false;
          $this->listaCombo_erro = $this->Db->ErrorMsg();
          $this->listacombo = false;
          $this->listacombo_erro = $this->Db->ErrorMsg();
      } 
;

								if(isset($this->listacombo[0][0]))
								{

									for($i=0;$i<count($this->listacombo );$i++)
									{
										 
      $nm_select = "select
																	  cantidad
																	  from
																	  inventario
																	  where 
																		  iddetalle='".$iddet."'
																	  and idped='".$vidpedid."' 
																	  and idpro='".$this->listacombo[$i][1] ."'
																	  and idcombo='".$vidpro."'
																	  "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vCantAnterior2 = array();
      $this->vcantanterior2 = array();
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
                      $this->vCantAnterior2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vcantanterior2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vCantAnterior2 = false;
          $this->vCantAnterior2_erro = $this->Db->ErrorMsg();
          $this->vcantanterior2 = false;
          $this->vcantanterior2_erro = $this->Db->ErrorMsg();
      } 
;
										
										if(isset($this->vcantanterior2[0][0]))
										{
											
											$vsqlinv2 = "UPDATE
													  inventario 
													  SET 
													  cantidad = ((".$vcantidad."*".$this->listacombo[$i][2].")*-1)
													  where 
														  iddetalle='".$iddet."'
													  and idped='".$vidpedid."' 
													  and idpro='".$vidpro."'
													  ";

											
     $nm_select = $vsqlinv2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_detallepedido_220621_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
											
											$vcantidadanterior2 = $this->vcantanterior2[0][0]*-1;

											$vsqlstock2="UPDATE 
													   productos 
													   SET 
													   stockmen = stockmen+(".$vcantidadanterior2."*".$this->listacombo[$i][2].")
													   WHERE 
													   idprod='".$this->listacombo[$i][1]."'
													   ";

											
     $nm_select = $vsqlstock2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_detallepedido_220621_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
											
											$vsqlstock2="UPDATE 
													   productos 
													   SET 
													   stockmen = stockmen-(".$vcantidad."*".$this->listacombo[$i][2].")
													   WHERE 
													   idprod='".$this->listacombo[$i][1]."'
													   ";

											
     $nm_select = $vsqlstock2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_detallepedido_220621_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
										}
									}
								}
							}
						}
					}
				}

			break;
		}
	}
$_SESSION['scriptcase']['form_detallepedido_220621_mob']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_detallepedido_220621_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_detallepedido_220621_mob_form0.php");
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("iddet", "numfac", "idpro", "idbod", "cantidad", "valorunit", "valorpar", "iva", "descuento", "adicional", "adicional1", "adicional2"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['csrf_token'];
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

   function Form_lookup_idbod()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod'] = array(); 
    }

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_adicional = $this->adicional;
   $old_value_descuento = $this->descuento;
   $old_value_valorpar = $this->valorpar;
   $old_value_stockubica = $this->stockubica;
   $old_value_iddet = $this->iddet;
   $old_value_adicional1 = $this->adicional1;
   $old_value_factor = $this->factor;
   $old_value_iva = $this->iva;
   $old_value_costop = $this->costop;
   $old_value_idpedid = $this->idpedid;
   $this->nm_tira_formatacao();


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_stockubica = $this->stockubica;
   $unformatted_value_iddet = $this->iddet;
   $unformatted_value_adicional1 = $this->adicional1;
   $unformatted_value_factor = $this->factor;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_costop = $this->costop;
   $unformatted_value_idpedid = $this->idpedid;

   $nm_comando = "SELECT idbodega, bodega  FROM bodegas  ORDER BY bodega";

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->adicional = $old_value_adicional;
   $this->descuento = $old_value_descuento;
   $this->valorpar = $old_value_valorpar;
   $this->stockubica = $old_value_stockubica;
   $this->iddet = $old_value_iddet;
   $this->adicional1 = $old_value_adicional1;
   $this->factor = $old_value_factor;
   $this->iva = $old_value_iva;
   $this->costop = $old_value_costop;
   $this->idpedid = $old_value_idpedid;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_idbod'][] = $rs->fields[0];
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
   function Form_lookup_unidadmayor()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "NO?#?NO?#??@?";
       $nmgp_def_dados .= "SI?#?SI?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_colores()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores'] = array(); 
}
if ($this->idpro != "")
{ 
   $this->nm_clear_val("idpro");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores'] = array(); 
    }

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_adicional = $this->adicional;
   $old_value_descuento = $this->descuento;
   $old_value_valorpar = $this->valorpar;
   $old_value_stockubica = $this->stockubica;
   $old_value_iddet = $this->iddet;
   $old_value_adicional1 = $this->adicional1;
   $old_value_factor = $this->factor;
   $old_value_iva = $this->iva;
   $old_value_costop = $this->costop;
   $old_value_idpedid = $this->idpedid;
   $this->nm_tira_formatacao();


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_stockubica = $this->stockubica;
   $unformatted_value_iddet = $this->iddet;
   $unformatted_value_adicional1 = $this->adicional1;
   $unformatted_value_factor = $this->factor;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_costop = $this->costop;
   $unformatted_value_idpedid = $this->idpedid;

   $nm_comando = "SELECT f.idcol, c.color  FROM colorxproducto f left join colores c on f.idcol=c.idcolores where idpr=$this->idpro ORDER BY f.idcol";

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->adicional = $old_value_adicional;
   $this->descuento = $old_value_descuento;
   $this->valorpar = $old_value_valorpar;
   $this->stockubica = $old_value_stockubica;
   $this->iddet = $old_value_iddet;
   $this->adicional1 = $old_value_adicional1;
   $this->factor = $old_value_factor;
   $this->iva = $old_value_iva;
   $this->costop = $old_value_costop;
   $this->idpedid = $old_value_idpedid;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_colores'][] = $rs->fields[0];
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
   function Form_lookup_tallas()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas'] = array(); 
}
if ($this->idpro != "")
{ 
   $this->nm_clear_val("idpro");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas'] = array(); 
    }

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_adicional = $this->adicional;
   $old_value_descuento = $this->descuento;
   $old_value_valorpar = $this->valorpar;
   $old_value_stockubica = $this->stockubica;
   $old_value_iddet = $this->iddet;
   $old_value_adicional1 = $this->adicional1;
   $old_value_factor = $this->factor;
   $old_value_iva = $this->iva;
   $old_value_costop = $this->costop;
   $old_value_idpedid = $this->idpedid;
   $this->nm_tira_formatacao();


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_stockubica = $this->stockubica;
   $unformatted_value_iddet = $this->iddet;
   $unformatted_value_adicional1 = $this->adicional1;
   $unformatted_value_factor = $this->factor;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_costop = $this->costop;
   $unformatted_value_idpedid = $this->idpedid;

   $nm_comando = "SELECT f.idta, t.tamaño FROM tallaxproducto f left join tallas t on f.idta=t.idtallas where idpr=$this->idpro ORDER BY f.idta";

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->adicional = $old_value_adicional;
   $this->descuento = $old_value_descuento;
   $this->valorpar = $old_value_valorpar;
   $this->stockubica = $old_value_stockubica;
   $this->iddet = $old_value_iddet;
   $this->adicional1 = $old_value_adicional1;
   $this->factor = $old_value_factor;
   $this->iva = $old_value_iva;
   $this->costop = $old_value_costop;
   $this->idpedid = $old_value_idpedid;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_tallas'][] = $rs->fields[0];
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
   function Form_lookup_sabor()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor'] = array(); 
}
if ($this->idpro != "")
{ 
   $this->nm_clear_val("idpro");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor'] = array(); 
    }

   $old_value_cantidad = $this->cantidad;
   $old_value_valorunit = $this->valorunit;
   $old_value_adicional = $this->adicional;
   $old_value_descuento = $this->descuento;
   $old_value_valorpar = $this->valorpar;
   $old_value_stockubica = $this->stockubica;
   $old_value_iddet = $this->iddet;
   $old_value_adicional1 = $this->adicional1;
   $old_value_factor = $this->factor;
   $old_value_iva = $this->iva;
   $old_value_costop = $this->costop;
   $old_value_idpedid = $this->idpedid;
   $this->nm_tira_formatacao();


   $unformatted_value_cantidad = $this->cantidad;
   $unformatted_value_valorunit = $this->valorunit;
   $unformatted_value_adicional = $this->adicional;
   $unformatted_value_descuento = $this->descuento;
   $unformatted_value_valorpar = $this->valorpar;
   $unformatted_value_stockubica = $this->stockubica;
   $unformatted_value_iddet = $this->iddet;
   $unformatted_value_adicional1 = $this->adicional1;
   $unformatted_value_factor = $this->factor;
   $unformatted_value_iva = $this->iva;
   $unformatted_value_costop = $this->costop;
   $unformatted_value_idpedid = $this->idpedid;

   $nm_comando = "SELECT f.idsa, t.tamaño FROM saborxproducto f left join tallas t on f.idsa=t.idtallas where idpr=$this->idpro and tallasabor='S' ORDER BY f.idsa";

   $this->cantidad = $old_value_cantidad;
   $this->valorunit = $old_value_valorunit;
   $this->adicional = $old_value_adicional;
   $this->descuento = $old_value_descuento;
   $this->valorpar = $old_value_valorpar;
   $this->stockubica = $old_value_stockubica;
   $this->iddet = $old_value_iddet;
   $this->adicional1 = $old_value_adicional1;
   $this->factor = $old_value_factor;
   $this->iva = $old_value_iva;
   $this->costop = $old_value_costop;
   $this->idpedid = $old_value_idpedid;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['Lookup_sabor'][] = $rs->fields[0];
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
   function Form_lookup_autorizarborrado()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?s?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_detallepedido_220621_mob_pack_ajax_response();
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
              $data_lookup = $this->SC_lookup_idpro($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "idpro", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_idbod($arg_search, $data_search);
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
              $this->SC_monta_condicao($comando, "adicional", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "adicional1", $arg_search, str_replace(",", ".", $data_search));
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_filter_form'] . " and (idpedid='" . $_SESSION['gidpedido'] . "') and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where idpedid='" . $_SESSION['gidpedido'] . "' and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_detallepedido_220621_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['total'] = $qt_geral_reg_form_detallepedido_220621_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_detallepedido_220621_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_detallepedido_220621_mob_pack_ajax_response();
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
      $nm_numeric[] = "iddet";$nm_numeric[] = "idpedid";$nm_numeric[] = "numfac";$nm_numeric[] = "remision";$nm_numeric[] = "idpro";$nm_numeric[] = "factor";$nm_numeric[] = "idbod";$nm_numeric[] = "costop";$nm_numeric[] = "cantidad";$nm_numeric[] = "valorunit";$nm_numeric[] = "valorpar";$nm_numeric[] = "iva";$nm_numeric[] = "descuento";$nm_numeric[] = "adicional";$nm_numeric[] = "adicional1";$nm_numeric[] = "devuelto";$nm_numeric[] = "colores";$nm_numeric[] = "tallas";$nm_numeric[] = "sabor";$nm_numeric[] = "tercero_comanda";$nm_numeric[] = "";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['decimal_db'] == ".")
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
      $Nm_datas['hora_inicio'] = "timestamp";$Nm_datas['hora_final'] = "timestamp";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['SC_sep_date1'];
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
   function SC_lookup_idpro($condicao, $campo)
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
   function SC_lookup_idbod($condicao, $campo)
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
       $nmgp_saida_form = "form_detallepedido_220621_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_detallepedido_220621_mob_fim.php";
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
       form_detallepedido_220621_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['masterValue']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['opc_ant'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_detallepedido_220621_mob_pack_ajax_response();
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
       form_detallepedido_220621_mob_pack_ajax_response();
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
                        'idpro' => 'idpro',
                        'descrip' => 'descrip',
                        'idbod' => 'idbod',
                        'unidad' => 'unidad',
                        'cantidad' => 'cantidad',
                        'valorunit' => 'valorunit',
                        'adicional' => 'adicional',
                        'descuento' => 'descuento',
                        'valorpar' => 'valorpar',
                        'unidadmayor' => 'unidadmayor',
                        'stockubica' => 'stockubica',
                        'obs' => 'obs',
                        'iddet' => 'iddet',
                        'colores' => 'colores',
                        'tallas' => 'tallas',
                        'sabor' => 'sabor',
                        'adicional1' => 'adicional1',
                        'factor' => 'factor',
                        'iva' => 'iva',
                        'costop' => 'costop',
                        'autorizarborrado' => 'autorizarborrado',
                        'estado_comanda' => 'estado_comanda',
                        'idpedid' => 'idpedid',
                       );
        if (isset($aFocus[$sFieldName]))
        {
            $this->NM_ajax_info['focus'] = $aFocus[$sFieldName];
        }
    } // sc_set_focus
    function sc_master_value($sIndex, $sValue)
    {
        $sIndex = strtolower($sIndex);
        $this->NM_ajax_info['masterValue'][$sIndex] = $sValue;
        $_SESSION['sc_session'][$this->Ini->sc_page]['form_detallepedido_220621_mob']['masterValue'] = $this->NM_ajax_info['masterValue'];
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
        if ('hora_inicio' == $sField)
        {
            $sFieldDateTime = $sField . '_hora';
        }
        if ('hora_final' == $sField)
        {
            $sFieldDateTime = $sField . '_hora';
        }

        $sFlagVar        = 'bFlagRead_' . $sField;
        $this->$sFlagVar = 'on' == $sStatus;

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
                return array("sc_b_new_t.sc-unique-btn-1", "sc_b_new_t.sc-unique-btn-15");
                break;
            case "insert":
                return array("sc_b_ins_t.sc-unique-btn-2", "sc_b_ins_t.sc-unique-btn-16");
                break;
            case "bcancelar":
                return array("sc_b_sai_t.sc-unique-btn-3", "sc_b_sai_t.sc-unique-btn-17");
                break;
            case "delete":
                return array("sc_b_del_t.sc-unique-btn-4", "sc_b_del_t.sc-unique-btn-18");
                break;
            case "update":
                return array("sc_b_upd_t.sc-unique-btn-5", "sc_b_upd_t.sc-unique-btn-19");
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
