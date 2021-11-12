<?php

class grid_inventario_130521_pesq
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $cmp_formatado;
   var $nm_data;
   var $Campos_Mens_erro;

   var $comando;
   var $comando_sum;
   var $comando_filtro;
   var $comando_ini;
   var $comando_fim;
   var $NM_operador;
   var $NM_data_qp;
   var $NM_path_filter;
   var $NM_curr_fil;
   var $nm_location;
   var $NM_ajax_opcao;
   var $nmgp_botoes = array();
   var $NM_fil_ant = array();

   /**
    * @access  public
    */
   function __construct()
   {
   }

   /**
    * @access  public
    * @global  string  $bprocessa  
    */
   function monta_busca()
   {
      global $bprocessa;
      include("../_lib/css/" . $this->Ini->str_schema_filter . "_filter.php");
      $this->Ini->Str_btn_filter = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
      $this->Str_btn_filter_css  = trim($str_button) . "/" . trim($str_button) . ".css";
      $this->Ini->str_google_fonts = (isset($str_google_fonts) && !empty($str_google_fonts))?$str_google_fonts:'';
      include($this->Ini->path_btn . $this->Ini->Str_btn_filter);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['path_libs_php'] = $this->Ini->path_lib_php;
      $this->Img_sep_filter = "/" . trim($str_toolbar_separator);
      $this->Block_img_col  = trim($str_block_col);
      $this->Block_img_exp  = trim($str_block_exp);
      $this->Bubble_tail    = trim($str_bubble_tail);
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_config_btn.php", "F", "nmButtonOutput"); 
      $this->NM_case_insensitive = false;
      $this->init();
      if ($this->NM_ajax_flag)
      {
          ob_start();
          $this->Arr_result = array();
          $this->processa_ajax();
          $Temp = ob_get_clean();
          if ($Temp !== false && trim($Temp) != "")
          {
              $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          if ($this->Db)
          {
              $this->Db->Close(); 
          }
          exit;
      }
      if (isset($bprocessa) && "pesq" == $bprocessa)
      {
         $this->processa_busca();
      }
      else
      {
         $this->monta_formulario();
      }
   }

   /**
    * @access  public
    */
   function monta_formulario()
   {
      $this->monta_html_ini();
      $this->monta_cabecalho();
      $this->monta_form();
      $this->monta_html_fim();
   }

   /**
    * @access  public
    */
   function init()
   {
      global $bprocessa;
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
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_api.php", "", "") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("es");
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $this->NM_path_filter = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/filters/";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['opcao'] = "igual";
   }

   function processa_ajax()
   {
      global $NM_filters, $NM_filters_del, $nmgp_save_name, $nmgp_save_option, $NM_fields_refresh, $NM_parms_refresh, $Campo_bi, $Opc_bi, $NM_operador, $nmgp_save_origem;
//-- ajax metodos ---
      if ($this->NM_ajax_opcao == "ajax_filter_save")
      {
          ob_end_clean();
          ob_end_clean();
          $this->salva_filtro($nmgp_save_origem);
          $this->NM_fil_ant = $this->gera_array_filtros();
          $Nome_filter = "";
          $Opt_filter  = "<option value=\"\"></option>\r\n";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              if ($_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Tipo_filter[1] = sc_convert_encoding($Tipo_filter[1], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  $Opt_filter .= "<option value=\"\">" . grid_inventario_130521_pack_protect_string($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . grid_inventario_130521_pack_protect_string($Tipo_filter[0]) . "\">.." . grid_inventario_130521_pack_protect_string($Cada_filter) .  "</option>\r\n";
          }
          $Ajax_select  = "<SELECT id=\"sel_recup_filters_bot\" name=\"NM_filters_bot\" onChange=\"nm_submit_filter(this, 'bot');\" size=\"1\">\r\n";
          $Ajax_select .= $Opt_filter;
          $Ajax_select .= "</SELECT>\r\n";
          $this->Arr_result['setValue'][] = array('field' => "idAjaxSelect_NM_filters_bot", 'value' => $Ajax_select);
          $Ajax_select = "<SELECT id=\"sel_filters_del_bot\" class=\"scFilterToolbar_obj\" name=\"NM_filters_del_bot\" size=\"1\">\r\n";
          $Ajax_select .= $Opt_filter;
          $Ajax_select .= "</SELECT>\r\n";
          $this->Arr_result['setValue'][] = array('field' => "idAjaxSelect_NM_filters_del_bot", 'value' => $Ajax_select);
      }

      if ($this->NM_ajax_opcao == "ajax_filter_delete")
      {
          ob_end_clean();
          ob_end_clean();
          $this->apaga_filtro();
          $this->NM_fil_ant = $this->gera_array_filtros();
          $Nome_filter = "";
          $Opt_filter  = "<option value=\"\"></option>\r\n";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              if ($_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Tipo_filter[1] = sc_convert_encoding($Tipo_filter[1], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter  = $Tipo_filter[1];
                  $Opt_filter .= "<option value=\"\">" .  grid_inventario_130521_pack_protect_string($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . grid_inventario_130521_pack_protect_string($Tipo_filter[0]) . "\">.." . grid_inventario_130521_pack_protect_string($Cada_filter) .  "</option>\r\n";
          }
          $Ajax_select  = "<SELECT id=\"sel_recup_filters_bot\" class=\"scFilterToolbar_obj\" style=\"display:". (count($this->NM_fil_ant)>0?'':'none') .";\" name=\"NM_filters_bot\" onChange=\"nm_submit_filter(this, 'bot');\" size=\"1\">\r\n";
          $Ajax_select .= $Opt_filter;
          $Ajax_select .= "</SELECT>\r\n";
          $this->Arr_result['setValue'][] = array('field' => "idAjaxSelect_NM_filters_bot", 'value' => $Ajax_select);
          $Ajax_select = "<SELECT id=\"sel_filters_del_bot\" class=\"scFilterToolbar_obj\" name=\"NM_filters_del_bot\" size=\"1\">\r\n";
          $Ajax_select .= $Opt_filter;
          $Ajax_select .= "</SELECT>\r\n";
          $this->Arr_result['setValue'][] = array('field' => "idAjaxSelect_NM_filters_del_bot", 'value' => $Ajax_select);
      }
      if ($this->NM_ajax_opcao == "ajax_filter_select")
      {
          ob_end_clean();
          ob_end_clean();
          $this->Arr_result = $this->recupera_filtro($NM_filters);
      }

      if ($this->NM_ajax_opcao == 'autocomp_idpro')
      {
          $idpro = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_idpro($idpro);
          ob_end_clean();
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_cantidad')
      {
          $cantidad = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_cantidad($cantidad);
          ob_end_clean();
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('text' => $Valor , 'id' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode(array('results' => $resp_aut_comp));
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_idcombo')
      {
          $idcombo = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_idcombo($idcombo);
          ob_end_clean();
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_grupo')
      {
          $grupo = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_grupo($grupo);
          ob_end_clean();
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_lote2')
      {
          $lote2 = ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['scriptcase']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_lote2($lote2);
          ob_end_clean();
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('text' => $Valor , 'id' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode(array('results' => $resp_aut_comp));
          $this->Db->Close(); 
          exit;
      }
   }
   function lookup_ajax_idpro($idpro)
   {
      $idpro = substr($this->Db->qstr($idpro), 1, -1);
            $idpro_look = substr($this->Db->qstr($idpro), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "select idprod, codigobar + ' - ' + nompro from productos where  codigobar + ' - ' + nompro like '%" . $idpro . "%' order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "select idprod, concat(codigobar,' - ',nompro) from productos where  concat(codigobar,' - ',nompro) like '%" . $idpro . "%' order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select idprod, codigobar&' - '&nompro from productos where  codigobar&' - '&nompro like '%" . $idpro . "%' order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "select idprod, codigobar||' - '||nompro from productos where   CAST (codigobar||' - '||nompro AS TEXT)  like '%" . $idpro . "%' order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nm_comando = "select idprod, codigobar + ' - ' + nompro from productos where  codigobar + ' - ' + nompro like '%" . $idpro . "%' order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "select idprod, codigobar||' - '||nompro from productos where  codigobar||' - '||nompro like '%" . $idpro . "%' order by codigobar, nompro" ; 
      } 
      else 
      { 
          $nm_comando = "select idprod, codigobar||' - '||nompro from productos where  codigobar||' - '||nompro like '%" . $idpro . "%' order by codigobar, nompro" ; 
      } 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $cmp2 = NM_charset_to_utf8(trim($rs->fields[1]));
            $nmgp_def_dados[] = array($cmp1 => $cmp2); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_cantidad($cantidad)
   {
      $cantidad = str_replace($_SESSION['scriptcase']['reg_conf']['grup_num'], "", $cantidad);
      $cantidad = str_replace($_SESSION['scriptcase']['reg_conf']['dec_num'], ".", $cantidad);
      $cantidad = substr($this->Db->qstr($cantidad), 1, -1);
            $cantidad_look = substr($this->Db->qstr($cantidad), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct cantidad from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2 FROM      inventario ) nm_sel_esp where   CAST (cantidad AS TEXT)  like '%" . $cantidad . "%'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct cantidad from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2 FROM      inventario ) nm_sel_esp where   CAST (cantidad AS VARCHAR)  like '%" . $cantidad . "%'"; 
      }
      else
      {
          $nm_comando = "select distinct cantidad from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2 FROM      inventario ) nm_sel_esp where  cantidad like '%" . $cantidad . "%'"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
              nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "3", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_idcombo($idcombo)
   {
      $idcombo = substr($this->Db->qstr($idcombo), 1, -1);
            $idcombo_look = substr($this->Db->qstr($idcombo), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "select idprod, codigobar + ' -- ' + nompro from productos where escombo='SI' and  codigobar + ' -- ' + nompro like '%" . $idcombo . "%' order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "select idprod, concat(codigobar,' -- ',nompro) from productos where escombo='SI' and  concat(codigobar,' -- ',nompro) like '%" . $idcombo . "%' order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select idprod, codigobar&' -- '&nompro from productos where escombo='SI' and  codigobar&' -- '&nompro like '%" . $idcombo . "%' order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "select idprod, codigobar||' -- '||nompro from productos where escombo='SI' and   CAST (codigobar||' -- '||nompro AS TEXT)  like '%" . $idcombo . "%' order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nm_comando = "select idprod, codigobar + ' -- ' + nompro from productos where escombo='SI' and  codigobar + ' -- ' + nompro like '%" . $idcombo . "%' order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "select idprod, codigobar||' -- '||nompro from productos where escombo='SI' and  codigobar||' -- '||nompro like '%" . $idcombo . "%' order by codigobar, nompro" ; 
      } 
      else 
      { 
          $nm_comando = "select idprod, codigobar||' -- '||nompro from productos where escombo='SI' and  codigobar||' -- '||nompro like '%" . $idcombo . "%' order by codigobar, nompro" ; 
      } 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $cmp2 = NM_charset_to_utf8(trim($rs->fields[1]));
            $nmgp_def_dados[] = array($cmp1 => $cmp2); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_grupo($grupo)
   {
      $grupo = substr($this->Db->qstr($grupo), 1, -1);
            $grupo_look = substr($this->Db->qstr($grupo), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select idgrupo, nomgrupo from grupo where   CAST (nomgrupo AS TEXT)  like '%" . $grupo . "%' order by nomgrupo"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select idgrupo, nomgrupo from grupo where   CAST (nomgrupo AS VARCHAR)  like '%" . $grupo . "%' order by nomgrupo"; 
      }
      else
      {
          $nm_comando = "select idgrupo, nomgrupo from grupo where  nomgrupo like '%" . $grupo . "%' order by nomgrupo"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $cmp2 = NM_charset_to_utf8(trim($rs->fields[1]));
            $nmgp_def_dados[] = array($cmp1 => $cmp2); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_lote2($lote2)
   {
      $lote2 = substr($this->Db->qstr($lote2), 1, -1);
            $lote2_look = substr($this->Db->qstr($lote2), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct lote2 from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2 FROM      inventario ) nm_sel_esp where  lote2 like '%" . $lote2 . "%'"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   

   /**
    * @access  public
    */
   function processa_busca()
   {
      $this->inicializa_vars();
      $this->trata_campos();
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->monta_formulario();
      }
      else
      {
          $this->finaliza_resultado();
      }
   }

   /**
    * @access  public
    */
   function and_or()
   {
      $posWhere = strpos(strtolower($this->comando), "where");
      if (FALSE === $posWhere)
      {
         $this->comando     .= " where (";
         $this->comando_sum .= " and (";
         $this->comando_fim  = " ) ";
      }
      if ($this->comando_ini == "ini")
      {
          if (FALSE !== $posWhere)
          {
              $this->comando     .= " and ( ";
              $this->comando_sum .= " and ( ";
              $this->comando_fim  = " ) ";
          }
         $this->comando_ini  = "";
      }
      elseif ("or" == $this->NM_operador)
      {
         $this->comando        .= " or ";
         $this->comando_sum    .= " or ";
         $this->comando_filtro .= " or ";
      }
      else
      {
         $this->comando        .= " and ";
         $this->comando_sum    .= " and ";
         $this->comando_filtro .= " and ";
      }
   }

   /**
    * @access  public
    * @param  string  $nome  
    * @param  string  $condicao  
    * @param  mixed  $campo  
    * @param  mixed  $campo2  
    * @param  string  $nome_campo  
    * @param  string  $tp_campo  
    * @global  array  $nmgp_tab_label  
    */
   function monta_condicao($nome, $condicao, $campo, $campo2 = "", $nome_campo="", $tp_campo="")
   {
      global $nmgp_tab_label;
      $condicao   = strtoupper($condicao);
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $Nm_numeric = array();
      $nm_esp_postgres = array();
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $Nm_numeric[] = "idinv";$Nm_numeric[] = "cantidad";$Nm_numeric[] = "idpro";$Nm_numeric[] = "idbod";$Nm_numeric[] = "tipo";$Nm_numeric[] = "idmov";$Nm_numeric[] = "idfaccom";$Nm_numeric[] = "nufacvta";$Nm_numeric[] = "colores";$Nm_numeric[] = "tallas";$Nm_numeric[] = "sabor";$Nm_numeric[] = "costo";$Nm_numeric[] = "valorparcial";$Nm_numeric[] = "idcombo";$Nm_numeric[] = "grupo";$Nm_numeric[] = "idped";
      $campo_join = strtolower(str_replace(".", "_", $nome));
      if (in_array($campo_join, $Nm_numeric))
      {
          if ($condicao == "EP" || $condicao == "NE")
          {
              return;
          }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['decimal_db'] == ".")
         {
            $nm_aspas  = "";
            $nm_aspas1 = "";
         }
         if ($condicao != "IN")
         {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['decimal_db'] == ".")
            {
               $campo  = str_replace(",", ".", $campo);
               $campo2 = str_replace(",", ".", $campo2);
            }
            if ($campo == "")
            {
               $campo = 0;
            }
            if ($campo2 == "")
            {
               $campo2 = 0;
            }
         }
      }
      $Nm_datas[] = "fecha";$Nm_datas[] = "fecha";$Nm_datas[] = "fechavenc";$Nm_datas[] = "fechavenc";
      if (in_array($campo_join, $Nm_datas))
      {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['SC_sep_date']))
          {
              $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['SC_sep_date'];
              $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['SC_sep_date1'];
          }
      }
      if ($campo == "" && $condicao != "NU" && $condicao != "NN" && $condicao != "EP" && $condicao != "NE")
      {
         return;
      }
      else
      {
         $tmp_pos = strpos($campo, "##@@");
         if ($tmp_pos === false)
         {
             $res_lookup = $campo;
         }
         else
         {
             $res_lookup = substr($campo, $tmp_pos + 4);
             $campo = substr($campo, 0, $tmp_pos);
             if ($campo == "" && $condicao != "NU" && $condicao != "NN" && $condicao != "EP" && $condicao != "NE")
             {
                 return;
             }
         }
         $tmp_pos = strpos($this->cmp_formatado[$nome_campo], "##@@");
         if ($tmp_pos !== false)
         {
             $this->cmp_formatado[$nome_campo] = substr($this->cmp_formatado[$nome_campo], $tmp_pos + 4);
         }
         $this->and_or();
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $campo2 = substr($this->Db->qstr($campo2), 1, -1);
         $nome_sum = "inventario.$nome";
         if ($tp_campo == "TIMESTAMP")
         {
             $tp_campo = "DATETIME";
         }
         if (in_array($campo_join, $Nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "II" || $condicao == "QP" || $condicao == "NP"))
         {
             $nome     = "CAST ($nome AS TEXT)";
             $nome_sum = "CAST ($nome_sum AS TEXT)";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome     = "CAST ($nome AS TEXT)";
             $nome_sum = "CAST ($nome_sum AS TEXT)";
         }
         if (substr($tp_campo, 0, 8) == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "to_char ($nome, 'YYYY-MM-DD hh24:mi:ss')";
                 $nome_sum = "to_char ($nome_sum, 'YYYY-MM-DD hh24:mi:ss')";
             }
         }
         elseif (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "to_char ($nome, 'YYYY-MM-DD')";
                 $nome_sum = "to_char ($nome_sum, 'YYYY-MM-DD')";
             }
         }
         elseif (substr($tp_campo, 0, 4) == "TIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "to_char ($nome, 'hh24:mi:ss')";
                 $nome_sum = "to_char ($nome_sum, 'hh24:mi:ss')";
             }
         }
         if (in_array($campo_join, $Nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && ($condicao == "II" || $condicao == "QP" || $condicao == "NP"))
         {
             $nome     = "CAST ($nome AS VARCHAR)";
             $nome_sum = "CAST ($nome_sum AS VARCHAR)";
         }
         if ($tp_campo == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "convert(char(10),$nome,121)";
                 $nome_sum = "convert(char(10),$nome_sum,121)";
             }
         }
         if ($tp_campo == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "convert(char(19),$nome,121)";
                 $nome_sum = "convert(char(19),$nome_sum,121)";
             }
         }
         if (substr($tp_campo, 0, 8) == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) && !$this->Date_part)
         {
             $nome     = "TO_DATE(TO_CHAR($nome, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
             $nome_sum = "TO_DATE(TO_CHAR($nome_sum, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
             $tp_campo = "DATETIME";
         }
         if (substr($tp_campo, 0, 8) == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix) && !$this->Date_part)
         {
             $nome     = "EXTEND($nome, YEAR TO FRACTION)";
             $nome_sum = "EXTEND($nome_sum, YEAR TO FRACTION)";
         }
         elseif (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix) && !$this->Date_part)
         {
             $nome     = "EXTEND($nome, YEAR TO DAY)";
             $nome_sum = "EXTEND($nome_sum, YEAR TO DAY)";
         }
         if (in_array($campo_join, $Nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress) && ($condicao == "II" || $condicao == "QP" || $condicao == "NP"))
         {
             $nome     = "CAST ($nome AS VARCHAR(255))";
             $nome_sum = "CAST ($nome_sum AS VARCHAR(255))";
         }
         if (substr($tp_campo, 0, 8) == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "to_char ($nome, 'YYYY-MM-DD hh24:mi:ss')";
                 $nome_sum = "to_char ($nome_sum, 'YYYY-MM-DD hh24:mi:ss')";
             }
         }
         if (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "to_char ($nome, 'YYYY-MM-DD')";
                 $nome_sum = "to_char ($nome_sum, 'YYYY-MM-DD')";
             }
         }
         switch ($condicao)
         {
            case "EQ":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower. " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "II":     // 
               if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
               {
                   $op_all       = " ilike ";
                   $nm_ini_lower = "";
                   $nm_fim_lower = "";
               }
               else
               {
                   $op_all = " like ";
               }
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_all . $nm_ini_lower . "'" . $campo . "%'" . $nm_fim_lower;
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . $op_all . $nm_ini_lower . "'" . $campo . "%'" . $nm_fim_lower;
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . $op_all . $nm_ini_lower . "'" . $campo . "%'" . $nm_fim_lower;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_strt'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
             case "QP";     // 
             case "NP";     // 
                $concat = " " . $this->NM_operador . " ";
                if ($condicao == "QP")
                {
                    $op_all    = " #sc_like_# ";
                    $lang_like = $this->Ini->Nm_lang['lang_srch_like'];
                }
                else
                {
                    $op_all    = " not #sc_like_# ";
                    $lang_like = $this->Ini->Nm_lang['lang_srch_not_like'];
                }
               $NM_cond    = "";
               $NM_cmd     = "";
               $NM_cmd_sum = "";
               if (substr($tp_campo, 0, 4) == "DATE" && $this->Date_part)
               {
                   if ($this->NM_data_qp['ano'] != "____")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_year'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['ano'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%Y', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%Y', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(year from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(year from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'YYYY') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'YYYY') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('year' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('year' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(year from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(year from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'YYYY')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'YYYY')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(year, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(year, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'YYYY') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'YYYY') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "year (" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                               $NM_cmd_sum .= "year (" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "year(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "year(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['mes'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_mnth'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['mes'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%m', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%m', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(month from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(month from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'MM') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'MM') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('month' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('month' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(month from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(month from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'MM')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'MM')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(month, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(month, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'MM') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'MM') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "month (" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                               $NM_cmd_sum .= "month (" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "month(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "month(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['dia'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_days'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['dia'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%d', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%d', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(day from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(day from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'DD') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'DD') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('day' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('day' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(day from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(day from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'DD')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'DD')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(day, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(day, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'DD') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'DD') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "DAYOFMONTH(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                               $NM_cmd_sum .= "DAYOFMONTH(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "day(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "day(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                   }
               }
               if (strpos($tp_campo, "TIME") !== false && $this->Date_part)
               {
                   if ($this->NM_data_qp['hor'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_time'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['hor'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%H', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%H', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(hour from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(hour from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'hh24') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'hh24') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('hour' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('hour' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(hour from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(hour from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'HH24')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'HH24')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(hour, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(hour, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'hh24') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'hh24') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "hour(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                               $NM_cmd_sum .= "hour(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "hour(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "hour(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['min'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_mint'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['min'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%M', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%M', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(minute from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(minute from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'mi') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'mi') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('minute' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('minute' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(minute from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(minute from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'MI')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'MI')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(minute, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(minute, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'mi') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'mi') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "minute(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                               $NM_cmd_sum .= "minute(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "minute(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "minute(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['seg'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_scnd'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['seg'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%S', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%S', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(second from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(second from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'ss') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'ss') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('second' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('second' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(second from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(second from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'SS')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'SS')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(second, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(second, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'ss') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'ss') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "second(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                               $NM_cmd_sum .= "second(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "second(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "second(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                   }
               }
               if ($this->Date_part)
               {
                   if (!empty($NM_cmd))
                   {
                       $NM_cmd     = " (" . $NM_cmd . ")";
                       $NM_cmd_sum = " (" . $NM_cmd_sum . ")";
                       $this->comando        .= $NM_cmd;
                       $this->comando_sum    .= $NM_cmd_sum;
                       $this->comando_filtro .= $NM_cmd;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . ": " . $NM_cond . "##*@@";
                   }
               }
               else
               {
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
                   {
                       $op_all       = str_replace("#sc_like_#", "ilike", $op_all);
                       $nm_ini_lower = "";
                       $nm_fim_lower = "";
                   }
                   else
                   {
                       $op_all = str_replace("#sc_like_#", "like", $op_all);
                   }
                   $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_all . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
                   $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . $op_all . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
                   $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . $op_all . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $lang_like . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               }
            break;
            case "DF":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GT":     // 
               $this->comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum > " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_grtr'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GE":     // 
               $this->comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum >= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_grtr_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LT":     // 
               $this->comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum < " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LE":     // 
               $this->comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum <= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "BW":     // 
               $this->comando        .= " $nome between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $this->comando_filtro .= " $nome between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_betw'] . " " . $this->cmp_formatado[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " " . $this->cmp_formatado[$nome_campo . "_input_2"] . "##*@@";
            break;
            case "IN":     // 
               $nm_sc_valores = explode(",", $campo);
               $cond_str  = "";
               $nm_cond   = "";
               if (!empty($nm_sc_valores))
               {
                   foreach ($nm_sc_valores as $nm_sc_valor)
                   {
                      if (in_array($campo_join, $Nm_numeric) && substr_count($nm_sc_valor, ".") > 1)
                      {
                         $nm_sc_valor = str_replace(".", "", $nm_sc_valor);
                      }
                      if ("" != $cond_str)
                      {
                         $cond_str .= ",";
                         $nm_cond  .= " " . $this->Ini->Nm_lang['lang_srch_orr_cond'] . " ";
                      }
                      $cond_str .= $nm_ini_lower . $nm_aspas . $nm_sc_valor . $nm_aspas1 . $nm_fim_lower;
                      $nm_cond  .= $nm_aspas . $nm_sc_valor . $nm_aspas1;
                   }
               }
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $cond_str . ")";
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " in (" . $cond_str . ")";
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $cond_str . ")";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond . "##*@@";
            break;
            case "NU":     // 
               $this->comando        .= " $nome IS NULL ";
               $this->comando_sum    .= " $nome_sum IS NULL ";
               $this->comando_filtro .= " $nome IS NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_null'] . "##*@@";
            break;
            case "NN":     // 
               $this->comando        .= " $nome IS NOT NULL ";
               $this->comando_sum    .= " $nome_sum IS NOT NULL ";
               $this->comando_filtro .= " $nome IS NOT NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_nnul'] . "##*@@";
            break;
            case "EP":     // 
               $this->comando        .= " $nome = '' ";
               $this->comando_sum    .= " $nome_sum = '' ";
               $this->comando_filtro .= " $nome = '' ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_empty'] . "##*@@";
            break;
            case "NE":     // 
               $this->comando        .= " $nome <> '' ";
               $this->comando_sum    .= " $nome_sum <> '' ";
               $this->comando_filtro .= " $nome <> '' ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_nempty'] . "##*@@";
            break;
         }
      }
   }

   function nm_prep_date(&$val, $tp, $tsql, &$cond, $format_nd, $tp_nd)
   {
       $fill_dt = false;
       if ($tsql == "TIMESTAMP")
       {
           $tsql = "DATETIME";
       }
       $cond = strtoupper($cond);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && $tp != "ND")
       {
           if ($cond == "EP")
           {
               $cond = "NU";
           }
           if ($cond == "NE")
           {
               $cond = "NN";
           }
       }
       if ($cond == "NU" || $cond == "NN" || $cond == "EP" || $cond == "NE")
       {
           $val    = array();
           $val[0] = "";
           return;
       }
       if ($cond != "II" && $cond != "QP" && $cond != "NP")
       {
           $fill_dt = true;
       }
       if ($fill_dt)
       {
           $val[0]['dia'] = (!empty($val[0]['dia']) && strlen($val[0]['dia']) == 1) ? "0" . $val[0]['dia'] : $val[0]['dia'];
           $val[0]['mes'] = (!empty($val[0]['mes']) && strlen($val[0]['mes']) == 1) ? "0" . $val[0]['mes'] : $val[0]['mes'];
           if ($tp == "DH")
           {
               $val[0]['hor'] = (!empty($val[0]['hor']) && strlen($val[0]['hor']) == 1) ? "0" . $val[0]['hor'] : $val[0]['hor'];
               $val[0]['min'] = (!empty($val[0]['min']) && strlen($val[0]['min']) == 1) ? "0" . $val[0]['min'] : $val[0]['min'];
               $val[0]['seg'] = (!empty($val[0]['seg']) && strlen($val[0]['seg']) == 1) ? "0" . $val[0]['seg'] : $val[0]['seg'];
           }
           if ($cond == "BW")
           {
               $val[1]['dia'] = (!empty($val[1]['dia']) && strlen($val[1]['dia']) == 1) ? "0" . $val[1]['dia'] : $val[1]['dia'];
               $val[1]['mes'] = (!empty($val[1]['mes']) && strlen($val[1]['mes']) == 1) ? "0" . $val[1]['mes'] : $val[1]['mes'];
               if ($tp == "DH")
               {
                   $val[1]['hor'] = (!empty($val[1]['hor']) && strlen($val[1]['hor']) == 1) ? "0" . $val[1]['hor'] : $val[1]['hor'];
                   $val[1]['min'] = (!empty($val[1]['min']) && strlen($val[1]['min']) == 1) ? "0" . $val[1]['min'] : $val[1]['min'];
                   $val[1]['seg'] = (!empty($val[1]['seg']) && strlen($val[1]['seg']) == 1) ? "0" . $val[1]['seg'] : $val[1]['seg'];
               }
           }
       }
       if ($cond == "BW")
       {
           $this->NM_data_1 = array();
           $this->NM_data_1['ano'] = (isset($val[0]['ano']) && !empty($val[0]['ano'])) ? $val[0]['ano'] : "____";
           $this->NM_data_1['mes'] = (isset($val[0]['mes']) && !empty($val[0]['mes'])) ? $val[0]['mes'] : "__";
           $this->NM_data_1['dia'] = (isset($val[0]['dia']) && !empty($val[0]['dia'])) ? $val[0]['dia'] : "__";
           $this->NM_data_1['hor'] = (isset($val[0]['hor']) && !empty($val[0]['hor'])) ? $val[0]['hor'] : "__";
           $this->NM_data_1['min'] = (isset($val[0]['min']) && !empty($val[0]['min'])) ? $val[0]['min'] : "__";
           $this->NM_data_1['seg'] = (isset($val[0]['seg']) && !empty($val[0]['seg'])) ? $val[0]['seg'] : "__";
           $this->data_menor($this->NM_data_1);
           $this->NM_data_2 = array();
           $this->NM_data_2['ano'] = (isset($val[1]['ano']) && !empty($val[1]['ano'])) ? $val[1]['ano'] : "____";
           $this->NM_data_2['mes'] = (isset($val[1]['mes']) && !empty($val[1]['mes'])) ? $val[1]['mes'] : "__";
           $this->NM_data_2['dia'] = (isset($val[1]['dia']) && !empty($val[1]['dia'])) ? $val[1]['dia'] : "__";
           $this->NM_data_2['hor'] = (isset($val[1]['hor']) && !empty($val[1]['hor'])) ? $val[1]['hor'] : "__";
           $this->NM_data_2['min'] = (isset($val[1]['min']) && !empty($val[1]['min'])) ? $val[1]['min'] : "__";
           $this->NM_data_2['seg'] = (isset($val[1]['seg']) && !empty($val[1]['seg'])) ? $val[1]['seg'] : "__";
           $this->data_maior($this->NM_data_2);
           $val = array();
           if ($tp == "ND")
           {
               $out_dt1 = $format_nd;
               $out_dt1 = str_replace("yyyy", $this->NM_data_1['ano'], $out_dt1);
               $out_dt1 = str_replace("mm",   $this->NM_data_1['mes'], $out_dt1);
               $out_dt1 = str_replace("dd",   $this->NM_data_1['dia'], $out_dt1);
               $out_dt1 = str_replace("hh",   "", $out_dt1);
               $out_dt1 = str_replace("ii",   "", $out_dt1);
               $out_dt1 = str_replace("ss",   "", $out_dt1);
               $out_dt2 = $format_nd;
               $out_dt2 = str_replace("yyyy", $this->NM_data_2['ano'], $out_dt2);
               $out_dt2 = str_replace("mm",   $this->NM_data_2['mes'], $out_dt2);
               $out_dt2 = str_replace("dd",   $this->NM_data_2['dia'], $out_dt2);
               $out_dt2 = str_replace("hh",   "", $out_dt2);
               $out_dt2 = str_replace("ii",   "", $out_dt2);
               $out_dt2 = str_replace("ss",   "", $out_dt2);
               $val[0] = $out_dt1;
               $val[1] = $out_dt2;
               return;
           }
           if ($tsql == "TIME")
           {
               $val[0] = $this->NM_data_1['hor'] . ":" . $this->NM_data_1['min'] . ":" . $this->NM_data_1['seg'];
               $val[1] = $this->NM_data_2['hor'] . ":" . $this->NM_data_2['min'] . ":" . $this->NM_data_2['seg'];
           }
           elseif (substr($tsql, 0, 4) == "DATE")
           {
               $val[0] = $this->NM_data_1['ano'] . "-" . $this->NM_data_1['mes'] . "-" . $this->NM_data_1['dia'];
               $val[1] = $this->NM_data_2['ano'] . "-" . $this->NM_data_2['mes'] . "-" . $this->NM_data_2['dia'];
               if (strpos($tsql, "TIME") !== false)
               {
                   $val[0] .= " " . $this->NM_data_1['hor'] . ":" . $this->NM_data_1['min'] . ":" . $this->NM_data_1['seg'];
                   $val[1] .= " " . $this->NM_data_2['hor'] . ":" . $this->NM_data_2['min'] . ":" . $this->NM_data_2['seg'];
               }
           }
           return;
       }
       $this->NM_data_qp = array();
       $this->NM_data_qp['ano'] = (isset($val[0]['ano']) && $val[0]['ano'] != "") ? $val[0]['ano'] : "____";
       $this->NM_data_qp['mes'] = (isset($val[0]['mes']) && $val[0]['mes'] != "") ? $val[0]['mes'] : "__";
       $this->NM_data_qp['dia'] = (isset($val[0]['dia']) && $val[0]['dia'] != "") ? $val[0]['dia'] : "__";
       $this->NM_data_qp['hor'] = (isset($val[0]['hor']) && $val[0]['hor'] != "") ? $val[0]['hor'] : "__";
       $this->NM_data_qp['min'] = (isset($val[0]['min']) && $val[0]['min'] != "") ? $val[0]['min'] : "__";
       $this->NM_data_qp['seg'] = (isset($val[0]['seg']) && $val[0]['seg'] != "") ? $val[0]['seg'] : "__";
       if ($tp != "ND" && ($cond == "LE" || $cond == "LT" || $cond == "GE" || $cond == "GT"))
       {
           $count_fill = 0;
           foreach ($this->NM_data_qp as $x => $tx)
           {
               if (substr($tx, 0, 2) != "__")
               {
                   $count_fill++;
               }
           }
           if ($count_fill > 1)
           {
               if ($cond == "LE" || $cond == "GT")
               {
                   $this->data_maior($this->NM_data_qp);
               }
               else
               {
                   $this->data_menor($this->NM_data_qp);
               }
               if ($tsql == "TIME")
               {
                   $val[0] = $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
               }
               elseif (substr($tsql, 0, 4) == "DATE")
               {
                   $val[0] = $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
                   if (strpos($tsql, "TIME") !== false)
                   {
                       $val[0] .= " " . $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
                   }
               }
               return;
           }
       }
       foreach ($this->NM_data_qp as $x => $tx)
       {
           if (substr($tx, 0, 2) == "__" && ($x == "dia" || $x == "mes" || $x == "ano"))
           {
               if (substr($tsql, 0, 4) == "DATE")
               {
                   $this->Date_part = true;
                   break;
               }
           }
           if (substr($tx, 0, 2) == "__" && ($x == "hor" || $x == "min" || $x == "seg"))
           {
               if (strpos($tsql, "TIME") !== false && ($tp == "DH" || ($tp == "DT" && $cond != "LE" && $cond != "LT" && $cond != "GE" && $cond != "GT")))
               {
                   $this->Date_part = true;
                   break;
               }
           }
       }
       if ($this->Date_part)
       {
           $this->Ini_date_part = "";
           $this->End_date_part = "";
           $this->Ini_date_char = "";
           $this->End_date_char = "";
           if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
           {
               $this->Ini_date_part = "'";
               $this->End_date_part = "'";
           }
           if ($tp != "ND")
           {
               if ($cond == "EQ")
               {
                   $this->Operador_date_part = " = ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_equl'];
               }
               elseif ($cond == "II")
               {
                   $this->Operador_date_part = " like ";
                   $this->Ini_date_part = "'";
                   $this->End_date_part = "%'";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_strt'];
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                   {
                       $this->Ini_date_char = "CAST (";
                       $this->End_date_char = " AS TEXT)";
                   }
               }
               elseif ($cond == "DF")
               {
                   $this->Operador_date_part = " <> ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_diff'];
               }
               elseif ($cond == "GT")
               {
                   $this->Operador_date_part = " > ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['pesq_cond_maior'];
               }
               elseif ($cond == "GE")
               {
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_grtr_equl'];
                   $this->Operador_date_part = " >= ";
               }
               elseif ($cond == "LT")
               {
                   $this->Operador_date_part = " < ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_less'];
               }
               elseif ($cond == "LE")
               {
                   $this->Operador_date_part = " <= ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_less_equl'];
               }
               elseif ($cond == "NP")
               {
                   $this->Operador_date_part = " not like ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_diff'];
                   $this->Ini_date_part = "'%";
                   $this->End_date_part = "%'";
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                   {
                       $this->Ini_date_char = "CAST (";
                       $this->End_date_char = " AS TEXT)";
                   }
               }
               else
               {
                   $this->Operador_date_part = " like ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_equl'];
                   $this->Ini_date_part = "'%";
                   $this->End_date_part = "%'";
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                   {
                       $this->Ini_date_char = "CAST (";
                       $this->End_date_char = " AS TEXT)";
                   }
               }
           }
           if ($cond == "DF")
           {
               $cond = "NP";
           }
           if ($cond != "NP")
           {
               $cond = "QP";
           }
       }
       $val = array();
       if ($tp != "ND" && ($cond == "QP" || $cond == "NP"))
       {
           $val[0] = "";
           if (substr($tsql, 0, 4) == "DATE")
           {
               $val[0] .= $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
               if (strpos($tsql, "TIME") !== false)
               {
                   $val[0] .= " ";
               }
           }
           if (strpos($tsql, "TIME") !== false)
           {
               $val[0] .= $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
           }
           return;
       }
       if ($cond == "II" || $cond == "DF" || $cond == "EQ" || $cond == "LT" || $cond == "GE")
       {
           $this->data_menor($this->NM_data_qp);
       }
       else
       {
           $this->data_maior($this->NM_data_qp);
       }
       if ($tsql == "TIME")
       {
           $val[0] = $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
           return;
       }
       $format_sql = "";
       if (substr($tsql, 0, 4) == "DATE")
       {
           $format_sql .= $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
           if (strpos($tsql, "TIME") !== false)
           {
               $format_sql .= " ";
           }
       }
       if (strpos($tsql, "TIME") !== false)
       {
           $format_sql .=  $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
       }
       if ($tp != "ND")
       {
           $val[0] = $format_sql;
           return;
       }
       if ($tp == "ND")
       {
           $format_nd = str_replace("yyyy", $this->NM_data_qp['ano'], $format_nd);
           $format_nd = str_replace("mm",   $this->NM_data_qp['mes'], $format_nd);
           $format_nd = str_replace("dd",   $this->NM_data_qp['dia'], $format_nd);
           $format_nd = str_replace("hh",   $this->NM_data_qp['hor'], $format_nd);
           $format_nd = str_replace("ii",   $this->NM_data_qp['min'], $format_nd);
           $format_nd = str_replace("ss",   $this->NM_data_qp['seg'], $format_nd);
           $val[0] = $format_nd;
           return;
       }
   }
   function data_menor(&$data_arr)
   {
       $data_arr["ano"] = ("____" == $data_arr["ano"]) ? "0001" : $data_arr["ano"];
       $data_arr["mes"] = ("__" == $data_arr["mes"])   ? "01" : $data_arr["mes"];
       $data_arr["dia"] = ("__" == $data_arr["dia"])   ? "01" : $data_arr["dia"];
       $data_arr["hor"] = ("__" == $data_arr["hor"])   ? "00" : $data_arr["hor"];
       $data_arr["min"] = ("__" == $data_arr["min"])   ? "00" : $data_arr["min"];
       $data_arr["seg"] = ("__" == $data_arr["seg"])   ? "00" : $data_arr["seg"];
   }

   function data_maior(&$data_arr)
   {
       $data_arr["ano"] = ("____" == $data_arr["ano"]) ? "9999" : $data_arr["ano"];
       $data_arr["mes"] = ("__" == $data_arr["mes"])   ? "12" : $data_arr["mes"];
       $data_arr["hor"] = ("__" == $data_arr["hor"])   ? "23" : $data_arr["hor"];
       $data_arr["min"] = ("__" == $data_arr["min"])   ? "59" : $data_arr["min"];
       $data_arr["seg"] = ("__" == $data_arr["seg"])   ? "59" : $data_arr["seg"];
       if ("__" == $data_arr["dia"])
       {
           $data_arr["dia"] = "31";
           if ($data_arr["mes"] == "04" || $data_arr["mes"] == "06" || $data_arr["mes"] == "09" || $data_arr["mes"] == "11")
           {
               $data_arr["dia"] = 30;
           }
           elseif ($data_arr["mes"] == "02")
           { 
                if  ($data_arr["ano"] % 4 == 0)
                {
                     $data_arr["dia"] = 29;
                }
                else 
                {
                     $data_arr["dia"] = 28;
                }
           }
       }
   }

   /**
    * @access  public
    * @param  string  $nm_data_hora  
    */
   function limpa_dt_hor_pesq(&$nm_data_hora)
   {
      $nm_data_hora = str_replace("Y", "", $nm_data_hora); 
      $nm_data_hora = str_replace("M", "", $nm_data_hora); 
      $nm_data_hora = str_replace("D", "", $nm_data_hora); 
      $nm_data_hora = str_replace("H", "", $nm_data_hora); 
      $nm_data_hora = str_replace("I", "", $nm_data_hora); 
      $nm_data_hora = str_replace("S", "", $nm_data_hora); 
      $tmp_pos = strpos($nm_data_hora, "--");
      if ($tmp_pos !== FALSE)
      {
          $nm_data_hora = str_replace("--", "-", $nm_data_hora); 
      }
      $tmp_pos = strpos($nm_data_hora, "::");
      if ($tmp_pos !== FALSE)
      {
          $nm_data_hora = str_replace("::", ":", $nm_data_hora); 
      }
   }

   /**
    * @access  public
    */
   function retorna_pesq()
   {
      global $nm_apl_dependente;
   $NM_retorno = "./";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> -Rotación del inventario</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
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
<BODY id="grid_search" class="scGridPage">
<FORM style="display:none;" name="form_ok" method="POST" action="<?php echo $NM_retorno; ?>" target="_self">
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="pesq"> 
</FORM>
<SCRIPT type="text/javascript">
 document.form_ok.submit();
</SCRIPT>
</BODY>
</HTML>
<?php
}

   /**
    * @access  public
    */
   function monta_html_ini()
   {
       header("X-XSS-Protection: 1; mode=block");
       header("X-Frame-Options: SAMEORIGIN");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> -Rotación del inventario</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <script type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></script>
 <script type="text/javascript" src="../_lib/lib/js/scInput.js"></script>
 <script type="text/javascript" src="../_lib/lib/js/jquery.scInput.js"></script>
 <script type="text/javascript" src="../_lib/lib/js/jquery.scInput2.js"></script>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/select2/js/select2.full.min.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_error.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_error<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Str_btn_filter_css ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_form.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/font-awesome/css/all.min.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_filter.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_filter<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>grid_inventario_130521/grid_inventario_130521_fil_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />
</HEAD>
<?php
$vertical_center = '';
?>
<BODY id="grid_search" class="scFilterPage" style="<?php echo $vertical_center ?>">
<?php echo $this->Ini->Ajax_result_set ?>
<SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_js . "/browserSniffer.js" ?>"></SCRIPT>
        <script type="text/javascript">
          var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
          var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_close'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
          var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_esc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
        </script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
 <script type="text/javascript" src="grid_inventario_130521_ajax_search.js"></script>
 <script type="text/javascript" src="grid_inventario_130521_ajax.js"></script>
 <script type="text/javascript">
   function sc_session_redir(url_redir)
   {
       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
       {
           window.parent.sc_session_redir(url_redir);
       }
       else
       {
           if (window.opener && typeof window.opener.sc_session_redir === 'function')
           {
               window.close();
               window.opener.sc_session_redir(url_redir);
           }
           else
           {
               window.location = url_redir;
           }
       }
   }
   var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax ?>';
   var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax ?>';
   var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax ?>';
   var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax ?>';
 </script>
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
$Cod_Btn = nmButtonOutput($this->arr_buttons, "berrm_clse", "nmAjaxHideDebug()", "nmAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo $Cod_Btn ?>&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>
<script type="text/javascript" src="grid_inventario_130521_message.js"></script>
<link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_sweetalert.css" />
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['grid_inventario_130521']['glo_nm_path_prod']; ?>/third/sweetalert/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['grid_inventario_130521']['glo_nm_path_prod']; ?>/third/sweetalert/polyfill.min.js"></script>
<script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
<?php
$confirmButtonClass = '';
$cancelButtonClass  = '';
$confirmButtonText  = $this->Ini->Nm_lang['lang_btns_cfrm'];
$cancelButtonText   = $this->Ini->Nm_lang['lang_btns_cncl'];
$confirmButtonFA    = '';
$cancelButtonFA     = '';
$confirmButtonFAPos = '';
$cancelButtonFAPos  = '';
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['style']) && '' != $this->arr_buttons['bsweetalert_ok']['style']) {
    $confirmButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_ok']['style'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['style']) && '' != $this->arr_buttons['bsweetalert_cancel']['style']) {
    $cancelButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_cancel']['style'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['value']) && '' != $this->arr_buttons['bsweetalert_ok']['value']) {
    $confirmButtonText = $this->arr_buttons['bsweetalert_ok']['value'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['value']) && '' != $this->arr_buttons['bsweetalert_cancel']['value']) {
    $cancelButtonText = $this->arr_buttons['bsweetalert_cancel']['value'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) {
    $confirmButtonFA = $this->arr_buttons['bsweetalert_ok']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) {
    $cancelButtonFA = $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_ok']['display_position']) {
    $confirmButtonFAPos = 'text_right';
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_cancel']['display_position']) {
    $cancelButtonFAPos = 'text_right';
}
?>
<script type="text/javascript">
  var scSweetAlertConfirmButton = "<?php echo $confirmButtonClass ?>";
  var scSweetAlertCancelButton = "<?php echo $cancelButtonClass ?>";
  var scSweetAlertConfirmButtonText = "<?php echo $confirmButtonText ?>";
  var scSweetAlertCancelButtonText = "<?php echo $cancelButtonText ?>";
  var scSweetAlertConfirmButtonFA = "<?php echo $confirmButtonFA ?>";
  var scSweetAlertCancelButtonFA = "<?php echo $cancelButtonFA ?>";
  var scSweetAlertConfirmButtonFAPos = "<?php echo $confirmButtonFAPos ?>";
  var scSweetAlertCancelButtonFAPos = "<?php echo $cancelButtonFAPos ?>";
</script>
<script type="text/javascript">
$(function() {
<?php
if (count($this->nm_mens_alert) || count($this->Ini->nm_mens_alert)) {
   if (isset($this->Ini->nm_mens_alert) && !empty($this->Ini->nm_mens_alert))
   {
       if (isset($this->nm_mens_alert) && !empty($this->nm_mens_alert))
       {
           $this->nm_mens_alert   = array_merge($this->Ini->nm_mens_alert, $this->nm_mens_alert);
           $this->nm_params_alert = array_merge($this->Ini->nm_params_alert, $this->nm_params_alert);
       }
       else
       {
           $this->nm_mens_alert   = $this->Ini->nm_mens_alert;
           $this->nm_params_alert = $this->Ini->nm_params_alert;
       }
   }
   if (isset($this->nm_mens_alert) && !empty($this->nm_mens_alert))
   {
       foreach ($this->nm_mens_alert as $i_alert => $mensagem)
       {
           $alertParams = array();
           if (isset($this->nm_params_alert[$i_alert]))
           {
               foreach ($this->nm_params_alert[$i_alert] as $paramName => $paramValue)
               {
                   if (in_array($paramName, array('title', 'timer', 'confirmButtonText', 'confirmButtonFA', 'confirmButtonFAPos', 'cancelButtonText', 'cancelButtonFA', 'cancelButtonFAPos', 'footer', 'width', 'padding')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif (in_array($paramName, array('showConfirmButton', 'showCancelButton', 'toast')) && in_array($paramValue, array(true, false)))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('position' == $paramName && in_array($paramValue, array('top', 'top-start', 'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', 'bottom-end')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('type' == $paramName && in_array($paramValue, array('warning', 'error', 'success', 'info', 'question')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('background' == $paramName)
                   {
                       $image_param = $paramValue;
                       preg_match_all('/url\(([\s])?(["|\'])?(.*?)(["|\'])?([\s])?\)/i', $paramValue, $matches, PREG_PATTERN_ORDER);
                       if (isset($matches[3])) {
                           foreach ($matches[3] as $match) {
                               if ('http:' != substr($match, 0, 5) && 'https:' != substr($match, 0, 6) && '/' != substr($match, 0, 1)) {
                                   $image_param = str_replace($match, "{$this->Ini->path_img_global}/{$match}", $image_param);
                               }
                           }
                       }
                       $paramValue = $image_param;
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
               }
           }
           $jsonParams = json_encode($alertParams);
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['ajax_nav'])
           { 
               $this->Ini->Arr_result['AlertJS'][] = NM_charset_to_utf8($mensagem);
               $this->Ini->Arr_result['AlertJSParam'][] = $alertParams;
           } 
           else 
           { 
?>
       scJs_alert('<?php echo $mensagem ?>', <?php echo $jsonParams ?>);
<?php
           } 
       }
   }
}
?>
});
</script>
<?php
if ('' != $this->Campos_Mens_erro) {
?>
<script type="text/javascript">
$(function() {
	_nmAjaxShowMessage({title: "<?php echo $this->Ini->Nm_lang['lang_errm_errt']; ?>", message: "<?php echo $this->Campos_Mens_erro ?>", isModal: false, timeout: "", showButton: true, buttonLabel: "", topPos: "", leftPos: "", width: "", height: "", redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: false, isToast: false, toastPos: "", type: "error"});
});
</script>
<?php
}
?>
<script type="text/javascript" src="grid_inventario_130521_message.js"></script>
 <SCRIPT type="text/javascript">

<?php
if (is_file($this->Ini->root . $this->Ini->path_link . "_lib/js/tab_erro_" . $this->Ini->str_lang . ".js"))
{
    $Tb_err_js = file($this->Ini->root . $this->Ini->path_link . "_lib/js/tab_erro_" . $this->Ini->str_lang . ".js");
    foreach ($Tb_err_js as $Lines)
    {
        if (NM_is_utf8($Lines) && $_SESSION['scriptcase']['charset'] != "UTF-8")
        {
            $Lines = sc_convert_encoding($Lines, $_SESSION['scriptcase']['charset'], "UTF-8");
        }
        echo $Lines;
    }
}
 $Msg_Inval = "Inv�lido";
 if (NM_is_utf8($Lines) && $_SESSION['scriptcase']['charset'] != "UTF-8")
 {
    $Msg_Inval = sc_convert_encoding($Msg_Inval, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
var SC_crit_inv = "<?php echo $Msg_Inval ?>";
var nmdg_Form = "F1";

function scJQCalendarAdd() {
  $("#sc_inicio_jq").datepicker({
    beforeShow: function(input, inst) {
          var_dt_ini  = document.getElementById('SC_inicio_dia').value + '/';
          var_dt_ini += document.getElementById('SC_inicio_mes').value + '/';
          var_dt_ini += document.getElementById('SC_inicio_ano').value;
          document.getElementById('sc_inicio_jq').value = var_dt_ini;
    },
    onClose: function(dateText, inst) {
          aParts  = dateText.split("/");
          document.getElementById('SC_inicio_dia').value = aParts[0];
          document.getElementById('SC_inicio_mes').value = aParts[1];
          document.getElementById('SC_inicio_ano').value = aParts[2];
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    dayNamesMin: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_sem"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("ddmmyyyy", "/"); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->Ini->path_botoes . "/" . $this->arr_buttons['bcalendario']['image']; ?>",
    buttonImageOnly: true
  });

  $("#sc_fechavenc_jq").datepicker({
    beforeShow: function(input, inst) {
          var_dt_ini  = document.getElementById('SC_fechavenc_dia').value + '/';
          var_dt_ini += document.getElementById('SC_fechavenc_mes').value + '/';
          var_dt_ini += document.getElementById('SC_fechavenc_ano').value;
          document.getElementById('sc_fechavenc_jq').value = var_dt_ini;
    },
    onClose: function(dateText, inst) {
          aParts  = dateText.split("/");
          document.getElementById('SC_fechavenc_dia').value = aParts[0];
          document.getElementById('SC_fechavenc_mes').value = aParts[1];
          document.getElementById('SC_fechavenc_ano').value = aParts[2];
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    dayNamesMin: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_sem"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("ddmmyyyy", "/"); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->Ini->path_botoes . "/" . $this->arr_buttons['bcalendario']['image']; ?>",
    buttonImageOnly: true
  });

  $("#sc_fechavenc_jq2").datepicker({
    beforeShow: function(input, inst) {
          var_dt_ini  = document.getElementById('SC_fechavenc_input_2_dia').value + '/';
          var_dt_ini += document.getElementById('SC_fechavenc_input_2_mes').value + '/';
          var_dt_ini += document.getElementById('SC_fechavenc_input_2_ano').value;
          document.getElementById('sc_fechavenc_jq2').value = var_dt_ini;
    },
    onClose: function(dateText, inst) {
          aParts  = dateText.split("/");
          document.getElementById('SC_fechavenc_input_2_dia').value = aParts[0];
          document.getElementById('SC_fechavenc_input_2_mes').value = aParts[1];
          document.getElementById('SC_fechavenc_input_2_ano').value = aParts[2];
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    dayNamesMin: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_sem"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("ddmmyyyy", "/"); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->Ini->path_botoes . "/" . $this->arr_buttons['bcalendario']['image']; ?>",
    buttonImageOnly: true
  });

  $("#sc_fin_jq").datepicker({
    beforeShow: function(input, inst) {
          var_dt_ini  = document.getElementById('SC_fin_dia').value + '/';
          var_dt_ini += document.getElementById('SC_fin_mes').value + '/';
          var_dt_ini += document.getElementById('SC_fin_ano').value;
          document.getElementById('sc_fin_jq').value = var_dt_ini;
    },
    onClose: function(dateText, inst) {
          aParts  = dateText.split("/");
          document.getElementById('SC_fin_dia').value = aParts[0];
          document.getElementById('SC_fin_mes').value = aParts[1];
          document.getElementById('SC_fin_ano').value = aParts[2];
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    dayNamesMin: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_sem"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("ddmmyyyy", "/"); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->Ini->path_botoes . "/" . $this->arr_buttons['bcalendario']['image']; ?>",
    buttonImageOnly: true
  });

} // scJQCalendarAdd


 $(function() {

   SC_carga_evt_jquery();
   scLoadScInput('input:text.sc-js-input');
   scJQCalendarAdd('');
   Sc_carga_select2('all');
 });
 function nm_campos_between(nm_campo, nm_cond, nm_nome_obj)
 {
  if (nm_cond.value == "bw")
  {
   nm_campo.style.display = "";
  }
  else
  {
    if (nm_campo)
    {
      nm_campo.style.display = "none";
    }
  }
  if (document.getElementById('id_hide_' + nm_nome_obj))
  {
      if (nm_cond.value == "nu" || nm_cond.value == "nn" || nm_cond.value == "ep" || nm_cond.value == "ne")
      {
          document.getElementById('id_hide_' + nm_nome_obj).style.display = 'none';
      }
      else
      {
          document.getElementById('id_hide_' + nm_nome_obj).style.display = '';
      }
  }
 }
 function nm_save_form(pos)
 {
  if (pos == 'top' && document.F1.nmgp_save_name_top.value == '')
  {
      return;
  }
  if (pos == 'bot' && document.F1.nmgp_save_name_bot.value == '')
  {
      return;
  }
  if (pos == 'fields' && document.F1.nmgp_save_name_fields.value == '')
  {
      return;
  }
  var str_out = "";
  str_out += 'SC_idpro_cond#NMF#' + search_get_sel_txt('SC_idpro_cond') + '@NMF@';
  str_out += 'SC_idpro#NMF#' + search_get_text('SC_idpro') + '@NMF@';
  str_out += 'id_ac_idpro#NMF#' + search_get_text('id_ac_idpro') + '@NMF@';
  str_out += 'SC_fecha_cond#NMF#' + search_get_sel_txt('SC_fecha_cond') + '@NMF@';
  str_out += 'SC_fecha_dia#NMF#' + search_get_sel_txt('SC_fecha_dia') + '@NMF@';
  str_out += 'SC_fecha_mes#NMF#' + search_get_sel_txt('SC_fecha_mes') + '@NMF@';
  str_out += 'SC_fecha_ano#NMF#' + search_get_sel_txt('SC_fecha_ano') + '@NMF@';
  str_out += 'SC_fecha_input_2_dia#NMF#' + search_get_sel_txt('SC_fecha_input_2_dia') + '@NMF@';
  str_out += 'SC_fecha_input_2_mes#NMF#' + search_get_sel_txt('SC_fecha_input_2_mes') + '@NMF@';
  str_out += 'SC_fecha_input_2_ano#NMF#' + search_get_sel_txt('SC_fecha_input_2_ano') + '@NMF@';
  str_out += 'SC_cantidad_cond#NMF#' + search_get_sel_txt('SC_cantidad_cond') + '@NMF@';
  str_out += 'SC_cantidad#NMF#' + search_get_text('SC_cantidad') + '@NMF@';
  str_out += 'id_ac_cantidad#NMF#' + search_get_title('select2-id_ac_cantidad-container') + '@NMF@';
  str_out += 'SC_cantidad_input_2#NMF#' + search_get_text('SC_cantidad_input_2') + '@NMF@';
  str_out += 'SC_idbod_cond#NMF#' + search_get_sel_txt('SC_idbod_cond') + '@NMF@';
  str_out += 'SC_idbod#NMF#' + search_get_select('SC_idbod') + '@NMF@';
  str_out += 'SC_idcombo_cond#NMF#' + search_get_sel_txt('SC_idcombo_cond') + '@NMF@';
  str_out += 'SC_idcombo#NMF#' + search_get_text('SC_idcombo') + '@NMF@';
  str_out += 'id_ac_idcombo#NMF#' + search_get_text('id_ac_idcombo') + '@NMF@';
  str_out += 'SC_escombo_cond#NMF#' + search_get_sel_txt('SC_escombo_cond') + '@NMF@';
  str_out += 'SC_escombo#NMF#' + search_get_select('SC_escombo') + '@NMF@';
  str_out += 'SC_tipo_cond#NMF#' + search_get_sel_txt('SC_tipo_cond') + '@NMF@';
  str_out += 'SC_tipo#NMF#' + search_get_select('SC_tipo') + '@NMF@';
  str_out += 'SC_grupo_cond#NMF#' + search_get_sel_txt('SC_grupo_cond') + '@NMF@';
  str_out += 'SC_grupo#NMF#' + search_get_text('SC_grupo') + '@NMF@';
  str_out += 'id_ac_grupo#NMF#' + search_get_text('id_ac_grupo') + '@NMF@';
  str_out += 'SC_inicio_cond#NMF#' + search_get_sel_txt('SC_inicio_cond') + '@NMF@';
  str_out += 'SC_inicio_dia#NMF#' + search_get_sel_txt('SC_inicio_dia') + '@NMF@';
  str_out += 'SC_inicio_mes#NMF#' + search_get_sel_txt('SC_inicio_mes') + '@NMF@';
  str_out += 'SC_inicio_ano#NMF#' + search_get_sel_txt('SC_inicio_ano') + '@NMF@';
  str_out += 'SC_inicio_input_2_dia#NMF#' + search_get_sel_txt('SC_inicio_input_2_dia') + '@NMF@';
  str_out += 'SC_inicio_input_2_mes#NMF#' + search_get_sel_txt('SC_inicio_input_2_mes') + '@NMF@';
  str_out += 'SC_inicio_input_2_ano#NMF#' + search_get_sel_txt('SC_inicio_input_2_ano') + '@NMF@';
  str_out += 'SC_inicio_hor#NMF#' + search_get_sel_txt('SC_inicio_hor') + '@NMF@';
  str_out += 'SC_inicio_min#NMF#' + search_get_sel_txt('SC_inicio_min') + '@NMF@';
  str_out += 'SC_inicio_seg#NMF#' + search_get_sel_txt('SC_inicio_seg') + '@NMF@';
  str_out += 'SC_inicio_input_2_hor#NMF#' + search_get_sel_txt('SC_inicio_input_2_hor') + '@NMF@';
  str_out += 'SC_inicio_input_2_min#NMF#' + search_get_sel_txt('SC_inicio_input_2_min') + '@NMF@';
  str_out += 'SC_inicio_input_2_seg#NMF#' + search_get_sel_txt('SC_inicio_input_2_seg') + '@NMF@';
  str_out += 'SC_fin_cond#NMF#' + search_get_sel_txt('SC_fin_cond') + '@NMF@';
  str_out += 'SC_fin_dia#NMF#' + search_get_sel_txt('SC_fin_dia') + '@NMF@';
  str_out += 'SC_fin_mes#NMF#' + search_get_sel_txt('SC_fin_mes') + '@NMF@';
  str_out += 'SC_fin_ano#NMF#' + search_get_sel_txt('SC_fin_ano') + '@NMF@';
  str_out += 'SC_fin_input_2_dia#NMF#' + search_get_sel_txt('SC_fin_input_2_dia') + '@NMF@';
  str_out += 'SC_fin_input_2_mes#NMF#' + search_get_sel_txt('SC_fin_input_2_mes') + '@NMF@';
  str_out += 'SC_fin_input_2_ano#NMF#' + search_get_sel_txt('SC_fin_input_2_ano') + '@NMF@';
  str_out += 'SC_fin_hor#NMF#' + search_get_sel_txt('SC_fin_hor') + '@NMF@';
  str_out += 'SC_fin_min#NMF#' + search_get_sel_txt('SC_fin_min') + '@NMF@';
  str_out += 'SC_fin_seg#NMF#' + search_get_sel_txt('SC_fin_seg') + '@NMF@';
  str_out += 'SC_fin_input_2_hor#NMF#' + search_get_sel_txt('SC_fin_input_2_hor') + '@NMF@';
  str_out += 'SC_fin_input_2_min#NMF#' + search_get_sel_txt('SC_fin_input_2_min') + '@NMF@';
  str_out += 'SC_fin_input_2_seg#NMF#' + search_get_sel_txt('SC_fin_input_2_seg') + '@NMF@';
  str_out += 'SC_fechavenc_cond#NMF#' + search_get_sel_txt('SC_fechavenc_cond') + '@NMF@';
  str_out += 'SC_fechavenc_dia#NMF#' + search_get_sel_txt('SC_fechavenc_dia') + '@NMF@';
  str_out += 'SC_fechavenc_mes#NMF#' + search_get_sel_txt('SC_fechavenc_mes') + '@NMF@';
  str_out += 'SC_fechavenc_ano#NMF#' + search_get_sel_txt('SC_fechavenc_ano') + '@NMF@';
  str_out += 'SC_fechavenc_input_2_dia#NMF#' + search_get_sel_txt('SC_fechavenc_input_2_dia') + '@NMF@';
  str_out += 'SC_fechavenc_input_2_mes#NMF#' + search_get_sel_txt('SC_fechavenc_input_2_mes') + '@NMF@';
  str_out += 'SC_fechavenc_input_2_ano#NMF#' + search_get_sel_txt('SC_fechavenc_input_2_ano') + '@NMF@';
  str_out += 'SC_lote2_cond#NMF#' + search_get_sel_txt('SC_lote2_cond') + '@NMF@';
  str_out += 'SC_lote2#NMF#' + search_get_text('SC_lote2') + '@NMF@';
  str_out += 'id_ac_lote2#NMF#' + search_get_title('select2-id_ac_lote2-container') + '@NMF@';
  str_out += 'SC_NM_operador#NMF#' + search_get_text('SC_NM_operador');
  str_out  = str_out.replace(/[+]/g, "__NM_PLUS__");
  str_out  = str_out.replace(/[&]/g, "__NM_AMP__");
  str_out  = str_out.replace(/[%]/g, "__NM_PRC__");
  var save_name = search_get_text('SC_nmgp_save_name_' + pos);
  var save_opt  = search_get_sel_txt('SC_nmgp_save_option_' + pos);
  ajax_save_filter(save_name, save_opt, str_out, pos);
 }
 function nm_submit_filter(obj_sel, pos)
 {
  index = obj_sel.selectedIndex;
  if (index == -1 || obj_sel.options[index].value == "") 
  {
      return false;
  }
  ajax_select_filter(obj_sel.options[index].value);
 }
 function nm_submit_filter_del(pos)
 {
  obj_sel = document.F1.elements['NM_filters_del_' + pos];
  index   = obj_sel.selectedIndex;
  if (index == -1 || obj_sel.options[index].value == "") 
  {
      return false;
  }
  parm = obj_sel.options[index].value;
  ajax_delete_filter(parm);
 }
 function search_get_select(obj_id)
 {
    var index = document.getElementById(obj_id).selectedIndex;
    if (index != -1) {
        return document.getElementById(obj_id).options[index].value;
    }
    else {
        return '';
    }
 }
 function search_get_selmult(obj_id)
 {
    var obj = document.getElementById(obj_id);
    var val = "_NM_array_";
    for (iSelect = 0; iSelect < obj.length; iSelect++)
    {
        if (obj[iSelect].selected)
        {
            val += "#NMARR#" + obj[iSelect].value;
        }
    }
    return val;
 }
 function search_get_Dselelect(obj_id)
 {
    var obj = document.getElementById(obj_id);
    var val = "_NM_array_";
    for (iSelect = 0; iSelect < obj.length; iSelect++)
    {
         val += "#NMARR#" + obj[iSelect].value;
    }
    return val;
 }
 function search_get_radio(obj_id)
 {
    var val  = "";
    if (document.getElementById(obj_id)) {
       var Nobj = document.getElementById(obj_id).name;
       var obj  = document.getElementsByName(Nobj);
       for (iRadio = 0; iRadio < obj.length; iRadio++) {
           if (obj[iRadio].checked) {
               val = obj[iRadio].value;
           }
       }
    }
    return val;
 }
 function search_get_checkbox(obj_id)
 {
    var val  = "_NM_array_";
    if (document.getElementById(obj_id)) {
       var Nobj = document.getElementById(obj_id).name;
       var obj  = document.getElementsByName(Nobj);
       if (!obj.length) {
           if (obj.checked) {
               val += "#NMARR#" + obj.value;
           }
       }
       else {
           for (iCheck = 0; iCheck < obj.length; iCheck++) {
               if (obj[iCheck].checked) {
                   val += "#NMARR#" + obj[iCheck].value;
               }
           }
       }
    }
    return val;
 }
 function search_get_text(obj_id)
 {
    var obj = document.getElementById(obj_id);
    return (obj) ? obj.value : '';
 }
 function search_get_title(obj_id)
 {
    var obj = document.getElementById(obj_id);
    return (obj) ? obj.title : '';
 }
 function search_get_sel_txt(obj_id)
 {
    var val = "";
    obj_part  = document.getElementById(obj_id);
    if (obj_part && obj_part.type.substr(0, 6) == 'select')
    {
        val = search_get_select(obj_id);
    }
    else
    {
        val = (obj_part) ? obj_part.value : '';
    }
    return val;
 }
 function search_get_html(obj_id)
 {
    var obj = document.getElementById(obj_id);
    return obj.innerHTML;
 }
function nm_open_popup(parms)
{
    NovaJanela = window.open (parms, '', 'resizable, scrollbars');
}
 </SCRIPT>
<script type="text/javascript">
 $(function() {
   scClass = $("#id_ac_idpro").attr('class').split(' ');
   scClass = scClass[ scClass.length-1 ];
   $("#id_ac_idpro").autocomplete({
     minLength: 1,
     classes: { 'ui-autocomplete': scClass + 'Ac' },
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_idpro",
          max_itens: "10",
          cod_desc: "N",
          script_case_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         if (data == "ss_time_out") {
             nm_move();
         }
         response(data);
       }
      });
    },
     select: function (event, ui) {
       ui.item.label = ui.item.label.toUpperCase();
       $("#SC_idpro").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       ui.item.label = ui.item.label.toUpperCase();
       $("#SC_idpro").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_idpro").val( $(this).val() );
       }
     }
   });
   scClass = $("#id_ac_idcombo").attr('class').split(' ');
   scClass = scClass[ scClass.length-1 ];
   $("#id_ac_idcombo").autocomplete({
     minLength: 1,
     classes: { 'ui-autocomplete': scClass + 'Ac' },
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_idcombo",
          max_itens: "10",
          cod_desc: "N",
          script_case_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         if (data == "ss_time_out") {
             nm_move();
         }
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_idcombo").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_idcombo").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_idcombo").val( $(this).val() );
       }
     }
   });
  $(".sc-ui-autocomp-cantidad").on("focus", function() {
  }).on("blur", function() {
  }).on("keydown", function(e) {
   if(e.keyCode == $.ui.keyCode.TAB && $(".ui-autocomplete").filter(":visible").length) {
    e.keyCode = $.ui.keyCode.DOWN;
    $(this).trigger(e);
    e.keyCode = $.ui.keyCode.ENTER;
    $(this).trigger(e);
   }
  }).select2({
   minimumInputLength: 1,
   language: {
    inputTooShort: function() {
     return "<?php echo sprintf($this->Ini->Nm_lang['lang_autocomp_tooshort'], 1) ?>";
    },
    containerCssClass: 'scGridFilterDivResult',
    dropdownCssClass: 'scGridFilterDivDropdown',
    noResults: function() {
     return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
    },
    searching: function() {
     return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
    }
   },
   width: "300px",
   ajax: {
    url: "index.php",
    dataType: "json",
    processResults: function (data) {
      if (data == "ss_time_out") {
          nm_move();
      }
      return data;
    },
    data: function (params) {
     var query = {
      q: params.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_cantidad",
      max_itens: "10",
      script_case_init: <?php echo $this->Ini->sc_page ?>
     }
     return query;
    }
   }
  }).on("select2:select", function(e) {;
   $("#SC_cantidad").val(e.params.data.id);
  });
  $(".sc-ui-autocomp-lote2").on("focus", function() {
  }).on("blur", function() {
  }).on("keydown", function(e) {
   if(e.keyCode == $.ui.keyCode.TAB && $(".ui-autocomplete").filter(":visible").length) {
    e.keyCode = $.ui.keyCode.DOWN;
    $(this).trigger(e);
    e.keyCode = $.ui.keyCode.ENTER;
    $(this).trigger(e);
   }
  }).select2({
   minimumInputLength: 1,
   language: {
    inputTooShort: function() {
     return "<?php echo sprintf($this->Ini->Nm_lang['lang_autocomp_tooshort'], 1) ?>";
    },
    containerCssClass: 'scGridFilterDivResult',
    dropdownCssClass: 'scGridFilterDivDropdown',
    noResults: function() {
     return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
    },
    searching: function() {
     return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
    }
   },
   width: "300px",
   ajax: {
    url: "index.php",
    dataType: "json",
    processResults: function (data) {
      if (data == "ss_time_out") {
          nm_move();
      }
      return data;
    },
    data: function (params) {
     var query = {
      q: params.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_lote2",
      max_itens: "10",
      script_case_init: <?php echo $this->Ini->sc_page ?>
     }
     return query;
    }
   }
  }).on("select2:select", function(e) {;
   $("#SC_lote2").val(e.params.data.id);
  });
   scClass = $("#id_ac_grupo").attr('class').split(' ');
   scClass = scClass[ scClass.length-1 ];
   $("#id_ac_grupo").autocomplete({
     minLength: 1,
     classes: { 'ui-autocomplete': scClass + 'Ac' },
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_grupo",
          max_itens: "10",
          cod_desc: "N",
          script_case_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         if (data == "ss_time_out") {
             nm_move();
         }
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_grupo").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     focus: function (event, ui) {
       $("#SC_grupo").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_grupo").val( $(this).val() );
       }
     }
   });
 });
</script>
 <FORM name="F1" action="./" method="post" target="_self"> 
 <INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
 <INPUT type="hidden" name="nmgp_opcao" value="busca"> 
 <div id="idJSSpecChar" style="display:none;"></div>
 <div id="id_div_process" style="display: none; position: absolute"><table class="scFilterTable"><tr><td class="scFilterLabelOdd"><?php echo $this->Ini->Nm_lang['lang_othr_prcs']; ?>...</td></tr></table></div>
 <div id="id_fatal_error" class="scFilterFieldOdd" style="display:none; position: absolute"></div>
<TABLE id="main_table" align="center" valign="top" >
<tr>
<td>
<div class="scFilterBorder">
  <div id="id_div_process_block" style="display: none; margin: 10px; whitespace: nowrap"><span class="scFormProcess"><img border="0" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" />&nbsp;<?php echo $this->Ini->Nm_lang['lang_othr_prcs'] ?>...</span></div>
<table cellspacing=0 cellpadding=0 width='100%'>
<?php
   }

   /**
    * @access  public
    * @global  string  $bprocessa  
    */
   /**
    * @access  public
    */
   function monta_cabecalho()
   {
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['dashboard_info']['compact_mode'])
      {
          return;
      }
      $Str_date = strtolower($_SESSION['scriptcase']['reg_conf']['date_format']);
      $Lim   = strlen($Str_date);
      $Ult   = "";
      $Arr_D = array();
      for ($I = 0; $I < $Lim; $I++)
      {
          $Char = substr($Str_date, $I, 1);
          if ($Char != $Ult)
          {
              $Arr_D[] = $Char;
          }
          $Ult = $Char;
      }
      $Prim = true;
      $Str  = "";
      foreach ($Arr_D as $Cada_d)
      {
          $Str .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
          $Str .= $Cada_d;
          $Prim = false;
      }
      $Str = str_replace("a", "Y", $Str);
      $Str = str_replace("y", "Y", $Str);
      $nm_data_fixa = date($Str); 
?>
 <TR align="center">
  <TD class="scFilterTableTd">
<style>
#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 
#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}
</style>

<div style="width: 100%">
 <div class="scFilterHeader" style="height:11px; display: block; border-width:0px; "></div>
 <div style="height:37px; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block">
 	<table style="width:100%; border-collapse:collapse; padding:0;">
    	<tr>
        	<td id="lin1_col1" class="scFilterHeaderFont"><span><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> -Rotación del inventario</span></td>
            <td id="lin1_col2" class="scFilterHeaderFont"><span><?php echo $nm_data_fixa; ?></span></td>
        </tr>
    </table>		 
 </div>
</div>
  </TD>
 </TR>
<?php
   }

   /**
    * @access  public
    * @global  string  $nm_url_saida  $this->Ini->Nm_lang['pesq_global_nm_url_saida']
    * @global  integer  $nm_apl_dependente  $this->Ini->Nm_lang['pesq_global_nm_apl_dependente']
    * @global  string  $nmgp_parms  
    * @global  string  $bprocessa  $this->Ini->Nm_lang['pesq_global_bprocessa']
    */
   function monta_form()
   {
      global 
             $idpro_cond, $idpro, $idpro_autocomp,
             $fecha_cond, $fecha, $fecha_dia, $fecha_mes, $fecha_ano, $fecha_input_2_dia, $fecha_input_2_mes, $fecha_input_2_ano,
             $cantidad_cond, $cantidad, $cantidad_input_2, $cantidad_autocomp,
             $idbod_cond, $idbod,
             $idcombo_cond, $idcombo, $idcombo_autocomp,
             $escombo_cond, $escombo,
             $tipo_cond, $tipo,
             $grupo_cond, $grupo, $grupo_autocomp,
             $inicio_cond, $inicio, $inicio_dia, $inicio_mes, $inicio_ano, $inicio_hor, $inicio_min, $inicio_seg,
             $fin_cond, $fin, $fin_dia, $fin_mes, $fin_ano, $fin_hor, $fin_min, $fin_seg,
             $fechavenc_cond, $fechavenc, $fechavenc_dia, $fechavenc_mes, $fechavenc_ano, $fechavenc_input_2_dia, $fechavenc_input_2_mes, $fechavenc_input_2_ano,
             $lote2_cond, $lote2, $lote2_autocomp,
             $nm_url_saida, $nm_apl_dependente, $nmgp_parms, $bprocessa, $nmgp_save_name, $NM_operador, $NM_filters, $nmgp_save_option, $NM_filters_del, $Script_BI;
      $Script_BI = "";
      $this->nmgp_botoes['clear'] = "on";
      $this->nmgp_botoes['save'] = "on";
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_inventario_130521']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_inventario_130521']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_inventario_130521']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("grid_inventario_130521", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $nmgp_tab_label = "";
      $delimitador = "##@@";
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']) && $bprocessa != "recarga" && $bprocessa != "save_form" && $bprocessa != "filter_save" && $bprocessa != "filter_delete")
      {
      }
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']) && $bprocessa != "recarga" && $bprocessa != "save_form" && $bprocessa != "filter_save" && $bprocessa != "filter_delete")
      { 
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca'], $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $idpro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['idpro']; 
          $idpro_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['idpro_cond']; 
          $fecha_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fecha_dia']; 
          $fecha_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fecha_mes']; 
          $fecha_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fecha_ano']; 
          $fecha_input_2_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fecha_input_2_dia']; 
          $fecha_input_2_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fecha_input_2_mes']; 
          $fecha_input_2_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fecha_input_2_ano']; 
          $fecha_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fecha_cond']; 
          $cantidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['cantidad']; 
          $cantidad_input_2 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['cantidad_input_2']; 
          $cantidad_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['cantidad_cond']; 
          $idbod = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['idbod']; 
          $idbod_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['idbod_cond']; 
          $idcombo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['idcombo']; 
          $idcombo_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['idcombo_cond']; 
          $escombo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['escombo']; 
          $escombo_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['escombo_cond']; 
          $tipo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['tipo']; 
          $tipo_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['tipo_cond']; 
          $grupo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['grupo']; 
          $grupo_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['grupo_cond']; 
          $inicio_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['inicio_dia']; 
          $inicio_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['inicio_mes']; 
          $inicio_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['inicio_ano']; 
          $inicio_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['inicio_hor']; 
          $inicio_min = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['inicio_min']; 
          $inicio_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['inicio_seg']; 
          $inicio_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['inicio_cond']; 
          $fin_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fin_dia']; 
          $fin_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fin_mes']; 
          $fin_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fin_ano']; 
          $fin_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fin_hor']; 
          $fin_min = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fin_min']; 
          $fin_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fin_seg']; 
          $fin_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fin_cond']; 
          $fechavenc_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fechavenc_dia']; 
          $fechavenc_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fechavenc_mes']; 
          $fechavenc_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fechavenc_ano']; 
          $fechavenc_input_2_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fechavenc_input_2_dia']; 
          $fechavenc_input_2_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fechavenc_input_2_mes']; 
          $fechavenc_input_2_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fechavenc_input_2_ano']; 
          $fechavenc_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fechavenc_cond']; 
          $lote2 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['lote2']; 
          $lote2_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['lote2_cond']; 
          $this->NM_operador = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['NM_operador']; 
      } 
      if (!isset($idpro_cond) || empty($idpro_cond))
      {
         $idpro_cond = "eq";
      }
      if (!isset($fecha_cond) || empty($fecha_cond))
      {
         $fecha_cond = "eq";
      }
      if (!isset($cantidad_cond) || empty($cantidad_cond))
      {
         $cantidad_cond = "gt";
      }
      if (!isset($idbod_cond) || empty($idbod_cond))
      {
         $idbod_cond = "eq";
      }
      if (!isset($idcombo_cond) || empty($idcombo_cond))
      {
         $idcombo_cond = "eq";
      }
      if (!isset($escombo_cond) || empty($escombo_cond))
      {
         $escombo_cond = "eq";
      }
      if (!isset($tipo_cond) || empty($tipo_cond))
      {
         $tipo_cond = "eq";
      }
      if (!isset($grupo_cond) || empty($grupo_cond))
      {
         $grupo_cond = "eq";
      }
      if (!isset($inicio_cond) || empty($inicio_cond))
      {
         $inicio_cond = "ge";
      }
      if (!isset($fin_cond) || empty($fin_cond))
      {
         $fin_cond = "le";
      }
      if (!isset($fechavenc_cond) || empty($fechavenc_cond))
      {
         $fechavenc_cond = "eq";
      }
      if (!isset($lote2_cond) || empty($lote2_cond))
      {
         $lote2_cond = "qp";
      }
      $display_aberto  = "style=display:";
      $display_fechado = "style=display:none";
      $opc_hide_input = array("nu","nn","ep","ne");
      $str_hide_idpro = (in_array($idpro_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_fecha = (in_array($fecha_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_cantidad = (in_array($cantidad_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_idbod = (in_array($idbod_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_idcombo = (in_array($idcombo_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_escombo = (in_array($escombo_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_tipo = (in_array($tipo_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_grupo = (in_array($grupo_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_inicio = (in_array($inicio_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_fin = (in_array($fin_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_fechavenc = (in_array($fechavenc_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_lote2 = (in_array($lote2_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;

      $str_display_idpro = ('bw' == $idpro_cond) ? $display_aberto : $display_fechado;
      $str_display_fecha = ('bw' == $fecha_cond) ? $display_aberto : $display_fechado;
      $str_display_cantidad = ('bw' == $cantidad_cond) ? $display_aberto : $display_fechado;
      $str_display_idbod = ('bw' == $idbod_cond) ? $display_aberto : $display_fechado;
      $str_display_idcombo = ('bw' == $idcombo_cond) ? $display_aberto : $display_fechado;
      $str_display_escombo = ('bw' == $escombo_cond) ? $display_aberto : $display_fechado;
      $str_display_tipo = ('bw' == $tipo_cond) ? $display_aberto : $display_fechado;
      $str_display_grupo = ('bw' == $grupo_cond) ? $display_aberto : $display_fechado;
      $str_display_inicio = ('bw' == $inicio_cond) ? $display_aberto : $display_fechado;
      $str_display_fin = ('bw' == $fin_cond) ? $display_aberto : $display_fechado;
      $str_display_fechavenc = ('bw' == $fechavenc_cond) ? $display_aberto : $display_fechado;
      $str_display_lote2 = ('bw' == $lote2_cond) ? $display_aberto : $display_fechado;

      if (!isset($idpro) || $idpro == "")
      {
          $idpro = "";
      }
      if (isset($idpro) && !empty($idpro))
      {
         $tmp_pos = strpos($idpro, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $idpro = substr($idpro, 0, $tmp_pos);
         }
      }
      if (!isset($fecha) || $fecha == "")
      {
          $fecha = "";
      }
      if (isset($fecha) && !empty($fecha))
      {
         $tmp_pos = strpos($fecha, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $fecha = substr($fecha, 0, $tmp_pos);
         }
      }
      if (!isset($cantidad) || $cantidad == "")
      {
          $cantidad = "";
      }
      if (isset($cantidad) && !empty($cantidad))
      {
         $tmp_pos = strpos($cantidad, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $cantidad = substr($cantidad, 0, $tmp_pos);
         }
      }
      if (!isset($idbod) || $idbod == "")
      {
          $idbod = "";
      }
      if (isset($idbod) && !empty($idbod))
      {
         $tmp_pos = strpos($idbod, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $idbod = substr($idbod, 0, $tmp_pos);
         }
      }
      if (!isset($idcombo) || $idcombo == "")
      {
          $idcombo = "";
      }
      if (isset($idcombo) && !empty($idcombo))
      {
         $tmp_pos = strpos($idcombo, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $idcombo = substr($idcombo, 0, $tmp_pos);
         }
      }
      if (!isset($escombo) || $escombo == "")
      {
          $escombo = "";
      }
      if (isset($escombo) && !empty($escombo))
      {
         $tmp_pos = strpos($escombo, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $escombo = substr($escombo, 0, $tmp_pos);
         }
      }
      if (!isset($tipo) || $tipo == "")
      {
          $tipo = "";
      }
      if (isset($tipo) && !empty($tipo))
      {
         $tmp_pos = strpos($tipo, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $tipo = substr($tipo, 0, $tmp_pos);
         }
      }
      if (!isset($grupo) || $grupo == "")
      {
          $grupo = "";
      }
      if (isset($grupo) && !empty($grupo))
      {
         $tmp_pos = strpos($grupo, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $grupo = substr($grupo, 0, $tmp_pos);
         }
      }
      if (!isset($inicio) || $inicio == "")
      {
          $inicio = "";
      }
      if (isset($inicio) && !empty($inicio))
      {
         $tmp_pos = strpos($inicio, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $inicio = substr($inicio, 0, $tmp_pos);
         }
      }
      if (!isset($fin) || $fin == "")
      {
          $fin = "";
      }
      if (isset($fin) && !empty($fin))
      {
         $tmp_pos = strpos($fin, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $fin = substr($fin, 0, $tmp_pos);
         }
      }
      if (!isset($fechavenc) || $fechavenc == "")
      {
          $fechavenc = "";
      }
      if (isset($fechavenc) && !empty($fechavenc))
      {
         $tmp_pos = strpos($fechavenc, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $fechavenc = substr($fechavenc, 0, $tmp_pos);
         }
      }
      if (!isset($lote2) || $lote2 == "")
      {
          $lote2 = "";
      }
      if (isset($lote2) && !empty($lote2))
      {
         $tmp_pos = strpos($lote2, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $lote2 = substr($lote2, 0, $tmp_pos);
         }
      }
?>
 <TR align="center">
  <TD class="scFilterTableTd">
   <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
   <TR valign="top" >
  <TD width="100%" height="">
   <TABLE class="scFilterTable" id="hidden_bloco_0" valign="top" width="100%" style="height: 100%;">
   <tr>





      <TD id='SC_idpro_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['idpro'])) ? $this->New_label['idpro'] : "Producto"; ?></TD>
      
      <INPUT type="hidden" id="SC_idpro_cond" name="idpro_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_idpro" <?php echo $str_hide_idpro?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['idpro'])) ? $this->New_label['idpro'] : "Producto";
 $nmgp_tab_label .= "idpro?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($idpro != "")
      {
      $idpro_look = substr($this->Db->qstr($idpro), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($idpro))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "select idprod, codigobar + ' - ' + nompro from productos where idprod = $idpro_look order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "select idprod, concat(codigobar,' - ',nompro) from productos where idprod = $idpro_look order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select idprod, codigobar&' - '&nompro from productos where idprod = $idpro_look order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "select idprod, codigobar||' - '||nompro from productos where idprod = $idpro_look order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nm_comando = "select idprod, codigobar + ' - ' + nompro from productos where idprod = $idpro_look order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "select idprod, codigobar||' - '||nompro from productos where idprod = $idpro_look order by codigobar, nompro" ; 
      } 
      else 
      { 
          $nm_comando = "select idprod, codigobar||' - '||nompro from productos where idprod = $idpro_look order by codigobar, nompro" ; 
      } 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $cmp2 = trim($rs->fields[1]);
            $nmgp_def_dados[] = array($cmp1 => $cmp2); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
   } 
      }
      if (isset($nmgp_def_dados[0][$idpro]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$idpro];
      }
      else
      {
          $sAutocompValue = $idpro;
      }
?>
<INPUT  type="text" id="SC_idpro" name="idpro" value="<?php echo NM_encode_input($idpro) ?>"  size=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '', lettersCase: 'upper', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_idpro" name="idpro_autocomp" size="30"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 30, allowedChars: '', lettersCase: 'upper', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_fecha_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['fecha'])) ? $this->New_label['fecha'] : "Fecha Doc"; ?></TD>
     <TD class="scFilterFieldEven"> 
      <SELECT class="scFilterObjectEven" id="SC_fecha_cond" name="fecha_cond" onChange="nm_campos_between(document.getElementById('id_vis_fecha'), this, 'fecha')">
       <OPTION value="eq" <?php if ("eq" == $fecha_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="gt" <?php if ("gt" == $fecha_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_grtr'] ?></OPTION>
       <OPTION value="lt" <?php if ("lt" == $fecha_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_less'] ?></OPTION>
       <OPTION value="bw" <?php if ("bw" == $fecha_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_betw'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_fecha" <?php echo $str_hide_fecha?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['fecha'])) ? $this->New_label['fecha'] : "Fecha Doc";
 $nmgp_tab_label .= "fecha?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>

<?php
  $Form_base = "ddmmyyyy";
  $date_format_show = "";
  $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
  $Lim   = strlen($Str_date);
  $Str   = "";
  $Ult   = "";
  $Arr_D = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_date, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_D[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_D[] = $Str;
  $Prim = true;
  foreach ($Arr_D as $Cada_d)
  {
      if (strpos($Form_base, $Cada_d) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
          $date_format_show .= $Cada_d;
          $Prim = false;
      }
  }
  $Arr_format = $Arr_D;
  $date_format_show = str_replace("dd",   $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
  $date_format_show = str_replace("mm",   $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
  $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("hh",   $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
  $date_format_show = str_replace("ii",   $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
  $date_format_show = str_replace("ss",   $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
  $date_format_show = "" . $date_format_show .  "";

?>

         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<span id='id_date_part_fecha_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_fecha_dia" name="fecha_dia" value="<?php echo NM_encode_input($fecha_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_fecha_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_fecha_mes" name="fecha_mes" value="<?php echo NM_encode_input($fecha_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_fecha_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_fecha_ano" name="fecha_ano" value="<?php echo NM_encode_input($fecha_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 </span>

<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_fecha"  class="scFilterFieldFontEven">
 <?php echo $date_format_show ?>         </SPAN>
                 </TD>
       </TR>
       <TR valign="top">
        <TD id="id_vis_fecha"  <?php echo $str_display_fecha; ?> class="scFilterFieldFontEven">
         <?php echo $date_sep_bw ?>
         <BR>
         
         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<span id='id_date_part_fecha_input_2_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_fecha_input_2_dia" name="fecha_input_2_dia" value="<?php echo NM_encode_input($fecha_input_2_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_fecha_input_2_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_fecha_input_2_mes" name="fecha_input_2_mes" value="<?php echo NM_encode_input($fecha_input_2_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_fecha_input_2_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_fecha_input_2_ano" name="fecha_input_2_ano" value="<?php echo NM_encode_input($fecha_input_2_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 </span>

<?php
  }
?>

<?php

}

?>

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_cantidad_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['cantidad'])) ? $this->New_label['cantidad'] : "Cantidad"; ?></TD>
     <TD class="scFilterFieldOdd"> 
      <SELECT class="scFilterObjectOdd" id="SC_cantidad_cond" name="cantidad_cond" onChange="nm_campos_between(document.getElementById('id_vis_cantidad'), this, 'cantidad')">
       <OPTION value="gt" <?php if ("gt" == $cantidad_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_grtr'] ?></OPTION>
       <OPTION value="lt" <?php if ("lt" == $cantidad_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_less'] ?></OPTION>
       <OPTION value="eq" <?php if ("eq" == $cantidad_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="bw" <?php if ("bw" == $cantidad_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_betw'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_cantidad" <?php echo $str_hide_cantidad?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['cantidad'])) ? $this->New_label['cantidad'] : "Cantidad";
 $nmgp_tab_label .= "cantidad?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($cantidad != "")
      {
      $cantidad_look = substr($this->Db->qstr($cantidad), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($cantidad))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct cantidad from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2 FROM      inventario ) nm_sel_esp where cantidad = $cantidad_look"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct cantidad from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2 FROM      inventario ) nm_sel_esp where cantidad = $cantidad_look"; 
      }
      else
      {
          $nm_comando = "select distinct cantidad from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2 FROM      inventario ) nm_sel_esp where cantidad = $cantidad_look"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
              nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "3", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
   } 
      }
      if (isset($nmgp_def_dados[0][$cantidad]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$cantidad];
      }
      else
      {
              nmgp_Form_Num_Val($cantidad, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "3", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          $sAutocompValue = $cantidad;
      }
?>
<INPUT  type="text" id="SC_cantidad" name="cantidad" value="<?php echo NM_encode_input($cantidad) ?>" size=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<select class="sc-js-input scFilterObjectOdd sc-ui-autocomp-cantidad" id="id_ac_cantidad" name="cantidad_autocomp"><?php if ('' !=  $cantidad) { ?><option value="<?php echo $cantidad ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select>        </TD>
       </TR>
       <TR valign="top">
        <TD id="id_vis_cantidad"  <?php echo $str_display_cantidad; ?> class="scFilterFieldFontOdd">
         <?php echo $date_sep_bw ?>&nbsp;
         <BR>
         <INPUT type="text" id="SC_cantidad_input_2" name="cantidad_input_2" value="<?php echo NM_encode_input($cantidad_input_2) ?>"  size=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" class="sc-js-input sc-js-input scFilterObjectOdd">

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_idbod_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['idbod'])) ? $this->New_label['idbod'] : "Ubicación"; ?></TD>
      
      <INPUT type="hidden" id="SC_idbod_cond" name="idbod_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_idbod" <?php echo $str_hide_idbod?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['idbod'])) ? $this->New_label['idbod'] : "Ubicación";
 $nmgp_tab_label .= "idbod?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>

<?php
      $idbod_look = substr($this->Db->qstr($idbod), 1, -1); 
      $nmgp_def_dados = "" ; 
      $nm_comando = "SELECT idbodega, bodega  FROM bodegas  ORDER BY bodega"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['psq_check_ret']['idbod'] = array();
         while (!$rs->EOF) 
         { 
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['psq_check_ret']['idbod'][] = trim($rs->fields[0]);
            $nmgp_def_dados .= trim($rs->fields[1]) . "?#?" ; 
            $nmgp_def_dados .= trim($rs->fields[0]) . "?#?N?@?" ; 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
?>
   <span id="idAjaxSelect_idbod">
      <SELECT class="scFilterObjectEven" id="SC_idbod" name="idbod"  size="1">
       <OPTION value="">SELECCIONE</OPTION>
<?php
      $nm_opcoesx = str_replace("?#?@?#?", "?#?@ ?#?", $nmgp_def_dados);
      $nm_opcoes  = explode("?@?", $nm_opcoesx);
      foreach ($nm_opcoes as $nm_opcao)
      {
         if (!empty($nm_opcao))
         {
            $temp_bug_list = explode("?#?", $nm_opcao);
            list($nm_opc_val, $nm_opc_cod, $nm_opc_sel) = $temp_bug_list;
            if ($nm_opc_cod == "@ ") {$nm_opc_cod = trim($nm_opc_cod); }
            if ("" != $idbod)
            {
                    $idbod_sel = ($nm_opc_cod === $idbod) ? "selected" : "";
            }
            else
            {
               $idbod_sel = ("S" == $nm_opc_sel) ? "selected" : "";
            }
            $nm_sc_valor = $nm_opc_val;
            $nm_opc_val = $nm_sc_valor;
?>
       <OPTION value="<?php echo NM_encode_input($nm_opc_cod . $delimitador . $nm_opc_val); ?>" <?php echo $idbod_sel; ?>><?php echo $nm_opc_val; ?></OPTION>
<?php
         }
      }
?>
      </SELECT>
   </span>
<?php
?>
        
        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_idcombo_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['idcombo'])) ? $this->New_label['idcombo'] : "Producto Combo"; ?></TD>
      
      <INPUT type="hidden" id="SC_idcombo_cond" name="idcombo_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_idcombo" <?php echo $str_hide_idcombo?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['idcombo'])) ? $this->New_label['idcombo'] : "Producto Combo";
 $nmgp_tab_label .= "idcombo?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($idcombo != "")
      {
      $idcombo_look = substr($this->Db->qstr($idcombo), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($idcombo))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "select idprod, codigobar + ' -- ' + nompro from productos where escombo='SI' and idprod = $idcombo_look order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "select idprod, concat(codigobar,' -- ',nompro) from productos where escombo='SI' and idprod = $idcombo_look order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select idprod, codigobar&' -- '&nompro from productos where escombo='SI' and idprod = $idcombo_look order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "select idprod, codigobar||' -- '||nompro from productos where escombo='SI' and idprod = $idcombo_look order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nm_comando = "select idprod, codigobar + ' -- ' + nompro from productos where escombo='SI' and idprod = $idcombo_look order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "select idprod, codigobar||' -- '||nompro from productos where escombo='SI' and idprod = $idcombo_look order by codigobar, nompro" ; 
      } 
      else 
      { 
          $nm_comando = "select idprod, codigobar||' -- '||nompro from productos where escombo='SI' and idprod = $idcombo_look order by codigobar, nompro" ; 
      } 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $cmp2 = trim($rs->fields[1]);
            $nmgp_def_dados[] = array($cmp1 => $cmp2); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
   } 
      }
      if (isset($nmgp_def_dados[0][$idcombo]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$idcombo];
      }
      else
      {
          $sAutocompValue = $idcombo;
      }
?>
<INPUT  type="text" id="SC_idcombo" name="idcombo" value="<?php echo NM_encode_input($idcombo) ?>"  size=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_idcombo" name="idcombo_autocomp" size="50"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 50, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_escombo_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['escombo'])) ? $this->New_label['escombo'] : "Combo"; ?></TD>
      
      <INPUT type="hidden" id="SC_escombo_cond" name="escombo_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_escombo" <?php echo $str_hide_escombo?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['escombo'])) ? $this->New_label['escombo'] : "Combo";
 $nmgp_tab_label .= "escombo?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
 
<?php
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['psq_check_ret']['escombo'] = array();
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['psq_check_ret']['escombo'][] = "SI";
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['psq_check_ret']['escombo'][] = "NO";
 ?>

 <SELECT class="scFilterObjectEven" id="SC_escombo"  name="escombo"  size="1">
 <OPTION value="">SELECCIONE</option>
 <OPTION value="SI##@@SI"<?php if ($escombo == "SI") { echo " selected" ;} ?>>SI</option>
 <OPTION value="NO##@@NO"<?php if ($escombo == "NO") { echo " selected" ;} ?>>NO</option>
 </SELECT>

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_tipo_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['tipo'])) ? $this->New_label['tipo'] : "Tipo"; ?></TD>
      
      <INPUT type="hidden" id="SC_tipo_cond" name="tipo_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_tipo" <?php echo $str_hide_tipo?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['tipo'])) ? $this->New_label['tipo'] : "Tipo";
 $nmgp_tab_label .= "tipo?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
 
<?php
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['psq_check_ret']['tipo'] = array();
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['psq_check_ret']['tipo'][] = "1";
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['psq_check_ret']['tipo'][] = "2";
 ?>

 <SELECT class="scFilterObjectOdd" id="SC_tipo"  name="tipo"  size="1">
 <OPTION value="">SELECCIONE</option>
 <OPTION value="1##@@ENTRADA"<?php if ($tipo == "1") { echo " selected" ;} ?>>ENTRADA</option>
 <OPTION value="2##@@SALIDA"<?php if ($tipo == "2") { echo " selected" ;} ?>>SALIDA</option>
 </SELECT>

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_grupo_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['grupo'])) ? $this->New_label['grupo'] : "Grupo"; ?></TD>
      
      <INPUT type="hidden" id="SC_grupo_cond" name="grupo_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_grupo" <?php echo $str_hide_grupo?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['grupo'])) ? $this->New_label['grupo'] : "Grupo";
 $nmgp_tab_label .= "grupo?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($grupo != "")
      {
      $grupo_look = substr($this->Db->qstr($grupo), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($grupo))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select idgrupo, nomgrupo from grupo where idgrupo = $grupo_look order by nomgrupo"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select idgrupo, nomgrupo from grupo where idgrupo = $grupo_look order by nomgrupo"; 
      }
      else
      {
          $nm_comando = "select idgrupo, nomgrupo from grupo where idgrupo = $grupo_look order by nomgrupo"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $cmp2 = trim($rs->fields[1]);
            $nmgp_def_dados[] = array($cmp1 => $cmp2); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
   } 
      }
      if (isset($nmgp_def_dados[0][$grupo]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$grupo];
      }
      else
      {
          $sAutocompValue = $grupo;
      }
?>
<INPUT  type="text" id="SC_grupo" name="grupo" value="<?php echo NM_encode_input($grupo) ?>"  size=11 alt="{datatype: 'text', maxLength: 11, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_grupo" name="grupo_autocomp" size="50"  value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 50, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_inicio_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['inicio'])) ? $this->New_label['inicio'] : "Creado Inicio"; ?></TD>
      
      <INPUT type="hidden" id="SC_inicio_cond" name="inicio_cond" value="ge">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_inicio" <?php echo $str_hide_inicio?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['inicio'])) ? $this->New_label['inicio'] : "Creado Inicio";
 $nmgp_tab_label .= "inicio?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>

<?php
  $Form_base = "ddmmyyyyhhii";
  $date_format_show = "";
  $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
  $Lim   = strlen($Str_date);
  $Str   = "";
  $Ult   = "";
  $Arr_D = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_date, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_D[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_D[] = $Str;
  $Prim = true;
  foreach ($Arr_D as $Cada_d)
  {
      if (strpos($Form_base, $Cada_d) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
          $date_format_show .= $Cada_d;
          $Prim = false;
      }
  }
  $date_format_show .= " ";
  $Str_time = strtolower($_SESSION['scriptcase']['reg_conf']['time_format']);
  $Lim   = strlen($Str_time);
  $Str   = "";
  $Ult   = "";
  $Arr_T = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_time, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_T[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_T[] = $Str;
  $Prim = true;
  foreach ($Arr_T as $Cada_t)
  {
      if (strpos($Form_base, $Cada_t) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['time_sep'] : "";
          $date_format_show .= $Cada_t;
          $Prim = false;
      }
  }
  $Arr_format = array_merge($Arr_D, $Arr_T);
  $date_format_show = str_replace("dd",   $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
  $date_format_show = str_replace("mm",   $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
  $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("hh",   $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
  $date_format_show = str_replace("ii",   $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
  $date_format_show = str_replace("ss",   $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
  $date_format_show = "" . $date_format_show .  "";

?>

         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<span id='id_date_part_inicio_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_inicio_dia" name="inicio_dia" value="<?php echo NM_encode_input($inicio_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_inicio_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_inicio_mes" name="inicio_mes" value="<?php echo NM_encode_input($inicio_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_inicio_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_inicio_ano" name="inicio_ano" value="<?php echo NM_encode_input($inicio_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "h")
  {
?>
<span id='id_date_part_inicio_HH' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_inicio_hor" name="inicio_hor" value="<?php echo NM_encode_input($inicio_hor); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "i")
  {
?>
<span id='id_date_part_inicio_II' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_inicio_min" name="inicio_min" value="<?php echo NM_encode_input($inicio_min); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
<INPUT type="hidden" id="sc_inicio_jq">
</span>

<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_inicio"  class="scFilterFieldFontOdd">
 <?php echo $date_format_show ?>         </SPAN>
         
        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_fin_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['fin'])) ? $this->New_label['fin'] : "Fin"; ?></TD>
      
      <INPUT type="hidden" id="SC_fin_cond" name="fin_cond" value="le">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_fin" <?php echo $str_hide_fin?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['fin'])) ? $this->New_label['fin'] : "Fin";
 $nmgp_tab_label .= "fin?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>

<?php
  $Form_base = "ddmmyyyyhhii";
  $date_format_show = "";
  $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
  $Lim   = strlen($Str_date);
  $Str   = "";
  $Ult   = "";
  $Arr_D = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_date, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_D[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_D[] = $Str;
  $Prim = true;
  foreach ($Arr_D as $Cada_d)
  {
      if (strpos($Form_base, $Cada_d) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
          $date_format_show .= $Cada_d;
          $Prim = false;
      }
  }
  $date_format_show .= " ";
  $Str_time = strtolower($_SESSION['scriptcase']['reg_conf']['time_format']);
  $Lim   = strlen($Str_time);
  $Str   = "";
  $Ult   = "";
  $Arr_T = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_time, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_T[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_T[] = $Str;
  $Prim = true;
  foreach ($Arr_T as $Cada_t)
  {
      if (strpos($Form_base, $Cada_t) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['time_sep'] : "";
          $date_format_show .= $Cada_t;
          $Prim = false;
      }
  }
  $Arr_format = array_merge($Arr_D, $Arr_T);
  $date_format_show = str_replace("dd",   $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
  $date_format_show = str_replace("mm",   $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
  $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("hh",   $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
  $date_format_show = str_replace("ii",   $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
  $date_format_show = str_replace("ss",   $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
  $date_format_show = "" . $date_format_show .  "";

?>

         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<span id='id_date_part_fin_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_fin_dia" name="fin_dia" value="<?php echo NM_encode_input($fin_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_fin_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_fin_mes" name="fin_mes" value="<?php echo NM_encode_input($fin_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_fin_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_fin_ano" name="fin_ano" value="<?php echo NM_encode_input($fin_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "h")
  {
?>
<span id='id_date_part_fin_HH' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_fin_hor" name="fin_hor" value="<?php echo NM_encode_input($fin_hor); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "i")
  {
?>
<span id='id_date_part_fin_II' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_fin_min" name="fin_min" value="<?php echo NM_encode_input($fin_min); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
<INPUT type="hidden" id="sc_fin_jq">
</span>

<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_fin"  class="scFilterFieldFontEven">
 <?php echo $date_format_show ?>         </SPAN>
         
        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_fechavenc_label' class="scFilterLabelOdd"><?php echo (isset($this->New_label['fechavenc'])) ? $this->New_label['fechavenc'] : "Vence"; ?></TD>
     <TD class="scFilterFieldOdd"> 
      <SELECT class="scFilterObjectOdd" id="SC_fechavenc_cond" name="fechavenc_cond" onChange="nm_campos_between(document.getElementById('id_vis_fechavenc'), this, 'fechavenc')">
       <OPTION value="eq" <?php if ("eq" == $fechavenc_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="gt" <?php if ("gt" == $fechavenc_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_grtr'] ?></OPTION>
       <OPTION value="lt" <?php if ("lt" == $fechavenc_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_less'] ?></OPTION>
       <OPTION value="bw" <?php if ("bw" == $fechavenc_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_betw'] ?></OPTION>
       <OPTION value="ge" <?php if ("ge" == $fechavenc_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_grtr_equl'] ?></OPTION>
       <OPTION value="le" <?php if ("le" == $fechavenc_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_less_equl'] ?></OPTION>
      </SELECT>
       </TD>
     <TD  class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_fechavenc" <?php echo $str_hide_fechavenc?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['fechavenc'])) ? $this->New_label['fechavenc'] : "Vence";
 $nmgp_tab_label .= "fechavenc?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>

<?php
  $Form_base = "ddmmyyyy";
  $date_format_show = "";
  $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
  $Lim   = strlen($Str_date);
  $Str   = "";
  $Ult   = "";
  $Arr_D = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_date, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_D[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_D[] = $Str;
  $Prim = true;
  foreach ($Arr_D as $Cada_d)
  {
      if (strpos($Form_base, $Cada_d) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
          $date_format_show .= $Cada_d;
          $Prim = false;
      }
  }
  $Arr_format = $Arr_D;
  $date_format_show = str_replace("dd",   $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
  $date_format_show = str_replace("mm",   $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
  $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("hh",   $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
  $date_format_show = str_replace("ii",   $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
  $date_format_show = str_replace("ss",   $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
  $date_format_show = "" . $date_format_show .  "";

?>

         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<span id='id_date_part_fechavenc_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_fechavenc_dia" name="fechavenc_dia" value="<?php echo NM_encode_input($fechavenc_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_fechavenc_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_fechavenc_mes" name="fechavenc_mes" value="<?php echo NM_encode_input($fechavenc_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_fechavenc_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_fechavenc_ano" name="fechavenc_ano" value="<?php echo NM_encode_input($fechavenc_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 <INPUT type="hidden" id="sc_fechavenc_jq">
</span>

<?php
  }
?>

<?php

}

?>
        </TD>
       </TR>
       <TR valign="top">
        <TD id="id_vis_fechavenc"  <?php echo $str_display_fechavenc; ?> class="scFilterFieldFontOdd">
         <?php echo $date_sep_bw ?>
         <BR>
         
         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<span id='id_date_part_fechavenc_input_2_DD' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_fechavenc_input_2_dia" name="fechavenc_input_2_dia" value="<?php echo NM_encode_input($fechavenc_input_2_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_fechavenc_input_2_MM' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_fechavenc_input_2_mes" name="fechavenc_input_2_mes" value="<?php echo NM_encode_input($fechavenc_input_2_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: true, enterTab: false}">
</span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_fechavenc_input_2_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_fechavenc_input_2_ano" name="fechavenc_input_2_ano" value="<?php echo NM_encode_input($fechavenc_input_2_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 <INPUT type="hidden" id="sc_fechavenc_jq2">
</span>

<?php
  }
?>

<?php

}

?>

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD id='SC_lote2_label' class="scFilterLabelEven"><?php echo (isset($this->New_label['lote2'])) ? $this->New_label['lote2'] : "Lote"; ?></TD>
      
      <INPUT type="hidden" id="SC_lote2_cond" name="lote2_cond" value="qp">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_lote2" <?php echo $str_hide_lote2?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['lote2'])) ? $this->New_label['lote2'] : "Lote";
 $nmgp_tab_label .= "lote2?#?" . $SC_Label . "?@?";
 $date_sep_bw = " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<?php
      if ($lote2 != "")
      {
      $lote2_look = substr($this->Db->qstr($lote2), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct lote2 from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2 FROM      inventario ) nm_sel_esp where lote2 = '$lote2_look'"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
      }
      if (isset($nmgp_def_dados[0][$lote2]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$lote2];
      }
      else
      {
          $sAutocompValue = $lote2;
      }
?>
<INPUT  type="text" id="SC_lote2" name="lote2" value="<?php echo NM_encode_input($lote2) ?>"  size=50 alt="{datatype: 'text', maxLength: 60, allowedChars: '', lettersCase: 'upper', autoTab: false, enterTab: false}" style="display: none">
<select class="sc-js-input scFilterObjectEven sc-ui-autocomp-lote2" id="id_ac_lote2" name="lote2_autocomp"><?php if ('' !=  $lote2) { ?><option value="<?php echo $lote2 ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select>

        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr>
   </TABLE>
  </TD>
 </TR>
 </TABLE>
 </TD>
 </TR>
 <TR>
  <TD class="scFilterTableTd" align="center">
<INPUT type="hidden" id="SC_NM_operador" name="NM_operador" value="and">  </TD>
 </TR>
   <INPUT type="hidden" name="nmgp_tab_label" value="<?php echo NM_encode_input($nmgp_tab_label); ?>"> 
   <INPUT type="hidden" name="bprocessa" value="pesq"> 
 <?php
     if ($_SESSION['scriptcase']['proc_mobile'])
     {
     ?>
 <TR align="center">
  <TD class="scFilterTableTd">
   <table width="100%" class="scFilterToolbar"><tr>
    <td class="scFilterToolbarPadding" align="left" width="33%" nowrap>
    </td>
    <td class="scFilterToolbarPadding" align="center" width="33%" nowrap>
   <?php echo nmButtonOutput($this->arr_buttons, "bpesquisa", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200);", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200);", "sc_b_pesq_bot", "", "Buscar", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_srch_lone_hint'] . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   if ($this->nmgp_botoes['clear'] == "on")
   {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "blimpar", "limpa_form();", "limpa_form();", "limpa_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
<?php
   if (!isset($this->nmgp_botoes['save']) || $this->nmgp_botoes['save'] == "on")
   {
       $this->NM_fil_ant = $this->gera_array_filtros();
?>
     <span id="idAjaxSelect_NM_filters_bot">
       <SELECT class="scFilterToolbar_obj" id="sel_recup_filters_bot" name="NM_filters_bot" onChange="nm_submit_filter(this, 'bot');" size="1">
           <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "           <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
?>
           <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
       </SELECT>
     </span>
<?php
   }
?>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bedit_filter", "document.getElementById('Salvar_filters_bot').style.display = ''; document.F1.nmgp_save_name_bot.focus();", "document.getElementById('Salvar_filters_bot').style.display = ''; document.F1.nmgp_save_name_bot.focus();", "Ativa_save_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
<?php
   if (is_file("grid_inventario_130521_help.txt"))
   {
      $Arq_WebHelp = file("grid_inventario_130521_help.txt"); 
      if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
      {
          $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
          $Tmp = explode(";", $Arq_WebHelp[0]); 
          foreach ($Tmp as $Cada_help)
          {
              $Tmp1 = explode(":", $Cada_help); 
              if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "fil" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
              {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "sc_b_help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
              }
          }
      }
   }
?>
<?php
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_inventario_130521']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_inventario_130521']['start'] == 'filter' && $nm_apl_dependente != 1)
   {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.form_cancel.submit();", "document.form_cancel.submit();", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.form_cancel.submit();", "document.form_cancel.submit();", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
    </td>
    <td class="scFilterToolbarPadding" align="right" width="33%" nowrap>
    </td>
   </tr></table>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
    </TD></TR><TR><TD>
    <DIV id="Salvar_filters_bot" style="display:none;z-index:9999;">
     <TABLE align="center" class="scFilterTable">
      <TR>
       <TD class="scFilterBlock">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top" class="scFilterBlockFont"><?php echo $this->Ini->Nm_lang['lang_othr_srch_head'] ?></td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bcancelar_appdiv", "document.getElementById('Salvar_filters_bot').style.display = 'none';", "document.getElementById('Salvar_filters_bot').style.display = 'none';", "Cancel_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldOdd">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
           <input class="scFilterObjectOdd" type="text" id="SC_nmgp_save_name_bot" name="nmgp_save_name_bot" value="">
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bsalvar_appdiv", "nm_save_form('bot');", "nm_save_form('bot');", "Save_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldEven">
       <DIV id="Apaga_filters_bot" style="display:''">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
          <div id="idAjaxSelect_NM_filters_del_bot">
           <SELECT class="scFilterObjectOdd" id="sel_filters_del_bot" name="NM_filters_del_bot" size="1">
            <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "            <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
?>
            <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
           </SELECT>
          </div>
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bexcluir_appdiv", "nm_submit_filter_del('bot');", "nm_submit_filter_del('bot');", "Exc_filtro_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </DIV>
       </TD>
      </TR>
     </TABLE>
    </DIV> 
<?php
   }
?>
  </TD>
 </TR>
     <?php
     }
     else
     {
     ?>
 <TR align="center">
  <TD class="scFilterTableTd">
   <table width="100%" class="scFilterToolbar"><tr>
    <td class="scFilterToolbarPadding" align="left" width="33%" nowrap>
    </td>
    <td class="scFilterToolbarPadding" align="center" width="33%" nowrap>
<?php
   if (is_file("grid_inventario_130521_help.txt"))
   {
      $Arq_WebHelp = file("grid_inventario_130521_help.txt"); 
      if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
      {
          $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
          $Tmp = explode(";", $Arq_WebHelp[0]); 
          foreach ($Tmp as $Cada_help)
          {
              $Tmp1 = explode(":", $Cada_help); 
              if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "fil" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
              {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "sc_b_help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
              }
          }
      }
   }
?>
<?php
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_inventario_130521']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_inventario_130521']['start'] == 'filter' && $nm_apl_dependente != 1)
   {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.form_cancel.submit();", "document.form_cancel.submit();", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
   else
   {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.form_cancel.submit();", "document.form_cancel.submit();", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
<?php
   if ($this->nmgp_botoes['clear'] == "on")
   {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "blimpar", "limpa_form();", "limpa_form();", "limpa_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
<?php
   if (!isset($this->nmgp_botoes['save']) || $this->nmgp_botoes['save'] == "on")
   {
       $this->NM_fil_ant = $this->gera_array_filtros();
?>
     <span id="idAjaxSelect_NM_filters_bot">
       <SELECT class="scFilterToolbar_obj" id="sel_recup_filters_bot" name="NM_filters_bot" onChange="nm_submit_filter(this, 'bot');" size="1">
           <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "           <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
?>
           <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
       </SELECT>
     </span>
<?php
   }
?>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bedit_filter", "document.getElementById('Salvar_filters_bot').style.display = ''; document.F1.nmgp_save_name_bot.focus();", "document.getElementById('Salvar_filters_bot').style.display = ''; document.F1.nmgp_save_name_bot.focus();", "Ativa_save_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bpesquisa", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200);", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200);", "sc_b_pesq_bot", "", "Buscar", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_srch_lone_hint'] . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
    </td>
    <td class="scFilterToolbarPadding" align="right" width="33%" nowrap>
    </td>
   </tr></table>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
    </TD></TR><TR><TD>
    <DIV id="Salvar_filters_bot" style="display:none;z-index:9999;">
     <TABLE align="center" class="scFilterTable">
      <TR>
       <TD class="scFilterBlock">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top" class="scFilterBlockFont"><?php echo $this->Ini->Nm_lang['lang_othr_srch_head'] ?></td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bcancelar_appdiv", "document.getElementById('Salvar_filters_bot').style.display = 'none';", "document.getElementById('Salvar_filters_bot').style.display = 'none';", "Cancel_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldOdd">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
           <input class="scFilterObjectOdd" type="text" id="SC_nmgp_save_name_bot" name="nmgp_save_name_bot" value="">
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bsalvar_appdiv", "nm_save_form('bot');", "nm_save_form('bot');", "Save_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldEven">
       <DIV id="Apaga_filters_bot" style="display:''">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
          <div id="idAjaxSelect_NM_filters_del_bot">
           <SELECT class="scFilterObjectOdd" id="sel_filters_del_bot" name="NM_filters_del_bot" size="1">
            <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "            <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
?>
            <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
           </SELECT>
          </div>
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bexcluir_appdiv", "nm_submit_filter_del('bot');", "nm_submit_filter_del('bot');", "Exc_filtro_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </DIV>
       </TD>
      </TR>
     </TABLE>
    </DIV> 
<?php
   }
?>
  </TD>
 </TR>
     <?php
     }
 ?>
<?php
   }

   function monta_html_fim()
   {
       global $bprocessa, $nm_url_saida, $Script_BI;
?>

</TABLE>
   <INPUT type="hidden" name="form_condicao" value="3">
</FORM> 
<?php
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_inventario_130521']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_inventario_130521']['start'] == 'filter')
   {
?>
   <FORM style="display:none;" name="form_cancel"  method="POST" action="<?php echo $nm_url_saida; ?>" target="_self"> 
<?php
   }
   else
   {
?>
   <FORM style="display:none;" name="form_cancel"  method="POST" action="./" target="_self"> 
<?php
   }
?>
   <INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<?php
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['orig_pesq'] == "grid")
   {
       $Ret_cancel_pesq = "volta_grid";
   }
   else
   {
       $Ret_cancel_pesq = "resumo";
   }
?>
   <INPUT type="hidden" name="nmgp_opcao" value="<?php echo $Ret_cancel_pesq; ?>"> 
   </FORM> 
<SCRIPT type="text/javascript">
<?php
   if (empty($this->NM_fil_ant))
   {
       if ($_SESSION['scriptcase']['proc_mobile'])
       {
?>
      document.getElementById('Apaga_filters_bot').style.display = 'none';
      document.getElementById('sel_recup_filters_bot').style.display = 'none';
<?php
       }
       else
       {
?>
      document.getElementById('Apaga_filters_bot').style.display = 'none';
      document.getElementById('sel_recup_filters_bot').style.display = 'none';
<?php
       }
   }
?>
 function nm_move()
 {
     document.form_cancel.target = "_self"; 
     document.form_cancel.action = "./"; 
     document.form_cancel.submit(); 
 }
 function nm_submit_form()
 {
    document.F1.submit();
 }
 function limpa_form()
 {
   document.F1.reset();
   if (document.F1.NM_filters)
   {
       document.F1.NM_filters.selectedIndex = -1;
   }
   document.getElementById('Salvar_filters_bot').style.display = 'none';
   document.F1.idpro_cond.value = 'eq';
   nm_campos_between(document.getElementById('id_vis_idpro'), document.F1.idpro_cond, 'idpro');
   document.F1.idpro.value = "";
   document.F1.idpro_autocomp.value = "";
   document.F1.fecha_cond.value = 'eq';
   nm_campos_between(document.getElementById('id_vis_fecha'), document.F1.fecha_cond, 'fecha');
   document.F1.fecha_dia.value = "";
   document.F1.fecha_mes.value = "";
   document.F1.fecha_ano.value = "";
   document.F1.fecha_input_2_dia.value = "";
   document.F1.fecha_input_2_mes.value = "";
   document.F1.fecha_input_2_ano.value = "";
   document.F1.cantidad_cond.value = 'gt';
   nm_campos_between(document.getElementById('id_vis_cantidad'), document.F1.cantidad_cond, 'cantidad');
   document.F1.cantidad.value = "";
   document.F1.cantidad_autocomp.value = "";
   $('#select2-id_ac_cantidad-container').html('<?php echo $this->Val_init_cantidad['desc'] ?>');;
   document.F1.cantidad_input_2.value = "";
   document.F1.idbod_cond.value = 'eq';
   nm_campos_between(document.getElementById('id_vis_idbod'), document.F1.idbod_cond, 'idbod');
   document.F1.idbod.value = "";
   document.F1.idcombo_cond.value = 'eq';
   nm_campos_between(document.getElementById('id_vis_idcombo'), document.F1.idcombo_cond, 'idcombo');
   document.F1.idcombo.value = "";
   document.F1.idcombo_autocomp.value = "";
   document.F1.escombo_cond.value = 'eq';
   nm_campos_between(document.getElementById('id_vis_escombo'), document.F1.escombo_cond, 'escombo');
   document.F1.tipo_cond.value = 'eq';
   nm_campos_between(document.getElementById('id_vis_tipo'), document.F1.tipo_cond, 'tipo');
   document.F1.grupo_cond.value = 'eq';
   nm_campos_between(document.getElementById('id_vis_grupo'), document.F1.grupo_cond, 'grupo');
   document.F1.grupo.value = "";
   document.F1.grupo_autocomp.value = "";
   document.F1.inicio_cond.value = 'ge';
   nm_campos_between(document.getElementById('id_vis_inicio'), document.F1.inicio_cond, 'inicio');
   document.F1.inicio_dia.value = "";
   document.F1.inicio_mes.value = "";
   document.F1.inicio_ano.value = "";
   document.F1.inicio_hor.value = "";
   document.F1.inicio_min.value = "";
   document.F1.fin_cond.value = 'le';
   nm_campos_between(document.getElementById('id_vis_fin'), document.F1.fin_cond, 'fin');
   document.F1.fin_dia.value = "";
   document.F1.fin_mes.value = "";
   document.F1.fin_ano.value = "";
   document.F1.fin_hor.value = "";
   document.F1.fin_min.value = "";
   document.F1.fechavenc_cond.value = 'eq';
   nm_campos_between(document.getElementById('id_vis_fechavenc'), document.F1.fechavenc_cond, 'fechavenc');
   document.F1.fechavenc_dia.value = "";
   document.F1.fechavenc_mes.value = "";
   document.F1.fechavenc_ano.value = "";
   document.F1.fechavenc_input_2_dia.value = "";
   document.F1.fechavenc_input_2_mes.value = "";
   document.F1.fechavenc_input_2_ano.value = "";
   document.F1.lote2_cond.value = 'qp';
   nm_campos_between(document.getElementById('id_vis_lote2'), document.F1.lote2_cond, 'lote2');
   document.F1.lote2.value = "";
   document.F1.lote2_autocomp.value = "";
   $('#select2-id_ac_lote2-container').html('<?php echo $this->Val_init_lote2['desc'] ?>');;
   Sc_carga_select2('all');
 }
 function Sc_carga_select2(Field)
 {
    if (Field == 'all' || Field == 'idbod') {
       Sc_carga_select2_idbod();
    }
    if (Field == 'all' || Field == 'tipo') {
       Sc_carga_select2_tipo();
    }
    if (Field == 'all' || Field == 'escombo') {
       Sc_carga_select2_escombo();
    }
 }
 function Sc_carga_select2_idbod()
 {
  $("#SC_idbod").select2(
    {
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
 }
 function Sc_carga_select2_tipo()
 {
  $("#SC_tipo").select2(
    {
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
 }
 function Sc_carga_select2_escombo()
 {
  $("#SC_escombo").select2(
    {
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
 }
 function SC_carga_evt_jquery()
 {
    $('#SC_fecha_dia').bind('change', function() {sc_grid_inventario_130521_valida_dia(this)});
    $('#SC_fecha_input_2_dia').bind('change', function() {sc_grid_inventario_130521_valida_dia(this)});
    $('#SC_fecha_input_2_mes').bind('change', function() {sc_grid_inventario_130521_valida_mes(this)});
    $('#SC_fecha_mes').bind('change', function() {sc_grid_inventario_130521_valida_mes(this)});
    $('#SC_fechavenc_dia').bind('change', function() {sc_grid_inventario_130521_valida_dia(this)});
    $('#SC_fechavenc_input_2_dia').bind('change', function() {sc_grid_inventario_130521_valida_dia(this)});
    $('#SC_fechavenc_input_2_mes').bind('change', function() {sc_grid_inventario_130521_valida_mes(this)});
    $('#SC_fechavenc_mes').bind('change', function() {sc_grid_inventario_130521_valida_mes(this)});
    $('#SC_fin_dia').bind('change', function() {sc_grid_inventario_130521_valida_dia(this)});
    $('#SC_fin_hor').bind('change', function() {sc_grid_inventario_130521_valida_hora(this)});
    $('#SC_fin_mes').bind('change', function() {sc_grid_inventario_130521_valida_mes(this)});
    $('#SC_fin_min').bind('change', function() {sc_grid_inventario_130521_valida_min(this)});
    $('#SC_inicio_dia').bind('change', function() {sc_grid_inventario_130521_valida_dia(this)});
    $('#SC_inicio_hor').bind('change', function() {sc_grid_inventario_130521_valida_hora(this)});
    $('#SC_inicio_mes').bind('change', function() {sc_grid_inventario_130521_valida_mes(this)});
    $('#SC_inicio_min').bind('change', function() {sc_grid_inventario_130521_valida_min(this)});
 }
 function sc_grid_inventario_130521_valida_dia(obj)
 {
     if (obj.value != "" && (obj.value < 1 || obj.value > 31))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_iday'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_inventario_130521_valida_mes(obj)
 {
     if (obj.value != "" && (obj.value < 1 || obj.value > 12))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_mnth'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_inventario_130521_valida_hora(obj)
 {
     if (obj.value != "" && (obj.value < 0 || obj.value > 23))
     {
         if (confirm (Nm_erro['lang_jscr_ivtm'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_inventario_130521_valida_min(obj)
 {
     if (obj.value != "" && (obj.value < 0 || obj.value > 59))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_mint'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
</SCRIPT>
</BODY>
</HTML>
<?php
   }

   function gera_array_filtros()
   {
       $this->NM_fil_ant = array();
       $NM_patch   = "FACILWEBv2/grid_inventario_130521";
       if (is_dir($this->NM_path_filter . $NM_patch))
       {
           $NM_dir = @opendir($this->NM_path_filter . $NM_patch);
           while (FALSE !== ($NM_arq = @readdir($NM_dir)))
           {
             if (@is_file($this->NM_path_filter . $NM_patch . "/" . $NM_arq))
             {
                 $Sc_v6 = false;
                 $NMcmp_filter = file($this->NM_path_filter . $NM_patch . "/" . $NM_arq);
                 $NMcmp_filter = explode("@NMF@", $NMcmp_filter[0]);
                 if (substr($NMcmp_filter[0], 0, 6) == "SC_V6_" || substr($NMcmp_filter[0], 0, 6) == "SC_V8_")
                 {
                     $Name_filter = substr($NMcmp_filter[0], 6);
                     if (!empty($Name_filter))
                     {
                         $nmgp_save_name = str_replace('/', ' ', $Name_filter);
                         $nmgp_save_name = str_replace('\\', ' ', $nmgp_save_name);
                         $nmgp_save_name = str_replace('.', ' ', $nmgp_save_name);
                         $this->NM_fil_ant[$Name_filter][0] = $NM_patch . "/" . $nmgp_save_name;
                         $this->NM_fil_ant[$Name_filter][1] = "" . $this->Ini->Nm_lang['lang_srch_public'] . "";
                         $Sc_v6 = true;
                     }
                 }
                 if (!$Sc_v6)
                 {
                     $this->NM_fil_ant[$NM_arq][0] = $NM_patch . "/" . $NM_arq;
                     $this->NM_fil_ant[$NM_arq][1] = "" . $this->Ini->Nm_lang['lang_srch_public'] . "";
                 }
             }
           }
       }
       return $this->NM_fil_ant;
   }
   /**
    * @access  public
    * @param  string  $NM_operador  $this->Ini->Nm_lang['pesq_global_NM_operador']
    * @param  array  $nmgp_tab_label  
    */
   function inicializa_vars()
   {
      global $NM_operador, $nmgp_tab_label;

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/");  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1);  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz;
      $this->Campos_Mens_erro = ""; 
      $this->nm_data = new nm_data("es");
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['cond_pesq'] = "";
      if (!empty($nmgp_tab_label))
      {
         $nm_tab_campos = explode("?@?", $nmgp_tab_label);
         $nmgp_tab_label = array();
         foreach ($nm_tab_campos as $cada_campo)
         {
             $parte_campo = explode("?#?", $cada_campo);
             $nmgp_tab_label[$parte_campo[0]] = $parte_campo[1];
         }
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['where_orig']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['where_orig'] = "";
      }
      $this->comando        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['where_orig'];
      $this->comando_sum    = "";
      $this->comando_filtro = "";
      $this->comando_ini    = "ini";
      $this->comando_fim    = "";
      $this->NM_operador    = (isset($NM_operador) && ("and" == strtolower($NM_operador) || "or" == strtolower($NM_operador))) ? $NM_operador : "and";
   }

   function salva_filtro($nmgp_save_origem)
   {
      global $NM_filters_save, $nmgp_save_name, $nmgp_save_option, $script_case_init;
          $NM_filters_save = str_replace("__NM_PLUS__", "+", $NM_filters_save);
          $NM_str_filter  = "SC_V8_" . $nmgp_save_name . "@NMF@";
          $nmgp_save_name = str_replace('/', ' ', $nmgp_save_name);
          $nmgp_save_name = str_replace('\\', ' ', $nmgp_save_name);
          $nmgp_save_name = str_replace('.', ' ', $nmgp_save_name);
          if (!NM_is_utf8($nmgp_save_name))
          {
              $nmgp_save_name = sc_convert_encoding($nmgp_save_name, "UTF-8", $_SESSION['scriptcase']['charset']);
          }
          $NM_str_filter  .= $NM_filters_save;
          $NM_patch = $this->NM_path_filter;
          if (!is_dir($NM_patch))
          {
              $NMdir = mkdir($NM_patch, 0755);
          }
          $NM_patch .= "FACILWEBv2/";
          if (!is_dir($NM_patch))
          {
              $NMdir = mkdir($NM_patch, 0755);
          }
          $NM_patch .= "grid_inventario_130521/";
          if (!is_dir($NM_patch))
          {
              $NMdir = mkdir($NM_patch, 0755);
          }
          $Parms_usr  = "";
          $NM_filter = fopen ($NM_patch . $nmgp_save_name, 'w');
          if (!NM_is_utf8($NM_str_filter))
          {
              $NM_str_filter = sc_convert_encoding($NM_str_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
          }
          fwrite($NM_filter, $NM_str_filter);
          fclose($NM_filter);
   }
   function recupera_filtro($NM_filters)
   {
      global $NM_operador, $script_case_init;
      $NM_patch = $this->NM_path_filter . "/" . $NM_filters;
      if (!is_file($NM_patch))
      {
          $NM_filters = sc_convert_encoding($NM_filters, "UTF-8", $_SESSION['scriptcase']['charset']);
          $NM_patch = $this->NM_path_filter . "/" . $NM_filters;
      }
      $return_fields = array();
      $tp_fields     = array();
      $tb_fields_esp = array();
      $old_bi_opcs   = array("TP","HJ","OT","U7","SP","US","MM","UM","AM","PS","SS","P3","PM","P7","CY","LY","YY","M6","M3","M18","M24");
      $tp_fields['SC_idpro_cond'] = 'cond';
      $tp_fields['SC_idpro'] = 'text_aut';
      $tp_fields['id_ac_idpro'] = 'text_aut';
      $tp_fields['SC_fecha_cond'] = 'cond';
      $tp_fields['SC_fecha_dia'] = 'text';
      $tp_fields['SC_fecha_mes'] = 'text';
      $tp_fields['SC_fecha_ano'] = 'text';
      $tp_fields['SC_fecha_input_2_dia'] = 'text';
      $tp_fields['SC_fecha_input_2_mes'] = 'text';
      $tp_fields['SC_fecha_input_2_ano'] = 'text';
      $tp_fields['SC_cantidad_cond'] = 'cond';
      $tp_fields['SC_cantidad'] = 'text_aut';
      $tp_fields['id_ac_cantidad'] = 'select2_aut';
      $tp_fields['SC_cantidad_input_2'] = 'text';
      $tp_fields['SC_idbod_cond'] = 'cond';
      $tp_fields['SC_idbod'] = 'select';
      $tp_fields['SC_idcombo_cond'] = 'cond';
      $tp_fields['SC_idcombo'] = 'text_aut';
      $tp_fields['id_ac_idcombo'] = 'text_aut';
      $tp_fields['SC_escombo_cond'] = 'cond';
      $tp_fields['SC_escombo'] = 'select';
      $tp_fields['SC_tipo_cond'] = 'cond';
      $tp_fields['SC_tipo'] = 'select';
      $tp_fields['SC_grupo_cond'] = 'cond';
      $tp_fields['SC_grupo'] = 'text_aut';
      $tp_fields['id_ac_grupo'] = 'text_aut';
      $tp_fields['SC_inicio_cond'] = 'cond';
      $tp_fields['SC_inicio_dia'] = 'text';
      $tp_fields['SC_inicio_mes'] = 'text';
      $tp_fields['SC_inicio_ano'] = 'text';
      $tp_fields['SC_inicio_input_2_dia'] = 'text';
      $tp_fields['SC_inicio_input_2_mes'] = 'text';
      $tp_fields['SC_inicio_input_2_ano'] = 'text';
      $tp_fields['SC_inicio_hor'] = 'text';
      $tp_fields['SC_inicio_min'] = 'text';
      $tp_fields['SC_inicio_seg'] = 'text';
      $tp_fields['SC_inicio_input_2_hor'] = 'text';
      $tp_fields['SC_inicio_input_2_min'] = 'text';
      $tp_fields['SC_inicio_input_2_seg'] = 'text';
      $tp_fields['SC_fin_cond'] = 'cond';
      $tp_fields['SC_fin_dia'] = 'text';
      $tp_fields['SC_fin_mes'] = 'text';
      $tp_fields['SC_fin_ano'] = 'text';
      $tp_fields['SC_fin_input_2_dia'] = 'text';
      $tp_fields['SC_fin_input_2_mes'] = 'text';
      $tp_fields['SC_fin_input_2_ano'] = 'text';
      $tp_fields['SC_fin_hor'] = 'text';
      $tp_fields['SC_fin_min'] = 'text';
      $tp_fields['SC_fin_seg'] = 'text';
      $tp_fields['SC_fin_input_2_hor'] = 'text';
      $tp_fields['SC_fin_input_2_min'] = 'text';
      $tp_fields['SC_fin_input_2_seg'] = 'text';
      $tp_fields['SC_fechavenc_cond'] = 'cond';
      $tp_fields['SC_fechavenc_dia'] = 'text';
      $tp_fields['SC_fechavenc_mes'] = 'text';
      $tp_fields['SC_fechavenc_ano'] = 'text';
      $tp_fields['SC_fechavenc_input_2_dia'] = 'text';
      $tp_fields['SC_fechavenc_input_2_mes'] = 'text';
      $tp_fields['SC_fechavenc_input_2_ano'] = 'text';
      $tp_fields['SC_lote2_cond'] = 'cond';
      $tp_fields['SC_lote2'] = 'text_aut';
      $tp_fields['id_ac_lote2'] = 'select2_aut';
      $tp_fields['SC_NM_operador'] = 'text';
      if (is_file($NM_patch))
      {
          $SC_V8    = false;
          $NMfilter = file($NM_patch);
          $NMcmp_filter = explode("@NMF@", $NMfilter[0]);
          if (substr($NMcmp_filter[0], 0, 5) == "SC_V8")
          {
              $SC_V8 = true;
          }
          if (substr($NMcmp_filter[0], 0, 5) == "SC_V6" || substr($NMcmp_filter[0], 0, 5) == "SC_V8")
          {
              unset($NMcmp_filter[0]);
          }
          foreach ($NMcmp_filter as $Cada_cmp)
          {
              $Cada_cmp = explode("#NMF#", $Cada_cmp);
              if (isset($tb_fields_esp[$Cada_cmp[0]]))
              {
                  $Cada_cmp[0] = $tb_fields_esp[$Cada_cmp[0]];
              }
              if (!$SC_V8 && substr($Cada_cmp[0], 0, 11) != "div_ac_lab_" && substr($Cada_cmp[0], 0, 6) != "id_ac_")
              {
                  $Cada_cmp[0] = "SC_" . $Cada_cmp[0];
              }
              if (!isset($tp_fields[$Cada_cmp[0]]))
              {
                  continue;
              }
              $list   = array();
              $list_a = array();
              if (substr($Cada_cmp[1], 0, 10) == "_NM_array_")
              {
                  if (substr($Cada_cmp[1], 0, 17) == "_NM_array_#NMARR#")
                  {
                      $Sc_temp = explode("#NMARR#", substr($Cada_cmp[1], 17));
                      foreach ($Sc_temp as $Cada_val)
                      {
                          $list[]   = $Cada_val;
                          $tmp_pos  = strpos($Cada_val, "##@@");
                          $val_a    = ($tmp_pos !== false) ?  substr($Cada_val, $tmp_pos + 4) : $Cada_val;
                          $list_a[] = array('opt' => $Cada_val, 'value' => $val_a);
                      }
                  }
              }
              elseif ($tp_fields[$Cada_cmp[0]] == 'dselect')
              {
                  $list[]   = $Cada_cmp[1];
                  $tmp_pos  = strpos($Cada_cmp[1], "##@@");
                  $val_a    = ($tmp_pos !== false) ?  substr($Cada_cmp[1], $tmp_pos + 4) : $Cada_cmp[1];
                  $list_a[] = array('opt' => $Cada_cmp[1], 'value' => $val_a);
              }
              else
              {
                  $list[0] = $Cada_cmp[1];
              }
              if ($tp_fields[$Cada_cmp[0]] == 'select2_aut')
              {
                  if (!isset($list[0]))
                  {
                      $list[0] = "";
                  }
                  $return_fields['set_select2_aut'][] = array('field' => $Cada_cmp[0], 'value' => $list[0]);
              }
              elseif ($tp_fields[$Cada_cmp[0]] == 'dselect')
              {
                  $return_fields['set_dselect'][] = array('field' => $Cada_cmp[0], 'value' => $list_a);
              }
              elseif ($tp_fields[$Cada_cmp[0]] == 'fil_order')
              {
                  $return_fields['set_fil_order'][] = array('field' => $Cada_cmp[0], 'value' => $list);
              }
              elseif ($tp_fields[$Cada_cmp[0]] == 'selmult')
              {
                  if (count($list) == 1 && $list[0] == "")
                  {
                      continue;
                  }
                  $return_fields['set_selmult'][] = array('field' => $Cada_cmp[0], 'value' => $list);
              }
              elseif ($tp_fields[$Cada_cmp[0]] == 'ddcheckbox')
              {
                  $return_fields['set_ddcheckbox'][] = array('field' => $Cada_cmp[0], 'value' => $list);
              }
              elseif ($tp_fields[$Cada_cmp[0]] == 'checkbox')
              {
                  $return_fields['set_checkbox'][] = array('field' => $Cada_cmp[0], 'value' => $list);
              }
              else
              {
                  if (!isset($list[0]))
                  {
                      $list[0] = "";
                  }
                  if ($tp_fields[$Cada_cmp[0]] == 'html')
                  {
                      $return_fields['set_html'][] = array('field' => $Cada_cmp[0], 'value' => $list[0]);
                  }
                  elseif ($tp_fields[$Cada_cmp[0]] == 'radio')
                  {
                      $return_fields['set_radio'][] = array('field' => $Cada_cmp[0], 'value' => $list[0]);
                  }
                  elseif ($tp_fields[$Cada_cmp[0]] == 'cond' && in_array($list[0], $old_bi_opcs))
                  {
                      $Cada_cmp[1] = "bi_" . $list[0];
                      $return_fields['set_val'][] = array('field' => $Cada_cmp[0], 'value' => $Cada_cmp[1]);
                  }
                  else
                  {
                      $return_fields['set_val'][] = array('field' => $Cada_cmp[0], 'value' => $list[0]);
                  }
              }
          }
          $this->NM_curr_fil = $NM_filters;
      }
      return $return_fields;
   }
   function apaga_filtro()
   {
      global $NM_filters_del;
      if (isset($NM_filters_del) && !empty($NM_filters_del))
      { 
          $NM_patch = $this->NM_path_filter . "/" . $NM_filters_del;
          if (!is_file($NM_patch))
          {
              $NM_filters_del = sc_convert_encoding($NM_filters_del, "UTF-8", $_SESSION['scriptcase']['charset']);
              $NM_patch = $this->NM_path_filter . "/" . $NM_filters_del;
          }
          if (is_file($NM_patch))
          {
              @unlink($NM_patch);
          }
          if ($NM_filters_del == $this->NM_curr_fil)
          {
              $this->NM_curr_fil = "";
          }
      }
   }
   /**
    * @access  public
    */
   function trata_campos()
   {
      global $idpro_cond, $idpro, $idpro_autocomp,
             $fecha_cond, $fecha, $fecha_dia, $fecha_mes, $fecha_ano, $fecha_input_2_dia, $fecha_input_2_mes, $fecha_input_2_ano,
             $cantidad_cond, $cantidad, $cantidad_input_2, $cantidad_autocomp,
             $idbod_cond, $idbod,
             $idcombo_cond, $idcombo, $idcombo_autocomp,
             $escombo_cond, $escombo,
             $tipo_cond, $tipo,
             $grupo_cond, $grupo, $grupo_autocomp,
             $inicio_cond, $inicio, $inicio_dia, $inicio_mes, $inicio_ano, $inicio_hor, $inicio_min, $inicio_seg,
             $fin_cond, $fin, $fin_dia, $fin_mes, $fin_ano, $fin_hor, $fin_min, $fin_seg,
             $fechavenc_cond, $fechavenc, $fechavenc_dia, $fechavenc_mes, $fechavenc_ano, $fechavenc_input_2_dia, $fechavenc_input_2_mes, $fechavenc_input_2_ano,
             $lote2_cond, $lote2, $lote2_autocomp, $nmgp_tab_label;

      $C_formatado = true;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      if (!empty($idpro_autocomp) && empty($idpro))
      {
          $idpro = $idpro_autocomp;
      }
      if (!empty($cantidad_autocomp) && empty($cantidad))
      {
          $cantidad = $cantidad_autocomp;
      }
      if (!empty($idcombo_autocomp) && empty($idcombo))
      {
          $idcombo = $idcombo_autocomp;
      }
      if (!empty($grupo_autocomp) && empty($grupo))
      {
          $grupo = $grupo_autocomp;
      }
      if (!empty($lote2_autocomp) && empty($lote2))
      {
          $lote2 = $lote2_autocomp;
      }
      $idpro_cond_salva = $idpro_cond; 
      if (!isset($idpro_input_2) || $idpro_input_2 == "")
      {
          $idpro_input_2 = $idpro;
      }
      $fecha_cond_salva = $fecha_cond; 
      if (!isset($fecha_input_2_dia) || $fecha_input_2_dia == "")
      {
          $fecha_input_2_dia = $fecha_dia;
      }
      if (!isset($fecha_input_2_mes) || $fecha_input_2_mes == "")
      {
          $fecha_input_2_mes = $fecha_mes;
      }
      if (!isset($fecha_input_2_ano) || $fecha_input_2_ano == "")
      {
          $fecha_input_2_ano = $fecha_ano;
      }
      $cantidad_cond_salva = $cantidad_cond; 
      if (!isset($cantidad_input_2) || $cantidad_input_2 == "")
      {
          $cantidad_input_2 = $cantidad;
      }
      $idbod_cond_salva = $idbod_cond; 
      if (!isset($idbod_input_2) || $idbod_input_2 == "")
      {
          $idbod_input_2 = $idbod;
      }
      $idcombo_cond_salva = $idcombo_cond; 
      if (!isset($idcombo_input_2) || $idcombo_input_2 == "")
      {
          $idcombo_input_2 = $idcombo;
      }
      $escombo_cond_salva = $escombo_cond; 
      if (!isset($escombo_input_2) || $escombo_input_2 == "")
      {
          $escombo_input_2 = $escombo;
      }
      $tipo_cond_salva = $tipo_cond; 
      if (!isset($tipo_input_2) || $tipo_input_2 == "")
      {
          $tipo_input_2 = $tipo;
      }
      $grupo_cond_salva = $grupo_cond; 
      if (!isset($grupo_input_2) || $grupo_input_2 == "")
      {
          $grupo_input_2 = $grupo;
      }
      $inicio_cond_salva = $inicio_cond; 
      $fin_cond_salva = $fin_cond; 
      $fechavenc_cond_salva = $fechavenc_cond; 
      if (!isset($fechavenc_input_2_dia) || $fechavenc_input_2_dia == "")
      {
          $fechavenc_input_2_dia = $fechavenc_dia;
      }
      if (!isset($fechavenc_input_2_mes) || $fechavenc_input_2_mes == "")
      {
          $fechavenc_input_2_mes = $fechavenc_mes;
      }
      if (!isset($fechavenc_input_2_ano) || $fechavenc_input_2_ano == "")
      {
          $fechavenc_input_2_ano = $fechavenc_ano;
      }
      $lote2_cond_salva = $lote2_cond; 
      if (!isset($lote2_input_2) || $lote2_input_2 == "")
      {
          $lote2_input_2 = $lote2;
      }
      if ($cantidad_cond != "in")
      {
          if ($C_formatado)
          {
              nm_limpa_valor($cantidad, $_SESSION['scriptcase']['reg_conf']['dec_num'], $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
          }
      }
      if ($cantidad_cond != "in")
      {
          if ($C_formatado)
          {
              nm_limpa_valor($cantidad_input_2, $_SESSION['scriptcase']['reg_conf']['dec_num'], $_SESSION['scriptcase']['reg_conf']['grup_num']) ; 
          }
      }
      $tmp_pos = strpos($idbod, "##@@");
      if ($tmp_pos === false) {
          $L_lookup = $idbod;
      }
      else {
          $L_lookup = substr($idbod, 0, $tmp_pos);
      }
      if ($this->NM_ajax_opcao != "ajax_grid_search_change_fil" && !empty($L_lookup) && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['psq_check_ret']['idbod'])) {
          if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Ubicación : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
      }
      $tmp_pos = strpos($escombo, "##@@");
      if ($tmp_pos === false) {
          $L_lookup = $escombo;
      }
      else {
          $L_lookup = substr($escombo, 0, $tmp_pos);
      }
      if ($this->NM_ajax_opcao != "ajax_grid_search_change_fil" && !empty($L_lookup) && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['psq_check_ret']['escombo'])) {
          if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Combo : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
      }
      $tmp_pos = strpos($tipo, "##@@");
      if ($tmp_pos === false) {
          $L_lookup = $tipo;
      }
      else {
          $L_lookup = substr($tipo, 0, $tmp_pos);
      }
      if ($this->NM_ajax_opcao != "ajax_grid_search_change_fil" && !empty($L_lookup) && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['psq_check_ret']['tipo'])) {
          if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Tipo : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['idpro'] = $idpro; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['idpro_cond'] = $idpro_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fecha_dia'] = $fecha_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fecha_mes'] = $fecha_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fecha_ano'] = $fecha_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fecha_input_2_dia'] = $fecha_input_2_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fecha_input_2_mes'] = $fecha_input_2_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fecha_input_2_ano'] = $fecha_input_2_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fecha_cond'] = $fecha_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['cantidad'] = $cantidad; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['cantidad_input_2'] = $cantidad_input_2; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['cantidad_cond'] = $cantidad_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['idbod'] = $idbod; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['idbod_cond'] = $idbod_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['idcombo'] = $idcombo; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['idcombo_cond'] = $idcombo_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['escombo'] = $escombo; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['escombo_cond'] = $escombo_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['tipo'] = $tipo; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['tipo_cond'] = $tipo_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['grupo'] = $grupo; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['grupo_cond'] = $grupo_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['inicio_dia'] = $inicio_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['inicio_mes'] = $inicio_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['inicio_ano'] = $inicio_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['inicio_hor'] = $inicio_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['inicio_min'] = $inicio_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['inicio_seg'] = $inicio_seg; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['inicio_cond'] = $inicio_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fin_dia'] = $fin_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fin_mes'] = $fin_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fin_ano'] = $fin_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fin_hor'] = $fin_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fin_min'] = $fin_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fin_seg'] = $fin_seg; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fin_cond'] = $fin_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fechavenc_dia'] = $fechavenc_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fechavenc_mes'] = $fechavenc_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fechavenc_ano'] = $fechavenc_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fechavenc_input_2_dia'] = $fechavenc_input_2_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fechavenc_input_2_mes'] = $fechavenc_input_2_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fechavenc_input_2_ano'] = $fechavenc_input_2_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fechavenc_cond'] = $fechavenc_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['lote2'] = $lote2; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['lote2_cond'] = $lote2_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['dyn_search']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['NM_operador'] = $this->NM_operador; 
      if ($this->NM_ajax_flag && $this->NM_ajax_opcao == "ajax_grid_search")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca'] = $Temp_Busca;
      }
      if ($idpro_cond != "in" && $idpro_cond != "bw" && !empty($idpro) && !is_numeric($idpro))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Producto";
      }
      if ($idpro_cond == "bw" && ((!empty($idpro) && !is_numeric($idpro)) || (!empty($idpro_input_2) && !is_numeric($idpro_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Producto";
      }
      if ($cantidad_cond != "in" && $cantidad_cond != "bw" && !empty($cantidad) && !is_numeric($cantidad))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Cantidad";
      }
      if ($cantidad_cond == "bw" && ((!empty($cantidad) && !is_numeric($cantidad)) || (!empty($cantidad_input_2) && !is_numeric($cantidad_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Cantidad";
      }
      if ($idcombo_cond != "in" && $idcombo_cond != "bw" && !empty($idcombo) && !is_numeric($idcombo))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Producto Combo";
      }
      if ($idcombo_cond == "bw" && ((!empty($idcombo) && !is_numeric($idcombo)) || (!empty($idcombo_input_2) && !is_numeric($idcombo_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Producto Combo";
      }
      if ($grupo_cond != "in" && $grupo_cond != "bw" && !empty($grupo) && !is_numeric($grupo))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Grupo";
      }
      if ($grupo_cond == "bw" && ((!empty($grupo) && !is_numeric($grupo)) || (!empty($grupo_input_2) && !is_numeric($grupo_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Grupo";
      }
      if (!empty($this->Campos_Mens_erro)) 
      {
          return;
      }
      $nmgp_def_dados = array();
    if ($idpro != '') {
      $idpro_look = substr($this->Db->qstr($idpro), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($idpro))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "select idprod, codigobar + ' - ' + nompro from productos where idprod = $idpro_look order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "select idprod, concat(codigobar,' - ',nompro) from productos where idprod = $idpro_look order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select idprod, codigobar&' - '&nompro from productos where idprod = $idpro_look order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "select idprod, codigobar||' - '||nompro from productos where idprod = $idpro_look order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nm_comando = "select idprod, codigobar + ' - ' + nompro from productos where idprod = $idpro_look order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "select idprod, codigobar||' - '||nompro from productos where idprod = $idpro_look order by codigobar, nompro" ; 
      } 
      else 
      { 
          $nm_comando = "select idprod, codigobar||' - '||nompro from productos where idprod = $idpro_look order by codigobar, nompro" ; 
      } 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $cmp2 = NM_charset_to_utf8(trim($rs->fields[1]));
            $nmgp_def_dados[] = array($cmp1 => $cmp2); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
   } 

    }
      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['idpro'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['idpro'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['idpro'] = $idpro;
      }
      $nmgp_def_dados = array();
    if ($cantidad != '') {
      $cantidad_look = substr($this->Db->qstr($cantidad), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($cantidad))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct cantidad from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2 FROM      inventario ) nm_sel_esp where cantidad = $cantidad_look"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select distinct cantidad from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2 FROM      inventario ) nm_sel_esp where cantidad = $cantidad_look"; 
      }
      else
      {
          $nm_comando = "select distinct cantidad from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2 FROM      inventario ) nm_sel_esp where cantidad = $cantidad_look"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
              nmgp_Form_Num_Val($rs->fields[0], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "3", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
   } 

    }
      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['cantidad'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['cantidad'] = $cmp1;
      }
      else
      {
          $cmp1 = $cantidad;
          nmgp_Form_Num_Val($cmp1, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "3", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          $this->cmp_formatado['cantidad'] = $cmp1;
      }
      $Conteudo = $cantidad_input_2;
      if (strtoupper($cantidad_cond) != "II" && strtoupper($cantidad_cond) != "QP" && strtoupper($cantidad_cond) != "NP" && strtoupper($cantidad_cond) != "IN") 
      { 
          nmgp_Form_Num_Val($Conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      } 
      $this->cmp_formatado['cantidad_input_2'] = $Conteudo;
      $Conteudo = $idbod;
      if (strpos($Conteudo, "##@@") !== false)
      {
          $Conteudo = substr($Conteudo, strpos($Conteudo, "##@@") + 4);
      }
      $this->cmp_formatado['idbod'] = $Conteudo;
      $nmgp_def_dados = array();
    if ($idcombo != '') {
      $idcombo_look = substr($this->Db->qstr($idcombo), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($idcombo))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "select idprod, codigobar + ' -- ' + nompro from productos where escombo='SI' and idprod = $idcombo_look order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "select idprod, concat(codigobar,' -- ',nompro) from productos where escombo='SI' and idprod = $idcombo_look order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select idprod, codigobar&' -- '&nompro from productos where escombo='SI' and idprod = $idcombo_look order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "select idprod, codigobar||' -- '||nompro from productos where escombo='SI' and idprod = $idcombo_look order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nm_comando = "select idprod, codigobar + ' -- ' + nompro from productos where escombo='SI' and idprod = $idcombo_look order by codigobar, nompro" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "select idprod, codigobar||' -- '||nompro from productos where escombo='SI' and idprod = $idcombo_look order by codigobar, nompro" ; 
      } 
      else 
      { 
          $nm_comando = "select idprod, codigobar||' -- '||nompro from productos where escombo='SI' and idprod = $idcombo_look order by codigobar, nompro" ; 
      } 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $cmp2 = NM_charset_to_utf8(trim($rs->fields[1]));
            $nmgp_def_dados[] = array($cmp1 => $cmp2); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
   } 

    }
      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['idcombo'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['idcombo'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['idcombo'] = $idcombo;
      }
      $Conteudo = $escombo;
      if (strpos($Conteudo, "##@@") !== false)
      {
          $Conteudo = substr($Conteudo, strpos($Conteudo, "##@@") + 4);
      }
      $this->cmp_formatado['escombo'] = $Conteudo;
      $Conteudo = $tipo;
      if (strpos($Conteudo, "##@@") !== false)
      {
          $Conteudo = substr($Conteudo, strpos($Conteudo, "##@@") + 4);
      }
      $this->cmp_formatado['tipo'] = $Conteudo;
      $nmgp_def_dados = array();
    if ($grupo != '') {
      $grupo_look = substr($this->Db->qstr($grupo), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($grupo))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select idgrupo, nomgrupo from grupo where idgrupo = $grupo_look order by nomgrupo"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $nm_comando = "select idgrupo, nomgrupo from grupo where idgrupo = $grupo_look order by nomgrupo"; 
      }
      else
      {
          $nm_comando = "select idgrupo, nomgrupo from grupo where idgrupo = $grupo_look order by nomgrupo"; 
      }
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $cmp2 = NM_charset_to_utf8(trim($rs->fields[1]));
            $nmgp_def_dados[] = array($cmp1 => $cmp2); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
   } 

    }
      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['grupo'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['grupo'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['grupo'] = $grupo;
      }
      $nmgp_def_dados = array();
    if ($lote2 != '') {
      $lote2_look = substr($this->Db->qstr($lote2), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct lote2 from (SELECT      idinv,     fecha,     cantidad,     idpro,     idbod,     tipo,     detalle,     idmov,     idfaccom,     nufacvta,     colores,     tallas,     sabor,     costo,     valorparcial,     idcombo,     (select p.idgrup from productos p where p.idprod=idpro) as grupo,     (select p.escombo from productos p where p.idprod=idpro) as escombo,     creado as inicio,     creado as fin,     idped,     fechavenc,     lote2 FROM      inventario ) nm_sel_esp where lote2 = '$lote2_look'"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

    }
      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['lote2'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->cmp_formatado['lote2'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['lote2'] = $lote2;
      }

      //----- $idpro
      $this->Date_part = false;
      if (isset($idpro) && !empty($idpro))
      { 
           $idpro = strtoupper($idpro);
      } 
      if (isset($idpro) || $idpro_cond == "nu" || $idpro_cond == "nn" || $idpro_cond == "ep" || $idpro_cond == "ne")
      {
         $this->monta_condicao("idpro", $idpro_cond, $idpro, "", "idpro");
      }

      //----- $fecha
      $this->Date_part = false;
      if ($fecha_cond != "bi_TP")
      {
          $fecha_cond = strtoupper($fecha_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $fecha_ano;
          $Dtxt .= $fecha_mes;
          $Dtxt .= $fecha_dia;
          $val[0]['ano'] = $fecha_ano;
          $val[0]['mes'] = $fecha_mes;
          $val[0]['dia'] = $fecha_dia;
          if ($fecha_cond == "BW")
          {
              $val[1]['ano'] = $fecha_input_2_ano;
              $val[1]['mes'] = $fecha_input_2_mes;
              $val[1]['dia'] = $fecha_input_2_dia;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->nm_prep_date($val, "DT", "DATETIME", $fecha_cond, "", "data");
          }
          else
          {
              $this->nm_prep_date($val, "DT", "DATE", $fecha_cond, "", "data");
          }
          if (!$this->Date_part) {
              $val[0] = $this->Ini->sc_Date_Protect($val[0]);
          }
          $fecha = $val[0];
          $this->cmp_formatado['fecha'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fecha'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['fecha'], "YYYY-MM-DD");
          $this->cmp_formatado['fecha'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "dmY"));
          if ($fecha_cond == "BW")
          {
              if (!$this->Date_part) {
                  $val[1] = $this->Ini->sc_Date_Protect($val[1]);
              }
              $fecha_input_2     = $val[1];
              $this->cmp_formatado['fecha_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fecha_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['fecha_input_2'], "YYYY-MM-DD");
              $this->cmp_formatado['fecha_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "dmY"));
          }
          if (!empty($Dtxt) || $fecha_cond == "NU" || $fecha_cond == "NN"|| $fecha_cond == "EP"|| $fecha_cond == "NE")
          {
              $this->monta_condicao("fecha", $fecha_cond, $fecha, $fecha_input_2, 'fecha', 'DATE');
          }
      }

      //----- $cantidad
      $this->Date_part = false;
      if (isset($cantidad) || $cantidad_cond == "nu" || $cantidad_cond == "nn" || $cantidad_cond == "ep" || $cantidad_cond == "ne")
      {
         $this->monta_condicao("cantidad", $cantidad_cond, $cantidad, $cantidad_input_2, "cantidad");
      }

      //----- $idbod
      $this->Date_part = false;
      if (isset($idbod))
      {
         $this->monta_condicao("idbod", $idbod_cond, $idbod, "", "idbod");
      }

      //----- $idcombo
      $this->Date_part = false;
      if (isset($idcombo) || $idcombo_cond == "nu" || $idcombo_cond == "nn" || $idcombo_cond == "ep" || $idcombo_cond == "ne")
      {
         $this->monta_condicao("idcombo", $idcombo_cond, $idcombo, "", "idcombo");
      }

      //----- $escombo
      $this->Date_part = false;
      if (isset($escombo))
      {
         $this->monta_condicao("escombo", $escombo_cond, $escombo, "", "escombo");
      }

      //----- $tipo
      $this->Date_part = false;
      if (isset($tipo))
      {
         $this->monta_condicao("tipo", $tipo_cond, $tipo, "", "tipo");
      }

      //----- $grupo
      $this->Date_part = false;
      if (isset($grupo) || $grupo_cond == "nu" || $grupo_cond == "nn" || $grupo_cond == "ep" || $grupo_cond == "ne")
      {
         $this->monta_condicao("grupo", $grupo_cond, $grupo, "", "grupo");
      }

      //----- $inicio
      $this->Date_part = false;
      if ($inicio_cond != "bi_TP")
      {
          $inicio_cond = strtoupper($inicio_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $inicio_ano;
          $Dtxt .= $inicio_mes;
          $Dtxt .= $inicio_dia;
          $Dtxt .= $inicio_hor;
          $Dtxt .= $inicio_min;
          $Dtxt .= $inicio_seg;
          $val[0]['ano'] = $inicio_ano;
          $val[0]['mes'] = $inicio_mes;
          $val[0]['dia'] = $inicio_dia;
          $val[0]['hor'] = $inicio_hor;
          $val[0]['min'] = $inicio_min;
          $val[0]['seg'] = $inicio_seg;
          if ($inicio_cond == "BW")
          {
              $val[1]['ano'] = $inicio_input_2_ano;
              $val[1]['mes'] = $inicio_input_2_mes;
              $val[1]['dia'] = $inicio_input_2_dia;
              $val[1]['hor'] = $inicio_input_2_hor;
              $val[1]['min'] = $inicio_input_2_min;
              $val[1]['seg'] = $inicio_input_2_seg;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          $this->nm_prep_date($val, "DH", "TIMESTAMP", $inicio_cond, "", "datahora");
          if (!$this->Date_part) {
              $val[0] = $this->Ini->sc_Date_Protect($val[0]);
          }
          $inicio = $val[0];
          $this->cmp_formatado['inicio'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['inicio'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['inicio'], "YYYY-MM-DD HH:II:SS");
          $this->cmp_formatado['inicio'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY hi"));
          if ($inicio_cond == "BW")
          {
              if (!$this->Date_part) {
                  $val[1] = $this->Ini->sc_Date_Protect($val[1]);
              }
              $inicio_input_2     = $val[1];
              $this->cmp_formatado['inicio_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['inicio_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['inicio_input_2'], "YYYY-MM-DD HH:II:SS");
              $this->cmp_formatado['inicio_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY hi"));
          }
          if (!empty($Dtxt) || $inicio_cond == "NU" || $inicio_cond == "NN"|| $inicio_cond == "EP"|| $inicio_cond == "NE")
          {
              $this->monta_condicao("inicio", $inicio_cond, $inicio, $inicio_input_2, 'inicio', 'TIMESTAMP');
          }
      }

      //----- $fin
      $this->Date_part = false;
      if ($fin_cond != "bi_TP")
      {
          $fin_cond = strtoupper($fin_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $fin_ano;
          $Dtxt .= $fin_mes;
          $Dtxt .= $fin_dia;
          $Dtxt .= $fin_hor;
          $Dtxt .= $fin_min;
          $Dtxt .= $fin_seg;
          $val[0]['ano'] = $fin_ano;
          $val[0]['mes'] = $fin_mes;
          $val[0]['dia'] = $fin_dia;
          $val[0]['hor'] = $fin_hor;
          $val[0]['min'] = $fin_min;
          $val[0]['seg'] = $fin_seg;
          if ($fin_cond == "BW")
          {
              $val[1]['ano'] = $fin_input_2_ano;
              $val[1]['mes'] = $fin_input_2_mes;
              $val[1]['dia'] = $fin_input_2_dia;
              $val[1]['hor'] = $fin_input_2_hor;
              $val[1]['min'] = $fin_input_2_min;
              $val[1]['seg'] = $fin_input_2_seg;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          $this->nm_prep_date($val, "DH", "TIMESTAMP", $fin_cond, "", "datahora");
          if (!$this->Date_part) {
              $val[0] = $this->Ini->sc_Date_Protect($val[0]);
          }
          $fin = $val[0];
          $this->cmp_formatado['fin'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fin'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['fin'], "YYYY-MM-DD HH:II:SS");
          $this->cmp_formatado['fin'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY hi"));
          if ($fin_cond == "BW")
          {
              if (!$this->Date_part) {
                  $val[1] = $this->Ini->sc_Date_Protect($val[1]);
              }
              $fin_input_2     = $val[1];
              $this->cmp_formatado['fin_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fin_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['fin_input_2'], "YYYY-MM-DD HH:II:SS");
              $this->cmp_formatado['fin_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY hi"));
          }
          if (!empty($Dtxt) || $fin_cond == "NU" || $fin_cond == "NN"|| $fin_cond == "EP"|| $fin_cond == "NE")
          {
              $this->monta_condicao("fin", $fin_cond, $fin, $fin_input_2, 'fin', 'TIMESTAMP');
          }
      }

      //----- $fechavenc
      $this->Date_part = false;
      if ($fechavenc_cond != "bi_TP")
      {
          $fechavenc_cond = strtoupper($fechavenc_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $fechavenc_ano;
          $Dtxt .= $fechavenc_mes;
          $Dtxt .= $fechavenc_dia;
          $val[0]['ano'] = $fechavenc_ano;
          $val[0]['mes'] = $fechavenc_mes;
          $val[0]['dia'] = $fechavenc_dia;
          if ($fechavenc_cond == "BW")
          {
              $val[1]['ano'] = $fechavenc_input_2_ano;
              $val[1]['mes'] = $fechavenc_input_2_mes;
              $val[1]['dia'] = $fechavenc_input_2_dia;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->nm_prep_date($val, "DT", "DATETIME", $fechavenc_cond, "", "data");
          }
          else
          {
              $this->nm_prep_date($val, "DT", "DATE", $fechavenc_cond, "", "data");
          }
          if (!$this->Date_part) {
              $val[0] = $this->Ini->sc_Date_Protect($val[0]);
          }
          $fechavenc = $val[0];
          $this->cmp_formatado['fechavenc'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fechavenc'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['fechavenc'], "YYYY-MM-DD");
          $this->cmp_formatado['fechavenc'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "dmY"));
          if ($fechavenc_cond == "BW")
          {
              if (!$this->Date_part) {
                  $val[1] = $this->Ini->sc_Date_Protect($val[1]);
              }
              $fechavenc_input_2     = $val[1];
              $this->cmp_formatado['fechavenc_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']['fechavenc_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['fechavenc_input_2'], "YYYY-MM-DD");
              $this->cmp_formatado['fechavenc_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "dmY"));
          }
          if (!empty($Dtxt) || $fechavenc_cond == "NU" || $fechavenc_cond == "NN"|| $fechavenc_cond == "EP"|| $fechavenc_cond == "NE")
          {
              $this->monta_condicao("fechavenc", $fechavenc_cond, $fechavenc, $fechavenc_input_2, 'fechavenc', 'DATE');
          }
      }

      //----- $lote2
      $this->Date_part = false;
      if (isset($lote2) && !empty($lote2))
      { 
           $lote2 = strtoupper($lote2);
      } 
      if (isset($lote2) || $lote2_cond == "nu" || $lote2_cond == "nn" || $lote2_cond == "ep" || $lote2_cond == "ne")
      {
         $this->monta_condicao("lote2", $lote2_cond, $lote2, "", "lote2");
      }
   }

   /**
    * @access  public
    */
   function finaliza_resultado()
   {
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['where_pesq_fast'] = "";
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['fast_search']);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['where_pesq_interativ'] = "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['interativ_search'] = array();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['int_search_dados'] = array();
      if ("" == $this->comando_filtro)
      {
          $this->comando = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['where_orig'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca']) && $_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['campos_busca'], "UTF-8", $_SESSION['scriptcase']['charset']);
      }

      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['where_pesq_lookup']  = $this->comando_sum . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['where_pesq']         = $this->comando . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['opcao']              = "pesq";
      if ("" == $this->comando_filtro)
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['where_pesq_filtro'] = "";
      }
      else
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['where_pesq_filtro'] = " (" . $this->comando_filtro . ")";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['where_pesq_ant'])
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['cond_pesq'] .= $this->NM_operador;
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['contr_array_resumo'] = "NAO";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['contr_total_geral']  = "NAO";
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['tot_geral']);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_inventario_130521']['where_pesq'];

      $this->retorna_pesq();
   }
   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

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

   
   function css_obj_select_ajax($Obj)
   {
      switch ($Obj)
      {
         case "idbod" : return ('class="scFilterObjectEven"'); break;
         default       : return ("");
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $str_highlight_ini = "";
      $str_highlight_fim = "";
      if(substr($nm_campo, 0, 23) == '<div class="highlight">' && substr($nm_campo, -6) == '</div>')
      {
           $str_highlight_ini = substr($nm_campo, 0, 23);
           $str_highlight_fim = substr($nm_campo, -6);

           $trab_campo = substr($nm_campo, 23, -6);
           $tam_campo  = strlen($trab_campo);
      }      $mask_num = false;
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
              if ($cont2 >= $tam_campo)
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
          $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
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
      $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
   } 
   function nm_conv_data_db($dt_in, $form_in, $form_out)
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
           nm_conv_form_data($dt_out, $form_in, $form_out);
           return $dt_out;
       }
   }
}

?>
